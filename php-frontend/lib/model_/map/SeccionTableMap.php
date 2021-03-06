<?php


/**
 * This class defines the structure of the 'seccion' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 06/02/15 21:20:20
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class SeccionTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.SeccionTableMap';

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
		$this->setName('seccion');
		$this->setPhpName('Seccion');
		$this->setClassname('Seccion');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('SEC_ID', 'SecId', 'INTEGER', true, 11, null);
		$this->addForeignKey('PAG_ID', 'PagId', 'INTEGER', 'pagina', 'PAG_ID', true, 11, null);
		$this->addColumn('SEC_IDENTIFICADOR', 'SecIdentificador', 'VARCHAR', false, 100, null);
		$this->addColumn('SEC_NOMBRE', 'SecNombre', 'VARCHAR', false, 100, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Pagina', 'Pagina', RelationMap::MANY_TO_ONE, array('pag_id' => 'pag_id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Parametro', 'Parametro', RelationMap::ONE_TO_MANY, array('sec_id' => 'sec_id', ), 'RESTRICT', 'RESTRICT');
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
			'symfony_timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
		);
	} // getBehaviors()

} // SeccionTableMap
