<!-- INICIO DO MODAL DETALHAR CONTADOR -->
<div id="modalImportarCertificadosValidados" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-9">
                    <h3><i class="fa fa-lg fa-arrows "></i> Importar Certificados Validados </h3>
                </div>
                <div class ="col-lg-3 text-right">
                    <button class="btn btn-danger" data-toggle="modal" data-target="#modalImportarCertificadosValidados"><i class="fa fa-close"></i></button>
                </div>

            </div>
            <div class="modal-body">
                <iframe src="inc/jQuery-File-Upload-9.17.0/telaUploadCertificadosValidados.php" name="iframeCds"
                        frameborder="0" style="width:100%;height: 300px; border: none">

                </iframe>
            </div><!--DIV MODAL-CONTENT-->
            <div class="modal-footer">
                <a id="btnVoltarIframeImportacaoCd" class="btn btn-info" href="inc/jQuery-File-Upload-9.17.0/importacaoCertificados.html" target="iframeCds">
                    <i class="glyphicon glyphicon-arrow-left"></i>
                    <span>Arquivos de Importa&ccedil;&atilde;o</span>
                </a>

            </div>
        </div>
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID detalharContador-->
<!-- FIM DO MODAL DETALHAR CONTADOR-->
