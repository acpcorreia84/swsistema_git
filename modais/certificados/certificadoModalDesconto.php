<div id="modalDesconto" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-10">
                    <h3><i class="fa fa-hand-scissors-o "></i> CUPOM DE DESCONTO </h3>
                </div>

                <div class ="col-lg-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalDuvida" onclick="modalDuvida(11)"><i class="fa fa-lg fa-question"></i></button>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#modalDesconto"><i class="fa fa-lg fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <div class="panel panel-default">
                    <div class="panel-body bg-info">
                        <div class="row">
                            <div class="col-lg-6">
                                <p><label>Cliente:</label> <span id="gbSpanClienteDesconto">...</span> </p>
                            </div>
                            <div class="col-lg-6">
                                <p><label>Vendedor:</label> <span id="gbSpanVendedorDesconto">...</span> </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <p><label>Produto:</label> <span id="gbSpanProdutoDesconto">...</span> </p>
                            </div>
                            <div class="col-lg-6">
                                <p><label>Pre&ccedil;o:</label>  <span id="gbSpanPrecoDesconto">...</span> </p>
                            </div>
                        </div>
                    </div>
                </div>

                <form method="post" id="frmDescontoCertificado" action="">
                    <div class="row">
                        <div class="col-lg-3">
                            <h4>Valor do Desconto:</h4>
                        </div>
                        <div class="col-lg-9 campoValidar">
                            <input type="text" name="mdEdtValor" id="mdEdtValor" class="form-control">
                        </div>
                    </div><!--DIV CLASS row-->
                    <div class="row oculto" id="divMdProtocolo">
                        <div class="col-lg-3">
                            <h4>Protocolo do Voucher:</h4>
                        </div>
                        <div class="col-lg-9 campoValidar">
                            <input type="text" name="mdEdtProtocolo" id="mdEdtProtocolo" class="form-control">
                        </div>
                    </div> <!--DIV CLASS row-->

                    <div class="row oculto" id="divMdVoucher">
                        <div class="col-lg-3">
                            <h4>C&oacute;digo do Voucher:</h4>
                        </div>
                        <div class="col-lg-9 campoValidar">
                            <input type="text" name="mdEdtVoucher" id="mdEdtVoucher" class="form-control">
                        </div>
                    </div> <!--DIV CLASS row-->

                    <div class="row">
                        <div class="col-lg-3">
                            <h4>Motivo do Desconto:</h4>
                        </div>

                        <div class="col-lg-9 campoValidar">
                            <textarea rows="5" type="text" name="mdEdtMotivoDesconto" id="mdEdtMotivoDesconto" class="form-control"></textarea>
                        </div>
                    </div> <!--DIV CLASS row-->
                </form>
            </div>
            <div class="modal-footer text-right">
                <input type="hidden" id="mdEdtPrecoOriginal" value="0" />
                <button class="btn btn-success" id="btnSalvarDesconto">Salvar Desconto</button>
            </div><!--FIM MODAL FOOTER-->

        </div><!--DIV MODAL-CONTENT-->
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID ModalDesconto-->
<script>
    $('#mdEdtValor').change(function () {
       if ($('#mdEdtValor').val() == $('#mdEdtPrecoOriginal').val()) {
           $('#divMdVoucher').css({'visibility':'visible', 'display':'block'});
           $('#divMdProtocolo').css({'visibility':'visible', 'display':'block'});
           alertSucesso('Por favor informe o c&oacute;digo e o protocolo do voucher');
       }
    });
    console.log($('#mdEdtVoucher').val());
    $("#frmDescontoCertificado").validate({
        rules: {
            mdEdtValor: {
                required:true,
                number: true
            },
            mdEdtProtocolo: {
                required: function() {
                    return $('#mdEdtProtocolo') !== undefined || $('#mdEdtProtocolo').val() != ''
                }
            },
            mdEdtVoucher: {
                required: function() {
                    return $('#mdEdtVoucher') !== undefined || $('#mdEdtVoucher').val() != ''
                }
            },
            mdEdtMotivoDesconto: {
                required:true,
            },
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `help-block` class to the error element
            error.addClass( "help-block" );
            error.insertAfter( element );
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".campoValidar" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).parents( ".campoValidar" ).addClass( "has-success" ).removeClass( "has-error" );
        }
    });

    $('#btnSalvarDesconto').click(function () {
        if ($('#frmDescontoCertificado').valid())
            inserirDescontoCertificado();
    });

</script>