<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/loader_off.php";

$result = file_get_contents('php://input');

$debug = '
{
    "protocolo": "1005224383",
    "evento": "Verificação",
    "dtHoraEvento": "2018-04-19T17:17:43.511Z", 
    "responsavelEvento": "FULANO DE SOUZA:12345678910", 
    "acao": "Aprovado",
    "motivoRecusa": "motivo da revogação",
    "dtAcao": "2018-04-20T17:17:43.511Z",
    "dtAberturaProtocolo": "2018-04-20T17:25:43.511Z",
    "nomeAutoridadeRegistro": "AR TESTE",
    "cnpjAutoridadeRegistro": "71815904000174",
    "razaoSocialPosto": "AR FUTURA",
    "apelidoPosto": "AR FUTURA (INSTALAÇÃO TÉCNICA)"
}';

$result = $debug;

$retorno = json_decode($result);


$arrEventos = array(1=>'Verificação', 68=>'Validação', 69=>'Emissão', 70=>'Cancelamento', 71=>'Revogação');
if (in_array($retorno->evento, $arrEventos)) {
    $cProtocolo = new Criteria();
    $cProtocolo->add(CertificadoPeer::PROTOCOLO, $retorno->protocolo);
    $certificado = CertificadoPeer::doSelectOne($cProtocolo);

    if ($certificado) {

        $certificado->setDataValidacao(date('Y-m-d H:i:s'));
        $certificado->save();

        $certSit = new CertificadoSituacao();
        $certSit->setCertificadoId($certificado->getId());
        //INSERI UM USUÁRIO NO SISTEMA CHAMADO SAFE2PAY QUE IRÁ GERAR UMA SITUÇÃO DE RETORNO
        $certSit->setUsuarioId(868);

        if ($retorno->evento == 'Verificação'){

            switch  ($retorno->acao) {
                case 'Aprovado' :
                    $certSit->setSituacaoId(65);
                    $certSit->setComentario('AVP - Certificado Aprovado - ACI: '. $retorno->responsavelEvento . '. Data Aprovação: ' . $retorno->dtHoraEvento);
                    break;
                case 'Cancelado' :
                    $certSit->setSituacaoId(66);
                    $certSit->setComentario('Certificado Cancelado - ACI: '. $retorno->responsavelEvento . '. Data cancelamento: ' . $retorno->dtHoraEvento);
                    break;
                case 'Revogado':
                    $certSit->setSituacaoId(67);
                    $certSit->setComentario('Certificado Revogado - ACI: '. $retorno->responsavelEvento . '. Motivo da recusa: '. $retorno->motivoRecusa . '. Data Revogação: ' . $retorno->dtHoraEvento);
                    break;
            }
        } else {
            $certSit->setSituacaoId(  array_search($retorno->evento, $arrEventos)  );
            $certSit->setComentario('Certificado Revogado - ACI: '. $retorno->responsavelEvento);
        }

        $certSit->setData(date("Y-m-d H:i:s",mtime()));

        $certSit->save();

    }
}


?>