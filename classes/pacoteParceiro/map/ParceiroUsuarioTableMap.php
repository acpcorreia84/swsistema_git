<?php


/**
 * This class defines the structure of the 'parceiro_usuario' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    pacoteParceiro.map
 */
class ParceiroUsuarioTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteParceiro.map.ParceiroUsuarioTableMap';

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
		$this->setName('parceiro_usuario');
		$this->setPhpName('ParceiroUsuario');
		$this->setClassname('ParceiroUsuario');
		$this->setPackage('pacoteParceiro');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('USUARIO_ID', 'UsuarioId', 'INTEGER' , 'usuario', 'ID', true, null, null);
		$this->addForeignPrimaryKey('PARCEIRO_ID', 'ParceiroId', 'INTEGER' , 'parceiro', 'ID', true, null, null);
		$this->addForeignKey('PARCEIRO_USUARIO_TIPO_ID', 'ParceiroUsuarioTipoId', 'INTEGER', 'parceiro_usuario_tipo', 'ID', false, null, null);
		$this->addColumn('SITUACAO', 'Situacao', 'INTEGER', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Parceiro', 'Parceiro', RelationMap::MANY_TO_ONE, array('parceiro_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Usuario', 'Usuario', RelationMap::MANY_TO_ONE, array('usuario_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('ParceiroUsuarioTipo', 'ParceiroUsuarioTipo', RelationMap::MANY_TO_ONE, array('parceiro_usuario_tipo_id' => 'id', ), 'RESTRICT', null);
	} // buildRelations()

} // ParceiroUsuarioTableMap
