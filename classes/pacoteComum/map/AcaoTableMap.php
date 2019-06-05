<?php


/**
 * This class defines the structure of the 'acao' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    pacoteComum.map
 */
class AcaoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteComum.map.AcaoTableMap';

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
		$this->setName('acao');
		$this->setPhpName('Acao');
		$this->setClassname('Acao');
		$this->setPackage('pacoteComum');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('SIGLA', 'Sigla', 'CHAR', false, 8, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'VARCHAR', false, 80, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('LogSerama', 'LogSerama', RelationMap::ONE_TO_MANY, array('id' => 'acao_id', ), 'RESTRICT', null);
	} // buildRelations()

} // AcaoTableMap
