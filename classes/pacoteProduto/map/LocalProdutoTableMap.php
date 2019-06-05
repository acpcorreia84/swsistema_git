<?php


/**
 * This class defines the structure of the 'local_produto' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    pacoteProduto.map
 */
class LocalProdutoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteProduto.map.LocalProdutoTableMap';

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
		$this->setName('local_produto');
		$this->setPhpName('LocalProduto');
		$this->setClassname('LocalProduto');
		$this->setPackage('pacoteProduto');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('LOCAL_ID', 'LocalId', 'INTEGER' , 'local', 'ID', true, null, null);
		$this->addForeignPrimaryKey('PRODUTO_ID', 'ProdutoId', 'INTEGER' , 'produto', 'ID', true, null, null);
		$this->addColumn('PRECO', 'Preco', 'FLOAT', true, null, null);
		$this->addColumn('COMISSIONAMENTO', 'Comissionamento', 'FLOAT', true, null, null);
		$this->addColumn('OBSERVACAO', 'Observacao', 'VARCHAR', false, 1000, null);
		$this->addColumn('SITUACAO', 'Situacao', 'INTEGER', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Local', 'Local', RelationMap::MANY_TO_ONE, array('local_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Produto', 'Produto', RelationMap::MANY_TO_ONE, array('produto_id' => 'id', ), 'RESTRICT', null);
	} // buildRelations()

} // LocalProdutoTableMap
