<?php

/**
 * Base class that represents a row from the 'pedido' table.
 *
 * 
 *
 * @package    pacoteComercial.om
 */
abstract class BasePedido extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        PedidoPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the cliente_id field.
	 * @var        int
	 */
	protected $cliente_id;

	/**
	 * The value for the forma_pagamento_id field.
	 * @var        int
	 */
	protected $forma_pagamento_id;

	/**
	 * The value for the funcionario_id field.
	 * @var        int
	 */
	protected $funcionario_id;

	/**
	 * The value for the data_pedido field.
	 * @var        string
	 */
	protected $data_pedido;

	/**
	 * The value for the desconto field.
	 * @var        double
	 */
	protected $desconto;

	/**
	 * The value for the observacao field.
	 * @var        string
	 */
	protected $observacao;

	/**
	 * The value for the situacao field.
	 * @var        int
	 */
	protected $situacao;

	/**
	 * The value for the data_confirmacao_pagamento field.
	 * @var        string
	 */
	protected $data_confirmacao_pagamento;

	/**
	 * @var        Cliente
	 */
	protected $aCliente;

	/**
	 * @var        FormaPagamento
	 */
	protected $aFormaPagamento;

	/**
	 * @var        array CertificadoPagamento[] Collection to store aggregation of CertificadoPagamento objects.
	 */
	protected $collCertificadoPagamentos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collCertificadoPagamentos.
	 */
	private $lastCertificadoPagamentoCriteria = null;

	/**
	 * @var        array Boleto[] Collection to store aggregation of Boleto objects.
	 */
	protected $collBoletos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collBoletos.
	 */
	private $lastBoletoCriteria = null;

	/**
	 * @var        array ItemPedido[] Collection to store aggregation of ItemPedido objects.
	 */
	protected $collItemPedidos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collItemPedidos.
	 */
	private $lastItemPedidoCriteria = null;

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
	 * Get the [cliente_id] column value.
	 * 
	 * @return     int
	 */
	public function getClienteId()
	{
		return $this->cliente_id;
	}

	/**
	 * Get the [forma_pagamento_id] column value.
	 * 
	 * @return     int
	 */
	public function getFormaPagamentoId()
	{
		return $this->forma_pagamento_id;
	}

	/**
	 * Get the [funcionario_id] column value.
	 * 
	 * @return     int
	 */
	public function getFuncionarioId()
	{
		return $this->funcionario_id;
	}

	/**
	 * Get the [optionally formatted] temporal [data_pedido] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataPedido($format = 'Y-m-d H:i:s')
	{
		if ($this->data_pedido === null) {
			return null;
		}


		if ($this->data_pedido === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_pedido);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_pedido, true), $x);
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
	 * Get the [desconto] column value.
	 * 
	 * @return     double
	 */
	public function getDesconto()
	{
		return $this->desconto;
	}

	/**
	 * Get the [observacao] column value.
	 * 
	 * @return     string
	 */
	public function getObservacao()
	{
		return $this->observacao;
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
	 * Get the [optionally formatted] temporal [data_confirmacao_pagamento] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataConfirmacaoPagamento($format = 'Y-m-d H:i:s')
	{
		if ($this->data_confirmacao_pagamento === null) {
			return null;
		}


		if ($this->data_confirmacao_pagamento === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_confirmacao_pagamento);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_confirmacao_pagamento, true), $x);
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
	 * @return     Pedido The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PedidoPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [cliente_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Pedido The current object (for fluent API support)
	 */
	public function setClienteId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->cliente_id !== $v) {
			$this->cliente_id = $v;
			$this->modifiedColumns[] = PedidoPeer::CLIENTE_ID;
		}

		if ($this->aCliente !== null && $this->aCliente->getId() !== $v) {
			$this->aCliente = null;
		}

		return $this;
	} // setClienteId()

	/**
	 * Set the value of [forma_pagamento_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Pedido The current object (for fluent API support)
	 */
	public function setFormaPagamentoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->forma_pagamento_id !== $v) {
			$this->forma_pagamento_id = $v;
			$this->modifiedColumns[] = PedidoPeer::FORMA_PAGAMENTO_ID;
		}

		if ($this->aFormaPagamento !== null && $this->aFormaPagamento->getId() !== $v) {
			$this->aFormaPagamento = null;
		}

		return $this;
	} // setFormaPagamentoId()

	/**
	 * Set the value of [funcionario_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Pedido The current object (for fluent API support)
	 */
	public function setFuncionarioId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->funcionario_id !== $v) {
			$this->funcionario_id = $v;
			$this->modifiedColumns[] = PedidoPeer::FUNCIONARIO_ID;
		}

		return $this;
	} // setFuncionarioId()

	/**
	 * Sets the value of [data_pedido] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Pedido The current object (for fluent API support)
	 */
	public function setDataPedido($v)
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

		if ( $this->data_pedido !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_pedido !== null && $tmpDt = new DateTime($this->data_pedido)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_pedido = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = PedidoPeer::DATA_PEDIDO;
			}
		} // if either are not null

		return $this;
	} // setDataPedido()

	/**
	 * Set the value of [desconto] column.
	 * 
	 * @param      double $v new value
	 * @return     Pedido The current object (for fluent API support)
	 */
	public function setDesconto($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->desconto !== $v) {
			$this->desconto = $v;
			$this->modifiedColumns[] = PedidoPeer::DESCONTO;
		}

		return $this;
	} // setDesconto()

	/**
	 * Set the value of [observacao] column.
	 * 
	 * @param      string $v new value
	 * @return     Pedido The current object (for fluent API support)
	 */
	public function setObservacao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->observacao !== $v) {
			$this->observacao = $v;
			$this->modifiedColumns[] = PedidoPeer::OBSERVACAO;
		}

		return $this;
	} // setObservacao()

	/**
	 * Set the value of [situacao] column.
	 * 
	 * @param      int $v new value
	 * @return     Pedido The current object (for fluent API support)
	 */
	public function setSituacao($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->situacao !== $v) {
			$this->situacao = $v;
			$this->modifiedColumns[] = PedidoPeer::SITUACAO;
		}

		return $this;
	} // setSituacao()

	/**
	 * Sets the value of [data_confirmacao_pagamento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Pedido The current object (for fluent API support)
	 */
	public function setDataConfirmacaoPagamento($v)
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

		if ( $this->data_confirmacao_pagamento !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_confirmacao_pagamento !== null && $tmpDt = new DateTime($this->data_confirmacao_pagamento)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_confirmacao_pagamento = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = PedidoPeer::DATA_CONFIRMACAO_PAGAMENTO;
			}
		} // if either are not null

		return $this;
	} // setDataConfirmacaoPagamento()

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
			$this->cliente_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->forma_pagamento_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->funcionario_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->data_pedido = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->desconto = ($row[$startcol + 5] !== null) ? (double) $row[$startcol + 5] : null;
			$this->observacao = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->situacao = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->data_confirmacao_pagamento = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 9; // 9 = PedidoPeer::NUM_COLUMNS - PedidoPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Pedido object", $e);
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

		if ($this->aCliente !== null && $this->cliente_id !== $this->aCliente->getId()) {
			$this->aCliente = null;
		}
		if ($this->aFormaPagamento !== null && $this->forma_pagamento_id !== $this->aFormaPagamento->getId()) {
			$this->aFormaPagamento = null;
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
			$con = Propel::getConnection(PedidoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = PedidoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aCliente = null;
			$this->aFormaPagamento = null;
			$this->collCertificadoPagamentos = null;
			$this->lastCertificadoPagamentoCriteria = null;

			$this->collBoletos = null;
			$this->lastBoletoCriteria = null;

			$this->collItemPedidos = null;
			$this->lastItemPedidoCriteria = null;

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
			$con = Propel::getConnection(PedidoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				PedidoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(PedidoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				PedidoPeer::addInstanceToPool($this);
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

			if ($this->aCliente !== null) {
				if ($this->aCliente->isModified() || $this->aCliente->isNew()) {
					$affectedRows += $this->aCliente->save($con);
				}
				$this->setCliente($this->aCliente);
			}

			if ($this->aFormaPagamento !== null) {
				if ($this->aFormaPagamento->isModified() || $this->aFormaPagamento->isNew()) {
					$affectedRows += $this->aFormaPagamento->save($con);
				}
				$this->setFormaPagamento($this->aFormaPagamento);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = PedidoPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = PedidoPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += PedidoPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collCertificadoPagamentos !== null) {
				foreach ($this->collCertificadoPagamentos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collBoletos !== null) {
				foreach ($this->collBoletos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collItemPedidos !== null) {
				foreach ($this->collItemPedidos as $referrerFK) {
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


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aCliente !== null) {
				if (!$this->aCliente->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCliente->getValidationFailures());
				}
			}

			if ($this->aFormaPagamento !== null) {
				if (!$this->aFormaPagamento->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFormaPagamento->getValidationFailures());
				}
			}


			if (($retval = PedidoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCertificadoPagamentos !== null) {
					foreach ($this->collCertificadoPagamentos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collBoletos !== null) {
					foreach ($this->collBoletos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collItemPedidos !== null) {
					foreach ($this->collItemPedidos as $referrerFK) {
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
		$criteria = new Criteria(PedidoPeer::DATABASE_NAME);

		if ($this->isColumnModified(PedidoPeer::ID)) $criteria->add(PedidoPeer::ID, $this->id);
		if ($this->isColumnModified(PedidoPeer::CLIENTE_ID)) $criteria->add(PedidoPeer::CLIENTE_ID, $this->cliente_id);
		if ($this->isColumnModified(PedidoPeer::FORMA_PAGAMENTO_ID)) $criteria->add(PedidoPeer::FORMA_PAGAMENTO_ID, $this->forma_pagamento_id);
		if ($this->isColumnModified(PedidoPeer::FUNCIONARIO_ID)) $criteria->add(PedidoPeer::FUNCIONARIO_ID, $this->funcionario_id);
		if ($this->isColumnModified(PedidoPeer::DATA_PEDIDO)) $criteria->add(PedidoPeer::DATA_PEDIDO, $this->data_pedido);
		if ($this->isColumnModified(PedidoPeer::DESCONTO)) $criteria->add(PedidoPeer::DESCONTO, $this->desconto);
		if ($this->isColumnModified(PedidoPeer::OBSERVACAO)) $criteria->add(PedidoPeer::OBSERVACAO, $this->observacao);
		if ($this->isColumnModified(PedidoPeer::SITUACAO)) $criteria->add(PedidoPeer::SITUACAO, $this->situacao);
		if ($this->isColumnModified(PedidoPeer::DATA_CONFIRMACAO_PAGAMENTO)) $criteria->add(PedidoPeer::DATA_CONFIRMACAO_PAGAMENTO, $this->data_confirmacao_pagamento);

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
		$criteria = new Criteria(PedidoPeer::DATABASE_NAME);

		$criteria->add(PedidoPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Pedido (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setClienteId($this->cliente_id);

		$copyObj->setFormaPagamentoId($this->forma_pagamento_id);

		$copyObj->setFuncionarioId($this->funcionario_id);

		$copyObj->setDataPedido($this->data_pedido);

		$copyObj->setDesconto($this->desconto);

		$copyObj->setObservacao($this->observacao);

		$copyObj->setSituacao($this->situacao);

		$copyObj->setDataConfirmacaoPagamento($this->data_confirmacao_pagamento);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getCertificadoPagamentos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCertificadoPagamento($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getBoletos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addBoleto($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getItemPedidos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addItemPedido($relObj->copy($deepCopy));
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
	 * @return     Pedido Clone of current object.
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
	 * @return     PedidoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new PedidoPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Cliente object.
	 *
	 * @param      Cliente $v
	 * @return     Pedido The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setCliente(Cliente $v = null)
	{
		if ($v === null) {
			$this->setClienteId(NULL);
		} else {
			$this->setClienteId($v->getId());
		}

		$this->aCliente = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Cliente object, it will not be re-added.
		if ($v !== null) {
			$v->addPedido($this);
		}

		return $this;
	}


	/**
	 * Get the associated Cliente object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Cliente The associated Cliente object.
	 * @throws     PropelException
	 */
	public function getCliente(PropelPDO $con = null)
	{
		if ($this->aCliente === null && ($this->cliente_id !== null)) {
			$this->aCliente = ClientePeer::retrieveByPk($this->cliente_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aCliente->addPedidos($this);
			 */
		}
		return $this->aCliente;
	}

	/**
	 * Declares an association between this object and a FormaPagamento object.
	 *
	 * @param      FormaPagamento $v
	 * @return     Pedido The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setFormaPagamento(FormaPagamento $v = null)
	{
		if ($v === null) {
			$this->setFormaPagamentoId(NULL);
		} else {
			$this->setFormaPagamentoId($v->getId());
		}

		$this->aFormaPagamento = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the FormaPagamento object, it will not be re-added.
		if ($v !== null) {
			$v->addPedido($this);
		}

		return $this;
	}


	/**
	 * Get the associated FormaPagamento object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     FormaPagamento The associated FormaPagamento object.
	 * @throws     PropelException
	 */
	public function getFormaPagamento(PropelPDO $con = null)
	{
		if ($this->aFormaPagamento === null && ($this->forma_pagamento_id !== null)) {
			$this->aFormaPagamento = FormaPagamentoPeer::retrieveByPk($this->forma_pagamento_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aFormaPagamento->addPedidos($this);
			 */
		}
		return $this->aFormaPagamento;
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
	 * Otherwise if this Pedido has previously been saved, it will retrieve
	 * related CertificadoPagamentos from storage. If this Pedido is new, it will return
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
			$criteria = new Criteria(PedidoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadoPagamentos === null) {
			if ($this->isNew()) {
			   $this->collCertificadoPagamentos = array();
			} else {

				$criteria->add(CertificadoPagamentoPeer::PEDIDO_ID, $this->id);

				CertificadoPagamentoPeer::addSelectColumns($criteria);
				$this->collCertificadoPagamentos = CertificadoPagamentoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(CertificadoPagamentoPeer::PEDIDO_ID, $this->id);

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
			$criteria = new Criteria(PedidoPeer::DATABASE_NAME);
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

				$criteria->add(CertificadoPagamentoPeer::PEDIDO_ID, $this->id);

				$count = CertificadoPagamentoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(CertificadoPagamentoPeer::PEDIDO_ID, $this->id);

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
			$l->setPedido($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Pedido is new, it will return
	 * an empty collection; or if this Pedido has previously
	 * been saved, it will retrieve related CertificadoPagamentos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Pedido.
	 */
	public function getCertificadoPagamentosJoinCertificado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PedidoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadoPagamentos === null) {
			if ($this->isNew()) {
				$this->collCertificadoPagamentos = array();
			} else {

				$criteria->add(CertificadoPagamentoPeer::PEDIDO_ID, $this->id);

				$this->collCertificadoPagamentos = CertificadoPagamentoPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPagamentoPeer::PEDIDO_ID, $this->id);

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
	 * Otherwise if this Pedido is new, it will return
	 * an empty collection; or if this Pedido has previously
	 * been saved, it will retrieve related CertificadoPagamentos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Pedido.
	 */
	public function getCertificadoPagamentosJoinFormaPagamento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PedidoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCertificadoPagamentos === null) {
			if ($this->isNew()) {
				$this->collCertificadoPagamentos = array();
			} else {

				$criteria->add(CertificadoPagamentoPeer::PEDIDO_ID, $this->id);

				$this->collCertificadoPagamentos = CertificadoPagamentoPeer::doSelectJoinFormaPagamento($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(CertificadoPagamentoPeer::PEDIDO_ID, $this->id);

			if (!isset($this->lastCertificadoPagamentoCriteria) || !$this->lastCertificadoPagamentoCriteria->equals($criteria)) {
				$this->collCertificadoPagamentos = CertificadoPagamentoPeer::doSelectJoinFormaPagamento($criteria, $con, $join_behavior);
			}
		}
		$this->lastCertificadoPagamentoCriteria = $criteria;

		return $this->collCertificadoPagamentos;
	}

	/**
	 * Clears out the collBoletos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addBoletos()
	 */
	public function clearBoletos()
	{
		$this->collBoletos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collBoletos collection (array).
	 *
	 * By default this just sets the collBoletos collection to an empty array (like clearcollBoletos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initBoletos()
	{
		$this->collBoletos = array();
	}

	/**
	 * Gets an array of Boleto objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Pedido has previously been saved, it will retrieve
	 * related Boletos from storage. If this Pedido is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array Boleto[]
	 * @throws     PropelException
	 */
	public function getBoletos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PedidoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletos === null) {
			if ($this->isNew()) {
			   $this->collBoletos = array();
			} else {

				$criteria->add(BoletoPeer::PEDIDO_ID, $this->id);

				BoletoPeer::addSelectColumns($criteria);
				$this->collBoletos = BoletoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(BoletoPeer::PEDIDO_ID, $this->id);

				BoletoPeer::addSelectColumns($criteria);
				if (!isset($this->lastBoletoCriteria) || !$this->lastBoletoCriteria->equals($criteria)) {
					$this->collBoletos = BoletoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastBoletoCriteria = $criteria;
		return $this->collBoletos;
	}

	/**
	 * Returns the number of related Boleto objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Boleto objects.
	 * @throws     PropelException
	 */
	public function countBoletos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PedidoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collBoletos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(BoletoPeer::PEDIDO_ID, $this->id);

				$count = BoletoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(BoletoPeer::PEDIDO_ID, $this->id);

				if (!isset($this->lastBoletoCriteria) || !$this->lastBoletoCriteria->equals($criteria)) {
					$count = BoletoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collBoletos);
				}
			} else {
				$count = count($this->collBoletos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a Boleto object to this object
	 * through the Boleto foreign key attribute.
	 *
	 * @param      Boleto $l Boleto
	 * @return     void
	 * @throws     PropelException
	 */
	public function addBoleto(Boleto $l)
	{
		if ($this->collBoletos === null) {
			$this->initBoletos();
		}
		if (!in_array($l, $this->collBoletos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collBoletos, $l);
			$l->setPedido($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Pedido is new, it will return
	 * an empty collection; or if this Pedido has previously
	 * been saved, it will retrieve related Boletos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Pedido.
	 */
	public function getBoletosJoinCertificado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PedidoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletos === null) {
			if ($this->isNew()) {
				$this->collBoletos = array();
			} else {

				$criteria->add(BoletoPeer::PEDIDO_ID, $this->id);

				$this->collBoletos = BoletoPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(BoletoPeer::PEDIDO_ID, $this->id);

			if (!isset($this->lastBoletoCriteria) || !$this->lastBoletoCriteria->equals($criteria)) {
				$this->collBoletos = BoletoPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		}
		$this->lastBoletoCriteria = $criteria;

		return $this->collBoletos;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Pedido is new, it will return
	 * an empty collection; or if this Pedido has previously
	 * been saved, it will retrieve related Boletos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Pedido.
	 */
	public function getBoletosJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PedidoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletos === null) {
			if ($this->isNew()) {
				$this->collBoletos = array();
			} else {

				$criteria->add(BoletoPeer::PEDIDO_ID, $this->id);

				$this->collBoletos = BoletoPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(BoletoPeer::PEDIDO_ID, $this->id);

			if (!isset($this->lastBoletoCriteria) || !$this->lastBoletoCriteria->equals($criteria)) {
				$this->collBoletos = BoletoPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		}
		$this->lastBoletoCriteria = $criteria;

		return $this->collBoletos;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Pedido is new, it will return
	 * an empty collection; or if this Pedido has previously
	 * been saved, it will retrieve related Boletos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Pedido.
	 */
	public function getBoletosJoinContasReceber($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PedidoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletos === null) {
			if ($this->isNew()) {
				$this->collBoletos = array();
			} else {

				$criteria->add(BoletoPeer::PEDIDO_ID, $this->id);

				$this->collBoletos = BoletoPeer::doSelectJoinContasReceber($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(BoletoPeer::PEDIDO_ID, $this->id);

			if (!isset($this->lastBoletoCriteria) || !$this->lastBoletoCriteria->equals($criteria)) {
				$this->collBoletos = BoletoPeer::doSelectJoinContasReceber($criteria, $con, $join_behavior);
			}
		}
		$this->lastBoletoCriteria = $criteria;

		return $this->collBoletos;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Pedido is new, it will return
	 * an empty collection; or if this Pedido has previously
	 * been saved, it will retrieve related Boletos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Pedido.
	 */
	public function getBoletosJoinCliente($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PedidoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBoletos === null) {
			if ($this->isNew()) {
				$this->collBoletos = array();
			} else {

				$criteria->add(BoletoPeer::PEDIDO_ID, $this->id);

				$this->collBoletos = BoletoPeer::doSelectJoinCliente($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(BoletoPeer::PEDIDO_ID, $this->id);

			if (!isset($this->lastBoletoCriteria) || !$this->lastBoletoCriteria->equals($criteria)) {
				$this->collBoletos = BoletoPeer::doSelectJoinCliente($criteria, $con, $join_behavior);
			}
		}
		$this->lastBoletoCriteria = $criteria;

		return $this->collBoletos;
	}

	/**
	 * Clears out the collItemPedidos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addItemPedidos()
	 */
	public function clearItemPedidos()
	{
		$this->collItemPedidos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collItemPedidos collection (array).
	 *
	 * By default this just sets the collItemPedidos collection to an empty array (like clearcollItemPedidos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initItemPedidos()
	{
		$this->collItemPedidos = array();
	}

	/**
	 * Gets an array of ItemPedido objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Pedido has previously been saved, it will retrieve
	 * related ItemPedidos from storage. If this Pedido is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ItemPedido[]
	 * @throws     PropelException
	 */
	public function getItemPedidos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PedidoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItemPedidos === null) {
			if ($this->isNew()) {
			   $this->collItemPedidos = array();
			} else {

				$criteria->add(ItemPedidoPeer::PEDIDO_ID, $this->id);

				ItemPedidoPeer::addSelectColumns($criteria);
				$this->collItemPedidos = ItemPedidoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ItemPedidoPeer::PEDIDO_ID, $this->id);

				ItemPedidoPeer::addSelectColumns($criteria);
				if (!isset($this->lastItemPedidoCriteria) || !$this->lastItemPedidoCriteria->equals($criteria)) {
					$this->collItemPedidos = ItemPedidoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastItemPedidoCriteria = $criteria;
		return $this->collItemPedidos;
	}

	/**
	 * Returns the number of related ItemPedido objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ItemPedido objects.
	 * @throws     PropelException
	 */
	public function countItemPedidos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PedidoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collItemPedidos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ItemPedidoPeer::PEDIDO_ID, $this->id);

				$count = ItemPedidoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ItemPedidoPeer::PEDIDO_ID, $this->id);

				if (!isset($this->lastItemPedidoCriteria) || !$this->lastItemPedidoCriteria->equals($criteria)) {
					$count = ItemPedidoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collItemPedidos);
				}
			} else {
				$count = count($this->collItemPedidos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a ItemPedido object to this object
	 * through the ItemPedido foreign key attribute.
	 *
	 * @param      ItemPedido $l ItemPedido
	 * @return     void
	 * @throws     PropelException
	 */
	public function addItemPedido(ItemPedido $l)
	{
		if ($this->collItemPedidos === null) {
			$this->initItemPedidos();
		}
		if (!in_array($l, $this->collItemPedidos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collItemPedidos, $l);
			$l->setPedido($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Pedido is new, it will return
	 * an empty collection; or if this Pedido has previously
	 * been saved, it will retrieve related ItemPedidos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Pedido.
	 */
	public function getItemPedidosJoinProduto($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PedidoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItemPedidos === null) {
			if ($this->isNew()) {
				$this->collItemPedidos = array();
			} else {

				$criteria->add(ItemPedidoPeer::PEDIDO_ID, $this->id);

				$this->collItemPedidos = ItemPedidoPeer::doSelectJoinProduto($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ItemPedidoPeer::PEDIDO_ID, $this->id);

			if (!isset($this->lastItemPedidoCriteria) || !$this->lastItemPedidoCriteria->equals($criteria)) {
				$this->collItemPedidos = ItemPedidoPeer::doSelectJoinProduto($criteria, $con, $join_behavior);
			}
		}
		$this->lastItemPedidoCriteria = $criteria;

		return $this->collItemPedidos;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Pedido is new, it will return
	 * an empty collection; or if this Pedido has previously
	 * been saved, it will retrieve related ItemPedidos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Pedido.
	 */
	public function getItemPedidosJoinCertificado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PedidoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItemPedidos === null) {
			if ($this->isNew()) {
				$this->collItemPedidos = array();
			} else {

				$criteria->add(ItemPedidoPeer::PEDIDO_ID, $this->id);

				$this->collItemPedidos = ItemPedidoPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ItemPedidoPeer::PEDIDO_ID, $this->id);

			if (!isset($this->lastItemPedidoCriteria) || !$this->lastItemPedidoCriteria->equals($criteria)) {
				$this->collItemPedidos = ItemPedidoPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		}
		$this->lastItemPedidoCriteria = $criteria;

		return $this->collItemPedidos;
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
	 * Otherwise if this Pedido has previously been saved, it will retrieve
	 * related ContasRecebers from storage. If this Pedido is new, it will return
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
			$criteria = new Criteria(PedidoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasRecebers === null) {
			if ($this->isNew()) {
			   $this->collContasRecebers = array();
			} else {

				$criteria->add(ContasReceberPeer::PEDIDO_ID, $this->id);

				ContasReceberPeer::addSelectColumns($criteria);
				$this->collContasRecebers = ContasReceberPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ContasReceberPeer::PEDIDO_ID, $this->id);

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
			$criteria = new Criteria(PedidoPeer::DATABASE_NAME);
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

				$criteria->add(ContasReceberPeer::PEDIDO_ID, $this->id);

				$count = ContasReceberPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ContasReceberPeer::PEDIDO_ID, $this->id);

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
			$l->setPedido($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Pedido is new, it will return
	 * an empty collection; or if this Pedido has previously
	 * been saved, it will retrieve related ContasRecebers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Pedido.
	 */
	public function getContasRecebersJoinBanco($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PedidoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasRecebers === null) {
			if ($this->isNew()) {
				$this->collContasRecebers = array();
			} else {

				$criteria->add(ContasReceberPeer::PEDIDO_ID, $this->id);

				$this->collContasRecebers = ContasReceberPeer::doSelectJoinBanco($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContasReceberPeer::PEDIDO_ID, $this->id);

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
	 * Otherwise if this Pedido is new, it will return
	 * an empty collection; or if this Pedido has previously
	 * been saved, it will retrieve related ContasRecebers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Pedido.
	 */
	public function getContasRecebersJoinContaContabil($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PedidoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasRecebers === null) {
			if ($this->isNew()) {
				$this->collContasRecebers = array();
			} else {

				$criteria->add(ContasReceberPeer::PEDIDO_ID, $this->id);

				$this->collContasRecebers = ContasReceberPeer::doSelectJoinContaContabil($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContasReceberPeer::PEDIDO_ID, $this->id);

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
	 * Otherwise if this Pedido is new, it will return
	 * an empty collection; or if this Pedido has previously
	 * been saved, it will retrieve related ContasRecebers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Pedido.
	 */
	public function getContasRecebersJoinCertificado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PedidoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasRecebers === null) {
			if ($this->isNew()) {
				$this->collContasRecebers = array();
			} else {

				$criteria->add(ContasReceberPeer::PEDIDO_ID, $this->id);

				$this->collContasRecebers = ContasReceberPeer::doSelectJoinCertificado($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContasReceberPeer::PEDIDO_ID, $this->id);

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
	 * Otherwise if this Pedido is new, it will return
	 * an empty collection; or if this Pedido has previously
	 * been saved, it will retrieve related ContasRecebers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Pedido.
	 */
	public function getContasRecebersJoinFormaPagamento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(PedidoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasRecebers === null) {
			if ($this->isNew()) {
				$this->collContasRecebers = array();
			} else {

				$criteria->add(ContasReceberPeer::PEDIDO_ID, $this->id);

				$this->collContasRecebers = ContasReceberPeer::doSelectJoinFormaPagamento($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContasReceberPeer::PEDIDO_ID, $this->id);

			if (!isset($this->lastContasReceberCriteria) || !$this->lastContasReceberCriteria->equals($criteria)) {
				$this->collContasRecebers = ContasReceberPeer::doSelectJoinFormaPagamento($criteria, $con, $join_behavior);
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
			if ($this->collCertificadoPagamentos) {
				foreach ((array) $this->collCertificadoPagamentos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collBoletos) {
				foreach ((array) $this->collBoletos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collItemPedidos) {
				foreach ((array) $this->collItemPedidos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collContasRecebers) {
				foreach ((array) $this->collContasRecebers as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collCertificadoPagamentos = null;
		$this->collBoletos = null;
		$this->collItemPedidos = null;
		$this->collContasRecebers = null;
			$this->aCliente = null;
			$this->aFormaPagamento = null;
	}

} // BasePedido
