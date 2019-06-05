<?php

/**
 * Base class that represents a row from the 'responsavel' table.
 *
 * 
 *
 * @package    pacoteResponsavel.om
 */
abstract class BaseResponsavel extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ResponsavelPeer
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
	 * The value for the cpf field.
	 * @var        string
	 */
	protected $cpf;

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
	 * The value for the apelido field.
	 * @var        string
	 */
	protected $apelido;

	/**
	 * The value for the nascimento field.
	 * @var        string
	 */
	protected $nascimento;

	/**
	 * The value for the email field.
	 * @var        string
	 */
	protected $email;

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
	 * @var        array Cliente[] Collection to store aggregation of Cliente objects.
	 */
	protected $collClientes;

	/**
	 * @var        Criteria The criteria used to select the current contents of collClientes.
	 */
	private $lastClienteCriteria = null;

	/**
	 * @var        array Contador[] Collection to store aggregation of Contador objects.
	 */
	protected $collContadors;

	/**
	 * @var        Criteria The criteria used to select the current contents of collContadors.
	 */
	private $lastContadorCriteria = null;

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
	 * Get the [cpf] column value.
	 * 
	 * @return     string
	 */
	public function getCpf()
	{
		return $this->cpf;
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
	 * Get the [apelido] column value.
	 * 
	 * @return     string
	 */
	public function getApelido()
	{
		return $this->apelido;
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
	 * Get the [email] column value.
	 * 
	 * @return     string
	 */
	public function getEmail()
	{
		return $this->email;
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
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Responsavel The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ResponsavelPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [nome] column.
	 * 
	 * @param      string $v new value
	 * @return     Responsavel The current object (for fluent API support)
	 */
	public function setNome($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome !== $v) {
			$this->nome = $v;
			$this->modifiedColumns[] = ResponsavelPeer::NOME;
		}

		return $this;
	} // setNome()

	/**
	 * Set the value of [endereco] column.
	 * 
	 * @param      string $v new value
	 * @return     Responsavel The current object (for fluent API support)
	 */
	public function setEndereco($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->endereco !== $v) {
			$this->endereco = $v;
			$this->modifiedColumns[] = ResponsavelPeer::ENDERECO;
		}

		return $this;
	} // setEndereco()

	/**
	 * Set the value of [numero] column.
	 * 
	 * @param      string $v new value
	 * @return     Responsavel The current object (for fluent API support)
	 */
	public function setNumero($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->numero !== $v) {
			$this->numero = $v;
			$this->modifiedColumns[] = ResponsavelPeer::NUMERO;
		}

		return $this;
	} // setNumero()

	/**
	 * Set the value of [bairro] column.
	 * 
	 * @param      string $v new value
	 * @return     Responsavel The current object (for fluent API support)
	 */
	public function setBairro($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->bairro !== $v) {
			$this->bairro = $v;
			$this->modifiedColumns[] = ResponsavelPeer::BAIRRO;
		}

		return $this;
	} // setBairro()

	/**
	 * Set the value of [complemento] column.
	 * 
	 * @param      string $v new value
	 * @return     Responsavel The current object (for fluent API support)
	 */
	public function setComplemento($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->complemento !== $v) {
			$this->complemento = $v;
			$this->modifiedColumns[] = ResponsavelPeer::COMPLEMENTO;
		}

		return $this;
	} // setComplemento()

	/**
	 * Set the value of [cidade] column.
	 * 
	 * @param      string $v new value
	 * @return     Responsavel The current object (for fluent API support)
	 */
	public function setCidade($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cidade !== $v) {
			$this->cidade = $v;
			$this->modifiedColumns[] = ResponsavelPeer::CIDADE;
		}

		return $this;
	} // setCidade()

	/**
	 * Set the value of [uf] column.
	 * 
	 * @param      string $v new value
	 * @return     Responsavel The current object (for fluent API support)
	 */
	public function setUf($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->uf !== $v) {
			$this->uf = $v;
			$this->modifiedColumns[] = ResponsavelPeer::UF;
		}

		return $this;
	} // setUf()

	/**
	 * Set the value of [cep] column.
	 * 
	 * @param      string $v new value
	 * @return     Responsavel The current object (for fluent API support)
	 */
	public function setCep($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cep !== $v) {
			$this->cep = $v;
			$this->modifiedColumns[] = ResponsavelPeer::CEP;
		}

		return $this;
	} // setCep()

	/**
	 * Set the value of [cpf] column.
	 * 
	 * @param      string $v new value
	 * @return     Responsavel The current object (for fluent API support)
	 */
	public function setCpf($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cpf !== $v) {
			$this->cpf = $v;
			$this->modifiedColumns[] = ResponsavelPeer::CPF;
		}

		return $this;
	} // setCpf()

	/**
	 * Set the value of [fone1] column.
	 * 
	 * @param      string $v new value
	 * @return     Responsavel The current object (for fluent API support)
	 */
	public function setFone1($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->fone1 !== $v) {
			$this->fone1 = $v;
			$this->modifiedColumns[] = ResponsavelPeer::FONE1;
		}

		return $this;
	} // setFone1()

	/**
	 * Set the value of [fone2] column.
	 * 
	 * @param      string $v new value
	 * @return     Responsavel The current object (for fluent API support)
	 */
	public function setFone2($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->fone2 !== $v) {
			$this->fone2 = $v;
			$this->modifiedColumns[] = ResponsavelPeer::FONE2;
		}

		return $this;
	} // setFone2()

	/**
	 * Set the value of [celular] column.
	 * 
	 * @param      string $v new value
	 * @return     Responsavel The current object (for fluent API support)
	 */
	public function setCelular($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->celular !== $v) {
			$this->celular = $v;
			$this->modifiedColumns[] = ResponsavelPeer::CELULAR;
		}

		return $this;
	} // setCelular()

	/**
	 * Set the value of [apelido] column.
	 * 
	 * @param      string $v new value
	 * @return     Responsavel The current object (for fluent API support)
	 */
	public function setApelido($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->apelido !== $v) {
			$this->apelido = $v;
			$this->modifiedColumns[] = ResponsavelPeer::APELIDO;
		}

		return $this;
	} // setApelido()

	/**
	 * Sets the value of [nascimento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Responsavel The current object (for fluent API support)
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
				$this->modifiedColumns[] = ResponsavelPeer::NASCIMENTO;
			}
		} // if either are not null

		return $this;
	} // setNascimento()

	/**
	 * Set the value of [email] column.
	 * 
	 * @param      string $v new value
	 * @return     Responsavel The current object (for fluent API support)
	 */
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = ResponsavelPeer::EMAIL;
		}

		return $this;
	} // setEmail()

	/**
	 * Set the value of [cargo] column.
	 * 
	 * @param      string $v new value
	 * @return     Responsavel The current object (for fluent API support)
	 */
	public function setCargo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cargo !== $v) {
			$this->cargo = $v;
			$this->modifiedColumns[] = ResponsavelPeer::CARGO;
		}

		return $this;
	} // setCargo()

	/**
	 * Set the value of [rg] column.
	 * 
	 * @param      string $v new value
	 * @return     Responsavel The current object (for fluent API support)
	 */
	public function setRg($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->rg !== $v) {
			$this->rg = $v;
			$this->modifiedColumns[] = ResponsavelPeer::RG;
		}

		return $this;
	} // setRg()

	/**
	 * Set the value of [nis] column.
	 * 
	 * @param      string $v new value
	 * @return     Responsavel The current object (for fluent API support)
	 */
	public function setNis($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nis !== $v) {
			$this->nis = $v;
			$this->modifiedColumns[] = ResponsavelPeer::NIS;
		}

		return $this;
	} // setNis()

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
			$this->endereco = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->numero = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->bairro = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->complemento = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->cidade = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->uf = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->cep = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->cpf = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->fone1 = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->fone2 = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->celular = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->apelido = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->nascimento = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->email = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
			$this->cargo = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
			$this->rg = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
			$this->nis = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 19; // 19 = ResponsavelPeer::NUM_COLUMNS - ResponsavelPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Responsavel object", $e);
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
			$con = Propel::getConnection(ResponsavelPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ResponsavelPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collClientes = null;
			$this->lastClienteCriteria = null;

			$this->collContadors = null;
			$this->lastContadorCriteria = null;

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
			$con = Propel::getConnection(ResponsavelPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				ResponsavelPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ResponsavelPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				ResponsavelPeer::addInstanceToPool($this);
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

			if ($this->isNew() ) {
				$this->modifiedColumns[] = ResponsavelPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ResponsavelPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += ResponsavelPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collClientes !== null) {
				foreach ($this->collClientes as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collContadors !== null) {
				foreach ($this->collContadors as $referrerFK) {
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


			if (($retval = ResponsavelPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collClientes !== null) {
					foreach ($this->collClientes as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collContadors !== null) {
					foreach ($this->collContadors as $referrerFK) {
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
		$criteria = new Criteria(ResponsavelPeer::DATABASE_NAME);

		if ($this->isColumnModified(ResponsavelPeer::ID)) $criteria->add(ResponsavelPeer::ID, $this->id);
		if ($this->isColumnModified(ResponsavelPeer::NOME)) $criteria->add(ResponsavelPeer::NOME, $this->nome);
		if ($this->isColumnModified(ResponsavelPeer::ENDERECO)) $criteria->add(ResponsavelPeer::ENDERECO, $this->endereco);
		if ($this->isColumnModified(ResponsavelPeer::NUMERO)) $criteria->add(ResponsavelPeer::NUMERO, $this->numero);
		if ($this->isColumnModified(ResponsavelPeer::BAIRRO)) $criteria->add(ResponsavelPeer::BAIRRO, $this->bairro);
		if ($this->isColumnModified(ResponsavelPeer::COMPLEMENTO)) $criteria->add(ResponsavelPeer::COMPLEMENTO, $this->complemento);
		if ($this->isColumnModified(ResponsavelPeer::CIDADE)) $criteria->add(ResponsavelPeer::CIDADE, $this->cidade);
		if ($this->isColumnModified(ResponsavelPeer::UF)) $criteria->add(ResponsavelPeer::UF, $this->uf);
		if ($this->isColumnModified(ResponsavelPeer::CEP)) $criteria->add(ResponsavelPeer::CEP, $this->cep);
		if ($this->isColumnModified(ResponsavelPeer::CPF)) $criteria->add(ResponsavelPeer::CPF, $this->cpf);
		if ($this->isColumnModified(ResponsavelPeer::FONE1)) $criteria->add(ResponsavelPeer::FONE1, $this->fone1);
		if ($this->isColumnModified(ResponsavelPeer::FONE2)) $criteria->add(ResponsavelPeer::FONE2, $this->fone2);
		if ($this->isColumnModified(ResponsavelPeer::CELULAR)) $criteria->add(ResponsavelPeer::CELULAR, $this->celular);
		if ($this->isColumnModified(ResponsavelPeer::APELIDO)) $criteria->add(ResponsavelPeer::APELIDO, $this->apelido);
		if ($this->isColumnModified(ResponsavelPeer::NASCIMENTO)) $criteria->add(ResponsavelPeer::NASCIMENTO, $this->nascimento);
		if ($this->isColumnModified(ResponsavelPeer::EMAIL)) $criteria->add(ResponsavelPeer::EMAIL, $this->email);
		if ($this->isColumnModified(ResponsavelPeer::CARGO)) $criteria->add(ResponsavelPeer::CARGO, $this->cargo);
		if ($this->isColumnModified(ResponsavelPeer::RG)) $criteria->add(ResponsavelPeer::RG, $this->rg);
		if ($this->isColumnModified(ResponsavelPeer::NIS)) $criteria->add(ResponsavelPeer::NIS, $this->nis);

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
		$criteria = new Criteria(ResponsavelPeer::DATABASE_NAME);

		$criteria->add(ResponsavelPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Responsavel (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNome($this->nome);

		$copyObj->setEndereco($this->endereco);

		$copyObj->setNumero($this->numero);

		$copyObj->setBairro($this->bairro);

		$copyObj->setComplemento($this->complemento);

		$copyObj->setCidade($this->cidade);

		$copyObj->setUf($this->uf);

		$copyObj->setCep($this->cep);

		$copyObj->setCpf($this->cpf);

		$copyObj->setFone1($this->fone1);

		$copyObj->setFone2($this->fone2);

		$copyObj->setCelular($this->celular);

		$copyObj->setApelido($this->apelido);

		$copyObj->setNascimento($this->nascimento);

		$copyObj->setEmail($this->email);

		$copyObj->setCargo($this->cargo);

		$copyObj->setRg($this->rg);

		$copyObj->setNis($this->nis);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getClientes() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCliente($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getContadors() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addContador($relObj->copy($deepCopy));
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
	 * @return     Responsavel Clone of current object.
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
	 * @return     ResponsavelPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ResponsavelPeer();
		}
		return self::$peer;
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
	 * Otherwise if this Responsavel has previously been saved, it will retrieve
	 * related Clientes from storage. If this Responsavel is new, it will return
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
			$criteria = new Criteria(ResponsavelPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientes === null) {
			if ($this->isNew()) {
			   $this->collClientes = array();
			} else {

				$criteria->add(ClientePeer::RESPONSAVEL_ID, $this->id);

				ClientePeer::addSelectColumns($criteria);
				$this->collClientes = ClientePeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ClientePeer::RESPONSAVEL_ID, $this->id);

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
			$criteria = new Criteria(ResponsavelPeer::DATABASE_NAME);
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

				$criteria->add(ClientePeer::RESPONSAVEL_ID, $this->id);

				$count = ClientePeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ClientePeer::RESPONSAVEL_ID, $this->id);

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
			$l->setResponsavel($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Responsavel is new, it will return
	 * an empty collection; or if this Responsavel has previously
	 * been saved, it will retrieve related Clientes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Responsavel.
	 */
	public function getClientesJoinLocal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ResponsavelPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientes === null) {
			if ($this->isNew()) {
				$this->collClientes = array();
			} else {

				$criteria->add(ClientePeer::RESPONSAVEL_ID, $this->id);

				$this->collClientes = ClientePeer::doSelectJoinLocal($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ClientePeer::RESPONSAVEL_ID, $this->id);

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
	 * Otherwise if this Responsavel is new, it will return
	 * an empty collection; or if this Responsavel has previously
	 * been saved, it will retrieve related Clientes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Responsavel.
	 */
	public function getClientesJoinContador($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ResponsavelPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientes === null) {
			if ($this->isNew()) {
				$this->collClientes = array();
			} else {

				$criteria->add(ClientePeer::RESPONSAVEL_ID, $this->id);

				$this->collClientes = ClientePeer::doSelectJoinContador($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ClientePeer::RESPONSAVEL_ID, $this->id);

			if (!isset($this->lastClienteCriteria) || !$this->lastClienteCriteria->equals($criteria)) {
				$this->collClientes = ClientePeer::doSelectJoinContador($criteria, $con, $join_behavior);
			}
		}
		$this->lastClienteCriteria = $criteria;

		return $this->collClientes;
	}

	/**
	 * Clears out the collContadors collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addContadors()
	 */
	public function clearContadors()
	{
		$this->collContadors = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collContadors collection (array).
	 *
	 * By default this just sets the collContadors collection to an empty array (like clearcollContadors());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initContadors()
	{
		$this->collContadors = array();
	}

	/**
	 * Gets an array of Contador objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Responsavel has previously been saved, it will retrieve
	 * related Contadors from storage. If this Responsavel is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Contador[]
	 * @throws     PropelException
	 */
	public function getContadors($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ResponsavelPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContadors === null) {
			if ($this->isNew()) {
			   $this->collContadors = array();
			} else {

				$criteria->add(ContadorPeer::RESPONSAVEL_ID, $this->id);

				ContadorPeer::addSelectColumns($criteria);
				$this->collContadors = ContadorPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ContadorPeer::RESPONSAVEL_ID, $this->id);

				ContadorPeer::addSelectColumns($criteria);
				if (!isset($this->lastContadorCriteria) || !$this->lastContadorCriteria->equals($criteria)) {
					$this->collContadors = ContadorPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastContadorCriteria = $criteria;
		return $this->collContadors;
	}

	/**
	 * Returns the number of related Contador objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Contador objects.
	 * @throws     PropelException
	 */
	public function countContadors(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ResponsavelPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collContadors === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ContadorPeer::RESPONSAVEL_ID, $this->id);

				$count = ContadorPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ContadorPeer::RESPONSAVEL_ID, $this->id);

				if (!isset($this->lastContadorCriteria) || !$this->lastContadorCriteria->equals($criteria)) {
					$count = ContadorPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collContadors);
				}
			} else {
				$count = count($this->collContadors);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a Contador object to this object
	 * through the Contador foreign key attribute.
	 *
	 * @param      Contador $l Contador
	 * @return     void
	 * @throws     PropelException
	 */
	public function addContador(Contador $l)
	{
		if ($this->collContadors === null) {
			$this->initContadors();
		}
		if (!in_array($l, $this->collContadors, true)) { // only add it if the **same** object is not already associated
			array_push($this->collContadors, $l);
			$l->setResponsavel($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Responsavel is new, it will return
	 * an empty collection; or if this Responsavel has previously
	 * been saved, it will retrieve related Contadors from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Responsavel.
	 */
	public function getContadorsJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ResponsavelPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContadors === null) {
			if ($this->isNew()) {
				$this->collContadors = array();
			} else {

				$criteria->add(ContadorPeer::RESPONSAVEL_ID, $this->id);

				$this->collContadors = ContadorPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContadorPeer::RESPONSAVEL_ID, $this->id);

			if (!isset($this->lastContadorCriteria) || !$this->lastContadorCriteria->equals($criteria)) {
				$this->collContadors = ContadorPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		}
		$this->lastContadorCriteria = $criteria;

		return $this->collContadors;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Responsavel is new, it will return
	 * an empty collection; or if this Responsavel has previously
	 * been saved, it will retrieve related Contadors from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Responsavel.
	 */
	public function getContadorsJoinLocal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ResponsavelPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContadors === null) {
			if ($this->isNew()) {
				$this->collContadors = array();
			} else {

				$criteria->add(ContadorPeer::RESPONSAVEL_ID, $this->id);

				$this->collContadors = ContadorPeer::doSelectJoinLocal($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContadorPeer::RESPONSAVEL_ID, $this->id);

			if (!isset($this->lastContadorCriteria) || !$this->lastContadorCriteria->equals($criteria)) {
				$this->collContadors = ContadorPeer::doSelectJoinLocal($criteria, $con, $join_behavior);
			}
		}
		$this->lastContadorCriteria = $criteria;

		return $this->collContadors;
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
			if ($this->collClientes) {
				foreach ((array) $this->collClientes as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collContadors) {
				foreach ((array) $this->collContadors as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collClientes = null;
		$this->collContadors = null;
	}

} // BaseResponsavel
