<?php

	require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/pagarme-php/Pagarme.php';	 

	require_once $_SERVER['DOCUMENT_ROOT'] . "/loader.php";

	$cliente = ClientePeer::retrieveByPk($_GET['cliente_id']);

	if ($cliente->getRazaoSocial())
		$nome = $cliente->getRazaoSocial();
	elseif ($cliente->getNomeFantasia())
		$nome = $cliente->getNomeFantasia();
	elseif ($cliente->getResponsavel())
		$nome = $cliente->getResponsavel()->getNome();
		
	$produto = $_GET["produto"];
	$valor = $_GET['valor'];
	$v_dia = $_GET['dia'];
	$v_mes = $_GET['mes'];
	$v_ano = $_GET['ano'];
	$sacado = urlencode("$nome <br>$cnpj <br>$endereco <br>$endereco2");
	$email = $_GET['email'];

	$cnpj = 'Cnpj: '.$cliente->getCpfCnpj();
	
	if ($cliente->getEndereco())
		$endereco = removeEspeciais($cliente->getEndereco());
	else 
		$endereco = '---';
		
	$endereco2 = ' Cep:' .$cliente->getCep() .  ' ' . $cliente->getCidade() . ' - '. $cliente->getUf();

    Pagarme::setApiKey("ak_live_snGWlbkg0GxidcKPpKfWyUojRPoaBC");
//    Pagarme::setApiKey("ak_test_sY6UfR8wCl8AmgWb7ra5MGoOLm54Ny");

	$customer = new PagarMe_Customer(array(
		  "document_number" => removeTracoPontoBarra($cnpj),
		  "name" => removeEspeciais($nome),
		  "email" => $email,
		  "address" => array(
			"street" => $endereco,
			"complementary" => $cliente->getComplemento(),
			"street_number" => $cliente->getNumero(),
			"neighborhood" => $cliente->getBairro(),
			"city" => $cliente->getCidade(),
			"state" => $cliente->getUf(),
			"zipcode" => "66055080",
			"country" => "Brasil"
		  ),
	));
	$transaction = new PagarMe_Transaction(array(
		"customer" => $customer,
        'amount' => removeTracoPontoBarra($valor.'00'),
		'postback_url' => "http://www.gruposerama.com/retorno_transacao.php",
		"boleto_expiration_date"=>$v_ano.'-'.$v_mes.'-'.$v_dia.'T21:54:56.000Z',
        'payment_method' => "boleto"
	));
	
    $transaction->charge();
    $boleto_url = $transaction->boleto_url; // URL do boleto bancário
    $boleto_barcode = $transaction->boleto_barcode; // código de barras do boleto bancário
	$transacaoId = $transaction->id;

	$boleto = BoletoPeer::retrieveByPk($_GET['boleto_id']);

	if ($boleto) {
		$boleto->setTid($transacaoId);
		$boleto->save();
	}
	
	ob_start();                      // start capturing output
	include $_SERVER['DOCUMENT_ROOT'].'/inc/email_boleto_pagarMe.php';   // execute the file
	$mensagem = ob_get_contents();    // get the contents from the buffer
	ob_end_clean();       	
	
	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";	
	
	$headers .= 'from:Serama - Autoridade de Registro<financeiro@serama.com.br>' . "\r\n";
	
	mail($email, "Boleto Bancário SERAMA", $mensagem, $headers);
	
	echo js_ir($boleto_url);	
	exit;
?>