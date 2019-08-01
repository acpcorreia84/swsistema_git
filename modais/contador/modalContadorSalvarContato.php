<!--MODAL TROCAR CONSULTOR-->
<div id="modalInserirContatoContador" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-10">
                    <h3><i class="fa fa-lg fa-address-card-o "></i> Inserir Contato ao Contador</h3>
                </div>
                <div class ="col-lg-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalDuvida" onclick="modalDuvida(3)"><i class="fa fa-lg fa-question"></i></button>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#modalInserirContatoContador"><i class="fa fa-lg fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <form method="post" action="#" name="frmSalvarContatosContador" id="frmSalvarContatosContador">

                    <div class="row">
                        <div class="form-group col-lg-12">
                            <div class="col-lg-6">
                                <label for="edtNomeNovoContato">Nome:</label>
                            </div>
                            <div class="col-lg-6">
                                <label for="edtCargoNovoContato" >Cargo:</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-12">
                            <div class="col-lg-6 form-group campoValidar">
                                <input type="text" class="form-control" name="edtNomeNovoContato" id="edtNomeNovoContato">
                            </div>
                            <div class="col-lg-6 form-group campoValidar">
                                <select id="edtCargoNovoContato" name="edtCargoNovoContato" class="selectpicker" data-live-search="true">
                                    <option data-tokens="Selecione o cargo do contato" name="" selected="selected">Selecione o cargo do contato</option>
                                    <option data-tokens="DEPARTAMENTO CONT&Aacute;BIL" name="DEPARTAMENTO CONTABIL">DEPARTAMENTO CONT&Aacute;BIL</option>
                                    <option data-tokens="DEPARTAMENTO DE CADASTROS" name="DEPARTAMENTO DE CADASTROS">DEPARTAMENTO DE CADASTROS</option>
                                    <option data-tokens="RECURSOS HUMANOS" name="DEPARTAMENTO DE RECURSOS HUMANOS">RECURSOS HUMANOS</option>
                                    <option data-tokens="DEPARTAMENTO FISCAL" name="DEPARTAMENTO FISCAL">DEPARTAMENTO FISCAL</option>
                                    <option data-tokens="DEPARTAMENTO PESSOAL" name="DEPARTAMENTO PESSOAL">DEPARTAMENTO PESSOAL</option>
                                    <option data-tokens="DIRETOR" name="DIRETOR">DIRETOR</option>
                                </select>
                            </div>
                        </div>
                    </div>



                    <div class="row ">
                        <div class="form-group col-lg-12">
                            <div class="col-lg-4">
                                <label for="edtCelularNovoContato">Celular (xx 9xxxx-xxxx):</label>
                            </div>
                            <div class="col-lg-4">
                                <label for="edtTelefoneNovoContato">Telefone (xx xxxx-xxxx):</label>
                            </div>
                            <div class="col-lg-4">
                                <label for="edtEmailNovoContato">E-mail:</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-12">
                            <div class="col-lg-4 form-group campoValidar">
                                <input type="text" class="form-control" name="edtCelularNovoContato" id="edtCelularNovoContato" onkeypress="formatar(this, 'celular')" onblur="formatarBlur(this, 'celular')">
                            </div>
                            <div class="col-lg-4 form-group campoValidar">
                                <input type="text" class="form-control" name="edtTelefoneNovoContato" id="edtTelefoneNovoContato" onkeypress="formatar(this, 'fone')" onblur="formatarBlur(this, 'fone')">
                            </div>

                            <div class="col-lg-4 form-group campoValidar">
                                <input type="text" class="form-control" name="edtEmailNovoContato" id="edtEmailNovoContato">
                            </div>
                        </div>
                    </div>

                </form>

            </div><!--DIV MODAL-CONTENT-->
            <div class="modal-footer">
                <button class="btn btn-success" id="btnSalvarContatoContador" name="btnSalvarContatoContador">Salvar</button>
            </div>
        </div>
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID inserirObservacao-->
<script>
    $("#frmSalvarContatosContador").validate({
        rules: {
            edtNomeNovoContato: {required:true},
            edtCargoNovoContato: {required:true},
            edtTelefoneNovoContato: {required:true, telefone:true},
            edtCelularNovoContato: {celular: true},
            edtEmailNovoContato: {required:true, email: true}
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

    $("#btnSalvarContatoContador").click(function () {
        if ($("#frmSalvarContatosContador").valid() ) {
            salvarContatoContador();
        }
    });

</script>
<!--FIM DO MODAL TROCAR CONSULTOR-->