<?php

/**
 * Base class that represents a row from the 'grupo_produto' table.
 *
 * 
 *
 * @package    pacoteProduto.om
 */
abstract class BaseGrupoProduto extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        GrupoProdutoPeer
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
	 * @var        array Produto[] Collection to store aggregation of Produto objects.
	 */
	protected $collProdutos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collProdutos.
	 */
	private $lastProdutoCriteria = null;

	/**
	 * @var        array UsuarioGrupoProduto[] Collection to store aggregation of UsuarioGrupoProduto objects.
	 */
	protected $collUsuarioGrupoProdutos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collUsuarioGrupoProdutos.
	 */
	private $lastUsuarioGrupoProdutoCriteria = null;

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
	 * @return     GrupoProduto The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = GrupoProdutoPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [nome] column.
	 * 
	 * @param      string $v new value
	 * @return     GrupoProduto The current object (for fluent API support)
	 */
	public function setNome($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome !== $v) {
			$this->nome = $v;
			$this->modifiedColumns[] = GrupoProdutoPeer::NOME;
		}

		return $this;
	} // setNome()

	/**
	 * Set the value of [descricao] column.
	 * 
	 * @param      string $v new value
	 * @return     GrupoProduto The current object (for fluent API support)
	 */
	public function setDescricao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->descricao !== $v) {
			$this->descricao = $v;
			$this->modifiedColumns[] = GrupoProdutoPeer::DESCRICAO;
		}

		return $this;
	} // setDescricao()

	/**
	 * Set the value of [situacao] column.
	 * 
	 * @param      int $v new value
	 * @return     GrupoProduto The current object (for fluent API support)
	 */
	public function setSituacao($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->situacao !== $v) {
			$this->situacao = $v;
			$this->modifiedColumns[] = GrupoProdutoPeer::SITUACAO;
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
			$this->nome = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->descricao = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->situacao = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 4; // 4 = GrupoProdutoPeer::NUM_COLUMNS - GrupoProdutoPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating GrupoProduto object", $e);
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
			$con = Propel::getConnection(GrupoProdutoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = GrupoProdutoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collProdutos = null;
			$this->lastProdutoCriteria = null;

			$this->collUsuarioGrupoProdutos = null;
			$this->lastUsuarioGrupoProdutoCriteria = null;

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
			$con = Propel::getConnection(GrupoProdutoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				GrupoProdutoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GrupoProdutoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				GrupoProdutoPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = GrupoProdutoPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = GrupoProdutoPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += GrupoProdutoPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collProdutos !== null) {
				foreach ($this->collProdutos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collUsuarioGrupoProdutos !== null) {
				foreach ($this->collUsuarioGrupoProdutos as $referrerFK) {
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


			if (($retval = GrupoProdutoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collProdutos !== null) {
					foreach ($this->collProdutos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collUsuarioGrupoProdutos !== null) {
					foreach ($this->collUsuarioGrupoProdutos as $referrerFK) {
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
		$criteria = new Criteria(GrupoProdutoPeer::DATABASE_NAME);

		if ($this->isColumnModified(GrupoProdutoPeer::ID)) $criteria->add(GrupoProdutoPeer::ID, $this->id);
		if ($this->isColumnModified(GrupoProdutoPeer::NOME)) $criteria->add(GrupoProdutoPeer::NOME, $this->nome);
		if ($this->isColumnModified(GrupoProdutoPeer::DESCRICAO)) $criteria->add(GrupoProdutoPeer::DESCRICAO, $this->descricao);
		if ($this->isColumnModified(GrupoProdutoPeer::SITUACAO)) $criteria->add(GrupoProdutoPeer::SITUACAO, $this->situacao);

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
		$criteria = new Criteria(GrupoProdutoPeer::DATABASE_NAME);

		$criteria->add(GrupoProdutoPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of GrupoProduto (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNome($this->nome);

		$copyObj->setDescricao($this->descricao);

		$copyObj->setSituacao($this->situacao);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getProdutos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addProduto($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getUsuarioGrupoProdutos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addUsuarioGrupoProduto($relObj->copy($deepCopy));
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
	 * @return     GrupoProduto Clone of current object.
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
	 * @return     GrupoProdutoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new GrupoProdutoPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears out the collProdutos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addProdutos()
	 */
	public function clearProdutos()
	{
		$this->collProdutos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collProdutos collection (array).
	 *
	 * By default this just sets the collProdutos collection to an empty array (like clearcollProdutos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initProdutos()
	{
		$this->collProdutos = array();
	}

	/**
	 * Gets an array of Produto objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this GrupoProduto has previously been saved, it will retrieve
	 * related Produtos from storage. If this GrupoProduto is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Produto[]
	 * @throws     PropelException
	 */
	public function getProdutos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(GrupoProdutoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProdutos === null) {
			if ($this->isNew()) {
			   $this->collProdutos = array();
			} else {

				$criteria->add(ProdutoPeer::GRUPO_PRODUTO_ID, $this->id);

				ProdutoPeer::addSelectColumns($criteria);
				$this->collProdutos = ProdutoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ProdutoPeer::GRUPO_PRODUTO_ID, $this->id);

				ProdutoPeer::addSelectColumns($criteria);
				if (!isset($this->lastProdutoCriteria) || !$this->lastProdutoCriteria->equals($criteria)) {
					$this->collProdutos = ProdutoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProdutoCriteria = $criteria;
		return $this->collProdutos;
	}

	/**
	 * Returns the number of related Produto objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Produto objects.
	 * @throws     PropelException
	 */
	public function countProdutos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(GrupoProdutoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collProdutos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ProdutoPeer::GRUPO_PRODUTO_ID, $this->id);

				$count = ProdutoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ProdutoPeer::GRUPO_PRODUTO_ID, $this->id);

				if (!isset($this->lastProdutoCriteria) || !$this->lastProdutoCriteria->equals($criteria)) {
					$count = ProdutoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collProdutos);
				}
			} else {
				$count = count($this->collProdutos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a Produto object to this object
	 * through the Produto foreign key attribute.
	 *
	 * @param      Produto $l Produto
	 * @return     void
	 * @throws     PropelException
	 */
	public function addProduto(Produto $l)
	{
		if ($this->collProdutos === null) {
			$this->initProdutos();
		}
		if (!in_array($l, $this->collProdutos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collProdutos, $l);
			$l->setGrupoProduto($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this GrupoProduto is new, it will return
	 * an empty collection; or if this GrupoProduto has previously
	 * been saved, it will retrieve related Produtos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in GrupoProduto.
	 */
	public function getProdutosJoinFornecedor($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(GrupoProdutoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProdutos === null) {
			if ($this->isNew()) {
				$this->collProdutos = array();
			} else {

				$criteria->add(ProdutoPeer::GRUPO_PRODUTO_ID, $this->id);

				$this->collProdutos = ProdutoPeer::doSelectJoinFornecedor($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProdutoPeer::GRUPO_PRODUTO_ID, $this->id);

			if (!isset($this->lastProdutoCriteria) || !$this->lastProdutoCriteria->equals($criteria)) {
				$this->collProdutos = ProdutoPeer::doSelectJoinFornecedor($criteria, $con, $join_behavior);
			}
		}
		$this->lastProdutoCriteria = $criteria;

		return $this->collProdutos;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this GrupoProduto is new, it will return
	 * an empty collection; or if this GrupoProduto has previously
	 * been saved, it will retrieve related Produtos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in GrupoProduto.
	 */
	public function getProdutosJoinProdutoRelatedByProdutoId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(GrupoProdutoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProdutos === null) {
			if ($this->isNew()) {
				$this->collProdutos = array();
			} else {

				$criteria->add(ProdutoPeer::GRUPO_PRODUTO_ID, $this->id);

				$this->collProdutos = ProdutoPeer::doSelectJoinProdutoRelatedByProdutoId($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProdutoPeer::GRUPO_PRODUTO_ID, $this->id);

			if (!isset($this->lastProdutoCriteria) || !$this->lastProdutoCriteria->equals($criteria)) {
				$this->collProdutos = ProdutoPeer::doSelectJoinProdutoRelatedByProdutoId($criteria, $con, $join_behavior);
			}
		}
		$this->lastProdutoCriteria = $criteria;

		return $this->collProdutos;
	}

	/**
	 * Clears out the collUsuarioGrupoProdutos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addUsuarioGrupoProdutos()
	 */
	public function clearUsuarioGrupoProdutos()
	{
		$this->collUsuarioGrupoProdutos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collUsuarioGrupoProdutos collection (array).
	 *
	 * By default this just sets the collUsuarioGrupoProdutos collection to an empty array (like clearcollUsuarioGrupoProdutos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initUsuarioGrupoProdutos()
	{
		$this->collUsuarioGrupoProdutos = array();
	}

	/**
	 * Gets an array of UsuarioGrupoProduto objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this GrupoProduto has previously been saved, it will retrieve
	 * related UsuarioGrupoProdutos from storage. If this GrupoProduto is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array UsuarioGrupoProduto[]
	 * @throws     PropelException
	 */
	public function getUsuarioGrupoProdutos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(GrupoProdutoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUsuarioGrupoProdutos === null) {
			if ($this->isNew()) {
			   $this->collUsuarioGrupoProdutos = array();
			} else {

				$criteria->add(UsuarioGrupoProdutoPeer::GRUPO_PRODUTO_ID, $this->id);

				UsuarioGrupoProdutoPeer::addSelectColumns($criteria);
				$this->collUsuarioGrupoProdutos = UsuarioGrupoProdutoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(UsuarioGrupoProdutoPeer::GRUPO_PRODUTO_ID, $this->id);

				UsuarioGrupoProdutoPeer::addSelectColumns($criteria);
				if (!isset($this->lastUsuarioGrupoProdutoCriteria) || !$this->lastUsuarioGrupoProdutoCriteria->equals($criteria)) {
					$this->collUsuarioGrupoProdutos = UsuarioGrupoProdutoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastUsuarioGrupoProdutoCriteria = $criteria;
		return $this->collUsuarioGrupoProdutos;
	}

	/**
	 * Returns the number of related UsuarioGrupoProduto objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related UsuarioGrupoProduto objects.
	 * @throws     PropelException
	 */
	public function countUsuarioGrupoProdutos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(GrupoProdutoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collUsuarioGrupoProdutos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(UsuarioGrupoProdutoPeer::GRUPO_PRODUTO_ID, $this->id);

				$count = UsuarioGrupoProdutoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(UsuarioGrupoProdutoPeer::GRUPO_PRODUTO_ID, $this->id);

				if (!isset($this->lastUsuarioGrupoProdutoCriteria) || !$this->lastUsuarioGrupoProdutoCriteria->equals($criteria)) {
					$count = UsuarioGrupoProdutoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collUsuarioGrupoProdutos);
				}
			} else {
				$count = count($this->collUsuarioGrupoProdutos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a UsuarioGrupoProduto object to this object
	 * through the UsuarioGrupoProduto foreign key attribute.
	 *
	 * @param      UsuarioGrupoProduto $l UsuarioGrupoProduto
	 * @return     void
	 * @throws     PropelException
	 */
	public function addUsuarioGrupoProduto(UsuarioGrupoProduto $l)
	{
		if ($this->collUsuarioGrupoProdutos === null) {
			$this->initUsuarioGrupoProdutos();
		}
		if (!in_array($l, $this->collUsuarioGrupoProdutos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collUsuarioGrupoProdutos, $l);
			$l->setGrupoProduto($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this GrupoProduto is new, it will return
	 * an empty collection; or if this GrupoProduto has previously
	 * been saved, it will retrieve related UsuarioGrupoProdutos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in GrupoProduto.
	 */
	public function getUsuarioGrupoProdutosJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(GrupoProdutoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUsuarioGrupoProdutos === null) {
			if ($this->isNew()) {
				$this->collUsuarioGrupoProdutos = array();
			} else {

				$criteria->add(UsuarioGrupoProdutoPeer::GRUPO_PRODUTO_ID, $this->id);

				$this->collUsuarioGrupoProdutos = UsuarioGrupoProdutoPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(UsuarioGrupoProdutoPeer::GRUPO_PRODUTO_ID, $this->id);

			if (!isset($this->lastUsuarioGrupoProdutoCriteria) || !$this->lastUsuarioGrupoProdutoCriteria->equals($criteria)) {
				$this->collUsuarioGrupoProdutos = UsuarioGrupoProdutoPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		}
		$this->lastUsuarioGrupoProdutoCriteria = $criteria;

		return $this->collUsuarioGrupoProdutos;
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
			if ($this->collProdutos) {
				foreach ((array) $this->collProdutos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collUsuarioGrupoProdutos) {
				foreach ((array) $this->collUsuarioGrupoProdutos as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collProdutos = null;
		$this->collUsuarioGrupoProdutos = null;
	}

} // BaseGrupoProduto
