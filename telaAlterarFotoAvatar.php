<? /**  * Created by PhpStorm. * User: Lincoln  * Date: 19/09/2016  * Time: 14:43  */
    require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';
    include 'header.php';
    include 'inc/script.php';
?>
<body >

    <div id="wrapper">
        <? include('inc/menu.php')?>
        <div id="page-wrapper">
            <div class="container-fluid">

                <div class="row" style="margin-top:50px;">
                    <h2>Selecione a Imagem</h2>
                    <p><input class="btn btn-primary" type="file" id="file-input"></p>
                    <p>Ou <strong>Arraste </strong> a imagem para c&aacute;</p>
                    <br>
                    <h2>Imagem Selecionada</h2>
                    <p id="actions" style="display:none;">
                        <button class="btn btn-primary" type="button" id="edit"><i class="fa fa-filter" aria-hidden="true"></i> Selecionar</button>
                        <button class="btn btn-primary" type="button" id="crop"><i class="fa fa-scissors" aria-hidden="true"></i> Recortar</button>
                        <button class="btn btn-success" type="button" id="salvar"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar</button>
                    </p>
                    <div id="result" class="result">
                        <p>This demo works only in browsers with support for the <a href="https://developer.mozilla.org/en/DOM/window.URL">URL</a> or <a href="https://developer.mozilla.org/en/DOM/FileReader">FileReader</a> API.</p>
                    </div>
                    <br>
                    <div id="exif" class="exif " style="display:none;">
                        <h2>Exif meta data</h2>
                        <p id="thumbnail" class="thumbnail" style="display:none;"></p>
                        <table></table>
                    </div>
                    <br>
                    <script src="inc/JavaScript-Load-Image-master/js/load-image.js"></script>
                    <script src="inc/JavaScript-Load-Image-master/js/load-image-scale.js"></script>
                    <script src="inc/JavaScript-Load-Image-master/js/load-image-meta.js"></script>
                    <script src="inc/JavaScript-Load-Image-master/js/load-image-fetch.js"></script>
                    <script src="inc/JavaScript-Load-Image-master/js/load-image-exif.js"></script>
                    <script src="inc/JavaScript-Load-Image-master/js/load-image-exif-map.js"></script>
                    <script src="inc/JavaScript-Load-Image-master/js/load-image-orientation.js"></script>
                    <!-- jQuery and Jcrop are not required by JavaScript Load Image, but included for the demo -->
                    <script src="inc/JavaScript-Load-Image-master/js/vendor/jquery.js"></script>
                    <script src="inc/JavaScript-Load-Image-master/js/vendor/jquery.Jcrop.js"></script>
                    <script src="inc/JavaScript-Load-Image-master/js/demo/fotoAvatar.js"></script>


                </div><!--CONTAINER-FLUID-->
            </div><!--PAGE-WRAPPER-->
        </div><!-- WRAPPER -->
    </div><!-- WRAPPER -->
</body>
</hmtl>
