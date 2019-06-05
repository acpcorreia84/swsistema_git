<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';
$usuario_id = "";

if (isset($_REQUEST['usuario_id']) && $_REQUEST['usuario_id']!= null && $_REQUEST['usuario_id']!=''){
    $usuario_id = $_REQUEST['usuario_id'];
}
try {
    $nome = $_REQUEST['nome'];
    $cpf = $_REQUEST['cpf'];
    $cep = $_REQUEST['cep'];
    $endereco = $_REQUEST['endereco'];
    $numero = $_REQUEST['numero'];
    $complemento = $_REQUEST['complemento'];
    $bairro = $_REQUEST['bairro'];
    $cidade = $_REQUEST['cidade'];
    $uf = $_REQUEST['uf'];
    $fone = $_REQUEST['fone'];
    $fone2 = $_REQUEST['fone2'];
    $nascimento = $_REQUEST['nascimento'];

    $usuario =  UsuarioPeer::retrieveByPk($usuario_id);

    $nomeAnterior = $usuario->getNome();
    $enderecoAnterior = removeEspeciais($usuario->getEndereco());
    $bairroAnterior = removeEspeciais($usuario->getBairro());
    $complementoAnterior= removeEspeciais($usuario->getComplemento());

    $numeroAnterior = removeEspeciais($usuario->getNumero());
    $cidadeAnterior = removeEspeciais($usuario->getCidade());
    $ufAnterior = $usuario->getUf();
    $localAnterior = $usuario->getLocalId();
    $cpfAnterior = $usuario->getCpf();
    $cepAnterior = $usuario->getCep();
    $foneAnterior = $usuario->getFone();
    $fone2Anterior = $usuario->getFone2();
    $nascimentoAnterior = $usuario->getNascimento();

    if ($nome != $nomeAnterior && $nome!= null && $nome!='') {
        $usuario->setNome(removeEspeciais($nome));
    }
    if ($endereco != $enderecoAnterior && $endereco!=null && $endereco != '') {
        $usuario->setEndereco($endereco);
    }
    if ($numero!=$numeroAnterior && $numero!= null && $numero!='') {
        $usuario->setNumero(removeEspeciais($numero));
    }
    if ($complemento !=$complementoAnterior && $complemento!= null && $complemento!= '') {
        $usuario->setComplemento(removeEspeciais($complemento));
    }
    if ($bairro != $bairroAnterior && $bairro!= null && $bairro!= '') {
        $usuario->setBairro(removeEspeciais($bairro));
    }
    if ($cidade!= $cidadeAnterior && $cidade!=null && $cidade!='') {
        $usuario->setCidade(removeEspeciais($cidade));
    }
    if ($cpf != $cpfAnterior && $cpf!=null && $cpf!='') {
        $usuario->setCpf($cpf);
    }
    if ($cep != $cepAnterior && $cep!=null && $cep!='') {
        $usuario->setCep($cep);
    }
    if ($fone != $foneAnterior && $fone!=null && $fone!='') {
        $usuario->setFone($fone);
    }
    if ($fone2 != $fone2Anterior && $fone2!=null && $fone2!='') {
        $usuario->setFone2($fone2);
    }
    if ($nascimento != $nascimentoAnterior && $nascimento!=null && $nascimento!='') {
        $usuario->setNascimento($nascimento);
    }

    $usuario->save();

    echo '0';

}catch(Exception $e){
    echo var_dump($e->getMessage());
}