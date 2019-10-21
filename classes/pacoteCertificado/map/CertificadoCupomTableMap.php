<?php


/**
 * This class defines the structure of the 'certificado_cupom' table.
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
class CertificadoCupomTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteCertificado.map.CertificadoCupomTableMap';

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
		$this->setName('certificado_cupom');
		$this->setPhpName('CertificadoCupom');
		$this->setClassname('CertificadoCupom');
		$this->setPackage('pacoteCertificado');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('CERTIFICADO_ID', 'CertificadoId', 'INTEGER', 'certificado', 'ID', false, null, null);
		$this->addForeignKey('CLIENTE_ID', 'ClienteId', 'INTEGER', 'cliente', 'ID', false, null, null);
		$this->addColumn('CODIGO', 'Codigo', 'VARCHAR', true, 10, null);
		$this->addColumn('DATA_VENCIMENTO', 'DataVencimento', 'TIMESTAMP', true, null, null);
		$this->addColumn('DATA_EMISSAO', 'DataEmissao', 'TIMESTAMP', false, null, null);
		$this->addColumn('DATA_UTILIZACAO', 'DataUtilizacao', 'TIMESTAMP', false, null, null);
		$this->addColumn('VALOR_CUPOM', 'ValorCupom', 'FLOAT', false, null, null);
		$this->addColumn('VALOR_FINAL', 'ValorFinal', 'FLOAT', false, null, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'VARCHAR', false, 150, null);
		$this->addColumn('OBSERVACAO', 'Observacao', 'VARCHAR', false, 150, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Certificado', 'Certificado', RelationMap::MANY_TO_ONE, array('certificado_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Cliente', 'Cliente', RelationMap::MANY_TO_ONE, array('cliente_id' => 'id', ), 'RESTRICT', null);
	} // buildRelations()

} // CertificadoCupomTableMap
