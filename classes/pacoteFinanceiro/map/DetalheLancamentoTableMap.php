<?php


/**
 * This class defines the structure of the 'detalhe_lancamento' table.
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
class DetalheLancamentoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteFinanceiro.map.DetalheLancamentoTableMap';

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
		$this->setName('detalhe_lancamento');
		$this->setPhpName('DetalheLancamento');
		$this->setClassname('DetalheLancamento');
		$this->setPackage('pacoteFinanceiro');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('LANCAMENTO_CAIXA_ID', 'LancamentoCaixaId', 'INTEGER', 'lancamento_caixa', 'ID', true, null, null);
		$this->addColumn('CEDULAS', 'Cedulas', 'FLOAT', false, null, null);
		$this->addColumn('MOEDAS', 'Moedas', 'FLOAT', false, null, null);
		$this->addColumn('CHEQUES', 'Cheques', 'FLOAT', false, null, null);
		$this->addColumn('DEPOSITO', 'Deposito', 'FLOAT', false, null, null);
		$this->addColumn('DESPESA', 'Despesa', 'FLOAT', false, null, null);
		$this->addColumn('OUTRO', 'Outro', 'FLOAT', false, null, null);
		$this->addColumn('OBSERVACAO_OUTRO', 'ObservacaoOutro', 'VARCHAR', false, 200, null);
		$this->addColumn('OBSERVACAO_DESPESA', 'ObservacaoDespesa', 'VARCHAR', false, 200, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('LancamentoCaixa', 'LancamentoCaixa', RelationMap::MANY_TO_ONE, array('lancamento_caixa_id' => 'id', ), 'RESTRICT', null);
	} // buildRelations()

} // DetalheLancamentoTableMap
