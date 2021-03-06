<? /**  * Created by PhpStorm. * User: Lincoln  * Date: 19/09/2016  * Time: 14:43  */
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';
include 'header.php';
include 'inc/script.php';
?>
<body>

<script>
    $(document).ready(function() {
        $('#optFeedback1').prop('checked', true);

        $('#optFeedback1').click(function () {
            $('#tituloFeedback').html('<i class="fa fa-commenting-o"></i> Inserir Feedback para o neg&oacute;cio');
            $('#legendaFeedback').html('Ao inserir o feedback, voc&ecirc; resolve temporariamente a situa&ccedil;&atilde;o do cliente. E coloca ele para o final da fila. Lembrando que esta a&ccedil;&atilde;o s&oacute; poder&aacute; ser executada por duas vezes. ');
            $('#opcaoFeedback').val('feedback');

            $("#panelLost").css('visibility','invisible');
            $('#panelLost').css('display','none');

            $("#panelFeedback").css('visibility','visible');
            $('#panelFeedback').css('display','block');
        });

        $('#optFeedback2').click(function () {
            $('#tituloFeedback').html('<i class="fa fa-thumbs-down"></i> Inserir motivo de perda do neg&oacute;cio');
            $('#legendaFeedback').html('Ao inserir o motivo de perda, automaticamente voc&ecirc; elimina da tela de urg&ucirc;ncias este neg&oacute;cio.');
            $('#opcaoFeedback').val('lost');

            $("#panelFeedback").css('visibility','invisible');
            $('#panelFeedback').css('display','none');

            $("#panelLost").css('visibility','visible');
            $('#panelLost').css('display','block');

        });


        $("#frmFeedbackCd").validate({
            rules: {
                optFeedback: {
                    required:true
                },
                edtFeedbackCd: {
                    required:true
                },
                selectFeedback: {
                    required: function() {
                        return $('#opcaoFeedback').val()!='lost' || $('#selectFeedback').val() != ''
                    }
                },

                selectLost: {
                    required: function() {
                        return $('#opcaoFeedback').val()!='feedback' || $('#selectLost').val() != ''
                    }
                },
            },
            errorElement: "em",
            errorPlacement: function ( error, element ) {
                // Add the `help-block` class to the error element
                error.addClass( "help-block" );
                error.insertAfter( element );
            },
            highlight: function ( element, errorClass, validClass ) {
                $( element ).parents( ".campoValidar" ).addClass( "has-error" ).removeClass( "has-success" );
            },
            unhighlight: function (element, errorClass, validClass) {
                $( element ).parents( ".campoValidar" ).addClass( "has-success" ).removeClass( "has-error" );
            }
        });

        $('#btnSalvarFeedback').click(function () {

            if ($('#frmFeedbackCd').valid()) {
                console.log('salvando feedback');
                informarFeedbackNegocio();
            }
        });
    });
</script>
<input type="hidden" id="opcaoFeedback" name="opcaoFeedback" value="feedback"/>
<input type="hidden" id="tipoNegocios" name="tipoNegocios" value="Urgentes"/>
<div id="wrapper">
    <? include('inc/menu.php')?>
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row" style="margin-top:50px;">
                <h4 id="txtDataNegocios"></h4>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-filter" aria-hidden="true"></i> Filtros <a href="#"> <i class="fa fa-bars" id="btnFiltroCd" ></i></a>
                    </div>

                    <script>
                        $('#btnFiltroCd').click (function () {
                            var visivel  = $('#divFiltroNegocios').is(':visible');
                            if (visivel) {
                                $("#divFiltroNegocios").css({visibility: 'hidden', display: 'none'});
                            }

                            else {
                                $("#divFiltroNegocios").css({visibility: 'visible', display: 'block'});
                                carregarFiltrosNegocios();
                            };
                        });

                    </script>
                    <div class="panel-body oculto" id="divFiltroNegocios">
                        <div id="divFiltros"></div>
                        <? include 'inc/filtros/filtroCentralNegocios.php';?>
                    </div>
                </div>


                <div class="row">

                        <!--QUADROS RESUMO: PAGOS, EM ABERTO-->

                            <div class="col-lg-2 col-md-6">
                                <div class="panel" style="background-color: yellow">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-exclamation fa-4x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div id="totalCertificadosUrgentes">carregando...</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" onclick="$('#tipoNegocios').val('Urgentes'); $('#tipoNegociosLegendas').html('Urgentes'); carregarNegociosSemFeedback(undefined,undefined,undefined,'sim');">
                                        <div class="panel-footer">
                                            <span class="pull-left">Urgentes 7d</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-6">
                                <div class="panel " style="background-color: orange">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-times fa-4x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div id="totalCertificadosUrgentesComFeedback">carregando...</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" onclick="$('#tipoNegocios').val('UrgentesFollowUp'); $('#tipoNegociosLegendas').html('Urgentes com Followup'); carregarNegociosComFeedback(undefined,undefined,undefined,'sim');">
                                        <div class="panel-footer" >
                                            <span class="pull-left">Feedback +3d</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-6">
                                <div class="panel" style="background-color: #0a0a0a; color: #fff;">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fas fa-skull fa-4x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right" style="color: #fff;">
                                                <div id="totalCertificadosCvp" style="color: yellow; font-weight: bolder">carregando...</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" onclick="$('#tipoNegocios').val('Perdidos'); $('#tipoNegociosLegendas').html('Perdidos');  carregarNegociosCVP(undefined,undefined,undefined,'sim');">
                                        <div class="panel-footer">
                                            <span class="pull-left">CVP</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                    <div class="col-lg-2 col-md-6">
                        <div class="panel" style="background-color: darkgreen; color: #fff;">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fas fa-ambulance fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div id="totalCertificadosRecuperacao" style="color: #fff;">carregando...</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#" onclick="$('#tipoNegocios').val('Recuperacao'); $('#tipoNegociosLegendas').html('Recupera&ccedil;&atilde;o');  carregarNegociosRecuperacao(undefined,undefined,undefined,'sim');">
                                <div class="panel-footer">
                                    <span class="pull-left">Em recupera&ccedil;&atilde;o</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa fa-bar-chart fa-4x text-primary"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="text-primary">Gr&aacute;ficos</div>

                                    </div>
                                </div>
                            </div>
                            <a href="#" onclick="">
                                <div class="panel-footer">
                                    <span class="pull-left">Detalhes</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!--FIM DE QUADROS RESUMO: PAGOS, EM ABERTO-->

                </div>

                    <!--LISTA DE NEGOCIOS-->


                <div class="row" >
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Certificados <b id="tipoNegociosLegendas">Urgentes</b> | Legenda: <i class="fa fa-square" style="color: #0b2c89"></i> Pedido <span id="totalPedidos"></span> | <i class="fa fa-square text-success"></i> Renova&ccedil;&atilde;o <span id="totalRenovacoes"></span> | <i class="fa fa-square" style="color: purple"></i> Recarteiriza&ccedil;&atilde;o
                            </div><!-- PANEL HEADING -->

                            <div class="panel-body">
                                <script src="inc/paginator/jquery.twbsPagination.js" type="text/javascript"></script>
                                <ul class="paginacao pagination-sm"  ></ul>
                                <div class="table table-responsive" id="divTabelaNegocios"></div>
                                <ul class="paginacao" ></ul>

                                <div id="divContatosPopOver"></div>
                            </div><!-- PANEL BODY -->
                        </div><!-- panel default -->
                    </div><!-- COL LG 12 -->
                </div><!-- CLASS ROW -->


            </div><!--CONTAINER-FLUID-->
        </div><!--PAGE-WRAPPER-->
    </div><!-- WRAPPER -->
</div><!-- WRAPPER -->

<script>
    carregarNegociosSemFeedback(undefined,undefined,undefined,'sim');
    carregarNumerosNegocios();

</script>
<!-- MODAIS DA PAGINA-->
<div class="container">
    <?php require_once $_SERVER['DOCUMENT_ROOT']."/modais/certificados/modalCentralNegociosInserirFeedback.php";?>
    <?php require_once "modais/modalLoading.php";?>


</div> <!--DIV CLASS CONTAINER-->

<script>
    $(function () {
        $('[data-toggle="popover"]').popover()
    })

    $(function () {
        $('.example-popover').popover({
            container: 'body'
        })
    })
</script>
</body>
</html>