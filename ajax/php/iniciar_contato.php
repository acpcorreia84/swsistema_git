<?
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

$prospectid = $_REQUEST['edtProspectId'];
$tipoContato = $_REQUEST['edtProspectTipoContato'];

//$observacao = ProspectMeioContatoPeer::RetrieveByPk($tipoContato);

$prospectSituacao = new ProspectSituacao();
$prospectSituacao->setProspectId($prospectid);
$prospectSituacao->setUsuarioId($usuarioLogado->getId());
$prospectSituacao->setProspectAcaoId(3);
$prospectSituacao->setProspectMeioContatoId($tipoContato);
//$prospectSituacao->setObservacao($observacao->getDescricao());
$prospectSituacao->setDataAcao(date('Y-m-d H:i:s'));
$prospectSituacao->save();

echo '<script>consulta_historico('.$prospectid.')</script>';
?>
