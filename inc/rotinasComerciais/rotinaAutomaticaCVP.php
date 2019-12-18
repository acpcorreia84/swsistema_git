<?php header("Content-type: text/html; charset=utf-8"); ?>
    <!DOCTYPE html>
    <html lang="pt-BR">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema Serama 3.0">
    <meta name="author" content="Yan Lincoln Menezes Galucio">
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="pragma" content="no-cache" />

    <title>ROTINA COMERCIAL ENVIO AUTOMATICO CVP</title>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/custom.js"></script>

    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-dialog.min.js"></script>
    <script type="text/javascript" src="bootstrap-select/js/bootstrap-select.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-dialog.min.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.min.css"/>
    <!-- Search Sleect Bootstrap -->

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Antonio Carlos
 * Date: 06/12/2019
 * Time: 12:22
 */
require_once $_SERVER['DOCUMENT_ROOT']. '/loader_off.php';

$cCertificado = new Criteria();

$cCertificado->add(CertificadoPeer::APAGADO, 0);
$hora_ini = ' 00:00:00';
$hora_fim = ' 23:59:59';

$dataDeUrgentes = new DateTime(date('Y-m-d '.$hora_fim));
$dataDeUrgentes->sub(new DateInterval('P31D'));
$dataAte = new DateTime(date('Y-m-d '.$hora_ini));
$dataAte->sub(new DateInterval('P7D'));

$dataDeRenovacao = new DateTime(date('Y-m-d '.$hora_fim));
$dataDeRenovacao->sub(new DateInterval('P35D'));
$dataAteRenovacao = new DateTime(date('Y-m-d '.$hora_ini));
$dataAteRenovacao->sub(new DateInterval('P30D'));

echo "<h2>PERIODO DOS PEDIDOS QUE VAO PRO CVP: ".$dataDeUrgentes->format('d/m/Y') . ' ate ' . $dataAte->format('d/m/Y') .'</h2>';
echo "<h2>PERIODO DAS RENOVACOES QUE VAO PRO CVP: ".$dataDeRenovacao->format('d/m/Y') . ' ate ' . $dataAteRenovacao->format('d/m/Y') .'</h2>';

$cCertificado->addAnd(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, null, Criteria::ISNULL);
$cCertificado->addOr(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, '0000-00-00 00:00:00');

/*
 * PRIMEIRO BUSCA OS PEDIDOS EM ABERTO PARA RECARTEIRIZAR
 * */
$cDataCompra = $cCertificado->getNewCriterion(CertificadoPeer::DATA_COMPRA, $dataAte->format('Y-m-d '.$hora_fim), Criteria::LESS_EQUAL);
$cDataCompra->addAnd($cCertificado->getNewCriterion(CertificadoPeer::DATA_COMPRA, $dataDeUrgentes->format('Y-m-d '.$hora_ini), Criteria::GREATER_EQUAL));
$cDataCompra->addAnd($cCertificado->getNewCriterion(CertificadoPeer::CERTIFICADO_RENOVADO, null, Criteria::ISNULL));

/*
 * BUSCA OS CERTIFICADOS PARA RECARTEIRIZAR COM DATA DA COMPRA
 * DE 1 MES DO DIA ATUAL E VOLTA 5 DIAS PRA CASO O SISTEMA POR ALGUM MOTIVO NAO RODAR NO DIA
 * */
$cDataCompraRenovacao = $cCertificado->getNewCriterion(CertificadoPeer::DATA_COMPRA, $dataDeRenovacao->format('Y-m-d H:i:s'), Criteria::GREATER_EQUAL);
$cDataCompraRenovacao->addAnd($cCertificado->getNewCriterion(CertificadoPeer::DATA_COMPRA, $dataAteRenovacao->format('Y-m-d H:i:s'), Criteria::LESS_EQUAL));
$cDataCompraRenovacao->addAnd($cCertificado->getNewCriterion(CertificadoPeer::CERTIFICADO_RENOVADO, 0, Criteria::GREATER_THAN));

$cDataCompraRenovacao->addOr($cDataCompra);

$cCertificado->add($cDataCompraRenovacao);
$cCertificado->addAscendingOrderByColumn(CertificadoPeer::DATA_COMPRA);
$certificados = CertificadoPeer::doSelect($cCertificado);


/*GUARDA EM ARRAYS OS IDS DE FOLLOW UP E LOST EM SITUACOES*/
$cFollow = new Criteria();
$cFollow->add(SituacaoPeer::SIGLA, 'follow');
$cFollow->addOr(SituacaoPeer::SIGLA, 'lostaux');
$cFollow->addOr(SituacaoPeer::SIGLA, 'lost');
$situacoesFollowup = SituacaoPeer::doSelect($cFollow);

$arrFollow = array();
$arrLost = array();
$situacaoCvp = '';
foreach ($situacoesFollowup as $situacaoFollow) {
    if ($situacaoFollow->getSigla()=='follow' )
        $arrFollow[] = $situacaoFollow->getId();
    elseif ($situacaoFollow->getSigla()=='lost' )
        $arrLost[] = $situacaoFollow->getId();
    elseif ($situacaoFollow->getSigla()=='lostaux' )
        $situacaoCvp = $situacaoFollow->getId();
}

/*
 * ARRAY COM TODOS OS PEDIDOS QUE IRAO PRO CPV
 * */

?>
<body>

<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row" style="margin-top:50px;">
                <div class="row" >
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Registros:
                            </div><!-- PANEL HEADING -->
                            <div class="panel-body">
                                <div  class="table table-responsive" >





                                <?
$arrCvp = array();
try {
    $con = Propel::getConnection(CertificadoPeer::DATABASE_NAME);
    $con->beginTransaction();
    echo '<div > <table border="1" class="table table-responsive"><thead><tr><td> &nbsp;</td><td>cod.</td><td>Cliente</td><td>data compra</td><td>cont.</td><td>Status</td><td>Tipo</td></tr></thead><tbody>';

    $qtdTotal = 0;
    $qtdFollowAntes = 0;
    $qtdSemFollowAntes = 0;
    $qtdTotalSemFollow = 0;
    $qtdTotalComFollow = 0;
    $i=1;
    foreach ($certificados as $certificado) {
        /*
        * SE FOR UM PEDIDO DE RENOVACAO, O VENCIMENTO E O VENCIMENTO DO CD ANTERIOR
        * */
        $tipoPedido = 'PED';

        if ($certificado->getCertificadoRenovado()) {
            $tipoPedido = 'REN';
            $certificadoRenovado = $certificado->getCertificadoRelatedByCertificadoRenovado();
            if ($certificadoRenovado)
                $diffDatas = (DiferencaEntreDatas(date('Y-m-d'), $certificadoRenovado->getDataFimValidade('Y-m-d')));
            else
                $diffDatas = '';
        } else {
            $diffDatas = (DiferencaEntreDatas(date('Y-m-d'), $certificado->getDataCompra('Y-m-d')));
        }


        if ($certificado->getStatusFollowup())
            $qtdFollowAntes ++;
        else
            $qtdSemFollowAntes++;

        if ($_GET['acao']=='executar') {
            $certSit = '';
            $qtdTotal++;
            /*
             * ACAO PRA RECARTEIRIZACAO APENAS DE PEDIDOS
             * */
            if ( ($tipoPedido=='PED')) {
                if (($certificado->getStatusFollowup()) ) {
                    /*
                     * SO EXECUTA DENOVAMENTE SE AINDA NAO TIVER MANDADO PRA CVP, PRA NAO GERAR STATUS DUPLICADO
                     * */

                    if (array_search($certificado->getStatusFollowup(), $arrFollow )) {

                        /*
                         * SE TIVER FOLLOW UP VAI PRA CVP COM 7 DIAS
                         * */

                        if ($diffDatas>=11) {
                            $qtdTotalComFollow++;
                            /*
                             * MANDA PRO CVP
                             * */

                            $certificado->setStatusFollowup($situacaoCvp);
                            $certificado->setDataRecarteirizacao(date('Y-m-d H:i:s'));
                            $certificado->save();

                            $certSit = new CertificadoSituacao();
                            $certSit->setUsuarioId(1039);
                            $certSit->setComentario('Este pedido foi mandado para o CVP, devido a estar '. $diffDatas . ' em aberto mesmo com feedback. Por enquanto n&atildeo ser&aacute; recarteirizado e se manter&aacute; na sua carteira. Cuide bem dele!');
                            $cSit = new Criteria();
                            $certSit->setCertificadoId($certificado->getId());
                            $cSit->add(SituacaoPeer::SIGLA, 'lostaux');
                            $certSit->setData(date('Y-m-d H:i:s'));
                            $certSit->setSituacao(SituacaoPeer::doSelectOne($cSit));
                            $certSit->save();
                        }
                    }

                } else {

                    /*
                     * SE NAO TIVER FOLLOW UP VAI PRA CVP COM 10 DIAS
                     * */
                    if ($diffDatas>=8) {
                        $qtdTotalSemFollow++;
                        /*
                         * MANDA PRO CVP
                         * */
                        $certificado->setDataRecarteirizacao(date('Y-m-d H:i:s'));
                        $certificado->setStatusFollowup($situacaoCvp);
                        $certificado->save();

                        $certSit = new CertificadoSituacao();
                        $certSit->setUsuarioId(1039);
                        $certSit->setComentario('Este pedido foi mandado para o CVP, devido a estar '. $diffDatas . ' em aberto sem feedback. Por enquanto n&atildeo ser&aacute; recarteirizado e se manter&aacute; na sua carteira. Cuide bem dele!');
                        $cSit = new Criteria();
                        $certSit->setCertificadoId($certificado->getId());
                        $cSit->add(SituacaoPeer::SIGLA, 'lostaux');
                        $certSit->setData(date('Y-m-d H:i:s'));
                        $certSit->setSituacao(SituacaoPeer::doSelectOne($cSit));
                        $certSit->save();

                    }
                }
            } elseif ($tipoPedido=='REN') {
                /*
                 * TEM QUE ESTAR EM UM DOS STATUS DE FOLLOWUP LISTADOS
                 * */
                if ((array_search($certificado->getStatusFollowup(), $arrFollow )) || ($certificado->getStatusFollowup() == 0)) {
                    /*
                     * ACAO PARA RENOVACAO
                     * */
                    $certificado->setStatusFollowup($situacaoCvp);
                    $certificado->setDataRecarteirizacao(date('Y-m-d H:i:s'));
                    $certificado->save();

                    $certSit = new CertificadoSituacao();
                    $certSit->setUsuarioId(1039);
                    $certSit->setComentario('Esta renova&ccedil;&atilde;o foi mandada para o CVP, devido a estar ' . $diffDatas . ' de vencer. Por enquanto n&atildeo ser&aacute; recarteirizado e se manter&aacute; na sua carteira. Cuide bem dela!');
                    $cSit = new Criteria();
                    $certSit->setCertificadoId($certificado->getId());
                    $cSit->add(SituacaoPeer::SIGLA, 'lostaux');
                    $certSit->setData(date('Y-m-d H:i:s'));
                    $certSit->setSituacao(SituacaoPeer::doSelectOne($cSit));
                    $certSit->save();
                }
            }
        }
        $comentario = '';
        if ($certSit) {
            $comentario = $certSit->getComentario();
            echo "<tr><td>".$i++."</td><td><a target='_blank' href='http://www.swsistema.com.br/telaCertificado.php?funcao=detalhaCertificado&idCertificado=".$certificado->getId()."'>".$certificado->getId()."</a></td><td>".$certificado->getCliente()->getRazaoSocial().' - '.$certificado->getCliente()->getNomeFantasia()." - CONSULTOR: ".$certificado->getUsuario()->getNome()." | Comentario: ".$comentario."</td><td>".$certificado->getDataCompra('d/m/Y')."</td><td>".$diffDatas .'d'."</td><td>".$certificado->getStatusFollowup()." <h3 style='color: darkred'>Comentario: ".$comentario."</h3></td><td>" . $tipoPedido . "</td></tr>";
        } else
            echo '<tr><td>' . $i++ . '</td><td><a target="_blank" href="http://www.swsistema.com.br/telaCertificado.php?funcao=detalhaCertificado&idCertificado='.$certificado->getId().'">'.$certificado->getId()."</a></td><td>" . $certificado->getCliente()->getRazaoSocial() . ' - ' . $certificado->getCliente()->getNomeFantasia() . "- <b>CONSULTOR: ".$certificado->getUsuario()->getNome()."</b>  | Comentario: " . $comentario . "</td><td>" . $certificado->getDataCompra('d/m/Y') . "</td><td>" . $diffDatas . 'd' . "</td><td>" . $certificado->getStatusFollowup() . "</td><td>" . $tipoPedido . "</td></tr>";
    }


    echo "</tbody></table></div>";
    $con->commit();
    //$con->rollBack();
} catch(Exception $e){
    $con->rollBack();
    echo 'Erro: Aconteceu um erro na duplicacao dos pedidos de certificados: '.$e->getMessage();
}
?>

                                </div>
                            </div><!-- PANEL BODY -->
                        </div><!-- panel default -->
                    </div><!-- COL LG 12 -->
                </div><!-- CLASS ROW -->


                <h1>Total de Pedidos: <?=$qtdTotal?></h1>
                <h3>Total de Pedidos (ANTES EXECUTAR) sem follow up: <?=$qtdSemFollowAntes?></h3>
                <h3>Total de Pedidos (ANTES EXECUTAR) com follow up: <?=$qtdFollowAntes?></h3>



                <h2>Total de Pedidos sem follow up: <?=$qtdTotalSemFollow?></h2>
                <h2>Total de Pedidos com follow up: <?=$qtdTotalComFollow?></h2>

                <a href="rotinaAutomaticaCVP.php?acao=executar">Executar</a>


            </div>
        </div>
    </div>
</div>

</body>
</html>
