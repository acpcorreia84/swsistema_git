<?php

/**
 * Base class that represents a row from the 'boleto' table.
 *
 * 
 *
 * @package    pacoteFinanceiro.om
 */
abstract class BaseBoleto extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        BoletoPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the tid field.
	 * @var        int
	 */
	protected $tid;

	/**
	 * The value for the certificado_id field.
	 * @var        int
	 */
	protected $certificado_id;

	/**
	 * The value for the pedido_id field.
	 * @var        int
	 */
	protected $pedido_id;

	/**
	 * The value for the contas_receber_id field.
	 * @var        int
	 */
	protected $contas_receber_id;

	/**
	 * The value for the cliente_id field.
	 * @var        string
	 */
	protected $cliente_id;

	/**
	 * The value for the vencimento field.
	 * @var        string
	 */
	protected $vencimento;

	/**
	 * The value for the data_processamento field.
	 * @var        string
	 */
	protected $data_processamento;

	/**
	 * The value for the data_pagamento field.
	 * @var        string
	 */
	protected $data_pagamento;

	/**
	 * The value for the data_confirmacao_pagamento field.
	 * @var        string
	 */
	protected $data_confirmacao_pagamento;

	/**
	 * The value for the valor field.
	 * @var        double
	 */
	protected $valor;

	/**
	 * The value for the url_boleto field.
	 * @var        string
	 */
	protected $url_boleto;

	/**
	 * The value for the descricao field.
	 * @var        string
	 */
	protected $descricao;

	/**
	 * @var        Certificado
	 */
	protected $aCertificado;

	/**
	 * @var        Pedido
	 */
	protected $aPedido;

	/**
	 * @var        ContasReceber
	 */
	protected $aContasReceber;

	/**
	 * @var        Cliente
	 */
	protected $aCliente;

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
	 * Get the [tid] column value.
	 * 
	 * @return     int
	 */
	public function getTid()
	{
		return $this->tid;
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
	 * Get the [pedido_id] column value.
	 * 
	 * @return     int
	 */
	public function getPedidoId()
	{
		return $this->pedido_id;
	}

	/**
	 * Get the [contas_receber_id] column value.
	 * 
	 * @return     int
	 */
	public function getContasReceberId()
	{
		return $this->contas_receber_id;
	}

	/**
	 * Get the [cliente_id] column value.
	 * 
	 * @return     string
	 */
	public function getClienteId()
	{
		return $this->cliente_id;
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
	 * Get the [optionally formatted] temporal [data_processamento] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataProcessamento($format = '%x')
	{
		if ($this->data_processamento === null) {
			return null;
		}


		if ($this->data_processamento === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_processamento);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_processamento, true), $x);
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
	 * Get the [optionally formatted] temporal [data_pagamento] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataPagamento($format = '%x')
	{
		if ($this->data_pagamento === null) {
			return null;
		}


		if ($this->data_pagamento === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_pagamento);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_pagamento, true), $x);
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
	 * Get the [valor] column value.
	 * 
	 * @return     double
	 */
	public function getValor()
	{
		return $this->valor;
	}

	/**
	 * Get the [url_boleto] column value.
	 * 
	 * @return     string
	 */
	public function getUrlBoleto()
	{
		return $this->url_boleto;
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
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Boleto The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = BoletoPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [tid] column.
	 * 
	 * @param      int $v new value
	 * @return     Boleto The current object (for fluent API support)
	 */
	public function setTid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->tid !== $v) {
			$this->tid = $v;
			$this->modifiedColumns[] = BoletoPeer::TID;
		}

		return $this;
	} // setTid()

	/**
	 * Set the value of [certificado_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Boleto The current object (for fluent API support)
	 */
	public function setCertificadoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->certificado_id !== $v) {
			$this->certificado_id = $v;
			$this->modifiedColumns[] = BoletoPeer::CERTIFICADO_ID;
		}

		if ($this->aCertificado !== null && $this->aCertificado->getId() !== $v) {
			$this->aCertificado = null;
		}

		return $this;
	} // setCertificadoId()

	/**
	 * Set the value of [pedido_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Boleto The current object (for fluent API support)
	 */
	public function setPedidoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->pedido_id !== $v) {
			$this->pedido_id = $v;
			$this->modifiedColumns[] = BoletoPeer::PEDIDO_ID;
		}

		if ($this->aPedido !== null && $this->aPedido->getId() !== $v) {
			$this->aPedido = null;
		}

		return $this;
	} // setPedidoId()

	/**
	 * Set the value of [contas_receber_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Boleto The current object (for fluent API support)
	 */
	public function setContasReceberId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->contas_receber_id !== $v) {
			$this->contas_receber_id = $v;
			$this->modifiedColumns[] = BoletoPeer::CONTAS_RECEBER_ID;
		}

		if ($this->aContasReceber !== null && $this->aContasReceber->getId() !== $v) {
			$this->aContasReceber = null;
		}

		return $this;
	} // setContasReceberId()

	/**
	 * Set the value of [cliente_id] column.
	 * 
	 * @param      string $v new value
	 * @return     Boleto The current object (for fluent API support)
	 */
	public function setClienteId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cliente_id !== $v) {
			$this->cliente_id = $v;
			$this->modifiedColumns[] = BoletoPeer::CLIENTE_ID;
		}

		if ($this->aCliente !== null && $this->aCliente->getId() !== $v) {
			$this->aCliente = null;
		}

		return $this;
	} // setClienteId()

	/**
	 * Sets the value of [vencimento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Boleto The current object (for fluent API support)
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
				$this->modifiedColumns[] = BoletoPeer::VENCIMENTO;
			}
		} // if either are not null

		return $this;
	} // setVencimento()

	/**
	 * Sets the value of [data_processamento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Boleto The current object (for fluent API support)
	 */
	public function setDataProcessamento($v)
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

		if ( $this->data_processamento !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_processamento !== null && $tmpDt = new DateTime($this->data_processamento)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_processamento = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = BoletoPeer::DATA_PROCESSAMENTO;
			}
		} // if either are not null

		return $this;
	} // setDataProcessamento()

	/**
	 * Sets the value of [data_pagamento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Boleto The current object (for fluent API support)
	 */
	public function setDataPagamento($v)
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

		if ( $this->data_pagamento !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_pagamento !== null && $tmpDt = new DateTime($this->data_pagamento)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_pagamento = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = BoletoPeer::DATA_PAGAMENTO;
			}
		} // if either are not null

		return $this;
	} // setDataPagamento()

	/**
	 * Sets the value of [data_confirmacao_pagamento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Boleto The current object (for fluent API support)
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
				$this->modifiedColumns[] = BoletoPeer::DATA_CONFIRMACAO_PAGAMENTO;
			}
		} // if either are not null

		return $this;
	} // setDataConfirmacaoPagamento()

	/**
	 * Set the value of [valor] column.
	 * 
	 * @param      double $v new value
	 * @return     Boleto The current object (for fluent API support)
	 */
	public function setValor($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->valor !== $v) {
			$this->valor = $v;
			$this->modifiedColumns[] = BoletoPeer::VALOR;
		}

		return $this;
	} // setValor()

	/**
	 * Set the value of [url_boleto] column.
	 * 
	 * @param      string $v new value
	 * @return     Boleto The current object (for fluent API support)
	 */
	public function setUrlBoleto($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->url_boleto !== $v) {
			$this->url_boleto = $v;
			$this->modifiedColumns[] = BoletoPeer::URL_BOLETO;
		}

		return $this;
	} // setUrlBoleto()

	/**
	 * Set the value of [descricao] column.
	 * 
	 * @param      string $v new value
	 * @return     Boleto The current object (for fluent API support)
	 */
	public function setDescricao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->descricao !== $v) {
			$this->descricao = $v;
			$this->modifiedColumns[] = BoletoPeer::DESCRICAO;
		}

		return $this;
	} // setDescricao()

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
			$this->tid = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->certificado_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->pedido_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->contas_receber_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->cliente_id = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->vencimento = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->data_processamento = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->data_pagamento = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->data_confirmacao_pagamento = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->valor = ($row[$startcol + 10] !== null) ? (double) $row[$startcol + 10] : null;
			$this->url_boleto = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->descricao = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 13; // 13 = BoletoPeer::NUM_COLUMNS - BoletoPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Boleto object", $e);
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

		if ($this->aCertificado !== null && $this->certificado_id !== $this->aCertificado->getId()) {
			$this->aCertificado = null;
		}
		if ($this->aPedido !== null && $this->pedido_id !== $this->aPedido->getId()) {
			$this->aPedido = null;
		}
		if ($this->aContasReceber !== null && $this->contas_receber_id !== $this->aContasReceber->getId()) {
			$this->aContasReceber = null;
		}
		if ($this->aCliente !== null && $this->cliente_id !== $this->aCliente->getId()) {
			$this->aCliente = null;
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
			$con = Propel::getConnection(BoletoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = BoletoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aCertificado = null;
			$this->aPedido = null;
			$this->aContasReceber = null;
			$this->aCliente = null;
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
			$con = Propel::getConnection(BoletoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				BoletoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BoletoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				BoletoPeer::addInstanceToPool($this);
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

			if ($this->aCertificado !== null) {
				if ($this->aCertificado->isModified() || $this->aCertificado->isNew()) {
					$affectedRows += $this->aCertificado->save($con);
				}
				$this->setCertificado($this->aCertificado);
			}

			if ($this->aPedido !== null) {
				if ($this->aPedido->isModified() || $this->aPedido->isNew()) {
					$affectedRows += $this->aPedido->save($con);
				}
				$this->setPedido($this->aPedido);
			}

			if ($this->aContasReceber !== null) {
				if ($this->aContasReceber->isModified() || $this->aContasReceber->isNew()) {
					$affectedRows += $this->aContasReceber->save($con);
				}
				$this->setContasReceber($this->aContasReceber);
			}

			if ($this->aCliente !== null) {
				if ($this->aCliente->isModified() || $this->aCliente->isNew()) {
					$affectedRows += $this->aCliente->save($con);
				}
				$this->setCliente($this->aCliente);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = BoletoPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = BoletoPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += BoletoPeer::doUpdate($this, $con);
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

			if ($this->aCertificado !== null) {
				if (!$this->aCertificado->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCertificado->getValidationFailures());
				}
			}

			if ($this->aPedido !== null) {
				if (!$this->aPedido->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPedido->getValidationFailures());
				}
			}

			if ($this->aContasReceber !== null) {
				if (!$this->aContasReceber->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aContasReceber->getValidationFailures());
				}
			}

			if ($this->aCliente !== null) {
				if (!$this->aCliente->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCliente->getValidationFailures());
				}
			}


			if (($retval = BoletoPeer::doValidate($this, $columns)) !== true) {
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
		$criteria = new Criteria(BoletoPeer::DATABASE_NAME);

		if ($this->isColumnModified(BoletoPeer::ID)) $criteria->add(BoletoPeer::ID, $this->id);
		if ($this->isColumnModified(BoletoPeer::TID)) $criteria->add(BoletoPeer::TID, $this->tid);
		if ($this->isColumnModified(BoletoPeer::CERTIFICADO_ID)) $criteria->add(BoletoPeer::CERTIFICADO_ID, $this->certificado_id);
		if ($this->isColumnModified(BoletoPeer::PEDIDO_ID)) $criteria->add(BoletoPeer::PEDIDO_ID, $this->pedido_id);
		if ($this->isColumnModified(BoletoPeer::CONTAS_RECEBER_ID)) $criteria->add(BoletoPeer::CONTAS_RECEBER_ID, $this->contas_receber_id);
		if ($this->isColumnModified(BoletoPeer::CLIENTE_ID)) $criteria->add(BoletoPeer::CLIENTE_ID, $this->cliente_id);
		if ($this->isColumnModified(BoletoPeer::VENCIMENTO)) $criteria->add(BoletoPeer::VENCIMENTO, $this->vencimento);
		if ($this->isColumnModified(BoletoPeer::DATA_PROCESSAMENTO)) $criteria->add(BoletoPeer::DATA_PROCESSAMENTO, $this->data_processamento);
		if ($this->isColumnModified(BoletoPeer::DATA_PAGAMENTO)) $criteria->add(BoletoPeer::DATA_PAGAMENTO, $this->data_pagamento);
		if ($this->isColumnModified(BoletoPeer::DATA_CONFIRMACAO_PAGAMENTO)) $criteria->add(BoletoPeer::DATA_CONFIRMACAO_PAGAMENTO, $this->data_confirmacao_pagamento);
		if ($this->isColumnModified(BoletoPeer::VALOR)) $criteria->add(BoletoPeer::VALOR, $this->valor);
		if ($this->isColumnModified(BoletoPeer::URL_BOLETO)) $criteria->add(BoletoPeer::URL_BOLETO, $this->url_boleto);
		if ($this->isColumnModified(BoletoPeer::DESCRICAO)) $criteria->add(BoletoPeer::DESCRICAO, $this->descricao);

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
		$criteria = new Criteria(BoletoPeer::DATABASE_NAME);

		$criteria->add(BoletoPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Boleto (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setTid($this->tid);

		$copyObj->setCertificadoId($this->certificado_id);

		$copyObj->setPedidoId($this->pedido_id);

		$copyObj->setContasReceberId($this->contas_receber_id);

		$copyObj->setClienteId($this->cliente_id);

		$copyObj->setVencimento($this->vencimento);

		$copyObj->setDataProcessamento($this->data_processamento);

		$copyObj->setDataPagamento($this->data_pagamento);

		$copyObj->setDataConfirmacaoPagamento($this->data_confirmacao_pagamento);

		$copyObj->setValor($this->valor);

		$copyObj->setUrlBoleto($this->url_boleto);

		$copyObj->setDescricao($this->descricao);


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
	 * @return     Boleto Clone of current object.
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
	 * @return     BoletoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new BoletoPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Certificado object.
	 *
	 * @param      Certificado $v
	 * @return     Boleto The current object (for fluent API support)
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
			$v->addBoleto($this);
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
			   $this->aCertificado->addBoletos($this);
			 */
		}
		return $this->aCertificado;
	}

	/**
	 * Declares an association between this object and a Pedido object.
	 *
	 * @param      Pedido $v
	 * @return     Boleto The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setPedido(Pedido $v = null)
	{
		if ($v === null) {
			$this->setPedidoId(NULL);
		} else {
			$this->setPedidoId($v->getId());
		}

		$this->aPedido = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Pedido object, it will not be re-added.
		if ($v !== null) {
			$v->addBoleto($this);
		}

		return $this;
	}


	/**
	 * Get the associated Pedido object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Pedido The associated Pedido object.
	 * @throws     PropelException
	 */
	public function getPedido(PropelPDO $con = null)
	{
		if ($this->aPedido === null && ($this->pedido_id !== null)) {
			$this->aPedido = PedidoPeer::retrieveByPk($this->pedido_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aPedido->addBoletos($this);
			 */
		}
		return $this->aPedido;
	}

	/**
	 * Declares an association between this object and a ContasReceber object.
	 *
	 * @param      ContasReceber $v
	 * @return     Boleto The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setContasReceber(ContasReceber $v = null)
	{
		if ($v === null) {
			$this->setContasReceberId(NULL);
		} else {
			$this->setContasReceberId($v->getId());
		}

		$this->aContasReceber = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the ContasReceber object, it will not be re-added.
		if ($v !== null) {
			$v->addBoleto($this);
		}

		return $this;
	}


	/**
	 * Get the associated ContasReceber object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     ContasReceber The associated ContasReceber object.
	 * @throws     PropelException
	 */
	public function getContasReceber(PropelPDO $con = null)
	{
		if ($this->aContasReceber === null && ($this->contas_receber_id !== null)) {
			$this->aContasReceber = ContasReceberPeer::retrieveByPk($this->contas_receber_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aContasReceber->addBoletos($this);
			 */
		}
		return $this->aContasReceber;
	}

	/**
	 * Declares an association between this object and a Cliente object.
	 *
	 * @param      Cliente $v
	 * @return     Boleto The current object (for fluent API support)
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
			$v->addBoleto($this);
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
		if ($this->aCliente === null && (($this->cliente_id !== "" && $this->cliente_id !== null))) {
			$this->aCliente = ClientePeer::retrieveByPk($this->cliente_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aCliente->addBoletos($this);
			 */
		}
		return $this->aCliente;
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

			$this->aCertificado = null;
			$this->aPedido = null;
			$this->aContasReceber = null;
			$this->aCliente = null;
	}

} // BaseBoleto
