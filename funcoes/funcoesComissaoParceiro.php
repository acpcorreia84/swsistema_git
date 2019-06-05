<?
require_once $_SERVER['DOCUMENT_ROOT'] . "/loader_off.php";

$funcao = $_REQUEST['funcao'];
$parceiro_id = $_REQUEST['parceiro_id'];
$dtInicio = $_REQUEST['dtInicio'];
$dtFim = $_REQUEST['dtFim'];


if ($funcao == 'carregarParceiro'){

    $operadorId = $_REQUEST['usuario_id'];
    carregarParceiro($parceiro_id,$dtInicio,$dtFim,$operadorId);
}
if ($funcao =='detalharFaturamento'){
    detalharFaturamento($parceiro_id,$dtInicio,$dtFim,$operadorId);
}

function carregarParceiro($parceiro_id,$dtInicio,$dtFim,$operadorId){
    try{
        $parceiro = ParceiroPeer::retrieveByPK($parceiro_id);
        $operador = UsuarioPeer::retrieveByPK($operadorId);
        $cParceiroUsuario = new Criteria();
        $cParceiroUsuario->add(ParceiroUsuarioPeer::PARCEIRO_ID, $parceiro_id);
        $parceirosUsuarios = ParceiroUsuarioPeer::doSelect($cParceiroUsuario);


        $aIdParceiroUsuario= array();
        $contadorDeParceiroUsuario = 0;
        foreach ($parceirosUsuarios as $parceiroUsuario) {
            $aIdParceiroUsuario[$contadorDeParceiroUsuario] .= $parceiroUsuario->getUsuarioId();
            $contadorDeParceiroUsuario ++;
        }
        $cUsuarios = new Criteria();
        $cUsuarios->add(UsuarioPeer::SITUACAO,0);
        $cUsuarios->add(UsuarioPeer::ID,$aIdParceiroUsuario,Criteria::IN);
        $usuarios = UsuarioPeer::doSelect($cUsuarios);

        $aIdUsuario = '';
        $contadorDeUsuarios = 0;
        foreach ($usuarios as $usuario) {
            $aIdUsuario[$contadorDeUsuarios] .= $usuario->getId();
            $contadorDeUsuarios++;
        }
        $cCertificadoVendido = new Criteria();
        $cCertificadoValidado = new Criteria();
        $cCertificadoVendido->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, 0, Criteria::GREATER_THAN);
        $cCertificadoVendido->add(CertificadoPeer::APAGADO, 0, Criteria::EQUAL);
        if (($dtInicio) && ($dtFim)) {
            $dataDe = explode('/', $dtInicio);
            $dataAte = explode('/', $dtFim);
            $cCertificadoVendido->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, $dataDe[2] . '/' . $dataDe[1] . '/' . ($dataDe[0]) . $hora_ini, Criteria::GREATER_EQUAL);
            $cCertificadoVendido->addAnd(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, $dataAte[2] . '/' . $dataAte[1] . '/' . $dataAte[0] . $hora_fim, Criteria::LESS_EQUAL);
             $cCertificadoVendido->addAnd(CertificadoPeer::USUARIO_ID, $aIdUsuario, Criteria::IN);
        }
        $cCertificadoValidado->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, 0, Criteria::GREATER_THAN);
        $cCertificadoValidado->add(CertificadoPeer::APAGADO, 0, Criteria::EQUAL);
        if (($dtInicio) && ($dtFim)) {
            $dataDe = explode('/', $dtInicio);
            $dataAte = explode('/', $dtFim);
            $cCertificadoValidado->add(CertificadoPeer::CONFIRMACAO_VALIDACAO, ('1,2,3'),Criteria::IN);
            $cCertificadoValidado->add(CertificadoPeer::DATA_VALIDACAO, $dataDe[2] . '/' . $dataDe[1] . '/' . ($dataDe[0]) . $hora_ini, Criteria::GREATER_EQUAL);
            $cCertificadoValidado->addAnd(CertificadoPeer::DATA_VALIDACAO, $dataAte[2] . '/' . $dataAte[1] . '/' . $dataAte[0] . $hora_fim, Criteria::LESS_EQUAL);
            $cCertificadoValidado->addAnd(CertificadoPeer::FUNCIONARIO_VALIDOU_ID, $aIdUsuario,Criteria::IN);
        }

        $certificadosVendidos = CertificadoPeer::doSelect($cCertificadoVendido);
        $certificadosValidados = CertificadoPeer::doSelect($cCertificadoValidado);

        if (isset($certificadosValidados) && $certificadosValidados!=null){
            $vendidosValidados = array();
            $validadosNPagos = array();
            $contadorDeValidados = 0;
            $contadorDeVendidosValidados = 0;
            $contadorDeValidadosnPagos = 0;
            $fatVendidosValidados= 0;
            $fatValidados =0;

            foreach($certificadosValidados as $certificadoValidado){
                $preco = $certificadoValidado->getProduto()->getPreco() - $certificadoValidado->getDesconto();
                $fatValidados= $fatValidados + $preco;
                $contadorDeVendidos = 0;
                if ($certificadoValidado->getDataConfirmacaoPagamento() == Null || $certificadoValidado->getDataConfirmacaoPagamento() == '0000-00-00 00:00:00'){
                    $validadosNPagos[$contadorDeValidadosnPagos] = clone $certificadoValidado;
                    unset($certificadosValidados[$contadorDeValidados]);
                    $contadorDeValidadosnPagos++;
                }
                foreach ($certificadosVendidos as $certificadoVendido){
                    if($certificadoValidado == $certificadoVendido){
                        $vendidosValidados[$contadorDeVendidosValidados] = clone $certificadoVendido;
                        unset($certificadosVendidos[$contadorDeVendidos+$contadorDeVendidosValidados]);
                        unset($certificadosValidados[$contadorDeValidados]);
                        $preco = $certificadoValidado->getProduto()->getPreco() - $certificadoValidado->getDesconto();
                        $fatVendidosValidados = $fatVendidosValidados + $preco;
                        $contadorDeVendidosValidados++;
                    }
                    $contadorDeVendidos++;
                }

                $contadorDeValidados++;
            }
        }
        $fatVendido = 0;
        foreach ($certificadosVendidos as $certificadoVendido){
            $preco = $certificadoVendido->getProduto()->getPreco() - $certificadoVendido->getDesconto();
            $fatVendido += $preco;
        }
        $fatValNPag = 0;
        if($validadosNPagos) {
            foreach ($validadosNPagos as $validadoNPago) {
                $preco = $validadoNPago->getProduto()->getPreco() - $validadoNPago->getDesconto();
                $fatValNPag += $preco;
            }
        }
        $funcao = $_REQUEST['funcao'];
        if ($funcao == 'carregarParceiro') {
            $nomeOperador = $operador->getNome();
            $nomeParceiro = $parceiro->getNome();
            $qtdVenVal = count($vendidosValidados);
            $qtdVendido = count($certificadosVendidos);
            $qtdValidado = count($certificadosValidados);


            $qtdValNPg = count($validadosNPagos);
            $comissaoVenVal = $fatVendidosValidados * 0.22;
            $comissaoVendido = $fatVendido * 0.07;
            $comissaoValidado = $fatValidados * 0.15;

            $comissaoTotal = $comissaoValidado + $comissaoVendido + $comissaoVenVal;
            $totalVendas = $fatVendido + $fatValidados + $fatVendidosValidados;
            $qtdCertificado = $qtdValidado + $qtdVendido + $qtdVenVal + $qtdValNPg;

            $resultado = $parceiro_id . ';' . $nomeParceiro . ';' . $dtInicio . ';' . $dtFim . ';' . $qtdVenVal . ';' . formataMoeda($fatVendidosValidados) . ';' . formataMoeda($comissaoVenVal) . ';' . $qtdVendido . ';';
            $resultado .= formataMoeda($fatVendido) . ';' . formataMoeda($comissaoVendido) . ';' . $qtdValidado . ';' . formataMoeda($fatValidados) . ';' . formataMoeda($comissaoValidado) . ';' . $qtdValNPg . ';' . formataMoeda($fatValNPag) . ';';
            $resultado .= formataMoeda($comissaoTotal) . ';' . formataMoeda($totalVendas) . ';' . $qtdCertificado . ';' . $nomeOperador;
            echo $resultado;
        }else{
            $acao = $_REQUEST['acao'];
            if ($acao){
                switch ($acao){
                    case 'vendidosEValidados':
                        return $vendidosValidados;
                        break;
                    case 'vendidos':
                        return $certificadosVendidos;
                        break;
                    case 'validados':
                        return $certificadosValidados;
                        break;
                    case 'validadosNaoPago':
                        return $validadosNPagos;
                        break;
                }
            }
        }

    }catch(Exception $e){
        echo $e->getMessage();
    }
}


function detalharFaturamento($parceiro_id,$dtInicio,$dtFim){
    try{

        $certificados = carregarParceiro($parceiro_id,$dtInicio,$dtFim,$operadorId);
        $tabela = '';

        $parceiro = ParceiroPeer::retrieveByPK($parceiro_id);
        foreach ($certificados as $certificado){

            //TEM QUE ESTAR DENTRO DE UM FOREACH COM AS PARA CERTIFADOS

            $produto_id = $certificado->getClienteId();
            /*if ($produto_id == 38||39||74||75||94||95){
                $msg = "Cliente Antigo";
            }else{
                $msg = "Cliente Novo";
            }*/
            if ($certificado->getCliente()->getRazaoSocial() != '')
                $cliente = $certificado->getCliente()->getRazaoSocial();
            else
                $cliente = $certificado->getCliente()->getNomeFantasia();

            $tabela .= '<td>'.$certificado->getId().'</td>';
            //$tabela .= '<td>'.$msg.'</td>';
            $tabela .= '<td>'.$certificado->getDataConfirmacaoPagamento('d/m/Y').'</td>';
            $tabela .= '<td>'.$certificado->getProtocolo().'</td>';
            $tabela .= '<td>'.$certificado->getCliente()->getId() . ' - '.removeEspeciais($cliente).'</td>';
            $tabela .= '<td>'.$certificado->getDataCompra('d/m/Y').'</td>';
            $tabela .= '<td>'.removeEspeciais($certificado->getProduto()->getNome()).'</td>';
            $tabela .= '<td>'.$certificado->getUsuarioId().'-'.removeEspeciais($certificado->getUsuario()->getNome()).'</td>';
            if($certificado->getUsuarioValidouId()) {
                $agr = UsuarioPeer::retrieveByPK(removeEspeciais($certificado->getUsuarioValidouId()));
                if($agr->getNome())
                    $agr = $agr->getId().'-'.$agr->getNome();
                else
                    $agr = "----";
            }else{
                $agr = "----";
            }
            $tabela .= '<td>'.$agr.'</td>';
            $tabela .= '<td>'.removeEspeciais($certificado->getLocal()->getNome()).'</td>';

            $cSit = new Criteria();
            $cSit->addDescendingOrderByColumn(CertificadoSituacaoPeer::ID);
            $situacoes = $certificado->getCertificadoSituacaos($cSit);
            if($certificado->getConfirmacaoValidacao() <> 0){
                if($certificado->getConfirmacaoValidacao() == 1)
                    $titulo = 'APROVADO';
                elseif($certificado->getConfirmacaoValidacao() == 2)
                    $titulo = 'PENDENTE_APROVAÇÃO';
                elseif($certificado->getConfirmacaoValidacao() == 3)
                    $titulo = 'RENOVAÇÃO';
                elseif($certificado->getConfirmacaoValidacao() == 4)
                    $titulo = 'REVOGADO';
                else
                    $titulo = 'SEM STATUS';

                if($certificado->getConfirmacaoValidacao() == 1)
                    $situacaoCert = '<span class="totais_menor">VALIDOU ('.$certificado->getDataValidacao('d/m/Y').') <i class="fa fa-flag" style="color:#096" title="'.$titulo.'" ></i></span>';
                elseif($certificado->getConfirmacaoValidacao() == 4)
                    $situacaoCert = '<span class="totais_menor">REVOGADO<i class="fa fa-flag" style="color:#f00" title="'.$titulo.'" ></i></span>';
                elseif( ($certificado->getConfirmacaoValidacao() == 2 ) || ($certificado->getConfirmacaoValidacao() == 3 ))
                    $situacaoCert = '<span class="totais_menor">VALIDOU ('.$certificado->getDataValidacao('d/m/Y').') <i class="fa fa-flag" style="color:#FF0" title="'.$titulo.'" ></i></span>';
                else
                    $situacaoCert = '<span class="totais_menor">PENDENTE<i class="fa fa-flag" style="color:#FF0" title="'.$titulo.'" ></i></span>';
            }	else {
                //QUANDO CONFIRMAÇÃO VALIDAÇÃO FOR IGUAL A 0 ENTRA NESSE ELSE
                // E PERGUNTA AO ARRAY SE SITUAÇÃO IGAL A INFORMAÇÃO DA VALIDAÇÃO DO AGR
                if($situacoes[0]->getSituacaoId() == 6)
                    $situacaoCert = '<span class="totais_menor">VALIDOU ('.$certificado->getDataValidacao('d/m/Y').') <i class="fa fa-flag" style="color:BLUE" title="PENDENTE NA SAFEWEB" ></i></span>';
                else
                    $situacaoCert = $situacoes[0]->getSituacao()->getNome();
            }

            $tabela .= '<td>'.$situacaoCert.'</td>';
            $tabela .= '<td>'.formataMoeda(($certificado->getProduto()->getPreco())-($certificado->getDesconto())).'</td>';
            $tabela .= '</tr>';
        }
        $tabela .='</tr>';
        $tabela .= '</table>';

        echo $tabela.';'.removeEspeciais($parceiro->getNome());

    }catch (Exception $e){
        echo $e->getMessage();

    }
}

?>