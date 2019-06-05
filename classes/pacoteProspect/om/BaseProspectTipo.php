<?php

/**
 * Base class that represents a row from the 'prospect_tipo' table.
 *
 * 
 *
 * @package    pacoteProspect.om
 */
abstract class BaseProspectTipo extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ProspectTipoPeer
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
	 * The value for the situacao field.
	 * @var        int
	 */
	protected $situacao;

	/**
	 * @var        array Prospect[] Collection to store aggregation of Prospect objects.
	 */
	protected $collProspects;

	/**
	 * @var        Criteria The criteria used to select the current contents of collProspects.
	 */
	private $lastProspectCriteria = null;

	/**
	 * @var        array ProspectMeta[] Collection to store aggregation of ProspectMeta objects.
	 */
	protected $collProspectMetas;

	/**
	 * @var        Criteria The criteria used to select the current contents of collProspectMetas.
	 */
	private $lastProspectMetaCriteria = null;

	/**
	 * @var        array ProspectContato[] Collection to store aggregation of ProspectContato objects.
	 */
	protected $collProspectContatos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collProspectContatos.
	 */
	private $lastProspectContatoCriteria = null;

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
	 * @return     ProspectTipo The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ProspectTipoPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [descricao] column.
	 * 
	 * @param      string $v new value
	 * @return     ProspectTipo The current object (for fluent API support)
	 */
	public function setDescricao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->descricao !== $v) {
			$this->descricao = $v;
			$this->modifiedColumns[] = ProspectTipoPeer::DESCRICAO;
		}

		return $this;
	} // setDescricao()

	/**
	 * Set the value of [situacao] column.
	 * 
	 * @param      int $v new value
	 * @return     ProspectTipo The current object (for fluent API support)
	 */
	public function setSituacao($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->situacao !== $v) {
			$this->situacao = $v;
			$this->modifiedColumns[] = ProspectTipoPeer::SITUACAO;
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
			$this->situacao = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 3; // 3 = ProspectTipoPeer::NUM_COLUMNS - ProspectTipoPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating ProspectTipo object", $e);
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
			$con = Propel::getConnection(ProspectTipoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ProspectTipoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collProspects = null;
			$this->lastProspectCriteria = null;

			$this->collProspectMetas = null;
			$this->lastProspectMetaCriteria = null;

			$this->collProspectContatos = null;
			$this->lastProspectContatoCriteria = null;

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
			$con = Propel::getConnection(ProspectTipoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				ProspectTipoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ProspectTipoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				ProspectTipoPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = ProspectTipoPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ProspectTipoPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += ProspectTipoPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collProspects !== null) {
				foreach ($this->collProspects as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collProspectMetas !== null) {
				foreach ($this->collProspectMetas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collProspectContatos !== null) {
				foreach ($this->collProspectContatos as $referrerFK) {
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


			if (($retval = ProspectTipoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collProspects !== null) {
					foreach ($this->collProspects as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collProspectMetas !== null) {
					foreach ($this->collProspectMetas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collProspectContatos !== null) {
					foreach ($this->collProspectContatos as $referrerFK) {
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
		$criteria = new Criteria(ProspectTipoPeer::DATABASE_NAME);

		if ($this->isColumnModified(ProspectTipoPeer::ID)) $criteria->add(ProspectTipoPeer::ID, $this->id);
		if ($this->isColumnModified(ProspectTipoPeer::DESCRICAO)) $criteria->add(ProspectTipoPeer::DESCRICAO, $this->descricao);
		if ($this->isColumnModified(ProspectTipoPeer::SITUACAO)) $criteria->add(ProspectTipoPeer::SITUACAO, $this->situacao);

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
		$criteria = new Criteria(ProspectTipoPeer::DATABASE_NAME);

		$criteria->add(ProspectTipoPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of ProspectTipo (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDescricao($this->descricao);

		$copyObj->setSituacao($this->situacao);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getProspects() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addProspect($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getProspectMetas() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addProspectMeta($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getProspectContatos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addProspectContato($relObj->copy($deepCopy));
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
	 * @return     ProspectTipo Clone of current object.
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
	 * @return     ProspectTipoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ProspectTipoPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears out the collProspects collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addProspects()
	 */
	public function clearProspects()
	{
		$this->collProspects = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collProspects collection (array).
	 *
	 * By default this just sets the collProspects collection to an empty array (like clearcollProspects());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initProspects()
	{
		$this->collProspects = array();
	}

	/**
	 * Gets an array of Prospect objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this ProspectTipo has previously been saved, it will retrieve
	 * related Prospects from storage. If this ProspectTipo is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Prospect[]
	 * @throws     PropelException
	 */
	public function getProspects($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProspectTipoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspects === null) {
			if ($this->isNew()) {
			   $this->collProspects = array();
			} else {

				$criteria->add(ProspectPeer::PROSPECT_TIPO_ID, $this->id);

				ProspectPeer::addSelectColumns($criteria);
				$this->collProspects = ProspectPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ProspectPeer::PROSPECT_TIPO_ID, $this->id);

				ProspectPeer::addSelectColumns($criteria);
				if (!isset($this->lastProspectCriteria) || !$this->lastProspectCriteria->equals($criteria)) {
					$this->collProspects = ProspectPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProspectCriteria = $criteria;
		return $this->collProspects;
	}

	/**
	 * Returns the number of related Prospect objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Prospect objects.
	 * @throws     PropelException
	 */
	public function countProspects(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProspectTipoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collProspects === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ProspectPeer::PROSPECT_TIPO_ID, $this->id);

				$count = ProspectPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ProspectPeer::PROSPECT_TIPO_ID, $this->id);

				if (!isset($this->lastProspectCriteria) || !$this->lastProspectCriteria->equals($criteria)) {
					$count = ProspectPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collProspects);
				}
			} else {
				$count = count($this->collProspects);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a Prospect object to this object
	 * through the Prospect foreign key attribute.
	 *
	 * @param      Prospect $l Prospect
	 * @return     void
	 * @throws     PropelException
	 */
	public function addProspect(Prospect $l)
	{
		if ($this->collProspects === null) {
			$this->initProspects();
		}
		if (!in_array($l, $this->collProspects, true)) { // only add it if the **same** object is not already associated
			array_push($this->collProspects, $l);
			$l->setProspectTipo($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ProspectTipo is new, it will return
	 * an empty collection; or if this ProspectTipo has previously
	 * been saved, it will retrieve related Prospects from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ProspectTipo.
	 */
	public function getProspectsJoinContador($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProspectTipoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspects === null) {
			if ($this->isNew()) {
				$this->collProspects = array();
			} else {

				$criteria->add(ProspectPeer::PROSPECT_TIPO_ID, $this->id);

				$this->collProspects = ProspectPeer::doSelectJoinContador($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectPeer::PROSPECT_TIPO_ID, $this->id);

			if (!isset($this->lastProspectCriteria) || !$this->lastProspectCriteria->equals($criteria)) {
				$this->collProspects = ProspectPeer::doSelectJoinContador($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectCriteria = $criteria;

		return $this->collProspects;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ProspectTipo is new, it will return
	 * an empty collection; or if this ProspectTipo has previously
	 * been saved, it will retrieve related Prospects from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ProspectTipo.
	 */
	public function getProspectsJoinCertificado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProspectTipoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspects === null) {
			if ($this->isNew()) {
				$this->collProspects = array();
			} else {

				$criteria->add(ProspectPeer::PROSPECT_TIPO_ID, $this->id);

				$this->collProspects = ProspectPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectPeer::PROSPECT_TIPO_ID, $this->id);

			if (!isset($this->lastProspectCriteria) || !$this->lastProspectCriteria->equals($criteria)) {
				$this->collProspects = ProspectPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectCriteria = $criteria;

		return $this->collProspects;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ProspectTipo is new, it will return
	 * an empty collection; or if this ProspectTipo has previously
	 * been saved, it will retrieve related Prospects from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ProspectTipo.
	 */
	public function getProspectsJoinUsuarioRelatedByUsuarioId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProspectTipoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspects === null) {
			if ($this->isNew()) {
				$this->collProspects = array();
			} else {

				$criteria->add(ProspectPeer::PROSPECT_TIPO_ID, $this->id);

				$this->collProspects = ProspectPeer::doSelectJoinUsuarioRelatedByUsuarioId($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectPeer::PROSPECT_TIPO_ID, $this->id);

			if (!isset($this->lastProspectCriteria) || !$this->lastProspectCriteria->equals($criteria)) {
				$this->collProspects = ProspectPeer::doSelectJoinUsuarioRelatedByUsuarioId($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectCriteria = $criteria;

		return $this->collProspects;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ProspectTipo is new, it will return
	 * an empty collection; or if this ProspectTipo has previously
	 * been saved, it will retrieve related Prospects from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ProspectTipo.
	 */
	public function getProspectsJoinUsuarioRelatedBySupervisorUsuarioId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProspectTipoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspects === null) {
			if ($this->isNew()) {
				$this->collProspects = array();
			} else {

				$criteria->add(ProspectPeer::PROSPECT_TIPO_ID, $this->id);

				$this->collProspects = ProspectPeer::doSelectJoinUsuarioRelatedBySupervisorUsuarioId($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectPeer::PROSPECT_TIPO_ID, $this->id);

			if (!isset($this->lastProspectCriteria) || !$this->lastProspectCriteria->equals($criteria)) {
				$this->collProspects = ProspectPeer::doSelectJoinUsuarioRelatedBySupervisorUsuarioId($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectCriteria = $criteria;

		return $this->collProspects;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ProspectTipo is new, it will return
	 * an empty collection; or if this ProspectTipo has previously
	 * been saved, it will retrieve related Prospects from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ProspectTipo.
	 */
	public function getProspectsJoinProspectContato($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProspectTipoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspects === null) {
			if ($this->isNew()) {
				$this->collProspects = array();
			} else {

				$criteria->add(ProspectPeer::PROSPECT_TIPO_ID, $this->id);

				$this->collProspects = ProspectPeer::doSelectJoinProspectContato($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectPeer::PROSPECT_TIPO_ID, $this->id);

			if (!isset($this->lastProspectCriteria) || !$this->lastProspectCriteria->equals($criteria)) {
				$this->collProspects = ProspectPeer::doSelectJoinProspectContato($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectCriteria = $criteria;

		return $this->collProspects;
	}

	/**
	 * Clears out the collProspectMetas collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addProspectMetas()
	 */
	public function clearProspectMetas()
	{
		$this->collProspectMetas = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collProspectMetas collection (array).
	 *
	 * By default this just sets the collProspectMetas collection to an empty array (like clearcollProspectMetas());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initProspectMetas()
	{
		$this->collProspectMetas = array();
	}

	/**
	 * Gets an array of ProspectMeta objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this ProspectTipo has previously been saved, it will retrieve
	 * related ProspectMetas from storage. If this ProspectTipo is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ProspectMeta[]
	 * @throws     PropelException
	 */
	public function getProspectMetas($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProspectTipoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectMetas === null) {
			if ($this->isNew()) {
			   $this->collProspectMetas = array();
			} else {

				$criteria->add(ProspectMetaPeer::PROSPECT_TIPO_ID, $this->id);

				ProspectMetaPeer::addSelectColumns($criteria);
				$this->collProspectMetas = ProspectMetaPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ProspectMetaPeer::PROSPECT_TIPO_ID, $this->id);

				ProspectMetaPeer::addSelectColumns($criteria);
				if (!isset($this->lastProspectMetaCriteria) || !$this->lastProspectMetaCriteria->equals($criteria)) {
					$this->collProspectMetas = ProspectMetaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProspectMetaCriteria = $criteria;
		return $this->collProspectMetas;
	}

	/**
	 * Returns the number of related ProspectMeta objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ProspectMeta objects.
	 * @throws     PropelException
	 */
	public function countProspectMetas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProspectTipoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collProspectMetas === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ProspectMetaPeer::PROSPECT_TIPO_ID, $this->id);

				$count = ProspectMetaPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ProspectMetaPeer::PROSPECT_TIPO_ID, $this->id);

				if (!isset($this->lastProspectMetaCriteria) || !$this->lastProspectMetaCriteria->equals($criteria)) {
					$count = ProspectMetaPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collProspectMetas);
				}
			} else {
				$count = count($this->collProspectMetas);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a ProspectMeta object to this object
	 * through the ProspectMeta foreign key attribute.
	 *
	 * @param      ProspectMeta $l ProspectMeta
	 * @return     void
	 * @throws     PropelException
	 */
	public function addProspectMeta(ProspectMeta $l)
	{
		if ($this->collProspectMetas === null) {
			$this->initProspectMetas();
		}
		if (!in_array($l, $this->collProspectMetas, true)) { // only add it if the **same** object is not already associated
			array_push($this->collProspectMetas, $l);
			$l->setProspectTipo($this);
		}
	}

	/**
	 * Clears out the collProspectContatos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addProspectContatos()
	 */
	public function clearProspectContatos()
	{
		$this->collProspectContatos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collProspectContatos collection (array).
	 *
	 * By default this just sets the collProspectContatos collection to an empty array (like clearcollProspectContatos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initProspectContatos()
	{
		$this->collProspectContatos = array();
	}

	/**
	 * Gets an array of ProspectContato objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this ProspectTipo has previously been saved, it will retrieve
	 * related ProspectContatos from storage. If this ProspectTipo is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ProspectContato[]
	 * @throws     PropelException
	 */
	public function getProspectContatos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProspectTipoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectContatos === null) {
			if ($this->isNew()) {
			   $this->collProspectContatos = array();
			} else {

				$criteria->add(ProspectContatoPeer::PROSPECT_TIPO_ID, $this->id);

				ProspectContatoPeer::addSelectColumns($criteria);
				$this->collProspectContatos = ProspectContatoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ProspectContatoPeer::PROSPECT_TIPO_ID, $this->id);

				ProspectContatoPeer::addSelectColumns($criteria);
				if (!isset($this->lastProspectContatoCriteria) || !$this->lastProspectContatoCriteria->equals($criteria)) {
					$this->collProspectContatos = ProspectContatoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProspectContatoCriteria = $criteria;
		return $this->collProspectContatos;
	}

	/**
	 * Returns the number of related ProspectContato objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ProspectContato objects.
	 * @throws     PropelException
	 */
	public function countProspectContatos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProspectTipoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collProspectContatos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ProspectContatoPeer::PROSPECT_TIPO_ID, $this->id);

				$count = ProspectContatoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ProspectContatoPeer::PROSPECT_TIPO_ID, $this->id);

				if (!isset($this->lastProspectContatoCriteria) || !$this->lastProspectContatoCriteria->equals($criteria)) {
					$count = ProspectContatoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collProspectContatos);
				}
			} else {
				$count = count($this->collProspectContatos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a ProspectContato object to this object
	 * through the ProspectContato foreign key attribute.
	 *
	 * @param      ProspectContato $l ProspectContato
	 * @return     void
	 * @throws     PropelException
	 */
	public function addProspectContato(ProspectContato $l)
	{
		if ($this->collProspectContatos === null) {
			$this->initProspectContatos();
		}
		if (!in_array($l, $this->collProspectContatos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collProspectContatos, $l);
			$l->setProspectTipo($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ProspectTipo is new, it will return
	 * an empty collection; or if this ProspectTipo has previously
	 * been saved, it will retrieve related ProspectContatos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ProspectTipo.
	 */
	public function getProspectContatosJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProspectTipoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectContatos === null) {
			if ($this->isNew()) {
				$this->collProspectContatos = array();
			} else {

				$criteria->add(ProspectContatoPeer::PROSPECT_TIPO_ID, $this->id);

				$this->collProspectContatos = ProspectContatoPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectContatoPeer::PROSPECT_TIPO_ID, $this->id);

			if (!isset($this->lastProspectContatoCriteria) || !$this->lastProspectContatoCriteria->equals($criteria)) {
				$this->collProspectContatos = ProspectContatoPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectContatoCriteria = $criteria;

		return $this->collProspectContatos;
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
			if ($this->collProspects) {
				foreach ((array) $this->collProspects as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collProspectMetas) {
				foreach ((array) $this->collProspectMetas as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collProspectContatos) {
				foreach ((array) $this->collProspectContatos as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collProspects = null;
		$this->collProspectMetas = null;
		$this->collProspectContatos = null;
	}

} // BaseProspectTipo
