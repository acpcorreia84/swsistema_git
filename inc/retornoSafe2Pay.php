<?php

$mensagem = '';
$mensagem = json_encode( $_POST);

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$headers .= 'from:SafetoPay Retorno<antonio.correia@arsw.com.br>' . "\r\n";

//mail('antonio.correia@arsw.com.br', "Retorno Boleto SafeToPay|SW", $mensagem, $headers);

?>