<?php

/**
 * Base class that represents a row from the 'contador_comissionamento' table.
 *
 * 
 *
 * @package    pacoteContador.om
 */
abstract class BaseContadorComissionamento extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ContadorComissionamentoPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the descricao field.
	 * @var        string
	 */
	protected $descricao;

	/**
	 * The value for the contador_id field.
	 * @var        int
	 */
	protected $contador_id;

	/**
	 * The value for the data_registro field.
	 * @var        string
	 */
	protected $data_registro;

	/**
	 * The value for the data_pagamento field.
	 * @var        string
	 */
	protected $data_pagamento;

	/**
	 * The value for the periodo_inicial field.
	 * @var        string
	 */
	protected $periodo_inicial;

	/**
	 * The value for the periodo_final field.
	 * @var        string
	 */
	protected $periodo_final;

	/**
	 * The value for the venda field.
	 * @var        double
	 */
	protected $venda;

	/**
	 * The value for the comissao_venda field.
	 * @var        int
	 */
	protected $comissao_venda;

	/**
	 * The value for the observacao field.
	 * @var        string
	 */
	protected $observacao;

	/**
	 * The value for the situacao field.
	 * @var        int
	 */
	protected $situacao;

	/**
	 * @var        Contador
	 */
	protected $aContador;

	/**
	 * @var        array ContadorLancamento[] Collection to store aggregation of ContadorLancamento objects.
	 */
	protected $collContadorLancamentos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collContadorLancamentos.
	 */
	private $lastContadorLancamentoCriteria = null;

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
	 * Get the [descricao] column value.
	 * 
	 * @return     string
	 */
	public function getDescricao()
	{
		return $this->descricao;
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
	 * Get the [optionally formatted] temporal [data_registro] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataRegistro($format = 'Y-m-d H:i:s')
	{
		if ($this->data_registro === null) {
			return null;
		}


		if ($this->data_registro === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_registro);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_registro, true), $x);
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
	 * Get the [optionally formatted] temporal [data_pagamento] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataPagamento($format = 'Y-m-d H:i:s')
	{
		if ($this->data_pagamento === null) {
			return null;
		}


		if ($this->data_pagamento === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_pagamento);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_pagamento, true), $x);
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
	 * Get the [optionally formatted] temporal [periodo_inicial] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getPeriodoInicial($format = 'Y-m-d H:i:s')
	{
		if ($this->periodo_inicial === null) {
			return null;
		}


		if ($this->periodo_inicial === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->periodo_inicial);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->periodo_inicial, true), $x);
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
	 * Get the [optionally formatted] temporal [periodo_final] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getPeriodoFinal($format = 'Y-m-d H:i:s')
	{
		if ($this->periodo_final === null) {
			return null;
		}


		if ($this->periodo_final === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->periodo_final);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->periodo_final, true), $x);
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
	 * Get the [venda] column value.
	 * 
	 * @return     double
	 */
	public function getVenda()
	{
		return $this->venda;
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
	 * Get the [observacao] column value.
	 * 
	 * @return     string
	 */
	public function getObservacao()
	{
		return $this->observacao;
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
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     ContadorComissionamento The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ContadorComissionamentoPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [descricao] column.
	 * 
	 * @param      string $v new value
	 * @return     ContadorComissionamento The current object (for fluent API support)
	 */
	public function setDescricao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->descricao !== $v) {
			$this->descricao = $v;
			$this->modifiedColumns[] = ContadorComissionamentoPeer::DESCRICAO;
		}

		return $this;
	} // setDescricao()

	/**
	 * Set the value of [contador_id] column.
	 * 
	 * @param      int $v new value
	 * @return     ContadorComissionamento The current object (for fluent API support)
	 */
	public function setContadorId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->contador_id !== $v) {
			$this->contador_id = $v;
			$this->modifiedColumns[] = ContadorComissionamentoPeer::CONTADOR_ID;
		}

		if ($this->aContador !== null && $this->aContador->getId() !== $v) {
			$this->aContador = null;
		}

		return $this;
	} // setContadorId()

	/**
	 * Sets the value of [data_registro] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     ContadorComissionamento The current object (for fluent API support)
	 */
	public function setDataRegistro($v)
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

		if ( $this->data_registro !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_registro !== null && $tmpDt = new DateTime($this->data_registro)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_registro = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = ContadorComissionamentoPeer::DATA_REGISTRO;
			}
		} // if either are not null

		return $this;
	} // setDataRegistro()

	/**
	 * Sets the value of [data_pagamento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     ContadorComissionamento The current object (for fluent API support)
	 */
	public function setDataPagamento($v)
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

		if ( $this->data_pagamento !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_pagamento !== null && $tmpDt = new DateTime($this->data_pagamento)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_pagamento = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = ContadorComissionamentoPeer::DATA_PAGAMENTO;
			}
		} // if either are not null

		return $this;
	} // setDataPagamento()

	/**
	 * Sets the value of [periodo_inicial] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     ContadorComissionamento The current object (for fluent API support)
	 */
	public function setPeriodoInicial($v)
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

		if ( $this->periodo_inicial !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->periodo_inicial !== null && $tmpDt = new DateTime($this->periodo_inicial)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->periodo_inicial = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = ContadorComissionamentoPeer::PERIODO_INICIAL;
			}
		} // if either are not null

		return $this;
	} // setPeriodoInicial()

	/**
	 * Sets the value of [periodo_final] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     ContadorComissionamento The current object (for fluent API support)
	 */
	public function setPeriodoFinal($v)
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

		if ( $this->periodo_final !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->periodo_final !== null && $tmpDt = new DateTime($this->periodo_final)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->periodo_final = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = ContadorComissionamentoPeer::PERIODO_FINAL;
			}
		} // if either are not null

		return $this;
	} // setPeriodoFinal()

	/**
	 * Set the value of [venda] column.
	 * 
	 * @param      double $v new value
	 * @return     ContadorComissionamento The current object (for fluent API support)
	 */
	public function setVenda($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->venda !== $v) {
			$this->venda = $v;
			$this->modifiedColumns[] = ContadorComissionamentoPeer::VENDA;
		}

		return $this;
	} // setVenda()

	/**
	 * Set the value of [comissao_venda] column.
	 * 
	 * @param      int $v new value
	 * @return     ContadorComissionamento The current object (for fluent API support)
	 */
	public function setComissaoVenda($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->comissao_venda !== $v) {
			$this->comissao_venda = $v;
			$this->modifiedColumns[] = ContadorComissionamentoPeer::COMISSAO_VENDA;
		}

		return $this;
	} // setComissaoVenda()

	/**
	 * Set the value of [observacao] column.
	 * 
	 * @param      string $v new value
	 * @return     ContadorComissionamento The current object (for fluent API support)
	 */
	public function setObservacao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->observacao !== $v) {
			$this->observacao = $v;
			$this->modifiedColumns[] = ContadorComissionamentoPeer::OBSERVACAO;
		}

		return $this;
	} // setObservacao()

	/**
	 * Set the value of [situacao] column.
	 * 
	 * @param      int $v new value
	 * @return     ContadorComissionamento The current object (for fluent API support)
	 */
	public function setSituacao($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->situacao !== $v) {
			$this->situacao = $v;
			$this->modifiedColumns[] = ContadorComissionamentoPeer::SITUACAO;
		}

		return $this;
	} // setSituacao()

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
			$this->descricao = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->contador_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->data_registro = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->data_pagamento = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->periodo_inicial = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->periodo_final = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->venda = ($row[$startcol + 7] !== null) ? (double) $row[$startcol + 7] : null;
			$this->comissao_venda = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->observacao = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->situacao = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 11; // 11 = ContadorComissionamentoPeer::NUM_COLUMNS - ContadorComissionamentoPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating ContadorComissionamento object", $e);
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
			$con = Propel::getConnection(ContadorComissionamentoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ContadorComissionamentoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aContador = null;
			$this->collContadorLancamentos = null;
			$this->lastContadorLancamentoCriteria = null;

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
			$con = Propel::getConnection(ContadorComissionamentoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				ContadorComissionamentoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ContadorComissionamentoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				ContadorComissionamentoPeer::addInstanceToPool($this);
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

			if ($this->aContador !== null) {
				if ($this->aContador->isModified() || $this->aContador->isNew()) {
					$affectedRows += $this->aContador->save($con);
				}
				$this->setContador($this->aContador);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = ContadorComissionamentoPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ContadorComissionamentoPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += ContadorComissionamentoPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collContadorLancamentos !== null) {
				foreach ($this->collContadorLancamentos as $referrerFK) {
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

			if ($this->aContador !== null) {
				if (!$this->aContador->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aContador->getValidationFailures());
				}
			}


			if (($retval = ContadorComissionamentoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collContadorLancamentos !== null) {
					foreach ($this->collContadorLancamentos as $referrerFK) {
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
		$criteria = new Criteria(ContadorComissionamentoPeer::DATABASE_NAME);

		if ($this->isColumnModified(ContadorComissionamentoPeer::ID)) $criteria->add(ContadorComissionamentoPeer::ID, $this->id);
		if ($this->isColumnModified(ContadorComissionamentoPeer::DESCRICAO)) $criteria->add(ContadorComissionamentoPeer::DESCRICAO, $this->descricao);
		if ($this->isColumnModified(ContadorComissionamentoPeer::CONTADOR_ID)) $criteria->add(ContadorComissionamentoPeer::CONTADOR_ID, $this->contador_id);
		if ($this->isColumnModified(ContadorComissionamentoPeer::DATA_REGISTRO)) $criteria->add(ContadorComissionamentoPeer::DATA_REGISTRO, $this->data_registro);
		if ($this->isColumnModified(ContadorComissionamentoPeer::DATA_PAGAMENTO)) $criteria->add(ContadorComissionamentoPeer::DATA_PAGAMENTO, $this->data_pagamento);
		if ($this->isColumnModified(ContadorComissionamentoPeer::PERIODO_INICIAL)) $criteria->add(ContadorComissionamentoPeer::PERIODO_INICIAL, $this->periodo_inicial);
		if ($this->isColumnModified(ContadorComissionamentoPeer::PERIODO_FINAL)) $criteria->add(ContadorComissionamentoPeer::PERIODO_FINAL, $this->periodo_final);
		if ($this->isColumnModified(ContadorComissionamentoPeer::VENDA)) $criteria->add(ContadorComissionamentoPeer::VENDA, $this->venda);
		if ($this->isColumnModified(ContadorComissionamentoPeer::COMISSAO_VENDA)) $criteria->add(ContadorComissionamentoPeer::COMISSAO_VENDA, $this->comissao_venda);
		if ($this->isColumnModified(ContadorComissionamentoPeer::OBSERVACAO)) $criteria->add(ContadorComissionamentoPeer::OBSERVACAO, $this->observacao);
		if ($this->isColumnModified(ContadorComissionamentoPeer::SITUACAO)) $criteria->add(ContadorComissionamentoPeer::SITUACAO, $this->situacao);

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
		$criteria = new Criteria(ContadorComissionamentoPeer::DATABASE_NAME);

		$criteria->add(ContadorComissionamentoPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of ContadorComissionamento (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDescricao($this->descricao);

		$copyObj->setContadorId($this->contador_id);

		$copyObj->setDataRegistro($this->data_registro);

		$copyObj->setDataPagamento($this->data_pagamento);

		$copyObj->setPeriodoInicial($this->periodo_inicial);

		$copyObj->setPeriodoFinal($this->periodo_final);

		$copyObj->setVenda($this->venda);

		$copyObj->setComissaoVenda($this->comissao_venda);

		$copyObj->setObservacao($this->observacao);

		$copyObj->setSituacao($this->situacao);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getContadorLancamentos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addContadorLancamento($relObj->copy($deepCopy));
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
	 * @return     ContadorComissionamento Clone of current object.
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
	 * @return     ContadorComissionamentoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ContadorComissionamentoPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Contador object.
	 *
	 * @param      Contador $v
	 * @return     ContadorComissionamento The current object (for fluent API support)
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
			$v->addContadorComissionamento($this);
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
			   $this->aContador->addContadorComissionamentos($this);
			 */
		}
		return $this->aContador;
	}

	/**
	 * Clears out the collContadorLancamentos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addContadorLancamentos()
	 */
	public function clearContadorLancamentos()
	{
		$this->collContadorLancamentos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collContadorLancamentos collection (array).
	 *
	 * By default this just sets the collContadorLancamentos collection to an empty array (like clearcollContadorLancamentos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initContadorLancamentos()
	{
		$this->collContadorLancamentos = array();
	}

	/**
	 * Gets an array of ContadorLancamento objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this ContadorComissionamento has previously been saved, it will retrieve
	 * related ContadorLancamentos from storage. If this ContadorComissionamento is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ContadorLancamento[]
	 * @throws     PropelException
	 */
	public function getContadorLancamentos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContadorComissionamentoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContadorLancamentos === null) {
			if ($this->isNew()) {
			   $this->collContadorLancamentos = array();
			} else {

				$criteria->add(ContadorLancamentoPeer::CONTADOR_COMISSIONAMENTO_ID, $this->id);

				ContadorLancamentoPeer::addSelectColumns($criteria);
				$this->collContadorLancamentos = ContadorLancamentoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ContadorLancamentoPeer::CONTADOR_COMISSIONAMENTO_ID, $this->id);

				ContadorLancamentoPeer::addSelectColumns($criteria);
				if (!isset($this->lastContadorLancamentoCriteria) || !$this->lastContadorLancamentoCriteria->equals($criteria)) {
					$this->collContadorLancamentos = ContadorLancamentoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastContadorLancamentoCriteria = $criteria;
		return $this->collContadorLancamentos;
	}

	/**
	 * Returns the number of related ContadorLancamento objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ContadorLancamento objects.
	 * @throws     PropelException
	 */
	public function countContadorLancamentos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContadorComissionamentoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collContadorLancamentos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ContadorLancamentoPeer::CONTADOR_COMISSIONAMENTO_ID, $this->id);

				$count = ContadorLancamentoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ContadorLancamentoPeer::CONTADOR_COMISSIONAMENTO_ID, $this->id);

				if (!isset($this->lastContadorLancamentoCriteria) || !$this->lastContadorLancamentoCriteria->equals($criteria)) {
					$count = ContadorLancamentoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collContadorLancamentos);
				}
			} else {
				$count = count($this->collContadorLancamentos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a ContadorLancamento object to this object
	 * through the ContadorLancamento foreign key attribute.
	 *
	 * @param      ContadorLancamento $l ContadorLancamento
	 * @return     void
	 * @throws     PropelException
	 */
	public function addContadorLancamento(ContadorLancamento $l)
	{
		if ($this->collContadorLancamentos === null) {
			$this->initContadorLancamentos();
		}
		if (!in_array($l, $this->collContadorLancamentos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collContadorLancamentos, $l);
			$l->setContadorComissionamento($this);
		}
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
			if ($this->collContadorLancamentos) {
				foreach ((array) $this->collContadorLancamentos as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collContadorLancamentos = null;
			$this->aContador = null;
	}

} // BaseContadorComissionamento
