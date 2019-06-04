<?
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

try {
    $cCupomDesconto = new Criteria();

    if($_POST && $_POST['edt_CupomDesconto_id']){
        $cCupomDesconto->add(CuponsDescontoCertificadoPeer::ID, $_POST['edt_cupom_esconto_id']);
    }elseif($_POST && $_POST['edt_cupom_esconto_id']){
        $cCupomDesconto->add(CuponsDescontoCertificadoPeer::COD_CupomDesconto, $_POST['edt_cupom_esconto_id']);
    }elseif($_POST && $_POST['edt_cpf']){
        $cCupomDesconto->add(CuponsDescontoCertificadoPeer::CPF, $_POST['edt_cpf']);
    }elseif($_POST && $_POST['edt_cnpj']){
        $cCupomDesconto->add(CuponsDescontoCertificadoPeer::CNPJ, $_POST['edt_cnpj']);
    }

    /*SE FOR DIRETORIA OU GNN*/
    if (($usuarioLogado->getPerfilId()!= 4) && ($usuarioLogado->getPerfilId()!= 78) && ($usuarioLogado->getPerfilId()!= 72)) {
        $cCupomDesconto->add(CuponsDescontoCertificadoPeer::USUARIO_ID, $usuarioLogado->getId());
    }

    $num_rows = $qtdeCupomDesconto;
    $pages = new Paginator($qtdeCupomDesconto, 9, array(50, 3, 6, 9, 12, 25, 50, 100, 250, 'All'));
    $cCupomDesconto->setOffset($pages->limit_start);
    $cCupomDesconto->addDescendingOrderByColumn(CuponsDescontoCertificadoPeer::ID);
    $cCupomDesconto->setLimit($pages->limit_end);
    $CuponsDescontos = CuponsDescontoCertificadoPeer::doSelect($cCupomDesconto);
}catch (Exception $e){
    erroEmail($e->getMessage()."<br/><br/>Usuario: ".$usuarioLogado->getNome(), 'Error ao consultar os Cupons de Descontos da tela de Cupons de Desconto');
    js_aviso("Desculpe-me, mas não conseguir carregar os seus Cupons");
}

/* LISTAGEM DE PRODUTOS NO FILTRO*/

try {
    $cVendedores = new Criteria();
    $cVendedores->add(UsuarioPeer::SITUACAO, 0);
    $cVendedores->add(UsuarioPeer::SETOR_ID, ('5,6,8'), Criteria::IN);
    $cVendedores->addAscendingOrderByColumn(UsuarioPeer::NOME);
    $vendedores = UsuarioPeer::doSelect($cVendedores);
}catch (Exception $e){
    erroEmail($e->getMessage()."<br/><br/>Usuario: ".$usuarioLogado->getNome(), "Erro ao consultar o vendedores para listagem na tela de Cupons de Desconto");
    js_aviso("Desculpe-me, mas não conseguir carregar a lista de vendedores");
}

try {
    $cProdutos = new Criteria();
    $cProdutos->add(ProdutoPeer::SITUACAO, 1);
    $cProdutos->addAscendingOrderByColumn(ProdutoPeer::ID);
    $produtos = ProdutoPeer::doSelect($cProdutos);
}catch (Exception $e){
    erroEmail($e->getMessage()."<br/><br/>Usuario: ".$usuarioLogado->getNome(), "Erro ao consultar o produtos para listagem na tela de Cupons de Desconto");
    js_aviso("Desculpe-me, mas não conseguir carregar a lista de produtos");
}


?>
<? include 'header.php'; ?>
<? include 'inc/script.php'; ?>
<body oncontextmenu="return false" ondragstart="return false" onselectstart="return false">
<!-- MODAL DO SISTEMA DE CupomDesconto -->


<div id="wrapper">
    <? include('inc/menu.php')?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row" style="margin-top:50px;">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <!--                            --><?// include 'inc/filtros/filtroCupomDesconto.php';?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            CuponsDescontos
                        </div><!-- PANEL HEADING -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-11">
                                    <span class="pagination"><li><?=$pages->display_pages();?></li></span>
                                </div>
                                <div class="col-lg-1 text-right">
                                    <a data-toggle="modal" data-target="#gerarCupomDesconto" onclick="gerar_codigo_cupom_desconto('gerar_codigo_cupom_desconto','<?=$usuarioLogado->getNome()?>')"> <i class="fa fa-lg fa-plus"></i> </a>
                                </div>
                            </div>

                            <div class="table table-responsive small">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <td valign="middle" align="center">Cod. Desconto</td>
                                        <td valign="middle" align="center">Produto</td>
                                        <td valign="middle" align="center">Motivo</td>
                                        <td valign="middle" align="center">Vencimento</td>
                                        <td valign="middle" align="center">Desconto</td>
                                        <td valign="middle" align="center">Status</td>
                                        <td valign="middle" align="center">A&ccedil;&atilde;o</td>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <? foreach ($CuponsDescontos as $key=>$cupomDesconto) { ?>
                                        <tr <?=corLinhaTabela($key)?> >
                                            <td align="center"><?=$cupomDesconto->getCodigoDesconto();?></td>
                                            <td align="center"><?=$cupomDesconto->getProduto()->getNome()?></td>
                                            <td align="center"><?=$cupomDesconto->getMotivo()?></td>
                                            <td align="center"><?=$cupomDesconto->getVencimento('d/m/Y');?></td>
                                            <td align="center"><?=formataMoeda($cupomDesconto->getDesconto());?></td>
                                            <td align="center">
                                                <?
                                                if($cupomDesconto->getVencimento('Y-m-d') >= date('Y-m-d')){
                                                    if ($cupomDesconto->getAutorizado()== 0){
                                                        echo '<i class="fa fa-circle" style="color:#ac2925" title="Não Autorizado"></i>';
                                                    }else{
                                                        if ($cupomDesconto->getUsado()== 0)
                                                            echo '<i class="fa fa-circle" style="color:#096;" title="Disponível"></i>';
                                                        else
                                                            echo '<i class="fa fa-check" style="color:#ac2925" title="Utilizado"></i>';
                                                    }
                                                }else{
                                                    echo '<i class="fa fa-ban" aria-hidden="true" style="color:#ac2925" title="cupom vencido em '.$cupomDesconto->getVencimento('d/m/Y').'"></i>';
                                                }
                                                ?>
                                            </td>
                                            <td align="center">
                                                <a data-toggle="modal" data-target="#visualizarCupomDesconto" onclick="visualizar_cupom_desconto(<?=$cupomDesconto->getId();?>,'visualizar_cupom_desconto')"> <i class="fa fa-eye"></i> </a>
                                                <? if($cupomDesconto->getUsado() == 0) {?>
                                                    <a data-toggle="modal" title="Excluir cupomDesconto" data-target="#excluircupomDesconto" onclick="recupera_cupomDesconto(<?=$cupomDesconto->getId()?>)"> <i class="fa fa-trash"></i> </a>
                                                <? }?>
                                                <?if($cupomDesconto->getAutorizado()==0) {
                                                    if (array_search('autorizar', $arrPermissaoTela) !== false) {
                                                        ?>
                                                        <a data-toggle="modal" data-target="#autorizarDesconto" title="Autorizar Cupom de Desconto" onclick="carrega_autorizacao(<?= $cupomDesconto->getId(); ?>,'carregar_autorizacao');"><i class="fa fa-thumbs-o-up"></i></a>
                                                    <?  }
                                                }?>
                                                <? if (array_search('editar', $arrPermissaoTela) !== false) {
                                                ?>
<!--                                                    <a data-toggle="modal" data-target="#editarDesconto" title="Editar Cupom de Desconto" onclick="recupera_id(<?//= $cupomDesconto->getId(); ?>);"><i class="fa fa-edit"></i></a>-->
                                                <?}?>
                                            </td>
                                        </tr>
                                    <? }?>
                                    </tbody>
                                </table>
                            </div><!-- DIV TABLE - REPOSNSIVE -->
                            <span class="pagination"><li><?=$pages->display_pages();?></li></span>
                        </div><!-- PANEL BODY -->
                    </div><!-- panel default -->
                </div><!-- COL LG 12 -->
            </div><!-- CLASS ROW -->
        </div><!--CONTAINER-FLUID-->
    </div><!--PAGE-WRAPPER-->
</div><!-- WRAPPER -->

<? include 'modais/CuponsDesconto/visualizarCupomDesconto.php'; ?>
<? include 'modais/CuponsDesconto/gerarCupomDesconto.php'; ?>
<? include 'modais/CuponsDesconto/autorizarCupomDesconto.php'; ?>
<? include 'modais/CuponsDesconto/cupomDescontoModalAguardandoResposta.php'; ?>

<!-- MODAl DO SISTEMA DE CupomDesconto -->
</body>
</html>