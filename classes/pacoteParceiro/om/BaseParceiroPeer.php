<?php

/**
 * Base static class for performing query and update operations on the 'parceiro' table.
 *
 * 
 *
 * @package    pacoteParceiro.om
 */
abstract class BaseParceiroPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'swsistema';

	/** the table name for this class */
	const TABLE_NAME = 'parceiro';

	/** the related Propel class for this table */
	const OM_CLASS = 'Parceiro';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'pacoteParceiro.Parceiro';

	/** the related TableMap class for this table */
	const TM_CLASS = 'ParceiroTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 28;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'parceiro.ID';

	/** the column name for the NOME field */
	const NOME = 'parceiro.NOME';

	/** the column name for the EMPRESA field */
	const EMPRESA = 'parceiro.EMPRESA';

	/** the column name for the CNPJ field */
	const CNPJ = 'parceiro.CNPJ';

	/** the column name for the ENDERECO field */
	const ENDERECO = 'parceiro.ENDERECO';

	/** the column name for the NUMERO field */
	const NUMERO = 'parceiro.NUMERO';

	/** the column name for the BAIRRO field */
	const BAIRRO = 'parceiro.BAIRRO';

	/** the column name for the CIDADE field */
	const CIDADE = 'parceiro.CIDADE';

	/** the column name for the COMPLEMENTO field */
	const COMPLEMENTO = 'parceiro.COMPLEMENTO';

	/** the column name for the EMAIL field */
	const EMAIL = 'parceiro.EMAIL';

	/** the column name for the UF field */
	const UF = 'parceiro.UF';

	/** the column name for the CEP field */
	const CEP = 'parceiro.CEP';

	/** the column name for the IBGE field */
	const IBGE = 'parceiro.IBGE';

	/** the column name for the FONE field */
	const FONE = 'parceiro.FONE';

	/** the column name for the CELULAR field */
	const CELULAR = 'parceiro.CELULAR';

	/** the column name for the LOCAL_ID field */
	const LOCAL_ID = 'parceiro.LOCAL_ID';

	/** the column name for the SITUACAO field */
	const SITUACAO = 'parceiro.SITUACAO';

	/** the column name for the DATA_CADASTRO field */
	const DATA_CADASTRO = 'parceiro.DATA_CADASTRO';

	/** the column name for the BANCO field */
	const BANCO = 'parceiro.BANCO';

	/** the column name for the CONTA_CORRENTE field */
	const CONTA_CORRENTE = 'parceiro.CONTA_CORRENTE';

	/** the column name for the AGENCIA field */
	const AGENCIA = 'parceiro.AGENCIA';

	/** the column name for the OPERACAO field */
	const OPERACAO = 'parceiro.OPERACAO';

	/** the column name for the COMISSAO_VENDA field */
	const COMISSAO_VENDA = 'parceiro.COMISSAO_VENDA';

	/** the column name for the COMISSAO_VALIDACAO field */
	const COMISSAO_VALIDACAO = 'parceiro.COMISSAO_VALIDACAO';

	/** the column name for the COMISSAO_VENDA_VALIDACAO field */
	const COMISSAO_VENDA_VALIDACAO = 'parceiro.COMISSAO_VENDA_VALIDACAO';

	/** the column name for the OBSERVACAO field */
	const OBSERVACAO = 'parceiro.OBSERVACAO';

	/** the column name for the TIPO_CANAL field */
	const TIPO_CANAL = 'parceiro.TIPO_CANAL';

	/** the column name for the PAGA_CONTADOR field */
	const PAGA_CONTADOR = 'parceiro.PAGA_CONTADOR';

	/**
	 * An identiy map to hold any loaded instances of Parceiro objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array Parceiro[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Nome', 'Empresa', 'Cnpj', 'Endereco', 'Numero', 'Bairro', 'Cidade', 'Complemento', 'Email', 'Uf', 'Cep', 'Ibge', 'Fone', 'Celular', 'LocalId', 'Situacao', 'DataCadastro', 'Banco', 'ContaCorrente', 'Agencia', 'Operacao', 'ComissaoVenda', 'ComissaoValidacao', 'ComissaoVendaValidacao', 'Observacao', 'TipoCanal', 'PagaContador', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'nome', 'empresa', 'cnpj', 'endereco', 'numero', 'bairro', 'cidade', 'complemento', 'email', 'uf', 'cep', 'ibge', 'fone', 'celular', 'localId', 'situacao', 'dataCadastro', 'banco', 'contaCorrente', 'agencia', 'operacao', 'comissaoVenda', 'comissaoValidacao', 'comissaoVendaValidacao', 'observacao', 'tipoCanal', 'pagaContador', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::NOME, self::EMPRESA, self::CNPJ, self::ENDERECO, self::NUMERO, self::BAIRRO, self::CIDADE, self::COMPLEMENTO, self::EMAIL, self::UF, self::CEP, self::IBGE, self::FONE, self::CELULAR, self::LOCAL_ID, self::SITUACAO, self::DATA_CADASTRO, self::BANCO, self::CONTA_CORRENTE, self::AGENCIA, self::OPERACAO, self::COMISSAO_VENDA, self::COMISSAO_VALIDACAO, self::COMISSAO_VENDA_VALIDACAO, self::OBSERVACAO, self::TIPO_CANAL, self::PAGA_CONTADOR, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'nome', 'empresa', 'cnpj', 'endereco', 'numero', 'bairro', 'cidade', 'complemento', 'email', 'uf', 'cep', 'ibge', 'fone', 'celular', 'local_id', 'situacao', 'data_cadastro', 'banco', 'conta_corrente', 'agencia', 'operacao', 'comissao_venda', 'comissao_validacao', 'comissao_venda_validacao', 'observacao', 'tipo_canal', 'paga_contador', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Nome' => 1, 'Empresa' => 2, 'Cnpj' => 3, 'Endereco' => 4, 'Numero' => 5, 'Bairro' => 6, 'Cidade' => 7, 'Complemento' => 8, 'Email' => 9, 'Uf' => 10, 'Cep' => 11, 'Ibge' => 12, 'Fone' => 13, 'Celular' => 14, 'LocalId' => 15, 'Situacao' => 16, 'DataCadastro' => 17, 'Banco' => 18, 'ContaCorrente' => 19, 'Agencia' => 20, 'Operacao' => 21, 'ComissaoVenda' => 22, 'ComissaoValidacao' => 23, 'ComissaoVendaValidacao' => 24, 'Observacao' => 25, 'TipoCanal' => 26, 'PagaContador' => 27, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'nome' => 1, 'empresa' => 2, 'cnpj' => 3, 'endereco' => 4, 'numero' => 5, 'bairro' => 6, 'cidade' => 7, 'complemento' => 8, 'email' => 9, 'uf' => 10, 'cep' => 11, 'ibge' => 12, 'fone' => 13, 'celular' => 14, 'localId' => 15, 'situacao' => 16, 'dataCadastro' => 17, 'banco' => 18, 'contaCorrente' => 19, 'agencia' => 20, 'operacao' => 21, 'comissaoVenda' => 22, 'comissaoValidacao' => 23, 'comissaoVendaValidacao' => 24, 'observacao' => 25, 'tipoCanal' => 26, 'pagaContador' => 27, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::NOME => 1, self::EMPRESA => 2, self::CNPJ => 3, self::ENDERECO => 4, self::NUMERO => 5, self::BAIRRO => 6, self::CIDADE => 7, self::COMPLEMENTO => 8, self::EMAIL => 9, self::UF => 10, self::CEP => 11, self::IBGE => 12, self::FONE => 13, self::CELULAR => 14, self::LOCAL_ID => 15, self::SITUACAO => 16, self::DATA_CADASTRO => 17, self::BANCO => 18, self::CONTA_CORRENTE => 19, self::AGENCIA => 20, self::OPERACAO => 21, self::COMISSAO_VENDA => 22, self::COMISSAO_VALIDACAO => 23, self::COMISSAO_VENDA_VALIDACAO => 24, self::OBSERVACAO => 25, self::TIPO_CANAL => 26, self::PAGA_CONTADOR => 27, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'nome' => 1, 'empresa' => 2, 'cnpj' => 3, 'endereco' => 4, 'numero' => 5, 'bairro' => 6, 'cidade' => 7, 'complemento' => 8, 'email' => 9, 'uf' => 10, 'cep' => 11, 'ibge' => 12, 'fone' => 13, 'celular' => 14, 'local_id' => 15, 'situacao' => 16, 'data_cadastro' => 17, 'banco' => 18, 'conta_corrente' => 19, 'agencia' => 20, 'operacao' => 21, 'comissao_venda' => 22, 'comissao_validacao' => 23, 'comissao_venda_validacao' => 24, 'observacao' => 25, 'tipo_canal' => 26, 'paga_contador' => 27, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, )
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
	 * @param      string $column The column name for current table. (i.e. ParceiroPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(ParceiroPeer::TABLE_NAME.'.', $alias.'.', $column);
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
		$criteria->addSelectColumn(ParceiroPeer::ID);
		$criteria->addSelectColumn(ParceiroPeer::NOME);
		$criteria->addSelectColumn(ParceiroPeer::EMPRESA);
		$criteria->addSelectColumn(ParceiroPeer::CNPJ);
		$criteria->addSelectColumn(ParceiroPeer::ENDERECO);
		$criteria->addSelectColumn(ParceiroPeer::NUMERO);
		$criteria->addSelectColumn(ParceiroPeer::BAIRRO);
		$criteria->addSelectColumn(ParceiroPeer::CIDADE);
		$criteria->addSelectColumn(ParceiroPeer::COMPLEMENTO);
		$criteria->addSelectColumn(ParceiroPeer::EMAIL);
		$criteria->addSelectColumn(ParceiroPeer::UF);
		$criteria->addSelectColumn(ParceiroPeer::CEP);
		$criteria->addSelectColumn(ParceiroPeer::IBGE);
		$criteria->addSelectColumn(ParceiroPeer::FONE);
		$criteria->addSelectColumn(ParceiroPeer::CELULAR);
		$criteria->addSelectColumn(ParceiroPeer::LOCAL_ID);
		$criteria->addSelectColumn(ParceiroPeer::SITUACAO);
		$criteria->addSelectColumn(ParceiroPeer::DATA_CADASTRO);
		$criteria->addSelectColumn(ParceiroPeer::BANCO);
		$criteria->addSelectColumn(ParceiroPeer::CONTA_CORRENTE);
		$criteria->addSelectColumn(ParceiroPeer::AGENCIA);
		$criteria->addSelectColumn(ParceiroPeer::OPERACAO);
		$criteria->addSelectColumn(ParceiroPeer::COMISSAO_VENDA);
		$criteria->addSelectColumn(ParceiroPeer::COMISSAO_VALIDACAO);
		$criteria->addSelectColumn(ParceiroPeer::COMISSAO_VENDA_VALIDACAO);
		$criteria->addSelectColumn(ParceiroPeer::OBSERVACAO);
		$criteria->addSelectColumn(ParceiroPeer::TIPO_CANAL);
		$criteria->addSelectColumn(ParceiroPeer::PAGA_CONTADOR);
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
		$criteria->setPrimaryTableName(ParceiroPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ParceiroPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(ParceiroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return     Parceiro
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = ParceiroPeer::doSelect($critcopy, $con);
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
		return ParceiroPeer::populateObjects(ParceiroPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(ParceiroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			ParceiroPeer::addSelectColumns($criteria);
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
	 * @param      Parceiro $value A Parceiro object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(Parceiro $obj, $key = null)
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
	 * @param      mixed $value A Parceiro object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof Parceiro) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Parceiro object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     Parceiro Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to parceiro
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
		$cls = ParceiroPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = ParceiroPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = ParceiroPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				ParceiroPeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
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
		$criteria->setPrimaryTableName(ParceiroPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ParceiroPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ParceiroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ParceiroPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

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
	 * Selects a collection of Parceiro objects pre-filled with their Local objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Parceiro objects.
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

		ParceiroPeer::addSelectColumns($criteria);
		$startcol = (ParceiroPeer::NUM_COLUMNS - ParceiroPeer::NUM_LAZY_LOAD_COLUMNS);
		LocalPeer::addSelectColumns($criteria);

		$criteria->addJoin(ParceiroPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ParceiroPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ParceiroPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = ParceiroPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ParceiroPeer::addInstanceToPool($obj1, $key1);
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
				
				// Add the $obj1 (Parceiro) to $obj2 (Local)
				$obj2->addParceiro($obj1);

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
		$criteria->setPrimaryTableName(ParceiroPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ParceiroPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ParceiroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ParceiroPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

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
	 * Selects a collection of Parceiro objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Parceiro objects.
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

		ParceiroPeer::addSelectColumns($criteria);
		$startcol2 = (ParceiroPeer::NUM_COLUMNS - ParceiroPeer::NUM_LAZY_LOAD_COLUMNS);

		LocalPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (LocalPeer::NUM_COLUMNS - LocalPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(ParceiroPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ParceiroPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ParceiroPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ParceiroPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ParceiroPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined Local rows

			$key2 = LocalPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = LocalPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = LocalPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					LocalPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (Parceiro) to the collection in $obj2 (Local)
				$obj2->addParceiro($obj1);
			} // if joined row not null

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
	  $dbMap = Propel::getDatabaseMap(BaseParceiroPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseParceiroPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new ParceiroTableMap());
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
		return $withPrefix ? ParceiroPeer::CLASS_DEFAULT : ParceiroPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a Parceiro or Criteria object.
	 *
	 * @param      mixed $values Criteria or Parceiro object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ParceiroPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from Parceiro object
		}

		if ($criteria->containsKey(ParceiroPeer::ID) && $criteria->keyContainsValue(ParceiroPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.ParceiroPeer::ID.')');
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
	 * Method perform an UPDATE on the database, given a Parceiro or Criteria object.
	 *
	 * @param      mixed $values Criteria or Parceiro object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ParceiroPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(ParceiroPeer::ID);
			$selectCriteria->add(ParceiroPeer::ID, $criteria->remove(ParceiroPeer::ID), $comparison);

		} else { // $values is Parceiro object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the parceiro table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ParceiroPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(ParceiroPeer::TABLE_NAME, $con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			ParceiroPeer::clearInstancePool();
			ParceiroPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a Parceiro or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or Parceiro object or primary key or array of primary keys
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
			$con = Propel::getConnection(ParceiroPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			ParceiroPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof Parceiro) { // it's a model object
			// invalidate the cache for this single object
			ParceiroPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ParceiroPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				ParceiroPeer::removeInstanceFromPool($singleval);
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
			ParceiroPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given Parceiro object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      Parceiro $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(Parceiro $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ParceiroPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ParceiroPeer::TABLE_NAME);

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

		return BasePeer::doValidate(ParceiroPeer::DATABASE_NAME, ParceiroPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     Parceiro
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = ParceiroPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(ParceiroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(ParceiroPeer::DATABASE_NAME);
		$criteria->add(ParceiroPeer::ID, $pk);

		$v = ParceiroPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(ParceiroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(ParceiroPeer::DATABASE_NAME);
			$criteria->add(ParceiroPeer::ID, $pks, Criteria::IN);
			$objs = ParceiroPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseParceiroPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseParceiroPeer::buildTableMap();

