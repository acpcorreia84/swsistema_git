<div class="panel panel-default collapse" id="divFiltrosIndicadores">
    <div class="panel-body bg-info">
        <button type="button" class="close" data-toggle="collapse" data-target="#divFiltrosIndicadores"><span aria-hidden="true">&times;</span></button>
        <div class="row">
            <div class="col-lg-3">
                <label for="filtroDataRenovacao">Per&iacute;odo:</label>
            </div>
            <div class="col-lg-3">
                Consultores
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <input type='text' class="datepicker-here form-control" data-position="right top" id="filtroPeriodoGraficos" name="filtroPeriodoGraficos"/>
                <script>
                    // Initialization
                    $('#filtroPeriodoGraficos').datepicker({language:"pt-BR", range:'true', date:'20/10/2016'});
                    // Access instance of plugin
                    var dataPk = $('#filtroPeriodoGraficos').data('datepicker');
                    //dataPk.update('minDate', new Date());

                    dataAtual = new Date();
                    function ResetaData() {
                        dataPk.selectDate([new Date(dataAtual.getFullYear(),dataAtual.getMonth(),'01'), new Date(dataAtual.getFullYear(),dataAtual.getMonth(),<?=getLastDayOfMonth(date('m'),date('Y'));?>)]);
                    }
                    ResetaData();
                </script>

            </div>

            <div class="col-lg-3">
                <div id="divFiltroConsultores"></div>
            </div>

            <div class="col-lg-1">
                <button name="btnFiltrarCertificados" id="btnFiltrarCertificados" class="btn btn-primary">Pesquisar</button>
            </div>

            <script>
                $('#btnFiltrarCertificados').click(function () {
                    carregarFiltrosCertificados();
                    carregarGraficoRenovacoes();
                    carregarGraficosPedidos('sim');
                })
            </script>
        </div>



    </div>

    <div class="panel-footer">

        <div class="row">
            <div class="col-lg-12" id="divUsuariosCertificados"></div>

        </div>
    </div>






    <div class="row">
        <!--GRAFICO DE RENOVACAO-->
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-pie-chart fa-fw"></i> Gr&aacute;fico de Renova&ccedil;&otilde;es </h3>
                </div>
                <div class="panel-body">
                    <div class="col-lg-12">
                        <div class="row">
                            <label>Total de Renova&ccedil;&otilde;es:</label> <span id="totalRenovacoes"></span>

                        </div>
                    </div>
                    <hr>
                    <div id="divLoadingGraficoRenovacao" ></div>
                    <div id="graficoRenovacoes" ></div><br>
                    <div class="text-left">
                        <button id='btnListarCertificados' title="Listar Certificados do Gr&aacute;fico" class="btn btn-success" data-toggle="modal" data-target="#modalHomeListarCertificados" ><i class="fa fa-search-plus" aria-hidden="true"></i> </button>
                    </div>
                    <script>
                        $('#btnListarCertificados').click(function () {

                            carregarListaCertificadosRenovados();
                        });
                    </script>
                </div>
            </div>
        </div>
        <!--FIM DO GRAFICO DE RENOVACAO-->

        <!--GRAFICO DE TIPOS DE VENDAS-->
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-pie-chart fa-fw"></i> Gr&aacute;fico de Tipos de Venda</h3>
                </div>
                <div class="panel-body">
                    <div class="col-lg-12">
                        <div class="row">
                            <label>Total de Pedidos:</label> <span id="totalTipoPedidos"></span>

                        </div>
                    </div>
                    <hr>
                    <div id="divLoadingGraficoTipoPedidos" ></div>
                    <div id="graficoTipoPedidos" ></div><br><br><br>
                </div>
            </div>
        </div>

        <!--FIM DO GRAFICO DE TIPOS DE VENDAS-->

    </div>


    <div class="row">
        <!--GRAFICO DE PEDIDOS POR CONTADOR-->
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-pie-chart fa-fw"></i> Gr&aacute;fico Pedidos de Contadores</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <label>Total de Contadores:</label> <span id="totalContadores"></span>
                    </div>
                    <div class="row">
                        <span id="totalContadoresCadastrados"></span>
                    </div>
                    <div id="divLoadingGraficoContadores" ></div>
                    <div id="graficoContadores" ></div><br>
                </div>
            </div>
        </div>

        <!--GRAFICO DE FORMA DE PAGAMENTO-->
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-pie-chart fa-fw"></i> Gr&aacute;fico Formas Pagtos.</h3>
                </div>
                <div class="panel-body">
                    <div id="divLoadingGraficoFormas" ></div>
                    <div id="graficoFormas" ></div><br>
                </div>
            </div>
        </div>

        <!--GRAFICO DE PEDIDOS POR CONTADOR-->

    </div>








</div>