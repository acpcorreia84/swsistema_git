<?php

/**
 * Base static class for performing query and update operations on the 'contas_pagar' table.
 *
 * 
 *
 * @package    pacoteFinanceiro.om
 */
abstract class BaseContasPagarPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'swsistema';

	/** the table name for this class */
	const TABLE_NAME = 'contas_pagar';

	/** the related Propel class for this table */
	const OM_CLASS = 'ContasPagar';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'pacoteFinanceiro.ContasPagar';

	/** the related TableMap class for this table */
	const TM_CLASS = 'ContasPagarTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 14;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'contas_pagar.ID';

	/** the column name for the CONTA_PAGAR_ID field */
	const CONTA_PAGAR_ID = 'contas_pagar.CONTA_PAGAR_ID';

	/** the column name for the CONTA_CONTABIL_ID field */
	const CONTA_CONTABIL_ID = 'contas_pagar.CONTA_CONTABIL_ID';

	/** the column name for the LANCAMENTO_CAIXA_ID field */
	const LANCAMENTO_CAIXA_ID = 'contas_pagar.LANCAMENTO_CAIXA_ID';

	/** the column name for the DATA_PAGAMENTO field */
	const DATA_PAGAMENTO = 'contas_pagar.DATA_PAGAMENTO';

	/** the column name for the DATA_DOCUMENTO field */
	const DATA_DOCUMENTO = 'contas_pagar.DATA_DOCUMENTO';

	/** the column name for the DESCRICAO field */
	const DESCRICAO = 'contas_pagar.DESCRICAO';

	/** the column name for the VALOR_DOCUMENTO field */
	const VALOR_DOCUMENTO = 'contas_pagar.VALOR_DOCUMENTO';

	/** the column name for the VALOR_RESTANTE field */
	const VALOR_RESTANTE = 'contas_pagar.VALOR_RESTANTE';

	/** the column name for the VENCIMENTO field */
	const VENCIMENTO = 'contas_pagar.VENCIMENTO';

	/** the column name for the DESCONTO field */
	const DESCONTO = 'contas_pagar.DESCONTO';

	/** the column name for the OBSERVACAO field */
	const OBSERVACAO = 'contas_pagar.OBSERVACAO';

	/** the column name for the MOTIVO_DESCONTO field */
	const MOTIVO_DESCONTO = 'contas_pagar.MOTIVO_DESCONTO';

	/** the column name for the SITUACAO field */
	const SITUACAO = 'contas_pagar.SITUACAO';

	/**
	 * An identiy map to hold any loaded instances of ContasPagar objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array ContasPagar[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'ContaPagarId', 'ContaContabilId', 'LancamentoCaixaId', 'DataPagamento', 'DataDocumento', 'Descricao', 'ValorDocumento', 'ValorRestante', 'Vencimento', 'Desconto', 'Observacao', 'MotivoDesconto', 'Situacao', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'contaPagarId', 'contaContabilId', 'lancamentoCaixaId', 'dataPagamento', 'dataDocumento', 'descricao', 'valorDocumento', 'valorRestante', 'vencimento', 'desconto', 'observacao', 'motivoDesconto', 'situacao', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::CONTA_PAGAR_ID, self::CONTA_CONTABIL_ID, self::LANCAMENTO_CAIXA_ID, self::DATA_PAGAMENTO, self::DATA_DOCUMENTO, self::DESCRICAO, self::VALOR_DOCUMENTO, self::VALOR_RESTANTE, self::VENCIMENTO, self::DESCONTO, self::OBSERVACAO, self::MOTIVO_DESCONTO, self::SITUACAO, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'conta_pagar_id', 'conta_contabil_id', 'lancamento_caixa_id', 'data_pagamento', 'data_documento', 'descricao', 'valor_documento', 'valor_restante', 'vencimento', 'desconto', 'observacao', 'motivo_desconto', 'situacao', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'ContaPagarId' => 1, 'ContaContabilId' => 2, 'LancamentoCaixaId' => 3, 'DataPagamento' => 4, 'DataDocumento' => 5, 'Descricao' => 6, 'ValorDocumento' => 7, 'ValorRestante' => 8, 'Vencimento' => 9, 'Desconto' => 10, 'Observacao' => 11, 'MotivoDesconto' => 12, 'Situacao' => 13, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'contaPagarId' => 1, 'contaContabilId' => 2, 'lancamentoCaixaId' => 3, 'dataPagamento' => 4, 'dataDocumento' => 5, 'descricao' => 6, 'valorDocumento' => 7, 'valorRestante' => 8, 'vencimento' => 9, 'desconto' => 10, 'observacao' => 11, 'motivoDesconto' => 12, 'situacao' => 13, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::CONTA_PAGAR_ID => 1, self::CONTA_CONTABIL_ID => 2, self::LANCAMENTO_CAIXA_ID => 3, self::DATA_PAGAMENTO => 4, self::DATA_DOCUMENTO => 5, self::DESCRICAO => 6, self::VALOR_DOCUMENTO => 7, self::VALOR_RESTANTE => 8, self::VENCIMENTO => 9, self::DESCONTO => 10, self::OBSERVACAO => 11, self::MOTIVO_DESCONTO => 12, self::SITUACAO => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'conta_pagar_id' => 1, 'conta_contabil_id' => 2, 'lancamento_caixa_id' => 3, 'data_pagamento' => 4, 'data_documento' => 5, 'descricao' => 6, 'valor_documento' => 7, 'valor_restante' => 8, 'vencimento' => 9, 'desconto' => 10, 'observacao' => 11, 'motivo_desconto' => 12, 'situacao' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
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
	 * @param      string $column The column name for current table. (i.e. ContasPagarPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(ContasPagarPeer::TABLE_NAME.'.', $alias.'.', $column);
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
		$criteria->addSelectColumn(ContasPagarPeer::ID);
		$criteria->addSelectColumn(ContasPagarPeer::CONTA_PAGAR_ID);
		$criteria->addSelectColumn(ContasPagarPeer::CONTA_CONTABIL_ID);
		$criteria->addSelectColumn(ContasPagarPeer::LANCAMENTO_CAIXA_ID);
		$criteria->addSelectColumn(ContasPagarPeer::DATA_PAGAMENTO);
		$criteria->addSelectColumn(ContasPagarPeer::DATA_DOCUMENTO);
		$criteria->addSelectColumn(ContasPagarPeer::DESCRICAO);
		$criteria->addSelectColumn(ContasPagarPeer::VALOR_DOCUMENTO);
		$criteria->addSelectColumn(ContasPagarPeer::VALOR_RESTANTE);
		$criteria->addSelectColumn(ContasPagarPeer::VENCIMENTO);
		$criteria->addSelectColumn(ContasPagarPeer::DESCONTO);
		$criteria->addSelectColumn(ContasPagarPeer::OBSERVACAO);
		$criteria->addSelectColumn(ContasPagarPeer::MOTIVO_DESCONTO);
		$criteria->addSelectColumn(ContasPagarPeer::SITUACAO);
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
		$criteria->setPrimaryTableName(ContasPagarPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ContasPagarPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(ContasPagarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return     ContasPagar
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = ContasPagarPeer::doSelect($critcopy, $con);
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
		return ContasPagarPeer::populateObjects(ContasPagarPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(ContasPagarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			ContasPagarPeer::addSelectColumns($criteria);
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
	 * @param      ContasPagar $value A ContasPagar object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(ContasPagar $obj, $key = null)
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
	 * @param      mixed $value A ContasPagar object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof ContasPagar) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or ContasPagar object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     ContasPagar Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to contas_pagar
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
		$cls = ContasPagarPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = ContasPagarPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = ContasPagarPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				ContasPagarPeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
	}

	/**
	 * Returns the number of rows matching criteria, joining the related LancamentoCaixa table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinLancamentoCaixa(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ContasPagarPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ContasPagarPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ContasPagarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ContasPagarPeer::LANCAMENTO_CAIXA_ID, LancamentoCaixaPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(ContasPagarPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ContasPagarPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ContasPagarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ContasPagarPeer::CONTA_CONTABIL_ID, ContaContabilPeer::ID, $join_behavior);

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
	 * Selects a collection of ContasPagar objects pre-filled with their LancamentoCaixa objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ContasPagar objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinLancamentoCaixa(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ContasPagarPeer::addSelectColumns($criteria);
		$startcol = (ContasPagarPeer::NUM_COLUMNS - ContasPagarPeer::NUM_LAZY_LOAD_COLUMNS);
		LancamentoCaixaPeer::addSelectColumns($criteria);

		$criteria->addJoin(ContasPagarPeer::LANCAMENTO_CAIXA_ID, LancamentoCaixaPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ContasPagarPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ContasPagarPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = ContasPagarPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ContasPagarPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = LancamentoCaixaPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = LancamentoCaixaPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = LancamentoCaixaPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					LancamentoCaixaPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded
				
				// Add the $obj1 (ContasPagar) to $obj2 (LancamentoCaixa)
				$obj2->addContasPagar($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of ContasPagar objects pre-filled with their ContaContabil objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ContasPagar objects.
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

		ContasPagarPeer::addSelectColumns($criteria);
		$startcol = (ContasPagarPeer::NUM_COLUMNS - ContasPagarPeer::NUM_LAZY_LOAD_COLUMNS);
		ContaContabilPeer::addSelectColumns($criteria);

		$criteria->addJoin(ContasPagarPeer::CONTA_CONTABIL_ID, ContaContabilPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ContasPagarPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ContasPagarPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = ContasPagarPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ContasPagarPeer::addInstanceToPool($obj1, $key1);
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
				
				// Add the $obj1 (ContasPagar) to $obj2 (ContaContabil)
				$obj2->addContasPagar($obj1);

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
		$criteria->setPrimaryTableName(ContasPagarPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ContasPagarPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ContasPagarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ContasPagarPeer::LANCAMENTO_CAIXA_ID, LancamentoCaixaPeer::ID, $join_behavior);

		$criteria->addJoin(ContasPagarPeer::CONTA_CONTABIL_ID, ContaContabilPeer::ID, $join_behavior);

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
	 * Selects a collection of ContasPagar objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ContasPagar objects.
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

		ContasPagarPeer::addSelectColumns($criteria);
		$startcol2 = (ContasPagarPeer::NUM_COLUMNS - ContasPagarPeer::NUM_LAZY_LOAD_COLUMNS);

		LancamentoCaixaPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (LancamentoCaixaPeer::NUM_COLUMNS - LancamentoCaixaPeer::NUM_LAZY_LOAD_COLUMNS);

		ContaContabilPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ContaContabilPeer::NUM_COLUMNS - ContaContabilPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(ContasPagarPeer::LANCAMENTO_CAIXA_ID, LancamentoCaixaPeer::ID, $join_behavior);

		$criteria->addJoin(ContasPagarPeer::CONTA_CONTABIL_ID, ContaContabilPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ContasPagarPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ContasPagarPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ContasPagarPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ContasPagarPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined LancamentoCaixa rows

			$key2 = LancamentoCaixaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = LancamentoCaixaPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = LancamentoCaixaPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					LancamentoCaixaPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (ContasPagar) to the collection in $obj2 (LancamentoCaixa)
				$obj2->addContasPagar($obj1);
			} // if joined row not null

			// Add objects for joined ContaContabil rows

			$key3 = ContaContabilPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = ContaContabilPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$cls = ContaContabilPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ContaContabilPeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (ContasPagar) to the collection in $obj3 (ContaContabil)
				$obj3->addContasPagar($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related ContasPagarRelatedByContaPagarId table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptContasPagarRelatedByContaPagarId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ContasPagarPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ContasPagarPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ContasPagarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(ContasPagarPeer::LANCAMENTO_CAIXA_ID, LancamentoCaixaPeer::ID, $join_behavior);

		$criteria->addJoin(ContasPagarPeer::CONTA_CONTABIL_ID, ContaContabilPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related LancamentoCaixa table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptLancamentoCaixa(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ContasPagarPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ContasPagarPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ContasPagarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(ContasPagarPeer::CONTA_CONTABIL_ID, ContaContabilPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(ContasPagarPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ContasPagarPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ContasPagarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(ContasPagarPeer::LANCAMENTO_CAIXA_ID, LancamentoCaixaPeer::ID, $join_behavior);

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
	 * Selects a collection of ContasPagar objects pre-filled with all related objects except ContasPagarRelatedByContaPagarId.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ContasPagar objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptContasPagarRelatedByContaPagarId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ContasPagarPeer::addSelectColumns($criteria);
		$startcol2 = (ContasPagarPeer::NUM_COLUMNS - ContasPagarPeer::NUM_LAZY_LOAD_COLUMNS);

		LancamentoCaixaPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (LancamentoCaixaPeer::NUM_COLUMNS - LancamentoCaixaPeer::NUM_LAZY_LOAD_COLUMNS);

		ContaContabilPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ContaContabilPeer::NUM_COLUMNS - ContaContabilPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(ContasPagarPeer::LANCAMENTO_CAIXA_ID, LancamentoCaixaPeer::ID, $join_behavior);

		$criteria->addJoin(ContasPagarPeer::CONTA_CONTABIL_ID, ContaContabilPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ContasPagarPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ContasPagarPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ContasPagarPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ContasPagarPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined LancamentoCaixa rows

				$key2 = LancamentoCaixaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = LancamentoCaixaPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = LancamentoCaixaPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					LancamentoCaixaPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (ContasPagar) to the collection in $obj2 (LancamentoCaixa)
				$obj2->addContasPagar($obj1);

			} // if joined row is not null

				// Add objects for joined ContaContabil rows

				$key3 = ContaContabilPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ContaContabilPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ContaContabilPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ContaContabilPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (ContasPagar) to the collection in $obj3 (ContaContabil)
				$obj3->addContasPagar($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of ContasPagar objects pre-filled with all related objects except LancamentoCaixa.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ContasPagar objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptLancamentoCaixa(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ContasPagarPeer::addSelectColumns($criteria);
		$startcol2 = (ContasPagarPeer::NUM_COLUMNS - ContasPagarPeer::NUM_LAZY_LOAD_COLUMNS);

		ContaContabilPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (ContaContabilPeer::NUM_COLUMNS - ContaContabilPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(ContasPagarPeer::CONTA_CONTABIL_ID, ContaContabilPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ContasPagarPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ContasPagarPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ContasPagarPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ContasPagarPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined ContaContabil rows

				$key2 = ContaContabilPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = ContaContabilPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = ContaContabilPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ContaContabilPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (ContasPagar) to the collection in $obj2 (ContaContabil)
				$obj2->addContasPagar($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of ContasPagar objects pre-filled with all related objects except ContaContabil.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ContasPagar objects.
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

		ContasPagarPeer::addSelectColumns($criteria);
		$startcol2 = (ContasPagarPeer::NUM_COLUMNS - ContasPagarPeer::NUM_LAZY_LOAD_COLUMNS);

		LancamentoCaixaPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (LancamentoCaixaPeer::NUM_COLUMNS - LancamentoCaixaPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(ContasPagarPeer::LANCAMENTO_CAIXA_ID, LancamentoCaixaPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ContasPagarPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ContasPagarPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ContasPagarPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ContasPagarPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined LancamentoCaixa rows

				$key2 = LancamentoCaixaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = LancamentoCaixaPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = LancamentoCaixaPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					LancamentoCaixaPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (ContasPagar) to the collection in $obj2 (LancamentoCaixa)
				$obj2->addContasPagar($obj1);

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
	  $dbMap = Propel::getDatabaseMap(BaseContasPagarPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseContasPagarPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new ContasPagarTableMap());
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
		return $withPrefix ? ContasPagarPeer::CLASS_DEFAULT : ContasPagarPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a ContasPagar or Criteria object.
	 *
	 * @param      mixed $values Criteria or ContasPagar object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ContasPagarPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from ContasPagar object
		}

		if ($criteria->containsKey(ContasPagarPeer::ID) && $criteria->keyContainsValue(ContasPagarPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.ContasPagarPeer::ID.')');
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
	 * Method perform an UPDATE on the database, given a ContasPagar or Criteria object.
	 *
	 * @param      mixed $values Criteria or ContasPagar object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ContasPagarPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(ContasPagarPeer::ID);
			$selectCriteria->add(ContasPagarPeer::ID, $criteria->remove(ContasPagarPeer::ID), $comparison);

		} else { // $values is ContasPagar object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the contas_pagar table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ContasPagarPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(ContasPagarPeer::TABLE_NAME, $con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			ContasPagarPeer::clearInstancePool();
			ContasPagarPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a ContasPagar or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or ContasPagar object or primary key or array of primary keys
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
			$con = Propel::getConnection(ContasPagarPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			ContasPagarPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof ContasPagar) { // it's a model object
			// invalidate the cache for this single object
			ContasPagarPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ContasPagarPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				ContasPagarPeer::removeInstanceFromPool($singleval);
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
			ContasPagarPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given ContasPagar object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      ContasPagar $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(ContasPagar $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ContasPagarPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ContasPagarPeer::TABLE_NAME);

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

		return BasePeer::doValidate(ContasPagarPeer::DATABASE_NAME, ContasPagarPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     ContasPagar
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = ContasPagarPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(ContasPagarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(ContasPagarPeer::DATABASE_NAME);
		$criteria->add(ContasPagarPeer::ID, $pk);

		$v = ContasPagarPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(ContasPagarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(ContasPagarPeer::DATABASE_NAME);
			$criteria->add(ContasPagarPeer::ID, $pks, Criteria::IN);
			$objs = ContasPagarPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseContasPagarPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseContasPagarPeer::buildTableMap();

