var msnPadrao = 'entre em contato com o administrador do sistema';

var pageUrl = 'funcoes/funcoesParceiro.php';

function carregarParceirosRelatorioComissao(){
    $('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Carregando a lista de parceiros para pagamento de comissionamento');
    var dadosajax = {
        'filtroPeriodoComissao':$('#filtroPeriodoComissao').val(),
        'funcao' : "carregar_parceiros_relatorio_comissao",
    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error 001 - Erro ao carregar a tela de relat&aacute;rio de comissionamento de parceiros,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            $('#modalCarregando').modal('hide');

            try {
                parceiros = JSON.parse(result);
                if (parceiros.mensagem == 'Ok') {
                    montarTabelaDinamica(parceiros.colunas, parceiros.parceiros, 'tabelaParceiros', 'divTabelaParceirosComissionamento');

                }
            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error 102 - Erro ao carregar a tela de relat&aacute;rio de comissionamento de parceiros,' + msnPadrao + '.');
            }

        }
    });
}

function informarPagamentoExtornoComissaoParceiro(registroComissaoId, acao) {
    if (acao == 'pagar')
        $('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Relizando informe de pagamento da comiss&atilde;o do parceiro');
    else
        $('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Relizando o extorno de pagamento da comiss&atilde;o do parceiro');

    $('#modalCarregando').modal('show');
    var dadosajax = {
        'funcao' : "informar_pagamento_extorno_comissao_parceiro",
        'acao': acao,
        'registroComissaoId': registroComissaoId
    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error 001 - Erro ao carregar a tela de relat&aacute;rio de comissionamento de parceiros,' + msnPadrao + '.');
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
                    carregarParceirosRelatorioComissao();
                }
            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error 102 - Erro ao carregar a tela de relat&aacute;rio de comissionamento de parceiros,' + msnPadrao + '.');
            }

        }
    });
}