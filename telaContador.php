<?
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';
require_once 'header.php';
require_once 'inc/script.php';
?>
<body>
<!-- MODAL DO SISTEMA DE CONTADOR -->
<div id="wrapper">
    <? require_once('inc/menu.php')?>
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row" style="margin-top:50px;">
                <!--PAINEL DE FILTROS-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Filtros
                    </div>
                    <div class="panel-body">
                        <? require_once 'inc/filtros/filtroContador.php';?>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Contadores

                    </div><!-- PANEL HEADING -->

                    <div class="panel-body">

                        <div id="qtdContadoresConsulta" ></div>

                        <script src="inc/paginator/jquery.twbsPagination.js" type="text/javascript"></script>
                        <ul class="paginacao pagination-sm" id="paginacaoContadorTopo" ></ul>

                        <div id="divTabelaContadores"></div><!-- DIV TABLE - REPOSNSIVE -->
                        <ul class="paginacao" id="paginacaoContadorRodape" ></ul>
                        <div id="divContatosContadoresPopOver"></div>


                    </div><!-- PANEL BODY -->
                </div><!-- panel default -->


            </div><!--CONTAINER-FLUID-->
        </div><!--PAGE-WRAPPER-->
    </div><!-- WRAPPER -->
</div>

<script>
    $(document).ready(function(){
        carregarContadores(0, 50, '', 'sim');
        carregarFiltrosContadores();
    })
</script>


<? require_once 'modais/contador/modalContadorDetalhar.php'; ?>
<? include 'modais/contador/modalContadorRegistrarComissao.php'; ?>
<? include 'modais/contador/modalContadorRegistrarLancamentoComissao.php'; ?>

<? include 'modais/certificados/certificadoModalDetalharCertificado.php'; ?>

<? require_once 'modais/contador/contadorDetalharContatos.php'; ?>
<? require_once 'modais/contador/contadorDetalharAcao.php'; ?>
<? require_once 'modais/contador/modalContadorInserirEditar.php'; ?>
<? require_once 'modais/contador/modalContadorSalvarContato.php'; ?>
<? require_once 'modais/contador/contadorExcluir.php'; ?>
<? require_once 'modais/contador/contadorVisualizar.php'; ?>
<? require_once 'modais/contador/contadorInserirObservacao.php'; ?>
<? require_once 'modais/contador/contadorDetalharAcaoCrm.php'; ?>
<? require_once 'modais/modalLoading.php'; ?>

</body>
</html>