<!-- FECHAR NEGOCIO MODAL -->
<div class="modal fade" role="dialog" id="fecharNegocioFormF">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h3 class="modal-title"><i class="fa fa-check fa-lg"></i> Pessoa F&iacute;sica</h3>
            </div>
            <div class="modal-header">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-striped table-responsive">
                            <form role="form">
                                <tbody>
                                <tr>
                                    <td>
                                        <label for="edtCpfNegocio">CPF*:</label>
                                        <input type='text' placeholder="000.000.000-00" class="form-control" name="edtCpfNegocio" id="edtCpfNegocio" onKeyPress="formatar(this, 'cpf')" onBlur="liberaEscolherProduto();campoObrigatorio(this);validaCPF(this);pesquisa_cpf(this.value);" onKeyUp="validaCPF(this);" autofocus/>
                                    </td>

                                    <td>
                                        <label for="edtDataNascimentoNegocio">Data Nascimento*:</label>
                                        <input type='text' placeholder="dd/mm/aaaa" class="form-control" name="edtDataNascimentoNegocio" id="edtDataNascimentoNegocio" onKeyPress="formatar(this , 'data')" onBlur="liberaEscolherProduto();campoObrigatorio(this);" onchange="campoObrigatorio(this);" />
                                    </td>

                                    <td>
                                        <label for="edtCepNegocio">CEP*:</label>
                                        <input type='text' placeholder="00000-000" class="form-control" name="edtCepNegocio" id="edtCepNegocio" onKeyPress="formatar(this , 'cep')" onBlur="liberaEscolherProduto();consultaCEP(this.value);campoObrigatorio(this);" onchange="campoObrigatorio(this);pesquisacep(this.value);"  />
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <label for="edtNomeNegocio">Nome*:</label>
                                        <input type="text" class="form-control" name="edtNomeNegocio" id="edtNomeNegocio" onBlur="liberaEscolherProduto();campoObrigatorio(this);" onchange="campoObrigatorio(this);" />
                                    </td>

                                    <td>
                                        <label for="edtEmailNegocio">Email*:</label>
                                        <input type="text" placeholder="email@provedor.com" class="form-control" name="edtEmailNegocio" id="edtEmailNegocio" onBlur="liberaEscolherProduto();campoObrigatorio(this);verificaEmail(this);" onchange="campoObrigatorio(this);"  />
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <label for="edtEnderecoNegocio">Endere&ccedil;o*:</label>
                                        <input type="text" class="form-control" name="edtEnderecoNegocio" id="edtEnderecoNegocio" onBlur="liberaEscolherProduto();campoObrigatorio(this);" onchange="campoObrigatorio(this);"  />
                                    </td>

                                    <td>
                                        <label for="edtComplementoNegocio">Complemento:</label>
                                        <input type="text" placeholder="Ex.: Casa ,Apartamento, Conjunto" class="form-control" name="edtComplementoNegocio" id="edtComplementoNegocio"/>
                                        <input type="hidden" name="edtCidadeNegocio" id="edtCidadeNegocio">
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="edtNumeroNegocio">N&uacute;mero:</label>
                                        <input type="text" class="form-control" name="edtNumeroNegocio" id="edtNumeroNegocio" onBlur="liberaEscolherProduto();campoObrigatorio(this);" onchange="campoObrigatorio(this);"  />
                                    </td>

                                    <td>
                                        <label for="edtBairroNegocio">Bairro:</label>
                                        <input type="text" class="form-control" name="edtBairroNegocio" id="edtBairroNegocio" onBlur="liberaEscolherProduto();campoObrigatorio(this);" onchange="campoObrigatorio(this);"  />
                                    </td>

                                    <td>
                                        <label for="edtUfNegocio">Uf:</label>
                                        <select name="edtUfNegocio" id="edtUfNegocio" class="form-control" tabindex="10" onBlur="liberaEscolherProduto();campoObrigatorio(this);" onchange="campoObrigatorio(this);" >
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
                                        <label for="edtFoneNegocio">Telefone 1:</label>
                                        <input type="text" placeholder="DDD + NÚMERO" class="form-control" name="edtFoneNegocio" id="edtFoneNegocio" onKeyPress="formatar(this,'fone')" onBlur="liberaEscolherProduto();campoObrigatorio(this);" onchange="campoObrigatorio(this);"  />
                                    </td>

                                    <td>
                                        <label for="edtFone2Negocio">Telefone 2:</label>
                                        <input type="text" placeholder="DDD + NÚMERO" class="form-control" name="edtFone2Negocio" id="edtFone2Negocio" onKeyPress="formatar(this,'fone')" />
                                    </td>

                                    <td>
                                        <label for="edtCelularNegocio">Celular:</label>
                                        <input type="text" placeholder="ex.: 91 9xxxx-xxxx" class="form-control" name="edtCelularNegocio" id="edtCelularNegocio"  onKeyPress="formatar(this,'celular')" onBlur="liberaEscolherProduto();campoObrigatorio(this);" onchange="campoObrigatorio(this);"  />
                                    </td>
                                </tr>
                                </tbody>
                                <input type="hidden" name="edtCodigoFisicoNegocio" id="edtCodigoFisicoNegocio"/>
                            </form>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" name="edtSalvarPessoaFisica" id="edtSalvarPessoaFisica" class="btn btn-primary oculto" data-toggle="modal" data-target="#escolherProduto" onClick="liberaEscolherProduto();inserir_cadastro()"><i class="fa fa-list fa-lg"></i> Escolher Produto</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close fa-lg"></i> Fechar</button>
            </div>
        </div>
    </div>
</div>