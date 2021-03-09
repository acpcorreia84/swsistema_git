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
 *
 *     ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/loader.php';

$usuario_id = $_POST['usuario_id'];
$funcao = $_POST['funcao'];
if ($funcao=='consulta_previa_nova') { consultaPrevia();}

function consultaPrevia() {
    $cr = curl_init();
    if (!$_POST['cpf'] || !$_POST['tipo'] || !$_POST['nascimento']) {
        echo json_encode(
            array(
                'codigo'=>99,
                'mensagem'=>'Faltou informar algum dado. Por favor confira novamente',
            )
        );
        return false;
    }
    $cpfCliente = removeTracoPontoBarra($_POST['cpf']);
    $tipoCliente = $_POST['tipo'];
    $nascimentoCliente = dataDMAtoAMD($_POST['nascimento']);
    $cnpjCliente = removeTracoPontoBarra($_POST['cnpj']);
//var_dump($cpfCliente, $tipoCliente, $nascimentoCliente, $cnpjCliente);
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
        CURLOPT_POSTFIELDS=>"{'CNPJ':'".$cnpjCliente."', 'CPF':'".$cpfCliente."','DocumentoTipo':'".$tipoCliente."','DtNascimento':'".$nascimentoCliente."'}​​​​​",

        );

    curl_setopt_array($cr, $opcoes);

    $postResult = curl_exec($cr);
    $res = json_decode($postResult);

    if (curl_errno($cr)) {
        print curl_error($cr);
    }

    $resultado = array(
      'codigo'=>trim($res->Codigo),
      'mensagem'=>trim($res->Mensagem),
    );

    curl_close($cr);
    echo trim(json_encode($resultado));
}
?>
 
