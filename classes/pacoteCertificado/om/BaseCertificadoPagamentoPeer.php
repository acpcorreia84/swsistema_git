<?php

/**
 * Base static class for performing query and update operations on the 'certificado_pagamento' table.
 *
 * 
 *
 * @package    pacoteCertificado.om
 */
abstract class BaseCertificadoPagamentoPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'swsistema';

	/** the table name for this class */
	const TABLE_NAME = 'certificado_pagamento';

	/** the related Propel class for this table */
	const OM_CLASS = 'CertificadoPagamento';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'pacoteCertificado.CertificadoPagamento';

	/** the related TableMap class for this table */
	const TM_CLASS = 'CertificadoPagamentoTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 12;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'certificado_pagamento.ID';

	/** the column name for the DATA_PAGAMENTO field */
	const DATA_PAGAMENTO = 'certificado_pagamento.DATA_PAGAMENTO';

	/** the column name for the DATA_CONFIRMACAO_PAGAMENTO field */
	const DATA_CONFIRMACAO_PAGAMENTO = 'certificado_pagamento.DATA_CONFIRMACAO_PAGAMENTO';

	/** the column name for the CERTIFICADO_ID field */
	const CERTIFICADO_ID = 'certificado_pagamento.CERTIFICADO_ID';

	/** the column name for the PEDIDO_ID field */
	const PEDIDO_ID = 'certificado_pagamento.PEDIDO_ID';

	/** the column name for the DATA_INCLUSAO field */
	const DATA_INCLUSAO = 'certificado_pagamento.DATA_INCLUSAO';

	/** the column name for the VALOR field */
	const VALOR = 'certificado_pagamento.VALOR';

	/** the column name for the CODIGO_PAGAMENTO field */
	const CODIGO_PAGAMENTO = 'certificado_pagamento.CODIGO_PAGAMENTO';

	/** the column name for the FORMA_PAGAMENTO_ID field */
	const FORMA_PAGAMENTO_ID = 'certificado_pagamento.FORMA_PAGAMENTO_ID';

	/** the column name for the QUANTIDADE_PARCELAS field */
	const QUANTIDADE_PARCELAS = 'certificado_pagamento.QUANTIDADE_PARCELAS';

	/** the column name for the COMPROVANTE_PAGAMENTO field */
	const COMPROVANTE_PAGAMENTO = 'certificado_pagamento.COMPROVANTE_PAGAMENTO';

	/** the column name for the OBSERVACAO field */
	const OBSERVACAO = 'certificado_pagamento.OBSERVACAO';

	/**
	 * An identiy map to hold any loaded instances of CertificadoPagamento objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array CertificadoPagamento[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'DataPagamento', 'DataConfirmacaoPagamento', 'CertificadoId', 'PedidoId', 'DataInclusao', 'Valor', 'CodigoPagamento', 'FormaPagamentoId', 'QuantidadeParcelas', 'ComprovantePagamento', 'Observacao', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'dataPagamento', 'dataConfirmacaoPagamento', 'certificadoId', 'pedidoId', 'dataInclusao', 'valor', 'codigoPagamento', 'formaPagamentoId', 'quantidadeParcelas', 'comprovantePagamento', 'observacao', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::DATA_PAGAMENTO, self::DATA_CONFIRMACAO_PAGAMENTO, self::CERTIFICADO_ID, self::PEDIDO_ID, self::DATA_INCLUSAO, self::VALOR, self::CODIGO_PAGAMENTO, self::FORMA_PAGAMENTO_ID, self::QUANTIDADE_PARCELAS, self::COMPROVANTE_PAGAMENTO, self::OBSERVACAO, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'data_pagamento', 'data_confirmacao_pagamento', 'certificado_id', 'pedido_id', 'data_inclusao', 'valor', 'codigo_pagamento', 'forma_pagamento_id', 'quantidade_parcelas', 'comprovante_pagamento', 'observacao', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'DataPagamento' => 1, 'DataConfirmacaoPagamento' => 2, 'CertificadoId' => 3, 'PedidoId' => 4, 'DataInclusao' => 5, 'Valor' => 6, 'CodigoPagamento' => 7, 'FormaPagamentoId' => 8, 'QuantidadeParcelas' => 9, 'ComprovantePagamento' => 10, 'Observacao' => 11, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'dataPagamento' => 1, 'dataConfirmacaoPagamento' => 2, 'certificadoId' => 3, 'pedidoId' => 4, 'dataInclusao' => 5, 'valor' => 6, 'codigoPagamento' => 7, 'formaPagamentoId' => 8, 'quantidadeParcelas' => 9, 'comprovantePagamento' => 10, 'observacao' => 11, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::DATA_PAGAMENTO => 1, self::DATA_CONFIRMACAO_PAGAMENTO => 2, self::CERTIFICADO_ID => 3, self::PEDIDO_ID => 4, self::DATA_INCLUSAO => 5, self::VALOR => 6, self::CODIGO_PAGAMENTO => 7, self::FORMA_PAGAMENTO_ID => 8, self::QUANTIDADE_PARCELAS => 9, self::COMPROVANTE_PAGAMENTO => 10, self::OBSERVACAO => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'data_pagamento' => 1, 'data_confirmacao_pagamento' => 2, 'certificado_id' => 3, 'pedido_id' => 4, 'data_inclusao' => 5, 'valor' => 6, 'codigo_pagamento' => 7, 'forma_pagamento_id' => 8, 'quantidade_parcelas' => 9, 'comprovante_pagamento' => 10, 'observacao' => 11, ),
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
	 * @param      string $column The column name for current table. (i.e. CertificadoPagamentoPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(CertificadoPagamentoPeer::TABLE_NAME.'.', $alias.'.', $column);
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
		$criteria->addSelectColumn(CertificadoPagamentoPeer::ID);
		$criteria->addSelectColumn(CertificadoPagamentoPeer::DATA_PAGAMENTO);
		$criteria->addSelectColumn(CertificadoPagamentoPeer::DATA_CONFIRMACAO_PAGAMENTO);
		$criteria->addSelectColumn(CertificadoPagamentoPeer::CERTIFICADO_ID);
		$criteria->addSelectColumn(CertificadoPagamentoPeer::PEDIDO_ID);
		$criteria->addSelectColumn(CertificadoPagamentoPeer::DATA_INCLUSAO);
		$criteria->addSelectColumn(CertificadoPagamentoPeer::VALOR);
		$criteria->addSelectColumn(CertificadoPagamentoPeer::CODIGO_PAGAMENTO);
		$criteria->addSelectColumn(CertificadoPagamentoPeer::FORMA_PAGAMENTO_ID);
		$criteria->addSelectColumn(CertificadoPagamentoPeer::QUANTIDADE_PARCELAS);
		$criteria->addSelectColumn(CertificadoPagamentoPeer::COMPROVANTE_PAGAMENTO);
		$criteria->addSelectColumn(CertificadoPagamentoPeer::OBSERVACAO);
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
		$criteria->setPrimaryTableName(CertificadoPagamentoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CertificadoPagamentoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPagamentoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return     CertificadoPagamento
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = CertificadoPagamentoPeer::doSelect($critcopy, $con);
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
		return CertificadoPagamentoPeer::populateObjects(CertificadoPagamentoPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(CertificadoPagamentoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			CertificadoPagamentoPeer::addSelectColumns($criteria);
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
	 * @param      CertificadoPagamento $value A CertificadoPagamento object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(CertificadoPagamento $obj, $key = null)
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
	 * @param      mixed $value A CertificadoPagamento object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof CertificadoPagamento) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or CertificadoPagamento object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     CertificadoPagamento Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to certificado_pagamento
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
		$cls = CertificadoPagamentoPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = CertificadoPagamentoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = CertificadoPagamentoPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				CertificadoPagamentoPeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
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
		$criteria->setPrimaryTableName(CertificadoPagamentoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CertificadoPagamentoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPagamentoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(CertificadoPagamentoPeer::CERTIFICADO_ID, CertificadoPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(CertificadoPagamentoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CertificadoPagamentoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPagamentoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(CertificadoPagamentoPeer::PEDIDO_ID, PedidoPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(CertificadoPagamentoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CertificadoPagamentoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPagamentoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(CertificadoPagamentoPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

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
	 * Selects a collection of CertificadoPagamento objects pre-filled with their Certificado objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of CertificadoPagamento objects.
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

		CertificadoPagamentoPeer::addSelectColumns($criteria);
		$startcol = (CertificadoPagamentoPeer::NUM_COLUMNS - CertificadoPagamentoPeer::NUM_LAZY_LOAD_COLUMNS);
		CertificadoPeer::addSelectColumns($criteria);

		$criteria->addJoin(CertificadoPagamentoPeer::CERTIFICADO_ID, CertificadoPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CertificadoPagamentoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CertificadoPagamentoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = CertificadoPagamentoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CertificadoPagamentoPeer::addInstanceToPool($obj1, $key1);
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
				
				// Add the $obj1 (CertificadoPagamento) to $obj2 (Certificado)
				$obj2->addCertificadoPagamento($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of CertificadoPagamento objects pre-filled with their Pedido objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of CertificadoPagamento objects.
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

		CertificadoPagamentoPeer::addSelectColumns($criteria);
		$startcol = (CertificadoPagamentoPeer::NUM_COLUMNS - CertificadoPagamentoPeer::NUM_LAZY_LOAD_COLUMNS);
		PedidoPeer::addSelectColumns($criteria);

		$criteria->addJoin(CertificadoPagamentoPeer::PEDIDO_ID, PedidoPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CertificadoPagamentoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CertificadoPagamentoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = CertificadoPagamentoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CertificadoPagamentoPeer::addInstanceToPool($obj1, $key1);
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
				
				// Add the $obj1 (CertificadoPagamento) to $obj2 (Pedido)
				$obj2->addCertificadoPagamento($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of CertificadoPagamento objects pre-filled with their FormaPagamento objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of CertificadoPagamento objects.
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

		CertificadoPagamentoPeer::addSelectColumns($criteria);
		$startcol = (CertificadoPagamentoPeer::NUM_COLUMNS - CertificadoPagamentoPeer::NUM_LAZY_LOAD_COLUMNS);
		FormaPagamentoPeer::addSelectColumns($criteria);

		$criteria->addJoin(CertificadoPagamentoPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CertificadoPagamentoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CertificadoPagamentoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = CertificadoPagamentoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CertificadoPagamentoPeer::addInstanceToPool($obj1, $key1);
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
				
				// Add the $obj1 (CertificadoPagamento) to $obj2 (FormaPagamento)
				$obj2->addCertificadoPagamento($obj1);

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
		$criteria->setPrimaryTableName(CertificadoPagamentoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CertificadoPagamentoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPagamentoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(CertificadoPagamentoPeer::CERTIFICADO_ID, CertificadoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPagamentoPeer::PEDIDO_ID, PedidoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPagamentoPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

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
	 * Selects a collection of CertificadoPagamento objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of CertificadoPagamento objects.
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

		CertificadoPagamentoPeer::addSelectColumns($criteria);
		$startcol2 = (CertificadoPagamentoPeer::NUM_COLUMNS - CertificadoPagamentoPeer::NUM_LAZY_LOAD_COLUMNS);

		CertificadoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (CertificadoPeer::NUM_COLUMNS - CertificadoPeer::NUM_LAZY_LOAD_COLUMNS);

		PedidoPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (PedidoPeer::NUM_COLUMNS - PedidoPeer::NUM_LAZY_LOAD_COLUMNS);

		FormaPagamentoPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (FormaPagamentoPeer::NUM_COLUMNS - FormaPagamentoPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(CertificadoPagamentoPeer::CERTIFICADO_ID, CertificadoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPagamentoPeer::PEDIDO_ID, PedidoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPagamentoPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CertificadoPagamentoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CertificadoPagamentoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = CertificadoPagamentoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CertificadoPagamentoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined Certificado rows

			$key2 = CertificadoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = CertificadoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = CertificadoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					CertificadoPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (CertificadoPagamento) to the collection in $obj2 (Certificado)
				$obj2->addCertificadoPagamento($obj1);
			} // if joined row not null

			// Add objects for joined Pedido rows

			$key3 = PedidoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = PedidoPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$cls = PedidoPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					PedidoPeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (CertificadoPagamento) to the collection in $obj3 (Pedido)
				$obj3->addCertificadoPagamento($obj1);
			} // if joined row not null

			// Add objects for joined FormaPagamento rows

			$key4 = FormaPagamentoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = FormaPagamentoPeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$cls = FormaPagamentoPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					FormaPagamentoPeer::addInstanceToPool($obj4, $key4);
				} // if obj4 loaded

				// Add the $obj1 (CertificadoPagamento) to the collection in $obj4 (FormaPagamento)
				$obj4->addCertificadoPagamento($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
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
		$criteria->setPrimaryTableName(CertificadoPagamentoPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CertificadoPagamentoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPagamentoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(CertificadoPagamentoPeer::PEDIDO_ID, PedidoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPagamentoPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(CertificadoPagamentoPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CertificadoPagamentoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPagamentoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(CertificadoPagamentoPeer::CERTIFICADO_ID, CertificadoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPagamentoPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(CertificadoPagamentoPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CertificadoPagamentoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPagamentoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(CertificadoPagamentoPeer::CERTIFICADO_ID, CertificadoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPagamentoPeer::PEDIDO_ID, PedidoPeer::ID, $join_behavior);

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
	 * Selects a collection of CertificadoPagamento objects pre-filled with all related objects except Certificado.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of CertificadoPagamento objects.
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

		CertificadoPagamentoPeer::addSelectColumns($criteria);
		$startcol2 = (CertificadoPagamentoPeer::NUM_COLUMNS - CertificadoPagamentoPeer::NUM_LAZY_LOAD_COLUMNS);

		PedidoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (PedidoPeer::NUM_COLUMNS - PedidoPeer::NUM_LAZY_LOAD_COLUMNS);

		FormaPagamentoPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (FormaPagamentoPeer::NUM_COLUMNS - FormaPagamentoPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(CertificadoPagamentoPeer::PEDIDO_ID, PedidoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPagamentoPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CertificadoPagamentoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CertificadoPagamentoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = CertificadoPagamentoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CertificadoPagamentoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Pedido rows

				$key2 = PedidoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = PedidoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = PedidoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					PedidoPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (CertificadoPagamento) to the collection in $obj2 (Pedido)
				$obj2->addCertificadoPagamento($obj1);

			} // if joined row is not null

				// Add objects for joined FormaPagamento rows

				$key3 = FormaPagamentoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = FormaPagamentoPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = FormaPagamentoPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					FormaPagamentoPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (CertificadoPagamento) to the collection in $obj3 (FormaPagamento)
				$obj3->addCertificadoPagamento($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of CertificadoPagamento objects pre-filled with all related objects except Pedido.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of CertificadoPagamento objects.
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

		CertificadoPagamentoPeer::addSelectColumns($criteria);
		$startcol2 = (CertificadoPagamentoPeer::NUM_COLUMNS - CertificadoPagamentoPeer::NUM_LAZY_LOAD_COLUMNS);

		CertificadoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (CertificadoPeer::NUM_COLUMNS - CertificadoPeer::NUM_LAZY_LOAD_COLUMNS);

		FormaPagamentoPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (FormaPagamentoPeer::NUM_COLUMNS - FormaPagamentoPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(CertificadoPagamentoPeer::CERTIFICADO_ID, CertificadoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPagamentoPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CertificadoPagamentoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CertificadoPagamentoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = CertificadoPagamentoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CertificadoPagamentoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Certificado rows

				$key2 = CertificadoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = CertificadoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = CertificadoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					CertificadoPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (CertificadoPagamento) to the collection in $obj2 (Certificado)
				$obj2->addCertificadoPagamento($obj1);

			} // if joined row is not null

				// Add objects for joined FormaPagamento rows

				$key3 = FormaPagamentoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = FormaPagamentoPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = FormaPagamentoPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					FormaPagamentoPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (CertificadoPagamento) to the collection in $obj3 (FormaPagamento)
				$obj3->addCertificadoPagamento($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of CertificadoPagamento objects pre-filled with all related objects except FormaPagamento.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of CertificadoPagamento objects.
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

		CertificadoPagamentoPeer::addSelectColumns($criteria);
		$startcol2 = (CertificadoPagamentoPeer::NUM_COLUMNS - CertificadoPagamentoPeer::NUM_LAZY_LOAD_COLUMNS);

		CertificadoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (CertificadoPeer::NUM_COLUMNS - CertificadoPeer::NUM_LAZY_LOAD_COLUMNS);

		PedidoPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (PedidoPeer::NUM_COLUMNS - PedidoPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(CertificadoPagamentoPeer::CERTIFICADO_ID, CertificadoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPagamentoPeer::PEDIDO_ID, PedidoPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CertificadoPagamentoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CertificadoPagamentoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = CertificadoPagamentoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CertificadoPagamentoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Certificado rows

				$key2 = CertificadoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = CertificadoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = CertificadoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					CertificadoPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (CertificadoPagamento) to the collection in $obj2 (Certificado)
				$obj2->addCertificadoPagamento($obj1);

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

				// Add the $obj1 (CertificadoPagamento) to the collection in $obj3 (Pedido)
				$obj3->addCertificadoPagamento($obj1);

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
	  $dbMap = Propel::getDatabaseMap(BaseCertificadoPagamentoPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseCertificadoPagamentoPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new CertificadoPagamentoTableMap());
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
		return $withPrefix ? CertificadoPagamentoPeer::CLASS_DEFAULT : CertificadoPagamentoPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a CertificadoPagamento or Criteria object.
	 *
	 * @param      mixed $values Criteria or CertificadoPagamento object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CertificadoPagamentoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from CertificadoPagamento object
		}

		if ($criteria->containsKey(CertificadoPagamentoPeer::ID) && $criteria->keyContainsValue(CertificadoPagamentoPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.CertificadoPagamentoPeer::ID.')');
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
	 * Method perform an UPDATE on the database, given a CertificadoPagamento or Criteria object.
	 *
	 * @param      mixed $values Criteria or CertificadoPagamento object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CertificadoPagamentoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(CertificadoPagamentoPeer::ID);
			$selectCriteria->add(CertificadoPagamentoPeer::ID, $criteria->remove(CertificadoPagamentoPeer::ID), $comparison);

		} else { // $values is CertificadoPagamento object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the certificado_pagamento table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CertificadoPagamentoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(CertificadoPagamentoPeer::TABLE_NAME, $con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			CertificadoPagamentoPeer::clearInstancePool();
			CertificadoPagamentoPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a CertificadoPagamento or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or CertificadoPagamento object or primary key or array of primary keys
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
			$con = Propel::getConnection(CertificadoPagamentoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			CertificadoPagamentoPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof CertificadoPagamento) { // it's a model object
			// invalidate the cache for this single object
			CertificadoPagamentoPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CertificadoPagamentoPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				CertificadoPagamentoPeer::removeInstanceFromPool($singleval);
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
			CertificadoPagamentoPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given CertificadoPagamento object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      CertificadoPagamento $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(CertificadoPagamento $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CertificadoPagamentoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CertificadoPagamentoPeer::TABLE_NAME);

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

		return BasePeer::doValidate(CertificadoPagamentoPeer::DATABASE_NAME, CertificadoPagamentoPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     CertificadoPagamento
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = CertificadoPagamentoPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPagamentoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(CertificadoPagamentoPeer::DATABASE_NAME);
		$criteria->add(CertificadoPagamentoPeer::ID, $pk);

		$v = CertificadoPagamentoPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(CertificadoPagamentoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(CertificadoPagamentoPeer::DATABASE_NAME);
			$criteria->add(CertificadoPagamentoPeer::ID, $pks, Criteria::IN);
			$objs = CertificadoPagamentoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseCertificadoPagamentoPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseCertificadoPagamentoPeer::buildTableMap();

