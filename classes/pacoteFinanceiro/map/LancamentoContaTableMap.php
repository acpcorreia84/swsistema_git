<?php


/**
 * This class defines the structure of the 'lancamento_conta' table.
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
class LancamentoContaTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteFinanceiro.map.LancamentoContaTableMap';

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
		$this->setName('lancamento_conta');
		$this->setPhpName('LancamentoConta');
		$this->setClassname('LancamentoConta');
		$this->setPackage('pacoteFinanceiro');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('CONTA_BANCARIA_ID', 'ContaBancariaId', 'INTEGER', 'conta_bancaria', 'ID', true, null, null);
		$this->addForeignKey('CONTA_PAGAR_ID', 'ContaPagarId', 'INTEGER', 'contas_pagar', 'ID', false, null, null);
		$this->addForeignKey('CONTA_RECEBER_ID', 'ContaReceberId', 'INTEGER', 'contas_receber', 'ID', false, null, null);
		$this->addForeignKey('CONTA_CONTABIL_ID', 'ContaContabilId', 'INTEGER', 'conta_contabil', 'ID', false, null, null);
		$this->addColumn('COD_MOVIMENTACAO', 'CodMovimentacao', 'VARCHAR', false, 20, null);
		$this->addColumn('DATA_LANCAMENTO', 'DataLancamento', 'TIMESTAMP', false, null, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'VARCHAR', false, 255, null);
		$this->addColumn('VALOR', 'Valor', 'FLOAT', false, null, null);
		$this->addColumn('TIPO', 'Tipo', 'CHAR', false, 1, null);
		$this->addColumn('OBSERVACAO', 'Observacao', 'VARCHAR', false, 100, null);
		$this->addForeignKey('LOCAL_ID', 'LocalId', 'INTEGER', 'local', 'ID', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('ContasPagar', 'ContasPagar', RelationMap::MANY_TO_ONE, array('conta_pagar_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('ContasReceber', 'ContasReceber', RelationMap::MANY_TO_ONE, array('conta_receber_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('ContaBancaria', 'ContaBancaria', RelationMap::MANY_TO_ONE, array('conta_bancaria_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('ContaContabil', 'ContaContabil', RelationMap::MANY_TO_ONE, array('conta_contabil_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Local', 'Local', RelationMap::MANY_TO_ONE, array('local_id' => 'id', ), 'RESTRICT', null);
	} // buildRelations()

} // LancamentoContaTableMap
