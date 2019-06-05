<div id="modalExtornaPgto" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-10">
                    <h3><i class="fa fa-lg fa-comment "></i> Motivo Estorno </h3>
                </div>
                <div class ="col-lg-2">
                    <a class="btn btn-danger" data-toggle="modal" data-target="#modalExtornaPgto"><i class="fa fa-lg fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <form method="post" action="#">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4>Motivo:</h4>
                        </div>
                    </div> <!--DIV CLASS row-->

                    <div class="row">
                        <div class="col-lg-12">
                            <input type="hidden" name="ioCodCertificado" id="ioCodCertificado"/>
                            <textarea rows="10"  name="edtObservacaoExttorno" id="edtObservacaoExttorno" class="form-control" onblur="liberaBtn(this,'btnEstornoMotivo');" onmousemove="liberaBtn(this,'btnEstornoMotivo');"></textarea>
                        </div>
                    </div> <!--DIV CLASS row-->
                </form>
            </div><!--DIV MODAL-CONTENT-->
            <div class="modal-footer"><button class="btn btn-danger oculto" id="btnEstornoMotivo" onclick='informar_pagamento("extornar_pgto",<?=$usuarioLogado->getId();?>)'><i class="fa fa-lg fa-save"></i> Estornar</button></div>
        </div>
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID inserirObservacao-->
