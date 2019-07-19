<?php
/**
 * Classe para comunicação com o webservice da SafeWeb
 * O objetivo desta classe é fazer a comunicação com o webservice da SafeWeb de forma simples, sem dependências e de r?pida configura??o.
 *
 * @author Márcio Haupenthal
 * @version 1.1 - 27/01/2016
 */

require_once $_SERVER['DOCUMENT_ROOT']."/inc/uteis.php";

Class WSContador{
    const WSDL = 'https://gestao.contadorparceirosafeweb.com.br/api/ContadorParceiro/AddContadorParceiro';

    const LOCAL_CERT =  'C:/xampp/htdocs/swsistema/inc/cert/SwDigital.pem'; // caminho para o certificado
    const ID_PARCEIRO = '385'; //id do parceiro, cadastrado na safeweb
    const ENCODING = ''; //'utf8_encode' ou 'utf8_decode' ou '' para nao alterar o encoding

    const VALIDATOR_CPF = '/[0-9]{11}/';
    const VALIDATOR_CNPJ = '/[0-9]{14}/';
    const VALIDATOR_DATA_NASCIMENTO = '/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/';
    private $soapClient;

    public function __construct(){
		ini_set('soap.wsdl_cache_enabled',0);
		ini_set('soap.wsdl_cache_ttl',0);

		ini_set('xdebug.var_display_max_depth', 5);
		ini_set('xdebug.var_display_max_children', 256);
		ini_set('xdebug.var_display_max_data', 1024);

		$this->validator = array(
			'CPF' 				=> array(self::VALIDATOR_CPF, removeEspeciais('CPF Inválido, deve ser informado somente os números')),
			'CNPJ' 				=> array(self::VALIDATOR_CPF, removeEspeciais('CNPJ Inválido, deve ser informado somente os números')),
			'DataNascimento' 	=> array(self::VALIDATOR_DATA_NASCIMENTO, removeEspeciais('"Data de Nascimento inválida, deve ser no formato dd/mm/YYYY')),
		);
	}

	/**
	 * @param array $campos campos a serem validados
	 * @return true se passou em todas as validadores
	 * @throws exception se alguma valida??o n?o passou nos testes
	 */
	private function isValid($campos){
		foreach($campos as $campo => $valor){
			if(isset($this->validator[$campo])){
				$expressao = $this->validator[$campo][0];
				if(!preg_match($expressao, $valor)){
					throw new Exception($this->validator[$campo][1], 400);
				}
			}
		}

		return true;
	}

	/**
	 * Monta o xml da requisi??o para enviar ao web service
	 * @param string $root nome do n? root
	 * @param array $parametros array de pares com o nome e valor do n?
	 * @return string xml
	 */
	private function montarXml($root = '', $parametros){

		$xml = '<?xml version="1.0" encoding="utf-8"?>'."<$root>";

		$xml .= $this->arrayToXml($parametros);

		$xml .= "</$root>";

		return $xml;
	} 

	/**
	 * Retorna o xml j? formatado para ser enviado ao webservice
	 * @param array $array
	 * @return string xml pronto para ser enviado ao webservice
	 */
	private function arrayToXml($array){
		$xml = '';

		foreach($array as $chave => $valor){
			if(is_array($valor) && !empty($valor)){
				$xml .= "<$chave>";
				$xml .= $this->arrayToXml($valor);
				$xml .= "</$chave>";
			}else if(is_array($valor) && empty($valor)){
				$xml .= "<$chave/>";
			}else{
				$xml .= "<$chave>".$this->encoding($valor)."</$chave>";
			}
		}

		return $xml;
	}

	/**
	 * Faz o encoding de $valor. conforme foi definido na constante ENCODING
	 * @param string $valor
	 * @return string
	 */
	private function encoding($valor){
		if(self::ENCODING == 'utf8_encode'){
			return utf8_encode($valor);
		}else if(self::ENCODING == 'utf8_dencode'){
			return utf8_decode($valor);
		}else{
			return $valor;
		} 
	}

	/**
	 * M?todo que faz a chamda ao webservice SOAP da SafeWeb
	 * @param array $request xml do pedido
	 * @param M?todo para chamar no SOAP
	 */
	private function call($request, $requestMethod){
		if(!isset($this->soapClient)){
			try {
				$options = array(
				    'local_cert' => self::LOCAL_CERT,
				);
				$this->soapClient = new SoapClient(self::WSDL, $options);
			} catch (SoapFault $excp) {
				echo $excp;
				exit();
			}
		}

		libxml_use_internal_errors(true);

		$resultMethod = $requestMethod.'Result';

		//consulta ao webservice
		$soapResponse = $this->soapClient->{$requestMethod}($request);

		//verificacao de sucesso
		$soapXml = simplexml_load_string($soapResponse->{$resultMethod});

		if(!isset($soapXml->Status)){
			throw new Exception(utf8_encode("N?o foi poss?vel conectar no webservice"), 500);
		}

		if($soapXml->Status == 'true'){
			//se for um xml v?lido, transforma em array e retorna
			$response = simplexml_load_string($soapXml->Value);
			if($response){
				$response = json_decode(json_encode($response), true);
				return $response;
			}else{
				//se n?o for um xml v?lido, retorna a string
				return (string) $soapXml->Value;
			}
		}else{
			throw new Exception("Erro retornado pelo webservice: ".$soapXml->Error, 400);
		}
	}


    public function postContador ( $nome, $cpf, $dataNascimento, $crc, $email, $fone,
								   $genero, $endereco){


        $request = array(
            'Nome' 				=> $nome,
            'CPF' 				=> $cpf,
            'DataNascimento' 	=> $dataNascimento,
            'CRC'				=> $crc,
            'Email'				=> $email,
            'Telefone' 			=> $fone,
            'Profissao' 		=> 'Contador',
            'Genero'			=> $genero,

            //Endereco
            'Endereco' => array(
                'Logradouro' 	=> isset($endereco['logradouro']) ? $endereco['logradouro'] : null,
                'CEP' 			=> isset($endereco['cep']) ? $endereco['cep'] : null,
                'Cidade' 		=> array (
                	'CodigoIBGE'	=> isset($endereco['cidadeIBGE']) ? $endereco['cidadeIBGE'] : null,
					'Uf'		=> array(
						'CodigoIBGE' => isset($endereco['ufIBGE']) ? $endereco['ufIBGE'] : null,
					),
				),
                'Bairro' 		=> isset($endereco['bairro']) ? $endereco['bairro'] : null,
                'Numero' 		=> isset($endereco['numero']) ? $endereco['numero'] : null,
                'Uf'		=> array(
                    'CodigoIBGE' => isset($endereco['ufIBGE']) ? $endereco['ufIBGE'] : null,
                ),
            ),

        );


        //montagem do xml
        $xml = $this->montarXml('AddContadorParceiro', $request);
        //montagem do array de requisi??o
        $request = array();
        $request['parametro'] = $xml;

        return $this->call($request, 'Solicitar');
    }


}



//Exemplos de uso
$cont = new WSContador();


//solicitar protocolo para pf
/*
 *
 * $nome, $cpf, $dataNascimento, $crc, $email, $fone, $genero, $endereco
 *
*/

$solicitacao = $cont->postContador(
     'Antonio Carlos Correia',
 	'51397862220',
 	'03/03/1984',
	'PA2938-3',
	'antoniocpcorreia@gmail.com',
	'91991049465',
	'Masculino',
 	//endereco
 	array(
 		'Logradouro' => 'Rua Santo Dumont',
 		'CEP' => '93115270',
		array(
			'CodigoIBGE'=>'4314902',
			'UF'=>array('CodigoIBGE'=>'43'),
		),
 		'Bairro' => 'Santos Dumont',
 		'Numero' => '100',
 		'UF' => array('CodigoIBGE'=>'43'),
 	)
 );

var_dump($solicitacao);




?>
<?
/*
//Exemplos de uso
 $cert = new WSCertificado();

//conculta previa por cpf



try {
    $cpf = $cert->consultarCPF('51397862220', '08/04/1986');
} catch (Exception $ex) {
    var_dump(htmlspecialchars ($ex->getMessage()));
}

//solicitar protocolo para pf
 $solicitacao = $cert->solicitarCertificadoPF(
 	150,
 	'ANTONIO CARLOS PESSOA CALDAS CORREIA',
 	'83415262049',
 	'03/03/1984',
// 	contato
 	array(
 		'DDD' => 91,
 		'Telefone' => 33215050,
 		'Email' => 'correia.antonio@gruposerama.com.br'
 	),
// 	endere?o
 	array(
 		'Logradouro' => 'Rua Bernal do Couto',
 		'Numero' => '610',
 		'Complemento' => '',
 		'Bairro' => 'Umarizal',
 		'Cidade' => 'Belem',
 		'UF' => 'PA',
 		'CEP' => '66055080',
 	),
// 	documento
 	array(),
 	array()
 );

 var_dump($solicitacao);
 */
 

/*
  147

e-CNPJ A1

148

e-CNPJ A3

150

e-CPF A3

202

e-CPF A1

2242

e-CNPJ A3

2436

e-CNPJ A3

2446

e-CNPJ A3 + etoken

2447

e-CNPJ A3 + etoken
*/
?>