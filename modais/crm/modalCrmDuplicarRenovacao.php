<!-- INFOMRAR PAGAMENTO  FOR COBRAÇA -->
<? if($prospect->getContadorId() <=0) { ?>
<div class="modal fade" role="dialog" id="duplicarRenovacao">
        <div class="modal-dialog modal-lg">
            <div class="modal-content modal-lg">
                    <div class="modal-header">
                        <h3 class="modal-title"><i class="fa fa-recycle fa-lg"></i> Duplicar Cadastro (Renova&ccedil;&atilde;o)</h3>
                    </div>

                    <div class="modal-body">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3>Voc&ecirc; deseja realizar o pedido de renova&ccedil;&atilde;o do certificado?</h3>
                            </div>
                            <div class="panel-body">
                                <!--ESCOLHA FORMULARIO CADASTRO CLIENTE - PRIMEIRA ETAPA-->
                                <div id="divPrimeiraEtapa" >
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-xs-6 col-lg-6 col-md-6">
                                                    <h5>
                                                        <strong>
                                                            <? if($cliente) {?>
                                                                <? if($cliente->getRazaoSocial())
                                                                    echo $cliente->getId().' - '.$cliente->getRazaoSocial();
                                                                else
                                                                    echo $cliente->getId().' - '.$cliente->getNomeFantasia();
                                                                ?>
                                                            <? }?>
                                                        </strong>
                                                        Caso deseje alterar alguma informa&ccedil;&atilde;o do cliente:
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <!--FORMULARIO DO CLIENTE-->
                                            <div id="divFormCliente">
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
                                </div> <!--FIM DA PREIRA ETAPA-->

                                <div id="divSegundaEtapa" class="oculto">
                                    <!-------------------------ESCOLHA DO CONTADOR ------------------------->
                                    <div class="panel panel-default" >
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-xs-12" >

                                                    <div class="col-lg-4 " >
                                                        <label>Contador</label><div id="div_select_contadores"></div>
                                                    </div>
                                                    <div class="col-lg-8 oculto" id="div_outros_contadores">

                                                        <div class="col-lg-4 col-md-2 col-xs-12" >
                                                            <label for="edtInformarCodContador">Cod Contador</label>
                                                            <input type="text" class="form-control" name="edtInformarCodContador" id="edtInformarCodContador" onblur="procurar_contador();"/>
                                                            <input type="hidden" class="form-control" name="edtCodigoContadorRenovacao" id="edtCodigoContadorRenovacao"/>
                                                            <input type="hidden" class="form-control" name="edtTipoCliente" id="edtTipoCliente" value="<?=$prospect->getCertificado()->getCliente()->getPessoaTipo()?>"/>
                                                            <input type="hidden" class="form-control" name="edtProdutoCertificado" id="edtProdutoCertificado" value="<?=$prospect->getCertificado()->getProdutoId()?>"/>
                                                        </div>
                                                        <div class="col-lg-4 col-md-8 col-xs-12">
                                                            <label>Nome:</label>
                                                            <input type="text" class="form-control" disabled  name="edtNomeContador" id="edtNomeContador" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!--FIM DA ESCOLHA DO CONTADOR-->

                                    <!-------------------------FIM FORMULARIO ------------------------->
                                    <div class="panel panel-default" >
                                        <div class="panel-heading">
                                            <h3>Forma de pagamento</h3>
                                        </div>

                                        <div class="panel-body">
                                            <form method="post" action="#">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <h4>Alterar Produto:</h4>
                                                    </div>
                                                    <div class="col-lg-6" id="div_select_produtos"></div>
                                                </div> <!--DIV CLASS row-->

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <h4>Alterar forma de pagamento:</h4>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <label><input type="radio" name="edtRnPagamento" value="1" > <i class="fa  fa-barcode"> Boleto </i>  </label>
                                                        <input type="text" id="edtRnVencimento" class="form-control oculto" placeholder="Vencimento do boleto">
                                                        <script>
                                                            $( function() {
                                                                $( "#edtRnVencimento" ).datepicker({
                                                                    language:"pt-BR",
                                                                    minDate: new Date() // Now can select only dates, which goes after today
                                                                });
                                                            } );
                                                        </script>

                                                        <br/>
                                                        <label><input  type="radio" name="edtRnPagamento" value="6" > <i class="fa fa-credit-card"> Cr&eacute;dito/D&eacute;bito</i></label><br/>
                                                        <label><input  type="radio" name="edtRnPagamento" value="3" > <i class="fa fa-money"> Esp&eacute;cie</i>  </label><br/>
                                                        <label><input  type="radio" name="edtRnPagamento" value="2" > <i class="fa fa-envelope-o"> Dep&oacute;sito</i></label><br/>
                                                        <label><input  type="radio" name="edtRnPagamento" value="4" > <i class="fa fa-exchange"> Transfer&ecirc;ncia</i></label><br/>
                                                        <label><input  type="radio" name="edtRnPagamento" value="8" > <i class="fa fa-square-o"> Sem Custo</i></label><br/>

                                                        <script>
                                                            $('input[name=edtRnPagamento]').change(function() {
                                                                if (this.value == 1)
                                                                    $('#edtRnVencimento').css({'visibility':'visible', 'display':'block'});
                                                                else
                                                                    $('#edtRnVencimento').css({'visibility':'hidden', 'display':'none'});
                                                            })
                                                        </script>
                                                    </div>
                                                </div> <!--DIV CLASS row-->
                                            </form>
                                        </div>
                                    </div>
                                    <!--FIM DO FORMULARIO -->
                                </div> <!--FIM DA SEGUNDA ETAPA-->

                            </div>

                            <div class="panel-footer">
                                <div class="btn-group">
                                    <button id="btnAvancar" class="btn btn-primary"> Avancar <i class="fa fa-arrow-circle-right fa-lg"></i></button>
                                    <button class="btn btn-success oculto" name="btn_gerar_renovacao" title="Renovar Certificado" id="btn_gerar_renovacao" onclick="gerarRenovacao(<?=$prospect->getCertificadoId();?>);bancoLocal_add('renovacao');">Gerar Renova&ccedil;&atilde;o</button>
                                    <button id="btnVoltar" class="btn btn-primary oculto" onclick="voltarVendaInterna()" ><i class="fa fa-arrow-circle-left fa-lg"></i> Voltar</button>
                                    <button id="btnReiniciar" class="btn btn-danger" onclick="limparCadastro()"><i class="fa fa-check"></i> Reiniciar</button>
                                </div>
                            </div>

                        </div> <!--FIM PAINEL PRINCIPAL-->

                    </div>
            </div>
        </div>
    <? }?>
    <!-- FIM INFORMAR PAGTO MODAL FOR COBRANÇA-->

    <script>
        $("document").ready(function () {
            $('#btnAvancar').click(function () {
                var pessoaTipo = $("input[name='tipoPessoa']:checked").val();
                if (pessoaTipo == "pf") {
                    if ( ($('#frmRepresentanteLegal').valid()) && ($('#frmEscolhaPessoaFisica').valid()) )
                        avancarVendaInterna();
                } else {
                    if (($('#frmDadosPessoaJuridica').valid()) && ($('#frmRepresentanteLegal').valid()) && ($("#frmEscolhaPessoaJuridica").valid()))
                        avancarVendaInterna();
                }
            });
        })
    </script>