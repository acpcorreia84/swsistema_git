<?php

/**
 * Base class that represents a row from the 'certificado_situacao' table.
 *
 * 
 *
 * @package    pacoteCertificado.om
 */
abstract class BaseCertificadoSituacao extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        CertificadoSituacaoPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the situacao_id field.
	 * @var        int
	 */
	protected $situacao_id;

	/**
	 * The value for the comentario field.
	 * @var        string
	 */
	protected $comentario;

	/**
	 * The value for the usuario_id field.
	 * @var        int
	 */
	protected $usuario_id;

	/**
	 * The value for the certificado_id field.
	 * @var        int
	 */
	protected $certificado_id;

	/**
	 * The value for the data field.
	 * @var        string
	 */
	protected $data;

	/**
	 * @var        Usuario
	 */
	protected $aUsuario;

	/**
	 * @var        Situacao
	 */
	protected $aSituacao;

	/**
	 * @var        Certificado
	 */
	protected $aCertificado;

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
	 * Get the [situacao_id] column value.
	 * 
	 * @return     int
	 */
	public function getSituacaoId()
	{
		return $this->situacao_id;
	}

	/**
	 * Get the [comentario] column value.
	 * 
	 * @return     string
	 */
	public function getComentario()
	{
		return $this->comentario;
	}

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
	 * Get the [certificado_id] column value.
	 * 
	 * @return     int
	 */
	public function getCertificadoId()
	{
		return $this->certificado_id;
	}

	/**
	 * Get the [optionally formatted] temporal [data] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getData($format = 'Y-m-d H:i:s')
	{
		if ($this->data === null) {
			return null;
		}


		if ($this->data === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data, true), $x);
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
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     CertificadoSituacao The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CertificadoSituacaoPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [situacao_id] column.
	 * 
	 * @param      int $v new value
	 * @return     CertificadoSituacao The current object (for fluent API support)
	 */
	public function setSituacaoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->situacao_id !== $v) {
			$this->situacao_id = $v;
			$this->modifiedColumns[] = CertificadoSituacaoPeer::SITUACAO_ID;
		}

		if ($this->aSituacao !== null && $this->aSituacao->getId() !== $v) {
			$this->aSituacao = null;
		}

		return $this;
	} // setSituacaoId()

	/**
	 * Set the value of [comentario] column.
	 * 
	 * @param      string $v new value
	 * @return     CertificadoSituacao The current object (for fluent API support)
	 */
	public function setComentario($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->comentario !== $v) {
			$this->comentario = $v;
			$this->modifiedColumns[] = CertificadoSituacaoPeer::COMENTARIO;
		}

		return $this;
	} // setComentario()

	/**
	 * Set the value of [usuario_id] column.
	 * 
	 * @param      int $v new value
	 * @return     CertificadoSituacao The current object (for fluent API support)
	 */
	public function setUsuarioId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->usuario_id !== $v) {
			$this->usuario_id = $v;
			$this->modifiedColumns[] = CertificadoSituacaoPeer::USUARIO_ID;
		}

		if ($this->aUsuario !== null && $this->aUsuario->getId() !== $v) {
			$this->aUsuario = null;
		}

		return $this;
	} // setUsuarioId()

	/**
	 * Set the value of [certificado_id] column.
	 * 
	 * @param      int $v new value
	 * @return     CertificadoSituacao The current object (for fluent API support)
	 */
	public function setCertificadoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->certificado_id !== $v) {
			$this->certificado_id = $v;
			$this->modifiedColumns[] = CertificadoSituacaoPeer::CERTIFICADO_ID;
		}

		if ($this->aCertificado !== null && $this->aCertificado->getId() !== $v) {
			$this->aCertificado = null;
		}

		return $this;
	} // setCertificadoId()

	/**
	 * Sets the value of [data] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     CertificadoSituacao The current object (for fluent API support)
	 */
	public function setData($v)
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

		if ( $this->data !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data !== null && $tmpDt = new DateTime($this->data)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = CertificadoSituacaoPeer::DATA;
			}
		} // if either are not null

		return $this;
	} // setData()

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
			$this->situacao_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->comentario = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->usuario_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->certificado_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->data = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 6; // 6 = CertificadoSituacaoPeer::NUM_COLUMNS - CertificadoSituacaoPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating CertificadoSituacao object", $e);
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

		if ($this->aSituacao !== null && $this->situacao_id !== $this->aSituacao->getId()) {
			$this->aSituacao = null;
		}
		if ($this->aUsuario !== null && $this->usuario_id !== $this->aUsuario->getId()) {
			$this->aUsuario = null;
		}
		if ($this->aCertificado !== null && $this->certificado_id !== $this->aCertificado->getId()) {
			$this->aCertificado = null;
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
			$con = Propel::getConnection(CertificadoSituacaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = CertificadoSituacaoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aUsuario = null;
			$this->aSituacao = null;
			$this->aCertificado = null;
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
			$con = Propel::getConnection(CertificadoSituacaoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				CertificadoSituacaoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CertificadoSituacaoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				CertificadoSituacaoPeer::addInstanceToPool($this);
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

			if ($this->aUsuario !== null) {
				if ($this->aUsuario->isModified() || $this->aUsuario->isNew()) {
					$affectedRows += $this->aUsuario->save($con);
				}
				$this->setUsuario($this->aUsuario);
			}

			if ($this->aSituacao !== null) {
				if ($this->aSituacao->isModified() || $this->aSituacao->isNew()) {
					$affectedRows += $this->aSituacao->save($con);
				}
				$this->setSituacao($this->aSituacao);
			}

			if ($this->aCertificado !== null) {
				if ($this->aCertificado->isModified() || $this->aCertificado->isNew()) {
					$affectedRows += $this->aCertificado->save($con);
				}
				$this->setCertificado($this->aCertificado);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = CertificadoSituacaoPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CertificadoSituacaoPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += CertificadoSituacaoPeer::doUpdate($this, $con);
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

			if ($this->aUsuario !== null) {
				if (!$this->aUsuario->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUsuario->getValidationFailures());
				}
			}

			if ($this->aSituacao !== null) {
				if (!$this->aSituacao->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSituacao->getValidationFailures());
				}
			}

			if ($this->aCertificado !== null) {
				if (!$this->aCertificado->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCertificado->getValidationFailures());
				}
			}


			if (($retval = CertificadoSituacaoPeer::doValidate($this, $columns)) !== true) {
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
		$criteria = new Criteria(CertificadoSituacaoPeer::DATABASE_NAME);

		if ($this->isColumnModified(CertificadoSituacaoPeer::ID)) $criteria->add(CertificadoSituacaoPeer::ID, $this->id);
		if ($this->isColumnModified(CertificadoSituacaoPeer::SITUACAO_ID)) $criteria->add(CertificadoSituacaoPeer::SITUACAO_ID, $this->situacao_id);
		if ($this->isColumnModified(CertificadoSituacaoPeer::COMENTARIO)) $criteria->add(CertificadoSituacaoPeer::COMENTARIO, $this->comentario);
		if ($this->isColumnModified(CertificadoSituacaoPeer::USUARIO_ID)) $criteria->add(CertificadoSituacaoPeer::USUARIO_ID, $this->usuario_id);
		if ($this->isColumnModified(CertificadoSituacaoPeer::CERTIFICADO_ID)) $criteria->add(CertificadoSituacaoPeer::CERTIFICADO_ID, $this->certificado_id);
		if ($this->isColumnModified(CertificadoSituacaoPeer::DATA)) $criteria->add(CertificadoSituacaoPeer::DATA, $this->data);

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
		$criteria = new Criteria(CertificadoSituacaoPeer::DATABASE_NAME);

		$criteria->add(CertificadoSituacaoPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of CertificadoSituacao (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setSituacaoId($this->situacao_id);

		$copyObj->setComentario($this->comentario);

		$copyObj->setUsuarioId($this->usuario_id);

		$copyObj->setCertificadoId($this->certificado_id);

		$copyObj->setData($this->data);


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
	 * @return     CertificadoSituacao Clone of current object.
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
	 * @return     CertificadoSituacaoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new CertificadoSituacaoPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Usuario object.
	 *
	 * @param      Usuario $v
	 * @return     CertificadoSituacao The current object (for fluent API support)
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
			$v->addCertificadoSituacao($this);
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
			   $this->aUsuario->addCertificadoSituacaos($this);
			 */
		}
		return $this->aUsuario;
	}

	/**
	 * Declares an association between this object and a Situacao object.
	 *
	 * @param      Situacao $v
	 * @return     CertificadoSituacao The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setSituacao(Situacao $v = null)
	{
		if ($v === null) {
			$this->setSituacaoId(NULL);
		} else {
			$this->setSituacaoId($v->getId());
		}

		$this->aSituacao = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Situacao object, it will not be re-added.
		if ($v !== null) {
			$v->addCertificadoSituacao($this);
		}

		return $this;
	}


	/**
	 * Get the associated Situacao object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Situacao The associated Situacao object.
	 * @throws     PropelException
	 */
	public function getSituacao(PropelPDO $con = null)
	{
		if ($this->aSituacao === null && ($this->situacao_id !== null)) {
			$this->aSituacao = SituacaoPeer::retrieveByPk($this->situacao_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aSituacao->addCertificadoSituacaos($this);
			 */
		}
		return $this->aSituacao;
	}

	/**
	 * Declares an association between this object and a Certificado object.
	 *
	 * @param      Certificado $v
	 * @return     CertificadoSituacao The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setCertificado(Certificado $v = null)
	{
		if ($v === null) {
			$this->setCertificadoId(NULL);
		} else {
			$this->setCertificadoId($v->getId());
		}

		$this->aCertificado = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Certificado object, it will not be re-added.
		if ($v !== null) {
			$v->addCertificadoSituacao($this);
		}

		return $this;
	}


	/**
	 * Get the associated Certificado object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Certificado The associated Certificado object.
	 * @throws     PropelException
	 */
	public function getCertificado(PropelPDO $con = null)
	{
		if ($this->aCertificado === null && ($this->certificado_id !== null)) {
			$this->aCertificado = CertificadoPeer::retrieveByPk($this->certificado_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aCertificado->addCertificadoSituacaos($this);
			 */
		}
		return $this->aCertificado;
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

			$this->aUsuario = null;
			$this->aSituacao = null;
			$this->aCertificado = null;
	}

} // BaseCertificadoSituacao
