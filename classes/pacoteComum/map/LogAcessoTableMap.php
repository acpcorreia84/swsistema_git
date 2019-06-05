<?php


/**
 * This class defines the structure of the 'log_acesso' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    pacoteComum.map
 */
class LogAcessoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteComum.map.LogAcessoTableMap';

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
		$this->setName('log_acesso');
		$this->setPhpName('LogAcesso');
		$this->setClassname('LogAcesso');
		$this->setPackage('pacoteComum');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('USUARIO_ID', 'UsuarioId', 'INTEGER', 'usuario', 'ID', false, null, null);
		$this->addColumn('ACAO', 'Acao', 'VARCHAR', false, 50, null);
		$this->addColumn('IP', 'Ip', 'VARCHAR', false, 120, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'VARCHAR', false, 120, null);
		$this->addColumn('DATA', 'Data', 'TIMESTAMP', false, null, null);
		$this->addColumn('TELA', 'Tela', 'VARCHAR', false, 50, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Usuario', 'Usuario', RelationMap::MANY_TO_ONE, array('usuario_id' => 'id', ), 'RESTRICT', null);
	} // buildRelations()

} // LogAcessoTableMap
