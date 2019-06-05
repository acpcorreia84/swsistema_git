<div id="apagarCertificado" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-10">
                    <h3><i class="fa fa-lg fa-trash "></i> Apagar certificado </h3>
                </div>
                <div class ="col-lg-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalDuvida" onclick="modalDuvida(8)"><i class="fa fa-lg fa-question"></i></button>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#apagarCertificado"><i class="fa fa-lg fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <h4>Motivo da Exclus&atilde;o:</h4>
                    </div>
                    <div class="col-lg-6">
                        <h4>Voc&ecirc; tem certeza que deseja apagar certificado?</h4>
                    </div>
                </div> <!--DIV CLASS row-->
                <div class="row">
                    <div class="col-lg-6">
                        <form action="#" method="post">
                            <textarea rows="5" class="form-control" name="edtMotivoExclusao" onkeyup="UpperCase(this);" onblur="liberaBtn(this,'conApagar')" id="acEdtMotivoExclusao"></textarea>
                        </form>
                    </div>
                    <div class="col-lg-3">
                        <button class="btn btn-success oculto" id="conApagar" onclick="apagar(<?=$certificado->getId();?>,'apagar',<?=$usuarioLogado->getId();?>)">Sim</button>
                    </div>
                    <div class="col-lg-3">
                        <a class="btn btn-danger" data-toggle="modal" data-target="#apagarCertificado">N&atilde;o</a>
                    </div>
                </div> <!--DIV CLASS row-->
            </div>
            <div class="modal-footer"></div>
        </div>
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID excluirCertificado-->