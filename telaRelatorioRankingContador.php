<?
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';
if ($_GET['edtFiltroRankingContador']) {
    $entreDatas = $_GET['edtFiltroRankingContador'];
    $entreDatas = explode(',',$entreDatas);
    $dataDe = explode("/",$entreDatas[0]);
    $dataDeFinal = $dataDe[2] . "-" . $dataDe[1] . "-" . $dataDe[0];
    $dataAte = explode("/",$entreDatas[1]);
    $dataAteFinal = $dataAte[2] . "-" . $dataAte[1] . "-" . $dataAte[0];
} else {
    $dataDe = date('01/m/Y');
    $dataDe = explode("/",$dataDe);
    $dataAte = getLastDayOfMonth(date("m"), date("Y")) .'/' . date('m') .'/'. date('Y');
    $dataAte = explode("/", $dataAte);
}

try {

    /*
    * SE FOR DA DIRETORIA OU DO FINANCEIRO PULA (MOSTRA TODOS OS CONTADORES)
    * SE NAO FOR DA DIRETORIA E NAO TIVER ESCOLHIDO NENHUM FILTRO DE CAMPO E DE CONSULTORES SO MOSTRA OS CONTADORES VINCULADOS AO USUARIO SELECIONADO
    * DOS USUARIOS DOS PARCEIROS OU CASO SEJA SUPERVISOR DAS AREAS DOS MESMOS
    */
    if ( ( ($usuarioLogado->getPerfilId() != 4) && ($usuarioLogado->getPerfilId()!=11)) ) {
        /*SE FOR SUPERVISOR ADICIONA USUARIOS POR LOCAIS*/
        /*
         * SE TIVER LOCAL VINCULADO, ACRESCENTA TODOS
         * OS USUARIOS VINCULADOS A ESTES LOCAIS
         * */
        $usuariosLocaisObj = $usuarioLogado->getUsuariosLocaisUsuario();
        $usuariosPermitidos = array();
        $usuariosPermitidos[] = $usuarioLogado->getId();

        foreach ($usuariosLocaisObj as $usuario)
            $usuariosPermitidos[] = $usuario->getId();

        if ($usuariosLocais)
            $usuariosPermitidos[] = $usuarioLogado->getId();


        /*
         * SE O USUARIO FOR PARCEIRO, ACRESCENTA TODOS
         * OS USUARIOS VINCULADOS AO MESMO
         * */
        $usuariosParceiroObj = $usuarioLogado->getUsuariosParceiroUsuario();

        foreach ($usuariosParceiroObj as $usuario) {
            $usuariosPermitidos[] = $usuario->getId();

        }
        if ($usuariosParceiro) {
            $usuariosPermitidos[] = $usuarioLogado->getId();
        }

    }


    $con = Propel::getConnection();
    /*PRIMEIRO CONTA OS REGISTROS DA CONSULTA DE CONTADORES*/
    $sql = ' select count(*) as qtd from (select c.id,c.nome, sum(p.preco-cd.desconto) as Total , count(p.id) as Qtde from ';
    $sql .=' (certificado cd join contador c on cd.contador_id = c.id) join produto p on cd.produto_id = p.id';
    $sql .= ' where ';
    if ($_GET['edtFiltroVendedor'])
        $sql .= ' c.usuario_id = ' . $_GET['edtFiltroVendedor'] . " and " ;

    if ($_GET['edtFiltroRankingContador'])
        $sql .= " (data_confirmacao_pagamento >='". $dataDeFinal ." 00:00:00' and data_confirmacao_pagamento <= '".$dataAteFinal ." 23:59:59')";
    else
        $sql .= " (data_confirmacao_pagamento >='".date("Y").'-'.date("m")."-01 00:00:00' and data_confirmacao_pagamento <= '".date('Y') . '/' . date('m') . '/' . getLastDayOfMonth(date('m'), date('Y'))." 23:59:59')";
    $sql .= ' and cd.apagado = 0  ';
    $sql .= ' group by c.id order by qtde desc) as qtd';

    $stmt = $con->prepare($sql);
    $stmt->execute();
    $qtdContadores = $stmt->fetchAll();

    $pages = new Paginator($qtdContadores[0]['qtd'], 9, array(50, 3, 6, 9, 12, 25, 50, 100, 250, 'All'));

    //CONSULTA OS CONTADORES DE DE ACORDO COM A QUANTIDADE VENDIDA
    $sql = ' select c.id,c.nome,c.cod_contador, sum(p.preco-cd.desconto) as Total , count(p.id) as Qtde, u.nome as nome_vendedor from ';
    $sql .=' ((certificado cd join contador c on cd.contador_id = c.id) join produto p on cd.produto_id = p.id) join usuario u on c.usuario_id = u.id';
    $sql .= ' where';
    if ($_GET['edtFiltroVendedor'])
        $sql .= ' c.usuario_id = ' . $_GET['edtFiltroVendedor'] . " and " ;
    elseif ($usuariosPermitidos)
        $sql .= ' c.usuario_id in (' . implode(',',$usuariosPermitidos) . ") and " ;

    if ($_GET['edtFiltroRankingContador'])
        $sql .= " (data_confirmacao_pagamento >='". $dataDeFinal ." 00:00:00' and data_confirmacao_pagamento <= '".$dataAteFinal ." 23:59:59')";
    else
        $sql .= " (data_confirmacao_pagamento >='".date("Y").'-'.date("m")."-01 00:00:00' and data_confirmacao_pagamento <= '".date('Y') . '/' . date('m') . '/' . getLastDayOfMonth(date('m'), date('Y'))." 23:59:59')";
    $sql .= ' and cd.apagado = 0  ';
    $sql .= ' group by c.id order by qtde desc limit '. $pages->limit_start . ', '. $pages->limit_end;


    $stmt = $con->prepare($sql);
    $stmt->execute();
    $contadores = $stmt->fetchAll();

}catch (Exception $e){
    erroEmail($e->getMessage()."<br/><br/>Usuario: ".$usuarioLogado->getNome(), 'Error ao consultar os contadores da tela de contador');
    js_aviso("Desculpe-me, mas não conseguir carregar a sua certeira de contadores");
}

/* LISTAGEM DE PRODUTOS NO FILTRO*/

try {
    /*CONSULTA APENAS OS VENDEDORES QUE TEM CERTIFICADOS VENDIDOS NO PRAZO DEFINIDO*/
    $sql = 'select u.*, count(c.id) as qtd from (usuario u join certificado cd on u.id = cd.usuario_id) join contador c on cd.contador_id = c.id where';
    if ($usuariosPermitidos)
        $sql .= ' u.id in (' . implode(',',$usuariosPermitidos) . ") and " ;

    if ($_GET['edtFiltroRankingContador'])
        $sql .= " (data_confirmacao_pagamento >='". $dataDeFinal ." 00:00:00' and data_confirmacao_pagamento <= '".$dataAteFinal ." 23:59:59')";
    else
        $sql .= " (data_confirmacao_pagamento >='".date("Y").'-'.date("m")."-01 00:00:00' and data_confirmacao_pagamento <= '".date('Y') . '/' . date('m') . '/' . getLastDayOfMonth(date('m'), date('Y'))." 23:59:59')";
    $sql .= ' and u.situacao <> -1';
    $sql .= ' group by u.id ';
    $sql .= ' order by u.nome';

    $stmt = $con->prepare($sql);
    $stmt->execute();
    $rsVendedores = $stmt->fetchAll();

}catch (Exception $e){
    erroEmail($e->getMessage()."<br/><br/>Usuario: ".$usuarioLogado->getNome(), "Erro ao consultador o vendedores para listagem na tela de contador");
    js_aviso("Desculpe-me, mas não conseguir carregar a lista de vendedores");
}


?>
<? include 'header.php'; ?>
<? include 'inc/script.php'; ?>
<body >
<!-- MODAL DO SISTEMA DE CONTADOR -->

<div id="wrapper">
    <? include('inc/menu.php')?>
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row" style="margin-top:50px;">
                <div class="col-lg-12">
                    <div class="panel panel-success">
                            <div class="panel-body">

                                <form id="frmFiltroRanking" method="get" action="">
                                    <div class="col-lg-3">
                                        <input type='text' class="datepicker-here form-control" data-position="right top" id="edtFiltroRankingContador" name="edtFiltroRankingContador"/>
                                            <script>
                                                // Initialization
                                                $('#edtFiltroRankingContador').datepicker({language:"pt-BR", range:'true'});
                                                // Access instance of plugin
                                                var dataPk = $('#edtFiltroRankingContador').data('datepicker');
                                                //dataPk.update('minDate', new Date());

                                                dataAtual = new Date();
                                                function ResetaData() {
                                                    <? if ($_GET['edtFiltroRankingContador']) {?>
                                                    dataPk.selectDate([new Date(<?=intval($dataDe[2])?>,<?=intval($dataDe[1])-1?>,<?=intval($dataDe[0])?>), new Date(<?=intval($dataAte[2])?>,<?=intval($dataAte[1])-1?>,<?=intval($dataAte[0])?>)]);
                                                    <? } else { ?>
                                                    dataPk.selectDate([new Date(dataAtual.getFullYear(),dataAtual.getMonth(),'01'), new Date(dataAtual.getFullYear(),dataAtual.getMonth(),<?=getLastDayOfMonth(date('m'),date('Y'));?>)]);
                                                    <? } ?>
                                                }
                                                ResetaData();
                                            </script>

                                    </div>
                                    <select id="edtFiltroVendedor" name="edtFiltroVendedor" class="selectpicker" data-live-search="true">
                                        <option value="" data-tokens="Filtro por vendedor">Filtre por Vendedor</option>
                                        <? foreach ($rsVendedores as $vendedor) {?>
                                            <option <? if ($vendedor['id']==$_GET['edtFiltroVendedor']) echo 'selected="selected"';?> data-tokens="<?=$vendedor['nome']?>" value="<?=$vendedor['id']?>"><?=$vendedor['nome']?></option>
                                        <? }?>
                                    </select>
                                    <button class="btn btn-primary" id="btnExecutar">Filtrar</button>
                                    <input type="button" value="Limpar" class="btn btn-danger" class="btnResetar" id="btnResetar" onclick="ir('telaRelatorioRankingContador.php')">
                                </form>

                                <script>

                                    $(document).ready(function() {
                                        /*$('#btnResetar').click(function () {
                                            $('#edtFiltroVendedor').val("");
                                            $('#frmFiltroRanking').submit();
                                        });*/
                                        $('#edtFiltroVendedor').change(function () {
                                            $('#frmFiltroRanking').submit();
                                        });
                                    })
                                </script>
                            </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Contadores
                        </div><!-- PANEL HEADING -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-11">
                                    <span class="pagination"><li><?=$pages->display_pages();?></li></span>
                                </div>
                            </div>

                            <div class="table table-responsive small">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <td valign="middle" align="center">Ranking.</td>
                                        <td valign="middle" align="center">Id </td>
                                        <td valign="middle" align="center">Cod. </td>
                                        <td valign="middle" align="center">Contador</td>
                                        <td valign="middle" align="center">Vendas</td>
                                        <td valign="middle" align="center">Qtd. Certificados</td>
                                        <td valign="middle" align="center">Vendedor</td>
                                        <td valign="middle" align="center">A&ccedil;&atilde;o</td>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <? $i = $pages->limit_start+1; if ($contadores) foreach ($contadores as $key=>$contador) { ?>
                                        <tr <?=corLinhaTabela($key)?> >
                                            <td align="center"><?=$i++;?></td>
                                            <td align="center"><?=str_pad($contador['id'], 4, 0, STR_PAD_LEFT); ?></td>
                                            <td align="center"><? if($contador['cod_contador']) echo $contador['cod_contador']; else echo "******";?></td>
                                            <td align="center"><?=utf8_encode($contador['nome']);?></td>
                                            <td align="center"><?=formataMoeda( $contador['Total']);?></td>
                                            <td align="center"><?=$contador['Qtde'];?></td>
                                            <td align="center"><?=utf8_encode($contador['nome_vendedor']);?></td>

                                            <td align="center"><a data-toggle="modal" data-target="#listar_certificados_contador" onclick="listarCertificadosContador(<?=$contador['id']?>, 'divTabelaCertificadosContador', '<?=$dataDe[0].'/'.$dataDe[1].'/'.$dataDe[2];?>', '<?=$dataAte[0].'/'.$dataAte[1].'/'.$dataAte[2];?>')"><i class="fa fa-th-list" title="Listar certificados do contador. Qtd:<?=$contador['Qtde'];?>" onclick=""></i></a></td>

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
<? include 'modais/contador/modalContadorListarCertificados.php'; ?>
<? include "modais/certificados/certificadoModalAguardandoResposta.php" ;?>

<!-- MODAl DO SISTEMA DE CONTADOR -->
</body>
</html>