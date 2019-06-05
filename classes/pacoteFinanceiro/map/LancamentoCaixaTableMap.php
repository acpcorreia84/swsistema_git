<?php


/**
 * This class defines the structure of the 'lancamento_caixa' table.
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
class LancamentoCaixaTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteFinanceiro.map.LancamentoCaixaTableMap';

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
		$this->setName('lancamento_caixa');
		$this->setPhpName('LancamentoCaixa');
		$this->setClassname('LancamentoCaixa');
		$this->setPackage('pacoteFinanceiro');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('CAIXA_ID', 'CaixaId', 'INTEGER', 'caixa', 'ID', true, null, null);
		$this->addForeignKey('CONTA_PAGAR_ID', 'ContaPagarId', 'INTEGER', 'contas_pagar', 'ID', false, null, null);
		$this->addForeignKey('CONTA_CONTABIL_ID', 'ContaContabilId', 'INTEGER', 'conta_contabil', 'ID', false, null, null);
		$this->addColumn('CONTA_CONTABIL_DEST_ID', 'ContaContabilDestId', 'INTEGER', false, null, null);
		$this->addForeignKey('CONTA_RECEBER_ID', 'ContaReceberId', 'INTEGER', 'contas_receber', 'ID', false, null, null);
		$this->addColumn('DATA_LANCAMENTO', 'DataLancamento', 'TIMESTAMP', false, null, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'VARCHAR', false, 255, null);
		$this->addColumn('VALOR', 'Valor', 'FLOAT', false, null, null);
		$this->addColumn('TIPO', 'Tipo', 'CHAR', false, 1, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('ContaContabil', 'ContaContabil', RelationMap::MANY_TO_ONE, array('CONTA_CONTABIL_ID' => 'id', ), 'RESTRICT', null);
    $this->addRelation('ContasPagar', 'ContasPagar', RelationMap::MANY_TO_ONE, array('conta_pagar_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('ContasReceber', 'ContasReceber', RelationMap::MANY_TO_ONE, array('conta_receber_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Caixa', 'Caixa', RelationMap::MANY_TO_ONE, array('caixa_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('DetalheLancamento', 'DetalheLancamento', RelationMap::ONE_TO_MANY, array('id' => 'lancamento_caixa_id', ), 'RESTRICT', null);
    $this->addRelation('DetalheCheque', 'DetalheCheque', RelationMap::ONE_TO_MANY, array('id' => 'lancamento_caixa_id', ), 'RESTRICT', null);
    $this->addRelation('ContasPagar', 'ContasPagar', RelationMap::ONE_TO_MANY, array('id' => 'lancamento_caixa_id', ), 'RESTRICT', null);
	} // buildRelations()

} // LancamentoCaixaTableMap
