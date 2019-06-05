<?php
/*TESTE DE ESCRITA EXCEL*/
require_once 'Spreadshieet/Excel/Writer.php';

// Creating a workbook
$workbook = new Spreadsheet_Excel_Writer();

// sending HTTP headers
$workbook->send('test.xls');

// Creating a worksheet
$worksheet =& $workbook->addWorksheet('My first worksheet');

// The actual data
$worksheet->write(0, 0, 'Name');
$worksheet->write(0, 1, 'Age');
$worksheet->write(1, 0, 'John Smith');
$worksheet->write(1, 1, 30);
$worksheet->write(2, 0, 'Johann Schmidt');
$worksheet->write(2, 1, 31);
$worksheet->write(3, 0, 'Juan Herrera');
$worksheet->write(3, 1, 32);

// Let's send the file
$workbook->close();
?>

exit;
?>


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
                <input id="fileupload" type="file" name="files[]" data-url="server/php/" multiple>
                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                <script src="js/vendor/jquery.ui.widget.js"></script>
                <script src="js/jquery.iframe-transport.js"></script>
                <script src="js/jquery.fileupload.js"></script>
                <script>
                    $(function () {
                        $('#fileupload').fileupload({
                            dataType: 'json',
                            done: function (e, data) {
                                $.each(data.result.files, function (index, file) {
                                    $('<p/>').text(file.name).appendTo(document.body);
                                });
                            }
                        });
                    });
            </div><!--CONTAINER-FLUID-->
        </div><!--PAGE-WRAPPER-->
    </div><!-- WRAPPER -->
</div><!-- WRAPPER -->


</body>
</hmtl>
