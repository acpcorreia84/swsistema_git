<?php
/**
 * Created by Antonio Correia.
 * Date: 27/10/2016
 * Time: 06:36
 */
?>

<? if( ($usuarioLogado->getSetorId() == 5 ) ) { // SETOR VENDAS ?>
    <!-- GRAFIO DONOUT DE PRODUTO -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Dia', 'Vendas Mes Passado' , 'Vendas'],
                ['01 - <?=date("D", mktime(0,0,0,date('m'),'1',date('Y')) )?>', <? if($arrayMesPassado[1]) echo $arrayMesPassado[1]; else echo 0;?>, <? if($arrayDia[1]) echo $arrayDia[1]; else echo 0;?>],
                ['02 - <?=date("D", mktime(0,0,0,date('m'),'2',date('Y')) )?>', <? if($arrayMesPassado[2]) echo $arrayMesPassado[2]; else echo 0;?>, <? if($arrayDia[2]) echo $arrayDia[2]; else echo 0;?>],
                ['03 - <?=date("D", mktime(0,0,0,date('m'),'3',date('Y')) )?>', <? if($arrayMesPassado[3]) echo $arrayMesPassado[3]; else echo 0;?>, <? if($arrayDia[3]) echo $arrayDia[3]; else echo 0;?>],
                ['04 - <?=date("D", mktime(0,0,0,date('m'),'4',date('Y')) )?>', <? if($arrayMesPassado[4]) echo $arrayMesPassado[4]; else echo 0;?>, <? if($arrayDia[4]) echo $arrayDia[4]; else echo 0;?>],
                ['05 - <?=date("D", mktime(0,0,0,date('m'),'5',date('Y')) )?>', <? if($arrayMesPassado[5]) echo $arrayMesPassado[5]; else echo 0;?>, <? if($arrayDia[5]) echo $arrayDia[5]; else echo 0;?>],
                ['06 - <?=date("D", mktime(0,0,0,date('m'),'6',date('Y')) )?>', <? if($arrayMesPassado[6]) echo $arrayMesPassado[6]; else echo 0;?>, <? if($arrayDia[6]) echo $arrayDia[6]; else echo 0;?>],
                ['07 - <?=date("D", mktime(0,0,0,date('m'),'7',date('Y')) )?>', <? if($arrayMesPassado[7]) echo $arrayMesPassado[7]; else echo 0;?>, <? if($arrayDia[7]) echo $arrayDia[7]; else echo 0;?>],
                ['08 - <?=date("D", mktime(0,0,0,date('m'),'8',date('Y')) )?>', <? if($arrayMesPassado[8]) echo $arrayMesPassado[8]; else echo 0;?>, <? if($arrayDia[8]) echo $arrayDia[8]; else echo 0;?>],
                ['09 - <?=date("D", mktime(0,0,0,date('m'),'9',date('Y')) )?>', <? if($arrayMesPassado[9]) echo $arrayMesPassado[9]; else echo 0;?>, <? if($arrayDia[9]) echo $arrayDia[9]; else echo 0;?>],
                ['10 - <?=date("D", mktime(0,0,0,date('m'),'10',date('Y')) )?>', <? if($arrayMesPassado[10]) echo $arrayMesPassado[10]; else echo 0;?>, <? if($arrayDia[10]) echo $arrayDia[10]; else echo 0;?>],
                ['11 - <?=date("D", mktime(0,0,0,date('m'),'11',date('Y')) )?>', <? if($arrayMesPassado[11]) echo $arrayMesPassado[11]; else echo 0;?>, <? if($arrayDia[11]) echo $arrayDia[11]; else echo 0;?>],
                ['12 - <?=date("D", mktime(0,0,0,date('m'),'12',date('Y')) )?>', <? if($arrayMesPassado[12]) echo $arrayMesPassado[12]; else echo 0;?>, <? if($arrayDia[12]) echo $arrayDia[12]; else echo 0;?>],
                ['13 - <?=date("D", mktime(0,0,0,date('m'),'13',date('Y')) )?>', <? if($arrayMesPassado[13]) echo $arrayMesPassado[13]; else echo 0;?>, <? if($arrayDia[13]) echo $arrayDia[13]; else echo 0;?>],
                ['14 - <?=date("D", mktime(0,0,0,date('m'),'14',date('Y')) )?>', <? if($arrayMesPassado[14]) echo $arrayMesPassado[14]; else echo 0;?>, <? if($arrayDia[14]) echo $arrayDia[14]; else echo 0;?>],
                ['15 - <?=date("D", mktime(0,0,0,date('m'),'15',date('Y')) )?>', <? if($arrayMesPassado[15]) echo $arrayMesPassado[15]; else echo 0;?>, <? if($arrayDia[15]) echo $arrayDia[15]; else echo 0;?>],
                ['16 - <?=date("D", mktime(0,0,0,date('m'),'16',date('Y')) )?>', <? if($arrayMesPassado[16]) echo $arrayMesPassado[16]; else echo 0;?>, <? if($arrayDia[16]) echo $arrayDia[16]; else echo 0;?>],
                ['17 - <?=date("D", mktime(0,0,0,date('m'),'17',date('Y')) )?>', <? if($arrayMesPassado[17]) echo $arrayMesPassado[17]; else echo 0;?>, <? if($arrayDia[17]) echo $arrayDia[17]; else echo 0;?>],
                ['18 - <?=date("D", mktime(0,0,0,date('m'),'18',date('Y')) )?>', <? if($arrayMesPassado[18]) echo $arrayMesPassado[18]; else echo 0;?>, <? if($arrayDia[18]) echo $arrayDia[18]; else echo 0;?>],
                ['19 - <?=date("D", mktime(0,0,0,date('m'),'19',date('Y')) )?>', <? if($arrayMesPassado[19]) echo $arrayMesPassado[19]; else echo 0;?>, <? if($arrayDia[19]) echo $arrayDia[19]; else echo 0;?>],
                ['20 - <?=date("D", mktime(0,0,0,date('m'),'20',date('Y')) )?>', <? if($arrayMesPassado[20]) echo $arrayMesPassado[20]; else echo 0;?>, <? if($arrayDia[20]) echo $arrayDia[20]; else echo 0;?>],
                ['21 - <?=date("D", mktime(0,0,0,date('m'),'21',date('Y')) )?>', <? if($arrayMesPassado[21]) echo $arrayMesPassado[21]; else echo 0;?>, <? if($arrayDia[21]) echo $arrayDia[21]; else echo 0;?>],
                ['22 - <?=date("D", mktime(0,0,0,date('m'),'22',date('Y')) )?>', <? if($arrayMesPassado[22]) echo $arrayMesPassado[22]; else echo 0;?>, <? if($arrayDia[22]) echo $arrayDia[22]; else echo 0;?>],
                ['23 - <?=date("D", mktime(0,0,0,date('m'),'23',date('Y')) )?>', <? if($arrayMesPassado[23]) echo $arrayMesPassado[23]; else echo 0;?>, <? if($arrayDia[23]) echo $arrayDia[23]; else echo 0;?>],
                ['24 - <?=date("D", mktime(0,0,0,date('m'),'24',date('Y')) )?>', <? if($arrayMesPassado[24]) echo $arrayMesPassado[24]; else echo 0;?>, <? if($arrayDia[24]) echo $arrayDia[24]; else echo 0;?>],
                ['25 - <?=date("D", mktime(0,0,0,date('m'),'25',date('Y')) )?>', <? if($arrayMesPassado[25]) echo $arrayMesPassado[25]; else echo 0;?>, <? if($arrayDia[25]) echo $arrayDia[25]; else echo 0;?>],
                ['26 - <?=date("D", mktime(0,0,0,date('m'),'26',date('Y')) )?>', <? if($arrayMesPassado[26]) echo $arrayMesPassado[26]; else echo 0;?>, <? if($arrayDia[26]) echo $arrayDia[26]; else echo 0;?>],
                ['27 - <?=date("D", mktime(0,0,0,date('m'),'27',date('Y')) )?>', <? if($arrayMesPassado[27]) echo $arrayMesPassado[27]; else echo 0;?>, <? if($arrayDia[27]) echo $arrayDia[27]; else echo 0;?>],
                ['28 - <?=date("D", mktime(0,0,0,date('m'),'28',date('Y')) )?>', <? if($arrayMesPassado[28]) echo $arrayMesPassado[28]; else echo 0;?>, <? if($arrayDia[28]) echo $arrayDia[28]; else echo 0;?>],
                ['29 - <?=date("D", mktime(0,0,0,date('m'),'29',date('Y')) )?>', <? if($arrayMesPassado[29]) echo $arrayMesPassado[29]; else echo 0;?>, <? if($arrayDia[29]) echo $arrayDia[29]; else echo 0;?>],
                ['30 - <?=date("D", mktime(0,0,0,date('m'),'30',date('Y')) )?>', <? if($arrayMesPassado[30]) echo $arrayMesPassado[30]; else echo 0;?>, <? if($arrayDia[30]) echo $arrayDia[30]; else echo 0;?>],
                ['31 - <?=date("D", mktime(0,0,0,date('m'),'31',date('Y')) )?>', <? if($arrayMesPassado[31]) echo $arrayMesPassado[31]; else echo 0;?>, <? if($arrayDia[31]) echo $arrayDia[31]; else echo 0;?>]

            ]);
            var options = {
                curveType: 'function',
                legend: { position: 'bottom' },
            };
            chart = new google.visualization.AreaChart(document.getElementById('curvechart'));
            chart.draw(data, options);
        }
    </script>
    <!-- FIM DONOUT DE PRODUTO -->
<? } ?>

<!-- PAINEL DE VALORES BOX -->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-times-circle fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="valor"><?
                            echo formataMoeda($vendasBloqueadaTotal);
                            ?></div>
                        <div><?=$nomeBox0;?></div>
                    </div>
                </div>
            </div>
            <a href="telaCertificadoNaoAutorizados.php">
                <div class="panel-footer">
                    <span class="pull-left">Detalhes</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-bar-chart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="valor"><?
                            echo formataMoeda($vendasDia);
                            ?></div>
                        <div><?=$nomeBox1;?></div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">Detalhes</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="valor"><?
                            echo formataMoeda($vendasMes);
                            ?></div>
                        <div><?=$nomeBox2;?></div>
                    </div>
                </div>
            </div>
            <a href="telaMeuFaturamento.php">
                <div class="panel-footer">
                    <span class="pull-left">Detalhes</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="valor"><?
                            echo formataMoeda($emAberto);
                            ?></div>
                        <div><?=$nomeBox3;?></div>
                    </div>
                </div>
            </div>
            <a href="telaCertificado.php">
                <div class="panel-footer">
                    <span class="pull-left">Detalhes</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div><!-- /.row -->

<!--
QUADRO DE INDICADORES
-->
<div class="panel panel-success">
    <div class="panel-heading">
        <h4><i class="fa fa-line-chart" aria-hidden="true"></i> 2.Indicadores <span title="Abrir Filtros" class="maisOpcoes" data-toggle="collapse" data-target="#divFiltrosIndicadores"> <i class="fa fa-bars"></i></span></h4>
    </div>
    <div class="panel-body">
        <?php include 'inc/filtros/filtroHomeGraficosVendas.php';?>

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
</div>

<!--
FIM DO QUADRO DE INDICADORES
-->

<!-- /.PAINEL DE VALORES BOX -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-line-chart fa-fw"></i> Meu Faturamento</h3>
            </div>
            <div class="panel-body">
                <div id="curvechart"></div>
            </div>
        </div>
    </div>
</div><!-- /.row -->
<div class="row">
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Comiss&atilde;o</h3>
            </div>

            <div class="panel-body">
                <div class="divValor">
                    <? if($vendasMes < 15000) {
                        echo "R$ 00,00";
                    }else
                        if($vendasMes >= 15000 && $vendasMes < 25000) {
                            $comissao = $vendasMes*0.04;
                            echo formataMoeda($comissao);
                        }else
                            if($vendasMes >= 25000 && $vendasMes < 35000) {
                                $comissao = $vendasMes*0.05;
                                echo formataMoeda($comissao);
                            }else
                                if($vendasMes >= 35000) {
                                    $comissao = $vendasMes*0.55;
                                    echo formataMoeda($comissao);
                                }
                    ?>
                </div>
                <div class="text-right"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-percent fa-fw"></i> Meta Concluida (R$ 35.000,00)</h3>
            </div>

            <div class="panel-body">
                <div class="divValor">
                    <? if($vendasMes) {
                        $x = ($vendasMes/35000)*100;
                        echo number_format($x, 2, ',', ' ');;
                    }else {
                        echo "0";
                    }

                    ?>
                    <i class="fa fa-percent"></i>
                </div>
                <div class="text-right">
                    <!--<a href="#">View Details <i class="fa fa-arrow-circle-right"></i></a>-->
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> A Concluir</h3>
            </div>
            <div class="panel-body">
                <div class="divValor">
                    <? if($vendasMes){
                        $faltaMeta = 32000 - $vendasMes;
                        if ($faltaMeta < 0) {
                            echo "100%";
                        }else {
                            echo formataMoeda($faltaMeta);
                        }
                    }
                    ?>
                </div>
                <div class="text-right">
                    <!--<a href="#">View Details <i class="fa fa-arrow-circle-right"></i></a>-->
                </div>
            </div>
        </div>
    </div>
</div><!-- /.row -->
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-bar-chart fa-fw"></i> Top 10 - Contadores</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Pos.</th>
                            <th>Nome</th>
                            <th>Valor</th>
                        </tr>
                        </thead>
                        <tbody>
                        <? if($campanhaContadores) {?>
                            <? foreach ($campanhaContadores as $key=>$campanhaContadores) {  $qtde2++;?>
                                <tr <?=corLinhaTabela($key)?>>
                                    <td width="2%" ><?=$qtde2."o";?></td>
                                    <td width="30%" ><?=$campanhaContadores['nome'];?></td>
                                    <td width="5%" ><?=formataMoeda($campanhaContadores['Total']);?></td>
                                </tr>
                            <? }?>
                        <? }?>
                        </tbody>
                    </table>
                </div>
                <!--<div class="text-right">
                    <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                </div>-->
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-bar-chart fa-fw"></i> Top 10 - Vendedores</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Pos.</th>
                            <th>Nome</th>
                            <th>Valor</th>
                        </tr>
                        </thead>
                        <tbody>
                        <? foreach ($campanhaVendas as $key=>$campanhaVenda) {  $qtde++;?>
                            <tr <?=corLinhaTabela($key)?> >
                                <td width="10" ><?=$qtde."o";?></td>
                                <td width="167" ><img src="<?=$campanhaVenda['foto_avatar']?>" class="fotoAvatar"> <?=$campanhaVenda['nome'];?></td>
                                <td width="116" align="right"><?=formataMoeda($campanhaVenda['vendas']);?></td>
                            </tr>
                        <? }?>
                        </tbody>
                    </table>
                </div>
                <!--<div class="text-right">
                    <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                </div>-->
            </div>
        </div>
    </div>
</div> <!-- /.row -->

<script>
    $(document).ready(function () {
        carregarFiltrosCertificados();
        carregarGraficoRenovacoes();
        carregarGraficosPedidos('sim');
    });
</script>