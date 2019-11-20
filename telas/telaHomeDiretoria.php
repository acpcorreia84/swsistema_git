<?php
/**
 * Created by Antonio Correia.
 * Date: 27/10/2016
 * Time: 06:36
 */
?>
<script>var chart;</script>
<div id="log"></div>

<!--PAINEL ITENS FATURAMENTO GERAL-->
<div class="row">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-bar-chart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="valor" id="somaCertificadosDia"><?
                            echo formataMoeda( $somaCertificadosDia);
                            ?></div>
                        <div><?=$nomeBox2;?></div>
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
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="valor" id="somaCertificadosFaturados"><?
                            echo formataMoeda($somaCertificadosAutorizados+$somaCertificadosNaoAutorizados);
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
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="valor" id="somaCertificadosAbertos"><?
                            echo formataMoeda($somaCertificadosAbertos);
                            ?></div>
                        <div><?=$nomeBox3;?></div>
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
</div><!-- /.row -->

<!--
QUADRO DE INDICADORES
-->
<div class="panel panel-success">
    <div class="panel-heading">
        <h4><i class="fa fa-line-chart" aria-hidden="true"></i> 1.Indicadores <span title="Abrir Filtros" class="maisOpcoes" data-toggle="collapse" data-target="#divFiltrosIndicadores" onclick="carregarFiltrosCertificados(); carregarGraficoRenovacoes(); carregarGraficosPedidos('nao');"> <i class="fa fa-bars"></i></span></h4>
    </div>
    <div class="panel-body">
        <?php include 'inc/filtros/filtroHomeGraficosDiretoria.php';?>




    </div>
</div>

<!--
FIM DO QUADRO DE INDICADORES
-->


<script>
    $('document').ready(function(){
        $('#accordion').collapse({
            toggle: true
        })
    })
</script>

<!--INICIO MENU SANFONA GRAFICOS-->

<div class="panel-group" id="accordion">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="panel-body">
                <a data-toggle="collapse"  href="#collapse1">
                    <i class="fa fa-area-chart fa-6" aria-hidden="true"> M&ecirc;s Atual x Anterior</i></a>
            </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse">

                    <!-- FILTRO ITENS E GRAFICOS DE FATURAMENTO GERAL-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <input type='text' class="datepicker-here" data-position="right top" id="datap"/>
                                    <script>
                                        // Initialization
                                        $('#datap').datepicker({language:"pt-BR", range:'true', date:'20/10/2016'});
                                        // Access instance of plugin
                                        var dataPk = $('#datap').data('datepicker');
                                        //dataPk.update('minDate', new Date());

                                        dataAtual = new Date();
                                        function ResetaData() {
                                            dataPk.selectDate([new Date(dataAtual.getFullYear(),dataAtual.getMonth(),'01'), new Date(dataAtual.getFullYear(),dataAtual.getMonth(),<?=getLastDayOfMonth(date('m'),date('Y'));?>)]);
                                        }
                                        ResetaData();
                                    </script>

                                    <button id="btnCarregaGrafico" onclick="data = $('#datap').val().split(','); mudar_grafico_diretoria('atualizarGraficoDiretoria', data[0], data[1]); mudar_dados_faturamento('atualizarDadosFaturamento', data[0], data[1]);">Carrega Dados</button>
                                    <button id="btnResetar" onclick="dataPk.selectDate(); mudar_grafico_diretoria('atualizarGraficoDiretoria'); mudar_dados_faturamento('atualizarDadosFaturamento'); ">Resetar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FIM DE FILTRO DE ITENS E GRAFICO DE FATURAMENTO GERAL -->

                    <!-- INICIO PAINEL GRAFICO FATURAMENTO GERAL-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-line-chart fa-fw"></i> Faturamento atual x m&ecirc;s anterior</h3>
                                </div>
                                <div class="panel-body">
                                    <div id="curvechart"></div>
                                </div>
                                <div id="grafico_google"></div>
                            </div>
                        </div>
                    </div><!-- /.row -->
                    <!-- FIM PAINEL GRAFICO FATURAMENTO GERAL-->


        </div>
    </div>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="panel-body">
                <a data-toggle="collapse"  href="#collapse2">
                    <i class="fa fa-bar-chart fa-2" aria-hidden="true"> Vendedores da &Aacute;rea (no semestre)</i></a>
            </h4>
        </div>
        <div id="collapse2" class="panel-collapse collapse">

                    <!--INICIO PAINEL GRAFICO DE VENDEDORES-->
                    <div class="row" id="filtroVendedores">

                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <select name="edLocal" id="edLocal" class="col-lg-3" onchange="carregaSelectVendedores('carregaSelectVendedores', this);">
                                        <option value="" selected>Selecione a Localidade</option>
                                        <? foreach ($locais as $local) { ?>
                                            <option value="<?=$local->getId()?>" <? if ($_GET['edVendedor'] == $local->getId()) echo 'selected="selected"'?>>
                                                <?=utf8_encode($local->getNome());?>
                                            </option>
                                        <? }?>
                                    </select>

                                    <div id="selectVendedores" class="col-lg-3" ></div>
                                    <div id="btnAtualiza" class="col-lg-3"></div>
                                    <input type="hidden" id="vendedores" />
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12" id="graficoVendedores">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-line-chart fa-fw"></i> Faturamento Semestral dos Vendedores </h3>
                                </div>

                                <div class="panel-body">

                                    <div id="chart_div" ></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--FIM PAINEL GRAFICO DE VENDEDORES-->


        </div>
    </div>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="panel-body">
                <a data-toggle="collapse"  href="#collapse3">
                    <i class="fa fa-calendar-check-o fa-2" aria-hidden="true"> Total Anual x Localidade</i></a>
            </h4>
        </div>
        <div id="collapse3" class="panel-collapse collapse">
            <!-- FILTRO ITENS E GRAFICOS DE FATURAMENTO GERAL-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">

                            <select name="edLocalAnual" id="edLocalAnual" class="col-lg-3" >
                                <option value="" selected>Selecione a Localidade</option>
                                <? foreach ($locais as $local) { ?>
                                    <option value="<?=$local->getId()?>" <? if ($_GET['edVendedor'] == $local->getId()) echo 'selected="selected"'?>>
                                        <?=utf8_encode($local->getNome())?>
                                    </option>
                                <? }?>
                            </select>

                            <button id="btnCarregaFaturamentoAnual" onclick="atualizaFaturamentoAnualLocais('atualizaFaturamentoAnualLocais',$('#edLocalAnual').val());">Anual da Localidade</button>
                            <button id="btnResetarAnual" onclick="atualizaFaturamentoAnualLocais('atualizaFaturamentoAnualLocais');">Geral Anual</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIM DE FILTRO DE ITENS E GRAFICO DE FATURAMENTO GERAL -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-line-chart fa-fw"></i> Faturamento Anual por Localidade</h3>
                        </div>
                        <div class="panel-body">
                            <div id="grafico_linha"></div>
                        </div>
                        <div id="script_grafico_google"></div>
                    </div>
                </div>
            </div><!-- /.row -->
            <!-- FIM PAINEL GRAFICO FATURAMENTO GERAL-->


        </div>
    </div>

</div>

<!--FIM MENU SANFONA GRAFICOS-->


<!-- INICIO TOPS -->
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-trophy" aria-hidden="true"></i> Top 10 - Contadores</h3>
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
                <h3 class="panel-title"><i class="fa fa-trophy" aria-hidden="true"></i> Top 10 - Vendedores</h3>
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

<!--FIM TOPS-->
