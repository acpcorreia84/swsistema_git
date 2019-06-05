<div class="modal fade" role="dialog" id="ultimosCD" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"><i class="fa fa-certificate fa-lg"></i> Ultimos Certificados
                    <? if($prospect->getCertificadoId()) echo "Adquiridos";
                    if($prospect->getContadorId()) echo "Indicados";
                    ?>
                </h3>
            </div>

            <div class="modal-header">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-responsive table-striped">
                            <thead>
                            <td>Cod</td>
                            <td>Cliente</td>
                            <td>Produto</td>
                            <td>Data Compra</td>
                            <? if($prospect->getContadorId()) {?>
                                <td>Sem Idica&ccedil;ao</td>
                            <? }?>
                            <td>Vendedor</td>
                            </thead>

                            <tbody>
                            <?
                                if($certificados){
                                foreach ($certificados as $certificado) {
                                    if($certificado->getDataConfirmacaoPagamento()){
                             ?>
                                        <tr>
                                            <td><?=$certificado->getId()?></td>
                                            <td><?=$certificado->getCliente()->getRazaoSocial();?></td>
                                            <td><?=$certificado->getProduto()->getNome()?></td>
                                            <td><?=$certificado->getDataCompra('d/m/Y')?></td>
                                            <? if($prospect->getContadorId()) {?>
                                                <td><?
                                                    $tempo = (date('m')-$certificado->getDataCompra('m'));

                                                    if($tempo < 0) {
                                                        $tempo = 12-(($tempo)*-1);
                                                    }
                                                    echo $tempo;
                                                    if($tempo == 1)
                                                        echo " Mes";
                                                    else
                                                        echo " Meses";
                                                    ?></td>
                                            <? }?>
                                            <td><?=$certificado->getUsuario()->getNome()?></td>
                                        </tr>
                                    <? }?>
                                <? }?>
                             <? }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close fa-lg"></i> Fechar</button>
            </div>
        </div>
    </div>
</div>