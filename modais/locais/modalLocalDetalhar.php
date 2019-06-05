<div id="modalLocalDetalhar" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-5">
                    <h3><i class="fa fa-lg fa-arrows "></i> Detalhes do Local </h3>
                </div>
                <div class ="col-lg-7 text-right">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalInserirEditarLocal" onclick="carregarModalInserirEditarLocal('editar');"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                    <button class="btn btn-primary" id="btnApagarLocal" ><i class="fa fa-trash-o" aria-hidden="true" title="Apagar Local"></i></button>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#modalLocalDetalhar" onclick="carregarLocais($('.pagination li.active').find('a').html());"><i class="fa fa-lg fa-close"></i></a>
                    <script>$("#btnApagarLocal").on("click", function(){
                            ezBSAlert({
                                type: "confirm",
                                messageText: "Tem certeza que deseja apagar o Local "+$('#labelNomeLocal').html()+"?",
                                alertType: "info"
                            }).done(function (e) {
                                if (e === true)
                                    apagarLocal();
                            });
                        });</script>

                </div>
            </div>
            <div class="modal-body">
                <div class="panel panel-default">
                    <div class="panel-body bg-info">
                        <div class="row">
                            <div class="col-lg-12">
                                <!--GUARDA O ID DA CONTA A RECEBER-->
                                <label>Local:</label><span id="labelNomeLocal">...</span>
                            </div>
                        </div> <!--DIV CLASS row-->

                    </div>
                </div>


            </div><!--DIV MODAL-CONTENT-->
            <div class="modal-footer">
                <input type="hidden" id="localId">
            </div>
        </div>
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID detalharParceiro-->