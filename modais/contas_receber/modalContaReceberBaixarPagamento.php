<div id="modalContaReceberBaixarPagamento" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-9">
                    <h3><i class="fa fa-lg fa-arrows "></i> Baixar Conta a Receber </h3>
                </div>
                <div class ="col-lg-3 text-right">
                    <h3>
                        <a class="btn btn-danger" data-toggle="modal" data-target="#modalContaReceberBaixarPagamento" onclick=""><i class="fa fa-lg fa-close"></i></a>
                    </h3>
                </div>
            </div>
            <div class="modal-body">
                <form role="form" class='form-horizontal' id="frmBaixarContaReceber">

                    <div class="form-group">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-lg-4">
                                    <label for="crDestinoLancamento">Lancar em* </label>
                                </div>

                                <div class="col-lg-4">
                                    <label for="crDataPagamento">Data Pagto.* </label>
                                </div>

                                <div class="col-lg-4">
                                    <label for="crFormaPagamentoLancamento">Forma de Pagamento*</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-lg-4" id="divCrBanco"></div>
                                <div class="col-lg-4 campoValidar" >
                                    <input type='text' class="datepicker-here form-control" data-position="right top" id="crDataLancamento" name="crDataLancamento"/>
                                    <script>
                                        // Initialization
                                        $('#crDataLancamento').datepicker({language:"pt-BR"});
                                        // Access instance of plugin
                                        var dataPk = $('#crDataLancamento').data('datepicker');
                                        //dataPk.update('minDate', new Date());

                                        dataAtual = new Date();
                                        function ResetaData() {
                                            dataPk.selectDate([new Date()]);
                                        }
                                        ResetaData();
                                    </script>
                                </div>
                                <div class="col-lg-4 campoValidar" id="divCrFormaLancamento" name="divCrFormaLancamento"></div>
                            </div>
                        </div>

                        <div class="row" id="divLabelBoletos">
                            <div class="col-lg-12">
                                <div class="col-lg-4 pull-right">
                                    <label for="crBoletoPago">Boletos*</label>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="divBoletosCr">
                            <div class="col-lg-12">
                                <div class="col-lg-4 pull-right" id="divCrBoletos"></div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-lg-4">
                                    <label for="crCodigoOperacaoBaixa">C&oacute;digo da Opera&ccedil;&atilde;o*</label>
                                </div>

                                <div class="col-lg-6">
                                    <label for="crObservacaoBaixa">Observa&ccedil;&atilde;o</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-lg-4 campoValidar">
                                    <input id="crCodigoOperacaoBaixa" name="crCodigoOperacaoBaixa" class="form-control" placeholder="Cod.Extrato|D&eacute;bito|Cr&eacute;dito" />
                                </div>
                                <div class="col-lg-6">
                                    <textarea id="crObservacaoBaixa" class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                        </div>


                    </div>
                </form><!--FIM FORMGROUP-->
                <div class="modal-footer">
                    <button type="button" name="crBtnBaixar" id="crBtnBaixar" class="btn btn-success" ><i class="fa fa-check fa-lg"></i> Salvar</button>
                </div>

            </div>
        </div> <!--DIV CLASS -->
    </div> <!--DIV ID -->
</div> <!--DIV ID-->


<script>
    $("#frmBaixarContaReceber").validate({
        rules: {
            crDataLancamento :{
                required: true,
                dateITA:true
            },
            crBoletoPago : {
                required: function () {
                    return $('#crBoletoPago').val() != '' || $('#crBoletoPago') !== undefined;
                }
            },

            crFormaPagamentoLancamento :{
                required: true,
            },
            crCodigoOperacaoBaixa : {
                required: true,
                number: true
            }
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

    $('#crBtnBaixar').click (function () {
        if ( $('#frmBaixarContaReceber').valid() ) {
            salvarContaReceber();
        }
    })

    /*PUXA A DESCRICAO DA CONTA NO MODAL ANTERIOR*/
    $('#modalContaReceberBaixarPagamento').on("shown.bs.modal", function () {
        $('#crDescricaoContaBaixar').html($('#crDescricaoConta').html());
    });

</script>