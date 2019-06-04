<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
    require("inc/pagarme-php/Pagarme.php");
    PagarMe::setApiKey("ak_test_sY6UfR8wCl8AmgWb7ra5MGoOLm54Ny");

    $transaction = new PagarMe_Transaction(array(
        'amount' => 1000,
        'card_hash' => $_POST['card_hash']
    ));

    $transaction->charge();

    $status = $transaction->status; // status da transação
}
?>
<html>
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
<script src="https://assets.pagar.me/js/pagarme.min.js"></script>
<form id="payment_form" action="" method="POST">
    Número do cartão: <input type="text" id="card_number"/>
    <br/>
    Nome (como escrito no cartão): <input type="text" id="card_holder_name"/>
    <br/>
    Mês de expiração: <input type="text" id="card_expiration_month"/>
    <br/>
    Ano de expiração: <input type="text" id="card_expiration_year"/>
    <br/>
    Código de segurança: <input type="text" id="card_cvv"/>
    <br/>
    <div id="field_errors">
    </div>
    <br/>
    <input type="submit">
</form>

<script>
    $(document).ready(function() { // quando o jQuery estiver carregado...
        PagarMe.encryption_key = "ek_test_twB3YV0uykeCjp8QAZTNKdxu5ZysKv";

        var form = $("#payment_form");

        form.submit(function(event) { // quando o form for enviado...
            // inicializa um objeto de cartão de crédito e completa
            // com os dados do form
            var creditCard = new PagarMe.creditCard();
            creditCard.cardHolderName = $("#payment_form #card_holder_name").val();
            creditCard.cardExpirationMonth = $("#payment_form #card_expiration_month").val();
            creditCard.cardExpirationYear = $("#payment_form #card_expiration_year").val();
            creditCard.cardNumber = $("#payment_form #card_number").val();
            creditCard.cardCVV = $("#payment_form #card_cvv").val();

            // pega os erros de validação nos campos do form
            var fieldErrors = creditCard.fieldErrors();

            //Verifica se há erros
            var hasErrors = false;
            for(var field in fieldErrors) { hasErrors = true; break; }

            if(hasErrors) {
                // realiza o tratamento de errors
                alert(fieldErrors);
            } else {
                // se não há erros, gera o card_hash...
                creditCard.generateHash(function(cardHash) {
                    // ...coloca-o no form...
                    form.append($('<input type="hidden" name="card_hash">').val(cardHash));
                    // e envia o form
                    form.get(0).submit();
                });
            }

            return false;
        });
    });
</script>
</body>
</html>
