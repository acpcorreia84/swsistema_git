<?php


/**
 * This class defines the structure of the 'pedido' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    pacoteComercial.map
 */
class PedidoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteComercial.map.PedidoTableMap';

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
		$this->setName('pedido');
		$this->setPhpName('Pedido');
		$this->setClassname('Pedido');
		$this->setPackage('pacoteComercial');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('CLIENTE_ID', 'ClienteId', 'INTEGER', 'cliente', 'ID', false, null, null);
		$this->addForeignKey('FORMA_PAGAMENTO_ID', 'FormaPagamentoId', 'INTEGER', 'forma_pagamento', 'ID', false, null, null);
		$this->addColumn('FUNCIONARIO_ID', 'FuncionarioId', 'INTEGER', false, null, null);
		$this->addColumn('DATA_PEDIDO', 'DataPedido', 'TIMESTAMP', false, null, null);
		$this->addColumn('DESCONTO', 'Desconto', 'FLOAT', false, null, null);
		$this->addColumn('OBSERVACAO', 'Observacao', 'VARCHAR', false, 200, null);
		$this->addColumn('SITUACAO', 'Situacao', 'INTEGER', false, null, null);
		$this->addColumn('DATA_CONFIRMACAO_PAGAMENTO', 'DataConfirmacaoPagamento', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Cliente', 'Cliente', RelationMap::MANY_TO_ONE, array('cliente_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('FormaPagamento', 'FormaPagamento', RelationMap::MANY_TO_ONE, array('forma_pagamento_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('CertificadoPagamento', 'CertificadoPagamento', RelationMap::ONE_TO_MANY, array('id' => 'pedido_id', ), 'RESTRICT', null);
    $this->addRelation('Boleto', 'Boleto', RelationMap::ONE_TO_MANY, array('id' => 'pedido_id', ), 'RESTRICT', null);
    $this->addRelation('ItemPedido', 'ItemPedido', RelationMap::ONE_TO_MANY, array('id' => 'pedido_id', ), 'RESTRICT', null);
    $this->addRelation('ContasReceber', 'ContasReceber', RelationMap::ONE_TO_MANY, array('id' => 'pedido_id', ), 'RESTRICT', null);
	} // buildRelations()

} // PedidoTableMap
