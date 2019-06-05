<?php

/**
 * Base class that represents a row from the 'parceiro_comissionamento' table.
 *
 * 
 *
 * @package    pacoteParceiro.om
 */
abstract class BaseParceiroComissionamento extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ParceiroComissionamentoPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the descricao field.
	 * @var        string
	 */
	protected $descricao;

	/**
	 * The value for the parceiro_id field.
	 * @var        int
	 */
	protected $parceiro_id;

	/**
	 * The value for the data_registro field.
	 * @var        string
	 */
	protected $data_registro;

	/**
	 * The value for the data_pagamento field.
	 * @var        string
	 */
	protected $data_pagamento;

	/**
	 * The value for the periodo_inicial field.
	 * @var        string
	 */
	protected $periodo_inicial;

	/**
	 * The value for the periodo_final field.
	 * @var        string
	 */
	protected $periodo_final;

	/**
	 * The value for the venda_validacao field.
	 * @var        double
	 */
	protected $venda_validacao;

	/**
	 * The value for the venda field.
	 * @var        double
	 */
	protected $venda;

	/**
	 * The value for the validacao field.
	 * @var        double
	 */
	protected $validacao;

	/**
	 * The value for the comissao_venda field.
	 * @var        int
	 */
	protected $comissao_venda;

	/**
	 * The value for the comissao_validacao field.
	 * @var        int
	 */
	protected $comissao_validacao;

	/**
	 * The value for the comissao_venda_validacao field.
	 * @var        int
	 */
	protected $comissao_venda_validacao;

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
	 * @var        Parceiro
	 */
	protected $aParceiro;

	/**
	 * @var        array ParceiroLancamento[] Collection to store aggregation of ParceiroLancamento objects.
	 */
	protected $collParceiroLancamentos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collParceiroLancamentos.
	 */
	private $lastParceiroLancamentoCriteria = null;

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
	 * Get the [descricao] column value.
	 * 
	 * @return     string
	 */
	public function getDescricao()
	{
		return $this->descricao;
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
	 * Get the [optionally formatted] temporal [data_registro] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataRegistro($format = 'Y-m-d H:i:s')
	{
		if ($this->data_registro === null) {
			return null;
		}


		if ($this->data_registro === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_registro);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_registro, true), $x);
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
	 * Get the [optionally formatted] temporal [periodo_inicial] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getPeriodoInicial($format = 'Y-m-d H:i:s')
	{
		if ($this->periodo_inicial === null) {
			return null;
		}


		if ($this->periodo_inicial === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->periodo_inicial);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->periodo_inicial, true), $x);
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
	 * Get the [optionally formatted] temporal [periodo_final] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getPeriodoFinal($format = 'Y-m-d H:i:s')
	{
		if ($this->periodo_final === null) {
			return null;
		}


		if ($this->periodo_final === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->periodo_final);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->periodo_final, true), $x);
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
	 * Get the [venda_validacao] column value.
	 * 
	 * @return     double
	 */
	public function getVendaValidacao()
	{
		return $this->venda_validacao;
	}

	/**
	 * Get the [venda] column value.
	 * 
	 * @return     double
	 */
	public function getVenda()
	{
		return $this->venda;
	}

	/**
	 * Get the [validacao] column value.
	 * 
	 * @return     double
	 */
	public function getValidacao()
	{
		return $this->validacao;
	}

	/**
	 * Get the [comissao_venda] column value.
	 * 
	 * @return     int
	 */
	public function getComissaoVenda()
	{
		return $this->comissao_venda;
	}

	/**
	 * Get the [comissao_validacao] column value.
	 * 
	 * @return     int
	 */
	public function getComissaoValidacao()
	{
		return $this->comissao_validacao;
	}

	/**
	 * Get the [comissao_venda_validacao] column value.
	 * 
	 * @return     int
	 */
	public function getComissaoVendaValidacao()
	{
		return $this->comissao_venda_validacao;
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
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     ParceiroComissionamento The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ParceiroComissionamentoPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [descricao] column.
	 * 
	 * @param      string $v new value
	 * @return     ParceiroComissionamento The current object (for fluent API support)
	 */
	public function setDescricao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->descricao !== $v) {
			$this->descricao = $v;
			$this->modifiedColumns[] = ParceiroComissionamentoPeer::DESCRICAO;
		}

		return $this;
	} // setDescricao()

	/**
	 * Set the value of [parceiro_id] column.
	 * 
	 * @param      int $v new value
	 * @return     ParceiroComissionamento The current object (for fluent API support)
	 */
	public function setParceiroId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->parceiro_id !== $v) {
			$this->parceiro_id = $v;
			$this->modifiedColumns[] = ParceiroComissionamentoPeer::PARCEIRO_ID;
		}

		if ($this->aParceiro !== null && $this->aParceiro->getId() !== $v) {
			$this->aParceiro = null;
		}

		return $this;
	} // setParceiroId()

	/**
	 * Sets the value of [data_registro] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     ParceiroComissionamento The current object (for fluent API support)
	 */
	public function setDataRegistro($v)
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

		if ( $this->data_registro !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_registro !== null && $tmpDt = new DateTime($this->data_registro)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_registro = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = ParceiroComissionamentoPeer::DATA_REGISTRO;
			}
		} // if either are not null

		return $this;
	} // setDataRegistro()

	/**
	 * Sets the value of [data_pagamento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     ParceiroComissionamento The current object (for fluent API support)
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
				$this->modifiedColumns[] = ParceiroComissionamentoPeer::DATA_PAGAMENTO;
			}
		} // if either are not null

		return $this;
	} // setDataPagamento()

	/**
	 * Sets the value of [periodo_inicial] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     ParceiroComissionamento The current object (for fluent API support)
	 */
	public function setPeriodoInicial($v)
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

		if ( $this->periodo_inicial !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->periodo_inicial !== null && $tmpDt = new DateTime($this->periodo_inicial)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->periodo_inicial = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = ParceiroComissionamentoPeer::PERIODO_INICIAL;
			}
		} // if either are not null

		return $this;
	} // setPeriodoInicial()

	/**
	 * Sets the value of [periodo_final] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     ParceiroComissionamento The current object (for fluent API support)
	 */
	public function setPeriodoFinal($v)
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

		if ( $this->periodo_final !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->periodo_final !== null && $tmpDt = new DateTime($this->periodo_final)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->periodo_final = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = ParceiroComissionamentoPeer::PERIODO_FINAL;
			}
		} // if either are not null

		return $this;
	} // setPeriodoFinal()

	/**
	 * Set the value of [venda_validacao] column.
	 * 
	 * @param      double $v new value
	 * @return     ParceiroComissionamento The current object (for fluent API support)
	 */
	public function setVendaValidacao($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->venda_validacao !== $v) {
			$this->venda_validacao = $v;
			$this->modifiedColumns[] = ParceiroComissionamentoPeer::VENDA_VALIDACAO;
		}

		return $this;
	} // setVendaValidacao()

	/**
	 * Set the value of [venda] column.
	 * 
	 * @param      double $v new value
	 * @return     ParceiroComissionamento The current object (for fluent API support)
	 */
	public function setVenda($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->venda !== $v) {
			$this->venda = $v;
			$this->modifiedColumns[] = ParceiroComissionamentoPeer::VENDA;
		}

		return $this;
	} // setVenda()

	/**
	 * Set the value of [validacao] column.
	 * 
	 * @param      double $v new value
	 * @return     ParceiroComissionamento The current object (for fluent API support)
	 */
	public function setValidacao($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->validacao !== $v) {
			$this->validacao = $v;
			$this->modifiedColumns[] = ParceiroComissionamentoPeer::VALIDACAO;
		}

		return $this;
	} // setValidacao()

	/**
	 * Set the value of [comissao_venda] column.
	 * 
	 * @param      int $v new value
	 * @return     ParceiroComissionamento The current object (for fluent API support)
	 */
	public function setComissaoVenda($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->comissao_venda !== $v) {
			$this->comissao_venda = $v;
			$this->modifiedColumns[] = ParceiroComissionamentoPeer::COMISSAO_VENDA;
		}

		return $this;
	} // setComissaoVenda()

	/**
	 * Set the value of [comissao_validacao] column.
	 * 
	 * @param      int $v new value
	 * @return     ParceiroComissionamento The current object (for fluent API support)
	 */
	public function setComissaoValidacao($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->comissao_validacao !== $v) {
			$this->comissao_validacao = $v;
			$this->modifiedColumns[] = ParceiroComissionamentoPeer::COMISSAO_VALIDACAO;
		}

		return $this;
	} // setComissaoValidacao()

	/**
	 * Set the value of [comissao_venda_validacao] column.
	 * 
	 * @param      int $v new value
	 * @return     ParceiroComissionamento The current object (for fluent API support)
	 */
	public function setComissaoVendaValidacao($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->comissao_venda_validacao !== $v) {
			$this->comissao_venda_validacao = $v;
			$this->modifiedColumns[] = ParceiroComissionamentoPeer::COMISSAO_VENDA_VALIDACAO;
		}

		return $this;
	} // setComissaoVendaValidacao()

	/**
	 * Set the value of [observacao] column.
	 * 
	 * @param      string $v new value
	 * @return     ParceiroComissionamento The current object (for fluent API support)
	 */
	public function setObservacao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->observacao !== $v) {
			$this->observacao = $v;
			$this->modifiedColumns[] = ParceiroComissionamentoPeer::OBSERVACAO;
		}

		return $this;
	} // setObservacao()

	/**
	 * Set the value of [situacao] column.
	 * 
	 * @param      int $v new value
	 * @return     ParceiroComissionamento The current object (for fluent API support)
	 */
	public function setSituacao($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->situacao !== $v) {
			$this->situacao = $v;
			$this->modifiedColumns[] = ParceiroComissionamentoPeer::SITUACAO;
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
			$this->descricao = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->parceiro_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->data_registro = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->data_pagamento = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->periodo_inicial = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->periodo_final = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->venda_validacao = ($row[$startcol + 7] !== null) ? (double) $row[$startcol + 7] : null;
			$this->venda = ($row[$startcol + 8] !== null) ? (double) $row[$startcol + 8] : null;
			$this->validacao = ($row[$startcol + 9] !== null) ? (double) $row[$startcol + 9] : null;
			$this->comissao_venda = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
			$this->comissao_validacao = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
			$this->comissao_venda_validacao = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
			$this->observacao = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->situacao = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 15; // 15 = ParceiroComissionamentoPeer::NUM_COLUMNS - ParceiroComissionamentoPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating ParceiroComissionamento object", $e);
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

		if ($this->aParceiro !== null && $this->parceiro_id !== $this->aParceiro->getId()) {
			$this->aParceiro = null;
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
			$con = Propel::getConnection(ParceiroComissionamentoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ParceiroComissionamentoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aParceiro = null;
			$this->collParceiroLancamentos = null;
			$this->lastParceiroLancamentoCriteria = null;

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
			$con = Propel::getConnection(ParceiroComissionamentoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				ParceiroComissionamentoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ParceiroComissionamentoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				ParceiroComissionamentoPeer::addInstanceToPool($this);
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

			if ($this->isNew() ) {
				$this->modifiedColumns[] = ParceiroComissionamentoPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ParceiroComissionamentoPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += ParceiroComissionamentoPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collParceiroLancamentos !== null) {
				foreach ($this->collParceiroLancamentos as $referrerFK) {
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

			if ($this->aParceiro !== null) {
				if (!$this->aParceiro->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aParceiro->getValidationFailures());
				}
			}


			if (($retval = ParceiroComissionamentoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collParceiroLancamentos !== null) {
					foreach ($this->collParceiroLancamentos as $referrerFK) {
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
		$criteria = new Criteria(ParceiroComissionamentoPeer::DATABASE_NAME);

		if ($this->isColumnModified(ParceiroComissionamentoPeer::ID)) $criteria->add(ParceiroComissionamentoPeer::ID, $this->id);
		if ($this->isColumnModified(ParceiroComissionamentoPeer::DESCRICAO)) $criteria->add(ParceiroComissionamentoPeer::DESCRICAO, $this->descricao);
		if ($this->isColumnModified(ParceiroComissionamentoPeer::PARCEIRO_ID)) $criteria->add(ParceiroComissionamentoPeer::PARCEIRO_ID, $this->parceiro_id);
		if ($this->isColumnModified(ParceiroComissionamentoPeer::DATA_REGISTRO)) $criteria->add(ParceiroComissionamentoPeer::DATA_REGISTRO, $this->data_registro);
		if ($this->isColumnModified(ParceiroComissionamentoPeer::DATA_PAGAMENTO)) $criteria->add(ParceiroComissionamentoPeer::DATA_PAGAMENTO, $this->data_pagamento);
		if ($this->isColumnModified(ParceiroComissionamentoPeer::PERIODO_INICIAL)) $criteria->add(ParceiroComissionamentoPeer::PERIODO_INICIAL, $this->periodo_inicial);
		if ($this->isColumnModified(ParceiroComissionamentoPeer::PERIODO_FINAL)) $criteria->add(ParceiroComissionamentoPeer::PERIODO_FINAL, $this->periodo_final);
		if ($this->isColumnModified(ParceiroComissionamentoPeer::VENDA_VALIDACAO)) $criteria->add(ParceiroComissionamentoPeer::VENDA_VALIDACAO, $this->venda_validacao);
		if ($this->isColumnModified(ParceiroComissionamentoPeer::VENDA)) $criteria->add(ParceiroComissionamentoPeer::VENDA, $this->venda);
		if ($this->isColumnModified(ParceiroComissionamentoPeer::VALIDACAO)) $criteria->add(ParceiroComissionamentoPeer::VALIDACAO, $this->validacao);
		if ($this->isColumnModified(ParceiroComissionamentoPeer::COMISSAO_VENDA)) $criteria->add(ParceiroComissionamentoPeer::COMISSAO_VENDA, $this->comissao_venda);
		if ($this->isColumnModified(ParceiroComissionamentoPeer::COMISSAO_VALIDACAO)) $criteria->add(ParceiroComissionamentoPeer::COMISSAO_VALIDACAO, $this->comissao_validacao);
		if ($this->isColumnModified(ParceiroComissionamentoPeer::COMISSAO_VENDA_VALIDACAO)) $criteria->add(ParceiroComissionamentoPeer::COMISSAO_VENDA_VALIDACAO, $this->comissao_venda_validacao);
		if ($this->isColumnModified(ParceiroComissionamentoPeer::OBSERVACAO)) $criteria->add(ParceiroComissionamentoPeer::OBSERVACAO, $this->observacao);
		if ($this->isColumnModified(ParceiroComissionamentoPeer::SITUACAO)) $criteria->add(ParceiroComissionamentoPeer::SITUACAO, $this->situacao);

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
		$criteria = new Criteria(ParceiroComissionamentoPeer::DATABASE_NAME);

		$criteria->add(ParceiroComissionamentoPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of ParceiroComissionamento (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDescricao($this->descricao);

		$copyObj->setParceiroId($this->parceiro_id);

		$copyObj->setDataRegistro($this->data_registro);

		$copyObj->setDataPagamento($this->data_pagamento);

		$copyObj->setPeriodoInicial($this->periodo_inicial);

		$copyObj->setPeriodoFinal($this->periodo_final);

		$copyObj->setVendaValidacao($this->venda_validacao);

		$copyObj->setVenda($this->venda);

		$copyObj->setValidacao($this->validacao);

		$copyObj->setComissaoVenda($this->comissao_venda);

		$copyObj->setComissaoValidacao($this->comissao_validacao);

		$copyObj->setComissaoVendaValidacao($this->comissao_venda_validacao);

		$copyObj->setObservacao($this->observacao);

		$copyObj->setSituacao($this->situacao);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getParceiroLancamentos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addParceiroLancamento($relObj->copy($deepCopy));
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
	 * @return     ParceiroComissionamento Clone of current object.
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
	 * @return     ParceiroComissionamentoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ParceiroComissionamentoPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Parceiro object.
	 *
	 * @param      Parceiro $v
	 * @return     ParceiroComissionamento The current object (for fluent API support)
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
			$v->addParceiroComissionamento($this);
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
			   $this->aParceiro->addParceiroComissionamentos($this);
			 */
		}
		return $this->aParceiro;
	}

	/**
	 * Clears out the collParceiroLancamentos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addParceiroLancamentos()
	 */
	public function clearParceiroLancamentos()
	{
		$this->collParceiroLancamentos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collParceiroLancamentos collection (array).
	 *
	 * By default this just sets the collParceiroLancamentos collection to an empty array (like clearcollParceiroLancamentos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initParceiroLancamentos()
	{
		$this->collParceiroLancamentos = array();
	}

	/**
	 * Gets an array of ParceiroLancamento objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this ParceiroComissionamento has previously been saved, it will retrieve
	 * related ParceiroLancamentos from storage. If this ParceiroComissionamento is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ParceiroLancamento[]
	 * @throws     PropelException
	 */
	public function getParceiroLancamentos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ParceiroComissionamentoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collParceiroLancamentos === null) {
			if ($this->isNew()) {
			   $this->collParceiroLancamentos = array();
			} else {

				$criteria->add(ParceiroLancamentoPeer::PARCEIRO_COMISSIONAMENTO_ID, $this->id);

				ParceiroLancamentoPeer::addSelectColumns($criteria);
				$this->collParceiroLancamentos = ParceiroLancamentoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ParceiroLancamentoPeer::PARCEIRO_COMISSIONAMENTO_ID, $this->id);

				ParceiroLancamentoPeer::addSelectColumns($criteria);
				if (!isset($this->lastParceiroLancamentoCriteria) || !$this->lastParceiroLancamentoCriteria->equals($criteria)) {
					$this->collParceiroLancamentos = ParceiroLancamentoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastParceiroLancamentoCriteria = $criteria;
		return $this->collParceiroLancamentos;
	}

	/**
	 * Returns the number of related ParceiroLancamento objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ParceiroLancamento objects.
	 * @throws     PropelException
	 */
	public function countParceiroLancamentos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ParceiroComissionamentoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collParceiroLancamentos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ParceiroLancamentoPeer::PARCEIRO_COMISSIONAMENTO_ID, $this->id);

				$count = ParceiroLancamentoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ParceiroLancamentoPeer::PARCEIRO_COMISSIONAMENTO_ID, $this->id);

				if (!isset($this->lastParceiroLancamentoCriteria) || !$this->lastParceiroLancamentoCriteria->equals($criteria)) {
					$count = ParceiroLancamentoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collParceiroLancamentos);
				}
			} else {
				$count = count($this->collParceiroLancamentos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a ParceiroLancamento object to this object
	 * through the ParceiroLancamento foreign key attribute.
	 *
	 * @param      ParceiroLancamento $l ParceiroLancamento
	 * @return     void
	 * @throws     PropelException
	 */
	public function addParceiroLancamento(ParceiroLancamento $l)
	{
		if ($this->collParceiroLancamentos === null) {
			$this->initParceiroLancamentos();
		}
		if (!in_array($l, $this->collParceiroLancamentos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collParceiroLancamentos, $l);
			$l->setParceiroComissionamento($this);
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
			if ($this->collParceiroLancamentos) {
				foreach ((array) $this->collParceiroLancamentos as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collParceiroLancamentos = null;
			$this->aParceiro = null;
	}

} // BaseParceiroComissionamento
