<!-- INSEIRIR NOVO MODAL -->
<div class="modal fade" role="dialog" id="inserir">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"><i class="fa fa-plus fa-lg"></i> Inserir Prospect</h3>
            </div>

            <div class="modal-body1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-responsive table-striped">
                            <form name="frm">
                                <tbody>
                                <tr>
                                    <td> <label for="edtCategoriaProspect">Categoria:</label></td>
                                    <td colspan="3">
                                        <select name="edtCategoriaProspect" id="edtCategoriaProspect" class="form-control">
                                            <option value="">Selecione a Categoria</option>
                                            <option value="5">5 - Contador Novo</option><!-- Categoria para Contador Novo -->
                                            <option value="6">6 - Parceiro Novo</option><!-- Categoria para Parceiro Novo -->
                                            <option value="7">7 - Cliente Novo</option><!-- Categoria para Cliente Novo -->
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="edtNome">Nome:</label></td>
                                    <td><input type="text" class="form-control" name="edtNome" id="edtNome" size="10" /></td>
                                    <td><label for="edtCpf">CPF:</label></td>
                                    <td><input type="text" class="form-control"  maxlength="14" name="edtCpf" id="edtCpf" size="10" /></td>
                                </tr>

                                <tr>
                                    <td><label for="edtCep">CEP:</label></td>
                                    <td><input type="text" class="form-control" name="edtCep" id="edtCep" placeholder="00000-000" onKeyPress="formatar(this, 'cep')" onBlur="pesquisacep1(this.value);" size="10" /></td>
                                    <td><label for="edtBairro">Bairro:</label></td>
                                    <td><input type="text" class="form-control" name="edtBairro" id="edtBairro" size="10" /></td>
                                </tr>

                                <tr>
                                    <td><label for="edtCidade">Cidade:</label></td>
                                    <td><input type="text" class="form-control" name="edtCidade" id="edtCidade" size="10" /></td>
                                    <td><label for="edtUf">UF:</label></td>
                                    <td>
                                        <select name="edtUf" id="edtUf" class="form-control" tabindex="10">
                                            <option value="">Selecione</option>
                                            <option value="AC">AC</option>
                                            <option value="AL">AL</option>
                                            <option value="AP">AP</option>
                                            <option value="AM">AM</option>
                                            <option value="BA">BA</option>
                                            <option value="CE">CE</option>
                                            <option value="DF">DF</option>
                                            <option value="ES">ES</option>
                                            <option value="GO">GO</option>
                                            <option value="MA">MA</option>
                                            <option value="MT">MT</option>
                                            <option value="MS">MS</option>
                                            <option value="MG">MG</option>
                                            <option value="PA">PA</option>
                                            <option value="PB">PB</option>
                                            <option value="PR">PR</option>
                                            <option value="PE">PE</option>
                                            <option value="PI">PI</option>
                                            <option value="RJ">RJ</option>
                                            <option value="RN">RN</option>
                                            <option value="RS">RS</option>
                                            <option value="RO">RO</option>
                                            <option value="RR">RR</option>
                                            <option value="SC">SC</option>
                                            <option value="SP">SP</option>
                                            <option value="SE">SE</option>
                                            <option value="TO">TO</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td><label for="edtEndereco">Endere&ccedil;o:</label></td>
                                    <td><input type="text" class="form-control" name="edtEndereco" id="edtEndereco" size="10" /></td>
                                    <td><label for="edtComplemento">Complemento:</label></td>
                                    <td><input type="text" class="form-control" name="edtComplemento" id="edtComplemento" size="10" /></td>
                                </tr>

                                <tr>
                                    <td><label for="edtFone">Fone:</label></td>
                                    <td><input type="text" class="form-control" onKeyPress="formatar(this, 'fone')" onfocus="liberaBtn(this,'edtSalvarProspect')" onblur="liberaBtn(this,'edtSalvarProspect')" name="edtFone" id="edtFone" size="10" /></td>
                                    <td><label for="edtSite">E-mail</label></td>
                                    <td><input type="email" class="form-control" name="edtSite" id="edtSite" onfocus="liberaBtn(this,'edtSalvarProspect')" onblur="liberaBtn(this,'edtSalvarProspect')"/></td>
                                </tr>

                                </tbody>
                            </form>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" name="edtSalvarProspect" id="edtSalvarProspect" style="visibility: hidden" class="btn btn-success" data-dismiss="modal" onClick="inserir_registo();bancoLocal_add('inserir_prospect');"><i class="fa fa-check fa-lg"></i> Salvar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close fa-lg"></i> Fechar</button>
            </div>
        </div>
    </div>
</div>