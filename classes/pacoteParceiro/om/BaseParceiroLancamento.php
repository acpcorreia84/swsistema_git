<?php

/**
 * Base class that represents a row from the 'parceiro_lancamento' table.
 *
 * 
 *
 * @package    pacoteParceiro.om
 */
abstract class BaseParceiroLancamento extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ParceiroLancamentoPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

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
	 * The value for the tipo_lancamento field.
	 * @var        string
	 */
	protected $tipo_lancamento;

	/**
	 * The value for the valor field.
	 * @var        double
	 */
	protected $valor;

	/**
	 * The value for the observacao field.
	 * @var        string
	 */
	protected $observacao;

	/**
	 * The value for the parceiro_comissionamento_id field.
	 * @var        int
	 */
	protected $parceiro_comissionamento_id;

	/**
	 * The value for the situacao field.
	 * @var        int
	 */
	protected $situacao;

	/**
	 * @var        ParceiroComissionamento
	 */
	protected $aParceiroComissionamento;

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
	 * Get the [tipo_lancamento] column value.
	 * 
	 * @return     string
	 */
	public function getTipoLancamento()
	{
		return $this->tipo_lancamento;
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
	 * Get the [observacao] column value.
	 * 
	 * @return     string
	 */
	public function getObservacao()
	{
		return $this->observacao;
	}

	/**
	 * Get the [parceiro_comissionamento_id] column value.
	 * 
	 * @return     int
	 */
	public function getParceiroComissionamentoId()
	{
		return $this->parceiro_comissionamento_id;
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
	 * @return     ParceiroLancamento The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ParceiroLancamentoPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Sets the value of [data_lancamento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     ParceiroLancamento The current object (for fluent API support)
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
				$this->modifiedColumns[] = ParceiroLancamentoPeer::DATA_LANCAMENTO;
			}
		} // if either are not null

		return $this;
	} // setDataLancamento()

	/**
	 * Set the value of [descricao] column.
	 * 
	 * @param      string $v new value
	 * @return     ParceiroLancamento The current object (for fluent API support)
	 */
	public function setDescricao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->descricao !== $v) {
			$this->descricao = $v;
			$this->modifiedColumns[] = ParceiroLancamentoPeer::DESCRICAO;
		}

		return $this;
	} // setDescricao()

	/**
	 * Set the value of [tipo_lancamento] column.
	 * 
	 * @param      string $v new value
	 * @return     ParceiroLancamento The current object (for fluent API support)
	 */
	public function setTipoLancamento($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->tipo_lancamento !== $v) {
			$this->tipo_lancamento = $v;
			$this->modifiedColumns[] = ParceiroLancamentoPeer::TIPO_LANCAMENTO;
		}

		return $this;
	} // setTipoLancamento()

	/**
	 * Set the value of [valor] column.
	 * 
	 * @param      double $v new value
	 * @return     ParceiroLancamento The current object (for fluent API support)
	 */
	public function setValor($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->valor !== $v) {
			$this->valor = $v;
			$this->modifiedColumns[] = ParceiroLancamentoPeer::VALOR;
		}

		return $this;
	} // setValor()

	/**
	 * Set the value of [observacao] column.
	 * 
	 * @param      string $v new value
	 * @return     ParceiroLancamento The current object (for fluent API support)
	 */
	public function setObservacao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->observacao !== $v) {
			$this->observacao = $v;
			$this->modifiedColumns[] = ParceiroLancamentoPeer::OBSERVACAO;
		}

		return $this;
	} // setObservacao()

	/**
	 * Set the value of [parceiro_comissionamento_id] column.
	 * 
	 * @param      int $v new value
	 * @return     ParceiroLancamento The current object (for fluent API support)
	 */
	public function setParceiroComissionamentoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->parceiro_comissionamento_id !== $v) {
			$this->parceiro_comissionamento_id = $v;
			$this->modifiedColumns[] = ParceiroLancamentoPeer::PARCEIRO_COMISSIONAMENTO_ID;
		}

		if ($this->aParceiroComissionamento !== null && $this->aParceiroComissionamento->getId() !== $v) {
			$this->aParceiroComissionamento = null;
		}

		return $this;
	} // setParceiroComissionamentoId()

	/**
	 * Set the value of [situacao] column.
	 * 
	 * @param      int $v new value
	 * @return     ParceiroLancamento The current object (for fluent API support)
	 */
	public function setSituacao($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->situacao !== $v) {
			$this->situacao = $v;
			$this->modifiedColumns[] = ParceiroLancamentoPeer::SITUACAO;
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
			$this->data_lancamento = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->descricao = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->tipo_lancamento = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->valor = ($row[$startcol + 4] !== null) ? (double) $row[$startcol + 4] : null;
			$this->observacao = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->parceiro_comissionamento_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->situacao = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 8; // 8 = ParceiroLancamentoPeer::NUM_COLUMNS - ParceiroLancamentoPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating ParceiroLancamento object", $e);
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

		if ($this->aParceiroComissionamento !== null && $this->parceiro_comissionamento_id !== $this->aParceiroComissionamento->getId()) {
			$this->aParceiroComissionamento = null;
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
			$con = Propel::getConnection(ParceiroLancamentoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ParceiroLancamentoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aParceiroComissionamento = null;
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
			$con = Propel::getConnection(ParceiroLancamentoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				ParceiroLancamentoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ParceiroLancamentoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				ParceiroLancamentoPeer::addInstanceToPool($this);
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

			if ($this->aParceiroComissionamento !== null) {
				if ($this->aParceiroComissionamento->isModified() || $this->aParceiroComissionamento->isNew()) {
					$affectedRows += $this->aParceiroComissionamento->save($con);
				}
				$this->setParceiroComissionamento($this->aParceiroComissionamento);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = ParceiroLancamentoPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ParceiroLancamentoPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += ParceiroLancamentoPeer::doUpdate($this, $con);
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

			if ($this->aParceiroComissionamento !== null) {
				if (!$this->aParceiroComissionamento->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aParceiroComissionamento->getValidationFailures());
				}
			}


			if (($retval = ParceiroLancamentoPeer::doValidate($this, $columns)) !== true) {
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
		$criteria = new Criteria(ParceiroLancamentoPeer::DATABASE_NAME);

		if ($this->isColumnModified(ParceiroLancamentoPeer::ID)) $criteria->add(ParceiroLancamentoPeer::ID, $this->id);
		if ($this->isColumnModified(ParceiroLancamentoPeer::DATA_LANCAMENTO)) $criteria->add(ParceiroLancamentoPeer::DATA_LANCAMENTO, $this->data_lancamento);
		if ($this->isColumnModified(ParceiroLancamentoPeer::DESCRICAO)) $criteria->add(ParceiroLancamentoPeer::DESCRICAO, $this->descricao);
		if ($this->isColumnModified(ParceiroLancamentoPeer::TIPO_LANCAMENTO)) $criteria->add(ParceiroLancamentoPeer::TIPO_LANCAMENTO, $this->tipo_lancamento);
		if ($this->isColumnModified(ParceiroLancamentoPeer::VALOR)) $criteria->add(ParceiroLancamentoPeer::VALOR, $this->valor);
		if ($this->isColumnModified(ParceiroLancamentoPeer::OBSERVACAO)) $criteria->add(ParceiroLancamentoPeer::OBSERVACAO, $this->observacao);
		if ($this->isColumnModified(ParceiroLancamentoPeer::PARCEIRO_COMISSIONAMENTO_ID)) $criteria->add(ParceiroLancamentoPeer::PARCEIRO_COMISSIONAMENTO_ID, $this->parceiro_comissionamento_id);
		if ($this->isColumnModified(ParceiroLancamentoPeer::SITUACAO)) $criteria->add(ParceiroLancamentoPeer::SITUACAO, $this->situacao);

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
		$criteria = new Criteria(ParceiroLancamentoPeer::DATABASE_NAME);

		$criteria->add(ParceiroLancamentoPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of ParceiroLancamento (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDataLancamento($this->data_lancamento);

		$copyObj->setDescricao($this->descricao);

		$copyObj->setTipoLancamento($this->tipo_lancamento);

		$copyObj->setValor($this->valor);

		$copyObj->setObservacao($this->observacao);

		$copyObj->setParceiroComissionamentoId($this->parceiro_comissionamento_id);

		$copyObj->setSituacao($this->situacao);


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
	 * @return     ParceiroLancamento Clone of current object.
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
	 * @return     ParceiroLancamentoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ParceiroLancamentoPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a ParceiroComissionamento object.
	 *
	 * @param      ParceiroComissionamento $v
	 * @return     ParceiroLancamento The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setParceiroComissionamento(ParceiroComissionamento $v = null)
	{
		if ($v === null) {
			$this->setParceiroComissionamentoId(NULL);
		} else {
			$this->setParceiroComissionamentoId($v->getId());
		}

		$this->aParceiroComissionamento = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the ParceiroComissionamento object, it will not be re-added.
		if ($v !== null) {
			$v->addParceiroLancamento($this);
		}

		return $this;
	}


	/**
	 * Get the associated ParceiroComissionamento object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     ParceiroComissionamento The associated ParceiroComissionamento object.
	 * @throws     PropelException
	 */
	public function getParceiroComissionamento(PropelPDO $con = null)
	{
		if ($this->aParceiroComissionamento === null && ($this->parceiro_comissionamento_id !== null)) {
			$this->aParceiroComissionamento = ParceiroComissionamentoPeer::retrieveByPk($this->parceiro_comissionamento_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aParceiroComissionamento->addParceiroLancamentos($this);
			 */
		}
		return $this->aParceiroComissionamento;
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

			$this->aParceiroComissionamento = null;
	}

} // BaseParceiroLancamento
