<!--MODAL TROCAR CONSULTOR-->
<div id="modalAlterarConsultorCertificado" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-10">
                    <h3><i class="fa fa-lg fa-user-times "></i> Alterar Consultor de Neg&oacute;cios </h3>
                </div>
                <div class ="col-lg-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalDuvida" onclick="modalDuvida(3)"><i class="fa fa-lg fa-question"></i></button>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#modalAlterarConsultorCertificado"><i class="fa fa-lg fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <form method="post" action="#">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4>Consultor:</h4>
                        </div>
                    </div> <!--DIV CLASS row-->

                    <div class="row">
                        <div class="col-lg-12">
                            <div id="div_select_trocar_consultor_certificado"></div>
                        </div>
                    </div> <!--DIV CLASS row-->
                </form>

            </div><!--DIV MODAL-CONTENT-->
            <div class="modal-footer"><button id="btnTrocarConsultorCertificado" class="btn btn-success"><i class="fa fa-lg fa-save"></i> Salvar</button></div>
        </div>
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID inserirObservacao-->
<script>
    $('#btnTrocarConsultorCertificado').click(function () {
        alterarConsultorCertificado();
    });
</script>
<!--FIM DO MODAL TROCAR CONSULTOR-->