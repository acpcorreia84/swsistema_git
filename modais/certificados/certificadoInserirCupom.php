<div id="modalInserirCupom" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-10">
                    <h3><i class="fa fa-hand-scissors-o "></i> Inserir Cupom </h3>
                </div>

                <div class ="col-lg-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalDuvida" onclick=""><i class="fa fa-lg fa-question"></i></button>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#modalInserirCupom"><i class="fa fa-lg fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">

                <form method="post" id="frmCupomDesconto" action="" onsubmit="return false">
                    <div class="row">
                        <div class="col-lg-3">
                            <h4>Cupom de desconto:</h4>
                        </div>
                        <div class="col-lg-3 campoValidar">
                            <input type="text" name="edtCodigoCupom" id="edtCodigoCupom" class="form-control" >
                        </div>
                        <div class="col-lg-3">
                            <button class="btn btn-success" id="btnCarregarInfoCupom" onclick="carregarModalCupomDesconto()">Carregar Cupom</button>
                        </div>

                    </div><!--DIV CLASS row-->


                    <div class="panel panel-default">
                        <div class="panel-body bg-info">
                            <div class="row">
                                <div class="col-lg-6">
                                    <p><label>Representante Legal:</label> <span id="spRepresentanteLegal">...</span>  </p>
                                </div>
                                <div class="col-lg-6">
                                    <p><label>Cupom:</label> <span id="spCupomDesconto">...</span> </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <p><label>D. Validade:</label> <span id="spDataValidade">...</span> </p>
                                </div>
                                <div class="col-lg-6">
                                    <p><label>D. Emiss&atilde;o:</label>  <span id="spDataEmissao">...</span> </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <p><label>Produto:</label>  <span id="spCupomProduto">...</span> </p>
                                </div>

                                <div class="col-lg-6">
                                    <p><label>Pre&ccedil;o:</label> <span id="spCupomPreco">...</span> </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <p><label>Val. Desconto:</label>  <span id="spValorDesconto">...</span> </p>
                                </div>

                                <div class="col-lg-6">
                                    <p><label>% Desconto:</label> <span id="spPercentualDesconto">...</span> </p>
                                </div>
                            </div>

                        </div>
                    </div>



                    <div class="row">
                        <div class="col-lg-3">
                            <h4>Descri&ccedil;&atilde;o Campanha:</h4>
                        </div>

                        <div class="col-lg-9 campoValidar">
                            <div name="edtDescricaoCampanha" id="edtDescricaoCampanha" ></div>
                        </div>
                    </div> <!--DIV CLASS row-->
                </form>
            </div>
            <div class="modal-footer text-right">
                <button class="btn btn-success" id="btnUsarDesconto">Usar Cupom</button>
                <input type="hidden" id="mdEdtPrecoOriginal" value="0" />
            </div><!--FIM MODAL FOOTER-->

        </div><!--DIV MODAL-CONTENT-->
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID ModalDesconto-->

<input name="hdCupom" id="hdCupom" type="hidden"/>
<input name="percentualDesconto" id="percentualDesconto" type="hidden"/>


<script>
        $("#frmCupomDesconto").validate({
        rules: {
            edtCodigoCupom: {
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

    $('#btnUsarDesconto').click(function () {
        if ($('#frmCupomDesconto').valid())
            usarCupom();
    });


        <?php
    //ABRE O MODAL DE DETALHE DE PAGAMENTO E HABILITA APENAS O BOTAO DE CUPOM DE DESCONTO
    if ($_GET['funcao']=='aplica_cupom' && isset($_GET['idCertificado'])) {
    ?>

    $('#hdCupom').val('<?=$_GET['cupom']?>');

    <?php
    }
    ?>
</script>