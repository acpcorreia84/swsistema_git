<?
	require_once $_SERVER['DOCUMENT_ROOT'] . "/loader.php";


	$acesso = new ControleAcesso();
	
	if (isset($_POST['edtLogin']) && !empty($_POST['edtLogin']))  {
		if ($acesso->login($_POST['edtLogin'], $_POST['edtSenha'])) {
            var_dump($_SESSION); exit;
			if ($_POST['pagina']  == 'front') 
				$url = 'front/home.php';
			else
				$url = 'home.php';

			if (!ControleAcesso::permitido('backend', 'acessar', $_SESSION['idPerfil']) )
				$url = 'front/home.php';

			$msn = 'logando...';
		}
		else {

			$url = 'index.php';
			$msn = 'Certifique se o usuario e senha digitados estao corretos. ';
		}
	}
	else
		header('Location:index.php');
		
?>
		<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
		<html>
		<head>
		<title><?=TITULO_GERAL ?></title>
		<meta http-equiv="refresh" content="2;URL=<?php echo $url?>">
		
		<style type="text/css">
		<!--
		.style1 {
			font-size: 12px;
			font-family: Arial, Helvetica, sans-serif;
			font-weight: bold;
			color: #0072ba;
		}
		-->
		</style>
		</head>
		
		<body>
		<span class="style1"><?php echo $msn?>
		</span>
		</body>
		</html>