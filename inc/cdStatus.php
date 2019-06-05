<? 

//TEM QUE ESTAR DENTRO DE UM FOREACH EX.: foreach(algumaCoisa as $certificado)
	
	$idPro = array(38,39,74,75,94,95);
	
	$cCliente = new Criteria();
	$cCliente->add(ClientePeer::ID , $certificado->getClienteId());
	$cliente = ClientePeer::doSelectOne($cCliente);

	$cCert = new Criteria();
	$cCert->add(CertificadoPeer::CLIENTE_ID , $cliente->getId());
	$cCert->add(CertificadoPeer::APAGADO , 0 , Criteria::EQUAL);
	$cCert->add(CertificadoPeer::PRODUTO_ID , $idPro, Criteria::NOT_IN);
	$cCert->addDescendingOrderByColumn(CertificadoPeer::ID);
	$cert = CertificadoPeer::doSelect($cCert);
	
	$arrayCert = array();
	$arrayCert = $cert;
	$count = count($cert);
	$condicaoAnterior = 0;
	
	if( ($count > 1) && ($certificado->getDataCompra('d/m/Y') < date('d/m/Y')) ){
		echo "Cliente Antigo";
	}elseif( ($count > 1) && ($certificado->getDataCompra('d/m/Y') >= date('d/m/Y')) ){
		echo "Cliente Novo";
	}elseif ( ($count <= 1) && ($condicaoAnterior == 0) ) {
		echo "Cliente Novo";
	}
?>