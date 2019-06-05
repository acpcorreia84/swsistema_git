<?php

/**
 * Base class that represents a row from the 'aviso' table.
 *
 * 
 *
 * @package    pacoteInformacao.om
 */
abstract class BaseAviso extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        AvisoPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the titulo field.
	 * @var        string
	 */
	protected $titulo;

	/**
	 * The value for the texto field.
	 * @var        string
	 */
	protected $texto;

	/**
	 * The value for the data_inicial field.
	 * @var        string
	 */
	protected $data_inicial;

	/**
	 * The value for the data_final field.
	 * @var        string
	 */
	protected $data_final;

	/**
	 * The value for the situacao field.
	 * @var        int
	 */
	protected $situacao;

	/**
	 * The value for the data field.
	 * @var        string
	 */
	protected $data;

	/**
	 * The value for the data_envio field.
	 * @var        string
	 */
	protected $data_envio;

	/**
	 * The value for the tipo_aviso_id field.
	 * @var        int
	 */
	protected $tipo_aviso_id;

	/**
	 * The value for the usuario_id field.
	 * @var        int
	 */
	protected $usuario_id;

	/**
	 * @var        TipoAviso
	 */
	protected $aTipoAviso;

	/**
	 * @var        Usuario
	 */
	protected $aUsuario;

	/**
	 * @var        array AvisoUsuario[] Collection to store aggregation of AvisoUsuario objects.
	 */
	protected $collAvisoUsuarios;

	/**
	 * @var        Criteria The criteria used to select the current contents of collAvisoUsuarios.
	 */
	private $lastAvisoUsuarioCriteria = null;

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
	 * Get the [titulo] column value.
	 * 
	 * @return     string
	 */
	public function getTitulo()
	{
		return $this->titulo;
	}

	/**
	 * Get the [texto] column value.
	 * 
	 * @return     string
	 */
	public function getTexto()
	{
		return $this->texto;
	}

	/**
	 * Get the [optionally formatted] temporal [data_inicial] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataInicial($format = '%x')
	{
		if ($this->data_inicial === null) {
			return null;
		}


		if ($this->data_inicial === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_inicial);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_inicial, true), $x);
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
	 * Get the [optionally formatted] temporal [data_final] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataFinal($format = '%x')
	{
		if ($this->data_final === null) {
			return null;
		}


		if ($this->data_final === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_final);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_final, true), $x);
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
	 * Get the [optionally formatted] temporal [data] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getData($format = 'Y-m-d H:i:s')
	{
		if ($this->data === null) {
			return null;
		}


		if ($this->data === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data, true), $x);
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
	 * Get the [optionally formatted] temporal [data_envio] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataEnvio($format = 'Y-m-d H:i:s')
	{
		if ($this->data_envio === null) {
			return null;
		}


		if ($this->data_envio === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_envio);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_envio, true), $x);
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
	 * Get the [tipo_aviso_id] column value.
	 * 
	 * @return     int
	 */
	public function getTipoAvisoId()
	{
		return $this->tipo_aviso_id;
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
	 * @return     Aviso The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AvisoPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [titulo] column.
	 * 
	 * @param      string $v new value
	 * @return     Aviso The current object (for fluent API support)
	 */
	public function setTitulo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->titulo !== $v) {
			$this->titulo = $v;
			$this->modifiedColumns[] = AvisoPeer::TITULO;
		}

		return $this;
	} // setTitulo()

	/**
	 * Set the value of [texto] column.
	 * 
	 * @param      string $v new value
	 * @return     Aviso The current object (for fluent API support)
	 */
	public function setTexto($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->texto !== $v) {
			$this->texto = $v;
			$this->modifiedColumns[] = AvisoPeer::TEXTO;
		}

		return $this;
	} // setTexto()

	/**
	 * Sets the value of [data_inicial] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Aviso The current object (for fluent API support)
	 */
	public function setDataInicial($v)
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

		if ( $this->data_inicial !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_inicial !== null && $tmpDt = new DateTime($this->data_inicial)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_inicial = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = AvisoPeer::DATA_INICIAL;
			}
		} // if either are not null

		return $this;
	} // setDataInicial()

	/**
	 * Sets the value of [data_final] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Aviso The current object (for fluent API support)
	 */
	public function setDataFinal($v)
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

		if ( $this->data_final !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_final !== null && $tmpDt = new DateTime($this->data_final)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_final = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = AvisoPeer::DATA_FINAL;
			}
		} // if either are not null

		return $this;
	} // setDataFinal()

	/**
	 * Set the value of [situacao] column.
	 * 
	 * @param      int $v new value
	 * @return     Aviso The current object (for fluent API support)
	 */
	public function setSituacao($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->situacao !== $v) {
			$this->situacao = $v;
			$this->modifiedColumns[] = AvisoPeer::SITUACAO;
		}

		return $this;
	} // setSituacao()

	/**
	 * Sets the value of [data] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Aviso The current object (for fluent API support)
	 */
	public function setData($v)
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

		if ( $this->data !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data !== null && $tmpDt = new DateTime($this->data)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = AvisoPeer::DATA;
			}
		} // if either are not null

		return $this;
	} // setData()

	/**
	 * Sets the value of [data_envio] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Aviso The current object (for fluent API support)
	 */
	public function setDataEnvio($v)
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

		if ( $this->data_envio !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->data_envio !== null && $tmpDt = new DateTime($this->data_envio)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->data_envio = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = AvisoPeer::DATA_ENVIO;
			}
		} // if either are not null

		return $this;
	} // setDataEnvio()

	/**
	 * Set the value of [tipo_aviso_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Aviso The current object (for fluent API support)
	 */
	public function setTipoAvisoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->tipo_aviso_id !== $v) {
			$this->tipo_aviso_id = $v;
			$this->modifiedColumns[] = AvisoPeer::TIPO_AVISO_ID;
		}

		if ($this->aTipoAviso !== null && $this->aTipoAviso->getId() !== $v) {
			$this->aTipoAviso = null;
		}

		return $this;
	} // setTipoAvisoId()

	/**
	 * Set the value of [usuario_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Aviso The current object (for fluent API support)
	 */
	public function setUsuarioId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->usuario_id !== $v) {
			$this->usuario_id = $v;
			$this->modifiedColumns[] = AvisoPeer::USUARIO_ID;
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
			$this->titulo = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->texto = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->data_inicial = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->data_final = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->situacao = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->data = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->data_envio = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->tipo_aviso_id = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->usuario_id = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 10; // 10 = AvisoPeer::NUM_COLUMNS - AvisoPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Aviso object", $e);
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

		if ($this->aTipoAviso !== null && $this->tipo_aviso_id !== $this->aTipoAviso->getId()) {
			$this->aTipoAviso = null;
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
			$con = Propel::getConnection(AvisoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = AvisoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aTipoAviso = null;
			$this->aUsuario = null;
			$this->collAvisoUsuarios = null;
			$this->lastAvisoUsuarioCriteria = null;

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
			$con = Propel::getConnection(AvisoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				AvisoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AvisoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				AvisoPeer::addInstanceToPool($this);
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

			if ($this->aTipoAviso !== null) {
				if ($this->aTipoAviso->isModified() || $this->aTipoAviso->isNew()) {
					$affectedRows += $this->aTipoAviso->save($con);
				}
				$this->setTipoAviso($this->aTipoAviso);
			}

			if ($this->aUsuario !== null) {
				if ($this->aUsuario->isModified() || $this->aUsuario->isNew()) {
					$affectedRows += $this->aUsuario->save($con);
				}
				$this->setUsuario($this->aUsuario);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = AvisoPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AvisoPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += AvisoPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collAvisoUsuarios !== null) {
				foreach ($this->collAvisoUsuarios as $referrerFK) {
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

			if ($this->aTipoAviso !== null) {
				if (!$this->aTipoAviso->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTipoAviso->getValidationFailures());
				}
			}

			if ($this->aUsuario !== null) {
				if (!$this->aUsuario->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUsuario->getValidationFailures());
				}
			}


			if (($retval = AvisoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAvisoUsuarios !== null) {
					foreach ($this->collAvisoUsuarios as $referrerFK) {
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
		$criteria = new Criteria(AvisoPeer::DATABASE_NAME);

		if ($this->isColumnModified(AvisoPeer::ID)) $criteria->add(AvisoPeer::ID, $this->id);
		if ($this->isColumnModified(AvisoPeer::TITULO)) $criteria->add(AvisoPeer::TITULO, $this->titulo);
		if ($this->isColumnModified(AvisoPeer::TEXTO)) $criteria->add(AvisoPeer::TEXTO, $this->texto);
		if ($this->isColumnModified(AvisoPeer::DATA_INICIAL)) $criteria->add(AvisoPeer::DATA_INICIAL, $this->data_inicial);
		if ($this->isColumnModified(AvisoPeer::DATA_FINAL)) $criteria->add(AvisoPeer::DATA_FINAL, $this->data_final);
		if ($this->isColumnModified(AvisoPeer::SITUACAO)) $criteria->add(AvisoPeer::SITUACAO, $this->situacao);
		if ($this->isColumnModified(AvisoPeer::DATA)) $criteria->add(AvisoPeer::DATA, $this->data);
		if ($this->isColumnModified(AvisoPeer::DATA_ENVIO)) $criteria->add(AvisoPeer::DATA_ENVIO, $this->data_envio);
		if ($this->isColumnModified(AvisoPeer::TIPO_AVISO_ID)) $criteria->add(AvisoPeer::TIPO_AVISO_ID, $this->tipo_aviso_id);
		if ($this->isColumnModified(AvisoPeer::USUARIO_ID)) $criteria->add(AvisoPeer::USUARIO_ID, $this->usuario_id);

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
		$criteria = new Criteria(AvisoPeer::DATABASE_NAME);

		$criteria->add(AvisoPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Aviso (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setTitulo($this->titulo);

		$copyObj->setTexto($this->texto);

		$copyObj->setDataInicial($this->data_inicial);

		$copyObj->setDataFinal($this->data_final);

		$copyObj->setSituacao($this->situacao);

		$copyObj->setData($this->data);

		$copyObj->setDataEnvio($this->data_envio);

		$copyObj->setTipoAvisoId($this->tipo_aviso_id);

		$copyObj->setUsuarioId($this->usuario_id);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getAvisoUsuarios() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAvisoUsuario($relObj->copy($deepCopy));
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
	 * @return     Aviso Clone of current object.
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
	 * @return     AvisoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new AvisoPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a TipoAviso object.
	 *
	 * @param      TipoAviso $v
	 * @return     Aviso The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setTipoAviso(TipoAviso $v = null)
	{
		if ($v === null) {
			$this->setTipoAvisoId(NULL);
		} else {
			$this->setTipoAvisoId($v->getId());
		}

		$this->aTipoAviso = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the TipoAviso object, it will not be re-added.
		if ($v !== null) {
			$v->addAviso($this);
		}

		return $this;
	}


	/**
	 * Get the associated TipoAviso object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     TipoAviso The associated TipoAviso object.
	 * @throws     PropelException
	 */
	public function getTipoAviso(PropelPDO $con = null)
	{
		if ($this->aTipoAviso === null && ($this->tipo_aviso_id !== null)) {
			$this->aTipoAviso = TipoAvisoPeer::retrieveByPk($this->tipo_aviso_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aTipoAviso->addAvisos($this);
			 */
		}
		return $this->aTipoAviso;
	}

	/**
	 * Declares an association between this object and a Usuario object.
	 *
	 * @param      Usuario $v
	 * @return     Aviso The current object (for fluent API support)
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
			$v->addAviso($this);
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
			   $this->aUsuario->addAvisos($this);
			 */
		}
		return $this->aUsuario;
	}

	/**
	 * Clears out the collAvisoUsuarios collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAvisoUsuarios()
	 */
	public function clearAvisoUsuarios()
	{
		$this->collAvisoUsuarios = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAvisoUsuarios collection (array).
	 *
	 * By default this just sets the collAvisoUsuarios collection to an empty array (like clearcollAvisoUsuarios());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initAvisoUsuarios()
	{
		$this->collAvisoUsuarios = array();
	}

	/**
	 * Gets an array of AvisoUsuario objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Aviso has previously been saved, it will retrieve
	 * related AvisoUsuarios from storage. If this Aviso is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array AvisoUsuario[]
	 * @throws     PropelException
	 */
	public function getAvisoUsuarios($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AvisoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAvisoUsuarios === null) {
			if ($this->isNew()) {
			   $this->collAvisoUsuarios = array();
			} else {

				$criteria->add(AvisoUsuarioPeer::AVISO_ID, $this->id);

				AvisoUsuarioPeer::addSelectColumns($criteria);
				$this->collAvisoUsuarios = AvisoUsuarioPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(AvisoUsuarioPeer::AVISO_ID, $this->id);

				AvisoUsuarioPeer::addSelectColumns($criteria);
				if (!isset($this->lastAvisoUsuarioCriteria) || !$this->lastAvisoUsuarioCriteria->equals($criteria)) {
					$this->collAvisoUsuarios = AvisoUsuarioPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAvisoUsuarioCriteria = $criteria;
		return $this->collAvisoUsuarios;
	}

	/**
	 * Returns the number of related AvisoUsuario objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related AvisoUsuario objects.
	 * @throws     PropelException
	 */
	public function countAvisoUsuarios(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AvisoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collAvisoUsuarios === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(AvisoUsuarioPeer::AVISO_ID, $this->id);

				$count = AvisoUsuarioPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(AvisoUsuarioPeer::AVISO_ID, $this->id);

				if (!isset($this->lastAvisoUsuarioCriteria) || !$this->lastAvisoUsuarioCriteria->equals($criteria)) {
					$count = AvisoUsuarioPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collAvisoUsuarios);
				}
			} else {
				$count = count($this->collAvisoUsuarios);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a AvisoUsuario object to this object
	 * through the AvisoUsuario foreign key attribute.
	 *
	 * @param      AvisoUsuario $l AvisoUsuario
	 * @return     void
	 * @throws     PropelException
	 */
	public function addAvisoUsuario(AvisoUsuario $l)
	{
		if ($this->collAvisoUsuarios === null) {
			$this->initAvisoUsuarios();
		}
		if (!in_array($l, $this->collAvisoUsuarios, true)) { // only add it if the **same** object is not already associated
			array_push($this->collAvisoUsuarios, $l);
			$l->setAviso($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Aviso is new, it will return
	 * an empty collection; or if this Aviso has previously
	 * been saved, it will retrieve related AvisoUsuarios from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Aviso.
	 */
	public function getAvisoUsuariosJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AvisoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAvisoUsuarios === null) {
			if ($this->isNew()) {
				$this->collAvisoUsuarios = array();
			} else {

				$criteria->add(AvisoUsuarioPeer::AVISO_ID, $this->id);

				$this->collAvisoUsuarios = AvisoUsuarioPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(AvisoUsuarioPeer::AVISO_ID, $this->id);

			if (!isset($this->lastAvisoUsuarioCriteria) || !$this->lastAvisoUsuarioCriteria->equals($criteria)) {
				$this->collAvisoUsuarios = AvisoUsuarioPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		}
		$this->lastAvisoUsuarioCriteria = $criteria;

		return $this->collAvisoUsuarios;
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
			if ($this->collAvisoUsuarios) {
				foreach ((array) $this->collAvisoUsuarios as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collAvisoUsuarios = null;
			$this->aTipoAviso = null;
			$this->aUsuario = null;
	}

} // BaseAviso
