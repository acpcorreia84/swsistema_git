<div id="modalInserirEditarProduto" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-10">
                    <h3><span id="cabecalhoInserir"> <i class="fa fa-lg fa-plus"></i> Inserir / Editar Produto </span></h3>
                </div>
                <div class ="col-lg-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalDuvida"><i class="fa fa-lg fa-question"></i></button>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#modalInserirEditarProduto"><i class="fa fa-lg fa-close"></i></a>
                </div>
            </div>
            <div class="form">
                <div class="modal-body">

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form name="frmInserirEditarLocal" id="frmInserirEditarLocal"  >

                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="edtNomeProduto">Nome</label>
                                    </div>

                                    <div class="col-lg-6 ">
                                        <label for="edtPrecoProduto">Pre&ccedil;o</label>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-lg-6 campoValidar">
                                        <input type="text" name="edtNomeProduto" id="edtNomeProduto" class="form-control" placeholder="Nome do Produto">
                                    </div>
                                    <div class="col-lg-6 campoValidar">
                                        <input type="text" name="edtPrecoProduto" id="edtPrecoProduto" class="form-control" placeholder="Pre&ccedil;o do Produto">
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="edtCodigoProduto">C&oacute;digo</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="edtPrecoVenda">Preco de venda</label>
                                    </div>

                                </div>
                                <div class="row form-group">
                                    <div class="col-lg-6 campoValidar">
                                        <input type="text" name="edtCodigoProduto" id="edtCodigoProduto" class="form-control" placeholder="C&oacute;digo do Produto">
                                    </div>
                                    <div class="col-lg-6 campoValidar">
                                        <input type="text" name="edtPrecoVenda" id="edtPrecoVenda" class="form-control" placeholder="Preco de venda para o parceiro comercial">
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="edtTipoProduto">Tipo</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="edtValidadeProduto">Validade</label>
                                    </div>

                                </div>
                                <div class="row form-group">
                                    <div class="col-lg-6 campoValidar">
                                        <select name="edtTipoProduto" id="edtTipoProduto" class="form-control">
                                            <option value="">Selecione o tipo do produto</option>
                                            <option value="J" >Pessoa Jur&iacute;dica</option>
                                            <option value="F" >Pessoa F&iacute;sica</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 campoValidar">
                                        <select name="edtValidadeProduto" id="edtValidadeProduto" class="form-control">
                                            <option value="">Selecione a validade do produto</option>
                                            <option value="1">1 ano</option>
                                            <option value="2">2 anos</option>
                                            <option value="3">3 anos</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="edtProdutoReferencia">Produto Refer&ecirc;ncia</label> <i id="informacaoProdutoReferencia" class="fa fa-info-circle" aria-hidden="true"></i>
                                        <script>$("#informacaoProdutoReferencia").popover({title:"Informa&ccedil;&atilde;o",content: "Caso n&atilde;o seja selecionado nenhum produto significar&aacute; que o usu&aacute;rio est&aacute; criando o produto pela primeira vez",html: true, placement: "right",trigger: "hover"}); </script>
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="edtProdutoContador">Produto para Contadores?</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 campoValidar">
                                        <div id="divProdutosReferencia"></div>
                                    </div>
                                    <div class="col-lg-6 campoValidar">
                                        <select name="edtProdutoContador" id="edtProdutoContador" class="form-control">
                                            <option value="">Selecione o tipo</option>
                                            <option value="contadores">Produto para Contadores</option>
                                            <option value="normal">Produto com pre&ccedil;o normal</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="edtGrupoProduto">Grupo do Produto</label>
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="edtComissaoProduto">Comiss&atilde;o</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 campoValidar">
                                        <div id="divGrupoProdutos"></div>
                                    </div>
                                    <div class="col-lg-6 campoValidar">
                                        <input type="text" name="edtComissaoProduto" id="edtComissaoProduto" class="form-control" placeholder="Comiss&atilde;o do Produto">
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="edtTipoEmissao">Tipo de Emiss&atilde;o</label>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-6 campoValidar">
                                        <select name="edtTipoEmissao" id="edtTipoEmissao" class="form-control">
                                            <option value="">Selecione o tipo de emiss&atilde;o</option>
                                            <option value="1">Presencial</option>
                                            <option value="2">Renova&ccedil;&atilde;o On-Line</option>
                                            <option value="3">V&iacute;deo confer&ecirc;ncia</option>
                                            <option value="0">N&atilde;o permitido valida&ccedil;&atilde;o</option>
                                        </select>
                                    </div>
                                </div>



                            </form>

                        </div> <!--FIM PANEL-BODY-->
                    </div> <!--FIM PANEL-DEFAULT-->

                </div> <!--FIM MODAL-BODY-->
            </div><!--FIM DIV FORM -->
            <div class="modal-footer">
                <input type="hidden" id="acaoProduto" name="acaoProduto">
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
                    edtNomeProduto: {
                        required: true,
                    },

                    edtTipoProduto: {
                        required: true,
                    },

                    edtValidadeProduto: {
                        required: true,
                        number: true
                    },

                    edtGrupoProduto: {
                        required: true,
                        number: true
                    },

                    edtComissaoProduto: {
                        required: true,
                        number: true
                    },

                    edtCodigoProduto : {
                        required: true,
                        number: true
                    },

                    edtPrecoProduto : {
                        required:true,
                        number: true
                    },
                    edtProdutoContador : {
                        required:true,
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

            $("#btnInserirEditarLocal").click(function () {
                if ($("#frmInserirEditarLocal").valid()) {
                    salvarProduto();
                }
            })

        });
    </script>
<!--FIM DE VALIDACAO-->
</div> <!--DIV ID inserirObservacao-->