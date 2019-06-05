<?php


/**
 * This class defines the structure of the 'prospect_situacao' table.
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
class ProspectSituacaoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteProspect.map.ProspectSituacaoTableMap';

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
		$this->setName('prospect_situacao');
		$this->setPhpName('ProspectSituacao');
		$this->setClassname('ProspectSituacao');
		$this->setPackage('pacoteProspect');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('DATA_ACAO', 'DataAcao', 'TIMESTAMP', true, null, null);
		$this->addColumn('OBSERVACAO', 'Observacao', 'VARCHAR', true, 250, null);
		$this->addForeignKey('USUARIO_ID', 'UsuarioId', 'INTEGER', 'usuario', 'ID', true, null, null);
		$this->addForeignKey('PROSPECT_MEIO_CONTATO_ID', 'ProspectMeioContatoId', 'INTEGER', 'prospect_meio_contato', 'ID', true, null, null);
		$this->addForeignKey('PROSPECT_ACAO_ID', 'ProspectAcaoId', 'INTEGER', 'prospect_acao', 'ID', true, null, null);
		$this->addForeignKey('PROSPECT_ID', 'ProspectId', 'INTEGER', 'prospect', 'ID', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('ProspectAcao', 'ProspectAcao', RelationMap::MANY_TO_ONE, array('prospect_acao_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('ProspectMeioContato', 'ProspectMeioContato', RelationMap::MANY_TO_ONE, array('prospect_meio_contato_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Prospect', 'Prospect', RelationMap::MANY_TO_ONE, array('prospect_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Usuario', 'Usuario', RelationMap::MANY_TO_ONE, array('usuario_id' => 'id', ), 'RESTRICT', null);
	} // buildRelations()

} // ProspectSituacaoTableMap
