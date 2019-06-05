var msnPadrao = 'entre em contato com o administrador do sistema (3321-5061)';
var pageUrl = 'funcoes/funcoesProfile.php';

function liberaBtn(src1 , src2){
    if(src1.value != "" && src1.value != null){
        $("#"+src2).css('visibility','visible');
        $("#"+src2).css('display','inline');
    }else{
        $("#"+src2).css('visibility','hidden');
        $("#"+src2).css('display','none');
    }
}

function editarUsuario(usuario_id) {
    // var pageurl = urlPadrao+'inserirObservacao.php';
    var dadosajax = {
        'usuario_id' : usuario_id,
        'nome' : $('#edtNome').val(),
        'cpf' : $('#edtCpf').val(),
        'cep' : $('#edtCep').val(),
        'endereco' : $('#edtEndereco').val(),
        'complemento' : $('#edtComplemento').val(),
        'numero' : $('#edtNumero').val(),
        'bairro' : $('#edtBairro').val(),
        'cidade' : $('#edtCidade').val(),
        'uf' : $('#edtUf').val(),
        'fone' : $('#edtFone').val(),
        'fone2' : $('#edtFone2').val(),
        'nascimento' : $('#edtDataNascimento').val()
    }
    console.log(dadosajax);
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,

        error : function (){
            alert (acentuarMsn('Error TP.JS/38 - Erro na ação de alterar perfil,' + msnPadrao + '.'));
        },
        success : function(result){
            if (result == 0) {
                alert('Perfil alterado com sucesso!');
            }else{
                erroEmail(result,acentuarMsn('Erro na função javascritpt na alteração de perfil'));
                alert('Error TP.JS/43 - Erro ao editar perfil,' + msnPadrao + '.');
                console.log(result);
            }
        }
    });
}