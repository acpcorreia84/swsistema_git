<? /** * Created by PhpStorm. * User: Lincoln * Date: 20/09/2016 * Time: 15:28 */ ?>
<? require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php'; ?>
<? include 'header.php';?>
<body onload="carrega_perfil('geral')">
    <div id="wrapper">
        <? include 'inc/menu.php';?>
        <div id="page-wrapper">
            <div class="container-fluid">
                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-8" style="margin-top: 5%;">
                        <table class="table table-bordered table-responsive">
                            <thead>
                            <tr>
                                <td>Cod.</td>
                                <td>Nome</td>
                                <td>A&ccedil;&otilde;es</td>
                            </tr>
                            </thead>

                            <tbody id="tabelaPerfil">

                            </tbody>
                        </table>
                    </div><!-- /.col -->

                    <!-- MODAL DE DETALHAR O PERFIl -->
                    <div id="detalharPerfil" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <i class="fa fa-users fa-lg"></i> Permiss&atilde;o de Perfil
                                </div><!-- /. modal header -->
                                <div class="modal-body">
                                </div><!-- /. modal body-->
                                <div class="modal-footer">
                                </div><!-- /. modal footer-->
                            </div><!-- /.modal content -->
                        </div><!-- /.modal dialog -->
                    </div><!-- detalharPerfil /. moda fade -->
                    <!-- FIM MODAL DETALHAR O PERFIL -->
            </div><!-- ,. container -->
        </div><!-- /. page-wrapper -->
    </div><!-- /. wrapper -->
</body>
<? include 'inc/script.php';?>
</html>
