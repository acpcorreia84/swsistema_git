<?php


/**
 * This class defines the structure of the 'conta_contabil' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    pacoteFinanceiro.map
 */
class ContaContabilTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteFinanceiro.map.ContaContabilTableMap';

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
		$this->setName('conta_contabil');
		$this->setPhpName('ContaContabil');
		$this->setClassname('ContaContabil');
		$this->setPackage('pacoteFinanceiro');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('CODIGO', 'Codigo', 'VARCHAR', false, 50, null);
		$this->addColumn('CLASSIFICACAO', 'Classificacao', 'VARCHAR', false, 100, null);
		$this->addForeignKey('CATEGORIA_CONTA_CONTABIL_ID', 'CategoriaContaContabilId', 'INTEGER', 'categoria_conta_contabil', 'ID', true, null, null);
		$this->addColumn('NOME', 'Nome', 'VARCHAR', true, 50, null);
		$this->addColumn('APELIDO', 'Apelido', 'VARCHAR', true, 50, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'VARCHAR', true, 100, null);
		$this->addColumn('TIPO', 'Tipo', 'CHAR', false, 1, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('CategoriaContaContabil', 'CategoriaContaContabil', RelationMap::MANY_TO_ONE, array('categoria_conta_contabil_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('LancamentoCaixa', 'LancamentoCaixa', RelationMap::ONE_TO_MANY, array('id' => 'CONTA_CONTABIL_ID', ), 'RESTRICT', null);
    $this->addRelation('ContasReceber', 'ContasReceber', RelationMap::ONE_TO_MANY, array('id' => 'conta_contabil_id', ), 'RESTRICT', null);
    $this->addRelation('ContasPagar', 'ContasPagar', RelationMap::ONE_TO_MANY, array('id' => 'conta_contabil_id', ), 'RESTRICT', null);
    $this->addRelation('LancamentoConta', 'LancamentoConta', RelationMap::ONE_TO_MANY, array('id' => 'conta_contabil_id', ), 'RESTRICT', null);
	} // buildRelations()

} // ContaContabilTableMap
