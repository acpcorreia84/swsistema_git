<?php


/**
 * This class defines the structure of the 'prospect' table.
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
class ProspectTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteProspect.map.ProspectTableMap';

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
		$this->setName('prospect');
		$this->setPhpName('Prospect');
		$this->setClassname('Prospect');
		$this->setPackage('pacoteProspect');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('DATA_CADASTRO', 'DataCadastro', 'TIMESTAMP', true, null, null);
		$this->addColumn('DATA_PROSPECCAO', 'DataProspeccao', 'TIMESTAMP', true, null, null);
		$this->addColumn('DATA_PRIMEIRO_CONTATO', 'DataPrimeiroContato', 'TIMESTAMP', true, null, null);
		$this->addColumn('DATA_ULTIMO_CONTATO', 'DataUltimoContato', 'TIMESTAMP', true, null, null);
		$this->addColumn('DATA_AGENDAMENTO', 'DataAgendamento', 'TIMESTAMP', true, null, null);
		$this->addColumn('SITUACAO', 'Situacao', 'INTEGER', true, null, null);
		$this->addForeignKey('CONTADOR_ID', 'ContadorId', 'INTEGER', 'contador', 'ID', true, null, null);
		$this->addForeignKey('CERTIFICADO_ID', 'CertificadoId', 'INTEGER', 'certificado', 'ID', true, null, null);
		$this->addForeignKey('USUARIO_ID', 'UsuarioId', 'INTEGER', 'usuario', 'ID', true, null, null);
		$this->addForeignKey('SUPERVISOR_USUARIO_ID', 'SupervisorUsuarioId', 'INTEGER', 'usuario', 'ID', true, null, null);
		$this->addForeignKey('PROSPECT_CONTATOS_ID', 'ProspectContatosId', 'INTEGER', 'prospect_contato', 'ID', true, null, null);
		$this->addForeignKey('PROSPECT_TIPO_ID', 'ProspectTipoId', 'INTEGER', 'prospect_tipo', 'ID', true, null, null);
		$this->addColumn('PARCEIRO_ID', 'ParceiroId', 'INTEGER', true, null, null);
		$this->addColumn('PROSPECT_ID', 'ProspectId', 'INTEGER', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Contador', 'Contador', RelationMap::MANY_TO_ONE, array('contador_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Certificado', 'Certificado', RelationMap::MANY_TO_ONE, array('certificado_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('UsuarioRelatedByUsuarioId', 'Usuario', RelationMap::MANY_TO_ONE, array('usuario_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('UsuarioRelatedBySupervisorUsuarioId', 'Usuario', RelationMap::MANY_TO_ONE, array('supervisor_usuario_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('ProspectContato', 'ProspectContato', RelationMap::MANY_TO_ONE, array('prospect_contatos_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('ProspectTipo', 'ProspectTipo', RelationMap::MANY_TO_ONE, array('prospect_tipo_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('ProspectSituacao', 'ProspectSituacao', RelationMap::ONE_TO_MANY, array('id' => 'prospect_id', ), 'RESTRICT', null);
    $this->addRelation('ProspectAtendimento', 'ProspectAtendimento', RelationMap::ONE_TO_MANY, array('id' => 'prospect_id', ), 'RESTRICT', null);
    $this->addRelation('ProspectNegocio', 'ProspectNegocio', RelationMap::ONE_TO_MANY, array('id' => 'prospect_id', ), 'RESTRICT', null);
	} // buildRelations()

} // ProspectTableMap
