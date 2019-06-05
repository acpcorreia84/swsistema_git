<?
include '../loader.php';
include 'header.php';

$id =  $_GET['prospect_id'];

try {
    $cProspectSituacao = new Criteria();
    $cProspectSituacao->add(ProspectSituacaoPeer::PROSPECT_ID , $id);
    $cProspectSituacao->addDescendingOrderByColumn(ProspectSituacaoPeer::ID);
    $prospectSituacoes = ProspectSituacaoPeer::doSelect($cProspectSituacao);
} catch (Exception $e) {
    var_dump($e);exit;
}
?>
<script>
//    setTimeout(function(){  location.reload(); }, 3000);
</script>
	<table class="table table-striped table-borbored small">
	    <thead>
	        <tr>
	            <td align="center">Data</td>
	            <td align="center">A&ccedil;&atilde;o</td>
	            <td align="center">Usu&aacute;rio</td>
	            <td align="center">Obs</td>
	        </tr>
	    </thead>

	    <tbody>
			<? foreach($prospectSituacoes as $prospectSituacao) {?>
	            <tr <?=corLinhaTabela($key)?>>
	                <td><?=$prospectSituacao->getDataAcao('d/m/Y H:i')?></td>
	                <td><? if($prospectSituacao->getProspectAcao()) echo $prospectSituacao->getProspectAcao()->getNome(); else echo "";?></td>
	                <td><?=$prospectSituacao->getUsuario()->getNome()?></td>
	                <td><? if($prospectSituacao->getObservacao()) echo $prospectSituacao->getObservacao(); else echo "------"; ?></td>
	            </tr>
	        <? }?>
		</tbody>
	</table>