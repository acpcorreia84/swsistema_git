<!-- INICIO DO MODAL DETALHAR CONTADOR -->
<div id="detalharContador" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-9">
                    <h3><i class="fa fa-lg fa-arrows "></i> Detalhar Contador </h3>
                </div>
                <div class ="col-lg-3 text-right">
                    <!--<a class="btn btn-primary" data-toggle="modal" data-target="#visualizarContador" onclick="visualizar_contador('visualizar_contador')"><i class="fa fa-search-plus" title="Visualizar Contador"></i></a>-->
                    <button id="btnEditarContador" class="btn btn-primary" data-toggle="modal" data-target="#modalInserirEditarContador" onclick="carregarModalInserirEditarContador('editar' )"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalInserirContatoContador" onclick="carregarModalContatoContador()"> <i class="fa fa-address-card-o" aria-hidden="true"></i></button>
                    <button id='btnFecharBotaoDetalheContador' class="btn btn-danger" data-toggle="modal" data-target="#detalharContador" onclick="carregarContadores($('.paginacao li.active').find('a').html());"><i class="fa fa-close"></i></button>

                </div>
            </div>
            <div class="modal-body">
                <div class="panel panel-default">
                    <div class="panel-body bg-info">
                        <div class="row">
                            <div class="col-lg-9">
                                <h4>Contador: <span id="dcSpanIdContador">...</span> - <span id="dcSpanNomeContador">...</span> </h4>
                            </div>
                        </div> <!--DIV CLASS row-->
                        <div class="row">
                            <div class="col-lg-6">
                                <p><label>C&oacute;digo do Contador:</label> <span id="dcSpanCodigoContador">...</span></p>
                            </div>

                            <div class="col-lg-6">
                                <p><label>Endere&ccedil;o:</label> <span id="dcSpanEndereco">...</span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <p><label>Consultor:</label> <span id="dcSpanVendedor">...</span></p>
                            </div>
                            <div class="col-lg-6">
                                <p><label>Local:</label> <span id="dcSpanLocal">...</span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <p><label>Data de Cadastro:</label> <span id="dcSpanDataCadastro">...</span></p>
                            </div>
                            <div class="col-lg-3">
                                <p><label>Recebe Comiss&atilde;o:</label> <span id="dcSpanRecebeComissao">...</span></p>
                            </div>

                            <div class="col-lg-3">
                                <p><label>Concede Desconto:</label> <span id="dcSpanConcedeDesconto">...</span></p>
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
                    <div class="col-lg-12" id="divTabelaContatosContador"></div>
                </div>
                <!--FIM DIV CONTATOS-->

                <!--DIV DETALHES-->
                <div class="row">
                    <div class="col-lg-12">
                        <h4>Hist&oacute;rico:</h4>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-lg-12" id="divTabelaDetalhesContador"></div>
                </div>
                <!--FIM DIV DETALHES-->

                <!--DIV QUE GUARDA TODOS OS DADOS DA COMISSAO DO CONTADOR-->
                <div id="divDadosComissaoContador">

                    <!--FILTRO DATA DE COMISSAO USUARIO-->
                    <div class="row">
                        <div class="col-lg-12">
                            <h4>Comissionamento Contador </h4>
                        </div>
                    </div>

                    <!--INFORMACAO DE PAGAMENTO-->
                    <div class="panel panel-default" >
                        <div class="panel-body bg-success">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-4"><label >Data de Pagamento: </label><span id="spanDataPagamentoComissao"></span></div>
                                    <div class="col-lg-4"><label>Valor Pago :</label><span id="spanValorPagoComissao"></span></div>
                                </div>
                            </div> <!--DIV CLASS row-->

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-12"><label>Observa&ccedil;&atilde;o: </label><span id="spanObservacaoComissao"></span></div>
                                </div>
                            </div> <!--DIV CLASS row-->

                        </div>
                    </div>

                    <!--FIM DA INFORMACAO DE PAGAMENTO-->

                    <div class="row">
                        <div class="col-lg-12 form-inline">
                            <input type='text' class="datepicker-here form-control" data-position="right top" id="edtFiltroDataContador" name="edtFiltroDataContador"/>
                            <script>
                                // Initialization
                                $('#edtFiltroDataContador').datepicker({language:"pt-BR", range:'true'});
                                // Access instance of plugin
                                var dataPk = $('#edtFiltroDataContador').data('datepicker');
                                //dataPk.update('minDate', new Date());

                                dataAtual = new Date();

                                dataPk.selectDate([new Date(dataAtual.getFullYear(),dataAtual.getMonth()-1,'01'), new Date(dataAtual.getFullYear(),dataAtual.getMonth()-1,<?=getLastDayOfMonth(date('m')-1,date('Y'));?>)]);

                            </script>
                            <button class="btn btn-success" onclick="carregarModalDetalharContador($('#idContador').val());" title="Filtrar Per&iacute;odo de Comissionamento"><i  class="fa fa-filter" aria-hidden="true"></i> Filtrar</button>
                            <button id="btnInserirObservacaoComissaoContador" class="btn btn-primary" onclick=""><i class="fa fa-comment" aria-hidden="true" title="Inserir observa&ccedil;&atilde;&o"></i> Observa&ccedil;&atilde;o</button>
                            <script>
                                $("#btnInserirObservacaoComissaoContador").on("click", function(){
                                    ezBSAlert({
                                        type: "prompt",
                                        messageText: "Esta observa&ccedil;&atilde;o ir&aacute; ficar armazenada neste per&iacute;odo de comiss&atilde;o",
                                        alertType: "success",
                                        okButtonText: 'Salvar',
                                        cancelButtonText: 'Cancelar',
                                    }).done(function (e) {
                                        if (e) {
                                            inserirObservacaoComissaoContador(e);
                                        } else
                                            alertErro('Por favor insira a observa&ccedil;&atilde;o desejada!');

                                    });
                                });

                            </script>
                        </div>
                    </div>
                    <!--FIM DO FILTRO DA DATA DE COMISSAO USUARIO-->



                    <!--QUADRO RESUMO DE COMISSIONAMENTO-->
                    <div class="panel panel-default" >
                        <div class="panel-body bg-success">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-12"><h3 class="text-uppercase">Quadro Resumo:<small id="smalldataRegistroComissao"></small></h3></div>
                                    <div id="divQuadroResumoComissao"></div>
                                </div>
                            </div> <!--DIV CLASS row-->

                        </div>
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-lg-4" id="divBtnRegistrarComissao">
                                    <button id="btnRegistrarComissao" class="btn btn-success" onclick="$('#modalContadorRegistrarComissao').modal('show'); carregarModalRegistroComissoesContador()"><i class="fa fa-floppy-o" aria-hidden="true"></i> Registrar Comissionamento</button>
                                    <button id="btnNovoLancamentoContador" class="btn btn-success" onclick="$('#modalContadorRegistrarLancamentoComissao').modal('show'); limparModalRegistrarLancamentoComissaoContador();"><i class="fa fa-plus" aria-hidden="true"></i> Novo Lan&ccedil;amento</button>
                                </div>

                                <!--<button class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Novo Lan&ccedil;amento</button>-->
                            </div>


                        </div>
                    </div>
                    <!--FIM DO QUADRO RESUMO DE COMISSIONAMENTO-->

                    <!--PAINEL VENDAS-->
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-cart-plus fa-4x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="valor" ><span id="spanVendasContador">...</span></div>
                                            <div>Pedidos</div>
                                            <span class="small" id="spanComissaoVendasContador">...</span>%
                                        </div>
                                    </div>
                                </div>
                                <a href="#collapse2" data-toggle="collapse">
                                    <div class="panel-footer">
                                        <span class="pull-left">Detalhes</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--FIM DO PAINEL VENDAS-->

                    <!--DETALHE DE COMISSIONAMENTO-->

                    <div class="panel-group" id="accordion">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h4 class="panel-body">
                                    <a data-toggle="collapse"  href="#collapse2">
                                        <i class="fa fa-cart-plus" aria-hidden="true"> Pedidos do contador</i></a>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse">

                                <div class="row" >

                                    <div class="col-lg-12">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div id="divCertificadosVendidos"></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <!--FIM DOS CERTIFICADOS APENAS VENDIDOS-->

                </div>

            </div><!--DIV MODAL-CONTENT-->
            <div class="modal-footer">
                <input type="hidden" name="idContador" id="idContador">
                <input type="hidden" name="valorVendaContador" id="valorVendaContador">
                <input type="hidden" name="registro_comissao_id" id="registro_comissao_id">
                <input type="hidden" name="permiteRegistrarComissao" id="permiteRegistrarComissao" value="nao">
            </div>
        </div>
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID detalharContador-->
<!-- FIM DO MODAL DETALHAR CONTADOR-->
