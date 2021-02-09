<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 08/02/2021
 * Time: 14:26
 */

require_once $_SERVER['DOCUMENT_ROOT'].'/loader.php';
require_once 'header.php';
require_once 'inc/script.php';
?>
<body>
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
                                Lista de Grupos de produtos
                            </div><!-- PANEL HEADING -->

                            <div class="panel-body">
                                <div id="qtdGrupoProdutos"></div>
                                <div class="table table-responsive" id="divTabelaGrupos"></div><!-- DIV TABLE - REPOSNSIVE -->
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
        carregarGruposProdutos();
    })
</script>

<? include_once 'modais/produtos/modalGrupoProdutoDetalhar.php'; ?>
<? include_once 'modais/produtos/modalGrupoProdutoInserirEditar.php'; ?>
<? include_once 'modais/modalLoading.php'; ?>



</body>
</html>