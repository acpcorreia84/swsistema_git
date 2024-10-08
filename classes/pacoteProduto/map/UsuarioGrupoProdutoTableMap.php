<?php


/**
 * This class defines the structure of the 'usuario_grupo_produto' table.
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
class UsuarioGrupoProdutoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteProduto.map.UsuarioGrupoProdutoTableMap';

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
		$this->setName('usuario_grupo_produto');
		$this->setPhpName('UsuarioGrupoProduto');
		$this->setClassname('UsuarioGrupoProduto');
		$this->setPackage('pacoteProduto');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('GRUPO_PRODUTO_ID', 'GrupoProdutoId', 'INTEGER' , 'grupo_produto', 'ID', true, null, null);
		$this->addForeignPrimaryKey('USUARIO_ID', 'UsuarioId', 'INTEGER' , 'usuario', 'ID', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('GrupoProduto', 'GrupoProduto', RelationMap::MANY_TO_ONE, array('grupo_produto_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Usuario', 'Usuario', RelationMap::MANY_TO_ONE, array('usuario_id' => 'id', ), 'RESTRICT', null);
	} // buildRelations()

} // UsuarioGrupoProdutoTableMap
