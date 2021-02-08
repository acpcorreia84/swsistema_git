var msnPadrao = 'entre em contato com o administrador do sistema';

var pageUrl = 'funcoes/funcoesContaReceber.php';

function carregarDadosModalBaixarConta () {
    $('#mensagemLoading').html('<i class="fa fa-arrows"></i> Carregando dados da tela de baixa de pagamento');
    $('#modalCarregando').modal('show');

    var dadosajax = {
        'funcao' : "carregar_dados_modal_baixar_conta",
        'idContaReceber': $('#crContaId').val()
    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error CR1 - Erro ao Carregar modal baixar Conta,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            $('#modalCarregando').modal('hide');
            try {

                var dados = JSON.parse(result);

                if (dados.mensagem=='Ok') {
                    $('#crObservacaoBaixa').val('');
                    $('#crCodigoOperacaoBaixa').val('');
                    montarSelect('crDestinoLancamento', dados.bancos,'divCrBanco');
                    montarSelect('crFormaPagamentoLancamento', dados.formasPagamento,'divCrFormaLancamento');
                    /*INSERE FUNCAO PARA MOSTRAR O SELECT DA LISTA DE BOLETOS*/
                    $('#divCrFormaLancamento').append('<script>$("#crFormaPagamentoLancamento").change(function() { if($("#crFormaPagamentoLancamento option:selected").val()==1) { $("#divLabelBoletos").css({vibility:"visible", display:"block"});$("#divBoletosCr").css({vibility:"visible", display:"block"});} else {$("#divLabelBoletos").css({vibility:"hidden", display:"none"});$("#divBoletosCr").css({vibility:"hidden", display:"none"});} });</script>');
                    /*ESCONDE O SELECT DE BOLETOS E SO MOSTRA QUANDO O CLIENTE CLICAR*/
                    if (dados.boletos)
                        montarSelect('crBoletoPago', dados.boletos, 'divCrBoletos');

                    $("#divLabelBoletos").css({vibility:"hidden", display:"none"});
                    $("#divBoletosCr").css({vibility:"hidden", display:"none"});

                }else{
                    $('#modalCarregando').modal('hide');
                    alertErro('Error CR2 - Erro ao carregar a tela de Baixar Contas a Receber,' + msnPadrao + '.');
                }
            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error CR2 - Erro ao carregar a tela de Baixar Contas a Receber,' + msnPadrao + '.');
            }
        }
    });

}

function carregarContasReceber(paginaSelecionada, qtdItensPorPagina, paginando){
    if (paginando == 'paginar') {
        //alertSucesso(paginaSelecionada +' - '+ qtdTotalItens + ' - '+ paginando);
        $('#mensagemLoading').html('<i class="fa fa-folder-open-o"></i> Paginando...');
        $('#modalCarregando').modal('show');
    } else
        $('#mensagemLoading').html('<i class="fa fa-lg fa-download"></i> Carregando a lista de Contas a Receber');

    /*INICIALIZA SE NAO PASSAR PARAMETRO SETA 0*/
    if (paginaSelecionada === undefined)
        var pagina = 0;
    else
        var pagina = paginaSelecionada;
    /*INICIALIZA SE NAO PASSAR PARAMETRO SETA 20 ITENS POR PAGINA POR PADRAO*/
    if (qtdItensPorPagina === undefined)
        var qtdItens = 20;
    else
        var qtdItens = qtdItensPorPagina;

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
        'filtroData':$('#filtroDataContasReceber').val(),
        'filtroApenasPagas': $('#filtroApenasPagas').prop('checked'),
        'filtroAguardandoConfirmacao': $('#filtroAguardandoConfirmacao').prop('checked'),
        'campoFiltro' : camposFiltro
    };

    var dadosajax = {
        'funcao' : "carregar_contas_receber",
        'pagina' : pagina,
        'itensPorPagina' : qtdItens,
        'filtros': filtros
    };

    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error CR345 - Erro na ação de carregar Contas Receber,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            $('#modalCarregando').modal('hide');
            var contasReceber = result.split('&&');

            if (contasReceber[0].trim()=='Ok') {
                montarTabelaDinamica(contasReceber[1], contasReceber[2], 'tabelaContasReceber', 'divTabelaContasReceber');

            }else{
                $('#modalCarregando').modal('hide');
                console.log(result);
                alertErro('Error CR123 - Erro ao carregar a tela de Contas Receber,' + msnPadrao + '.');
            }
        }
    });
}


function carregaPaginacaoContasReceber () {
    $('#modalCarregando').modal('show');

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
        'filtroData':$('#filtroDataContasReceber').val(),
        'filtroApenasPagas': $('#filtroApenasPagas').val(),
        'campoFiltro' : camposFiltro
    };


    var dadosajax = {
        'funcao' : "carregar_paginacao",
        'filtros': filtros
    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error CR349 - Erro ao carregar dados da pagina&ccedil;&atilde;o,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            resultado = result.split(';');
            if (resultado[0].trim() == 'Ok') {
                var qtdContas = resultado[1].trim();
                mostrar_paginacao(qtdContas, 20, carregarContasReceber, 'paginacao_contas_receber_topo', 'paginacao_contas_receber_rodape');
            } else
                console.log(result);

        }
    });

}

function carregarDetalhesContaReceber (conta_id, abrirModalCarregar) {

    $('#mensagemLoading').html('<i class="fa fa-arrows"></i> Carregando detalhes da Conta a Receber');

    if (abrirModalCarregar === undefined)
        $('#modalCarregando').modal('show');

    var dadosajax = {
        'funcao' : "carregar_detalhes_conta_receber",
        'contaId': conta_id
    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error CR401 - Erro ao carregar detalhes da conta a receber,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            $('#modalCarregando').modal('hide');
            try {
                resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {
                    contaReceber = JSON.parse(resultado.dadosContaReceber);
                    /*SE NAO ESTIVER PAGA MOSTRAR|ESCONDER BOTOES DE BAIXAR|EXTORNAR PAGAMENTO*/
                    if (contaReceber.dataPagamento == '---') {
                        $('#btnBaixarPagamentoContaReceber').css({display: 'inline',visibility: 'visible'});
                        $('#btnExtornarPagamentoContaReceber').css({display: 'none',visibility: 'hidden'})
                    }
                    else {
                        $('#btnBaixarPagamentoContaReceber').css({display: 'none',visibility: 'hidden'});
                        $('#btnExtornarPagamentoContaReceber').css({display: 'inline',visibility: 'visible'})
                    }

                    $('#crContaId').val(contaReceber.id);
                    $('#crDescricaoConta').html(contaReceber.descricao);
                    $('#crVencimentoConta').html(contaReceber.vencimento);
                    $('#crValorConta').html(contaReceber.valor);
                    $('#crFormaConta').html(contaReceber.formaPagamento);
                    $('#crSituacaoPagamentoConta').html(contaReceber.situacaoPagamento);
                    $('#crDataPagamentoConta').html(contaReceber.dataPagamento);
                    $('#crObservacaoConta').html(contaReceber.observacao);
                    $('#crImagemComprovanteCertificado').html(contaReceber.urlImagemComprovante);

                    /*CARREGAR TABELA DE SITUACOES*/
                    montarTabelaDinamica(resultado.colunaSituacoes, resultado.situacoes,'tabelaSituacoesCertificadoConta', 'divTabelaSituacoes' );

                    /*CARREGAR TABELA DE LANCAMENTOS*/
                    if (resultado.colunasLancamentos !== undefined) {
                        $('#divLabelLancamentos').css({display: 'block',visibility: 'visible'});
                        montarTabelaDinamica(resultado.colunasLancamentos, resultado.lancamentos,'tabelaLancamentosBaixa', 'divLancamentosContaReceberBaixa' );
                    } else {
                        $('#divLabelLancamentos').css({display: 'none',visibility: 'hidden'});
                        $('#divLancamentosContaReceberBaixa').html('');
                    }
                    /*CARREGA TABELA DE BOLETOS SE EXISTIR*/
                    if (resultado.colunaBoletos !== undefined) {
                        $('#divBoletos').css({display: 'block',visibility: 'visible'});
                        montarTabelaDinamica(resultado.colunaBoletos, resultado.boletos,'tabelaBoletosConta', 'divTabelaBoletos' );
                    } else {
                        $('#divBoletos').css({display: 'none',visibility: 'hidden'});
                        $('#divTabelaBoletos').html('');
                    }
                } else {
                    $('#modalCarregando').modal('hide');
                    console.log(result);
                    alertErro('Error CR402 - Erro ao carregar detalhes na tela de Contas Receber,' + msnPadrao + '.');
                }

            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error CR403 - Erro ao carregar detalhes na tela de Contas Receber, Erro:' + e + msnPadrao + '.');

            }
        }
    });

}

function salvarContaReceber () {

    $('#mensagemLoading').html('<i class="fa fa-arrows"></i> Salvando contas a receber');
    $('#modalCarregando').modal('show');
    var dadosajax = {
        'funcao' : "salvar_conta_receber",
        'contaId': $('#crContaId').val(),
        'dataLancamento': $('#crDataLancamento').val(),
        'banco': $('#crDestinoLancamento').val(),
        'formaPagamento': $('#crFormaPagamentoLancamento').val(),
        'codigoOperacao': $('#crCodigoOperacaoBaixa').val(),
        'observacao': $('#crObservacaoBaixa').val(),
        'idBoletoPago': $('#crBoletoPago').val(),

    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error CR500 - Erro ao salvar a conta a Receber,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            try {
                resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {
                    alertSucesso('Conta a receber salva com sucesso');
                    carregarDetalhesContaReceber($('#crContaId').val(), false);
                    $('#modalContaReceberBaixarPagamento').modal('hide');
                }
                else
                    throw result + '! Erro inesperado';

            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error CR501 - Erro na tela de Contas a receber na a&ccedil;&atilde;o de Salvar, Erro:' + e + msnPadrao + '.');
            }

        }
    });

}

function extornarContaReceber () {
    $('#mensagemLoading').html('<i class="fa fa-arrows"></i> Extornando contas a receber');
    $('#modalCarregando').modal('show');
    var dadosajax = {
        'funcao' : "extornar_conta_receber",
        'contaId': $('#crContaId').val()
    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error CR600 - Erro ao extornar a conta a Receber,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            try {
                resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {
                    alertSucesso('Conta a receber extornada com sucesso');
                }
                else
                    throw result + '! Erro inesperado';

                carregarDetalhesContaReceber($('#crContaId').val(), false);

            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error CR601 - Erro na tela de Contas a receber na a&ccedil;&atilde;o de extornar, Erro:' + e + msnPadrao + '.');
            }

        }
    });

}