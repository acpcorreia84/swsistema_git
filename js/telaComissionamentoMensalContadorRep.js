var msnPadrao = 'entre em contato com o administrador do sistema (3321-5061)';

var pageUrl = 'funcoes/funcoesContador.php';


function carregarRelatorioComissaoGeralMensalContadores(){

    if ((typeof window['filtroUsuariosCertificados'] !== 'undefined') && (Array.isArray(window['filtroUsuariosCertificados'])))
        var consultores = window['filtroUsuariosCertificados'];
    else
        var consultores = '';


    /*NOME E CAMPO DE FILTRO POR (IGUAL A)*/
    var nomeCampoFiltro = '';
    var valorCampoFiltro = '';
    if (($('#tipo_filtro').val()) && ($('#filtro_pesquisa_por').val())) {
        nomeCampoFiltro = $('#tipo_filtro').val();
        valorCampoFiltro = $('#filtro_pesquisa_por').val();
    }

    var camposFiltro = {};
    camposFiltro[nomeCampoFiltro] = valorCampoFiltro;

    var filtros = {
        'filtroPeriodoComissao':$('#filtroPeriodoComissao').val(),
        'filtroConsultores':consultores,
        'campoFiltro' : camposFiltro
    };


    var dadosajax = {
        'funcao' : "carregar_contadores_relatorio_mensal",
        'usuarioLogadoId': $('#usuarioLogadoId').val(),
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

                $('#dadosPlanilha').val(contadores.dadosRelatorio);
                if (contadores.mensagem == 'Ok') {
                    montarTabelaDinamica(contadores.colunas, contadores.dadosContadores, 'tabelaContadores', 'divTabelaContadoresComissionamento');

                    $('#qtdContadoresConsulta').html('<label>Qtd:'+contadores.quantidadeContadores+'</label> | <label>Faturamento Total: '+contadores.totalFaturamento+'</label> | <label>Comiss&atilde;o Total: '+contadores.totalComissao+'</label>');

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