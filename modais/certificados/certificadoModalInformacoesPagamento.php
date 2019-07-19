<?php
/**
 * Created by PhpStorm.
 * User: antoniocorreia
 * Date: 12/05/2017
 * Time: 20:29
 */

?>
<script>

    $( document ).ready( function () {

        $("#frmImagemComprovante").validate({
            rules: {

                edtCodigoPagamento: {
                    required: true,
                    number: true
                },
                edtDataComprovante : {
                    required: true
                },
                edtFormaPagamentoComprovante : {
                    required : true
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

    });
</script>

<div id="modalInformarPagamentoCertificado" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-10">
                    <h3><i class="fa fa-lg fa-money "></i> Informar pagamento </h3>
                </div>
                <div class ="col-lg-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalDuvida"><i class="fa fa-lg fa-question"></i></button>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#modalInformarPagamentoCertificado"><i class="fa fa-lg fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <div class="panel panel-default">
                    <div class="panel-body bg-info">
                        <div class="row">
                            <div class="col-lg-6">
                                <p><label>Cliente:</label> <span id="ipSpanCliente">...</span> </p>
                            </div>
                            <div class="col-lg-6">
                                <p><label>Vendedor:</label> <span id="ipSpanVendedor">...</span> </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <p><label>Produto:</label> <span id="ipSpanProduto">...</span> </p>
                            </div>
                            <div class="col-lg-6">
                                <p><label>Pre&ccedil;o:</label>  <span id="ipSpanPreco">...</span> <input type="hidden" id="ipPrecoCertificado" name="ipPrecoCertificado"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <p><label>Forma de pagamento:</label> <span id="ipSpanForma">...</span> <input type="hidden" id="formaPagamentoId" name="formaPagamentoId"></p>
                            </div>

                        </div>
                    </div>
                </div>

                <!--
                PAINEL QUE MOSTRA OS COMPROVANTES DE PAGAMENTO DO CD
                -->
                <div id="panelInformacoesPagamento">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <p><label>Cod. Comprovante:</label> <span id="ipSpanComprovanteCodigo">...</span> </p>
                                </div>
                                <div class="col-lg-6">
                                    <p><label>Imagem Comprovante:</label> <span id="ipSpanImagemComprovante">...</span> </p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <p><label>Data do Pagamento:</label> <span id="ipSpanIdDataPagamento">...</span> </p>
                                </div>
                                <div class="col-lg-6">
                                    <p><label>Certificado:</label> <span id="ipSpanIdCertificado">...</span> </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <p><label>Data Transa&ccedil;&atilde;o:</label> <span id="ipSpanDataTransacao">...</span> </p>
                                </div>
                                <div class="col-lg-6">
                                    <p><label>Valor Pago:</label>  <span id="ipSpanValorPago">...</span></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <p><label>C&oacute;digo do pagamento:</label> <span id="ipSpanCodigoPagamento">...</span></p>
                                </div>
                                <div class="col-lg-6">
                                    <p><label>Forma de pagamento:</label> <span id="ipSpanFormaPagamento">...</span></p>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <p><label>Comprovante de Pagamento:</label> <span id="ipSpanComprovante">...</span></p>
                                </div>
                                <div class="col-lg-6">
                                    <p><label>Observa&ccedil;&atilde;o:</label> <span id="ipSpanObservacao">...</span></p>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <!--
                    PAINEL DE PAGAMENTO VIA CARTAO DE CREDITO
                    E DE INFORMACOES DE PAGAMENTO DO CERTIFICADO DIGITAL
                    -->
                <div class="panel panel-default" id="panelCrudPagamento">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-12 col-lg-12 col-md-12">
                                <h5>Informar dados do Pagamento</h5>
                            </div>
                        </div>

                    </div>


                    <div class="panel-body" >
                            <script>
                                /*
                                 * FECHA TODOS
                                 * */
                                $('document').ready(function(){
                                    $('#accordion').collapse({
                                        toggle: true
                                    })
                                })
                            </script>

                            <div class="panel-group" id="accordion">
                                <div class="panel panel-info" id="panelInformacoesPagamentoOutrosTipos">
                                    <div class="panel-heading">
                                        <h4 class="panel-body">
                                            <a data-toggle="collapse"  href="#collapse1">
                                                 Comprovante de Pagamento</a>
                                        </h4>
                                    </div>
                                    <div id="collapse1" class="panel-collapse collapse">
                                        <!-- QUADRO DE INFORME DO PAGAMENTO-->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <form id="frmImagemComprovante" enctype="multipart/form-data" role="form" action="">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body">
    
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <label>C&oacute;digo do pagamento:</label>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label>Comprovante de pagamento:</label>
                                                                    </div>
    
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-lg-6 campoValidar">
                                                                        <input class="form-control" type="text" name="edtCodigoPagamento" id="edtCodigoPagamento" placeholder="Procure o c&oacute;digo deste pagamento no comprovante">
                                                                    </div>
    
                                                                    <div class="col-lg-6 campoValidar">
                                                                        <!-- INSERIR AQUI CODIGO DE INFORMAR IMAGEM DO COMPROVANTE-->
    
                                                                        <input class="form-control required" type="file" name="edtImagemComprovantePagamento" id="edtImagemComprovantePagamento">
    
                                                                        <script>
                                                                            $('#frmImagemComprovante').submit(function(e) {
                                                                                e.preventDefault();
                                                                                var form = $(this);
                                                                                var formdata = false;
                                                                                if(window.FormData){
                                                                                    formdata = new FormData(form[0]);
                                                                                }

                                                                                if ($('#frmImagemComprovante').valid())
                                                                                    salvarComprovantePagamento(formdata);
    
                                                                            });
                                                                        </script>
    
                                                                    </div>
    
                                                                </div>
    
                                                                <div class="row form-group">
                                                                    <div class="col-lg-6">
                                                                        <label>Data do comprovante:</label>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label>Forma de repasse:</label>
                                                                    </div>
    
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-lg-6 campoValidar">
                                                                        <input type="text" id="edtDataComprovante" name="edtDataComprovante" class="form-control" placeholder="Dia do pagamento">
                                                                        <script>
                                                                            $( function() {
                                                                                $( "#edtDataComprovante" ).datepicker({
                                                                                    language:"pt-BR",
                                                                                    maxDate: new Date() // Now can select only dates, which goes after today
                                                                                });
                                                                            } );
                                                                        </script>
    
                                                                    </div>
    
                                                                    <div class="col-lg-6">
                                                                        <div id="divFormaPagamentoComprovante" class="campoValidar"></div>
                                                                        <!-- INSERIR AQUI CODIGO DE INFORMAR IMAGEM DO COMPROVANTE-->
    
                                                                    </div>
    
                                                                </div>
    
                                                                <div class="row">
    
                                                                    <div class="col-lg-12">
                                                                        <label>Observa&ccedil;&atilde;o:</label>
                                                                    </div>
    
                                                                </div>
                                                                <div class="row form-group">
    
                                                                    <div class="col-lg-12 ">
                                                                        <textarea id="edtObservacaoComprovante" class="form-control" name="edtObservacaoComprovante" placeholder="Observa&ccedil;&otilde;es do comprovante"></textarea>
                                                                    </div>
    
                                                                </div>
    
                                                                <div class="row form-group">
                                                                    <div class="col-lg-12">
                                                                        <button type="submit" class="btn btn-success" id="btnComprovantePagamento"> <i class="fa fa-lg fa-book"></i> Registrar </button>
                                                                    </div>
                                                                </div>
    
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="panel panel-info" id="panelCartaoCredito">
                                    <div class="panel-heading">
                                        <h4 class="panel-body">
                                            <a data-toggle="collapse"  href="#collapse2">
                                                Cart&atilde;o de Cr&eacute;dito - Pagamento Online</a>
                                        </h4>
                                    </div>
                                    <div id="collapse2" class="panel-collapse collapse">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <div class="row campoValidar" >
                                                                <label for="card_number" class="col-lg-4">N&uacute;mero do cart&atilde;o:</label>
                                                                <div class="col-lg-8"><input class="form-control" type="text" id="card_number" autocomplete="off" /></div>
                                                            </div>
                                                            <div class="row campoValidar">
                                                                <label for="card_holder_name" class="col-lg-4">Nome (como escrito no cart&atilde;o):</label>
                                                                <div class="col-lg-8"><input class="form-control" type="text" id="card_holder_name" autocomplete="off" /></div>
                                                            </div>
                                                            <div class="row campoValidar">
                                                                <label for="card_expiration_month" class="col-lg-4">M&ecirc;s de expira&ccedil;&atilde;o:</label>
                                                                <div class="col-lg-2"><input class="form-control" type="text" id="card_expiration_month" maxlength="2" autocomplete="off" /></div>
                                                            </div>
                                                            <div class="row campoValidar">
                                                                <label for="card_expiration_year" class="col-lg-4">Ano de expira&ccedil;&atilde;o:</label>
                                                                <div class="col-lg-2"><input class="form-control" type="text" id="card_expiration_year" maxlength="4" autocomplete="off" /></div>
                                                            </div>
                                                            <div class="row campoValidar">
                                                                <label for="card_cvv" class="col-lg-4">C&oacute;digo de seguran&ccedil;a:</label>
                                                                <div class="col-lg-4"><input class="form-control" type="text" id="card_cvv" autocomplete="off" ></div>
                                                            </div>

                                                            <div class="row campoValidar">
                                                                <label for="edtQtdParcelasCartao" class="col-lg-4">Quantidade de Parcelas: <i class="fa fa-question-circle" aria-hidden="true" title="Compras at&eacute; R$ 300,00 1x | Compras at&eacute; R$ 499,99 2x | Compras acima de R$ 500,00 3x "></i></label>
                                                                <div class="col-lg-4" id="divQtdParcelasCartao"></div>
                                                            </div>

                                                            <!--
                                                            ENDERECO DO CLIENTE
                                                            -->
                                                            <div class="row campoValidar">
                                                                <label for="cep_cartao" class="col-lg-4">Cep:</label>
                                                                <div class="col-lg-2"><input class="form-control" type="text" id="cep_cartao" maxlength="9" autocomplete="off" /></div>
                                                            </div>

                                                            <div class="row campoValidar">
                                                                <label for="endereco_cartao" class="col-lg-4">Endere&ccedil;o:</label>
                                                                <div class="col-lg-8"><input class="form-control" type="text" id="endereco_cartao" maxlength="50" autocomplete="off" /></div>
                                                            </div>

                                                            <div class="row campoValidar">
                                                                <label for="bairro_cartao" class="col-lg-4">Bairro:</label>
                                                                <div class="col-lg-8"><input class="form-control" type="text" id="bairro_cartao" maxlength="50" autocomplete="off" /></div>
                                                            </div>

                                                            <div class="row campoValidar">
                                                                <label for="numero_cartao" class="col-lg-4">N&uacute;mero:</label>
                                                                <div class="col-lg-2"><input class="form-control" type="text" id="numero_cartao" maxlength="5" autocomplete="off" /></div>
                                                            </div>

                                                            <div class="row campoValidar">
                                                                <label for="complemento_endereco_cartao" class="col-lg-4">Complemento:</label>
                                                                <div class="col-lg-8"><input class="form-control" type="text" id="complemento_endereco_cartao" maxlength="50" autocomplete="off" /></div>
                                                            </div>

                                                            <div class="row campoValidar">
                                                                <label for="uf_cartao" class="col-lg-4">UF:</label>
                                                                <div class="col-lg-2">
                                                                    <select name="uf_cartao" id="uf_cartao" class="form-control">
                                                                        <option value="">Selecione</option>
                                                                        <option value="AC" >AC</option>
                                                                        <option value="AL" >AL</option>
                                                                        <option value="AP" >AP</option>
                                                                        <option value="AM" >AM</option>
                                                                        <option value="BA" >BA</option>
                                                                        <option value="CE" >CE</option>
                                                                        <option value="DF" >DF</option>
                                                                        <option value="ES" >ES</option>
                                                                        <option value="GO" >GO</option>
                                                                        <option value="MA" >MA</option>
                                                                        <option value="MT" >MT</option>
                                                                        <option value="MS" >MS</option>
                                                                        <option value="MG" >MG</option>
                                                                        <option value="PA" >PA</option>
                                                                        <option value="PB" >PB</option>
                                                                        <option value="PR" >PR</option>
                                                                        <option value="PE" >PE</option>
                                                                        <option value="PI" >PI</option>
                                                                        <option value="RJ" >RJ</option>
                                                                        <option value="RN" >RN</option>
                                                                        <option value="RS" >RS</option>
                                                                        <option value="RO" >RO</option>
                                                                        <option value="RR" >RR</option>
                                                                        <option value="SC" >SC</option>
                                                                        <option value="SP" >SP</option>
                                                                        <option value="SE" >SE</option>
                                                                        <option value="TO" >TO</option>
                                                                    </select>

                                                                </div>
                                                            </div>

                                                            <div class="row campoValidar">
                                                                <label for="cidade_cartao" class="col-lg-4">Cidade:</label>
                                                                <div class="col-lg-6"><input class="form-control" type="text" id="cidade_cartao" maxlength="50" autocomplete="off" /></div>
                                                            </div>

                                                            <div class="row campoValidar">
                                                                <label for="ddd_cartao" class="col-lg-4">DDD:</label>
                                                                <div class="col-lg-2"><input class="form-control" type="text" id="ddd_cartao" maxlength="2" autocomplete="off" /></div>
                                                            </div>

                                                            <div class="row campoValidar">
                                                                <label for="telefone_cartao" class="col-lg-4">Celular:</label>
                                                                <div class="col-lg-5"><input class="form-control" type="text" id="telefone_cartao" maxlength="13" autocomplete="off" /></div>
                                                            </div>

                                                            <!--
                                                            FIM DO ENDERECO DO CLIENTE
                                                            -->

                                                            <div id="field_errors">
                                                            </div>

                                                            <button class="btn btn-primary" id="btnRegistrarPagamentoCartaoCredito"><i class="fa fa-credit-card" aria-hidden="true"></i> Realizar Pagamento</button>

                                                            <script>
                                                                $(document).ready(function() { // quando o jQuery estiver carregado...
                                                                    PagarMe.encryption_key = "ek_live_9BWwtourWlLvWoU4flWo5mKKnG8xCI";
                                                                    //PagarMe.encryption_key = "ek_test_twB3YV0uykeCjp8QAZTNKdxu5ZysKv";

                                                                    $('#btnRegistrarPagamentoCartaoCredito').click(function () { // quando o form for enviado...
                                                                        $('#mensagemLoading').html('<i class="fa fa-lg fa-credit-card"></i> Enviando informa&ccedil;&otilde;es do cart&atilde;o');
                                                                        $("#modalCarregando").modal('show');

                                                                        // inicializa um objeto de cart?o de cr?dito e completa
                                                                        // com os dados do form
                                                                        var creditCard = new PagarMe.creditCard();
                                                                        creditCard.cardHolderName = $("#card_holder_name").val();
                                                                        creditCard.cardExpirationMonth = $("#card_expiration_month").val();
                                                                        creditCard.cardExpirationYear = $("#card_expiration_year").val();
                                                                        creditCard.cardNumber = $("#card_number").val();
                                                                        creditCard.cardCVV = $("#card_cvv").val();

                                                                        // pega os erros de valida??o nos campos do form
                                                                        var fieldErrors = creditCard.fieldErrors();

                                                                        //Verifica se h? erros
                                                                        var hasErrors = false;
                                                                        for(var field in fieldErrors) { hasErrors = true; break; }

                                                                        if(hasErrors) {
                                                                            // realiza o tratamento de errors
                                                                            var errors = 'Alguns campos est&atilde;o inv&aacute;lidos:\n';
                                                                            for(var field in fieldErrors) { errors = errors+ fieldErrors[field]+'\n' }
                                                                            console.log(fieldErrors);
                                                                            alertErro(errors);
                                                                            $("#modalCarregando").modal('hide');
                                                                        } else {
                                                                            // se n?o h? erros, gera o card_hash...
                                                                            creditCard.generateHash(function(cardHash) {
                                                                                // e envia o form
                                                                                var dadosajax = {
                                                                                    'funcao': 'registrar_pagamento_cartao_credito',
                                                                                    'card_hash' : cardHash,
                                                                                    'card_holder_name': $("#card_holder_name").val(),
                                                                                    'card_expiration_month': $("#card_expiration_month").val(),
                                                                                    'card_expiration_year': $("#card_expiration_year").val(),
                                                                                    'card_number': $("#card_number").val(),
                                                                                    'card_cvv': $("#card_cvv").val(),
                                                                                    'qtdParcelas' : $('#edtQtdParcelasCartao').val(),
                                                                                    'valorProduto': $('#ipPrecoCertificado').val(),
                                                                                    'idCertificado':$('#edtCertificadoCartaoCredito').val(),
                                                                                    'emailCliente':$('#edtEmailCartaoCredito').val(),
                                                                                    'numeroDocumento':$('#edtDocumentoCartaoCredito').val(),
                                                                                    'nomeProduto':$('#ipSpanProduto').html(),

                                                                                    'endereco_cartao':$('#endereco_cartao').val(),
                                                                                    'complemento_endereco_cartao':$('#complemento_endereco_cartao').val(),
                                                                                    'numero_cartao':$('#numero_cartao').val(),
                                                                                    'cidade_cartao':$('#cidade_cartao').val(),
                                                                                    'uf_cartao':$('#uf_cartao').val(),
                                                                                    'cep_cartao':$('#cep_cartao').val(),
                                                                                    'bairro_cartao': $('#bairro_cartao').val(),

                                                                                    'ddd_cartao':$('#ddd_cartao').val(),
                                                                                    'telefone_cartao': $('#telefone_cartao').val()

                                                                                }
                                                                                $.ajax({
                                                                                    url: 'funcoes/funcoesCertificado.php',
                                                                                    data : dadosajax,
                                                                                    type : 'POST',
                                                                                    cache : true,
                                                                                    error : function(){
                                                                                        alertErro('Error CD10001 - Erro ao enviar inform&ccedil;&otilde;es do cart&atilde;o, Erro:' + e)
                                                                                        $("#modalCarregando").modal('hide');
                                                                                    },
                                                                                    success : function(result){
                                                                                        try {
                                                                                            var resultado = JSON.parse(result);

                                                                                            if (resultado.mensagem == 'Ok') {
                                                                                                if (resultado.mensagemErro != '')
                                                                                                    alertErro(resultado.mensagemErro)
                                                                                                else
                                                                                                    alertSucesso(resultado.statusRetorno);

                                                                                                $("#card_holder_name").val('');
                                                                                                $("#card_expiration_month").val('');
                                                                                                $("#card_expiration_year").val('');
                                                                                                $("#card_number").val('');
                                                                                                $("#card_cvv").val('');

                                                                                                $('#modalInformarPagamentoCertificado').modal('hide');
                                                                                                carregarModalDetalharCertificado($('#idCertificado').val());
                                                                                            } else {
                                                                                                alertErro('Error CD10002 - Erro ao enviar inform&ccedil;&otilde;es do cart&atilde;o, Erro:' + resultado.mensagemErro+ '. '+ msnPadrao + '.')
                                                                                                console.log(result, e);
                                                                                                $("#modalCarregando").modal('hide');
                                                                                            }

                                                                                        } catch (e) {
                                                                                            alertErro('Error CD10003 - Erro ao enviar inform&ccedil;&otilde;es do cart&atilde;o, Erro:' + e+ '. '+ msnPadrao + '.')
                                                                                            console.log(result, e);
                                                                                            $("#modalCarregando").modal('hide');
                                                                                        }
                                                                                    }
                                                                                });
                                                                            });
                                                                        }

                                                                    });
                                                                });
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </div>

                    </div> <!--DIV CLASS row-->

                </div>
                <!--FIM FORMA DE PAGAMENTO-->


            </div><!--DIV MODAL-CONTENT-->
            <div class="modal-footer">
                <input type="hidden" id="edtCertificadoCartaoCredito" name="edtCertificadoCartaoCredito">
                <input type="hidden" id="edtEmailCartaoCredito" name="edtEmailCartaoCredito">
                <input type="hidden" id="edtDocumentoCartaoCredito" name="edtDocumentoCartaoCredito">

                <input type="hidden" id="edtDocumentoLogradouro" name="edtDocumentoLogradouro">
                <input type="hidden" id="edtDocumentoBairro" name="edtDocumentoBairro">
                <input type="hidden" id="edtDocumentoNumero" name="edtDocumentoNumero">
                <input type="hidden" id="edtDocumentoComplemento" name="edtDocumentoComplemento">
                <input type="hidden" id="edtDocumentoCep" name="edtDocumentoCep">
                <input type="hidden" id="edtDocumentoCidade" name="edtDocumentoCidade">
                <input type="hidden" id="edtDocumentoUf" name="edtDocumentoUf">
                <input type="hidden" id="precoProdutoSemFormatacao" name="precoProdutoSemFormatacao">
                <input type="hidden" id="codigoProdutoSafeweb" name="codigoProdutoSafeweb">

            </div>
        </div>
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID ajudaModalDetalhar-->