<?php

/**
 * Base class that represents a row from the 'contato' table.
 *
 * 
 *
 * @package    pacoteContato.om
 */
abstract class BaseContato extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ContatoPeer
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
	 * The value for the email field.
	 * @var        string
	 */
	protected $email;

	/**
	 * The value for the nascimento field.
	 * @var        string
	 */
	protected $nascimento;

	/**
	 * The value for the sexo field.
	 * @var        string
	 */
	protected $sexo;

	/**
	 * The value for the endereco field.
	 * @var        string
	 */
	protected $endereco;

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
	 * The value for the fone1 field.
	 * @var        string
	 */
	protected $fone1;

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
	 * The value for the cargo field.
	 * @var        string
	 */
	protected $cargo;

	/**
	 * @var        Local
	 */
	protected $aLocal;

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
	 * Get the [email] column value.
	 * 
	 * @return     string
	 */
	public function getEmail()
	{
		return $this->email;
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
	 * Get the [sexo] column value.
	 * 
	 * @return     string
	 */
	public function getSexo()
	{
		return $this->sexo;
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
	 * Get the [fone1] column value.
	 * 
	 * @return     string
	 */
	public function getFone1()
	{
		return $this->fone1;
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
	 * Get the [cargo] column value.
	 * 
	 * @return     string
	 */
	public function getCargo()
	{
		return $this->cargo;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Contato The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ContatoPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [local_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Contato The current object (for fluent API support)
	 */
	public function setLocalId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->local_id !== $v) {
			$this->local_id = $v;
			$this->modifiedColumns[] = ContatoPeer::LOCAL_ID;
		}

		if ($this->aLocal !== null && $this->aLocal->getId() !== $v) {
			$this->aLocal = null;
		}

		return $this;
	} // setLocalId()

	/**
	 * Set the value of [nome] column.
	 * 
	 * @param      string $v new value
	 * @return     Contato The current object (for fluent API support)
	 */
	public function setNome($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome !== $v) {
			$this->nome = $v;
			$this->modifiedColumns[] = ContatoPeer::NOME;
		}

		return $this;
	} // setNome()

	/**
	 * Set the value of [empresa] column.
	 * 
	 * @param      string $v new value
	 * @return     Contato The current object (for fluent API support)
	 */
	public function setEmpresa($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->empresa !== $v) {
			$this->empresa = $v;
			$this->modifiedColumns[] = ContatoPeer::EMPRESA;
		}

		return $this;
	} // setEmpresa()

	/**
	 * Set the value of [email] column.
	 * 
	 * @param      string $v new value
	 * @return     Contato The current object (for fluent API support)
	 */
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = ContatoPeer::EMAIL;
		}

		return $this;
	} // setEmail()

	/**
	 * Sets the value of [nascimento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Contato The current object (for fluent API support)
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
				$this->modifiedColumns[] = ContatoPeer::NASCIMENTO;
			}
		} // if either are not null

		return $this;
	} // setNascimento()

	/**
	 * Set the value of [sexo] column.
	 * 
	 * @param      string $v new value
	 * @return     Contato The current object (for fluent API support)
	 */
	public function setSexo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->sexo !== $v) {
			$this->sexo = $v;
			$this->modifiedColumns[] = ContatoPeer::SEXO;
		}

		return $this;
	} // setSexo()

	/**
	 * Set the value of [endereco] column.
	 * 
	 * @param      string $v new value
	 * @return     Contato The current object (for fluent API support)
	 */
	public function setEndereco($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->endereco !== $v) {
			$this->endereco = $v;
			$this->modifiedColumns[] = ContatoPeer::ENDERECO;
		}

		return $this;
	} // setEndereco()

	/**
	 * Set the value of [bairro] column.
	 * 
	 * @param      string $v new value
	 * @return     Contato The current object (for fluent API support)
	 */
	public function setBairro($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->bairro !== $v) {
			$this->bairro = $v;
			$this->modifiedColumns[] = ContatoPeer::BAIRRO;
		}

		return $this;
	} // setBairro()

	/**
	 * Set the value of [complemento] column.
	 * 
	 * @param      string $v new value
	 * @return     Contato The current object (for fluent API support)
	 */
	public function setComplemento($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->complemento !== $v) {
			$this->complemento = $v;
			$this->modifiedColumns[] = ContatoPeer::COMPLEMENTO;
		}

		return $this;
	} // setComplemento()

	/**
	 * Set the value of [cidade] column.
	 * 
	 * @param      string $v new value
	 * @return     Contato The current object (for fluent API support)
	 */
	public function setCidade($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cidade !== $v) {
			$this->cidade = $v;
			$this->modifiedColumns[] = ContatoPeer::CIDADE;
		}

		return $this;
	} // setCidade()

	/**
	 * Set the value of [uf] column.
	 * 
	 * @param      string $v new value
	 * @return     Contato The current object (for fluent API support)
	 */
	public function setUf($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->uf !== $v) {
			$this->uf = $v;
			$this->modifiedColumns[] = ContatoPeer::UF;
		}

		return $this;
	} // setUf()

	/**
	 * Set the value of [cep] column.
	 * 
	 * @param      string $v new value
	 * @return     Contato The current object (for fluent API support)
	 */
	public function setCep($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cep !== $v) {
			$this->cep = $v;
			$this->modifiedColumns[] = ContatoPeer::CEP;
		}

		return $this;
	} // setCep()

	/**
	 * Set the value of [fone1] column.
	 * 
	 * @param      string $v new value
	 * @return     Contato The current object (for fluent API support)
	 */
	public function setFone1($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->fone1 !== $v) {
			$this->fone1 = $v;
			$this->modifiedColumns[] = ContatoPeer::FONE1;
		}

		return $this;
	} // setFone1()

	/**
	 * Set the value of [celular] column.
	 * 
	 * @param      string $v new value
	 * @return     Contato The current object (for fluent API support)
	 */
	public function setCelular($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->celular !== $v) {
			$this->celular = $v;
			$this->modifiedColumns[] = ContatoPeer::CELULAR;
		}

		return $this;
	} // setCelular()

	/**
	 * Set the value of [cpf_cnpj] column.
	 * 
	 * @param      string $v new value
	 * @return     Contato The current object (for fluent API support)
	 */
	public function setCpfCnpj($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cpf_cnpj !== $v) {
			$this->cpf_cnpj = $v;
			$this->modifiedColumns[] = ContatoPeer::CPF_CNPJ;
		}

		return $this;
	} // setCpfCnpj()

	/**
	 * Set the value of [situacao] column.
	 * 
	 * @param      int $v new value
	 * @return     Contato The current object (for fluent API support)
	 */
	public function setSituacao($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->situacao !== $v) {
			$this->situacao = $v;
			$this->modifiedColumns[] = ContatoPeer::SITUACAO;
		}

		return $this;
	} // setSituacao()

	/**
	 * Set the value of [cargo] column.
	 * 
	 * @param      string $v new value
	 * @return     Contato The current object (for fluent API support)
	 */
	public function setCargo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cargo !== $v) {
			$this->cargo = $v;
			$this->modifiedColumns[] = ContatoPeer::CARGO;
		}

		return $this;
	} // setCargo()

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
			$this->nome = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->empresa = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->email = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->nascimento = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->sexo = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->endereco = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->bairro = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->complemento = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->cidade = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->uf = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->cep = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->fone1 = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->celular = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->cpf_cnpj = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
			$this->situacao = ($row[$startcol + 16] !== null) ? (int) $row[$startcol + 16] : null;
			$this->cargo = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 18; // 18 = ContatoPeer::NUM_COLUMNS - ContatoPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Contato object", $e);
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
			$con = Propel::getConnection(ContatoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ContatoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aLocal = null;
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
			$con = Propel::getConnection(ContatoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				ContatoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ContatoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				ContatoPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = ContatoPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ContatoPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += ContatoPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
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


			if (($retval = ContatoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$criteria = new Criteria(ContatoPeer::DATABASE_NAME);

		if ($this->isColumnModified(ContatoPeer::ID)) $criteria->add(ContatoPeer::ID, $this->id);
		if ($this->isColumnModified(ContatoPeer::LOCAL_ID)) $criteria->add(ContatoPeer::LOCAL_ID, $this->local_id);
		if ($this->isColumnModified(ContatoPeer::NOME)) $criteria->add(ContatoPeer::NOME, $this->nome);
		if ($this->isColumnModified(ContatoPeer::EMPRESA)) $criteria->add(ContatoPeer::EMPRESA, $this->empresa);
		if ($this->isColumnModified(ContatoPeer::EMAIL)) $criteria->add(ContatoPeer::EMAIL, $this->email);
		if ($this->isColumnModified(ContatoPeer::NASCIMENTO)) $criteria->add(ContatoPeer::NASCIMENTO, $this->nascimento);
		if ($this->isColumnModified(ContatoPeer::SEXO)) $criteria->add(ContatoPeer::SEXO, $this->sexo);
		if ($this->isColumnModified(ContatoPeer::ENDERECO)) $criteria->add(ContatoPeer::ENDERECO, $this->endereco);
		if ($this->isColumnModified(ContatoPeer::BAIRRO)) $criteria->add(ContatoPeer::BAIRRO, $this->bairro);
		if ($this->isColumnModified(ContatoPeer::COMPLEMENTO)) $criteria->add(ContatoPeer::COMPLEMENTO, $this->complemento);
		if ($this->isColumnModified(ContatoPeer::CIDADE)) $criteria->add(ContatoPeer::CIDADE, $this->cidade);
		if ($this->isColumnModified(ContatoPeer::UF)) $criteria->add(ContatoPeer::UF, $this->uf);
		if ($this->isColumnModified(ContatoPeer::CEP)) $criteria->add(ContatoPeer::CEP, $this->cep);
		if ($this->isColumnModified(ContatoPeer::FONE1)) $criteria->add(ContatoPeer::FONE1, $this->fone1);
		if ($this->isColumnModified(ContatoPeer::CELULAR)) $criteria->add(ContatoPeer::CELULAR, $this->celular);
		if ($this->isColumnModified(ContatoPeer::CPF_CNPJ)) $criteria->add(ContatoPeer::CPF_CNPJ, $this->cpf_cnpj);
		if ($this->isColumnModified(ContatoPeer::SITUACAO)) $criteria->add(ContatoPeer::SITUACAO, $this->situacao);
		if ($this->isColumnModified(ContatoPeer::CARGO)) $criteria->add(ContatoPeer::CARGO, $this->cargo);

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
		$criteria = new Criteria(ContatoPeer::DATABASE_NAME);

		$criteria->add(ContatoPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Contato (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setLocalId($this->local_id);

		$copyObj->setNome($this->nome);

		$copyObj->setEmpresa($this->empresa);

		$copyObj->setEmail($this->email);

		$copyObj->setNascimento($this->nascimento);

		$copyObj->setSexo($this->sexo);

		$copyObj->setEndereco($this->endereco);

		$copyObj->setBairro($this->bairro);

		$copyObj->setComplemento($this->complemento);

		$copyObj->setCidade($this->cidade);

		$copyObj->setUf($this->uf);

		$copyObj->setCep($this->cep);

		$copyObj->setFone1($this->fone1);

		$copyObj->setCelular($this->celular);

		$copyObj->setCpfCnpj($this->cpf_cnpj);

		$copyObj->setSituacao($this->situacao);

		$copyObj->setCargo($this->cargo);


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
	 * @return     Contato Clone of current object.
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
	 * @return     ContatoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ContatoPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Local object.
	 *
	 * @param      Local $v
	 * @return     Contato The current object (for fluent API support)
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
			$v->addContato($this);
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
			   $this->aLocal->addContatos($this);
			 */
		}
		return $this->aLocal;
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
		} // if ($deep)

			$this->aLocal = null;
	}

} // BaseContato
