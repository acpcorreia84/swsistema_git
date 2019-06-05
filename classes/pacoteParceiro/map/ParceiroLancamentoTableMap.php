<?php


/**
 * This class defines the structure of the 'parceiro_lancamento' table.
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
class ParceiroLancamentoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pacoteParceiro.map.ParceiroLancamentoTableMap';

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
		$this->setName('parceiro_lancamento');
		$this->setPhpName('ParceiroLancamento');
		$this->setClassname('ParceiroLancamento');
		$this->setPackage('pacoteParceiro');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('DATA_LANCAMENTO', 'DataLancamento', 'TIMESTAMP', true, null, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'VARCHAR', true, 150, null);
		$this->addColumn('TIPO_LANCAMENTO', 'TipoLancamento', 'CHAR', true, 1, null);
		$this->addColumn('VALOR', 'Valor', 'FLOAT', true, null, null);
		$this->addColumn('OBSERVACAO', 'Observacao', 'VARCHAR', true, 150, null);
		$this->addForeignKey('PARCEIRO_COMISSIONAMENTO_ID', 'ParceiroComissionamentoId', 'INTEGER', 'parceiro_comissionamento', 'ID', true, null, null);
		$this->addColumn('SITUACAO', 'Situacao', 'INTEGER', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('ParceiroComissionamento', 'ParceiroComissionamento', RelationMap::MANY_TO_ONE, array('parceiro_comissionamento_id' => 'id', ), 'RESTRICT', null);
	} // buildRelations()

} // ParceiroLancamentoTableMap
