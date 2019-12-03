var msnPadrao = 'Entre em contato com o administrador do sistema';

var pageUrl = 'funcoes/funcoesCentralNegocios.php';

function carregarNegocios() {

    if ((typeof window['filtroUsuariosNegocios'] !== 'undefined') && (Array.isArray(window['filtroUsuariosNegocios'])))
        consultores = window['filtroUsuariosNegocios'];
    else
        consultores = '';

    /*NOME E CAMPO DE FILTRO POR (IGUAL A)*/
    nomeCampoFiltro = '';
    valorCampoFiltro = '';
    if (($('#tipo_filtro').val()) && ($('#filtro_pesquisa_por').val())) {
        nomeCampoFiltro = $('#tipo_filtro').val();
        valorCampoFiltro = $('#filtro_pesquisa_por').val();
    }

    camposFiltro = {};
    camposFiltro[nomeCampoFiltro] = valorCampoFiltro;

    var filtros = {
        'filtroConsultores':consultores,
        'campoFiltro' : camposFiltro
    };
    $('#txtDataNegocios').html('carregando...');
    if ($('#tipoNegocios').val() == 'Perdidos')
        $('#totalLost').html('carregando...');
    else {
        $('#totalCertificadosUrgentes').html('carregando...');
        $('#totalCertificadosUrgentesComFeedback').html('carregando...');
    }


    var dadosajax = {
        'funcao' : "carregar_central_negocios",
        'tipoNegocios': $('#tipoNegocios').val(),
        'filtros': filtros

    };

    $.ajax ({
        beforeSend: function () {
            /*CHAMA A TELA QUE CARREGA O FILTRO DE USUARIOS*/
            $('#divTabelaNegocios').html('<i class="fa fa-5x fa-circle-o-notch fa-spin text-info"></i>').css({'text-align':'center'});
        },
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error NG1001 - Erro na a&ccedil;&atilde;o de carregar os Neg&oacute;cios,' + msnPadrao + '.');
        },
        success : function(result){
            try {
                console.log(result);
                var resultado = JSON.parse(result);

                $('#txtDataNegocios').html(resultado.dataAte + ' at&eacute; ' + resultado.dataDe);
                //console.log(resultado.quantidadeTotalUrgentes,resultado.quantidadeTotalUrgentesComFeedback);

                //var quantidadeCertificadosTotal = JSON.parse(resultado.quantidadeCertificadosTotal);
                if (resultado.mensagem == 'Ok') {
                    montarTabelaDinamica(resultado.colunas, resultado.negocios, 'tabelaNegocios', 'divTabelaNegocios');

                    if (resultado.tipoNegocio == 'Perdidos')
                        $('#totalLost').html(resultado.somaLost + ' (' +resultado.qtdLost + ')');
                    else {
                        $('#totalCertificadosUrgentes').html(resultado.somaTotalUrgentes + ' (' + resultado.quantidadeTotalUrgentes + ')');
                        $('#totalCertificadosUrgentesComFeedback').html(resultado.somaTotalUrgentesComFeedback + ' (' +resultado.quantidadeTotalUrgentesComFeedback+ ')');
                    }
                    $('#divContatosPopOver').html(resultado.htmlContatosPopOver);
                }
            } catch (e) {
                console.log(result, e);
                alertErro ('Error CD1002 - Erro ao carregar dados dos neg&oacute;cios,' + msnPadrao + '.');
            }
        },
        complete : function ( ) {


        }

    });
}

function informarFeedbackNegocio() {
    var dadosajax = {
        'funcao' : "informar_feedback_negocio",
        'tipoFeedback': $('#opcaoFeedback').val(),
        'selectFeedback': $('#selectFeedback').val(),
        'selectLost': $('#selectLost').val(),
        'edtFeedbackCd': $('#edtFeedbackCd').val(),
        'certificadoId': $('#cnSpanCodigoCertificado').html()
    };
    console.log($('#selectLost').val(),$('#selectFeedback').val());
    $('#mensagemLoading').html('<i class="fa fa-user-circle-o"></i> Gravando o feedback do neg&oacute;cio');
    $("#modalCarregando").modal('show');

    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error NG1002 - Erro na a&ccedil;&atilde;o de gravar feedback,' + msnPadrao + '.');
        },
        success : function(result){
            try {
                $("#modalCarregando").modal('hide');
                //console.log(result);
                var resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {
                    $("#modalInserirFeedbackCertificado").modal('hide');
                    $('#selectLost').val('');
                    $('#edtFeedbackCd').val('');
                    $('#edtFeedbackCd').val('');
                    alertSucesso('Informa&ccedil;&atilde;o salva com sucesso!');

                }
            } catch (e) {
                console.log(result, e);
                alertErro ('Error CD1003 - o de gravar feedback,' + msnPadrao + '.');
            }
        },
        complete : function ( ) {
            carregarNegocios();
        }

    });
}

function carregarInformacoesNegocio (certificadoId) {
    var dadosajax = {
        'funcao' : "carregar_informacoes_negocio",
        'certificadoId': certificadoId
    };
    $('#mensagemLoading').html('<i class="fa fa-user-circle-o"></i> Carregando informa&ccedil;&otilde;es do neg&oacute;cio');
    $("#modalCarregando").modal('show');

    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error NG1015 - Erro na carregar as informacoes do negocio,' + msnPadrao + '.');
        },
        success : function(result){
            try {
                $("#modalCarregando").modal('hide');
                //console.log(result);
                var resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {
                    /*
                   * DADOS DA SITUACAO
                   * */
                    if (resultado.mensagem == 'Ok') {
                        montarTabelaDinamica(resultado.colunas, resultado.situacoes, 'tabelaSituacoesNegocios', 'divTabelaSituacoesNegocios');
                    }
                }
            } catch (e) {
                console.log(result, e);
                alertErro ('Error NG1016 - Erro na carregar as informacoes do negocio,' + msnPadrao + '.');
            }
        },
        complete : function ( ) {

        }

    });
}


function carregarFiltrosNegocios() {

    var dadosajax = {
        'funcao' : "carregar_filtros_negocios",
    };

    $('#divFiltroConsultoresNegocios').html('<i class="fa fa-circle-o-notch fa-spin text-info"></i>').css({'text-align':'center'});


    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,

        error : function (){
            alert ('Error NG2016 - Erro ao carregar os filtros dos negocios!' + msnPadrao + '.');
            $("#modalCarregando").modal('hide');
        },
        success : function(result){
            try {

                var resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {
                    montarSelectMultiplo('filtroUsuariosNegocios', resultado.usuarios, 'divFiltroConsultoresNegocios', '', 'divNegociosUsuariosCertificados');
                }
            } catch (e){
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro ('Error NG2016 - Erro ao carregar os filtros dos negocios!,' + msnPadrao + ' '+e + '.');

            }
        }
    });
}