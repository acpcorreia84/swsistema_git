<div id="desvincularUsuario" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-10">
                    <h3> <i class="fa fa-2x fa-trash"></i> Desvincular Parceiro </h3>
                </div>
                <div class ="col-lg-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalDuvida" onclick="modalDuvida(10)"><i class="fa fa-lg fa-question"></i></button>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#desvincularUsuario"><i class="fa fa-lg fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <h4>Voc&ecirc; tem certeza que deseja desvincular usu&aacute;rio <span id="nomeUsuarioDesvincular"></span> deste parceiro?</h4>
                    </div>
                    <div class="col-lg-3">
                        <input type="hidden" name="idParceiroDesvincular" id="idParceiroDesvincular">
                        <input type="hidden" name="idUsuarioDesvincular" id="idUsuarioDesvincular">
                        <button class="btn btn-success" onclick="desvincular_parceiro()">Sim</button>
                        <a class="btn btn-danger" data-toggle="modal" data-target="#desvincularUsuario">N&atilde;o</a>
                    </div>
                </div> <!--DIV CLASS row-->
            </div><!--DIV MODAL-CONTENT-->
            <div class="modal-footer"></div>
        </div>
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID GerarBoleto-->
