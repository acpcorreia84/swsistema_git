<!--Gerar Boleto-->
<div id="gerarBoleto" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-10">
                    <h3> <i class="fa fa-lg fa-barcode"></i> Gerar Boleto </h3>
                </div>
                <div class ="col-lg-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalDuvida" onclick="modalDuvida(10)"><i class="fa fa-lg fa-question"></i></button>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#gerarBoleto"><i class="fa fa-lg fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <div class="panel panel-default">
                    <div class="panel-body bg-info">
                        <div class="row">
                            <div class="col-lg-6">
                                <p><label>Cliente:</label> <span id="gbSpanCliente">...</span> </p>
                            </div>
                            <div class="col-lg-6">
                                <p><label>Vendedor:</label> <span id="gbSpanVendedor">...</span> </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <p><label>Produto:</label> <span id="gbSpanProduto">...</span> </p>
                            </div>
                            <div class="col-lg-6">
                                <p><label>Pre&ccedil;o:</label>  <span id="gbSpanPreco">...</span> </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <p><label>Email:</label> <span id="gbSpanEmail">...</span> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <form name="frmGerarBoletoCertificado" id="frmGerarBoletoCertificado" action="#" method="post">
                    <div class="row">
                        <div class="col-lg-6">
                            <h4>Data de Vencimento:</h4>
                        </div>
                        <div class="col-lg-4 campoValidar">
                            <input type="text" id="edtVencimentoBoletoCertificado" name="edtVencimentoBoletoCertificado" class="form-control" placeholder="Vencimento do boleto">
                            <script>
                                $( function() {
                                    $( "#edtVencimentoBoletoCertificado" ).datepicker({
                                        language:"pt-BR",
                                        minDate: new Date() // Now can select only dates, which goes after today
                                    });
                                } );
                            </script>
                        </div>
                    </div>
                </form>
                <br/>
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <button class="btn btn-success" id='btnGerarBoletoCertificado'>Gerar Boleto</button>
                    </div>
                </div> <!--DIV CLASS row-->
            </div><!--DIV MODAL-CONTENT-->
            <div class="modal-footer"></div>
        </div>
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID GerarBoleto-->

<script>
    $( document ).ready( function () {

        $("#frmGerarBoletoCertificado").validate({
            rules: {

                edtVencimentoBoletoCertificado: {
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

        $("#btnGerarBoletoCertificado").click(function () {
            if ($("#frmGerarBoletoCertificado").valid()) {
                gerarBoletoCertificado();
            }
        })

    });
</script>