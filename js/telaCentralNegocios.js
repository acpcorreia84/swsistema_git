var msnPadrao = 'Entre em contato com o administrador do sistema';

var pageUrl = 'funcoes/funcoesCentralNegocios.php';

function carregarNegocios() {

    $('#totalCertificadosUrgentes').html('carregando...');
    $('#totalCertificadosUrgentesComFeedback').html('carregando...');
    $('#totalLost').html('carregando...');

    var dadosajax = {
        'funcao' : "carregar_central_negocios",
        'tipoNegocios': $('#tipoNegocios').val()
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
                //console.log(result);
                var resultado = JSON.parse(result);
                //console.log(resultado.quantidadeTotalUrgentes,resultado.quantidadeTotalUrgentesComFeedback);

                //var quantidadeCertificadosTotal = JSON.parse(resultado.quantidadeCertificadosTotal);
                if (resultado.mensagem == 'Ok') {
                    montarTabelaDinamica(resultado.colunas, resultado.negocios, 'tabelaNegocios', 'divTabelaNegocios');
                    $('#totalCertificadosUrgentes').html(resultado.somaTotalUrgentes + ' (' + resultado.quantidadeTotalUrgentes + ')');
                    $('#totalCertificadosUrgentesComFeedback').html(resultado.somaTotalUrgentesComFeedback + ' (' +resultado.quantidadeTotalUrgentesComFeedback+ ')');
                    $('#totalLost').html(resultado.somaLost + ' (' +resultado.qtdLost + ')');
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
