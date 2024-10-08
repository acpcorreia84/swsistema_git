<?php


/**
 * This class defines the structure of the 'fornecedor' table.
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
class FornecedorTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteProduto.map.FornecedorTableMap';

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
		$this->setName('fornecedor');
		$this->setPhpName('Fornecedor');
		$this->setClassname('Fornecedor');
		$this->setPackage('pacoteProduto');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NOME', 'Nome', 'VARCHAR', true, 50, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Produto', 'Produto', RelationMap::ONE_TO_MANY, array('id' => 'fornecedor_id', ), 'RESTRICT', null);
	} // buildRelations()

} // FornecedorTableMap
