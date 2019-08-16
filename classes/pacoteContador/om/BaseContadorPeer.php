<?php

/**
 * Base static class for performing query and update operations on the 'contador' table.
 *
 * 
 *
 * @package    pacoteContador.om
 */
abstract class BaseContadorPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'swsistema';

	/** the table name for this class */
	const TABLE_NAME = 'contador';

	/** the related Propel class for this table */
	const OM_CLASS = 'Contador';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'pacoteContador.Contador';

	/** the related TableMap class for this table */
	const TM_CLASS = 'ContadorTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 48;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'contador.ID';

	/** the column name for the LOCAL_ID field */
	const LOCAL_ID = 'contador.LOCAL_ID';

	/** the column name for the COMISSAO field */
	const COMISSAO = 'contador.COMISSAO';

	/** the column name for the DESCONTO field */
	const DESCONTO = 'contador.DESCONTO';

	/** the column name for the BANCO field */
	const BANCO = 'contador.BANCO';

	/** the column name for the CONTA_CORRENTE field */
	const CONTA_CORRENTE = 'contador.CONTA_CORRENTE';

	/** the column name for the DIGITOCONTA field */
	const DIGITOCONTA = 'contador.DIGITOCONTA';

	/** the column name for the AGENCIA field */
	const AGENCIA = 'contador.AGENCIA';

	/** the column name for the DIGITOAGENCIA field */
	const DIGITOAGENCIA = 'contador.DIGITOAGENCIA';

	/** the column name for the OPERACAO field */
	const OPERACAO = 'contador.OPERACAO';

	/** the column name for the CPF_CNPJ_CONTA field */
	const CPF_CNPJ_CONTA = 'contador.CPF_CNPJ_CONTA';

	/** the column name for the RESPONSAVEL_ID field */
	const RESPONSAVEL_ID = 'contador.RESPONSAVEL_ID';

	/** the column name for the USUARIO_ID field */
	const USUARIO_ID = 'contador.USUARIO_ID';

	/** the column name for the DATA_CADASTRO field */
	const DATA_CADASTRO = 'contador.DATA_CADASTRO';

	/** the column name for the NOME field */
	const NOME = 'contador.NOME';

	/** the column name for the NASCIMENTO field */
	const NASCIMENTO = 'contador.NASCIMENTO';

	/** the column name for the CPF field */
	const CPF = 'contador.CPF';

	/** the column name for the CELULAR field */
	const CELULAR = 'contador.CELULAR';

	/** the column name for the EMAIL field */
	const EMAIL = 'contador.EMAIL';

	/** the column name for the RAZAO_SOCIAL field */
	const RAZAO_SOCIAL = 'contador.RAZAO_SOCIAL';

	/** the column name for the CNPJ field */
	const CNPJ = 'contador.CNPJ';

	/** the column name for the NOME_FANTASIA field */
	const NOME_FANTASIA = 'contador.NOME_FANTASIA';

	/** the column name for the ENDERECO field */
	const ENDERECO = 'contador.ENDERECO';

	/** the column name for the NUMERO field */
	const NUMERO = 'contador.NUMERO';

	/** the column name for the BAIRRO field */
	const BAIRRO = 'contador.BAIRRO';

	/** the column name for the COMPLEMENTO field */
	const COMPLEMENTO = 'contador.COMPLEMENTO';

	/** the column name for the CIDADE field */
	const CIDADE = 'contador.CIDADE';

	/** the column name for the EMAIL_EMPRESA field */
	const EMAIL_EMPRESA = 'contador.EMAIL_EMPRESA';

	/** the column name for the UF field */
	const UF = 'contador.UF';

	/** the column name for the CEP field */
	const CEP = 'contador.CEP';

	/** the column name for the FONE1 field */
	const FONE1 = 'contador.FONE1';

	/** the column name for the FONE2 field */
	const FONE2 = 'contador.FONE2';

	/** the column name for the PESSOA_TIPO field */
	const PESSOA_TIPO = 'contador.PESSOA_TIPO';

	/** the column name for the CRC field */
	const CRC = 'contador.CRC';

	/** the column name for the COD_CONTADOR field */
	const COD_CONTADOR = 'contador.COD_CONTADOR';

	/** the column name for the SITUACAO field */
	const SITUACAO = 'contador.SITUACAO';

	/** the column name for the URL field */
	const URL = 'contador.URL';

	/** the column name for the LOGO field */
	const LOGO = 'contador.LOGO';

	/** the column name for the LOCALIDADE field */
	const LOCALIDADE = 'contador.LOCALIDADE';

	/** the column name for the CONTATO1_NOME field */
	const CONTATO1_NOME = 'contador.CONTATO1_NOME';

	/** the column name for the CONTATO1_CARGO field */
	const CONTATO1_CARGO = 'contador.CONTATO1_CARGO';

	/** the column name for the CONTATO1_FONE field */
	const CONTATO1_FONE = 'contador.CONTATO1_FONE';

	/** the column name for the CONTATO2_NOME field */
	const CONTATO2_NOME = 'contador.CONTATO2_NOME';

	/** the column name for the CONTATO2_CARGO field */
	const CONTATO2_CARGO = 'contador.CONTATO2_CARGO';

	/** the column name for the CONTATO2_FONE field */
	const CONTATO2_FONE = 'contador.CONTATO2_FONE';

	/** the column name for the TIPO_CONTADOR field */
	const TIPO_CONTADOR = 'contador.TIPO_CONTADOR';

	/** the column name for the POSSUI_CARTAO field */
	const POSSUI_CARTAO = 'contador.POSSUI_CARTAO';

	/** the column name for the SYNC_SAFE field */
	const SYNC_SAFE = 'contador.SYNC_SAFE';

	/**
	 * An identiy map to hold any loaded instances of Contador objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array Contador[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'LocalId', 'Comissao', 'Desconto', 'Banco', 'ContaCorrente', 'Digitoconta', 'Agencia', 'Digitoagencia', 'Operacao', 'CpfCnpjConta', 'ResponsavelId', 'UsuarioId', 'DataCadastro', 'Nome', 'Nascimento', 'Cpf', 'Celular', 'Email', 'RazaoSocial', 'Cnpj', 'NomeFantasia', 'Endereco', 'Numero', 'Bairro', 'Complemento', 'Cidade', 'EmailEmpresa', 'Uf', 'Cep', 'Fone1', 'Fone2', 'PessoaTipo', 'Crc', 'CodContador', 'Situacao', 'Url', 'Logo', 'Localidade', 'Contato1Nome', 'Contato1Cargo', 'Contato1Fone', 'Contato2Nome', 'Contato2Cargo', 'Contato2Fone', 'TipoContador', 'PossuiCartao', 'SyncSafe', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'localId', 'comissao', 'desconto', 'banco', 'contaCorrente', 'digitoconta', 'agencia', 'digitoagencia', 'operacao', 'cpfCnpjConta', 'responsavelId', 'usuarioId', 'dataCadastro', 'nome', 'nascimento', 'cpf', 'celular', 'email', 'razaoSocial', 'cnpj', 'nomeFantasia', 'endereco', 'numero', 'bairro', 'complemento', 'cidade', 'emailEmpresa', 'uf', 'cep', 'fone1', 'fone2', 'pessoaTipo', 'crc', 'codContador', 'situacao', 'url', 'logo', 'localidade', 'contato1Nome', 'contato1Cargo', 'contato1Fone', 'contato2Nome', 'contato2Cargo', 'contato2Fone', 'tipoContador', 'possuiCartao', 'syncSafe', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::LOCAL_ID, self::COMISSAO, self::DESCONTO, self::BANCO, self::CONTA_CORRENTE, self::DIGITOCONTA, self::AGENCIA, self::DIGITOAGENCIA, self::OPERACAO, self::CPF_CNPJ_CONTA, self::RESPONSAVEL_ID, self::USUARIO_ID, self::DATA_CADASTRO, self::NOME, self::NASCIMENTO, self::CPF, self::CELULAR, self::EMAIL, self::RAZAO_SOCIAL, self::CNPJ, self::NOME_FANTASIA, self::ENDERECO, self::NUMERO, self::BAIRRO, self::COMPLEMENTO, self::CIDADE, self::EMAIL_EMPRESA, self::UF, self::CEP, self::FONE1, self::FONE2, self::PESSOA_TIPO, self::CRC, self::COD_CONTADOR, self::SITUACAO, self::URL, self::LOGO, self::LOCALIDADE, self::CONTATO1_NOME, self::CONTATO1_CARGO, self::CONTATO1_FONE, self::CONTATO2_NOME, self::CONTATO2_CARGO, self::CONTATO2_FONE, self::TIPO_CONTADOR, self::POSSUI_CARTAO, self::SYNC_SAFE, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'local_id', 'comissao', 'desconto', 'banco', 'conta_corrente', 'digitoConta', 'agencia', 'digitoAgencia', 'operacao', 'cpf_cnpj_conta', 'responsavel_id', 'usuario_id', 'data_cadastro', 'nome', 'nascimento', 'cpf', 'celular', 'email', 'razao_social', 'cnpj', 'nome_fantasia', 'endereco', 'numero', 'bairro', 'complemento', 'cidade', 'email_empresa', 'uf', 'cep', 'fone1', 'fone2', 'pessoa_tipo', 'crc', 'cod_contador', 'situacao', 'url', 'logo', 'localidade', 'contato1_nome', 'contato1_cargo', 'contato1_fone', 'contato2_nome', 'contato2_cargo', 'contato2_fone', 'tipo_contador', 'possui_cartao', 'sync_safe', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'LocalId' => 1, 'Comissao' => 2, 'Desconto' => 3, 'Banco' => 4, 'ContaCorrente' => 5, 'Digitoconta' => 6, 'Agencia' => 7, 'Digitoagencia' => 8, 'Operacao' => 9, 'CpfCnpjConta' => 10, 'ResponsavelId' => 11, 'UsuarioId' => 12, 'DataCadastro' => 13, 'Nome' => 14, 'Nascimento' => 15, 'Cpf' => 16, 'Celular' => 17, 'Email' => 18, 'RazaoSocial' => 19, 'Cnpj' => 20, 'NomeFantasia' => 21, 'Endereco' => 22, 'Numero' => 23, 'Bairro' => 24, 'Complemento' => 25, 'Cidade' => 26, 'EmailEmpresa' => 27, 'Uf' => 28, 'Cep' => 29, 'Fone1' => 30, 'Fone2' => 31, 'PessoaTipo' => 32, 'Crc' => 33, 'CodContador' => 34, 'Situacao' => 35, 'Url' => 36, 'Logo' => 37, 'Localidade' => 38, 'Contato1Nome' => 39, 'Contato1Cargo' => 40, 'Contato1Fone' => 41, 'Contato2Nome' => 42, 'Contato2Cargo' => 43, 'Contato2Fone' => 44, 'TipoContador' => 45, 'PossuiCartao' => 46, 'SyncSafe' => 47, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'localId' => 1, 'comissao' => 2, 'desconto' => 3, 'banco' => 4, 'contaCorrente' => 5, 'digitoconta' => 6, 'agencia' => 7, 'digitoagencia' => 8, 'operacao' => 9, 'cpfCnpjConta' => 10, 'responsavelId' => 11, 'usuarioId' => 12, 'dataCadastro' => 13, 'nome' => 14, 'nascimento' => 15, 'cpf' => 16, 'celular' => 17, 'email' => 18, 'razaoSocial' => 19, 'cnpj' => 20, 'nomeFantasia' => 21, 'endereco' => 22, 'numero' => 23, 'bairro' => 24, 'complemento' => 25, 'cidade' => 26, 'emailEmpresa' => 27, 'uf' => 28, 'cep' => 29, 'fone1' => 30, 'fone2' => 31, 'pessoaTipo' => 32, 'crc' => 33, 'codContador' => 34, 'situacao' => 35, 'url' => 36, 'logo' => 37, 'localidade' => 38, 'contato1Nome' => 39, 'contato1Cargo' => 40, 'contato1Fone' => 41, 'contato2Nome' => 42, 'contato2Cargo' => 43, 'contato2Fone' => 44, 'tipoContador' => 45, 'possuiCartao' => 46, 'syncSafe' => 47, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::LOCAL_ID => 1, self::COMISSAO => 2, self::DESCONTO => 3, self::BANCO => 4, self::CONTA_CORRENTE => 5, self::DIGITOCONTA => 6, self::AGENCIA => 7, self::DIGITOAGENCIA => 8, self::OPERACAO => 9, self::CPF_CNPJ_CONTA => 10, self::RESPONSAVEL_ID => 11, self::USUARIO_ID => 12, self::DATA_CADASTRO => 13, self::NOME => 14, self::NASCIMENTO => 15, self::CPF => 16, self::CELULAR => 17, self::EMAIL => 18, self::RAZAO_SOCIAL => 19, self::CNPJ => 20, self::NOME_FANTASIA => 21, self::ENDERECO => 22, self::NUMERO => 23, self::BAIRRO => 24, self::COMPLEMENTO => 25, self::CIDADE => 26, self::EMAIL_EMPRESA => 27, self::UF => 28, self::CEP => 29, self::FONE1 => 30, self::FONE2 => 31, self::PESSOA_TIPO => 32, self::CRC => 33, self::COD_CONTADOR => 34, self::SITUACAO => 35, self::URL => 36, self::LOGO => 37, self::LOCALIDADE => 38, self::CONTATO1_NOME => 39, self::CONTATO1_CARGO => 40, self::CONTATO1_FONE => 41, self::CONTATO2_NOME => 42, self::CONTATO2_CARGO => 43, self::CONTATO2_FONE => 44, self::TIPO_CONTADOR => 45, self::POSSUI_CARTAO => 46, self::SYNC_SAFE => 47, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'local_id' => 1, 'comissao' => 2, 'desconto' => 3, 'banco' => 4, 'conta_corrente' => 5, 'digitoConta' => 6, 'agencia' => 7, 'digitoAgencia' => 8, 'operacao' => 9, 'cpf_cnpj_conta' => 10, 'responsavel_id' => 11, 'usuario_id' => 12, 'data_cadastro' => 13, 'nome' => 14, 'nascimento' => 15, 'cpf' => 16, 'celular' => 17, 'email' => 18, 'razao_social' => 19, 'cnpj' => 20, 'nome_fantasia' => 21, 'endereco' => 22, 'numero' => 23, 'bairro' => 24, 'complemento' => 25, 'cidade' => 26, 'email_empresa' => 27, 'uf' => 28, 'cep' => 29, 'fone1' => 30, 'fone2' => 31, 'pessoa_tipo' => 32, 'crc' => 33, 'cod_contador' => 34, 'situacao' => 35, 'url' => 36, 'logo' => 37, 'localidade' => 38, 'contato1_nome' => 39, 'contato1_cargo' => 40, 'contato1_fone' => 41, 'contato2_nome' => 42, 'contato2_cargo' => 43, 'contato2_fone' => 44, 'tipo_contador' => 45, 'possui_cartao' => 46, 'sync_safe' => 47, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, )
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
	 * @param      string $column The column name for current table. (i.e. ContadorPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(ContadorPeer::TABLE_NAME.'.', $alias.'.', $column);
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
		$criteria->addSelectColumn(ContadorPeer::ID);
		$criteria->addSelectColumn(ContadorPeer::LOCAL_ID);
		$criteria->addSelectColumn(ContadorPeer::COMISSAO);
		$criteria->addSelectColumn(ContadorPeer::DESCONTO);
		$criteria->addSelectColumn(ContadorPeer::BANCO);
		$criteria->addSelectColumn(ContadorPeer::CONTA_CORRENTE);
		$criteria->addSelectColumn(ContadorPeer::DIGITOCONTA);
		$criteria->addSelectColumn(ContadorPeer::AGENCIA);
		$criteria->addSelectColumn(ContadorPeer::DIGITOAGENCIA);
		$criteria->addSelectColumn(ContadorPeer::OPERACAO);
		$criteria->addSelectColumn(ContadorPeer::CPF_CNPJ_CONTA);
		$criteria->addSelectColumn(ContadorPeer::RESPONSAVEL_ID);
		$criteria->addSelectColumn(ContadorPeer::USUARIO_ID);
		$criteria->addSelectColumn(ContadorPeer::DATA_CADASTRO);
		$criteria->addSelectColumn(ContadorPeer::NOME);
		$criteria->addSelectColumn(ContadorPeer::NASCIMENTO);
		$criteria->addSelectColumn(ContadorPeer::CPF);
		$criteria->addSelectColumn(ContadorPeer::CELULAR);
		$criteria->addSelectColumn(ContadorPeer::EMAIL);
		$criteria->addSelectColumn(ContadorPeer::RAZAO_SOCIAL);
		$criteria->addSelectColumn(ContadorPeer::CNPJ);
		$criteria->addSelectColumn(ContadorPeer::NOME_FANTASIA);
		$criteria->addSelectColumn(ContadorPeer::ENDERECO);
		$criteria->addSelectColumn(ContadorPeer::NUMERO);
		$criteria->addSelectColumn(ContadorPeer::BAIRRO);
		$criteria->addSelectColumn(ContadorPeer::COMPLEMENTO);
		$criteria->addSelectColumn(ContadorPeer::CIDADE);
		$criteria->addSelectColumn(ContadorPeer::EMAIL_EMPRESA);
		$criteria->addSelectColumn(ContadorPeer::UF);
		$criteria->addSelectColumn(ContadorPeer::CEP);
		$criteria->addSelectColumn(ContadorPeer::FONE1);
		$criteria->addSelectColumn(ContadorPeer::FONE2);
		$criteria->addSelectColumn(ContadorPeer::PESSOA_TIPO);
		$criteria->addSelectColumn(ContadorPeer::CRC);
		$criteria->addSelectColumn(ContadorPeer::COD_CONTADOR);
		$criteria->addSelectColumn(ContadorPeer::SITUACAO);
		$criteria->addSelectColumn(ContadorPeer::URL);
		$criteria->addSelectColumn(ContadorPeer::LOGO);
		$criteria->addSelectColumn(ContadorPeer::LOCALIDADE);
		$criteria->addSelectColumn(ContadorPeer::CONTATO1_NOME);
		$criteria->addSelectColumn(ContadorPeer::CONTATO1_CARGO);
		$criteria->addSelectColumn(ContadorPeer::CONTATO1_FONE);
		$criteria->addSelectColumn(ContadorPeer::CONTATO2_NOME);
		$criteria->addSelectColumn(ContadorPeer::CONTATO2_CARGO);
		$criteria->addSelectColumn(ContadorPeer::CONTATO2_FONE);
		$criteria->addSelectColumn(ContadorPeer::TIPO_CONTADOR);
		$criteria->addSelectColumn(ContadorPeer::POSSUI_CARTAO);
		$criteria->addSelectColumn(ContadorPeer::SYNC_SAFE);
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
		$criteria->setPrimaryTableName(ContadorPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ContadorPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(ContadorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return     Contador
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = ContadorPeer::doSelect($critcopy, $con);
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
		return ContadorPeer::populateObjects(ContadorPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(ContadorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			ContadorPeer::addSelectColumns($criteria);
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
	 * @param      Contador $value A Contador object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(Contador $obj, $key = null)
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
	 * @param      mixed $value A Contador object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof Contador) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Contador object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     Contador Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to contador
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
		$cls = ContadorPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = ContadorPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = ContadorPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				ContadorPeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
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
		$criteria->setPrimaryTableName(ContadorPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ContadorPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ContadorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ContadorPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(ContadorPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ContadorPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ContadorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ContadorPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(ContadorPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ContadorPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ContadorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ContadorPeer::RESPONSAVEL_ID, ResponsavelPeer::ID, $join_behavior);

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
	 * Selects a collection of Contador objects pre-filled with their Usuario objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Contador objects.
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

		ContadorPeer::addSelectColumns($criteria);
		$startcol = (ContadorPeer::NUM_COLUMNS - ContadorPeer::NUM_LAZY_LOAD_COLUMNS);
		UsuarioPeer::addSelectColumns($criteria);

		$criteria->addJoin(ContadorPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ContadorPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ContadorPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = ContadorPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ContadorPeer::addInstanceToPool($obj1, $key1);
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
				
				// Add the $obj1 (Contador) to $obj2 (Usuario)
				$obj2->addContador($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Contador objects pre-filled with their Local objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Contador objects.
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

		ContadorPeer::addSelectColumns($criteria);
		$startcol = (ContadorPeer::NUM_COLUMNS - ContadorPeer::NUM_LAZY_LOAD_COLUMNS);
		LocalPeer::addSelectColumns($criteria);

		$criteria->addJoin(ContadorPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ContadorPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ContadorPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = ContadorPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ContadorPeer::addInstanceToPool($obj1, $key1);
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
				
				// Add the $obj1 (Contador) to $obj2 (Local)
				$obj2->addContador($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Contador objects pre-filled with their Responsavel objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Contador objects.
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

		ContadorPeer::addSelectColumns($criteria);
		$startcol = (ContadorPeer::NUM_COLUMNS - ContadorPeer::NUM_LAZY_LOAD_COLUMNS);
		ResponsavelPeer::addSelectColumns($criteria);

		$criteria->addJoin(ContadorPeer::RESPONSAVEL_ID, ResponsavelPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ContadorPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ContadorPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = ContadorPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ContadorPeer::addInstanceToPool($obj1, $key1);
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
				
				// Add the $obj1 (Contador) to $obj2 (Responsavel)
				$obj2->addContador($obj1);

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
		$criteria->setPrimaryTableName(ContadorPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ContadorPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ContadorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ContadorPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(ContadorPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(ContadorPeer::RESPONSAVEL_ID, ResponsavelPeer::ID, $join_behavior);

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
	 * Selects a collection of Contador objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Contador objects.
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

		ContadorPeer::addSelectColumns($criteria);
		$startcol2 = (ContadorPeer::NUM_COLUMNS - ContadorPeer::NUM_LAZY_LOAD_COLUMNS);

		UsuarioPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

		LocalPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (LocalPeer::NUM_COLUMNS - LocalPeer::NUM_LAZY_LOAD_COLUMNS);

		ResponsavelPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (ResponsavelPeer::NUM_COLUMNS - ResponsavelPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(ContadorPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(ContadorPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(ContadorPeer::RESPONSAVEL_ID, ResponsavelPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ContadorPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ContadorPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ContadorPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ContadorPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined Usuario rows

			$key2 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = UsuarioPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = UsuarioPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					UsuarioPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (Contador) to the collection in $obj2 (Usuario)
				$obj2->addContador($obj1);
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

				// Add the $obj1 (Contador) to the collection in $obj3 (Local)
				$obj3->addContador($obj1);
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

				// Add the $obj1 (Contador) to the collection in $obj4 (Responsavel)
				$obj4->addContador($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
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
		$criteria->setPrimaryTableName(ContadorPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ContadorPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ContadorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(ContadorPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(ContadorPeer::RESPONSAVEL_ID, ResponsavelPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(ContadorPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ContadorPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ContadorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(ContadorPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(ContadorPeer::RESPONSAVEL_ID, ResponsavelPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(ContadorPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ContadorPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ContadorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(ContadorPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(ContadorPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

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
	 * Selects a collection of Contador objects pre-filled with all related objects except Usuario.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Contador objects.
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

		ContadorPeer::addSelectColumns($criteria);
		$startcol2 = (ContadorPeer::NUM_COLUMNS - ContadorPeer::NUM_LAZY_LOAD_COLUMNS);

		LocalPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (LocalPeer::NUM_COLUMNS - LocalPeer::NUM_LAZY_LOAD_COLUMNS);

		ResponsavelPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ResponsavelPeer::NUM_COLUMNS - ResponsavelPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(ContadorPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(ContadorPeer::RESPONSAVEL_ID, ResponsavelPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ContadorPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ContadorPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ContadorPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ContadorPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (Contador) to the collection in $obj2 (Local)
				$obj2->addContador($obj1);

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

				// Add the $obj1 (Contador) to the collection in $obj3 (Responsavel)
				$obj3->addContador($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Contador objects pre-filled with all related objects except Local.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Contador objects.
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

		ContadorPeer::addSelectColumns($criteria);
		$startcol2 = (ContadorPeer::NUM_COLUMNS - ContadorPeer::NUM_LAZY_LOAD_COLUMNS);

		UsuarioPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

		ResponsavelPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ResponsavelPeer::NUM_COLUMNS - ResponsavelPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(ContadorPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(ContadorPeer::RESPONSAVEL_ID, ResponsavelPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ContadorPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ContadorPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ContadorPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ContadorPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Usuario rows

				$key2 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = UsuarioPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					UsuarioPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Contador) to the collection in $obj2 (Usuario)
				$obj2->addContador($obj1);

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

				// Add the $obj1 (Contador) to the collection in $obj3 (Responsavel)
				$obj3->addContador($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Contador objects pre-filled with all related objects except Responsavel.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Contador objects.
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

		ContadorPeer::addSelectColumns($criteria);
		$startcol2 = (ContadorPeer::NUM_COLUMNS - ContadorPeer::NUM_LAZY_LOAD_COLUMNS);

		UsuarioPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

		LocalPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (LocalPeer::NUM_COLUMNS - LocalPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(ContadorPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(ContadorPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ContadorPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ContadorPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ContadorPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ContadorPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Usuario rows

				$key2 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = UsuarioPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					UsuarioPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Contador) to the collection in $obj2 (Usuario)
				$obj2->addContador($obj1);

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

				// Add the $obj1 (Contador) to the collection in $obj3 (Local)
				$obj3->addContador($obj1);

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
	  $dbMap = Propel::getDatabaseMap(BaseContadorPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseContadorPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new ContadorTableMap());
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
		return $withPrefix ? ContadorPeer::CLASS_DEFAULT : ContadorPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a Contador or Criteria object.
	 *
	 * @param      mixed $values Criteria or Contador object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ContadorPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from Contador object
		}

		if ($criteria->containsKey(ContadorPeer::ID) && $criteria->keyContainsValue(ContadorPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.ContadorPeer::ID.')');
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
	 * Method perform an UPDATE on the database, given a Contador or Criteria object.
	 *
	 * @param      mixed $values Criteria or Contador object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ContadorPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(ContadorPeer::ID);
			$selectCriteria->add(ContadorPeer::ID, $criteria->remove(ContadorPeer::ID), $comparison);

		} else { // $values is Contador object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the contador table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ContadorPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(ContadorPeer::TABLE_NAME, $con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			ContadorPeer::clearInstancePool();
			ContadorPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a Contador or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or Contador object or primary key or array of primary keys
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
			$con = Propel::getConnection(ContadorPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			ContadorPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof Contador) { // it's a model object
			// invalidate the cache for this single object
			ContadorPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ContadorPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				ContadorPeer::removeInstanceFromPool($singleval);
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
			ContadorPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given Contador object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      Contador $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(Contador $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ContadorPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ContadorPeer::TABLE_NAME);

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

		if ($obj->isNew() || $obj->isColumnModified(ContadorPeer::EMAIL))
			$columns[ContadorPeer::EMAIL] = $obj->getEmail();

		if ($obj->isNew() || $obj->isColumnModified(ContadorPeer::CPF))
			$columns[ContadorPeer::CPF] = $obj->getCpf();

		if ($obj->isNew() || $obj->isColumnModified(ContadorPeer::COD_CONTADOR))
			$columns[ContadorPeer::COD_CONTADOR] = $obj->getCodContador();

		}

		return BasePeer::doValidate(ContadorPeer::DATABASE_NAME, ContadorPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     Contador
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = ContadorPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(ContadorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(ContadorPeer::DATABASE_NAME);
		$criteria->add(ContadorPeer::ID, $pk);

		$v = ContadorPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(ContadorPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(ContadorPeer::DATABASE_NAME);
			$criteria->add(ContadorPeer::ID, $pks, Criteria::IN);
			$objs = ContadorPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseContadorPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseContadorPeer::buildTableMap();

