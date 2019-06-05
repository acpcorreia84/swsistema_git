<?php

/**
 * Base class that represents a row from the 'conta_contabil' table.
 *
 * 
 *
 * @package    pacoteFinanceiro.om
 */
abstract class BaseContaContabil extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ContaContabilPeer
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
	 * The value for the classificacao field.
	 * @var        string
	 */
	protected $classificacao;

	/**
	 * The value for the categoria_conta_contabil_id field.
	 * @var        int
	 */
	protected $categoria_conta_contabil_id;

	/**
	 * The value for the nome field.
	 * @var        string
	 */
	protected $nome;

	/**
	 * The value for the apelido field.
	 * @var        string
	 */
	protected $apelido;

	/**
	 * The value for the descricao field.
	 * @var        string
	 */
	protected $descricao;

	/**
	 * The value for the tipo field.
	 * @var        string
	 */
	protected $tipo;

	/**
	 * @var        CategoriaContaContabil
	 */
	protected $aCategoriaContaContabil;

	/**
	 * @var        array LancamentoCaixa[] Collection to store aggregation of LancamentoCaixa objects.
	 */
	protected $collLancamentoCaixas;

	/**
	 * @var        Criteria The criteria used to select the current contents of collLancamentoCaixas.
	 */
	private $lastLancamentoCaixaCriteria = null;

	/**
	 * @var        array ContasReceber[] Collection to store aggregation of ContasReceber objects.
	 */
	protected $collContasRecebers;

	/**
	 * @var        Criteria The criteria used to select the current contents of collContasRecebers.
	 */
	private $lastContasReceberCriteria = null;

	/**
	 * @var        array ContasPagar[] Collection to store aggregation of ContasPagar objects.
	 */
	protected $collContasPagars;

	/**
	 * @var        Criteria The criteria used to select the current contents of collContasPagars.
	 */
	private $lastContasPagarCriteria = null;

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
	 * Get the [codigo] column value.
	 * 
	 * @return     string
	 */
	public function getCodigo()
	{
		return $this->codigo;
	}

	/**
	 * Get the [classificacao] column value.
	 * 
	 * @return     string
	 */
	public function getClassificacao()
	{
		return $this->classificacao;
	}

	/**
	 * Get the [categoria_conta_contabil_id] column value.
	 * 
	 * @return     int
	 */
	public function getCategoriaContaContabilId()
	{
		return $this->categoria_conta_contabil_id;
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
	 * Get the [apelido] column value.
	 * 
	 * @return     string
	 */
	public function getApelido()
	{
		return $this->apelido;
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
	 * Get the [tipo] column value.
	 * 
	 * @return     string
	 */
	public function getTipo()
	{
		return $this->tipo;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     ContaContabil The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ContaContabilPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [codigo] column.
	 * 
	 * @param      string $v new value
	 * @return     ContaContabil The current object (for fluent API support)
	 */
	public function setCodigo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->codigo !== $v) {
			$this->codigo = $v;
			$this->modifiedColumns[] = ContaContabilPeer::CODIGO;
		}

		return $this;
	} // setCodigo()

	/**
	 * Set the value of [classificacao] column.
	 * 
	 * @param      string $v new value
	 * @return     ContaContabil The current object (for fluent API support)
	 */
	public function setClassificacao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->classificacao !== $v) {
			$this->classificacao = $v;
			$this->modifiedColumns[] = ContaContabilPeer::CLASSIFICACAO;
		}

		return $this;
	} // setClassificacao()

	/**
	 * Set the value of [categoria_conta_contabil_id] column.
	 * 
	 * @param      int $v new value
	 * @return     ContaContabil The current object (for fluent API support)
	 */
	public function setCategoriaContaContabilId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->categoria_conta_contabil_id !== $v) {
			$this->categoria_conta_contabil_id = $v;
			$this->modifiedColumns[] = ContaContabilPeer::CATEGORIA_CONTA_CONTABIL_ID;
		}

		if ($this->aCategoriaContaContabil !== null && $this->aCategoriaContaContabil->getId() !== $v) {
			$this->aCategoriaContaContabil = null;
		}

		return $this;
	} // setCategoriaContaContabilId()

	/**
	 * Set the value of [nome] column.
	 * 
	 * @param      string $v new value
	 * @return     ContaContabil The current object (for fluent API support)
	 */
	public function setNome($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome !== $v) {
			$this->nome = $v;
			$this->modifiedColumns[] = ContaContabilPeer::NOME;
		}

		return $this;
	} // setNome()

	/**
	 * Set the value of [apelido] column.
	 * 
	 * @param      string $v new value
	 * @return     ContaContabil The current object (for fluent API support)
	 */
	public function setApelido($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->apelido !== $v) {
			$this->apelido = $v;
			$this->modifiedColumns[] = ContaContabilPeer::APELIDO;
		}

		return $this;
	} // setApelido()

	/**
	 * Set the value of [descricao] column.
	 * 
	 * @param      string $v new value
	 * @return     ContaContabil The current object (for fluent API support)
	 */
	public function setDescricao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->descricao !== $v) {
			$this->descricao = $v;
			$this->modifiedColumns[] = ContaContabilPeer::DESCRICAO;
		}

		return $this;
	} // setDescricao()

	/**
	 * Set the value of [tipo] column.
	 * 
	 * @param      string $v new value
	 * @return     ContaContabil The current object (for fluent API support)
	 */
	public function setTipo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->tipo !== $v) {
			$this->tipo = $v;
			$this->modifiedColumns[] = ContaContabilPeer::TIPO;
		}

		return $this;
	} // setTipo()

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
			$this->classificacao = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->categoria_conta_contabil_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->nome = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->apelido = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->descricao = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->tipo = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 8; // 8 = ContaContabilPeer::NUM_COLUMNS - ContaContabilPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating ContaContabil object", $e);
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

		if ($this->aCategoriaContaContabil !== null && $this->categoria_conta_contabil_id !== $this->aCategoriaContaContabil->getId()) {
			$this->aCategoriaContaContabil = null;
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
			$con = Propel::getConnection(ContaContabilPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ContaContabilPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aCategoriaContaContabil = null;
			$this->collLancamentoCaixas = null;
			$this->lastLancamentoCaixaCriteria = null;

			$this->collContasRecebers = null;
			$this->lastContasReceberCriteria = null;

			$this->collContasPagars = null;
			$this->lastContasPagarCriteria = null;

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
			$con = Propel::getConnection(ContaContabilPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				ContaContabilPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ContaContabilPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				ContaContabilPeer::addInstanceToPool($this);
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

			if ($this->aCategoriaContaContabil !== null) {
				if ($this->aCategoriaContaContabil->isModified() || $this->aCategoriaContaContabil->isNew()) {
					$affectedRows += $this->aCategoriaContaContabil->save($con);
				}
				$this->setCategoriaContaContabil($this->aCategoriaContaContabil);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = ContaContabilPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ContaContabilPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += ContaContabilPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collLancamentoCaixas !== null) {
				foreach ($this->collLancamentoCaixas as $referrerFK) {
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

			if ($this->collContasPagars !== null) {
				foreach ($this->collContasPagars as $referrerFK) {
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


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aCategoriaContaContabil !== null) {
				if (!$this->aCategoriaContaContabil->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCategoriaContaContabil->getValidationFailures());
				}
			}


			if (($retval = ContaContabilPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLancamentoCaixas !== null) {
					foreach ($this->collLancamentoCaixas as $referrerFK) {
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

				if ($this->collContasPagars !== null) {
					foreach ($this->collContasPagars as $referrerFK) {
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
		$criteria = new Criteria(ContaContabilPeer::DATABASE_NAME);

		if ($this->isColumnModified(ContaContabilPeer::ID)) $criteria->add(ContaContabilPeer::ID, $this->id);
		if ($this->isColumnModified(ContaContabilPeer::CODIGO)) $criteria->add(ContaContabilPeer::CODIGO, $this->codigo);
		if ($this->isColumnModified(ContaContabilPeer::CLASSIFICACAO)) $criteria->add(ContaContabilPeer::CLASSIFICACAO, $this->classificacao);
		if ($this->isColumnModified(ContaContabilPeer::CATEGORIA_CONTA_CONTABIL_ID)) $criteria->add(ContaContabilPeer::CATEGORIA_CONTA_CONTABIL_ID, $this->categoria_conta_contabil_id);
		if ($this->isColumnModified(ContaContabilPeer::NOME)) $criteria->add(ContaContabilPeer::NOME, $this->nome);
		if ($this->isColumnModified(ContaContabilPeer::APELIDO)) $criteria->add(ContaContabilPeer::APELIDO, $this->apelido);
		if ($this->isColumnModified(ContaContabilPeer::DESCRICAO)) $criteria->add(ContaContabilPeer::DESCRICAO, $this->descricao);
		if ($this->isColumnModified(ContaContabilPeer::TIPO)) $criteria->add(ContaContabilPeer::TIPO, $this->tipo);

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
		$criteria = new Criteria(ContaContabilPeer::DATABASE_NAME);

		$criteria->add(ContaContabilPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of ContaContabil (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setCodigo($this->codigo);

		$copyObj->setClassificacao($this->classificacao);

		$copyObj->setCategoriaContaContabilId($this->categoria_conta_contabil_id);

		$copyObj->setNome($this->nome);

		$copyObj->setApelido($this->apelido);

		$copyObj->setDescricao($this->descricao);

		$copyObj->setTipo($this->tipo);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getLancamentoCaixas() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addLancamentoCaixa($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getContasRecebers() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addContasReceber($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getContasPagars() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addContasPagar($relObj->copy($deepCopy));
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
	 * @return     ContaContabil Clone of current object.
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
	 * @return     ContaContabilPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ContaContabilPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a CategoriaContaContabil object.
	 *
	 * @param      CategoriaContaContabil $v
	 * @return     ContaContabil The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setCategoriaContaContabil(CategoriaContaContabil $v = null)
	{
		if ($v === null) {
			$this->setCategoriaContaContabilId(NULL);
		} else {
			$this->setCategoriaContaContabilId($v->getId());
		}

		$this->aCategoriaContaContabil = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the CategoriaContaContabil object, it will not be re-added.
		if ($v !== null) {
			$v->addContaContabil($this);
		}

		return $this;
	}


	/**
	 * Get the associated CategoriaContaContabil object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     CategoriaContaContabil The associated CategoriaContaContabil object.
	 * @throws     PropelException
	 */
	public function getCategoriaContaContabil(PropelPDO $con = null)
	{
		if ($this->aCategoriaContaContabil === null && ($this->categoria_conta_contabil_id !== null)) {
			$this->aCategoriaContaContabil = CategoriaContaContabilPeer::retrieveByPk($this->categoria_conta_contabil_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aCategoriaContaContabil->addContaContabils($this);
			 */
		}
		return $this->aCategoriaContaContabil;
	}

	/**
	 * Clears out the collLancamentoCaixas collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addLancamentoCaixas()
	 */
	public function clearLancamentoCaixas()
	{
		$this->collLancamentoCaixas = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collLancamentoCaixas collection (array).
	 *
	 * By default this just sets the collLancamentoCaixas collection to an empty array (like clearcollLancamentoCaixas());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initLancamentoCaixas()
	{
		$this->collLancamentoCaixas = array();
	}

	/**
	 * Gets an array of LancamentoCaixa objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this ContaContabil has previously been saved, it will retrieve
	 * related LancamentoCaixas from storage. If this ContaContabil is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array LancamentoCaixa[]
	 * @throws     PropelException
	 */
	public function getLancamentoCaixas($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContaContabilPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLancamentoCaixas === null) {
			if ($this->isNew()) {
			   $this->collLancamentoCaixas = array();
			} else {

				$criteria->add(LancamentoCaixaPeer::CONTA_CONTABIL_ID, $this->id);

				LancamentoCaixaPeer::addSelectColumns($criteria);
				$this->collLancamentoCaixas = LancamentoCaixaPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(LancamentoCaixaPeer::CONTA_CONTABIL_ID, $this->id);

				LancamentoCaixaPeer::addSelectColumns($criteria);
				if (!isset($this->lastLancamentoCaixaCriteria) || !$this->lastLancamentoCaixaCriteria->equals($criteria)) {
					$this->collLancamentoCaixas = LancamentoCaixaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLancamentoCaixaCriteria = $criteria;
		return $this->collLancamentoCaixas;
	}

	/**
	 * Returns the number of related LancamentoCaixa objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related LancamentoCaixa objects.
	 * @throws     PropelException
	 */
	public function countLancamentoCaixas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContaContabilPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collLancamentoCaixas === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(LancamentoCaixaPeer::CONTA_CONTABIL_ID, $this->id);

				$count = LancamentoCaixaPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(LancamentoCaixaPeer::CONTA_CONTABIL_ID, $this->id);

				if (!isset($this->lastLancamentoCaixaCriteria) || !$this->lastLancamentoCaixaCriteria->equals($criteria)) {
					$count = LancamentoCaixaPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collLancamentoCaixas);
				}
			} else {
				$count = count($this->collLancamentoCaixas);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a LancamentoCaixa object to this object
	 * through the LancamentoCaixa foreign key attribute.
	 *
	 * @param      LancamentoCaixa $l LancamentoCaixa
	 * @return     void
	 * @throws     PropelException
	 */
	public function addLancamentoCaixa(LancamentoCaixa $l)
	{
		if ($this->collLancamentoCaixas === null) {
			$this->initLancamentoCaixas();
		}
		if (!in_array($l, $this->collLancamentoCaixas, true)) { // only add it if the **same** object is not already associated
			array_push($this->collLancamentoCaixas, $l);
			$l->setContaContabil($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ContaContabil is new, it will return
	 * an empty collection; or if this ContaContabil has previously
	 * been saved, it will retrieve related LancamentoCaixas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ContaContabil.
	 */
	public function getLancamentoCaixasJoinContasPagar($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContaContabilPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLancamentoCaixas === null) {
			if ($this->isNew()) {
				$this->collLancamentoCaixas = array();
			} else {

				$criteria->add(LancamentoCaixaPeer::CONTA_CONTABIL_ID, $this->id);

				$this->collLancamentoCaixas = LancamentoCaixaPeer::doSelectJoinContasPagar($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(LancamentoCaixaPeer::CONTA_CONTABIL_ID, $this->id);

			if (!isset($this->lastLancamentoCaixaCriteria) || !$this->lastLancamentoCaixaCriteria->equals($criteria)) {
				$this->collLancamentoCaixas = LancamentoCaixaPeer::doSelectJoinContasPagar($criteria, $con, $join_behavior);
			}
		}
		$this->lastLancamentoCaixaCriteria = $criteria;

		return $this->collLancamentoCaixas;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ContaContabil is new, it will return
	 * an empty collection; or if this ContaContabil has previously
	 * been saved, it will retrieve related LancamentoCaixas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ContaContabil.
	 */
	public function getLancamentoCaixasJoinContasReceber($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContaContabilPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLancamentoCaixas === null) {
			if ($this->isNew()) {
				$this->collLancamentoCaixas = array();
			} else {

				$criteria->add(LancamentoCaixaPeer::CONTA_CONTABIL_ID, $this->id);

				$this->collLancamentoCaixas = LancamentoCaixaPeer::doSelectJoinContasReceber($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(LancamentoCaixaPeer::CONTA_CONTABIL_ID, $this->id);

			if (!isset($this->lastLancamentoCaixaCriteria) || !$this->lastLancamentoCaixaCriteria->equals($criteria)) {
				$this->collLancamentoCaixas = LancamentoCaixaPeer::doSelectJoinContasReceber($criteria, $con, $join_behavior);
			}
		}
		$this->lastLancamentoCaixaCriteria = $criteria;

		return $this->collLancamentoCaixas;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ContaContabil is new, it will return
	 * an empty collection; or if this ContaContabil has previously
	 * been saved, it will retrieve related LancamentoCaixas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ContaContabil.
	 */
	public function getLancamentoCaixasJoinCaixa($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContaContabilPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLancamentoCaixas === null) {
			if ($this->isNew()) {
				$this->collLancamentoCaixas = array();
			} else {

				$criteria->add(LancamentoCaixaPeer::CONTA_CONTABIL_ID, $this->id);

				$this->collLancamentoCaixas = LancamentoCaixaPeer::doSelectJoinCaixa($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(LancamentoCaixaPeer::CONTA_CONTABIL_ID, $this->id);

			if (!isset($this->lastLancamentoCaixaCriteria) || !$this->lastLancamentoCaixaCriteria->equals($criteria)) {
				$this->collLancamentoCaixas = LancamentoCaixaPeer::doSelectJoinCaixa($criteria, $con, $join_behavior);
			}
		}
		$this->lastLancamentoCaixaCriteria = $criteria;

		return $this->collLancamentoCaixas;
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
	 * Otherwise if this ContaContabil has previously been saved, it will retrieve
	 * related ContasRecebers from storage. If this ContaContabil is new, it will return
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
			$criteria = new Criteria(ContaContabilPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasRecebers === null) {
			if ($this->isNew()) {
			   $this->collContasRecebers = array();
			} else {

				$criteria->add(ContasReceberPeer::CONTA_CONTABIL_ID, $this->id);

				ContasReceberPeer::addSelectColumns($criteria);
				$this->collContasRecebers = ContasReceberPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ContasReceberPeer::CONTA_CONTABIL_ID, $this->id);

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
			$criteria = new Criteria(ContaContabilPeer::DATABASE_NAME);
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

				$criteria->add(ContasReceberPeer::CONTA_CONTABIL_ID, $this->id);

				$count = ContasReceberPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ContasReceberPeer::CONTA_CONTABIL_ID, $this->id);

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
			$l->setContaContabil($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ContaContabil is new, it will return
	 * an empty collection; or if this ContaContabil has previously
	 * been saved, it will retrieve related ContasRecebers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ContaContabil.
	 */
	public function getContasRecebersJoinBanco($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContaContabilPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasRecebers === null) {
			if ($this->isNew()) {
				$this->collContasRecebers = array();
			} else {

				$criteria->add(ContasReceberPeer::CONTA_CONTABIL_ID, $this->id);

				$this->collContasRecebers = ContasReceberPeer::doSelectJoinBanco($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContasReceberPeer::CONTA_CONTABIL_ID, $this->id);

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
	 * Otherwise if this ContaContabil is new, it will return
	 * an empty collection; or if this ContaContabil has previously
	 * been saved, it will retrieve related ContasRecebers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ContaContabil.
	 */
	public function getContasRecebersJoinPedido($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContaContabilPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasRecebers === null) {
			if ($this->isNew()) {
				$this->collContasRecebers = array();
			} else {

				$criteria->add(ContasReceberPeer::CONTA_CONTABIL_ID, $this->id);

				$this->collContasRecebers = ContasReceberPeer::doSelectJoinPedido($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContasReceberPeer::CONTA_CONTABIL_ID, $this->id);

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
	 * Otherwise if this ContaContabil is new, it will return
	 * an empty collection; or if this ContaContabil has previously
	 * been saved, it will retrieve related ContasRecebers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ContaContabil.
	 */
	public function getContasRecebersJoinCertificado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContaContabilPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasRecebers === null) {
			if ($this->isNew()) {
				$this->collContasRecebers = array();
			} else {

				$criteria->add(ContasReceberPeer::CONTA_CONTABIL_ID, $this->id);

				$this->collContasRecebers = ContasReceberPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContasReceberPeer::CONTA_CONTABIL_ID, $this->id);

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
	 * Otherwise if this ContaContabil is new, it will return
	 * an empty collection; or if this ContaContabil has previously
	 * been saved, it will retrieve related ContasRecebers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ContaContabil.
	 */
	public function getContasRecebersJoinFormaPagamento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContaContabilPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasRecebers === null) {
			if ($this->isNew()) {
				$this->collContasRecebers = array();
			} else {

				$criteria->add(ContasReceberPeer::CONTA_CONTABIL_ID, $this->id);

				$this->collContasRecebers = ContasReceberPeer::doSelectJoinFormaPagamento($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContasReceberPeer::CONTA_CONTABIL_ID, $this->id);

			if (!isset($this->lastContasReceberCriteria) || !$this->lastContasReceberCriteria->equals($criteria)) {
				$this->collContasRecebers = ContasReceberPeer::doSelectJoinFormaPagamento($criteria, $con, $join_behavior);
			}
		}
		$this->lastContasReceberCriteria = $criteria;

		return $this->collContasRecebers;
	}

	/**
	 * Clears out the collContasPagars collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addContasPagars()
	 */
	public function clearContasPagars()
	{
		$this->collContasPagars = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collContasPagars collection (array).
	 *
	 * By default this just sets the collContasPagars collection to an empty array (like clearcollContasPagars());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initContasPagars()
	{
		$this->collContasPagars = array();
	}

	/**
	 * Gets an array of ContasPagar objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this ContaContabil has previously been saved, it will retrieve
	 * related ContasPagars from storage. If this ContaContabil is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ContasPagar[]
	 * @throws     PropelException
	 */
	public function getContasPagars($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContaContabilPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasPagars === null) {
			if ($this->isNew()) {
			   $this->collContasPagars = array();
			} else {

				$criteria->add(ContasPagarPeer::CONTA_CONTABIL_ID, $this->id);

				ContasPagarPeer::addSelectColumns($criteria);
				$this->collContasPagars = ContasPagarPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ContasPagarPeer::CONTA_CONTABIL_ID, $this->id);

				ContasPagarPeer::addSelectColumns($criteria);
				if (!isset($this->lastContasPagarCriteria) || !$this->lastContasPagarCriteria->equals($criteria)) {
					$this->collContasPagars = ContasPagarPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastContasPagarCriteria = $criteria;
		return $this->collContasPagars;
	}

	/**
	 * Returns the number of related ContasPagar objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ContasPagar objects.
	 * @throws     PropelException
	 */
	public function countContasPagars(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContaContabilPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collContasPagars === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ContasPagarPeer::CONTA_CONTABIL_ID, $this->id);

				$count = ContasPagarPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ContasPagarPeer::CONTA_CONTABIL_ID, $this->id);

				if (!isset($this->lastContasPagarCriteria) || !$this->lastContasPagarCriteria->equals($criteria)) {
					$count = ContasPagarPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collContasPagars);
				}
			} else {
				$count = count($this->collContasPagars);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a ContasPagar object to this object
	 * through the ContasPagar foreign key attribute.
	 *
	 * @param      ContasPagar $l ContasPagar
	 * @return     void
	 * @throws     PropelException
	 */
	public function addContasPagar(ContasPagar $l)
	{
		if ($this->collContasPagars === null) {
			$this->initContasPagars();
		}
		if (!in_array($l, $this->collContasPagars, true)) { // only add it if the **same** object is not already associated
			array_push($this->collContasPagars, $l);
			$l->setContaContabil($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ContaContabil is new, it will return
	 * an empty collection; or if this ContaContabil has previously
	 * been saved, it will retrieve related ContasPagars from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ContaContabil.
	 */
	public function getContasPagarsJoinContasPagarRelatedByContaPagarId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContaContabilPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasPagars === null) {
			if ($this->isNew()) {
				$this->collContasPagars = array();
			} else {

				$criteria->add(ContasPagarPeer::CONTA_CONTABIL_ID, $this->id);

				$this->collContasPagars = ContasPagarPeer::doSelectJoinContasPagarRelatedByContaPagarId($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContasPagarPeer::CONTA_CONTABIL_ID, $this->id);

			if (!isset($this->lastContasPagarCriteria) || !$this->lastContasPagarCriteria->equals($criteria)) {
				$this->collContasPagars = ContasPagarPeer::doSelectJoinContasPagarRelatedByContaPagarId($criteria, $con, $join_behavior);
			}
		}
		$this->lastContasPagarCriteria = $criteria;

		return $this->collContasPagars;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ContaContabil is new, it will return
	 * an empty collection; or if this ContaContabil has previously
	 * been saved, it will retrieve related ContasPagars from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ContaContabil.
	 */
	public function getContasPagarsJoinLancamentoCaixa($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContaContabilPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasPagars === null) {
			if ($this->isNew()) {
				$this->collContasPagars = array();
			} else {

				$criteria->add(ContasPagarPeer::CONTA_CONTABIL_ID, $this->id);

				$this->collContasPagars = ContasPagarPeer::doSelectJoinLancamentoCaixa($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContasPagarPeer::CONTA_CONTABIL_ID, $this->id);

			if (!isset($this->lastContasPagarCriteria) || !$this->lastContasPagarCriteria->equals($criteria)) {
				$this->collContasPagars = ContasPagarPeer::doSelectJoinLancamentoCaixa($criteria, $con, $join_behavior);
			}
		}
		$this->lastContasPagarCriteria = $criteria;

		return $this->collContasPagars;
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
	 * Otherwise if this ContaContabil has previously been saved, it will retrieve
	 * related LancamentoContas from storage. If this ContaContabil is new, it will return
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
			$criteria = new Criteria(ContaContabilPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLancamentoContas === null) {
			if ($this->isNew()) {
			   $this->collLancamentoContas = array();
			} else {

				$criteria->add(LancamentoContaPeer::CONTA_CONTABIL_ID, $this->id);

				LancamentoContaPeer::addSelectColumns($criteria);
				$this->collLancamentoContas = LancamentoContaPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(LancamentoContaPeer::CONTA_CONTABIL_ID, $this->id);

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
			$criteria = new Criteria(ContaContabilPeer::DATABASE_NAME);
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

				$criteria->add(LancamentoContaPeer::CONTA_CONTABIL_ID, $this->id);

				$count = LancamentoContaPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(LancamentoContaPeer::CONTA_CONTABIL_ID, $this->id);

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
			$l->setContaContabil($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ContaContabil is new, it will return
	 * an empty collection; or if this ContaContabil has previously
	 * been saved, it will retrieve related LancamentoContas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ContaContabil.
	 */
	public function getLancamentoContasJoinContasPagar($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContaContabilPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLancamentoContas === null) {
			if ($this->isNew()) {
				$this->collLancamentoContas = array();
			} else {

				$criteria->add(LancamentoContaPeer::CONTA_CONTABIL_ID, $this->id);

				$this->collLancamentoContas = LancamentoContaPeer::doSelectJoinContasPagar($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(LancamentoContaPeer::CONTA_CONTABIL_ID, $this->id);

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
	 * Otherwise if this ContaContabil is new, it will return
	 * an empty collection; or if this ContaContabil has previously
	 * been saved, it will retrieve related LancamentoContas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ContaContabil.
	 */
	public function getLancamentoContasJoinContasReceber($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContaContabilPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLancamentoContas === null) {
			if ($this->isNew()) {
				$this->collLancamentoContas = array();
			} else {

				$criteria->add(LancamentoContaPeer::CONTA_CONTABIL_ID, $this->id);

				$this->collLancamentoContas = LancamentoContaPeer::doSelectJoinContasReceber($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(LancamentoContaPeer::CONTA_CONTABIL_ID, $this->id);

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
	 * Otherwise if this ContaContabil is new, it will return
	 * an empty collection; or if this ContaContabil has previously
	 * been saved, it will retrieve related LancamentoContas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ContaContabil.
	 */
	public function getLancamentoContasJoinContaBancaria($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContaContabilPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLancamentoContas === null) {
			if ($this->isNew()) {
				$this->collLancamentoContas = array();
			} else {

				$criteria->add(LancamentoContaPeer::CONTA_CONTABIL_ID, $this->id);

				$this->collLancamentoContas = LancamentoContaPeer::doSelectJoinContaBancaria($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(LancamentoContaPeer::CONTA_CONTABIL_ID, $this->id);

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
	 * Otherwise if this ContaContabil is new, it will return
	 * an empty collection; or if this ContaContabil has previously
	 * been saved, it will retrieve related LancamentoContas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ContaContabil.
	 */
	public function getLancamentoContasJoinLocal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContaContabilPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLancamentoContas === null) {
			if ($this->isNew()) {
				$this->collLancamentoContas = array();
			} else {

				$criteria->add(LancamentoContaPeer::CONTA_CONTABIL_ID, $this->id);

				$this->collLancamentoContas = LancamentoContaPeer::doSelectJoinLocal($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(LancamentoContaPeer::CONTA_CONTABIL_ID, $this->id);

			if (!isset($this->lastLancamentoContaCriteria) || !$this->lastLancamentoContaCriteria->equals($criteria)) {
				$this->collLancamentoContas = LancamentoContaPeer::doSelectJoinLocal($criteria, $con, $join_behavior);
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
			if ($this->collLancamentoCaixas) {
				foreach ((array) $this->collLancamentoCaixas as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collContasRecebers) {
				foreach ((array) $this->collContasRecebers as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collContasPagars) {
				foreach ((array) $this->collContasPagars as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collLancamentoContas) {
				foreach ((array) $this->collLancamentoContas as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collLancamentoCaixas = null;
		$this->collContasRecebers = null;
		$this->collContasPagars = null;
		$this->collLancamentoContas = null;
			$this->aCategoriaContaContabil = null;
	}

} // BaseContaContabil
