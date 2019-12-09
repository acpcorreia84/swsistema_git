<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/loader_off.php";

$result = file_get_contents('php://input');

$retorno = json_decode($result);


$secretKey = $retorno->SecretKey;
$transactionStatus = $retorno->TransactionStatus;
$tId = $retorno->TransactionID;

/*$secretKey = '28517135D5E1438398289AA82447E1B82E4B9E5EE829425DA0D9C082A1C5F6FF';
$transactionStatus = '3';
$tId = '1540052';*/

if ( ($secretKey == '28517135D5E1438398289AA82447E1B82E4B9E5EE829425DA0D9C082A1C5F6FF' && ($transactionStatus=="3"))  ) {
		$cBol = new Criteria();
		$cBol->add(BoletoPeer::TID, $tId);
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

			/*
			 * CODIGO DE RECARTEIRIZACAO DE USUSUARIO
			 * */
			if ($certificado->getUsuarioId() != $boleto->getUsuarioId()) {

                $cSit = new Criteria();

                //O USUARIO GUIAR VAI RECARTEIRIZAR O PEDIDO PARA O USUARIO QUE GEROU O BOLETO
                $certSit->setUsuarioId(1039);
                $certSit->setComentario('Certificado recarteirizado pela pol&iacute;tica de emiss&atilde;o do boleto, Usu&aacute;rio anterior: '.$certificado->getUsuario()->getNome());

                $cSit->add(SituacaoPeer::SIGLA, 'recartbol');
                $certSit->setSituacao(SituacaoPeer::doSelectOne($cSit));
                $certSit->setData(date("Y-m-d H:i:s",mtime()));
                $certSit->save();
                $certificado->getUsuarioId($boleto->getId());

            }

			if ($certificado) {
				$certificado->setDataConfirmacaoPagamento(date('Y-m-d'));	
				$certificado->setDataPagamento(date('Y-m-d'));	
				$certificado->save();		
						
				$certSit = new CertificadoSituacao();
				$certSit->setCertificadoId($certificado->getId());
				$cSit = new Criteria();
		
				//INSERI UM USUÁRIO NO SISTEMA CHAMADO SAFE2PAY QUE IRÁ GERAR UMA SITUÇÃO DE RETORNO
				$certSit->setUsuarioId(868);
				
				$cSit->add(SituacaoPeer::SIGLA, 'liqpag');
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
			
			$headers .= 'from:Safeweb-Retorno Safe2Pay<comunicacao@swsistema.com.br>' . "\r\n";
			
			mail('antonio.correia@arsw.com.br, marcia.lima@arsw.com.br', "Retorno Boleto SAFEWEB/SAFETOPAY", $mensagem, $headers);
}
else
	mail('antonio.correia@arsw.com.br, marcia.lima@arsw.com.br', "Retorno Boleto SAFEWEB/SAFETOPAY", "Tentativa de fraude no sistema. POr favor entre em contato com o Administrador", "from:comunicacao@swsistema.com.br");
?>