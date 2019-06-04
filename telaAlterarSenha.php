<?
require_once $_SERVER['DOCUMENT_ROOT'] . "/loader_off.php";

if ($_GET['motivoTroca']) {
    $motivo = '';
    if ($_GET['motivoTroca']=='1') {
        $proximaDataExpiracao = strtotime("+3 months");

        $motivo = 'A sua senha expirou em: ' . $_GET['dataExpiracao']. ". Sua pr&oacute;xima senha ir&aacute; expirar em: " . date('d/m/Y', $proximaDataExpiracao);
    } elseif ($_GET['motivoTroca']=='2') {
        $motivo = 'No seu primeiro login voc&ecirc; dever&aacute; trocar a senha padr&atilde;o';
    } elseif ($_GET['motivoTroca']=='3') {
        $motivo = 'Foi definida uma senha padr&atilde;o para que voc&ecirc; possa alter&aacute;-la';
    }
}
if ((isset($_POST)) && ($_POST['acao']=='alterarSenha') ) {
    $usuario = UsuarioPeer::retrieveByPK($_POST['edtUsuarioId']);

    if ($usuario->getSenha()!=$_POST['edtSenhaAntiga']) {
        js_aviso('A senha antiga nao confere');
    } elseif (($_POST['edtNovaSenha'] != $_POST['edtConfirmaSenha'])) {
        js_aviso("As senhas nao conferem");
    } elseif ($usuario->getSenha() == $_POST['edtNovaSenha']) {
        js_aviso("As nova senha deve ser diferente da senha ja cadastrada.");
    } else {
        try {
            $proximaDataExpiracao = strtotime("+3 months");
            $usuario->setDataExpiracaoSenha(date('Y-m-d', $proximaDataExpiracao));
            $usuario->setSenha($_POST['edtNovaSenha']);
            $usuario->save();
            js_aviso("Sua senha foi alterada com sucesso!");
            js_ir("index.php");

        }
        catch (Exception $e) {
            erroEmail($ex->getMessage(), "Erro ao trocar senha");
        }
    }

}


?>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Sistema Serama 3.0">
<meta name="author" content="Yan Lincoln Menezes Galucio">
<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="pragma" content="no-cache" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!-- Search Sleect Bootstrap -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/jquery.validate.js"></script>
<script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/localization/messages_pt_BR.js"></script>


<title><?=TITULO_GERAL?></title>
<body>
<br>

<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2" style="text-align: center; padding: 20px">
            <img src="img/logo_serama.gif" />
        </div>

        <div class="col-sm-8 col-sm-offset-2">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>ALTERAR SENHA</h4>
                            <small>Motivo: <?=$motivo?></small>
                        </div>
                    </div><!-- PANEL HEADING -->

                    <div class="panel-body">
                        <form class="form-horizontal" action="" method="post" id="frmAlterarSenha">
                                <div class="form-group">
                                    <label class="control-label col-sm-4">Senha Atual:</label>
                                    <div class="col-sm-5">
                                        <input name="edtSenhaAntiga" class="form-control" type="password" id="edtSenhaAntiga"  placeholder="Digite a senha anterior" size="12" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="edtNovaSenha">Nova senha</label>
                                    <div class="col-sm-5">
                                        <input name="edtNovaSenha" class="form-control" type="password" id="edtNovaSenha" placeholder="Digite a nova Senha" size="12" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="edtConfirmaSenha">Confirmar Senha</label>
                                    <div class="col-sm-5">
                                        <input name="edtConfirmaSenha" class="form-control" type="password" title="Confirme a senha" id="edtConfirmaSenha" placeholder="Confirme a nova senha" size="12">
                                    </div>
                                </div><!-- PANEL FOOTER -->
                            <input name="acao" type="hidden" id="acao" value="alterarSenha">
                            <input name="edtUsuarioId" type="hidden" id="edtUsuarioId" size="12" value="<?=$_GET['usuario_id'] ?>">
                        </form>

                    </div><!-- PANEL BODY -->
                    <div class="panel-footer">
                        <input type="button" class="btn btn-success"  name="btnAlterarSenha" id="btnAlterarSenha" value="Alterar">
                        <input type="button" class="btn btn-danger"  name="btnCancelar" id="btnCancelar" value="Cancelar" onClick="ir('index.php')">

                    </div><!-- PANEL FOOTER -->
                </div><!-- PANEL -->
        </div>
    </div>
</div><!-- CONTAINER FLUID -->
<script type="text/javascript">
    $( document ).ready( function () {
        $("#frmAlterarSenha").validate({
            rules: {
                edtSenhaAntiga: "required",
                edtNovaSenha: {
                    required:"true",
                    pwcheck: "true",
                    minlength: 8
                },
                edtConfirmaSenha: {
                    required:"true",
                    equalTo:"#edtNovaSenha"
                },
            },
            messages: {
                edtNovaSenha: {
                    minLenght: "A senha deve conter no m&iacute;nimo 8 caracteres",
                    pwcheck: "A senha deve conter no m&iacute;nimo 1 caracteres num&eacute;rico, e uma letra Mai&uacute;scula.",
                }
            },
            errorElement: "em",
            errorPlacement: function ( error, element ) {
                // Add the `help-block` class to the error element
                error.addClass( "help-block" );

                // Add `has-feedback` class to the parent div.form-group
                // in order to add icons to inputs
                element.parents( ".col-sm-5" ).addClass( "has-feedback" );

                error.insertAfter( element );

            },

            highlight: function ( element, errorClass, validClass ) {
                $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
            },
            unhighlight: function ( element, errorClass, validClass ) {
                $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
            }
        });

        $.validator.addMethod("pwcheck", function(value) {
            return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
                && /[A-Z]/.test(value) // has a upper letter
                && /\d/.test(value) // has a digit
        });

        $('#btnAlterarSenha').click(function () {
            if ($('#frmAlterarSenha').valid())
                $('#frmAlterarSenha').submit();
        });

    });

</script>
</body>
</html>
