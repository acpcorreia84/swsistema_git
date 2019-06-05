<?php


/**
 * This class defines the structure of the 'certificado_fora_sistema' table.
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
class CertificadoForaSistemaTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteCertificado.map.CertificadoForaSistemaTableMap';

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
		$this->setName('certificado_fora_sistema');
		$this->setPhpName('CertificadoForaSistema');
		$this->setClassname('CertificadoForaSistema');
		$this->setPackage('pacoteCertificado');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('PROTOCOLO', 'Protocolo', 'INTEGER', false, null, null);
		$this->addColumn('DOCUMENTO', 'Documento', 'VARCHAR', false, 100, null);
		$this->addColumn('RAZAO', 'Razao', 'VARCHAR', false, 100, null);
		$this->addColumn('STATUS', 'Status', 'VARCHAR', false, 100, null);
		$this->addColumn('PRODUTO', 'Produto', 'VARCHAR', false, 150, null);
		$this->addColumn('LOCAL', 'Local', 'VARCHAR', false, 100, null);
		$this->addColumn('AR', 'Ar', 'VARCHAR', false, 150, null);
		$this->addColumn('CPF_AR', 'CpfAr', 'VARCHAR', false, 50, null);
		$this->addColumn('VALOR', 'Valor', 'VARCHAR', false, 50, null);
		$this->addColumn('DATA_AVP', 'DataAvp', 'TIMESTAMP', false, null, null);
		$this->addColumn('DATA_VALIDACAO', 'DataValidacao', 'TIMESTAMP', false, null, null);
		$this->addColumn('DATA_IMPORTACAO', 'DataImportacao', 'TIMESTAMP', false, null, null);
		$this->addColumn('DATA_MES_REFERENTE', 'DataMesReferente', 'INTEGER', false, null, null);
		$this->addColumn('EMAIL_CLIENTE', 'EmailCliente', 'VARCHAR', false, 100, null);
		$this->addColumn('TELEFONE_CLIENTE', 'TelefoneCliente', 'VARCHAR', false, 20, null);
		$this->addColumn('SITUACAO', 'Situacao', 'INTEGER', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // CertificadoForaSistemaTableMap
