<?php

/**
 * Base class that represents a row from the 'banco' table.
 *
 * 
 *
 * @package    pacoteFinanceiro.om
 */
abstract class BaseBanco extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        BancoPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the codigo field.
	 * @var        string
	 */
	protected $codigo;

	/**
	 * The value for the nome field.
	 * @var        string
	 */
	protected $nome;

	/**
	 * @var        array DetalheCheque[] Collection to store aggregation of DetalheCheque objects.
	 */
	protected $collDetalheCheques;

	/**
	 * @var        Criteria The criteria used to select the current contents of collDetalheCheques.
	 */
	private $lastDetalheChequeCriteria = null;

	/**
	 * @var        array ContasReceber[] Collection to store aggregation of ContasReceber objects.
	 */
	protected $collContasRecebers;

	/**
	 * @var        Criteria The criteria used to select the current contents of collContasRecebers.
	 */
	private $lastContasReceberCriteria = null;

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
	 * Get the [codigo] column value.
	 * 
	 * @return     string
	 */
	public function getCodigo()
	{
		return $this->codigo;
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
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Banco The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = BancoPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [codigo] column.
	 * 
	 * @param      string $v new value
	 * @return     Banco The current object (for fluent API support)
	 */
	public function setCodigo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->codigo !== $v) {
			$this->codigo = $v;
			$this->modifiedColumns[] = BancoPeer::CODIGO;
		}

		return $this;
	} // setCodigo()

	/**
	 * Set the value of [nome] column.
	 * 
	 * @param      string $v new value
	 * @return     Banco The current object (for fluent API support)
	 */
	public function setNome($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome !== $v) {
			$this->nome = $v;
			$this->modifiedColumns[] = BancoPeer::NOME;
		}

		return $this;
	} // setNome()

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
			$this->codigo = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->nome = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 3; // 3 = BancoPeer::NUM_COLUMNS - BancoPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Banco object", $e);
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
			$con = Propel::getConnection(BancoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = BancoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collDetalheCheques = null;
			$this->lastDetalheChequeCriteria = null;

			$this->collContasRecebers = null;
			$this->lastContasReceberCriteria = null;

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
			$con = Propel::getConnection(BancoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				BancoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BancoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				BancoPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = BancoPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = BancoPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += BancoPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collDetalheCheques !== null) {
				foreach ($this->collDetalheCheques as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collContasRecebers !== null) {
				foreach ($this->collContasRecebers as $referrerFK) {
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


			if (($retval = BancoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collDetalheCheques !== null) {
					foreach ($this->collDetalheCheques as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collContasRecebers !== null) {
					foreach ($this->collContasRecebers as $referrerFK) {
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
		$criteria = new Criteria(BancoPeer::DATABASE_NAME);

		if ($this->isColumnModified(BancoPeer::ID)) $criteria->add(BancoPeer::ID, $this->id);
		if ($this->isColumnModified(BancoPeer::CODIGO)) $criteria->add(BancoPeer::CODIGO, $this->codigo);
		if ($this->isColumnModified(BancoPeer::NOME)) $criteria->add(BancoPeer::NOME, $this->nome);

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
		$criteria = new Criteria(BancoPeer::DATABASE_NAME);

		$criteria->add(BancoPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Banco (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setCodigo($this->codigo);

		$copyObj->setNome($this->nome);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getDetalheCheques() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addDetalheCheque($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getContasRecebers() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addContasReceber($relObj->copy($deepCopy));
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
	 * @return     Banco Clone of current object.
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
	 * @return     BancoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new BancoPeer();
		}
		return self::$peer;
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
	 * Otherwise if this Banco has previously been saved, it will retrieve
	 * related DetalheCheques from storage. If this Banco is new, it will return
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
			$criteria = new Criteria(BancoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetalheCheques === null) {
			if ($this->isNew()) {
			   $this->collDetalheCheques = array();
			} else {

				$criteria->add(DetalheChequePeer::BANCO_ID, $this->id);

				DetalheChequePeer::addSelectColumns($criteria);
				$this->collDetalheCheques = DetalheChequePeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(DetalheChequePeer::BANCO_ID, $this->id);

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
			$criteria = new Criteria(BancoPeer::DATABASE_NAME);
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

				$criteria->add(DetalheChequePeer::BANCO_ID, $this->id);

				$count = DetalheChequePeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(DetalheChequePeer::BANCO_ID, $this->id);

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
			$l->setBanco($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Banco is new, it will return
	 * an empty collection; or if this Banco has previously
	 * been saved, it will retrieve related DetalheCheques from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Banco.
	 */
	public function getDetalheChequesJoinLancamentoCaixa($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(BancoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetalheCheques === null) {
			if ($this->isNew()) {
				$this->collDetalheCheques = array();
			} else {

				$criteria->add(DetalheChequePeer::BANCO_ID, $this->id);

				$this->collDetalheCheques = DetalheChequePeer::doSelectJoinLancamentoCaixa($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(DetalheChequePeer::BANCO_ID, $this->id);

			if (!isset($this->lastDetalheChequeCriteria) || !$this->lastDetalheChequeCriteria->equals($criteria)) {
				$this->collDetalheCheques = DetalheChequePeer::doSelectJoinLancamentoCaixa($criteria, $con, $join_behavior);
			}
		}
		$this->lastDetalheChequeCriteria = $criteria;

		return $this->collDetalheCheques;
	}

	/**
	 * Clears out the collContasRecebers collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addContasRecebers()
	 */
	public function clearContasRecebers()
	{
		$this->collContasRecebers = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collContasRecebers collection (array).
	 *
	 * By default this just sets the collContasRecebers collection to an empty array (like clearcollContasRecebers());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initContasRecebers()
	{
		$this->collContasRecebers = array();
	}

	/**
	 * Gets an array of ContasReceber objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Banco has previously been saved, it will retrieve
	 * related ContasRecebers from storage. If this Banco is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ContasReceber[]
	 * @throws     PropelException
	 */
	public function getContasRecebers($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(BancoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasRecebers === null) {
			if ($this->isNew()) {
			   $this->collContasRecebers = array();
			} else {

				$criteria->add(ContasReceberPeer::BANCO_ID, $this->id);

				ContasReceberPeer::addSelectColumns($criteria);
				$this->collContasRecebers = ContasReceberPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ContasReceberPeer::BANCO_ID, $this->id);

				ContasReceberPeer::addSelectColumns($criteria);
				if (!isset($this->lastContasReceberCriteria) || !$this->lastContasReceberCriteria->equals($criteria)) {
					$this->collContasRecebers = ContasReceberPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastContasReceberCriteria = $criteria;
		return $this->collContasRecebers;
	}

	/**
	 * Returns the number of related ContasReceber objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ContasReceber objects.
	 * @throws     PropelException
	 */
	public function countContasRecebers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(BancoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collContasRecebers === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ContasReceberPeer::BANCO_ID, $this->id);

				$count = ContasReceberPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ContasReceberPeer::BANCO_ID, $this->id);

				if (!isset($this->lastContasReceberCriteria) || !$this->lastContasReceberCriteria->equals($criteria)) {
					$count = ContasReceberPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collContasRecebers);
				}
			} else {
				$count = count($this->collContasRecebers);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a ContasReceber object to this object
	 * through the ContasReceber foreign key attribute.
	 *
	 * @param      ContasReceber $l ContasReceber
	 * @return     void
	 * @throws     PropelException
	 */
	public function addContasReceber(ContasReceber $l)
	{
		if ($this->collContasRecebers === null) {
			$this->initContasRecebers();
		}
		if (!in_array($l, $this->collContasRecebers, true)) { // only add it if the **same** object is not already associated
			array_push($this->collContasRecebers, $l);
			$l->setBanco($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Banco is new, it will return
	 * an empty collection; or if this Banco has previously
	 * been saved, it will retrieve related ContasRecebers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Banco.
	 */
	public function getContasRecebersJoinContaContabil($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(BancoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasRecebers === null) {
			if ($this->isNew()) {
				$this->collContasRecebers = array();
			} else {

				$criteria->add(ContasReceberPeer::BANCO_ID, $this->id);

				$this->collContasRecebers = ContasReceberPeer::doSelectJoinContaContabil($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContasReceberPeer::BANCO_ID, $this->id);

			if (!isset($this->lastContasReceberCriteria) || !$this->lastContasReceberCriteria->equals($criteria)) {
				$this->collContasRecebers = ContasReceberPeer::doSelectJoinContaContabil($criteria, $con, $join_behavior);
			}
		}
		$this->lastContasReceberCriteria = $criteria;

		return $this->collContasRecebers;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Banco is new, it will return
	 * an empty collection; or if this Banco has previously
	 * been saved, it will retrieve related ContasRecebers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Banco.
	 */
	public function getContasRecebersJoinPedido($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(BancoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasRecebers === null) {
			if ($this->isNew()) {
				$this->collContasRecebers = array();
			} else {

				$criteria->add(ContasReceberPeer::BANCO_ID, $this->id);

				$this->collContasRecebers = ContasReceberPeer::doSelectJoinPedido($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContasReceberPeer::BANCO_ID, $this->id);

			if (!isset($this->lastContasReceberCriteria) || !$this->lastContasReceberCriteria->equals($criteria)) {
				$this->collContasRecebers = ContasReceberPeer::doSelectJoinPedido($criteria, $con, $join_behavior);
			}
		}
		$this->lastContasReceberCriteria = $criteria;

		return $this->collContasRecebers;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Banco is new, it will return
	 * an empty collection; or if this Banco has previously
	 * been saved, it will retrieve related ContasRecebers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Banco.
	 */
	public function getContasRecebersJoinCertificado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(BancoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasRecebers === null) {
			if ($this->isNew()) {
				$this->collContasRecebers = array();
			} else {

				$criteria->add(ContasReceberPeer::BANCO_ID, $this->id);

				$this->collContasRecebers = ContasReceberPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContasReceberPeer::BANCO_ID, $this->id);

			if (!isset($this->lastContasReceberCriteria) || !$this->lastContasReceberCriteria->equals($criteria)) {
				$this->collContasRecebers = ContasReceberPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		}
		$this->lastContasReceberCriteria = $criteria;

		return $this->collContasRecebers;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Banco is new, it will return
	 * an empty collection; or if this Banco has previously
	 * been saved, it will retrieve related ContasRecebers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Banco.
	 */
	public function getContasRecebersJoinFormaPagamento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(BancoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasRecebers === null) {
			if ($this->isNew()) {
				$this->collContasRecebers = array();
			} else {

				$criteria->add(ContasReceberPeer::BANCO_ID, $this->id);

				$this->collContasRecebers = ContasReceberPeer::doSelectJoinFormaPagamento($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContasReceberPeer::BANCO_ID, $this->id);

			if (!isset($this->lastContasReceberCriteria) || !$this->lastContasReceberCriteria->equals($criteria)) {
				$this->collContasRecebers = ContasReceberPeer::doSelectJoinFormaPagamento($criteria, $con, $join_behavior);
			}
		}
		$this->lastContasReceberCriteria = $criteria;

		return $this->collContasRecebers;
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
			if ($this->collDetalheCheques) {
				foreach ((array) $this->collDetalheCheques as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collContasRecebers) {
				foreach ((array) $this->collContasRecebers as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collDetalheCheques = null;
		$this->collContasRecebers = null;
	}

} // BaseBanco
