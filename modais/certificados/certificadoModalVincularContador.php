
<div id="vincularContador" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-lg-10">
                    <h3><i class="fa fa-lg fa-retweet "></i> Alterar Contador do Certificado: </h3>
                </div>
                <div class="col-lg-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalDuvida" onclick="modalDuvida(2)"><i class="fa fa-lg fa-question"></i></button>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#vincularContador"><i class="fa fa-lg fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <form method="post" action="#">
                    <div class="row">
                        <div class="col-lg-6">
                            <h4>Alterar Contador:</h4>
                        </div>
                        <div class="panel-body" >
                            <!-------------------------CONTADOR ------------------------->
                            <div class="row">
                                <div class="col-xs-12 col-lg-12 col-md-12 ">
                                    <div class="col-xs-4 col-lg-4 col-md-4 " >
                                        <label>Contador</label>
                                        <div id="div_select_contadores_vincular"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-xs-4 col-lg-4 col-md-4 " >
                                        <label for="vcEdtObservacao">Motivo:</label>
                                        <textarea class="form-control" id="vcEdtObservacao" onblur="liberaBtn(this,'vinContador')"></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-------------------------FIM CONTADOR ------------------------->
                        </div>
                    </div><!--DIV MODAL-CONTENT-->
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success oculto" id="vinContador" onclick="vincula_contador();">Vincular</button>
            </div>
        </div>
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID ajudaModalDetalhar-->