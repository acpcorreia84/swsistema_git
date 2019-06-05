<!--MODAL INSERIR OBSERVA��O!-->
<div id="inserirObservacao" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-10">
                    <h3><i class="fa fa-lg fa-comment "></i> Inserir Observa&ccedil;&atilde;o </h3>
                </div>
                <div class ="col-lg-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalDuvida" onclick="modalDuvida(3)"><i class="fa fa-lg fa-question"></i></button>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#inserirObservacao"><i class="fa fa-lg fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <form method="post" action="#">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4>Observa&ccedil;&atilde;o:</h4>
                        </div>
                    </div> <!--DIV CLASS row-->

                    <div class="row">
                        <div class="col-lg-12">
                            <textarea rows="10"  name="edtObservacao" id="ioEdtObservacao" class="form-control" onblur="liberaBtn(this,'btnSalvarObs');" onmousemove="liberaBtn(this,'btnSalvarObs');" ></textarea>
                        </div>
                    </div> <!--DIV CLASS row-->
                </form>

            </div><!--DIV MODAL-CONTENT-->
            <div class="modal-footer">
                <? if($prospect->getProspectTipoId() == 2){?>
                    <button class="btn btn-success oculto" id="btnSalvarObs" data-dismiss="modal" onclick="inserir_observacao(<?=$usuarioLogado->getId();?>);bancoLocal_add('observacao_contador');"><i class="fa fa-lg fa-save"></i> Salvar</button>
                <?}else{?>
                    <button class="btn btn-success" id="btnSalvarObsSemContador" data-dismiss="modal" onclick="inserir_observacao(<?=$usuarioLogado->getId();?>);"><i class="fa fa-lg fa-save"></i> Salvar</button>
                <?}?>
            </div>
        </div>
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID inserirObservacao-->