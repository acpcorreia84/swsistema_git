<?php
date_default_timezone_set('America/Belem');
require_once $_SERVER['DOCUMENT_ROOT'].'/loader.php';
//$certificado_id = $_REQUEST['certificado_id'];
$funcao = $_POST['funcao'];
CONST HORA_INI = ' 00:00:00';
CONST HORA_FIM = ' 23:59:59';


if($funcao == 'atualizarGraficoDiretoria') { atualizarGraficoDiretoria(); }
if($funcao == 'atualizarDadosFaturamento') { atualizarDadosFaturamento(); }
if($funcao == 'carregaSelectVendedores') { carregaSelectVendedores(); }
if($funcao == 'atualizaDadosFaturamentoVendedores') { atualizaDadosFaturamentoVendedores(); }
if($funcao == 'atualizaFaturamentoAnualLocais') { atualizaFaturamentoAnualLocais(); }
if($funcao == 'carregar_grafico_renovacoes') { carregarGraficoRenovacoes(); }
if($funcao == 'carregar_lista_certificados_renovados') { carregarListaCertificados(); }
if($funcao == 'carregar_grafico_pedidos') { carregarGraficosPedidos(); }
if($funcao == 'carregar_grafico_pedidos_contadores') { carregarGraficoPedidosContador(); }



//FUNCAO AJAX PARA MUDAR O GRAFICO DA HOME DE ACORDO COM OS FILTROS SELECIONADOS
function atualizarGraficoDiretoria() {

    if ($_POST['dataDe'])
        $dataDe = explode('/',$_POST['dataDe']);
    if ($_POST['dataAte'])
        $dataAte = explode('/',$_POST['dataAte']);

    //echo "<script>console.log('datade: $dataDe[0] '+' $dataDe[1] '+' $dataDe[2]')</script>";
    //echo "<script>console.log('dataAte: $dataAte[0] '+' $dataAte[1] '+' $dataAte[2]')</script>";
    //echo "<script>$dataDe</script>";

    //CONSULTA DO FATURAMENTO PARA O GRAFICO NO PAINEL
    $sql = 'select DATE_FORMAT(cd.data_confirmacao_pagamento, "%d/%m/%Y") as DATA, sum(p.preco) as TOTAL';
    $sql .=' from certificado cd , produto p';
    $sql .= ' where cd.produto_id = p.id and';
    if (!isset($dataDe)) {
        $sql .= ' (cd.data_confirmacao_pagamento >= "' . date('Y') . '-' . date('m') . '-' . date("01") . HORA_INI . '" and';

    }
    else {
        $sql .= ' (cd.data_confirmacao_pagamento >= "'.trim($dataDe[2]).'-'.trim($dataDe[1]).'-'.trim($dataDe[0]).HORA_INI.'" and';
        //echo "<script>console.log('entrou aqui222');</script>";
    }

    if (!isset($dataAte))
        $sql .= ' cd.data_confirmacao_pagamento <= "'.date('Y') .'-'. date('m') .'-'. getLastDayOfMonth(date('m'), date('Y')).' 23:59:59" ) ';
    else
        $sql .= ' cd.data_confirmacao_pagamento <= "'.trim($dataAte[2]) .'-'. trim($dataAte[1])  .'-'. trim($dataAte[0]) .' 23:59:59" ) ';

    $sql .= ' group by DATE_FORMAT(cd.data_confirmacao_pagamento, "%d/%m/%Y")';

    //echo "<script>console.log('$sql')</script>";

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

    if (isset($dataDe)) {
        if ($dataDe[1] == 1) { //se o mes escolhido foi janeiro, atualizar pra dezembro e diminui um ano
            $mesAnterior = $dataDe[1] - 1;
            $dataDe[2] = $dataDe[2] - 1;
        } else
            $mesAnterior = $dataDe[1] - 1;
    }
    else {
        if (date('m') == 1) { //se o mes escolhido foi janeiro, atualizar pra dezembro e diminui um ano
            $mesAnterior = date('m')-1;
            $dataDe['Y'] = $dataDe['Y'] - 1;
        } else
            $mesAnterior = date('m') - 1;

    }
    //CONSULTA DO FATURAMENTO MÊS ANTERIOR
    $sql = 'select DATE_FORMAT(cd.data_confirmacao_pagamento, "%d/%m/%Y") as DATA, sum(p.preco) as TOTAL';
    $sql .=' from certificado cd , produto p';
    $sql .= ' where cd.produto_id = p.id and';

    if (!isset($dataDe)) {
        $sql .= ' (cd.data_confirmacao_pagamento >= "' . date('Y') . '-' . $mesAnterior . '-01' . HORA_INI . '" and';
//        echo "<script>console.log('entrou aqui')</script>";
    }
    else
        $sql .= ' (cd.data_confirmacao_pagamento >= "'.trim($dataDe[2]).'-'.trim($mesAnterior).'-'.trim($dataDe[0]).HORA_INI.'" and';


    if (!isset($dataAte))
        $sql .= ' cd.data_confirmacao_pagamento <= "'.date('Y') .'-'. $mesAnterior .'-'. getLastDayOfMonth(date('m'), date('Y')).' 23:59:59" ) ';
    else
        $sql .= ' cd.data_confirmacao_pagamento <= "'.trim($dataAte[2]) .'-'. trim($mesAnterior)  .'-'. trim($dataAte[0]) .' 23:59:59" ) ';

    $sql .= ' group by DATE_FORMAT(cd.data_confirmacao_pagamento, "%d/%m/%Y")';

//    echo "<script>console.log('$sql')</script>";

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


    $varGrafico = "<!-- GRAFIO DONOUT DE PRODUTO -->";
    $varGrafico .= '<script type="text/javascript">var chart;';

    $varGrafico .= '    google.charts.load("current", {packages:["corechart"]});';
    $varGrafico .= '    google.charts.setOnLoadCallback(drawChart);';
    $varGrafico .= '    function drawChart() {';
    $varGrafico .= '        var data = google.visualization.arrayToDataTable([';
    $varGrafico .= '            ["Dia", "Vendas Mes Passado" , "Vendas"],';
    $varGrafico .= "['dia 01',"; if($arrayMesPassado[1]) $varGrafico .= $arrayMesPassado[1].","; else $varGrafico .= "0,"; if($arrayDia[1]) $varGrafico .=  $arrayDia[1]."],"; else $varGrafico .= "0],";
    $varGrafico .= "['dia 02',"; if($arrayMesPassado[2]) $varGrafico .= $arrayMesPassado[2].","; else $varGrafico .= "0,"; if($arrayDia[2]) $varGrafico .=  $arrayDia[2]."],"; else $varGrafico .= "0],";
    $varGrafico .= "['dia 03',"; if($arrayMesPassado[3]) $varGrafico .= $arrayMesPassado[3].","; else $varGrafico .= "0,"; if($arrayDia[3]) $varGrafico .=  $arrayDia[3]."],"; else $varGrafico .= "0],";
    $varGrafico .= "['dia 04',"; if($arrayMesPassado[4]) $varGrafico .= $arrayMesPassado[4].","; else $varGrafico .= "0,"; if($arrayDia[4]) $varGrafico .=  $arrayDia[4]."],"; else $varGrafico .= "0],";
    $varGrafico .= "['dia 05',"; if($arrayMesPassado[5]) $varGrafico .= $arrayMesPassado[5].","; else $varGrafico .= "0,"; if($arrayDia[5]) $varGrafico .=  $arrayDia[5]."],"; else $varGrafico .= "0],";
    $varGrafico .= "['dia 06',"; if($arrayMesPassado[6]) $varGrafico .= $arrayMesPassado[6].","; else $varGrafico .= "0,"; if($arrayDia[6]) $varGrafico .=  $arrayDia[6]."],"; else $varGrafico .= "0],";
    $varGrafico .= "['dia 07',"; if($arrayMesPassado[7]) $varGrafico .= $arrayMesPassado[7].","; else $varGrafico .= "0,"; if($arrayDia[7]) $varGrafico .=  $arrayDia[7]."],"; else $varGrafico .= "0],";
    $varGrafico .= "['dia 08',"; if($arrayMesPassado[8]) $varGrafico .= $arrayMesPassado[8].","; else $varGrafico .= "0,"; if($arrayDia[8]) $varGrafico .=  $arrayDia[8]."],"; else $varGrafico .= "0],";
    $varGrafico .= "['dia 09',"; if($arrayMesPassado[9]) $varGrafico .= $arrayMesPassado[9].","; else $varGrafico .= "0,"; if($arrayDia[9]) $varGrafico .=  $arrayDia[9]."],"; else $varGrafico .= "0],";
    $varGrafico .= "['dia 10',"; if($arrayMesPassado[10]) $varGrafico .= $arrayMesPassado[10].","; else $varGrafico .= "0,"; if($arrayDia[10]) $varGrafico .=  $arrayDia[10]."],"; else $varGrafico .= "0],";
    $varGrafico .= "['dia 11',"; if($arrayMesPassado[11]) $varGrafico .= $arrayMesPassado[11].","; else $varGrafico .= "0,"; if($arrayDia[11]) $varGrafico .=  $arrayDia[11]."],"; else $varGrafico .= "0],";
    $varGrafico .= "['dia 12',"; if($arrayMesPassado[12]) $varGrafico .= $arrayMesPassado[12].","; else $varGrafico .= "0,"; if($arrayDia[12]) $varGrafico .=  $arrayDia[12]."],"; else $varGrafico .= "0],";
    $varGrafico .= "['dia 13',"; if($arrayMesPassado[13]) $varGrafico .= $arrayMesPassado[13].","; else $varGrafico .= "0,"; if($arrayDia[13]) $varGrafico .=  $arrayDia[13]."],"; else $varGrafico .= "0],";
    $varGrafico .= "['dia 14',"; if($arrayMesPassado[14]) $varGrafico .= $arrayMesPassado[14].","; else $varGrafico .= "0,"; if($arrayDia[14]) $varGrafico .=  $arrayDia[14]."],"; else $varGrafico .= "0],";
    $varGrafico .= "['dia 15',"; if($arrayMesPassado[15]) $varGrafico .= $arrayMesPassado[15].","; else $varGrafico .= "0,"; if($arrayDia[15]) $varGrafico .=  $arrayDia[15]."],"; else $varGrafico .= "0],";
    $varGrafico .= "['dia 16',"; if($arrayMesPassado[16]) $varGrafico .= $arrayMesPassado[16].","; else $varGrafico .= "0,"; if($arrayDia[16]) $varGrafico .=  $arrayDia[16]."],"; else $varGrafico .= "0],";
    $varGrafico .= "['dia 17',"; if($arrayMesPassado[17]) $varGrafico .= $arrayMesPassado[17].","; else $varGrafico .= "0,"; if($arrayDia[17]) $varGrafico .=  $arrayDia[17]."],"; else $varGrafico .= "0],";
    $varGrafico .= "['dia 18',"; if($arrayMesPassado[18]) $varGrafico .= $arrayMesPassado[18].","; else $varGrafico .= "0,"; if($arrayDia[18]) $varGrafico .=  $arrayDia[18]."],"; else $varGrafico .= "0],";
    $varGrafico .= "['dia 19',"; if($arrayMesPassado[19]) $varGrafico .= $arrayMesPassado[19].","; else $varGrafico .= "0,"; if($arrayDia[19]) $varGrafico .=  $arrayDia[19]."],"; else $varGrafico .= "0],";
    $varGrafico .= "['dia 20',"; if($arrayMesPassado[20]) $varGrafico .= $arrayMesPassado[20].","; else $varGrafico .= "0,"; if($arrayDia[20]) $varGrafico .=  $arrayDia[20]."],"; else $varGrafico .= "0],";
    $varGrafico .= "['dia 21',"; if($arrayMesPassado[21]) $varGrafico .= $arrayMesPassado[21].","; else $varGrafico .= "0,"; if($arrayDia[21]) $varGrafico .=  $arrayDia[21]."],"; else $varGrafico .= "0],";
    $varGrafico .= "['dia 22',"; if($arrayMesPassado[22]) $varGrafico .= $arrayMesPassado[22].","; else $varGrafico .= "0,"; if($arrayDia[22]) $varGrafico .=  $arrayDia[22]."],"; else $varGrafico .= "0],";
    $varGrafico .= "['dia 23',"; if($arrayMesPassado[23]) $varGrafico .= $arrayMesPassado[23].","; else $varGrafico .= "0,"; if($arrayDia[23]) $varGrafico .=  $arrayDia[23]."],"; else $varGrafico .= "0],";
    $varGrafico .= "['dia 24',"; if($arrayMesPassado[24]) $varGrafico .= $arrayMesPassado[24].","; else $varGrafico .= "0,"; if($arrayDia[24]) $varGrafico .=  $arrayDia[24]."],"; else $varGrafico .= "0],";
    $varGrafico .= "['dia 25',"; if($arrayMesPassado[25]) $varGrafico .= $arrayMesPassado[25].","; else $varGrafico .= "0,"; if($arrayDia[25]) $varGrafico .=  $arrayDia[25]."],"; else $varGrafico .= "0],";
    $varGrafico .= "['dia 26',"; if($arrayMesPassado[26]) $varGrafico .= $arrayMesPassado[26].","; else $varGrafico .= "0,"; if($arrayDia[26]) $varGrafico .=  $arrayDia[26]."],"; else $varGrafico .= "0],";
    $varGrafico .= "['dia 27',"; if($arrayMesPassado[27]) $varGrafico .= $arrayMesPassado[27].","; else $varGrafico .= "0,"; if($arrayDia[27]) $varGrafico .=  $arrayDia[27]."],"; else $varGrafico .= "0],";
    $varGrafico .= "['dia 28',"; if($arrayMesPassado[28]) $varGrafico .= $arrayMesPassado[28].","; else $varGrafico .= "0,"; if($arrayDia[28]) $varGrafico .=  $arrayDia[28]."],"; else $varGrafico .= "0],";
    $varGrafico .= "['dia 29',"; if($arrayMesPassado[29]) $varGrafico .= $arrayMesPassado[29].","; else $varGrafico .= "0,"; if($arrayDia[29]) $varGrafico .=  $arrayDia[29]."],"; else $varGrafico .= "0],";
    $varGrafico .= "['dia 30',"; if($arrayMesPassado[30]) $varGrafico .= $arrayMesPassado[30].","; else $varGrafico .= "0,"; if($arrayDia[30]) $varGrafico .=  $arrayDia[30]."],"; else $varGrafico .= "0],";
    $varGrafico .= "['dia 31',"; if($arrayMesPassado[31]) $varGrafico .= $arrayMesPassado[31].","; else $varGrafico .= "0,"; if($arrayDia[31]) $varGrafico .=  $arrayDia[31]."],"; else $varGrafico .= "0]";

    $varGrafico .= "]);";

    $varGrafico .= "var options = {";
    $varGrafico .= '    curveType: "function",';
    $varGrafico .= '    legend: { position: "bottom" },';
    $varGrafico .= '};';
    $varGrafico .= "chart = new google.visualization.AreaChart(document.getElementById('curvechart'));";
    $varGrafico .= 'chart.draw(data, options);';
    $varGrafico .= "}";
    $varGrafico .= "</script>";
    $varGrafico .= "<!-- FIM DONOUT DE PRODUTO -->";
    echo $varGrafico."&0";


}

//ATUALIZA DADDOS DE FATURAMENTO
function atualizarDadosFaturamento(){

    if ($_POST['dataDe'])
        $dataDe = explode('/',$_POST['dataDe']);
    if ($_POST['dataAte'])
        $dataAte = explode('/',$_POST['dataAte']);

    /*echo "<script>console.log('datade: $dataDe[0] '+' $dataDe[1] '+' $dataDe[2]')</script>";
    echo "<script>console.log('dataAte: $dataAte[0] '+' $dataAte[1] '+' $dataAte[2]')</script>";
    echo "<script>console.log('reset: datade: ".date('Y')." '+' ".date('m')." '+' 01 HORA_INI')</script>";
    echo "<script>console.log('reset: dataAte: ".date('Y')." '+' ".date('m')." '+' ".getLastDayOfMonth(date('m'), date('Y'))." .HORA_FIM')</script>";
*/
    //CONSULTA TOTAL DE FATURAMENTO
    $cCertificado = new Criteria();
    $cCertificado->add(CertificadoPeer::APAGADO, 0);
    if (!isset($dataDe))
        $cCertificado->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO,  date('Y')."-".date('m')."-01".HORA_INI, Criteria::GREATER_EQUAL);
    else
        $cCertificado->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO,  trim($dataDe[2])."-". trim($dataDe[1])."-".trim($dataDe[0]).HORA_INI, Criteria::GREATER_EQUAL);

    if (!isset($dataAte))
        $cCertificado->addAnd(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, date('Y') . '-' . date('m') . '-' . getLastDayOfMonth(date('m'), date('Y')) .HORA_FIM, Criteria::LESS_EQUAL);
    else
        $cCertificado->addAnd(CertificadoPeer::DATA_COMPRA, trim($dataAte[2]) . '-' . trim($dataAte[1]) . '-' . trim($dataAte[0]) .HORA_FIM, Criteria::LESS_EQUAL);

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
    if (!isset($dataDe))
        $cCertificado->add(CertificadoPeer::DATA_COMPRA,  date('Y')."-".date('m')."-01".HORA_INI, Criteria::GREATER_EQUAL);
    else
        $cCertificado->add(CertificadoPeer::DATA_COMPRA,  trim($dataDe[2])."-".trim($dataDe[1])."-".trim($dataDe[0]).HORA_INI, Criteria::GREATER_EQUAL);

    if (!isset($dataAte))
        $cCertificado->addAnd(CertificadoPeer::DATA_COMPRA, date('Y') . '-' . date('m') . '-' . getLastDayOfMonth(date('m'), date('Y')) .HORA_FIM, Criteria::LESS_EQUAL);
    else
        $cCertificado->addAnd(CertificadoPeer::DATA_COMPRA, trim($dataAte[2]) . '-' . trim($dataAte[1]) . '-' . trim($dataAte[0]) .HORA_FIM, Criteria::LESS_EQUAL);

    $cCertificado->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, null, Criteria::ISNULL);
    $pedidosCertificadosMes = CertificadoPeer::doSelect($cCertificado);

    $somaCertificadosAbertos = 0;
    foreach ($pedidosCertificadosMes as $pedidoCertificado) {
        $somaCertificadosAbertos += ($pedidoCertificado->getProduto()->getPreco()) - ($pedidoCertificado->getDesconto());
    }
    //echo "<script>console.log('".formataMoeda($somaCertificadosNaoAutorizados+$somaCertificadosAutorizados)."-".formataMoeda($somaCertificadosDia)."-".formataMoeda($somaCertificadosAbertos)."');</script>";
    echo "&OK&".formataMoeda($somaCertificadosNaoAutorizados+$somaCertificadosAutorizados)."&".formataMoeda($somaCertificadosDia)."&".formataMoeda($somaCertificadosAbertos);

}

function carregaSelectVendedores () {
    if ($_POST['local_id']){
        if ($_POST['local_id'])
            $local = $_POST['local_id'];

        //consulta todos os vendedores para o filtro do gráfico
        $cVendedores = new Criteria();
        if (isset($local))
            $cVendedores->add(UsuarioPeer::LOCAL_ID, $local);
        $cVendedores->add(UsuarioPeer::SITUACAO, 0);
        $cVendedores->add(SetorPeer::NOME, 'VENDAS');
        $cVendedores->addOr(SetorPeer::NOME, 'SUPERVISÃO');
        $cVendedores->addOr(SetorPeer::NOME, 'PARCEIRO');
        $cVendedores->addAscendingOrderByColumn(UsuarioPeer::NOME);
        $vendedoresProprios = UsuarioPeer::doSelectJoinSetor($cVendedores);

        $selectVendedores = '<select name="edVendedor" id="edVendedor" class="col-lg-3" >';
        $selectVendedores .= '<option value="" selected>Selecione o vendedor</option>';

        //VARIAVEL USADA PARA INSERIR O NOME E CODIGO DOS VENDEDORES PARA UTILIZACAO NO GRAFICO DE FATURAMENTO
        $vendedoresHidden = '';

        foreach ($vendedoresProprios as $vendedor) {
            $vendedoresHidden .= $vendedor->getId() .':'. utf8_encode($vendedor->getNome()) . '|';
            $selectVendedores .= '<option value="'.$vendedor->getId().'">';
            $selectVendedores .= $vendedor->getNome();
            $selectVendedores .= '</option>';
        }
        $selectVendedores .=  '</select>';

        $btnAtualiza = '<button onclick="atualizaDadosFaturamentoVendedores(\'atualizaDadosFaturamentoVendedores\', this);">Atualizar Grafico</button>';
        //echo "<script>console.log('".$selectVendedores."');</script>";

        echo "&".$selectVendedores."&".$vendedoresHidden . '&'.$btnAtualiza;
    }
    else "&";
}

function atualizaDadosFaturamentoVendedores() {
    if ($_POST['vendedores'])
        $vendedores = explode('|',$_POST['vendedores']);

    $cCdVendedor = new Criteria();

    //TIVE QUE FAZER UM DO WHILE PARA MONTAR O CRITERIA PRIMEIRO SEM O AND E OS DEMAIS COM
    $auxVendedor = explode(':',$vendedores[0]);
    $cCdVendedor->add(CertificadoPeer::USUARIO_ID, $auxVendedor[0]);

    $i = 1;
    while ($i < count($vendedores)-1)  {
        $auxVendedor = explode(':',$vendedores[$i]);
        //ESCOLHIDO O VENDEDOR PASSEMOS
        $cCdVendedor->addOr(CertificadoPeer::USUARIO_ID, $auxVendedor[0]);
        $i++;
    }

    //SE ESTIVERMOS NO PRIMEIRO SEMESTRE OU NO SEGUNDO SEMESTRE ESCOLHA O ENTRE DATAS DEVIDO

    if (date('m')<7) {
        $cCdVendedor->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, date('Y')."-01-01".HORA_INI, Criteria::GREATER_EQUAL);
        $cCdVendedor->addAnd(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, date('Y') . '-06-' . getLastDayOfMonth('06', date('Y')) .HORA_FIM, Criteria::LESS_EQUAL);
    }
    else {
        $cCdVendedor->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, date('Y')."-07-01".HORA_INI, Criteria::GREATER_EQUAL);
        $cCdVendedor->addAnd(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, date('Y') . '-12-' . getLastDayOfMonth('12', date('Y')) .HORA_FIM, Criteria::LESS_EQUAL);
    }
    $cCdVendedor->add(CertificadoPeer::APAGADO, 0);
    $certificados = CertificadoPeer::doSelect($cCdVendedor);
    $arrVenGraf = array();
    foreach ($certificados as $certificado) {
        //A VARIAVEL MES F SERA UTILIZADA PARA BUSCAR O MES DE FATURAMENTO DAQUELE CERTIFICADO E INSERIR NA TABELA
        $mesF = $certificado->getDataConfirmacaoPagamento('m');
        $arrVenGraf[$certificado->getUsuario()->getNome()][intval ($mesF)] += ($certificado->getProduto()->getPreco()-$certificado->getDesconto());
    }


    $graficoVendedores='<!-- INÍCIO DO SCRIPT DE CARREGAMENTO DO GRAFICO DOS VENDEDORES-->';
    $graficoVendedores.='<script type="text/javascript">';

    $graficoVendedores.="    google.charts.load('current', {'packages':['corechart']});";
    $graficoVendedores.="    google.charts.setOnLoadCallback(drawVisualization);";

    $graficoVendedores.='    function drawVisualization() {';
    $graficoVendedores.='        var data = google.visualization.arrayToDataTable([';
    $graficoVendedores.="                ['Vendedor', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],";
    if (date('m')<7)
        $iMes = 1;
    else
        $iMes = 7;

    foreach ($arrVenGraf as $nome=>$faturamentoMes) {
            if ($faturamentoMes[($iMes)]==0) $faturamentoMes[($iMes)] = 0;
            if ($faturamentoMes[($iMes + 1)]==0) $faturamentoMes[($iMes) + 1] = 0;
            if ($faturamentoMes[($iMes + 2)]==0) $faturamentoMes[($iMes) + 2] = 0;
            if ($faturamentoMes[($iMes + 3)]==0) $faturamentoMes[($iMes) + 3] = 0;
            if ($faturamentoMes[($iMes + 4)]==0) $faturamentoMes[($iMes) + 4] = 0;
            if ($faturamentoMes[($iMes + 5)]==0) $faturamentoMes[($iMes) + 5] = 0;

            $graficoVendedores .= "['" . strtoupper(substr($nome,0,strpos($nome," "))) . "'," . $faturamentoMes[($iMes)] . "," . $faturamentoMes[($iMes + 1)] . "," . $faturamentoMes[($iMes + 2)] . "," . $faturamentoMes[($iMes + 3)] . "," . $faturamentoMes[($iMes + 4)] . "," . $faturamentoMes[($iMes + 5)] . "],";
    }
    $graficoVendedores.="]);";

        $graficoVendedores.="var options = {";
        //$graficoVendedores.="title : 'Monthly Coffee Production by Country',";
        $graficoVendedores.="vAxis: {title: 'Vendedores'},";
        $graficoVendedores.="hAxis: {title: 'Faturamento Semestre'},";
        $graficoVendedores.="seriesType: 'bars',";
        $graficoVendedores.="series: {6: {type: 'line'}}";
        $graficoVendedores.="};";

        $graficoVendedores.="var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));";
        $graficoVendedores.="chart.draw(data, options);";

        $graficoVendedores.="}";

        $graficoVendedores.="</script>";
        $graficoVendedores.="<!-- FIM DO GRAFICO DOS VENDEDORES-->";
    echo $graficoVendedores;
}

function atualizaFaturamentoAnualLocais() {

    if (isset($_POST['local']))
        $local_id = $_POST['local'];

    echo $local_id;
    //CONSULTA DO FATURAMENTO ANO ATUAL
    $sql = 'select DATE_FORMAT(cd.data_confirmacao_pagamento, "%m") as MES, sum(p.preco) as TOTAL, sum(cd.desconto) as DESCONTO';
    $sql .=' from (certificado cd join produto p on';
    $sql .= '  cd.produto_id = p.id) join local l on cd.local_id = l.id where ';

    if ($local_id)
        $sql .= ' l.id = '.$local_id . " and ";

    $sql .='  (cd.data_confirmacao_pagamento >= "'.date('Y').'-01-01'.HORA_INI.'" and';
    $sql .= ' cd.data_confirmacao_pagamento <= "'.date('Y') .'-12-31'. HORA_FIM .'")' ;
    $sql .= ' group by DATE_FORMAT(cd.data_confirmacao_pagamento, "%m")';

    $con = Propel::getConnection();
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $faturamentoAnoAtual = $stmt->fetchAll();

    $arrayAnoAtual = array();
    foreach($faturamentoAnoAtual as $dados){
        $arrayAnoAtual[(int)$dados['MES']] = ($dados['TOTAL'])-($dados['DESCONTO']);
    }

    //CONSULTA DO FATURAMENTO ANO ATUAL
    $sql = 'select DATE_FORMAT(cd.data_confirmacao_pagamento, "%m") as MES, sum(p.preco) as TOTAL, sum(cd.desconto) as DESCONTO';
    $sql .=' from (certificado cd join produto p on';
    $sql .= '  cd.produto_id = p.id) join local l on cd.local_id = l.id where ';

    if ($local_id)
        $sql .= ' l.id = '.$local_id . " and ";

    $sql .= ' (cd.data_confirmacao_pagamento >= "'.(date('Y')-1).'-01-01'.HORA_INI.'" and';
    $sql .= ' cd.data_confirmacao_pagamento <= "'.(date('Y')-1) .'-12-31'. HORA_FIM .'")' ;
    $sql .= ' group by DATE_FORMAT(cd.data_confirmacao_pagamento, "%m")';

    $con = Propel::getConnection();
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $faturamentoAnoAnterior = $stmt->fetchAll();

    $arrayAnoAnterior = array();
    foreach($faturamentoAnoAnterior as $dados){
        $arrayAnoAnterior[(int)$dados['MES']] = ($dados['TOTAL'])-($dados['DESCONTO']);
    }

    $meses = array(1 => 'jan',2=>'fev',3 => 'mar',4=>'abr',5 => 'mai',6=>'jun',7 => 'jul',8=>'ago',9 => 'set',10=>'out',11 => 'nov',12=>'dez' );

    $varGrafico = "<!-- GRAFIO DONOUT DE PRODUTO -->";
    $varGrafico .= '<script type="text/javascript"> var chart;';

    $varGrafico .= '    google.charts.load("current", {packages:["corechart"]});';
    $varGrafico .= '    google.charts.setOnLoadCallback(drawChart);';
    $varGrafico .= '    function drawChart() {';
    $varGrafico .= '        var data = google.visualization.arrayToDataTable([';
    $varGrafico .= '            ["Ano Atual ('.date('Y').'", "Vendas Ano Anterior ('.(date('Y')-1).') " , "Ano Atual ('.date('Y').')"],';
    for ($i=1;$i<=12;$i++) {
        $varGrafico .= "['$i-$meses[$i]',"; $varGrafico .= $arrayAnoAnterior[$i].","; $varGrafico .=  floatval($arrayAnoAtual[$i])."],";
    }
    $varGrafico .= "]);";

    $varGrafico .= "var options = {";
    $varGrafico .= '    curveType: "function",';
    $varGrafico .= '    legend: { position: "bottom" },';
    $varGrafico .= '};';
    $varGrafico .= "chart = new google.visualization.AreaChart(document.getElementById('grafico_linha'));";
    $varGrafico .= 'chart.draw(data, options);';
    $varGrafico .= "}";
    $varGrafico .= "</script>";
    $varGrafico .= "<!-- FIM DONOUT DE PRODUTO -->";
    //$varGrafico .="<div id='grafico_linha'></div>";
    //echo "<script>console.log('$varGrafico')</script>";
    //echo $varGrafico."&0";
    echo "&".$varGrafico;

}

function carregarGraficoRenovacoes() {
    try {
        $usuarioLogado = ControleAcesso::getUsuarioLogado();
        /*
         * TODOS OS CERTIFICADOS A VENCER DO MES ATUAL
         * */
        if ($_POST['filtros']['filtroPeriodo']) {
            $filtroData = explode(',', $_POST['filtros']['filtroPeriodo']);
            $dataDe = explode('/', $filtroData[0]);
            $dataAte = explode('/', $filtroData[1]);
            $dataDe = new DateTime($dataDe[2] . '/' . $dataDe[1] . '/' . $dataDe[0] . ' 00:00:00');
            $dataAte = new DateTime($dataAte[2] . '/' . $dataAte[1] . '/' . $dataAte[0] . ' 23:59:59');
        } else {
            $dataDe = new DateTime(date('Y-m-1'));
            $dataAte = new DateTime(date('Y-m-') . getLastDayOfMonth(date('m'), date('Y')));
        }

        $cCertificado = new Criteria();

        /*
        * SE SELECIONOU CONSULTORES FILTRA POR ELES
        * CASO CONTRARIO MOSTRA TODOS VINCULADOS AO LOCAL DO USUARIO
        */
        if ($_POST['filtros']['filtroConsultores']) {
            $cUsuarios = new Criteria();
            foreach ($_POST['filtros']['filtroConsultores'] as $consultoresObj)
                $cUsuarios->addOr(UsuarioPeer::ID, $consultoresObj['id']);
            $usuariosObj = UsuarioPeer::doSelect($cUsuarios);

            $i = 1;
            foreach ($usuariosObj as $usuarioConsultor) {
                if ($i==1) {
                    $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuarioConsultor->getId());
                    $i++;
                }
                else
                    $cCertificado->addOr(CertificadoPeer::USUARIO_ID, $usuarioConsultor->getId());

                /*SE FOR SUPERVISOR ADICIONA USUARIOS POR LOCAIS*/
                /*
                 * SE TIVER LOCAL VINCULADO, ACRESCENTA TODOS
                 * OS USUARIOS VINCULADOS A ESTES LOCAIS
                 * */
                $usuariosLocaisObj = $usuarioConsultor->getUsuariosLocaisUsuario();
                $usuariosLocais = array();

                foreach ($usuariosLocaisObj as $usuario)
                    $usuariosLocais[] = $usuario->getId();

                if ($usuariosLocais) {
                    $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuariosLocais, Criteria::IN);
                }


                /*
                 * SE O USUARIO FOR PARCEIRO, ACRESCENTA TODOS
                 * OS USUARIOS VINCULADOS AO MESMO
                 * */
                $usuariosParceiroObj = $usuarioConsultor->getUsuariosParceiroUsuario();
                $usuariosParceiro = array();

                foreach ($usuariosParceiroObj as $usuario) {
                    $usuariosParceiro[] = $usuario->getId();
                }
                if ($usuariosParceiro) {
                    $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuariosParceiro, Criteria::IN);
                }

            }

        }
        /*
                 * SE NAO ESCOLHEU NENHUM USUARIO E NAO ESCOLHEU NENHUM FILTRO, MOSTRA TODOS OS CERTIFICADOS
                 * PERMITIDOS PARA O USUARIO LOGADO
                 * */
        else {

            /*
             * SE FOR DA DIRETORIA OU DO FINANCEIRO PULA (MOSTRA TODOS)
             * SE NAO FOR DA DIRETORIA E NAO TIVER ESCOLHIDO NENHUM FILTRO DE CAMPO E DE CONSULTORES SO MOSTRA OS CERTIFICADOS
             * DOS USUARIOS DOS PARCEIROS OU CASO SEJA SUPERVISOR DAS AREAS DOS MESMOS
            */
            if ( ( ($usuarioLogado->getPerfilId() != 4) && ($usuarioLogado->getPerfilId()!=11))  ) {
                /*SE FOR SUPERVISOR ADICIONA USUARIOS POR LOCAIS*/
                /*
                 * SE TIVER LOCAL VINCULADO, ACRESCENTA TODOS
                 * OS USUARIOS VINCULADOS A ESTES LOCAIS
                 * */
                $usuariosLocaisObj = $usuarioLogado->getUsuariosLocaisUsuario();
                $usuariosLocais = array();
                $usuariosLocais[] = $usuarioLogado->getId();

                foreach ($usuariosLocaisObj as $usuario)
                    $usuariosLocais[] = $usuario->getId();

                if ($usuariosLocais) {
                    $usuariosLocais[] = $usuarioLogado->getId();
                    $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuariosLocais, Criteria::IN);
                }


                /*
                 * SE O USUARIO FOR PARCEIRO, ACRESCENTA TODOS
                 * OS USUARIOS VINCULADOS AO MESMO
                 * */
                $usuariosParceiroObj = $usuarioLogado->getUsuariosParceiroUsuario();
                $usuariosParceiro = array();


                foreach ($usuariosParceiroObj as $usuario) {
                    $usuariosParceiro[] = $usuario->getId();

                }
                if ($usuariosParceiro) {
                    $usuariosParceiro[] = $usuarioLogado->getId();
                    $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuariosParceiro, Criteria::IN);
                }

                if ((count($usuariosParceiro) == 0) && (count($usuariosLocais) == 0))
                    $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuarioLogado->getId());


            }



        }

        $cCertificado->add(CertificadoPeer::DATA_FIM_VALIDADE, $dataDe->format('Y-m-d') . ' 00:00:00', Criteria::GREATER_EQUAL);
        $cCertificado->addAnd(CertificadoPeer::DATA_FIM_VALIDADE, $dataAte->format('Y-m-d') . ' 23:59:59', Criteria::LESS_EQUAL);
        $certificadosVencendo = CertificadoPeer::doSelectJoinAll($cCertificado);

        $arrDocumentos = array();
        foreach ($certificadosVencendo as $certificado )
            if (array_search($certificado->getCliente()->getCpfCnpj(), $arrDocumentos) === false )
                $arrDocumentos[] = $certificado->getCliente()->getCpfCnpj();

        $cPedidosRenovacao = new Criteria();
        $dataDe->modify('-3 month');
        $cPedidosRenovacao->add(ClientePeer::CPF_CNPJ, $arrDocumentos, Criteria::IN);
        $cPedidosRenovacao->add(CertificadoPeer::DATA_COMPRA, $dataDe->format('Y-m-d') . ' 00:00:00', Criteria::GREATER_EQUAL);
        $cPedidosRenovacao->addAnd(CertificadoPeer::DATA_COMPRA, $dataAte->format('Y-m-d') . ' 23:59:59', Criteria::LESS_EQUAL);
        $cPedidosRenovacao->addJoin(CertificadoPeer::CLIENTE_ID, ClientePeer::ID, Criteria::JOIN);
        $cPedidosRenovacao->addJoin(CertificadoPeer::PRODUTO_ID, ProdutoPeer::ID, Criteria::JOIN);
        $pedidosRenovacao = CertificadoPeer::doSelect($cPedidosRenovacao);

        $arrRenovacao = array();
        $arrRenovacao['vencidos'] = array('quantidade'=>0, 'valores'=>0.0);
        $arrRenovacao['aRenovarSemPedidos'] = array('quantidade'=>0, 'valores'=>0.0);
        $arrRenovacao['aRenovarComPedidosPagos'] = array('quantidade'=>0, 'valores'=>0.0);
        $arrRenovacao['aRenovarComPedidosEmAberto'] = array('quantidade'=>0, 'valores'=>0.0);
        $arrRenovacao['renovados'] = array('quantidade'=>0, 'valores'=>0.0);
        $arrRenovacao['total'] = array('quantidade'=>0, 'valores'=>0.0);


        foreach ($certificadosVencendo as $certificadoVencendo ) {
            /*
             * BUSCA SE O CERTIFICADO QUE ESTA VENCENDO JA FOI FEITO ALGUM PEDIDO NOS ULTIMOS 3 MESES
             * */

            $encontrou = false;
            foreach ($pedidosRenovacao as $pedidoRenovacao) {

                /*
                 * SE ENCONTROU O PEDIDO CONFERE SE ELE E PAGO OU NAO PAGO
                 * */
                if ($certificadoVencendo->getCliente()->getCpfCnpj() == $pedidoRenovacao->getCliente()->getCpfCnpj()) {
                    $encontrou = true;
                    /*
                     * SE O PEDIDO ENCONTRADO PARA AQUELE CD NAO ESTIVER PAGO, CONTA COMO A RENOVAR COM PEDIDO
                     * */
                    if (!$pedidoRenovacao->getDataConfirmacaoPagamento()) {
                        $arrRenovacao['aRenovarComPedidosEmAberto']['valores'] +=  $pedidoRenovacao->getProduto()->getPreco() - $pedidoRenovacao->getDesconto();
                        $arrRenovacao['aRenovarComPedidosEmAberto']['quantidade'] += 1;
                    }
                    /*
                     * SE O PEDIDO ENCONTRADO PARA AQUELE CD NAO TIVER CONFIRMACAO DE VALIDACAO E NAO TIVER DATA DE VALIDACAO, CONTA COMO A RENOVAR COM PEDIDOS PAGOS
                     * */
                    elseif ($pedidoRenovacao->getDataConfirmacaoPagamento() && ($pedidoRenovacao->getConfirmacaoValidacao()==0 && !$pedidoRenovacao->getDataValidacao())) {
                        $arrRenovacao['aRenovarComPedidosPagos']['valores'] +=  $pedidoRenovacao->getProduto()->getPreco() - $pedidoRenovacao->getDesconto();
                        $arrRenovacao['aRenovarComPedidosPagos']['quantidade'] += 1;
                    }
                    /*
                     * SE O PEDIDO ENCONTRADO PARA AQUELE CD ESTIVER CONFIRMADO PAGAMENTO E VALIDADO, CONTA COMO RENOVADO
                     * */
                    elseif ($pedidoRenovacao->getDataConfirmacaoPagamento() && $pedidoRenovacao->getConfirmacaoValidacao() && $pedidoRenovacao->getDataValidacao()) {
                        $arrRenovacao['renovados']['valores'] +=  $pedidoRenovacao->getProduto()->getPreco() - $pedidoRenovacao->getDesconto();
                        $arrRenovacao['renovados']['quantidade'] += 1;
                    }
                }

            }

            /*
            * SE NAO ACHOU PEDIDO PEDIDO PARA UM DETERMINADO CERTIFICADO QUE VAI VENCER
            * */
            if (!$encontrou) {

                /*
                 * SE A DATA DE VALIDADE FOR MENOR QUE A DATA DE HOJE
                 * ESTE CERTIFICADO ESTA VENCIDO
                 * */
                if (new DateTime($certificadoVencendo->getDataFimValidade()) < new DateTime(date('Y-m-d')) ) {
                    $arrRenovacao['vencidos']['valores'] += $certificadoVencendo->getProduto()->getPreco() - $certificadoVencendo->getDesconto();
                    $arrRenovacao['vencidos']['quantidade'] += 1;

                }
                /*
                 * SE A DATA DE VALIDADE FOR MAIOR OU IGUAL A DATA DE HOJE
                 * ESTE CERTIFICADO NAO TEM PEDIDO MAS AINDA ESTA DENTRO DO PRAZO DE VENCIMENTO
                 * */
                else {
                    $arrRenovacao['aRenovarSemPedidos']['valores'] += $certificadoVencendo->getProduto()->getPreco() - $certificadoVencendo->getDesconto();
                    $arrRenovacao['aRenovarSemPedidos']['quantidade'] += 1;

                }
            }


            $arrRenovacao['total']['quantidade'] += 1;
            $arrRenovacao['total']['valores'] += ($certificadoVencendo->getProduto()->getPreco() -  $certificadoVencendo->getDesconto());
        }

        //Inicializando as variáveis
        $table = array();
        $rows = array();

        //Criando as colunas dentro do array
        $table['cols'] = array(
            array('label' => 'tipoRenovacao', 'type' => 'string'),
            array('label' => 'quantidade', 'type' => 'number'),

        );


        $temp = array();
        $temp[] = array('v' => (string) $arrRenovacao['vencidos']['quantidade'] . ' - Vencidos (' .formataMoeda($arrRenovacao['vencidos']['valores']) . ')');
        $temp[] = array('v' => (int) $arrRenovacao['vencidos']['valores']);
        $rows[] = array('c' => $temp);

        $temp = array();
        $temp[] = array('v' => (string) $arrRenovacao['aRenovarSemPedidos']['quantidade'] . ' - A Renovar - Sem Pedido ('. formataMoeda($arrRenovacao['aRenovarSemPedidos']['valores']) . ')');
        $temp[] = array('v' => (int) $arrRenovacao['aRenovarSemPedidos']['valores']);
        $rows[] = array('c' => $temp);

        $temp = array();
        $temp[] = array('v' => (string) $arrRenovacao['aRenovarComPedidosEmAberto']['quantidade'] .' - A Renovar - Com Pedido EM ABERTO (' .formataMoeda($arrRenovacao['aRenovarComPedidosEmAberto']['valores']) . ')');
        $temp[] = array('v' => (int) $arrRenovacao['aRenovarComPedidosEmAberto']['valores']);
        $rows[] = array('c' => $temp);

        $temp = array();
        $temp[] = array('v' => (string) $arrRenovacao['aRenovarComPedidosPagos']['quantidade'] . ' - A Renovar - Com Pedido PAGO (' . formataMoeda($arrRenovacao['aRenovarComPedidosPagos']['valores']) . ')');
        $temp[] = array('v' => (int) $arrRenovacao['aRenovarComPedidosPagos']['valores']);
        $rows[] = array('c' => $temp);

        $temp = array();
        $temp[] = array('v' => (string) $arrRenovacao['renovados']['quantidade'] . ' - Renovado (' .formataMoeda($arrRenovacao['renovados']['valores']) . ')');
        $temp[] = array('v' => (int) $arrRenovacao['renovados']['valores']);
        $rows[] = array('c' => $temp);

        //Adiciona o array auxiliar "$row" como um array dentro da variavel tabela.
        $table['rows'] = $rows;

        echo json_encode(
            array(
                'mensagem'=>'Ok', 'dadosGrafico'=>json_encode($table),
                'totalQuantidadeRenovacoes'=>$arrRenovacao['total']['quantidade'],
                'totalValorRenovacoes'=>formataMoeda($arrRenovacao['total']['valores']),
            )
        );

    } catch (Exception $e ) {
        echo $e;
    }
}

function carregarListaCertificados() {
    try {
        $usuarioLogado = ControleAcesso::getUsuarioLogado();
        /*
         * TODOS OS CERTIFICADOS A VENCER DO MES ATUAL
         * */
        if ($_POST['filtros']['filtroPeriodo']) {
            $filtroData = explode(',', $_POST['filtros']['filtroPeriodo']);
            $dataDe = explode('/', $filtroData[0]);
            $dataAte = explode('/', $filtroData[1]);
            $dataDe = new DateTime($dataDe[2] . '/' . $dataDe[1] . '/' . $dataDe[0] . ' 00:00:00');
            $dataAte = new DateTime($dataAte[2] . '/' . $dataAte[1] . '/' . $dataAte[0] . ' 23:59:59');
        } else {
            $dataDe = new DateTime(date('Y-m-1'));
            $dataAte = new DateTime(date('Y-m-') . getLastDayOfMonth(date('m'), date('Y')));
        }

        $cCertificado = new Criteria();

        /*
        * SE SELECIONOU CONSULTORES FILTRA POR ELES
        * CASO CONTRARIO MOSTRA TODOS VINCULADOS AO LOCAL DO USUARIO
        */
        if ($_POST['filtros']['filtroConsultores']) {
            $cUsuarios = new Criteria();
            foreach ($_POST['filtros']['filtroConsultores'] as $consultoresObj)
                $cUsuarios->addOr(UsuarioPeer::ID, $consultoresObj['id']);
            $usuariosObj = UsuarioPeer::doSelect($cUsuarios);

            $i = 1;
            foreach ($usuariosObj as $usuarioConsultor) {
                if ($i==1) {
                    $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuarioConsultor->getId());
                    $i++;
                }
                else
                    $cCertificado->addOr(CertificadoPeer::USUARIO_ID, $usuarioConsultor->getId());

                /*SE FOR SUPERVISOR ADICIONA USUARIOS POR LOCAIS*/
                /*
                 * SE TIVER LOCAL VINCULADO, ACRESCENTA TODOS
                 * OS USUARIOS VINCULADOS A ESTES LOCAIS
                 * */
                $usuariosLocaisObj = $usuarioConsultor->getUsuariosLocaisUsuario();
                $usuariosLocais = array();

                foreach ($usuariosLocaisObj as $usuario)
                    $usuariosLocais[] = $usuario->getId();

                if ($usuariosLocais) {
                    $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuariosLocais, Criteria::IN);
                }


                /*
                 * SE O USUARIO FOR PARCEIRO, ACRESCENTA TODOS
                 * OS USUARIOS VINCULADOS AO MESMO
                 * */
                $usuariosParceiroObj = $usuarioConsultor->getUsuariosParceiroUsuario();
                $usuariosParceiro = array();

                foreach ($usuariosParceiroObj as $usuario) {
                    $usuariosParceiro[] = $usuario->getId();
                }
                if ($usuariosParceiro) {
                    $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuariosParceiro, Criteria::IN);
                }

            }

        }
        /*
                 * SE NAO ESCOLHEU NENHUM USUARIO E NAO ESCOLHEU NENHUM FILTRO, MOSTRA TODOS OS CERTIFICADOS
                 * PERMITIDOS PARA O USUARIO LOGADO
                 * */
        else {

            /*
             * SE FOR DA DIRETORIA OU DO FINANCEIRO PULA (MOSTRA TODOS)
             * SE NAO FOR DA DIRETORIA E NAO TIVER ESCOLHIDO NENHUM FILTRO DE CAMPO E DE CONSULTORES SO MOSTRA OS CERTIFICADOS
             * DOS USUARIOS DOS PARCEIROS OU CASO SEJA SUPERVISOR DAS AREAS DOS MESMOS
            */
            if ( ( ($usuarioLogado->getPerfilId() != 4) && ($usuarioLogado->getPerfilId()!=11))  ) {
                /*SE FOR SUPERVISOR ADICIONA USUARIOS POR LOCAIS*/
                /*
                 * SE TIVER LOCAL VINCULADO, ACRESCENTA TODOS
                 * OS USUARIOS VINCULADOS A ESTES LOCAIS
                 * */
                $usuariosLocaisObj = $usuarioLogado->getUsuariosLocaisUsuario();
                $usuariosLocais = array();
                $usuariosLocais[] = $usuarioLogado->getId();

                foreach ($usuariosLocaisObj as $usuario)
                    $usuariosLocais[] = $usuario->getId();

                if ($usuariosLocais) {
                    $usuariosLocais[] = $usuarioLogado->getId();
                    $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuariosLocais, Criteria::IN);
                }


                /*
                 * SE O USUARIO FOR PARCEIRO, ACRESCENTA TODOS
                 * OS USUARIOS VINCULADOS AO MESMO
                 * */
                $usuariosParceiroObj = $usuarioLogado->getUsuariosParceiroUsuario();
                $usuariosParceiro = array();


                foreach ($usuariosParceiroObj as $usuario) {
                    $usuariosParceiro[] = $usuario->getId();

                }
                if ($usuariosParceiro) {
                    $usuariosParceiro[] = $usuarioLogado->getId();
                    $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuariosParceiro, Criteria::IN);
                }

                if ((count($usuariosParceiro) == 0) && (count($usuariosLocais) == 0))
                    $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuarioLogado->getId());


            }



        }

        $cCertificado->add(CertificadoPeer::DATA_FIM_VALIDADE, $dataDe->format('Y-m-d') . ' 00:00:00', Criteria::GREATER_EQUAL);
        $cCertificado->addAnd(CertificadoPeer::DATA_FIM_VALIDADE, $dataAte->format('Y-m-d') . ' 23:59:59', Criteria::LESS_EQUAL);
        $certificadosVencendo = CertificadoPeer::doSelectJoinCliente($cCertificado);

        $arrDocumentos = array();
        foreach ($certificadosVencendo as $certificado )
            if (array_search($certificado->getCliente()->getCpfCnpj(), $arrDocumentos) === false )
            $arrDocumentos[] = $certificado->getCliente()->getCpfCnpj();

        /*
         * CONSULTA TODOS OS CERTIFICADOS QUE ESTAO VENVENCENDO NO PERIODO QUE TIVERAM
         * PEDIDOS NOS ULTIMOS 3 MESES
         * */
        $cPedidosRenovacao = new Criteria();
        $dataDe->modify('-3 month');
        $cPedidosRenovacao->add(ClientePeer::CPF_CNPJ, $arrDocumentos, Criteria::IN);
        $cPedidosRenovacao->add(CertificadoPeer::DATA_COMPRA, $dataDe->format('Y-m-d') . '00:00:00', Criteria::GREATER_EQUAL);
        $cPedidosRenovacao->addAnd(CertificadoPeer::DATA_COMPRA, $dataAte->format('Y-m-d') . ' 23:59:59', Criteria::LESS_EQUAL);
        $cPedidosRenovacao->addJoin(CertificadoPeer::CLIENTE_ID, ClientePeer::ID, Criteria::JOIN);
        $cPedidosRenovacao->addJoin(CertificadoPeer::PRODUTO_ID, ProdutoPeer::ID, Criteria::JOIN);
        $pedidosRenovacao = CertificadoPeer::doSelect($cPedidosRenovacao);

        $cdsVencidos = array();
        $cdsARenovarSemPedidos = array();
        $cdsARenovarComPedidosEmAberto = array();
        $cdsARenovarComPedidosPagos = array();
        $cdsRenovados = array();

        $arrRenovacao = array();
        $arrRenovacao['vencidos'] = array('quantidade'=>0, 'valores'=>0.0);
        $arrRenovacao['aRenovarSemPedidos'] = array('quantidade'=>0, 'valores'=>0.0);
        $arrRenovacao['aRenovarComPedidosPagos'] = array('quantidade'=>0, 'valores'=>0.0);
        $arrRenovacao['aRenovarComPedidosEmAberto'] = array('quantidade'=>0, 'valores'=>0.0);
        $arrRenovacao['renovados'] = array('quantidade'=>0, 'valores'=>0.0);
        $arrRenovacao['total'] = array('quantidade'=>0, 'valores'=>0.0);

        foreach ($certificadosVencendo as $certificadoVencendo ) {
            /*
             * BUSCA SE O CERTIFICADO QUE ESTA VENCENDO JA FOI FEITO ALGUM PEDIDO NOS ULTIMOS 3 MESES
             * */

            $encontrou = false;
            foreach ($pedidosRenovacao as $pedidoRenovacao) {
                /*
                 * NAO PERMITE ADICIONAR MAIS DE UM CD FAZENDO ASSIM COM QUE O MESMO SO SEJA SOMADO UMA VEZ
                 * */
                if ($encontrou)
                    break;

                /*CHECA SE ESTA PAGO*/
                if ($pedidoRenovacao->getDataConfirmacaoPagamento()) {
                    $pago = "<i class='fa fa-check' style='color:#096;'></i>";
                } elseif ($pedidoRenovacao->getDataPagamento()) {
                    $pago = "<i class='fa fa-circle' style='color:#096;'></i>";
                } else {
                    $pago = "<i class='fa fa-circle' style='color:#ff9900;'></i>";
                }

                $usuarioAgr = (($certificado->getUsuarioValidouId())?$certificado->getUsuarioValidouId().'-'.utf8_encode($certificado->getUsuarioRelatedByUsuarioValidouId()->getNome()):'---');

                if ($certificado->getConfirmacaoValidacao() == 1)
                    $situacaoValidacao = '<i class="fa fa-flag" aria-hidden="true" style="color:#096;" title="validado em '.$certificado->getDataValidacao('d/m/Y').' Agr: '.$usuarioAgr.'"></i>';
                elseif ($certificado->getConfirmacaoValidacao() == 2)
                    $situacaoValidacao = '<i class="fa fa-flag" aria-hidden="true" style="color:#fff847" title="validado em '.$certificado->getDataValidacao('d/m/Y').' Agr: '.$usuarioAgr. '(pendente)"></i>';
                elseif ($certificado->getConfirmacaoValidacao() == 3)
                    $situacaoValidacao = '<i class="fa fa-flag" aria-hidden="true" style="color:#fff847" title="validado em '.$certificado->getDataValidacao('d/m/Y').' Agr: '.$usuarioAgr.' (renovado)"></i>';
                elseif ($certificado->getConfirmacaoValidacao() == 4)
                    $situacaoValidacao = '<i class="fa fa-flag" aria-hidden="true" style="color:#ac2925" title="revogado em '.$certificado->getDataValidacao('d/m/Y').' Agr: '.$usuarioAgr.'"></i>';
                else
                    $situacaoValidacao = '-';

                if ($pedidoRenovacao->getCliente()->getRazaoSocial())
                    $nomeCliente = $pedidoRenovacao->getCliente()->getRazaoSocial();
                else
                    $nomeCliente = $pedidoRenovacao->getCliente()->getNomeFantasia();

                /*
                 * SE ENCONTROU O PEDIDO CONFERE SE ELE E PAGO OU NAO PAGO
                 * */
                if ($certificadoVencendo->getCliente()->getCpfCnpj() == $pedidoRenovacao->getCliente()->getCpfCnpj()) {
                    $encontrou = true;
                    /*
                     * SE O PEDIDO ENCONTRADO PARA AQUELE CD NAO ESTIVER PAGO, CONTA COMO A RENOVAR COM PEDIDO
                     * */
                    if (!$pedidoRenovacao->getDataConfirmacaoPagamento()) {
                        $arrRenovacao['aRenovarComPedidosEmAberto']['valores'] +=  $pedidoRenovacao->getProduto()->getPreco() - $pedidoRenovacao->getDesconto();
                        $arrRenovacao['aRenovarComPedidosEmAberto']['quantidade'] += 1;

                        $cdsARenovarComPedidosEmAberto[] =
                        array(
                            "Codigo"=>$pedidoRenovacao->getId(),"Pago"=>$pago, "Dt. Pgto"=>$pedidoRenovacao->getDataConfirmacaoPagamento('d/m/Y'),
                            "Cliente"=>utf8_encode($nomeCliente) , "Compra"=>$pedidoRenovacao->getDataCompra('d/m/Y'),
                            "Certificado"=>utf8_encode($pedidoRenovacao->getProduto()->getNome()),
                            "Vendedor"=>utf8_encode(resumir22($pedidoRenovacao->getUsuario()->getNome(), 20)), " " => utf8_encode($situacaoValidacao)

                        );
                    }
                    /*
                     * SE O PEDIDO ENCONTRADO PARA AQUELE CD NAO TIVER CONFIRMACAO DE VALIDACAO E NAO TIVER DATA DE VALIDACAO, CONTA COMO A RENOVAR COM PEDIDOS PAGOS
                     * */
                    elseif ($pedidoRenovacao->getDataConfirmacaoPagamento() && ($pedidoRenovacao->getConfirmacaoValidacao()==0 && !$pedidoRenovacao->getDataValidacao())) {
                        $arrRenovacao['aRenovarComPedidosPagos']['valores'] +=  $pedidoRenovacao->getProduto()->getPreco() - $pedidoRenovacao->getDesconto();
                        $arrRenovacao['aRenovarComPedidosPagos']['quantidade'] += 1;

                        $cdsARenovarComPedidosPagos[] =
                            array(
                                "Codigo"=>$pedidoRenovacao->getId(),"Pago"=>$pago, "Dt. Pgto"=>$pedidoRenovacao->getDataConfirmacaoPagamento('d/m/Y'),
                                "Cliente"=>utf8_encode($nomeCliente) , "Compra"=>$pedidoRenovacao->getDataCompra('d/m/Y'),
                                "Certificado"=>utf8_encode($pedidoRenovacao->getProduto()->getNome()),
                                "Vendedor"=>utf8_encode(resumir22($pedidoRenovacao->getUsuario()->getNome(), 20)), " " => utf8_encode($situacaoValidacao)

                            );
                    }
                    /*
                     * SE O PEDIDO ENCONTRADO PARA AQUELE CD ESTIVER CONFIRMADO PAGAMENTO E VALIDADO, CONTA COMO RENOVADO
                     * */
                    elseif ($pedidoRenovacao->getDataConfirmacaoPagamento() && $pedidoRenovacao->getConfirmacaoValidacao() && $pedidoRenovacao->getDataValidacao()) {
                        $arrRenovacao['renovados']['valores'] +=  $pedidoRenovacao->getProduto()->getPreco() - $pedidoRenovacao->getDesconto();
                        $arrRenovacao['renovados']['quantidade'] += 1;

                        $cdsRenovados[] =
                        array(
                            "Codigo"=>$pedidoRenovacao->getId(),"Pago"=>$pago, "Dt. Pgto"=>$pedidoRenovacao->getDataConfirmacaoPagamento('d/m/Y'),
                            "Cliente"=>utf8_encode($nomeCliente) , "Compra"=>$pedidoRenovacao->getDataCompra('d/m/Y'),
                            "Certificado"=>utf8_encode($pedidoRenovacao->getProduto()->getNome()),
                            "Vendedor"=>utf8_encode(resumir22($pedidoRenovacao->getUsuario()->getNome(), 20)), " " => utf8_encode($situacaoValidacao)

                        );
                    }
                }

            }

            /*
            * SE NAO ACHOU PEDIDO PEDIDO PARA UM DETERMINADO CERTIFICADO QUE VAI VENCER
            * */
            if (!$encontrou) {
                /*CHECA SE ESTA PAGO*/
                if ($certificadoVencendo->getDataConfirmacaoPagamento()) {
                    $pago = "<i class='fa fa-check' style='color:#096;'></i>";
                } elseif ($certificadoVencendo->getDataPagamento()) {
                    $pago = "<i class='fa fa-circle' style='color:#096;'></i>";
                } else {
                    $pago = "<i class='fa fa-circle' style='color:#ff9900;'></i>";
                }

                $usuarioAgr = (($certificadoVencendo->getUsuarioValidouId())?$certificadoVencendo->getUsuarioValidouId().'-'.utf8_encode($certificadoVencendo->getUsuarioRelatedByUsuarioValidouId()->getNome()):'---');

                if ($certificadoVencendo->getConfirmacaoValidacao() == 1)
                    $situacaoValidacao = '<i class="fa fa-flag" aria-hidden="true" style="color:#096;" title="validado em '.$certificadoVencendo->getDataValidacao('d/m/Y').' Agr: '.$usuarioAgr.'"></i>';
                elseif ($certificadoVencendo->getConfirmacaoValidacao() == 2)
                    $situacaoValidacao = '<i class="fa fa-flag" aria-hidden="true" style="color:#fff847" title="validado em '.$certificadoVencendo->getDataValidacao('d/m/Y').' Agr: '.$usuarioAgr. '(pendente)"></i>';
                elseif ($certificadoVencendo->getConfirmacaoValidacao() == 3)
                    $situacaoValidacao = '<i class="fa fa-flag" aria-hidden="true" style="color:#fff847" title="validado em '.$certificadoVencendo->getDataValidacao('d/m/Y').' Agr: '.$usuarioAgr.' (renovado)"></i>';
                elseif ($certificadoVencendo->getConfirmacaoValidacao() == 4)
                    $situacaoValidacao = '<i class="fa fa-flag" aria-hidden="true" style="color:#ac2925" title="revogado em '.$certificadoVencendo->getDataValidacao('d/m/Y').' Agr: '.$usuarioAgr.'"></i>';
                else
                    $situacaoValidacao = '-';

                if ($certificadoVencendo->getCliente()->getRazaoSocial())
                    $nomeCliente = $certificadoVencendo->getCliente()->getRazaoSocial();
                else
                    $nomeCliente = $certificadoVencendo->getCliente()->getNomeFantasia();
                /*
                 * SE A DATA DE VALIDADE FOR MENOR QUE A DATA DE HOJE
                 * ESTE CERTIFICADO ESTA VENCIDO
                 * */
                if (new DateTime($certificadoVencendo->getDataFimValidade()) < new DateTime(date('Y-m-d')) ) {
                    $arrRenovacao['vencidos']['valores'] += $certificadoVencendo->getProduto()->getPreco() - $certificadoVencendo->getDesconto();
                    $arrRenovacao['vencidos']['quantidade'] += 1;

                    $cdsVencidos[] =
                    array(
                        "Codigo"=>$certificadoVencendo->getId(),"Pago"=>$pago, "Dt. Pgto"=>$certificadoVencendo->getDataConfirmacaoPagamento('d/m/Y'),
                        "Cliente"=>utf8_encode($nomeCliente) , "Compra"=>$certificadoVencendo->getDataCompra('d/m/Y'),
                        "Certificado"=>utf8_encode($certificadoVencendo->getProduto()->getNome()),
                        "Vendedor"=>utf8_encode(resumir22($certificadoVencendo->getUsuario()->getNome(), 20)), " " => utf8_encode($situacaoValidacao)

                    );
                }
                /*
                 * SE A DATA DE VALIDADE FOR MAIOR OU IGUAL A DATA DE HOJE
                 * ESTE CERTIFICADO NAO TEM PEDIDO MAS AINDA ESTA DENTRO DO PRAZO DE VENCIMENTO
                 * */
                else {
                    $arrRenovacao['aRenovarSemPedidos']['valores'] += $certificadoVencendo->getProduto()->getPreco() - $certificadoVencendo->getDesconto();
                    $arrRenovacao['aRenovarSemPedidos']['quantidade'] += 1;

                    $cdsARenovarSemPedidos[] =
                    array(
                        "Codigo"=>$certificadoVencendo->getId(),"Pago"=>$pago, "Dt. Pgto"=>$certificadoVencendo->getDataConfirmacaoPagamento('d/m/Y'),
                        "Cliente"=>utf8_encode($nomeCliente) , "Compra"=>$certificadoVencendo->getDataCompra('d/m/Y'),
                        "Certificado"=>utf8_encode($certificadoVencendo->getProduto()->getNome()),
                        "Vendedor"=>utf8_encode(resumir22($certificadoVencendo->getUsuario()->getNome(), 20)), " " => utf8_encode($situacaoValidacao)

                    );
                }
            }

        }

        $colunasListagemCertificados = array(
            array('nome'=>'Codigo'), array('nome'=>'Pago'), array('nome'=>'Dt. Pgto'),
            array('nome'=>'Cliente'), array('nome'=>'Compra'),
            array('nome'=>'Certificado'), array('nome'=>'Vendedor'), array('nome'=>' ')
        );


        $arrRenovacao['vencidos']['valores'] = formataMoeda($arrRenovacao['vencidos']['valores']);
        $arrRenovacao['aRenovarComPedidosEmAberto']['valores'] = formataMoeda($arrRenovacao['aRenovarComPedidosEmAberto']['valores']);
        $arrRenovacao['aRenovarComPedidosPagos']['valores'] = formataMoeda($arrRenovacao['aRenovarComPedidosPagos']['valores']);
        $arrRenovacao['aRenovarSemPedidos']['valores'] = formataMoeda($arrRenovacao['aRenovarSemPedidos']['valores']);
        $arrRenovacao['renovados']['valores'] = formataMoeda($arrRenovacao['renovados']['valores']);


        $listaCertificados = array(
            'quantidadesCertificados'=>json_encode($arrRenovacao),
            'colunas'=>json_encode($colunasListagemCertificados),
            'cdsARenovarComPedidosPagos'=>json_encode($cdsARenovarComPedidosPagos),
            'cdsARenovarComPedidosEmAberto'=>json_encode($cdsARenovarComPedidosEmAberto),
            'cdsARenovarSemPedidos'=>json_encode($cdsARenovarSemPedidos),
            'cdsRenovados'=>json_encode($cdsRenovados),
            'cdsVencidos'=>json_encode($cdsVencidos),
        );


        echo json_encode(
            array(
                'mensagem'=>'Ok',
                'listaCertificados'=>json_encode($listaCertificados)
            )
        );

    } catch (Exception $e ) {
        echo $e;
    }
}


/*
 * CARREGA GRAFICO DE TIPOS DE PEDIDOS
 * FORMAS DE PAGAMENTO
 * PEDIDOS POR CONTADOR
 * */

function carregarGraficosPedidos() {
    try {
        ini_set('memory_limit', '256M');
        set_time_limit(180);

        $usuarioLogado = ControleAcesso::getUsuarioLogado();
        /*
         * TODOS QUE O USUARIO LOGADO PODE ENXEGAR
         * */
        if ($_POST['filtros']['filtroPeriodo']) {
            $filtroData = explode(',', $_POST['filtros']['filtroPeriodo']);
            $dataDe = explode('/', $filtroData[0]);
            $dataAte = explode('/', $filtroData[1]);
            $dataDe = new DateTime($dataDe[2] . '/' . $dataDe[1] . '/' . $dataDe[0] . ' 00:00:00');
            $dataAte = new DateTime($dataAte[2] . '/' . $dataAte[1] . '/' . $dataAte[0] . ' 23:59:59');
        } else {
            $dataDe = new DateTime(date('Y-m-1'));
            $dataAte = new DateTime(date('Y-m-') . getLastDayOfMonth(date('m'), date('Y')));
        }

        $cCertificado = new Criteria();
        $cContadoresUsuario = new Criteria();

        /*
        * SE SELECIONOU CONSULTORES FILTRA POR ELES
        * CASO CONTRARIO MOSTRA TODOS VINCULADOS AO LOCAL DO USUARIO
        */
        if ($_POST['filtros']['filtroConsultores']) {
            $cUsuarios = new Criteria();
            foreach ($_POST['filtros']['filtroConsultores'] as $consultoresObj) {
                $cUsuarios->addOr(UsuarioPeer::ID, $consultoresObj['id']);
            }
            $usuariosObj = UsuarioPeer::doSelect($cUsuarios);

            $i = 1;
            foreach ($usuariosObj as $usuarioConsultor) {
                if ($i==1) {
                    $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuarioConsultor->getId());
                    $cContadoresUsuario->addOr(ContadorPeer::USUARIO_ID, $usuarioConsultor->getId());
                    $i++;
                }
                else {
                    $cCertificado->addOr(CertificadoPeer::USUARIO_ID, $usuarioConsultor->getId());
                    $cContadoresUsuario->addOr(ContadorPeer::USUARIO_ID, $usuarioConsultor->getId());
                }

                /*SE FOR SUPERVISOR ADICIONA USUARIOS POR LOCAIS*/
                /*
                 * SE TIVER LOCAL VINCULADO, ACRESCENTA TODOS
                 * OS USUARIOS VINCULADOS A ESTES LOCAIS
                 * */
                $usuariosLocaisObj = $usuarioConsultor->getUsuariosLocaisUsuario();
                $usuariosLocais = array();

                foreach ($usuariosLocaisObj as $usuario)
                    $usuariosLocais[] = $usuario->getId();

                if ($usuariosLocais) {
                    $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuariosLocais, Criteria::IN);
                    $cContadoresUsuario->add(ContadorPeer::USUARIO_ID, $usuariosLocais, Criteria::IN);
                }


                /*
                 * SE O USUARIO FOR PARCEIRO, ACRESCENTA TODOS
                 * OS USUARIOS VINCULADOS AO MESMO
                 * */
                $usuariosParceiroObj = $usuarioConsultor->getUsuariosParceiroUsuario();
                $usuariosParceiro = array();

                foreach ($usuariosParceiroObj as $usuario) {
                    $usuariosParceiro[] = $usuario->getId();
                }
                if ($usuariosParceiro) {
                    $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuariosParceiro, Criteria::IN);
                    $cContadoresUsuario->add(ContadorPeer::USUARIO_ID, $usuariosParceiro, Criteria::IN);
                }

            }

        }
        /*
        * SE NAO ESCOLHEU NENHUM USUARIO E NAO ESCOLHEU NENHUM FILTRO, MOSTRA TODOS OS CERTIFICADOS
        * PERMITIDOS PARA O USUARIO LOGADO
        * */
        else {

        /*
         * SE FOR DA DIRETORIA OU DO FINANCEIRO PULA (MOSTRA TODOS)
         * SE NAO FOR DA DIRETORIA E NAO TIVER ESCOLHIDO NENHUM FILTRO DE CAMPO E DE CONSULTORES SO MOSTRA OS CERTIFICADOS
         * DOS USUARIOS DOS PARCEIROS OU CASO SEJA SUPERVISOR DAS AREAS DOS MESMOS
        */

            if ( ( ($usuarioLogado->getPerfilId() != 4) && ($usuarioLogado->getPerfilId()!=11))  ) {
                /*SE FOR SUPERVISOR ADICIONA USUARIOS POR LOCAIS*/
                /*
                 * SE TIVER LOCAL VINCULADO, ACRESCENTA TODOS
                 * OS USUARIOS VINCULADOS A ESTES LOCAIS
                 * */
                $usuariosLocaisObj = $usuarioLogado->getUsuariosLocaisUsuario();
                $usuariosLocais = array();
                $usuariosLocais[] = $usuarioLogado->getId();

                foreach ($usuariosLocaisObj as $usuario)
                    $usuariosLocais[] = $usuario->getId();

                if ($usuariosLocais) {
                    $usuariosLocais[] = $usuarioLogado->getId();
                    $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuariosLocais, Criteria::IN);
                    /*
                     * CONTADORES POR USUARIO
                     * */
                    $cContadoresUsuario->add(ContadorPeer::USUARIO_ID, $usuariosLocais, Criteria::IN);

                }



                /*
                 * SE O USUARIO FOR PARCEIRO, ACRESCENTA TODOS
                 * OS USUARIOS VINCULADOS AO MESMO
                 * */
                $usuariosParceiroObj = $usuarioLogado->getUsuariosParceiroUsuario();
                $usuariosParceiro = array();


                foreach ($usuariosParceiroObj as $usuario) {
                    $usuariosParceiro[] = $usuario->getId();

                }
                if ($usuariosParceiro) {
                    $usuariosParceiro[] = $usuarioLogado->getId();
                    $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuariosParceiro, Criteria::IN);
                    $cContadoresUsuario->add(ContadorPeer::USUARIO_ID, $usuariosParceiro, Criteria::IN);
                }

                if ((count($usuariosParceiro) == 0) && (count($usuariosLocais) == 0))
                    $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuarioLogado->getId());


            }



        }


        $cCertificado->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, $dataDe->format('Y-m-d') . ' 00:00:00', Criteria::GREATER_EQUAL);
        $cCertificado->addAnd(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, $dataAte->format('Y-m-d') . ' 23:59:59', Criteria::LESS_EQUAL);

        /*
         * SO CARREGAR GRAFICO DE CONTADORES PARA SUPERVISORES, CONTADORES E PARCEIROS
         * */
        if ($_POST['carregarGraficoContadores']=='sim') {
            $cContadoresUsuario->add(ContadorPeer::SITUACAO, -1, Criteria::NOT_EQUAL);
            $qtdTotalContadoresUsuario = ContadorPeer::doCount($cContadoresUsuario);

        }

        $certificadosUsuario = CertificadoPeer::doSelectJoinAll($cCertificado);

        $arrDocumentos = array();
        foreach ($certificadosUsuario as $certificado ) {
            if (array_search($certificado->getCliente()->getCpfCnpj(), $arrDocumentos) === false )
                $arrDocumentos[] = $certificado->getCliente()->getCpfCnpj();
        }

        /*
         * CONSULTA TODOS OS CERTIFICADOS DO USUARIO NO PERIODO SELECIONADO QUE TEM DATA DE VALIDADE DE 3 ANOS PRA CA
         * OU SEJA, QUE ESTIVER DENTRO DA VALIDADE PARA SABER SE ESTE PEDIDO FOI DE RENOVACAO OU NAO
         * */
        $cPedidosPassados = new Criteria();
        $cPedidosPassados->add(ClientePeer::CPF_CNPJ, $arrDocumentos, Criteria::IN);
        $cPedidosPassados->addDescendingOrderByColumn(CertificadoPeer::DATA_FIM_VALIDADE);
        $pedidosPassados = CertificadoPeer::doSelectJoinCliente($cPedidosPassados);


        /*
         * MONTAGEM DO GRAFICO DE TIPO DE PEDIDOS
         * */

        $arrTipoVendas = array();
        $arrTipoVendas['renovacoes'] = array('quantidade'=>0, 'valores'=>0.0);
        $arrTipoVendas['positivacoes'] = array('quantidade'=>0, 'valores'=>0.0);
        $arrTipoVendas['ativacoes'] = array('quantidade'=>0, 'valores'=>0.0);
        $arrTipoVendas['total'] = array('quantidade'=>0, 'valores'=>0.0);


        foreach ($certificadosUsuario as $certificadoUsuario ) {
            /*
             * BUSCA SE O CERTIFICADO QUE ESTA VENCENDO JA FOI FEITO ALGUM PEDIDO NOS ULTIMOS 3 MESES
             * */

            $encontrou = false;
            foreach ($pedidosPassados as $pedidoPassado) {

                /*
                 * SE ENCONTROU O PEDIDO CONFERE SE ELE E PAGO OU NAO PAGO
                 * */
                if (($certificadoUsuario->getCliente()->getCpfCnpj() == $pedidoPassado->getCliente()->getCpfCnpj()) && ($certificadoUsuario->getId() != $pedidoPassado->getId())) {
                    $encontrou = true;
                    /*
                     * SE A DATA DA CONFIRMACAO PAGAMENTO FOR MENOR DO QUE A DATA DO FIM DO VENCIMENTO
                     * É POR QUE O CERTIFICADO FOI RENOVADO
                     * */
                    if ($certificadoUsuario->getDataConfirmacaoPagamento() <= $pedidoPassado->getDataFimValidade()) {
                        $arrTipoVendas['renovacoes']['valores'] +=  $certificadoUsuario->getProduto()->getPreco() - $certificadoUsuario->getDesconto();
                        $arrTipoVendas['renovacoes']['quantidade'] += 1;
                    }
                    /*
                     * SE A DATA DA CONFIRMACAO DO PAGAMENTO FOR MAIOR QUE A DATA DO FIM DO VENCIMENTO
                     * É POR QUE ESTE CERTIFICADO JÁ HOUVE PEDIDO NO PASSADO MAS NÃO FOI RENOVADO
                     * */
                    else  {
                        $arrTipoVendas['positivacoes']['valores'] +=  $certificadoUsuario->getProduto()->getPreco() - $certificadoUsuario->getDesconto();
                        $arrTipoVendas['positivacoes']['quantidade'] += 1;
                    }
                    break;
                }

            }

            /*
            * SE NAO ACHOU PEDIDO PEDIDO PARA UM DETERMINADO CERTIFICADO QUE VAI VENCER
            * */
            if (!$encontrou) {
                $arrTipoVendas['ativacoes']['valores'] +=  $certificadoUsuario->getProduto()->getPreco() - $certificadoUsuario->getDesconto();
                $arrTipoVendas['ativacoes']['quantidade'] += 1;

            }


            $arrTipoVendas['total']['quantidade'] += 1;
            $arrTipoVendas['total']['valores'] += ($certificadoUsuario->getProduto()->getPreco() -  $certificadoUsuario->getDesconto());
        }

        //Inicializando as variáveis
        $graficoTipoVendas = array();
        $rows = array();

        //Criando as colunas dentro do array
        $graficoTipoVendas['cols'] = array(
            array('label' => 'tipoPedido', 'type' => 'string'),
            array('label' => 'quantidade', 'type' => 'number'),

        );


        $temp = array();
        $temp[] = array('v' => (string) $arrTipoVendas['ativacoes']['quantidade'] . ' - Ativações (' .formataMoeda($arrTipoVendas['ativacoes']['valores']) . ')');
        $temp[] = array('v' => (int) $arrTipoVendas['ativacoes']['valores']);
        $rows[] = array('c' => $temp);

        $temp = array();
        $temp[] = array('v' => (string) $arrTipoVendas['positivacoes']['quantidade'] . ' - Positivações (' .formataMoeda($arrTipoVendas['positivacoes']['valores']) . ')');
        $temp[] = array('v' => (int) $arrTipoVendas['positivacoes']['valores']);
        $rows[] = array('c' => $temp);

        $temp = array();
        $temp[] = array('v' => (string) $arrTipoVendas['renovacoes']['quantidade'] . ' - Renovações (' .formataMoeda($arrTipoVendas['renovacoes']['valores']) . ')');
        $temp[] = array('v' => (int) $arrTipoVendas['renovacoes']['valores']);
        $rows[] = array('c' => $temp);

        //Adiciona o array auxiliar "$row" como um array dentro da variavel tabela.
        $graficoTipoVendas['rows'] = $rows;

        /*
         * FIM DA MONTAGEM DO GRAFICO DE TIPO DE PEDIDOS
         * */


        /*
         * MONTA GRAFICO DE FORMA DE PAGAMENTO EM CIMA DOS PEDIDOS
         * */
        /*
         * GUARDA NESTE ARRAY OS CONTADORES QUE TEM PEDIDOS NO SISTEMA PARA UTILIZAR NO GRAFICO DE PEDIDOS DE CONTADORES
         * */
        $arrIdsContadoresComPedidos = array();
        $arrFormaPagamento = array();
        $arrFormaPagamento['boleto'] = array('quantidade'=>0, 'valores'=>0.0);
        $arrFormaPagamento['deposito'] = array('quantidade'=>0, 'valores'=>0.0);
        $arrFormaPagamento['especie'] = array('quantidade'=>0, 'valores'=>0.0);
        $arrFormaPagamento['transferencia'] = array('quantidade'=>0, 'valores'=>0.0);
        $arrFormaPagamento['cheque'] = array('quantidade'=>0, 'valores'=>0.0);
        $arrFormaPagamento['cartao'] = array('quantidade'=>0, 'valores'=>0.0);
        $arrFormaPagamento['scusto'] = array('quantidade'=>0, 'valores'=>0.0);


        foreach ($certificadosUsuario as $certificadoUsuario ) {
            if (($certificadoUsuario->getContadorId()) && array_search($certificadoUsuario->getContadorId(), $arrIdsContadoresComPedidos)===false)
                $arrIdsContadoresComPedidos[] = $certificadoUsuario->getContadorId();

            switch ($certificadoUsuario->getFormaPagamentoId()) {
                case 1 : //boleto
                    $arrFormaPagamento['boleto']['valores'] += ($certificadoUsuario->getProduto()->getPreco() -  $certificadoUsuario->getDesconto());
                    $arrFormaPagamento['boleto']['quantidade'] ++;
                    break;
                case 2 : //boleto
                    $arrFormaPagamento['deposito']['valores'] += ($certificadoUsuario->getProduto()->getPreco() -  $certificadoUsuario->getDesconto());
                    $arrFormaPagamento['deposito']['quantidade'] ++;
                    break;
                case 3 : //boleto
                    $arrFormaPagamento['especie']['valores'] += ($certificadoUsuario->getProduto()->getPreco() -  $certificadoUsuario->getDesconto());
                    $arrFormaPagamento['especie']['quantidade'] ++;
                    break;
                case 4 : //boleto
                    $arrFormaPagamento['transferencia']['valores'] += ($certificadoUsuario->getProduto()->getPreco() -  $certificadoUsuario->getDesconto());
                    $arrFormaPagamento['transferencia']['quantidade'] ++;
                    break;
                case 5 : //boleto
                    $arrFormaPagamento['cheque']['valores'] += ($certificadoUsuario->getProduto()->getPreco() -  $certificadoUsuario->getDesconto());
                    $arrFormaPagamento['cheque']['quantidade'] ++;
                    break;
                case 6 : //boleto
                    $arrFormaPagamento['cartao']['valores'] += ($certificadoUsuario->getProduto()->getPreco() -  $certificadoUsuario->getDesconto());
                    $arrFormaPagamento['cartao']['quantidade'] ++;
                    break;
                case 8 : //boleto
                    $arrFormaPagamento['scusto']['valores'] += ($certificadoUsuario->getProduto()->getPreco() -  $certificadoUsuario->getDesconto());
                    $arrFormaPagamento['scusto']['quantidade'] ++;
                    break;

            }

        }

        //Inicializando as variáveis
        $graficoFormas = array();
        $linhas = array();

        //Criando as colunas dentro do array
        $graficoFormas['cols'] = array(
            array('label' => 'tipoPedido', 'type' => 'string'),
            array('label' => 'quantidade', 'type' => 'number'),

        );


        $temp = array();
        $temp[] = array('v' => (string) $arrFormaPagamento['boleto']['quantidade'] . ' - Boletos (' .formataMoeda($arrFormaPagamento['boleto']['valores']) . ')');
        $temp[] = array('v' => (int) $arrFormaPagamento['boleto']['quantidade']);
        $linhas[] = array('c' => $temp);

        $temp = array();
        $temp[] = array('v' => (string) $arrFormaPagamento['deposito']['quantidade'] . ' - Depósitos (' .formataMoeda($arrFormaPagamento['deposito']['valores']) . ')');
        $temp[] = array('v' => (int) $arrFormaPagamento['deposito']['quantidade']);
        $linhas[] = array('c' => $temp);

        $temp = array();
        $temp[] = array('v' => (string) $arrFormaPagamento['especie']['quantidade'] . ' - Espécie (' .formataMoeda($arrFormaPagamento['especie']['valores']) . ')');
        $temp[] = array('v' => (int) $arrFormaPagamento['especie']['quantidade']);
        $linhas[] = array('c' => $temp);

        $temp = array();
        $temp[] = array('v' => (string) $arrFormaPagamento['transferencia']['quantidade'] . ' - Transferência (' .formataMoeda($arrFormaPagamento['transferencia']['valores']) . ')');
        $temp[] = array('v' => (int) $arrFormaPagamento['transferencia']['quantidade']);
        $linhas[] = array('c' => $temp);

        $temp = array();
        $temp[] = array('v' => (string) $arrFormaPagamento['cheque']['quantidade'] . ' - Cheque (' .formataMoeda($arrFormaPagamento['cheque']['valores']) . ')');
        $temp[] = array('v' => (int) $arrFormaPagamento['cheque']['quantidade']);
        $linhas[] = array('c' => $temp);

        $temp = array();
        $temp[] = array('v' => (string) $arrFormaPagamento['cartao']['quantidade'] . ' - Cartão (' .formataMoeda($arrFormaPagamento['cartao']['valores']) . ')');
        $temp[] = array('v' => (int) $arrFormaPagamento['cartao']['quantidade']);
        $linhas[] = array('c' => $temp);

        $temp = array();
        $temp[] = array('v' => (string) $arrFormaPagamento['scusto']['quantidade'] . ' - Sem Custo (' .formataMoeda($arrFormaPagamento['scusto']['valores']) . ')');
        $temp[] = array('v' => (int) $arrFormaPagamento['scusto']['quantidade']);
        $linhas[] = array('c' => $temp);

        //Adiciona o array auxiliar "$row" como um array dentro da variavel tabela.
        $graficoFormas['rows'] = $linhas;

        /*
         * FIM DA MONTAGEM DO GRAFICO DE FORMA DE PAGAMENTOS
         * */



        /*
        * SO CARREGAR GRAFICO DE CONTADORES PARA SUPERVISORES, CONTADORES E PARCEIROS
        * */
        if ($_POST['carregarGraficoContadores']=='sim') {
            /*
             * MONTAGEM GRAFICO DE PEDIDOS DO CONTADOR
             * */
            $arrPedidosContador = array();
            $arrPedidosContador['ativados'] = array('quantidade'=>0);
            $arrPedidosContador['positivados'] = array('quantidade'=>0);
            $arrPedidosContador['sempedidos'] = array('quantidade'=>0);

            $dataDePositivacao = new DateTime();
            $dataDePositivacao->sub(new DateInterval('P3M'));
            $dataAtePositivacao = new DateTime();
            $cCertificadosContadores = new Criteria();
            $cCertificadosContadores->addSelectColumn('contador.ID');
            $cCertificadosContadores->addSelectColumn('count(certificado.ID) as qtdPedidos');
            /*ADICIONA TODOS OS CONTADORES SEM PEDIDOS*/
            $cCertificadosContadores->add(ContadorPeer::ID, $arrIdsContadoresComPedidos, Criteria::IN);
            $cCertificadosContadores->addJoin(CertificadoPeer::CONTADOR_ID, ContadorPeer::ID, Criteria::JOIN);
            $cCertificadosContadores->add(ContadorPeer::ID, $arrIdsContadoresComPedidos, Criteria::IN);
            $cCertificadosContadores->addGroupByColumn(ContadorPeer::ID);
            $stmtCertificadosContadores = ContadorPeer::doSelectStmt($cCertificadosContadores);
            $arrContadoresComPedidosObj = $stmtCertificadosContadores->fetchAll();

            /*
             * PEGA O TOTAL DE CONTADORES E SUBTRAI DA QUANTIDADE DE CONTADORES
             * COM PEDIDOS, SUBTRAI 1 POR QUE O ARRAY COMECA EM ZERO
             * */
            $arrPedidosContador['sempedidos']['quantidade'] = $qtdTotalContadoresUsuario - (count($arrIdsContadoresComPedidos)-1);

            /*
             * CHECA DOS PEDIDOS DOS CONTADORES, QUAIS FORAM ATIVADOS E QUAIS FORAM POSITIVADOS
             * */
            foreach ($arrContadoresComPedidosObj as $contadorComPedido) {
                /*
                 * SE TIVER MAIS DE UM E UM CONTADOR POSITIVADO
                 * */
                if ( $contadorComPedido['qtdPedidos']>1) {
                    $arrPedidosContador['positivados']['quantidade'] += 1;
                }
                /*
                 * SE NAO É UM CONTADOR ATIVADO
                 * */
                elseif ($contadorComPedido['qtdPedidos']==1) {
                    $arrPedidosContador['ativados']['quantidade'] += 1;
                }
            }
        }
        //Inicializando as variáveis
        $graficoContadores = array();
        $linhasContadores = array();

        //Criando as colunas dentro do array
        $graficoContadores['cols'] = array(
            array('label' => 'contadores', 'type' => 'string'),
            array('label' => 'quantidade', 'type' => 'number'),

        );

        $temp = array();
        $temp[] = array('v' => (string) $arrPedidosContador['sempedidos']['quantidade'] . ' - Contadores sem Pedidos ');
        $temp[] = array('v' => (int) $arrPedidosContador['sempedidos']['quantidade']);
        $linhasContadores[] = array('c' => $temp);

        $temp = array();
        $temp[] = array('v' => (string) $arrPedidosContador['ativados']['quantidade'] . ' - Contadores ativados ');
        $temp[] = array('v' => (int) $arrPedidosContador['ativados']['quantidade']);
        $linhasContadores[] = array('c' => $temp);

        $temp = array();
        $temp[] = array('v' => (string) $arrPedidosContador['positivados']['quantidade'] . ' - Contadores positivados ');
        $temp[] = array('v' => (int) $arrPedidosContador['positivados']['quantidade']);
        $linhasContadores[] = array('c' => $temp);


        //Adiciona o array auxiliar "$row" como um array dentro da variavel tabela.
        $graficoContadores['rows'] = $linhasContadores;

        /*
         * FIM DA MONTAGEM DO GRAFICO DE FORMA DE PAGAMENTOS
         * */

        echo json_encode(
            array(
                'mensagem'=>'Ok', 'dadosGrafico'=>json_encode($graficoTipoVendas),
                'totalQuantidadePedidos'=>$arrTipoVendas['total']['quantidade'],
                'totalValorPedidos'=>formataMoeda($arrTipoVendas['total']['valores']),
                'dadosGraficoForma'=>json_encode($graficoFormas),
                'dadosGraficoContadores'=>json_encode($graficoContadores),
                'quantidadeTotalContadores' =>$qtdTotalContadoresUsuario
            )
        );

    } catch (Exception $e ) {
        echo $e;
    }


}


/*
 * CARREGA APENAS GRAFICO DE PEDIDOS
 * DO CONTADOR
 * */

function carregarGraficoPedidosContador() {
    try {
        $usuarioLogado = ControleAcesso::getUsuarioLogado();
        /*
         * TODOS QUE O USUARIO LOGADO PODE ENXEGAR
         * */
        if ($_POST['filtros']['filtroPeriodo']) {
            $filtroData = explode(',', $_POST['filtros']['filtroPeriodo']);
            $dataDe = explode('/', $filtroData[0]);
            $dataAte = explode('/', $filtroData[1]);
            $dataDe = new DateTime($dataDe[2] . '/' . $dataDe[1] . '/' . $dataDe[0] . ' 00:00:00');
            $dataAte = new DateTime($dataAte[2] . '/' . $dataAte[1] . '/' . $dataAte[0] . ' 23:59:59');
        } else {
            $dataDe = new DateTime(date('Y-m-1'));
            $dataAte = new DateTime(date('Y-m-') . getLastDayOfMonth(date('m'), date('Y')));
        }

        $cCertificado = new Criteria();
        $cContadoresUsuario = new Criteria();

        /*
        * SE SELECIONOU CONSULTORES FILTRA POR ELES
        * CASO CONTRARIO MOSTRA TODOS VINCULADOS AO LOCAL DO USUARIO
        */
        if ($_POST['filtros']['filtroConsultores']) {
            $cUsuarios = new Criteria();
            foreach ($_POST['filtros']['filtroConsultores'] as $consultoresObj) {
                $cUsuarios->addOr(UsuarioPeer::ID, $consultoresObj['id']);
            }
            $usuariosObj = UsuarioPeer::doSelect($cUsuarios);

            $i = 1;
            foreach ($usuariosObj as $usuarioConsultor) {
                if ($i==1) {
                    $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuarioConsultor->getId());
                    $cContadoresUsuario->addOr(ContadorPeer::USUARIO_ID, $usuarioConsultor->getId());
                    $i++;
                }
                else {
                    $cCertificado->addOr(CertificadoPeer::USUARIO_ID, $usuarioConsultor->getId());
                    $cContadoresUsuario->addOr(ContadorPeer::USUARIO_ID, $usuarioConsultor->getId());
                }

                /*SE FOR SUPERVISOR ADICIONA USUARIOS POR LOCAIS*/
                /*
                 * SE TIVER LOCAL VINCULADO, ACRESCENTA TODOS
                 * OS USUARIOS VINCULADOS A ESTES LOCAIS
                 * */
                $usuariosLocaisObj = $usuarioConsultor->getUsuariosLocaisUsuario();
                $usuariosLocais = array();

                foreach ($usuariosLocaisObj as $usuario)
                    $usuariosLocais[] = $usuario->getId();

                if ($usuariosLocais) {
                    $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuariosLocais, Criteria::IN);
                    $cContadoresUsuario->add(ContadorPeer::USUARIO_ID, $usuariosLocais, Criteria::IN);
                }


                /*
                 * SE O USUARIO FOR PARCEIRO, ACRESCENTA TODOS
                 * OS USUARIOS VINCULADOS AO MESMO
                 * */
                $usuariosParceiroObj = $usuarioConsultor->getUsuariosParceiroUsuario();
                $usuariosParceiro = array();

                foreach ($usuariosParceiroObj as $usuario) {
                    $usuariosParceiro[] = $usuario->getId();
                }
                if ($usuariosParceiro) {
                    $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuariosParceiro, Criteria::IN);
                    $cContadoresUsuario->add(ContadorPeer::USUARIO_ID, $usuariosParceiro, Criteria::IN);
                }

            }

        }
        /*
        * SE NAO ESCOLHEU NENHUM USUARIO E NAO ESCOLHEU NENHUM FILTRO, MOSTRA TODOS OS CERTIFICADOS
        * PERMITIDOS PARA O USUARIO LOGADO
        * */
        else {

            /*
             * SE FOR DA DIRETORIA OU DO FINANCEIRO PULA (MOSTRA TODOS)
             * SE NAO FOR DA DIRETORIA E NAO TIVER ESCOLHIDO NENHUM FILTRO DE CAMPO E DE CONSULTORES SO MOSTRA OS CERTIFICADOS
             * DOS USUARIOS DOS PARCEIROS OU CASO SEJA SUPERVISOR DAS AREAS DOS MESMOS
            */

            if ( ( ($usuarioLogado->getPerfilId() != 4) && ($usuarioLogado->getPerfilId()!=11))  ) {
                /*SE FOR SUPERVISOR ADICIONA USUARIOS POR LOCAIS*/
                /*
                 * SE TIVER LOCAL VINCULADO, ACRESCENTA TODOS
                 * OS USUARIOS VINCULADOS A ESTES LOCAIS
                 * */
                $usuariosLocaisObj = $usuarioLogado->getUsuariosLocaisUsuario();
                $usuariosLocais = array();
                $usuariosLocais[] = $usuarioLogado->getId();

                foreach ($usuariosLocaisObj as $usuario)
                    $usuariosLocais[] = $usuario->getId();

                if ($usuariosLocais) {
                    $usuariosLocais[] = $usuarioLogado->getId();
                    $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuariosLocais, Criteria::IN);
                    /*
                     * CONTADORES POR USUARIO
                     * */
                    $cContadoresUsuario->add(ContadorPeer::USUARIO_ID, $usuariosLocais, Criteria::IN);

                }



                /*
                 * SE O USUARIO FOR PARCEIRO, ACRESCENTA TODOS
                 * OS USUARIOS VINCULADOS AO MESMO
                 * */
                $usuariosParceiroObj = $usuarioLogado->getUsuariosParceiroUsuario();
                $usuariosParceiro = array();


                foreach ($usuariosParceiroObj as $usuario) {
                    $usuariosParceiro[] = $usuario->getId();

                }
                if ($usuariosParceiro) {
                    $usuariosParceiro[] = $usuarioLogado->getId();
                    $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuariosParceiro, Criteria::IN);
                    $cContadoresUsuario->add(ContadorPeer::USUARIO_ID, $usuariosParceiro, Criteria::IN);
                }

                if ((count($usuariosParceiro) == 0) && (count($usuariosLocais) == 0))
                    $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuarioLogado->getId());


            }



        }


        $cCertificado->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, $dataDe->format('Y-m-d') . ' 00:00:00', Criteria::GREATER_EQUAL);
        $cCertificado->addAnd(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, $dataAte->format('Y-m-d') . ' 23:59:59', Criteria::LESS_EQUAL);

        /*
         * SO CARREGAR GRAFICO DE CONTADORES PARA SUPERVISORES, CONTADORES E PARCEIROS
         * */

        $cContadoresUsuario->add(ContadorPeer::SITUACAO, -1, Criteria::NOT_EQUAL);
        $qtdTotalContadoresUsuario = ContadorPeer::doCount($cContadoresUsuario);

        $cContadoresUsuario->add(ContadorPeer::DATA_CADASTRO, $dataDe->format('Y-m-d') . ' 00:00:00', Criteria::GREATER_EQUAL );
        $cContadoresUsuario->addAnd(ContadorPeer::DATA_CADASTRO, $dataAte->format('Y-m-d') . ' 23:59:59', Criteria::LESS_EQUAL);

        $qtdTotalContadoresUsuarioCadastrado = ContadorPeer::doCount($cContadoresUsuario);

        $certificadosUsuario = CertificadoPeer::doSelectJoinAll($cCertificado);



        /*
         * GUARDA NESTE ARRAY OS CONTADORES QUE TEM PEDIDOS NO SISTEMA PARA UTILIZAR NO GRAFICO DE PEDIDOS DE CONTADORES
         * */
        $arrIdsContadoresComPedidos = array();

        foreach ($certificadosUsuario as $certificadoUsuario ) {
            if (($certificadoUsuario->getContadorId()) && array_search($certificadoUsuario->getContadorId(), $arrIdsContadoresComPedidos)===false)
                $arrIdsContadoresComPedidos[] = $certificadoUsuario->getContadorId();

        }

        /*
         * MONTAGEM GRAFICO DE PEDIDOS DO CONTADOR
         * */
        $arrPedidosContador = array();
        $arrPedidosContador['ativados'] = array('quantidade'=>0);
        $arrPedidosContador['positivados'] = array('quantidade'=>0);
        $arrPedidosContador['sempedidos'] = array('quantidade'=>0);

        $dataDePositivacao = new DateTime();
        $dataDePositivacao->sub(new DateInterval('P3M'));
        $dataAtePositivacao = new DateTime();
        $cCertificadosContadores = new Criteria();
        $cCertificadosContadores->addSelectColumn('contador.ID');
        $cCertificadosContadores->addSelectColumn('count(certificado.ID) as qtdPedidos');
        /*ADICIONA TODOS OS CONTADORES SEM PEDIDOS*/
        $cCertificadosContadores->add(ContadorPeer::ID, $arrIdsContadoresComPedidos, Criteria::IN);
        $cCertificadosContadores->addJoin(CertificadoPeer::CONTADOR_ID, ContadorPeer::ID, Criteria::JOIN);
        $cCertificadosContadores->add(ContadorPeer::ID, $arrIdsContadoresComPedidos, Criteria::IN);
        $cCertificadosContadores->addGroupByColumn(ContadorPeer::ID);
        $stmtCertificadosContadores = ContadorPeer::doSelectStmt($cCertificadosContadores);
        $arrContadoresComPedidosObj = $stmtCertificadosContadores->fetchAll();

        /*
         * PEGA O TOTAL DE CONTADORES E SUBTRAI DA QUANTIDADE DE CONTADORES
         * COM PEDIDOS, SUBTRAI 1 POR QUE O ARRAY COMECA EM ZERO
         * */
        $arrPedidosContador['sempedidos']['quantidade'] = $qtdTotalContadoresUsuario - (count($arrIdsContadoresComPedidos)-1);

        /*
         * CHECA DOS PEDIDOS DOS CONTADORES, QUAIS FORAM ATIVADOS E QUAIS FORAM POSITIVADOS
         * */
        foreach ($arrContadoresComPedidosObj as $contadorComPedido) {
            /*
             * SE TIVER MAIS DE UM E UM CONTADOR POSITIVADO
             * */
            if ( $contadorComPedido['qtdPedidos']>1) {
                $arrPedidosContador['positivados']['quantidade'] += 1;
            }
            /*
             * SE NAO É UM CONTADOR ATIVADO
             * */
            elseif ($contadorComPedido['qtdPedidos']==1) {
                $arrPedidosContador['ativados']['quantidade'] += 1;
            }
        }

        //Inicializando as variáveis
        $graficoContadores = array();
        $linhasContadores = array();

        //Criando as colunas dentro do array
        $graficoContadores['cols'] = array(
            array('label' => 'contadores', 'type' => 'string'),
            array('label' => 'quantidade', 'type' => 'number'),

        );


        $temp = array();
        $temp[] = array('v' => (string) $arrPedidosContador['sempedidos']['quantidade'] . ' - Contadores sem Pedidos ');
        $temp[] = array('v' => (int) $arrPedidosContador['sempedidos']['quantidade']);
        $linhasContadores[] = array('c' => $temp);

        $temp = array();
        $temp[] = array('v' => (string) $arrPedidosContador['ativados']['quantidade'] . ' - Contadores ativados ');
        $temp[] = array('v' => (int) $arrPedidosContador['ativados']['quantidade']);
        $linhasContadores[] = array('c' => $temp);

        $temp = array();
        $temp[] = array('v' => (string) $arrPedidosContador['positivados']['quantidade'] . ' - Contadores positivados ');
        $temp[] = array('v' => (int) $arrPedidosContador['positivados']['quantidade']);
        $linhasContadores[] = array('c' => $temp);


        //Adiciona o array auxiliar "$row" como um array dentro da variavel tabela.
        $graficoContadores['rows'] = $linhasContadores;

        /*
         * FIM DA MONTAGEM DO GRAFICO DE FORMA DE PAGAMENTOS
         * */

        echo json_encode(
            array(
                'mensagem'=>'Ok',
                'dadosGraficoContadores'=>json_encode($graficoContadores),
                'quantidadeTotalContadores' =>$qtdTotalContadoresUsuario,
                'quantidadeTotalContadoresCadastrados'=>$qtdTotalContadoresUsuarioCadastrado
            )
        );

    } catch (Exception $e ) {
        echo $e;
    }


}

?>