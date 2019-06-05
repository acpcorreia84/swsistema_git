<?php

/**
 * Base class that represents a row from the 'contas_pagar' table.
 *
 * 
 *
 * @package    pacoteFinanceiro.om
 */
abstract class BaseContasPagar extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ContasPagarPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the conta_pagar_id field.
	 * @var        int
	 */
	protected $conta_pagar_id;

	/**
	 * The value for the conta_contabil_id field.
	 * @var        int
	 */
	protected $conta_contabil_id;

	/**
	 * The value for the lancamento_caixa_id field.
	 * @var        int
	 */
	protected $lancamento_caixa_id;

	/**
	 * The value for the data_pagamento field.
	 * @var        string
	 */
	protected $data_pagamento;

	/**
	 * The value for the data_documento field.
	 * @var        string
	 */
	protected $data_documento;

	/**
	 * The value for the descricao field.
	 * @var        string
	 */
	protected $descricao;

	/**
	 * The value for the valor_documento field.
	 * @var        double
	 */
	protected $valor_documento;

	/**
	 * The value for the valor_restante field.
	 * @var        double
	 */
	protected $valor_restante;

	/**
	 * The value for the vencimento field.
	 * @var        string
	 */
	protected $vencimento;

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
	 * The value for the motivo_desconto field.
	 * @var        string
	 */
	protected $motivo_desconto;

	/**
	 * The value for the situacao field.
	 * @var        int
	 */
	protected $situacao;

	/**
	 * @var        ContasPagar
	 */
	protected $aContasPagarRelatedByContaPagarId;

	/**
	 * @var        LancamentoCaixa
	 */
	protected $aLancamentoCaixa;

	/**
	 * @var        ContaContabil
	 */
	protected $aContaContabil;

	/**
	 * @var        array LancamentoCaixa[] Collection to store aggregation of LancamentoCaixa objects.
	 */
	protected $collLancamentoCaixas;

	/**
	 * @var        Criteria The criteria used to select the current contents of collLancamentoCaixas.
	 */
	private $lastLancamentoCaixaCriteria = null;

	/**
	 * @var        array ContasPagar[] Collection to store aggregation of ContasPagar objects.
	 */
	protected $collContasPagarsRelatedByContaPagarId;

	/**
	 * @var        Criteria The criteria used to select the current contents of collContasPagarsRelatedByContaPagarId.
	 */
	private $lastContasPagarRelatedByContaPagarIdCriteria = null;

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
	 * Get the [conta_pagar_id] column value.
	 * 
	 * @return     int
	 */
	public function getContaPagarId()
	{
		return $this->conta_pagar_id;
	}

	/**
	 * Get the [conta_contabil_id] column value.
	 * 
	 * @return     int
	 */
	public function getContaContabilId()
	{
		return $this->conta_contabil_id;
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
	 * Get the [optionally formatted] temporal [data_pagamento] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataPagamento($format = 'Y-m-d H:i:s')
	{
		if ($this->data_pagamento === null) {
			return null;
		}


		if ($this->data_pagamento === '0000-00-00 00:00:00') {
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
	 * Get the [optionally formatted] temporal [data_documento] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataDocumento($format = '%x')
	{
		if ($this->data_documento === null) {
			return null;
		}


		if ($this->data_documento === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_documento);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_documento, true), $x);
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
	 * Get the [descricao] column value.
	 * 
	 * @return     string
	 */
	public function getDescricao()
	{
		return $this->descricao;
	}

	/**
	 * Get the [valor_documento] column value.
	 * 
	 * @return     double
	 */
	public function getValorDocumento()
	{
		return $this->valor_documento;
	}

	/**
	 * Get the [valor_restante] column value.
	 * 
	 * @return     double
	 */
	public function getValorRestante()
	{
		return $this->valor_restante;
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
	 * Get the [motivo_desconto] column value.
	 * 
	 * @return     string
	 */
	public function getMotivoDesconto()
	{
		return $this->motivo_desconto;
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
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     ContasPagar The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ContasPagarPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [conta_pagar_id] column.
	 * 
	 * @param      int $v new value
	 * @return     ContasPagar The current object (for fluent API support)
	 */
	public function setContaPagarId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->conta_pagar_id !== $v) {
			$this->conta_pagar_id = $v;
			$this->modifiedColumns[] = ContasPagarPeer::CONTA_PAGAR_ID;
		}

		if ($this->aContasPagarRelatedByContaPagarId !== null && $this->aContasPagarRelatedByContaPagarId->getId() !== $v) {
			$this->aContasPagarRelatedByContaPagarId = null;
		}

		return $this;
	} // setContaPagarId()

	/**
	 * Set the value of [conta_contabil_id] column.
	 * 
	 * @param      int $v new value
	 * @return     ContasPagar The current object (for fluent API support)
	 */
	public function setContaContabilId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->conta_contabil_id !== $v) {
			$this->conta_contabil_id = $v;
			$this->modifiedColumns[] = ContasPagarPeer::CONTA_CONTABIL_ID;
		}

		if ($this->aContaContabil !== null && $this->aContaContabil->getId() !== $v) {
			$this->aContaContabil = null;
		}

		return $this;
	} // setContaContabilId()

	/**
	 * Set the value of [lancamento_caixa_id] column.
	 * 
	 * @param      int $v new value
	 * @return     ContasPagar The current object (for fluent API support)
	 */
	public function setLancamentoCaixaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->lancamento_caixa_id !== $v) {
			$this->lancamento_caixa_id = $v;
			$this->modifiedColumns[] = ContasPagarPeer::LANCAMENTO_CAIXA_ID;
		}

		if ($this->aLancamentoCaixa !== null && $this->aLancamentoCaixa->getId() !== $v) {
			$this->aLancamentoCaixa = null;
		}

		return $this;
	} // setLancamentoCaixaId()

	/**
	 * Sets the value of [data_pagamento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     ContasPagar The current object (for fluent API support)
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

			$currNorm = ($this->data_pagamento !== null && $tmpDt = new DateTime($this->data_pagamento)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_pagamento = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = ContasPagarPeer::DATA_PAGAMENTO;
			}
		} // if either are not null

		return $this;
	} // setDataPagamento()

	/**
	 * Sets the value of [data_documento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     ContasPagar The current object (for fluent API support)
	 */
	public function setDataDocumento($v)
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

		if ( $this->data_documento !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_documento !== null && $tmpDt = new DateTime($this->data_documento)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_documento = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = ContasPagarPeer::DATA_DOCUMENTO;
			}
		} // if either are not null

		return $this;
	} // setDataDocumento()

	/**
	 * Set the value of [descricao] column.
	 * 
	 * @param      string $v new value
	 * @return     ContasPagar The current object (for fluent API support)
	 */
	public function setDescricao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->descricao !== $v) {
			$this->descricao = $v;
			$this->modifiedColumns[] = ContasPagarPeer::DESCRICAO;
		}

		return $this;
	} // setDescricao()

	/**
	 * Set the value of [valor_documento] column.
	 * 
	 * @param      double $v new value
	 * @return     ContasPagar The current object (for fluent API support)
	 */
	public function setValorDocumento($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->valor_documento !== $v) {
			$this->valor_documento = $v;
			$this->modifiedColumns[] = ContasPagarPeer::VALOR_DOCUMENTO;
		}

		return $this;
	} // setValorDocumento()

	/**
	 * Set the value of [valor_restante] column.
	 * 
	 * @param      double $v new value
	 * @return     ContasPagar The current object (for fluent API support)
	 */
	public function setValorRestante($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->valor_restante !== $v) {
			$this->valor_restante = $v;
			$this->modifiedColumns[] = ContasPagarPeer::VALOR_RESTANTE;
		}

		return $this;
	} // setValorRestante()

	/**
	 * Sets the value of [vencimento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     ContasPagar The current object (for fluent API support)
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
				$this->modifiedColumns[] = ContasPagarPeer::VENCIMENTO;
			}
		} // if either are not null

		return $this;
	} // setVencimento()

	/**
	 * Set the value of [desconto] column.
	 * 
	 * @param      double $v new value
	 * @return     ContasPagar The current object (for fluent API support)
	 */
	public function setDesconto($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->desconto !== $v) {
			$this->desconto = $v;
			$this->modifiedColumns[] = ContasPagarPeer::DESCONTO;
		}

		return $this;
	} // setDesconto()

	/**
	 * Set the value of [observacao] column.
	 * 
	 * @param      string $v new value
	 * @return     ContasPagar The current object (for fluent API support)
	 */
	public function setObservacao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->observacao !== $v) {
			$this->observacao = $v;
			$this->modifiedColumns[] = ContasPagarPeer::OBSERVACAO;
		}

		return $this;
	} // setObservacao()

	/**
	 * Set the value of [motivo_desconto] column.
	 * 
	 * @param      string $v new value
	 * @return     ContasPagar The current object (for fluent API support)
	 */
	public function setMotivoDesconto($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->motivo_desconto !== $v) {
			$this->motivo_desconto = $v;
			$this->modifiedColumns[] = ContasPagarPeer::MOTIVO_DESCONTO;
		}

		return $this;
	} // setMotivoDesconto()

	/**
	 * Set the value of [situacao] column.
	 * 
	 * @param      int $v new value
	 * @return     ContasPagar The current object (for fluent API support)
	 */
	public function setSituacao($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->situacao !== $v) {
			$this->situacao = $v;
			$this->modifiedColumns[] = ContasPagarPeer::SITUACAO;
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
			$this->conta_pagar_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->conta_contabil_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->lancamento_caixa_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->data_pagamento = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->data_documento = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->descricao = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->valor_documento = ($row[$startcol + 7] !== null) ? (double) $row[$startcol + 7] : null;
			$this->valor_restante = ($row[$startcol + 8] !== null) ? (double) $row[$startcol + 8] : null;
			$this->vencimento = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->desconto = ($row[$startcol + 10] !== null) ? (double) $row[$startcol + 10] : null;
			$this->observacao = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->motivo_desconto = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->situacao = ($row[$startcol + 13] !== null) ? (int) $row[$startcol + 13] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 14; // 14 = ContasPagarPeer::NUM_COLUMNS - ContasPagarPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating ContasPagar object", $e);
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

		if ($this->aContasPagarRelatedByContaPagarId !== null && $this->conta_pagar_id !== $this->aContasPagarRelatedByContaPagarId->getId()) {
			$this->aContasPagarRelatedByContaPagarId = null;
		}
		if ($this->aContaContabil !== null && $this->conta_contabil_id !== $this->aContaContabil->getId()) {
			$this->aContaContabil = null;
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
			$con = Propel::getConnection(ContasPagarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ContasPagarPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aContasPagarRelatedByContaPagarId = null;
			$this->aLancamentoCaixa = null;
			$this->aContaContabil = null;
			$this->collLancamentoCaixas = null;
			$this->lastLancamentoCaixaCriteria = null;

			$this->collContasPagarsRelatedByContaPagarId = null;
			$this->lastContasPagarRelatedByContaPagarIdCriteria = null;

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
			$con = Propel::getConnection(ContasPagarPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				ContasPagarPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ContasPagarPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				ContasPagarPeer::addInstanceToPool($this);
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

			if ($this->aContasPagarRelatedByContaPagarId !== null) {
				if ($this->aContasPagarRelatedByContaPagarId->isModified() || $this->aContasPagarRelatedByContaPagarId->isNew()) {
					$affectedRows += $this->aContasPagarRelatedByContaPagarId->save($con);
				}
				$this->setContasPagarRelatedByContaPagarId($this->aContasPagarRelatedByContaPagarId);
			}

			if ($this->aLancamentoCaixa !== null) {
				if ($this->aLancamentoCaixa->isModified() || $this->aLancamentoCaixa->isNew()) {
					$affectedRows += $this->aLancamentoCaixa->save($con);
				}
				$this->setLancamentoCaixa($this->aLancamentoCaixa);
			}

			if ($this->aContaContabil !== null) {
				if ($this->aContaContabil->isModified() || $this->aContaContabil->isNew()) {
					$affectedRows += $this->aContaContabil->save($con);
				}
				$this->setContaContabil($this->aContaContabil);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = ContasPagarPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ContasPagarPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += ContasPagarPeer::doUpdate($this, $con);
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

			if ($this->collContasPagarsRelatedByContaPagarId !== null) {
				foreach ($this->collContasPagarsRelatedByContaPagarId as $referrerFK) {
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

			if ($this->aContasPagarRelatedByContaPagarId !== null) {
				if (!$this->aContasPagarRelatedByContaPagarId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aContasPagarRelatedByContaPagarId->getValidationFailures());
				}
			}

			if ($this->aLancamentoCaixa !== null) {
				if (!$this->aLancamentoCaixa->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLancamentoCaixa->getValidationFailures());
				}
			}

			if ($this->aContaContabil !== null) {
				if (!$this->aContaContabil->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aContaContabil->getValidationFailures());
				}
			}


			if (($retval = ContasPagarPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLancamentoCaixas !== null) {
					foreach ($this->collLancamentoCaixas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collContasPagarsRelatedByContaPagarId !== null) {
					foreach ($this->collContasPagarsRelatedByContaPagarId as $referrerFK) {
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
		$criteria = new Criteria(ContasPagarPeer::DATABASE_NAME);

		if ($this->isColumnModified(ContasPagarPeer::ID)) $criteria->add(ContasPagarPeer::ID, $this->id);
		if ($this->isColumnModified(ContasPagarPeer::CONTA_PAGAR_ID)) $criteria->add(ContasPagarPeer::CONTA_PAGAR_ID, $this->conta_pagar_id);
		if ($this->isColumnModified(ContasPagarPeer::CONTA_CONTABIL_ID)) $criteria->add(ContasPagarPeer::CONTA_CONTABIL_ID, $this->conta_contabil_id);
		if ($this->isColumnModified(ContasPagarPeer::LANCAMENTO_CAIXA_ID)) $criteria->add(ContasPagarPeer::LANCAMENTO_CAIXA_ID, $this->lancamento_caixa_id);
		if ($this->isColumnModified(ContasPagarPeer::DATA_PAGAMENTO)) $criteria->add(ContasPagarPeer::DATA_PAGAMENTO, $this->data_pagamento);
		if ($this->isColumnModified(ContasPagarPeer::DATA_DOCUMENTO)) $criteria->add(ContasPagarPeer::DATA_DOCUMENTO, $this->data_documento);
		if ($this->isColumnModified(ContasPagarPeer::DESCRICAO)) $criteria->add(ContasPagarPeer::DESCRICAO, $this->descricao);
		if ($this->isColumnModified(ContasPagarPeer::VALOR_DOCUMENTO)) $criteria->add(ContasPagarPeer::VALOR_DOCUMENTO, $this->valor_documento);
		if ($this->isColumnModified(ContasPagarPeer::VALOR_RESTANTE)) $criteria->add(ContasPagarPeer::VALOR_RESTANTE, $this->valor_restante);
		if ($this->isColumnModified(ContasPagarPeer::VENCIMENTO)) $criteria->add(ContasPagarPeer::VENCIMENTO, $this->vencimento);
		if ($this->isColumnModified(ContasPagarPeer::DESCONTO)) $criteria->add(ContasPagarPeer::DESCONTO, $this->desconto);
		if ($this->isColumnModified(ContasPagarPeer::OBSERVACAO)) $criteria->add(ContasPagarPeer::OBSERVACAO, $this->observacao);
		if ($this->isColumnModified(ContasPagarPeer::MOTIVO_DESCONTO)) $criteria->add(ContasPagarPeer::MOTIVO_DESCONTO, $this->motivo_desconto);
		if ($this->isColumnModified(ContasPagarPeer::SITUACAO)) $criteria->add(ContasPagarPeer::SITUACAO, $this->situacao);

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
		$criteria = new Criteria(ContasPagarPeer::DATABASE_NAME);

		$criteria->add(ContasPagarPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of ContasPagar (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setContaPagarId($this->conta_pagar_id);

		$copyObj->setContaContabilId($this->conta_contabil_id);

		$copyObj->setLancamentoCaixaId($this->lancamento_caixa_id);

		$copyObj->setDataPagamento($this->data_pagamento);

		$copyObj->setDataDocumento($this->data_documento);

		$copyObj->setDescricao($this->descricao);

		$copyObj->setValorDocumento($this->valor_documento);

		$copyObj->setValorRestante($this->valor_restante);

		$copyObj->setVencimento($this->vencimento);

		$copyObj->setDesconto($this->desconto);

		$copyObj->setObservacao($this->observacao);

		$copyObj->setMotivoDesconto($this->motivo_desconto);

		$copyObj->setSituacao($this->situacao);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getLancamentoCaixas() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addLancamentoCaixa($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getContasPagarsRelatedByContaPagarId() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addContasPagarRelatedByContaPagarId($relObj->copy($deepCopy));
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
	 * @return     ContasPagar Clone of current object.
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
	 * @return     ContasPagarPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ContasPagarPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a ContasPagar object.
	 *
	 * @param      ContasPagar $v
	 * @return     ContasPagar The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setContasPagarRelatedByContaPagarId(ContasPagar $v = null)
	{
		if ($v === null) {
			$this->setContaPagarId(NULL);
		} else {
			$this->setContaPagarId($v->getId());
		}

		$this->aContasPagarRelatedByContaPagarId = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the ContasPagar object, it will not be re-added.
		if ($v !== null) {
			$v->addContasPagarRelatedByContaPagarId($this);
		}

		return $this;
	}


	/**
	 * Get the associated ContasPagar object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     ContasPagar The associated ContasPagar object.
	 * @throws     PropelException
	 */
	public function getContasPagarRelatedByContaPagarId(PropelPDO $con = null)
	{
		if ($this->aContasPagarRelatedByContaPagarId === null && ($this->conta_pagar_id !== null)) {
			$this->aContasPagarRelatedByContaPagarId = ContasPagarPeer::retrieveByPk($this->conta_pagar_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aContasPagarRelatedByContaPagarId->addContasPagarsRelatedByContaPagarId($this);
			 */
		}
		return $this->aContasPagarRelatedByContaPagarId;
	}

	/**
	 * Declares an association between this object and a LancamentoCaixa object.
	 *
	 * @param      LancamentoCaixa $v
	 * @return     ContasPagar The current object (for fluent API support)
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
			$v->addContasPagar($this);
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
			   $this->aLancamentoCaixa->addContasPagars($this);
			 */
		}
		return $this->aLancamentoCaixa;
	}

	/**
	 * Declares an association between this object and a ContaContabil object.
	 *
	 * @param      ContaContabil $v
	 * @return     ContasPagar The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setContaContabil(ContaContabil $v = null)
	{
		if ($v === null) {
			$this->setContaContabilId(NULL);
		} else {
			$this->setContaContabilId($v->getId());
		}

		$this->aContaContabil = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the ContaContabil object, it will not be re-added.
		if ($v !== null) {
			$v->addContasPagar($this);
		}

		return $this;
	}


	/**
	 * Get the associated ContaContabil object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     ContaContabil The associated ContaContabil object.
	 * @throws     PropelException
	 */
	public function getContaContabil(PropelPDO $con = null)
	{
		if ($this->aContaContabil === null && ($this->conta_contabil_id !== null)) {
			$this->aContaContabil = ContaContabilPeer::retrieveByPk($this->conta_contabil_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aContaContabil->addContasPagars($this);
			 */
		}
		return $this->aContaContabil;
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
	 * Otherwise if this ContasPagar has previously been saved, it will retrieve
	 * related LancamentoCaixas from storage. If this ContasPagar is new, it will return
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
			$criteria = new Criteria(ContasPagarPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLancamentoCaixas === null) {
			if ($this->isNew()) {
			   $this->collLancamentoCaixas = array();
			} else {

				$criteria->add(LancamentoCaixaPeer::CONTA_PAGAR_ID, $this->id);

				LancamentoCaixaPeer::addSelectColumns($criteria);
				$this->collLancamentoCaixas = LancamentoCaixaPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(LancamentoCaixaPeer::CONTA_PAGAR_ID, $this->id);

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
			$criteria = new Criteria(ContasPagarPeer::DATABASE_NAME);
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

				$criteria->add(LancamentoCaixaPeer::CONTA_PAGAR_ID, $this->id);

				$count = LancamentoCaixaPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(LancamentoCaixaPeer::CONTA_PAGAR_ID, $this->id);

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
			$l->setContasPagar($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ContasPagar is new, it will return
	 * an empty collection; or if this ContasPagar has previously
	 * been saved, it will retrieve related LancamentoCaixas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ContasPagar.
	 */
	public function getLancamentoCaixasJoinContaContabil($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContasPagarPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLancamentoCaixas === null) {
			if ($this->isNew()) {
				$this->collLancamentoCaixas = array();
			} else {

				$criteria->add(LancamentoCaixaPeer::CONTA_PAGAR_ID, $this->id);

				$this->collLancamentoCaixas = LancamentoCaixaPeer::doSelectJoinContaContabil($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(LancamentoCaixaPeer::CONTA_PAGAR_ID, $this->id);

			if (!isset($this->lastLancamentoCaixaCriteria) || !$this->lastLancamentoCaixaCriteria->equals($criteria)) {
				$this->collLancamentoCaixas = LancamentoCaixaPeer::doSelectJoinContaContabil($criteria, $con, $join_behavior);
			}
		}
		$this->lastLancamentoCaixaCriteria = $criteria;

		return $this->collLancamentoCaixas;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ContasPagar is new, it will return
	 * an empty collection; or if this ContasPagar has previously
	 * been saved, it will retrieve related LancamentoCaixas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ContasPagar.
	 */
	public function getLancamentoCaixasJoinContasReceber($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContasPagarPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLancamentoCaixas === null) {
			if ($this->isNew()) {
				$this->collLancamentoCaixas = array();
			} else {

				$criteria->add(LancamentoCaixaPeer::CONTA_PAGAR_ID, $this->id);

				$this->collLancamentoCaixas = LancamentoCaixaPeer::doSelectJoinContasReceber($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(LancamentoCaixaPeer::CONTA_PAGAR_ID, $this->id);

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
	 * Otherwise if this ContasPagar is new, it will return
	 * an empty collection; or if this ContasPagar has previously
	 * been saved, it will retrieve related LancamentoCaixas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ContasPagar.
	 */
	public function getLancamentoCaixasJoinCaixa($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContasPagarPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLancamentoCaixas === null) {
			if ($this->isNew()) {
				$this->collLancamentoCaixas = array();
			} else {

				$criteria->add(LancamentoCaixaPeer::CONTA_PAGAR_ID, $this->id);

				$this->collLancamentoCaixas = LancamentoCaixaPeer::doSelectJoinCaixa($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(LancamentoCaixaPeer::CONTA_PAGAR_ID, $this->id);

			if (!isset($this->lastLancamentoCaixaCriteria) || !$this->lastLancamentoCaixaCriteria->equals($criteria)) {
				$this->collLancamentoCaixas = LancamentoCaixaPeer::doSelectJoinCaixa($criteria, $con, $join_behavior);
			}
		}
		$this->lastLancamentoCaixaCriteria = $criteria;

		return $this->collLancamentoCaixas;
	}

	/**
	 * Clears out the collContasPagarsRelatedByContaPagarId collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addContasPagarsRelatedByContaPagarId()
	 */
	public function clearContasPagarsRelatedByContaPagarId()
	{
		$this->collContasPagarsRelatedByContaPagarId = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collContasPagarsRelatedByContaPagarId collection (array).
	 *
	 * By default this just sets the collContasPagarsRelatedByContaPagarId collection to an empty array (like clearcollContasPagarsRelatedByContaPagarId());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initContasPagarsRelatedByContaPagarId()
	{
		$this->collContasPagarsRelatedByContaPagarId = array();
	}

	/**
	 * Gets an array of ContasPagar objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this ContasPagar has previously been saved, it will retrieve
	 * related ContasPagarsRelatedByContaPagarId from storage. If this ContasPagar is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ContasPagar[]
	 * @throws     PropelException
	 */
	public function getContasPagarsRelatedByContaPagarId($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContasPagarPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasPagarsRelatedByContaPagarId === null) {
			if ($this->isNew()) {
			   $this->collContasPagarsRelatedByContaPagarId = array();
			} else {

				$criteria->add(ContasPagarPeer::CONTA_PAGAR_ID, $this->id);

				ContasPagarPeer::addSelectColumns($criteria);
				$this->collContasPagarsRelatedByContaPagarId = ContasPagarPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ContasPagarPeer::CONTA_PAGAR_ID, $this->id);

				ContasPagarPeer::addSelectColumns($criteria);
				if (!isset($this->lastContasPagarRelatedByContaPagarIdCriteria) || !$this->lastContasPagarRelatedByContaPagarIdCriteria->equals($criteria)) {
					$this->collContasPagarsRelatedByContaPagarId = ContasPagarPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastContasPagarRelatedByContaPagarIdCriteria = $criteria;
		return $this->collContasPagarsRelatedByContaPagarId;
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
	public function countContasPagarsRelatedByContaPagarId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContasPagarPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collContasPagarsRelatedByContaPagarId === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ContasPagarPeer::CONTA_PAGAR_ID, $this->id);

				$count = ContasPagarPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ContasPagarPeer::CONTA_PAGAR_ID, $this->id);

				if (!isset($this->lastContasPagarRelatedByContaPagarIdCriteria) || !$this->lastContasPagarRelatedByContaPagarIdCriteria->equals($criteria)) {
					$count = ContasPagarPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collContasPagarsRelatedByContaPagarId);
				}
			} else {
				$count = count($this->collContasPagarsRelatedByContaPagarId);
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
	public function addContasPagarRelatedByContaPagarId(ContasPagar $l)
	{
		if ($this->collContasPagarsRelatedByContaPagarId === null) {
			$this->initContasPagarsRelatedByContaPagarId();
		}
		if (!in_array($l, $this->collContasPagarsRelatedByContaPagarId, true)) { // only add it if the **same** object is not already associated
			array_push($this->collContasPagarsRelatedByContaPagarId, $l);
			$l->setContasPagarRelatedByContaPagarId($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ContasPagar is new, it will return
	 * an empty collection; or if this ContasPagar has previously
	 * been saved, it will retrieve related ContasPagarsRelatedByContaPagarId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ContasPagar.
	 */
	public function getContasPagarsRelatedByContaPagarIdJoinLancamentoCaixa($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContasPagarPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasPagarsRelatedByContaPagarId === null) {
			if ($this->isNew()) {
				$this->collContasPagarsRelatedByContaPagarId = array();
			} else {

				$criteria->add(ContasPagarPeer::CONTA_PAGAR_ID, $this->id);

				$this->collContasPagarsRelatedByContaPagarId = ContasPagarPeer::doSelectJoinLancamentoCaixa($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContasPagarPeer::CONTA_PAGAR_ID, $this->id);

			if (!isset($this->lastContasPagarRelatedByContaPagarIdCriteria) || !$this->lastContasPagarRelatedByContaPagarIdCriteria->equals($criteria)) {
				$this->collContasPagarsRelatedByContaPagarId = ContasPagarPeer::doSelectJoinLancamentoCaixa($criteria, $con, $join_behavior);
			}
		}
		$this->lastContasPagarRelatedByContaPagarIdCriteria = $criteria;

		return $this->collContasPagarsRelatedByContaPagarId;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ContasPagar is new, it will return
	 * an empty collection; or if this ContasPagar has previously
	 * been saved, it will retrieve related ContasPagarsRelatedByContaPagarId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ContasPagar.
	 */
	public function getContasPagarsRelatedByContaPagarIdJoinContaContabil($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContasPagarPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContasPagarsRelatedByContaPagarId === null) {
			if ($this->isNew()) {
				$this->collContasPagarsRelatedByContaPagarId = array();
			} else {

				$criteria->add(ContasPagarPeer::CONTA_PAGAR_ID, $this->id);

				$this->collContasPagarsRelatedByContaPagarId = ContasPagarPeer::doSelectJoinContaContabil($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ContasPagarPeer::CONTA_PAGAR_ID, $this->id);

			if (!isset($this->lastContasPagarRelatedByContaPagarIdCriteria) || !$this->lastContasPagarRelatedByContaPagarIdCriteria->equals($criteria)) {
				$this->collContasPagarsRelatedByContaPagarId = ContasPagarPeer::doSelectJoinContaContabil($criteria, $con, $join_behavior);
			}
		}
		$this->lastContasPagarRelatedByContaPagarIdCriteria = $criteria;

		return $this->collContasPagarsRelatedByContaPagarId;
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
	 * Otherwise if this ContasPagar has previously been saved, it will retrieve
	 * related LancamentoContas from storage. If this ContasPagar is new, it will return
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
			$criteria = new Criteria(ContasPagarPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLancamentoContas === null) {
			if ($this->isNew()) {
			   $this->collLancamentoContas = array();
			} else {

				$criteria->add(LancamentoContaPeer::CONTA_PAGAR_ID, $this->id);

				LancamentoContaPeer::addSelectColumns($criteria);
				$this->collLancamentoContas = LancamentoContaPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(LancamentoContaPeer::CONTA_PAGAR_ID, $this->id);

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
			$criteria = new Criteria(ContasPagarPeer::DATABASE_NAME);
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

				$criteria->add(LancamentoContaPeer::CONTA_PAGAR_ID, $this->id);

				$count = LancamentoContaPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(LancamentoContaPeer::CONTA_PAGAR_ID, $this->id);

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
			$l->setContasPagar($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ContasPagar is new, it will return
	 * an empty collection; or if this ContasPagar has previously
	 * been saved, it will retrieve related LancamentoContas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ContasPagar.
	 */
	public function getLancamentoContasJoinContasReceber($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContasPagarPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLancamentoContas === null) {
			if ($this->isNew()) {
				$this->collLancamentoContas = array();
			} else {

				$criteria->add(LancamentoContaPeer::CONTA_PAGAR_ID, $this->id);

				$this->collLancamentoContas = LancamentoContaPeer::doSelectJoinContasReceber($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(LancamentoContaPeer::CONTA_PAGAR_ID, $this->id);

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
	 * Otherwise if this ContasPagar is new, it will return
	 * an empty collection; or if this ContasPagar has previously
	 * been saved, it will retrieve related LancamentoContas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ContasPagar.
	 */
	public function getLancamentoContasJoinContaBancaria($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContasPagarPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLancamentoContas === null) {
			if ($this->isNew()) {
				$this->collLancamentoContas = array();
			} else {

				$criteria->add(LancamentoContaPeer::CONTA_PAGAR_ID, $this->id);

				$this->collLancamentoContas = LancamentoContaPeer::doSelectJoinContaBancaria($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(LancamentoContaPeer::CONTA_PAGAR_ID, $this->id);

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
	 * Otherwise if this ContasPagar is new, it will return
	 * an empty collection; or if this ContasPagar has previously
	 * been saved, it will retrieve related LancamentoContas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ContasPagar.
	 */
	public function getLancamentoContasJoinContaContabil($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContasPagarPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLancamentoContas === null) {
			if ($this->isNew()) {
				$this->collLancamentoContas = array();
			} else {

				$criteria->add(LancamentoContaPeer::CONTA_PAGAR_ID, $this->id);

				$this->collLancamentoContas = LancamentoContaPeer::doSelectJoinContaContabil($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(LancamentoContaPeer::CONTA_PAGAR_ID, $this->id);

			if (!isset($this->lastLancamentoContaCriteria) || !$this->lastLancamentoContaCriteria->equals($criteria)) {
				$this->collLancamentoContas = LancamentoContaPeer::doSelectJoinContaContabil($criteria, $con, $join_behavior);
			}
		}
		$this->lastLancamentoContaCriteria = $criteria;

		return $this->collLancamentoContas;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this ContasPagar is new, it will return
	 * an empty collection; or if this ContasPagar has previously
	 * been saved, it will retrieve related LancamentoContas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in ContasPagar.
	 */
	public function getLancamentoContasJoinLocal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ContasPagarPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLancamentoContas === null) {
			if ($this->isNew()) {
				$this->collLancamentoContas = array();
			} else {

				$criteria->add(LancamentoContaPeer::CONTA_PAGAR_ID, $this->id);

				$this->collLancamentoContas = LancamentoContaPeer::doSelectJoinLocal($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(LancamentoContaPeer::CONTA_PAGAR_ID, $this->id);

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
			if ($this->collContasPagarsRelatedByContaPagarId) {
				foreach ((array) $this->collContasPagarsRelatedByContaPagarId as $o) {
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
		$this->collContasPagarsRelatedByContaPagarId = null;
		$this->collLancamentoContas = null;
			$this->aContasPagarRelatedByContaPagarId = null;
			$this->aLancamentoCaixa = null;
			$this->aContaContabil = null;
	}

} // BaseContasPagar
