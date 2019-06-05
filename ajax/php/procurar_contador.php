<? //Conexão à base de dados
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

//recebe os parâmetros

$codContador = $_REQUEST['cod_desconto_contador'];

try{
    if(($codContador !="") && ($codContador !="outra")) {
        $cContador = new Criteria();
        /*SE O PRIMEIRO DIGITO FOR NUMERICO ESTAMOS TRATANDO DE UMA BUSCA POR ID, SE NAO E UMA BUSCA POR CODIGO DO CONTADOR*/
        if (is_numeric(substr($codContador, 0, 1)))
            $cContador->add(ContadorPeer::ID, $codContador);
        else
            $cContador->add(ContadorPeer::COD_CONTADOR, $codContador);
        $cContador->addAscendingOrderByColumn(ContadorPeer::ID);
        $contador = ContadorPeer::doSelectOne($cContador);

        if ($contador) {

            if ($contador->getRazaoSocial()) {
                $nome = $contador->getRazaoSocial();
            } elseif ($contador->getNomeFantasia()) {
                $nome = $contador->getNomeFantasia();
            }elseif($contador->getNome()){
                $nome = $contador->getNome();
            }else{
                $nome = "****";
            }

            echo $contador->getId() . ' - ' .$nome . ";" . $contador->getId() . ";0;" . $contador->getDesconto() . ";" . $contador->getPessoaTipo();
        }else{
            echo "nao encontrou";
        }
    }else{
        echo "nao digitou nenhum contador";
    }
}catch (Exception $e){
    erroEmail($e->getMessage(),"Erro na funcao de pesquisa de Cnpj no prospect");
    echo $e->getMessage();
}
?>