<div id="modalRelacionarUsuarioLocal" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-10">
                    <h3><i class="fa fa-2x fa-user-plus"></i> Relacionar Usu&aacute;rio Parceiro </h3>
                </div>
                <div class ="col-lg-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalDuvida" onclick="modalDuvida(2)"><i class="fa fa-lg fa-question"></i></button>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#modalRelacionarUsuarioLocal"><i class="fa fa-lg fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <form method="post" action="#" id="frmVincularLocalUsuario">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4>Locais </h4>
                        </div>
                    </div> <!--DIV CLASS row-->
                    <div class="row">
                        <div class="col-lg-12 campoValidar" id="divLocalVincularUsuario"></div>
                    </div> <!--DIV CLASS row-->
                </form>
            </div><!--DIV MODAL-CONTENT-->
            <div class="modal-footer">
                <button class="btn btn-success" id="btnVincularLocalUsuario">Vincular Local</button>
            </div>
        </div>
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID ajudaModalDetalhar-->
<!-- MODAL DO SISTEMA DE PARCEIRO -->
<script>
    $( document ).ready( function () {

        $("#frmVincularLocalUsuario").validate({
            rules: {
                edtVincularLocalUsuario: {
                    required: true,
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

        $("#btnVincularLocalUsuario").click(function () {
            if ($("#frmVincularLocalUsuario").valid()) {
                vincularLocalUsuario();
            }
        })

    });
</script>