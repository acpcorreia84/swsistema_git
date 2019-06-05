<!--MODAL VISUALIZAR PROTOCOLO!-->
<div id="visualizarProtocolo" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-10">
                    <h3><i class="fa fa-lg fa-search "></i> Visualizar Protocolo: </h3>
                </div>
                <div class ="col-lg-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalDuvida" onclick="modalDuvida(6)"><i class="fa fa-lg fa-question"></i></button>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#visualizarProtocolo"><i class="fa fa-lg fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <div id="dadosEmpresariais" class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Dados Empresariais:</h4>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-9">
                                <label> Nome: </label><br/><span id="vpSpanNomeEmpresa">...</span>
                            </div>
                            <div class="col-lg-3">
                                <label>CNPJ: </label><br/><span id="vpSpanCnpj">...</span>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-6">
                                <label>Fone: </label><br/><span id="vpSpanFoneEmpresa">...</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-7">
                                <label>Endere&ccedil;o: </label><br/><span id="vpSpanEnderecoEmpresa">...</span>
                            </div>
                        </div>


                    </div>
                </div>


                <!--Fim Etapa 1-->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Dados Pessoais:</h4><hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label> Nome: </label><br/><span id="vpSpanNomeResponsavel">...</span>
                            </div>
                            <div class="col-lg-3">
                                <label>CPF: </label><br/><span id="vpSpanCpf">...</span>
                            </div>
                            <div class="col-lg-3">
                                <label>Nascimento:</label><br/><span id="vpSpanNascResponsavel">...</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Endere&ccedil;o: </label><br/><span id="vpSpanEnderecoResponsavel">...</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label>RG: </label><br/><span id="vpSpanRg">...</span>
                            </div>
                            <div class="col-lg-3">
                                <label>Cargo: </label><br/><span id="vpSpanCargo">...</span>
                            </div>
                            <div class="col-lg-3">
                                <label>Nis (PIS/PASEP/CI): </label><br/><span id="vpSpanNis">...</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <label>E-mail: </label><br/><span id="vpSpanEmail">...</span>
                            </div>
                            <div class="col-lg-4">
                                <label>Fone: </label><br/><span id="vpSpanFoneResponsavel">...</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Fim Etapa 2-->

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Resumo: </h4><hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Vendedor: </label> <span id="vpSpanVendedor">...</span>
                            </div>
                            <div class="col-lg-6">
                                <label>Forma de pagamento: </label> <span id="vpSpanFormaPagto">...</span>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Produto selecionado: </label> <span id="vpSpanNomeProduto">...</span>
                            </div>
                            <div class="col-lg-6">
                                <label>Pagamento: </label> <span id="vpSpanPagamento">...</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label>N&uacute;mero de boleto: </label> <span id="vpSpanNumBol">...</span>
                            </div>
                            <div class="col-lg-6">
                                <label>Data de Pagamento: </label> <span id="vpSpanDtPagamento"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Protocolo: </label> <span id="vpSpanProtocolo">...</span>
                            </div>
                            <div class="col-lg-6">
                                <label>Local: </label> <span id="vpSpanLocal">...</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Agendamento: </label> <span id="vpSpanAgendamento">...</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Situa&ccedil;&atilde;o: </label> <span id="vpSpanSituacao">...</span>
                            </div>
                        </div>
                    </div>
                </div>


            </div><!--DIV MODAL-CONTENT-->
            <div class="modal-footer"></div>
        </div>
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID visualizarProtocolo-->