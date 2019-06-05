<?
    date_default_timezone_set('America/Belem');
	require_once $_SERVER['DOCUMENT_ROOT'].'/loader.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/pagarme-php/Pagarme.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/WSCertificado.php';
	$certificado_id = $_POST['certificado_id'];
    $usuarioLogado = ControleAcesso::getUsuarioLogado();
	$funcao = $_POST['funcao'];


if($funcao == 'carregar_filtros_certificados') { carregarFiltrosCertificados(); }
if($funcao == 'carregar_certificados') { carregarCertificados(); }
if($funcao == 'carregar_modal_trocar_produto') { carregarModalTrocarProdutos(); }


/*if($funcao == 'carrregarModalDetalheCertificado') { carrregarModalDetalheCertificado($certificado_id,$usuarioLogado); }*/
if($funcao == 'carregar_campos_modal_vincular_contador') { carregarModalVincularContador(); }
//VARIAVEL PARA A FUNÇÃO INSERIR OBSERVAÇÃO
if ($funcao == 'carregarModalPedidoInterno') {carregarModalPedidoInterno(); }
if($funcao == 'carregar_modal_detalhar_certificado') { detalharCertificado(); }
/*FUNCAO PARA ABRIR MODAL DE TROCAR PRODUTO E FORMA DE PAGAMENTO E SELECIONAR O PRODUTO*/
if($funcao == 'produto') { 	produto($certificado_id);}
if ($funcao == 'trocar_produto_certificado'){
	trocarProdutoCertificado();
}
if($funcao == 'visualizaProtocolo') {visualizarProcolo($certificado_id);}
if($funcao == 'inserir_observacao') {
	$comentarioObservacao = $_POST['comentario'];
	$usuario_id = $_POST['usuario_id'];
	inserir_observacao($certificado_id,$comentarioObservacao,$usuario_id);
}
if($funcao == 'gerar_recibo'){gerarRecibo();}
if ($funcao == 'apagar_certificado') {
	apagarCertificado();
}
if ($funcao == 'inserir_desconto_certificado') {
	$motivoDesconto = utf8_decode($_POST['motivo']);

	$valor = $_POST['valor'];
	inserirDescontoCertificado($certificado_id,$motivoDesconto,$valor);
}
if($funcao == 'revogar_certificado'){
	revogarCertificado($certificado_id);
}
if($funcao == 'autorizar'){
    $motivoRevogacao = $_REQUEST['motivo'];
    $usuario_id = $_REQUEST['usuario_id'];
    autorizar_certificado($certificado_id,$motivoRevogacao,$usuario_id);
}
if ($funcao=='editar_cliente') {editar_cliente($certificado_id);}
if ($funcao== 'alterar_cliente'){
	alterar_cliente($certificado_id);
}
if ($funcao == 'informar_pagamento_extorno_certificado'){
    informarPagamentoExtornoCertificado();
}
if ($funcao == 'carrega_modal_boleto'){
    carrega_modal_boleto($certificado_id);
}
if ($funcao== 'gerar_boleto'){
    gerarBoletoCertificado($certificado_id);
}
if ($funcao== 'salvar_boleto_safetoPay'){
    salvarBoletoSafeToPay();
}

if ($funcao== 'gerarProtocolo'){

    gerarProtocolo();
}
if ($funcao == 'carregarDesconto'){
    carregar_desconto($certificado_id);
}
if ($funcao == 'vincula_contador'){
    vincula_contador();
}

if($funcao == 'finalizarvendaInterna'){
    finalizarVendaCertificado();
}
if($funcao == 'limparProtocolo'){
    limparProtocolo();
}
if($funcao == 'carregar_modal_alterar_consultor_certificado'){ carregarModalAlteraConsultorUsuario();}
if($funcao == 'alterar_consultor_certificado'){ alterarConsultorCertificado();}

if ($funcao == 'importar_certificados_validados') importarCertificadosValidados();
if ($funcao == 'registrar_pagamento_cartao_credito') registrarPagamentoCartaoCredito();
if ($funcao == 'carregar_modal_informacoes_pagamento') carregarModalInformacoesPagamento();

if ($funcao == 'salvar_comprovante_pagamento') salvarComprovantePagamento();

if ($funcao == 'carregarProdutoSelecionado') carregarProdutoSelecionado();


function carregarModalVincularContador() {
    try {
        $cContadores = new Criteria();
        $cContadores->add(ContadorPeer::SITUACAO, 0);
        $cContadores->addAscendingOrderByColumn(ContadorPeer::NOME);
        $contadoresObj = ContadorPeer::doSelect($cContadores);

        $contadores = array();
        $contadores[] = array('id'=>'', 'nome'=>'Escolha o Contador para vincular ao Certificado');
        foreach ($contadoresObj as $contador) {
            $contadores[] = array('id'=>$contador->getId(), 'nome'=>($contador->getNome())?utf8_encode($contador->getNome()):utf8_encode($contador->getRazaoSocial()));
        }

        $retorno = array('mensagem'=>'Ok','contadores'=>json_encode($contadores));

    echo json_encode($retorno);
    } catch (Exception $e) {
        echo var_dump($e);
    }

}

function limparProtocolo() {
    try {
        $usuarioLogado = ControleAcesso::getUsuarioLogado();
        $certificado = CertificadoPeer::retrieveByPK($_POST['certificadoId']);
        $protocolo = $certificado->getProtocolo();

        $certificado->setProtocolo(0);
        $certificado->save();

        $certSit = new CertificadoSituacao();
        $certSit->setCertificadoId($certificado->getId());
        $certSit->setUsuarioId($usuarioLogado->getId());
        $certSit->setComentario('Protocolo Apagado. Protocolo Anterior: '.$protocolo);
        $cSit = new Criteria();
        $cSit->add(SituacaoPeer::SIGLA, 'lim_prot');
        $certSit->setData(date('Y-m-d H:i:s'));
        $certSit->setSituacao(SituacaoPeer::doSelectOne($cSit));
        $certSit->save();
        echo "tudoOk";
    } catch (Exception $e) {
        echo 'Algo deu errado na hora de limpar o protocolo. Erro:'. $e->getMessage();
    }

}

function inserir_situacao($certificado_id,$comentarioSituacao,$usuario_id,$idSituacao){
	$certificadoSituacao = new CertificadoSituacao();
	$certificadoSituacao->setSituacaoId($idSituacao);
	$certificadoSituacao->setCertificadoId($certificado_id);
	$certificadoSituacao->setData(date('Y-m-d H:i:s'));
	$certificadoSituacao->setUsuarioId($usuario_id);
	$certificadoSituacao->setComentario($comentarioSituacao);
	$certificadoSituacao->save();
};
function inserir_observacao($certificado_id,$comentarioObservacao,$usuario_id){

	try{
		$idSituacao = 20;
		$comentarioSituacao = strtoupper(utf8_encode($comentarioObservacao));
        inserir_situacao($certificado_id,$comentarioSituacao,$usuario_id,$idSituacao);
        echo "0";
	}catch (Exception $e){
	    erroEmail($e->getMessage(), removeAcentos("Erro no javascritp de inserir a observação"));
		echo $e->getMessage();
	}
};
/*FUNCAO DE CARREGAR O PRODUTO*/
function produto($certificado_id){
	try{
		$certificado =  CertificadoPeer::retrieveByPk($certificado_id);

		$produtoId = $certificado->getProdutoId();
		$formapgto = $certificado->getFormaPagamentoId();

        $cProdutos =  new Criteria();
        $cProdutos->add(ProdutoPeer::SITUACAO,0);
        $cProdutos->addOr(ProdutoPeer::SITUACAO,10);
        $cProdutos->add(ProdutoPeer::PESSOA_TIPO, $certificado->getCliente()->getPessoaTipo());
        $cProdutos->addAscendingOrderByColumn(ProdutoPeer::NOME);
        $produtos = ProdutoPeer::doSelect($cProdutos);
        $produtosArr = array();
        foreach ($produtos as $produto)
            $produtosArr[] = array("id"=>$produto->getId(), "nome"=>removeAcentos($produto->getNome()));

		echo $certificado_id.";".$produtoId.";".$formapgto.";0;".json_encode($produtosArr);
	}catch(Exception $e){
	    erroEmail($e->getMessage(), "Erro na consulta de produtos");
		echo $e->getMessage();
	}
};
function trocarProdutoCertificado(){
    $usuarioLogado = ControleAcesso::getUsuarioLogado();
	try{
		$certificado =  CertificadoPeer::retrieveByPk($_POST['certificado_id']);

		$produtoAnterior = $certificado->getProduto();

		if( ($_POST['produto_id']!=$produtoAnterior->getId()) && ($_POST['produto_id'] != "") && ($_POST['produto_id'] != null) ){
		    $novoProduto = ProdutoPeer::retrieveByPK($_POST['produto_id']);
            $comentarioSituacao = 'Alterou produto do certificado '.$_POST['certificado_id'] . ' de ' . $certificado->getProduto()->getNome() . ' para:' . $novoProduto->getNome();
			$certificado->setProdutoId($_POST['produto_id']);
			$idSituacao = 15;
			inserir_situacao($_POST['certificado_id'],$comentarioSituacao,$usuarioLogado->getId(),$idSituacao);
		}
		$pagamentoAnterior = $certificado->getFormaPagamento();
		if($_POST['formaPagamentoId'] != $pagamentoAnterior->getId() && $_POST['formaPagamentoId'] != " " && $_POST['formaPagamentoId'] != null){
            $novaFormaPagamento = FormaPagamentoPeer::retrieveByPK($_POST['formaPagamentoId']);
            $comentarioSituacao = 'Alterou a forma de pagamento do certificado '.$_POST['certificado_id'] . " de " . $pagamentoAnterior->getNome() . " para:" . $novaFormaPagamento->getNome();
			$certificado->setFormaPagamentoId($_POST['formaPagamentoId']);
			$idSituacao = 16;
			inserir_situacao($_POST['certificado_id'],$comentarioSituacao,$usuarioLogado->getId(),$idSituacao);
		}
		$certificado->save();
	}catch(Exception $e){
	    erroEmail($e->getMessage(), 'Error na consulta da funcao dos certificados');
		echo $e->getMessage();
	}

    $resultado = "tudoOk;";
    echo $resultado;

};
function visualizarProcolo($certificado_id){

	try {
		//Consulta Certificado
		$certificado = CertificadoPeer::retrieveByPk($certificado_id);
		$idCertificado = $certificado->getId();
		$vendedor = $certificado->getUsuario()->getNome();
		$idCliente = $certificado->getClienteId();
		$retorno = $idCertificado.";";
		$retorno .= recupera_cliente($idCliente,'visualizaProtocolo');

		//Resumo

		$nomeProduto = removeEspeciais($certificado->getProduto()->getNome());
		$formapgto = removeEspeciais($certificado->getFormaPagamento()->getNome());
		$preco = $certificado->getProduto()->getPreco();
		$desconto = $certificado->getDesconto();
		$valor = $preco - $desconto;
		if ($formapgto == 'Boleto') {
			//Consulta Boleto
			$cBoleto = new Criteria();
			$cBoleto->add(BoletoPeer::CERTIFICADO_ID,$certificado_id);
			$dataPagamento = $certificado->getDataPagamento('d/m/Y');
			$dataConfirmacaoPagamento = $certificado->getDataConfirmacaoPagamento('d/m/Y');
			if (isset($dataConfirmacaoPagamento) && $dataConfirmacaoPagamento != NULL && $dataConfirmacaoPagamento != '0000-00-00 00:00:00') {
				$cBoleto->addDescendingOrderByColumn(BoletoPeer::ID,DATA_CONFIRMACAO_PAGAMENTO);
				$dataPagamento = $dataConfirmacaoPagamento;
			}elseif (isset($dataPagamento) && $dataPagamento != null && $dataPagamento != '0000-00-00' ) {
				$cBoleto->addDescendingOrderByColumn(BoletoPeer::ID,DATA_PAGAMENTO);
				$dataPagamento = $dataPagamento;
			}else{
				$cBoleto->addDescendingOrderByColumn(BoletoPeer::ID,DATA_VENCIMENTO);
				$dataPagamento = "--/--/----";
			}
			$boleto = BoletoPeer::doSelectOne($cBoleto);
			if(isset($boleto) && $boleto != null){
				$numeroBoleto = $boleto->getId();
			}else{
				$numeroBoleto = "-----";
			}
		}else{
			$numeroBoleto = "-----";
			$dataPagamento = $certificado->getDataPagamento('d/m/Y');

		}

		if($certificado->getProtocolo()){
			$protocolo = $certificado->getProtocolo();
		}else {
			$protocolo = "-----";
		}

		$local = removeEspeciais($certificado->getLocal()->getNome());

		$cAgendamento = new Criteria();
		$cAgendamento->add(AgendamentoPeer::CERTIFICADO_ID,$certificado_id);
		$cAgendamento->addDescendingOrderByColumn(AgendamentoPeer::ID,DATA_AGENDAMENTO);
		$agendamento = AgendamentoPeer::doSelectOne($cAgendamento);

		if ($agendamento) {
			$dtAgendamento = $agendamento->getDataAgendamento('d/m/Y');
		}else{
			$dtAgendamento = "----";
		}

		//Consulta  certificado_situacao
		$cCertificadoSituacao = new Criteria();
		$cCertificadoSituacao->add(CertificadoSituacaoPeer::CERTIFICADO_ID,$certificado_id);
        $cCertificadoSituacao->addAscendingOrderByColumn(CertificadoSituacaoPeer::ID);
		$certificadoSituacoes = CertificadoSituacaoPeer::doSelect($cCertificadoSituacao);
		$vResultadoSituacao = "";
		if (isset($certificadoSituacoes)) {
			foreach ($certificadoSituacoes as $certificadoSituacao) {
				$dataSituacao = $certificadoSituacao->getData('d/m/Y H:i:s');

				//Consulta situacao
				$situacao_id = $certificadoSituacao->getSituacaoId();
		 		$situacao = SituacaoPeer::retrieveByPk($situacao_id);
		 		$nomeSituacao = $situacao->getNome();
		 		$idUsuario= $certificadoSituacao->getUsuarioId();
		 		if (isset($idUsuario) && $idUsuario!='0' && $idUsuario!=null) {
		 			$usuarioSituacao = $certificadoSituacao->getUsuario()->getNome();
		 		}else{
		 			$usuarioSituacao = "  ";
		 		}

		 		$vResultadoSituacao .="<div class='text-danger'><small>(".$dataSituacao.") ".$nomeSituacao." - ".$usuarioSituacao."</small></div>";
			}
		}else{
			$vResultadoSituacao = "-----";
		}


		$retorno .= ";".removeEspeciais($vendedor).";".removeEspeciais($nomeProduto).";".removeEspeciais($formapgto).";".formataMoeda($valor).";".$numeroBoleto.";".$protocolo.";".$local.";".$dtAgendamento.";".$dataPagamento.";".$vResultadoSituacao.';0';

		echo $retorno;

	}catch(Exception $e){
	    erroEmail($e->getMessage(), 'Erro na funcao de visualizar prodotocolo nas funcoesCertificado.php');
		echo $e->getMessage();
	}
};
/*function gerarRecibo(){
	try{
	    header('location:'. $_SERVER['DOCUMENT_ROOT'].'/inc/gerarReciboPdf.php');
        exit;
	    require_once $_SERVER['DOCUMENT_ROOT'].'/inc/gerarReciboPdf.php';

		//Consulta Certificado
		$certificado =  CertificadoPeer::retrieveByPk($_POST['certificadoId']);
		//Consulta Cliente

		$cliente = ClientePeer::retrieveByPk($certificado->getClienteId());

		if ($cliente->getRazaoSocial()) {
			$nomeCliente = $cliente->getRazaoSocial();
		}else{
			$nomeCliente = $cliente->getNomeFantasia();
		}

		$telefone = "";
		if ($cliente->getFone1()) {
			$telefone = $cliente->getFone1()." /";
		}elseif ($cliente->getFone2()) {
			$telefone = $telefone." ".$cliente->getFone2()." /";
		}elseif ($cliente->getCelular()) {
			$telefone = $telefone." ".$cliente->getCelular();
		}


		$dataPagamento = $certificado->getDataConfirmacaoPagamento('d/m/Y') ? $certificado->getDataConfirmacaoPagamento('d/m/Y') : $certificado->getDataPagamento('d/m/Y');

		//Endereco
		$endereco = $cliente->getEndereco().", ".$cliente->getNumero().", ".$cliente->getBairro() . ', '.$cliente->getCidade() . ' / ' . $cliente->getUf();

		$rodapeNome = "SERAMA - COMERCIO E CERTIFICACAO DIGITAL LTDA";
		$rodapeCnpj = "CNPJ: 07.467.912/0001-17";
		$rodapeEndereco = "RUA. BERNAL DO COUTO 610 A - UMARIZAL CEP: 66.055-080";
		$rodapeCidadeUf = "BELEM - PA";
		$rodapeFone = "Fone: (91) 3321-5050";
		$rodapeEmail = $certificado->getUsuario()->getEmail();
        $informacoesEmpresa = $rodapeNome." - ".$rodapeCnpj."<br/>".$rodapeEndereco." - ".$rodapeCidadeUf."<br/>".$rodapeFone." - ".$rodapeEmail;

        $a = json_encode(array(
            'id'=>$certificado->getId(),'cliente'=>utf8_encode($certificado->getCliente()->getId().' - '.$nomeCliente),
            'formaPagamento'=>utf8_encode( $certificado->getFormaPagamento()->getNome()),'documento'=>$cliente->getCpfCnpj(),
            'consultor'=>utf8_encode($certificado->getUsuario()->getNome()),'contato'=>$telefone,
            'dataCompra'=>$certificado->getDataCompra('d/m/Y'),'email'=>$cliente->getEmail(),
            'valor'=>formataMoeda($certificado->getProduto()->getPreco() - $certificado->getDesconto()),
            'dataPagamento'=>$dataPagamento,
            'endereco'=>$endereco,'cep'=>$cliente->getCep(),'produto'=>utf8_encode($certificado->getProduto()->getNome()),
            'informacoesEmpresa'=>$informacoesEmpresa
        ));


        $htmlRecibo = '';
        require $_SERVER['DOCUMENT_ROOT'].'/inc/MPDF54/mpdf.php';
        require $_SERVER['DOCUMENT_ROOT'].'/inc/layoutReciboPdf.php';

        $mpdf=new mPDF('c');
        $mpdf->mirrorMargins = true;
        $mpdf->SetDisplayMode('real','single');
        $mpdf->WriteHTML($htmlRecibo);



        $fileName = "Recibo_PDF.pdf";

        $mpdf->Output("inc/recibos/".$fileName,"F");

        header('Content-Type: application/cpf');
        header('Content-Disposition: attachment; filename='.$fileName);
        header('Pragma: no-cache');
        readfile("inc/recibos/Recibo_PDF.pdf");

    }catch(Exception $e){
		echo $e->getMessage();
	}
};*/
function apagarCertificado(){
	try{
	    $usuarioLogado = ControleAcesso::getUsuarioLogado();
		$certificado =  CertificadoPeer::retrieveByPk($_POST['certificado_id']);

		$certificado->setApagado('1');
		$certificado->save();

        $contasReceeber = $certificado->getContasRecebers();
        $contaReceber = $contasReceeber[0];
        $contaReceber->setSituacao('-1');
        $contaReceber->save();


		//Gerando Ação
		$idSituacao = 13;
		$comentarioSituacao = utf8_decode($_POST['motivoExclusao']);
		inserir_situacao($certificado->getId(),$comentarioSituacao,$usuarioLogado->getId(),$idSituacao);
        echo json_encode(array('mensagem'=>'Ok'));
	}catch (Exception $e){
	    erroEmail($e->getMessage(), "Erro na funcao de apagar o certificado");
		echo $e->getMessage();
	}
};
function inserirDescontoCertificado($certificado_id,$motivoDesconto,$valor){
	try{

	    $usuarioLogado = ControleAcesso::getUsuarioLogado();
		$certificado = CertificadoPeer::retrieveByPk($certificado_id);
		$preco = $certificado->getProduto()->getPreco();
        /*SE O PERFIL FOR IGUAL A DIRETORIA OU FINANCEIRO PERMITE DAR DESCONTOS ACIMA DE 10% CASO CONTRÁRIO NAO*/
        if (($valor <= $preco*0.15) || ($usuarioLogado->getPerfilId()==4) || ($usuarioLogado->getPerfilId()==11)){
            $certificado->setDesconto($valor);
            $certificado->setMotivoDesconto($motivoDesconto);

            if ($_POST['voucher']) {
                $certificado->setProtocolo($_POST['protocolo']);
                $certificado->setVoucher($_POST['voucher']);
                $motivoDesconto .= ' Voucher: '. $certificado->getVoucher();
            }

            $certificado->save();

            //Gerando Ação
            $idSituacao = 19;
            $comentarioSituacao = 'Desconto concedido por '.utf8_decode($usuarioLogado->getNome()).' no valor de '.formataMoeda($valor) . '. Motivo: '.$motivoDesconto;
            inserir_situacao($certificado_id,$comentarioSituacao,$usuarioLogado->getId(),$idSituacao);
            echo "0";
        }else{
            echo '1';
        }

	}catch (Exception $e){
		var_dump($e->getMessage());
	}
};
function revogarCertificado ($certificado_id, $retornaJs=true){
	try{
		//duplica o cadastro com as mesmas informações (Certificado)
		//Transfere pagamento e confirmação de pagamento do certificado anterior pro novo registro
        $usuarioLogado = ControleAcesso::getUsuarioLogado();
		$certificadoRevogado =  CertificadoPeer::retrieveByPk($certificado_id);

		$idCliente = $certificadoRevogado->getClienteId();
		$cliente = ClientePeer::retrieveByPk($idCliente);


		$certificadoNovo = new Certificado();
		$certificadoNovo->setDataCompra(date('Y-m-d H:i:s'));
		$certificadoNovo->setDataPagamento(date('Y-m-d H:i:s'));
		$certificadoNovo->setDataConfirmacaoPagamento(date('Y-m-d H:i:s'));
		$certificadoNovo->setUsuarioId($certificadoRevogado->getUsuarioId());
		$certificadoNovo->setClienteId($certificadoRevogado->getClienteId());
		$certificadoNovo->setProdutoId($certificadoRevogado->getProdutoId());
        $certificadoNovo->setDesconto($certificadoRevogado->getProduto()->getPreco());
        /*FORMA DE PAGAMENTO SEM CUSTO*/
		$certificadoNovo->setFormaPagamentoId(8);
		$certificadoNovo->setCodigoDocumento($certificadoRevogado->getCodigoDocumento());
		$certificadoNovo->setLocalId($certificadoRevogado->getLocalId());
		$certificadoNovo->setObservacao($certificadoRevogado->getObservacao());
		$certificadoNovo->setApagado(0);

		$certificadoNovo->setContadorId($certificadoRevogado->getcontadorId());
		$certificadoNovo->setDataUltimaValidacao($certificadoRevogado->getDataValidacao());
		$certificadoNovo->setCertificadoRenovado($certificadoRevogado->getCertificadoRenovado());
        /*SITUACAO DE CERTIFICADOS REVOGADOS*/
        $certificadoNovo->setApagado(0);
		$certificadoNovo->save();

		/* SALVO SITAUÇÃO NO CADASTRO A ER REVOGADO */
        $idSituacao = 25;
        $comentarioSituacao = $_POST['motivo'];
        inserir_situacao($certificado_id,$comentarioSituacao,$usuarioLogado->getId(),$idSituacao);

		$idSituacao = 26;
		$comentarioSituacao = "Foi gerado um novo certificado, referente à revogaçao deste. O Código do novo certificado é: ".$certificadoNovo->getId();
		inserir_situacao($certificado_id,$comentarioSituacao,$usuarioLogado->getId(),$idSituacao);

	    /* SITUAÇÕES DO NOVO CADASTRO */
		$idSituacao = 26;
		$comentarioSituacao = "Certificado gerado através de uma revogação. Certificado Revogado: ".$certificadoRevogado->getId();
		$novoCertificado_id = $certificadoNovo->getId();
		inserir_situacao($novoCertificado_id,$comentarioSituacao,$usuarioLogado->getId(),$idSituacao);

        /* FIM DAS SITUAÇÃO DO NOVO CADASTRO */

        $certificadoRevogado->setConfirmacaoValidacao(4);
		$certificadoRevogado->save();

        if ($retornaJs)
		    echo '0';
	}catch (Exception $e){
		echo $e->getMessage();
	}
};
function editar_certificado($certificado_id){
	try{
		//Consulta Certificado
		$certificado =  CertificadoPeer::retrieveByPk($certificado_id);
		//Consulta Cliente
		$idCliente = $certificado->getClienteId();
		$cliente = ClientePeer::retrieveByPk($idCliente);

		$nome = $cliente->getRazaoSocial();
		if (isset($nome) && $nome != null && $nome != "") {
			$nome = $cliente->getRazaoSocial();
		}else{
			$nome = $cliente->getNomeFantasia();
		}
		$email = $cliente->getEmail();

		$fone = $cliente->getFone1();
		$fone2 = $cliente->getFone2();
		$celular = $cliente->getCelular();
		$telefone = "";
		if (isset($fone) && $fone != "" && $fone != null) {
			$telefone = $fone." /";
		}
		if (isset($fone2) && $fone2 != "" && $fone2 != null) {
			$telefone = $telefone." ".$fone2." /";
		}
		if (isset($celular) && $celular != " " && $celular != null) {
			$telefone = $telefone." ".$celular;
		}

		//Endereco
		$enderecoBruto = $cliente->getEndereco();
		$bairro = $cliente->getBairro();
		$numero = $cliente->getNumero();
		$endereco = $enderecoBruto.", ".$numero;

		$clocais = new Criteria();
		$clocais->add(LocalPeer::SITUACAO, 0);
		$locais = LocalPeer::doSelect($clocais);
		$local = $certificado->getLocalId();


		$produtoId = $certificado->getProdutoId();
		$formapgto = $certificado->getFormaPagamentoId();

		$cnpj = $cliente->getCpfCnpj();
		$vendedor = $certificado->getUsuarioId();

		//Preço
		$preco = $certificado->getProduto()->getPreco();
		$desconto = $certificado->getDesconto();
		$valor = formataMoeda($preco)." - ".formataMoeda($desconto)." = ".formataMoeda($preco-$desconto);

		$retorno = $certificado_id.';'.$nome.';'.$email.';'.$telefone.';'.$endereco.';'.$bairro.';'.$local.';'.$produtoId.';'.$valor.';'.$formapgto.';'.$vendedor;

		echo removeEspeciais($retorno);
	}catch(Exception $e){
		echo $e->getMessage();
	}
};
function recupera_cliente($clienteId,$funcao){

    try {
        $cliente = ClientePeer::retrieveByPk($clienteId);

        $clienteTipo = $cliente->getPessoaTipo();

        if ($clienteTipo == "J") {
            $cnpj = $cliente->getCpfCnpj();
            if ($cliente->getRazaoSocial()) {
                $razaoSocial = utf8_encode($cliente->getRazaoSocial());
            } else {
                $razaoSocial = "";
            }

            if ($cliente->getNomeFantasia()) {
                $nomeFantasia = utf8_encode($cliente->getNomeFantasia());
            } else {
                $nomeFantasia = "";
            }

            if ($cliente->getCep()) {
                $cepEmpresa = $cliente->getCep();
            } else {
                $cepEmpresa = "";
            }

            if ($cliente->getEndereco()) {
                $enderecoEmpresa = utf8_encode($cliente->getEndereco());
            } else {
                $enderecoEmpresa = "";
            }

            if ($cliente->getBairro()) {
                $bairroEmpresa = utf8_encode($cliente->getBairro());
            } else {
                $bairroEmpresa = "";
            }

            if ($cliente->getNumero()) {
                $numeroEmpresa = $cliente->getNumero();
            } else {
                $numeroEmpresa = "";
            }

            if ($cliente->getComplemento()) {
                $complementoEmpresa = utf8_encode($cliente->getComplemento());
            } else {
                $complementoEmpresa = "";
            }

            if ($cliente->getUf()) {
                $ufEmpresa = $cliente->getUf();
            } else {
                $ufEmpresa = "";
            }

            if ($cliente->getCidade()) {
                $cidadeEmpresa = utf8_encode($cliente->getCidade());
            } else {
                $cidadeEmpresa = "";
            }

            if ($cliente->getFone1()) {
                $fone1Empresa = $cliente->getFone1();
            } else {
                $fone1Empresa = "";
            }

            if ($cliente->getFone2()) {
                $fone2Empresa = $cliente->getFone2();
            } else {
                $fone2Empresa = "";
            }

            if ($cliente->getCelular()) {
                $celularEmpresa = $cliente->getCelular();
            } else {
                $celularEmpresa = "";
            }
            $telefoneEmpresa = "";
            if ($funcao == 'visualizaProtocolo') {
                if (isset($foneResponsavel) && $foneResponsavel != " " && $foneResponsavel != null) {
                    $telefoneResponsavel = $foneResponsavel;
                }
                if (isset($fone2Responsavel) && $fone2Responsavel != " " && $fone2Responsavel != null) {
                    $telefoneResponsavel = $telefoneResponsavel . "  " . $fone2Responsavel;
                }
                if (isset($celularResponsavel) && $celularResponsavel != " / " && $celularResponsavel != null) {
                    $telefoneResponsavel = $telefoneResponsavel . " / " . $celularResponsavel;
                }
                $enderecoEmpresa = $enderecoEmpresa . ", " . $numeroEmpresa . ", " . $bairroEmpresa . " - " . $cepEmpresa;
            }

            if ($cliente->getEmail()) {
                $emailEmpresa = utf8_encode($cliente->getEmail());
            } else {
                $emailEmpresa = "";
            }

            $cResponsavel = new Criteria();
            $cResponsavel->add(ResponsavelPeer::ID, $cliente->getResponsavelId());
            $responsavel = ResponsavelPeer::doSelectOne($cResponsavel);
            $idResponsavel = $responsavel->getId();
            if ($idResponsavel != '0' && $idResponsavel != null) {
                $nomeResponsavel = utf8_encode($responsavel->getNome());
                $cpf = $responsavel->getCpf();
                $nascimentoResponsavel = $responsavel->getNascimento('Y-m-d');
                $complementoResponsavel = utf8_encode($responsavel->getComplemento());
                $cidadeResponsavel = utf8_encode($responsavel->getCidade());
                $estadoResponsavel = utf8_encode($responsavel->getUf());
                $foneResponsavel = $responsavel->getFone1();
                $fone2Responsavel = $responsavel->getFone2();
                $celularResponsavel = $responsavel->getCelular();
                $telefoneResponsavel = "";

                $enderecoBrutoResponsavel = utf8_encode($responsavel->getEndereco());
                $bairroResponsavel = utf8_encode($responsavel->getBairro());
                $numeroResponsavel = $responsavel->getNumero();
                $cepResponsavel = $responsavel->getCep();
                if ($funcao == 'visualizaProtocolo') {
                    if (isset($foneResponsavel) && $foneResponsavel != " " && $foneResponsavel != null) {
                        $telefoneResponsavel = $foneResponsavel;
                    }
                    if (isset($fone2Responsavel) && $fone2Responsavel != " " && $fone2Responsavel != null) {
                        $telefoneResponsavel = $telefoneResponsavel . "  " . $fone2Responsavel;
                    }
                    if (isset($celularResponsavel) && $celularResponsavel != " / " && $celularResponsavel != null) {
                        $telefoneResponsavel = $telefoneResponsavel . " / " . $celularResponsavel;
                    }
                    $enderecoResponsavel = $enderecoBrutoResponsavel . ", " . $numeroResponsavel . ", " . $bairroResponsavel . " - " . $cepResponsavel;
                } else {
                    $enderecoResponsavel = $responsavel->getEndereco();
                }

                if ($responsavel->getEmail()) {
                    $emailResponsavel = $responsavel->getEmail();
                }else{
                    $emailResponsavel = "";
                }
            }
        } else {
            $nomeResponsavel = utf8_encode($cliente->getNomeFantasia());
            $nascimentoResponsavel = $cliente->getNascimento('Y-m-d');
            $cpf = $cliente->getCpfCnpj();
            $foneResponsavel = $cliente->getFone1();
            $fone2Responsavel = $cliente->getFone2();
            $celularResponsavel = $cliente->getCelular();
            $telefoneResponsavel = "";
            $enderecoBrutoResponsavel = utf8_encode($cliente->getEndereco());
            $complementoResponsavel = utf8_encode($cliente->getComplemento());
            $cidadeResponsavel = utf8_encode($cliente->getCidade());
            $estadoResponsavel = $cliente->getUf();
            $bairroResponsavel = utf8_encode($cliente->getBairro());
            $numeroResponsavel = $cliente->getNumero();
            $cepResponsavel = $cliente->getCep();

            if ($funcao == 'visualizaProtocolo') {
                if (isset($foneResponsavel) && $foneResponsavel != " " && $foneResponsavel != null) {
                    $telefoneResponsavel = $foneResponsavel;
                }
                if (isset($fone2Responsavel) && $fone2Responsavel != " " && $fone2Responsavel != null) {
                    $telefoneResponsavel = $telefoneResponsavel . "  " . $fone2Responsavel;
                }
                if (isset($celularResponsavel) && $celularResponsavel != " / " && $celularResponsavel != null) {
                    $telefoneResponsavel = $telefoneResponsavel . " / " . $celularResponsavel;
                }
                $enderecoResponsavel = $enderecoBrutoResponsavel . ", " . $numeroResponsavel . ", " . $bairroResponsavel . " - " . $cepResponsavel;
            } else {
                $enderecoResponsavel = $cliente->getEndereco();
            }

            if($cliente->getEmail()) {
                $emailResponsavel = $cliente->getEmail();
            }else{
                $emailResponsavel = "";
            }
        }

        $retorno = $clienteId . ';' . $razaoSocial . ';' . $nomeFantasia . ";" . $clienteTipo . ";" . $cnpj . ";" . $cepEmpresa . ";" . $enderecoEmpresa . ";" . $bairroEmpresa . ";" . $numeroEmpresa . ';';
        $retorno .= $ufEmpresa . ";" . $complementoEmpresa . ";" . $cidadeEmpresa . ";" . $fone1Empresa . ";" . $fone2Empresa . ";" . $celularEmpresa . ";" . $emailEmpresa . ";";
        $retorno .= $nomeResponsavel . ";" . $cpf . ";" . $nascimentoResponsavel . ';' . $foneResponsavel . ';' . $fone2Responsavel . ';' . $celularResponsavel . ';' . $telefoneResponsavel . ';';
        $retorno .= $enderecoResponsavel . ';' . $bairroResponsavel . ';' . $numeroResponsavel . ';' . $cepResponsavel . ';' . $complementoResponsavel . ';' . $estadoResponsavel . ';' . $cidadeResponsavel . ';' . $emailResponsavel;

        return $retorno;
    }catch (Exception $e){
        erroEmail($e->getMessage(),"Erro na funcao de certificados em recuperar cliente");
        echo $e->getMessage();
    }
};
function editar_cliente($certificado_id){

	try {
		//Cabeçalho do modal detalhar Certificado
		$certificado =  CertificadoPeer::retrieveByPk($certificado_id);
		$idCliente = $certificado->getClienteId();
		$retorno = recupera_cliente($idCliente,'editar');
        //var_dump($retorno);
		echo $retorno.';0';
	}catch(Exception $e){
	    erroEmail($e->getMessage(),"Erro na funcao de certificados no editar cliente");
		echo $e->getMessage();

	}
};
function alterar_cliente($certificado_id){
	try{
		$certificado =  CertificadoPeer::retrieveByPk($certificado_id);
		//Consulta Cliente
		$idCliente = $certificado->getClienteId();
		$cliente = ClientePeer::retrieveByPk($idCliente);


		//Dados javaScript
		$pessoaTipo = $_REQUEST['tipo_cliente'];
		$razaoSocial = utf8_decode($_REQUEST['razao']);
		$nomeFantasia = utf8_decode($_REQUEST['nome_fantasia']);
		$cnpj = $_REQUEST['cnpj'];
		$cepEmpresa = $_REQUEST['cep_empresa'];
		$enderecoEmpresa = utf8_decode($_REQUEST['endereco_empresa']);
		$bairroEmpresa = utf8_decode($_REQUEST['bairro_empresa']);
		$numEmpresa = $_REQUEST['num_empresa'];
		$ufEmpresa = $_REQUEST['uf_empresa'];
		$complementoEmpresa = utf8_decode($_REQUEST['complemento_empresa']);
		$cidadeEmpresa = utf8_decode($_REQUEST['cidade_empresa']);
		$fone1Empresa = $_REQUEST['fone1_empresa'];
		$fone2Empresa = $_REQUEST['fone2_empresa'];
		$celEmpresa = $_REQUEST['celular_empresa'];
		$emailEmpresa = $_REQUEST['email_empresa'];
		$cpfResponsavel = $_REQUEST['cpf_responsavel'];
		$nascimentoResponsavel = $_REQUEST['nascimento_responsavel'];
		$nomeResponsavel = utf8_decode($_REQUEST['nome_responsavel']);
		$cepResponsavel = $_REQUEST['cep_responsavel'];
		$enderecoResponsavel = utf8_decode($_REQUEST['endereco_responsavel']);
		$numResponsavel = $_REQUEST['numero_responsavel'];
		$ufResponsavel = $_REQUEST['uf_responsavel'];
		$compResponsavel = utf8_decode($_REQUEST['completamento_responsavel']);
		$bairroResponsavel = utf8_decode($_REQUEST['bairro_responsavel']);
		$cidadeResponsavel = utf8_decode($_REQUEST['cidade_responsavel']);
		$fone1Responsavel = $_REQUEST['fone1_responsavel'];
		$fone2Responsavel = $_REQUEST['fone2_responsavel'];
		$celResponsavel = $_REQUEST['celular_responsavel'];
		$emailResponsavel = $_REQUEST['email_responsavel'];

		$resultado = "";
		//Alteração do cliente
		if ($pessoaTipo == "J"){
			$resultado .= "J-";
			$razaoSocialAnterior = $cliente->getRazaoSocial();
			if($razaoSocial != $razaoSocialAnterior && $razaoSocial != " " && $razaoSocial != null){
				$cliente->setRazaoSocial($razaoSocial);
				$resultado .= "Razao-";
			}
			$nomeFantasiaAnterior = $cliente->getNomeFantasia();
			if($nomeFantasia != $nomeFantasiaAnterior && $nomeFantasia != " " && $nomeFantasia != null){
				$cliente->setNomeFantasia($nomeFantasia);
				$resultado .= "NomeFantasia-";
			}
			$cnpjAnterior = $cliente->getCpfCnpj();
			if($cnpj != $cnpjAnterior && $cnpj != " " && $cnpj != null){
				$cliente->setCpfCnpj($cnpj);
				$resultado .= "CNPJ-";
			}
			$cepEmpresaAnterior = $cliente->getCep();
			if($cepEmpresa != $cepEmpresaAnterior && $cepEmpresa != " " && $cepEmpresa != null){
				$cliente->setCep($cepEmpresa);
				$resultado .= "Cep-";
			}
			$enderecoEmpresaAnterior = $cliente->getEndereco();
			if($enderecoEmpresa != $enderecoEmpresaAnterior && $enderecoEmpresa != " " && $enderecoEmpresa != null){
				$cliente->setEndereco($enderecoEmpresa);
				$resultado .= "End-";
			}
			$bairroEmpresaAnterior = $cliente->getBairro();
			if($bairroEmpresa != $bairroEmpresaAnterior && $bairroEmpresa != " " && $bairroEmpresa != null){
				$cliente->setBairro($bairroEmpresa);
				$resultado .= "bairro-";
			}
			$numEmpresaAnterior = $cliente->getNumero();
			if($numEmpresa != $numEmpresaAnterior && $numEmpresa != " " && $numEmpresa != null){
				$cliente->setNumero($numEmpresa);
				$resultado .= "numeroE-";
			}
			$ufEmpresaAnterior = $cliente->getUf();
			if($ufEmpresa != $ufEmpresaAnterior && $ufEmpresa != " " && $ufEmpresa != null){
				$cliente->setUf($ufEmpresa);
				$resultado .= "UFEmpresa-";
			}
			$complementoEmpresaAnterior = $cliente->getComplemento();
			if($complementoEmpresa != $complementoEmpresaAnterior && $complementoEmpresa != " " && $complementoEmpresa != null){
				$cliente->setComplemento($complementoEmpresa);
				$resultado .= "ComplemenE-";
			}
			$cidadeEmpresaAnterior = $cliente->getCidade();
			if($cidadeEmpresa != $cidadeEmpresaAnterior && $cidadeEmpresa != " " && $cidadeEmpresa != null){
				$cliente->setCidade($cidadeEmpresa);
				$resultado .= "cidade-";
			}
			$fone1EmpresaAnterior = $cliente->getFone1();
			if($fone1Empresa != $fone1EmpresaAnterior && $fone1Empresa != " " && $fone1Empresa != null){
				$cliente->setFone1($fone1Empresa);
				$resultado .= "fone1";
			}
			$fone2EmpresaAnterior = $cliente->getFone2();
			if($fone2Empresa != $fone2EmpresaAnterior && $fone2Empresa != " " && $fone2Empresa != null){
				$cliente->setFone2($fone2Empresa);
				$resultado .= "fone2-";
			}
			$celEmpresaAnterior = $cliente->getCelular();
			if($celEmpresa != $celEmpresaAnterior && $celEmpresa != " " && $celEmpresa != null){
				$cliente->setCelular($celEmpresa);
				$resultado .= "celular-";

			}
			$emailEmpresaAnterior = $cliente->getEmail();
			if($emailEmpresa != $emailEmpresaAnterior && $emailEmpresa != " " && $emailEmpresa != null){
				$cliente->setEmail($emailEmpresa);
				$resultado .= "email-";
			}

			//consulta Responsavel
			$idResponsavel = $cliente->getResponsavelId();
			$responsavel = ResponsavelPeer::retrieveByPk($idResponsavel);

			$resultado .= "RESPONSAVEL: /n";
			//Alteração do Responsável

			$cpfResponsavelAnterior = $responsavel->getCpf();
			if($cpfResponsavel != $cpfResponsavelAnterior && $cpfResponsavel != " " && $cpfResponsavel != null){
				$responsavel->setCpf($cpfResponsavel);
				$resultado .= "cpf-";
			}
			$nascimentoResponsavelAnterior = $responsavel->getNascimento();
			if($nascimentoResponsavel != $nascimentoResponsavelAnterior && $nascimentoResponsavel != " " && $nascimentoResponsavel != null){
				$responsavel->setNascimento($nascimentoResponsavel);
				$resultado .= "nascimento-";
			}
			$nomeResponsavelAnterior = $responsavel->getNome();
			if($nomeResponsavel != $nomeResponsavelAnterior && $nomeResponsavel != " " && $nomeResponsavel != null){
				$responsavel->setNome($nomeResponsavel);
				$resultado .= "Nome-";
			}
			$cepResponsavelAnterior = $responsavel->getCep();
			if($cepResponsavel != $cepResponsavelAnterior && $cepResponsavel != " " && $cepResponsavel != null){
				$responsavel->setCep($cepResponsavel);
				$resultado .= "Cep-";
			}
			$enderecoResponsavelAnterior = $responsavel->getEndereco();
			if($enderecoResponsavel != $enderecoResponsavelAnterior && $enderecoResponsavel != " " && $enderecoResponsavel != null){
				$responsavel->setEndereco($enderecoResponsavel);
				$resultado .= "endereco-";
			}
			$numResponsavelAnterior = $responsavel->getNumero();
			if($numResponsavel != $numResponsavelAnterior && $numResponsavel != " " && $numResponsavel != null){
				$responsavel->setNumero($numResponsavel);
				$resultado .= "numero- ".$numResponsavel;
			}
			$ufResponsavelAnterior = $responsavel->getUf();
			if($ufResponsavel != $ufResponsavelAnterior && $ufResponsavel != " " && $ufResponsavel != null){
				$responsavel->setUf($ufResponsavel);
			}
			$compResponsavelAnterior = $responsavel->getComplemento();
			if($compResponsavel != $compResponsavelAnterior && $compResponsavel != " " && $compResponsavel != null){
				$responsavel->setComplemento($compResponsavel);
			}
			$bairroResponsavelAnterior = $responsavel->getBairro();
			if($bairroResponsavel != $bairroResponsavelAnterior && $bairroResponsavel != " " && $bairroResponsavel != null){
				$responsavel->setBairro($bairroResponsavel);
			}
			$cidadeResponsavelAnterior = $responsavel->getCidade();
			if($cidadeResponsavel != $cidadeResponsavelAnterior && $cidadeResponsavel != " " && $cidadeResponsavel != null){
				$responsavel->setCidade($cidadeResponsavel);
			}
			$fone1ResponsavelAnterior = $responsavel->getFone1();
			if($fone1Responsavel != $fone1ResponsavelAnterior && $fone1Responsavel != " " && $fone1Responsavel != null){
				$responsavel->setFone1($fone1Responsavel);
			}
			$fone2ResponsavelAnterior = $responsavel->getFone2();
			if($fone2Responsavel != $fone2ResponsavelAnterior && $fone2Responsavel != " " && $fone2Responsavel != null){
				$responsavel->setFone2($fone2Responsavel);
			}
			$celResponsavelAnterior = $responsavel->getCelular();
			if($celResponsavel != $celResponsavelAnterior && $celResponsavel != " " && $celResponsavel != null){
				$responsavel->setCelular($celResponsavel);
			}
			$emailResponsavelAnterior = $responsavel->getEmail();
			if($emailResponsavel != $emailResponsavelAnterior && $emailResponsavel != " " && $emailResponsavel != null){
				$responsavel->setEmail($emailResponsavel);
			}
			$responsavel->save();
		}else{
			$cpfResponsavelAnterior = $cliente->getCpfCnpj();
			if($cpfResponsavel != $cpfResponsavelAnterior && $cpfResponsavel != " " && $cpfResponsavel != null){
				$cliente->setCpfCnpj($cpfResponsavel);
			}
			$nascimentoResponsavelAnterior = $cliente->getNascimento();
			if($nascimentoResponsavel != $nascimentoResponsavelAnterior && $nascimentoResponsavel != " " && $nascimentoResponsavel != null){
				$cliente->setNascimento($nascimentoResponsavel);
				$resultado .= "nascimento-";
			}
			$nomeResponsavelAnterior = $cliente->getNomeFantasia();
			if($nomeResponsavel != $nomeResponsavelAnterior && $nomeResponsavel != " " && $nomeResponsavel != null){
				$cliente->setNomeFantasia($nomeResponsavel);
			}
			$cepResponsavelAnterior = $cliente->getCep();
			if($cepResponsavel != $cepResponsavelAnterior && $cepResponsavel != " " && $cepResponsavel != null){
				$cliente->setCep($cepResponsavel);
			}
			$enderecoResponsavelAnterior = $cliente->getEndereco();
			if($enderecoResponsavel != $enderecoResponsavelAnterior && $enderecoResponsavel != " " && $enderecoResponsavel != null){
				$cliente->setEndereco($enderecoResponsavel);
			}
			$numResponsavelAnterior = $cliente->getNumero();
			if($numResponsavel != $numResponsavelAnterior && $numResponsavel != " " && $numResponsavel != null){
				$cliente->setNumero($numResponsavel);
			}
			$ufResponsavelAnterior = $cliente->getUf();
			if($ufResponsavel != $ufResponsavelAnterior && $ufResponsavel != " " && $ufResponsavel != null){
				$cliente->setUf($ufResponsavel);
			}
			$compResponsavelAnterior = $cliente->getComplemento();
			if($compResponsavel != $compResponsavelAnterior && $compResponsavel != " " && $compResponsavel != null){
				$cliente->setComplemento($compResponsavel);
			}
			$bairroResponsavelAnterior = $cliente->getBairro();
			if($bairroResponsavel != $bairroResponsavelAnterior && $bairroResponsavel != " " && $bairroResponsavel != null){
				$cliente->setBairro($bairroResponsavel);
			}
			$cidadeResponsavelAnterior = $cliente->getCidade();
			if($cidadeResponsavel != $cidadeResponsavelAnterior && $cidadeResponsavel != " " && $cidadeResponsavel != null){
				$cliente->setCidade($cidadeResponsavel);
			}
			$fone1ResponsavelAnterior = $cliente->getFone1();
			if($fone1Responsavel != $fone1ResponsavelAnterior && $fone1Responsavel != " " && $fone1Responsavel != null){
				$cliente->setFone1($fone1Responsavel);
			}
			$fone2ResponsavelAnterior = $cliente->getFone2();
			if($fone2Responsavel != $fone2ResponsavelAnterior && $fone2Responsavel != " " && $fone2Responsavel != null){
				$cliente->setFone2($fone2Responsavel);
			}
			$celResponsavelAnterior = $cliente->getCelular();
			if($celResponsavel != $celResponsavelAnterior && $celResponsavel != " " && $celResponsavel != null){
				$cliente->setCelular($celResponsavel);
			}
			$emailResponsavelAnterior = $cliente->getEmail();
			if($emailResponsavel != $emailResponsavelAnterior && $emailResponsavel != " " && $emailResponsavel != null){
				$cliente->setEmail($emailResponsavel);
			}
		}
		$cliente->save();

		echo $resultado.';0';
	}catch(Exception $e){
	    erroEmail($e->getMessage(),'Erro na funcoes de certificado em alterar cliente');
		echo $e->getMessage();
	}
};
function informarPagamentoExtornoCertificado(){
    try {
        $usuario = ControleAcesso::getUsuarioLogado();
        $certificado = CertificadoPeer::retrieveByPK($_POST['certificado_id']);

        if ($_POST['acao'] == 'pagar') {
            $mensagemSucesso = 'Informe de pagamento do certificado realizado com sucesso!';
            $certificado->setDataPagamento(date('Y-m-d H:i:s'));

            $certSit = new CertificadoSituacao();
            $certSit->setCertificadoId($certificado->getId());
            $certSit->setUsuarioId($usuario->getId());
            $certSit->setComentario($usuario->getNome().' informou pagamento do certificado '.$certificado->getId().' no sistema');
            $certSit->setSituacaoId(9);
            $certSit->setData(date("Y-m-d H:i:s"));
        }
        else {
            $mensagemSucesso = 'Extorno de pagamento do certificado realizado com sucesso!';
            $certificado->setDataPagamento(null);

            $certSit = new CertificadoSituacao();
            $certSit->setCertificadoId($certificado->getId());
            $certSit->setUsuarioId($usuario->getId());
            $certSit->setComentario($usuario->getNome().' extornou pagamento do certificado '.$certificado->getId().' no sistema');
            $certSit->setSituacaoId(10);
            $certSit->setData(date("Y-m-d H:i:s"));
        }

        if ($_POST['boleto_id']) {
            $boleto = BoletoPeer::retrieveByPK($_POST['boleto_id']);
            if ($_POST['acao'] == 'pagar') {
                $boleto->setDataPagamento(date('Y-m-d'));
                $mensagemSucesso = 'Informe de pagamento do Boleto realizado com sucesso!';
            }
            else {
                $boleto->setDataPagamento(null);
                $mensagemSucesso = 'Extorno de pagamento do Boleto realizado com sucesso!';
            }

            $boleto->save();

        }

        $certSit->save();
        $certificado->save();
        echo json_encode(array('mensagem'=>'Sucesso', 'mensagemSucesso'=>$mensagemSucesso));
    }catch (Exception $e){
        erroEmail($e->getMessage(),"Erro na funcao de salvar a informacao de pagamento");
        echo $e->getMessage();
    }

};
function carregar_desconto($certificado_id){
    try {
        //Cabeçalho do modal detalhar Certificado
        $certificado =  CertificadoPeer::retrieveByPk($certificado_id);
        $precoFormatado = formataMoeda($certificado->getProduto()->getPreco()) . ' - '. formataMoeda($certificado->getDesconto()) . ' = ' .  formataMoeda($certificado->getProduto()->getPreco()-$certificado->getDesconto());
		$precoOriginal = $certificado->getProduto()->getPreco();
        $produto = $certificado->getProduto()->getNome();
        $retorno = $certificado_id.';'.$precoFormatado.';'.utf8_encode($produto) . ';'.$precoOriginal;
        echo $retorno.';0';
    }catch(Exception $e){
        erroEmail($e->getMessage(),"Erro na funcao de carregar modal de desconto");
        echo $e->getMessage();

    }
};
function carrega_modal_boleto($certificado_id){
    try{

        $certificado = CertificadoPeer::retrieveByPK($certificado_id);
        $clienteId = $certificado->getClienteId();
        $cliente = ClientePeer::retrieveByPk($clienteId);
        if ($cliente->getRazaoSocial())
            $nome = $cliente->getRazaoSocial();
        elseif ($cliente->getNomeFantasia())
            $nome = $cliente->getNomeFantasia();
        elseif ($cliente->getResponsavel())
            $nome = $cliente->getResponsavel()->getNome();
        $retorno_nome = $clienteId.' - '.$nome;
        $nomeVendedor = $certificado->getUsuario()->getNome();
        $nomeProduto = $certificado->getProduto()->getNome();
        $precoProduto = $certificado->getProduto()->getPreco();
        $desconto = $certificado->getDesconto();
        $precoCertificado = $precoProduto - $desconto;
        $precoCompleto = formataMoeda($precoProduto).' - '.formataMoeda($desconto).' = '.formataMoeda($precoCertificado);
        $endereco = $cliente->getEndereco();
        $cidade = $cliente->getCidade();
        $uf = $cliente->getUf();
        $retorno_endereco = $endereco.', '.$cidade.' - '.$uf;
        $email = $cliente->getEmail();
        $vencimento = date('d/m/Y', mktime(0,0,0,date('m'),date('d')+2,date('Y')));

        $retorno = $certificado_id.';'.removeEspeciais($retorno_nome).';'.removeEspeciais($nomeVendedor).';';
        $retorno.= removeEspeciais($nomeProduto).';'.$precoCompleto.';'.removeEspeciais($retorno_endereco);
        $retorno.= ';'.$email.';'.$vencimento.';0;';
        echo $retorno;
    }catch(Exception $e){
    	var_dump($e->getMessage());
    }
};
function salvarBoletoSafeToPay(){
    $resultadoBoleto = "";
    try{
        $usuarioLogado = ControleAcesso::getUsuarioLogado();
        $vencimento = $_POST['vencimento'];
        $vencimento = explode('/',$vencimento);

        $certificado = CertificadoPeer::retrieveByPK($_POST['certificado_id']);
        $produto = $certificado->getProduto();
        $cliente = $certificado->getCliente();

        /*MONTAGEM DO BOLETO DO PAGARME*/
        $valor_boleto = ( ($certificado->getProduto()->getPreco()) - ($certificado->getDesconto() ) );

        if ($cliente->getRazaoSocial())
            $nome = $cliente->getRazaoSocial();
        elseif ($cliente->getNomeFantasia())
            $nome = $cliente->getNomeFantasia();
        elseif ($cliente->getResponsavel())
            $nome = $cliente->getResponsavel()->getNome();

        $cpfCnpj = $cliente->getCpfCnpj();

        $res = $cliente->getResponsavel();
        if (!is_null($res))
            $emailRes = $res->getEmail();

        if ($cliente->getEmail() != '')
            $email = $cliente->getEmail();
        elseif ($emailRes != '')
            $email = $emailRes;
        else
            $email = $cliente->getEmailContato();
        if (is_null($email))
            $emailEnvio = $email;
        else
            $emailEnvio = $email;

        $dia= $vencimento[0];
        $mes= $vencimento[1];
        $ano= $vencimento[2];
        $email=$emailEnvio;

        //GerarBoletoPagarMe
        if ($cliente->getEndereco())
            $endereco = utf8_encode($cliente->getEndereco());
        else
            $endereco = '---';

        if ($cliente->getEndereco())
            $endereco = removeEspeciais( utf8_encode($cliente->getEndereco()));


        $boleto_url = $_POST['urlBoleto']; // URL do boleto bancário
        $boleto_barcode = $_POST['codigoBarras']; // código de barras do boleto bancário
        $transacaoId = $_POST['tid'];

        /*FIM DA MONTAGEM DO BOLETO DO PAGARME*/


        $itensPedido = $certificado->getItemPedidos();
        if ($itensPedido) {
            $itemPedido = $itensPedido[0];
            $pedido = $itemPedido->getPedido();
            $contasReceber = $pedido->getContasRecebers();
            $contaReceber = $contasReceber[0];
            /*ATUALIZA O VENCIMENTO DA CONTA A RECEBER*/
            $contaReceber->setVencimento($vencimento[2].'/'.$vencimento[1].'/'.$vencimento[0]);
            $contaReceber->save();
        }

        $boleto = new Boleto();
        $boleto->setCertificadoId($certificado->getId());
        $boleto->setVencimento($vencimento[2].'/'.$vencimento[1].'/'.$vencimento[0]);
        $boleto->setDataProcessamento(date("Y-m-d"));
        $boleto->setClienteId($cliente->getId());
        $boleto->setValor($valor_boleto);
        $boleto->setDescricao($certificado->getProduto()->getNome());
        $boleto->setContasReceberId($contaReceber->getId());

        /*SALVANDO A URL DO BOLETO*/
        $boleto->setUrlBoleto($boleto_url);
        $boleto->setTid($transacaoId);
        $boleto->save();

        if ($pedido)
            $boleto->setPedidoId($pedido->getId());

        $boleto->save();



        $certSit = new CertificadoSituacao();
        $certSit->setCertificadoId($certificado->getId());
        $cSit = new Criteria();
        $cSit->add(SituacaoPeer::SIGLA, 'ger_bolt');
        $certSit->setSituacao(SituacaoPeer::doSelectOne($cSit));

        $certSit->setComentario($usuarioLogado->getNome()." gerou o boleto para o vencimento". $boleto->getVencimento('d/m/Y'));
        $certSit->setData(date("Y-m-d H:i:s"));
        $certSit->setUsuarioId($usuarioLogado->getId());
        $certSit->save();

        enviarEmailBoleto($nome,$emailEnvio, $boleto_barcode,$boleto_url, $produto->getNome(), $valor_boleto);

        echo json_encode(array('mensagem'=>'Ok'));
    }catch(Exception $e){
        echo json_encode(array('mensagem'=>'Erro', 'mensagemErro'=>$e->getMessage()));
    }

};

function gerarBoletoCertificado($certificado_id){
    $resultadoBoleto = "";
    try{
        $usuarioLogado = ControleAcesso::getUsuarioLogado();
        $vencimento = $_POST['vencimento'];
		$vencimento = explode('/',$vencimento);

        $certificado = CertificadoPeer::retrieveByPK($certificado_id);
        $produto = $certificado->getProduto();
        $cliente = $certificado->getCliente();

        /*MONTAGEM DO BOLETO DO PAGARME*/
        $valor_boleto = ( ($certificado->getProduto()->getPreco()) - ($certificado->getDesconto() ) );

        if ($cliente->getRazaoSocial())
            $nome = $cliente->getRazaoSocial();
        elseif ($cliente->getNomeFantasia())
            $nome = $cliente->getNomeFantasia();
        elseif ($cliente->getResponsavel())
            $nome = $cliente->getResponsavel()->getNome();

        $cpfCnpj = $cliente->getCpfCnpj();

        $res = $cliente->getResponsavel();
        if (!is_null($res))
            $emailRes = $res->getEmail();

        if ($cliente->getEmail() != '')
            $email = $cliente->getEmail();
        elseif ($emailRes != '')
            $email = $emailRes;
        else
            $email = $cliente->getEmailContato();
        if (is_null($email))
            $emailEnvio = $email;
        else
            $emailEnvio = $email;

        $dia= $vencimento[0];
        $mes= $vencimento[1];
        $ano= $vencimento[2];
        $email=$emailEnvio;

        //GerarBoletoPagarMe
        if ($cliente->getEndereco())
            $endereco = utf8_encode($cliente->getEndereco());
        else
            $endereco = '---';

        if ($cliente->getEndereco())
            $endereco = removeEspeciais( utf8_encode($cliente->getEndereco()));


//        Pagarme::setApiKey("ak_live_snGWlbkg0GxidcKPpKfWyUojRPoaBC");
        //  Pagarme::setApiKey("ak_test_sY6UfR8wCl8AmgWb7ra5MGoOLm54Ny");

        $customer = new PagarMe_Customer(array(
            "document_number" => removeTracoPontoBarra($cpfCnpj),
            "name" => strtoupper(trim(removeEspeciais($nome))),
            "email" => strtolower(trim(removeEspeciais($email))),
            "address" => array(
                "street" => strtoupper(trim(removeEspeciais($endereco))),
                "complementary" => strtoupper(trim(removeEspeciais(''))),
                "street_number" => strtoupper(trim(removeEspeciais($cliente->getNumero()))),
                "neighborhood" => strtoupper(trim(removeEspeciais($cliente->getBairro()))),
                "city" => strtoupper(trim(removeEspeciais($cliente->getCidade()))),
                "state" => $cliente->getUf(),
                "zipcode" => removeTracoPontoBarra($cliente->getCep()),
                "country" => "Brasil"
            ),
        ));
        $transaction = new PagarMe_Transaction(array(
            "customer" => $customer,
            'amount' => removeTracoPontoBarra($valor_boleto.'.00'),
            'postback_url' => "http://www.dashboard.serama.com.br/retorno_transacao.php",
            "boleto_expiration_date"=>$ano.'-'.$mes.'-'.$dia.'T21:54:56.000Z',
            'payment_method' => "boleto"
        ));

        $transaction->charge();
        $boleto_url = $transaction->boleto_url; // URL do boleto bancário
        $boleto_barcode = $transaction->boleto_barcode; // código de barras do boleto bancário
        $transacaoId = $transaction->id;

        /*FIM DA MONTAGEM DO BOLETO DO PAGARME*/


        $itensPedido = $certificado->getItemPedidos();
        if ($itensPedido) {
            $itemPedido = $itensPedido[0];
            $pedido = $itemPedido->getPedido();
            $contasReceber = $pedido->getContasRecebers();
            $contaReceber = $contasReceber[0];
            /*ATUALIZA O VENCIMENTO DA CONTA A RECEBER*/
            $contaReceber->setVencimento($vencimento[2].'/'.$vencimento[1].'/'.$vencimento[0]);
            $contaReceber->save();
        }

        $boleto = new Boleto();
        $boleto->setCertificadoId($certificado->getId());
        $boleto->setVencimento($vencimento[2].'/'.$vencimento[1].'/'.$vencimento[0]);
        $boleto->setDataProcessamento(date("Y-m-d"));
        $boleto->setClienteId($cliente->getId());
        $boleto->setValor($valor_boleto);
        $boleto->setDescricao($certificado->getProduto()->getNome());
        $boleto->setContasReceberId($contaReceber->getId());

        /*SALVANDO A URL DO BOLETO*/
        $boleto->setUrlBoleto($boleto_url);
        $boleto->setTid($transacaoId);
        $boleto->save();

        if ($pedido)
            $boleto->setPedidoId($pedido->getId());

        $boleto->save();



        $certSit = new CertificadoSituacao();
        $certSit->setCertificadoId($certificado->getId());
        $cSit = new Criteria();
        $cSit->add(SituacaoPeer::SIGLA, 'ger_bolt');
        $certSit->setSituacao(SituacaoPeer::doSelectOne($cSit));

        $certSit->setComentario($usuarioLogado->getNome()." gerou o boleto para o vencimento". $boleto->getVencimento('d/m/Y'));
        $certSit->setData(date("Y-m-d H:i:s"));
        $certSit->setUsuarioId($usuarioLogado->getId());
        $certSit->save();

        enviarEmailBoleto($nome,$emailEnvio, $boleto_barcode,$boleto_url, $produto->getNome(), $valor_boleto);

        echo json_encode(array('mensagem'=>'Ok'));
    }catch(Exception $e){
        echo json_encode(array('mensagem'=>'Erro', 'mensagemErro'=>$e->getMessage()));
    }

};
function gerarProtocolo(){
    try{
        $certificado_id = $_POST['certificado_id'];
        $usuario = ControleAcesso::getUsuarioLogado();
        $usuario_id = $usuario->getId();
        $certificado = CertificadoPeer::retrieveByPK($certificado_id);
		if(($certificado->getProtocolo()== null)|| $certificado->getProtocolo()=='0'){
            $ws = new WSCertificado();
            if ($certificado->getCliente()->getPessoaTipo() == 'F') { //SE FOR PESSOA F?SICA
                //CONSULTA PREVIA CPF
                if($certificado->getCliente()->getFone1()){
                    $foneCliente = $certificado->getCliente()->getFone1();
                    $foneCliente = explode(" ",$foneCliente);
                }elseif($foneCliente = $certificado->getCliente()->getCelular()){
                    $foneCliente = $certificado->getCliente()->getCelular();
                    $foneCliente = explode(" ",$foneCliente);
                }
//var_dump('entrou aqui', removeTracoPontoBarra($certificado->getCliente()->getCpfCnpj()), $certificado->getCliente()->getNascimento('d/m/Y') );
                /*contigencia*/
                ob_start();                      // start capturing output

                if ($certificado->getCliente()->getNascimento())
                    $nascimentoCliente = $certificado->getCliente()->getNascimento('d/m/Y');
                else $nascimentoCliente = '03/03/1984';

                $cpf = $ws->consultarCPF(removeTracoPontoBarra($certificado->getCliente()->getCpfCnpj()), $nascimentoCliente );

                $mensagemErro = ob_get_contents();    // get the contents from the buffer
                ob_end_clean();
                //$mensagemErro = '';

                if (!$mensagemErro) { //SE N?O TROUXE NENHUMA MENSAGEM DE ERRO FA?A

                    $nomeCliente = $cpf['Nome'];
                    $cpfCliente = $cpf['CPF'];
                    $nascimentoCliente = $cpf['DataNascimento'];
                    $contadorCd = $certificado->getContador();
                    $cpfContador = '';
                    if ($contadorCd)
                        if ($contadorCd->getCpf())
                            $cpfContador = removeTracoPontoBarra( $contadorCd->getCpf());

                    //var_dump($cpf);
                    /*EMISSAO EM CONTINGENCIA RFB FORA DO AR*/
                    /*$nomeCliente = $certificado->getCliente()->getNomeFantasia();
                    $cpfCliente = $certificado->getCliente()->getCpfCnpj();
                    $nascimentoCliente = $certificado->getCliente()->getNascimento('d/m/Y');*/

                    $solicitacao = $ws->solicitarCertificadoPF(
                        $certificado->getProduto()->getCodigo(),
                        $certificado->getProduto()->getPreco() - $certificado->getDesconto(),
                        $nomeCliente,
                        $cpfCliente,
                        $nascimentoCliente,
                        // 	contato
                        array(
                            'DDD' => $foneCliente[0],
                            'Telefone' => removeTracoPontoBarra($foneCliente[1]),
                            'Email' => removeEspeciais($certificado->getCliente()->getEmail())
                        ),
                        // 	endereco
                        array(
                            'Logradouro' => removeEspeciais($certificado->getCliente()->getEndereco()),
                            'Numero' => removeEspeciais($certificado->getCliente()->getNumero()),
                            'Complemento' => removeEspeciais($certificado->getCliente()->getComplemento()),
                            'Bairro' => removeEspeciais($certificado->getCliente()->getBairro()),
                            'Cidade' => removeEspeciais($certificado->getCliente()->getCidade()),
                            'UF' => removeEspeciais($certificado->getCliente()->getUf()),
                            'CEP' => removeEspeciais($certificado->getCliente()->getCep()),
                        ),
                        // 	documento
                        array(),
                        array(),
                        $cpfContador
                    );
                    $certificado->setProtocolo($solicitacao);
                    $certificado->save();

                    $certSit = new CertificadoSituacao();
                    $certSit->setCertificadoId($certificado->getId());
                    $cSit = new Criteria();
                    if ($usuario_id != 0)
                        $certSit->setUsuarioId($usuario_id);
                    $cSit->add(SituacaoPeer::SIGLA, 'ger_prot');
                    $certSit->setSituacao(SituacaoPeer::doSelectOne($cSit));
                    $certSit->setComentario('Gerou Protocolo pelo sistema');
                    $certSit->setData(date("Y-m-d H:i:s"));
                    $certSit->save();

                    //js_aviso($solicitacao);
                    echo $solicitacao.';0';
                }else{
                    js_aviso("Erro na consulta previa de CPF");
                }
            } //Se o Cliente for Pessoa Juridica! (Sem problemas)
            else { //SE FOR PESSOA JUR?DICA
                //CONSULTA PREVIA POR CNPJ
                $produtoCodigo = $certificado->getProduto()->getCodigo();
                $email = $certificado->getCliente()->getEmail();
                $enderecoEmpresa= $certificado->getCliente()->getEndereco();
                $numeroEmpresa = $certificado->getCliente()->getNumero();
                $complementoEmpresa = $certificado->getCliente()->getComplemento();
                $bairroEmpresa = $certificado->getCliente()->getBairro();
                $cidadeEmpresa = $certificado->getCliente()->getCidade();
                $ufEmpresa = $certificado->getCliente()->getUf();
                $cepEmpresa = $certificado->getCliente()->getCep();
                // DADOS DO CLIENTE
                if($certificado->getCliente()->getResponsavel()->getFone1()){
                    $foneCliente = $certificado->getCliente()->getResponsavel()->getFone1();
                    $foneCliente = explode(" ",$foneCliente);
                }elseif($foneCliente = $certificado->getCliente()->getResponsavel()->getCelular()){
                    $foneCliente = $certificado->getCliente()->getResponsavel()->getCelular();
                    $foneCliente = explode(" ",$foneCliente);
                }

                $cpfResponsavelEmpresa = $certificado->getCliente()->getResponsavel()->getCpf();
                $emailResponsavelEmpresa = $certificado->getCliente()->getResponsavel()->getEmail();
                $enderecoResponsavelEmpresa = $certificado->getCliente()->getResponsavel()->getEndereco();
                $numeroResponsavelEmpresa = $certificado->getCliente()->getResponsavel()->getNumero();
                $complementoResponsavelEmpresa = $certificado->getCliente()->getResponsavel()->getComplemento();
                $bairroResponsavelEmpresa = $certificado->getCliente()->getResponsavel()->getBairro();
                $cidadeResponsavelEmpresa = $certificado->getCliente()->getResponsavel()->getCidade();
                $ufResponsavelEmpresa = $certificado->getCliente()->getResponsavel()->getUf();
                $cepResponsavelEmpresa = $certificado->getCliente()->getResponsavel()->getCep();
                $dataNascimentoResponsavelEmpresa = $certificado->getCliente()->getResponsavel()->getNascimento('d/m/Y');
                $cnpjEmpresa = $certificado->getCliente()->getCpfCnpj();

                //try {

                /*Contingencia*/
                ob_start();                      // start capturing output
                $cnpj = $ws->consultarCNPJ(removeTracoPontoBarra($cpfResponsavelEmpresa), $dataNascimentoResponsavelEmpresa, removeTracoPontoBarra($cnpjEmpresa));
                //Definição da variavel $cnpj
                $mensagemErro = ob_get_contents();    // get the contents from the buffer {Mensagem de Erro}
                ob_end_clean();

                //$mensagemErro = '';
                if (!$mensagemErro) { //SE N?O TROUXE NENHUMA MENSAGEM DE ERRO FA?A

                    $razaoSocial = $cnpj['RazaoSocial'];
                    $cnpjPj = $cnpj['CNPJ'];
                    $nomeCliente = $cnpj['Nome'];
                    $cpfCliente = $cpfResponsavelEmpresa;
                    $nascimentoCliente = $cnpj['DataNascimento'];
                    $contadorCd = $certificado->getContador();
                    $cpfContador = '';
                    if ($contadorCd)
                    	if ($contadorCd->getCpf())
                    		$cpfContador = removeTracoPontoBarra($contadorCd->getCpf());

                    /*EMISSAO EM CONTINGENCIA RFB FORA DO AR*/
                    /*$razaoSocial = $certificado->getCliente()->getRazaoSocial();
                    $cnpj = $certificado->getCliente()->getCpfCnpj();
                    $nomeCliente = $certificado->getCliente()->getRazaoSocial();
                    $cpfCliente = $certificado->getCliente()->getResponsavel()->getCpf();
                    $nascimentoCliente = $certificado->getCliente()->getResponsavel()->getNascimento('d/m/Y');
                    */
                    //solicitar protocolo para pj

                    $solicitacao = $ws->solicitarCertificadoPJ(
                        $produtoCodigo,
                        $certificado->getProduto()->getPreco() - $certificado->getDesconto(),
                        removeEspeciais($razaoSocial),
                        removeTracoPontoBarra($cnpjPj),
                        // 	contato empresa
                        array(
                            'DDD' => $foneCliente[0],
                            'Telefone' => removeTracoPontoBarra($foneCliente[1]),
                            'Email' => removeEspeciais($email)
                        ),
                        // 	endere?o empresa
                        array(
                            'Logradouro' => removeEspeciais($enderecoEmpresa),
                            'Numero' => removeEspeciais($numeroEmpresa),
                            'Complemento' => removeEspeciais($numeroEmpresa),
                            'Bairro' => removeEspeciais($bairroEmpresa),
                            'Cidade' => removeEspeciais($cidadeEmpresa),
                            'UF' => removeEspeciais($ufEmpresa),
                            'CEP' => removeEspeciais($cepEmpresa),
                        ),
                        // 	titular dados
                        array(
                            'Nome' 			=> $nomeCliente,
                            'Cpf' 			=> removeTracoPontoBarra($cpfCliente),
                            'DataNascimento' => $nascimentoCliente,
                        ),
                        // 	titular contato
                        array(
                            'DDD' => $foneCliente[0],
                            'Telefone' => removeTracoPontoBarra($foneCliente[1]),
                            'Email' => removeEspeciais($emailResponsavelEmpresa)
                        ),
                        // 	titular endere?o
                        array(
                            'Logradouro' => removeEspeciais($enderecoResponsavelEmpresa),
                            'Numero' => removeEspeciais($numeroResponsavelEmpresa),
                            'Complemento' => removeEspeciais($complementoResponsavelEmpresa),
                            'Bairro' => removeEspeciais($bairroResponsavelEmpresa),
                            'Cidade' => removeEspeciais($cidadeResponsavelEmpresa),
                            'UF' => removeEspeciais($ufResponsavelEmpresa),
                            'CEP' => removeEspeciais($cepResponsavelEmpresa),
                        ),
                        array(),
                        array(),
						$cpfContador
                    ); //Criação do Array

                    $certificado->setProtocolo($solicitacao);
                    $certificado->save();

                    $certSit = new CertificadoSituacao();
                    $certSit->setCertificadoId($certificado->getId());
                    if ($usuario_id!=0)
                        $certSit->setUsuarioId($usuario_id);
                    $certSit->setSituacaoId(12);
                    $certSit->setComentario('Gerou Protocolo pelo sistema'); //Passar Campo pelo JavasScript
                    $certSit->setData(date("Y-m-d H:i:s",mtime()));
                    $certSit->save();

                    //js_aviso($solicitacao);
                    echo $solicitacao.';0;'.$certificado->getContadorId();
                }else{
                    js_aviso("Erro na consulta do CNPJ");
                } // Protocolo sem Erro!
            }
		}else{
			echo "Protocolo ja gerado, número do protocolo: ".$certificado->getProtocolo();
		}
    }catch (Exception $e){
        //erroEmail($e->getMessage(),"Erro na funcao de gerar protocolos");
        echo $e->getMessage();
    }
};
function detalharCertificado(){
    try {
        $usuarioLogado = ControleAcesso::getUsuarioLogado();
        //Cabeçalho do modal detalhar Certificado
        $certificado =  CertificadoPeer::retrieveByPk($_POST['certificado_id']);

        $nomeCliente = $certificado->getCliente()->getRazaoSocial();
        if ($nomeCliente == "" || $nomeCliente == null){
            $nomeCliente = $certificado->getCliente()->getNomeFantasia();
        }

        $cliente = $certificado->getCliente();
        if ($cliente->getResponsavel())
            $email = $cliente->getResponsavel()->getEmail();
        elseif ($cliente->getEmail())
            $email = $cliente->getEmail();
        else
            $email = $cliente->getEmailContato();

        if($certificado->getContadorId() > 0){
            if($certificado->getContador()->getRazaoSocial()){
                $contador = $certificado->getContador()->getRazaoSocial();
            }elseif($certificado->getContador()->getNomeFantasia()){
                $contador = $certificado->getContador()->getNomeFantasia();
            }elseif($certificado->getContador()->getNome()){
                $contador = $certificado->getContador()->getNome();
            }else{
                $contador ="";
            }
        }else{
            $contador ="Sem Contador";
        }

        if($certificado->getProtocolo()){
            $protocolo = $certificado->getProtocolo();
        }else {
            $protocolo = "-";
        }
        $idCertificado = $certificado->getID();
        $idCliente = $certificado->getClienteId();
        $nomeProduto = utf8_encode($certificado->getProduto()->getNome());
        $preco = $certificado->getProduto()->getPreco();
        $desconto = $certificado->getDesconto();
        $valor = $preco - $desconto;

        if ($certificado->getDataConfirmacaoPagamento())
            $dataPagamento = $certificado->getDataConfirmacaoPagamento('d/m/Y');
        elseif ($certificado->getDataPagamento())
            $dataPagamento = $certificado->getDataPagamento('d/m/Y');
        else
            $dataPagamento = '-';

        $certificadoRevogado = 'nao';
        if ($certificado->getDataValidacao()){

            $dataValidacaoCertificado = "Data de Validacao: ". $certificado->getDataValidacao('d/m/Y');

            if ($certificado->getConfirmacaoValidacao() == 1)
                $dataValidacaoCertificado .=  ' <i class="fa fa-flag" aria-hidden="true" style="color:#096;" title="validado em '.$certificado->getDataValidacao('d/m/Y').' Agr: '.(($certificado->getUsuarioValidouId())?utf8_encode($certificado->getUsuarioRelatedByUsuarioValidouId()->getNome()):'---').'"></i>';
            elseif ($certificado->getConfirmacaoValidacao() == 2)
                $dataValidacaoCertificado .=  ' <i class="fa fa-flag" aria-hidden="true" style="color:#fff847" title="validado em '.$certificado->getDataValidacao('d/m/Y').' Agr: '.(($certificado->getUsuarioValidouId())?utf8_encode($certificado->getUsuarioRelatedByUsuarioValidouId()->getNome()):'---'). '(pendente)"></i>';
            elseif ($certificado->getConfirmacaoValidacao() == 3)
                $dataValidacaoCertificado .= ' <i class="fa fa-flag" aria-hidden="true" style="color:#fff847" title="validado em '.$certificado->getDataValidacao('d/m/Y').' Agr: '.(($certificado->getUsuarioValidouId())?utf8_encode($certificado->getUsuarioRelatedByUsuarioValidouId()->getNome()):'---').' (renovado)"></i>';
            elseif ($certificado->getConfirmacaoValidacao() == 4) {
                $certificadoRevogado = 'sim';
                $dataValidacaoCertificado .=  ' <i class="fa fa-flag" aria-hidden="true" style="color:#ac2925" title="revogado em '.$certificado->getDataValidacao('d/m/Y').' Agr: '.(($certificado->getUsuarioValidouId())?utf8_encode($certificado->getUsuarioRelatedByUsuarioValidouId()->getNome()):'---').' (revogado)"></i>';
            }

        }else{
            $dataValidacaoCertificado = '-';
        }


        if ($certificado->getFormaPagamento())
        	$formaPagamento = utf8_encode($certificado->getFormaPagamento()->getNome());

        if ($certificado->getDataInicioValidade() && $certificado->getDataFimValidade()) {
            $validade = 'V&aacute;lido de '. $certificado->getDataInicioValidade('d/m/Y') . ' at&eacute; ' . $certificado->getDataFimValidade('d/m/Y');
        }
        else
            $validade = '-';

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


            /*
             * HAKING CODE: CHANGE THE VALUES FOR DIFFERENT USERS
             * */
            if ($usuarioLogado->getId() == 890) {
                if ($telefone)
                $telefone = substr();
            }

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
        }

        foreach ($certificado->getCliente()->getClienteContatos() as $contatoCliente)
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

        $colunasContatos = array(
            array('nome'=>'Tipo'), array('nome'=>'Telefone'), array('nome'=>'Celular'), array('nome'=>'E-mail')
        );



        $dadosCertificado = array(
            'id'=>$idCertificado, 'clienteId'=>$idCliente, 'nomeContador'=>utf8_encode($contador), 'nomeCliente'=>utf8_encode($nomeCliente), 'protocolo'=>$protocolo,
            'nomeProduto'=>$certificado->getProduto()->getId() .' - ' .  utf8_encode($nomeProduto), 'precoProduto'=>formataMoeda($preco), 'desconto'=>formataMoeda($desconto), 'valorTotal'=>formataMoeda($valor),
            'dataValidacaoCertificado'=>utf8_encode($dataValidacaoCertificado), 'dataCompra'=>$certificado->getDataCompra('d/m/Y'),'formaPagamento'=>$formaPagamento,
            'formaPagamentoId'=>$certificado->getFormaPagamentoId(),'revogado'=>$certificadoRevogado, 'dataPagamento'=>$dataPagamento,
            'consultor'=>utf8_encode($certificado->getUsuario()->getId() . ' - '. $certificado->getUsuario()->getNome()), 'email'=>$email, 'valorTotalSemFormatacao'=>$valor,
            'agr'=>($certificado->getUsuarioValidouId())?utf8_encode($certificado->getUsuarioValidouId() .' - ' . $certificado->getUsuarioRelatedByUsuarioValidouId()->getNome()):'---',
            'validade'=>$validade, 'contatosCliente'=>json_encode($contatosCliente), 'colunasContatos'=>json_encode($colunasContatos),
            'documento'=>removeTracoPontoBarra($cliente->getCpfCnpj()), 'logradouro'=>$cliente->getEndereco(), 'numero'=>$cliente->getNumero(),
			'bairro'=>$cliente->getBairro(),'complemento'=>$cliente->getComplemento(),'cep'=>removeTracoPontoBarra($cliente->getCep()), 'cidade'=>$cliente->getCidade()  ,'uf'=>$cliente->getUf(),
            'precoProdutoSemFormatacao'=>$preco, 'codigoProdutoSafeweb'=>$certificado->getProduto()->getProdutoId()
        );


        /*
         * SERIALIZEI AS INFORMAÇÕES DO RECIBO PARA USAR NA HORA DO RECIBO
         * */
        $telefone = "";
        if ($cliente->getFone1()) {
            $telefone = $cliente->getFone1()." /";
        }elseif ($cliente->getFone2()) {
            $telefone = $telefone." ".$cliente->getFone2()." /";
        }elseif ($cliente->getCelular()) {
            $telefone = $telefone." ".$cliente->getCelular();
        }

        $endereco = $cliente->getEndereco().", ".$cliente->getNumero().", ".$cliente->getBairro() . ', '.$cliente->getCidade() . ' / ' . $cliente->getUf();

        $rodapeNome = "SAFEWEB - SEGURANÇA DA INFORMACAO";
        $rodapeCnpj = "CNPJ: 23.917.962/0001-05";
        $rodapeEndereco = "RUA. BERNAL DO COUTO 356 - UMARIZAL CEP: 66.055-080";
        $rodapeCidadeUf = "BELEM - PA";
        $rodapeFone = "Fone: (91) 3230-1034";
        $rodapeEmail = $certificado->getUsuario()->getEmail();
        $informacoesEmpresa = $rodapeNome. ' - '. $rodapeCnpj . $rodapeEndereco." - ".$rodapeCidadeUf . $rodapeFone." - ".$rodapeEmail;

        $informacoesRecibo = array(
            'id'=>$certificado->getId(),'cliente'=>utf8_encode($certificado->getCliente()->getId().' - '.$nomeCliente),
            'formaPagamento'=>utf8_encode( $certificado->getFormaPagamento()->getNome()),'documento'=>$cliente->getCpfCnpj(),
            'consultor'=>utf8_encode($certificado->getUsuario()->getNome()),'contato'=>$telefone,
            'dataCompra'=>$certificado->getDataCompra('d/m/Y'),'email'=>$cliente->getEmail(),
            'valor'=>formataMoeda($certificado->getProduto()->getPreco() - $certificado->getDesconto()),
            'dataPagamento'=>$dataPagamento,
            'endereco'=>$endereco,'cep'=>$cliente->getCep(),'produto'=>utf8_encode($certificado->getProduto()->getNome()),
            'informacoesEmpresa'=>utf8_encode($informacoesEmpresa)
        );

        $_SESSION['informacoesRecibo'] = serialize($informacoesRecibo);

        /*
         * MONTANDO INFORMACOES DE PAGAMENTOS
         * */

        /*
         * SE A FORMA DE PAGAMENTO FOR BOLETO, LISTA TODOS OS BOLETOS EMITIDOS
         * */
        if($certificado->getFormaPagamentoId() ==1){
            $cBoleto = new Criteria();
            $cBoleto->add(BoletoPeer::CERTIFICADO_ID, $_POST['certificado_id']);
            $cBoleto->addDescendingOrderByColumn(BoletoPeer::VENCIMENTO);
            $boletosObj = $certificado->getBoletos($cBoleto);

            $boletos = array();
            foreach ($boletosObj as $key=>$boleto) {
                if($boleto->getDataConfirmacaoPagamento()){
                    $dataConfirmacaoPagamento =$boleto->getDataConfirmacaoPagamento('d/m/Y');
                    $situacaoPamento="<i class='fa fa-check text-success'></i>";
                    $btnPagarExtornar = 'Pagamento confirmado pelo financeiro';

                }elseif ($boleto->getDataPagamento()) {
                    $dataConfirmacaoPagamento =$boleto->getDataPagamento('d/m/Y');
                    $situacaoPamento="<i class='fa fa-circle text-success'></i>";
                    $btnPagarExtornar = '<input type="checkbox" id="chkPagarExtornarBoleto'.$boleto->getId().'" checked="checked" data-onstyle="danger" data-offstyle="success">
                <script>
                $(function() {
                    $("#chkPagarExtornarBoleto'.$boleto->getId().'").bootstrapToggle({
                        on: "Extornar",
                        off: "Informar Pagto."
                    });
                    
                    $("#chkPagarExtornarBoleto'.$boleto->getId().'").change(function() {                        
                            informarPagamentoCertificado(\'extornar\', '.$boleto->getId().');
                    });
                });
                </script>';

                }
                else{
                    $dataConfirmacaoPagamento ='---';
                    $situacaoPamento="<i class='fa fa-circle' style='color: red'></i>";
                    $btnPagarExtornar = '<input type="checkbox" id="chkPagarExtornarBoleto'.$boleto->getId().'" data-onstyle="danger" data-offstyle="success">
                <script>
                $(function() {
                    $("#chkPagarExtornarBoleto'.$boleto->getId().'").bootstrapToggle({
                        on: "Extornar",
                        off: "Informar Pagto."
                    });
                    
                    $("#chkPagarExtornarBoleto'.$boleto->getId().'").change(function() {
                        if ($(this).prop("checked"))
                            informarPagamentoCertificado(\'pagar\', '.$boleto->getId().');
                    });
                });
                </script>';

                }

                $boletos[] =  array('Id'=>$boleto->getId(),'Tid'=>$boleto->getTid(), utf8_encode('Situação')=> $situacaoPamento,
                    'Venc.'=>$boleto->getVencimento('d/m/Y'),'Dt.Pagt.'=> $dataConfirmacaoPagamento, 'Valor'=>formataMoeda($boleto->getValor()),
                    'Forma'=> utf8_encode($certificado->getFormaPagamento()->getNome()) . ' <a href="'.$boleto->getUrlBoleto().'" target="_blank" title="Visualizar Boleto"><i class="fa fa-barcode" aria-hidden="true"></i></a>',
                    utf8_encode('Ação')=>$btnPagarExtornar
                );
            }

            $colunas = array(
                array('nome'=>'Id'),array('nome'=>'Tid'), array('nome'=>utf8_encode('Situação')), array('nome'=>'Dt.Pagt.'),array('nome'=>'Venc.'),
                array('nome'=>'Valor'),
                array('nome'=>'Forma'), array('nome'=>utf8_encode('Ação'))
            );
            $dadosPagamento = array('mensagem'=>'Ok','colunasPagamento'=>json_encode($colunas),'pagamento'=>json_encode($boletos), 'comprovantePagamento'=>'');

        }
        /*
         * PARA DEMAIS FORMAS DE PAGAMENTO, PREPARA A TABELA COM O BOTAO DE INFORMAR INFORMACOES DO PAGAMENTO
         * */
        else {
            /*
             * BUSCA TODOS OS COMPROVANTES DE PAGAMENTO
             * */
            $cComprovantePagamento = new Criteria();
            $cComprovantePagamento->addDescendingOrderByColumn(CertificadoPagamentoPeer::ID);
            $comprovantesPagamentos = $certificado->getCertificadoPagamentos($cComprovantePagamento);
            $comprovantePagamentoObj = $comprovantesPagamentos[0];


            if ($comprovantePagamentoObj) {
                $urlImagemComprovante = '<img src=\"http://'.$_SERVER['HTTP_HOST'].'/media/comprovantes/'.$comprovantePagamentoObj->getId() . '.jpg" title=\"Imagem do comprovante\"/>';
                $urlThumbImagemComprovante = '<img id="imagemComprovanteId" style="cursor:pointer" src="http://'.$_SERVER['HTTP_HOST'].'/media/comprovantes/'.$comprovantePagamentoObj->getId() . '_p.jpg" title="Imagem do comprovante"/>';
                $urlThumbImagemComprovante .= "<script>$('#imagemComprovanteId').click(function () { alertSucesso('".$urlImagemComprovante."'); });</script>";
            } else {
                $urlImagemComprovante = '';
                $urlThumbImagemComprovante = '';
            }


            $comprovantePagamento = '';
            if ($comprovantePagamentoObj)
                $comprovantePagamento = array(
                    'id'=>$comprovantePagamentoObj->getId(),
                    'dataPagamento'=>$comprovantePagamentoObj->getDataConfirmacaoPagamento('d/m/Y H:i:s'),
                    'dataTransacao'=>$comprovantePagamentoObj->getDataInclusao('d/m/Y H:i:s'),
                    'valorPago'=>formataMoeda($comprovantePagamentoObj->getValor()),
                    'codigoPagamento'=>$comprovantePagamentoObj->getCodigoPagamento(),
                    'observacao'=>utf8_encode($comprovantePagamentoObj->getObservacao()),
                    'thumbImagemComprovante' => $urlThumbImagemComprovante,
                    'imagemComprovante' => $urlImagemComprovante
                );

            $btnInformarPagamento = '<button id="btnInformarPagamento" class="btn btn-primary" title="Pagamento" onclick="carregarModalInformacoesPagamento(); $(\'#modalInformarPagamentoCertificado\').modal(\'show\');"><i class="fa fa-money" aria-hidden="true"></i></button>';

            if($certificado->getDataConfirmacaoPagamento()){
                $dataConfirmacaoPagamento =$certificado->getDataConfirmacaoPagamento('d/m/Y');
                $situacaoPamento="<i class='fa fa-check text-success'></i>";
                $btnPagarExtornar = 'Pagamento confirmado pelo financeiro';
            }elseif ($certificado->getDataPagamento()) {
                $dataConfirmacaoPagamento =$certificado->getDataPagamento('d/m/Y');
                $situacaoPamento="<i class='fa fa-circle text-success'></i>";
                $btnPagarExtornar = '<input type="checkbox" id="chkPagarExtornarPagamento'.$certificado->getId().'" checked="checked" data-onstyle="danger" data-offstyle="success">
                <script>
                $(function() {
                    $("#chkPagarExtornarPagamento'.$certificado->getId().'").bootstrapToggle({
                        on: "Extornar",
                        off: "Informar Pagto."
                    });
                    $("#chkPagarExtornarPagamento'.$certificado->getId().'").change(function() {
                        informarPagamentoCertificado(\'extornar\');
                    });
                });
                </script>';

            }
            else{
                $dataConfirmacaoPagamento ='---';
                $situacaoPamento="<i class='fa fa-circle' style='color: red'></i>";
                $btnPagarExtornar = '<input type="checkbox" id="chkPagarExtornarPagamento'.$certificado->getId().'" data-onstyle="danger" data-offstyle="success">
                <script>
                $(function() {
                    $("#chkPagarExtornarPagamento'.$certificado->getId().'").bootstrapToggle({
                        on: "Extornar",
                        off: "Informar Pagto."
                    });
                    
                    $("#chkPagarExtornarPagamento'.$certificado->getId().'").change(function() {
                        if ($(this).prop("checked"))
                            informarPagamentoCertificado(\'pagar\');
                    });
                });
                </script>';

            }

            $pagamento[] =  array(utf8_encode('Situação')=> $situacaoPamento,
                'Dt.Pagt.'=> $dataConfirmacaoPagamento, 'Valor'=>formataMoeda($certificado->getProduto()->getPreco() - $certificado->getDesconto()),
                'Forma'=> utf8_encode($certificado->getFormaPagamento()->getNome()),
                utf8_encode('Ação')=>$btnInformarPagamento . ' '. $btnPagarExtornar
            );
            $colunas = array(
                array('nome'=>utf8_encode('Situação')), array('nome'=>'Dt.Pagt.'), array('nome'=>'Valor'),
                array('nome'=>'Forma'), array('nome'=>utf8_encode('Ação'))
            );


            $dadosPagamento = array('mensagem'=>'Ok','colunasPagamento'=>json_encode($colunas),'pagamento'=>json_encode($pagamento),
                'comprovantePagamento'=>json_encode($comprovantePagamento));
        }
        /*
         * FIM MONTAGEM INFORMACOES PAGAMENTO
         * */

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
                utf8_encode('Comentário') => utf8_encode($situacaoCertificado->getComentario())
            );
        }

        $colunasSituacoes = array(
            array('nome'=>'Id'), array('nome'=>utf8_encode('Usuário')), array('nome'=>'Descricao'),
            array('nome'=>'Data'), array('nome'=>utf8_encode('Comentário'))
        );
        $dadosSituacoes = array('mensagem'=>'Ok','colunasSituacoes'=>json_encode($colunasSituacoes),'situacoes'=>json_encode($situacoes));
        /*
         * FIM MONTAGEM INFORMACOES SITUACAO
         * */

        $permissoes = array();

        if (ControleAcesso::permitido('telaCertificado.php', 'altConsCd', $usuarioLogado->getPerfilId()))
            $permissoes['permiteAlterarConsultorCertificado'] = 'sim';
        else
            $permissoes['permiteAlterarConsultorCertificado'] = 'nao';

        if (ControleAcesso::permitido('apagarProtocolo', 'apagarProt', $usuarioLogado->getPerfilId()))
            $permissoes['permiteApagarProtocolo'] = 'sim';
        else
            $permissoes['permiteApagarProtocolo'] = 'nao';

        if (ControleAcesso::permitido('telaCertificado.php', 'apagar', $usuarioLogado->getPerfilId()))
            $permissoes['permiteApagarCertificado'] = 'sim';
        else
            $permissoes['permiteApagarCertificado'] = 'nao';
        /*
         * PERMITE INSERIR DESCONTO MESMO APOS VALIDACAO APENAS PARA O PERFIL ALTA GESTAO
         * */
        if ($usuarioLogado->getPerfilId() == 4) {
            $permissoes['permiteInserirDesconto'] = 'sim';
        }

        /*
         * CHECA SE TEM LIMITE DE CREDITO PARA GERAR O PROTOCOLO DESDE 01-05-2017
         * */
        $cCertificadosEmAbertoUsuario = new Criteria();

        /*
         * SE NAO FOR NEM DIRETOR NEM FINANCEIRO CHECA OS USUARIOS
         * */

        $permissoes['permiteGerarProtocolo'] = 'sim';
        if (  ($usuarioLogado->getPerfilId() != 4) && ($usuarioLogado->getPerfilId()!=11)) {

            $cCertificadosEmAbertoUsuario->add(CertificadoPeer::DATA_VALIDACAO, '2017-05-01 00:00:00', Criteria::GREATER_EQUAL);

            $cCertificadosEmAbertoUsuario->add(CertificadoPeer::CONFIRMACAO_VALIDACAO, array(1,2), Criteria::IN);
            $cCertificadosEmAbertoUsuario->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, null, Criteria::ISNULL);
            $cCertificadosEmAbertoUsuario->addOr(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, '0000-00-00 00:00:00');
            $cCertificadosEmAbertoUsuario->add(CertificadoPeer::USUARIO_ID, $usuarioLogado->getId());
            $qtdCertificadosEmAberto = CertificadoPeer::doCount($cCertificadosEmAbertoUsuario);
            /*
            * SE O LIMITE DE CREDITO FOR MENOR DO QUE A QUANTIDADE DE CERTIFICADOS EM ABERTO NAO PERMITE
            * SE NAO PERMITE GERAR
            * */
            if ($qtdCertificadosEmAberto >= $usuarioLogado->getLimiteQuantidade() ) {
                $permissoes['permiteGerarProtocolo'] = 'nao';
                $mensagemErroGerarProtocolo = utf8_encode('Você possui '. $qtdCertificadosEmAberto . ' certificados em aberto. Porém seu limite é de apenas ' . $usuarioLogado->getLimiteQuantidade());
            }
        }


        /*
         * PERMITE INSERIR DESCONTO MESMO APOS VALIDACAO APENAS PARA O PERFIL ALTA GESTAO
         * */
        if ($usuarioLogado->getPerfilId() == 4) {
            $permissoes['permiteAlterarProduto'] = 'sim';
        }

        echo json_encode(
            array('mensagem'=>'Ok','dadosCertificado'=>json_encode($dadosCertificado), 'dadosPagamento'=>json_encode($dadosPagamento),
                'dadosSituacoes'=>json_encode($dadosSituacoes), 'permissoes'=>json_encode($permissoes), 'mensagemErroGerarProtocolo'=>$mensagemErroGerarProtocolo
            )
        );
    }catch(Exception $e){
        erroEmail($e->getMessage(),"Erro funcao de detalhar o certificado");
        echo $e->getMessage();
    }
};



function vincula_contador(){
    try{
        $usuarioLogado = ControleAcesso::getUsuarioLogado();

        $certificado =  CertificadoPeer::retrieveByPk($_POST['certificado_id']);
        $cliente = $certificado->getCliente();

        $contadorAntigoId = 0;
        if ($certificado->getContador()) {
            $contadorAntigo = $certificado->getContador();
            $contadorAntigoId = $certificado->getContadorId();
        }

        /*SE O CONTADOR ANTIGO FOR ZERO OU DIFERENTE DO CONTADOR NOVO*/
        if ( $_POST['contador_id'] != $contadorAntigoId ){
            $certificado->setContadorId($_POST['contador_id']);

            $contadorNovo = ContadorPeer::retrieveByPK($_POST['contador_id']);

            if($contadorNovo->getNome()){
                $nomeContador = $contadorNovo->getNome();
            }elseif ($contadorNovo->getNomeFantasia()){
                $nomeContador = $contadorNovo->getNomeFantasia();
            }else{
                $nomeContador = $contadorNovo->getRazaoSocial();
            }

            $historico = new ClienteHistorico();
            $historico->setClienteId($cliente->getId());
            $historico->setUsuarioId($usuarioLogado->getId());

            /*SE EXISTIR UM CONTADOR ANTIGO*/
            if ($contadorAntigo) {
                if($contadorAntigo->getNome()){
                    $nomeContadorAntigo = $contadorAntigo->getNome();
                }elseif ($contadorAntigo->getNomeFantasia()){
                    $nomeContadorAntigo = $contadorAntigo->getNomeFantasia();
                }else{
                    $nomeContadorAntigo = $contadorAntigo->getRazaoSocial();
                }
                $comentario = 'Usuario, desvinculou contador: '.$nomeContadorAntigo. ' ao certificado e ao cliente e vinculou novo contador: ' . $nomeContador;
                $historico->setAcao('Usuario, desvinculou contador: '.$nomeContadorAntigo. ' ao certificado e ao cliente e vinculou novo contador: ' . $nomeContador . '. Motivo:' . $_POST['motivo']);
            } else {
                $comentario ='Usuario, vinculou contador: '.$nomeContador. ' ao cliente.';
                $historico->setAcao('Usuario, vinculou contador: '.$nomeContador. ' ao cliente. Motivo:' . $_POST['motivo']);
            }


            $historico->setComentario($_POST['motivo']);

            $historico->save();
            $certificado->save();
            $cliente->save();

            /*CRIA NOVA SITUAÇÃO NO CERTIFICADO | SITUACAO: VINCULOU USUARIO AO CERTIFICADO*/
            $cCriteriaSituacao = new Criteria();
            $cCriteriaSituacao->add(SituacaoPeer::SIGLA, 'cd_cont');
            $situacao = SituacaoPeer::doSelectOne($cCriteriaSituacao);
            inserir_situacao($certificado->getId(),$comentario .  '| Motivo: '. $_POST['motivo'],$usuarioLogado->getId(),$situacao->getId());
        }

        echo json_encode(array('mensagem'=>'Ok', 'nomeContador'=>$nomeContador));
    }catch(Exception $e){
        echo $e->getMessage();
    }
};

function finalizarVendaCertificado() {

    $usuarioLogadoRn = ControleAcesso::getUsuarioLogado();
    /*CADASTRO DO CLIENTE NOVO*/
    try {
        $con = Propel::getConnection(CertificadoPeer::DATABASE_NAME);
        $con->beginTransaction();

        if ($_POST['clienteId'])
            $cliente = ClientePeer::retrieveByPK($_POST['clienteId']);
        else
            $cliente = new Cliente();

        $cliente->setRazaoSocial(strtoupper(utf8_decode($_POST['edtRazaoSocial'])));
        $cliente->setNomeFantasia(strtoupper(utf8_decode($_POST['edtNomeFantasia'])));

        $cliente->setNumero($_POST['edtNumero']);
        $cliente->setEndereco(strtoupper(utf8_decode($_POST['edtEndereco'])));
        $cliente->setEmail($_POST['edtEmail']);
        $cliente->setBairro(strtoupper(utf8_decode($_POST['edtBairro'])));
        $cliente->setComplemento(strtoupper(utf8_decode($_POST['edtComplemento'])));
        $cliente->setCidade(strtoupper(utf8_decode($_POST['edtCidade'])));
        $cliente->setUf($_POST['edtUf']);

        $cliente->setNomeContato(strtoupper(utf8_decode($_POST['edtNomeContato'])));
        $cliente->setEmailContato($_POST['edtEmailContato']);
        $cliente->setReferenciaContato(utf8_decode($_POST['edtReferenciaContato']));
        $cliente->setTelefoneContato(utf8_decode($_POST['edtTelefoneContato']));

        $cliente->setRg($_POST['edtRg']);
        $cliente->setCargo($_POST['edtCargo']);
        $cliente->setNis($_POST['edtNis']);

        $cliente->setSituacao(0);

        $cliente->setCpfCnpj($_POST['edtCpfCnpj']);
        $cliente->setPessoaTipo($_POST['edtPessoaTipo']);

        if ($_POST['edtNascimento'] || $_POST['edtNascimentoResponsavel'])
			if ($_POST['edtPessoaTipo'] == 'F') {
				$dateArray=explode('/',$_POST['edtNascimento']);

				$nascimento = $dateArray[2]."/".$dateArray[1]."/".$dateArray[0];
				$cliente->setNascimento($nascimento);
			}
			elseif ($_POST['edtPessoaTipo'] == 'J')
				$dateArray=explode('/',$_POST['edtNascimentoResponsavel']);


        $cliente->setCep($_POST['edtCep']);

        $cliente->setFone1($_POST['edtFone1']);
        $cliente->setFone2($_POST['edtFone2']);
        $cliente->setCelular($_POST['edtCelular']);
        $cliente->setContadorId($_POST['edtCodigoContadorPedido']);
        $cliente->save();


        if ($_POST['edtPessoaTipo'] == "J") {
            if ($_POST['responsavelId'])
                $responsavel = ResponsavelPeer::retrieveByPK($_POST['responsavelId']);
            else
                $responsavel = new Responsavel();

            $responsavel->setNome(strtoupper(utf8_decode($_POST['edtNomeResponsavel'])));

            $responsavel->setNumero($_POST['edtNumeroResponsavel']);
            $responsavel->setEndereco(strtoupper(utf8_decode($_POST['edtEnderecoResponsavel'])));

            $responsavel->setEmail($_POST['edtEmailResponsavel']);
            $responsavel->setCpf($_POST['edtCpfResponsavel']);
            $responsavel->setBairro(strtoupper(utf8_decode($_POST['edtBairroResponsavel'])));
            $responsavel->setComplemento(strtoupper(utf8_decode($_POST['edtComplementoResponsavel'])));
            $responsavel->setCidade(strtoupper(utf8_decode($_POST['edtCidadeResponsavel'])));
            $responsavel->setUf($_POST['edtUfResponsavel']);
            $responsavel->setCep($_POST['edtCepResponsavel']);

            $nascimento = $dateArray[2] . "/" . $dateArray[1] . "/" . $dateArray[0];
            $responsavel->setNascimento($nascimento);

            $responsavel->setFone1($_POST['edtFone1Responsavel']);
            $responsavel->setFone2($_POST['edtFone2Responsavel']);
            $responsavel->setCelular($_POST['edtCelularResponsavel']);

            $responsavel->setRg($_POST['edtRgResponsavel']);
            $responsavel->setCargo($_POST['edtCargoResponsavel']);
            $responsavel->setNis($_POST['edtNisResponsavel']);
            $responsavel->save();

            $cliente->setResponsavelId($responsavel->getId());
            $cliente->save();
        }

        /*FIM CADASTRO DO CLIENTE E RESPONSAVEL*/


        /*INICIO CADASTRO DO CERTIFICADO*/
        $produtoNovo = ProdutoPeer::retrieveByPK($_POST['edtprodutoVenda']);

        $certificadoNovo = new Certificado();
        $certificadoNovo->setDataCompra(date('Y-m-d H:i:s'));
        $certificadoNovo->setUsuarioId($usuarioLogadoRn->getId());
        $certificadoNovo->setCliente($cliente);
        $certificadoNovo->setProdutoId($_POST['edtprodutoVenda']);
        $certificadoNovo->setFormaPagamentoId($_POST['edtFormaPagamento']);
        $certificadoNovo->setLocalId($usuarioLogadoRn->getLocalId());
        $certificadoNovo->setApagado(0);
        /*INSERE CONTADOR NO CERTIFICADO E NO CLIENTE*/
        if($_POST['edtCodigoContadorPedido'] != '') {
            $cliente->setContadorId($_POST['edtCodigoContadorPedido']);
            $certificadoNovo->setContadorId($_POST['edtCodigoContadorPedido']);
            $cliente->save();
            $certificadoNovo->setAutorizadoVendaSemContador(0);
        }

        /*CODIGO PARA ACHAR O ULTIMO CERTIFICADO VALIDADO PELO CLIENTE*/
        $cUltimoCertificado = new Criteria();
        $cUltimoCertificado->add(CertificadoPeer::CLIENTE_ID, $cliente->getId());
        $cUltimoCertificado->addDescendingOrderByColumn(CertificadoPeer::DATA_VALIDACAO);
        $cUltimoCertificado->addDescendingOrderByColumn(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO);
        $cUltimoCertificado->addDescendingOrderByColumn(CertificadoPeer::DATA_PAGAMENTO);
        $ultimoCd = CertificadoPeer::doSelectOne($cUltimoCertificado);
        if ($ultimoCd)
            if ($ultimoCd->getConfirmacaoValidacao()) {
                $certificadoNovo->setDataUltimaValidacao($ultimoCd->getConfirmacaoValidacao('y-m-d H:i:s'));
                /*SE FOR UMA RENOVACAO ATRIBUI O ID DO CERTIFICADO RENOVADO*/
                $validade = mktime(0,0,0,$ultimoCd->getConfirmacaoValidacao('m'), $ultimoCd->getConfirmacaoValidacao('d'), ($ultimoCd->getConfirmacaoValidacao('Y')+$ultimoCd->getProduto()->getValidade()));
                $hoje = mktime(0,0,0,date('m'), date('d'), date('Y'));
                /*SE A DATA DE VALIDADE DO CERTIFICADO FOR MENOR QUE HOJE E POR QUE ESTE NOVO CD E UMA RENOVACAO*/
                if ($hoje < $validade)
                    $certificadoNovo->setCertificadoRenovado($ultimoCd->getId());
            }

        /*
         * SALVA OS OBJETOS:
         * CLIENTE | RESPONSAVEL E CERTIFICADO
         * */

        if (!$certificadoNovo->validate()) {
            $mensagemErro = '';
            foreach ($certificadoNovo->getValidationFailures() as $falha)
                $mensagemErro .= $falha->getMessage() . '<br/>';
        }

/*        var_dump('produto:'.$certificadoNovo->getProdutoId());
        var_dump($mensagemErro);*/
        $certificadoNovo->save();


        /*FIM DO CADASTRO DO CERTIFICADO*/

        /*INICIO CADASTRO PEDIDO, ITEM PEDIDO, SITUACAO E CONTAS A RECEBER*/
        $situacao = new CertificadoSituacao();
        $situacao->setSituacaoId(3);
        $situacao->setComentario("Relizou pedido pelo ERP 3.0");
        $situacao->setCertificadoId($certificadoNovo->getId());
        $situacao->setData(date("Y-m-d H:i:s"));
        $situacao->setUsuarioId($usuarioLogadoRn->getId());
        $situacao->save();

        $pedido = new Pedido();
        $pedido->setDataPedido(date("Y-m-d H:i:s", mtime()));
        $pedido->setClienteId($cliente->getId());
        $pedido->setFuncionarioId($usuarioLogadoRn->getId());
        $pedido->save();

        $itemPedido = new ItemPedido();
        $itemPedido->setProdutoId($certificadoNovo->getProdutoId());
        $itemPedido->setCertificadoId($certificadoNovo->getId());
        $itemPedido->setPedidoId($pedido->getId());
        $itemPedido->save();

        $contaReceber = new ContasReceber();
        $contaReceber->setPedidoId($pedido->getId());
        $contaReceber->setCertificadoId($certificadoNovo->getId());
        if ($cliente->getRazaoSocial())
            $nome = $cliente->getRazaoSocial();
        else
            $nome = $cliente->getNomeFantasia();

        $contaReceber->setDescricao(utf8_decode("Compra de certificado digital: " . $certificadoNovo->getProduto()->getNome() . " , pelo cliente: " . $nome));
        $contaReceber->setDataDocumento(date("Y-m-d", mtime()));
        $contaReceber->setValorDocumento($certificadoNovo->getProduto()->getPreco());
        $contaReceber->setDesconto($certificadoNovo->getDesconto());
        $contaReceber->setSituacao(0);
        $contaReceber->setFormaPagamentoId($_POST['edtFormaPagamento']);
        $contaReceber->setVencimento(date('Y-m-d H:i:s'));
        $contaReceber->setPedidoId($pedido->getId());
        $contaReceber->save();

        /*FIM CADASTRO PEDIDO, ITEM PEDIDO, SITUACAO E CONTAS A RECEBER*/


        $con->commit();
        $resultado = "tudoOk";
        echo $resultado;

    } catch(Exception $e){
        $con->rollBack();
        echo 'Erro;Aconteceu um erro na gravacao do pedido do certificado: '.$e->getMessage();
    }





}

/*FUNCAO DEPRECATED*/
function carregarModalPedidoInterno () {
    ob_start();

    include_once $_SERVER['DOCUMENT_ROOT'] . '/modais/certificados/certificadoModalVendaInterna_bkp.php';

    $out1 = ob_get_contents();

    ob_end_clean();
    //$modalPedidoInterno = file_get_contents($_SERVER['DOCUMENT_ROOT']. '/modais/certificados/certificadoModalVendaInterna_bkp.php');
    echo "telaOk;".$out1;
}

function autorizar_certificado ($certificado_id,$motivoAutorizacao,$usuario_id){
    try{
        //duplica o cadastro com as mesmas informações (Certificado)
        //Transfere pagamento e confirmação de pagamento do certificado anterior pro novo registro

        $certificado =  CertificadoPeer::retrieveByPk($certificado_id);
        $certificado->setAutorizadoVendaSemContador('1');
        $certificado->save();

        /* SALVO SITAUÇÃO NO CADASTRO A ER REVOGADO */

        $idSituacao = 30;
        $comentarioSituacao = $motivoAutorizacao;
        inserir_situacao($certificado_id,$comentarioSituacao,$usuario_id,$idSituacao);



        echo '0';
    }catch (Exception $e){
        echo $e->getMessage();
    }
};

function carregarCertificados() {
    try {

        /*
         * APAGA INFORMACOES DA SESSAO REFERENTE AO RECIBO
         * */
        if ($_SESSION['informacoesRecibo'])
            unset($_SESSION['informacoesRecibo']);

        $cCertificado = new Criteria();

        $usuarioLogado = ControleAcesso::getUsuarioLogado();

        if (isset($_POST['filtros'])) {
            /*OS FILTROS INDIVIDUAIS*/
            if ($_POST['filtros']['campoFiltro']) {
                $campoFiltro = key($_POST['filtros']['campoFiltro']);
                $valorCampoFiltro = $_POST['filtros']['campoFiltro'][key($_POST['filtros']['campoFiltro'])];
            }

            if ($_POST['filtros']['filtroData'])
                $filtroData = explode(',',$_POST['filtros']['filtroData']);


            if ($_POST['filtros']['filtroPago']=='true') {
                /*$cPagamentoNull = $cCertificado->getNewCriterion(CertificadoPeer::DATA_PAGAMENTO, null, Criteria::ISNOTNULL);
                $cPagamentoNotEqual = $cCertificado->getNewCriterion(CertificadoPeer::DATA_PAGAMENTO, '0000-00-00 00:00:00', Criteria::NOT_EQUAL);*/

                $cConfirmacaoPagamentoNull = $cCertificado->getNewCriterion(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, null, Criteria::ISNOTNULL);
                $cConfirmacaoPagamentoNotEqual = $cCertificado->getNewCriterion(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, '0000-00-00 00:00:00', Criteria::NOT_EQUAL);
                $cConfirmacaoPagamentoNull->addAnd($cConfirmacaoPagamentoNotEqual);
                /*$cConfirmacaoPagamentoNull->addOr($cPagamentoNull);
                $cPagamentoNull->addAnd($cPagamentoNotEqual);*/
                $cCertificado->add($cConfirmacaoPagamentoNull);
            } elseif ($_POST['filtros']['filtroPago']=='false') {
               /* $cNaoPagouNull = $cCertificado->getNewCriterion(CertificadoPeer::DATA_PAGAMENTO, null, Criteria::ISNULL);
                $cNaoPagouEqual = $cCertificado->getNewCriterion(CertificadoPeer::DATA_PAGAMENTO, '0000-00-00 00:00:00');*/

                $cNaoConfirmouNull = $cCertificado->getNewCriterion(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, null, Criteria::ISNULL);
                $cNaoConfirmouEqual = $cCertificado->getNewCriterion(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, '0000-00-00 00:00:00');

                /*$cNaoPagouNull->addOr($cNaoPagouEqual);*/
                $cNaoConfirmouNull->addOr($cNaoConfirmouEqual);
                /*$cNaoConfirmouNull->addAnd($cNaoPagouNull);*/
                $cCertificado->add($cNaoConfirmouNull);

            }

            if ($_POST['filtros']['filtroValidado']=='true') {
                $cValidacaoNull = $cCertificado->getNewCriterion(CertificadoPeer::DATA_VALIDACAO, null, Criteria::ISNOTNULL);
                $cValidacaoNotEqual = $cCertificado->getNewCriterion(CertificadoPeer::DATA_VALIDACAO, '0000-00-00 00:00:00', Criteria::NOT_EQUAL);
                $cValidacaoNull->addAnd($cValidacaoNotEqual);

                $cConfirmacaoValidacaoNotEqual = $cCertificado->getNewCriterion(CertificadoPeer::CONFIRMACAO_VALIDACAO, 0, Criteria::NOT_EQUAL);


                $cValidacaoNull->addOr($cConfirmacaoValidacaoNotEqual);

                $cCertificado->add($cValidacaoNull);

            } elseif ($_POST['filtros']['filtroValidado']=='false') {
                $cValidacaoNull = $cCertificado->getNewCriterion(CertificadoPeer::DATA_VALIDACAO, null, Criteria::ISNULL);
                $cValidacaoNotEqual = $cCertificado->getNewCriterion(CertificadoPeer::DATA_VALIDACAO, '0000-00-00 00:00:00', Criteria::EQUAL);
                $cValidacaoNull->addOr($cValidacaoNotEqual);

                $cCertificado->add($cValidacaoNull);

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

            /*
             * SE SELECIONOU PRODUTOS FILTRA POR ELES
             * CASO CONTRARIO MOSTRA TODOS
            */

            if ($_POST['filtros']['filtroProdutos']) {
                $i = 1;
                foreach ($_POST['filtros']['filtroProdutos'] as $produto) {
                    if ($i == 1) {
                        $cCertificado->add(ProdutoPeer::PRODUTO_ID, $produto['id']);
                        $i++;
                    } else
                        $cCertificado->addOr(ProdutoPeer::PRODUTO_ID, $produto['id']);
                }
            }
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
                }



            }

            /*else {
                $cCertificado->add(CertificadoPeer::DATA_COMPRA, date('Y').'-'.date('m').'-01'.$hora_ini, Criteria::GREATER_EQUAL);
                $cCertificado->addAnd(CertificadoPeer::DATA_COMPRA, date('Y').'-'.date('m').'-'.getLastDayOfMonth(date('m'), date('Y')) . $hora_fim, Criteria::LESS_EQUAL);
            }*/
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
        $cCertificadosPagos = clone $cCertificado;
        $cCertificadosEmAberto = clone $cCertificado;
        $cProdutosCertificados = clone $cCertificado;

        /*
         * BUSCA TODOS OS PRODUTOS DOS CERTIFICADOS ESCOLHIDOS ATRAVES DO FILTRO
         * */
        $cProdutosCertificados->addSelectColumn('distinct (produto.produto_id) as id');
        $cProdutosCertificados->addSelectColumn('produto.nome as nome');
        $cProdutosCertificados->addJoin(CertificadoPeer::PRODUTO_ID, ProdutoPeer::ID, Criteria::JOIN);
        $cProdutosCertificados->addGroupByColumn(ProdutoPeer::PRODUTO_ID);
        $stmtProdutosCertificados = CertificadoPeer::doSelectStmt($cProdutosCertificados);
        $arrProdutosCertificados = $stmtProdutosCertificados->fetchAll();

        /*ADICIONA OS PRODUTOS PRINCIPAIS NO COMBO*/
        $produtos[] = array('id'=>'', 'nome'=>'Filtro de Produto');
        foreach ($arrProdutosCertificados as $produtoPrincipal) {
            $produtos[] = array('id'=>$produtoPrincipal['id'], 'nome'=>utf8_encode($produtoPrincipal['nome']));
        }
        /*
         * CONSULTA DO NUMERO E SOMA TOTAL DE CERTIFCICADOS PAGOS E EM ABERTO
         * PARA ISSO INSERI NO CRITERIO DE CONSULTA AS VERIAVEIS COUNT QTD E SOMA SUM NA CONSULTA
         * E EXECUTEI O DOSELECTSTMT PARA TRAZER OS RESULTADOS COM OS MESMOS CRITERIOS ESCOLHIDOS PELO USUARIO
         * */
        $cCertificadosPagos->addSelectColumn('count(certificado.ID) as qtd');
        $cCertificadosPagos->addSelectColumn('sum(produto.PRECO)-sum(certificado.DESCONTO) as soma');
        $cCertificadosPagos->addJoin(CertificadoPeer::USUARIO_ID, UsuarioPeer::ID, Criteria::JOIN);
        $cCertificadosPagos->addJoin(CertificadoPeer::CLIENTE_ID, ClientePeer::ID, Criteria::JOIN);
        $cCertificadosPagos->addJoin(CertificadoPeer::PRODUTO_ID, ProdutoPeer::ID, Criteria::JOIN);

        $cCertificadosEmAberto->addSelectColumn('count(certificado.ID) as qtd');
        $cCertificadosEmAberto->addSelectColumn('sum(produto.PRECO)-sum(certificado.DESCONTO) as soma');
        $cCertificadosEmAberto->addJoin(CertificadoPeer::USUARIO_ID, UsuarioPeer::ID, Criteria::JOIN);
        $cCertificadosEmAberto->addJoin(CertificadoPeer::CLIENTE_ID, ClientePeer::ID, Criteria::JOIN);
        $cCertificadosEmAberto->addJoin(CertificadoPeer::PRODUTO_ID, ProdutoPeer::ID, Criteria::JOIN);


        /*
         * PARA CERTIFICADOS PAGOS
         * SO RELACIONA OS FILTROS DE CERTIFICADO PAGO E NAO PAGO SE
         * A DATA SELECIONADA FOI DATA DA COMPRA CASO CONTRARIO SEGUE COM OS FILTROS PRINCIPAIS
        */

        if ($_POST['filtros']['filtroTipoData']=='Compra' || $_POST['filtros']['filtroTipoData']=='Vencimento' || $_POST['filtros']['filtroTipoData']==utf8_encode('Validação')) {
            $cPagamentoNull = $cCertificado->getNewCriterion(CertificadoPeer::DATA_PAGAMENTO, null, Criteria::ISNOTNULL);
            $cPagamentoNotEqual = $cCertificado->getNewCriterion(CertificadoPeer::DATA_PAGAMENTO, '0000-00-00 00:00:00', Criteria::NOT_EQUAL);

            $cConfirmacaoPagamentoNull = $cCertificado->getNewCriterion(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, null, Criteria::ISNOTNULL);
            $cConfirmacaoPagamentoNotEqual = $cCertificado->getNewCriterion(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, '0000-00-00 00:00:00', Criteria::NOT_EQUAL);

            $cPagamentoNull->addAnd($cPagamentoNotEqual);
            $cConfirmacaoPagamentoNull->addAnd($cConfirmacaoPagamentoNotEqual);
            $cConfirmacaoPagamentoNull->addOr($cPagamentoNull);
            $cCertificadosPagos->add($cConfirmacaoPagamentoNull);
        }
        $stmtQuantidadesPagos = CertificadoPeer::doSelectStmt($cCertificadosPagos);
        $arrQuantidadesPagos = $stmtQuantidadesPagos->fetchAll();

        /*
         * PARA CERTIFICADOS EM ABERTO
         * SO RELACIONA OS FILTROS DE CERTIFICADO PAGO E NAO PAGO SE
         * A DATA SELECIONADA FOI DATA DA COMPRA CASO CONTRARIO SEGUE COM OS FILTROS PRINCIPAIS
        */
        if ($_POST['filtros']['filtroTipoData']=='Compra' || $_POST['filtros']['filtroTipoData']=='Vencimento' || $_POST['filtros']['filtroTipoData']==utf8_encode('Validação') ) {
            $cCertificadosEmAberto->add(CertificadoPeer::DATA_PAGAMENTO, null, Criteria::ISNULL);
            $cCertificadosEmAberto->addOr(CertificadoPeer::DATA_PAGAMENTO, '0000-00-00 00:00:00');
            $cCertificadosEmAberto->addAnd(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, null, Criteria::ISNULL);
            $cCertificadosEmAberto->addOr(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, '0000-00-00 00:00:00');
            $stmtQuantidadesEmAberto = CertificadoPeer::doSelectStmt($cCertificadosEmAberto);
            $arrQuantidadesEmAberto = $stmtQuantidadesEmAberto->fetchAll();
        } else {
            $arrQuantidadesEmAberto[0]['qtd'] = 0.0;
            $arrQuantidadesEmAberto[0]['soma'] = 0.0;
        }


        /*
         * FIM DE CONSULTA DE QUUANTIDADES E SOMAS DE CERTIFICADOS PAGOS E EM ABERTO
         * */


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
            $produto = ($certificado->getProduto()) ? utf8_encode($certificado->getProduto()->getNome()) : '---';

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




            $certificados[] = array(' '=>($i++),'Cod.'=>$certificado->getId(),
                'Pago'=>$situacaoPagamento,
                'D.Pag.'=>$dataPagamento,
                'Proto.'=> ($certificado->getProtocolo())?$certificado->getProtocolo():'-',
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
                array('nome'=>' '), array('nome'=>'Cod.'), array('nome'=>'Pago'),array('nome'=>'D.Pag.'), array('nome'=>'D.Venc.'), array('nome'=>'Proto.'),
                array('nome'=>'Cliente'), array('nome'=>'Tipo'), array('nome'=>'Consultor'), array('nome'=>'Tot'), array('nome'=>'.'), array('nome'=>utf8_encode('Ações'))
            );

        } elseif (($_POST['filtros']['filtroTipoData']) && ($_POST['filtros']['filtroTipoData']==utf8_encode('Validação'))) {
            $colunas = array(
                array('nome'=>' '), array('nome'=>'Cod.'), array('nome'=>'Pago'),array('nome'=>'D.Pag.'), array('nome'=>'D.Val.'), array('nome'=>'Proto.'),
                array('nome'=>'Cliente'), array('nome'=>'Tipo'), array('nome'=>'Consultor'), array('nome'=>'Tot'), array('nome'=>'.'), array('nome'=>utf8_encode('Ações'))
            );

        } else {
            $colunas = array(
                array('nome'=>' '), array('nome'=>'Cod.'), array('nome'=>'Pago'),array('nome'=>'D.Pag.'), array('nome'=>'D.Com.'), array('nome'=>'Proto.'),
                array('nome'=>'Cliente'), array('nome'=>'Tipo'), array('nome'=>'Consultor'), array('nome'=>'Tot'), array('nome'=>'.'), array('nome'=>utf8_encode('Ações'))
            );
        }



        $quantidadeCertificadosTotal = array(
            'somaTotalCertificadosPagos'=>formataMoeda($arrQuantidadesPagos[0]['soma']),
            'qtdCertificadosPagos'=>$arrQuantidadesPagos[0]['qtd'],
            'qtdCertificadosEmAberto'=>$arrQuantidadesEmAberto[0]['qtd'],
            'somaTotalCertificadosEmAberto'=>formataMoeda($arrQuantidadesEmAberto[0]['soma']),
            'qtdCertificados'=>$quantidadeCertificados
        );

        $retorno = array('mensagem'=>'Ok','colunas'=>json_encode($colunas), 'certificados'=>json_encode($certificados),
            'quantidadeCertificadosTotal'=>json_encode($quantidadeCertificadosTotal), 'filtroProdutos'=>json_encode($produtos ));

        echo json_encode($retorno);
    }catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}

function carregarModalTrocarProdutos() {
    try {
        $certificado = CertificadoPeer::retrieveByPK($_POST['certificado_id']);
        $contador = $certificado->getContador();
        $temDesconto = '';
        if ($contador)
            $temDesconto = $certificado->getContador()->getDesconto();

        $cProdutos =  new Criteria();
        if ($temDesconto)
            $cProdutos->add(ProdutoPeer::SITUACAO,10);
        else {
            $cProdutos->add(ProdutoPeer::SITUACAO, 0);
            $cProdutos->addOr(ProdutoPeer::SITUACAO, 1);
        }

        $cProdutos->add(ProdutoPeer::PESSOA_TIPO, $certificado->getCliente()->getPessoaTipo());
        $cProdutos->addAscendingOrderByColumn(ProdutoPeer::NOME);
        $produtosObj = ProdutoPeer::doSelect($cProdutos);
        $produtos = array();
        foreach ($produtosObj as $produto)
            $produtos[] = array("id"=>$produto->getId(), "nome"=>utf8_encode($produto->getNome() ) . ' = '.formataMoeda($produto->getPreco()));

        $resultado = array(
            'mensagem'=>'Ok', 'produtos'=>json_encode($produtos),
            'produtoId'=>$certificado->getProdutoId(),
            'formaPagamento'=>$certificado->getFormaPagamentoId()
        );

        echo json_encode($resultado);

    } catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}

function carregarFiltrosCertificados() {
    try {
        $usuarioLogado = ControleAcesso::getUsuarioLogado();
        $cUsuarios =  new Criteria();
        $cUsuarios->add(UsuarioPeer::SITUACAO, -1, Criteria::NOT_EQUAL );

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
        $usuarios[] = array("id"=>'', "nome"=>utf8_encode('Selecione o Usuário'));
        foreach ($usuariosObj as $usuario)
            $usuarios[] = array("id"=>$usuario->getId(), "nome"=>utf8_encode(strtoupper($usuario->getNome())));

        $resultado = array(
            'mensagem'=>'Ok', 'usuarios'=>json_encode( $usuarios),
        );

        echo json_encode($resultado);

    } catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}

function carregarModalAlteraConsultorUsuario(){
    try {
        $certificado = CertificadoPeer::retrieveByPK($_POST['certificadoId']);
        $cConsultores = new Criteria();
        $cConsultores->add(UsuarioPeer::SITUACAO, 0);
        $consultoresObj = UsuarioPeer::doSelect($cConsultores);

        $consultores = array();
        foreach ($consultoresObj as $usuario)
            $consultores[] = array("id"=>$usuario->getId(), "nome"=>utf8_encode(strtoupper($usuario->getNome())));

        echo json_encode(array('mensagem'=>'Ok', 'consultor'=>$certificado->getUsuarioId(), 'consultores'=>json_encode($consultores)));
    } catch (Exception $e) {
        echo 'Algo deu errado na a&ccedil;&atilde;o de carregar consultores. Erro:'. $e->getMessage();
    }
}
function alterarConsultorCertificado() {
    try {
        $usuarioLogado = ControleAcesso::getUsuarioLogado();
        $certificado = CertificadoPeer::retrieveByPK($_POST['certificadoId']);
        $consultorAnterior = $certificado->getUsuarioRelatedByUsuarioId()->getNome();
        $certificado->setUsuarioId($_POST['consultor']);
        $certificado->save();

        $certSit = new CertificadoSituacao();
        $certSit->setCertificadoId($certificado->getId());
        $certSit->setUsuarioId($usuarioLogado->getId());
        $certSit->setComentario('Alterou de consultor do certificado, consultor anterior: '. $consultorAnterior);
        $cSit = new Criteria();
        $cSit->add(SituacaoPeer::SIGLA, 'edt_vend');
        $certSit->setData(date('Y-m-d H:i:s'));
        $certSit->setSituacao(SituacaoPeer::doSelectOne($cSit));
        $certSit->save();

        echo json_encode(array('mensagem'=>'Ok'));
    } catch (Exception $e) {
        echo 'Algo deu errado na a&ccedil;&atilde;o trocar consultor do certificado. Erro:'. $e->getMessage();
    }

}

function importarCertificadosValidados_BKP() {
    try {
        ini_set('memory_limit', '256M');
        set_time_limit(180);
        $usuarioLogado = ControleAcesso::getUsuarioLogado();
        if ($_SESSION['arrayCertificadosValidados'])
            $certificadosValidados = unserialize($_SESSION['arrayCertificadosValidados']);

        $usuariosCpfs = array();
        $certificadosProtocolos = array();

        foreach ($certificadosValidados as $certificadoValidado ) {

            if (strlen( $certificadoValidado['CPFAVP']) == 10)
                $cpf = '0' . $certificadoValidado['CPFAVP'];
            elseif (strlen( $certificadoValidado['CPFAVP']) == 9)
                $cpf = '00' . $certificadoValidado['CPFAVP'];
            elseif (strlen( $certificadoValidado['CPFAVP']) == 8)
                $cpf = '000' . $certificadoValidado['CPFAVP'];
            else
                $cpf = $certificadoValidado['CPFAVP'];
            $usuariosCpfs[] = formatarCPF_CNPJ($cpf);
            $certificadosProtocolos[] = $certificadoValidado['Protocolo'];
        }


        /*
         * parei aqui
         * var_dump($usuariosCpfs);
        exit;*/
        /*
         * BUSCA TODOS OS USUARIOS QUE VALIDARAM CERTIFICADOS E COLOCA EM UM ARRAY
         * */
        $cUsuario = new Criteria();
        $cUsuario->add(UsuarioPeer::CPF, $usuariosCpfs , Criteria::IN);
        $usuariosObj = UsuarioPeer::doSelect($cUsuario);

        /*
         * BUSCA TODOS OS CERTIFICADOS VALIDADOS E COLOCA EM UM ARRAY
         * */

        $cCert = new Criteria();
        $cCert->add(CertificadoPeer::PROTOCOLO, $certificadosProtocolos, Criteria::IN);
        $cCert->addDescendingOrderByColumn(CertificadoPeer::ID);
        $certificadosObj = CertificadoPeer::doSelect($cCert);

        $certificadosImportados = array();
        $certificadosNaoImportados = array();

        $periodoDe = new DateTime('2050-01-01 00:00:00');
        $periodoAte = new DateTime('2000-01-01 00:00:00');

        $quantidadeTotalImportada = 0;
        $iNaoImportado = 0;
        $con = Propel::getConnection(CertificadoPeer::DATABASE_NAME);
        $con->beginTransaction();

        foreach ($certificadosValidados as $certificadoValidado) {
            $dataAvp = explode('/',substr($certificadoValidado['DtInclusao'],0, 10));
            if (substr($certificadoValidado['DtInclusao'],10))
                $hora = substr($certificadoValidado['DtInclusao'],10);
            else
                $hora = '00:00:00';

            $dataAvp = new DateTime($dataAvp[2].'-'.$dataAvp[1].'-'.$dataAvp[0] . ' ' . $hora);

            /*
             * PEGA A MENOR DATA DE VALIDACAO E A MAIOR PARA INFORMAR NA IMPORTACAO
             * */
            if ( $periodoDe>$dataAvp )
                $periodoDe = $dataAvp;
            if ( $periodoAte<$dataAvp )
                $periodoAte = $dataAvp;

            $agr = '';
            /*BUSCA O USUARIO AGR QUE VALIDOU O CERTIFICADO*/
            foreach ($usuariosObj as $usuarioObj) {

                if (strval($cpf) == removeTracoPontoBarra($usuarioObj->getCpf())) {
                    $agr = clone $usuarioObj;
                }
            }

            $certificado = '';
            /*BUSCA O CERTIFICADO NO SISTEMA*/
            foreach ($certificadosObj as $certificadoObj) {
                if ($certificadoValidado['Protocolo'] == intval($certificadoObj->getProtocolo())) {
                    $certificado = clone $certificadoObj;
                }
            }
            /*
             * CASO O PROTOCOLO A SER IMPORTADO NAO SEJA ENCONTRADO OU NA BASE DE CERTIFICADOS OU NA BASE DE USUARIOS
             * ALERTAR PARA ENTENDERMOS O PROBLEMA E CORRIGIR ALEM DE JOGAR NA TABELA DE CERTIFICADOS VALIDADOS FORA DO SISTEMA
             * */
            if ( !$certificado) {

                $certificadosNaoImportados[] = array(
                    ' '=>++$iNaoImportado,
                    'Protocolo'=>$certificadoValidado['Protocolo'],
                    'Dt. Validacao'=>$certificadoValidado['DtInclusao'],
                    'Agr'=>utf8_encode($certificadoValidado['AVP']),
                    'Cliente'=>utf8_encode($certificadoValidado['Nome']),
                    'Status'=>utf8_encode($certificadoValidado['Status']),
                    'Documento'=>utf8_encode($certificadoValidado['Documento']),

                );

                $cCertificadoForaDoSistema = new Criteria();
                $cCertificadoForaDoSistema->add(CertificadoForaSistemaPeer::PROTOCOLO, $certificadoValidado['Protocolo']);
                $certificadoForaDoSistema = CertificadoForaSistemaPeer::doSelectOne($cCertificadoForaDoSistema);

                if (!$certificadoForaDoSistema)
                    $certificadoForaDoSistema = new CertificadoForaSistema();

                $certificadoForaDoSistema->setProtocolo($certificadoValidado['Protocolo']);
                $certificadoForaDoSistema->setDocumento($certificadoValidado['Documento']);
                $certificadoForaDoSistema->setRazao($certificadoValidado['Nome']);
                $certificadoForaDoSistema->setStatus($certificadoValidado['Status']);
                $certificadoForaDoSistema->setProduto($certificadoValidado['Produto']);
                $certificadoForaDoSistema->setLocal($certificadoValidado['NomePosto']);
                $certificadoForaDoSistema->setAr($certificadoValidado['AVP']);
                $certificadoForaDoSistema->setDataValidacao($dataAvp->format('Y-m-d H:i:s'));
                $certificadoForaDoSistema->setDataImportacao(date('Y-m-d H:i:s'));
                $certificadoForaDoSistema->setDataMesReferente(date('m'));
                $certificadoForaDoSistema->setSituacao(0);
                $certificadoForaDoSistema->setCpfAr($cpf);
                if ($certificadoValidado['E-mail Titular'])
                    $certificadoForaDoSistema->setEmailCliente($certificadoValidado['E-mail Titular']);
                if ($certificadoValidado['Telefone Titular'])
                    $certificadoForaDoSistema->setTelefoneCliente($certificadoValidado['Telefone Titular']);
                $certificadoForaDoSistema->save();

            }

            /*
             * SE ENCONTROU O AGENTE DE REGISTRO E O CERTIFICADO INFORMADOS NO RELATORIO
             * */
            if ($certificado ) {

                /*
                 * BUSCA PELA DATA DE INICIO DE VALIDADE E PELA DATA DE FIM DA VALIDADE
                 * SE NAO ENCONTRAR CONSIDERA O AVP COMO DATA DE INICIO DA VALIDADE E QUANDO IMPORTAR NOVAMENTE
                 * TROCA PARA A DATA CORRETA
                 * */
                if ($certificadoValidado['DtInicioValidade'] && $certificadoValidado['DtFimValidade']) {
                    $dataInicioValidade = explode('/', substr($certificadoValidado['DtInicioValidade'], 0, 10));
                    if (substr($certificadoValidado['DtInicioValidade'], 10))
                        $hora = substr($certificadoValidado['DtInicioValidade'], 10);
                    else
                        $hora = '00:00:00';
                    $dataInicioValidade = new DateTime($dataInicioValidade[2] . '-' . $dataInicioValidade[1] . '-' . $dataInicioValidade[0] . ' ' . $hora);


                    $dataFimValidade = explode('/', substr($certificadoValidado['DtFimValidade'], 0, 10));
                    if (substr($certificadoValidado['DtFimValidade'], 10))
                        $hora = substr($certificadoValidado['DtFimValidade'], 10);
                    else
                        $hora = '00:00:00';
                    $dataFimValidade = new DateTime($dataFimValidade[2] . '-' . $dataFimValidade[1] . '-' . $dataFimValidade[0] . ' ' . $hora);

                    $certificado->setDataInicioValidade($dataInicioValidade->format('Y-m-d H:i:s'));
                    $certificado->setDataFimValidade($dataFimValidade->format('Y-m-d H:i:s'));
                }/*
                 * SE NAO HOUVER DATA DE INICIO E FIM DE FALIDADE CONSIDERA O AVP COMO DATA DE INICIO
                 * SOMA QUANTIDADE DE ANOS DA VALIDADE DO CD E INSERE NO BANCO A INFORMACAO
                 * */
                else {
                    if ($certificadoValidado['Validade'] != 'REVOGADO') {
                        $certificado->setDataInicioValidade($dataAvp->format('Y-m-d H:i:s'));

                        $dataInicioValidade = $dataAvp;

                        /*
                         * PEGA A VALIDADE PARA SOMAR NA DATA FINAL
                         *  */
                        $validade = substr($certificadoValidado['Validade'], 0, 1);
                        $dataFimValidadeRevogado = new DateTime($dataAvp->format('Y-m-d H:i:s'));
                        $dataFimValidadeRevogado->add(new DateInterval('P'.$validade.'Y'));
                        $certificado->setDataFimValidade($dataFimValidadeRevogado->format('Y-m-d H:i:s'));
                    }
                }

                if ($certificado->getConfirmacaoValidacao() == 1)
                    $statusAnterior = 'EMITIDO';
                elseif ($certificado->getConfirmacaoValidacao() == 2)
                    $statusAnterior = 'PENDENTE';
                if ($certificado->getConfirmacaoValidacao() == 4)
                    $statusAnterior = 'REVOGADO';


                /*
                 * SO ATUALIZA NO BANCO SE
                 * SE NAO HOUVE DATA DE SINCRONIZACAO OU
                 * SE O STATUS ANTERIOR FOR DIFERENTE DO RELATORIO OU
                 * SE A DATA DE VALIDACAO FOR DIREFENTE DO RELATORIO OU
                 * SE A DATA DE INICIO DA VALIDADE FOR DIFENTE NESTE CASO QUANDO IMPORTADO PELA PRIMEIRA VEZ PODE TER CONSIDERADO A DATA DE INICIO = DATA AVP
                 * */

/*                if ((!$certificado->getDataSincronizacaoAc())  ||
                    ($statusAnterior != $certificadoValidado['Status']) ||
                    ($certificado->getDataValidacao('d/m/Y') != $dataAvp->format('d/m/Y')) ||
                    ($certificado->getDataInicioValidade('d/m/Y') != $dataInicioValidade->format('d/m/Y')) ||
                    ($certificadoValidado['E-mail Titular']!='' && strtolower(trim($certificado->getCliente()->getEmailAc())) != strtolower(trim($certificadoValidado['E-mail Titular']))) ||
                    ($certificadoValidado['Telefone Titular']!='' && $certificado->getCliente()->getTelefoneAc() != $certificadoValidado['Telefone Titular'])) {
                var_dump($certificado->getProtocolo(), $certificado->getCliente()->getTelefoneAc() , $certificadoValidado['Telefone Titular'],strtolower(trim($certificado->getCliente()->getEmailAc())),strtolower(trim($certificadoValidado['E-mail Titular'])),  $certificado->getId(), $certificado->getClienteId(), (!$certificado->getDataSincronizacaoAc())  ,
                    ($statusAnterior != $certificadoValidado['Status']) ,
                    ($certificado->getDataValidacao('d/m/Y') != $dataAvp->format('d/m/Y')) ,
                    ($certificado->getDataInicioValidade('d/m/Y') != $dataInicioValidade->format('d/m/Y')) ,
                    ($certificadoValidado['E-mail Titular']!='' && $certificado->getCliente()->getEmailAc() != $certificadoValidado['E-mail Titular']) ,
                    ($certificadoValidado['Telefone Titular']!='' && $certificado->getCliente()->getTelefoneAc() != $certificadoValidado['Telefone Titular']));
                    var_dump($statusAnterior , $certificadoValidado['Status']);

                }*/

                if (
                    (!$certificado->getDataSincronizacaoAc())  ||
                    ($statusAnterior != $certificadoValidado['Status']) ||
                    ($certificado->getDataValidacao('d/m/Y') != $dataAvp->format('d/m/Y')) ||
                    ($certificado->getDataInicioValidade('d/m/Y') != $dataInicioValidade->format('d/m/Y')) ||
                    ($certificadoValidado['E-mail Titular']!='' && strtolower(trim($certificado->getCliente()->getEmailAc())) != strtolower(trim($certificadoValidado['E-mail Titular']))) ||
                    ($certificadoValidado['Telefone Titular']!='' && $certificado->getCliente()->getTelefoneAc() != $certificadoValidado['Telefone Titular'])

                )
                {

/*                    var_dump($certificado->getProtocolo(),( !$certificado->getDataSincronizacaoAc())  ,
                        ($statusAnterior != $certificadoValidado['Status']) ,
                        ($certificado->getDataValidacao('d/m/Y') != $dataAvp->format('d/m/Y')) ,
                        ($certificado->getDataInicioValidade('d/m/Y') != $dataInicioValidade->format('d/m/Y')));

                    var_dump($certificado->getDataSincronizacaoAc() ,
                        $statusAnterior,$certificadoValidado['Status'] ,
                        $certificado->getDataValidacao('d/m/Y'), $dataAvp->format('d/m/Y') ,
                        $certificado->getDataInicioValidade('d/m/Y') , $dataInicioValidade->format('d/m/Y'));*/

                    $cliente = $certificado->getCliente();
                    $cContatosCliente = new Criteria();
                    $cContatosCliente->add(ClienteContatoPeer::SITUACAO, 0);
                    $cContatosCliente->add(ClienteContatoPeer::CLIENTE_ID, $cliente->getId());
                    $cContatosCliente->add(ClienteContatoPeer::TELEFONE, $certificadoValidado['Telefone Titular']);
                    $cContatosCliente->add(ClienteContatoPeer::EMAIL, $certificadoValidado['E-mail Titular']);
                    $contatosCliente = ClienteContatoPeer::doSelect($cContatosCliente);

                    /*
                     * SE NAO TEM O CONTATO ENCONTRADO NA BASE DA AC, CRIA UM NOVO, E ATUALIZA O CADASTRO DE CLIENTE
                     * */
                    if (count($contatosCliente) == 0 ) {
                        $contatoCliente = new ClienteContato();
                        $contatoCliente->setEmail(strtolower($certificadoValidado['E-mail Titular']));
                        $contatoCliente->setTelefone($certificadoValidado['Telefone Titular']);
                        $contatoCliente->setClienteId($cliente->getId());
                        $contatoCliente->save();
                    }


                    $cliente->setEmailAc($certificadoValidado['E-mail Titular']);
                    $cliente->setTelefoneAc($certificadoValidado['Telefone Titular']);

                    $certificado->setCliente($cliente);

                    $certificado->setDataValidacao($dataAvp->format('Y-m-d H:i:s'));

                    $certificado->setDataSincronizacaoAc(date('Y-m-d H:i:s'));

                    /*
                     * AINDA SE O AGENTE FOR ENCONTRADO INFORMA VALIDACAO PARA O MESMO
                     * */
                    if ($agr) {
                        $certificado->setLocalId($agr->getLocalId());
                        $certificado->setUsuarioValidouId($agr->getId());
                    }

                    /*
                     * TEMOS 3 POESSIBILIDADES DE STATUS:
                     * EMITIDO | APROVADO
                     * PENDENTE
                     * REVOGADO
                     * */
                    if ($certificadoValidado['Status'] == 'EMITIDO' || $certificadoValidado['Status'] == 'APROVADO') {
                        $certificado->setConfirmacaoValidacao(1);

                        $cSit = new Criteria();
                        $cSit->add(SituacaoPeer::SIGLA, 'val');
                        $certSit = new CertificadoSituacao();
                        $certSit->setCertificadoId($certificado->getId());
                        $certSit->setSituacao(SituacaoPeer::doSelectOne($cSit));
                        $certSit->setComentario(
                            "Conciliação de certificados validados. Parabéns este certificado foi APROVADO. ".$certificado->getProtocolo()
                        );
                        $certSit->setData(date('Y-m-d H:i:s'));
                        $certSit->setUsuarioId($usuarioLogado->getId());

                    } elseif ($certificadoValidado['Status'] == 'PENDENTE') {
                        $certificado->setConfirmacaoValidacao(2);

                        $cSit = new Criteria();
                        $cSit->add(SituacaoPeer::SIGLA, 'pen');
                        $certSit = new CertificadoSituacao();
                        $certSit->setCertificadoId($certificado->getId());
                        $certSit->setSituacao(SituacaoPeer::doSelectOne($cSit));
                        $certSit->setComentario(
                            "Conciliação de certificados validados. Fique atento este certificado foi aprovado com PENDÊNCIA. ".
                            $certificado->getProtocolo()

                        );
                        $certSit->setData(date('Y-m-d H:i:s'));
                        $certSit->setUsuarioId($usuarioLogado->getId());
                    } elseif ($certificadoValidado['Status'] == 'REVOGADO') {
                        /*
                         * CHAMA A FUNCAO DE REVOGACAO DE CERTIFICADO E PASSA O SEGUNDO PARAMETRO COMO FALSE
                         * PARA NAO PRINTAR UM ECHO NA TELA
                         * */
                        //revogarCertificado($certificado->getId(), false);
                        $certificado->setConfirmacaoValidacao(4);
                        if ($certificadoValidado['DtRevogacao']) {
                            $dataRevogacao = explode('/',substr($certificadoValidado['DtRevogacao'],0, 10));
                            if (substr($certificadoValidado['DtFimValidade'],10))
                                $hora = substr($certificadoValidado['DtFimValidade'],10);
                            else
                                $hora = '00:00:00';

                            $dataRevogacao = new DateTime($dataRevogacao[2].'-'.$dataRevogacao[1].'-'.$dataRevogacao[0] . ' ' . $hora);
                            $certificado->setDataRevogacao($dataRevogacao->format('Y-m-d H:i:s'));
                        }

                        $cSit = new Criteria();
                        $cSit->add(SituacaoPeer::SIGLA, 'rev');
                        $certSit = new CertificadoSituacao();
                        $certSit->setCertificadoId($certificado->getId());
                        $certSit->setSituacao(SituacaoPeer::doSelectOne($cSit));
                        $certSit->setComentario("Conciliação de certificados validados. Infelizmente este certificado foi revogado. 
                            Reagende com o cliente o quanto antes para emitir um novo. ".$certificado->getProtocolo() . '. motivo da revogação: ' .
                            utf8_decode($certificadoValidado['observacao'])
                        );
                        $certSit->setData(date('Y-m-d H:i:s'));
                        $certSit->setUsuarioId($usuarioLogado->getId());

                    }

                    if (!$certificado->validate()) {
                        $mensagemErro = '';
                        foreach ($certificado->getValidationFailures() as $falha)
                            $mensagemErro .= $falha->getMessage() . '<br/>';

                    } else {
                        $certificadosImportados[] = array(
                            'Id'=>$certificado->getId(),
                            'Protocolo'=>$certificado->getProtocolo(),
                            'Dt. Validacao'=>$certificado->getDataValidacao('d/m/Y H:i:s'),
                            'Agr'=>utf8_encode($certificadoValidado['AVP']),
                            'Cliente'=>utf8_encode($certificadoValidado['Nome']),
                            'Status'=>utf8_encode($certificadoValidado['Status']),
                            utf8_encode('Dt. Início.')=>$certificado->getDataInicioValidade('d/m/Y H:i:s'),
                        );
                        $certificado->save();
                        $cliente->save();
//var_dump($quantidadeTotalImportada, $certificadoValidado['Status']);
                        $certSit->save();

                        $quantidadeTotalImportada += 1;
                    }
                } /* FIM DO SE JA SINCRONIZOU ANTERIORMENTE*/
            } /* FIM DO SE ENCONTROU O CERTIFICADO */
        } /* FIM DO FOREACH */
        /*}*/



        $con->commit();

        $colunasCertificados = array(
            array('nome'=>'Id'),array('nome'=>'Protocolo'),array('nome'=>'Dt. Validacao'),array('nome'=>'Agr'),
            array('nome'=>'Cliente'),array('nome'=>utf8_encode('Dt. Início.')), array('nome'=>'Status')
        );

        $colunasCertificadosNaoImportados = array(
            array('nome'=>' '),array('nome'=>'Protocolo'),array('nome'=>'Dt. Validacao'),array('nome'=>'Agr'),
            array('nome'=>'Cliente'), array('nome'=>'Status'), array('nome'=>'Documento')
        );

        //var_dump($colunasCertificadosNaoImportados, $certificadosNaoImportados);
        echo json_encode(array('mensagem'=>'Ok',
                'certificadosImportados'=>json_encode($certificadosImportados),
                'certificadosNaoImportados'=>json_encode($certificadosNaoImportados),
                'colunasCertificadosNaoImportados'=> json_encode($colunasCertificadosNaoImportados),
                'colunasCertificados'=>json_encode($colunasCertificados),
                'quantidadeTotalImportada'=>$quantidadeTotalImportada,
                'periodoDe'=>$periodoDe->format('d-m-Y'),
                'periodoAte'=>$periodoAte->format('d-m-Y'),
            )
        );

    } catch (Exception $e) {
        $con->rollBack();
        echo $e->getMessage();
    }

}

function importarCertificadosValidados() {
    try {
        ini_set('memory_limit', '256M');
        set_time_limit(180);
        $usuarioLogado = ControleAcesso::getUsuarioLogado();
        if ($_SESSION['arrayCertificadosValidados'])
            $certificadosValidados = unserialize($_SESSION['arrayCertificadosValidados']);

        $usuariosCpfs = array();
        $certificadosProtocolos = array();

        foreach ($certificadosValidados as $certificadoValidado ) {
            $usuariosCpfs[] = formatarCPF_CNPJ($certificadoValidado['CPFAVP']);
            $certificadosProtocolos[] = $certificadoValidado['Protocolo'];
        }

        /*
         * BUSCA TODOS OS USUARIOS QUE VALIDARAM CERTIFICADOS E COLOCA EM UM ARRAY
         * */
        $cUsuario = new Criteria();
        $cUsuario->add(UsuarioPeer::CPF, $usuariosCpfs , Criteria::IN);
        $usuariosObj = UsuarioPeer::doSelect($cUsuario);

        /*
         * BUSCA TODOS OS CERTIFICADOS VALIDADOS E COLOCA EM UM ARRAY
         * */

        $cCert = new Criteria();
        $cCert->add(CertificadoPeer::PROTOCOLO, $certificadosProtocolos, Criteria::IN);
        $cCert->addDescendingOrderByColumn(CertificadoPeer::ID);
        $certificadosObj = CertificadoPeer::doSelect($cCert);

        $certificadosImportados = array();
        $certificadosNaoImportados = array();

        $periodoDe = new DateTime('2050-01-01 00:00:00');
        $periodoAte = new DateTime('2000-01-01 00:00:00');

        $quantidadeTotalImportada = 0;
        $iNaoImportado = 0;
        $con = Propel::getConnection(CertificadoPeer::DATABASE_NAME);
        $con->beginTransaction();

        foreach ($certificadosValidados as $certificadoValidado) {
            $dataAvp = explode('/',substr($certificadoValidado['DtInclusao'],0, 10));
            if (substr($certificadoValidado['DtInclusao'],10))
                $hora = substr($certificadoValidado['DtInclusao'],10);
            else
                $hora = '00:00:00';

            $dataAvp = new DateTime($dataAvp[2].'-'.$dataAvp[1].'-'.$dataAvp[0] . ' ' . $hora);

            /*
             * PEGA A MENOR DATA DE VALIDACAO E A MAIOR PARA INFORMAR NA IMPORTACAO
             * */
            if ( $periodoDe>$dataAvp )
                $periodoDe = $dataAvp;
            if ( $periodoAte<$dataAvp )
                $periodoAte = $dataAvp;

            $agr = '';
            /*BUSCA O USUARIO AGR QUE VALIDOU O CERTIFICADO*/
            foreach ($usuariosObj as $usuarioObj) {

                if (strval($certificadoValidado['CPFAVP']) == removeTracoPontoBarra($usuarioObj->getCpf())) {
                    $agr = clone $usuarioObj;
                }
            }

            $certificado = '';
            /*BUSCA O CERTIFICADO NO SISTEMA*/
            foreach ($certificadosObj as $certificadoObj) {
                if ($certificadoValidado['Protocolo'] == intval($certificadoObj->getProtocolo())) {
                    $certificado = clone $certificadoObj;
                }
            }
            /*
             * CASO O PROTOCOLO A SER IMPORTADO NAO SEJA ENCONTRADO OU NA BASE DE CERTIFICADOS OU NA BASE DE USUARIOS
             * ALERTAR PARA ENTENDERMOS O PROBLEMA E CORRIGIR ALEM DE JOGAR NA TABELA DE CERTIFICADOS VALIDADOS FORA DO SISTEMA
             * */
            if ( !$certificado) {

                $certificadosNaoImportados[] = array(
                    ' '=>++$iNaoImportado,
                    'Protocolo'=>$certificadoValidado['Protocolo'],
                    'Dt. Validacao'=>$certificadoValidado['DtInclusao'],
                    'Agr'=>utf8_encode($certificadoValidado['AVP']),
                    'Cliente'=>utf8_encode($certificadoValidado['Nome']),
                    'Status'=>utf8_encode($certificadoValidado['Status']),
                    'Documento'=>utf8_encode($certificadoValidado['Documento']),

                );

                $cCertificadoForaDoSistema = new Criteria();
                $cCertificadoForaDoSistema->add(CertificadoForaSistemaPeer::PROTOCOLO, $certificadoValidado['Protocolo']);
                $certificadoForaDoSistema = CertificadoForaSistemaPeer::doSelectOne($cCertificadoForaDoSistema);

                if (!$certificadoForaDoSistema)
                    $certificadoForaDoSistema = new CertificadoForaSistema();

                $certificadoForaDoSistema->setProtocolo($certificadoValidado['Protocolo']);
                $certificadoForaDoSistema->setDocumento($certificadoValidado['Documento']);
                $certificadoForaDoSistema->setRazao($certificadoValidado['Nome']);
                $certificadoForaDoSistema->setStatus($certificadoValidado['Status']);
                $certificadoForaDoSistema->setProduto($certificadoValidado['Produto']);
                $certificadoForaDoSistema->setLocal($certificadoValidado['NomePosto']);
                $certificadoForaDoSistema->setAr($certificadoValidado['AVP']);
                $certificadoForaDoSistema->setDataValidacao($dataAvp->format('Y-m-d H:i:s'));
                $certificadoForaDoSistema->setDataImportacao(date('Y-m-d H:i:s'));
                $certificadoForaDoSistema->setDataMesReferente(date('m'));
                $certificadoForaDoSistema->setSituacao(0);
                $certificadoForaDoSistema->setCpfAr($certificadoValidado['CPFAVP']);
                if ($certificadoValidado['E-mail Titular'])
                    $certificadoForaDoSistema->setEmailCliente($certificadoValidado['E-mail Titular']);
                if ($certificadoValidado['Telefone Titular'])
                    $certificadoForaDoSistema->setTelefoneCliente($certificadoValidado['Telefone Titular']);
                $certificadoForaDoSistema->save();

            }

            /*
             * SE ENCONTROU O AGENTE DE REGISTRO E O CERTIFICADO INFORMADOS NO RELATORIO
             * */
            if ($certificado ) {

                /*
                 * BUSCA PELA DATA DE INICIO DE VALIDADE E PELA DATA DE FIM DA VALIDADE
                 * SE NAO ENCONTRAR CONSIDERA O AVP COMO DATA DE INICIO DA VALIDADE E QUANDO IMPORTAR NOVAMENTE
                 * TROCA PARA A DATA CORRETA
                 * */
                if ($certificadoValidado['DtInicioValidade'] && $certificadoValidado['DtFimValidade']) {
                    $dataInicioValidade = explode('/', substr($certificadoValidado['DtInicioValidade'], 0, 10));
                    if (substr($certificadoValidado['DtInicioValidade'], 10))
                        $hora = substr($certificadoValidado['DtInicioValidade'], 10);
                    else
                        $hora = '00:00:00';
                    $dataInicioValidade = new DateTime($dataInicioValidade[2] . '-' . $dataInicioValidade[1] . '-' . $dataInicioValidade[0] . ' ' . $hora);


                    $dataFimValidade = explode('/', substr($certificadoValidado['DtFimValidade'], 0, 10));
                    if (substr($certificadoValidado['DtFimValidade'], 10))
                        $hora = substr($certificadoValidado['DtFimValidade'], 10);
                    else
                        $hora = '00:00:00';
                    $dataFimValidade = new DateTime($dataFimValidade[2] . '-' . $dataFimValidade[1] . '-' . $dataFimValidade[0] . ' ' . $hora);

                    $certificado->setDataInicioValidade($dataInicioValidade->format('Y-m-d H:i:s'));
                    $certificado->setDataFimValidade($dataFimValidade->format('Y-m-d H:i:s'));
                }/*
                 * SE NAO HOUVER DATA DE INICIO E FIM DE FALIDADE CONSIDERA O AVP COMO DATA DE INICIO
                 * SOMA QUANTIDADE DE ANOS DA VALIDADE DO CD E INSERE NO BANCO A INFORMACAO
                 * */
                else {
                    if ($certificadoValidado['Validade'] != 'REVOGADO') {
                        $certificado->setDataInicioValidade($dataAvp->format('Y-m-d H:i:s'));

                        $dataInicioValidade = $dataAvp;

                        /*
                         * PEGA A VALIDADE PARA SOMAR NA DATA FINAL
                         *  */
                        $validade = substr($certificadoValidado['Validade'], 0, 1);
                        $dataFimValidadeRevogado = new DateTime($dataAvp->format('Y-m-d H:i:s'));
                        $dataFimValidadeRevogado->add(new DateInterval('P'.$validade.'Y'));
                        $certificado->setDataFimValidade($dataFimValidadeRevogado->format('Y-m-d H:i:s'));
                    }
                }

                if ($certificado->getConfirmacaoValidacao() == 1)
                    $statusAnterior = 'EMITIDO';
                elseif ($certificado->getConfirmacaoValidacao() == 2)
                    $statusAnterior = 'PENDENTE';
                if ($certificado->getConfirmacaoValidacao() == 4)
                    $statusAnterior = 'REVOGADO';


                /*
                 * SO ATUALIZA NO BANCO SE
                 * SE NAO HOUVE DATA DE SINCRONIZACAO OU
                 * SE O STATUS ANTERIOR FOR DIFERENTE DO RELATORIO OU
                 * SE A DATA DE VALIDACAO FOR DIREFENTE DO RELATORIO OU
                 * SE A DATA DE INICIO DA VALIDADE FOR DIFENTE NESTE CASO QUANDO IMPORTADO PELA PRIMEIRA VEZ PODE TER CONSIDERADO A DATA DE INICIO = DATA AVP
                 * */

                /*                if ((!$certificado->getDataSincronizacaoAc())  ||
                                    ($statusAnterior != $certificadoValidado['Status']) ||
                                    ($certificado->getDataValidacao('d/m/Y') != $dataAvp->format('d/m/Y')) ||
                                    ($certificado->getDataInicioValidade('d/m/Y') != $dataInicioValidade->format('d/m/Y')) ||
                                    ($certificadoValidado['E-mail Titular']!='' && strtolower(trim($certificado->getCliente()->getEmailAc())) != strtolower(trim($certificadoValidado['E-mail Titular']))) ||
                                    ($certificadoValidado['Telefone Titular']!='' && $certificado->getCliente()->getTelefoneAc() != $certificadoValidado['Telefone Titular'])) {
                                var_dump($certificado->getProtocolo(), $certificado->getCliente()->getTelefoneAc() , $certificadoValidado['Telefone Titular'],strtolower(trim($certificado->getCliente()->getEmailAc())),strtolower(trim($certificadoValidado['E-mail Titular'])),  $certificado->getId(), $certificado->getClienteId(), (!$certificado->getDataSincronizacaoAc())  ,
                                    ($statusAnterior != $certificadoValidado['Status']) ,
                                    ($certificado->getDataValidacao('d/m/Y') != $dataAvp->format('d/m/Y')) ,
                                    ($certificado->getDataInicioValidade('d/m/Y') != $dataInicioValidade->format('d/m/Y')) ,
                                    ($certificadoValidado['E-mail Titular']!='' && $certificado->getCliente()->getEmailAc() != $certificadoValidado['E-mail Titular']) ,
                                    ($certificadoValidado['Telefone Titular']!='' && $certificado->getCliente()->getTelefoneAc() != $certificadoValidado['Telefone Titular']));
                                    var_dump($statusAnterior , $certificadoValidado['Status']);

                                }*/

                if (
                    (!$certificado->getDataSincronizacaoAc())  ||
                    ($statusAnterior != $certificadoValidado['Status']) ||
                    ($certificado->getDataValidacao('d/m/Y') != $dataAvp->format('d/m/Y')) ||
                    ($certificado->getDataInicioValidade('d/m/Y') != $dataInicioValidade->format('d/m/Y')) ||
                    ($certificadoValidado['E-mail Titular']!='' && strtolower(trim($certificado->getCliente()->getEmailAc())) != strtolower(trim($certificadoValidado['E-mail Titular']))) ||
                    ($certificadoValidado['Telefone Titular']!='' && $certificado->getCliente()->getTelefoneAc() != $certificadoValidado['Telefone Titular']) ||
                    (($agr) && ($certificado->getUsuarioValidouId() != $agr->getId()))

                )
                {

                    /*                    var_dump($certificado->getProtocolo(),( !$certificado->getDataSincronizacaoAc())  ,
                                            ($statusAnterior != $certificadoValidado['Status']) ,
                                            ($certificado->getDataValidacao('d/m/Y') != $dataAvp->format('d/m/Y')) ,
                                            ($certificado->getDataInicioValidade('d/m/Y') != $dataInicioValidade->format('d/m/Y')));

                                        var_dump($certificado->getDataSincronizacaoAc() ,
                                            $statusAnterior,$certificadoValidado['Status'] ,
                                            $certificado->getDataValidacao('d/m/Y'), $dataAvp->format('d/m/Y') ,
                                            $certificado->getDataInicioValidade('d/m/Y') , $dataInicioValidade->format('d/m/Y'));*/

                    $cliente = $certificado->getCliente();
                    $cContatosCliente = new Criteria();
                    $cContatosCliente->add(ClienteContatoPeer::SITUACAO, 0);
                    $cContatosCliente->add(ClienteContatoPeer::CLIENTE_ID, $cliente->getId());
                    $cContatosCliente->add(ClienteContatoPeer::TELEFONE, $certificadoValidado['Telefone Titular']);
                    $cContatosCliente->add(ClienteContatoPeer::EMAIL, $certificadoValidado['E-mail Titular']);
                    $contatosCliente = ClienteContatoPeer::doSelect($cContatosCliente);

                    /*
                     * SE NAO TEM O CONTATO ENCONTRADO NA BASE DA AC, CRIA UM NOVO, E ATUALIZA O CADASTRO DE CLIENTE
                     * */
                    if (count($contatosCliente) == 0 ) {
                        $contatoCliente = new ClienteContato();
                        $contatoCliente->setEmail(strtolower($certificadoValidado['E-mail Titular']));
                        $contatoCliente->setTelefone($certificadoValidado['Telefone Titular']);
                        $contatoCliente->setClienteId($cliente->getId());
                        $contatoCliente->save();
                    }


                    $cliente->setEmailAc($certificadoValidado['E-mail Titular']);
                    $cliente->setTelefoneAc($certificadoValidado['Telefone Titular']);

                    $certificado->setCliente($cliente);

                    $certificado->setDataValidacao($dataAvp->format('Y-m-d H:i:s'));

                    /*
                     * IMPORTACAO TEMPORARIA APAGAR O CODIGO EM SEGUIDA
                    $certificado->setDataCompra($dataAvp->format('Y-m-d H:i:s'));
                    $certificado->setDataPagamento($dataAvp->format('Y-m-d H:i:s'));
                    $certificado->setDataConfirmacaoPagamento($dataAvp->format('Y-m-d H:i:s'));
                     * IMPORTACAO TEMPORARIA APAGAR O CODIGO EM SEGUIDA
                     * */


                    $certificado->setDataSincronizacaoAc(date('Y-m-d H:i:s'));

                    /*
                     * AINDA SE O AGENTE FOR ENCONTRADO INFORMA VALIDACAO PARA O MESMO
                     * */
                    if ($agr) {
                        $certificado->setLocalId($agr->getLocalId());
                        $certificado->setUsuarioValidouId($agr->getId());
                    }

                    /*
                     * TEMOS 3 POESSIBILIDADES DE STATUS:
                     * EMITIDO | APROVADO
                     * PENDENTE
                     * REVOGADO
                     * */
                    if ($certificadoValidado['Status'] == 'EMITIDO' || $certificadoValidado['Status'] == 'APROVADO') {
                        $certificado->setConfirmacaoValidacao(1);

                        $cSit = new Criteria();
                        $cSit->add(SituacaoPeer::SIGLA, 'val');
                        $certSit = new CertificadoSituacao();
                        $certSit->setCertificadoId($certificado->getId());
                        $certSit->setSituacao(SituacaoPeer::doSelectOne($cSit));
                        $certSit->setComentario(
                            "Conciliação de certificados validados. Parabéns este certificado foi APROVADO. ".$certificado->getProtocolo()
                        );
                        $certSit->setData(date('Y-m-d H:i:s'));
                        $certSit->setUsuarioId($usuarioLogado->getId());

                    } elseif ($certificadoValidado['Status'] == 'PENDENTE') {
                        $certificado->setConfirmacaoValidacao(2);

                        $cSit = new Criteria();
                        $cSit->add(SituacaoPeer::SIGLA, 'pen');
                        $certSit = new CertificadoSituacao();
                        $certSit->setCertificadoId($certificado->getId());
                        $certSit->setSituacao(SituacaoPeer::doSelectOne($cSit));
                        $certSit->setComentario(
                            "Conciliação de certificados validados. Fique atento este certificado foi aprovado com PENDÊNCIA. ".
                            $certificado->getProtocolo()

                        );
                        $certSit->setData(date('Y-m-d H:i:s'));
                        $certSit->setUsuarioId($usuarioLogado->getId());
                    } elseif ($certificadoValidado['Status'] == 'REVOGADO') {
                        /*
                         * CHAMA A FUNCAO DE REVOGACAO DE CERTIFICADO E PASSA O SEGUNDO PARAMETRO COMO FALSE
                         * PARA NAO PRINTAR UM ECHO NA TELA
                         * */
                        //revogarCertificado($certificado->getId(), false);
                        $certificado->setConfirmacaoValidacao(4);
                        if ($certificadoValidado['DtRevogacao']) {
                            $dataRevogacao = explode('/',substr($certificadoValidado['DtRevogacao'],0, 10));
                            if (substr($certificadoValidado['DtFimValidade'],10))
                                $hora = substr($certificadoValidado['DtFimValidade'],10);
                            else
                                $hora = '00:00:00';

                            $dataRevogacao = new DateTime($dataRevogacao[2].'-'.$dataRevogacao[1].'-'.$dataRevogacao[0] . ' ' . $hora);
                            $certificado->setDataRevogacao($dataRevogacao->format('Y-m-d H:i:s'));
                        }

                        $cSit = new Criteria();
                        $cSit->add(SituacaoPeer::SIGLA, 'rev');
                        $certSit = new CertificadoSituacao();
                        $certSit->setCertificadoId($certificado->getId());
                        $certSit->setSituacao(SituacaoPeer::doSelectOne($cSit));
                        $certSit->setComentario("Conciliação de certificados validados. Infelizmente este certificado foi revogado. 
                            Reagende com o cliente o quanto antes para emitir um novo. ".$certificado->getProtocolo() . '. motivo da revogação: ' .
                            utf8_decode($certificadoValidado['observacao'])
                        );
                        $certSit->setData(date('Y-m-d H:i:s'));
                        $certSit->setUsuarioId($usuarioLogado->getId());

                    }

                    if (!$certificado->validate()) {
                        $mensagemErro = '';
                        foreach ($certificado->getValidationFailures() as $falha)
                            $mensagemErro .= $falha->getMessage() . '<br/>';

                    } else {
                        $certificadosImportados[] = array(
                            'Id'=>$certificado->getId(),
                            'Protocolo'=>$certificado->getProtocolo(),
                            'Dt. Validacao'=>$certificado->getDataValidacao('d/m/Y H:i:s'),
                            'Agr'=>utf8_encode($certificadoValidado['AVP']),
                            'Cliente'=>utf8_encode($certificadoValidado['Nome']),
                            'Status'=>utf8_encode($certificadoValidado['Status']),
                            utf8_encode('Dt. Início.')=>$certificado->getDataInicioValidade('d/m/Y H:i:s'),
                        );
                        $certificado->save();
                        $cliente->save();
//var_dump($quantidadeTotalImportada, $certificadoValidado['Status']);
                        $certSit->save();

                        $quantidadeTotalImportada += 1;
                    }
                } /* FIM DO SE JA SINCRONIZOU ANTERIORMENTE*/
            } /* FIM DO SE ENCONTROU O CERTIFICADO */
        } /* FIM DO FOREACH */
        /*}*/



        $con->commit();

        $colunasCertificados = array(
            array('nome'=>'Id'),array('nome'=>'Protocolo'),array('nome'=>'Dt. Validacao'),array('nome'=>'Agr'),
            array('nome'=>'Cliente'),array('nome'=>utf8_encode('Dt. Início.')), array('nome'=>'Status')
        );

        $colunasCertificadosNaoImportados = array(
            array('nome'=>' '),array('nome'=>'Protocolo'),array('nome'=>'Dt. Validacao'),array('nome'=>'Agr'),
            array('nome'=>'Cliente'), array('nome'=>'Status'), array('nome'=>'Documento')
        );

        //var_dump($colunasCertificadosNaoImportados, $certificadosNaoImportados);
        echo json_encode(array('mensagem'=>'Ok',
                'certificadosImportados'=>json_encode($certificadosImportados),
                'certificadosNaoImportados'=>json_encode($certificadosNaoImportados),
                'colunasCertificadosNaoImportados'=> json_encode($colunasCertificadosNaoImportados),
                'colunasCertificados'=>json_encode($colunasCertificados),
                'quantidadeTotalImportada'=>$quantidadeTotalImportada,
                'periodoDe'=>$periodoDe->format('d-m-Y'),
                'periodoAte'=>$periodoAte->format('d-m-Y'),
            )
        );

    } catch (Exception $e) {
        $con->rollBack();
        echo $e->getMessage();
    }

}

function importarBaixaPagamentoStone() {
    try {
        ini_set('memory_limit', '256M');
        set_time_limit(180);
        $usuarioLogado = ControleAcesso::getUsuarioLogado();
        if ($_SESSION['arrayCertificadosValidados'])
            $certificadosValidados = unserialize($_SESSION['arrayCertificadosValidados']);

        $usuariosCpfs = array();
        $certificadosProtocolos = array();

        foreach ($certificadosValidados as $certificadoValidado ) {
            $usuariosCpfs[] = formatarCPF_CNPJ($certificadoValidado['CPFAVP']);
            $certificadosProtocolos[] = $certificadoValidado['Protocolo'];
        }

        /*
         * BUSCA TODOS OS USUARIOS QUE VALIDARAM CERTIFICADOS E COLOCA EM UM ARRAY
         * */
        $cUsuario = new Criteria();
        $cUsuario->add(UsuarioPeer::CPF, $usuariosCpfs , Criteria::IN);
        $usuariosObj = UsuarioPeer::doSelect($cUsuario);

        /*
         * BUSCA TODOS OS CERTIFICADOS VALIDADOS E COLOCA EM UM ARRAY
         * */

        $cCert = new Criteria();
        $cCert->add(CertificadoPeer::PROTOCOLO, $certificadosProtocolos, Criteria::IN);
        $cCert->addDescendingOrderByColumn(CertificadoPeer::ID);
        $certificadosObj = CertificadoPeer::doSelect($cCert);

        $certificadosImportados = array();
        $certificadosNaoImportados = array();

        $periodoDe = new DateTime('2050-01-01 00:00:00');
        $periodoAte = new DateTime('2000-01-01 00:00:00');

        $quantidadeTotalImportada = 0;
        $iNaoImportado = 0;
        $con = Propel::getConnection(CertificadoPeer::DATABASE_NAME);
        $con->beginTransaction();

        foreach ($certificadosValidados as $certificadoValidado) {
            $dataAvp = explode('/',substr($certificadoValidado['DtInclusao'],0, 10));
            if (substr($certificadoValidado['DtInclusao'],10))
                $hora = substr($certificadoValidado['DtInclusao'],10);
            else
                $hora = '00:00:00';

            $dataAvp = new DateTime($dataAvp[2].'-'.$dataAvp[1].'-'.$dataAvp[0] . ' ' . $hora);

            /*
             * PEGA A MENOR DATA DE VALIDACAO E A MAIOR PARA INFORMAR NA IMPORTACAO
             * */
            if ( $periodoDe>$dataAvp )
                $periodoDe = $dataAvp;
            if ( $periodoAte<$dataAvp )
                $periodoAte = $dataAvp;

            $agr = '';
            /*BUSCA O USUARIO AGR QUE VALIDOU O CERTIFICADO*/
            foreach ($usuariosObj as $usuarioObj) {

                if (strval($certificadoValidado['CPFAVP']) == removeTracoPontoBarra($usuarioObj->getCpf())) {
                    $agr = clone $usuarioObj;
                }
            }

            $certificado = '';
            /*BUSCA O CERTIFICADO NO SISTEMA*/
            foreach ($certificadosObj as $certificadoObj) {
                if ($certificadoValidado['Protocolo'] == intval($certificadoObj->getProtocolo())) {
                    $certificado = clone $certificadoObj;
                }
            }
            /*
             * CASO O PROTOCOLO A SER IMPORTADO NAO SEJA ENCONTRADO OU NA BASE DE CERTIFICADOS OU NA BASE DE USUARIOS
             * ALERTAR PARA ENTENDERMOS O PROBLEMA E CORRIGIR ALEM DE JOGAR NA TABELA DE CERTIFICADOS VALIDADOS FORA DO SISTEMA
             * */
            if ( !$certificado) {

                $certificadosNaoImportados[] = array(
                    ' '=>++$iNaoImportado,
                    'Protocolo'=>$certificadoValidado['Protocolo'],
                    'Dt. Validacao'=>$certificadoValidado['DtInclusao'],
                    'Agr'=>utf8_encode($certificadoValidado['AVP']),
                    'Cliente'=>utf8_encode($certificadoValidado['Nome']),
                    'Status'=>utf8_encode($certificadoValidado['Status']),
                    'Documento'=>utf8_encode($certificadoValidado['Documento']),

                );

                $cCertificadoForaDoSistema = new Criteria();
                $cCertificadoForaDoSistema->add(CertificadoForaSistemaPeer::PROTOCOLO, $certificadoValidado['Protocolo']);
                $certificadoForaDoSistema = CertificadoForaSistemaPeer::doSelectOne($cCertificadoForaDoSistema);

                if (!$certificadoForaDoSistema)
                    $certificadoForaDoSistema = new CertificadoForaSistema();

                $certificadoForaDoSistema->setProtocolo($certificadoValidado['Protocolo']);
                $certificadoForaDoSistema->setDocumento($certificadoValidado['Documento']);
                $certificadoForaDoSistema->setRazao($certificadoValidado['Nome']);
                $certificadoForaDoSistema->setStatus($certificadoValidado['Status']);
                $certificadoForaDoSistema->setProduto($certificadoValidado['Produto']);
                $certificadoForaDoSistema->setLocal($certificadoValidado['NomePosto']);
                $certificadoForaDoSistema->setAr($certificadoValidado['AVP']);
                $certificadoForaDoSistema->setDataValidacao($dataAvp->format('Y-m-d H:i:s'));
                $certificadoForaDoSistema->setDataImportacao(date('Y-m-d H:i:s'));
                $certificadoForaDoSistema->setDataMesReferente(date('m'));
                $certificadoForaDoSistema->setSituacao(0);
                $certificadoForaDoSistema->setCpfAr($certificadoValidado['CPFAVP']);
                if ($certificadoValidado['E-mail Titular'])
                    $certificadoForaDoSistema->setEmailCliente($certificadoValidado['E-mail Titular']);
                if ($certificadoValidado['Telefone Titular'])
                    $certificadoForaDoSistema->setTelefoneCliente($certificadoValidado['Telefone Titular']);
                $certificadoForaDoSistema->save();

            }

            /*
             * SE ENCONTROU O AGENTE DE REGISTRO E O CERTIFICADO INFORMADOS NO RELATORIO
             * */
            if ($certificado ) {

                /*
                 * BUSCA PELA DATA DE INICIO DE VALIDADE E PELA DATA DE FIM DA VALIDADE
                 * SE NAO ENCONTRAR CONSIDERA O AVP COMO DATA DE INICIO DA VALIDADE E QUANDO IMPORTAR NOVAMENTE
                 * TROCA PARA A DATA CORRETA
                 * */
                if ($certificadoValidado['DtInicioValidade'] && $certificadoValidado['DtFimValidade']) {
                    $dataInicioValidade = explode('/', substr($certificadoValidado['DtInicioValidade'], 0, 10));
                    if (substr($certificadoValidado['DtInicioValidade'], 10))
                        $hora = substr($certificadoValidado['DtInicioValidade'], 10);
                    else
                        $hora = '00:00:00';
                    $dataInicioValidade = new DateTime($dataInicioValidade[2] . '-' . $dataInicioValidade[1] . '-' . $dataInicioValidade[0] . ' ' . $hora);


                    $dataFimValidade = explode('/', substr($certificadoValidado['DtFimValidade'], 0, 10));
                    if (substr($certificadoValidado['DtFimValidade'], 10))
                        $hora = substr($certificadoValidado['DtFimValidade'], 10);
                    else
                        $hora = '00:00:00';
                    $dataFimValidade = new DateTime($dataFimValidade[2] . '-' . $dataFimValidade[1] . '-' . $dataFimValidade[0] . ' ' . $hora);

                    $certificado->setDataInicioValidade($dataInicioValidade->format('Y-m-d H:i:s'));
                    $certificado->setDataFimValidade($dataFimValidade->format('Y-m-d H:i:s'));
                }/*
                 * SE NAO HOUVER DATA DE INICIO E FIM DE FALIDADE CONSIDERA O AVP COMO DATA DE INICIO
                 * SOMA QUANTIDADE DE ANOS DA VALIDADE DO CD E INSERE NO BANCO A INFORMACAO
                 * */
                else {
                    if ($certificadoValidado['Validade'] != 'REVOGADO') {
                        $certificado->setDataInicioValidade($dataAvp->format('Y-m-d H:i:s'));

                        $dataInicioValidade = $dataAvp;

                        /*
                         * PEGA A VALIDADE PARA SOMAR NA DATA FINAL
                         *  */
                        $validade = substr($certificadoValidado['Validade'], 0, 1);
                        $dataFimValidadeRevogado = new DateTime($dataAvp->format('Y-m-d H:i:s'));
                        $dataFimValidadeRevogado->add(new DateInterval('P'.$validade.'Y'));
                        $certificado->setDataFimValidade($dataFimValidadeRevogado->format('Y-m-d H:i:s'));
                    }
                }

                if ($certificado->getConfirmacaoValidacao() == 1)
                    $statusAnterior = 'EMITIDO';
				elseif ($certificado->getConfirmacaoValidacao() == 2)
                    $statusAnterior = 'PENDENTE';
                if ($certificado->getConfirmacaoValidacao() == 4)
                    $statusAnterior = 'REVOGADO';


                /*
                 * SO ATUALIZA NO BANCO SE
                 * SE NAO HOUVE DATA DE SINCRONIZACAO OU
                 * SE O STATUS ANTERIOR FOR DIFERENTE DO RELATORIO OU
                 * SE A DATA DE VALIDACAO FOR DIREFENTE DO RELATORIO OU
                 * SE A DATA DE INICIO DA VALIDADE FOR DIFENTE NESTE CASO QUANDO IMPORTADO PELA PRIMEIRA VEZ PODE TER CONSIDERADO A DATA DE INICIO = DATA AVP
                 * */

                /*                if ((!$certificado->getDataSincronizacaoAc())  ||
                                    ($statusAnterior != $certificadoValidado['Status']) ||
                                    ($certificado->getDataValidacao('d/m/Y') != $dataAvp->format('d/m/Y')) ||
                                    ($certificado->getDataInicioValidade('d/m/Y') != $dataInicioValidade->format('d/m/Y')) ||
                                    ($certificadoValidado['E-mail Titular']!='' && strtolower(trim($certificado->getCliente()->getEmailAc())) != strtolower(trim($certificadoValidado['E-mail Titular']))) ||
                                    ($certificadoValidado['Telefone Titular']!='' && $certificado->getCliente()->getTelefoneAc() != $certificadoValidado['Telefone Titular'])) {
                                var_dump($certificado->getProtocolo(), $certificado->getCliente()->getTelefoneAc() , $certificadoValidado['Telefone Titular'],strtolower(trim($certificado->getCliente()->getEmailAc())),strtolower(trim($certificadoValidado['E-mail Titular'])),  $certificado->getId(), $certificado->getClienteId(), (!$certificado->getDataSincronizacaoAc())  ,
                                    ($statusAnterior != $certificadoValidado['Status']) ,
                                    ($certificado->getDataValidacao('d/m/Y') != $dataAvp->format('d/m/Y')) ,
                                    ($certificado->getDataInicioValidade('d/m/Y') != $dataInicioValidade->format('d/m/Y')) ,
                                    ($certificadoValidado['E-mail Titular']!='' && $certificado->getCliente()->getEmailAc() != $certificadoValidado['E-mail Titular']) ,
                                    ($certificadoValidado['Telefone Titular']!='' && $certificado->getCliente()->getTelefoneAc() != $certificadoValidado['Telefone Titular']));
                                    var_dump($statusAnterior , $certificadoValidado['Status']);

                                }*/

                if (
                    (!$certificado->getDataSincronizacaoAc())  ||
                    ($statusAnterior != $certificadoValidado['Status']) ||
                    ($certificado->getDataValidacao('d/m/Y') != $dataAvp->format('d/m/Y')) ||
                    ($certificado->getDataInicioValidade('d/m/Y') != $dataInicioValidade->format('d/m/Y')) ||
                    ($certificadoValidado['E-mail Titular']!='' && strtolower(trim($certificado->getCliente()->getEmailAc())) != strtolower(trim($certificadoValidado['E-mail Titular']))) ||
                    ($certificadoValidado['Telefone Titular']!='' && $certificado->getCliente()->getTelefoneAc() != $certificadoValidado['Telefone Titular']) ||
                    (($agr) && ($certificado->getUsuarioValidouId() != $agr->getId()))

                )
                {

                    /*                    var_dump($certificado->getProtocolo(),( !$certificado->getDataSincronizacaoAc())  ,
                                            ($statusAnterior != $certificadoValidado['Status']) ,
                                            ($certificado->getDataValidacao('d/m/Y') != $dataAvp->format('d/m/Y')) ,
                                            ($certificado->getDataInicioValidade('d/m/Y') != $dataInicioValidade->format('d/m/Y')));

                                        var_dump($certificado->getDataSincronizacaoAc() ,
                                            $statusAnterior,$certificadoValidado['Status'] ,
                                            $certificado->getDataValidacao('d/m/Y'), $dataAvp->format('d/m/Y') ,
                                            $certificado->getDataInicioValidade('d/m/Y') , $dataInicioValidade->format('d/m/Y'));*/

                    $cliente = $certificado->getCliente();
                    $cContatosCliente = new Criteria();
                    $cContatosCliente->add(ClienteContatoPeer::SITUACAO, 0);
                    $cContatosCliente->add(ClienteContatoPeer::CLIENTE_ID, $cliente->getId());
                    $cContatosCliente->add(ClienteContatoPeer::TELEFONE, $certificadoValidado['Telefone Titular']);
                    $cContatosCliente->add(ClienteContatoPeer::EMAIL, $certificadoValidado['E-mail Titular']);
                    $contatosCliente = ClienteContatoPeer::doSelect($cContatosCliente);

                    /*
                     * SE NAO TEM O CONTATO ENCONTRADO NA BASE DA AC, CRIA UM NOVO, E ATUALIZA O CADASTRO DE CLIENTE
                     * */
                    if (count($contatosCliente) == 0 ) {
                        $contatoCliente = new ClienteContato();
                        $contatoCliente->setEmail(strtolower($certificadoValidado['E-mail Titular']));
                        $contatoCliente->setTelefone($certificadoValidado['Telefone Titular']);
                        $contatoCliente->setClienteId($cliente->getId());
                        $contatoCliente->save();
                    }


                    $cliente->setEmailAc($certificadoValidado['E-mail Titular']);
                    $cliente->setTelefoneAc($certificadoValidado['Telefone Titular']);

                    $certificado->setCliente($cliente);

                    $certificado->setDataValidacao($dataAvp->format('Y-m-d H:i:s'));

                    /*
                     * IMPORTACAO TEMPORARIA APAGAR O CODIGO EM SEGUIDA
                    $certificado->setDataCompra($dataAvp->format('Y-m-d H:i:s'));
                    $certificado->setDataPagamento($dataAvp->format('Y-m-d H:i:s'));
                    $certificado->setDataConfirmacaoPagamento($dataAvp->format('Y-m-d H:i:s'));
                     * IMPORTACAO TEMPORARIA APAGAR O CODIGO EM SEGUIDA
                     * */


                    $certificado->setDataSincronizacaoAc(date('Y-m-d H:i:s'));

                    /*
                     * AINDA SE O AGENTE FOR ENCONTRADO INFORMA VALIDACAO PARA O MESMO
                     * */
                    if ($agr) {
                        $certificado->setLocalId($agr->getLocalId());
                        $certificado->setUsuarioValidouId($agr->getId());
                    }

                    /*
                     * TEMOS 3 POESSIBILIDADES DE STATUS:
                     * EMITIDO | APROVADO
                     * PENDENTE
                     * REVOGADO
                     * */
                    if ($certificadoValidado['Status'] == 'EMITIDO' || $certificadoValidado['Status'] == 'APROVADO') {
                        $certificado->setConfirmacaoValidacao(1);

                        $cSit = new Criteria();
                        $cSit->add(SituacaoPeer::SIGLA, 'val');
                        $certSit = new CertificadoSituacao();
                        $certSit->setCertificadoId($certificado->getId());
                        $certSit->setSituacao(SituacaoPeer::doSelectOne($cSit));
                        $certSit->setComentario(
                            "Conciliação de certificados validados. Parabéns este certificado foi APROVADO. ".$certificado->getProtocolo()
                        );
                        $certSit->setData(date('Y-m-d H:i:s'));
                        $certSit->setUsuarioId($usuarioLogado->getId());

                    } elseif ($certificadoValidado['Status'] == 'PENDENTE') {
                        $certificado->setConfirmacaoValidacao(2);

                        $cSit = new Criteria();
                        $cSit->add(SituacaoPeer::SIGLA, 'pen');
                        $certSit = new CertificadoSituacao();
                        $certSit->setCertificadoId($certificado->getId());
                        $certSit->setSituacao(SituacaoPeer::doSelectOne($cSit));
                        $certSit->setComentario(
                            "Conciliação de certificados validados. Fique atento este certificado foi aprovado com PENDÊNCIA. ".
                            $certificado->getProtocolo()

                        );
                        $certSit->setData(date('Y-m-d H:i:s'));
                        $certSit->setUsuarioId($usuarioLogado->getId());
                    } elseif ($certificadoValidado['Status'] == 'REVOGADO') {
                        /*
                         * CHAMA A FUNCAO DE REVOGACAO DE CERTIFICADO E PASSA O SEGUNDO PARAMETRO COMO FALSE
                         * PARA NAO PRINTAR UM ECHO NA TELA
                         * */
                        //revogarCertificado($certificado->getId(), false);
                        $certificado->setConfirmacaoValidacao(4);
                        if ($certificadoValidado['DtRevogacao']) {
                            $dataRevogacao = explode('/',substr($certificadoValidado['DtRevogacao'],0, 10));
                            if (substr($certificadoValidado['DtFimValidade'],10))
                                $hora = substr($certificadoValidado['DtFimValidade'],10);
                            else
                                $hora = '00:00:00';

                            $dataRevogacao = new DateTime($dataRevogacao[2].'-'.$dataRevogacao[1].'-'.$dataRevogacao[0] . ' ' . $hora);
                            $certificado->setDataRevogacao($dataRevogacao->format('Y-m-d H:i:s'));
                        }

                        $cSit = new Criteria();
                        $cSit->add(SituacaoPeer::SIGLA, 'rev');
                        $certSit = new CertificadoSituacao();
                        $certSit->setCertificadoId($certificado->getId());
                        $certSit->setSituacao(SituacaoPeer::doSelectOne($cSit));
                        $certSit->setComentario("Conciliação de certificados validados. Infelizmente este certificado foi revogado. 
                            Reagende com o cliente o quanto antes para emitir um novo. ".$certificado->getProtocolo() . '. motivo da revogação: ' .
                            utf8_decode($certificadoValidado['observacao'])
                        );
                        $certSit->setData(date('Y-m-d H:i:s'));
                        $certSit->setUsuarioId($usuarioLogado->getId());

                    }

                    if (!$certificado->validate()) {
                        $mensagemErro = '';
                        foreach ($certificado->getValidationFailures() as $falha)
                            $mensagemErro .= $falha->getMessage() . '<br/>';

                    } else {
                        $certificadosImportados[] = array(
                            'Id'=>$certificado->getId(),
                            'Protocolo'=>$certificado->getProtocolo(),
                            'Dt. Validacao'=>$certificado->getDataValidacao('d/m/Y H:i:s'),
                            'Agr'=>utf8_encode($certificadoValidado['AVP']),
                            'Cliente'=>utf8_encode($certificadoValidado['Nome']),
                            'Status'=>utf8_encode($certificadoValidado['Status']),
                            utf8_encode('Dt. Início.')=>$certificado->getDataInicioValidade('d/m/Y H:i:s'),
                        );
                        $certificado->save();
                        $cliente->save();
//var_dump($quantidadeTotalImportada, $certificadoValidado['Status']);
                        $certSit->save();

                        $quantidadeTotalImportada += 1;
                    }
                } /* FIM DO SE JA SINCRONIZOU ANTERIORMENTE*/
            } /* FIM DO SE ENCONTROU O CERTIFICADO */
        } /* FIM DO FOREACH */
        /*}*/



        $con->commit();

        $colunasCertificados = array(
            array('nome'=>'Id'),array('nome'=>'Protocolo'),array('nome'=>'Dt. Validacao'),array('nome'=>'Agr'),
            array('nome'=>'Cliente'),array('nome'=>utf8_encode('Dt. Início.')), array('nome'=>'Status')
        );

        $colunasCertificadosNaoImportados = array(
            array('nome'=>' '),array('nome'=>'Protocolo'),array('nome'=>'Dt. Validacao'),array('nome'=>'Agr'),
            array('nome'=>'Cliente'), array('nome'=>'Status'), array('nome'=>'Documento')
        );

        //var_dump($colunasCertificadosNaoImportados, $certificadosNaoImportados);
        echo json_encode(array('mensagem'=>'Ok',
                'certificadosImportados'=>json_encode($certificadosImportados),
                'certificadosNaoImportados'=>json_encode($certificadosNaoImportados),
                'colunasCertificadosNaoImportados'=> json_encode($colunasCertificadosNaoImportados),
                'colunasCertificados'=>json_encode($colunasCertificados),
                'quantidadeTotalImportada'=>$quantidadeTotalImportada,
                'periodoDe'=>$periodoDe->format('d-m-Y'),
                'periodoAte'=>$periodoAte->format('d-m-Y'),
            )
        );

    } catch (Exception $e) {
        $con->rollBack();
        echo $e->getMessage();
    }

}

function registrarPagamentoCartaoCredito () {
    try {
        $con = Propel::getConnection();
        $con->beginTransaction();

        require_once($_SERVER['DOCUMENT_ROOT']."/inc/pagarme-php/Pagarme.php");
//        PagarMe::setApiKey("ak_live_snGWlbkg0GxidcKPpKfWyUojRPoaBC");
        //Pagarme::setApiKey("ak_test_sY6UfR8wCl8AmgWb7ra5MGoOLm54Ny");

        $usuarioLogado = ControleAcesso::getUsuarioLogado();
        $certificado = CertificadoPeer::retrieveByPK($_POST['idCertificado']);
        $cliente = $certificado->getCliente();

        if ($cliente->getRazaoSocial())
            $nome = $cliente->getRazaoSocial();
        elseif ($cliente->getNomeFantasia())
            $nome = $cliente->getNomeFantasia();
        elseif ($cliente->getResponsavel())
            $nome = $cliente->getResponsavel()->getNome();

        $res = $cliente->getResponsavel();
        if (!is_null($res))
            $emailRes = $res->getEmail();

        if ($cliente->getEmail() != '')
            $email = $cliente->getEmail();
        elseif ($emailRes != '')
            $email = $emailRes;
        else
            $email = $cliente->getEmailContato();


        $customer = new PagarMe_Customer(array(
            "document_number" => $_POST["numeroDocumento"],
            "name" => $_POST['card_holder_name'],
            "email" => $_POST["emailCliente"],
            "phone" =>  array(
                "ddi"=> "55",
                "ddd"=> $_POST["ddd_cartao"],
                "number"=> $_POST["telefone_cartao"],
            ),
            "address" => array(
                "street" => strtoupper(trim(removeEspeciais($_POST['endereco_cartao']))),
                "complementary" => strtoupper(trim(removeEspeciais($_POST['complemento_endereco_cartao']))),
                "street_number" => strtoupper(trim(removeEspeciais($_POST['numero_cartao']))),
                "city" => strtoupper(trim(removeEspeciais($_POST['cidade_cartao']))),
                "neighborhood" => strtoupper(trim(removeEspeciais($_POST['bairro_cartao']))),
                "state" => $_POST['uf_cartao'],
                "zipcode" => $_POST['cep_cartao'],
                "country" => "Brasil"
            ),
        ));

        $transaction = new PagarMe_Transaction(array(
            "amount" => $_POST['valorProduto']*100,
            "installments" => $_POST['qtdParcelas'],
            "soft_descriptor" => 'Serama Cert',
            'postback_url' => "http://www.dashboard.serama.com.br/retorno_transacao_cartao.php",
            "card_hash" => $_POST['card_hash'],
            "payment_method" => "credit_card",
            "customer" => $customer,
            "metadata" => array(
                "idCertificado" => $_POST['idCertificado'],
                "emailCliente"=>$_POST['emailCliente'],
                "emailConsultor"=>$usuarioLogado->getEmail(),
                "nomeProduto"=>$_POST['nomeProduto'],
            )
        ));

        $transaction->charge();

        $mensagemCartao = '';
        $mensagemErro = '';

        switch ($transaction->status) {
            case 'processing':

                    $certificadoPagamento = new CertificadoPagamento();
                    $certificadoPagamento->setCertificadoId($_POST['idCertificado']);
                    $certificadoPagamento->setCodigoPagamento($transaction->tid);
                    $certificadoPagamento->setQuantidadeParcelas($_POST['qtdParcelas']);

                    /*CARTAO DE CREDITO*/
                    $certificadoPagamento->setFormaPagamentoId($certificado->getFormaPagamentoId());

                    $itemPedido = $certificado->getItemPedidos();

                    $certificadoPagamento->setPedidoId($itemPedido[0]->getPedidoId());
                    $certificadoPagamento->setDataInclusao(date('Y-m-d H:i:s'));
                    $certificadoPagamento->setDataPagamento(date('Y-m-d H:i:s'));
                    $certificadoPagamento->setDataConfirmacaoPagamento(date('Y-m-d H:i:s'));
                    $certificadoPagamento->setValor($_POST['valorProduto']);
                    $certificadoPagamento->setCodigoPagamento($transaction->nsu);
                    $certificadoPagamento->setObservacao(
                        'nome no cartão: ' . $transaction->card_holder_name . '<br>' .
                        'tipo do cartão: ' . $transaction->card_brand . '<br>' .
                        'número do cartãoo: ' . $transaction->card_last_digits . '<br>' .
                        'e-mail cliente: ' . $_POST['emailCliente'] . '<br>'.
                        'qtd parcelas: ' . $_POST['qtdParcelas'] . '<br>'

                    );

                    $certificadoPagamento->save();


                    $mensagemCartao = 'O pagamento com este cart&aacute;o será processado em breve. Aguarde!';
                    $certSit = new CertificadoSituacao();
                    $certSit->setCertificadoId($certificado->getId());
                    $cSit = new Criteria();
                    $certSit->setUsuarioId($usuarioLogado->getId());
                    $cSit->add(SituacaoPeer::SIGLA, 'em_proc');
                    $certSit->setSituacao(SituacaoPeer::doSelectOne($cSit));
                    $certSit->setComentario('Pagamento via cartão de Crédito em processamento. '. $mensagemCartao);
                    $certSit->setData(date("Y-m-d H:i:s"));


                    $certSit->save();
                    $con->commit();


                break;
            case 'authorized':
                $mensagemCartao = 'Parab&eacute;ns, o pagamento com este cartão foi aprovado!';
                break;
            case 'paid':
                /*
                * BUSCA O CERTIFICADO DAQUELA TRANSACAO E O CONTAS A RECEBER E FAZ BAIXA AUTOMATICA DE TUDO
                * */
                $certificado = CertificadoPeer::retrieveByPK($_POST['idCertificado']);

                if (isset ($certificado)) {


                        if ($certificado) {
                            $cPagamento = new Criteria();
                            $cPagamento->add(CertificadoPagamentoPeer::CERTIFICADO_ID, $certificado->getId());
                            $certificadoPagamento = CertificadoPagamentoPeer::doSelectOne($cPagamento);

                            /*
                             * SE NAO ENCONTROU O COMPROVANTE DE PAGAMENTO DESTE CERTIFICADO JA CRIADO
                             * CRIA UM
                             * */
                            if (!$certificadoPagamento) {
                                $certificadoPagamento = new CertificadoPagamento();
                                $certificadoPagamento->setCertificadoId($_POST['idCertificado']);
                                $certificadoPagamento->setCodigoPagamento($transaction->nsu);

                                /*CARTAO DE CREDITO*/
                                $certificadoPagamento->setFormaPagamentoId($certificado->getFormaPagamentoId());

                                $itemPedido = $certificado->getItemPedidos();

                                $certificadoPagamento->setPedidoId($itemPedido[0]->getPedidoId());
                                $certificadoPagamento->setDataInclusao(date('Y-m-d H:i:s'));
                                $certificadoPagamento->setDataPagamento(date('Y-m-d H:i:s'));
                                $certificadoPagamento->setDataConfirmacaoPagamento(date('Y-m-d H:i:s'));
                                $certificadoPagamento->setValor($transaction['amount']/100);
                                $certificadoPagamento->setObservacao(utf8_decode(
                                    'nome no cart&atilde;o: ' . $transaction['card_holder_name'] . '<br>' .
                                    'tipo do cart&atilde;o:' . $transaction['card_brand'] . '<br>' .
                                    'n&uacute;mero do cart&atilde;o:' . $transaction['card_last_digits'] . '<br>' .
                                    'e-mail cliente:' . $transaction['metadata']['emailCliente'] . '<br>'
                                    )
                                );

                            }
                            /*CARTAO DE CREDITO*/

                            $certificadoPagamento->setDataPagamento(date('Y-m-d H:i:s'));
                            $certificadoPagamento->setDataConfirmacaoPagamento(date('Y-m-d H:i:s'));
                            $certificadoPagamento->save();

                            $cReceber = new Criteria();
                            $cReceber->add(ContasReceberPeer::CERTIFICADO_ID, $certificado->getId());
                            $contaReceber = ContasReceberPeer::doSelectOne($cReceber);
                            if ($contaReceber) {
                                $contaReceber->setDataPagamento(date('Y-m-d H:i:s'));
                                $contaReceber->setBancoId($_POST['banco']);
                                $contaReceber->setFormaPagamentoId($certificado->getFormaPagamentoId());
                                $contaReceber->setCodigoDocumento($_POST['codigoOperacao']);
                                $contaReceber->setObservacao(utf8_decode($_POST['observacao']));

                                $lancamentoConta = new LancamentoConta();
                                $lancamentoConta->setDataLancamento(date('Y-m-d H:i:s'));
                                $lancamentoConta->setDescricao('Baixa da conta: ' . $contaReceber->getDescricao());
                                $lancamentoConta->setObservacao('BAIXA DE PAGAMENTO PAGAR.ME CART&Atilde;O');
                                $lancamentoConta->setValor($certificado->getProduto()->getPreco() - $certificado->getDesconto());
                                $lancamentoConta->setTipo('C');
                                $lancamentoConta->setContaReceberId($contaReceber->getId());
                                $lancamentoConta->setContaBancariaId($_POST['banco']);

                                $certificado->setDataConfirmacaoPagamento(date('Y-m-d H:i:s'));
                                if ($certificado->getDataPagamento())
                                    $certificado->setDataPagamento(date('Y-m-d H:i:s'));

                                $certSit = new CertificadoSituacao();
                                $certSit->setCertificadoId($certificado->getId());
                                $cSit = new Criteria();
                                $certSit->setUsuarioId($usuarioLogado->getId());
                                $cSit->add(SituacaoPeer::SIGLA, 'conf_pag');
                                $certSit->setSituacao(SituacaoPeer::doSelectOne($cSit));
                                $certSit->setComentario('Pagamento via Cartão de Crédito. '. $mensagemCartao . $transaction['nsu']);
                                $certSit->setData(date("Y-m-d H:i:s"));
                            }

                            $certificado->save();
                            /*SALVA SITUACAO DE BAIXA DE PAGAMENTO*/
                            $certSit->save();

                            $contaReceber->save();
                            $lancamentoConta->save();
                            $con->commit();
                            $mensagemCartao = 'Parab&eacute;ns, o pagamento com este cartão foi aprovado!';

                        } else {
                            $con->rollBack();
                            $headers  = 'MIME-Version: 1.0' . "\r\n";
                            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                            $headers .= 'from:SAC Serama<financeiro@serama.com.br>' . "\r\n";

                            mail('correia.antonio@gruposerama.com.br, financeiro@serama.com.br', utf8_decode("Erro de conciliacao de Cartao de Credito"),utf8_decode('Nao conseguiu encontrar o certificado:' . $transaction['metadata']['idCertificado']), $headers);
                        }


                }

                break;
            case 'refunded':
                $mensagemCartao = 'Por algum motivo, o pagamento com este cartão será reembolsado para o cliente. Procure o financeiro para maiores informa&ccedil;&otilde;es!';
                break;
            case 'waiting_payment':
                $mensagemCartao = 'O pagamento com este cartão será processado em breve. Aguarde!';
                break;
            case 'pending_refund':
                $mensagemCartao = 'O pagamento com este cartão está aguardando para ser reembolsado. Procure o financeiro para maiores informa&ccedil;&otilde;es!';
                break;
            case 'refused':
                $mensagemCartao = 'Por algum motivo o pagamento com este cart&atilde;o foi recusado. Por favor, verifique com o cliente o motivo';
                break;

        }

        $mensagemMotivoRecusa = '';
        switch ($transaction->status_reason) {
            case 'acquirer':
                $mensagemMotivoRecusa = ' | Fonte: O adquirente do cart&atilde;o';
                break;
            case 'antifraud':
                $mensagemMotivoRecusa = ' | Fonte: O sistema anti-fraude';
                break;
            case 'internal_error':
                $mensagemMotivoRecusa = ' | Fonte: O sistema do gateway';
                break;
            case 'no_acquirer':
                $mensagemMotivoRecusa = ' | Fonte: desconhecida';
                break;
            case 'acquirer_timeout':
                $mensagemMotivoRecusa = ' | Fonte: Limite de tempo esgotado';
                break;
        }


        echo json_encode(array('mensagem'=>'Ok',
                'statusRetorno'=> utf8_encode($mensagemCartao . $mensagemMotivoRecusa),
                'mensagemErro'=>$mensagemErro
            )
        );
    } catch (Exception $e){
        $con->rollBack();

        echo json_encode(array('mensagem'=>'Error',
                'mensagemErro'=>$e->getMessage()
            )
        );
    }
}

function carregarModalInformacoesPagamento() {
    try {
        $certificado = CertificadoPeer::retrieveByPK($_POST['certificado_id']);

        $cFormas = new Criteria();
        $cFormas->add(FormaPagamentoPeer::NOME, array(
            'Máquina de Cartão de Crédito',
            'Depósito em Conta',
            'Transferência',
            'Boleto',
            'Cartão de Débito',
            ), Criteria::IN
        );
        $formasPagamentoObj = FormaPagamentoPeer::doSelect($cFormas);
        $formasPagamento = array();
        $formasPagamento[] = array('id'=>'', 'nome'=>utf8_encode('Informe o tipo de comprovante'));
        foreach ($formasPagamentoObj as $key=>$formaPagamento) {
            $formasPagamento[] = array('id'=>$formaPagamento->getId(), 'nome'=>utf8_encode($formaPagamento->getNome()));
        }

        $precoCd = $certificado->getProduto()->getPreco() - $certificado->getDesconto();
        $qtdParcelas = 0;

        if ($precoCd <= 300)
            $qtdParcelas = 1;
        elseif ($precoCd > 300 && $precoCd < 500) {
            $qtdParcelas = 2;
        } elseif ($precoCd >= 500) {
            $qtdParcelas = 3;
        }

        $parcelasArr = array();
        for ($i = 1; $i <= $qtdParcelas; $i++) {
            if ($i == 1)
                $parcelasArr[] = array("id" => $i, "nome" => $i . ' Parcela');
            else
                $parcelasArr[] = array("id" => $i, "nome" => $i . ' Parcelas');
        }
        echo json_encode(array('mensagem' => 'Ok', 'dados' => json_encode($parcelasArr), 'dadosFormaPagamento'=>json_encode($formasPagamento)));
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function salvarComprovantePagamento() {
    try {
        require_once $_SERVER['DOCUMENT_ROOT'].'/inc/class.upload.php-master/src/class.upload.php';
        require_once $_SERVER['DOCUMENT_ROOT'].'/inc/class.upload.php-master/src/lang/class.upload.pt_BR.php';

        $usuarioLogado = ControleAcesso::getUsuarioLogado();


        $con = Propel::getConnection();
        $con->beginTransaction();

        $certificado = CertificadoPeer::retrieveByPK($_POST['certificado_id']);
        $itemPedidos = $certificado->getItemPedidos();
        //var_dump($itemPedidos);
        $pedido = $itemPedidos[0]->getPedido();

        $comprovante = new CertificadoPagamento();
        $comprovante->setValor($_POST['valor']);
        $comprovante->setDataInclusao(date('Y/m/d H:i:s'));

        $dataComprovante = $_POST['edtDataComprovante'];
        $dataComprovante = explode('/',$dataComprovante);

        $comprovante->setDataPagamento($dataComprovante[2] . '/'. $dataComprovante[1] .'/'. $dataComprovante[0]);

        $comprovante->setPedidoId($pedido->getId());
        $comprovante->setCodigoPagamento($_POST['edtCodigoPagamento']);

        if ($_POST['edtQuantidadeParcelasComprovante'])
            $comprovante->setQuantidadeParcelas($_POST['edtQuantidadeParcelasComprovante']);
        else
            $comprovante->setQuantidadeParcelas(1);

        $comprovante->setCertificadoId($certificado->getId());
        $comprovante->setFormaPagamentoId($_POST['edtFormaPagamentoComprovante']);
        $comprovante->setObservacao($_POST['edtObservacaoComprovante']);
        $comprovante->save();

        /*SETA O EXTORNO DE PAGAMENTO*/
        $certSit = new CertificadoSituacao();
        $certSit->setCertificadoId($certificado->getId());
        $cSit = new Criteria();
        $certSit->setUsuarioId($usuarioLogado->getId());
        $cSit->add(SituacaoPeer::SIGLA, 'comp_pag');
        $certSit->setSituacao(SituacaoPeer::doSelectOne($cSit));
        $certSit->setComentario('Foi informado um comprovante de pagamento para este certificado.');
        $certSit->setData(date("Y-m-d H:i:s"));
        $certSit->save();

        $mensagem = array('mensagem' => 'Ok');

        $handle = new Upload($_FILES['edtImagemComprovantePagamento'], 'pt_BR');
        $handle->allowed = 'image/*';
/*var_dump($handle->log); exit;*/
        if ($handle->uploaded) {
  /*          var_dump($handle->log);*/
            $handle->file_new_name_body = $comprovante->getId();
            $handle->image_convert = 'jpg';
            $handle->image_resize = true;
            $handle->image_x = 400;
            $handle->image_y = 800;
            $handle->image_ratio = true;
            $handle->image_ratio_crop = false;
            $handle->image_ratio_fill = true;
            $handle->Process($_SERVER['DOCUMENT_ROOT'].'/media/comprovantes');

            $handle->file_new_name_body = $comprovante->getId() . '_p';
            $handle->image_convert = 'jpg';
            $handle->image_resize = true;
            $handle->image_x = 50;
            $handle->image_y = 50;
            $handle->image_ratio = true;
            $handle->image_ratio_crop = true;
            $handle->image_ratio_fill = true;
            $handle->Process($_SERVER['DOCUMENT_ROOT'].'/media/comprovantes');

            $handle->clean();

            if ($handle->processed) {
                $con->commit();
            } else {
                $con->rollBack();
                $mensagem = array('mensagem' => 'Erro');
            }
        } else {
            $mensagem = array('mensagem' => 'Erro');
            $con->rollBack();
        }
        echo json_encode($mensagem);
    } catch (Exception $e) {
        echo json_encode(array('mensagem' => 'Erro'));
        $con->rollBack();
        var_dump($e);
    }
}



function carregarProdutoSelecionado() {
    try {

    	$produto = ProdutoPeer::retrieveByPK($_POST['produtoId']);

        $mensagem = array('mensagem' => 'Ok');


        echo json_encode($mensagem);
    } catch (Exception $e) {
        echo json_encode(array('mensagem' => 'Erro'));
        var_dump($e);
    }
}
?>

