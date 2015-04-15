<?php

class EarthIT_Schema_ResourceClass extends EarthIT_Schema_SchemaObject
{
	protected $hasRestService = false;
	protected $hasDbTable = false;
	protected $membersArePublic = false;
	protected $membersAreMutable = false;
	protected $membersSetIsMutable = false;
	protected $tableNameOverride = null;
	/**
	 * An array of namespace components under which the table corresponding
	 * to this class can be found.
	 * If the database/schema will be implied by the connection, this will be an empty array.
	 * If a schema needs to be specified per-table to do queries on it, this would
	 * contain the name of the schema.
	 * If neither the database name nor the schema are implied, it would contain both.
	 * e.g. array('some_database','some_schema')
	 * A table named "some_table" would then be referred to as
	 * "some_database"."some_schema"."some_table" in SQL queries.
	 */
	protected $dbNamespacePath = array();
	
	protected $fields = array();
	protected $references = array();
	protected $indexes = array();
	
	public function hasRestService() { return $this->hasRestService; }
	public function hasDbTable() { return $this->hasDbTable; }
	public function membersArePublic() { return $this->membersArePublic; }
	public function membersAreMutable() { return $this->membersAreMutable; }
	public function membersSetIsMutable() { return $this->memberSetIsMutable; }
	public function getDbNamespacePath() { return $this->dbNamespacePath; }
	public function getTableNameOverride() { return $this->tableNameOverride; }
	
	public function getFields() { return $this->fields; }
	public function getField($name) { return $this->fields[$name]; }
	
	public function getIndexes() { return $this->indexes; }
	public function getIndex($name) { return $this->indexes[$name]; }
	
	public function getReferences() { return $this->references; }
	public function getReference($name) { return $this->references[$name]; }
	
	public function getPrimaryKey() { return $this->getIndex('primary'); }
}
