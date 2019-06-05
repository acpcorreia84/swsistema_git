<div id="modalUsuarioRegistrarComissao" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-10">
                    <h3><i class="fa fa-2x fa-floppy-o"></i> Registrar Comiss&atilde;o </h3>
                </div>
                <div class ="col-lg-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalDuvida" onclick="modalDuvida(2)"><i class="fa fa-lg fa-question"></i></button>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#modalUsuarioRegistrarComissao"><i class="fa fa-lg fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <form method="post" action="#" id="frmRegistrarComissao">
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="spanRcPeriodoDe">Per&iacute;odo de registro </label>
                        </div>
                        <div class="col-lg-8">
                            <label for="spanRcDescricao">Descri&ccedil;&atilde;o </label>
                        </div>
                    </div> <!--DIV CLASS row-->
                    <div class="row">
                        <div class="col-lg-4">
                            De <span id="spanRcPeriodoDe"></span> At&eacute; <span id="spanRcPeriodoAte"></span>
                        </div>
                        <div class="col-lg-8">
                            <span id="spanRcDescricao"></span>
                        </div>

                    </div> <!--DIV CLASS row-->

                    <div class="row">
                        <div class="col-lg-4">
                            <label for="spanRcVendas">Vendas </label>
                        </div>

                    </div> <!--DIV CLASS row-->
                    <div class="row">
                        <div class="col-lg-4">
                            <span id="spanRcVendas"></span>
                        </div>

                    </div> <!--DIV CLASS row-->

                    <div class="row">

                        <div class="col-lg-4">
                            <label for="spanRcComissaoVendas">% Vendas </label>
                        </div>

                    </div> <!--DIV CLASS row-->
                    <div class="row">

                        <div class="col-lg-4">
                            <span id="spanRcComissaoVendas"></span>
                        </div>

                    </div> <!--DIV CLASS row-->

                </form>
            </div><!--DIV MODAL-CONTENT-->
            <div class="modal-footer">
                <div id="divBtnRegistrarComissaoUsuario">
                    <button class="btn btn-info" id="btnRegistrarComissao" onclick="registrarComissaoUsuario()"><i class="fa fa-floppy-o" aria-hidden="true"></i> Registrar </button>
                </div>
            </div>
        </div>
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID ajudaModalDetalhar-->
