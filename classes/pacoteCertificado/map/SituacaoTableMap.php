<?php


/**
 * This class defines the structure of the 'situacao' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    pacoteCertificado.map
 */
class SituacaoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteCertificado.map.SituacaoTableMap';

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
		$this->setName('situacao');
		$this->setPhpName('Situacao');
		$this->setClassname('Situacao');
		$this->setPackage('pacoteCertificado');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('SIGLA', 'Sigla', 'VARCHAR', true, 8, null);
		$this->addColumn('NOME', 'Nome', 'VARCHAR', true, 20, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'VARCHAR', true, 40, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('CertificadoSituacao', 'CertificadoSituacao', RelationMap::ONE_TO_MANY, array('id' => 'situacao_id', ), 'RESTRICT', null);
    $this->addRelation('Certificado', 'Certificado', RelationMap::ONE_TO_MANY, array('id' => 'status_followup', ), 'RESTRICT', null);
	} // buildRelations()

} // SituacaoTableMap
