<?

session_start();

class ControleAcesso {

	var $login;
	var $senha;
	var $nome;

	function ControleAcesso() {

	}

    function & login ($login, $senha) {
        try {
            $cLogin = new Criteria();
            $cLogin->add(UsuarioPeer::EMAIL, $login);
            $cLogin->addAnd(UsuarioPeer::SENHA, $senha);
            $cLogin->add(UsuarioPeer::SITUACAO, 0);
            $usuario = UsuarioPeer::doSelectOne($cLogin);

            /*
             * CHECA SE O LOCAL E BELEM, SE FOR, RESTRINGE O IP PRA O RANGE DA EMBRATEL
             * 189.42.171.18-25
             * */
            $acessoSede = true;

        } catch (Exception $ex){
            erroEmail($ex->getMessage(), "Tentativa de login");
            echo "Erro ao tentar logar no sistema." . $ex->getMessage();
            exit;
        }

        if($usuario && $acessoSede) {
            $dataAtual = date('Y-m-d');
            $dataExpi = $usuario->getDataExpiracaoSenha('Y-m-d');
            $usuario->setDataUltimoAcesso(date('Y-m-d H:i:s'));
            $usuario->save();


            $cLogAcesso = new Criteria();
            $cLogAcesso->add(LogAcessoPeer::USUARIO_ID,$usuario->getId());
            $cLogAcesso->addDescendingOrderByColumn(LogAcessoPeer::DATA);
            $logAcesso = LogAcessoPeer::doSelectone($cLogAcesso);
            if ($logAcesso)
                if($logAcesso->getData('d/m/Y H') != date('d/m/Y H')){
                    $logAcesso->setAcao('ACESSOU');
                    $logAcesso->setIp($_SERVER['REMOTE_ADDR']);
                    $logAcesso->setDescricao('Acessou o sistema 3.0');
                    $logAcesso->setData($dataAtual." ".date('H:i:s'));
                    $logAcesso->save();
                }

            if(date('H:i:s') >= '23:00:00' && $usuario->getPerfilId() != 4  ){
                echo "<script language='javascript'>alert('Horario de Espediente Encerrado!')</script>";
                echo "<script language='javascript'>location.href='index.php'</script>";
            }/*elseif(date('H:i:s') <= '06:00:00' && $usuario->getPerfilId() != 4 ){
                echo "<script language='javascript'>alert('Ol\u00e1, estou processando alguns dados novos, por esse motivo estarei dispon\u00edvel somente as 07:30')</script>";
                echo "<script language='javascript'>location.href='index.php'</script>";
            }*/
            /*CASO O MOTIVO DA TROCA SEJA 1 = A SENHA EXPIROU*/
            elseif ($dataAtual >= $dataExpi) {
                header('Location:telaAlterarSenha.php?motivoTroca=1&dataExpiracao='.$usuario->getDataExpiracaoSenha('d/m/Y').'&usuario_id=' . $usuario->getId());
                exit;
            }
            /*CASO NAO TENHA DATA DE EXPIRACAO, PROVAVELMENTE POR QUE ACABOU DE CRIAR O USUARIO. PRIMEIRO LOGIN*/
            elseif (($usuario->getDataExpiracaoSenha() == NULL) || ($usuario->getDataExpiracaoSenha() == '0000-00-00')) {
                header('Location:telaAlterarSenha.php?motivoTroca=2&usuario_id=' . $usuario->getId());
                exit;
            }
            /*FOI DEFINIDA UMA SENHA PADRAO PARA QUE O USUARIO POSSA TROCA-LA*/
            elseif (($usuario->getSenha() === "segurancad") || ($usuario->getSenha() === "123456")) {
                header('Location:telaAlterarSenha.php?usuario_id=' . $usuario->getId());
                exit;
            } elseif (!is_null($usuario) && (trim($usuario->getSenha()) == trim($senha))) {
                $_SESSION["idUsuario"] = $usuario->getId();
                $_SESSION["login"] = $login;
                $_SESSION["nome"] = $usuario->getNome();
                $_SESSION["local_id"] = $usuario->getLocalId();
                $_SESSION["usuario"] = $usuario->getNome();
                $perfil = $usuario->getPerfil();
                $_SESSION["idPerfil"] = $perfil->getId();
                $_SESSION["fotoAvatar"] = $usuario->getFotoAvatar();
                /*SERAIALIZEI O OBJETO USUARIO*/
                $_SESSION["objUsuario"] = serialize($usuario);
                /*SERIALIZANDO O OBJETO PERFIL*/
                ?>
                <script>
                    /*GUARDA O ID DO USUARIO LOGADO PARA UTILIZAR NOS MODAIS*/
                    if (typeof(Storage) !== "undefined") {
                        sessionStorage.usuarioLogadoId = "<?=$usuario->getId();?>";
                        sessionStorage.usuarioLogadoPerfilId = "<?=$perfil->getId()?>";

                    } else {
                        alert('O seu navegados nao possui suporte para Gravacao de dados. Por favor entre em contato com o departamento de suporte para solucionar o problema.');
                    }
                </script>

        <?php

                return true;
            }
        }else{
            erroEmail("Opa, alguem esqueceu a senha ou tentou acessar o sistema indevidamente com:<br/> IP: ".$_SERVER['REMOTE_ADDR']." <br/>Software: ".$_SERVER['HTTP_USER_AGENT']."<br/>Login: ".$login."<br/>Senha:".$senha,"Tentativa de acesso sem sucesso ao sistema");
            js_aviso('Login Bloqueado / Usuario ainda nao cadastrado!');
        }

    }


	function & getSessaoAtual() {

		$arr = array();



		empty($_SESSION["idUsuario"]) ? null : $arr["idUsuario"] = $_SESSION["idUsuario"];

		empty($_SESSION["login"]) ? null : $arr["login"] = $_SESSION["login"];

		empty($_SESSION["nome"]) ? null : $arr["nome"] = $_SESSION["nome"];

		empty($_SESSION["usuario"]) ? null : $arr["usuario"] = $_SESSION["usuario"];

		empty($_SESSION["ultimoAcesso"]) ? null : $arr["ultimoAcesso"] = $_SESSION["ultimoAcesso"];

		empty($_SESSION["idPerfil"]) ? null : $arr["idPerfil"] = $_SESSION["idPerfil"];



		return $arr;

	}



	function & estaLogado() {

		//ControleAcesso::deslogar();

		return isset($_SESSION["objUsuario"]) && ($_SESSION["login"]) && isset($_SESSION["nome"]) && isset($_SESSION["usuario"]) && isset($_SESSION["idUsuario"]) && isset($_SESSION["idPerfil"]);

	}

	function inserirVariavelSessao ($var, $valor) {
	    $_SESSION[$var] = $valor;
    }

	function deslogar() {
	    foreach ($_SESSION as $key=>$varSessao)
            unset($_SESSION[$key]);
    ?>
        <script>
                sessionStorage.clear();
        </script>
    <?php
	}

    /*RETORNA O USUARIO LOGADO OU FALSO SE NAO TIVER*/
	function &podeAcessar() {

		$usuarioLogado = ControleAcesso::getSessaoAtual();

		if (count($usuarioLogado) <= 0 )

			return false;

		else

			return $usuarioLogado;

	}



	function &permitido ($tela, $funcao, $perfilId) {

		/*

		* CHECA SE EXISTE A PERMISS�O, SE HOUVER, PERGUNTA SE O PERFIL TEM A PERMISS�O

		* SE N�O LIBERA A PERMISS�O

		*/

		$cPermissao = new Criteria();

		$cPermissao->add(PermissaoPeer::TELA, $tela);

		$cPermissao->add(PermissaoPeer::FUNCAO, $funcao);

		$permissao = PermissaoPeer::doSelectOne($cPermissao);



		if (is_null($permissao))

			return true;

		else {

			$cPermitido = new Criteria();

			$cPermitido->add(PerfilPermissaoPeer::PERMISSAO_ID, $permissao->getId());

			$cPermitido->add(PerfilPermissaoPeer::PERFIL_ID, $perfilId);

			$permissao = PerfilPermissaoPeer::doCountJoinPermissao($cPermitido);

			if ($permissao > 0)

				return true;

			else

				return false;

		}



	}



	function &checarPermissaoMenus($perfilId){

		// $perfil = PerfilPeer::retrieveByPk(1);

		$c = new Criteria();

		$c->addAscendingOrderByColumn(TelaPeer::DISPLAY());

		$objTelas = TelaPeer::doSelect($c);

		$dados = array();

		$telas = array();





		foreach ($objTelas as $tela ) {

			$telas[$tela->getId()] = $tela->getDisplay();

			$cOrder = new Criteria();

			$cOrder->addAscendingOrderByColumn(FuncaoPeer::DISPLAY());

			$funcoes = $tela->getFuncaos($cOrder);

			$flag = false;

			foreach ($funcoes as $funcao) {

				$cPermitido = new Criteria();

				$cPermitido->add(PermissaoPeer::TELAID(), $tela->getId());

				$cPermitido->add(PermissaoPeer::FUNCAOID(), $funcao->getId());

				$cPermitido->add(PermissaoPeer::PERFILID(), $perfilId);

				$permissao = PermissaoPeer::doCount($cPermitido);

				if ($permissao > 0)

					$flag = true;

			}

			if ($flag)

				$dados[$tela->getNome()] = 1;

			else

				$dados[$tela->getNome()] = 0;

		}

		return $dados;

	}

    /*FUNCAO QUE RETORNA O USUARIO LOGADO, POREM DES-SERIALIZANDO O OBJETO USUARIO NA VARIAVEL DE SESSAO*/
    function &getUsuarioLogado() {
        if ($_SESSION['objUsuario'])
            $usuarioLogado = unserialize($_SESSION['objUsuario']);

        return $usuarioLogado;
    }


    /*FUNCAO QUE RETORNA TODAS AS PERMISSOES DO USUARIO LOGADO DE VISUALIZAR ITENS DE MENU*/
    function &getPermissoesMenu() {
        if ($_SESSION['permissoesMenu']) {
            return unserialize($_SESSION['permissoesMenu']);
        } else {
            $cPerfPermMenu = new Criteria();
            $cPerfPermMenu->add(PerfilPermissaoPeer::PERFIL_ID, $_SESSION["idPerfil"]);
            $cPerfPermMenu->add(PermissaoPeer::FUNCAO, 'acessar');
            $permissoesPerfilMenu = PerfilPermissaoPeer::doSelectJoinPermissao($cPerfPermMenu);
            $arrTelasMenu = array();
            foreach ($permissoesPerfilMenu as $permissaoPerfilMenu) {
                $arrTelasMenu[] = $permissaoPerfilMenu->getPermissao()->getTela();
            }
            $_SESSION['permissoesMenu'] = serialize($arrTelasMenu);
            return $arrTelasMenu;
        }
        //Fim permissoes menu
    }

    /*FUNCAO QUE RETORNA TODAS AS PERMISSOES DO USUARIO LOGADO DE ACESSAR E MANIPULAR TELAS*/
    function &getPermissoesTela($tela) {
        if ($_SESSION['permissoesTelas']) {
            $arrPermissoesTelas = unserialize($_SESSION['permissoesTelas']);
            $arrPermissaoTela = array();
            if ($arrPermissoesTelas[$tela])
                foreach ($arrPermissoesTelas[$tela] as $funcaoTela) {
                    $arrPermissaoTela[] = $funcaoTela;
                }

            return $arrPermissaoTela;
        } else {
            $cPerfPermTela = new Criteria();
            $cPerfPermTela->add(PerfilPermissaoPeer::PERFIL_ID, $_SESSION['idPerfil']);
            /*BUSCA TODAS AS PERMISSOES DE TODAS AS TELAS DAQUELE PERFIL*/
            $permissoesPerfilTelas = PerfilPermissaoPeer::doSelect($cPerfPermTela);

            /*CRIA ESTE ARRAY PARA QUE AS TELAS POASSAM BUSCAR SEMPRE QUE PRECISAREM SE UMA FUNCAO PODE SER ACESSADA NAQUELA TELA*/
            $arrPermissoesTelas = array();
            foreach ($permissoesPerfilTelas as $perfilPermissaoTela) {
                $arrPermissoesTelas[$perfilPermissaoTela->getPermissao()->getTela()][] = $perfilPermissaoTela->getPermissao()->getFuncao();
            }
            $_SESSION['permissoesTelas'] = serialize($arrPermissoesTelas);

            $arrPermissaoTela = array();
            foreach ($arrPermissoesTelas[$tela] as $funcaoTela) {
                $arrPermissaoTela[] = $funcaoTela;
            }

            return $arrPermissaoTela;
        }
    }
}

?>