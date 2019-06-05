<?php


/**
 * This class defines the structure of the 'contato' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    pacoteContato.map
 */
class ContatoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteContato.map.ContatoTableMap';

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
		$this->setName('contato');
		$this->setPhpName('Contato');
		$this->setClassname('Contato');
		$this->setPackage('pacoteContato');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('LOCAL_ID', 'LocalId', 'INTEGER', 'local', 'ID', false, null, null);
		$this->addColumn('NOME', 'Nome', 'VARCHAR', true, 60, null);
		$this->addColumn('EMPRESA', 'Empresa', 'VARCHAR', true, 80, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', false, 60, null);
		$this->addColumn('NASCIMENTO', 'Nascimento', 'DATE', false, null, null);
		$this->addColumn('SEXO', 'Sexo', 'CHAR', true, 1, null);
		$this->addColumn('ENDERECO', 'Endereco', 'VARCHAR', false, 100, null);
		$this->addColumn('BAIRRO', 'Bairro', 'VARCHAR', false, 50, null);
		$this->addColumn('COMPLEMENTO', 'Complemento', 'VARCHAR', false, 80, null);
		$this->addColumn('CIDADE', 'Cidade', 'VARCHAR', false, 30, null);
		$this->addColumn('UF', 'Uf', 'CHAR', false, 2, null);
		$this->addColumn('CEP', 'Cep', 'CHAR', false, 10, null);
		$this->addColumn('FONE1', 'Fone1', 'VARCHAR', false, 15, null);
		$this->addColumn('CELULAR', 'Celular', 'VARCHAR', false, 15, null);
		$this->addColumn('CPF_CNPJ', 'CpfCnpj', 'VARCHAR', true, 20, null);
		$this->addColumn('SITUACAO', 'Situacao', 'INTEGER', false, null, null);
		$this->addColumn('CARGO', 'Cargo', 'VARCHAR', false, 20, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Local', 'Local', RelationMap::MANY_TO_ONE, array('local_id' => 'id', ), 'RESTRICT', null);
	} // buildRelations()

} // ContatoTableMap
