<!-- INICIO DO MODAL DETALHAR CONTADOR -->
<div id="modalUsuarioDetalhar" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class ="col-lg-6">
                    <h3><i class="fa fa-lg fa-arrows "></i> Detalhar Usu&aacute;rio </h3>
                </div>
                <div class ="col-lg-6">
                    <h3>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalRelacionarUsuarioLocal" title="Vincular Local ao Usu&aacute;rio"><i class="fa fa-building-o"></i></button>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalUsuarioInserirEditar" onclick="carregarModalEditarUsuario();"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalRelacionarUsuarioLocal" title="Vincular Local ao Usu&aacute;rio"><i class="fa fa-building-o"></i></button>
                        <button class="btn btn-primary" id="btnApagarUsuario" ><i class="fa fa-trash-o" aria-hidden="true" title="Apagar Usu&aacute;rio"></i></button>
                        <script>$("#btnApagarUsuario").on("click", function(){
                                ezBSAlert({
                                    type: "confirm",
                                    messageText: "Tem certeza que deseja apagar o usu&aacute;rio "+$('#spanNomeUsuario').html()+"?",
                                    alertType: "info"
                                }).done(function (e) {
                                    if (e === true)
                                        apagarUsuario($('#idUsuario').val());
                                });
                            });</script>
                        <button class="btn btn-primary" id="btnResetarSenha"><i class="fa fa-refresh" aria-hidden="true" title="Resetar senha do Usu&aacute;rio"></i></button>
                        <script>$("#btnResetarSenha").on("click", function(){
                                ezBSAlert({
                                    type: "confirm",
                                    messageText: "Tem certeza que deseja resetar a senha do usu&aacute;rio "+$('#spanNomeUsuario').html()+"?",
                                    alertType: "info"
                                }).done(function (e) {
                                    if (e === true)
                                        resetarSenhaUsuario($('#idUsuario').val());
                                });
                            });</script>

                        <a class="btn btn-danger" data-toggle="modal" data-target="#modalUsuarioDetalhar" onclick="carregarUsuarios($('.paginacao li.active').find('a').html(),50)"><i class="fa fa-lg fa-close"></i></a>
                    </h3>
                </div>
            </div>
            <div class="modal-body">
                <div class="panel panel-default">
                    <div class="panel-body bg-info">
                        <div class="row">
                            <div class="col-lg-9">
                                <h4> Usu&aacute;rio: <span id="spanIdUsuario">...</span> - <span id="spanNomeUsuario">...</span> </h4>
                            </div>
                        </div> <!--DIV CLASS row-->
                        <div class="row">
                            <div class="col-lg-12">
                                <p><label>Endere&ccedil;o:</label> <span id="spanEnderecoUsuario">...</span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <p><label>E-mail:</label> <span id="spanEmailUsuario">...</span></p>
                            </div>
                            <div class="col-lg-6">
                                <p><label>Local:</label> <span id="spanLocalUsuario">...</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--PEGA TODOS OS LOCAIS VINDULADOS AO USUARIO-->
                <div class="row">
                    <div class="col-lg-12">
                        <h4>Locais:</h4>
                        <div id="divLocaisUsuario"></div>
                    </div>
                </div> <!--DIV CLASS row-->
                <!--PEGA TODOS OS USUARIOS VINDULADOS AOS LOCAIS DO USUARIO-->
                <div class="row">
                    <div class="col-lg-12">
                        <h4>Usuarios Locais:</h4>
                        <div id="divUsuariosLocais"></div>
                    </div>
                </div> <!--DIV CLASS row-->

                <!--FILTRO DATA DE COMISSAO USUARIO-->
                <div class="row">
                    <div class="col-lg-12">
                        <h4>Comissionamento Usu&aacute;rio </h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 form-inline">
                        <input type='text' class="datepicker-here form-control" data-position="right top" id="filtroDataComissaoUsuario" name="filtroDataComissaoUsuario"/>
                        <script>
                            // Initialization
                            $('#filtroDataComissaoUsuario').datepicker({language:"pt-BR", range:'true'});
                            // Access instance of plugin
                            var dataPk = $('#filtroDataComissaoUsuario').data('datepicker');
                            //dataPk.update('minDate', new Date());

                            dataAtual = new Date();
                            function ResetaData() {
                                dataPk.selectDate([new Date(dataAtual.getFullYear(),dataAtual.getMonth()-1,'01'), new Date(dataAtual.getFullYear(),dataAtual.getMonth()-1,<?=getLastDayOfMonth(date('m')-1,date('Y'));?>)]);
                            }
                            ResetaData();
                        </script>
                        <button class="btn btn-success" onclick="carregarModalDetalhesUsuario($('#idUsuario').val());"><i class="fa fa-filter" aria-hidden="true"></i> Filtrar</button>
                    </div>
                </div>
                <!--FIM DO FILTRO DA DATA DE COMISSAO USUARIO-->

                <!--QUADRO RESUMO DE COMISSIONAMENTO-->
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
                                <button id="btnRegistrarComissao" class="btn btn-success" onclick="$('#modalUsuarioRegistrarComissao').modal('show'); carregarModalRegistroComissoesUsuarios()"><i class="fa fa-floppy-o" aria-hidden="true"></i> Registrar Comissionamento</button>
                                <button id="btnNovoLancamento" class="btn btn-success" onclick="$('#modalUsuarioRegistrarLancamentoComissao').modal('show'); limparModalRegistrarLancamentoComissaoUsuario();"><i class="fa fa-plus" aria-hidden="true"></i> Novo Lan&ccedil;amento</button>
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
                                        <div class="valor" ><span id="spanVendasUsuario">...</span></div>
                                        <div>Vendas</div>
                                        <span class="small" id="spanComissaoVendasUsuario">...</span>%
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
                </div>
                <!--FIM DOS CERTIFICADOS APENAS VENDIDOS-->




            </div><!--DIV MODAL-CONTENT-->
            <div class="modal-footer">
                <input type="hidden" name="idUsuario" id="idUsuario">
                <input type="hidden" name="valorVendaUsuario" id="valorVendaUsuario">
                <input type="hidden" name="registro_comissao_id" id="registro_comissao_id">
            </div>
        </div>
    </div> <!--DIV CLASS modal-dialog modal-lg-->
</div> <!--DIV ID detalharContador-->
<!-- FIM DO MODAL DETALHAR CONTADOR-->
