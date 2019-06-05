<?php


/**
 * This class defines the structure of the 'contas_receber' table.
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
class ContasReceberTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteFinanceiro.map.ContasReceberTableMap';

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
		$this->setName('contas_receber');
		$this->setPhpName('ContasReceber');
		$this->setClassname('ContasReceber');
		$this->setPackage('pacoteFinanceiro');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('PEDIDO_ID', 'PedidoId', 'INTEGER', 'pedido', 'ID', false, null, null);
		$this->addForeignKey('BANCO_ID', 'BancoId', 'INTEGER', 'banco', 'ID', false, null, null);
		$this->addForeignKey('CERTIFICADO_ID', 'CertificadoId', 'INTEGER', 'certificado', 'ID', false, null, null);
		$this->addForeignKey('CONTA_CONTABIL_ID', 'ContaContabilId', 'INTEGER', 'conta_contabil', 'ID', false, null, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'VARCHAR', true, 200, null);
		$this->addColumn('DATA_DOCUMENTO', 'DataDocumento', 'TIMESTAMP', false, null, null);
		$this->addColumn('DATA_PAGAMENTO', 'DataPagamento', 'TIMESTAMP', false, null, null);
		$this->addColumn('VALOR_DOCUMENTO', 'ValorDocumento', 'FLOAT', false, null, null);
		$this->addColumn('VENCIMENTO', 'Vencimento', 'TIMESTAMP', false, null, null);
		$this->addColumn('DESCONTO', 'Desconto', 'FLOAT', false, null, null);
		$this->addColumn('OBSERVACAO', 'Observacao', 'VARCHAR', false, 200, null);
		$this->addColumn('SITUACAO', 'Situacao', 'INTEGER', true, null, null);
		$this->addForeignKey('FORMA_PAGAMENTO_ID', 'FormaPagamentoId', 'INTEGER', 'forma_pagamento', 'ID', false, null, null);
		$this->addColumn('CODIGO_DOCUMENTO', 'CodigoDocumento', 'VARCHAR', false, 30, null);
		$this->addColumn('NOTA_FISCAL', 'NotaFiscal', 'INTEGER', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Banco', 'Banco', RelationMap::MANY_TO_ONE, array('banco_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('ContaContabil', 'ContaContabil', RelationMap::MANY_TO_ONE, array('conta_contabil_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Pedido', 'Pedido', RelationMap::MANY_TO_ONE, array('pedido_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Certificado', 'Certificado', RelationMap::MANY_TO_ONE, array('certificado_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('FormaPagamento', 'FormaPagamento', RelationMap::MANY_TO_ONE, array('forma_pagamento_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Boleto', 'Boleto', RelationMap::ONE_TO_MANY, array('id' => 'contas_receber_id', ), 'RESTRICT', null);
    $this->addRelation('LancamentoCaixa', 'LancamentoCaixa', RelationMap::ONE_TO_MANY, array('id' => 'conta_receber_id', ), 'RESTRICT', null);
    $this->addRelation('LancamentoConta', 'LancamentoConta', RelationMap::ONE_TO_MANY, array('id' => 'conta_receber_id', ), 'RESTRICT', null);
	} // buildRelations()

} // ContasReceberTableMap
