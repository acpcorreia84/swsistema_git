var msnPadrao = 'entre em contato com o administrador do sistema';

var pageUrl = 'funcoes/funcoesLocal.php';

function carregarLocais(paginaSelecionada, qtdItensPorPagina, carregarDivPaginacao){
    /*INICIALIZA SE NAO PASSAR PARAMETRO SETA 0*/
    if (paginaSelecionada === undefined)
        var pagina = 0;
    else
        var pagina = paginaSelecionada;
    /*INICIALIZA SE NAO PASSAR PARAMETRO SETA 20 ITENS POR PAGINA POR PADRAO*/
    if (qtdItensPorPagina === undefined)
        var qtdItens = 100;
    else
        var qtdItens = qtdItensPorPagina;

    if (carregarDivPaginacao == 'sim')
        var carregarPaginacao = carregarDivPaginacao;
    else
        var carregarPaginacao = '';

    /*NOME E CAMPO DE FILTRO POR (IGUAL A)*/
    nomeCampoFiltro = '';
    valorCampoFiltro = '';
    if (($('#tipo_filtro').val()) && ($('#filtro_pesquisa_por').val())) {
        nomeCampoFiltro = $('#tipo_filtro').val();
        valorCampoFiltro = $('#filtro_pesquisa_por').val();
    }

    camposFiltro = {};
    camposFiltro[nomeCampoFiltro] = valorCampoFiltro;

    filtros = {
        'campoFiltro' : camposFiltro
    };

    var dadosajax = {
        'funcao' : 'carregar_locais',
        'pagina' : pagina,
        'itensPorPagina' : qtdItens,
        'filtros': filtros
    }

    $.ajax({
        url: pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        beforeSend: function () {
            /*CHAMA A TELA QUE CARREGA O FILTRO DE USUARIOS*/
            $('#divTabelaLocais').html('<img src="img/carregando.gif">').css({'text-align':'center'});
            $('.paginacao').css({ visibility: 'hidden'});
        },
        error : function(){
            alertErro(acentuarMsn('Error LC001 - Erro ao carregar Locais,' + ' '+ msnPadrao + '.'));
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            try {
                var locais = JSON.parse(result);
                if (locais.mensagem == 'Ok') {
                    montarTabelaDinamica(locais.colunas, locais.dados, 'tabelaLocais', 'divTabelaLocais');
                    $('#qtdLocaisConsulta').html('<label>Qtd: '+locais.quantidadeTotal +'</label>');
                    if (carregarPaginacao)
                        mostrar_paginacao(locais.quantidadeTotal, 50, carregarLocais, 'paginacaoLocaisTopo', 'paginacaoLocaisRodape');
                }
            } catch (e) {
                console.log(result, e);
                $('#modalCarregando').modal('hide');
                alertErro(acentuarMsn('Error LC001 - Erro ao carregar Locais,' +' '+e + ' '+ msnPadrao + '.'));
            }
        },
        complete : function ( ) {
            $('.paginacao').css({ visibility: 'visible'});

        }
    });
}

function carregarModalDetalharLocal (localId) {

    $('#mensagemLoading').html('<i class="fa fa-arrows"></i> Carregando detalhes do local');
    $('#modalCarregando').modal('show');

    $('#localId').val(localId);
    var dadosajax = {
        'funcao' : "carregar_modal_detalhar_local",
        'localId': localId
    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error LC002 - Erro ao carregar detalhes do local,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            $('#modalCarregando').modal('hide');
            try {
                resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {
                    $('#modalCarregando').modal('hide');
                    $('#labelNomeLocal').html(resultado.nome);
                    $('#edtNomeLocal').val(resultado.nome);

                }

            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error LC003 - Erro ao carregar detalhes na tela de Contas Receber, Erro:' + e + msnPadrao + '.');

            }
        }
    });

}

function salvarLocal () {

    $('#mensagemLoading').html('<i class="fa fa-arrows"></i> Salvando local');
    $('#modalCarregando').modal('show');

    var dadosajax = {
        'funcao' : "salvar_local",
        'localId': $('#localId').val(),
        'nome': $('#edtNomeLocal').val(),
        'acao':$('#acaoLocal').val()
    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error LC003 - Erro ao salvar a local,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            try {
                resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {
                    alertSucesso('Local salvo com sucesso');
                    if ($('#acaoLocal').val()=='inserir') {
                        carregarLocais($('.pagination li.active').find('a').html());
                        $('#modalInserirEditarLocal').modal('hide');
                        $('#modalCarregando').modal('hide');
                    }
                    else if ($('#acaoLocal').val()=='editar') {
                        $('#modalInserirEditarLocal').modal('hide');
                        carregarModalDetalharLocal($('#localId').val());

                    }


                }

            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error LC003 - Erro na tela de local na a&ccedil;&atilde;o de Salvar, Erro:' + e + msnPadrao + '.');
            }

        }
    });

}

function carregarModalInserirEditarLocal (acao) {

    if (acao == 'inserir') {
        $('#edtNomeLocal').val('');
        $('#acaoLocal').val('inserir');
    } else if (acao == 'editar') {
        $('#acaoLocal').val('editar');
    }


}

function apagarLocal () {

    $('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Apagando o produto');
    $('#modalCarregando').modal('show');

    var dadosajax = {
        'localId' : $('#localId').val(),
        'funcao' : "apagar_local"
    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error LC004 - Erro na a&ccedil;&atilde;o de apagar local,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            try {
                if (resultado.mensagem == 'Ok') {

                    alertSucesso('Local apagado com sucesso');
                    carregarLocais();
                    $('#modalLocalDetalhar').modal('hide');
                    $('#modalCarregando').modal('hide');
                }
            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error LC104 - Erro na a&ccedil;&atilde;o de apagar local, Erro:' + e + msnPadrao + '.');
            }
        }
    });

}
