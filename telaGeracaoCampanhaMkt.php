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
                        <? require_once 'inc/filtros/filtroRelatorioCampanha.php';?>
                    </div>
                </div>


                <div class="row" >
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Relat&oacute;rio de Comiss&aacute;o de contadores
                            </div><!-- PANEL HEADING -->

                            <div class="panel-body">
                                <div id="qtdDadosRelatorio"></div>

                                <div class="table table-responsive" id="divTabelaCampanha"></div>

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
        carregarFiltrosRelatorios();
        carregarDadosCampanha();
    })
</script>

<!-- MODAIS DA PAGINA-->
<div class="container">

    <? require_once 'modais/modalLoading.php'; ?>





</div> <!--DIV CLASS CONTAINER-->
</body>
</html>
