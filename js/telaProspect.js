var msnPadrao = 'entre em contato com o administrador do sistema';

var pageUrl = 'funcoes/funcoesProspect.php';

function carregarProspects (paginaSelecionada, qtdItensPorPagina, paginando, carregarDivPaginacao) {

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

    /*NOME E CAMPO DE FILTRO POR (IGUAL A)*/
    nomeCampoFiltro = '';
    valorCampoFiltro = '';
    if (($('#tipo_filtro').val()) && ($('#filtro_pesquisa_por').val())) {
        nomeCampoFiltro = $('#tipo_filtro').val();
        valorCampoFiltro = $('#filtro_pesquisa_por').val();
    }

    camposFiltro = {};
    camposFiltro[nomeCampoFiltro] = valorCampoFiltro;

    if ($('#filtroDataCompraCertificado').val()) {
        var filtroData = $('#filtro_datas').val();
        /*SE TIVER DATA SELECIONADA*/
        if (filtroData) {
            var filtroDataValidator = filtroData.split(',');
            /*
             * SE ESCOLHEU ENTRE DATAS EXECUTA O SCRIPT,
             * CASO E POR QUE CONTRARIO ESCOLHEU APENAS UMA DATA
             * */
            if (filtroDataValidator.length > 1) {
                var dataDe = filtroDataValidator[0].split('/'); var dataAte = filtroDataValidator[1].split('/');

                dataDe = new Date(dataDe[2],dataDe[1], dataDe[0] ,0,0,0,0);
                dataAte = new Date(dataAte[2],dataAte[1], dataAte[0], 23,59,59,0 );

                if (dateDiffInDays(dataDe, dataAte)>31) {
                    alertErro('Por favor selecione um intervalo entre datas menor');
                    filtroData = '';
                }
            } else {
                filtroData = filtroData + ',' + filtroData;
            }
        }
    }
    filtros = {
        'filtroData':filtroData,
        'filtroTipoData':$('#spanTipoData').html(),
        'campoFiltro' : camposFiltro
    };

    var dadosajax = {
        'funcao' : "carregar_prospects",
        'pagina' : pagina,
        'itensPorPagina' : qtdItens,
        'filtros' : filtros
    };

    if (carregarDivPaginacao !== undefined)
        var carregarPaginacao = carregarDivPaginacao;
    else
        var carregarPaginacao = '';

    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        beforeSend: function () {
            /*CHAMA A TELA QUE CARREGA O FILTRO DE USUARIOS*/
            $('#divTabelaProspects').html('<i class="fa fa-5x fa-circle-o-notch fa-spin text-info"></i>').css({'text-align':'center'});
            $('.paginacao').css({ visibility: 'hidden'});
        },
        error : function (){
            alertErro ('Error 101 - Erro ao carregar lista de prospects,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){;
            try {
                resultado = JSON.parse(result);
                if (resultado.mensagem == 'Ok') {
                    montarTabelaDinamica(resultado.colunas, resultado.dados, 'tabelaProspects', 'divTabelaProspects');
                    if (carregarPaginacao)
                        mostrar_paginacao(resultado.quantidadeProspects, qtdItens, carregarProspects, 'paginacaoProspectTopo', 'paginacaoProspectRodape');

                }
            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error 102 - Erro ao carregar lista de prospects,' + msnPadrao + '.');
            }
        },
        complete : function ( ) {
            $('.paginacao').css({ visibility: 'visible'});

        }
    });

}


function carregarFiltrosProspects() {

    var dadosajax = {
        'funcao' : "carregar_filtros_prospects",
    };

    $('#divFiltroConsultores').html('<i class="fa fa-circle-o-notch fa-spin text-info"></i>').css({'text-align':'center'});


    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,

        error : function (){
            alert ('Error CD9001 - Erro ao carregar os filtros dos certificado,' + msnPadrao + '.');
            $("#modalCarregando").modal('hide');
        },
        success : function(result){
            try {

                var resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {
                    montarSelectMultiplo('filtroUsuariosCertificados', resultado.usuarios, 'divFiltroConsultores', filtroUsuarioSelecionado, 'divUsuariosCertificados');
                }
            } catch (e){
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro ('Error CD9002 - Erro ao carregar os filtros dos certificado.,' + msnPadrao + ' '+e + '.');

            }
        }
    });
};

