<?php

/**
 * Base class that represents a row from the 'parceiro_usuario' table.
 *
 * 
 *
 * @package    pacoteParceiro.om
 */
abstract class BaseParceiroUsuario extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ParceiroUsuarioPeer
	 */
	protected static $peer;

	/**
	 * The value for the usuario_id field.
	 * @var        int
	 */
	protected $usuario_id;

	/**
	 * The value for the parceiro_id field.
	 * @var        int
	 */
	protected $parceiro_id;

	/**
	 * The value for the parceiro_usuario_tipo_id field.
	 * @var        int
	 */
	protected $parceiro_usuario_tipo_id;

	/**
	 * The value for the situacao field.
	 * @var        int
	 */
	protected $situacao;

	/**
	 * @var        Parceiro
	 */
	protected $aParceiro;

	/**
	 * @var        Usuario
	 */
	protected $aUsuario;

	/**
	 * @var        ParceiroUsuarioTipo
	 */
	protected $aParceiroUsuarioTipo;

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
	 * Get the [usuario_id] column value.
	 * 
	 * @return     int
	 */
	public function getUsuarioId()
	{
		return $this->usuario_id;
	}

	/**
	 * Get the [parceiro_id] column value.
	 * 
	 * @return     int
	 */
	public function getParceiroId()
	{
		return $this->parceiro_id;
	}

	/**
	 * Get the [parceiro_usuario_tipo_id] column value.
	 * 
	 * @return     int
	 */
	public function getParceiroUsuarioTipoId()
	{
		return $this->parceiro_usuario_tipo_id;
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
	 * Set the value of [usuario_id] column.
	 * 
	 * @param      int $v new value
	 * @return     ParceiroUsuario The current object (for fluent API support)
	 */
	public function setUsuarioId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->usuario_id !== $v) {
			$this->usuario_id = $v;
			$this->modifiedColumns[] = ParceiroUsuarioPeer::USUARIO_ID;
		}

		if ($this->aUsuario !== null && $this->aUsuario->getId() !== $v) {
			$this->aUsuario = null;
		}

		return $this;
	} // setUsuarioId()

	/**
	 * Set the value of [parceiro_id] column.
	 * 
	 * @param      int $v new value
	 * @return     ParceiroUsuario The current object (for fluent API support)
	 */
	public function setParceiroId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->parceiro_id !== $v) {
			$this->parceiro_id = $v;
			$this->modifiedColumns[] = ParceiroUsuarioPeer::PARCEIRO_ID;
		}

		if ($this->aParceiro !== null && $this->aParceiro->getId() !== $v) {
			$this->aParceiro = null;
		}

		return $this;
	} // setParceiroId()

	/**
	 * Set the value of [parceiro_usuario_tipo_id] column.
	 * 
	 * @param      int $v new value
	 * @return     ParceiroUsuario The current object (for fluent API support)
	 */
	public function setParceiroUsuarioTipoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->parceiro_usuario_tipo_id !== $v) {
			$this->parceiro_usuario_tipo_id = $v;
			$this->modifiedColumns[] = ParceiroUsuarioPeer::PARCEIRO_USUARIO_TIPO_ID;
		}

		if ($this->aParceiroUsuarioTipo !== null && $this->aParceiroUsuarioTipo->getId() !== $v) {
			$this->aParceiroUsuarioTipo = null;
		}

		return $this;
	} // setParceiroUsuarioTipoId()

	/**
	 * Set the value of [situacao] column.
	 * 
	 * @param      int $v new value
	 * @return     ParceiroUsuario The current object (for fluent API support)
	 */
	public function setSituacao($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->situacao !== $v) {
			$this->situacao = $v;
			$this->modifiedColumns[] = ParceiroUsuarioPeer::SITUACAO;
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

			$this->usuario_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->parceiro_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->parceiro_usuario_tipo_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->situacao = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 4; // 4 = ParceiroUsuarioPeer::NUM_COLUMNS - ParceiroUsuarioPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating ParceiroUsuario object", $e);
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

		if ($this->aUsuario !== null && $this->usuario_id !== $this->aUsuario->getId()) {
			$this->aUsuario = null;
		}
		if ($this->aParceiro !== null && $this->parceiro_id !== $this->aParceiro->getId()) {
			$this->aParceiro = null;
		}
		if ($this->aParceiroUsuarioTipo !== null && $this->parceiro_usuario_tipo_id !== $this->aParceiroUsuarioTipo->getId()) {
			$this->aParceiroUsuarioTipo = null;
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
			$con = Propel::getConnection(ParceiroUsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ParceiroUsuarioPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aParceiro = null;
			$this->aUsuario = null;
			$this->aParceiroUsuarioTipo = null;
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
			$con = Propel::getConnection(ParceiroUsuarioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				ParceiroUsuarioPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ParceiroUsuarioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				ParceiroUsuarioPeer::addInstanceToPool($this);
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

			if ($this->aParceiro !== null) {
				if ($this->aParceiro->isModified() || $this->aParceiro->isNew()) {
					$affectedRows += $this->aParceiro->save($con);
				}
				$this->setParceiro($this->aParceiro);
			}

			if ($this->aUsuario !== null) {
				if ($this->aUsuario->isModified() || $this->aUsuario->isNew()) {
					$affectedRows += $this->aUsuario->save($con);
				}
				$this->setUsuario($this->aUsuario);
			}

			if ($this->aParceiroUsuarioTipo !== null) {
				if ($this->aParceiroUsuarioTipo->isModified() || $this->aParceiroUsuarioTipo->isNew()) {
					$affectedRows += $this->aParceiroUsuarioTipo->save($con);
				}
				$this->setParceiroUsuarioTipo($this->aParceiroUsuarioTipo);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ParceiroUsuarioPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setNew(false);
				} else {
					$affectedRows += ParceiroUsuarioPeer::doUpdate($this, $con);
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

			if ($this->aParceiro !== null) {
				if (!$this->aParceiro->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aParceiro->getValidationFailures());
				}
			}

			if ($this->aUsuario !== null) {
				if (!$this->aUsuario->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUsuario->getValidationFailures());
				}
			}

			if ($this->aParceiroUsuarioTipo !== null) {
				if (!$this->aParceiroUsuarioTipo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aParceiroUsuarioTipo->getValidationFailures());
				}
			}


			if (($retval = ParceiroUsuarioPeer::doValidate($this, $columns)) !== true) {
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
		$criteria = new Criteria(ParceiroUsuarioPeer::DATABASE_NAME);

		if ($this->isColumnModified(ParceiroUsuarioPeer::USUARIO_ID)) $criteria->add(ParceiroUsuarioPeer::USUARIO_ID, $this->usuario_id);
		if ($this->isColumnModified(ParceiroUsuarioPeer::PARCEIRO_ID)) $criteria->add(ParceiroUsuarioPeer::PARCEIRO_ID, $this->parceiro_id);
		if ($this->isColumnModified(ParceiroUsuarioPeer::PARCEIRO_USUARIO_TIPO_ID)) $criteria->add(ParceiroUsuarioPeer::PARCEIRO_USUARIO_TIPO_ID, $this->parceiro_usuario_tipo_id);
		if ($this->isColumnModified(ParceiroUsuarioPeer::SITUACAO)) $criteria->add(ParceiroUsuarioPeer::SITUACAO, $this->situacao);

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
		$criteria = new Criteria(ParceiroUsuarioPeer::DATABASE_NAME);

		$criteria->add(ParceiroUsuarioPeer::USUARIO_ID, $this->usuario_id);
		$criteria->add(ParceiroUsuarioPeer::PARCEIRO_ID, $this->parceiro_id);

		return $criteria;
	}

	/**
	 * Returns the composite primary key for this object.
	 * The array elements will be in same order as specified in XML.
	 * @return     array
	 */
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getUsuarioId();

		$pks[1] = $this->getParceiroId();

		return $pks;
	}

	/**
	 * Set the [composite] primary key.
	 *
	 * @param      array $keys The elements of the composite key (order must match the order in XML file).
	 * @return     void
	 */
	public function setPrimaryKey($keys)
	{

		$this->setUsuarioId($keys[0]);

		$this->setParceiroId($keys[1]);

	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of ParceiroUsuario (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setUsuarioId($this->usuario_id);

		$copyObj->setParceiroId($this->parceiro_id);

		$copyObj->setParceiroUsuarioTipoId($this->parceiro_usuario_tipo_id);

		$copyObj->setSituacao($this->situacao);


		$copyObj->setNew(true);

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
	 * @return     ParceiroUsuario Clone of current object.
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
	 * @return     ParceiroUsuarioPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ParceiroUsuarioPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Parceiro object.
	 *
	 * @param      Parceiro $v
	 * @return     ParceiroUsuario The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setParceiro(Parceiro $v = null)
	{
		if ($v === null) {
			$this->setParceiroId(NULL);
		} else {
			$this->setParceiroId($v->getId());
		}

		$this->aParceiro = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Parceiro object, it will not be re-added.
		if ($v !== null) {
			$v->addParceiroUsuario($this);
		}

		return $this;
	}


	/**
	 * Get the associated Parceiro object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Parceiro The associated Parceiro object.
	 * @throws     PropelException
	 */
	public function getParceiro(PropelPDO $con = null)
	{
		if ($this->aParceiro === null && ($this->parceiro_id !== null)) {
			$this->aParceiro = ParceiroPeer::retrieveByPk($this->parceiro_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aParceiro->addParceiroUsuarios($this);
			 */
		}
		return $this->aParceiro;
	}

	/**
	 * Declares an association between this object and a Usuario object.
	 *
	 * @param      Usuario $v
	 * @return     ParceiroUsuario The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUsuario(Usuario $v = null)
	{
		if ($v === null) {
			$this->setUsuarioId(NULL);
		} else {
			$this->setUsuarioId($v->getId());
		}

		$this->aUsuario = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Usuario object, it will not be re-added.
		if ($v !== null) {
			$v->addParceiroUsuario($this);
		}

		return $this;
	}


	/**
	 * Get the associated Usuario object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Usuario The associated Usuario object.
	 * @throws     PropelException
	 */
	public function getUsuario(PropelPDO $con = null)
	{
		if ($this->aUsuario === null && ($this->usuario_id !== null)) {
			$this->aUsuario = UsuarioPeer::retrieveByPk($this->usuario_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aUsuario->addParceiroUsuarios($this);
			 */
		}
		return $this->aUsuario;
	}

	/**
	 * Declares an association between this object and a ParceiroUsuarioTipo object.
	 *
	 * @param      ParceiroUsuarioTipo $v
	 * @return     ParceiroUsuario The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setParceiroUsuarioTipo(ParceiroUsuarioTipo $v = null)
	{
		if ($v === null) {
			$this->setParceiroUsuarioTipoId(NULL);
		} else {
			$this->setParceiroUsuarioTipoId($v->getId());
		}

		$this->aParceiroUsuarioTipo = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the ParceiroUsuarioTipo object, it will not be re-added.
		if ($v !== null) {
			$v->addParceiroUsuario($this);
		}

		return $this;
	}


	/**
	 * Get the associated ParceiroUsuarioTipo object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     ParceiroUsuarioTipo The associated ParceiroUsuarioTipo object.
	 * @throws     PropelException
	 */
	public function getParceiroUsuarioTipo(PropelPDO $con = null)
	{
		if ($this->aParceiroUsuarioTipo === null && ($this->parceiro_usuario_tipo_id !== null)) {
			$this->aParceiroUsuarioTipo = ParceiroUsuarioTipoPeer::retrieveByPk($this->parceiro_usuario_tipo_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aParceiroUsuarioTipo->addParceiroUsuarios($this);
			 */
		}
		return $this->aParceiroUsuarioTipo;
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

			$this->aParceiro = null;
			$this->aUsuario = null;
			$this->aParceiroUsuarioTipo = null;
	}

} // BaseParceiroUsuario
