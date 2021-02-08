var msnPadrao = 'entre em contato com o administrador do sistema';

var pageUrl = 'funcoes/funcaoRelatorio.php';

function carregarFiltrosRelatorios() {

    var dadosajax = {
        'funcao' : "carregar_filtros_relatorio",
    };

    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        beforeSend: function () {
            /*CHAMA A TELA QUE CARREGA O FILTRO DE USUARIOS*/
            $('#divFiltroConsultores').html('<i class="fa fa-circle-o-notch fa-spin text-info"></i>').css({'text-align':'center'});
        },
        error : function (){
            alertErro ('Error RL101 - Erro ao carregar os filtros dos relatorios,' + msnPadrao + '.');
            $("#modalCarregando").modal('hide');
        },
        success : function(result){
            try {

                var resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {

                    montarSelectMultiplo('filtroUsuariosCertificados', resultado.usuarios, 'divFiltroConsultores', '', 'divUsuariosContadores');
                }
            } catch (e){
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro ('Error RL102 - Erro ao carregar os filtros dos relatorios.,' + msnPadrao + ' '+e + '.');

            }
        }
    });
};

function carregarDadosCampanha () {
    $('#mensagemLoading').html('<i class="fa fa-retweet"></i> Carregando dados relat&oacute;rio');
    $("#modalCarregando").modal('show');

    var dadosajax = {
       // 'data_geracao' : $("#dataGeracao").val(),
        'funcao' : 'carregar_dados_relatorio_campanha',
        'filtroPeriodoCampanha':$('#filtroPeriodoCampanha').val(),
    };

    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,

        error : function (){
            alertErro ('Error RL001 - Erro na acao de geracao do relatorio,' + msnPadrao + '.');
        },
        success : function(result){
            try {
                $('#modalCarregando').modal('hide');

                var resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {

                    $('#dadosPlanilha').val(resultado.dadosExportar);
                    montarTabelaDinamica(resultado.colunas, resultado.dados, 'tabelaRelatorioCampanha', 'divTabelaCampanha');
                    $('#qtdDadosRelatorio').html('<label>Total Clientes:'+resultado.totalCelulares+'</label> | <label>Celulares Encontrados: '+resultado.celularesEncontrados+'</label> | <label>Celulares N Encontrados: '+resultado.celularesNaoEncontrados+'</label>');
                }
                else {
                    alertErro('Error RL002 - Erro na acao de geracao do relatorio,,' + msnPadrao + '.');
                }
            } catch (e) {
                console.log(result);
                alertErro ('Error RL003 - Erro na acao de geracao do relatorio,,' + e + ', '+ msnPadrao + '.');
            }

        }
    });

}