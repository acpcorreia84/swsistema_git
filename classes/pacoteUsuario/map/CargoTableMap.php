<?php


/**
 * This class defines the structure of the 'cargo' table.
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
class CargoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteUsuario.map.CargoTableMap';

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
		$this->setName('cargo');
		$this->setPhpName('Cargo');
		$this->setClassname('Cargo');
		$this->setPackage('pacoteUsuario');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NOME', 'Nome', 'VARCHAR', true, 200, null);
		$this->addColumn('CBO', 'Cbo', 'VARCHAR', true, 20, null);
		$this->addForeignKey('SETOR_ID', 'SetorId', 'INTEGER', 'setor', 'ID', false, null, null);
		$this->addColumn('APAGADO', 'Apagado', 'INTEGER', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Setor', 'Setor', RelationMap::MANY_TO_ONE, array('setor_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Usuario', 'Usuario', RelationMap::ONE_TO_MANY, array('id' => 'cargo_id', ), 'RESTRICT', null);
	} // buildRelations()

} // CargoTableMap
