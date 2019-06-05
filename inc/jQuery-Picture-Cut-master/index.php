<html>
<body>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> <!--for bootstrap theme-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><!--for bootstrap theme-->


    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>



</head>

<div id="container_image" style="margin: 100px"></div>
<script src="src/jquery.picture.cut.js"></script>
<script>
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


</script>

<button onclick="console.log($('.picture-element-image').attr('src'))">teste</button>
<?php


?>
</body>
</html>