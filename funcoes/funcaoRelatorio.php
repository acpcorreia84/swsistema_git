<?php
/**
 * Created by PhpStorm.
 * User: antoniocorreia
 * Date: 07/03/2017
 * Time: 21:26
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';
if ($_POST['funcao']=='carregar_dados_relatorio_campanha') carregarDadosRelatorioCampanha();
if ($funcao == 'carregar_filtros_relatorio') carregarFiltrosRelatorio();

function carregarFiltrosRelatorio() {
    try {
        $usuarioLogado = ControleAcesso::getUsuarioLogado();

        /*SE FOR DIRETORIA MOSTRA TUDO (OU SEJA, NAO ENTRA NO IF)*/
        if (($usuarioLogado->getPerfilId() != 4) && ($usuarioLogado->getPerfilId()!=11)) {

            /*
             * SE O USUARIO FOR PARCEIRO, ACRESCENTA TODOS
             * OS USUARIOS VINCULADOS AO MESMO
             * */
            $usuariosParceiroObj = $usuarioLogado->getUsuariosParceiroUsuario();
            $usuariosParceiro = array();

            foreach ($usuariosParceiroObj as $usuario)
                $usuariosParceiro[] = $usuario->getId();

            if ($usuariosParceiro)
                $sqlUsuarios = 'and usuario.ID in (' .implode(',',$usuariosParceiro) . ')';

            /*
             * SE TIVER LOCAL VINCULADO, ACRESCENTA TODOS
             * OS USUARIOS VINCULADOS A ESTES LOCAIS
             * */
            $usuariosLocaisObj = $usuarioLogado->getUsuariosLocaisUsuario();
            $usuariosLocais = array();

            foreach ($usuariosLocaisObj as $usuario)
                $usuariosLocais[] = $usuario->getId();
            /*var_dump(count($usuariosLocais));
            var_dump(count($usuariosParceiro));*/
            if ( count($usuariosLocais) > 0)
                $sqlUsuarios = 'and usuario.ID in (' .implode(',',$usuariosLocais) . ')';

            if (count($usuariosParceiro) == 0 && count($usuariosLocais)==0)
                $sqlUsuarios = 'and usuario.ID = ' . $usuarioLogado->getId();

        }

        $sql = 'SELECT usuario.ID as id, usuario.NOME as nome FROM usuario where usuario.situacao <> -1 ';
        $sql .= $sqlUsuarios;
        $sql .=' order by usuario.nome';

        $con = Propel::getConnection();
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $usuariosObj = $stmt->fetchAll();

        $usuarios = array();
        $usuarios[] = array("id"=>'', "nome"=>utf8_encode('Selecione o Usuario'));
        foreach ($usuariosObj as $usuario)
            $usuarios[] = array("id"=>$usuario['id'], "nome"=>utf8_encode(strtoupper($usuario['nome'])) );

        $resultado = array(
            'mensagem'=>'Ok', 'usuarios'=>json_encode( $usuarios)
        );

        echo json_encode($resultado);

        return $usuarios;

    } catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}

function todosDDDs() {
    return  array(68,
        82,
        97,
        92,
        96,
        75,
        71,
        77,
        74,
        73,
        85,
        88,
        61,
        28,
        27,
        62,
        64,
        98,
        99,
        34,
        38,
        32,
        31,
        33,
        37,
        35,
        67,
        66,
        65,
        91,
        93,
        94,
        83,
        87,
        81,
        89,
        86,
        43,
        45,
        44,
        42,
        41,
        46,
        24,
        22,
        21,
        84,
        69,
        95,
        51,
        54,
        53,
        55,
        47,
        49,
        48,
        79,
        17,
        19,
        18,
        14,
        16,
        12,
        11,
        15,
        13,
        63);
}


function formatarCelularZapFacil ($celularStr) {
    //ARMAZENA NO ARRAY TODOS OS DDS DO BRASIL
    $dddsBrasil = todosDDDs();

    $celularPadrao = preg_replace('/\D/', '', $celularStr);

    //extrai ddd pra validacao
    $ddd = substr($celularPadrao, 0, 2);
    if (array_search($ddd, $dddsBrasil)===false)
        return false; //'--------------'. $ddd . '-'.$celularPadrao;

    //VERIFICA SE O CELULAR E CELULAR CHECANDO SE O PRIMERO NUMERO E 9
    $aux = substr($celularPadrao, 2, 1);
    switch ($aux) {
        case '8': (strlen($celularPadrao) == 10) ? $celularPadrao = $ddd. '9'.substr($celularPadrao, 2) : $celularPadrao; break ;
        case '9': (strlen($celularPadrao) == 10) ? $celularPadrao = $ddd. '9'.substr($celularPadrao, 2) : $celularPadrao; break;
        default : return false; //'----------------'.$ddd. '-'. substr($celularPadrao, 2).' - NAO E CELULAR';
    }

    //ACRESCENTA O CODIGO DO PAIS 55 NA FRENTE
    if (!empty($celularPadrao))
        $celularPadrao = '55'.$celularPadrao;
    else return false; //'--------------';

    if (strlen($celularPadrao) == 13)
        return $celularPadrao;
    else return false; //'-------------- '.strlen($celularPadrao).' CHAR - ' .$celularPadrao;
}

function carregarDadosRelatorioCampanha () {
    try {
        if ($_POST['filtroPeriodoCampanha'])
            $filtroData = explode(',',$_POST['filtroPeriodoCampanha']);

        if ($filtroData) {
            $dataDe = explode('/', $filtroData[0]);
            $dataAte = explode('/', $filtroData[1]);
        }


        $cCd = new Criteria();
        $cCd->add(CertificadoPeer::APAGADO, 0);
        $cCd->add(CertificadoPeer::DATA_FIM_VALIDADE, $dataDe[2] . '/' . $dataDe[1] . '/' . $dataDe[0] .' 00:00:00', Criteria::GREATER_EQUAL);
        $cCd->addAnd(CertificadoPeer::DATA_FIM_VALIDADE, $dataAte[2] . '/' . $dataAte[1] . '/' . $dataAte[0].' 23:59:59', Criteria::LESS_EQUAL);


        $certificados = CertificadoPeer::doSelect($cCd);

        $i = 1;
        $celularesNaoEncontrados = 0;
        $celularesEncontrados = 0;
        $dados = array();
        $dadosExportacao = array();
        foreach ($certificados as $certificado) {
            $clienteCertificado = $certificado->getCliente();
            $responsavelCliente = $clienteCertificado->getResponsavel();

            //BUSCA TODOS OS CELULARES DO CARA
            if ($responsavelCliente)
            $celularFormatado = formatarCelularZapFacil($responsavelCliente->getCelular());

            if (!$celularFormatado) $celularFormatado = formatarCelularZapFacil($clienteCertificado->getCelular());

            if ($responsavelCliente) {
                if (!$celularFormatado) $celularFormatado = formatarCelularZapFacil($responsavelCliente->getFone1());
                if (!$celularFormatado) $celularFormatado = formatarCelularZapFacil($responsavelCliente->getFone2());
            }
            if (!$celularFormatado) $celularFormatado = formatarCelularZapFacil($clienteCertificado->getFone1());
            if (!$celularFormatado) $celularFormatado = formatarCelularZapFacil($clienteCertificado->getFone2());
            if (!$celularFormatado) $celularFormatado = formatarCelularZapFacil($clienteCertificado->getTelefoneAc());
            if (!$celularFormatado) $celularFormatado = formatarCelularZapFacil($clienteCertificado->getTelefoneContato());

            if (!$celularFormatado) $celularesNaoEncontrados ++; else $celularesEncontrados++;

            if ($responsavelCliente) {

                $dados[] =  array(
                    ' '=>$i++,
                    'Id'=>(!$celularFormatado) ? '<div style="background-color: #9f2b1e; color: #fff;">'.$responsavelCliente->getId().'</div>' : $responsavelCliente->getId(),
                    'Nome'=>(!$celularFormatado) ? '<div style="background-color: #9f2b1e; color: #fff;">'.utf8_encode($responsavelCliente->getNome()).'</div>' : utf8_encode($responsavelCliente->getNome()),
                    'Celular'=>$celularFormatado
                );

                $nomes = explode(" ",trim($responsavelCliente->getNome()));

                if ($celularFormatado) $dadosExportacao[] = array(
                    'Nome'=>trim($nomes[0]),
                    'Celular'=>$celularFormatado
                );

            } else {
                $dados[] =  array(
                    ' '=>$i++,
                    'Id'=>(!$celularFormatado) ? '<div style="background-color: #9f2b1e; color: #fff;">'.$clienteCertificado->getId().'</div>' : $clienteCertificado->getId(),
                    'Nome'=>(!$celularFormatado) ? '<div style="background-color: #9f2b1e; color: #fff;">'.utf8_encode($clienteCertificado->getNomeFantasia()).'</div>' : utf8_encode($clienteCertificado->getNomeFantasia()),
                    'Celular'=>$celularFormatado
                );

                $nomes = explode(" ",trim($clienteCertificado->getNomeFantasia()));

                if ($celularFormatado) $dadosExportacao[] = array(
                    'Nome'=>trim($nomes[0]),
                    'Celular'=>$celularFormatado
                );


            }

        }

        $colunas = array(
            array('nome'=>' '), array('nome'=>'Id'), array('nome'=>'Nome'), array('nome'=>'Celular')
        );

        $retorno =     array(
            'mensagem'=>'Ok',
            'colunas'=>json_encode($colunas),
            'dados'=>json_encode($dados),
            'dadosExportar'=>json_encode($dadosExportacao),
            'celularesEncontrados'=>$celularesEncontrados,
            'celularesNaoEncontrados'=>$celularesNaoEncontrados,
            'totalCelulares'=>count($certificados)
        );

        echo json_encode($retorno);
    } catch (Exception $e ) {
        echo var_dump($e->getMessage());
    }

}
?>