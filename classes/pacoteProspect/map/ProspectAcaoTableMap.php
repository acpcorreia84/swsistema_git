<?php


/**
 * This class defines the structure of the 'prospect_acao' table.
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
class ProspectAcaoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteProspect.map.ProspectAcaoTableMap';

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
		$this->setName('prospect_acao');
		$this->setPhpName('ProspectAcao');
		$this->setClassname('ProspectAcao');
		$this->setPackage('pacoteProspect');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NOME', 'Nome', 'VARCHAR', true, 200, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'VARCHAR', true, 200, null);
		$this->addColumn('SITUACAO', 'Situacao', 'INTEGER', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('ProspectSituacao', 'ProspectSituacao', RelationMap::ONE_TO_MANY, array('id' => 'prospect_acao_id', ), 'RESTRICT', null);
	} // buildRelations()

} // ProspectAcaoTableMap
