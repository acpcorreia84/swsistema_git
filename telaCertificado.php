<? /**  * Created by PhpStorm. * User: Lincoln  * Date: 19/09/2016  * Time: 14:43  */
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';
include 'header.php';
include 'inc/script.php';
?>
<body>

<script>
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
</script>
<div id="wrapper">
    <? include('inc/menu.php')?>
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row" style="margin-top:50px;">
                <!--PAINEL DE FILTROS-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-filter" aria-hidden="true"></i> Filtros <a href="#"> <i class="fa fa-bars" id="btnFiltroCd" ></i></a>
                    </div>

                    <script>
                        $('#btnFiltroCd').click (function () {
                            var visivel  = $('#divFiltrosCertificados').is(':visible');
                            if (visivel) {
                                $("#divFiltrosCertificados").css({visibility: 'hidden', display: 'none'});
                            }

                            else {
                                $("#divFiltrosCertificados").css({visibility: 'visible', display: 'block'});
                                carregarFiltrosCertificados($('#filtroUsuariosCertificados').val());
                            };
                        });

                    </script>
                    <div class="panel-body oculto" id="divFiltrosCertificados">
                        <div id="divFiltros"></div>
                        <? include 'inc/filtros/filtroCertificado.php';?>
                    </div>
                </div>

                <!--QUADROS RESUMO: PAGOS, EM ABERTO-->
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-check fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div id="valorCertificadosPagos">carregando...</div>
                                            <div>Pagos</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" onclick="$('#filtroChkApenasPagos').prop('checked', true).change();">
                                    <div class="panel-footer">
                                        <span class="pull-left">Detalhes</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-times fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div id="valorCertificadosEmAberto">carregando...</div>
                                            <div>Em aberto</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" onclick="$('#filtroChkApenasPagos').prop('checked', false).change();">
                                    <div class="panel-footer">
                                        <span class="pull-left">Detalhes</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div><!-- /.row -->
                <!--FIM DE QUADROS RESUMO: PAGOS, EM ABERTO-->


                <div class="row" >
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Certificados | | Legenda: <i class="fa fa-square" style="color: #0b2c89"></i> Pedido | <i class="fa fa-square text-success"></i> Renova&ccedil;&atilde;o  | <i class="fa fa-square" style="color: purple"></i> Recarteiriza&ccedil;&atilde;o
                            </div><!-- PANEL HEADING -->

                            <script src="inc/paginator/jquery.twbsPagination.js" type="text/javascript"></script>
                            <div class="panel-body">
                                <div id="qtdCertificadosConsulta"></div>
                                <ul class="paginacao pagination-sm"  ></ul>

                                <div class="table table-responsive" id="divTabelaCertificados"></div>

                                <ul class="paginacao" ></ul>
                            </div><!-- PANEL BODY -->
                        </div><!-- panel default -->
                    </div><!-- COL LG 12 -->
                </div><!-- CLASS ROW -->
            </div><!--CONTAINER-FLUID-->
        </div><!--PAGE-WRAPPER-->
    </div><!-- WRAPPER -->
</div><!-- WRAPPER -->

<script>
    $(document).ready(function () {
        carregarCertificados(undefined,undefined,undefined,'sim');
    });
</script>
<!-- MODAIS DA PAGINA-->
<div class="container">
    <? require_once 'modais/modalImportarBaixaStone.php' ?>
    <? require_once 'modais/modalImportarCertificadosValidados.php'?>
    <? require_once 'modais/modalImportarBaixaPagamentos.php' ?>
    <? include 'modais/certificados/certificadoModalDetalharCertificado.php';?>
    <? //include 'modais/certificados/certificadoInserirCupom.php';?>

    <? include 'modais/certificados/certificadoModalInformacoesPagamento.php'?>




    <? include 'modais/certificados/certificadoModalTrocarConsultor.php';?>
    <? include 'modais/certificados/certificadoModalGerarProtocolo.php'?>
    <? include 'modais/certificados/certificadoModalGerarBoleto.php'?>
	<? include 'modais/certificados/certificadoModalVendaInterna.php'; ?>
    <? include 'modais/certificados/certificadoModalTrocarProduto.php';?>

    <? include 'modais/certificados/certificadoModalDesconto.php'?>
    <? include 'modais/certificados/certificadoModalEditarCliente.php';?>
    <? include 'modais/certificados/certificadoModalInserirObservacao.php';?>
    <? include 'modais/certificados/certificadoModalVincularContador.php'?>

    <? include_once 'modais/contas_receber/modalContaReceberBaixarPagamento.php'; ?>
    <? include "modais/modalLoading.php";?>

	<? include 'modais/certificados/certificadoModalVisualizarProtocolo.php';?>

	<? include 'modais/certificados/certificadoModalApagar.php';?>

	<? include 'modais/certificados/certificadoModalDuvida.php'?>



</div> <!--DIV CLASS CONTAINER-->

</body>
</html>
