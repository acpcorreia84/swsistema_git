<?
date_default_timezone_set('America/Belem');
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';
$hora_ini = ' 00:00:00';
$hora_fim = ' 23:59:59';
// CONSULTA CONTAS A PAGAR SETOR FINANCEIRO
if( ($usuarioLogado->getSetorId() == 3) || // SETOR FINANACEIRO
	($usuarioLogado->getSetorId() == 7) || ($usuarioLogado->getPerfilId() == 78)) // SETROR DIRETORIA
	{
        //consulta todos os locais para o filtro do gráfico
        $cLocal = new Criteria();
        $cLocal->add(LocalPeer::SITUACAO, 0);
        $locais = LocalPeer::doSelect($cLocal);

        $nomeBox1 = 'Vendas Totais M&eacute;s';
        $nomeBox2 = 'Realizadas/Dia';
        $nomeBox3 = 'Aberto/Mes';
        $nomeBox4 = 'Tickest Suporte';

        $cCPagar = new Criteria();
        $cCPagar->add(ContasPagarPeer::SITUACAO, 0);
        $cCPagar->add(ContasPagarPeer::VENCIMENTO,  date('Y-m-d'));
        $cPagar = ContasPagarPeer::doSelect($cCPagar);


        //CONSULTA TOTAL DE FATURAMENTO
        $cCertificado = new Criteria();
        $cCertificado->add(CertificadoPeer::APAGADO, 0);
        $cCertificado->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO,  date('Y')."-".date('m')."-01".$hora_ini, Criteria::GREATER_EQUAL);
        $cCertificado->addAnd(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, date('Y') . '-' . date('m') . '-' . getLastDayOfMonth(date('m'), date('Y')) .$hora_fim, Criteria::LESS_EQUAL);
        $pedidosCertificadosMes = CertificadoPeer::doSelect($cCertificado);

        //CERTIFICADOS SOMA TODOS OS CERTIFICADOS PARA MOSTRAR NA TELA
        $somaCertificadosNaoAutorizados = 0;
        $somaCertificadosAutorizados = 0;
        $somaCertificadosDia = 0;
        foreach ($pedidosCertificadosMes as $pedidoCertificado) {
            //SE TIVER AUTORIZADO
            if ($pedidoCertificado->getDataConfirmacaoPagamento('d/m/Y') == date('d/m/Y'))
                $somaCertificadosDia += ($pedidoCertificado->getProduto()->getPreco()) - ($pedidoCertificado->getDesconto());

            //SE NAO ESTIVER AUTORIZADO
            if ($pedidoCertificado->getAutorizadoVendaSemContador() == 0)
                $somaCertificadosNaoAutorizados += ($pedidoCertificado->getProduto()->getPreco()) - ($pedidoCertificado->getDesconto());

            //SE TIVER AUTORIZADO
            if ($pedidoCertificado->getAutorizadoVendaSemContador() == 1)
                $somaCertificadosAutorizados += ($pedidoCertificado->getProduto()->getPreco()) - ($pedidoCertificado->getDesconto());

        }

        //CONSULTA TOTAL DE PEDIDOS NAO PAGOS
        $cCertificado = new Criteria();
        $cCertificado->add(CertificadoPeer::APAGADO, 0);
        $cCertificado->add(CertificadoPeer::DATA_COMPRA,  date('Y')."-".date('m')."-01".$hora_ini, Criteria::GREATER_EQUAL);
        $cCertificado->addAnd(CertificadoPeer::DATA_COMPRA, date('Y') . '-' . date('m') . '-' . getLastDayOfMonth(date('m'), date('Y')) .$hora_fim, Criteria::LESS_EQUAL);
        $cCertificado->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, null, Criteria::ISNULL);
        $pedidosCertificadosMes = CertificadoPeer::doSelect($cCertificado);

        $somaCertificadosAbertos = 0;
        foreach ($pedidosCertificadosMes as $pedidoCertificado) {
            if ($pedidoCertificado->getProduto())
                $somaCertificadosAbertos += ($pedidoCertificado->getProduto()->getPreco()) - ($pedidoCertificado->getDesconto());
            else {
                /*DEPURANDO ERRO DE CERTIFICADOS SEM PRODUTOS*/
                var_dump('aqui',$pedidoCertificado);
            }
        }


/*
        echo formataMoeda($somaCertificadosNaoAutorizados);
        echo formataMoeda($somaCertificadosAutorizados);
        echo formataMoeda($somaCertificadosAbertos);
        echo $somaCertificadosDia
        exit;
*/

        //CONSULTA DO FATURAMENTO PARA O GRAFICO NO PAINEL
        $sql = 'select DATE_FORMAT(cd.data_confirmacao_pagamento, "%d/%m/%Y") as DATA, sum(p.preco) as TOTAL';
        $sql .=' from certificado cd , produto p';
        $sql .= ' where cd.produto_id = p.id and';
        $sql .= ' (cd.data_confirmacao_pagamento >= "'.date('Y').'-'.date('m').'-'.date("03").$hora_ini.'" and';
        $sql .= ' cd.data_confirmacao_pagamento <= "'.date('Y') .'-'. date('m') .'-'. getLastDayOfMonth(date('m'), date('Y')).' 23:59:59" ) ';
        $sql .= ' group by DATE_FORMAT(cd.data_confirmacao_pagamento, "%d/%m/%Y")';

        $con = Propel::getConnection();
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $meuFaturamento = $stmt->fetchAll();

        $arrayDia = array();
        foreach($meuFaturamento as $porDia){
            $dia = explode("/",$porDia['DATA']);
            if($porDia['TOTAL'] !=0)
                $arrayDia[(int)$dia[0]] = (int)$porDia['TOTAL'];
        }

        $mesAnterior = date('m')-1;

        //CONSULTA DO FATURAMENTO
        $sql = 'select DATE_FORMAT(cd.data_confirmacao_pagamento, "%d/%m/%Y") as DATA, sum(p.preco) as TOTAL';
        $sql .=' from certificado cd , produto p';
        $sql .= ' where cd.produto_id = p.id and';
        $sql .= ' (cd.data_confirmacao_pagamento >= "'.date('Y').'-'.$mesAnterior.'-'.date("03").$hora_ini.'" and';
        $sql .= ' cd.data_confirmacao_pagamento <= "'.date('Y') .'-'.$mesAnterior.'-'. getLastDayOfMonth(date('m'), date('Y')).' 23:59:59" ) ';
        $sql .= ' group by DATE_FORMAT(cd.data_confirmacao_pagamento, "%d/%m/%Y")';
        $con = Propel::getConnection();
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $meuFaturamentoMes = $stmt->fetchAll();

        $arrayMesPassado = array();
        foreach($meuFaturamentoMes as $porDia){
            $dia = explode("/",$porDia['DATA']);
            if($porDia['TOTAL'] !=0)
                $arrayMesPassado[(int)$dia[0]] = (int)$porDia['TOTAL'];
        }



}
// FIM CONTAS A PAGAR


// CONDI�AO SE PARA CONSULTA DOS TOP VENDEDORES E TOP CONTADORES
if (
		($usuarioLogado->getSetorId() == 5) || // SETOR DE VENDAS
		($usuarioLogado->getSetorId() == 7) || // SETOR DIRETORIA
		($usuarioLogado->getSetorId() == 9) || // SETOR GERENCIA
        ($usuarioLogado->getPerfilId() == 78) || //SETOR IM
		($usuarioLogado->getSetorId() == 3) // SETOR FINANCEIRO
){
	//CONSULTA DOS 6 VENDEDORES COM MAIOR QUANTIDADE DE VENDAS
	$sql = 'SELECT u.nome,u.foto_avatar, sum(p.preco-cd.desconto) as vendas FROM ';
	$sql .= '(';
	$sql .= '((certificado cd join usuario u on u.id = cd.usuario_id) join ';
	$sql .= 'setor s on s.id = u.setor_id ) join ';
	$sql .= 'produto p on cd.produto_id = p.id';
	$sql .= ') ';
	$sql .= 'where ';
	$sql .= 's.nome = "vendas" and perfil_id<>1 and ';
	$sql .= '(cd.data_confirmacao_pagamento >= "'.date("Y").'-'.date("m").'-03 00:00:00" and cd.data_confirmacao_pagamento < "'.date('Y') . '-' . date('m') . '-' . getLastDayOfMonth(date('m'), date('Y')).' 23:59:59")';
	$sql .= 'group by u.nome order by sum(p.preco-cd.desconto) desc ';
	$sql .= 'limit 10';

	$con = Propel::getConnection();
	$stmt = $con->prepare($sql);
	$stmt->execute();
	$campanhaVendas = $stmt->fetchAll();



	//CONSULTA DOS 10 CONTADORES COM MAIOR QUANTIDADE DE VENDAS
	$sql = 'select c.id,c.nome, sum(p.preco-cd.desconto) as Total , count(cd.produto_id) as Qtde';
	$sql .=' from certificado cd , contador c , produto p';
	$sql .= ' where c.id = cd.contador_id and cd.produto_id = p.id and';
	$sql .= "(data_confirmacao_pagamento >='".date("Y").'-'.date("m")."-03 00:00:00' and data_confirmacao_pagamento <= '".date('Y') . '/' . date('m') . '/' . getLastDayOfMonth(date('m'), date('Y'))." 23:59:59')";
	$sql .= ' group by c.nome ';
	$sql .= ' order by sum(p.preco-cd.desconto) desc';
	$sql .= ' limit 10';
	$con = Propel::getConnection();
	$stmt = $con->prepare($sql);
	$stmt->execute();
	$campanhaContadores = $stmt->fetchAll();

}
// FIM SE CONSULTA TOP CONTADORES E VENDEDORES

// CONSULTA SE PARA SETOR DE VENDAS
if($usuarioLogado->getSetorId() == 5){

    //CONSULTA POR VENDA FATURADA NO MÊS
	$cCertificado = new Criteria();
	$cCertificado->add(CertificadoPeer::APAGADO, 0);
    $cCertificado->add(CertificadoPeer::AUTORIZADO_VENDA_SEM_CONTADOR, 1);
    if($usuarioLogado->getPerfilId() != 1) {
        $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuarioLogado->getId());
    }else{
        $cCertificado->add(CertificadoPeer::LOCAL_ID, $usuarioLogado->getLocalId());
    }
	$cCertificado->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO,  date('Y')."-".date('m')."-".date("01").$hora_ini, Criteria::GREATER_EQUAL);
	$cCertificado->addAnd(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, date('Y') . '-' . date('m') . '-' . getLastDayOfMonth(date('m'), date('Y')) .$hora_fim, Criteria::LESS_EQUAL);
	$countCertificadosSucesso = CertificadoPeer::doSelect($cCertificado);

	foreach($countCertificadosSucesso as $faturamentoMes){
		$vendasMes += ($faturamentoMes->getProduto()->getPreco())-($faturamentoMes->getDesconto());
	}

	// CONSULTA POR CADASTROS EM ABERTO
	$cCertificado = new Criteria();
	$cCertificado->add(CertificadoPeer::APAGADO, 0);
    if($usuarioLogado->getPerfilId() != 1) {
        $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuarioLogado->getId());
    }else{
        $cCertificado->add(CertificadoPeer::LOCAL_ID, $usuarioLogado->getLocalId());
    }
	$cCertificado->add(CertificadoPeer::DATA_COMPRA,  date('Y') . '-' . date('m')."-".date('01').$hora_ini, Criteria::GREATER_EQUAL);
	$cCertificado->addAnd(CertificadoPeer::DATA_COMPRA, date('Y') . '-' . date('m') . '-' . getLastDayOfMonth(date('m'), date('Y')).$hora_fim, Criteria::LESS_EQUAL);
	$cCertificado->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, null, Criteria::ISNULL);
	$countCertificadosEmAberto = CertificadoPeer::doSelect($cCertificado);
	foreach($countCertificadosEmAberto as $FaturamentoReceber){
		$emAberto += ($FaturamentoReceber->getProduto()->getPreco()) - ($FaturamentoReceber->getDesconto());
	}

	//CONSULTA POR BAIXA DO DIA
	$cCertificado = new Criteria();
	$cCertificado->add(CertificadoPeer::APAGADO, 0);
    $cCertificado->add(CertificadoPeer::AUTORIZADO_VENDA_SEM_CONTADOR, 1);
    if($usuarioLogado->getPerfilId() != 1) {
        $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuarioLogado->getId());
    }else{
        $cCertificado->add(CertificadoPeer::LOCAL_ID, $usuarioLogado->getLocalId());
    }
	$cCertificado->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO,  date('Y')."-".date('m')."-".date("d").$hora_ini, Criteria::GREATER_EQUAL);
	$cCertificado->addAnd(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO,  date('Y')."-".date('m')."-".date("d").$hora_fim, Criteria::LESS_EQUAL);
	$vendasDoDia = CertificadoPeer::doSelect($cCertificado);

	foreach($vendasDoDia as $faturamentoDia){
		$vendasDia += ($faturamentoDia->getProduto()->getPreco())-($faturamentoDia->getDesconto());
	}

    // CONSULTA POR VENDAS BLOQUEADAS
    $cCertificado = new Criteria();
    $cCertificado->add(CertificadoPeer::APAGADO, 0);
    $cCertificado->add(CertificadoPeer::AUTORIZADO_VENDA_SEM_CONTADOR, 0);
    if($usuarioLogado->getPerfilId() != 1) {
        $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuarioLogado->getId());
    }else{
        $cCertificado->add(CertificadoPeer::LOCAL_ID, $usuarioLogado->getLocalId());
    }
    $cCertificado->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO,  date('Y')."-".date('m')."-".date("01").$hora_ini, Criteria::GREATER_EQUAL);
    $cCertificado->addAnd(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO,  date('Y')."-".date('m')."-".getLastDayOfMonth(date('m'), date('Y')).$hora_fim, Criteria::LESS_EQUAL);
    $vendasBloqueadas = CertificadoPeer::doSelect($cCertificado);

    foreach($vendasBloqueadas as $vendasBloqueada){
        $vendasBloqueadaTotal += ($vendasBloqueada->getProduto()->getPreco())-($vendasBloqueada->getDesconto());
    }

    $nomeBox0 = 'Vendas N&atilde;o Autorizadas';
	$nomeBox1 = 'Vendas do dia';
	$nomeBox2 = 'Realizadas/Mes';
	$nomeBox3 = 'Aberto/Mes';
	$nomeBox4 = 'Tickest Suporte';

    //CONSULTA DO FATURAMENTO PARA O GRAFICO NO PAINEL
    $sql = 'select DATE_FORMAT(cd.data_confirmacao_pagamento, "%d/%m/%Y") as DATA, sum(p.preco) as TOTAL';
    $sql .=' from certificado cd , produto p';
    $sql .= ' where cd.produto_id = p.id and';
    $sql .= ' (cd.data_confirmacao_pagamento >= "'.date('Y').'-'.date('m').'-'.date("03").$hora_ini.'" and';
    $sql .= ' cd.data_confirmacao_pagamento <= "'.date('Y') .'-'. date('m') .'-'. getLastDayOfMonth(date('m'), date('Y')).' 23:59:59" ) and ';
    $sql .= ' cd.usuario_id ='.$usuarioLogado->getId();
    $sql .= ' group by DATE_FORMAT(cd.data_confirmacao_pagamento, "%d/%m/%Y")';

    $con = Propel::getConnection();
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $meuFaturamento = $stmt->fetchAll();

    $arrayDia = array();
    foreach($meuFaturamento as $porDia){
        $dia = explode("/",$porDia['DATA']);
        if($porDia['TOTAL'] !=0)
            $arrayDia[(int)$dia[0]] = (int)$porDia['TOTAL'];
    }

    $mesAnterior = date('m')-1;

    //CONSULTA DO FATURAMENTO
    $sql = 'select DATE_FORMAT(cd.data_confirmacao_pagamento, "%d/%m/%Y") as DATA, sum(p.preco) as TOTAL';
    $sql .=' from certificado cd , produto p';
    $sql .= ' where cd.produto_id = p.id and';
    $sql .= ' (cd.data_confirmacao_pagamento >= "'.date('Y').'-'.$mesAnterior.'-'.date("03").$hora_ini.'" and';
    $sql .= ' cd.data_confirmacao_pagamento <= "'.date('Y') .'-'.$mesAnterior.'-'. getLastDayOfMonth(date('m'), date('Y')).' 23:59:59" ) and ';
    $sql .= ' cd.usuario_id ='.$usuarioLogado->getId();
    $sql .= ' group by DATE_FORMAT(cd.data_confirmacao_pagamento, "%d/%m/%Y")';
    $con = Propel::getConnection();
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $meuFaturamentoMes = $stmt->fetchAll();

    $arrayMesPassado = array();
    foreach($meuFaturamentoMes as $porDia){
        $dia = explode("/",$porDia['DATA']);
        if($porDia['TOTAL'] !=0)
            $arrayMesPassado[(int)$dia[0]] = (int)$porDia['TOTAL'];
    }
}
//FIM CONSULTA SETOR DE VENDAS

?>
<? include 'header.php'; ?>
<body >

    <div id="wrapper">

        <? include "inc/menu.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Autoridade de Registro</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

				<? if( ($usuarioLogado->getSetorId() == 3) ){ // SETOR FINANACEIRO ?>
                        <!-- PAINEL DE CONTAS A PAGAR -->
                        <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> CONTAS A PAGAR</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <td>COD</td>
                                                        <td>DATA</td>
                                                        <td>DESCRI&Ccedil;&Atilde;O</td>
                                                        <td>VL. DOC.</td>
                                                        <td>VL. DESCONTO</td>
                                                        <td>VL. RESTANTE</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  <?
														$totalValorDocumentos = 0;
														$totalValorRestante = 0;
														if ($cPagar)
														foreach ($cPagar as $key=>$conta) {
															$totalValorDocumentos += $conta->getValorDocumento();
															$totalValorRestante += $conta->getValorRestante();
															$dataVencimento = mktime(0,0,0, $conta->getVencimento('m'), $conta->getVencimento('d'), $conta->getVencimento('Y'));
															$dataAtual = mktime(0,0,0, date('m'), date('d'), date('Y'));
															$diasAtraso = round(((($dataVencimento - $dataAtual)/60)/60)/24);
													?>
                                                    <tr>
                                                        <td><?=str_pad($conta->getId(), 4, '0', STR_PAD_LEFT);?></td>
                                                        <td><?=$conta->getDataDocumento('d/m/Y');?></td>
                                                        <td><?=$conta->getDescricao();?></td>
                                                        <td><?='R$ '.number_format($conta->getValorDocumento(), 2, ',', '.');?></td>
                                                        <td><? if ($conta->getDesconto()) echo formataMoeda($conta->getDesconto());  else echo '---';?></td>
                                                        <td><?='R$ '.number_format($conta->getValorRestante() - $conta->getDesconto(), 2, ',', '.');?></td>
                                                    </tr>
                                                 <? }?>
                                                 	<tr >
                                                        <td colspan="4">&nbsp;</td>
                                                        <td align="right" class="totais">TOTAL</td>
                                                        <td><?='R$ '.number_format($totalValorDocumentos, 2, ',', '.');?></td>
                                  					</tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--<div class="text-right">
                                            <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
  				<? } ?>
                <!-- FIM POINEL CONTAS A PAGAR FIANACEIRO -->

                <? if( ($usuarioLogado->getSetorId() == 5 ) ) { // SETOR VENDAS
                    include "telas/telaHomeVendas.php";
                 }elseif( ($usuarioLogado->getSetorId() == 7 ) || ($usuarioLogado->getPerfilId() == 78 ) ) { // SETOR DIRETORIA
                    include "telas/telaHomeDiretoria.php";
                }?>



            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->


<?php
require_once 'modais/home/modalHomeListarCertificados.php';
require_once 'modais/modalLoading.php';
?>
</body>
<? include 'inc/script.php'?>
</html>

