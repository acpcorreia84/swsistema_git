<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

if ($funcao == 'carregar_locais'){carregarLocais();}
if ($funcao == 'carregar_modal_detalhar_local'){carregarModalDetalharLocal();}
if ($funcao == 'salvar_local'){salvarLocal();}
if ($funcao == 'apagar_local'){apagarLocal();}


function salvarLocal() {
    try {
        if ($_POST['acao']=='inserir')
            $local = new Local();
        elseif ($_POST['acao']=='editar')
            $local = LocalPeer::retrieveByPK($_POST['localId']);

        $local->setNome($_POST['nome']);
        $local->setSituacao(0);
        $local->save();

        echo json_encode(array('mensagem'=>'Ok'));
    } catch (Exception $e) {
        var_dump($e);
    }
}

function apagarLocal() {
    try {
        $local = LocalPeer::retrieveByPK($_POST['localId']);
        $local->setSituacao(-1);
        $local->save();

        echo json_encode(array('mensagem'=>'Ok'));
    } catch (Exception $e) {
        var_dump($e);
    }
}

function carregarLocais(){
    try {
        if (isset($_POST['filtros'])) {
            if ($_POST['filtros']['campoFiltro']) {
                $campoFiltro = key($_POST['filtros']['campoFiltro']);
                $valorCampoFiltro = $_POST['filtros']['campoFiltro'][key($_POST['filtros']['campoFiltro'])];
            }
        }

        $cLocais = new Criteria();
        $cLocais->add(LocalPeer::SITUACAO, -1, Criteria::NOT_EQUAL);
        /*SE FOR SELECIONADO ALGUM CAMPO DE FILTRO PADRAO INSERE NO CRITERIO*/
        if ( ($campoFiltro) && ($valorCampoFiltro) ) {
            $cLocais->add($campoFiltro, $valorCampoFiltro);
        } else {
            if ($_POST['pagina'])
                $offSet = ($_POST['pagina'] - 1) * $_POST['itensPorPagina'];
            else
                $offSet = 0;

            $quantidadeTotal = LocalPeer::doCount($cLocais);

            $cLocais->setLimit($_POST['itensPorPagina']);
            $cLocais->setOffset($offSet);
            $cLocais->addAscendingOrderByColumn(LocalPeer::NOME);
        }

        $locaisObj = LocalPeer::doSelect($cLocais);


        $locais = array();
        foreach ($locaisObj as $key=>$local) {
            /*SE NAO TIVER CERTIFICADO VINCULADO NAO TEM PQ TER CONTA A RECEBER*/
            $locais[] =  array('Id'=>$local->getId(), 'Local'=>utf8_encode($local->getNome()),
                utf8_encode('Ação')=>'<button onclick="carregarModalDetalharLocal(\''.$local->getId().'\'); $(\'#modalLocalDetalhar\').modal(\'show\')"><i class="fa fa-arrows"></i></button> '
            );
        }
        $colunas = array(
            array('nome'=>'Id'), array('nome'=>'Local'),array('nome'=>utf8_encode('Ação'))
        );

        $retorno = array();
        $retorno['mensagem'] = 'Ok';
        $retorno['colunas'] = json_encode($colunas);
        $retorno['dados'] = json_encode($locais);
        $retorno['quantidadeTotal'] = $quantidadeTotal;

        echo json_encode($retorno);
    }catch(Exception $e){
        echo var_dump($e->getMessage());
    }
}

function carregarModalDetalharLocal() {
    $local = LocalPeer::retrieveByPk($_POST['localId']);

    $retorno = array(
        'mensagem'=>'Ok',
        'nome'=>utf8_encode($local->getNome()),
    );

    echo json_encode($retorno);
}
