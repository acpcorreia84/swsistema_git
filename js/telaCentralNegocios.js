var msnPadrao = 'Entre em contato com o administrador do sistema';

var pageUrl = 'funcoes/funcoesCentralNegocios.php';

function carregarNumerosNegocios() {
    var consultores;
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

    $('#totalCertificadosCvp').html('carregando...');
    $('#totalCertificadosRecuperacao').html('carregando...');
    $('#totalCertificadosUrgentes').html('carregando...');
    $('#totalCertificadosUrgentesComFeedback').html('carregando...');
    $('#totalCertificadosCvp').html('carregando...');
    $('#totalCertificadosRecuperacao').html('carregando...');

    $('#totalPedidos').html('carregando...');
    $('#totalRenovacoes').html('carregando...');

    var dadosajax = {
        'funcao' : "carregar_numeros_central_negocios",
        'filtros': filtros,
    };

    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error NG1010 - Erro na a&ccedil;&atilde;o de carregar os numeros dos Neg&oacute;cios,' + msnPadrao + '.');
        },
        success : function(result){
            console.log(result);
            try {
                console.log('carregando numeros...');
                var resultado = JSON.parse(result);

                $('#totalCertificadosUrgentes').html(' (' + resultado.qtdSemFeedBack + ')');
                $('#totalCertificadosUrgentesComFeedback').html(' (' + resultado.qtdComFeedBack + ')');
                $('#totalCertificadosCvp').html(resultado.qtdCvp);
                $('#totalCertificadosRecuperacao').html(resultado.qtdRecuperados);

            } catch (e) {
                console.log(result, e);
                alertErro ('Error NG1011 - Erro ao carregar numeros dos neg&oacute;cios,' + msnPadrao + '.');
            }
        },
        complete : function ( ) {


        }

    });
}

function carregarNegociosRecuperacao(paginaSelecionada, qtdItensPorPagina, paginando, carregarDivPaginacao) {

    /*INICIALIZA SE NAO PASSAR PARAMETRO SETA 0*/
    if (paginaSelecionada === undefined)
        var pagina = 0;
    else
        var pagina = paginaSelecionada;

    console.log('pagina selecionada:'+pagina);

    /*INICIALIZA SE NAO PASSAR PARAMETRO SETA 20 ITENS POR PAGINA POR PADRAO*/
    if (qtdItensPorPagina === undefined)
        var qtdItens = 30;
    else
        var qtdItens = qtdItensPorPagina;

    if (carregarDivPaginacao !== undefined)
        var carregarPaginacao = carregarDivPaginacao;
    else
        var carregarPaginacao = '';

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

    var dadosajax = {
        'funcao' : "carregar_negocios_recuperacao",
        'filtros': filtros,
        'pagina' : pagina,
        'itensPorPagina' : qtdItens
    };

    $.ajax ({
        beforeSend: function () {
            $('#divTabelaNegocios').html('<i class="fa fa-5x fa-circle-o-notch fa-spin text-info"></i>').css({'text-align':'center'});
        },
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error NG3201 - Erro na a&ccedil;&atilde;o de carregar os Neg&oacute;cios sem feedback,' + msnPadrao + '.');
        },
        success : function(result){
            try {
                //console.log(result);
                var resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {
                    $('#txtDataNegocios').html(resultado.dataAte + ' at&eacute; ' + resultado.dataDe);
                    if (carregarPaginacao)
                        mostrar_paginacao(resultado.quantidadeTotal, qtdItens, carregarNegociosComFeedback, 'divPaginacaoNegociosRecuperacaoTopo', 'divPaginacaoNegociosRecuperacaoRodape');

                    montarTabelaDinamica(resultado.colunas, resultado.negocios, 'tabelaNegocios', 'divTabelaNegocios');

                    $('#divContatosPopOver').html(resultado.htmlContatosPopOver);
                }
            } catch (e) {
                console.log(result, e);
                alertErro ('Error CDN2932 - Erro ao carregar dados dos neg&oacute;cios sem feedback,' + msnPadrao + '.');
            }
        },
        complete : function ( ) {


        }

    });
}

function carregarNegociosSemFeedback(paginaSelecionada, qtdItensPorPagina, paginando, carregarDivPaginacao) {

    /*INICIALIZA SE NAO PASSAR PARAMETRO SETA 0*/
    if (paginaSelecionada === undefined)
        var pagina = 0;
    else
        var pagina = paginaSelecionada;

    console.log('pagina selecionada:'+pagina);

    /*INICIALIZA SE NAO PASSAR PARAMETRO SETA 20 ITENS POR PAGINA POR PADRAO*/
    if (qtdItensPorPagina === undefined)
        var qtdItens = 30;
    else
        var qtdItens = qtdItensPorPagina;

    if (carregarDivPaginacao !== undefined)
        var carregarPaginacao = carregarDivPaginacao;
    else
        var carregarPaginacao = '';

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

    var dadosajax = {
        'funcao' : "carregar_negocios_sem_feedback",
        'filtros': filtros,
        'pagina' : pagina,
        'itensPorPagina' : qtdItens
    };

    $.ajax ({
        beforeSend: function () {
            $('#divTabelaNegocios').html('<i class="fa fa-5x fa-circle-o-notch fa-spin text-info"></i>').css({'text-align':'center'});
        },
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error NG3201 - Erro na a&ccedil;&atilde;o de carregar os Neg&oacute;cios sem feedback,' + msnPadrao + '.');
        },
        success : function(result){
            try {
                //console.log(result);
                var resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {
                    $('#txtDataNegocios').html(resultado.dataAte + ' at&eacute; ' + resultado.dataDe);
                    if (carregarPaginacao)
                        mostrar_paginacao(resultado.quantidadeTotalUrgentes, qtdItens, carregarNegociosSemFeedback, 'divPaginacaoNegociosSemFeedbackTopo', 'divPaginacaoNegociosSemFeedbackRodape');
                    montarTabelaDinamica(resultado.colunas, resultado.negocios, 'tabelaNegocios', 'divTabelaNegocios');

                    $('#divContatosPopOver').html(resultado.htmlContatosPopOver);
                }
            } catch (e) {
                console.log(result, e);
                alertErro ('Error CDN2932 - Erro ao carregar dados dos neg&oacute;cios sem feedback,' + msnPadrao + '.');
            }
        },
        complete : function ( ) {


        }

    });
}

function carregarNegociosComFeedback(paginaSelecionada, qtdItensPorPagina, paginando, carregarDivPaginacao) {

    /*INICIALIZA SE NAO PASSAR PARAMETRO SETA 0*/
    if (paginaSelecionada === undefined)
        var pagina = 0;
    else
        var pagina = paginaSelecionada;

    console.log('pagina selecionada:'+pagina);

    /*INICIALIZA SE NAO PASSAR PARAMETRO SETA 20 ITENS POR PAGINA POR PADRAO*/
    if (qtdItensPorPagina === undefined)
        var qtdItens = 30;
    else
        var qtdItens = qtdItensPorPagina;

    if (carregarDivPaginacao !== undefined)
        var carregarPaginacao = carregarDivPaginacao;
    else
        var carregarPaginacao = '';

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

    var dadosajax = {
        'funcao' : "carregar_negocios_com_feedback",
        'filtros': filtros,
        'pagina' : pagina,
        'itensPorPagina' : qtdItens
    };

    $.ajax ({
        beforeSend: function () {
            $('#divTabelaNegocios').html('<i class="fa fa-5x fa-circle-o-notch fa-spin text-info"></i>').css({'text-align':'center'});
        },
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error NG3201 - Erro na a&ccedil;&atilde;o de carregar os Neg&oacute;cios sem feedback,' + msnPadrao + '.');
        },
        success : function(result){
            try {
                //console.log(result);
                var resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {
                    $('#txtDataNegocios').html(resultado.dataAte + ' at&eacute; ' + resultado.dataDe);
                    if (carregarPaginacao)
                        mostrar_paginacao(resultado.quantidadeTotal, qtdItens, carregarNegociosComFeedback, 'divPaginacaoNegociosComFeedbackTopo', 'divPaginacaoNegociosComFeedbackRodape');

                    montarTabelaDinamica(resultado.colunas, resultado.negocios, 'tabelaNegocios', 'divTabelaNegocios');

                    $('#divContatosPopOver').html(resultado.htmlContatosPopOver);
                }
            } catch (e) {
                console.log(result, e);
                alertErro ('Error CDN2932 - Erro ao carregar dados dos neg&oacute;cios sem feedback,' + msnPadrao + '.');
            }
        },
        complete : function ( ) {


        }

    });
}

function carregarNegociosCVP(paginaSelecionada, qtdItensPorPagina, paginando, carregarDivPaginacao) {

    /*INICIALIZA SE NAO PASSAR PARAMETRO SETA 0*/
    if (paginaSelecionada === undefined)
        var pagina = 0;
    else
        var pagina = paginaSelecionada;

    console.log('pagina selecionada:'+pagina);

    /*INICIALIZA SE NAO PASSAR PARAMETRO SETA 20 ITENS POR PAGINA POR PADRAO*/
    if (qtdItensPorPagina === undefined)
        var qtdItens = 30;
    else
        var qtdItens = qtdItensPorPagina;

    if (carregarDivPaginacao !== undefined)
        var carregarPaginacao = carregarDivPaginacao;
    else
        var carregarPaginacao = '';

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

    var dadosajax = {
        'funcao' : "carregar_negocios_cvp",
        'filtros': filtros,
        'pagina' : pagina,
        'itensPorPagina' : qtdItens
    };

    $.ajax ({
        beforeSend: function () {
            $('#divTabelaNegocios').html('<i class="fa fa-5x fa-circle-o-notch fa-spin text-info"></i>').css({'text-align':'center'});
        },
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error NG4201 - Erro na a&ccedil;&atilde;o de carregar os Neg&oacute;cios sem feedback,' + msnPadrao + '.');
        },
        success : function(result){
            try {
                //console.log(result);
                var resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {
                    $('#txtDataNegocios').html(resultado.dataAte + ' at&eacute; ' + resultado.dataDe);
                    if (carregarPaginacao)
                        mostrar_paginacao(resultado.quantidadeTotal, qtdItens, carregarNegociosComFeedback, 'divPaginacaoNegociosComFeedbackTopo', 'divPaginacaoNegociosComFeedbackRodape');

                    montarTabelaDinamica(resultado.colunas, resultado.negocios, 'tabelaNegocios', 'divTabelaNegocios');

                    $('#divContatosPopOver').html(resultado.htmlContatosPopOver);
                }
            } catch (e) {
                console.log(result, e);
                alertErro ('Error CDN4932 - Erro ao carregar dados dos neg&oacute;cios sem feedback,' + msnPadrao + '.');
            }
        },
        complete : function ( ) {


        }

    });
}

function carregarNegocios(paginaSelecionada, qtdItensPorPagina, paginando, carregarDivPaginacao) {

    /*INICIALIZA SE NAO PASSAR PARAMETRO SETA 0*/
    if (paginaSelecionada === undefined)
        var pagina = 0;
    else
        var pagina = paginaSelecionada;

    /*INICIALIZA SE NAO PASSAR PARAMETRO SETA 20 ITENS POR PAGINA POR PADRAO*/
    if (qtdItensPorPagina === undefined)
        var qtdItens = 30;
    else
        var qtdItens = qtdItensPorPagina;

    if (carregarDivPaginacao !== undefined)
        var carregarPaginacao = carregarDivPaginacao;
    else
        var carregarPaginacao = '';

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

    if ($('#tipoNegocios').val() == 'Perdidos' || $('#tipoNegocios').val() == 'Recuperacao') {
        $('#totalCertificadosCvp').html('carregando...');
        $('#totalCertificadosRecuperacao').html('carregando...');
    }
    else {
        $('#totalCertificadosUrgentes').html('carregando...');
        $('#totalCertificadosUrgentesComFeedback').html('carregando...');
        $('#totalCertificadosCvp').html('carregando...');
        $('#totalCertificadosRecuperacao').html('carregando...');
    }
    $('#totalPedidos').html('carregando...');
    $('#totalRenovacoes').html('carregando...');

    var dadosajax = {
        'funcao' : "carregar_central_negocios",
        'tipoNegocios': $('#tipoNegocios').val(),
        'filtros': filtros,
        'pagina' : pagina,
        'itensPorPagina' : qtdItens
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

                $('#txtDataNegocios').html(resultado.dataAte + ' at&eacute; ' + resultado.dataDe);
                //console.log(resultado.quantidadeTotalUrgentes,resultado.quantidadeTotalUrgentesComFeedback);

                //var quantidadeCertificadosTotal = JSON.parse(resultado.quantidadeCertificadosTotal);
                if (resultado.mensagem == 'Ok') {
                    montarTabelaDinamica(resultado.colunas, resultado.negocios, 'tabelaNegocios', 'divTabelaNegocios');
                    var totaisQtds = JSON.parse(resultado.totaisPedidoRenovacao);
                    if ($('#tipoNegocios').val() == 'Perdidos' || $('#tipoNegocios').val() == 'Recuperacao') {
                        $('#totalCertificadosCvp').html(resultado.countCvp20d);
                        $('#totalCertificadosRecuperacao').html(resultado.countRecuperacao20d);
                        if ($('#tipoNegocios').val() == 'Perdidos') {
                            $('#totalPedidos').html(totaisQtds.cvp.totalPedido + ' (' + totaisQtds.cvp.qtdPedido + ')');
                            $('#totalRenovacoes').html(totaisQtds.cvp.totalRenovacao + ' (' + totaisQtds.cvp.qtdRenovacao + ')');
                        }
                        else if ($('#tipoNegocios').val() == 'Recuperacao') {
                            $('#totalPedidos').html(totaisQtds.recuperacao.totalPedido + ' (' + totaisQtds.recuperacao.qtdPedido + ')');
                            $('#totalRenovacoes').html(totaisQtds.recuperacao.totalRenovacao + ' (' + totaisQtds.recuperacao.qtdRenovacao + ')');
                        }
                    }
                    else {
                        $('#totalCertificadosUrgentes').html(resultado.somaTotalUrgentes + ' (' + resultado.quantidadeTotalUrgentes + ')');
                        $('#totalCertificadosUrgentesComFeedback').html(resultado.somaTotalUrgentesComFeedback + ' (' + resultado.quantidadeTotalUrgentesComFeedback + ')');
                        $('#totalCertificadosCvp').html(resultado.countCvp20d);
                        $('#totalCertificadosRecuperacao').html(resultado.countRecuperacao20d);

                        if ($('#tipoNegocios').val() == 'Urgentes') {
                            $('#totalPedidos').html(totaisQtds.urgenteSemFeedback.totalPedido + ' (' + totaisQtds.urgenteSemFeedback.qtdPedido + ')');
                            $('#totalRenovacoes').html(totaisQtds.urgenteSemFeedback.totalRenovacao + ' (' + totaisQtds.urgenteSemFeedback.qtdRenovacao + ')');
                        }
                        else if ($('#tipoNegocios').val() == 'UrgentesFollowUp') {
                            $('#totalPedidos').html(totaisQtds.urgenteFeedback.totalPedido + ' (' + totaisQtds.urgenteFeedback.qtdPedido + ')');
                            $('#totalRenovacoes').html(totaisQtds.urgenteFeedback.totalRenovacao + ' (' + totaisQtds.urgenteFeedback.qtdRenovacao + ')');
                        }

                    }

                    /*$('#totalPedidos').html(resultado.totaisPedidoRenovacao + ' (' + resultado.totaisPedidoRenovacao + ')');
                    $('#totalRenovacoes').html(resultado.totalRenovacao + ' (' + resultado.qtdRenovacao + ')');*/

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
        'certificadoId': $('#cnSpanCodigoCertificado').html(),
        'tipoNegocio': $('#tipoNegocios').val(),
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

function reativarNegocio(certificadoId) {
    var dadosajax = {
        'funcao' : "reativar_negocio",
        'certificadoId': certificadoId
    };

    $('#mensagemLoading').html('<i class="fa fa-user-circle-o"></i> Reativando o neg&oacute;cio...');
    $("#modalCarregando").modal('show');

    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error NG1902 - Erro na a&ccedil;&atilde;o de reativar o negocio,' + msnPadrao + '.');
        },
        success : function(result){
            try {
                $("#modalCarregando").modal('hide');

                var resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {
                    alertSucesso('Neg&oacute;cio reativado com sucesso');

                }
            } catch (e) {
                console.log(result, e);
                alertErro ('Error NG1923 - ao tentar reativar o negocio,' + msnPadrao + '.');
            }
        },
        complete : function ( ) {
            carregarNegocios();
        }

    });
}