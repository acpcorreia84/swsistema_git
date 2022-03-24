<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

$funcao = $_REQUEST['funcao'];
if($funcao == 'bloquear_usuario'){bloquearUsuario();}
if($funcao == 'apagar_usuario'){apagarUsuario();}
if($funcao == 'carregar_usuarios'){carregarUsuarios();}
if($funcao == 'salvar_usuario'){salvarUsuario();}
if($funcao == 'carregar_dados_usuario'){carregarDadosUsuario();}
if($funcao == 'carregar_campos_modal_inserir_editar_usuario'){carregarCamposModalInserirEditarUsuario();}
if($funcao == 'resetar_senha_usuario'){resetarSenhaUsuario();}
if($funcao == 'carregar_modal_detalhes_usuario'){carregarModalDetalhesUsuario();}
if($funcao == 'vincular_local_usuario'){vincularLocalUsuario();}
if($funcao == 'desvincular_local_usuario'){desvincularLocalUsuario();}
if($funcao == 'registrar_comissao_usuario') {registrarComissaoUsuario();}
if($funcao == 'apagar_registro_comissao_usuario') {apagarRegistroComissaoUsuario();}

if($funcao == 'carregar_usuarios_relatorio_comissao') {carregarUsuariosRelatorioComissao();}
if($funcao == 'informar_pagamento_extorno_comissao_usuario') {informarPagamentoExtornoComissaoUsuario();}
if($funcao == 'registrar_lancamento_comissao_usuario') {registrarLancamentoComissaoUsuario();}
if($funcao == 'apagar_lancamento_comissao_usuario') {apagarLancamentoComissaoUsuario();}

function carregarUsuarios (){
    try {

        $cUsuario = new Criteria();
        // POR MOTIVOS DE 0 PARA ATIVO E 1 PARA BLOQUADO VAMOS IGNORAR O -1 POIS CORRESPONDE A EXCLUSÃO

        if (isset($_POST['filtros'])) {
            if ($_POST['filtros']['campoFiltro']) {
                $campoFiltro = key($_POST['filtros']['campoFiltro']);
                $valorCampoFiltro = $_POST['filtros']['campoFiltro'][key($_POST['filtros']['campoFiltro'])];
            }

            if ($_POST['filtros']['filtroBloqueados']=='true') {
                $cUsuario->add(UsuarioPeer::SITUACAO, 1);
            } else
                $cUsuario->add(UsuarioPeer::SITUACAO, -1, Criteria::NOT_EQUAL);

            /*
             * FILTRA USUARIOS (APENAS COMISSIONADOS) DOS CARGOS:
             * 23: SUPERVISOR COMERCIAL
             * 9: CONSULTOR
             * 10: CONSULTOR / AGR
            */
            if ($_POST['filtros']['filtroComissionados']=='true')
                $cUsuario->add(UsuarioPeer::CARGO_ID, array(23,9,10), Criteria::IN);
        }

        /*SE FOR SELECIONADO ALGUM CAMPO DE FILTRO PADRAO INSERE NO CRITERIO*/
        if ( ($campoFiltro) && ($valorCampoFiltro) ) {
            $cUsuario->add($campoFiltro, $valorCampoFiltro . "%", Criteria::LIKE);
        }


        $quantidadeTotalUsuarios = UsuarioPeer::doCount($cUsuario);

        $cUsuario->addAscendingOrderByColumn(UsuarioPeer::NOME);
        if ($_POST['pagina'])
            $offSet =  ($_POST['pagina']- 1) * $_POST['itensPorPagina'];
        else
            $offSet = 0;

        $cUsuario->setLimit($_POST['itensPorPagina']);
        $cUsuario->setOffset($offSet);

        $usuariosObj = UsuarioPeer::doSelect($cUsuario);
        $usuarios = array();
        $i = $offSet+ 1;

        foreach ($usuariosObj as $key=>$usuario) {
            /*SITUACAO = 1 (BLOQUEADO | SITUACAO = 0 (ATIVO) | SITUACAO = -1 (APAGADO)*/
            if ($usuario->getSituacao()== 0) $iconeBloqueio ='<a class="btn btn-success" id="btnBloqueio'.$usuario->getId().'"><i class="fa fa-unlock" aria-hidden="true" title="Usu&acute;rio desbloqueado"></i></a>'; else $iconeBloqueio = ' <a class="btn btn-danger" id="btnBloqueio'.$usuario->getId().'"><i class="fa fa-lock" aria-hidden="true" title="Usu&acute;rio bloqueado"></i></a>';

            $acaoBloquear = '<script>$("#btnBloqueio'.$usuario->getId().'").on("click", function(){
                    ezBSAlert({
                    type: "confirm",
                    messageText: "Tem certeza que deseja bloquear o usu&aacute;rio '.utf8_encode($usuario->getNome()).'?",
                    alertType: "info"
                    }).done(function (e) {
                        if (e === true)
                            bloquearUsuario('.$usuario->getId().');
                    });
                    });</script>';

            $iconeSetor = '<i class="fa fa-circle fa-lg" style="color:'.$usuario->getSetor()->getCor().'" title="'.$usuario->getSetor()->getNome().'"></i>';
            $iconeDetalhar = '<button class="btn btn-primary" onclick="$(\'#modalUsuarioDetalhar\').modal(\'show\'); carregarModalDetalhesUsuario(\''.$usuario->getId().'\')" ><i class="fa fa-arrows" aria-hidden="true" title="Detalhar us&aacute;rio"></i></button> ';

            $usuariosLocaisObj = $usuario->getUsuariosLocaisUsuario();
            $usuariosLocaisUsuarios = '';
            foreach ($usuariosLocaisObj as $usuariosLocais)
                $usuariosLocaisUsuarios .= '-'.utf8_encode($usuariosLocais->getNome()) ."\n";

            if ($usuariosLocaisUsuarios)
                $iconeUsuarios = '<a href="#"><i class="fa fa-users" aria-hidden="true" title="USU&Aacute;RIOS: '.$usuariosLocaisUsuarios.'"></i></a>';
            else
                $iconeUsuarios = '-';

            $usuarios[] =  array(' '=>($i++),'Id'=>$usuario->getId(),'.'=>$iconeSetor,'Nome'=>utf8_encode($usuario->getNome()),
                utf8_encode('Último Acesso')=> ($usuario->getDataUltimoAcesso('d/m/Y'))?$usuario->getDataUltimoAcesso('d/m/Y H:i:s'):'---',
                utf8_encode('Expiração')=> ($usuario->getDataExpiracaoSenha('d/m/Y'))?$usuario->getDataExpiracaoSenha('d/m/Y'):'---', 'Cpf'=>$usuario->getCpf(),
                'Local'=> $usuario->getLocal()?utf8_encode($usuario->getLocal()->getNome()):'-','Perfil'=> utf8_encode($usuario->getPerfil()->getNome()),
                'Bloq.'=>$iconeBloqueio,'Url'=> ($usuario->getUrl())?$usuario->getUrl():'---','..'=>$iconeUsuarios,
                utf8_encode('Ação')=>$iconeDetalhar . $acaoBloquear
            );
        }
        $colunas = array(
            array('nome'=>' '),array('nome'=>'Id'),array('nome'=>'.'), array('nome'=>'Nome'),  array('nome'=>utf8_encode('Último Acesso')),
            array('nome'=>utf8_encode('Expiração')), array('nome'=>'Cpf'),
            array('nome'=>'Local'), array('nome'=>'Perfil'),
            array('nome'=>'Bloq.'),array('nome'=>'..'), array('nome'=>utf8_encode('Ação'))
        );

        $retorno = array();
        $retorno['mensagem'] = 'Ok';
        $retorno['colunas'] = json_encode($colunas);
        $retorno['dados'] = json_encode($usuarios);
        $retorno['quantidadeTotalUsuarios'] = $quantidadeTotalUsuarios;

        echo json_encode($retorno);
    }catch(Exception $e){
        echo var_dump($e->getMessage());
    }

}
function bloquearUsuario (){
    $usuarioId = $_POST['usuarioId'];

    try{
        $usuario = UsuarioPeer::retrieveByPK($usuarioId);
        /*SE TIVER 1 = BLOQUEADO SE FOR 0 = DESBLOQUEADO*/
        if ($usuario->getSituacao()==1)
            $usuario->setSituacao(0);
        else
            $usuario->setSituacao(1);

        $usuario->save();

        echo 'Ok';
    }catch(Exception $e){
        echo $e->getMessage();
    }
}


function apagarUsuario (){
    $usuarioId = $_POST['usuarioId'];

    try{
        $usuario = UsuarioPeer::retrieveByPK($usuarioId);
        $usuario->setSituacao(-1);
        $usuario->save();

        echo 'Ok';
    }catch(Exception $e){
        echo $e->getMessage();
    }
}

function salvarUsuario(){
    try {
        if ($_POST['idUsuario'])
            $usuario = UsuarioPeer::retrieveByPK($_POST['idUsuario']);
        else {
            $usuario = new Usuario();
            $usuario->setDataCadastro(date('Y-m-d H:i:s'));
            /*SENHA EXPIRA DAQUI A 3 MESES*/
            $usuario->setDataExpiracaoSenha(date('Y-m-d'));
            $usuario->setSituacao(0);
        }

        $usuario->setNome(utf8_decode($_POST['nome']));
        $nascimento = explode('/',$_POST['nascimento']);

        $usuario->setNascimento($nascimento[2] . '-'.$nascimento[1] . '-'.$nascimento[0]);
        $usuario->setCpf($_POST['cpf']);
        $usuario->setEndereco(utf8_decode($_POST['endereco']));
        $usuario->setNumero($_POST['numero']);
        $usuario->setBairro(utf8_decode($_POST['bairro']));
        $usuario->setCidade(utf8_decode($_POST['cidade']));
        $usuario->setComplemento(utf8_decode($_POST['complemento']));
        $usuario->setEmail($_POST['email']);
        $usuario->setUf($_POST['uf']);
        $usuario->setCep($_POST['cep']);
        $usuario->setFone($_POST['fone']);
        $usuario->setCelular($_POST['celular']);
        $usuario->setLocalId($_POST['local']);
        $usuario->setSetorId($_POST['setor']);
        $usuario->setPerfilId($_POST['perfil']);
        $usuario->setCargoId($_POST['cargo']);
        $usuario->setLimiteQuantidade($_POST['limite_quantidade']);
        $usuario->setMargemDesconto($_POST['margem_desconto']);
        $usuario->setGrupoProdutoId(1);


        $usuario->save();
        echo 'Ok';

    }catch(Exception $e){
        if ($e->getCause()->getCode() == '23000')
            echo "J&aacute; existe um usu&aacute;rio com este e-mail no banco!";
        else
            echo var_dump($e->getMessage());

    }
}

function carregarDadosUsuario() {
    try{
        $usuario = UsuarioPeer::retrieveByPK($_POST['usuarioId']);

        $retorno =  array('nome'=>utf8_encode($usuario->getNome()), 'nascimento'=> $usuario->getNascimento('d/m/Y'), 'cpf'=> $usuario->getCpf(), 'endereco'=> utf8_encode($usuario->getEndereco()),
            'numero'=> $usuario->getNumero(), 'bairro'=> utf8_encode($usuario->getBairro()), 'cidade'=> utf8_encode($usuario->getCidade()), 'complemento'=> utf8_encode($usuario->getComplemento()),
            'email'=> $usuario->getEmail(), 'uf'=> $usuario->getUf(), 'cep'=> $usuario->getCep(),
            'local'=> $usuario->getLocalId(), 'celular'=>$usuario->getCelular(), 'fone'=> $usuario->getFone(), 'setor' => $usuario->getSetorId(), 'perfil'=>$usuario->getPerfilId(),
            'cargo'=>$usuario->getCargoId(), 'limiteQuantidade'=>$usuario->getLimiteQuantidade(), 'margemDesconto'=>$usuario->getMargemDesconto()
        );

        echo json_encode(
            array('mensagem'=>'Ok', 'dadosUsuario'=>json_encode($retorno))
        );
    }catch(Exception $e){
        echo $e->getMessage();
    }

}
function carregarCamposModalInserirEditarUsuario() {
    $cPerfil = new Criteria();
    $cPerfil->add(PerfilPeer::SITUACAO, 0);
    $cPerfil->addAscendingOrderByColumn(PerfilPeer::NOME);
    $perfisObj = PerfilPeer::doSelect($cPerfil);

    $perfis = array();
    $perfis[] = array('id'=>'', 'nome'=>'Escolha um Perfil');
    foreach ($perfisObj as $perfil) {
        $perfis[] = array('id'=>$perfil->getId(), 'nome'=>utf8_encode($perfil->getNome()));
    }

    $clocais = new Criteria();
    $clocais->add(LocalPeer::SITUACAO, 0);
    $locaisObj = LocalPeer::doSelect($clocais);

    $locais = array();
    $locais[] = array('id'=>'', 'nome'=>'Escolha um local');
    foreach ($locaisObj as $local) {
        $locais[] = array('id'=>$local->getId(), 'nome'=>utf8_encode($local->getNome()));
    }


    $cSetores = new Criteria();
    $setoresObj = SetorPeer::doSelect($cSetores);

    $setores = array();
    $setores[] = array('id'=>'', 'nome'=>'Escolha um setor');
    foreach ($setoresObj as $setor) {
        $setores[] = array('id'=>$setor->getId(), 'nome'=>utf8_encode($setor->getNome()));
    }

    $cCargos = new Criteria();
    $cCargos->add(CargoPeer::APAGADO, 0);
    $cargosObj = CargoPeer::doSelect($cCargos);

    $cargos = array();
    $cargos[] = array('id'=>'', 'nome'=>'Escolha um cargo');
    foreach ($cargosObj as $cargo) {
        $cargos[] = array('id'=>$cargo->getId(), 'nome'=>utf8_encode($cargo->getNome()));
    }

    $retorno = array('mensagem'=>'Ok','perfis'=>json_encode($perfis), 'locais'=>json_encode($locais), 'setores'=>json_encode($setores), 'cargos'=>json_encode($cargos));

    echo json_encode($retorno);


}

function resetarSenhaUsuario() {
    $usuarioId = $_POST['idUsuario'];

    try{
        $con = Propel::getConnection();
        $con->beginTransaction();
        $usuario = UsuarioPeer::retrieveByPK($usuarioId);
        $senhaProvisoria = hash('ripemd160', $usuario->getEmail() . $usuario->getCpf() . $usuario->getCelular() . rand());
        $usuario->setSenha(substr($senhaProvisoria, 0, 30));
        $usuario->save();
// To send HTML mail, the Content-type header must be set
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Additional headers
/*        $headers[] = 'To: '.$usuario->getNome() . ' <' .$usuario->getEmail() .'>';
        $headers[] = 'From: Sistema SW <pedro.souza@arsw.com.br>';
        $headers[] = 'Cc: melo.joao85@gmail.com';*/

        $body = '';
        $body .= "Ol&aacute; <strong>".trim(removeEspeciais(strtoupper($usuario->getNome()))).",</strong><br><br>";
        $body .= "Tudo bem?<br/>";
        $body .= "<br/>";
        $body .= "Conforme solicitado, pelo usu&aacute;rio ".$usuario->getNome(). " sua senha foi resetada. Utilize no seu pr&oacute;ximo login os dados abaixo:<br>";
        $body .= "<br>";
        $body .= "<strong>Login:</strong> ".$usuario->getEmail()."<br>";
        $body .= "<strong>Senha Provis&oacute;ria:</strong> ".substr($senhaProvisoria, 0, 30)."<br>";
        $body .= "<strong>Endere&ccedil;o:</strong> http://www.swsistema.com.br<br>";

        $body .= "<p style='size:25px'>Data e Hora da Solicita&ccedil;&atilde;o:".date('d/m/Y')." Hora:".date('H:i:s')."</p>";

        mail( $usuario->getEmail(), 'Alteração de senha do usuário', $body, implode("\r\n", $headers) );

        $con->commit();
        echo json_encode(array('mensagem'=>'Ok', 'email'=>$usuario->getEmail(), 'usuario'=>$usuario->getNome()));
    }catch(Exception $e){
        $con->rollBack();
        echo $e->getMessage();
    }

}

function carregarModalDetalhesUsuario() {

    try{
        $usuario = UsuarioPeer::retrieveByPK($_POST['idUsuario']);

        $retorno = array(
            'id'=>$usuario->getId(),
            'nome'=>utf8_encode($usuario->getNome()),
            'email'=>$usuario->getEmail(),
            'endereco'=>utf8_encode($usuario->getEndereco() .','. $usuario->getBairro() .','. $usuario->getNumero() .','. $usuario->getCidade() .'-'. $usuario->getUf()),
            'fone'=>$usuario->getCelular(), 'local'=>utf8_encode($usuario->getLocal()->getNome()),
        );

        $usuariosLocaisObj = $usuario->getUsuariosLocaisUsuario();
        $arrIdsUsuarios = array();
        $usuariosLocais = array();
        $locaisUsuarioObj = array();
        $arrIdsLocais = array();

        foreach ($usuariosLocaisObj as $usuarioLocal) {
            if (array_key_exists($usuarioLocal->getLocalId(), $locaisUsuarioObj)=== false) {
                $locaisUsuarioObj[$usuarioLocal->getLocalId()] = utf8_encode($usuarioLocal->getLocal()->getNome());
                $arrIdsLocais[] = $usuarioLocal->getLocalId();
            }

            $arrIdsUsuarios[] = $usuarioLocal->getId();

            $usuariosLocais[] =  array('Id'=>$usuarioLocal->getId(),'Nome'=>utf8_encode($usuarioLocal->getNome()),
                'Local'=> $usuarioLocal->getLocal()?utf8_encode($usuarioLocal->getLocal()->getNome()):'-',
                'Perfil'=> utf8_encode($usuarioLocal->getPerfil()->getNome()),
            );

        }

        $arrLocais = array();
        foreach ($locaisUsuarioObj as $id =>$local) {
            $btnApagarLocalUsuario = '<button title="Desvincular Local" id="btnApagarLocalUsuario'.$id.'"> <i class="fa fa-trash"></i> </button>';
            $btnApagarLocalUsuario .= '<script>$("#btnApagarLocalUsuario'.$id.'").on("click", function(){
                                ezBSAlert({
                                    type: "confirm",
                                    messageText: "Tem certeza que deseja desvincular o local '.$local.' deste usu&aacute;rio ?",
                                    alertType: "info"
                                }).done(function (e) {
                                    if (e === true)
                                        desvincularLocalUsuario('.$id.');
                                });
                            });</script>';
            $btnApagarLocalUsuario .= '';
            $arrLocais[] = array('Id'=>$id, 'Local'=>$local, utf8_encode('Açao')=>$btnApagarLocalUsuario);
        }

        $colunasLocaisUsuario = array(
            array('nome'=>'Id'),array('nome'=>'Local'), array('nome'=>utf8_encode('Açao'))
        );
        $colunasUsuariosLocais = array(
            array('nome'=>'Id'),array('nome'=>'Nome'),
            array('nome'=>'Local'), array('nome'=>'Perfil')
        );

        /*
         * CARREGAR DADOS DO SELECT DE LOCAIS
         * */

        $cLocais = new Criteria();
        $cLocais->add(LocalPeer::SITUACAO, 0);
        $cLocais->addAscendingOrderByColumn(LocalPeer::NOME);
        $locaisObj = LocalPeer::doSelect($cLocais);

        $locais = array();
        $locais[] = array('id'=>'', 'nome'=>'Escolha um local para vincular');
        foreach ($locaisObj as $local) {
            $locais[] = array('id'=>$local->getId(), 'nome'=>utf8_encode($local->getNome()));
        }

        /*
         * CODIGO DE COMISSAO DE CERTIFICADOS DO USUARIO
         * CARREGANDO CERTIFICADOS DOS USUARIOS DE CARGOS
         * 23: SUPERVISOR COMERCIAL
         * 9: CONSULTOR
         * 10: CONSULTOR / AGR
        */
        $vendas = array("valorVendas"=>0.0, "qtdVendas"=>0, 'certificados'=>array(), 'colunas'=>'');

        if (($usuario->getCargoId() == 23) || ($usuario->getCargoId() == 9) || ($usuario->getCargoId() == 10)) {
            $cComissaoUsuarios = new Criteria();
            if ($arrIdsLocais) {
                $cComissaoUsuarios->add(CertificadoPeer::USUARIO_ID, $usuario->getId());
                $cComissaoUsuarios->addOr(CertificadoPeer::LOCAL_ID, $arrIdsLocais, Criteria::IN);
            } else
                $cComissaoUsuarios->add(CertificadoPeer::USUARIO_ID, $usuario->getId());

            $cComissaoUsuarios->add(CertificadoPeer::APAGADO, 0);
            if ($_POST['filtroDataComissao'])
                $filtroData = explode(',',$_POST['filtroDataComissao']);

            if ( $filtroData ) {
                $dataDe = explode('/',$filtroData[0]);
                $dataAte = explode('/',$filtroData[1]);

                $cComissaoUsuarios->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, $dataDe[2].'/'.$dataDe[1].'/'.$dataDe[0] . ' 00:00:00', Criteria::GREATER_EQUAL);
                $cComissaoUsuarios->addAnd(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, $dataAte[2].'/'.$dataAte[1].'/'.$dataAte[0] . ' 23:59:59', Criteria::LESS_EQUAL);
            } else {
                $cComissaoUsuarios->add(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, date('Y').'-'.(date('m')-1).'-01 00:00:00', Criteria::GREATER_EQUAL);
                $cComissaoUsuarios->addAnd(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO, date('Y').'-'.(date('m')-1).'-'.getLastDayOfMonth((date('m')-1), date('Y')) . ' 23:59:59', Criteria::LESS_EQUAL);
            }
            $cComissaoUsuarios->add(CertificadoPeer::CONFIRMACAO_VALIDACAO , array(0,1,2,3) , Criteria::IN);
            $certificadosUsuarios = CertificadoPeer::doSelectJoinAll($cComissaoUsuarios);
            $somaProdutosVendidos = 0.0;
            $h = 0;
            $arrCertificadosProdutosComissionados = array();
            foreach ($certificadosUsuarios as $key=>$certificado) {
                /*
                 * CONSULTA SE O CERTIFICADO TEM COMISSAO ESPECI
                 * */
                if (($certificado->getProduto()->getComissao() > 0) && ($certificado->getUsuarioId() == $usuario->getId())) {
                    $arrCertificadosProdutosComissionados[] = $certificado;
                } else {
                    if($certificado->getConfirmacaoValidacao()) {
                        /*
                         * CONFIRMACAO VALIDACAO = 1 EMITIDO OU APROVADO
                         * CONFIRMACAO VALIDACAO = 2 PENDENTE
                         * CONFIRMACAO VALIDACAO = 3 RENOVACAO
                         * CONFIRMACAO VALIDACAO = 4 REVOGADO
                        */
                        if ($certificado->getConfirmacaoValidacao() == 1)
                            $situacao = '<a data-toggle="modal" data-target="#detalharCertificado" title="Detalhar Certificado" id="btnDetalharCertificado" onclick="$(\'#modalCarregando\').modal(\'show\'); carregarModalDetalharCertificado('.$certificado->getId().', \'sim\');"><i class="fa fa-flag" aria-hidden="true" style="color:#096;" title="validado em '.$certificado->getDataValidacao('d/m/Y').' Agr: '.(($certificado->getUsuarioValidouId())?$certificado->getUsuarioRelatedByUsuarioValidouId()->getNome():'---').'"></i></a>';
                        elseif ($certificado->getConfirmacaoValidacao() == 2)
                            $situacao = '<a data-toggle="modal" data-target="#detalharCertificado" title="Detalhar Certificado" id="btnDetalharCertificado" onclick="$(\'#modalCarregando\').modal(\'show\'); carregarModalDetalharCertificado('.$certificado->getId().', \'sim\');"><i class="fa fa-flag" aria-hidden="true" style="color:#fff847" title="validado em '.$certificado->getDataValidacao('d/m/Y').' Agr: '.(($certificado->getUsuarioValidouId())?$certificado->getUsuarioRelatedByUsuarioValidouId()->getNome():'---'). '(pendente)"></i></a>';
                        elseif ($certificado->getConfirmacaoValidacao() == 3)
                            $situacao = '<a data-toggle="modal" data-target="#detalharCertificado" title="Detalhar Certificado" id="btnDetalharCertificado" onclick="$(\'#modalCarregando\').modal(\'show\'); carregarModalDetalharCertificado('.$certificado->getId().', \'sim\');"><i class="fa fa-flag" aria-hidden="true" style="color:#fff847" title="validado em '.$certificado->getDataValidacao('d/m/Y').' Agr: '.(($certificado->getUsuarioValidouId())?$certificado->getUsuarioRelatedByUsuarioValidouId()->getNome():'---').' (renovado)"></i></a>';
                        elseif ($certificado->getConfirmacaoValidacao() == 4)
                            $situacao = '<a data-toggle="modal" data-target="#detalharCertificado" title="Detalhar Certificado" id="btnDetalharCertificado" onclick="$(\'#modalCarregando\').modal(\'show\'); carregarModalDetalharCertificado('.$certificado->getId().', \'sim\');"><i class="fa fa-flag" aria-hidden="true" style="color:#ac2925" title="revogado em '.$certificado->getDataValidacao('d/m/Y').' Agr: '.(($certificado->getUsuarioValidouId())?$certificado->getUsuarioRelatedByUsuarioValidouId()->getNome():'---').'"></i></a>';
                    }
                    else
                        $situacao = ' <a data-toggle="modal" data-target="#detalharCertificado" title="Detalhar Certificado" id="btnDetalharCertificado" onclick="$(\'#modalCarregando\').modal(\'show\'); carregarModalDetalharCertificado('.$certificado->getId().', \'sim\');"> <i class="fa fa-arrows"></i> </a>';
                    //$certificado = new Certificado();
                    $nomeCliente = ($certificado->getCliente()->getRazaoSocial() != '')?utf8_encode($certificado->getCliente()->getRazaoSocial()):utf8_encode($certificado->getCliente()->getNomeFantasia());
                    $usuarioConsultor = $certificado->getUsuario()?$certificado->getUsuario()->getNome():'---';
                    $produto = ($certificado->getProduto()) ? $certificado->getProduto()->getNome() : '---';

                    $somaProdutosVendidos += $certificado->getProduto()->getPreco() - $certificado->getDesconto();
                    $vendas['valorVendas'] += $certificado->getProduto()->getPreco() - $certificado->getDesconto();
                    $vendas['qtdVendas'] += 1;

                    $vendas['certificados'][] = array(' '=>(++$h),'Id'=>$certificado->getId(),
                        'D.Pag.'=>'<span tile="'.$certificado->getDataCompra('d/m/Y').'">'.$certificado->getDataConfirmacaoPagamento('d/m/Y').'</span>',
                        'D.Com.'=>($certificado->getDataCompra('d/m/Y'))?$certificado->getDataCompra('d/m/Y'):'---',
                        'Cliente'=> $certificado->getCliente()->getId() . ' - '.$nomeCliente,
                        'Tipo'=>utf8_encode($produto),
                        'Consultor'=>utf8_encode($usuarioConsultor),
                        'Tot'=>formataMoeda($certificado->getProduto()->getPreco() - $certificado->getDesconto()),
                        '.'=>utf8_encode($situacao),
                    );
                    $vendas['colunas'] = array(
                        array('nome'=>' '), array('nome'=>'Id'), array('nome'=>'D.Pag.'),array('nome'=>'D.Com.'), array('nome'=>'Cliente'),
                        array('nome'=>'Tipo'), array('nome'=>'Consultor'), array('nome'=>'Tot'), array('nome'=>'.')
                    );
                }


            }
            /*
             * FIM DO FOR DE MONTAGEM DO ARRAY DE CERTIFICADOS
             * */
        }
        /*
         * FIM DO IF QUE TESTA SE O CARGO DO USUARIO E SUPERVISOR, CONSULTOR OU AGR
         * */


        /*
         * MONTAGEM DO QUADRO RESUMO
        */
        $cRegistroComissao = new Criteria();
        $cRegistroComissao->add(UsuarioComissionamentoPeer::USUARIO_ID, $usuario->getId());
        $cRegistroComissao->add(UsuarioComissionamentoPeer::SITUACAO, -1, Criteria::NOT_EQUAL);
        if ($filtroData) {
            $cRegistroComissao->add(UsuarioComissionamentoPeer::PERIODO_INICIAL, $dataDe[2].'/'.$dataDe[1].'/'.$dataDe[0]);
            $cRegistroComissao->add(UsuarioComissionamentoPeer::PERIODO_FINAL, $dataAte[2].'/'.$dataAte[1].'/'.$dataAte[0]);
        } else {
            $cRegistroComissao->add(UsuarioComissionamentoPeer::PERIODO_INICIAL, date('Y').'-'.(date('m')-1).'-01');
            $cRegistroComissao->add(UsuarioComissionamentoPeer::PERIODO_FINAL, date('Y').'-'.(date('m')-1).'-'.getLastDayOfMonth((date('m')-1), date('Y')));
        }
        $registroComissao = UsuarioComissionamentoPeer::doSelectOne($cRegistroComissao);

        $somaTotalDescontos = 0.0;
        $somaTotalAcrescimos = 0.0;
        $quadroResumo = array();

        /*
         * CASO JA TENHA REGISTRADO OS LANCAMENTOS MOSTRA TODOS OS REGISTROS, CASO CONTRARIO
         * LISTA APENAS OS CERTIFICADOS REVOGADOS
         *
         * */
        if ($registroComissao) {
            $iconeApagarRegistro = ' <button id="btnApagarRegistroComissao"><i class="fa fa-trash-o" aria-hidden="true" title="Apagar Registro Comiss&atilde;o"></i></button>';
            /*CHAMA A FUNCAO DE CONFIRMACAO*/
            $iconeApagarRegistro .= '<script>$("#btnApagarRegistroComissao").on("click", function(){
                        ezBSAlert({
                        type: "confirm",
                        messageText: "Tem certeza que deseja apagar o registro desta comiss&atilde;o?",
                        alertType: "info"
                        }).done(function (e) {
                            if (e === true)
                                apagarRegistroComissaoUsuario('.$registroComissao->getId().');
                        });
                        });</script>';

            if ($registroComissao->getComissaoVenda())
                $coeficienteVenda = $registroComissao->getComissaoVenda() / 100;
            else
                $coeficienteVenda = 0.0;

            $tituloReceita = 'Receitas: '.formataMoeda($registroComissao->getVenda());
            $registrou = 'sim';
            $dataRegistro = $registroComissao->getDataRegistro('d/m/Y');
            $periodoRegistro = 'De ' . $registroComissao->getPeriodoInicial('d/m/Y') . ' - ' . 'Ate' . ' '.$registroComissao->getPeriodoFinal('d/m/Y');
            $idComissao = $registroComissao->getId();

            $cLancamentosUsuario = new Criteria();
            $cLancamentosUsuario->add(UsuarioLancamentoPeer::SITUACAO, -1, Criteria::NOT_EQUAL);
            $cLancamentosUsuario->addDescendingOrderByColumn(UsuarioLancamentoPeer::DATA_LANCAMENTO);
            $lancamentosComissao = $registroComissao->getUsuarioLancamentos($cLancamentosUsuario);

            $quadroResumo[] = array(utf8_encode('Descrição')=>utf8_encode('Apenas Vendidos ('.$registroComissao->getComissaoVenda().'%)'),
                $tituloReceita=>formataMoeda($registroComissao->getVenda() * $coeficienteVenda), 'Despesas'=> '-'
            );

            /*SOMA TODOS OS COMISSIONAMENTOS DE VENDA VALIDACAO E VENDA E VALIDACAO*/
            $somaTotalAcrescimos += ($registroComissao->getVenda() * $coeficienteVenda);

            /*MOSTRA LANCAMENTO DE ACRESCIMOS*/

            foreach ($lancamentosComissao as $lancamentoComissao) {
                $iconeApagar = ' <button id="btnApagarLancamento'.$lancamentoComissao->getId().'"><i class="fa fa-trash-o" aria-hidden="true" title="Apagar Lan&ccedil;amento"></i></button>';
                /*CHAMA A FUNCAO DE CONFIRMACAO*/
                $acaoApagar = '<script>$("#btnApagarLancamento'.$lancamentoComissao->getId().'").on("click", function(){
                        ezBSAlert({
                        type: "confirm",
                        messageText: "Tem certeza que deseja apagar o lan&ccedil;amento '.utf8_encode($lancamentoComissao->getDescricao()).'?",
                        alertType: "info"
                        }).done(function (e) {
                            if (e === true)
                                apagarLancamentoComissao('.$lancamentoComissao->getId().');
                        });
                        });</script>';

                if ($lancamentoComissao->getTipoLancamento() == 'C') {
                    $quadroResumo[] = array(utf8_encode('Descrição') => utf8_encode($lancamentoComissao->getDescricao()) . $iconeApagar . $acaoApagar,
                        $tituloReceita => formataMoeda($lancamentoComissao->getValor()), 'Despesas' => '-'
                    );

                    $somaTotalAcrescimos += $lancamentoComissao->getValor();
                }

            }
            $quadroResumo[] = array(utf8_encode('Descrição')=>'<span class="text-danger">TOTAL PARCIAL (RECEITAS)</span>',
                $tituloReceita=>'<span class="text-danger">'.formataMoeda($somaTotalAcrescimos).'</span>', 'Despesas'=> '-'
            );


            $quadroResumo[] = array(utf8_encode('Descrição')=>'<strong>Descontos</strong>',
                $tituloReceita=>'', 'Despesas'=>''
            );

            /*MOSTRA LANCAMENTO DE DESEPEAS*/
            foreach ($lancamentosComissao as $lancamentoComissao) {
                $iconeApagar = ' <button id="btnApagarLancamento'.$lancamentoComissao->getId().'"><i class="fa fa-trash-o" aria-hidden="true" title="Apagar Lan&ccedil;amento"></i></button>';
                /*CHAMA A FUNCAO DE CONFIRMACAO*/
                $acaoApagar = '<script>$("#btnApagarLancamento'.$lancamentoComissao->getId().'").on("click", function(){
                        ezBSAlert({
                        type: "confirm",
                        messageText: "Tem certeza que deseja apagar o lan&ccedil;amento '.utf8_encode($lancamentoComissao->getDescricao()).'?",
                        alertType: "info"
                        }).done(function (e) {
                            if (e === true)
                                apagarLancamentoComissao('.$lancamentoComissao->getId().');
                        });
                        });</script>';

                if ($lancamentoComissao->getTipoLancamento() == 'D') {
                    $quadroResumo[] = array(utf8_encode('Descrição') => utf8_encode($lancamentoComissao->getDescricao()) . $iconeApagar . $acaoApagar,
                        $tituloReceita => '-', 'Despesas' => formataMoeda($lancamentoComissao->getValor())
                    );

                    $somaTotalDescontos += $lancamentoComissao->getValor();
                }

            }

            $quadroResumo[] = array(utf8_encode('Descrição')=>'<span class="text-danger">TOTAL PARCIAL (DESCONTOS)</span>',
                $tituloReceita=>'-', 'Despesas'=> '<span class="text-danger">'.formataMoeda($somaTotalDescontos).'</span>'
            );
        } else {

            /*
             * SE FOR SUPERVISOR FIXA A COMISSAO EM 3%
             * CARGO SUPERVISOR : 23
             * */

            if ($usuario->getCargoId() == 23 )
                $coeficienteVenda = 0.03;
            else {
                if ( ($vendas['valorVendas']>14999.99) && ($vendas['valorVendas']<24999.99) )
                    $coeficienteVenda = 0.04;
                elseif ( ($vendas['valorVendas']>25000) && ($vendas['valorVendas']<34999.99) )
                    $coeficienteVenda = 0.05;
                elseif ( ($vendas['valorVendas']>35000) )
                    $coeficienteVenda = 0.055;
                else
                    $coeficienteVenda = 0.0;
            }

            $tituloReceita = 'Receitas: ' . formataMoeda($somaProdutosVendidos);

            /*PASSA PRA A TELA OS VALORES VAZIOS*/
            $registrou = '';
            $dataRegistro = '';
            $periodoRegistro = '';
            $idComissao = '';

            $somaTotalAcrescimos += ($somaTotalDescontos) + ($somaProdutosVendidos * $coeficienteVenda);

            $quadroResumo[] = array(utf8_encode('Descrição') => utf8_encode('Apenas Vendidos ('.($coeficienteVenda*100).'%)'),
                $tituloReceita => formataMoeda($somaProdutosVendidos * $coeficienteVenda), 'Despesas' => '-'
            );

            /*
            * MOSTRA OS PEDIDOS COM COMISSAO DIFERENCIADA, PRODUTOS COM COMISSAO SETADA
            */
            $arrPedidosComissionados = array();
            if ($arrCertificadosProdutosComissionados) {
                foreach ($arrCertificadosProdutosComissionados as $certificado) {
                    $descricao = 'Venda do produto ' . utf8_encode($certificado->getProduto()->getNome()) . ' dia ' . $certificado->getDataCompra('d/m/Y') . ' por ' . formataMoeda($certificado->getProduto()->getPreco() - $certificado->getDesconto()) . ' (' . $certificado->getProduto()->getComissao() . '%)';

                    $coeficienteComissao = $certificado->getProduto()->getComissao() / 100;
                    if ($coeficienteComissao > 0)
                        $comissao = ($certificado->getProduto()->getPreco() - $certificado->getDesconto()) * $coeficienteComissao;

                    $quadroResumo[] = array(utf8_encode('Descrição') => $descricao,
                        $tituloReceita => formataMoeda($comissao), 'Despesas' => '-'
                    );
                    $arrPedidosComissionados[] = array('descricao'=>utf8_encode($descricao  ) ,'valor'=>$comissao);

                    $somaTotalAcrescimos += $comissao;

                }
                $_SESSION['pedidosComissaoDiferenciada'] = serialize($arrPedidosComissionados);
            }

            $quadroResumo[] = array(utf8_encode('Descrição') => '<span class="text-danger">TOTAL PARCIAL (RECEITAS)</span>',
                $tituloReceita => '<span class="text-danger">' . formataMoeda($somaTotalAcrescimos) . '</span>', 'Despesas' => '-'
            );
            $quadroResumo[] = array(utf8_encode('Descrição') => '<strong>Descontos</strong>',
                $tituloReceita => '', 'Despesas' => ''
            );

        }


        /*SE O SALDO FOR POSITIVO COLOCA O TOTAL NAS RECEITAS E SAO COLOCA NAS DESPESAS*/
        if ($somaTotalAcrescimos-$somaTotalDescontos > 0)
            $quadroResumo[] = array(utf8_encode('Descrição')=>'<span class="text-danger">TOTAL GERAL</span>',
                $tituloReceita=>'<span class="text-danger">'.formataMoeda($somaTotalAcrescimos-$somaTotalDescontos).'</span>', 'Despesas'=> '-'
            );
        else
            $quadroResumo[] = array(utf8_encode('Descrição')=>'<span class="text-danger">TOTAL GERAL</span>',
                $tituloReceita=>'-', 'Despesas'=> '<span class="text-danger">'.formataMoeda($somaTotalAcrescimos-$somaTotalDescontos).'</span>'
            );

        $colunasQuadroResumo = array(
            array('nome'=>utf8_encode('Descrição')), array('nome'=>$tituloReceita), array('nome'=>'Despesas')
        );


        $dadosComissao =  array(
            'comissaoVenda'=>$coeficienteVenda*100,
            'vendas'=>formataMoeda($vendas['valorVendas']) . ' ('. $vendas['qtdVendas'].')' ,
            'valorVendas'=>$vendas['valorVendas'],

            'vendas'=>formataMoeda($vendas['valorVendas']) . ' ('. $vendas['qtdVendas'].')' ,
            'valorVendas'=>$vendas['valorVendas'],
            'colunasCertificadosVendidos'=>json_encode($vendas['colunas']), 'certificadosVendidos'=>json_encode($vendas['certificados']),
            'quadroResumo'=>json_encode($quadroResumo), 'colunasQuadroResumo'=>json_encode($colunasQuadroResumo)
        );

        /*
         * FIM DA MONTAGEM DO QUADRO RESUMO
         *
         * */


        echo json_encode(
            array(
                'mensagem'=>'Ok', 'dadosUsuario'=>json_encode($retorno),
                'usuariosLocais'=>json_encode($usuariosLocais), 'colunasUsuariosLocais'=>json_encode($colunasUsuariosLocais),
                'locaisUsuario'=>json_encode($arrLocais), 'colunasLocaisUsuario'=>json_encode($colunasLocaisUsuario),
                "locais"=>json_encode($locais),
                'dadosComissao'=>json_encode($dadosComissao), 'registroComissao'=>$registrou,
                'dataRegistroComissao'=>$dataRegistro,
                'periodoRegistroComissao'=>$periodoRegistro,
                'comissionamentoId'=>$idComissao,
                'iconeApagarRegistroComissao'=>$iconeApagarRegistro

            )
        );

    }catch(Exception $e){
        echo $e->getMessage();
    }

}

function desvincularLocalUsuario() {
    try {
        $cLocalUsuario = new Criteria();
        $cLocalUsuario->add(LocalUsuarioPeer::LOCAL_ID, $_POST['idLocal']);
        $cLocalUsuario->add(LocalUsuarioPeer::USUARIO_ID, $_POST['idUsuario']);
        $cLocalUsuario->add(LocalUsuarioPeer::SITUACAO, 0);
        $localUsuario = LocalUsuarioPeer::doSelectOne($cLocalUsuario);
        $localUsuario->setSituacao(-1);
        $localUsuario->save();

        echo json_encode(array('mensagem'=>'Ok'));
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function vincularLocalUsuario() {
    try {
        $localUsuario = new LocalUsuario();
        $localUsuario->setLocalId($_POST['idLocal']);
        $localUsuario->setUsuarioId($_POST['idUsuario']);
        $localUsuario->setSituacao(0);
        $localUsuario->save();
        echo json_encode(array('mensagem'=>'Ok'));
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function registrarComissaoUsuario () {
    try {
        //Cabeçalho do modal detalhar usuario
        $comissaoUsuario =  new UsuarioComissionamento();
        $comissaoUsuario->setDescricao(utf8_decode($_POST['descricao']));
        $periodoDe = explode('/',$_POST['periodoDe']);
        $periodoAte = explode('/',$_POST['periodoAte']);
        $periodoDe = $periodoDe[2] . "/" .$periodoDe[1] . "/" .$periodoDe[0];
        $periodoAte = $periodoAte[2] . "/" .$periodoAte[1] . "/" .$periodoAte[0];

        $comissaoUsuario->setPeriodoInicial($periodoDe);
        $comissaoUsuario->setPeriodoFinal($periodoAte);

        $venda = $_POST['vendas'];

        $comissaoUsuario->setVenda($venda);

        $comissaoUsuario->setComissaoVenda($_POST['comissaoVendas']);
        $comissaoUsuario->setUsuarioId($_POST['idUsuario']);

        $comissaoUsuario->setDataRegistro(date('Y/m/d H:i:s'));
        $comissaoUsuario->setSituacao(0);

        $comissaoUsuario->save();

        /*REGISTRA OS PEDIDOS COM COMISSAO DIFERENCIADA*/
        if ($_SESSION['pedidosComissaoDiferenciada']) {
            $pedidosComissaoDiferenciada = unserialize($_SESSION['pedidosComissaoDiferenciada']);
            unset($_SESSION['pedidosComissaoDiferenciada']);

            foreach ($pedidosComissaoDiferenciada as $pedidoComissaoDiferenciada) {
                $lancamentoComissao = new UsuarioLancamento();
                $lancamentoComissao->setDataLancamento(date('Y/m/d H:i:s'));
                $lancamentoComissao->setDescricao(utf8_decode($pedidoComissaoDiferenciada['descricao']));
                $lancamentoComissao->setTipoLancamento('C');
                $lancamentoComissao->setUsuarioComissionamentoId($comissaoUsuario->getId());
                $lancamentoComissao->setValor($pedidoComissaoDiferenciada['valor']);
                $lancamentoComissao->setSituacao(0);
                $lancamentoComissao->save();
            }
        }


        echo json_encode(array('mensagem'=>'Ok'));
    }catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}

function apagarRegistroComissaoUsuario () {
    try {
        $registroComissao = UsuarioComissionamentoPeer::retrieveByPK($_POST['idRegistroComissao']);
        $registroComissao->setSituacao(-1);
        $registroComissao->save();

        echo json_encode(array('mensagem'=>'Ok'));
    } catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}

function carregarUsuariosRelatorioComissao () {
    try {
        $cUsuario = new Criteria();
        /*
         * SITUACAO -1 = APAGADO
         * 1 = BLOQUEADO
         * */
        $cUsuario->add(UsuarioPeer::SITUACAO, array(-1, 1), Criteria::NOT_IN);
        /*
             * FILTRA USUARIOS (APENAS COMISSIONADOS) DOS CARGOS:
             * 23: SUPERVISOR COMERCIAL
             * 9: CONSULTOR
             * 10: CONSULTOR / AGR
            */
        $cUsuario->add(UsuarioPeer::CARGO_ID, array(23,9,10), Criteria::IN);
        $cUsuario->addAscendingOrderByColumn(UsuarioPeer::NOME);
        $usuariosObj = UsuarioPeer::doSelect($cUsuario);

        $usuarios = array();
        foreach ($usuariosObj as $key=>$usuario) {
            $cRegistroComissao = new Criteria();
            $cRegistroComissao->add(UsuarioComissionamentoPeer::SITUACAO, -1, Criteria::NOT_EQUAL);
            $cRegistroComissao->add(UsuarioComissionamentoPeer::USUARIO_ID, $usuario->getId());

            if ($_POST['filtroPeriodoComissao'])
                $filtroData = explode(',',$_POST['filtroPeriodoComissao']);

            if ($filtroData) {
                $dataDe = explode('/',$filtroData[0]);
                $dataAte = explode('/',$filtroData[1]);

                $cRegistroComissao->add(UsuarioComissionamentoPeer::PERIODO_INICIAL, $dataDe[2].'/'.$dataDe[1].'/'.$dataDe[0]);
                $cRegistroComissao->add(UsuarioComissionamentoPeer::PERIODO_FINAL, $dataAte[2].'/'.$dataAte[1].'/'.$dataAte[0]);
            } else {
                $cRegistroComissao->add(UsuarioComissionamentoPeer::PERIODO_INICIAL, date('Y').'-'.(date('m')-1).'-01');
                $cRegistroComissao->add(UsuarioComissionamentoPeer::PERIODO_FINAL, date('Y').'-'.(date('m')-1).'-'.getLastDayOfMonth((date('m')-1), date('Y')));
            }
            $registroComissao = UsuarioComissionamentoPeer::doSelectOne($cRegistroComissao);
            $somaTotalComissionamento = 0.0;

            if ($registroComissao) {
                if ($registroComissao->getComissaoVenda())
                    $somaTotalComissionamento += $registroComissao->getVenda() * ($registroComissao->getComissaoVenda()/100);

                $cLancamentoComissao = new Criteria();
                $cLancamentoComissao->add(UsuarioLancamentoPeer::SITUACAO, -1, Criteria::NOT_EQUAL);
                $lancamentosComissao = $registroComissao->getUsuarioLancamentos($cLancamentoComissao);

                $somaDescontosLancamentos = 0;
                $somaAcrescimosLancamentos = 0;
                foreach ($lancamentosComissao as $lancamentoComissao) {
                    if (trim($lancamentoComissao->getTipoLancamento()) == 'C')
                        $somaAcrescimosLancamentos += $lancamentoComissao->getValor();
                    elseif (trim($lancamentoComissao->getTipoLancamento()) == 'D')
                        $somaDescontosLancamentos += $lancamentoComissao->getValor();
                }

                /*if ($registroComissao->getId() == 17)
                    var_dump($somaTotalComissionamento, $somaAcrescimosLancamentos, $somaDescontosLancamentos);*/
                $somaTotalComissionamento = $somaTotalComissionamento + ($somaAcrescimosLancamentos -  $somaDescontosLancamentos);


                $descricaoRegistroComissao = utf8_encode($registroComissao->getDescricao());
                if ($registroComissao->getDataPagamento())
                    $pago = 'checked="checked"';
                else
                    $pago = '';

                $dataPagamento = $registroComissao->getDataPagamento() ? $registroComissao->getDataPagamento('d/m/Y H:i:s') : '---';

                $btnPago = '<input type="checkbox" id="chkPago'.$usuario->getId().'" '.$pago.'>
                <script>
                $(function() {
                    $("#chkPago'.$usuario->getId().'").bootstrapToggle({
                        on: "Pago",
                        off: "N&atilde;o Pago"
                    });
                    
                    $("#chkPago'.$usuario->getId().'").change(function() {
                        
                        if ($(this).prop("checked"))
                            informarPagamentoExtornoComissaoUsuario('.$registroComissao->getId().', "pagar");
                        else
                            informarPagamentoExtornoComissaoUsuario('.$registroComissao->getId().', "extornar");
                    });
                });
                </script>';
            }
            else {
                $dataPagamento = '---';
                $descricaoRegistroComissao = '---';
                $btnPago = 'Necessita Registro';
            }


            $btnDetalhar = '<button onclick="$(\'#modalUsuarioDetalhar\').modal(\'show\'); carregarModalDetalhesUsuario('.$usuario->getId().')"><i class="fa fa-arrows"></i></button> ';

            if ($usuario->getLocal()) $local = $usuario->getLocal()->getNome();


            $valor = ($somaTotalComissionamento!=0)?formataMoeda($somaTotalComissionamento):'-';

            $usuarios[] =  array('Id'=>$usuario->getId(),'Nome'=>utf8_encode($usuario->getNome()). ' '. $btnDetalhar,
                'Localidade'=> utf8_encode($usuario->getCidade() .'/' . $usuario->getUf()),
                'Registro'=>$descricaoRegistroComissao, 'Pagto.'=>$dataPagamento, 'Valor' =>$valor,
                utf8_encode('Ação')=>$btnPago
            );
        }/*FIM DO FOR*/

        $colunas = array(
            array('nome'=>'Id'), array('nome'=>'Nome'), array('nome'=>'Empresa'), array('nome'=>'Localidade'),array('nome'=>'Dados'),
            array('nome'=>'Registro'),  array('nome'=>'Pagto.'),array('nome'=>'Valor'), array('nome'=>utf8_encode('Ação'))
        );

        echo json_encode(array('mensagem'=>'Ok', 'colunas'=>json_encode($colunas), 'dadosUsuarios'=>json_encode($usuarios)));
    } catch (Exception $e ) {
        echo var_dump($e->getMessage());
    }
}

function informarPagamentoExtornoComissaoUsuario () {
    try {
        $registroComissao = UsuarioComissionamentoPeer::retrieveByPK($_POST['registroComissaoId']);
        if ($_POST['acao']=='pagar')
            $registroComissao->setDataPagamento(date('Y/m/d H:i:s'));
        elseif ($_POST['acao']=='extornar')
            $registroComissao->setDataPagamento(null);

        $registroComissao->save();

        echo json_encode(array('mensagem'=>'Ok'));
    } catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}

function registrarLancamentoComissaoUsuario () {
    try {
        $lancamentoComissao = new UsuarioLancamento();
        $lancamentoComissao->setDataLancamento(date('Y/m/d H:i:s'));
        $lancamentoComissao->setDescricao(utf8_decode($_POST['descricao']));
        $lancamentoComissao->setTipoLancamento($_POST['tipoLancamento']);
        $lancamentoComissao->setUsuarioComissionamentoId($_POST['comissionamento_id']);
        $lancamentoComissao->setValor($_POST['valor']);
        $lancamentoComissao->setObservacao($_POST['observacao']);
        $lancamentoComissao->setSituacao(0);
        $lancamentoComissao->save();

        echo json_encode(array('mensagem'=>'Ok'));
    } catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}

function apagarLancamentoComissaoUsuario () {
    try {
        $lancamentoComissao = UsuarioLancamentoPeer::retrieveByPK($_POST['idLancamentoComissaoUsuario']);
        $lancamentoComissao->setSituacao(-1);
        $lancamentoComissao->save();

        echo json_encode(array('mensagem'=>'Ok'));
    } catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}

?>