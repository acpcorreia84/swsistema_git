<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';
ini_set('memory_limit', '256M');
//error_reporting(E_ALL ^ E_NOTICE);
require_once 'excel_reader2.php';
$data = new Spreadsheet_Excel_Reader($_SERVER['DOCUMENT_ROOT']."/inc/jQuery-File-Upload-9.17.0/server/php/files/".$_GET['nomeArquivo']);

/*
 * INSERE TODAS AS COLUNAS EM UM ARRAY
 * */
$confereColunas = array(
    'Protocolo'=>'', 'Nome'=>'', 'Documento'=>'', 'AVP'=>'',
    'CPFAVP'=>'', 'DtInclusao'=>'', 'DtInicioValidade'=>'', 'DtFimValidade'=>'', 'Status'=>''
);


$colunas = array();
for ($iCol = 1; $iCol < $data->colcount()+1; $iCol++) {
    $colunas[$data->val(1,$iCol)] = $iCol;
    /*
     * CONFERE SE EXISTEM TODAS AS COLUNAS NO RELATORIO
     * */
    foreach ($confereColunas as $key=>$valor) {
        if (trim($key) == trim($data->val(1, $iCol)))
            $confereColunas[$key] = 'Ok';
    }
}
/*
 * CONFERE SE O ARQUIVO ESCOLHIDO E VALIDO OU NAO
 * */
$arquivoValido = true;
foreach ($confereColunas as $key=>$valor)
    if ($valor== '')
        $arquivoValido = false;

if ($arquivoValido) {
    /*
     * INSERE TODOS OS CERTIFICADOS NUM ARRAY SERIALIZA E INSERE NA SESSAO
     * CONTENDO OS INDICES IGUAIS AO NOME DAS COLUNAS DO RELATORIO
     * */
    $arrCertificados = array();
    for ($iCd = 2; $iCd < $data->rowcount()+1; $iCd++) {
        $arrCertificado = array();
        foreach ($colunas as $nomeColuna=>$numeroColuna)
            $arrCertificado[$nomeColuna] = $data->val($iCd, $numeroColuna);


        $arrCertificados[] = $arrCertificado;
    }
    $_SESSION['arrayCertificadosValidados'] = serialize($arrCertificados);

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
<? if ($arquivoValido) {?>
<div class="row">
    <div class="col-lg-7">
        <button class="btn btn-success" onclick="importarCertificadosValidados()">
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
                        <label>Quantidade total:</label> <span id="spanQuantidadeCertificadosTotaisAImportar"><?=$data->rowcount()-2?></span>
                    </div>

                    <div class="col-lg-4">
                        <label>Quantidade importada:</label> <span id="spanQuantidadeCertificadosImportados">...</span>
                    </div>
                </div>

            </div>
        </div>
        <h3>Certificados N&atilde;o Importados:</h3>
        <div id="divTabelaCertificadosNaoImportados"></div>
        <h3>Certificados Importados:</h3>
        <div id="divTabelaCertificadosImportados">
            <?php echo $data->dump(true,true); ?>
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
