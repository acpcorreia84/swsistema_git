<?
require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

$usuarioLogadoRn = ControleAcesso::getUsuarioLogado();
try {
    $prospect = ProspectPeer::retrieveByPK($_POST['edtProspectId']);
    $certificadoAntigo = CertificadoPeer::retrieveByPK($prospect->getCertificadoId());
    $cliente = $certificadoAntigo->getCliente();
    $produtoNovo = ProdutoPeer::retrieveByPK($_POST['edtProdutoRenovacao']);

    $certificadoNovo = new Certificado();

    $certificadoNovo->setDataCompra(date('Y-m-d H:i:s'));

    /*INSERE O CONTADOR NO CERTIFICADO E NO CLIENTE*/
    if($_POST['edtCodigoContadorRenovacao'] != ''){
        $cliente->setContadorId($_POST['edtCodigoContadorRenovacao']);
        $cliente->save();
        $certificadoNovo->setContadorId($_POST['edtCodigoContadorRenovacao']);
    }else{
        $cliente->setContadorId($certificadoAntigo->getContadorId());
        $cliente->save();
        $certificadoNovo->setContadorId($certificadoAntigo->getContadorId());
    }

    /*SE TIVER INFORMADO O CONTADOR A VENDA FICA PARA O USUARIO QUE TEM AQUELE CONTADOR NA CATEIRA
    CASO CONTRARIO A VENDA E PRA O VENDEDOR ANTIGO*/
    if ($certificadoAntigo->getContadorId()!=0) {
        $certificadoNovo->setUsuarioId($certificadoAntigo->getContador()->getUsuarioId());
        $usuarioVenda = $certificadoAntigo->getContador()->getUsuario();
    }
    else {
        $certificadoNovo->setUsuarioId($certificadoAntigo->getUsuarioId());
        $usuarioVenda = $certificadoAntigo->getUsuario();
    }

    $certificadoNovo->setClienteId($certificadoAntigo->getClienteId());
    /*INSERE O PRODUTO ESCOLHIDO NA TELA DE RENOVACAO*/
    $certificadoNovo->setProdutoId($_POST['edtProdutoRenovacao']);
    /*INSERE A FORMA PAGAMENTO ESCOLHIDA NA TELA DE RENOVACAO*/
    $certificadoNovo->setFormaPagamentoId($_POST['edtFormaPagamento']);
    $certificadoNovo->setCodigoDocumento($certificadoAntigo->getCodigoDocumento());
    $certificadoNovo->setLocalId($certificadoAntigo->getLocalId());
    $certificadoNovo->setApagado(0);
    $certificadoNovo->setAutorizadoVendaSemContador(1);
    $certificadoNovo->setDataUltimaValidacao($certificadoAntigo->getDataValidacao());
    $certificadoNovo->setCertificadoRenovado($certificadoAntigo->getId());
    $certificadoNovo->save();

    /* SALVO SITUACAO NO CADASTRO DO ANTIGO CERTIFICADO RENOVADO */
    $situacao = new CertificadoSituacao();
    $situacao->setSituacaoId(20);
    $situacao->setComentario("Certificado Duplicado pelo CRM");
    $situacao->setCertificadoId($certificadoAntigo->getId());
    $situacao->setData(date("Y-m-d H:i:s"));
    $situacao->setUsuarioId($usuarioLogadoRn->getId());
    $situacao->save();

    $situacao = new CertificadoSituacao();
    $situacao->setSituacaoId(26);
    $situacao->setComentario("O Codigo do seu novo certifiocado gerado pelo CRM :".$certificadoNovo->getId());
    $situacao->setCertificadoId($certificadoAntigo->getId());
    $situacao->setData(date('Y-m-d H:i:s'));
    $situacao->setUsuarioId($usuarioLogadoRn->getId());
    $situacao->save();

    /* SITUAÇÕES DO NOVO CADASTRO */
    $situacao = new CertificadoSituacao();
    $situacao->setSituacaoId(26);
    $situacao->setComentario("Certificado Duplicado! Certificado Renovado pelo CRM. Codigo CD Antigo:".$certificadoAntigo->getId() . " venda contabilizada para o vendedor: " . $usuarioVenda->getId() . ' - '. $usuarioVenda->getNome());
    $situacao->setCertificadoId($certificadoNovo->getId());
    $situacao->setData(date("Y-m-d H:i:s"));
    $situacao->setUsuarioId($usuarioLogadoRn->getId());
    $situacao->save();

    $pedido = new Pedido();
    $pedido->setDataPedido(date("Y-m-d", mtime()));
    $pedido->setClienteId($cliente->getId());
    $pedido->setFuncionarioId($usuarioLogadoRn->getId());
    $pedido->save();

    $itemPedido = new ItemPedido();
    $itemPedido->setProdutoId($certificadoNovo->getProdutoId());
    $itemPedido->setCertificadoId($certificadoNovo->getId());
    $itemPedido->setPedidoId($pedido->getId());
    $itemPedido->save();

    $contaReceber = new ContasReceber();
    $contaReceber->setPedidoId($pedido->getId());
    $contaReceber->setCertificadoId($certificadoNovo->getId());
    if ($cliente->getRazaoSocial())
        $nome = $cliente->getRazaoSocial();
    else
        $nome = $cliente->getNomeFantasia();

    $contaReceber->setDescricao("Compra de certificado digital: " . $certificadoNovo->getProduto()->getNome() . " , pelo cliente: " . $nome);
    $contaReceber->setDataDocumento(date("Y-m-d", mtime()));
    $contaReceber->setValorDocumento($certificadoNovo->getProduto()->getPreco());
    $contaReceber->setDesconto($certificadoNovo->getDesconto());
    $contaReceber->setSituacao(0);
    $contaReceber->setFormaPagamentoId($certificadoNovo->getFormaPagamentoId());
    /*SE FOR BOLETO*/
    if ($_POST['edtFormaPagamento'] == 1) {
        $vencimento = explode ('/', $_POST['edtVencimentoBoleto']);
        $contaReceber->setVencimento($vencimento[2].'/'.$vencimento[1].'/'.$vencimento[0]);
    }
    else
        $contaReceber->setVencimento(date('Y-m-d H:i:s'));
    $contaReceber->save();

    /*ATUALIZA PROSPECT*/
    $prospectSituacao = new ProspectSituacao();
    $prospectSituacao->setProspectAcaoId(10);
    $prospectSituacao->setObservacao("Gerou pedido de Renovacao");
    $prospectSituacao->setProspectId($prospect->getId());
    $prospectSituacao->setDataAcao(date("Y-m-d H:i:s"));
    $prospectSituacao->setUsuarioId($usuarioLogado->getId());
    $prospectSituacao->save();

    $prospect->setDataUltimoContato(date('Y-m-d H:i:s'));
    $prospect->save();

    /*GERACAO COMPLETA DO BOLETO*/
    if ($_POST['edtFormaPagamento'] =='1') {
        /*REMOVE A HORA E DIVIDE A STRING NO ARRAY*/
        $vencimento = explode ('/', $_POST['edtVencimentoBoleto']);
        $boleto = new Boleto();
        $boleto->setCertificadoId($certificadoNovo->getId());
        $boleto->setVencimento($vencimento[2].'/'.$vencimento[1].'/'.$vencimento[0]);
        $boleto->setDataProcessamento(date("Y-m-d"));
        $boleto->setClienteId($certificadoAntigo->getClienteId());

        $boleto->setValor( $produtoNovo->getPreco()  );

        $boleto->setDescricao($produtoNovo->getNome());
        $boleto->setContasReceberId($contaReceber->getId());
        $boleto->setPedidoId($pedido->getId());
        $boleto->save();

        $res = $cliente->getResponsavel();
        if (!is_null($res))
            $emailRes = $res->getEmail();

        if ($cliente->getEmail() != '')
            $email = $cliente->getEmail();
        elseif ($emailRes != '')
            $email = $emailRes;
        else
            $email = $cliente->getEmailContato();
        if (is_null($email))
            $emailEnvio = $email;
        else
            $emailEnvio = $email;

        $certSit = new CertificadoSituacao();
        $certSit->setCertificadoId($certificadoNovo->getId());
        $cSit = new Criteria();
        $cSit->add(SituacaoPeer::SIGLA, 'ger_bolt');
        $certSit->setSituacao(SituacaoPeer::doSelectOne($cSit));
        $certSit->setComentario($usuarioLogadoRn->getNome()." gerou o boleto e enviou para o e-mail: " . $emailEnvio);
        $certSit->setData(date("Y-m-d H:i:s"));
        $certSit->setUsuarioId($usuarioLogadoRn->getId());
        $certSit->save();

        $certSit2 = new CertificadoSituacao();
        $certSit2->setCertificadoId($certificadoNovo->getId());
        $cSit2 = new Criteria();
        $cSit2->add(SituacaoPeer::SIGLA, 'agu_pagt');
        $certSit2->setSituacao(SituacaoPeer::doSelectOne($cSit2));
        $certSit2->setComentario("Aguardando Pagamento");
        $certSit2->setData(date("Y-m-d H:i:s"));
        $certSit2->setUsuarioId($usuarioLogadoRn->getId());
        $certSit2->save();

        $valor= $produtoNovo->getPreco();
        $dia= $vencimento[0];
        $mes= $vencimento[1];
        $ano= $vencimento[2];
        $email=$emailEnvio;

        //GerarBoletoPagarMe
        if ($cliente->getEndereco())
            $endereco = removeEspeciais($cliente->getEndereco());
        else
            $endereco = '---';

        $endereco2 = ' Cep:' .$cliente->getCep() .  ' ' . $cliente->getCidade() . ' - '. $cliente->getUf();

        $sacado = urlencode("$nome <br>$cnpj <br>$endereco <br>$endereco2");

        $cnpj = 'Cnpj: '.$cliente->getCpfCnpj();

        require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/pagarme-php/Pagarme.php';
        try {
            Pagarme::setApiKey("ak_live_snGWlbkg0GxidcKPpKfWyUojRPoaBC");
            //  Pagarme::setApiKey("ak_test_sY6UfR8wCl8AmgWb7ra5MGoOLm54Ny");

            $customer = new PagarMe_Customer(array(
                "document_number" => removeTracoPontoBarra($cnpj),
                "name" => removeEspeciais($nome),
                "email" => $email,
                "address" => array(
                    "street" => removeEspeciais($endereco),
                    "complementary" => removeEspeciais($cliente->getComplemento()),
                    "street_number" => $cliente->getNumero(),
                    "neighborhood" => removeEspeciais($cliente->getBairro()),
                    "city" => removeEspeciais($cliente->getCidade()),
                    "state" => $cliente->getUf(),
                    "zipcode" => "66055080",
                    "country" => "Brasil"
                ),
            ));
            $transaction = new PagarMe_Transaction(array(
                "customer" => $customer,
                'amount' => removeTracoPontoBarra($valor.'00'),
                'postback_url' => "http://www.gruposerama.com/retorno_transacao.php",
                "boleto_expiration_date"=>$ano.'-'.$mes.'-'.$dia.'T21:54:56.000Z',
                'payment_method' => "boleto"
            ));

            $transaction->charge();

            $boleto_url = $transaction->boleto_url; // URL do boleto banc�rio
            $boleto_barcode = $transaction->boleto_barcode; // c�digo de barras do boleto banc�rio
            $transacaoId = $transaction->id;

            /*SALVANDO A URL DO BOLETO*/
            $boleto->setUrlBoleto($boleto_url);
            $boleto->save();

            if ($boleto) {
                $boleto->setTid($transacaoId);
                $boleto->save();
            }
            $boleto_id=$boleto->getId();
            // To send HTML mail, the Content-type header must be set
            $resultadoBoleto = enviarEmailBoleto($nome,$emailEnvio, $boleto_barcode,$boleto_url, $produtoNovo->getNome(), $valor);
            //INSERI AQUI ENVIO DE BOLETO PARA EMAIL DO CLIENTE
            if ($resultadoBoleto)
                $resultadoBoleto = ';boletoOk';

        } catch (Exception $e) {
            $resultadoBoleto .= ";erro na geracao do Boleto: " . $e->getMessage();
        }
    }
    /*FIM DA GERACAO DO BOLETO*/

    $resultado = "tudoOk".$resultadoBoleto;
    echo $resultado;
}catch(Exception $e){
    echo $e->getMessage();
}

?>