<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

if ($_POST['funcao']=='carregar_prospects') carregarProspects();
if ($_POST['funcao']=='carregar_filtros_prospects') carregarFiltrosProspects();

function carregarFiltrosProspects() {
    try {
        $usuarioLogado = ControleAcesso::getUsuarioLogado();
        $cUsuarios =  new Criteria();
        $cUsuarios->add(UsuarioPeer::SITUACAO, -1, Criteria::NOT_EQUAL );

        /*SE FOR DIRETORIA MOSTRA TUDO (OU SEJA, NAO ENTRA NO IF)*/
        if (($usuarioLogado->getPerfilId() != 4) && ($usuarioLogado->getPerfilId()!=11)) {
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
                $cUsuarios->add(UsuarioPeer::ID, $usuariosLocais, Criteria::IN);
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
                $cUsuarios->add(UsuarioPeer::ID, $usuariosParceiro, Criteria::IN);
            }

            if ( (count($usuariosParceiro) == 0 ) && (count($usuariosLocais) == 0 ))
                $cUsuarios->add(UsuarioPeer::ID, $usuarioLogado->getId());

        }

        $cUsuarios->addAscendingOrderByColumn(UsuarioPeer::NOME);
        $usuariosObj = UsuarioPeer::doSelect($cUsuarios);


        $usuarios = array();
        $usuarios[] = array("id"=>'', "nome"=>utf8_encode('Selecione o Usuário'));
        foreach ($usuariosObj as $usuario)
            $usuarios[] = array("id"=>$usuario->getId(), "nome"=>utf8_encode(strtoupper($usuario->getNome())));

        $resultado = array(
            'mensagem'=>'Ok', 'usuarios'=>json_encode( $usuarios),
        );

        echo json_encode($resultado);

    } catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}

function carregarProspects() {
    $usuarioLogado = ControleAcesso::getUsuarioLogado();

    $cProspect = new Criteria();
    $cProspect->add(ProspectPeer::SITUACAO , 0);
    //$cProspect->add(ProspectPeer::USUARIO_ID , $usuarioLogado->getId());

    if($usuarioLogado->getPerfilId() == 1){
        $cProspect->addOr(ProspectPeer::SUPERVISOR_USUARIO_ID , $usuarioLogado->getId());
    }
    if( ($_POST['filtro_tipo'] == 'renovacao') || ($_GET['filtro_tipo'] == 'renovacao')){
        $cProspect->add(ProspectPeer::PROSPECT_TIPO_ID, 3);
    }elseif(($_POST['filtro_tipo'] == 'contador') || ($_GET['filtro_tipo'] == 'contador') ){
        $cProspect->add(ProspectPeer::PROSPECT_TIPO_ID, 2);
    }elseif(($_POST['filtro_tipo'] == 'cobranca') || ($_GET['filtro_tipo'] == 'cobranca') ){
        $cProspect->add(ProspectPeer::PROSPECT_TIPO_ID, 1);
    }

    if ($_GET['filtro_contactado']=='sim' ) {
        //SE FOI ESCOLHIDO FILTRO CONTACTADO E FOI ESCOLHIDO ENTRE DATAS
        if ($_GET['filtro_datas'] && $_GET['filtro_detalhe']=='entre_datas') {
            $datas = explode(',', $_GET['filtro_datas']);
            $dataDe = explode('/',$datas[0]);
            $dataAte = explode('/',$datas[1]);
            $cProspect->add(ProspectPeer::DATA_ULTIMO_CONTATO, $dataDe[2].'-'.$dataDe[1].'-'.$dataDe[0], Criteria::GREATER_EQUAL);
            $cProspect->addAnd(ProspectPeer::DATA_ULTIMO_CONTATO, $dataAte[2].'-'.$dataAte[1].'-'.$dataAte[0], Criteria::LESS_EQUAL);
        }elseif ($_GET['filtro_datas'] && $_GET['filtro_detalhe']=='todos') {
            $cProspect->add(ProspectPeer::DATA_ULTIMO_CONTATO, null, Criteria::ISNOTNULL);
        }

    }else{
        $cProspect->add(ProspectPeer::DATA_ULTIMO_CONTATO, NULL, Criteria::ISNULL);
    }

    $cProspect->add(ProspectPeer::DATA_AGENDAMENTO, NULL, Criteria::ISNULL);

    $qtdTotal = ProspectPeer::doCount($cProspect);

    if ($_POST['pagina'])
        $offSet =  ($_POST['pagina']- 1) * $_POST['itensPorPagina'];
    else
        $offSet = 0;

    $cProspect->setOffset($offSet);
    $cProspect->setLimit($_POST['itensPorPagina']);

    $prospectsObj = ProspectPeer::doSelect($cProspect);


    $prospects = array();
    $i = $offSet+ 1;
    foreach ($prospectsObj as $prospect) {
        $cliente = $prospect->getCertificado()->getClienteId()." - ";
        if($prospect->getCertificado()->getCliente()->getRazaoSocial())
            $cliente .= $prospect->getCertificado()->getCliente()->getRazaoSocial();
        else
            $cliente .= $prospect->getCertificado()->getCliente()->getNomeFantasia();

        if($prospect->getProspectTipoId() == 1 ) {
            $tipo = "<i class='fa fa-square fa-lg' style='color:orange; '></i>";
        } elseif ($prospect->getProspectTipoId() == 3 ) {
            $tipo = "<i class='fa fa-square fa-lg' style='color:blue; '></i>";
        } elseif ($prospect->getCertificado()->getDataValidacao() && $prospect->getProspectTipoId() != 3) {
            $tipo = "<i class='fa fa-flag fa-lg' style='color:black; '></i>";
        }

        if ($prospect->getCertificado()->getLocal())
            $local = $prospect->getCertificado()->getLocal()->getNome();
        else
            $local = '-';

        $prospects[] =  array(' '=>($i++),'Id'=>$prospect->getId(),'Nome'=>utf8_encode($cliente),'Dt.Compra'=>$prospect->getCertificado()->getDataCompra('d/m/Y'),
            'Produto'=> utf8_encode($prospect->getCertificado()->getProduto()->getNome()),
            utf8_encode('Dt.Validação')=> $prospect->getCertificado()->getDataValidacao('d/m/Y'),
            utf8_encode('Último Contato')=> $prospect->getDataUltimoContato('d/m/Y H:i'),
            'Consultor'=> utf8_encode($prospect->getCertificado()->getUsuario()->getNome()),
            'Local'=>utf8_encode($local),
            'Tipo'=> $tipo,
            utf8_encode('Ação')=>'<button type="submit" class="icon-button" name="atenderCliente" value="" data-toggle="modal" ><i class="fa fa-phone fa-lg"></i></button>'
        );

    }

    $colunas = array(
        array('nome'=>' '),array('nome'=>'Id'),array('nome'=>'Nome'), array('nome'=>'Dt.Compra'),  array('nome'=>'Produto'),
        array('nome'=>utf8_encode('Dt.Validação')), array('nome'=>utf8_encode('Último Contato')),
        array('nome'=>'Consultor'), array('nome'=>'Local'),
        array('nome'=>'Tipo'),array('nome'=>utf8_encode('Ação'))
    );

    echo json_encode(
        array(
            'mensagem'=>'Ok',
            'dados'=>json_encode($prospects),
            'colunas'=>json_encode($colunas),
            'quantidadeProspects'=>$qtdTotal,
        )
    );
}
?>