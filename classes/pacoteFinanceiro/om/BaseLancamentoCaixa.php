<?php

/**
 * Base class that represents a row from the 'lancamento_caixa' table.
 *
 * 
 *
 * @package    pacoteFinanceiro.om
 */
abstract class BaseLancamentoCaixa extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        LancamentoCaixaPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the caixa_id field.
	 * @var        int
	 */
	protected $caixa_id;

	/**
	 * The value for the conta_pagar_id field.
	 * @var        int
	 */
	protected $conta_pagar_id;

	/**
	 * The value for the conta_contabil_id field.
	 * @var        int
	 */
	protected $conta_contabil_id;

	/**
	 * The value for the conta_contabil_dest_id field.
	 * @var        int
	 */
	protected $conta_contabil_dest_id;

	/**
	 * The value for the conta_receber_id field.
	 * @var        int
	 */
	protected $conta_receber_id;

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
	 * @var        ContaContabil
	 */
	protected $aContaContabil;

	/**
	 * @var        ContasPagar
	 */
	protected $aContasPagar;

	/**
	 * @var        ContasReceber
	 */
	protected $aContasReceber;

	/**
	 * @var        Caixa
	 */
	protected $aCaixa;

	/**
	 * @var        array DetalheLancamento[] Collection to store aggregation of DetalheLancamento objects.
	 */
	protected $collDetalheLancamentos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collDetalheLancamentos.
	 */
	private $lastDetalheLancamentoCriteria = null;

	/**
	 * @var        array DetalheCheque[] Collection to store aggregation of DetalheCheque objects.
	 */
	protected $collDetalheCheques;

	/**
	 * @var        Criteria The criteria used to select the current contents of collDetalheCheques.
	 */
	private $lastDetalheChequeCriteria = null;

	/**
	 * @var        array ContasPagar[] Collection to store aggregation of ContasPagar objects.
	 */
	protected $collContasPagars;

	/**
	 * @var        Criteria The criteria used to select the current contents of collContasPagars.
	 */
	private $lastContasPagarCriteria = null;

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
	 * Get the [caixa_id] column value.
	 * 
	 * @return     int
	 */
	public function getCaixaId()
	{
		return $this->caixa_id;
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
	 * Get the [conta_contabil_id] column value.
	 * 
	 * @return     int
	 */
	public function getContaContabilId()
	{
		return $this->conta_contabil_id;
	}

	/**
	 * Get the [conta_contabil_dest_id] column value.
	 * 
	 * @return     int
	 */
	public function getContaContabilDestId()
	{
		return $this->conta_contabil_dest_id;
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
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     LancamentoCaixa The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = LancamentoCaixaPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [caixa_id] column.
	 * 
	 * @param      int $v new value
	 * @return     LancamentoCaixa The current object (for fluent API support)
	 */
	public function setCaixaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->caixa_id !== $v) {
			$this->caixa_id = $v;
			$this->modifiedColumns[] = LancamentoCaixaPeer::CAIXA_ID;
		}

		if ($this->aCaixa !== null && $this->aCaixa->getId() !== $v) {
			$this->aCaixa = null;
		}

		return $this;
	} // setCaixaId()

	/**
	 * Set the value of [conta_pagar_id] column.
	 * 
	 * @param      int $v new value
	 * @return     LancamentoCaixa The current object (for fluent API support)
	 */
	public function setContaPagarId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->conta_pagar_id !== $v) {
			$this->conta_pagar_id = $v;
			$this->modifiedColumns[] = LancamentoCaixaPeer::CONTA_PAGAR_ID;
		}

		if ($this->aContasPagar !== null && $this->aContasPagar->getId() !== $v) {
			$this->aContasPagar = null;
		}

		return $this;
	} // setContaPagarId()

	/**
	 * Set the value of [conta_contabil_id] column.
	 * 
	 * @param      int $v new value
	 * @return     LancamentoCaixa The current object (for fluent API support)
	 */
	public function setContaContabilId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->conta_contabil_id !== $v) {
			$this->conta_contabil_id = $v;
			$this->modifiedColumns[] = LancamentoCaixaPeer::CONTA_CONTABIL_ID;
		}

		if ($this->aContaContabil !== null && $this->aContaContabil->getId() !== $v) {
			$this->aContaContabil = null;
		}

		return $this;
	} // setContaContabilId()

	/**
	 * Set the value of [conta_contabil_dest_id] column.
	 * 
	 * @param      int $v new value
	 * @return     LancamentoCaixa The current object (for fluent API support)
	 */
	public function setContaContabilDestId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->conta_contabil_dest_id !== $v) {
			$this->conta_contabil_dest_id = $v;
			$this->modifiedColumns[] = LancamentoCaixaPeer::CONTA_CONTABIL_DEST_ID;
		}

		return $this;
	} // setContaContabilDestId()

	/**
	 * Set the value of [conta_receber_id] column.
	 * 
	 * @param      int $v new value
	 * @return     LancamentoCaixa The current object (for fluent API support)
	 */
	public function setContaReceberId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->conta_receber_id !== $v) {
			$this->conta_receber_id = $v;
			$this->modifiedColumns[] = LancamentoCaixaPeer::CONTA_RECEBER_ID;
		}

		if ($this->aContasReceber !== null && $this->aContasReceber->getId() !== $v) {
			$this->aContasReceber = null;
		}

		return $this;
	} // setContaReceberId()

	/**
	 * Sets the value of [data_lancamento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     LancamentoCaixa The current object (for fluent API support)
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
				$this->modifiedColumns[] = LancamentoCaixaPeer::DATA_LANCAMENTO;
			}
		} // if either are not null

		return $this;
	} // setDataLancamento()

	/**
	 * Set the value of [descricao] column.
	 * 
	 * @param      string $v new value
	 * @return     LancamentoCaixa The current object (for fluent API support)
	 */
	public function setDescricao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->descricao !== $v) {
			$this->descricao = $v;
			$this->modifiedColumns[] = LancamentoCaixaPeer::DESCRICAO;
		}

		return $this;
	} // setDescricao()

	/**
	 * Set the value of [valor] column.
	 * 
	 * @param      double $v new value
	 * @return     LancamentoCaixa The current object (for fluent API support)
	 */
	public function setValor($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->valor !== $v) {
			$this->valor = $v;
			$this->modifiedColumns[] = LancamentoCaixaPeer::VALOR;
		}

		return $this;
	} // setValor()

	/**
	 * Set the value of [tipo] column.
	 * 
	 * @param      string $v new value
	 * @return     LancamentoCaixa The current object (for fluent API support)
	 */
	public function setTipo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->tipo !== $v) {
			$this->tipo = $v;
			$this->modifiedColumns[] = LancamentoCaixaPeer::TIPO;
		}

		return $this;
	} // setTipo()

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
			$this->caixa_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->conta_pagar_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->conta_contabil_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->conta_contabil_dest_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->conta_receber_id = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->data_lancamento = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->descricao = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->valor = ($row[$startcol + 8] !== null) ? (double) $row[$startcol + 8] : null;
			$this->tipo = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 10; // 10 = LancamentoCaixaPeer::NUM_COLUMNS - LancamentoCaixaPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating LancamentoCaixa object", $e);
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

		if ($this->aCaixa !== null && $this->caixa_id !== $this->aCaixa->getId()) {
			$this->aCaixa = null;
		}
		if ($this->aContasPagar !== null && $this->conta_pagar_id !== $this->aContasPagar->getId()) {
			$this->aContasPagar = null;
		}
		if ($this->aContaContabil !== null && $this->conta_contabil_id !== $this->aContaContabil->getId()) {
			$this->aContaContabil = null;
		}
		if ($this->aContasReceber !== null && $this->conta_receber_id !== $this->aContasReceber->getId()) {
			$this->aContasReceber = null;
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
			$con = Propel::getConnection(LancamentoCaixaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = LancamentoCaixaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aContaContabil = null;
			$this->aContasPagar = null;
			$this->aContasReceber = null;
			$this->aCaixa = null;
			$this->collDetalheLancamentos = null;
			$this->lastDetalheLancamentoCriteria = null;

			$this->collDetalheCheques = null;
			$this->lastDetalheChequeCriteria = null;

			$this->collContasPagars = null;
			$this->lastContasPagarCriteria = null;

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
			$con = Propel::getConnection(LancamentoCaixaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				LancamentoCaixaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LancamentoCaixaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				LancamentoCaixaPeer::addInstanceToPool($this);
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

			if ($this->aContaContabil !== null) {
				if ($this->aContaContabil->isModified() || $this->aContaContabil->isNew()) {
					$affectedRows += $this->aContaContabil->save($con);
				}
				$this->setContaContabil($this->aContaContabil);
			}

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

			if ($this->aCaixa !== null) {
				if ($this->aCaixa->isModified() || $this->aCaixa->isNew()) {
					$affectedRows += $this->aCaixa->save($con);
				}
				$this->setCaixa($this->aCaixa);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = LancamentoCaixaPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LancamentoCaixaPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += LancamentoCaixaPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collDetalheLancamentos !== null) {
				foreach ($this->collDetalheLancamentos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collDetalheCheques !== null) {
				foreach ($this->collDetalheCheques as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collContasPagars !== null) {
				foreach ($this->collContasPagars as $referrerFK) {
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

			if ($this->aContaContabil !== null) {
				if (!$this->aContaContabil->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aContaContabil->getValidationFailures());
				}
			}

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

			if ($this->aCaixa !== null) {
				if (!$this->aCaixa->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCaixa->getValidationFailures());
				}
			}


			if (($retval = LancamentoCaixaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collDetalheLancamentos !== null) {
					foreach ($this->collDetalheLancamentos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collDetalheCheques !== null) {
					foreach ($this->collDetalheCheques as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collContasPagars !== null) {
					foreach ($this->collContasPagars as $referrerFK) {
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
		$criteria = new Criteria(LancamentoCaixaPeer::DATABASE_NAME);

		if ($this->isColumnModified(LancamentoCaixaPeer::ID)) $criteria->add(LancamentoCaixaPeer::ID, $this->id);
		if ($this->isColumnModified(LancamentoCaixaPeer::CAIXA_ID)) $criteria->add(LancamentoCaixaPeer::CAIXA_ID, $this->caixa_id);
		if ($this->isColumnModified(LancamentoCaixaPeer::CONTA_PAGAR_ID)) $criteria->add(LancamentoCaixaPeer::CONTA_PAGAR_ID, $this->conta_pagar_id);
		if ($this->isColumnModified(LancamentoCaixaPeer::CONTA_CONTABIL_ID)) $criteria->add(LancamentoCaixaPeer::CONTA_CONTABIL_ID, $this->conta_contabil_id);
		if ($this->isColumnModified(LancamentoCaixaPeer::CONTA_CONTABIL_DEST_ID)) $criteria->add(LancamentoCaixaPeer::CONTA_CONTABIL_DEST_ID, $this->conta_contabil_dest_id);
		if ($this->isColumnModified(LancamentoCaixaPeer::CONTA_RECEBER_ID)) $criteria->add(LancamentoCaixaPeer::CONTA_RECEBER_ID, $this->conta_receber_id);
		if ($this->isColumnModified(LancamentoCaixaPeer::DATA_LANCAMENTO)) $criteria->add(LancamentoCaixaPeer::DATA_LANCAMENTO, $this->data_lancamento);
		if ($this->isColumnModified(LancamentoCaixaPeer::DESCRICAO)) $criteria->add(LancamentoCaixaPeer::DESCRICAO, $this->descricao);
		if ($this->isColumnModified(LancamentoCaixaPeer::VALOR)) $criteria->add(LancamentoCaixaPeer::VALOR, $this->valor);
		if ($this->isColumnModified(LancamentoCaixaPeer::TIPO)) $criteria->add(LancamentoCaixaPeer::TIPO, $this->tipo);

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
		$criteria = new Criteria(LancamentoCaixaPeer::DATABASE_NAME);

		$criteria->add(LancamentoCaixaPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of LancamentoCaixa (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setCaixaId($this->caixa_id);

		$copyObj->setContaPagarId($this->conta_pagar_id);

		$copyObj->setContaContabilId($this->conta_contabil_id);

		$copyObj->setContaContabilDestId($this->conta_contabil_dest_id);

		$copyObj->setContaReceberId($this->conta_receber_id);

		$copyObj->setDataLancamento($this->data_lancamento);

		$copyObj->setDescricao($this->descricao);

		$copyObj->setValor($this->valor);

		$copyObj->setTipo($this->tipo);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getDetalheLancamentos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addDetalheLancamento($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getDetalheCheques() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addDetalheCheque($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getContasPagars() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addContasPagar($relObj->copy($deepCopy));
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
	 * @return     LancamentoCaixa Clone of current object.
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
	 * @return     LancamentoCaixaPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new LancamentoCaixaPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a ContaContabil object.
	 *
	 * @param      ContaContabil $v
	 * @return     LancamentoCaixa The current object (for fluent API support)
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
			$v->addLancamentoCaixa($this);
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
			   $this->aContaContabil->addLancamentoCaixas($this);
			 */
		}
		return $this->aContaContabil;
	}

	/**
	 * Declares an association between this object and a ContasPagar object.
	 *
	 * @param      ContasPagar $v
	 * @return     LancamentoCaixa The current object (for fluent API support)
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
			$v->addLancamentoCaixa($this);
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
			   $this->aContasPagar->addLancamentoCaixas($this);
			 */
		}
		return $this->aContasPagar;
	}

	/**
	 * Declares an association between this object and a ContasReceber object.
	 *
	 * @param      ContasReceber $v
	 * @return     LancamentoCaixa The current object (for fluent API support)
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
			$v->addLancamentoCaixa($this);
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
			   $this->aContasReceber->addLancamentoCaixas($this);
			 */
		}
		return $this->aContasReceber;
	}

	/**
	 * Declares an association between this object and a Caixa object.
	 *
	 * @param      Caixa $v
	 * @return     LancamentoCaixa The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setCaixa(Caixa $v = null)
	{
		if ($v === null) {
			$this->setCaixaId(NULL);
		} else {
			$this->setCaixaId($v->getId());
		}

		$this->aCaixa = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Caixa object, it will not be re-added.
		if ($v !== null) {
			$v->addLancamentoCaixa($this);
		}

		return $this;
	}


	/**
	 * Get the associated Caixa object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Caixa The associated Caixa object.
	 * @throws     PropelException
	 */
	public function getCaixa(PropelPDO $con = null)
	{
		if ($this->aCaixa === null && ($this->caixa_id !== null)) {
			$this->aCaixa = CaixaPeer::retrieveByPk($this->caixa_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aCaixa->addLancamentoCaixas($this);
			 */
		}
		return $this->aCaixa;
	}

	/**
	 * Clears out the collDetalheLancamentos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addDetalheLancamentos()
	 */
	public function clearDetalheLancamentos()
	{
		$this->collDetalheLancamentos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collDetalheLancamentos collection (array).
	 *
	 * By default this just sets the collDetalheLancamentos collection to an empty array (like clearcollDetalheLancamentos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initDetalheLancamentos()
	{
		$this->collDetalheLancamentos = array();
	}

	/**
	 * Gets an array of DetalheLancamento objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this LancamentoCaixa has previously been saved, it will retrieve
	 * related DetalheLancamentos from storage. If this LancamentoCaixa is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array DetalheLancamento[]
	 * @throws     PropelException
	 */
	public function getDetalheLancamentos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LancamentoCaixaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetalheLancamentos === null) {
			if ($this->isNew()) {
			   $this->collDetalheLancamentos = array();
			} else {

				$criteria->add(DetalheLancamentoPeer::LANCAMENTO_CAIXA_ID, $this->id);

				DetalheLancamentoPeer::addSelectColumns($criteria);
				$this->collDetalheLancamentos = DetalheLancamentoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(DetalheLancamentoPeer::LANCAMENTO_CAIXA_ID, $this->id);

				DetalheLancamentoPeer::addSelectColumns($criteria);
				if (!isset($this->lastDetalheLancamentoCriteria) || !$this->lastDetalheLancamentoCriteria->equals($criteria)) {
					$this->collDetalheLancamentos = DetalheLancamentoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDetalheLancamentoCriteria = $criteria;
		return $this->collDetalheLancamentos;
	}

	/**
	 * Returns the number of related DetalheLancamento objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related DetalheLancamento objects.
	 * @throws     PropelException
	 */
	public function countDetalheLancamentos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LancamentoCaixaPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collDetalheLancamentos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(DetalheLancamentoPeer::LANCAMENTO_CAIXA_ID, $this->id);

				$count = DetalheLancamentoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(DetalheLancamentoPeer::LANCAMENTO_CAIXA_ID, $this->id);

				if (!isset($this->lastDetalheLancamentoCriteria) || !$this->lastDetalheLancamentoCriteria->equals($criteria)) {
					$count = DetalheLancamentoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collDetalheLancamentos);
				}
			} else {
				$count = count($this->collDetalheLancamentos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a DetalheLancamento object to this object
	 * through the DetalheLancamento foreign key attribute.
	 *
	 * @param      DetalheLancamento $l DetalheLancamento
	 * @return     void
	 * @throws     PropelException
	 */
	public function addDetalheLancamento(DetalheLancamento $l)
	{
		if ($this->collDetalheLancamentos === null) {
			$this->initDetalheLancamentos();
		}
		if (!in_array($l, $this->collDetalheLancamentos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collDetalheLancamentos, $l);
			$l->setLancamentoCaixa($this);
		}
	}

	/**
	 * Clears out the collDetalheCheques collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addDetalheCheques()
	 */
	public function clearDetalheCheques()
	{
		$this->collDetalheCheques = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collDetalheCheques collection (array).
	 *
	 * By default this just sets the collDetalheCheques collection to an empty array (like clearcollDetalheCheques());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initDetalheCheques()
	{
		$this->collDetalheCheques = array();
	}

	/**
	 * Gets an array of DetalheCheque objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this LancamentoCaixa has previously been saved, it will retrieve
	 * related DetalheCheques from storage. If this LancamentoCaixa is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array DetalheCheque[]
	 * @throws     PropelException
	 */
	public function getDetalheCheques($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LancamentoCaixaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetalheCheques === null) {
			if ($this->isNew()) {
			   $this->collDetalheCheques = array();
			} else {

				$criteria->add(DetalheChequePeer::LANCAMENTO_CAIXA_ID, $this->id);

				DetalheChequePeer::addSelectColumns($criteria);
				$this->collDetalheCheques = DetalheChequePeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(DetalheChequePeer::LANCAMENTO_CAIXA_ID, $this->id);

				DetalheChequePeer::addSelectColumns($criteria);
				if (!isset($this->lastDetalheChequeCriteria) || !$this->lastDetalheChequeCriteria->equals($criteria)) {
					$this->collDetalheCheques = DetalheChequePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDetalheChequeCriteria = $criteria;
		return $this->collDetalheCheques;
	}

	/**
	 * Returns the number of related DetalheCheque objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related DetalheCheque objects.
	 * @throws     PropelException
	 */
	public function countDetalheCheques(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LancamentoCaixaPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collDetalheCheques === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(DetalheChequePeer::LANCAMENTO_CAIXA_ID, $this->id);

				$count = DetalheChequePeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(DetalheChequePeer::LANCAMENTO_CAIXA_ID, $this->id);

				if (!isset($this->lastDetalheChequeCriteria) || !$this->lastDetalheChequeCriteria->equals($criteria)) {
					$count = DetalheChequePeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collDetalheCheques);
				}
			} else {
				$count = count($this->collDetalheCheques);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a DetalheCheque object to this object
	 * through the DetalheCheque foreign key attribute.
	 *
	 * @param      DetalheCheque $l DetalheCheque
	 * @return     void
	 * @throws     PropelException
	 */
	public function addDetalheCheque(DetalheCheque $l)
	{
		if ($this->collDetalheCheques === null) {
			$this->initDetalheCheques();
		}
		if (!in_array($l, $this->collDetalheCheques, true)) { // only add it if the **same** object is not already associated
			array_push($this->collDetalheCheques, $l);
			$l->setLancamentoCaixa($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this LancamentoCaixa is new, it will return
	 * an empty collection; or if this LancamentoCaixa has previously
	 * been saved, it will retrieve related DetalheCheques from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in LancamentoCaixa.
	 */
	public function getDetalheChequesJoinBanco($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LancamentoCaixaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetalheCheques === null) {
			if ($this->isNew()) {
				$this->collDetalheCheques = array();
			} else {

				$criteria->add(DetalheChequePeer::LANCAMENTO_CAIXA_ID, $this->id);

				$this->collDetalheCheques = DetalheChequePeer::doSelectJoinBanco($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(DetalheChequePeer::LANCAMENTO_CAIXA_ID, $this->id);

			if (!isset($this->lastDetalheChequeCriteria) || !$this->lastDetalheChequeCriteria->equals($criteria)) {
				$this->collDetalheCheques = DetalheChequePeer::doSelectJoinBanco($criteria, $con, $join_behavior);
			}
		}
		$this->lastDetalheChequeCriteria = $criteria;

		return $this->collDetalheCheques;
	}

	/**
	 * Clears out the collContasPagars collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addContasPagars()
	 */
	public function clearContasPagars()
	{
		$this->collContasPagars = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collContasPagars collection (array).
	 *
	 * By default this just sets the collContasPagars collection to an empty array (like clearcollContasPagars());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initContasPagars()
	{
		$this->collContasPagars = array();
	}

	/**
	 * Gets an array of ContasPagar objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this LancamentoCaixa has previously been saved, it will retrieve
	 * related ContasPagars from storage. If this LancamentoCaixa is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ContasPagar[]
	 * @throws     PropelException
	 */
	public function getContasPagars($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LancamentoCaixaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasPagars === null) {
			if ($this->isNew()) {
			   $this->collContasPagars = array();
			} else {

				$criteria->add(ContasPagarPeer::LANCAMENTO_CAIXA_ID, $this->id);

				ContasPagarPeer::addSelectColumns($criteria);
				$this->collContasPagars = ContasPagarPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ContasPagarPeer::LANCAMENTO_CAIXA_ID, $this->id);

				ContasPagarPeer::addSelectColumns($criteria);
				if (!isset($this->lastContasPagarCriteria) || !$this->lastContasPagarCriteria->equals($criteria)) {
					$this->collContasPagars = ContasPagarPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastContasPagarCriteria = $criteria;
		return $this->collContasPagars;
	}

	/**
	 * Returns the number of related ContasPagar objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ContasPagar objects.
	 * @throws     PropelException
	 */
	public function countContasPagars(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LancamentoCaixaPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collContasPagars === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ContasPagarPeer::LANCAMENTO_CAIXA_ID, $this->id);

				$count = ContasPagarPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ContasPagarPeer::LANCAMENTO_CAIXA_ID, $this->id);

				if (!isset($this->lastContasPagarCriteria) || !$this->lastContasPagarCriteria->equals($criteria)) {
					$count = ContasPagarPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collContasPagars);
				}
			} else {
				$count = count($this->collContasPagars);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a ContasPagar object to this object
	 * through the ContasPagar foreign key attribute.
	 *
	 * @param      ContasPagar $l ContasPagar
	 * @return     void
	 * @throws     PropelException
	 */
	public function addContasPagar(ContasPagar $l)
	{
		if ($this->collContasPagars === null) {
			$this->initContasPagars();
		}
		if (!in_array($l, $this->collContasPagars, true)) { // only add it if the **same** object is not already associated
			array_push($this->collContasPagars, $l);
			$l->setLancamentoCaixa($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this LancamentoCaixa is new, it will return
	 * an empty collection; or if this LancamentoCaixa has previously
	 * been saved, it will retrieve related ContasPagars from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in LancamentoCaixa.
	 */
	public function getContasPagarsJoinContasPagarRelatedByContaPagarId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LancamentoCaixaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasPagars === null) {
			if ($this->isNew()) {
				$this->collContasPagars = array();
			} else {

				$criteria->add(ContasPagarPeer::LANCAMENTO_CAIXA_ID, $this->id);

				$this->collContasPagars = ContasPagarPeer::doSelectJoinContasPagarRelatedByContaPagarId($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContasPagarPeer::LANCAMENTO_CAIXA_ID, $this->id);

			if (!isset($this->lastContasPagarCriteria) || !$this->lastContasPagarCriteria->equals($criteria)) {
				$this->collContasPagars = ContasPagarPeer::doSelectJoinContasPagarRelatedByContaPagarId($criteria, $con, $join_behavior);
			}
		}
		$this->lastContasPagarCriteria = $criteria;

		return $this->collContasPagars;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this LancamentoCaixa is new, it will return
	 * an empty collection; or if this LancamentoCaixa has previously
	 * been saved, it will retrieve related ContasPagars from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in LancamentoCaixa.
	 */
	public function getContasPagarsJoinContaContabil($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LancamentoCaixaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasPagars === null) {
			if ($this->isNew()) {
				$this->collContasPagars = array();
			} else {

				$criteria->add(ContasPagarPeer::LANCAMENTO_CAIXA_ID, $this->id);

				$this->collContasPagars = ContasPagarPeer::doSelectJoinContaContabil($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContasPagarPeer::LANCAMENTO_CAIXA_ID, $this->id);

			if (!isset($this->lastContasPagarCriteria) || !$this->lastContasPagarCriteria->equals($criteria)) {
				$this->collContasPagars = ContasPagarPeer::doSelectJoinContaContabil($criteria, $con, $join_behavior);
			}
		}
		$this->lastContasPagarCriteria = $criteria;

		return $this->collContasPagars;
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
			if ($this->collDetalheLancamentos) {
				foreach ((array) $this->collDetalheLancamentos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collDetalheCheques) {
				foreach ((array) $this->collDetalheCheques as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collContasPagars) {
				foreach ((array) $this->collContasPagars as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collDetalheLancamentos = null;
		$this->collDetalheCheques = null;
		$this->collContasPagars = null;
			$this->aContaContabil = null;
			$this->aContasPagar = null;
			$this->aContasReceber = null;
			$this->aCaixa = null;
	}

} // BaseLancamentoCaixa
