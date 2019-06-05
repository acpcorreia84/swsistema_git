<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

if ($funcao == 'carregar_paginacao'){carregarPaginacao();}
if ($funcao == 'carregar_contas_receber'){carregarContasReceber();}
if ($funcao == 'carregar_detalhes_conta_receber'){carregarDetalheContaReceber();}
if ($funcao == 'carregar_dados_modal_baixar_conta'){carregarDadosModalBaixarConta();}
if ($funcao == 'salvar_conta_receber'){salvarContaReceber();}
if ($funcao == 'extornar_conta_receber'){extornarContaReceber();}
function salvarContaReceber() {
    try {
        $usuarioLogado = ControleAcesso::getUsuarioLogado();
        $dataLancamento = explode('/', $_POST['dataLancamento']);
        $dataLancamento = $dataLancamento[2] . '-' .$dataLancamento[1] . '-' .$dataLancamento[0] . ' ' . date('H:i:s');

        $contaReceber = ContasReceberPeer::retrieveByPK($_POST['contaId']);
        $contaReceber->setDataPagamento($dataLancamento);
        $contaReceber->setBancoId($_POST['banco']);
        $contaReceber->setFormaPagamentoId($_POST['formaPagamento']);
        $contaReceber->setCodigoDocumento($_POST['codigoOperacao']);
        $contaReceber->setObservacao(utf8_decode($_POST['observacao']));

        $certificado = $contaReceber->getCertificado();
        /*PERGUNTA SE O CERTIFICADO EXISTE*/
        if ($certificado) {
            $lancamentoConta = new LancamentoConta();
            $lancamentoConta->setDataLancamento($dataLancamento);
            $lancamentoConta->setDescricao('Baixa da conta: ' . $contaReceber->getDescricao());
            $lancamentoConta->setObservacao($_POST['observacao']);
            $lancamentoConta->setValor($certificado->getProduto()->getPreco() - $certificado->getDesconto());
            $lancamentoConta->setTipo('C');
            $lancamentoConta->setContaReceberId($contaReceber->getId());
            $lancamentoConta->setContaBancariaId($_POST['banco']);


            $certificado->setDataConfirmacaoPagamento($dataLancamento);
            if ($certificado->getDataPagamento())
                $certificado->setDataPagamento($dataLancamento);

            /*TROCA A FORMA DE PAGAMENTO DE GERA UMA SITUACAO NOVA PARA REGISTRAR A MUDANCA*/
            if ($certificado->getFormaPagamentoId() != $_POST['formaPagamento']) {
                $novaFormaPagamento = FormaPagamentoPeer::retrieveByPK($_POST['formaPagamento']);
                $formaPagamentoAnterior = $certificado->getFormaPagamento()->getNome();
                $certificado->setFormaPagamentoId($_POST['formaPagamento']);
                $certSit2 = new CertificadoSituacao();
                $certSit2->setCertificadoId($certificado->getId());
                $certSit2->setUsuarioId($usuarioLogado->getId());
                $cSit2 = new Criteria();
                $cSit2->add(SituacaoPeer::SIGLA, 'edt_pagt');
                $certSit2->setSituacao(SituacaoPeer::doSelectOne($cSit2));
                $certSit2->setData(date("Y-m-d H:i:s"));
                $certSit2->setComentario('Forma de pagamento Anterior:' . $formaPagamentoAnterior . '. Nova Forma de pagamento:' . $novaFormaPagamento->getNome());
            }

            $certSit = new CertificadoSituacao();
            $certSit->setCertificadoId($certificado->getId());
            $cSit = new Criteria();
            $certSit->setUsuarioId($usuarioLogado->getId());
            $cSit->add(SituacaoPeer::SIGLA, 'conf_pag');
            $certSit->setSituacao(SituacaoPeer::doSelectOne($cSit));
            $certSit->setComentario('Baixa manual de pagamento, pelo dep. Financeiro');
            $certSit->setData(date("Y-m-d H:i:s"));

            if( ($_POST['formaPagamento'] == 1) && ($_POST['idBoletoPago'] <> '') )
            {
                $cBoleto = new Criteria();
                $cBoleto->add(BoletoPeer::ID, $_POST['idBoletoPago']);
                $boleto = BoletoPeer::doSelectOne($cBoleto);

                if($boleto)
                {
                    if ($boleto->getDataPagamento())
                        $boleto->setDataPagamento($dataLancamento);

                    $boleto->setDataConfirmacaoPagamento($dataLancamento);

                    $certSit3 = new CertificadoSituacao();
                    $certSit3->setCertificadoId($certificado->getId());
                    $cSit3 = new Criteria();
                    $certSit3->setUsuarioId($usuarioLogado->getId());
                    $cSit3->add(SituacaoPeer::SIGLA, 'pag_bolt');
                    $certSit3->setSituacao(SituacaoPeer::doSelectOne($cSit3));
                    $certSit3->setComentario('Registro de pagamento do boleto n&uacute;mero: ' . $boleto->getId() . ' TID: ' . $boleto->getTid());
                    $certSit3->setData(date("Y-m-d H:i:s"));

                }
            }
            elseif( ($_POST['edtFormaPagamento'] == 1) && ($_POST['edtCodigoDocumento'] == '') )
            {
                js_aviso('Você deve informar o numero(codigo) do boleto!');
                echo '<script language="javascript">window.location="telaLancamentoContaReceber.php"</script>';
            }


        }

        $certificado->save();
        /*SALVA SITUACAO DE BAIXA DE PAGAMENTO*/
        $certSit->save();

        /*SALVA SITUACAO DE ALTERACAO DE FORMA DE PAGAMENTO*/
        if ($certSit2)
            $certSit2->save();

        if ($boleto) {
            $boleto->save();
            /*GRAVA SITUACAO DE BAIXA DE BOLETO*/
            $certSit3->save();
        }

        $contaReceber->save();
        $lancamentoConta->save();

        echo json_encode(array('mensagem'=>'Ok'));
    } catch (Exception $e) {
        var_dump($e);
    }
}

/*
 * FUNCAO QUE CARREGA SELECT DE FORMA DE PAGAMENTO E CONTAS CADASTRADAS
 * PARA LANCAMENTOS DE CONTAS A RECEBER
 *
 * */
function carregarDadosModalBaixarConta() {
    $contaReceber = ContasReceberPeer::retrieveByPK($_POST['idContaReceber']);
    $certificado = $contaReceber->getCertificado();
    $boletosObj = $certificado->getBoletos();
    $formasPagamentoObj = FormaPagamentoPeer::doSelect(new Criteria());
    $bancosObj = BancoPeer::doSelect(new Criteria());

    $boletos = array();
    foreach ($boletosObj as $boleto) {
        $boletos[] = array('id'=>$boleto->getId(), 'nome'=>$boleto->getVencimento('d/m/Y') . ' - ' . formataMoeda($boleto->getValor()) . ' ('. $boleto->getTid() . ')' );
    }

    $formasPagamento = array();
    $formasPagamento[] = array('id'=>'', 'nome'=>'Escolha uma forma de Pagamento');
    foreach ($formasPagamentoObj as $formaPagamento) {
        $formasPagamento[] = array('id'=>$formaPagamento->getId(), 'nome'=>utf8_encode($formaPagamento->getNome()));
    }

    $bancos = array();
    foreach ($bancosObj as $banco) {
        $bancos[] = array('id'=>$banco->getId(), 'nome'=>utf8_encode($banco->getNome()));
    }

    $retorno = array('mensagem'=>'Ok','formasPagamento'=>json_encode($formasPagamento), 'bancos'=>json_encode($bancos), 'boletos'=>json_encode($boletos));

    echo json_encode($retorno);
}
function carregarDetalheContaReceber() {
    $contaReceberObj = ContasReceberPeer::retrieveByPk($_POST['contaId']);

    $retornoSituacoes = '';
    /*SE HOUVER CERTIFICADO CARREGA AS SITUACOES*/
    if ($contaReceberObj->getCertificado()) {
        $nomeEmpresa = ($contaReceberObj->getCertificado()->getCliente()->getRazaoSocial())?($contaReceberObj->getCertificado()->getCliente()->getRazaoSocial()):($contaReceberObj->getCertificado()->getCliente()->getNomeFantasia());
        $descricao = $contaReceberObj->getId(). ' - Compra do produto <strong>' . $contaReceberObj->getCertificado()->getProduto()->getNome() . '</strong> Cliente: ' .
            $nomeEmpresa . ' - <strong>COD CERT</strong>:'.$contaReceberObj->getCertificadoId();

        $certificado = $contaReceberObj->getCertificado();
        $cSituacoes = new Criteria();
        $cSituacoes->addDescendingOrderByColumn(CertificadoSituacaoPeer::DATA);
        $certificadosSituacoesObj = $certificado->getCertificadoSituacaos($cSituacoes);
        $situacoes = array();
        foreach ($certificadosSituacoesObj as $certificadoSituacao) {
            if ($certificadoSituacao->getUsuario())
                $usuario = $certificadoSituacao->getUsuario()->getNome();
            else
                $usuario = '---';
                $situacoes[] = array('Id'=>$certificadoSituacao->getId(), 'Data'=>$certificadoSituacao->getData('d/m/Y H:i:s'), utf8_encode('Usuário')=>utf8_encode($usuario),
                    utf8_encode('Descrição')=>utf8_encode($certificadoSituacao->getSituacao()->getNome()),
                    utf8_encode('Comentário')=>utf8_encode($certificadoSituacao->getComentario())
            );
        }

        $colunasSituacoes = array(
            array('nome'=>'Id'),array('nome'=>'Data'), array('nome'=>utf8_encode('Usuário')), array('nome'=>utf8_encode('Descrição')),
            array('nome'=>utf8_encode('Comentário'))
        );


        /*BUSCA VERIFICAR TODOS OS BOLETOS VINCULADOS AO CERTIFICADO*/
        if ($certificado->getFormaPagamentoId() == 1) {
            $boletos = array();
            $cBoletos = new Criteria();
            $cBoletos->addDescendingOrderByColumn(BoletoPeer::VENCIMENTO);
            $boletosObj = $certificado->getBoletos($cBoletos);

            foreach ($boletosObj as $boleto) {
                if ($boleto->getDataConfirmacaoPagamento())
                    $situacaoBoleto = '<i class="fa fa-check" style="color:#096;"></i> Pago';
                else
                    $situacaoBoleto = '<i class="fa fa-circle" style="color:#ac2925"></i> Em Aberto';

                $boletos[] = array(
                    'Id'=>$boleto->getId(),'Tid'=>$boleto->getTid(),'Data'=>$boleto->getDataProcessamento('d/m/Y'),'Vencimento'=>$boleto->getVencimento('d/m/Y'),
                    'valor'=>formataMoeda($boleto->getValor()),utf8_encode('Situação')=>$situacaoBoleto,
                    'D. Pagt'=>($boleto->getDataConfirmacaoPagamento('d/m/Y'))?($boleto->getDataConfirmacaoPagamento('d/m/Y H:i:s')): '---'
                );

                $colunasBoletos = array(
                    array('nome'=>'Id'),array('nome'=>'Tid'), array('nome'=>'Data'), array('nome'=>'Vencimento'), array('nome'=>'valor'),
                    array('nome'=>utf8_encode('Situação')), array('nome'=>'D. Pagt')
                );

            }

        }

        if ($certificado->getDesconto())
            $valor = formataMoeda($certificado->getProduto()->getPreco()) . ' - ' . formataMoeda($certificado->getDesconto()) . ' = ' . formataMoeda($certificado->getProduto()->getPreco()-$certificado->getDesconto());
        else
            $valor = formataMoeda($certificado->getProduto()->getPreco());

    };

    if ($contaReceberObj->getDataPagamento())
        $situacao = '<i class="fa fa-check" style="color:#096;"></i> Paga';
    else
        $situacao = '<i class="fa fa-circle" style="color:#ac2925"></i> Em Aberto';

    $cLancamentos = new Criteria();
    $cLancamentos->addDescendingOrderByColumn(LancamentoContaPeer::DATA_LANCAMENTO);
    $lancamentosObj = $contaReceberObj->getLancamentoContas($cLancamentos);
    $lancamentos = array();
    foreach ($lancamentosObj as $lancamento) {
        if ($lancamento->getTipo() == 'C') $tipo = 'Baixa'; else $tipo = 'Extorno';
        $contaBancaria = $lancamento->getContaBancaria();
        if ($contaBancaria)
            $banco = $contaBancaria->getBanco() . ': ' . $contaBancaria->getAgencia() . ' - ' . $contaBancaria->getNumeroConta();
        else
            $banco = '---';
        $lancamentos[] = array( 'Id' => $lancamento->getId(), 'Banco' => utf8_decode($banco),
            'Data'=>$lancamento->getDataLancamento('d/m/Y H:i:s'), 'Valor'=> formataMoeda( $lancamento->getValor()), 'T. Lanc.'=> $tipo
        );
    };
    $colunasLancamentos = array(
        array('nome'=>'Id'),array('nome'=>'Banco'), array('nome'=>'Data'), array('nome'=>'Valor'), array('nome'=>'T. Lanc.')
    );

    $dataPagamentoContaReceber = ($contaReceberObj->getDataPagamento('d/m/Y'))?$contaReceberObj->getDataPagamento('d/m/Y'): '---';


    $cComprovantePagamento = new Criteria();
    $cComprovantePagamento->addDescendingOrderByColumn(CertificadoPagamentoPeer::ID);
    $comprovantesPagamentos = $certificado->getCertificadoPagamentos($cComprovantePagamento);
    $comprovantePagamentoObj = $comprovantesPagamentos[0];


    if ($comprovantePagamentoObj) {
        $urlImagemComprovante = '<img src=\"http://'.$_SERVER['HTTP_HOST'].'/media/comprovantes/'.$comprovantePagamentoObj->getId() . '.jpg" title=\"Imagem do comprovante\"/>';
        $urlThumbImagemComprovante = '<img id="imagemDetalheComprovanteId'.$contaReceberObj->getId().'" style="cursor:pointer" src="http://'.$_SERVER['HTTP_HOST'].'/media/comprovantes/'.$comprovantePagamentoObj->getId() . '_p.jpg" title="Imagem do comprovante"/>';
        $urlThumbImagemComprovante .= "<script>$('#imagemDetalheComprovanteId".$contaReceberObj->getId()."').click(function () { alertSucesso('".$urlImagemComprovante."'); });</script>";
    } else {
        $urlImagemComprovante = '';
        $urlThumbImagemComprovante = '';
    }

    $contaReceber = array(
        'id'=>$contaReceberObj->getId(), 'descricao'=>utf8_encode($descricao), 'vencimento'=>$contaReceberObj->getVencimento('d/m/Y'),'valor'=>$valor,
        'formaPagamento'=>($contaReceberObj->getFormaPagamento())?utf8_encode($contaReceberObj->getFormaPagamento()->getNome()):'---','situacaoPagamento'=>$situacao,
        'dataPagamento'=>$dataPagamentoContaReceber,
        'observacao'=>utf8_encode($contaReceberObj->getObservacao()),
        'urlImagemComprovante'=>$urlThumbImagemComprovante
    );

    /*RETORNA OS DADOS DA CONTA A RECEBER, SITUACOES E BOLETOS*/

    $retorno =  array('mensagem'=>'Ok', 'dadosContaReceber'=> json_encode($contaReceber));
    if ($situacoes) {
        $retorno['situacoes'] = json_encode($situacoes);
        $retorno['colunaSituacoes'] = json_encode($colunasSituacoes);
    }

    if ($boletos) {
        $retorno['boletos'] = json_encode($boletos);
        $retorno['colunaBoletos'] = json_encode($colunasBoletos);

    }
    if ($lancamentos) {
        $retorno['lancamentos'] = json_encode($lancamentos);
        $retorno['colunasLancamentos'] = json_encode($colunasLancamentos);

    }

    echo json_encode($retorno);


}
function carregarPaginacao() {
    try {
        if (isset($_POST['filtros'])) {
            if ($_POST['filtros']['filtroData'])
                $filtroData = explode(',',$_POST['filtros']['filtroData']);
            if ($_POST['filtros']['filtroApenasPagas'])
                $filtroApenasPagas = $_POST['filtros']['filtroApenasPagas'];
            if ($_POST['filtros']['campoFiltro']) {
                $campoFiltro = key($_POST['filtros']['campoFiltro']);
                $valorCampoFiltro = $_POST['filtros']['campoFiltro'][key($_POST['filtros']['campoFiltro'])];
            }
        }

        $cCReceber = new Criteria();
        if ($filtroApenasPagas=='true')
            $cCReceber->add(ContasReceberPeer::DATA_PAGAMENTO, null, Criteria::ISNOTNULL);

        /*SE FOR SELECIONADO ALGUM CAMPO DE FILTRO PADRAO INSERE NO CRITERIO E EXCLUI OS DEMAIS*/
        if ( ($campoFiltro) && ($valorCampoFiltro) ) {
            $cCReceber->add($campoFiltro, $valorCampoFiltro);
        } else {

            $cCReceber->add(ContasReceberPeer::SITUACAO, -1, Criteria::NOT_EQUAL);

            if ( $filtroData ) {
                $dataDe = explode('/',$filtroData[0]);
                $dataAte = explode('/',$filtroData[1]);
                $cCReceber->add(ContasReceberPeer::VENCIMENTO, $dataDe[2].'/'.$dataDe[1].'/'.$dataDe[0] . ' 00:00:00', Criteria::GREATER_THAN);
                $cCReceber->addAnd(ContasReceberPeer::VENCIMENTO, $dataAte[2].'/'.$dataAte[1].'/'.$dataAte[0] . ' 23:59:59', Criteria::LESS_EQUAL);
            } else {
                $cCReceber->add(ContasReceberPeer::VENCIMENTO,  date('Y') . '/' . date('m') . '/01 00:00:00' , Criteria::GREATER_THAN);
                $cCReceber->addAnd(ContasReceberPeer::VENCIMENTO, date('Y') . '/' . date('m') . '/' . getLastDayOfMonth(date('m'), date('Y')) . ' 23:59:59', Criteria::LESS_EQUAL);
            }
        }
        $num_rows = ContasReceberPeer::doCountJoinAll($cCReceber);
        echo 'Ok;'.$num_rows;
    }catch(Exception $e){
        echo var_dump($e->getMessage());
    }

}


function carregarContasReceber(){
    try {
        if (isset($_POST['filtros'])) {
            if ($_POST['filtros']['filtroData'])
                $filtroData = explode(',',$_POST['filtros']['filtroData']);
            if ($_POST['filtros']['filtroApenasPagas'])
                $filtroApenasPagas = $_POST['filtros']['filtroApenasPagas'];
            if ($_POST['filtros']['campoFiltro']) {
                $campoFiltro = key($_POST['filtros']['campoFiltro']);
                $valorCampoFiltro = $_POST['filtros']['campoFiltro'][key($_POST['filtros']['campoFiltro'])];
            }
        }

        $cCReceber = new Criteria();
        if ($filtroApenasPagas=='true')
            $cCReceber->add(ContasReceberPeer::DATA_PAGAMENTO, null, Criteria::ISNOTNULL);

        /*SE FOR SELECIONADO ALGUM CAMPO DE FILTRO PADRAO INSERE NO CRITERIO*/
        if ( ($campoFiltro) && ($valorCampoFiltro) ) {
            $cCReceber->add($campoFiltro, $valorCampoFiltro);
            $cCReceber->add(ContasReceberPeer::SITUACAO, -1, Criteria::NOT_EQUAL);
        } else {
            if ($filtroData) {
                $dataDe = explode('/', $filtroData[0]);
                $dataAte = explode('/', $filtroData[1]);
                $cCReceber->add(ContasReceberPeer::VENCIMENTO, $dataDe[2] . '/' . $dataDe[1] . '/' . $dataDe[0] . ' 00:00:00', Criteria::GREATER_THAN);
                $cCReceber->addAnd(ContasReceberPeer::VENCIMENTO, $dataAte[2] . '/' . $dataAte[1] . '/' . $dataAte[0] . ' 23:59:59', Criteria::LESS_EQUAL);
            } else {
                $cCReceber->add(ContasReceberPeer::VENCIMENTO, date('Y') . '/' . date('m') . '/01 00:00:00', Criteria::GREATER_THAN);
                $cCReceber->addAnd(ContasReceberPeer::VENCIMENTO, date('Y') . '/' . date('m') . '/' . getLastDayOfMonth(date('m'), date('Y')) . ' 23:59:59', Criteria::LESS_EQUAL);
            }
            if ($_POST['pagina'])
                $offSet = ($_POST['pagina'] - 1) * $_POST['itensPorPagina'];
            else
                $offSet = 0;
            //var_dump($_POST['itensPorPagina'], $_POST['pagina'], $_POST['itensPorPagina']); exit;
            $cCReceber->setLimit($_POST['itensPorPagina']);
            $cCReceber->setOffset($offSet);
            $cCReceber->addDescendingOrderByColumn(ContasReceberPeer::ID);
        }

        $contasReceberObj = ContasReceberPeer::doSelectJoinAll($cCReceber);


        $contasReceber = array();
        foreach ($contasReceberObj as $key=>$contaReceber) {
            /*SE NAO TIVER CERTIFICADO VINCULADO NAO TEM PQ TER CONTA A RECEBER*/
            if ( $contaReceber->getCertificado() ) {
                /*CHAMA A FUNCAO DE CONFIRMACAO*/
                if ($contaReceber->getCertificado()) {
                    $nomeEmpresa = ($contaReceber->getCertificado()->getCliente()->getRazaoSocial())?($contaReceber->getCertificado()->getCliente()->getRazaoSocial()):($contaReceber->getCertificado()->getCliente()->getNomeFantasia());
                    $descricao = 'Compra do produto <strong>' . $contaReceber->getCertificado()->getProduto()->getNome() . '</strong> Cliente: ' .
                        $contaReceber->getCertificado()->getCliente()->getId() . ' - '. $nomeEmpresa . ' - <strong>COD CERT</strong>:'.$contaReceber->getCertificadoId();
                }
                if ($contaReceber->getDataPagamento())
                    $situacaoPagamento = '<i class="fa fa-check" style="color:#096;"></i>';
                else
                    $situacaoPagamento = '<i class="fa fa-circle" style="color:#ac2925"></i>';

                if ($contaReceber->getFormaPagamento())
                    $formaPagamento = utf8_encode($contaReceber->getFormaPagamento()->getNome());

                /*SEMPRE BUSCANDO O VALOR DA CONTA A RECEBER PELO VALOR DO CERTIFICADO E NAO DA CONTA A RECEBER*/
                $certificado = $contaReceber->getCertificado();

                $cComprovantePagamento = new Criteria();
                $cComprovantePagamento->addDescendingOrderByColumn(CertificadoPagamentoPeer::ID);
                $comprovantesPagamentos = $certificado->getCertificadoPagamentos($cComprovantePagamento);
                $comprovantePagamentoObj = $comprovantesPagamentos[0];


                if ($comprovantePagamentoObj) {
                    $urlImagemComprovante = '<img src=\"http://'.$_SERVER['HTTP_HOST'].'/media/comprovantes/'.$comprovantePagamentoObj->getId() . '.jpg" title=\"Imagem do comprovante\"/>';
                    $urlThumbImagemComprovante = '<img id="imagemComprovanteId'.$contaReceber->getId().'" style="cursor:pointer" src="http://'.$_SERVER['HTTP_HOST'].'/media/comprovantes/'.$comprovantePagamentoObj->getId() . '_p.jpg" title="Imagem do comprovante"/>';
                    $urlThumbImagemComprovante .= "<script>$('#imagemComprovanteId".$contaReceber->getId()."').click(function () { alertSucesso('".$urlImagemComprovante."'); });</script>";
                } else {
                    $urlImagemComprovante = '';
                    $urlThumbImagemComprovante = '';
                }

                /*
                 * CHECA SE POSSUI COMPROVANTE DE PAGAMENTO E SO MOSTRA SE ELE NAO TIVER PAGO
                 * */
                $adicionarConta = true;
                if ($_POST['filtros']['filtroAguardandoConfirmacao']=='true') {
                    $comprovantePagamento = $contaReceber->getCertificado()->getCertificadoPagamentos();
                    //var_dump($contaReceber->getCertificado()->getId());
                    //if ($comprovantePagamento)
                        //var_dump($comprovantePagamento);
                    if ((!$comprovantePagamento) || ($comprovantePagamento && $comprovantePagamento[0]->getDataConfirmacaoPagamento()))
                        $adicionarConta = false;
                }


                if ($adicionarConta)
                    $contasReceber[] =  array(' '=>(++$key),'Id'=>$contaReceber->getId(),'Sit.'=>$situacaoPagamento, 'Data'=> ($contaReceber->getDataDocumento('d/m/Y'))?$contaReceber->getDataDocumento('d/m/Y'):'---',
                        utf8_encode('Descrição')=> utf8_encode($descricao), 'Valor'=> formataMoeda($certificado->getProduto()->getPreco()), 'Venc.'=>$contaReceber->getVencimento('d/m/Y'),
                        'Desc.'=> ($certificado->getDesconto())?formataMoeda($certificado->getDesconto()):'---',
                        'Total'=> formataMoeda($certificado->getProduto()->getPreco() - $certificado->getDesconto()),
                        'Forma' => $formaPagamento,
                        'Comp.' => $urlThumbImagemComprovante,
                        utf8_encode('Ação')=>'<button onclick="carregarDetalhesContaReceber(\''.$contaReceber->getId().'\'); $(\'#modalContaReceberDetalhar\').modal(\'show\')"><i class="fa fa-arrows"></i></button> '
                );
            }
        }

        $colunas = array(
            array('nome'=>' '),array('nome'=>'Id'), array('nome'=>'Sit.'),array('nome'=>'Comp.'), array('nome'=>'Data'), array('nome'=>utf8_encode('Descrição')),
            array('nome'=>'Venc.'),  array('nome'=>'Valor'),  array('nome'=>'Desc.'),  array('nome'=>'Total'),  array('nome'=>'Forma'),
            array('nome'=>utf8_encode('Ação'))
        );

        echo "Ok&&".json_encode($colunas)."&&".json_encode($contasReceber) . "&&";
    }catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}

function extornarContaReceber() {
    try {
        $dataLancamento = date('Y-m-d H:i:s');
        $usuarioLogado = ControleAcesso::getUsuarioLogado();

        $contaReceber = ContasReceberPeer::retrieveByPK($_POST['contaId']);

        /*ANTES DE ALTERAR AS INFORMACOES DA CONTA A RECEBER SETA NO LANCAMENTO*/
        $lancamentoConta = new LancamentoConta();
        $lancamentoConta->setDataLancamento($dataLancamento);
        $lancamentoConta->setDescricao(utf8_decode('Extorno de lançamento da conta: ' . $contaReceber->getDescricao() ) );
        $lancamentoConta->setObservacao('CONTA EXTORNADA. dia:'. date('d/m/Y'));
        $lancamentoConta->setTipo('D');
        $lancamentoConta->setContaReceberId($contaReceber->getId());
        $lancamentoConta->setContaBancariaId($contaReceber->getBancoId());

        $contaReceber->setDataPagamento(null);
        $contaReceber->setBancoId(null);
        $contaReceber->setCodigoDocumento(null);
        $contaReceber->setObservacao('CONTA EXTORNADA. dia:'. date('d/m/Y'));

        $certificado = $contaReceber->getCertificado();
        /*PERGUNTA SE O CERTIFICADO EXISTE*/
        if ($certificado) {
            /*PEGA O VALOR ATRAVES DO CERTIFICADO*/
            $lancamentoConta->setValor($certificado->getProduto()->getPreco() - $certificado->getDesconto());

            $certificado->setDataConfirmacaoPagamento(null);
            $certificado->setDataPagamento(null);

            /*SETA O EXTORNO DE PAGAMENTO*/
            $certSit = new CertificadoSituacao();
            $certSit->setCertificadoId($certificado->getId());
            $cSit = new Criteria();
            $certSit->setUsuarioId($usuarioLogado->getId());
            $cSit->add(SituacaoPeer::SIGLA, 'ext_pagt');
            $certSit->setSituacao(SituacaoPeer::doSelectOne($cSit));
            $certSit->setComentario('Extorno de pagamento, pelo dep. Financeiro');
            $certSit->setData(date("Y-m-d H:i:s"));

        }

        $certificado->save();
        /*SALVA SITUACAO DE BAIXA DE PAGAMENTO*/
        $certSit->save();

        $contaReceber->save();
        $lancamentoConta->save();

        echo json_encode(array('mensagem'=>'Ok'));
    } catch (Exception $e) {
        var_dump($e);
    }

}