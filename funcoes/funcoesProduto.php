<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

if ($funcao == 'carregar_produtos'){carregarProdutos();}
if ($funcao == 'carregar_modal_detalhar_produto'){carregarModalDetalharProduto();}
if ($funcao == 'salvar_produto'){salvarProduto();}
if ($funcao == 'apagar_produto'){apagarProduto();}
if ($funcao == 'carregar_modal_inserir_editar_produto'){carregarModalInserirEditarProduto();}


function salvarProduto() {
    try {
        if ($_POST['acao']=='inserir')
            $produto = new Produto();
        elseif ($_POST['acao']=='editar')
            $produto = ProdutoPeer::retrieveByPK($_POST['produtoId']);

        $produto->setNome(utf8_decode($_POST['nome']));
        $produto->setCodigo($_POST['codigoProduto']);
        $produto->setComissao($_POST['comissaoProduto']);
        $produto->setPessoaTipo($_POST['pessoaTipo']);
        $produto->setValidade($_POST['validade']);
        $produto->setPreco($_POST['preco']);
        if ($_POST['produtoContador']=='contadores')
            $produto->setSituacao(10);
        else
            $produto->setSituacao(0);

        if ($_POST['produtoReferenciaId'])
            $produto->setProdutoId($_POST['produtoReferenciaId']);


        $produto->save();

        /*
         * SE NAO INFORMOU O PRODUTO PAI, ADOTA O PRODUTO CADASTRADO COMO PRIMEIRO
         * E CONSEQUENTEMENTE PAI DELE PROPRIO
         * */
        if (!$_POST['produtoReferenciaId']) {
            $produto->setProdutoId($produto->getId());
            $produto->save();
        }

        echo json_encode(array('mensagem'=>'Ok'));
    } catch (Exception $e) {
        var_dump($e);
    }
}

function apagarProduto() {
    try {
        $produto = ProdutoPeer::retrieveByPK($_POST['produtoId']);
        $produto->setSituacao(-1);
        $produto->save();

        echo json_encode(array('mensagem'=>'Ok'));
    } catch (Exception $e) {
        var_dump($e);
    }
}

function carregarProdutos(){
    try {
        if (isset($_POST['filtros'])) {
            if ($_POST['filtros']['campoFiltro']) {
                $campoFiltro = key($_POST['filtros']['campoFiltro']);
                $valorCampoFiltro = $_POST['filtros']['campoFiltro'][key($_POST['filtros']['campoFiltro'])];
            }
        }

        $cProdutos = new Criteria();
        $cProdutos->add(ProdutoPeer::SITUACAO, -1, Criteria::NOT_EQUAL);
        /*SE FOR SELECIONADO ALGUM CAMPO DE FILTRO PADRAO INSERE NO CRITERIO*/
        if ( ($campoFiltro) && ($valorCampoFiltro) ) {
            $cProdutos->add($campoFiltro, $valorCampoFiltro);
        } else {
            if ($_POST['filtros']['filtroContador']) {
                if ($_POST['filtros']['filtroContador']=='normais')
                    $cProdutos->add(ProdutoPeer::SITUACAO, array(0,1), Criteria::IN );
                elseif ($_POST['filtros']['filtroContador']=='contadores')
                    $cProdutos->add(ProdutoPeer::SITUACAO, array(10), Criteria::IN );
            } else
                $cProdutos->add(ProdutoPeer::SITUACAO, array(0, 1, 10), Criteria::GREATER_EQUAL);

            if ($_POST['filtros']['filtroTipoPessoa']) {
                $cProdutos->add(ProdutoPeer::PESSOA_TIPO, $_POST['filtros']['filtroTipoPessoa']);
            }

            if ($_POST['filtros']['filtroValidade'])
                $cProdutos->add(ProdutoPeer::VALIDADE, $_POST['filtros']['filtroValidade']);

            if ($_POST['pagina'])
                $offSet = ($_POST['pagina'] - 1) * $_POST['itensPorPagina'];
            else
                $offSet = 0;

            $quantidadeTotal = ProdutoPeer::doCount($cProdutos);

            $cProdutos->setLimit($_POST['itensPorPagina']);
            $cProdutos->setOffset($offSet);
            $cProdutos->addAscendingOrderByColumn(ProdutoPeer::NOME);
        }

        $produtosObj = ProdutoPeer::doSelect($cProdutos);


        $produtos = array();
        $i = $offSet+1;
        foreach ($produtosObj as $key=>$produto) {
            if ($produto->getValidade() > 1)
                $validade = $produto->getValidade() . ' anos';
            elseif ($produto->getValidade() == 1)
                $validade = $produto->getValidade() . ' ano' ;
            else
                $validade = 's/n';

            if ($produto->getSituacao() == 10) {
                $produtoContador = 'Pre&ccedil;o Contador';
            }
            else
                $produtoContador = 'Pre&ccedil;o Normal';

            $produtos[] =  array('.'=>$i++, 'Id'=>$produto->getId(), 'Contador?'=>$produtoContador,'Nome'=>utf8_encode($produto->getNome()), utf8_encode('Preço')=>$produto->getPreco(), 'Tipo'=>$produto->getPessoaTipo(), 'Validade'=>$validade,
                utf8_encode('Ação')=>'<button onclick="carregarModalDetalharProduto(\''.$produto->getId().'\'); $(\'#modalProdutoDetalhar\').modal(\'show\')"><i class="fa fa-arrows"></i></button> '
            );
        }
        $colunas = array(array('nome'=>'.'),
            array('nome'=>'Id'), array('nome'=>'Nome'), array('nome'=>utf8_encode('Preço')),array('nome'=>utf8_encode('Tipo')),array('nome'=>'Validade'), array('nome'=>'Contador?') ,array('nome'=>utf8_encode('Ação'))
        );

        $retorno = array();
        $retorno['mensagem'] = 'Ok';
        $retorno['colunas'] = json_encode($colunas);
        $retorno['dados'] = json_encode($produtos);
        $retorno['quantidadeTotal'] = $quantidadeTotal;

        echo json_encode($retorno);
    }catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}

function carregarModalDetalharProduto() {
    $cProdutos = new Criteria();
    $cProdutos->add(ProdutoPeer::SITUACAO, -1, Criteria::NOT_EQUAL);
    $cProdutos->addAscendingOrderByColumn(ProdutoPeer::NOME);
    $produtosObj = ProdutoPeer::doSelect($cProdutos);
    $produtos = array();
    $produtos[] = array('id'=>'', 'nome'=>'Escolha um produto');
    foreach ($produtosObj as $produto)
        $produtos[] = array('id'=>$produto->getId(), 'nome'=>utf8_encode($produto->getNome()));

    $produto = ProdutoPeer::retrieveByPk($_POST['produtoId']);

    if ($produto->getValidade() > 1)
        $validade = $produto->getValidade() . ' anos';
    elseif ($produto->getValidade() == 1)
        $validade = $produto->getValidade() . ' ano' ;
    else
        $validade = 's/n';

    if ($produto->getPessoaTipo() == 'F')
        $pessoaTipo = 'Pessoa F&iacute;sica';
    elseif ($produto->getPessoaTipo() == 'J')
        $pessoaTipo = 'Pessoa Jur&iacute;dica';

    if ($produto->getProdutoRelatedByProdutoId())
        $produtoPai = utf8_encode($produto->getProdutoRelatedByProdutoId()->getId() . ' - '.$produto->getProdutoRelatedByProdutoId()->getNome());
    else
        $produtoPai = '';

    if ($produto->getSituacao() == 10) {
        $produtoContador = 'Pre&ccedil;o Contador';
        $produtoContadorId = 'contadores';
    }
    else {
        $produtoContador = 'Pre&ccedil;o Normal';
        $produtoContadorId = 'normal';
    }

    $retorno = array(
        'mensagem'=>'Ok',
        'id'=>$produto->getId(),
        'nome'=>utf8_encode($produto->getNome()),
        'pessoaTipo'=>$pessoaTipo,
        'preco'=>formataMoeda($produto->getPreco()),
        'precoSemFormatacao'=>$produto->getPreco(),
        'pessoaTipoId'=>$produto->getPessoaTipo(),
        'validade'=>$validade,
        'validadeId'=>$produto->getValidade(),
        'codigo'=>$produto->getCodigo(),

        'comissao'=>$produto->getComissao(),
        'produtoPai'=>$produtoPai,
        'produtoReferenciaId'=>$produto->getProdutoId(),
        'produtos'=>json_encode($produtos),
        'produtoContador'=>$produtoContador,
        'produtoContadorId'=>$produtoContadorId
    );

    echo json_encode($retorno);
}

function carregarModalInserirEditarProduto () {
    $cProdutos = new Criteria();
    $cProdutos->add(ProdutoPeer::SITUACAO, -1, Criteria::NOT_EQUAL);
    $cProdutos->addAscendingOrderByColumn(ProdutoPeer::NOME);
    $produtosObj = ProdutoPeer::doSelect($cProdutos);
    $produtos = array();
    $produtos[] = array('id'=>'', 'nome'=>'Escolha um produto');
    foreach ($produtosObj as $produto)
        $produtos[] = array('id'=>$produto->getId(), 'nome'=>utf8_encode($produto->getNome()));
    $retorno = array(
        'mensagem'=>'Ok',
        'produtos'=>json_encode($produtos)
    );

    echo json_encode($retorno);
}

