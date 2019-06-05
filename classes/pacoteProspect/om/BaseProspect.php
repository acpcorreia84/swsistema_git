<?php

/**
 * Base class that represents a row from the 'prospect' table.
 *
 * 
 *
 * @package    pacoteProspect.om
 */
abstract class BaseProspect extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ProspectPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the data_cadastro field.
	 * @var        string
	 */
	protected $data_cadastro;

	/**
	 * The value for the data_prospeccao field.
	 * @var        string
	 */
	protected $data_prospeccao;

	/**
	 * The value for the data_primeiro_contato field.
	 * @var        string
	 */
	protected $data_primeiro_contato;

	/**
	 * The value for the data_ultimo_contato field.
	 * @var        string
	 */
	protected $data_ultimo_contato;

	/**
	 * The value for the data_agendamento field.
	 * @var        string
	 */
	protected $data_agendamento;

	/**
	 * The value for the situacao field.
	 * @var        int
	 */
	protected $situacao;

	/**
	 * The value for the contador_id field.
	 * @var        int
	 */
	protected $contador_id;

	/**
	 * The value for the certificado_id field.
	 * @var        int
	 */
	protected $certificado_id;

	/**
	 * The value for the usuario_id field.
	 * @var        int
	 */
	protected $usuario_id;

	/**
	 * The value for the supervisor_usuario_id field.
	 * @var        int
	 */
	protected $supervisor_usuario_id;

	/**
	 * The value for the prospect_contatos_id field.
	 * @var        int
	 */
	protected $prospect_contatos_id;

	/**
	 * The value for the prospect_tipo_id field.
	 * @var        int
	 */
	protected $prospect_tipo_id;

	/**
	 * The value for the parceiro_id field.
	 * @var        int
	 */
	protected $parceiro_id;

	/**
	 * The value for the prospect_id field.
	 * @var        int
	 */
	protected $prospect_id;

	/**
	 * @var        Contador
	 */
	protected $aContador;

	/**
	 * @var        Certificado
	 */
	protected $aCertificado;

	/**
	 * @var        Usuario
	 */
	protected $aUsuarioRelatedByUsuarioId;

	/**
	 * @var        Usuario
	 */
	protected $aUsuarioRelatedBySupervisorUsuarioId;

	/**
	 * @var        ProspectContato
	 */
	protected $aProspectContato;

	/**
	 * @var        ProspectTipo
	 */
	protected $aProspectTipo;

	/**
	 * @var        array ProspectSituacao[] Collection to store aggregation of ProspectSituacao objects.
	 */
	protected $collProspectSituacaos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collProspectSituacaos.
	 */
	private $lastProspectSituacaoCriteria = null;

	/**
	 * @var        array ProspectAtendimento[] Collection to store aggregation of ProspectAtendimento objects.
	 */
	protected $collProspectAtendimentos;

	/**
	 * @var        Criteria The criteria used to select the current contents of collProspectAtendimentos.
	 */
	private $lastProspectAtendimentoCriteria = null;

	/**
	 * @var        array ProspectNegocio[] Collection to store aggregation of ProspectNegocio objects.
	 */
	protected $collProspectNegocios;

	/**
	 * @var        Criteria The criteria used to select the current contents of collProspectNegocios.
	 */
	private $lastProspectNegocioCriteria = null;

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
	 * Get the [optionally formatted] temporal [data_cadastro] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataCadastro($format = 'Y-m-d H:i:s')
	{
		if ($this->data_cadastro === null) {
			return null;
		}


		if ($this->data_cadastro === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_cadastro);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_cadastro, true), $x);
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
	 * Get the [optionally formatted] temporal [data_prospeccao] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataProspeccao($format = 'Y-m-d H:i:s')
	{
		if ($this->data_prospeccao === null) {
			return null;
		}


		if ($this->data_prospeccao === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_prospeccao);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_prospeccao, true), $x);
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
	 * Get the [optionally formatted] temporal [data_primeiro_contato] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataPrimeiroContato($format = 'Y-m-d H:i:s')
	{
		if ($this->data_primeiro_contato === null) {
			return null;
		}


		if ($this->data_primeiro_contato === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_primeiro_contato);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_primeiro_contato, true), $x);
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
	 * Get the [optionally formatted] temporal [data_ultimo_contato] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataUltimoContato($format = 'Y-m-d H:i:s')
	{
		if ($this->data_ultimo_contato === null) {
			return null;
		}


		if ($this->data_ultimo_contato === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_ultimo_contato);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_ultimo_contato, true), $x);
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
	 * Get the [optionally formatted] temporal [data_agendamento] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataAgendamento($format = 'Y-m-d H:i:s')
	{
		if ($this->data_agendamento === null) {
			return null;
		}


		if ($this->data_agendamento === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_agendamento);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_agendamento, true), $x);
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
	 * Get the [situacao] column value.
	 * 
	 * @return     int
	 */
	public function getSituacao()
	{
		return $this->situacao;
	}

	/**
	 * Get the [contador_id] column value.
	 * 
	 * @return     int
	 */
	public function getContadorId()
	{
		return $this->contador_id;
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
	 * Get the [usuario_id] column value.
	 * 
	 * @return     int
	 */
	public function getUsuarioId()
	{
		return $this->usuario_id;
	}

	/**
	 * Get the [supervisor_usuario_id] column value.
	 * 
	 * @return     int
	 */
	public function getSupervisorUsuarioId()
	{
		return $this->supervisor_usuario_id;
	}

	/**
	 * Get the [prospect_contatos_id] column value.
	 * 
	 * @return     int
	 */
	public function getProspectContatosId()
	{
		return $this->prospect_contatos_id;
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
	 * Get the [parceiro_id] column value.
	 * 
	 * @return     int
	 */
	public function getParceiroId()
	{
		return $this->parceiro_id;
	}

	/**
	 * Get the [prospect_id] column value.
	 * 
	 * @return     int
	 */
	public function getProspectId()
	{
		return $this->prospect_id;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Prospect The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ProspectPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Sets the value of [data_cadastro] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Prospect The current object (for fluent API support)
	 */
	public function setDataCadastro($v)
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

		if ( $this->data_cadastro !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_cadastro !== null && $tmpDt = new DateTime($this->data_cadastro)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_cadastro = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = ProspectPeer::DATA_CADASTRO;
			}
		} // if either are not null

		return $this;
	} // setDataCadastro()

	/**
	 * Sets the value of [data_prospeccao] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Prospect The current object (for fluent API support)
	 */
	public function setDataProspeccao($v)
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

		if ( $this->data_prospeccao !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_prospeccao !== null && $tmpDt = new DateTime($this->data_prospeccao)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_prospeccao = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = ProspectPeer::DATA_PROSPECCAO;
			}
		} // if either are not null

		return $this;
	} // setDataProspeccao()

	/**
	 * Sets the value of [data_primeiro_contato] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Prospect The current object (for fluent API support)
	 */
	public function setDataPrimeiroContato($v)
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

		if ( $this->data_primeiro_contato !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_primeiro_contato !== null && $tmpDt = new DateTime($this->data_primeiro_contato)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_primeiro_contato = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = ProspectPeer::DATA_PRIMEIRO_CONTATO;
			}
		} // if either are not null

		return $this;
	} // setDataPrimeiroContato()

	/**
	 * Sets the value of [data_ultimo_contato] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Prospect The current object (for fluent API support)
	 */
	public function setDataUltimoContato($v)
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

		if ( $this->data_ultimo_contato !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_ultimo_contato !== null && $tmpDt = new DateTime($this->data_ultimo_contato)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_ultimo_contato = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = ProspectPeer::DATA_ULTIMO_CONTATO;
			}
		} // if either are not null

		return $this;
	} // setDataUltimoContato()

	/**
	 * Sets the value of [data_agendamento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Prospect The current object (for fluent API support)
	 */
	public function setDataAgendamento($v)
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

		if ( $this->data_agendamento !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_agendamento !== null && $tmpDt = new DateTime($this->data_agendamento)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_agendamento = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = ProspectPeer::DATA_AGENDAMENTO;
			}
		} // if either are not null

		return $this;
	} // setDataAgendamento()

	/**
	 * Set the value of [situacao] column.
	 * 
	 * @param      int $v new value
	 * @return     Prospect The current object (for fluent API support)
	 */
	public function setSituacao($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->situacao !== $v) {
			$this->situacao = $v;
			$this->modifiedColumns[] = ProspectPeer::SITUACAO;
		}

		return $this;
	} // setSituacao()

	/**
	 * Set the value of [contador_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Prospect The current object (for fluent API support)
	 */
	public function setContadorId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->contador_id !== $v) {
			$this->contador_id = $v;
			$this->modifiedColumns[] = ProspectPeer::CONTADOR_ID;
		}

		if ($this->aContador !== null && $this->aContador->getId() !== $v) {
			$this->aContador = null;
		}

		return $this;
	} // setContadorId()

	/**
	 * Set the value of [certificado_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Prospect The current object (for fluent API support)
	 */
	public function setCertificadoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->certificado_id !== $v) {
			$this->certificado_id = $v;
			$this->modifiedColumns[] = ProspectPeer::CERTIFICADO_ID;
		}

		if ($this->aCertificado !== null && $this->aCertificado->getId() !== $v) {
			$this->aCertificado = null;
		}

		return $this;
	} // setCertificadoId()

	/**
	 * Set the value of [usuario_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Prospect The current object (for fluent API support)
	 */
	public function setUsuarioId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->usuario_id !== $v) {
			$this->usuario_id = $v;
			$this->modifiedColumns[] = ProspectPeer::USUARIO_ID;
		}

		if ($this->aUsuarioRelatedByUsuarioId !== null && $this->aUsuarioRelatedByUsuarioId->getId() !== $v) {
			$this->aUsuarioRelatedByUsuarioId = null;
		}

		return $this;
	} // setUsuarioId()

	/**
	 * Set the value of [supervisor_usuario_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Prospect The current object (for fluent API support)
	 */
	public function setSupervisorUsuarioId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->supervisor_usuario_id !== $v) {
			$this->supervisor_usuario_id = $v;
			$this->modifiedColumns[] = ProspectPeer::SUPERVISOR_USUARIO_ID;
		}

		if ($this->aUsuarioRelatedBySupervisorUsuarioId !== null && $this->aUsuarioRelatedBySupervisorUsuarioId->getId() !== $v) {
			$this->aUsuarioRelatedBySupervisorUsuarioId = null;
		}

		return $this;
	} // setSupervisorUsuarioId()

	/**
	 * Set the value of [prospect_contatos_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Prospect The current object (for fluent API support)
	 */
	public function setProspectContatosId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->prospect_contatos_id !== $v) {
			$this->prospect_contatos_id = $v;
			$this->modifiedColumns[] = ProspectPeer::PROSPECT_CONTATOS_ID;
		}

		if ($this->aProspectContato !== null && $this->aProspectContato->getId() !== $v) {
			$this->aProspectContato = null;
		}

		return $this;
	} // setProspectContatosId()

	/**
	 * Set the value of [prospect_tipo_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Prospect The current object (for fluent API support)
	 */
	public function setProspectTipoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->prospect_tipo_id !== $v) {
			$this->prospect_tipo_id = $v;
			$this->modifiedColumns[] = ProspectPeer::PROSPECT_TIPO_ID;
		}

		if ($this->aProspectTipo !== null && $this->aProspectTipo->getId() !== $v) {
			$this->aProspectTipo = null;
		}

		return $this;
	} // setProspectTipoId()

	/**
	 * Set the value of [parceiro_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Prospect The current object (for fluent API support)
	 */
	public function setParceiroId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->parceiro_id !== $v) {
			$this->parceiro_id = $v;
			$this->modifiedColumns[] = ProspectPeer::PARCEIRO_ID;
		}

		return $this;
	} // setParceiroId()

	/**
	 * Set the value of [prospect_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Prospect The current object (for fluent API support)
	 */
	public function setProspectId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->prospect_id !== $v) {
			$this->prospect_id = $v;
			$this->modifiedColumns[] = ProspectPeer::PROSPECT_ID;
		}

		return $this;
	} // setProspectId()

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
			$this->data_cadastro = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->data_prospeccao = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->data_primeiro_contato = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->data_ultimo_contato = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->data_agendamento = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->situacao = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->contador_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->certificado_id = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->usuario_id = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->supervisor_usuario_id = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
			$this->prospect_contatos_id = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
			$this->prospect_tipo_id = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
			$this->parceiro_id = ($row[$startcol + 13] !== null) ? (int) $row[$startcol + 13] : null;
			$this->prospect_id = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 15; // 15 = ProspectPeer::NUM_COLUMNS - ProspectPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Prospect object", $e);
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

		if ($this->aContador !== null && $this->contador_id !== $this->aContador->getId()) {
			$this->aContador = null;
		}
		if ($this->aCertificado !== null && $this->certificado_id !== $this->aCertificado->getId()) {
			$this->aCertificado = null;
		}
		if ($this->aUsuarioRelatedByUsuarioId !== null && $this->usuario_id !== $this->aUsuarioRelatedByUsuarioId->getId()) {
			$this->aUsuarioRelatedByUsuarioId = null;
		}
		if ($this->aUsuarioRelatedBySupervisorUsuarioId !== null && $this->supervisor_usuario_id !== $this->aUsuarioRelatedBySupervisorUsuarioId->getId()) {
			$this->aUsuarioRelatedBySupervisorUsuarioId = null;
		}
		if ($this->aProspectContato !== null && $this->prospect_contatos_id !== $this->aProspectContato->getId()) {
			$this->aProspectContato = null;
		}
		if ($this->aProspectTipo !== null && $this->prospect_tipo_id !== $this->aProspectTipo->getId()) {
			$this->aProspectTipo = null;
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
			$con = Propel::getConnection(ProspectPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ProspectPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aContador = null;
			$this->aCertificado = null;
			$this->aUsuarioRelatedByUsuarioId = null;
			$this->aUsuarioRelatedBySupervisorUsuarioId = null;
			$this->aProspectContato = null;
			$this->aProspectTipo = null;
			$this->collProspectSituacaos = null;
			$this->lastProspectSituacaoCriteria = null;

			$this->collProspectAtendimentos = null;
			$this->lastProspectAtendimentoCriteria = null;

			$this->collProspectNegocios = null;
			$this->lastProspectNegocioCriteria = null;

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
			$con = Propel::getConnection(ProspectPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				ProspectPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ProspectPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				ProspectPeer::addInstanceToPool($this);
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

			if ($this->aContador !== null) {
				if ($this->aContador->isModified() || $this->aContador->isNew()) {
					$affectedRows += $this->aContador->save($con);
				}
				$this->setContador($this->aContador);
			}

			if ($this->aCertificado !== null) {
				if ($this->aCertificado->isModified() || $this->aCertificado->isNew()) {
					$affectedRows += $this->aCertificado->save($con);
				}
				$this->setCertificado($this->aCertificado);
			}

			if ($this->aUsuarioRelatedByUsuarioId !== null) {
				if ($this->aUsuarioRelatedByUsuarioId->isModified() || $this->aUsuarioRelatedByUsuarioId->isNew()) {
					$affectedRows += $this->aUsuarioRelatedByUsuarioId->save($con);
				}
				$this->setUsuarioRelatedByUsuarioId($this->aUsuarioRelatedByUsuarioId);
			}

			if ($this->aUsuarioRelatedBySupervisorUsuarioId !== null) {
				if ($this->aUsuarioRelatedBySupervisorUsuarioId->isModified() || $this->aUsuarioRelatedBySupervisorUsuarioId->isNew()) {
					$affectedRows += $this->aUsuarioRelatedBySupervisorUsuarioId->save($con);
				}
				$this->setUsuarioRelatedBySupervisorUsuarioId($this->aUsuarioRelatedBySupervisorUsuarioId);
			}

			if ($this->aProspectContato !== null) {
				if ($this->aProspectContato->isModified() || $this->aProspectContato->isNew()) {
					$affectedRows += $this->aProspectContato->save($con);
				}
				$this->setProspectContato($this->aProspectContato);
			}

			if ($this->aProspectTipo !== null) {
				if ($this->aProspectTipo->isModified() || $this->aProspectTipo->isNew()) {
					$affectedRows += $this->aProspectTipo->save($con);
				}
				$this->setProspectTipo($this->aProspectTipo);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = ProspectPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ProspectPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += ProspectPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collProspectSituacaos !== null) {
				foreach ($this->collProspectSituacaos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collProspectAtendimentos !== null) {
				foreach ($this->collProspectAtendimentos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collProspectNegocios !== null) {
				foreach ($this->collProspectNegocios as $referrerFK) {
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

			if ($this->aContador !== null) {
				if (!$this->aContador->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aContador->getValidationFailures());
				}
			}

			if ($this->aCertificado !== null) {
				if (!$this->aCertificado->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCertificado->getValidationFailures());
				}
			}

			if ($this->aUsuarioRelatedByUsuarioId !== null) {
				if (!$this->aUsuarioRelatedByUsuarioId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUsuarioRelatedByUsuarioId->getValidationFailures());
				}
			}

			if ($this->aUsuarioRelatedBySupervisorUsuarioId !== null) {
				if (!$this->aUsuarioRelatedBySupervisorUsuarioId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUsuarioRelatedBySupervisorUsuarioId->getValidationFailures());
				}
			}

			if ($this->aProspectContato !== null) {
				if (!$this->aProspectContato->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProspectContato->getValidationFailures());
				}
			}

			if ($this->aProspectTipo !== null) {
				if (!$this->aProspectTipo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProspectTipo->getValidationFailures());
				}
			}


			if (($retval = ProspectPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collProspectSituacaos !== null) {
					foreach ($this->collProspectSituacaos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collProspectAtendimentos !== null) {
					foreach ($this->collProspectAtendimentos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collProspectNegocios !== null) {
					foreach ($this->collProspectNegocios as $referrerFK) {
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
		$criteria = new Criteria(ProspectPeer::DATABASE_NAME);

		if ($this->isColumnModified(ProspectPeer::ID)) $criteria->add(ProspectPeer::ID, $this->id);
		if ($this->isColumnModified(ProspectPeer::DATA_CADASTRO)) $criteria->add(ProspectPeer::DATA_CADASTRO, $this->data_cadastro);
		if ($this->isColumnModified(ProspectPeer::DATA_PROSPECCAO)) $criteria->add(ProspectPeer::DATA_PROSPECCAO, $this->data_prospeccao);
		if ($this->isColumnModified(ProspectPeer::DATA_PRIMEIRO_CONTATO)) $criteria->add(ProspectPeer::DATA_PRIMEIRO_CONTATO, $this->data_primeiro_contato);
		if ($this->isColumnModified(ProspectPeer::DATA_ULTIMO_CONTATO)) $criteria->add(ProspectPeer::DATA_ULTIMO_CONTATO, $this->data_ultimo_contato);
		if ($this->isColumnModified(ProspectPeer::DATA_AGENDAMENTO)) $criteria->add(ProspectPeer::DATA_AGENDAMENTO, $this->data_agendamento);
		if ($this->isColumnModified(ProspectPeer::SITUACAO)) $criteria->add(ProspectPeer::SITUACAO, $this->situacao);
		if ($this->isColumnModified(ProspectPeer::CONTADOR_ID)) $criteria->add(ProspectPeer::CONTADOR_ID, $this->contador_id);
		if ($this->isColumnModified(ProspectPeer::CERTIFICADO_ID)) $criteria->add(ProspectPeer::CERTIFICADO_ID, $this->certificado_id);
		if ($this->isColumnModified(ProspectPeer::USUARIO_ID)) $criteria->add(ProspectPeer::USUARIO_ID, $this->usuario_id);
		if ($this->isColumnModified(ProspectPeer::SUPERVISOR_USUARIO_ID)) $criteria->add(ProspectPeer::SUPERVISOR_USUARIO_ID, $this->supervisor_usuario_id);
		if ($this->isColumnModified(ProspectPeer::PROSPECT_CONTATOS_ID)) $criteria->add(ProspectPeer::PROSPECT_CONTATOS_ID, $this->prospect_contatos_id);
		if ($this->isColumnModified(ProspectPeer::PROSPECT_TIPO_ID)) $criteria->add(ProspectPeer::PROSPECT_TIPO_ID, $this->prospect_tipo_id);
		if ($this->isColumnModified(ProspectPeer::PARCEIRO_ID)) $criteria->add(ProspectPeer::PARCEIRO_ID, $this->parceiro_id);
		if ($this->isColumnModified(ProspectPeer::PROSPECT_ID)) $criteria->add(ProspectPeer::PROSPECT_ID, $this->prospect_id);

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
		$criteria = new Criteria(ProspectPeer::DATABASE_NAME);

		$criteria->add(ProspectPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Prospect (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDataCadastro($this->data_cadastro);

		$copyObj->setDataProspeccao($this->data_prospeccao);

		$copyObj->setDataPrimeiroContato($this->data_primeiro_contato);

		$copyObj->setDataUltimoContato($this->data_ultimo_contato);

		$copyObj->setDataAgendamento($this->data_agendamento);

		$copyObj->setSituacao($this->situacao);

		$copyObj->setContadorId($this->contador_id);

		$copyObj->setCertificadoId($this->certificado_id);

		$copyObj->setUsuarioId($this->usuario_id);

		$copyObj->setSupervisorUsuarioId($this->supervisor_usuario_id);

		$copyObj->setProspectContatosId($this->prospect_contatos_id);

		$copyObj->setProspectTipoId($this->prospect_tipo_id);

		$copyObj->setParceiroId($this->parceiro_id);

		$copyObj->setProspectId($this->prospect_id);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getProspectSituacaos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addProspectSituacao($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getProspectAtendimentos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addProspectAtendimento($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getProspectNegocios() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addProspectNegocio($relObj->copy($deepCopy));
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
	 * @return     Prospect Clone of current object.
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
	 * @return     ProspectPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ProspectPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Contador object.
	 *
	 * @param      Contador $v
	 * @return     Prospect The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setContador(Contador $v = null)
	{
		if ($v === null) {
			$this->setContadorId(NULL);
		} else {
			$this->setContadorId($v->getId());
		}

		$this->aContador = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Contador object, it will not be re-added.
		if ($v !== null) {
			$v->addProspect($this);
		}

		return $this;
	}


	/**
	 * Get the associated Contador object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Contador The associated Contador object.
	 * @throws     PropelException
	 */
	public function getContador(PropelPDO $con = null)
	{
		if ($this->aContador === null && ($this->contador_id !== null)) {
			$this->aContador = ContadorPeer::retrieveByPk($this->contador_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aContador->addProspects($this);
			 */
		}
		return $this->aContador;
	}

	/**
	 * Declares an association between this object and a Certificado object.
	 *
	 * @param      Certificado $v
	 * @return     Prospect The current object (for fluent API support)
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
			$v->addProspect($this);
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
			   $this->aCertificado->addProspects($this);
			 */
		}
		return $this->aCertificado;
	}

	/**
	 * Declares an association between this object and a Usuario object.
	 *
	 * @param      Usuario $v
	 * @return     Prospect The current object (for fluent API support)
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
			$v->addProspectRelatedByUsuarioId($this);
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
			   $this->aUsuarioRelatedByUsuarioId->addProspectsRelatedByUsuarioId($this);
			 */
		}
		return $this->aUsuarioRelatedByUsuarioId;
	}

	/**
	 * Declares an association between this object and a Usuario object.
	 *
	 * @param      Usuario $v
	 * @return     Prospect The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUsuarioRelatedBySupervisorUsuarioId(Usuario $v = null)
	{
		if ($v === null) {
			$this->setSupervisorUsuarioId(NULL);
		} else {
			$this->setSupervisorUsuarioId($v->getId());
		}

		$this->aUsuarioRelatedBySupervisorUsuarioId = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Usuario object, it will not be re-added.
		if ($v !== null) {
			$v->addProspectRelatedBySupervisorUsuarioId($this);
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
	public function getUsuarioRelatedBySupervisorUsuarioId(PropelPDO $con = null)
	{
		if ($this->aUsuarioRelatedBySupervisorUsuarioId === null && ($this->supervisor_usuario_id !== null)) {
			$this->aUsuarioRelatedBySupervisorUsuarioId = UsuarioPeer::retrieveByPk($this->supervisor_usuario_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aUsuarioRelatedBySupervisorUsuarioId->addProspectsRelatedBySupervisorUsuarioId($this);
			 */
		}
		return $this->aUsuarioRelatedBySupervisorUsuarioId;
	}

	/**
	 * Declares an association between this object and a ProspectContato object.
	 *
	 * @param      ProspectContato $v
	 * @return     Prospect The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setProspectContato(ProspectContato $v = null)
	{
		if ($v === null) {
			$this->setProspectContatosId(NULL);
		} else {
			$this->setProspectContatosId($v->getId());
		}

		$this->aProspectContato = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the ProspectContato object, it will not be re-added.
		if ($v !== null) {
			$v->addProspect($this);
		}

		return $this;
	}


	/**
	 * Get the associated ProspectContato object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     ProspectContato The associated ProspectContato object.
	 * @throws     PropelException
	 */
	public function getProspectContato(PropelPDO $con = null)
	{
		if ($this->aProspectContato === null && ($this->prospect_contatos_id !== null)) {
			$this->aProspectContato = ProspectContatoPeer::retrieveByPk($this->prospect_contatos_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aProspectContato->addProspects($this);
			 */
		}
		return $this->aProspectContato;
	}

	/**
	 * Declares an association between this object and a ProspectTipo object.
	 *
	 * @param      ProspectTipo $v
	 * @return     Prospect The current object (for fluent API support)
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
			$v->addProspect($this);
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
			   $this->aProspectTipo->addProspects($this);
			 */
		}
		return $this->aProspectTipo;
	}

	/**
	 * Clears out the collProspectSituacaos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addProspectSituacaos()
	 */
	public function clearProspectSituacaos()
	{
		$this->collProspectSituacaos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collProspectSituacaos collection (array).
	 *
	 * By default this just sets the collProspectSituacaos collection to an empty array (like clearcollProspectSituacaos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initProspectSituacaos()
	{
		$this->collProspectSituacaos = array();
	}

	/**
	 * Gets an array of ProspectSituacao objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Prospect has previously been saved, it will retrieve
	 * related ProspectSituacaos from storage. If this Prospect is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ProspectSituacao[]
	 * @throws     PropelException
	 */
	public function getProspectSituacaos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProspectPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectSituacaos === null) {
			if ($this->isNew()) {
			   $this->collProspectSituacaos = array();
			} else {

				$criteria->add(ProspectSituacaoPeer::PROSPECT_ID, $this->id);

				ProspectSituacaoPeer::addSelectColumns($criteria);
				$this->collProspectSituacaos = ProspectSituacaoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ProspectSituacaoPeer::PROSPECT_ID, $this->id);

				ProspectSituacaoPeer::addSelectColumns($criteria);
				if (!isset($this->lastProspectSituacaoCriteria) || !$this->lastProspectSituacaoCriteria->equals($criteria)) {
					$this->collProspectSituacaos = ProspectSituacaoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProspectSituacaoCriteria = $criteria;
		return $this->collProspectSituacaos;
	}

	/**
	 * Returns the number of related ProspectSituacao objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ProspectSituacao objects.
	 * @throws     PropelException
	 */
	public function countProspectSituacaos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProspectPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collProspectSituacaos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ProspectSituacaoPeer::PROSPECT_ID, $this->id);

				$count = ProspectSituacaoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ProspectSituacaoPeer::PROSPECT_ID, $this->id);

				if (!isset($this->lastProspectSituacaoCriteria) || !$this->lastProspectSituacaoCriteria->equals($criteria)) {
					$count = ProspectSituacaoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collProspectSituacaos);
				}
			} else {
				$count = count($this->collProspectSituacaos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a ProspectSituacao object to this object
	 * through the ProspectSituacao foreign key attribute.
	 *
	 * @param      ProspectSituacao $l ProspectSituacao
	 * @return     void
	 * @throws     PropelException
	 */
	public function addProspectSituacao(ProspectSituacao $l)
	{
		if ($this->collProspectSituacaos === null) {
			$this->initProspectSituacaos();
		}
		if (!in_array($l, $this->collProspectSituacaos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collProspectSituacaos, $l);
			$l->setProspect($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Prospect is new, it will return
	 * an empty collection; or if this Prospect has previously
	 * been saved, it will retrieve related ProspectSituacaos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Prospect.
	 */
	public function getProspectSituacaosJoinProspectAcao($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProspectPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectSituacaos === null) {
			if ($this->isNew()) {
				$this->collProspectSituacaos = array();
			} else {

				$criteria->add(ProspectSituacaoPeer::PROSPECT_ID, $this->id);

				$this->collProspectSituacaos = ProspectSituacaoPeer::doSelectJoinProspectAcao($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectSituacaoPeer::PROSPECT_ID, $this->id);

			if (!isset($this->lastProspectSituacaoCriteria) || !$this->lastProspectSituacaoCriteria->equals($criteria)) {
				$this->collProspectSituacaos = ProspectSituacaoPeer::doSelectJoinProspectAcao($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectSituacaoCriteria = $criteria;

		return $this->collProspectSituacaos;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Prospect is new, it will return
	 * an empty collection; or if this Prospect has previously
	 * been saved, it will retrieve related ProspectSituacaos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Prospect.
	 */
	public function getProspectSituacaosJoinProspectMeioContato($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProspectPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectSituacaos === null) {
			if ($this->isNew()) {
				$this->collProspectSituacaos = array();
			} else {

				$criteria->add(ProspectSituacaoPeer::PROSPECT_ID, $this->id);

				$this->collProspectSituacaos = ProspectSituacaoPeer::doSelectJoinProspectMeioContato($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectSituacaoPeer::PROSPECT_ID, $this->id);

			if (!isset($this->lastProspectSituacaoCriteria) || !$this->lastProspectSituacaoCriteria->equals($criteria)) {
				$this->collProspectSituacaos = ProspectSituacaoPeer::doSelectJoinProspectMeioContato($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectSituacaoCriteria = $criteria;

		return $this->collProspectSituacaos;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Prospect is new, it will return
	 * an empty collection; or if this Prospect has previously
	 * been saved, it will retrieve related ProspectSituacaos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Prospect.
	 */
	public function getProspectSituacaosJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProspectPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectSituacaos === null) {
			if ($this->isNew()) {
				$this->collProspectSituacaos = array();
			} else {

				$criteria->add(ProspectSituacaoPeer::PROSPECT_ID, $this->id);

				$this->collProspectSituacaos = ProspectSituacaoPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectSituacaoPeer::PROSPECT_ID, $this->id);

			if (!isset($this->lastProspectSituacaoCriteria) || !$this->lastProspectSituacaoCriteria->equals($criteria)) {
				$this->collProspectSituacaos = ProspectSituacaoPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectSituacaoCriteria = $criteria;

		return $this->collProspectSituacaos;
	}

	/**
	 * Clears out the collProspectAtendimentos collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addProspectAtendimentos()
	 */
	public function clearProspectAtendimentos()
	{
		$this->collProspectAtendimentos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collProspectAtendimentos collection (array).
	 *
	 * By default this just sets the collProspectAtendimentos collection to an empty array (like clearcollProspectAtendimentos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initProspectAtendimentos()
	{
		$this->collProspectAtendimentos = array();
	}

	/**
	 * Gets an array of ProspectAtendimento objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Prospect has previously been saved, it will retrieve
	 * related ProspectAtendimentos from storage. If this Prospect is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ProspectAtendimento[]
	 * @throws     PropelException
	 */
	public function getProspectAtendimentos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProspectPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectAtendimentos === null) {
			if ($this->isNew()) {
			   $this->collProspectAtendimentos = array();
			} else {

				$criteria->add(ProspectAtendimentoPeer::PROSPECT_ID, $this->id);

				ProspectAtendimentoPeer::addSelectColumns($criteria);
				$this->collProspectAtendimentos = ProspectAtendimentoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ProspectAtendimentoPeer::PROSPECT_ID, $this->id);

				ProspectAtendimentoPeer::addSelectColumns($criteria);
				if (!isset($this->lastProspectAtendimentoCriteria) || !$this->lastProspectAtendimentoCriteria->equals($criteria)) {
					$this->collProspectAtendimentos = ProspectAtendimentoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProspectAtendimentoCriteria = $criteria;
		return $this->collProspectAtendimentos;
	}

	/**
	 * Returns the number of related ProspectAtendimento objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ProspectAtendimento objects.
	 * @throws     PropelException
	 */
	public function countProspectAtendimentos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProspectPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collProspectAtendimentos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ProspectAtendimentoPeer::PROSPECT_ID, $this->id);

				$count = ProspectAtendimentoPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ProspectAtendimentoPeer::PROSPECT_ID, $this->id);

				if (!isset($this->lastProspectAtendimentoCriteria) || !$this->lastProspectAtendimentoCriteria->equals($criteria)) {
					$count = ProspectAtendimentoPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collProspectAtendimentos);
				}
			} else {
				$count = count($this->collProspectAtendimentos);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a ProspectAtendimento object to this object
	 * through the ProspectAtendimento foreign key attribute.
	 *
	 * @param      ProspectAtendimento $l ProspectAtendimento
	 * @return     void
	 * @throws     PropelException
	 */
	public function addProspectAtendimento(ProspectAtendimento $l)
	{
		if ($this->collProspectAtendimentos === null) {
			$this->initProspectAtendimentos();
		}
		if (!in_array($l, $this->collProspectAtendimentos, true)) { // only add it if the **same** object is not already associated
			array_push($this->collProspectAtendimentos, $l);
			$l->setProspect($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Prospect is new, it will return
	 * an empty collection; or if this Prospect has previously
	 * been saved, it will retrieve related ProspectAtendimentos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Prospect.
	 */
	public function getProspectAtendimentosJoinProspectMeioContato($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProspectPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectAtendimentos === null) {
			if ($this->isNew()) {
				$this->collProspectAtendimentos = array();
			} else {

				$criteria->add(ProspectAtendimentoPeer::PROSPECT_ID, $this->id);

				$this->collProspectAtendimentos = ProspectAtendimentoPeer::doSelectJoinProspectMeioContato($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectAtendimentoPeer::PROSPECT_ID, $this->id);

			if (!isset($this->lastProspectAtendimentoCriteria) || !$this->lastProspectAtendimentoCriteria->equals($criteria)) {
				$this->collProspectAtendimentos = ProspectAtendimentoPeer::doSelectJoinProspectMeioContato($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectAtendimentoCriteria = $criteria;

		return $this->collProspectAtendimentos;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Prospect is new, it will return
	 * an empty collection; or if this Prospect has previously
	 * been saved, it will retrieve related ProspectAtendimentos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Prospect.
	 */
	public function getProspectAtendimentosJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProspectPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectAtendimentos === null) {
			if ($this->isNew()) {
				$this->collProspectAtendimentos = array();
			} else {

				$criteria->add(ProspectAtendimentoPeer::PROSPECT_ID, $this->id);

				$this->collProspectAtendimentos = ProspectAtendimentoPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectAtendimentoPeer::PROSPECT_ID, $this->id);

			if (!isset($this->lastProspectAtendimentoCriteria) || !$this->lastProspectAtendimentoCriteria->equals($criteria)) {
				$this->collProspectAtendimentos = ProspectAtendimentoPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectAtendimentoCriteria = $criteria;

		return $this->collProspectAtendimentos;
	}

	/**
	 * Clears out the collProspectNegocios collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addProspectNegocios()
	 */
	public function clearProspectNegocios()
	{
		$this->collProspectNegocios = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collProspectNegocios collection (array).
	 *
	 * By default this just sets the collProspectNegocios collection to an empty array (like clearcollProspectNegocios());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initProspectNegocios()
	{
		$this->collProspectNegocios = array();
	}

	/**
	 * Gets an array of ProspectNegocio objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Prospect has previously been saved, it will retrieve
	 * related ProspectNegocios from storage. If this Prospect is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ProspectNegocio[]
	 * @throws     PropelException
	 */
	public function getProspectNegocios($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProspectPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectNegocios === null) {
			if ($this->isNew()) {
			   $this->collProspectNegocios = array();
			} else {

				$criteria->add(ProspectNegocioPeer::PROSPECT_ID, $this->id);

				ProspectNegocioPeer::addSelectColumns($criteria);
				$this->collProspectNegocios = ProspectNegocioPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ProspectNegocioPeer::PROSPECT_ID, $this->id);

				ProspectNegocioPeer::addSelectColumns($criteria);
				if (!isset($this->lastProspectNegocioCriteria) || !$this->lastProspectNegocioCriteria->equals($criteria)) {
					$this->collProspectNegocios = ProspectNegocioPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastProspectNegocioCriteria = $criteria;
		return $this->collProspectNegocios;
	}

	/**
	 * Returns the number of related ProspectNegocio objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ProspectNegocio objects.
	 * @throws     PropelException
	 */
	public function countProspectNegocios(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProspectPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collProspectNegocios === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ProspectNegocioPeer::PROSPECT_ID, $this->id);

				$count = ProspectNegocioPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ProspectNegocioPeer::PROSPECT_ID, $this->id);

				if (!isset($this->lastProspectNegocioCriteria) || !$this->lastProspectNegocioCriteria->equals($criteria)) {
					$count = ProspectNegocioPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collProspectNegocios);
				}
			} else {
				$count = count($this->collProspectNegocios);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a ProspectNegocio object to this object
	 * through the ProspectNegocio foreign key attribute.
	 *
	 * @param      ProspectNegocio $l ProspectNegocio
	 * @return     void
	 * @throws     PropelException
	 */
	public function addProspectNegocio(ProspectNegocio $l)
	{
		if ($this->collProspectNegocios === null) {
			$this->initProspectNegocios();
		}
		if (!in_array($l, $this->collProspectNegocios, true)) { // only add it if the **same** object is not already associated
			array_push($this->collProspectNegocios, $l);
			$l->setProspect($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Prospect is new, it will return
	 * an empty collection; or if this Prospect has previously
	 * been saved, it will retrieve related ProspectNegocios from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Prospect.
	 */
	public function getProspectNegociosJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ProspectPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collProspectNegocios === null) {
			if ($this->isNew()) {
				$this->collProspectNegocios = array();
			} else {

				$criteria->add(ProspectNegocioPeer::PROSPECT_ID, $this->id);

				$this->collProspectNegocios = ProspectNegocioPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ProspectNegocioPeer::PROSPECT_ID, $this->id);

			if (!isset($this->lastProspectNegocioCriteria) || !$this->lastProspectNegocioCriteria->equals($criteria)) {
				$this->collProspectNegocios = ProspectNegocioPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		}
		$this->lastProspectNegocioCriteria = $criteria;

		return $this->collProspectNegocios;
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
			if ($this->collProspectSituacaos) {
				foreach ((array) $this->collProspectSituacaos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collProspectAtendimentos) {
				foreach ((array) $this->collProspectAtendimentos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collProspectNegocios) {
				foreach ((array) $this->collProspectNegocios as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collProspectSituacaos = null;
		$this->collProspectAtendimentos = null;
		$this->collProspectNegocios = null;
			$this->aContador = null;
			$this->aCertificado = null;
			$this->aUsuarioRelatedByUsuarioId = null;
			$this->aUsuarioRelatedBySupervisorUsuarioId = null;
			$this->aProspectContato = null;
			$this->aProspectTipo = null;
	}

} // BaseProspect
