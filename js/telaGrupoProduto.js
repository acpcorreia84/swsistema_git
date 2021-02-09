var msnPadrao = 'entre em contato com o administrador do sistema';

var pageUrl = 'funcoes/funcoesGrupoProduto.php';

function carregarGruposProdutos(){
    /*INICIALIZA SE NAO PASSAR PARAMETRO SETA 0*/
    var dadosajax = {
        'funcao' : 'carregar_grupos_produtos',
    }

    $.ajax({
        url: pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        beforeSend: function () {
            /*CHAMA A TELA QUE CARREGA OS FILTROS*/
            $('#divTabelaLocais').html('<img src="img/carregando.gif">').css({'text-align':'center'});
            $('.paginacao').css({ visibility: 'hidden'});
        },
        error : function(){
            alertErro(acentuarMsn('Error GP001 - Erro ao carregar Grupos de produtos,' + ' '+ msnPadrao + '.'));
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            try {
//                console.log(result);
                var grupos = JSON.parse(result);
                if (grupos.mensagem == 'Ok') {
                    montarTabelaDinamica(grupos.colunas, grupos.dados, 'tabelaGrupos', 'divTabelaGrupos');
                }
            } catch (e) {
                console.log(result, e);
                $('#modalCarregando').modal('hide');
                alertErro(acentuarMsn('Error GP002 - Erro ao carregar Grupos de produtos,' +' '+e + ' '+ msnPadrao + '.'));
            }
        },
        complete : function ( ) {
            $('.paginacao').css({ visibility: 'visible'});

        }
    });
}

function carregarModalDetalharGrupoProduto (grupoId) {

    $('#mensagemLoading').html('<i class="fa fa-arrows"></i> Carregando detalhes do grupo de produtos');
    $('#modalCarregando').modal('show');

    var dadosajax = {
        'funcao' : "carregar_modal_detalhar_grupo_produtos",
        'grupoId': grupoId
    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error GP002 - Erro ao carregar detalhes do grupo de produtos,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            $('#modalCarregando').modal('hide');
            try {
//                console.log(result);
                resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {
                    $('#labelNomeGrupoProduto').html(resultado.nome);
                    $('#GrupoProdutoId').val(grupoId);

                    montarTabelaDinamica(resultado.colunas_listaprodutos, resultado.lista_produtos, 'tabelaProdutos', 'divListaProdutos');

                }

            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error GP003 - Erro ao carregar detalhes na tela Grupo de produtos, Erro:' + e + msnPadrao + '.');

            }
        }
    });

}

function salvarGrupoProdutos() {
    $('#mensagemLoading').html('<i class="fa fa-arrows"></i> Salvando o grupo de produtos');
    $('#modalCarregando').modal('show');

    var dadosajax = {
        'grupoProdutoId': $('#GrupoProdutoId').val(),
        'funcao' : "salvar_grupo_produto",
        'nome': $('#edtNomeGrupoProduto').val(),
        'acaoGrupoProduto':$('#acaoGrupoProduto').val()
    };

    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error LC003 - Erro ao salvar a local,' + msnPadrao );
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            try {
                resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {
                    alertSucesso('Grupo Produto salvo com sucesso');
                    if ($('#acaoGrupoProduto').val()=='inserir') {
                        carregarGruposProdutos();
                    }
                    else if ($('#acaoGrupoProduto').val()=='editar') {
                        carregarModalDetalharGrupoProduto($('#GrupoProdutoId').val());
                    }
                    $('#modalInserirEditarGrupoProduto').modal('hide');
                    $('#modalCarregando').modal('hide');
                }

            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error LC003 - Erro na tela de local na a&ccedil;&atilde;o de Salvar, Erro:' + e + msnPadrao + '.');
            }

        }
    });

}

function carregarModalInserirEditarGrupoProduto (acao) {

    if (acao == 'inserir') {
        $('#edtNomeGrupoProduto').val('');
        $('#acaoGrupoProduto').val('inserir');
    } else if (acao == 'editar') {
        $('#acaoGrupoProduto').val('editar');
        $('#edtNomeGrupoProduto').val($('#labelNomeGrupoProduto').html());
    }
}

function apagarGrupoProduto () {

    $('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Apagando o grupo de produtos');
    $('#modalCarregando').modal('show');

    var dadosajax = {
        'grupoProdutoId' : $('#GrupoProdutoId').val(),
        'funcao' : "apagar_grupo_produto"
    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error LC004 - Erro na a&ccedil;&atilde;o de apagar grupo de produtos,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            try {
                if (resultado.mensagem == 'Ok') {

                    alertSucesso('Grupo de produtos apagado com sucesso');
                    carregarGruposProdutos();
                    $('#modalGrupoProdutoDetalhar').modal('hide');
                    $('#modalCarregando').modal('hide');
                }
            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error LC104 - Erro na a&ccedil;&atilde;o de apagar grupo de produtos, Erro:' + e + msnPadrao + '.');
            }
        }
    });

}
