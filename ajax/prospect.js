$("body").addClass("modal-open");
var msnPadrao = 'entre em contato com o administrador do sistema (3321-5081)';

// var urlPadrao = 'funcoes/certificado/';
var pageUrl = 'funcoes/funcoesCrm.php';


//TIPO: QUAL O TIPO DO PROSPECT, DETALHE: SE SAO TODOS OU SE SAO ENTRE DATAS
function efeito_filtro_prospect (tipo, detalhe, contactado) {

    if (contactado != undefined)
        if (contactado.value=='sim') {
            $('#div_datas').css({'visibility':'visible', 'display':'block'});
            $('#filtro_detalhe').val('todos');
            $('#div_filtro_detalhe').css({'visibility':'visible', 'display':'block'});
        } else if (contactado.value =='nao') {
            $('#filtro_detalhe').val('todos');
            $('#div_filtro_detalhe').css({'visibility':'hidden', 'display':'none'});
            //$('#div_filtro_detalhe').css({'visibility':'visible', 'display':'block', 'pointer-events':'none'});


        }

    if (detalhe.value=='entre_datas')
        $('#div_datas').css({'visibility':'visible', 'display':'block'});
    else
        $('#div_datas').css({'visibility':'hidden', 'display':'none'});

    if (tipo.value != '' && detalhe.value != '') {
        //$('#div_btn_filtro').css({'visibility':'visible', 'display':'block'});

    }
    else {
        //$('#div_btn_filtro').css({'visibility':'hidden', 'display':'none'});
    }

};
function liberaEscolherProduto() {
    var edtNome = $("#edtNomeNegocio").val();
    var edtCpf = $("#edtCpfNegocio").val();
    var edtDataNascimento = $("#edtDataNascimentoNegocio").val();
    var edtCep = $("#edtCepNegocio").val();
    var edtEmail = $("#edtEmailNegocio").val();
    var edtEndereco = $("#edtEnderecoNegocio").val();
    var edtNumero = $("#edtNumeroNegocio").val();
    var edtBairro = $("#edtBairroNegocio").val();
    var edtCidade = $("#edtCidadeNegocio").val();
    var edtUf = $("#edtUfNegocio").val();
    var edtFone = $("#edtFoneNegocio").val();
    var edtCelular = $("#edtCelularNegocio").val();

    if (edtNome && edtCpf && edtDataNascimento && edtCep && edtEmail && edtEndereco && edtNumero && edtBairro && edtCidade && edtUf && edtFone && edtCelular) {
        $("#edtSalvarPessoaFisica").css('visibility','visible');
        $("#edtSalvarPessoaFisica").css('display','inline');
        console.warn("APLICOU CLASSE");
    }else{
        $("#edtSalvarPessoaFisica").css('visibility','hidden');
        $("#edtSalvarPessoaFisica").css('display','none');
        console.warn("APLICOU CLASSE OCULTA");
    }
};
function liberaBtn(src1 , src2){
    if(src1.value != "" && src1.value != null){
        $("#"+src2).css('visibility','visible');
        $("#"+src2).css('display','inline');
    }else{
        $("#"+src2).css('visibility','hidden');
        $("#"+src2).css('display','none');
    }
};
function validacaoForm(btn){
    if(src1.value != "" && src1.value != null){
        $("#"+src2).css('visibility','visible');
        $("#"+src2).css('display','inline');
    }else{
        $("#"+src2).css('visibility','hidden');
        $("#"+src2).css('display','none');
    }
};
function inserir_registo(){
    //dados a enviar, vai buscar os valores dos campos que queremos enviar para a BD
    var dados = $("#edtCpf").val();

    if(dados.length == 11){
        x = dados.substr(0,3)+"."+dados.substr(3,3)+"."+dados.substr(6,3)+"-"+dados.substr(9);
    }else if(dados.length == 14){
        x = dados.substr(0,2)+"."+dados.substr(2,3)+"."+dados.substr(5,3)+"/"+dados.substr(8,4)+"-"+dados.substr(12);
    }else{
        x = "";
    }

    var dadosajax = {
        'edtNomes' : $("#edtNome").val(),
        'edtCpf' : x,
        'edtCidade' : $("#edtCidade").val(),
        'edtBairro' : $("#edtBairro").val(),
        'edtPessoaTipo' : $("#edtPessoaTipo").val(),
        'edtFone' : $("#edtFone").val(),
        'edtSite' : $("#edtSite").val(),
        'edtEndereco' : $("#edtEndereco").val(),
        'edtCategoriaProspect' : $("#edtCategoriaProspect").val(),
        'edtProspectId' : $("#prospectId").val()

    };
    pageurl = 'ajax/php/gravar.php';
    //para consultar mais opcoes possiveis numa chamada ajax
    //http://api.jquery.com/jQuery.ajax/
    $.ajax({

        //url da pagina
        url: pageurl,
        //parametros a passar
        data: dadosajax,
        //tipo: POST ou GET
        type: 'POST',
        //cache
        cache: false,
        //se ocorrer um erro na chamada ajax, retorna este alerta
        //possiveis erros: pagina nao existe, erro de codigo na pagina, falha de comunicacao/internet, etc etc etc
        error: function(){
            alert('Erro: Inserir Registo!!');
        },
        //retorna o resultado da pagina para onde enviamos os dados
        success: function(result){
            //se foi inserido com sucesso
            if(result != 1){
                alert("Ocorreu um erro ao inserir o seu registo!");
                erroEmail(result, 'Erro no ajax/prospect.js');
                console.log(result);
            }else{
                alert("Cadastro Realizado com Sucesso!");
            }
        }
    });
};
function tipo_pessoa_form(){
    var pessoaTipo = $("input[id='edtTipoPessoa']:checked").val();
    $("#edtTipoPessoaFecharNegocio").val(pessoaTipo);
    if(pessoaTipo == "F") {
        $("#fecharNegocio").modal('hide');
        $("#fecharNegocioFormF").modal('show');
    }else if(pessoaTipo == "J"){
        $("#fecharNegocio").modal('hide');
        $("#fecharNegocioFormJ").modal('show');
    }
};
function inserir_cadastro(){
    //dados a enviar, vai buscar os valores dos campos que queremos enviar para a BD
    var dadosajax = {
        'pessoaTipo': $("#edtTipoPessoaFecharNegocio").val(),
        'edtNome' : $("#edtNomeNegocio").val(),
        'edtCpf' : $("#edtCpfNegocio").val(),
        'edtDataNascimento' : $("#edtDataNascimentoNegocio").val(),
        'edtCep' : $("#edtCepNegocio").val(),
        'edtEmail' : $("#edtEmailNegocio").val(),
        'edtEndereco' : $("#edtEnderecoNegocio").val(),
        'edtComplemento' : $("#edtComplementoNegocio").val(),
        'edtNumero' : $("#edtNumeroNegocio").val(),
        'edtBairro' : $("#edtBairroNegocio").val(),
        'edtCidade' : $("#edtCidadeNegocio").val(),
        'edtUf' : $("#edtUfNegocio").val(),
        'edtFone' : $("#edtFoneNegocio").val(),
        'edtFone2' : $("#edtFone2Negocio").val(),
        'edtCelular' : $("#edtCelularNegocio").val(),
        'edtCodigoFisico' : $("#edtCodigoFisicoNegocio").val(),
        'edtCodigoJuridico' : $("#edtCodigoJuridicoNegocio").val(),
        'edtProspectId' : $("#prospectId").val(),
        'edtCnpjNegocio' :$("#edtCnpjNegocio").val(),
        'edtRazaoSocial' :$("#edtRazaoSocial").val(),
        'edtNomeFantasiaNegocio' :$("#edtNomeFantasiaNegocio").val(),
        'edtEmailEmpresaNegocio' :$("#edtEmailEmpresaNegocio").val(),
        'edtEnderecoEmpresaNegocio' :$("#edtEnderecoEmpresaNegocio").val(),
        'edtComplementoEmpresaNegocio' :$("#edtComplementoEmpresaNegocio").val(),
        'edtNumeroEmpresaNegocio' :$("#edtNumeroEmpresaNegocio").val(),
        'edtBairroEmpresaNegocio' :$("#edtBairroEmpresaNegocio").val(),
        'edtUfEmpresaNegocio' :$("#edtUfEmpresaNegocio").val(),
        'edtFoneEmpresaNegocio' :$("#edtFoneEmpresaNegocio").val(),
        'edtFone2EmpresaNegocio' :$("#edtFone2EmpresaNegocio").val(),
        'edtCelularEmpresaNegocio' :$("#edtCelularEmpresaNegocio").val(),

    };

    console.log(dadosajax);

    pageurl = 'ajax/php/inserir_cadastro.php';
    //para consultar mais opcoes possiveis numa chamada ajax
    //http://api.jquery.com/jQuery.ajax/
    var x = $.ajax({

        //url da pagina
        url: pageurl,
        //parametros a passar
        data: dadosajax,
        //tipo: POST ou GET
        type: 'POST',
        //cache
        cache: false,
        //se ocorrer um erro na chamada ajax, retorna este alerta
        //possiveis erros: pagina nao existe, erro de codigo na pagina, falha de comunicacao/internet, etc etc etc
        error: function(){
            alert('Erro: Inserir Registo!!');
        },
        //retorna o resultado da pagina para onde enviamos os dados
        success: function(result){
            var cliente = result.split(';')
            if(cliente[1] == 0) {
                $("#edtCodigoFisicoNegocio").val(cliente[0]);
                console.info(cliente[0]);
                console.log("Cadastro Inserido/Ataulizado com sucesso");
            }else{
                console.error(result);
            }
        }
    });
};
function finalizar_negocio(){
    $("#esperaModal").modal('toggle');
    //dados a enviar, vai buscar os valores dos campos que queremos enviar para a BD
    var dadosajax = {
        'edtProduto' : $("#edtProduto").val(),
        'edtClienteId' : $("#edtCodigoFisicoNegocio").val(),
        'edtFormaPagamento' : $("#edtFormaPagamento").val(),
        //'edtDesconto' : $("#edtDesconto").val(),
        'edtProspectId' : $("#prospectId").val()

    };
    console.log(dadosajax);

    pageurl = 'ajax/php/finalizar_negocio.php';
    //para consultar mais opcoes possiveis numa chamada ajax
    //http://api.jquery.com/jQuery.ajax/
    var x = $.ajax({

        //url da pagina
        url: pageurl,
        //parametros a passar
        data: dadosajax,
        //tipo: POST ou GET
        type: 'POST',
        //cache
        cache: false,
        //se ocorrer um erro na chamada ajax, retorna este alerta
        //possiveis erros: pagina nao existe, erro de codigo na pagina, falha de comunicacao/internet, etc etc etc
        error: function(){
            alert('Erro: Inserir Registo!!');
        },
        //retorna o resultado da pagina para onde enviamos os dados
        success: function(result){
            if(result == 1){
                console.log(result);
                $("#fecharNegocio").modal('show');
                $("#fecharNegocioFormF").modal('hide');
                $("#fecharNegocioFormJ").modal('hide');
                $("#escolherProduto").modal('hide');
                $("#esperaModal").modal('toggle');

                $("#edtNomeNegocio").val("");
                $("#edtCpfNegocio").val("");
                $("#edtDataNascimentoNegocio").val("");
                $("#edtCepNegocio").val("");
                $("#edtEmailNegocio").val("");
                $("#edtEnderecoNegocio").val("");
                $("#edtNumeroNegocio").val("");
                $("#edtBairroNegocio").val("");
                $("#edtCidadeNegocio").val("");
                $("#edtUfNegocio").val("");
                $("#edtFoneNegocio").val("");
                $("#edtCelularNegocio").val("");

                $("#edtCnpjNegocio").val("");
                $("#edtRazaoSocial").val("");
                $("#edtNomeFantasiaNegocio").val("");
                $("#edtEmailEmpresaNegocio").val("");
                $("#edtEnderecoEmpresaNegocio").val("");
                $("#edtComplementoEmpresaNegocio").val("");
                $("#edtNumeroEmpresaNegocio").val("");
                $("#edtBairroEmpresaNegocio").val("");
                $("#edtUfEmpresaNegocio").val("");
                $("#edtFoneEmpresaNegocio").val("");
                $("#edtFone2EmpresaNegocio").val("");
                $("#edtCelularEmpresaNegocio").val("");

                alert("Cadastrado Realizado com Sucesso");
            }else {
                $("#esperaModal").modal('toggle');
                alert("Opa, Algo Deu Errado, entre em contato com sistema@gruposerama.com.br");
                erroEmail(result,acentuarMsn("Erro na função de finalizar o negocio em javascritp do prospect"));
                console.log(result);
            }
        }
    });
};
function consulta_certificado(){
    //dados a enviar, vai buscar os valores dos campos que queremos enviar para a BD
    var dadosajax = {
        'edtProspectId' : $("#prospectId").val()

    };
    pageurl = 'ajax/php/consulta_certificado.php';
    //para consultar mais opcoes possiveis numa chamada ajax
    //http://api.jquery.com/jQuery.ajax/
    $.ajax({

        //url da pagina
        url: pageurl,
        //parametros a passar
        data: dadosajax,
        //tipo: POST ou GET
        type: 'POST',
        //cache
        cache: false,
        //se ocorrer um erro na chamada ajax, retorna este alerta
        //possiveis erros: pagina nao existe, erro de codigo na pagina, falha de comunicacao/internet, etc etc etc
        error: function(){
            alert('Erro: pagina nao existe, erro de codigo na pagina, falha de comunicacao/internet, etc etc etc!!');
        },
        //retorna o resultado da pagina para onde enviamos os dados
         success: function(result){
            //se foi inserido com sucesso
            if($.trim(result) == '0'){
                alert("Ocorreu um erro ao inserir o seu registo!");
            }
        }
    });
};
function retencao(){
    //dados a enviar, vai buscar os valores dos campos que queremos enviar para a BD
    var dadosajax = {
        'edtProspectId' : $("#prospectId").val(),
		'edtObservacaoRetencao' : $("#edtObservacaoRetencao").val()
    };
    pageurl = 'ajax/php/retencao.php';
    //para consultar mais opcoes possiveis numa chamada ajax
    //http://api.jquery.com/jQuery.ajax/
    $.ajax({
        //url da pagina
        url: pageurl,
        //parametros a passar
        data: dadosajax,
        //tipo: POST ou GET
        type: 'POST',
        //cache
        cache: false,
        //se ocorrer um erro na chamada ajax, retorna este alerta
        //possiveis erros: pagina nao existe, erro de codigo na pagina, falha de comunicacao/internet, etc etc etc
        error: function(){
            alert('Erro: Inserir Registo!!');
        },
        //retorna o resultado da pagina para onde enviamos os dados
         success: function(result){
            //se foi inserido com sucesso
            if(result == '0'){
                alert("Retido com Sucesso!");
            }else{
                alert("Ocorreu um erro ao inserir o seu registo!");
                console.error(result);
            }
        }
    });
};
function iniciar_contato(tipoContato){
    //dados a enviar, vai buscar os valores dos campos que queremos enviar para a BD
    var dadosajax = {
        'edtProspectId' : $("#prospectId").val(),
		'edtProspectTipoContato' : tipoContato
    };
    pageurl = 'ajax/php/iniciar_contato.php';
    //para consultar mais opcoes possiveis numa chamada ajax
    //http://api.jquery.com/jQuery.ajax/
    $.ajax({
        //url da pagina
        url: pageurl,
        //parametros a passar
        data: dadosajax,
        //tipo: POST ou GET
        type: 'POST',
        //cache
        cache: false,
        //se ocorrer um erro na chamada ajax, retorna este alerta
        //possiveis erros: pagina nao existe, erro de codigo na pagina, falha de comunicacao/internet, etc etc etc
        error: function(){
            alert('Erro: Inserir Registo!!');
        },
        //retorna o resultado da pagina para onde enviamos os dados
         success: function(result)
        {
            //se foi inserido com sucesso
            if($.trim(result) == '0'){
                alert("Ocorreu um ao Iniciar o contato!");
            }
        }
    });
};
function prospect_atendimento(tipoContato){
    //dados a enviar, vai buscar os valores dos campos que queremos enviar para a BD
    var dadosajax = {
        'edtProspectId' : $("#prospectId").val(),
        'edtProspectTipoContato' : tipoContato
    };
    pageurl = 'ajax/php/prospect_atendimento.php';
    //para consultar mais opcoes possiveis numa chamada ajax
    //http://api.jquery.com/jQuery.ajax/
    $.ajax({
        //url da pagina
        url: pageurl,
        //parametros a passar
        data: dadosajax,
        //tipo: POST ou GET
        type: 'POST',
        //cache
        cache: false,
        //se ocorrer um erro na chamada ajax, retorna este alerta
        //possiveis erros: pagina nao existe, erro de codigo na pagina, falha de comunicacao/internet, etc etc etc
        error: function(){
            alert('Erro: Inserir Registo Atendimento!!');
        },
        //retorna o resultado da pagina para onde enviamos os dados
        success: function(result)
        {
            //se foi inserido com sucesso
            if($.trim(result) != '0'){
                console.warn(result);
            }
        }
    });
};
/*function consulta_historico(prospectId){

    var dadosajax = {
        'edtProspectId' : $("#prospectId").val()
    };
    pageurl = 'ajax/php/historico.php';
	$.ajax({
		//url da pagina
        url: pageurl,
        //parametros a passar
        data: dadosajax,
        //tipo: POST ou GET
        type: 'POST',
        //cache
        cache: true,
		error: function(){
            alert('Erro: Consulta Registo!!');
        },
		success: function(html){
			$("#historico").html(html);
		},
	});
}*/
// FUNÇÃO PARA INICIAR O CONOMETRO
function iniciar_tempo(){
    setInterval('tempo()',983);
};
// VARIAVEIS PARA CONOMETRO  NO PAINEL DO CRM
var segundo = 0+"0";
var minuto = 0+"0";
var hora = 0+"0";
function tempo(){

    if (segundo < 59){
        segundo++
        if(segundo < 10){segundo = "0"+segundo}
    }else
        if(segundo == 59 && minuto < 59){
            segundo = 0+"0";
            minuto++;
            if(minuto < 10){minuto = "0"+minuto}
        }
    if(minuto == 59 && segundo == 59 && hora < 23){
        segundo = 0+"0";
        minuto = 0+"0";
        hora++;
        if(hora < 10){hora = "0"+hora}
        }else
            if(minuto == 59 && segundo == 59 && hora == 23){
                segundo = 0+"0";
                minuto = 0+"0";
                hora = 0+"0";
            }

    document.getElementById("cronometro").value = hora +":"+ minuto +":"+ segundo
    document.getElementById("edtInserirProspect").disabled=false;
    document.getElementById("edtFecharNegocio").disabled=false;
    document.getElementById("edtReagendar").disabled=false;
    document.getElementById("ioBtnObservacao").disabled=false;
    document.getElementById("edtConsultaCertificados").disabled=false;
    //document.getElementById("edtEnviarProposta").disabled=false;
    document.getElementById("edtRetencaoCliente").disabled=false;
    //document.getElementById("edtFinalizar").disabled=false;
    document.getElementById("edtEspera").disabled=false;
    document.getElementById("edtFechar").style.display="none";
    document.getElementById("telefone").disabled=true;
    document.getElementById("celular").disabled=true;
    document.getElementById("email").disabled=true;
    document.getElementById("wpp").disabled=true;
};
function pesquisa_cpf(valor){
    $("#esperaModal").modal('show');
    document.getElementById('edtNomeNegocio').value="Carregando...";
    document.getElementById('edtDataNascimentoNegocio').value="Carregando...";
    document.getElementById('edtCepNegocio').value="Carregando...";
    document.getElementById('edtEmailNegocio').value="Carregando...";
    document.getElementById('edtFoneNegocio').value="Carregando...";
    document.getElementById('edtCelularNegocio').value="Carregando...";
    document.getElementById('edtCodigoNegocio').value="Carregando...";
    //dados a enviar, vai buscar os valores dos campos que queremos enviar para a BD
    var dadosajax = {
        'cpf' : valor
    };
    pageurl = 'ajax/php/pesquisa_cpf.php?cpf='+valor;
    //para consultar mais opcoes possiveis numa chamada ajax
    //http://api.jquery.com/jQuery.ajax/

    var dados = $.ajax({

        //url da pagina
        url: pageurl,
        //parametros a passar
        data: dadosajax,
        //tipo: POST ou GET
        type: 'POST',
        //cache
        cache: false,
        //se ocorrer um erro na chamada ajax, retorna este alerta
        //possiveis erros: pagina nao existe, erro de codigo na pagina, falha de comunicacao/internet, etc etc etc
        error: function(){
            document.getElementById('edtNomeNegocio').value="";
            document.getElementById('edtDataNascimentoNegocio').value="";
            document.getElementById('edtCepNegocio').value="";
            document.getElementById('edtEmailNegocio').value="";
            document.getElementById('edtFoneNegocio').value="";
            document.getElementById('edtCelularNegocio').value="";
            document.getElementById('edtCodigoFisicoNegocio').value="";
            $("#esperaModal").modal('hide');
        },
        //retorna o resultado da pagina para onde enviamos os dados
        success: function(result){
                var cliente = result.split(";");
                if(cliente[7]==0){
                    //se foi inserido com sucesso
                    document.getElementById('edtNomeNegocio').value=(cliente[0]).toUpperCase();
                    document.getElementById('edtDataNascimentoNegocio').value=(cliente[1]);
                    document.getElementById('edtCepNegocio').value=(cliente[2]);
                    document.getElementById('edtEmailNegocio').value=(cliente[3]);
                    document.getElementById('edtFoneNegocio').value=(cliente[4]);
                    document.getElementById('edtCelularNegocio').value=(cliente[5]);
                    document.getElementById('edtCodigoFisicoNegocio').value=(cliente[6]);
                    $('#esperaModal').modal('hide');
                }else{
                    document.getElementById('edtNomeNegocio').value=null;
                    document.getElementById('edtDataNascimentoNegocio').value=null;
                    document.getElementById('edtCepNegocio').value=null;
                    document.getElementById('edtEmailNegocio').value=null;
                    document.getElementById('edtFoneNegocio').value=null;
                    document.getElementById('edtCelularNegocio').value=null;
                    document.getElementById('edtCodigoFisicoNegocio').value=null;
                    $('#esperaModal').modal('hide');
                }
        }
    });
};
function pesquisa_cnpj(valor){
    $("#esperaModal").modal('show');
    $("#edtCnpjNegocio").val(valor);
    $("#edtRazaoSocial").val("Carregando...");
    $("#edtNomeFantasiaNegocio").val("Carregando...");
    $("#edtEmailEmpresaNegocio").val("Carregando...");
    $("#edtEnderecoEmpresaNegocio").val("Carregando...");
    $("#edtComplementoEmpresaNegocio").val("Carregando...");
    $("#edtNumeroEmpresaNegocio").val("Carregando...");
    $("#edtBairroEmpresaNegocio").val("Carregando...");
    $("#edtUfEmpresaNegocio").val("Carregando...");
    $("#edtFoneEmpresaNegocio").val("Carregando...");
    $("#edtFone2EmpresaNegocio").val("Carregando...");
    $("#edtCelularEmpresaNegocio").val("Carregando...");

    console.warn(valor);
    //dados a enviar, vai buscar os valores dos campos que queremos enviar para a BD
    var dadosajax = {
        'cnpj' : valor
    };
    pageurl = 'ajax/php/pesquisa_cnpj.php?cnpj='+valor;
    //para consultar mais opcoes possiveis numa chamada ajax
    //http://api.jquery.com/jQuery.ajax/

    var dados = $.ajax({

        //url da pagina
        url: pageurl,
        //parametros a passar
        data: dadosajax,
        //tipo: POST ou GET
        type: 'POST',
        //cache
        cache: false,
        //se ocorrer um erro na chamada ajax, retorna este alerta
        //possiveis erros: pagina nao existe, erro de codigo na pagina, falha de comunicacao/internet, etc etc etc
        error: function(){
            $("#edtCnpjNegocio").val(valor);
            $("#edtRazaoSocial").val("");
            $("#edtNomeFantasiaNegocio").val("");
            $("#edtEmailEmpresaNegocio").val("");
            $("#edtEnderecoEmpresaNegocio").val("");
            $("#edtComplementoEmpresaNegocio").val("");
            $("#edtNumeroEmpresaNegocio").val("");
            $("#edtBairroEmpresaNegocio").val("");
            $("#edtUfEmpresaNegocio").val("");
            $("#edtFoneEmpresaNegocio").val("");
            $("#edtFone2EmpresaNegocio").val("");
            $("#edtCelularEmpresaNegocio").val("");
            $("#esperaModal").modal('hide');
        },
        //retorna o resultado da pagina para onde enviamos os dados
        success: function(result){
            var cliente = result.split(";");
            console.warn(result);
            if(cliente[13]==0){
                //se foi inserido com sucesso
                $("#edtCnpjNegocio").val(valor);
                $("#edtRazaoSocial").val(cliente[0]);
                $("#edtNomeFantasiaNegocio").val(cliente[1]);
                $("#edtEmailEmpresaNegocio").val(cliente[3]);
                $("#edtEnderecoEmpresaNegocio").val(cliente[7]);
                $("#edtComplementoEmpresaNegocio").val(cliente[9]);
                $("#edtNumeroEmpresaNegocio").val(cliente[10]);
                $("#edtBairroEmpresaNegocio").val(cliente[11]);
                $("#edtUfEmpresaNegocio").val(cliente[12]);
                $("#edtFoneEmpresaNegocio").val(cliente[4]);
                $("#edtFone2EmpresaNegocio").val(cliente[8]);
                $("#edtCelularEmpresaNegocio").val(cliente[5]);
                $("#edtCodigoJuridicoNegocio").val(cliente[6]);

                $("#esperaModal").modal('hide');
            }else{
                erroEmail(result,acentuarMsn("Erro na função de pesquisa cnpj no arquivo prospect"));
                console.warn("Nenhum Cliente encontrado com este CNPJ");
                $("#edtCnpjNegocio").val(valor);
                $("#edtRazaoSocial").val("");
                $("#edtNomeFantasiaNegocio").val("");
                $("#edtEmailEmpresaNegocio").val("");
                $("#edtEnderecoEmpresaNegocio").val("");
                $("#edtComplementoEmpresaNegocio").val("");
                $("#edtNumeroEmpresaNegocio").val("");
                $("#edtBairroEmpresaNegocio").val("");
                $("#edtUfEmpresaNegocio").val("");
                $("#edtFoneEmpresaNegocio").val("");
                $("#edtFone2EmpresaNegocio").val("");
                $("#edtCelularEmpresaNegocio").val("");
                $("#edtCodigoJuridicoNegocio").val("");
                $("#esperaModal").modal('hide');
            }
        }
    });
};

function angendar_contato(){
    //dados a enviar, vai buscar os valores dos campos que queremos enviar para a BD
    var dadosajax = {
        'edtProspectId' : $("#prospectId").val(),
        'edtDataAgendamento' : $("#datetimepicker13").val(),
        'edtMotivoAgendamento' : $("#edtMotivoAgendamento").val(),
        'funcao' : 'agendar'
    };
    alert(dadosajax['edtDataAgendamento']);
    pageurl = 'ajax/php/agendar_contato.php';
    //para consultar mais opcoes possiveis numa chamada ajax
    //http://api.jquery.com/jQuery.ajax/
    $.ajax({
        //url da pagina
        url: pageurl,
        //parametros a passar
        data: dadosajax,
        //tipo: POST ou GET
        type: 'POST',
        //cache
        cache: false,
        //se ocorrer um erro na chamada ajax, retorna este alerta
        //possiveis erros: pagina nao existe, erro de codigo na pagina, falha de comunicacao/internet, etc etc etc
        error: function(){
            alert('Erro: Inserir Registo!!');
        },
        //retorna o resultado da pagina para onde enviamos os dados
         success: function(result){
            //se foi inserido com sucesso
            if(result == 0){
                erroEmail(result,"Erro na funcao javascritp de agendar_contato");
                alert("Ocorreu um erro ao agendar o seu cadastro!");
            }
        }
    });
};
function espera_contato(){
    //dados a enviar, vai buscar os valores dos campos que queremos enviar para a BD
    var dadosajax = {
        'edtProspectId' : $("#prospectId").val(),
        'edtDataAgendamento' : $("#datetimepicker14").val(),
        'edtMotivoAgendamento' : $("#edtMotivoAgendamentoEspera").val(),
        'funcao' : 'espera'
    };
    pageurl = 'ajax/php/agendar_contato.php';
    //para consultar mais opcoes possiveis numa chamada ajax
    //http://api.jquery.com/jQuery.ajax/
    $.ajax({
        //url da pagina
        url: pageurl,
        //parametros a passar
        data: dadosajax,
        //tipo: POST ou GET
        type: 'POST',
        //cache
        cache: false,
        //se ocorrer um erro na chamada ajax, retorna este alerta
        //possiveis erros: pagina nao existe, erro de codigo na pagina, falha de comunicacao/internet, etc etc etc
        error: function(){
            alert('Erro: Inserir Registo!!');
        },
        //retorna o resultado da pagina para onde enviamos os dados
        success: function(result)
        {
            //se foi inserido com sucesso
            if(result == 0){
                erroEmail(result, "Erro no javascritp do prospect!");
                alert("Ocorreu um erro ao inserir o seu registo!");
                console.error(result);
            }else{
                ir_para("telaProspect.php");
            }
        }
    });
};
function finalizar_chamada(){
    //dados a enviar, vai buscar os valores dos campos que queremos enviar para a BD
    var dadosajax = {
        'edtProspectId' : $("#prospectId").val(),
        'edtObservacaoChamada' : $("#edtObservacaoChamada").val()
    };
    pageurl = 'ajax/php/finalizar_chamada.php';
    //para consultar mais opcoes possiveis numa chamada ajax
    //http://api.jquery.com/jQuery.ajax/
    $.ajax({
        //url da pagina
        url: pageurl,
        //parametros a passar
        data: dadosajax,
        //tipo: POST ou GET
        type: 'POST',
        //cache
        cache: false,
        //se ocorrer um erro na chamada ajax, retorna este alerta
        //possiveis erros: pagina nao existe, erro de codigo na pagina, falha de comunicacao/internet, etc etc etc
        error: function(){
            alert('Erro: Inserir Registo!!');
        },
        //retorna o resultado da pagina para onde enviamos os dados
         success: function(result){
            //se foi inserido com sucesso
            if($.trim(result) == '0'){
                console.log(result);
                alert("Ocorreu um erro ao inserir o seu registo!");
                erroEmail(result,acentuarMsn("Erro na função de finalizar chamada!"));
            }else{
                location.href="telaProspect.php";
            }
        }
    });
};
function consulta_passiva(){
    var dado = $('#edtPesquisaProspect').val();

    if(dado.length == 11){
        x = dado.substr(0,3)+"."+dado.substr(3,3)+"."+dado.substr(6,3)+"-"+dado.substr(9);
    }else if(dado.length == 14){
        x = dado.substr(0,2)+"."+dado.substr(2,3)+"."+dado.substr(5,3)+"/"+dado.substr(8,4)+"-"+dado.substr(12);
    }else{
        alert("Dados da Pesquisa Invalido!");
    }

    var dadosajax = {
        'cpfCnpj' :  x
    }

    pageUrl = "ajax/php/consulta_passiva.php";
    console.log(dadosajax['cpfCnpj']);
        $.ajax({
            url: pageUrl,
            data : dadosajax,
            type : 'POST',
            cache : true,
            error : function(){
                alert('Error TC.JS/433 - Erro na ação de consulta de Dados');
            },
            success : function(result){
                console.log(result);
                if (result){
                    cliente = result.split(";");
                    document.getElementById('edtPesquisaProspect').value="";
                    document.getElementById('idCliente').value=cliente[0];
                    document.getElementById('idCertificado').value=cliente[7];
                    document.getElementById('pssCpfCnpj').innerHTML=x;
                    document.getElementById('pssEdtNome').innerHTML=cliente[1];
                    document.getElementById('pssEdtNascimento').innerHTML=cliente[2];
                    document.getElementById('pssEdtProduto').innerHTML=cliente[3];
                    document.getElementById('pssEdtLocal').innerHTML=cliente[4];
                    document.getElementById('pssValorProduto').innerHTML=cliente[5];
                    document.getElementById('pssEdtProtocolo').innerHTML=cliente[6];
                    document.getElementById('btnEdtNovo').disabled=true;
                    document.getElementById('btnEdtAnteder').disabled=false;
                    document.getElementById('btnEdtLimpar').disabled=false;
                }else{
                    document.getElementById('edtPesquisaProspect').value="";
                    document.getElementById('pssCpfCnpj').innerHTML=x;
                    document.getElementById('pssEdtNome').innerHTML="";
                    document.getElementById('pssEdtNascimento').innerHTML="";
                    document.getElementById('pssEdtProduto').innerHTML="";
                    document.getElementById('pssEdtLocal').innerHTML="";
                    document.getElementById('pssValorProduto').innerHTML="";
                    document.getElementById('pssEdtProtocolo').innerHTML="";
                    document.getElementById('btnEdtNovo').disabled=false;
                    document.getElementById('btnEdtAnteder').disabled=true;
                    document.getElementById('btnEdtLimpar').disabled=false;
                    console.log(result);
                }
            }
        });
};
function limpar_passiva(){
            document.getElementById('edtPesquisaProspect').value="";
            document.getElementById('pssCpfCnpj').innerHTML="";
            document.getElementById('pssEdtNome').innerHTML="";
            document.getElementById('pssEdtNascimento').innerHTML="";
            document.getElementById('pssEdtProduto').innerHTML="";
            document.getElementById('pssEdtLocal').innerHTML="";
            document.getElementById('pssValorProduto').innerHTML="";
            document.getElementById('pssEdtProtocolo').innerHTML="";
            document.getElementById('btnEdtNovo').disabled=true;
            document.getElementById('btnEdtAnteder').disabled=true;
            document.getElementById('btnEdtLimpar').disabled=true;
};
function proxima_etapa(oculto,funcao){
    $("#"+oculto).modal('hide');
    $("#"+funcao).modal('show');
};
function inserir_observacao(usuario_id) {
    var dadosajax = {
        'prospect_id' : $('#prospectId').val(),
        'observacao' : $('#ioEdtObservacao').val(),
        'usuario_id' : usuario_id
    };
    pageurl = 'ajax/php/inserir_observacao.php';

    $.ajax ({
        url : pageurl,
        data : dadosajax,
        type : 'POST',
        cache : false,
        error : function (){
            alert ('Error: Inserir Observacao');
        },
        success : function(result){
            console.log(result);
            if (result ==0) {
                var contador = result.split(';');
                $("#inserirObservacao").val("");
                alert('Obersavacao inserida com sucesso!');
            }else{
                erroEmail(result, "Erro no javascritp do prospect!");
                alert("Ocorreu um erro ao inserir o seu registo!");
                console.error(result);
            }
        }
    });
};
function informar_pagamento_prospect(usuario_id) {
    var dadosajax = {
        'edtCodigoContador':$("#edtCodigoContador").val(),
        'prospect_id' : $('#prospectId').val(),
        'usuario_id' : usuario_id
    };
    pageurl = 'ajax/php/informar_pagamento.php';

    $.ajax ({
        url : pageurl,
        data : dadosajax,
        type : 'POST',
        cache : false,
        error : function (){
            alert ('Error: Informar Pagamento');
        },
        success : function(result){
            console.log(result);
            if (result==0) {
                $("#informarPagto").modal("hide");
                alert('Pagamento Informado com sucesso!');
            }else{
                erroEmail(result, "Erro no javascritp do prospect!");
                alert("Ocorreu um erro ao inserir o seu registo!");
                console.error(result);
            }
        }
    });
};
function trocaModal(modalOcultar, modalApresentar){
    $(modalOcultar).modal('hide');
    $(modalApresentar).modal('show');
};

/* CONSULTA CEP DOS CORREIORS */
function limpa_formulario_cep() {
    //Limpa valores do formul?rio de cep.

    document.getElementById('edtEnderecoNegocio').value=("");
    document.getElementById('edtBairroNegocio').value=("");
    document.getElementById('edtCidadeNegocio').value=("");
    document.getElementById('edtComplementoNegocio').value=("");
    document.getElementById('edtUfNegocio').value=("");
}
function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('edtEnderecoNegocio').value=(conteudo.logradouro).toUpperCase();
        document.getElementById('edtBairroNegocio').value=(conteudo.bairro).toUpperCase();
        document.getElementById('edtComplementoNegocio').value=(conteudo.complemento).toUpperCase();
        document.getElementById('edtCidadeNegocio').value=(conteudo.localidade).toUpperCase();
        document.getElementById('edtUfNegocio').value=(conteudo.uf).toUpperCase();

    } //end if.
    else {
        //CEP n?o Encontrado.
        limpa_formulario_cep();
        alert("CEP n?o encontrado.");
    }
}
function consultaCEP(valor) {

    //Nova vari?vel "cep" somente com d?gitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Express?o regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.

            document.getElementById('edtEnderecoNegocio').value="Carregando...";
            document.getElementById('edtBairroNegocio').value="Carregando...";
            document.getElementById('edtCidadeNegocio').value="Carregando...";
            document.getElementById('edtComplementoNegocio').value="Carregando...";
            document.getElementById('edtUfNegocio').value="...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conte?do.
            document.body.appendChild(script);


        } //end if.
        else {
            //cep ? inv?lido.
            limpa_formulario_cep();
            alert("Formato de CEP inv?lido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formul?rio.
        limpa_formulario_cep();
    }
};
/* FIM CONSULTA CEP CORREIOS*/

function gerarRenovacao(certificado_id) {
    var validaformulario = true;
    var formaPagamento = $('input[name=edtRnPagamento]:checked').val();
    var vencimentoBoleto = $('#edtRnVencimento').val();
    var produtoRenovacao = $('#edtSelectProdutos').val();

    var dataVencimento = $('#edtRnVencimento').val().split(' ');
    dataVencimento = dataVencimento[0].split('/');
    var dataVencimento = new Date(dataVencimento[2], (dataVencimento[1]-1), dataVencimento[0]);
    var dataHoje = new Date();

    if (dataVencimento < dataHoje) {
        alert('A data de vencimento do boleto deve ser maior ou igual a data de hoje.');
        validaformulario = false;
    }


    if (produtoRenovacao =='') {
        alert('Por favor selecione o produto do Certificado que sera renovado');
        validaformulario = false;
    }

    if (validaformulario) {
            if (formaPagamento === undefined) {
                alert('Por favor selecione a forma de pagamento do Certificado que sera renovado');
                validaformulario = false;
            } else if ( (formaPagamento == '1') && (vencimentoBoleto=='') ) {
                alert('Por favor selecione o vencimento do boleto do Certificado que sera renovado');
                validaformulario = false;
            }
    }
    /*SE FORMULARIO FOI VALIDADO SEM ESQUECER DE INFORMAR TUDO*/
    if (validaformulario) {
            var id_contador = '';
            //dados a enviar, vai buscar os valores dos campos que queremos enviar para a BD
            /*PEGA O CODIGO DO CONTADOR DO SELECT OU DO INPUT*/
            if ($('#edtSelectContador').val()!='outro' && $('#edtSelectContador').val()!='')
                var id_contador = $('#edtSelectContador').val();
            else if ($('#edtSelectContador').val()!='')edtCodigoContadorRenovacao
                var id_contador = $("#edtCodigoContadorRenovacao").val();

            $("#esperaModal").modal('show');

            var dadosajax = {
                'edtProdutoRenovacao':produtoRenovacao,
                'edtVencimentoBoleto':vencimentoBoleto,
                'edtFormaPagamento' :formaPagamento,
                'edtCodigoContadorRenovacao':id_contador,
                'certificado_id' : certificado_id,
                'idUsuarioLogado' : sessionStorage.usuarioLogadoId,
                'edtProspectId' : $("#prospectId").val()

            };
            console.log('codigo do contador ' + dadosajax['edtCodigoContadorRenovacao']);

            pageurl = 'ajax/php/gerarRenovacao.php';
            //para consultar mais opcoes possiveis numa chamada ajax
            //http://api.jquery.com/jQuery.ajax/
            var x = $.ajax({

                //url da pagina
                url: pageurl,
                //parametros a passar
                data: dadosajax,
                //tipo: POST ou GET
                type: 'POST',
                //cache
                cache: false,
                //se ocorrer um erro na chamada ajax, retorna este alerta
                //possiveis erros: pagina nao existe, erro de codigo na pagina, falha de comunicacao/internet, etc etc etc
                error: function(){
                    alert('Erro: Inserir Registo!!');
                },
                //retorna o resultado da pagina para onde enviamos os dados
                success: function(result){
                    $("#esperaModal").modal('hide');
                    resultado = result.split(';');

                    if (resultado[0].trim() == 'tudoOk') {
                        alert("Certificado de renovação gerado com Sucesso!");
                    }else {
                        alert("Opa, Algo Deu Errado, Erro:"+resultado[0]+" entre em contato com sistema@gruposerama.com.br");
                        erroEmail(result,acentuarMsn("Erro na função de gerar renovação em javascritp do prospect"));
                    }
                    if (formaPagamento == 1) {
                        if(resultado[1].trim() == 'boletoOk'){
                            alert("Boleto gerado com sucesso!");
                        }else {
                            alert("Opa, Algo Deu Errado na hora de geracao do boleto. Erro:"+resultado[1]+" Verifique se o pedido de renovacao foi gerado, corrija o erro e em seguida tente emitir um novo boleto. Erro:");
                            erroEmail(result,acentuarMsn("Erro na função de gerar renovação em javascritp do prospect"));
                        }
                    }

                    ir_para('telaProspect.php');
                }
            });
    }
};

function gerar_boleto(certificado_id,usuario_id) {
    var dadosajax = {
        'certificado_id':certificado_id,
        'usuario_id':usuario_id
    };
    console.log (dadosajax);

    var pageurl = 'ajax/php/gerarBoleto.php';
    $.ajax ({
        url : pageurl,
        data : dadosajax,
        type : 'POST',
        cache : true,

        error : function (){
            alert ('Error TC.JS/725 - Erro na ação de Gerar Boleto,' + msnPadrao + '.');
        },
        success : function(result){
            if (result) {
                var boleto = result.split(';');
                if (boleto[1] == 0){
                    alert('Boleto Gerado com Sucesso!');
                    window.open(boleto[0]);
                    $("#gerarBoleto").modal('hide');
                    ir_para('telaCertificado.php');
                }else{
                    erroEmail(result, "Erro no javascript de gerar boleto");
                    ir_para('telaCertificado.php');
                    alert('Error TC.JS/182 - Erro ao gerar boleto do Certificado,' + msnPadrao + '.');
                    console.log(result);
                }
            }
        }
    });
};
/*TIPO DA BUSCA PODE SER ID OU CODIGO*/
function procurar_contador(cod_contador){
    $("#esperaModal").modal('show');
    var contador_id = 0;

    if (cod_contador !== undefined)
        contador_id = cod_contador;
    else
        contador_id = $("#edtInformarCodContador").val();

    var dadosajax ={
        'cod_desconto_contador':contador_id
    }
    pageurl = 'ajax/php/procurar_contador.php';

    $.ajax ({
        url : pageurl,
        data : dadosajax,
        type : 'POST',
        cache : true,

        error : function (){
            alert ('Error TC.JS/725 - Erro na ação de Procurar Contador,' + msnPadrao + '.');
        },
        success : function(result){
            if (result) {
                console.log(result);
                var contador = result.split(";");

                /*SE NAO FOI PASSADO NENHUM CONTADOR NA CONSULTA E POR QUE ESTAMOS REALIZANDO A FUNCAO DE BUSCAR O CONTADOR DE OUTRA CARTEIRA*/
                if (cod_contador === undefined) {
                        if (contador[2] == 0){
                            $("#esperaModal").modal('hide');
                            $("#edtNomeContador").val(contador[0]);
                            $("#edtCodigoContador").val(contador[1]);
                            $("#edtCodigoContadorRenovacao").val(contador[1]);
                            $("#baixaValidacao").css('visibility','visible');
                            $("#baixaValidacao").css('display','block');

                            $("#gerarRenovacao").css('visibility','visible');
                            $("#gerarRenovacao").css('display','block');
                            montar_select_produtos($('#edtTipoCliente').val(), contador[3], $('#edtProdutoCertificado').val());
                        }else{

                            $("#esperaModal").modal('hide');
                            $("#edtNomeContador").html("");
                            $("#edtCodigoContador").val("");
                            $("#edtCodigoContadorRenovacao").val("");
                            //alert(acentuarMsn('Nenhum contador encontrado com o Codigo de Desconto Informado'));
                        }
                } else { /*SE NAO SIMPLESMENTE E UMA BUSCA DE CONTADOR*/
                    $("#esperaModal").modal('hide');
                    montar_select_produtos($('#edtTipoCliente').val(), contador[3], $('#edtProdutoCertificado').val());
                }
            }
        }
    });
}


/*METODOS VOLTAROS PARA A TELA DA RENOVACAO INTERNA*/

function limparCadastro(){
    $('#divPrimeiraEtapa').css('visibility', 'hidden');
    $('#divPrimeiraEtapa').css('display', 'none');
    $('#divEdtCpf').css({
        visibility:"hidden",
        display:"none"
    });
    $('#divEdtCnpj').css({
        visibility:"hidden",
        display:"none"
    });
    $('#divFormCliente').css({
        visibility:"hidden",
        display:"none"
    });
    $('#divPessoaJuridica').css({
        visibility:"hidden",
        display:"none"
    });

    $('#div_outros_contadores').css({
        visibility:"hidden",
        display:"none"
    });

    $('#btnAvancar').css({
        visibility:"hidden",
        display:"none"
    });

    $('#btnFinalizar').css({
        visibility:"hidden",
        display:"none"
    });

    $('#btnVoltar').css({
        visibility:"hidden",
        display:"none"
    });
    $('#divSegundaEtapa').css('visibility', 'hidden');
    $('#divSegundaEtapa').css('display', 'none');
    $('#btnVoltar').css('visibility', 'hidden');
    $('#btnVoltar').css('display', 'none');
    $('#btnAvancar').css('visibility', 'visible');
    $('#btnAvancar').css('display', 'block');
    $('#btnFinalizar').css('visibility', 'hidden');
    $('#btnFinalizar').css('display', 'none');

    var pessoa_tipo = $('input[name="tipoPessoa"]:checked').val();
    $('#codigo_cliente_'+pessoa_tipo).html('');

    /*APAGA O TIPO DE PESSOA NAO SELECIONADO, SO HABILITA QUANDO RESETAR FORMULARIO*/
    $('input[name="tipoPessoa"]').each(function() {
        $('#'+this.value).css('visibility', 'visible');
        $('#'+this.value).css('display', 'block');
        this.checked=false;
    });

    /*APAGA TODOS OS INPUTS DA PRIMEIRA ETAPA*/
    $('#divPrimeiraEtapa input[class="form-control"]').each(function() {
        if (this.id!= "" && this.value != "") {
            this.value='';
        }
    });

    /*APAGA OS DADOS DO USUARIO*/
    localStorage.removeItem('variaveis para serem apagadas');
}

function voltarVendaInterna() {
    $('#divPrimeiraEtapa').css('visibility', 'visible');
    $('#divPrimeiraEtapa').css('display', 'block');
    $('#btnVoltar').css('visibility', 'hidden');
    $('#btnVoltar').css('display', 'none');
    $('#btnAvancar').css('visibility', 'visible');
    $('#btnAvancar').css('display', 'block');
    $('#btnFinalizar').css('visibility', 'hidden');
    $('#btnFinalizar').css('display', 'none');
    $('#divSegundaEtapa').css('visibility', 'hidden');
    $('#divSegundaEtapa').css('display', 'none');
}
function avancarVendaInterna() {
    /*CARREGA O SELECT DE CONTADORES, SE HOUVER CONTADOR NO CADASTRO DO CERTIFICADO SELECIONE*/
    if ($("#edtCodigoContadorCadastro").val() != 0)
        montar_select_contadores($("#edtCodigoContadorCadastro").val());
    else
        montar_select_contadores();

    var tipo_cliente = '';
    if ($("input[name='tipoPessoa']:checked").val()=='pf')
        tipo_cliente='F';
    else
        tipo_cliente='J';

    /*SE AINDA NAO HOUVER CONTADOR SELECIONADO, CARREGUE O SELECT DE PRODUTOS COM OS PRODUTOS SEM DESCONTO*/
    if ( ($('#edtSelectContador').val()!='') && ($('#edtSelectContador').val()!='outra') )
        montar_select_produtos(tipo_cliente, 0);

    $('#divPrimeiraEtapa').css('visibility', 'hidden');
    $('#divPrimeiraEtapa').css('display', 'none');
    $('#btnAvancar').css('visibility', 'hidden');
    $('#btnAvancar').css('display', 'none');
    $('#btnVoltar').css('visibility', 'visible');
    $('#btnVoltar').css('display', 'block');
    $('#btnFinalizar').css('visibility', 'visible');
    $('#btnFinalizar').css('display', 'inline');
    $('#divSegundaEtapa').css('visibility', 'visible');
    $('#divSegundaEtapa').css('display', 'inline');

    if (typeof(Storage) !== "undefined") {
        sessionStorage.ssCpfVendaInternaRepresentante = $("#edtCpfVendaInterna").val();
        sessionStorage.ssCnpjVendaInternaRepresentante = $("#edtCnpjVendaInterna").val();
        sessionStorage.ssDataNascimentoRepresentante = $("#edtDataNascimento").val();
        sessionStorage.ssNomeRepresentante = $("#edtNome").val();
        sessionStorage.ssCepRepresentante = $("#edtCep").val();
        sessionStorage.ssBairroRepresentante = $("#edtBairroVendaInterna").val();
        sessionStorage.ssCidadeRepresentante = $("#edtCidadeVendaInterna").val();
        sessionStorage.ssEnderecoRepresentante = $("#edtEnderecoVendaInterna").val();
        sessionStorage.ssNumeroRepresentante = $("#edtNumeroVendaInterna").val();
        sessionStorage.ssComplementoRepresentante = $("#edtComplementoVendaInterna").val();
        sessionStorage.ssUfRepresentante = $("#edtUfVendaInterna").val();
        sessionStorage.ssFoneRepresentante = $("#edtFone1").val();
        sessionStorage.ssFone2Representante = $("#edtFone2").val();
        sessionStorage.ssCelularRepresentante = $("#edtCelular").val();
        sessionStorage.ssEmailRepresentante = $("#edtEmail").val();
        /*PEGA O CAMPO HIDDEN QUE GUARDARA O CODIGO DO CONTADOR ENCONTRADO OU NAO NA CONSULTA DE CNPJ/CPF*/
        sessionStorage.ssContadorRepresentante = $("#edtCodigoContadorCadastro").val();

    } else {
        alert('O seu navegados nao possui suporte para Gravacao de dados. Por favor entre em contato com o departamento de suporte para solucionar o problema.');
    }

}

function montar_select_produtos(tipo_cliente,tem_desconto, produto_selecionado, div_select, edit_select) {
    $("#esperaModal").modal('show');
    var divSelectContadores = '';
    var dadosAjax = '';
    var produto_id = 0;
    var contador_id = 0
    var edtSelProds = '';

    if (edit_select !== undefined)
        edtSelProds = edit_select;
    else
        edtSelProds = 'edtSelectProdutos';

    if (div_select !== undefined)
        divSelectContadores = div_select;
    else
        divSelectContadores = 'div_select_produtos';


    if (produto_selecionado !== undefined)
        produto_id = produto_selecionado;

    if (tipo_cliente === undefined)
        tipo_cliente = 0;

    if (tem_desconto == 1)
        alert('Lembrete: O contador deste cliente Ã© contador amigo e optou por dar desconto pra seus clientes.');
    /*PEGA O CONTADOR CHECA SE ELE TEM DESCONTO E SO MOSTRA OS PRODUTOS PRO CLIENTE DELE COM DESCONTO*/
    dadosAjax ={
        'contador_id':tem_desconto,
        'tipo_cliente':tipo_cliente,
        'produto_certificado': produto_selecionado,
        'tem_desconto':tem_desconto
    };

    var x = $.ajax({
        url: 'ajax/php/carregar_select_produtos.php',
        data: dadosAjax,
        type: 'POST',
        cache: false,
        error: function(){
            alert('Erro: Ao carregar os produtos!!');
        },
        success: function(result){
            $("#esperaModal").modal('hide');
            var resultado = result.split(';');

            if(resultado[0] == 0) {
                var $select = $('<select/>', {
                    'id' : edtSelProds,
                    'class':"selectpicker",
                    'data-live-search':"true",
                });

                produtos = JSON.parse(resultado[1]);
                /*CRIACAO EM TEMPO DE EXECUSSAO DO SELECT DE PRODUTOS*/
                $select.append('<option data-tokens="Selecione o produto caso queira trocar" value="">Selecione o produto caso queira trocar</option>');
                /*CASO O PRODUTO TENHA SIDO DE CONTADOR AMIGO OU NAO ESTEJA NA LISTA, SIMPLESMETE ADICIONA-LO*/

                achou_produto = false;
                for (i = 0; i < produtos.length; i++) {
                    if (produtos[i].id == produto_id) {
                        $select.append('<option data-tokens="'+produtos[i].nome+'" value="' + produtos[i].id + '" selected="selected">' + produtos[i].id+ ' | ' + produtos[i].nome + ' = '+ produtos[i].preco + '</option>');
                        achou_produto = true;
                    }
                    else
                        $select.append('<option data-tokens="'+produtos[i].nome+'" value="' + produtos[i].id + '">' + produtos[i].id+ ' | ' + produtos[i].nome + ' = '+ produtos[i].preco + '</option>');
                }
                if (!achou_produto)
                    if (resultado[2]) {
                        $spanProdutoSelecionado = $('<span/>');
                        $spanProdutoSelecionado.html(resultado[2]+ ' | ' + resultado[3] + ' = '+ resultado[4]);
                        $select.insertAfter($spanProdutoSelecionado);
                        //$select.append('<option data-tokens="'+resultado[3]+'" value="' + resultado[2] + '" selected="selected">' + resultado[2]+ ' | ' + resultado[3] + ' = '+ resultado[4] + '</option>');
                    }

                $('#'+divSelectContadores).empty();

                $select.appendTo('#'+divSelectContadores).selectpicker('refresh');
            }else {
                $("#esperaModal").modal('hide');
                alert("Opa, Algo Deu Errado, entre em contato com sistema@gruposerama.com.br");
                erroEmail(result,acentuarMsn("Erro na funcao de carregar os contadores. Tela: prospect.js"));
                console.log(result);
            }
        }
    });
};

function mudancaSelectContadores(selectContadores){
    if (selectContadores.value == 'outra') {
        $('#div_outros_contadores').css({'visibility':'visible', 'display':'block'});
    } else
        $('#div_outros_contadores').css({'visibility':'hidden', 'display':'none'});

    /*CRIEI UMA CONDICAO PRA QUANDO CHAMAR A FUNCAO PROCURAR CONTADOR ATUALIZAR O SELECT DE PRODUTOS*/
    /*QUANDO SELECIONAR UM CONTADOR QUE DE DESCONTO ATUALIZAR A LISTA DE PRODUTOS COM DESCONNTO*/
    if ((selectContadores.value) != '' && (selectContadores.value != 'outra'))
        procurar_contador(selectContadores.value);
}

function montar_select_contadores(contador_selecionado, funcaoOnChange) {
    $("#esperaModal").modal('show');
    var contador_id = 0;
    if (contador_selecionado !== undefined)
        contador_id = contador_selecionado;

    funcaoSelect = 'mudancaSelectContadores(this)';
    if (funcaoOnChange !== undefined)
        funcaoSelect = funcaoOnChange;

    //para consultar mais opcoes possiveis numa chamada ajax
    //http://api.jquery.com/jQuery.ajax/
    var x = $.ajax({

        //url da pagina
        url: 'ajax/php/carregar_select_contadores.php',
        //tipo: POST ou GET
        type: 'POST',
        //cache
        cache: false,
        //retorna o resultado da pagina para onde enviamos os dados
        //se ocorrer um erro na chamada ajax, retorna este alerta
        //possiveis erros: pagina nao existe, erro de codigo na pagina, falha de comunicacao/internet, etc etc etc
        error: function(){
            alert('Erro: Ao carregar os contadores!!');
        },
        success: function(result){
            $("#esperaModal").modal('hide');
            var resultado = result.split(';');

            if(resultado[0] == 0) {
                var $select = $('<select/>', {
                    'id' : 'edtSelectContador',
                    'class':"selectpicker",
                    'data-live-search':"true",
                    'onchange':funcaoSelect
                });

                contadores = JSON.parse(resultado[1]);
                /*CRIACAO EM TEMPO DE EXECUSSAO DO SELECT DE CONTADORES*/
                $select.append('<option data-tokens="Selecione o contador ou escolha outro" value="">Selecione o contador ou Digite o Codigo</option>');

                for (i = 0; i < contadores.length; i++) {
                    if (contador_id==contadores[i].id)
                        $select.append('<option data-tokens="'+contadores[i].nome+'" value="' + contadores[i].id + '" selected="selected">' + contadores[i].id+ ' | ' + contadores[i].nome + '</option>');
                    else
                        $select.append('<option data-tokens="'+contadores[i].nome+'" value="' + contadores[i].id + '">' + contadores[i].id+ ' | ' + contadores[i].nome + '</option>');
                }
                $select.append('<option data-tokens="Contador de outra cateira" value="outra">Contador de outra cateira</option>');

                $('#div_select_contadores').empty();
                $select.appendTo('#div_select_contadores').selectpicker('refresh');

            }else {
                $("#esperaModal").modal('hide');
                alert("Opa, Algo Deu Errado, entre em contato com sistema@gruposerama.com.br");
                erroEmail(result,acentuarMsn("Erro na funcao de carregar os contadores. Tela: prospect.js"));
                console.log(result);
            }
        }
    });
};

function consultaClienteCertificado(pessoa_tipo, cliente_id) {
    $("#esperaModal").modal('show');
    var checado = '';
    var mensagemErro ='';

    $('#btnAvancar').css({
        visibility:"visible",
        display:"block"
    });

    /*PASSA O PARAMETRO PESSO TIPO PARA A VARIAVEL CHECADO*/
    checado = pessoa_tipo;

    var dadosajax = {
        'cliente_id': cliente_id,
        'pessoa_tipo': pessoa_tipo,
        'funcao': 'consultarClienteCertificado'
    }

    if (mensagemErro==''){
        $.ajax ({
            url : pageUrl,
            data : dadosajax,
            type : 'POST',
            cache : false,
            error : function (){
                alert (acentuarMsn('Error TC.JS/591 - Erro de consulta do Cliente do Certificado,' + msnPadrao + '.'));
                $("#esperaModal").modal('hide');
            },
            success : function(result) {
                $("#esperaModal").modal('hide');
                console.log(result);
                var dados = result.split(";");
                if (checado == 'F') {
                    /*SE ENCONTROU UM CLIENTE COM ESTE CPF*/
                    $('#edtNomeRepresentanteVendaInterna').focus();
                    if (dados[14] == 0) {

                        $('#divFormCliente').css('visibility', 'visible');
                        $('#divFormCliente').css('display', 'inline');
                        /*SE FOR UMA PESSOA FISICA, ATRIBUI O NOME AO CAMPO NOME, SE FOR PJ ATRIBUI O NOME A RAZAO SOCIAL*/

                        $('#edtNomeRepresentanteVendaInterna').val(dados[1]);
                        $('#edtEnderecoRepresentanteVendaInterna').val(dados[2]);
                        $('#edtComplementoRepresentanteVendaInterna').val(dados[3]);
                        $('#edtNumeroRepresentanteVendaInterna').val(dados[4]);
                        $('#edtUfRepresentanteVendaInterna').val(dados[5]);
                        $('#edtBairroRepresentanteVendaInterna').val(dados[6]);
                        $('#edtCidadeRepresentanteVendaInterna').val(dados[7]);
                        $('#edtFoneRepresentanteVendaInterna').val(dados[8]);
                        $('#edtFone2RepresentanteVendaInterna').val(dados[9]);
                        $('#edtCelularRepresentanteVendaInterna').val(dados[10]);
                        $('#edtEmailRepresentanteVendaInterna').val(dados[11]);
                        $('#edtCepRepresentanteVendaInterna').val(dados[12]);
                        $('#edtCodigoContadorCadastro').val(dados[13]);

                    }
                    /*SE NAO ENCONTROU O CLIENTE ABRE OS CAMPOS PARA INICIAR O CADASTRO DO ZERO*/
                } else if (checado == 'J') { /*FIM DO PF*/
                    console.log(dados[0].trim());
                    $('#edtRazaoSocial').focus();
                    if (dados[0].trim() == 'ok') {
                        $('#divPessoaJuridica').css('visibility', 'visible');
                        $('#divPessoaJuridica').css('display', 'inline');
                        $('#divFormCliente').css('visibility', 'visible');
                        $('#divFormCliente').css('display', 'inline');

                        console.log('entrou aqui2');
                        var arrResponsavel = JSON.parse(dados[1]);
                        console.log('entrou aqui');
                        $('#edtNomeRepresentanteVendaInterna').val(arrResponsavel.nomeResponsavel);
                        $('#codigoRepresentanteVendaInterna').html("Cod.Rep: " + arrResponsavel.codigoResponsavel);
                        if (arrResponsavel.cpfResponsavel)
                            $('#edtCpfVendaInternaPj').val(arrResponsavel.cpfResponsavel);
                        if (arrResponsavel.nascimentoReponsavel)
                            $('#edtDataNascimentoPj').val(arrResponsavel.nascimentoReponsavel);
                        $('#edtEnderecoRepresentanteVendaInterna').val(arrResponsavel.enderecoResponsavel);
                        $('#edtComplementoRepresentanteVendaInterna').val(arrResponsavel.complementoResponsavel);
                        $('#edtNumeroRepresentanteVendaInterna').val(arrResponsavel.numeroReponsavel);
                        $('#edtUfRepresentanteVendaInterna').val(arrResponsavel.ufResponsavel);
                        $('#edtBairroRepresentanteVendaInterna').val(arrResponsavel.bairroResponsavel);
                        $('#edtCidadeRepresentanteVendaInterna').val(arrResponsavel.cidadeResponsavel);
                        $('#edtFoneRepresentanteVendaInterna').val(arrResponsavel.foneResponsavel);
                        $('#edtFone2RepresentanteVendaInterna').val(arrResponsavel.fone2Responsavel);
                        $('#edtCelularRepresentanteVendaInterna').val(arrResponsavel.celularReponsavel);
                        $('#edtEmailRepresentanteVendaInterna').val(arrResponsavel.emailResponsavel);
                        $('#edtCepRepresentanteVendaInterna').val(arrResponsavel.cepResponsavel);
                        $('#edtCodigoContadorCadastro').val(arrResponsavel.contadorReponsavel);


                        var arrCliente = JSON.parse(dados[2]);
                        $('#codigo_cliente_pj').html(arrCliente.codigoEmpresa);
                        $('#div_codigo_cliente_pj').css({'visibility': 'visible', "display": "block"});
                        /*SE FOR UMA PESSOA FISICA, ATRIBUI O NOME AO CAMPO NOME, SE FOR PJ ATRIBUI O NOME A RAZAO SOCIAL*/
                        $('#edtRazaoSocial').val(arrCliente.razaoSocial);
                        $('#edtNomeFantasia').val(arrCliente.nomeFantasia);
                        $('#edtEnderecoVendaInternaPj').val(arrCliente.enderecoEmpresa);
                        $('#edtComplementoVendaInterna').val(arrCliente.complementoEmpresa);
                        $('#edtNumeroVendaInterna').val(arrCliente.numeroEmpresa);
                        $('#edtUfVendaInterna').val(arrCliente.ufEmpresa);
                        $('#edtBairroPjVendaInterna').val(arrCliente.bairroEmpresa);
                        $('#edtCidadePjVendaInterna').val(arrCliente.cidadeEmpresa);
                        $('#edtFonePjVendaInterna').val(arrCliente.foneEmpresa);
                        $('#edtFone2PjVendaInterna').val(arrCliente.fone2Empresa);
                        $('#edtCelularPjVendaInterna').val(arrCliente.celularEmpresa);
                        $('#edtEmailPjVendaInterna').val(arrCliente.emailEmpresa);
                        $('#edtCepPjVendaInterna').val(arrCliente.cepEmpresa);

                    }
                    else {
                        $("#esperaModal").modal('hide');
                        alert("Erro na consulta do cliente");
                        console.log(result);
                        //erroEmail(result, "Erro no javascript de consultarReceira, dados nao encontrados ou cliente nao registrado na base de dados");
                    }
                }
            }
        });
    }
};