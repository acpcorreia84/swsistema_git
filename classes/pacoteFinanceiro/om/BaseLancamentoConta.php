<?php

/**
 * Base class that represents a row from the 'lancamento_conta' table.
 *
 * 
 *
 * @package    pacoteFinanceiro.om
 */
abstract class BaseLancamentoConta extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        LancamentoContaPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the conta_bancaria_id field.
	 * @var        int
	 */
	protected $conta_bancaria_id;

	/**
	 * The value for the conta_pagar_id field.
	 * @var        int
	 */
	protected $conta_pagar_id;

	/**
	 * The value for the conta_receber_id field.
	 * @var        int
	 */
	protected $conta_receber_id;

	/**
	 * The value for the conta_contabil_id field.
	 * @var        int
	 */
	protected $conta_contabil_id;

	/**
	 * The value for the cod_movimentacao field.
	 * @var        string
	 */
	protected $cod_movimentacao;

	/**
	 * The value for the data_lancamento field.
	 * @var        string
	 */
	protected $data_lancamento;

	/**
	 * The value for the descricao field.
	 * @var        string
	 */
	protected $descricao;

	/**
	 * The value for the valor field.
	 * @var        double
	 */
	protected $valor;

	/**
	 * The value for the tipo field.
	 * @var        string
	 */
	protected $tipo;

	/**
	 * The value for the observacao field.
	 * @var        string
	 */
	protected $observacao;

	/**
	 * The value for the local_id field.
	 * @var        int
	 */
	protected $local_id;

	/**
	 * @var        ContasPagar
	 */
	protected $aContasPagar;

	/**
	 * @var        ContasReceber
	 */
	protected $aContasReceber;

	/**
	 * @var        ContaBancaria
	 */
	protected $aContaBancaria;

	/**
	 * @var        ContaContabil
	 */
	protected $aContaContabil;

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
	 * Get the [conta_bancaria_id] column value.
	 * 
	 * @return     int
	 */
	public function getContaBancariaId()
	{
		return $this->conta_bancaria_id;
	}

	/**
	 * Get the [conta_pagar_id] column value.
	 * 
	 * @return     int
	 */
	public function getContaPagarId()
	{
		return $this->conta_pagar_id;
	}

	/**
	 * Get the [conta_receber_id] column value.
	 * 
	 * @return     int
	 */
	public function getContaReceberId()
	{
		return $this->conta_receber_id;
	}

	/**
	 * Get the [conta_contabil_id] column value.
	 * 
	 * @return     int
	 */
	public function getContaContabilId()
	{
		return $this->conta_contabil_id;
	}

	/**
	 * Get the [cod_movimentacao] column value.
	 * 
	 * @return     string
	 */
	public function getCodMovimentacao()
	{
		return $this->cod_movimentacao;
	}

	/**
	 * Get the [optionally formatted] temporal [data_lancamento] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataLancamento($format = 'Y-m-d H:i:s')
	{
		if ($this->data_lancamento === null) {
			return null;
		}


		if ($this->data_lancamento === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_lancamento);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_lancamento, true), $x);
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
	 * Get the [descricao] column value.
	 * 
	 * @return     string
	 */
	public function getDescricao()
	{
		return $this->descricao;
	}

	/**
	 * Get the [valor] column value.
	 * 
	 * @return     double
	 */
	public function getValor()
	{
		return $this->valor;
	}

	/**
	 * Get the [tipo] column value.
	 * 
	 * @return     string
	 */
	public function getTipo()
	{
		return $this->tipo;
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
	 * Get the [local_id] column value.
	 * 
	 * @return     int
	 */
	public function getLocalId()
	{
		return $this->local_id;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     LancamentoConta The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = LancamentoContaPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [conta_bancaria_id] column.
	 * 
	 * @param      int $v new value
	 * @return     LancamentoConta The current object (for fluent API support)
	 */
	public function setContaBancariaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->conta_bancaria_id !== $v) {
			$this->conta_bancaria_id = $v;
			$this->modifiedColumns[] = LancamentoContaPeer::CONTA_BANCARIA_ID;
		}

		if ($this->aContaBancaria !== null && $this->aContaBancaria->getId() !== $v) {
			$this->aContaBancaria = null;
		}

		return $this;
	} // setContaBancariaId()

	/**
	 * Set the value of [conta_pagar_id] column.
	 * 
	 * @param      int $v new value
	 * @return     LancamentoConta The current object (for fluent API support)
	 */
	public function setContaPagarId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->conta_pagar_id !== $v) {
			$this->conta_pagar_id = $v;
			$this->modifiedColumns[] = LancamentoContaPeer::CONTA_PAGAR_ID;
		}

		if ($this->aContasPagar !== null && $this->aContasPagar->getId() !== $v) {
			$this->aContasPagar = null;
		}

		return $this;
	} // setContaPagarId()

	/**
	 * Set the value of [conta_receber_id] column.
	 * 
	 * @param      int $v new value
	 * @return     LancamentoConta The current object (for fluent API support)
	 */
	public function setContaReceberId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->conta_receber_id !== $v) {
			$this->conta_receber_id = $v;
			$this->modifiedColumns[] = LancamentoContaPeer::CONTA_RECEBER_ID;
		}

		if ($this->aContasReceber !== null && $this->aContasReceber->getId() !== $v) {
			$this->aContasReceber = null;
		}

		return $this;
	} // setContaReceberId()

	/**
	 * Set the value of [conta_contabil_id] column.
	 * 
	 * @param      int $v new value
	 * @return     LancamentoConta The current object (for fluent API support)
	 */
	public function setContaContabilId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->conta_contabil_id !== $v) {
			$this->conta_contabil_id = $v;
			$this->modifiedColumns[] = LancamentoContaPeer::CONTA_CONTABIL_ID;
		}

		if ($this->aContaContabil !== null && $this->aContaContabil->getId() !== $v) {
			$this->aContaContabil = null;
		}

		return $this;
	} // setContaContabilId()

	/**
	 * Set the value of [cod_movimentacao] column.
	 * 
	 * @param      string $v new value
	 * @return     LancamentoConta The current object (for fluent API support)
	 */
	public function setCodMovimentacao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cod_movimentacao !== $v) {
			$this->cod_movimentacao = $v;
			$this->modifiedColumns[] = LancamentoContaPeer::COD_MOVIMENTACAO;
		}

		return $this;
	} // setCodMovimentacao()

	/**
	 * Sets the value of [data_lancamento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     LancamentoConta The current object (for fluent API support)
	 */
	public function setDataLancamento($v)
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

		if ( $this->data_lancamento !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_lancamento !== null && $tmpDt = new DateTime($this->data_lancamento)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_lancamento = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = LancamentoContaPeer::DATA_LANCAMENTO;
			}
		} // if either are not null

		return $this;
	} // setDataLancamento()

	/**
	 * Set the value of [descricao] column.
	 * 
	 * @param      string $v new value
	 * @return     LancamentoConta The current object (for fluent API support)
	 */
	public function setDescricao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->descricao !== $v) {
			$this->descricao = $v;
			$this->modifiedColumns[] = LancamentoContaPeer::DESCRICAO;
		}

		return $this;
	} // setDescricao()

	/**
	 * Set the value of [valor] column.
	 * 
	 * @param      double $v new value
	 * @return     LancamentoConta The current object (for fluent API support)
	 */
	public function setValor($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->valor !== $v) {
			$this->valor = $v;
			$this->modifiedColumns[] = LancamentoContaPeer::VALOR;
		}

		return $this;
	} // setValor()

	/**
	 * Set the value of [tipo] column.
	 * 
	 * @param      string $v new value
	 * @return     LancamentoConta The current object (for fluent API support)
	 */
	public function setTipo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->tipo !== $v) {
			$this->tipo = $v;
			$this->modifiedColumns[] = LancamentoContaPeer::TIPO;
		}

		return $this;
	} // setTipo()

	/**
	 * Set the value of [observacao] column.
	 * 
	 * @param      string $v new value
	 * @return     LancamentoConta The current object (for fluent API support)
	 */
	public function setObservacao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->observacao !== $v) {
			$this->observacao = $v;
			$this->modifiedColumns[] = LancamentoContaPeer::OBSERVACAO;
		}

		return $this;
	} // setObservacao()

	/**
	 * Set the value of [local_id] column.
	 * 
	 * @param      int $v new value
	 * @return     LancamentoConta The current object (for fluent API support)
	 */
	public function setLocalId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->local_id !== $v) {
			$this->local_id = $v;
			$this->modifiedColumns[] = LancamentoContaPeer::LOCAL_ID;
		}

		if ($this->aLocal !== null && $this->aLocal->getId() !== $v) {
			$this->aLocal = null;
		}

		return $this;
	} // setLocalId()

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
			$this->conta_bancaria_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->conta_pagar_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->conta_receber_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->conta_contabil_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->cod_movimentacao = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->data_lancamento = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->descricao = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->valor = ($row[$startcol + 8] !== null) ? (double) $row[$startcol + 8] : null;
			$this->tipo = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->observacao = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->local_id = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 12; // 12 = LancamentoContaPeer::NUM_COLUMNS - LancamentoContaPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating LancamentoConta object", $e);
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

		if ($this->aContaBancaria !== null && $this->conta_bancaria_id !== $this->aContaBancaria->getId()) {
			$this->aContaBancaria = null;
		}
		if ($this->aContasPagar !== null && $this->conta_pagar_id !== $this->aContasPagar->getId()) {
			$this->aContasPagar = null;
		}
		if ($this->aContasReceber !== null && $this->conta_receber_id !== $this->aContasReceber->getId()) {
			$this->aContasReceber = null;
		}
		if ($this->aContaContabil !== null && $this->conta_contabil_id !== $this->aContaContabil->getId()) {
			$this->aContaContabil = null;
		}
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
			$con = Propel::getConnection(LancamentoContaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = LancamentoContaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aContasPagar = null;
			$this->aContasReceber = null;
			$this->aContaBancaria = null;
			$this->aContaContabil = null;
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
			$con = Propel::getConnection(LancamentoContaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				LancamentoContaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LancamentoContaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				LancamentoContaPeer::addInstanceToPool($this);
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

			if ($this->aContasPagar !== null) {
				if ($this->aContasPagar->isModified() || $this->aContasPagar->isNew()) {
					$affectedRows += $this->aContasPagar->save($con);
				}
				$this->setContasPagar($this->aContasPagar);
			}

			if ($this->aContasReceber !== null) {
				if ($this->aContasReceber->isModified() || $this->aContasReceber->isNew()) {
					$affectedRows += $this->aContasReceber->save($con);
				}
				$this->setContasReceber($this->aContasReceber);
			}

			if ($this->aContaBancaria !== null) {
				if ($this->aContaBancaria->isModified() || $this->aContaBancaria->isNew()) {
					$affectedRows += $this->aContaBancaria->save($con);
				}
				$this->setContaBancaria($this->aContaBancaria);
			}

			if ($this->aContaContabil !== null) {
				if ($this->aContaContabil->isModified() || $this->aContaContabil->isNew()) {
					$affectedRows += $this->aContaContabil->save($con);
				}
				$this->setContaContabil($this->aContaContabil);
			}

			if ($this->aLocal !== null) {
				if ($this->aLocal->isModified() || $this->aLocal->isNew()) {
					$affectedRows += $this->aLocal->save($con);
				}
				$this->setLocal($this->aLocal);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = LancamentoContaPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LancamentoContaPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += LancamentoContaPeer::doUpdate($this, $con);
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

			if ($this->aContasPagar !== null) {
				if (!$this->aContasPagar->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aContasPagar->getValidationFailures());
				}
			}

			if ($this->aContasReceber !== null) {
				if (!$this->aContasReceber->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aContasReceber->getValidationFailures());
				}
			}

			if ($this->aContaBancaria !== null) {
				if (!$this->aContaBancaria->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aContaBancaria->getValidationFailures());
				}
			}

			if ($this->aContaContabil !== null) {
				if (!$this->aContaContabil->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aContaContabil->getValidationFailures());
				}
			}

			if ($this->aLocal !== null) {
				if (!$this->aLocal->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLocal->getValidationFailures());
				}
			}


			if (($retval = LancamentoContaPeer::doValidate($this, $columns)) !== true) {
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
		$criteria = new Criteria(LancamentoContaPeer::DATABASE_NAME);

		if ($this->isColumnModified(LancamentoContaPeer::ID)) $criteria->add(LancamentoContaPeer::ID, $this->id);
		if ($this->isColumnModified(LancamentoContaPeer::CONTA_BANCARIA_ID)) $criteria->add(LancamentoContaPeer::CONTA_BANCARIA_ID, $this->conta_bancaria_id);
		if ($this->isColumnModified(LancamentoContaPeer::CONTA_PAGAR_ID)) $criteria->add(LancamentoContaPeer::CONTA_PAGAR_ID, $this->conta_pagar_id);
		if ($this->isColumnModified(LancamentoContaPeer::CONTA_RECEBER_ID)) $criteria->add(LancamentoContaPeer::CONTA_RECEBER_ID, $this->conta_receber_id);
		if ($this->isColumnModified(LancamentoContaPeer::CONTA_CONTABIL_ID)) $criteria->add(LancamentoContaPeer::CONTA_CONTABIL_ID, $this->conta_contabil_id);
		if ($this->isColumnModified(LancamentoContaPeer::COD_MOVIMENTACAO)) $criteria->add(LancamentoContaPeer::COD_MOVIMENTACAO, $this->cod_movimentacao);
		if ($this->isColumnModified(LancamentoContaPeer::DATA_LANCAMENTO)) $criteria->add(LancamentoContaPeer::DATA_LANCAMENTO, $this->data_lancamento);
		if ($this->isColumnModified(LancamentoContaPeer::DESCRICAO)) $criteria->add(LancamentoContaPeer::DESCRICAO, $this->descricao);
		if ($this->isColumnModified(LancamentoContaPeer::VALOR)) $criteria->add(LancamentoContaPeer::VALOR, $this->valor);
		if ($this->isColumnModified(LancamentoContaPeer::TIPO)) $criteria->add(LancamentoContaPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(LancamentoContaPeer::OBSERVACAO)) $criteria->add(LancamentoContaPeer::OBSERVACAO, $this->observacao);
		if ($this->isColumnModified(LancamentoContaPeer::LOCAL_ID)) $criteria->add(LancamentoContaPeer::LOCAL_ID, $this->local_id);

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
		$criteria = new Criteria(LancamentoContaPeer::DATABASE_NAME);

		$criteria->add(LancamentoContaPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of LancamentoConta (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setContaBancariaId($this->conta_bancaria_id);

		$copyObj->setContaPagarId($this->conta_pagar_id);

		$copyObj->setContaReceberId($this->conta_receber_id);

		$copyObj->setContaContabilId($this->conta_contabil_id);

		$copyObj->setCodMovimentacao($this->cod_movimentacao);

		$copyObj->setDataLancamento($this->data_lancamento);

		$copyObj->setDescricao($this->descricao);

		$copyObj->setValor($this->valor);

		$copyObj->setTipo($this->tipo);

		$copyObj->setObservacao($this->observacao);

		$copyObj->setLocalId($this->local_id);


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
	 * @return     LancamentoConta Clone of current object.
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
	 * @return     LancamentoContaPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new LancamentoContaPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a ContasPagar object.
	 *
	 * @param      ContasPagar $v
	 * @return     LancamentoConta The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setContasPagar(ContasPagar $v = null)
	{
		if ($v === null) {
			$this->setContaPagarId(NULL);
		} else {
			$this->setContaPagarId($v->getId());
		}

		$this->aContasPagar = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the ContasPagar object, it will not be re-added.
		if ($v !== null) {
			$v->addLancamentoConta($this);
		}

		return $this;
	}


	/**
	 * Get the associated ContasPagar object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     ContasPagar The associated ContasPagar object.
	 * @throws     PropelException
	 */
	public function getContasPagar(PropelPDO $con = null)
	{
		if ($this->aContasPagar === null && ($this->conta_pagar_id !== null)) {
			$this->aContasPagar = ContasPagarPeer::retrieveByPk($this->conta_pagar_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aContasPagar->addLancamentoContas($this);
			 */
		}
		return $this->aContasPagar;
	}

	/**
	 * Declares an association between this object and a ContasReceber object.
	 *
	 * @param      ContasReceber $v
	 * @return     LancamentoConta The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setContasReceber(ContasReceber $v = null)
	{
		if ($v === null) {
			$this->setContaReceberId(NULL);
		} else {
			$this->setContaReceberId($v->getId());
		}

		$this->aContasReceber = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the ContasReceber object, it will not be re-added.
		if ($v !== null) {
			$v->addLancamentoConta($this);
		}

		return $this;
	}


	/**
	 * Get the associated ContasReceber object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     ContasReceber The associated ContasReceber object.
	 * @throws     PropelException
	 */
	public function getContasReceber(PropelPDO $con = null)
	{
		if ($this->aContasReceber === null && ($this->conta_receber_id !== null)) {
			$this->aContasReceber = ContasReceberPeer::retrieveByPk($this->conta_receber_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aContasReceber->addLancamentoContas($this);
			 */
		}
		return $this->aContasReceber;
	}

	/**
	 * Declares an association between this object and a ContaBancaria object.
	 *
	 * @param      ContaBancaria $v
	 * @return     LancamentoConta The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setContaBancaria(ContaBancaria $v = null)
	{
		if ($v === null) {
			$this->setContaBancariaId(NULL);
		} else {
			$this->setContaBancariaId($v->getId());
		}

		$this->aContaBancaria = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the ContaBancaria object, it will not be re-added.
		if ($v !== null) {
			$v->addLancamentoConta($this);
		}

		return $this;
	}


	/**
	 * Get the associated ContaBancaria object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     ContaBancaria The associated ContaBancaria object.
	 * @throws     PropelException
	 */
	public function getContaBancaria(PropelPDO $con = null)
	{
		if ($this->aContaBancaria === null && ($this->conta_bancaria_id !== null)) {
			$this->aContaBancaria = ContaBancariaPeer::retrieveByPk($this->conta_bancaria_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aContaBancaria->addLancamentoContas($this);
			 */
		}
		return $this->aContaBancaria;
	}

	/**
	 * Declares an association between this object and a ContaContabil object.
	 *
	 * @param      ContaContabil $v
	 * @return     LancamentoConta The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setContaContabil(ContaContabil $v = null)
	{
		if ($v === null) {
			$this->setContaContabilId(NULL);
		} else {
			$this->setContaContabilId($v->getId());
		}

		$this->aContaContabil = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the ContaContabil object, it will not be re-added.
		if ($v !== null) {
			$v->addLancamentoConta($this);
		}

		return $this;
	}


	/**
	 * Get the associated ContaContabil object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     ContaContabil The associated ContaContabil object.
	 * @throws     PropelException
	 */
	public function getContaContabil(PropelPDO $con = null)
	{
		if ($this->aContaContabil === null && ($this->conta_contabil_id !== null)) {
			$this->aContaContabil = ContaContabilPeer::retrieveByPk($this->conta_contabil_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aContaContabil->addLancamentoContas($this);
			 */
		}
		return $this->aContaContabil;
	}

	/**
	 * Declares an association between this object and a Local object.
	 *
	 * @param      Local $v
	 * @return     LancamentoConta The current object (for fluent API support)
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
			$v->addLancamentoConta($this);
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
			   $this->aLocal->addLancamentoContas($this);
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

			$this->aContasPagar = null;
			$this->aContasReceber = null;
			$this->aContaBancaria = null;
			$this->aContaContabil = null;
			$this->aLocal = null;
	}

} // BaseLancamentoConta
