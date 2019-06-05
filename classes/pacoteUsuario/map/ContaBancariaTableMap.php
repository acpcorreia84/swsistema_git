<?php


/**
 * This class defines the structure of the 'conta_bancaria' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    pacoteUsuario.map
 */
class ContaBancariaTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteUsuario.map.ContaBancariaTableMap';

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
		$this->setName('conta_bancaria');
		$this->setPhpName('ContaBancaria');
		$this->setClassname('ContaBancaria');
		$this->setPackage('pacoteUsuario');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('BANCO', 'Banco', 'VARCHAR', true, 50, null);
		$this->addColumn('AGENCIA', 'Agencia', 'VARCHAR', false, 7, null);
		$this->addColumn('NUMERO_CONTA', 'NumeroConta', 'VARCHAR', false, 10, null);
		$this->addColumn('TIPO', 'Tipo', 'CHAR', false, 2, null);
		$this->addColumn('SITUACAO', 'Situacao', 'INTEGER', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('LancamentoConta', 'LancamentoConta', RelationMap::ONE_TO_MANY, array('id' => 'conta_bancaria_id', ), 'RESTRICT', null);
	} // buildRelations()

} // ContaBancariaTableMap
