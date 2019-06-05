<div id="modalUsuarioInserirEditar" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-10">
                    <h3><span id="cabecalhoInserir"> <i class="fa fa-lg fa-plus"></i> Inserir / Editar Usu&aacute;rio </span></h3>
                </div>
                <div class ="col-lg-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalDuvida" onclick="modalDuvida(5)"><i class="fa fa-lg fa-question"></i></button>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#modalUsuarioInserirEditar"><i class="fa fa-lg fa-close"></i></a>
                </div>
            </div>
            <div class="form">
                <form action="#" method="post" id="frmInserirUsuario">
                    <div class="modal-body">

                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4>DADOS USU&Aacute;RIO:</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="edtInserirUsuarioCpf">Documento</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="edtInserirUsuarioNascimento">Nascimento</label>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-6 campoValidar">
                                        <input type="text" name="edtInserirUsuarioCpf" id="edtInserirUsuarioCpf" class="form-control" placeholder="Cpf" onchange="formatarBlur(this,'cpf')">
                                    </div>
                                    <div class="col-lg-6 campoValidar">
                                        <input type="text" name="edtInserirUsuarioNascimento" id="edtInserirUsuarioNascimento" class="form-control" placeholder="Nascimento" onchange="formatarBlur(this,'data')">
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="edtInserirUsuarioNome">Nome</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 campoValidar">
                                        <input type="text" name="edtInserirUsuarioNome" id="edtInserirUsuarioNome" class="form-control" placeholder="Nome do usu&aacute;rio">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3">
                                        <label for="edtInserirUsuarioCep">Cep</label>
                                    </div>

                                    <div class="col-lg-5">
                                        <label for="edtInserirUsuarioEndereco">Endereco</label>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="edtInserirUsuarioNumero">Numero</label>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="edtInserirUsuarioUf">UF</label>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-3 campoValidar">
                                        <input type="text" name="edtInserirUsuarioCep" id="edtInserirUsuarioCep" class="form-control" onblur="formatarBlur(this,'cep'); pesquisa_cep_padrao($('#edtInserirUsuarioCep').val(), 'edtInserirUsuarioEndereco', 'edtInserirUsuarioCidade', 'edtInserirUsuarioBairro', 'edtInserirUsuarioUf', 'edtInserirUsuarioComplemento');" placeholder="Cep da empresa">
                                    </div>

                                    <div class="col-lg-5 campoValidar">
                                        <input type="text" name="edtInserirUsuarioEndereco" id="edtInserirUsuarioEndereco" class="form-control" placeholder="Endere&ccedil;o da empresa">
                                    </div>
                                    <div class="col-lg-2 campoValidar">
                                        <input type="text" name="edtInserirUsuarioNumero" id="edtInserirUsuarioNumero" class="form-control" placeholder="N&uacute;mero da empresa">
                                    </div>
                                    <div class="col-lg-2 campoValidar">
                                        <select name="edtInserirUsuarioUf" id="edtInserirUsuarioUf" class="form-control">
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

                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="edtInserirUsuarioComplemento">Complemento</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="edtInserirUsuarioBairro">Bairro</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="edtInserirUsuarioCidade">Cidade</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 campoValidar" >
                                        <input type="text" name="edtInserirUsuarioComplemento" id="edtInserirUsuarioComplemento" class="form-control" placeholder="Complemento do end. do usu&aacute;rio">
                                    </div>
                                    <div class="col-lg-4 campoValidar">
                                        <input type="text" name="edtInserirUsuarioBairro" id="edtInserirUsuarioBairro" class="form-control" placeholder="Bairro do usu&aacute;rio">
                                    </div>
                                    <div class="col-lg-4 campoValidar">
                                        <input type="text" name="edtInserirUsuarioCidade" id="edtInserirUsuarioCidade" class="form-control" placeholder="Cidade do usu&aacute;rio"><br/>
                                    </div>

                                </div> <!--DIV CLASS row-->

                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="edtInserirUsuarioCelular">Celular</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="edtInserirUsuarioFone">Telfone</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="edtInserirUsuarioEmail">E-mail</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 campoValidar">
                                        <input type="text" id="edtInserirUsuarioCelular" name="edtInserirUsuarioCelular" class="form-control" onchange="formatarBlur(this,'celular')" placeholder="Celular">
                                    </div>
                                    <div class="col-lg-4 campoValidar">
                                        <input type="text" id="edtInserirUsuarioFone" name="edtInserirUsuarioFone" class="form-control" onchange="formatarBlur(this,'fone');" placeholder="Tel. Fixo do usu&aacute;rio">
                                    </div>
                                    <div class="col-lg-4 campoValidar">
                                        <input type="text" id="edtInserirUsuarioEmail" name="edtInserirUsuarioEmail" class="form-control" placeholder="E-mail do usu&aacute;rio" >
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="edtInserirUsuarioPerfil">Perfil</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="edtInserirUsuarioSetor">Setor</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="divUsuarioLocal">Cargo</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 campoValidar" id="divInserirUsuarioPerfil">
                                        ...
                                    </div>
                                    <div class="col-lg-4 campoValidar" id="divInserirUsuarioSetor">
                                        ...
                                    </div>
                                    <div class="col-lg-4 campoValidar" id="divUsuarioCargo">
                                        ...
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="divUsuarioLocal">Local</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="divUsuarioLocal">Limite Certificados (Qtd.)</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="divUsuarioLocal">Margem de desconto Permitida</label>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-4 campoValidar" id="divUsuarioLocal">
                                        ...
                                    </div>

                                    <div class="col-lg-4 campoValidar">
                                        <input type="text" id="edtLimiteQuantidade" name="edtLimiteQuantidade" class="form-control" placeholder="Qtd. Certificados n&atilde;o pagos" >
                                    </div>
                                    <div class="col-lg-4 campoValidar">
                                        <input type="text" id="edtMargemDesconto" name="edtMargemDesconto" class="form-control" placeholder="Qtd. Certificados n&atilde;o pagos" >
                                    </div>

                                </div>



                            </div> <!--FIM PANEL-BODY-->
                        </div> <!--FIM PANEL-DEFAULT-->

                    </div> <!--FIM MODAL-BODY-->
                </form> <!--FIM DO FORM-->
            </div><!--FIM DIV FORM -->
            <div class="modal-footer">
                <input type="hidden" id="acaoUsuario" name="acaoUsuario">
                <input type="button" class="btn btn-success" id="btnInserirEditarUsuario" name="btnInserirEditarUsuario" value="Salvar">
                <!--<button id="btnInserirParceiro" class="btn btn-success">Salvar</button>-->
            </div>

        </div>
    </div>

    <!--VALIDACAO FORM VALIDATION-->
    <script>
        $( document ).ready( function () {

            $("#frmInserirUsuario").validate({
                rules: {
                    edtInserirUsuarioCpf: {
                        required: true,
                        cpf: true
                    },
                    edtInserirUsuarioNascimento: {
                        required: true,
                    },
                    edtInserirUsuarioNome: {
                        required: true,
                    },
                    edtInserirUsuarioCep: {
                        required: true,
                    },
                    edtInserirUsuarioEndereco: {
                        required: true,
                    },
                    edtInserirUsuarioNumero: {
                        required: true,
                    },
                    edtInserirUsuarioUf: {
                        required: true,
                    },
                    edtInserirUsuarioBairro: {
                        required: true,
                    },
                    edtInserirUsuarioCidade: {
                        required: true,
                    },
                    edtInserirUsuarioCelular: {
                        required: true,
                        celular: true
                    },
                    edtInserirUsuarioFone: {
                        telefone: true
                    },
                    edtInserirUsuarioEmail: {
                        required: true,
                        email:true
                    },
                    edtLimiteQuantidade: {
                        required: true,
                        number: true
                    },
                    edtMargemDesconto: {
                        required: true,
                        number: true
                    },
                    edtInserirUsuarioPerfil : "required",
                    edtInserirUsuarioSetor : "required",
                    edtInserirUsuarioLocal : "required",
                    edtInserirUsuarioCargo : 'required',

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

            $("#btnInserirEditarUsuario").click(function () {
                if ($("#frmInserirUsuario").valid()) {
                    salvarUsuario();
                }
            })

        });
    </script>
<!--FIM DE VALIDACAO-->
</div> <!--DIV ID inserirObservacao-->