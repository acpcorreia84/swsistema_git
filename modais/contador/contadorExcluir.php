<!-- INICIO DO MODAL EXCLUIR CONTADOR-->
<div id="excluirContador" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-10">
                    <h3><i class="fa fa-lg fa-trash "></i> Excluir Contador </h3>
                </div>
                <div class ="col-lg-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalDuvida" onclick="modalDuvida(8)"><i class="fa fa-lg fa-question"></i></button>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#excluirContador"><i class="fa fa-lg fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <h4>Motivo da Exclus&atilde;o:</h4>
                    </div>
                    <div class="col-lg-6">
                        <h4>Voc&ecirc; tem certeza que deseja excluir esse contador?</h4>
                    </div>
                </div> <!--DIV CLASS row-->
                <div class="row">
                    <div class="col-lg-6">
                        <form action="#" method="post">
                            <textarea rows="5" class="form-control" name="edtMotivoExclusao" onkeyup="UpperCase(this);" onblur="valida(this)" id="ecEdtMotivoExclusao"></textarea>
                        </form>
                    </div>
                    <div class="col-lg-3">
                        <input type="hidden" name="idContador" id="idContador">
                        <button disabled="disabled" class="btn btn-success" id="conApagar" onclick="excluir_contador('excluir_contador',<?=$usuarioLogado->getId();?>)">Sim</button>
                    </div>
                    <div class="col-lg-3">
                        <a class="btn btn-danger"   data-toggle="modal" data-target="#excluirContador">N&atilde;o</a>
                    </div>
                </div> <!--DIV CLASS row-->
            </div>
            <div class="modal-footer"></div>
        </div>
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID excluirCertificado-->
<!-- FIM DO MODAL EXCLUIR CONTADOR-->
