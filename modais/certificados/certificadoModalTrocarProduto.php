 <div id="modalTrocarProdutoCerticado" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-10">
                    <h3><i class="fa fa-lg fa-retweet "></i> Trocar produto / forma de pagamento </h3>
                </div>
                <div class ="col-lg-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalDuvida" onclick="modalDuvida(2)"><i class="fa fa-lg fa-question"></i></button>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#modalTrocarProdutoCerticado"><i class="fa fa-lg fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <div class="panel panel-default">
                    <div class="panel-body bg-info">
                        <div class="row">
                            <div class="col-lg-6">
                                <p><label>Cliente:</label> <span id="gbSpanClienteTrocarProduto">...</span> </p>
                            </div>
                            <div class="col-lg-6">
                                <p><label>Vendedor:</label> <span id="gbSpanVendedorTrocarProduto">...</span> </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <p><label>Produto:</label> <span id="gbSpanProdutoTrocarProduto">...</span> </p>
                            </div>
                            <div class="col-lg-6">
                                <p><label>Pre&ccedil;o:</label>  <span id="gbSpanPrecoTrocarProduto">...</span> </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <p><label>Forma de pagamento:</label> <span id="gbSpanFormaTrocarProduto">...</span> </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!--FORMA DE PAGAMENTO-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-12 col-lg-12 col-md-12">
                                <h5>Forma de pagamento</h5>
                            </div>
                        </div>

                    </div>

                    <div class="panel-body" >
                        <form name="frmTrocarProdutoCertificado" id="frmTrocarProdutoCertificado" action="#" method="post">
                            <div class="row">
                                <div class="col-xs-12 col-lg-12 col-md-12">
                                    <div class="col-lg-6">
                                        <h4>Alterar Produto:</h4>
                                    </div>
                                    <div class="col-lg-6 campoValidar" id="div_select_produtos_trocarproduto" ></div>
                                </div>
                            </div> <!--DIV CLASS row-->

                            <fieldset class="row">
                                <div class="col-xs-12 col-lg-12 col-md-12">
                                    <div class="col-lg-6">
                                        <h4>Alterar forma de pagamento:</h4>
                                    </div>
                                    <div class="col-lg-6 campoValidar">

                                        <label><input type="radio" name="edtPagamentoTrocar" value="1" > <i class="fa  fa-barcode"> Boleto </i>  </label>
                                        <br/>
                                        <label><input  type="radio" name="edtPagamentoTrocar" value="6" > <i class="fa fa-credit-card"> Cart&atilde;o de Cr&eacute;dito Online</i></label><br/>
                                        <label><input  type="radio" name="edtPagamentoTrocar" value="10" > <i class="fa fa-calculator"> M&aacute;quina de Cart&atilde;o de Cr&eacute;dito</i></label><br/>
                                        <label><input  type="radio" name="edtPagamentoTrocar" value="9" > <i class="fa fa-credit-card"> Cart&atilde;o de D&eacute;bito</i></label><br/>
                                        <label><input  type="radio" name="edtPagamentoTrocar" value="3" > <i class="fa fa-money"> Esp&eacute;cie</i>  </label><br/>
                                        <label><input  type="radio" name="edtPagamentoTrocar" value="2" > <i class="fa fa-envelope-o"> Dep&oacute;sito</i></label><br/>
                                        <label><input  type="radio" name="edtPagamentoTrocar" value="4" > <i class="fa fa-exchange"> Transfer&ecirc;ncia</i></label><br/>
                                        <label><input type="radio" name="edtPagamentoTrocar" value="11" > <i class="fa fa-exchange"> PIX</i></label><br/>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div> <!--DIV CLASS row-->

                </div>
                <!--FIM FORMA DE PAGAMENTO-->

            </div><!--DIV MODAL-CONTENT-->
            <div class="modal-footer">
                <button class="btn btn-success" id="btnTrocarProdutoCD"> <i class="fa fa-lg fa-retweet"></i> Trocar</button>
            </div>
        </div>
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID ajudaModalDetalhar-->

 <script>
     $( document ).ready( function () {

         $("#frmTrocarProdutoCertificado").validate({
             rules: {

                 edtSelectProdutoTrocar: {
                     required: true,
                 },

                 edtPagamentoTrocar: {
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

         $("#btnTrocarProdutoCD").click(function () {
             if ($("#frmTrocarProdutoCertificado").valid()) {
                 trocarProdutoCertificado();
             }
         })

     });
 </script>