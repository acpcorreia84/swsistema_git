<div id="modalContaReceberDetalhar" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-5">
                    <h3><i class="fa fa-lg fa-arrows "></i> Detalhar Conta a Receber </h3>
                </div>
                <div class ="col-lg-7 text-right">
                    <button id="btnBaixarPagamentoContaReceber" class="btn btn-primary" data-toggle="modal" data-target="#modalContaReceberBaixarPagamento" title="Baixar pagamento" onclick="carregarDadosModalBaixarConta()"><i class="fa fa-inbox"></i> Baixar</button>
                    <!--<button id="btnExtornarPagamentoContaReceber" class="btn btn-danger" data-toggle="modal" data-target="#modalContaReceberExtornarPagamento" title="Extornar Pagamento" onclick=""><i class="fa fa-undo"></i> Extornar</button>-->
                    <button id="btnExtornarPagamentoContaReceber" class="btn btn-danger" title="Extornar Pagamento"><i class="fa fa-undo"></i> Extornar</button>
                    <script>
                        $("#btnExtornarPagamentoContaReceber").on("click", function(){
                            ezBSAlert({
                                type: "confirm",
                                messageText: "Tem certeza que deseja extornar esta Conta a Receber",
                                alertType: "info"
                            }).done(function (e) {
                                if (e === true)
                                    extornarContaReceber();
                            });
                        });
                    </script>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#modalContaReceberDetalhar" onclick="carregarContasReceber($('.pagination li.active').find('a').html()); $('#modalCarregando').modal('show');"><i class="fa fa-lg fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <div class="panel panel-default">
                    <div class="panel-body bg-info">
                        <div class="row">
                            <div class="col-lg-12">
                                <!--GUARDA O ID DA CONTA A RECEBER-->
                                <input type="hidden" id="crContaId">
                                <label>Conta:</label><span id="crDescricaoConta">...</span>
                            </div>
                        </div> <!--DIV CLASS row-->
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Vencimento: </label><span id="crVencimentoConta">...</span>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Valor:</label><span id="crValorConta">...</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Forma de pagamento: </label><span id="crFormaConta">...</span>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-2">
                        <h4>Situa&ccedil;&atilde;o: </h4>
                    </div>
                    <div class="col-lg-3">
                        <h4>Data de Pagamento:</h4>
                    </div>
                    <div class="col-lg-3">
                        <h4>Observa&ccedil;&atilde;o:</h4>
                    </div>
                    <div class="col-lg-4">
                        <h4>Observa&ccedil;&atilde;o:</h4>
                    </div>


                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <span id="crSituacaoPagamentoConta">...</span>
                    </div>
                    <div class="col-lg-3">
                        <span id="crDataPagamentoConta">...</span>
                    </div>
                    <div class="col-lg-3">
                        <span id="crObservacaoConta">...</span>
                    </div>
                    <div class="col-lg-3">
                        <span id="crImagemComprovanteCertificado">...</span>
                    </div>

                </div> <!--DIV CLASS row-->

                <!--DIV DA TABELA DE LANCAMENTOS-->
                <div class="row oculto" id="divLabelLancamentos">
                    <div class="col-lg-2">
                        <h3>Lan&ccedil;amentos</h3>
                    </div>
                </div> <!--DIV CLASS row-->
                <div class="row">
                    <div class="col-lg-12">
                        <div id="divLancamentosContaReceberBaixa"></div>

                    </div>
                </div> <!--DIV CLASS row-->


                <!--DIV DA TABELA DE BOLETOS-->
                <div class="row oculto" id="divBoletos">
                    <div class="col-lg-2">
                        <h3>Boletos</h3>
                    </div>
                </div> <!--DIV CLASS row-->
                <div class="row">
                    <div class="col-lg-12">
                        <div id="divTabelaBoletos"></div>

                    </div>
                </div> <!--DIV CLASS row-->

                <div class="row">
                    <div class="col-lg-2">
                        <h3>Hist&oacute;rico</h3>
                    </div>
                </div> <!--DIV CLASS row-->
                <div class="row">
                    <div class="col-lg-12">
                        <div id="divTabelaSituacoes"></div>

                    </div>
                </div> <!--DIV CLASS row-->




            </div><!--DIV MODAL-CONTENT-->
        </div>
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID detalharParceiro-->
