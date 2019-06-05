var msnPadrao = 'entre em contato com o administrador do sistema (3321-5081)';

// var urlPadrao = 'funcoes/certificado/';
var pageUrlHome = 'funcoes/funcoesHome.php';

function mudar_grafico_diretoria(funcao, datade, dataate) {

    var dadosajax = {
        'funcao' : funcao,
		'dataDe': datade,
		'dataAte':dataate
    };

    //console.log("Function: "+funcao + " datade: "+data_de+ " dataate: " + data_ate);

        $.ajax ({
            url : pageUrlHome,
            data : dadosajax,
            type : 'POST',
            cache : true,

            error : function (){
                alert (acentuarMsn('Error TC.JS/95 - Erro na função de mudar gráfico,' + msnPadrao + '.'));
            },
            success : function(result){
            	if (datade===undefined)
					ResetaData();
            	resultado = result.split('&');
                if (resultado[1]  == 0) {
					$('div#grafico_google').html(resultado[0]);
                }else{
/*                    erroEmail(result,acentuarMsn('Erro na função javascritpt na iserção de observação'));
                    alert('Error TC.JS/102 - Erro ao inserir a sua Observacao,' + msnPadrao + '.');*/

                }
            }
        });

}

function mudar_dados_faturamento(funcao,datade, dataate) {

	var dadosajax = {
		'funcao' : funcao,
		'dataDe': datade,
		'dataAte':dataate
	};

	$.ajax ({
		url : pageUrlHome,
		data : dadosajax,
		type : 'POST',
		cache : true,

		error : function (){
			alert (acentuarMsn('Error TC.JS/95 - Erro na função de mudar gráfico,' + msnPadrao + '.'));
		},
		success : function(result){
			resultado = result.split('&');

			if (resultado[1]  == 'OK') {

				$('#somaCertificadosFaturados').html(resultado[2]);
				$('#somaCertificadosDia').html(resultado[3]);
				$('#somaCertificadosAbertos').html(resultado[4]);
			}
		}
	});

}

function carregaSelectVendedores(funcao,local) {
	local_id = local.value;

	$('#selectVendedores').empty();
	$('#btnAtualiza').empty();

	var dadosajax = {
		'funcao' : funcao,
		'local_id': local_id,
	};

	$.ajax ({
		url : pageUrlHome,
		data : dadosajax,
		type : 'POST',
		cache : true,

		error : function (){
			alert (acentuarMsn('Error TC.JS/95 - Erro na função de mudar gráfico,' + msnPadrao + '.'));
		},
		success : function(result){
			resultado = result.split('&');

			//SE SELECIONOU ALGUM LOCAL CARREGA SE NÃO APAGA O SELECT DE VENDEDORES
			if (resultado[1]!==undefined) {
				$('#selectVendedores').html(resultado[1]);
				$('div#selectVendedores select').css({"width":"200px"});
				$('#vendedores').val(resultado[2]);
				$('#btnAtualiza').html(resultado[3]);

				//console.info($('#vendedores').text());
			}
			else {
				$('#selectVendedores').empty();
				$('#btnAtualiza').empty();

			}
		}
	});

}

function atualizaDadosFaturamentoVendedores(funcao, local) {
	local_id = local.value;
	vendedores = $("input#vendedores").val();


	var dadosajax = {
		'funcao' : funcao,
		'local_id': local_id,
		'vendedores': vendedores

	};

	//console.log("Function: "+funcao + " datade: "+data_de+ " dataate: " + data_ate);

	$.ajax ({
		url : pageUrlHome,
		data : dadosajax,
		type : 'POST',
		cache : true,

		error : function (){
			alert (acentuarMsn('Error TC.JS/95 - Erro na função de mudar gráfico,' + msnPadrao + '.'));
		},
		success : function(result){
			//$('#log').html(result);
			$('#chart_div').html(result);


			// $('document').ready(function(){
			// 	vendedores = $("input#vendedores").val();
            //
			// });

			//resultado = result.split('&');

		}
	});

}

function atualizaFaturamentoAnualLocais (funcao, local_id) {
	var dadosajax = {
		'funcao' : funcao,
		'local':local_id
	};

	$.ajax ({
		url : pageUrlHome,
		data : dadosajax,
		type : 'POST',
		cache : true,

		error : function (){
			alert (acentuarMsn('Error TC.JS/95 - Erro na função de mudar gráfico,' + msnPadrao + '.'));
		},
		success : function(result){

			resultado = result.split('&');
			//$('#log').html(resultado[0]);
			//alert(resultado[0]);
			//console.log(teste+':'+resultado[0]);
			$('#grafico_linha').html(resultado[1]);

		}
	});

}

function carregarGraficoRenovacoes () {
    /*
     * LIMPA GRAFICOS
     * */
    $('#graficoRenovacoes').html('');

    if ((typeof window['filtroUsuariosCertificados'] !== 'undefined') && (Array.isArray(window['filtroUsuariosCertificados'])))
        consultores = window['filtroUsuariosCertificados'];
    else
        consultores = '';

    var filtros = {
        'filtroPeriodo': $('#filtroPeriodoGraficos').val(),
        'filtroConsultores':consultores,
    };

    var dadosajax = {
        'funcao' : 'carregar_grafico_renovacoes',
        'filtros': filtros,
    };

    $.ajax ({
        url : pageUrlHome,
        data : dadosajax,
        type : 'POST',
        cache : true,
        beforeSend: function () {
            $('#graficoRenovacoes').html('');
            $('#totalRenovacoes').html('...');
            $('#divLoadingGraficoRenovacao').html('<i class="fa fa-5x fa-circle-o-notch fa-spin text-info"></i>').css({'text-align':'center'});
            $('#btnListarCertificados').css({visibility:'hidden', display:'none'});
        },
        complete: function (){
            $('#divLoadingGraficoRenovacao').html('');
            $('#btnListarCertificados').css({visibility:'visible', display:'block'});
        },

        error : function (){
            alertErro ('Error CD1001 - Erro ao carregar gr&aacute;fico de renova&ccedil;&otilde;es.,' + msnPadrao + ' '+e + '.');
        },
        success : function(result){
            try {
                resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {

                    $('#totalRenovacoes').html(resultado.totalQuantidadeRenovacoes + ' ('+ resultado.totalValorRenovacoes + ')' );
                    google.charts.load('current', {'packages':['corechart']});

                    google.charts.setOnLoadCallback(drawChart);
                    function drawChart() {

                        var options = {
                            title: 'Teste grafico Pizza'
                        };

                        /// Create our data table out of JSON data loaded from server.
                        data = new google.visualization.DataTable(resultado.dadosGrafico);

                        var options = {'title':'Renovações',
                            chartArea:{left:20,top:0,width:'100%',height:'100%'},
                            slices: [{color: 'black'}, {color: '#960018'}, {color: '#E23D28'}, {color: '#22ff91'}, {color: '#33cc33'}],
                            pieHole: 0.4,
                            is3D: true,
                        };
                        // Instantiate and draw our chart, passing in some options.
                        chart = new google.visualization.PieChart(document.getElementById('graficoRenovacoes'));
                        chart.draw(data, options);
                    }
                }
            } catch (e) {
                console.log(result, e);
                alertErro ('Error CD1002 - Erro ao carregar gr&aacute;fico de renova&ccedil;&otilde;es.,' + msnPadrao + ' '+e + '.');
            }


        }
    });

}

function carregarListaCertificadosRenovados () {
    $('#mensagemLoading').html('<i class="fa fa-search-plus" aria-hidden="true"></i> Carregando lista de certificados Renovados');
    $('#modalCarregando').modal('show');

    if ((typeof window['filtroUsuariosCertificados'] !== 'undefined') && (Array.isArray(window['filtroUsuariosCertificados'])))
        consultores = window['filtroUsuariosCertificados'];
    else
        consultores = '';

    var filtros = {
        'filtroPeriodo': $('#filtroPeriodoGraficos').val(),
        'filtroConsultores':consultores,
    };

    var dadosajax = {
        'funcao' : 'carregar_lista_certificados_renovados',
        'filtros': filtros,
    };

    $.ajax ({
        url : pageUrlHome,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error CD2001 - Erro ao carregar lista de certificados renovados.,' + msnPadrao + ' '+e + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            try {
                $('#modalCarregando').modal('hide');
                resultado = JSON.parse(result);
                listaCertificados = JSON.parse(resultado.listaCertificados);
                quantidadesCertificados = JSON.parse(listaCertificados.quantidadesCertificados);

                if (resultado.mensagem == 'Ok') {
                    montarTabelaDinamica(listaCertificados.colunas, listaCertificados.cdsVencidos, 'tabelaCertificadosVencidos', 'divCertificadosVencidosListar');
                    $('#numerosCdsVencidos').html('qtd:'+quantidadesCertificados.vencidos.quantidade + ' | ' + quantidadesCertificados.vencidos.valores);

                    montarTabelaDinamica(listaCertificados.colunas, listaCertificados.cdsRenovados, 'tabelaCertificadosRenovados', 'divCertificadosRenovadosListar');
                    $('#numerosCdsRenovados').html('qtd:'+quantidadesCertificados.renovados.quantidade + ' | ' + quantidadesCertificados.renovados.valores);

                    montarTabelaDinamica(listaCertificados.colunas, listaCertificados.cdsARenovarSemPedidos, 'tabelaCertificadosARenovarSemPedidos', 'divCertificadosARenovarSemPedidos');
                    $('#numerosCdsARenovarSemPedidos').html('qtd:'+quantidadesCertificados.aRenovarSemPedidos.quantidade + ' | ' + quantidadesCertificados.aRenovarSemPedidos.valores);

                    montarTabelaDinamica(listaCertificados.colunas, listaCertificados.cdsARenovarComPedidosEmAberto, 'tabelaCertificadosARenovarComPedidosEmAberto', 'divCertificadosARenovarEmAbertoListar');
                    $('#numerosCdsARenovarEmAberto').html('qtd:'+quantidadesCertificados.aRenovarComPedidosEmAberto.quantidade + ' | ' + quantidadesCertificados.aRenovarComPedidosEmAberto.valores);

                    montarTabelaDinamica(listaCertificados.colunas, listaCertificados.cdsARenovarComPedidosPagos, 'tabelaCertificadosARenovarComPedidosPagos', 'divCertificadosARenovarPagosListar');
                    $('#numerosCdsARenovarPagos').html('qtd:'+quantidadesCertificados.aRenovarComPedidosPagos.quantidade + ' | ' + quantidadesCertificados.aRenovarComPedidosPagos.valores);
                }
            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro ('Error CD2002 - Erro ao carregar lista de certificados renovados.,' + msnPadrao + ' '+e + '.');
            }


        }
    });

}

function carregarGraficosPedidos (carregarGraficoContadores) {
    /*
    * LIMPA GRAFICOS
    * */
    $('#graficoTipoPedidos').html('');
    $('#graficoFormas').html('');
    $('#graficoContadores').html('');

    if ((typeof window['filtroUsuariosCertificados'] !== 'undefined') && (Array.isArray(window['filtroUsuariosCertificados'])))
        consultores = window['filtroUsuariosCertificados'];
    else
        consultores = '';

    var filtros = {
        'filtroPeriodo': $('#filtroPeriodoGraficos').val(),
        'filtroConsultores':consultores,
    };

    var dadosajax = {
        'funcao' : 'carregar_grafico_pedidos',
        'filtros': filtros,
        'carregarGraficoContadores':carregarGraficoContadores
    };

    $.ajax ({
        url : pageUrlHome,
        data : dadosajax,
        type : 'POST',
        cache : true,
        beforeSend: function () {
            $('#graficoTipoPedidos').html('');
            $('#totalTipoPedidos').html('...');
            $('#divLoadingGraficoTipoPedidos').html('<i class="fa fa-5x fa-circle-o-notch fa-spin text-info"></i>').css({'text-align':'center'});
            $('#divLoadingGraficoFormas').html('<i class="fa fa-5x fa-circle-o-notch fa-spin text-info"></i>').css({'text-align':'center'});
            if (carregarGraficoContadores=='sim')
                $('#divLoadingGraficoContadores').html('<i class="fa fa-5x fa-circle-o-notch fa-spin text-info"></i>').css({'text-align':'center'});

        },
        complete: function (){
            $('#divLoadingGraficoTipoPedidos').html('');
            $('#divLoadingGraficoFormas').html('');
            if (carregarGraficoContadores=='sim')
                $('#divLoadingGraficoContadores').html('');
        },

        error : function (){
            alertErro ('Error CD3001 - Erro ao carregar gr&aacute;ficos de pedidos.,' + msnPadrao + ' '+e + '.');
        },
        success : function(result){
            try {
                resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {

                    $('#totalTipoPedidos').html(resultado.totalQuantidadePedidos + ' ('+ resultado.totalValorPedidos + ')' );

                    google.charts.load('current', {'packages':['corechart']});

                    /*
                    * CARREGA GRAFICO TIPO DE PEDIDOS
                    * */
                    google.charts.setOnLoadCallback(drawChart);
                    function drawChart() {

                        var options = {
                            title: 'Teste grafico Pizza2'
                        };

                        /// Create our data table out of JSON data loaded from server.
                        data = new google.visualization.DataTable(resultado.dadosGrafico);

                        var options = {'title':'Tipos de pedidos',
                            chartArea:{left:20,top:0,width:'100%',height:'100%'},
                            slices: [{color: '#33ccff'}, {color: '#ffcc00'}, {color: '#33cc33'}],
                            pieHole: 0.4,
                        };
                        // Instantiate and draw our chart, passing in some options.
                        chart = new google.visualization.PieChart(document.getElementById('graficoTipoPedidos'));
                        chart.draw(data, options);

                    }

                    /*
                     * CARREGA GRAFICO DE FORMA DE PAGAMENTOS
                     * */

                    google.charts.load('current', {'packages':['corechart']});

                    google.charts.setOnLoadCallback(drawChartFormas);
                    function drawChartFormas() {

                        var options = {
                            title: 'Teste grafico Pizza3'
                        };

                        /// Create our data table out of JSON data loaded from server.
                        data = new google.visualization.DataTable(resultado.dadosGraficoForma);

                        var options = {'title':'Tipos de pedidos',
                            chartArea:{left:20,top:0,width:'100%',height:'100%'},
                        };
                        // Instantiate and draw our chart, passing in some options.
                        chart = new google.visualization.PieChart(document.getElementById('graficoFormas'));
                        chart.draw(data, options);

                    }

                    if (carregarGraficoContadores=='sim') {
                        $('#totalContadores').html(resultado.quantidadeTotalContadores);
                        /*
                         * CARREGA GRAFICO PEDIDOS DE CONTADORES
                         * */

                        google.charts.load('current', {'packages':['corechart']});

                        google.charts.setOnLoadCallback(drawChartContadores);
                        function drawChartContadores() {

                            var options = {
                                title: 'Teste grafico Pizza4'
                            };

                            /// Create our data table out of JSON data loaded from server.
                            data = new google.visualization.DataTable(resultado.dadosGraficoContadores);

                            var options = {'title':'Pedidos dos Contadores',
                                chartArea:{left:20,top:0,width:'100%',height:'100%'},
                            };
                            // Instantiate and draw our chart, passing in some options.
                            chart = new google.visualization.PieChart(document.getElementById('graficoContadores'));
                            chart.draw(data, options);

                        }
                    }

                }
            } catch (e) {
                console.log(result, e);
                alertErro ('Error CD3002 - Erro ao carregar gr&aacute;ficos de pedidos.,' + msnPadrao + ' '+e + '.');
            }


        }
    });

}

function carregarGraficoContadores () {
    /*
     * LIMPA GRAFICOS
     * */
    $('#graficoContadores').html('');

    if ((typeof window['filtroUsuariosCertificados'] !== 'undefined') && (Array.isArray(window['filtroUsuariosCertificados'])))
        consultores = window['filtroUsuariosCertificados'];
    else
        consultores = '';

    var filtros = {
        'filtroPeriodo': $('#filtroPeriodoGraficos').val(),
        'filtroConsultores':consultores,
    };

    var dadosajax = {
        'funcao' : 'carregar_grafico_pedidos_contadores',
        'filtros': filtros,
    };

    $.ajax ({
        url : pageUrlHome,
        data : dadosajax,
        type : 'POST',
        cache : true,
        beforeSend: function () {
            $('#divLoadingGraficoContadores').html('<i class="fa fa-5x fa-circle-o-notch fa-spin text-info"></i>').css({'text-align':'center'});
            $('#btnCarregarContadores').css({visibility:'hidden', display:'none'});
        },
        complete: function (){
            $('#divLoadingGraficoContadores').html('');
        },

        error : function (){
            alertErro ('Error CD3001 - Erro ao carregar gr&aacute;ficos de pedidos.,' + msnPadrao + ' '+e + '.');
        },
        success : function(result){
            try {
                resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {


                    $('#totalContadores').html('<label>Total de Contadores:</label>' + resultado.quantidadeTotalContadores);
                    $('#totalContadoresCadastrados').html('<label>Total de Contadores Cadastrados:</label>' + resultado.quantidadeTotalContadoresCadastrados);
                    $('#totalContadores').css({visibility:'visible', display:'block'});
                    /*
                     * CARREGA GRAFICO PEDIDOS DE CONTADORES
                     * */

                    google.charts.load('current', {'packages':['corechart']});

                    google.charts.setOnLoadCallback(drawChartContadores);
                    function drawChartContadores() {

                        var options = {
                            title: 'Teste grafico Pizza4'
                        };

                        /// Create our data table out of JSON data loaded from server.
                        data = new google.visualization.DataTable(resultado.dadosGraficoContadores);

                        var options = {'title':'Pedidos dos Contadores',
                            chartArea:{left:20,top:0,width:'100%',height:'100%'},
                        };
                        // Instantiate and draw our chart, passing in some options.
                        chart = new google.visualization.PieChart(document.getElementById('graficoContadores'));
                        chart.draw(data, options);

                    }


                }
            } catch (e) {
                console.log(result, e);
                alertErro ('Error CD3002 - Erro ao carregar gr&aacute;ficos de pedidos.,' + msnPadrao + ' '+e + '.');
            }


        }
    });

}
function foco(src) {
	$(src).first().focus();
    alert('Focus Detalhar');
}