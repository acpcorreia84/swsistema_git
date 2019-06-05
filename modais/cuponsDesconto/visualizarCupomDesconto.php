<!-- INICIO DO MODAL DETALHAR CONTADOR -->
<div id="visualizarCupomDesconto" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-11">
                    <h3><i class="fa fa-lg fa-arrows "></i> Detalhar CupomDesconto </h3>
                </div>
                <div class ="col-lg-1">
                    <h3>
                        <a class="btn btn-danger" data-toggle="modal" data-target="#visualizarCupomDesconto"><i class="fa fa-lg fa-close"></i></a>
                    </h3>
                </div>
            </div>
            <div class="modal-body">
                <div class="panel panel-default">
                    <div class="panel-body bg-info">
                        <div class="row">
                            <div class="col-lg-5">
                                <h4>Código de Desconto:
                                    <span id="vcSpanCodigoDesconto"> </span>
                                </h4>
                            </div>
                            <div class="col-lg-7">
                                <h4>
                                    Emissor:
                                    <span id="vcSpanVendedor"> </span>
                                </h4>
                            </div>
                        </div> <!--DIV CLASS row-->
                    </div>
                </div>
                <div class="panel panel-default">
                        <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <p><label>Valor do Desconto:</label> <span id="vcSpanValorDesconto">...</span></p>
                            </div>
                            <div class="col-lg-6">
                                <p><label>Vendedor:</label> <span id="vcSpanProduto">...</span></p>
                            </div>
                        </div>
                            <br/>
                        <div class="row">
                            <div class="col-lg-4">
                                <p><label>Vencimento:</label> <span id="vcSpanVencimento">...</span></p>
                            </div>
                            <div class="col-lg-4">
                                <p><label>CPF/CNPJ:</label> <span id="vcSpanCpfCnpj">...</span></p>
                            </div>
                            <div class="col-lg-4">
                                <p><label>Email:</label> <span id="vcSpanEmail">...</span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <p><label>Motivo:</label> <span id="vcSpanMotivo">...</span></p>
                            </div>
                            <div class="col-lg-6">
                                <p><label>Status:</label> <span id="vcSpanStatus">...</span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <p><label>Autoriza&ccedil;&atilde;o:</label> <span id="vcSpanAutorizacao">...</span></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div><!--DIV MODAL-CONTENT-->
            <div class="modal-footer"></div>
        </div>
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID detalharCupomDesconto-->
<!-- FIM DO MODAL DETALHAR CONTADOR-->
