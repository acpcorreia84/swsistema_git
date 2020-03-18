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
$totalPago = 0 ;
$totalEmAberto = 0 ;
$totalPedidosEmAberto = 0 ;
$totalRenovacoesEmAberto = 0 ;
$totalRenovacoesPagas = 0;
$totalPedidosPagos = 0;
$totalRenovacoesPerdidas = 0;

foreach($negociosEmAberto as $res){
    $arrNegocios[$res['id']]['id'] = $res['id'];
    $arrNegocios[$res['id']]['consultor'] = $res['consultor'];
    $arrNegocios[$res['id']]['somaTotalEmAberto'] = array('v'=>floatval($res['somaTotalEmAberto']), 'f'=>formataMoeda($res['somaTotalEmAberto']) . ' (' . floatval($res['qtdTotalEmAberto']).')' );
    $totalEmAberto += floatval($res['somaTotalEmAberto']);
}
foreach($negociosEmAbertoRenovacoes as $res){
    $arrNegocios[$res['id']]['id'] = $res['id'];
    $arrNegocios[$res['id']]['consultor'] = $res['consultor'];
    $arrNegocios[$res['id']]['somaARenovar'] = array('v'=>floatval($res['somaARenovar']), 'f'=>formataMoeda($res['somaARenovar']). ' (' . floatval($res['qtdARenovar']).')' );
    $totalRenovacoesEmAberto += floatval($res['somaARenovar']);
}

foreach($negociosPagosTotal as $res){
    $arrNegocios[$res['id']]['id'] = $res['id'];
    $arrNegocios[$res['id']]['consultor'] = $res['consultor'];
    $arrNegocios[$res['id']]['somaTotal'] = array('v'=>floatval($res['somaTotal']), 'f'=>formataMoeda($res['somaTotal']). ' (' . floatval($res['qtdTotal']).')' );
    $somaTotal += floatval($res['somaTotal']);
}

foreach($negociosPagosRenovacoes as $res){
    $arrNegocios[$res['id']]['id'] = $res['id'];
    $arrNegocios[$res['id']]['consultor'] = $res['consultor'];
    $arrNegocios[$res['id']]['somaRenovados'] = array('v'=>floatval($res['somaRenovados']), 'f'=>formataMoeda($res['somaRenovados']) . ' (' . floatval($res['qtdRenovados']).')' );
    $totalRenovacoesPagas += floatval($res['somaRenovados']);
}

foreach($negociosPerdidosRenovacoes as $res){
    $arrNegocios[$res['id']]['id'] = $res['id'];
    $arrNegocios[$res['id']]['consultor'] = $res['consultor'];
    $arrNegocios[$res['id']]['somaRenovacoesPerdidas'] = array('v'=>floatval($res['somaRenovacoesPerdidas']), 'f'=>formataMoeda($res['somaRenovacoesPerdidas']) . ' (' . floatval($res['qtdRenovacoesPerdidas']).')' );
    $totalRenovacoesPerdidas += floatval($res['somaRenovacoesPerdidas']);
}

foreach($negociosEmAbertoPedidos as $res){
    $arrNegocios[$res['id']]['id'] = $res['id'];
    $arrNegocios[$res['id']]['consultor'] = $res['consultor'];
    $arrNegocios[$res['id']]['somaPedidosAberto'] = array('v'=>floatval($res['somaPedidosAberto']), 'f'=>formataMoeda($res['somaPedidosAberto']) . ' (' . floatval($res['qtdPedidosAberto']).')' );
    $totalPedidosEmAberto += floatval($res['somaPedidosAberto']);
}

foreach($negociosPagosPedidos as $res){
    $arrNegocios[$res['id']]['id'] = $res['id'];
    $arrNegocios[$res['id']]['consultor'] = $res['consultor'];
    $arrNegocios[$res['id']]['somaPedidosPagos'] = array('v'=>floatval($res['somaPedidosPagos']), 'f'=>formataMoeda($res['somaPedidosPagos']) . ' (' . floatval($res['qtdPedidosPagos']).')' );
    $totalPedidosPagos += floatval($res['somaPedidosPagos']);
}


$arrNegociosFinal = array();
$i = 0;
foreach ($arrNegocios as $negocios) {
    $arrNegociosFinal[$i]['id'] =  $negocios['id'];

    $arrNegociosFinal[$i]['consultor'] =  $negocios['consultor'];

    if ($negocios['somaPedidosAberto'] ) {
        $arrNegociosFinal[$i]['totalPedidosEmAberto'] = $negocios['somaPedidosAberto'];

    } else {
        $arrNegociosFinal[$i]['totalPedidosEmAberto'] = array('v'=>floatval(0), 'f'=>'R$ 0,00');

    }
    if ($negocios['somaARenovar'] ) {
        $arrNegociosFinal[$i]['totalPedidosARenovar'] = $negocios['somaARenovar'];

    } else {
        $arrNegociosFinal[$i]['totalPedidosARenovar'] = array('v'=>floatval(0), 'f'=>'R$ 0,00');

    }

    if ($negocios['somaTotalEmAberto'] ) {
        $arrNegociosFinal[$i]['somaTotalEmAberto'] = $negocios['somaTotalEmAberto'];

    } else {
        $arrNegociosFinal[$i]['somaTotalEmAberto'] = array('v'=>floatval(0), 'f'=>'R$ 0,00');

    }

    if ($negocios['somaPedidosPagos'] ) {
        $arrNegociosFinal[$i]['totalPedidosPagos'] = $negocios['somaPedidosPagos'];

    } else {
        $arrNegociosFinal[$i]['totalPedidosPagos'] = array('v'=>floatval(0), 'f'=>'R$ 0,00');

    }

    if ($negocios['somaRenovados'] ) {
        $arrNegociosFinal[$i]['totalPedidosRenovados'] = $negocios['somaRenovados'];

    } else {
        $arrNegociosFinal[$i]['totalPedidosRenovados'] = array('v'=>floatval(0), 'f'=>'R$ 0,00');

    }

    if ($negocios['somaTotal'] ) {
        $arrNegociosFinal[$i]['somaTotalPagos'] = $negocios['somaTotal'];

    } else {
        $arrNegociosFinal[$i]['somaTotalPagos'] = array('v'=>floatval(0), 'f'=>'R$ 0,00');

    }
    $percentualPerdido = 0;
    if ($negocios['somaRenovacoesPerdidas'] ) {

        if ($negocios['somaARenovar']) {
            $percentualPerdido = $negocios['somaRenovacoesPerdidas']['v'] / $negocios['somaARenovar']['v'];
            $negocios['somaRenovacoesPerdidas']['f'] .= ' | '.round($percentualPerdido*100, 2) . '%' ;
        }

        $arrNegociosFinal[$i]['totalRenovacoesPerdidas'] = $negocios['somaRenovacoesPerdidas'];
        $totalRenovacoesPerdidas += $negocios['somaRenovacoesPerdidas']['v'];
    } else {
        $arrNegociosFinal[$i]['totalRenovacoesPerdidas'] = array('v'=>floatval(0), 'f'=>'R$ 0,00');

    }
    $i++;

}
/*echo '<pre>';
var_dump($arrNegociosFinal);
exit;*/


?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>GUIAR - Painel de indicadores</title>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!--<script src="../../extensions/Editor/js/dataTables.editor.min.js"></script>-->

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/colreorder/1.5.2/js/dataTables.colReorder.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
    <script src="inc/uteis.js"></script>


    <link rel="stylesheet" type="text/css" href="inc/DataTables/datatables.min.css"/>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/colreorder/1.5.2/css/colReorder.dataTables.min.css" rel="stylesheet">


    <script src="js/custom.js"></script>
    <script type="text/javascript" src="js/bootstrap-dialog.min.js"></script>
    <script type="text/javascript" src="bootstrap-select/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-dialog.min.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.min.css"/>
    <!-- Search Sleect Bootstrap -->
    <link rel="stylesheet" href="bootstrap-select/css/bootstrap-select.min.css">

    <style>
        td.details-control {
            background: url('img/Button-Add-icon.png') no-repeat center center;
            cursor: pointer;
        }
        tr.shown td.details-control {
            background: url('img/Button-Delete-icon.png') no-repeat center center;
        }
    </style>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable( {
                paging: false,
                "columns": [
                    {
                        "className":      'details-control',
                        "orderable":      false,
                        "data":           null,
                        "defaultContent": ''
                    },
                    { "data": "Consultor" },
                    { "data": "Pedidos em aberto" },
                    { "data": "Renovacoes em aberto" },
                    { "data": "Total em aberto" },
                    { "data": "Pedidos pagos" },
                    { "data": "Renovacoes Pagas" },
                    { "data": "Total Pago" },
                    { "data": "Total renovacoes perdidas" },
                    { "data": "id" }
                ],
                "order": [[1, 'asc']],
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'collection',
                        text: 'Exportar em:',
                        buttons: [
                            'copy',
                            'excel',
                            'csv',
                            'pdf',
                            'print'
                        ]
                    }
                ]
            } );

            // Add event listener for opening and closing details
            $('#example tbody').on('click', 'td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row( tr );
                dados = row.data();

                if ( row.child.isShown() ) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                }
                else {
                    // Open this row



                    var dadosajax = {
                        'funcao' : "carregar_detalhe_indicadores_usuario",
                        'idUsuario' : dados.id
                    };
                    $.ajax ({
                        url : 'funcoes/funcaoIndicadores.php',
                        data : dadosajax,
                        type : 'POST',
                        cache : true,

                        error : function (){
                            alertErro ('Error: Erro ao tentar capturar informacoes de indicadores do consultor,' + msnPadrao + '.');
                        },
                        success : function(result){
                            try {
                                var resultado = JSON.parse(result);
                                if (resultado.mensagem == 'Ok') {
                                    row.child( resultado.dados ).show();

                                } else if (resultado.mensagem == 'Erro') {
                                    alertErro(resultado.mensagemErro);
                                }
                            } catch (e){
                                console.log(result, e);
                                alertErro ('Error: Erro ao tentar capturar informacoes de indicadores do consultor,' + msnPadrao + ' '+e + '.');

                            }
                        }
                    });




                    tr.addClass('shown');
                }
            } );
        } );
    </script>

</head>
<body>

<img src="safeweb.png" ><br/> <br/>
<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th></th>

            <th>Consultor</th>
            <th>Pedidos em aberto</th>
            <th>Renovacoes em aberto</th>
            <th>Total em aberto</th>
            <th>Pedidos pagos</th>
            <th>Renovacoes pagas</th>
            <th>Total Pago</th>
            <th>Total renovacoes perdidas</th>
            <th>id</th>
        </tr>
    </thead>
    <tbody>

            <?php
            foreach ($arrNegociosFinal as $negocio) {
                echo '
                <tr>
                    
                    <td>&nbsp;</td>
                    <td>'.$negocio['consultor'].'</td>
                    <td>'.$negocio['totalPedidosEmAberto']['f'].'</td>
                    <td>'.$negocio['totalPedidosARenovar']['f'].'</td>
                    <td>'.$negocio['somaTotalEmAberto']['f'].'</td>
                    <td>'.$negocio['totalPedidosPagos']['f'].'</td>
                    <td>'.$negocio['totalPedidosRenovados']['f'].'</td>
                    <td>'.$negocio['somaTotalPagos']['f'].'</td>
                    <td>'.$negocio['totalRenovacoesPerdidas']['f'].'</td>
                    <td>'.$negocio['id'].'</td>
                </tr>            
                ';
            }
            ?>

    </tbody>
    <tfoot>
    <tr>

        <th></th>
        <th><span style="color: darkred">TOTAIS:</span></th>
        <th><span style="color: darkred"><?=formataMoeda($totalPedidosEmAberto)?></span></th>
        <th><span style="color: darkred"><?=formataMoeda($totalRenovacoesEmAberto)?></span></th>
        <th><span style="color: darkred"><?=formataMoeda($totalEmAberto)?></span></th>
        <th><span style="color: darkred"><?=formataMoeda($totalPedidosPagos)?></span></th>
        <th><span style="color: darkred"><?=formataMoeda($totalRenovacoesPagas)?></span></th>
        <th><span style="color: darkred"><?=formataMoeda($somaTotal)?></span></th>
        <th><span style="color: darkred"><?=formataMoeda($totalRenovacoesPerdidas)?></span></th>
        <th>id</th>
    </tr>
    </tfoot>
</table>
</body>
</html>

