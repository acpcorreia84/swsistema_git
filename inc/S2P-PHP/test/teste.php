<?php
// O exemplo do objeto completo está detalhado abaixo na sessão "Conteúdo de Envio".
/*
 *
 * $codigoCertificado = $_POST['codigoCertificado'];
$nomeCliente = $_POST['nomeCliente'];

 */

$nomeCliente = 'Antonio Carlos Correia';
$codigoCertificado = 9800000;
$cpfCliente = '51397862220';
$foneCliente = '91991049465';
$emailCliente = 'antoniocpcorreia@gmail.com';
$cepCliente = '66055080';

$ruaCliente = 'Rua Bernal do Couto';
$numeroCliente = '265';
$bairroCliente = 'Umarizal';
$cidadeCliente = 'Belém';
$ufCliente = 'PA';

$codigoProduto = '001';
$precoProduto = '280';
$nomeProduto = 'E-CPF SAFEID';

$dataBoleto = '27/09/2021';

$data = '{
    "IsSandbox": false,
    "Application": "GUIAR_New_S2P",
    "Vendor": "'.$nomeCliente.'",
    "CallbackUrl": "http://swsistema.com.br/inc/retornoteste.php?codigoGuiar='.$codigoCertificado.'",
    "PaymentMethod": "1",
    "Reference": "'.$codigoCertificado.'",
    "Customer": {
        "Name": "'.$nomeCliente.'",
        "Identity": "'.$cpfCliente.'",
        "Phone": "'.$foneCliente.'",
        "Email": "'.$emailCliente.'",
        "Address": {
            "ZipCode": "'.$cepCliente.'",
            "Street": "'.$ruaCliente.'",
            "Number": "'.$numeroCliente.'",
            "District": "'.$bairroCliente.'",
            "CityName": "'.$cidadeCliente.'",
            "StateInitials": "'.$ufCliente.'",
            "CountryName": "Brasil"
        }
    },
    "Products": [
        {
            "Code": "'.$codigoProduto.'",
            "Description": "'.$nomeProduto.'",
            "UnitPrice": '.$precoProduto.',
            "Quantity": 1
        }  
    ],
    "PaymentObject": {
        "DueDate": "'.$dataBoleto.'",
        "CancelAfterDue": false,
        "IsEnablePartialPayment": false
    }
}';
echo "<pre>";
var_dump($data);
$opts = array(
'http'=>array(
'method'=>"POST",
'header'=>"X-API-KEY: A9519C7362984CB7944ACF1EB88162A6\r\n" .
"Content-type: application/json\r\n",
'content'=> $data
)
);

$context = stream_context_create($opts);

$result = file_get_contents('https://payment.safe2pay.com.br/v2/Payment', false, $context);


if ($result === FALSE) { /* Handle error */ }

var_dump($result);

?>