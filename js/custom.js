var msnPadrao = 'entre em contato com o administrador do sistema (3321-5081)';

function reload(tela) {
    window.location.href=tela;
};
function acentuarMsn(mensagem){
    mensagem = mensagem.replace('á', '\u00e1');
    mensagem = mensagem.replace('à', '\u00e0');
    mensagem = mensagem.replace('â', '\u00e2');
    mensagem = mensagem.replace('ã', '\u00e3');
    mensagem = mensagem.replace('ä', '\u00e4');
    mensagem = mensagem.replace('Á', '\u00c1');
    mensagem = mensagem.replace('À', '\u00c0');
    mensagem = mensagem.replace('Â', '\u00c2');
    mensagem = mensagem.replace('Ã', '\u00c3');
    mensagem = mensagem.replace('Ä', '\u00c4');
    mensagem = mensagem.replace('é', '\u00e9');
    mensagem = mensagem.replace('è', '\u00e8');
    mensagem = mensagem.replace('ê', '\u00ea');
    mensagem = mensagem.replace('ê', '\u00ea');
    mensagem = mensagem.replace('É', '\u00c9');
    mensagem = mensagem.replace('È', '\u00c8');
    mensagem = mensagem.replace('Ê', '\u00ca');
    mensagem = mensagem.replace('Ë', '\u00cb');
    mensagem = mensagem.replace('í', '\u00ed');
    mensagem = mensagem.replace('ì', '\u00ec');
    mensagem = mensagem.replace('î', '\u00ee');
    mensagem = mensagem.replace('ï', '\u00ef');
    mensagem = mensagem.replace('Í', '\u00cd');
    mensagem = mensagem.replace('Ì', '\u00cc');
    mensagem = mensagem.replace('Î', '\u00ce');
    mensagem = mensagem.replace('Ï', '\u00cf');
    mensagem = mensagem.replace('ó', '\u00f3');
    mensagem = mensagem.replace('ò', '\u00f2');
    mensagem = mensagem.replace('ô', '\u00f4');
    mensagem = mensagem.replace('õ', '\u00f5');
    mensagem = mensagem.replace('ö', '\u00f6');
    mensagem = mensagem.replace('Ó', '\u00d3');
    mensagem = mensagem.replace('Ò', '\u00d2');
    mensagem = mensagem.replace('Ô', '\u00d4');
    mensagem = mensagem.replace('Õ', '\u00d5');
    mensagem = mensagem.replace('Ö', '\u00d6');
    mensagem = mensagem.replace('ú', '\u00fa');
    mensagem = mensagem.replace('ù', '\u00f9');
    mensagem = mensagem.replace('û', '\u00fb');
    mensagem = mensagem.replace('ü', '\u00fc');
    mensagem = mensagem.replace('Ú', '\u00da');
    mensagem = mensagem.replace('Ù', '\u00d9');
    mensagem = mensagem.replace('Û', '\u00db');
    mensagem = mensagem.replace('ç', '\u00e7');
    mensagem = mensagem.replace('Ç', '\u00c7');
    mensagem = mensagem.replace('ñ', '\u00f1');
    mensagem = mensagem.replace('Ñ', '\u00d1');
    mensagem = mensagem.replace('&', '\u0026');
    mensagem = mensagem.replace('\'', '\u0027');

    return mensagem;
};
function carrega_perfil(funcao) {
    var dadosajax = {
        'funcao' : funcao
    }

    var pageUrl = 'funcoes/funcoesPerfil.php';

    $.ajax({
        url: pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function(){
            alert(acentuarMsn('A página de funções não foi encontrada!'));
        },
        success : function(result){
            result = result.split(';');
            if (result[0] == 1){
                document.getElementById('tabelaPerfil').innerHTML=result[1];
            }else{
                alert(acentuarMsn('Error TC.JS/368 - Erro ao carregar Perfil,' + msnPadrao + '.\t \b'+result));
                console.log(result);
            }
        }
    });
};
function erroEmail(mensagem,nomeUsuario){
    var dadosajax = {
        'mensagem' : mensagem,
        'nomeUsuario' : nomeUsuario,
        'funcao':'erroEmail'
    }

    var pageUrl = 'inc/uteis.php';

    $.ajax({
        url: pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function(xhr, ajaxOptions, thrownError){
            alert(acentuarMsn('A página de Erro E-mail não foi encontrada!'));
        },
        success : function(result){
            if (result != 0){
                alert(acentuarMsn('Desculpe-me mais não conseguir enviar seu e-mail para o desenvolvedor, por favor entre em contato pelo telefone (91) 3321-5080'));
                console.log(result);
            }
        }
    });
};