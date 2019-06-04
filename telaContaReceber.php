<?
require_once $_SERVER['DOCUMENT_ROOT'].'/loader.php';
require_once 'header.php';
require_once 'inc/script.php';
?>
<body>
    <script src="inc/paginator/jquery.twbsPagination.js" type="text/javascript"></script>
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
                            <? include 'inc/filtros/filtroContasReceber.php';?>
                        </div>
                    </div>

                    <div class="row" >
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Lista de Contas a Receber
                                </div><!-- PANEL HEADING -->

                                <div class="panel-body">

                                    <ul class="paginacao pagination-sm" id="paginacao_contas_receber_topo" ></ul>
                                    <div class="table table-responsive" id="divTabelaContasReceber">

                                    </div><!-- DIV TABLE - REPOSNSIVE -->
                                    <ul class="paginacao" id="paginacao_contas_receber_rodape" ></ul>
                                </div><!-- PANEL BODY -->
                            </div><!-- panel default -->
                        </div><!-- COL LG 12 -->
                    </div><!-- CLASS ROW -->
                </div><!--CONTAINER-FLUID-->
            </div><!--PAGE-WRAPPER-->
        </div><!-- WRAPPER -->
    </div>

    <script>
        $(document).ready(function(){
            carregaPaginacaoContasReceber();
            carregarContasReceber();
        })
    </script>

    <? include_once 'modais/contas_receber/modalContaReceberDetalhar.php'; ?>
    <? include_once 'modais/contas_receber/modalContaReceberBaixarPagamento.php'; ?>
    <? include_once 'modais/contas_receber/modalContaReceberExtornarPagamento.php'; ?>
    <? include_once 'modais/modalLoading.php'; ?>



</body>
</html>