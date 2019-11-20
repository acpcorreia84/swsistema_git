<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="GUIAR 3.2">
    <meta name="author" content="Yan Lincoln Menezes Galucio">
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="pragma" content="no-cache" />

    <title>SW - GUIAR</title>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-dialog.min.js"></script>
    <script type="text/javascript" src="bootstrap-select/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="bootstrap-select/css/bootstrap-select.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/jquery.validate.js"></script>
    <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/additional-methods.js"></script>
    <script type="text/javascript" src="inc/jquery-validation-1.15.0/dist/localization/messages_pt_BR.min.js"></script>

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script>
        function login() {
            $('.card').css('width', '450px');
            var dadosajax = {
                'email': $('#edtUsuario').val(),
                'senha': $('#edtSenha').val(),
                funcao: 'logarUsuario'
            }
            $('#loginbox').html('<i class="fa fa-5x fas fa-spinner fa-pulse text-primary"></i>').css({'text-align':'center'});

            $.ajax({
                url: 'funcoes/funcaoLogin.php',
                data : dadosajax,
                type : 'POST',
                cache : true,
                error : function(){
                    alertErro('Error LOGIN - Erro na tentativa de logar no sistema, Erro:' + e+ '. '+ msnPadrao + '.')
                },
                success : function(result){
                    try {
                        console.log('saida login:', result);
                        var resultado = JSON.parse(result);
                        console.log(resultado);

                        if (resultado.mensagem == 'Ok') {
                            $('#loginbox').html('<i class="fa fa-5x fas fa fa-check text-success"></i> <span class="fa-2x text-success">Login Ok, acessando...</span>').css({'text-align':'center'});

                            /*GUARDA O ID DO USUARIO LOGADO PARA UTILIZAR NOS MODAIS*/
                            if (typeof(Storage) !== "undefined") {
                                sessionStorage.usuarioLogadoId = resultado.usuarioId;
                                sessionStorage.usuarioLogadoPerfilId = resultado.perfilId;

                            } else {
                                alert('O seu navegados nao possui suporte para Gravacao de dados. Por favor entre em contato com o departamento de suporte para solucionar o problema.');
                            }

                            ir('home.php');
                        } else if (resultado.mensagem == 'Erro'){
                            //caso tenha acontecido algum erro
                            $('#loginbox').html('<i class="fa fa-5x fas fa-exclamation-triangle text-danger"></i> </br><span class="fa-1x text-danger">'+resultado.descricaoErro+'</span></br></br><button class="btn btn-primary" onclick="ir(\'index.php\')"><i class="icon-arrow-left"></i> Voltar</button>').css({'text-align':'center'});
                        }
                        else if (resultado.mensagem == 'redirecionar'){
                            $('#loginbox').html('<i class="fa fa-5x icon-share-alt text-success"></i> </br><span class="fa-1x text-success">'+resultado.descricaoMensagem+'</span></br></br><button class="btn btn-success" onclick="ir(\''+resultado.url+'\')"><i class="icon-arrow-left"></i> Trocar senha</button>').css({'text-align':'center'});

                        }

                    } catch (e) {
                        console.log('Error LOGIN - Erro na tentativa de logar no sistema, Erro:' + result + e+ '. '+ msnPadrao + '.')
                        console.log(e, result);
                    }
                }
            });
        }
    </script>
    <script type="text/javascript" src="inc/uteis.js"></script>

</head>

<style>
    /* Made with love by Mutiullah Samim*/

    @import url('https://fonts.googleapis.com/css?family=Numans');

    html,body{
        background-image: url('img/bg/safeweb-oficial.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        height: 100%;
        font-family: 'Numans', sans-serif;
    }

    .container{
        height: 100%;
        align-content: center;
    }

    .card{
        height: 300px;
        margin-top: auto;
        margin-bottom: auto;
        width: auto;
        background-color: rgba(0,0,0,0.5) !important;
    }

    .social_icon span{
        font-size: 60px;
        margin-left: 10px;
        color: #0b62a4;
    }

    .social_icon span:hover{
        color: white;
        cursor: pointer;
    }

    .card-header h3{
        color: white;
    }

    .social_icon{
        position: absolute;
        right: 20px;
        top: -45px;
    }

    .input-group-prepend span{
        width: 50px;
        background-color: #0b62a4;
        color: black;
        border:0 !important;
    }

    input:focus{
        outline: 0 0 0 0  !important;
        box-shadow: 0 0 0 0 !important;

    }

    .remember{
        color: white;
    }

    .remember input
    {
        width: 20px;
        height: 20px;
        margin-left: 15px;
        margin-right: 5px;
    }

    .login_btn{
        color: black;
        background-color: #0b62a4;
        width: 100px;
    }

    .login_btn:hover{
        color: black;
        background-color: white;
    }

    .links{
        color: white;
    }

    .links a{
        margin-left: 4px;
    }

    .error {
        color: red;
    }
</style>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card" >
            <div class="card-header">
                <div class="center-block">
                    <img src="img/logo safeweb.png">
                </div>
                <div class="d-flex justify-content-end social_icon">
                    <span><i class="fab fa-facebook-square"></i></span>
                    <span><i class="fab fa-instagram"></i></span>
                </div>
            </div>
            <div class="card-body" id="loginbox">
                <form id="frmLogin" name="frmLogin" action="" method="post">
                    <div class="input-group form-group col-lg-12">
                        <div class="input-group-prepend ">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input id="edtUsuario" name="edtUsuario" type="text" class="form-control" placeholder="usu&aacute;rio">

                    </div>
                    <div class="input-group form-group col-lg-12 ">
                        <div class="input-group-prepend ">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input id="edtSenha" name="edtSenha" type="password" class="form-control" placeholder="senha">
                    </div>
                    <div class="form-group">
                        <input id="btnLogin" type="button" class="btn float-right login_btn" value="Entrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
<script>

    $.validator.setDefaults({
        submitHandler: function() {
            alert("submitted!");
        }
    });

    $().ready( function () {

        $("#frmLogin").validate({
            rules: {
                edtUsuario : {
                    email: true,
                    required: true
                },

                edtSenha: {
                    required: true,
                },
            },
            errorElement: "em",
            errorPlacement: function (error, element) {
                // Add the `help-block` class to the error element
                error.addClass("help-block");
                error.insertAfter(element);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).parents(".campoValidar").addClass("has-error").removeClass("has-success");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents(".campoValidar").addClass("has-success").removeClass("has-error");
            }
        });
    });





    $("#btnLogin").click(function (){
        if ($("#frmLogin").valid()) {
            login();
        }
    });
</script>
</html>