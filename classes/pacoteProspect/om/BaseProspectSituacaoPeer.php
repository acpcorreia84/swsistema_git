<?php

/**
 * Base static class for performing query and update operations on the 'prospect_situacao' table.
 *
 * 
 *
 * @package    pacoteProspect.om
 */
abstract class BaseProspectSituacaoPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'swsistema';

	/** the table name for this class */
	const TABLE_NAME = 'prospect_situacao';

	/** the related Propel class for this table */
	const OM_CLASS = 'ProspectSituacao';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'pacoteProspect.ProspectSituacao';

	/** the related TableMap class for this table */
	const TM_CLASS = 'ProspectSituacaoTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 7;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'prospect_situacao.ID';

	/** the column name for the DATA_ACAO field */
	const DATA_ACAO = 'prospect_situacao.DATA_ACAO';

	/** the column name for the OBSERVACAO field */
	const OBSERVACAO = 'prospect_situacao.OBSERVACAO';

	/** the column name for the USUARIO_ID field */
	const USUARIO_ID = 'prospect_situacao.USUARIO_ID';

	/** the column name for the PROSPECT_MEIO_CONTATO_ID field */
	const PROSPECT_MEIO_CONTATO_ID = 'prospect_situacao.PROSPECT_MEIO_CONTATO_ID';

	/** the column name for the PROSPECT_ACAO_ID field */
	const PROSPECT_ACAO_ID = 'prospect_situacao.PROSPECT_ACAO_ID';

	/** the column name for the PROSPECT_ID field */
	const PROSPECT_ID = 'prospect_situacao.PROSPECT_ID';

	/**
	 * An identiy map to hold any loaded instances of ProspectSituacao objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array ProspectSituacao[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'DataAcao', 'Observacao', 'UsuarioId', 'ProspectMeioContatoId', 'ProspectAcaoId', 'ProspectId', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'dataAcao', 'observacao', 'usuarioId', 'prospectMeioContatoId', 'prospectAcaoId', 'prospectId', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::DATA_ACAO, self::OBSERVACAO, self::USUARIO_ID, self::PROSPECT_MEIO_CONTATO_ID, self::PROSPECT_ACAO_ID, self::PROSPECT_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'data_acao', 'observacao', 'usuario_id', 'prospect_meio_contato_id', 'prospect_acao_id', 'prospect_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'DataAcao' => 1, 'Observacao' => 2, 'UsuarioId' => 3, 'ProspectMeioContatoId' => 4, 'ProspectAcaoId' => 5, 'ProspectId' => 6, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'dataAcao' => 1, 'observacao' => 2, 'usuarioId' => 3, 'prospectMeioContatoId' => 4, 'prospectAcaoId' => 5, 'prospectId' => 6, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::DATA_ACAO => 1, self::OBSERVACAO => 2, self::USUARIO_ID => 3, self::PROSPECT_MEIO_CONTATO_ID => 4, self::PROSPECT_ACAO_ID => 5, self::PROSPECT_ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'data_acao' => 1, 'observacao' => 2, 'usuario_id' => 3, 'prospect_meio_contato_id' => 4, 'prospect_acao_id' => 5, 'prospect_id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
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
	 * @param      string $column The column name for current table. (i.e. ProspectSituacaoPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(ProspectSituacaoPeer::TABLE_NAME.'.', $alias.'.', $column);
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
		$criteria->addSelectColumn(ProspectSituacaoPeer::ID);
		$criteria->addSelectColumn(ProspectSituacaoPeer::DATA_ACAO);
		$criteria->addSelectColumn(ProspectSituacaoPeer::OBSERVACAO);
		$criteria->addSelectColumn(ProspectSituacaoPeer::USUARIO_ID);
		$criteria->addSelectColumn(ProspectSituacaoPeer::PROSPECT_MEIO_CONTATO_ID);
		$criteria->addSelectColumn(ProspectSituacaoPeer::PROSPECT_ACAO_ID);
		$criteria->addSelectColumn(ProspectSituacaoPeer::PROSPECT_ID);
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
		$criteria->setPrimaryTableName(ProspectSituacaoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ProspectSituacaoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(ProspectSituacaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return     ProspectSituacao
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = ProspectSituacaoPeer::doSelect($critcopy, $con);
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
		return ProspectSituacaoPeer::populateObjects(ProspectSituacaoPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(ProspectSituacaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			ProspectSituacaoPeer::addSelectColumns($criteria);
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
	 * @param      ProspectSituacao $value A ProspectSituacao object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(ProspectSituacao $obj, $key = null)
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
	 * @param      mixed $value A ProspectSituacao object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof ProspectSituacao) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or ProspectSituacao object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     ProspectSituacao Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to prospect_situacao
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
		$cls = ProspectSituacaoPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = ProspectSituacaoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = ProspectSituacaoPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				ProspectSituacaoPeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
	}

	/**
	 * Returns the number of rows matching criteria, joining the related ProspectAcao table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinProspectAcao(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ProspectSituacaoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ProspectSituacaoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ProspectSituacaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ProspectSituacaoPeer::PROSPECT_ACAO_ID, ProspectAcaoPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related ProspectMeioContato table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinProspectMeioContato(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ProspectSituacaoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ProspectSituacaoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ProspectSituacaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ProspectSituacaoPeer::PROSPECT_MEIO_CONTATO_ID, ProspectMeioContatoPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Prospect table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinProspect(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ProspectSituacaoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ProspectSituacaoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ProspectSituacaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ProspectSituacaoPeer::PROSPECT_ID, ProspectPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Usuario table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinUsuario(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ProspectSituacaoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ProspectSituacaoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ProspectSituacaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ProspectSituacaoPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

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
	 * Selects a collection of ProspectSituacao objects pre-filled with their ProspectAcao objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ProspectSituacao objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinProspectAcao(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ProspectSituacaoPeer::addSelectColumns($criteria);
		$startcol = (ProspectSituacaoPeer::NUM_COLUMNS - ProspectSituacaoPeer::NUM_LAZY_LOAD_COLUMNS);
		ProspectAcaoPeer::addSelectColumns($criteria);

		$criteria->addJoin(ProspectSituacaoPeer::PROSPECT_ACAO_ID, ProspectAcaoPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ProspectSituacaoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ProspectSituacaoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = ProspectSituacaoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ProspectSituacaoPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = ProspectAcaoPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = ProspectAcaoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = ProspectAcaoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					ProspectAcaoPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded
				
				// Add the $obj1 (ProspectSituacao) to $obj2 (ProspectAcao)
				$obj2->addProspectSituacao($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of ProspectSituacao objects pre-filled with their ProspectMeioContato objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ProspectSituacao objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinProspectMeioContato(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ProspectSituacaoPeer::addSelectColumns($criteria);
		$startcol = (ProspectSituacaoPeer::NUM_COLUMNS - ProspectSituacaoPeer::NUM_LAZY_LOAD_COLUMNS);
		ProspectMeioContatoPeer::addSelectColumns($criteria);

		$criteria->addJoin(ProspectSituacaoPeer::PROSPECT_MEIO_CONTATO_ID, ProspectMeioContatoPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ProspectSituacaoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ProspectSituacaoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = ProspectSituacaoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ProspectSituacaoPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = ProspectMeioContatoPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = ProspectMeioContatoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = ProspectMeioContatoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					ProspectMeioContatoPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded
				
				// Add the $obj1 (ProspectSituacao) to $obj2 (ProspectMeioContato)
				$obj2->addProspectSituacao($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of ProspectSituacao objects pre-filled with their Prospect objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ProspectSituacao objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinProspect(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ProspectSituacaoPeer::addSelectColumns($criteria);
		$startcol = (ProspectSituacaoPeer::NUM_COLUMNS - ProspectSituacaoPeer::NUM_LAZY_LOAD_COLUMNS);
		ProspectPeer::addSelectColumns($criteria);

		$criteria->addJoin(ProspectSituacaoPeer::PROSPECT_ID, ProspectPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ProspectSituacaoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ProspectSituacaoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = ProspectSituacaoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ProspectSituacaoPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = ProspectPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = ProspectPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = ProspectPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					ProspectPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded
				
				// Add the $obj1 (ProspectSituacao) to $obj2 (Prospect)
				$obj2->addProspectSituacao($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of ProspectSituacao objects pre-filled with their Usuario objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ProspectSituacao objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinUsuario(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ProspectSituacaoPeer::addSelectColumns($criteria);
		$startcol = (ProspectSituacaoPeer::NUM_COLUMNS - ProspectSituacaoPeer::NUM_LAZY_LOAD_COLUMNS);
		UsuarioPeer::addSelectColumns($criteria);

		$criteria->addJoin(ProspectSituacaoPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ProspectSituacaoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ProspectSituacaoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = ProspectSituacaoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ProspectSituacaoPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = UsuarioPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = UsuarioPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					UsuarioPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded
				
				// Add the $obj1 (ProspectSituacao) to $obj2 (Usuario)
				$obj2->addProspectSituacao($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining all related tables
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ProspectSituacaoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ProspectSituacaoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ProspectSituacaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ProspectSituacaoPeer::PROSPECT_ACAO_ID, ProspectAcaoPeer::ID, $join_behavior);

		$criteria->addJoin(ProspectSituacaoPeer::PROSPECT_MEIO_CONTATO_ID, ProspectMeioContatoPeer::ID, $join_behavior);

		$criteria->addJoin(ProspectSituacaoPeer::PROSPECT_ID, ProspectPeer::ID, $join_behavior);

		$criteria->addJoin(ProspectSituacaoPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

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
	 * Selects a collection of ProspectSituacao objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ProspectSituacao objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ProspectSituacaoPeer::addSelectColumns($criteria);
		$startcol2 = (ProspectSituacaoPeer::NUM_COLUMNS - ProspectSituacaoPeer::NUM_LAZY_LOAD_COLUMNS);

		ProspectAcaoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (ProspectAcaoPeer::NUM_COLUMNS - ProspectAcaoPeer::NUM_LAZY_LOAD_COLUMNS);

		ProspectMeioContatoPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ProspectMeioContatoPeer::NUM_COLUMNS - ProspectMeioContatoPeer::NUM_LAZY_LOAD_COLUMNS);

		ProspectPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (ProspectPeer::NUM_COLUMNS - ProspectPeer::NUM_LAZY_LOAD_COLUMNS);

		UsuarioPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(ProspectSituacaoPeer::PROSPECT_ACAO_ID, ProspectAcaoPeer::ID, $join_behavior);

		$criteria->addJoin(ProspectSituacaoPeer::PROSPECT_MEIO_CONTATO_ID, ProspectMeioContatoPeer::ID, $join_behavior);

		$criteria->addJoin(ProspectSituacaoPeer::PROSPECT_ID, ProspectPeer::ID, $join_behavior);

		$criteria->addJoin(ProspectSituacaoPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ProspectSituacaoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ProspectSituacaoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ProspectSituacaoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ProspectSituacaoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined ProspectAcao rows

			$key2 = ProspectAcaoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = ProspectAcaoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = ProspectAcaoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ProspectAcaoPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (ProspectSituacao) to the collection in $obj2 (ProspectAcao)
				$obj2->addProspectSituacao($obj1);
			} // if joined row not null

			// Add objects for joined ProspectMeioContato rows

			$key3 = ProspectMeioContatoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = ProspectMeioContatoPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$cls = ProspectMeioContatoPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ProspectMeioContatoPeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (ProspectSituacao) to the collection in $obj3 (ProspectMeioContato)
				$obj3->addProspectSituacao($obj1);
			} // if joined row not null

			// Add objects for joined Prospect rows

			$key4 = ProspectPeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = ProspectPeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$cls = ProspectPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ProspectPeer::addInstanceToPool($obj4, $key4);
				} // if obj4 loaded

				// Add the $obj1 (ProspectSituacao) to the collection in $obj4 (Prospect)
				$obj4->addProspectSituacao($obj1);
			} // if joined row not null

			// Add objects for joined Usuario rows

			$key5 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol5);
			if ($key5 !== null) {
				$obj5 = UsuarioPeer::getInstanceFromPool($key5);
				if (!$obj5) {

					$cls = UsuarioPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					UsuarioPeer::addInstanceToPool($obj5, $key5);
				} // if obj5 loaded

				// Add the $obj1 (ProspectSituacao) to the collection in $obj5 (Usuario)
				$obj5->addProspectSituacao($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related ProspectAcao table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptProspectAcao(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ProspectSituacaoPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ProspectSituacaoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ProspectSituacaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(ProspectSituacaoPeer::PROSPECT_MEIO_CONTATO_ID, ProspectMeioContatoPeer::ID, $join_behavior);

		$criteria->addJoin(ProspectSituacaoPeer::PROSPECT_ID, ProspectPeer::ID, $join_behavior);

		$criteria->addJoin(ProspectSituacaoPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related ProspectMeioContato table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptProspectMeioContato(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ProspectSituacaoPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ProspectSituacaoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ProspectSituacaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(ProspectSituacaoPeer::PROSPECT_ACAO_ID, ProspectAcaoPeer::ID, $join_behavior);

		$criteria->addJoin(ProspectSituacaoPeer::PROSPECT_ID, ProspectPeer::ID, $join_behavior);

		$criteria->addJoin(ProspectSituacaoPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Prospect table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptProspect(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ProspectSituacaoPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ProspectSituacaoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ProspectSituacaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(ProspectSituacaoPeer::PROSPECT_ACAO_ID, ProspectAcaoPeer::ID, $join_behavior);

		$criteria->addJoin(ProspectSituacaoPeer::PROSPECT_MEIO_CONTATO_ID, ProspectMeioContatoPeer::ID, $join_behavior);

		$criteria->addJoin(ProspectSituacaoPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Usuario table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptUsuario(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ProspectSituacaoPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ProspectSituacaoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ProspectSituacaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(ProspectSituacaoPeer::PROSPECT_ACAO_ID, ProspectAcaoPeer::ID, $join_behavior);

		$criteria->addJoin(ProspectSituacaoPeer::PROSPECT_MEIO_CONTATO_ID, ProspectMeioContatoPeer::ID, $join_behavior);

		$criteria->addJoin(ProspectSituacaoPeer::PROSPECT_ID, ProspectPeer::ID, $join_behavior);

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
	 * Selects a collection of ProspectSituacao objects pre-filled with all related objects except ProspectAcao.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ProspectSituacao objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptProspectAcao(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ProspectSituacaoPeer::addSelectColumns($criteria);
		$startcol2 = (ProspectSituacaoPeer::NUM_COLUMNS - ProspectSituacaoPeer::NUM_LAZY_LOAD_COLUMNS);

		ProspectMeioContatoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (ProspectMeioContatoPeer::NUM_COLUMNS - ProspectMeioContatoPeer::NUM_LAZY_LOAD_COLUMNS);

		ProspectPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ProspectPeer::NUM_COLUMNS - ProspectPeer::NUM_LAZY_LOAD_COLUMNS);

		UsuarioPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(ProspectSituacaoPeer::PROSPECT_MEIO_CONTATO_ID, ProspectMeioContatoPeer::ID, $join_behavior);

		$criteria->addJoin(ProspectSituacaoPeer::PROSPECT_ID, ProspectPeer::ID, $join_behavior);

		$criteria->addJoin(ProspectSituacaoPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ProspectSituacaoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ProspectSituacaoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ProspectSituacaoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ProspectSituacaoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined ProspectMeioContato rows

				$key2 = ProspectMeioContatoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = ProspectMeioContatoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = ProspectMeioContatoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ProspectMeioContatoPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (ProspectSituacao) to the collection in $obj2 (ProspectMeioContato)
				$obj2->addProspectSituacao($obj1);

			} // if joined row is not null

				// Add objects for joined Prospect rows

				$key3 = ProspectPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ProspectPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ProspectPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ProspectPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (ProspectSituacao) to the collection in $obj3 (Prospect)
				$obj3->addProspectSituacao($obj1);

			} // if joined row is not null

				// Add objects for joined Usuario rows

				$key4 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = UsuarioPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					UsuarioPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (ProspectSituacao) to the collection in $obj4 (Usuario)
				$obj4->addProspectSituacao($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of ProspectSituacao objects pre-filled with all related objects except ProspectMeioContato.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ProspectSituacao objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptProspectMeioContato(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ProspectSituacaoPeer::addSelectColumns($criteria);
		$startcol2 = (ProspectSituacaoPeer::NUM_COLUMNS - ProspectSituacaoPeer::NUM_LAZY_LOAD_COLUMNS);

		ProspectAcaoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (ProspectAcaoPeer::NUM_COLUMNS - ProspectAcaoPeer::NUM_LAZY_LOAD_COLUMNS);

		ProspectPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ProspectPeer::NUM_COLUMNS - ProspectPeer::NUM_LAZY_LOAD_COLUMNS);

		UsuarioPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(ProspectSituacaoPeer::PROSPECT_ACAO_ID, ProspectAcaoPeer::ID, $join_behavior);

		$criteria->addJoin(ProspectSituacaoPeer::PROSPECT_ID, ProspectPeer::ID, $join_behavior);

		$criteria->addJoin(ProspectSituacaoPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ProspectSituacaoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ProspectSituacaoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ProspectSituacaoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ProspectSituacaoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined ProspectAcao rows

				$key2 = ProspectAcaoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = ProspectAcaoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = ProspectAcaoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ProspectAcaoPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (ProspectSituacao) to the collection in $obj2 (ProspectAcao)
				$obj2->addProspectSituacao($obj1);

			} // if joined row is not null

				// Add objects for joined Prospect rows

				$key3 = ProspectPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ProspectPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ProspectPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ProspectPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (ProspectSituacao) to the collection in $obj3 (Prospect)
				$obj3->addProspectSituacao($obj1);

			} // if joined row is not null

				// Add objects for joined Usuario rows

				$key4 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = UsuarioPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					UsuarioPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (ProspectSituacao) to the collection in $obj4 (Usuario)
				$obj4->addProspectSituacao($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of ProspectSituacao objects pre-filled with all related objects except Prospect.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ProspectSituacao objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptProspect(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ProspectSituacaoPeer::addSelectColumns($criteria);
		$startcol2 = (ProspectSituacaoPeer::NUM_COLUMNS - ProspectSituacaoPeer::NUM_LAZY_LOAD_COLUMNS);

		ProspectAcaoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (ProspectAcaoPeer::NUM_COLUMNS - ProspectAcaoPeer::NUM_LAZY_LOAD_COLUMNS);

		ProspectMeioContatoPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ProspectMeioContatoPeer::NUM_COLUMNS - ProspectMeioContatoPeer::NUM_LAZY_LOAD_COLUMNS);

		UsuarioPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(ProspectSituacaoPeer::PROSPECT_ACAO_ID, ProspectAcaoPeer::ID, $join_behavior);

		$criteria->addJoin(ProspectSituacaoPeer::PROSPECT_MEIO_CONTATO_ID, ProspectMeioContatoPeer::ID, $join_behavior);

		$criteria->addJoin(ProspectSituacaoPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ProspectSituacaoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ProspectSituacaoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ProspectSituacaoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ProspectSituacaoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined ProspectAcao rows

				$key2 = ProspectAcaoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = ProspectAcaoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = ProspectAcaoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ProspectAcaoPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (ProspectSituacao) to the collection in $obj2 (ProspectAcao)
				$obj2->addProspectSituacao($obj1);

			} // if joined row is not null

				// Add objects for joined ProspectMeioContato rows

				$key3 = ProspectMeioContatoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ProspectMeioContatoPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ProspectMeioContatoPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ProspectMeioContatoPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (ProspectSituacao) to the collection in $obj3 (ProspectMeioContato)
				$obj3->addProspectSituacao($obj1);

			} // if joined row is not null

				// Add objects for joined Usuario rows

				$key4 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = UsuarioPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					UsuarioPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (ProspectSituacao) to the collection in $obj4 (Usuario)
				$obj4->addProspectSituacao($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of ProspectSituacao objects pre-filled with all related objects except Usuario.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ProspectSituacao objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptUsuario(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ProspectSituacaoPeer::addSelectColumns($criteria);
		$startcol2 = (ProspectSituacaoPeer::NUM_COLUMNS - ProspectSituacaoPeer::NUM_LAZY_LOAD_COLUMNS);

		ProspectAcaoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (ProspectAcaoPeer::NUM_COLUMNS - ProspectAcaoPeer::NUM_LAZY_LOAD_COLUMNS);

		ProspectMeioContatoPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ProspectMeioContatoPeer::NUM_COLUMNS - ProspectMeioContatoPeer::NUM_LAZY_LOAD_COLUMNS);

		ProspectPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (ProspectPeer::NUM_COLUMNS - ProspectPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(ProspectSituacaoPeer::PROSPECT_ACAO_ID, ProspectAcaoPeer::ID, $join_behavior);

		$criteria->addJoin(ProspectSituacaoPeer::PROSPECT_MEIO_CONTATO_ID, ProspectMeioContatoPeer::ID, $join_behavior);

		$criteria->addJoin(ProspectSituacaoPeer::PROSPECT_ID, ProspectPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ProspectSituacaoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ProspectSituacaoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ProspectSituacaoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ProspectSituacaoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined ProspectAcao rows

				$key2 = ProspectAcaoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = ProspectAcaoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = ProspectAcaoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ProspectAcaoPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (ProspectSituacao) to the collection in $obj2 (ProspectAcao)
				$obj2->addProspectSituacao($obj1);

			} // if joined row is not null

				// Add objects for joined ProspectMeioContato rows

				$key3 = ProspectMeioContatoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ProspectMeioContatoPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ProspectMeioContatoPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ProspectMeioContatoPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (ProspectSituacao) to the collection in $obj3 (ProspectMeioContato)
				$obj3->addProspectSituacao($obj1);

			} // if joined row is not null

				// Add objects for joined Prospect rows

				$key4 = ProspectPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = ProspectPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = ProspectPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ProspectPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (ProspectSituacao) to the collection in $obj4 (Prospect)
				$obj4->addProspectSituacao($obj1);

			} // if joined row is not null

			$results[] = $obj1;
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
	  $dbMap = Propel::getDatabaseMap(BaseProspectSituacaoPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseProspectSituacaoPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new ProspectSituacaoTableMap());
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
		return $withPrefix ? ProspectSituacaoPeer::CLASS_DEFAULT : ProspectSituacaoPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a ProspectSituacao or Criteria object.
	 *
	 * @param      mixed $values Criteria or ProspectSituacao object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ProspectSituacaoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from ProspectSituacao object
		}

		if ($criteria->containsKey(ProspectSituacaoPeer::ID) && $criteria->keyContainsValue(ProspectSituacaoPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.ProspectSituacaoPeer::ID.')');
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
	 * Method perform an UPDATE on the database, given a ProspectSituacao or Criteria object.
	 *
	 * @param      mixed $values Criteria or ProspectSituacao object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ProspectSituacaoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(ProspectSituacaoPeer::ID);
			$selectCriteria->add(ProspectSituacaoPeer::ID, $criteria->remove(ProspectSituacaoPeer::ID), $comparison);

		} else { // $values is ProspectSituacao object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the prospect_situacao table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ProspectSituacaoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(ProspectSituacaoPeer::TABLE_NAME, $con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			ProspectSituacaoPeer::clearInstancePool();
			ProspectSituacaoPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a ProspectSituacao or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or ProspectSituacao object or primary key or array of primary keys
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
			$con = Propel::getConnection(ProspectSituacaoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			ProspectSituacaoPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof ProspectSituacao) { // it's a model object
			// invalidate the cache for this single object
			ProspectSituacaoPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ProspectSituacaoPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				ProspectSituacaoPeer::removeInstanceFromPool($singleval);
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
			ProspectSituacaoPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given ProspectSituacao object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      ProspectSituacao $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(ProspectSituacao $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ProspectSituacaoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ProspectSituacaoPeer::TABLE_NAME);

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

		return BasePeer::doValidate(ProspectSituacaoPeer::DATABASE_NAME, ProspectSituacaoPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     ProspectSituacao
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = ProspectSituacaoPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(ProspectSituacaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(ProspectSituacaoPeer::DATABASE_NAME);
		$criteria->add(ProspectSituacaoPeer::ID, $pk);

		$v = ProspectSituacaoPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(ProspectSituacaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(ProspectSituacaoPeer::DATABASE_NAME);
			$criteria->add(ProspectSituacaoPeer::ID, $pks, Criteria::IN);
			$objs = ProspectSituacaoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseProspectSituacaoPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseProspectSituacaoPeer::buildTableMap();

