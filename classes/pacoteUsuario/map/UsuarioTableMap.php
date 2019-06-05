<?php


/**
 * This class defines the structure of the 'usuario' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    pacoteUsuario.map
 */
class UsuarioTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteUsuario.map.UsuarioTableMap';

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
		$this->setName('usuario');
		$this->setPhpName('Usuario');
		$this->setClassname('Usuario');
		$this->setPackage('pacoteUsuario');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('LOCAL_ID', 'LocalId', 'INTEGER', 'local', 'ID', false, null, null);
		$this->addColumn('FOTO_AVATAR', 'FotoAvatar', 'VARCHAR', false, 200, null);
		$this->addForeignKey('PERFIL_ID', 'PerfilId', 'INTEGER', 'perfil', 'ID', true, null, null);
		$this->addColumn('LOGIN', 'Login', 'VARCHAR', false, 20, null);
		$this->addColumn('SENHA', 'Senha', 'VARCHAR', false, 10, null);
		$this->addColumn('DATA_EXPIRACAO_SENHA', 'DataExpiracaoSenha', 'DATE', false, null, null);
		$this->addColumn('DATA_ULTIMO_ACESSO', 'DataUltimoAcesso', 'TIMESTAMP', false, null, null);
		$this->addColumn('URL', 'Url', 'VARCHAR', true, 255, null);
		$this->addColumn('NOME', 'Nome', 'VARCHAR', true, 50, null);
		$this->addColumn('ENDERECO', 'Endereco', 'VARCHAR', false, 100, null);
		$this->addColumn('COMPLEMENTO', 'Complemento', 'VARCHAR', false, 100, null);
		$this->addColumn('NUMERO', 'Numero', 'VARCHAR', false, 4, null);
		$this->addColumn('BAIRRO', 'Bairro', 'VARCHAR', false, 50, null);
		$this->addColumn('CIDADE', 'Cidade', 'VARCHAR', false, 30, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', true, 60, null);
		$this->addColumn('UF', 'Uf', 'CHAR', false, 2, null);
		$this->addColumn('CEP', 'Cep', 'CHAR', false, 10, null);
		$this->addColumn('CPF', 'Cpf', 'VARCHAR', true, 20, null);
		$this->addColumn('FONE', 'Fone', 'VARCHAR', false, 15, null);
		$this->addColumn('FONE2', 'Fone2', 'VARCHAR', false, 15, null);
		$this->addColumn('CELULAR', 'Celular', 'VARCHAR', false, 15, null);
		$this->addColumn('NASCIMENTO', 'Nascimento', 'DATE', true, null, null);
		$this->addForeignKey('SETOR_ID', 'SetorId', 'INTEGER', 'setor', 'ID', true, null, null);
		$this->addForeignKey('CARGO_ID', 'CargoId', 'INTEGER', 'cargo', 'ID', true, null, null);
		$this->addColumn('SITUACAO', 'Situacao', 'INTEGER', true, null, null);
		$this->addColumn('DATA_CADASTRO', 'DataCadastro', 'DATE', true, null, null);
		$this->addColumn('SAIDA_FERIAS', 'SaidaFerias', 'DATE', true, null, null);
		$this->addColumn('VOLTA_FERIAS', 'VoltaFerias', 'DATE', true, null, null);
		$this->addColumn('LIMITE_QUANTIDADE', 'LimiteQuantidade', 'INTEGER', true, null, null);
		$this->addColumn('MARGEM_DESCONTO', 'MargemDesconto', 'INTEGER', true, null, null);
		// validators
		$this->addValidator('EMAIL', 'unique', 'propel.validator.UniqueValidator', '', 'Ja existe um Usuario cadastrado com este E-MAIL.');
		$this->addValidator('LOGIN', 'unique', 'propel.validator.UniqueValidator', '', 'Ja existe um Usuario cadastrado com este LOGIN.');
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Setor', 'Setor', RelationMap::MANY_TO_ONE, array('setor_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Local', 'Local', RelationMap::MANY_TO_ONE, array('local_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Cargo', 'Cargo', RelationMap::MANY_TO_ONE, array('cargo_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Perfil', 'Perfil', RelationMap::MANY_TO_ONE, array('perfil_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('ParceiroUsuario', 'ParceiroUsuario', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), 'RESTRICT', null);
    $this->addRelation('UsuarioComissionamento', 'UsuarioComissionamento', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), 'RESTRICT', null);
    $this->addRelation('LogSerama', 'LogSerama', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), 'RESTRICT', null);
    $this->addRelation('LogAcesso', 'LogAcesso', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), 'RESTRICT', null);
    $this->addRelation('CertificadoSituacao', 'CertificadoSituacao', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), 'RESTRICT', null);
    $this->addRelation('CuponsDescontoCertificadoRelatedByUsuarioId', 'CuponsDescontoCertificado', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), 'RESTRICT', null);
    $this->addRelation('CuponsDescontoCertificadoRelatedByUsuarioAutorizacaoId', 'CuponsDescontoCertificado', RelationMap::ONE_TO_MANY, array('id' => 'usuario_autorizacao_id', ), 'RESTRICT', null);
    $this->addRelation('LocalUsuario', 'LocalUsuario', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), 'RESTRICT', null);
    $this->addRelation('Importacao', 'Importacao', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), 'RESTRICT', null);
    $this->addRelation('CertificadoRelatedByUsuarioId', 'Certificado', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), 'RESTRICT', null);
    $this->addRelation('CertificadoRelatedByUsuarioValidouId', 'Certificado', RelationMap::ONE_TO_MANY, array('id' => 'usuario_validou_id', ), 'RESTRICT', null);
    $this->addRelation('ClienteHistorico', 'ClienteHistorico', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), 'RESTRICT', null);
    $this->addRelation('Contador', 'Contador', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), 'RESTRICT', null);
    $this->addRelation('ContadorDetalhar', 'ContadorDetalhar', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), 'RESTRICT', null);
    $this->addRelation('Caixa', 'Caixa', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), 'RESTRICT', null);
    $this->addRelation('Aviso', 'Aviso', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), 'RESTRICT', null);
    $this->addRelation('AvisoUsuario', 'AvisoUsuario', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), 'RESTRICT', null);
    $this->addRelation('ProspectRelatedByUsuarioId', 'Prospect', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), 'RESTRICT', null);
    $this->addRelation('ProspectRelatedBySupervisorUsuarioId', 'Prospect', RelationMap::ONE_TO_MANY, array('id' => 'supervisor_usuario_id', ), 'RESTRICT', null);
    $this->addRelation('ProspectContato', 'ProspectContato', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), 'RESTRICT', null);
    $this->addRelation('ProspectSituacao', 'ProspectSituacao', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), 'RESTRICT', null);
    $this->addRelation('ProspectAtendimento', 'ProspectAtendimento', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), 'RESTRICT', null);
    $this->addRelation('ProspectNegocio', 'ProspectNegocio', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), 'RESTRICT', null);
	} // buildRelations()

} // UsuarioTableMap
