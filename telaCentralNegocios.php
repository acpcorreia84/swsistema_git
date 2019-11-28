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

                <div class="row">

                        <!--QUADROS RESUMO: PAGOS, EM ABERTO-->

                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-red">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-exclamation fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div id="totalCertificadosUrgentes">carregando...</div>
                                                <div>Urgentes</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" onclick="$('#tipoNegocios').val('Urgentes'); $('#tipoNegociosLegendas').html('Urgentes'); carregarNegocios();">
                                        <div class="panel-footer">
                                            <span class="pull-left">Detalhes</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-danger">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-times fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div id="totalCertificadosUrgentesComFeedback">carregando...</div>
                                                <div>Urgentes <br/>(com feedback)</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" onclick="$('#tipoNegocios').val('UrgentesFollowUp'); $('#tipoNegociosLegendas').html('Urgentes com Followup'); carregarNegocios();">
                                        <div class="panel-footer" >
                                            <span class="pull-left">Detalhes</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-warning">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa fa-thumbs-o-down fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div id="totalLost">carregando...</div>
                                                <div>Perdidos</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" onclick="$('#tipoNegocios').val('Perdidos'); $('#tipoNegociosLegendas').html('Perdidos');  carregarNegocios();">
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

                <hr/>
                    <!---->
                <div class="row" >
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Certificados <b id="tipoNegociosLegendas">Urgentes</b> <!--| Legenda: <i class="fa fa-square text-primary"></i> Em aberto | <i class="fa fa-square text-success"></i> Renovação  | <i class="fa fa-square text-danger"></i> Recarteirizado-->
                            </div><!-- PANEL HEADING -->

                            <div class="panel-body">

                                <div class="table table-responsive" id="divTabelaNegocios"></div>
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
    carregarNegocios();
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