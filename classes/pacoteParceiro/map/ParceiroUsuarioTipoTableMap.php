<?php


/**
 * This class defines the structure of the 'parceiro_usuario_tipo' table.
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
class ParceiroUsuarioTipoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteParceiro.map.ParceiroUsuarioTipoTableMap';

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
		$this->setName('parceiro_usuario_tipo');
		$this->setPhpName('ParceiroUsuarioTipo');
		$this->setClassname('ParceiroUsuarioTipo');
		$this->setPackage('pacoteParceiro');
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
    $this->addRelation('ParceiroUsuario', 'ParceiroUsuario', RelationMap::ONE_TO_MANY, array('id' => 'parceiro_usuario_tipo_id', ), 'RESTRICT', null);
	} // buildRelations()

} // ParceiroUsuarioTipoTableMap
