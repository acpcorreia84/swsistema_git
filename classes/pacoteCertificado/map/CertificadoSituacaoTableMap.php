<?php


/**
 * This class defines the structure of the 'certificado_situacao' table.
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
class CertificadoSituacaoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteCertificado.map.CertificadoSituacaoTableMap';

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
		$this->setName('certificado_situacao');
		$this->setPhpName('CertificadoSituacao');
		$this->setClassname('CertificadoSituacao');
		$this->setPackage('pacoteCertificado');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('SITUACAO_ID', 'SituacaoId', 'INTEGER', 'situacao', 'ID', true, null, null);
		$this->addColumn('COMENTARIO', 'Comentario', 'LONGVARCHAR', false, null, null);
		$this->addForeignKey('USUARIO_ID', 'UsuarioId', 'INTEGER', 'usuario', 'ID', false, null, null);
		$this->addForeignKey('CERTIFICADO_ID', 'CertificadoId', 'INTEGER', 'certificado', 'ID', true, null, null);
		$this->addColumn('DATA', 'Data', 'TIMESTAMP', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Usuario', 'Usuario', RelationMap::MANY_TO_ONE, array('usuario_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Situacao', 'Situacao', RelationMap::MANY_TO_ONE, array('situacao_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Certificado', 'Certificado', RelationMap::MANY_TO_ONE, array('certificado_id' => 'id', ), 'RESTRICT', null);
	} // buildRelations()

} // CertificadoSituacaoTableMap
