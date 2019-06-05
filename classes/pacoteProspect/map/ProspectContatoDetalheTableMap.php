<?php


/**
 * This class defines the structure of the 'prospect_contato_detalhe' table.
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
class ProspectContatoDetalheTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteProspect.map.ProspectContatoDetalheTableMap';

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
		$this->setName('prospect_contato_detalhe');
		$this->setPhpName('ProspectContatoDetalhe');
		$this->setClassname('ProspectContatoDetalhe');
		$this->setPackage('pacoteProspect');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NOME_PESSOA', 'NomePessoa', 'VARCHAR', true, 200, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', true, 100, null);
		$this->addColumn('FONE', 'Fone', 'VARCHAR', true, 20, null);
		$this->addColumn('CELULAR', 'Celular', 'VARCHAR', true, 20, null);
		$this->addForeignKey('PROSPECT_CONTATO_ID', 'ProspectContatoId', 'INTEGER', 'prospect_contato', 'ID', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('ProspectContato', 'ProspectContato', RelationMap::MANY_TO_ONE, array('prospect_contato_id' => 'id', ), 'RESTRICT', null);
	} // buildRelations()

} // ProspectContatoDetalheTableMap
