<div id="detalharParceiro" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-8">
                    <h3><i class="fa fa-lg fa-arrows "></i> Detalhar Canal </h3>
                </div>
                <div class ="col-lg-4">
                    <h3>
                        <a data-toggle="modal" data-target="#modalSalvarParceiro" class="btn btn-primary" onclick="carregar_dados_parceiro()"><i class="fa fa-lg fa-edit"></i></a>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#relacionarUsuarioParceiro" title="Vincular Usu&aacute;rio ao Canal" onclick="limpar_formulario_vincular_usuario()"><i class="fa fa-user-plus"></i></button>
                        <span id="btnBloqueio"></span>
                        <button class="btn btn-primary" id="btnApagarParceiro"><i class="fa fa-trash-o" aria-hidden="true" title="Apagar Canal"></i></button>
                        <a class="btn btn-danger" data-toggle="modal" data-target="#detalharParceiro" onclick="carregar_parceiros($('.pagination li.active').find('a').html());"><i class="fa fa-lg fa-close"></i></a>

                        <script>
                            /*CHAMA A FUNCAO DE CONFIRMACAO*/
                            $("#btnApagarParceiro").on("click", function(){
                            ezBSAlert({
                                type: "confirm",
                                messageText: "Tem certeza que deseja apagar o canal "+$('#dpSpanNomeParceiro').html()+"?",
                                alertType: "info"
                            }).done(function (e) {
                                if (e === true)
                                    apagar_parceiro();
                            });
                            });;
                        </script>
                    </h3>
                </div>
            </div>
            <div class="modal-body">
                <div class="panel panel-default">
                    <div class="panel-body bg-info">
                        <div class="row">
                            <div class="col-lg-9">
                                <h4>Canal: <span id="dpSpanIdParceiro">...</span> - <span id="dpSpanNomeParceiro">...</span></h4>
                            </div>
                        </div> <!--DIV CLASS row-->
                        <div class="row">
                            <div class="col-lg-12">
                                <kbd><span class="" id="dpSpanContatos">...</span></kbd>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-11">
                        <h4>Usu&aacute;rios Vinculados: </h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div id="divTabelaUsuariosParceiro">

                        </div>
                    </div>
                </div> <!--DIV CLASS row-->

                <div class="row">
                    <div class="col-lg-12">
                        <h4>Comissionamento Canal </h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 form-inline">
                        <input type='text' class="datepicker-here form-control" data-position="right top" id="filtroDataComissaoParceiro" name="filtroDataComissaoParceiro"/>
                        <script>
                            // Initialization
                            $('#filtroDataComissaoParceiro').datepicker({language:"pt-BR", range:'true'});
                            // Access instance of plugin
                            var dataPk = $('#filtroDataComissaoParceiro').data('datepicker');
                            //dataPk.update('minDate', new Date());

                            dataAtual = new Date();
                            function ResetaData() {
                                dataPk.selectDate([new Date(dataAtual.getFullYear(),dataAtual.getMonth()-1,'01'), new Date(dataAtual.getFullYear(),dataAtual.getMonth()-1,<?=getLastDayOfMonth(date('m')-1,date('Y'));?>)]);
                            }
                            ResetaData();
                        </script>
                        <button class="btn btn-success" onclick="detalhar_parceiro($('#parceiro_escolhido_id').val());"><i class="fa fa-filter" aria-hidden="true"></i> Filtrar</button>
                    </div>
                </div>

                <div class="panel panel-default">
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
                                <button id="btnRegistrarComissao" class="btn btn-success" onclick="$('#modalParceiroRegistrarComissao').modal('show'); carregarModalRegistroComissoesParceiro()"><i class="fa fa-floppy-o" aria-hidden="true"></i> Registrar Comissionamento</button>
                                <button id="btnNovoLancamentoParceiro" class="btn btn-success" onclick="$('#modalParceiroRegistrarLancamentoComissao').modal('show'); limparModalRegistrarLancamentoComissao();"><i class="fa fa-plus" aria-hidden="true"></i> Novo Lan&ccedil;amento</button>
                            </div>

                            <!--<button class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Novo Lan&ccedil;amento</button>-->
                        </div>


                    </div>
                </div>

                <!-- PAINEL DE VALORES BOX -->
                <div class="row">
                    <!--PAINEL VENDAS E VALIDACOES-->
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-handshake-o fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="valor" ><span id="mpSpanVendasValidacoes">...</span></div>
                                        <div>Vendas e Valida&ccedil;&otilde;es</div>
                                        <span class="small" id="mpSpanComissaoVendasValidacoes">...</span>%
                                    </div>
                                </div>
                            </div>
                            <a href="#collapse1" data-toggle="collapse">
                                <div class="panel-footer">
                                    <span class="pull-left">Detalhes</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--FIM DO PAINEL VENDAS E VALIDACOES-->

                    <!--PAINEL VENDAS-->
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-cart-plus fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="valor" ><span id="mpSpanVendas">...</span></div>
                                        <div>Vendas</div>
                                        <span class="small" id="mpSpanComissaoVendas">...</span>%
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
                    <!--FIM DO PAINEL VENDAS-->

                    <!--PAINEL VALIDACOES-->
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-thumbs-o-up fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="valor" ><span id="mpSpanValidacoes">...</span></div>
                                        <div>Valida&ccedil;&otilde;es</div>
                                        <span class="small" id="mpSpanComissaoValidacoes">...</span>%
                                    </div>
                                </div>
                            </div>
                            <a href="#collapse3" data-toggle="collapse">
                                <div class="panel-footer">
                                    <span class="pull-left">Detalhes</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--FIM DO PAINEL VALIDACOES-->

                </div><!-- /.row -->
                <!-- /.PAINEL DE VALORES BOX -->










                <!--DETALHE DE COMISSIONAMENTO-->

                <div class="panel-group" id="accordion">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h4 class="panel-body">
                                <a data-toggle="collapse"  href="#collapse1">
                                    <i class="fa fa-handshake-o" aria-hidden="true"> Certificados Vendidos e Validados</i></a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse">

                            <!-- FILTRO ITENS E GRAFICOS DE FATURAMENTO GERAL-->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div id="divCertificadosVendidosValidados"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--FIM DOS CERTIFICADOS VENDIDOS E VALIDADOS-->

                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h4 class="panel-body">
                                <a data-toggle="collapse"  href="#collapse2">
                                    <i class="fa fa-cart-plus" aria-hidden="true"> Certificados apenas Vendidos</i></a>
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
                    <!--FIM DOS CERTIFICADOS APENAS VENDIDOS-->

                    <!--CERTIFICADOS APENAS VALIDADOS-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h4 class="panel-body">
                                <a data-toggle="collapse"  href="#collapse3">
                                    <i class="fa fa-thumbs-o-up" aria-hidden="true"> Certificados Apenas Validados</i></a>
                            </h4>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse">
                            <!-- FILTRO ITENS E GRAFICOS DE FATURAMENTO GERAL-->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div id="divCertificadosValidados"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <!--FIM DOS CERTIFICADOS APENAS VALIDADOS-->

                </div>

                <!--FIM DETALHE DE COMISSIONAMENTO-->

















            </div><!--DIV MODAL-CONTENT-->
            <div class="modal-footer">
                <input type="hidden" name="valorVendaValidacao" id="valorVendaValidacao">
                <input type="hidden" name="valorValidacao" id="valorValidacao">

                <input type="hidden" name="parceiro_escolhido_id" id="parceiro_escolhido_id">
                <input type="hidden" name="valorVenda" id="valorVenda">
                <input type="hidden" name="registro_comissao_id" id="registro_comissao_id">
            </div>
        </div>
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID detalharParceiro-->
