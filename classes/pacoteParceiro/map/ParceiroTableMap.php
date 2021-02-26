<?php


/**
 * This class defines the structure of the 'parceiro' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    pacoteParceiro.map
 */
class ParceiroTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteParceiro.map.ParceiroTableMap';

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
		$this->setName('parceiro');
		$this->setPhpName('Parceiro');
		$this->setClassname('Parceiro');
		$this->setPackage('pacoteParceiro');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NOME', 'Nome', 'VARCHAR', true, 50, null);
		$this->addColumn('EMPRESA', 'Empresa', 'VARCHAR', true, 50, null);
		$this->addColumn('CNPJ', 'Cnpj', 'VARCHAR', true, 20, null);
		$this->addColumn('ENDERECO', 'Endereco', 'VARCHAR', true, 100, null);
		$this->addColumn('NUMERO', 'Numero', 'VARCHAR', true, 4, null);
		$this->addColumn('BAIRRO', 'Bairro', 'VARCHAR', true, 50, null);
		$this->addColumn('CIDADE', 'Cidade', 'VARCHAR', true, 30, null);
		$this->addColumn('COMPLEMENTO', 'Complemento', 'VARCHAR', false, 30, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', true, 60, null);
		$this->addColumn('UF', 'Uf', 'CHAR', true, 2, null);
		$this->addColumn('CEP', 'Cep', 'CHAR', true, 10, null);
		$this->addColumn('IBGE', 'Ibge', 'VARCHAR', true, 10, null);
		$this->addColumn('FONE', 'Fone', 'VARCHAR', false, 15, null);
		$this->addColumn('CELULAR', 'Celular', 'VARCHAR', false, 15, null);
		$this->addForeignKey('LOCAL_ID', 'LocalId', 'INTEGER', 'local', 'ID', true, null, null);
		$this->addColumn('SITUACAO', 'Situacao', 'INTEGER', false, null, null);
		$this->addColumn('DATA_CADASTRO', 'DataCadastro', 'DATE', true, null, null);
		$this->addColumn('BANCO', 'Banco', 'VARCHAR', false, 50, null);
		$this->addColumn('CONTA_CORRENTE', 'ContaCorrente', 'VARCHAR', false, 12, null);
		$this->addColumn('AGENCIA', 'Agencia', 'VARCHAR', false, 8, null);
		$this->addColumn('OPERACAO', 'Operacao', 'VARCHAR', false, 5, null);
		$this->addColumn('COMISSAO_VENDA', 'ComissaoVenda', 'INTEGER', true, null, null);
		$this->addColumn('COMISSAO_VALIDACAO', 'ComissaoValidacao', 'INTEGER', true, null, null);
		$this->addColumn('COMISSAO_VENDA_VALIDACAO', 'ComissaoVendaValidacao', 'INTEGER', true, null, null);
		$this->addColumn('OBSERVACAO', 'Observacao', 'VARCHAR', false, 150, null);
		$this->addColumn('TIPO_CANAL', 'TipoCanal', 'VARCHAR', false, 8, null);
		$this->addColumn('PAGA_CONTADOR', 'PagaContador', 'VARCHAR', false, 1, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Local', 'Local', RelationMap::MANY_TO_ONE, array('local_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('ParceiroComissionamento', 'ParceiroComissionamento', RelationMap::ONE_TO_MANY, array('id' => 'parceiro_id', ), 'RESTRICT', null);
    $this->addRelation('ParceiroUsuario', 'ParceiroUsuario', RelationMap::ONE_TO_MANY, array('id' => 'parceiro_id', ), 'RESTRICT', null);
    $this->addRelation('Certificado', 'Certificado', RelationMap::ONE_TO_MANY, array('id' => 'parceiro_id', ), 'RESTRICT', null);
	} // buildRelations()

} // ParceiroTableMap
