<?php
/**
 * Classe para comunicação com o webservice da SafeWeb
 * O objetivo desta classe é fazer a comunicação com o webservice da SafeWeb de forma simples, sem dependências e de r?pida configura??o.
 *
 * @author Márcio Haupenthal
 * @version 1.1 - 27/01/2016
 */

require_once $_SERVER['DOCUMENT_ROOT']."/inc/uteis.php";

Class WSCertificado{
    const WSDL = 'https://ecommerce.safeweb.com.br/partner/RequisicaoSW.asmx?WSDL';
    //const WSDL = 'http://tche.sede.safeweb.com.br/partnersw/partnersw.asmx?WSDL';
    //const WSDL = 'https://ecommerce.safeweb.com.br/partner/RequisicaoSW.asmx?WSDL';

    //const LOCAL_CERT =  '/home/swsistema/public_html/inc/cert/SwDigital.pem'; // caminho para o certificado
    const LOCAL_CERT =  'C:/xampp/htdocs/swsistema/inc/cert/SwDigital.pem'; // caminho para o certificado
    public $idParceiro = '385'; //id do parceiro, cadastrado na safeweb
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
			'CPF' 				=> array(self::VALIDATOR_CPF, removeEspeciais('CPF Inv?lido, deve ser informado somente os n?meros')),
			'CNPJ' 				=> array(self::VALIDATOR_CPF, removeEspeciais('CNPJ Inv?lido, deve ser informado somente os n?meros')),
			'DataNascimento' 	=> array(self::VALIDATOR_DATA_NASCIMENTO, removeEspeciais('"Data de Nascimento inv?lida, deve ser no formato dd/mm/YYYY')),
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

	/**
	 *	Consulta um CPF, trazendo os dados do dono: Nome, CPF, Data de Nascimento
	 *	@param int $cpf somente os n?meros do cpf
	 *	@param string $dataNascimento no formato dd/mm/YYYY
	 */
	public function consultarCPF($cpf, $dataNascimento){
		$request = array('CPF' => $cpf, 'DataNascimento' => $dataNascimento);

		$this->isValid($request);

		//montagem do xml
		$xml = $this->montarXml('DocumentoConferir', $request);

		//montagem do array de requisi??o
		$request['parametro'] = $xml;

		return $this->call($request, 'ConsultaPrevia');
	}

	/**
	 *	Consulta um CNPJ, trazendo os dados do dono: Nome, Raza?o Social, CPF, Data de Nascimento e CNPJ
	 *	@param int $cpf somente os n?meros do cpf
	 *	@param string $dataNascimento no formato dd/mm/YYYY
	 */
	public function consultarCNPJ($cpf, $dataNascimento, $cnpj){
		$request = array('CPF' => $cpf, 'CNPJ' => $cnpj, 'DataNascimento' => $dataNascimento);

		$this->isValid($request);


		//montagem do xml
		$xml = $this->montarXml('DocumentoConferir', $request);

		//montagem do array de requisi??o
		$request['parametro'] = $xml;

		try {
			return $this->call($request, 'ConsultaPrevia');
		} catch (Exception $e) {
			var_dump($e);
			exit;
		}

	}


	/**
	 *	Solicita um certificado para Pessoa F?sica(PF)
	 *	@param int $idProduto codigo do produto
	 *	@param string $nome Nome do cliente
	 *  @param string $cpf CPF do cliente, somente os n?meros
	 *  @param string $dataNascimento data de nascimento no formado dd/mm/YYYY
	 *  @param array $contato array de pares com as chaves 'DDD', 'Telefone' e 'Email'
	 *  @param array $endereco array de pares com as chaves 'Logradouro', 'Numero', 'Complemento', 'Bairro', 'Cidade', 'UF' e 'CEP'
	 *  @param array $documentoIdentidade array de pares com as chaves 'TipoDocumento', 'Numero' e 'Emissor'
	 *  @param array $tituloEleitor array de pares com as chaves 'Municipio', 'Numero', 'Secao' e 'Zona'
	 */
	public function solicitarCertificadoPF($idProduto, $precoProduto, $nome, $cpf, $dataNascimento, $contato, $endereco, $documentoIdentidade, $tituloEleitor, $cpfContador){
		$contato = array_change_key_case($contato, CASE_LOWER);
		$endereco = array_change_key_case($endereco, CASE_LOWER);
		$documentoIdentidade = array_change_key_case($documentoIdentidade, CASE_LOWER);
		$tituloEleitor = array_change_key_case($tituloEleitor, CASE_LOWER);

		//Documento de identidade
		if(!empty($documentoIdentidade['numero']) && !empty($documentoIdentidade['emissor'])){
			$documento = array(
				'TipoDocumento' => isset($documentoIdentidade['tipodocumento']) ? $documentoIdentidade['tipodocumento'] : null,
				'Numero' 		=> isset($documentoIdentidade['numero']) ? $documentoIdentidade['numero'] : null,
				'Emissor' 		=> isset($documentoIdentidade['emissor']) ? $documentoIdentidade['emissor'] : null,
			);
		}else{
			$documento = array();
		}

		//T?tulo de eleitor
		if(!empty($tituloEleitor['municipio']) && !empty($tituloEleitor['numero']) && !empty($tituloEleitor['secao']) && !empty($tituloEleitor['zona'])){
			$titulo = array(
				'Municipio' => isset($tituloEleitor['municipio']) ? $tituloEleitor['municipio'] : null,
				'Numero' 	=> isset($tituloEleitor['numero']) ? $tituloEleitor['numero'] : null,
				'Secao' 	=> isset($tituloEleitor['secao']) ? $tituloEleitor['secao'] : null,
				'Zona' 		=> isset($tituloEleitor['zona']) ? $tituloEleitor['zona'] : null,
			);
		}else{
			$titulo = array();
		}

		$request = array(
			'idProduto'			=> $idProduto,
			'idParceiro'		=> $this->idParceiro,

			'Nome' 				=> $nome,
			'CPF' 				=> $cpf,
			'DataNascimento' 	=> $dataNascimento,
			'CPFContador'       => $cpfContador,

			//Contato
			'Contato' => array(
				'DDD' 			=> isset($contato['ddd']) ? $contato['ddd'] : null,
				'Telefone' 		=> isset($contato['telefone']) ? $contato['telefone'] : null,
				'Email' 		=> isset($contato['email']) ? $contato['email'] : null,
			),

			//Endere?o
			'Endereco' => array(
				'Logradouro' 	=> isset($endereco['logradouro']) ? $endereco['logradouro'] : null,
				'Numero' 		=> isset($endereco['numero']) ? $endereco['numero'] : null,
				'Complemento' 	=> isset($endereco['complemento']) ? $endereco['complemento'] : null,
				'Bairro' 		=> isset($endereco['bairro']) ? $endereco['bairro'] : null,
				'Cidade' 		=> isset($endereco['cidade']) ? $endereco['cidade'] : null,
				'UF' 			=> isset($endereco['uf']) ? $endereco['uf'] : null,
				'CEP' 			=> isset($endereco['cep']) ? $endereco['cep'] : null,
			),

			'DocumentoIdentidade' 	=> $documento,
			'TituloEleitor' 		=> $titulo,
			'Valor' 				=> $precoProduto
		);

		//var_dump('aqui',$request);

		//montagem do xml
		$xml = $this->montarXml('SolicitacaoCPF', $request);

		//montagem do array de requisi??o
		$request = array();
		$request['parametro'] = $xml;

		return $this->call($request, 'Solicitar');
	}

	/**
	 *	Solicita um certificado para Pessoa Jur?dica(PJ)
	 *	@param int $idProduto codigo do produto
	 *	@param string $razaoSocial Raz?o Social da empresa
	 *  @param string $cnpj CNPJ da empresa, somente os n?meros
	 *  @param array $contato array de pares com as chaves 'DDD', 'Telefone' e 'Email'
	 *  @param array $endereco array de pares com as chaves 'Logradouro', 'Numero', 'Complemento', 'Bairro', 'Cidade', 'UF' e 'CEP'
	 *  @param array $titularDados array de pares com as chaves 'Nome', 'CPF' e 'DataNascimento'
	 *  @param array $titularContato array de pares com as chaves 'DDD', 'Telefone' e 'Email'
	 *  @param array $titularEndereco array de pares com as chaves 'Logradouro', 'Numero', 'Complemento', 'Bairro', 'Cidade', 'UF' e 'CEP'
	 *  @param array $titularDocumentoIdentidade array de pares com as chaves 'TipoDocumento', 'Numero' e 'Emissor'
	 *  @param array $titularTituloEleitor array de pares com as chaves 'Municipio', 'Numero', 'Secao' e 'Zona'
	 */
	public function solicitarCertificadoPJ($idProduto, $precoProduto,$razaoSocial, $cnpj, $contato, $endereco, $titularDados, $titularContato, $titularEndereco, $titularDocumentoIdentidade, $titularTituloEleitor, $cpfContador){
		$contato = array_change_key_case($contato, CASE_LOWER);
		$endereco = array_change_key_case($endereco, CASE_LOWER);
		$titularDados = array_change_key_case($titularDados, CASE_LOWER);
		$titularContato = array_change_key_case($titularContato, CASE_LOWER);
		$titularEndereco = array_change_key_case($titularEndereco, CASE_LOWER);
		$titularDocumentoIdentidade = array_change_key_case($titularDocumentoIdentidade, CASE_LOWER);
		$titularTituloEleitor = array_change_key_case($titularTituloEleitor, CASE_LOWER);

		//Documento de identidade
		if(!empty($titularDocumentoIdentidade['numero']) && !empty($titularDocumentoIdentidade['emissor'])){
			$documento = array(
				'TipoDocumento' => isset($titularDocumentoIdentidade['tipoDocumento']) ? $titularDocumentoIdentidade['tipoDocumento'] : null,
				'Numero' 		=> isset($titularDocumentoIdentidade['numero']) ? $titularDocumentoIdentidade['numero'] : null,
				'Emissor' 		=> isset($titularDocumentoIdentidade['emissor']) ? $titularDocumentoIdentidade['emissor'] : null,
			);
		}else{
			$documento = array();
		}

		//T?tulo de eleitor
		if(!empty($titularTituloEleitor['municipio']) && !empty($titularTituloEleitor['numero']) && !empty($titularTituloEleitor['secao']) && !empty($titularTituloEleitor['zona'])){
			$titulo = array(
				'Municipio' => isset($titularTituloEleitor['municipio']) ? $titularTituloEleitor['municipio'] : null,
				'Numero' 	=> isset($titularTituloEleitor['numero']) ? $titularTituloEleitor['numero'] : null,
				'Secao' 	=> isset($titularTituloEleitor['secao']) ? $titularTituloEleitor['secao'] : null,
				'Zona' 		=> isset($titularTituloEleitor['zona']) ? $titularTituloEleitor['zona'] : null,
			);
		}else{
			$titulo = array();
		}


		$request = array(
			'idProduto'			=> $idProduto,
			'idParceiro'		=> $this->idParceiro,

			'RazaoSocial' 		=> $razaoSocial,
			'CNPJ' 				=> $cnpj,

			'Contato' 	=> array(
				'DDD' 			=> isset($contato['ddd']) ? $contato['ddd'] : null,
				'Telefone' 		=> isset($contato['telefone']) ? $contato['telefone'] : null,
				'Email' 		=> isset($contato['email']) ? $contato['email'] : null,
			),

			'Endereco' 	=> array(
				'Logradouro' 	=> isset($endereco['logradouro']) ? $endereco['logradouro'] : null,
				'Numero' 		=> isset($endereco['numero']) ? $endereco['numero'] : null,
				'Complemento' 	=> isset($endereco['complemento']) ? $endereco['complemento'] : null,
				'Bairro' 		=> isset($endereco['bairro']) ? $endereco['bairro'] : null,
				'Cidade' 		=> isset($endereco['cidade']) ? $endereco['cidade'] : null,
				'UF' 			=> isset($endereco['uf']) ? $endereco['uf'] : null,
				'CEP' 			=> isset($endereco['cep']) ? $endereco['cep'] : null,
			),
            'Valor' 				=>  $precoProduto,
            'CPFContador' 				=>  $cpfContador,
			'Titular' => array(
				'Nome' 				=> $titularDados['nome'],
				'CPF' 				=> $titularDados['cpf'],
				'DataNascimento' 	=> $titularDados['datanascimento'],

				//Contato
				'Contato' => array(
					'DDD' 			=> isset($titularContato['ddd']) ? $titularContato['ddd'] : null,
					'Telefone' 		=> isset($titularContato['telefone']) ? $titularContato['telefone'] : null,
					'Email' 		=> isset($titularContato['email']) ? $titularContato['email'] : null,
				),

				//Endere?o
				'Endereco' => array(
					'Logradouro' 	=> isset($titularEndereco['logradouro']) ? $titularEndereco['logradouro'] : null,
					'Numero' 		=> isset($titularEndereco['numero']) ? $titularEndereco['numero'] : null,
					'Complemento' 	=> isset($titularEndereco['complemento']) ? $titularEndereco['complemento'] : null,
					'Bairro' 		=> isset($titularEndereco['bairro']) ? $titularEndereco['bairro'] : null,
					'Cidade' 		=> isset($titularEndereco['cidade']) ? $titularEndereco['cidade'] : null,
					'UF' 			=> isset($titularEndereco['uf']) ? $titularEndereco['uf'] : null,
					'CEP' 			=> isset($titularEndereco['cep']) ? $titularEndereco['cep'] : null,
				),

				'DocumentoIdentidade' 	=> $documento,
				'TituloEleitor' 		=> $titulo,
			)
		);


		//montagem do xml
		$xml = $this->montarXml('SolicitacaoCNPJ', $request);
        //var_dump('aqui',$xml);
		//montagem do array de requisi??o
		$request = array();
		$request['parametro'] = $xml;

		return $this->call($request, 'Solicitar');
	}
}



//Exemplos de uso
// $cert = new WSCertificado();

//conculta previa por cpf
//$cpf = $cert->consultarCPF('83415262049', '08/04/1986');



//consulta previa por cnpj
// $cnpj = $cert->consultarCNPJ('83415262049', '08041986', '01579286000174');



//solicitar protocolo para pf
/*
 $solicitacao = $cert->solicitarCertificadoPF(
     4882,
 	'LUIZ CARLOS ZANCANELLA JUNIOR',
 	'83415262049',
 	'08/04/1986',
 	//contato
 	array(
 		'DDD' => 51,
 		'Telefone' => 99990000,
 		'Email' => 'luiz@gmail.com'
 	),
 	//endereco
 	array(
 		'Logradouro' => 'Rua Santo Dumont',
 		'Numero' => '100',
 		'Complemento' => 'apto 100',
 		'Bairro' => 'Santos Dumont',
 		'Cidade' => 'São Leopoldo',
 		'UF' => 'RS',
 		'CEP' => '93115270',
        'Codigo_Municipio'=>'5208707'
 	),
 	//documento
 	array(),
 	array()
 );

var_dump($solicitacao);


//solicitar protocolo para pj
/* $solicitacao = $cert->solicitarCertificadoPJ(
     4868,
 	'SAFEWEB SEGURANCA DA INFORMACAO',
 	'01579286000174',
 	//contato empresa
 	array(
 		'DDD' => 51,
 		'Telefone' => 30180020,
 		'Email' => 'marcio.haup@gmail.com'
 	),
 	//endere?o empresa
 	array(
 		'Logradouro' => 'Rua Santo Dumont',
 		'Numero' => '100',
 		'Complemento' => 'apto 100',
 		'Bairro' => 'Santos Dumont',
 		'Cidade' => 'Sao Leopoldo',
 		'UF' => 'RS',
 		'CEP' => '93115270',
 	),

 	//titular dados
 	array(
 		'Nome' 			=> 'LUIZ CARLOS ZANCANELLA JUNIOR',
 		'Cpf' 			=> '83415262049',
 		'DataNascimento' => '08041986',
 	),
 	//titular contato
 	array(
 		'DDD' => 51,
 		'Telefone' => 30180300,
 		'Email' => 'luiz@gmail.com'
 	),
 	//titular endere?o
 	array(
 		'Logradouro' => 'Rua Santo Dumont',
 		'Numero' => '100',
 		'Complemento' => 'apto 100',
 		'Bairro' => 'Santos Dumont',
 		'Cidade' => 'S?o Leopoldo',
 		'UF' => 'RS',
 		'CEP' => '93115270',
 	),
	array(),
 	array()
 );
*/


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