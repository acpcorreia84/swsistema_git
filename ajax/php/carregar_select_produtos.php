<? //Conexão à base de dados
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

//recebe os parâmetros

try{
    $usuarioLogado = ControleAcesso::getUsuarioLogado();
    $cProdutos = new Criteria();

    $cProdutos->add(ProdutoPeer::PESSOA_TIPO, $_POST['tipo_cliente']);
    $cProdutos->add(ProdutoPeer::GRUPO_PRODUTO_ID, $usuarioLogado->getGrupoProdutoId());
    //$cProdutos->add(ProdutoPeer::PRECO, 0, Criteria::GREATER_THAN); /*SE FOR PRECO DE CONTADOR*/
    /*SE O CONTADOR TEM DESCONTO SO CARREGA OS PRODUTOS DE CONTADORES*/
    if ($_POST['tem_desconto']==1)
        $cProdutos->add(ProdutoPeer::SITUACAO, 10); /*SE FOR PRECO DE CONTADOR*/
    else {
        $cProdutos->add(ProdutoPeer::SITUACAO, 0);
        $cProdutos->addOr(ProdutoPeer::SITUACAO, 1);
    }

    $produtosObj = ProdutoPeer::doSelect($cProdutos);
    $produtosArr = array();
    foreach ($produtosObj as $produto) {
        if ($produto->getNome())
            $produtosArr[$produto->getId()] = array(trim($produto->getNome()), $produto->getPreco());
    }
    asort($produtosArr);

    $produtosJson = array();
    foreach ($produtosArr as $key=>$produto) {
        $produtosJson[] = array("id"=>$key, "nome"=>utf8_encode($produto[0]), "preco"=>formataMoeda($produto[1]));
    }

    $produto = ProdutoPeer::retrieveByPK($_POST['produto_certificado']);
    $resProduto = '';
    if ($produto)
        $resProduto = ";".$produto->getId().";". utf8_encode($produto->getNome()) . ";" . formataMoeda($produto->getPreco());

    echo '0;'.json_encode($produtosJson).$resProduto;

}catch (Exception $e){
    erroEmail($e->getMessage(),"Erro na funcao de carregar produtos no fechar negócio do prospect");
    echo $e->getMessage();
}
?>