var msnPadrao = 'entre em contato com o administrador do sistema';

var pageUrl = 'funcoes/funcoesMeuFaturamento.php';

function carregarFaturamento(usuario_id,funcao){
    var dadosajax = {
        'usuario_id' : usuario_id,
        'funcao' : funcao
    };
    console.log(dadosajax);
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alert ('Error TMF.JS/17 - Erro na ação de carregar a pagina,' + msnPadrao + '.');
            erroEmail('Error TMF.JS/17 - Erro na ação de carregar a pagina tel')
        },
        success : function(result){
            var certificado = result.split(';');
            if (certificado[9] == 0) {
                document.getElementById('tabela').innerHTML=certificado[1];
                document.getElementById('qrSpanQtdCert').innerHTML=certificado[2];
                document.getElementById('qrSpanTotal').innerHTML=certificado[3];
                document.getElementById('qrSpanProdutos').innerHTML=certificado[4];
                document.getElementById('qrSpanEnota').innerHTML=certificado[5];
                document.getElementById('qrSpanLeitora').innerHTML=certificado[6];
                document.getElementById('qrSpanOutros').innerHTML=certificado[7];
            }else{
                erroEmail(result,'teste faturamento');
                alert('Erro no Carregamento de dados,' + msnPadrao + '.');
            }
        }
    });
}

function imprimir() {
   window.print();
}

function detalhar(certificado_id,funcao){
    var dadosajax = {
        'certificado_id' : certificado_id,
        'funcao' : funcao
    };
    console.log(dadosajax);
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alert ('Error TC.JS/56 - Erro na ação visualizar protocolo,' + msnPadrao + '.');
        },
        success : function(result){
            if (result) {
                console.log(result);
                var certificado = result.split(';');
                console.log(certificado);
                document.getElementById('dcSpanIdCliente').innerHTML=certificado[1];
                document.getElementById('dcSpanNomeCliente').innerHTML=certificado[14];
                document.getElementById('dcSpanCodCertificado').innerHTML=certificado[0];
                document.getElementById('dcSpanPrecoProduto').innerHTML=certificado[2];
                document.getElementById('dcSpanDesconto').innerHTML=certificado[3];
                document.getElementById('dcSpanValorTotal').innerHTML=certificado[7];
                document.getElementById('dcSpanVendedor').innerHTML=certificado[4];
                document.getElementById('dcSpanNomeProduto').innerHTML=certificado[5];
                document.getElementById('dcSpanFormaPagto').innerHTML=certificado[6];
                document.getElementById('dcSpanPagamento').innerHTML=certificado[7];
                document.getElementById('dcSpanNumBol').innerHTML=certificado[8];
                document.getElementById('dcSpanProtocolo').innerHTML=certificado[9];
                document.getElementById('dcSpanLocal').innerHTML=certificado[10];
                document.getElementById('dcSpanAgendamento').innerHTML=certificado[11];
                document.getElementById('dcSpanDtPagamento').innerHTML=certificado[12];
                document.getElementById('dcSpanSituacao').innerHTML=certificado[13];
                document.getElementById('dcDivModaisPermissao').innerHTML=certificado[15];

            }else{
                alert('Error TC.JS/82 - Erro na visualização de protocolo,' + msnPadrao + '.');
                console.log(result);
            }
        }
    });
}

function gerarProtocolo(funcao,usuario_id) {

    $("#esperaGerarProtocolo").modal('show');

    var dadosajax = {
        'usuario_id' : usuario_id,
        'funcao' : funcao,
        'certificado_id' : $('#idCertificado').val()
    };
    console.log (dadosajax);
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,

        error : function (){
            alert ('Error TM.JS/105 - Erro na ação de Gerar Protocolo,' + msnPadrao + '.');
        },
        success : function(result){
            var certificado = result.split(';');
            if ( (certificado[1] == 0)) {
                document.getElementById('gpDivGeral').innerHTML = '<div class="modal-header bg-success"><div class ="col-lg-12"><h4><i class="fa fa-lg fa-check"></i> Protocolo Gerado</h4></div></div><div class="modal-body "><div class="row"><div class="col-lg-12"><p>N&uacute;mero do protocolo: <span id="gpSpanProtocolo">'+certificado[0]+'</span></p></div></div><!--DIV CLASS row--></div><div class="modal-footer"></div>';
                carregarModalDetalharCertificado(dadosajax['certificado_id']);
                $("#esperaGerarProtocolo").modal('hide');
            }else if (certificado[1]==1){
                document.getElementById('gpDivGeral').innerHTML ='<div class="modal-header" style="background-color: #cc0000"><div class ="col-lg-12"><h4 style="color: white"><i class="fa fa-lg fa-check"></i> Erro ao Gerar Protocolo</h4></div></div><div class="modal-body "><div class="row"><div class="col-lg-12"><p>Ocorreu um erro ao Gerar protocolo. ' + msnPadrao + '</p></div></div><!--DIV CLASS row--></div><div class="modal-footer"></div>';
                $("#esperaGerarProtocolo").modal('hide');
            }
            else{
                erroEmail(result, "Erro no javascript de gerar Protocolo");
                alert(result);
                $("#esperaGerarProtocolo").modal('hide');
                console.log(result);
            }
        }
    });
};
