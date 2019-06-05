<?php

/**
 * Base static class for performing query and update operations on the 'certificado_fora_sistema' table.
 *
 * 
 *
 * @package    pacoteCertificado.om
 */
abstract class BaseCertificadoForaSistemaPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'swsistema';

	/** the table name for this class */
	const TABLE_NAME = 'certificado_fora_sistema';

	/** the related Propel class for this table */
	const OM_CLASS = 'CertificadoForaSistema';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'pacoteCertificado.CertificadoForaSistema';

	/** the related TableMap class for this table */
	const TM_CLASS = 'CertificadoForaSistemaTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 17;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'certificado_fora_sistema.ID';

	/** the column name for the PROTOCOLO field */
	const PROTOCOLO = 'certificado_fora_sistema.PROTOCOLO';

	/** the column name for the DOCUMENTO field */
	const DOCUMENTO = 'certificado_fora_sistema.DOCUMENTO';

	/** the column name for the RAZAO field */
	const RAZAO = 'certificado_fora_sistema.RAZAO';

	/** the column name for the STATUS field */
	const STATUS = 'certificado_fora_sistema.STATUS';

	/** the column name for the PRODUTO field */
	const PRODUTO = 'certificado_fora_sistema.PRODUTO';

	/** the column name for the LOCAL field */
	const LOCAL = 'certificado_fora_sistema.LOCAL';

	/** the column name for the AR field */
	const AR = 'certificado_fora_sistema.AR';

	/** the column name for the CPF_AR field */
	const CPF_AR = 'certificado_fora_sistema.CPF_AR';

	/** the column name for the VALOR field */
	const VALOR = 'certificado_fora_sistema.VALOR';

	/** the column name for the DATA_AVP field */
	const DATA_AVP = 'certificado_fora_sistema.DATA_AVP';

	/** the column name for the DATA_VALIDACAO field */
	const DATA_VALIDACAO = 'certificado_fora_sistema.DATA_VALIDACAO';

	/** the column name for the DATA_IMPORTACAO field */
	const DATA_IMPORTACAO = 'certificado_fora_sistema.DATA_IMPORTACAO';

	/** the column name for the DATA_MES_REFERENTE field */
	const DATA_MES_REFERENTE = 'certificado_fora_sistema.DATA_MES_REFERENTE';

	/** the column name for the EMAIL_CLIENTE field */
	const EMAIL_CLIENTE = 'certificado_fora_sistema.EMAIL_CLIENTE';

	/** the column name for the TELEFONE_CLIENTE field */
	const TELEFONE_CLIENTE = 'certificado_fora_sistema.TELEFONE_CLIENTE';

	/** the column name for the SITUACAO field */
	const SITUACAO = 'certificado_fora_sistema.SITUACAO';

	/**
	 * An identiy map to hold any loaded instances of CertificadoForaSistema objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array CertificadoForaSistema[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Protocolo', 'Documento', 'Razao', 'Status', 'Produto', 'Local', 'Ar', 'CpfAr', 'Valor', 'DataAvp', 'DataValidacao', 'DataImportacao', 'DataMesReferente', 'EmailCliente', 'TelefoneCliente', 'Situacao', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'protocolo', 'documento', 'razao', 'status', 'produto', 'local', 'ar', 'cpfAr', 'valor', 'dataAvp', 'dataValidacao', 'dataImportacao', 'dataMesReferente', 'emailCliente', 'telefoneCliente', 'situacao', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::PROTOCOLO, self::DOCUMENTO, self::RAZAO, self::STATUS, self::PRODUTO, self::LOCAL, self::AR, self::CPF_AR, self::VALOR, self::DATA_AVP, self::DATA_VALIDACAO, self::DATA_IMPORTACAO, self::DATA_MES_REFERENTE, self::EMAIL_CLIENTE, self::TELEFONE_CLIENTE, self::SITUACAO, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'protocolo', 'documento', 'razao', 'status', 'produto', 'local', 'ar', 'cpf_ar', 'valor', 'data_avp', 'data_validacao', 'data_importacao', 'data_mes_referente', 'email_cliente', 'telefone_cliente', 'situacao', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Protocolo' => 1, 'Documento' => 2, 'Razao' => 3, 'Status' => 4, 'Produto' => 5, 'Local' => 6, 'Ar' => 7, 'CpfAr' => 8, 'Valor' => 9, 'DataAvp' => 10, 'DataValidacao' => 11, 'DataImportacao' => 12, 'DataMesReferente' => 13, 'EmailCliente' => 14, 'TelefoneCliente' => 15, 'Situacao' => 16, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'protocolo' => 1, 'documento' => 2, 'razao' => 3, 'status' => 4, 'produto' => 5, 'local' => 6, 'ar' => 7, 'cpfAr' => 8, 'valor' => 9, 'dataAvp' => 10, 'dataValidacao' => 11, 'dataImportacao' => 12, 'dataMesReferente' => 13, 'emailCliente' => 14, 'telefoneCliente' => 15, 'situacao' => 16, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::PROTOCOLO => 1, self::DOCUMENTO => 2, self::RAZAO => 3, self::STATUS => 4, self::PRODUTO => 5, self::LOCAL => 6, self::AR => 7, self::CPF_AR => 8, self::VALOR => 9, self::DATA_AVP => 10, self::DATA_VALIDACAO => 11, self::DATA_IMPORTACAO => 12, self::DATA_MES_REFERENTE => 13, self::EMAIL_CLIENTE => 14, self::TELEFONE_CLIENTE => 15, self::SITUACAO => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'protocolo' => 1, 'documento' => 2, 'razao' => 3, 'status' => 4, 'produto' => 5, 'local' => 6, 'ar' => 7, 'cpf_ar' => 8, 'valor' => 9, 'data_avp' => 10, 'data_validacao' => 11, 'data_importacao' => 12, 'data_mes_referente' => 13, 'email_cliente' => 14, 'telefone_cliente' => 15, 'situacao' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	/**
	 * Translates a fieldname to another type
	 *
	 * @param      string $name field name
	 * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @param      string $toType   One of the class type constants
	 * @return     string translated name of the field.
	 * @throws     PropelException - if the specified name could not be found in the fieldname mappings.
	 */
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	/**
	 * Returns an array of field names.
	 *
	 * @param      string $type The type of fieldnames to return:
	 *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     array A list of field names
	 */

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	/**
	 * Convenience method which changes table.column to alias.column.
	 *
	 * Using this method you can maintain SQL abstraction while using column aliases.
	 * <code>
	 *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
	 *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
	 * </code>
	 * @param      string $alias The alias for the current table.
	 * @param      string $column The column name for current table. (i.e. CertificadoForaSistemaPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(CertificadoForaSistemaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	/**
	 * Add all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param      criteria object containing the columns to add.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria)
	{
		$criteria->addSelectColumn(CertificadoForaSistemaPeer::ID);
		$criteria->addSelectColumn(CertificadoForaSistemaPeer::PROTOCOLO);
		$criteria->addSelectColumn(CertificadoForaSistemaPeer::DOCUMENTO);
		$criteria->addSelectColumn(CertificadoForaSistemaPeer::RAZAO);
		$criteria->addSelectColumn(CertificadoForaSistemaPeer::STATUS);
		$criteria->addSelectColumn(CertificadoForaSistemaPeer::PRODUTO);
		$criteria->addSelectColumn(CertificadoForaSistemaPeer::LOCAL);
		$criteria->addSelectColumn(CertificadoForaSistemaPeer::AR);
		$criteria->addSelectColumn(CertificadoForaSistemaPeer::CPF_AR);
		$criteria->addSelectColumn(CertificadoForaSistemaPeer::VALOR);
		$criteria->addSelectColumn(CertificadoForaSistemaPeer::DATA_AVP);
		$criteria->addSelectColumn(CertificadoForaSistemaPeer::DATA_VALIDACAO);
		$criteria->addSelectColumn(CertificadoForaSistemaPeer::DATA_IMPORTACAO);
		$criteria->addSelectColumn(CertificadoForaSistemaPeer::DATA_MES_REFERENTE);
		$criteria->addSelectColumn(CertificadoForaSistemaPeer::EMAIL_CLIENTE);
		$criteria->addSelectColumn(CertificadoForaSistemaPeer::TELEFONE_CLIENTE);
		$criteria->addSelectColumn(CertificadoForaSistemaPeer::SITUACAO);
	}

	/**
	 * Returns the number of rows matching criteria.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @return     int Number of matching rows.
	 */
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
		// we may modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(CertificadoForaSistemaPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CertificadoForaSistemaPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(CertificadoForaSistemaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		// BasePeer returns a PDOStatement
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}
	/**
	 * Method to select one object from the DB.
	 *
	 * @param      Criteria $criteria object used to create the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     CertificadoForaSistema
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = CertificadoForaSistemaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	/**
	 * Method to do selects.
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     array Array of selected Objects
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return CertificadoForaSistemaPeer::populateObjects(CertificadoForaSistemaPeer::doSelectStmt($criteria, $con));
	}
	/**
	 * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
	 *
	 * Use this method directly if you want to work with an executed statement durirectly (for example
	 * to perform your own object hydration).
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con The connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     PDOStatement The executed PDOStatement object.
	 * @see        BasePeer::doSelect()
	 */
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CertificadoForaSistemaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			CertificadoForaSistemaPeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		// BasePeer returns a PDOStatement
		return BasePeer::doSelect($criteria, $con);
	}
	/**
	 * Adds an object to the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doSelect*()
	 * methods in your stub classes -- you may need to explicitly add objects
	 * to the cache in order to ensure that the same objects are always returned by doSelect*()
	 * and retrieveByPK*() calls.
	 *
	 * @param      CertificadoForaSistema $value A CertificadoForaSistema object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(CertificadoForaSistema $obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getId();
			} // if key === null
			self::$instances[$key] = $obj;
		}
	}

	/**
	 * Removes an object from the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doDelete
	 * methods in your stub classes -- you may need to explicitly remove objects
	 * from the cache in order to prevent returning objects that no longer exist.
	 *
	 * @param      mixed $value A CertificadoForaSistema object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof CertificadoForaSistema) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or CertificadoForaSistema object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
				throw $e;
			}

			unset(self::$instances[$key]);
		}
	} // removeInstanceFromPool()

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
	 * @return     CertificadoForaSistema Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
	 * @see        getPrimaryKeyHash()
	 */
	public static function getInstanceFromPool($key)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if (isset(self::$instances[$key])) {
				return self::$instances[$key];
			}
		}
		return null; // just to be explicit
	}
	
	/**
	 * Clear the instance pool.
	 *
	 * @return     void
	 */
	public static function clearInstancePool()
	{
		self::$instances = array();
	}
	
	/**
	 * Method to invalidate the instance pool of all tables related to certificado_fora_sistema
	 * by a foreign key with ON DELETE CASCADE
	 */
	public static function clearRelatedInstancePool()
	{
	}

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     string A string version of PK or NULL if the components of primary key in result array are all null.
	 */
	public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
	{
		// If the PK cannot be derived from the row, return NULL.
		if ($row[$startcol] === null) {
			return null;
		}
		return (string) $row[$startcol];
	}

	/**
	 * The returned array will contain objects of the default type or
	 * objects that inherit from the default.
	 *
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
		// set the class once to avoid overhead in the loop
		$cls = CertificadoForaSistemaPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = CertificadoForaSistemaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = CertificadoForaSistemaPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				CertificadoForaSistemaPeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
	}
	/**
	 * Returns the TableMap related to this peer.
	 * This method is not needed for general use but a specific application could have a need.
	 * @return     TableMap
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	/**
	 * Add a TableMap instance to the database for this peer class.
	 */
	public static function buildTableMap()
	{
	  $dbMap = Propel::getDatabaseMap(BaseCertificadoForaSistemaPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseCertificadoForaSistemaPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new CertificadoForaSistemaTableMap());
	  }
	}

	/**
	 * The class that the Peer will make instances of.
	 *
	 * If $withPrefix is true, the returned path
	 * uses a dot-path notation which is tranalted into a path
	 * relative to a location on the PHP include_path.
	 * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
	 *
	 * @param      boolean  Whether or not to return the path wit hthe class name 
	 * @return     string path.to.ClassName
	 */
	public static function getOMClass($withPrefix = true)
	{
		return $withPrefix ? CertificadoForaSistemaPeer::CLASS_DEFAULT : CertificadoForaSistemaPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a CertificadoForaSistema or Criteria object.
	 *
	 * @param      mixed $values Criteria or CertificadoForaSistema object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CertificadoForaSistemaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from CertificadoForaSistema object
		}

		if ($criteria->containsKey(CertificadoForaSistemaPeer::ID) && $criteria->keyContainsValue(CertificadoForaSistemaPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.CertificadoForaSistemaPeer::ID.')');
		}


		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		try {
			// use transaction because $criteria could contain info
			// for more than one table (I guess, conceivably)
			$con->beginTransaction();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollBack();
			throw $e;
		}

		return $pk;
	}

	/**
	 * Method perform an UPDATE on the database, given a CertificadoForaSistema or Criteria object.
	 *
	 * @param      mixed $values Criteria or CertificadoForaSistema object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CertificadoForaSistemaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(CertificadoForaSistemaPeer::ID);
			$selectCriteria->add(CertificadoForaSistemaPeer::ID, $criteria->remove(CertificadoForaSistemaPeer::ID), $comparison);

		} else { // $values is CertificadoForaSistema object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the certificado_fora_sistema table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CertificadoForaSistemaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(CertificadoForaSistemaPeer::TABLE_NAME, $con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			CertificadoForaSistemaPeer::clearInstancePool();
			CertificadoForaSistemaPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a CertificadoForaSistema or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or CertificadoForaSistema object or primary key or array of primary keys
	 *              which is used to create the DELETE statement
	 * @param      PropelPDO $con the connection to use
	 * @return     int 	The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
	 *				if supported by native driver or if emulated using Propel.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	 public static function doDelete($values, PropelPDO $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(CertificadoForaSistemaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			CertificadoForaSistemaPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof CertificadoForaSistema) { // it's a model object
			// invalidate the cache for this single object
			CertificadoForaSistemaPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CertificadoForaSistemaPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				CertificadoForaSistemaPeer::removeInstanceFromPool($singleval);
			}
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; // initialize var to track total num of affected rows

		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			CertificadoForaSistemaPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given CertificadoForaSistema object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      CertificadoForaSistema $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(CertificadoForaSistema $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CertificadoForaSistemaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CertificadoForaSistemaPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach ($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		return BasePeer::doValidate(CertificadoForaSistemaPeer::DATABASE_NAME, CertificadoForaSistemaPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     CertificadoForaSistema
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = CertificadoForaSistemaPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(CertificadoForaSistemaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(CertificadoForaSistemaPeer::DATABASE_NAME);
		$criteria->add(CertificadoForaSistemaPeer::ID, $pk);

		$v = CertificadoForaSistemaPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	/**
	 * Retrieve multiple objects by pkey.
	 *
	 * @param      array $pks List of primary keys
	 * @param      PropelPDO $con the connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CertificadoForaSistemaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(CertificadoForaSistemaPeer::DATABASE_NAME);
			$criteria->add(CertificadoForaSistemaPeer::ID, $pks, Criteria::IN);
			$objs = CertificadoForaSistemaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseCertificadoForaSistemaPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseCertificadoForaSistemaPeer::buildTableMap();

