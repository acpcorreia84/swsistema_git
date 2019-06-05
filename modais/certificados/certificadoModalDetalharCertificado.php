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
                        <button id='btnGerarProtocolo' class='btn btn-primary' title='Gerar Protocolo' data-toggle='modal' data-target='#gerarProtocolo' onclick='gerarProtocoloCertificado()' ><i class='fa fa-internet-explorer'></i></button>
                        <!--<button id="btnCarregarModalBoleto" class="btn btn-primary" data-toggle="modal" data-target="#gerarBoleto" title="Gerar Boleto" onclick="carregarModalBoleto()"> <i class="fa fa-barcode"></i></button>-->
                        <button id="btnSafeToPay" class="btn btn-primary"> <i class="fa fa-barcode"></i></button>
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
                                <label>Protocolo:</label> <span id="dcSpanProtocolo">...</span>
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
            </div>
        </div>
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID detalharCertificado-->
<script src="https://cdn.safe2pay.com.br/safe2pay.js"></script>

<script>
    Safe2Pay.Init('A9519C7362984CB7944ACF1EB88162A6');
    //Safe2Pay.Init('466d8827-e9f5-4bc7-bf21-9f9e41964ds');
    // Comprar credito
    $('#btnSafeToPay').click(function (e) {
        // Parametros da Comprar

        var parametrosCompra =
            {
                Produto: [{
                    Codigo: $('#codigoProdutoSafeweb').val(), // Código do produto que está sendo vendido
                    Descricao: $('#dcSpanNomeProduto').html(), // Descrição do que está sendo vendido
                    ValorUnitario: $('#precoProdutoSemFormatacao').val(), // Informar decimal como string. (Ex: 1.50)
                    Quantidade: "1" // Informar int como string. (Ex: 15)
                }],
                DadosCobranca: {
                    Nome: $('#dcSpanNomeCliente').html(),
                    CPFCNPJ: $('#edtDocumentoCartaoCredito').val(),

                    Logradouro: $('#edtDocumentoLogradouro').val(),
                    Numero: $('#edtDocumentoNumero').val(),
                    Bairro: $('#edtDocumentoBairro').val(),
                    Complemento: $('#edtDocumentoComplemento').val(),
                    CEP:  $('#edtDocumentoCep').val(),
                    Pais: 'Brasil',
                    UF: $('#edtDocumentoUf').val(),
                    Cidade: $('#edtDocumentoCidade').val(),

                    Email: $('#edtEmailCartaoCredito').val()
                },
                Aplicacao: "GuiarTransaction",
                Vendedor: $('#dcSpanConsultor').html(), // Opcional
                URLNotificacao: 'http://swsistema.com.br/inc/retornoteste.php?codigoGuiar='+$('#idCertificado').val() // Opcional
            };


        function callbackSucess(response)
        {

            console.log(response.TransactionID, response.UrlBoleto,response.Descricao, response.Mensagem, response.Numero, response.Status, response.Vencimento);
            guardarBoletoSafeToPay(response.TransactionID, response.UrlBoleto,response.Descricao, response.Mensagem, response.Numero, response.Status, response.Vencimento);
        }


        function callbackError(error) {
            // Função que será executada quando ocorrer erros no plugin

            console.log(error);
        }

        function callbackConclude(response) {
            //console.log(response);
            // Função que será executada quando a modal do safe2pay for fechada
        }

        // Abre wizard
        Safe2Pay.OpenWizard(parametrosCompra, callbackSucess, callbackError, callbackConclude);
    });
</script>
