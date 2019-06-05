<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

$funcao = $_REQUEST['funcao'];


if($funcao == 'salvar_foto_perfil') {salvarFotosPerfil();}

function salvarFotosPerfil() {
    try {
        $usuarioLogado = ControleAcesso::getUsuarioLogado();
        $urlFoto = $_POST['urlImagem'];

        $usuarioLogado->setFotoAvatar($_SERVER['HTTP_ORIGIN'].'/'.$urlFoto);
        $usuarioLogado->save();

/*        $objUsuario = unserialize($_SESSION["objUsuario"]);
        $objUsuario['fotoAvatar'] = $usuarioLogado->getFotoAvatar();
        $_SESSION['objUsuario'] = serialize($objUsuario);*/

        echo json_encode(array('mensagem'=>'Ok', 'fotoAvatar'=>$usuarioLogado->getFotoAvatar()));

    } catch (Exception $e ) {
        var_dump($e);
    }

}
?>