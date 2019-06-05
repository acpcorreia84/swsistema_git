<?php


/**
 * This class defines the structure of the 'categoria_conta_contabil' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    pacoteFinanceiro.map
 */
class CategoriaContaContabilTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteFinanceiro.map.CategoriaContaContabilTableMap';

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
		$this->setName('categoria_conta_contabil');
		$this->setPhpName('CategoriaContaContabil');
		$this->setClassname('CategoriaContaContabil');
		$this->setPackage('pacoteFinanceiro');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('CODIGO', 'Codigo', 'VARCHAR', false, 6, null);
		$this->addColumn('NOME', 'Nome', 'VARCHAR', true, 50, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'VARCHAR', true, 80, null);
		$this->addColumn('TIPO', 'Tipo', 'CHAR', false, 1, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('ContaContabil', 'ContaContabil', RelationMap::ONE_TO_MANY, array('id' => 'categoria_conta_contabil_id', ), 'RESTRICT', null);
	} // buildRelations()

} // CategoriaContaContabilTableMap
