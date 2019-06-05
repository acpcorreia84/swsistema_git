<?php


/**
 * This class defines the structure of the 'prospect_contato' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    pacoteProspect.map
 */
class ProspectContatoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteProspect.map.ProspectContatoTableMap';

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
		$this->setName('prospect_contato');
		$this->setPhpName('ProspectContato');
		$this->setClassname('ProspectContato');
		$this->setPackage('pacoteProspect');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NOME', 'Nome', 'VARCHAR', true, 200, null);
		$this->addColumn('PESSOA_TIPO', 'PessoaTipo', 'CHAR', true, 1, null);
		$this->addColumn('CPF', 'Cpf', 'VARCHAR', true, 15, null);
		$this->addColumn('CNPJ', 'Cnpj', 'VARCHAR', true, 16, null);
		$this->addColumn('FONE', 'Fone', 'VARCHAR', true, 16, null);
		$this->addColumn('SITE', 'Site', 'VARCHAR', true, 100, null);
		$this->addColumn('CIDADE', 'Cidade', 'VARCHAR', true, 100, null);
		$this->addColumn('BAIRRO', 'Bairro', 'VARCHAR', true, 100, null);
		$this->addColumn('UF', 'Uf', 'CHAR', true, 2, null);
		$this->addColumn('ENDERECO', 'Endereco', 'VARCHAR', true, 250, null);
		$this->addForeignKey('PROSPECT_TIPO_ID', 'ProspectTipoId', 'INTEGER', 'prospect_tipo', 'ID', true, null, null);
		$this->addForeignKey('USUARIO_ID', 'UsuarioId', 'INTEGER', 'usuario', 'ID', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Usuario', 'Usuario', RelationMap::MANY_TO_ONE, array('usuario_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('ProspectTipo', 'ProspectTipo', RelationMap::MANY_TO_ONE, array('prospect_tipo_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Prospect', 'Prospect', RelationMap::ONE_TO_MANY, array('id' => 'prospect_contatos_id', ), 'RESTRICT', null);
    $this->addRelation('ProspectContatoDetalhe', 'ProspectContatoDetalhe', RelationMap::ONE_TO_MANY, array('id' => 'prospect_contato_id', ), 'RESTRICT', null);
	} // buildRelations()

} // ProspectContatoTableMap
