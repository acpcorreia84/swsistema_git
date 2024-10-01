<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/loader_off.php";

$result = file_get_contents('php://input');

$retorno = json_decode($result);


$arrEventos = array(1=>'Verificação', 68=>'Validação', 69=>'Emissão', 70=>'Cancelamento', 71=>'Revogação');
if (in_array($retorno->evento, $arrEventos)) {
    $cProtocolo = new Criteria();
    $cProtocolo->add(CertificadoPeer::PROTOCOLO, $retorno->protocolo);
    $certificado = CertificadoPeer::doSelectOne($cProtocolo);

    if ($certificado) {

        $certSit = new CertificadoSituacao();
        $certSit->setCertificadoId($certificado->getId());
        //INSERI UM USUÁRIO NO SISTEMA CHAMADO SAFE2PAY QUE IRÁ GERAR UMA SITUÇÃO DE RETORNO
        $certSit->setUsuarioId(1039);
        $usuarioAvp = '';

        if ($retorno->evento == 'Verificação'){

            switch  ($retorno->acao) {
                case 'Aprovado' :
                    $certSit->setSituacaoId(65);
                    $certSit->setComentario('ACI - Certificado Aprovado - AGENTE: '. $retorno->responsavelEvento . '. Data aprovacao: ' . $retorno->dtHoraEvento);
                    $certificado->setConfirmacaoValidacao(1);
                    break;
                case 'Cancelado' :
                    $certSit->setSituacaoId(66);
                    $certSit->setComentario('Certificado Cancelado - AGENTE: '. $retorno->responsavelEvento . '. Data cancelamento: ' . $retorno->dtHoraEvento);
                    break;
                case 'Revogado':
                    $certSit->setSituacaoId(67);
                    $certSit->setComentario('Certificado Revogado - AGENTE: '. $retorno->responsavelEvento . '. Motivo da recusa: '. $retorno->motivoRecusa . '. Data Revogacao: ' . $retorno->dtHoraEvento);
                    $certificado->setConfirmacaoValidacao(4);
                    break;
            }
        } else {
            $certSit->setSituacaoId(  array_search($retorno->evento, $arrEventos)  );

            if ($retorno->evento == 'Emissão' ) {
                $certificado->setDataInicioValidade($retorno->inicioValidade);
                $certificado->setDataFimValidade($retorno->fimValidade);
                $certificado->setConfirmacaoValidacao(1);
            }
            if ($retorno->evento == 'Validação' ) {
                $cUsuario = new Criteria();
                $cpfAvpAux = explode(':', $retorno->responsavelEvento );
                $cUsuario->add(UsuarioPeer::CPF, formatarCPF_CNPJ($cpfAvpAux[1]) );
                $cUsuario->add(UsuarioPeer::SITUACAO, 0 );
                $usuarioAvp = UsuarioPeer::doSelectOne($cUsuario);

                $certificado->setDataValidacao(date('Y-m-d H:i:s'));

                if ($usuarioAvp)
                    $certificado->setUsuarioValidouId($usuarioAvp->getId());
            }

            $certSit->setComentario('Certificado: ' . $certificado->getId() .' - Protocolo:' . $certificado->getProtocolo() . ' - '. $retorno->evento .' - ' . $retorno->responsavelEvento. ' Data: ' . $retorno->dtHoraEvento);
        }

        $certSit->setData(date('Y-m-d H:i:s'));

        $certificado->save();
        $certSit->save();


    }

}
http_response_code(200);
echo json_encode(array());


?>