<?php


/**
 * This class defines the structure of the 'cupons_desconto_certificado' table.
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
class CuponsDescontoCertificadoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteCertificado.map.CuponsDescontoCertificadoTableMap';

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
		$this->setName('cupons_desconto_certificado');
		$this->setPhpName('CuponsDescontoCertificado');
		$this->setClassname('CuponsDescontoCertificado');
		$this->setPackage('pacoteCertificado');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('PRODUTO_ID', 'ProdutoId', 'INTEGER', 'produto', 'ID', true, null, null);
		$this->addForeignKey('USUARIO_ID', 'UsuarioId', 'INTEGER', 'usuario', 'ID', true, null, null);
		$this->addForeignKey('CERTIFICADO_ID', 'CertificadoId', 'INTEGER', 'certificado', 'ID', true, null, null);
		$this->addForeignKey('USUARIO_AUTORIZACAO_ID', 'UsuarioAutorizacaoId', 'INTEGER', 'usuario', 'ID', true, null, null);
		$this->addColumn('USADO', 'Usado', 'INTEGER', false, null, null);
		$this->addColumn('VENCIMENTO', 'Vencimento', 'DATE', false, null, null);
		$this->addColumn('CPF_CNPJ', 'CpfCnpj', 'VARCHAR', true, 20, null);
		$this->addColumn('DESCONTO', 'Desconto', 'FLOAT', false, null, null);
		$this->addColumn('CODIGO_DESCONTO', 'CodigoDesconto', 'VARCHAR', true, 50, null);
		$this->addColumn('MOTIVO', 'Motivo', 'VARCHAR', true, 255, null);
		$this->addColumn('EMAIL_CLIENTE', 'EmailCliente', 'VARCHAR', true, 60, null);
		$this->addColumn('AUTORIZADO', 'Autorizado', 'INTEGER', false, null, null);
		$this->addColumn('MOTIVO_AUTORIZACAO', 'MotivoAutorizacao', 'VARCHAR', true, 255, null);
		// validators
		$this->addValidator('CODIGO_DESCONTO', 'unique', 'propel.validator.UniqueValidator', '', 'Ja existe um Codigo de Desconto cadastrado com esse codigo.');
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Produto', 'Produto', RelationMap::MANY_TO_ONE, array('produto_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('UsuarioRelatedByUsuarioId', 'Usuario', RelationMap::MANY_TO_ONE, array('usuario_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Certificado', 'Certificado', RelationMap::MANY_TO_ONE, array('certificado_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('UsuarioRelatedByUsuarioAutorizacaoId', 'Usuario', RelationMap::MANY_TO_ONE, array('usuario_autorizacao_id' => 'id', ), 'RESTRICT', null);
	} // buildRelations()

} // CuponsDescontoCertificadoTableMap
