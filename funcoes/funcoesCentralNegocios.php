<?
    date_default_timezone_set('America/Belem');
	require_once $_SERVER['DOCUMENT_ROOT'].'/loader.php';

    $funcao = $_POST['funcao'];


if($funcao == 'carregar_central_negocios') { carregarNegocios(); }
if($funcao == 'informar_feedback_negocio') { informarFeedbackNegocio(); }
if($funcao == 'carregar_informacoes_negocio') { carregarInformacoesNegocio (); }

function informarFeedbackNegocio() {
    try {
        $usuarioLogado = ControleAcesso::getUsuarioLogado();
        $certificado = CertificadoPeer::retrieveByPK($_POST['certificadoId']);
        $certificadoSituacao = new CertificadoSituacao();
        $certificadoSituacao->setCertificadoId($certificado->getId());

        /*var_dump($_POST['tipoFeedback'], $_POST['selectFeedback']); exit;*/
        if ($_POST['tipoFeedback'] == 'feedback') {
            $certificadoSituacao->setSituacaoId($_POST['selectFeedback']);
            $certificado->setStatusFollowup($_POST['selectFeedback']);
        }
        else {
            $certificadoSituacao->setSituacaoId($_POST['selectLost']);
            $certificado->setStatusFollowup($_POST['selectLost']);
        }

        $certificadoSituacao->setComentario($_POST['edtFeedbackCd']);
        $certificadoSituacao->setUsuarioId($usuarioLogado->getId());
        $certificadoSituacao->setData(date('Y-m-d H:i:s'));
        $certificadoSituacao->save();
        $certificado->save();
        echo json_encode(array('mensagem'=>'Ok'));

    } catch(Exception $e){
        echo var_dump($e->getMessage());
    }

}




function getContatosCertificado($certificado) {
    /*
 * PEGA TODOS OS CONTATOS DO CLIENTE E MOSTRA NUMA TABELA
 * */
    $contatosCliente = array();
    $telefone = '';
    if ($certificado->getCliente()->getFone1())
        $telefone = $certificado->getCliente()->getFone1();
    if ($certificado->getCliente()->getFone2())
        if ($telefone) {
            $telefone .= $certificado->getCliente()->getFone2();
        } else {
            $telefone = $certificado->getCliente()->getFone2();
        }

    $celular = $certificado->getCliente()->getCelular();

    if ($telefone || $celular) {
        if ($certificado->getCliente()->getPessoaTipo()=='J')
            $tipoContato = 'Empresa';
        else
            $tipoContato = 'Representante';


        $contatosCliente[] = array("Tipo"=>$tipoContato, "Telefone"=>($telefone) ? $telefone : '-', "Celular"=>($celular) ? $celular : '-', "E-mail"=>$certificado->getCliente()->getEmail() );
    }


    if ($certificado->getCliente()->getPessoaTipo() == 'J') {
        $telefone = '';
        if ($certificado->getCliente()->getResponsavel()->getFone1())
            $telefone = $certificado->getCliente()->getResponsavel()->getFone1();
        if ($certificado->getCliente()->getResponsavel()->getFone2())
            if ($telefone) {
                $telefone .= ' | ' . $certificado->getCliente()->getResponsavel()->getFone2();
            } else {
                $telefone = $certificado->getCliente()->getResponsavel()->getFone2();
            }

        $celular = $certificado->getCliente()->getResponsavel()->getCelular();
        $contatosCliente[] = array("Tipo" => "Rep. Legal", "Telefone" => ($telefone) ? $telefone : '-', "Celular" => ($celular) ? $celular : '-', "E-mail"=>$certificado->getCliente()->getResponsavel()->getEmail());

        foreach ($certificado->getCliente()->getClienteContatos() as $contatoCliente)
            if ($contatoCliente->getTelefone())
                $contatosCliente[] =
                    array(
                        "Tipo"=>"AC","Telefone"=>utf8_encode($contatoCliente->getTelefone()), "Celular"=>'-', "E-mail"=>$contatoCliente->getEmail(),
                    );

        /*
         * PEGA OS CONTATOS DO CONTADOR E INSERE
         * */
        if ($certificado->getContador()) {
            $contadorObj = $certificado->getContador();
            $telefone = '';
            if ($contadorObj->getFone1())
                $telefone = $contadorObj->getFone1();
            if ($contadorObj->getFone2())
                if ($telefone) {
                    $telefone .= ' | ' . $contadorObj->getFone2();
                } else {
                    $telefone = $contadorObj->getFone2();
                }

            $celular = $contadorObj->getCelular();
            $contatosCliente[] = array("Tipo" => "Escrit&oacute;rio Contador", "Telefone" => ($telefone) ? $telefone : '-', "Celular" => ($celular) ? $celular : '-', "E-mail"=>$certificado->getCliente()->getEmail());

            foreach ($contadorObj->getContadorContatos() as $contatoContador)
                $contatosCliente[] =
                    array(
                        "Tipo"=>utf8_encode($contatoContador->getNome()) . "(Contador)","Telefone"=>$contatoContador->getFone(), "Celular"=>$contatoContador->getCelular(), "E-mail"=>$contatoContador->getEmail(),
                    );
        }
    }

    return $contatosCliente;
}


function carregarNegocios() {
    try {
        $usuarioLogado = ControleAcesso::getUsuarioLogado();


        $tipoNegocios = $_POST['tipoNegocios'];
        $cCertificado = new Criteria();



        /*
         * SE FOR DA DIRETORIA OU DO FINANCEIRO PULA (MOSTRA TODOS)
         * SE NAO FOR DA DIRETORIA E NAO TIVER ESCOLHIDO NENHUM FILTRO DE CAMPO E DE CONSULTORES SO MOSTRA OS CERTIFICADOS
         * DOS USUARIOS DOS PARCEIROS OU CASO SEJA SUPERVISOR DAS AREAS DOS MESMOS
        */
        if ( ( ($usuarioLogado->getPerfilId() != 4) && ($usuarioLogado->getPerfilId()!=11)) && (!$campoFiltro) && (!$valorCampoFiltro) && (!$_POST['filtros']['filtroConsultores']) ) {
            /*SE FOR SUPERVISOR ADICIONA USUARIOS POR LOCAIS*/
            /*
             * SE TIVER LOCAL VINCULADO, ACRESCENTA TODOS
             * OS USUARIOS VINCULADOS A ESTES LOCAIS
             * */
            $usuariosLocaisObj = $usuarioLogado->getUsuariosLocaisUsuario();
            $usuariosLocais = array();
            $usuariosLocais[] = $usuarioLogado->getId();

            foreach ($usuariosLocaisObj as $usuario)
                $usuariosLocais[] = $usuario->getId();

            if ($usuariosLocais) {
                $usuariosLocais[] = $usuarioLogado->getId();
                $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuariosLocais, Criteria::IN);
            }


            /*
             * SE O USUARIO FOR PARCEIRO, ACRESCENTA TODOS
             * OS USUARIOS VINCULADOS AO MESMO
             * */
            $usuariosParceiroObj = $usuarioLogado->getUsuariosParceiroUsuario();
            $usuariosParceiro = array();


            foreach ($usuariosParceiroObj as $usuario) {
                $usuariosParceiro[] = $usuario->getId();

            }
            if ($usuariosParceiro) {
                $usuariosParceiro[] = $usuarioLogado->getId();
                $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuariosParceiro, Criteria::IN);
            }

            if ((count($usuariosParceiro) == 0) && (count($usuariosLocais) == 0))
                $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuarioLogado->getId());


        }


        $cCertificado->add(CertificadoPeer::APAGADO, 0);

        $hora_ini = ' 00:00:00';
        $hora_fim = ' 23:59:59';

        $cCertificado->add(CertificadoPeer::DATA_COMPRA, date('Y').'-'.date('m').'-01'.$hora_ini, Criteria::GREATER_EQUAL);
        $cCertificado->addAnd(CertificadoPeer::DATA_COMPRA, date('Y').'-'.date('m').'-'.getLastDayOfMonth(date('m'), date('Y')) . $hora_fim, Criteria::LESS_EQUAL);

        $cCertificado->addAnd(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, null, Criteria::ISNULL);
        $cCertificado->addOr(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, '0000-00-00 00:00:00');



        $cCertificado->addAscendingOrderByColumn(CertificadoPeer::DATA_COMPRA);


        /*CONSULTA QUANTIDADE ANTES DE INSERIR O LIMITE POR PAGINA*/
        $quantidadeCertificados = CertificadoPeer::doSelect($cCertificado);

        $certificadosObj = CertificadoPeer::doSelect($cCertificado);
        $certificadosUrgentesFollowUp = array();
        $certificadosUrgentes = array();
        $certificadosPerdidos = array();

        $i = 1;
        $j = 1;
        $l = 1;
        $qtdUrgentes = 0;
        $somaUrgentes = 0.0;
        $qtdUrgentesComFeedback = 0;
        $somaUrgentesComFeedaback = 0.0;
        $qtdLost = 0;
        $somaLost = 0.0;
        $htmlPopOver = '';
        $conteudoPopOver = '';

        foreach ($certificadosObj as $key=>$certificado)  {

            $contatos = getContatosCertificado($certificado);
            $conteudoPopOver = "<table class='table table-striped '><thead><tr><td><strong>Tipo</strong></td><td><strong>Celular</strong></td><td><strong>Telefone</strong></td></tr></thead><tbody>";
            foreach ($contatos as $contato) {
                $celular = $contato['Celular'];
                $telefone = $contato['Telefone'];
                $conteudoPopOver .= '<tr><td>'.utf8_encode($contato['Tipo']) .'</td>';
                $conteudoPopOver .= '<td>'.$celular .'</td>';
                $conteudoPopOver .= '<td>'.$telefone .'</td>';
            }
            $conteudoPopOver .= '</tbody></table>';

            $htmlPopOver .= '<script>$("#btnContato'.$certificado->getId().'").popover({title:"Contatos:",content: "'.$conteudoPopOver.'",html: true, placement: "right",trigger: "hover"}); </script>';



            $nomeCliente = ($certificado->getCliente()->getRazaoSocial() != '')?utf8_encode($certificado->getCliente()->getRazaoSocial()):utf8_encode($certificado->getCliente()->getNomeFantasia());
            $usuarioConsultor = $certificado->getUsuario()?$certificado->getUsuario()->getNome():'---';
            $usuarioAgr = (($certificado->getUsuarioValidouId())?$certificado->getUsuarioValidouId().'-'.utf8_encode($certificado->getUsuarioRelatedByUsuarioValidouId()->getNome()):'---');
            $produto = ($certificado->getProduto()) ? utf8_encode($certificado->getProduto()->getNome()) : '---';

            if ($certificado->getDataPagamento()) {
                $dataPagamento = $certificado->getDataPagamento('d/m/Y');
                $situacaoPagamento = '<i class="fa fa-circle text-success" title="'.utf8_encode($certificado->getFormaPagamento()->getNome()).'"></i>';
            }
            else {
                $dataPagamento = '-';
                $situacaoPagamento = '<i class="fa fa-circle text-danger" title="'.utf8_encode($certificado->getFormaPagamento()->getNome()).'"></i>';
            }

            $btnDetalhar = '<button class="btn btn-primary" 
                title="Inserir feedback do cliente" id="btnDetalharCertificado"  data-toggle="modal" 
                data-target="#modalInserirFeedbackCertificado" onclick="
                $(\'#cnSpanCodigoCliente\').html(\''.$certificado->getClienteId().'\');
                $(\'#cnSpanNomeCliente\').html(\''.$nomeCliente.'\');
                $(\'#cnSpanCodigoCertificado\').html(\''.$certificado->getId().'\');
                $(\'#cnSpanDataCompra\').html(\''.$certificado->getDataCompra('d/m/Y').'\');
                $(\'#cnSpanProtocolo\').html(\''.$certificado->getProtocolo().'\');
                carregarInformacoesNegocio('.$certificado->getId().');
                
                
                "> <i class="fa fa-commenting-o"></i> 
            </button> ';

            if ($certificado->getConfirmacaoValidacao() == 1)
                $situacaoValidacao = '<i class="fa fa-flag" aria-hidden="true" style="color:#096;" title="validado em '.$certificado->getDataValidacao('d/m/Y').' Agr: '.$usuarioAgr.'"></i>';
            elseif ($certificado->getConfirmacaoValidacao() == 2)
                $situacaoValidacao = '<i class="fa fa-flag" aria-hidden="true" style="color:#fff847" title="validado em '.$certificado->getDataValidacao('d/m/Y').' Agr: '.$usuarioAgr. '(pendente)"></i>';
            elseif ($certificado->getConfirmacaoValidacao() == 3)
                $situacaoValidacao = '<i class="fa fa-flag" aria-hidden="true" style="color:#fff847" title="validado em '.$certificado->getDataValidacao('d/m/Y').' Agr: '.$usuarioAgr.' (renovado)"></i>';
            elseif ($certificado->getConfirmacaoValidacao() == 4)
                $situacaoValidacao = '<i class="fa fa-flag" aria-hidden="true" style="color:#ac2925" title="revogado em '.$certificado->getDataValidacao('d/m/Y').' Agr: '.$usuarioAgr.'"></i>';
            else
                $situacaoValidacao = '-';

            if ($certificado->getStatusFollowup()) {

                /*GUARDA EM ARRAYS OS IDS DE FOLLOW UP E LOST EM SITUACOES*/
                $cFollow = new Criteria();
                $cFollow->add(SituacaoPeer::SIGLA, 'follow');
                $cFollow->addOr(SituacaoPeer::SIGLA, 'lost');
                $situacoesFollowup = SituacaoPeer::doSelect($cFollow);

                $arrFollow = array();
                $arrLost = array();
                foreach ($situacoesFollowup as $situacaoFollow) {
                    if ($situacaoFollow->getSigla()=='follow')
                        $arrFollow[] = $situacaoFollow->getId();
                    elseif ($situacaoFollow->getSigla()=='follow')
                        $arrLost[] = $situacaoFollow->getId();
                }


                if (array_search($certificado->getStatusFollowup(), $arrFollow )) {
                    $qtdUrgentesComFeedback++;
                    $somaUrgentesComFeedaback += $certificado->getProduto()->getPreco() - $certificado->getDesconto();

                    $certificadosUrgentesFollowUp[] = array(' '=>($i++),'Cod.'=>$certificado->getId(),
                        'Pago'=>$situacaoPagamento,
                        'D.Pag.'=>$dataPagamento,
                        'Proto.'=> ($certificado->getProtocolo())?$certificado->getProtocolo():'-',
                        'D.Comp.'=>($certificado->getDataCompra('d/m/Y'))?$certificado->getDataCompra('d/m/Y'):'-',
                        'Cliente'=> '<a id="btnContato'.$certificado->getId().'" href="telaCertificado.php?funcao=detalhaCertificado&idCertificado='.$certificado->getId().'" target="_blank">'.$certificado->getCliente()->getId() . ' - '.$nomeCliente . '</a>',
                        'Tipo'=>$produto,
                        'Consultor'=>utf8_encode($usuarioConsultor),
                        'Tot'=>formataMoeda($certificado->getProduto()->getPreco() - $certificado->getDesconto()),
                        '.'=>utf8_encode($situacaoValidacao),
                        utf8_encode('Ações')=>$btnDetalhar

                    );

                } elseif (array_search($certificado->getStatusFollowup(), $arrLost )) {
                    $qtdLost++;
                    $somaLost += $certificado->getProduto()->getPreco() - $certificado->getDesconto();

                    $certificadosPerdidos[] = array(' '=>($j++),'Cod.'=>$certificado->getId(),
                        'Pago'=>$situacaoPagamento,
                        'D.Pag.'=>$dataPagamento,
                        'Proto.'=> ($certificado->getProtocolo())?$certificado->getProtocolo():'-',
                        'D.Comp.'=>($certificado->getDataCompra('d/m/Y'))?$certificado->getDataCompra('d/m/Y'):'-',
                        'Cliente'=> '<a id="btnContato'.$certificado->getId().'" href="telaCertificado.php?funcao=detalhaCertificado&idCertificado='.$certificado->getId().'" target="_blank">'.$certificado->getCliente()->getId() . ' - '.$nomeCliente . '</a>',
                        'Tipo'=>$produto,
                        'Consultor'=>utf8_encode($usuarioConsultor),
                        'Tot'=>formataMoeda($certificado->getProduto()->getPreco() - $certificado->getDesconto()),
                        '.'=>utf8_encode($situacaoValidacao),
                        utf8_encode('Ações')=>$btnDetalhar

                    );

                }
            } else {
                $qtdUrgentes++;
                $somaUrgentes += $certificado->getProduto()->getPreco() - $certificado->getDesconto();

                $certificadosUrgentes[] = array(' '=>'<span class="text-success">'.($l++) . "</span>",'Cod.'=>'<span class="text-success">'.$certificado->getId().'</span>',
                    'Pago'=>$situacaoPagamento,
                    'D.Pag.'=>$dataPagamento,
                    'Proto.'=> ($certificado->getProtocolo())?$certificado->getProtocolo():'-',
                    'D.Comp.'=>($certificado->getDataCompra('d/m/Y'))?$certificado->getDataCompra('d/m/Y'):'-',
                    'Cliente'=> '<a id="btnContato'.$certificado->getId().'" href="telaCertificado.php?funcao=detalhaCertificado&idCertificado='.$certificado->getId().'" target="_blank">'.$certificado->getCliente()->getId() . ' - '.$nomeCliente . '</a>',
                    'Tipo'=>$produto,
                    'Consultor'=>utf8_encode($usuarioConsultor),
                    'Tot'=>formataMoeda($certificado->getProduto()->getPreco() - $certificado->getDesconto()),
                    '.'=>utf8_encode($situacaoValidacao),
                    utf8_encode('Ações')=>$btnDetalhar

                );

            }


            /*
             * ESCOLHE ENTRE DATA DE VENCIMENTO, DATA DE VALIDACAO OU DATA DA COMPRA
             * DE ACORDO COM O FILTRO ESCOLHIDO PELO USUARIO
             * */
            if (($_POST['filtros']['filtroTipoData']) && ($_POST['filtros']['filtroTipoData']=='Vencimento')) {
                $certificados[$key]['D.Venc.'] = ($certificado->getDataFimValidade('d/m/Y'))?$certificado->getDataFimValidade('d/m/Y'):'-';
            } elseif (($_POST['filtros']['filtroTipoData']) && ($_POST['filtros']['filtroTipoData']==utf8_encode('Valida??o'))) {
                $certificados[$key]['D.Val.'] = ($certificado->getDataValidacao('d/m/Y')) ? $certificado->getDataValidacao('d/m/Y') : '-';
            } else {
                $certificados[$key]['D.Com.'] = ($certificado->getDataCompra('d/m/Y'))?$certificado->getDataCompra('d/m/Y'):'-';
            }



        }


        $colunas = array(
            array('nome'=>' '), array('nome'=>'Cod.'), array('nome'=>'Pago'),array('nome'=>'D.Pag.'), array('nome'=>'D.Comp.'), array('nome'=>'Proto.'),
            array('nome'=>'Cliente'), array('nome'=>'Tipo'), array('nome'=>'Consultor'), array('nome'=>'Tot'), array('nome'=>'.'), array('nome'=>utf8_encode('Ações'))
        );

        $negocios = '';

        if ($tipoNegocios == 'Urgentes')
            $negocios = $certificadosUrgentes;
        elseif ($tipoNegocios=='UrgentesFollowUp')
            $negocios = $certificadosUrgentesFollowUp;
        elseif ($tipoNegocios == 'Perdidos'){
            $negocios = $certificadosPerdidos;
        }

        $retorno = array('mensagem'=>'Ok','colunas'=>json_encode($colunas), 'negocios'=>json_encode($negocios),
            'quantidadeTotalUrgentes'=>$qtdUrgentes, 'quantidadeTotalUrgentesComFeedback'=>$qtdUrgentesComFeedback,
            'somaTotalUrgentes' => formataMoeda($somaUrgentes), 'somaTotalUrgentesComFeedback' =>formataMoeda($somaUrgentesComFeedaback),
            'qtdLost'=>$qtdLost, 'somaLost'=>formataMoeda($somaLost), 'htmlContatosPopOver'=>$htmlPopOver
        );

        echo json_encode($retorno);
    }catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}


function carregarInformacoesNegocio () {
    try {

        $certificado = CertificadoPeer::retrieveByPK($_POST['certificadoId']);

        /*
        * MONTANDO INFORMACOES SITUACAO
        * */
        $cSituacao = new criteria();
        $cSituacao->add(CertificadoSituacaoPeer::CERTIFICADO_ID, $_POST['certificado_id']);
        $cSituacao->addDescendingOrderByColumn(CertificadoSituacaoPeer::DATA);
        $situacoesCertificado = $certificado->getCertificadoSituacaos($cSituacao);
        /*$situacoes = CertificadoSituacaoPeer::doSelectJoinUsuario();*/
        $situacoes = array();
        foreach ($situacoesCertificado as $situacaoCertificado) {
            if ($situacaoCertificado->getUsuario()) $nomeUsuario = $situacaoCertificado->getUsuario()->getNome(); else $nomeUsuario = '-';
            $situacoes[] = array('Id' => $situacaoCertificado->getId(),
                utf8_encode('Usuário') => utf8_encode($nomeUsuario),
                'Descricao' => utf8_encode($situacaoCertificado->getSituacao()->getNome()),
                'Data' => $situacaoCertificado->getData('d/m/Y H:i:s'),
                utf8_encode('Comentário') => utf8_encode('<b>' . $situacaoCertificado->getSituacao()->getDescricao() . '</b><br/> >' . $situacaoCertificado->getComentario())
            );
        }

        $colunasSituacoes = array(
            array('nome' => 'Id'), array('nome' => utf8_encode('Usuário')), array('nome' => 'Descricao'),
            array('nome' => 'Data'), array('nome' => utf8_encode('Comentário'))
        );
        $dadosSituacoes = array('mensagem' => 'Ok', 'colunas' => json_encode($colunasSituacoes), 'situacoes' => json_encode($situacoes));
        /*
         * FIM MONTAGEM INFORMACOES SITUACAO
         * */


        echo json_encode($dadosSituacoes);

    }catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}
?>