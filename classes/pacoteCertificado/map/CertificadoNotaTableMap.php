<?php


/**
 * This class defines the structure of the 'certificado_nota' table.
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
class CertificadoNotaTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteCertificado.map.CertificadoNotaTableMap';

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
		$this->setName('certificado_nota');
		$this->setPhpName('CertificadoNota');
		$this->setClassname('CertificadoNota');
		$this->setPackage('pacoteCertificado');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('CERTIFICADO_ID', 'CertificadoId', 'INTEGER', 'certificado', 'ID', false, null, null);
		$this->addColumn('PESSOA_TIPO', 'PessoaTipo', 'CHAR', true, 1, null);
		$this->addColumn('SACADO', 'Sacado', 'VARCHAR', true, 80, null);
		$this->addColumn('ENDERECO', 'Endereco', 'VARCHAR', true, 100, null);
		$this->addColumn('NUMERO', 'Numero', 'VARCHAR', true, 4, null);
		$this->addColumn('BAIRRO', 'Bairro', 'VARCHAR', true, 50, null);
		$this->addColumn('COMPLEMENTO', 'Complemento', 'VARCHAR', false, 80, null);
		$this->addColumn('CIDADE', 'Cidade', 'VARCHAR', true, 30, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', true, 60, null);
		$this->addColumn('UF', 'Uf', 'CHAR', true, 2, null);
		$this->addColumn('CEP', 'Cep', 'CHAR', true, 10, null);
		$this->addColumn('FONE1', 'Fone1', 'VARCHAR', true, 15, null);
		$this->addColumn('CELULAR', 'Celular', 'VARCHAR', false, 15, null);
		$this->addColumn('CPF_CNPJ', 'CpfCnpj', 'VARCHAR', true, 20, null);
		$this->addColumn('SITUACAO', 'Situacao', 'INTEGER', true, null, null);
		$this->addColumn('IE', 'Ie', 'VARCHAR', false, 15, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Certificado', 'Certificado', RelationMap::MANY_TO_ONE, array('certificado_id' => 'id', ), 'RESTRICT', null);
	} // buildRelations()

} // CertificadoNotaTableMap
