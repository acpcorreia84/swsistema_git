<?php


/**
 * This class defines the structure of the 'contador_comissionamento' table.
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
class ContadorComissionamentoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteContador.map.ContadorComissionamentoTableMap';

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
		$this->setName('contador_comissionamento');
		$this->setPhpName('ContadorComissionamento');
		$this->setClassname('ContadorComissionamento');
		$this->setPackage('pacoteContador');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'VARCHAR', false, 150, null);
		$this->addForeignKey('CONTADOR_ID', 'ContadorId', 'INTEGER', 'contador', 'ID', false, null, null);
		$this->addColumn('DATA_REGISTRO', 'DataRegistro', 'TIMESTAMP', true, null, null);
		$this->addColumn('DATA_PAGAMENTO', 'DataPagamento', 'TIMESTAMP', true, null, null);
		$this->addColumn('PERIODO_INICIAL', 'PeriodoInicial', 'TIMESTAMP', true, null, null);
		$this->addColumn('PERIODO_FINAL', 'PeriodoFinal', 'TIMESTAMP', true, null, null);
		$this->addColumn('VENDA', 'Venda', 'FLOAT', true, null, null);
		$this->addColumn('COMISSAO_VENDA', 'ComissaoVenda', 'INTEGER', true, null, null);
		$this->addColumn('OBSERVACAO', 'Observacao', 'VARCHAR', false, 150, null);
		$this->addColumn('SITUACAO', 'Situacao', 'INTEGER', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Contador', 'Contador', RelationMap::MANY_TO_ONE, array('contador_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('ContadorLancamento', 'ContadorLancamento', RelationMap::ONE_TO_MANY, array('id' => 'contador_comissionamento_id', ), 'RESTRICT', null);
	} // buildRelations()

} // ContadorComissionamentoTableMap
