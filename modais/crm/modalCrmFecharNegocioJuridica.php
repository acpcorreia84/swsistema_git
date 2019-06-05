<!-- FECHAR NEGOCIO MODAL -->
<div class="modal fade" role="dialog" id="fecharNegocioFormJ">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h3 class="modal-title"><i class="fa fa-check fa-lg"></i> Pessoa Juridica</h3>
            </div>
            <div class="modal-header">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-striped table-responsive">
                            <form role="form">
                                <tbody>
                                <tr>
                                    <td>
                                        <input type="hidden" name="edtTipoPessoaFecharNegocio" id="edtTipoPessoaFecharNegocio" />
                                        <label for="edtCnpjNegocio">CNPJ:</label>
                                        <input type='text' placeholder="00.000.000/0000-00" class="form-control" name="edtCnpjNegocio" id="edtCnpjNegocio" onKeyPress="formatar(this, 'cnpj')" onBlur="validaCNPJ(this);pesquisa_cnpj(this.value);campoObrigatorio(this)" onKeyUp="validaCNPJ(this);" autofocus/>
                                    </td>

                                    <td colspan="2">
                                        <label for="edtRazaoSocial">Razao Social*:</label>
                                        <input type='text' placeholder="" class="form-control" name="edtRazaoSocial" id="edtRazaoSocial" onblur="campoObrigatorio(this)"/>
                                    </td>


                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <label for="edtNomeFantasiaNegocio">Nome Fantasia:</label>
                                        <input type="text" class="form-control" name="edtNomeFantasiaNegocio" id="edtNomeFantasiaNegocio" onblur="campoObrigatorio(this);"/>
                                    </td>

                                    <td>
                                        <label for="edtEmailEmpresaNegocio">Email:</label>
                                        <input type="email" placeholder="email@provedor.com" class="form-control" name="edtEmailEmpresaNegocio" id="edtEmailEmpresaNegocio" onblur="campoObrigatorio(this);verificaEmail(this);"/>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <label for="edtEnderecoEmpresaNegocio">Endereço:</label>
                                        <input type="text" class="form-control" name="edtEnderecoEmpresaNegocio" id="edtEnderecoEmpresaNegocio" onFocus="pesquisacep(edtCepNegocio.value);" onblur="campoObrigatorio(this);" />
                                    </td>

                                    <td>
                                        <label for="edtComplementoEmpresaNegocio">Complemento:</label>
                                        <input type="text" placeholder="Ex.: Casa ,Apartamento, Conjunto" class="form-control" name="edtComplementoEmpresaNegocio" id="edtComplementoEmpresaNegocio" />
                                        <input type="hidden" name="edtCidadeNegocio" id="edtCidadeNegocio">
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="edtNumeroEmpresaNegocio">Numero:</label>
                                        <input type="text" class="form-control" name="edtNumeroEmpresaNegocio" id="edtNumeroEmpresaNegocio" onblur="campoObrigatorio(this);"/>
                                    </td>

                                    <td>
                                        <label for="edtBairroEmpresaNegocio">Bairro:</label>
                                        <input type="text" class="form-control" name="edtBairroEmpresaNegocio" id="edtBairroEmpresaNegocio" onblur="campoObrigatorio(this);"/>
                                    </td>

                                    <td>
                                        <label for="edtUfEmpresaNegocio">Uf:</label>
                                        <select name="edtUfEmpresaNegocio" id="edtUfEmpresaNegocio" class="form-control" tabindex="10" onblur="campoObrigatorio(this);">
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
                                    <td>
                                        <label for="edtFoneEmpresaNegocio">Telefone 1:</label>
                                        <input type="text" placeholder="DDD + NÚMERO" class="form-control" name="edtFoneEmpresaNegocio" id="edtFoneEmpresaNegocio" onKeyPress="formatar(this , 'fone')" onblur="campoObrigatorio(this)"/>
                                    </td>

                                    <td>
                                        <label for="edtFone2EmpresaNegocio">Telefone 2:</label>
                                        <input type="text" placeholder="DDD + NÚMERO" class="form-control" name="edtFone2EmpresaNegocio" id="edtFone2EmpresaNegocio" onKeyPress="formatar(this , 'fone')" />
                                    </td>

                                    <td>
                                        <label for="edtCelularEmpresaNegocio">Celular:</label>
                                        <input type="text" placeholder="ex.: 91 9xxxx-xxxx" class="form-control" name="edtCelularEmpresaNegocio" id="edtCelularEmpresaNegocio"  onKeyPress="formatar(this , 'celular')" onblur="campoObrigatorio(this);"/>
                                    </td>
                                </tr>
                                </tbody>
                                <input type="hidden" name="edtCodigoJuridicoNegocio" id="edtCodigoJuridicoNegocio" />
                            </form>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" name="edtSalvarPessoaJuridica" id="edtSalvarPessoaJuridica" class="btn btn-primary"  onClick="trocaModal('#edtSalvarPessoaJuridica','#fecharNegocioFormF')"> Proximo<i class="fa fa-arrow-circle-right fa-lg"></i> </button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close fa-lg"></i> Fechar</button>
            </div>
        </div>
    </div>
</div>