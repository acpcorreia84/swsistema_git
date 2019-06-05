<? 
include '../loader.php';

$cProspectSituacao = new Criteria();
$cProspectSituacao->add(ProspectSituacaoPeer::PROSPECT_ID , $_GET['prospect_id']);
$cProspectSituacao->addDescendingOrderByColumn(ProspectSituacaoPeer::ID);
$prospectHisoticos = ProspectSituacaoPeer::doSelect($cProspectSituacao);

?>
<table class="table table-condensed table-responsive table-striped">
    <thead>
        <tr>
            <td align="center">Codigo</td>
            <td align="center">Data</td>
            <td align="center">A&ccedil;&atilde;o</td>
            <td align="center">Usu&aacute;rio</td>
        </tr>
    </thead>
    
    <tbody>
		<? foreach($prospectHisoticos as $prospectHisotico) {?>
            <tr <?=corLinhaTabela($key)?>>
                <td><?=$prospectHisotico->getId()?></td>
                <td><?=$prospectHisotico->getDataAcao('d/m/Y H:i:s')?></td>
                <td><?=$prospectHisotico->getProspectAcao()->getNome()?></td>
                <td><?=$prospectHisotico->getUsuario()->getNome()?></td>
            </tr>
        <? }?>
	</tbody>
</table>