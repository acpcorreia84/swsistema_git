
<!--Revogar Certificado-->
<div id="autorizarCertificado" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-10">
                    <h3><i class="fa fa-lg fa-thumbs-o-up "></i> Autorizar Certificado </h3>
                </div>
                <div class ="col-lg-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalDuvida" onclick="modalDuvida(9)"><i class="fa fa-lg fa-question"></i></button>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#autorizarCertificado"><i class="fa fa-lg fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <h4>Motivo da Autoriza&ccedil;&atilde;o:</h4>
                    </div>
                    <div class="col-lg-6">
                        <h4>Voc&ecirc; tem certeza que deseja autorizar certificado:</h4>
                    </div>
                </div> <!--DIV CLASS row-->
                <div class="row">
                    <div class="col-lg-6">
                        <form action="#" method="post">
                            <textarea class="form-control" name="edtMotivoAutorizacao" onblur="liberaBtn(this,'conAutorizar')" id="edtMotivoAutorizacao" ></textarea>
                        </form>
                    </div>
                    <div class="col-lg-3">
                        <button class="btn btn-success oculto" id="conAutorizar" onclick="autorizar_certificado('autorizar',<?=$usuarioLogado->getId();?>)">Sim</button>
                    </div>
                    <div class="col-lg-3">
                        <a class="btn btn-danger" data-toggle="modal" data-target="#autorizarCertificado">N&atilde;o</a>
                    </div>
                </div> <!--DIV CLASS row-->
            </div><!--DIV MODAL-CONTENT-->
            <div class="modal-footer"></div>
        </div>
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID RevogarCertificado-->