<?php

/**
 * Base static class for performing query and update operations on the 'lancamento_conta' table.
 *
 * 
 *
 * @package    pacoteFinanceiro.om
 */
abstract class BaseLancamentoContaPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'swsistema';

	/** the table name for this class */
	const TABLE_NAME = 'lancamento_conta';

	/** the related Propel class for this table */
	const OM_CLASS = 'LancamentoConta';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'pacoteFinanceiro.LancamentoConta';

	/** the related TableMap class for this table */
	const TM_CLASS = 'LancamentoContaTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 12;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'lancamento_conta.ID';

	/** the column name for the CONTA_BANCARIA_ID field */
	const CONTA_BANCARIA_ID = 'lancamento_conta.CONTA_BANCARIA_ID';

	/** the column name for the CONTA_PAGAR_ID field */
	const CONTA_PAGAR_ID = 'lancamento_conta.CONTA_PAGAR_ID';

	/** the column name for the CONTA_RECEBER_ID field */
	const CONTA_RECEBER_ID = 'lancamento_conta.CONTA_RECEBER_ID';

	/** the column name for the CONTA_CONTABIL_ID field */
	const CONTA_CONTABIL_ID = 'lancamento_conta.CONTA_CONTABIL_ID';

	/** the column name for the COD_MOVIMENTACAO field */
	const COD_MOVIMENTACAO = 'lancamento_conta.COD_MOVIMENTACAO';

	/** the column name for the DATA_LANCAMENTO field */
	const DATA_LANCAMENTO = 'lancamento_conta.DATA_LANCAMENTO';

	/** the column name for the DESCRICAO field */
	const DESCRICAO = 'lancamento_conta.DESCRICAO';

	/** the column name for the VALOR field */
	const VALOR = 'lancamento_conta.VALOR';

	/** the column name for the TIPO field */
	const TIPO = 'lancamento_conta.TIPO';

	/** the column name for the OBSERVACAO field */
	const OBSERVACAO = 'lancamento_conta.OBSERVACAO';

	/** the column name for the LOCAL_ID field */
	const LOCAL_ID = 'lancamento_conta.LOCAL_ID';

	/**
	 * An identiy map to hold any loaded instances of LancamentoConta objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array LancamentoConta[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'ContaBancariaId', 'ContaPagarId', 'ContaReceberId', 'ContaContabilId', 'CodMovimentacao', 'DataLancamento', 'Descricao', 'Valor', 'Tipo', 'Observacao', 'LocalId', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'contaBancariaId', 'contaPagarId', 'contaReceberId', 'contaContabilId', 'codMovimentacao', 'dataLancamento', 'descricao', 'valor', 'tipo', 'observacao', 'localId', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::CONTA_BANCARIA_ID, self::CONTA_PAGAR_ID, self::CONTA_RECEBER_ID, self::CONTA_CONTABIL_ID, self::COD_MOVIMENTACAO, self::DATA_LANCAMENTO, self::DESCRICAO, self::VALOR, self::TIPO, self::OBSERVACAO, self::LOCAL_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'conta_bancaria_id', 'conta_pagar_id', 'conta_receber_id', 'conta_contabil_id', 'cod_movimentacao', 'data_lancamento', 'descricao', 'valor', 'tipo', 'observacao', 'local_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'ContaBancariaId' => 1, 'ContaPagarId' => 2, 'ContaReceberId' => 3, 'ContaContabilId' => 4, 'CodMovimentacao' => 5, 'DataLancamento' => 6, 'Descricao' => 7, 'Valor' => 8, 'Tipo' => 9, 'Observacao' => 10, 'LocalId' => 11, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'contaBancariaId' => 1, 'contaPagarId' => 2, 'contaReceberId' => 3, 'contaContabilId' => 4, 'codMovimentacao' => 5, 'dataLancamento' => 6, 'descricao' => 7, 'valor' => 8, 'tipo' => 9, 'observacao' => 10, 'localId' => 11, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::CONTA_BANCARIA_ID => 1, self::CONTA_PAGAR_ID => 2, self::CONTA_RECEBER_ID => 3, self::CONTA_CONTABIL_ID => 4, self::COD_MOVIMENTACAO => 5, self::DATA_LANCAMENTO => 6, self::DESCRICAO => 7, self::VALOR => 8, self::TIPO => 9, self::OBSERVACAO => 10, self::LOCAL_ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'conta_bancaria_id' => 1, 'conta_pagar_id' => 2, 'conta_receber_id' => 3, 'conta_contabil_id' => 4, 'cod_movimentacao' => 5, 'data_lancamento' => 6, 'descricao' => 7, 'valor' => 8, 'tipo' => 9, 'observacao' => 10, 'local_id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
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
	 * @param      string $column The column name for current table. (i.e. LancamentoContaPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(LancamentoContaPeer::TABLE_NAME.'.', $alias.'.', $column);
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
		$criteria->addSelectColumn(LancamentoContaPeer::ID);
		$criteria->addSelectColumn(LancamentoContaPeer::CONTA_BANCARIA_ID);
		$criteria->addSelectColumn(LancamentoContaPeer::CONTA_PAGAR_ID);
		$criteria->addSelectColumn(LancamentoContaPeer::CONTA_RECEBER_ID);
		$criteria->addSelectColumn(LancamentoContaPeer::CONTA_CONTABIL_ID);
		$criteria->addSelectColumn(LancamentoContaPeer::COD_MOVIMENTACAO);
		$criteria->addSelectColumn(LancamentoContaPeer::DATA_LANCAMENTO);
		$criteria->addSelectColumn(LancamentoContaPeer::DESCRICAO);
		$criteria->addSelectColumn(LancamentoContaPeer::VALOR);
		$criteria->addSelectColumn(LancamentoContaPeer::TIPO);
		$criteria->addSelectColumn(LancamentoContaPeer::OBSERVACAO);
		$criteria->addSelectColumn(LancamentoContaPeer::LOCAL_ID);
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
		$criteria->setPrimaryTableName(LancamentoContaPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			LancamentoContaPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(LancamentoContaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return     LancamentoConta
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = LancamentoContaPeer::doSelect($critcopy, $con);
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
		return LancamentoContaPeer::populateObjects(LancamentoContaPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(LancamentoContaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			LancamentoContaPeer::addSelectColumns($criteria);
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
	 * @param      LancamentoConta $value A LancamentoConta object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(LancamentoConta $obj, $key = null)
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
	 * @param      mixed $value A LancamentoConta object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof LancamentoConta) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or LancamentoConta object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     LancamentoConta Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to lancamento_conta
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
		$cls = LancamentoContaPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = LancamentoContaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = LancamentoContaPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				LancamentoContaPeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
	}

	/**
	 * Returns the number of rows matching criteria, joining the related ContasPagar table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinContasPagar(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(LancamentoContaPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			LancamentoContaPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(LancamentoContaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(LancamentoContaPeer::CONTA_PAGAR_ID, ContasPagarPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related ContasReceber table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinContasReceber(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(LancamentoContaPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			LancamentoContaPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(LancamentoContaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(LancamentoContaPeer::CONTA_RECEBER_ID, ContasReceberPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related ContaBancaria table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinContaBancaria(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(LancamentoContaPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			LancamentoContaPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(LancamentoContaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(LancamentoContaPeer::CONTA_BANCARIA_ID, ContaBancariaPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related ContaContabil table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinContaContabil(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(LancamentoContaPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			LancamentoContaPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(LancamentoContaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(LancamentoContaPeer::CONTA_CONTABIL_ID, ContaContabilPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Local table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinLocal(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(LancamentoContaPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			LancamentoContaPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(LancamentoContaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(LancamentoContaPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

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
	 * Selects a collection of LancamentoConta objects pre-filled with their ContasPagar objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of LancamentoConta objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinContasPagar(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		LancamentoContaPeer::addSelectColumns($criteria);
		$startcol = (LancamentoContaPeer::NUM_COLUMNS - LancamentoContaPeer::NUM_LAZY_LOAD_COLUMNS);
		ContasPagarPeer::addSelectColumns($criteria);

		$criteria->addJoin(LancamentoContaPeer::CONTA_PAGAR_ID, ContasPagarPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = LancamentoContaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = LancamentoContaPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = LancamentoContaPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				LancamentoContaPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = ContasPagarPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = ContasPagarPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = ContasPagarPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					ContasPagarPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded
				
				// Add the $obj1 (LancamentoConta) to $obj2 (ContasPagar)
				$obj2->addLancamentoConta($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of LancamentoConta objects pre-filled with their ContasReceber objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of LancamentoConta objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinContasReceber(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		LancamentoContaPeer::addSelectColumns($criteria);
		$startcol = (LancamentoContaPeer::NUM_COLUMNS - LancamentoContaPeer::NUM_LAZY_LOAD_COLUMNS);
		ContasReceberPeer::addSelectColumns($criteria);

		$criteria->addJoin(LancamentoContaPeer::CONTA_RECEBER_ID, ContasReceberPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = LancamentoContaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = LancamentoContaPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = LancamentoContaPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				LancamentoContaPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = ContasReceberPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = ContasReceberPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = ContasReceberPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					ContasReceberPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded
				
				// Add the $obj1 (LancamentoConta) to $obj2 (ContasReceber)
				$obj2->addLancamentoConta($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of LancamentoConta objects pre-filled with their ContaBancaria objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of LancamentoConta objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinContaBancaria(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		LancamentoContaPeer::addSelectColumns($criteria);
		$startcol = (LancamentoContaPeer::NUM_COLUMNS - LancamentoContaPeer::NUM_LAZY_LOAD_COLUMNS);
		ContaBancariaPeer::addSelectColumns($criteria);

		$criteria->addJoin(LancamentoContaPeer::CONTA_BANCARIA_ID, ContaBancariaPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = LancamentoContaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = LancamentoContaPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = LancamentoContaPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				LancamentoContaPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = ContaBancariaPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = ContaBancariaPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = ContaBancariaPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					ContaBancariaPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded
				
				// Add the $obj1 (LancamentoConta) to $obj2 (ContaBancaria)
				$obj2->addLancamentoConta($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of LancamentoConta objects pre-filled with their ContaContabil objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of LancamentoConta objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinContaContabil(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		LancamentoContaPeer::addSelectColumns($criteria);
		$startcol = (LancamentoContaPeer::NUM_COLUMNS - LancamentoContaPeer::NUM_LAZY_LOAD_COLUMNS);
		ContaContabilPeer::addSelectColumns($criteria);

		$criteria->addJoin(LancamentoContaPeer::CONTA_CONTABIL_ID, ContaContabilPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = LancamentoContaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = LancamentoContaPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = LancamentoContaPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				LancamentoContaPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = ContaContabilPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = ContaContabilPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = ContaContabilPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					ContaContabilPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded
				
				// Add the $obj1 (LancamentoConta) to $obj2 (ContaContabil)
				$obj2->addLancamentoConta($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of LancamentoConta objects pre-filled with their Local objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of LancamentoConta objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinLocal(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		LancamentoContaPeer::addSelectColumns($criteria);
		$startcol = (LancamentoContaPeer::NUM_COLUMNS - LancamentoContaPeer::NUM_LAZY_LOAD_COLUMNS);
		LocalPeer::addSelectColumns($criteria);

		$criteria->addJoin(LancamentoContaPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = LancamentoContaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = LancamentoContaPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = LancamentoContaPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				LancamentoContaPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = LocalPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = LocalPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = LocalPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					LocalPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded
				
				// Add the $obj1 (LancamentoConta) to $obj2 (Local)
				$obj2->addLancamentoConta($obj1);

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
		$criteria->setPrimaryTableName(LancamentoContaPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			LancamentoContaPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(LancamentoContaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(LancamentoContaPeer::CONTA_PAGAR_ID, ContasPagarPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::CONTA_RECEBER_ID, ContasReceberPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::CONTA_BANCARIA_ID, ContaBancariaPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::CONTA_CONTABIL_ID, ContaContabilPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

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
	 * Selects a collection of LancamentoConta objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of LancamentoConta objects.
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

		LancamentoContaPeer::addSelectColumns($criteria);
		$startcol2 = (LancamentoContaPeer::NUM_COLUMNS - LancamentoContaPeer::NUM_LAZY_LOAD_COLUMNS);

		ContasPagarPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (ContasPagarPeer::NUM_COLUMNS - ContasPagarPeer::NUM_LAZY_LOAD_COLUMNS);

		ContasReceberPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ContasReceberPeer::NUM_COLUMNS - ContasReceberPeer::NUM_LAZY_LOAD_COLUMNS);

		ContaBancariaPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (ContaBancariaPeer::NUM_COLUMNS - ContaBancariaPeer::NUM_LAZY_LOAD_COLUMNS);

		ContaContabilPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (ContaContabilPeer::NUM_COLUMNS - ContaContabilPeer::NUM_LAZY_LOAD_COLUMNS);

		LocalPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (LocalPeer::NUM_COLUMNS - LocalPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(LancamentoContaPeer::CONTA_PAGAR_ID, ContasPagarPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::CONTA_RECEBER_ID, ContasReceberPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::CONTA_BANCARIA_ID, ContaBancariaPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::CONTA_CONTABIL_ID, ContaContabilPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = LancamentoContaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = LancamentoContaPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = LancamentoContaPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				LancamentoContaPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined ContasPagar rows

			$key2 = ContasPagarPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = ContasPagarPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = ContasPagarPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ContasPagarPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (LancamentoConta) to the collection in $obj2 (ContasPagar)
				$obj2->addLancamentoConta($obj1);
			} // if joined row not null

			// Add objects for joined ContasReceber rows

			$key3 = ContasReceberPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = ContasReceberPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$cls = ContasReceberPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ContasReceberPeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (LancamentoConta) to the collection in $obj3 (ContasReceber)
				$obj3->addLancamentoConta($obj1);
			} // if joined row not null

			// Add objects for joined ContaBancaria rows

			$key4 = ContaBancariaPeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = ContaBancariaPeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$cls = ContaBancariaPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ContaBancariaPeer::addInstanceToPool($obj4, $key4);
				} // if obj4 loaded

				// Add the $obj1 (LancamentoConta) to the collection in $obj4 (ContaBancaria)
				$obj4->addLancamentoConta($obj1);
			} // if joined row not null

			// Add objects for joined ContaContabil rows

			$key5 = ContaContabilPeer::getPrimaryKeyHashFromRow($row, $startcol5);
			if ($key5 !== null) {
				$obj5 = ContaContabilPeer::getInstanceFromPool($key5);
				if (!$obj5) {

					$cls = ContaContabilPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					ContaContabilPeer::addInstanceToPool($obj5, $key5);
				} // if obj5 loaded

				// Add the $obj1 (LancamentoConta) to the collection in $obj5 (ContaContabil)
				$obj5->addLancamentoConta($obj1);
			} // if joined row not null

			// Add objects for joined Local rows

			$key6 = LocalPeer::getPrimaryKeyHashFromRow($row, $startcol6);
			if ($key6 !== null) {
				$obj6 = LocalPeer::getInstanceFromPool($key6);
				if (!$obj6) {

					$cls = LocalPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					LocalPeer::addInstanceToPool($obj6, $key6);
				} // if obj6 loaded

				// Add the $obj1 (LancamentoConta) to the collection in $obj6 (Local)
				$obj6->addLancamentoConta($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related ContasPagar table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptContasPagar(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(LancamentoContaPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			LancamentoContaPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(LancamentoContaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(LancamentoContaPeer::CONTA_RECEBER_ID, ContasReceberPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::CONTA_BANCARIA_ID, ContaBancariaPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::CONTA_CONTABIL_ID, ContaContabilPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related ContasReceber table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptContasReceber(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(LancamentoContaPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			LancamentoContaPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(LancamentoContaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(LancamentoContaPeer::CONTA_PAGAR_ID, ContasPagarPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::CONTA_BANCARIA_ID, ContaBancariaPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::CONTA_CONTABIL_ID, ContaContabilPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related ContaBancaria table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptContaBancaria(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(LancamentoContaPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			LancamentoContaPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(LancamentoContaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(LancamentoContaPeer::CONTA_PAGAR_ID, ContasPagarPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::CONTA_RECEBER_ID, ContasReceberPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::CONTA_CONTABIL_ID, ContaContabilPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related ContaContabil table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptContaContabil(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(LancamentoContaPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			LancamentoContaPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(LancamentoContaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(LancamentoContaPeer::CONTA_PAGAR_ID, ContasPagarPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::CONTA_RECEBER_ID, ContasReceberPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::CONTA_BANCARIA_ID, ContaBancariaPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Local table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptLocal(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(LancamentoContaPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			LancamentoContaPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(LancamentoContaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(LancamentoContaPeer::CONTA_PAGAR_ID, ContasPagarPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::CONTA_RECEBER_ID, ContasReceberPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::CONTA_BANCARIA_ID, ContaBancariaPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::CONTA_CONTABIL_ID, ContaContabilPeer::ID, $join_behavior);

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
	 * Selects a collection of LancamentoConta objects pre-filled with all related objects except ContasPagar.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of LancamentoConta objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptContasPagar(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		LancamentoContaPeer::addSelectColumns($criteria);
		$startcol2 = (LancamentoContaPeer::NUM_COLUMNS - LancamentoContaPeer::NUM_LAZY_LOAD_COLUMNS);

		ContasReceberPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (ContasReceberPeer::NUM_COLUMNS - ContasReceberPeer::NUM_LAZY_LOAD_COLUMNS);

		ContaBancariaPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ContaBancariaPeer::NUM_COLUMNS - ContaBancariaPeer::NUM_LAZY_LOAD_COLUMNS);

		ContaContabilPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (ContaContabilPeer::NUM_COLUMNS - ContaContabilPeer::NUM_LAZY_LOAD_COLUMNS);

		LocalPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (LocalPeer::NUM_COLUMNS - LocalPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(LancamentoContaPeer::CONTA_RECEBER_ID, ContasReceberPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::CONTA_BANCARIA_ID, ContaBancariaPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::CONTA_CONTABIL_ID, ContaContabilPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = LancamentoContaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = LancamentoContaPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = LancamentoContaPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				LancamentoContaPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined ContasReceber rows

				$key2 = ContasReceberPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = ContasReceberPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = ContasReceberPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ContasReceberPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (LancamentoConta) to the collection in $obj2 (ContasReceber)
				$obj2->addLancamentoConta($obj1);

			} // if joined row is not null

				// Add objects for joined ContaBancaria rows

				$key3 = ContaBancariaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ContaBancariaPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ContaBancariaPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ContaBancariaPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (LancamentoConta) to the collection in $obj3 (ContaBancaria)
				$obj3->addLancamentoConta($obj1);

			} // if joined row is not null

				// Add objects for joined ContaContabil rows

				$key4 = ContaContabilPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = ContaContabilPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = ContaContabilPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ContaContabilPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (LancamentoConta) to the collection in $obj4 (ContaContabil)
				$obj4->addLancamentoConta($obj1);

			} // if joined row is not null

				// Add objects for joined Local rows

				$key5 = LocalPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = LocalPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = LocalPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					LocalPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (LancamentoConta) to the collection in $obj5 (Local)
				$obj5->addLancamentoConta($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of LancamentoConta objects pre-filled with all related objects except ContasReceber.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of LancamentoConta objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptContasReceber(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		LancamentoContaPeer::addSelectColumns($criteria);
		$startcol2 = (LancamentoContaPeer::NUM_COLUMNS - LancamentoContaPeer::NUM_LAZY_LOAD_COLUMNS);

		ContasPagarPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (ContasPagarPeer::NUM_COLUMNS - ContasPagarPeer::NUM_LAZY_LOAD_COLUMNS);

		ContaBancariaPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ContaBancariaPeer::NUM_COLUMNS - ContaBancariaPeer::NUM_LAZY_LOAD_COLUMNS);

		ContaContabilPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (ContaContabilPeer::NUM_COLUMNS - ContaContabilPeer::NUM_LAZY_LOAD_COLUMNS);

		LocalPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (LocalPeer::NUM_COLUMNS - LocalPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(LancamentoContaPeer::CONTA_PAGAR_ID, ContasPagarPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::CONTA_BANCARIA_ID, ContaBancariaPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::CONTA_CONTABIL_ID, ContaContabilPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = LancamentoContaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = LancamentoContaPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = LancamentoContaPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				LancamentoContaPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined ContasPagar rows

				$key2 = ContasPagarPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = ContasPagarPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = ContasPagarPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ContasPagarPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (LancamentoConta) to the collection in $obj2 (ContasPagar)
				$obj2->addLancamentoConta($obj1);

			} // if joined row is not null

				// Add objects for joined ContaBancaria rows

				$key3 = ContaBancariaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ContaBancariaPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ContaBancariaPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ContaBancariaPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (LancamentoConta) to the collection in $obj3 (ContaBancaria)
				$obj3->addLancamentoConta($obj1);

			} // if joined row is not null

				// Add objects for joined ContaContabil rows

				$key4 = ContaContabilPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = ContaContabilPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = ContaContabilPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ContaContabilPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (LancamentoConta) to the collection in $obj4 (ContaContabil)
				$obj4->addLancamentoConta($obj1);

			} // if joined row is not null

				// Add objects for joined Local rows

				$key5 = LocalPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = LocalPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = LocalPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					LocalPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (LancamentoConta) to the collection in $obj5 (Local)
				$obj5->addLancamentoConta($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of LancamentoConta objects pre-filled with all related objects except ContaBancaria.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of LancamentoConta objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptContaBancaria(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		LancamentoContaPeer::addSelectColumns($criteria);
		$startcol2 = (LancamentoContaPeer::NUM_COLUMNS - LancamentoContaPeer::NUM_LAZY_LOAD_COLUMNS);

		ContasPagarPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (ContasPagarPeer::NUM_COLUMNS - ContasPagarPeer::NUM_LAZY_LOAD_COLUMNS);

		ContasReceberPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ContasReceberPeer::NUM_COLUMNS - ContasReceberPeer::NUM_LAZY_LOAD_COLUMNS);

		ContaContabilPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (ContaContabilPeer::NUM_COLUMNS - ContaContabilPeer::NUM_LAZY_LOAD_COLUMNS);

		LocalPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (LocalPeer::NUM_COLUMNS - LocalPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(LancamentoContaPeer::CONTA_PAGAR_ID, ContasPagarPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::CONTA_RECEBER_ID, ContasReceberPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::CONTA_CONTABIL_ID, ContaContabilPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = LancamentoContaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = LancamentoContaPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = LancamentoContaPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				LancamentoContaPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined ContasPagar rows

				$key2 = ContasPagarPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = ContasPagarPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = ContasPagarPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ContasPagarPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (LancamentoConta) to the collection in $obj2 (ContasPagar)
				$obj2->addLancamentoConta($obj1);

			} // if joined row is not null

				// Add objects for joined ContasReceber rows

				$key3 = ContasReceberPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ContasReceberPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ContasReceberPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ContasReceberPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (LancamentoConta) to the collection in $obj3 (ContasReceber)
				$obj3->addLancamentoConta($obj1);

			} // if joined row is not null

				// Add objects for joined ContaContabil rows

				$key4 = ContaContabilPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = ContaContabilPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = ContaContabilPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ContaContabilPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (LancamentoConta) to the collection in $obj4 (ContaContabil)
				$obj4->addLancamentoConta($obj1);

			} // if joined row is not null

				// Add objects for joined Local rows

				$key5 = LocalPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = LocalPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = LocalPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					LocalPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (LancamentoConta) to the collection in $obj5 (Local)
				$obj5->addLancamentoConta($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of LancamentoConta objects pre-filled with all related objects except ContaContabil.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of LancamentoConta objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptContaContabil(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		LancamentoContaPeer::addSelectColumns($criteria);
		$startcol2 = (LancamentoContaPeer::NUM_COLUMNS - LancamentoContaPeer::NUM_LAZY_LOAD_COLUMNS);

		ContasPagarPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (ContasPagarPeer::NUM_COLUMNS - ContasPagarPeer::NUM_LAZY_LOAD_COLUMNS);

		ContasReceberPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ContasReceberPeer::NUM_COLUMNS - ContasReceberPeer::NUM_LAZY_LOAD_COLUMNS);

		ContaBancariaPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (ContaBancariaPeer::NUM_COLUMNS - ContaBancariaPeer::NUM_LAZY_LOAD_COLUMNS);

		LocalPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (LocalPeer::NUM_COLUMNS - LocalPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(LancamentoContaPeer::CONTA_PAGAR_ID, ContasPagarPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::CONTA_RECEBER_ID, ContasReceberPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::CONTA_BANCARIA_ID, ContaBancariaPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = LancamentoContaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = LancamentoContaPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = LancamentoContaPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				LancamentoContaPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined ContasPagar rows

				$key2 = ContasPagarPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = ContasPagarPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = ContasPagarPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ContasPagarPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (LancamentoConta) to the collection in $obj2 (ContasPagar)
				$obj2->addLancamentoConta($obj1);

			} // if joined row is not null

				// Add objects for joined ContasReceber rows

				$key3 = ContasReceberPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ContasReceberPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ContasReceberPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ContasReceberPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (LancamentoConta) to the collection in $obj3 (ContasReceber)
				$obj3->addLancamentoConta($obj1);

			} // if joined row is not null

				// Add objects for joined ContaBancaria rows

				$key4 = ContaBancariaPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = ContaBancariaPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = ContaBancariaPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ContaBancariaPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (LancamentoConta) to the collection in $obj4 (ContaBancaria)
				$obj4->addLancamentoConta($obj1);

			} // if joined row is not null

				// Add objects for joined Local rows

				$key5 = LocalPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = LocalPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = LocalPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					LocalPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (LancamentoConta) to the collection in $obj5 (Local)
				$obj5->addLancamentoConta($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of LancamentoConta objects pre-filled with all related objects except Local.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of LancamentoConta objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptLocal(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		LancamentoContaPeer::addSelectColumns($criteria);
		$startcol2 = (LancamentoContaPeer::NUM_COLUMNS - LancamentoContaPeer::NUM_LAZY_LOAD_COLUMNS);

		ContasPagarPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (ContasPagarPeer::NUM_COLUMNS - ContasPagarPeer::NUM_LAZY_LOAD_COLUMNS);

		ContasReceberPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ContasReceberPeer::NUM_COLUMNS - ContasReceberPeer::NUM_LAZY_LOAD_COLUMNS);

		ContaBancariaPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (ContaBancariaPeer::NUM_COLUMNS - ContaBancariaPeer::NUM_LAZY_LOAD_COLUMNS);

		ContaContabilPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (ContaContabilPeer::NUM_COLUMNS - ContaContabilPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(LancamentoContaPeer::CONTA_PAGAR_ID, ContasPagarPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::CONTA_RECEBER_ID, ContasReceberPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::CONTA_BANCARIA_ID, ContaBancariaPeer::ID, $join_behavior);

		$criteria->addJoin(LancamentoContaPeer::CONTA_CONTABIL_ID, ContaContabilPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = LancamentoContaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = LancamentoContaPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = LancamentoContaPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				LancamentoContaPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined ContasPagar rows

				$key2 = ContasPagarPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = ContasPagarPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = ContasPagarPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ContasPagarPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (LancamentoConta) to the collection in $obj2 (ContasPagar)
				$obj2->addLancamentoConta($obj1);

			} // if joined row is not null

				// Add objects for joined ContasReceber rows

				$key3 = ContasReceberPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ContasReceberPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ContasReceberPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ContasReceberPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (LancamentoConta) to the collection in $obj3 (ContasReceber)
				$obj3->addLancamentoConta($obj1);

			} // if joined row is not null

				// Add objects for joined ContaBancaria rows

				$key4 = ContaBancariaPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = ContaBancariaPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = ContaBancariaPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ContaBancariaPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (LancamentoConta) to the collection in $obj4 (ContaBancaria)
				$obj4->addLancamentoConta($obj1);

			} // if joined row is not null

				// Add objects for joined ContaContabil rows

				$key5 = ContaContabilPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = ContaContabilPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = ContaContabilPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					ContaContabilPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (LancamentoConta) to the collection in $obj5 (ContaContabil)
				$obj5->addLancamentoConta($obj1);

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
	  $dbMap = Propel::getDatabaseMap(BaseLancamentoContaPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseLancamentoContaPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new LancamentoContaTableMap());
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
		return $withPrefix ? LancamentoContaPeer::CLASS_DEFAULT : LancamentoContaPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a LancamentoConta or Criteria object.
	 *
	 * @param      mixed $values Criteria or LancamentoConta object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(LancamentoContaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from LancamentoConta object
		}

		if ($criteria->containsKey(LancamentoContaPeer::ID) && $criteria->keyContainsValue(LancamentoContaPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.LancamentoContaPeer::ID.')');
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
	 * Method perform an UPDATE on the database, given a LancamentoConta or Criteria object.
	 *
	 * @param      mixed $values Criteria or LancamentoConta object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(LancamentoContaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(LancamentoContaPeer::ID);
			$selectCriteria->add(LancamentoContaPeer::ID, $criteria->remove(LancamentoContaPeer::ID), $comparison);

		} else { // $values is LancamentoConta object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the lancamento_conta table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(LancamentoContaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(LancamentoContaPeer::TABLE_NAME, $con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			LancamentoContaPeer::clearInstancePool();
			LancamentoContaPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a LancamentoConta or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or LancamentoConta object or primary key or array of primary keys
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
			$con = Propel::getConnection(LancamentoContaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			LancamentoContaPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof LancamentoConta) { // it's a model object
			// invalidate the cache for this single object
			LancamentoContaPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LancamentoContaPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				LancamentoContaPeer::removeInstanceFromPool($singleval);
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
			LancamentoContaPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given LancamentoConta object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      LancamentoConta $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(LancamentoConta $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LancamentoContaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LancamentoContaPeer::TABLE_NAME);

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

		return BasePeer::doValidate(LancamentoContaPeer::DATABASE_NAME, LancamentoContaPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     LancamentoConta
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = LancamentoContaPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(LancamentoContaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(LancamentoContaPeer::DATABASE_NAME);
		$criteria->add(LancamentoContaPeer::ID, $pk);

		$v = LancamentoContaPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(LancamentoContaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(LancamentoContaPeer::DATABASE_NAME);
			$criteria->add(LancamentoContaPeer::ID, $pks, Criteria::IN);
			$objs = LancamentoContaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseLancamentoContaPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseLancamentoContaPeer::buildTableMap();

