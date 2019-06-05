<!-- INSEIRIR OBSERVAÇAO NA FINALIZAÇAO DA CHAMADA MODAL -->
<div class="modal fade" role="dialog" id="observacaoChamada">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Finalizar Chamada do
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
                    <input type="hidden" name="prospectId" id="prospectId" value="<?=$prospect->getId();?>">
                    <textarea class="form-control" name="edtObservacaoChamada" id="edtObservacaoChamada" cols="30" rows="5" onkeyUp="UpperCase(this);"></textarea>
                </form>
            </div>

            <div class="modal-footer">
                <a type="button" class="btn btn-success" onClick="finalizar_chamada();bancoLocal_delete();" ><i class="fa fa-check fa-lg"></i> Finalizar</a>
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close fa-lg"></i> Fechar</button>
            </div>
        </div>
    </div>
</div>