<?php

/**
 * Base class that represents a row from the 'detalhe_lancamento' table.
 *
 * 
 *
 * @package    pacoteFinanceiro.om
 */
abstract class BaseDetalheLancamento extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        DetalheLancamentoPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the lancamento_caixa_id field.
	 * @var        int
	 */
	protected $lancamento_caixa_id;

	/**
	 * The value for the cedulas field.
	 * @var        double
	 */
	protected $cedulas;

	/**
	 * The value for the moedas field.
	 * @var        double
	 */
	protected $moedas;

	/**
	 * The value for the cheques field.
	 * @var        double
	 */
	protected $cheques;

	/**
	 * The value for the deposito field.
	 * @var        double
	 */
	protected $deposito;

	/**
	 * The value for the despesa field.
	 * @var        double
	 */
	protected $despesa;

	/**
	 * The value for the outro field.
	 * @var        double
	 */
	protected $outro;

	/**
	 * The value for the observacao_outro field.
	 * @var        string
	 */
	protected $observacao_outro;

	/**
	 * The value for the observacao_despesa field.
	 * @var        string
	 */
	protected $observacao_despesa;

	/**
	 * @var        LancamentoCaixa
	 */
	protected $aLancamentoCaixa;

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
	 * Get the [lancamento_caixa_id] column value.
	 * 
	 * @return     int
	 */
	public function getLancamentoCaixaId()
	{
		return $this->lancamento_caixa_id;
	}

	/**
	 * Get the [cedulas] column value.
	 * 
	 * @return     double
	 */
	public function getCedulas()
	{
		return $this->cedulas;
	}

	/**
	 * Get the [moedas] column value.
	 * 
	 * @return     double
	 */
	public function getMoedas()
	{
		return $this->moedas;
	}

	/**
	 * Get the [cheques] column value.
	 * 
	 * @return     double
	 */
	public function getCheques()
	{
		return $this->cheques;
	}

	/**
	 * Get the [deposito] column value.
	 * 
	 * @return     double
	 */
	public function getDeposito()
	{
		return $this->deposito;
	}

	/**
	 * Get the [despesa] column value.
	 * 
	 * @return     double
	 */
	public function getDespesa()
	{
		return $this->despesa;
	}

	/**
	 * Get the [outro] column value.
	 * 
	 * @return     double
	 */
	public function getOutro()
	{
		return $this->outro;
	}

	/**
	 * Get the [observacao_outro] column value.
	 * 
	 * @return     string
	 */
	public function getObservacaoOutro()
	{
		return $this->observacao_outro;
	}

	/**
	 * Get the [observacao_despesa] column value.
	 * 
	 * @return     string
	 */
	public function getObservacaoDespesa()
	{
		return $this->observacao_despesa;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     DetalheLancamento The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = DetalheLancamentoPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [lancamento_caixa_id] column.
	 * 
	 * @param      int $v new value
	 * @return     DetalheLancamento The current object (for fluent API support)
	 */
	public function setLancamentoCaixaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->lancamento_caixa_id !== $v) {
			$this->lancamento_caixa_id = $v;
			$this->modifiedColumns[] = DetalheLancamentoPeer::LANCAMENTO_CAIXA_ID;
		}

		if ($this->aLancamentoCaixa !== null && $this->aLancamentoCaixa->getId() !== $v) {
			$this->aLancamentoCaixa = null;
		}

		return $this;
	} // setLancamentoCaixaId()

	/**
	 * Set the value of [cedulas] column.
	 * 
	 * @param      double $v new value
	 * @return     DetalheLancamento The current object (for fluent API support)
	 */
	public function setCedulas($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->cedulas !== $v) {
			$this->cedulas = $v;
			$this->modifiedColumns[] = DetalheLancamentoPeer::CEDULAS;
		}

		return $this;
	} // setCedulas()

	/**
	 * Set the value of [moedas] column.
	 * 
	 * @param      double $v new value
	 * @return     DetalheLancamento The current object (for fluent API support)
	 */
	public function setMoedas($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->moedas !== $v) {
			$this->moedas = $v;
			$this->modifiedColumns[] = DetalheLancamentoPeer::MOEDAS;
		}

		return $this;
	} // setMoedas()

	/**
	 * Set the value of [cheques] column.
	 * 
	 * @param      double $v new value
	 * @return     DetalheLancamento The current object (for fluent API support)
	 */
	public function setCheques($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->cheques !== $v) {
			$this->cheques = $v;
			$this->modifiedColumns[] = DetalheLancamentoPeer::CHEQUES;
		}

		return $this;
	} // setCheques()

	/**
	 * Set the value of [deposito] column.
	 * 
	 * @param      double $v new value
	 * @return     DetalheLancamento The current object (for fluent API support)
	 */
	public function setDeposito($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->deposito !== $v) {
			$this->deposito = $v;
			$this->modifiedColumns[] = DetalheLancamentoPeer::DEPOSITO;
		}

		return $this;
	} // setDeposito()

	/**
	 * Set the value of [despesa] column.
	 * 
	 * @param      double $v new value
	 * @return     DetalheLancamento The current object (for fluent API support)
	 */
	public function setDespesa($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->despesa !== $v) {
			$this->despesa = $v;
			$this->modifiedColumns[] = DetalheLancamentoPeer::DESPESA;
		}

		return $this;
	} // setDespesa()

	/**
	 * Set the value of [outro] column.
	 * 
	 * @param      double $v new value
	 * @return     DetalheLancamento The current object (for fluent API support)
	 */
	public function setOutro($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->outro !== $v) {
			$this->outro = $v;
			$this->modifiedColumns[] = DetalheLancamentoPeer::OUTRO;
		}

		return $this;
	} // setOutro()

	/**
	 * Set the value of [observacao_outro] column.
	 * 
	 * @param      string $v new value
	 * @return     DetalheLancamento The current object (for fluent API support)
	 */
	public function setObservacaoOutro($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->observacao_outro !== $v) {
			$this->observacao_outro = $v;
			$this->modifiedColumns[] = DetalheLancamentoPeer::OBSERVACAO_OUTRO;
		}

		return $this;
	} // setObservacaoOutro()

	/**
	 * Set the value of [observacao_despesa] column.
	 * 
	 * @param      string $v new value
	 * @return     DetalheLancamento The current object (for fluent API support)
	 */
	public function setObservacaoDespesa($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->observacao_despesa !== $v) {
			$this->observacao_despesa = $v;
			$this->modifiedColumns[] = DetalheLancamentoPeer::OBSERVACAO_DESPESA;
		}

		return $this;
	} // setObservacaoDespesa()

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
			$this->lancamento_caixa_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->cedulas = ($row[$startcol + 2] !== null) ? (double) $row[$startcol + 2] : null;
			$this->moedas = ($row[$startcol + 3] !== null) ? (double) $row[$startcol + 3] : null;
			$this->cheques = ($row[$startcol + 4] !== null) ? (double) $row[$startcol + 4] : null;
			$this->deposito = ($row[$startcol + 5] !== null) ? (double) $row[$startcol + 5] : null;
			$this->despesa = ($row[$startcol + 6] !== null) ? (double) $row[$startcol + 6] : null;
			$this->outro = ($row[$startcol + 7] !== null) ? (double) $row[$startcol + 7] : null;
			$this->observacao_outro = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->observacao_despesa = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 10; // 10 = DetalheLancamentoPeer::NUM_COLUMNS - DetalheLancamentoPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating DetalheLancamento object", $e);
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

		if ($this->aLancamentoCaixa !== null && $this->lancamento_caixa_id !== $this->aLancamentoCaixa->getId()) {
			$this->aLancamentoCaixa = null;
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
			$con = Propel::getConnection(DetalheLancamentoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = DetalheLancamentoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aLancamentoCaixa = null;
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
			$con = Propel::getConnection(DetalheLancamentoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				DetalheLancamentoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(DetalheLancamentoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				DetalheLancamentoPeer::addInstanceToPool($this);
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

			if ($this->aLancamentoCaixa !== null) {
				if ($this->aLancamentoCaixa->isModified() || $this->aLancamentoCaixa->isNew()) {
					$affectedRows += $this->aLancamentoCaixa->save($con);
				}
				$this->setLancamentoCaixa($this->aLancamentoCaixa);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = DetalheLancamentoPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DetalheLancamentoPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += DetalheLancamentoPeer::doUpdate($this, $con);
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

			if ($this->aLancamentoCaixa !== null) {
				if (!$this->aLancamentoCaixa->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLancamentoCaixa->getValidationFailures());
				}
			}


			if (($retval = DetalheLancamentoPeer::doValidate($this, $columns)) !== true) {
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
		$criteria = new Criteria(DetalheLancamentoPeer::DATABASE_NAME);

		if ($this->isColumnModified(DetalheLancamentoPeer::ID)) $criteria->add(DetalheLancamentoPeer::ID, $this->id);
		if ($this->isColumnModified(DetalheLancamentoPeer::LANCAMENTO_CAIXA_ID)) $criteria->add(DetalheLancamentoPeer::LANCAMENTO_CAIXA_ID, $this->lancamento_caixa_id);
		if ($this->isColumnModified(DetalheLancamentoPeer::CEDULAS)) $criteria->add(DetalheLancamentoPeer::CEDULAS, $this->cedulas);
		if ($this->isColumnModified(DetalheLancamentoPeer::MOEDAS)) $criteria->add(DetalheLancamentoPeer::MOEDAS, $this->moedas);
		if ($this->isColumnModified(DetalheLancamentoPeer::CHEQUES)) $criteria->add(DetalheLancamentoPeer::CHEQUES, $this->cheques);
		if ($this->isColumnModified(DetalheLancamentoPeer::DEPOSITO)) $criteria->add(DetalheLancamentoPeer::DEPOSITO, $this->deposito);
		if ($this->isColumnModified(DetalheLancamentoPeer::DESPESA)) $criteria->add(DetalheLancamentoPeer::DESPESA, $this->despesa);
		if ($this->isColumnModified(DetalheLancamentoPeer::OUTRO)) $criteria->add(DetalheLancamentoPeer::OUTRO, $this->outro);
		if ($this->isColumnModified(DetalheLancamentoPeer::OBSERVACAO_OUTRO)) $criteria->add(DetalheLancamentoPeer::OBSERVACAO_OUTRO, $this->observacao_outro);
		if ($this->isColumnModified(DetalheLancamentoPeer::OBSERVACAO_DESPESA)) $criteria->add(DetalheLancamentoPeer::OBSERVACAO_DESPESA, $this->observacao_despesa);

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
		$criteria = new Criteria(DetalheLancamentoPeer::DATABASE_NAME);

		$criteria->add(DetalheLancamentoPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of DetalheLancamento (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setLancamentoCaixaId($this->lancamento_caixa_id);

		$copyObj->setCedulas($this->cedulas);

		$copyObj->setMoedas($this->moedas);

		$copyObj->setCheques($this->cheques);

		$copyObj->setDeposito($this->deposito);

		$copyObj->setDespesa($this->despesa);

		$copyObj->setOutro($this->outro);

		$copyObj->setObservacaoOutro($this->observacao_outro);

		$copyObj->setObservacaoDespesa($this->observacao_despesa);


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
	 * @return     DetalheLancamento Clone of current object.
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
	 * @return     DetalheLancamentoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new DetalheLancamentoPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a LancamentoCaixa object.
	 *
	 * @param      LancamentoCaixa $v
	 * @return     DetalheLancamento The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setLancamentoCaixa(LancamentoCaixa $v = null)
	{
		if ($v === null) {
			$this->setLancamentoCaixaId(NULL);
		} else {
			$this->setLancamentoCaixaId($v->getId());
		}

		$this->aLancamentoCaixa = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the LancamentoCaixa object, it will not be re-added.
		if ($v !== null) {
			$v->addDetalheLancamento($this);
		}

		return $this;
	}


	/**
	 * Get the associated LancamentoCaixa object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     LancamentoCaixa The associated LancamentoCaixa object.
	 * @throws     PropelException
	 */
	public function getLancamentoCaixa(PropelPDO $con = null)
	{
		if ($this->aLancamentoCaixa === null && ($this->lancamento_caixa_id !== null)) {
			$this->aLancamentoCaixa = LancamentoCaixaPeer::retrieveByPk($this->lancamento_caixa_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aLancamentoCaixa->addDetalheLancamentos($this);
			 */
		}
		return $this->aLancamentoCaixa;
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

			$this->aLancamentoCaixa = null;
	}

} // BaseDetalheLancamento
