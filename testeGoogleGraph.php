<?php
/**
 * Created by PhpStorm.
 * User: Antonio Carlos
 * Date: 17/12/2019
 * Time: 12:02
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader_off.php';
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
$arrNegocios = array();

foreach($negociosEmAberto as $res){
    $arrNegocios[$res['id']]['consultor'] = $res['consultor'];
    $arrNegocios[$res['id']]['somaTotalEmAberto'] = array('v'=>intval($res['somaTotalEmAberto']), 'f'=>formataMoeda($res['somaTotalEmAberto']));
    $arrNegocios[$res['id']]['qtdTotalEmAberto'] = intval($res['qtdTotalEmAberto']);
}
foreach($negociosEmAbertoRenovacoes as $res){
    $arrNegocios[$res['id']]['consultor'] = $res['consultor'];
    $arrNegocios[$res['id']]['somaARenovar'] = array('v'=>intval($res['somaARenovar']), 'f'=>formataMoeda($res['somaARenovar']));
    $arrNegocios[$res['id']]['qtdARenovar'] = intval($res['qtdARenovar']);
}

foreach($negociosPagosTotal as $res){
    $arrNegocios[$res['id']]['consultor'] = $res['consultor'];
    $arrNegocios[$res['id']]['somaTotal'] = array('v'=>intval($res['somaTotal']), 'f'=>formataMoeda($res['somaTotal']));
    $arrNegocios[$res['id']]['qtdTotal'] = intval($res['qtdTotal']);
}

foreach($negociosPagosRenovacoes as $res){
    $arrNegocios[$res['id']]['consultor'] = $res['consultor'];
    $arrNegocios[$res['id']]['somaRenovados'] = array('v'=>intval($res['somaRenovados']), 'f'=>formataMoeda($res['somaRenovados']));
    $arrNegocios[$res['id']]['qtdRenovados'] = intval($res['qtdRenovados']);

}

$arrNegociosFinal = array();
$i = 0;
foreach ($arrNegocios as $negocios) {
    $arrNegociosFinal[$i][] =  $negocios['consultor'];
    if ($negocios['somaTotalEmAberto'] && $negocios['qtdTotalEmAberto']) {
        $arrNegociosFinal[$i][] = $negocios['somaTotalEmAberto'];
        $arrNegociosFinal[$i][] = $negocios['qtdTotalEmAberto'];
    } else {
        $arrNegociosFinal[$i][] = array('v'=>intval(0), 'f'=>'R$ 0,00');
        $arrNegociosFinal[$i][] = 0;
    }

    if ($negocios['somaARenovar'] && $negocios['qtdARenovar']) {
        $arrNegociosFinal[$i][] = $negocios['somaARenovar'];
        $arrNegociosFinal[$i][] = $negocios['qtdARenovar'];
    } else {
        $arrNegociosFinal[$i][] = array('v'=>intval(0), 'f'=>'R$ 0,00');
        $arrNegociosFinal[$i][] = 0;
    }

    if ($negocios['somaTotal'] && $negocios['qtdTotal']) {
        $arrNegociosFinal[$i][] = $negocios['somaTotal'];
        $arrNegociosFinal[$i][] = $negocios['qtdTotal'];
    } else {
        $arrNegociosFinal[$i][] = array('v'=>intval(0), 'f'=>'R$ 0,00');
        $arrNegociosFinal[$i][] = 0;
    }

    if ($negocios['somaRenovados'] && $negocios['qtdRenovados']) {
        $arrNegociosFinal[$i][] = $negocios['somaRenovados'];
        $arrNegociosFinal[$i][] = $negocios['qtdRenovados'];
    } else {
        $arrNegociosFinal[$i][] = array('v'=>intval(0), 'f'=>'R$ 0,00');
        $arrNegociosFinal[$i][] = 0;
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
        // Load Charts and the corechart package.
        google.charts.load('current', {'packages':['corechart']});

        // Draw the pie chart for Sarah's pizza when Charts is loaded.
        google.charts.setOnLoadCallback(drawSarahChart);

        // Draw the pie chart for the Anthony's pizza when Charts is loaded.
        google.charts.setOnLoadCallback(drawAnthonyChart);


        // Callback that draws the pie chart for Sarah's pizza.
        function drawSarahChart() {

            // Create the data table for Sarah's pizza.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
                ['Mushrooms', 1],
                ['Onions', 1],
                ['Olives', 2],
                ['Zucchini', 2],
                ['Pepperoni', 1]
            ]);

            // Set options for Sarah's pie chart.
            var options = {title:'How Much Pizza Sarah Ate Last Night',
                width:400,
                height:300};

            // Instantiate and draw the chart for Sarah's pizza.
            var chart = new google.visualization.PieChart(document.getElementById('Sarah_chart_div'));
            //chart.draw(data, options);
        }


        // Callback that draws the pie chart for Anthony's pizza.
        function drawAnthonyChart() {

            // Create the data table for Anthony's pizza.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
                ['Mushrooms', 2],
                ['Onions', 2],
                ['Olives', 2],
                ['Zucchini', 0],
                ['Pepperoni', 3]
            ]);

            // Set options for Anthony's pie chart.
            var options = {title:'How Much Pizza Anthony Ate Last Night',
                width:400,
                height:300};

            // Instantiate and draw the chart for Anthony's pizza.
            var chart = new google.visualization.PieChart(document.getElementById('Anthony_chart_div'));
            //chart.draw(data, options);
        }

        google.charts.load('current', {'packages':['table']});
        google.charts.setOnLoadCallback(drawTable);

        function drawTable() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Consultor');
            data.addColumn('number', 'Total em aberto');
            data.addColumn('number', 'Qtd. Em aberto');
            data.addColumn('number', 'Renovacoes em aberto');
            data.addColumn('number', 'Qtd. Renovacoes em aberto');
            data.addColumn('number', 'Pagos total');
            data.addColumn('number', 'Qtd Pagos Total');
            data.addColumn('number', 'Total renovacoes pagas');
            data.addColumn('number', 'Qtd renovacoes pagas');
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

