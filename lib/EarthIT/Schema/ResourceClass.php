<?php

class EarthIT_Schema_ResourceClass extends EarthIT_Schema_SchemaObject
{
	protected $hasRestService = false;
	protected $hasDbTable = false;
	protected $membersArePublic = false;
	protected $membersAreMutable = false;
	protected $membersSetIsMutable = false;
	
	protected $fields = array();
	protected $references = array();
	protected $indexes = array();
	
	public function hasRestService() { return $this->hasRestService; }
	public function hasDbTable() { return $this->hasDbTable; }
	public function membersArePublic() { return $this->membersArePublic; }
	public function membersAreMutable() { return $this->membersAreMutable; }
	public function membersSetIsMutable() { return $this->memberSetIsMutable; }
	
	public function getFields() { return $this->fields; }
	public function getIndexes() { return $this->indexes; }
	public function getReferences() { return $this->references; }
	
	public function getPrimaryKey() { return $this->indexes['primary']; }
}
