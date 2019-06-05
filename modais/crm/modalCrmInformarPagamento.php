<!-- INFOMRAR PAGAMENTO  FOR COBRAÇA -->
<? if($prospect->getContadorId() <=0) { ?>
    <div class="modal fade" role="dialog" id="informarPagto">
        <div class="modal-dialog modal-lg">
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <h3 class="modal-title"><i class="fa fa-car-plus fa-lg"></i> Informar Pagamento</h3>
                </div>
                <div class="modal-header">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-xs-12 col-lg-12 col-md-12">
                                    Voc&ecirc; relamente deseja informar pagamento para o cliente:
                                    <span class="text-warning"><strong>
                                                                <? if($cliente) {?>
                                                                    <? if($cliente->getRazaoSocial())
                                                                        echo $cliente->getRazaoSocial();
                                                                    else
                                                                        echo $cliente->getNomeFantasia();
                                                                    ?>
                                                                <? }?>
                                                                </strong></span>
                                    <br/>Forma de Pagamento: <?=$prospect->getCertificado()->getFormaPagamento()->getNome();?>

                                    <? if($prospect->getProspectTipo() == 2) {?>
                                        <span class="text-warning"><strong>
                                                                    <? if($prospect->getCertificado()->getProduto()){ $prospect->getCertificado()->getProduto()->getNome(); }?></strong></span> no valor de
                                        <span class="text-warning"><strong>
                                                                    <?=formataMoeda($prospect->getCertificado()->getProduto()->getPreco() - $prospect->getCertificado()->getDesconto());?></strong></span>.
                                        <br/><br/><br/>
                                    <? }?>
                            </div>
                            <? if($prospect->getCertificado()->getContadorId() <=0){ ?>
                                <div class="col-lg-4 col-md-2 col-xs-12">
                                    <label for="edtInformarCodContador">Cod Contador</label>
                                    <input type="text" class="form-control" name="edtInformarCodContador" id="edtInformarCodContador" onblur="procurar_contador(this.value);"/>
                                    <input type="hidden" class="form-control" name="edtCodigoContador" id="edtCodigoContador"/>
                                </div>
                                <div class="col-lg-4 col-md-8 col-xs-12">
                                        <label>Nome:</label>
                                        <label id="edtNomeContador"></label>
                                </div>
                                <div class="col-lg-2 col-md-2 col-xs-12">
                                    <button class="btn btn-success oculto" name="baixaValidacao" id="baixaValidacao" onclick="informar_pagamento_prospect(<?=$usuarioLogado->getId()?>);bancoLocal_add('informou_pagamento');">Informar Pagamento</button>
                                </div>
                            <?}else{?>
                                <?if ($prospect->getCertificado()->getDataPagamento() == '0000-00-00 00:00:00'|| $prospect->getCertificado()->getDataPagamento() == null){?>
                                    <button class="btn btn-success" name="baixaValidacao" id="baixaValidacao" onclick="informar_pagamento_prospect(<?=$usuarioLogado->getId()?>);bancoLocal_add('informou_pagamento');">Informar Pagamento</button>
                                <?}else{?>
                                <span class="text-danger">Pagamento J&aacute; informado!<strong>
                                <?}?>
                            <? }?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<? }?>
<!-- FIM INFORMAR PAGTO MODAL FOR COBRANÇA