<?
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';
?>
<? include 'header.php';?>
<body onload="carregarFaturamento(<?=$usuarioLogado->getId()?>,'carregarFaturamento')" oncontextmenu="return false" ondragstart="return false" onselectstart="return false">
<div id="wrapper">
    <? include 'inc/menu.php' ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row" style="margin-top:5%;">
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-money fa-lg fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <h5>Faturado</h5>
                                    <h3><span id="qrSpanOutros"></span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <!--<i class="fa fa-hand-lizard-o fa-ban fa-3x"></i>-->
                                </div>
                                <div class="col-xs-9 text-right">
                                    <h5>Leitoras</h5>
                                    <h3><span id="qrSpanLeitora"></span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-edge fa-lg fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <h5>E-nota</h5>
                                    <h3><span id="qrSpanEnota"></span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top:50px;">

                <div class="table table-responsive">
                    <table id="tabela" class="table table-striped table-bordered  naoImprimir"></table>
                    </div>

                <p>  <br/>
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="text-center"> QUADRO RESUMO</h4>
                        <p class="text-success text-big">Quantidade de certificados: <span id="qrSpanQtdCert"></span> </p>
                        <p class="text-success text-big">Total de venda: <span id="qrSpanTotal"></span></p>
                        <p class="text-danger">Produtos: </p> <span id="qrSpanProdutos"></span>
                        <br/>
                    </div>
                </div><!-- panel success -->
            </div><!-- col lg 4 -->
        </div><!-- row-->
    </div><!-- page-wrapper -->
</div><!-- DIV ID WRAPPER -->


<? include 'modais/faturamento/faturamentoVisualizarProtocolo.php'; ?>
<!-- MODAl DA PAGINA-->


<? include 'inc/script.php'; ?>
</>
</html>