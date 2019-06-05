<?php


/**
 * This class defines the structure of the 'local' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    pacoteComum.map
 */
class LocalTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteComum.map.LocalTableMap';

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
		$this->setName('local');
		$this->setPhpName('Local');
		$this->setClassname('Local');
		$this->setPackage('pacoteComum');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NOME', 'Nome', 'VARCHAR', true, 50, null);
		$this->addColumn('SITUACAO', 'Situacao', 'INTEGER', false, null, null);
		$this->addColumn('COMISSAO', 'Comissao', 'FLOAT', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Parceiro', 'Parceiro', RelationMap::ONE_TO_MANY, array('id' => 'local_id', ), 'RESTRICT', null);
    $this->addRelation('Usuario', 'Usuario', RelationMap::ONE_TO_MANY, array('id' => 'local_id', ), 'RESTRICT', null);
    $this->addRelation('Agendamento', 'Agendamento', RelationMap::ONE_TO_MANY, array('id' => 'local_id', ), 'RESTRICT', null);
    $this->addRelation('LocalProduto', 'LocalProduto', RelationMap::ONE_TO_MANY, array('id' => 'local_id', ), 'RESTRICT', null);
    $this->addRelation('LocalUsuario', 'LocalUsuario', RelationMap::ONE_TO_MANY, array('id' => 'local_id', ), 'RESTRICT', null);
    $this->addRelation('Certificado', 'Certificado', RelationMap::ONE_TO_MANY, array('id' => 'local_id', ), 'RESTRICT', null);
    $this->addRelation('Cliente', 'Cliente', RelationMap::ONE_TO_MANY, array('id' => 'local_id', ), 'RESTRICT', null);
    $this->addRelation('Contador', 'Contador', RelationMap::ONE_TO_MANY, array('id' => 'local_id', ), 'RESTRICT', null);
    $this->addRelation('Contato', 'Contato', RelationMap::ONE_TO_MANY, array('id' => 'local_id', ), 'RESTRICT', null);
    $this->addRelation('LancamentoConta', 'LancamentoConta', RelationMap::ONE_TO_MANY, array('id' => 'local_id', ), 'RESTRICT', null);
	} // buildRelations()

} // LocalTableMap
