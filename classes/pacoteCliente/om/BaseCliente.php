<?php

/**
 * Base class that represents a row from the 'cliente' table.
 *
 * 
 *
 * @package    pacoteCliente.om
 */
abstract class BaseCliente extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ClientePeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the responsavel_id field.
	 * @var        int
	 */
	protected $responsavel_id;

	/**
	 * The value for the local_id field.
	 * @var        int
	 */
	protected $local_id;

	/**
	 * The value for the pessoa_tipo field.
	 * @var        string
	 */
	protected $pessoa_tipo;

	/**
	 * The value for the razao_social field.
	 * @var        string
	 */
	protected $razao_social;

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
	 * The value for the email field.
	 * @var        string
	 */
	protected $email;

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
	 * The value for the celular field.
	 * @var        string
	 */
	protected $celular;

	/**
	 * The value for the cpf_cnpj field.
	 * @var        string
	 */
	protected $cpf_cnpj;

	/**
	 * The value for the situacao field.
	 * @var        int
	 */
	protected $situacao;

	/**
	 * The value for the nascimento field.
	 * @var        string
	 */
	protected $nascimento;

	/**
	 * The value for the nome_contato field.
	 * @var        string
	 */
	protected $nome_contato;

	/**
	 * The value for the referencia_contato field.
	 * @var        string
	 */
	protected $referencia_contato;

	/**
	 * The value for the telefone_contato field.
	 * @var        string
	 */
	protected $telefone_contato;

	/**
	 * The value for the email_contato field.
	 * @var        string
	 */
	protected $email_contato;

	/**
	 * The value for the cargo field.
	 * @var        string
	 */
	protected $cargo;

	/**
	 * The value for the rg field.
	 * @var        string
	 */
	protected $rg;

	/**
	 * The value for the nis field.
	 * @var        string
	 */
	protected $nis;

	/**
	 * The value for the contador_id field.
	 * @var        int
	 */
	protected $contador_id;

	/**
	 * The value for the telefone_ac field.
	 * @var        string
	 */
	protected $telefone_ac;

	/**
	 * The value for the email_ac field.
	 * @var        string
	 */
	protected $email_ac;

	/**
	 * @var        Local
	 */
	protected $aLocal;

	/**
	 * @var        Contador
	 */
	protected $aContador;

	/**
	 * @var        Responsavel
	 */
	protected $aResponsavel;

	/**
	 * @var        array CertificadoCupom[] Collection to store aggregation of CertificadoCupom objects.
	 */
	protected $collCertificadoCupoms;

	/**
	 * @var        Criteria The criteria used to select the current contents of collCertificadoCupoms.
	 */
	private $lastCertificadoCupomCriteria = null;

	/**
	 * @var        array Certificado[] Collection to store aggregation of Certificado objects.
	 */
	protected $collCertificados;

	/**
	 * @var        Criteria The criteria used to select the current contents of collCertificados.
	 */
	private $lastCertificadoCriteria = null;

	/**
	 * @var        array ClienteContato[] Collection to store aggregation of ClienteContato objects.
	 */
	protected $collClienteContatos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collClienteContatos.
	 */
	private $lastClienteContatoCriteria = null;

	/**
	 * @var        array ClienteHistorico[] Collection to store aggregation of ClienteHistorico objects.
	 */
	protected $collClienteHistoricos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collClienteHistoricos.
	 */
	private $lastClienteHistoricoCriteria = null;

	/**
	 * @var        array Boleto[] Collection to store aggregation of Boleto objects.
	 */
	protected $collBoletos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collBoletos.
	 */
	private $lastBoletoCriteria = null;

	/**
	 * @var        array Pedido[] Collection to store aggregation of Pedido objects.
	 */
	protected $collPedidos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collPedidos.
	 */
	private $lastPedidoCriteria = null;

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
	 * Get the [responsavel_id] column value.
	 * 
	 * @return     int
	 */
	public function getResponsavelId()
	{
		return $this->responsavel_id;
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
	 * Get the [pessoa_tipo] column value.
	 * 
	 * @return     string
	 */
	public function getPessoaTipo()
	{
		return $this->pessoa_tipo;
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
	 * Get the [email] column value.
	 * 
	 * @return     string
	 */
	public function getEmail()
	{
		return $this->email;
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
	 * Get the [celular] column value.
	 * 
	 * @return     string
	 */
	public function getCelular()
	{
		return $this->celular;
	}

	/**
	 * Get the [cpf_cnpj] column value.
	 * 
	 * @return     string
	 */
	public function getCpfCnpj()
	{
		return $this->cpf_cnpj;
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
	 * Get the [nome_contato] column value.
	 * 
	 * @return     string
	 */
	public function getNomeContato()
	{
		return $this->nome_contato;
	}

	/**
	 * Get the [referencia_contato] column value.
	 * 
	 * @return     string
	 */
	public function getReferenciaContato()
	{
		return $this->referencia_contato;
	}

	/**
	 * Get the [telefone_contato] column value.
	 * 
	 * @return     string
	 */
	public function getTelefoneContato()
	{
		return $this->telefone_contato;
	}

	/**
	 * Get the [email_contato] column value.
	 * 
	 * @return     string
	 */
	public function getEmailContato()
	{
		return $this->email_contato;
	}

	/**
	 * Get the [cargo] column value.
	 * 
	 * @return     string
	 */
	public function getCargo()
	{
		return $this->cargo;
	}

	/**
	 * Get the [rg] column value.
	 * 
	 * @return     string
	 */
	public function getRg()
	{
		return $this->rg;
	}

	/**
	 * Get the [nis] column value.
	 * 
	 * @return     string
	 */
	public function getNis()
	{
		return $this->nis;
	}

	/**
	 * Get the [contador_id] column value.
	 * 
	 * @return     int
	 */
	public function getContadorId()
	{
		return $this->contador_id;
	}

	/**
	 * Get the [telefone_ac] column value.
	 * 
	 * @return     string
	 */
	public function getTelefoneAc()
	{
		return $this->telefone_ac;
	}

	/**
	 * Get the [email_ac] column value.
	 * 
	 * @return     string
	 */
	public function getEmailAc()
	{
		return $this->email_ac;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ClientePeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [responsavel_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setResponsavelId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->responsavel_id !== $v) {
			$this->responsavel_id = $v;
			$this->modifiedColumns[] = ClientePeer::RESPONSAVEL_ID;
		}

		if ($this->aResponsavel !== null && $this->aResponsavel->getId() !== $v) {
			$this->aResponsavel = null;
		}

		return $this;
	} // setResponsavelId()

	/**
	 * Set the value of [local_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setLocalId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->local_id !== $v) {
			$this->local_id = $v;
			$this->modifiedColumns[] = ClientePeer::LOCAL_ID;
		}

		if ($this->aLocal !== null && $this->aLocal->getId() !== $v) {
			$this->aLocal = null;
		}

		return $this;
	} // setLocalId()

	/**
	 * Set the value of [pessoa_tipo] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setPessoaTipo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->pessoa_tipo !== $v) {
			$this->pessoa_tipo = $v;
			$this->modifiedColumns[] = ClientePeer::PESSOA_TIPO;
		}

		return $this;
	} // setPessoaTipo()

	/**
	 * Set the value of [razao_social] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setRazaoSocial($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->razao_social !== $v) {
			$this->razao_social = $v;
			$this->modifiedColumns[] = ClientePeer::RAZAO_SOCIAL;
		}

		return $this;
	} // setRazaoSocial()

	/**
	 * Set the value of [nome_fantasia] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setNomeFantasia($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome_fantasia !== $v) {
			$this->nome_fantasia = $v;
			$this->modifiedColumns[] = ClientePeer::NOME_FANTASIA;
		}

		return $this;
	} // setNomeFantasia()

	/**
	 * Set the value of [endereco] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setEndereco($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->endereco !== $v) {
			$this->endereco = $v;
			$this->modifiedColumns[] = ClientePeer::ENDERECO;
		}

		return $this;
	} // setEndereco()

	/**
	 * Set the value of [numero] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setNumero($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->numero !== $v) {
			$this->numero = $v;
			$this->modifiedColumns[] = ClientePeer::NUMERO;
		}

		return $this;
	} // setNumero()

	/**
	 * Set the value of [bairro] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setBairro($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->bairro !== $v) {
			$this->bairro = $v;
			$this->modifiedColumns[] = ClientePeer::BAIRRO;
		}

		return $this;
	} // setBairro()

	/**
	 * Set the value of [complemento] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setComplemento($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->complemento !== $v) {
			$this->complemento = $v;
			$this->modifiedColumns[] = ClientePeer::COMPLEMENTO;
		}

		return $this;
	} // setComplemento()

	/**
	 * Set the value of [cidade] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setCidade($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cidade !== $v) {
			$this->cidade = $v;
			$this->modifiedColumns[] = ClientePeer::CIDADE;
		}

		return $this;
	} // setCidade()

	/**
	 * Set the value of [email] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = ClientePeer::EMAIL;
		}

		return $this;
	} // setEmail()

	/**
	 * Set the value of [uf] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setUf($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->uf !== $v) {
			$this->uf = $v;
			$this->modifiedColumns[] = ClientePeer::UF;
		}

		return $this;
	} // setUf()

	/**
	 * Set the value of [cep] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setCep($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cep !== $v) {
			$this->cep = $v;
			$this->modifiedColumns[] = ClientePeer::CEP;
		}

		return $this;
	} // setCep()

	/**
	 * Set the value of [fone1] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setFone1($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->fone1 !== $v) {
			$this->fone1 = $v;
			$this->modifiedColumns[] = ClientePeer::FONE1;
		}

		return $this;
	} // setFone1()

	/**
	 * Set the value of [fone2] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setFone2($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->fone2 !== $v) {
			$this->fone2 = $v;
			$this->modifiedColumns[] = ClientePeer::FONE2;
		}

		return $this;
	} // setFone2()

	/**
	 * Set the value of [celular] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setCelular($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->celular !== $v) {
			$this->celular = $v;
			$this->modifiedColumns[] = ClientePeer::CELULAR;
		}

		return $this;
	} // setCelular()

	/**
	 * Set the value of [cpf_cnpj] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setCpfCnpj($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cpf_cnpj !== $v) {
			$this->cpf_cnpj = $v;
			$this->modifiedColumns[] = ClientePeer::CPF_CNPJ;
		}

		return $this;
	} // setCpfCnpj()

	/**
	 * Set the value of [situacao] column.
	 * 
	 * @param      int $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setSituacao($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->situacao !== $v) {
			$this->situacao = $v;
			$this->modifiedColumns[] = ClientePeer::SITUACAO;
		}

		return $this;
	} // setSituacao()

	/**
	 * Sets the value of [nascimento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Cliente The current object (for fluent API support)
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
				$this->modifiedColumns[] = ClientePeer::NASCIMENTO;
			}
		} // if either are not null

		return $this;
	} // setNascimento()

	/**
	 * Set the value of [nome_contato] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setNomeContato($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome_contato !== $v) {
			$this->nome_contato = $v;
			$this->modifiedColumns[] = ClientePeer::NOME_CONTATO;
		}

		return $this;
	} // setNomeContato()

	/**
	 * Set the value of [referencia_contato] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setReferenciaContato($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->referencia_contato !== $v) {
			$this->referencia_contato = $v;
			$this->modifiedColumns[] = ClientePeer::REFERENCIA_CONTATO;
		}

		return $this;
	} // setReferenciaContato()

	/**
	 * Set the value of [telefone_contato] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setTelefoneContato($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->telefone_contato !== $v) {
			$this->telefone_contato = $v;
			$this->modifiedColumns[] = ClientePeer::TELEFONE_CONTATO;
		}

		return $this;
	} // setTelefoneContato()

	/**
	 * Set the value of [email_contato] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setEmailContato($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email_contato !== $v) {
			$this->email_contato = $v;
			$this->modifiedColumns[] = ClientePeer::EMAIL_CONTATO;
		}

		return $this;
	} // setEmailContato()

	/**
	 * Set the value of [cargo] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setCargo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cargo !== $v) {
			$this->cargo = $v;
			$this->modifiedColumns[] = ClientePeer::CARGO;
		}

		return $this;
	} // setCargo()

	/**
	 * Set the value of [rg] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setRg($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->rg !== $v) {
			$this->rg = $v;
			$this->modifiedColumns[] = ClientePeer::RG;
		}

		return $this;
	} // setRg()

	/**
	 * Set the value of [nis] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setNis($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nis !== $v) {
			$this->nis = $v;
			$this->modifiedColumns[] = ClientePeer::NIS;
		}

		return $this;
	} // setNis()

	/**
	 * Set the value of [contador_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setContadorId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->contador_id !== $v) {
			$this->contador_id = $v;
			$this->modifiedColumns[] = ClientePeer::CONTADOR_ID;
		}

		if ($this->aContador !== null && $this->aContador->getId() !== $v) {
			$this->aContador = null;
		}

		return $this;
	} // setContadorId()

	/**
	 * Set the value of [telefone_ac] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setTelefoneAc($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->telefone_ac !== $v) {
			$this->telefone_ac = $v;
			$this->modifiedColumns[] = ClientePeer::TELEFONE_AC;
		}

		return $this;
	} // setTelefoneAc()

	/**
	 * Set the value of [email_ac] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setEmailAc($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email_ac !== $v) {
			$this->email_ac = $v;
			$this->modifiedColumns[] = ClientePeer::EMAIL_AC;
		}

		return $this;
	} // setEmailAc()

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
			$this->responsavel_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->local_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->pessoa_tipo = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->razao_social = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->nome_fantasia = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->endereco = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->numero = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->bairro = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->complemento = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->cidade = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->email = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->uf = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->cep = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->fone1 = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->fone2 = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
			$this->celular = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
			$this->cpf_cnpj = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
			$this->situacao = ($row[$startcol + 18] !== null) ? (int) $row[$startcol + 18] : null;
			$this->nascimento = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
			$this->nome_contato = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
			$this->referencia_contato = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
			$this->telefone_contato = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
			$this->email_contato = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
			$this->cargo = ($row[$startcol + 24] !== null) ? (string) $row[$startcol + 24] : null;
			$this->rg = ($row[$startcol + 25] !== null) ? (string) $row[$startcol + 25] : null;
			$this->nis = ($row[$startcol + 26] !== null) ? (string) $row[$startcol + 26] : null;
			$this->contador_id = ($row[$startcol + 27] !== null) ? (int) $row[$startcol + 27] : null;
			$this->telefone_ac = ($row[$startcol + 28] !== null) ? (string) $row[$startcol + 28] : null;
			$this->email_ac = ($row[$startcol + 29] !== null) ? (string) $row[$startcol + 29] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 30; // 30 = ClientePeer::NUM_COLUMNS - ClientePeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Cliente object", $e);
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

		if ($this->aResponsavel !== null && $this->responsavel_id !== $this->aResponsavel->getId()) {
			$this->aResponsavel = null;
		}
		if ($this->aLocal !== null && $this->local_id !== $this->aLocal->getId()) {
			$this->aLocal = null;
		}
		if ($this->aContador !== null && $this->contador_id !== $this->aContador->getId()) {
			$this->aContador = null;
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
			$con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ClientePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aLocal = null;
			$this->aContador = null;
			$this->aResponsavel = null;
			$this->collCertificadoCupoms = null;
			$this->lastCertificadoCupomCriteria = null;

			$this->collCertificados = null;
			$this->lastCertificadoCriteria = null;

			$this->collClienteContatos = null;
			$this->lastClienteContatoCriteria = null;

			$this->collClienteHistoricos = null;
			$this->lastClienteHistoricoCriteria = null;

			$this->collBoletos = null;
			$this->lastBoletoCriteria = null;

			$this->collPedidos = null;
			$this->lastPedidoCriteria = null;

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
			$con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				ClientePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				ClientePeer::addInstanceToPool($this);
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

			if ($this->aLocal !== null) {
				if ($this->aLocal->isModified() || $this->aLocal->isNew()) {
					$affectedRows += $this->aLocal->save($con);
				}
				$this->setLocal($this->aLocal);
			}

			if ($this->aContador !== null) {
				if ($this->aContador->isModified() || $this->aContador->isNew()) {
					$affectedRows += $this->aContador->save($con);
				}
				$this->setContador($this->aContador);
			}

			if ($this->aResponsavel !== null) {
				if ($this->aResponsavel->isModified() || $this->aResponsavel->isNew()) {
					$affectedRows += $this->aResponsavel->save($con);
				}
				$this->setResponsavel($this->aResponsavel);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = ClientePeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ClientePeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += ClientePeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collCertificadoCupoms !== null) {
				foreach ($this->collCertificadoCupoms as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCertificados !== null) {
				foreach ($this->collCertificados as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collClienteContatos !== null) {
				foreach ($this->collClienteContatos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collClienteHistoricos !== null) {
				foreach ($this->collClienteHistoricos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collBoletos !== null) {
				foreach ($this->collBoletos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collPedidos !== null) {
				foreach ($this->collPedidos as $referrerFK) {
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

			if ($this->aLocal !== null) {
				if (!$this->aLocal->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLocal->getValidationFailures());
				}
			}

			if ($this->aContador !== null) {
				if (!$this->aContador->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aContador->getValidationFailures());
				}
			}

			if ($this->aResponsavel !== null) {
				if (!$this->aResponsavel->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aResponsavel->getValidationFailures());
				}
			}


			if (($retval = ClientePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCertificadoCupoms !== null) {
					foreach ($this->collCertificadoCupoms as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCertificados !== null) {
					foreach ($this->collCertificados as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collClienteContatos !== null) {
					foreach ($this->collClienteContatos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collClienteHistoricos !== null) {
					foreach ($this->collClienteHistoricos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collBoletos !== null) {
					foreach ($this->collBoletos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collPedidos !== null) {
					foreach ($this->collPedidos as $referrerFK) {
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
		$criteria = new Criteria(ClientePeer::DATABASE_NAME);

		if ($this->isColumnModified(ClientePeer::ID)) $criteria->add(ClientePeer::ID, $this->id);
		if ($this->isColumnModified(ClientePeer::RESPONSAVEL_ID)) $criteria->add(ClientePeer::RESPONSAVEL_ID, $this->responsavel_id);
		if ($this->isColumnModified(ClientePeer::LOCAL_ID)) $criteria->add(ClientePeer::LOCAL_ID, $this->local_id);
		if ($this->isColumnModified(ClientePeer::PESSOA_TIPO)) $criteria->add(ClientePeer::PESSOA_TIPO, $this->pessoa_tipo);
		if ($this->isColumnModified(ClientePeer::RAZAO_SOCIAL)) $criteria->add(ClientePeer::RAZAO_SOCIAL, $this->razao_social);
		if ($this->isColumnModified(ClientePeer::NOME_FANTASIA)) $criteria->add(ClientePeer::NOME_FANTASIA, $this->nome_fantasia);
		if ($this->isColumnModified(ClientePeer::ENDERECO)) $criteria->add(ClientePeer::ENDERECO, $this->endereco);
		if ($this->isColumnModified(ClientePeer::NUMERO)) $criteria->add(ClientePeer::NUMERO, $this->numero);
		if ($this->isColumnModified(ClientePeer::BAIRRO)) $criteria->add(ClientePeer::BAIRRO, $this->bairro);
		if ($this->isColumnModified(ClientePeer::COMPLEMENTO)) $criteria->add(ClientePeer::COMPLEMENTO, $this->complemento);
		if ($this->isColumnModified(ClientePeer::CIDADE)) $criteria->add(ClientePeer::CIDADE, $this->cidade);
		if ($this->isColumnModified(ClientePeer::EMAIL)) $criteria->add(ClientePeer::EMAIL, $this->email);
		if ($this->isColumnModified(ClientePeer::UF)) $criteria->add(ClientePeer::UF, $this->uf);
		if ($this->isColumnModified(ClientePeer::CEP)) $criteria->add(ClientePeer::CEP, $this->cep);
		if ($this->isColumnModified(ClientePeer::FONE1)) $criteria->add(ClientePeer::FONE1, $this->fone1);
		if ($this->isColumnModified(ClientePeer::FONE2)) $criteria->add(ClientePeer::FONE2, $this->fone2);
		if ($this->isColumnModified(ClientePeer::CELULAR)) $criteria->add(ClientePeer::CELULAR, $this->celular);
		if ($this->isColumnModified(ClientePeer::CPF_CNPJ)) $criteria->add(ClientePeer::CPF_CNPJ, $this->cpf_cnpj);
		if ($this->isColumnModified(ClientePeer::SITUACAO)) $criteria->add(ClientePeer::SITUACAO, $this->situacao);
		if ($this->isColumnModified(ClientePeer::NASCIMENTO)) $criteria->add(ClientePeer::NASCIMENTO, $this->nascimento);
		if ($this->isColumnModified(ClientePeer::NOME_CONTATO)) $criteria->add(ClientePeer::NOME_CONTATO, $this->nome_contato);
		if ($this->isColumnModified(ClientePeer::REFERENCIA_CONTATO)) $criteria->add(ClientePeer::REFERENCIA_CONTATO, $this->referencia_contato);
		if ($this->isColumnModified(ClientePeer::TELEFONE_CONTATO)) $criteria->add(ClientePeer::TELEFONE_CONTATO, $this->telefone_contato);
		if ($this->isColumnModified(ClientePeer::EMAIL_CONTATO)) $criteria->add(ClientePeer::EMAIL_CONTATO, $this->email_contato);
		if ($this->isColumnModified(ClientePeer::CARGO)) $criteria->add(ClientePeer::CARGO, $this->cargo);
		if ($this->isColumnModified(ClientePeer::RG)) $criteria->add(ClientePeer::RG, $this->rg);
		if ($this->isColumnModified(ClientePeer::NIS)) $criteria->add(ClientePeer::NIS, $this->nis);
		if ($this->isColumnModified(ClientePeer::CONTADOR_ID)) $criteria->add(ClientePeer::CONTADOR_ID, $this->contador_id);
		if ($this->isColumnModified(ClientePeer::TELEFONE_AC)) $criteria->add(ClientePeer::TELEFONE_AC, $this->telefone_ac);
		if ($this->isColumnModified(ClientePeer::EMAIL_AC)) $criteria->add(ClientePeer::EMAIL_AC, $this->email_ac);

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
		$criteria = new Criteria(ClientePeer::DATABASE_NAME);

		$criteria->add(ClientePeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Cliente (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setResponsavelId($this->responsavel_id);

		$copyObj->setLocalId($this->local_id);

		$copyObj->setPessoaTipo($this->pessoa_tipo);

		$copyObj->setRazaoSocial($this->razao_social);

		$copyObj->setNomeFantasia($this->nome_fantasia);

		$copyObj->setEndereco($this->endereco);

		$copyObj->setNumero($this->numero);

		$copyObj->setBairro($this->bairro);

		$copyObj->setComplemento($this->complemento);

		$copyObj->setCidade($this->cidade);

		$copyObj->setEmail($this->email);

		$copyObj->setUf($this->uf);

		$copyObj->setCep($this->cep);

		$copyObj->setFone1($this->fone1);

		$copyObj->setFone2($this->fone2);

		$copyObj->setCelular($this->celular);

		$copyObj->setCpfCnpj($this->cpf_cnpj);

		$copyObj->setSituacao($this->situacao);

		$copyObj->setNascimento($this->nascimento);

		$copyObj->setNomeContato($this->nome_contato);

		$copyObj->setReferenciaContato($this->referencia_contato);

		$copyObj->setTelefoneContato($this->telefone_contato);

		$copyObj->setEmailContato($this->email_contato);

		$copyObj->setCargo($this->cargo);

		$copyObj->setRg($this->rg);

		$copyObj->setNis($this->nis);

		$copyObj->setContadorId($this->contador_id);

		$copyObj->setTelefoneAc($this->telefone_ac);

		$copyObj->setEmailAc($this->email_ac);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getCertificadoCupoms() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCertificadoCupom($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCertificados() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCertificado($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getClienteContatos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addClienteContato($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getClienteHistoricos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addClienteHistorico($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getBoletos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addBoleto($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getPedidos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addPedido($relObj->copy($deepCopy));
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
	 * @return     Cliente Clone of current object.
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
	 * @return     ClientePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ClientePeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Local object.
	 *
	 * @param      Local $v
	 * @return     Cliente The current object (for fluent API support)
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
			$v->addCliente($this);
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
			   $this->aLocal->addClientes($this);
			 */
		}
		return $this->aLocal;
	}

	/**
	 * Declares an association between this object and a Contador object.
	 *
	 * @param      Contador $v
	 * @return     Cliente The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setContador(Contador $v = null)
	{
		if ($v === null) {
			$this->setContadorId(NULL);
		} else {
			$this->setContadorId($v->getId());
		}

		$this->aContador = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Contador object, it will not be re-added.
		if ($v !== null) {
			$v->addCliente($this);
		}

		return $this;
	}


	/**
	 * Get the associated Contador object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Contador The associated Contador object.
	 * @throws     PropelException
	 */
	public function getContador(PropelPDO $con = null)
	{
		if ($this->aContador === null && ($this->contador_id !== null)) {
			$this->aContador = ContadorPeer::retrieveByPk($this->contador_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aContador->addClientes($this);
			 */
		}
		return $this->aContador;
	}

	/**
	 * Declares an association between this object and a Responsavel object.
	 *
	 * @param      Responsavel $v
	 * @return     Cliente The current object (for fluent API support)
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
			$v->addCliente($this);
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
			   $this->aResponsavel->addClientes($this);
			 */
		}
		return $this->aResponsavel;
	}

	/**
	 * Clears out the collCertificadoCupoms collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCertificadoCupoms()
	 */
	public function clearCertificadoCupoms()
	{
		$this->collCertificadoCupoms = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCertificadoCupoms collection (array).
	 *
	 * By default this just sets the collCertificadoCupoms collection to an empty array (like clearcollCertificadoCupoms());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCertificadoCupoms()
	{
		$this->collCertificadoCupoms = array();
	}

	/**
	 * Gets an array of CertificadoCupom objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Cliente has previously been saved, it will retrieve
	 * related CertificadoCupoms from storage. If this Cliente is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array CertificadoCupom[]
	 * @throws     PropelException
	 */
	public function getCertificadoCupoms($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadoCupoms === null) {
			if ($this->isNew()) {
			   $this->collCertificadoCupoms = array();
			} else {

				$criteria->add(CertificadoCupomPeer::CLIENTE_ID, $this->id);

				CertificadoCupomPeer::addSelectColumns($criteria);
				$this->collCertificadoCupoms = CertificadoCupomPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(CertificadoCupomPeer::CLIENTE_ID, $this->id);

				CertificadoCupomPeer::addSelectColumns($criteria);
				if (!isset($this->lastCertificadoCupomCriteria) || !$this->lastCertificadoCupomCriteria->equals($criteria)) {
					$this->collCertificadoCupoms = CertificadoCupomPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCertificadoCupomCriteria = $criteria;
		return $this->collCertificadoCupoms;
	}

	/**
	 * Returns the number of related CertificadoCupom objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related CertificadoCupom objects.
	 * @throws     PropelException
	 */
	public function countCertificadoCupoms(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientePeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collCertificadoCupoms === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(CertificadoCupomPeer::CLIENTE_ID, $this->id);

				$count = CertificadoCupomPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(CertificadoCupomPeer::CLIENTE_ID, $this->id);

				if (!isset($this->lastCertificadoCupomCriteria) || !$this->lastCertificadoCupomCriteria->equals($criteria)) {
					$count = CertificadoCupomPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collCertificadoCupoms);
				}
			} else {
				$count = count($this->collCertificadoCupoms);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a CertificadoCupom object to this object
	 * through the CertificadoCupom foreign key attribute.
	 *
	 * @param      CertificadoCupom $l CertificadoCupom
	 * @return     void
	 * @throws     PropelException
	 */
	public function addCertificadoCupom(CertificadoCupom $l)
	{
		if ($this->collCertificadoCupoms === null) {
			$this->initCertificadoCupoms();
		}
		if (!in_array($l, $this->collCertificadoCupoms, true)) { // only add it if the **same** object is not already associated
			array_push($this->collCertificadoCupoms, $l);
			$l->setCliente($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cliente is new, it will return
	 * an empty collection; or if this Cliente has previously
	 * been saved, it will retrieve related CertificadoCupoms from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cliente.
	 */
	public function getCertificadoCupomsJoinCertificado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadoCupoms === null) {
			if ($this->isNew()) {
				$this->collCertificadoCupoms = array();
			} else {

				$criteria->add(CertificadoCupomPeer::CLIENTE_ID, $this->id);

				$this->collCertificadoCupoms = CertificadoCupomPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoCupomPeer::CLIENTE_ID, $this->id);

			if (!isset($this->lastCertificadoCupomCriteria) || !$this->lastCertificadoCupomCriteria->equals($criteria)) {
				$this->collCertificadoCupoms = CertificadoCupomPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoCupomCriteria = $criteria;

		return $this->collCertificadoCupoms;
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
	 * Otherwise if this Cliente has previously been saved, it will retrieve
	 * related Certificados from storage. If this Cliente is new, it will return
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
			$criteria = new Criteria(ClientePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
			   $this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::CLIENTE_ID, $this->id);

				CertificadoPeer::addSelectColumns($criteria);
				$this->collCertificados = CertificadoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(CertificadoPeer::CLIENTE_ID, $this->id);

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
			$criteria = new Criteria(ClientePeer::DATABASE_NAME);
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

				$criteria->add(CertificadoPeer::CLIENTE_ID, $this->id);

				$count = CertificadoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(CertificadoPeer::CLIENTE_ID, $this->id);

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
			$l->setCliente($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cliente is new, it will return
	 * an empty collection; or if this Cliente has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cliente.
	 */
	public function getCertificadosJoinSituacao($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::CLIENTE_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinSituacao($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::CLIENTE_ID, $this->id);

			if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
				$this->collCertificados = CertificadoPeer::doSelectJoinSituacao($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoCriteria = $criteria;

		return $this->collCertificados;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cliente is new, it will return
	 * an empty collection; or if this Cliente has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cliente.
	 */
	public function getCertificadosJoinParceiro($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::CLIENTE_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinParceiro($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::CLIENTE_ID, $this->id);

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
	 * Otherwise if this Cliente is new, it will return
	 * an empty collection; or if this Cliente has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cliente.
	 */
	public function getCertificadosJoinContador($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::CLIENTE_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinContador($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::CLIENTE_ID, $this->id);

			if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
				$this->collCertificados = CertificadoPeer::doSelectJoinContador($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoCriteria = $criteria;

		return $this->collCertificados;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cliente is new, it will return
	 * an empty collection; or if this Cliente has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cliente.
	 */
	public function getCertificadosJoinLocal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::CLIENTE_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinLocal($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::CLIENTE_ID, $this->id);

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
	 * Otherwise if this Cliente is new, it will return
	 * an empty collection; or if this Cliente has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cliente.
	 */
	public function getCertificadosJoinFormaPagamento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::CLIENTE_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinFormaPagamento($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::CLIENTE_ID, $this->id);

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
	 * Otherwise if this Cliente is new, it will return
	 * an empty collection; or if this Cliente has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cliente.
	 */
	public function getCertificadosJoinProduto($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::CLIENTE_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinProduto($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::CLIENTE_ID, $this->id);

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
	 * Otherwise if this Cliente is new, it will return
	 * an empty collection; or if this Cliente has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cliente.
	 */
	public function getCertificadosJoinUsuarioRelatedByUsuarioId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::CLIENTE_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinUsuarioRelatedByUsuarioId($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::CLIENTE_ID, $this->id);

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
	 * Otherwise if this Cliente is new, it will return
	 * an empty collection; or if this Cliente has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cliente.
	 */
	public function getCertificadosJoinUsuarioRelatedByUsuarioValidouId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::CLIENTE_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinUsuarioRelatedByUsuarioValidouId($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::CLIENTE_ID, $this->id);

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
	 * Otherwise if this Cliente is new, it will return
	 * an empty collection; or if this Cliente has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cliente.
	 */
	public function getCertificadosJoinCertificadoRelatedByCertificadoRenovado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::CLIENTE_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinCertificadoRelatedByCertificadoRenovado($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::CLIENTE_ID, $this->id);

			if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
				$this->collCertificados = CertificadoPeer::doSelectJoinCertificadoRelatedByCertificadoRenovado($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoCriteria = $criteria;

		return $this->collCertificados;
	}

	/**
	 * Clears out the collClienteContatos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addClienteContatos()
	 */
	public function clearClienteContatos()
	{
		$this->collClienteContatos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collClienteContatos collection (array).
	 *
	 * By default this just sets the collClienteContatos collection to an empty array (like clearcollClienteContatos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initClienteContatos()
	{
		$this->collClienteContatos = array();
	}

	/**
	 * Gets an array of ClienteContato objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Cliente has previously been saved, it will retrieve
	 * related ClienteContatos from storage. If this Cliente is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ClienteContato[]
	 * @throws     PropelException
	 */
	public function getClienteContatos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClienteContatos === null) {
			if ($this->isNew()) {
			   $this->collClienteContatos = array();
			} else {

				$criteria->add(ClienteContatoPeer::CLIENTE_ID, $this->id);

				ClienteContatoPeer::addSelectColumns($criteria);
				$this->collClienteContatos = ClienteContatoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ClienteContatoPeer::CLIENTE_ID, $this->id);

				ClienteContatoPeer::addSelectColumns($criteria);
				if (!isset($this->lastClienteContatoCriteria) || !$this->lastClienteContatoCriteria->equals($criteria)) {
					$this->collClienteContatos = ClienteContatoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastClienteContatoCriteria = $criteria;
		return $this->collClienteContatos;
	}

	/**
	 * Returns the number of related ClienteContato objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ClienteContato objects.
	 * @throws     PropelException
	 */
	public function countClienteContatos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientePeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collClienteContatos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ClienteContatoPeer::CLIENTE_ID, $this->id);

				$count = ClienteContatoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ClienteContatoPeer::CLIENTE_ID, $this->id);

				if (!isset($this->lastClienteContatoCriteria) || !$this->lastClienteContatoCriteria->equals($criteria)) {
					$count = ClienteContatoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collClienteContatos);
				}
			} else {
				$count = count($this->collClienteContatos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a ClienteContato object to this object
	 * through the ClienteContato foreign key attribute.
	 *
	 * @param      ClienteContato $l ClienteContato
	 * @return     void
	 * @throws     PropelException
	 */
	public function addClienteContato(ClienteContato $l)
	{
		if ($this->collClienteContatos === null) {
			$this->initClienteContatos();
		}
		if (!in_array($l, $this->collClienteContatos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collClienteContatos, $l);
			$l->setCliente($this);
		}
	}

	/**
	 * Clears out the collClienteHistoricos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addClienteHistoricos()
	 */
	public function clearClienteHistoricos()
	{
		$this->collClienteHistoricos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collClienteHistoricos collection (array).
	 *
	 * By default this just sets the collClienteHistoricos collection to an empty array (like clearcollClienteHistoricos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initClienteHistoricos()
	{
		$this->collClienteHistoricos = array();
	}

	/**
	 * Gets an array of ClienteHistorico objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Cliente has previously been saved, it will retrieve
	 * related ClienteHistoricos from storage. If this Cliente is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ClienteHistorico[]
	 * @throws     PropelException
	 */
	public function getClienteHistoricos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClienteHistoricos === null) {
			if ($this->isNew()) {
			   $this->collClienteHistoricos = array();
			} else {

				$criteria->add(ClienteHistoricoPeer::CLIENTE_ID, $this->id);

				ClienteHistoricoPeer::addSelectColumns($criteria);
				$this->collClienteHistoricos = ClienteHistoricoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ClienteHistoricoPeer::CLIENTE_ID, $this->id);

				ClienteHistoricoPeer::addSelectColumns($criteria);
				if (!isset($this->lastClienteHistoricoCriteria) || !$this->lastClienteHistoricoCriteria->equals($criteria)) {
					$this->collClienteHistoricos = ClienteHistoricoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastClienteHistoricoCriteria = $criteria;
		return $this->collClienteHistoricos;
	}

	/**
	 * Returns the number of related ClienteHistorico objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ClienteHistorico objects.
	 * @throws     PropelException
	 */
	public function countClienteHistoricos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientePeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collClienteHistoricos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ClienteHistoricoPeer::CLIENTE_ID, $this->id);

				$count = ClienteHistoricoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ClienteHistoricoPeer::CLIENTE_ID, $this->id);

				if (!isset($this->lastClienteHistoricoCriteria) || !$this->lastClienteHistoricoCriteria->equals($criteria)) {
					$count = ClienteHistoricoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collClienteHistoricos);
				}
			} else {
				$count = count($this->collClienteHistoricos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a ClienteHistorico object to this object
	 * through the ClienteHistorico foreign key attribute.
	 *
	 * @param      ClienteHistorico $l ClienteHistorico
	 * @return     void
	 * @throws     PropelException
	 */
	public function addClienteHistorico(ClienteHistorico $l)
	{
		if ($this->collClienteHistoricos === null) {
			$this->initClienteHistoricos();
		}
		if (!in_array($l, $this->collClienteHistoricos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collClienteHistoricos, $l);
			$l->setCliente($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cliente is new, it will return
	 * an empty collection; or if this Cliente has previously
	 * been saved, it will retrieve related ClienteHistoricos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cliente.
	 */
	public function getClienteHistoricosJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClienteHistoricos === null) {
			if ($this->isNew()) {
				$this->collClienteHistoricos = array();
			} else {

				$criteria->add(ClienteHistoricoPeer::CLIENTE_ID, $this->id);

				$this->collClienteHistoricos = ClienteHistoricoPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ClienteHistoricoPeer::CLIENTE_ID, $this->id);

			if (!isset($this->lastClienteHistoricoCriteria) || !$this->lastClienteHistoricoCriteria->equals($criteria)) {
				$this->collClienteHistoricos = ClienteHistoricoPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		}
		$this->lastClienteHistoricoCriteria = $criteria;

		return $this->collClienteHistoricos;
	}

	/**
	 * Clears out the collBoletos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addBoletos()
	 */
	public function clearBoletos()
	{
		$this->collBoletos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collBoletos collection (array).
	 *
	 * By default this just sets the collBoletos collection to an empty array (like clearcollBoletos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initBoletos()
	{
		$this->collBoletos = array();
	}

	/**
	 * Gets an array of Boleto objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Cliente has previously been saved, it will retrieve
	 * related Boletos from storage. If this Cliente is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Boleto[]
	 * @throws     PropelException
	 */
	public function getBoletos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletos === null) {
			if ($this->isNew()) {
			   $this->collBoletos = array();
			} else {

				$criteria->add(BoletoPeer::CLIENTE_ID, $this->id);

				BoletoPeer::addSelectColumns($criteria);
				$this->collBoletos = BoletoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(BoletoPeer::CLIENTE_ID, $this->id);

				BoletoPeer::addSelectColumns($criteria);
				if (!isset($this->lastBoletoCriteria) || !$this->lastBoletoCriteria->equals($criteria)) {
					$this->collBoletos = BoletoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastBoletoCriteria = $criteria;
		return $this->collBoletos;
	}

	/**
	 * Returns the number of related Boleto objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Boleto objects.
	 * @throws     PropelException
	 */
	public function countBoletos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientePeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collBoletos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(BoletoPeer::CLIENTE_ID, $this->id);

				$count = BoletoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(BoletoPeer::CLIENTE_ID, $this->id);

				if (!isset($this->lastBoletoCriteria) || !$this->lastBoletoCriteria->equals($criteria)) {
					$count = BoletoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collBoletos);
				}
			} else {
				$count = count($this->collBoletos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a Boleto object to this object
	 * through the Boleto foreign key attribute.
	 *
	 * @param      Boleto $l Boleto
	 * @return     void
	 * @throws     PropelException
	 */
	public function addBoleto(Boleto $l)
	{
		if ($this->collBoletos === null) {
			$this->initBoletos();
		}
		if (!in_array($l, $this->collBoletos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collBoletos, $l);
			$l->setCliente($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cliente is new, it will return
	 * an empty collection; or if this Cliente has previously
	 * been saved, it will retrieve related Boletos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cliente.
	 */
	public function getBoletosJoinCertificado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletos === null) {
			if ($this->isNew()) {
				$this->collBoletos = array();
			} else {

				$criteria->add(BoletoPeer::CLIENTE_ID, $this->id);

				$this->collBoletos = BoletoPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(BoletoPeer::CLIENTE_ID, $this->id);

			if (!isset($this->lastBoletoCriteria) || !$this->lastBoletoCriteria->equals($criteria)) {
				$this->collBoletos = BoletoPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		}
		$this->lastBoletoCriteria = $criteria;

		return $this->collBoletos;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cliente is new, it will return
	 * an empty collection; or if this Cliente has previously
	 * been saved, it will retrieve related Boletos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cliente.
	 */
	public function getBoletosJoinPedido($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletos === null) {
			if ($this->isNew()) {
				$this->collBoletos = array();
			} else {

				$criteria->add(BoletoPeer::CLIENTE_ID, $this->id);

				$this->collBoletos = BoletoPeer::doSelectJoinPedido($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(BoletoPeer::CLIENTE_ID, $this->id);

			if (!isset($this->lastBoletoCriteria) || !$this->lastBoletoCriteria->equals($criteria)) {
				$this->collBoletos = BoletoPeer::doSelectJoinPedido($criteria, $con, $join_behavior);
			}
		}
		$this->lastBoletoCriteria = $criteria;

		return $this->collBoletos;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cliente is new, it will return
	 * an empty collection; or if this Cliente has previously
	 * been saved, it will retrieve related Boletos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cliente.
	 */
	public function getBoletosJoinContasReceber($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletos === null) {
			if ($this->isNew()) {
				$this->collBoletos = array();
			} else {

				$criteria->add(BoletoPeer::CLIENTE_ID, $this->id);

				$this->collBoletos = BoletoPeer::doSelectJoinContasReceber($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(BoletoPeer::CLIENTE_ID, $this->id);

			if (!isset($this->lastBoletoCriteria) || !$this->lastBoletoCriteria->equals($criteria)) {
				$this->collBoletos = BoletoPeer::doSelectJoinContasReceber($criteria, $con, $join_behavior);
			}
		}
		$this->lastBoletoCriteria = $criteria;

		return $this->collBoletos;
	}

	/**
	 * Clears out the collPedidos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addPedidos()
	 */
	public function clearPedidos()
	{
		$this->collPedidos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collPedidos collection (array).
	 *
	 * By default this just sets the collPedidos collection to an empty array (like clearcollPedidos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initPedidos()
	{
		$this->collPedidos = array();
	}

	/**
	 * Gets an array of Pedido objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Cliente has previously been saved, it will retrieve
	 * related Pedidos from storage. If this Cliente is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Pedido[]
	 * @throws     PropelException
	 */
	public function getPedidos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPedidos === null) {
			if ($this->isNew()) {
			   $this->collPedidos = array();
			} else {

				$criteria->add(PedidoPeer::CLIENTE_ID, $this->id);

				PedidoPeer::addSelectColumns($criteria);
				$this->collPedidos = PedidoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(PedidoPeer::CLIENTE_ID, $this->id);

				PedidoPeer::addSelectColumns($criteria);
				if (!isset($this->lastPedidoCriteria) || !$this->lastPedidoCriteria->equals($criteria)) {
					$this->collPedidos = PedidoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPedidoCriteria = $criteria;
		return $this->collPedidos;
	}

	/**
	 * Returns the number of related Pedido objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Pedido objects.
	 * @throws     PropelException
	 */
	public function countPedidos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientePeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collPedidos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(PedidoPeer::CLIENTE_ID, $this->id);

				$count = PedidoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(PedidoPeer::CLIENTE_ID, $this->id);

				if (!isset($this->lastPedidoCriteria) || !$this->lastPedidoCriteria->equals($criteria)) {
					$count = PedidoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collPedidos);
				}
			} else {
				$count = count($this->collPedidos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a Pedido object to this object
	 * through the Pedido foreign key attribute.
	 *
	 * @param      Pedido $l Pedido
	 * @return     void
	 * @throws     PropelException
	 */
	public function addPedido(Pedido $l)
	{
		if ($this->collPedidos === null) {
			$this->initPedidos();
		}
		if (!in_array($l, $this->collPedidos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collPedidos, $l);
			$l->setCliente($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cliente is new, it will return
	 * an empty collection; or if this Cliente has previously
	 * been saved, it will retrieve related Pedidos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cliente.
	 */
	public function getPedidosJoinFormaPagamento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ClientePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPedidos === null) {
			if ($this->isNew()) {
				$this->collPedidos = array();
			} else {

				$criteria->add(PedidoPeer::CLIENTE_ID, $this->id);

				$this->collPedidos = PedidoPeer::doSelectJoinFormaPagamento($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(PedidoPeer::CLIENTE_ID, $this->id);

			if (!isset($this->lastPedidoCriteria) || !$this->lastPedidoCriteria->equals($criteria)) {
				$this->collPedidos = PedidoPeer::doSelectJoinFormaPagamento($criteria, $con, $join_behavior);
			}
		}
		$this->lastPedidoCriteria = $criteria;

		return $this->collPedidos;
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
			if ($this->collCertificadoCupoms) {
				foreach ((array) $this->collCertificadoCupoms as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCertificados) {
				foreach ((array) $this->collCertificados as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collClienteContatos) {
				foreach ((array) $this->collClienteContatos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collClienteHistoricos) {
				foreach ((array) $this->collClienteHistoricos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collBoletos) {
				foreach ((array) $this->collBoletos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collPedidos) {
				foreach ((array) $this->collPedidos as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collCertificadoCupoms = null;
		$this->collCertificados = null;
		$this->collClienteContatos = null;
		$this->collClienteHistoricos = null;
		$this->collBoletos = null;
		$this->collPedidos = null;
			$this->aLocal = null;
			$this->aContador = null;
			$this->aResponsavel = null;
	}

} // BaseCliente
