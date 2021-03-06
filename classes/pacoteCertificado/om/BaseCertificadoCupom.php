<?php

/**
 * Base class that represents a row from the 'certificado_cupom' table.
 *
 * 
 *
 * @package    pacoteCertificado.om
 */
abstract class BaseCertificadoCupom extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        CertificadoCupomPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the certificado_id field.
	 * @var        int
	 */
	protected $certificado_id;

	/**
	 * The value for the cliente_id field.
	 * @var        int
	 */
	protected $cliente_id;

	/**
	 * The value for the codigo field.
	 * @var        string
	 */
	protected $codigo;

	/**
	 * The value for the data_vencimento field.
	 * @var        string
	 */
	protected $data_vencimento;

	/**
	 * The value for the data_emissao field.
	 * @var        string
	 */
	protected $data_emissao;

	/**
	 * The value for the data_utilizacao field.
	 * @var        string
	 */
	protected $data_utilizacao;

	/**
	 * The value for the valor_cupom field.
	 * @var        double
	 */
	protected $valor_cupom;

	/**
	 * The value for the valor_final field.
	 * @var        double
	 */
	protected $valor_final;

	/**
	 * The value for the descricao field.
	 * @var        string
	 */
	protected $descricao;

	/**
	 * The value for the observacao field.
	 * @var        string
	 */
	protected $observacao;

	/**
	 * @var        Certificado
	 */
	protected $aCertificado;

	/**
	 * @var        Cliente
	 */
	protected $aCliente;

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
	 * Get the [certificado_id] column value.
	 * 
	 * @return     int
	 */
	public function getCertificadoId()
	{
		return $this->certificado_id;
	}

	/**
	 * Get the [cliente_id] column value.
	 * 
	 * @return     int
	 */
	public function getClienteId()
	{
		return $this->cliente_id;
	}

	/**
	 * Get the [codigo] column value.
	 * 
	 * @return     string
	 */
	public function getCodigo()
	{
		return $this->codigo;
	}

	/**
	 * Get the [optionally formatted] temporal [data_vencimento] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataVencimento($format = 'Y-m-d H:i:s')
	{
		if ($this->data_vencimento === null) {
			return null;
		}


		if ($this->data_vencimento === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_vencimento);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_vencimento, true), $x);
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
	 * Get the [optionally formatted] temporal [data_emissao] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataEmissao($format = 'Y-m-d H:i:s')
	{
		if ($this->data_emissao === null) {
			return null;
		}


		if ($this->data_emissao === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_emissao);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_emissao, true), $x);
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
	 * Get the [optionally formatted] temporal [data_utilizacao] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataUtilizacao($format = 'Y-m-d H:i:s')
	{
		if ($this->data_utilizacao === null) {
			return null;
		}


		if ($this->data_utilizacao === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_utilizacao);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_utilizacao, true), $x);
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
	 * Get the [valor_cupom] column value.
	 * 
	 * @return     double
	 */
	public function getValorCupom()
	{
		return $this->valor_cupom;
	}

	/**
	 * Get the [valor_final] column value.
	 * 
	 * @return     double
	 */
	public function getValorFinal()
	{
		return $this->valor_final;
	}

	/**
	 * Get the [descricao] column value.
	 * 
	 * @return     string
	 */
	public function getDescricao()
	{
		return $this->descricao;
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
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     CertificadoCupom The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CertificadoCupomPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [certificado_id] column.
	 * 
	 * @param      int $v new value
	 * @return     CertificadoCupom The current object (for fluent API support)
	 */
	public function setCertificadoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->certificado_id !== $v) {
			$this->certificado_id = $v;
			$this->modifiedColumns[] = CertificadoCupomPeer::CERTIFICADO_ID;
		}

		if ($this->aCertificado !== null && $this->aCertificado->getId() !== $v) {
			$this->aCertificado = null;
		}

		return $this;
	} // setCertificadoId()

	/**
	 * Set the value of [cliente_id] column.
	 * 
	 * @param      int $v new value
	 * @return     CertificadoCupom The current object (for fluent API support)
	 */
	public function setClienteId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->cliente_id !== $v) {
			$this->cliente_id = $v;
			$this->modifiedColumns[] = CertificadoCupomPeer::CLIENTE_ID;
		}

		if ($this->aCliente !== null && $this->aCliente->getId() !== $v) {
			$this->aCliente = null;
		}

		return $this;
	} // setClienteId()

	/**
	 * Set the value of [codigo] column.
	 * 
	 * @param      string $v new value
	 * @return     CertificadoCupom The current object (for fluent API support)
	 */
	public function setCodigo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->codigo !== $v) {
			$this->codigo = $v;
			$this->modifiedColumns[] = CertificadoCupomPeer::CODIGO;
		}

		return $this;
	} // setCodigo()

	/**
	 * Sets the value of [data_vencimento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     CertificadoCupom The current object (for fluent API support)
	 */
	public function setDataVencimento($v)
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

		if ( $this->data_vencimento !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_vencimento !== null && $tmpDt = new DateTime($this->data_vencimento)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_vencimento = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = CertificadoCupomPeer::DATA_VENCIMENTO;
			}
		} // if either are not null

		return $this;
	} // setDataVencimento()

	/**
	 * Sets the value of [data_emissao] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     CertificadoCupom The current object (for fluent API support)
	 */
	public function setDataEmissao($v)
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

		if ( $this->data_emissao !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_emissao !== null && $tmpDt = new DateTime($this->data_emissao)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_emissao = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = CertificadoCupomPeer::DATA_EMISSAO;
			}
		} // if either are not null

		return $this;
	} // setDataEmissao()

	/**
	 * Sets the value of [data_utilizacao] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     CertificadoCupom The current object (for fluent API support)
	 */
	public function setDataUtilizacao($v)
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

		if ( $this->data_utilizacao !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_utilizacao !== null && $tmpDt = new DateTime($this->data_utilizacao)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_utilizacao = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = CertificadoCupomPeer::DATA_UTILIZACAO;
			}
		} // if either are not null

		return $this;
	} // setDataUtilizacao()

	/**
	 * Set the value of [valor_cupom] column.
	 * 
	 * @param      double $v new value
	 * @return     CertificadoCupom The current object (for fluent API support)
	 */
	public function setValorCupom($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->valor_cupom !== $v) {
			$this->valor_cupom = $v;
			$this->modifiedColumns[] = CertificadoCupomPeer::VALOR_CUPOM;
		}

		return $this;
	} // setValorCupom()

	/**
	 * Set the value of [valor_final] column.
	 * 
	 * @param      double $v new value
	 * @return     CertificadoCupom The current object (for fluent API support)
	 */
	public function setValorFinal($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->valor_final !== $v) {
			$this->valor_final = $v;
			$this->modifiedColumns[] = CertificadoCupomPeer::VALOR_FINAL;
		}

		return $this;
	} // setValorFinal()

	/**
	 * Set the value of [descricao] column.
	 * 
	 * @param      string $v new value
	 * @return     CertificadoCupom The current object (for fluent API support)
	 */
	public function setDescricao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->descricao !== $v) {
			$this->descricao = $v;
			$this->modifiedColumns[] = CertificadoCupomPeer::DESCRICAO;
		}

		return $this;
	} // setDescricao()

	/**
	 * Set the value of [observacao] column.
	 * 
	 * @param      string $v new value
	 * @return     CertificadoCupom The current object (for fluent API support)
	 */
	public function setObservacao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->observacao !== $v) {
			$this->observacao = $v;
			$this->modifiedColumns[] = CertificadoCupomPeer::OBSERVACAO;
		}

		return $this;
	} // setObservacao()

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
			$this->certificado_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->cliente_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->codigo = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->data_vencimento = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->data_emissao = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->data_utilizacao = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->valor_cupom = ($row[$startcol + 7] !== null) ? (double) $row[$startcol + 7] : null;
			$this->valor_final = ($row[$startcol + 8] !== null) ? (double) $row[$startcol + 8] : null;
			$this->descricao = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->observacao = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 11; // 11 = CertificadoCupomPeer::NUM_COLUMNS - CertificadoCupomPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating CertificadoCupom object", $e);
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

		if ($this->aCertificado !== null && $this->certificado_id !== $this->aCertificado->getId()) {
			$this->aCertificado = null;
		}
		if ($this->aCliente !== null && $this->cliente_id !== $this->aCliente->getId()) {
			$this->aCliente = null;
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
			$con = Propel::getConnection(CertificadoCupomPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = CertificadoCupomPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aCertificado = null;
			$this->aCliente = null;
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
			$con = Propel::getConnection(CertificadoCupomPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				CertificadoCupomPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CertificadoCupomPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				CertificadoCupomPeer::addInstanceToPool($this);
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

			if ($this->aCertificado !== null) {
				if ($this->aCertificado->isModified() || $this->aCertificado->isNew()) {
					$affectedRows += $this->aCertificado->save($con);
				}
				$this->setCertificado($this->aCertificado);
			}

			if ($this->aCliente !== null) {
				if ($this->aCliente->isModified() || $this->aCliente->isNew()) {
					$affectedRows += $this->aCliente->save($con);
				}
				$this->setCliente($this->aCliente);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = CertificadoCupomPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CertificadoCupomPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += CertificadoCupomPeer::doUpdate($this, $con);
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

			if ($this->aCertificado !== null) {
				if (!$this->aCertificado->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCertificado->getValidationFailures());
				}
			}

			if ($this->aCliente !== null) {
				if (!$this->aCliente->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCliente->getValidationFailures());
				}
			}


			if (($retval = CertificadoCupomPeer::doValidate($this, $columns)) !== true) {
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
		$criteria = new Criteria(CertificadoCupomPeer::DATABASE_NAME);

		if ($this->isColumnModified(CertificadoCupomPeer::ID)) $criteria->add(CertificadoCupomPeer::ID, $this->id);
		if ($this->isColumnModified(CertificadoCupomPeer::CERTIFICADO_ID)) $criteria->add(CertificadoCupomPeer::CERTIFICADO_ID, $this->certificado_id);
		if ($this->isColumnModified(CertificadoCupomPeer::CLIENTE_ID)) $criteria->add(CertificadoCupomPeer::CLIENTE_ID, $this->cliente_id);
		if ($this->isColumnModified(CertificadoCupomPeer::CODIGO)) $criteria->add(CertificadoCupomPeer::CODIGO, $this->codigo);
		if ($this->isColumnModified(CertificadoCupomPeer::DATA_VENCIMENTO)) $criteria->add(CertificadoCupomPeer::DATA_VENCIMENTO, $this->data_vencimento);
		if ($this->isColumnModified(CertificadoCupomPeer::DATA_EMISSAO)) $criteria->add(CertificadoCupomPeer::DATA_EMISSAO, $this->data_emissao);
		if ($this->isColumnModified(CertificadoCupomPeer::DATA_UTILIZACAO)) $criteria->add(CertificadoCupomPeer::DATA_UTILIZACAO, $this->data_utilizacao);
		if ($this->isColumnModified(CertificadoCupomPeer::VALOR_CUPOM)) $criteria->add(CertificadoCupomPeer::VALOR_CUPOM, $this->valor_cupom);
		if ($this->isColumnModified(CertificadoCupomPeer::VALOR_FINAL)) $criteria->add(CertificadoCupomPeer::VALOR_FINAL, $this->valor_final);
		if ($this->isColumnModified(CertificadoCupomPeer::DESCRICAO)) $criteria->add(CertificadoCupomPeer::DESCRICAO, $this->descricao);
		if ($this->isColumnModified(CertificadoCupomPeer::OBSERVACAO)) $criteria->add(CertificadoCupomPeer::OBSERVACAO, $this->observacao);

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
		$criteria = new Criteria(CertificadoCupomPeer::DATABASE_NAME);

		$criteria->add(CertificadoCupomPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of CertificadoCupom (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setCertificadoId($this->certificado_id);

		$copyObj->setClienteId($this->cliente_id);

		$copyObj->setCodigo($this->codigo);

		$copyObj->setDataVencimento($this->data_vencimento);

		$copyObj->setDataEmissao($this->data_emissao);

		$copyObj->setDataUtilizacao($this->data_utilizacao);

		$copyObj->setValorCupom($this->valor_cupom);

		$copyObj->setValorFinal($this->valor_final);

		$copyObj->setDescricao($this->descricao);

		$copyObj->setObservacao($this->observacao);


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
	 * @return     CertificadoCupom Clone of current object.
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
	 * @return     CertificadoCupomPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new CertificadoCupomPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Certificado object.
	 *
	 * @param      Certificado $v
	 * @return     CertificadoCupom The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setCertificado(Certificado $v = null)
	{
		if ($v === null) {
			$this->setCertificadoId(NULL);
		} else {
			$this->setCertificadoId($v->getId());
		}

		$this->aCertificado = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Certificado object, it will not be re-added.
		if ($v !== null) {
			$v->addCertificadoCupom($this);
		}

		return $this;
	}


	/**
	 * Get the associated Certificado object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Certificado The associated Certificado object.
	 * @throws     PropelException
	 */
	public function getCertificado(PropelPDO $con = null)
	{
		if ($this->aCertificado === null && ($this->certificado_id !== null)) {
			$this->aCertificado = CertificadoPeer::retrieveByPk($this->certificado_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aCertificado->addCertificadoCupoms($this);
			 */
		}
		return $this->aCertificado;
	}

	/**
	 * Declares an association between this object and a Cliente object.
	 *
	 * @param      Cliente $v
	 * @return     CertificadoCupom The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setCliente(Cliente $v = null)
	{
		if ($v === null) {
			$this->setClienteId(NULL);
		} else {
			$this->setClienteId($v->getId());
		}

		$this->aCliente = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Cliente object, it will not be re-added.
		if ($v !== null) {
			$v->addCertificadoCupom($this);
		}

		return $this;
	}


	/**
	 * Get the associated Cliente object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Cliente The associated Cliente object.
	 * @throws     PropelException
	 */
	public function getCliente(PropelPDO $con = null)
	{
		if ($this->aCliente === null && ($this->cliente_id !== null)) {
			$this->aCliente = ClientePeer::retrieveByPk($this->cliente_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aCliente->addCertificadoCupoms($this);
			 */
		}
		return $this->aCliente;
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

			$this->aCertificado = null;
			$this->aCliente = null;
	}

} // BaseCertificadoCupom
