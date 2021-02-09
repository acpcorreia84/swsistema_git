<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

if ($funcao == 'carregar_grupos_produtos'){carregarGruposProdutos();}
if ($funcao == 'carregar_modal_detalhar_grupo_produtos'){carregarModalDetalharGrupoProdutos();}
if ($funcao == 'salvar_grupo_produto'){salvarGrupoProduto();}
if ($funcao == 'apagar_grupo_produto'){apagarGrupoProduto();}


function salvarGrupoProduto() {
    try {

        if ($_POST['acaoGrupoProduto']=='inserir')
            $grupoProduto = new GrupoProduto();
        elseif ($_POST['acaoGrupoProduto']=='editar')
            $grupoProduto = GrupoProdutoPeer::retrieveByPK($_POST['grupoProdutoId']);
        $grupoProduto->setNome($_POST['nome']);
        $grupoProduto->setSituacao(0);
        $grupoProduto->save();

        echo json_encode(array('mensagem'=>'Ok'));
    } catch (Exception $e) {
        var_dump($e);
    }
}

function apagarGrupoProduto() {
    try {
        $grupoProduto = GrupoProdutoPeer::retrieveByPK($_POST['grupoProdutoId']);
        $grupoProduto->setSituacao(-1);
        $grupoProduto->save();

        echo json_encode(array('mensagem'=>'Ok'));
    } catch (Exception $e) {
        var_dump($e);
    }
}

function carregarGruposProdutos(){

    try {
        $cGrupoProdutos = new Criteria();
        $cGrupoProdutos->add(GrupoProdutoPeer::SITUACAO, -1, Criteria::NOT_EQUAL);

        $grupoProdutoObj = GrupoProdutoPeer::doSelect($cGrupoProdutos);
        $grupoProdutos = array();
        foreach ($grupoProdutoObj as $key=>$grupoProduto) {
            /*SE NAO TIVER CERTIFICADO VINCULADO NAO TEM PQ TER CONTA A RECEBER*/
            $grupoProdutos[] =  array('Id'=>$grupoProduto->getId(), 'Nome'=>utf8_encode($grupoProduto->getNome()),
                utf8_encode('Acao')=>'<button onclick="carregarModalDetalharGrupoProduto(\''.$grupoProduto->getId().'\'); $(\'#modalGrupoProdutoDetalhar\').modal(\'show\')"><i class="fa fa-arrows"></i></button> '
            );
        }
        $colunas = array(
            array('nome'=>'Id'), array('nome'=>'Nome'),array('nome'=>utf8_encode('Acao'))
        );

        $retorno = array();
        $retorno['mensagem'] = 'Ok';
        $retorno['colunas'] = json_encode($colunas);
        $retorno['dados'] = json_encode($grupoProdutos);
        echo json_encode($retorno);
    }catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}

function carregarModalDetalharGrupoProdutos() {
    $grupoProdutos = GrupoProdutoPeer::retrieveByPk($_POST['grupoId']);

    $produtosObj = $grupoProdutos->getProdutos();

    $produtosGrupo = array();
    foreach ($produtosObj as $produto) {
        $produtosGrupo[] = array('Id'=>$produto->getId(), 'Nome'=>utf8_encode($produto->getNome()),
            'Preco'=>formataMoeda($produto->getPreco()), 'Preco de venda' => formataMoeda($produto->getPrecoVenda()),
            'Preco de custo'=>formataMoeda($produto->getPrecoCusto()));
    }

    $colunas_listaprodutos = array(
        array('nome'=>'Id'), array('nome'=>'Nome') , array('nome'=>'Preco'), array('nome'=>'Preco de Venda'),array('nome'=>'Preco de custo')
    );

    $retorno = array(
        'mensagem'=>'Ok',
        'nome'=>utf8_encode($grupoProdutos->getNome()),
        'colunas_listaprodutos'=> json_encode($colunas_listaprodutos),
        'lista_produtos'=>json_encode($produtosGrupo)
    );

    echo json_encode($retorno);
}