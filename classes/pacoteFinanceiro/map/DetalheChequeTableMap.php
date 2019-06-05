<?php


/**
 * This class defines the structure of the 'detalhe_cheque' table.
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
class DetalheChequeTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteFinanceiro.map.DetalheChequeTableMap';

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
		$this->setName('detalhe_cheque');
		$this->setPhpName('DetalheCheque');
		$this->setClassname('DetalheCheque');
		$this->setPackage('pacoteFinanceiro');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('BANCO_ID', 'BancoId', 'INTEGER', 'banco', 'ID', true, null, null);
		$this->addColumn('VENDEDOR_ID', 'VendedorId', 'INTEGER', false, null, null);
		$this->addForeignKey('LANCAMENTO_CAIXA_ID', 'LancamentoCaixaId', 'INTEGER', 'lancamento_caixa', 'ID', false, null, null);
		$this->addColumn('NUMERO', 'Numero', 'INTEGER', false, null, null);
		$this->addColumn('BOM_PARA', 'BomPara', 'TIMESTAMP', false, null, null);
		$this->addColumn('VALOR', 'Valor', 'FLOAT', false, null, null);
		$this->addColumn('DATA_RECEBIMENTO', 'DataRecebimento', 'TIMESTAMP', false, null, null);
		$this->addColumn('NOME_CLIENTE', 'NomeCliente', 'VARCHAR', false, 40, null);
		$this->addColumn('SITUACAO', 'Situacao', 'CHAR', false, 1, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('LancamentoCaixa', 'LancamentoCaixa', RelationMap::MANY_TO_ONE, array('lancamento_caixa_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Banco', 'Banco', RelationMap::MANY_TO_ONE, array('banco_id' => 'id', ), 'RESTRICT', null);
	} // buildRelations()

} // DetalheChequeTableMap
