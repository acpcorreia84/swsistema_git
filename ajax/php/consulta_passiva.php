<? //Conexão à base de dados
    require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

   //recebe os parâmetros

    $cpfCnpj = $_REQUEST['cpfCnpj'];

    try{
            $cCliente = new Criteria();
            $cCliente->add(ClientePeer::CPF_CNPJ , $cpfCnpj);
            $cCliente->add(ClientePeer::SITUACAO , 0);
            $cCliente->addDescendingOrderBycolumn(ClientePeer::ID);
            $cliente = ClientePeer::doSelectOne($cCliente);

            if($cliente) {
                if($cliente->getNomeFantasia()){
                    $nome = $cliente->getNomeFantasia();
                }elseif($cliente->getNomeFantasia()){
                    $nome = $cliente->getRazaoSocial();
                }elseif($cliente->getNome()){
                    $nome = $cliente->getNome();
                }else{
                    $nome = "------";
                }

                $idCliente =  $cliente->getId();

                $cCertificado = new Criteria();
                $cCertificado->add(CertificadoPeer::APAGADO,0);
                $cCertificado->add(CertificadoPeer::CLIENTE_ID,$idCliente);
                $cCertificado->addDescendingOrderBycolumn(CertificadoPeer::ID);
                $certificado = CertificadoPeer::doSelectOne($cCertificado);

                if($cliente->getNascimento()){
                    $nascimento =  $cliente->getNascimento('d/m/Y');
                }else{
                    $nascimento = "----";
                }

                if($certificado){
                    if($certificado->getProdutoId()){
                        $produto = removeEspeciais($certificado->getProduto()->getNome());
                        $valor = formataMoeda($certificado->getProduto()->getPreco());
                    }else{
                        $produto = "----";
                        $valor = "----";
                    }

                    if($certificado->getProtocolo()){
                        $protocolo = $certificado->getProtocolo();
                    }else{
                        $protocolo = "----";
                    }
                    $idCertificado = $certificado->getId();
                }

                if($cliente->getLocal()){
                    $local = removeEspeciais($cliente->getLocal()->getNome());
                }else{
                    $local = "----";
                }



                $retorno = $idCliente.";".$nome.";".$nascimento.";";
                $retorno .= $produto.";".$local.";".$valor.";".$protocolo.";".$idCertificado;

                echo $retorno;
            }else {
                echo "";
            }
    }
    catch (Exception $e){
        echo var_dump($e->getMessage());
    }
?>