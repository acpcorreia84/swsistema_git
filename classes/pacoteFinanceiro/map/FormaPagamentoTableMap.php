<?php


/**
 * This class defines the structure of the 'forma_pagamento' table.
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
class FormaPagamentoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteFinanceiro.map.FormaPagamentoTableMap';

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
		$this->setName('forma_pagamento');
		$this->setPhpName('FormaPagamento');
		$this->setClassname('FormaPagamento');
		$this->setPackage('pacoteFinanceiro');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NOME', 'Nome', 'VARCHAR', true, 20, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Certificado', 'Certificado', RelationMap::ONE_TO_MANY, array('id' => 'forma_pagamento_id', ), 'RESTRICT', null);
    $this->addRelation('CertificadoPagamento', 'CertificadoPagamento', RelationMap::ONE_TO_MANY, array('id' => 'forma_pagamento_id', ), 'RESTRICT', null);
    $this->addRelation('Pedido', 'Pedido', RelationMap::ONE_TO_MANY, array('id' => 'forma_pagamento_id', ), 'RESTRICT', null);
    $this->addRelation('ContasReceber', 'ContasReceber', RelationMap::ONE_TO_MANY, array('id' => 'forma_pagamento_id', ), 'RESTRICT', null);
	} // buildRelations()

} // FormaPagamentoTableMap
