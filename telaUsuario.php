<? /**  * Created by PhpStorm. * User: Lincoln  * Date: 19/09/2016  * Time: 14:43  */
    require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';
    include 'header.php';
    include 'inc/script.php';
?>
<body onload="carregarUsuarios(0, 50,'sim');">

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
                            <? include 'inc/filtros/filtroUsuario.php';?>
                        </div>
                    </div>

                    <div class="row" >
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Usu&aacute;rios
                                </div><!-- PANEL HEADING -->

                                <div class="panel-body">
                                    <div id="qtdUsuariosConsulta"></div>
                                    <script src="inc/paginator/jquery.twbsPagination.js" type="text/javascript"></script>
                                    <ul class="paginacao pagination-sm" id="paginacaoUsuariosTopo" ></ul>

                                    <div class="table table-responsive" id="divTabelaUsuarios"></div>
                                    <ul class="paginacao pagination-sm" id="paginacaoUsuariosRodape" ></ul>
                                </div><!-- PANEL BODY -->
                            </div><!-- panel default -->
                        </div><!-- COL LG 12 -->
                    </div><!-- CLASS ROW -->
                </div><!--CONTAINER-FLUID-->
            </div><!--PAGE-WRAPPER-->
        </div><!-- WRAPPER -->
    </div><!-- WRAPPER -->


    <? include 'modais/usuarios/modalUsuarioDetalhar.php'; ?>
    <? include 'modais/usuarios/modalUsuarioRegistrarLancamentoComissao.php'; ?>

    <? include 'modais/usuarios/modalUsuarioRegistrarComissao.php'; ?>

    <? include 'modais/certificados/certificadoModalDetalharCertificado.php'; ?>

    <? include 'modais/usuarios/modalUsuarioVincularLocal.php'; ?>
    <? include 'modais/usuarios/modalUsuarioInserirEditar.php'; ?>
    <? include 'modais/modalLoading.php'; ?>

</body>
</hmtl>
