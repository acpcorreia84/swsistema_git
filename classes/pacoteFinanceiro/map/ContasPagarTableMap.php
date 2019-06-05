<?php


/**
 * This class defines the structure of the 'contas_pagar' table.
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
class ContasPagarTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteFinanceiro.map.ContasPagarTableMap';

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
		$this->setName('contas_pagar');
		$this->setPhpName('ContasPagar');
		$this->setClassname('ContasPagar');
		$this->setPackage('pacoteFinanceiro');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('CONTA_PAGAR_ID', 'ContaPagarId', 'INTEGER', 'contas_pagar', 'ID', false, null, null);
		$this->addForeignKey('CONTA_CONTABIL_ID', 'ContaContabilId', 'INTEGER', 'conta_contabil', 'ID', false, null, null);
		$this->addForeignKey('LANCAMENTO_CAIXA_ID', 'LancamentoCaixaId', 'INTEGER', 'lancamento_caixa', 'ID', false, null, null);
		$this->addColumn('DATA_PAGAMENTO', 'DataPagamento', 'TIMESTAMP', false, null, null);
		$this->addColumn('DATA_DOCUMENTO', 'DataDocumento', 'DATE', true, null, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'VARCHAR', true, 100, null);
		$this->addColumn('VALOR_DOCUMENTO', 'ValorDocumento', 'FLOAT', true, null, null);
		$this->addColumn('VALOR_RESTANTE', 'ValorRestante', 'FLOAT', true, null, null);
		$this->addColumn('VENCIMENTO', 'Vencimento', 'DATE', true, null, null);
		$this->addColumn('DESCONTO', 'Desconto', 'FLOAT', false, null, null);
		$this->addColumn('OBSERVACAO', 'Observacao', 'VARCHAR', false, 100, null);
		$this->addColumn('MOTIVO_DESCONTO', 'MotivoDesconto', 'VARCHAR', false, 200, null);
		$this->addColumn('SITUACAO', 'Situacao', 'INTEGER', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('ContasPagarRelatedByContaPagarId', 'ContasPagar', RelationMap::MANY_TO_ONE, array('conta_pagar_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('LancamentoCaixa', 'LancamentoCaixa', RelationMap::MANY_TO_ONE, array('lancamento_caixa_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('ContaContabil', 'ContaContabil', RelationMap::MANY_TO_ONE, array('conta_contabil_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('LancamentoCaixa', 'LancamentoCaixa', RelationMap::ONE_TO_MANY, array('id' => 'conta_pagar_id', ), 'RESTRICT', null);
    $this->addRelation('ContasPagarRelatedByContaPagarId', 'ContasPagar', RelationMap::ONE_TO_MANY, array('id' => 'conta_pagar_id', ), 'RESTRICT', null);
    $this->addRelation('LancamentoConta', 'LancamentoConta', RelationMap::ONE_TO_MANY, array('id' => 'conta_pagar_id', ), 'RESTRICT', null);
	} // buildRelations()

} // ContasPagarTableMap
