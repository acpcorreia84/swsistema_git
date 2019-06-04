<?
require_once $_SERVER['DOCUMENT_ROOT'].'/loader.php';

require_once 'header.php';
require_once 'inc/script.php';
?>
<body onload="carregarParceirosRelatorioComissao(); $('#modalCarregando').modal('show');">
<!-- MODAL DO SISTEMA DE CONTADOR -->
<div id="wrapper">
    <? include('inc/menu.php')?>
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row" style="margin-top:50px;">
                <!--PAINEL DE FILTROS-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Filtros
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-4">
                                Per&iacute;odo Comiss&atilde;o
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <input type='text' class="datepicker-here form-control" data-position="right top" id="filtroPeriodoComissao" name="filtroPeriodoComissao"/>
                                <script>
                                    // Initialization
                                    $('#filtroPeriodoComissao').datepicker({language:"pt-BR", range:'true'});
                                    // Access instance of plugin
                                    var dataPk = $('#filtroPeriodoComissao').data('datepicker');
                                    //dataPk.update('minDate', new Date());

                                    dataAtual = new Date();
                                    function ResetaData() {
                                        dataPk.selectDate([new Date(dataAtual.getFullYear(),dataAtual.getMonth()-1,'01'), new Date(dataAtual.getFullYear(),dataAtual.getMonth()-1,<?=getLastDayOfMonth(date('m')-1,date('Y'));?>)]);
                                    }
                                    ResetaData();
                                </script>
                                <button class="btn btn-success" onclick="carregarParceirosRelatorioComissao(); $('#modalCarregando').modal('show');"><i class="fa fa-filter" aria-hidden="true"></i> Filtrar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--PAINEL DE FILTROS-->

                <div class="row" >
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Lista de Parceiros - Comissionamento
                            </div><!-- PANEL HEADING -->

                            <div class="panel-body">
                                <div class="table table-responsive" id="divTabelaParceirosComissionamento">
                                </div><!-- DIV TABLE - REPOSNSIVE -->
                            </div><!-- PANEL BODY -->
                        </div><!-- panel default -->
                    </div><!-- COL LG 12 -->
                </div><!-- CLASS ROW -->
            </div><!--CONTAINER-FLUID-->
        </div><!--PAGE-WRAPPER-->
    </div><!-- WRAPPER -->
</div><!-- WRAPPER -->

<? include 'modais/parceiro/modalParceiroDetalhar.php'; ?>
<? include 'modais/parceiro/modalParceiroRegistrarLancamentoComissao.php'; ?>

<? include 'modais/certificados/certificadoModalDetalharCertificado.php'; ?>
<? include 'modais/parceiro/modalParceiroRegistrarComissao.php'; ?>

<? include 'modais/parceiro/modalParceiroInserir.php'; ?>
<? include 'modais/parceiro/modalParceiroVincularUsuario.php'; ?>
<? include 'modais/parceiro/modalParceiroDesvincularUsuario.php'; ?>
<? include 'modais/parceiro/parceiroModalAguardandoResposta.php'; ?>

<? include 'modais/modalLoading.php'; ?>

</body>
</html>