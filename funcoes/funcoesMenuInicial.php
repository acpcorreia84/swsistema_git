<?php
/**
 * Created by PhpStorm.
 * User: antoniocorreia
 * Date: 24/01/2017
 * Time: 07:01
 */
function qtdCertificadosContador($contadorId, $dataDe='', $dataAte='') {
    $cCertificados = new Criteria();
    $cCertificados->add(CertificadoPeer::APAGADO, 0);
    if (($dataDe) && ($dataAte)) {
        $dataDe = explode('/',$dataDe);
        $dataAte = explode('/',$dataAte);
        $cCertificados->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, $dataDe[2].'-'.$dataDe[1].'-'.$dataDe[0], Criteria::GREATER_EQUAL);
        $cCertificados->addAnd(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, $dataAte[2].'-'.$dataAte[1].'-'.$dataAte[0], Criteria::LESS_EQUAL);
    }

    $cCertificados->add(CertificadoPeer::CONTADOR_ID, $contadorId);
    $qtdCertificados = CertificadoPeer::doCount($cCertificados);
    return $qtdCertificados;
}


function qtdUsuarios () {
    $cUsuario = new Criteria();
    $cUsuario->add(UsuarioPeer::SITUACAO,0);
    $qtdeUsuario = UsuarioPeer::doCount($cUsuario);
    return $qtdeUsuario;

}

function qtdProspect($usuarioLogado) {
    $cProspect = new Criteria();
    $cProspect->add(ProspectPeer::SITUACAO , 0);
    $cProspect->add(ProspectPeer::USUARIO_ID, $usuarioLogado->getId());
    $cProspect->add(ProspectPeer::DATA_AGENDAMENTO, NULL, Criteria::ISNULL);
    $cProspect->addAnd(ProspectPeer::DATA_ULTIMO_CONTATO , NULL, Criteria::ISNULL);
    $qtdeProspect = ProspectPeer::doCount($cProspect);
    return $qtdeProspect;
}


/*FUNCOES DE CONTAGEM PARA O  MENU DE CERTIFICADOS*/


function qtdCertificadosNaoPagos ($usuarioLogado) {
    /*CONSULTA QUANTIDADE CERTIFICADOS NAO CONFIRMADOS (NAO CONFIRMADOS E NAO PAGOS)*/
    $cCertificado = new Criteria();
    //$cCertificado->add(CertificadoPeer::AUTORIZADO_VENDA_SEM_CONTADOR,1);
    $cCertificado->add(CertificadoPeer::DATA_COMPRA, date('Y').'-'.date('m').'-01'.$hora_ini, Criteria::GREATER_EQUAL);
    $cCertificado->addAnd(CertificadoPeer::DATA_COMPRA, date('Y').'-'.date('m').'-'.getLastDayOfMonth(date('m'), date('Y')) . $hora_fim, Criteria::LESS_EQUAL);
    $cCertificado->add(CertificadoPeer::APAGADO, 0);

    if (($usuarioLogado->getPerfilId() != 4) && ($usuarioLogado->getPerfilId() != 67) && ($usuarioLogado->getPerfilId() != 1)) {
        $cLocalUsuario = new  Criteria();
        $cLocalUsuario->add(LocalUsuarioPeer::SITUACAO, 0);
        $cLocalUsuario->add(LocalUsuarioPeer::USUARIO_ID, $usuarioLogado->getId());
        $locaisUsuario = LocalUsuarioPeer::doSelect($cLocalUsuario);

        $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuarioLogado->getId());

        if ($locaisUsuario) {
            foreach ($locaisUsuario as $localUsuario)
                $cCertificado->addOr(CertificadoPeer::LOCAL_ID, $localUsuario->getLocalId(), Criteria::EQUAL);
        }
    }
    $cCertificado->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, null, Criteria::ISNULL);
    $qtdeCertificadosLiberados = CertificadoPeer::doCount($cCertificado);
    return $qtdeCertificadosLiberados;
    /*FIM DA CONSULTA QUANTIDADE CERTIFICADOS NAO CONFIRMADOS (NAO CONFIRMADOS E NAO PAGOS)*/
}

function qtdCertificadosFaturados ($usuarioLogado) {
    /*CONSULTA QUANTIDADE CERTIFICADOS FATURADOS (CONFIRMADOS PAGAMENTO)*/
    $cCertificado = new Criteria();
    /*SO CHECAR SE ESTA AUTORIZADO OU NAO NA TELA DOS USUÁRIOS COMUNS*/
    if ($usuarioLogado->getPerfilId() != 4)
        $cCertificado->add(CertificadoPeer::AUTORIZADO_VENDA_SEM_CONTADOR,0);
    $cCertificado->add(CertificadoPeer::DATA_COMPRA, date('Y').'-'.date('m').'-01'.$hora_ini, Criteria::GREATER_EQUAL);
    $cCertificado->addAnd(CertificadoPeer::DATA_COMPRA, date('Y').'-'.date('m').'-'.getLastDayOfMonth(date('m'), date('Y')) . $hora_fim, Criteria::LESS_EQUAL);
    $cCertificado->add(CertificadoPeer::APAGADO, 0);

    if (($usuarioLogado->getPerfilId() != 4) && ($usuarioLogado->getPerfilId() != 67) && ($usuarioLogado->getPerfilId() != 1)) {
        $cLocalUsuario = new  Criteria();
        $cLocalUsuario->add(LocalUsuarioPeer::SITUACAO, 0);
        $cLocalUsuario->add(LocalUsuarioPeer::USUARIO_ID, $usuarioLogado->getId());
        $locaisUsuario = LocalUsuarioPeer::doSelect($cLocalUsuario);

        $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuarioLogado->getId());
        if ($locaisUsuario) {
            foreach ($locaisUsuario as $localUsuario)
                $cCertificado->addOr(CertificadoPeer::LOCAL_ID, $localUsuario->getLocalId(), Criteria::EQUAL);
        }
    }
    $qtdeCertificados = CertificadoPeer::doCount($cCertificado);
    return $qtdeCertificados;
    /*FIM DA CONSULTA QUANTIDADE CERTIFICADOS FATURADOS (CONFIRMADOS PAGAMENTO)*/
}

function qtdCertificadosInformePamento($usuarioLogado) {
    /*BUSCA QUANTIDADE DE CERTIFICADOS APENAS COM INFORME DE PAGAMENTO*/
    $cCertificado = new Criteria();

    $cCertificado->add(CertificadoPeer::DATA_PAGAMENTO, date('Y').'-'.date('m').'-01'.$hora_ini, Criteria::GREATER_EQUAL);
    $cCertificado->addAnd(CertificadoPeer::DATA_PAGAMENTO, date('Y').'-'.date('m').'-'.getLastDayOfMonth(date('m'), date('Y')) . $hora_fim, Criteria::LESS_EQUAL);
    $cCertificado->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, null, Criteria::ISNULL);
    if (($usuarioLogado->getPerfilId() != 4) && ($usuarioLogado->getPerfilId() != 67) && ($usuarioLogado->getPerfilId() != 1)) {
        $cLocalUsuario = new  Criteria();
        $cLocalUsuario->add(LocalUsuarioPeer::SITUACAO, 0);
        $cLocalUsuario->add(LocalUsuarioPeer::USUARIO_ID, $usuarioLogado->getId());
        $locaisUsuario = LocalUsuarioPeer::doSelect($cLocalUsuario);

        $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuarioLogado->getId());
        if ($locaisUsuario) {
            foreach ($locaisUsuario as $localUsuario)
                $cCertificado->addOr(CertificadoPeer::LOCAL_ID, $localUsuario->getLocalId(), Criteria::EQUAL);
        }
    }

    if (($usuarioLogado->getPerfilId() == 5) ) {
        $cCertificado->addOr(CertificadoPeer::FUNCIONARIO_VALIDOU_ID, $usuarioLogado->getId());
    }

    $cCertificado->add(CertificadoPeer::APAGADO, 0);
    $cCertificado->addOr(CertificadoPeer::APAGADO, 4);

    $qtdeInformePagamento = CertificadoPeer::doCount($cCertificado);
    return $qtdeInformePagamento;
    /*FIM DA BUSCA DE QUANTIDADE DE CERTIFICADOS APENAS COM INFORME DE PAGAMENTO*/
}

function qtdCertificadosConfirmadosPagamento ($usuarioLogado) {
    /*BUSCA DE QUANTIDADE DE CERTIFICADOS CONFIRMADOS DE PAGAMENTO*/
    $cCertificado = new Criteria();
    $cCertificado->add(CertificadoPeer::APAGADO,0);

    //SE O PERFIL E DIRETORIA, MOSTRA TODOS
    if ($usuarioLogado->getPerfilId()!= 4) {
        // SE O PERFIL FOR SUPERVISÃO CONSULTA POR LOCALIDADE
        if($usuarioLogado->getPerfilId() == 1) {
            $cCertificado->add(CertificadoPeer::LOCAL_ID, $usuarioLogado->getLocalId());
        }else {
            $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuarioLogado->getId());
        }
        $cCertificado->add(CertificadoPeer::AUTORIZADO_VENDA_SEM_CONTADOR,1);
    }

    $cCertificado->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, date('Y').'-'.date('m').'-01'.$hora_ini, Criteria::GREATER_EQUAL);
    $cCertificado->addAnd(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, date('Y').'-'.date('m').'-'.getLastDayOfMonth(date('m'), date('Y')) . $hora_fim, Criteria::LESS_EQUAL);
    $qtdeFaturados = CertificadoPeer::doCount($cCertificado);
    /*FIM DE BUSCA BUSCA DE QUANTIDADE DE CERTIFICADOS CONFIRMADOS DE PAGAMENTO*/
    return $qtdeFaturados;
}

function qtdCertificadosNaoAutorizados ($usuarioLogado) {
    /*BUSCA DE QUANTIDADE DE CERTIFICADOS CONFIRMADOS DE PAGAMENTO*/
    $cCertificado = new Criteria();
    $cCertificado->add(CertificadoPeer::APAGADO,0);

    $cCertificado->add(CertificadoPeer::AUTORIZADO_VENDA_SEM_CONTADOR,0);
    $cCertificado->add(CertificadoPeer::DATA_COMPRA, date('Y').'-'.date('m').'-01'.$hora_ini, Criteria::GREATER_EQUAL);
    $cCertificado->addAnd(CertificadoPeer::DATA_COMPRA, date('Y').'-'.date('m').'-'.getLastDayOfMonth(date('m'), date('Y')) . $hora_fim, Criteria::LESS_EQUAL);
    //$cCertificado->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, null, Criteria::ISNULL);
    /*SE FOR DIRETORIA, GERENCIA OU SUPERVISAO*/
    if (($usuarioLogado->getPerfilId() == 4) || ($usuarioLogado->getPerfilId() == 67) || ($usuarioLogado->getPerfilId() == 1)) {
        $cLocalUsuario = new  Criteria();
        $cLocalUsuario->add(LocalUsuarioPeer::SITUACAO, 0);
        $cLocalUsuario->add(LocalUsuarioPeer::USUARIO_ID, $usuarioLogado->getId());
        $locaisUsuario = LocalUsuarioPeer::doSelect($cLocalUsuario);

        $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuarioLogado->getId());

        if (count($locaisUsuario) > 0)
            $cCertificado->addOr(CertificadoPeer::LOCAL_ID,$locaisUsuario[0]->getLocalId());
        for ($i = 1; $i<count($locaisUsuario); $i++) {
            if ($locaisUsuario[$i])
                $cCertificado->addOr(CertificadoPeer::LOCAL_ID, $locaisUsuario[$i]->getLocalId());
        }
    }
    else
        $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuarioLogado->getId());

    $qtdeCertificadosNaoAutorizados = CertificadoPeer::doCount($cCertificado);
    /*FIM DE BUSCA BUSCA DE QUANTIDADE DE CERTIFICADOS CONFIRMADOS DE PAGAMENTO*/
    return $qtdeCertificadosNaoAutorizados;
}

/*FIM DAS FUNCOES DE CONTAGEM PARA O  MENU DE CERTIFICADOS*/

function qtdContadores($usuarioLogado) {
    $cContador = new Criteria();
    $cContador->add(ContadorPeer::SITUACAO,0);

    //SE O PERFIL E DIRETORIA, MOSTRA TODOS
    if ($usuarioLogado->getPerfilId()!= 4){
        $cContador->add(ContadorPeer::USUARIO_ID, $usuarioLogado->getId());
    }

    $qtdeContador = ContadorPeer::doCount($cContador);
    return $qtdeContador;

}


?>