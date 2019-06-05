var msnPadrao = 'entre em contato com o administrador do sistema (3321-5061)';

var pageUrl = 'funcoes/funcoesContador.php';

function carregarContadoresRelatorioComissao(paginaSelecionada, qtdItensPorPagina, carregarDivPaginacao){

    if ((typeof window['filtroUsuariosCertificados'] !== 'undefined') && (Array.isArray(window['filtroUsuariosCertificados'])))
        consultores = window['filtroUsuariosCertificados'];
    else
        consultores = '';

    /*
    * TROCA A ACAO DO BOTAO DE FECHAR DENTRO DO MODAL DE DETALHAR CERTIFICADO PARA RECARREGAR A LISTAS DE CONTADORES
    * DO RELATORIO CORRETAMENTE
    * */
    $('#btnFecharBotaoDetalheContador').attr('onclick', "carregarContadoresRelatorioComissao($('.paginacao li.active').find('a').html());");

    /*INICIALIZA SE NAO PASSAR PARAMETRO SETA 0*/
    if (paginaSelecionada === undefined)
        var pagina = 0;
    else
        var pagina = paginaSelecionada;
    /*INICIALIZA SE NAO PASSAR PARAMETRO SETA 20 ITENS POR PAGINA POR PADRAO*/
    if (qtdItensPorPagina === undefined)
        var qtdItens = 50;
    else
        var qtdItens = qtdItensPorPagina;

    if (carregarDivPaginacao === 'sim')
        var carregarPaginacao = carregarDivPaginacao;
    else
        var carregarPaginacao = '';

    if ($('#filtroEscolheTemRegistro').prop('checked')) {
        var registrouComissao = $('#filtroChkTemRegistro').prop('checked');
    } else
        var registrouComissao = '';

    if ($('#filtroEscolheComissaoPaga').prop('checked')) {
        var somentePagos = $('#filtroChkComissaoPaga').prop('checked');
    } else
        var somentePagos = '';

    if ($('#filtroEscolhePossuiCartao').prop('checked')) {
        var possuiCartao = $('#filtroPossuiCartao').prop('checked');
    } else
        var possuiCartao = '';

    /*NOME E CAMPO DE FILTRO POR (IGUAL A)*/
    var nomeCampoFiltro = '';
    var valorCampoFiltro = '';
    if (($('#tipo_filtro').val()) && ($('#filtro_pesquisa_por').val())) {
        nomeCampoFiltro = $('#tipo_filtro').val();
        valorCampoFiltro = $('#filtro_pesquisa_por').val();
    }

    var camposFiltro = {};
    camposFiltro[nomeCampoFiltro] = valorCampoFiltro;

    filtros = {
        'filtroRegistrouComissao':registrouComissao,
        'filtroPossuiCartao':possuiCartao,
        'filtroPeriodoComissao':$('#filtroPeriodoComissao').val(),
        'filtroConsultores':consultores,
        'filtroSomentePagos': somentePagos,
        'campoFiltro' : camposFiltro
    };

    var dadosajax = {
        'funcao' : "carregar_contadores_relatorio_comissao",
        'pagina' : pagina,
        'itensPorPagina' : qtdItens,
        'filtros': filtros
    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        beforeSend: function () {
            $('#divTabelaContadoresComissionamento').html('<i class="fa fa-5x fa-circle-o-notch fa-spin text-info"></i>').css({'text-align':'center'});
            $('.paginacao').css({ visibility: 'hidden'});
        },
        error : function (){
            alertErro ('Error 001 - Erro ao carregar a tela de relat&aacute;rio de comissionamento de contadores,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            $('#modalCarregando').modal('hide');

            try {

                var contadores = JSON.parse(result);

                if (contadores.mensagem == 'Ok') {
                    montarTabelaDinamica(contadores.colunas, contadores.dadosContadores, 'tabelaContadores', 'divTabelaContadoresComissionamento');
                    if (carregarPaginacao)
                        mostrar_paginacao(contadores.quantidadeContadores, qtdItens, carregarContadoresRelatorioComissao);

                    $('#qtdContadoresConsulta').html('<label>Qtd:'+contadores.quantidadeContadores+'</label>');

                }
            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error 002 - Erro ao carregar a tela de relat&aacute;rio de comissionamento de contadores,' + msnPadrao + '.');
            }

        },
        complete : function ( ) {
            $('.paginacao').css({ visibility: 'visible'});

        }
    });
}

function informarPagamentoExtornoComissaoContador(registroComissaoId, acao) {
    if (acao == 'pagar')
        $('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Relizando informe de pagamento da comiss&atilde;o do contador');
    else
        $('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Relizando o extorno de pagamento da comiss&atilde;o do contador');

    $('#modalCarregando').modal('show');
    var dadosajax = {
        'funcao' : "informar_pagamento_extorno_comissao_contador",
        'acao': acao,
        'registroComissaoId': registroComissaoId
    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error 001 - Erro ao carregar a tela de relat&aacute;rio de comissionamento de usu&aacute;rios,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            try {
                resultado = JSON.parse(result);
                if (resultado.mensagem == 'Ok') {
                    if (acao == 'pagar') {
                        alertSucesso('Informe de pagamento realizado com sucesso!');
                    }
                    else if (acao == 'extornar') {
                        alertSucesso('Informe de extorno de pagamento realizado com sucesso!');
                    }
                    carregarContadoresRelatorioComissao($('.paginacao li.active').find('a').html());
                }
            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error 102 - Erro ao carregar a tela de relat&aacute;rio de comissionamento de usu&aacute;rios,' + msnPadrao + '.');
            }

        }
    });
}