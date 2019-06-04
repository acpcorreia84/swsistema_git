<?php
/**
 * Created by PhpStorm.
 * User: antoniocorreia
 * Date: 10/05/2017
 * Time: 06:39
 */

require_once $_SERVER['DOCUMENT_ROOT'].'/loader.php';
require_once 'header.php';
require_once 'inc/script.php';
?>
<body>
<script src="inc/paginator/jquery.twbsPagination.js" type="text/javascript"></script>
<!-- MODAL DO SISTEMA DE CONTADOR -->
<div id="wrapper">
    <? include('inc/menu.php')?>
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row" style="margin-top:50px;">

                <div class="row" >
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Lista de Locais
                            </div><!-- PANEL HEADING -->

                            <div class="panel-body">
                                <div id="qtdLocaisConsulta"></div>
                                <ul class="paginacao pagination-sm" id="paginacaoLocaisTopo" ></ul>
                                <div class="table table-responsive" id="divTabelaLocais">

                                </div><!-- DIV TABLE - REPOSNSIVE -->
                                <ul class="paginacao" id="paginacaoLocaisRodape" ></ul>
                            </div><!-- PANEL BODY -->
                        </div><!-- panel default -->
                    </div><!-- COL LG 12 -->
                </div><!-- CLASS ROW -->
            </div><!--CONTAINER-FLUID-->
        </div><!--PAGE-WRAPPER-->
    </div><!-- WRAPPER -->
</div>

<script>
    $(document).ready(function(){
        carregarLocais();
    })
</script>

<? include_once 'modais/locais/modalLocalDetalhar.php'; ?>
<? include_once 'modais/locais/modalLocalInserirEditar.php'; ?>
<? include_once 'modais/modalLoading.php'; ?>



</body>
</html>