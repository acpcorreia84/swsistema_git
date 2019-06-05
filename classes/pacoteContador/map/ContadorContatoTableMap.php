<?php


/**
 * This class defines the structure of the 'contador_contato' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    pacoteContador.map
 */
class ContadorContatoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteContador.map.ContadorContatoTableMap';

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
		$this->setName('contador_contato');
		$this->setPhpName('ContadorContato');
		$this->setClassname('ContadorContato');
		$this->setPackage('pacoteContador');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NOME', 'Nome', 'VARCHAR', false, 50, null);
		$this->addColumn('FONE', 'Fone', 'VARCHAR', false, 15, null);
		$this->addColumn('CELULAR', 'Celular', 'VARCHAR', false, 15, null);
		$this->addColumn('CARGO', 'Cargo', 'VARCHAR', false, 50, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', true, 60, null);
		$this->addColumn('NASCIMENTO', 'Nascimento', 'DATE', false, null, null);
		$this->addColumn('CPF', 'Cpf', 'VARCHAR', false, 20, null);
		$this->addColumn('SITUACAO', 'Situacao', 'INTEGER', true, null, null);
		$this->addForeignKey('CONTADOR_ID', 'ContadorId', 'INTEGER', 'contador', 'ID', false, null, null);
		// validators
		$this->addValidator('EMAIL', 'unique', 'propel.validator.UniqueValidator', '', 'Ja existe um contato com este e-mail cadastrado para um determinado contador.');
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Contador', 'Contador', RelationMap::MANY_TO_ONE, array('contador_id' => 'id', ), 'RESTRICT', null);
	} // buildRelations()

} // ContadorContatoTableMap
