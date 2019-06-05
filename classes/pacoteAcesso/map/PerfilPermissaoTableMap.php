<?php


/**
 * This class defines the structure of the 'perfil_permissao' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    pacoteAcesso.map
 */
class PerfilPermissaoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteAcesso.map.PerfilPermissaoTableMap';

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
		$this->setName('perfil_permissao');
		$this->setPhpName('PerfilPermissao');
		$this->setClassname('PerfilPermissao');
		$this->setPackage('pacoteAcesso');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('PERFIL_ID', 'PerfilId', 'INTEGER' , 'perfil', 'ID', true, null, null);
		$this->addForeignPrimaryKey('PERMISSAO_ID', 'PermissaoId', 'INTEGER' , 'permissao', 'ID', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Perfil', 'Perfil', RelationMap::MANY_TO_ONE, array('perfil_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Permissao', 'Permissao', RelationMap::MANY_TO_ONE, array('permissao_id' => 'id', ), 'RESTRICT', null);
	} // buildRelations()

} // PerfilPermissaoTableMap
