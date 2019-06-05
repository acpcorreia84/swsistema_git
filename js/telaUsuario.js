var msnPadrao = 'entre em contato com o administrador do sistema (3321-5061)';

var pageUrl = 'funcoes/funcoesUsuario.php';

function carregarUsuarios(paginaSelecionada, qtdItensPorPagina, carregarDivPaginacao) {
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
        'filtroBloqueados' : $('#filtroChkBloqueados').prop('checked'),
        'filtroComissionados' : $('#filtroChkComissionados').prop('checked'),
        'campoFiltro' : camposFiltro
    };

    var dadosajax = {
        'funcao' : 'carregar_usuarios',
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
            $('#divTabelaUsuarios').html('<img src="img/carregando.gif">').css({'text-align':'center'});
            $('.paginacao').css({ visibility: 'hidden'});
        },
        error : function(){
            alertErro(acentuarMsn('Error US001 - Erro ao carregar Usu&aacute;rios,' + ' '+ msnPadrao + '.'));
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            try {
                var usuarios = JSON.parse(result);
                if (usuarios.mensagem == 'Ok') {
                    montarTabelaDinamica(usuarios.colunas, usuarios.dados, 'tabelaUsuarios', 'divTabelaUsuarios');
                    $('#qtdUsuariosConsulta').html('<label>Qtd: '+usuarios.quantidadeTotalUsuarios +'</label> | <a href="#"> <i class="fa fa-users" aria-hidden="true"></i></a> Usu&aacute;rios Vinculados');
                    if (carregarPaginacao)
                        mostrar_paginacao(usuarios.quantidadeTotalUsuarios, 50, carregarUsuarios, 'paginacaoUsuariosTopo', 'paginacaoUsuariosRodape');
                }
            } catch (e) {
                console.log(result, e);
                $('#modalCarregando').modal('hide');
                alertErro(acentuarMsn('Error US002 - Erro ao carregar Usu&aacute;rios,' +' '+e + ' '+ msnPadrao + '.'));
            }
        },
        complete : function ( ) {
            $('.paginacao').css({ visibility: 'visible'});

        }
    });
};

function bloquearUsuario(usuarioId){
    $('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Bloqueando / Desbloqueando Usu&aacute;rio');
    $('#modalCarregando').modal('show');


    var dadosajax = {
        'usuarioId' : usuarioId,
        'funcao': 'bloquear_usuario'
    };

    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : false,

        error : function (){
            alertErro('Error US101 - Erro na a&ccedil;&atilde;o de bloquear usu&aacute;rio no sistema,' + ' '+ msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result) {
            if (result.trim() == 'Ok') {
                alertSucesso(acentuarMsn('Bloqueio/ Desbloqueio realizado com sucesso!'));
                $('#modalCarregando').modal('hide');
                carregarUsuarios(0, 50,'sim');
            }else {
                alertErro('Error US102 - Erro na a&ccedil;&atilde;o de bloquear usu&aacute;rio no sistema,' + ' '+ msnPadrao + '. Erro:'+ result);
            }
        }
    });
};

function apagarUsuario(usuarioId){
    $('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Apagando Usu&aacute;rio');
    $('#modalCarregando').modal('show');


    var dadosajax = {
        'usuarioId' : usuarioId,
        'funcao': 'apagar_usuario'
    };

    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : false,

        error : function (){
            alertErro(acentuarMsn('Error US201 - Erro na a&ccedil;&atilde;o de apagar usu&aacute;rio no sistema,' + msnPadrao + '.'));
            $('#modalCarregando').modal('hide');
        },
        success : function(result) {
            if (result.trim() == 'Ok') {
                alertSucesso('Usu&aacute;rio apagado com sucesso!');
                $('#modalCarregando').modal('hide');
                $('#modalUsuarioDetalhar').modal('hide');
                carregarUsuarios();
            }else {
                alertErro('Error US202 - Erro na a&ccedil;&atilde;o de apagar usu&aacute;rio no sistema,' + ' '+ msnPadrao + '. Erro:'+ result);
                $('#modalCarregando').modal('hide');
            }
        }
    });
};

function salvarUsuario(){
    if ($('#acaoUsuario').val() == 'inserir')
        var mensagemCarregando = 'Salvando novo Usu&aacute;rio';
    else if ($('#acaoUsuario').val() == 'editar')
        var mensagemCarregando = 'Salvando Usu&aacute;rio editado';

    $('#mensagemLoading').html('<i class="fa fa-lg fa-user-plus"></i> '+mensagemCarregando);
    $('#modalCarregando').modal('show');

    var dadosajax = {
        'funcao' : 'salvar_usuario',
        'idUsuario' : $('#idUsuario').val(),
        'cpf' : $('#edtInserirUsuarioCpf').val(),
        'nascimento' : $('#edtInserirUsuarioNascimento').val(),
        'nome':$('#edtInserirUsuarioNome').val(),
        'endereco' :  $('#edtInserirUsuarioEndereco').val(),
        'numero' :  $('#edtInserirUsuarioNumero').val(),
        'complemento' :  $('#edtInserirUsuarioComplemento').val(),
        'bairro' : $('#edtInserirUsuarioBairro').val(),
        'cidade' : $('#edtInserirUsuarioCidade').val(),
        'uf' : $('#edtInserirUsuarioUf').val(),
        'cep' : $('#edtInserirUsuarioCep').val(),
        'celular' : $('#edtInserirUsuarioCelular').val(),
        'fone' : $('#edtInserirUsuarioFone').val(),
        'email' : $('#edtInserirUsuarioEmail').val(),
        'perfil':$('#edtInserirUsuarioPerfil').val(),
        'setor':$('#edtInserirUsuarioSetor').val(),
        'local':$('#edtInserirUsuarioLocal').val(),
        'cargo':$('#edtInserirUsuarioCargo').val(),
        'limite_quantidade':$('#edtLimiteQuantidade').val(),
        'margem_desconto':$('#edtMargemDesconto').val()
    };

    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,

        error : function (){
            alertErro('Error US401 - Erro na a&ccedil;&aacute;o de inserir usu&aacute;rio,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            if (result.trim() == 'Ok') {
                if ($('#acaoUsuario').val() == 'inserir') {
                    alertSucesso('Usu&aacute;rio inserido com sucesso!');
                    carregarUsuarios();
                }
                else {
                    alertSucesso('Usu&aacute;rio alterado com sucesso!');
                    carregarModalDetalhesUsuario($('#idUsuario').val());
                }
                $('#modalCarregando').modal('hide');

                $('#modalUsuarioInserirEditar').modal('hide');

            }else{
                $('#modalCarregando').modal('hide');
                alertErro('Error US401 - Erro ao inserir usu&aacute;rio: ' + result+ '. '+ msnPadrao + '.');
                console.log(result);
            }
        }
    });
}

function carregarModalEditarUsuario(){
    $('#mensagemLoading').html('<i class="fa fa-lg fa-edit"></i> Carregando dados do Usu&aacute;rio');
    $('#modalCarregando').modal('show');

    /*TROCA A ACAO DO USUARIO DE INSERIR PRA EDITAR*/
    $('#acaoUsuario').val('editar');

    var dadosajax = {
        'usuarioId': $('#idUsuario').val(),
        'funcao': 'carregar_dados_usuario',
    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error US501 - Erro na a&ccedil;&atilde;o carregar tela de editar Usu&aacute;rio,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){

            try {
                resultado = JSON.parse(result);

                var usuario = JSON.parse(resultado.dadosUsuario);

                /*PRIMEIRO CARREGA OS CAMPOS E LIMPA TODOS PRA DESPOIS CHAMAR O CARREGAR*/
                limparModalInserirUsuario(usuario.perfil,usuario.setor, usuario.local, usuario.cargo );

                if (resultado.mensagem=='Ok') {
                    $('#edtInserirUsuarioCpf').val(usuario.cpf);
                    $('#edtInserirUsuarioNascimento').val(usuario.nascimento);
                    $('#edtInserirUsuarioNome').val(usuario.nome);
                    $('#edtInserirUsuarioCep').val(usuario.cep);
                    $('#edtInserirUsuarioEndereco').val(usuario.endereco);
                    $('#edtInserirUsuarioNumero').val(usuario.numero);
                    $('#edtInserirUsuarioUf').val(usuario.uf);
                    $('#edtInserirUsuarioBairro').val(usuario.bairro);
                    $('#edtInserirUsuarioCidade').val(usuario.cidade);
                    $('#edtInserirUsuarioCelular').val(usuario.celular);
                    $('#edtInserirUsuarioFone').val(usuario.fone);
                    $('#edtInserirUsuarioComplemento').val(usuario.complemento);
                    $('#edtInserirUsuarioEmail').val(usuario.email);
                    $('#edtLimiteQuantidade').val(usuario.limiteQuantidade);
                    $('#edtMargemDesconto').val(usuario.margemDesconto);

                }
                else {
                    alertErro('Error US502 - Erro na a&ccedil;&atilde;o carregar tela de editar Usu&aacute;rio,' + msnPadrao + '.');
                    $('#modalCarregando').modal('hide');
                    console.error(result);
                }

            } catch (e) {
                alertErro('Error US503 - Erro na a&ccedil;&atilde;o carregar tela de editar Usu&aacute;rio,<label>' + msnPadrao + '</label>.');
                $('#modalCarregando').modal('hide');
                console.error(result);
            }

        }

    });
}

function limparModalInserirUsuario(perfil, setor, local, cargo) {
    $('#mensagemLoading').html('<i class="fa fa-lg fa-edit"></i> Carregando campos da tela de Inserir/Editar Usu&aacute;rio');

    /*SE ESTIVER EDITANDO NAO MOSTRA O MODAL LOADING E PASSA VAZIO (NINGUEM SELECIONADO) PARA OS CAMPOS DOS SELECTS, SE TIVER INSERINDO MOSTRA*/
    if ((perfil=== undefined) || (setor===undefined) || (local === undefined)) {
        $('#modalCarregando').modal('show');
        perfil = '';
        local = '';
        setor = '';
    }

    var dadosajax = {
        'funcao': 'carregar_campos_modal_inserir_editar_usuario',
    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error US601 - Erro na a&ccedil;&atilde;o carregar campos da tela de Inserir / Editar Usu&aacute;rio,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            $('#modalCarregando').modal('hide');
            try {
            resultado = JSON.parse(result);
            if (resultado.mensagem == 'Ok') {
                montarSelect('edtInserirUsuarioPerfil', resultado.perfis, 'divInserirUsuarioPerfil', perfil );
                montarSelect('edtInserirUsuarioSetor', resultado.setores, 'divInserirUsuarioSetor', setor );
                montarSelect('edtInserirUsuarioLocal', resultado.locais, 'divUsuarioLocal', local );
                montarSelect('edtInserirUsuarioCargo', resultado.cargos, 'divUsuarioCargo', cargo );
            }
            } catch (e) {
                alertErro ('Error US602 - Erro na a&ccedil;&atilde;o carregar campos da tela de Inserir / Editar Usu&aacute;rio,' + msnPadrao + '.');
            }
        }

    });

    $('#edtInserirUsuarioCpf').val('');
    $('#edtInserirUsuarioNascimento').val('');
    $('#edtInserirUsuarioNome').val('');
    $('#edtInserirUsuarioCep').val('');
    $('#edtInserirUsuarioEndereco').val('');
    $('#edtInserirUsuarioNumero').val('');
    $('#edtInserirUsuarioUf').val('');
    $('#edtInserirUsuarioBairro').val('');
    $('#edtInserirUsuarioCidade').val('');
    $('#edtInserirUsuarioCelular').val('');
    $('#edtInserirUsuarioFone').val('');
    $('#edtInserirUsuarioEmail').val('');
    $('#edtLimiteQuantidade').val('');
    $('#edtMargemDesconto').val('');

    /*ZERAR CAMPOS DE PERFIL SETOR E LOCAL*/
}

function resetarSenhaUsuario(idUsuario) {
    $('#modalCarregando').modal('show');
    $('#mensagemLoading').html('<i class="fa fa-lg fa-edit"></i> Resetando a senha do Usu&aacute;rio');

    var dadosajax = {
        'idUsuario':idUsuario,
        'funcao': 'resetar_senha_usuario'
    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error US701 - Erro na a&ccedil;&atilde;o resetar a senha do Usu&aacute;rio,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            try {
                resultado = JSON.parse(result);
                if (resultado.mensagem == 'Ok') {
                    alertSucesso('Senha do usu&aacute;rio: '+resultado.usuario + ' resetada com sucesso. Foi enviado um e-mail para : ' + resultado.email + ' com todas as instrucoes');
                    carregarUsuarios();
                    $('#modalCarregando').modal('hide');
                }
            } catch (e) {
                alertErro(acentuarMsn('Error US702 - Erro na a&ccedil;&atilde;o resetar a senha do Usu&aacute;rio,' +' '+e + result + ' '+ msnPadrao + '.'));
                console.log(e, result);
                $('#modalCarregando').modal('hide');
            }
        }

    });
}

function carregarModalDetalhesUsuario(idUsuario) {
    $('#modalCarregando').modal('show');
    $('#mensagemLoading').html('<i class="fa fa-lg fa-edit"></i> Carregando dados do Usu&aacute;rio');

    $('#idUsuario').val(idUsuario);

    var dadosajax = {
        'filtroDataComissao':$('#filtroDataComissaoUsuario').val(),
        'idUsuario':idUsuario,
        'funcao': 'carregar_modal_detalhes_usuario'
    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error US801 - Erro na a&ccedil;&atilde;o detalhar Usu&aacute;rio,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            try {
                $('#modalCarregando').modal('hide');
                var resultado = JSON.parse(result);
                var usuario = JSON.parse(resultado.dadosUsuario);
                var dadosComissao = JSON.parse(resultado.dadosComissao);


                if (resultado.mensagem == 'Ok') {
                    $('#spanIdUsuario').html(usuario.id);
                    $('#spanNomeUsuario').html(usuario.nome);
                    $('#spanEnderecoUsuario').html(usuario.endereco);
                    $('#spanEmailUsuario').html(usuario.email);
                    $('#spanLocalUsuario').html(usuario.local);

                    montarSelect('edtVincularLocalUsuario', resultado.locais, 'divLocalVincularUsuario');
                    montarTabelaDinamica(resultado.colunasUsuariosLocais, resultado.usuariosLocais, 'tabelaUsuariosLocais', 'divUsuariosLocais');
                    montarTabelaDinamica(resultado.colunasLocaisUsuario, resultado.locaisUsuario, 'tabelaLocais', 'divLocaisUsuario');

                    if (dadosComissao) {
                        /*
                        * SE REGISTROU COMISSAO TROCA OU NAO OS BOTOES
                        * */
                        if (resultado.registroComissao=='sim') {
                            $('#btnRegistrarComissao').css({display:'none', visibility:'hidden'});
                            $('#btnNovoLancamento').css({display:'block', visibility:'visible'});
                            $('#smalldataRegistroComissao').html(' Data de Registro: ' +resultado.dataRegistroComissao + ' (' + resultado.periodoRegistroComissao + ')' + resultado.iconeApagarRegistroComissao);

                            $('#registro_comissao_id').val(resultado.comissionamentoId);
                        }
                        else {
                            $('#smalldataRegistroComissao').html('');
                            $('#registro_comissao_id').val('');
                            $('#btnRegistrarComissao').css({display:'block', visibility:'visible'});
                            $('#btnNovoLancamento').css({display:'none', visibility:'hidden'});
                        }

                        /*JA PREENCHE OS CAMPOS COM OS PECENTUAIS DE COMISSAONO MODAL DE REGISTRO */
                        $('#spanRcComissaoVendas').html(dadosComissao.comissaoVenda);

                        $('#mpSpanVendas').html(dadosComissao.vendas);

                        /*JA PREENCHE OS CAMPOS COM OS VALORES DE VENDA VALIDACAO E VENDA E VALIDACAO NO MODAL DE REGISTRO */
                        $('#spanRcVendas').html(dadosComissao.vendas);


                        /*MONTA DADOS DA COMISSAO DO USUARIO*/
                        montarTabelaDinamica(dadosComissao.colunasQuadroResumo, dadosComissao.quadroResumo, 'mpTabelaQuadroResumo', 'divQuadroResumoComissao', 'table table-bordered');
                        $('#spanComissaoVendasUsuario').html(dadosComissao.comissaoVenda);
                        $('#spanVendasUsuario').html(dadosComissao.vendas);
                        $('#valorVendaUsuario').val(dadosComissao.valorVendas);
                        montarTabelaDinamica(dadosComissao.colunasCertificadosVendidos, dadosComissao.certificadosVendidos, 'mpTabelaCdsVendidos', 'divCertificadosVendidos');
                        /*FIM DA MONTAGEM DADOS DA COMISSAO DO USUARIO*/
                    }

                }
            } catch (e) {
                alertErro(acentuarMsn('Error US802 - Erro na a&ccedil;&atilde;o detalhar Usu&aacute;rio,' +' '+e + ' '+ msnPadrao + '.'));
                console.log(e, result);
                $('#modalCarregando').modal('hide');
            }
        }

    });
}

function desvincularLocalUsuario(local_id) {
    $('#modalCarregando').modal('show');
    $('#mensagemLoading').html('<i class="fa fa-lg fa-edit"></i> Desvinculando Local do Usu&aacute;rio');

    var dadosajax = {
        'idUsuario':$('#idUsuario').val(),
        'idLocal':local_id,
        'funcao': 'desvincular_local_usuario'
    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error US901 - Erro na a&ccedil;&atilde;o desvincular Local do Usu&aacute;rio,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            try {
                resultado = JSON.parse(result);
                if (resultado.mensagem == 'Ok') {
                    alertSucesso('Local desvinculado ao Usu&aacute;rio com sucesso!');
                    carregarModalDetalhesUsuario($('#idUsuario').val());
                }
            } catch (e) {
                alertErro(acentuarMsn('Error US902 - Erro na a&ccedil;&atilde;o desvincular Local do Usu&aacute;rio,' +' '+e + ' '+ msnPadrao + '.'));
                console.log(result, e);
                $('#modalCarregando').modal('hide');
            }
        }

    });
}
function vincularLocalUsuario() {
    $('#modalCarregando').modal('show');
    $('#mensagemLoading').html('<i class="fa fa-lg fa-edit"></i> Vinculando Local ao Usu&aacute;rio');

    var dadosajax = {
        'idUsuario':$('#idUsuario').val(),
        'idLocal':$('#edtVincularLocalUsuario').val(),
        'funcao': 'vincular_local_usuario'
    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error US1001 - Erro na a&ccedil;&atilde;o vincular Local do Usu&aacute;rio,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            try {
                resultado = JSON.parse(result);
                if (resultado.mensagem == 'Ok') {
                    alertSucesso('Local vinculado ao Usu&aacute;rio com sucesso!');
                    $('#modalRelacionarUsuarioLocal').modal('hide');
                    carregarModalDetalhesUsuario($('#idUsuario').val());
                }
            } catch (e) {
                alertErro(acentuarMsn('Error US902 - Erro na a&ccedil;&atilde;o vincular Local do Usu&aacute;rio,' +' '+e + ' '+ msnPadrao + '.'));
                console.log(e, result);
                $('#modalCarregando').modal('hide');
            }
        }

    });
}


function carregarModalRegistroComissoesUsuarios() {
    /*
     TODO: PRECISO TERMINAR ESTA ROTINA PRA BUSCAR NO BANCO AS INFORMACOES QUE FICARAM REGISTRADAS NO BANCO NOS MESES ANTERIORES
     * */
    var periodos = $('#filtroDataComissaoUsuario').val().split(',');

    $('#spanRcPeriodoDe').html(periodos[0]);
    $('#spanRcPeriodoAte').html(periodos[1]);
        $('#spanRcDescricao').html('Comiss&atilde;o do usu&aacute;rio ' + $('#spanNomeUsuario').html() + ' do per&iacute;odo de ' + periodos[0] + ' at&eacute; ' + periodos[1]);


}

function registrarComissaoUsuario () {
    $('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Registrando comissionamento do usu&aacute;rio');
    $('#modalCarregando').modal('show');


    var dadosajax = {
        'idUsuario' : $('#idUsuario').val(),
        'funcao' : "registrar_comissao_usuario",
        'descricao' : $('#spanRcDescricao').html(),
        'periodoDe' : $('#spanRcPeriodoDe').html(),
        'periodoAte' : $('#spanRcPeriodoAte').html(),
        'vendas' : $('#valorVendaUsuario').val(),
        'comissaoVendas' : $('#spanRcComissaoVendas').html(),

    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error US1002 - Erro ao registrar a comiss&atilde;o do usu&aacute;rio,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            try {
                resultado = JSON.parse(result);
                if (resultado.mensagem == 'Ok') {
                    alertSucesso('Comiss&atilde;o do usu&aacute;rio registrada com sucesso!');

                    $('#modalUsuarioRegistrarComissao').modal('hide');
                    carregarModalDetalhesUsuario($('#idUsuario').val());

                }
            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error US1002 - Erro ao registrar a comiss&atilde;o do usu&aacute;rio,' + msnPadrao + '.');
            }
        }
    });

}

function apagarRegistroComissaoUsuario (idRegistroComissao) {
    $('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Apagando registro da comissionamento do usu&aacute;rio');
    $('#modalCarregando').modal('show');

    var dadosajax = {
        'funcao' : "apagar_registro_comissao_usuario",
        'idRegistroComissao' : idRegistroComissao,

    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error US2001 - Erro ao apagar registro de comiss&atilde;o do usu&aacute;rio,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){;
            try {
                resultado = JSON.parse(result);
                if (resultado.mensagem == 'Ok') {
                    alertSucesso('Registro de comiss&atilde;o do usu&aacute;rio apagado com sucesso!');

                    carregarModalDetalhesUsuario($('#idUsuario').val());

                }
            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error US2002 - Erro ao apagar registro de comiss&atilde;o do usu&aacute;rio,' + msnPadrao + '.');
            }
        }
    });

}

function limparModalRegistrarLancamentoComissaoUsuario () {
    $('#editRlDescricao').val('');
    $('#editRlValor').val('');
    $('#editRlObservacao').val('');

}

function registrarLancamentoComissao () {
    $('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Registrando lan&ccedil;amento na comissionamento do usu&aacute;rio');
    $('#modalCarregando').modal('show');

    var dadosajax = {
        'funcao' : "registrar_lancamento_comissao_usuario",
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
            alertErro ('Error 301 - Erro ao registrar lan&ccedil;amento na comiss&atilde;o do usu&aacute;rio,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){;
            try {
                resultado = JSON.parse(result);
                if (resultado.mensagem == 'Ok') {
                    alertSucesso('Lan&ccedil;amento realizado com sucesso na comiss&atilde;o do usu&aacute;rio!');

                    $('#modalUsuarioRegistrarLancamentoComissao').modal('hide');
                    carregarModalDetalhesUsuario($('#idUsuario').val());

                }
            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error 301 - Erro ao registrar  lan&ccedil;amento na comiss&atilde;o do usu&aacute;rio,' + msnPadrao + '.');
            }
        }
    });

}

function apagarLancamentoComissao (idLancamentoComissaoUsuario) {
    $('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Apagando lan&ccedil;amento na comissionamento do usu&aacute;rio');
    $('#modalCarregando').modal('show');

    var dadosajax = {
        'funcao' : "apagar_lancamento_comissao_usuario",
        'idLancamentoComissaoUsuario' : idLancamentoComissaoUsuario,

    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error 401 - Erro ao apagar lan&ccedil;amento na comiss&atilde;o do usu&aacute;rio,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){;
            try {
                resultado = JSON.parse(result);
                if (resultado.mensagem == 'Ok') {
                    alertSucesso('Lan&ccedil;amento apagado com sucesso na comiss&atilde;o do usu&aacute;rio!');

                    carregarModalDetalhesUsuario($('#idUsuario').val());

                }
            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error 402 - Erro ao apagar  lan&ccedil;amento na comiss&atilde;o do usu&aacute;rio,' + msnPadrao + '.');
            }
        }
    });

}