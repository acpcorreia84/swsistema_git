<? //Conexão à base de dados
    require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

    $produto_id =  $_REQUEST['edtProduto'];
    $usuarioId = $usuarioLogado->getId();
    $cliente_id =  $_REQUEST['edtClienteId'];
    $forma_pgto_id = $_REQUEST['edtFormaPagamento'];
    $data_compra = date("Y-m-d");
    $prodpectId = $_REQUEST['edtProspectId'];

    try{
        $prospect = ProspectPeer::retrieveByPK($prodpectId);
        $produto = ProdutoPeer::retrieveByPk($produto_id);
        $cliente = ClientePeer::retrieveByPk($cliente_id);
        if(!$cliente){
            $cliente = new Cliente();
        }
        $certificado = new Certificado();

        if($contador){
            $certificado->setContadorId($parceiro->getId());
        }else{
            $certificado->setContadorId(0);
        }

        //VERIFICA SE O CLIENTE JÁ É DA BASE
        $cPfPj = new Criteria();
        $cPfPj->add(ClientePeer::CPF_CNPJ, $cliente->getCpfCnpj());
        $cPfPj->addOr(ClientePeer::CPF_CNPJ, formatarCPF_CNPJ($cliente->getCpfCnpj()));
        if ($cliente->getPessoaTipo() == 'J') {
            $respPj = $cliente->getResponsavel();
            $cPfPj->addOr(ClientePeer::CPF_CNPJ, formatarCPF_CNPJ($respPj->getCpf()));
        }

        $cPfPj->add(CertificadoPeer::DATA_VALIDACAO, null, Criteria::NOT_EQUAL);
        $cPfPj->addDescendingOrderByColumn(CertificadoPeer::DATA_VALIDACAO);
        $clientesBasePfPj = CertificadoPeer::doSelectJoinCliente($cPfPj);


        $cResponsavel = new Criteria();
        $cResponsavel->add(ResponsavelPeer::CPF, $cliente->getCpfCnpj());
        $cResponsavel->addOr(ResponsavelPeer::CPF, formatarCPF_CNPJ($cliente->getCpfCnpj()));
        $responsaveisCpf = ResponsavelPeer::doSelect($cResponsavel);
        $datasValidacao = array();
        foreach ($responsaveisCpf as $responsavelCpf) {
            $clientesCpf = $responsavelCpf->getClientes();
            $clienteCpf = $clientesCpf[0];
            if ($clienteCpf) {
                $certificadosCpf = $clienteCpf->getCertificados();
                $certificadoCpf = $certificadosCpf[0];
                if ($certificadoCpf)
                    $datasValidacao[] = $certificadoCpf->getDataValidacao();
            }
            if (($datasValidacao) && (count($datasValidacao)>0)) {

                foreach ($datasValidacao as $dataValidacao)
                    if ($datasValidacao > $dataUltimaValidacao ) {
                        $dataUltimaValidacao = $dataValidacao;
                    }
            }
        }
        //TERMINO DA VERIFICACAO DO CLIENTE NOVO DA BASE

        if ($dataUltimaValidacao!=0) {
            $certificado->setDataUltimaValidacao($dataUltimaValidacao);
        }
        $certificado->setDataCompra($data_compra);
        $certificado->setProdutoId($produto->getId());
        $certificado->setClienteId($cliente_id);
        $certificado->setFormaPagamentoId($forma_pgto_id);
        $certificado->setDesconto(0);
        if($prospect->getContadorId()){
            $certificado->setContadorId($prospect->getContadorId());
            $certificado->setAutorizadoVendaSemContador(1);
        }else{
            $certificado->setAutorizadoVendaSemContador(0);
            $certificado->setContadorId(0);
        }
        //FUNCIONÁRIO PADRÃO
        $certificado->setUsuarioId($usuarioLogado->getId());
        $certificado->setLocalId($usuarioLogado->getLocalId());
        $certificado->save();

        //Insere situação cadastro no site
        $certSit = new CertificadoSituacao();
        $certSit->setCertificadoId($certificado->getId());
        $certSit->setComentario("Cadastro Realizado pelo CRM: ".$usuarioLogado->getNome());
        $certSit->setSituacaoId(27);
        $certSit->setData(date('Y-m-d H:i:s'));
        if($contador)
            $id = $parceiro->getUsuarioId();
        else
            $id = $usuarioId;
        $certSit->setUsuarioId($id);
        $certSit->save();

        if ($certificado->getFormaPagamentoId() != "1") {
            $certSit = new CertificadoSituacao();
            $certSit->setCertificadoId($certificado->getId());
            $certSit->setSituacaoId(1);
            $certSit->setData(date('Y-m-d H:i:s'));
            if($contador)
                $id = $parceiro->getUsuarioId();
            else
                $id = $usuarioId;
            $certSit->setUsuarioId($id);
            $certSit->save();
        }

        //CADASTRO DO PEDIDO
        $pedido = new Pedido();
        $pedido->setDataPedido(date("Y-m-d H:i:s",mtime()));
        $pedido->setClienteId($cliente_id);
        $pedido->save();

        $itemPedido = new ItemPedido();
        $itemPedido->setCertificadoId($certificado->getId());
        $itemPedido->setPedidoId($pedido->getId());
        $itemPedido->setProdutoId($produto->getId());
        $itemPedido->save();

        //CADASTRO DE CONTA A RECEBER
        $contaReceber = new ContasReceber();
        $contaReceber->setPedidoId($pedido->getId());
        $contaReceber->setCertificadoId($certificado->getId());
        if ($cliente->getRazaoSocial()) $nomeCliente = $cliente->getRazaoSocial(); else $nomeCliente = $cliente->getNomeFantasia();
        $contaReceber->setDescricao('Compra de certificado digital: ' . $produto->getNome() . ', pelo cliente: '. $cliente->getId() .' - '. $cliente->getNomeFantasia() );
        $contaReceber->setDataDocumento(date("Y-m-d H:i:s",mtime()));
        $contaReceber->setValorDocumento($certificado->getProduto()->getPreco());
        $contaReceber->setFormaPagamentoId($_POST['edtFormaPagamento']);
        if ($certificado->getFormaPagamento()->getNome() == "Boleto")
            $contaReceber->setVencimento(date("Y-m-d H:i:s",mtime()+(2*60*60*24)));
        else
            $contaReceber->setVencimento(mtime());
        $contaReceber->save();

        $retorno = 1;

        echo $retorno;
    }catch (Exception $ex){
        erroEmail( $ex->getMessage(), "Erro na funcao fechar negocio do prosepct");
        echo $ex->getMessage();

    }
?>
