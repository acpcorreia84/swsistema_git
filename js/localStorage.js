/**
 * Created by Lincoln on 29/07/2016.
 */
function bancoLocal_add(acao){
    var prospectId = $("#prospectId").val();
    var dados = null;

    if(acao == "inserir_prospect"){
        var edtCpf = $("#edtCpf").val();
        var edtNome = $("#edtNome").val();
        var cpfCnpjFormatado;

        if(edtCpf.length == 11){
            cpfCnpjFormatado = edtCpf.substr(0,3)+"."+edtCpf.substr(3,3)+"."+edtCpf.substr(6,3)+"-"+edtCpf.substr(9);
        }else if(edtCpf.length == 14){
            cpfCnpjFormatado = edtCpf.substr(0,2)+"."+edtCpf.substr(2,3)+"."+edtCpf.substr(5,3)+"/"+edtCpf.substr(8,4)+"-"+edtCpf.substr(12);
        }else{
            cpfCnpjFormatado = "";
        }

        dados = "Inseriu um novo prospect! NOME: "+edtNome+" CPF: "+cpfCnpjFormatado;
    }

    if(acao == "fechar_negocio"){
        dados = "Fechou Negocio";
    }

    if(acao == "renovacao"){
        dados = "Gerou Pedido de Renovacao";
    }

    if(acao == "retencao"){
        dados = "Reteve o Cliente";
    }

    if(acao == "reagendamento"){
        dados = "Reagendou o Certificado";
    }
    if(acao == "informou_pagamento"){
        dados = "Informou Pagamento do Certificado";
    }

    if(acao == 'observacao_contador'){
        dados = "Inseriu Observação no Contador";
    }

    var array =  dados;
    var arrayString = JSON.stringify(array);
    var chIdProspect = localStorage.getItem(prospectId);
    if(chIdProspect == null){
        localStorage.setItem(prospectId, arrayString);
    }else{
        var acao = chIdProspect+";"+arrayString;
        localStorage.setItem(prospectId, acao);
    }

    document.getElementById("edtEspera").style.display="none";
    document.getElementById("edtFinalizar").disabled=false;

}

function bancoLocal_read(){
    document.getElementById("edtObservacaoChamada").value="";

    var prospectId = $("#prospectId").val();
    var dados = null;

    var dados = localStorage.getItem(prospectId);

    var dadosLista = dados.split(";");
    for(var x = 0; x<dadosLista.length; x++ ){
        var valorObservacao = $("#edtObservacaoChamada").val();

        if(valorObservacao != ""){
            document.getElementById("edtObservacaoChamada").value =valorObservacao+'\n'+ x+'-'+dadosLista[x];
        }else{
            document.getElementById("edtObservacaoChamada").value ='\n'+ x+'-'+dadosLista[x];
        }

        console.log(dadosLista[x]);
    }

}

function bancoLocal_delete(){
    localStorage.clear();
}