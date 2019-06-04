<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/pagarme-php/Pagarme.php';	 

	require_once $_SERVER['DOCUMENT_ROOT'] . "/loader_off.php";

    Pagarme::setApiKey("ak_live_snGWlbkg0GxidcKPpKfWyUojRPoaBC");



 // TESTA TODAS AS VARIAVEIS QUE VEM DA TRANSACAO NO RETORNO DO PAGAR.ME
/*ob_start();                      // start capturing output
var_dump($_POST);
$mensagem = ob_get_contents();    // get the contents from the buffer
ob_end_clean();
mail('correia.antonio@gruposerama.com.br', "Teste pagamento por cartão de crédito", $mensagem, $headers);

array(8) { ["id"]=> string(7) "1535298" ["fingerprint"]=> string(40) "9b9a6f8932e412367369cfdb3dfbc962c2762d21" ["event"]=> string(26) "transaction_status_changed" ["old_status"]=> string(10) "processing" ["desired_status"]=> string(4) "paid" ["current_status"]=> string(4) "paid" ["object"]=> string(11) "transaction"
["transaction"]=> array(41) {
["object"]=> string(11) "transaction"
["status"]=> string(4) "paid"
["refuse_reason"]=> string(0) ""
["status_reason"]=> string(8) "acquirer"
["acquirer_response_code"]=> string(2) "00"
["acquirer_name"]=> string(11) "development"
["acquirer_id"]=> string(24) "56828fc32449bc812ea9abd5"
["authorization_code"]=> string(6) "952962"
["soft_descriptor"]=> string(0) ""
["tid"]=> string(13) "1494872942394" ["nsu"]=> string(13) "1494872942394" ["date_created"]=> string(24) "2017-05-15T18:29:03.461Z" ["date_updated"]=> string(24) "2017-05-15T18:29:03.687Z" ["amount"]=> string(5) "36300" ["authorized_amount"]=> string(5) "36300" ["paid_amount"]=> string(5) "36300" ["refunded_amount"]=> string(1) "0" ["installments"]=> string(1) "1" ["id"]=> string(7) "1535298" ["cost"]=> string(2) "50" ["card_holder_name"]=> string(21) "ANTONIO C P C CORREIA" ["card_last_digits"]=> string(4) "2000" ["card_first_digits"]=> string(6) "376606" ["card_brand"]=> string(4) "amex" ["card_pin_mode"]=> string(0) "" ["postback_url"]=> string(63) "http://www.dashboard.serama.com.br/retorno_transacao_cartao.php" ["payment_method"]=> string(11) "credit_card" ["capture_method"]=> string(9) "ecommerce" ["antifraud_score"]=> string(0) "" ["boleto_url"]=> string(0) "" ["boleto_barcode"]=> string(0) "" ["boleto_expiration_date"]=> string(0) "" ["referer"]=> string(7) "api_key" ["ip"]=> string(0) "" ["subscription_id"]=> string(0) "" ["phone"]=> string(0) "" ["address"]=> string(0) "" ["customer"]=> array(9) { ["object"]=> string(8) "customer" ["document_number"]=> string(14) "03954033000169" ["document_type"]=> string(4) "cnpj" ["name"]=> string(21) "ANTONIO C P C CORREIA" ["email"]=> string(22) "daniela@certificbr.com" ["born_at"]=> string(0) "" ["gender"]=> string(0) "" ["date_created"]=> string(24) "2017-05-14T22:05:17.772Z" ["id"]=> string(6) "185780" } ["card"]=> array(12) { ["object"]=> string(4) "card" ["id"]=> string(30) "card_cj2p91dob0396m06eecihprxu" ["date_created"]=> string(24) "2017-05-14T22:05:17.820Z" ["date_updated"]=> string(24) "2017-05-14T22:05:18.784Z" ["brand"]=> string(4) "amex" ["holder_name"]=> string(21) "ANTONIO C P C CORREIA" ["first_digits"]=> string(6) "376606" ["last_digits"]=> string(4) "2000" ["country"]=> string(2) "BR" ["fingerprint"]=> string(12) "6NSguTRv8806" ["valid"]=> string(4) "true" ["expiration_date"]=> string(4) "0120" } ["split_rules"]=> string(0) "" ["metadata"]=> array(1) { ["idCertificado"]=> string(6) "121948" } } }
*/


$mensagemCartao = '';
switch ($_POST['current_status']) {
    case 'processing':
        $mensagemCartao = 'O pagamento com este cart&aacute;o será processado em breve. Aguarde!';
        break;
    case 'authorized':
        $mensagemCartao = 'Parab&eacute;ns, o pagamento com este cartão foi autorizado e ser&aacute; debitado em breve!';
        break;
    case 'paid':
        /*
        * BUSCA O CERTIFICADO DAQUELA TRANSACAO E O CONTAS A RECEBER E FAZ BAIXA AUTOMATICA DE TUDO
        * */
        if (isset ($_POST['transaction']['metadata']['idCertificado'])) {
            try {
                $con = Propel::getConnection();
                $con->beginTransaction();
                $certificado = CertificadoPeer::retrieveByPK($_POST['transaction']['metadata']['idCertificado']);
                /*$certificado = CertificadoPeer::retrieveByPK(121948);*/

                if ($certificado) {
                    $cPagamento = new Criteria();
                    $cPagamento->add(CertificadoPagamentoPeer::CERTIFICADO_ID, $certificado->getId());
                    $cPagamento->addDescendingOrderByColumn(CertificadoPagamentoPeer::ID);
                    $certificadoPagamento = CertificadoPagamentoPeer::doSelectOne($cPagamento);

                    /*CARTAO DE CREDITO*/
                    $certificadoPagamento->setCodigoPagamento($_POST['transaction']['tid']);
                    $certificadoPagamento->setDataPagamento(date('Y-m-d H:i:s'));
                    $certificadoPagamento->setDataConfirmacaoPagamento(date('Y-m-d H:i:s'));
                    $certificadoPagamento->save();

                    $dataLancamento = date('Y-m-d H:i:s');

                    $cReceber = new Criteria();
                    $cReceber->add(ContasReceberPeer::CERTIFICADO_ID, $certificado->getId());
                    $contaReceber = ContasReceberPeer::doSelectOne($cReceber);
                    if ($contaReceber) {
                        $contaReceber->setDataPagamento($dataLancamento);
                        $contaReceber->setBancoId(1);
                        $contaReceber->setFormaPagamentoId($_POST['formaPagamento']);
                        $contaReceber->setCodigoDocumento($_POST['codigoOperacao']);
                        $contaReceber->setObservacao(utf8_decode($_POST['observacao']));

                        $lancamentoConta = new LancamentoConta();
                        $lancamentoConta->setDataLancamento($dataLancamento);
                        $lancamentoConta->setDescricao('Baixa da conta: ' . $contaReceber->getDescricao());
                        $lancamentoConta->setObservacao('BAIXA DE PAGAMENTO PAGAR.ME CART&Atilde;O');
                        $lancamentoConta->setValor($certificado->getProduto()->getPreco() - $certificado->getDesconto());
                        $lancamentoConta->setTipo('C');
                        $lancamentoConta->setContaReceberId($contaReceber->getId());
                        $lancamentoConta->setContaBancariaId(1);

                        $certificado->setDataConfirmacaoPagamento($dataLancamento);
                        if ($certificado->getDataPagamento())
                            $certificado->setDataPagamento($dataLancamento);

                        $certSit = new CertificadoSituacao();
                        $certSit->setCertificadoId($certificado->getId());
                        $cSit = new Criteria();
                        $certSit->setUsuarioId(868);
                        $cSit->add(SituacaoPeer::SIGLA, 'conf_pag');
                        $certSit->setSituacao(SituacaoPeer::doSelectOne($cSit));
                        $certSit->setComentario(utf8_decode('Pagamento via Cartão de Crédito. Parab&eacute;ns, o pagamento com este cartão foi aprovado!' . $_POST['transaction']['nsu']));
                        $certSit->setData(date("Y-m-d H:i:s"));
                    }
                    $certificado->save();
                    /*SALVA SITUACAO DE BAIXA DE PAGAMENTO*/
                    $certSit->save();

                    $contaReceber->save();
                    $lancamentoConta->save();
                    $con->commit();
                    $mensagemCartao = 'Parab&eacute;ns, o pagamento com este cartão foi aprovado!';

                    enviarEmailRetornoCartaoCredito(
                        'pago',
                        $_POST['transaction']['metadata']['idCertificado'],
                        $_POST['transaction']['card_last_digits'],
                        $_POST['transaction']['nsu'],
                        $_POST['transaction']['card_holder_name'],
                        $_POST['transaction']['metadata']['nomeProduto'],
                        $_POST['transaction']['amount']/100,
                        $_POST['transaction']['metadata']['nomeCliente'],
                        $_POST['transaction']['card_brand'],
                        $mensagemCartao,
                        $_POST['transaction']['metadata']['emailCliente'],
                        $_POST['transaction']['metadata']['emailConsultor']

                    );


                } else {
                    $con->rollBack();
                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                    $headers .= 'from:SAC Serama<financeiro@serama.com.br>' . "\r\n";

                    mail('correia.antonio@gruposerama.com.br, financeiro@serama.com.br', utf8_decode("Erro de conciliacao de Cartao de Credito"),utf8_decode('Nao conseguiu encontrar o certificado:' . $_POST['transaction']['metadata']['idCertificado']), $headers);
                }
            } catch (Exception $e){
                $con->rollBack();
                // To send HTML mail, the Content-type header must be set
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                $headers .= 'from:SAC Serama<financeiro@serama.com.br>' . "\r\n";

                mail('correia.antonio@gruposerama.com.br, financeiro@serama.com.br', utf8_decode("Erro de conciliacao de Cartao de Credito"),'Erro ao tentar atualizar o cd:' . $_POST['transaction']['metadata']['idCertificado'], $headers);
            }

        }

        break;
    case 'refunded':

        /*
        * BUSCA O CERTIFICADO DAQUELA TRANSACAO E O CONTAS A RECEBER E FAZ O EXTORNO
        * */
        if (isset ($_POST['transaction']['metadata']['idCertificado'])) {
            try {
                $con = Propel::getConnection();
                $con->beginTransaction();
                $certificado = CertificadoPeer::retrieveByPK($_POST['transaction']['metadata']['idCertificado']);
                /*$certificado = CertificadoPeer::retrieveByPK(121948);*/

                if ($certificado) {
                    $cPagamento = new Criteria();
                    $cPagamento->add(CertificadoPagamentoPeer::CERTIFICADO_ID, $certificado->getId());
                    $certificadoPagamento = CertificadoPagamentoPeer::doSelectOne($cPagamento);

                    /*CARTAO DE CREDITO*/

                    $certificadoPagamento->setDataPagamento(null);
                    $certificadoPagamento->setDataConfirmacaoPagamento(null);
                    $certificadoPagamento->save();

                    $cReceber = new Criteria();
                    $cReceber->add(ContasReceberPeer::CERTIFICADO_ID, $certificado->getId());
                    $contaReceber = ContasReceberPeer::doSelectOne($cReceber);

                    if ($contaReceber) {
                        $dataLancamento = date('Y-m-d H:i:s');
                        $contaReceber->setDataPagamento(null);
                        $contaReceber->setObservacao(utf8_decode($contaReceber->getObservacao() .' TRANSAÇÃO REEMBOLSADA MANUALMENTE'));

                        $lancamentoConta = new LancamentoConta();
                        $lancamentoConta->setDataLancamento($dataLancamento);
                        $lancamentoConta->setDescricao('Extorno da conta: ' . $contaReceber->getDescricao());
                        $lancamentoConta->setObservacao(utf8_decode('TRANSAÇÃO REEMBOLSADA MANUALMENTE'));
                        $lancamentoConta->setValor($certificado->getProduto()->getPreco() - $certificado->getDesconto());
                        $lancamentoConta->setTipo('D');
                        $lancamentoConta->setContaReceberId($contaReceber->getId());
                        $lancamentoConta->setContaBancariaId(1);

                        $certificado->setDataConfirmacaoPagamento(null);
                        $certificado->setDataPagamento(null);

                        $certSit = new CertificadoSituacao();
                        $certSit->setCertificadoId($certificado->getId());
                        $cSit = new Criteria();
                        $certSit->setUsuarioId(868);
                        $cSit->add(SituacaoPeer::SIGLA, 'ref_pagt');
                        $certSit->setSituacao(SituacaoPeer::doSelectOne($cSit));
                        $certSit->setComentario(utf8_decode('Esta transação foi reembolsada para o cliente. Por algum motivo, o pagamento com este cartão será reembolsado para o cliente. Procure o financeiro para maiores informa&ccedil;&otilde;es!' . $_POST['transaction']['nsu']));
                        $certSit->setData(date("Y-m-d H:i:s"));
                    }
                    $certificado->save();
                    /*SALVA SITUACAO DE BAIXA DE PAGAMENTO*/
                    $certSit->save();

                    $contaReceber->save();
                    $lancamentoConta->save();
                    $con->commit();
                    $mensagemCartao = 'Por algum motivo, o pagamento com este cartão será reembolsado para o cliente. Procure o financeiro para maiores informa&ccedil;&otilde;es!';

                    enviarEmailRetornoCartaoCredito(
                        'extornado',
                        $_POST['transaction']['metadata']['idCertificado'],
                        $_POST['transaction']['card_last_digits'],
                        $_POST['transaction']['nsu'],
                        $_POST['transaction']['card_holder_name'],
                        $_POST['transaction']['metadata']['nomeProduto'],
                        $_POST['transaction']['amount']/100,
                        $_POST['transaction']['metadata']['nomeCliente'],
                        $_POST['transaction']['card_brand'],
                        $mensagemCartao,
                        $_POST['transaction']['metadata']['emailCliente'],
                        $_POST['transaction']['metadata']['emailConsultor']

                    );

                } else {
                    $con->rollBack();
                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                    $headers .= 'from:SAC Serama<financeiro@serama.com.br>' . "\r\n";

                    mail('correia.antonio@gruposerama.com.br, financeiro@serama.com.br', utf8_decode("Erro de conciliacao de Cartao de Credito"),utf8_decode('Nao conseguiu encontrar o certificado:' . $_POST['transaction']['metadata']['idCertificado']), $headers);
                }
            } catch (Exception $e){
                $con->rollBack();
                // To send HTML mail, the Content-type header must be set
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                $headers .= 'from:SAC Serama<financeiro@serama.com.br>' . "\r\n";

                mail('correia.antonio@gruposerama.com.br, financeiro@serama.com.br', utf8_decode("Erro de conciliacao de Cartao de Credito"),'Erro ao tentar atualizar o cd:' . $_POST['transaction']['metadata']['idCertificado'], $headers);
            }

        }

        break;
    case 'waiting_payment':
        $mensagemCartao = 'O pagamento com este cartão será processado em breve. Aguarde!';
        break;
    case 'pending_refund':
        $mensagemCartao = 'O pagamento com este cartão está aguardando para ser reembolsado. Procure o financeiro para maiores informa&ccedil;&otilde;es!';
        mail('correia.antonio@gruposerama.com.br', "Teste pagamento por cartão de crédito", 'pendente de reembolso', $headers);
        break;
    case 'refused':
        /*
       * BUSCA O CERTIFICADO DAQUELA TRANSACAO E O CONTAS A RECEBER E FAZ O EXTORNO
       * */
        if (isset ($_POST['transaction']['metadata']['idCertificado'])) {
            try {
                $con = Propel::getConnection();
                $con->beginTransaction();
                $certificado = CertificadoPeer::retrieveByPK($_POST['transaction']['metadata']['idCertificado']);
                /*$certificado = CertificadoPeer::retrieveByPK(121948);*/

                if ($certificado) {
                    $cPagamento = new Criteria();
                    $cPagamento->add(CertificadoPagamentoPeer::CERTIFICADO_ID, $certificado->getId());
                    $certificadoPagamento = CertificadoPagamentoPeer::doSelectOne($cPagamento);

                    /*CARTAO DE CREDITO*/

                    $certificadoPagamento->setDataPagamento(null);
                    /*parei aqui*/
                    $certificadoPagamento->setObservacao(utf8_decode('Cartão de crédito recusado'));
                    $certificadoPagamento->save();

                    $certSit = new CertificadoSituacao();
                    $certSit->setCertificadoId($certificado->getId());
                    $cSit = new Criteria();
                    $certSit->setUsuarioId(868);
                    $cSit->add(SituacaoPeer::SIGLA, 'rej_pagt');
                    $certSit->setSituacao(SituacaoPeer::doSelectOne($cSit));
                    $certSit->setComentario(utf8_decode('Por alguma razão o pagamento com este cart&atilde;o foi recusado. Por favor, verifique com o cliente o motivo. Código da transação:' . $_POST['transaction']['nsu']));
                    $certSit->setData(date("Y-m-d H:i:s"));

                    $certificado->save();
                    /*SALVA SITUACAO DE BAIXA DE PAGAMENTO*/
                    $certSit->save();

                    $con->commit();
                    $mensagemCartao = 'Por algum motivo o pagamento com este cart&atilde;o foi recusado. Por favor, verifique com o cliente o motivo. Código da transação: '. $_POST['transaction']['nsu'];

                    enviarEmailRetornoCartaoCredito(
                        'recusado',
                        $_POST['transaction']['metadata']['idCertificado'],
                        $_POST['transaction']['card_last_digits'],
                        $_POST['transaction']['nsu'],
                        $_POST['transaction']['card_holder_name'],
                        $_POST['transaction']['metadata']['nomeProduto'],
                        $_POST['transaction']['amount']/100,
                        $_POST['transaction']['metadata']['nomeCliente'],
                        $_POST['transaction']['card_brand'],
                        $mensagemCartao,
                        $_POST['transaction']['metadata']['emailCliente'],
                        $_POST['transaction']['metadata']['emailConsultor']

                    );
                } else {
                    $con->rollBack();
                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                    $headers .= 'from:SAC Serama<financeiro@serama.com.br>' . "\r\n";

                    mail('correia.antonio@gruposerama.com.br, financeiro@serama.com.br', utf8_decode("Erro de conciliacao de Cartao de Credito"),utf8_decode('Nao conseguiu encontrar o certificado:' . $_POST['transaction']['metadata']['idCertificado']), $headers);
                }
            } catch (Exception $e){
                $con->rollBack();
                // To send HTML mail, the Content-type header must be set
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                $headers .= 'from:SAC Serama<financeiro@serama.com.br>' . "\r\n";

                mail('correia.antonio@gruposerama.com.br, financeiro@serama.com.br', utf8_decode("Erro de conciliacao de Cartao de Credito"),'Erro ao tentar atualizar o cd:' . $_POST['transaction']['metadata']['idCertificado'], $headers);
            }

        }
        break;

}

$mensagemMotivoRecusa = '';
switch ($_POST['status_reason']) {
    case 'acquirer':
        $mensagemMotivoRecusa = ' | Fonte: O adquirente do cart&aatilde;o';
        break;
    case 'antifraud':
        $mensagemMotivoRecusa = ' | Fonte: O sistema anti-fraude';
        break;
    case 'internal_error':
        $mensagemMotivoRecusa = ' | Fonte: O sistema do gateway';
        break;
    case 'no_acquirer':
        $mensagemMotivoRecusa = ' | Fonte: desconhecida';
        break;
    case 'acquirer_timeout':
        $mensagemMotivoRecusa = ' | Fonte: Limite de tempo esgotado';
        break;
}
?>