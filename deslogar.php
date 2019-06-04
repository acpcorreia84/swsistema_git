<?
	require_once $_SERVER['DOCUMENT_ROOT'] . '/loader_off.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/controleacesso.class.php';

	if(count($_SESSION) > 0) {
		$usuario = UsuarioPeer::retrieveByPK($_SESSION['idUsuario']);

		if ($usuario && $usuario->getDataUltimoAcesso('d/m/Y H:i') != date('d/m/Y H:i')) {
			$usuario->setDataUltimoAcesso(date('Y-m-d H:i:s'));
			$usuario->save();
		}
	}

	ControleAcesso::deslogar();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?=TITULO_GERAL ?></title>
<meta http-equiv="refresh" content="1;URL=http://<?=$_SERVER["HTTP_HOST"]?>/">

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
<span class="style1">Deslogando...
</span>
</body>
</html>
