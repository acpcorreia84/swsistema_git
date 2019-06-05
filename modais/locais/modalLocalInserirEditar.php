<div id="modalInserirEditarLocal" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-10">
                    <h3><span id="cabecalhoInserir"> <i class="fa fa-lg fa-plus"></i> Inserir / Editar Local </span></h3>
                </div>
                <div class ="col-lg-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalDuvida"><i class="fa fa-lg fa-question"></i></button>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#modalInserirEditarLocal"><i class="fa fa-lg fa-close"></i></a>
                </div>
            </div>
            <div class="form">
                <form action="#" method="post" id="frmInserirEditarLocal">
                    <div class="modal-body">

                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="edtNomeLocal">Nome</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 campoValidar">
                                        <input type="text" name="edtNomeLocal" id="edtNomeLocal" class="form-control" placeholder="Nome do Local">
                                    </div>
                                </div>


                            </div> <!--FIM PANEL-BODY-->
                        </div> <!--FIM PANEL-DEFAULT-->

                    </div> <!--FIM MODAL-BODY-->
                </form> <!--FIM DO FORM-->
            </div><!--FIM DIV FORM -->
            <div class="modal-footer">
                <input type="hidden" id="acaoLocal" name="acaoLocal">
                <input type="button" class="btn btn-success" id="btnInserirEditarLocal" name="btnInserirEditarLocal" value="Salvar">
                <!--<button id="btnInserirParceiro" class="btn btn-success">Salvar</button>-->
            </div>

        </div>
    </div>

    <!--VALIDACAO FORM VALIDATION-->
    <script>
        $( document ).ready( function () {

            $("#frmInserirEditarLocal").validate({
                rules: {
                    edtNomeLocal: {
                        required: true,
                        letterswithbasicpunc: true,
                    },


                },
                errorElement: "em",
                errorPlacement: function (error, element) {
                    // Add the `help-block` class to the error element
                    error.addClass("help-block");
                    error.insertAfter(element);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).parents(".campoValidar").addClass("has-error").removeClass("has-success");
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).parents(".campoValidar").addClass("has-success").removeClass("has-error");
                }
            });

            $("#btnInserirEditarLocal").click(function () {
                if ($("#frmInserirEditarLocal").valid()) {
                    salvarLocal();
                }
            })

        });
    </script>
<!--FIM DE VALIDACAO-->
</div> <!--DIV ID inserirObservacao-->