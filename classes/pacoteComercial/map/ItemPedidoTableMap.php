<?php


/**
 * This class defines the structure of the 'item_pedido' table.
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
class ItemPedidoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteComercial.map.ItemPedidoTableMap';

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
		$this->setName('item_pedido');
		$this->setPhpName('ItemPedido');
		$this->setClassname('ItemPedido');
		$this->setPackage('pacoteComercial');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('PRODUTO_ID', 'ProdutoId', 'INTEGER', 'produto', 'ID', false, null, null);
		$this->addForeignKey('CERTIFICADO_ID', 'CertificadoId', 'INTEGER', 'certificado', 'ID', false, null, null);
		$this->addForeignKey('PEDIDO_ID', 'PedidoId', 'INTEGER', 'pedido', 'ID', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Produto', 'Produto', RelationMap::MANY_TO_ONE, array('produto_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Certificado', 'Certificado', RelationMap::MANY_TO_ONE, array('certificado_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Pedido', 'Pedido', RelationMap::MANY_TO_ONE, array('pedido_id' => 'id', ), 'RESTRICT', null);
	} // buildRelations()

} // ItemPedidoTableMap
