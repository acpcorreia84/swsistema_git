<?php

/**
 * Base static class for performing query and update operations on the 'certificado' table.
 *
 * 
 *
 * @package    pacoteCertificado.om
 */
abstract class BaseCertificadoPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'swsistema';

	/** the table name for this class */
	const TABLE_NAME = 'certificado';

	/** the related Propel class for this table */
	const OM_CLASS = 'Certificado';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'pacoteCertificado.Certificado';

	/** the related TableMap class for this table */
	const TM_CLASS = 'CertificadoTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 33;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'certificado.ID';

	/** the column name for the PRODUTO_ID field */
	const PRODUTO_ID = 'certificado.PRODUTO_ID';

	/** the column name for the CLIENTE_ID field */
	const CLIENTE_ID = 'certificado.CLIENTE_ID';

	/** the column name for the FORMA_PAGAMENTO_ID field */
	const FORMA_PAGAMENTO_ID = 'certificado.FORMA_PAGAMENTO_ID';

	/** the column name for the USUARIO_ID field */
	const USUARIO_ID = 'certificado.USUARIO_ID';

	/** the column name for the FUNCIONARIO_VALIDOU_ID field */
	const FUNCIONARIO_VALIDOU_ID = 'certificado.FUNCIONARIO_VALIDOU_ID';

	/** the column name for the USUARIO_VALIDOU_ID field */
	const USUARIO_VALIDOU_ID = 'certificado.USUARIO_VALIDOU_ID';

	/** the column name for the LOCAL_ID field */
	const LOCAL_ID = 'certificado.LOCAL_ID';

	/** the column name for the CONTADOR_ID field */
	const CONTADOR_ID = 'certificado.CONTADOR_ID';

	/** the column name for the AUTORIZADO_VENDA_SEM_CONTADOR field */
	const AUTORIZADO_VENDA_SEM_CONTADOR = 'certificado.AUTORIZADO_VENDA_SEM_CONTADOR';

	/** the column name for the CODIGO_DOCUMENTO field */
	const CODIGO_DOCUMENTO = 'certificado.CODIGO_DOCUMENTO';

	/** the column name for the PROTOCOLO field */
	const PROTOCOLO = 'certificado.PROTOCOLO';

	/** the column name for the VOUCHER field */
	const VOUCHER = 'certificado.VOUCHER';

	/** the column name for the DESCONTO field */
	const DESCONTO = 'certificado.DESCONTO';

	/** the column name for the MOTIVO_DESCONTO field */
	const MOTIVO_DESCONTO = 'certificado.MOTIVO_DESCONTO';

	/** the column name for the OBSERVACAO field */
	const OBSERVACAO = 'certificado.OBSERVACAO';

	/** the column name for the DATA_COMPRA field */
	const DATA_COMPRA = 'certificado.DATA_COMPRA';

	/** the column name for the DATA_ULTIMA_VALIDACAO field */
	const DATA_ULTIMA_VALIDACAO = 'certificado.DATA_ULTIMA_VALIDACAO';

	/** the column name for the DATA_PAGAMENTO field */
	const DATA_PAGAMENTO = 'certificado.DATA_PAGAMENTO';

	/** the column name for the DATA_VALIDACAO field */
	const DATA_VALIDACAO = 'certificado.DATA_VALIDACAO';

	/** the column name for the DATA_CONFIRMACAO_PAGAMENTO field */
	const DATA_CONFIRMACAO_PAGAMENTO = 'certificado.DATA_CONFIRMACAO_PAGAMENTO';

	/** the column name for the DATA_REVOGACAO field */
	const DATA_REVOGACAO = 'certificado.DATA_REVOGACAO';

	/** the column name for the DATA_INICIO_VALIDADE field */
	const DATA_INICIO_VALIDADE = 'certificado.DATA_INICIO_VALIDADE';

	/** the column name for the DATA_FIM_VALIDADE field */
	const DATA_FIM_VALIDADE = 'certificado.DATA_FIM_VALIDADE';

	/** the column name for the DATA_RECARTEIRIZACAO field */
	const DATA_RECARTEIRIZACAO = 'certificado.DATA_RECARTEIRIZACAO';

	/** the column name for the DATA_SINCRONIZACAO_AC field */
	const DATA_SINCRONIZACAO_AC = 'certificado.DATA_SINCRONIZACAO_AC';

	/** the column name for the CONFIRMACAO_VALIDACAO field */
	const CONFIRMACAO_VALIDACAO = 'certificado.CONFIRMACAO_VALIDACAO';

	/** the column name for the CERTIFICADO_RENOVADO field */
	const CERTIFICADO_RENOVADO = 'certificado.CERTIFICADO_RENOVADO';

	/** the column name for the APAGADO field */
	const APAGADO = 'certificado.APAGADO';

	/** the column name for the PARCEIRO_ID field */
	const PARCEIRO_ID = 'certificado.PARCEIRO_ID';

	/** the column name for the STATUS_FOLLOWUP field */
	const STATUS_FOLLOWUP = 'certificado.STATUS_FOLLOWUP';

	/** the column name for the INSERIU_HOPE field */
	const INSERIU_HOPE = 'certificado.INSERIU_HOPE';

	/** the column name for the URL_DOCUMENTACAO field */
	const URL_DOCUMENTACAO = 'certificado.URL_DOCUMENTACAO';

	/**
	 * An identiy map to hold any loaded instances of Certificado objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array Certificado[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'ProdutoId', 'ClienteId', 'FormaPagamentoId', 'UsuarioId', 'FuncionarioValidouId', 'UsuarioValidouId', 'LocalId', 'ContadorId', 'AutorizadoVendaSemContador', 'CodigoDocumento', 'Protocolo', 'Voucher', 'Desconto', 'MotivoDesconto', 'Observacao', 'DataCompra', 'DataUltimaValidacao', 'DataPagamento', 'DataValidacao', 'DataConfirmacaoPagamento', 'DataRevogacao', 'DataInicioValidade', 'DataFimValidade', 'DataRecarteirizacao', 'DataSincronizacaoAc', 'ConfirmacaoValidacao', 'CertificadoRenovado', 'Apagado', 'ParceiroId', 'StatusFollowup', 'InseriuHope', 'UrlDocumentacao', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'produtoId', 'clienteId', 'formaPagamentoId', 'usuarioId', 'funcionarioValidouId', 'usuarioValidouId', 'localId', 'contadorId', 'autorizadoVendaSemContador', 'codigoDocumento', 'protocolo', 'voucher', 'desconto', 'motivoDesconto', 'observacao', 'dataCompra', 'dataUltimaValidacao', 'dataPagamento', 'dataValidacao', 'dataConfirmacaoPagamento', 'dataRevogacao', 'dataInicioValidade', 'dataFimValidade', 'dataRecarteirizacao', 'dataSincronizacaoAc', 'confirmacaoValidacao', 'certificadoRenovado', 'apagado', 'parceiroId', 'statusFollowup', 'inseriuHope', 'urlDocumentacao', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::PRODUTO_ID, self::CLIENTE_ID, self::FORMA_PAGAMENTO_ID, self::USUARIO_ID, self::FUNCIONARIO_VALIDOU_ID, self::USUARIO_VALIDOU_ID, self::LOCAL_ID, self::CONTADOR_ID, self::AUTORIZADO_VENDA_SEM_CONTADOR, self::CODIGO_DOCUMENTO, self::PROTOCOLO, self::VOUCHER, self::DESCONTO, self::MOTIVO_DESCONTO, self::OBSERVACAO, self::DATA_COMPRA, self::DATA_ULTIMA_VALIDACAO, self::DATA_PAGAMENTO, self::DATA_VALIDACAO, self::DATA_CONFIRMACAO_PAGAMENTO, self::DATA_REVOGACAO, self::DATA_INICIO_VALIDADE, self::DATA_FIM_VALIDADE, self::DATA_RECARTEIRIZACAO, self::DATA_SINCRONIZACAO_AC, self::CONFIRMACAO_VALIDACAO, self::CERTIFICADO_RENOVADO, self::APAGADO, self::PARCEIRO_ID, self::STATUS_FOLLOWUP, self::INSERIU_HOPE, self::URL_DOCUMENTACAO, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'produto_id', 'cliente_id', 'forma_pagamento_id', 'usuario_id', 'funcionario_validou_id', 'usuario_validou_id', 'local_id', 'contador_id', 'autorizado_venda_sem_contador', 'codigo_documento', 'protocolo', 'voucher', 'desconto', 'motivo_desconto', 'observacao', 'data_compra', 'data_ultima_validacao', 'data_pagamento', 'data_validacao', 'data_confirmacao_pagamento', 'data_revogacao', 'data_inicio_validade', 'data_fim_validade', 'data_recarteirizacao', 'data_sincronizacao_ac', 'confirmacao_validacao', 'certificado_renovado', 'apagado', 'parceiro_id', 'status_followup', 'inseriu_hope', 'url_documentacao', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'ProdutoId' => 1, 'ClienteId' => 2, 'FormaPagamentoId' => 3, 'UsuarioId' => 4, 'FuncionarioValidouId' => 5, 'UsuarioValidouId' => 6, 'LocalId' => 7, 'ContadorId' => 8, 'AutorizadoVendaSemContador' => 9, 'CodigoDocumento' => 10, 'Protocolo' => 11, 'Voucher' => 12, 'Desconto' => 13, 'MotivoDesconto' => 14, 'Observacao' => 15, 'DataCompra' => 16, 'DataUltimaValidacao' => 17, 'DataPagamento' => 18, 'DataValidacao' => 19, 'DataConfirmacaoPagamento' => 20, 'DataRevogacao' => 21, 'DataInicioValidade' => 22, 'DataFimValidade' => 23, 'DataRecarteirizacao' => 24, 'DataSincronizacaoAc' => 25, 'ConfirmacaoValidacao' => 26, 'CertificadoRenovado' => 27, 'Apagado' => 28, 'ParceiroId' => 29, 'StatusFollowup' => 30, 'InseriuHope' => 31, 'UrlDocumentacao' => 32, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'produtoId' => 1, 'clienteId' => 2, 'formaPagamentoId' => 3, 'usuarioId' => 4, 'funcionarioValidouId' => 5, 'usuarioValidouId' => 6, 'localId' => 7, 'contadorId' => 8, 'autorizadoVendaSemContador' => 9, 'codigoDocumento' => 10, 'protocolo' => 11, 'voucher' => 12, 'desconto' => 13, 'motivoDesconto' => 14, 'observacao' => 15, 'dataCompra' => 16, 'dataUltimaValidacao' => 17, 'dataPagamento' => 18, 'dataValidacao' => 19, 'dataConfirmacaoPagamento' => 20, 'dataRevogacao' => 21, 'dataInicioValidade' => 22, 'dataFimValidade' => 23, 'dataRecarteirizacao' => 24, 'dataSincronizacaoAc' => 25, 'confirmacaoValidacao' => 26, 'certificadoRenovado' => 27, 'apagado' => 28, 'parceiroId' => 29, 'statusFollowup' => 30, 'inseriuHope' => 31, 'urlDocumentacao' => 32, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::PRODUTO_ID => 1, self::CLIENTE_ID => 2, self::FORMA_PAGAMENTO_ID => 3, self::USUARIO_ID => 4, self::FUNCIONARIO_VALIDOU_ID => 5, self::USUARIO_VALIDOU_ID => 6, self::LOCAL_ID => 7, self::CONTADOR_ID => 8, self::AUTORIZADO_VENDA_SEM_CONTADOR => 9, self::CODIGO_DOCUMENTO => 10, self::PROTOCOLO => 11, self::VOUCHER => 12, self::DESCONTO => 13, self::MOTIVO_DESCONTO => 14, self::OBSERVACAO => 15, self::DATA_COMPRA => 16, self::DATA_ULTIMA_VALIDACAO => 17, self::DATA_PAGAMENTO => 18, self::DATA_VALIDACAO => 19, self::DATA_CONFIRMACAO_PAGAMENTO => 20, self::DATA_REVOGACAO => 21, self::DATA_INICIO_VALIDADE => 22, self::DATA_FIM_VALIDADE => 23, self::DATA_RECARTEIRIZACAO => 24, self::DATA_SINCRONIZACAO_AC => 25, self::CONFIRMACAO_VALIDACAO => 26, self::CERTIFICADO_RENOVADO => 27, self::APAGADO => 28, self::PARCEIRO_ID => 29, self::STATUS_FOLLOWUP => 30, self::INSERIU_HOPE => 31, self::URL_DOCUMENTACAO => 32, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'produto_id' => 1, 'cliente_id' => 2, 'forma_pagamento_id' => 3, 'usuario_id' => 4, 'funcionario_validou_id' => 5, 'usuario_validou_id' => 6, 'local_id' => 7, 'contador_id' => 8, 'autorizado_venda_sem_contador' => 9, 'codigo_documento' => 10, 'protocolo' => 11, 'voucher' => 12, 'desconto' => 13, 'motivo_desconto' => 14, 'observacao' => 15, 'data_compra' => 16, 'data_ultima_validacao' => 17, 'data_pagamento' => 18, 'data_validacao' => 19, 'data_confirmacao_pagamento' => 20, 'data_revogacao' => 21, 'data_inicio_validade' => 22, 'data_fim_validade' => 23, 'data_recarteirizacao' => 24, 'data_sincronizacao_ac' => 25, 'confirmacao_validacao' => 26, 'certificado_renovado' => 27, 'apagado' => 28, 'parceiro_id' => 29, 'status_followup' => 30, 'inseriu_hope' => 31, 'url_documentacao' => 32, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, )
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
	 * @param      string $column The column name for current table. (i.e. CertificadoPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(CertificadoPeer::TABLE_NAME.'.', $alias.'.', $column);
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
		$criteria->addSelectColumn(CertificadoPeer::ID);
		$criteria->addSelectColumn(CertificadoPeer::PRODUTO_ID);
		$criteria->addSelectColumn(CertificadoPeer::CLIENTE_ID);
		$criteria->addSelectColumn(CertificadoPeer::FORMA_PAGAMENTO_ID);
		$criteria->addSelectColumn(CertificadoPeer::USUARIO_ID);
		$criteria->addSelectColumn(CertificadoPeer::FUNCIONARIO_VALIDOU_ID);
		$criteria->addSelectColumn(CertificadoPeer::USUARIO_VALIDOU_ID);
		$criteria->addSelectColumn(CertificadoPeer::LOCAL_ID);
		$criteria->addSelectColumn(CertificadoPeer::CONTADOR_ID);
		$criteria->addSelectColumn(CertificadoPeer::AUTORIZADO_VENDA_SEM_CONTADOR);
		$criteria->addSelectColumn(CertificadoPeer::CODIGO_DOCUMENTO);
		$criteria->addSelectColumn(CertificadoPeer::PROTOCOLO);
		$criteria->addSelectColumn(CertificadoPeer::VOUCHER);
		$criteria->addSelectColumn(CertificadoPeer::DESCONTO);
		$criteria->addSelectColumn(CertificadoPeer::MOTIVO_DESCONTO);
		$criteria->addSelectColumn(CertificadoPeer::OBSERVACAO);
		$criteria->addSelectColumn(CertificadoPeer::DATA_COMPRA);
		$criteria->addSelectColumn(CertificadoPeer::DATA_ULTIMA_VALIDACAO);
		$criteria->addSelectColumn(CertificadoPeer::DATA_PAGAMENTO);
		$criteria->addSelectColumn(CertificadoPeer::DATA_VALIDACAO);
		$criteria->addSelectColumn(CertificadoPeer::DATA_CONFIRMACAO_PAGAMENTO);
		$criteria->addSelectColumn(CertificadoPeer::DATA_REVOGACAO);
		$criteria->addSelectColumn(CertificadoPeer::DATA_INICIO_VALIDADE);
		$criteria->addSelectColumn(CertificadoPeer::DATA_FIM_VALIDADE);
		$criteria->addSelectColumn(CertificadoPeer::DATA_RECARTEIRIZACAO);
		$criteria->addSelectColumn(CertificadoPeer::DATA_SINCRONIZACAO_AC);
		$criteria->addSelectColumn(CertificadoPeer::CONFIRMACAO_VALIDACAO);
		$criteria->addSelectColumn(CertificadoPeer::CERTIFICADO_RENOVADO);
		$criteria->addSelectColumn(CertificadoPeer::APAGADO);
		$criteria->addSelectColumn(CertificadoPeer::PARCEIRO_ID);
		$criteria->addSelectColumn(CertificadoPeer::STATUS_FOLLOWUP);
		$criteria->addSelectColumn(CertificadoPeer::INSERIU_HOPE);
		$criteria->addSelectColumn(CertificadoPeer::URL_DOCUMENTACAO);
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
		$criteria->setPrimaryTableName(CertificadoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CertificadoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return     Certificado
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = CertificadoPeer::doSelect($critcopy, $con);
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
		return CertificadoPeer::populateObjects(CertificadoPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(CertificadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			CertificadoPeer::addSelectColumns($criteria);
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
	 * @param      Certificado $value A Certificado object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(Certificado $obj, $key = null)
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
	 * @param      mixed $value A Certificado object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof Certificado) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Certificado object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     Certificado Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to certificado
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
		$cls = CertificadoPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = CertificadoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = CertificadoPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				CertificadoPeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
	}

	/**
	 * Returns the number of rows matching criteria, joining the related Situacao table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinSituacao(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(CertificadoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CertificadoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(CertificadoPeer::STATUS_FOLLOWUP, SituacaoPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Parceiro table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinParceiro(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(CertificadoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CertificadoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(CertificadoPeer::PARCEIRO_ID, ParceiroPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(CertificadoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CertificadoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(CertificadoPeer::CONTADOR_ID, ContadorPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(CertificadoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CertificadoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(CertificadoPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(CertificadoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CertificadoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(CertificadoPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Produto table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinProduto(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(CertificadoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CertificadoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(CertificadoPeer::PRODUTO_ID, ProdutoPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Cliente table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinCliente(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(CertificadoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CertificadoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(CertificadoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related UsuarioRelatedByUsuarioId table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinUsuarioRelatedByUsuarioId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(CertificadoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CertificadoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(CertificadoPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related UsuarioRelatedByUsuarioValidouId table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinUsuarioRelatedByUsuarioValidouId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(CertificadoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CertificadoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(CertificadoPeer::USUARIO_VALIDOU_ID, UsuarioPeer::ID, $join_behavior);

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
	 * Selects a collection of Certificado objects pre-filled with their Situacao objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Certificado objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinSituacao(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		CertificadoPeer::addSelectColumns($criteria);
		$startcol = (CertificadoPeer::NUM_COLUMNS - CertificadoPeer::NUM_LAZY_LOAD_COLUMNS);
		SituacaoPeer::addSelectColumns($criteria);

		$criteria->addJoin(CertificadoPeer::STATUS_FOLLOWUP, SituacaoPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CertificadoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CertificadoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = CertificadoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CertificadoPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = SituacaoPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = SituacaoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = SituacaoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					SituacaoPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded
				
				// Add the $obj1 (Certificado) to $obj2 (Situacao)
				$obj2->addCertificado($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Certificado objects pre-filled with their Parceiro objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Certificado objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinParceiro(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		CertificadoPeer::addSelectColumns($criteria);
		$startcol = (CertificadoPeer::NUM_COLUMNS - CertificadoPeer::NUM_LAZY_LOAD_COLUMNS);
		ParceiroPeer::addSelectColumns($criteria);

		$criteria->addJoin(CertificadoPeer::PARCEIRO_ID, ParceiroPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CertificadoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CertificadoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = CertificadoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CertificadoPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = ParceiroPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = ParceiroPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = ParceiroPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					ParceiroPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded
				
				// Add the $obj1 (Certificado) to $obj2 (Parceiro)
				$obj2->addCertificado($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Certificado objects pre-filled with their Contador objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Certificado objects.
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

		CertificadoPeer::addSelectColumns($criteria);
		$startcol = (CertificadoPeer::NUM_COLUMNS - CertificadoPeer::NUM_LAZY_LOAD_COLUMNS);
		ContadorPeer::addSelectColumns($criteria);

		$criteria->addJoin(CertificadoPeer::CONTADOR_ID, ContadorPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CertificadoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CertificadoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = CertificadoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CertificadoPeer::addInstanceToPool($obj1, $key1);
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
				
				// Add the $obj1 (Certificado) to $obj2 (Contador)
				$obj2->addCertificado($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Certificado objects pre-filled with their Local objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Certificado objects.
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

		CertificadoPeer::addSelectColumns($criteria);
		$startcol = (CertificadoPeer::NUM_COLUMNS - CertificadoPeer::NUM_LAZY_LOAD_COLUMNS);
		LocalPeer::addSelectColumns($criteria);

		$criteria->addJoin(CertificadoPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CertificadoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CertificadoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = CertificadoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CertificadoPeer::addInstanceToPool($obj1, $key1);
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
				
				// Add the $obj1 (Certificado) to $obj2 (Local)
				$obj2->addCertificado($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Certificado objects pre-filled with their FormaPagamento objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Certificado objects.
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

		CertificadoPeer::addSelectColumns($criteria);
		$startcol = (CertificadoPeer::NUM_COLUMNS - CertificadoPeer::NUM_LAZY_LOAD_COLUMNS);
		FormaPagamentoPeer::addSelectColumns($criteria);

		$criteria->addJoin(CertificadoPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CertificadoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CertificadoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = CertificadoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CertificadoPeer::addInstanceToPool($obj1, $key1);
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
				
				// Add the $obj1 (Certificado) to $obj2 (FormaPagamento)
				$obj2->addCertificado($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Certificado objects pre-filled with their Produto objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Certificado objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinProduto(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		CertificadoPeer::addSelectColumns($criteria);
		$startcol = (CertificadoPeer::NUM_COLUMNS - CertificadoPeer::NUM_LAZY_LOAD_COLUMNS);
		ProdutoPeer::addSelectColumns($criteria);

		$criteria->addJoin(CertificadoPeer::PRODUTO_ID, ProdutoPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CertificadoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CertificadoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = CertificadoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CertificadoPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = ProdutoPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = ProdutoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = ProdutoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					ProdutoPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded
				
				// Add the $obj1 (Certificado) to $obj2 (Produto)
				$obj2->addCertificado($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Certificado objects pre-filled with their Cliente objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Certificado objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinCliente(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		CertificadoPeer::addSelectColumns($criteria);
		$startcol = (CertificadoPeer::NUM_COLUMNS - CertificadoPeer::NUM_LAZY_LOAD_COLUMNS);
		ClientePeer::addSelectColumns($criteria);

		$criteria->addJoin(CertificadoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CertificadoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CertificadoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = CertificadoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CertificadoPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = ClientePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = ClientePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = ClientePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					ClientePeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded
				
				// Add the $obj1 (Certificado) to $obj2 (Cliente)
				$obj2->addCertificado($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Certificado objects pre-filled with their Usuario objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Certificado objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinUsuarioRelatedByUsuarioId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		CertificadoPeer::addSelectColumns($criteria);
		$startcol = (CertificadoPeer::NUM_COLUMNS - CertificadoPeer::NUM_LAZY_LOAD_COLUMNS);
		UsuarioPeer::addSelectColumns($criteria);

		$criteria->addJoin(CertificadoPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CertificadoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CertificadoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = CertificadoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CertificadoPeer::addInstanceToPool($obj1, $key1);
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
				
				// Add the $obj1 (Certificado) to $obj2 (Usuario)
				$obj2->addCertificadoRelatedByUsuarioId($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Certificado objects pre-filled with their Usuario objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Certificado objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinUsuarioRelatedByUsuarioValidouId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		CertificadoPeer::addSelectColumns($criteria);
		$startcol = (CertificadoPeer::NUM_COLUMNS - CertificadoPeer::NUM_LAZY_LOAD_COLUMNS);
		UsuarioPeer::addSelectColumns($criteria);

		$criteria->addJoin(CertificadoPeer::USUARIO_VALIDOU_ID, UsuarioPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CertificadoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CertificadoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = CertificadoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CertificadoPeer::addInstanceToPool($obj1, $key1);
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
				
				// Add the $obj1 (Certificado) to $obj2 (Usuario)
				$obj2->addCertificadoRelatedByUsuarioValidouId($obj1);

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
		$criteria->setPrimaryTableName(CertificadoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CertificadoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(CertificadoPeer::STATUS_FOLLOWUP, SituacaoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PARCEIRO_ID, ParceiroPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CONTADOR_ID, ContadorPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PRODUTO_ID, ProdutoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_VALIDOU_ID, UsuarioPeer::ID, $join_behavior);

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
	 * Selects a collection of Certificado objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Certificado objects.
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

		CertificadoPeer::addSelectColumns($criteria);
		$startcol2 = (CertificadoPeer::NUM_COLUMNS - CertificadoPeer::NUM_LAZY_LOAD_COLUMNS);

		SituacaoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (SituacaoPeer::NUM_COLUMNS - SituacaoPeer::NUM_LAZY_LOAD_COLUMNS);

		ParceiroPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ParceiroPeer::NUM_COLUMNS - ParceiroPeer::NUM_LAZY_LOAD_COLUMNS);

		ContadorPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (ContadorPeer::NUM_COLUMNS - ContadorPeer::NUM_LAZY_LOAD_COLUMNS);

		LocalPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (LocalPeer::NUM_COLUMNS - LocalPeer::NUM_LAZY_LOAD_COLUMNS);

		FormaPagamentoPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (FormaPagamentoPeer::NUM_COLUMNS - FormaPagamentoPeer::NUM_LAZY_LOAD_COLUMNS);

		ProdutoPeer::addSelectColumns($criteria);
		$startcol8 = $startcol7 + (ProdutoPeer::NUM_COLUMNS - ProdutoPeer::NUM_LAZY_LOAD_COLUMNS);

		ClientePeer::addSelectColumns($criteria);
		$startcol9 = $startcol8 + (ClientePeer::NUM_COLUMNS - ClientePeer::NUM_LAZY_LOAD_COLUMNS);

		UsuarioPeer::addSelectColumns($criteria);
		$startcol10 = $startcol9 + (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

		UsuarioPeer::addSelectColumns($criteria);
		$startcol11 = $startcol10 + (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(CertificadoPeer::STATUS_FOLLOWUP, SituacaoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PARCEIRO_ID, ParceiroPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CONTADOR_ID, ContadorPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PRODUTO_ID, ProdutoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_VALIDOU_ID, UsuarioPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CertificadoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CertificadoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = CertificadoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CertificadoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined Situacao rows

			$key2 = SituacaoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = SituacaoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = SituacaoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					SituacaoPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (Certificado) to the collection in $obj2 (Situacao)
				$obj2->addCertificado($obj1);
			} // if joined row not null

			// Add objects for joined Parceiro rows

			$key3 = ParceiroPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = ParceiroPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$cls = ParceiroPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ParceiroPeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (Certificado) to the collection in $obj3 (Parceiro)
				$obj3->addCertificado($obj1);
			} // if joined row not null

			// Add objects for joined Contador rows

			$key4 = ContadorPeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = ContadorPeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$cls = ContadorPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ContadorPeer::addInstanceToPool($obj4, $key4);
				} // if obj4 loaded

				// Add the $obj1 (Certificado) to the collection in $obj4 (Contador)
				$obj4->addCertificado($obj1);
			} // if joined row not null

			// Add objects for joined Local rows

			$key5 = LocalPeer::getPrimaryKeyHashFromRow($row, $startcol5);
			if ($key5 !== null) {
				$obj5 = LocalPeer::getInstanceFromPool($key5);
				if (!$obj5) {

					$cls = LocalPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					LocalPeer::addInstanceToPool($obj5, $key5);
				} // if obj5 loaded

				// Add the $obj1 (Certificado) to the collection in $obj5 (Local)
				$obj5->addCertificado($obj1);
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

				// Add the $obj1 (Certificado) to the collection in $obj6 (FormaPagamento)
				$obj6->addCertificado($obj1);
			} // if joined row not null

			// Add objects for joined Produto rows

			$key7 = ProdutoPeer::getPrimaryKeyHashFromRow($row, $startcol7);
			if ($key7 !== null) {
				$obj7 = ProdutoPeer::getInstanceFromPool($key7);
				if (!$obj7) {

					$cls = ProdutoPeer::getOMClass(false);

					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					ProdutoPeer::addInstanceToPool($obj7, $key7);
				} // if obj7 loaded

				// Add the $obj1 (Certificado) to the collection in $obj7 (Produto)
				$obj7->addCertificado($obj1);
			} // if joined row not null

			// Add objects for joined Cliente rows

			$key8 = ClientePeer::getPrimaryKeyHashFromRow($row, $startcol8);
			if ($key8 !== null) {
				$obj8 = ClientePeer::getInstanceFromPool($key8);
				if (!$obj8) {

					$cls = ClientePeer::getOMClass(false);

					$obj8 = new $cls();
					$obj8->hydrate($row, $startcol8);
					ClientePeer::addInstanceToPool($obj8, $key8);
				} // if obj8 loaded

				// Add the $obj1 (Certificado) to the collection in $obj8 (Cliente)
				$obj8->addCertificado($obj1);
			} // if joined row not null

			// Add objects for joined Usuario rows

			$key9 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol9);
			if ($key9 !== null) {
				$obj9 = UsuarioPeer::getInstanceFromPool($key9);
				if (!$obj9) {

					$cls = UsuarioPeer::getOMClass(false);

					$obj9 = new $cls();
					$obj9->hydrate($row, $startcol9);
					UsuarioPeer::addInstanceToPool($obj9, $key9);
				} // if obj9 loaded

				// Add the $obj1 (Certificado) to the collection in $obj9 (Usuario)
				$obj9->addCertificadoRelatedByUsuarioId($obj1);
			} // if joined row not null

			// Add objects for joined Usuario rows

			$key10 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol10);
			if ($key10 !== null) {
				$obj10 = UsuarioPeer::getInstanceFromPool($key10);
				if (!$obj10) {

					$cls = UsuarioPeer::getOMClass(false);

					$obj10 = new $cls();
					$obj10->hydrate($row, $startcol10);
					UsuarioPeer::addInstanceToPool($obj10, $key10);
				} // if obj10 loaded

				// Add the $obj1 (Certificado) to the collection in $obj10 (Usuario)
				$obj10->addCertificadoRelatedByUsuarioValidouId($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Situacao table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptSituacao(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(CertificadoPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CertificadoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(CertificadoPeer::PARCEIRO_ID, ParceiroPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CONTADOR_ID, ContadorPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PRODUTO_ID, ProdutoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_VALIDOU_ID, UsuarioPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Parceiro table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptParceiro(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(CertificadoPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CertificadoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(CertificadoPeer::STATUS_FOLLOWUP, SituacaoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CONTADOR_ID, ContadorPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PRODUTO_ID, ProdutoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_VALIDOU_ID, UsuarioPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(CertificadoPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CertificadoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(CertificadoPeer::STATUS_FOLLOWUP, SituacaoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PARCEIRO_ID, ParceiroPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PRODUTO_ID, ProdutoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_VALIDOU_ID, UsuarioPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(CertificadoPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CertificadoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(CertificadoPeer::STATUS_FOLLOWUP, SituacaoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PARCEIRO_ID, ParceiroPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CONTADOR_ID, ContadorPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PRODUTO_ID, ProdutoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_VALIDOU_ID, UsuarioPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(CertificadoPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CertificadoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(CertificadoPeer::STATUS_FOLLOWUP, SituacaoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PARCEIRO_ID, ParceiroPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CONTADOR_ID, ContadorPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PRODUTO_ID, ProdutoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_VALIDOU_ID, UsuarioPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Produto table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptProduto(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(CertificadoPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CertificadoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(CertificadoPeer::STATUS_FOLLOWUP, SituacaoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PARCEIRO_ID, ParceiroPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CONTADOR_ID, ContadorPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_VALIDOU_ID, UsuarioPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Cliente table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptCliente(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(CertificadoPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CertificadoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(CertificadoPeer::STATUS_FOLLOWUP, SituacaoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PARCEIRO_ID, ParceiroPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CONTADOR_ID, ContadorPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PRODUTO_ID, ProdutoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_VALIDOU_ID, UsuarioPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related UsuarioRelatedByUsuarioId table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptUsuarioRelatedByUsuarioId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(CertificadoPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CertificadoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(CertificadoPeer::STATUS_FOLLOWUP, SituacaoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PARCEIRO_ID, ParceiroPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CONTADOR_ID, ContadorPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PRODUTO_ID, ProdutoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related UsuarioRelatedByUsuarioValidouId table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptUsuarioRelatedByUsuarioValidouId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(CertificadoPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CertificadoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(CertificadoPeer::STATUS_FOLLOWUP, SituacaoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PARCEIRO_ID, ParceiroPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CONTADOR_ID, ContadorPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PRODUTO_ID, ProdutoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related CertificadoRelatedByCertificadoRenovado table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptCertificadoRelatedByCertificadoRenovado(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(CertificadoPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CertificadoPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(CertificadoPeer::STATUS_FOLLOWUP, SituacaoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PARCEIRO_ID, ParceiroPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CONTADOR_ID, ContadorPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PRODUTO_ID, ProdutoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_VALIDOU_ID, UsuarioPeer::ID, $join_behavior);

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
	 * Selects a collection of Certificado objects pre-filled with all related objects except Situacao.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Certificado objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptSituacao(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		CertificadoPeer::addSelectColumns($criteria);
		$startcol2 = (CertificadoPeer::NUM_COLUMNS - CertificadoPeer::NUM_LAZY_LOAD_COLUMNS);

		ParceiroPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (ParceiroPeer::NUM_COLUMNS - ParceiroPeer::NUM_LAZY_LOAD_COLUMNS);

		ContadorPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ContadorPeer::NUM_COLUMNS - ContadorPeer::NUM_LAZY_LOAD_COLUMNS);

		LocalPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (LocalPeer::NUM_COLUMNS - LocalPeer::NUM_LAZY_LOAD_COLUMNS);

		FormaPagamentoPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (FormaPagamentoPeer::NUM_COLUMNS - FormaPagamentoPeer::NUM_LAZY_LOAD_COLUMNS);

		ProdutoPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (ProdutoPeer::NUM_COLUMNS - ProdutoPeer::NUM_LAZY_LOAD_COLUMNS);

		ClientePeer::addSelectColumns($criteria);
		$startcol8 = $startcol7 + (ClientePeer::NUM_COLUMNS - ClientePeer::NUM_LAZY_LOAD_COLUMNS);

		UsuarioPeer::addSelectColumns($criteria);
		$startcol9 = $startcol8 + (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

		UsuarioPeer::addSelectColumns($criteria);
		$startcol10 = $startcol9 + (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(CertificadoPeer::PARCEIRO_ID, ParceiroPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CONTADOR_ID, ContadorPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PRODUTO_ID, ProdutoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_VALIDOU_ID, UsuarioPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CertificadoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CertificadoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = CertificadoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CertificadoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Parceiro rows

				$key2 = ParceiroPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = ParceiroPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = ParceiroPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ParceiroPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj2 (Parceiro)
				$obj2->addCertificado($obj1);

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

				// Add the $obj1 (Certificado) to the collection in $obj3 (Contador)
				$obj3->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Local rows

				$key4 = LocalPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = LocalPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = LocalPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					LocalPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj4 (Local)
				$obj4->addCertificado($obj1);

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

				// Add the $obj1 (Certificado) to the collection in $obj5 (FormaPagamento)
				$obj5->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Produto rows

				$key6 = ProdutoPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = ProdutoPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = ProdutoPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					ProdutoPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj6 (Produto)
				$obj6->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Cliente rows

				$key7 = ClientePeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = ClientePeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$cls = ClientePeer::getOMClass(false);

					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					ClientePeer::addInstanceToPool($obj7, $key7);
				} // if $obj7 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj7 (Cliente)
				$obj7->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Usuario rows

				$key8 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol8);
				if ($key8 !== null) {
					$obj8 = UsuarioPeer::getInstanceFromPool($key8);
					if (!$obj8) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj8 = new $cls();
					$obj8->hydrate($row, $startcol8);
					UsuarioPeer::addInstanceToPool($obj8, $key8);
				} // if $obj8 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj8 (Usuario)
				$obj8->addCertificadoRelatedByUsuarioId($obj1);

			} // if joined row is not null

				// Add objects for joined Usuario rows

				$key9 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol9);
				if ($key9 !== null) {
					$obj9 = UsuarioPeer::getInstanceFromPool($key9);
					if (!$obj9) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj9 = new $cls();
					$obj9->hydrate($row, $startcol9);
					UsuarioPeer::addInstanceToPool($obj9, $key9);
				} // if $obj9 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj9 (Usuario)
				$obj9->addCertificadoRelatedByUsuarioValidouId($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Certificado objects pre-filled with all related objects except Parceiro.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Certificado objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptParceiro(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		CertificadoPeer::addSelectColumns($criteria);
		$startcol2 = (CertificadoPeer::NUM_COLUMNS - CertificadoPeer::NUM_LAZY_LOAD_COLUMNS);

		SituacaoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (SituacaoPeer::NUM_COLUMNS - SituacaoPeer::NUM_LAZY_LOAD_COLUMNS);

		ContadorPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ContadorPeer::NUM_COLUMNS - ContadorPeer::NUM_LAZY_LOAD_COLUMNS);

		LocalPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (LocalPeer::NUM_COLUMNS - LocalPeer::NUM_LAZY_LOAD_COLUMNS);

		FormaPagamentoPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (FormaPagamentoPeer::NUM_COLUMNS - FormaPagamentoPeer::NUM_LAZY_LOAD_COLUMNS);

		ProdutoPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (ProdutoPeer::NUM_COLUMNS - ProdutoPeer::NUM_LAZY_LOAD_COLUMNS);

		ClientePeer::addSelectColumns($criteria);
		$startcol8 = $startcol7 + (ClientePeer::NUM_COLUMNS - ClientePeer::NUM_LAZY_LOAD_COLUMNS);

		UsuarioPeer::addSelectColumns($criteria);
		$startcol9 = $startcol8 + (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

		UsuarioPeer::addSelectColumns($criteria);
		$startcol10 = $startcol9 + (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(CertificadoPeer::STATUS_FOLLOWUP, SituacaoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CONTADOR_ID, ContadorPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PRODUTO_ID, ProdutoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_VALIDOU_ID, UsuarioPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CertificadoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CertificadoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = CertificadoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CertificadoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Situacao rows

				$key2 = SituacaoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = SituacaoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = SituacaoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					SituacaoPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj2 (Situacao)
				$obj2->addCertificado($obj1);

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

				// Add the $obj1 (Certificado) to the collection in $obj3 (Contador)
				$obj3->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Local rows

				$key4 = LocalPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = LocalPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = LocalPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					LocalPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj4 (Local)
				$obj4->addCertificado($obj1);

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

				// Add the $obj1 (Certificado) to the collection in $obj5 (FormaPagamento)
				$obj5->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Produto rows

				$key6 = ProdutoPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = ProdutoPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = ProdutoPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					ProdutoPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj6 (Produto)
				$obj6->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Cliente rows

				$key7 = ClientePeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = ClientePeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$cls = ClientePeer::getOMClass(false);

					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					ClientePeer::addInstanceToPool($obj7, $key7);
				} // if $obj7 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj7 (Cliente)
				$obj7->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Usuario rows

				$key8 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol8);
				if ($key8 !== null) {
					$obj8 = UsuarioPeer::getInstanceFromPool($key8);
					if (!$obj8) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj8 = new $cls();
					$obj8->hydrate($row, $startcol8);
					UsuarioPeer::addInstanceToPool($obj8, $key8);
				} // if $obj8 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj8 (Usuario)
				$obj8->addCertificadoRelatedByUsuarioId($obj1);

			} // if joined row is not null

				// Add objects for joined Usuario rows

				$key9 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol9);
				if ($key9 !== null) {
					$obj9 = UsuarioPeer::getInstanceFromPool($key9);
					if (!$obj9) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj9 = new $cls();
					$obj9->hydrate($row, $startcol9);
					UsuarioPeer::addInstanceToPool($obj9, $key9);
				} // if $obj9 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj9 (Usuario)
				$obj9->addCertificadoRelatedByUsuarioValidouId($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Certificado objects pre-filled with all related objects except Contador.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Certificado objects.
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

		CertificadoPeer::addSelectColumns($criteria);
		$startcol2 = (CertificadoPeer::NUM_COLUMNS - CertificadoPeer::NUM_LAZY_LOAD_COLUMNS);

		SituacaoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (SituacaoPeer::NUM_COLUMNS - SituacaoPeer::NUM_LAZY_LOAD_COLUMNS);

		ParceiroPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ParceiroPeer::NUM_COLUMNS - ParceiroPeer::NUM_LAZY_LOAD_COLUMNS);

		LocalPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (LocalPeer::NUM_COLUMNS - LocalPeer::NUM_LAZY_LOAD_COLUMNS);

		FormaPagamentoPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (FormaPagamentoPeer::NUM_COLUMNS - FormaPagamentoPeer::NUM_LAZY_LOAD_COLUMNS);

		ProdutoPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (ProdutoPeer::NUM_COLUMNS - ProdutoPeer::NUM_LAZY_LOAD_COLUMNS);

		ClientePeer::addSelectColumns($criteria);
		$startcol8 = $startcol7 + (ClientePeer::NUM_COLUMNS - ClientePeer::NUM_LAZY_LOAD_COLUMNS);

		UsuarioPeer::addSelectColumns($criteria);
		$startcol9 = $startcol8 + (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

		UsuarioPeer::addSelectColumns($criteria);
		$startcol10 = $startcol9 + (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(CertificadoPeer::STATUS_FOLLOWUP, SituacaoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PARCEIRO_ID, ParceiroPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PRODUTO_ID, ProdutoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_VALIDOU_ID, UsuarioPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CertificadoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CertificadoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = CertificadoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CertificadoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Situacao rows

				$key2 = SituacaoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = SituacaoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = SituacaoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					SituacaoPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj2 (Situacao)
				$obj2->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Parceiro rows

				$key3 = ParceiroPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ParceiroPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ParceiroPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ParceiroPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj3 (Parceiro)
				$obj3->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Local rows

				$key4 = LocalPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = LocalPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = LocalPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					LocalPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj4 (Local)
				$obj4->addCertificado($obj1);

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

				// Add the $obj1 (Certificado) to the collection in $obj5 (FormaPagamento)
				$obj5->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Produto rows

				$key6 = ProdutoPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = ProdutoPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = ProdutoPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					ProdutoPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj6 (Produto)
				$obj6->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Cliente rows

				$key7 = ClientePeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = ClientePeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$cls = ClientePeer::getOMClass(false);

					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					ClientePeer::addInstanceToPool($obj7, $key7);
				} // if $obj7 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj7 (Cliente)
				$obj7->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Usuario rows

				$key8 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol8);
				if ($key8 !== null) {
					$obj8 = UsuarioPeer::getInstanceFromPool($key8);
					if (!$obj8) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj8 = new $cls();
					$obj8->hydrate($row, $startcol8);
					UsuarioPeer::addInstanceToPool($obj8, $key8);
				} // if $obj8 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj8 (Usuario)
				$obj8->addCertificadoRelatedByUsuarioId($obj1);

			} // if joined row is not null

				// Add objects for joined Usuario rows

				$key9 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol9);
				if ($key9 !== null) {
					$obj9 = UsuarioPeer::getInstanceFromPool($key9);
					if (!$obj9) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj9 = new $cls();
					$obj9->hydrate($row, $startcol9);
					UsuarioPeer::addInstanceToPool($obj9, $key9);
				} // if $obj9 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj9 (Usuario)
				$obj9->addCertificadoRelatedByUsuarioValidouId($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Certificado objects pre-filled with all related objects except Local.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Certificado objects.
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

		CertificadoPeer::addSelectColumns($criteria);
		$startcol2 = (CertificadoPeer::NUM_COLUMNS - CertificadoPeer::NUM_LAZY_LOAD_COLUMNS);

		SituacaoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (SituacaoPeer::NUM_COLUMNS - SituacaoPeer::NUM_LAZY_LOAD_COLUMNS);

		ParceiroPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ParceiroPeer::NUM_COLUMNS - ParceiroPeer::NUM_LAZY_LOAD_COLUMNS);

		ContadorPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (ContadorPeer::NUM_COLUMNS - ContadorPeer::NUM_LAZY_LOAD_COLUMNS);

		FormaPagamentoPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (FormaPagamentoPeer::NUM_COLUMNS - FormaPagamentoPeer::NUM_LAZY_LOAD_COLUMNS);

		ProdutoPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (ProdutoPeer::NUM_COLUMNS - ProdutoPeer::NUM_LAZY_LOAD_COLUMNS);

		ClientePeer::addSelectColumns($criteria);
		$startcol8 = $startcol7 + (ClientePeer::NUM_COLUMNS - ClientePeer::NUM_LAZY_LOAD_COLUMNS);

		UsuarioPeer::addSelectColumns($criteria);
		$startcol9 = $startcol8 + (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

		UsuarioPeer::addSelectColumns($criteria);
		$startcol10 = $startcol9 + (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(CertificadoPeer::STATUS_FOLLOWUP, SituacaoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PARCEIRO_ID, ParceiroPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CONTADOR_ID, ContadorPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PRODUTO_ID, ProdutoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_VALIDOU_ID, UsuarioPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CertificadoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CertificadoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = CertificadoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CertificadoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Situacao rows

				$key2 = SituacaoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = SituacaoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = SituacaoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					SituacaoPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj2 (Situacao)
				$obj2->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Parceiro rows

				$key3 = ParceiroPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ParceiroPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ParceiroPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ParceiroPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj3 (Parceiro)
				$obj3->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Contador rows

				$key4 = ContadorPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = ContadorPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = ContadorPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ContadorPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj4 (Contador)
				$obj4->addCertificado($obj1);

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

				// Add the $obj1 (Certificado) to the collection in $obj5 (FormaPagamento)
				$obj5->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Produto rows

				$key6 = ProdutoPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = ProdutoPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = ProdutoPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					ProdutoPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj6 (Produto)
				$obj6->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Cliente rows

				$key7 = ClientePeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = ClientePeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$cls = ClientePeer::getOMClass(false);

					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					ClientePeer::addInstanceToPool($obj7, $key7);
				} // if $obj7 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj7 (Cliente)
				$obj7->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Usuario rows

				$key8 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol8);
				if ($key8 !== null) {
					$obj8 = UsuarioPeer::getInstanceFromPool($key8);
					if (!$obj8) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj8 = new $cls();
					$obj8->hydrate($row, $startcol8);
					UsuarioPeer::addInstanceToPool($obj8, $key8);
				} // if $obj8 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj8 (Usuario)
				$obj8->addCertificadoRelatedByUsuarioId($obj1);

			} // if joined row is not null

				// Add objects for joined Usuario rows

				$key9 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol9);
				if ($key9 !== null) {
					$obj9 = UsuarioPeer::getInstanceFromPool($key9);
					if (!$obj9) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj9 = new $cls();
					$obj9->hydrate($row, $startcol9);
					UsuarioPeer::addInstanceToPool($obj9, $key9);
				} // if $obj9 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj9 (Usuario)
				$obj9->addCertificadoRelatedByUsuarioValidouId($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Certificado objects pre-filled with all related objects except FormaPagamento.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Certificado objects.
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

		CertificadoPeer::addSelectColumns($criteria);
		$startcol2 = (CertificadoPeer::NUM_COLUMNS - CertificadoPeer::NUM_LAZY_LOAD_COLUMNS);

		SituacaoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (SituacaoPeer::NUM_COLUMNS - SituacaoPeer::NUM_LAZY_LOAD_COLUMNS);

		ParceiroPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ParceiroPeer::NUM_COLUMNS - ParceiroPeer::NUM_LAZY_LOAD_COLUMNS);

		ContadorPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (ContadorPeer::NUM_COLUMNS - ContadorPeer::NUM_LAZY_LOAD_COLUMNS);

		LocalPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (LocalPeer::NUM_COLUMNS - LocalPeer::NUM_LAZY_LOAD_COLUMNS);

		ProdutoPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (ProdutoPeer::NUM_COLUMNS - ProdutoPeer::NUM_LAZY_LOAD_COLUMNS);

		ClientePeer::addSelectColumns($criteria);
		$startcol8 = $startcol7 + (ClientePeer::NUM_COLUMNS - ClientePeer::NUM_LAZY_LOAD_COLUMNS);

		UsuarioPeer::addSelectColumns($criteria);
		$startcol9 = $startcol8 + (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

		UsuarioPeer::addSelectColumns($criteria);
		$startcol10 = $startcol9 + (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(CertificadoPeer::STATUS_FOLLOWUP, SituacaoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PARCEIRO_ID, ParceiroPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CONTADOR_ID, ContadorPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PRODUTO_ID, ProdutoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_VALIDOU_ID, UsuarioPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CertificadoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CertificadoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = CertificadoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CertificadoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Situacao rows

				$key2 = SituacaoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = SituacaoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = SituacaoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					SituacaoPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj2 (Situacao)
				$obj2->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Parceiro rows

				$key3 = ParceiroPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ParceiroPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ParceiroPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ParceiroPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj3 (Parceiro)
				$obj3->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Contador rows

				$key4 = ContadorPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = ContadorPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = ContadorPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ContadorPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj4 (Contador)
				$obj4->addCertificado($obj1);

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

				// Add the $obj1 (Certificado) to the collection in $obj5 (Local)
				$obj5->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Produto rows

				$key6 = ProdutoPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = ProdutoPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = ProdutoPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					ProdutoPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj6 (Produto)
				$obj6->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Cliente rows

				$key7 = ClientePeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = ClientePeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$cls = ClientePeer::getOMClass(false);

					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					ClientePeer::addInstanceToPool($obj7, $key7);
				} // if $obj7 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj7 (Cliente)
				$obj7->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Usuario rows

				$key8 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol8);
				if ($key8 !== null) {
					$obj8 = UsuarioPeer::getInstanceFromPool($key8);
					if (!$obj8) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj8 = new $cls();
					$obj8->hydrate($row, $startcol8);
					UsuarioPeer::addInstanceToPool($obj8, $key8);
				} // if $obj8 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj8 (Usuario)
				$obj8->addCertificadoRelatedByUsuarioId($obj1);

			} // if joined row is not null

				// Add objects for joined Usuario rows

				$key9 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol9);
				if ($key9 !== null) {
					$obj9 = UsuarioPeer::getInstanceFromPool($key9);
					if (!$obj9) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj9 = new $cls();
					$obj9->hydrate($row, $startcol9);
					UsuarioPeer::addInstanceToPool($obj9, $key9);
				} // if $obj9 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj9 (Usuario)
				$obj9->addCertificadoRelatedByUsuarioValidouId($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Certificado objects pre-filled with all related objects except Produto.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Certificado objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptProduto(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		CertificadoPeer::addSelectColumns($criteria);
		$startcol2 = (CertificadoPeer::NUM_COLUMNS - CertificadoPeer::NUM_LAZY_LOAD_COLUMNS);

		SituacaoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (SituacaoPeer::NUM_COLUMNS - SituacaoPeer::NUM_LAZY_LOAD_COLUMNS);

		ParceiroPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ParceiroPeer::NUM_COLUMNS - ParceiroPeer::NUM_LAZY_LOAD_COLUMNS);

		ContadorPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (ContadorPeer::NUM_COLUMNS - ContadorPeer::NUM_LAZY_LOAD_COLUMNS);

		LocalPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (LocalPeer::NUM_COLUMNS - LocalPeer::NUM_LAZY_LOAD_COLUMNS);

		FormaPagamentoPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (FormaPagamentoPeer::NUM_COLUMNS - FormaPagamentoPeer::NUM_LAZY_LOAD_COLUMNS);

		ClientePeer::addSelectColumns($criteria);
		$startcol8 = $startcol7 + (ClientePeer::NUM_COLUMNS - ClientePeer::NUM_LAZY_LOAD_COLUMNS);

		UsuarioPeer::addSelectColumns($criteria);
		$startcol9 = $startcol8 + (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

		UsuarioPeer::addSelectColumns($criteria);
		$startcol10 = $startcol9 + (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(CertificadoPeer::STATUS_FOLLOWUP, SituacaoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PARCEIRO_ID, ParceiroPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CONTADOR_ID, ContadorPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_VALIDOU_ID, UsuarioPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CertificadoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CertificadoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = CertificadoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CertificadoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Situacao rows

				$key2 = SituacaoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = SituacaoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = SituacaoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					SituacaoPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj2 (Situacao)
				$obj2->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Parceiro rows

				$key3 = ParceiroPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ParceiroPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ParceiroPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ParceiroPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj3 (Parceiro)
				$obj3->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Contador rows

				$key4 = ContadorPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = ContadorPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = ContadorPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ContadorPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj4 (Contador)
				$obj4->addCertificado($obj1);

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

				// Add the $obj1 (Certificado) to the collection in $obj5 (Local)
				$obj5->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined FormaPagamento rows

				$key6 = FormaPagamentoPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = FormaPagamentoPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = FormaPagamentoPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					FormaPagamentoPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj6 (FormaPagamento)
				$obj6->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Cliente rows

				$key7 = ClientePeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = ClientePeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$cls = ClientePeer::getOMClass(false);

					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					ClientePeer::addInstanceToPool($obj7, $key7);
				} // if $obj7 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj7 (Cliente)
				$obj7->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Usuario rows

				$key8 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol8);
				if ($key8 !== null) {
					$obj8 = UsuarioPeer::getInstanceFromPool($key8);
					if (!$obj8) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj8 = new $cls();
					$obj8->hydrate($row, $startcol8);
					UsuarioPeer::addInstanceToPool($obj8, $key8);
				} // if $obj8 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj8 (Usuario)
				$obj8->addCertificadoRelatedByUsuarioId($obj1);

			} // if joined row is not null

				// Add objects for joined Usuario rows

				$key9 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol9);
				if ($key9 !== null) {
					$obj9 = UsuarioPeer::getInstanceFromPool($key9);
					if (!$obj9) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj9 = new $cls();
					$obj9->hydrate($row, $startcol9);
					UsuarioPeer::addInstanceToPool($obj9, $key9);
				} // if $obj9 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj9 (Usuario)
				$obj9->addCertificadoRelatedByUsuarioValidouId($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Certificado objects pre-filled with all related objects except Cliente.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Certificado objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptCliente(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		CertificadoPeer::addSelectColumns($criteria);
		$startcol2 = (CertificadoPeer::NUM_COLUMNS - CertificadoPeer::NUM_LAZY_LOAD_COLUMNS);

		SituacaoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (SituacaoPeer::NUM_COLUMNS - SituacaoPeer::NUM_LAZY_LOAD_COLUMNS);

		ParceiroPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ParceiroPeer::NUM_COLUMNS - ParceiroPeer::NUM_LAZY_LOAD_COLUMNS);

		ContadorPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (ContadorPeer::NUM_COLUMNS - ContadorPeer::NUM_LAZY_LOAD_COLUMNS);

		LocalPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (LocalPeer::NUM_COLUMNS - LocalPeer::NUM_LAZY_LOAD_COLUMNS);

		FormaPagamentoPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (FormaPagamentoPeer::NUM_COLUMNS - FormaPagamentoPeer::NUM_LAZY_LOAD_COLUMNS);

		ProdutoPeer::addSelectColumns($criteria);
		$startcol8 = $startcol7 + (ProdutoPeer::NUM_COLUMNS - ProdutoPeer::NUM_LAZY_LOAD_COLUMNS);

		UsuarioPeer::addSelectColumns($criteria);
		$startcol9 = $startcol8 + (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

		UsuarioPeer::addSelectColumns($criteria);
		$startcol10 = $startcol9 + (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(CertificadoPeer::STATUS_FOLLOWUP, SituacaoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PARCEIRO_ID, ParceiroPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CONTADOR_ID, ContadorPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PRODUTO_ID, ProdutoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_VALIDOU_ID, UsuarioPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CertificadoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CertificadoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = CertificadoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CertificadoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Situacao rows

				$key2 = SituacaoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = SituacaoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = SituacaoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					SituacaoPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj2 (Situacao)
				$obj2->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Parceiro rows

				$key3 = ParceiroPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ParceiroPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ParceiroPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ParceiroPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj3 (Parceiro)
				$obj3->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Contador rows

				$key4 = ContadorPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = ContadorPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = ContadorPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ContadorPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj4 (Contador)
				$obj4->addCertificado($obj1);

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

				// Add the $obj1 (Certificado) to the collection in $obj5 (Local)
				$obj5->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined FormaPagamento rows

				$key6 = FormaPagamentoPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = FormaPagamentoPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = FormaPagamentoPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					FormaPagamentoPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj6 (FormaPagamento)
				$obj6->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Produto rows

				$key7 = ProdutoPeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = ProdutoPeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$cls = ProdutoPeer::getOMClass(false);

					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					ProdutoPeer::addInstanceToPool($obj7, $key7);
				} // if $obj7 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj7 (Produto)
				$obj7->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Usuario rows

				$key8 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol8);
				if ($key8 !== null) {
					$obj8 = UsuarioPeer::getInstanceFromPool($key8);
					if (!$obj8) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj8 = new $cls();
					$obj8->hydrate($row, $startcol8);
					UsuarioPeer::addInstanceToPool($obj8, $key8);
				} // if $obj8 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj8 (Usuario)
				$obj8->addCertificadoRelatedByUsuarioId($obj1);

			} // if joined row is not null

				// Add objects for joined Usuario rows

				$key9 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol9);
				if ($key9 !== null) {
					$obj9 = UsuarioPeer::getInstanceFromPool($key9);
					if (!$obj9) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj9 = new $cls();
					$obj9->hydrate($row, $startcol9);
					UsuarioPeer::addInstanceToPool($obj9, $key9);
				} // if $obj9 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj9 (Usuario)
				$obj9->addCertificadoRelatedByUsuarioValidouId($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Certificado objects pre-filled with all related objects except UsuarioRelatedByUsuarioId.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Certificado objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptUsuarioRelatedByUsuarioId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		CertificadoPeer::addSelectColumns($criteria);
		$startcol2 = (CertificadoPeer::NUM_COLUMNS - CertificadoPeer::NUM_LAZY_LOAD_COLUMNS);

		SituacaoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (SituacaoPeer::NUM_COLUMNS - SituacaoPeer::NUM_LAZY_LOAD_COLUMNS);

		ParceiroPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ParceiroPeer::NUM_COLUMNS - ParceiroPeer::NUM_LAZY_LOAD_COLUMNS);

		ContadorPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (ContadorPeer::NUM_COLUMNS - ContadorPeer::NUM_LAZY_LOAD_COLUMNS);

		LocalPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (LocalPeer::NUM_COLUMNS - LocalPeer::NUM_LAZY_LOAD_COLUMNS);

		FormaPagamentoPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (FormaPagamentoPeer::NUM_COLUMNS - FormaPagamentoPeer::NUM_LAZY_LOAD_COLUMNS);

		ProdutoPeer::addSelectColumns($criteria);
		$startcol8 = $startcol7 + (ProdutoPeer::NUM_COLUMNS - ProdutoPeer::NUM_LAZY_LOAD_COLUMNS);

		ClientePeer::addSelectColumns($criteria);
		$startcol9 = $startcol8 + (ClientePeer::NUM_COLUMNS - ClientePeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(CertificadoPeer::STATUS_FOLLOWUP, SituacaoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PARCEIRO_ID, ParceiroPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CONTADOR_ID, ContadorPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PRODUTO_ID, ProdutoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CertificadoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CertificadoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = CertificadoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CertificadoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Situacao rows

				$key2 = SituacaoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = SituacaoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = SituacaoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					SituacaoPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj2 (Situacao)
				$obj2->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Parceiro rows

				$key3 = ParceiroPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ParceiroPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ParceiroPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ParceiroPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj3 (Parceiro)
				$obj3->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Contador rows

				$key4 = ContadorPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = ContadorPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = ContadorPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ContadorPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj4 (Contador)
				$obj4->addCertificado($obj1);

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

				// Add the $obj1 (Certificado) to the collection in $obj5 (Local)
				$obj5->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined FormaPagamento rows

				$key6 = FormaPagamentoPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = FormaPagamentoPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = FormaPagamentoPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					FormaPagamentoPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj6 (FormaPagamento)
				$obj6->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Produto rows

				$key7 = ProdutoPeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = ProdutoPeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$cls = ProdutoPeer::getOMClass(false);

					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					ProdutoPeer::addInstanceToPool($obj7, $key7);
				} // if $obj7 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj7 (Produto)
				$obj7->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Cliente rows

				$key8 = ClientePeer::getPrimaryKeyHashFromRow($row, $startcol8);
				if ($key8 !== null) {
					$obj8 = ClientePeer::getInstanceFromPool($key8);
					if (!$obj8) {
	
						$cls = ClientePeer::getOMClass(false);

					$obj8 = new $cls();
					$obj8->hydrate($row, $startcol8);
					ClientePeer::addInstanceToPool($obj8, $key8);
				} // if $obj8 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj8 (Cliente)
				$obj8->addCertificado($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Certificado objects pre-filled with all related objects except UsuarioRelatedByUsuarioValidouId.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Certificado objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptUsuarioRelatedByUsuarioValidouId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		CertificadoPeer::addSelectColumns($criteria);
		$startcol2 = (CertificadoPeer::NUM_COLUMNS - CertificadoPeer::NUM_LAZY_LOAD_COLUMNS);

		SituacaoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (SituacaoPeer::NUM_COLUMNS - SituacaoPeer::NUM_LAZY_LOAD_COLUMNS);

		ParceiroPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ParceiroPeer::NUM_COLUMNS - ParceiroPeer::NUM_LAZY_LOAD_COLUMNS);

		ContadorPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (ContadorPeer::NUM_COLUMNS - ContadorPeer::NUM_LAZY_LOAD_COLUMNS);

		LocalPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (LocalPeer::NUM_COLUMNS - LocalPeer::NUM_LAZY_LOAD_COLUMNS);

		FormaPagamentoPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (FormaPagamentoPeer::NUM_COLUMNS - FormaPagamentoPeer::NUM_LAZY_LOAD_COLUMNS);

		ProdutoPeer::addSelectColumns($criteria);
		$startcol8 = $startcol7 + (ProdutoPeer::NUM_COLUMNS - ProdutoPeer::NUM_LAZY_LOAD_COLUMNS);

		ClientePeer::addSelectColumns($criteria);
		$startcol9 = $startcol8 + (ClientePeer::NUM_COLUMNS - ClientePeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(CertificadoPeer::STATUS_FOLLOWUP, SituacaoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PARCEIRO_ID, ParceiroPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CONTADOR_ID, ContadorPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PRODUTO_ID, ProdutoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CertificadoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CertificadoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = CertificadoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CertificadoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Situacao rows

				$key2 = SituacaoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = SituacaoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = SituacaoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					SituacaoPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj2 (Situacao)
				$obj2->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Parceiro rows

				$key3 = ParceiroPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ParceiroPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ParceiroPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ParceiroPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj3 (Parceiro)
				$obj3->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Contador rows

				$key4 = ContadorPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = ContadorPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = ContadorPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ContadorPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj4 (Contador)
				$obj4->addCertificado($obj1);

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

				// Add the $obj1 (Certificado) to the collection in $obj5 (Local)
				$obj5->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined FormaPagamento rows

				$key6 = FormaPagamentoPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = FormaPagamentoPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = FormaPagamentoPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					FormaPagamentoPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj6 (FormaPagamento)
				$obj6->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Produto rows

				$key7 = ProdutoPeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = ProdutoPeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$cls = ProdutoPeer::getOMClass(false);

					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					ProdutoPeer::addInstanceToPool($obj7, $key7);
				} // if $obj7 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj7 (Produto)
				$obj7->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Cliente rows

				$key8 = ClientePeer::getPrimaryKeyHashFromRow($row, $startcol8);
				if ($key8 !== null) {
					$obj8 = ClientePeer::getInstanceFromPool($key8);
					if (!$obj8) {
	
						$cls = ClientePeer::getOMClass(false);

					$obj8 = new $cls();
					$obj8->hydrate($row, $startcol8);
					ClientePeer::addInstanceToPool($obj8, $key8);
				} // if $obj8 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj8 (Cliente)
				$obj8->addCertificado($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Certificado objects pre-filled with all related objects except CertificadoRelatedByCertificadoRenovado.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Certificado objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptCertificadoRelatedByCertificadoRenovado(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		CertificadoPeer::addSelectColumns($criteria);
		$startcol2 = (CertificadoPeer::NUM_COLUMNS - CertificadoPeer::NUM_LAZY_LOAD_COLUMNS);

		SituacaoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (SituacaoPeer::NUM_COLUMNS - SituacaoPeer::NUM_LAZY_LOAD_COLUMNS);

		ParceiroPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (ParceiroPeer::NUM_COLUMNS - ParceiroPeer::NUM_LAZY_LOAD_COLUMNS);

		ContadorPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (ContadorPeer::NUM_COLUMNS - ContadorPeer::NUM_LAZY_LOAD_COLUMNS);

		LocalPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (LocalPeer::NUM_COLUMNS - LocalPeer::NUM_LAZY_LOAD_COLUMNS);

		FormaPagamentoPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + (FormaPagamentoPeer::NUM_COLUMNS - FormaPagamentoPeer::NUM_LAZY_LOAD_COLUMNS);

		ProdutoPeer::addSelectColumns($criteria);
		$startcol8 = $startcol7 + (ProdutoPeer::NUM_COLUMNS - ProdutoPeer::NUM_LAZY_LOAD_COLUMNS);

		ClientePeer::addSelectColumns($criteria);
		$startcol9 = $startcol8 + (ClientePeer::NUM_COLUMNS - ClientePeer::NUM_LAZY_LOAD_COLUMNS);

		UsuarioPeer::addSelectColumns($criteria);
		$startcol10 = $startcol9 + (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

		UsuarioPeer::addSelectColumns($criteria);
		$startcol11 = $startcol10 + (UsuarioPeer::NUM_COLUMNS - UsuarioPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(CertificadoPeer::STATUS_FOLLOWUP, SituacaoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PARCEIRO_ID, ParceiroPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CONTADOR_ID, ContadorPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::LOCAL_ID, LocalPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::FORMA_PAGAMENTO_ID, FormaPagamentoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::PRODUTO_ID, ProdutoPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(CertificadoPeer::USUARIO_VALIDOU_ID, UsuarioPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CertificadoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CertificadoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = CertificadoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CertificadoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Situacao rows

				$key2 = SituacaoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = SituacaoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = SituacaoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					SituacaoPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj2 (Situacao)
				$obj2->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Parceiro rows

				$key3 = ParceiroPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ParceiroPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ParceiroPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ParceiroPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj3 (Parceiro)
				$obj3->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Contador rows

				$key4 = ContadorPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = ContadorPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = ContadorPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ContadorPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj4 (Contador)
				$obj4->addCertificado($obj1);

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

				// Add the $obj1 (Certificado) to the collection in $obj5 (Local)
				$obj5->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined FormaPagamento rows

				$key6 = FormaPagamentoPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = FormaPagamentoPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = FormaPagamentoPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					FormaPagamentoPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj6 (FormaPagamento)
				$obj6->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Produto rows

				$key7 = ProdutoPeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = ProdutoPeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$cls = ProdutoPeer::getOMClass(false);

					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					ProdutoPeer::addInstanceToPool($obj7, $key7);
				} // if $obj7 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj7 (Produto)
				$obj7->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Cliente rows

				$key8 = ClientePeer::getPrimaryKeyHashFromRow($row, $startcol8);
				if ($key8 !== null) {
					$obj8 = ClientePeer::getInstanceFromPool($key8);
					if (!$obj8) {
	
						$cls = ClientePeer::getOMClass(false);

					$obj8 = new $cls();
					$obj8->hydrate($row, $startcol8);
					ClientePeer::addInstanceToPool($obj8, $key8);
				} // if $obj8 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj8 (Cliente)
				$obj8->addCertificado($obj1);

			} // if joined row is not null

				// Add objects for joined Usuario rows

				$key9 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol9);
				if ($key9 !== null) {
					$obj9 = UsuarioPeer::getInstanceFromPool($key9);
					if (!$obj9) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj9 = new $cls();
					$obj9->hydrate($row, $startcol9);
					UsuarioPeer::addInstanceToPool($obj9, $key9);
				} // if $obj9 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj9 (Usuario)
				$obj9->addCertificadoRelatedByUsuarioId($obj1);

			} // if joined row is not null

				// Add objects for joined Usuario rows

				$key10 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol10);
				if ($key10 !== null) {
					$obj10 = UsuarioPeer::getInstanceFromPool($key10);
					if (!$obj10) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj10 = new $cls();
					$obj10->hydrate($row, $startcol10);
					UsuarioPeer::addInstanceToPool($obj10, $key10);
				} // if $obj10 already loaded

				// Add the $obj1 (Certificado) to the collection in $obj10 (Usuario)
				$obj10->addCertificadoRelatedByUsuarioValidouId($obj1);

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
	  $dbMap = Propel::getDatabaseMap(BaseCertificadoPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseCertificadoPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new CertificadoTableMap());
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
		return $withPrefix ? CertificadoPeer::CLASS_DEFAULT : CertificadoPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a Certificado or Criteria object.
	 *
	 * @param      mixed $values Criteria or Certificado object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CertificadoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from Certificado object
		}

		if ($criteria->containsKey(CertificadoPeer::ID) && $criteria->keyContainsValue(CertificadoPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.CertificadoPeer::ID.')');
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
	 * Method perform an UPDATE on the database, given a Certificado or Criteria object.
	 *
	 * @param      mixed $values Criteria or Certificado object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CertificadoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(CertificadoPeer::ID);
			$selectCriteria->add(CertificadoPeer::ID, $criteria->remove(CertificadoPeer::ID), $comparison);

		} else { // $values is Certificado object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the certificado table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CertificadoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(CertificadoPeer::TABLE_NAME, $con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			CertificadoPeer::clearInstancePool();
			CertificadoPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a Certificado or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or Certificado object or primary key or array of primary keys
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
			$con = Propel::getConnection(CertificadoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			CertificadoPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof Certificado) { // it's a model object
			// invalidate the cache for this single object
			CertificadoPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CertificadoPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				CertificadoPeer::removeInstanceFromPool($singleval);
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
			CertificadoPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given Certificado object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      Certificado $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(Certificado $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CertificadoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CertificadoPeer::TABLE_NAME);

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

		if ($obj->isNew() || $obj->isColumnModified(CertificadoPeer::PRODUTO_ID))
			$columns[CertificadoPeer::PRODUTO_ID] = $obj->getProdutoId();

		if ($obj->isNew() || $obj->isColumnModified(CertificadoPeer::CLIENTE_ID))
			$columns[CertificadoPeer::CLIENTE_ID] = $obj->getClienteId();

		if ($obj->isNew() || $obj->isColumnModified(CertificadoPeer::CLIENTE_ID))
			$columns[CertificadoPeer::CLIENTE_ID] = $obj->getClienteId();

		if ($obj->isNew() || $obj->isColumnModified(CertificadoPeer::CLIENTE_ID))
			$columns[CertificadoPeer::CLIENTE_ID] = $obj->getClienteId();

		if ($obj->isNew() || $obj->isColumnModified(CertificadoPeer::CLIENTE_ID))
			$columns[CertificadoPeer::CLIENTE_ID] = $obj->getClienteId();

		if ($obj->isNew() || $obj->isColumnModified(CertificadoPeer::CLIENTE_ID))
			$columns[CertificadoPeer::CLIENTE_ID] = $obj->getClienteId();

		}

		return BasePeer::doValidate(CertificadoPeer::DATABASE_NAME, CertificadoPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     Certificado
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = CertificadoPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(CertificadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
		$criteria->add(CertificadoPeer::ID, $pk);

		$v = CertificadoPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(CertificadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(CertificadoPeer::DATABASE_NAME);
			$criteria->add(CertificadoPeer::ID, $pks, Criteria::IN);
			$objs = CertificadoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseCertificadoPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseCertificadoPeer::buildTableMap();

