<?php

/**
 * Base class that represents a row from the 'parceiro' table.
 *
 * 
 *
 * @package    pacoteParceiro.om
 */
abstract class BaseParceiro extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ParceiroPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the nome field.
	 * @var        string
	 */
	protected $nome;

	/**
	 * The value for the empresa field.
	 * @var        string
	 */
	protected $empresa;

	/**
	 * The value for the cnpj field.
	 * @var        string
	 */
	protected $cnpj;

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
	 * The value for the cidade field.
	 * @var        string
	 */
	protected $cidade;

	/**
	 * The value for the complemento field.
	 * @var        string
	 */
	protected $complemento;

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
	 * The value for the ibge field.
	 * @var        string
	 */
	protected $ibge;

	/**
	 * The value for the fone field.
	 * @var        string
	 */
	protected $fone;

	/**
	 * The value for the celular field.
	 * @var        string
	 */
	protected $celular;

	/**
	 * The value for the local_id field.
	 * @var        int
	 */
	protected $local_id;

	/**
	 * The value for the situacao field.
	 * @var        int
	 */
	protected $situacao;

	/**
	 * The value for the data_cadastro field.
	 * @var        string
	 */
	protected $data_cadastro;

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
	 * The value for the agencia field.
	 * @var        string
	 */
	protected $agencia;

	/**
	 * The value for the operacao field.
	 * @var        string
	 */
	protected $operacao;

	/**
	 * The value for the comissao_venda field.
	 * @var        int
	 */
	protected $comissao_venda;

	/**
	 * The value for the comissao_validacao field.
	 * @var        int
	 */
	protected $comissao_validacao;

	/**
	 * The value for the comissao_venda_validacao field.
	 * @var        int
	 */
	protected $comissao_venda_validacao;

	/**
	 * The value for the observacao field.
	 * @var        string
	 */
	protected $observacao;

	/**
	 * The value for the tipo_canal field.
	 * @var        string
	 */
	protected $tipo_canal;

	/**
	 * @var        Local
	 */
	protected $aLocal;

	/**
	 * @var        array ParceiroComissionamento[] Collection to store aggregation of ParceiroComissionamento objects.
	 */
	protected $collParceiroComissionamentos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collParceiroComissionamentos.
	 */
	private $lastParceiroComissionamentoCriteria = null;

	/**
	 * @var        array ParceiroUsuario[] Collection to store aggregation of ParceiroUsuario objects.
	 */
	protected $collParceiroUsuarios;

	/**
	 * @var        Criteria The criteria used to select the current contents of collParceiroUsuarios.
	 */
	private $lastParceiroUsuarioCriteria = null;

	/**
	 * @var        array Certificado[] Collection to store aggregation of Certificado objects.
	 */
	protected $collCertificados;

	/**
	 * @var        Criteria The criteria used to select the current contents of collCertificados.
	 */
	private $lastCertificadoCriteria = null;

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
	 * Get the [nome] column value.
	 * 
	 * @return     string
	 */
	public function getNome()
	{
		return $this->nome;
	}

	/**
	 * Get the [empresa] column value.
	 * 
	 * @return     string
	 */
	public function getEmpresa()
	{
		return $this->empresa;
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
	 * Get the [cidade] column value.
	 * 
	 * @return     string
	 */
	public function getCidade()
	{
		return $this->cidade;
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
	 * Get the [ibge] column value.
	 * 
	 * @return     string
	 */
	public function getIbge()
	{
		return $this->ibge;
	}

	/**
	 * Get the [fone] column value.
	 * 
	 * @return     string
	 */
	public function getFone()
	{
		return $this->fone;
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
	 * Get the [local_id] column value.
	 * 
	 * @return     int
	 */
	public function getLocalId()
	{
		return $this->local_id;
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
	 * Get the [optionally formatted] temporal [data_cadastro] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataCadastro($format = '%x')
	{
		if ($this->data_cadastro === null) {
			return null;
		}


		if ($this->data_cadastro === '0000-00-00') {
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
	 * Get the [agencia] column value.
	 * 
	 * @return     string
	 */
	public function getAgencia()
	{
		return $this->agencia;
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
	 * Get the [comissao_venda] column value.
	 * 
	 * @return     int
	 */
	public function getComissaoVenda()
	{
		return $this->comissao_venda;
	}

	/**
	 * Get the [comissao_validacao] column value.
	 * 
	 * @return     int
	 */
	public function getComissaoValidacao()
	{
		return $this->comissao_validacao;
	}

	/**
	 * Get the [comissao_venda_validacao] column value.
	 * 
	 * @return     int
	 */
	public function getComissaoVendaValidacao()
	{
		return $this->comissao_venda_validacao;
	}

	/**
	 * Get the [observacao] column value.
	 * 
	 * @return     string
	 */
	public function getObservacao()
	{
		return $this->observacao;
	}

	/**
	 * Get the [tipo_canal] column value.
	 * 
	 * @return     string
	 */
	public function getTipoCanal()
	{
		return $this->tipo_canal;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Parceiro The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ParceiroPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [nome] column.
	 * 
	 * @param      string $v new value
	 * @return     Parceiro The current object (for fluent API support)
	 */
	public function setNome($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome !== $v) {
			$this->nome = $v;
			$this->modifiedColumns[] = ParceiroPeer::NOME;
		}

		return $this;
	} // setNome()

	/**
	 * Set the value of [empresa] column.
	 * 
	 * @param      string $v new value
	 * @return     Parceiro The current object (for fluent API support)
	 */
	public function setEmpresa($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->empresa !== $v) {
			$this->empresa = $v;
			$this->modifiedColumns[] = ParceiroPeer::EMPRESA;
		}

		return $this;
	} // setEmpresa()

	/**
	 * Set the value of [cnpj] column.
	 * 
	 * @param      string $v new value
	 * @return     Parceiro The current object (for fluent API support)
	 */
	public function setCnpj($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cnpj !== $v) {
			$this->cnpj = $v;
			$this->modifiedColumns[] = ParceiroPeer::CNPJ;
		}

		return $this;
	} // setCnpj()

	/**
	 * Set the value of [endereco] column.
	 * 
	 * @param      string $v new value
	 * @return     Parceiro The current object (for fluent API support)
	 */
	public function setEndereco($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->endereco !== $v) {
			$this->endereco = $v;
			$this->modifiedColumns[] = ParceiroPeer::ENDERECO;
		}

		return $this;
	} // setEndereco()

	/**
	 * Set the value of [numero] column.
	 * 
	 * @param      string $v new value
	 * @return     Parceiro The current object (for fluent API support)
	 */
	public function setNumero($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->numero !== $v) {
			$this->numero = $v;
			$this->modifiedColumns[] = ParceiroPeer::NUMERO;
		}

		return $this;
	} // setNumero()

	/**
	 * Set the value of [bairro] column.
	 * 
	 * @param      string $v new value
	 * @return     Parceiro The current object (for fluent API support)
	 */
	public function setBairro($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->bairro !== $v) {
			$this->bairro = $v;
			$this->modifiedColumns[] = ParceiroPeer::BAIRRO;
		}

		return $this;
	} // setBairro()

	/**
	 * Set the value of [cidade] column.
	 * 
	 * @param      string $v new value
	 * @return     Parceiro The current object (for fluent API support)
	 */
	public function setCidade($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cidade !== $v) {
			$this->cidade = $v;
			$this->modifiedColumns[] = ParceiroPeer::CIDADE;
		}

		return $this;
	} // setCidade()

	/**
	 * Set the value of [complemento] column.
	 * 
	 * @param      string $v new value
	 * @return     Parceiro The current object (for fluent API support)
	 */
	public function setComplemento($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->complemento !== $v) {
			$this->complemento = $v;
			$this->modifiedColumns[] = ParceiroPeer::COMPLEMENTO;
		}

		return $this;
	} // setComplemento()

	/**
	 * Set the value of [email] column.
	 * 
	 * @param      string $v new value
	 * @return     Parceiro The current object (for fluent API support)
	 */
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = ParceiroPeer::EMAIL;
		}

		return $this;
	} // setEmail()

	/**
	 * Set the value of [uf] column.
	 * 
	 * @param      string $v new value
	 * @return     Parceiro The current object (for fluent API support)
	 */
	public function setUf($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->uf !== $v) {
			$this->uf = $v;
			$this->modifiedColumns[] = ParceiroPeer::UF;
		}

		return $this;
	} // setUf()

	/**
	 * Set the value of [cep] column.
	 * 
	 * @param      string $v new value
	 * @return     Parceiro The current object (for fluent API support)
	 */
	public function setCep($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cep !== $v) {
			$this->cep = $v;
			$this->modifiedColumns[] = ParceiroPeer::CEP;
		}

		return $this;
	} // setCep()

	/**
	 * Set the value of [ibge] column.
	 * 
	 * @param      string $v new value
	 * @return     Parceiro The current object (for fluent API support)
	 */
	public function setIbge($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->ibge !== $v) {
			$this->ibge = $v;
			$this->modifiedColumns[] = ParceiroPeer::IBGE;
		}

		return $this;
	} // setIbge()

	/**
	 * Set the value of [fone] column.
	 * 
	 * @param      string $v new value
	 * @return     Parceiro The current object (for fluent API support)
	 */
	public function setFone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->fone !== $v) {
			$this->fone = $v;
			$this->modifiedColumns[] = ParceiroPeer::FONE;
		}

		return $this;
	} // setFone()

	/**
	 * Set the value of [celular] column.
	 * 
	 * @param      string $v new value
	 * @return     Parceiro The current object (for fluent API support)
	 */
	public function setCelular($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->celular !== $v) {
			$this->celular = $v;
			$this->modifiedColumns[] = ParceiroPeer::CELULAR;
		}

		return $this;
	} // setCelular()

	/**
	 * Set the value of [local_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Parceiro The current object (for fluent API support)
	 */
	public function setLocalId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->local_id !== $v) {
			$this->local_id = $v;
			$this->modifiedColumns[] = ParceiroPeer::LOCAL_ID;
		}

		if ($this->aLocal !== null && $this->aLocal->getId() !== $v) {
			$this->aLocal = null;
		}

		return $this;
	} // setLocalId()

	/**
	 * Set the value of [situacao] column.
	 * 
	 * @param      int $v new value
	 * @return     Parceiro The current object (for fluent API support)
	 */
	public function setSituacao($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->situacao !== $v) {
			$this->situacao = $v;
			$this->modifiedColumns[] = ParceiroPeer::SITUACAO;
		}

		return $this;
	} // setSituacao()

	/**
	 * Sets the value of [data_cadastro] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Parceiro The current object (for fluent API support)
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

			$currNorm = ($this->data_cadastro !== null && $tmpDt = new DateTime($this->data_cadastro)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_cadastro = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = ParceiroPeer::DATA_CADASTRO;
			}
		} // if either are not null

		return $this;
	} // setDataCadastro()

	/**
	 * Set the value of [banco] column.
	 * 
	 * @param      string $v new value
	 * @return     Parceiro The current object (for fluent API support)
	 */
	public function setBanco($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->banco !== $v) {
			$this->banco = $v;
			$this->modifiedColumns[] = ParceiroPeer::BANCO;
		}

		return $this;
	} // setBanco()

	/**
	 * Set the value of [conta_corrente] column.
	 * 
	 * @param      string $v new value
	 * @return     Parceiro The current object (for fluent API support)
	 */
	public function setContaCorrente($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->conta_corrente !== $v) {
			$this->conta_corrente = $v;
			$this->modifiedColumns[] = ParceiroPeer::CONTA_CORRENTE;
		}

		return $this;
	} // setContaCorrente()

	/**
	 * Set the value of [agencia] column.
	 * 
	 * @param      string $v new value
	 * @return     Parceiro The current object (for fluent API support)
	 */
	public function setAgencia($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->agencia !== $v) {
			$this->agencia = $v;
			$this->modifiedColumns[] = ParceiroPeer::AGENCIA;
		}

		return $this;
	} // setAgencia()

	/**
	 * Set the value of [operacao] column.
	 * 
	 * @param      string $v new value
	 * @return     Parceiro The current object (for fluent API support)
	 */
	public function setOperacao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->operacao !== $v) {
			$this->operacao = $v;
			$this->modifiedColumns[] = ParceiroPeer::OPERACAO;
		}

		return $this;
	} // setOperacao()

	/**
	 * Set the value of [comissao_venda] column.
	 * 
	 * @param      int $v new value
	 * @return     Parceiro The current object (for fluent API support)
	 */
	public function setComissaoVenda($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->comissao_venda !== $v) {
			$this->comissao_venda = $v;
			$this->modifiedColumns[] = ParceiroPeer::COMISSAO_VENDA;
		}

		return $this;
	} // setComissaoVenda()

	/**
	 * Set the value of [comissao_validacao] column.
	 * 
	 * @param      int $v new value
	 * @return     Parceiro The current object (for fluent API support)
	 */
	public function setComissaoValidacao($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->comissao_validacao !== $v) {
			$this->comissao_validacao = $v;
			$this->modifiedColumns[] = ParceiroPeer::COMISSAO_VALIDACAO;
		}

		return $this;
	} // setComissaoValidacao()

	/**
	 * Set the value of [comissao_venda_validacao] column.
	 * 
	 * @param      int $v new value
	 * @return     Parceiro The current object (for fluent API support)
	 */
	public function setComissaoVendaValidacao($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->comissao_venda_validacao !== $v) {
			$this->comissao_venda_validacao = $v;
			$this->modifiedColumns[] = ParceiroPeer::COMISSAO_VENDA_VALIDACAO;
		}

		return $this;
	} // setComissaoVendaValidacao()

	/**
	 * Set the value of [observacao] column.
	 * 
	 * @param      string $v new value
	 * @return     Parceiro The current object (for fluent API support)
	 */
	public function setObservacao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->observacao !== $v) {
			$this->observacao = $v;
			$this->modifiedColumns[] = ParceiroPeer::OBSERVACAO;
		}

		return $this;
	} // setObservacao()

	/**
	 * Set the value of [tipo_canal] column.
	 * 
	 * @param      string $v new value
	 * @return     Parceiro The current object (for fluent API support)
	 */
	public function setTipoCanal($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->tipo_canal !== $v) {
			$this->tipo_canal = $v;
			$this->modifiedColumns[] = ParceiroPeer::TIPO_CANAL;
		}

		return $this;
	} // setTipoCanal()

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
			$this->nome = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->empresa = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->cnpj = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->endereco = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->numero = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->bairro = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->cidade = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->complemento = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->email = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->uf = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->cep = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->ibge = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->fone = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->celular = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->local_id = ($row[$startcol + 15] !== null) ? (int) $row[$startcol + 15] : null;
			$this->situacao = ($row[$startcol + 16] !== null) ? (int) $row[$startcol + 16] : null;
			$this->data_cadastro = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
			$this->banco = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
			$this->conta_corrente = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
			$this->agencia = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
			$this->operacao = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
			$this->comissao_venda = ($row[$startcol + 22] !== null) ? (int) $row[$startcol + 22] : null;
			$this->comissao_validacao = ($row[$startcol + 23] !== null) ? (int) $row[$startcol + 23] : null;
			$this->comissao_venda_validacao = ($row[$startcol + 24] !== null) ? (int) $row[$startcol + 24] : null;
			$this->observacao = ($row[$startcol + 25] !== null) ? (string) $row[$startcol + 25] : null;
			$this->tipo_canal = ($row[$startcol + 26] !== null) ? (string) $row[$startcol + 26] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 27; // 27 = ParceiroPeer::NUM_COLUMNS - ParceiroPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Parceiro object", $e);
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
			$con = Propel::getConnection(ParceiroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ParceiroPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aLocal = null;
			$this->collParceiroComissionamentos = null;
			$this->lastParceiroComissionamentoCriteria = null;

			$this->collParceiroUsuarios = null;
			$this->lastParceiroUsuarioCriteria = null;

			$this->collCertificados = null;
			$this->lastCertificadoCriteria = null;

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
			$con = Propel::getConnection(ParceiroPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				ParceiroPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ParceiroPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				ParceiroPeer::addInstanceToPool($this);
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

			if ($this->isNew() ) {
				$this->modifiedColumns[] = ParceiroPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ParceiroPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += ParceiroPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collParceiroComissionamentos !== null) {
				foreach ($this->collParceiroComissionamentos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collParceiroUsuarios !== null) {
				foreach ($this->collParceiroUsuarios as $referrerFK) {
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


			if (($retval = ParceiroPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collParceiroComissionamentos !== null) {
					foreach ($this->collParceiroComissionamentos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collParceiroUsuarios !== null) {
					foreach ($this->collParceiroUsuarios as $referrerFK) {
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
		$criteria = new Criteria(ParceiroPeer::DATABASE_NAME);

		if ($this->isColumnModified(ParceiroPeer::ID)) $criteria->add(ParceiroPeer::ID, $this->id);
		if ($this->isColumnModified(ParceiroPeer::NOME)) $criteria->add(ParceiroPeer::NOME, $this->nome);
		if ($this->isColumnModified(ParceiroPeer::EMPRESA)) $criteria->add(ParceiroPeer::EMPRESA, $this->empresa);
		if ($this->isColumnModified(ParceiroPeer::CNPJ)) $criteria->add(ParceiroPeer::CNPJ, $this->cnpj);
		if ($this->isColumnModified(ParceiroPeer::ENDERECO)) $criteria->add(ParceiroPeer::ENDERECO, $this->endereco);
		if ($this->isColumnModified(ParceiroPeer::NUMERO)) $criteria->add(ParceiroPeer::NUMERO, $this->numero);
		if ($this->isColumnModified(ParceiroPeer::BAIRRO)) $criteria->add(ParceiroPeer::BAIRRO, $this->bairro);
		if ($this->isColumnModified(ParceiroPeer::CIDADE)) $criteria->add(ParceiroPeer::CIDADE, $this->cidade);
		if ($this->isColumnModified(ParceiroPeer::COMPLEMENTO)) $criteria->add(ParceiroPeer::COMPLEMENTO, $this->complemento);
		if ($this->isColumnModified(ParceiroPeer::EMAIL)) $criteria->add(ParceiroPeer::EMAIL, $this->email);
		if ($this->isColumnModified(ParceiroPeer::UF)) $criteria->add(ParceiroPeer::UF, $this->uf);
		if ($this->isColumnModified(ParceiroPeer::CEP)) $criteria->add(ParceiroPeer::CEP, $this->cep);
		if ($this->isColumnModified(ParceiroPeer::IBGE)) $criteria->add(ParceiroPeer::IBGE, $this->ibge);
		if ($this->isColumnModified(ParceiroPeer::FONE)) $criteria->add(ParceiroPeer::FONE, $this->fone);
		if ($this->isColumnModified(ParceiroPeer::CELULAR)) $criteria->add(ParceiroPeer::CELULAR, $this->celular);
		if ($this->isColumnModified(ParceiroPeer::LOCAL_ID)) $criteria->add(ParceiroPeer::LOCAL_ID, $this->local_id);
		if ($this->isColumnModified(ParceiroPeer::SITUACAO)) $criteria->add(ParceiroPeer::SITUACAO, $this->situacao);
		if ($this->isColumnModified(ParceiroPeer::DATA_CADASTRO)) $criteria->add(ParceiroPeer::DATA_CADASTRO, $this->data_cadastro);
		if ($this->isColumnModified(ParceiroPeer::BANCO)) $criteria->add(ParceiroPeer::BANCO, $this->banco);
		if ($this->isColumnModified(ParceiroPeer::CONTA_CORRENTE)) $criteria->add(ParceiroPeer::CONTA_CORRENTE, $this->conta_corrente);
		if ($this->isColumnModified(ParceiroPeer::AGENCIA)) $criteria->add(ParceiroPeer::AGENCIA, $this->agencia);
		if ($this->isColumnModified(ParceiroPeer::OPERACAO)) $criteria->add(ParceiroPeer::OPERACAO, $this->operacao);
		if ($this->isColumnModified(ParceiroPeer::COMISSAO_VENDA)) $criteria->add(ParceiroPeer::COMISSAO_VENDA, $this->comissao_venda);
		if ($this->isColumnModified(ParceiroPeer::COMISSAO_VALIDACAO)) $criteria->add(ParceiroPeer::COMISSAO_VALIDACAO, $this->comissao_validacao);
		if ($this->isColumnModified(ParceiroPeer::COMISSAO_VENDA_VALIDACAO)) $criteria->add(ParceiroPeer::COMISSAO_VENDA_VALIDACAO, $this->comissao_venda_validacao);
		if ($this->isColumnModified(ParceiroPeer::OBSERVACAO)) $criteria->add(ParceiroPeer::OBSERVACAO, $this->observacao);
		if ($this->isColumnModified(ParceiroPeer::TIPO_CANAL)) $criteria->add(ParceiroPeer::TIPO_CANAL, $this->tipo_canal);

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
		$criteria = new Criteria(ParceiroPeer::DATABASE_NAME);

		$criteria->add(ParceiroPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Parceiro (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNome($this->nome);

		$copyObj->setEmpresa($this->empresa);

		$copyObj->setCnpj($this->cnpj);

		$copyObj->setEndereco($this->endereco);

		$copyObj->setNumero($this->numero);

		$copyObj->setBairro($this->bairro);

		$copyObj->setCidade($this->cidade);

		$copyObj->setComplemento($this->complemento);

		$copyObj->setEmail($this->email);

		$copyObj->setUf($this->uf);

		$copyObj->setCep($this->cep);

		$copyObj->setIbge($this->ibge);

		$copyObj->setFone($this->fone);

		$copyObj->setCelular($this->celular);

		$copyObj->setLocalId($this->local_id);

		$copyObj->setSituacao($this->situacao);

		$copyObj->setDataCadastro($this->data_cadastro);

		$copyObj->setBanco($this->banco);

		$copyObj->setContaCorrente($this->conta_corrente);

		$copyObj->setAgencia($this->agencia);

		$copyObj->setOperacao($this->operacao);

		$copyObj->setComissaoVenda($this->comissao_venda);

		$copyObj->setComissaoValidacao($this->comissao_validacao);

		$copyObj->setComissaoVendaValidacao($this->comissao_venda_validacao);

		$copyObj->setObservacao($this->observacao);

		$copyObj->setTipoCanal($this->tipo_canal);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getParceiroComissionamentos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addParceiroComissionamento($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getParceiroUsuarios() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addParceiroUsuario($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCertificados() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCertificado($relObj->copy($deepCopy));
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
	 * @return     Parceiro Clone of current object.
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
	 * @return     ParceiroPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ParceiroPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Local object.
	 *
	 * @param      Local $v
	 * @return     Parceiro The current object (for fluent API support)
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
			$v->addParceiro($this);
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
			   $this->aLocal->addParceiros($this);
			 */
		}
		return $this->aLocal;
	}

	/**
	 * Clears out the collParceiroComissionamentos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addParceiroComissionamentos()
	 */
	public function clearParceiroComissionamentos()
	{
		$this->collParceiroComissionamentos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collParceiroComissionamentos collection (array).
	 *
	 * By default this just sets the collParceiroComissionamentos collection to an empty array (like clearcollParceiroComissionamentos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initParceiroComissionamentos()
	{
		$this->collParceiroComissionamentos = array();
	}

	/**
	 * Gets an array of ParceiroComissionamento objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Parceiro has previously been saved, it will retrieve
	 * related ParceiroComissionamentos from storage. If this Parceiro is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ParceiroComissionamento[]
	 * @throws     PropelException
	 */
	public function getParceiroComissionamentos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ParceiroPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collParceiroComissionamentos === null) {
			if ($this->isNew()) {
			   $this->collParceiroComissionamentos = array();
			} else {

				$criteria->add(ParceiroComissionamentoPeer::PARCEIRO_ID, $this->id);

				ParceiroComissionamentoPeer::addSelectColumns($criteria);
				$this->collParceiroComissionamentos = ParceiroComissionamentoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ParceiroComissionamentoPeer::PARCEIRO_ID, $this->id);

				ParceiroComissionamentoPeer::addSelectColumns($criteria);
				if (!isset($this->lastParceiroComissionamentoCriteria) || !$this->lastParceiroComissionamentoCriteria->equals($criteria)) {
					$this->collParceiroComissionamentos = ParceiroComissionamentoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastParceiroComissionamentoCriteria = $criteria;
		return $this->collParceiroComissionamentos;
	}

	/**
	 * Returns the number of related ParceiroComissionamento objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ParceiroComissionamento objects.
	 * @throws     PropelException
	 */
	public function countParceiroComissionamentos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ParceiroPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collParceiroComissionamentos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ParceiroComissionamentoPeer::PARCEIRO_ID, $this->id);

				$count = ParceiroComissionamentoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ParceiroComissionamentoPeer::PARCEIRO_ID, $this->id);

				if (!isset($this->lastParceiroComissionamentoCriteria) || !$this->lastParceiroComissionamentoCriteria->equals($criteria)) {
					$count = ParceiroComissionamentoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collParceiroComissionamentos);
				}
			} else {
				$count = count($this->collParceiroComissionamentos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a ParceiroComissionamento object to this object
	 * through the ParceiroComissionamento foreign key attribute.
	 *
	 * @param      ParceiroComissionamento $l ParceiroComissionamento
	 * @return     void
	 * @throws     PropelException
	 */
	public function addParceiroComissionamento(ParceiroComissionamento $l)
	{
		if ($this->collParceiroComissionamentos === null) {
			$this->initParceiroComissionamentos();
		}
		if (!in_array($l, $this->collParceiroComissionamentos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collParceiroComissionamentos, $l);
			$l->setParceiro($this);
		}
	}

	/**
	 * Clears out the collParceiroUsuarios collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addParceiroUsuarios()
	 */
	public function clearParceiroUsuarios()
	{
		$this->collParceiroUsuarios = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collParceiroUsuarios collection (array).
	 *
	 * By default this just sets the collParceiroUsuarios collection to an empty array (like clearcollParceiroUsuarios());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initParceiroUsuarios()
	{
		$this->collParceiroUsuarios = array();
	}

	/**
	 * Gets an array of ParceiroUsuario objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Parceiro has previously been saved, it will retrieve
	 * related ParceiroUsuarios from storage. If this Parceiro is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ParceiroUsuario[]
	 * @throws     PropelException
	 */
	public function getParceiroUsuarios($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ParceiroPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collParceiroUsuarios === null) {
			if ($this->isNew()) {
			   $this->collParceiroUsuarios = array();
			} else {

				$criteria->add(ParceiroUsuarioPeer::PARCEIRO_ID, $this->id);

				ParceiroUsuarioPeer::addSelectColumns($criteria);
				$this->collParceiroUsuarios = ParceiroUsuarioPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ParceiroUsuarioPeer::PARCEIRO_ID, $this->id);

				ParceiroUsuarioPeer::addSelectColumns($criteria);
				if (!isset($this->lastParceiroUsuarioCriteria) || !$this->lastParceiroUsuarioCriteria->equals($criteria)) {
					$this->collParceiroUsuarios = ParceiroUsuarioPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastParceiroUsuarioCriteria = $criteria;
		return $this->collParceiroUsuarios;
	}

	/**
	 * Returns the number of related ParceiroUsuario objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ParceiroUsuario objects.
	 * @throws     PropelException
	 */
	public function countParceiroUsuarios(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ParceiroPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collParceiroUsuarios === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ParceiroUsuarioPeer::PARCEIRO_ID, $this->id);

				$count = ParceiroUsuarioPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ParceiroUsuarioPeer::PARCEIRO_ID, $this->id);

				if (!isset($this->lastParceiroUsuarioCriteria) || !$this->lastParceiroUsuarioCriteria->equals($criteria)) {
					$count = ParceiroUsuarioPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collParceiroUsuarios);
				}
			} else {
				$count = count($this->collParceiroUsuarios);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a ParceiroUsuario object to this object
	 * through the ParceiroUsuario foreign key attribute.
	 *
	 * @param      ParceiroUsuario $l ParceiroUsuario
	 * @return     void
	 * @throws     PropelException
	 */
	public function addParceiroUsuario(ParceiroUsuario $l)
	{
		if ($this->collParceiroUsuarios === null) {
			$this->initParceiroUsuarios();
		}
		if (!in_array($l, $this->collParceiroUsuarios, true)) { // only add it if the **same** object is not already associated
			array_push($this->collParceiroUsuarios, $l);
			$l->setParceiro($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Parceiro is new, it will return
	 * an empty collection; or if this Parceiro has previously
	 * been saved, it will retrieve related ParceiroUsuarios from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Parceiro.
	 */
	public function getParceiroUsuariosJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ParceiroPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collParceiroUsuarios === null) {
			if ($this->isNew()) {
				$this->collParceiroUsuarios = array();
			} else {

				$criteria->add(ParceiroUsuarioPeer::PARCEIRO_ID, $this->id);

				$this->collParceiroUsuarios = ParceiroUsuarioPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ParceiroUsuarioPeer::PARCEIRO_ID, $this->id);

			if (!isset($this->lastParceiroUsuarioCriteria) || !$this->lastParceiroUsuarioCriteria->equals($criteria)) {
				$this->collParceiroUsuarios = ParceiroUsuarioPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		}
		$this->lastParceiroUsuarioCriteria = $criteria;

		return $this->collParceiroUsuarios;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Parceiro is new, it will return
	 * an empty collection; or if this Parceiro has previously
	 * been saved, it will retrieve related ParceiroUsuarios from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Parceiro.
	 */
	public function getParceiroUsuariosJoinParceiroUsuarioTipo($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ParceiroPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collParceiroUsuarios === null) {
			if ($this->isNew()) {
				$this->collParceiroUsuarios = array();
			} else {

				$criteria->add(ParceiroUsuarioPeer::PARCEIRO_ID, $this->id);

				$this->collParceiroUsuarios = ParceiroUsuarioPeer::doSelectJoinParceiroUsuarioTipo($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ParceiroUsuarioPeer::PARCEIRO_ID, $this->id);

			if (!isset($this->lastParceiroUsuarioCriteria) || !$this->lastParceiroUsuarioCriteria->equals($criteria)) {
				$this->collParceiroUsuarios = ParceiroUsuarioPeer::doSelectJoinParceiroUsuarioTipo($criteria, $con, $join_behavior);
			}
		}
		$this->lastParceiroUsuarioCriteria = $criteria;

		return $this->collParceiroUsuarios;
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
	 * Otherwise if this Parceiro has previously been saved, it will retrieve
	 * related Certificados from storage. If this Parceiro is new, it will return
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
			$criteria = new Criteria(ParceiroPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
			   $this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::PARCEIRO_ID, $this->id);

				CertificadoPeer::addSelectColumns($criteria);
				$this->collCertificados = CertificadoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(CertificadoPeer::PARCEIRO_ID, $this->id);

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
			$criteria = new Criteria(ParceiroPeer::DATABASE_NAME);
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

				$criteria->add(CertificadoPeer::PARCEIRO_ID, $this->id);

				$count = CertificadoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(CertificadoPeer::PARCEIRO_ID, $this->id);

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
			$l->setParceiro($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Parceiro is new, it will return
	 * an empty collection; or if this Parceiro has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Parceiro.
	 */
	public function getCertificadosJoinSituacao($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ParceiroPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::PARCEIRO_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinSituacao($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::PARCEIRO_ID, $this->id);

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
	 * Otherwise if this Parceiro is new, it will return
	 * an empty collection; or if this Parceiro has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Parceiro.
	 */
	public function getCertificadosJoinContador($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ParceiroPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::PARCEIRO_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinContador($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::PARCEIRO_ID, $this->id);

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
	 * Otherwise if this Parceiro is new, it will return
	 * an empty collection; or if this Parceiro has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Parceiro.
	 */
	public function getCertificadosJoinLocal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ParceiroPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::PARCEIRO_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinLocal($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::PARCEIRO_ID, $this->id);

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
	 * Otherwise if this Parceiro is new, it will return
	 * an empty collection; or if this Parceiro has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Parceiro.
	 */
	public function getCertificadosJoinFormaPagamento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ParceiroPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::PARCEIRO_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinFormaPagamento($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::PARCEIRO_ID, $this->id);

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
	 * Otherwise if this Parceiro is new, it will return
	 * an empty collection; or if this Parceiro has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Parceiro.
	 */
	public function getCertificadosJoinProduto($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ParceiroPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::PARCEIRO_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinProduto($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::PARCEIRO_ID, $this->id);

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
	 * Otherwise if this Parceiro is new, it will return
	 * an empty collection; or if this Parceiro has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Parceiro.
	 */
	public function getCertificadosJoinCliente($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ParceiroPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::PARCEIRO_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinCliente($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::PARCEIRO_ID, $this->id);

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
	 * Otherwise if this Parceiro is new, it will return
	 * an empty collection; or if this Parceiro has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Parceiro.
	 */
	public function getCertificadosJoinUsuarioRelatedByUsuarioId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ParceiroPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::PARCEIRO_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinUsuarioRelatedByUsuarioId($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::PARCEIRO_ID, $this->id);

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
	 * Otherwise if this Parceiro is new, it will return
	 * an empty collection; or if this Parceiro has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Parceiro.
	 */
	public function getCertificadosJoinUsuarioRelatedByUsuarioValidouId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ParceiroPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::PARCEIRO_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinUsuarioRelatedByUsuarioValidouId($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::PARCEIRO_ID, $this->id);

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
	 * Otherwise if this Parceiro is new, it will return
	 * an empty collection; or if this Parceiro has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Parceiro.
	 */
	public function getCertificadosJoinCertificadoRelatedByCertificadoRenovado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ParceiroPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::PARCEIRO_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinCertificadoRelatedByCertificadoRenovado($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::PARCEIRO_ID, $this->id);

			if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
				$this->collCertificados = CertificadoPeer::doSelectJoinCertificadoRelatedByCertificadoRenovado($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoCriteria = $criteria;

		return $this->collCertificados;
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
			if ($this->collParceiroComissionamentos) {
				foreach ((array) $this->collParceiroComissionamentos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collParceiroUsuarios) {
				foreach ((array) $this->collParceiroUsuarios as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCertificados) {
				foreach ((array) $this->collCertificados as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collParceiroComissionamentos = null;
		$this->collParceiroUsuarios = null;
		$this->collCertificados = null;
			$this->aLocal = null;
	}

} // BaseParceiro
