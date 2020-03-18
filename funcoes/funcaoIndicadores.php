<?php
/**
 * Created by PhpStorm.
 * User: Antonio Carlos
 * Date: 20/11/2019
 * Time: 12:24
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

$funcao = $_POST['funcao'];

if($funcao == 'carregar_detalhe_indicadores_usuario') {carregarDetalheIndicadoresUsuario();}

function carregarDetalheIndicadoresUsuario() {
    try {
        $mesesAno = array(1=>'Janeiro', 2=>'Fevereiro', 3=>'Março', 4=>'Abril', 5=>'Maio', 6=>'Junho', 7=>'Julho', 8=>'Agosto', 9=>'Setembro', 10=>'Outubro', 11=>'Novembro', 12=>'Dezembro');
        $mesAnterior = new DateTime(date('Y') . '-' . (date('m')-1) . '-01 00:00:00');
        $cCertificado = new Criteria();

        $cCertificado->add(CertificadoPeer::USUARIO_ID, $_POST['idUsuario']);

        $cDataCompra = $cCertificado->getNewCriterion(CertificadoPeer::DATA_COMPRA, $mesAnterior->format('Y') . '-' . $mesAnterior->format('m') . '-01 00:00:00', Criteria::GREATER_EQUAL);
        $cDataCompra2 = $cCertificado->getNewCriterion(CertificadoPeer::DATA_COMPRA, $mesAnterior->format('Y') . '-' . $mesAnterior->format('m') . '-' .  getLastDayOfMonth(date('m'), date('Y')) . ' 23:59:59', Criteria::LESS_EQUAL);
        $cDataCompra->addAnd($cDataCompra2);

        $cDataPagamento = $cCertificado->getNewCriterion(CertificadoPeer::DATA_COMPRA, $mesAnterior->format('Y') . '-' . $mesAnterior->format('m')  . '-01 00:00:00', Criteria::GREATER_EQUAL);
        $cDataPagamento2 = $cCertificado->getNewCriterion(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, $mesAnterior->format('Y') . '-' . $mesAnterior->format('m') . '-' .  getLastDayOfMonth(date('m'), date('Y')) . ' 23:59:59' , Criteria::LESS_EQUAL);
        $cDataPagamento->addAnd($cDataPagamento2);


        $cDataCompra->addOr($cDataPagamento);

        $cCertificado->add($cDataCompra);

        $certificados = CertificadoPeer::doSelect($cCertificado);
        $arrCertificados = array();
        $qtd = 0;
        $faturamentoTotal = 0.0;
        $renovacoesTotal = 0.0;
        foreach ($certificados as $certificado ) {
            if ($certificado->getDataConfirmacaoPagamento()) {
                if ($certificado->getCertificadoRenovado())
                    $renovacoesTotal += $certificado->getProduto()->getPreco() - $certificado->getDesconto();
                $faturamentoTotal += $certificado->getProduto()->getPreco() - $certificado->getDesconto();
            }

        }

        $informacoes = '
            <table id="example" class="display" style="width:100%" width="100%" border="1px solid black">
                            <thead>
                            <tr>
                                <th></th>
            
                                <th>Faturamento Total</th>
                                <th>Renova&ccedil;&atilde;o</th>
                            </tr>
                            </thead>
                            <tbody>
            
            
                            <tr>
            
                                <td>'.$mesesAno[$mesAnterior->format('m')].'</td>
                                <td>'.formataMoeda($faturamentoTotal).'</td>
                                <td>'.formataMoeda($renovacoesTotal).'</td>
                            </tr>
            
            
                            </tbody>
                           
                        </table>
            ';

        echo json_encode(array('mensagem'=>'Ok', 'dados'=>$informacoes));
    } catch (Exception $e) {
        var_dump($e);
    }
}

