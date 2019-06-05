<?php

/**
 * Base static class for performing query and update operations on the 'contas_receber' table.
 *
 * 
 *
 * @package    pacoteFinanceiro.om
 */
abstract class BaseContasReceberPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'swsistema';

	/** the table name for this class */
	const TABLE_NAME = 'contas_receber';

	/** the related Propel class for this table */
	const OM_CLASS = 'ContasReceber';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'pacoteFinanceiro.ContasReceber';

	/** the related TableMap class for this table */
	const TM_CLASS = 'ContasReceberTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 16;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'contas_receber.ID';

	/** the column name for the PEDIDO_ID field */
	const PEDIDO_ID = 'contas_receber.PEDIDO_ID';

	/** the column name for the BANCO_ID field */
	const BANCO_ID = 'contas_receber.BANCO_ID';

	/** the column name for the CERTIFICADO_ID field */
	const CERTIFICADO_ID = 'contas_receber.CERTIFICADO_ID';

	/** the column name for the CONTA_CONTABIL_ID field */
	const CONTA_CONTABIL_ID = 'contas_receber.CONTA_CONTABIL_ID';

	/** the column name for the DESCRICAO field */
	const DESCRICAO = 'contas_receber.DESCRICAO';

	/** the column name for the DATA_DOCUMENTO field */
	const DATA_DOCUMENTO = 'contas_receber.DATA_DOCUMENTO';

	/** the column name for the DATA_PAGAMENTO field */
	const DATA_PAGAMENTO = 'contas_receber.DATA_PAGAMENTO';

	/** the column name for the VALOR_DOCUMENTO field */
	const VALOR_DOCUMENTO = 'contas_receber.VALOR_DOCUMENTO';

	/** the column name for the VENCIMENTO field */
	const VENCIMENTO = 'contas_receber.VENCIMENTO';

	/** the column name for the DESCONTO field */
	const DESCONTO = 'contas_receber.DESCONTO';

	/** the column name for the OBSERVACAO field */
	const OBSERVACAO = 'contas_receber.OBSERVACAO';

	/** the column name for the SITUACAO field */
	const SITUACAO = 'contas_receber.SITUACAO';

	/** the column name for the FORMA_PAGAMENTO_ID field */
	const FORMA_PAGAMENTO_ID = 'contas_receber.FORMA_PAGAMENTO_ID';

	/** the column name for the CODIGO_DOCUMENTO field */
	const CODIGO_DOCUMENTO = 'contas_receber.CODIGO_DOCUMENTO';

	/** the column name for the NOTA_FISCAL field */
	const NOTA_FISCAL = 'contas_receber.NOTA_FISCAL';

	/**
	 * An identiy map to hold any loaded instances of ContasReceber objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array ContasReceber[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'PedidoId', 'BancoId', 'CertificadoId', 'ContaContabilId', 'Descricao', 'DataDocumento', 'DataPagamento', 'ValorDocumento', 'Vencimento', 'Desconto', 'Observacao', 'Situacao', 'FormaPagamentoId', 'CodigoDocumento', 'NotaFiscal', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'pedidoId', 'bancoId', 'certificadoId', 'contaContabilId', 'descricao', 'dataDocumento', 'dataPagamento', 'valorDocumento', 'vencimento', 'desconto', 'observacao', 'situacao', 'formaPagamentoId', 'codigoDocumento', 'notaFiscal', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::PEDIDO_ID, self::BANCO_ID, self::CERTIFICADO_ID, self::CONTA_CONTABIL_ID, self::DESCRICAO, self::DATA_DOCUMENTO, self::DATA_PAGAMENTO, self::VALOR_DOCUMENTO, self::VENCIMENTO, self::DESCONTO, self::OBSERVACAO, self::SITUACAO, self::FORMA_PAGAMENTO_ID, self::CODIGO_DOCUMENTO, self::NOTA_FISCAL, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'pedido_id', 'banco_id', 'certificado_id', 'conta_contabil_id', 'descricao', 'data_documento', 'data_pagamento', 'valor_documento', 'vencimento', 'desconto', 'observacao', 'situacao', 'forma_pagamento_id', 'codigo_documento', 'nota_fiscal', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'PedidoId' => 1, 'BancoId' => 2, 'CertificadoId' => 3, 'ContaContabilId' => 4, 'Descricao' => 5, 'DataDocumento' => 6, 'DataPagamento' => 7, 'ValorDocumento' => 8, 'Vencimento' => 9, 'Desconto' => 10, 'Observacao' => 11, 'Situacao' => 12, 'FormaPagamentoId' => 13, 'CodigoDocumento' => 14, 'NotaFiscal' => 15, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'pedidoId' => 1, 'bancoId' => 2, 'certificadoId' => 3, 'contaContabilId' => 4, 'descricao' => 5, 'dataDocumento' => 6, 'dataPagamento' => 7, 'valorDocumento' => 8, 'vencimento' => 9, 'desconto' => 10, 'observacao' => 11, 'situacao' => 12, 'formaPagamentoId' => 13, 'codigoDocumento' => 14, 'notaFiscal' => 15, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::PEDIDO_ID => 1, self::BANCO_ID => 2, self::CERTIFICADO_ID => 3, self::CONTA_CONTABIL_ID => 4, self::DESCRICAO => 5, self::DATA_DOCUMENTO => 6, self::DATA_PAGAMENTO => 7, self::VALOR_DOCUMENTO => 8, self::VENCIMENTO => 9, self::DESCONTO => 10, self::OBSERVACAO => 11, self::SITUACAO => 12, self::FORMA_PAGAMENTO_ID => 13, self::CODIGO_DOCUMENTO => 14, self::NOTA_FISCAL => 15, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'pedido_id' => 1, 'banco_id' => 2, 'certificado_id' => 3, 'conta_contabil_id' => 4, 'descricao' => 5, 'data_documento' => 6, 'data_pagamento' => 7, 'valor_documento' => 8, 'vencimento' => 9, 'desconto' => 10, 'observacao' => 11, 'situacao' => 12, 'forma_pagamento_id' => 13, 'codigo_documento' => 14, 'nota_fiscal' => 15, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
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
	 * @param      string $column The column name for current table. (i.e. ContasReceberPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(ContasReceberPeer::TABLE_NAME.'.', $alias.'.', $column);
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
		$criteria->addSelectColumn(ContasReceberPeer::ID);
		$criteria->addSelectColumn(ContasReceberPeer::PEDIDO_ID);
		$criteria->addSelectColumn(ContasReceberPeer::BANCO_ID);
		$criteria->addSelectColumn(ContasReceberPeer::CERTIFICADO_ID);
		$criteria->addSelectColumn(ContasReceberPeer::CONTA_CONTABIL_ID);
		$criteria->addSelectColumn(ContasReceberPeer::DESCRICAO);
		$criteria->addSelectColumn(ContasReceberPeer::DATA_DOCUMENTO);
		$criteria->addSelectColumn(ContasReceberPeer::DATA_PAGAMENTO);
		$criteria->addSelectColumn(ContasReceberPeer::VALOR_DOCUMENTO);
		$criteria->addSelectColumn(ContasReceberPeer::VENCIMENTO);
		$criteria->addSelectColumn(ContasReceberPeer::DESCONTO);
		$criteria->addSelectColumn(ContasReceberPeer::OBSERVACAO);
		$criteria->addSelectColumn(ContasReceberPeer::SITUACAO);
		$criteria->addSelectColumn(ContasReceberPeer::FORMA_PAGAMENTO_ID);
		$criteria->addSelectColumn(ContasReceberPeer::CODIGO_DOCUMENTO);
		$criteria->addSelectColumn(ContasReceberPeer::NOTA_FISCAL);
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
		$criteria->setPrimaryTableName(ContasReceberPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ContasReceberPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(ContasReceberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return     ContasReceber
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = ContasReceberPeer::doSelect($critcopy, $con);
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
		return ContasReceberPeer::populateObjects(ContasReceberPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(ContasReceberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			ContasReceberPeer::addSelectColumns($criteria);
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
	 * @param      ContasReceber $value A ContasReceber object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(ContasReceber $obj, $key = null)
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
	 * @param      mixed $value A ContasReceber object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof ContasReceber) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or ContasReceber object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     ContasReceber Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to contas_receber
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
		$cls = ContasReceberPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = ContasReceberPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = ContasReceberPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				ContasReceberPeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
	}

	/**
	 * Returns the number of rows matching criteria, joining the related Banco table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinBanco(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ContasReceberPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ContasReceberPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ContasReceberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ContasReceberPeer::BANCO_ID, BancoPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(ContasReceberPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ContasReceberPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ContasReceberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ContasReceberPeer::CONTA_CONTABIL_ID, ContaContabilPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Pedido table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinPedido(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ContasReceberPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ContasReceberPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ContasReceberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ContasReceberPeer::PEDIDO_ID, PedidoPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Certificado table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinCertificado(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ContasReceberPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ContasReceberPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ContasReceberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ContasReceberPeer::CERTIFICADO_ID, CertificadoPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related FormaPagamento table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinFormaPagamento(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ContasReceberPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ContasReceberPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ContasReceberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ContasReceberPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

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
	 * Selects a collection of ContasReceber objects pre-filled with their Banco objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ContasReceber objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinBanco(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ContasReceberPeer::addSelectColumns($criteria);
		$startcol = (ContasReceberPeer::NUM_COLUMNS - ContasReceberPeer::NUM_LAZY_LOAD_COLUMNS);
		BancoPeer::addSelectColumns($criteria);

		$criteria->addJoin(ContasReceberPeer::BANCO_ID, BancoPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ContasReceberPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ContasReceberPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = ContasReceberPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ContasReceberPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = BancoPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = BancoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = BancoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					BancoPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded
				
				// Add the $obj1 (ContasReceber) to $obj2 (Banco)
				$obj2->addContasReceber($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of ContasReceber objects pre-filled with their ContaContabil objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ContasReceber objects.
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

		ContasReceberPeer::addSelectColumns($criteria);
		$startcol = (ContasReceberPeer::NUM_COLUMNS - ContasReceberPeer::NUM_LAZY_LOAD_COLUMNS);
		ContaContabilPeer::addSelectColumns($criteria);

		$criteria->addJoin(ContasReceberPeer::CONTA_CONTABIL_ID, ContaContabilPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ContasReceberPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ContasReceberPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = ContasReceberPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ContasReceberPeer::addInstanceToPool($obj1, $key1);
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
				
				// Add the $obj1 (ContasReceber) to $obj2 (ContaContabil)
				$obj2->addContasReceber($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of ContasReceber objects pre-filled with their Pedido objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ContasReceber objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinPedido(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ContasReceberPeer::addSelectColumns($criteria);
		$startcol = (ContasReceberPeer::NUM_COLUMNS - ContasReceberPeer::NUM_LAZY_LOAD_COLUMNS);
		PedidoPeer::addSelectColumns($criteria);

		$criteria->addJoin(ContasReceberPeer::PEDIDO_ID, PedidoPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ContasReceberPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ContasReceberPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = ContasReceberPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ContasReceberPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = PedidoPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = PedidoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = PedidoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					PedidoPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded
				
				// Add the $obj1 (ContasReceber) to $obj2 (Pedido)
				$obj2->addContasReceber($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of ContasReceber objects pre-filled with their Certificado objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ContasReceber objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinCertificado(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ContasReceberPeer::addSelectColumns($criteria);
		$startcol = (ContasReceberPeer::NUM_COLUMNS - ContasReceberPeer::NUM_LAZY_LOAD_COLUMNS);
		CertificadoPeer::addSelectColumns($criteria);

		$criteria->addJoin(ContasReceberPeer::CERTIFICADO_ID, CertificadoPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ContasReceberPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ContasReceberPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = ContasReceberPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ContasReceberPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = CertificadoPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = CertificadoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = CertificadoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					CertificadoPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded
				
				// Add the $obj1 (ContasReceber) to $obj2 (Certificado)
				$obj2->addContasReceber($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of ContasReceber objects pre-filled with their FormaPagamento objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ContasReceber objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinFormaPagamento(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ContasReceberPeer::addSelectColumns($criteria);
		$startcol = (ContasReceberPeer::NUM_COLUMNS - ContasReceberPeer::NUM_LAZY_LOAD_COLUMNS);
		FormaPagamentoPeer::addSelectColumns($criteria);

		$criteria->addJoin(ContasReceberPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ContasReceberPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ContasReceberPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = ContasReceberPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ContasReceberPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = FormaPagamentoPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = FormaPagamentoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = FormaPagamentoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					FormaPagamentoPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded
				
				// Add the $obj1 (ContasReceber) to $obj2 (FormaPagamento)
				$obj2->addContasReceber($obj1);

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
		$criteria->setPrimaryTableName(ContasReceberPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ContasReceberPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ContasReceberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ContasReceberPeer::BANCO_ID, BancoPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::CONTA_CONTABIL_ID, ContaContabilPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::PEDIDO_ID, PedidoPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::CERTIFICADO_ID, CertificadoPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

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
	 * Selects a collection of ContasReceber objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ContasReceber objects.
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

		ContasReceberPeer::addSelectColumns($criteria);
		$startcol2 = (ContasReceberPeer::NUM_COLUMNS - ContasReceberPeer::NUM_LAZY_LOAD_COLUMNS);

		BancoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (BancoPeer::NUM_COLUMNS - BancoPeer::NUM_LAZY_LOAD_COLUMNS);

		ContaContabilPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ContaContabilPeer::NUM_COLUMNS - ContaContabilPeer::NUM_LAZY_LOAD_COLUMNS);

		PedidoPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (PedidoPeer::NUM_COLUMNS - PedidoPeer::NUM_LAZY_LOAD_COLUMNS);

		CertificadoPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (CertificadoPeer::NUM_COLUMNS - CertificadoPeer::NUM_LAZY_LOAD_COLUMNS);

		FormaPagamentoPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (FormaPagamentoPeer::NUM_COLUMNS - FormaPagamentoPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(ContasReceberPeer::BANCO_ID, BancoPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::CONTA_CONTABIL_ID, ContaContabilPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::PEDIDO_ID, PedidoPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::CERTIFICADO_ID, CertificadoPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ContasReceberPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ContasReceberPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ContasReceberPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ContasReceberPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined Banco rows

			$key2 = BancoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = BancoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = BancoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					BancoPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (ContasReceber) to the collection in $obj2 (Banco)
				$obj2->addContasReceber($obj1);
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

				// Add the $obj1 (ContasReceber) to the collection in $obj3 (ContaContabil)
				$obj3->addContasReceber($obj1);
			} // if joined row not null

			// Add objects for joined Pedido rows

			$key4 = PedidoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = PedidoPeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$cls = PedidoPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					PedidoPeer::addInstanceToPool($obj4, $key4);
				} // if obj4 loaded

				// Add the $obj1 (ContasReceber) to the collection in $obj4 (Pedido)
				$obj4->addContasReceber($obj1);
			} // if joined row not null

			// Add objects for joined Certificado rows

			$key5 = CertificadoPeer::getPrimaryKeyHashFromRow($row, $startcol5);
			if ($key5 !== null) {
				$obj5 = CertificadoPeer::getInstanceFromPool($key5);
				if (!$obj5) {

					$cls = CertificadoPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					CertificadoPeer::addInstanceToPool($obj5, $key5);
				} // if obj5 loaded

				// Add the $obj1 (ContasReceber) to the collection in $obj5 (Certificado)
				$obj5->addContasReceber($obj1);
			} // if joined row not null

			// Add objects for joined FormaPagamento rows

			$key6 = FormaPagamentoPeer::getPrimaryKeyHashFromRow($row, $startcol6);
			if ($key6 !== null) {
				$obj6 = FormaPagamentoPeer::getInstanceFromPool($key6);
				if (!$obj6) {

					$cls = FormaPagamentoPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					FormaPagamentoPeer::addInstanceToPool($obj6, $key6);
				} // if obj6 loaded

				// Add the $obj1 (ContasReceber) to the collection in $obj6 (FormaPagamento)
				$obj6->addContasReceber($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Banco table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptBanco(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ContasReceberPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ContasReceberPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ContasReceberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(ContasReceberPeer::CONTA_CONTABIL_ID, ContaContabilPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::PEDIDO_ID, PedidoPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::CERTIFICADO_ID, CertificadoPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(ContasReceberPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ContasReceberPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ContasReceberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(ContasReceberPeer::BANCO_ID, BancoPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::PEDIDO_ID, PedidoPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::CERTIFICADO_ID, CertificadoPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Pedido table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptPedido(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ContasReceberPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ContasReceberPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ContasReceberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(ContasReceberPeer::BANCO_ID, BancoPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::CONTA_CONTABIL_ID, ContaContabilPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::CERTIFICADO_ID, CertificadoPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Certificado table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptCertificado(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ContasReceberPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ContasReceberPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ContasReceberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(ContasReceberPeer::BANCO_ID, BancoPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::CONTA_CONTABIL_ID, ContaContabilPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::PEDIDO_ID, PedidoPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related FormaPagamento table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptFormaPagamento(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ContasReceberPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ContasReceberPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ContasReceberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(ContasReceberPeer::BANCO_ID, BancoPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::CONTA_CONTABIL_ID, ContaContabilPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::PEDIDO_ID, PedidoPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::CERTIFICADO_ID, CertificadoPeer::ID, $join_behavior);

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
	 * Selects a collection of ContasReceber objects pre-filled with all related objects except Banco.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ContasReceber objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptBanco(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ContasReceberPeer::addSelectColumns($criteria);
		$startcol2 = (ContasReceberPeer::NUM_COLUMNS - ContasReceberPeer::NUM_LAZY_LOAD_COLUMNS);

		ContaContabilPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (ContaContabilPeer::NUM_COLUMNS - ContaContabilPeer::NUM_LAZY_LOAD_COLUMNS);

		PedidoPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (PedidoPeer::NUM_COLUMNS - PedidoPeer::NUM_LAZY_LOAD_COLUMNS);

		CertificadoPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (CertificadoPeer::NUM_COLUMNS - CertificadoPeer::NUM_LAZY_LOAD_COLUMNS);

		FormaPagamentoPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (FormaPagamentoPeer::NUM_COLUMNS - FormaPagamentoPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(ContasReceberPeer::CONTA_CONTABIL_ID, ContaContabilPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::PEDIDO_ID, PedidoPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::CERTIFICADO_ID, CertificadoPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ContasReceberPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ContasReceberPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ContasReceberPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ContasReceberPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (ContasReceber) to the collection in $obj2 (ContaContabil)
				$obj2->addContasReceber($obj1);

			} // if joined row is not null

				// Add objects for joined Pedido rows

				$key3 = PedidoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = PedidoPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = PedidoPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					PedidoPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (ContasReceber) to the collection in $obj3 (Pedido)
				$obj3->addContasReceber($obj1);

			} // if joined row is not null

				// Add objects for joined Certificado rows

				$key4 = CertificadoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = CertificadoPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = CertificadoPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					CertificadoPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (ContasReceber) to the collection in $obj4 (Certificado)
				$obj4->addContasReceber($obj1);

			} // if joined row is not null

				// Add objects for joined FormaPagamento rows

				$key5 = FormaPagamentoPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = FormaPagamentoPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = FormaPagamentoPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					FormaPagamentoPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (ContasReceber) to the collection in $obj5 (FormaPagamento)
				$obj5->addContasReceber($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of ContasReceber objects pre-filled with all related objects except ContaContabil.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ContasReceber objects.
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

		ContasReceberPeer::addSelectColumns($criteria);
		$startcol2 = (ContasReceberPeer::NUM_COLUMNS - ContasReceberPeer::NUM_LAZY_LOAD_COLUMNS);

		BancoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (BancoPeer::NUM_COLUMNS - BancoPeer::NUM_LAZY_LOAD_COLUMNS);

		PedidoPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (PedidoPeer::NUM_COLUMNS - PedidoPeer::NUM_LAZY_LOAD_COLUMNS);

		CertificadoPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (CertificadoPeer::NUM_COLUMNS - CertificadoPeer::NUM_LAZY_LOAD_COLUMNS);

		FormaPagamentoPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (FormaPagamentoPeer::NUM_COLUMNS - FormaPagamentoPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(ContasReceberPeer::BANCO_ID, BancoPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::PEDIDO_ID, PedidoPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::CERTIFICADO_ID, CertificadoPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ContasReceberPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ContasReceberPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ContasReceberPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ContasReceberPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Banco rows

				$key2 = BancoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = BancoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = BancoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					BancoPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (ContasReceber) to the collection in $obj2 (Banco)
				$obj2->addContasReceber($obj1);

			} // if joined row is not null

				// Add objects for joined Pedido rows

				$key3 = PedidoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = PedidoPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = PedidoPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					PedidoPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (ContasReceber) to the collection in $obj3 (Pedido)
				$obj3->addContasReceber($obj1);

			} // if joined row is not null

				// Add objects for joined Certificado rows

				$key4 = CertificadoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = CertificadoPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = CertificadoPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					CertificadoPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (ContasReceber) to the collection in $obj4 (Certificado)
				$obj4->addContasReceber($obj1);

			} // if joined row is not null

				// Add objects for joined FormaPagamento rows

				$key5 = FormaPagamentoPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = FormaPagamentoPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = FormaPagamentoPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					FormaPagamentoPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (ContasReceber) to the collection in $obj5 (FormaPagamento)
				$obj5->addContasReceber($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of ContasReceber objects pre-filled with all related objects except Pedido.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ContasReceber objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptPedido(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ContasReceberPeer::addSelectColumns($criteria);
		$startcol2 = (ContasReceberPeer::NUM_COLUMNS - ContasReceberPeer::NUM_LAZY_LOAD_COLUMNS);

		BancoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (BancoPeer::NUM_COLUMNS - BancoPeer::NUM_LAZY_LOAD_COLUMNS);

		ContaContabilPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ContaContabilPeer::NUM_COLUMNS - ContaContabilPeer::NUM_LAZY_LOAD_COLUMNS);

		CertificadoPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (CertificadoPeer::NUM_COLUMNS - CertificadoPeer::NUM_LAZY_LOAD_COLUMNS);

		FormaPagamentoPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (FormaPagamentoPeer::NUM_COLUMNS - FormaPagamentoPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(ContasReceberPeer::BANCO_ID, BancoPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::CONTA_CONTABIL_ID, ContaContabilPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::CERTIFICADO_ID, CertificadoPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ContasReceberPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ContasReceberPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ContasReceberPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ContasReceberPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Banco rows

				$key2 = BancoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = BancoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = BancoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					BancoPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (ContasReceber) to the collection in $obj2 (Banco)
				$obj2->addContasReceber($obj1);

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

				// Add the $obj1 (ContasReceber) to the collection in $obj3 (ContaContabil)
				$obj3->addContasReceber($obj1);

			} // if joined row is not null

				// Add objects for joined Certificado rows

				$key4 = CertificadoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = CertificadoPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = CertificadoPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					CertificadoPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (ContasReceber) to the collection in $obj4 (Certificado)
				$obj4->addContasReceber($obj1);

			} // if joined row is not null

				// Add objects for joined FormaPagamento rows

				$key5 = FormaPagamentoPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = FormaPagamentoPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = FormaPagamentoPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					FormaPagamentoPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (ContasReceber) to the collection in $obj5 (FormaPagamento)
				$obj5->addContasReceber($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of ContasReceber objects pre-filled with all related objects except Certificado.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ContasReceber objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptCertificado(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ContasReceberPeer::addSelectColumns($criteria);
		$startcol2 = (ContasReceberPeer::NUM_COLUMNS - ContasReceberPeer::NUM_LAZY_LOAD_COLUMNS);

		BancoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (BancoPeer::NUM_COLUMNS - BancoPeer::NUM_LAZY_LOAD_COLUMNS);

		ContaContabilPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ContaContabilPeer::NUM_COLUMNS - ContaContabilPeer::NUM_LAZY_LOAD_COLUMNS);

		PedidoPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (PedidoPeer::NUM_COLUMNS - PedidoPeer::NUM_LAZY_LOAD_COLUMNS);

		FormaPagamentoPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (FormaPagamentoPeer::NUM_COLUMNS - FormaPagamentoPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(ContasReceberPeer::BANCO_ID, BancoPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::CONTA_CONTABIL_ID, ContaContabilPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::PEDIDO_ID, PedidoPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ContasReceberPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ContasReceberPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ContasReceberPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ContasReceberPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Banco rows

				$key2 = BancoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = BancoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = BancoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					BancoPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (ContasReceber) to the collection in $obj2 (Banco)
				$obj2->addContasReceber($obj1);

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

				// Add the $obj1 (ContasReceber) to the collection in $obj3 (ContaContabil)
				$obj3->addContasReceber($obj1);

			} // if joined row is not null

				// Add objects for joined Pedido rows

				$key4 = PedidoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = PedidoPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = PedidoPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					PedidoPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (ContasReceber) to the collection in $obj4 (Pedido)
				$obj4->addContasReceber($obj1);

			} // if joined row is not null

				// Add objects for joined FormaPagamento rows

				$key5 = FormaPagamentoPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = FormaPagamentoPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = FormaPagamentoPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					FormaPagamentoPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (ContasReceber) to the collection in $obj5 (FormaPagamento)
				$obj5->addContasReceber($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of ContasReceber objects pre-filled with all related objects except FormaPagamento.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of ContasReceber objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptFormaPagamento(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ContasReceberPeer::addSelectColumns($criteria);
		$startcol2 = (ContasReceberPeer::NUM_COLUMNS - ContasReceberPeer::NUM_LAZY_LOAD_COLUMNS);

		BancoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (BancoPeer::NUM_COLUMNS - BancoPeer::NUM_LAZY_LOAD_COLUMNS);

		ContaContabilPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ContaContabilPeer::NUM_COLUMNS - ContaContabilPeer::NUM_LAZY_LOAD_COLUMNS);

		PedidoPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (PedidoPeer::NUM_COLUMNS - PedidoPeer::NUM_LAZY_LOAD_COLUMNS);

		CertificadoPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (CertificadoPeer::NUM_COLUMNS - CertificadoPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(ContasReceberPeer::BANCO_ID, BancoPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::CONTA_CONTABIL_ID, ContaContabilPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::PEDIDO_ID, PedidoPeer::ID, $join_behavior);

		$criteria->addJoin(ContasReceberPeer::CERTIFICADO_ID, CertificadoPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ContasReceberPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ContasReceberPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ContasReceberPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ContasReceberPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Banco rows

				$key2 = BancoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = BancoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = BancoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					BancoPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (ContasReceber) to the collection in $obj2 (Banco)
				$obj2->addContasReceber($obj1);

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

				// Add the $obj1 (ContasReceber) to the collection in $obj3 (ContaContabil)
				$obj3->addContasReceber($obj1);

			} // if joined row is not null

				// Add objects for joined Pedido rows

				$key4 = PedidoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = PedidoPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = PedidoPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					PedidoPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (ContasReceber) to the collection in $obj4 (Pedido)
				$obj4->addContasReceber($obj1);

			} // if joined row is not null

				// Add objects for joined Certificado rows

				$key5 = CertificadoPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = CertificadoPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = CertificadoPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					CertificadoPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (ContasReceber) to the collection in $obj5 (Certificado)
				$obj5->addContasReceber($obj1);

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
	  $dbMap = Propel::getDatabaseMap(BaseContasReceberPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseContasReceberPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new ContasReceberTableMap());
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
		return $withPrefix ? ContasReceberPeer::CLASS_DEFAULT : ContasReceberPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a ContasReceber or Criteria object.
	 *
	 * @param      mixed $values Criteria or ContasReceber object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ContasReceberPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from ContasReceber object
		}

		if ($criteria->containsKey(ContasReceberPeer::ID) && $criteria->keyContainsValue(ContasReceberPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.ContasReceberPeer::ID.')');
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
	 * Method perform an UPDATE on the database, given a ContasReceber or Criteria object.
	 *
	 * @param      mixed $values Criteria or ContasReceber object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ContasReceberPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(ContasReceberPeer::ID);
			$selectCriteria->add(ContasReceberPeer::ID, $criteria->remove(ContasReceberPeer::ID), $comparison);

		} else { // $values is ContasReceber object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the contas_receber table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ContasReceberPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(ContasReceberPeer::TABLE_NAME, $con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			ContasReceberPeer::clearInstancePool();
			ContasReceberPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a ContasReceber or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or ContasReceber object or primary key or array of primary keys
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
			$con = Propel::getConnection(ContasReceberPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			ContasReceberPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof ContasReceber) { // it's a model object
			// invalidate the cache for this single object
			ContasReceberPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ContasReceberPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				ContasReceberPeer::removeInstanceFromPool($singleval);
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
			ContasReceberPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given ContasReceber object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      ContasReceber $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(ContasReceber $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ContasReceberPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ContasReceberPeer::TABLE_NAME);

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

		return BasePeer::doValidate(ContasReceberPeer::DATABASE_NAME, ContasReceberPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     ContasReceber
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = ContasReceberPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(ContasReceberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(ContasReceberPeer::DATABASE_NAME);
		$criteria->add(ContasReceberPeer::ID, $pk);

		$v = ContasReceberPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(ContasReceberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(ContasReceberPeer::DATABASE_NAME);
			$criteria->add(ContasReceberPeer::ID, $pks, Criteria::IN);
			$objs = ContasReceberPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseContasReceberPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseContasReceberPeer::buildTableMap();

