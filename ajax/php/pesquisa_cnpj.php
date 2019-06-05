<? //Conexão à base de dados
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

//recebe os parâmetros

$cnpj = $_REQUEST['cnpj'];

try{
    $cCliente = new Criteria();
    $cCliente->add(ClientePeer::CPF_CNPJ , $cnpj);
    $cliente = ClientePeer::doSelectOne($cCliente);
    //retorna 1 para no sucesso do ajax saber que foi com inserido sucesso
    if($cliente) {
        if($cliente->getRazaoSocial()){
            $razaoSocial = $cliente->getRazaoSocial();
        }else{
            $razaoSocial = "";
        }
        if($cliente->getNomeFantasia()){
            $nomeFantasia = $cliente->getNomeFantasia();
        }else{
            $nomeFantasia = "";
        }
        echo $razaoSocial.";".$nomeFantasia.";".$cliente->getCpfCnpj().";";
        echo $cliente->getEmail().";".$cliente->getFone1().";".$cliente->getCelular().";".$cliente->getId().";".removeEspeciais($cliente->getEndereco()).";".$cliente->getFone2().";".$cliente->getComplemento().";".$cliente->getNumero().";".$cliente->getBairro().";".$cliente->getUf().";0";
    }else {
        echo "";
    }
}
catch (Exception $e){
    erroEmail($e->getMessage(),"Erro na funcao de pesquisa de Cnpj no prospect");
    echo var_dump($e->getMessage());
}
?>