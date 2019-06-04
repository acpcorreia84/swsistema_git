<? /**  * Created by PhpStorm. * User: Lincoln  * Date: 19/09/2016  * Time: 14:43  */
    require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';
    include 'header.php';
    include 'inc/script.php';
?>
<body >
    <link rel="stylesheet" href="inc/jquery-ui-1.12.1/jquery-ui.theme.min.css">
    <script src="inc/jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <script src="inc/jQuery-Picture-Cut-master/src/jquery.picture.cut.js"></script>

    <div id="wrapper">
        <? include('inc/menu.php')?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row" style="margin-top: 60px">
                    <h4>Click na foto para escolher uma imagem para o seu perfil</h4>
                    <span>Em seguida recorte a imagem, e selecione. Por &uacute;ltimo salve no bot&atilde;o abaixo!</span><br/><br/>
                </div>

                <div id="container_image" ></div>
                <script>
                    $( document ).ready(function() {
                        $("#container_image").PictureCut({
                            InputOfImageDirectory       : "image",
                            PluginFolderOnServer        : "/inc/jQuery-Picture-Cut-master/",
                            FolderOnServer              : "/inc/jQuery-Picture-Cut-master/uploads/",
                            EnableCrop                  : true,
                            MaximumSize                 : 200,
                            EnableMaximumSize           : true,
                            CropModes                   :
                            {
                                widescreen: false,
                                letterbox: false,
                                free   : true
                            },
                            CropOrientation: false
                        });
                    });

                </script>

                <div class="row" style="margin-top: 20px">
                    <button class="btn btn-primary" onclick="console.log($('.picture-element-image').attr('src')); salvarFotoPerfil($('.picture-element-image').attr('src'));">Salvar</button>
                </div>

            </div><!--PAGE-WRAPPER-->
        </div><!-- WRAPPER -->
    </div><!-- WRAPPER -->
</body>
</hmtl>
