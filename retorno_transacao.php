<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/pagarme-php/Pagarme.php';	 

	require_once $_SERVER['DOCUMENT_ROOT'] . "/loader_off.php";

    Pagarme::setApiKey("ak_live_snGWlbkg0GxidcKPpKfWyUojRPoaBC");

//Pagarme::setApiKey("ak_test_sY6UfR8wCl8AmgWb7ra5MGoOLm54Ny");
/*
//    if(PagarMe::validateFingerprint($_POST['id'], sha1($_POST['id'].'#'.'ak_live_snGWlbkg0GxidcKPpKfWyUojRPoaBC')) ) {
    if(PagarMe::validateFingerprint($_POST['id'], $_POST['fingerprint']) ) {	
		$cBol = new Criteria();
		$cbol->add(BoletoPeer::TID, $_POST['id']);
		
		$boleto = BoletoPeer::doSelectOne($cBol);
		
		if ($boleto) {
			if ($_POST['current_status']=='paid')
				$boleto->setDataPagamento(date('Y-m-d H:i:s'));			
				$boleto->save();	
		}

    }
*/
if (PagarMe::validateFingerprint($_POST['id'], $_POST['fingerprint'])  ) {
		$cBol = new Criteria();
		$cBol->add(BoletoPeer::TID, $_POST['id']);
		$boleto = BoletoPeer::doSelectOne($cBol);
		$mensagem = "boleto: ".$boleto->getId() . ' - '. $boleto->getTid(). '\n\n';
		$nome = '';
		$valor = '';

		if ($boleto) {
			$boleto->setDataConfirmacaoPagamento(date('Y-m-d'));		
			$boleto->setDataPagamento(date('Y-m-d'));		
			$boleto->save();
			$valor = formataMoeda($boleto->getValor());
		
			$certificado = $boleto->getCertificado();

			if ($certificado) {
				$certificado->setDataConfirmacaoPagamento(date('Y-m-d'));	
				$certificado->setDataPagamento(date('Y-m-d'));	
				$certificado->save();		
						
				$certSit = new CertificadoSituacao();
				$certSit->setCertificadoId($certificado->getId());
				$cSit = new Criteria();
		
				//INSERI UM USUÁRIO NO SISTEMA CHAMADO PAGARME QUE IRÁ GERAR UMA SITUÇÃO DE RETORNO
				$certSit->setUsuarioId(868);
				
				$cSit->add(SituacaoPeer::SIGLA, 'pag');				
				$certSit->setSituacao(SituacaoPeer::doSelectOne($cSit));
				$certSit->setData(date("Y-m-d H:i:s",mtime()));
				$certSit->save();
		
				$cliente = $certificado->getCliente();
				
				if ($cliente->getRazaoSocial())
					$nome = $cliente->getRazaoSocial();
				elseif ($cliente->getNomeFantasia())
					$nome = $cliente->getNomeFantasia();
				elseif ($cliente->getResponsavel())
					$nome = $cliente->getResponsavel()->getNome();
				
			}
		
			$pedido = $boleto->getPedido();		
			if ($pedido) {
				$pedido->setDataConfirmacaoPagamento(date('Y-m-d'));	
				$pedido->save();
				
				$contasReceber = $pedido->getContasRecebers();
				$contaReceber = $contasReceber[0];
				if ($contaReceber) {
					$contaReceber->setDataPagamento(date('Y-m-d'));	
					$contaReceber->save();
				}			
				
			}
			
			
		}
		
		
			ob_start();                      // start capturing output
			include $_SERVER['DOCUMENT_ROOT'].'/inc/email_retorno_pagarMe.php';   // execute the file
			$mensagem = ob_get_contents();    // get the contents from the buffer
			ob_end_clean();       	
		
			// To send HTML mail, the Content-type header must be set
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";	
			
			$headers .= 'from:Serama-Retorno PagarME<financeiro@serama.com.br>' . "\r\n";
			
			mail('correia.antonio@gruposerama.com.br, financeiro@serama.com.br', "Retorno Boleto SERAMA/PAGARME", $mensagem, $headers);
}
else
	mail('correia.antonio@gruposerama.com.br, financeiro@serama.com.br', "Retorno Boleto SERAMA/PAGARME", "Tentativa de fraude no sistema. POr favor entre em contato com o Administrador", "from:financeiro@serama.com.br");
?>