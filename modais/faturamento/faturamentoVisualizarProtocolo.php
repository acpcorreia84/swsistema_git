<div class="container">
    <div id="visualizarProtocolo" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <div class ="col-lg-9">
                        <h3><i class="fa fa-lg fa-arrows "></i> Detalhar Certificado </h3>
                    </div>
                    <div class ="col-lg-3">
                        <span id="dcDivModaisPermissao"></span>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalDuvida" onclick="modalDuvida(6)"><i class="fa fa-lg fa-question"></i></button>
                        <a class="btn btn-danger" data-toggle="modal" data-target="#visualizarProtocolo"><i class="fa fa-lg fa-close"></i></a>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="panel panel-default">
                        <div class="panel-body bg-info">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4>Cliente: <span id="dcSpanIdCliente">...</span> - <span id="dcSpanNomeCliente">...</span></h4>
                                </div>
                            </div> <!--DIV CLASS row-->
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>Codigo Certificado: <span id="dcSpanCodCertificado">...</span></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>Valor: <span id="dcSpanPrecoProduto">...</span> - <span id="dcSpanDesconto">...</span> = <span id="dcSpanValorTotal" class="text-danger lead">...</span></p>
                                </div>
                            </div> <!--DIV CLASS row-->

                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4>Resumo: </h4><hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Vendedor: </label> <span id="dcSpanVendedor">...</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>Forma de pagamento: </label> <span id="dcSpanFormaPagto">...</span>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Produto selecionado: </label> <span id="dcSpanNomeProduto">...</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>Pagamento: </label> <span id="dcSpanPagamento">...</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>N&uacute;mero de boleto: </label> <span id="dcSpanNumBol">...</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>Data de Pagamento: </label> <span id="dcSpanDtPagamento"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Protocolo: </label> <span id="dcSpanProtocolo">...</span>
                                </div>
                                <div class="col-lg-6">
                                    <label>Local: </label> <span id="dcSpanLocal">...</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>Agendamento: </label> <span id="dcSpanAgendamento">...</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>Situa&ccedil;&atilde;o: </label> <span id="dcSpanSituacao">...</span>
                                </div>
                            </div>
                        </div>
                    </div>


                </div><!--DIV MODAL-CONTENT-->
                <div class="modal-footer"></div>
            </div>
        </div> <!--DIV CLASS modal-dialog modal-lg-->
    </div> <!--DIV ID visualizarProtocolo-->
</div>