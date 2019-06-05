<?
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

$anoReferenciaRenovacao3Anos = date('Y')-3;
$anoReferenciaRenovacao1Ano  = date('Y')-1;

if(date('m')+1 >12){
    $mesReferenciaRenovacao = 01;
}else{
    $mesReferenciaRenovacao = date('m')+1;
}

/*PEGA DATA DE INICIO E FIM REFERENTES A CERTIFICADOS A1 A SEREM RENOVADOS*/
$dataInicialReferenciaA1 = new DateTime(date('Y-m-d'));
$dataInicialReferenciaA1->sub(new DateInterval('P1Y'));

$dataFinalReferenciaA1 = new DateTime(date('Y-m-d'));
$dataFinalReferenciaA1->sub(new DateInterval('P1Y'));
$dataFinalReferenciaA1->add(new DateInterval('P30D'));


/*PEGA DATA DE INICIO E FIM REFERENTES A CERTIFICADOS A3 A SEREM RENOVADOS*/
$dataInicialReferenciaA3 = new DateTime(date('Y-m-d'));
$dataInicialReferenciaA3->sub(new DateInterval('P3Y'));

$dataFinalReferenciaA3 = new DateTime(date('Y-m-d'));
$dataFinalReferenciaA3->sub(new DateInterval('P3Y'));
$dataFinalReferenciaA3->add(new DateInterval('P30D'));

/*try {
if(date('m')+1 >12){
    $mesSucessor = 01;
}else{
    $mesSucessor = date('m')+1;
}

$mesAnterior = date('m')-1;

    $anoReferenciaRenovacao3Anos = date('Y')-3;
    $anoReferenciaRenovacao1Ano  = date('Y')-1;
    $mesAnterior = date('m')-1;
    if(date('m')+1 >12){
        $mesSucessor = 01;
    }else{
        $mesSucessor = date('m')+1;
    }

    if(date('m')+1 >12){
        $mesReferenciaRenovacao = 01;
    }else{
        $mesReferenciaRenovacao = date('m')+2;
    }

    try {

        $dataInicio1ano = $anoReferenciaRenovacao1Ano.'-'.date('m').'-18 00:00:00';
        $dataFim1ano = $anoReferenciaRenovacao1Ano. '-' .$mesReferenciaRenovacao. '-15 23:59:59';

        $dataInicio3anos = $anoReferenciaRenovacao3Anos.'-'.date('m').'-18 00:00:00';
        $dataFim3anos = $anoReferenciaRenovacao3Anos. '-' .$mesReferenciaRenovacao. '-15 23:59:59';

        $cUsuario = new Criteria();
        $cUsuario->add(UsuarioPeer::SITUACAO,0);
        $cUsuario->add(UsuarioPeer::PERFIL_ID,43);
        $cUsuario->addOr(UsuarioPeer::PERFIL_ID,32);
        $cUsuario->add(UsuarioPeer::LOCAL_ID,1);
        $cUsuario->addAscendingOrderByColumn(UsuarioPeer::NOME);
        $usuarios = UsuarioPeer::doSelect($cUsuario);

        echo "<h1>USUARIOS BELEM</h1>";
        echo "<table border='1' cellpadding='5'>";
        echo "<tr align='center'>";
        echo "<td>COD</td>";
        echo "<td>NOME</td>";
        echo "<td>PERFIL</td>";
        echo "<td>LOCAL</td>";
        echo "</tr>";

        foreach ($usuarios as $usuario){
            echo "<tr>";
            echo "<td>".str_pad($usuario->getId(),4,0,STR_PAD_LEFT)."</td>";
            echo "<td>".strtoupper($usuario->getNome())."</td>";
            echo "<td>".$usuario->getPerfil()->getNome()."</td>";
            echo "<td>".$usuario->getLocal()->getNome()."</td>";
            echo "</tr>";
        }

        echo "</table>";

        $cCertificado = new Criteria();
        $cCertificado->add(CertificadoPeer::APAGADO, 0);
        $cCertificado->addSelectColumn(CertificadoPeer::USUARIO_ID);
        $cCertificado->addSelectColumn(CertificadoPeer::LOCAL_ID);
        $cCertificado->addAsColumn('QTDE_CD','count("usuario_id")');
        $cCertificado->add(CertificadoPeer::LOCAL_ID, 1);
        $cCertificado->add(CertificadoPeer::DATA_VALIDACAO, $dataInicio1ano , Criteria::GREATER_EQUAL);
        $cCertificado->addAnd(CertificadoPeer::DATA_VALIDACAO, $dataFim1ano , Criteria::LESS_EQUAL);
        $cCertificado->addAscendingOrderByColumn(CertificadoPeer::LOCAL_ID);
        $cCertificado->addGroupByColumn(CertificadoPeer::USUARIO_ID);
        $certificados1ano = CertificadoPeer::doSelectStmt($cCertificado);
        $certificados1ano = $certificados1ano->fetchAll();

        echo "<h1>CERTIFICADOS A1</h1> CONSULTA DE:".$dataInicio1ano." ATE:".$dataFim1ano;
        echo "<table border='1' cellpadding='5'>";
        echo "<tr align='center'>";
        echo "<td>COD</td>";
        echo "<td>NOME</td>";
        echo "<td>SITUACAO</td>";
        echo "<td>LOCAL USUARIO</td>";
        echo "<td>LOCAL CD</td>";
        echo "<td>QTDE A1</td>";
        echo "</tr>";

        foreach ($certificados1ano as $certificado){
            echo "<tr>";
            echo "<td>".str_pad($certificado['USUARIO_ID'],4,0,STR_PAD_LEFT)."</td>";

            if($certificado['USUARIO_ID']) {
                $usuario = UsuarioPeer::retrieveByPK($certificado['USUARIO_ID']);
                echo "<td>" . $usuario->getNome() . "</td>";

                if($usuario->getSituacao() == -1){
                    $situacao = "<font color='red'>INATIVO</font>";
                }elseif($usuario->getSituacao() == 0){
                    $situacao = "<font color='green'>ATIVO</font>";
                }elseif($usuario->getSituacao() == 1){
                    $situacao = "<font color='orange'>BLOQUEADO</font>";
                }else{
                    $situacao = "********";
                }

                echo "<td>" . $situacao . "</td>";
                if($usuario->getLocalId() != 0) {
                    echo "<td>" . $usuario->getLocal()->getNome() . "</td>";
                }else{
                    echo "<td>********</td>";
                }
            }else{
                echo "<td>*******</td>";
                echo "<td>*******</td>";
            }

            if($certificado['LOCAL_ID']) {
                $local = LocalPeer::retrieveByPK($certificado['LOCAL_ID']);
                echo "<td>" . $local->getNome() . "</td>";
            }else{
                echo "<td>*******</td>";
            }
            echo "<td>".$certificado['QTDE_CD']."</td>";
            echo "</tr>";

            $certificadosCount += $certificado['QTDE_CD'];
        }

        echo '<tr>';
        echo '<td colspan="6">'.$certificadosCount.'</td>';
        echo '</tr>';

        echo "</table>";

        echo "<br/>";
        echo "<br/>";
        echo "<br/>";
        $cCertificado = new Criteria();
        $cCertificado->add(CertificadoPeer::APAGADO, 0);
        $cCertificado->addSelectColumn(CertificadoPeer::USUARIO_ID);
        $cCertificado->addSelectColumn(CertificadoPeer::LOCAL_ID);
        $cCertificado->addAsColumn('QTDE_CD','count("usuario_id")');
        $cCertificado->add(CertificadoPeer::LOCAL_ID, 1);
        $cCertificado->add(CertificadoPeer::DATA_VALIDACAO, $dataInicio3anos , Criteria::GREATER_EQUAL);
        $cCertificado->addAnd(CertificadoPeer::DATA_VALIDACAO,  $dataFim3anos, Criteria::LESS_EQUAL);
        $cCertificado->addAscendingOrderByColumn(CertificadoPeer::LOCAL_ID);
        $cCertificado->addGroupByColumn(CertificadoPeer::USUARIO_ID);
        $certificados3anos = CertificadoPeer::doSelectStmt($cCertificado);
        $certificados3anos = $certificados3anos->fetchAll();

        echo "<h1>CERTIFICADOS A3</h1> CONSULTA DE:".$dataInicio3anos." ATE:".$dataFim3anos;
        echo "<table border='1' cellpadding='5'>";
        echo "<tr align='center'>";
        echo "<td>COD</td>";
        echo "<td>NOME</td>";
        echo "<td>SITUACAO</td>";
        echo "<td>LOCAL USUARIO</td>";
        echo "<td>LOCAL CD</td>";
        echo "<td>QTDE A3</td>";
        echo "</tr>";

        foreach ($certificados3anos as $certificado){
            echo "<tr>";
            echo "<td>".str_pad($certificado['USUARIO_ID'],4,0,STR_PAD_LEFT)."</td>";

            if($certificado['USUARIO_ID']) {
                $usuario = UsuarioPeer::retrieveByPK($certificado['USUARIO_ID']);
                echo "<td>" . $usuario->getNome() . "</td>";

                if($usuario->getSituacao() == -1){
                    $situacao = "<font color='red'>INATIVO</font>";
                }elseif($usuario->getSituacao() == 0){
                    $situacao = "<font color='green'>ATIVO</font>";
                }elseif($usuario->getSituacao() == 1){
                    $situacao = "<font color='orange'>BLOQUEADO</font>";
                }else{
                    $situacao = "********";
                }

                echo "<td>" . $situacao . "</td>";
                if($usuario->getLocalId() != 0) {
                    echo "<td>" . $usuario->getLocal()->getNome() . "</td>";
                }else{
                    echo "<td>********</td>";
                }
            }else{
                echo "<td>*******</td>";
                echo "<td>*******</td>";
            }

            if($certificado['LOCAL_ID']) {
                $local = LocalPeer::retrieveByPK($certificado['LOCAL_ID']);
                echo "<td>" . $local->getNome() . "</td>";
            }else{
                echo "<td>*******</td>";
            }
            echo "<td>".$certificado['QTDE_CD']."</td>";
            echo "</tr>";

            $certificadosCount3 += $certificado['QTDE_CD'];
        }
        echo '<tr>';
        echo '<td colspan="6">'.$certificadosCount3.'</td>';
        echo '</tr>';

        echo "</table>";
    }catch (Exception $e){
        echo $e->getMessage();
    }

    exit;*/




try{
    $cProduto = new Criteria();
    $cProduto->add(ProdutoPeer::NOME, '%(1 ANO)%', Criteria::LIKE);
    $produtos1ano = ProdutoPeer::doSelect($cProduto);

    $cProduto = new Criteria();
    $cProduto->add(ProdutoPeer::NOME, '%(3 ANOS)%', Criteria::LIKE);
    $produtos3anos = ProdutoPeer::doSelect($cProduto);

    $arrProdutoId=array();
    foreach ($produtos1ano as $produto){
        array_push($arrProdutoId,$produto->getId());
    }

    $arrProdutoId3=array();
    foreach ($produtos3anos as $produto){
        array_push($arrProdutoId3,$produto->getId());
    }

    // ESTÁ PARANDO AQUI
    $cCertificado = new Criteria();
    $cCertificado->add(CertificadoPeer::APAGADO, 0);
    $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuarioLogado->getId());
    $cCertificado->add(ProdutoPeer::VALIDADE, 3);
    $cCertificado->add(CertificadoPeer::DATA_VALIDACAO,  $dataInicialReferenciaA3->format('Y-m-d').' 00:00:00', Criteria::GREATER_EQUAL);
    $cCertificado->addAnd(CertificadoPeer::DATA_VALIDACAO,  $dataFinalReferenciaA3->format('Y-m-d').' 23:59:59', Criteria::LESS_EQUAL);
    $cCertificado->addAscendingOrderByColumn(CertificadoPeer::DATA_VALIDACAO);
    $certificados3anos = CertificadoPeer::doSelectJoinProduto($cCertificado);

    $cCertificado = new Criteria();
    $cCertificado->add(CertificadoPeer::APAGADO, 0);
    $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuarioLogado->getId());
    $cCertificado->add(ProdutoPeer::VALIDADE, 1);
    $cCertificado->add(CertificadoPeer::DATA_VALIDACAO,  $dataInicialReferenciaA1->format('Y-m-d').' 00:00:00', Criteria::GREATER_EQUAL);
    $cCertificado->addAnd(CertificadoPeer::DATA_VALIDACAO,  $dataFinalReferenciaA1->format('Y-m-d').' 23:59:59', Criteria::LESS_EQUAL);
    $cCertificado->addAscendingOrderByColumn(CertificadoPeer::DATA_VALIDACAO);
    $certificados1ano = CertificadoPeer::doSelectJoinProduto($cCertificado);

    if($certificados3anos) {
        js_aviso("Encotrou A3");
        foreach ($certificados3anos as $certificado) {
            /*SE ENCONTROU CERTIFICADOS A3 PRIMEIRO CHECA SE ELE JA ESTA COMO PROSPECT DE ALGUEM*/
            $cProspect = new Criteria();
            $cProspect->add(ProspectPeer::CERTIFICADO_ID, $certificado->getId());
            $prospect = ProspectPeer::doSelectOne($cProspect);

            if (!$prospect) {
                $prospect = new Prospect();
                $prospect->setUsuarioId($usuarioLogado->getId());
                $prospect->setCertificadoId($certificado->getId());
                $prospect->setSituacao(0);
                $prospect->setProspectTipoId(3);
                $prospect->setDataCadastro(date('Y-m-d H:i:s'));
                $prospect->save();
            }
        }
    }

    if($certificados1ano) {
        js_aviso("Encotrou A1");
        foreach ($certificados1ano as $certificado) {
            $cProspect = new Criteria();
            $cProspect->add(ProspectPeer::CERTIFICADO_ID, $certificado->getId());
            $prospect = ProspectPeer::doSelectOne($cProspect);

            if (!$prospect) {
                $prospect = new Prospect();
                $prospect->setUsuarioId($usuarioLogado->getId());
                $prospect->setCertificadoId($certificado->getId());
                $prospect->setSituacao(0);
                $prospect->setProspectTipoId(3);
                $prospect->setDataCadastro(date('Y-m-d H:i:s'));
                $prospect->save();
            }
        }
    }

    /*
     * CODIGO PARA BUSCAR COBRANCA E ATUALIZAR PROSPECT
    $cCertificado = new Criteria();
    $cCertificado->add(CertificadoPeer::APAGADO, 0);
    $cCertificado->add(CertificadoPeer::USUARIO_ID, $usuarioLogado->getId());
    $cCertificado->add(CertificadoPeer::DATA_COMPRA,  date('Y').'-'.date('m').'-01 00:00:00', Criteria::GREATER_EQUAL);
    $cCertificado->addAnd(CertificadoPeer::DATA_COMPRA, date('Y') . '-' . date('m') . '-' . getLastDayOfMonth(date('m'), date('Y')).' 23:59:59', Criteria::LESS_EQUAL);
    $cCertificado->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO , NULL , Criteria::ISNULL);
    $certificados = CertificadoPeer::doSelect($cCertificado);

    foreach($certificados as $certificado) {
        $cProspect = new Criteria();
        $cProspect->add(ProspectPeer::CERTIFICADO_ID , $certificado->getId());
        $prospect = ProspectPeer::doSelectOne($cProspect);

        if(!$prospect){
            $prospect = new Prospect();
            $prospect->setUsuarioId($usuarioLogado->getId());
            $prospect->setCertificadoId($certificado->getId());
            $prospect->setSituacao(0);
            $prospect->setProspectTipoId(1);
            $prospect->setDataCadastro(date('Y-m-d H:i:s'));
            $prospect->save();
        }
    }
*/
    $cContador = new Criteria();
    $cContador->add(ContadorPeer::SITUACAO, 0);
    $cContador->add(ContadorPeer::USUARIO_ID, $usuarioLogado->getId());
    $contadores = ContadorPeer::doSelect($cContador);

    foreach($contadores as $contador) {
        $cProspect = new Criteria();
        $cProspect->add(ProspectPeer::CONTADOR_ID , $contador->getId());
        $prospect = ProspectPeer::doSelectOne($cProspect);

        if(!$prospect){
            $prospect = new Prospect();
            $prospect->setUsuarioId($usuarioLogado->getId());
            $prospect->setContadorId($contador->getId());
            $prospect->setSituacao(0);
            $prospect->setProspectTipoId(2);
            $prospect->setDataCadastro(date('Y-m-d H:i:s'));
            $prospect->save();
        }
    }



    echo "Ataulizado com Sucesso";
}catch (Exception $e){
	echo "<pre>";
	var_dump($e->getMessage());
	echo "</pre>";
	exit;
}
?>