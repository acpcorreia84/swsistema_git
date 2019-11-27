<?php

/**
 * Base class that represents a row from the 'forma_pagamento' table.
 *
 * 
 *
 * @package    pacoteFinanceiro.om
 */
abstract class BaseFormaPagamento extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        FormaPagamentoPeer
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
	 * @var        array Certificado[] Collection to store aggregation of Certificado objects.
	 */
	protected $collCertificados;

	/**
	 * @var        Criteria The criteria used to select the current contents of collCertificados.
	 */
	private $lastCertificadoCriteria = null;

	/**
	 * @var        array CertificadoPagamento[] Collection to store aggregation of CertificadoPagamento objects.
	 */
	protected $collCertificadoPagamentos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collCertificadoPagamentos.
	 */
	private $lastCertificadoPagamentoCriteria = null;

	/**
	 * @var        array Pedido[] Collection to store aggregation of Pedido objects.
	 */
	protected $collPedidos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collPedidos.
	 */
	private $lastPedidoCriteria = null;

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
	 * @return     FormaPagamento The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FormaPagamentoPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [nome] column.
	 * 
	 * @param      string $v new value
	 * @return     FormaPagamento The current object (for fluent API support)
	 */
	public function setNome($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome !== $v) {
			$this->nome = $v;
			$this->modifiedColumns[] = FormaPagamentoPeer::NOME;
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
			$this->nome = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 2; // 2 = FormaPagamentoPeer::NUM_COLUMNS - FormaPagamentoPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating FormaPagamento object", $e);
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
			$con = Propel::getConnection(FormaPagamentoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = FormaPagamentoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collCertificados = null;
			$this->lastCertificadoCriteria = null;

			$this->collCertificadoPagamentos = null;
			$this->lastCertificadoPagamentoCriteria = null;

			$this->collPedidos = null;
			$this->lastPedidoCriteria = null;

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
			$con = Propel::getConnection(FormaPagamentoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				FormaPagamentoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FormaPagamentoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				FormaPagamentoPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = FormaPagamentoPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FormaPagamentoPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += FormaPagamentoPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collCertificados !== null) {
				foreach ($this->collCertificados as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCertificadoPagamentos !== null) {
				foreach ($this->collCertificadoPagamentos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collPedidos !== null) {
				foreach ($this->collPedidos as $referrerFK) {
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


			if (($retval = FormaPagamentoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCertificados !== null) {
					foreach ($this->collCertificados as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCertificadoPagamentos !== null) {
					foreach ($this->collCertificadoPagamentos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collPedidos !== null) {
					foreach ($this->collPedidos as $referrerFK) {
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
		$criteria = new Criteria(FormaPagamentoPeer::DATABASE_NAME);

		if ($this->isColumnModified(FormaPagamentoPeer::ID)) $criteria->add(FormaPagamentoPeer::ID, $this->id);
		if ($this->isColumnModified(FormaPagamentoPeer::NOME)) $criteria->add(FormaPagamentoPeer::NOME, $this->nome);

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
		$criteria = new Criteria(FormaPagamentoPeer::DATABASE_NAME);

		$criteria->add(FormaPagamentoPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of FormaPagamento (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNome($this->nome);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getCertificados() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCertificado($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCertificadoPagamentos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCertificadoPagamento($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getPedidos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addPedido($relObj->copy($deepCopy));
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
	 * @return     FormaPagamento Clone of current object.
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
	 * @return     FormaPagamentoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new FormaPagamentoPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears out the collCertificados collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCertificados()
	 */
	public function clearCertificados()
	{
		$this->collCertificados = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCertificados collection (array).
	 *
	 * By default this just sets the collCertificados collection to an empty array (like clearcollCertificados());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCertificados()
	{
		$this->collCertificados = array();
	}

	/**
	 * Gets an array of Certificado objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this FormaPagamento has previously been saved, it will retrieve
	 * related Certificados from storage. If this FormaPagamento is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Certificado[]
	 * @throws     PropelException
	 */
	public function getCertificados($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(FormaPagamentoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
			   $this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::FORMA_PAGAMENTO_ID, $this->id);

				CertificadoPeer::addSelectColumns($criteria);
				$this->collCertificados = CertificadoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(CertificadoPeer::FORMA_PAGAMENTO_ID, $this->id);

				CertificadoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
					$this->collCertificados = CertificadoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCertificadoCriteria = $criteria;
		return $this->collCertificados;
	}

	/**
	 * Returns the number of related Certificado objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Certificado objects.
	 * @throws     PropelException
	 */
	public function countCertificados(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(FormaPagamentoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(CertificadoPeer::FORMA_PAGAMENTO_ID, $this->id);

				$count = CertificadoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(CertificadoPeer::FORMA_PAGAMENTO_ID, $this->id);

				if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
					$count = CertificadoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collCertificados);
				}
			} else {
				$count = count($this->collCertificados);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a Certificado object to this object
	 * through the Certificado foreign key attribute.
	 *
	 * @param      Certificado $l Certificado
	 * @return     void
	 * @throws     PropelException
	 */
	public function addCertificado(Certificado $l)
	{
		if ($this->collCertificados === null) {
			$this->initCertificados();
		}
		if (!in_array($l, $this->collCertificados, true)) { // only add it if the **same** object is not already associated
			array_push($this->collCertificados, $l);
			$l->setFormaPagamento($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this FormaPagamento is new, it will return
	 * an empty collection; or if this FormaPagamento has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in FormaPagamento.
	 */
	public function getCertificadosJoinSituacao($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(FormaPagamentoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::FORMA_PAGAMENTO_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinSituacao($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::FORMA_PAGAMENTO_ID, $this->id);

			if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
				$this->collCertificados = CertificadoPeer::doSelectJoinSituacao($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoCriteria = $criteria;

		return $this->collCertificados;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this FormaPagamento is new, it will return
	 * an empty collection; or if this FormaPagamento has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in FormaPagamento.
	 */
	public function getCertificadosJoinParceiro($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(FormaPagamentoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::FORMA_PAGAMENTO_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinParceiro($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::FORMA_PAGAMENTO_ID, $this->id);

			if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
				$this->collCertificados = CertificadoPeer::doSelectJoinParceiro($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoCriteria = $criteria;

		return $this->collCertificados;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this FormaPagamento is new, it will return
	 * an empty collection; or if this FormaPagamento has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in FormaPagamento.
	 */
	public function getCertificadosJoinContador($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(FormaPagamentoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::FORMA_PAGAMENTO_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinContador($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::FORMA_PAGAMENTO_ID, $this->id);

			if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
				$this->collCertificados = CertificadoPeer::doSelectJoinContador($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoCriteria = $criteria;

		return $this->collCertificados;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this FormaPagamento is new, it will return
	 * an empty collection; or if this FormaPagamento has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in FormaPagamento.
	 */
	public function getCertificadosJoinLocal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(FormaPagamentoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::FORMA_PAGAMENTO_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinLocal($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::FORMA_PAGAMENTO_ID, $this->id);

			if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
				$this->collCertificados = CertificadoPeer::doSelectJoinLocal($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoCriteria = $criteria;

		return $this->collCertificados;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this FormaPagamento is new, it will return
	 * an empty collection; or if this FormaPagamento has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in FormaPagamento.
	 */
	public function getCertificadosJoinProduto($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(FormaPagamentoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::FORMA_PAGAMENTO_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinProduto($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::FORMA_PAGAMENTO_ID, $this->id);

			if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
				$this->collCertificados = CertificadoPeer::doSelectJoinProduto($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoCriteria = $criteria;

		return $this->collCertificados;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this FormaPagamento is new, it will return
	 * an empty collection; or if this FormaPagamento has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in FormaPagamento.
	 */
	public function getCertificadosJoinCliente($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(FormaPagamentoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::FORMA_PAGAMENTO_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinCliente($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::FORMA_PAGAMENTO_ID, $this->id);

			if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
				$this->collCertificados = CertificadoPeer::doSelectJoinCliente($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoCriteria = $criteria;

		return $this->collCertificados;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this FormaPagamento is new, it will return
	 * an empty collection; or if this FormaPagamento has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in FormaPagamento.
	 */
	public function getCertificadosJoinUsuarioRelatedByUsuarioId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(FormaPagamentoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::FORMA_PAGAMENTO_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinUsuarioRelatedByUsuarioId($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::FORMA_PAGAMENTO_ID, $this->id);

			if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
				$this->collCertificados = CertificadoPeer::doSelectJoinUsuarioRelatedByUsuarioId($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoCriteria = $criteria;

		return $this->collCertificados;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this FormaPagamento is new, it will return
	 * an empty collection; or if this FormaPagamento has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in FormaPagamento.
	 */
	public function getCertificadosJoinUsuarioRelatedByUsuarioValidouId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(FormaPagamentoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::FORMA_PAGAMENTO_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinUsuarioRelatedByUsuarioValidouId($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::FORMA_PAGAMENTO_ID, $this->id);

			if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
				$this->collCertificados = CertificadoPeer::doSelectJoinUsuarioRelatedByUsuarioValidouId($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoCriteria = $criteria;

		return $this->collCertificados;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this FormaPagamento is new, it will return
	 * an empty collection; or if this FormaPagamento has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in FormaPagamento.
	 */
	public function getCertificadosJoinCertificadoRelatedByCertificadoRenovado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(FormaPagamentoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::FORMA_PAGAMENTO_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinCertificadoRelatedByCertificadoRenovado($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::FORMA_PAGAMENTO_ID, $this->id);

			if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
				$this->collCertificados = CertificadoPeer::doSelectJoinCertificadoRelatedByCertificadoRenovado($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoCriteria = $criteria;

		return $this->collCertificados;
	}

	/**
	 * Clears out the collCertificadoPagamentos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCertificadoPagamentos()
	 */
	public function clearCertificadoPagamentos()
	{
		$this->collCertificadoPagamentos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCertificadoPagamentos collection (array).
	 *
	 * By default this just sets the collCertificadoPagamentos collection to an empty array (like clearcollCertificadoPagamentos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCertificadoPagamentos()
	{
		$this->collCertificadoPagamentos = array();
	}

	/**
	 * Gets an array of CertificadoPagamento objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this FormaPagamento has previously been saved, it will retrieve
	 * related CertificadoPagamentos from storage. If this FormaPagamento is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array CertificadoPagamento[]
	 * @throws     PropelException
	 */
	public function getCertificadoPagamentos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(FormaPagamentoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadoPagamentos === null) {
			if ($this->isNew()) {
			   $this->collCertificadoPagamentos = array();
			} else {

				$criteria->add(CertificadoPagamentoPeer::FORMA_PAGAMENTO_ID, $this->id);

				CertificadoPagamentoPeer::addSelectColumns($criteria);
				$this->collCertificadoPagamentos = CertificadoPagamentoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(CertificadoPagamentoPeer::FORMA_PAGAMENTO_ID, $this->id);

				CertificadoPagamentoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCertificadoPagamentoCriteria) || !$this->lastCertificadoPagamentoCriteria->equals($criteria)) {
					$this->collCertificadoPagamentos = CertificadoPagamentoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCertificadoPagamentoCriteria = $criteria;
		return $this->collCertificadoPagamentos;
	}

	/**
	 * Returns the number of related CertificadoPagamento objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related CertificadoPagamento objects.
	 * @throws     PropelException
	 */
	public function countCertificadoPagamentos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(FormaPagamentoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collCertificadoPagamentos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(CertificadoPagamentoPeer::FORMA_PAGAMENTO_ID, $this->id);

				$count = CertificadoPagamentoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(CertificadoPagamentoPeer::FORMA_PAGAMENTO_ID, $this->id);

				if (!isset($this->lastCertificadoPagamentoCriteria) || !$this->lastCertificadoPagamentoCriteria->equals($criteria)) {
					$count = CertificadoPagamentoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collCertificadoPagamentos);
				}
			} else {
				$count = count($this->collCertificadoPagamentos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a CertificadoPagamento object to this object
	 * through the CertificadoPagamento foreign key attribute.
	 *
	 * @param      CertificadoPagamento $l CertificadoPagamento
	 * @return     void
	 * @throws     PropelException
	 */
	public function addCertificadoPagamento(CertificadoPagamento $l)
	{
		if ($this->collCertificadoPagamentos === null) {
			$this->initCertificadoPagamentos();
		}
		if (!in_array($l, $this->collCertificadoPagamentos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collCertificadoPagamentos, $l);
			$l->setFormaPagamento($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this FormaPagamento is new, it will return
	 * an empty collection; or if this FormaPagamento has previously
	 * been saved, it will retrieve related CertificadoPagamentos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in FormaPagamento.
	 */
	public function getCertificadoPagamentosJoinCertificado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(FormaPagamentoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadoPagamentos === null) {
			if ($this->isNew()) {
				$this->collCertificadoPagamentos = array();
			} else {

				$criteria->add(CertificadoPagamentoPeer::FORMA_PAGAMENTO_ID, $this->id);

				$this->collCertificadoPagamentos = CertificadoPagamentoPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPagamentoPeer::FORMA_PAGAMENTO_ID, $this->id);

			if (!isset($this->lastCertificadoPagamentoCriteria) || !$this->lastCertificadoPagamentoCriteria->equals($criteria)) {
				$this->collCertificadoPagamentos = CertificadoPagamentoPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoPagamentoCriteria = $criteria;

		return $this->collCertificadoPagamentos;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this FormaPagamento is new, it will return
	 * an empty collection; or if this FormaPagamento has previously
	 * been saved, it will retrieve related CertificadoPagamentos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in FormaPagamento.
	 */
	public function getCertificadoPagamentosJoinPedido($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(FormaPagamentoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadoPagamentos === null) {
			if ($this->isNew()) {
				$this->collCertificadoPagamentos = array();
			} else {

				$criteria->add(CertificadoPagamentoPeer::FORMA_PAGAMENTO_ID, $this->id);

				$this->collCertificadoPagamentos = CertificadoPagamentoPeer::doSelectJoinPedido($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPagamentoPeer::FORMA_PAGAMENTO_ID, $this->id);

			if (!isset($this->lastCertificadoPagamentoCriteria) || !$this->lastCertificadoPagamentoCriteria->equals($criteria)) {
				$this->collCertificadoPagamentos = CertificadoPagamentoPeer::doSelectJoinPedido($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoPagamentoCriteria = $criteria;

		return $this->collCertificadoPagamentos;
	}

	/**
	 * Clears out the collPedidos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addPedidos()
	 */
	public function clearPedidos()
	{
		$this->collPedidos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collPedidos collection (array).
	 *
	 * By default this just sets the collPedidos collection to an empty array (like clearcollPedidos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initPedidos()
	{
		$this->collPedidos = array();
	}

	/**
	 * Gets an array of Pedido objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this FormaPagamento has previously been saved, it will retrieve
	 * related Pedidos from storage. If this FormaPagamento is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Pedido[]
	 * @throws     PropelException
	 */
	public function getPedidos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(FormaPagamentoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPedidos === null) {
			if ($this->isNew()) {
			   $this->collPedidos = array();
			} else {

				$criteria->add(PedidoPeer::FORMA_PAGAMENTO_ID, $this->id);

				PedidoPeer::addSelectColumns($criteria);
				$this->collPedidos = PedidoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(PedidoPeer::FORMA_PAGAMENTO_ID, $this->id);

				PedidoPeer::addSelectColumns($criteria);
				if (!isset($this->lastPedidoCriteria) || !$this->lastPedidoCriteria->equals($criteria)) {
					$this->collPedidos = PedidoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPedidoCriteria = $criteria;
		return $this->collPedidos;
	}

	/**
	 * Returns the number of related Pedido objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Pedido objects.
	 * @throws     PropelException
	 */
	public function countPedidos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(FormaPagamentoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collPedidos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(PedidoPeer::FORMA_PAGAMENTO_ID, $this->id);

				$count = PedidoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(PedidoPeer::FORMA_PAGAMENTO_ID, $this->id);

				if (!isset($this->lastPedidoCriteria) || !$this->lastPedidoCriteria->equals($criteria)) {
					$count = PedidoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collPedidos);
				}
			} else {
				$count = count($this->collPedidos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a Pedido object to this object
	 * through the Pedido foreign key attribute.
	 *
	 * @param      Pedido $l Pedido
	 * @return     void
	 * @throws     PropelException
	 */
	public function addPedido(Pedido $l)
	{
		if ($this->collPedidos === null) {
			$this->initPedidos();
		}
		if (!in_array($l, $this->collPedidos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collPedidos, $l);
			$l->setFormaPagamento($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this FormaPagamento is new, it will return
	 * an empty collection; or if this FormaPagamento has previously
	 * been saved, it will retrieve related Pedidos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in FormaPagamento.
	 */
	public function getPedidosJoinCliente($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(FormaPagamentoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPedidos === null) {
			if ($this->isNew()) {
				$this->collPedidos = array();
			} else {

				$criteria->add(PedidoPeer::FORMA_PAGAMENTO_ID, $this->id);

				$this->collPedidos = PedidoPeer::doSelectJoinCliente($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(PedidoPeer::FORMA_PAGAMENTO_ID, $this->id);

			if (!isset($this->lastPedidoCriteria) || !$this->lastPedidoCriteria->equals($criteria)) {
				$this->collPedidos = PedidoPeer::doSelectJoinCliente($criteria, $con, $join_behavior);
			}
		}
		$this->lastPedidoCriteria = $criteria;

		return $this->collPedidos;
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
	 * Otherwise if this FormaPagamento has previously been saved, it will retrieve
	 * related ContasRecebers from storage. If this FormaPagamento is new, it will return
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
			$criteria = new Criteria(FormaPagamentoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasRecebers === null) {
			if ($this->isNew()) {
			   $this->collContasRecebers = array();
			} else {

				$criteria->add(ContasReceberPeer::FORMA_PAGAMENTO_ID, $this->id);

				ContasReceberPeer::addSelectColumns($criteria);
				$this->collContasRecebers = ContasReceberPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ContasReceberPeer::FORMA_PAGAMENTO_ID, $this->id);

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
			$criteria = new Criteria(FormaPagamentoPeer::DATABASE_NAME);
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

				$criteria->add(ContasReceberPeer::FORMA_PAGAMENTO_ID, $this->id);

				$count = ContasReceberPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ContasReceberPeer::FORMA_PAGAMENTO_ID, $this->id);

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
			$l->setFormaPagamento($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this FormaPagamento is new, it will return
	 * an empty collection; or if this FormaPagamento has previously
	 * been saved, it will retrieve related ContasRecebers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in FormaPagamento.
	 */
	public function getContasRecebersJoinBanco($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(FormaPagamentoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasRecebers === null) {
			if ($this->isNew()) {
				$this->collContasRecebers = array();
			} else {

				$criteria->add(ContasReceberPeer::FORMA_PAGAMENTO_ID, $this->id);

				$this->collContasRecebers = ContasReceberPeer::doSelectJoinBanco($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContasReceberPeer::FORMA_PAGAMENTO_ID, $this->id);

			if (!isset($this->lastContasReceberCriteria) || !$this->lastContasReceberCriteria->equals($criteria)) {
				$this->collContasRecebers = ContasReceberPeer::doSelectJoinBanco($criteria, $con, $join_behavior);
			}
		}
		$this->lastContasReceberCriteria = $criteria;

		return $this->collContasRecebers;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this FormaPagamento is new, it will return
	 * an empty collection; or if this FormaPagamento has previously
	 * been saved, it will retrieve related ContasRecebers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in FormaPagamento.
	 */
	public function getContasRecebersJoinContaContabil($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(FormaPagamentoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasRecebers === null) {
			if ($this->isNew()) {
				$this->collContasRecebers = array();
			} else {

				$criteria->add(ContasReceberPeer::FORMA_PAGAMENTO_ID, $this->id);

				$this->collContasRecebers = ContasReceberPeer::doSelectJoinContaContabil($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContasReceberPeer::FORMA_PAGAMENTO_ID, $this->id);

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
	 * Otherwise if this FormaPagamento is new, it will return
	 * an empty collection; or if this FormaPagamento has previously
	 * been saved, it will retrieve related ContasRecebers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in FormaPagamento.
	 */
	public function getContasRecebersJoinPedido($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(FormaPagamentoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasRecebers === null) {
			if ($this->isNew()) {
				$this->collContasRecebers = array();
			} else {

				$criteria->add(ContasReceberPeer::FORMA_PAGAMENTO_ID, $this->id);

				$this->collContasRecebers = ContasReceberPeer::doSelectJoinPedido($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContasReceberPeer::FORMA_PAGAMENTO_ID, $this->id);

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
	 * Otherwise if this FormaPagamento is new, it will return
	 * an empty collection; or if this FormaPagamento has previously
	 * been saved, it will retrieve related ContasRecebers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in FormaPagamento.
	 */
	public function getContasRecebersJoinCertificado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(FormaPagamentoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasRecebers === null) {
			if ($this->isNew()) {
				$this->collContasRecebers = array();
			} else {

				$criteria->add(ContasReceberPeer::FORMA_PAGAMENTO_ID, $this->id);

				$this->collContasRecebers = ContasReceberPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContasReceberPeer::FORMA_PAGAMENTO_ID, $this->id);

			if (!isset($this->lastContasReceberCriteria) || !$this->lastContasReceberCriteria->equals($criteria)) {
				$this->collContasRecebers = ContasReceberPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
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
			if ($this->collCertificados) {
				foreach ((array) $this->collCertificados as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCertificadoPagamentos) {
				foreach ((array) $this->collCertificadoPagamentos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collPedidos) {
				foreach ((array) $this->collPedidos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collContasRecebers) {
				foreach ((array) $this->collContasRecebers as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collCertificados = null;
		$this->collCertificadoPagamentos = null;
		$this->collPedidos = null;
		$this->collContasRecebers = null;
	}

} // BaseFormaPagamento
