<?php
/**
 * Created by PhpStorm.
 * User: antoniocorreia
 * Date: 07/03/2017
 * Time: 21:26
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';
if ($_POST['funcao']=='carregar_produtos') carregarListaProdutos();

function carregarListaProdutos () {

    $cProdutos = new Criteria();

    /*OS FILTROS INDIVIDUAIS*/
    if ($_POST['campoFiltro']) {
        $campoFiltro = key($_POST['campoFiltro']);
        $valorCampoFiltro = $_POST['campoFiltro'][key($_POST['campoFiltro'])];
    }

    /*SE HOUVER FILTRO DE CAMPO SO MOSTRA NO MAXIMO 30 CDS*/
    if ( ($campoFiltro) && ($valorCampoFiltro) )
        $cProdutos->add($campoFiltro, $valorCampoFiltro . "%", Criteria::LIKE);

    if ($_POST['filtroContador']) {
        if ($_POST['filtroContador']=='normais')
            $cProdutos->add(ProdutoPeer::SITUACAO, array(0,1), Criteria::IN );
        elseif ($_POST['filtroContador']=='contadores')
            $cProdutos->add(ProdutoPeer::SITUACAO, array(10), Criteria::IN );
    } else
        $cProdutos->add(ProdutoPeer::SITUACAO, array(0, 1, 10), Criteria::GREATER_EQUAL);

    if ($_POST['filtroTipoPessoa'])
        $cProdutos->add(ProdutoPeer::PESSOA_TIPO, $_POST['filtroTipoPessoa']);

    if ($_POST['filtroValidade'])
        $cProdutos->add(ProdutoPeer::VALIDADE, $_POST['filtroValidade']);




    $produtosObj = ProdutoPeer::doSelect($cProdutos);
    $produtos = array();
    foreach ($produtosObj as $produto) {
        if ($produto->getValidade() > 1)
            $validade = $produto->getValidade() . ' Anos';
        else
            $validade = $produto->getValidade() . ' Ano';

        if ($produto->getPessoaTipo()=='F')
            $tipo = utf8_encode('Física');
        elseif ($produto->getPessoaTipo()=='J')
            $tipo = utf8_encode('Jurídica');

        /*
         * SE FOR 10 E CONTADOR
         * SE NAO PRODUTO NORMAL
         * */
        if ($produto->getSituacao() == 10)
            $contador = 'Contador';
        else
            $contador = 'Normal';

        $produtos[] = array(
            'Id' => $produto->getId(), 'Pessoa'=>$tipo, 'Nome'=>utf8_encode($produto->getNome()),
            utf8_encode('Preço')=>formataMoeda($produto->getPreco()), 'P. Contador'=>$contador, 'Validade'=>$validade
        );
    }

    $colunas = array(
        array('nome'=>'Id'), array('nome'=>'Pessoa'), array('nome'=>'Nome'), array('nome'=>utf8_encode('Preço')),
        array('nome'=>'P. Contador'),array('nome'=>'Validade')
    );

    $retorno =     array(
        'mensagem'=>'Ok',
        'produtos'=>json_encode($produtos),
        'colunas'=>json_encode($colunas)
    );

    echo json_encode($retorno);
}
?>