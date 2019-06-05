<div id="editarCliente" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-10">
                    <h3><i class="fa fa-lg fa-edit "></i> Editar Cliente </h3>
                    <input type="hidden" name="clEdtPessoaTipo" id="clEdtPessoaTipo">
                </div>
                <div class ="col-lg-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalDuvida"onclick="modalDuvida(5)"><i class="fa fa-lg fa-question"></i></button>
                    <a class="btn btn-danger" data-dismiss="modal"><i class="fa fa-lg fa-close"></i></a>
                </div>
            </div>
            <div class="form">
                    <div class="modal-body">
                        <form action="#" method="post" id="frmEditarClienteCertificadoPj">
                            <div id="pessoaJuridica">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        DADOS DA EMPRESA
                                    </div>

                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label for="clEdtCnpj">CNPJ:</label>
                                            </div>

                                            <div class="col-lg-9">
                                                <label for="clEdtRazaoSocial" >Raz&atilde;o Social:</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 campoValidar">
                                                <input type="text" name="clEdtCnpj" onkeyup="formatarCpfCnpj(this,'cnpj')" id="clEdtCnpj" class="form-control" >
                                            </div>

                                            <div class="col-lg-9 campoValidar">
                                                <input type="text" name="clEdtRazaoSocial" id="clEdtRazaoSocial"  class="form-control" >
                                            </div>
                                        </div> <!--DIV CLASS row-->

                                        <div class="row">
                                            <div class="col-lg-9">
                                                <label for="clEdtNomeFantasia">Nome:</label>
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="clEdtCepEmpresa">Cep:</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-9 campoValidar">
                                                <input type="text" name="clEdtNomeFantasia" id="clEdtNomeFantasia"  class="form-control" >
                                            </div>

                                            <div class="col-lg-3 campoValidar">
                                                <input type="text" name="clEdtCepEmpresa" id="clEdtCepEmpresa"  class="form-control" >
                                            </div>
                                        </div> <!--DIV CLASS row-->

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label for="clEdtEnderecoEmpresa">Endere&ccedil;o:</label>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="clEdtBairroEmpresa">Bairro:</label>
                                            </div>
                                            <div class="col-lg-2">
                                                <label for="clEdtNumeroEmpresa">N&uacute;mero:</label>
                                            </div>
                                            <div class="col-lg-2">
                                                <label for="clEdtUfEmpresa">UF:</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 campoValidar">
                                                <input type="text" name="clEdtEnderecoEmpresa" id="clEdtEnderecoEmpresa"  class="form-control" >
                                            </div>

                                            <div class="col-lg-4 campoValidar">
                                                <input type="text" name="clEdtBairroEmpresa" id="clEdtBairroEmpresa"  class="form-control" >
                                            </div>

                                            <div class="col-lg-2 campoValidar">
                                                <input type="text" name="clEdtNumeroEmpresa" id="clEdtNumeroEmpresa" class="form-control"  >
                                            </div>
                                            <div class="col-lg-2 campoValidar">
                                                <select name="clEdtUfEmpresa" id="clEdtUfEmpresa" class="form-control" ">
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

                                        </div> <!--DIV CLASS row-->

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label for="clEdtComplementoEmpresa">Complemento:</label>
                                            </div>
                                            <div class="col-lg-4">
                                                <label>Cidade:</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 campoValidar">
                                                <input type="text" name="clEdtComplementoEmpresa"  id="clEdtComplementoEmpresa" class="form-control">
                                            </div>

                                            <div class="col-lg-4 campoValidar">
                                                <input type="text" name="clEdtCidadeEmpresa" id="clEdtCidadeEmpresa"  class="form-control" >
                                            </div>

                                        </div> <!--DIV CLASS row-->

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label for="clEdtFone1Empresa">Fone1:</label>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="clEdtFone2Empresa">Fone2:</label>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="clEdtCelularEmpresa">Celular:</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 campoValidar">
                                                <input type="text" name="clEdtFone1Empresa" id="clEdtFone1Empresa" class="form-control" onkeypress="formatar(this,'fone')" onblur="formatarBlur(this,'fone');" >
                                            </div>

                                            <div class="col-lg-4 campoValidar">
                                                <input type="text" name="clEdtFone2Empresa" id="clEdtFone2Empresa" class="form-control" onkeypress="formatar(this,'fone')" onblur="formatarBlur(this,'fone');">
                                            </div>

                                            <div class="col-lg-4 campoValidar">
                                                <input type="text" name="clEdtCelularEmpresa" id="clEdtCelularEmpresa" class="form-control" onkeypress="formatar(this,'celular')" onblur="formatarBlur(this,'celular')">
                                            </div>
                                        </div> <!--DIV CLASS row-->
                                        <div class="row">
                                            <div class="col-lg-7 campoValidar">
                                                <label for="clEdtEmailEmpresa">Email: </label><input type="text" onkeyup="LowerCase(this)" name="clEdtEmailEmpresa" id="clEdtEmailEmpresa" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> <!--FIM DO FORMULARIO DE PESSOA JURIDICA-->


                        <!-- DADOS RESPONSAVEL -->
                        <form action="#" method="post" id="frmEditarClienteCertificadoPf">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    DADOS DO RESPONS&Aacute;VEL:
                                </div>

                                <div class="panel-body">

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label for="clEdtCpfResponsavel">CPF:</label>
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="clEdtNascimentoResponsavel" >Nascimento:</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="clEdtNomeResponsavel">Nome:</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 campoValidar">
                                            <input type="text" name="clEdtCpfResponsavel"  id="clEdtCpfResponsavel" class="form-control"  >
                                        </div>
                                        <div class="col-lg-3 campoValidar">
                                            <input type="date" name="clEdtNascimentoResponsavel" id="clEdtNascimentoResponsavel" class="form-control"  onkeypress="formatar(this,'data')">
                                        </div>
                                        <div class="col-lg-6 campoValidar">
                                            <input type="text" name="clEdtNomeResponsavel"  id="clEdtNomeResponsavel" class="form-control"  >
                                        </div>
                                    </div> <!--DIV CLASS row-->

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="clEdtCepResponsavel">CEP:</label>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="clEdtEnderecoResponsavel">Endere&ccedil;o:</label>
                                        </div>
                                        <div class="col-lg-2">
                                            <label for="clEdtNumeroResponsavel">N&uacute;mero:</label>
                                        </div>
                                        <div class="col-lg-2">
                                            <label for="clEdtUfResponsavel" >UF:</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4 campoValidar">
                                            <input type="text" name="clEdtCepResponsavel" id="clEdtCepResponsavel"  class="form-control"  >
                                        </div>

                                        <div class="col-lg-4 campoValidar">
                                            <input type="text" name="clEdtEnderecoResponsavel" id="clEdtEnderecoResponsavel"  class="form-control"  >
                                        </div>
                                        <div class="col-lg-2">
                                            <input type="text" name="clEdtNumeroResponsavel" id="clEdtNumeroResponsavel"  class="form-control"  >
                                        </div>
                                        <div class="col-lg-2 campoValidar">
                                            <select name="clEdtUfResponsavel" id="clEdtUfResponsavel" class="form-control">
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
                                    </div> <!--DIV CLASS row-->

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="edtCompletamentoResponsavel">Complemento:</label>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="clEdtBairroResponsavel">Bairro:</label>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="editObservacaoResponsavel">Cidade:</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 campoValidar">
                                            <input type="text" name="clEdtCompletamentoResponsavel" id="clEdtCompletamentoResponsavel"  class="form-control">
                                        </div>

                                        <div class="col-lg-4 campoValidar">
                                            <input type="text" name="clEdtBairroResponsavel" id="clEdtBairroResponsavel"  class="form-control" >
                                        </div>

                                        <div class="col-lg-4 campoValidar">
                                            <input type="text" name="clEdtCidadeResponsavel" id="clEdtCidadeResponsavel"  class="form-control" >
                                        </div>
                                    </div> <!--DIV CLASS row-->


                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="clEdtFone1Responsavel">Fone1:</label>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="clEdtFone2Responsavel">Fone2:</label>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="clEdtCelularResponsavel">Celular:</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 campoValidar">
                                            <input type="text" name="clEdtFone1Responsavel" id="clEdtFone1Responsavel" class="form-control" onkeypress="formatar(this,'fone')" onblur="formatarBlur(this,'fone');" >
                                        </div>

                                        <div class="col-lg-4 campoValidar">
                                            <input type="text" name="clEdtFone2Responsavel" id="clEdtFone2Responsavel" class="form-control" onkeypress="formatar(this,'fone')" onblur="formatarBlur(this,'fone');">
                                        </div>

                                        <div class="col-lg-4 campoValidar">
                                            <input type="text" name="clEdtCelularResponsavel" id="clEdtCelularResponsavel" class="form-control" onkeypress="formatar(this,'celular')" onblur="formatarBlur(this,'celular');" >
                                        </div>
                                    </div> <!--DIV CLASS row-->
                                    <div class="row">
                                        <div class="col-lg-7 campoValidar">
                                            <h4>Email: </h4><input type="text" onkeyup="LowerCase(this)" name="clEdtEmailResponsavel" id="clEdtEmailResponsavel" class="form-control"  >
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form> <!--FIM DO FORMULARIO DO RESPONSAVEL PELO CD-->
                    </div><!--Div Modal Body -->
                    <div class="modal-footer">
                        <button id="altCliente" class="btn btn-success">Editar Cliente</button>
                    </div>
            </div>
        </div>
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div>

<script>
    $.validator.addMethod("cnpj", function(value, element) {
        return this.optional(element) || /\d{2}[.]\d{3}[.]\d{3}[/]\d{4}[-]\d{2}/g.test(value);
    }, "Por favor informe o cnpj com o padr&atilde;o: ##.###.###/####-##.");

    $.validator.addMethod("cpf", function(value, element) {
        return this.optional(element) || /\d{3}[.]\d{3}[.]\d{3}[-]\d{2}/g.test(value);
    }, "Por favor informe o cpf com o padr&atilde;o: ###.###.###-##.");

    $.validator.addMethod("nascimento", function(value, element) {
        return this.optional(element) || /\d{2}[/]\d{2}[/]\d{4}/g.test(value);
    }, "Por favor informe a data de nascimento com o padr&atilde;o: dd/mm/aaaa .");

    $.validator.addMethod("telefone", function(value, element) {
        return this.optional(element) || /\d{2}[ ]\d{4}[-]\d{4}/g.test(value);
    }, "Por favor informe o telefone com o padr&atilde;o: ## ####-#### .");

    $.validator.addMethod("celular", function(value, element) {
        return this.optional(element) || /\d{2}[ ][9]\d{4}[-]\d{4}/g.test(value);
    }, "Por favor informe o n&uacute;mero do celular com o padr&atilde;o: ## 9####-#### .");

    $.validator.addMethod("cep", function(value, element) {
        return this.optional(element) || /\d{5}(-)\d{3}/g.test(value);
    }, "O Cep informado n&atilde;o &eacute; v&aacute;lido.");

    $("#frmEditarClienteCertificadoPj").validate({
        rules: {
            clEdtCnpj: {
                required: true,
                cnpj: true
            },
            clEdtRazaoSocial: "required",
            clEdtCepEmpresa: {
                required:true,
                cep: true
            },
            clEdtCelularEmpresa: {
                celular:true,
            },
            clEdtBairroEmpresa: "required",
            clEdtEnderecoEmpresa: "required",
            clEdtCidadeEmpresa: "required",
            clEdtNumeroEmpresa: "required",
            clEdtUfEmpresa: "required",
            clEdtFone1Empresa: {
                required: true,
                telefone: true
            },
            clEdtFone2Empresa: {
                telefone: true,
            },
            clEdtEmailEmpresa: {
                required: true,
                email: true
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


    $("#frmEditarClienteCertificadoPf").validate({
        rules: {
            clEdtCpfResponsavel: {
                required: true,
                cpf: true
            },
            clEdtNomeResponsavel: "required",
            clEdtCepResponsavel: {
                required:true,
                cep: true
            },
            clEdtCelularResponsavel: {
                celular:true,
            },
            clEdtBairroResponsavel: "required",
            clEdtEnderecoResponsavel: "required",
            clEdtCidadeResponsavel: "required",
            clEdtNumeroResponsavel: "required",
            clEdtUfResponsavel: "required",
            clEdtFone2Responsavel: {
                telefone: true,
            },
            clEdtFone1Responsavel: {
                required: true,
                telefone: true
            },
            clEdtEmailResponsavel: {
                required: true,
                email: true
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

    $('#altCliente').click(function () {

        var pessoaTipo = $("#clEdtPessoaTipo").val();
        if ( ($("#frmEditarClienteCertificadoPj").valid()) && ($("#frmEditarClienteCertificadoPf").valid()) )
            editar_cliente_certificado('alterar_cliente');
    });


</script>