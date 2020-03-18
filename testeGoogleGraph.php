<?php
/**
 * Created by PhpStorm.
 * User: Antonio Carlos
 * Date: 17/12/2019
 * Time: 12:02
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';
$con = Propel::getConnection();

$sql = 'select * from negocios_em_aberto_total;';

$stmt = $con->prepare($sql);
$stmt->execute();
$negociosEmAberto = $stmt->fetchAll();

$sql = 'select * from negocios_em_aberto_renovacoes;';
$stmt = $con->prepare($sql);
$stmt->execute();
$negociosEmAbertoRenovacoes = $stmt->fetchAll();

$sql = 'select * from negocios_pagos_total;';
$stmt = $con->prepare($sql);
$stmt->execute();
$negociosPagosTotal = $stmt->fetchAll();

$sql = 'select * from negocios_pagos_renovacao;';
$stmt = $con->prepare($sql);
$stmt->execute();
$negociosPagosRenovacoes = $stmt->fetchAll();

$sql = 'select * from negocios_perdidos_renovacoes;';
$stmt = $con->prepare($sql);
$stmt->execute();
$negociosPerdidosRenovacoes = $stmt->fetchAll();

$sql = 'select * from negocios_em_aberto_pedidos;';
$stmt = $con->prepare($sql);
$stmt->execute();
$negociosEmAbertoPedidos = $stmt->fetchAll();

$sql = 'select * from negocios_pagos_pedidos;';
$stmt = $con->prepare($sql);
$stmt->execute();
$negociosPagosPedidos = $stmt->fetchAll();


$arrNegocios = array();

foreach($negociosEmAberto as $res){
    $arrNegocios[$res['id']]['consultor'] = $res['consultor'];
    $arrNegocios[$res['id']]['somaTotalEmAberto'] = array('v'=>intval($res['somaTotalEmAberto']), 'f'=>formataMoeda($res['somaTotalEmAberto']) . ' (' . intval($res['qtdTotalEmAberto']).')' );
}
foreach($negociosEmAbertoRenovacoes as $res){
    $arrNegocios[$res['id']]['consultor'] = $res['consultor'];
    $arrNegocios[$res['id']]['somaARenovar'] = array('v'=>intval($res['somaARenovar']), 'f'=>formataMoeda($res['somaARenovar']). ' (' . intval($res['qtdARenovar']).')' );
}

foreach($negociosPagosTotal as $res){
    $arrNegocios[$res['id']]['consultor'] = $res['consultor'];
    $arrNegocios[$res['id']]['somaTotal'] = array('v'=>intval($res['somaTotal']), 'f'=>formataMoeda($res['somaTotal']). ' (' . intval($res['qtdTotal']).')' );
}

foreach($negociosPagosRenovacoes as $res){
    $arrNegocios[$res['id']]['consultor'] = $res['consultor'];
    $arrNegocios[$res['id']]['somaRenovados'] = array('v'=>intval($res['somaRenovados']), 'f'=>formataMoeda($res['somaRenovados']) . ' (' . intval($res['qtdRenovados']).')' );

}

foreach($negociosPerdidosRenovacoes as $res){
    $arrNegocios[$res['id']]['consultor'] = $res['consultor'];
    $arrNegocios[$res['id']]['somaRenovacoesPerdidas'] = array('v'=>intval($res['somaRenovacoesPerdidas']), 'f'=>formataMoeda($res['somaRenovacoesPerdidas']) . ' (' . intval($res['qtdRenovacoesPerdidas']).')' );

}

foreach($negociosEmAbertoPedidos as $res){
    $arrNegocios[$res['id']]['consultor'] = $res['consultor'];
    $arrNegocios[$res['id']]['somaPedidosAberto'] = array('v'=>intval($res['somaPedidosAberto']), 'f'=>formataMoeda($res['somaPedidosAberto']) . ' (' . intval($res['qtdPedidosAberto']).')' );

}

foreach($negociosPagosPedidos as $res){
    $arrNegocios[$res['id']]['consultor'] = $res['consultor'];
    $arrNegocios[$res['id']]['somaPedidosPagos'] = array('v'=>intval($res['somaPedidosPagos']), 'f'=>formataMoeda($res['somaPedidosPagos']) . ' (' . intval($res['qtdPedidosPagos']).')' );

}




$arrNegociosFinal = array();
$i = 0;
foreach ($arrNegocios as $negocios) {
    $arrNegociosFinal[$i][] =  $negocios['consultor'];

    if ($negocios['somaPedidosAberto'] ) {
        $arrNegociosFinal[$i][] = $negocios['somaPedidosAberto'];

    } else {
        $arrNegociosFinal[$i][] = array('v'=>intval(0), 'f'=>'R$ 0,00');

    }
    if ($negocios['somaARenovar'] ) {
        $arrNegociosFinal[$i][] = $negocios['somaARenovar'];

    } else {
        $arrNegociosFinal[$i][] = array('v'=>intval(0), 'f'=>'R$ 0,00');

    }

    if ($negocios['somaTotalEmAberto'] ) {
        $arrNegociosFinal[$i][] = $negocios['somaTotalEmAberto'];

    } else {
        $arrNegociosFinal[$i][] = array('v'=>intval(0), 'f'=>'R$ 0,00');

    }

    if ($negocios['somaPedidosPagos'] ) {
        $arrNegociosFinal[$i][] = $negocios['somaPedidosPagos'];

    } else {
        $arrNegociosFinal[$i][] = array('v'=>intval(0), 'f'=>'R$ 0,00');

    }

    if ($negocios['somaRenovados'] ) {
        $arrNegociosFinal[$i][] = $negocios['somaRenovados'];

    } else {
        $arrNegociosFinal[$i][] = array('v'=>intval(0), 'f'=>'R$ 0,00');

    }

    if ($negocios['somaTotal'] ) {
        $arrNegociosFinal[$i][] = $negocios['somaTotal'];

    } else {
        $arrNegociosFinal[$i][] = array('v'=>intval(0), 'f'=>'R$ 0,00');

    }
    $percentualPerdido = 0;
    if ($negocios['somaRenovacoesPerdidas'] ) {

        if ($negocios['somaARenovar']) {
            $percentualPerdido = $negocios['somaRenovacoesPerdidas']['v'] / $negocios['somaARenovar']['v'];
            $negocios['somaRenovacoesPerdidas']['f'] .= ' | '.round($percentualPerdido*100, 2) . '%' ;
        }

        $arrNegociosFinal[$i][] = $negocios['somaRenovacoesPerdidas'];

    } else {
        $arrNegociosFinal[$i][] = array('v'=>intval(0), 'f'=>'R$ 0,00');

    }
    $i++;

}
/*echo '<pre>';
var_dump($arrNegociosFinal);
exit;*/


?>
<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

        google.charts.load('current', {'packages':['table']});
        google.charts.setOnLoadCallback(drawTable);

        function drawTable() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Consultor');
            data.addColumn('number', 'Pedidos em aberto');
            data.addColumn('number', 'Renovacoes em aberto');
            data.addColumn('number', 'Total em aberto');
            data.addColumn('number', 'Pedidos pagos');
            data.addColumn('number', 'Renovacoes pagas');
            data.addColumn('number', 'Total Pago');
            data.addColumn('number', 'Total renovacoes perdidas');
            data.addRows(<?=json_encode($arrNegociosFinal); ?>)

            var table = new google.visualization.Table(document.getElementById('table_div'));

            table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});

        }
    </script>

</head>
<body>
<div id="table_div" style="border: 1px solid #ccc">&nbsp;</div>
<table class="columns">
    <tr>
        <td><div id="Sarah_chart_div" style="border: 1px solid #ccc"></div></td>
        <td><div id="Anthony_chart_div" style="border: 1px solid #ccc"></div></td>
    </tr>

</table>
</body>
</html>

