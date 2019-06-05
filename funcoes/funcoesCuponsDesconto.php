<?
include $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

$funcao = $_POST['funcao'];

if ($funcao =='gerar_codigo_cupom_desconto') {
    $nomeVendedor = $_POST['nome'];
    gerar_codigo_cupom_desconto($nomeVendedor);
}
if($funcao == 'gerar_cupom_desconto'){
    gerar_cupom_desconto();
}
if ($funcao == 'visualizar_cupom_desconto'){
    visualizar_cupom_desconto();
}
if ($funcao== 'carregar_autorizacao'){
    echo recupera_cupom_desconto($_POST['cupom_desconto_id']);
}
if ($funcao == 'autorizar'){
    $cupom_desconto_id = $_POST['cupom_desconto_id'];
    $usuario_id = $_POST['usuario_id'];
    autorizar_cupom_desconto($cupom_desconto_id,$usuario_id);
}
function gerar_codigo_cupom_desconto($nomeVendedor){
    try{
        $letra = explode(" " , $nomeVendedor );
        $letra1 = strtoupper(substr($letra[0], 0, 1));
        $random = rand(0,100);
        $letra2 = strtoupper(substr($letra[1] , 0, 1));
        $cod = $letra1.$letra2.date('Y').$random.date('d');

        do{
            $codDesconto = new Criteria();
            $codDesconto->add(CuponsDescontoCertificadoPeer::CODIGO_DESCONTO , $cod, Criteria::EQUAL);
            $codDesconto = CuponsDescontoCertificadoPeer::doSelectOne($codDesconto);


            if($codDesconto){
                $string = strval($codDesconto->getCodDesconto());
                $random = rand(0,100);
                $cod .= $random;
            }

        } while ($codDesconto!=null);
        echo $cod;
    }catch (Exception $e){
        erroEmail($e->getMessage().'<br/><br/>Usuario tentou gerar codigo do cupom de desconto porém não teve sucesso.');
        echo $e;
    }
}
function gerar_cupom_desconto(){
    try{
       $codigo_desconto=$_POST['codigo_desconto'];
       $vencimento=$_POST['vencimento'];
       $dtVencimento  = explode( '/' , $vencimento);
       $email_cliente=$_POST['email_cliente'];
       $motivo=$_POST['motivo'];
       $valor_desconto=explode('%',$_POST['valor_desconto']);
       $usuario_id=$_POST['usuario_id'];
       if (($_POST['produto_fisico_id'] != "" ) && $_POST['produto_fisico_id'] != Null){
           $produto_id = $_POST['produto_fisico_id'];
           $documento = $_POST['cpf'];
       }else{
           $produto_id = $_POST['produto_juridico_id'];
           $documento=$_POST['cnpj'];
       }
       $produto =  ProdutoPeer::retrieveByPK($produto_id);
       $precoProduto = $produto->getPreco();



       $cupomDesconto = new CuponsDescontoCertificado();
       $cupomDesconto->setCpfCnpj($documento);
       $cupomDesconto->setProdutoId($produto_id);
       $cupomDesconto->setCodigoDesconto($codigo_desconto);
       $cupomDesconto->setDesconto($valor_desconto);
       $cupomDesconto->setVencimento($dtVencimento['2'].'-'.$dtVencimento['1'].'-'.$dtVencimento['0']);
       $cupomDesconto->setEmailCliente($email_cliente);
       $cupomDesconto->setMotivo($motivo);
       $cupomDesconto->setDesconto($valor_desconto);
       $cupomDesconto->setUsuarioId($usuario_id);
        if (isset($valor_desconto[1])){
            if ($valor_desconto[0] > 5){
                $cupomDesconto->setAutorizado(0);
                $autorizar = 1;
            }else{
                $cupomDesconto->setAutorizado(1);
                $autorizar = 0;
            }
        }else{
            $descontoMaximo = formataMoeda($precoProduto*0.05);
            if ($valor_desconto[0] > $descontoMaximo){
                $cupomDesconto->setAutorizado(0);
                $autorizar = 1;
            }else{
                $cupomDesconto->setAutorizado(1);
                $autorizar = 0;
            }
        }
       $cupomDesconto->save();
       if ($autorizar == 0){
           enviarEmailCupomDesconto($email_cliente,$cupomDesconto->getProduto()->getNome(),$cupomDesconto->getVencimento('d/m/Y'),$valor_desconto);
       }

       echo $autorizar.';0';
    }catch (Exception $e){
        erroEmail($e->getMessage().'<br/><br/>Usuario tentou gerar codigo do cupom de desconto porém não teve sucesso.');
        echo $e;
    }
}
function recupera_cupom_desconto($cupom_id){
    $cupomDesconto = CuponsDescontoCertificadoPeer::retrieveByPK($cupom_id);
    $cpf_cnpj = $cupomDesconto->getCpfCnpj();
    $codigo_desconto = $cupomDesconto->getCodigoDesconto();
    $vencimento = $cupomDesconto->getVencimento('d/m/Y');
    $email_cliente = $cupomDesconto->getEmailCliente();
    $motivo = $cupomDesconto->getMotivo();
    $valor_desconto = formataMoeda($cupomDesconto->getDesconto());
    $emissor = $cupomDesconto->getUsuarioRelatedByUsuarioId()->getNome();
    if ($cupomDesconto->getAutorizado() != 0){
        if ($cupomDesconto->getUsuarioRelatedByUsuarioAutorizacaoId()){
            $usuarioAutorizacao = $cupomDesconto->getUsuarioRelatedByUsuarioAutorizacaoId()->getNome();
        }else{
            $usuarioAutorizacao = "Autorizado pelo Sistema";
        }
    }else{
        $usuarioAutorizacao = "Cupom não autorizado";
    }
    $produto = $cupomDesconto->getProduto()->getNome();
    $retorno = $cupom_id.';'.$codigo_desconto.';'.$emissor.';'.$valor_desconto.';'.$produto.';'.$cpf_cnpj.';'.$email_cliente.';'.$motivo.';';
    $retorno .= $vencimento.';'.$usuarioAutorizacao;
    return $retorno;
}
function visualizar_cupom_desconto(){
    try{
        $cupomDesconto = CuponsDescontoCertificadoPeer::retrieveByPK($_POST['cupom_desconto_id']);
        $retorno = recupera_cupom_desconto($_POST['cupom_desconto_id']);
        if($cupomDesconto->getVencimento('Y-m-d') >= date('Y-m-d')) {
            if ($cupomDesconto->getUsado() == 0)
                $status = "Valido";
            else
                $status = "Usado";
        }else{
            $status= "Vencido";
        }

        $retorno .=';'.utf8_encode( $status);
       echo $retorno;
    }catch (Exception $e){
        erroEmail($e->getMessage().'<br/><br/>Usuario tentou visualizar codigo do cupom de desconto porém não teve sucesso.');
        echo $e;
    }
}
function autorizar_cupom_desconto ($cupom_desconto_id,$usuario_id){
    try{
        $motivoAutorizacao = $_POST['motivo'];
        $cupomDesconto =  CuponsDescontoCertificadoPeer::retrieveByPk($cupom_desconto_id);
        if($cupomDesconto->getVencimento('Y-m-d') >= date('Y-m-d')){
            $cupomDesconto->setAutorizado('1');
            $cupomDesconto->setUsuarioAutorizacaoId($usuario_id);
            $cupomDesconto->setMotivoAutorizacao($motivoAutorizacao);
            $email_cliente = $cupomDesconto->getEmailCliente();
            $valor_desconto = $cupomDesconto->getDesconto();
            $cupomDesconto->save();
            enviarEmailCupomDesconto($email_cliente,$cupomDesconto->getProduto()->getNome(),$cupomDesconto->getVencimento('d/m/Y'),$valor_desconto);
            echo '0';
        }else{
            echo '1';
        }

    }catch (Exception $e){
        echo $e->getMessage();
    }
};