<?php


/**
 * This class defines the structure of the 'boleto' table.
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
class BoletoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteFinanceiro.map.BoletoTableMap';

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
		$this->setName('boleto');
		$this->setPhpName('Boleto');
		$this->setClassname('Boleto');
		$this->setPackage('pacoteFinanceiro');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('TID', 'Tid', 'INTEGER', false, null, null);
		$this->addForeignKey('CERTIFICADO_ID', 'CertificadoId', 'INTEGER', 'certificado', 'ID', true, null, null);
		$this->addForeignKey('PEDIDO_ID', 'PedidoId', 'INTEGER', 'pedido', 'ID', true, null, null);
		$this->addForeignKey('CONTAS_RECEBER_ID', 'ContasReceberId', 'INTEGER', 'contas_receber', 'ID', true, null, null);
		$this->addForeignKey('CLIENTE_ID', 'ClienteId', 'VARCHAR', 'cliente', 'ID', true, 50, null);
		$this->addColumn('VENCIMENTO', 'Vencimento', 'DATE', false, null, null);
		$this->addColumn('DATA_PROCESSAMENTO', 'DataProcessamento', 'DATE', false, null, null);
		$this->addColumn('DATA_PAGAMENTO', 'DataPagamento', 'DATE', false, null, null);
		$this->addColumn('DATA_CONFIRMACAO_PAGAMENTO', 'DataConfirmacaoPagamento', 'TIMESTAMP', false, null, null);
		$this->addColumn('VALOR', 'Valor', 'FLOAT', false, null, null);
		$this->addColumn('URL_BOLETO', 'UrlBoleto', 'VARCHAR', false, 150, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'VARCHAR', false, 200, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Certificado', 'Certificado', RelationMap::MANY_TO_ONE, array('certificado_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Pedido', 'Pedido', RelationMap::MANY_TO_ONE, array('pedido_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('ContasReceber', 'ContasReceber', RelationMap::MANY_TO_ONE, array('contas_receber_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Cliente', 'Cliente', RelationMap::MANY_TO_ONE, array('cliente_id' => 'id', ), 'RESTRICT', null);
	} // buildRelations()

} // BoletoTableMap
