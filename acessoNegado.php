<?
require_once $_SERVER['DOCUMENT_ROOT'] . "/loader_off.php";

    $motivo = "";

    switch ($_GET['motivo']) {
        case 1:
            $motivo = "Voc&ecirc; tentou acessar uma &aacute;rea restrita no sistema";
            break;
        case 2:
            $motivo = "Voc&ecirc; n&atilde;o est&aacute logado, por favor fa&ccedil;a o login para acessar.";
            break;
    }



?>
<html>
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Sistema Serama 3.0">
<meta name="author" content="Yan Lincoln Menezes Galucio">
<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="pragma" content="no-cache" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!-- Search Sleect Bootstrap -->
<script src="inc/uteis.js"></script>

<title><?=TITULO_GERAL?></title>
<body>
<br>

<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2" style="text-align: center; padding: 20px">
            <img src="img/logo_serama.gif" />
        </div>

        <div class="col-sm-8 col-sm-offset-2">

                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i><span class="fa-2x"> Acesso Negado</span>

                        </div>
                    </div><!-- PANEL HEADING -->

                    <div class="panel-body">
                        <h3>Motivo: <?=$motivo?></h3>
                    </div><!-- PANEL BODY -->
                    <div class="panel-footer">
                        <button class="btn btn-default" onclick="voltar()"><i class="fa fa-chevron-left" aria-hidden="true"></i> Voltar</button>
                        <button class="btn btn-default"  onClick="ir('index.php')"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Tela de Login</button>

                    </div><!-- PANEL FOOTER -->
                </div><!-- PANEL -->
        </div>
    </div>
</div><!-- CONTAINER FLUID -->

</body>
</html>
