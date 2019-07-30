<div id="modalInserirEditarContador" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-10">
                    <h3><span id="cabecalhoInserir"> <i class="fa fa-lg fa-plus"></i> Inserir Contador </span></h3>
                    <h3><span id="cabecalhoAlterar" hidden> <i class="fa fa-lg fa-edit "></i> Alterar Contador </span></h3>
                </div>
                <div class ="col-lg-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalDuvida"onclick="modalDuvida(5)"><i class="fa fa-lg fa-question"></i></button>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#modalInserirEditarContador" onclick="apagarDadosComponente('divContato','spanContadorContatos');"><i class="fa fa-lg fa-close"></i></a>
                </div>
            </div>

            <div class="modal-body">
                <!--ESCOLHE TIPO DE CONTADOR-->
                <div id="divEscolhaTipo">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Tipo Contador:</h3>
                        </div>

                    </div>
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="col-lg-6">
                                        <div class="btn-group" >
                                            <label class="btn btn-default">
                                                <input type="radio" disabled name="edtTipoPessoa" value="J" autocomplete="off" required="required" checked="checked"> Pessoa Jur&iacute;dica
                                            </label>
                                            <label class="btn btn-default">
                                                <input type="radio" disabled name="edtTipoPessoa" value="F" autocomplete="off" > Pessoa F&iacute;sica
                                            </label>
                                        </div>
                                        <script>
/*

NAO PERMITIR ESCONDER/MOSTRAR QUADRO PJ
                                            $('input[name=edtTipoPessoa]').change(function () {
                                                if ($('input[name=edtTipoPessoa]:checked').val()=='J') {
                                                    $('#divBotoesTipoProfissional').css( {display:'none', visibility:'hidden'} );
                                                    $('#divDadosPessoaJuridica').css( {display:'block', visibility:'visible'} );
                                                } else {
                                                    $('#divBotoesTipoProfissional').css( {display:'block', visibility:'visible'} );
                                                    $('#divDadosPessoaJuridica').css( {display:'none', visibility:'hidden'} );
                                                }

                                            })
*/
                                        </script>

                                    </div>

                                    <div class="col-lg-6" id="divBotoesTipoProfissional">
                                        <div class="btn-group" >
                                            <label class="btn btn-default">
                                                <input type="radio" disabled class="tipoProfissional" name="edtTipoProfissional" id="edtTipoProfissional" value="profissional" autocomplete="off" required="required" checked="checked"> Profissional
                                            </label>

                                            <label class="btn btn-default">
                                                <input type="radio" disabled class="tipoProfissional" name="edtTipoProfissional" id="edtTipoProfissional" value="estudante" autocomplete="off"  > Estudante
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--FIM ESCOLHA TIPO DE CONTADOR-->

                <!--INICIO CADASTROS GERAIS-->
                <div id="divCadastros">
                    <!--DADOS FIXOS DO CONTADOR-->
                    <form id="frmDadosTipoContador" name="frmDadosTipoContador" action="">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="ecEdtVendedor">Consultor</label>
                                        </div>

                                        <div class="col-lg-4">
                                            <label for="ecEdtLocal">Local</label>
                                        </div>

                                        <div class="col-lg-2">
                                            <label >Comiss&atilde;o? </label><a href="#"><i class="fa fa-question-circle" aria-hidden="true" title="Este contador recebe comiss&atilde;o?"></i></a>
                                        </div>
                                        <div class="col-lg-2">
                                            <label >Desconto?</label><a href="#"><i class="fa fa-question-circle" aria-hidden="true" title="Este contador concede desconto para seus clientes?"></i></a>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 campoValidar">
                                        <div id="divVendedorContador"></div>
                                    </div>

                                    <div class="col-lg-4 campoValidar">
                                        <div id="divLocalContador"></div>
                                    </div>

                                    <div class="col-lg-2">
                                        <input type="checkbox" id="chkRecebeComissaoContador" checked="checked" >
                                        <script>
                                            $(function() {
                                                $("#chkRecebeComissaoContador").bootstrapToggle({
                                                    on: "Sim",
                                                    off: "N&atilde;o"
                                                });

                                                $("#chkRecebeComissaoContador").change(function() {
                                                    if ($('#chkRecebeComissaoContador').prop('checked')) {
                                                        $('#divDadosComissionamento').css({display:'block', visibility: 'visible'});
                                                    }
                                                    else {
                                                        $('#divDadosComissionamento').css({display:'none', visibility: 'hidden'});
                                                    }
                                                });

                                            });
                                        </script>
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="checkbox" id="chkConcedeDescontoContador" checked="checked">
                                        <script>
                                            $(function() {
                                                $("#chkConcedeDescontoContador").bootstrapToggle({
                                                    on: "Sim",
                                                    off: "N&atilde;o"
                                                });
                                            });

                                        </script>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    <!--FIM DADOS FIXOS DO CONTADOR-->

                    <!--DADOS BANCARIOS DO CONTADOR-->
                    <form id="frmDadosBancariosContador" name="frmDadosBancariosContador" action="">
                        <div class="panel panel-default" id="divDadosComissionamento">
                            <div class="panel-body" >
                                <div class="row form-group" >
                                    <div class="col-lg-6">
                                        <h4>INFORMA&Ccedil;&Otilde;ES DE COMISSIONAMENTO:</h4>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-lg-6">
                                        <div class="btn-group">
                                            <label class="btn btn-default">
                                                <input type="radio" name="edtTipoComissionamentoContador" value="banco" autocomplete="off" disabled="disabled" checked="checked" > Banco <a href="#"><i class="fa fa-question-circle" aria-hidden="true" title="Selecione esta op&ccedil;&atilde;o caso o contador receba o comissionamento em sua conta banc&aacute;ria."></i></a>
                                            </label>

                                            <label class="btn btn-default">
                                                <input type="radio" name="edtTipoComissionamentoContador" value="cartao" autocomplete="off"  disabled="disabled"> Cart&atilde;o <a href="#"><i class="fa fa-question-circle" aria-hidden="true" title="Selecione esta op&ccedil;&atilde;o caso o contador receba o comissionamento no cart&atilde;o contador amigo."></i></a>
                                            </label>
                                        </div>

                                        <script>
                                           /*
                                           CODIGO DE DIMINUIR DADOS BANCARIOS DO CONTADOR
                                           $('input[name=edtTipoComissionamentoContador]').change(function () {
                                                if ($('input[name=edtTipoComissionamentoContador]:checked').val()=='cartao') {
                                                    $('#divDadosBancariosContador').css( {display:'none', visibility:'hidden'} );
                                                } else {
                                                    $('#divDadosBancariosContador').css( {display:'block', visibility:'visible'} );
                                                }

                                            })*/
                                        </script>

                                    </div>
                                </div>
                                <div id="divDadosBancariosContador">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="ecEdtBanco" STYLE="color:darkred">Banco* <span id="spanContadorBancoAntigo"></span></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 campoValidar">
                                            <select name="ecEdtBanco" id="ecEdtBanco" class="form-control">
                                                <option value="">Selecione o banco</option>
                                                <option value="003" >BANCO DA AMAZONIA</option>
                                                <option value="001" >BANCO DO BRASIL</option>
                                                <option value="037" >BANPARA</option>
                                                <option value="237" >BRADESCO</option>
                                                <option value="104" >CAIXA ECONOMICA</option>
                                                <option value="341" >ITAU</option>
                                                <option value="212" >ORIGINAL</option>
                                                <option value="074" >SAFRA</option>
                                                <option value="033" >SANTANDER</option>
                                                <option value="748" >SICREDI</option>
                                                <option value="756" >SICOOB</option>
                                            </select>

                                        </div>
<!--                                        <div class="col-lg-6 campoValidar">
                                            <input type="text" class="form-control" id="ecEdtCpfCnpjConta" name="ecEdtCpfCnpjConta" onkeypress="formatar(this, 'cpf')" onblur="formatarBlur(this, 'cpf')">
                                        </div>
-->                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label for="ecEdtAg" STYLE="color:darkred">Agencia* (s&oacute; n&uacute;meros)</label>
                                        </div>
                                        <div class="col-lg-1">
                                            <label for="ecEdtDigitoAg">D&iacute;gito</label>
                                        </div>

                                        <div class="col-lg-3" STYLE="color:darkred">
                                            <label for="ecEdtCc">C. Corrente* (s&oacute; n&uacute;meros)</label>
                                        </div>
                                        <div class="col-lg-1">
                                            <label for="ecEdtDigitoCc">D&iacute;gito</label>
                                        </div>

                                        <div class="col-lg-2" STYLE="color:darkred">
                                            <label for="ecEdtOpConta">Opera&ccedil;&atilde;o*</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 campoValidar">
                                            <input type="text" class="form-control" id="ecEdtAg" name="ecEdtAg">
                                        </div>
                                        <div class="col-lg-1 campoValidar">
                                            <input type="text" class="form-control" id="ecEdtDigitoAg" name="ecEdtDigitoAg">
                                        </div>
                                        <div class="col-lg-3 campoValidar">
                                            <input type="text" class="form-control" id="ecEdtCc" name="ecEdtCc">
                                        </div>
                                        <div class="col-lg-1 campoValidar">
                                            <input type="text" class="form-control" id="ecEdtDigitoCc" name="ecEdtDigitoCc">
                                        </div>

                                        <div class="col-lg-2">
                                            <select name="ecEdtOpConta" id="ecEdtOpConta" class="form-control" >
                                                <option value="">Selecione</option>
                                                <option value="CC" >CONTA CORRENTE</option>
                                                <option value="PP" >CONTA POUPAN&Ccedil;A</option>

                                            </select>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    <!--FIM DOS DADOS BANCARIOS DO CONTADOR-->

                    <!--DADOS DO CONTADOR-->
                    <form id="frmDadosContador" name="frmDadosContador" action="" >
                        <div class="panel panel-default ">
                           <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4>DADOS DO CONTADOR:</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="ecEdtNome" STYLE="color:darkred">Nome *</label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="ecEdtNascimento" STYLE="color:darkred">Nascimento *</label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="ecEdtCpf" STYLE="color:darkred">CPF *</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 campoValidar">
                                        <input type="text" name="ecEdtNome" id="ecEdtNome" class="form-control" >
                                    </div>
                                    <div class="col-lg-3 campoValidar">
                                        <input type="text" name="ecEdtNascimento" id="ecEdtNascimento" class="form-control" onkeypress="formatar(this,'data')" onblur="formatarBlur(this,'data')">
                                    </div>
                                    <div class="col-lg-3 campoValidar">
                                        <input type="text" name="ecEdtCpf" id="ecEdtCpf" class="form-control"  onblur="formatarBlur(this,'cpf');" onkeypress="formatar(this,'cpf')">
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="ecEdtEmailContador" STYLE="color:darkred">Email do contador *</label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="ecEdtCrc" STYLE="color:darkred">CRC *</label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="ecEdtCodigoDesconto">C&oacute;digo Contador</label>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-6 campoValidar">
                                        <input type="email" name="ecEdtEmailContador" id="ecEdtEmailContador" class="form-control" ">
                                    </div>
                                    <div class="col-lg-3 campoValidar">
                                        <input type="text" name="ecEdtCrc" id="ecEdtCrc" class="form-control">
                                    </div>
                                    <div class="col-lg-3">
                                        <span id="spanEdtCodigoDesconto"></span>

                                        <input type="hidden" name="ecEdtCodigoDesconto" id="ecEdtCodigoDesconto" class="form-control">
                                    </div>
                                </div>

                           </div>
                        </div>
                    </form>
                    <!--FIM DOS DADOS DO CONTADOR-->

                    <!--ENDERECO DO CONTADOR-->
                    <form id="frmEnderecoContador" name="frmEnderecoContador" action="">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4>ENDERE&ccedil;O:</h4>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3">
                                        <label for="ecEdtCep" style="color:darkred">Cep *</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="ecEdtEndereco" style="color:darkred">Endere&ccedil;o *</label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="ecEdtNumero" style="color:darkred">N&uacute;mero *</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 campoValidar" >
                                        <input type="text" name="ecEdtCep" id="ecEdtCep" class="form-control"  onkeypress="formatar(this,'cep');" onblur="formatarBlur(this,'cep');
                                        pesquisa_cep_padrao($('#ecEdtCep').val(), 'ecEdtEndereco', 'ecEdtCidade', 'ecEdtBairro', 'ecEdtUfContador', 'ecEdtComplemento');" placeholder="Cep da empresa">
                                    </div>
                                    <div class="col-lg-6 campoValidar">
                                        <input type="text" name="ecEdtEndereco" id="ecEdtEndereco" class="form-control" >
                                    </div>
                                    <div class="col-lg-3 campoValidar">
                                        <input type="text" name="ecEdtNumero" id="ecEdtNumero" class="form-control" >
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4" >
                                        <label for="ecEdtComplemento">Complemento </label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="ecEdtBairro" style="color:darkred">Bairro *</label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="ecEdtCidade" style="color:darkred">Cidade *</label>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="ecEdtUfContador" style="color:darkred">UF *</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 campoValidar">
                                        <input type="text" name="ecEdtComplemento" id="ecEdtComplemento" class="form-control">
                                    </div>
                                    <div class="col-lg-3 campoValidar">
                                        <input type="text" name="ecEdtBairro" id="ecEdtBairro" class="form-control" >
                                    </div>
                                    <div class="col-lg-3 campoValidar">
                                        <input type="text" name="ecEdtCidade" id="ecEdtCidade" class="form-control">
                                    </div>
                                    <div class="col-lg-2 campoValidar">
                                        <select name="ecEdtUfContador" id="ecEdtUfContador" class="form-control" >
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

                            </div>
                        </div>
                    </form>
                    <!--FIM DO ENDERECO DO CONTADOR-->

                    <!--CONTATOS DO CONTADOR-->
                    <form id="frmContatosContador" name="frmContatosContador" method="post" >
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row form-group">
                                    <h4>CONTATOS: <!--<small>Qtd:<span id="spanContadorContatos">1</span></small>--></h4><!--<button type="button" onclick="dados = obterDadosComponente('divContato',['nome', 'cargo', 'fone', 'email'], 'spanContadorContatos'); console.log(dados, JSON.stringify(dados));">teste</button>-->
                                    <div class="col-lg-12">
<!--                                        <button type="button" class="btn btn-success" id="btnNovoContatoContador" name="btnNovoContatoContador"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Adicionar Contato</button>
                                        <script>
                                            $('#btnNovoContatoContador').click(function (){
                                                duplicarComponente('divContatos', 'divContato', 'divBotaoApagar', 'Excluir Contato', 'spanContadorContatos'  );
                                            });
                                        </script>
-->
                                    </div>
                                </div>
                                <div id="divContatos col-lg-12">
                                    <div id="divContato" class="divContato">
                                        <div class="row form-group">
                                            <div class="col-lg-2" >
                                                <label>Nome:</label>
                                            </div>
                                            <div class="col-lg-4">
                                                <label >Cargo:</label>
                                            </div>
                                            <div class="col-lg-2">
                                                <label >Celular:</label>
                                            </div>
                                            <div class="col-lg-2">
                                                <label >Telefone:</label>
                                            </div>
                                            <div class="col-lg-2">
                                                <label >E-mail:</label>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-lg-2 form-group campoValidar">
                                                <input type="text" class="form-control" name="edtNomeContatoContador" id="edtNomeContatoContador">
                                            </div>
                                            <div class="col-lg-4 form-group campoValidar">
                                                <select id="edtCargoContatoContador" name="edtCargoContatoContador" class="selectpicker" data-live-search="true">
                                                    <option data-tokens="Selecione o cargo do contato" name="" value='' selected="selected">Selecione o cargo do contato</option>
                                                    <option data-tokens="DEPARTAMENTO CONT&Aacute;BIL" name="DEPARTAMENTO CONTABIL">DEPARTAMENTO CONT&Aacute;BIL</option>
                                                    <option data-tokens="DEPARTAMENTO DE CADASTROS" name="DEPARTAMENTO DE CADASTROS">DEPARTAMENTO DE CADASTROS</option>
                                                    <option data-tokens="RECURSOS HUMANOS" name="DEPARTAMENTO DE RECURSOS HUMANOS">RECURSOS HUMANOS</option>
                                                    <option data-tokens="DEPARTAMENTO FISCAL" name="DEPARTAMENTO FISCAL">DEPARTAMENTO FISCAL</option>
                                                    <option data-tokens="DEPARTAMENTO PESSOAL" name="DEPARTAMENTO PESSOAL">DEPARTAMENTO PESSOAL</option>
                                                    <option data-tokens="DIRETOR" name="DIRETOR">DIRETOR</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-2 form-group campoValidar">
                                                <input type="text" class="form-control" name="edtCelularContatoContador" id="edtCelularContatoContador" onblur="formatarBlur(this, 'celular')" onkeypress="formatar(this, 'celular')">
                                            </div>
                                            <div class="col-lg-2 form-group campoValidar">
                                                <input type="text" class="form-control" name="edtTelefoneContatoContador" id="edtTelefoneContatoContador" onblur="formatarBlur(this, 'fone')" onkeypress="formatar(this, 'fone')">
                                            </div>

                                            <div class="col-lg-2 form-group campoValidar">
                                                <input type="text" class="form-control" name="edtEmailContatoContador" id="edtEmailContatoContador">
                                            </div>

                                            <div class="col-lg-1 form-group" id="divBotaoApagar"></div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    <!--FIM DOS CONTATOS DO CONTADOR-->


                    <!--ENDERECO ESCRITORIO-->
                    <form id="frmEscritorioContador" name="frmEscritorioContador" action="">
                        <div class="panel panel-default" id="divDadosPessoaJuridica">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4>ESCRIT&Oacute;RIO CONT&Aacute;BIL:</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-9">
                                        <label for="ecEdtRazaoSocial">Raz&atilde;o Social</label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="ecEdtCnpj">CNPJ</label>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-9 campoValidar">
                                        <input type="text" name="ecEdtRazaoSocial" id="ecEdtRazaoSocial" class="form-control" >
                                    </div>
                                    <div class="col-lg-3 campoValidar">
                                        <input type="text" name="ecEdtCnpj" id="ecEdtCnpj" class="form-control" onblur="formatarBlur(this,'cnpj')">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="ecEdtNomeFantasia">Nome Fantasia</label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="ecEdtFone1">Telefone</label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="ecEdtFone2">Celular</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 campoValidar">
                                        <input type="text" name="ecEdtNomeFantasia" id="ecEdtNomeFantasia" class="form-control" >
                                    </div>
                                    <div class="col-lg-3 campoValidar">
                                        <input type="text" name="ecEdtFone1" id="ecEdtFone1" class="form-control" onblur="formatarBlur(this,'fone')" onkeypress="formatar(this,'fone')">
                                    </div>
                                    <div class="col-lg-3 campoValidar">
                                        <input type="text" name="ecEdtCelular" id="ecEdtCelular" class="form-control" onblur="formatarBlur(this,'celular')" onkeypress="formatar(this,'celular')">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 ">
                                        <br/> <label for="ecEdtEmailEscritorio">Email do escrit&oacute;rio</label>
                                    </div>
                                    <div class="col-lg-8 campoValidar">
                                        <br/><input type="email" name="ecEdtEmailEscritorio" id="ecEdtEmailEscritorio" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--FIM DO ENDERECO ESCRITORIO-->
                </div>
                <!--FIM DOS CADASTROS GERAIS-->
            </div>

            <div class="modal-footer">
                <input type="hidden" id="idContador"/>
                <input type="hidden" id="acaoContador" name="acaoContador">
                <button type="button" class="btn btn-success" id="btnSalvarContador" name="btnSalvarContador">Salvar</button>
            </div>
        </div>

    </div> <!--FECHA DIALOG MODAL-->

</div><!--FECHA MODAL modalInserirEditarContador-->

<script>
    $( document ).ready( function () {

        $("#frmDadosContador").validate({
            rules: {
                ecEdtEmailContador : {
                    email: true
                },

                ecEdtNome: {
                    required: true,
                },
                ecEdtNascimento: {
                    required: true,
                    dateITA: true,
                },
                ecEdtCpf: {
                    required: true,
                    cpf: true,
                    validaCpf:true
                },
                ecEdtCrc: {
                    required: true,
                },
                ecEdtEmailContador: {
                    required: true,
                    email: true
                },
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

        $("#frmDadosBancariosContador").validate({
            rules: {
                ecEdtBanco: {
                    required: true,
                },
                ecEdtDigitoAg: {
                    alphanumeric: true
                },
                ecEdtDigitoCc: {
                    alphanumeric: true
                },
                ecEdtAg: {
                    integer: true,
                    required: true
                },
                ecEdtCc:{
                    required: true,
                    integer: true
                },
                ecEdtOpConta:{
                    required: true,
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



        $("#frmEnderecoContador").validate({
            rules: {

                ecEdtCep: {
                    required: true,
                },
                ecEdtEndereco: {
                    required: true,
                },
                ecEdtNumero: {
                    required: true,
                },
                ecEdtBairro: {
                    required: true,
                },
                ecEdtCidade: {
                    required: true,
                },
                ecEdtUfContador: {
                    required: true,
                },
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


        $("#frmContatosContador").validate({
            rules: {
                edtNomeContatoContador: {alphanumeric:true},
                edtCargoContatoContador: {alphanumeric:true},
                edtTelefoneContatoContador: {telefone:true},
                edtCelularContatoContador: {celular: true},
                edtEmailContatoContador: {email: true}
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

        $("#frmEscritorioContador").validate({
            rules: {
                ecEdtCnpj: {
                    cnpj:true,
                    validaCnpj: true,
                },

                ecEdtFone1: {telefone:true},
                ecEdtFone2: {celular: true},
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


        $("#btnSalvarContador").click(function () {

            /*
             * SE RECEBE COMISSAO ESTIVER MARCADO VALIDAR FORMULARIO DE DADOS BANCARIOS
             * */
            if ($('#chkRecebeComissaoContador').prop('checked')) {
                if ($("#frmDadosBancariosContador").valid()=== false) {
                    alertErro('Por favor verifique se existe algum dado preenchido de forma errada ou simplesmente faltando e tente salvar novamente!');
                    return false;
                }
            }


            if ($("#frmDadosContador").valid() && $("#frmContatosContador").valid() && $("#frmEnderecoContador").valid() ) {
                /*
                 * SE PESSOA JURIDICA ESTIVER MARCADO VALIDAR FORMULARIO DE PESSOA JURIDICA
                 * */

                if ($("#frmEscritorioContador").valid()=== false)
                    return false;

                /*
                                if ($('input[name=edtTipoPessoa]:checked').val()=='J') {
                                    if ($("#frmEscritorioContador").valid()=== false)
                                        return false;
                                }
                */

                salvarContador($('#acaoContador').val());


            }
            else
                alertErro('Por favor verifique se existe algum dado preenchido de forma errada ou simplesmente faltando e tente salvar novamente!');

        });

    });
</script>