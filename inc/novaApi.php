<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 08/03/2021
 * Time: 10:34
 */

/*
 * Segue tokens de autenticação:

Hope: e2f3c4a3f3be74fb7449fba7d19d2cbd27f92e99574a54acdfa655e5274d87a4

Demais APIs: 9gafzq4qneqftj5sx6qj
 *
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$cr = curl_init();
$opcoes = array(
    CURLOPT_URL=>"https://acsafeweb.safewebpss.com.br/Service/Microservice/Shared/ConsultaPrevia/api/RealizarConsultaPrevia",
    CURLOPT_RETURNTRANSFER=>true,
    CURLOPT_ENCODING=>'',
    CURLOPT_MAXREDIRS=>10,
    CURLOPT_TIMEOUT=>0,
    CURLOPT_FOLLOWLOCATION=>true,
    CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST=>'POST',
    CURLOPT_HTTPHEADER=>array('Authorization:9gafzq4qneqftj5sx6qj','Content-Type:application/json'),
    //CURLOPT_POSTFIELDS=>"{'CNPJ':'28410978000140','CPF':'51397862220','DocumentoTipo':'2','DtNascimento':'1984-03-03'}​​​​​",
    CURLOPT_POSTFIELDS=>"{'CPF':'51397862220','DocumentoTipo':'1','DtNascimento':'1984-03-03'}​​​​​",

    );

curl_setopt_array($cr, $opcoes);

$postResult = curl_exec($cr);

if (curl_errno($cr)) {
    print curl_error($cr);
}
var_dump($postResult);
curl_close($cr);
/*
if (curl_errno($cr)) {
    print curl_error($cr);
}
var_dump(curl_version());

curl_close($cr);

var_dump($response);
*/
?>
 
