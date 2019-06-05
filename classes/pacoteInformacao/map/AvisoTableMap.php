<?php


/**
 * This class defines the structure of the 'aviso' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    pacoteInformacao.map
 */
class AvisoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteInformacao.map.AvisoTableMap';

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
		$this->setName('aviso');
		$this->setPhpName('Aviso');
		$this->setClassname('Aviso');
		$this->setPackage('pacoteInformacao');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('TITULO', 'Titulo', 'VARCHAR', true, 40, null);
		$this->addColumn('TEXTO', 'Texto', 'VARCHAR', true, 100, null);
		$this->addColumn('DATA_INICIAL', 'DataInicial', 'DATE', true, null, null);
		$this->addColumn('DATA_FINAL', 'DataFinal', 'DATE', true, null, null);
		$this->addColumn('SITUACAO', 'Situacao', 'INTEGER', true, null, null);
		$this->addColumn('DATA', 'Data', 'TIMESTAMP', true, null, null);
		$this->addColumn('DATA_ENVIO', 'DataEnvio', 'TIMESTAMP', false, null, null);
		$this->addForeignKey('TIPO_AVISO_ID', 'TipoAvisoId', 'INTEGER', 'tipo_aviso', 'ID', true, null, null);
		$this->addForeignKey('USUARIO_ID', 'UsuarioId', 'INTEGER', 'usuario', 'ID', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('TipoAviso', 'TipoAviso', RelationMap::MANY_TO_ONE, array('tipo_aviso_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('Usuario', 'Usuario', RelationMap::MANY_TO_ONE, array('usuario_id' => 'id', ), 'RESTRICT', null);
    $this->addRelation('AvisoUsuario', 'AvisoUsuario', RelationMap::ONE_TO_MANY, array('id' => 'aviso_id', ), 'RESTRICT', null);
	} // buildRelations()

} // AvisoTableMap
