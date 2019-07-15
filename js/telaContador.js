var msnPadrao = 'entre em contato com o administrador do sistema (3321-5061)';

var pageUrl = 'funcoes/funcoesContador.php';
function valida(src) {
    if(src.value == ""){
        $('#altContador').attr('disabled', true);
        $('#insContador').attr('disabled', true);
        $('#insContato').attr('disabled', true);
        $('#conApagar').attr('disabled', true);
        src.style.background='red';
        src.style.color= 'white';
    }else{
        $('#altContador').attr('disabled', false);
        $('#insContador').attr('disabled', false);
        $('#insContato').attr('disabled', false);
        $('#conApagar').attr('disabled', false);
        src.style.background='white';
        src.style.color= 'black';
    }
}
function confirma_formulario() {
    if(document.getElementById('confirma').checked == true){
        $('#botao').attr('disabled', false);
    }else{
        $('#botao').attr('disabled', true);
    }
}

function carregaTabelaDetalhar(funcao) {
    var dadosajax = {
        'contador_id' :$('#idContador').val(),
        'funcao' : funcao,
    };

    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alert ('Error TC.JS/396 - Erro na acao de carregar a tabela,' + funcao + ' ' + msnPadrao + '.');
        },
        success : function(result){
            var contador = result.split(';');
            if (contador[1] == 0) {

                if (funcao == 'carregarModalAcaoContador'){
                    document.getElementById('daTableAcao').innerHTML=contador[0];

                }
                else if(funcao == 'carregarModalContatoContador'){
                    document.getElementById('dcTableContato').innerHTML=contador[0];
                }
                if (funcao == 'carregarModalAcaoCrm'){
                    document.getElementById('daTableCrm').innerHTML=contador[0];

                }
            }else{
                erroEmail(result,"Erro no retorno da funcao contador detalhar");
                alert('Error TC.JS/415 - Erro ao carregar a tabela,' + funcao + ' ' + msnPadrao + '.');
                ir_para('telaContador.php');
                console.log(result);
            }
        }
    });
}
function gerar_codigo_desconto(funcao,campo){
    var dadosajax = {
        'funcao' : funcao,
        'nome':$('#ecEdtNome').val(),
        'razao_social':$('#ecEdtRazaoSocial').val(),
        'nome_fantasia':$('#ecEdtNomeFantasia').val(),
        'campo': campo
    };

    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alert ('Error TC.JS/468 - Erro na acao de gerar codigo do contador,' + msnPadrao + '.');
        },
        success : function(result){
            if (result) {
                document.getElementById('ecEdtCodigoDesconto').value=result;

            }else{
                erroEmail(result,"Erro no retorno da funcao gerar codigo de desconto");
                alert('Error TC.JS/476 - Erro ao gerar codigo de desconto,' + msnPadrao + '.');
                console.log(result);
            }
        }
    });
}
function visualizar_contador(funcao){

    var dadosajax = {
        'contador_id' : $('#idContador').val(),
        'funcao' : funcao
    }

    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alert ('Error TC.JS/495 - Erro na acao de visualizar contador,' + msnPadrao + '.');
        },
        success : function(result){
            console.log(result);
            var contador = result.split(';');
            if (contador[38]==0) {
                document.getElementById('vcSpanNome').innerHTML=contador[1];
                document.getElementById('vcSpanNascimento').innerHTML=contador[2];
                document.getElementById('vcSpanCpf').innerHTML=contador[3];
                document.getElementById('vcSpanEmailContador').innerHTML=contador[4];
                document.getElementById('vcSpanVendedor').innerHTML=contador[5];
                document.getElementById('vcSpanLocal').innerHTML=contador[6];
                document.getElementById('vcSpanRazaoSocial').innerHTML=contador[7];
                document.getElementById('vcSpanCnpj').innerHTML=contador[8];
                document.getElementById('vcSpanNomeFantasia').innerHTML=contador[9];
                document.getElementById('vcSpanFone1').innerHTML=contador[10];
                document.getElementById('vcSpanFone2').innerHTML=contador[11];
                document.getElementById('vcSpanCep').innerHTML=contador[12];
                document.getElementById('vcSpanEndereco').innerHTML=contador[13];
                document.getElementById('vcSpanNumero').innerHTML=contador[14];
                document.getElementById('vcSpanComplemento').innerHTML=contador[15];
                document.getElementById('vcSpanBairro').innerHTML=contador[16];
                document.getElementById('vcSpanCidade').innerHTML=contador[17];
                document.getElementById('vcSpanUfContador').innerHTML=contador[18];
                document.getElementById('vcSpanEmailEscritorio').innerHTML=contador[19];
                document.getElementById('vcSpanContato1Nome').innerHTML=contador[20];
                document.getElementById('vcSpanContato1Cargo').innerHTML=contador[21];
                document.getElementById('vcSpanContato1Telefone').innerHTML=contador[22];
                document.getElementById('vcSpanContato2Nome').innerHTML=contador[23];
                document.getElementById('vcSpanContato2Cargo').innerHTML=contador[24];
                document.getElementById('vcSpanContato2Telefone').innerHTML=contador[25];
                document.getElementById('vcSpanCrc').innerHTML=contador[27];
                document.getElementById('vcSpanBanco').innerHTML=contador[28];
                document.getElementById('vcSpanAg').innerHTML=contador[29];
                document.getElementById('vcSpanCc').innerHTML=contador[30];
                document.getElementById('vcSpanCpfCnpjConta').innerHTML=contador[31];

                if (contador[32]== 1){
                    document.getElementById('vcSpanComissao').innerHTML = "SIM";
                }else{
                    document.getElementById('vcSpanComissao').innerHTML = "NAO";
                }
                if (contador[33]== 1){
                    document.getElementById('vcSpanDesconto').innerHTML = "SIM";
                }else{
                    document.getElementById('vcSpanDesconto').innerHTML = "NAO";
                }
                document.getElementById('vcSpanOpConta').innerHTML=contador[34];
                document.getElementById('vcSpanCodigoDesconto').innerHTML=contador[35];
            }else{
                erroEmail(result,acentuarMsn('Erro na função javascritpt de visualizar contador'));
                alert('Error TC.JS/546- Erro ao editar contador,' + msnPadrao + '.');
                console.log(result);
            }
        }
    });
}
function inserir_observacao(funcao,usuario_id) {
    var dadosajax = {
        'funcao' : funcao,
        'contador_id' : $('#idContador').val(),
        'observacao' : $('#ioEdtObservacao').val(),
        'usuario_id' : usuario_id
    };

    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alert ('Error TC.JS/566 - Erro na acao de inserir observacao,' + msnPadrao + '.');
        },
        success : function(result){
            console.log(result);
            if (result) {
                var contador = result.split(';');
                alert('Obersavacao inserida com sucesso!');
                ir_para('telaContador.php');
            }else{
                alert('Error TC.JS/575 - Erro ao inserir observacao,' + msnPadrao + '.');
                console.log(result);
            }
        }
    });
}
function tipo_pessoa_form(){
    var pessoaTipo = $("input[id='edtTipoPessoa']:checked").val();
    if(pessoaTipo == "F") {
        $("#cadastrarContador").modal('hide');
        $("#modalInserirEditarContador").modal('show');
        document.getElementById('divContadorPessoaJuridica').style.display='none';

    }else if(pessoaTipo == "J"){
        $("#cadastrarContador").modal('hide');
        $("#modalInserirEditarContador").modal('show');
        document.getElementById('divContadorPessoaJuridica').style.display='block';
    }
}

/*function listarCertificadosContador (contadorId, tabela, dataDe, dataAte) {
    $("#esperaModal").modal('show');
    var dadosajax = {
        'funcao' : 'listarCertificadosContador',
        'contadorId' : contadorId,
        'dataDe' : dataDe,
        'dataAte' : dataAte
    };

    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (xhr, ajaxOptions, thrownError) {

            $("#esperaModal").modal('hide');
            alert ('Error TC.JS/576 - Erro na acao de listar certificados do contador,' + msnPadrao + '.');
        },
        success : function(result){
            $("#esperaModal").modal('hide');
            var tabelaCertificado = result.split('%%');

            if (tabelaCertificado[0].trim() == 'ok') {
                montarTabelaDinamica(tabelaCertificado[1], tabelaCertificado[2], 'tabelaContadorListarCertificados', tabela);
            }else{
                alert('Error TC.JS/577 - Erro ao montar tabela com os certificados do contador,' + msnPadrao + '.');
                console.log(result);
            }
        }
    });
}*/

function carregarContadores(paginaSelecionada, qtdItensPorPagina, paginando, carregarDivPaginacao){
    if (paginando == 'paginar') {
        //alertSucesso(paginaSelecionada +' - '+ qtdTotalItens + ' - '+ paginando);
        $('#mensagemLoading').html('<i class="fa fa-folder-open-o"></i> Paginando...');
    } else
        $('#mensagemLoading').html('<i class="fa fa-lg fa-download"></i> Carregando a lista de Contadores');

    if ((typeof window['filtroUsuariosCertificados'] !== 'undefined') && (Array.isArray(window['filtroUsuariosCertificados'])))
        consultores = window['filtroUsuariosCertificados'];
    else
        consultores = '';


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
    var nomeCampoFiltro = '';
    var valorCampoFiltro = '';
    if (($('#tipo_filtro').val()) && ($('#filtro_pesquisa_por').val())) {
        nomeCampoFiltro = $('#tipo_filtro').val();
        valorCampoFiltro = $('#filtro_pesquisa_por').val();
    }

    var camposFiltro = {};
    camposFiltro[nomeCampoFiltro] = valorCampoFiltro;
    if ($('#filtroEscolheDataCadastroContador').prop('checked'))
        var filtroData = $('#filtroDataCadastroContador').val();
    else
        var filtroData = '';

    if ($('#filtroEscolheRecebeComissao').prop('checked')) {
        var recebeComissao = $('#filtroChkRecebeComissao').prop('checked');
    } else
        var recebeComissao = '';

    if ($('#filtroEscolheConcedeDesconto').prop('checked')) {
        var concedeDesconto = $('#filtroChkConcedeDesconto').prop('checked');
    } else
        var concedeDesconto = '';


    if ($('#filtroEscolheSyncSafe').prop('checked')) {
        var syncSafe = $('#filtroSyncSafe').prop('checked');
    } else
        var syncSafe = '';

    if ($('#filtroEscolheTemComissao').prop('checked')) {
        var dataComissaoContador = $('#filtroDataComissaoContador').val();
    } else
        var dataComissaoContador = '';

    if ($('#filtroEscolhePossuiCartao').prop('checked')) {
        var possuiCartao = $('#filtroPossuiCartao').prop('checked');
    } else
        var possuiCartao = '';

    filtros = {
        'filtroDataComissaoContador':dataComissaoContador,
        'filtroPossuiCartao':possuiCartao,
        'filtroChkRecebeComissao' : recebeComissao,
        'filtroChkConcedeDesconto' : concedeDesconto,
        'filtroConsultores':consultores,
        'filtroData':filtroData,
        'filtroChkSyncSafe' : syncSafe,
        'campoFiltro' : camposFiltro
    };
console.log(filtros);
    var dadosajax = {
        'funcao' : "carregar_contadores",
        'pagina' : pagina,
        'itensPorPagina' : qtdItens,
        'filtros': filtros
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
            $('#divTabelaContadores').html('<i class="fa fa-circle-o-notch fa-5x fa-spin text-info"></i>').css({'text-align':'center'});
            $('.paginacao').css({ visibility: 'hidden'});
        },
        error : function (){
            alertErro ('Error CA001 - Erro na ação de carregar a lista de Contadores,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            $('#modalCarregando').modal('hide');

            try {
                var contadores = JSON.parse(result);

                if (contadores.mensagem == 'Ok') {
                    montarTabelaDinamica(contadores.colunas, contadores.dadosContadores, 'tabelaContadores', 'divTabelaContadores');
                    $('#qtdContadoresConsulta').html('Qtd:'+contadores.quantidadeContadores+'</label> | <i class="fa fa-thumbs-o-up text-info" aria-hidden="true"></i> / <i class="fa fa-thumbs-o-down text-danger" aria-hidden="true"></i> : Recebe ou N&atilde;o Comiss&atilde;o | <i class="fa fa-thumbs-o-up text-info" aria-hidden="true"></i> / <i class="fa fa-thumbs-o-down text-danger" aria-hidden="true"></i>: Concede ou N&atilde;o Desconto ');

                    if (carregarPaginacao)
                        mostrar_paginacao(contadores.quantidadeContadores, 50, carregarContadores, 'paginacaoContadorTopo', 'paginacaoContadorRodape');

                    $('#divContatosContadoresPopOver').html(contadores.htmlContatosContadorPopOver);

                } else {
                    $('#modalCarregando').modal('hide');
                    console.log(result);
                    alertErro('Error CA002 - Erro na ação de carregar a lista de Contadores,' + msnPadrao + '.');
                }
            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error CA003 - Erro na ação de carregar a lista de Contadores, Erro:' + e + msnPadrao + '.');
            }
        },
        complete : function ( ) {
            $('.paginacao').css({ visibility: 'visible'});
            $( document ).ready(function() {
                $('a[data-toggle="tooltip"]').tooltip({
                    container: 'body'
                });
            });
        }

    });
}


function carregarModalInserirEditarContador(acao) {
    $('#mensagemLoading').html('<i class="fa fa-folder-open-o"></i> Carregando tela de inserir / editar Contador');
    $('#modalCarregando').modal('show');

    var dadosajax = {
        'funcao': "carregar_modal_inserir_editar_contador",
        'acao' : acao,
        'contadorId': $('#idContador').val()
    };

    $('#acaoContador').val(acao);

    $.ajax({
        url: pageUrl,
        data: dadosajax,
        type: 'POST',
        cache: true,
        error: function () {
            alertErro('Error TCONT001 - Erro na acao de carregar tela de inserir/editar contador,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success: function (result) {
            try {
                $('#frmContatosContador').css({visibility: 'visible', display: 'block'});
                $('#modalCarregando').modal('hide');
                var resultado = JSON.parse(result);
                var contador = JSON.parse(resultado.contador);
                montarSelect('ecEdtLocalContador', resultado.locais, 'divLocalContador', contador.local);
                montarSelect('ecEdtVendedorContador', resultado.vendedores, 'divVendedorContador', contador.usuario);

                if (acao == 'inserir') {
                    $('input[name="edtTipoPessoa"][value="J"]').prop('checked', 'checked');
                    $('#divEscolhaTipo').css({visibility: 'visible', display: 'block'});
                    $('#ecEdtNome').val('');
                    $('#ecEdtNascimento').val('');
                    $('#ecEdtCpf').val('');
                    $('#ecEdtEmailContador').val('');
                    $("#ecEdtVendedor").val('');
                    $('#ecEdtLocal').val('');
                    $('#ecEdtRazaoSocial').val('');
                    $('#ecEdtCnpj').val('');
                    $('#ecEdtNomeFantasia').val('');
                    $('#ecEdtCep').val('');
                    $('#ecEdtEndereco').val('');
                    $('#ecEdtNumero').val('');
                    $('#ecEdtComplemento').val('');
                    $('#ecEdtBairro').val('');
                    $('#ecEdtCidade').val('');
                    $('#ecEdtUfContador').val('');
                    $('#ecEdtFone1').val(''),
                    $('#ecEdtCelular').val(''),
                    $('#ecEdtEmailEscritorio').val('');
                    $('#ecEdtCrc').val('');
                    $('#spanContadorBancoAntigo').html('');
                    $('#ecEdtBanco').val('');
                    $('#ecEdtAg').val('');
                    $('#ecEdtCc').val('');
                    $('#ecEdtCpfCnpjConta').val('');
                    $('#ecEdtOpConta').val('');
                    $('#ecEdtCodigoDesconto').val(contador.codigoDescontoContador);
                    $('#spanEdtCodigoDesconto').html(contador.codigoDescontoContador);
                    $('#ecEdtUrl').value = '';

                    $("#chkRecebeComissaoContador").bootstrapToggle('off');
                    $("#chkConcedeDescontoContador").bootstrapToggle('on');

                    /*CARREGAR DADOS DO CONTADOR PARA O MODAL DE EDIÇÃO*/
                } else {
                    /*
                    * ESCONDE AS DIVS DE ESCOLHER O TIPO DO CONTADOR E DOS CONTATOS
                    * */

                    $('#frmContatosContador').css({visibility: 'hidden', display: 'none'});
                    $('#modalCarregando').modal('hide');

                    if (resultado.mensagem = 'Ok') {
                        $('input[name="edtTipoPessoa"][value="'+contador.pessoaTipo+'"]').prop('checked', 'checked');
                        $('input[name="edtTipoPessoa"][value="'+contador.pessoaTipo+'"]').change();
                        $('input[name="edtTipoProfissional"][value="'+contador.tipoProfissional+'"]').prop('checked', 'checked');

                        $('#ecEdtNome').val(contador.nome);
                        $('#ecEdtNascimento').val(contador.nascimento);
                        $('#ecEdtCpf').val(contador.cpf);
                        $('#ecEdtEmailContador').val(contador.email);
                        $('#ecEdtVendedor').val(contador.vendedor);
                        $('#ecEdtLocal').val(contador.local);
                        $('#ecEdtRazaoSocial').val(contador.razaoSocial);
                        $('#ecEdtCnpj').val(contador.cnpj);
                        $('#ecEdtNomeFantasia').val(contador.nomeFantasia);
                        $('#ecEdtCep').val(contador.cep);
                        $('#ecEdtEndereco').val(contador.endereco);
                        $('#ecEdtNumero').val(contador.numero);
                        $('#ecEdtComplemento').val(contador.complemento);
                        $('#ecEdtBairro').val(contador.bairro);
                        $('#ecEdtCidade').val(contador.cidade);
                        $('#ecEdtUfContador').val(contador.uf);
                        $('#ecEdtFone1').val(contador.telefone),
                        $('#ecEdtCelular').val(contador.celular),
                        $('#ecEdtEmailEscritorio').val(contador.emailPj);
                        $('#ecEdtCrc').val(contador.crc);
                        $('#spanContadorBancoAntigo').html(contador.banco);
                        $('#ecEdtBanco').val(contador.banco);
                        $('#ecEdtAg').val(contador.agencia);
                        $('#ecEdtCc').val(contador.conta);
                        $('#ecEdtCpfCnpjConta').val(contador.cpfCnpjConta);
                        $('#ecEdtCodigoDesconto').val(contador.codigoDescontoContador);
                        $('#spanEdtCodigoDesconto').html(contador.codigoDescontoContador);

                        if (contador.comissao == '1')
                            $("#chkRecebeComissaoContador").bootstrapToggle('on');
                        else
                            $("#chkRecebeComissaoContador").bootstrapToggle('off');
                        if (contador.desconto == '1')
                            $("#chkConcedeDescontoContador").bootstrapToggle('on');
                        else
                            $("#chkConcedeDescontoContador").bootstrapToggle('off');


                    }
                }


            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error TCONT002 - Erro na acao de carregar tela de inserir/editar contador, Erro:' + e + msnPadrao + '.');
            }
        }
    });


}

function salvarContador(acao){
    if (acao == 'inserir')
        mensagemCarregando = 'Salvando novo Contador';
    else if (acao == 'editar')
        mensagemCarregando = 'Editando Contador';

    $('#mensagemLoading').html('<i class="fa fa-lg fa-user-plus"></i> '+mensagemCarregando);
    $('#modalCarregando').modal('show');

    if ($('#chkRecebeComissaoContador').prop('checked'))
        var recebeComissao = 1;
    else
        var recebeComissao = 0;

    if ($('#chkConcedeDescontoContador').prop('checked'))
        var recebeDesconto = 1;
    else
        var recebeDesconto = 0;

    if ($('input[name=edtTipoComissionamentoContador]:checked').val()=='cartao')
        var possuiCartao = 1;
    else
        var possuiCartao = 0;

    var dadosajax = {
        'funcao' : 'salvar_contador',
        'acao':acao,
        'contador_id' : $('#idContador').val(),
        'nome':$('#ecEdtNome').val(),
        'pessoaTipo':$('input[name=edtTipoPessoa]:checked').val(),
        'tipoProfissional':$('input[name=edtTipoProfissional]:checked').val(),
        'nascimento' : $('#ecEdtNascimento').val(),
        'cpf' :  $('#ecEdtCpf').val(),
        'crc' : $('#ecEdtCrc').val(),
        'codigoContador': $('#ecEdtCodigoDesconto').val(),
        'emailContador' : $('#ecEdtEmailContador').val(),
        'usuario' : $('#ecEdtVendedorContador').val(),
        'nomeUsuario':$('#ecEdtVendedorContador option[value="'+$('#ecEdtVendedorContador').val()+'"]').text(),
        'local' :  $('#ecEdtLocalContador').val(),
        'nomeLocal' :  $('#ecEdtLocalContador option[value="'+$('#ecEdtLocalContador').val()+'"]').text(),
        'razaoSocial' : $('#ecEdtRazaoSocial').val(),
        'cnpj' :  $('#ecEdtCnpj').val(),
        'nomeFantasia' : $('#ecEdtNomeFantasia').val(),
        'fone1' :  $('#ecEdtFone1').val(),
        'celular' : $('#ecEdtCelular').val(),
        'cep' : $('#ecEdtCep').val(),
        'endereco' :  $('#ecEdtEndereco').val(),
        'numero' :  $('#ecEdtNumero').val(),
        'complemento' :  $('#ecEdtComplemento').val(),
        'bairro' : $('#ecEdtBairro').val(),
        'cidade' : $('#ecEdtCidade').val(),
        'uf' : $('#ecEdtUfContador').val(),
        'emailEscritorio' :  $('#ecEdtEmailEscritorio').val(),
        'comissao' : recebeComissao,
        'desconto': recebeDesconto,
        'banco' : $('#ecEdtBanco').val(),
        'nomeBanco' : $('#ecEdtBanco option[value="'+$('#ecEdtBanco').val()+'"]').text(),
        'contaCorrente' : $('#ecEdtCc').val(),
        'agencia' : $('#ecEdtAg').val(),
        'operacao' : $('#ecEdtOpConta').val(),
        'cpfCnpjConta' : $('#ecEdtCpfCnpjConta').val(),
        'nomeContato': $('#edtNomeContatoContador').val(),
        'cargoContato': $('#edtCargoContatoContador').val(),
        'telefoneContato':$('#edtTelefoneContatoContador').val(),
        'celularContato':$('#edtCelularContatoContador').val(),
        'emailContato':$('#edtEmailContatoContador').val(),
        'possuiCartao' : possuiCartao
    };

    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,

        error : function (){
            alertErro('Error TCONT101 - Erro na a&ccedil;&aacute;o de salvar usu&aacute;rio,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            try {
                var resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {
                    if (acao == 'inserir') {
                        alertSucesso('Contador inserido com sucesso!');
                        carregarContadores($('.paginacao li.active').find('a').html());
                        $('#modalInserirEditarContador').modal('hide');
                        $('#modalCarregando').modal('hide');
                        /*
                        * APAGA OS DADOS DOS CONTATOS DO FORMULARIO DE CONTATOS
                        * */
                        apagarDadosComponente('divContato','spanContadorContatos');
                    }
                    else {
                        alertSucesso('Contador alterado com sucesso!');
                        carregarModalDetalharContador($('#idContador').val());
                        $('#modalInserirEditarContador').modal('hide');
                    }

                }

            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error TCONT102 - Erro na a&ccedil;&aacute;o de salvar usu&aacute;rio, Erro:' + result + ' - '+e + msnPadrao + '.');
            }

        }
    });

}

function carregarFiltrosContadores() {

    var dadosajax = {
        'funcao' : "carregar_filtros_contadores",
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
            alertErro ('Error CD9001 - Erro ao carregar os filtros dos certificado,' + msnPadrao + '.');
            $("#modalCarregando").modal('hide');
        },
        success : function(result){
            try {

                var resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {

                    montarSelectMultiplo('filtroUsuariosCertificados', resultado.usuarios, 'divFiltroConsultores', '', 'divUsuariosContadores');
                    $('#permiteRegistrarComissao').val(resultado.permiteRegistrarComissao);
                }
            } catch (e){
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro ('Error CD9002 - Erro ao carregar os filtros dos certificado.,' + msnPadrao + ' '+e + '.');

            }
        }
    });
};


/*
* PASSA O COMPONENTE E SINCRONIZA A DATA COM O MODAL DE DETALHAR CONTADOR
* */
function sincronizarDataPeriodoComissao (nomeComponenteRangeDatas) {
    var datas = $('#'+ nomeComponenteRangeDatas).val().split(',');
    var de = datas[0].split('/');
    var ate = datas[1].split('/');
    var dataDe = new Date(de[2], de[1] - 1,de[0]);
    var dataAte = new Date(ate[2], ate[1] - 1,ate[0]);
    $('#edtFiltroDataContador').data('datepicker').selectDate([dataDe, dataAte]);
}

/*
* NESTA FUNCAO O PARAMETRO naoTrocarData serve PARA ATUALIZAR OU NAO A DATA DO MODAL
* DE ACORDO COM A QUE FOI INSERIDA NO FILTRO DE CONTADORES OU NAO CASO O USUARIO TENHA CLICADO
* NO BOTAO FILTRAR
* */
function carregarModalDetalharContador(contadorId, sincronizarDataFiltro){
    $('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Carregando detalhes do contador');
    $('#modalCarregando').modal('show');

    if (sincronizarDataFiltro === undefined)
        var trocarDataPeriodo = false;
    else if (sincronizarDataFiltro == 'sim')
        var trocarDataPeriodo = true;

    $('#idContador').val(contadorId);

    /*
    * O PERMITE REGISTRAR COMISSAO SERVE PARA INFORMAR SE EXISTIRA COMISSAO OU NAO
    * */

    var dadosajax = {
        'idContador' :contadorId,
        'funcao' : 'detalhar_contador',
        'filtroDataComissao':$('#edtFiltroDataContador').val(),
        'permiteRegistrarComissao': $('#permiteRegistrarComissao').val()
    };

    /*
     * SE NAO TIVER PERMISSAO DE REGISTRAR CONTADOR SOME COM OS BOTOES DE REGISTRAR E LANCAR CONTADOR
     * ALEM DE NAO PERMITIR ESCOLHER ENTRE DATAS APENAS O MES ANTERIOR
     * */
    if ($('#permiteRegistrarComissao').val() == 'sim') {

        $('#divBtnRegistrarComissao').css({visibility: 'visible', display: 'block'});

        /*
         * SE O FILTRO RECEBE COMISSAO ESTA SELECIONADO ALTERA O VALOR DO CAMPO DATA DO DETALHAR CONTADOR
         * PARA O MESMO VALOR DA COMISSAO SELECIONADA, CASO CONTRARIO MOSTRA O MES ANTERIOR
         * */

        if (trocarDataPeriodo)
            if ($('#filtroEscolheTemComissao').prop('checked') ) {

                var datas = $('#filtroDataComissaoContador').val().split(',');
                var de = datas[0].split('/');
                var ate = datas[1].split('/');
                var dataDe = new Date(de[2], de[1] - 1,de[0]);
                var dataAte = new Date(ate[2], ate[1] - 1,ate[0]);
                $('#edtFiltroDataContador').data('datepicker').selectDate([dataDe, dataAte]);

            } else {
                var ultimoDiaDoMes = new Date(dataAtual.getFullYear(), dataAtual.getMonth(), 0);
                $('#edtFiltroDataContador').data('datepicker').selectDate([new Date(dataAtual.getFullYear(),dataAtual.getMonth()-1,'01'), ultimoDiaDoMes]);
            }

    }
    else {
        $('#divBtnRegistrarComissao').css({visibility: 'hidden', display: 'none'});
        var ultimoDiaDoMes = new Date(dataAtual.getFullYear(), dataAtual.getMonth(), 0);
        $('#edtFiltroDataContador').data('datepicker').selectDate([new Date(dataAtual.getFullYear(),dataAtual.getMonth()-1,'01'), ultimoDiaDoMes]);
        //$('#edtFiltroDataContador').prop('disabled', true);


    }


    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error CD10001 - Erro na acao de detalhar contador,' + msnPadrao + '.');
        },
        success : function(result){
            $('#modalCarregando').modal('hide');
            try {
                var contador = JSON.parse(result);
                var dadosComissao = JSON.parse(contador.dadosComissao);

                if (contador.mensagem == 'Ok') {
                    $('#dcSpanCodigoContador').html(contador.codigoContador);
                    $('#dcSpanIdContador').html(contador.id);
                    $('#idContador').html(contador.id);
                    $('#dcSpanNomeContador').html(contador.nome);
                    $('#dcSpanEndereco').html(contador.endereco);
                    $('#dcSpanVendedor').html(contador.vendedor);
                    $('#dcSpanLocal').html(contador.local);
                    $('#dcSpanDataCadastro').html(contador.dataCadastro);
                    $('#dcSpanRecebeComissao').html(contador.recebeComissao);
                    $('#dcSpanConcedeDesconto').html(contador.concedeDesconto);

                    montarTabelaDinamica(contador.colunasContador, contador.contatosContador, 'tabelaContatosContador', 'divTabelaContatosContador');
                    montarTabelaDinamica(contador.colunasDetalhes, contador.detalhesContador, 'tabelaDetalhesContador', 'divTabelaDetalhesContador');

                    /*
                    * SE O CONTADOR NAO ESTIVER NA LISTA DE USUARIOS DO USUARIO NAO PERMITE EDITAR
                    * */
                    if (contador.permiteEditarContador=='sim')
                        $('#btnEditarContador').attr("disabled",false);
                    else
                        $('#btnEditarContador').attr("disabled",true);

                    /*
                    * SE O CONTADOR NAO RECEBE COMISSAO NEM MOSTRA O QUADRO PRA O USUARIO
                    * */
                    if (contador.mostraQuadroComissao == 'sim') {
                        $('#divDadosComissionamento').css({visibility: 'visible', display: 'block'});
                        if (contador.possuiCartao=='sim') {
                            $('#divDadosBancariosContador').css( {display:'none', visibility:'hidden'} );
                            $('input[name="edtTipoComissionamentoContador"][value="cartao"]').prop('checked', 'checked');

                        } else {
                            $('#divDadosBancariosContador').css( {display:'block', visibility:'visible'} );
                            $('input[name="edtTipoComissionamentoContador"][value="banco"]').prop('checked', 'checked');
                        }
                    }
                    else
                        $('#divDadosComissionamento').css({visibility: 'hidden', display: 'none'});


                    if (dadosComissao) {
                        /*
                        *  SE PAGOU A COMISSAO MOSTRA NA TELA
                        * */
                        $('#spanDataPagamentoComissao').html(dadosComissao.dataPagamento);
                        $('#spanValorPagoComissao').html(dadosComissao.comissaoTotal);
                        $('#spanObservacaoComissao').html(dadosComissao.observacao);


                        /*
                         * SE REGISTROU COMISSAO TROCA OU NAO OS BOTOES
                         * */
                        if (contador.registrouComissao=='sim') {
                            $("#btnInserirObservacaoComissaoContador").css({display:'inline', visibility:'visible'});
                            /*
                             * SE A COMISSAO AINDA NAO ESTIVER PAGA PERMITE FAZER NOVOS LANCAMENTOS
                             * CASO CONTRARIO ESCONDE O BOTAO NOVOS LANCAMENTOS CASO TENHA PERMISSAO
                             * */

                            if (contador.comissaoPaga == 'sim')
                                $('#btnNovoLancamentoContador').css({display:'none', visibility:'hidden'});
                            else
                                $('#btnNovoLancamentoContador').css({display:'block', visibility:'visible'});

                            $('#btnRegistrarComissao').css({display:'none', visibility:'hidden'});
                            $('#smalldataRegistroComissao').html(' Data de Registro: ' +contador.dataRegistroComissao + ' (' + contador.periodoRegistroComissao + ')' + contador.iconeApagarRegistroComissao);

                            $('#registro_comissao_id').val(contador.comissionamentoId);
                        }
                        else {
                            $("#btnInserirObservacaoComissaoContador").css({display:'none', visibility:'hidden'});
                            $('#smalldataRegistroComissao').html('');
                            $('#registro_comissao_id').val('');
                            $('#btnRegistrarComissao').css({display:'block', visibility:'visible'});
                            $('#btnNovoLancamentoContador').css({display:'none', visibility:'hidden'});
                        }

                        /*JA PREENCHE OS CAMPOS COM OS PECENTUAIS DE COMISSAONO MODAL DE REGISTRO */
                        $('#spanRcComissaoVendas').html(dadosComissao.comissaoVenda);

                        $('#mpSpanVendas').html(dadosComissao.vendas);

                        /*JA PREENCHE OS CAMPOS COM OS VALORES DE VENDA VALIDACAO E VENDA E VALIDACAO NO MODAL DE REGISTRO */
                        $('#spanRcVendas').html(dadosComissao.vendas);


                        /*MONTA DADOS DA COMISSAO DO USUARIO*/
                        montarTabelaDinamica(dadosComissao.colunasQuadroResumo, dadosComissao.quadroResumo, 'mpTabelaQuadroResumo', 'divQuadroResumoComissao', 'table table-bordered');
                        $('#spanComissaoVendasContador').html(dadosComissao.comissaoVenda);
                        $('#spanVendasContador').html(dadosComissao.vendas);
                        $('#valorVendaContador').val(dadosComissao.valorVendas);
                        montarTabelaDinamica(dadosComissao.colunasCertificadosVendidos, dadosComissao.certificadosVendidos, 'mpTabelaCdsVendidos', 'divCertificadosVendidos');
                        /*FIM DA MONTAGEM DADOS DA COMISSAO DO USUARIO*/
                    }

                }

            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro ('Error CD10002 - Erro ao carregar os detalhes do certificado.,' + msnPadrao + ' '+e + '.');

            }
        }
    });
}

function apagarContatoContador(contatoId){
    $('#mensagemLoading').html('<i class="fa fa-lg fa-trash"></i> Apagando contato');
    $('#modalCarregando').modal('show');

    var dadosajax = {
        'funcao' : 'apagar_contato_contador',
        'contatoId' : contatoId

    }

    $.ajax({
        url: pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function(){
            alertErro ('Error CD20001 - Erro na acao de apagar contato,' + msnPadrao + '.');
        },
        success : function(result){

            try {
                var resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {
                    alertSucesso('Contato excluido com sucesso!');
                    carregarModalDetalharContador($('#idContador').val());
                }

            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro ('Error CD20002 - Erro na acao de apagar contato.,' + msnPadrao + ' '+e + '.');

            }
        }
    });
}

function carregarModalContatoContador () {
    $('#edtNomeNovoContato').val('');
    $('#edtCargoNovoContato').val('');
    $('#edtTelefoneNovoContato').val('');
    $('#edtCelularNovoContato').val('');
    $('#edtEmailNovoContato').val('');
}

function salvarContatoContador(){
    $('#mensagemLoading').html('<i class="fa fa-lg fa-address-card-o"></i> Salvando Contato');
    $('#modalCarregando').modal('show');


    var dadosajax = {
        'contadorId' : $('#idContador').val(),
        'funcao' : 'salvar_contato_contador',
        'nome':$('#edtNomeNovoContato').val(),
        'cargo':$('#edtCargoNovoContato').val(),
        'telefone': $('#edtTelefoneNovoContato').val(),
        'celular': $('#edtCelularNovoContato').val(),
        'email' : $('#edtEmailNovoContato').val(),
    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alert ('Error CD30001 - Erro na acao de inserir contato,' + msnPadrao + '.');
        },
        success : function(result){
            try {
                var resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {
                    alertSucesso('Contato inserido com sucesso!');
                    carregarModalDetalharContador($('#idContador').val());
                    $('#modalInserirContatoContador').modal('hide');
                }

            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro ('Error CD30001 - Erro ao inserir contato, ' + result + ' - '+e.message + '. '+msnPadrao + '.');

            }
        }
    });
}

function listarCertificadosContador (contadorId, tabela, dataDe, dataAte) {
    $("#esperaModal").modal('show');
    var dadosajax = {
        'funcao' : 'listarCertificadosContador',
        'contadorId' : contadorId,
        'dataDe' : dataDe,
        'dataAte' : dataAte
    };

    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (xhr, ajaxOptions, thrownError) {

            $("#esperaModal").modal('hide');
            alertErro ('Error CD40001 - Erro na acao de listar certificados do contador,' + msnPadrao + '.');
        },
        success : function(result){
            $("#esperaModal").modal('hide');
            var tabelaCertificado = result.split('%%');

            if (tabelaCertificado[0].trim() == 'ok') {
                montarTabelaDinamica(tabelaCertificado[1], tabelaCertificado[2], 'tabelaContadorListarCertificados', tabela);
            }else{
                alert('Error CD40002 - Erro ao montar tabela com os certificados do contador,' + msnPadrao + '.');
                console.log(result);
            }
        }
    });
}

function registrarComissaoContador () {
    $('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Registrando comissionamento do Contador');
    $('#modalCarregando').modal('show');


    var dadosajax = {
        'idContador' : $('#idContador').val(),
        'funcao' : "registrar_comissao_contador",
        'descricao' : $('#spanRcDescricao').html(),
        'periodoDe' : $('#spanRcPeriodoDe').html(),
        'periodoAte' : $('#spanRcPeriodoAte').html(),
        'vendas' : $('#valorVendaContador').val(),
        'comissaoVendas' : $('#spanRcComissaoVendas').html(),

    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error US50001 - Erro ao registrar a comiss&atilde;o do contador,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            try {
                resultado = JSON.parse(result);
                if (resultado.mensagem == 'Ok') {
                    alertSucesso('Comiss&atilde;o do Contador registrada com sucesso!');

                    $('#modalContadorRegistrarComissao').modal('hide');
                    carregarModalDetalharContador($('#idContador').val());
                }
            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error US50002 - Erro ao registrar a comiss&atilde;o do contador,' + msnPadrao + '.');
            }
        }
    });

}

function carregarModalRegistroComissoesContador() {
    /*
     TODO: PRECISO TERMINAR ESTA ROTINA PRA BUSCAR NO BANCO AS INFORMACOES QUE FICARAM REGISTRADAS NO BANCO NOS MESES ANTERIORES
     * */
    var periodos = $('#edtFiltroDataContador').val().split(',');

    $('#spanRcPeriodoDe').html(periodos[0]);
    $('#spanRcPeriodoAte').html(periodos[1]);
    $('#spanRcDescricao').html('Comiss&atilde;o do contador ' + $('#dcSpanNomeContador').html() + ' do per&iacute;odo de ' + periodos[0] + ' at&eacute; ' + periodos[1]);
}

function limparModalRegistrarLancamentoComissaoContador () {
    $('#editRlDescricao').val('');
    $('#editRlValor').val('');
    $('#editRlObservacao').val('');

}

function registrarLancamentoComissaoContador () {
    $('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Registrando lan&ccedil;amento na comissionamento do contador');
    $('#modalCarregando').modal('show');

    var dadosajax = {
        'funcao' : "registrar_lancamento_comissao_contador",
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
            alertErro ('Error US60001 - Erro ao registrar lan&ccedil;amento na comiss&atilde;o do contador,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){;
            try {
                resultado = JSON.parse(result);
                if (resultado.mensagem == 'Ok') {
                    alertSucesso('Lan&ccedil;amento realizado com sucesso na comiss&atilde;o do contador!');

                    $('#modalContadorRegistrarLancamentoComissao').modal('hide');
                    carregarModalDetalharContador($('#idContador').val());

                }
            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error US60001 - Erro ao registrar  lan&ccedil;amento na comiss&atilde;o do contador,' + msnPadrao + '.');
            }
        }
    });

}

function apagarLancamentoComissaoContador (idLancamentoComissaoContador) {
    $('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Apagando lan&ccedil;amento na comissionamento do contador');
    $('#modalCarregando').modal('show');

    var dadosajax = {
        'funcao' : "apagar_lancamento_comissao_contador",
        'idLancamentoComissaoContador' : idLancamentoComissaoContador,

    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error US70001 - Erro ao apagar lan&ccedil;amento na comiss&atilde;o do contador,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){;
            try {
                resultado = JSON.parse(result);
                if (resultado.mensagem == 'Ok') {
                    alertSucesso('Lan&ccedil;amento apagado com sucesso na comiss&atilde;o do contador!');

                    carregarModalDetalharContador($('#idContador').val());

                }
            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error US70002 - Erro ao apagar  lan&ccedil;amento na comiss&atilde;o do contador,' + msnPadrao + '.');
            }
        }
    });

}

function apagarRegistroComissaoContador (idRegistroComissao) {
    $('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Apagando registro da comissionamento do contador');
    $('#modalCarregando').modal('show');

    var dadosajax = {
        'funcao' : "apagar_registro_comissao_contador",
        'idRegistroComissao' : idRegistroComissao,

    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error US80001 - Erro ao apagar registro de comiss&atilde;o do contador,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){;
            try {
                resultado = JSON.parse(result);
                if (resultado.mensagem == 'Ok') {
                    alertSucesso('Registro de comiss&atilde;o do contador apagado com sucesso!');

                    carregarModalDetalharContador($('#idContador').val());

                }
            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error US80002 - Erro ao apagar registro de comiss&atilde;o do contador,' + msnPadrao + '.');
            }
        }
    });

}

function inserirObservacaoComissaoContador (observacao) {
    $('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Inserindo observa&ccedil;&atilde;o no comissionamento do Contador');
    $('#modalCarregando').modal('show');


    var dadosajax = {
        'idContador' : $('#idContador').val(),
        'funcao' : "inserir_observacao_comissao_contador",
        'registro_comissao_id': $('#registro_comissao_id').val(),
        'observacao' : observacao,
    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error US90001 - Erro ao tentar inserir observa&ccedil;&atilde;o no comissionamento do Contador,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){
            try {
                resultado = JSON.parse(result);
                if (resultado.mensagem == 'Ok') {
                    alertSucesso('observa&ccedil;&atilde;o inserida no comissionamento do contador com sucesso!');

                    carregarModalDetalharContador($('#idContador').val());
                }
            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error US90002 - Erro ao tentar inserir observa&ccedil;&atilde;o no comissionamento do Contador,' + msnPadrao + '.');
            }
        }
    });

}
