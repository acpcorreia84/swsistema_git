<?
date_default_timezone_set('America/Belem');
require_once $_SERVER['DOCUMENT_ROOT'].'/loader.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/pagarme-php/Pagarme.php';

$certificado_id = $_REQUEST['certificado_id'];
$usuario_id = $_REQUEST['usuario_id'];
    try{
        $vencimento = $_REQUEST['vencimento'];
        $certificado = CertificadoPeer::retrieveByPK($certificado_id);
        $produto = ProdutoPeer::retrieveByPk($certificado->getProdutoId());
        $clienteId = $certificado->getClienteId();
        $cliente = ClientePeer::retrieveByPk($clienteId);

        if ($cliente->getRazaoSocial())
            $nome = $cliente->getRazaoSocial();
        elseif ($cliente->getNomeFantasia())
            $nome = $cliente->getNomeFantasia();
        elseif ($cliente->getResponsavel())
            $nome = $cliente->getResponsavel()->getNome();

        $cnpj = $cliente->getCpfCnpj();
        $valor = $certificado->getProduto()->getPreco();

        //TelaBoleto.php
        $valor_boleto = ( ($certificado->getProduto()->getPreco()) - ($certificado->getDesconto() ) );
        $vencimento = explode('/',$vencimento);

        $itensPedido = $certificado->getItemPedidos();
        if ($itensPedido) {
            $itemPedido = $itensPedido[0];
            $pedido = $itemPedido->getPedido();
            $contasReceber = $pedido->getContasRecebers();
            $contaReceber = $contasReceber[0];
            $contaReceber->setVencimento($vencimento[2].'/'.$vencimento[1].'/'.$vencimento[0]);
            $contaReceber->save();
        }

        $boleto = new Boleto();
        $boleto->setCertificadoId($certificado->getId());
        $boleto->setVencimento($vencimento[2].'/'.$vencimento[1].'/'.$vencimento[0]);
        $boleto->setDataProcessamento(date("Y-m-d"));
        $boleto->setClienteId($clienteId);
        $boleto->setValor($valor_boleto);
        $boleto->setDescricao($certificado->getProduto()->getNome());
        $boleto->setContasReceberId($contaReceber->getId());
        if ($pedido)
            $boleto->setPedidoId($pedido->getId());
        $boleto->save();

        $certSit = new CertificadoSituacao();
        $certSit->setCertificadoId($certificado->getId());
        $cSit = new Criteria();
        $cSit->add(SituacaoPeer::SIGLA, 'ger_bolt');
        $certSit->setSituacao(SituacaoPeer::doSelectOne($cSit));

        $usuario = UsuarioPeer::retrieveByPK($usuario_id);
        $certSit->setComentario($usuario->getNome()." gerou o boleto");
        $certSit->setData(date("Y-m-d H:i:s"));
        if ($usuario_id)
            $certSit->setUsuarioId($usuario_id);
        $certSit->save();

        $certSit2 = new CertificadoSituacao();
        $certSit2->setCertificadoId($certificado->getId());
        $cSit2 = new Criteria();
        $cSit2->add(SituacaoPeer::SIGLA, 'agu_pagt');
        $certSit2->setSituacao(SituacaoPeer::doSelectOne($cSit2));
        $certSit2->setData(date("Y-m-d H:i:s"));
        $certSit2->save();
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


        $valor= $valor_boleto;
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

        Pagarme::setApiKey("ak_live_snGWlbkg0GxidcKPpKfWyUojRPoaBC");
    //  Pagarme::setApiKey("ak_test_sY6UfR8wCl8AmgWb7ra5MGoOLm54Ny");

        $customer = new PagarMe_Customer(array(
            "document_number" => removeTracoPontoBarra($cnpj),
            "name" => removeEspeciais($nome),
            "email" => $email,
            "address" => array(
                "street" => $endereco,
                "complementary" => $cliente->getComplemento(),
                "street_number" => $cliente->getNumero(),
                "neighborhood" => $cliente->getBairro(),
                "city" => $cliente->getCidade(),
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

        if ($boleto) {
            $boleto->setTid($transacaoId);
            $boleto->save();
        }
        $boleto_id=$boleto->getId();
        ob_start();                      // start capturing output
        include $_SERVER['DOCUMENT_ROOT'].'/inc/email_boleto_pagarMe.php?certificado_id='.$boleto_id.'&boleto_url='.$boleto_url;   // execute the file
        $mensagem = ob_get_contents();    // get the contents from the buffer
        ob_end_clean();
        // To send HTML mail, the Content-type header must be set
        sendEmail($clienteId,$usuario_id,$boleto_barcode,$produto->getId());
        //INSERI AQUI ENVIO DE BOLETO PARA EMAIL DO CLIENTE
        echo $boleto_url.';0';


    }catch(Exception $e){
        echo $e->getMessage();
    }
};
?>