<?php


/**
 * This class defines the structure of the 'certificado_pagamento' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    pacoteCertificado.map
 */
class CertificadoPagamentoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteCertificado.map.CertificadoPagamentoTableMap';

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
		$this->setName('certificado_pagamento');
		$this->setPhpName('CertificadoPagamento');
		$this->setClassname('CertificadoPagamento');
		$this->setPackage('pacoteCertificado');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('DATA_PAGAMENTO', 'DataPagamento', 'TIMESTAMP', false, null, null);
		$this->addColumn('DATA_CONFIRMACAO_PAGAMENTO', 'DataConfirmacaoPagamento', 'TIMESTAMP', false, null, null);
		$this->addForeignKey('CERTIFICADO_ID', 'CertificadoId', 'INTEGER', 'certificado', 'ID', true, null, null);
		$this->addForeignKey('PEDIDO_ID', 'PedidoId', 'INTEGER', 'pedido', 'ID', true, null, null);
		$this->addColumn('DATA_INCLUSAO', 'DataInclusao', 'TIMESTAMP', true, null, null);
		$this->addColumn('VALOR', 'Valor', 'FLOAT', true, null, null);
		$this->addColumn('CODIGO_PAGAMENTO', 'CodigoPagamento', 'VARCHAR', false, 15, null);
		$this->addForeignKey('FORMA_PAGAMENTO_ID', 'FormaPagamentoId', 'INTEGER', 'forma_pagamento', 'ID', false, null, null);
		$this->addColumn('QUANTIDADE_PARCELAS', 'QuantidadeParcelas', 'INTEGER', false, null, null);
		$this->addColumn('COMPROVANTE_PAGAMENTO', 'ComprovantePagamento', 'VARCHAR', false, 200, null);
		$this->addColumn('OBSERVACAO', 'Observacao', 'VARCHAR', false, 200, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Certificado', 'Certificado', RelationMap::MANY_TO_ONE, array('certificado_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Pedido', 'Pedido', RelationMap::MANY_TO_ONE, array('pedido_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('FormaPagamento', 'FormaPagamento', RelationMap::MANY_TO_ONE, array('forma_pagamento_id' => 'id', ), 'RESTRICT', null);
	} // buildRelations()

} // CertificadoPagamentoTableMap
