<!-- INICIO DO MODAL EDITAR/INSERIR CUPOM DE DESCONTO-->
<div id="gerarCupomDesconto" class="modal fade" role="dialog" data-backdrop="static">

    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-10">
                    <h3><span id="cabecalhoInserir"> <i class="fa fa-lg fa-plus"></i> Gerar Cupom Desconto </span></h3>



                </div>
                <div class ="col-lg-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalDuvida"><i class="fa fa-lg fa-question"></i></button>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#gerarCupomDesconto"><i class="fa fa-lg fa-close"></i></a>
                </div>
            </div>
            <div class="form" >
                <form action="#" method="post" id="frmGerarDesconto">
                    <div class="modal-body">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4>Administracao:</h4>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="icEdtVendedor">Colaborador</label>
                                    </div>
                                    <div class="col-lg-6 campoValidar">

                                        <span><?=$usuarioLogado->getNome();?></span>
                                        <input type="hidden" id="icEdtVendedor" value="<?$usuarioLogado->getId();?>"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-body">

                                <div class="col-xs-6 col-lg-6 col-md-6" id="pf">
                                    <label><input type="radio" class="form-check" name="tipoPessoa" value="pf" onclick="verificaTipoCliente(this);"/>Pessoa Fisica</label>
                                </div>
                                <div class="row col-xs-6 col-md-6" id="pj">
                                    <label><input type="radio" class="form-check" name="tipoPessoa" value="pj" onclick="verificaTipoCliente(this);"/>Pessoa Juridica</label>
                                </div>

                                <!--Se for pessoa Fisica-->
                                <div id="divEdtCpf" class="oculto" >
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="icEdtCpf">CPF</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="icEdtProduto">Produto</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 campoValidar">
                                            <input type="text" name="icEdtCpf" id="icEdtCpf" class="form-control" onkeypress="formatar(this,'cpf')"  onblur="formatarBlur(this,'cpf');">
                                        </div>
                                        <div class="col-lg-6 campoValidar">
                                            <select name="icEdtProdutoFisico" id="icEdtProdutoFisico" class="form-control" data-show-subtext="true" data-live-search="true">
                                                <option value=""></option>
                                                <? foreach($produtos as $produto) {?>
                                                    <? if( ($produto->getNome()!= null) && $produto->getPessoaTipo() =='F') {?>
                                                        <option data-tokens="<?=$produto->getNome();?>" value="<?=$produto->getId();?>"><?=str_pad($produto->getId(), 4, 0, STR_PAD_LEFT);?> | <?=strtoupper($produto->getNome());?> </option>
                                                    <? }?>
                                                <? }?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--Se for pessoa Juridica-->
                                <div id="divEdtCnpj" class="oculto">
                                    <div class="row">
                                        <div class="col-lg-6 ">
                                            <label for="icEdtCpfCnpj">CNPJ</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="icEdtMotivo">Produto</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 campoValidar">
                                            <input type="text" name="icEdtCnpj" id="icEdtCnpj" class="form-control" onkeypress="formatar(this,'cnpj')"  onblur="formatarBlur(this,'cnpj'); " >
                                        </div>
                                        <div class="col-lg-6 campoValidar">
                                            <select name="icEdtProdutoJuridico" id="icEdtProdutoJuridico" class="form-control" data-show-subtext="true" data-live-search="true">
                                                <option value=""></option>
                                                <? foreach($produtos as $produto) {?>
                                                    <? if( ($produto->getNome()!= null) && $produto->getPessoaTipo()=="J") {?>
                                                        <option data-tokens="<?=$produto->getNome();?>" value="<?=$produto->getId();?>"><?=str_pad($produto->getId(), 4, 0, STR_PAD_LEFT);?> | <?=strtoupper($produto->getNome());?> </option>
                                                    <? }?>
                                                <? }?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <br/>
                                <div id="divDadosCupom" class="oculto">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="icEdtVencimento">Vencimento</label>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="icEdtCodigoDesconto">Codigo Desconto</label>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="icEdtValorDesconto">Valor do Desconto</label>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 campoValidar">
                                            <input type="text" name="icEdtVencimento" id="icEdtVencimento" class="form-control" onkeypress="formatar(this,'data');">
                                        </div>

                                        <div class="col-lg-4 campoValidar">
                                            <input disabled="disabled" type="text" name="icEdtCodigoDesconto" id="icEdtCodigoDesconto" class="form-control">
                                        </div>

                                        <div class="col-lg-4 campoValidar">
                                            <input  name="icEdtValorDesconto" id="icEdtValorDesconto" class="form-control">
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="icEdtMotivo">Motivo</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="icEdtEmailCliente">Email do Cliente</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 campoValidar">
                                            <textarea name="icEdtMotivo" id="icEdtMotivo" class="form-control" ></textarea>
                                        </div>
                                        <div class="col-lg-6 campoValidar">
                                            <input type="text" name="icEdtEmailCliente" id="icEdtEmailCliente" class="form-control" onblur="verificaEmail(this);">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div><!--Div Modal Body -->
                    <div class="modal-footer">
                        <button id="btnGerarCupom" class="btn btn-success">Gerar</button>
                    </div>

                </form>
            </div>
        </div>
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID inserirObservacao-->
<!-- FIM INSERIR E MODAL EDITAREDITAR/INSERIR CONTADOR-->

<script>
    $( document ).ready( function () {

        $("#frmGerarDesconto").validate({
            rules: {
                icEdtCnpj: {
                    required: true,
                    cnpj: true
                },
                icEdtCpf: {
                    required: true,
                    cpf: true
                },
                icEdtVendedor: {
                    required: true,
                },
                icEdtProdutoFisico: {
                    required: true,
                },
                icEdtProdutoJuridico: {
                    required: true,
                },
                icEdtVencimento: {
                    required: true,
                    dateITA:true
                },
                icEdtCodigoDesconto: {
                    required: true,
                },
                icEdtValorDesconto: {
                    required: true,
                },
                icEdtMotivo: {
                    required: true,
                },
                icEdtEmailCliente: {
                    required: true,
                    email:true
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

        $("#btnGerarCupom").click(function () {
            if ($("#frmGerarDesconto").valid()) {
                gerar_cupom_desconto('gerar_cupom_desconto',<?=$usuarioLogado->getId();?>);
            }
        })

    });
</script>
