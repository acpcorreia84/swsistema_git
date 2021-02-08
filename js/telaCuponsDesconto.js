var msnPadrao = 'entre em contato com o administrador do sistema';

var pageUrl = 'funcoes/funcoesCuponsDesconto.php';

function verificaTipoCliente(campo){
    var tipoCliente = campo.value;
    $("#divDadosCupom").css('visibility','visible');
    $('#divDadosCupom').css('display','block');
    if(tipoCliente == 'pf'){
        $("#divEdtCpf").css('visibility','visible');
        $('#divEdtCpf').css('display','inline-block');
        $("#divEdtCnpj").css('visibility','hidden');
        $('#divEdtCnpj').css('display','none');
        $('#edtCpf').focus();
    }else if(tipoCliente == 'pj'){
        $("#divEdtCpf").css('visibility','hidden');
        $('#divEdtCpf').css('display','none');
        $("#divEdtCnpj").css('visibility','visible');
        $('#divEdtCnpj').css('display','inline-block');
        $('#edtCnpj').focus();
    }
};


function gerar_cupom_desconto(funcao,usuario_id){
    var dadosajax = {
        'funcao' : funcao,
        'cpf':$('#icEdtCpf').val(),
        'cnpj':$('#icEdtCnpj').val(),
        'codigo_desconto' : $('#icEdtCodigoDesconto').val(),
        'vencimento' :  $('#icEdtVencimento').val(),
        'email_cliente' : $('#icEdtEmailCliente').val(),
        'motivo': $('#icEdtMotivo').val(),
        'produto_fisico_id' : $('#icEdtProdutoFisico').val(),
        'produto_juridico_id' : $('#icEdtProdutoJuridico').val(),
        'valor_desconto' : $('#icEdtValorDesconto').val(),
        'usuario_id' : usuario_id
    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alert ('Error TCD.JS/23 - Erro na acao de gerar cupom de desconto,' + msnPadrao + '.');
        },
        success : function(result){
            console.log(result);
            var cupom_desconto = result.split(';');
            if (cupom_desconto[1] == 0) {
                var contador = result.split(';');
                if (cupom_desconto[0] == 1){
                    alert(acentuarMsn('Cupom gerado, por favor aguarde autorização'));
                }else{
                    alert(acentuarMsn('Cupom de desconto Gerado e aprovado!'));
                }
                ir_para('telaCuponsDesconto.php');
            }else{
                erroEmail(result,acentuarMsn('Erro na função de gerar cupom de desconto'));
                alert('Error TCD.JS/43 - Erro ao gerar cupom de desconto,' + msnPadrao + '.');
                console.log(result);

            }
        }
    });
}
function gerar_codigo_cupom_desconto(funcao,nome){
    $("#esperaModal").modal('show');
    var dadosajax = {
        'funcao' : funcao,
        'nome': nome
    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alert ('Error TCD.JS/87 - Erro na acao de gerar codigo do contador,' + msnPadrao + '.');
        },
        success : function(result){
            $("#esperaModal").modal('hide');
            if (result) {
                document.getElementById('icEdtCodigoDesconto').value=result;

            }else{
                erroEmail(result,"Erro no retorno da funcao gerar codigo de desconto");
                alert('Error TCD.JS/95 - Erro ao gerar codigo de desconto,' + msnPadrao + '.');
                console.log(result);
            }
        }
    });
}
function visualizar_cupom_desconto(cupom_desconto_id,funcao){
    var dadosajax = {
        'cupom_desconto_id' : cupom_desconto_id,
        'funcao' : funcao
    };
    console.log(pageUrl);
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alert ('Error TMF.JS/71 - Erro na ação de visualizar cupom de desconto,' + msnPadrao + '.');
        },
        success : function(result){

            if (result) {
                var cupom_desconto = result.split(';');
                document.getElementById('vcSpanCodigoDesconto').innerHTML = cupom_desconto[1];
                document.getElementById('vcSpanVendedor').innerHTML=cupom_desconto[2];
                document.getElementById('vcSpanValorDesconto').innerHTML=cupom_desconto[3];
                document.getElementById('vcSpanProduto').innerHTML=cupom_desconto[4];
                document.getElementById('vcSpanCpfCnpj').innerHTML=cupom_desconto[5];
                document.getElementById('vcSpanEmail').innerHTML=cupom_desconto[6];
                document.getElementById('vcSpanMotivo').innerHTML=cupom_desconto[7];
                document.getElementById('vcSpanVencimento').innerHTML=cupom_desconto[8];
                document.getElementById('vcSpanAutorizacao').innerHTML=acentuarMsn(cupom_desconto[10]);
                document.getElementById('vcSpanStatus').innerHTML=acentuarMsn(cupom_desconto[11]);

            }else{
                alert('Error TC.JS/86 - Erro ao visualizar cupom de desconto,' + msnPadrao + '.');
            }
        }
    });
}

function carrega_autorizacao(cupom_desconto_id,funcao) {
    $("#esperaModal").modal('show');
    var dadosajax = {
        'cupom_desconto_id' : cupom_desconto_id,
        'funcao' : funcao
    };
    console.log(pageUrl);
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alert ('Error TMF.JS/71 - Erro na ação de visualizar cupom de desconto,' + msnPadrao + '.');
        },
        success : function(result){
            $("#esperaModal").modal('hide');
            console.log(result);
            if (result) {
                var cupom_desconto = result.split(';');
                document.getElementById('idCupomDesconto').value = cupom_desconto[0];
                document.getElementById('acSpanCodigoDesconto').innerHTML = cupom_desconto[1];
                document.getElementById('acSpanVendedor').innerHTML=cupom_desconto[2];
                document.getElementById('acSpanValorDesconto').innerHTML=cupom_desconto[3];
                document.getElementById('acSpanProduto').innerHTML=cupom_desconto[4];
                document.getElementById('acSpanMotivo').innerHTML=cupom_desconto[7];

            }else{
                alert('Error TC.JS/86 - Erro ao visualizar cupom de desconto,' + msnPadrao + '.');
            }
        }
    });
}
function autorizar_cupom_desconto(funcao,usuario_id){

    var dadosajax = {
        'cupom_desconto_id' :  $('#idCupomDesconto').val(),
        'funcao' : funcao,
        'motivo' :  $('#edtMotivoAutorizacao').val(),
        'usuario_id' : usuario_id
    }
    console.log(dadosajax);
    $.ajax({
        url: pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function(){
            alert('Error TC.JS/433 - Erro na ao de autorizar cupom de desconto,' + msnPadrao + '.');
        },
        success : function(result){
            console.log(result);
            if (result==0){
                alert('Certificado Autorizado com Sucesso!');
                ir_para('telaCuponsDesconto.php');
            }else if (result==1){
                alert('Cupom Vencido! Não foi possível autorizar cupom')
                ir_para('telaCuponsDesconto.php');
            }
            else{
                erroEmail(result, "Erro no javascript de autorizar ce");
                ir_para('telaCuponsDesconto.php');
                alert('Error TC.JS/1601 - Erro ao autorizar certificado,' + msnPadrao + '.');
                console.log(result);
            }
        }
    });

}