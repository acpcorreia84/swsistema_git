<?
require_once $_SERVER['DOCUMENT_ROOT'].'/loader.php';

require_once 'header.php';
require_once 'inc/script.php';
?>
<body onload="carregar_parceiros(0, 50,'sim');">
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
                        <? include 'inc/filtros/filtroParceiro.php';?>
                    </div>
                </div>

                <div class="row" >
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Parceiro
                            </div><!-- PANEL HEADING -->

                            <div class="panel-body">
                                <input type="hidden" id="qtdParceiros">
                                <div id="qtdParceirosConsulta"></div>
                                <script src="inc/paginator/jquery.twbsPagination.js" type="text/javascript"></script>
                                <ul class="paginacao pagination-sm" id="paginacaoParceiroTopo" ></ul>

                                <div class="table table-responsive" id="divTabelaParceiros">

                                </div><!-- DIV TABLE - REPOSNSIVE -->
                                <ul class="paginacao" id="paginacaoParceiroRodape" ></ul>
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