<?php


/**
 * This class defines the structure of the 'prospect_meta' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    pacoteProspect.map
 */
class ProspectMetaTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteProspect.map.ProspectMetaTableMap';

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
		$this->setName('prospect_meta');
		$this->setPhpName('ProspectMeta');
		$this->setClassname('ProspectMeta');
		$this->setPackage('pacoteProspect');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('META', 'Meta', 'VARCHAR', true, 200, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'VARCHAR', true, 200, null);
		$this->addColumn('PERFIL_ID', 'PerfilId', 'INTEGER', false, null, null);
		$this->addForeignKey('PROSPECT_TIPO_ID', 'ProspectTipoId', 'INTEGER', 'prospect_tipo', 'ID', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('ProspectTipo', 'ProspectTipo', RelationMap::MANY_TO_ONE, array('prospect_tipo_id' => 'id', ), 'RESTRICT', null);
	} // buildRelations()

} // ProspectMetaTableMap
