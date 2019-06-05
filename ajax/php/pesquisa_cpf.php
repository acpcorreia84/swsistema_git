<? //Conexão à base de dados
    require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

   //recebe os parâmetros

    $cpf = $_REQUEST['cpf'];

    try{
            $cCliente = new Criteria();
            $cCliente->add(ClientePeer::CPF_CNPJ , $cpf);
            $cliente = ClientePeer::doSelectOne($cCliente);
        //retorna 1 para no sucesso do ajax saber que foi com inserido sucesso
            if($cliente) {
                if($cliente->getNomeFantasia()){
                    $nome = $cliente->getNomeFantasia();
                }elseif($cliente->getRazaoSocial()){
                    $nome = $cliente->getRazaoSocial();
                }else{
                    $nome = $cliente->getNome();
                }
                echo $nome.";".$cliente->getNascimento('d/m/Y').";".$cliente->getCep().";";
                echo $cliente->getEmail().";".$cliente->getFone1().";".$cliente->getCelular().";".$cliente->getId().";0";
            }else {
                echo "";
            }
    }
    catch (Exception $e){
        erroEmail($e->getMessage(),"Erro na funcao de pesquisa de Cpf no prospect :: ".$usuarioLogado->getId());
        echo var_dump($e->getMessage());
    }
?>