<?php


/**
 * This class defines the structure of the 'cliente' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    pacoteCliente.map
 */
class ClienteTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteCliente.map.ClienteTableMap';

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
		$this->setName('cliente');
		$this->setPhpName('Cliente');
		$this->setClassname('Cliente');
		$this->setPackage('pacoteCliente');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('RESPONSAVEL_ID', 'ResponsavelId', 'INTEGER', 'responsavel', 'ID', false, null, null);
		$this->addForeignKey('LOCAL_ID', 'LocalId', 'INTEGER', 'local', 'ID', false, null, null);
		$this->addColumn('PESSOA_TIPO', 'PessoaTipo', 'CHAR', true, 1, null);
		$this->addColumn('RAZAO_SOCIAL', 'RazaoSocial', 'VARCHAR', true, 80, null);
		$this->addColumn('NOME_FANTASIA', 'NomeFantasia', 'VARCHAR', true, 80, null);
		$this->addColumn('ENDERECO', 'Endereco', 'VARCHAR', true, 100, null);
		$this->addColumn('NUMERO', 'Numero', 'VARCHAR', true, 4, null);
		$this->addColumn('BAIRRO', 'Bairro', 'VARCHAR', true, 50, null);
		$this->addColumn('COMPLEMENTO', 'Complemento', 'VARCHAR', false, 80, null);
		$this->addColumn('CIDADE', 'Cidade', 'VARCHAR', true, 30, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', true, 60, null);
		$this->addColumn('UF', 'Uf', 'CHAR', true, 2, null);
		$this->addColumn('CEP', 'Cep', 'CHAR', true, 10, null);
		$this->addColumn('FONE1', 'Fone1', 'VARCHAR', true, 15, null);
		$this->addColumn('FONE2', 'Fone2', 'VARCHAR', false, 15, null);
		$this->addColumn('CELULAR', 'Celular', 'VARCHAR', false, 15, null);
		$this->addColumn('CPF_CNPJ', 'CpfCnpj', 'VARCHAR', true, 20, null);
		$this->addColumn('SITUACAO', 'Situacao', 'INTEGER', true, null, null);
		$this->addColumn('NASCIMENTO', 'Nascimento', 'DATE', false, null, null);
		$this->addColumn('NOME_CONTATO', 'NomeContato', 'VARCHAR', false, 50, null);
		$this->addColumn('REFERENCIA_CONTATO', 'ReferenciaContato', 'VARCHAR', false, 30, null);
		$this->addColumn('TELEFONE_CONTATO', 'TelefoneContato', 'VARCHAR', false, 15, null);
		$this->addColumn('EMAIL_CONTATO', 'EmailContato', 'VARCHAR', false, 60, null);
		$this->addColumn('CARGO', 'Cargo', 'VARCHAR', false, 20, null);
		$this->addColumn('RG', 'Rg', 'VARCHAR', false, 20, null);
		$this->addColumn('NIS', 'Nis', 'VARCHAR', false, 15, null);
		$this->addForeignKey('CONTADOR_ID', 'ContadorId', 'INTEGER', 'contador', 'ID', false, null, null);
		$this->addColumn('TELEFONE_AC', 'TelefoneAc', 'VARCHAR', true, 20, null);
		$this->addColumn('EMAIL_AC', 'EmailAc', 'VARCHAR', true, 100, null);
		// validators
		$this->addValidator('EMAIL', 'unique', 'propel.validator.UniqueValidator', '', 'Existe um Cliente cadastrado com este E-MAIL.');
		$this->addValidator('CPF_CNPJ', 'unique', 'propel.validator.UniqueValidator', '', 'Existe um Cliente cadastrado com este CPF.');
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Local', 'Local', RelationMap::MANY_TO_ONE, array('local_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Contador', 'Contador', RelationMap::MANY_TO_ONE, array('contador_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Responsavel', 'Responsavel', RelationMap::MANY_TO_ONE, array('responsavel_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Certificado', 'Certificado', RelationMap::ONE_TO_MANY, array('id' => 'cliente_id', ), 'RESTRICT', null);
    $this->addRelation('ClienteContato', 'ClienteContato', RelationMap::ONE_TO_MANY, array('id' => 'cliente_id', ), 'RESTRICT', null);
    $this->addRelation('ClienteHistorico', 'ClienteHistorico', RelationMap::ONE_TO_MANY, array('id' => 'cliente_id', ), 'RESTRICT', null);
    $this->addRelation('Boleto', 'Boleto', RelationMap::ONE_TO_MANY, array('id' => 'cliente_id', ), 'RESTRICT', null);
    $this->addRelation('Pedido', 'Pedido', RelationMap::ONE_TO_MANY, array('id' => 'cliente_id', ), 'RESTRICT', null);
	} // buildRelations()

} // ClienteTableMap
