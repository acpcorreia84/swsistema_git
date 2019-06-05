var msnPadrao = 'entre em contato com o administrador do sistema (3321-5061)';

var pageUrl = 'funcoes/funcoesPerfil.php';

function salvarFotoPerfil (urlImagem) {
    $('#mensagemLoading').html('<i class="fa fa-lg fa-arrows"></i> Salvando foto no perfil do Usu&aacute;rio');
    $('#modalCarregando').modal('show');

    var dadosajax = {
        'funcao' : "salvar_foto_perfil",
        'urlImagem' : urlImagem
    };
    $.ajax ({
        url : pageUrl,
        data : dadosajax,
        type : 'POST',
        cache : true,
        error : function (){
            alertErro ('Error 501 - Erro ao tentar salvar a foto no perfil do usu&aacute;rio,' + msnPadrao + '.');
            $('#modalCarregando').modal('hide');
        },
        success : function(result){;
            try {
                resultado = JSON.parse(result);

                if (resultado.mensagem == 'Ok') {
                    alertSucesso('Foto do perfil salva com sucesso! A foto ser&aacute; atualizada no seu pr&oacute;ximo login.');
                }
            } catch (e) {
                $('#modalCarregando').modal('hide');
                console.log(result, e);
                alertErro('Error 502 - Erro ao tentar salvar a foto no perfil do usu&aacute;rio,' + msnPadrao + '.');
            }
        }
    });
}