<div id="detalharCertificado" class="modal fade" role="dialog" data-backdrop="focus">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-6">
                    <h3><i class="fa fa-lg fa-arrows "></i> Detalhar Certificado </h3>
                </div>
                <div class ="col-lg-6">
                    <h3>
                        <span id="dcDivModaisPermissao"></span>
                        <button id='btnGerarProtocolo' class='btn btn-primary' title='Gerar Proocolo' data-toggle='modal' data-target='#gerarProtocolo' onclick='gerarProtocoloApi()' ><i class='fa fa-internet-explorer'></i></button>
                        <button id="btnBoleto" class="btn btn-primary" data-toggle='modal' data-target="#modalGerarBoletoS2P" title="Gerar Boleto"><i class="fa fa-barcode"></i></button>
                        <button id="btnCarregarModalDesconto"  class="btn btn-primary" data-toggle="modal" data-target="#modalDesconto" title="Desconto" onclick="carregarModalDesconto();"><i class ="fa fa-tag"></i></button>
                        <button id="btnCarregarModalTrocaDeProduto" class="btn btn-primary" data-toggle="modal" data-target="#modalTrocarProdutoCerticado" title="Trocar Produto" onclick="carregarModalTrocarProdutos()"> <i class="fa fa-retweet"></i></button>
                        <button id="btnCarregarModalGerarRecibo" class="btn btn-primary" title="Gerar Recibo" onclick="window.location.href='inc/gerarReciboPdf.php'"> <i class="fa fa-file-pdf-o"></i> </button>
                        <button class="btn btn-primary" title="Observa&ccedil;&atilde;o" data-toggle="modal" data-target="#inserirObservacao"><i class="fa fa-comment "></i></button>
                        <!--<button class="btn btn-primary" title="Agendamento" data-toggle="modal" data-target="#agendamentoValidacao"><i class="fa fa-calendar-plus-o"></i></button>-->
                        <!--<button class="btn btn-primary" title="Duvidas" data-toggle="modal" data-target="#modalDuvida" onclick="modalDuvida(1)"><i class="fa fa-question"></i></button>-->
                        <button id="btnLimparProtocolo" class="btn btn-primary" title="Limpar protocolo" onclick="limpar_protocolo($('#dcSpanProtocolo').html())" ><i class="fa fa-recycle"></i></button>
                        <button id="btnRevogarCertificado" class="btn btn-primary" title="Revogar certificado" ><i class="fa fa-ban" aria-hidden="true"></i></button>
                        <hr style="margin: 3px; text-align: left; width: 90%; color: #ffffff; border-color: #ffffff;background-color:#ffffff;"/>

                        <button id="btnTrocarConsultor" class="btn btn-primary" title="Trocar consultor" data-toggle="modal" data-target="#modalAlterarConsultorCertificado" onclick="carregarModalAlterarConsultorCertificado()"><i class="fa fa-user-times" aria-hidden="true"></i></button>
                        <button data-toggle="modal" class="btn btn-primary"  title="Editar Cliente" data-target="#editarCliente" onclick="editar_cliente_certificado('editar_cliente',<?=$usuarioLogado->getId();?>)"><i class="fa fa-lg fa-edit"></i> </button>
                        <button class="btn btn-primary" id="btnApagarCertificado" ><i class="fa fa-trash-o" aria-hidden="true" title="Apagar Certificado"></i></button>
                        <button class="btn btn-primary" id="btnCupomDesconto" data-toggle="modal" data-target="#modalInserirCupom"><i class="fa fa-hand-scissors-o" aria-hidden="true" title="Aplicar cupom de desconto"></i></button>
                        <button id="btnBaixarPagamento" class="btn btn-primary" data-toggle="modal" data-target="#modalContaReceberBaixarPagamento" title="Baixar pagamento" onclick="carregarModalBaixarContasReceber()"><i class="fa fa-usd"></i> </button>
                        <button class="btn btn-danger" title="Fechar Janela" data-toggle="modal" data-target="#detalharCertificado" onclick="carregarCertificados($('.paginacao li.active').find('a').html());" id="btnFecharDetalhesCertificado"><i class="fa fa-close"></i></button>
                    </h3>
                    <script>
                        $("#btnRevogarCertificado").on("click", function(){
                            ezBSAlert({
                                type: "prompt",
                                messageText: "Tem Certeza que deseja revogar este certificado?",
                                alertType: "danger",
                                okButtonText: 'Revogar',
                                cancelButtonText: 'Cancelar',
                            }).done(function (e) {
                                if (e) {
                                    revogar_certificado(e);
                                } else
                                    alertErro('&Eacute; necess&aacute;rio informar o motivo da revoga&ccedil;&atilde;o antes de revogar o certificado!');

                            });
                        });

                        $("#btnApagarCertificado").on("click", function(){
                            ezBSAlert({
                                type: "prompt",
                                messageText: "Tem Certeza que deseja apagar este certificado?",
                                alertType: "danger",
                                okButtonText: 'Apagar',
                                cancelButtonText: 'Cancelar',
                            }).done(function (e) {
                                if (e) {
                                    apagarCertificado(e);
                                } else
                                    alertErro('&Eacute; necess&aacute;rio informar o motivo da dele&ccedil;&atilde;o deste certificado!');

                            });
                        });

                    </script>
                </div>
            </div>
            <div class="modal-body">
                <div class="panel panel-default">
                    <div class="panel-body bg-info">
                        <div class="row">
                            <div class="col-lg-9">
                                <h4>Cliente: <span id="dcSpanIdCliente">...</span> - <span id="dcSpanNomeCliente">...</span></h4>
                            </div>
                        </div> <!--DIV CLASS row-->
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Codigo Certificado:</label> <span id="dcSpanCodCertificado">...</span>
                            </div>
                            <div class="col-lg-6">
                                <label>Data da Compra:</label> <span id="dcSpanDataCompra">...</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Produto:</label> <span id="dcSpanNomeProduto">...</span>
                            </div>

                            <div class="col-lg-6">
                                <label>Protocolo:</label> <span id="dcSpanProtocolo" class="text-warning">...</span>
                            </div>

                        </div> <!--DIV CLASS row-->

                        <div class="row">
                            <div class="col-lg-6">
                                <label>Contador:</label><span id="tcSpanNomeContador">....</span>
                                <a data-toggle="modal" data-target="#vincularContador" title="Alterar Contador" onclick="carregarModalVincularContador()"><i class="fa fa-retweet"></i></a>
                            </div>
                            <div class="col-lg-6">
                                <label>Valor:</label> <span id="dcSpanPrecoProduto">...</span> - <span id="dcSpanDesconto">...</span> = <span id="dcSpanValorTotal" class="text-danger">...</span>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <label>Forma Pagamento:</label><span id="dcSpanFormaPagamento">....</span>
                            </div>
                            <div class="col-lg-6">
                                <label>Data Pagamento: </label><span class="text-danger" id="dcSpanDataPagamento"></span>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <label>Consultor:</label><span id="dcSpanConsultor">....</span>
                            </div>
                            <div class="col-lg-6">
                                <label>Validado? </label><span class="text-danger" id="dcSpanDataValidacao"></span>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <label>Validade:</label><span id="dcSpanValidadeCertificado">....</span>
                            </div>
                            <div class="col-lg-6">
                                <label>Agente de Registro: </label><span class="text-danger" id="dcSpanAgrValidacao"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <label>URL HOPE: </label><div id="spanInserirProtocoloHope"></div> <span id="dcSpanUrlHope">....</span>
                            </div>
                        </div>


                    </div>
                </div>

                <!--DIV CONTATOS-->
                <div class="row">
                    <div class="col-lg-12">
                        <h4>Contatos:</h4>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-lg-12" id="divTabelaContatosCliente"></div>
                </div>
                <!--FIM DIV CONTATOS-->

                <div class="row">
                    <div class="col-lg-12">
                        <h4>Pagamento:</h4>
                        <div id="divTabelaPagamentosCertificado"></div>
                    </div>


                </div> <!--DIV CLASS row-->

                <div class="row">
                    <div class="col-lg-12">
                        <h4>Situa&ccedil;&otilde;es: <a onclick="carregarModalDetalharCertificado($('#idCertificado').val());" title="Recarregar situa&ccedil;&otilde;es"><i class="fa fa-refresh" aria-hidden="true"></i></a></h4>
                        <!--<i class="fa fa-refresh fa-lg" onclick="consulta_situacao();"></i>-->
                        <div id="divTabelaSituacoesCertificado"></div>
                    </div>
                </div> <!--DIV CLASS row-->

            </div><!--DIV MODAL-CONTENT-->
            <div class="modal-footer">
                <input type="hidden" id="idCertificado" name="idCertificado"/>
                <input type="hidden" id="idCliente" name="idCliente"/>
                <input type="hidden" id="idContaReceber" name="idContaReceber"/>
            </div>
        </div>
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID detalharCertificado-->
<script src="https://cdn.safe2pay.com.br/safe2pay.js"></script>

<?php
//ABRE O MODAL DE DETALHE DE PAGAMENTO E HABILITA APENAS O BOTAO DE CUPOM DE DESCONTO
if (($_GET['funcao']=='aplica_cupom' || $_GET['funcao']=='detalhaCertificado') && isset($_GET['idCertificado'])) {
?>
    <script lang='javascript'>

        carregarModalDetalharCertificado('<?=$_GET['idCertificado']?>'); $('#detalharCertificado').modal('show');
        $('#hdCupom').val('<?=$_GET['cupom']?>');
    </script>
<?php
}
?>