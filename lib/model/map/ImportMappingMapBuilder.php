<?php


/**
 * This class adds structure of 'import_mapping' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * 07/30/09 11:59:40
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class ImportMappingMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ImportMappingMapBuilder';

	/**
	 * The database map.
	 */
	private $dbMap;

	/**
	 * Tells us if this DatabaseMapBuilder is built so that we
	 * don't have to re-build it every time.
	 *
	 * @return     boolean true if this DatabaseMapBuilder is built, false otherwise.
	 */
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	/**
	 * Gets the databasemap this map builder built.
	 *
	 * @return     the databasemap
	 */
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	/**
	 * The doBuild() method builds the DatabaseMap
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap(ImportMappingPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(ImportMappingPeer::TABLE_NAME);
		$tMap->setPhpName('ImportMapping');
		$tMap->setClassname('ImportMapping');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('COLUMN', 'Column', 'SMALLINT', true, null);

		$tMap->addForeignPrimaryKey('IMPORT_FILE_TYPE', 'ImportFileType', 'INTEGER' , 'enum_item', 'ID', true, null);

		$tMap->addForeignKey('MAPPING', 'Mapping', 'INTEGER', 'enum_item', 'ID', true, null);

		$tMap->addForeignKey('RATING_FIELD_ID', 'RatingFieldId', 'INTEGER', 'rating_field', 'ID', false, null);

		$tMap->addColumn('QUESTION_RATING', 'QuestionRating', 'TINYINT', false, null);

	} // doBuild()

} // ImportMappingMapBuilder
