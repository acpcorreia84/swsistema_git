<?php

/**
 * Base class that represents a row from the 'cupons_desconto_certificado' table.
 *
 * 
 *
 * @package    pacoteCertificado.om
 */
abstract class BaseCuponsDescontoCertificado extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        CuponsDescontoCertificadoPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the produto_id field.
	 * @var        int
	 */
	protected $produto_id;

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
	 * The value for the usuario_autorizacao_id field.
	 * @var        int
	 */
	protected $usuario_autorizacao_id;

	/**
	 * The value for the usado field.
	 * @var        int
	 */
	protected $usado;

	/**
	 * The value for the vencimento field.
	 * @var        string
	 */
	protected $vencimento;

	/**
	 * The value for the cpf_cnpj field.
	 * @var        string
	 */
	protected $cpf_cnpj;

	/**
	 * The value for the desconto field.
	 * @var        double
	 */
	protected $desconto;

	/**
	 * The value for the codigo_desconto field.
	 * @var        string
	 */
	protected $codigo_desconto;

	/**
	 * The value for the motivo field.
	 * @var        string
	 */
	protected $motivo;

	/**
	 * The value for the email_cliente field.
	 * @var        string
	 */
	protected $email_cliente;

	/**
	 * The value for the autorizado field.
	 * @var        int
	 */
	protected $autorizado;

	/**
	 * The value for the motivo_autorizacao field.
	 * @var        string
	 */
	protected $motivo_autorizacao;

	/**
	 * @var        Produto
	 */
	protected $aProduto;

	/**
	 * @var        Usuario
	 */
	protected $aUsuarioRelatedByUsuarioId;

	/**
	 * @var        Certificado
	 */
	protected $aCertificado;

	/**
	 * @var        Usuario
	 */
	protected $aUsuarioRelatedByUsuarioAutorizacaoId;

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
	 * Get the [produto_id] column value.
	 * 
	 * @return     int
	 */
	public function getProdutoId()
	{
		return $this->produto_id;
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
	 * Get the [usuario_autorizacao_id] column value.
	 * 
	 * @return     int
	 */
	public function getUsuarioAutorizacaoId()
	{
		return $this->usuario_autorizacao_id;
	}

	/**
	 * Get the [usado] column value.
	 * 
	 * @return     int
	 */
	public function getUsado()
	{
		return $this->usado;
	}

	/**
	 * Get the [optionally formatted] temporal [vencimento] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getVencimento($format = '%x')
	{
		if ($this->vencimento === null) {
			return null;
		}


		if ($this->vencimento === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->vencimento);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->vencimento, true), $x);
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
	 * Get the [cpf_cnpj] column value.
	 * 
	 * @return     string
	 */
	public function getCpfCnpj()
	{
		return $this->cpf_cnpj;
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
	 * Get the [codigo_desconto] column value.
	 * 
	 * @return     string
	 */
	public function getCodigoDesconto()
	{
		return $this->codigo_desconto;
	}

	/**
	 * Get the [motivo] column value.
	 * 
	 * @return     string
	 */
	public function getMotivo()
	{
		return $this->motivo;
	}

	/**
	 * Get the [email_cliente] column value.
	 * 
	 * @return     string
	 */
	public function getEmailCliente()
	{
		return $this->email_cliente;
	}

	/**
	 * Get the [autorizado] column value.
	 * 
	 * @return     int
	 */
	public function getAutorizado()
	{
		return $this->autorizado;
	}

	/**
	 * Get the [motivo_autorizacao] column value.
	 * 
	 * @return     string
	 */
	public function getMotivoAutorizacao()
	{
		return $this->motivo_autorizacao;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     CuponsDescontoCertificado The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CuponsDescontoCertificadoPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [produto_id] column.
	 * 
	 * @param      int $v new value
	 * @return     CuponsDescontoCertificado The current object (for fluent API support)
	 */
	public function setProdutoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->produto_id !== $v) {
			$this->produto_id = $v;
			$this->modifiedColumns[] = CuponsDescontoCertificadoPeer::PRODUTO_ID;
		}

		if ($this->aProduto !== null && $this->aProduto->getId() !== $v) {
			$this->aProduto = null;
		}

		return $this;
	} // setProdutoId()

	/**
	 * Set the value of [usuario_id] column.
	 * 
	 * @param      int $v new value
	 * @return     CuponsDescontoCertificado The current object (for fluent API support)
	 */
	public function setUsuarioId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->usuario_id !== $v) {
			$this->usuario_id = $v;
			$this->modifiedColumns[] = CuponsDescontoCertificadoPeer::USUARIO_ID;
		}

		if ($this->aUsuarioRelatedByUsuarioId !== null && $this->aUsuarioRelatedByUsuarioId->getId() !== $v) {
			$this->aUsuarioRelatedByUsuarioId = null;
		}

		return $this;
	} // setUsuarioId()

	/**
	 * Set the value of [certificado_id] column.
	 * 
	 * @param      int $v new value
	 * @return     CuponsDescontoCertificado The current object (for fluent API support)
	 */
	public function setCertificadoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->certificado_id !== $v) {
			$this->certificado_id = $v;
			$this->modifiedColumns[] = CuponsDescontoCertificadoPeer::CERTIFICADO_ID;
		}

		if ($this->aCertificado !== null && $this->aCertificado->getId() !== $v) {
			$this->aCertificado = null;
		}

		return $this;
	} // setCertificadoId()

	/**
	 * Set the value of [usuario_autorizacao_id] column.
	 * 
	 * @param      int $v new value
	 * @return     CuponsDescontoCertificado The current object (for fluent API support)
	 */
	public function setUsuarioAutorizacaoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->usuario_autorizacao_id !== $v) {
			$this->usuario_autorizacao_id = $v;
			$this->modifiedColumns[] = CuponsDescontoCertificadoPeer::USUARIO_AUTORIZACAO_ID;
		}

		if ($this->aUsuarioRelatedByUsuarioAutorizacaoId !== null && $this->aUsuarioRelatedByUsuarioAutorizacaoId->getId() !== $v) {
			$this->aUsuarioRelatedByUsuarioAutorizacaoId = null;
		}

		return $this;
	} // setUsuarioAutorizacaoId()

	/**
	 * Set the value of [usado] column.
	 * 
	 * @param      int $v new value
	 * @return     CuponsDescontoCertificado The current object (for fluent API support)
	 */
	public function setUsado($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->usado !== $v) {
			$this->usado = $v;
			$this->modifiedColumns[] = CuponsDescontoCertificadoPeer::USADO;
		}

		return $this;
	} // setUsado()

	/**
	 * Sets the value of [vencimento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     CuponsDescontoCertificado The current object (for fluent API support)
	 */
	public function setVencimento($v)
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

		if ( $this->vencimento !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->vencimento !== null && $tmpDt = new DateTime($this->vencimento)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->vencimento = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = CuponsDescontoCertificadoPeer::VENCIMENTO;
			}
		} // if either are not null

		return $this;
	} // setVencimento()

	/**
	 * Set the value of [cpf_cnpj] column.
	 * 
	 * @param      string $v new value
	 * @return     CuponsDescontoCertificado The current object (for fluent API support)
	 */
	public function setCpfCnpj($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cpf_cnpj !== $v) {
			$this->cpf_cnpj = $v;
			$this->modifiedColumns[] = CuponsDescontoCertificadoPeer::CPF_CNPJ;
		}

		return $this;
	} // setCpfCnpj()

	/**
	 * Set the value of [desconto] column.
	 * 
	 * @param      double $v new value
	 * @return     CuponsDescontoCertificado The current object (for fluent API support)
	 */
	public function setDesconto($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->desconto !== $v) {
			$this->desconto = $v;
			$this->modifiedColumns[] = CuponsDescontoCertificadoPeer::DESCONTO;
		}

		return $this;
	} // setDesconto()

	/**
	 * Set the value of [codigo_desconto] column.
	 * 
	 * @param      string $v new value
	 * @return     CuponsDescontoCertificado The current object (for fluent API support)
	 */
	public function setCodigoDesconto($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->codigo_desconto !== $v) {
			$this->codigo_desconto = $v;
			$this->modifiedColumns[] = CuponsDescontoCertificadoPeer::CODIGO_DESCONTO;
		}

		return $this;
	} // setCodigoDesconto()

	/**
	 * Set the value of [motivo] column.
	 * 
	 * @param      string $v new value
	 * @return     CuponsDescontoCertificado The current object (for fluent API support)
	 */
	public function setMotivo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->motivo !== $v) {
			$this->motivo = $v;
			$this->modifiedColumns[] = CuponsDescontoCertificadoPeer::MOTIVO;
		}

		return $this;
	} // setMotivo()

	/**
	 * Set the value of [email_cliente] column.
	 * 
	 * @param      string $v new value
	 * @return     CuponsDescontoCertificado The current object (for fluent API support)
	 */
	public function setEmailCliente($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email_cliente !== $v) {
			$this->email_cliente = $v;
			$this->modifiedColumns[] = CuponsDescontoCertificadoPeer::EMAIL_CLIENTE;
		}

		return $this;
	} // setEmailCliente()

	/**
	 * Set the value of [autorizado] column.
	 * 
	 * @param      int $v new value
	 * @return     CuponsDescontoCertificado The current object (for fluent API support)
	 */
	public function setAutorizado($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->autorizado !== $v) {
			$this->autorizado = $v;
			$this->modifiedColumns[] = CuponsDescontoCertificadoPeer::AUTORIZADO;
		}

		return $this;
	} // setAutorizado()

	/**
	 * Set the value of [motivo_autorizacao] column.
	 * 
	 * @param      string $v new value
	 * @return     CuponsDescontoCertificado The current object (for fluent API support)
	 */
	public function setMotivoAutorizacao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->motivo_autorizacao !== $v) {
			$this->motivo_autorizacao = $v;
			$this->modifiedColumns[] = CuponsDescontoCertificadoPeer::MOTIVO_AUTORIZACAO;
		}

		return $this;
	} // setMotivoAutorizacao()

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
			$this->produto_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->usuario_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->certificado_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->usuario_autorizacao_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->usado = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->vencimento = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->cpf_cnpj = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->desconto = ($row[$startcol + 8] !== null) ? (double) $row[$startcol + 8] : null;
			$this->codigo_desconto = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->motivo = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->email_cliente = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->autorizado = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
			$this->motivo_autorizacao = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 14; // 14 = CuponsDescontoCertificadoPeer::NUM_COLUMNS - CuponsDescontoCertificadoPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating CuponsDescontoCertificado object", $e);
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

		if ($this->aProduto !== null && $this->produto_id !== $this->aProduto->getId()) {
			$this->aProduto = null;
		}
		if ($this->aUsuarioRelatedByUsuarioId !== null && $this->usuario_id !== $this->aUsuarioRelatedByUsuarioId->getId()) {
			$this->aUsuarioRelatedByUsuarioId = null;
		}
		if ($this->aCertificado !== null && $this->certificado_id !== $this->aCertificado->getId()) {
			$this->aCertificado = null;
		}
		if ($this->aUsuarioRelatedByUsuarioAutorizacaoId !== null && $this->usuario_autorizacao_id !== $this->aUsuarioRelatedByUsuarioAutorizacaoId->getId()) {
			$this->aUsuarioRelatedByUsuarioAutorizacaoId = null;
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
			$con = Propel::getConnection(CuponsDescontoCertificadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = CuponsDescontoCertificadoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aProduto = null;
			$this->aUsuarioRelatedByUsuarioId = null;
			$this->aCertificado = null;
			$this->aUsuarioRelatedByUsuarioAutorizacaoId = null;
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
			$con = Propel::getConnection(CuponsDescontoCertificadoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				CuponsDescontoCertificadoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CuponsDescontoCertificadoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				CuponsDescontoCertificadoPeer::addInstanceToPool($this);
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

			if ($this->aProduto !== null) {
				if ($this->aProduto->isModified() || $this->aProduto->isNew()) {
					$affectedRows += $this->aProduto->save($con);
				}
				$this->setProduto($this->aProduto);
			}

			if ($this->aUsuarioRelatedByUsuarioId !== null) {
				if ($this->aUsuarioRelatedByUsuarioId->isModified() || $this->aUsuarioRelatedByUsuarioId->isNew()) {
					$affectedRows += $this->aUsuarioRelatedByUsuarioId->save($con);
				}
				$this->setUsuarioRelatedByUsuarioId($this->aUsuarioRelatedByUsuarioId);
			}

			if ($this->aCertificado !== null) {
				if ($this->aCertificado->isModified() || $this->aCertificado->isNew()) {
					$affectedRows += $this->aCertificado->save($con);
				}
				$this->setCertificado($this->aCertificado);
			}

			if ($this->aUsuarioRelatedByUsuarioAutorizacaoId !== null) {
				if ($this->aUsuarioRelatedByUsuarioAutorizacaoId->isModified() || $this->aUsuarioRelatedByUsuarioAutorizacaoId->isNew()) {
					$affectedRows += $this->aUsuarioRelatedByUsuarioAutorizacaoId->save($con);
				}
				$this->setUsuarioRelatedByUsuarioAutorizacaoId($this->aUsuarioRelatedByUsuarioAutorizacaoId);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = CuponsDescontoCertificadoPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CuponsDescontoCertificadoPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += CuponsDescontoCertificadoPeer::doUpdate($this, $con);
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

			if ($this->aProduto !== null) {
				if (!$this->aProduto->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProduto->getValidationFailures());
				}
			}

			if ($this->aUsuarioRelatedByUsuarioId !== null) {
				if (!$this->aUsuarioRelatedByUsuarioId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUsuarioRelatedByUsuarioId->getValidationFailures());
				}
			}

			if ($this->aCertificado !== null) {
				if (!$this->aCertificado->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCertificado->getValidationFailures());
				}
			}

			if ($this->aUsuarioRelatedByUsuarioAutorizacaoId !== null) {
				if (!$this->aUsuarioRelatedByUsuarioAutorizacaoId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUsuarioRelatedByUsuarioAutorizacaoId->getValidationFailures());
				}
			}


			if (($retval = CuponsDescontoCertificadoPeer::doValidate($this, $columns)) !== true) {
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
		$criteria = new Criteria(CuponsDescontoCertificadoPeer::DATABASE_NAME);

		if ($this->isColumnModified(CuponsDescontoCertificadoPeer::ID)) $criteria->add(CuponsDescontoCertificadoPeer::ID, $this->id);
		if ($this->isColumnModified(CuponsDescontoCertificadoPeer::PRODUTO_ID)) $criteria->add(CuponsDescontoCertificadoPeer::PRODUTO_ID, $this->produto_id);
		if ($this->isColumnModified(CuponsDescontoCertificadoPeer::USUARIO_ID)) $criteria->add(CuponsDescontoCertificadoPeer::USUARIO_ID, $this->usuario_id);
		if ($this->isColumnModified(CuponsDescontoCertificadoPeer::CERTIFICADO_ID)) $criteria->add(CuponsDescontoCertificadoPeer::CERTIFICADO_ID, $this->certificado_id);
		if ($this->isColumnModified(CuponsDescontoCertificadoPeer::USUARIO_AUTORIZACAO_ID)) $criteria->add(CuponsDescontoCertificadoPeer::USUARIO_AUTORIZACAO_ID, $this->usuario_autorizacao_id);
		if ($this->isColumnModified(CuponsDescontoCertificadoPeer::USADO)) $criteria->add(CuponsDescontoCertificadoPeer::USADO, $this->usado);
		if ($this->isColumnModified(CuponsDescontoCertificadoPeer::VENCIMENTO)) $criteria->add(CuponsDescontoCertificadoPeer::VENCIMENTO, $this->vencimento);
		if ($this->isColumnModified(CuponsDescontoCertificadoPeer::CPF_CNPJ)) $criteria->add(CuponsDescontoCertificadoPeer::CPF_CNPJ, $this->cpf_cnpj);
		if ($this->isColumnModified(CuponsDescontoCertificadoPeer::DESCONTO)) $criteria->add(CuponsDescontoCertificadoPeer::DESCONTO, $this->desconto);
		if ($this->isColumnModified(CuponsDescontoCertificadoPeer::CODIGO_DESCONTO)) $criteria->add(CuponsDescontoCertificadoPeer::CODIGO_DESCONTO, $this->codigo_desconto);
		if ($this->isColumnModified(CuponsDescontoCertificadoPeer::MOTIVO)) $criteria->add(CuponsDescontoCertificadoPeer::MOTIVO, $this->motivo);
		if ($this->isColumnModified(CuponsDescontoCertificadoPeer::EMAIL_CLIENTE)) $criteria->add(CuponsDescontoCertificadoPeer::EMAIL_CLIENTE, $this->email_cliente);
		if ($this->isColumnModified(CuponsDescontoCertificadoPeer::AUTORIZADO)) $criteria->add(CuponsDescontoCertificadoPeer::AUTORIZADO, $this->autorizado);
		if ($this->isColumnModified(CuponsDescontoCertificadoPeer::MOTIVO_AUTORIZACAO)) $criteria->add(CuponsDescontoCertificadoPeer::MOTIVO_AUTORIZACAO, $this->motivo_autorizacao);

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
		$criteria = new Criteria(CuponsDescontoCertificadoPeer::DATABASE_NAME);

		$criteria->add(CuponsDescontoCertificadoPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of CuponsDescontoCertificado (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setProdutoId($this->produto_id);

		$copyObj->setUsuarioId($this->usuario_id);

		$copyObj->setCertificadoId($this->certificado_id);

		$copyObj->setUsuarioAutorizacaoId($this->usuario_autorizacao_id);

		$copyObj->setUsado($this->usado);

		$copyObj->setVencimento($this->vencimento);

		$copyObj->setCpfCnpj($this->cpf_cnpj);

		$copyObj->setDesconto($this->desconto);

		$copyObj->setCodigoDesconto($this->codigo_desconto);

		$copyObj->setMotivo($this->motivo);

		$copyObj->setEmailCliente($this->email_cliente);

		$copyObj->setAutorizado($this->autorizado);

		$copyObj->setMotivoAutorizacao($this->motivo_autorizacao);


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
	 * @return     CuponsDescontoCertificado Clone of current object.
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
	 * @return     CuponsDescontoCertificadoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new CuponsDescontoCertificadoPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Produto object.
	 *
	 * @param      Produto $v
	 * @return     CuponsDescontoCertificado The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setProduto(Produto $v = null)
	{
		if ($v === null) {
			$this->setProdutoId(NULL);
		} else {
			$this->setProdutoId($v->getId());
		}

		$this->aProduto = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Produto object, it will not be re-added.
		if ($v !== null) {
			$v->addCuponsDescontoCertificado($this);
		}

		return $this;
	}


	/**
	 * Get the associated Produto object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Produto The associated Produto object.
	 * @throws     PropelException
	 */
	public function getProduto(PropelPDO $con = null)
	{
		if ($this->aProduto === null && ($this->produto_id !== null)) {
			$this->aProduto = ProdutoPeer::retrieveByPk($this->produto_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aProduto->addCuponsDescontoCertificados($this);
			 */
		}
		return $this->aProduto;
	}

	/**
	 * Declares an association between this object and a Usuario object.
	 *
	 * @param      Usuario $v
	 * @return     CuponsDescontoCertificado The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUsuarioRelatedByUsuarioId(Usuario $v = null)
	{
		if ($v === null) {
			$this->setUsuarioId(NULL);
		} else {
			$this->setUsuarioId($v->getId());
		}

		$this->aUsuarioRelatedByUsuarioId = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Usuario object, it will not be re-added.
		if ($v !== null) {
			$v->addCuponsDescontoCertificadoRelatedByUsuarioId($this);
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
	public function getUsuarioRelatedByUsuarioId(PropelPDO $con = null)
	{
		if ($this->aUsuarioRelatedByUsuarioId === null && ($this->usuario_id !== null)) {
			$this->aUsuarioRelatedByUsuarioId = UsuarioPeer::retrieveByPk($this->usuario_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aUsuarioRelatedByUsuarioId->addCuponsDescontoCertificadosRelatedByUsuarioId($this);
			 */
		}
		return $this->aUsuarioRelatedByUsuarioId;
	}

	/**
	 * Declares an association between this object and a Certificado object.
	 *
	 * @param      Certificado $v
	 * @return     CuponsDescontoCertificado The current object (for fluent API support)
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
			$v->addCuponsDescontoCertificado($this);
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
			   $this->aCertificado->addCuponsDescontoCertificados($this);
			 */
		}
		return $this->aCertificado;
	}

	/**
	 * Declares an association between this object and a Usuario object.
	 *
	 * @param      Usuario $v
	 * @return     CuponsDescontoCertificado The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUsuarioRelatedByUsuarioAutorizacaoId(Usuario $v = null)
	{
		if ($v === null) {
			$this->setUsuarioAutorizacaoId(NULL);
		} else {
			$this->setUsuarioAutorizacaoId($v->getId());
		}

		$this->aUsuarioRelatedByUsuarioAutorizacaoId = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Usuario object, it will not be re-added.
		if ($v !== null) {
			$v->addCuponsDescontoCertificadoRelatedByUsuarioAutorizacaoId($this);
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
	public function getUsuarioRelatedByUsuarioAutorizacaoId(PropelPDO $con = null)
	{
		if ($this->aUsuarioRelatedByUsuarioAutorizacaoId === null && ($this->usuario_autorizacao_id !== null)) {
			$this->aUsuarioRelatedByUsuarioAutorizacaoId = UsuarioPeer::retrieveByPk($this->usuario_autorizacao_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aUsuarioRelatedByUsuarioAutorizacaoId->addCuponsDescontoCertificadosRelatedByUsuarioAutorizacaoId($this);
			 */
		}
		return $this->aUsuarioRelatedByUsuarioAutorizacaoId;
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

			$this->aProduto = null;
			$this->aUsuarioRelatedByUsuarioId = null;
			$this->aCertificado = null;
			$this->aUsuarioRelatedByUsuarioAutorizacaoId = null;
	}

} // BaseCuponsDescontoCertificado
