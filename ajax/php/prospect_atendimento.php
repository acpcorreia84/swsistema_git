<?
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

$prospectid = $_REQUEST['edtProspectId'];
$tipoContato = $_REQUEST['edtProspectTipoContato'];

try {
    $prospectatendimento = new ProspectAtendimento();
    $prospectatendimento->setProspectId($prospectid);
    $prospectatendimento->setUsuarioId($usuarioLogado->getId());
    $prospectatendimento->setProspectMeioContatoId($tipoContato);
    $prospectatendimento->setDataAtendimento(date('Y-m-d H:i:s'));
    $prospectatendimento->save();

    echo "0";
}catch(Exception $e){
    echo $e->getMessage();
}
?>