<div id="modalContadorRegistrarLancamentoComissao" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-10">
                    <h3><i class="fa fa-2x fa-floppy-o"></i> Registrar Lan&ccedil;amento na planilha de Comiss&atilde;o do Contador </h3>
                </div>
                <div class ="col-lg-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalDuvida" onclick="modalDuvida(2)"><i class="fa fa-lg fa-question"></i></button>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#modalContadorRegistrarLancamentoComissao"><i class="fa fa-lg fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <form method="post" action="#" id="frmRegistrarLancamentoComissao" name="frmRegistrarLancamentoComissao">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="editRlDescricao">Descri&ccedil;&atilde;o </label>
                        </div>
                    </div> <!--DIV CLASS row-->
                    <div class="row">
                        <div class="col-lg-12 campoValidar">
                            <input class="form-control" id="editRlDescricao" name="editRlDescricao" />
                        </div>

                    </div> <!--DIV CLASS row-->

                    <div class="row">
                        <div class="col-lg-4">
                            <label for="editRlTipoLancamento">Tipo Lan&ccedil;amento</label>
                        </div>
                        <div class="col-lg-4">
                            <label for="editRlValor">Valor</label>
                        </div>
                        <div class="col-lg-4">
                            <label for="editRlObservacao">Observa&ccedil;&atilde;o</label>
                        </div>

                    </div> <!--DIV CLASS row-->
                    <div class="row">
                        <div class="col-lg-4">
                            <select class="form-control" id="editRlTipoLancamento" name="editRlTipoLancamento">
                                <option value="D">D&eacute;bito</option>
                                <option value="C">Cr&eacute;dito</option>
                            </select>
                        </div>
                        <div class="col-lg-4 campoValidar">
                            <input class="form-control" id="editRlValor" name="editRlValor" />
                        </div>
                        <div class="col-lg-4 campoValidar">
                            <textarea class="form-control" id="editRlObservacao" name="editRlObservacao"></textarea>
                        </div>

                    </div> <!--DIV CLASS row-->

                </form>
            </div><!--DIV MODAL-CONTENT-->
            <div class="modal-footer">
                <div id="divBtnRegistrarComissaoParceiro">
                    <button class="btn btn-info" id="btnRegistrarLancamentoComissao"><i class="fa fa-plus" aria-hidden="true"></i> Registrar </button>
                </div>
            </div>
        </div>
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID ajudaModalDetalhar-->
<script>
    $( document ).ready( function () {

        $("#frmRegistrarLancamentoComissao").validate({
            rules: {
                editRlDescricao: {
                    required: true,
                },
                editRlValor: {
                    required: true,
                    number: true
                }
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

        $("#btnRegistrarLancamentoComissao").click(function () {
            if ($("#frmRegistrarLancamentoComissao").valid()) {
                registrarLancamentoComissaoContador();
            }
        })

    });
</script>