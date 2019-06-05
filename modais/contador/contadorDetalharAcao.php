<!-- INICIO DO MODAL DETALHAR ACAO CONTADOR -->
<div id="detalharAcaoContador" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-11">
                    <h3><i class="fa fa-lg fa-arrows "></i> Edi&ccedil;&otilde;es feitas no Contador </h3>
                    <input type="hidden" name="idContador" id="idContador">
                </div>
                <div class ="col-lg-1">
                    <h3>
                        <a class="btn btn-danger" data-toggle="modal" data-target="#detalharAcaoContador"><i class="fa fa-lg fa-close"></i></a>
                    </h3>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <h4>A&ccedil;&otilde;es:</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="table table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <td>C&oacute;digo</td>
                                <td>Usuario</td>
                                <td>Data Cadastro</td>
                                <td>Descri&ccedil;&atilde;o</td>
                            </tr>
                            </thead>
                            <tbody id="daTableAcao">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!--DIV MODAL-CONTENT-->
            <div class="modal-footer"></div>
        </div>
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID detalharContador-->
<!-- FIM DO MODAL DETALHAR ACAO CONTADOR-->
