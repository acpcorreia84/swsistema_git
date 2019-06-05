<?php

/**
 * Base static class for performing query and update operations on the 'responsavel' table.
 *
 * 
 *
 * @package    pacoteResponsavel.om
 */
abstract class BaseResponsavelPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'swsistema';

	/** the table name for this class */
	const TABLE_NAME = 'responsavel';

	/** the related Propel class for this table */
	const OM_CLASS = 'Responsavel';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'pacoteResponsavel.Responsavel';

	/** the related TableMap class for this table */
	const TM_CLASS = 'ResponsavelTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 19;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'responsavel.ID';

	/** the column name for the NOME field */
	const NOME = 'responsavel.NOME';

	/** the column name for the ENDERECO field */
	const ENDERECO = 'responsavel.ENDERECO';

	/** the column name for the NUMERO field */
	const NUMERO = 'responsavel.NUMERO';

	/** the column name for the BAIRRO field */
	const BAIRRO = 'responsavel.BAIRRO';

	/** the column name for the COMPLEMENTO field */
	const COMPLEMENTO = 'responsavel.COMPLEMENTO';

	/** the column name for the CIDADE field */
	const CIDADE = 'responsavel.CIDADE';

	/** the column name for the UF field */
	const UF = 'responsavel.UF';

	/** the column name for the CEP field */
	const CEP = 'responsavel.CEP';

	/** the column name for the CPF field */
	const CPF = 'responsavel.CPF';

	/** the column name for the FONE1 field */
	const FONE1 = 'responsavel.FONE1';

	/** the column name for the FONE2 field */
	const FONE2 = 'responsavel.FONE2';

	/** the column name for the CELULAR field */
	const CELULAR = 'responsavel.CELULAR';

	/** the column name for the APELIDO field */
	const APELIDO = 'responsavel.APELIDO';

	/** the column name for the NASCIMENTO field */
	const NASCIMENTO = 'responsavel.NASCIMENTO';

	/** the column name for the EMAIL field */
	const EMAIL = 'responsavel.EMAIL';

	/** the column name for the CARGO field */
	const CARGO = 'responsavel.CARGO';

	/** the column name for the RG field */
	const RG = 'responsavel.RG';

	/** the column name for the NIS field */
	const NIS = 'responsavel.NIS';

	/**
	 * An identiy map to hold any loaded instances of Responsavel objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array Responsavel[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Nome', 'Endereco', 'Numero', 'Bairro', 'Complemento', 'Cidade', 'Uf', 'Cep', 'Cpf', 'Fone1', 'Fone2', 'Celular', 'Apelido', 'Nascimento', 'Email', 'Cargo', 'Rg', 'Nis', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'nome', 'endereco', 'numero', 'bairro', 'complemento', 'cidade', 'uf', 'cep', 'cpf', 'fone1', 'fone2', 'celular', 'apelido', 'nascimento', 'email', 'cargo', 'rg', 'nis', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::NOME, self::ENDERECO, self::NUMERO, self::BAIRRO, self::COMPLEMENTO, self::CIDADE, self::UF, self::CEP, self::CPF, self::FONE1, self::FONE2, self::CELULAR, self::APELIDO, self::NASCIMENTO, self::EMAIL, self::CARGO, self::RG, self::NIS, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'nome', 'endereco', 'numero', 'bairro', 'complemento', 'cidade', 'uf', 'cep', 'cpf', 'fone1', 'fone2', 'celular', 'apelido', 'nascimento', 'email', 'cargo', 'rg', 'nis', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Nome' => 1, 'Endereco' => 2, 'Numero' => 3, 'Bairro' => 4, 'Complemento' => 5, 'Cidade' => 6, 'Uf' => 7, 'Cep' => 8, 'Cpf' => 9, 'Fone1' => 10, 'Fone2' => 11, 'Celular' => 12, 'Apelido' => 13, 'Nascimento' => 14, 'Email' => 15, 'Cargo' => 16, 'Rg' => 17, 'Nis' => 18, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'nome' => 1, 'endereco' => 2, 'numero' => 3, 'bairro' => 4, 'complemento' => 5, 'cidade' => 6, 'uf' => 7, 'cep' => 8, 'cpf' => 9, 'fone1' => 10, 'fone2' => 11, 'celular' => 12, 'apelido' => 13, 'nascimento' => 14, 'email' => 15, 'cargo' => 16, 'rg' => 17, 'nis' => 18, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::NOME => 1, self::ENDERECO => 2, self::NUMERO => 3, self::BAIRRO => 4, self::COMPLEMENTO => 5, self::CIDADE => 6, self::UF => 7, self::CEP => 8, self::CPF => 9, self::FONE1 => 10, self::FONE2 => 11, self::CELULAR => 12, self::APELIDO => 13, self::NASCIMENTO => 14, self::EMAIL => 15, self::CARGO => 16, self::RG => 17, self::NIS => 18, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'nome' => 1, 'endereco' => 2, 'numero' => 3, 'bairro' => 4, 'complemento' => 5, 'cidade' => 6, 'uf' => 7, 'cep' => 8, 'cpf' => 9, 'fone1' => 10, 'fone2' => 11, 'celular' => 12, 'apelido' => 13, 'nascimento' => 14, 'email' => 15, 'cargo' => 16, 'rg' => 17, 'nis' => 18, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
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
	 * @param      string $column The column name for current table. (i.e. ResponsavelPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(ResponsavelPeer::TABLE_NAME.'.', $alias.'.', $column);
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
		$criteria->addSelectColumn(ResponsavelPeer::ID);
		$criteria->addSelectColumn(ResponsavelPeer::NOME);
		$criteria->addSelectColumn(ResponsavelPeer::ENDERECO);
		$criteria->addSelectColumn(ResponsavelPeer::NUMERO);
		$criteria->addSelectColumn(ResponsavelPeer::BAIRRO);
		$criteria->addSelectColumn(ResponsavelPeer::COMPLEMENTO);
		$criteria->addSelectColumn(ResponsavelPeer::CIDADE);
		$criteria->addSelectColumn(ResponsavelPeer::UF);
		$criteria->addSelectColumn(ResponsavelPeer::CEP);
		$criteria->addSelectColumn(ResponsavelPeer::CPF);
		$criteria->addSelectColumn(ResponsavelPeer::FONE1);
		$criteria->addSelectColumn(ResponsavelPeer::FONE2);
		$criteria->addSelectColumn(ResponsavelPeer::CELULAR);
		$criteria->addSelectColumn(ResponsavelPeer::APELIDO);
		$criteria->addSelectColumn(ResponsavelPeer::NASCIMENTO);
		$criteria->addSelectColumn(ResponsavelPeer::EMAIL);
		$criteria->addSelectColumn(ResponsavelPeer::CARGO);
		$criteria->addSelectColumn(ResponsavelPeer::RG);
		$criteria->addSelectColumn(ResponsavelPeer::NIS);
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
		$criteria->setPrimaryTableName(ResponsavelPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ResponsavelPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(ResponsavelPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return     Responsavel
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = ResponsavelPeer::doSelect($critcopy, $con);
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
		return ResponsavelPeer::populateObjects(ResponsavelPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(ResponsavelPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			ResponsavelPeer::addSelectColumns($criteria);
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
	 * @param      Responsavel $value A Responsavel object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(Responsavel $obj, $key = null)
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
	 * @param      mixed $value A Responsavel object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof Responsavel) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Responsavel object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     Responsavel Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to responsavel
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
		$cls = ResponsavelPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = ResponsavelPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = ResponsavelPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				ResponsavelPeer::addInstanceToPool($obj, $key);
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
	  $dbMap = Propel::getDatabaseMap(BaseResponsavelPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseResponsavelPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new ResponsavelTableMap());
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
		return $withPrefix ? ResponsavelPeer::CLASS_DEFAULT : ResponsavelPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a Responsavel or Criteria object.
	 *
	 * @param      mixed $values Criteria or Responsavel object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ResponsavelPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from Responsavel object
		}

		if ($criteria->containsKey(ResponsavelPeer::ID) && $criteria->keyContainsValue(ResponsavelPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.ResponsavelPeer::ID.')');
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
	 * Method perform an UPDATE on the database, given a Responsavel or Criteria object.
	 *
	 * @param      mixed $values Criteria or Responsavel object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ResponsavelPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(ResponsavelPeer::ID);
			$selectCriteria->add(ResponsavelPeer::ID, $criteria->remove(ResponsavelPeer::ID), $comparison);

		} else { // $values is Responsavel object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the responsavel table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ResponsavelPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(ResponsavelPeer::TABLE_NAME, $con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			ResponsavelPeer::clearInstancePool();
			ResponsavelPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a Responsavel or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or Responsavel object or primary key or array of primary keys
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
			$con = Propel::getConnection(ResponsavelPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			ResponsavelPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof Responsavel) { // it's a model object
			// invalidate the cache for this single object
			ResponsavelPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ResponsavelPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				ResponsavelPeer::removeInstanceFromPool($singleval);
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
			ResponsavelPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given Responsavel object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      Responsavel $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(Responsavel $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ResponsavelPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ResponsavelPeer::TABLE_NAME);

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

		return BasePeer::doValidate(ResponsavelPeer::DATABASE_NAME, ResponsavelPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     Responsavel
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = ResponsavelPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(ResponsavelPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(ResponsavelPeer::DATABASE_NAME);
		$criteria->add(ResponsavelPeer::ID, $pk);

		$v = ResponsavelPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(ResponsavelPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(ResponsavelPeer::DATABASE_NAME);
			$criteria->add(ResponsavelPeer::ID, $pks, Criteria::IN);
			$objs = ResponsavelPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseResponsavelPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseResponsavelPeer::buildTableMap();

