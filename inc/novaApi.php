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

    if ($res->Codigo == 90)
        $res->Codigo = 0;

    $resultado = array(
      'codigo'=>trim($res->Codigo),
      'mensagem'=>trim($res->Mensagem),
    );

    curl_close($cr);
    echo trim(json_encode($resultado));
}

function gerarProtocoloPfNovo (
        $idProduto, $nome, $cpf, $dataNascimento, $ddd, $celular,
        $email, $logradouro, $cep, $bairro, $numero, $uf, $cidade, $clienteNota, $documentoNota, $bairroNota, $cepNota,
        $cidadeNota, $emailNota, $enderecoNota, $numeroNota,
        $estadoNota, $ieNota, $tipoProduto, $produtoValor = 0, $produtoDescricao ='', $cnpjARSolicitante = ''
        ) {
    if ($cnpjARSolicitante == '')
        $CnpjAR2='23917962000105';
    else
        $CnpjAR2=$cnpjARSolicitante;

    $cr = curl_init();

    $payload = '
    {
   "CnpjAR":"'.$CnpjAR2.'",
   "idProduto":"'.$idProduto.'",
   "Nome":"'.$nome.'",
   "CPF":"'.$cpf.'",
   "DataNascimento":"'.$dataNascimento.'",
   "Contato":{
      "DDD":"'.$ddd.'",
      "Telefone":"'.$celular.'",
      "Email":"'.$email.'"
   },
   "Endereco":{
      "Logradouro":"'.$logradouro.'",
      "Numero":"'.$numero.'",
      "Bairro":"'.$bairro.'",
      "UF":"'.$uf.'",
      "Cidade":"'.$cidade.'",
      "CEP":"'.$cep.'"
   },
    "ClienteNotaFiscal":{
      "Sacado":"'.$clienteNota.'",
      "Documento":"'.$documentoNota.'",
      "Bairro":"'.$bairroNota.'",
      "Cep":"'.$cepNota.'",
      "Cidade":"'.$cidadeNota.'",
      "CidadeCodigo":"'.$idProduto.'",
      "Email1":"'.$emailNota.'",
      "Endereco":"'.$enderecoNota.'",
      "Numero":"'.$numeroNota.'",
      "UF":"'.$estadoNota.'",
      "Pais":"Brasil",
      "PaisCodigoAlpha3":"BRA",
      "IE":"'.$ieNota.'"
   },
   "ProdutoValor":"'.$produtoValor.'","ProdutoDescricao":"'.$produtoDescricao.'"
}
';
    $opcoes = array(
        CURLOPT_URL=>"https://acsafeweb.safewebpss.com.br/Service/Microservice/Shared/Partner/api/Add/". $tipoProduto,
        CURLOPT_RETURNTRANSFER=>true,
        CURLOPT_ENCODING=>'',
        CURLOPT_MAXREDIRS=>10,
        CURLOPT_TIMEOUT=>0,
        CURLOPT_FOLLOWLOCATION=>true,
        CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST=>'POST',
        CURLOPT_HTTPHEADER=>array('Authorization:9gafzq4qneqftj5sx6qj','Content-Type:application/json'),
        //CURLOPT_POSTFIELDS=>"{'CNPJ':'28410978000140','CPF':'51397862220','DocumentoTipo':'2','DtNascimento':'1984-03-03'}​​​​​",
        CURLOPT_POSTFIELDS=>$payload,

    );

    curl_setopt_array($cr, $opcoes);

    $postResult = curl_exec($cr);

    $res = json_decode($postResult);

    if (curl_errno($cr)) {
        $resultado = array('protocolo' => 'erro',
            'mensagem'=>trim(curl_error($cr)),
            'payload' => $payload
        );

    }

    if (is_string($res)) {
        $resultado = array ('protocolo'=>$res);
    } else {
        //echo $payload;
        $resultado = array('protocolo' => 'erro',
            'CustomErrorType'=>trim($res->CustomErrorType),
            'CustomErrorCode'=>trim($res->CustomErrorCode),
            'mensagem'=>trim($res->Message),
            'payload' => $payload
        );
    }

    curl_close($cr);
    return $resultado;
}

function gerarProtocoloPjNovo (
    $idProduto, $razaoSocial, $nomeFantasia, $nome, $cnpj = '', $cpf, $dataNascimento,
    $enderecoResponsavel, $cepResponsavel, $bairroResponsavel, $numeroResponsavel, $ufResponsavel, $cidadeResponsavel, $dddResponsavel, $celularResponsavel,
    $emailResponsavel, $ddd, $celular, $email, $logradouro, $cep, $bairro, $numero, $uf, $cidade, $clienteNota, $documentoNota, $bairroNota, $cepNota,
    $cidadeNota, $emailNota, $enderecoNota, $numeroNota,  $estadoNota, $ieNota, $tipoProduto, $produtoValor = 0, $produtoDescricao ='', $cnpjArSolicitante = ''
) {

    if ($cnpjArSolicitante == '')
        $CnpjAR='23917962000105';
    else
        $CnpjAR=$cnpjArSolicitante;

    $cr = curl_init();

    $payload = '
   { "CnpjAR":"'.$CnpjAR.'", "idProduto":"'.$idProduto.'", "RazaoSocial":"'.$razaoSocial.'", "NomeFantasia":"'.$nomeFantasia.'" ,
   "CNPJ":"'.$cnpj.'", "Contato":{ "DDD":"'.$ddd.'", "Telefone":"'.$celular.'", "Email":"'.$email.'" },
    "Titular":{
      "Nome":"'.$nome.'",
      "CPF":"'.$cpf.'",
      "DataNascimento":"'.$dataNascimento.'",
      "Contato":{
         "DDD":"'.$dddResponsavel.'",
         "Telefone":"'.$celularResponsavel.'",
         "Email":"'.$emailResponsavel.'"
      },
      "Endereco":{
         "Logradouro":"'.$enderecoResponsavel.'",
         "Numero":"'.$numeroResponsavel.'",
         "Bairro":"'.$bairroResponsavel.'",
         "UF":"'.$ufResponsavel.'",
         "Cidade":"'.$cidadeResponsavel.'",
         "CEP":"'.$cepResponsavel.'"
      },      
   }, 
   "Endereco":{ "Logradouro":"'.$logradouro.'", "Numero":"'.$numero.'", "Bairro":"'.$bairro.'", "UF":"'.$uf.'", "Cidade":"'.$cidade.'", 
   "CEP":"'.$cep.'" }, "ClienteNotaFiscal":{ "Sacado":"'.$clienteNota.'", "Documento":"'.$documentoNota.'", "Bairro":"'.$bairroNota.'", "Cep":"'.$cepNota.'", 
   "Cidade":"'.$cidadeNota.'", "CidadeCodigo":"4314902", "Email1":"'.$emailNota.'", 
   "Endereco":"'.$enderecoNota.'", "Numero":"'.$numeroNota.'", "UF":"'.$estadoNota.'", "UFCodigo":"43", "Pais":"Brasil", "PaisCodigoAlpha3":"BRA", "IE":"'.$ieNota.'"    
   }, 
   "ProdutoValor":"'.$produtoValor.'","ProdutoDescricao":"'.$produtoDescricao.'"
   }
    ';
    $opcoes = array(
        CURLOPT_URL=>"https://acsafeweb.safewebpss.com.br/Service/Microservice/Shared/Partner/api/Add/". $tipoProduto,
        CURLOPT_RETURNTRANSFER=>true,
        CURLOPT_ENCODING=>'',
        CURLOPT_MAXREDIRS=>10,
        CURLOPT_TIMEOUT=>0,
        CURLOPT_FOLLOWLOCATION=>true,
        CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST=>'POST',
        CURLOPT_HTTPHEADER=>array('Authorization:9gafzq4qneqftj5sx6qj','Content-Type:application/json'),
        //CURLOPT_POSTFIELDS=>"{'CNPJ':'28410978000140','CPF':'51397862220','DocumentoTipo':'2','DtNascimento':'1984-03-03'}​​​​​",
        CURLOPT_POSTFIELDS=>$payload,

    );

    curl_setopt_array($cr, $opcoes);

    $postResult = curl_exec($cr);
    $res = json_decode($postResult);

    if (curl_errno($cr)) {
        $resultado = array('protocolo' => 'erro',
            'mensagem'=>trim(curl_error($cr)),
            'payload' => $payload
        );

    }

    if (is_string($res)) {
        $resultado = array ('protocolo'=>$res);
    } else {
        //echo $payload;
        $resultado = array('protocolo' => 'erro',
            'CustomErrorType'=>trim($res->CustomErrorType),
            'CustomErrorCode'=>trim($res->CustomErrorCode),
            'mensagem'=>trim($res->Message),
            'payload' => $payload
        );
    }

    curl_close($cr);
    return $resultado;
}

function inserirHope ($protocolo, $tipoEmissao){
    $cr = curl_init();

    if ($tipoEmissao == 2) {
        $url = 'https://acsafeweb.safewebpss.com.br/Service/Microservice/Hope/Shared/api/integration/renovation';
    } elseif ($tipoEmissao == 3) {
        $url = 'https://acsafeweb.safewebpss.com.br/Service/Microservice/Hope/Shared/api/integration/solicitation';
    }

    $payload = '
        {
        "protocol":"'.$protocolo.'"
        }
    ';


    $opcoes = array(
        CURLOPT_URL=>$url,
        CURLOPT_RETURNTRANSFER=>true,
        CURLOPT_ENCODING=>'',
        CURLOPT_MAXREDIRS=>10,
        CURLOPT_TIMEOUT=>0,
        CURLOPT_FOLLOWLOCATION=>true,
        CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST=>'POST',
        CURLOPT_HTTPHEADER=>array('Authorization: bearer e2f3c4a3f3be74fb7449fba7d19d2cbd27f92e99574a54acdfa655e5274d87a4','Content-Type:application/json'),
        CURLOPT_POSTFIELDS=>$payload,

    );

    curl_setopt_array($cr, $opcoes);

    $postResult = curl_exec($cr);
    $res = json_decode($postResult);

    if (curl_errno($cr)) {
        print curl_error($cr);
    }

    $resultado = array(
        'url'=>trim($res->url),
        'mensagemApi'=>trim($res->message),
    );

    curl_close($cr);
    return $resultado;
}
?>