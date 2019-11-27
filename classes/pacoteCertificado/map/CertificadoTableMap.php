<?php


/**
 * This class defines the structure of the 'certificado' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    pacoteCertificado.map
 */
class CertificadoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteCertificado.map.CertificadoTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('certificado');
		$this->setPhpName('Certificado');
		$this->setClassname('Certificado');
		$this->setPackage('pacoteCertificado');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('PRODUTO_ID', 'ProdutoId', 'INTEGER', 'produto', 'ID', true, null, null);
		$this->addForeignKey('CLIENTE_ID', 'ClienteId', 'INTEGER', 'cliente', 'ID', true, null, null);
		$this->addForeignKey('FORMA_PAGAMENTO_ID', 'FormaPagamentoId', 'INTEGER', 'forma_pagamento', 'ID', true, null, null);
		$this->addForeignKey('USUARIO_ID', 'UsuarioId', 'INTEGER', 'usuario', 'ID', true, null, null);
		$this->addColumn('FUNCIONARIO_VALIDOU_ID', 'FuncionarioValidouId', 'INTEGER', false, null, null);
		$this->addForeignKey('USUARIO_VALIDOU_ID', 'UsuarioValidouId', 'INTEGER', 'usuario', 'ID', false, null, null);
		$this->addForeignKey('LOCAL_ID', 'LocalId', 'INTEGER', 'local', 'ID', true, null, null);
		$this->addForeignKey('CONTADOR_ID', 'ContadorId', 'INTEGER', 'contador', 'ID', false, null, null);
		$this->addColumn('AUTORIZADO_VENDA_SEM_CONTADOR', 'AutorizadoVendaSemContador', 'INTEGER', false, null, null);
		$this->addColumn('CODIGO_DOCUMENTO', 'CodigoDocumento', 'VARCHAR', false, 30, null);
		$this->addColumn('PROTOCOLO', 'Protocolo', 'INTEGER', false, null, null);
		$this->addColumn('VOUCHER', 'Voucher', 'VARCHAR', false, 30, null);
		$this->addColumn('DESCONTO', 'Desconto', 'FLOAT', false, null, null);
		$this->addColumn('MOTIVO_DESCONTO', 'MotivoDesconto', 'VARCHAR', false, 200, null);
		$this->addColumn('OBSERVACAO', 'Observacao', 'VARCHAR', false, 255, null);
		$this->addColumn('DATA_COMPRA', 'DataCompra', 'TIMESTAMP', true, null, null);
		$this->addColumn('DATA_ULTIMA_VALIDACAO', 'DataUltimaValidacao', 'TIMESTAMP', false, null, null);
		$this->addColumn('DATA_PAGAMENTO', 'DataPagamento', 'TIMESTAMP', false, null, null);
		$this->addColumn('DATA_VALIDACAO', 'DataValidacao', 'TIMESTAMP', false, null, null);
		$this->addColumn('DATA_CONFIRMACAO_PAGAMENTO', 'DataConfirmacaoPagamento', 'TIMESTAMP', false, null, null);
		$this->addColumn('DATA_REVOGACAO', 'DataRevogacao', 'TIMESTAMP', false, null, null);
		$this->addColumn('DATA_INICIO_VALIDADE', 'DataInicioValidade', 'TIMESTAMP', false, null, null);
		$this->addColumn('DATA_FIM_VALIDADE', 'DataFimValidade', 'TIMESTAMP', false, null, null);
		$this->addColumn('DATA_SINCRONIZACAO_AC', 'DataSincronizacaoAc', 'TIMESTAMP', false, null, null);
		$this->addColumn('CONFIRMACAO_VALIDACAO', 'ConfirmacaoValidacao', 'INTEGER', false, null, null);
		$this->addForeignKey('CERTIFICADO_RENOVADO', 'CertificadoRenovado', 'INTEGER', 'certificado', 'ID', false, null, null);
		$this->addColumn('APAGADO', 'Apagado', 'INTEGER', true, null, null);
		$this->addForeignKey('PARCEIRO_ID', 'ParceiroId', 'INTEGER', 'parceiro', 'ID', false, null, null);
		$this->addForeignKey('STATUS_FOLLOWUP', 'StatusFollowup', 'INTEGER', 'situacao', 'ID', false, null, null);
		// validators
		$this->addValidator('PRODUTO_ID', 'minValue', 'propel.validator.MinValueValidator', '1', 'O Pedido do Certificado deve conter um produto!');
		$this->addValidator('CLIENTE_ID', 'required', 'propel.validator.RequiredValidator', '', 'O Pedido do Certificado deve conter um cliente!');
		$this->addValidator('CLIENTE_ID', 'required', 'propel.validator.RequiredValidator', '', 'O Pedido do Certificado deve conter uma forma de pagamento!');
		$this->addValidator('CLIENTE_ID', 'required', 'propel.validator.RequiredValidator', '', 'O Pedido do Certificado deve conter um consultor!');
		$this->addValidator('CLIENTE_ID', 'required', 'propel.validator.RequiredValidator', '', 'O Pedido do Certificado deve conter um local!');
		$this->addValidator('CLIENTE_ID', 'required', 'propel.validator.RequiredValidator', '', 'O Pedido do Certificado deve conter a informacao da data da compra!');
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Situacao', 'Situacao', RelationMap::MANY_TO_ONE, array('status_followup' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Parceiro', 'Parceiro', RelationMap::MANY_TO_ONE, array('parceiro_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Contador', 'Contador', RelationMap::MANY_TO_ONE, array('contador_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Local', 'Local', RelationMap::MANY_TO_ONE, array('local_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('FormaPagamento', 'FormaPagamento', RelationMap::MANY_TO_ONE, array('forma_pagamento_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Produto', 'Produto', RelationMap::MANY_TO_ONE, array('produto_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Cliente', 'Cliente', RelationMap::MANY_TO_ONE, array('cliente_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('UsuarioRelatedByUsuarioId', 'Usuario', RelationMap::MANY_TO_ONE, array('usuario_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('UsuarioRelatedByUsuarioValidouId', 'Usuario', RelationMap::MANY_TO_ONE, array('usuario_validou_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('CertificadoRelatedByCertificadoRenovado', 'Certificado', RelationMap::MANY_TO_ONE, array('certificado_renovado' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Agendamento', 'Agendamento', RelationMap::ONE_TO_MANY, array('id' => 'certificado_id', ), 'RESTRICT', null);
    $this->addRelation('CertificadoSituacao', 'CertificadoSituacao', RelationMap::ONE_TO_MANY, array('id' => 'certificado_id', ), 'RESTRICT', null);
    $this->addRelation('CuponsDescontoCertificado', 'CuponsDescontoCertificado', RelationMap::ONE_TO_MANY, array('id' => 'certificado_id', ), 'RESTRICT', null);
    $this->addRelation('CertificadoCupom', 'CertificadoCupom', RelationMap::ONE_TO_MANY, array('id' => 'certificado_id', ), 'RESTRICT', null);
    $this->addRelation('CertificadoRelatedByCertificadoRenovado', 'Certificado', RelationMap::ONE_TO_MANY, array('id' => 'certificado_renovado', ), 'RESTRICT', null);
    $this->addRelation('CertificadoPagamento', 'CertificadoPagamento', RelationMap::ONE_TO_MANY, array('id' => 'certificado_id', ), 'RESTRICT', null);
    $this->addRelation('Boleto', 'Boleto', RelationMap::ONE_TO_MANY, array('id' => 'certificado_id', ), 'RESTRICT', null);
    $this->addRelation('Recibo', 'Recibo', RelationMap::ONE_TO_MANY, array('id' => 'certificado_id', ), 'RESTRICT', null);
    $this->addRelation('ItemPedido', 'ItemPedido', RelationMap::ONE_TO_MANY, array('id' => 'certificado_id', ), 'RESTRICT', null);
    $this->addRelation('ContasReceber', 'ContasReceber', RelationMap::ONE_TO_MANY, array('id' => 'certificado_id', ), 'RESTRICT', null);
    $this->addRelation('Prospect', 'Prospect', RelationMap::ONE_TO_MANY, array('id' => 'certificado_id', ), 'RESTRICT', null);
	} // buildRelations()

} // CertificadoTableMap
