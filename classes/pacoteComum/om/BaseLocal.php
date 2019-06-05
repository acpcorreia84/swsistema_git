<?php

/**
 * Base class that represents a row from the 'local' table.
 *
 * 
 *
 * @package    pacoteComum.om
 */
abstract class BaseLocal extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        LocalPeer
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
	 * The value for the situacao field.
	 * @var        int
	 */
	protected $situacao;

	/**
	 * The value for the comissao field.
	 * @var        double
	 */
	protected $comissao;

	/**
	 * @var        array Parceiro[] Collection to store aggregation of Parceiro objects.
	 */
	protected $collParceiros;

	/**
	 * @var        Criteria The criteria used to select the current contents of collParceiros.
	 */
	private $lastParceiroCriteria = null;

	/**
	 * @var        array Usuario[] Collection to store aggregation of Usuario objects.
	 */
	protected $collUsuarios;

	/**
	 * @var        Criteria The criteria used to select the current contents of collUsuarios.
	 */
	private $lastUsuarioCriteria = null;

	/**
	 * @var        array Agendamento[] Collection to store aggregation of Agendamento objects.
	 */
	protected $collAgendamentos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collAgendamentos.
	 */
	private $lastAgendamentoCriteria = null;

	/**
	 * @var        array LocalProduto[] Collection to store aggregation of LocalProduto objects.
	 */
	protected $collLocalProdutos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collLocalProdutos.
	 */
	private $lastLocalProdutoCriteria = null;

	/**
	 * @var        array LocalUsuario[] Collection to store aggregation of LocalUsuario objects.
	 */
	protected $collLocalUsuarios;

	/**
	 * @var        Criteria The criteria used to select the current contents of collLocalUsuarios.
	 */
	private $lastLocalUsuarioCriteria = null;

	/**
	 * @var        array Certificado[] Collection to store aggregation of Certificado objects.
	 */
	protected $collCertificados;

	/**
	 * @var        Criteria The criteria used to select the current contents of collCertificados.
	 */
	private $lastCertificadoCriteria = null;

	/**
	 * @var        array Cliente[] Collection to store aggregation of Cliente objects.
	 */
	protected $collClientes;

	/**
	 * @var        Criteria The criteria used to select the current contents of collClientes.
	 */
	private $lastClienteCriteria = null;

	/**
	 * @var        array Contador[] Collection to store aggregation of Contador objects.
	 */
	protected $collContadors;

	/**
	 * @var        Criteria The criteria used to select the current contents of collContadors.
	 */
	private $lastContadorCriteria = null;

	/**
	 * @var        array Contato[] Collection to store aggregation of Contato objects.
	 */
	protected $collContatos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collContatos.
	 */
	private $lastContatoCriteria = null;

	/**
	 * @var        array LancamentoConta[] Collection to store aggregation of LancamentoConta objects.
	 */
	protected $collLancamentoContas;

	/**
	 * @var        Criteria The criteria used to select the current contents of collLancamentoContas.
	 */
	private $lastLancamentoContaCriteria = null;

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
	 * Get the [situacao] column value.
	 * 
	 * @return     int
	 */
	public function getSituacao()
	{
		return $this->situacao;
	}

	/**
	 * Get the [comissao] column value.
	 * 
	 * @return     double
	 */
	public function getComissao()
	{
		return $this->comissao;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Local The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = LocalPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [nome] column.
	 * 
	 * @param      string $v new value
	 * @return     Local The current object (for fluent API support)
	 */
	public function setNome($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome !== $v) {
			$this->nome = $v;
			$this->modifiedColumns[] = LocalPeer::NOME;
		}

		return $this;
	} // setNome()

	/**
	 * Set the value of [situacao] column.
	 * 
	 * @param      int $v new value
	 * @return     Local The current object (for fluent API support)
	 */
	public function setSituacao($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->situacao !== $v) {
			$this->situacao = $v;
			$this->modifiedColumns[] = LocalPeer::SITUACAO;
		}

		return $this;
	} // setSituacao()

	/**
	 * Set the value of [comissao] column.
	 * 
	 * @param      double $v new value
	 * @return     Local The current object (for fluent API support)
	 */
	public function setComissao($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->comissao !== $v) {
			$this->comissao = $v;
			$this->modifiedColumns[] = LocalPeer::COMISSAO;
		}

		return $this;
	} // setComissao()

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
			$this->situacao = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->comissao = ($row[$startcol + 3] !== null) ? (double) $row[$startcol + 3] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 4; // 4 = LocalPeer::NUM_COLUMNS - LocalPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Local object", $e);
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
			$con = Propel::getConnection(LocalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = LocalPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collParceiros = null;
			$this->lastParceiroCriteria = null;

			$this->collUsuarios = null;
			$this->lastUsuarioCriteria = null;

			$this->collAgendamentos = null;
			$this->lastAgendamentoCriteria = null;

			$this->collLocalProdutos = null;
			$this->lastLocalProdutoCriteria = null;

			$this->collLocalUsuarios = null;
			$this->lastLocalUsuarioCriteria = null;

			$this->collCertificados = null;
			$this->lastCertificadoCriteria = null;

			$this->collClientes = null;
			$this->lastClienteCriteria = null;

			$this->collContadors = null;
			$this->lastContadorCriteria = null;

			$this->collContatos = null;
			$this->lastContatoCriteria = null;

			$this->collLancamentoContas = null;
			$this->lastLancamentoContaCriteria = null;

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
			$con = Propel::getConnection(LocalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				LocalPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LocalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				LocalPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = LocalPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LocalPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += LocalPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collParceiros !== null) {
				foreach ($this->collParceiros as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collUsuarios !== null) {
				foreach ($this->collUsuarios as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAgendamentos !== null) {
				foreach ($this->collAgendamentos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLocalProdutos !== null) {
				foreach ($this->collLocalProdutos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLocalUsuarios !== null) {
				foreach ($this->collLocalUsuarios as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCertificados !== null) {
				foreach ($this->collCertificados as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collClientes !== null) {
				foreach ($this->collClientes as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collContadors !== null) {
				foreach ($this->collContadors as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collContatos !== null) {
				foreach ($this->collContatos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLancamentoContas !== null) {
				foreach ($this->collLancamentoContas as $referrerFK) {
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


			if (($retval = LocalPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collParceiros !== null) {
					foreach ($this->collParceiros as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collUsuarios !== null) {
					foreach ($this->collUsuarios as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAgendamentos !== null) {
					foreach ($this->collAgendamentos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLocalProdutos !== null) {
					foreach ($this->collLocalProdutos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLocalUsuarios !== null) {
					foreach ($this->collLocalUsuarios as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCertificados !== null) {
					foreach ($this->collCertificados as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collClientes !== null) {
					foreach ($this->collClientes as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collContadors !== null) {
					foreach ($this->collContadors as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collContatos !== null) {
					foreach ($this->collContatos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLancamentoContas !== null) {
					foreach ($this->collLancamentoContas as $referrerFK) {
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
		$criteria = new Criteria(LocalPeer::DATABASE_NAME);

		if ($this->isColumnModified(LocalPeer::ID)) $criteria->add(LocalPeer::ID, $this->id);
		if ($this->isColumnModified(LocalPeer::NOME)) $criteria->add(LocalPeer::NOME, $this->nome);
		if ($this->isColumnModified(LocalPeer::SITUACAO)) $criteria->add(LocalPeer::SITUACAO, $this->situacao);
		if ($this->isColumnModified(LocalPeer::COMISSAO)) $criteria->add(LocalPeer::COMISSAO, $this->comissao);

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
		$criteria = new Criteria(LocalPeer::DATABASE_NAME);

		$criteria->add(LocalPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Local (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNome($this->nome);

		$copyObj->setSituacao($this->situacao);

		$copyObj->setComissao($this->comissao);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getParceiros() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addParceiro($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getUsuarios() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addUsuario($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getAgendamentos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAgendamento($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getLocalProdutos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addLocalProduto($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getLocalUsuarios() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addLocalUsuario($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCertificados() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCertificado($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getClientes() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCliente($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getContadors() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addContador($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getContatos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addContato($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getLancamentoContas() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addLancamentoConta($relObj->copy($deepCopy));
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
	 * @return     Local Clone of current object.
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
	 * @return     LocalPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new LocalPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears out the collParceiros collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addParceiros()
	 */
	public function clearParceiros()
	{
		$this->collParceiros = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collParceiros collection (array).
	 *
	 * By default this just sets the collParceiros collection to an empty array (like clearcollParceiros());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initParceiros()
	{
		$this->collParceiros = array();
	}

	/**
	 * Gets an array of Parceiro objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Local has previously been saved, it will retrieve
	 * related Parceiros from storage. If this Local is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Parceiro[]
	 * @throws     PropelException
	 */
	public function getParceiros($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collParceiros === null) {
			if ($this->isNew()) {
			   $this->collParceiros = array();
			} else {

				$criteria->add(ParceiroPeer::LOCAL_ID, $this->id);

				ParceiroPeer::addSelectColumns($criteria);
				$this->collParceiros = ParceiroPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ParceiroPeer::LOCAL_ID, $this->id);

				ParceiroPeer::addSelectColumns($criteria);
				if (!isset($this->lastParceiroCriteria) || !$this->lastParceiroCriteria->equals($criteria)) {
					$this->collParceiros = ParceiroPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastParceiroCriteria = $criteria;
		return $this->collParceiros;
	}

	/**
	 * Returns the number of related Parceiro objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Parceiro objects.
	 * @throws     PropelException
	 */
	public function countParceiros(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collParceiros === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ParceiroPeer::LOCAL_ID, $this->id);

				$count = ParceiroPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ParceiroPeer::LOCAL_ID, $this->id);

				if (!isset($this->lastParceiroCriteria) || !$this->lastParceiroCriteria->equals($criteria)) {
					$count = ParceiroPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collParceiros);
				}
			} else {
				$count = count($this->collParceiros);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a Parceiro object to this object
	 * through the Parceiro foreign key attribute.
	 *
	 * @param      Parceiro $l Parceiro
	 * @return     void
	 * @throws     PropelException
	 */
	public function addParceiro(Parceiro $l)
	{
		if ($this->collParceiros === null) {
			$this->initParceiros();
		}
		if (!in_array($l, $this->collParceiros, true)) { // only add it if the **same** object is not already associated
			array_push($this->collParceiros, $l);
			$l->setLocal($this);
		}
	}

	/**
	 * Clears out the collUsuarios collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addUsuarios()
	 */
	public function clearUsuarios()
	{
		$this->collUsuarios = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collUsuarios collection (array).
	 *
	 * By default this just sets the collUsuarios collection to an empty array (like clearcollUsuarios());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initUsuarios()
	{
		$this->collUsuarios = array();
	}

	/**
	 * Gets an array of Usuario objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Local has previously been saved, it will retrieve
	 * related Usuarios from storage. If this Local is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Usuario[]
	 * @throws     PropelException
	 */
	public function getUsuarios($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUsuarios === null) {
			if ($this->isNew()) {
			   $this->collUsuarios = array();
			} else {

				$criteria->add(UsuarioPeer::LOCAL_ID, $this->id);

				UsuarioPeer::addSelectColumns($criteria);
				$this->collUsuarios = UsuarioPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(UsuarioPeer::LOCAL_ID, $this->id);

				UsuarioPeer::addSelectColumns($criteria);
				if (!isset($this->lastUsuarioCriteria) || !$this->lastUsuarioCriteria->equals($criteria)) {
					$this->collUsuarios = UsuarioPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastUsuarioCriteria = $criteria;
		return $this->collUsuarios;
	}

	/**
	 * Returns the number of related Usuario objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Usuario objects.
	 * @throws     PropelException
	 */
	public function countUsuarios(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collUsuarios === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(UsuarioPeer::LOCAL_ID, $this->id);

				$count = UsuarioPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(UsuarioPeer::LOCAL_ID, $this->id);

				if (!isset($this->lastUsuarioCriteria) || !$this->lastUsuarioCriteria->equals($criteria)) {
					$count = UsuarioPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collUsuarios);
				}
			} else {
				$count = count($this->collUsuarios);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a Usuario object to this object
	 * through the Usuario foreign key attribute.
	 *
	 * @param      Usuario $l Usuario
	 * @return     void
	 * @throws     PropelException
	 */
	public function addUsuario(Usuario $l)
	{
		if ($this->collUsuarios === null) {
			$this->initUsuarios();
		}
		if (!in_array($l, $this->collUsuarios, true)) { // only add it if the **same** object is not already associated
			array_push($this->collUsuarios, $l);
			$l->setLocal($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Local is new, it will return
	 * an empty collection; or if this Local has previously
	 * been saved, it will retrieve related Usuarios from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Local.
	 */
	public function getUsuariosJoinSetor($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUsuarios === null) {
			if ($this->isNew()) {
				$this->collUsuarios = array();
			} else {

				$criteria->add(UsuarioPeer::LOCAL_ID, $this->id);

				$this->collUsuarios = UsuarioPeer::doSelectJoinSetor($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(UsuarioPeer::LOCAL_ID, $this->id);

			if (!isset($this->lastUsuarioCriteria) || !$this->lastUsuarioCriteria->equals($criteria)) {
				$this->collUsuarios = UsuarioPeer::doSelectJoinSetor($criteria, $con, $join_behavior);
			}
		}
		$this->lastUsuarioCriteria = $criteria;

		return $this->collUsuarios;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Local is new, it will return
	 * an empty collection; or if this Local has previously
	 * been saved, it will retrieve related Usuarios from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Local.
	 */
	public function getUsuariosJoinCargo($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUsuarios === null) {
			if ($this->isNew()) {
				$this->collUsuarios = array();
			} else {

				$criteria->add(UsuarioPeer::LOCAL_ID, $this->id);

				$this->collUsuarios = UsuarioPeer::doSelectJoinCargo($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(UsuarioPeer::LOCAL_ID, $this->id);

			if (!isset($this->lastUsuarioCriteria) || !$this->lastUsuarioCriteria->equals($criteria)) {
				$this->collUsuarios = UsuarioPeer::doSelectJoinCargo($criteria, $con, $join_behavior);
			}
		}
		$this->lastUsuarioCriteria = $criteria;

		return $this->collUsuarios;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Local is new, it will return
	 * an empty collection; or if this Local has previously
	 * been saved, it will retrieve related Usuarios from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Local.
	 */
	public function getUsuariosJoinPerfil($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUsuarios === null) {
			if ($this->isNew()) {
				$this->collUsuarios = array();
			} else {

				$criteria->add(UsuarioPeer::LOCAL_ID, $this->id);

				$this->collUsuarios = UsuarioPeer::doSelectJoinPerfil($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(UsuarioPeer::LOCAL_ID, $this->id);

			if (!isset($this->lastUsuarioCriteria) || !$this->lastUsuarioCriteria->equals($criteria)) {
				$this->collUsuarios = UsuarioPeer::doSelectJoinPerfil($criteria, $con, $join_behavior);
			}
		}
		$this->lastUsuarioCriteria = $criteria;

		return $this->collUsuarios;
	}

	/**
	 * Clears out the collAgendamentos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAgendamentos()
	 */
	public function clearAgendamentos()
	{
		$this->collAgendamentos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAgendamentos collection (array).
	 *
	 * By default this just sets the collAgendamentos collection to an empty array (like clearcollAgendamentos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initAgendamentos()
	{
		$this->collAgendamentos = array();
	}

	/**
	 * Gets an array of Agendamento objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Local has previously been saved, it will retrieve
	 * related Agendamentos from storage. If this Local is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Agendamento[]
	 * @throws     PropelException
	 */
	public function getAgendamentos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAgendamentos === null) {
			if ($this->isNew()) {
			   $this->collAgendamentos = array();
			} else {

				$criteria->add(AgendamentoPeer::LOCAL_ID, $this->id);

				AgendamentoPeer::addSelectColumns($criteria);
				$this->collAgendamentos = AgendamentoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(AgendamentoPeer::LOCAL_ID, $this->id);

				AgendamentoPeer::addSelectColumns($criteria);
				if (!isset($this->lastAgendamentoCriteria) || !$this->lastAgendamentoCriteria->equals($criteria)) {
					$this->collAgendamentos = AgendamentoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAgendamentoCriteria = $criteria;
		return $this->collAgendamentos;
	}

	/**
	 * Returns the number of related Agendamento objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Agendamento objects.
	 * @throws     PropelException
	 */
	public function countAgendamentos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collAgendamentos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(AgendamentoPeer::LOCAL_ID, $this->id);

				$count = AgendamentoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(AgendamentoPeer::LOCAL_ID, $this->id);

				if (!isset($this->lastAgendamentoCriteria) || !$this->lastAgendamentoCriteria->equals($criteria)) {
					$count = AgendamentoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collAgendamentos);
				}
			} else {
				$count = count($this->collAgendamentos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a Agendamento object to this object
	 * through the Agendamento foreign key attribute.
	 *
	 * @param      Agendamento $l Agendamento
	 * @return     void
	 * @throws     PropelException
	 */
	public function addAgendamento(Agendamento $l)
	{
		if ($this->collAgendamentos === null) {
			$this->initAgendamentos();
		}
		if (!in_array($l, $this->collAgendamentos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collAgendamentos, $l);
			$l->setLocal($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Local is new, it will return
	 * an empty collection; or if this Local has previously
	 * been saved, it will retrieve related Agendamentos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Local.
	 */
	public function getAgendamentosJoinCertificado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAgendamentos === null) {
			if ($this->isNew()) {
				$this->collAgendamentos = array();
			} else {

				$criteria->add(AgendamentoPeer::LOCAL_ID, $this->id);

				$this->collAgendamentos = AgendamentoPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(AgendamentoPeer::LOCAL_ID, $this->id);

			if (!isset($this->lastAgendamentoCriteria) || !$this->lastAgendamentoCriteria->equals($criteria)) {
				$this->collAgendamentos = AgendamentoPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		}
		$this->lastAgendamentoCriteria = $criteria;

		return $this->collAgendamentos;
	}

	/**
	 * Clears out the collLocalProdutos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addLocalProdutos()
	 */
	public function clearLocalProdutos()
	{
		$this->collLocalProdutos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collLocalProdutos collection (array).
	 *
	 * By default this just sets the collLocalProdutos collection to an empty array (like clearcollLocalProdutos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initLocalProdutos()
	{
		$this->collLocalProdutos = array();
	}

	/**
	 * Gets an array of LocalProduto objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Local has previously been saved, it will retrieve
	 * related LocalProdutos from storage. If this Local is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array LocalProduto[]
	 * @throws     PropelException
	 */
	public function getLocalProdutos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLocalProdutos === null) {
			if ($this->isNew()) {
			   $this->collLocalProdutos = array();
			} else {

				$criteria->add(LocalProdutoPeer::LOCAL_ID, $this->id);

				LocalProdutoPeer::addSelectColumns($criteria);
				$this->collLocalProdutos = LocalProdutoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(LocalProdutoPeer::LOCAL_ID, $this->id);

				LocalProdutoPeer::addSelectColumns($criteria);
				if (!isset($this->lastLocalProdutoCriteria) || !$this->lastLocalProdutoCriteria->equals($criteria)) {
					$this->collLocalProdutos = LocalProdutoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLocalProdutoCriteria = $criteria;
		return $this->collLocalProdutos;
	}

	/**
	 * Returns the number of related LocalProduto objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related LocalProduto objects.
	 * @throws     PropelException
	 */
	public function countLocalProdutos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collLocalProdutos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(LocalProdutoPeer::LOCAL_ID, $this->id);

				$count = LocalProdutoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(LocalProdutoPeer::LOCAL_ID, $this->id);

				if (!isset($this->lastLocalProdutoCriteria) || !$this->lastLocalProdutoCriteria->equals($criteria)) {
					$count = LocalProdutoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collLocalProdutos);
				}
			} else {
				$count = count($this->collLocalProdutos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a LocalProduto object to this object
	 * through the LocalProduto foreign key attribute.
	 *
	 * @param      LocalProduto $l LocalProduto
	 * @return     void
	 * @throws     PropelException
	 */
	public function addLocalProduto(LocalProduto $l)
	{
		if ($this->collLocalProdutos === null) {
			$this->initLocalProdutos();
		}
		if (!in_array($l, $this->collLocalProdutos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collLocalProdutos, $l);
			$l->setLocal($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Local is new, it will return
	 * an empty collection; or if this Local has previously
	 * been saved, it will retrieve related LocalProdutos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Local.
	 */
	public function getLocalProdutosJoinProduto($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLocalProdutos === null) {
			if ($this->isNew()) {
				$this->collLocalProdutos = array();
			} else {

				$criteria->add(LocalProdutoPeer::LOCAL_ID, $this->id);

				$this->collLocalProdutos = LocalProdutoPeer::doSelectJoinProduto($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(LocalProdutoPeer::LOCAL_ID, $this->id);

			if (!isset($this->lastLocalProdutoCriteria) || !$this->lastLocalProdutoCriteria->equals($criteria)) {
				$this->collLocalProdutos = LocalProdutoPeer::doSelectJoinProduto($criteria, $con, $join_behavior);
			}
		}
		$this->lastLocalProdutoCriteria = $criteria;

		return $this->collLocalProdutos;
	}

	/**
	 * Clears out the collLocalUsuarios collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addLocalUsuarios()
	 */
	public function clearLocalUsuarios()
	{
		$this->collLocalUsuarios = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collLocalUsuarios collection (array).
	 *
	 * By default this just sets the collLocalUsuarios collection to an empty array (like clearcollLocalUsuarios());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initLocalUsuarios()
	{
		$this->collLocalUsuarios = array();
	}

	/**
	 * Gets an array of LocalUsuario objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Local has previously been saved, it will retrieve
	 * related LocalUsuarios from storage. If this Local is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array LocalUsuario[]
	 * @throws     PropelException
	 */
	public function getLocalUsuarios($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLocalUsuarios === null) {
			if ($this->isNew()) {
			   $this->collLocalUsuarios = array();
			} else {

				$criteria->add(LocalUsuarioPeer::LOCAL_ID, $this->id);

				LocalUsuarioPeer::addSelectColumns($criteria);
				$this->collLocalUsuarios = LocalUsuarioPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(LocalUsuarioPeer::LOCAL_ID, $this->id);

				LocalUsuarioPeer::addSelectColumns($criteria);
				if (!isset($this->lastLocalUsuarioCriteria) || !$this->lastLocalUsuarioCriteria->equals($criteria)) {
					$this->collLocalUsuarios = LocalUsuarioPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLocalUsuarioCriteria = $criteria;
		return $this->collLocalUsuarios;
	}

	/**
	 * Returns the number of related LocalUsuario objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related LocalUsuario objects.
	 * @throws     PropelException
	 */
	public function countLocalUsuarios(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collLocalUsuarios === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(LocalUsuarioPeer::LOCAL_ID, $this->id);

				$count = LocalUsuarioPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(LocalUsuarioPeer::LOCAL_ID, $this->id);

				if (!isset($this->lastLocalUsuarioCriteria) || !$this->lastLocalUsuarioCriteria->equals($criteria)) {
					$count = LocalUsuarioPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collLocalUsuarios);
				}
			} else {
				$count = count($this->collLocalUsuarios);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a LocalUsuario object to this object
	 * through the LocalUsuario foreign key attribute.
	 *
	 * @param      LocalUsuario $l LocalUsuario
	 * @return     void
	 * @throws     PropelException
	 */
	public function addLocalUsuario(LocalUsuario $l)
	{
		if ($this->collLocalUsuarios === null) {
			$this->initLocalUsuarios();
		}
		if (!in_array($l, $this->collLocalUsuarios, true)) { // only add it if the **same** object is not already associated
			array_push($this->collLocalUsuarios, $l);
			$l->setLocal($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Local is new, it will return
	 * an empty collection; or if this Local has previously
	 * been saved, it will retrieve related LocalUsuarios from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Local.
	 */
	public function getLocalUsuariosJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLocalUsuarios === null) {
			if ($this->isNew()) {
				$this->collLocalUsuarios = array();
			} else {

				$criteria->add(LocalUsuarioPeer::LOCAL_ID, $this->id);

				$this->collLocalUsuarios = LocalUsuarioPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(LocalUsuarioPeer::LOCAL_ID, $this->id);

			if (!isset($this->lastLocalUsuarioCriteria) || !$this->lastLocalUsuarioCriteria->equals($criteria)) {
				$this->collLocalUsuarios = LocalUsuarioPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		}
		$this->lastLocalUsuarioCriteria = $criteria;

		return $this->collLocalUsuarios;
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
	 * Otherwise if this Local has previously been saved, it will retrieve
	 * related Certificados from storage. If this Local is new, it will return
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
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
			   $this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::LOCAL_ID, $this->id);

				CertificadoPeer::addSelectColumns($criteria);
				$this->collCertificados = CertificadoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(CertificadoPeer::LOCAL_ID, $this->id);

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
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
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

				$criteria->add(CertificadoPeer::LOCAL_ID, $this->id);

				$count = CertificadoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(CertificadoPeer::LOCAL_ID, $this->id);

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
			$l->setLocal($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Local is new, it will return
	 * an empty collection; or if this Local has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Local.
	 */
	public function getCertificadosJoinParceiro($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::LOCAL_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinParceiro($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::LOCAL_ID, $this->id);

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
	 * Otherwise if this Local is new, it will return
	 * an empty collection; or if this Local has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Local.
	 */
	public function getCertificadosJoinContador($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::LOCAL_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinContador($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::LOCAL_ID, $this->id);

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
	 * Otherwise if this Local is new, it will return
	 * an empty collection; or if this Local has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Local.
	 */
	public function getCertificadosJoinFormaPagamento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::LOCAL_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinFormaPagamento($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::LOCAL_ID, $this->id);

			if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
				$this->collCertificados = CertificadoPeer::doSelectJoinFormaPagamento($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoCriteria = $criteria;

		return $this->collCertificados;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Local is new, it will return
	 * an empty collection; or if this Local has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Local.
	 */
	public function getCertificadosJoinProduto($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::LOCAL_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinProduto($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::LOCAL_ID, $this->id);

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
	 * Otherwise if this Local is new, it will return
	 * an empty collection; or if this Local has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Local.
	 */
	public function getCertificadosJoinCliente($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::LOCAL_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinCliente($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::LOCAL_ID, $this->id);

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
	 * Otherwise if this Local is new, it will return
	 * an empty collection; or if this Local has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Local.
	 */
	public function getCertificadosJoinUsuarioRelatedByUsuarioId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::LOCAL_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinUsuarioRelatedByUsuarioId($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::LOCAL_ID, $this->id);

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
	 * Otherwise if this Local is new, it will return
	 * an empty collection; or if this Local has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Local.
	 */
	public function getCertificadosJoinUsuarioRelatedByUsuarioValidouId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::LOCAL_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinUsuarioRelatedByUsuarioValidouId($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::LOCAL_ID, $this->id);

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
	 * Otherwise if this Local is new, it will return
	 * an empty collection; or if this Local has previously
	 * been saved, it will retrieve related Certificados from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Local.
	 */
	public function getCertificadosJoinCertificadoRelatedByCertificadoRenovado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificados === null) {
			if ($this->isNew()) {
				$this->collCertificados = array();
			} else {

				$criteria->add(CertificadoPeer::LOCAL_ID, $this->id);

				$this->collCertificados = CertificadoPeer::doSelectJoinCertificadoRelatedByCertificadoRenovado($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPeer::LOCAL_ID, $this->id);

			if (!isset($this->lastCertificadoCriteria) || !$this->lastCertificadoCriteria->equals($criteria)) {
				$this->collCertificados = CertificadoPeer::doSelectJoinCertificadoRelatedByCertificadoRenovado($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoCriteria = $criteria;

		return $this->collCertificados;
	}

	/**
	 * Clears out the collClientes collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addClientes()
	 */
	public function clearClientes()
	{
		$this->collClientes = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collClientes collection (array).
	 *
	 * By default this just sets the collClientes collection to an empty array (like clearcollClientes());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initClientes()
	{
		$this->collClientes = array();
	}

	/**
	 * Gets an array of Cliente objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Local has previously been saved, it will retrieve
	 * related Clientes from storage. If this Local is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Cliente[]
	 * @throws     PropelException
	 */
	public function getClientes($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientes === null) {
			if ($this->isNew()) {
			   $this->collClientes = array();
			} else {

				$criteria->add(ClientePeer::LOCAL_ID, $this->id);

				ClientePeer::addSelectColumns($criteria);
				$this->collClientes = ClientePeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ClientePeer::LOCAL_ID, $this->id);

				ClientePeer::addSelectColumns($criteria);
				if (!isset($this->lastClienteCriteria) || !$this->lastClienteCriteria->equals($criteria)) {
					$this->collClientes = ClientePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastClienteCriteria = $criteria;
		return $this->collClientes;
	}

	/**
	 * Returns the number of related Cliente objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Cliente objects.
	 * @throws     PropelException
	 */
	public function countClientes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collClientes === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ClientePeer::LOCAL_ID, $this->id);

				$count = ClientePeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ClientePeer::LOCAL_ID, $this->id);

				if (!isset($this->lastClienteCriteria) || !$this->lastClienteCriteria->equals($criteria)) {
					$count = ClientePeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collClientes);
				}
			} else {
				$count = count($this->collClientes);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a Cliente object to this object
	 * through the Cliente foreign key attribute.
	 *
	 * @param      Cliente $l Cliente
	 * @return     void
	 * @throws     PropelException
	 */
	public function addCliente(Cliente $l)
	{
		if ($this->collClientes === null) {
			$this->initClientes();
		}
		if (!in_array($l, $this->collClientes, true)) { // only add it if the **same** object is not already associated
			array_push($this->collClientes, $l);
			$l->setLocal($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Local is new, it will return
	 * an empty collection; or if this Local has previously
	 * been saved, it will retrieve related Clientes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Local.
	 */
	public function getClientesJoinContador($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientes === null) {
			if ($this->isNew()) {
				$this->collClientes = array();
			} else {

				$criteria->add(ClientePeer::LOCAL_ID, $this->id);

				$this->collClientes = ClientePeer::doSelectJoinContador($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ClientePeer::LOCAL_ID, $this->id);

			if (!isset($this->lastClienteCriteria) || !$this->lastClienteCriteria->equals($criteria)) {
				$this->collClientes = ClientePeer::doSelectJoinContador($criteria, $con, $join_behavior);
			}
		}
		$this->lastClienteCriteria = $criteria;

		return $this->collClientes;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Local is new, it will return
	 * an empty collection; or if this Local has previously
	 * been saved, it will retrieve related Clientes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Local.
	 */
	public function getClientesJoinResponsavel($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collClientes === null) {
			if ($this->isNew()) {
				$this->collClientes = array();
			} else {

				$criteria->add(ClientePeer::LOCAL_ID, $this->id);

				$this->collClientes = ClientePeer::doSelectJoinResponsavel($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ClientePeer::LOCAL_ID, $this->id);

			if (!isset($this->lastClienteCriteria) || !$this->lastClienteCriteria->equals($criteria)) {
				$this->collClientes = ClientePeer::doSelectJoinResponsavel($criteria, $con, $join_behavior);
			}
		}
		$this->lastClienteCriteria = $criteria;

		return $this->collClientes;
	}

	/**
	 * Clears out the collContadors collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addContadors()
	 */
	public function clearContadors()
	{
		$this->collContadors = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collContadors collection (array).
	 *
	 * By default this just sets the collContadors collection to an empty array (like clearcollContadors());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initContadors()
	{
		$this->collContadors = array();
	}

	/**
	 * Gets an array of Contador objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Local has previously been saved, it will retrieve
	 * related Contadors from storage. If this Local is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Contador[]
	 * @throws     PropelException
	 */
	public function getContadors($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContadors === null) {
			if ($this->isNew()) {
			   $this->collContadors = array();
			} else {

				$criteria->add(ContadorPeer::LOCAL_ID, $this->id);

				ContadorPeer::addSelectColumns($criteria);
				$this->collContadors = ContadorPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ContadorPeer::LOCAL_ID, $this->id);

				ContadorPeer::addSelectColumns($criteria);
				if (!isset($this->lastContadorCriteria) || !$this->lastContadorCriteria->equals($criteria)) {
					$this->collContadors = ContadorPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastContadorCriteria = $criteria;
		return $this->collContadors;
	}

	/**
	 * Returns the number of related Contador objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Contador objects.
	 * @throws     PropelException
	 */
	public function countContadors(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collContadors === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ContadorPeer::LOCAL_ID, $this->id);

				$count = ContadorPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ContadorPeer::LOCAL_ID, $this->id);

				if (!isset($this->lastContadorCriteria) || !$this->lastContadorCriteria->equals($criteria)) {
					$count = ContadorPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collContadors);
				}
			} else {
				$count = count($this->collContadors);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a Contador object to this object
	 * through the Contador foreign key attribute.
	 *
	 * @param      Contador $l Contador
	 * @return     void
	 * @throws     PropelException
	 */
	public function addContador(Contador $l)
	{
		if ($this->collContadors === null) {
			$this->initContadors();
		}
		if (!in_array($l, $this->collContadors, true)) { // only add it if the **same** object is not already associated
			array_push($this->collContadors, $l);
			$l->setLocal($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Local is new, it will return
	 * an empty collection; or if this Local has previously
	 * been saved, it will retrieve related Contadors from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Local.
	 */
	public function getContadorsJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContadors === null) {
			if ($this->isNew()) {
				$this->collContadors = array();
			} else {

				$criteria->add(ContadorPeer::LOCAL_ID, $this->id);

				$this->collContadors = ContadorPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContadorPeer::LOCAL_ID, $this->id);

			if (!isset($this->lastContadorCriteria) || !$this->lastContadorCriteria->equals($criteria)) {
				$this->collContadors = ContadorPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		}
		$this->lastContadorCriteria = $criteria;

		return $this->collContadors;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Local is new, it will return
	 * an empty collection; or if this Local has previously
	 * been saved, it will retrieve related Contadors from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Local.
	 */
	public function getContadorsJoinResponsavel($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContadors === null) {
			if ($this->isNew()) {
				$this->collContadors = array();
			} else {

				$criteria->add(ContadorPeer::LOCAL_ID, $this->id);

				$this->collContadors = ContadorPeer::doSelectJoinResponsavel($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContadorPeer::LOCAL_ID, $this->id);

			if (!isset($this->lastContadorCriteria) || !$this->lastContadorCriteria->equals($criteria)) {
				$this->collContadors = ContadorPeer::doSelectJoinResponsavel($criteria, $con, $join_behavior);
			}
		}
		$this->lastContadorCriteria = $criteria;

		return $this->collContadors;
	}

	/**
	 * Clears out the collContatos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addContatos()
	 */
	public function clearContatos()
	{
		$this->collContatos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collContatos collection (array).
	 *
	 * By default this just sets the collContatos collection to an empty array (like clearcollContatos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initContatos()
	{
		$this->collContatos = array();
	}

	/**
	 * Gets an array of Contato objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Local has previously been saved, it will retrieve
	 * related Contatos from storage. If this Local is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Contato[]
	 * @throws     PropelException
	 */
	public function getContatos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContatos === null) {
			if ($this->isNew()) {
			   $this->collContatos = array();
			} else {

				$criteria->add(ContatoPeer::LOCAL_ID, $this->id);

				ContatoPeer::addSelectColumns($criteria);
				$this->collContatos = ContatoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ContatoPeer::LOCAL_ID, $this->id);

				ContatoPeer::addSelectColumns($criteria);
				if (!isset($this->lastContatoCriteria) || !$this->lastContatoCriteria->equals($criteria)) {
					$this->collContatos = ContatoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastContatoCriteria = $criteria;
		return $this->collContatos;
	}

	/**
	 * Returns the number of related Contato objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Contato objects.
	 * @throws     PropelException
	 */
	public function countContatos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collContatos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ContatoPeer::LOCAL_ID, $this->id);

				$count = ContatoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ContatoPeer::LOCAL_ID, $this->id);

				if (!isset($this->lastContatoCriteria) || !$this->lastContatoCriteria->equals($criteria)) {
					$count = ContatoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collContatos);
				}
			} else {
				$count = count($this->collContatos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a Contato object to this object
	 * through the Contato foreign key attribute.
	 *
	 * @param      Contato $l Contato
	 * @return     void
	 * @throws     PropelException
	 */
	public function addContato(Contato $l)
	{
		if ($this->collContatos === null) {
			$this->initContatos();
		}
		if (!in_array($l, $this->collContatos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collContatos, $l);
			$l->setLocal($this);
		}
	}

	/**
	 * Clears out the collLancamentoContas collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addLancamentoContas()
	 */
	public function clearLancamentoContas()
	{
		$this->collLancamentoContas = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collLancamentoContas collection (array).
	 *
	 * By default this just sets the collLancamentoContas collection to an empty array (like clearcollLancamentoContas());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initLancamentoContas()
	{
		$this->collLancamentoContas = array();
	}

	/**
	 * Gets an array of LancamentoConta objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Local has previously been saved, it will retrieve
	 * related LancamentoContas from storage. If this Local is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array LancamentoConta[]
	 * @throws     PropelException
	 */
	public function getLancamentoContas($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLancamentoContas === null) {
			if ($this->isNew()) {
			   $this->collLancamentoContas = array();
			} else {

				$criteria->add(LancamentoContaPeer::LOCAL_ID, $this->id);

				LancamentoContaPeer::addSelectColumns($criteria);
				$this->collLancamentoContas = LancamentoContaPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(LancamentoContaPeer::LOCAL_ID, $this->id);

				LancamentoContaPeer::addSelectColumns($criteria);
				if (!isset($this->lastLancamentoContaCriteria) || !$this->lastLancamentoContaCriteria->equals($criteria)) {
					$this->collLancamentoContas = LancamentoContaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLancamentoContaCriteria = $criteria;
		return $this->collLancamentoContas;
	}

	/**
	 * Returns the number of related LancamentoConta objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related LancamentoConta objects.
	 * @throws     PropelException
	 */
	public function countLancamentoContas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collLancamentoContas === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(LancamentoContaPeer::LOCAL_ID, $this->id);

				$count = LancamentoContaPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(LancamentoContaPeer::LOCAL_ID, $this->id);

				if (!isset($this->lastLancamentoContaCriteria) || !$this->lastLancamentoContaCriteria->equals($criteria)) {
					$count = LancamentoContaPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collLancamentoContas);
				}
			} else {
				$count = count($this->collLancamentoContas);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a LancamentoConta object to this object
	 * through the LancamentoConta foreign key attribute.
	 *
	 * @param      LancamentoConta $l LancamentoConta
	 * @return     void
	 * @throws     PropelException
	 */
	public function addLancamentoConta(LancamentoConta $l)
	{
		if ($this->collLancamentoContas === null) {
			$this->initLancamentoContas();
		}
		if (!in_array($l, $this->collLancamentoContas, true)) { // only add it if the **same** object is not already associated
			array_push($this->collLancamentoContas, $l);
			$l->setLocal($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Local is new, it will return
	 * an empty collection; or if this Local has previously
	 * been saved, it will retrieve related LancamentoContas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Local.
	 */
	public function getLancamentoContasJoinContasPagar($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLancamentoContas === null) {
			if ($this->isNew()) {
				$this->collLancamentoContas = array();
			} else {

				$criteria->add(LancamentoContaPeer::LOCAL_ID, $this->id);

				$this->collLancamentoContas = LancamentoContaPeer::doSelectJoinContasPagar($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(LancamentoContaPeer::LOCAL_ID, $this->id);

			if (!isset($this->lastLancamentoContaCriteria) || !$this->lastLancamentoContaCriteria->equals($criteria)) {
				$this->collLancamentoContas = LancamentoContaPeer::doSelectJoinContasPagar($criteria, $con, $join_behavior);
			}
		}
		$this->lastLancamentoContaCriteria = $criteria;

		return $this->collLancamentoContas;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Local is new, it will return
	 * an empty collection; or if this Local has previously
	 * been saved, it will retrieve related LancamentoContas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Local.
	 */
	public function getLancamentoContasJoinContasReceber($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLancamentoContas === null) {
			if ($this->isNew()) {
				$this->collLancamentoContas = array();
			} else {

				$criteria->add(LancamentoContaPeer::LOCAL_ID, $this->id);

				$this->collLancamentoContas = LancamentoContaPeer::doSelectJoinContasReceber($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(LancamentoContaPeer::LOCAL_ID, $this->id);

			if (!isset($this->lastLancamentoContaCriteria) || !$this->lastLancamentoContaCriteria->equals($criteria)) {
				$this->collLancamentoContas = LancamentoContaPeer::doSelectJoinContasReceber($criteria, $con, $join_behavior);
			}
		}
		$this->lastLancamentoContaCriteria = $criteria;

		return $this->collLancamentoContas;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Local is new, it will return
	 * an empty collection; or if this Local has previously
	 * been saved, it will retrieve related LancamentoContas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Local.
	 */
	public function getLancamentoContasJoinContaBancaria($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLancamentoContas === null) {
			if ($this->isNew()) {
				$this->collLancamentoContas = array();
			} else {

				$criteria->add(LancamentoContaPeer::LOCAL_ID, $this->id);

				$this->collLancamentoContas = LancamentoContaPeer::doSelectJoinContaBancaria($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(LancamentoContaPeer::LOCAL_ID, $this->id);

			if (!isset($this->lastLancamentoContaCriteria) || !$this->lastLancamentoContaCriteria->equals($criteria)) {
				$this->collLancamentoContas = LancamentoContaPeer::doSelectJoinContaBancaria($criteria, $con, $join_behavior);
			}
		}
		$this->lastLancamentoContaCriteria = $criteria;

		return $this->collLancamentoContas;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Local is new, it will return
	 * an empty collection; or if this Local has previously
	 * been saved, it will retrieve related LancamentoContas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Local.
	 */
	public function getLancamentoContasJoinContaContabil($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LocalPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLancamentoContas === null) {
			if ($this->isNew()) {
				$this->collLancamentoContas = array();
			} else {

				$criteria->add(LancamentoContaPeer::LOCAL_ID, $this->id);

				$this->collLancamentoContas = LancamentoContaPeer::doSelectJoinContaContabil($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(LancamentoContaPeer::LOCAL_ID, $this->id);

			if (!isset($this->lastLancamentoContaCriteria) || !$this->lastLancamentoContaCriteria->equals($criteria)) {
				$this->collLancamentoContas = LancamentoContaPeer::doSelectJoinContaContabil($criteria, $con, $join_behavior);
			}
		}
		$this->lastLancamentoContaCriteria = $criteria;

		return $this->collLancamentoContas;
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
			if ($this->collParceiros) {
				foreach ((array) $this->collParceiros as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collUsuarios) {
				foreach ((array) $this->collUsuarios as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collAgendamentos) {
				foreach ((array) $this->collAgendamentos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collLocalProdutos) {
				foreach ((array) $this->collLocalProdutos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collLocalUsuarios) {
				foreach ((array) $this->collLocalUsuarios as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCertificados) {
				foreach ((array) $this->collCertificados as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collClientes) {
				foreach ((array) $this->collClientes as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collContadors) {
				foreach ((array) $this->collContadors as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collContatos) {
				foreach ((array) $this->collContatos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collLancamentoContas) {
				foreach ((array) $this->collLancamentoContas as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collParceiros = null;
		$this->collUsuarios = null;
		$this->collAgendamentos = null;
		$this->collLocalProdutos = null;
		$this->collLocalUsuarios = null;
		$this->collCertificados = null;
		$this->collClientes = null;
		$this->collContadors = null;
		$this->collContatos = null;
		$this->collLancamentoContas = null;
	}

} // BaseLocal
