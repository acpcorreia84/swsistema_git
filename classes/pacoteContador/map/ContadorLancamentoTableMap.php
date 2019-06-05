<?php


/**
 * This class defines the structure of the 'contador_lancamento' table.
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
class ContadorLancamentoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteContador.map.ContadorLancamentoTableMap';

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
		$this->setName('contador_lancamento');
		$this->setPhpName('ContadorLancamento');
		$this->setClassname('ContadorLancamento');
		$this->setPackage('pacoteContador');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('DATA_LANCAMENTO', 'DataLancamento', 'TIMESTAMP', true, null, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'VARCHAR', true, 150, null);
		$this->addColumn('TIPO_LANCAMENTO', 'TipoLancamento', 'CHAR', true, 1, null);
		$this->addColumn('VALOR', 'Valor', 'FLOAT', true, null, null);
		$this->addColumn('OBSERVACAO', 'Observacao', 'VARCHAR', true, 150, null);
		$this->addForeignKey('CONTADOR_COMISSIONAMENTO_ID', 'ContadorComissionamentoId', 'INTEGER', 'contador_comissionamento', 'ID', true, null, null);
		$this->addColumn('SITUACAO', 'Situacao', 'INTEGER', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('ContadorComissionamento', 'ContadorComissionamento', RelationMap::MANY_TO_ONE, array('contador_comissionamento_id' => 'id', ), 'RESTRICT', null);
	} // buildRelations()

} // ContadorLancamentoTableMap
