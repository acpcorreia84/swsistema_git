<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

$prospect_id = $_REQUEST['prospect_id'];
$observacao = $_REQUEST['observacao'];
$usuario_id = $_REQUEST['usuario_id'];

try {
    //Gerando Ação
    $prospectSituacao = new ProspectSituacao();
    $prospectSituacao->setUsuarioId($usuario_id);
    $prospectSituacao->setProspectId($prospect_id);
    $prospectSituacao->setProspectAcaoId(11);
    $prospectSituacao->setDataAcao(date('Y-m-d H:i:s'));
    $prospectSituacao->setObservacao(removeEspeciais(strtoupper(trim($observacao))));
    $prospectSituacao->save();
    echo '0';
}catch(Exception $e){
    erroEmail($e->getMessage(),'Erro na funcao de inserir Observacao do prospect');
    echo $e->getMessage();
}