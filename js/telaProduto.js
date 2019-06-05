var msnPadrao = 'entre em contato com o administrador do sistema (3321-5061)';

var pageUrl = 'funcoes/funcoesProduto.php';

function carregarProdutos(paginaSelecionada, qtdItensPorPagina, carregarDivPaginacao){
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
    if (($('#filtroCampo').val()) && ($('#filtro_pesquisa_por').val())) {
        nomeCampoFiltro = $('#filtroCampo').val();
        valorCampoFiltro = $('#filtro_pesquisa_por').val();
    }

    camposFiltro = {};
    camposFiltro[nomeCampoFiltro] = valorCampoFiltro;

    filtros = {
        'campoFiltro' : camposFiltro,
        'filtroTipoPessoa' : $('#filtroProdutoTipoPessoa').val(),
        'filtroContador' : $('#filtroProdutoProdutosContador').val(),
        'filtroValidade' : $('#filtroProdutoValidadadeProduto').val(),
        'filtroCampo' : $('#filtroTelaProduto').val(),
    };

    var dadosajax = {
        'funcao' : 'carregar_produtos',
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
            $('#divTabelaProdutos').html('<img src="img/carregando.gif">').css({'text-align':'center'});
            $('.paginacao').css({ visibility: 'hidden'});
        },
        error : function(){
            alertErro(acentuarMsn('Error P001 - Erro ao carregar Produtos,' + ' '+ msnPadrao + '.'));
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            try {
                var resultado = JSON.parse(result);
                if (resultado.mensagem == 'Ok') {
                    montarTabelaDinamica(resultado.colunas, resultado.dados, 'tabelaProdutos', 'divTabelaProdutos');
                    $('#qtdProdutosConsulta').html('<label>Qtd: '+resultado.quantidadeTotal +'</label>');
                    if (carregarPaginacao)
                        mostrar_paginacao(resultado.quantidadeTotal, qtdItens, carregarProdutos, 'paginacaoProdutosTopo', 'paginacaoProdutosRodape');
                }
            } catch (e) {
                console.log(result, e);
                $('#modalCarregando').modal('hide');
                alertErro(acentuarMsn('Error P101 - Erro ao carregar Produtos,' +' '+e + ' '+ msnPadrao + '.'));
            }
        },
        complete : function ( ) {
            $('.paginacao').css({ visibility: 'visible'});

        }
    });
}

function carregarModalDetalharProduto (produtoId) {

    $('#mensagemLoading').html('<i class="fa fa-arrows"></i> Carregando detalhes do produto');
    $('#modalCarregando').modal('show');

    $('#produtoId').val(produtoId);
    var dadosajax = {
        'funcao' : "carregar_modal_detalhar_produto",
        'produtoId': produtoId
    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error P002 - Erro ao carregar detalhes do produto,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            $('#modalCarregando').modal('hide');
            try {
                resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {
                    $('#modalCarregando').modal('hide');
                    $('#labelNomeProduto').html(resultado.id + ' - ' + resultado.nome + ' | <span class="text-danger">' + resultado.preco + '</span>');
                    $('#labelPessoaTipo').html(resultado.pessoaTipo);
                    $('#labelValidade').html(resultado.validade);
                    $('#labelCodigoProduto').html(resultado.codigo);
                    $('#labelComissao').html(resultado.comissao + "%");
                    $('#labelProdutoPai').html(resultado.produtoPai);
                    $('#labelProdutoContador').html(resultado.produtoContador);

                    /*
                    * INSERE DADOS NO MODAL EDITAR
                    * */
                    $('#edtNomeProduto').val(resultado.nome);
                    $('#edtCodigoProduto').val(resultado.codigo);
                    $('#edtComissaoProduto').val(resultado.comissao);

                    $('#edtTipoProduto').val(resultado.pessoaTipoId);
                    $('#edtValidadeProduto').val(resultado.validadeId);
                    $('#edtPrecoProduto').val(resultado.precoSemFormatacao);
                    $('#edtProdutoContador').val(resultado.produtoContadorId);
                    /*
                    * MONTA SELECT DE PRODUTOS DE REFERENCIA
                    * */
                    montarSelect('edtProdutoReferencia', resultado.produtos, 'divProdutosReferencia', resultado.produtoReferenciaId );
                }

            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error P102 - Erro ao carregar detalhes na tela de Produtos, Erro:' + e + msnPadrao + '.');

            }
        }
    });

}

function salvarProduto () {

    $('#mensagemLoading').html('<i class="fa fa-arrows"></i> Salvando produto');
    $('#modalCarregando').modal('show');

    var dadosajax = {
        'funcao' : "salvar_produto",
        'produtoId': $('#produtoId').val(),
        'nome': $('#edtNomeProduto').val(),
        'acao':$('#acaoProduto').val(),
        'codigoProduto':$('#edtCodigoProduto').val(),
        'comissaoProduto': $('#edtComissaoProduto').val(),
        'pessoaTipo': $('#edtTipoProduto').val(),
        'validade': $('#edtValidadeProduto').val(),
        'preco': $('#edtPrecoProduto').val(),
        'produtoReferenciaId': $('#edtProdutoReferencia').val(),
        'produtoContador':$('#edtProdutoContador').val()
    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error P003 - Erro ao salvar o produto,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            try {
                resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {
                    $('#modalInserirEditarProduto').modal('hide');
                    alertSucesso('Produto salvo com sucesso');
                    if ($('#acaoProduto').val()=='inserir') {
                        carregarProdutos($('.pagination li.active').find('a').html());
                        $('#modalCarregando').modal('hide');
                    }
                    else if ($('#acaoProduto').val()=='editar') {
                        $('#modalInserirEditarProduto').modal('hide');
                        carregarModalDetalharProduto($('#produtoId').val());
                    }

                }

            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error LC103 - Erro na tela de produtos na a&ccedil;&atilde;o de Salvar, Erro:' + e + msnPadrao + '.');
            }

        }
    });

}

function carregarModalInserirEditarProduto (acao) {

    if (acao == 'inserir') {
        $('#mensagemLoading').html('<i class="fa fa-arrows"></i> Carregando informa&ccedil;&otilde;es');
        $('#modalCarregando').modal('show');

        $('#edtNomeProduto').val('');
        $('#edtNomeProduto').val('');
        $('#edtCodigoProduto').val('');
        $('#edtComissaoProduto').val('');

        $('#edtTipoProduto').val('');
        $('#edtValidadeProduto').val('');
        $('#edtPrecoProduto').val('');
        $('#edtProdutoContador').val('');


        $('#acaoProduto').val('inserir');
        $('#edtTipoProduto').prop("disabled",false);

        $.ajax ({
            url : pageUrl,
            data : {'funcao':'carregar_modal_inserir_editar_produto'},
            type : 'POST',
            cache : true,
            error : function (){
                alertErro ('Error P004 - Erro ao tentar carregar tela de inserir produtos,' + msnPadrao + '.');
                $('#modalCarregando').modal('hide');
            },
            success : function(result){
                try {
                    resultado = JSON.parse(result);

                    if (resultado.mensagem == 'Ok') {
                        $('#modalCarregando').modal('hide');
                        montarSelect('edtProdutoReferencia', resultado.produtos, 'divProdutosReferencia', '');
                    }

                } catch (e) {
                    $('#modalCarregando').modal('hide');
                    console.log(result, e);
                    alertErro('Error P104 - Erro ao tentar carregar tela de inserir produtos, Erro:' + e + msnPadrao + '.');
                }

            }
        });

    } else if (acao == 'editar') {
        $('#acaoProduto').val('editar');
        $('#edtTipoProduto').prop("disabled",true);

    }


}

function apagarProduto() {

    $('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Apagando o produto');
    $('#modalCarregando').modal('show');

    var dadosajax = {
        'produtoId' : $('#produtoId').val(),
        'funcao' : "apagar_produto"
    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error P004 - Erro na a&ccedil;&atilde;o de apagar produto,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            try {
                if (resultado.mensagem == 'Ok') {

                    alertSucesso('Produto apagado com sucesso');
                    carregarProdutos();
                    $('#modalProdutoDetalhar').modal('hide');
                    $('#modalCarregando').modal('hide');
                }
            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error P104 - Erro na a&ccedil;&atilde;o de apagar produto, Erro:' + e + msnPadrao + '.');
            }
        }
    });

}
