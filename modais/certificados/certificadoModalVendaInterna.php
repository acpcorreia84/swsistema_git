<?/** * Created by PhpStorm. * User: Lincoln * Date: 31/10/2016 * Time: 09:13 */?>
<div id="vendaInterna" class="modal fade" role="dialog" data-backdrop="static">

        <div class="modal-dialog modal-lg">

                <div class="modal-content">
                            <div class="modal-header">
                                <h3><i class="fa fa-cart-plus fa-lg"></i> Cadastro pelo Sistema</h3>
                                <button data-dismiss="modal" class="close"><i class="fa fa-close"></i></button>
                            </div><!-- FIM MODAL HEADER -->

                            <div class="modal-body">
                                    <!--ESCOLHA TIPO CERTIFICADO-->
                                    <div id="escolhaTipoCertificado" class="panel panel-primary">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-xs-6 col-lg-6 col-md-6">
                                                    <h5>Selecione o tipo do Certificado Digital (Pj | PJ)</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-xs-12 col-lg-12 col-md-12">
                                                    <div class="col-xs-6 col-lg-6 col-md-6" id="pf">
                                                        <label><input type="radio" class="form-check" name="tipoPessoa" value="pf" onclick="verificaTipoCliente(this);"/>Pessoa Fisica</label>
                                                    </div>
                                                    <div class="row col-xs-6 col-md-6" id="pj">
                                                        <label><input type="radio" class="form-check" name="tipoPessoa" value="pj" onclick="verificaTipoCliente(this);"/>Pessoa Juridica</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--FIM ESCOLHA TIPO CERTIFICADO-->
                                    <!--ESCOLHA FORMULARIO CADASTRO CLIENTE - PRIMEIRA ETAPA-->
                                    <div id="divPrimeiraEtapa" class="oculto">
                                        <div class="panel panel-default" >
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-6 col-lg-6 col-md-6">
                                                        <h5>Dados do cliente</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <!-- CAMPOS CONSULTA PESSOA FISICA -->
                                                <div class="row" >
                                                    <form name="frmEscolhaPessoaFisica" id="frmEscolhaPessoaFisica" action="">
                                                        <div class="oculto" id="divEdtCpf">
                                                            <div class="col-md-5 campoValidar">
                                                                <label for="edtCpfVendaInterna">CPF*:</label>
                                                                <input type="text" class="form-control" name="edtCpfVendaInterna" id="edtCpfVendaInterna" onblur="formatarBlur(this,'cpf'); "/>
                                                            </div>
                                                            <div class="col-md-4 campoValidar">
                                                                <label for="edtDataNascimento">Nascimento*:</label>
                                                                <input type="text" class="form-control" name="edtDataNascimento" id="edtDataNascimento" onblur="formatarBlur(this,'data'); " />
                                                            </div>
                                                            <div class="col-md-3" id="div_codigo_cliente_pf">
                                                                <label>Cod.Cliente:</label><br/>
                                                                <span id="codigo_cliente_pf"></span>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- FIM CAMPOS CONSULTA PESSOA FISICA -->
                                                <!-- CAMPOS CONSULTA PESSOA JURIDICA -->
                                                <div class="row col-lg-12">
                                                    <form name="frmEscolhaPessoaJuridica" id="frmEscolhaPessoaJuridica" action="">
                                                        <div class="oculto" id="divEdtCnpj">
                                                            <div class="col-lg-4 col-md-4 campoValidar">
                                                                <label for="edtCnpjVendaInterna">CNPJ*:</label>
                                                                <input type="text" class="form-control" name="edtCnpjVendaInterna" id="edtCnpjVendaInterna"  onblur="formatarBlur(this,'cnpj')";/>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 campoValidar">
                                                                <label for="edtCpfVendaInternaPj">CPF*:</label>
                                                                <input type="text" class="form-control" name="edtCpfVendaInternaPj" id="edtCpfVendaInternaPj" onblur="formatarBlur(this,'cpf')";/>
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 campoValidar">
                                                                <label for="edtDataNascimentoPj">Nasc.*:</label>
                                                                <input type="text" class="form-control" name="edtDataNascimentoPj" id="edtDataNascimentoPj" onblur="formatarBlur(this,'data')";/>
                                                            </div>
                                                            <div class="col-lg-2 col-md-2" id="div_codigo_cliente_pj">
                                                                <label>Cod.Clien:</label><br/>
                                                                <span id="codigo_cliente_pj"></span>
                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- FIM CAMPOS CONSULTA PESSOA JURIDICA -->
                                                <div class="oculto" id="divFormCliente">
                                                    <form action="" name="frmDadosPessoaJuridica" id="frmDadosPessoaJuridica">
                                                        <!--CAMPOS RELATIVOS A PESSOA JURIDICA-->
                                                        <div id="divPessoaJuridica" class="row oculto" >
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12 col-xs-12">
                                                                    <div class="col-lg-4" style="padding-top: 10px ;padding-bottom: 10px ;">
                                                                        <h5 class="text-info"><i class="fa fa-building-o" aria-hidden="true"></i> INFORMA&Ccedil;&Otilde;ES DA EMPRESA</h5>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row form-group">
                                                                <div class="col-lg-12 col-md-12 col-xs-12">
                                                                    <div class="col-lg-1 col-md-1 col-xs-1">
                                                                        <label for="edtRazaoSocial">Raz&atilde;o*:</label>
                                                                    </div>
                                                                    <div class="col-lg-5 col-md-5 col-xs-5">
                                                                        <input type="text" class="form-control" name="edtRazaoSocial" id="edtRazaoSocial" "/>
                                                                    </div>
                                                                    <div class="col-lg-1 col-md-1 col-xs-1">
                                                                        <label for="edtNomeFantasia">Fantasia*:</label>
                                                                    </div>
                                                                    <div class="col-lg-5 col-md-5 col-xs-5">
                                                                        <input type="text" class="form-control" name="edtNomeFantasia" id="edtNomeFantasia" " />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-lg-12 col-md-12 col-xs-12">
                                                                    <div class="col-lg-1 col-md-1 col-xs-1">
                                                                        <label for="edtCepPjVendaInterna">CEP*:</label>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-4 col-xs-12">
                                                                        <input type="text" class="form-control" name="edtCepPjVendaInterna" id="edtCepPjVendaInterna" onkeypress="formatar(this,'cep');" onblur="formatarBlur(this,'cep'); pesquisa_cep_cliente(this.value, 'edtEnderecoVendaInternaPj','edtCidadePjVendaInterna', 'edtBairroPjVendaInterna', 'edtUfVendaInterna', 'edtComplementoVendaInterna', 'J' ); $('#frmDadosPessoaJuridica').valid();" />
                                                                    </div>
                                                                    <div class="col-lg-1 col-md-1 col-xs-12">
                                                                        <label for="edtBairroPjVendaInterna">Bairro*:</label>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-4 col-xs-12">
                                                                        <input type="text" class="form-control" name="edtBairroPjVendaInterna" id="edtBairroPjVendaInterna" "/>
                                                                    </div>
                                                                    <div class="col-lg-1 col-md-1 col-xs-12">
                                                                        <label for="edtCidadePjVendaInterna">Cidade*:</label>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-4 col-xs-12">
                                                                        <input type="text" class="form-control" name="edtCidadePjVendaInterna" id="edtCidadePjVendaInterna" "/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row form-group">
                                                                <div class="col-lg-12 col-md-12 col-xs-12">
                                                                    <div class="col-lg-1 col-md-3 col-xs-12">
                                                                        <label for="edtEnderecoVendaInternaPj">End*.:</label>
                                                                    </div>
                                                                    <div class="col-lg-11 col-md-11 col-xs-12">
                                                                        <input type="text" class="form-control" name="edtEnderecoVendaInternaPj" id="edtEnderecoVendaInternaPj" "/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-lg-12 col-md-12 col-xs-12">
                                                                    <div class="col-lg-1 col-md-1 col-xs-12 ">
                                                                        <label for="edtNumeroVendaInterna">N*:</label>
                                                                    </div>
                                                                    <div class="col-lg-2 col-md-2 col-xs-12 campoValidar">
                                                                        <input type="text" class="form-control" name="edtNumeroVendaInterna" id="edtNumeroVendaInterna" " />
                                                                    </div>
                                                                    <div class="col-lg-1 col-md-1 col-xs-12">
                                                                        <label for="edtComplementoVendaInterna">Compl.:*:</label>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-4 col-xs-12 campoValidar">
                                                                            <input type="text" class="form-control" name="edtComplementoVendaInterna" id="edtComplementoVendaInterna" />
                                                                    </div>
                                                                    <div class="col-lg-1 col-md-1 col-xs-12">
                                                                        <label for="edtUfVendaInterna">Estado*:</label>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-3 col-xs-12 campoValidar">
                                                                        <select name="clEdtUfResponsavel" id="edtUfVendaInterna" class="form-control" onblur="liberaBtn(this,'altCliente')">
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
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-lg-1 col-md-1 col-xs-12">
                                                                    <label for="edtFonePjVendaInterna">Telefone*:</label>
                                                                </div>
                                                                <div class="col-lg-3 col-md-3 col-xs-12 campoValidar">
                                                                    <input type="text" class="form-control" name="edtFonePjVendaInterna" id="edtFonePjVendaInterna" onkeypress="formatar(this,'fone')" onblur="formatarBlur(this,'fone')" />
                                                                </div>
                                                                <div class="col-lg-1 col-md-1 col-xs-12">
                                                                    <label for="edtFone2PjVendaInterna">Tel.2:</label>
                                                                </div>
                                                                <div class="col-lg-3 col-md-3 col-xs-12 campoValidar">
                                                                    <input type="text" class="form-control" name="edtFone2PjVendaInterna" id="edtFone2PjVendaInterna" onkeypress="formatar(this,'fone')" onblur="formatarBlur(this,'fone')" />
                                                                </div>
                                                                <div class="col-lg-1 col-md-1 col-xs-12">
                                                                    <label for="edtCelularPjVendaInterna">Celular:</label>
                                                                </div>
                                                                <div class="col-lg-3 col-md-3 col-xs-12 campoValidar">
                                                                    <input type="text" class="form-control" name="edtCelularPjVendaInterna" id="edtCelularPjVendaInterna" onkeypress="formatar(this,'celular')" onblur="formatarBlur(this,'celular')" />
                                                                </div>
                                                            </div>

                                                            <div class="row form-group">
                                                                <div class="col-lg-1 col-md-1 col-xs-12">
                                                                    <label for="edtEmailPjVendaInterna">Email*:</label>
                                                                </div>
                                                                <div class="col-lg-5 col-md-5 col-xs-12 campoValidar">
                                                                    <input type="text" class="form-control" name="edtEmailPjVendaInterna" id="edtEmailPjVendaInterna" " />
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </form>
                                                    <!--FIM DOS CAMPOS RELATIVOS A PESSOA JURIDICA-->

                                                    <!--CAMPOS RELATIVOS AO REPRESENTANTE LEGAL-->
                                                    <form action="" name="frmRepresentanteLegal" id="frmRepresentanteLegal">
                                                        <div class="row form-group">
                                                                <div class="col-lg-6 col-md-6 col-xs-6">
                                                                    <h5 class="text-info"><i class="fa fa-user-plus" aria-hidden="true"></i> INFORMA&Ccedil;&Otilde;ES  DO REPRESENTANTE LEGAL</h5> <small><span id="codigoRepresentanteVendaInterna"></span></small>
                                                                    <input type="hidden" class="form-control" name="edtCodigoContadorCadastro" id="edtCodigoContadorCadastro"/>
                                                                </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-lg-2 col-md-2 col-xs-2">
                                                                <label for="edtNomeRepresentanteVendaInterna">Representante*:</label>
                                                            </div>
                                                            <div class="col-lg-10 col-md-6 col-xs-6 campoValidar">
                                                                <input type="text" class="form-control" name="edtNomeRepresentanteVendaInterna" id="edtNomeRepresentanteVendaInterna"  "/>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-lg-1 col-md-1 col-xs-12">
                                                                <label for="edtCepRepresentanteVendaInterna">CEP*:</label>
                                                            </div>
                                                            <div class="col-lg-3 col-md-4 col-xs-12 campoValidar">
                                                                <input type="text" class="form-control" name="edtCepRepresentanteVendaInterna" id="edtCepRepresentanteVendaInterna" onkeypress="formatar(this,'cep');"  onblur="formatarBlur(this,'cep'); pesquisa_cep_cliente(this.value, 'edtEnderecoRepresentanteVendaInterna', 'edtCidadeRepresentanteVendaInterna', 'edtBairroRepresentanteVendaInterna', 'edtUfRepresentanteVendaInterna', 'edtComplementoRepresentanteVendaInterna', 'F' ); $('#frmRepresentanteLegal').valid();" />
                                                            </div>
                                                            <div class="col-lg-1 col-md-1 col-xs-12">
                                                                <label for="edtBairroRepresentanteVendaInterna">Bairro*:</label>
                                                            </div>
                                                            <div class="col-lg-3 col-md-4 col-xs-12 campoValidar">
                                                                <input type="text" class="form-control" name="edtBairroRepresentanteVendaInterna" id="edtBairroRepresentanteVendaInterna" "/>
                                                            </div>
                                                            <div class="col-lg-1 col-md-1 col-xs-12">
                                                                <label for="edtCidadeRepresentanteVendaInterna">Cidade*:</label>
                                                            </div>
                                                            <div class="col-lg-3 col-md-4 col-xs-12 campoValidar">
                                                                <input type="text" class="form-control" name="edtCidadeRepresentanteVendaInterna" id="edtCidadeRepresentanteVendaInterna" "/>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                                <div class="col-lg-1 col-md-3 col-xs-12">
                                                                    <label for="edtEnderecoRepresentanteVendaInterna">End*.:</label>
                                                                </div>
                                                                <div class="col-lg-11 col-md-11 col-xs-12 campoValidar">
                                                                    <input type="text" class="form-control" name="edtEnderecoRepresentanteVendaInterna" id="edtEnderecoRepresentanteVendaInterna" "/>
                                                                </div>
                                                        </div>
                                                        <div class="row form-group">
                                                                <div class="col-lg-1 col-md-1 col-xs-12">
                                                                    <label for="edtNumeroRepresentanteVendaInterna">N*:</label>
                                                                </div>
                                                                <div class="col-lg-2 col-md-2 col-xs-12 campoValidar">
                                                                    <input type="text" class="form-control" name="edtNumeroRepresentanteVendaInterna" id="edtNumeroRepresentanteVendaInterna" " />
                                                                </div>
                                                                <div class="col-lg-1 col-md-1 col-xs-12">
                                                                    <label for="edtComplementoRepresentanteVendaInterna">Compl.:*:</label>
                                                                </div>
                                                                <div class="col-lg-4 col-md-4 col-xs-12">
                                                                    <input type="text" class="form-control" name="edtComplementoRepresentanteVendaInterna" id="edtComplementoRepresentanteVendaInterna" />
                                                                </div>
                                                                <div class="col-lg-1 col-md-1 col-xs-12">
                                                                    <label for="edtUfRepresentanteVendaInterna">Estado*:</label>
                                                                </div>
                                                                <div class="col-lg-3 col-md-3 col-xs-12 campoValidar">
                                                                    <select name="edtUfRepresentanteVendaInterna" id="edtUfRepresentanteVendaInterna" class="form-control" onblur="liberaBtn(this,'altCliente')">
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

                                                        <div class="row form-group">
                                                            <div class="col-lg-1 col-md-1 col-xs-12">
                                                                <label for="edtFoneRepresentanteVendaInterna">Telefone*:</label>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-xs-12 campoValidar">
                                                                <input type="text" class="form-control" name="edtFoneRepresentanteVendaInterna" id="edtFoneRepresentanteVendaInterna" onkeypress="formatar(this,'fone')" onblur="formatarBlur(this,'fone');"/>
                                                            </div>
                                                            <div class="col-lg-1 col-md-1 col-xs-12">
                                                                <label for="edtFone2RepresentanteVendaInterna">Tel.2:</label>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-xs-12 campoValidar">
                                                                <input type="text" class="form-control" name="edtFone2RepresentanteVendaInterna" id="edtFone2RepresentanteVendaInterna" onkeypress="formatar(this,'fone')" onblur="formatarBlur(this,'fone');"/>
                                                            </div>
                                                            <div class="col-lg-1 col-md-1 col-xs-12">
                                                                <label for="edtCelularRepresentanteVendaInterna">Celular:</label>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-xs-12 campoValidar">
                                                                <input type="text" class="form-control" name="edtCelularRepresentanteVendaInterna" id="edtCelularRepresentanteVendaInterna" onkeypress="formatar(this,'celular')" onblur="formatarBlur(this,'celular');"/>
                                                            </div>
                                                        </div>

                                                        <div class="row form-group">
                                                            <div class="col-lg-1 col-md-1 col-xs-12">
                                                                <label for="edtEmailRepresentanteVendaInterna">Email*:</label>
                                                            </div>
                                                            <div class="col-lg-5 col-md-5 col-xs-12 campoValidar">
                                                                <input type="text" class="form-control" name="edtEmailRepresentanteVendaInterna" id="edtEmailRepresentanteVendaInterna" " />
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--ETAPA QUE CONSULTA CERTIFICADOS DUPLICADOS OU RENOVACOES -->
                                    <div id="divEtapaConsultaCertificados" class="oculto">
                                        <div class="panel panel-default" >
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                                        <h4>Encontramos estes certificados abaixo listados para este cliente:</h4>
                                                        <h5>Clique na op&ccedil;&atilde;o ao lado do pedido pra avan&ccedil;ar</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-body" >

                                                <div class="row">
                                                    <div class="col-xs-12 col-lg-12 col-md-12 ">
                                                        <div class="col-xs-4 col-lg-4 col-md-4 " >
                                                            Certificados a renovar
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                                        <div class="table table-responsive" id="divTabelaCdsRenVendaInterna"></div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                                        <div class="col-xs-4 col-lg-4 col-md-4 " >
                                                            Provaveis certificados duplicados
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                                        <div class="table table-responsive" id="divTabelaCdsDupVendaInterna"></div>
                                                    </div>
                                                </div>


                                                <div class="row oculto" id="divNovoPedido">
                                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                                        <div class="col-xs-4 col-lg-4 col-md-4 " >
                                                            <h3>Novo pedido</h3>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                                        <div class="col-xs-4 col-lg-4 col-md-4 " >
                                                            Caso voc&eacute; n&atilde;o queira renovar este pedido, clique aqui
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4 col-md-4 " >
                                                            <button class="btn btn-info" title="Clique aqui para criar um pedido novo, independente da renova&ccedil;&atilde;o deste cliente." onclick="$('#idCertificadoRenovacao').val(); $('#idCertificadoDuplicado').val(); avancarVendaInterna()"><i class="fa fa-chevron-right"></i> </button>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <!--FIM DA ETAPA QUE CONSULTA CERTIFICADOS DUPLICADOS OU RENOVACOES -->


                                    <div id="divSegundaEtapa" class="oculto">
                                        <!--FIM ESCOLHA FORMULARIO CADASTRO CLIENTE - PRIMEIRA ETAPA-->
                                        <div class="panel panel-default" >
                                                <div class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-lg-12 col-md-12">
                                                            <h5>Escolha o contador, caso n&atilde;o esteja na sua carteira escolha a op&ccedil;&atilde;o: <strong>"Contador de outra carteira"</strong></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel-body" >
                                                    <!-------------------------CONTADOR ------------------------->
                                                    <div class="row">
                                                        <div class="col-xs-12 col-lg-12 col-md-12">
                                                            <div class="col-xs-4 col-lg-4 col-md-4 " >
                                                                <label>Contador</label><div id="div_select_contadores"></div>
                                                            </div>
                                                            <div class="col-xs-8 col-lg-8 col-md-8 oculto" id="div_outros_contadores">
                                                                    <label for="edtInformarCodContador">Cod Contador</label>
                                                                    <!-- Trigger the modal with a button -->
                                                                    <input type="text" class="form-control" name="edtInformarCodContador" id="edtInformarCodContador" onblur="procurar_contador();"/>
                                                                    <input type="hidden" class="form-control" name="edtCodigoContadorPedido" id="edtCodigoContadorPedido"/>
                                                                    <input type="hidden" class="form-control" name="edtTipoCliente" id="edtTipoCliente" value=""/>
                                                                    <input type="hidden" class="form-control" name="edtProdutoCertificado" id="edtProdutoCertificado" value=""/>
                                                                    <input type="hidden" name="idClienteVendaInterna" id="idClienteVendaInterna" value=""/>
                                                                    <input type="hidden" name="idCertificadoRenovacao" id="idCertificadoRenovacao" value=""/>
                                                                    <input type="hidden" name="idCertificadoDuplicado" id="idCertificadoDuplicado" value=""/>

                                                                    <label>Nome:</label>
                                                                    <input type="text" class="form-control" disabled  name="edtNomeContador" id="edtNomeContador" />

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-------------------------FIM CONTADOR ------------------------->
                                                </div>
                                        </div>



                                        <div class="panel panel-default" id="divMotivoDuplicidade">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                                        <h5>Duplicidade de clientes</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-body" >
                                                <!-------------------------DESCRICAO DUPLICIDADE ------------------------->
                                                <div class="row">
                                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                                        <div class="col-xs-4 col-lg-4 col-md-4 " >
                                                            <h5>Lembrando que caso voc&ecirc; opte por duplicar, esse pedido dever&aacute; ser autorizado pela gest&atilde;o</h5>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4 col-md-4 " >
                                                            <h4>Informe aqui o motivo da duplica&ccedil;&atilde;o do pedido:</h4>
                                                            <textarea class="form-control" id="txtMotivoDuplicacao" name="txtMotivoDuplicacao" rows="5" placeholder="Descreva aqui o motivo."></textarea>
                                                        </div>


                                                    </div>
                                                </div>

                                                <!-------------------------DESCRICAO DUPLICIDADE ------------------------->
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
                                                    <div class="row">
                                                        <div class="col-xs-12 col-lg-12 col-md-12">
                                                            <div class="col-lg-6">
                                                                <h4>Alterar Produto:</h4>
                                                            </div>
                                                            <div class="col-lg-6" id="div_select_produtos"></div>
                                                        </div>
                                                    </div> <!--DIV CLASS row-->

                                                    <fieldset class="row">
                                                        <div class="col-xs-12 col-lg-12 col-md-12">
                                                            <div class="col-lg-6">
                                                                <h4>Alterar forma de pagamento:</h4>
                                                            </div>
                                                            <div class="col-lg-6">

                                                                <label><input type="radio" name="edtVnPagamento" value="1" > <i class="fa  fa-barcode"> Boleto </i>  </label>
                                                                <br/>
                                                                <label><input type="radio" name="edtVnPagamento" value="6" > <i class="fa fa-credit-card"> Cart&atilde;o de Cr&eacute;dito Online</i></label><br/>
                                                                <label><input  type="radio" name="edtVnPagamento" value="10" > <i class="fa fa-calculator"> M&aacute;quina de Cart&atilde;o de Cr&eacute;dito</i></label><br/>
                                                                <label><input type="radio" name="edtVnPagamento" value="9" > <i class="fa fa-credit-card"> Cart&atilde;o de D&eacute;bito</i></label><br/>
                                                                <label><input type="radio" name="edtVnPagamento" value="3" > <i class="fa fa-money"> Esp&eacute;cie</i>  </label><br/>
                                                                <label><input type="radio" name="edtVnPagamento" value="2" > <i class="fa fa-envelope-o"> Dep&oacute;sito</i></label><br/>
                                                                <label><input type="radio" name="edtVnPagamento" value="4" > <i class="fa fa-exchange"> Transfer&ecirc;ncia</i></label><br/>
                                                            </div>
                                                        </div>
                                                    </fieldset>

                                            </div> <!--DIV CLASS row-->

                                        </div>
                                    <!--FIM FORMA DE PAGAMENTO-->
                                    </div>
                                    <!--FIM DO MODAL DA 2 ETAPA-->
                            </div><!-- FIM MODAL BODY -->


                            <div class="modal-footer">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        <div class="btn-group">
                                                <!--BOTOES DA CONSULTA DOS PEDIDOS DUPLICADOS-->
                                                <button id="btnAvancar1" class="btn btn-primary oculto"> Avancar? <i class="fa fa-arrow-circle-right fa-lg"></i></button>
                                                <button id="btnVoltar1" class="btn btn-primary oculto" onclick="voltarVendaInterna()" ><i class="fa fa-arrow-circle-left fa-lg"></i> Voltar|</button>
                                                <button id="btnAvancar" class="btn btn-primary oculto" > Avancar <i class="fa fa-arrow-circle-right fa-lg"></i></button>
                                                <button id="btnFinalizar" class="btn btn-success oculto" onclick="finalizarVendaInterna('<?=substr($_SERVER['PHP_SELF'], strrpos($_SERVER['PHP_SELF'], '/' )+1);?>')"><i class="fa fa-check"></i> Finalizar</button>
                                                <button id="btnVoltar" class="btn btn-primary oculto" onclick="voltarVendaInterna()" ><i class="fa fa-arrow-circle-left fa-lg"></i> Voltar</button>
                                                <button id="btnReiniciar" class="btn btn-danger" onclick="limparModalVendaInterna()"><i class="fa fa-check"></i> Reiniciar</button>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- FIM MODAL FOOTER -->
                </div>
            </form>
        </div>
</div>

<script type="text/javascript">
    $( document ).ready( function () {

        $('#edtDataNascimentoPj').blur(function () {
            $("#frmEscolhaPessoaJuridica").validate({
                rules: {
                    edtDataNascimentoPj: {
                        required: false,
                        nascimento: true,
                        dateITA:true
                    },
                    edtCpfVendaInternaPj: {
                        required:true,
                        cpf: true,
                        validaCpf: true
                    },
                    edtCnpjVendaInterna: {
                        required: true,
                        cnpj: true
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

            if ($('#frmEscolhaPessoaJuridica').valid()) consultaClienteBase();
        });

        $('#edtDataNascimento').blur(function () {

            $("#frmEscolhaPessoaFisica").validate({
                rules: {
                    edtDataNascimento: {
                        required: false,
                        nascimento: true,
                        dateITA:true
                    },
                    edtCpfVendaInterna: {
                        required:true,
                        cpf: true,
                        validaCpf: true
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

            if ($('#frmEscolhaPessoaFisica').valid()) consultaClienteBase();

        });


        $("#frmDadosPessoaJuridica").validate({
                rules: {
                    edtRazaoSocial: "required",
                    edtCepPjVendaInterna: {
                        required:true,
                        cep: true
                    },
                    edtCelularPjVendaInterna: {
                        celular:true,
                    },
                    edtBairroPjVendaInterna: "required",
                    edtEnderecoVendaInternaPj: "required",
                    eedtCidadePjVendaInterna: "required",
                    edtNumeroVendaInterna: "required",
                    edtUfVendaInterna: "required",
                    edtFone2PjVendaInterna: {
                        telefone: true,
                    },
                    edtFonePjVendaInterna: {
                        required: true,
                        telefone: true
                    },
                    edtEmailPjVendaInterna: {
                        required: true,
                        email: true,
/*
                        emailSerama: true,
                        emailGrupoSerama:true
*/
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


        $("#frmRepresentanteLegal").validate({
            rules: {
                edtNomeRepresentanteVendaInterna: "required",
                edtCepRepresentanteVendaInterna: {
                    required:true,
                    cep: true
                },
                edtCelularRepresentanteVendaInterna: {
                    celular:true,
                },
                edtBairroRepresentanteVendaInterna: "required",
                edtEnderecoRepresentanteVendaInterna: "required",
                edtCidadeRepresentanteVendaInterna: "required",
                edtNumeroRepresentanteVendaInterna: "required",
                edtUfRepresentanteVendaInterna: "required",
                edtFone2RepresentanteVendaInterna: {
                    telefone: true,
                },
                edtFoneRepresentanteVendaInterna: {
                    required: true,
                    telefone: true
                },
                edtEmailRepresentanteVendaInterna: {
                    required: true,
                    email: true,
/*
                    emailSerama: true,
                    emailGrupoSerama:true
*/
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

        $('#btnAvancar1').click(function () {
            var pessoaTipo = $("input[name='tipoPessoa']:checked").val();
            if (pessoaTipo == "pf") {
                if ( ($('#frmRepresentanteLegal').valid()) && ($('#frmEscolhaPessoaFisica').valid()) )
                    consultarCertificadosVendaInterna();
            } else if (pessoaTipo == 'pj') {
                if (($('#frmDadosPessoaJuridica').valid()) && ($('#frmRepresentanteLegal').valid()) && ($("#frmEscolhaPessoaJuridica").valid()))
                    consultarCertificadosVendaInterna();
            }
        });

    });

</script>