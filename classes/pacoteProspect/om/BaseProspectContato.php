<?php

/**
 * Base class that represents a row from the 'prospect_contato' table.
 *
 * 
 *
 * @package    pacoteProspect.om
 */
abstract class BaseProspectContato extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ProspectContatoPeer
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
	 * The value for the pessoa_tipo field.
	 * @var        string
	 */
	protected $pessoa_tipo;

	/**
	 * The value for the cpf field.
	 * @var        string
	 */
	protected $cpf;

	/**
	 * The value for the cnpj field.
	 * @var        string
	 */
	protected $cnpj;

	/**
	 * The value for the fone field.
	 * @var        string
	 */
	protected $fone;

	/**
	 * The value for the site field.
	 * @var        string
	 */
	protected $site;

	/**
	 * The value for the cidade field.
	 * @var        string
	 */
	protected $cidade;

	/**
	 * The value for the bairro field.
	 * @var        string
	 */
	protected $bairro;

	/**
	 * The value for the uf field.
	 * @var        string
	 */
	protected $uf;

	/**
	 * The value for the endereco field.
	 * @var        string
	 */
	protected $endereco;

	/**
	 * The value for the prospect_tipo_id field.
	 * @var        int
	 */
	protected $prospect_tipo_id;

	/**
	 * The value for the usuario_id field.
	 * @var        int
	 */
	protected $usuario_id;

	/**
	 * @var        Usuario
	 */
	protected $aUsuario;

	/**
	 * @var        ProspectTipo
	 */
	protected $aProspectTipo;

	/**
	 * @var        array Prospect[] Collection to store aggregation of Prospect objects.
	 */
	protected $collProspects;

	/**
	 * @var        Criteria The criteria used to select the current contents of collProspects.
	 */
	private $lastProspectCriteria = null;

	/**
	 * @var        array ProspectContatoDetalhe[] Collection to store aggregation of ProspectContatoDetalhe objects.
	 */
	protected $collProspectContatoDetalhes;

	/**
	 * @var        Criteria The criteria used to select the current contents of collProspectContatoDetalhes.
	 */
	private $lastProspectContatoDetalheCriteria = null;

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
	 * Get the [pessoa_tipo] column value.
	 * 
	 * @return     string
	 */
	public function getPessoaTipo()
	{
		return $this->pessoa_tipo;
	}

	/**
	 * Get the [cpf] column value.
	 * 
	 * @return     string
	 */
	public function getCpf()
	{
		return $this->cpf;
	}

	/**
	 * Get the [cnpj] column value.
	 * 
	 * @return     string
	 */
	public function getCnpj()
	{
		return $this->cnpj;
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
	 * Get the [site] column value.
	 * 
	 * @return     string
	 */
	public function getSite()
	{
		return $this->site;
	}

	/**
	 * Get the [cidade] column value.
	 * 
	 * @return     string
	 */
	public function getCidade()
	{
		return $this->cidade;
	}

	/**
	 * Get the [bairro] column value.
	 * 
	 * @return     string
	 */
	public function getBairro()
	{
		return $this->bairro;
	}

	/**
	 * Get the [uf] column value.
	 * 
	 * @return     string
	 */
	public function getUf()
	{
		return $this->uf;
	}

	/**
	 * Get the [endereco] column value.
	 * 
	 * @return     string
	 */
	public function getEndereco()
	{
		return $this->endereco;
	}

	/**
	 * Get the [prospect_tipo_id] column value.
	 * 
	 * @return     int
	 */
	public function getProspectTipoId()
	{
		return $this->prospect_tipo_id;
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
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     ProspectContato The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ProspectContatoPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [nome] column.
	 * 
	 * @param      string $v new value
	 * @return     ProspectContato The current object (for fluent API support)
	 */
	public function setNome($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome !== $v) {
			$this->nome = $v;
			$this->modifiedColumns[] = ProspectContatoPeer::NOME;
		}

		return $this;
	} // setNome()

	/**
	 * Set the value of [pessoa_tipo] column.
	 * 
	 * @param      string $v new value
	 * @return     ProspectContato The current object (for fluent API support)
	 */
	public function setPessoaTipo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->pessoa_tipo !== $v) {
			$this->pessoa_tipo = $v;
			$this->modifiedColumns[] = ProspectContatoPeer::PESSOA_TIPO;
		}

		return $this;
	} // setPessoaTipo()

	/**
	 * Set the value of [cpf] column.
	 * 
	 * @param      string $v new value
	 * @return     ProspectContato The current object (for fluent API support)
	 */
	public function setCpf($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cpf !== $v) {
			$this->cpf = $v;
			$this->modifiedColumns[] = ProspectContatoPeer::CPF;
		}

		return $this;
	} // setCpf()

	/**
	 * Set the value of [cnpj] column.
	 * 
	 * @param      string $v new value
	 * @return     ProspectContato The current object (for fluent API support)
	 */
	public function setCnpj($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cnpj !== $v) {
			$this->cnpj = $v;
			$this->modifiedColumns[] = ProspectContatoPeer::CNPJ;
		}

		return $this;
	} // setCnpj()

	/**
	 * Set the value of [fone] column.
	 * 
	 * @param      string $v new value
	 * @return     ProspectContato The current object (for fluent API support)
	 */
	public function setFone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->fone !== $v) {
			$this->fone = $v;
			$this->modifiedColumns[] = ProspectContatoPeer::FONE;
		}

		return $this;
	} // setFone()

	/**
	 * Set the value of [site] column.
	 * 
	 * @param      string $v new value
	 * @return     ProspectContato The current object (for fluent API support)
	 */
	public function setSite($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->site !== $v) {
			$this->site = $v;
			$this->modifiedColumns[] = ProspectContatoPeer::SITE;
		}

		return $this;
	} // setSite()

	/**
	 * Set the value of [cidade] column.
	 * 
	 * @param      string $v new value
	 * @return     ProspectContato The current object (for fluent API support)
	 */
	public function setCidade($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cidade !== $v) {
			$this->cidade = $v;
			$this->modifiedColumns[] = ProspectContatoPeer::CIDADE;
		}

		return $this;
	} // setCidade()

	/**
	 * Set the value of [bairro] column.
	 * 
	 * @param      string $v new value
	 * @return     ProspectContato The current object (for fluent API support)
	 */
	public function setBairro($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->bairro !== $v) {
			$this->bairro = $v;
			$this->modifiedColumns[] = ProspectContatoPeer::BAIRRO;
		}

		return $this;
	} // setBairro()

	/**
	 * Set the value of [uf] column.
	 * 
	 * @param      string $v new value
	 * @return     ProspectContato The current object (for fluent API support)
	 */
	public function setUf($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->uf !== $v) {
			$this->uf = $v;
			$this->modifiedColumns[] = ProspectContatoPeer::UF;
		}

		return $this;
	} // setUf()

	/**
	 * Set the value of [endereco] column.
	 * 
	 * @param      string $v new value
	 * @return     ProspectContato The current object (for fluent API support)
	 */
	public function setEndereco($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->endereco !== $v) {
			$this->endereco = $v;
			$this->modifiedColumns[] = ProspectContatoPeer::ENDERECO;
		}

		return $this;
	} // setEndereco()

	/**
	 * Set the value of [prospect_tipo_id] column.
	 * 
	 * @param      int $v new value
	 * @return     ProspectContato The current object (for fluent API support)
	 */
	public function setProspectTipoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->prospect_tipo_id !== $v) {
			$this->prospect_tipo_id = $v;
			$this->modifiedColumns[] = ProspectContatoPeer::PROSPECT_TIPO_ID;
		}

		if ($this->aProspectTipo !== null && $this->aProspectTipo->getId() !== $v) {
			$this->aProspectTipo = null;
		}

		return $this;
	} // setProspectTipoId()

	/**
	 * Set the value of [usuario_id] column.
	 * 
	 * @param      int $v new value
	 * @return     ProspectContato The current object (for fluent API support)
	 */
	public function setUsuarioId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->usuario_id !== $v) {
			$this->usuario_id = $v;
			$this->modifiedColumns[] = ProspectContatoPeer::USUARIO_ID;
		}

		if ($this->aUsuario !== null && $this->aUsuario->getId() !== $v) {
			$this->aUsuario = null;
		}

		return $this;
	} // setUsuarioId()

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
			$this->pessoa_tipo = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->cpf = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->cnpj = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->fone = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->site = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->cidade = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->bairro = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->uf = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->endereco = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->prospect_tipo_id = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
			$this->usuario_id = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 13; // 13 = ProspectContatoPeer::NUM_COLUMNS - ProspectContatoPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating ProspectContato object", $e);
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

		if ($this->aProspectTipo !== null && $this->prospect_tipo_id !== $this->aProspectTipo->getId()) {
			$this->aProspectTipo = null;
		}
		if ($this->aUsuario !== null && $this->usuario_id !== $this->aUsuario->getId()) {
			$this->aUsuario = null;
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
			$con = Propel::getConnection(ProspectContatoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ProspectContatoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aUsuario = null;
			$this->aProspectTipo = null;
			$this->collProspects = null;
			$this->lastProspectCriteria = null;

			$this->collProspectContatoDetalhes = null;
			$this->lastProspectContatoDetalheCriteria = null;

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
			$con = Propel::getConnection(ProspectContatoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				ProspectContatoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ProspectContatoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				ProspectContatoPeer::addInstanceToPool($this);
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

			if ($this->aProspectTipo !== null) {
				if ($this->aProspectTipo->isModified() || $this->aProspectTipo->isNew()) {
					$affectedRows += $this->aProspectTipo->save($con);
				}
				$this->setProspectTipo($this->aProspectTipo);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = ProspectContatoPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ProspectContatoPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += ProspectContatoPeer::doUpdate($this, $con);
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

			if ($this->collProspectContatoDetalhes !== null) {
				foreach ($this->collProspectContatoDetalhes as $referrerFK) {
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

			if ($this->aUsuario !== null) {
				if (!$this->aUsuario->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUsuario->getValidationFailures());
				}
			}

			if ($this->aProspectTipo !== null) {
				if (!$this->aProspectTipo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProspectTipo->getValidationFailures());
				}
			}


			if (($retval = ProspectContatoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collProspects !== null) {
					foreach ($this->collProspects as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collProspectContatoDetalhes !== null) {
					foreach ($this->collProspectContatoDetalhes as $referrerFK) {
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
		$criteria = new Criteria(ProspectContatoPeer::DATABASE_NAME);

		if ($this->isColumnModified(ProspectContatoPeer::ID)) $criteria->add(ProspectContatoPeer::ID, $this->id);
		if ($this->isColumnModified(ProspectContatoPeer::NOME)) $criteria->add(ProspectContatoPeer::NOME, $this->nome);
		if ($this->isColumnModified(ProspectContatoPeer::PESSOA_TIPO)) $criteria->add(ProspectContatoPeer::PESSOA_TIPO, $this->pessoa_tipo);
		if ($this->isColumnModified(ProspectContatoPeer::CPF)) $criteria->add(ProspectContatoPeer::CPF, $this->cpf);
		if ($this->isColumnModified(ProspectContatoPeer::CNPJ)) $criteria->add(ProspectContatoPeer::CNPJ, $this->cnpj);
		if ($this->isColumnModified(ProspectContatoPeer::FONE)) $criteria->add(ProspectContatoPeer::FONE, $this->fone);
		if ($this->isColumnModified(ProspectContatoPeer::SITE)) $criteria->add(ProspectContatoPeer::SITE, $this->site);
		if ($this->isColumnModified(ProspectContatoPeer::CIDADE)) $criteria->add(ProspectContatoPeer::CIDADE, $this->cidade);
		if ($this->isColumnModified(ProspectContatoPeer::BAIRRO)) $criteria->add(ProspectContatoPeer::BAIRRO, $this->bairro);
		if ($this->isColumnModified(ProspectContatoPeer::UF)) $criteria->add(ProspectContatoPeer::UF, $this->uf);
		if ($this->isColumnModified(ProspectContatoPeer::ENDERECO)) $criteria->add(ProspectContatoPeer::ENDERECO, $this->endereco);
		if ($this->isColumnModified(ProspectContatoPeer::PROSPECT_TIPO_ID)) $criteria->add(ProspectContatoPeer::PROSPECT_TIPO_ID, $this->prospect_tipo_id);
		if ($this->isColumnModified(ProspectContatoPeer::USUARIO_ID)) $criteria->add(ProspectContatoPeer::USUARIO_ID, $this->usuario_id);

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
		$criteria = new Criteria(ProspectContatoPeer::DATABASE_NAME);

		$criteria->add(ProspectContatoPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of ProspectContato (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNome($this->nome);

		$copyObj->setPessoaTipo($this->pessoa_tipo);

		$copyObj->setCpf($this->cpf);

		$copyObj->setCnpj($this->cnpj);

		$copyObj->setFone($this->fone);

		$copyObj->setSite($this->site);

		$copyObj->setCidade($this->cidade);

		$copyObj->setBairro($this->bairro);

		$copyObj->setUf($this->uf);

		$copyObj->setEndereco($this->endereco);

		$copyObj->setProspectTipoId($this->prospect_tipo_id);

		$copyObj->setUsuarioId($this->usuario_id);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getProspects() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addProspect($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getProspectContatoDetalhes() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addProspectContatoDetalhe($relObj->copy($deepCopy));
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
	 * @return     ProspectContato Clone of current object.
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
	 * @return     ProspectContatoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ProspectContatoPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Usuario object.
	 *
	 * @param      Usuario $v
	 * @return     ProspectContato The current object (for fluent API support)
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
			$v->addProspectContato($this);
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
			   $this->aUsuario->addProspectContatos($this);
			 */
		}
		return $this->aUsuario;
	}

	/**
	 * Declares an association between this object and a ProspectTipo object.
	 *
	 * @param      ProspectTipo $v
	 * @return     ProspectContato The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setProspectTipo(ProspectTipo $v = null)
	{
		if ($v === null) {
			$this->setProspectTipoId(NULL);
		} else {
			$this->setProspectTipoId($v->getId());
		}

		$this->aProspectTipo = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the ProspectTipo object, it will not be re-added.
		if ($v !== null) {
			$v->addProspectContato($this);
		}

		return $this;
	}


	/**
	 * Get the associated ProspectTipo object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     ProspectTipo The associated ProspectTipo object.
	 * @throws     PropelException
	 */
	public function getProspectTipo(PropelPDO $con = null)
	{
		if ($this->aProspectTipo === null && ($this->prospect_tipo_id !== null)) {
			$this->aProspectTipo = ProspectTipoPeer::retrieveByPk($this->prospect_tipo_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aProspectTipo->addProspectContatos($this);
			 */
		}
		return $this->aProspectTipo;
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
	 * Otherwise if this ProspectContato has previously been saved, it will retrieve
	 * related Prospects from storage. If this ProspectContato is new, it will return
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
			$criteria = new Criteria(ProspectContatoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspects === null) {
			if ($this->isNew()) {
			   $this->collProspects = array();
			} else {

				$criteria->add(ProspectPeer::PROSPECT_CONTATOS_ID, $this->id);

				ProspectPeer::addSelectColumns($criteria);
				$this->collProspects = ProspectPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ProspectPeer::PROSPECT_CONTATOS_ID, $this->id);

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
			$criteria = new Criteria(ProspectContatoPeer::DATABASE_NAME);
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

				$criteria->add(ProspectPeer::PROSPECT_CONTATOS_ID, $this->id);

				$count = ProspectPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ProspectPeer::PROSPECT_CONTATOS_ID, $this->id);

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
			$l->setProspectContato($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ProspectContato is new, it will return
	 * an empty collection; or if this ProspectContato has previously
	 * been saved, it will retrieve related Prospects from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ProspectContato.
	 */
	public function getProspectsJoinContador($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProspectContatoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspects === null) {
			if ($this->isNew()) {
				$this->collProspects = array();
			} else {

				$criteria->add(ProspectPeer::PROSPECT_CONTATOS_ID, $this->id);

				$this->collProspects = ProspectPeer::doSelectJoinContador($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectPeer::PROSPECT_CONTATOS_ID, $this->id);

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
	 * Otherwise if this ProspectContato is new, it will return
	 * an empty collection; or if this ProspectContato has previously
	 * been saved, it will retrieve related Prospects from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ProspectContato.
	 */
	public function getProspectsJoinCertificado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProspectContatoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspects === null) {
			if ($this->isNew()) {
				$this->collProspects = array();
			} else {

				$criteria->add(ProspectPeer::PROSPECT_CONTATOS_ID, $this->id);

				$this->collProspects = ProspectPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectPeer::PROSPECT_CONTATOS_ID, $this->id);

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
	 * Otherwise if this ProspectContato is new, it will return
	 * an empty collection; or if this ProspectContato has previously
	 * been saved, it will retrieve related Prospects from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ProspectContato.
	 */
	public function getProspectsJoinUsuarioRelatedByUsuarioId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProspectContatoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspects === null) {
			if ($this->isNew()) {
				$this->collProspects = array();
			} else {

				$criteria->add(ProspectPeer::PROSPECT_CONTATOS_ID, $this->id);

				$this->collProspects = ProspectPeer::doSelectJoinUsuarioRelatedByUsuarioId($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectPeer::PROSPECT_CONTATOS_ID, $this->id);

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
	 * Otherwise if this ProspectContato is new, it will return
	 * an empty collection; or if this ProspectContato has previously
	 * been saved, it will retrieve related Prospects from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ProspectContato.
	 */
	public function getProspectsJoinUsuarioRelatedBySupervisorUsuarioId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProspectContatoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspects === null) {
			if ($this->isNew()) {
				$this->collProspects = array();
			} else {

				$criteria->add(ProspectPeer::PROSPECT_CONTATOS_ID, $this->id);

				$this->collProspects = ProspectPeer::doSelectJoinUsuarioRelatedBySupervisorUsuarioId($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectPeer::PROSPECT_CONTATOS_ID, $this->id);

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
	 * Otherwise if this ProspectContato is new, it will return
	 * an empty collection; or if this ProspectContato has previously
	 * been saved, it will retrieve related Prospects from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ProspectContato.
	 */
	public function getProspectsJoinProspectTipo($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProspectContatoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspects === null) {
			if ($this->isNew()) {
				$this->collProspects = array();
			} else {

				$criteria->add(ProspectPeer::PROSPECT_CONTATOS_ID, $this->id);

				$this->collProspects = ProspectPeer::doSelectJoinProspectTipo($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectPeer::PROSPECT_CONTATOS_ID, $this->id);

			if (!isset($this->lastProspectCriteria) || !$this->lastProspectCriteria->equals($criteria)) {
				$this->collProspects = ProspectPeer::doSelectJoinProspectTipo($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectCriteria = $criteria;

		return $this->collProspects;
	}

	/**
	 * Clears out the collProspectContatoDetalhes collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addProspectContatoDetalhes()
	 */
	public function clearProspectContatoDetalhes()
	{
		$this->collProspectContatoDetalhes = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collProspectContatoDetalhes collection (array).
	 *
	 * By default this just sets the collProspectContatoDetalhes collection to an empty array (like clearcollProspectContatoDetalhes());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initProspectContatoDetalhes()
	{
		$this->collProspectContatoDetalhes = array();
	}

	/**
	 * Gets an array of ProspectContatoDetalhe objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this ProspectContato has previously been saved, it will retrieve
	 * related ProspectContatoDetalhes from storage. If this ProspectContato is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ProspectContatoDetalhe[]
	 * @throws     PropelException
	 */
	public function getProspectContatoDetalhes($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProspectContatoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectContatoDetalhes === null) {
			if ($this->isNew()) {
			   $this->collProspectContatoDetalhes = array();
			} else {

				$criteria->add(ProspectContatoDetalhePeer::PROSPECT_CONTATO_ID, $this->id);

				ProspectContatoDetalhePeer::addSelectColumns($criteria);
				$this->collProspectContatoDetalhes = ProspectContatoDetalhePeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ProspectContatoDetalhePeer::PROSPECT_CONTATO_ID, $this->id);

				ProspectContatoDetalhePeer::addSelectColumns($criteria);
				if (!isset($this->lastProspectContatoDetalheCriteria) || !$this->lastProspectContatoDetalheCriteria->equals($criteria)) {
					$this->collProspectContatoDetalhes = ProspectContatoDetalhePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProspectContatoDetalheCriteria = $criteria;
		return $this->collProspectContatoDetalhes;
	}

	/**
	 * Returns the number of related ProspectContatoDetalhe objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ProspectContatoDetalhe objects.
	 * @throws     PropelException
	 */
	public function countProspectContatoDetalhes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProspectContatoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collProspectContatoDetalhes === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ProspectContatoDetalhePeer::PROSPECT_CONTATO_ID, $this->id);

				$count = ProspectContatoDetalhePeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ProspectContatoDetalhePeer::PROSPECT_CONTATO_ID, $this->id);

				if (!isset($this->lastProspectContatoDetalheCriteria) || !$this->lastProspectContatoDetalheCriteria->equals($criteria)) {
					$count = ProspectContatoDetalhePeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collProspectContatoDetalhes);
				}
			} else {
				$count = count($this->collProspectContatoDetalhes);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a ProspectContatoDetalhe object to this object
	 * through the ProspectContatoDetalhe foreign key attribute.
	 *
	 * @param      ProspectContatoDetalhe $l ProspectContatoDetalhe
	 * @return     void
	 * @throws     PropelException
	 */
	public function addProspectContatoDetalhe(ProspectContatoDetalhe $l)
	{
		if ($this->collProspectContatoDetalhes === null) {
			$this->initProspectContatoDetalhes();
		}
		if (!in_array($l, $this->collProspectContatoDetalhes, true)) { // only add it if the **same** object is not already associated
			array_push($this->collProspectContatoDetalhes, $l);
			$l->setProspectContato($this);
		}
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
			if ($this->collProspectContatoDetalhes) {
				foreach ((array) $this->collProspectContatoDetalhes as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collProspects = null;
		$this->collProspectContatoDetalhes = null;
			$this->aUsuario = null;
			$this->aProspectTipo = null;
	}

} // BaseProspectContato
