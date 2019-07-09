<?php


/**
 * This class defines the structure of the 'contador' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    pacoteContador.map
 */
class ContadorTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteContador.map.ContadorTableMap';

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
		$this->setName('contador');
		$this->setPhpName('Contador');
		$this->setClassname('Contador');
		$this->setPackage('pacoteContador');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('LOCAL_ID', 'LocalId', 'INTEGER', 'local', 'ID', false, null, null);
		$this->addColumn('COMISSAO', 'Comissao', 'INTEGER', false, null, null);
		$this->addColumn('DESCONTO', 'Desconto', 'INTEGER', false, null, null);
		$this->addColumn('BANCO', 'Banco', 'VARCHAR', false, 50, null);
		$this->addColumn('CONTA_CORRENTE', 'ContaCorrente', 'VARCHAR', false, 12, null);
		$this->addColumn('AGENCIA', 'Agencia', 'VARCHAR', false, 8, null);
		$this->addColumn('OPERACAO', 'Operacao', 'VARCHAR', false, 5, null);
		$this->addColumn('CPF_CNPJ_CONTA', 'CpfCnpjConta', 'VARCHAR', false, 20, null);
		$this->addForeignKey('RESPONSAVEL_ID', 'ResponsavelId', 'INTEGER', 'responsavel', 'ID', false, null, null);
		$this->addForeignKey('USUARIO_ID', 'UsuarioId', 'INTEGER', 'usuario', 'ID', false, null, null);
		$this->addColumn('DATA_CADASTRO', 'DataCadastro', 'TIMESTAMP', false, null, null);
		$this->addColumn('NOME', 'Nome', 'VARCHAR', false, 50, null);
		$this->addColumn('NASCIMENTO', 'Nascimento', 'DATE', false, null, null);
		$this->addColumn('CPF', 'Cpf', 'VARCHAR', false, 20, null);
		$this->addColumn('CELULAR', 'Celular', 'VARCHAR', false, 15, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', true, 60, null);
		$this->addColumn('RAZAO_SOCIAL', 'RazaoSocial', 'VARCHAR', true, 80, null);
		$this->addColumn('CNPJ', 'Cnpj', 'VARCHAR', false, 20, null);
		$this->addColumn('NOME_FANTASIA', 'NomeFantasia', 'VARCHAR', true, 80, null);
		$this->addColumn('ENDERECO', 'Endereco', 'VARCHAR', false, 100, null);
		$this->addColumn('NUMERO', 'Numero', 'VARCHAR', false, 4, null);
		$this->addColumn('BAIRRO', 'Bairro', 'VARCHAR', false, 50, null);
		$this->addColumn('COMPLEMENTO', 'Complemento', 'VARCHAR', false, 80, null);
		$this->addColumn('CIDADE', 'Cidade', 'VARCHAR', false, 30, null);
		$this->addColumn('EMAIL_EMPRESA', 'EmailEmpresa', 'VARCHAR', true, 60, null);
		$this->addColumn('UF', 'Uf', 'CHAR', false, 2, null);
		$this->addColumn('CEP', 'Cep', 'CHAR', false, 10, null);
		$this->addColumn('FONE1', 'Fone1', 'VARCHAR', false, 15, null);
		$this->addColumn('FONE2', 'Fone2', 'VARCHAR', false, 15, null);
		$this->addColumn('PESSOA_TIPO', 'PessoaTipo', 'VARCHAR', false, 2, null);
		$this->addColumn('CRC', 'Crc', 'VARCHAR', false, 8, null);
		$this->addColumn('COD_CONTADOR', 'CodContador', 'VARCHAR', false, 10, null);
		$this->addColumn('SITUACAO', 'Situacao', 'INTEGER', false, null, null);
		$this->addColumn('URL', 'Url', 'VARCHAR', false, 255, null);
		$this->addColumn('LOGO', 'Logo', 'VARCHAR', false, 255, null);
		$this->addColumn('LOCALIDADE', 'Localidade', 'VARCHAR', false, 255, null);
		$this->addColumn('CONTATO1_NOME', 'Contato1Nome', 'VARCHAR', false, 100, null);
		$this->addColumn('CONTATO1_CARGO', 'Contato1Cargo', 'VARCHAR', false, 100, null);
		$this->addColumn('CONTATO1_FONE', 'Contato1Fone', 'VARCHAR', false, 50, null);
		$this->addColumn('CONTATO2_NOME', 'Contato2Nome', 'VARCHAR', false, 100, null);
		$this->addColumn('CONTATO2_CARGO', 'Contato2Cargo', 'VARCHAR', false, 100, null);
		$this->addColumn('CONTATO2_FONE', 'Contato2Fone', 'VARCHAR', false, 50, null);
		$this->addColumn('TIPO_CONTADOR', 'TipoContador', 'VARCHAR', false, 100, null);
		$this->addColumn('POSSUI_CARTAO', 'PossuiCartao', 'INTEGER', false, null, null);
		$this->addColumn('SYNC_SAFE', 'SyncSafe', 'INTEGER', false, null, null);
		// validators
		$this->addValidator('EMAIL', 'unique', 'propel.validator.UniqueValidator', '', 'Ja existe um Contador Amigo cadastrado com este E-MAIL.');
		$this->addValidator('CPF', 'unique', 'propel.validator.UniqueValidator', '', 'Ja existe um Contador Amigo cadastrado com este CPF.');
		$this->addValidator('COD_CONTADOR', 'unique', 'propel.validator.UniqueValidator', '', 'Ja existe um Contador Amigo cadastrado com este COD.');
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Usuario', 'Usuario', RelationMap::MANY_TO_ONE, array('usuario_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Local', 'Local', RelationMap::MANY_TO_ONE, array('local_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Responsavel', 'Responsavel', RelationMap::MANY_TO_ONE, array('responsavel_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Certificado', 'Certificado', RelationMap::ONE_TO_MANY, array('id' => 'contador_id', ), 'RESTRICT', null);
    $this->addRelation('Cliente', 'Cliente', RelationMap::ONE_TO_MANY, array('id' => 'contador_id', ), 'RESTRICT', null);
    $this->addRelation('ContadorComissionamento', 'ContadorComissionamento', RelationMap::ONE_TO_MANY, array('id' => 'contador_id', ), 'RESTRICT', null);
    $this->addRelation('ContadorContato', 'ContadorContato', RelationMap::ONE_TO_MANY, array('id' => 'contador_id', ), 'RESTRICT', null);
    $this->addRelation('ContadorDetalhar', 'ContadorDetalhar', RelationMap::ONE_TO_MANY, array('id' => 'contador_id', ), 'RESTRICT', null);
    $this->addRelation('Prospect', 'Prospect', RelationMap::ONE_TO_MANY, array('id' => 'contador_id', ), 'RESTRICT', null);
	} // buildRelations()

} // ContadorTableMap
