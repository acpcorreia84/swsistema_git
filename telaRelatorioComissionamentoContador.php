<? /**  * Created by PhpStorm. * User: Lincoln  * Date: 19/09/2016  * Time: 14:43  */
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';
include 'header.php';
include 'inc/script.php';
?>
<body >

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
                    <div class="panel-body" >
                        <? require_once 'inc/filtros/filtroRelatorioComissionamentoContador.php';?>
                    </div>
                </div>


                <div class="row" >
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Lista de Contadores - Comissionamento
                            </div><!-- PANEL HEADING -->

                            <script src="inc/paginator/jquery.twbsPagination.js" type="text/javascript"></script>
                            <div class="panel-body">
                                <div id="qtdContadoresConsulta"></div>
                                <ul class="paginacao " ></ul>

                                <div class="table table-responsive" id="divTabelaContadoresComissionamento"></div>

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
    $(document).ready(function(){
        carregarContadoresRelatorioComissao(0,50,'sim');
        carregarFiltrosContadores();
    })
</script>

<!-- MODAIS DA PAGINA-->
<div class="container">



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





</div> <!--DIV CLASS CONTAINER-->
</body>
</html>
