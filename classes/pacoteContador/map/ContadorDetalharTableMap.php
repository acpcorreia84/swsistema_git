<?php


/**
 * This class defines the structure of the 'contador_detalhar' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    pacoteContador.map
 */
class ContadorDetalharTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteContador.map.ContadorDetalharTableMap';

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
		$this->setName('contador_detalhar');
		$this->setPhpName('ContadorDetalhar');
		$this->setClassname('ContadorDetalhar');
		$this->setPackage('pacoteContador');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('CONTADOR_ID', 'ContadorId', 'INTEGER', 'contador', 'ID', false, null, null);
		$this->addForeignKey('USUARIO_ID', 'UsuarioId', 'INTEGER', 'usuario', 'ID', false, null, null);
		$this->addColumn('DATA_CADASTRO', 'DataCadastro', 'TIMESTAMP', false, null, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'VARCHAR', false, 250, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Usuario', 'Usuario', RelationMap::MANY_TO_ONE, array('usuario_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Contador', 'Contador', RelationMap::MANY_TO_ONE, array('contador_id' => 'id', ), 'RESTRICT', null);
	} // buildRelations()

} // ContadorDetalharTableMap
