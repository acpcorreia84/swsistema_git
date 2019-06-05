<!-- INSEIRIR RETENÇAO MODAL -->
<div class="modal fade" role="dialog" id="retencao">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Retençao do
                    <? if($prospect->getCertificadoId()) {
                        echo "Cliente: ";
                        if($cliente->getRazaoSocial())
                            echo $cliente->getRazaoSocial();
                        else
                            echo $cliente->getNomeFantasia();
                    }

                    if($prospect->getContadorId() && $prospect->getProspectTipo() == 2) {
                        echo "Contador(a): ";
                        echo $cliente->getNome();
                    }

                    ?>
                    <? ?></h4>
            </div>
            <div class="modal-body">
                <form name="frm">
                    <select name="edtSelectRetencao" id="edtSelectRetencao" class="form-control pd-4">
                        <option value="">---------------Selecione o Motivo-----------------</option>
                        <? foreach($prospectRetencoes as $retencao) {?>
                            <option value="<?=$retencao->getId()?>"><?=$retencao->getDescricao()?></option>
                        <? }?>
                    </select>
                    <input type="hidden" name="prospectId" id="prospectId" value="<?=$prospect->getId();?>">
                    <textarea class="form-control" name="edtObservacaoRetencao" id="edtObservacaoRetencao" cols="30" rows="5"></textarea>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" name="edtRetencao" id="edtRetencao" class="btn btn-success" data-dismiss="modal" onClick="retencao();bancoLocal_add('retencao');"><i class="fa fa-check fa-lg"></i> Salvar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close fa-lg"></i> Fechar</button>
            </div>
        </div>
    </div>
</div>