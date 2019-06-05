<?php

/**
 * Base static class for performing query and update operations on the 'usuario' table.
 *
 * 
 *
 * @package    pacoteUsuario.om
 */
abstract class BaseUsuarioPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'swsistema';

	/** the table name for this class */
	const TABLE_NAME = 'usuario';

	/** the related Propel class for this table */
	const OM_CLASS = 'Usuario';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'pacoteUsuario.Usuario';

	/** the related TableMap class for this table */
	const TM_CLASS = 'UsuarioTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 31;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'usuario.ID';

	/** the column name for the LOCAL_ID field */
	const LOCAL_ID = 'usuario.LOCAL_ID';

	/** the column name for the FOTO_AVATAR field */
	const FOTO_AVATAR = 'usuario.FOTO_AVATAR';

	/** the column name for the PERFIL_ID field */
	const PERFIL_ID = 'usuario.PERFIL_ID';

	/** the column name for the LOGIN field */
	const LOGIN = 'usuario.LOGIN';

	/** the column name for the SENHA field */
	const SENHA = 'usuario.SENHA';

	/** the column name for the DATA_EXPIRACAO_SENHA field */
	const DATA_EXPIRACAO_SENHA = 'usuario.DATA_EXPIRACAO_SENHA';

	/** the column name for the DATA_ULTIMO_ACESSO field */
	const DATA_ULTIMO_ACESSO = 'usuario.DATA_ULTIMO_ACESSO';

	/** the column name for the URL field */
	const URL = 'usuario.URL';

	/** the column name for the NOME field */
	const NOME = 'usuario.NOME';

	/** the column name for the ENDERECO field */
	const ENDERECO = 'usuario.ENDERECO';

	/** the column name for the COMPLEMENTO field */
	const COMPLEMENTO = 'usuario.COMPLEMENTO';

	/** the column name for the NUMERO field */
	const NUMERO = 'usuario.NUMERO';

	/** the column name for the BAIRRO field */
	const BAIRRO = 'usuario.BAIRRO';

	/** the column name for the CIDADE field */
	const CIDADE = 'usuario.CIDADE';

	/** the column name for the EMAIL field */
	const EMAIL = 'usuario.EMAIL';

	/** the column name for the UF field */
	const UF = 'usuario.UF';

	/** the column name for the CEP field */
	const CEP = 'usuario.CEP';

	/** the column name for the CPF field */
	const CPF = 'usuario.CPF';

	/** the column name for the FONE field */
	const FONE = 'usuario.FONE';

	/** the column name for the FONE2 field */
	const FONE2 = 'usuario.FONE2';

	/** the column name for the CELULAR field */
	const CELULAR = 'usuario.CELULAR';

	/** the column name for the NASCIMENTO field */
	const NASCIMENTO = 'usuario.NASCIMENTO';

	/** the column name for the SETOR_ID field */
	const SETOR_ID = 'usuario.SETOR_ID';

	/** the column name for the CARGO_ID field */
	const CARGO_ID = 'usuario.CARGO_ID';

	/** the column name for the SITUACAO field */
	const SITUACAO = 'usuario.SITUACAO';

	/** the column name for the DATA_CADASTRO field */
	const DATA_CADASTRO = 'usuario.DATA_CADASTRO';

	/** the column name for the SAIDA_FERIAS field */
	const SAIDA_FERIAS = 'usuario.SAIDA_FERIAS';

	/** the column name for the VOLTA_FERIAS field */
	const VOLTA_FERIAS = 'usuario.VOLTA_FERIAS';

	/** the column name for the LIMITE_QUANTIDADE field */
	const LIMITE_QUANTIDADE = 'usuario.LIMITE_QUANTIDADE';

	/** the column name for the MARGEM_DESCONTO field */
	const MARGEM_DESCONTO = 'usuario.MARGEM_DESCONTO';

	/**
	 * An identiy map to hold any loaded instances of Usuario objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array Usuario[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'LocalId', 'FotoAvatar', 'PerfilId', 'Login', 'Senha', 'DataExpiracaoSenha', 'DataUltimoAcesso', 'Url', 'Nome', 'Endereco', 'Complemento', 'Numero', 'Bairro', 'Cidade', 'Email', 'Uf', 'Cep', 'Cpf', 'Fone', 'Fone2', 'Celular', 'Nascimento', 'SetorId', 'CargoId', 'Situacao', 'DataCadastro', 'SaidaFerias', 'VoltaFerias', 'LimiteQuantidade', 'MargemDesconto', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'localId', 'fotoAvatar', 'perfilId', 'login', 'senha', 'dataExpiracaoSenha', 'dataUltimoAcesso', 'url', 'nome', 'endereco', 'complemento', 'numero', 'bairro', 'cidade', 'email', 'uf', 'cep', 'cpf', 'fone', 'fone2', 'celular', 'nascimento', 'setorId', 'cargoId', 'situacao', 'dataCadastro', 'saidaFerias', 'voltaFerias', 'limiteQuantidade', 'margemDesconto', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::LOCAL_ID, self::FOTO_AVATAR, self::PERFIL_ID, self::LOGIN, self::SENHA, self::DATA_EXPIRACAO_SENHA, self::DATA_ULTIMO_ACESSO, self::URL, self::NOME, self::ENDERECO, self::COMPLEMENTO, self::NUMERO, self::BAIRRO, self::CIDADE, self::EMAIL, self::UF, self::CEP, self::CPF, self::FONE, self::FONE2, self::CELULAR, self::NASCIMENTO, self::SETOR_ID, self::CARGO_ID, self::SITUACAO, self::DATA_CADASTRO, self::SAIDA_FERIAS, self::VOLTA_FERIAS, self::LIMITE_QUANTIDADE, self::MARGEM_DESCONTO, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'local_id', 'foto_avatar', 'perfil_id', 'login', 'senha', 'data_expiracao_senha', 'data_ultimo_acesso', 'url', 'nome', 'endereco', 'complemento', 'numero', 'bairro', 'cidade', 'email', 'uf', 'cep', 'cpf', 'fone', 'fone2', 'celular', 'nascimento', 'setor_id', 'cargo_id', 'situacao', 'data_cadastro', 'saida_ferias', 'volta_ferias', 'limite_quantidade', 'margem_desconto', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'LocalId' => 1, 'FotoAvatar' => 2, 'PerfilId' => 3, 'Login' => 4, 'Senha' => 5, 'DataExpiracaoSenha' => 6, 'DataUltimoAcesso' => 7, 'Url' => 8, 'Nome' => 9, 'Endereco' => 10, 'Complemento' => 11, 'Numero' => 12, 'Bairro' => 13, 'Cidade' => 14, 'Email' => 15, 'Uf' => 16, 'Cep' => 17, 'Cpf' => 18, 'Fone' => 19, 'Fone2' => 20, 'Celular' => 21, 'Nascimento' => 22, 'SetorId' => 23, 'CargoId' => 24, 'Situacao' => 25, 'DataCadastro' => 26, 'SaidaFerias' => 27, 'VoltaFerias' => 28, 'LimiteQuantidade' => 29, 'MargemDesconto' => 30, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'localId' => 1, 'fotoAvatar' => 2, 'perfilId' => 3, 'login' => 4, 'senha' => 5, 'dataExpiracaoSenha' => 6, 'dataUltimoAcesso' => 7, 'url' => 8, 'nome' => 9, 'endereco' => 10, 'complemento' => 11, 'numero' => 12, 'bairro' => 13, 'cidade' => 14, 'email' => 15, 'uf' => 16, 'cep' => 17, 'cpf' => 18, 'fone' => 19, 'fone2' => 20, 'celular' => 21, 'nascimento' => 22, 'setorId' => 23, 'cargoId' => 24, 'situacao' => 25, 'dataCadastro' => 26, 'saidaFerias' => 27, 'voltaFerias' => 28, 'limiteQuantidade' => 29, 'margemDesconto' => 30, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::LOCAL_ID => 1, self::FOTO_AVATAR => 2, self::PERFIL_ID => 3, self::LOGIN => 4, self::SENHA => 5, self::DATA_EXPIRACAO_SENHA => 6, self::DATA_ULTIMO_ACESSO => 7, self::URL => 8, self::NOME => 9, self::ENDERECO => 10, self::COMPLEMENTO => 11, self::NUMERO => 12, self::BAIRRO => 13, self::CIDADE => 14, self::EMAIL => 15, self::UF => 16, self::CEP => 17, self::CPF => 18, self::FONE => 19, self::FONE2 => 20, self::CELULAR => 21, self::NASCIMENTO => 22, self::SETOR_ID => 23, self::CARGO_ID => 24, self::SITUACAO => 25, self::DATA_CADASTRO => 26, self::SAIDA_FERIAS => 27, self::VOLTA_FERIAS => 28, self::LIMITE_QUANTIDADE => 29, self::MARGEM_DESCONTO => 30, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'local_id' => 1, 'foto_avatar' => 2, 'perfil_id' => 3, 'login' => 4, 'senha' => 5, 'data_expiracao_senha' => 6, 'data_ultimo_acesso' => 7, 'url' => 8, 'nome' => 9, 'endereco' => 10, 'complemento' => 11, 'numero' => 12, 'bairro' => 13, 'cidade' => 14, 'email' => 15, 'uf' => 16, 'cep' => 17, 'cpf' => 18, 'fone' => 19, 'fone2' => 20, 'celular' => 21, 'nascimento' => 22, 'setor_id' => 23, 'cargo_id' => 24, 'situacao' => 25, 'data_cadastro' => 26, 'saida_ferias' => 27, 'volta_ferias' => 28, 'limite_quantidade' => 29, 'margem_desconto' => 30, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, )
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
	 * @param      string $column The column name for current table. (i.e. UsuarioPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(UsuarioPeer::TABLE_NAME.'.', $alias.'.', $column);
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
		$criteria->addSelectColumn(UsuarioPeer::ID);
		$criteria->addSelectColumn(UsuarioPeer::LOCAL_ID);
		$criteria->addSelectColumn(UsuarioPeer::FOTO_AVATAR);
		$criteria->addSelectColumn(UsuarioPeer::PERFIL_ID);
		$criteria->addSelectColumn(UsuarioPeer::LOGIN);
		$criteria->addSelectColumn(UsuarioPeer::SENHA);
		$criteria->addSelectColumn(UsuarioPeer::DATA_EXPIRACAO_SENHA);
		$criteria->addSelectColumn(UsuarioPeer::DATA_ULTIMO_ACESSO);
		$criteria->addSelectColumn(UsuarioPeer::URL);
		$criteria->addSelectColumn(UsuarioPeer::NOME);
		$criteria->addSelectColumn(UsuarioPeer::ENDERECO);
		$criteria->addSelectColumn(UsuarioPeer::COMPLEMENTO);
		$criteria->addSelectColumn(UsuarioPeer::NUMERO);
		$criteria->addSelectColumn(UsuarioPeer::BAIRRO);
		$criteria->addSelectColumn(UsuarioPeer::CIDADE);
		$criteria->addSelectColumn(UsuarioPeer::EMAIL);
		$criteria->addSelectColumn(UsuarioPeer::UF);
		$criteria->addSelectColumn(UsuarioPeer::CEP);
		$criteria->addSelectColumn(UsuarioPeer::CPF);
		$criteria->addSelectColumn(UsuarioPeer::FONE);
		$criteria->addSelectColumn(UsuarioPeer::FONE2);
		$criteria->addSelectColumn(UsuarioPeer::CELULAR);
		$criteria->addSelectColumn(UsuarioPeer::NASCIMENTO);
		$criteria->addSelectColumn(UsuarioPeer::SETOR_ID);
		$criteria->addSelectColumn(UsuarioPeer::CARGO_ID);
		$criteria->addSelectColumn(UsuarioPeer::SITUACAO);
		$criteria->addSelectColumn(UsuarioPeer::DATA_CADASTRO);
		$criteria->addSelectColumn(UsuarioPeer::SAIDA_FERIAS);
		$criteria->addSelectColumn(UsuarioPeer::VOLTA_FERIAS);
		$criteria->addSelectColumn(UsuarioPeer::LIMITE_QUANTIDADE);
		$criteria->addSelectColumn(UsuarioPeer::MARGEM_DESCONTO);
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
		$criteria->setPrimaryTableName(UsuarioPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			UsuarioPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return     Usuario
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = UsuarioPeer::doSelect($critcopy, $con);
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
		return UsuarioPeer::populateObjects(UsuarioPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			UsuarioPeer::addSelectColumns($criteria);
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
	 * @param      Usuario $value A Usuario object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(Usuario $obj, $key = null)
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
	 * @param      mixed $value A Usuario object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof Usuario) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Usuario object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     Usuario Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to usuario
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
		$cls = UsuarioPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = UsuarioPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = UsuarioPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				UsuarioPeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
	}

	/**
	 * Returns the number of rows matching criteria, joining the related Setor table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinSetor(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(UsuarioPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			UsuarioPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(UsuarioPeer::SETOR_ID, SetorPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(UsuarioPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			UsuarioPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(UsuarioPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Cargo table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinCargo(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(UsuarioPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			UsuarioPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(UsuarioPeer::CARGO_ID, CargoPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Perfil table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinPerfil(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(UsuarioPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			UsuarioPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(UsuarioPeer::PERFIL_ID, PerfilPeer::ID, $join_behavior);

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
	 * Selects a collection of Usuario objects pre-filled with their Setor objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Usuario objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinSetor(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		UsuarioPeer::addSelectColumns($criteria);
		$startcol = (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);
		SetorPeer::addSelectColumns($criteria);

		$criteria->addJoin(UsuarioPeer::SETOR_ID, SetorPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = UsuarioPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = UsuarioPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = UsuarioPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				UsuarioPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = SetorPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = SetorPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = SetorPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					SetorPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded
				
				// Add the $obj1 (Usuario) to $obj2 (Setor)
				$obj2->addUsuario($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Usuario objects pre-filled with their Local objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Usuario objects.
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

		UsuarioPeer::addSelectColumns($criteria);
		$startcol = (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);
		LocalPeer::addSelectColumns($criteria);

		$criteria->addJoin(UsuarioPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = UsuarioPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = UsuarioPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = UsuarioPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				UsuarioPeer::addInstanceToPool($obj1, $key1);
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
				
				// Add the $obj1 (Usuario) to $obj2 (Local)
				$obj2->addUsuario($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Usuario objects pre-filled with their Cargo objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Usuario objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinCargo(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		UsuarioPeer::addSelectColumns($criteria);
		$startcol = (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);
		CargoPeer::addSelectColumns($criteria);

		$criteria->addJoin(UsuarioPeer::CARGO_ID, CargoPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = UsuarioPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = UsuarioPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = UsuarioPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				UsuarioPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = CargoPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = CargoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = CargoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					CargoPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded
				
				// Add the $obj1 (Usuario) to $obj2 (Cargo)
				$obj2->addUsuario($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Usuario objects pre-filled with their Perfil objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Usuario objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinPerfil(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		UsuarioPeer::addSelectColumns($criteria);
		$startcol = (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);
		PerfilPeer::addSelectColumns($criteria);

		$criteria->addJoin(UsuarioPeer::PERFIL_ID, PerfilPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = UsuarioPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = UsuarioPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = UsuarioPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				UsuarioPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = PerfilPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = PerfilPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = PerfilPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					PerfilPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded
				
				// Add the $obj1 (Usuario) to $obj2 (Perfil)
				$obj2->addUsuario($obj1);

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
		$criteria->setPrimaryTableName(UsuarioPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			UsuarioPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(UsuarioPeer::SETOR_ID, SetorPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::CARGO_ID, CargoPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::PERFIL_ID, PerfilPeer::ID, $join_behavior);

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
	 * Selects a collection of Usuario objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Usuario objects.
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

		UsuarioPeer::addSelectColumns($criteria);
		$startcol2 = (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

		SetorPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (SetorPeer::NUM_COLUMNS - SetorPeer::NUM_LAZY_LOAD_COLUMNS);

		LocalPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (LocalPeer::NUM_COLUMNS - LocalPeer::NUM_LAZY_LOAD_COLUMNS);

		CargoPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (CargoPeer::NUM_COLUMNS - CargoPeer::NUM_LAZY_LOAD_COLUMNS);

		PerfilPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (PerfilPeer::NUM_COLUMNS - PerfilPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(UsuarioPeer::SETOR_ID, SetorPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::CARGO_ID, CargoPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::PERFIL_ID, PerfilPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = UsuarioPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = UsuarioPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = UsuarioPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				UsuarioPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined Setor rows

			$key2 = SetorPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = SetorPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = SetorPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					SetorPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (Usuario) to the collection in $obj2 (Setor)
				$obj2->addUsuario($obj1);
			} // if joined row not null

			// Add objects for joined Local rows

			$key3 = LocalPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = LocalPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$cls = LocalPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					LocalPeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (Usuario) to the collection in $obj3 (Local)
				$obj3->addUsuario($obj1);
			} // if joined row not null

			// Add objects for joined Cargo rows

			$key4 = CargoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = CargoPeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$cls = CargoPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					CargoPeer::addInstanceToPool($obj4, $key4);
				} // if obj4 loaded

				// Add the $obj1 (Usuario) to the collection in $obj4 (Cargo)
				$obj4->addUsuario($obj1);
			} // if joined row not null

			// Add objects for joined Perfil rows

			$key5 = PerfilPeer::getPrimaryKeyHashFromRow($row, $startcol5);
			if ($key5 !== null) {
				$obj5 = PerfilPeer::getInstanceFromPool($key5);
				if (!$obj5) {

					$cls = PerfilPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					PerfilPeer::addInstanceToPool($obj5, $key5);
				} // if obj5 loaded

				// Add the $obj1 (Usuario) to the collection in $obj5 (Perfil)
				$obj5->addUsuario($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Setor table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptSetor(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(UsuarioPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			UsuarioPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(UsuarioPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::CARGO_ID, CargoPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::PERFIL_ID, PerfilPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(UsuarioPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			UsuarioPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(UsuarioPeer::SETOR_ID, SetorPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::CARGO_ID, CargoPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::PERFIL_ID, PerfilPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Cargo table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptCargo(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(UsuarioPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			UsuarioPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(UsuarioPeer::SETOR_ID, SetorPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::PERFIL_ID, PerfilPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Perfil table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptPerfil(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(UsuarioPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			UsuarioPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(UsuarioPeer::SETOR_ID, SetorPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::CARGO_ID, CargoPeer::ID, $join_behavior);

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
	 * Selects a collection of Usuario objects pre-filled with all related objects except Setor.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Usuario objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptSetor(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		UsuarioPeer::addSelectColumns($criteria);
		$startcol2 = (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

		LocalPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (LocalPeer::NUM_COLUMNS - LocalPeer::NUM_LAZY_LOAD_COLUMNS);

		CargoPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (CargoPeer::NUM_COLUMNS - CargoPeer::NUM_LAZY_LOAD_COLUMNS);

		PerfilPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (PerfilPeer::NUM_COLUMNS - PerfilPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(UsuarioPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::CARGO_ID, CargoPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::PERFIL_ID, PerfilPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = UsuarioPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = UsuarioPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = UsuarioPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				UsuarioPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (Usuario) to the collection in $obj2 (Local)
				$obj2->addUsuario($obj1);

			} // if joined row is not null

				// Add objects for joined Cargo rows

				$key3 = CargoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = CargoPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = CargoPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					CargoPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Usuario) to the collection in $obj3 (Cargo)
				$obj3->addUsuario($obj1);

			} // if joined row is not null

				// Add objects for joined Perfil rows

				$key4 = PerfilPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = PerfilPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = PerfilPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					PerfilPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Usuario) to the collection in $obj4 (Perfil)
				$obj4->addUsuario($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Usuario objects pre-filled with all related objects except Local.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Usuario objects.
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

		UsuarioPeer::addSelectColumns($criteria);
		$startcol2 = (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

		SetorPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (SetorPeer::NUM_COLUMNS - SetorPeer::NUM_LAZY_LOAD_COLUMNS);

		CargoPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (CargoPeer::NUM_COLUMNS - CargoPeer::NUM_LAZY_LOAD_COLUMNS);

		PerfilPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (PerfilPeer::NUM_COLUMNS - PerfilPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(UsuarioPeer::SETOR_ID, SetorPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::CARGO_ID, CargoPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::PERFIL_ID, PerfilPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = UsuarioPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = UsuarioPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = UsuarioPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				UsuarioPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Setor rows

				$key2 = SetorPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = SetorPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = SetorPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					SetorPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Usuario) to the collection in $obj2 (Setor)
				$obj2->addUsuario($obj1);

			} // if joined row is not null

				// Add objects for joined Cargo rows

				$key3 = CargoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = CargoPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = CargoPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					CargoPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Usuario) to the collection in $obj3 (Cargo)
				$obj3->addUsuario($obj1);

			} // if joined row is not null

				// Add objects for joined Perfil rows

				$key4 = PerfilPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = PerfilPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = PerfilPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					PerfilPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Usuario) to the collection in $obj4 (Perfil)
				$obj4->addUsuario($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Usuario objects pre-filled with all related objects except Cargo.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Usuario objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptCargo(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		UsuarioPeer::addSelectColumns($criteria);
		$startcol2 = (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

		SetorPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (SetorPeer::NUM_COLUMNS - SetorPeer::NUM_LAZY_LOAD_COLUMNS);

		LocalPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (LocalPeer::NUM_COLUMNS - LocalPeer::NUM_LAZY_LOAD_COLUMNS);

		PerfilPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (PerfilPeer::NUM_COLUMNS - PerfilPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(UsuarioPeer::SETOR_ID, SetorPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::PERFIL_ID, PerfilPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = UsuarioPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = UsuarioPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = UsuarioPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				UsuarioPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Setor rows

				$key2 = SetorPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = SetorPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = SetorPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					SetorPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Usuario) to the collection in $obj2 (Setor)
				$obj2->addUsuario($obj1);

			} // if joined row is not null

				// Add objects for joined Local rows

				$key3 = LocalPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = LocalPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = LocalPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					LocalPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Usuario) to the collection in $obj3 (Local)
				$obj3->addUsuario($obj1);

			} // if joined row is not null

				// Add objects for joined Perfil rows

				$key4 = PerfilPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = PerfilPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = PerfilPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					PerfilPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Usuario) to the collection in $obj4 (Perfil)
				$obj4->addUsuario($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Usuario objects pre-filled with all related objects except Perfil.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Usuario objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptPerfil(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		UsuarioPeer::addSelectColumns($criteria);
		$startcol2 = (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

		SetorPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (SetorPeer::NUM_COLUMNS - SetorPeer::NUM_LAZY_LOAD_COLUMNS);

		LocalPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (LocalPeer::NUM_COLUMNS - LocalPeer::NUM_LAZY_LOAD_COLUMNS);

		CargoPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (CargoPeer::NUM_COLUMNS - CargoPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(UsuarioPeer::SETOR_ID, SetorPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::CARGO_ID, CargoPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = UsuarioPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = UsuarioPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = UsuarioPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				UsuarioPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Setor rows

				$key2 = SetorPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = SetorPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = SetorPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					SetorPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Usuario) to the collection in $obj2 (Setor)
				$obj2->addUsuario($obj1);

			} // if joined row is not null

				// Add objects for joined Local rows

				$key3 = LocalPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = LocalPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = LocalPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					LocalPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Usuario) to the collection in $obj3 (Local)
				$obj3->addUsuario($obj1);

			} // if joined row is not null

				// Add objects for joined Cargo rows

				$key4 = CargoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = CargoPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = CargoPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					CargoPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Usuario) to the collection in $obj4 (Cargo)
				$obj4->addUsuario($obj1);

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
	  $dbMap = Propel::getDatabaseMap(BaseUsuarioPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseUsuarioPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new UsuarioTableMap());
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
		return $withPrefix ? UsuarioPeer::CLASS_DEFAULT : UsuarioPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a Usuario or Criteria object.
	 *
	 * @param      mixed $values Criteria or Usuario object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from Usuario object
		}

		if ($criteria->containsKey(UsuarioPeer::ID) && $criteria->keyContainsValue(UsuarioPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.UsuarioPeer::ID.')');
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
	 * Method perform an UPDATE on the database, given a Usuario or Criteria object.
	 *
	 * @param      mixed $values Criteria or Usuario object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(UsuarioPeer::ID);
			$selectCriteria->add(UsuarioPeer::ID, $criteria->remove(UsuarioPeer::ID), $comparison);

		} else { // $values is Usuario object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the usuario table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(UsuarioPeer::TABLE_NAME, $con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			UsuarioPeer::clearInstancePool();
			UsuarioPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a Usuario or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or Usuario object or primary key or array of primary keys
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
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			UsuarioPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof Usuario) { // it's a model object
			// invalidate the cache for this single object
			UsuarioPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(UsuarioPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				UsuarioPeer::removeInstanceFromPool($singleval);
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
			UsuarioPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given Usuario object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      Usuario $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(Usuario $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(UsuarioPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(UsuarioPeer::TABLE_NAME);

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

		if ($obj->isNew() || $obj->isColumnModified(UsuarioPeer::EMAIL))
			$columns[UsuarioPeer::EMAIL] = $obj->getEmail();

		if ($obj->isNew() || $obj->isColumnModified(UsuarioPeer::LOGIN))
			$columns[UsuarioPeer::LOGIN] = $obj->getLogin();

		}

		return BasePeer::doValidate(UsuarioPeer::DATABASE_NAME, UsuarioPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     Usuario
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = UsuarioPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		$criteria->add(UsuarioPeer::ID, $pk);

		$v = UsuarioPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
			$criteria->add(UsuarioPeer::ID, $pks, Criteria::IN);
			$objs = UsuarioPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseUsuarioPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseUsuarioPeer::buildTableMap();

