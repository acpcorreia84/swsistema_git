<?php

/**
 * Base static class for performing query and update operations on the 'cliente' table.
 *
 * 
 *
 * @package    pacoteCliente.om
 */
abstract class BaseClientePeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'swsistema';

	/** the table name for this class */
	const TABLE_NAME = 'cliente';

	/** the related Propel class for this table */
	const OM_CLASS = 'Cliente';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'pacoteCliente.Cliente';

	/** the related TableMap class for this table */
	const TM_CLASS = 'ClienteTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 30;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'cliente.ID';

	/** the column name for the RESPONSAVEL_ID field */
	const RESPONSAVEL_ID = 'cliente.RESPONSAVEL_ID';

	/** the column name for the LOCAL_ID field */
	const LOCAL_ID = 'cliente.LOCAL_ID';

	/** the column name for the PESSOA_TIPO field */
	const PESSOA_TIPO = 'cliente.PESSOA_TIPO';

	/** the column name for the RAZAO_SOCIAL field */
	const RAZAO_SOCIAL = 'cliente.RAZAO_SOCIAL';

	/** the column name for the NOME_FANTASIA field */
	const NOME_FANTASIA = 'cliente.NOME_FANTASIA';

	/** the column name for the ENDERECO field */
	const ENDERECO = 'cliente.ENDERECO';

	/** the column name for the NUMERO field */
	const NUMERO = 'cliente.NUMERO';

	/** the column name for the BAIRRO field */
	const BAIRRO = 'cliente.BAIRRO';

	/** the column name for the COMPLEMENTO field */
	const COMPLEMENTO = 'cliente.COMPLEMENTO';

	/** the column name for the CIDADE field */
	const CIDADE = 'cliente.CIDADE';

	/** the column name for the EMAIL field */
	const EMAIL = 'cliente.EMAIL';

	/** the column name for the UF field */
	const UF = 'cliente.UF';

	/** the column name for the CEP field */
	const CEP = 'cliente.CEP';

	/** the column name for the FONE1 field */
	const FONE1 = 'cliente.FONE1';

	/** the column name for the FONE2 field */
	const FONE2 = 'cliente.FONE2';

	/** the column name for the CELULAR field */
	const CELULAR = 'cliente.CELULAR';

	/** the column name for the CPF_CNPJ field */
	const CPF_CNPJ = 'cliente.CPF_CNPJ';

	/** the column name for the SITUACAO field */
	const SITUACAO = 'cliente.SITUACAO';

	/** the column name for the NASCIMENTO field */
	const NASCIMENTO = 'cliente.NASCIMENTO';

	/** the column name for the NOME_CONTATO field */
	const NOME_CONTATO = 'cliente.NOME_CONTATO';

	/** the column name for the REFERENCIA_CONTATO field */
	const REFERENCIA_CONTATO = 'cliente.REFERENCIA_CONTATO';

	/** the column name for the TELEFONE_CONTATO field */
	const TELEFONE_CONTATO = 'cliente.TELEFONE_CONTATO';

	/** the column name for the EMAIL_CONTATO field */
	const EMAIL_CONTATO = 'cliente.EMAIL_CONTATO';

	/** the column name for the CARGO field */
	const CARGO = 'cliente.CARGO';

	/** the column name for the RG field */
	const RG = 'cliente.RG';

	/** the column name for the NIS field */
	const NIS = 'cliente.NIS';

	/** the column name for the CONTADOR_ID field */
	const CONTADOR_ID = 'cliente.CONTADOR_ID';

	/** the column name for the TELEFONE_AC field */
	const TELEFONE_AC = 'cliente.TELEFONE_AC';

	/** the column name for the EMAIL_AC field */
	const EMAIL_AC = 'cliente.EMAIL_AC';

	/**
	 * An identiy map to hold any loaded instances of Cliente objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array Cliente[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'ResponsavelId', 'LocalId', 'PessoaTipo', 'RazaoSocial', 'NomeFantasia', 'Endereco', 'Numero', 'Bairro', 'Complemento', 'Cidade', 'Email', 'Uf', 'Cep', 'Fone1', 'Fone2', 'Celular', 'CpfCnpj', 'Situacao', 'Nascimento', 'NomeContato', 'ReferenciaContato', 'TelefoneContato', 'EmailContato', 'Cargo', 'Rg', 'Nis', 'ContadorId', 'TelefoneAc', 'EmailAc', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'responsavelId', 'localId', 'pessoaTipo', 'razaoSocial', 'nomeFantasia', 'endereco', 'numero', 'bairro', 'complemento', 'cidade', 'email', 'uf', 'cep', 'fone1', 'fone2', 'celular', 'cpfCnpj', 'situacao', 'nascimento', 'nomeContato', 'referenciaContato', 'telefoneContato', 'emailContato', 'cargo', 'rg', 'nis', 'contadorId', 'telefoneAc', 'emailAc', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::RESPONSAVEL_ID, self::LOCAL_ID, self::PESSOA_TIPO, self::RAZAO_SOCIAL, self::NOME_FANTASIA, self::ENDERECO, self::NUMERO, self::BAIRRO, self::COMPLEMENTO, self::CIDADE, self::EMAIL, self::UF, self::CEP, self::FONE1, self::FONE2, self::CELULAR, self::CPF_CNPJ, self::SITUACAO, self::NASCIMENTO, self::NOME_CONTATO, self::REFERENCIA_CONTATO, self::TELEFONE_CONTATO, self::EMAIL_CONTATO, self::CARGO, self::RG, self::NIS, self::CONTADOR_ID, self::TELEFONE_AC, self::EMAIL_AC, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'responsavel_id', 'local_id', 'pessoa_tipo', 'razao_social', 'nome_fantasia', 'endereco', 'numero', 'bairro', 'complemento', 'cidade', 'email', 'uf', 'cep', 'fone1', 'fone2', 'celular', 'cpf_cnpj', 'situacao', 'nascimento', 'nome_contato', 'referencia_contato', 'telefone_contato', 'email_contato', 'cargo', 'rg', 'nis', 'contador_id', 'telefone_ac', 'email_ac', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'ResponsavelId' => 1, 'LocalId' => 2, 'PessoaTipo' => 3, 'RazaoSocial' => 4, 'NomeFantasia' => 5, 'Endereco' => 6, 'Numero' => 7, 'Bairro' => 8, 'Complemento' => 9, 'Cidade' => 10, 'Email' => 11, 'Uf' => 12, 'Cep' => 13, 'Fone1' => 14, 'Fone2' => 15, 'Celular' => 16, 'CpfCnpj' => 17, 'Situacao' => 18, 'Nascimento' => 19, 'NomeContato' => 20, 'ReferenciaContato' => 21, 'TelefoneContato' => 22, 'EmailContato' => 23, 'Cargo' => 24, 'Rg' => 25, 'Nis' => 26, 'ContadorId' => 27, 'TelefoneAc' => 28, 'EmailAc' => 29, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'responsavelId' => 1, 'localId' => 2, 'pessoaTipo' => 3, 'razaoSocial' => 4, 'nomeFantasia' => 5, 'endereco' => 6, 'numero' => 7, 'bairro' => 8, 'complemento' => 9, 'cidade' => 10, 'email' => 11, 'uf' => 12, 'cep' => 13, 'fone1' => 14, 'fone2' => 15, 'celular' => 16, 'cpfCnpj' => 17, 'situacao' => 18, 'nascimento' => 19, 'nomeContato' => 20, 'referenciaContato' => 21, 'telefoneContato' => 22, 'emailContato' => 23, 'cargo' => 24, 'rg' => 25, 'nis' => 26, 'contadorId' => 27, 'telefoneAc' => 28, 'emailAc' => 29, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::RESPONSAVEL_ID => 1, self::LOCAL_ID => 2, self::PESSOA_TIPO => 3, self::RAZAO_SOCIAL => 4, self::NOME_FANTASIA => 5, self::ENDERECO => 6, self::NUMERO => 7, self::BAIRRO => 8, self::COMPLEMENTO => 9, self::CIDADE => 10, self::EMAIL => 11, self::UF => 12, self::CEP => 13, self::FONE1 => 14, self::FONE2 => 15, self::CELULAR => 16, self::CPF_CNPJ => 17, self::SITUACAO => 18, self::NASCIMENTO => 19, self::NOME_CONTATO => 20, self::REFERENCIA_CONTATO => 21, self::TELEFONE_CONTATO => 22, self::EMAIL_CONTATO => 23, self::CARGO => 24, self::RG => 25, self::NIS => 26, self::CONTADOR_ID => 27, self::TELEFONE_AC => 28, self::EMAIL_AC => 29, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'responsavel_id' => 1, 'local_id' => 2, 'pessoa_tipo' => 3, 'razao_social' => 4, 'nome_fantasia' => 5, 'endereco' => 6, 'numero' => 7, 'bairro' => 8, 'complemento' => 9, 'cidade' => 10, 'email' => 11, 'uf' => 12, 'cep' => 13, 'fone1' => 14, 'fone2' => 15, 'celular' => 16, 'cpf_cnpj' => 17, 'situacao' => 18, 'nascimento' => 19, 'nome_contato' => 20, 'referencia_contato' => 21, 'telefone_contato' => 22, 'email_contato' => 23, 'cargo' => 24, 'rg' => 25, 'nis' => 26, 'contador_id' => 27, 'telefone_ac' => 28, 'email_ac' => 29, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, )
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
	 * @param      string $column The column name for current table. (i.e. ClientePeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(ClientePeer::TABLE_NAME.'.', $alias.'.', $column);
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
		$criteria->addSelectColumn(ClientePeer::ID);
		$criteria->addSelectColumn(ClientePeer::RESPONSAVEL_ID);
		$criteria->addSelectColumn(ClientePeer::LOCAL_ID);
		$criteria->addSelectColumn(ClientePeer::PESSOA_TIPO);
		$criteria->addSelectColumn(ClientePeer::RAZAO_SOCIAL);
		$criteria->addSelectColumn(ClientePeer::NOME_FANTASIA);
		$criteria->addSelectColumn(ClientePeer::ENDERECO);
		$criteria->addSelectColumn(ClientePeer::NUMERO);
		$criteria->addSelectColumn(ClientePeer::BAIRRO);
		$criteria->addSelectColumn(ClientePeer::COMPLEMENTO);
		$criteria->addSelectColumn(ClientePeer::CIDADE);
		$criteria->addSelectColumn(ClientePeer::EMAIL);
		$criteria->addSelectColumn(ClientePeer::UF);
		$criteria->addSelectColumn(ClientePeer::CEP);
		$criteria->addSelectColumn(ClientePeer::FONE1);
		$criteria->addSelectColumn(ClientePeer::FONE2);
		$criteria->addSelectColumn(ClientePeer::CELULAR);
		$criteria->addSelectColumn(ClientePeer::CPF_CNPJ);
		$criteria->addSelectColumn(ClientePeer::SITUACAO);
		$criteria->addSelectColumn(ClientePeer::NASCIMENTO);
		$criteria->addSelectColumn(ClientePeer::NOME_CONTATO);
		$criteria->addSelectColumn(ClientePeer::REFERENCIA_CONTATO);
		$criteria->addSelectColumn(ClientePeer::TELEFONE_CONTATO);
		$criteria->addSelectColumn(ClientePeer::EMAIL_CONTATO);
		$criteria->addSelectColumn(ClientePeer::CARGO);
		$criteria->addSelectColumn(ClientePeer::RG);
		$criteria->addSelectColumn(ClientePeer::NIS);
		$criteria->addSelectColumn(ClientePeer::CONTADOR_ID);
		$criteria->addSelectColumn(ClientePeer::TELEFONE_AC);
		$criteria->addSelectColumn(ClientePeer::EMAIL_AC);
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
		$criteria->setPrimaryTableName(ClientePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ClientePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return     Cliente
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = ClientePeer::doSelect($critcopy, $con);
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
		return ClientePeer::populateObjects(ClientePeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			ClientePeer::addSelectColumns($criteria);
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
	 * @param      Cliente $value A Cliente object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(Cliente $obj, $key = null)
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
	 * @param      mixed $value A Cliente object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof Cliente) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Cliente object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     Cliente Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to cliente
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
		$cls = ClientePeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = ClientePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = ClientePeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				ClientePeer::addInstanceToPool($obj, $key);
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
		$criteria->setPrimaryTableName(ClientePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ClientePeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ClientePeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Contador table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinContador(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ClientePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ClientePeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ClientePeer::CONTADOR_ID, ContadorPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Responsavel table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinResponsavel(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ClientePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ClientePeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ClientePeer::RESPONSAVEL_ID, ResponsavelPeer::ID, $join_behavior);

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
	 * Selects a collection of Cliente objects pre-filled with their Local objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Cliente objects.
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

		ClientePeer::addSelectColumns($criteria);
		$startcol = (ClientePeer::NUM_COLUMNS - ClientePeer::NUM_LAZY_LOAD_COLUMNS);
		LocalPeer::addSelectColumns($criteria);

		$criteria->addJoin(ClientePeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ClientePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ClientePeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = ClientePeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ClientePeer::addInstanceToPool($obj1, $key1);
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
				
				// Add the $obj1 (Cliente) to $obj2 (Local)
				$obj2->addCliente($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Cliente objects pre-filled with their Contador objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Cliente objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinContador(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ClientePeer::addSelectColumns($criteria);
		$startcol = (ClientePeer::NUM_COLUMNS - ClientePeer::NUM_LAZY_LOAD_COLUMNS);
		ContadorPeer::addSelectColumns($criteria);

		$criteria->addJoin(ClientePeer::CONTADOR_ID, ContadorPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ClientePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ClientePeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = ClientePeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ClientePeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = ContadorPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = ContadorPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = ContadorPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					ContadorPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded
				
				// Add the $obj1 (Cliente) to $obj2 (Contador)
				$obj2->addCliente($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Cliente objects pre-filled with their Responsavel objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Cliente objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinResponsavel(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ClientePeer::addSelectColumns($criteria);
		$startcol = (ClientePeer::NUM_COLUMNS - ClientePeer::NUM_LAZY_LOAD_COLUMNS);
		ResponsavelPeer::addSelectColumns($criteria);

		$criteria->addJoin(ClientePeer::RESPONSAVEL_ID, ResponsavelPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ClientePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ClientePeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = ClientePeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ClientePeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = ResponsavelPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = ResponsavelPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = ResponsavelPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					ResponsavelPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded
				
				// Add the $obj1 (Cliente) to $obj2 (Responsavel)
				$obj2->addCliente($obj1);

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
		$criteria->setPrimaryTableName(ClientePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ClientePeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ClientePeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(ClientePeer::CONTADOR_ID, ContadorPeer::ID, $join_behavior);

		$criteria->addJoin(ClientePeer::RESPONSAVEL_ID, ResponsavelPeer::ID, $join_behavior);

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
	 * Selects a collection of Cliente objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Cliente objects.
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

		ClientePeer::addSelectColumns($criteria);
		$startcol2 = (ClientePeer::NUM_COLUMNS - ClientePeer::NUM_LAZY_LOAD_COLUMNS);

		LocalPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (LocalPeer::NUM_COLUMNS - LocalPeer::NUM_LAZY_LOAD_COLUMNS);

		ContadorPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ContadorPeer::NUM_COLUMNS - ContadorPeer::NUM_LAZY_LOAD_COLUMNS);

		ResponsavelPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (ResponsavelPeer::NUM_COLUMNS - ResponsavelPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(ClientePeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(ClientePeer::CONTADOR_ID, ContadorPeer::ID, $join_behavior);

		$criteria->addJoin(ClientePeer::RESPONSAVEL_ID, ResponsavelPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ClientePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ClientePeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ClientePeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ClientePeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (Cliente) to the collection in $obj2 (Local)
				$obj2->addCliente($obj1);
			} // if joined row not null

			// Add objects for joined Contador rows

			$key3 = ContadorPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = ContadorPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$cls = ContadorPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ContadorPeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (Cliente) to the collection in $obj3 (Contador)
				$obj3->addCliente($obj1);
			} // if joined row not null

			// Add objects for joined Responsavel rows

			$key4 = ResponsavelPeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = ResponsavelPeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$cls = ResponsavelPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ResponsavelPeer::addInstanceToPool($obj4, $key4);
				} // if obj4 loaded

				// Add the $obj1 (Cliente) to the collection in $obj4 (Responsavel)
				$obj4->addCliente($obj1);
			} // if joined row not null

			$results[] = $obj1;
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
	public static function doCountJoinAllExceptLocal(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ClientePeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ClientePeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(ClientePeer::CONTADOR_ID, ContadorPeer::ID, $join_behavior);

		$criteria->addJoin(ClientePeer::RESPONSAVEL_ID, ResponsavelPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Contador table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptContador(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ClientePeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ClientePeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(ClientePeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(ClientePeer::RESPONSAVEL_ID, ResponsavelPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Responsavel table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptResponsavel(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ClientePeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ClientePeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(ClientePeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(ClientePeer::CONTADOR_ID, ContadorPeer::ID, $join_behavior);

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
	 * Selects a collection of Cliente objects pre-filled with all related objects except Local.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Cliente objects.
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

		ClientePeer::addSelectColumns($criteria);
		$startcol2 = (ClientePeer::NUM_COLUMNS - ClientePeer::NUM_LAZY_LOAD_COLUMNS);

		ContadorPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (ContadorPeer::NUM_COLUMNS - ContadorPeer::NUM_LAZY_LOAD_COLUMNS);

		ResponsavelPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ResponsavelPeer::NUM_COLUMNS - ResponsavelPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(ClientePeer::CONTADOR_ID, ContadorPeer::ID, $join_behavior);

		$criteria->addJoin(ClientePeer::RESPONSAVEL_ID, ResponsavelPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ClientePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ClientePeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ClientePeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ClientePeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Contador rows

				$key2 = ContadorPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = ContadorPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = ContadorPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ContadorPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Cliente) to the collection in $obj2 (Contador)
				$obj2->addCliente($obj1);

			} // if joined row is not null

				// Add objects for joined Responsavel rows

				$key3 = ResponsavelPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ResponsavelPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ResponsavelPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ResponsavelPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Cliente) to the collection in $obj3 (Responsavel)
				$obj3->addCliente($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Cliente objects pre-filled with all related objects except Contador.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Cliente objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptContador(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ClientePeer::addSelectColumns($criteria);
		$startcol2 = (ClientePeer::NUM_COLUMNS - ClientePeer::NUM_LAZY_LOAD_COLUMNS);

		LocalPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (LocalPeer::NUM_COLUMNS - LocalPeer::NUM_LAZY_LOAD_COLUMNS);

		ResponsavelPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ResponsavelPeer::NUM_COLUMNS - ResponsavelPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(ClientePeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(ClientePeer::RESPONSAVEL_ID, ResponsavelPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ClientePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ClientePeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ClientePeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ClientePeer::addInstanceToPool($obj1, $key1);
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
				} // if $obj2 already loaded

				// Add the $obj1 (Cliente) to the collection in $obj2 (Local)
				$obj2->addCliente($obj1);

			} // if joined row is not null

				// Add objects for joined Responsavel rows

				$key3 = ResponsavelPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ResponsavelPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ResponsavelPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ResponsavelPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Cliente) to the collection in $obj3 (Responsavel)
				$obj3->addCliente($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Cliente objects pre-filled with all related objects except Responsavel.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Cliente objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptResponsavel(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ClientePeer::addSelectColumns($criteria);
		$startcol2 = (ClientePeer::NUM_COLUMNS - ClientePeer::NUM_LAZY_LOAD_COLUMNS);

		LocalPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (LocalPeer::NUM_COLUMNS - LocalPeer::NUM_LAZY_LOAD_COLUMNS);

		ContadorPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ContadorPeer::NUM_COLUMNS - ContadorPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(ClientePeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(ClientePeer::CONTADOR_ID, ContadorPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ClientePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ClientePeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ClientePeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ClientePeer::addInstanceToPool($obj1, $key1);
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
				} // if $obj2 already loaded

				// Add the $obj1 (Cliente) to the collection in $obj2 (Local)
				$obj2->addCliente($obj1);

			} // if joined row is not null

				// Add objects for joined Contador rows

				$key3 = ContadorPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ContadorPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ContadorPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ContadorPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Cliente) to the collection in $obj3 (Contador)
				$obj3->addCliente($obj1);

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
	  $dbMap = Propel::getDatabaseMap(BaseClientePeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseClientePeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new ClienteTableMap());
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
		return $withPrefix ? ClientePeer::CLASS_DEFAULT : ClientePeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a Cliente or Criteria object.
	 *
	 * @param      mixed $values Criteria or Cliente object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from Cliente object
		}

		if ($criteria->containsKey(ClientePeer::ID) && $criteria->keyContainsValue(ClientePeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.ClientePeer::ID.')');
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
	 * Method perform an UPDATE on the database, given a Cliente or Criteria object.
	 *
	 * @param      mixed $values Criteria or Cliente object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(ClientePeer::ID);
			$selectCriteria->add(ClientePeer::ID, $criteria->remove(ClientePeer::ID), $comparison);

		} else { // $values is Cliente object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the cliente table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(ClientePeer::TABLE_NAME, $con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			ClientePeer::clearInstancePool();
			ClientePeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a Cliente or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or Cliente object or primary key or array of primary keys
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
			$con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			ClientePeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof Cliente) { // it's a model object
			// invalidate the cache for this single object
			ClientePeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ClientePeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				ClientePeer::removeInstanceFromPool($singleval);
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
			ClientePeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given Cliente object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      Cliente $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(Cliente $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ClientePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ClientePeer::TABLE_NAME);

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

		if ($obj->isNew() || $obj->isColumnModified(ClientePeer::EMAIL))
			$columns[ClientePeer::EMAIL] = $obj->getEmail();

		if ($obj->isNew() || $obj->isColumnModified(ClientePeer::CPF_CNPJ))
			$columns[ClientePeer::CPF_CNPJ] = $obj->getCpfCnpj();

		}

		return BasePeer::doValidate(ClientePeer::DATABASE_NAME, ClientePeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     Cliente
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = ClientePeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(ClientePeer::DATABASE_NAME);
		$criteria->add(ClientePeer::ID, $pk);

		$v = ClientePeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(ClientePeer::DATABASE_NAME);
			$criteria->add(ClientePeer::ID, $pks, Criteria::IN);
			$objs = ClientePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseClientePeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseClientePeer::buildTableMap();

