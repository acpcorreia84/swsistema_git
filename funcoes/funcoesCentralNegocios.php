<?
    date_default_timezone_set('America/Belem');
	require_once $_SERVER['DOCUMENT_ROOT'].'/loader.php';

    $funcao = $_POST['funcao'];


if($funcao == 'carregar_central_negocios') { carregarNegocios(); }
if($funcao == 'informar_feedback_negocio') { informarFeedbackNegocio(); }
if($funcao == 'carregar_informacoes_negocio') { carregarInformacoesNegocio (); }
if($funcao == 'carregar_filtros_negocios') { carregarFiltrosNegocios(); }
if($funcao == 'reativar_negocio') { reativarNegocio(); }

function informarFeedbackNegocio() {
    try {
        $usuarioLogado = ControleAcesso::getUsuarioLogado();
        $certificado = CertificadoPeer::retrieveByPK($_POST['certificadoId']);
        $certificadoSituacao = new CertificadoSituacao();
        $certificadoSituacao->setCertificadoId($certificado->getId());

        /*var_dump($_POST['tipoFeedback'], $_POST['selectFeedback']); exit;*/
        if ($_POST['tipoFeedback'] == 'feedback') {
            $certificadoSituacao->setSituacaoId($_POST['selectFeedback']);
            if ($_POST['tipoNegocio'] != 'Recuperacao')
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


        if (isset($_POST['filtros'])) {
            /*OS FILTROS INDIVIDUAIS*/
            if ($_POST['filtros']['campoFiltro']) {
                $campoFiltro = key($_POST['filtros']['campoFiltro']);
                $valorCampoFiltro = $_POST['filtros']['campoFiltro'][key($_POST['filtros']['campoFiltro'])];
            }
        }



        /*
              * SE SELECIONOU CONSULTORES FILTRA POR ELES
              * CASO CONTRARIO MOSTRA TODOS VINCULADOS AO LOCAL DO USUARIO
             */
        if ($_POST['filtros']['filtroConsultores']) {

            //A PARTIR DAQUI CONSULTORES
            $cUsuarios = new Criteria();
            foreach ($_POST['filtros']['filtroConsultores'] as $consultoresObj)
                $cUsuarios->addOr(UsuarioPeer::ID, $consultoresObj['id']);
            $usuariosObj = UsuarioPeer::doSelect($cUsuarios);

            $i = 1;
            foreach ($usuariosObj as $usuarioConsultor) {
                if ($i==1) {
                    $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuarioConsultor->getId());
                    $i++;
                }
                else
                    $cCertificado->addOr(CertificadoPeer::USUARIO_ID, $usuarioConsultor->getId());

                /*SE FOR SUPERVISOR ADICIONA USUARIOS POR LOCAIS*/
                /*
                 * SE TIVER LOCAL VINCULADO, ACRESCENTA TODOS
                 * OS USUARIOS VINCULADOS A ESTES LOCAIS
                 * */
                $usuariosLocaisObj = $usuarioConsultor->getUsuariosLocaisUsuario();
                $usuariosLocais = array();

                foreach ($usuariosLocaisObj as $usuario)
                    $usuariosLocais[] = $usuario->getId();

                if ($usuariosLocais) {
                    $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuariosLocais, Criteria::IN);
                }


                /*
                 * SE O USUARIO FOR PARCEIRO, ACRESCENTA TODOS
                 * OS USUARIOS VINCULADOS AO MESMO
                 * */
                $usuariosParceiroObj = $usuarioConsultor->getUsuariosParceiroUsuario();
                $usuariosParceiro = array();

                foreach ($usuariosParceiroObj as $usuario) {
                    $usuariosParceiro[] = $usuario->getId();
                }
                if ($usuariosParceiro) {
                    $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuariosParceiro, Criteria::IN);
                }

            }

        }
        /*
             * SE NAO ESCOLHEU NENHUM USUARIO E NAO ESCOLHEU NENHUM FILTRO, MOSTRA TODOS OS CERTIFICADOS
             * PERMITIDOS PARA O USUARIO LOGADO
             * */
        else {

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



        }

        /*GUARDA EM ARRAYS OS IDS DE FOLLOW UP E LOST EM SITUACOES*/
        $cFollow = new Criteria();
        $cFollow->add(SituacaoPeer::SIGLA, 'follow');
        $cFollow->addOr(SituacaoPeer::SIGLA, 'followaux');
        $cFollow->addOr(SituacaoPeer::SIGLA, 'lost');
        $cFollow->addOr(SituacaoPeer::SIGLA, 'lostaux');
        $cFollow->addOr(SituacaoPeer::SIGLA, 'recup');
        $situacoesFollowup = SituacaoPeer::doSelect($cFollow);

        $arrFollow = array();
        $arrLost = array();
        $situacaoLostAux = '';
        $situacaoRecuperacao = '';
        foreach ($situacoesFollowup as $situacaoFollow) {
            if ($situacaoFollow->getSigla()=='follow' || $situacaoFollow->getSigla()=='followaux')
                $arrFollow[] = $situacaoFollow->getId();
            elseif ($situacaoFollow->getSigla()=='lost'  )
                $arrLost[] = $situacaoFollow->getId();
            elseif ($situacaoFollow->getSigla()=='lostaux')
                $situacaoLostAux = $situacaoFollow->getId();
            elseif ($situacaoFollow->getSigla()=='recup')
                $situacaoRecuperacao = $situacaoFollow->getId();
        }

        $cCertificado->add(CertificadoPeer::APAGADO, 0);

        $cCertificado->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, null, Criteria::ISNULL);
        $cCertificado->addOr(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, '0000-00-00 00:00:00');


        $hora_ini = ' 00:00:00';
        $hora_fim = ' 23:59:59';
        $dataDe = date('Y-m-d H:i:s');

        if ($tipoNegocios == 'Urgentes')
            $qtdDias = 7;
        elseif ($tipoNegocios=='UrgentesFollowUp')
            $qtdDias = 10;
        else {
            $qtdDias = 30;
        }
        $dataAte = new DateTime(date('Y-m-d H:i:s'));
        $dataAte->sub(new DateInterval('P'.$qtdDias.'D'));

        $dataDeRecart = new DateTime(date('Y-m-d H:i:s'));
        $dataDeRecart->sub(new DateInterval('P20D'));

        $cCountCertificadosCvp = clone $cCertificado;
        $cCountCertificadosCvp->add(CertificadoPeer::STATUS_FOLLOWUP, $situacaoLostAux);
        $cCountCertificadosCvp->add(CertificadoPeer::DATA_RECARTEIRIZACAO, $dataDeRecart->format('Y-m-d'), Criteria::GREATER_EQUAL);
        $cCountCertificadosCvp->addOr(CertificadoPeer::DATA_RECARTEIRIZACAO, date('Y-m-d'), Criteria::LESS_EQUAL);
        $countCvp20d = CertificadoPeer::doCount($cCountCertificadosCvp);

        $cCountCertificadosRecuperacao = clone $cCertificado;
        $cCountCertificadosRecuperacao->add(CertificadoPeer::STATUS_FOLLOWUP, $situacaoRecuperacao);
        $cCountCertificadosRecuperacao->add(CertificadoPeer::DATA_RECARTEIRIZACAO, $dataDeRecart->format('Y-m-d'), Criteria::GREATER_EQUAL);
        $cCountCertificadosRecuperacao->addOr(CertificadoPeer::DATA_RECARTEIRIZACAO, date('Y-m-d'), Criteria::LESS_EQUAL);
        $countRecuperacao20d = CertificadoPeer::doCount($cCountCertificadosRecuperacao);

        /*
         * FILTRO DE DATAS DE ACORDO COM ESCOLHA DO TIPO DE NEGOCIO
         * */
        if ($tipoNegocios == 'Urgentes' || $tipoNegocios == 'UrgentesFollowUp') {
            $dataAteRenovacao = new DateTime(date('Y-m-d H:i:s'));
            $dataAteRenovacao->sub(new DateInterval('P20D'));


            $cDataCompra = $cCertificado->getNewCriterion(CertificadoPeer::DATA_COMPRA, $dataAte->format('Y-m-d H:i:s'), Criteria::GREATER_EQUAL);
            $cDataCompra->addAnd($cCertificado->getNewCriterion(CertificadoPeer::DATA_COMPRA, $dataDe, Criteria::LESS_EQUAL));
            $cDataCompra->addAnd($cCertificado->getNewCriterion(CertificadoPeer::CERTIFICADO_RENOVADO, null, Criteria::ISNULL));

            $cDataCompraRenovacao = $cCertificado->getNewCriterion(CertificadoPeer::DATA_COMPRA, $dataAteRenovacao->format('Y-m-d H:i:s'), Criteria::GREATER_EQUAL);
            $cDataCompraRenovacao->addAnd($cCertificado->getNewCriterion(CertificadoPeer::DATA_COMPRA, $dataDe, Criteria::LESS_EQUAL));
            $cDataCompraRenovacao->addAnd($cCertificado->getNewCriterion(CertificadoPeer::CERTIFICADO_RENOVADO, 0, Criteria::GREATER_THAN));

            $cDataCompraRenovacao->addOr($cDataCompra);

            $cCertificado->add($cDataCompraRenovacao);

            $cCertificado->addAscendingOrderByColumn(CertificadoPeer::DATA_COMPRA);
            $colunas = array(
                array('nome'=>' '), array('nome'=>'Cod.'), array('nome'=>'Cont.'), array('nome'=>'D.Comp.'), array('nome'=>'D.Venc.'),
                array('nome'=>'Cliente'), array('nome'=>'Tipo'), array('nome'=>'Consultor'), array('nome'=>'Tot'), array('nome'=>utf8_encode('Ações'))
            );

        } elseif ($tipoNegocios == 'Recuperacao') {
            $cCertificado->add(CertificadoPeer::STATUS_FOLLOWUP, $situacaoRecuperacao);
            $cCertificado->add(CertificadoPeer::DATA_RECARTEIRIZACAO, $dataDeRecart->format('Y-m-d'), Criteria::GREATER_EQUAL);
            $cCertificado->addOr(CertificadoPeer::DATA_RECARTEIRIZACAO, date('Y-m-d'), Criteria::LESS_EQUAL);


            $colunas = array(
                array('nome'=>' '), array('nome'=>'Cod.'), array('nome'=>'Cont.'), array('nome'=>'D.CVP'), array('nome'=>'D.Venc.'),
                array('nome'=>'Cliente'), array('nome'=>'Tipo'), array('nome'=>'Consultor'), array('nome'=>'Tot'), array('nome'=>utf8_encode('Ações'))
            );
        } elseif ($tipoNegocios == 'Perdidos') { /*CVP*/
            $cCertificado->add(CertificadoPeer::STATUS_FOLLOWUP, $situacaoLostAux);
            $cCertificado->add(CertificadoPeer::DATA_RECARTEIRIZACAO, $dataDeRecart->format('Y-m-d'), Criteria::GREATER_EQUAL);
            $cCertificado->addOr(CertificadoPeer::DATA_RECARTEIRIZACAO, date('Y-m-d'), Criteria::LESS_EQUAL);
            /*
            * RETIRA A RESTRICAO DE USUARIO PARA QUE TODOS VEJAM O CVP DE TODOS
             * APENAS CASO O USUARIO LOGADO N SEJA PARCEIRO O USUARIO DE PARCEIRO
            * */
            if ($usuarioLogado->getSetorId() != 8)
                $cCertificado->remove(CertificadoPeer::USUARIO_ID);


            $colunas = array(
                array('nome'=>' '), array('nome'=>'Cod.'), array('nome'=>'Cont.'), array('nome'=>'D.CVP'), array('nome'=>'D.Venc.'),
                array('nome'=>'Cliente'), array('nome'=>'Tipo'),  array('nome'=>'Consultor'), array('nome'=>'Tot'), array('nome'=>utf8_encode('Ações'))
            );

        }

        /*
        * FIM DO FILTRO DE DATAS DE ACORDO COM ESCOLHA DO TIPO DE NEGOCIO
        * */
        $cCertificado->setLimit(20);
        $cCertificado->setOffset(0);

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
        $qtdRecuperacao = 0;
        $somaRecuperacao = 0;

        $totaisPedidoRenovacao = array();

        /*
         * ALGORITMO PRA SOMAR AS QUANTIDADES
         * */

        foreach ($certificadosObj as $key=>$certificado)  {

            if ($certificado->getStatusFollowup()) {

                /*
                 * URGENTE COM FEEDBACK
                 * */
                if (array_search($certificado->getStatusFollowup(), $arrFollow )) {

                    if ($certificado->getCertificadoRenovado()==0) {
                        $totaisPedidoRenovacao['urgenteFeedback']['totalPedido'] += $certificado->getProduto()->getPreco() - $certificado->getDesconto();
                        $totaisPedidoRenovacao['urgenteFeedback']['qtdPedido'] += 1;
                    }
                    else {
                        $totaisPedidoRenovacao['urgenteFeedback']['totalRenovacao'] += $certificado->getProduto()->getPreco() - $certificado->getDesconto();
                        $totaisPedidoRenovacao['urgenteFeedback']['qtdRenovacao'] += 1;
                    }
                    $qtdUrgentesComFeedback++;
                    $somaUrgentesComFeedaback += $certificado->getProduto()->getPreco() - $certificado->getDesconto();

                    /*
                     * CVP
                     * */
                } elseif ($certificado->getStatusFollowup()==$situacaoLostAux) {

                    if ($certificado->getCertificadoRenovado()==0) {
                        $totaisPedidoRenovacao['cvp']['totalPedido'] += $certificado->getProduto()->getPreco() - $certificado->getDesconto();
                        $totaisPedidoRenovacao['cvp']['qtdPedido'] += 1;
                    }
                    else {
                        $totaisPedidoRenovacao['cvp']['totalRenovacao'] += $certificado->getProduto()->getPreco() - $certificado->getDesconto();
                        $totaisPedidoRenovacao['cvp']['qtdRenovacao'] += 1;
                    }


                    $qtdLost++;
                    $somaLost += $certificado->getProduto()->getPreco() - $certificado->getDesconto();

                    /*
                     * EM RECUPERACAO
                     * */
                } elseif ($certificado->getStatusFollowup()==$situacaoRecuperacao) {

                    if ($certificado->getCertificadoRenovado()==0) {
                        $totaisPedidoRenovacao['recuperacao']['totalPedido'] += $certificado->getProduto()->getPreco() - $certificado->getDesconto();
                        $totaisPedidoRenovacao['recuperacao']['qtdPedido'] += 1;
                    }
                    else {
                        $totaisPedidoRenovacao['recuperacao']['totalRenovacao'] += $certificado->getProduto()->getPreco() - $certificado->getDesconto();
                        $totaisPedidoRenovacao['recuperacao']['qtdRenovacao'] += 1;
                    }

                    $qtdRecuperacao++;
                    $somaRecuperacao += $certificado->getProduto()->getPreco() - $certificado->getDesconto();


                }



            } else {
                /*
                 * URGENTE SEM FEEDBACK
                 * */
                if ($certificado->getCertificadoRenovado()==0) {
                    $totaisPedidoRenovacao['urgenteSemFeedback']['totalPedido'] += $certificado->getProduto()->getPreco() - $certificado->getDesconto();
                    $totaisPedidoRenovacao['urgenteSemFeedback']['qtdPedido'] += 1;
                }
                else {
                    $totaisPedidoRenovacao['urgenteSemFeedback']['totalRenovacao'] += $certificado->getProduto()->getPreco() - $certificado->getDesconto();
                    $totaisPedidoRenovacao['urgenteSemFeedback']['qtdRenovacao'] += 1;
                }
                $qtdUrgentes++;
                $somaUrgentes += $certificado->getProduto()->getPreco() - $certificado->getDesconto();


            }

        }







        /*
         * ALGORITMO PRA CARREGAR O CERTIFICADO
         * */

        $qtdCount =  0;
        foreach ($certificadosObj as $key=>$certificado)  {

            $diffDatas = (DiferencaEntreDatas(date('Y-m-d'), $certificado->getDataCompra('Y-m-d')));
            /*DEFINE SE E REVOGACAO, EM ABERTO OU RECARTEIRIZACAO*/
            if ($certificado->getCertificadoRenovado()) {
                $tipoCd = '<i class="fa fa-square text-success" title="Renova&ccedil;&atilde;o. Qtd. de dias faltam para o vencimento. "></i>';
                $certificadoRenovado = $certificado->getCertificadoRelatedByCertificadoRenovado();
                if ($certificadoRenovado)
                    $diffDatas = (DiferencaEntreDatas(date('Y-m-d'), $certificadoRenovado->getDataFimValidade('Y-m-d')));
            }elseif ($certificado->getDataRecarteirizacao()) {
                $tipoCd = '<i class="fa fa-square " style="color: purple" title="Recarteiriza&ccedil;&atilde;o"></i>';
            } else {
                $tipoCd = '<i class="fa fa-square" style="color: #0b2c89"  title="Em aberto. Qtd. de dias desde a data de cria&cedil;&atilde;o do pedido."></i>';
            }

            $nomeCliente = ($certificado->getCliente()->getRazaoSocial() != '')?utf8_encode($certificado->getCliente()->getRazaoSocial()):utf8_encode($certificado->getCliente()->getNomeFantasia());
            $usuarioConsultor = $certificado->getUsuario()?$certificado->getUsuario()->getNome():'---';
            $produto = ($certificado->getProduto()) ? utf8_encode($certificado->getProduto()->getNome()) : '---';


            /*
             * NEGOCIOS DO CVP
             * SE TIVER NA TELA DE URGENTE E COM FEEDBACK MOSTRA O CONTATO AO PASSAR O MOUSE EM CIMA DO CLIENTE
             * SE TIVER NA TELA DE CVP MOSTRA AS SITUACOES DAQUELE CLIENTE
             * */
            if ($tipoNegocios == 'Perdidos') {
                $usuarioNegocio = $certificado->getUsuario();

                /*
                * MONTANDO INFORMACOES SITUACAO
                * */
                $cSituacao = new criteria();
                $cSituacao->add(CertificadoSituacaoPeer::CERTIFICADO_ID, $certificado->getId());
                $cSituacao->addDescendingOrderByColumn(CertificadoSituacaoPeer::DATA);
                $situacoesCertificado = $certificado->getCertificadoSituacaos($cSituacao);

                $conteudoPopOver = "<table class='table table-striped '><thead><tr><td><strong>Data</strong></td><td><strong>Coment&aacute;rio</strong></td></tr></thead><tbody>";

                foreach ($situacoesCertificado as $situacaoCertificado) {
                    $conteudoPopOver .= '<tr><td>'.$situacaoCertificado->getData('d/m/Y') .'</td>';
                    $conteudoPopOver .= '<td>'.'<b>'.utf8_encode($situacaoCertificado->getSituacao()->getDescricao()) . '</b><br/> ' .'</td>';

                }

                $conteudoPopOver .= '</tbody></table>';

                $htmlPopOver .= '<script>$("#btnContato'.$certificado->getId().'").popover({title:"Contatos:",content: "'.$conteudoPopOver.'",html: true, placement: "right",trigger: "hover"}); </script>';
                /*
                * FIM MONTAGEM INFORMACOES SITUACAO
                * */

                /*
                 * DESABILITA O BOTAO SE O USUARIO LOGADO FOR PARCEIRO E O USUARIO DO NEGOCIO NAO FOR DELE
                 * OU SE O USUARIO LOGADO FOR CONSULTOR E O USUARIO DO NEGOCIO FOR DE UM PARCEIRO
                 * */
                $btnDesativado = '';
                if ($usuarioNegocio->getSetorId() == 8 && $usuarioNegocio->getId()!= $usuarioLogado->getId()
                ||
                    $usuarioLogado->getSetorId() != 8 && $usuarioNegocio->getSetorId()== 8
                ) $btnDesativado = 'disabled="disabled"';


                $btnDetalhar = '<button class="btn btn-danger"  '.$btnDesativado.'
                title="Reativar neg&oacute;cio" id="btnReativarNegocio'.$certificado->getId().'"  data-toggle="modal" 
                data-target="#"> <i class="fas fa-user-md"></i> 
                </button> <script>';

                /*
                 * SE NO CVP O USUARIO LOGADO FOR PARCEIRO, SO MOSTRA PRA ELE OS CVPS QUE FOREM ESPECIFICAMENTE DELE
                 * */
                if ($usuarioNegocio->getSetorId() == 8 && $usuarioNegocio->getId()== $usuarioLogado->getId())
                    $btnDetalhar .= '$("#btnReativarNegocio'.$certificado->getId().'").on("click", function(){
                                ezBSAlert({
                                    type: "confirm",
                                    messageText: "Tem certeza que deseja reativar o neg&oacute;cio e enviar para a recupera&ccedil;&atilde;o?",
                                    alertType: "primary",
                                    yesButtonText: "Sim",
                                    noButtonText: "N&atilde;o",
                                }).done(function (e) {
                                    if (e) {
                                        reativarNegocio('.$certificado->getId().');
                                    }
    
                                });
                            });
                    </script>';
                elseif ($usuarioLogado->getSetorId() != 8 && $usuarioNegocio->getSetorId()!= 8)
                    $btnDetalhar .= '$("#btnReativarNegocio'.$certificado->getId().'").on("click", function(){
                                ezBSAlert({
                                    type: "confirm",
                                    messageText: "Tem certeza que deseja reativar o neg&oacute;cio e enviar para a recupera&ccedil;&atilde;o?",
                                    alertType: "primary",
                                    yesButtonText: "Sim",
                                    noButtonText: "N&atilde;o",
                                }).done(function (e) {
                                    if (e) {
                                        reativarNegocio('.$certificado->getId().');
                                    }
    
                                });
                            });
                    </script>';


            } else {
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

            }


            if ($certificado->getStatusFollowup()) {

                /*
                 * URGENTE COM FEEDBACK
                 * */
                if (array_search($certificado->getStatusFollowup(), $arrFollow )) {

                    $certificadosUrgentesFollowUp[] = array(' '=>($i++),'Cod.'=>$certificado->getId(),
                        'Cont.'=>$tipoCd.' '.$diffDatas .'d',
                        'D.Comp.'=>($certificado->getDataCompra('d/m/Y'))?$certificado->getDataCompra('d/m/Y'):'-',
                        'D.Venc.'=>($certificadoRenovado)?$certificadoRenovado->getDataFimValidade('d/m/Y'):'-',
                        'Cliente'=> '<a id="btnContato'.$certificado->getId().'" href="telaCertificado.php?funcao=detalhaCertificado&idCertificado='.$certificado->getId().'" target="_blank">'.$certificado->getCliente()->getId() . ' - '.$nomeCliente . '</a>',
                        'Tipo'=>$produto,
                        'Consultor'=>utf8_encode($usuarioConsultor),
                        'Tot'=>formataMoeda($certificado->getProduto()->getPreco() - $certificado->getDesconto()),
                        '.'=>$certificado->getStatusFollowup(),
                        utf8_encode('Ações')=>$btnDetalhar

                    );
                /*
                 * CVP
                 * */
                } elseif ($certificado->getStatusFollowup()==$situacaoLostAux) {

                    $diffDatas = (DiferencaEntreDatas(date('Y-m-d'), $certificado->getDataRecarteirizacao('Y-m-d')));

                    $certificadosPerdidos[] = array(' '=>($j++),'Cod.'=>$certificado->getId(),
                        'Cont.'=>$tipoCd.' '.$diffDatas.'d',
                        'D.CVP'=>($certificado->getDataRecarteirizacao('d/m/Y'))?$certificado->getDataRecarteirizacao('d/m/Y'):'-',
                        'D.Venc.'=>($certificadoRenovado)?$certificadoRenovado->getDataFimValidade('d/m/Y'):'-',
                        'Cliente'=> '<a id="btnContato'.$certificado->getId().'">'.$certificado->getCliente()->getId() . ' - '.$nomeCliente . '</a>',
                        'Tipo'=>$produto,
                        'Consultor'=>utf8_encode($usuarioConsultor),
                        'Tot'=>formataMoeda($certificado->getProduto()->getPreco() - $certificado->getDesconto()),
                        utf8_encode('Ações')=>$btnDetalhar

                    );

                /*
                 * EM RECUPERACAO
                 * */
                } elseif ($certificado->getStatusFollowup()==$situacaoRecuperacao) {
                    $diffDatas = (DiferencaEntreDatas(date('Y-m-d'), $certificado->getDataRecarteirizacao('Y-m-d')));

                    $certificadosRecuperacao[] = array(' '=>($j++),'Cod.'=>$certificado->getId(),
                        'Cont.'=>$tipoCd.' '.$diffDatas.'d',
                        'D.CVP'=>($certificado->getDataRecarteirizacao('d/m/Y'))?$certificado->getDataRecarteirizacao('d/m/Y'):'-',
                        'D.Venc.'=>($certificadoRenovado)?$certificadoRenovado->getDataFimValidade('d/m/Y'):'-',
                        'Cliente'=> '<a id="btnContato'.$certificado->getId().'" href="telaCertificado.php?funcao=detalhaCertificado&idCertificado='.$certificado->getId().'" target="_blank">'.$certificado->getCliente()->getId() . ' - '.$nomeCliente . '</a>',
                        'Tipo'=>$produto,
                        'Consultor'=>utf8_encode($usuarioConsultor),
                        'Tot'=>formataMoeda($certificado->getProduto()->getPreco() - $certificado->getDesconto()),
                        utf8_encode('Ações')=>$btnDetalhar

                    );

                }

            /*
             * URGENTES
             * */

            } else {

                $certificadosUrgentes[] = array(' '=>($l++),'Cod.'=>$certificado->getId(),
                    'Cont.'=>$tipoCd.' '.$diffDatas.'d',
                    'D.Comp.'=>($certificado->getDataCompra('d/m/Y'))?$certificado->getDataCompra('d/m/Y'):'-',
                    'D.Venc.'=>($certificadoRenovado)?$certificadoRenovado->getDataFimValidade('d/m/Y'):'-',
                    'Cliente'=> '<a id="btnContato'.$certificado->getId().'" href="telaCertificado.php?funcao=detalhaCertificado&idCertificado='.$certificado->getId().'" target="_blank">'.$certificado->getCliente()->getId() . ' - '.$nomeCliente . '</a>',
                    'Tipo'=>$produto,
                    'Consultor'=>utf8_encode($usuarioConsultor),
                    'Tot'=>formataMoeda($certificado->getProduto()->getPreco() - $certificado->getDesconto()),
                    '.'=>$certificado->getStatusFollowup(),
                    utf8_encode('Ações')=>$btnDetalhar

                );

            }

        }

        $negocios = '';

        if ($tipoNegocios == 'Urgentes') {
            $negocios = $certificadosUrgentes;
        }
        elseif ($tipoNegocios=='UrgentesFollowUp') {
            $negocios = $certificadosUrgentesFollowUp;
        }
        elseif ($tipoNegocios=='Recuperacao') {
            $negocios = $certificadosRecuperacao;
            if ($somaRecuperacao && $qtdRecuperacao)
                $countRecuperacao20d =  formataMoeda($somaRecuperacao). ' ('.$qtdRecuperacao.')';
        }
        elseif ($tipoNegocios == 'Perdidos'){
            $negocios = $certificadosPerdidos;
            /*
            * SE ELE DETALHOU O CVP, MOSTRA A QTD E A SOMA
            * */
            if ($somaLost && $qtdLost)
                $countCvp20d =  formataMoeda($somaLost). ' ('.$qtdLost.')';

        }

        /*
        * GUARDA OS NEGOCIOS NA SESSAO
        * */
        session_start();
        $arrNegocio = array();
        if (!isset($_SESSION['sessCertificados'.$tipoNegocios]))
            $_SESSION['sessCertificados'.$tipoNegocios] = serialize($certificadosUrgentes);
        else {
            $arrNegocio = unserialize($_SESSION['sessCertificados'.$tipoNegocios]);
            //$arrNegocio.concat($negocios);
        }
        //$_SESSION['sessCertificados'.$tipoNegocios] = '';



        //var_dump($_SESSION['sessCertificados'.$tipoNegocios]);
        //var_dump('arrNegocio:',$arrNegocio);
        //unset($_SESSION['sessCertificados'.$tipoNegocios]);
        //var_dump($_SESSION);exit;

        $totaisPedidoRenovacao['urgenteSemFeedback']['totalPedido'] = formataMoeda($totaisPedidoRenovacao['urgenteSemFeedback']['totalPedido']);
        $totaisPedidoRenovacao['urgenteFeedback']['totalPedido']= formataMoeda($totaisPedidoRenovacao['urgenteFeedback']['totalPedido']);
        $totaisPedidoRenovacao['cvp']['totalPedido']= formataMoeda($totaisPedidoRenovacao['cvp']['totalPedido']);
        $totaisPedidoRenovacao['recuperacao']['totalPedido']= formataMoeda($totaisPedidoRenovacao['recuperacao']['totalPedido']);

        $totaisPedidoRenovacao['urgenteSemFeedback']['totalRenovacao'] = formataMoeda($totaisPedidoRenovacao['urgenteSemFeedback']['totalRenovacao']);
        $totaisPedidoRenovacao['urgenteFeedback']['totalRenovacao']= formataMoeda($totaisPedidoRenovacao['urgenteFeedback']['totalRenovacao']);
        $totaisPedidoRenovacao['cvp']['totalRenovacao']= formataMoeda($totaisPedidoRenovacao['cvp']['totalRenovacao']);
        $totaisPedidoRenovacao['recuperacao']['totalRenovacao']= formataMoeda($totaisPedidoRenovacao['recuperacao']['totalRenovacao']);

        $retorno = array('mensagem'=>'Ok','colunas'=>json_encode($colunas), 'negocios'=>json_encode($negocios),
            'quantidadeTotalUrgentes'=>$qtdUrgentes, 'quantidadeTotalUrgentesComFeedback'=>$qtdUrgentesComFeedback,
            'somaTotalUrgentes' => formataMoeda($somaUrgentes), 'somaTotalUrgentesComFeedback' =>formataMoeda($somaUrgentesComFeedaback),
            'countCvp20d'=>$countCvp20d, 'countRecuperacao20d'=>$countRecuperacao20d, 'htmlContatosPopOver'=>$htmlPopOver,
            'dataDe'=>date('d/m/Y'), 'dataAte'=>$dataAte->format('d/m/Y'), 'tipoNegocio' => $tipoNegocios,
            'totaisPedidoRenovacao'=>json_encode($totaisPedidoRenovacao)
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


function carregarFiltrosNegocios() {
    try {
        $usuarioLogado = ControleAcesso::getUsuarioLogado();
        $cUsuarios =  new Criteria();
        $cUsuarios->add(UsuarioPeer::SITUACAO, 0);

        /*SE FOR DIRETORIA MOSTRA TUDO (OU SEJA, NAO ENTRA NO IF)*/
        if (($usuarioLogado->getPerfilId() != 4) && ($usuarioLogado->getPerfilId()!=11)) {
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
                $cUsuarios->add(UsuarioPeer::ID, $usuariosLocais, Criteria::IN);
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
                $cUsuarios->add(UsuarioPeer::ID, $usuariosParceiro, Criteria::IN);
            }

            if ( (count($usuariosParceiro) == 0 ) && (count($usuariosLocais) == 0 ))
                $cUsuarios->add(UsuarioPeer::ID, $usuarioLogado->getId());

        }

        $cUsuarios->addAscendingOrderByColumn(UsuarioPeer::NOME);
        $usuariosObj = UsuarioPeer::doSelect($cUsuarios);


        $usuarios = array();
        $usuarios[] = array("id"=>'', "nome"=>utf8_encode('Selecione o Usu&aacute;rio'));
        foreach ($usuariosObj as $usuario)
            $usuarios[] = array("id"=>$usuario->getId(), "nome"=>utf8_encode(strtoupper($usuario->getNome())));


        $resultado = array(
            'mensagem'=>'Ok', 'usuarios'=>json_encode( $usuarios)
        );

        echo json_encode($resultado);

    } catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}


function reativarNegocio () {
    try {
        $usuarioLogado = ControleAcesso::getUsuarioLogado();
        $certificado = CertificadoPeer::retrieveByPK($_POST['certificadoId']);
        $certificado->setDataRecarteirizacao(date('Y-m-d H:i:s'));
        $cSit = new Criteria();
        $cSit->add(SituacaoPeer::SIGLA, 'recup');

        $certificadoSituacao = new CertificadoSituacao();
        $certificadoSituacao->setSituacao(SituacaoPeer::doSelectOne($cSit));
        $certificadoSituacao->setCertificadoId($certificado->getId());
        $certificadoSituacao->setComentario('Transferiu o negocio do CVP para a recuperacao, usuario anterior: ' . utf8_encode($certificado->getUsuario()->getNome()) . ' novo usuario: ' . utf8_encode($usuarioLogado->getNome()));
        $certificado->setStatusFollowup($certificadoSituacao->getSituacaoId());
        $certificado->setUsuarioId($usuarioLogado->getId());
        $certificadoSituacao->setUsuarioId($usuarioLogado->getId());
        $certificadoSituacao->setData(date('Y-m-d H:i:s'));
        $certificadoSituacao->save();
        $certificado->save();
        echo json_encode(array('mensagem'=>'Ok'));

    } catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}
?>