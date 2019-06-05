<?php
/**
 * Created by PhpStorm.
 * User: antoniocorreia
 * Date: 24/11/2016
 * Time: 11:49
 */

/*TODOS OS FILTROS DO CERTIFICADO*/
if($_POST && $_POST['edt_certificado_id']){
    $cCertificado->addOr(CertificadoPeer::ID, $_POST['edt_certificado_id']);
}elseif($_POST && $_POST['edt_cliente_id']){
    $cCertificado->addOr(CertificadoPeer::CLIENTE_ID, $_POST['edt_cliente_id']);
}elseif($_POST && $_POST['edt_protocolo']){
    $cCertificado->addOr(CertificadoPeer::PROTOCOLO, $_POST['edt_protocolo']);
}elseif($_POST && $_POST['edt_cpf']){
    $cCliente = new Criteria();
    $cCliente->add(ClientePeer::CPF_CNPJ,$_POST['edt_cpf']);
    $cCliente->add(ClientePeer::SITUACAO,0);
    $cCliente->addDescendingOrderByColumn(ClientePeer::ID);
    $cliente = ClientePeer::doSelectOne($cCliente);
    if($cliente){
        $cCertificado->addOr(CertificadoPeer::CLIENTE_ID, $cliente->getId());
    }else{
        $cResponsavel = new Criteria();
        $cResponsavel->add(ResponsavelPeer::CPF,$_POST['edt_cpf'] );
        $cliente = ResponsavelPeer::doSelectOne($cResponsavel);
        if($cliente){
            $cCertificado->addOr(CertificadoPeer::CLIENTE_ID, $cliente->getId());
        }else{
            $cCertificado->addOr(CertificadoPeer::CLIENTE_ID, 0);
        }
    }
}elseif($_POST && $_POST['edt_cnpj']){
    $cCliente = new Criteria();
    $cCliente->add(ClientePeer::CPF_CNPJ,$_POST['edt_cnpj']);
    $cCliente->add(ClientePeer::SITUACAO,0);
    $cCliente->addDescendingOrderByColumn(ClientePeer::ID);
    $cliente = ClientePeer::doSelectOne($cCliente);
    if($cliente){
        $cCertificado->addOr(CertificadoPeer::CLIENTE_ID, $cliente->getId());
    }else{
        $cCertificado->addOr(CertificadoPeer::CLIENTE_ID, 0);
    }
}
/*FIM DE TODOS OS FILTROS DO CERTIFICADO*/
?>