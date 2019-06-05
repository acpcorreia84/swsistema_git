<?php


/**
 * This class defines the structure of the 'permissao' table.
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
class PermissaoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteUsuario.map.PermissaoTableMap';

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
		$this->setName('permissao');
		$this->setPhpName('Permissao');
		$this->setClassname('Permissao');
		$this->setPackage('pacoteUsuario');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('TELA', 'Tela', 'VARCHAR', false, 20, null);
		$this->addColumn('FUNCAO', 'Funcao', 'VARCHAR', false, 10, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'VARCHAR', false, 60, null);
		$this->addForeignKey('GRUPO_PERMISSAO_ID', 'GrupoPermissaoId', 'INTEGER', 'grupo_permissao', 'ID', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('GrupoPermissao', 'GrupoPermissao', RelationMap::MANY_TO_ONE, array('grupo_permissao_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('PerfilPermissao', 'PerfilPermissao', RelationMap::ONE_TO_MANY, array('id' => 'permissao_id', ), 'RESTRICT', null);
	} // buildRelations()

} // PermissaoTableMap
