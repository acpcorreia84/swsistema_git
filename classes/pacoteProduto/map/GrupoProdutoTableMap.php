<?php


/**
 * This class defines the structure of the 'grupo_produto' table.
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
class GrupoProdutoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteProduto.map.GrupoProdutoTableMap';

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
		$this->setName('grupo_produto');
		$this->setPhpName('GrupoProduto');
		$this->setClassname('GrupoProduto');
		$this->setPackage('pacoteProduto');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NOME', 'Nome', 'VARCHAR', true, 100, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'VARCHAR', true, 150, null);
		$this->addColumn('SITUACAO', 'Situacao', 'INTEGER', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Produto', 'Produto', RelationMap::ONE_TO_MANY, array('id' => 'grupo_produto_id', ), 'RESTRICT', null);
    $this->addRelation('UsuarioGrupoProduto', 'UsuarioGrupoProduto', RelationMap::ONE_TO_MANY, array('id' => 'grupo_produto_id', ), 'RESTRICT', null);
	} // buildRelations()

} // GrupoProdutoTableMap
