var msnPadrao = 'entre em contato com o administrador do sistema (3321-5061)';

var pageUrl = 'funcoes/funcoesParceiro.php';

function valida(src) {
    if(src.value == ""){
        $('#insParceiro').attr('disabled', true);
        $('#altParceiro').attr('disabled', true);
        $('#insContato').attr('disabled', true);
        $('#altContato').attr('disabled', true);
        src.style.background='red';
        src.style.color= 'white';
    }else{
        $('#insParceiro').attr('disabled', false);
        $('#altParceiro').attr('disabled', false);
        $('#insContato').attr('disabled', false);
        $('#altContato').attr('disabled', false);
        src.style.background='white';
        src.style.color= 'black';
    }
}

function recupera_parceiro_id(parceiro_id){
    var dadosajax = {
        'parceiro_id' : parceiro_id
    };

    console.log(dadosajax['parceiro_id']);
    document.getElementById('idParceiro').value = dadosajax['parceiro_id'];
}
function recupera_usuario(usuario_id){
    var dadosajax = {
        'usuario_id' : usuario_id
    };

    console.log(dadosajax['usuario_id']);
    document.getElementById('idUsuario').value = dadosajax['usuario_id'];
}
function limpar_formulario_vincular_usuario() {
    $('#rpEdtUsuario').val('');
    $('#rpEdtUsuario').selectpicker('render');

    $('#rpEdtTipo').val('');
    $('#rpEdtTipo').selectpicker('render');

}

function limpar_formulario_inserir() {
    $('#divBotoesTipoCanal').css({visibility: 'visible', display: 'block'});
    $('#divComissionamento').css({visibility: 'hidden', display: 'none'});
    $("#acaoParceiro").val('inserir');

    $('#ipEdtNome').val('');
    $('#ipEdtEmpresa').val('');
    $('#ipEdtCnpj').val('');
    $('#ipEdtEndereco').val('');
    $('#ipEdtComplemento').val('');
    $('#ipEdtBairro').val('');
    $('#ipEdtCidade').val('');
    $('#ipEdtNumero').val('');
    $('#ipEdtEmail').val('');
    $('#ipEdtUf').val('');
    $('#ipEdtCep').val('');
    $('#ipEdtFone').val('');
    $('#ipEdtCelular').val('');
    $('#ipEdtBanco').val('');
    $('#ipEdtAgencia').val('');
    $('#ipEdtConta').val('');
    $('#ipEdtOperacao').val('');
    $('#ipEdtLocal').val('');
    $('#ipEdtLocal').selectpicker('render');
}
function salvar_parceiro(acao){
    if (acao == 'inserir')
        mensagemCarregando = 'Salvando novo Parceiro';
    else if (acao == 'editar')
        mensagemCarregando = 'Salvando Parceiro editado';

    $('#mensagemModalEspera').html('<i class="fa fa-lg fa-cart-plus"></i> '+mensagemCarregando);
    $('#esperaModal').modal('show');
    var dadosajax = {
        'funcao' : 'salvar_parceiro',
        'idParceiro' : $('#idParceiroEditando').val(),
        'cnpj' : $('#ipEdtCnpj').val(),
        'empresa' : $('#ipEdtEmpresa').val(),
        'nome':$('#ipEdtNome').val(),
        'endereco' :  $('#ipEdtEndereco').val(),
        'numero' :  $('#ipEdtNumero').val(),
        'complemento' :  $('#ipEdtComplemento').val(),
        'bairro' : $('#ipEdtBairro').val(),
        'cidade' : $('#ipEdtCidade').val(),
        'uf' : $('#ipEdtUf').val(),
        'cep' : $('#ipEdtCep').val(),
        'celular' : $('#ipEdtCelular').val(),
        'fone' : $('#ipEdtFone').val(),
        'email' : $('#ipEdtEmail').val(),
        'banco' : $('#ipEdtBanco').val(),
        'agencia' : $('#ipEdtAgencia').val(),
        'conta' : $('#ipEdtConta').val(),
        'operacao' : $('#ipEdtOperacao').val(),
        'local_id' : $('#ipEdtLocal').val(),
        'comissao_venda':$('#ipEdtComissaoVenda').val(),
        'comissao_validacao':$('#ipEdtComissaoValidacao').val(),
        'comissao_venda_validacao':$('#ipEdtComissaoVendaValidacao').val(),
        'observacao':$('#ipEdtObservacao').val(),
        'tipo_canal' : $('input[name=edtTipoCanal]:checked').val()
    };

    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,

        error : function (){
            alertErro('Error TC.JS/1209 - Erro na ação de inserir parceiro,' + msnPadrao + '.');
            $('#esperaModal').modal('hide');
        },
        success : function(result){
            $('#esperaModal').modal('hide');
            if (result.trim() == 'Ok') {
                if (acao == 'inserir')
                    alertSucesso('Parceiro inserido com sucesso!');
                else
                    alertSucesso('Parceiro alterado com sucesso!');

                $('#modalSalvarParceiro').modal('hide');
                if (acao == 'editar')
                    detalhar_parceiro($('#idParceiroEditando').val());
                else if (acao == 'inserir')
                    carregar_parceiros(0, 50,'sim');
            }else{
                alertErro('Error TC.JS/2345 - Erro ao inserir parceiro,' + msnPadrao + '.');
                console.log(result);
            }
        }
    });


}

function carregar_usuarios_parceiro(parceiro_id){
    $('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Carregando Usu&aacute;rios do parceiro');

    var dadosajax = {
        'parceiro_id' : parceiro_id,
        'funcao' : "carregar_usuarios"
    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro('Error TMF.JS/7231 - Erro na ação de carregar usuários do parceiro,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            $('#modalCarregando').modal('hide');
            var usuarios = result.split('&&');
            if (usuarios[0].trim()=='Ok') {

                $('#divTabelaUsuariosParceiro').html('');
                montarTabelaDinamica(usuarios[1], usuarios[2], 'dpTableUsuarios', 'divTabelaUsuariosParceiro');
            }else{
                $('#modalCarregando').modal('hide');
                console.log(result);
                alertErro('Error TC.JS/8634 - Erro ao carregar usuários do parceiro,' + msnPadrao + '.');
            }
        }
    });
}

function vincular_usuario_parceiro(){
    $('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Vinculando usu&aacute;rio ao parceiro');
    $('#modalCarregando').modal('show');

    var dadosajax = {
        'funcao' : 'relacionar_parceiro',
        'parceiro_id' : $('#parceiro_escolhido_id').val(),
        'tipo_usuario' : $('#rpEdtTipo').val(),
        'usuario_relacionado' : $('#rpEdtUsuario').val()
    };
    console.log(dadosajax);
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            $('#modalCarregando').modal('hide');
            alertErro ('Error TC.JS/104 - Erro na ação de relacionar parceiro,' + msnPadrao + '.');
        },
        success : function(result){
            console.log(result);
            if (result == 'Ok') {
                var parceiro = result.split(';');
                alertSucesso('Usuário vinculado com sucesso!');
                $('#relacionarUsuarioParceiro').modal('hide');
                detalhar_parceiro($('#parceiro_escolhido_id').val());
            }else{
                $('#modalCarregando').modal('hide');
                erro = result.split('&&');
                if (erro[0].trim() == 'mensagemErro') {
                    alertErro(erro[1]);
                }
                else {
                    alertErro('Error TC.JS/112 - Erro ao relacionar usuário ao parceiro,' + msnPadrao + '.');
                    console.log(result);
                }
            }
        }
    });
}

function desvincular_parceiro(){
    $('#mensagemLoading').html('<i class="fa fa-lg fa-trash"></i> Denvinculando parceiro');
    $('#modalCarregando').modal('show');

    var dadosajax = {
        'funcao' : 'desvincular_parceiro',
        'parceiro_id' : $('#idParceiroDesvincular').val(),
        'usuario_relacionado' : $('#idUsuarioDesvincular').val()
    };
    console.log(dadosajax);
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error TC.JS/104 - Erro na ação de desvincular parceiro,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            console.log(result);
            if (result) {
                var parceiro = result.split(';');
                alertSucesso('Usuário desvinculado com sucesso!');
                $('#desvincularUsuario').modal('hide');
                detalhar_parceiro($('#parceiro_escolhido_id').val());
            }else{
                alertErro('Error TC.JS/112 - Erro ao desvincular parceiro,' + msnPadrao + '.');
                console.log(result);
            }
        }
    });
}

function carregar_dados_parceiro(){

    $('#mensagemModalEspera').html('<i class="fa fa-lg fa-edit"></i> Carregando dados do Parceiro');
    $('#esperaModal').modal('show');

    /*TROCA A ACAO DO PARCEIRO DE INSERIR PRA EDITAR*/
    $('#acaoParceiro').val('editar');
    $('#idParceiroEditando').val($('#parceiro_escolhido_id').val());
    var dadosajax = {
        'parceiro_id': $('#parceiro_escolhido_id').val(),
        'funcao': 'carregar_dados_parceiro',
    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error TC.JS/424 - Erro na ação editar parceiro,' + msnPadrao + '.');
            $('#esperaModal').modal('hide');
        },
        success : function(result){
            $('#esperaModal').modal('hide');
            resultado = result.split('&&');
            if (resultado[0].trim()=='Ok') {
                var parceiro = JSON.parse(resultado[1]);
                $('#ipEdtNome').val(parceiro.nome);
                $('#ipEdtEmpresa').val(parceiro.empresa);
                $('#ipEdtCnpj').val(parceiro.cnpj);
                $('#ipEdtEndereco').val(parceiro.endereco);
                $('#ipEdtComplemento').val(parceiro.complemento);
                $('#ipEdtBairro').val(parceiro.bairro);
                $('#ipEdtCidade').val(parceiro.cidade);
                $('#ipEdtNumero').val(parceiro.numero);
                $('#ipEdtEmail').val(parceiro.email);
                $('#ipEdtUf').val(parceiro.uf);
                $('#ipEdtCep').val(parceiro.cep);
                $('#ipEdtFone').val(parceiro.fone);
                $('#ipEdtCelular').val(parceiro.celular);
                $('#ipEdtBanco').val(parceiro.banco);
                $('#ipEdtAgencia').val(parceiro.agencia);
                $('#ipEdtConta').val(parceiro.conta_corrente);
                $('#ipEdtOperacao').val(parceiro.operacao);
                $('#ipEdtLocal').val(parceiro.local);
                $('#ipEdtLocal').selectpicker('render');
                $('#ipEdtComissaoVenda').val(parceiro.comissaoVenda);
                $('#ipEdtComissaoValidacao').val(parceiro.comissaoValidacao);
                $('#ipEdtComissaoVendaValidacao').val(parceiro.comissaoVendaValidacao);
                $('#ipEdtObservacao').val(parceiro.observacao);
                $('#labelTipoCanal').html(': ' + parceiro.tipoCanal);

                if (parceiro.tipoCanal ==  'unidade') {
                    /*
                     * ESCONDE A OPCAO DE EDITAR O CANAL NO MOMENTO DA EDICAO
                     * */
                    $('#divBotoesTipoCanal').css({visibility: 'hidden', display: 'none'});
                    $('#divComissionamento').css({visibility: 'hidden', display: 'none'});

                } else {
                    $('#divBotoesTipoCanal').css({visibility: 'visible', display: 'block'});
                    $('#divComissionamento').css({visibility: 'visible', display: 'block'});

                }



            }
            else {
                alertErro('Error TC.JS/444 - Erro ao carregar dados do parceiro,' + msnPadrao + '.');
                console.error(result);
            }

        }

    });
}

function detalhar_parceiro(parceiro_id){
    $('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Carregando a p&aacute;gina de detalhes do parceiro');
    $('#modalCarregando').modal('show');

    $('#parceiro_escolhido_id').val(parceiro_id);
    var dadosajax = {
        'filtroDataComissao':$('#filtroDataComissaoParceiro').val(),
        'parceiro_id' : parceiro_id,
        'funcao' : "detalhar_parceiro"
    };
    $.ajax ({
        url : 'funcoes/funcoesParceiro.php',
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error TMF.JS/71 - Erro na ação de detalhar parceiro,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            try {
                var parceiro = JSON.parse(result);
                var dadosComissao = parceiro.dadosComissao;

                $('#dpSpanIdParceiro').html(parceiro.id);
                $('#dpSpanNomeParceiro').html(parceiro.nome);
                $('#dpSpanContatos').html(parceiro.contatos);
                $('#btnBloqueio').html(parceiro.btnBloqueio);

                if (parceiro.registroComissao=='sim') {
                    if (parceiro.comissaoPaga == 'sim')
                        $('#btnNovoLancamentoParceiro').css({display:'none', visibility:'hidden'});
                    else
                        $('#btnNovoLancamentoParceiro').css({display:'block', visibility:'visible'});

                    $('#btnRegistrarComissao').css({display:'none', visibility:'hidden'});
                    $('#smalldataRegistroComissao').html(' Data de Registro: ' +parceiro.dataRegistroComissao + ' (' + parceiro.periodoRegistroComissao + ')' + parceiro.iconeApagarRegistroComissao);

                    $('#registro_comissao_id').val(parceiro.comissionamentoId);
                }
                else {
                    $('#smalldataRegistroComissao').html('');
                    $('#registro_comissao_id').val('');
                    $('#btnRegistrarComissao').css({display:'block', visibility:'visible'});
                    $('#btnNovoLancamento').css({display:'none', visibility:'hidden'});
                }


                if (dadosComissao) {

                    montarTabelaDinamica(dadosComissao.colunasQuadroResumo, dadosComissao.quadroResumo, 'mpTabelaQuadroResumo', 'divQuadroResumoComissao', 'table table-bordered');

                    $('#mpSpanComissaoVendasValidacoes').html(dadosComissao.comissaoVendaValidacao);
                    $('#mpSpanComissaoVendas').html(dadosComissao.comissaoVenda);
                    $('#mpSpanComissaoValidacoes').html(dadosComissao.comissaoValidacao);

                    /*JA PREENCHE OS CAMPOS COM OS PECENTUAIS DE COMISSAONO MODAL DE REGISTRO */
                    $('#spanRcComissaoVendasValidacoes').html(dadosComissao.comissaoVendaValidacao);
                    $('#spanRcComissaoVendas').html(dadosComissao.comissaoVenda);
                    $('#spanRcComissaoValidacoes').html(dadosComissao.comissaoValidacao);

                    $('#mpSpanVendas').html(dadosComissao.vendas);
                    $('#mpSpanValidacoes').html(dadosComissao.validacoes);
                    $('#mpSpanVendasValidacoes').html(dadosComissao.vendasValidacoes);

                    /*JA PREENCHE OS CAMPOS COM OS VALORES DE VENDA VALIDACAO E VENDA E VALIDACAO NO MODAL DE REGISTRO */
                    $('#spanRcVendasValidacoes').html(dadosComissao.vendasValidacoes);
                    $('#spanRcVendas').html(dadosComissao.vendas);
                    $('#spanRcValidacoes').html(dadosComissao.validacoes);

                    /*REGISTRA NO INPUT OS VALORES DE VENDA VALIDACAO E VENDA E VALIDACAO PARA FINS DE REGISTRO NO BANCO*/
                    $('#valorVendaValidacao').val(dadosComissao.valorVendasValidacoes);
                    $('#valorVenda').val(dadosComissao.valorVendas);
                    $('#valorValidacao').val(dadosComissao.valorValidacoes);

                    /*MONTA TABELA DE COMISSAO DINAMICAMENTE*/
                    montarTabelaDinamica(dadosComissao.colunasCertificadosVendidosValidados, dadosComissao.certificadosVendidosValidados, 'mpTabelaCdsVendidosValidados', 'divCertificadosVendidosValidados')
                    montarTabelaDinamica(dadosComissao.colunasCertificadosVendidos, dadosComissao.certificadosVendidos, 'mpTabelaCdsVendidos', 'divCertificadosVendidos');
                    montarTabelaDinamica(dadosComissao.colunasCertificadosValidados, dadosComissao.certificadosValidados, 'mpTabelaCdsValidados', 'divCertificadosValidados');

                }

                carregar_usuarios_parceiro(parceiro_id);

            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error TC.JS/86 - Erro ao detalhar parceiro,' + msnPadrao + '.');
            }
        }
    });
}

function bloquear_parceiro(parceiro_id, acao){
    $('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Bloqueando/Desbloqueando o parceiro');
    $('#modalCarregando').modal('show');

    $('#parceiro_escolhido_id').val(parceiro_id);
    var dadosajax = {
        'parceiro_id' : parceiro_id,
        'acao': acao,
        'funcao' : "bloquear_parceiro"
    };
    $.ajax ({
        url : 'funcoes/funcoesParceiro.php',
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error TMF.JS/71 - Erro na ação de detalhar parceiro,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            resultado = result.split(';')
            if (resultado[0].trim()=='Sucesso') {
                alertSucesso('Parceiro '+ resultado[1] + ' com sucesso');
                detalhar_parceiro(parceiro_id);
            } else {
                $('#modalCarregando').modal('hide');
                console.log(result);
                alertErro('Error TC.JS/86 - Erro ao bloquear/desbloquear o parceiro,' + msnPadrao + '.');
            }
        }
    });
}

function apagar_parceiro(){
    $('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Apagando o parceiro');
    $('#modalCarregando').modal('show');

    var dadosajax = {
        'parceiro_id' : $('#parceiro_escolhido_id').val(),
        'funcao' : "apagar_parceiro"
    };
    $.ajax ({
        url : 'funcoes/funcoesParceiro.php',
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error TMF.JS/4371 - Erro na a&ccedil;&atilde;o de apagar parceiro,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            if (result.trim()=='Sucesso') {
                alertSucesso('Parceiro apagado com sucesso');
                carregar_parceiros(0, 50,'sim');
            } else {
                $('#modalCarregando').modal('hide');
                console.log(result);
                alertErro('Error TC.JS/82346 - Erro ao tentar apagar o parceiro,' + msnPadrao + '.');
            }
            $('#modalCarregando').modal('hide');
        }
    });
}

function carregar_parceiros(paginaSelecionada, qtdItensPorPagina, carregarDivPaginacao){
   /* if (paginando == 'paginar') {
        $('#mensagemLoading').html('<i class="fa fa-folder-open-o"></i> Paginando...');
        $('#modalCarregando').modal('show');
    } else
        $('#mensagemLoading').html('<i class="fa fa-lg fa-user-circle "></i> Carregando a lista de parceiros');*/

    if (carregarDivPaginacao == 'sim')
        var carregarPaginacao = carregarDivPaginacao;
    else
        var carregarPaginacao = '';

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

    var filtroCanal = '';
    if ($('#filtroEscolheCanal').prop('checked')) {
        var filtroCanal = $('#filtroChkTipoCanal').prop('checked');
    }

    filtros = {
        'campoFiltro' : camposFiltro,
        'filtroCanal' : filtroCanal
    };

    var dadosajax = {
        'funcao' : "carregar_parceiros",
        'pagina' : pagina,
        'itensPorPagina' : qtdItens,
        'filtros' : filtros
    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error TMF.JS/7539 - Erro na ação de carregar parceiros,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        beforeSend: function () {
            /*CHAMA A TELA QUE CARREGA O FILTRO DE USUARIOS*/
            $('#divTabelaParceiros').html('<img src="img/carregando.gif">').css({'text-align':'center'});
            $('.paginacao').css({ visibility: 'hidden'});
        },
        complete : function ( ) {
            $('.paginacao').css({ visibility: 'visible'});

        },
        success : function(result){
            try {
                var parceiros = JSON.parse(result);
                if (parceiros.mensagem == 'Ok') {
                    montarTabelaDinamica(parceiros.colunas, parceiros.dados, 'tabelaParceiros', 'divTabelaParceiros');
                    $('#qtdParceirosConsulta').html('<label>Qtd: '+parceiros.quantidadeTotal +'</label> | <a href="#"> <i class="fa fa-building-o" aria-hidden="true"></i></a> Canais | Legenda: '+ '<i class="fa fa-circle" style="color: #3d8b3d" aria-hidden="true"></i> Parceiros Comerciais | <i class="fa fa-circle" style="color: #0b62a4" aria-hidden="true"></i> Unidades Pr&oacute;prias');
                    if (carregarPaginacao)
                        mostrar_paginacao(parceiros.quantidadeTotal, 50, carregar_parceiros, 'paginacaoParceiroTopo', 'paginacaoParceiroRodape');
                }
            } catch (e) {
                console.log(result, e);
                $('#modalCarregando').modal('hide');
                alertErro(acentuarMsn('Error US002 - Erro ao carregar Usu&aacute;rios,' +' '+e + ' '+ msnPadrao + '.'));
            }

        }
    });
}

/*function carregar_dados_paginacao () {
    $('#modalCarregando').modal('show');

    /!*NOME E CAMPO DE FILTRO POR (IGUAL A)*!/
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
        'funcao' : "carregar_dados_paginacao",
        'filtros' : filtros
    };
    $.ajax ({
        url : 'funcoes/funcoesParceiro.php',
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error TMF.JS/2351 - Erro ao carregar dados da pagina&ccedil;&atilde;o,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            if (result.trim()!='') {
                var qtdParceiros = result;
                mostrar_paginacao(qtdParceiros, 20, carregar_parceiros, 'paginacaoParceiroTopo', 'paginacaoParceiroRodape');
            }
        }
    });

}*/

function carregarModalRegistroComissoesParceiro() {
    /*
    TODO: PRECISO TERMINAR ESTA ROTINA PRA BUSCAR NO BANCO AS INFORMACOES QUE FICARAM REGISTRADAS NO BANCO NOS MESES ANTERIORES
    * */
    var periodos = $('#filtroDataComissaoParceiro').val().split(',');

    $('#spanRcPeriodoDe').html(periodos[0]);
    $('#spanRcPeriodoAte').html(periodos[1]);
    $('#spanRcDescricao').html('Comissão do parceiro' + $('#dpSpanNomeParceiro').html() + ' do período de ' + periodos[0] + ' até ' + periodos[1]);


}

function registrarComissaoParceiro () {
    $('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Registrando comissionamento do parceiro');
    $('#modalCarregando').modal('show');


    var dadosajax = {
        'parceiro_id' : $('#parceiro_escolhido_id').val(),
        'funcao' : "registrar_comissao_parceiro",
        'descricao' : $('#spanRcDescricao').html(),
        'periodoDe' : $('#spanRcPeriodoDe').html(),
        'periodoAte' : $('#spanRcPeriodoAte').html(),
        'vendasValidacoes' : $('#valorVendaValidacao').val(),
        'vendas' : $('#valorVenda').val(),
        'validacoes' : $('#valorValidacao').val(),
        'comissaoVendasVelidacoes' : $('#spanRcComissaoVendasValidacoes').html(),
        'comissaoVendas' : $('#spanRcComissaoVendas').html(),
        'comissaoValidacoes' : $('#spanRcComissaoValidacoes').html(),

    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error 001 - Erro ao registrar a comiss&atilde;o do parceiro,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            try {
                resultado = JSON.parse(result);
                if (resultado.mensagem == 'Ok') {
                    alertSucesso('Comiss&atilde;o do parceiro registrada com sucesso!');

                    $('#modalParceiroRegistrarComissao').modal('hide');
                    detalhar_parceiro($('#parceiro_escolhido_id').val());

                }
            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error 002 - Erro ao registrar a comiss&atilde;o do parceiro,' + msnPadrao + '.');
            }
        }
    });

}


function registrarLancamentoComissao () {
    $('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Registrando lan&ccedil;amento na comissionamento do parceiro');
    $('#modalCarregando').modal('show');

    var dadosajax = {
        'funcao' : "registrar_lancamento_comissao_parceiro",
        'descricao' : $('#editRlDescricao').val(),
        'tipoLancamento' : $('#editRlTipoLancamento').val(),
        'valor' : $('#editRlValor').val(),
        'comissionamento_id' : $('#registro_comissao_id').val(),
        'editRlObservacao' : $('#registro_comissao_id').val(),

    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error 101 - Erro ao registrar lan&ccedil;amento na comiss&atilde;o do parceiro,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){;
            try {
                resultado = JSON.parse(result);
                if (resultado.mensagem == 'Ok') {
                    alertSucesso('Lan&ccedil;amento realizado com sucesso na comiss&atilde;o do parceiro!');

                    $('#modalParceiroRegistrarLancamentoComissao').modal('hide');
                    detalhar_parceiro($('#parceiro_escolhido_id').val());

                }
            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error 102 - Erro ao registrar  lan&ccedil;amento na comiss&atilde;o do parceiro,' + msnPadrao + '.');
            }
        }
    });

}

function apagarLancamentoComissao (idLancamentoComissaoParceiro) {
    $('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Apagando lan&ccedil;amento na comissionamento do parceiro');
    $('#modalCarregando').modal('show');

    var dadosajax = {
        'funcao' : "apagar_lancamento_comissao_parceiro",
        'idLancamentoComissaoParceiro' : idLancamentoComissaoParceiro,

    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error 201 - Erro ao apagar lan&ccedil;amento na comiss&atilde;o do parceiro,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){;
            try {
                resultado = JSON.parse(result);
                if (resultado.mensagem == 'Ok') {
                    alertSucesso('Lan&ccedil;amento apagado com sucesso na comiss&atilde;o do parceiro!');

                    detalhar_parceiro($('#parceiro_escolhido_id').val());

                }
            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error 202 - Erro ao apagar  lan&ccedil;amento na comiss&atilde;o do parceiro,' + msnPadrao + '.');
            }
        }
    });

}

function limparModalRegistrarLancamentoComissao () {
    $('#editRlDescricao').val('');
    $('#editRlValor').val('');
    $('#editRlObservacao').val('');

}


function apagarRegistroComissao (idRegistroComissao) {
    $('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Apagando registro da comissionamento do parceiro');
    $('#modalCarregando').modal('show');

    var dadosajax = {
        'funcao' : "apagar_registro_comissao_parceiro",
        'idRegistroComissao' : idRegistroComissao,

    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error 301 - Erro ao apagar registro de comiss&atilde;o do parceiro,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){;
            try {
                resultado = JSON.parse(result);
                if (resultado.mensagem == 'Ok') {
                    alertSucesso('Registro de comiss&atilde;o do parceiro apagado com sucesso!');

                    detalhar_parceiro($('#parceiro_escolhido_id').val());

                }
            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error 302 - Erro ao apagar registro de comiss&atilde;o do parceiro,' + msnPadrao + '.');
            }
        }
    });

}

