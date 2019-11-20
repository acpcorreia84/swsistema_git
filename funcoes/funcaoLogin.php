<?php
/**
 * Created by PhpStorm.
 * User: Antonio Carlos
 * Date: 20/11/2019
 * Time: 12:24
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader_off.php';

if($funcao == 'logarUsuario') {logarUsuario();}

function logarUsuario () {
    try {
        $cLogin = new Criteria();
        $cLogin->add(UsuarioPeer::EMAIL, $_POST['email']);
        $cLogin->addAnd(UsuarioPeer::SENHA, $_POST['senha']);
        $cLogin->add(UsuarioPeer::SITUACAO, 0);
        $usuario = UsuarioPeer::doSelectOne($cLogin);


        if($usuario) {
            $dataAtual = date('Y-m-d');
            $dataExpi = $usuario->getDataExpiracaoSenha('Y-m-d');
            $usuario->setDataUltimoAcesso(date('Y-m-d H:i:s'));
            $usuario->save();

            $logAcesso = new LogAcesso();
            $logAcesso->setAcao('ACESSO');
            $logAcesso->setIp($_SERVER['REMOTE_ADDR']);
            $logAcesso->setDescricao('Acessou o sistema 3.0');
            $logAcesso->setData($dataAtual." ".date('H:i:s'));
            $logAcesso->save();

            if(date('H:i:s') >= '23:00:00' && $usuario->getPerfilId() != 4  ){
                echo json_encode(array('mensagem'=>'Erro', 'descricaoErro'=> "Horario de expediente encerrado!"));
            }

            /*CASO O MOTIVO DA TROCA SEJA 1 = A SENHA EXPIROU*/
            elseif ($dataAtual >= $dataExpi) {
                echo json_encode(array('mensagem'=>'Ok', 'motivo'=>"redirecionar", 'url'=>'telaAlterarSenha.php?motivoTroca=1&dataExpiracao='.$usuario->getDataExpiracaoSenha('d/m/Y').'&usuario_id=' . $usuario->getId()));
            }
            /*CASO NAO TENHA DATA DE EXPIRACAO, PROVAVELMENTE POR QUE ACABOU DE CRIAR O USUARIO. PRIMEIRO LOGIN*/
            elseif (($usuario->getDataExpiracaoSenha() == NULL) || ($usuario->getDataExpiracaoSenha() == '0000-00-00')) {
                echo json_encode(array('mensagem'=>'Ok', 'motivo'=>"redirecionar", 'url'=>'telaAlterarSenha.php?motivoTroca=2&usuario_id=' . $usuario->getId()));
            }
            else {
                $_SESSION["idUsuario"] = $usuario->getId();
                $_SESSION["login"] = $_POST['email'];
                $_SESSION["nome"] = $usuario->getNome();
                $_SESSION["local_id"] = $usuario->getLocalId();
                $_SESSION["usuario"] = $usuario->getNome();
                $perfil = $usuario->getPerfil();
                $_SESSION["idPerfil"] = $perfil->getId();
                $_SESSION["fotoAvatar"] = $usuario->getFotoAvatar();
                /*SERAIALIZEI O OBJETO USUARIO*/
                $_SESSION["objUsuario"] = serialize($usuario);
                /*SERIALIZANDO O OBJETO PERFIL*/


                echo json_encode(array('mensagem'=>'Ok', 'usuarioId'=>$usuario->getId(), 'perfilId'=>$usuario->getPerfilId()));
            }


        }else{
            erroEmail("Opa, alguem esqueceu a senha ou tentou acessar o sistema indevidamente com:<br/> IP: ".$_SERVER['REMOTE_ADDR']." <br/>Software: ".$_SERVER['HTTP_USER_AGENT']."<br/>Login: ".$login."<br/>Senha:".$senha,"Tentativa de acesso sem sucesso ao sistema");
            js_aviso('Login Bloqueado / Usuario ainda nao cadastrado!');
        }
    } catch (Exception $ex){
        echo json_encode(array('mensagem'=>'Erro', 'descricaoErro'=> "Erro ao tentar logar no sistema." . $ex->getMessage()));
    }

}