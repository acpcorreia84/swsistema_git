<?php


/**
 * This class defines the structure of the 'perfil' table.
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
class PerfilTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteUsuario.map.PerfilTableMap';

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
		$this->setName('perfil');
		$this->setPhpName('Perfil');
		$this->setClassname('Perfil');
		$this->setPackage('pacoteUsuario');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NOME', 'Nome', 'VARCHAR', false, 15, null);
		$this->addColumn('SITUACAO', 'Situacao', 'INTEGER', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Usuario', 'Usuario', RelationMap::ONE_TO_MANY, array('id' => 'perfil_id', ), 'RESTRICT', null);
    $this->addRelation('PerfilPermissao', 'PerfilPermissao', RelationMap::ONE_TO_MANY, array('id' => 'perfil_id', ), 'RESTRICT', null);
	} // buildRelations()

} // PerfilTableMap
