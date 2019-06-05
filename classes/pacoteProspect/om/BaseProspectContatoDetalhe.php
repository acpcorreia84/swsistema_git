<?php

/**
 * Base class that represents a row from the 'prospect_contato_detalhe' table.
 *
 * 
 *
 * @package    pacoteProspect.om
 */
abstract class BaseProspectContatoDetalhe extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ProspectContatoDetalhePeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the nome_pessoa field.
	 * @var        string
	 */
	protected $nome_pessoa;

	/**
	 * The value for the email field.
	 * @var        string
	 */
	protected $email;

	/**
	 * The value for the fone field.
	 * @var        string
	 */
	protected $fone;

	/**
	 * The value for the celular field.
	 * @var        string
	 */
	protected $celular;

	/**
	 * The value for the prospect_contato_id field.
	 * @var        int
	 */
	protected $prospect_contato_id;

	/**
	 * @var        ProspectContato
	 */
	protected $aProspectContato;

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
	 * Get the [nome_pessoa] column value.
	 * 
	 * @return     string
	 */
	public function getNomePessoa()
	{
		return $this->nome_pessoa;
	}

	/**
	 * Get the [email] column value.
	 * 
	 * @return     string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Get the [fone] column value.
	 * 
	 * @return     string
	 */
	public function getFone()
	{
		return $this->fone;
	}

	/**
	 * Get the [celular] column value.
	 * 
	 * @return     string
	 */
	public function getCelular()
	{
		return $this->celular;
	}

	/**
	 * Get the [prospect_contato_id] column value.
	 * 
	 * @return     int
	 */
	public function getProspectContatoId()
	{
		return $this->prospect_contato_id;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     ProspectContatoDetalhe The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ProspectContatoDetalhePeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [nome_pessoa] column.
	 * 
	 * @param      string $v new value
	 * @return     ProspectContatoDetalhe The current object (for fluent API support)
	 */
	public function setNomePessoa($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome_pessoa !== $v) {
			$this->nome_pessoa = $v;
			$this->modifiedColumns[] = ProspectContatoDetalhePeer::NOME_PESSOA;
		}

		return $this;
	} // setNomePessoa()

	/**
	 * Set the value of [email] column.
	 * 
	 * @param      string $v new value
	 * @return     ProspectContatoDetalhe The current object (for fluent API support)
	 */
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = ProspectContatoDetalhePeer::EMAIL;
		}

		return $this;
	} // setEmail()

	/**
	 * Set the value of [fone] column.
	 * 
	 * @param      string $v new value
	 * @return     ProspectContatoDetalhe The current object (for fluent API support)
	 */
	public function setFone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->fone !== $v) {
			$this->fone = $v;
			$this->modifiedColumns[] = ProspectContatoDetalhePeer::FONE;
		}

		return $this;
	} // setFone()

	/**
	 * Set the value of [celular] column.
	 * 
	 * @param      string $v new value
	 * @return     ProspectContatoDetalhe The current object (for fluent API support)
	 */
	public function setCelular($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->celular !== $v) {
			$this->celular = $v;
			$this->modifiedColumns[] = ProspectContatoDetalhePeer::CELULAR;
		}

		return $this;
	} // setCelular()

	/**
	 * Set the value of [prospect_contato_id] column.
	 * 
	 * @param      int $v new value
	 * @return     ProspectContatoDetalhe The current object (for fluent API support)
	 */
	public function setProspectContatoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->prospect_contato_id !== $v) {
			$this->prospect_contato_id = $v;
			$this->modifiedColumns[] = ProspectContatoDetalhePeer::PROSPECT_CONTATO_ID;
		}

		if ($this->aProspectContato !== null && $this->aProspectContato->getId() !== $v) {
			$this->aProspectContato = null;
		}

		return $this;
	} // setProspectContatoId()

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
			$this->nome_pessoa = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->email = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->fone = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->celular = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->prospect_contato_id = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 6; // 6 = ProspectContatoDetalhePeer::NUM_COLUMNS - ProspectContatoDetalhePeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating ProspectContatoDetalhe object", $e);
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

		if ($this->aProspectContato !== null && $this->prospect_contato_id !== $this->aProspectContato->getId()) {
			$this->aProspectContato = null;
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
			$con = Propel::getConnection(ProspectContatoDetalhePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ProspectContatoDetalhePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aProspectContato = null;
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
			$con = Propel::getConnection(ProspectContatoDetalhePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				ProspectContatoDetalhePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ProspectContatoDetalhePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				ProspectContatoDetalhePeer::addInstanceToPool($this);
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

			if ($this->aProspectContato !== null) {
				if ($this->aProspectContato->isModified() || $this->aProspectContato->isNew()) {
					$affectedRows += $this->aProspectContato->save($con);
				}
				$this->setProspectContato($this->aProspectContato);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = ProspectContatoDetalhePeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ProspectContatoDetalhePeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += ProspectContatoDetalhePeer::doUpdate($this, $con);
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

			if ($this->aProspectContato !== null) {
				if (!$this->aProspectContato->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProspectContato->getValidationFailures());
				}
			}


			if (($retval = ProspectContatoDetalhePeer::doValidate($this, $columns)) !== true) {
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
		$criteria = new Criteria(ProspectContatoDetalhePeer::DATABASE_NAME);

		if ($this->isColumnModified(ProspectContatoDetalhePeer::ID)) $criteria->add(ProspectContatoDetalhePeer::ID, $this->id);
		if ($this->isColumnModified(ProspectContatoDetalhePeer::NOME_PESSOA)) $criteria->add(ProspectContatoDetalhePeer::NOME_PESSOA, $this->nome_pessoa);
		if ($this->isColumnModified(ProspectContatoDetalhePeer::EMAIL)) $criteria->add(ProspectContatoDetalhePeer::EMAIL, $this->email);
		if ($this->isColumnModified(ProspectContatoDetalhePeer::FONE)) $criteria->add(ProspectContatoDetalhePeer::FONE, $this->fone);
		if ($this->isColumnModified(ProspectContatoDetalhePeer::CELULAR)) $criteria->add(ProspectContatoDetalhePeer::CELULAR, $this->celular);
		if ($this->isColumnModified(ProspectContatoDetalhePeer::PROSPECT_CONTATO_ID)) $criteria->add(ProspectContatoDetalhePeer::PROSPECT_CONTATO_ID, $this->prospect_contato_id);

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
		$criteria = new Criteria(ProspectContatoDetalhePeer::DATABASE_NAME);

		$criteria->add(ProspectContatoDetalhePeer::ID, $this->id);

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
	 * @param      object $copyObj An object of ProspectContatoDetalhe (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNomePessoa($this->nome_pessoa);

		$copyObj->setEmail($this->email);

		$copyObj->setFone($this->fone);

		$copyObj->setCelular($this->celular);

		$copyObj->setProspectContatoId($this->prospect_contato_id);


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
	 * @return     ProspectContatoDetalhe Clone of current object.
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
	 * @return     ProspectContatoDetalhePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ProspectContatoDetalhePeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a ProspectContato object.
	 *
	 * @param      ProspectContato $v
	 * @return     ProspectContatoDetalhe The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setProspectContato(ProspectContato $v = null)
	{
		if ($v === null) {
			$this->setProspectContatoId(NULL);
		} else {
			$this->setProspectContatoId($v->getId());
		}

		$this->aProspectContato = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the ProspectContato object, it will not be re-added.
		if ($v !== null) {
			$v->addProspectContatoDetalhe($this);
		}

		return $this;
	}


	/**
	 * Get the associated ProspectContato object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     ProspectContato The associated ProspectContato object.
	 * @throws     PropelException
	 */
	public function getProspectContato(PropelPDO $con = null)
	{
		if ($this->aProspectContato === null && ($this->prospect_contato_id !== null)) {
			$this->aProspectContato = ProspectContatoPeer::retrieveByPk($this->prospect_contato_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aProspectContato->addProspectContatoDetalhes($this);
			 */
		}
		return $this->aProspectContato;
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

			$this->aProspectContato = null;
	}

} // BaseProspectContatoDetalhe
