<div class="modal fade" role="dialog" id="escolherProduto">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h3 class="modal-title"><i class="fa fa-car-plus fa-lg"></i> Escolha o Produto:</h3>
            </div>
            <div class="modal-header">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form role="form" name="frm" method="post">
                            <label for="edtProduto">Produto:</label>
                            <select name="edtProduto" id="edtProduto" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                                <? foreach($produtos as $produto) {?>
                                    <option data-tokens="<?=$produto->getNome()?>" value="<?=$produto->getId()?>"><?=$produto->getId()?> | <?=$produto->getNome()?> - R$ <?=formataMoeda($produto->getPreco())?> </option>
                                <? }?>
                            </select>
                            <label for="edtFormaPagamento">Forma de Pagamento:</label>
                            <select name="edtFormaPagamento" id="edtFormaPagamento" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                                <? foreach($formas as $forma) {?>
                                    <option data-tokens="<?=$forma->getNome()?>" value="<?=$forma->getId()?>"><?=$forma->getId()?> - <?=$forma->getNome()?></option>
                                <? }?>
                            </select>
                            <!--<label for="edtDesconto">Desconto:</label><input type="text" class="form-control" name="edtDesconto" id="edtDesconto" />-->
                            <input type="hidden" name="edtCodigoNegocio" id="edtCodigoNegocio" />
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" name="edtSalvar" id="edtSalvar" class="btn btn-success" data-toggle="modal" data-target="" onClick="finalizar_negocio();bancoLocal_add('fechar_negocio');"><i class="fa fa-check fa-lg"></i> Salvar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close fa-lg"></i> Fechar</button>
            </div>
        </div>
    </div>
</div>
<!-- FIM FECHAR NEGOCIO MODAL -->