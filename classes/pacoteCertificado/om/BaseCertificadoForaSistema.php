<?php

/**
 * Base class that represents a row from the 'certificado_fora_sistema' table.
 *
 * 
 *
 * @package    pacoteCertificado.om
 */
abstract class BaseCertificadoForaSistema extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        CertificadoForaSistemaPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the protocolo field.
	 * @var        int
	 */
	protected $protocolo;

	/**
	 * The value for the documento field.
	 * @var        string
	 */
	protected $documento;

	/**
	 * The value for the razao field.
	 * @var        string
	 */
	protected $razao;

	/**
	 * The value for the status field.
	 * @var        string
	 */
	protected $status;

	/**
	 * The value for the produto field.
	 * @var        string
	 */
	protected $produto;

	/**
	 * The value for the local field.
	 * @var        string
	 */
	protected $local;

	/**
	 * The value for the ar field.
	 * @var        string
	 */
	protected $ar;

	/**
	 * The value for the cpf_ar field.
	 * @var        string
	 */
	protected $cpf_ar;

	/**
	 * The value for the valor field.
	 * @var        string
	 */
	protected $valor;

	/**
	 * The value for the data_avp field.
	 * @var        string
	 */
	protected $data_avp;

	/**
	 * The value for the data_validacao field.
	 * @var        string
	 */
	protected $data_validacao;

	/**
	 * The value for the data_importacao field.
	 * @var        string
	 */
	protected $data_importacao;

	/**
	 * The value for the data_mes_referente field.
	 * @var        int
	 */
	protected $data_mes_referente;

	/**
	 * The value for the email_cliente field.
	 * @var        string
	 */
	protected $email_cliente;

	/**
	 * The value for the telefone_cliente field.
	 * @var        string
	 */
	protected $telefone_cliente;

	/**
	 * The value for the situacao field.
	 * @var        int
	 */
	protected $situacao;

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
	 * Get the [protocolo] column value.
	 * 
	 * @return     int
	 */
	public function getProtocolo()
	{
		return $this->protocolo;
	}

	/**
	 * Get the [documento] column value.
	 * 
	 * @return     string
	 */
	public function getDocumento()
	{
		return $this->documento;
	}

	/**
	 * Get the [razao] column value.
	 * 
	 * @return     string
	 */
	public function getRazao()
	{
		return $this->razao;
	}

	/**
	 * Get the [status] column value.
	 * 
	 * @return     string
	 */
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * Get the [produto] column value.
	 * 
	 * @return     string
	 */
	public function getProduto()
	{
		return $this->produto;
	}

	/**
	 * Get the [local] column value.
	 * 
	 * @return     string
	 */
	public function getLocal()
	{
		return $this->local;
	}

	/**
	 * Get the [ar] column value.
	 * 
	 * @return     string
	 */
	public function getAr()
	{
		return $this->ar;
	}

	/**
	 * Get the [cpf_ar] column value.
	 * 
	 * @return     string
	 */
	public function getCpfAr()
	{
		return $this->cpf_ar;
	}

	/**
	 * Get the [valor] column value.
	 * 
	 * @return     string
	 */
	public function getValor()
	{
		return $this->valor;
	}

	/**
	 * Get the [optionally formatted] temporal [data_avp] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataAvp($format = 'Y-m-d H:i:s')
	{
		if ($this->data_avp === null) {
			return null;
		}


		if ($this->data_avp === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_avp);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_avp, true), $x);
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
	 * Get the [optionally formatted] temporal [data_validacao] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataValidacao($format = 'Y-m-d H:i:s')
	{
		if ($this->data_validacao === null) {
			return null;
		}


		if ($this->data_validacao === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_validacao);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_validacao, true), $x);
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
	 * Get the [optionally formatted] temporal [data_importacao] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataImportacao($format = 'Y-m-d H:i:s')
	{
		if ($this->data_importacao === null) {
			return null;
		}


		if ($this->data_importacao === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_importacao);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_importacao, true), $x);
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
	 * Get the [data_mes_referente] column value.
	 * 
	 * @return     int
	 */
	public function getDataMesReferente()
	{
		return $this->data_mes_referente;
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
	 * Get the [telefone_cliente] column value.
	 * 
	 * @return     string
	 */
	public function getTelefoneCliente()
	{
		return $this->telefone_cliente;
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
	 * @return     CertificadoForaSistema The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CertificadoForaSistemaPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [protocolo] column.
	 * 
	 * @param      int $v new value
	 * @return     CertificadoForaSistema The current object (for fluent API support)
	 */
	public function setProtocolo($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->protocolo !== $v) {
			$this->protocolo = $v;
			$this->modifiedColumns[] = CertificadoForaSistemaPeer::PROTOCOLO;
		}

		return $this;
	} // setProtocolo()

	/**
	 * Set the value of [documento] column.
	 * 
	 * @param      string $v new value
	 * @return     CertificadoForaSistema The current object (for fluent API support)
	 */
	public function setDocumento($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->documento !== $v) {
			$this->documento = $v;
			$this->modifiedColumns[] = CertificadoForaSistemaPeer::DOCUMENTO;
		}

		return $this;
	} // setDocumento()

	/**
	 * Set the value of [razao] column.
	 * 
	 * @param      string $v new value
	 * @return     CertificadoForaSistema The current object (for fluent API support)
	 */
	public function setRazao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->razao !== $v) {
			$this->razao = $v;
			$this->modifiedColumns[] = CertificadoForaSistemaPeer::RAZAO;
		}

		return $this;
	} // setRazao()

	/**
	 * Set the value of [status] column.
	 * 
	 * @param      string $v new value
	 * @return     CertificadoForaSistema The current object (for fluent API support)
	 */
	public function setStatus($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = CertificadoForaSistemaPeer::STATUS;
		}

		return $this;
	} // setStatus()

	/**
	 * Set the value of [produto] column.
	 * 
	 * @param      string $v new value
	 * @return     CertificadoForaSistema The current object (for fluent API support)
	 */
	public function setProduto($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->produto !== $v) {
			$this->produto = $v;
			$this->modifiedColumns[] = CertificadoForaSistemaPeer::PRODUTO;
		}

		return $this;
	} // setProduto()

	/**
	 * Set the value of [local] column.
	 * 
	 * @param      string $v new value
	 * @return     CertificadoForaSistema The current object (for fluent API support)
	 */
	public function setLocal($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->local !== $v) {
			$this->local = $v;
			$this->modifiedColumns[] = CertificadoForaSistemaPeer::LOCAL;
		}

		return $this;
	} // setLocal()

	/**
	 * Set the value of [ar] column.
	 * 
	 * @param      string $v new value
	 * @return     CertificadoForaSistema The current object (for fluent API support)
	 */
	public function setAr($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->ar !== $v) {
			$this->ar = $v;
			$this->modifiedColumns[] = CertificadoForaSistemaPeer::AR;
		}

		return $this;
	} // setAr()

	/**
	 * Set the value of [cpf_ar] column.
	 * 
	 * @param      string $v new value
	 * @return     CertificadoForaSistema The current object (for fluent API support)
	 */
	public function setCpfAr($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cpf_ar !== $v) {
			$this->cpf_ar = $v;
			$this->modifiedColumns[] = CertificadoForaSistemaPeer::CPF_AR;
		}

		return $this;
	} // setCpfAr()

	/**
	 * Set the value of [valor] column.
	 * 
	 * @param      string $v new value
	 * @return     CertificadoForaSistema The current object (for fluent API support)
	 */
	public function setValor($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->valor !== $v) {
			$this->valor = $v;
			$this->modifiedColumns[] = CertificadoForaSistemaPeer::VALOR;
		}

		return $this;
	} // setValor()

	/**
	 * Sets the value of [data_avp] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     CertificadoForaSistema The current object (for fluent API support)
	 */
	public function setDataAvp($v)
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

		if ( $this->data_avp !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_avp !== null && $tmpDt = new DateTime($this->data_avp)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_avp = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = CertificadoForaSistemaPeer::DATA_AVP;
			}
		} // if either are not null

		return $this;
	} // setDataAvp()

	/**
	 * Sets the value of [data_validacao] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     CertificadoForaSistema The current object (for fluent API support)
	 */
	public function setDataValidacao($v)
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

		if ( $this->data_validacao !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_validacao !== null && $tmpDt = new DateTime($this->data_validacao)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_validacao = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = CertificadoForaSistemaPeer::DATA_VALIDACAO;
			}
		} // if either are not null

		return $this;
	} // setDataValidacao()

	/**
	 * Sets the value of [data_importacao] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     CertificadoForaSistema The current object (for fluent API support)
	 */
	public function setDataImportacao($v)
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

		if ( $this->data_importacao !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_importacao !== null && $tmpDt = new DateTime($this->data_importacao)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_importacao = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = CertificadoForaSistemaPeer::DATA_IMPORTACAO;
			}
		} // if either are not null

		return $this;
	} // setDataImportacao()

	/**
	 * Set the value of [data_mes_referente] column.
	 * 
	 * @param      int $v new value
	 * @return     CertificadoForaSistema The current object (for fluent API support)
	 */
	public function setDataMesReferente($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->data_mes_referente !== $v) {
			$this->data_mes_referente = $v;
			$this->modifiedColumns[] = CertificadoForaSistemaPeer::DATA_MES_REFERENTE;
		}

		return $this;
	} // setDataMesReferente()

	/**
	 * Set the value of [email_cliente] column.
	 * 
	 * @param      string $v new value
	 * @return     CertificadoForaSistema The current object (for fluent API support)
	 */
	public function setEmailCliente($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email_cliente !== $v) {
			$this->email_cliente = $v;
			$this->modifiedColumns[] = CertificadoForaSistemaPeer::EMAIL_CLIENTE;
		}

		return $this;
	} // setEmailCliente()

	/**
	 * Set the value of [telefone_cliente] column.
	 * 
	 * @param      string $v new value
	 * @return     CertificadoForaSistema The current object (for fluent API support)
	 */
	public function setTelefoneCliente($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->telefone_cliente !== $v) {
			$this->telefone_cliente = $v;
			$this->modifiedColumns[] = CertificadoForaSistemaPeer::TELEFONE_CLIENTE;
		}

		return $this;
	} // setTelefoneCliente()

	/**
	 * Set the value of [situacao] column.
	 * 
	 * @param      int $v new value
	 * @return     CertificadoForaSistema The current object (for fluent API support)
	 */
	public function setSituacao($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->situacao !== $v) {
			$this->situacao = $v;
			$this->modifiedColumns[] = CertificadoForaSistemaPeer::SITUACAO;
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
			$this->protocolo = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->documento = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->razao = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->status = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->produto = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->local = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->ar = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->cpf_ar = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->valor = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->data_avp = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->data_validacao = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->data_importacao = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->data_mes_referente = ($row[$startcol + 13] !== null) ? (int) $row[$startcol + 13] : null;
			$this->email_cliente = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->telefone_cliente = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
			$this->situacao = ($row[$startcol + 16] !== null) ? (int) $row[$startcol + 16] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 17; // 17 = CertificadoForaSistemaPeer::NUM_COLUMNS - CertificadoForaSistemaPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating CertificadoForaSistema object", $e);
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
			$con = Propel::getConnection(CertificadoForaSistemaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = CertificadoForaSistemaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

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
			$con = Propel::getConnection(CertificadoForaSistemaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				CertificadoForaSistemaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CertificadoForaSistemaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				CertificadoForaSistemaPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = CertificadoForaSistemaPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CertificadoForaSistemaPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += CertificadoForaSistemaPeer::doUpdate($this, $con);
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


			if (($retval = CertificadoForaSistemaPeer::doValidate($this, $columns)) !== true) {
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
		$criteria = new Criteria(CertificadoForaSistemaPeer::DATABASE_NAME);

		if ($this->isColumnModified(CertificadoForaSistemaPeer::ID)) $criteria->add(CertificadoForaSistemaPeer::ID, $this->id);
		if ($this->isColumnModified(CertificadoForaSistemaPeer::PROTOCOLO)) $criteria->add(CertificadoForaSistemaPeer::PROTOCOLO, $this->protocolo);
		if ($this->isColumnModified(CertificadoForaSistemaPeer::DOCUMENTO)) $criteria->add(CertificadoForaSistemaPeer::DOCUMENTO, $this->documento);
		if ($this->isColumnModified(CertificadoForaSistemaPeer::RAZAO)) $criteria->add(CertificadoForaSistemaPeer::RAZAO, $this->razao);
		if ($this->isColumnModified(CertificadoForaSistemaPeer::STATUS)) $criteria->add(CertificadoForaSistemaPeer::STATUS, $this->status);
		if ($this->isColumnModified(CertificadoForaSistemaPeer::PRODUTO)) $criteria->add(CertificadoForaSistemaPeer::PRODUTO, $this->produto);
		if ($this->isColumnModified(CertificadoForaSistemaPeer::LOCAL)) $criteria->add(CertificadoForaSistemaPeer::LOCAL, $this->local);
		if ($this->isColumnModified(CertificadoForaSistemaPeer::AR)) $criteria->add(CertificadoForaSistemaPeer::AR, $this->ar);
		if ($this->isColumnModified(CertificadoForaSistemaPeer::CPF_AR)) $criteria->add(CertificadoForaSistemaPeer::CPF_AR, $this->cpf_ar);
		if ($this->isColumnModified(CertificadoForaSistemaPeer::VALOR)) $criteria->add(CertificadoForaSistemaPeer::VALOR, $this->valor);
		if ($this->isColumnModified(CertificadoForaSistemaPeer::DATA_AVP)) $criteria->add(CertificadoForaSistemaPeer::DATA_AVP, $this->data_avp);
		if ($this->isColumnModified(CertificadoForaSistemaPeer::DATA_VALIDACAO)) $criteria->add(CertificadoForaSistemaPeer::DATA_VALIDACAO, $this->data_validacao);
		if ($this->isColumnModified(CertificadoForaSistemaPeer::DATA_IMPORTACAO)) $criteria->add(CertificadoForaSistemaPeer::DATA_IMPORTACAO, $this->data_importacao);
		if ($this->isColumnModified(CertificadoForaSistemaPeer::DATA_MES_REFERENTE)) $criteria->add(CertificadoForaSistemaPeer::DATA_MES_REFERENTE, $this->data_mes_referente);
		if ($this->isColumnModified(CertificadoForaSistemaPeer::EMAIL_CLIENTE)) $criteria->add(CertificadoForaSistemaPeer::EMAIL_CLIENTE, $this->email_cliente);
		if ($this->isColumnModified(CertificadoForaSistemaPeer::TELEFONE_CLIENTE)) $criteria->add(CertificadoForaSistemaPeer::TELEFONE_CLIENTE, $this->telefone_cliente);
		if ($this->isColumnModified(CertificadoForaSistemaPeer::SITUACAO)) $criteria->add(CertificadoForaSistemaPeer::SITUACAO, $this->situacao);

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
		$criteria = new Criteria(CertificadoForaSistemaPeer::DATABASE_NAME);

		$criteria->add(CertificadoForaSistemaPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of CertificadoForaSistema (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setProtocolo($this->protocolo);

		$copyObj->setDocumento($this->documento);

		$copyObj->setRazao($this->razao);

		$copyObj->setStatus($this->status);

		$copyObj->setProduto($this->produto);

		$copyObj->setLocal($this->local);

		$copyObj->setAr($this->ar);

		$copyObj->setCpfAr($this->cpf_ar);

		$copyObj->setValor($this->valor);

		$copyObj->setDataAvp($this->data_avp);

		$copyObj->setDataValidacao($this->data_validacao);

		$copyObj->setDataImportacao($this->data_importacao);

		$copyObj->setDataMesReferente($this->data_mes_referente);

		$copyObj->setEmailCliente($this->email_cliente);

		$copyObj->setTelefoneCliente($this->telefone_cliente);

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
	 * @return     CertificadoForaSistema Clone of current object.
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
	 * @return     CertificadoForaSistemaPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new CertificadoForaSistemaPeer();
		}
		return self::$peer;
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

	}

} // BaseCertificadoForaSistema
