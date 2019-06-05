<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

$prospect_id = $_REQUEST['prospect_id'];
$usuario_id = $_REQUEST['usuario_id'];
$edtCodigoContador = $_REQUEST['edtCodigoContador'];

try {
    $usuario = UsuarioPeer::retrieveByPK($usuario_id);
    $prospect = ProspectPeer::retrieveByPK($prospect_id);
    $certificado = CertificadoPeer::retrieveByPK($prospect->getCertificadoId());

    if($certificado->getFormaPagamentoId()==1){
        $cBoleto = new Criteria();
        $cBoleto->add(BoletoPeer::CERTIFICADO_ID, $certificado->getId());
        $cBoleto->addDescendingOrderByColumn(BoletoPeer::ID);
        $boleto = BoletoPeer::doSelectOne($cBoleto);
        if ($boleto) {
            $boleto->setDataPagamento(date('Y-m-d H:i:s'));
            $boleto->save();
        }
    }
    if(!$certificado->getContadorId()) {
        $certificado->setContadorId($edtCodigoContador);
    }
    $certificado->setDataPagamento(date('Y-m-d H:i:s'));

    $certSit = new CertificadoSituacao();
    $certSit->setCertificadoId($certificado->getId());
    $certSit->setUsuarioId($usuario->getId());
    $certSit->setComentario($usuario->getNome().' informou pagamento no sistema');
    $certSit->setSituacaoId(9);
    $certSit->setData(date("Y-m-d H:i:s"));

    $prospectSituacao = new ProspectSituacao();
    $prospectSituacao->setUsuarioId($usuario_id);
    $prospectSituacao->setProspectId($prospect_id);
    $prospectSituacao->setProspectAcaoId(10);
    $prospectSituacao->setDataAcao(date('Y-m-d H:i:s'));
    $prospectSituacao->save();


    $certSit->save();
    $certificado->save();
    echo '0';
}catch (Exception $e){
    erroEmail($e->getMessage(),"Erro na funcao de salvar a informacao de pagamento");
    echo $e->getMessage();
}