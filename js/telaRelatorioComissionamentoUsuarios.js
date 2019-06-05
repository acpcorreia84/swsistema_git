var msnPadrao = 'entre em contato com o administrador do sistema (3321-5061)';

var pageUrl = 'funcoes/funcoesUsuario.php';

function carregarUsuariosRelatorioComissao(){
    $('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Carregando a lista de usu&aacute;rios para pagamento de comissionamento');
    var dadosajax = {
        'filtroPeriodoComissao':$('#filtroPeriodoComissao').val(),
        'funcao' : "carregar_usuarios_relatorio_comissao",
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
            $('#modalCarregando').modal('hide');

            try {
                usuarios = JSON.parse(result);
                if (usuarios.mensagem == 'Ok') {
                    montarTabelaDinamica(usuarios.colunas, usuarios.dadosUsuarios, 'tabelaUsuarios', 'divTabelaUsuariosComissionamento');

                }
            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error 002 - Erro ao carregar a tela de relat&aacute;rio de comissionamento de usu&aacute;rios,' + msnPadrao + '.');
            }

        }
    });
}

function informarPagamentoExtornoComissaoUsuario(registroComissaoId, acao) {
    if (acao == 'pagar')
        $('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Relizando informe de pagamento da comiss&atilde;o do parceiro');
    else
        $('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Relizando o extorno de pagamento da comiss&atilde;o do parceiro');

    $('#modalCarregando').modal('show');
    var dadosajax = {
        'funcao' : "informar_pagamento_extorno_comissao_usuario",
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
                    carregarUsuariosRelatorioComissao();
                }
            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error 102 - Erro ao carregar a tela de relat&aacute;rio de comissionamento de usu&aacute;rios,' + msnPadrao + '.');
            }

        }
    });
}