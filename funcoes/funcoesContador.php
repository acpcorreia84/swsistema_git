<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

$usuario_id = $_POST['usuario_id'];
$funcao = $_POST['funcao'];
$contador_id = $_POST['contador_id'];

$urlLogoContador = $_SERVER['DOCUMENT_ROOT'].'/img/logoContador';

if ($funcao=='carregar_dados_contador') { carregarDadosContador();}

if ($funcao == 'carregar_paginacao_contadores'){carregarPaginacao();}
if ($funcao == 'carregar_contadores'){carregarContadores();}

if ($funcao== 'salvar_contador'){ salvarContador(); }
if ($funcao== 'inserir_contador'){
    $usuario_id = $_POST['usuario_id'];
    inserir_contador($usuario_id,$arrPermissaoTela,$usuarioLogado->getLocalId());
}
if ($funcao== 'detalhar_contador'){
    detalharContador();
}
if($funcao=='salvar_contato_contador'){
    salvarContatoContador();
}
if($funcao == 'carregarModalAcaoContador'){
    detalhar_acao_contador($contador_id);
}
if($funcao == 'carregarModalAcaoCrm'){
    detalhar_acao_crm($contador_id);
}
if ($funcao== 'carregarModalContatoContador'){
    detalhar_contato_contador($contador_id);
}
if ($funcao== 'excluir_contador'){
    excluir_contador($contador_id,$usuario_id);
}
if ($funcao == 'inserir_observacao'){
    $observacao = $_POST['observacao'];
    inserir_observacao_contador($contador_id,$usuario_id,$observacao);
}

if ($funcao == 'carregar_modal_inserir_editar_contador'){carregarModalInserirEditarContador();}

if ($funcao == 'carregar_filtros_contadores') carregarFiltrosContadores();

if ($funcao == 'apagar_contato_contador') apagarContatoContador();

if ($funcao=='listarCertificadosContador') {
    listarCertificadosContador();
}

if($funcao == 'registrar_comissao_contador') {registrarComissaoContador();}
if($funcao == 'registrar_lancamento_comissao_contador') {registrarLancamentoComissaoContador();}
if($funcao == 'apagar_lancamento_comissao_contador') {apagarLancamentoComissaoContador();}
if($funcao == 'apagar_registro_comissao_contador') {apagarRegistroComissaoContador();}

//if ($funcao == 'permite_registrar_comissao') {permiteRegistrarComissao();};

/*
 * RELATORIO COMISSIONAMENTO CONTADOR
 * */

if($funcao == 'carregar_contadores_relatorio_comissao') {carregarContadoresRelatorioComissao();}
if($funcao == 'informar_pagamento_extorno_comissao_contador') {informarPagamentoExtornoComissaoContador();}

if($funcao == 'inserir_observacao_comissao_contador') {inserirObservacaoComissaoContador();}

function inserirObservacaoComissaoContador() {
    try {
        $comissaoContador = ContadorComissionamentoPeer::retrieveByPK($_POST['registro_comissao_id']);

        $comissaoContador->setObservacao(utf8_decode($_POST['observacao']));
        $comissaoContador->save();
        echo json_encode(array('mensagem'=>'Ok'));
    }catch(Exception $e){
        echo var_dump($e->getMessage());
    }

}
function carregarContadoresRelatorioComissao () {
    try {
        $cContador = new Criteria();
        if ($_POST['filtros']['filtroPeriodoComissao'])
            $filtroData = explode(',',$_POST['filtros']['filtroPeriodoComissao']);

        if ($_POST['filtros']['campoFiltro']) {
            $campoFiltro = key($_POST['filtros']['campoFiltro']);
            $valorCampoFiltro = $_POST['filtros']['campoFiltro'][key($_POST['filtros']['campoFiltro'])];
            $cContador->add($campoFiltro, $valorCampoFiltro . '%', Criteria::LIKE);
        }

        if ($filtroData) {
            $dataDe = explode('/', $filtroData[0]);
            $dataAte = explode('/', $filtroData[1]);
        }


        /*
            * SE SELECIONOU CONSULTORES FILTRA POR ELES
            * CASO CONTRARIO MOSTRA TODOS VINCULADOS AO LOCAL DO USUARIO
           */
        if ($_POST['filtros']['filtroConsultores']) {
            $i = 1;
            foreach ($_POST['filtros']['filtroConsultores'] as $consultoresObj) {
                if ($i==1) {
                    $cContador->add(ContadorPeer::USUARIO_ID, $consultoresObj['id']);
                    $i++;
                }
                else
                    $cContador->addOr(ContadorPeer::USUARIO_ID, $consultoresObj['id']);
            }

        }

        /*
         * FILTRA APENAS CONTADORES QUE POSSUEM CARTAO
         * */
        if ($_POST['filtros']['filtroPossuiCartao']) {
            if ($_POST['filtros']['filtroPossuiCartao']=='true')
                $cContador->add(ContadorPeer::POSSUI_CARTAO, 1);
            elseif ($_POST['filtros']['filtroPossuiCartao']=='false') {
                $cContador->add(ContadorPeer::POSSUI_CARTAO, 1, Criteria::NOT_EQUAL);
            }
        }

        /*
         * FILTRA APENAS OS CONTADORES QUE JA TEM COMISSAO REGISTRADA
         * */
        if ($_POST['filtros']['filtroRegistrouComissao']) {

            if ($_POST['filtros']['filtroRegistrouComissao']=='true') {
                $cContador->add(ContadorComissionamentoPeer::PERIODO_INICIAL, $dataDe[2] . '/' . $dataDe[1] . '/' . $dataDe[0] . ' 00:00:00');
                $cContador->addAnd(ContadorComissionamentoPeer::PERIODO_FINAL, $dataAte[2] . '/' . $dataAte[1] . '/' . $dataAte[0] . ' 00:00:00');

                $cContador->add(ContadorComissionamentoPeer::DATA_REGISTRO, null, Criteria::ISNOTNULL);
                $cContador->addOr(ContadorComissionamentoPeer::DATA_REGISTRO, '0000-00-00 00:00:00', Criteria::NOT_EQUAL);

                $cContador->add(ContadorComissionamentoPeer::SITUACAO, -1, Criteria::NOT_EQUAL);
                $cContador->addDescendingOrderByColumn(ContadorComissionamentoPeer::VENDA);

                /*
                 * FILTRA POR CONTADORES PAGOS E NAO PAGOS
                 * */
                if ($_POST['filtros']['filtroSomentePagos']=='true') {
                    $cContador->add(ContadorComissionamentoPeer::DATA_PAGAMENTO, null, Criteria::ISNOTNULL);
                    $cContador->addAnd(ContadorComissionamentoPeer::DATA_PAGAMENTO, '0000-00-00 00:00:00', Criteria::NOT_EQUAL);
                }
                elseif ($_POST['filtros']['filtroSomentePagos']=='false') {
                    $cContador->add(ContadorComissionamentoPeer::DATA_PAGAMENTO, null, Criteria::ISNULL);
                    $cContador->addOr(ContadorComissionamentoPeer::DATA_PAGAMENTO, '0000-00-00 00:00:00', Criteria::EQUAL);
                }

            }
            elseif ($_POST['filtros']['filtroRegistrouComissao']=='false') {
                $cContador->add(ContadorComissionamentoPeer::DATA_REGISTRO, null, Criteria::ISNULL);
                $cContador->addOr(ContadorComissionamentoPeer::DATA_REGISTRO, '0000-00-00 00:00:00', Criteria::EQUAL);

                $cContador->addJoin(ContadorPeer::ID, CertificadoPeer::CONTADOR_ID, Criteria::JOIN);
                $cContador->add(CertificadoPeer::DATA_VALIDACAO, $dataDe[2] . '/' . $dataDe[1] . '/' . $dataDe[0] . ' 00:00:00', Criteria::GREATER_THAN);
                $cContador->addAnd(CertificadoPeer::DATA_VALIDACAO, $dataAte[2] . '/' . $dataAte[1] . '/' . $dataAte[0] . ' 23:59:59', Criteria::LESS_EQUAL);

                $cContador->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, null, Criteria::ISNOTNULL);
                $cContador->addAnd(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, '0000-00-00 00:00:00', Criteria::NOT_EQUAL);

            }

        }
        else {
            $cContador->addAscendingOrderByColumn(ContadorPeer::NOME);
            $cContador->addJoin(ContadorPeer::ID, CertificadoPeer::CONTADOR_ID, Criteria::JOIN);
            $cContador->add(CertificadoPeer::DATA_VALIDACAO, $dataDe[2] . '/' . $dataDe[1] . '/' . $dataDe[0] . ' 00:00:00', Criteria::GREATER_THAN);
            $cContador->addAnd(CertificadoPeer::DATA_VALIDACAO, $dataAte[2] . '/' . $dataAte[1] . '/' . $dataAte[0] . ' 23:59:59', Criteria::LESS_EQUAL);

            $cContador->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, null, Criteria::ISNOTNULL);
            $cContador->addAnd(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, '0000-00-00 00:00:00', Criteria::NOT_EQUAL);

            $cContador->add(CertificadoPeer::APAGADO, 0);

        }

        $cContador->add(ContadorPeer::COMISSAO, 1);

        $cContador->add(ContadorPeer::SITUACAO, -1, Criteria::NOT_EQUAL);
        $cContador->addAscendingOrderByColumn(ContadorPeer::NOME);

        $cContador->addJoin(ContadorPeer::ID, ContadorComissionamentoPeer::CONTADOR_ID, Criteria::LEFT_JOIN);
        $cContador->addGroupByColumn(ContadorPeer::ID);

        $quantidadeTotalContadores = ContadorPeer::doCountJoinAll($cContador);
        if ($_POST['pagina'])
            $offSet =  ($_POST['pagina']- 1) * $_POST['itensPorPagina'];
        else
            $offSet = 0;

        $cContador->setLimit($_POST['itensPorPagina']);
        $cContador->setOffset($offSet);
        $contadoresObj = ContadorPeer::doSelectJoinAll($cContador);


        $contadores = array();
        $i = $offSet+ 1;
        foreach ($contadoresObj as $key=>$contador) {
            $cRegistroComissao = new Criteria();
            $cRegistroComissao->add(ContadorComissionamentoPeer::SITUACAO, -1, Criteria::NOT_EQUAL);
            $cRegistroComissao->add(ContadorComissionamentoPeer::CONTADOR_ID, $contador->getId());

            if ($filtroData) {
                $dataDe = explode('/',$filtroData[0]);
                $dataAte = explode('/',$filtroData[1]);

                $cRegistroComissao->add(ContadorComissionamentoPeer::PERIODO_INICIAL, $dataDe[2].'/'.$dataDe[1].'/'.$dataDe[0]);
                $cRegistroComissao->add(ContadorComissionamentoPeer::PERIODO_FINAL, $dataAte[2].'/'.$dataAte[1].'/'.$dataAte[0]);
            } else {
                $cRegistroComissao->add(ContadorComissionamentoPeer::PERIODO_INICIAL, date('Y').'-'.(date('m')-1).'-01');
                $cRegistroComissao->add(ContadorComissionamentoPeer::PERIODO_FINAL, date('Y').'-'.(date('m')-1).'-'.getLastDayOfMonth((date('m')-1), date('Y')));
            }
            /*$contador = new Contador();*/
            $registroComissao = $contador->getContadorComissionamentos($cRegistroComissao);

            $somaTotalComissionamento = 0.0;

            if ($registroComissao) {
                $registroComissao = $registroComissao[0];

                if ($registroComissao->getComissaoVenda())
                    $somaTotalComissionamento += $registroComissao->getVenda() * ($registroComissao->getComissaoVenda()/100);

                $cLancamentoComissao = new Criteria();
                $cLancamentoComissao->add(ContadorLancamentoPeer::SITUACAO, -1, Criteria::NOT_EQUAL);
                $lancamentosComissao = $registroComissao->getContadorLancamentos($cLancamentoComissao);

                $somaDescontosLancamentos = 0;
                $somaAcrescimosLancamentos = 0;
                foreach ($lancamentosComissao as $lancamentoComissao) {
                    if (trim($lancamentoComissao->getTipoLancamento()) == 'C')
                        $somaAcrescimosLancamentos += $lancamentoComissao->getValor();
                    elseif (trim($lancamentoComissao->getTipoLancamento()) == 'D')
                        $somaDescontosLancamentos += $lancamentoComissao->getValor();
                }
                /*if ($registroComissao->getId() == 17)
                    var_dump($somaTotalComissionamento, $somaAcrescimosLancamentos, $somaDescontosLancamentos);*/
                $somaTotalComissionamento = $somaTotalComissionamento + ($somaAcrescimosLancamentos -  $somaDescontosLancamentos);


                $descricaoRegistroComissao = utf8_encode($registroComissao->getDescricao());
                if ($registroComissao->getDataPagamento())
                    $pago = 'checked="checked"';
                else
                    $pago = '';

                $dataPagamento = $registroComissao->getDataPagamento() ? $registroComissao->getDataPagamento('d/m/Y H:i:s') : '---';

                $btnPago = '<input type="checkbox" id="chkPago'.$contador->getId().'" '.$pago.' data-onstyle="danger" data-offstyle="success">
                <script>
                $(function() {
                    $("#chkPago'.$contador->getId().'").bootstrapToggle({
                        on: "Extornar",
                        off: "Pagar"
                    });
                    
                    $("#chkPago'.$contador->getId().'").change(function() {
                        
                        if ($(this).prop("checked"))
                            informarPagamentoExtornoComissaoContador('.$registroComissao->getId().', "pagar");
                        else
                            informarPagamentoExtornoComissaoContador('.$registroComissao->getId().', "extornar");
                    });
                });
                </script>';
            }
            else {
                $dataPagamento = '---';
                $descricaoRegistroComissao = '---';
                $btnPago = 'Necessita Registro';
            }


            $btnDetalhar = '<button class="btn btn-primary" onclick="sincronizarDataPeriodoComissao(\'filtroPeriodoComissao\'); carregarModalDetalharContador(\''.$contador->getId().'\'); $(\'#detalharContador\').modal(\'show\'); "><i class="fa fa-arrows"></i></button>';

            if ($contador->getLocal()) $local = $contador->getLocal()->getNome();


            $valor = formataMoeda($somaTotalComissionamento);
            if ($contador->getNome())
                $nomeContador = utf8_encode($contador->getNome());
            elseif ($contador->getRazaoSocial())
                $nomeContador = utf8_encode($contador->getRazaoSocial());
            elseif ($contador->getNomeFantasia())
                $nomeContador = utf8_encode($contador->getNomeFantasia());

            $contadores[] =  array(' '=>($i++),'Id'=>$contador->getId(),'Nome'=>$nomeContador. ' '. $btnDetalhar,
                'Consultor'=>utf8_encode($contador->getUsuario()->getNome()),
                'Localidade'=> utf8_encode($contador->getCidade() .'/' . $contador->getUf()),
                'Dados'=> utf8_encode($contador->getBanco()). '<br/> (Ag: ' .$contador->getAgencia() .') <strong> CC:' . $contador->getContaCorrente() .'</strong> - Op:'. $contador->getOperacao(),
                'Registro'=>$descricaoRegistroComissao, 'Pagto.'=>$dataPagamento, 'Valor' =>$valor,
                utf8_encode('A��o')=>$btnPago
            );
        }/*FIM DO FOR*/

        $colunas = array(
            array('nome'=>' '),array('nome'=>'Id'), array('nome'=>'Nome'),array('nome'=>'Consultor'), array('nome'=>'Localidade'),
            array('nome'=>'Dados'),array('nome'=>'Registro'),  array('nome'=>'Pagto.'),array('nome'=>'Valor'), array('nome'=>utf8_encode('A��o'))
        );

        echo json_encode(array('mensagem'=>'Ok', 'colunas'=>json_encode($colunas), 'dadosContadores'=>json_encode($contadores), 'quantidadeContadores'=>$quantidadeTotalContadores));
    } catch (Exception $e ) {
        echo var_dump($e->getMessage());
    }
}

function informarPagamentoExtornoComissaoContador () {
    try {
        $registroComissao = ContadorComissionamentoPeer::retrieveByPK($_POST['registroComissaoId']);
        if ($_POST['acao']=='pagar')
            $registroComissao->setDataPagamento(date('Y/m/d H:i:s'));
        elseif ($_POST['acao']=='extornar')
            $registroComissao->setDataPagamento(null);

        $registroComissao->save();

        echo json_encode(array('mensagem'=>'Ok'));
    } catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}


function apagarRegistroComissaoContador() {
    try {
        $registroComissao = ContadorComissionamentoPeer::retrieveByPK($_POST['idRegistroComissao']);
        $registroComissao->setSituacao(-1);
        $registroComissao->save();

        echo json_encode(array('mensagem'=>'Ok'));
    } catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}

function registrarLancamentoComissaoContador () {
    try {
        $lancamentoComissao = new ContadorLancamento();
        $lancamentoComissao->setDataLancamento(date('Y/m/d H:i:s'));
        $lancamentoComissao->setDescricao(utf8_decode($_POST['descricao']));
        $lancamentoComissao->setTipoLancamento($_POST['tipoLancamento']);
        $lancamentoComissao->setContadorComissionamentoId($_POST['comissionamento_id']);
        $lancamentoComissao->setValor($_POST['valor']);
        $lancamentoComissao->setObservacao($_POST['observacao']);
        $lancamentoComissao->setSituacao(0);
        $lancamentoComissao->save();

        echo json_encode(array('mensagem'=>'Ok'));
    } catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}

function apagarLancamentoComissaoContador () {
    try {
        $lancamentoComissao = ContadorLancamentoPeer::retrieveByPK($_POST['idLancamentoComissaoContador']);
        $lancamentoComissao->setSituacao(-1);
        $lancamentoComissao->save();

        echo json_encode(array('mensagem'=>'Ok'));
    } catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}


function registrarComissaoContador() {
    try {
        //Cabe�alho do modal detalhar usuario
        $comissaoContador =  new ContadorComissionamento();
        $comissaoContador->setDescricao(utf8_decode($_POST['descricao']));
        $periodoDe = explode('/',$_POST['periodoDe']);
        $periodoAte = explode('/',$_POST['periodoAte']);
        $periodoDe = $periodoDe[2] . "/" .$periodoDe[1] . "/" .$periodoDe[0];
        $periodoAte = $periodoAte[2] . "/" .$periodoAte[1] . "/" .$periodoAte[0];

        $comissaoContador->setPeriodoInicial($periodoDe);
        $comissaoContador->setPeriodoFinal($periodoAte);

        $venda = $_POST['vendas'];

        $comissaoContador->setVenda($venda);

        $comissaoContador->setComissaoVenda($_POST['comissaoVendas']);
        $comissaoContador->setContadorId($_POST['idContador']);

        $comissaoContador->setDataRegistro(date('Y/m/d H:i:s'));
        $comissaoContador->setSituacao(0);

        $comissaoContador->save();


        /*REGISTRA OS CERTIFICADOS REVOGADOS*/
        if ($_SESSION['totalLancamentosAntigos']) {

            $totalLancamentosAntigos = unserialize($_SESSION['totalLancamentosAntigos']);
            unset($_SESSION['totalLancamentosAntigos']);

            $lancamentoComissao = new ContadorLancamento();
            $lancamentoComissao->setDataLancamento(date('Y/m/d H:i:s'));
            $lancamentoComissao->setDescricao(utf8_decode($totalLancamentosAntigos['descricao']));
            $lancamentoComissao->setTipoLancamento('C');
            $lancamentoComissao->setContadorComissionamentoId($comissaoContador->getId());
            $lancamentoComissao->setValor($totalLancamentosAntigos['valor']);
            $lancamentoComissao->setSituacao(0);

            $lancamentoComissao->save();

        }

        echo json_encode(array('mensagem'=>'Ok'));
    }catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}
function carregarContadores(){
    try {
        $usuarioLogado = ControleAcesso::getUsuarioLogado();

        if (isset($_POST['filtros'])) {
            if ($_POST['filtros']['filtroData'])
                $filtroData = explode(',',$_POST['filtros']['filtroData']);
            if ($_POST['filtros']['campoFiltro']) {
                $campoFiltro = key($_POST['filtros']['campoFiltro']);
                $valorCampoFiltro = $_POST['filtros']['campoFiltro'][key($_POST['filtros']['campoFiltro'])];
            }

            if ($_POST['filtros']['filtroDataComissaoContador'])
                $filtroDataComissao = explode(',',$_POST['filtros']['filtroDataComissaoContador']);

        }


        $cContador = new Criteria();
        $cContador->add(ContadorPeer::SITUACAO, -1, Criteria::NOT_EQUAL);

        /*
* FILTRA APENAS CONTADORES QUE POSSUEM CARTAO
* */
        $cContador->add(ContadorPeer::SYNC_SAFE, 1);
        if ($_POST['filtros']['filtroChkSyncSafe']) {
            if ($_POST['filtros']['filtroChkSyncSafe']=='true')
                $cContador->add(ContadorPeer::SYNC_SAFE, 1);
            elseif ($_POST['filtros']['filtroChkSyncSafe']=='false') {
                $cContador->add(ContadorPeer::SYNC_SAFE, 0);
            }
        }


        if ($_POST['filtros']['filtroChkRecebeComissao']) {
            if ($_POST['filtros']['filtroChkRecebeComissao']=='true')
                $cContador->add(ContadorPeer::COMISSAO, 1);
            elseif ($_POST['filtros']['filtroChkRecebeComissao']=='false')
                $cContador->add(ContadorPeer::COMISSAO, 1, Criteria::NOT_EQUAL);
        }

        if ($_POST['filtros']['filtroChkConcedeDesconto']) {
            if ($_POST['filtros']['filtroChkConcedeDesconto']=='true')
                $cContador->add(ContadorPeer::DESCONTO, 1);
            elseif ($_POST['filtros']['filtroChkConcedeDesconto']=='false')
                $cContador->add(ContadorPeer::DESCONTO, 1, Criteria::NOT_EQUAL);
        }

        if ($_POST['filtros']['filtroPossuiCartao']) {
            if ($_POST['filtros']['filtroPossuiCartao']=='true')
                $cContador->add(ContadorPeer::POSSUI_CARTAO, 1);
            elseif ($_POST['filtros']['filtroPossuiCartao']=='false') {
                $cContador->add(ContadorPeer::POSSUI_CARTAO, 1, Criteria::NOT_EQUAL);
            }
        }

        /*SE FOR SELECIONADO ALGUM CAMPO DE FILTRO PADRAO INSERE NO CRITERIO*/
        if ( ($campoFiltro) && ($valorCampoFiltro) ) {
            $cContador->add($campoFiltro, $valorCampoFiltro . '%', Criteria::LIKE);
        } else {
            if ($filtroData) {
                $dataDe = explode('/', $filtroData[0]);
                $dataAte = explode('/', $filtroData[1]);
                $cContador->add(ContadorPeer::DATA_CADASTRO, $dataDe[2] . '/' . $dataDe[1] . '/' . $dataDe[0] . ' 00:00:00', Criteria::GREATER_THAN);
                $cContador->addAnd(ContadorPeer::DATA_CADASTRO, $dataAte[2] . '/' . $dataAte[1] . '/' . $dataAte[0] . ' 23:59:59', Criteria::LESS_EQUAL);
            }

        }
        /*
         * SE FOR DA DIRETORIA PULA
         * SE NAO FOR DA DIRETORIA E NAO TIVER ESCOLHIDO NENHUM FILTRO DE CAMPO E DE CONSULTORES SO MOSTRA OS CERTIFICADOS
         * DOS USUARIOS DOS PARCEIROS OU CASO SEJA SUPERVISOR DAS AREAS DOS MESMOS
        */
        if ( ( ($usuarioLogado->getPerfilId() != 4) && ($usuarioLogado->getPerfilId()!=11)) && (!$campoFiltro) && (!$valorCampoFiltro) && (!$_POST['filtroConsultores']) )
        {
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
                $cContador->add(ContadorPeer::USUARIO_ID, $usuariosLocais, Criteria::IN);
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
                $cContador->add(ContadorPeer::USUARIO_ID, $usuariosParceiro, Criteria::IN);
            }

            if ((count($usuariosParceiro) == 0) && (count($usuariosLocais) == 0))
                $cContador->add(ContadorPeer::USUARIO_ID, $usuarioLogado->getId());


        }

        /*
            * SE SELECIONOU CONSULTORES FILTRA POR ELES
            * CASO CONTRARIO MOSTRA TODOS VINCULADOS AO LOCAL DO USUARIO
           */
        if ($_POST['filtros']['filtroConsultores']) {
            $i = 1;
            foreach ($_POST['filtros']['filtroConsultores'] as $consultoresObj) {
                if ($i==1) {
                    $cContador->add(ContadorPeer::USUARIO_ID, $consultoresObj['id']);
                    $i++;
                }
                else
                    $cContador->addOr(ContadorPeer::USUARIO_ID, $consultoresObj['id']);
            }

        }

        if ($filtroDataComissao) {
            $cContador->addJoin(ContadorPeer::ID, CertificadoPeer::CONTADOR_ID, Criteria::JOIN);
            $dataDe = explode('/', $filtroDataComissao[0]);
            $dataAte = explode('/', $filtroDataComissao[1]);

            $cContador->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, null, Criteria::ISNOTNULL);
            $cContador->addAnd(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, '0000-00-00 00:00:00', Criteria::NOT_EQUAL);

            $cContador->add(CertificadoPeer::DATA_VALIDACAO, $dataDe[2] . '/' . $dataDe[1] . '/' . $dataDe[0] . ' 00:00:00', Criteria::GREATER_THAN);
            $cContador->addAnd(CertificadoPeer::DATA_VALIDACAO, $dataAte[2] . '/' . $dataAte[1] . '/' . $dataAte[0] . ' 23:59:59', Criteria::LESS_EQUAL);

            $cContador->addGroupByColumn(ContadorPeer::ID);

        }

        $quantidadeContadores = ContadorPeer::doCountJoinAll($cContador);

        if ($_POST['pagina'])
            $offSet = ($_POST['pagina'] - 1) * $_POST['itensPorPagina'];
        else
            $offSet = 0;

        $cContador->setLimit($_POST['itensPorPagina']);
        $cContador->setOffset($offSet);
        $cContador->addDescendingOrderByColumn(ContadorPeer::DATA_CADASTRO);

        $contadoresObj = ContadorPeer::doSelectJoinAll($cContador);

        $i = $offSet+ 1;
        $contadores = array();
        $htmlPopOver = '';
        foreach ($contadoresObj as $key=>$contador) {
            $cContatosContador = new Criteria();
            $cContatosContador->add(ContadorContatoPeer::SITUACAO, -1, Criteria::NOT_EQUAL);
            $contatosContadores = $contador->getContadorContatos($cContatosContador);
            if ($contatosContadores) {
                $conteudoPopOver = "<table class='table table-striped '><thead><tr><td><strong>Nome</strong></td><td><strong>Celular</strong></td><td><strong>Telefone</strong></td></tr></thead><tbody>";
                foreach ($contatosContadores as $contato) {
                    $celular = ($contato->getCelular())?$contato->getCelular():'-';
                    $telefone = ($contato->getFone())?$contato->getFone():'-';
                    $conteudoPopOver .= '<tr><td>'.utf8_encode($contato->getNome()) .'</td>';
                    $conteudoPopOver .= '<td>'.$celular .'</td>';
                    $conteudoPopOver .= '<td>'.$telefone .'</td>';
                }
                $conteudoPopOver .= '</tbody></table>';

                $htmlPopOver .= '<script>$("#btnContato'.$contador->getId().'").popover({title:"Contatos:",content: "'.$conteudoPopOver.'",html: true, placement: "right",trigger: "hover"}); </script>';

            } else
                $conteudoPopOver = '';

            //var_dump($htmlPopOver);

            if ($contador->getRazaoSocial())
                $nomeEscritorio = utf8_encode($contador->getRazaoSocial());
            elseif ($contador->getNomeFantasia())
                $nomeEscritorio = utf8_encode($contador->getNomeFantasia());
            else
                $nomeEscritorio = '-';
            $desconto = ($contador->getDesconto() == 1) ? '<i class="fa fa-thumbs-o-up text-info " aria-hidden="true"  title="Concede Desconto"></i>' : '<i class="fa fa-thumbs-o-down text-danger" aria-hidden="true" title="N&atilde;o Concede Desconto"></i>';
            $comissao = ($contador->getComissao() == 1) ? '<i class="fa fa-thumbs-o-up text-info" aria-hidden="true" title="Recebe Comiss&atilde;o"></i>' : '<i class="fa fa-thumbs-o-down text-danger" aria-hidden="true" title="N&atilde;o Recebe Comiss&atilde;o"></i>';

            if ($conteudoPopOver)
                $nomeContador = ($contador->getNome())?utf8_encode('<a id="btnContato'.$contador->getId().'"><i class="fa fa-address-book" aria-hidden="true"></i> '.$contador->getNome().'</a>'):'-';
            else
                $nomeContador = ($contador->getNome())?utf8_encode($contador->getNome()):'-';

            if ($contador->getSyncSafe() == 1)
                $sincronizado = '<i class="fa fa-flag-checkered text-info " aria-hidden="true"  title="Sincronizado com a Safe"></i>' ;
            else
                $sincronizado = '<i class="fa fa-flag-checkered text-danger" aria-hidden="true"  title="Nao sincronizado"></i>';


            $contadores[] =  array(' '=>($i++),
                'Id'=>$contador->getId(), 'Cod.'=>$contador->getCodContador() ? $contador->getCodContador() : '-',
                'Nome'=>$nomeContador, utf8_encode('Escritorio')=>$nomeEscritorio,
                'Consultor'=> ($contador->getUsuarioId())?utf8_encode($contador->getUsuario()->getNome()):'---',
                'Local'=>($contador->getLocalId())?utf8_encode($contador->getLocal()->getNome()):'---',
                'D.Cadas.'=> $contador->getDataCadastro('d/m/Y'),
                '*'=>$desconto, '**'=>$comissao, '-'=>$sincronizado,
                utf8_encode('Acao')=>'<button class="btn btn-primary" onclick="carregarModalDetalharContador(\''.$contador->getId().'\',\'sim\'); $(\'#detalharContador\').modal(\'show\'); "><i class="fa fa-arrows"></i></button> '
            );
        }

        $colunas = array(
            array('nome'=>' '),array('nome'=>'Id'),array('nome'=>'Cod.'), array('nome'=>'Nome'), array('nome'=>utf8_encode('Escritorio')),array('nome'=>'Consultor'),
            array('nome'=>'Local'),  array('nome'=>'D.Cadas.'),
            array('nome'=>'**'), array('nome'=>'*'), array('nome'=>'-'),
            array('nome'=>utf8_encode('Acao'))
        );

        echo json_encode(
            array('mensagem'=>"Ok", 'quantidadeContadores'=>$quantidadeContadores,
                'colunas'=>json_encode($colunas), 'dadosContadores'=>json_encode($contadores),
                'htmlContatosContadorPopOver'=>$htmlPopOver
            )
        );
    }catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}

function gerarCodigoContador($nome){
    try{
        if( isset($nome)&&($nome != "") ) {

            //DIVIDE AS PALAVRAS DO NOME
            $letra = explode(" " , $nome );

            //PEGA A PRIMEIRA LETRA DO PRIMEIRO NOME
            $letra1 = strtoupper(substr($letra[0], 0, 1));

            //PEGA A PRIMEIRA LETRA DO SEGUNDO NOME
            $letra2 = strtoupper(substr($letra[1] , 0, 1));

            //ACRESCENTA O ANO E DATA NO MESMO
            $codigoGerado = $letra1.$letra2.date('Y').date('d');

        }

        $encontrou = false;
        $novoCodigo = '';
        while (!$encontrou) {
            if ($novoCodigo)
                $codigoTeste = $novoCodigo;
            else
                $codigoTeste = $codigoGerado;

            //TESTA SE JA EXISTE ALGUM CONTADOR COM ESTE CODIGO
            $codContador = new Criteria();
            $codContador->add(ContadorPeer::COD_CONTADOR , $codigoTeste, Criteria::EQUAL);
            $codContador = ContadorPeer::doSelectOne($codContador);

            if($codContador){
                $numeroAleatorio = rand(0,9);
                $novoCodigo = $codigoGerado.$numeroAleatorio;
            }
            else
                $encontrou = true;
        }
/*        var_dump($codigoGerado);
        var_dump($novoCodigo);*/
        if ($novoCodigo)
            return $novoCodigo;
        else
            return $codigoGerado;

    }catch (Exception $e){
        echo $e->getMessage().'Erro ao tentar gerar c&oacute;digo do contador.';
    }
}
function salvarContador(){
    try{
        if ($_POST['acao']=='inserir') {
            $contador = new Contador();
            $contador->setCodContador(gerarCodigoContador(removeAcentos($_POST['nome'])));
            $contador->setDataCadastro(date('Y-m-d H:i:s'));
        }
        elseif ($_POST['acao']=='editar') {
            $arrAlteracoes = array();
            $contador = ContadorPeer::retrieveByPk($_POST['contador_id']);

            if (!$contador->getCodContador())
                $contador->setCodContador(gerarCodigoContador(removeAcentos($_POST['nome'])));
        }

        if (utf8_encode($contador->getNome()) != $_POST['nome'])
            $arrAlteracoes['nome'] = 'O campo nome foi alterado, nome anterior: ' . utf8_encode($contador->getNome()).' novo nome:'.utf8_encode($_POST['nome']);

        $contador->setNome(utf8_decode($_POST['nome']));
        if ($contador->getPessoaTipo() != $_POST['pessoaTipo']) {
            $anterior = $contador->getPessoaTipo()=='F'?utf8_encode('Pessoa F�sica'):utf8_encode('Pessoa Jur�dica');
            $novo = $_POST['pessoaTipo']=='F'?utf8_encode('Pessoa F�sica'):utf8_encode('Pessoa Jur�dica');
            $arrAlteracoes['pessoaTipo'] = 'O campo tipo de contador foi alterado, antes:' . $anterior.
            ' | depois:'.$novo;

        }
        $contador->setPessoaTipo($_POST['pessoaTipo']);

        if ($contador->getPossuiCartao() != $_POST['possuiCartao']) {
            $anterior = $contador->getPossuiCartao()==1?utf8_encode('Possui Cart�o'):utf8_encode('Conta Banc�ria');
            $novo = $_POST['possuiCartao']==1?utf8_encode('Possui Cart�o'):utf8_encode('Conta Banc�ria');
            $arrAlteracoes['possuiCartao'] = 'O campo possui cart&atilde;o foi alterado, antes:' . $anterior.
                ' | depois:'.$novo;

        }
        $contador->setPossuiCartao($_POST['possuiCartao']);

        if ($contador->getTipoContador() != $_POST['tipoProfissional']) {
            $anterior = ($contador->getPessoaTipo()=='profissional')?utf8_encode('Profissional'):utf8_encode('Estudante');
            $novo = $_POST['tipoProfissional']=='profissional'?utf8_encode('Profissional'):utf8_encode('Estudante');
            $arrAlteracoes['tipoProfissional'] = 'O campo Tipo Profissional foi alterado, antes: ' . $anterior.
                ' | depois: '.$novo;
        }

        $contador->setTipoContador($_POST['tipoProfissional']);

        $nascimentoAux = explode("/",$_POST['nascimento']);
        $nascimento = $nascimentoAux[2]."-".$nascimentoAux[1]."-".$nascimentoAux[0];
        if ($contador->getNascimento('Y-m-d') != $nascimento)
            $arrAlteracoes['nascimento'] = 'O campo nascimento foi alterado, antes:' . $contador->getNascimento('d/m/Y').
            ' | depois:'.$nascimentoAux[0]."/".$nascimentoAux[1]."/".$nascimentoAux[2];


        $contador->setNascimento($nascimento);

        if ($contador->getCpf() != $_POST['cpf'])
            $arrAlteracoes['cpf'] = 'O campo cpf foi alterado, antes:' . $contador->getCpf().
                ' | depois: '.$_POST['cpf'];

        $contador->setCpf($_POST['cpf']);

        if ($contador->getCrc() != $_POST['crc'])
            $arrAlteracoes['crc'] = 'O campo crc foi alterado, antes:' . $contador->getCrc().
                ' | depois: '.$_POST['crc'];

        $contador->setCrc($_POST['crc']);

        if ($contador->getEmail() != $_POST['emailContador'])
            $arrAlteracoes['emailContador'] = 'O campo E-mail do contador foi alterado, antes:' . $contador->getEmail().
                ' | depois: '.$_POST['emailContador'];

        $contador->setEmail($_POST['emailContador']);

        $alterouConsultor = false;
        if (($contador->getUsuarioId()) && ($contador->getUsuarioId() != $_POST['usuario'])) {
            $arrAlteracoes['usuario'] = 'O consultor do contador foi alterado, anterior: ' . utf8_encode($contador->getUsuario()->getNome()).
                ' | depois: '.$_POST['nomeUsuario'];

            $alterouConsultor = true;
        }

        $contador->setUsuarioId($_POST['usuario']);

        if (($contador->getLocalId()) && ($contador->getLocalId() != $_POST['local']))
            $arrAlteracoes['local'] = 'O local do contador foi alterado, anterior: ' . utf8_encode($contador->getLocal()->getNome()).
                ' | depois: '.$_POST['nomeLocal'];

        $contador->setLocalId($_POST['local']);

        if (utf8_encode($contador->getRazaoSocial()) != $_POST['razaoSocial'])
            $arrAlteracoes['razaoSocial'] = 'A razao social do contador foi alterado, anterior: ' . utf8_encode($contador->getRazaoSocial()).
                ' | depois: '.utf8_encode($_POST['razaoSocial']);

        $contador->setRazaoSocial(utf8_decode($_POST['razaoSocial']));
        $contador->setCnpj($_POST['cnpj']);

        if (utf8_encode($contador->getNomeFantasia()) != $_POST['nomeFantasia'])
            $arrAlteracoes['nomeFantasia'] = 'O nome fantasia do contador foi alterado, anterior: ' . utf8_encode($contador->getNomeFantasia()).
                ' | depois: '.utf8_encode($_POST['nomeFantasia']);

        $contador->setNomeFantasia(utf8_decode($_POST['nomeFantasia']));

        if ($contador->getFone1() != $_POST['fone1'])
            $arrAlteracoes['fone1'] = 'O telefone do escritorio do contador foi alterado, anterior: ' . utf8_encode($contador->getFone1()).
                ' | depois: '.$_POST['fone1'];

        $contador->setFone1($_POST['fone1']);

        if ($contador->getCelular() != $_POST['celular'])
            $arrAlteracoes['celular'] = 'O celular do escritorio do contador foi alterado, anterior: ' . utf8_encode($contador->getCelular()).
                ' | depois: '.$_POST['celular'];


        if ($_POST['celular'])
            $contador->setCelular($_POST['celular']);

        if ($contador->getCep() != $_POST['cep'])
            $arrAlteracoes['cep'] = 'O cep do escritorio do contador foi alterado, anterior: ' . utf8_encode($contador->getCep()).
                ' | depois: '.$_POST['cep'];

        $contador->setCep($_POST['cep']);

        if (utf8_encode($contador->getEndereco()) != $_POST['endereco'])
            $arrAlteracoes['endereco'] = 'O endereco do escritorio do contador foi alterado, anterior: ' . utf8_encode($contador->getEndereco()).
                ' | depois: '.$_POST['endereco'];

        $contador->setEndereco(utf8_decode($_POST['endereco']));
        if (utf8_encode($contador->getNumero()) != $_POST['numero'])
            $arrAlteracoes['numero'] = 'O endereco do escritorio do contador foi alterado, anterior:  ' . utf8_encode($contador->getNumero()).
                ' | depois: '.$_POST['numero'];

        $contador->setNumero($_POST['numero']);

        if (utf8_encode($contador->getComplemento()) != $_POST['complemento'])
            $arrAlteracoes['complemento'] = 'O complemento do escritorio do contador foi alterado, anterior: ' . utf8_encode($contador->getComplemento()).
                ' | depois: '.$_POST['complemento'];

        $contador->setComplemento(utf8_decode($_POST['complemento']));

        if (utf8_encode($contador->getBairro()) != $_POST['bairro'])
            $arrAlteracoes['bairro'] = 'O bairro do escritorio do contador foi alterado, anterior: ' . utf8_encode($contador->getBairro()).
                ' | depois: '.$_POST['bairro'];

        $contador->setBairro(utf8_decode($_POST['bairro']));

        if (utf8_encode($contador->getCidade()) != $_POST['cidade'])
            $arrAlteracoes['cidade'] = 'A cidade do contador foi alterada, anterior: ' . utf8_encode($contador->getCidade()).
                ' | depois: '.$_POST['cidade'];

        $contador->setCidade(utf8_decode($_POST['cidade']));

        if (utf8_encode($contador->getUf()) != $_POST['uf'])
            $arrAlteracoes['uf'] = 'O Estado do contador foi alterado, anterior: ' . utf8_encode($contador->getUf()).
                ' | depois: '.utf8_encode($_POST['uf']);

        $contador->setUf($_POST['uf']);

        if ($contador->getEmailEmpresa() != $_POST['emailEscritorio'])
            $arrAlteracoes['emailEscritorio'] = 'O e-mail do escritorio contabil foi alterado, anterior: ' . utf8_encode($contador->getEmailEmpresa()).
                ' | depois: '.utf8_encode($_POST['emailEscritorio']);

        $contador->setEmailEmpresa($_POST['emailEscritorio']);

        if ($contador->getComissao() != $_POST['comissao']) {
            $anterior = ($contador->getComissao()==1)?'Recebia':utf8_encode('N�o Recebia');
            $novo = ($_POST['comissao']==1)?'Recebe':utf8_encode('N�o Recebe');
            $arrAlteracoes['comissao'] = 'A informacao de comissionamento foi alterada, anterior: ' . $anterior.
            ' | depois: '.$novo;
        }

        $contador->setComissao($_POST['comissao']);

        if ($contador->getDesconto() != $_POST['desconto']) {
            $anterior = ($contador->getDesconto()==1)?'Concedia':utf8_encode('N�o Concedia');
            $novo = ($_POST['desconto']==1)?'Concede':utf8_encode('N�o Concede');
            $arrAlteracoes['desconto'] = 'A informacao de desconto foi alterada, anterior: ' . $anterior.
                ' | depois: '.$novo;
        }

        $contador->setDesconto($_POST['desconto']);

        if (utf8_encode($contador->getBanco()) != $_POST['banco'])
            $arrAlteracoes['banco'] = 'O banco do contador foi alterado, anterior: ' . utf8_encode($contador->getBanco()).
                ' | depois: '.utf8_encode($_POST['nomeBanco']);

        $contador->setBanco(utf8_decode($_POST['banco']));
        if ($contador->getContaCorrente() != $_POST['contaCorrente'])
            $arrAlteracoes['contaCorrente'] = 'A conta corrente do contador foi alterada, anterior: ' . utf8_encode($contador->getContaCorrente()).
                ' | depois: '.utf8_encode($_POST['contaCorrente']);

        $contador->setContaCorrente($_POST['contaCorrente']);

        if ($contador->getAgencia() != $_POST['agencia'])
            $arrAlteracoes['agencia'] = 'A agencia do contador foi alterada, anterior: ' . utf8_encode($contador->getAgencia()).
                ' | depois: '.utf8_encode($_POST['agencia']);

        $contador->setAgencia($_POST['agencia']);
        $contador->setOperacao($_POST['operacao']);
        if ($contador->getCpfCnpjConta() != $_POST['cpfCnpjConta'])
            $arrAlteracoes['cpfCnpjConta'] = 'O documento vinculado a conta do contador foi alterado, anterior: ' . utf8_encode($contador->getCpfCnpjConta()).
                ' | depois: '.utf8_encode($_POST['cpfCnpjConta']);

        $contador->setCpfCnpjConta($_POST['cpfCnpjConta']);
        $contador->setSituacao(0);

        if (!$contador->validate()) {
            $mensagemErro = '';
            foreach ($contador->getValidationFailures() as $falha)
                $mensagemErro .= $falha->getMessage() . '<br/>';

            throw new Exception($mensagemErro);
        }

        $contador->save();

        if ($alterouConsultor)
            enviarEmailTrocaConsultorContador($_POST['usuario'], $contador);

        /*
         * SE ESTA INSERINDO UM CONTADOR, INSERE OS PRIMEIROS CONTATOS A ELE
         * */
        if ($_POST['acao']=='inserir') {
            if ($_POST['nomeContato'] && $_POST['cargoContato'] ) {
                $contatoContador = new ContadorContato();
                $contatoContador->setNome(utf8_decode($_POST['nomeContato']));
                $contatoContador->setFone($_POST['telefoneContato']);
                $contatoContador->setCelular($_POST['celularContato']);
                $contatoContador->setCargo(utf8_decode($_POST['cargoContato']));
                $contatoContador->setEmail($_POST['emailContato']);
                $contatoContador->setContadorId($contador->getId());
                if (!$contatoContador->validate()) {
                    $mensagemErro = '';
                    foreach ($contatoContador->getValidationFailures() as $falha)
                        $mensagemErro .= $falha->getMessage() . '<br/>';

                    throw new Exception($mensagemErro);
                }
                $contatoContador->save();
            }

            inserirObservacaoContador($contador->getId(), utf8_encode('Inseriu o novo contador atrav�s do Sistema'));
        }
        else {
            $mensagemAlteracao ='';

            foreach ($arrAlteracoes as $key=>$alteracao)
                $mensagemAlteracao .= '- '.$alteracao . '<br>';

            /*
             * SE HOUVE ALTERACAO EM ALGUM DOS CAMPOS INSERE NO DETALHE DO CONTADOR
             * */
            if ($mensagemAlteracao)
                inserirObservacaoContador($contador->getId(), $mensagemAlteracao);
        }
        echo json_encode(array('mensagem'=>'Ok'));


    }catch(Exception $e){
        echo $e->getMessage();
    }
}

function inserirObservacaoContador ($contadorId, $mensagem) {
    $usuarioLogado = ControleAcesso::getUsuarioLogado();
    $contadorDetalhar = new ContadorDetalhar();
    $contadorDetalhar->setUsuarioId($usuarioLogado->getId());
    $contadorDetalhar->setContadorId($contadorId);
    $contadorDetalhar->setDataCadastro(date('Y-m-d H:i:s'));
    $contadorDetalhar->setDescricao(utf8_decode($mensagem));
    $contadorDetalhar->save();
}

function getUsuariosVinculados() {
    $usuarioLogado = ControleAcesso::getUsuarioLogado();
    /*SE FOR DIRETORIA MOSTRA TUDO (OU SEJA, NAO ENTRA NO IF)*/
    if (($usuarioLogado->getPerfilId() != 4) && ($usuarioLogado->getPerfilId()!=11)) {

        /*
         * SE O USUARIO FOR PARCEIRO, ACRESCENTA TODOS
         * OS USUARIOS VINCULADOS AO MESMO
         * */
        $usuariosParceiroObj = $usuarioLogado->getUsuariosParceiroUsuario();
        $usuariosParceiro = array();

        foreach ($usuariosParceiroObj as $usuario)
            $usuariosParceiro[] = $usuario->getId();

        if ($usuariosParceiro)
            $sqlUsuarios = 'and usuario.ID in (' .implode(',',$usuariosParceiro) . ')';

        /*
         * SE TIVER LOCAL VINCULADO, ACRESCENTA TODOS
         * OS USUARIOS VINCULADOS A ESTES LOCAIS
         * */
        $usuariosLocaisObj = $usuarioLogado->getUsuariosLocaisUsuario();
        $usuariosLocais = array();
        foreach ($usuariosLocaisObj as $usuario)
            $usuariosLocais[] = $usuario->getId();
        /*var_dump(count($usuariosLocais));
        var_dump(count($usuariosParceiro));*/
        if ( count($usuariosLocais) > 0)
            $sqlUsuarios = 'and usuario.ID in (' .implode(',',$usuariosLocais) . ')';
    }

    if (count($usuariosParceiro) == 0 && count($usuariosLocais)==0)
        $sqlUsuarios = 'and usuario.ID = ' . $usuarioLogado->getId();

    $sql = 'SELECT usuario.ID as id, usuario.NOME as nome , count(contador.id) as qtd FROM usuario JOIN contador ON (usuario.ID=contador.USUARIO_ID) where contador.situacao = 0 ';
    $sql .= $sqlUsuarios;
    $sql .=' GROUP BY usuario.ID HAVING count(contador.ID)>0 order by usuario.nome';

    $con = Propel::getConnection();
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $usuariosObj = $stmt->fetchAll();

    return $usuariosObj;
}

function listarCertificadosContador() {
    $cCertificados = new Criteria();
    $cCertificados->add(CertificadoPeer::APAGADO, 0);

    /*
     * CONFIRMACAO VALIDACAO
     * 1: EMITIDO
     * 2: RENOVADO
     * NAO CONSIDERAR PENDENTE CODIGO 3
     * */
    $cCertificados->add(CertificadoPeer::CONFIRMACAO_VALIDACAO, array(1,2), Criteria::IN);
    if (($_POST['dataDe']) && ($_POST['dataAte'])) {
        $dataDe = explode('/',$_POST['dataDe']);
        $dataAte = explode('/',$_POST['dataAte']);
        $cCertificados->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, $dataDe[2].'-'.$dataDe[1].'-'.$dataDe[0], Criteria::GREATER_EQUAL);
        $cCertificados->addAnd(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, $dataAte[2].'-'.$dataAte[1].'-'.$dataAte[0], Criteria::LESS_EQUAL);
    }

    $cCertificados->add(CertificadoPeer::CONTADOR_ID, $_POST['contadorId']);
    $arrCertificados = CertificadoPeer::doSelect($cCertificados);

    $certificados = array();
    foreach ($arrCertificados as $key=>$certificado) {
        /*CHECA SE ESTA PAGO*/
        if ($certificado->getDataConfirmacaoPagamento()) {
            $pago = "<i class='fa fa-check' style='color:#096;'></i>";
        } elseif ($certificado->getDataPagamento()) {
            $pago = "<i class='fa fa-circle' style='color:#096;'></i>";
        } else {
            $pago = "<i class='fa fa-circle' style='color:#ff9900;'></i>";
        }

        $cSit = new Criteria();
        $cSit->addDescendingOrderByColumn(CertificadoSituacaoPeer::ID);
        $situacoes = $certificado->getCertificadoSituacaos($cSit);

        if($certificado->getConfirmacaoValidacao() <> 0){
            if($certificado->getConfirmacaoValidacao() == 1) {
                $titulo = 'APROVADO';
                $situacaoCert = 'VALIDOU ('.$certificado->getDataValidacao('d/m/Y').') <i class="fa fa-flag" style="color:#096;" title="'.$titulo.'" ></i>';
            }
            elseif( ($certificado->getConfirmacaoValidacao() == 2) || ($certificado->getConfirmacaoValidacao() == 3)) {
                $titulo = 'PENDENTE';
                $situacaoCert = 'PENDENTE ('.$certificado->getDataValidacao('d/m/Y').') <i class="fa fa-flag" style="color:#FF0;" title="'.$titulo.'" ></i>';
            }elseif($certificado->getConfirmacaoValidacao() == 4) {
                $titulo = 'REVOGADO';
                $situacaoCert = 'REVOGADO ('.$certificado->getDataValidacao('d/m/Y').') <i class="fa fa-flag" style="color:#f00;" title="' . $titulo . '" ></i>';
            }else {
                $titulo = 'SEM STATUS';
                $situacaoCert = 'VALIDOU ('.$certificado->getDataValidacao('d/m/Y').') <i class="fa fa-flag" style="color:#FF0;" title="'.$titulo.'" ></i>';
            }
        }	else {
            if ($situacoes[0]->getSituacao()->getId() == 6)
                $situacaoCert = 'VALIDOU (' . $certificado->getDataValidacao('d/m/Y') . ') <i class="fa fa-flag" style="color:#F60;" title="PENDENTE NA SAFEWEB" ></i>';
            else
                $situacaoCert = $situacoes[0]->getSituacao()->getNome();
        }

        if ($certificado->getCliente()->getRazaoSocial())
            $nomeCliente = $certificado->getCliente()->getRazaoSocial();
        else
            $nomeCliente = $certificado->getCliente()->getNomeFantasia();
        //////
        $certificados[] =
            array(
                "Codigo"=>$certificado->getId(),"Pago"=>$pago, "Dt. Pgto"=>$certificado->getDataConfirmacaoPagamento('d/m/Y'),
                "Protocolo"=>$certificado->getProtocolo(), "Cliente"=>utf8_encode($nomeCliente) , "Compra"=>$certificado->getDataCompra('d/m/Y'),
                "Certificado"=>utf8_encode($certificado->getProduto()->getNome()), "Vendedor"=>utf8_encode($certificado->getUsuario()->getNome()), "Ult.Sit." => utf8_encode($situacaoCert)

            );
    }

    $colunas = array(
        array('nome'=>'Codigo'), array('nome'=>'Pago'), array('nome'=>'Dt. Pgto'),
        array('nome'=>'Protocolo'), array('nome'=>'Cliente'), array('nome'=>'Compra'),
        array('nome'=>'Certificado'), array('nome'=>'Vendedor'), array('nome'=>'Ult.Sit.')
    );

    echo 'ok%%'.json_encode($colunas).'%%'.json_encode($certificados);

}

function detalharContador(){
    try{
        $usuarioLogado = ControleAcesso::getUsuarioLogado();
        $contador =  ContadorPeer::retrieveByPk($_POST['idContador']);

        $cContatosContador = new Criteria();
        $cContatosContador->add(ContadorContatoPeer::SITUACAO, -1, Criteria::NOT_EQUAL);
        $contatosObj = $contador->getContadorContatos($cContatosContador);
        $contatosContador = array();
        if ($contatosObj) {
            foreach ($contatosObj as $contato) {
                $telefone = ($contato->getFone()) ? $contato->getFone() : '-';
                $celular = ($contato->getCelular()) ? $contato->getCelular() : '-';
                $btnApagarContato = "<button title='Apagar Contato' id='btnApagarContato".$contato->getId()."'> <i class='fa fa-trash'></i> </button>";

                $btnApagarContato.= '<script>$("#btnApagarContato'.$contato->getId().'").click(function(){
                ezBSAlert({
                type: "confirm",
                messageText: "Tem certeza que deseja apagar o contato '.utf8_encode($contato->getNome()).'?",
                alertType: "info"
                }).done(function (e) {
                    if (e === true)
                        apagarContatoContador('.$contato->getId().');
                });
                });</script>';
                $contatosContador[] =
                    array(
                        "Id"=>$contato->getId(),"Nome"=>utf8_encode($contato->getNome()), "Cargo"=>utf8_encode($contato->getCargo()),
                        "Telefone"=>$telefone,"Celular"=>$celular, "E-mail"=>$contato->getEmail(), utf8_encode('A��o')=>$btnApagarContato
                    );

            }
        } else
            $contatosContador = '';

        $colunasContatos = array(
            array('nome'=>'Id'), array('nome'=>'Nome'), array('nome'=>'Cargo'),
            array('nome'=>'Telefone'), array('nome'=>'Celular'), array('nome'=>'E-mail'), array('nome'=>utf8_encode('A��o'))
        );

        if ($contador->getDesconto()==1)
            $concedeDesconto = '<i class="fa fa-thumbs-o-up text-info" aria-hidden="true" title="Concede Desconto"></i>';
        else
            $concedeDesconto = '<i class="fa fa-thumbs-o-down text-danger" aria-hidden="true" title="N&atilde;o Concede Desconto"></i>';

        if ($contador->getComissao()==1)
            $recebeComissao = '<i class="fa fa-thumbs-o-up text-info" aria-hidden="true" title="Recebe Comiss&atilde;o"></i>';
        else
            $recebeComissao = '<i class="fa fa-thumbs-o-down text-danger" aria-hidden="true" title="N&atilde;o eecebe Comiss&atilde;o"></i>';


        /*
         * SE FOR DA DIRETORIA PERMITE FAZER TUDO
         * SE O CONTADOR QUE ESTIVER SENDO EDITADO NAO NAO FOR DA CARTEIRA DO USUARIO LOGADO
         * CONSIDERANDO OBVIAMENTE PARCEIRO E SUPERVISORES
         * */
        $permiteEditarContador = 'nao';
        /*
         * SE FOR DIRETORIA PERMITE
         * */
        if ($usuarioLogado->getPerfilId() != 4) {
            /*
             * SE O CONTADOR EM QUESTAO TIVER O MESMO USUARIO QUE O USUARIO LOGADO
             * PERMITE
             * */
            if ($contador->getUsuarioId() != $usuarioLogado->getId()) {
                $usuariosVinculados = getUsuariosVinculados();

                foreach ($usuariosVinculados as $usuarioVinculado) {
                    if ($usuarioVinculado['id']==$contador->getUsuarioId())
                        $permiteEditarContador = 'sim';
                }

            }
            else
                $permiteEditarContador = 'sim';
        } else
            $permiteEditarContador = 'sim';


        $possuiCartao = 'nao';
        if ($contador->getComissao() == 1) {
            $mostraQuadroComissao = 'sim';
            if ($contador->getPossuiCartao()==1)
                $possuiCartao = 'sim';
        }
        else
            $mostraQuadroComissao = 'nao';

        /*
         * PEGA TODOS OS CERTIFICADOS DO CONTADOR E MONTA OS ARRAYS
        */


        $certificadosContadorObj = getCertificadosContador($contador->getId());
        $somaProdutosVendidos = 0.0;
        $h = 0;
        $vendas = array("valorVendas"=>0.0, "qtdVendas"=>0, 'certificados'=>array(), 'colunas'=>'');
        foreach ($certificadosContadorObj as $key=>$certificado) {
            if($certificado->getConfirmacaoValidacao()){
                /*
                 * CONFIRMACAO VALIDACAO = 1 EMITIDO OU APROVADO
                 * CONFIRMACAO VALIDACAO = 2 PENDENTE
                 * CONFIRMACAO VALIDACAO = 3 RENOVACAO
                 * CONFIRMACAO VALIDACAO = 4 REVOGADO
                */
                if ($certificado->getConfirmacaoValidacao() == 1)
                    $situacao = '<a data-toggle="modal" data-target="#detalharCertificado" title="Detalhar Certificado" id="btnDetalharCertificado" onclick="$(\'#modalCarregando\').modal(\'show\'); carregarModalDetalharCertificado('.$certificado->getId().', \'sim\'); "><i class="fa fa-flag" aria-hidden="true" style="color:#096;" title="validado em '.$certificado->getDataValidacao('d/m/Y').' Agr: '.(($certificado->getUsuarioValidouId())?$certificado->getUsuarioRelatedByUsuarioValidouId()->getNome():'---').'"></i></a>';
                elseif ($certificado->getConfirmacaoValidacao() == 2)
                    $situacao = '<a data-toggle="modal" data-target="#detalharCertificado" title="Detalhar Certificado" id="btnDetalharCertificado" onclick="$(\'#modalCarregando\').modal(\'show\'); carregarModalDetalharCertificado('.$certificado->getId().', \'sim\'); "><i class="fa fa-flag" aria-hidden="true" style="color:#fff847" title="validado em '.$certificado->getDataValidacao('d/m/Y').' Agr: '.(($certificado->getUsuarioValidouId())?$certificado->getUsuarioRelatedByUsuarioValidouId()->getNome():'---'). '(pendente)"></i></a>';
                elseif ($certificado->getConfirmacaoValidacao() == 3)
                    $situacao = '<a data-toggle="modal" data-target="#detalharCertificado" title="Detalhar Certificado" id="btnDetalharCertificado" onclick="$(\'#modalCarregando\').modal(\'show\'); carregarModalDetalharCertificado('.$certificado->getId().', \'sim\'); "><i class="fa fa-flag" aria-hidden="true" style="color:#fff847" title="validado em '.$certificado->getDataValidacao('d/m/Y').' Agr: '.(($certificado->getUsuarioValidouId())?$certificado->getUsuarioRelatedByUsuarioValidouId()->getNome():'---').' (renovado)"></i></a>';
                elseif ($certificado->getConfirmacaoValidacao() == 4)
                    $situacao = '<a data-toggle="modal" data-target="#detalharCertificado" title="Detalhar Certificado" id="btnDetalharCertificado" onclick="$(\'#modalCarregando\').modal(\'show\'); carregarModalDetalharCertificado('.$certificado->getId().', \'sim\'); "><i class="fa fa-flag" aria-hidden="true" style="color:#ac2925" title="revogado em '.$certificado->getDataValidacao('d/m/Y').' Agr: '.(($certificado->getUsuarioValidouId())?$certificado->getUsuarioRelatedByUsuarioValidouId()->getNome():'---').'"></i></a>';
            }
            else
                $situacao = ' <a data-toggle="modal" data-target="#detalharCertificado" title="Detalhar Certificado" id="btnDetalharCertificado" onclick="$(\'#modalCarregando\').modal(\'show\'); carregarModalDetalharCertificado('.$certificado->getId().'); "> <i class="fa fa-arrows"></i> </a>';
            //$certificado = new Certificado();
            $nomeCliente = ($certificado->getCliente()->getRazaoSocial() != '')?utf8_encode($certificado->getCliente()->getRazaoSocial()):utf8_encode($certificado->getCliente()->getNomeFantasia());
            $usuarioConsultor = $certificado->getUsuario()?$certificado->getUsuario()->getNome():'---';
            $produto = ($certificado->getProduto()) ? $certificado->getProduto()->getNome() : '---';

            $somaProdutosVendidos += $certificado->getProduto()->getPreco() - $certificado->getDesconto();
            $vendas['valorVendas'] += $certificado->getProduto()->getPreco() - $certificado->getDesconto();
            $vendas['qtdVendas'] += 1;

            $vendas['certificados'][] = array(' '=>(++$h),'Id'=>$certificado->getId(),
                'D.Pag.'=>'<span tile="'.$certificado->getDataCompra('d/m/Y').'">'.$certificado->getDataConfirmacaoPagamento('d/m/Y').'</span>',
                'D.Com.'=>($certificado->getDataCompra('d/m/Y'))?$certificado->getDataCompra('d/m/Y'):'---',
                'Cliente'=> $certificado->getCliente()->getId() . ' - '.$nomeCliente,
                'Tipo'=>utf8_encode($produto),
                'Consultor'=>utf8_encode($usuarioConsultor),
                'Tot'=>formataMoeda($certificado->getProduto()->getPreco() - $certificado->getDesconto()),
                '.'=>utf8_encode($situacao),
            );
            $vendas['colunas'] = array(
                array('nome'=>' '), array('nome'=>'Id'), array('nome'=>'D.Pag.'),array('nome'=>'D.Com.'), array('nome'=>'Cliente'),
                array('nome'=>'Tipo'), array('nome'=>'Consultor'), array('nome'=>'Tot'), array('nome'=>'.')
            );

        }

        $colunasCertificados = array(
            array('nome'=>'Codigo'), array('nome'=>'Pago'), array('nome'=>'Dt. Pgto'),
            array('nome'=>'Protocolo'), array('nome'=>'Cliente'), array('nome'=>'Compra'),
            array('nome'=>'Certificado'), array('nome'=>'Vendedor'), array('nome'=>'Ult.Sit.')
        );

        /*
         * MONTAGEM DO QUADRO RESUMO
        */
        if ($_POST['filtroDataComissao']) {
            $filtroData = explode(',',$_POST['filtroDataComissao']);
            $dataDe = explode('/',$filtroData[0]);
            $dataAte = explode('/',$filtroData[1]);
        } else {
            $dataDe = '01/'.(date('m')-1).'/'.date('Y');
            $dataAte = getLastDayOfMonth((date('m')-1), date('Y')).'/'.(date('m')-1).'/'.date('Y');
        }

        $cRegistroComissao = new Criteria();
        $cRegistroComissao->add(ContadorComissionamentoPeer::CONTADOR_ID, $contador->getId());
        $cRegistroComissao->add(ContadorComissionamentoPeer::SITUACAO, -1, Criteria::NOT_EQUAL);
        if ($filtroData) {
            $cRegistroComissao->add(ContadorComissionamentoPeer::PERIODO_INICIAL, $dataDe[2].'/'.$dataDe[1].'/'.$dataDe[0]);
            $cRegistroComissao->add(ContadorComissionamentoPeer::PERIODO_FINAL, $dataAte[2].'/'.$dataAte[1].'/'.$dataAte[0]);
        } else {
            $cRegistroComissao->add(ContadorComissionamentoPeer::PERIODO_INICIAL, date('Y').'-'.(date('m')-1).'-01');
            $cRegistroComissao->add(ContadorComissionamentoPeer::PERIODO_FINAL, date('Y').'-'.(date('m')-1).'-'.getLastDayOfMonth((date('m')-1), date('Y')));
        }
        $registroComissao = ContadorComissionamentoPeer::doSelectOne($cRegistroComissao);

        $somaTotalDescontos = 0.0;
        $somaTotalAcrescimos = 0.0;
        $quadroResumo = array();

        /*
         * CASO JA TENHA REGISTRADO OS LANCAMENTOS MOSTRA TODOS OS REGISTROS, CASO CONTRARIO
         * LISTA APENAS OS CERTIFICADOS REVOGADOS
         *
         * */
        $permiteRegistrarComissao = $_POST['permiteRegistrarComissao'];
        if ($registroComissao) {
            if ($registroComissao->getDataPagamento())
                $dataPagamentoComissao = '<i class="fa fa-check text-success" aria-hidden="true"></i>'.$registroComissao->getDataPagamento('d/m/Y');
            else
                $dataPagamentoComissao = '<i class="fa fa-circle" style="color: red"></i>';
            /*
             * BUSCA SE EXISTE ALGUMA OBSERVACAO PARA INSERIR NO QUADRO RESUMO
             * RELATIVO A COMISSAO
             * */
            $observacaoComissao = utf8_encode($registroComissao->getObservacao());

            /*
             * CHECA SE A COMISSAO JA FOI PAGA, SE SIM NAO MOSTRA NENHUM BOTAO DE APAGAR LANCAMENTO
             * NEM DE REGISTRAR NOVOS
             * */
            $comissaoPaga = 'nao';
            if ($registroComissao->getDataPagamento())
                $comissaoPaga = 'sim';

            if (($permiteRegistrarComissao == 'sim') && ($comissaoPaga == 'nao') ) {

                $iconeApagarRegistro = ' <button id="btnApagarRegistroComissao"><i class="fa fa-trash-o" aria-hidden="true" title="Apagar Registro Comiss&atilde;o"></i></button>';
                /*CHAMA A FUNCAO DE CONFIRMACAO*/
                $iconeApagarRegistro .= '<script>$("#btnApagarRegistroComissao").on("click", function(){
                            ezBSAlert({
                            type: "confirm",
                            messageText: "Tem certeza que deseja apagar o registro desta comiss&atilde;o?",
                            alertType: "info"
                            }).done(function (e) {
                                if (e === true)
                                    apagarRegistroComissaoContador('.$registroComissao->getId().');
                            });
                            });</script>';
            }
            else
                $iconeApagarRegistro = '';

            if ($registroComissao->getComissaoVenda())
                $coeficienteVenda = $registroComissao->getComissaoVenda() / 100;
            else
                $coeficienteVenda = 0.0;

            $tituloReceita = 'Receitas: '.formataMoeda($registroComissao->getVenda());
            $registrou = 'sim';
            $dataRegistro = $registroComissao->getDataRegistro('d/m/Y');
            $periodoRegistro = 'De ' . $registroComissao->getPeriodoInicial('d/m/Y') . ' - ' . 'Ate' . ' '.$registroComissao->getPeriodoFinal('d/m/Y');
            $idComissao = $registroComissao->getId();

            $cLancamentosContador = new Criteria();
            $cLancamentosContador->add(ContadorLancamentoPeer::SITUACAO, -1, Criteria::NOT_EQUAL);
            $cLancamentosContador->addDescendingOrderByColumn(ContadorLancamentoPeer::DATA_LANCAMENTO);
            $lancamentosComissao = $registroComissao->getContadorLancamentos($cLancamentosContador);

            $quadroResumo[] = array(utf8_encode('Descri��o')=>utf8_encode('Pedidos do contador ('.$registroComissao->getComissaoVenda().'%)'),
                $tituloReceita=>formataMoeda($registroComissao->getVenda() * $coeficienteVenda), 'Despesas'=> '-'
            );

            /*SOMA TODOS OS COMISSIONAMENTOS DE VENDA VALIDACAO E VENDA E VALIDACAO*/
            $somaTotalAcrescimos += ($registroComissao->getVenda() * $coeficienteVenda);

            /*MOSTRA LANCAMENTO DE ACRESCIMOS*/

            foreach ($lancamentosComissao as $lancamentoComissao) {
                if ( ($permiteRegistrarComissao == 'sim') && ($comissaoPaga == 'nao')) {
                    $iconeApagar = ' <button id="btnApagarLancamento' . $lancamentoComissao->getId() . '"><i class="fa fa-trash-o" aria-hidden="true" title="Apagar Lan&ccedil;amento"></i></button>';
                    /*CHAMA A FUNCAO DE CONFIRMACAO*/
                    $acaoApagar = '<script>$("#btnApagarLancamento' . $lancamentoComissao->getId() . '").on("click", function(){
                        ezBSAlert({
                        type: "confirm",
                        messageText: "Tem certeza que deseja apagar o lan&ccedil;amento ' . utf8_encode($lancamentoComissao->getDescricao()) . '?",
                        alertType: "info"
                        }).done(function (e) {
                            if (e === true)
                                apagarLancamentoComissaoContador(' . $lancamentoComissao->getId() . ');
                        });
                        });</script>';
                }
                else
                    $iconeApagar = '';
                if ($lancamentoComissao->getTipoLancamento() == 'C') {
                    $quadroResumo[] = array(utf8_encode('Descri��o') => utf8_encode($lancamentoComissao->getDescricao()) . $iconeApagar . $acaoApagar,
                        $tituloReceita => formataMoeda($lancamentoComissao->getValor()), 'Despesas' => '-'
                    );

                    $somaTotalAcrescimos += $lancamentoComissao->getValor();
                }

            }
            $quadroResumo[] = array(utf8_encode('Descri��o')=>'<span class="text-danger">TOTAL PARCIAL (RECEITAS)</span>',
                $tituloReceita=>'<span class="text-danger">'.formataMoeda($somaTotalAcrescimos).'</span>', 'Despesas'=> '-'
            );


            $quadroResumo[] = array(utf8_encode('Descri��o')=>'<strong>Descontos</strong>',
                $tituloReceita=>'', 'Despesas'=>''
            );

            /*MOSTRA LANCAMENTO DE DESEPEAS*/
            foreach ($lancamentosComissao as $lancamentoComissao) {
                if ( ($permiteRegistrarComissao == 'sim') && ($comissaoPaga == 'nao')) {
                    $iconeApagar = ' <button id="btnApagarLancamento' . $lancamentoComissao->getId() . '"><i class="fa fa-trash-o" aria-hidden="true" title="Apagar Lan&ccedil;amento"></i></button>';
                    /*CHAMA A FUNCAO DE CONFIRMACAO*/
                    $acaoApagar = '<script>$("#btnApagarLancamento' . $lancamentoComissao->getId() . '").on("click", function(){
                        ezBSAlert({
                        type: "confirm",
                        messageText: "Tem certeza que deseja apagar o lan&ccedil;amento ' . utf8_encode($lancamentoComissao->getDescricao()) . '?",
                        alertType: "info"
                        }).done(function (e) {
                            if (e === true)
                                apagarLancamentoComissaoContador(' . $lancamentoComissao->getId() . ');
                        });
                        });</script>';
                } else
                    $iconeApagar = '';

                if ($lancamentoComissao->getTipoLancamento() == 'D') {
                    $quadroResumo[] = array(utf8_encode('Descri��o') => utf8_encode($lancamentoComissao->getDescricao()) . $iconeApagar . $acaoApagar,
                        $tituloReceita => '-', 'Despesas' => formataMoeda($lancamentoComissao->getValor())
                    );

                    $somaTotalDescontos += $lancamentoComissao->getValor();
                }

            }

            $quadroResumo[] = array(utf8_encode('Descri��o')=>'<span class="text-danger">TOTAL PARCIAL (DESCONTOS)</span>',
                $tituloReceita=>'-', 'Despesas'=> '<span class="text-danger">'.formataMoeda($somaTotalDescontos).'</span>'
            );
        } else {

            $coeficienteVenda = 0.12;

            $tituloReceita = 'Receitas: ' . formataMoeda($somaProdutosVendidos);

            /*PASSA PRA A TELA OS VALORES VAZIOS*/
            $registrou = '';
            $dataRegistro = '';
            $periodoRegistro = '';
            $idComissao = '';

            $somaTotalAcrescimos += ($somaTotalDescontos) + ($somaProdutosVendidos * $coeficienteVenda);

            $quadroResumo[] = array(utf8_encode('Descri��o') => utf8_encode('Apenas Vendidos ('.($coeficienteVenda*100).'%)'),
                $tituloReceita => formataMoeda($somaProdutosVendidos * $coeficienteVenda), 'Despesas' => '-'
            );

            /*
            * COMISSOES ANTERIORES ACUMULO DE COMISSAO
            * */
            $cRegistroComissao = new Criteria();
            $cRegistroComissao->add(ContadorComissionamentoPeer::CONTADOR_ID, $contador->getId());
            $cRegistroComissao->add(ContadorComissionamentoPeer::SITUACAO, -1, Criteria::NOT_EQUAL);
            $cRegistroComissao->add(ContadorComissionamentoPeer::PERIODO_INICIAL, $dataDe[2].'/'.$dataDe[1].'/'.$dataDe[0], Criteria::LESS_THAN);
            /*
             * CONSULTA SE EXISTEM REGISTROS ANTERIORES NAO PAGOS
             * */
            $cRegistroComissao->add(ContadorComissionamentoPeer::DATA_PAGAMENTO, null, Criteria::ISNULL);
            $cRegistroComissao->addOr(ContadorComissionamentoPeer::DATA_PAGAMENTO, '0000-00-00 00:00:00');
            $cRegistroComissao->addDescendingOrderByColumn(ContadorComissionamentoPeer::PERIODO_INICIAL);
            $comissaoAnterior = ContadorComissionamentoPeer::doSelectOne($cRegistroComissao);

            $somaTotalComissoesAnteriores = 0.0;
            if ($comissaoAnterior) {
                $coeficienteAnterior = 0;
                if ($comissaoAnterior->getComissaoVenda())
                    $coeficienteAnterior = $comissaoAnterior->getComissaoVenda() / 100;

                $somaTotalComissoesAnteriores += $comissaoAnterior->getVenda() * $coeficienteAnterior;

                $lancamentosAnteriores = $comissaoAnterior->getContadorLancamentos();

                foreach ($lancamentosAnteriores as $lancamento) {
                    if ($lancamento->getTipoLancamento() == 'C') {
                        $somaTotalComissoesAnteriores += $lancamento->getValor();
                    } elseif ($lancamento->getTipoLancamento() == 'D')
                        $somaTotalComissoesAnteriores -= $lancamento->getValor();
                }

                /*
                 * ADICIONA O QUE ENCONTROU DE COMISSOES ANTERIORES A VARIAVEL ACRESCIMO PRA MOSTRAR NO QUADRO
                 * */
                $somaTotalAcrescimos += $somaTotalComissoesAnteriores;

                $quadroResumo[] = array(utf8_encode('Descri��o') => utf8_encode('Lan�amentos de comiss�o n�o paga do per�odo de '.
                    $comissaoAnterior->getPeriodoInicial('d/m/Y') . ' at� ' . $comissaoAnterior->getPeriodoFinal('d/m/Y')),
                    $tituloReceita => formataMoeda($somaTotalComissoesAnteriores), 'Despesas' => '-'
                );

                $lancamentoAntigo = array('valor'=>$somaTotalComissoesAnteriores, 'descricao'=>utf8_encode('Lan�amentos de comiss�o n�o paga do per�odo de '.
                    $comissaoAnterior->getPeriodoInicial('d/m/Y') . ' at� ' . $comissaoAnterior->getPeriodoFinal('d/m/Y')));


                $_SESSION['totalLancamentosAntigos'] = serialize($lancamentoAntigo);
            }

            /*
             * FIM DAS COMISSOES ANTERIORES
             * */


            $quadroResumo[] = array(utf8_encode('Descri��o') => '<span class="text-danger">TOTAL PARCIAL (RECEITAS)</span>',
                $tituloReceita => '<span class="text-danger">' . formataMoeda($somaTotalAcrescimos) . '</span>', 'Despesas' => '-'
            );

            $quadroResumo[] = array(utf8_encode('Descri��o') => '<strong>Descontos</strong>',
                $tituloReceita => '', 'Despesas' => ''
            );

        }


        /*SE O SALDO FOR POSITIVO COLOCA O TOTAL NAS RECEITAS E SAO COLOCA NAS DESPESAS*/
        if ($somaTotalAcrescimos-$somaTotalDescontos > 0)
            $quadroResumo[] = array(utf8_encode('Descri��o')=>'<span class="text-danger">TOTAL GERAL</span>',
                $tituloReceita=>'<span class="text-danger">'.formataMoeda($somaTotalAcrescimos-$somaTotalDescontos).'</span>', 'Despesas'=> '-'
            );
        else
            $quadroResumo[] = array(utf8_encode('Descri��o')=>'<span class="text-danger">TOTAL GERAL</span>',
                $tituloReceita=>'-', 'Despesas'=> '<span class="text-danger">'.formataMoeda($somaTotalAcrescimos-$somaTotalDescontos).'</span>'
            );

        $colunasQuadroResumo = array(
            array('nome'=>utf8_encode('Descri��o')), array('nome'=>$tituloReceita), array('nome'=>'Despesas')
        );


        $dadosComissao =  array(
            'dataPagamento'=>$dataPagamentoComissao,
            'comissaoVenda'=>$coeficienteVenda*100,
            'vendas'=>formataMoeda($vendas['valorVendas']) . ' ('. $vendas['qtdVendas'].')' ,
            'valorVendas'=>$vendas['valorVendas'],
            'comissaoTotal'=>formataMoeda($somaTotalAcrescimos-$somaTotalDescontos),
            'colunasCertificadosVendidos'=>json_encode($vendas['colunas']),
            'certificadosVendidos'=>json_encode($vendas['certificados']),
            'quadroResumo'=>json_encode($quadroResumo), 'colunasQuadroResumo'=>json_encode($colunasQuadroResumo),
            'observacao'=>$observacaoComissao
        );

        /*
         * FIM DA MONTAGEM DO QUADRO RESUMO
         *
         * */

        /*
         * INFORMACOES SOBRE DETALHES DO CONTADOR
         * */
        $cDetalhesContador = new Criteria();
        $cDetalhesContador->addDescendingOrderByColumn(ContadorDetalharPeer::DATA_CADASTRO);
        $detalhesContadorObj = $contador->getContadorDetalhars($cDetalhesContador);

        $detalhesContador = array();
        foreach ($detalhesContadorObj as $detalheContador) {
            $detalhesContador[] = array('Id'=>$detalheContador->getId(), 'Data'=>$detalheContador->getDataCadastro('d/m/Y H:i:s'),
                utf8_encode('Descri��o')=>utf8_encode($detalheContador->getDescricao()), utf8_encode('Usu�rio')=>utf8_encode($detalheContador->getUsuario()->getNome()),
            );
        }
        $colunasDetalhes = array(
            array('nome'=>'Id'), array('nome'=>'Data'), array('nome'=>utf8_encode('Descri��o')), array('nome'=>utf8_encode('Usu�rio'))
        );

        /*
         * FIM DAS INFORMACOES DO CONTADOR
         * */

        $endereco = utf8_encode($contador->getEndereco()).'-' . utf8_encode($contador->getBairro()).'-'. utf8_encode($contador->getCidade()).'/' . $contador->getUf();

        $retorno = array (
            'mensagem'=>'Ok', 'id'=>$contador->getId(),'codigoContador'=>$contador->getCodContador(),
            'nome'=> $contador->getNome(), 'endereco' =>$endereco, 'vendedor'=>utf8_encode($contador->getUsuario()->getNome()),
            'local'=>utf8_encode($contador->getLocal()->getNome()), 'concedeDesconto'=>$concedeDesconto,
            'mostraQuadroComissao'=>$mostraQuadroComissao, 'possuiCartao'=>$possuiCartao,
            'dataCadastro'=>$contador->getDataCadastro('d/m/Y H:i:s'),
            'contatosContador'=>json_encode($contatosContador), 'colunasContador'=>json_encode($colunasContatos),
            'permiteEditarContador'=>$permiteEditarContador, 'dadosComissao'=>json_encode($dadosComissao),
            'recebeComissao'=>$recebeComissao, 'colunasDetalhes'=>json_encode($colunasDetalhes), 'detalhesContador'=>json_encode($detalhesContador),
            'dataRegistroComissao'=>$dataRegistro,
            'periodoRegistroComissao'=>$periodoRegistro,
            'comissionamentoId'=>$idComissao,
            'iconeApagarRegistroComissao'=>$iconeApagarRegistro,
            'registrouComissao'=>$registrou,
            'comissaoPaga'=>$comissaoPaga

        );

        echo json_encode($retorno);

    }catch (Exception $e){
        erroEmail($e->getMessage(),'Erro na funcao de detalhar o contador');
        echo $e->getMessage();
    }
}
function salvarContatoContador(){
    try{
        $contadorContato = new ContadorContato();
        $contadorContato->setNome(utf8_decode($_POST['nome']));
        $contadorContato->setCargo(utf8_decode($_POST['cargo']));
        $contadorContato->setFone($_POST['telefone']);
        $contadorContato->setCelular($_POST['celular']);

        $contadorContato->setEmail($_POST['email']);
        $contadorContato->setContadorId($_POST['contadorId']);
        $contadorContato->setSituacao(0);

        if (!$contadorContato->validate()) {
            $mensagemErro = '';
            foreach ($contadorContato->getValidationFailures() as $falha)
                $mensagemErro .= $falha->getMessage() . '<br/>';

            throw new Exception($mensagemErro);
        }
        $contadorContato->save();

        //$descricao="usuario cadastrou contato do contador no sistema";
        //inserir_observacao_contador($contador_id,$usuario_id,$descricao);

        echo json_encode(array('mensagem'=>'Ok'));
    }catch(Exception $e){
        erroEmail($e->getMessage(),'Erro na funcao de inserir contato do contador');
        echo $e->getMessage();
    }
}
function detalhar_acao_crm($contador_id){
    try{
        $cProspect = new  Criteria();
        $cProspect->add(ProspectPeer::CONTADOR_ID, $contador_id);
        $cProspect->addDescendingOrderByColumn(ProspectPeer::ID);
        $prospectsContador = ProspectPeer::doSelect($cProspect);
        foreach ($prospectsContador as $prospectContador){
            $cContadorCrm = new Criteria();
            $cContadorCrm->add(ProspectSituacaoPeer::PROSPECT_ID, $prospectContador->getId());
            $cContadorCrm->addDescendingOrderByColumn(ProspectSituacaoPeer::ID);
            $acaoProspects = ProspectSituacaoPeer::doSelect($cContadorCrm);
            $tabelaCrm ='';
            foreach ($acaoProspects as $acaoProspect){
                $idProspect = $acaoProspect->getProspectId();
                $usuarioAcao = removeEspeciais($acaoProspect->getUsuario()->getNome());
                $dtCadastro = $acaoProspect->getDataAcao();
                $acao = $acaoProspect->getProspectAcao()->getNome();
                $observacao = $acaoProspect->getObservacao();
                $tabelaCrm .= '<tr>';
                $tabelaCrm .= '<td align="center" valign="top" >'.$idProspect.'</td>';
                $tabelaCrm .= '<td align="left" valign="top" >'.$usuarioAcao.'</td>';
                $tabelaCrm .= '<td align="left" valign="top" >'.$dtCadastro.'</td>';
                $tabelaCrm .= '<td align="left" valign="top" >'.$acao.'</td>';
                $tabelaCrm .= '<td align="left" valign="top" >'.$observacao.'</td>';
                $tabelaCrm .= '</tr>';
            }
        }
        $retorno = $tabelaCrm.';0';
        echo $retorno;

    }catch (Exception $e){
        erroEmail($e->getMessage(),'Erro na funcao de detalhar edicoes do contador');
        echo $e->getMessage();
    }
}
function detalhar_acao_contador($contador_id){
    try{
        $cContadorDetalhar = new Criteria();
        $cContadorDetalhar->add(ContadorDetalharPeer::CONTADOR_ID, $contador_id);
        $cContadorDetalhar->addDescendingOrderByColumn(ContadorDetalharPeer::ID);
        $detalhesContador = ContadorDetalharPeer::doSelect($cContadorDetalhar);
        $tabelaAcao ='';
        foreach ($detalhesContador as $detalheContador){
            $idDetalhe = $detalheContador->getId();
            $usuarioAcao = removeEspeciais($detalheContador->getUsuario()->getNome());
            $dtCadastro = $detalheContador->getDataCadastro();
            $descricao = $detalheContador->getDescricao();
            $tabelaAcao .= '<tr>';
            $tabelaAcao .= '<td align="center" valign="top" >'.$idDetalhe.'</td>';
            $tabelaAcao .= '<td align="left" valign="top" >'.$usuarioAcao.'</td>';
            $tabelaAcao .= '<td align="left" valign="top" >'.$dtCadastro.'</td>';
            $tabelaAcao .= '<td align="left" valign="top" >'.$descricao.'</td>';
            $tabelaAcao .= '</tr>';
        }
        $retorno = $tabelaAcao.';0';
        echo $retorno;

    }catch (Exception $e){
        erroEmail($e->getMessage(),'Erro na funcao de detalhar edicoes do contador');
        echo $e->getMessage();
    }
}
function detalhar_contato_contador($contador_id){
    try{
        $cContadorContato = new Criteria();
        $cContadorContato->add(ContadorContatoPeer::CONTADOR_ID, $contador_id);
        $cContadorContato->addDescendingOrderByColumn(ContadorContatoPeer::ID);

        $contadorContatos = ContadorContatoPeer::doSelect($cContadorContato);
        $tabelaContato ='';
        foreach ($contadorContatos as $contadorContato){
            $idDetalhe = $contadorContato->getId();
            $nomecontato = removeEspeciais($contadorContato->getNome());
            $nascimento = removeEspeciais($contadorContato->getNascimento());
            $cpf = $contadorContato->getCpf();
            $celular = $contadorContato->getCelular();
            $email = $contadorContato->getEmail();
            $fone = $contadorContato->getFone1();
            $vendedor = $contadorContato->getUsuario()->getNome();
            $tabelaContato .= '<tr>';
            $tabelaContato .= '<td align="center" valign="top" >'.$idDetalhe.'</td>';
            $tabelaContato .= '<td align="left" valign="top" >'.$nascimento.'</td>';
            $tabelaContato .= '<td align="left" valign="top" >'.$nomecontato.'</td>';
            $tabelaContato .= '<td align="left" valign="top" >'.$cpf.'</td>';
            $tabelaContato .= '<td align="center" valign="top" >'.$celular.'</td>';
            $tabelaContato .= '<td align="left" valign="top" >'.$email.'</td>';
            $tabelaContato .= '<td align="left" valign="top" >'.$fone.'</td>';
            $tabelaContato .= '<td align="left" valign="top" >'.$vendedor.'</td>';
            $tabelaContato .= '</tr>';
        }
        $retorno = $tabelaContato.';0';
        echo $retorno;

    }catch (Exception $e){
        erroEmail($e->getMessage(),'Erro na funcao de detalhar o contato do ccontador');
        echo $e->getMessage();
    }
}
function excluir_contador($contador_id,$usuario_id){
    try{
        $motivoExclusao = $_POST['motivo'];
        $contador =  ContadorPeer::retrieveByPk($contador_id);
        $contador->setSituacao(-1);
        $contador->save();
        $mensagemExclusao = "Excluiu contador pelo seguinte motivo: ".$motivoExclusao;
        inserir_observacao_contador($contador_id,$usuario_id,$mensagemExclusao);
        echo "0";
    }catch (Exception $e){
        erroEmail($e->getMessage(), "Erro na funcao de apagar o ceretifiado");
        echo $e->getMessage();
    }
}
function inserir_observacao_contador($contador_id,$usuario_id,$mensagem){
    try {
        //Gerando A??o
        $contadorDetalhar = new ContadorDetalhar();
        $contadorDetalhar->setUsuarioId($usuario_id);
        $contadorDetalhar->setContadorId($contador_id);
        $contadorDetalhar->setDataCadastro(date('Y-m-d H:i:s'));
        $contadorDetalhar->setDescricao($mensagem);
        $contadorDetalhar->save();
        echo '0';
    }catch(Exception $e){
        erroEmail($e->getMessage(),'Erro na funcao de inserir contato do contador');
        echo $e->getMessage();
    }
}

function getCertificadosContador() {
    $cCertificados = new Criteria();
    $cCertificados->add(CertificadoPeer::APAGADO, 0);

    $cCertificados->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, null, Criteria::ISNOTNULL);
    $cCertificados->addAnd(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, '0000-00-00 00:00:00', Criteria::NOT_EQUAL);

    if ($_POST['filtroDataComissao'])
        $filtroData = explode(',',$_POST['filtroDataComissao']);

    if ( $filtroData ) {
        $dataDe = explode('/',$filtroData[0]);
        $dataAte = explode('/',$filtroData[1]);

        $cCertificados->add(CertificadoPeer::DATA_VALIDACAO, $dataDe[2].'/'.$dataDe[1].'/'.$dataDe[0] . ' 00:00:00', Criteria::GREATER_EQUAL);
        $cCertificados->addAnd(CertificadoPeer::DATA_VALIDACAO, $dataAte[2].'/'.$dataAte[1].'/'.$dataAte[0] . ' 23:59:59', Criteria::LESS_EQUAL);
    } else {
        $cCertificados->add(CertificadoPeer::DATA_VALIDACAO, date('Y').'-'.(date('m')-1).'-01 00:00:00', Criteria::GREATER_EQUAL);
        $cCertificados->addAnd(CertificadoPeer::DATA_VALIDACAO, date('Y').'-'.(date('m')-1).'-'.getLastDayOfMonth((date('m')-1), date('Y')) . ' 23:59:59', Criteria::LESS_EQUAL);
    }

    $cCertificados->add(CertificadoPeer::CONTADOR_ID, $_POST['idContador']);
    $certificadosObj = CertificadoPeer::doSelect($cCertificados);

    return $certificadosObj;

}

function carregarModalInserirEditarContador () {
    try {
        $bancosObj = BancoPeer::doSelect(new Criteria());

        $bancos = array();
        foreach ($bancosObj as $banco) {
            $bancos[] = array('id'=>$banco->getId(), 'nome'=>utf8_encode($banco->getNome()));
        }
        $clocais = new Criteria();
        $clocais->add(LocalPeer::SITUACAO, 0);
        $locaisObj = LocalPeer::doSelect($clocais);

        $locais = array();
        foreach ($locaisObj as $local) {
            $locais[] = array('id'=>$local->getId(), 'nome'=>utf8_encode($local->getNome()));
        }

        $usuarioLogado = ControleAcesso::getUsuarioLogado();
        $cVendedores = new Criteria();
        $cVendedores->add(UsuarioPeer::SITUACAO, 0);
        $vendedoresObj = UsuarioPeer::doSelect($cVendedores);

        $vendedores = array();
        foreach ($vendedoresObj as $vendedor) {
            $vendedores[] = array('id'=>$vendedor->getId(), 'nome'=>utf8_encode($vendedor->getNome()));
        }

        if ($_POST['acao']=='inserir') {
            $contador = new Contador();
            $codigoDescontoContador = 'Novo C&oacute;digo ser&aacute; gerado';
            $usuario = $usuarioLogado->getId();
            $local = $usuarioLogado->getLocalId();
        }
        elseif ($_POST['acao']=='editar') {
            $contador =  ContadorPeer::retrieveByPk($_POST['contadorId']);
            if ($contador->getCodContador())
                $codigoDescontoContador = $contador->getCodContador();
            else
                $codigoDescontoContador = 'Novo C&oacute;digo ser&aacute; gerado';
            $usuario = $contador->getUsuarioId();
            $local = $contador->getLocalId();

        }

        $retorno =  array('nome'=>utf8_encode($contador->getNome()), 'nascimento'=> $contador->getNascimento('d/m/Y'), 'cpf'=> $contador->getCpf(),
            'email'=> $contador->getEmail(),'usuario'=> $usuario, 'local'=> $local,
            'razaoSocial'=> utf8_encode($contador->getRazaoSocial()), 'cnpj'=> $contador->getCnpj(),
            'nomeFantasia'=> utf8_encode($contador->getNomeFantasia()), 'cep'=> $contador->getCep(),
            'endereco'=> utf8_encode($contador->getEndereco()),'bairro'=> utf8_encode($contador->getBairro()), 'cidade'=> utf8_encode($contador->getCidade()),
            'uf'=> $contador->getUf(),'numero'=> $contador->getNumero(), 'complemento'=> utf8_encode($contador->getComplemento()),
            'telefone'=>$contador->getFone1(), 'celular'=>$contador->getCelular(),
            'emailPj'=>$contador->getEmailEmpresa(), 'crc'=> $contador->getCrc(),'banco' =>utf8_encode($contador->getBanco()), 'agencia'=> $contador->getAgencia(),
            'conta'=> $contador->getContaCorrente(),'cpfCnpjConta'=> $contador->getCpfCnpjConta(), 'comissao'=>$contador->getComissao(), 'desconto'=>$contador->getDesconto(),
            'codigoDescontoContador'=>$codigoDescontoContador, 'tipoProfissional'=>$contador->getTipoContador(), 'pessoaTipo'=>$contador->getPessoaTipo()
        );

        $retorno = array(
            'mensagem'=>'Ok','locais'=>json_encode($locais), 'vendedores'=>json_encode($vendedores), 'vendedorSelecionado'=>$usuarioLogado->getId(),
            'contador'=>json_encode($retorno), 'bancos'=>json_encode($bancos)
        );
        echo json_encode($retorno);

    }catch(Exception $e){
        echo $e->getMessage();
    }



}

function carregarFiltrosContadores() {
    try {
        $usuarioLogado = ControleAcesso::getUsuarioLogado();

        /*SE FOR DIRETORIA MOSTRA TUDO (OU SEJA, NAO ENTRA NO IF)*/
        if (($usuarioLogado->getPerfilId() != 4) && ($usuarioLogado->getPerfilId()!=11)) {

            /*
             * SE O USUARIO FOR PARCEIRO, ACRESCENTA TODOS
             * OS USUARIOS VINCULADOS AO MESMO
             * */
            $usuariosParceiroObj = $usuarioLogado->getUsuariosParceiroUsuario();
            $usuariosParceiro = array();

            foreach ($usuariosParceiroObj as $usuario)
                $usuariosParceiro[] = $usuario->getId();

            if ($usuariosParceiro)
                $sqlUsuarios = 'and usuario.ID in (' .implode(',',$usuariosParceiro) . ')';

            /*
             * SE TIVER LOCAL VINCULADO, ACRESCENTA TODOS
             * OS USUARIOS VINCULADOS A ESTES LOCAIS
             * */
            $usuariosLocaisObj = $usuarioLogado->getUsuariosLocaisUsuario();
            $usuariosLocais = array();

            foreach ($usuariosLocaisObj as $usuario)
                $usuariosLocais[] = $usuario->getId();
            /*var_dump(count($usuariosLocais));
            var_dump(count($usuariosParceiro));*/
            if ( count($usuariosLocais) > 0)
                $sqlUsuarios = 'and usuario.ID in (' .implode(',',$usuariosLocais) . ')';

            if (count($usuariosParceiro) == 0 && count($usuariosLocais)==0)
                $sqlUsuarios = 'and usuario.ID = ' . $usuarioLogado->getId();

        }

        $sql = 'SELECT usuario.ID as id, usuario.NOME as nome , count(contador.id) as qtd FROM usuario JOIN contador ON (usuario.ID=contador.USUARIO_ID) where contador.situacao = 0 ';
        $sql .= $sqlUsuarios;
        $sql .=' GROUP BY usuario.ID HAVING count(contador.ID)>0 order by usuario.nome';

        $con = Propel::getConnection();
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $usuariosObj = $stmt->fetchAll();

        $usuarios = array();
        $usuarios[] = array("id"=>'', "nome"=>utf8_encode('Selecione o Usuario'));
        foreach ($usuariosObj as $usuario)
            $usuarios[] = array("id"=>$usuario['id'], "nome"=>utf8_encode(strtoupper($usuario['nome'])) . ' ('.$usuario['qtd'].')');

        $resultado = array(
            'mensagem'=>'Ok', 'usuarios'=>json_encode( $usuarios), 'permiteRegistrarComissao' => permiteRegistrarComissao()
        );

        echo json_encode($resultado);

        return $usuarios;

    } catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}

function apagarContatoContador () {
    try{
        $contato =  ContadorContatoPeer::retrieveByPk($_POST['contatoId']);
        $contato->setSituacao(-1);
        $contato->save();

        $mensagemObs = '';
        if ($contato->getFone())
            $mensagemObs .= ' Telefone: '.$contato->getFone();
        if ($contato->getCelular())
            $mensagemObs .= ' Celular: '.$contato->getCelular();
        if ($contato->getEmail())
            $mensagemObs .= ' E-mail: '.$contato->getEmail();
        inserirObservacaoContador($contato->getContadorId(), 'Apagou o contato '.utf8_encode($contato->getNome()) . $mensagemObs);

        echo json_encode(array('mensagem'=>'Ok'));
    }catch (Exception $e){
        erroEmail($e->getMessage(), "Erro na funcao de apagar o contato do contador");
        echo $e->getMessage();
    }

}
function permiteRegistrarComissao () {
    try {
        /*
         * PERMITE REGISTRAR COMISSAO E CONSEQUENTEMENTE ESCOLHER DATA DE PESQUISA
         * */
        $permiteRegistrarComissao = 'nao';
        if (array_search('regComiss', ControleAcesso::getPermissoesTela('telaContador.php')) !== false) {
            $permiteRegistrarComissao = 'sim';
        }

        return $permiteRegistrarComissao;
    } catch(Exception $e){
        echo var_dump($e->getMessage());
    }

}


?>
