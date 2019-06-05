<?php
//error_reporting(E_ALL ^ E_NOTICE);
require_once 'excel_reader2.php';
$data = new Spreadsheet_Excel_Reader($_SERVER['DOCUMENT_ROOT']."/inc/jQuery-File-Upload-9.17.0/server/php/files/".$_GET['nomeArquivo']);

/*
 * INSERE TODAS AS COLUNAS EM UM ARRAY
 * */
$colunas = array();
for ($iCol = 1; $iCol < $data->colcount(); $iCol++) {
    $colunas[$data->val(1,$iCol)] = $iCol;
}

/*
 * INSERE TODOS OS CERTIFICADOS NUM ARRAY CONTENDO OS INDICES IGUAIS AO NOME DAS COLUNAS DO RELATORIO
 * */
$arrCertificados = array();
for ($iCd = 2; $iCd < $data->rowcount(); $iCd++) {
    $arrCertificado = array();
    foreach ($colunas as $nomeColuna=>$numeroColuna)
        $arrCertificado[$nomeColuna] = $data->val($iCd, $numeroColuna);

    $arrCertificados[] = $arrCertificado;
}

var_dump($arrCertificados);
?>
<html>
<head>
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
<a class="btn btn-success" href="../jQuery-File-Upload-9.17.0/importacaoCertificados.html">
    <i class="glyphicon glyphicon-arrow-left"></i>
    <span>Voltar</span>
</a>
<?php echo $data->dump(true,true); ?>
</body>
</html>
