<?php
/**
 * Created by PhpStorm.
 * User: Antonio Carlos
 * Date: 03/12/2019
 * Time: 13:30
 */
require_once $_SERVER['DOCUMENT_ROOT']. '/loader_off.php';
if ($_GET['qtdDias']) {
    /*
     * BUSCA CERTIFICADOS VENCENDO DAQUI A 30 DIAS
     * */
    $hora_ini = ' 00:00:00';
    $hora_fim = ' 23:59:59';

    $cCertificados = new Criteria();

    $dataAte = new DateTime(date('Y-m-d H:i:s'));
    $dataAte->add(new DateInterval('P'.$_GET['qtdDias'].'D'));

    $dataCompra = new DateTime(date($dataAte->format('Y-m-d')));
    $dataCompra->sub(new DateInterval('P30D'));

    if (!$_GET['executar'])
        echo '<h2>Data de criacao do pedido: '.$dataCompra->format('d/m/Y').' | Vencimento:' . $dataAte->format('d/m/Y') . '</h2>';

    $cCertificados->add(CertificadoPeer::DATA_FIM_VALIDADE, $dataAte->format('Y-m-d') . ' ' . $hora_ini, Criteria::GREATER_EQUAL);
    $cCertificados->addAnd(CertificadoPeer::DATA_FIM_VALIDADE, $dataAte->format('Y-m-d') . ' ' . $hora_fim, Criteria::LESS_EQUAL);

    $cCertificados->add(CertificadoPeer::APAGADO, 0);
    /*$cCertificados->add(CertificadoPeer::DATA_FIM_VALIDADE, '2019-11-14' . ' ' . $hora_ini, Criteria::GREATER_EQUAL);
    $cCertificados->addAnd(CertificadoPeer::DATA_FIM_VALIDADE, '2019-11-20' . ' ' . $hora_fim, Criteria::LESS_EQUAL);*/

    $certificados = CertificadoPeer::doSelect($cCertificados);

    if (!$_GET['executar'])
        echo '<h4>qtd Certificados a renovar: ' . count($certificados) . '</h4>';

    /*
     * CONSULTA DE USUARIOS ATIVOS E INATIVOS DOS SISTEMA PARA DISTRIBUIR OS CERTIFICADOS
     * */

    $cUsuariosAtivos = new Criteria();
    $cUsuariosAtivos->add(UsuarioPeer::SITUACAO, 0);//usuarios ativos
    $cUsuariosAtivos->add(UsuarioPeer::CARGO_ID, array(9, 10, 23), Criteria::IN);
    $usuariosAtivos = UsuarioPeer::doSelect($cUsuariosAtivos);
    shuffle($usuariosAtivos);

    $cUsuariosParceiros = new Criteria();
    $cUsuariosParceiros->add(UsuarioPeer::SITUACAO, 0);//usuarios ativos
    $cUsuariosParceiros->add(UsuarioPeer::CARGO_ID, array(9, 10, 23), Criteria::NOT_IN);
    $usuariosAtivosParceiros = UsuarioPeer::doSelect($cUsuariosParceiros);

    if (!$_GET['executar'])
        echo '<h4>qtd total de Usuarios ativos: ' . count($usuariosAtivos) . '</h4>';


    /*
     * SEPARAR ATIVO DO INATIVO
     * */
    $arrCdInativos = array();
    $arrCdsAtivos = array();
    $totalValorCds = 0;
    $arrDistribuicaoCds = array();

    foreach ($certificados as $certificado) {
        $totalValorCds += $certificado->getProduto()->getPreco() - $certificado->getDesconto();
        $usuario = $certificado->getUsuario();
        /*
         * CONDICAO PRA O CD ESTAR INATIVO: SITUACAO DO USUARIO = 1 OU -1, OU O CARGO NAO SER UM DOS ABAIXO:
         *  9, 10 OU 23
         * */
        if (($usuario->getSituacao() !== 0)) {
            $arrCdInativos[] = $certificado;
        } else {
            $arrCdsAtivos[] = $certificado;
            $arrDistribuicaoCds[$certificado->getUsuarioId()]['meus'][] = $certificado;
        }
    }
    if (!$_GET['executar'])
        echo '<h3 style="color: #FF0000;">Total de pedidos a renovar ' . formataMoeda($totalValorCds) . '</h3>';
    if (!$_GET['executar'])
        echo('qtd CDS de Usuarios Ativos: ' . count($arrCdsAtivos) . '<br/><br/>');
    if (!$_GET['executar'])
        echo('<br/><br/>qtd CDS de Usuarios Inativos: ' . count($arrCdInativos) . '<br/>');

    if (!$_GET['executar'])
        echo '<h2>Usuarios inativos:</h2>';

    $iAuxDist = 0;
    $arrUsuariosUnicos = array();
    foreach ($arrCdInativos as $certificado) {
        /*
         * PARA DISTRIBUIR OS CDS INATIVOS, PEGA O PRIMEIRO USUARIO ATIVO
         * E VAI ITERANDO ATE ATINGIR O ULTIMO DEPOIS ZERA PRA COMECAR NOVAMENTE
         * */
        if ($iAuxDist == count($usuariosAtivos))
            $iAuxDist = 0;
        $usuarioAtivo = $usuariosAtivos[$iAuxDist];
        $iAuxDist++;

        $arrDistribuicaoCds[$usuarioAtivo->getId()]['outros'][] = $certificado;

        if (array_search($certificado->getUsuarioId(), $arrUsuariosUnicos) === false) {
            $arrUsuariosUnicos[$certificado->getUsuarioId(). '- ' . $certificado->getUsuario()->getNome()] += 1 ;
        }
    }

    $i = 1;
    $qtdTotal = 0;
    foreach ($arrUsuariosUnicos as $nome => $qtdPedidos)
        if (!$_GET['executar']) {
            echo $i++ . ' - (' . $nome . ') ' . $qtdPedidos . '<br/>';
            $qtdTotal += $qtdPedidos;

        }
    if (!$_GET['executar']) {
        echo '<h3>Total Pedidos inativos:' . $qtdTotal . '</h3>';
    }

    if (!$_GET['executar'])
        echo "<h2>Distribuicao:</h2>";
    $i = 1;
    $qtdInativosDistribuidos = 0;
    $qtdAtivosDistribuidos = 0;
    foreach ($arrDistribuicaoCds as $idUsuario => $distCd) {

        foreach ($usuariosAtivos as $usuarioAtivo)
            if ($idUsuario == $usuarioAtivo->getId()) {
                if (!$_GET['executar'])
                    echo '<h3>' . $i++ . ') ' . $usuarioAtivo->getId() . ': ' . utf8_encode($usuarioAtivo->getNome()) . ' | qtd Inativos: ' . count($distCd['outros']) . ' |  qtd ativos: ' . count($distCd['meus']) . '</h3>';
                $qtdInativosDistribuidos += count($distCd['outros']);
                $qtdAtivosDistribuidos += count($distCd['meus']);
            }


    }

    if (!$_GET['executar'])
        echo '<h1>USUARIOS PARCEIROS:</h1>';
    foreach ($arrDistribuicaoCds as $idUsuario => $distCd) {

        foreach ($usuariosAtivosParceiros as $usuarioAtivo)
            if ($idUsuario == $usuarioAtivo->getId()) {
                if (!$_GET['executar'])
                    echo '<h3>' . $i++ . ') ' . $usuarioAtivo->getId() . ': ' . utf8_encode($usuarioAtivo->getNome()) . ' | qtd Inativos: ' . count($distCd['outros']) . ' |  qtd ativos: ' . count($distCd['meus']) . '</h3>';
                $qtdInativosDistribuidos += count($distCd['outros']);
                $qtdAtivosDistribuidos += count($distCd['meus']);
            }


    }

    if (!$_GET['executar']) {
        echo "Inativos: <h1>$qtdInativosDistribuidos</h1>";
        echo "Ativos: <h1>$qtdAtivosDistribuidos</h1>";
    }

    ?>
    <a href="rotinaDuplicarRenovacoes.php?executar=sim&dataCompra=<?=$dataCompra->format('Y-m-d').'&qtdDias='.$_GET['qtdDias'];?>">Executar</a>
    <a href="rotinaDuplicarRenovacoes.php">Voltar</a>
    <?
} else {

    ?>

    <form action="rotinaDuplicarRenovacoes.php" method="get">
        <input type="text" name="qtdDias" placeholder="insira o dia para o algoritmo executar"/>
        <button type="submit">Simular</button>
    </form>


    <?
}

function duplicarPedidosRenovacao($certificadosDistribuidosUsuarios, $dataCompra='') {
    ini_set('memory_limit', '256M');
    set_time_limit(300);

    try {
        $con = Propel::getConnection(CertificadoPeer::DATABASE_NAME);
        $con->beginTransaction();
        $usuarios = array();
        $certificadoDistUnico = array();

        foreach ($certificadosDistribuidosUsuarios as $idUsuario=> $certificadoDist){
            $certificadosMeus = $certificadoDist['meus'];
            $certificadosOutros = $certificadoDist['outros'];

            /*echo 'idUsu-'.$idUsuario .') ';
            var_dump($certificadoDist['meus']);*/
            if ($certificadosMeus)
                foreach ($certificadosMeus as $cert) {
                    if (array_search($cert->getUsuario()->getNome(), $usuarios)===false)
                        $usuarios[$cert->getUsuarioId()] = $cert->getUsuario()->getNome();
                    $certificadoDistUnico[$idUsuario][] = $cert;
                }

            if ($certificadosOutros)
                foreach ($certificadosOutros as $cert) {
                    if (array_search($cert->getUsuario()->getNome(), $usuarios)===false)
                        $usuarios[$cert->getUsuarioId()] = $cert->getUsuario()->getNome();
                    $certificadoDistUnico[$idUsuario][] = $cert;
                }

        }


        //var_dump($certificadoDistUnico);exit;
        //var_dump($usuarios);

        $usuarioAnterior = '';
        $i = 1;
        foreach ($certificadoDistUnico as $idUsuario => $certificadosDistribuidos) {
            /*
             * ACHA O NOME DO USUARIO ANTERIOR
             * */
            if (array_key_exists($idUsuario, $usuarios))
                $usuarioAnterior = $idUsuario . ' - ' . $usuarios[$idUsuario];

            foreach ($certificadosDistribuidos as $certificado) {
                $cCdRenovado = new Criteria();
                $cCdRenovado->add(CertificadoPeer::CERTIFICADO_RENOVADO, $certificado->getId());
                $cCdRenovado->add(CertificadoPeer::APAGADO, 0);
                $encontrouCdRenovado = CertificadoPeer::doCount($cCdRenovado);

                /*
                 * SO DUPLICA O PEDIDO DE RENOVACAO SE NAO HOUVER DUPLICIDADE ANTES
                 * */
                if($encontrouCdRenovado == 0) {
                    $certificadoNovo = new Certificado();
                    /*
                     * NA CARGA INICIAL TROQUEI A DATA DA COMPRA, MAS O ALGORITMO DEVE SEGUIR COM A DATA DA COMPRA DO DIA E HORA QUE ACONTECEU
                     * */
                    //$certificadoNovo->setDataCompra(date('Y-m-d H:i:s'));
                    $certificadoNovo->setDataCompra($dataCompra);


                    $certificadoNovo->setClienteId($certificado->getClienteId());
                    $certificadoNovo->setProdutoId($certificado->getProdutoId());
                    $certificadoNovo->setFormaPagamentoId($certificado->getFormaPagamentoId());
                    $certificadoNovo->setLocalId($certificado->getLocalId());
                    $certificadoNovo->setApagado(0);
                    $certificadoNovo->setCertificadoRenovado($certificado->getId());
                    $certificadoNovo->setUsuarioId($idUsuario);
                    $certificadoNovo->setContadorId($certificado->getContadorId());
                    $certificadoNovo->save();


                    $certSit = new CertificadoSituacao();
                    /*
                     * INSERE O USUARIO GUIAR NA SITUACAO
                     * */
                    $certSit->setUsuarioId(1039);
                    $certSit->setComentario('Este &eacute; um pedido de renova&ccedil;&atilde;o. Ele foi duplicado automaticamente pelo sistema para usuario ' . $certificadoNovo->getUsuario()->getId() . ' - ' . $certificadoNovo->getUsuario()->getNome() . ' a partir do certificado que est&aacute; a vencer <a href="http://swsistema/telaCertificado.php?funcao=detalhaCertificado&idCertificado=' . $certificado->getId() . '" target="_blank">' . $certificado->getId() . '</a>. Usu&aacute;rio anterior: <b>' . $certificado->getUsuario()->getNome() . '</b>');
                    echo '<h3>' . $i++ . ' - Usuario recebeu: ' . $certificadoNovo->getUsuario()->getNome() .' - Usuario Anterior: ' . $certificado->getUsuario()->getNome() . ' | Novo CD: <a href="http://swsistema/telaCertificado.php?funcao=detalhaCertificado&idCertificado=' . $certificadoNovo->getId() . '" target="_blank">' . $certificadoNovo->getId() . '</a> | CD antigo: <a href="http://swsistema/telaCertificado.php?funcao=detalhaCertificado&idCertificado=' . $certificado->getId() . '" target="_blank">'.$certificado->getId() .'</a></h3>';
                    $cSit = new Criteria();
                    $certSit->setCertificadoId($certificadoNovo->getId());
                    $cSit->add(SituacaoPeer::SIGLA, 'pedren');
                    $certSit->setData(date('Y-m-d H:i:s'));
                    $certSit->setSituacao(SituacaoPeer::doSelectOne($cSit));
                    $certSit->save();
                }

            }

        }


        $con->commit();
        //$con->rollBack();
    } catch(Exception $e){
        $con->rollBack();
        echo 'Erro: Aconteceu um erro na duplicacao dos pedidos de certificados: '.$e->getMessage();
    }
}

if ($_GET['executar']=='sim') {
    $dtCompra = '';
    if ($_GET['dataCompra'])
        $dtCompra = $_GET['dataCompra'];

    duplicarPedidosRenovacao($arrDistribuicaoCds, $dtCompra);
}

?>