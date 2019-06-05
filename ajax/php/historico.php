<?
 include '../loader.php';
 include '<?=$_SERVER["DOCUMENT_ROOT"]?>/header.php';

$id =  $_GET['prospect_id'];

try {
    $cProspectSituacao = new Criteria();
    $cProspectSituacao->add(ProspectSituacaoPeer::PROSPECT_ID , $id);
    $cProspectSituacao->addDescendingOrderByColumn(ProspectSituacaoPeer::ID);
    $prospectHisoticos = ProspectSituacaoPeer::doSelect($cProspectSituacao);
} catch (Exception $e) {
    var_dump($e);exit;
}
?>
<table class="table table-condensed table-responsive table-striped">
    <thead>
        <tr>
            <td align="center">Data</td>
            <td align="center">A&ccedil;&atilde;o</td>
            <td align="center">Usu&aacute;rio</td>
            <td align="center">Obs</td>
        </tr>
    </thead>

    <tbody>
		<? foreach($prospectHisoticos as $prospectHisotico) {?>
            <tr <?=corLinhaTabela($key)?>>
                <td><?=$prospectHisotico->getDataAcao('d/m/Y H:i:s')?></td>
                <td><?=$prospectHisotico->getProspectAcao()->getNome()?></td>
                <td><?=$prospectHisotico->getUsuario()->getNome()?></td>
                <td><? if($prospectHisotico->getObservacao()) echo $prospectHisotico->getObservacao(); else echo "------"; ?></td>
            </tr>
        <? }?>
	</tbody>
</table>