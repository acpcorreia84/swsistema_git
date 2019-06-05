<?php


/**
 * This class defines the structure of the 'produto' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    pacoteProduto.map
 */
class ProdutoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteProduto.map.ProdutoTableMap';

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
		$this->setName('produto');
		$this->setPhpName('Produto');
		$this->setClassname('Produto');
		$this->setPackage('pacoteProduto');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('FORNECEDOR_ID', 'FornecedorId', 'INTEGER', 'fornecedor', 'ID', true, null, null);
		$this->addColumn('CODIGO', 'Codigo', 'INTEGER', false, null, null);
		$this->addColumn('NOME', 'Nome', 'VARCHAR', true, 50, null);
		$this->addColumn('PRECO', 'Preco', 'FLOAT', true, null, null);
		$this->addColumn('PRECO_ANTIGO2', 'PrecoAntigo2', 'FLOAT', true, null, null);
		$this->addColumn('PRECO_ANTIGO', 'PrecoAntigo', 'FLOAT', true, null, null);
		$this->addColumn('PRECO_CUSTO', 'PrecoCusto', 'FLOAT', true, null, null);
		$this->addColumn('PESSOA_TIPO', 'PessoaTipo', 'CHAR', true, 1, null);
		$this->addColumn('SITUACAO', 'Situacao', 'INTEGER', true, null, null);
		$this->addColumn('VALIDADE', 'Validade', 'INTEGER', true, null, null);
		$this->addForeignKey('PRODUTO_ID', 'ProdutoId', 'INTEGER', 'produto', 'ID', true, null, null);
		$this->addColumn('COMISSAO', 'Comissao', 'FLOAT', false, null, null);
		$this->addColumn('PRODUTO_LOJA', 'ProdutoLoja', 'INTEGER', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Fornecedor', 'Fornecedor', RelationMap::MANY_TO_ONE, array('fornecedor_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('ProdutoRelatedByProdutoId', 'Produto', RelationMap::MANY_TO_ONE, array('produto_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('CuponsDescontoCertificado', 'CuponsDescontoCertificado', RelationMap::ONE_TO_MANY, array('id' => 'produto_id', ), 'RESTRICT', null);
    $this->addRelation('ProdutoRelatedByProdutoId', 'Produto', RelationMap::ONE_TO_MANY, array('id' => 'produto_id', ), 'RESTRICT', null);
    $this->addRelation('LocalProduto', 'LocalProduto', RelationMap::ONE_TO_MANY, array('id' => 'produto_id', ), 'RESTRICT', null);
    $this->addRelation('Certificado', 'Certificado', RelationMap::ONE_TO_MANY, array('id' => 'produto_id', ), 'RESTRICT', null);
    $this->addRelation('ItemPedido', 'ItemPedido', RelationMap::ONE_TO_MANY, array('id' => 'produto_id', ), 'RESTRICT', null);
	} // buildRelations()

} // ProdutoTableMap
