<?php

/**
 * Base class that represents a row from the 'detalhe_cheque' table.
 *
 * 
 *
 * @package    pacoteFinanceiro.om
 */
abstract class BaseDetalheCheque extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        DetalheChequePeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the banco_id field.
	 * @var        int
	 */
	protected $banco_id;

	/**
	 * The value for the vendedor_id field.
	 * @var        int
	 */
	protected $vendedor_id;

	/**
	 * The value for the lancamento_caixa_id field.
	 * @var        int
	 */
	protected $lancamento_caixa_id;

	/**
	 * The value for the numero field.
	 * @var        int
	 */
	protected $numero;

	/**
	 * The value for the bom_para field.
	 * @var        string
	 */
	protected $bom_para;

	/**
	 * The value for the valor field.
	 * @var        double
	 */
	protected $valor;

	/**
	 * The value for the data_recebimento field.
	 * @var        string
	 */
	protected $data_recebimento;

	/**
	 * The value for the nome_cliente field.
	 * @var        string
	 */
	protected $nome_cliente;

	/**
	 * The value for the situacao field.
	 * @var        string
	 */
	protected $situacao;

	/**
	 * @var        LancamentoCaixa
	 */
	protected $aLancamentoCaixa;

	/**
	 * @var        Banco
	 */
	protected $aBanco;

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
	 * Get the [banco_id] column value.
	 * 
	 * @return     int
	 */
	public function getBancoId()
	{
		return $this->banco_id;
	}

	/**
	 * Get the [vendedor_id] column value.
	 * 
	 * @return     int
	 */
	public function getVendedorId()
	{
		return $this->vendedor_id;
	}

	/**
	 * Get the [lancamento_caixa_id] column value.
	 * 
	 * @return     int
	 */
	public function getLancamentoCaixaId()
	{
		return $this->lancamento_caixa_id;
	}

	/**
	 * Get the [numero] column value.
	 * 
	 * @return     int
	 */
	public function getNumero()
	{
		return $this->numero;
	}

	/**
	 * Get the [optionally formatted] temporal [bom_para] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getBomPara($format = 'Y-m-d H:i:s')
	{
		if ($this->bom_para === null) {
			return null;
		}


		if ($this->bom_para === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->bom_para);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->bom_para, true), $x);
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
	 * Get the [valor] column value.
	 * 
	 * @return     double
	 */
	public function getValor()
	{
		return $this->valor;
	}

	/**
	 * Get the [optionally formatted] temporal [data_recebimento] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataRecebimento($format = 'Y-m-d H:i:s')
	{
		if ($this->data_recebimento === null) {
			return null;
		}


		if ($this->data_recebimento === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_recebimento);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_recebimento, true), $x);
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
	 * Get the [nome_cliente] column value.
	 * 
	 * @return     string
	 */
	public function getNomeCliente()
	{
		return $this->nome_cliente;
	}

	/**
	 * Get the [situacao] column value.
	 * 
	 * @return     string
	 */
	public function getSituacao()
	{
		return $this->situacao;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     DetalheCheque The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = DetalheChequePeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [banco_id] column.
	 * 
	 * @param      int $v new value
	 * @return     DetalheCheque The current object (for fluent API support)
	 */
	public function setBancoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->banco_id !== $v) {
			$this->banco_id = $v;
			$this->modifiedColumns[] = DetalheChequePeer::BANCO_ID;
		}

		if ($this->aBanco !== null && $this->aBanco->getId() !== $v) {
			$this->aBanco = null;
		}

		return $this;
	} // setBancoId()

	/**
	 * Set the value of [vendedor_id] column.
	 * 
	 * @param      int $v new value
	 * @return     DetalheCheque The current object (for fluent API support)
	 */
	public function setVendedorId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->vendedor_id !== $v) {
			$this->vendedor_id = $v;
			$this->modifiedColumns[] = DetalheChequePeer::VENDEDOR_ID;
		}

		return $this;
	} // setVendedorId()

	/**
	 * Set the value of [lancamento_caixa_id] column.
	 * 
	 * @param      int $v new value
	 * @return     DetalheCheque The current object (for fluent API support)
	 */
	public function setLancamentoCaixaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->lancamento_caixa_id !== $v) {
			$this->lancamento_caixa_id = $v;
			$this->modifiedColumns[] = DetalheChequePeer::LANCAMENTO_CAIXA_ID;
		}

		if ($this->aLancamentoCaixa !== null && $this->aLancamentoCaixa->getId() !== $v) {
			$this->aLancamentoCaixa = null;
		}

		return $this;
	} // setLancamentoCaixaId()

	/**
	 * Set the value of [numero] column.
	 * 
	 * @param      int $v new value
	 * @return     DetalheCheque The current object (for fluent API support)
	 */
	public function setNumero($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->numero !== $v) {
			$this->numero = $v;
			$this->modifiedColumns[] = DetalheChequePeer::NUMERO;
		}

		return $this;
	} // setNumero()

	/**
	 * Sets the value of [bom_para] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     DetalheCheque The current object (for fluent API support)
	 */
	public function setBomPara($v)
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

		if ( $this->bom_para !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->bom_para !== null && $tmpDt = new DateTime($this->bom_para)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->bom_para = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = DetalheChequePeer::BOM_PARA;
			}
		} // if either are not null

		return $this;
	} // setBomPara()

	/**
	 * Set the value of [valor] column.
	 * 
	 * @param      double $v new value
	 * @return     DetalheCheque The current object (for fluent API support)
	 */
	public function setValor($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->valor !== $v) {
			$this->valor = $v;
			$this->modifiedColumns[] = DetalheChequePeer::VALOR;
		}

		return $this;
	} // setValor()

	/**
	 * Sets the value of [data_recebimento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     DetalheCheque The current object (for fluent API support)
	 */
	public function setDataRecebimento($v)
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

		if ( $this->data_recebimento !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_recebimento !== null && $tmpDt = new DateTime($this->data_recebimento)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_recebimento = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = DetalheChequePeer::DATA_RECEBIMENTO;
			}
		} // if either are not null

		return $this;
	} // setDataRecebimento()

	/**
	 * Set the value of [nome_cliente] column.
	 * 
	 * @param      string $v new value
	 * @return     DetalheCheque The current object (for fluent API support)
	 */
	public function setNomeCliente($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome_cliente !== $v) {
			$this->nome_cliente = $v;
			$this->modifiedColumns[] = DetalheChequePeer::NOME_CLIENTE;
		}

		return $this;
	} // setNomeCliente()

	/**
	 * Set the value of [situacao] column.
	 * 
	 * @param      string $v new value
	 * @return     DetalheCheque The current object (for fluent API support)
	 */
	public function setSituacao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->situacao !== $v) {
			$this->situacao = $v;
			$this->modifiedColumns[] = DetalheChequePeer::SITUACAO;
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
			$this->banco_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->vendedor_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->lancamento_caixa_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->numero = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->bom_para = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->valor = ($row[$startcol + 6] !== null) ? (double) $row[$startcol + 6] : null;
			$this->data_recebimento = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->nome_cliente = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->situacao = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 10; // 10 = DetalheChequePeer::NUM_COLUMNS - DetalheChequePeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating DetalheCheque object", $e);
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

		if ($this->aBanco !== null && $this->banco_id !== $this->aBanco->getId()) {
			$this->aBanco = null;
		}
		if ($this->aLancamentoCaixa !== null && $this->lancamento_caixa_id !== $this->aLancamentoCaixa->getId()) {
			$this->aLancamentoCaixa = null;
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
			$con = Propel::getConnection(DetalheChequePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = DetalheChequePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aLancamentoCaixa = null;
			$this->aBanco = null;
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
			$con = Propel::getConnection(DetalheChequePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				DetalheChequePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(DetalheChequePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				DetalheChequePeer::addInstanceToPool($this);
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

			if ($this->aLancamentoCaixa !== null) {
				if ($this->aLancamentoCaixa->isModified() || $this->aLancamentoCaixa->isNew()) {
					$affectedRows += $this->aLancamentoCaixa->save($con);
				}
				$this->setLancamentoCaixa($this->aLancamentoCaixa);
			}

			if ($this->aBanco !== null) {
				if ($this->aBanco->isModified() || $this->aBanco->isNew()) {
					$affectedRows += $this->aBanco->save($con);
				}
				$this->setBanco($this->aBanco);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = DetalheChequePeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DetalheChequePeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += DetalheChequePeer::doUpdate($this, $con);
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

			if ($this->aLancamentoCaixa !== null) {
				if (!$this->aLancamentoCaixa->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLancamentoCaixa->getValidationFailures());
				}
			}

			if ($this->aBanco !== null) {
				if (!$this->aBanco->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aBanco->getValidationFailures());
				}
			}


			if (($retval = DetalheChequePeer::doValidate($this, $columns)) !== true) {
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
		$criteria = new Criteria(DetalheChequePeer::DATABASE_NAME);

		if ($this->isColumnModified(DetalheChequePeer::ID)) $criteria->add(DetalheChequePeer::ID, $this->id);
		if ($this->isColumnModified(DetalheChequePeer::BANCO_ID)) $criteria->add(DetalheChequePeer::BANCO_ID, $this->banco_id);
		if ($this->isColumnModified(DetalheChequePeer::VENDEDOR_ID)) $criteria->add(DetalheChequePeer::VENDEDOR_ID, $this->vendedor_id);
		if ($this->isColumnModified(DetalheChequePeer::LANCAMENTO_CAIXA_ID)) $criteria->add(DetalheChequePeer::LANCAMENTO_CAIXA_ID, $this->lancamento_caixa_id);
		if ($this->isColumnModified(DetalheChequePeer::NUMERO)) $criteria->add(DetalheChequePeer::NUMERO, $this->numero);
		if ($this->isColumnModified(DetalheChequePeer::BOM_PARA)) $criteria->add(DetalheChequePeer::BOM_PARA, $this->bom_para);
		if ($this->isColumnModified(DetalheChequePeer::VALOR)) $criteria->add(DetalheChequePeer::VALOR, $this->valor);
		if ($this->isColumnModified(DetalheChequePeer::DATA_RECEBIMENTO)) $criteria->add(DetalheChequePeer::DATA_RECEBIMENTO, $this->data_recebimento);
		if ($this->isColumnModified(DetalheChequePeer::NOME_CLIENTE)) $criteria->add(DetalheChequePeer::NOME_CLIENTE, $this->nome_cliente);
		if ($this->isColumnModified(DetalheChequePeer::SITUACAO)) $criteria->add(DetalheChequePeer::SITUACAO, $this->situacao);

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
		$criteria = new Criteria(DetalheChequePeer::DATABASE_NAME);

		$criteria->add(DetalheChequePeer::ID, $this->id);

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
	 * @param      object $copyObj An object of DetalheCheque (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setBancoId($this->banco_id);

		$copyObj->setVendedorId($this->vendedor_id);

		$copyObj->setLancamentoCaixaId($this->lancamento_caixa_id);

		$copyObj->setNumero($this->numero);

		$copyObj->setBomPara($this->bom_para);

		$copyObj->setValor($this->valor);

		$copyObj->setDataRecebimento($this->data_recebimento);

		$copyObj->setNomeCliente($this->nome_cliente);

		$copyObj->setSituacao($this->situacao);


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
	 * @return     DetalheCheque Clone of current object.
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
	 * @return     DetalheChequePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new DetalheChequePeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a LancamentoCaixa object.
	 *
	 * @param      LancamentoCaixa $v
	 * @return     DetalheCheque The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setLancamentoCaixa(LancamentoCaixa $v = null)
	{
		if ($v === null) {
			$this->setLancamentoCaixaId(NULL);
		} else {
			$this->setLancamentoCaixaId($v->getId());
		}

		$this->aLancamentoCaixa = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the LancamentoCaixa object, it will not be re-added.
		if ($v !== null) {
			$v->addDetalheCheque($this);
		}

		return $this;
	}


	/**
	 * Get the associated LancamentoCaixa object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     LancamentoCaixa The associated LancamentoCaixa object.
	 * @throws     PropelException
	 */
	public function getLancamentoCaixa(PropelPDO $con = null)
	{
		if ($this->aLancamentoCaixa === null && ($this->lancamento_caixa_id !== null)) {
			$this->aLancamentoCaixa = LancamentoCaixaPeer::retrieveByPk($this->lancamento_caixa_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aLancamentoCaixa->addDetalheCheques($this);
			 */
		}
		return $this->aLancamentoCaixa;
	}

	/**
	 * Declares an association between this object and a Banco object.
	 *
	 * @param      Banco $v
	 * @return     DetalheCheque The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setBanco(Banco $v = null)
	{
		if ($v === null) {
			$this->setBancoId(NULL);
		} else {
			$this->setBancoId($v->getId());
		}

		$this->aBanco = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Banco object, it will not be re-added.
		if ($v !== null) {
			$v->addDetalheCheque($this);
		}

		return $this;
	}


	/**
	 * Get the associated Banco object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Banco The associated Banco object.
	 * @throws     PropelException
	 */
	public function getBanco(PropelPDO $con = null)
	{
		if ($this->aBanco === null && ($this->banco_id !== null)) {
			$this->aBanco = BancoPeer::retrieveByPk($this->banco_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aBanco->addDetalheCheques($this);
			 */
		}
		return $this->aBanco;
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

			$this->aLancamentoCaixa = null;
			$this->aBanco = null;
	}

} // BaseDetalheCheque
