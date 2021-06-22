<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';
$parceiro_id = "";

if (isset($_POST['parceiro_id']) && $_POST['parceiro_id']!= null && $_POST['parceiro_id']!=''){
    $parceiro_id = $_POST['parceiro_id'];
}
$funcao = $_POST['funcao'];
//VARIAVEL PARA A FUNCAO INSERIR OBSERVACAO

if ($funcao == 'carregar_parceiros'){carregar_parceiros();}
if ($funcao == 'carregar_dados_paginacao'){carregar_dados_paginacao();}

if($funcao == 'apagar_parceiro') {apagar_parceiro();}
if($funcao == 'salvar_parceiro') {
    salvar_parceiro();
}
if ($funcao == 'bloquear_parceiro'){bloquear_parceiro();}
if ($funcao == 'detalhar_parceiro'){detalhar_parceiro($parceiro_id);}
if ($funcao == 'carregar_usuarios'){carregar_usuarios_parceiro($parceiro_id);}
if ($funcao == 'relacionar_parceiro'){relacionar_parceiro($parceiro_id);}
if ($funcao == 'desvincular_parceiro'){desvincular_parceiro($parceiro_id);}
if($funcao == 'carregar_dados_parceiro') {carregar_dados_parceiro($parceiro_id);}
if($funcao == 'editar_contato') {
    $contato_id = $_POST['contato_id'];
    editar_contato($contato_id);
}
if ($funcao== 'alterar_contato'){
    $contato_id = $_POST['contato_id'];
    alterar_contato($contato_id);
}
if($funcao == 'registrar_comissao_parceiro') {registrarComissaoParceiro();}
if($funcao == 'registrar_lancamento_comissao_parceiro') {registrarLancamentoComissaoParceiro();}
if($funcao == 'apagar_lancamento_comissao_parceiro') {apagarLancamentoComissaoParceiro();}
if($funcao == 'apagar_registro_comissao_parceiro') {apagarRegistroComissao();}
if($funcao == 'carregar_parceiros_relatorio_comissao') {carregarParceirosRelatorioComissao();}
if($funcao == 'carregar_parceiros_relatorio_comissao_tabela_fixa') {carregarParceirosRelatorioComissaoTabelaFixa();}

if($funcao == 'informar_pagamento_extorno_comissao_parceiro') {informarPagamentoExtornoComissaoParceiro();}




function salvar_parceiro(){
    try {
        if ($_POST['idParceiro'])
            $parceiro = ParceiroPeer::retrieveByPK($_POST['idParceiro']);
        else {
            $parceiro = new Parceiro();
            /*
             * SO INSERE O TIPO DE CANAL SE FOR NOVO, CASO CONTRARIO MANTEM
             * */
            $parceiro->setTipoCanal($_POST['tipo_canal']);
        }

        $parceiro->setNome(utf8_decode($_POST['nome']));
        $parceiro->setEmpresa(utf8_decode($_POST['empresa']));
        $parceiro->setCnpj(utf8_decode($_POST['cnpj']));
        $parceiro->setEndereco(utf8_decode($_POST['endereco']));
        $parceiro->setNumero($_POST['numero']);
        $parceiro->setBairro(utf8_decode($_POST['bairro']));
        $parceiro->setCidade(utf8_decode($_POST['cidade']));
        $parceiro->setComplemento(utf8_decode($_POST['complemento']));
        $parceiro->setEmail($_POST['email']);
        $parceiro->setUf($_POST['uf']);
        $parceiro->setCep($_POST['cep']);
        $parceiro->setIbge($_POST['ibge']);
        $parceiro->setFone($_POST['fone']);
        $parceiro->setCelular($_POST['celular']);
        $parceiro->setLocalId($_POST['local_id']);
        $parceiro->setSituacao(0);
        $parceiro->setDataCadastro(date('Y-m-d H:i:s'));
        $parceiro->setCelular($_POST['celular']);
        $parceiro->setFone($_POST['fone']);
        $parceiro->setEmail($_POST['email']);
        $parceiro->setBanco($_POST['banco']);
        $parceiro->setAgencia($_POST['agencia']);
        $parceiro->setContaCorrente($_POST['conta']);
        $parceiro->setOperacao($_POST['operacao']);
        $parceiro->setComissaoVenda($_POST['comissao_venda']);
        $parceiro->setComissaoValidacao($_POST['comissao_validacao']);
        $parceiro->setComissaoVendaValidacao($_POST['comissao_venda_validacao']);
        $parceiro->setObservacao($_POST['observacao']);
        $parceiro->setPagaContador($_POST['pagaContador']);

        $parceiro->save();
        echo 'Ok';

    }catch(Exception $e){
        var_dump($e->getMessage());
    }
}

function carregar_usuarios_parceiro($parceiro_id) {
    try {
        $parceiro =  ParceiroPeer::retrieveByPk($parceiro_id);
        $usuarios = array();
        $usuariosParceiros = $parceiro->getParceiroUsuarios();

        foreach ($usuariosParceiros as $parceiroUsuario){
            $aux = '$("#idParceiroDesvincular").val("'.$parceiroUsuario->getParceiroId().'");';
            $aux.= '$("#idUsuarioDesvincular").val("'.$parceiroUsuario->getUsuarioId().'");';
            $aux.= '$("#nomeUsuarioDesvincular").html(" <strong>'.utf8_encode($parceiroUsuario->getUsuario()->getNome()).'</strong> ")';
            $usuarios[] = array('Id'=>$parceiroUsuario->getUsuario()->getId(), utf8_encode('Usuário')=>utf8_encode($parceiroUsuario->getUsuario()->getNome()),
                'Tipo'=>utf8_encode($parceiroUsuario->getParceiroUsuarioTipo()->getNome()),
                utf8_encode('Ação')=>"<a title='Desvincular Usu&aacute;rio' data-toggle='modal' data-target='#desvincularUsuario' onclick='$aux'> <i class='fa fa-trash'></i> </a>"

                /*$("#idParceiroDesvincular").val("'.$parceiroUsuario->getParceiroId().'"); $("#idUsuarioDesvincular").val("'.$parceiroUsuario->getUsuarioId().'");*/
            );
        }


        $colunas = array(
            array('nome'=>'Id'), array('nome'=>utf8_encode('Usuário')), array('nome'=>'Tipo'), array('nome'=>utf8_encode('Ação'))
        );
        echo "Ok&&".json_encode($colunas)."&&".json_encode($usuarios);
    }catch(Exception $e){
        echo var_dump($e->getMessage());
    }

}

function relacionar_parceiro($parceiro_id){

    try {
        $parceiroUsuario = new ParceiroUsuario();
        $parceiroUsuario->setParceiroUsuarioTipoId($_POST['tipo_usuario']);
        $parceiroUsuario->setUsuarioId($_POST['usuario_relacionado']);
        $parceiroUsuario->setParceiroId($parceiro_id);
        $parceiroUsuario->save();

        echo 'Ok';

    }catch(Exception $e){
        if ($e->getCause()->getCode() == '23000')
            echo "mensagemErro&&Este usu&aacute;rio j&aacute; foi vinculado anteriormente a este parceiro!";
        else
            echo var_dump($e->getMessage());
    }
}

function desvincular_parceiro($parceiro_id){

    try {
        $usuarioRelacionado = $_POST['usuario_relacionado'];
        $cParceiroUsuario = new Criteria();
        $cParceiroUsuario->add(ParceiroUsuarioPeer::PARCEIRO_ID,$parceiro_id);
        $cParceiroUsuario->add(ParceiroUsuarioPeer::USUARIO_ID,$usuarioRelacionado);
        $parceiroUsuario = ParceiroUsuarioPeer::doDelete($cParceiroUsuario);

        echo '0';

    }catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}

function carregar_dados_parceiro($parceiro_id){

    try {

        $parceiro =  ParceiroPeer::retrieveByPk($parceiro_id);
        $retorno =  array('nome'=>utf8_encode($parceiro->getNome()), 'empresa'=> utf8_encode($parceiro->getEmpresa()), 'cnpj'=> $parceiro->getCnpj(), 'endereco'=> utf8_encode($parceiro->getEndereco()),
            'numero'=> $parceiro->getNumero(), 'bairro'=> utf8_encode($parceiro->getBairro()), 'cidade'=> utf8_encode($parceiro->getCidade()), 'complemento'=> utf8_encode($parceiro->getComplemento()),
            'email'=> $parceiro->getEmail(), 'uf'=> $parceiro->getUf(), 'cep'=> $parceiro->getCep(), 'ibge'=> $parceiro->getIbge(),
            'local'=> $parceiro->getLocalId(), 'situacao'=> $parceiro->getSituacao(), 'data_cadastro'=> $parceiro->getDataCadastro(),
            'celular'=>$parceiro->getCelular(), 'fone'=> $parceiro->getFone(), 'banco'=> $parceiro->getBanco(),
            'agencia'=> $parceiro->getAgencia(),'conta_corrente' =>$parceiro->getContaCorrente(), 'operacao'=> $parceiro->getOperacao(),
            'comissaoVenda'=> $parceiro->getComissaoVenda(),'comissaoValidacao' =>$parceiro->getComissaoValidacao(), 'comissaoVendaValidacao'=> $parceiro->getComissaoVendaValidacao(),
            'observacao'=> $parceiro->getObservacao(), 'tipoCanal'=>$parceiro->getTipoCanal(), 'pagaContador'=> $parceiro->getPagaContador()
            );

        echo "Ok&&".json_encode($retorno);
    }catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}

function carregar_parceiros(){
    try {
        $cParceiro = new Criteria();

        if (isset($_POST['filtros'])) {
            if ($_POST['filtros']['campoFiltro']) {
                $campoFiltro = key($_POST['filtros']['campoFiltro']);
                $valorCampoFiltro = $_POST['filtros']['campoFiltro'][key($_POST['filtros']['campoFiltro'])];
            }
        }

        if ($_POST['filtros']['filtroCanal']) {
            if ($_POST['filtros']['filtroCanal'] == 'true')
                $cParceiro->add(ParceiroPeer::TIPO_CANAL, 'parceiro');
            else
                $cParceiro->add(ParceiroPeer::TIPO_CANAL, 'unidade');
        }

                /*SE FOR SELECIONADO ALGUM CAMPO DE FILTRO PADRAO INSERE NO CRITERIO*/
        if ( ($campoFiltro) && ($valorCampoFiltro) )
            $cParceiro->add($campoFiltro, $valorCampoFiltro . "%", Criteria::LIKE);

        $cParceiro->add(ParceiroPeer::SITUACAO, -1, Criteria::NOT_EQUAL);

        $quantidadeTotal = ParceiroPeer::doCount($cParceiro);

        $cParceiro->addAscendingOrderByColumn(ParceiroPeer::NOME);

        if ($_POST['pagina'])
            $offSet =  ($_POST['pagina']- 1) * $_POST['itensPorPagina'];
        else
            $offSet = 0;

        $usuarioLogado = ControleAcesso::getUsuarioLogado();
        $arrParceirosUsuario = array();
        if ($usuarioLogado->getPerfilId() != 4) {
            $cParceiroUsuario = new Criteria();
            $cParceiroUsuario->add(ParceiroUsuarioPeer::USUARIO_ID, $usuarioLogado->getId());
            $parceirosUsuarios = ParceiroUsuarioPeer::doSelect($cParceiroUsuario);
            foreach ($parceirosUsuarios as $parceiroUsuario)
                $arrParceirosUsuario[] = $parceiroUsuario->getParceiroId();

            $cParceiro->add(ParceiroPeer::ID, $arrParceirosUsuario, Criteria::IN);
        }

        $cParceiro->setLimit($_POST['itensPorPagina']);
        $cParceiro->setOffset($offSet);

        $parceirosObj = ParceiroPeer::doSelect($cParceiro);
        $parceiros = array();

        foreach ($parceirosObj as $key=>$parceiro) {
            /*PREPARA OS DADOS DA TABELA BEM COMO ACOES A SERM EXECUTADAS*/
            if ($parceiro->getLocal()) $local = $parceiro->getLocal()->getNome();
            if ($parceiro->getSituacao()== 0) $iconeBloqueio =' <i class="fa fa-unlock" aria-hidden="true" title="Parceiro desbloqueado"></i>'; elseif ($parceiro->getSituacao()==-2) $iconeBloqueio = ' <i class="fa fa-lock" aria-hidden="true" title="Parceiro bloqueado"></i>';

            if ($parceiro->getTipoCanal() == 'parceiro') {
                $canal = '<i class="fa fa-circle" style="color: #3d8b3d" aria-hidden="true"></i>';
            }
            elseif ($parceiro->getTipoCanal() == 'unidade')
                $canal = '<i class="fa fa-circle" style="color: #0b62a4" aria-hidden="true"></i>';

            $parceiros[] =  array(' '=>(++$key),'Id'=>$parceiro->getId(),'.'=>$canal,'Nome'=>utf8_encode($parceiro->getNome()), 'Empresa'=> (utf8_encode($parceiro->getEmpresa()))?utf8_encode($parceiro->getEmpresa()):'---',
                'Localidade'=> utf8_encode($parceiro->getCidade() .'/' . $parceiro->getUf()), 'Celular'=>($parceiro->getCelular())?$parceiro->getCelular():'---', 'Telefone'=> ($parceiro->getFone())?$parceiro->getFone():'---',
                utf8_encode('A��o')=>'<button class="btn btn-primary" onclick="$(\'#detalharParceiro\').modal(\'show\'); detalhar_parceiro('.$parceiro->getId().')"><i class="fa fa-arrows"></i></button> '
            );
        }

        $colunas = array(
            array('nome'=>' '),array('nome'=>'Id'), array('nome'=>'.'),array('nome'=>'Nome'), array('nome'=>'Empresa'), array('nome'=>'Localidade'),
            array('nome'=>'Celular'), array('nome'=>'Telefone'),  array('nome'=>utf8_encode('A��o'))
        );

        $retorno = array();
        $retorno['mensagem'] = 'Ok';
        $retorno['colunas'] = json_encode($colunas);
        $retorno['dados'] = json_encode($parceiros);
        $retorno['quantidadeTotal'] = $quantidadeTotal;
        echo json_encode($retorno);
    }catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}

function carregar_dados_paginacao(){
    try {
        $cParceiro = new Criteria();

        if (isset($_POST['filtros'])) {
            if ($_POST['filtros']['campoFiltro']) {
                $campoFiltro = key($_POST['filtros']['campoFiltro']);
                $valorCampoFiltro = $_POST['filtros']['campoFiltro'][key($_POST['filtros']['campoFiltro'])];
            }
        }

        /*SE FOR SELECIONADO ALGUM CAMPO DE FILTRO PADRAO INSERE NO CRITERIO*/
        if ( ($campoFiltro) && ($valorCampoFiltro) )
            $cParceiro->add($campoFiltro, $valorCampoFiltro . "%", Criteria::LIKE);

        $cParceiro->add(ParceiroPeer::SITUACAO, 0);
        $cParceiro->addOr(ParceiroPeer::SITUACAO, -2);

        $num_rows = ParceiroPeer::doCount($cParceiro);
        echo $num_rows;
    }catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}


function detalhar_parceiro($parceiro_id){

    try {
        //Cabe�alho do modal detalhar Parceiro
        $parceiro =  ParceiroPeer::retrieveByPk($parceiro_id);
        $cidade = utf8_encode($parceiro->getCidade());
        $contatos = $cidade." - ".$parceiro->getUf().' | Fones: '.$parceiro->getCelular();
        if ($parceiro->getFone())
            $contatos.=' - ' . $parceiro->getFone();

        /*SITUACAO = 0 ATIVO | -1 APAGADO | -2 BLOQUEADO*/
        if ($parceiro->getSituacao() == 0) {
            $btnBloqueio = '<button class="btn btn-primary" title="Bloquear o parceiro" id=\'btnBloqueio\' ><i class="fa fa-lock"></i></button>';
            $btnBloqueio .= '<script>$("#btnBloqueio").on("click", function(){
                    ezBSAlert({
                    type: "confirm",
                    messageText: "Tem certeza que deseja bloquear o parceiro '.utf8_encode($parceiro->getNome()).'?",
                    alertType: "info"
                    }).done(function (e) {
                        if (e === true)
                            bloquear_parceiro(\''.$parceiro->getId().'\',\'bloquear\');
                    });
                    });</script>';
        }
        elseif ($parceiro->getSituacao()==-2) {
            $btnBloqueio = '<button class="btn btn-primary" title="Desbloquear o parceiro" id=\'btnBloqueio\'"><i class="fa fa-unlock"></i></button>';
            $btnBloqueio .= '<script>$("#btnBloqueio").on("click", function(){
                    ezBSAlert({
                    type: "confirm",
                    messageText: "Tem certeza que deseja desbloquear o parceiro '.utf8_encode($parceiro->getNome()).'?",
                    alertType: "info"
                    }).done(function (e) {
                        if (e === true)
                            bloquear_parceiro(\''.$parceiro->getId().'\',\'desbloquear\');
                    });
                    });</script>';
        }

        /*DADOS DE COMISSIONAMENTO DO APRCEIRO*/
        $usuariosIds = array();
        $usuariosParceiros = $parceiro->getParceiroUsuarios();
        foreach ($usuariosParceiros as $parceiroUsuario){
            $usuariosIds[] = $parceiroUsuario->getUsuarioId();
        }

        /*SE TIVER USUARIO VINCULADO CALCULA COMISSAO SE HOUVER DO MESMO*/

        $cComissaoParceiro = new Criteria();
        if ($_POST['filtroDataComissao'])
            $filtroData = explode(',',$_POST['filtroDataComissao']);

        if ( $filtroData ) {
            $dataDe = explode('/',$filtroData[0]);
            $dataAte = explode('/',$filtroData[1]);

            $cCriterioEntreDatasVendaValidacao = $cComissaoParceiro->getNewCriterion(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, $dataDe[2].'/'.$dataDe[1].'/'.$dataDe[0] . ' 00:00:00', Criteria::GREATER_EQUAL);
            $cCriterioDataCompraFinal = $cComissaoParceiro->getNewCriterion(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, $dataAte[2].'/'.$dataAte[1].'/'.$dataAte[0] . ' 23:59:59', Criteria::LESS_EQUAL);

            $cCriterioEntreDatasValidacao = $cComissaoParceiro->getNewCriterion(CertificadoPeer::DATA_VALIDACAO, $dataDe[2].'/'.$dataDe[1].'/'.$dataDe[0] . ' 00:00:00', Criteria::GREATER_EQUAL);
            $cCriterioDataValidacaoFinal =  $cComissaoParceiro->getNewCriterion(CertificadoPeer::DATA_VALIDACAO, $dataAte[2].'/'.$dataAte[1].'/'.$dataAte[0] . ' 23:59:59', Criteria::LESS_EQUAL);

            $dataInicial = new DateTime($dataDe[2].'/'.$dataDe[1].'/'.$dataDe[0] . ' 00:00:00');
            $dataFinal = new DateTime( $dataAte[2].'/'.$dataAte[1].'/'.$dataAte[0] . ' 23:59:59');

        } else {
            $cCriterioEntreDatasVendaValidacao = $cComissaoParceiro->getNewCriterion(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, date('Y').'-'.(date('m')-1).'-01 00:00:00', Criteria::GREATER_EQUAL);
            $cCriterioDataCompraFinal = $cComissaoParceiro->getNewCriterion(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, date('Y').'-'.(date('m')-1).'-'.getLastDayOfMonth((date('m')-1), date('Y')) . ' 23:59:59', Criteria::LESS_EQUAL);

            $cCriterioEntreDatasValidacao = $cComissaoParceiro->getNewCriterion(CertificadoPeer::DATA_VALIDACAO, date('Y').'-'.(date('m')-1).'-01 00:00:00', Criteria::GREATER_EQUAL);
            $cCriterioDataValidacaoFinal =  $cComissaoParceiro->getNewCriterion(CertificadoPeer::DATA_VALIDACAO, date('Y').'-'.(date('m')-1).'-'.getLastDayOfMonth((date('m')-1), date('Y')) . ' 23:59:59', Criteria::LESS_EQUAL);

            /*DATA UTILIZADA A TITULO DE COMPARACAO PARA SABER O TIPO DE CD VENDA, VALIDACAO OU VENDA E VALIDACAO*/
            $dataInicial = new DateTime(date('Y').'-'.(date('m')-1).'-01 00:00:00');
            $dataFinal = new DateTime( date('Y').'-'.(date('m')-1).'-'.getLastDayOfMonth((date('m')-1), date('Y')) . ' 23:59:59');

        }

        $cCriterioEntreDatasVendaValidacao->addAnd($cCriterioDataCompraFinal);


        $cCriterioEntreDatasValidacao->addAnd($cCriterioDataValidacaoFinal);

        /*ADICIONA OS CRITERIOS SE HOUVER PAGAMENTO DENTRO DA DATA OU SE HOUVER VALIDACAO DENTRO DA DATA*/
        $cCriterioEntreDatasVendaValidacao->addOr($cCriterioEntreDatasValidacao);

        $cComissaoParceiro->add($cCriterioEntreDatasVendaValidacao);
        if ($usuariosIds) {
            $cComissaoParceiro->add(CertificadoPeer::USUARIO_ID, $usuariosIds, Criteria::IN);
            $cComissaoParceiro->addOr(CertificadoPeer::USUARIO_VALIDOU_ID, $usuariosIds, Criteria::IN);
        }
        $cComissaoParceiro->add(CertificadoPeer::APAGADO, 0);

        /* EXCLUIR CERTIFICADO REVOGADOS
         * $cComissaoParceiro->add(CertificadoPeer::CONFIRMACAO_VALIDACAO, '1,2,3', Criteria::IN);*/
        $certificadosParceiro = CertificadoPeer::doSelect($cComissaoParceiro);

        /*ARRAYS QUE GUARDAM OS DADOS DE COMISSAO*/
        $vendas = array("valorVendas"=>0.0, "qtdVendas"=>0, 'certificados'=>array(), 'colunas'=>'');
        $validacoes = array("valorVendas"=>0.0, "qtdVendas"=>0, 'certificados'=>array(), 'colunas'=>'');
        $vendasValidacoes = array("valorVendas"=>0.0, "qtdVendas"=>0, 'certificados'=>array(), 'colunas'=>'');

        /*CONTAGEM DOS CERTIFICADOS POR TIPO*/
        $i = 0;
        $h = 0;
        $j = 0;
        /*FIM DA CONTAGEM*/
        $somaProdutosVendidosValidados = 0;
        $somaProdutosVendidos = 0;
        $somaProdutosValidados = 0;
        foreach ($certificadosParceiro as $key=>$certificado) {
            if($certificado->getConfirmacaoValidacao()){
                /*
                 * CONFIRMACAO VALIDACAO = 1 EMITIDO OU APROVADO
                 * CONFIRMACAO VALIDACAO = 2 PENDENTE
                 * CONFIRMACAO VALIDACAO = 3 RENOVACAO
                 * CONFIRMACAO VALIDACAO = 4 REVOGADO
                */

                if ($certificado->getConfirmacaoValidacao() == 1)
                    $situacao = '<a data-toggle="modal" data-target="#detalharCertificado" title="Detalhar Certificado" id="btnDetalharCertificado" onclick="$(\'#idCertificado\').val('.$certificado->getId().'); carregarModalDetalharCertificado('.$certificado->getId().', \'sim\');"><i class="fa fa-flag" aria-hidden="true" style="color:#096;" title="validado em '.$certificado->getDataValidacao('d/m/Y').' Agr: '.(($certificado->getUsuarioValidouId())?$certificado->getUsuarioRelatedByUsuarioValidouId()->getNome():'---').'"></i></a>';
                elseif ($certificado->getConfirmacaoValidacao() == 2)
                    $situacao = '<a data-toggle="modal" data-target="#detalharCertificado" title="Detalhar Certificado" id="btnDetalharCertificado" onclick="$(\'#idCertificado\').val('.$certificado->getId().'); carregarModalDetalharCertificado('.$certificado->getId().', \'sim\');"><i class="fa fa-flag" aria-hidden="true" style="color:#fff847" title="validado em '.$certificado->getDataValidacao('d/m/Y').' Agr: '.(($certificado->getUsuarioValidouId())?$certificado->getUsuarioRelatedByUsuarioValidouId()->getNome():'---'). '(pendente)"></i></a>';
                elseif ($certificado->getConfirmacaoValidacao() == 3)
                    $situacao = '<a data-toggle="modal" data-target="#detalharCertificado" title="Detalhar Certificado" id="btnDetalharCertificado" onclick="$(\'#idCertificado\').val('.$certificado->getId().'); carregarModalDetalharCertificado('.$certificado->getId().', \'sim\');"><i class="fa fa-flag" aria-hidden="true" style="color:#fff847" title="validado em '.$certificado->getDataValidacao('d/m/Y').' Agr: '.(($certificado->getUsuarioValidouId())?$certificado->getUsuarioRelatedByUsuarioValidouId()->getNome():'---').' (renovado)"></i></a>';
                elseif ($certificado->getConfirmacaoValidacao() == 4)
                    $situacao = '<a data-toggle="modal" data-target="#detalharCertificado" title="Detalhar Certificado" id="btnDetalharCertificado" onclick="$(\'#idCertificado\').val('.$certificado->getId().'); carregarModalDetalharCertificado('.$certificado->getId().', \'sim\');"><i class="fa fa-flag" aria-hidden="true" style="color:#ac2925" title="revogado em '.$certificado->getDataValidacao('d/m/Y').' Agr: '.(($certificado->getUsuarioValidouId())?$certificado->getUsuarioRelatedByUsuarioValidouId()->getNome():'---').'"></i></a>';
            } else
                $situacao = ' <a data-toggle="modal" data-target="#detalharCertificado" title="Detalhar Certificado" id="btnDetalharCertificado" onclick="$(\'#modalCarregando\').modal(\'show\'); carregarModalDetalharCertificado('.$certificado->getId().', \'sim\');"> <i class="fa fa-arrows"></i> </a>';
            //$certificado = new Certificado();
            $nomeCliente = ($certificado->getCliente()->getRazaoSocial() != '')?utf8_encode($certificado->getCliente()->getRazaoSocial()):utf8_encode($certificado->getCliente()->getNomeFantasia());
            $usuarioConsultor = $certificado->getUsuario()?$certificado->getUsuario()->getNome():'---';
            $usuarioAgr = ($certificado->getUsuarioValidouId())?$certificado->getUsuarioValidouId():'---';
            $produto = ($certificado->getProduto()) ? $certificado->getProduto()->getNome() : '---';

            /*
             * SE A VENDA FOI FEITA DENTRO DO MES SELECIONADO
             * */
            if (
                ($certificado->getDataConfirmacaoPagamento()) &&
                (new DateTime($certificado->getDataConfirmacaoPagamento())>=$dataInicial) && (new DateTime($certificado->getDataConfirmacaoPagamento())<=$dataFinal)
            )
            {

                /*
                 * SE FOI VENDIDO POR UM DOS VENDEDORES DO PARCEIRO E
                 * FOI VALIDADO POR UM DOS AGRS DO PARCEIRO E
                 * TIVER CONFIRMADO DE VALIDACAO E
                 * TIVER SIDO VALIDADO DENTRO DO MES SELECIONADO
                 *
                 * */
                if (
                    (array_search($certificado->getUsuarioId(), $usuariosIds)!==false) &&
                    (array_search($certificado->getUsuarioValidouId(), $usuariosIds)!==false) &&
                    ( array_search($certificado->getConfirmacaoValidacao() ,array( 1,2,3))!==false) &&
                    ( (new DateTime($certificado->getDataValidacao())>=$dataInicial) && (new DateTime($certificado->getDataValidacao())<=$dataFinal) )

                ) {


                        $somaProdutosVendidosValidados += $certificado->getProduto()->getPreco() - $certificado->getDesconto();
                        $vendasValidacoes['valorVendas'] += $certificado->getProduto()->getPreco() - $certificado->getDesconto();
                        $vendasValidacoes['qtdVendas'] += 1;

                        $vendasValidacoes['certificados'][] = array(' '=>(++$j),'Id'=>$certificado->getId(),
                            'D.Pag.'=>'<span tile="'.$certificado->getDataCompra('d/m/Y').'">'.$certificado->getDataConfirmacaoPagamento('d/m/Y').'</span>',
                            'D.Val.'=>($certificado->getDataValidacao('d/m/Y'))?$certificado->getDataValidacao('d/m/Y'):'---',
                            'Proto.'=> $certificado->getProtocolo(),
                            'Cliente'=> $certificado->getCliente()->getId() . ' - '.$nomeCliente,
                            'Tipo'=>utf8_encode($produto),
                            'Consultor'=>utf8_encode($usuarioConsultor),
                            'Tot'=>formataMoeda($certificado->getProduto()->getPreco() - $certificado->getDesconto()),
                            '.'=>utf8_encode($situacao),
                        );
                        $vendasValidacoes['colunas'] = array(
                            array('nome'=>' '), array('nome'=>'Id'), array('nome'=>'D.Pag.'),array('nome'=>'D.Val.'), array('nome'=>'Proto.'), array('nome'=>'Cliente'),
                            array('nome'=>'Tipo'), array('nome'=>'Consultor'), array('nome'=>'Tot'), array('nome'=>'.')
                        );

                    /*
                     * SE FOI VENDIDO POR UM DOS VENDEDORES DO PARCEIRO E NAO VALIDOU OU
                     * SE FOI VENDIDO POR UM DOS VENDEDORES DO PARCEIRO E VALIDOU NO MES ANTERIOR OU NOS MESES SEGUINTES OU
                     * SE FOI VENDIDO POR UM DOS VENDEDORES DO PARCEIRO, VALIDOU DENTRO DO MES E O AGR QUE VALIDOU NAO E DO PARCEIRO
                     * */
                } elseif (
                    ((array_search($certificado->getUsuarioId(), $usuariosIds)!==false) && $certificado->getConfirmacaoValidacao()==0) ||
                    (
                        (array_search($certificado->getUsuarioId(), $usuariosIds)!==false) &&
                        (array_search($certificado->getConfirmacaoValidacao() ,array( 1,2,3))!==false) &&
                        ( (new DateTime($certificado->getDataValidacao())<$dataInicial) || (new DateTime($certificado->getDataValidacao())>$dataFinal) )
                    ) ||
                    (
                        (array_search($certificado->getUsuarioId(), $usuariosIds)!==false) &&
                        (array_search($certificado->getConfirmacaoValidacao() ,array( 1,2,3))!==false) && (new DateTime($certificado->getDataValidacao())>=$dataInicial) && (new DateTime($certificado->getDataValidacao())<=$dataFinal) &&
                        (array_search($certificado->getUsuarioValidouId(), $usuariosIds) === false)
                    )

                ) {
                    $somaProdutosVendidos += $certificado->getProduto()->getPreco() - $certificado->getDesconto();
                    $vendas['valorVendas'] += $certificado->getProduto()->getPreco() - $certificado->getDesconto();
                    $vendas['qtdVendas'] += 1;

                    $vendas['certificados'][] = array(' '=>(++$h),'Id'=>$certificado->getId(),
                        'D.Pag.'=>'<span tile="'.$certificado->getDataCompra('d/m/Y').'">'.$certificado->getDataConfirmacaoPagamento('d/m/Y').'</span>',
                        'D.Com.'=>($certificado->getDataCompra('d/m/Y'))?$certificado->getDataCompra('d/m/Y'):'---',
                        'Proto.'=> $certificado->getProtocolo(),
                        'Cliente'=> $certificado->getCliente()->getId() . ' - '.$nomeCliente,
                        'Tipo'=>utf8_encode($produto),
                        'Consultor'=>utf8_encode($usuarioConsultor),
                        'Tot'=>formataMoeda($certificado->getProduto()->getPreco() - $certificado->getDesconto()),
                        '.'=>utf8_encode($situacao),
                    );
                    $vendas['colunas'] = array(
                        array('nome'=>' '), array('nome'=>'Id'), array('nome'=>'D.Pag.'),array('nome'=>'D.Com.'), array('nome'=>'Proto.'), array('nome'=>'Cliente'),
                        array('nome'=>'Tipo'), array('nome'=>'Consultor'), array('nome'=>'Tot'), array('nome'=>'.')
                    );

                    /*
                     * SE FOI VENDIDO POR UM VENDEDOR QUE NAO E DO PARCEIRO E
                     * FOI VALIDADO E
                     * FOI VALIDADO POR UM AGR DO PARCEIRO E
                     * FOI VALIDADO DENTRO DO MES
                     * */
                } elseif (
                    (array_search($certificado->getUsuarioId(), $usuariosIds)===false) &&
                    ( (array_search($certificado->getConfirmacaoValidacao() ,array( 1,2,3))!==false) && (array_search($certificado->getUsuarioValidouId(), $usuariosIds)!==false) ) &&
                    (new DateTime($certificado->getDataValidacao())>=$dataInicial) && (new DateTime($certificado->getDataValidacao())<=$dataFinal)
                )
                {
                    $somaProdutosValidados += $certificado->getProduto()->getPreco() - $certificado->getDesconto();
                    $validacoes['valorVendas'] += $certificado->getProduto()->getPreco() - $certificado->getDesconto();
                    $validacoes['qtdVendas'] += 1;

                    $validacoes['certificados'][] = array(' '=>(++$i),'Id'=>$certificado->getId(),
                        'D.Pag.'=>$certificado->getDataConfirmacaoPagamento('d/m/Y'),
                        'D.Val.'=>($certificado->getDataValidacao('d/m/Y'))?$certificado->getDataValidacao('d/m/Y'):'---',
                        'Proto.'=> $certificado->getProtocolo(),
                        'Cliente'=> $certificado->getCliente()->getId() . ' - '.$nomeCliente,
                        'Tipo'=>utf8_encode($produto),
                        'Consultor'=>utf8_encode($usuarioConsultor),
                        'Tot'=>formataMoeda($certificado->getProduto()->getPreco() - $certificado->getDesconto()),
                        '.'=>utf8_encode($situacao),
                    );
                    $validacoes['colunas'] = array(
                        array('nome'=>' '), array('nome'=>'Id'), array('nome'=>'D.Pag.'), array('nome'=>'D.Val.'), array('nome'=>'Proto.'), array('nome'=>'Cliente'),
                        array('nome'=>'Tipo'), array('nome'=>'Consultor'), array('nome'=>'Tot'), array('nome'=>'.')
                    );

                }
            }
            /*
             *
             * SE A VENDA ACONTECEU NO MES ANTERIOR E
             * FOI VALIDADO E
             * FOI VALIDADO POR UM AGR DO PARCEIRO
             * DENTRO DO MES DA PESQUISA
             * */
            elseif (
                ($certificado->getDataConfirmacaoPagamento()) && ((new DateTime($certificado->getDataConfirmacaoPagamento())<$dataInicial) || (new DateTime($certificado->getDataConfirmacaoPagamento())>$dataFinal)) &&
                ( (array_search($certificado->getConfirmacaoValidacao() ,array( 1,2,3))!==false) && (array_search($certificado->getUsuarioValidouId(), $usuariosIds)!==false) ) &&
                ((new DateTime($certificado->getDataValidacao())>=$dataInicial) || (new DateTime($certificado->getDataValidacao())<=$dataFinal))
            )
            {
                $somaProdutosValidados += $certificado->getProduto()->getPreco() - $certificado->getDesconto();
                $validacoes['valorVendas'] += $certificado->getProduto()->getPreco() - $certificado->getDesconto();
                $validacoes['qtdVendas'] += 1;

                $validacoes['certificados'][] = array(' '=>(++$i),'Id'=>$certificado->getId(),
                    'D.Pag.'=>$certificado->getDataConfirmacaoPagamento('d/m/Y'),
                    'D.Val.'=>($certificado->getDataValidacao('d/m/Y'))?$certificado->getDataValidacao('d/m/Y'):'---',
                    'Proto.'=> $certificado->getProtocolo(),
                    'Cliente'=> $certificado->getCliente()->getId() . ' - '.$nomeCliente,
                    'Tipo'=>utf8_encode($produto),
                    'Consultor'=>utf8_encode($usuarioConsultor),
                    'Tot'=>formataMoeda($certificado->getProduto()->getPreco() - $certificado->getDesconto()),
                    '.'=>utf8_encode($situacao),
                );
                $validacoes['colunas'] = array(
                    array('nome'=>' '), array('nome'=>'Id'),array('nome'=>'D.Pag.'), array('nome'=>'D.Val.'), array('nome'=>'Proto.'), array('nome'=>'Cliente'),
                    array('nome'=>'Tipo'), array('nome'=>'Consultor'), array('nome'=>'Tot'), array('nome'=>'.')
                );

            }
        }


        /*MONTAGEM DO QUADRO RESUMO*/
        $cRegistroComissao = new Criteria();
        $cRegistroComissao->add(ParceiroComissionamentoPeer::PARCEIRO_ID, $parceiro->getId());
        $cRegistroComissao->add(ParceiroComissionamentoPeer::SITUACAO, -1, Criteria::NOT_EQUAL);
        if ($filtroData) {
            $cRegistroComissao->add(ParceiroComissionamentoPeer::PERIODO_INICIAL, $dataDe[2].'/'.$dataDe[1].'/'.$dataDe[0]);
            $cRegistroComissao->add(ParceiroComissionamentoPeer::PERIODO_FINAL, $dataAte[2].'/'.$dataAte[1].'/'.$dataAte[0]);
        } else {
            $cRegistroComissao->add(ParceiroComissionamentoPeer::PERIODO_INICIAL, date('Y').'-'.(date('m')-1).'-01');
            $cRegistroComissao->add(ParceiroComissionamentoPeer::PERIODO_FINAL, date('Y').'-'.(date('m')-1).'-'.getLastDayOfMonth((date('m')-1), date('Y')));
        }
        $registroComissao = ParceiroComissionamentoPeer::doSelectOne($cRegistroComissao);

        $somaTotalDescontos = 0.0;
        $somaTotalAcrescimos = 0.0;
        $quadroResumo = array();

        /*
         * CASO JA TENHA REGISTRADO OS LANCAMENTOS MOSTRA TODOS OS REGISTROS, CASO CONTRARIO
         * LISTA APENAS OS CERTIFICADOS REVOGADOS
         *
         * */
        if ($registroComissao) {
            /*
             * CHECA SE A COMISSAO JA FOI PAGA, SE SIM NAO MOSTRA NENHUM BOTAO DE APAGAR LANCAMENTO
             * NEM DE REGISTRAR NOVOS
             * */
            $comissaoPaga = 'nao';
            if ($registroComissao->getDataPagamento())
                $comissaoPaga = 'sim';

            if ($comissaoPaga == 'nao') {
                $iconeApagarRegistro = ' <button id="btnApagarRegistroComissao"><i class="fa fa-trash-o" aria-hidden="true" title="Apagar Registro Comiss&atilde;o"></i></button>';
                /*CHAMA A FUNCAO DE CONFIRMACAO*/
                $iconeApagarRegistro .= '<script>$("#btnApagarRegistroComissao").on("click", function(){
                        ezBSAlert({
                        type: "confirm",
                        messageText: "Tem certeza que deseja apagar o registro desta comiss&atilde;o?",
                        alertType: "info"
                        }).done(function (e) {
                            if (e === true)
                                apagarRegistroComissao('.$registroComissao->getId().');
                        });
                        });</script>';
            }
            else
                $iconeApagarRegistro = '';

            $coeficienteVendaValidacao = ($registroComissao->getComissaoVendaValidacao()!=0)?($registroComissao->getComissaoVendaValidacao()/100): 0;
            $coeficienteVenda = ($registroComissao->getComissaoVenda()!=0)?($registroComissao->getComissaoVenda()/100): 0;
            $coeficienteValidacao = ($registroComissao->getComissaoValidacao()!=0)?($registroComissao->getComissaoValidacao()/100): 0;

            $tituloReceita = 'Receitas: '.formataMoeda($registroComissao->getVenda()+$registroComissao->getVendaValidacao());
            $registrou = 'sim';
            $dataRegistro = $registroComissao->getDataRegistro('d/m/Y');
            $periodoRegistro = 'De ' . $registroComissao->getPeriodoInicial('d/m/Y') . ' - ' . 'Ate' . ' '.$registroComissao->getPeriodoFinal('d/m/Y');
            $idComissao = $registroComissao->getId();

            $cLancamentosParceiro = new Criteria();
            $cLancamentosParceiro->add(ParceiroLancamentoPeer::SITUACAO, -1, Criteria::NOT_EQUAL);
            $cLancamentosParceiro->addDescendingOrderByColumn(ParceiroLancamentoPeer::DATA_LANCAMENTO);
            $lancamentosComissao = $registroComissao->getParceiroLancamentos($cLancamentosParceiro);

            $quadroResumo[] = array(utf8_encode('Descri��o')=>utf8_encode('Vendas e Valida��es ('.$parceiro->getComissaoVendaValidacao().'%)'),
                $tituloReceita=>formataMoeda($registroComissao->getVendaValidacao() * $coeficienteVendaValidacao), 'Despesas'=> '-'
            );
            $quadroResumo[] = array(utf8_encode('Descri��o')=>utf8_encode('Apenas Vendidos ('.$parceiro->getComissaoVenda().'%)'),
                $tituloReceita=>formataMoeda($registroComissao->getVenda() * $coeficienteVenda), 'Despesas'=> '-'
            );
            $quadroResumo[] = array(utf8_encode('Descri��o')=>utf8_encode('Apenas Validados ('.$parceiro->getComissaoValidacao().'%)'),
                $tituloReceita=>formataMoeda($registroComissao->getValidacao() * $coeficienteValidacao), 'Despesas'=> '-'
            );

            /*SOMA TODOS OS COMISSIONAMENTOS DE VENDA VALIDACAO E VENDA E VALIDACAO*/
            $somaTotalAcrescimos += ($registroComissao->getVendaValidacao() * $coeficienteVendaValidacao)+($registroComissao->getVenda() * $coeficienteVenda)+($registroComissao->getValidacao() * $coeficienteValidacao);

            /*MOSTRA LANCAMENTO DE ACRESCIMOS*/

            foreach ($lancamentosComissao as $lancamentoComissao) {
                if ($comissaoPaga == 'nao') {
                    $iconeApagar = ' <button id="btnApagarLancamento' . $lancamentoComissao->getId() . '"><i class="fa fa-trash-o" aria-hidden="true" title="Apagar Lan&ccedil;amento"></i></button>';
                    /*CHAMA A FUNCAO DE CONFIRMACAO*/
                    $acaoApagar = '<script>$("#btnApagarLancamento' . $lancamentoComissao->getId() . '").on("click", function(){
                        ezBSAlert({
                        type: "confirm",
                        messageText: "Tem certeza que deseja apagar o lan&ccedil;amento ' . utf8_encode($lancamentoComissao->getDescricao()) . '?",
                        alertType: "info"
                        }).done(function (e) {
                            if (e === true)
                                apagarLancamentoComissao(' . $lancamentoComissao->getId() . ');
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
                if ($comissaoPaga == 'nao') {
                    $iconeApagar = ' <button id="btnApagarLancamento' . $lancamentoComissao->getId() . '"><i class="fa fa-trash-o" aria-hidden="true" title="Apagar Lan&ccedil;amento"></i></button>';
                    /*CHAMA A FUNCAO DE CONFIRMACAO*/
                    $acaoApagar = '<script>$("#btnApagarLancamento' . $lancamentoComissao->getId() . '").on("click", function(){
                        ezBSAlert({
                        type: "confirm",
                        messageText: "Tem certeza que deseja apagar o lan&ccedil;amento ' . utf8_encode($lancamentoComissao->getDescricao()) . '?",
                        alertType: "info"
                        }).done(function (e) {
                            if (e === true)
                                apagarLancamentoComissao(' . $lancamentoComissao->getId() . ');
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
            $coeficienteVendaValidacao = ($parceiro->getComissaoVendaValidacao()!=0)?($parceiro->getComissaoVendaValidacao()/100): 0;
            $coeficienteVenda = ($parceiro->getComissaoVenda()!=0)?($parceiro->getComissaoVenda()/100): 0;
            $coeficienteValidacao = ($parceiro->getComissaoValidacao()!=0)?($parceiro->getComissaoValidacao()/100): 0;

            $tituloReceita = 'Receitas: '.formataMoeda($somaProdutosVendidos+$somaProdutosVendidosValidados);

            /*PASSA PRA A TELA OS VALORES VAZIOS*/
            $registrou = '';
            $dataRegistro = '';
            $periodoRegistro = '';
            $idComissao = '';

            $somaTotalAcrescimos += ($somaTotalDescontos) + ($somaProdutosVendidosValidados * $coeficienteVendaValidacao)+($somaProdutosVendidos * $coeficienteVenda)+($somaProdutosValidados * $coeficienteValidacao);

            $quadroResumo[] = array(utf8_encode('Descri��o')=>utf8_encode('Vendas e Valida��es ('.$parceiro->getComissaoVendaValidacao().'%)'),
                $tituloReceita=>formataMoeda($somaProdutosVendidosValidados * $coeficienteVendaValidacao ), 'Despesas'=> '-'
            );
            $quadroResumo[] = array(utf8_encode('Descri��o')=>utf8_encode('Apenas Vendidos ('.$parceiro->getComissaoVenda().'%)'),
                $tituloReceita=>formataMoeda($somaProdutosVendidos * $coeficienteVenda), 'Despesas'=> '-'
            );
            $quadroResumo[] = array(utf8_encode('Descri��o')=>utf8_encode('Apenas Validados ('.$parceiro->getComissaoValidacao().'%)'),
                $tituloReceita=>formataMoeda($somaProdutosValidados * $coeficienteValidacao), 'Despesas'=> '-'
            );
            $quadroResumo[] = array(utf8_encode('Descri��o')=>'<span class="text-danger">TOTAL PARCIAL (RECEITAS)</span>',
                $tituloReceita=>'<span class="text-danger">'.formataMoeda($somaTotalAcrescimos).'</span>', 'Despesas'=> '-'
            );
            $quadroResumo[] = array(utf8_encode('Descri��o')=>'<strong>Descontos</strong>',
                $tituloReceita=>'', 'Despesas'=>''
            );

            /*
             * BUSCA TODOS OS CERTIFICADOS REVOGADOS E VALIDADOS E NAO PAGOS PARA COLOCAR NA LISTA DE DESCONTOS
            */
            $cCertificadosValidados = new Criteria();
            $cCertificadosValidados->add(CertificadoPeer::DATA_VALIDACAO, $dataDe[2].'/'.$dataDe[1].'/'.$dataDe[0] . ' 00:00:00', Criteria::GREATER_EQUAL);
            $cCertificadosValidados->addAnd(CertificadoPeer::DATA_VALIDACAO, $dataAte[2].'/'.$dataAte[1].'/'.$dataAte[0] . ' 23:59:59', Criteria::LESS_EQUAL);

            $cCdDataPagamento = $cCertificadosValidados->getNewCriterion(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, null, Criteria::ISNULL);
            $cCdDataPagamento2 = $cCertificadosValidados->getNewCriterion(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, '0000-00-00 00:00:00');
            $cCdConfirmacaoValidacao = $cCertificadosValidados->getNewCriterion(CertificadoPeer::CONFIRMACAO_VALIDACAO, 4);

            $cCdDataPagamento->addOr($cCdDataPagamento2);
            $cCdConfirmacaoValidacao->addOr($cCdDataPagamento);
            /*SE FOI REVOGADO OU SE SE FOI VALIDADO E NAO PAGO*/
            $cCertificadosValidados->add($cCdConfirmacaoValidacao);
            $cCertificadosValidados->add(CertificadoPeer::USUARIO_VALIDOU_ID,  $usuariosIds, Criteria::IN);
            $cCertificadosValidados->add(CertificadoPeer::APAGADO, 0);
            $certificadosValidados = CertificadoPeer::doSelect($cCertificadosValidados);

            $arrCertificadosRevogados = array();
            foreach ($certificadosValidados as $key=>$certificado) {
                /*$certificado = new Certificado();*/
                /*
                 * SE FOI REVOGADO
                 * */
                if (($certificado->getConfirmacaoValidacao() == 4) ) {
                    $agrRevogou = UsuarioPeer::retrieveByPK($certificado->getUsuarioValidouId());
                    $agrRevogou = ($agrRevogou) ? $agrRevogou->getNome() : '---';
                    $produtoRevogado = $certificado->getProduto();
                    /*PEGA O PRODUTO PRINCIPAL VINCULADO AO PRODUTO REVOGADO PARA SABER QUAL SERA A TAXA DE VALIDACAO*/
                    $produtoPrincipalRevogacao = $produtoRevogado->getProdutoRelatedByProdutoId();
                    if ($produtoPrincipalRevogacao) {

                        /*O PRECO DE REVOGACAO SERA O PRE�O DE CUSTO + 30%*/
                        $precoRevogacao = $produtoPrincipalRevogacao->getPrecoCusto() + ($produtoPrincipalRevogacao->getPrecoCusto() * 0.3);
                        $somaTotalDescontos += $precoRevogacao;
                        $arrCertificadosRevogados[] = array('descricao'=>utf8_encode('Revoga��o do certificado '.$certificado->getId() . ' produto ' .utf8_encode($certificado->getProduto()->getNome()) .' dia '. $certificado->getDataValidacao('d/m/Y') . ' pelo AGR.: ' . $agrRevogou ) ,
                            'valor'=> $precoRevogacao
                        );

                        $quadroResumo[] = array(utf8_encode('Descri��o')=>utf8_encode('Revoga��o do certificado '.$certificado->getId() . ' produto ' .utf8_encode($certificado->getProduto()->getNome()) .' dia '. $certificado->getDataValidacao('d/m/Y') . ' pelo AGR.: ' . $agrRevogou . ' <a data-toggle="modal" data-target="#detalharCertificado" title="Detalhar Certificado" id="btnDetalharCertificado" onclick="$(\'#idCertificado\').val('.$certificado->getId().'); carregarModalDetalharCertificado('.$certificado->getId().', \'sim\');"> <i class="fa fa-arrows"></i> </a>') ,
                            $tituloReceita=>'-', 'Despesas'=> formataMoeda($precoRevogacao)
                        );
                    } else {
                        $quadroResumo[] = array(utf8_encode('Descri��o')=>utf8_encode('Revoga��o do certificado '.$certificado->getId() . ' produto ' .utf8_encode($certificado->getProduto()->getNome()) .' dia '. $certificado->getDataValidacao('d/m/Y') . ' pelo AGR.: ' . $agrRevogou),
                            $tituloReceita=>'-', 'Despesas'=> 'Verificar taxa de revoga&ccedil;&atilde;o'
                        );
                    }

                } else {
                    /*
                     * SE NAO FOI REVOGADO FOI VALIDADO E NAO PAGO
                     * */

                        $produtoVendido = $certificado->getProduto();

                        $somaTotalDescontos += $produtoVendido->getPreco() - $certificado->getDesconto();
                        $arrCertificadosRevogados[] = array('descricao'=>utf8_encode('Certificado validado e n&atilde;o pago, c&oacute;digo: '.$certificado->getId() . ' | data de valida&ccedil;&atilde;o: '.$certificado->getDataValidacao('d/m/Y')  ) ,
                            'valor'=> $produtoVendido->getPreco() - $certificado->getDesconto()
                        );

                        $quadroResumo[] = array(utf8_encode('Descri��o')=>utf8_encode('Certificado validado e n&atilde;o pago, c&oacute;digo: '.$certificado->getId() . ' | data de valida&ccedil;&atilde;o: '.$certificado->getDataValidacao('d/m/Y') . ' <a data-toggle="modal" data-target="#detalharCertificado" title="Detalhar Certificado" id="btnDetalharCertificado" onclick="$(\'#idCertificado\').val('.$certificado->getId().'); carregarModalDetalharCertificado('.$certificado->getId().', \'sim\');"> <i class="fa fa-arrows"></i> </a>') ,
                            $tituloReceita=>'-', 'Despesas'=> formataMoeda($produtoVendido->getPreco() - $certificado->getDesconto())
                        );
                }
            }
            /*FINALIZA MONTAGEM DO QUADRO RESUMO*/


            $quadroResumo[] = array(utf8_encode('Descri��o')=>'<span class="text-danger">TOTAL PARCIAL (DESCONTOS)</span>',
                $tituloReceita=>'-', 'Despesas'=> '<span class="text-danger">'.formataMoeda($somaTotalDescontos).'</span>'
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
        /*FIM MONTAGEM DO QUADRO RESUMO*/

        $dadosComissao =  array(
            'comissaoVendaValidacao'=>$parceiro->getComissaoVendaValidacao(),
            'comissaoVenda'=>$parceiro->getComissaoVenda(),
            'comissaoValidacao'=>$parceiro->getComissaoValidacao(),

            'vendas'=>formataMoeda($vendas['valorVendas']) . ' ('. $vendas['qtdVendas'].')' ,
            'validacoes'=>formataMoeda($validacoes['valorVendas']) . ' ('. $validacoes['qtdVendas'].')' ,
            'vendasValidacoes'=> formataMoeda($vendasValidacoes['valorVendas']) . ' ('. $vendasValidacoes['qtdVendas'].')',
            'valorVendas'=>$vendas['valorVendas'],
            'valorValidacoes'=>$validacoes['valorVendas'] ,
            'valorVendasValidacoes'=> $vendasValidacoes['valorVendas'],

            'colunasCertificadosVendidosValidados'=>json_encode($vendasValidacoes['colunas']), 'certificadosVendidosValidados'=>json_encode($vendasValidacoes['certificados']),
            'colunasCertificadosVendidos'=>json_encode($vendas['colunas']), 'certificadosVendidos'=>json_encode($vendas['certificados']),
            'colunasCertificadosValidados'=>json_encode($validacoes['colunas']), 'certificadosValidados'=>json_encode($validacoes['certificados']),
            'quadroResumo'=>json_encode($quadroResumo), 'colunasQuadroResumo'=>json_encode($colunasQuadroResumo)
        );


        $_SESSION['certificadosRevogados'] = serialize($arrCertificadosRevogados);

        $retorno = array('id' =>$parceiro->getId(), 'resultado'=>'Sucesso',
            'nome'=>$parceiro->getNome(), 'contatos'=>$contatos,
            'btnBloqueio'=>$btnBloqueio, 'dadosComissao'=>$dadosComissao, 'registroComissao'=>$registrou,
            'dataRegistroComissao'=>$dataRegistro,
            'periodoRegistroComissao'=>$periodoRegistro,
            'comissionamentoId'=>$idComissao,
            'iconeApagarRegistroComissao'=>$iconeApagarRegistro,
            'comissaoPaga'=>$comissaoPaga
        );

        echo json_encode($retorno);
    }catch(Exception $e){
        echo var_dump($e);
    }
}

function bloquear_parceiro () {
    try {
        //Cabe�alho do modal detalhar Parceiro
        $parceiro =  ParceiroPeer::retrieveByPk($_POST['parceiro_id']);
        $retorno = '';
        if ($_POST['acao'] == 'bloquear') {
            $parceiro->setSituacao(-2);
            $retorno = 'bloqueado';
        }
        elseif ($_POST['acao'] == 'desbloquear') {
            $parceiro->setSituacao(0);
            $retorno = 'desbloqueado';
        }

        $parceiro->save();
        echo 'Sucesso;'.$retorno;
    }catch(Exception $e){
        var_dump($e->getMessage());
    }
}

function apagar_parceiro () {
    try {
        //Cabe�alho do modal detalhar Parceiro
        $parceiro =  ParceiroPeer::retrieveByPk($_POST['parceiro_id']);
        $parceiro->setSituacao(-1);
        $parceiro->save();
        echo 'Sucesso';
    }catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}

function registrarComissaoParceiro () {
    try {
        //Cabe�alho do modal detalhar Parceiro
        $comissaoParceiro =  new ParceiroComissionamento();
        $comissaoParceiro->setDescricao(utf8_decode($_POST['descricao']));
        $periodoDe = explode('/',$_POST['periodoDe']);
        $periodoAte = explode('/',$_POST['periodoAte']);
        $periodoDe = $periodoDe[2] . "/" .$periodoDe[1] . "/" .$periodoDe[0];
        $periodoAte = $periodoAte[2] . "/" .$periodoAte[1] . "/" .$periodoAte[0];

        $comissaoParceiro->setPeriodoInicial($periodoDe);
        $comissaoParceiro->setPeriodoFinal($periodoAte);

        $vendaValidacao = $_POST['vendasValidacoes'];
        $venda = $_POST['vendas'];
        $validacao = $_POST['validacoes'];

        $comissaoParceiro->setVendaValidacao($vendaValidacao);
        $comissaoParceiro->setVenda($venda);
        $comissaoParceiro->setValidacao($validacao);

        $comissaoParceiro->setComissaoVendaValidacao($_POST['comissaoVendasVelidacoes']);
        $comissaoParceiro->setComissaoVenda($_POST['comissaoVendas']);
        $comissaoParceiro->setComissaoValidacao($_POST['comissaoValidacoes']);
        $comissaoParceiro->setParceiroId($_POST['parceiro_id']);

        $comissaoParceiro->setDataRegistro(date('Y/m/d H:i:s'));

        $comissaoParceiro->save();

        /*REGISTRA OS CERTIFICADOS REVOGADOS*/
        if ($_SESSION['certificadosRevogados']) {
            $certificadosRevogados = unserialize($_SESSION['certificadosRevogados']);
            unset($_SESSION['certificadosRevogados']);

            foreach ($certificadosRevogados as $certificadoRevogado) {
                $lancamentoComissao = new ParceiroLancamento();
                $lancamentoComissao->setDataLancamento(date('Y/m/d H:i:s'));
                $lancamentoComissao->setDescricao(utf8_decode($certificadoRevogado['descricao']));
                $lancamentoComissao->setTipoLancamento('D');
                $lancamentoComissao->setParceiroComissionamentoId($comissaoParceiro->getId());
                $lancamentoComissao->setValor($certificadoRevogado['valor']);
                $lancamentoComissao->save();
            }
        }

        echo json_encode(array('mensagem'=>'Ok'));
    }catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}

function registrarLancamentoComissaoParceiro () {
    try {
        $lancamentoComissao = new ParceiroLancamento();
        $lancamentoComissao->setDataLancamento(date('Y/m/d H:i:s'));
        $lancamentoComissao->setDescricao(utf8_decode($_POST['descricao']));
        $lancamentoComissao->setTipoLancamento($_POST['tipoLancamento']);
        $lancamentoComissao->setParceiroComissionamentoId($_POST['comissionamento_id']);
        $lancamentoComissao->setValor($_POST['valor']);
        $lancamentoComissao->setObservacao($_POST['observacao']);
        $lancamentoComissao->save();

        echo json_encode(array('mensagem'=>'Ok'));
    } catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}

function apagarLancamentoComissaoParceiro () {
    try {
        $lancamentoComissao = ParceiroLancamentoPeer::retrieveByPK($_POST['idLancamentoComissaoParceiro']);
        $lancamentoComissao->setSituacao(-1);
        $lancamentoComissao->save();

        echo json_encode(array('mensagem'=>'Ok'));
    } catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}

function apagarRegistroComissao () {
    try {
        $registroComissao = ParceiroComissionamentoPeer::retrieveByPK($_POST['idRegistroComissao']);
        $registroComissao->setSituacao(-1);
        $registroComissao->save();

        echo json_encode(array('mensagem'=>'Ok'));
    } catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}

function carregarParceirosRelatorioComissaoTabelaFixa () {
    try {
        $cParceiro = new Criteria();
        $cParceiro->add(ParceiroPeer::SITUACAO, -1, Criteria::NOT_EQUAL);
        $cParceiro->add(ParceiroPeer::TIPO_CANAL, 'tabela');
        $cParceiro->addAscendingOrderByColumn(ParceiroPeer::NOME);
        $parceirosObj = ParceiroPeer::doSelect($cParceiro);

        $parceiros = array();

        foreach ($parceirosObj as $key=>$parceiro) {
            $cRegistroComissao = new Criteria();
            $cRegistroComissao->add(ParceiroComissionamentoPeer::SITUACAO, -1, Criteria::NOT_EQUAL);
            $cRegistroComissao->add(ParceiroComissionamentoPeer::PARCEIRO_ID, $parceiro->getId());

            if ($_POST['filtroPeriodoComissao'])
                $filtroData = explode(',',$_POST['filtroPeriodoComissao']);

            if ($filtroData) {
                $dataDe = explode('/',$filtroData[0]);
                $dataAte = explode('/',$filtroData[1]);

                $cRegistroComissao->add(ParceiroComissionamentoPeer::PERIODO_INICIAL, $dataDe[2].'/'.$dataDe[1].'/'.$dataDe[0]);
                $cRegistroComissao->add(ParceiroComissionamentoPeer::PERIODO_FINAL, $dataAte[2].'/'.$dataAte[1].'/'.$dataAte[0]);
            } else {
                $cRegistroComissao->add(ParceiroComissionamentoPeer::PERIODO_INICIAL, date('Y').'-'.(date('m')-1).'-01');
                $cRegistroComissao->add(ParceiroComissionamentoPeer::PERIODO_FINAL, date('Y').'-'.(date('m')-1).'-'.getLastDayOfMonth((date('m')-1), date('Y')));
            }
            $registroComissao = ParceiroComissionamentoPeer::doSelectOne($cRegistroComissao);
            $somaTotalComissionamento = 0.0;

            if ($registroComissao) {
                if ($registroComissao->getComissaoVendaValidacao())
                    $somaTotalComissionamento += $registroComissao->getVendaValidacao() * ($registroComissao->getComissaoVendaValidacao()/100);
                if ($registroComissao->getComissaoVenda())
                    $somaTotalComissionamento += $registroComissao->getVenda() * ($registroComissao->getComissaoVenda()/100);
                if ($registroComissao->getComissaoValidacao())
                    $somaTotalComissionamento += $registroComissao->getValidacao() * ($registroComissao->getComissaoValidacao()/100);

                $cLancamentoComissao = new Criteria();
                $cLancamentoComissao->add(ParceiroLancamentoPeer::SITUACAO, -1, Criteria::NOT_EQUAL);
                $lancamentosComissao = $registroComissao->getParceiroLancamentos($cLancamentoComissao);


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

                $btnPago = '<input type="checkbox" id="chkPago'.$parceiro->getId().'" '.$pago.' data-onstyle="danger" data-offstyle="success">
                <script>
                $(function() {
                    $("#chkPago'.$parceiro->getId().'").bootstrapToggle({
                        on: "Extornar",
                        off: "Pagar"
                    });
                    
                    $("#chkPago'.$parceiro->getId().'").change(function() {
                        
                        if ($(this).prop("checked"))
                            informarPagamentoExtornoComissaoParceiro('.$registroComissao->getId().', "pagar");
                        else
                            informarPagamentoExtornoComissaoParceiro('.$registroComissao->getId().', "extornar");
                    });
                });
                </script>';
            }
            else {
                $dataPagamento = '---';
                $descricaoRegistroComissao = '---';
                $btnPago = 'Necessita Registro';
            }


            $btnDetalhar = '<button onclick="$(\'#detalharParceiro\').modal(\'show\'); detalhar_parceiro('.$parceiro->getId().')"><i class="fa fa-arrows"></i></button> ';

            if ($parceiro->getLocal()) $local = $parceiro->getLocal()->getNome();


            $valor = ($somaTotalComissionamento!=0)?formataMoeda($somaTotalComissionamento):'-';

            $parceiros[] =  array('Id'=>$parceiro->getId(),'Nome'=>utf8_encode($parceiro->getNome()). ' '. $btnDetalhar,
                'Empresa'=> (utf8_encode($parceiro->getEmpresa()))?utf8_encode($parceiro->getEmpresa()):'---',
                'Localidade'=> utf8_encode($parceiro->getCidade() .'/' . $parceiro->getUf()),
                'Dados'=> utf8_encode($parceiro->getBanco()). '<br/> (Ag: ' .$parceiro->getAgencia() .') <strong> CC:' . $parceiro->getContaCorrente() .'</strong> - Op:'. $parceiro->getOperacao(),
                'Registro'=>$descricaoRegistroComissao, 'Pagto.'=>$dataPagamento, 'Valor' =>$valor,
                utf8_encode('A��o')=>$btnPago
            );
        }/*FIM DO FOR*/

        $colunas = array(
            array('nome'=>'Id'), array('nome'=>'Nome'), array('nome'=>'Empresa'), array('nome'=>'Localidade'),array('nome'=>'Dados'),
            array('nome'=>'Registro'),  array('nome'=>'Pagto.'),array('nome'=>'Valor'), array('nome'=>utf8_encode('A��o'))
        );

        echo json_encode(array('mensagem'=>'Ok', 'colunas'=>json_encode($colunas), 'parceiros'=>json_encode($parceiros)));
    } catch (Exception $e ) {
        echo var_dump($e->getMessage());
    }
}

function carregarParceirosRelatorioComissao () {
    try {
        $cParceiro = new Criteria();
        $cParceiro->add(ParceiroPeer::SITUACAO, -1, Criteria::NOT_EQUAL);
        $cParceiro->addAscendingOrderByColumn(ParceiroPeer::NOME);
        $parceirosObj = ParceiroPeer::doSelect($cParceiro);

        $parceiros = array();

        foreach ($parceirosObj as $key=>$parceiro) {
            $cRegistroComissao = new Criteria();
            $cRegistroComissao->add(ParceiroComissionamentoPeer::SITUACAO, -1, Criteria::NOT_EQUAL);
            $cRegistroComissao->add(ParceiroComissionamentoPeer::PARCEIRO_ID, $parceiro->getId());

            if ($_POST['filtroPeriodoComissao'])
                $filtroData = explode(',',$_POST['filtroPeriodoComissao']);

            if ($filtroData) {
                $dataDe = explode('/',$filtroData[0]);
                $dataAte = explode('/',$filtroData[1]);

                $cRegistroComissao->add(ParceiroComissionamentoPeer::PERIODO_INICIAL, $dataDe[2].'/'.$dataDe[1].'/'.$dataDe[0]);
                $cRegistroComissao->add(ParceiroComissionamentoPeer::PERIODO_FINAL, $dataAte[2].'/'.$dataAte[1].'/'.$dataAte[0]);
            } else {
                $cRegistroComissao->add(ParceiroComissionamentoPeer::PERIODO_INICIAL, date('Y').'-'.(date('m')-1).'-01');
                $cRegistroComissao->add(ParceiroComissionamentoPeer::PERIODO_FINAL, date('Y').'-'.(date('m')-1).'-'.getLastDayOfMonth((date('m')-1), date('Y')));
            }
            $registroComissao = ParceiroComissionamentoPeer::doSelectOne($cRegistroComissao);
            $somaTotalComissionamento = 0.0;

            if ($registroComissao) {
                if ($registroComissao->getComissaoVendaValidacao())
                    $somaTotalComissionamento += $registroComissao->getVendaValidacao() * ($registroComissao->getComissaoVendaValidacao()/100);
                if ($registroComissao->getComissaoVenda())
                    $somaTotalComissionamento += $registroComissao->getVenda() * ($registroComissao->getComissaoVenda()/100);
                if ($registroComissao->getComissaoValidacao())
                    $somaTotalComissionamento += $registroComissao->getValidacao() * ($registroComissao->getComissaoValidacao()/100);

                $cLancamentoComissao = new Criteria();
                $cLancamentoComissao->add(ParceiroLancamentoPeer::SITUACAO, -1, Criteria::NOT_EQUAL);
                $lancamentosComissao = $registroComissao->getParceiroLancamentos($cLancamentoComissao);


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

                $btnPago = '<input type="checkbox" id="chkPago'.$parceiro->getId().'" '.$pago.' data-onstyle="danger" data-offstyle="success">
                <script>
                $(function() {
                    $("#chkPago'.$parceiro->getId().'").bootstrapToggle({
                        on: "Extornar",
                        off: "Pagar"
                    });
                    
                    $("#chkPago'.$parceiro->getId().'").change(function() {
                        
                        if ($(this).prop("checked"))
                            informarPagamentoExtornoComissaoParceiro('.$registroComissao->getId().', "pagar");
                        else
                            informarPagamentoExtornoComissaoParceiro('.$registroComissao->getId().', "extornar");
                    });
                });
                </script>';
            }
            else {
                $dataPagamento = '---';
                $descricaoRegistroComissao = '---';
                $btnPago = 'Necessita Registro';
            }


            $btnDetalhar = '<button onclick="$(\'#detalharParceiro\').modal(\'show\'); detalhar_parceiro('.$parceiro->getId().')"><i class="fa fa-arrows"></i></button> ';

            if ($parceiro->getLocal()) $local = $parceiro->getLocal()->getNome();


            $valor = ($somaTotalComissionamento!=0)?formataMoeda($somaTotalComissionamento):'-';

            $parceiros[] =  array('Id'=>$parceiro->getId(),'Nome'=>utf8_encode($parceiro->getNome()). ' '. $btnDetalhar,
                'Empresa'=> (utf8_encode($parceiro->getEmpresa()))?utf8_encode($parceiro->getEmpresa()):'---',
                'Localidade'=> utf8_encode($parceiro->getCidade() .'/' . $parceiro->getUf()),
                'Dados'=> utf8_encode($parceiro->getBanco()). '<br/> (Ag: ' .$parceiro->getAgencia() .') <strong> CC:' . $parceiro->getContaCorrente() .'</strong> - Op:'. $parceiro->getOperacao(),
                'Registro'=>$descricaoRegistroComissao, 'Pagto.'=>$dataPagamento, 'Valor' =>$valor,
                utf8_encode('A��o')=>$btnPago
            );
        }/*FIM DO FOR*/

        $colunas = array(
            array('nome'=>'Id'), array('nome'=>'Nome'), array('nome'=>'Empresa'), array('nome'=>'Localidade'),array('nome'=>'Dados'),
            array('nome'=>'Registro'),  array('nome'=>'Pagto.'),array('nome'=>'Valor'), array('nome'=>utf8_encode('A��o'))
        );

        echo json_encode(array('mensagem'=>'Ok', 'colunas'=>json_encode($colunas), 'parceiros'=>json_encode($parceiros)));
    } catch (Exception $e ) {
        echo var_dump($e->getMessage());
    }
}

function informarPagamentoExtornoComissaoParceiro () {
    try {
        $registroComissao = ParceiroComissionamentoPeer::retrieveByPK($_POST['registroComissaoId']);
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

?>
