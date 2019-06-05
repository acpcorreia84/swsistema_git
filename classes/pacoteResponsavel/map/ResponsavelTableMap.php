<?php


/**
 * This class defines the structure of the 'responsavel' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    pacoteResponsavel.map
 */
class ResponsavelTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteResponsavel.map.ResponsavelTableMap';

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
		$this->setName('responsavel');
		$this->setPhpName('Responsavel');
		$this->setClassname('Responsavel');
		$this->setPackage('pacoteResponsavel');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NOME', 'Nome', 'VARCHAR', false, 50, null);
		$this->addColumn('ENDERECO', 'Endereco', 'VARCHAR', false, 100, null);
		$this->addColumn('NUMERO', 'Numero', 'VARCHAR', false, 4, null);
		$this->addColumn('BAIRRO', 'Bairro', 'VARCHAR', false, 50, null);
		$this->addColumn('COMPLEMENTO', 'Complemento', 'VARCHAR', false, 80, null);
		$this->addColumn('CIDADE', 'Cidade', 'VARCHAR', false, 30, null);
		$this->addColumn('UF', 'Uf', 'CHAR', false, 2, null);
		$this->addColumn('CEP', 'Cep', 'CHAR', false, 10, null);
		$this->addColumn('CPF', 'Cpf', 'VARCHAR', false, 20, null);
		$this->addColumn('FONE1', 'Fone1', 'VARCHAR', false, 15, null);
		$this->addColumn('FONE2', 'Fone2', 'VARCHAR', false, 15, null);
		$this->addColumn('CELULAR', 'Celular', 'VARCHAR', false, 15, null);
		$this->addColumn('APELIDO', 'Apelido', 'VARCHAR', false, 30, null);
		$this->addColumn('NASCIMENTO', 'Nascimento', 'DATE', false, null, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', true, 60, null);
		$this->addColumn('CARGO', 'Cargo', 'VARCHAR', false, 20, null);
		$this->addColumn('RG', 'Rg', 'VARCHAR', false, 20, null);
		$this->addColumn('NIS', 'Nis', 'VARCHAR', false, 15, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Cliente', 'Cliente', RelationMap::ONE_TO_MANY, array('id' => 'responsavel_id', ), 'RESTRICT', null);
    $this->addRelation('Contador', 'Contador', RelationMap::ONE_TO_MANY, array('id' => 'responsavel_id', ), 'RESTRICT', null);
	} // buildRelations()

} // ResponsavelTableMap
