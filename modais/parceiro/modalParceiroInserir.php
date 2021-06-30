<?php
    $cLocal = new Criteria();
    $cLocal->add(LocalPeer::SITUACAO, -1, Criteria::NOT_EQUAL);
    $locais = LocalPeer::doSelect($cLocal);
?>
<div id="modalSalvarParceiro" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-10">
                    <h3><span id="cabecalhoInserir"> <i class="fa fa-lg fa-plus"></i> Inserir Canal </span></h3>
                </div>
                <div class ="col-lg-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalDuvida" onclick="modalDuvida(5)"><i class="fa fa-lg fa-question"></i></button>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#modalSalvarParceiro"><i class="fa fa-lg fa-close"></i></a>
                </div>
            </div>
            <div class="form">
                <form action="#" method="post" id="frmInserirParceiro">
                    <div class="modal-body">

                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4>DADOS DO CANAL:</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="divBotoesTipoCanal">Tipo do Canal <small id="labelTipoCanal"></small></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12" id="divBotoesTipoCanal">
                                        <div class="btn-group" >
                                            <label class="btn btn-default">
                                                <input type="radio" name="edtTipoCanal" id='canal_parceiro' value="parceiro" autocomplete="off"  > Parceiro
                                            </label>

                                            <label class="btn btn-default">
                                                <input type="radio"  name="edtTipoCanal" id='canal_unidade' value="unidade" autocomplete="off"  > Unidade Pr&oacute;pria
                                            </label>

                                            <label class="btn btn-default">
                                                <input type="radio"  name="edtTipoCanal" id='canal_tabela' value="tabela" autocomplete="off" required="required" > Parceiro Tabela Fixa
                                            </label>

                                        </div>

                                    </div>
                                    <script>
                                        /*
                                        $('input[name=edtTipoCanal]').change(function () {
                                            if ($('input[name=edtTipoCanal]:checked').val()=='unidade') {
                                                $('#divBotoesTipoCanal').css( {display:'none', visibility:'hidden'} );
                                            } else {
                                                $('#divBotoesTipoCanal').css( {display:'block', visibility:'visible'} );
                                            }

                                        })

                                         */
                                    </script>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="ipEdtCnpj">Documento</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="ipEdtEmpresa">Empresa</label>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-6 campoValidar">
                                        <input type="text" name="ipEdtCnpj" id="ipEdtCnpj" class="form-control" placeholder="CNPJ" onchange="formatarBlur(this,'cnpj')">
                                    </div>
                                    <div class="col-lg-6 campoValidar">
                                        <input type="text" name="ipEdtEmpresa" id="ipEdtEmpresa" class="form-control" placeholder="Nome da empresa" onclick="">
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="ipEdtNome">Nome</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 campoValidar">
                                        <input type="text" name="ipEdtNome" id="ipEdtNome" class="form-control" placeholder="Nome do Canal">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3">
                                        <label for="ipEdtCep">Cep</label>
                                    </div>

                                    <div class="col-lg-5">
                                        <label for="ipEdtEndereco">Endereco</label>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="ipEdtNumero">Numero</label>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="ipEdtUf">UF</label>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-3 campoValidar">
                                        <input type="text" name="ipEdtCep" id="ipEdtCep" class="form-control" onkeypress="formatar(this,'cep');" onblur="formatarBlur(this,'cep'); pesquisa_cep_padrao($('#ipEdtCep').val(), 'ipEdtEndereco', 'ipEdtCidade', 'ipEdtBairro', 'ipEdtUf', 'ipEdtComplemento');" placeholder="Cep da empresa">
                                    </div>

                                    <div class="col-lg-5 campoValidar">
                                        <input type="text" name="ipEdtEndereco" id="ipEdtEndereco" class="form-control" placeholder="Endere&ccedil;o da empresa">
                                    </div>
                                    <div class="col-lg-2 campoValidar">
                                        <input type="text" name="ipEdtNumero" id="ipEdtNumero" class="form-control" placeholder="N&uacute;mero da empresa">
                                    </div>
                                    <div class="col-lg-2 campoValidar">
                                        <select name="ipEdtUf" id="ipEdtUf" class="form-control">
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
                                        <label for="ipEdtComplemento">Complemento</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="ipEdtBairro">Bairro</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="ipEdtCidade">Cidade</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 campoValidar" >
                                        <input type="text" name="ipEdtComplemento" id="ipEdtComplemento" class="form-control" placeholder="Complemento end. da empresa">
                                    </div>
                                    <div class="col-lg-4 campoValidar">
                                        <input type="text" name="ipEdtBairro" id="ipEdtBairro" class="form-control" placeholder="Bairro da empresa">
                                    </div>
                                    <div class="col-lg-4 campoValidar">
                                        <input type="text" name="ipEdtCidade" id="ipEdtCidade" class="form-control" placeholder="Cidade da empresa"><br/>
                                    </div>

                                </div> <!--DIV CLASS row-->

                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="ipEdtCelular">Celular</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="ipEdtFone">Telfone</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="ipEdtEmail">E-mail</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 campoValidar">
                                        <input type="text" id="ipEdtCelular" name="ipEdtCelular" class="form-control" onchange="formatarBlur(this,'celular')" placeholder="Celular">
                                    </div>
                                    <div class="col-lg-4 campoValidar">
                                        <input type="text" id="ipEdtFone" name="ipEdtFone" class="form-control" onchange="formatarBlur(this,'fone');" placeholder="Tel. Fixo da empresa">
                                    </div>
                                    <div class="col-lg-4 campoValidar">
                                        <input type="text" id="ipEdtEmail" name="ipEdtEmail" class="form-control" placeholder="E-mail do canal" >
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="ipEdtLocal">Local</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 campoValidar">
                                        <select name="ipEdtLocal" id="ipEdtLocal" class="selectpicker campoValidar" data-show-subtext="true" data-live-search="true">
                                            <option data-tokens="" value="">Local</option>

                                            <? foreach($locais as $local) {?>
                                                    <option data-tokens="<?=utf8_encode($local->getNome);?>" value="<?=$local->getId();?>"><?=$local->getId();?> | <?=utf8_encode($local->getNome());?></option>
                                            <? }?>
                                        </select>
                                    </div>

                                </div>

                                <!--INFORMACOES DE COMISSIONAMENTO-->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4>COMISSIONAMENTOS:</h4>
                                    </div>
                                </div>

                                <div id="divComissionamento">
                                    <div class="row" >
                                        <div class="col-lg-3">
                                            <label for="ipEdtBanco">Banco</label>
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="ipEdtAgencia">Ag</label>
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="ipEdtConta">CC</label>
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="ipEdtOperacao">Op.</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 campoValidar">

                                            <select name="ipEdtBanco" id="ipEdtBanco" class="form-control">
                                                <option value="">Selecione o banco</option>
                                                <option value="003-BASA" >BANCO DA AMAZONIA</option>
                                                <option value="001-BANCO DO BRASIL" >BANCO DO BRASIL</option>
                                                <option value="037-BANPARA" >BANPARA</option>
                                                <option value="237-BRADESCO" >BRADESCO</option>
                                                <option value="104-CAIXA ECONOMICA" >CAIXA ECONOMICA</option>
                                                <option value="341-ITAU" >ITAU</option>
                                                <option value="074-SAFRA" >SAFRA</option>
                                                <option value="033-SANTANDER" >SANTANDER</option>
                                                <option value="756-SICOOB" >SICOOB</option>
                                                <option value="655-ASTECAS/VOTORANTIM" >VOTORANTIM / ASTECAS</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 campoValidar">
                                            <input type="text" id="ipEdtAgencia" name="ipEdtAgencia" class="form-control" placeholder="Ag&ecirc;ncia">
                                        </div>
                                        <div class="col-lg-3 campoValidar">
                                            <input type="text" id="ipEdtConta" name="ipEdtConta" class="form-control" placeholder="Conta Corrente">
                                        </div>
                                        <div class="col-lg-3 campoValidar">
                                            <input type="text" id="ipEdtOperacao" name="ipEdtOperacao" class="form-control" placeholder="Opera&ccedil;&atilde;o">
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label for="ipEdtComissaoVenda">Com. venda (%) </label>
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="ipEdtComissaoValidacao">Com. valida&ccedil;&atilde;o (%) </label>
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="ipEdtComissaoVendaValidacao">Com. venda/valida&ccedil;&atilde;o (%)</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 campoValidar">
                                            <input type="text" id="ipEdtComissaoVenda" name="ipEdtComissaoVenda" class="form-control" placeholder="Comiss&atilde;o de venda">

                                        </div>
                                        <div class="col-lg-3 campoValidar">
                                            <input type="text" id="ipEdtComissaoValidacao" name="ipEdtComissaoValidacao" class="form-control" placeholder="Comiss&atilde;o de valida&ccedil;&atilde;o">
                                        </div>
                                        <div class="col-lg-3 campoValidar">
                                            <input type="text" id="ipEdtComissaoVendaValidacao" name="ipEdtComissaoVendaValidacao" class="form-control" placeholder="Comiss&atilde;o de venda/valida&ccedil;&atilde;o">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label for="ipEdtObservacao">Observa&ccedil;&atilde;o </label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 campoValidar">
                                        <textarea type="text" id="ipEdtObservacao" name="ipEdtObservacao" class="form-control" placeholder="Observa&ccedil;&otilde;es Gerais" rows="5" cols="100">

                                        </textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4>PAGAMENTO DE CONTADORES:</h4>
                                        <h5>Escolher se pagaremos o contador do parceiro ou nao:</h5>
                                    </div>
                                    <div class="col-lg-12">
                                        <div id="divEscolhePagtoContador">
                                            <input checked="checked" type="checkbox" id="chkEscolhePagtoContador" name="chkEscolhePagtoContador" data-onstyle="success" data-offstyle="danger" class="datepicker-here form-control oculto" >
                                        </div>
                                        <script>

                                            $(function() {
                                                $("#chkEscolhePagtoContador").bootstrapToggle({
                                                    on: "Pagar",
                                                    off: "N&atilde;o Pagar",
                                                    width: 120
                                                });

                                            });
                                        </script>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4>GRUPO DE PRODUTOS:</h4>
                                        <h5>Trocar o grupo de produtos dos usuários do parceiro</h5>
                                    </div>
                                    <div class="col-lg-12">
                                        <div id="divGrupoProdutosParceiro"></div>
                                    </div>
                                </div>
                            </div><!--FIM panel-body-->
                        </div><!--FIM panel-default-->

                    </div><!--FIM DIV modal-body-->
                </form> <!--FIM DO FORM-->
            </div><!--FIM Div FORM -->
            <div class="modal-footer">
                <input type="hidden" id="idParceiroEditando" name="idParceiroEditando">
                <input type="hidden" id="acaoParceiro" name="acaoParceiro" value="inserir">
                <input type="button" class="btn btn-success" id="btnInserirParceiros" name="btnInserirParceiros" value="Salvar">
                <!--<button id="btnInserirParceiro" class="btn btn-success">Salvar</button>-->
            </div>

        </div>
    </div>
</div> <!--DIV CLASS modal-dialog modal-lg-->
<!--VALIDACAO FORM VALIDATION-->

<script>
    $( document ).ready( function () {

        $("#frmInserirParceiro").validate({
            rules: {
                ipEdtCnpj: {
                    required: true,
                    cnpj: true
                },
                ipEdtEmpresa: {
                    required: true,
                },
                ipEdtNome: {
                    required: true,
                },
                ipEdtEndereco: {
                    required: true,
                },
                ipEdtNumero: {
                    required: true,
                },
                ipEdtBairro: {
                    required: true,
                },
                ipEdtCidade: {
                    required: true,
                },
                ipEdtUf: {
                    required: true,
                },
                ipEdtLocal: {
                    required: true,
                },
                ipEdtCelular: {
                    required: true,
                    celular: true
                },
                ipEdtFone: {
                    telefone: true
                },
                ipEdtEmail: {
                    required: true,
                    email:true
                },
                ipEdtBanco : "required",
                ipEdtAgencia : "required",
                ipEdtConta : "required",
                ipEdtOperacao : "required"

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

        $("#btnInserirParceiros").click(function () {
            if ($("#frmInserirParceiro").valid()) {
                if ($('#acaoParceiro').val() == 'inserir')
                    salvar_parceiro('inserir');
                else if ('editar') {
                    salvar_parceiro('editar');
                }
            }
        })

    });
</script>
<!--FIM DE VALIDACAO-->
</div> <!--DIV ID inserirObservacao-->