<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 27/04/2021
 * Time: 15:13
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

ini_set('memory_limit', '256M');
error_reporting(E_ALL ^ E_NOTICE);

$arrResult = array();
$arrLines = file($_SERVER['DOCUMENT_ROOT']."/inc/jQuery-File-Upload-9.17.0/server/php/files/".$_GET['nomeArquivo']);
foreach($arrLines as $line) {
    $arrResult[] = explode(';', str_replace('"', "", trim(utf8_encode($line))));
}
$arrFinal = array();
$colunas = explode(';', str_replace('"', "", trim($arrLines[0])));
foreach ($arrResult as $res) {
    $arrFinal[] = array('TID'=>$res[0], 'CLIENTE'=>$res[1], 'DOCUMENTO'=>$res[2], 'DATA'=>$res[8]);
}
/*echo "<pre>";
var_dump($arrFinal);
echo "</pre>";*/
/*
 * INSERE TODAS AS COLUNAS EM UM ARRAY
 * */
$confereColunas = array(
    'Id'=>'', 'Nome do Cliente'=>'', 'Documento'=>'', 'E-mail'=>'',
    'Valor'=>'', 'Taxa' =>'', 'Vendedor' =>''
);

foreach ($arrResult as $key=>$linha) {

    /*
     * CONFERE SE EXISTEM TODAS AS COLUNAS NO RELATORIO
     * */


    foreach ($confereColunas as $key=>$valor) {
        if (array_search (trim($key), $colunas)!==false)
            $confereColunas[$key] = 'Ok';

    }
}
/*
 * CONFERE SE O ARQUIVO ESCOLHIDO E VALIDO OU NAO
 * */

$arquivoValido = true;
foreach ($confereColunas as $key=>$valor) {
    if ($valor== '')
        $arquivoValido = false;

}

if ($arquivoValido) {
    /*
     * INSERE TODOS OS PAGAMENTOS  NUM ARRAY SERIALIZA E INSERE NA SESSAO
     * CONTENDO OS INDICES IGUAIS AO NOME DAS COLUNAS DO RELATORIO
     * */

    $_SESSION['arrayBaixas'] = serialize($arrFinal);

}
?>
<html>
<head>

    <script src="../../js/jquery.js"></script>

    <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../js/bootstrap-dialog.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap-dialog.min.css">
    <script type="text/javascript" src="../../inc/uteis.js"></script>
    <script src="../../js/telaCertificado.js"></script>
    <link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <style>
        table.excel {
            border-style:ridge;
            border-width:1;
            border-collapse:collapse;
            font-family:sans-serif;
            font-size:12px;
        }
        table.excel thead th, table.excel tbody th {
            background:#CCCCCC;
            border-style:ridge;
            border-width:1;
            text-align: center;
            vertical-align:bottom;
        }
        table.excel tbody th {
            text-align:center;
            width:20px;
        }
        table.excel tbody td {
            vertical-align:bottom;
        }
        table.excel tbody td {
            padding: 0 3px;
            border: 1px solid #EEEEEE;
        }
    </style>
</head>

<body>
<? if ($arquivoValido) { ?>
    <div class="row">
        <div class="col-lg-7">
            <button class="btn btn-success" onclick="importarBaixasPagamentos()">
                <i class="glyphicon glyphicon-download"></i>
                <span>Importar</span>
            </button>
        </div>

    </div>
<br>
    <div>
        <div>
            <div class="panel panel-default">
                <div class="panel-body bg-info">
                    <div class="row">
                        <div class="col-lg-4" id="periodoImportacao">

                        </div>

                        <div class="col-lg-4">
                            <label>Quantidade total:</label> <span id="spanQuantidadeCertificadosTotaisAImportar"><?=count($arrFinal)?>

                        </span>
                        </div>

                        <div class="col-lg-4">
                            <label>Quantidade importada:</label> <span id="spanQuantidadePagamentosImportados">...</span>
                        </div>
                    </div>

                </div>
            </div>
                                <?php
?>
            <h3>Pagamentos:</h3>
            <div id="divTabelaPagamentosImportados2">
                <table class="table table-striped table-bordered">
                    <?php
                    $i= 0;
                    foreach ($arrFinal as $linha) {
                        if ($i === 0) {
                            echo '<thead class="thead-dark"><tr>';
                            foreach ($linha as $celula ) echo "<th>".$celula."</th>";
                            echo "</tr></thead><tbody>";
                        }
                        else {
                            echo '<tr>';
                            foreach ($linha as $celula ) echo "<td>".$celula."</td>";
                            echo "</tr>";

                        }
                        $i++;
                    }

                    ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
<? } else {?>
    <script>
        alertErro('Este arquivo n&atilde;o &eacute; v&aacute;lido!');
    </script>
<? }?>
</body>
</html>
