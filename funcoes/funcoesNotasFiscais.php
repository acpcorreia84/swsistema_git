<?
    date_default_timezone_set('America/Belem');
	require_once $_SERVER['DOCUMENT_ROOT'].'/loader.php';
	$usuarioLogado = ControleAcesso::getUsuarioLogado();
	$funcao = $_POST['funcao'];



if($funcao == 'carregar_certificados_notas') { carregarCertificadosNotas(); }

function carregarCertificadosNotas() {
    try {

        $cCertificado = new Criteria();

        if (isset($_POST['filtros'])) {
            /*OS FILTROS INDIVIDUAIS*/
            if ($_POST['filtros']['campoFiltro']) {
                $campoFiltro = key($_POST['filtros']['campoFiltro']);
                $valorCampoFiltro = $_POST['filtros']['campoFiltro'][key($_POST['filtros']['campoFiltro'])];
            }

            if ($_POST['filtros']['filtroData'])
                $filtroData = explode(',',$_POST['filtros']['filtroData']);
            else
                $filtroData = explode('01/'.date('m/Y').','.'01/'.date('m/Y'));

            //CONFIRMACAO PAGTO
            $cConfirmacaoPagamentoNull = $cCertificado->getNewCriterion(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, null, Criteria::ISNOTNULL);
            $cConfirmacaoPagamentoNotEqual = $cCertificado->getNewCriterion(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, '0000-00-00 00:00:00', Criteria::NOT_EQUAL);
            $cConfirmacaoPagamentoNull->addAnd($cConfirmacaoPagamentoNotEqual);
            $cCertificado->add($cConfirmacaoPagamentoNull);
            //CONFIRMACAO VALIDACAO
            $cValidacaoNull = $cCertificado->getNewCriterion(CertificadoPeer::DATA_VALIDACAO, null, Criteria::ISNOTNULL);
            $cValidacaoNotEqual = $cCertificado->getNewCriterion(CertificadoPeer::DATA_VALIDACAO, '0000-00-00 00:00:00', Criteria::NOT_EQUAL);
            $cValidacaoNull->addAnd($cValidacaoNotEqual);
            $cConfirmacaoValidacaoNotEqual = $cCertificado->getNewCriterion(CertificadoPeer::CONFIRMACAO_VALIDACAO, 0, Criteria::NOT_EQUAL);
            $cValidacaoNull->addOr($cConfirmacaoValidacaoNotEqual);
            $cCertificado->add($cValidacaoNull);

        }

        $cCertificado->add(CertificadoPeer::APAGADO, 0);

        /*
         * SE FOR SELECIONADO ALGUM CAMPO DE FILTRO PADRAO INSERE NO CRITERIO (MAXIMO DE 30 REGISTROS)
         * SE NAO FAZ A PAGINACAO NORMALMENTE E MOSTRA OS CERTIFICADOS CONSIDERANDO FILTROS ANTERIORES
        */
        $hora_ini = ' 00:00:00';
        $hora_fim = ' 23:59:59';

        /*
         * SE TIVER ESCOLHIDO O FILTRO DE CAMPO NAO PODE FIXAR A DATA
         * */
        if ((!$campoFiltro) && (!$valorCampoFiltro)) {
            $dataDe = explode('/', $filtroData[0]);
            $dataAte = explode('/', $filtroData[1]);
            if ($filtroData) {
                if ($_POST['filtros']['filtroTipoData']=='Pagamento') {
                    $cCertificado->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, $dataDe[2] . '/' . $dataDe[1] . '/' . $dataDe[0] . ' 00:00:00', Criteria::GREATER_EQUAL);
                    $cCertificado->addAnd(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, $dataAte[2] . '/' . $dataAte[1] . '/' . $dataAte[0] . ' 23:59:59', Criteria::LESS_EQUAL);
                    $cCertificado->addDescendingOrderByColumn(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO);
                }elseif ($_POST['filtros']['filtroTipoData']=='Compra') {
                    $cCertificado->add(CertificadoPeer::DATA_COMPRA, $dataDe[2] . '/' . $dataDe[1] . '/' . $dataDe[0] . ' 00:00:00', Criteria::GREATER_EQUAL);
                    $cCertificado->addAnd(CertificadoPeer::DATA_COMPRA, $dataAte[2] . '/' . $dataAte[1] . '/' . $dataAte[0] . ' 23:59:59', Criteria::LESS_EQUAL);
                    $cCertificado->addDescendingOrderByColumn(CertificadoPeer::DATA_COMPRA);
                }elseif ($_POST['filtros']['filtroTipoData']=='Vencimento') {
                    $cCertificado->add(CertificadoPeer::DATA_FIM_VALIDADE, $dataDe[2] . '/' . $dataDe[1] . '/' . $dataDe[0] . ' 00:00:00', Criteria::GREATER_EQUAL);
                    $cCertificado->addAnd(CertificadoPeer::DATA_FIM_VALIDADE, $dataAte[2] . '/' . $dataAte[1] . '/' . $dataAte[0] . ' 23:59:59', Criteria::LESS_EQUAL);
                    $cCertificado->addAscendingOrderByColumn(CertificadoPeer::DATA_FIM_VALIDADE);
                }elseif ($_POST['filtros']['filtroTipoData']==utf8_encode('Validação')) {
                    $cCertificado->add(CertificadoPeer::DATA_VALIDACAO, $dataDe[2] . '/' . $dataDe[1] . '/' . $dataDe[0] . ' 00:00:00', Criteria::GREATER_EQUAL);
                    $cCertificado->addAnd(CertificadoPeer::DATA_VALIDACAO, $dataAte[2] . '/' . $dataAte[1] . '/' . $dataAte[0] . ' 23:59:59', Criteria::LESS_EQUAL);
                    $cCertificado->addDescendingOrderByColumn(CertificadoPeer::DATA_FIM_VALIDADE);
                }elseif ($_POST['filtros']['filtroTipoData']==utf8_encode('Em aberto')) {
                    $cCertificado->add(CertificadoPeer::DATA_COMPRA, $dataDe[2] . '/' . $dataDe[1] . '/' . $dataDe[0] . ' 00:00:00', Criteria::GREATER_EQUAL);
                    $cCertificado->addAnd(CertificadoPeer::DATA_COMPRA, $dataAte[2] . '/' . $dataAte[1] . '/' . $dataAte[0] . ' 23:59:59', Criteria::LESS_EQUAL);
                    $cCertificado->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, null, Criteria::ISNULL);
                    $cCertificado->addDescendingOrderByColumn(CertificadoPeer::DATA_COMPRA);
                }




            }
        }
        /*
         * SE NAO TIVER FILTRO ORDENA OS CAMPOS DE ACORDO COM A DATA UTILIZADA
         * */
        else {
            if ($_POST['filtros']['filtroTipoData']=='Pagamento') {
                $cCertificado->addDescendingOrderByColumn(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO);
            }elseif ($_POST['filtros']['filtroTipoData']=='Compra') {
                $cCertificado->addDescendingOrderByColumn(CertificadoPeer::DATA_COMPRA);
            }elseif ($_POST['filtros']['filtroTipoData']=='Vencimento') {
                $cCertificado->addAscendingOrderByColumn(CertificadoPeer::DATA_FIM_VALIDADE);
            }elseif ($_POST['filtros']['filtroTipoData']==utf8_encode('Validação')) {
                $cCertificado->addDescendingOrderByColumn(CertificadoPeer::DATA_FIM_VALIDADE);
            }elseif ($_POST['filtros']['filtroTipoData']==utf8_encode('Em aberto')) {
                $cCertificado->addDescendingOrderByColumn(CertificadoPeer::DATA_COMPRA);
            }
        }


        /*SE HOUVER FILTRO DE CAMPO SO MOSTRA NO MAXIMO 30 CDS*/
        if ( ($campoFiltro) && ($valorCampoFiltro) ) {
            /*
             * SE O CAMPO NAO TIVER ID OU SEJA USUARIO_ID, BOLETO_ID ADICIONA CRITERIO LIKE %ALGO
             * SE TIVER ID ADICIONA CRITERIO IGUAL A ALGO
             * */
            if (strpos($campoFiltro, 'ID') !== false )
                $cCertificado->add($campoFiltro, $valorCampoFiltro);
            else {
                $cCertificado->add($campoFiltro, $valorCampoFiltro . "%", Criteria::LIKE);
            }

            /*SE A CONSULTA TROUXER MAIS QUE 30 REGISTROS, MOSTRA APENAS 30*/

            $cCertificado->setOffset(0);
            $cCertificado->setLimit(20);
            /*CONSULTA QUANTIDADE ANTES DE INSERIR O LIMITE POR PAGINA*/
        }

        /*CONSULTA QUANTIDADE ANTES DE INSERIR O LIMITE POR PAGINA*/
        $quantidadeCertificados = CertificadoPeer::doCountJoinAll($cCertificado);

        if ($_POST['pagina'])
            $offSet =  ($_POST['pagina']- 1) * $_POST['itensPorPagina'];
        else
            $offSet = 0;

        /*
         * SE NAO TEM CAMPO FILTRO SETADO
         * */
        if ( (!$campoFiltro) && (!$valorCampoFiltro) ) {
            $cCertificado->setOffset($offSet);
            $cCertificado->setLimit($_POST['itensPorPagina']);
        }

        $cCertificado->addJoin(CertificadoPeer::USUARIO_ID, UsuarioPeer::ID, Criteria::JOIN);
        $cCertificado->addJoin(CertificadoPeer::PRODUTO_ID, ProdutoPeer::ID, Criteria::JOIN);
        $cCertificado->addJoin(CertificadoPeer::CLIENTE_ID, ClientePeer::ID, Criteria::JOIN);

        $certificadosObj = CertificadoPeer::doSelect($cCertificado);

        $certificados = array();

        $i = $offSet+ 1;
        $somaCertificadosPagos = 0.0;
        $qtdCertificadosPagos = 0;
        $somaCertificadosEmAberto = 0.0;
        $qtdCertificadosEmAberto = 0;
        foreach ($certificadosObj as $key=>$certificado) {

            $nomeCliente = ($certificado->getCliente()->getRazaoSocial() != '')?utf8_encode($certificado->getCliente()->getRazaoSocial()):utf8_encode($certificado->getCliente()->getNomeFantasia());
            $usuarioConsultor = $certificado->getUsuario()?$certificado->getUsuario()->getNome():'---';
            $usuarioAgr = (($certificado->getUsuarioValidouId())?$certificado->getUsuarioValidouId().'-'.utf8_encode($certificado->getUsuarioRelatedByUsuarioValidouId()->getNome()):'---');
            $produto = ($certificado->getProduto()) ? $certificado->getProduto()->getNome() : '---';

            if ($certificado->getDataConfirmacaoPagamento()) {
                $dataPagamento = $certificado->getDataConfirmacaoPagamento('d/m/Y');
                $situacaoPagamento = '<i class="fa fa-check text-success" title="'.utf8_encode($certificado->getFormaPagamento()->getNome()).'"></i>';
                $somaCertificadosPagos += ($certificado->getProduto()->getPreco() - $certificado->getDesconto());
                $qtdCertificadosPagos += 1;
                /*$btnGerarRecibo = '<button data-toggle="modal" data-target="#gerarRecibo" title="Gerar Recibo" onclick="gerar_recibo('.$certificado->getId().')"> <i class="fa fa-file-pdf-o"></i> </button> ';*/
            }
            else {
                if ($certificado->getDataPagamento()) {
                    $dataPagamento = $certificado->getDataPagamento('d/m/Y');
                    $situacaoPagamento = '<i class="fa fa-circle text-success" title="'.utf8_encode($certificado->getFormaPagamento()->getNome()).'"></i>';
                    $somaCertificadosPagos += ($certificado->getProduto()->getPreco() - $certificado->getDesconto());
                    $qtdCertificadosPagos += 1;
                    /*$btnGerarRecibo = '<button data-toggle="modal" data-target="#gerarRecibo" title="Gerar Recibo" onclick="gerar_recibo('.$certificado->getId().')"> <i class="fa fa-file-pdf-o"></i> </button> ';*/
                }
                else {
                    $dataPagamento = '-';
                    $situacaoPagamento = '<i class="fa fa-circle text-danger" title="'.utf8_encode($certificado->getFormaPagamento()->getNome()).'"></i>';
                    $somaCertificadosEmAberto += ($certificado->getProduto()->getPreco() - $certificado->getDesconto());
                    $qtdCertificadosEmAberto += 1;
                    /*                    $btnBoleto = '<button data-toggle="modal" data-target="#gerarBoleto" title="Gerar Boleto" onclick="carrega_modal_boleto(' . $certificado->getId() . ')"> <i class="fa fa-barcode"></i></button> ';
                                        $btnApagarCertificado = '<a data-toggle="modal" data-target="#apagarCertificado" title="Apagar Certificado" onclick=""> <i class="fa fa-trash"></i> </a> ';
                                        $btnDesconto = '<button data-toggle="modal" data-target="#modalDesconto" title="Desconto" onclick="carregarModalDesconto('.$certificado->getId().');"><i class ="fa fa-tag"></i></button> ';
                                        $btnTrocarProduto = '<button data-toggle="modal" data-target="#modalTrocar" title="Trocar Produto" onclick="$(\'#tcEdtIdCertificado\').val('.$certificado->getId().');carregar_select_produtos(\''.$certificado->getCliente()->getPessoaTipo().'\','.$temDesconto.', '.$certificado->getProdutoId().', \'div_select_produtos_trocarproduto\', \'edtSelectProdutoTrocar\' ); selecionarFormaPagamento('.$certificado->getFormaPagamentoId().');"> <i class="fa fa-retweet"></i></button>' ;*/
                }
            }

            $btnDetalhar = '<button class="btn btn-primary" data-toggle="modal" data-target="#detalharCertificado" title="Detalhar Certificado" id="btnDetalharCertificado" onclick="$(\'#modalCarregando\').modal(\'show\'); carregarModalDetalharCertificado('.$certificado->getId().')"> <i class="fa fa-arrows"></i> </button> ';

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


            /*DEFINE SE E REVOGACAO, EM ABERTO OU RECARTEIRIZACAO*/
            if ($certificado->getCertificadoRenovado()) {
                $tipoCd = '<i class="fa fa-square text-success" title="Renova&ccedil;&atilde;o. Qtd. de dias faltam para o vencimento. "></i>';
            }elseif ($certificado->getDataRecarteirizacao()) {
                $tipoCd = '<i class="fa fa-square " style="color: purple" title="Recarteiriza&ccedil;&atilde;o"></i>';
            } else {
                $tipoCd = '<i class="fa fa-square" style="color: #0b2c89"  title="Em aberto. Qtd. de dias desde a data de cria&cedil;&atilde;o do pedido."></i>';
            }


            $certificados[] = array(' '=>($i++),'Cod.'=>$certificado->getId(),
                'Cont.'=>$tipoCd.' '.(DiferencaEntreDatas(date('Y-m-d'), $certificado->getDataCompra('Y-m-d'))).'d',
                'Pago'=>$situacaoPagamento,
                'D.Pag.'=>$dataPagamento,
                //'Proto.'=> ($certificado->getProtocolo())?$certificado->getProtocolo():'-',
                'Cliente'=> $certificado->getCliente()->getId() . ' - '.$nomeCliente,
                'Tipo'=>$produto,
                'Consultor'=>utf8_encode($usuarioConsultor),
                'Tot'=>formataMoeda($certificado->getProduto()->getPreco() - $certificado->getDesconto()),
                '.'=>utf8_encode($situacaoValidacao),
                utf8_encode('Ações')=>$btnDetalhar

            );

            /*
             * ESCOLHE ENTRE DATA DE VENCIMENTO, DATA DE VALIDACAO OU DATA DA COMPRA
             * DE ACORDO COM O FILTRO ESCOLHIDO PELO USUARIO
             * */
            if (($_POST['filtros']['filtroTipoData']) && ($_POST['filtros']['filtroTipoData']=='Vencimento')) {
                $certificados[$key]['D.Venc.'] = ($certificado->getDataFimValidade('d/m/Y'))?$certificado->getDataFimValidade('d/m/Y'):'-';
            } elseif (($_POST['filtros']['filtroTipoData']) && ($_POST['filtros']['filtroTipoData']==utf8_encode('Validação'))) {
                $certificados[$key]['D.Val.'] = ($certificado->getDataValidacao('d/m/Y')) ? $certificado->getDataValidacao('d/m/Y') : '-';
            } else {
                $certificados[$key]['D.Com.'] = ($certificado->getDataCompra('d/m/Y'))?$certificado->getDataCompra('d/m/Y'):'-';
            }

        }


        if (($_POST['filtros']['filtroTipoData']) && ($_POST['filtros']['filtroTipoData']=='Vencimento')) {
            $colunas = array(
                array('nome'=>' '), array('nome'=>'Cod.'),array('nome'=>'Cont.'), array('nome'=>'Pago'),array('nome'=>'D.Pag.'), array('nome'=>'D.Venc.'), /*array('nome'=>'Proto.'),*/
                array('nome'=>'Cliente'), array('nome'=>'Tipo'), array('nome'=>'Consultor'), array('nome'=>'Tot'), array('nome'=>'.'), array('nome'=>utf8_encode('Ações'))
            );

        } elseif (($_POST['filtros']['filtroTipoData']) && ($_POST['filtros']['filtroTipoData']==utf8_encode('Validação'))) {
            $colunas = array(
                array('nome'=>' '), array('nome'=>'Cod.'),array('nome'=>'Cont.'), array('nome'=>'Pago'),array('nome'=>'D.Pag.'), array('nome'=>'D.Val.'), /*array('nome'=>'Proto.'),*/
                array('nome'=>'Cliente'), array('nome'=>'Tipo'), array('nome'=>'Consultor'), array('nome'=>'Tot'), array('nome'=>'.'), array('nome'=>utf8_encode('Ações'))
            );

        } else {
            $colunas = array(
                array('nome'=>' '), array('nome'=>'Cod.'),array('nome'=>'Cont.'), array('nome'=>'Pago'),array('nome'=>'D.Pag.'), array('nome'=>'D.Com.'), /*array('nome'=>'Proto.'),*/
                array('nome'=>'Cliente'), array('nome'=>'Tipo'), array('nome'=>'Consultor'), array('nome'=>'Tot'), array('nome'=>'.'), array('nome'=>utf8_encode('Ações'))
            );
        }


/*
        $quantidadeCertificadosTotal = array(
            'somaTotalCertificadosPagos'=>formataMoeda($arrQuantidadesPagos[0]['soma']),
            'qtdCertificadosPagos'=>$arrQuantidadesPagos[0]['qtd'],
            'qtdCertificadosEmAberto'=>$arrQuantidadesEmAberto[0]['qtd'],
            'somaTotalCertificadosEmAberto'=>formataMoeda($arrQuantidadesEmAberto[0]['soma']),
            'qtdCertificados'=>$quantidadeCertificados
        );

        $retorno = array('mensagem'=>'Ok','colunas'=>json_encode($colunas), 'certificados'=>json_encode($certificados),
            'quantidadeCertificadosTotal'=>json_encode($quantidadeCertificadosTotal), 'filtroProdutos'=>json_encode($produtos ));

        echo json_encode($retorno);*/
    }catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}


?>