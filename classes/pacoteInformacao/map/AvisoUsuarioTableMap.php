<?php


/**
 * This class defines the structure of the 'aviso_usuario' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    pacoteInformacao.map
 */
class AvisoUsuarioTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteInformacao.map.AvisoUsuarioTableMap';

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
		$this->setName('aviso_usuario');
		$this->setPhpName('AvisoUsuario');
		$this->setClassname('AvisoUsuario');
		$this->setPackage('pacoteInformacao');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('TIPO_USUARIO', 'TipoUsuario', 'CHAR', false, 1, null);
		$this->addColumn('STATUS', 'Status', 'INTEGER', false, null, null);
		$this->addColumn('DATA_VISUALIZACAO', 'DataVisualizacao', 'TIMESTAMP', false, null, null);
		$this->addColumn('DATA_RESUMO', 'DataResumo', 'TIMESTAMP', false, null, null);
		$this->addForeignKey('AVISO_ID', 'AvisoId', 'INTEGER', 'aviso', 'ID', true, null, null);
		$this->addForeignKey('USUARIO_ID', 'UsuarioId', 'INTEGER', 'usuario', 'ID', true, null, null);
		$this->addColumn('USUARIO_CLIENTE_ID', 'UsuarioClienteId', 'INTEGER', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Aviso', 'Aviso', RelationMap::MANY_TO_ONE, array('aviso_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Usuario', 'Usuario', RelationMap::MANY_TO_ONE, array('usuario_id' => 'id', ), 'RESTRICT', null);
	} // buildRelations()

} // AvisoUsuarioTableMap
