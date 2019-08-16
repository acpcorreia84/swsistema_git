<?php

/**
 * Base class that represents a row from the 'contador' table.
 *
 * 
 *
 * @package    pacoteContador.om
 */
abstract class BaseContador extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ContadorPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the local_id field.
	 * @var        int
	 */
	protected $local_id;

	/**
	 * The value for the comissao field.
	 * @var        int
	 */
	protected $comissao;

	/**
	 * The value for the desconto field.
	 * @var        int
	 */
	protected $desconto;

	/**
	 * The value for the banco field.
	 * @var        string
	 */
	protected $banco;

	/**
	 * The value for the conta_corrente field.
	 * @var        string
	 */
	protected $conta_corrente;

	/**
	 * The value for the digitoconta field.
	 * @var        string
	 */
	protected $digitoconta;

	/**
	 * The value for the agencia field.
	 * @var        string
	 */
	protected $agencia;

	/**
	 * The value for the digitoagencia field.
	 * @var        string
	 */
	protected $digitoagencia;

	/**
	 * The value for the operacao field.
	 * @var        string
	 */
	protected $operacao;

	/**
	 * The value for the cpf_cnpj_conta field.
	 * @var        string
	 */
	protected $cpf_cnpj_conta;

	/**
	 * The value for the responsavel_id field.
	 * @var        int
	 */
	protected $responsavel_id;

	/**
	 * The value for the usuario_id field.
	 * @var        int
	 */
	protected $usuario_id;

	/**
	 * The value for the data_cadastro field.
	 * @var        string
	 */
	protected $data_cadastro;

	/**
	 * The value for the nome field.
	 * @var        string
	 */
	protected $nome;

	/**
	 * The value for the nascimento field.
	 * @var        string
	 */
	protected $nascimento;

	/**
	 * The value for the cpf field.
	 * @var        string
	 */
	protected $cpf;

	/**
	 * The value for the celular field.
	 * @var        string
	 */
	protected $celular;

	/**
	 * The value for the email field.
	 * @var        string
	 */
	protected $email;

	/**
	 * The value for the razao_social field.
	 * @var        string
	 */
	protected $razao_social;

	/**
	 * The value for the cnpj field.
	 * @var        string
	 */
	protected $cnpj;

	/**
	 * The value for the nome_fantasia field.
	 * @var        string
	 */
	protected $nome_fantasia;

	/**
	 * The value for the endereco field.
	 * @var        string
	 */
	protected $endereco;

	/**
	 * The value for the numero field.
	 * @var        string
	 */
	protected $numero;

	/**
	 * The value for the bairro field.
	 * @var        string
	 */
	protected $bairro;

	/**
	 * The value for the complemento field.
	 * @var        string
	 */
	protected $complemento;

	/**
	 * The value for the cidade field.
	 * @var        string
	 */
	protected $cidade;

	/**
	 * The value for the email_empresa field.
	 * @var        string
	 */
	protected $email_empresa;

	/**
	 * The value for the uf field.
	 * @var        string
	 */
	protected $uf;

	/**
	 * The value for the cep field.
	 * @var        string
	 */
	protected $cep;

	/**
	 * The value for the fone1 field.
	 * @var        string
	 */
	protected $fone1;

	/**
	 * The value for the fone2 field.
	 * @var        string
	 */
	protected $fone2;

	/**
	 * The value for the pessoa_tipo field.
	 * @var        string
	 */
	protected $pessoa_tipo;

	/**
	 * The value for the crc field.
	 * @var        string
	 */
	protected $crc;

	/**
	 * The value for the cod_contador field.
	 * @var        string
	 */
	protected $cod_contador;

	/**
	 * The value for the situacao field.
	 * @var        int
	 */
	protected $situacao;

	/**
	 * The value for the url field.
	 * @var        string
	 */
	protected $url;

	/**
	 * The value for the logo field.
	 * @var        string
	 */
	protected $logo;

	/**
	 * The value for the localidade field.
	 * @var        string
	 */
	protected $localidade;

	/**
	 * The value for the contato1_nome field.
	 * @var        string
	 */
	protected $contato1_nome;

	/**
	 * The value for the contato1_cargo field.
	 * @var        string
	 */
	protected $contato1_cargo;

	/**
	 * The value for the contato1_fone field.
	 * @var        string
	 */
	protected $contato1_fone;

	/**
	 * The value for the contato2_nome field.
	 * @var        string
	 */
	protected $contato2_nome;

	/**
	 * The value for the contato2_cargo field.
	 * @var        string
	 */
	protected $contato2_cargo;

	/**
	 * The value for the contato2_fone field.
	 * @var        string
	 */
	protected $contato2_fone;

	/**
	 * The value for the tipo_contador field.
	 * @var        string
	 */
	protected $tipo_contador;

	/**
	 * The value for the possui_cartao field.
	 * @var        int
	 */
	protected $possui_cartao;

	/**
	 * The value for the sync_safe field.
	 * @var        int
	 */
	protected $sync_safe;

	/**
	 * @var        Usuario
	 */
	protected $aUsuario;

	/**
	 * @var        Local
	 */
	protected $aLocal;

	/**
	 * @var        Responsavel
	 */
	protected $aResponsavel;

	/**
	 * @var        array Certificado[] Collection to store aggregation of Certificado objects.
	 */
	protected $collCertificados;

	/**
	 * @var        Criteria The criteria used to select the current contents of collCertificados.
	 */
	private $lastCertificadoCriteria = null;

	/**
	 * @var        array Cliente[] Collection to store aggregation of Cliente objects.
	 */
	protected $collClientes;

	/**
	 * @var        Criteria The criteria used to select the current contents of collClientes.
	 */
	private $lastClienteCriteria = null;

	/**
	 * @var        array ContadorComissionamento[] Collection to store aggregation of ContadorComissionamento objects.
	 */
	protected $collContadorComissionamentos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collContadorComissionamentos.
	 */
	private $lastContadorComissionamentoCriteria = null;

	/**
	 * @var        array ContadorContato[] Collection to store aggregation of ContadorContato objects.
	 */
	protected $collContadorContatos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collContadorContatos.
	 */
	private $lastContadorContatoCriteria = null;

	/**
	 * @var        array ContadorDetalhar[] Collection to store aggregation of ContadorDetalhar objects.
	 */
	protected $collContadorDetalhars;

	/**
	 * @var        Criteria The criteria used to select the current contents of collContadorDetalhars.
	 */
	private $lastContadorDetalharCriteria = null;

	/**
	 * @var        array Prospect[] Collection to store aggregation of Prospect objects.
	 */
	protected $collProspects;

	/**
	 * @var        Criteria The criteria used to select the current contents of collProspects.
	 */
	private $lastProspectCriteria = null;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [local_id] column value.
	 * 
	 * @return     int
	 */
	public function getLocalId()
	{
		return $this->local_id;
	}

	/**
	 * Get the [comissao] column value.
	 * 
	 * @return     int
	 */
	public function getComissao()
	{
		return $this->comissao;
	}

	/**
	 * Get the [desconto] column value.
	 * 
	 * @return     int
	 */
	public function getDesconto()
	{
		return $this->desconto;
	}

	/**
	 * Get the [banco] column value.
	 * 
	 * @return     string
	 */
	public function getBanco()
	{
		return $this->banco;
	}

	/**
	 * Get the [conta_corrente] column value.
	 * 
	 * @return     string
	 */
	public function getContaCorrente()
	{
		return $this->conta_corrente;
	}

	/**
	 * Get the [digitoconta] column value.
	 * 
	 * @return     string
	 */
	public function getDigitoconta()
	{
		return $this->digitoconta;
	}

	/**
	 * Get the [agencia] column value.
	 * 
	 * @return     string
	 */
	public function getAgencia()
	{
		return $this->agencia;
	}

	/**
	 * Get the [digitoagencia] column value.
	 * 
	 * @return     string
	 */
	public function getDigitoagencia()
	{
		return $this->digitoagencia;
	}

	/**
	 * Get the [operacao] column value.
	 * 
	 * @return     string
	 */
	public function getOperacao()
	{
		return $this->operacao;
	}

	/**
	 * Get the [cpf_cnpj_conta] column value.
	 * 
	 * @return     string
	 */
	public function getCpfCnpjConta()
	{
		return $this->cpf_cnpj_conta;
	}

	/**
	 * Get the [responsavel_id] column value.
	 * 
	 * @return     int
	 */
	public function getResponsavelId()
	{
		return $this->responsavel_id;
	}

	/**
	 * Get the [usuario_id] column value.
	 * 
	 * @return     int
	 */
	public function getUsuarioId()
	{
		return $this->usuario_id;
	}

	/**
	 * Get the [optionally formatted] temporal [data_cadastro] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataCadastro($format = 'Y-m-d H:i:s')
	{
		if ($this->data_cadastro === null) {
			return null;
		}


		if ($this->data_cadastro === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_cadastro);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_cadastro, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [nome] column value.
	 * 
	 * @return     string
	 */
	public function getNome()
	{
		return $this->nome;
	}

	/**
	 * Get the [optionally formatted] temporal [nascimento] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getNascimento($format = '%x')
	{
		if ($this->nascimento === null) {
			return null;
		}


		if ($this->nascimento === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->nascimento);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->nascimento, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [cpf] column value.
	 * 
	 * @return     string
	 */
	public function getCpf()
	{
		return $this->cpf;
	}

	/**
	 * Get the [celular] column value.
	 * 
	 * @return     string
	 */
	public function getCelular()
	{
		return $this->celular;
	}

	/**
	 * Get the [email] column value.
	 * 
	 * @return     string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Get the [razao_social] column value.
	 * 
	 * @return     string
	 */
	public function getRazaoSocial()
	{
		return $this->razao_social;
	}

	/**
	 * Get the [cnpj] column value.
	 * 
	 * @return     string
	 */
	public function getCnpj()
	{
		return $this->cnpj;
	}

	/**
	 * Get the [nome_fantasia] column value.
	 * 
	 * @return     string
	 */
	public function getNomeFantasia()
	{
		return $this->nome_fantasia;
	}

	/**
	 * Get the [endereco] column value.
	 * 
	 * @return     string
	 */
	public function getEndereco()
	{
		return $this->endereco;
	}

	/**
	 * Get the [numero] column value.
	 * 
	 * @return     string
	 */
	public function getNumero()
	{
		return $this->numero;
	}

	/**
	 * Get the [bairro] column value.
	 * 
	 * @return     string
	 */
	public function getBairro()
	{
		return $this->bairro;
	}

	/**
	 * Get the [complemento] column value.
	 * 
	 * @return     string
	 */
	public function getComplemento()
	{
		return $this->complemento;
	}

	/**
	 * Get the [cidade] column value.
	 * 
	 * @return     string
	 */
	public function getCidade()
	{
		return $this->cidade;
	}

	/**
	 * Get the [email_empresa] column value.
	 * 
	 * @return     string
	 */
	public function getEmailEmpresa()
	{
		return $this->email_empresa;
	}

	/**
	 * Get the [uf] column value.
	 * 
	 * @return     string
	 */
	public function getUf()
	{
		return $this->uf;
	}

	/**
	 * Get the [cep] column value.
	 * 
	 * @return     string
	 */
	public function getCep()
	{
		return $this->cep;
	}

	/**
	 * Get the [fone1] column value.
	 * 
	 * @return     string
	 */
	public function getFone1()
	{
		return $this->fone1;
	}

	/**
	 * Get the [fone2] column value.
	 * 
	 * @return     string
	 */
	public function getFone2()
	{
		return $this->fone2;
	}

	/**
	 * Get the [pessoa_tipo] column value.
	 * 
	 * @return     string
	 */
	public function getPessoaTipo()
	{
		return $this->pessoa_tipo;
	}

	/**
	 * Get the [crc] column value.
	 * 
	 * @return     string
	 */
	public function getCrc()
	{
		return $this->crc;
	}

	/**
	 * Get the [cod_contador] column value.
	 * 
	 * @return     string
	 */
	public function getCodContador()
	{
		return $this->cod_contador;
	}

	/**
	 * Get the [situacao] column value.
	 * 
	 * @return     int
	 */
	public function getSituacao()
	{
		return $this->situacao;
	}

	/**
	 * Get the [url] column value.
	 * 
	 * @return     string
	 */
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * Get the [logo] column value.
	 * 
	 * @return     string
	 */
	public function getLogo()
	{
		return $this->logo;
	}

	/**
	 * Get the [localidade] column value.
	 * 
	 * @return     string
	 */
	public function getLocalidade()
	{
		return $this->localidade;
	}

	/**
	 * Get the [contato1_nome] column value.
	 * 
	 * @return     string
	 */
	public function getContato1Nome()
	{
		return $this->contato1_nome;
	}

	/**
	 * Get the [contato1_cargo] column value.
	 * 
	 * @return     string
	 */
	public function getContato1Cargo()
	{
		return $this->contato1_cargo;
	}

	/**
	 * Get the [contato1_fone] column value.
	 * 
	 * @return     string
	 */
	public function getContato1Fone()
	{
		return $this->contato1_fone;
	}

	/**
	 * Get the [contato2_nome] column value.
	 * 
	 * @return     string
	 */
	public function getContato2Nome()
	{
		return $this->contato2_nome;
	}

	/**
	 * Get the [contato2_cargo] column value.
	 * 
	 * @return     string
	 */
	public function getContato2Cargo()
	{
		return $this->contato2_cargo;
	}

	/**
	 * Get the [contato2_fone] column value.
	 * 
	 * @return     string
	 */
	public function getContato2Fone()
	{
		return $this->contato2_fone;
	}

	/**
	 * Get the [tipo_contador] column value.
	 * 
	 * @return     string
	 */
	public function getTipoContador()
	{
		return $this->tipo_contador;
	}

	/**
	 * Get the [possui_cartao] column value.
	 * 
	 * @return     int
	 */
	public function getPossuiCartao()
	{
		return $this->possui_cartao;
	}

	/**
	 * Get the [sync_safe] column value.
	 * 
	 * @return     int
	 */
	public function getSyncSafe()
	{
		return $this->sync_safe;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ContadorPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [local_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setLocalId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->local_id !== $v) {
			$this->local_id = $v;
			$this->modifiedColumns[] = ContadorPeer::LOCAL_ID;
		}

		if ($this->aLocal !== null && $this->aLocal->getId() !== $v) {
			$this->aLocal = null;
		}

		return $this;
	} // setLocalId()

	/**
	 * Set the value of [comissao] column.
	 * 
	 * @param      int $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setComissao($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->comissao !== $v) {
			$this->comissao = $v;
			$this->modifiedColumns[] = ContadorPeer::COMISSAO;
		}

		return $this;
	} // setComissao()

	/**
	 * Set the value of [desconto] column.
	 * 
	 * @param      int $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setDesconto($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->desconto !== $v) {
			$this->desconto = $v;
			$this->modifiedColumns[] = ContadorPeer::DESCONTO;
		}

		return $this;
	} // setDesconto()

	/**
	 * Set the value of [banco] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setBanco($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->banco !== $v) {
			$this->banco = $v;
			$this->modifiedColumns[] = ContadorPeer::BANCO;
		}

		return $this;
	} // setBanco()

	/**
	 * Set the value of [conta_corrente] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setContaCorrente($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->conta_corrente !== $v) {
			$this->conta_corrente = $v;
			$this->modifiedColumns[] = ContadorPeer::CONTA_CORRENTE;
		}

		return $this;
	} // setContaCorrente()

	/**
	 * Set the value of [digitoconta] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setDigitoconta($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->digitoconta !== $v) {
			$this->digitoconta = $v;
			$this->modifiedColumns[] = ContadorPeer::DIGITOCONTA;
		}

		return $this;
	} // setDigitoconta()

	/**
	 * Set the value of [agencia] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setAgencia($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->agencia !== $v) {
			$this->agencia = $v;
			$this->modifiedColumns[] = ContadorPeer::AGENCIA;
		}

		return $this;
	} // setAgencia()

	/**
	 * Set the value of [digitoagencia] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setDigitoagencia($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->digitoagencia !== $v) {
			$this->digitoagencia = $v;
			$this->modifiedColumns[] = ContadorPeer::DIGITOAGENCIA;
		}

		return $this;
	} // setDigitoagencia()

	/**
	 * Set the value of [operacao] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setOperacao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->operacao !== $v) {
			$this->operacao = $v;
			$this->modifiedColumns[] = ContadorPeer::OPERACAO;
		}

		return $this;
	} // setOperacao()

	/**
	 * Set the value of [cpf_cnpj_conta] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setCpfCnpjConta($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cpf_cnpj_conta !== $v) {
			$this->cpf_cnpj_conta = $v;
			$this->modifiedColumns[] = ContadorPeer::CPF_CNPJ_CONTA;
		}

		return $this;
	} // setCpfCnpjConta()

	/**
	 * Set the value of [responsavel_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setResponsavelId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->responsavel_id !== $v) {
			$this->responsavel_id = $v;
			$this->modifiedColumns[] = ContadorPeer::RESPONSAVEL_ID;
		}

		if ($this->aResponsavel !== null && $this->aResponsavel->getId() !== $v) {
			$this->aResponsavel = null;
		}

		return $this;
	} // setResponsavelId()

	/**
	 * Set the value of [usuario_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setUsuarioId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->usuario_id !== $v) {
			$this->usuario_id = $v;
			$this->modifiedColumns[] = ContadorPeer::USUARIO_ID;
		}

		if ($this->aUsuario !== null && $this->aUsuario->getId() !== $v) {
			$this->aUsuario = null;
		}

		return $this;
	} // setUsuarioId()

	/**
	 * Sets the value of [data_cadastro] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setDataCadastro($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->data_cadastro !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_cadastro !== null && $tmpDt = new DateTime($this->data_cadastro)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_cadastro = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = ContadorPeer::DATA_CADASTRO;
			}
		} // if either are not null

		return $this;
	} // setDataCadastro()

	/**
	 * Set the value of [nome] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setNome($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome !== $v) {
			$this->nome = $v;
			$this->modifiedColumns[] = ContadorPeer::NOME;
		}

		return $this;
	} // setNome()

	/**
	 * Sets the value of [nascimento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setNascimento($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->nascimento !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->nascimento !== null && $tmpDt = new DateTime($this->nascimento)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->nascimento = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = ContadorPeer::NASCIMENTO;
			}
		} // if either are not null

		return $this;
	} // setNascimento()

	/**
	 * Set the value of [cpf] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setCpf($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cpf !== $v) {
			$this->cpf = $v;
			$this->modifiedColumns[] = ContadorPeer::CPF;
		}

		return $this;
	} // setCpf()

	/**
	 * Set the value of [celular] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setCelular($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->celular !== $v) {
			$this->celular = $v;
			$this->modifiedColumns[] = ContadorPeer::CELULAR;
		}

		return $this;
	} // setCelular()

	/**
	 * Set the value of [email] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = ContadorPeer::EMAIL;
		}

		return $this;
	} // setEmail()

	/**
	 * Set the value of [razao_social] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setRazaoSocial($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->razao_social !== $v) {
			$this->razao_social = $v;
			$this->modifiedColumns[] = ContadorPeer::RAZAO_SOCIAL;
		}

		return $this;
	} // setRazaoSocial()

	/**
	 * Set the value of [cnpj] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setCnpj($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cnpj !== $v) {
			$this->cnpj = $v;
			$this->modifiedColumns[] = ContadorPeer::CNPJ;
		}

		return $this;
	} // setCnpj()

	/**
	 * Set the value of [nome_fantasia] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setNomeFantasia($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome_fantasia !== $v) {
			$this->nome_fantasia = $v;
			$this->modifiedColumns[] = ContadorPeer::NOME_FANTASIA;
		}

		return $this;
	} // setNomeFantasia()

	/**
	 * Set the value of [endereco] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setEndereco($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->endereco !== $v) {
			$this->endereco = $v;
			$this->modifiedColumns[] = ContadorPeer::ENDERECO;
		}

		return $this;
	} // setEndereco()

	/**
	 * Set the value of [numero] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setNumero($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->numero !== $v) {
			$this->numero = $v;
			$this->modifiedColumns[] = ContadorPeer::NUMERO;
		}

		return $this;
	} // setNumero()

	/**
	 * Set the value of [bairro] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setBairro($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->bairro !== $v) {
			$this->bairro = $v;
			$this->modifiedColumns[] = ContadorPeer::BAIRRO;
		}

		return $this;
	} // setBairro()

	/**
	 * Set the value of [complemento] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setComplemento($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->complemento !== $v) {
			$this->complemento = $v;
			$this->modifiedColumns[] = ContadorPeer::COMPLEMENTO;
		}

		return $this;
	} // setComplemento()

	/**
	 * Set the value of [cidade] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setCidade($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cidade !== $v) {
			$this->cidade = $v;
			$this->modifiedColumns[] = ContadorPeer::CIDADE;
		}

		return $this;
	} // setCidade()

	/**
	 * Set the value of [email_empresa] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setEmailEmpresa($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email_empresa !== $v) {
			$this->email_empresa = $v;
			$this->modifiedColumns[] = ContadorPeer::EMAIL_EMPRESA;
		}

		return $this;
	} // setEmailEmpresa()

	/**
	 * Set the value of [uf] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setUf($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->uf !== $v) {
			$this->uf = $v;
			$this->modifiedColumns[] = ContadorPeer::UF;
		}

		return $this;
	} // setUf()

	/**
	 * Set the value of [cep] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setCep($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cep !== $v) {
			$this->cep = $v;
			$this->modifiedColumns[] = ContadorPeer::CEP;
		}

		return $this;
	} // setCep()

	/**
	 * Set the value of [fone1] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setFone1($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->fone1 !== $v) {
			$this->fone1 = $v;
			$this->modifiedColumns[] = ContadorPeer::FONE1;
		}

		return $this;
	} // setFone1()

	/**
	 * Set the value of [fone2] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setFone2($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->fone2 !== $v) {
			$this->fone2 = $v;
			$this->modifiedColumns[] = ContadorPeer::FONE2;
		}

		return $this;
	} // setFone2()

	/**
	 * Set the value of [pessoa_tipo] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setPessoaTipo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->pessoa_tipo !== $v) {
			$this->pessoa_tipo = $v;
			$this->modifiedColumns[] = ContadorPeer::PESSOA_TIPO;
		}

		return $this;
	} // setPessoaTipo()

	/**
	 * Set the value of [crc] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setCrc($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->crc !== $v) {
			$this->crc = $v;
			$this->modifiedColumns[] = ContadorPeer::CRC;
		}

		return $this;
	} // setCrc()

	/**
	 * Set the value of [cod_contador] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setCodContador($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cod_contador !== $v) {
			$this->cod_contador = $v;
			$this->modifiedColumns[] = ContadorPeer::COD_CONTADOR;
		}

		return $this;
	} // setCodContador()

	/**
	 * Set the value of [situacao] column.
	 * 
	 * @param      int $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setSituacao($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->situacao !== $v) {
			$this->situacao = $v;
			$this->modifiedColumns[] = ContadorPeer::SITUACAO;
		}

		return $this;
	} // setSituacao()

	/**
	 * Set the value of [url] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setUrl($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->url !== $v) {
			$this->url = $v;
			$this->modifiedColumns[] = ContadorPeer::URL;
		}

		return $this;
	} // setUrl()

	/**
	 * Set the value of [logo] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setLogo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->logo !== $v) {
			$this->logo = $v;
			$this->modifiedColumns[] = ContadorPeer::LOGO;
		}

		return $this;
	} // setLogo()

	/**
	 * Set the value of [localidade] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setLocalidade($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->localidade !== $v) {
			$this->localidade = $v;
			$this->modifiedColumns[] = ContadorPeer::LOCALIDADE;
		}

		return $this;
	} // setLocalidade()

	/**
	 * Set the value of [contato1_nome] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setContato1Nome($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->contato1_nome !== $v) {
			$this->contato1_nome = $v;
			$this->modifiedColumns[] = ContadorPeer::CONTATO1_NOME;
		}

		return $this;
	} // setContato1Nome()

	/**
	 * Set the value of [contato1_cargo] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setContato1Cargo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->contato1_cargo !== $v) {
			$this->contato1_cargo = $v;
			$this->modifiedColumns[] = ContadorPeer::CONTATO1_CARGO;
		}

		return $this;
	} // setContato1Cargo()

	/**
	 * Set the value of [contato1_fone] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setContato1Fone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->contato1_fone !== $v) {
			$this->contato1_fone = $v;
			$this->modifiedColumns[] = ContadorPeer::CONTATO1_FONE;
		}

		return $this;
	} // setContato1Fone()

	/**
	 * Set the value of [contato2_nome] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setContato2Nome($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->contato2_nome !== $v) {
			$this->contato2_nome = $v;
			$this->modifiedColumns[] = ContadorPeer::CONTATO2_NOME;
		}

		return $this;
	} // setContato2Nome()

	/**
	 * Set the value of [contato2_cargo] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setContato2Cargo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->contato2_cargo !== $v) {
			$this->contato2_cargo = $v;
			$this->modifiedColumns[] = ContadorPeer::CONTATO2_CARGO;
		}

		return $this;
	} // setContato2Cargo()

	/**
	 * Set the value of [contato2_fone] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setContato2Fone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->contato2_fone !== $v) {
			$this->contato2_fone = $v;
			$this->modifiedColumns[] = ContadorPeer::CONTATO2_FONE;
		}

		return $this;
	} // setContato2Fone()

	/**
	 * Set the value of [tipo_contador] column.
	 * 
	 * @param      string $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setTipoContador($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->tipo_contador !== $v) {
			$this->tipo_contador = $v;
			$this->modifiedColumns[] = ContadorPeer::TIPO_CONTADOR;
		}

		return $this;
	} // setTipoContador()

	/**
	 * Set the value of [possui_cartao] column.
	 * 
	 * @param      int $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setPossuiCartao($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->possui_cartao !== $v) {
			$this->possui_cartao = $v;
			$this->modifiedColumns[] = ContadorPeer::POSSUI_CARTAO;
		}

		return $this;
	} // setPossuiCartao()

	/**
	 * Set the value of [sync_safe] column.
	 * 
	 * @param      int $v new value
	 * @return     Contador The current object (for fluent API support)
	 */
	public function setSyncSafe($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->sync_safe !== $v) {
			$this->sync_safe = $v;
			$this->modifiedColumns[] = ContadorPeer::SYNC_SAFE;
		}

		return $this;
	} // setSyncSafe()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->local_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->comissao = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->desconto = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->banco = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->conta_corrente = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->digitoconta = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->agencia = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->digitoagencia = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->operacao = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->cpf_cnpj_conta = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->responsavel_id = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
			$this->usuario_id = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
			$this->data_cadastro = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->nome = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->nascimento = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
			$this->cpf = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
			$this->celular = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
			$this->email = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
			$this->razao_social = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
			$this->cnpj = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
			$this->nome_fantasia = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
			$this->endereco = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
			$this->numero = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
			$this->bairro = ($row[$startcol + 24] !== null) ? (string) $row[$startcol + 24] : null;
			$this->complemento = ($row[$startcol + 25] !== null) ? (string) $row[$startcol + 25] : null;
			$this->cidade = ($row[$startcol + 26] !== null) ? (string) $row[$startcol + 26] : null;
			$this->email_empresa = ($row[$startcol + 27] !== null) ? (string) $row[$startcol + 27] : null;
			$this->uf = ($row[$startcol + 28] !== null) ? (string) $row[$startcol + 28] : null;
			$this->cep = ($row[$startcol + 29] !== null) ? (string) $row[$startcol + 29] : null;
			$this->fone1 = ($row[$startcol + 30] !== null) ? (string) $row[$startcol + 30] : null;
			$this->fone2 = ($row[$startcol + 31] !== null) ? (string) $row[$startcol + 31] : null;
			$this->pessoa_tipo = ($row[$startcol + 32] !== null) ? (string) $row[$startcol + 32] : null;
			$this->crc = ($row[$startcol + 33] !== null) ? (string) $row[$startcol + 33] : null;
			$this->cod_contador = ($row[$startcol + 34] !== null) ? (string) $row[$startcol + 34] : null;
			$this->situacao = ($row[$startcol + 35] !== null) ? (int) $row[$startcol + 35] : null;
			$this->url = ($row[$startcol + 36] !== null) ? (string) $row[$startcol + 36] : null;
			$this->logo = ($row[$startcol + 37] !== null) ? (string) $row[$startcol + 37] : null;
			$this->localidade = ($row[$startcol + 38] !== null) ? (string) $row[$startcol + 38] : null;
			$this->contato1_nome = ($row[$startcol + 39] !== null) ? (string) $row[$startcol + 39] : null;
			$this->contato1_cargo = ($row[$startcol + 40] !== null) ? (string) $row[$startcol + 40] : null;
			$this->contato1_fone = ($row[$startcol + 41] !== null) ? (string) $row[$startcol + 41] : null;
			$this->contato2_nome = ($row[$startcol + 42] !== null) ? (string) $row[$startcol + 42] : null;
			$this->contato2_cargo = ($row[$startcol + 43] !== null) ? (string) $row[$startcol + 43] : null;
			$this->contato2_fone = ($row[$startcol + 44] !== null) ? (string) $row[$startcol + 44] : null;
			$this->tipo_contador = ($row[$startcol + 45] !== null) ? (string) $row[$startcol + 45] : null;
			$this->possui_cartao = ($row[$startcol + 46] !== null) ? (int) $row[$startcol + 46] : null;
			$this->sync_safe = ($row[$startcol + 47] !== null) ? (int) $row[$startcol + 47] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 48; // 48 = ContadorPeer::NUM_COLUMNS - ContadorPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Contador object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

		if ($this->aLocal !== null && $this->local_id !== $this->aLocal->getId()) {
			$this->aLocal = null;
		}
		if ($this->aResponsavel !== null && $this->responsavel_id !== $this->aResponsavel->getId()) {
			$this->aResponsavel = null;
		}
		if ($this->aUsuario !== null && $this->usuario_id !== $this->aUsuario->getId()) {
			$this->aUsuario = null;
		}
	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ContadorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ContadorPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aUsuario = null;
			$this->aLocal = null;
			$this->aResponsavel = null;
			$this->collCertificados = null;
			$this->lastCertificadoCriteria = null;

			$this->collClientes = null;
			$this->lastClienteCriteria = null;

			$this->collContadorComissionamentos = null;
			$this->lastContadorComissionamentoCriteria = null;

			$this->collContadorContatos = null;
			$this->lastContadorContatoCriteria = null;

			$this->collContadorDetalhars = null;
			$this->lastContadorDetalharCriteria = null;

			$this->collProspects = null;
			$this->lastProspectCriteria = null;

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ContadorPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				ContadorPeer::doDelete($this, $con);
				$this->postDelete($con);
				$this->setDeleted(true);
				$con->commit();
			} else {
				$con->commit();
			}
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ContadorPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				ContadorPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aUsuario !== null) {
				if ($this->aUsuario->isModified() || $this->aUsuario->isNew()) {
					$affectedRows += $this->aUsuario->save($con);
				}
				$this->setUsuario($this->aUsuario);
			}

			if ($this->aLocal !== null) {
				if ($this->aLocal->isModified() || $this->aLocal->isNew()) {
					$affectedRows += $this->aLocal->save($con);
				}
				$this->setLocal($this->aLocal);
			}

			if ($this->aResponsavel !== null) {
				if ($this->aResponsavel->isModified() || $this->aResponsavel->isNew()) {
					$affectedRows += $this->aResponsavel->save($con);
				}
				$this->setResponsavel($this->aResponsavel);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = ContadorPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ContadorPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += ContadorPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collCertificados !== null) {
				foreach ($this->collCertificados as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collClientes !== null) {
				foreach ($this->collClientes as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collContadorComissionamentos !== null) {
				foreach ($this->collContadorComissionamentos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collContadorContatos !== null) {
				foreach ($this->collContadorContatos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collContadorDetalhars !== null) {
				foreach ($this->collContadorDetalhars as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collProspects !== null) {
				foreach ($this->collProspects as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aUsuario !== null) {
				if (!$this->aUsuario->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUsuario->getValidationFailures());
				}
			}

			if ($this->aLocal !== null) {
				if (!$this->aLocal->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLocal->getValidationFailures());
				}
			}

			if ($this->aResponsavel !== null) {
				if (!$this->aResponsavel->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aResponsavel->getValidationFailures());
				}
			}


			if (($retval = ContadorPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCertificados !== null) {
					foreach ($this->collCertificados as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collClientes !== null) {
					foreach ($this->collClientes as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collContadorComissionamentos !== null) {
					foreach ($this->collContadorComissionamentos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collContadorContatos !== null) {
					foreach ($this->collContadorContatos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collContadorDetalhars !== null) {
					foreach ($this->collContadorDetalhars as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collProspects !== null) {
					foreach ($this->collProspects as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ContadorPeer::DATABASE_NAME);

		if ($this->isColumnModified(ContadorPeer::ID)) $criteria->add(ContadorPeer::ID, $this->id);
		if ($this->isColumnModified(ContadorPeer::LOCAL_ID)) $criteria->add(ContadorPeer::LOCAL_ID, $this->local_id);
		if ($this->isColumnModified(ContadorPeer::COMISSAO)) $criteria->add(ContadorPeer::COMISSAO, $this->comissao);
		if ($this->isColumnModified(ContadorPeer::DESCONTO)) $criteria->add(ContadorPeer::DESCONTO, $this->desconto);
		if ($this->isColumnModified(ContadorPeer::BANCO)) $criteria->add(ContadorPeer::BANCO, $this->banco);
		if ($this->isColumnModified(ContadorPeer::CONTA_CORRENTE)) $criteria->add(ContadorPeer::CONTA_CORRENTE, $this->conta_corrente);
		if ($this->isColumnModified(ContadorPeer::DIGITOCONTA)) $criteria->add(ContadorPeer::DIGITOCONTA, $this->digitoconta);
		if ($this->isColumnModified(ContadorPeer::AGENCIA)) $criteria->add(ContadorPeer::AGENCIA, $this->agencia);
		if ($this->isColumnModified(ContadorPeer::DIGITOAGENCIA)) $criteria->add(ContadorPeer::DIGITOAGENCIA, $this->digitoagencia);
		if ($this->isColumnModified(ContadorPeer::OPERACAO)) $criteria->add(ContadorPeer::OPERACAO, $this->operacao);
		if ($this->isColumnModified(ContadorPeer::CPF_CNPJ_CONTA)) $criteria->add(ContadorPeer::CPF_CNPJ_CONTA, $this->cpf_cnpj_conta);
		if ($this->isColumnModified(ContadorPeer::RESPONSAVEL_ID)) $criteria->add(ContadorPeer::RESPONSAVEL_ID, $this->responsavel_id);
		if ($this->isColumnModified(ContadorPeer::USUARIO_ID)) $criteria->add(ContadorPeer::USUARIO_ID, $this->usuario_id);
		if ($this->isColumnModified(ContadorPeer::DATA_CADASTRO)) $criteria->add(ContadorPeer::DATA_CADASTRO, $this->data_cadastro);
		if ($this->isColumnModified(ContadorPeer::NOME)) $criteria->add(ContadorPeer::NOME, $this->nome);
		if ($this->isColumnModified(ContadorPeer::NASCIMENTO)) $criteria->add(ContadorPeer::NASCIMENTO, $this->nascimento);
		if ($this->isColumnModified(ContadorPeer::CPF)) $criteria->add(ContadorPeer::CPF, $this->cpf);
		if ($this->isColumnModified(ContadorPeer::CELULAR)) $criteria->add(ContadorPeer::CELULAR, $this->celular);
		if ($this->isColumnModified(ContadorPeer::EMAIL)) $criteria->add(ContadorPeer::EMAIL, $this->email);
		if ($this->isColumnModified(ContadorPeer::RAZAO_SOCIAL)) $criteria->add(ContadorPeer::RAZAO_SOCIAL, $this->razao_social);
		if ($this->isColumnModified(ContadorPeer::CNPJ)) $criteria->add(ContadorPeer::CNPJ, $this->cnpj);
		if ($this->isColumnModified(ContadorPeer::NOME_FANTASIA)) $criteria->add(ContadorPeer::NOME_FANTASIA, $this->nome_fantasia);
		if ($this->isColumnModified(ContadorPeer::ENDERECO)) $criteria->add(ContadorPeer::ENDERECO, $this->endereco);
		if ($this->isColumnModified(ContadorPeer::NUMERO)) $criteria->add(ContadorPeer::NUMERO, $this->numero);
		if ($this->isColumnModified(ContadorPeer::BAIRRO)) $criteria->add(ContadorPeer::BAIRRO, $this->bairro);
		if ($this->isColumnModified(ContadorPeer::COMPLEMENTO)) $criteria->add(ContadorPeer::COMPLEMENTO, $this->complemento);
		if ($this->isColumnModified(ContadorPeer::CIDADE)) $criteria->add(ContadorPeer::CIDADE, $this->cidade);
		if ($this->isColumnModified(ContadorPeer::EMAIL_EMPRESA)) $criteria->add(ContadorPeer::EMAIL_EMPRESA, $this->email_empresa);
		if ($this->isColumnModified(ContadorPeer::UF)) $criteria->add(ContadorPeer::UF, $this->uf);
		if ($this->isColumnModified(ContadorPeer::CEP)) $criteria->add(ContadorPeer::CEP, $this->cep);
		if ($this->isColumnModified(ContadorPeer::FONE1)) $criteria->add(ContadorPeer::FONE1, $this->fone1);
		if ($this->isColumnModified(ContadorPeer::FONE2)) $criteria->add(ContadorPeer::FONE2, $this->fone2);
		if ($this->isColumnModified(ContadorPeer::PESSOA_TIPO)) $criteria->add(ContadorPeer::PESSOA_TIPO, $this->pessoa_tipo);
		if ($this->isColumnModified(ContadorPeer::CRC)) $criteria->add(ContadorPeer::CRC, $this->crc);
		if ($this->isColumnModified(ContadorPeer::COD_CONTADOR)) $criteria->add(ContadorPeer::COD_CONTADOR, $this->cod_contador);
		if ($this->isColumnModified(ContadorPeer::SITUACAO)) $criteria->add(ContadorPeer::SITUACAO, $this->situacao);
		if ($this->isColumnModified(ContadorPeer::URL)) $criteria->add(ContadorPeer::URL, $this->url);
		if ($this->isColumnModified(ContadorPeer::LOGO)) $criteria->add(ContadorPeer::LOGO, $this->logo);
		if ($this->isColumnModified(ContadorPeer::LOCALIDADE)) $criteria->add(ContadorPeer::LOCALIDADE, $this->localidade);
		if ($this->isColumnModified(ContadorPeer::CONTATO1_NOME)) $criteria->add(ContadorPeer::CONTATO1_NOME, $this->contato1_nome);
		if ($this->isColumnModified(ContadorPeer::CONTATO1_CARGO)) $criteria->add(ContadorPeer::CONTATO1_CARGO, $this->contato1_cargo);
		if ($this->isColumnModified(ContadorPeer::CONTATO1_FONE)) $criteria->add(ContadorPeer::CONTATO1_FONE, $this->contato1_fone);
		if ($this->isColumnModified(ContadorPeer::CONTATO2_NOME)) $criteria->add(ContadorPeer::CONTATO2_NOME, $this->contato2_nome);
		if ($this->isColumnModified(ContadorPeer::CONTATO2_CARGO)) $criteria->add(ContadorPeer::CONTATO2_CARGO, $this->contato2_cargo);
		if ($this->isColumnModified(ContadorPeer::CONTATO2_FONE)) $criteria->add(ContadorPeer::CONTATO2_FONE, $this->contato2_fone);
		if ($this->isColumnModified(ContadorPeer::TIPO_CONTADOR)) $criteria->add(ContadorPeer::TIPO_CONTADOR, $this->tipo_contador);
		if ($this->isColumnModified(ContadorPeer::POSSUI_CARTAO)) $criteria->add(ContadorPeer::POSSUI_CARTAO, $this->possui_cartao);
		if ($this->isColumnModified(ContadorPeer::SYNC_SAFE)) $criteria->add(ContadorPeer::SYNC_SAFE, $this->sync_safe);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ContadorPeer::DATABASE_NAME);

		$criteria->add(ContadorPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Contador (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setLocalId($this->local_id);

		$copyObj->setComissao($this->comissao);

		$copyObj->setDesconto($this->desconto);

		$copyObj->setBanco($this->banco);

		$copyObj->setContaCorrente($this->conta_corrente);

		$copyObj->setDigitoconta($this->digitoconta);

		$copyObj->setAgencia($this->agencia);

		$copyObj->setDigitoagencia($this->digitoagencia);

		$copyObj->setOperacao($this->operacao);

		$copyObj->setCpfCnpjConta($this->cpf_cnpj_conta);

		$copyObj->setResponsavelId($this->responsavel_id);

		$copyObj->setUsuarioId($this->usuario_id);

		$copyObj->setDataCadastro($this->data_cadastro);

		$copyObj->setNome($this->nome);

		$copyObj->setNascimento($this->nascimento);

		$copyObj->setCpf($this->cpf);

		$copyObj->setCelular($this->celular);

		$copyObj->setEmail($this->email);

		$copyObj->setRazaoSocial($this->razao_social);

		$copyObj->setCnpj($this->cnpj);

		$copyObj->setNomeFantasia($this->nome_fantasia);

		$copyObj->setEndereco($this->endereco);

		$copyObj->setNumero($this->numero);

		$copyObj->setBairro($this->bairro);

		$copyObj->setComplemento($this->complemento);

		$copyObj->setCidade($this->cidade);

		$copyObj->setEmailEmpresa($this->email_empresa);

		$copyObj->setUf($this->uf);

		$copyObj->setCep($this->cep);

		$copyObj->setFone1($this->fone1);

		$copyObj->setFone2($this->fone2);

		$copyObj->setPessoaTipo($this->pessoa_tipo);

		$copyObj->setCrc($this->crc);

		$copyObj->setCodContador($this->cod_contador);

		$copyObj->setSituacao($this->situacao);

		$copyObj->setUrl($this->url);

		$copyObj->setLogo($this->logo);

		$copyObj->setLocalidade($this->localidade);

		$copyObj->setContato1Nome($this->contato1_nome);

		$copyObj->setContato1Cargo($this->contato1_cargo);

		$copyObj->setContato1Fone($this->contato1_fone);

		$copyObj->setContato2Nome($this->contato2_nome);

		$copyObj->setContato2Cargo($this->contato2_cargo);

		$copyObj->setContato2Fone($this->contato2_fone);

		$copyObj->setTipoContador($this->tipo_contador);

		$copyObj->setPossuiCartao($this->possui_cartao);

		$copyObj->setSyncSafe($this->sync_safe);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getCertificados() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCertificado($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getClientes() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCliente($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getContadorComissionamentos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addContadorComissionamento($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getContadorContatos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addContadorContato($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getContadorDetalhars() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addContadorDetalhar($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getProspects() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addProspect($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);

		$copyObj->setId(NULL); // this is a auto-increment column, so set to default value

	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     Contador Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     ContadorPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ContadorPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Usuario object.
	 *
	 * @param      Usuario $v
	 * @return     Contador The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUsuario(Usuario $v = null)
	{
		if ($v === null) {
			$this->setUsuarioId(NULL);
		} else {
			$this->setUsuarioId($v->getId());
		}

		$this->aUsuario = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Usuario object, it will not be re-added.
		if ($v !== null) {
			$v->addContador($this);
		}

		return $this;
	}


	/**
	 * Get the associated Usuario object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Usuario The associated Usuario object.
	 * @throws     PropelException
	 */
	public function getUsuario(PropelPDO $con = null)
	{
		if ($this->aUsuario === null && ($this->usuario_id !== null)) {
			$this->aUsuario = UsuarioPeer::retrieveByPk($this->usuario_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aUsuario->addContadors($this);
			 */
		}
		return $this->aUsuario;
	}

	/**
	 * Declares an association between this object and a Local object.
	 *
	 * @param      Local $v
	 * @return     Contador The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setLocal(Local $v = null)
	{
		if ($v === null) {
			$this->setLocalId(NULL);
		} else {
			$this->setLocalId($v->getId());
		}

		$this->aLocal = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Local object, it will not be re-added.
		if ($v !== null) {
			$v->addContador($this);
		}

		return $this;
	}


	/**
	 * Get the associated Local object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Local The associated Local object.
	 * @throws     PropelException
	 */
	public function getLocal(PropelPDO $con = null)
	{
		if ($this->aLocal === null && ($this->local_id !== null)) {
			$this->aLocal = LocalPeer::retrieveByPk($this->local_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aLocal->addContadors($this);
			 */
		}
		return $this->aLocal;
	}

	/**
	 * Declares an association between this object and a Responsavel object.
	 *
	 * @param      Responsavel $v
	 * @return     Contador The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setResponsavel(Responsavel $v = null)
	{
		if ($v === null) {
			$this->setResponsavelId(NULL);
		} else {
			$this->setResponsavelId($v->getId());
		}

		$this->aResponsavel = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Responsavel object, it will not be re-added.
		if ($v !== null) {
			$v->addContador($this);
		}

		return $this;
	}


	/**
	 * Get the associated Responsavel object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Responsavel The associated Responsavel object.
	 * @throws     PropelException
	 */
	public function getResponsavel(PropelPDO $con = null)
	{
		if ($this->aResponsavel === null && ($this->responsavel_id !== null)) {
			$this->aResponsavel = ResponsavelPeer::retrieveByPk($this->responsavel_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aResponsavel->addContadors($this);
			 */
		}
		return $this->aResponsavel;
	}

	/**
	 * Clears out the collCertificados collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCertificados()
	 */
	public function clearCertificados()
	{
		$this->collCertificados = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCertificados collection (array).
	 *
	 * By default this just sets the collCertificados collection to an empty array (like clearcollCertificados());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCertificados()
	{
		$this->collCertificados = array();
	}

	/**
	 * Gets an array of Certificado objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Contador has previously been saved, it will retrieve
	 * related Certificados from storage. If this Contador is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Certificado[]
	 * @throws     PropelException
	 */
	public function getCertificados($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContadorPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
			   $this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::CONTADOR_ID, $this->id);

				CertificadoPeer::addSelectColumns($criteria);
				$this->collCertificados = CertificadoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(CertificadoPeer::CONTADOR_ID, $this->id);

				CertificadoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
					$this->collCertificados = CertificadoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCertificadoCriteria = $criteria;
		return $this->collCertificados;
	}

	/**
	 * Returns the number of related Certificado objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Certificado objects.
	 * @throws     PropelException
	 */
	public function countCertificados(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContadorPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(CertificadoPeer::CONTADOR_ID, $this->id);

				$count = CertificadoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(CertificadoPeer::CONTADOR_ID, $this->id);

				if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
					$count = CertificadoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collCertificados);
				}
			} else {
				$count = count($this->collCertificados);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a Certificado object to this object
	 * through the Certificado foreign key attribute.
	 *
	 * @param      Certificado $l Certificado
	 * @return     void
	 * @throws     PropelException
	 */
	public function addCertificado(Certificado $l)
	{
		if ($this->collCertificados === null) {
			$this->initCertificados();
		}
		if (!in_array($l, $this->collCertificados, true)) { // only add it if the **same** object is not already associated
			array_push($this->collCertificados, $l);
			$l->setContador($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Contador is new, it will return
	 * an empty collection; or if this Contador has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Contador.
	 */
	public function getCertificadosJoinParceiro($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContadorPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::CONTADOR_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinParceiro($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::CONTADOR_ID, $this->id);

			if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
				$this->collCertificados = CertificadoPeer::doSelectJoinParceiro($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoCriteria = $criteria;

		return $this->collCertificados;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Contador is new, it will return
	 * an empty collection; or if this Contador has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Contador.
	 */
	public function getCertificadosJoinLocal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContadorPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::CONTADOR_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinLocal($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::CONTADOR_ID, $this->id);

			if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
				$this->collCertificados = CertificadoPeer::doSelectJoinLocal($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoCriteria = $criteria;

		return $this->collCertificados;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Contador is new, it will return
	 * an empty collection; or if this Contador has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Contador.
	 */
	public function getCertificadosJoinFormaPagamento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContadorPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::CONTADOR_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinFormaPagamento($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::CONTADOR_ID, $this->id);

			if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
				$this->collCertificados = CertificadoPeer::doSelectJoinFormaPagamento($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoCriteria = $criteria;

		return $this->collCertificados;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Contador is new, it will return
	 * an empty collection; or if this Contador has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Contador.
	 */
	public function getCertificadosJoinProduto($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContadorPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::CONTADOR_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinProduto($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::CONTADOR_ID, $this->id);

			if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
				$this->collCertificados = CertificadoPeer::doSelectJoinProduto($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoCriteria = $criteria;

		return $this->collCertificados;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Contador is new, it will return
	 * an empty collection; or if this Contador has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Contador.
	 */
	public function getCertificadosJoinCliente($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContadorPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::CONTADOR_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinCliente($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::CONTADOR_ID, $this->id);

			if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
				$this->collCertificados = CertificadoPeer::doSelectJoinCliente($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoCriteria = $criteria;

		return $this->collCertificados;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Contador is new, it will return
	 * an empty collection; or if this Contador has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Contador.
	 */
	public function getCertificadosJoinUsuarioRelatedByUsuarioId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContadorPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::CONTADOR_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinUsuarioRelatedByUsuarioId($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::CONTADOR_ID, $this->id);

			if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
				$this->collCertificados = CertificadoPeer::doSelectJoinUsuarioRelatedByUsuarioId($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoCriteria = $criteria;

		return $this->collCertificados;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Contador is new, it will return
	 * an empty collection; or if this Contador has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Contador.
	 */
	public function getCertificadosJoinUsuarioRelatedByUsuarioValidouId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContadorPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::CONTADOR_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinUsuarioRelatedByUsuarioValidouId($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::CONTADOR_ID, $this->id);

			if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
				$this->collCertificados = CertificadoPeer::doSelectJoinUsuarioRelatedByUsuarioValidouId($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoCriteria = $criteria;

		return $this->collCertificados;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Contador is new, it will return
	 * an empty collection; or if this Contador has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Contador.
	 */
	public function getCertificadosJoinCertificadoRelatedByCertificadoRenovado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContadorPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::CONTADOR_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinCertificadoRelatedByCertificadoRenovado($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::CONTADOR_ID, $this->id);

			if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
				$this->collCertificados = CertificadoPeer::doSelectJoinCertificadoRelatedByCertificadoRenovado($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoCriteria = $criteria;

		return $this->collCertificados;
	}

	/**
	 * Clears out the collClientes collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addClientes()
	 */
	public function clearClientes()
	{
		$this->collClientes = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collClientes collection (array).
	 *
	 * By default this just sets the collClientes collection to an empty array (like clearcollClientes());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initClientes()
	{
		$this->collClientes = array();
	}

	/**
	 * Gets an array of Cliente objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Contador has previously been saved, it will retrieve
	 * related Clientes from storage. If this Contador is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Cliente[]
	 * @throws     PropelException
	 */
	public function getClientes($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContadorPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientes === null) {
			if ($this->isNew()) {
			   $this->collClientes = array();
			} else {

				$criteria->add(ClientePeer::CONTADOR_ID, $this->id);

				ClientePeer::addSelectColumns($criteria);
				$this->collClientes = ClientePeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ClientePeer::CONTADOR_ID, $this->id);

				ClientePeer::addSelectColumns($criteria);
				if (!isset($this->lastClienteCriteria) || !$this->lastClienteCriteria->equals($criteria)) {
					$this->collClientes = ClientePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastClienteCriteria = $criteria;
		return $this->collClientes;
	}

	/**
	 * Returns the number of related Cliente objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Cliente objects.
	 * @throws     PropelException
	 */
	public function countClientes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContadorPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collClientes === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ClientePeer::CONTADOR_ID, $this->id);

				$count = ClientePeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ClientePeer::CONTADOR_ID, $this->id);

				if (!isset($this->lastClienteCriteria) || !$this->lastClienteCriteria->equals($criteria)) {
					$count = ClientePeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collClientes);
				}
			} else {
				$count = count($this->collClientes);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a Cliente object to this object
	 * through the Cliente foreign key attribute.
	 *
	 * @param      Cliente $l Cliente
	 * @return     void
	 * @throws     PropelException
	 */
	public function addCliente(Cliente $l)
	{
		if ($this->collClientes === null) {
			$this->initClientes();
		}
		if (!in_array($l, $this->collClientes, true)) { // only add it if the **same** object is not already associated
			array_push($this->collClientes, $l);
			$l->setContador($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Contador is new, it will return
	 * an empty collection; or if this Contador has previously
	 * been saved, it will retrieve related Clientes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Contador.
	 */
	public function getClientesJoinLocal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContadorPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientes === null) {
			if ($this->isNew()) {
				$this->collClientes = array();
			} else {

				$criteria->add(ClientePeer::CONTADOR_ID, $this->id);

				$this->collClientes = ClientePeer::doSelectJoinLocal($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ClientePeer::CONTADOR_ID, $this->id);

			if (!isset($this->lastClienteCriteria) || !$this->lastClienteCriteria->equals($criteria)) {
				$this->collClientes = ClientePeer::doSelectJoinLocal($criteria, $con, $join_behavior);
			}
		}
		$this->lastClienteCriteria = $criteria;

		return $this->collClientes;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Contador is new, it will return
	 * an empty collection; or if this Contador has previously
	 * been saved, it will retrieve related Clientes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Contador.
	 */
	public function getClientesJoinResponsavel($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContadorPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientes === null) {
			if ($this->isNew()) {
				$this->collClientes = array();
			} else {

				$criteria->add(ClientePeer::CONTADOR_ID, $this->id);

				$this->collClientes = ClientePeer::doSelectJoinResponsavel($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ClientePeer::CONTADOR_ID, $this->id);

			if (!isset($this->lastClienteCriteria) || !$this->lastClienteCriteria->equals($criteria)) {
				$this->collClientes = ClientePeer::doSelectJoinResponsavel($criteria, $con, $join_behavior);
			}
		}
		$this->lastClienteCriteria = $criteria;

		return $this->collClientes;
	}

	/**
	 * Clears out the collContadorComissionamentos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addContadorComissionamentos()
	 */
	public function clearContadorComissionamentos()
	{
		$this->collContadorComissionamentos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collContadorComissionamentos collection (array).
	 *
	 * By default this just sets the collContadorComissionamentos collection to an empty array (like clearcollContadorComissionamentos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initContadorComissionamentos()
	{
		$this->collContadorComissionamentos = array();
	}

	/**
	 * Gets an array of ContadorComissionamento objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Contador has previously been saved, it will retrieve
	 * related ContadorComissionamentos from storage. If this Contador is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ContadorComissionamento[]
	 * @throws     PropelException
	 */
	public function getContadorComissionamentos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContadorPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContadorComissionamentos === null) {
			if ($this->isNew()) {
			   $this->collContadorComissionamentos = array();
			} else {

				$criteria->add(ContadorComissionamentoPeer::CONTADOR_ID, $this->id);

				ContadorComissionamentoPeer::addSelectColumns($criteria);
				$this->collContadorComissionamentos = ContadorComissionamentoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ContadorComissionamentoPeer::CONTADOR_ID, $this->id);

				ContadorComissionamentoPeer::addSelectColumns($criteria);
				if (!isset($this->lastContadorComissionamentoCriteria) || !$this->lastContadorComissionamentoCriteria->equals($criteria)) {
					$this->collContadorComissionamentos = ContadorComissionamentoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastContadorComissionamentoCriteria = $criteria;
		return $this->collContadorComissionamentos;
	}

	/**
	 * Returns the number of related ContadorComissionamento objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ContadorComissionamento objects.
	 * @throws     PropelException
	 */
	public function countContadorComissionamentos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContadorPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collContadorComissionamentos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ContadorComissionamentoPeer::CONTADOR_ID, $this->id);

				$count = ContadorComissionamentoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ContadorComissionamentoPeer::CONTADOR_ID, $this->id);

				if (!isset($this->lastContadorComissionamentoCriteria) || !$this->lastContadorComissionamentoCriteria->equals($criteria)) {
					$count = ContadorComissionamentoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collContadorComissionamentos);
				}
			} else {
				$count = count($this->collContadorComissionamentos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a ContadorComissionamento object to this object
	 * through the ContadorComissionamento foreign key attribute.
	 *
	 * @param      ContadorComissionamento $l ContadorComissionamento
	 * @return     void
	 * @throws     PropelException
	 */
	public function addContadorComissionamento(ContadorComissionamento $l)
	{
		if ($this->collContadorComissionamentos === null) {
			$this->initContadorComissionamentos();
		}
		if (!in_array($l, $this->collContadorComissionamentos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collContadorComissionamentos, $l);
			$l->setContador($this);
		}
	}

	/**
	 * Clears out the collContadorContatos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addContadorContatos()
	 */
	public function clearContadorContatos()
	{
		$this->collContadorContatos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collContadorContatos collection (array).
	 *
	 * By default this just sets the collContadorContatos collection to an empty array (like clearcollContadorContatos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initContadorContatos()
	{
		$this->collContadorContatos = array();
	}

	/**
	 * Gets an array of ContadorContato objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Contador has previously been saved, it will retrieve
	 * related ContadorContatos from storage. If this Contador is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ContadorContato[]
	 * @throws     PropelException
	 */
	public function getContadorContatos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContadorPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContadorContatos === null) {
			if ($this->isNew()) {
			   $this->collContadorContatos = array();
			} else {

				$criteria->add(ContadorContatoPeer::CONTADOR_ID, $this->id);

				ContadorContatoPeer::addSelectColumns($criteria);
				$this->collContadorContatos = ContadorContatoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ContadorContatoPeer::CONTADOR_ID, $this->id);

				ContadorContatoPeer::addSelectColumns($criteria);
				if (!isset($this->lastContadorContatoCriteria) || !$this->lastContadorContatoCriteria->equals($criteria)) {
					$this->collContadorContatos = ContadorContatoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastContadorContatoCriteria = $criteria;
		return $this->collContadorContatos;
	}

	/**
	 * Returns the number of related ContadorContato objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ContadorContato objects.
	 * @throws     PropelException
	 */
	public function countContadorContatos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContadorPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collContadorContatos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ContadorContatoPeer::CONTADOR_ID, $this->id);

				$count = ContadorContatoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ContadorContatoPeer::CONTADOR_ID, $this->id);

				if (!isset($this->lastContadorContatoCriteria) || !$this->lastContadorContatoCriteria->equals($criteria)) {
					$count = ContadorContatoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collContadorContatos);
				}
			} else {
				$count = count($this->collContadorContatos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a ContadorContato object to this object
	 * through the ContadorContato foreign key attribute.
	 *
	 * @param      ContadorContato $l ContadorContato
	 * @return     void
	 * @throws     PropelException
	 */
	public function addContadorContato(ContadorContato $l)
	{
		if ($this->collContadorContatos === null) {
			$this->initContadorContatos();
		}
		if (!in_array($l, $this->collContadorContatos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collContadorContatos, $l);
			$l->setContador($this);
		}
	}

	/**
	 * Clears out the collContadorDetalhars collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addContadorDetalhars()
	 */
	public function clearContadorDetalhars()
	{
		$this->collContadorDetalhars = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collContadorDetalhars collection (array).
	 *
	 * By default this just sets the collContadorDetalhars collection to an empty array (like clearcollContadorDetalhars());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initContadorDetalhars()
	{
		$this->collContadorDetalhars = array();
	}

	/**
	 * Gets an array of ContadorDetalhar objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Contador has previously been saved, it will retrieve
	 * related ContadorDetalhars from storage. If this Contador is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ContadorDetalhar[]
	 * @throws     PropelException
	 */
	public function getContadorDetalhars($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContadorPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContadorDetalhars === null) {
			if ($this->isNew()) {
			   $this->collContadorDetalhars = array();
			} else {

				$criteria->add(ContadorDetalharPeer::CONTADOR_ID, $this->id);

				ContadorDetalharPeer::addSelectColumns($criteria);
				$this->collContadorDetalhars = ContadorDetalharPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ContadorDetalharPeer::CONTADOR_ID, $this->id);

				ContadorDetalharPeer::addSelectColumns($criteria);
				if (!isset($this->lastContadorDetalharCriteria) || !$this->lastContadorDetalharCriteria->equals($criteria)) {
					$this->collContadorDetalhars = ContadorDetalharPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastContadorDetalharCriteria = $criteria;
		return $this->collContadorDetalhars;
	}

	/**
	 * Returns the number of related ContadorDetalhar objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ContadorDetalhar objects.
	 * @throws     PropelException
	 */
	public function countContadorDetalhars(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContadorPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collContadorDetalhars === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ContadorDetalharPeer::CONTADOR_ID, $this->id);

				$count = ContadorDetalharPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ContadorDetalharPeer::CONTADOR_ID, $this->id);

				if (!isset($this->lastContadorDetalharCriteria) || !$this->lastContadorDetalharCriteria->equals($criteria)) {
					$count = ContadorDetalharPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collContadorDetalhars);
				}
			} else {
				$count = count($this->collContadorDetalhars);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a ContadorDetalhar object to this object
	 * through the ContadorDetalhar foreign key attribute.
	 *
	 * @param      ContadorDetalhar $l ContadorDetalhar
	 * @return     void
	 * @throws     PropelException
	 */
	public function addContadorDetalhar(ContadorDetalhar $l)
	{
		if ($this->collContadorDetalhars === null) {
			$this->initContadorDetalhars();
		}
		if (!in_array($l, $this->collContadorDetalhars, true)) { // only add it if the **same** object is not already associated
			array_push($this->collContadorDetalhars, $l);
			$l->setContador($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Contador is new, it will return
	 * an empty collection; or if this Contador has previously
	 * been saved, it will retrieve related ContadorDetalhars from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Contador.
	 */
	public function getContadorDetalharsJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContadorPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContadorDetalhars === null) {
			if ($this->isNew()) {
				$this->collContadorDetalhars = array();
			} else {

				$criteria->add(ContadorDetalharPeer::CONTADOR_ID, $this->id);

				$this->collContadorDetalhars = ContadorDetalharPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContadorDetalharPeer::CONTADOR_ID, $this->id);

			if (!isset($this->lastContadorDetalharCriteria) || !$this->lastContadorDetalharCriteria->equals($criteria)) {
				$this->collContadorDetalhars = ContadorDetalharPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		}
		$this->lastContadorDetalharCriteria = $criteria;

		return $this->collContadorDetalhars;
	}

	/**
	 * Clears out the collProspects collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addProspects()
	 */
	public function clearProspects()
	{
		$this->collProspects = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collProspects collection (array).
	 *
	 * By default this just sets the collProspects collection to an empty array (like clearcollProspects());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initProspects()
	{
		$this->collProspects = array();
	}

	/**
	 * Gets an array of Prospect objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Contador has previously been saved, it will retrieve
	 * related Prospects from storage. If this Contador is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Prospect[]
	 * @throws     PropelException
	 */
	public function getProspects($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContadorPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspects === null) {
			if ($this->isNew()) {
			   $this->collProspects = array();
			} else {

				$criteria->add(ProspectPeer::CONTADOR_ID, $this->id);

				ProspectPeer::addSelectColumns($criteria);
				$this->collProspects = ProspectPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ProspectPeer::CONTADOR_ID, $this->id);

				ProspectPeer::addSelectColumns($criteria);
				if (!isset($this->lastProspectCriteria) || !$this->lastProspectCriteria->equals($criteria)) {
					$this->collProspects = ProspectPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProspectCriteria = $criteria;
		return $this->collProspects;
	}

	/**
	 * Returns the number of related Prospect objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Prospect objects.
	 * @throws     PropelException
	 */
	public function countProspects(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContadorPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collProspects === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ProspectPeer::CONTADOR_ID, $this->id);

				$count = ProspectPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ProspectPeer::CONTADOR_ID, $this->id);

				if (!isset($this->lastProspectCriteria) || !$this->lastProspectCriteria->equals($criteria)) {
					$count = ProspectPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collProspects);
				}
			} else {
				$count = count($this->collProspects);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a Prospect object to this object
	 * through the Prospect foreign key attribute.
	 *
	 * @param      Prospect $l Prospect
	 * @return     void
	 * @throws     PropelException
	 */
	public function addProspect(Prospect $l)
	{
		if ($this->collProspects === null) {
			$this->initProspects();
		}
		if (!in_array($l, $this->collProspects, true)) { // only add it if the **same** object is not already associated
			array_push($this->collProspects, $l);
			$l->setContador($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Contador is new, it will return
	 * an empty collection; or if this Contador has previously
	 * been saved, it will retrieve related Prospects from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Contador.
	 */
	public function getProspectsJoinCertificado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContadorPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspects === null) {
			if ($this->isNew()) {
				$this->collProspects = array();
			} else {

				$criteria->add(ProspectPeer::CONTADOR_ID, $this->id);

				$this->collProspects = ProspectPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectPeer::CONTADOR_ID, $this->id);

			if (!isset($this->lastProspectCriteria) || !$this->lastProspectCriteria->equals($criteria)) {
				$this->collProspects = ProspectPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectCriteria = $criteria;

		return $this->collProspects;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Contador is new, it will return
	 * an empty collection; or if this Contador has previously
	 * been saved, it will retrieve related Prospects from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Contador.
	 */
	public function getProspectsJoinUsuarioRelatedByUsuarioId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContadorPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspects === null) {
			if ($this->isNew()) {
				$this->collProspects = array();
			} else {

				$criteria->add(ProspectPeer::CONTADOR_ID, $this->id);

				$this->collProspects = ProspectPeer::doSelectJoinUsuarioRelatedByUsuarioId($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectPeer::CONTADOR_ID, $this->id);

			if (!isset($this->lastProspectCriteria) || !$this->lastProspectCriteria->equals($criteria)) {
				$this->collProspects = ProspectPeer::doSelectJoinUsuarioRelatedByUsuarioId($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectCriteria = $criteria;

		return $this->collProspects;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Contador is new, it will return
	 * an empty collection; or if this Contador has previously
	 * been saved, it will retrieve related Prospects from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Contador.
	 */
	public function getProspectsJoinUsuarioRelatedBySupervisorUsuarioId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContadorPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspects === null) {
			if ($this->isNew()) {
				$this->collProspects = array();
			} else {

				$criteria->add(ProspectPeer::CONTADOR_ID, $this->id);

				$this->collProspects = ProspectPeer::doSelectJoinUsuarioRelatedBySupervisorUsuarioId($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectPeer::CONTADOR_ID, $this->id);

			if (!isset($this->lastProspectCriteria) || !$this->lastProspectCriteria->equals($criteria)) {
				$this->collProspects = ProspectPeer::doSelectJoinUsuarioRelatedBySupervisorUsuarioId($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectCriteria = $criteria;

		return $this->collProspects;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Contador is new, it will return
	 * an empty collection; or if this Contador has previously
	 * been saved, it will retrieve related Prospects from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Contador.
	 */
	public function getProspectsJoinProspectContato($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContadorPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspects === null) {
			if ($this->isNew()) {
				$this->collProspects = array();
			} else {

				$criteria->add(ProspectPeer::CONTADOR_ID, $this->id);

				$this->collProspects = ProspectPeer::doSelectJoinProspectContato($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectPeer::CONTADOR_ID, $this->id);

			if (!isset($this->lastProspectCriteria) || !$this->lastProspectCriteria->equals($criteria)) {
				$this->collProspects = ProspectPeer::doSelectJoinProspectContato($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectCriteria = $criteria;

		return $this->collProspects;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Contador is new, it will return
	 * an empty collection; or if this Contador has previously
	 * been saved, it will retrieve related Prospects from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Contador.
	 */
	public function getProspectsJoinProspectTipo($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContadorPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspects === null) {
			if ($this->isNew()) {
				$this->collProspects = array();
			} else {

				$criteria->add(ProspectPeer::CONTADOR_ID, $this->id);

				$this->collProspects = ProspectPeer::doSelectJoinProspectTipo($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectPeer::CONTADOR_ID, $this->id);

			if (!isset($this->lastProspectCriteria) || !$this->lastProspectCriteria->equals($criteria)) {
				$this->collProspects = ProspectPeer::doSelectJoinProspectTipo($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectCriteria = $criteria;

		return $this->collProspects;
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collCertificados) {
				foreach ((array) $this->collCertificados as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collClientes) {
				foreach ((array) $this->collClientes as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collContadorComissionamentos) {
				foreach ((array) $this->collContadorComissionamentos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collContadorContatos) {
				foreach ((array) $this->collContadorContatos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collContadorDetalhars) {
				foreach ((array) $this->collContadorDetalhars as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collProspects) {
				foreach ((array) $this->collProspects as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collCertificados = null;
		$this->collClientes = null;
		$this->collContadorComissionamentos = null;
		$this->collContadorContatos = null;
		$this->collContadorDetalhars = null;
		$this->collProspects = null;
			$this->aUsuario = null;
			$this->aLocal = null;
			$this->aResponsavel = null;
	}

} // BaseContador
