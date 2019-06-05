<!--Autorizar Desconto-->
<div id="autorizarDesconto" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-10">
                    <h3><i class="fa fa-lg fa-thumbs-o-up "></i> Autorizar Cupom de Desconto </h3>
                </div>
                <div class ="col-lg-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalDuvida" onclick="modalDuvida(9)"><i class="fa fa-lg fa-question"></i></button>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#autorizarDesconto"><i class="fa fa-lg fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <form action="#" method="post" id="frmAutorizarDesconto">
                    <div class="panel panel-default">
                        <div class="panel-body bg-info">
                            <div class="row">
                                <div class="col-lg-4">
                                    Código de Desconto: <span id="acSpanCodigoDesconto"> </span>
                                </div>
                                <div class="col-lg-4">
                                    Emissor: <span id="acSpanVendedor"> </span>
                                </div>
                                <div class="col-lg-4">Valor de Desconto: <span id="acSpanValorDesconto"> </span>
                                </div>
                            </div> <!--DIV CLASS row-->
                            <br/>
                            <div class="row">
                                <div class="col-lg-6">
                                    <p>Produto: <span id="acSpanProduto"></span></p>
                                </div>
                                <div class="col-lg-6">
                                    <p>Motivo Desconto: <span id="acSpanMotivo"></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <h4>Motivo da Autoriza&ccedil;&atilde;o:</h4>
                        </div>
                        <div class="col-lg-6">
                            <h4>Voc&ecirc; tem certeza que deseja autorizar Desconto:</h4>
                        </div>
                    </div> <!--DIV CLASS row-->
                    <div class="row">
                        <div class="col-lg-6 campoValidar">
                            <textarea class="form-control" name="edtMotivoAutorizacao" id="edtMotivoAutorizacao" ></textarea>
                        </div>
                        <div class="col-lg-3">
                            <input type="hidden" name="idCupomDesconto" id="idCupomDesconto">
                            <button class="btn btn-success" id="conAutorizar">Sim</button>
                        </div>
                        <div class="col-lg-3">
                            <a class="btn btn-danger" data-toggle="modal" data-target="#autorizarDesconto">N&atilde;o</a>
                        </div>
                    </div> <!--DIV CLASS row-->
                </form>
            </div><!--DIV MODAL-CONTENT-->
            <div class="modal-footer"></div>
        </div>
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID RevogarCertificado-->


<script>
    $( document ).ready( function () {

        $("#frmAutorizarDesconto").validate({
            rules: {
                edtMotivoAutorizacao: "required"
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

        $("#conAutorizar").click(function () {
            if ($("#frmAutorizarDesconto").valid()) {
                autorizar_cupom_desconto('autorizar',<?=$usuarioLogado->getId();?>);
            }
        })

    });
</script>
