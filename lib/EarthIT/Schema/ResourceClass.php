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
	
	protected function getIdRegex() {
		$pk = $this->getPrimaryKey();
		if( $pk === null ) throw new Exception("No ID regex because no primary key for ".$this->getName().".");

		$parts = array();
		foreach( $pk->getFieldNames() as $fn ) {
			$field = $this->fields[$fn];
			$datatype = $field->getType();
			$fRegex = $datatype->getRegex();
			if( $fRegex === null ) {
				throw new Exception("Can't build ID regex because ID component field '$fn' is of type '".$datatype->getName()."', which doesn't have a regex.");
			}
			$parts[] = "($fRegex)";
		}
		return implode("-", $parts);
	}
	
	/**
	 * return array of field name => field value for the primary key fields encoded in $id
	 */
	public function idToFieldValues($id) {
		$idRegex = $this->getIdRegex();
		if( !pregMatch('/^'.$idRegex.'$/', $id, $bif) ) {
			throw new Exception("ID did not match regex /^$idRegex\$/: $id");
		}
		
		$idFieldValues = array();
		$pk = $this->getPrimaryKey();
		$i = 1;
		foreach( $pk->getFieldNames() as $fn ) {
			$field = $this->fields[$fn];
			$idFieldValues[$fn] = self::convert($bif[$i], $field->getType()->getPhpTypeName());
			++$i;
		}
		
		return $idFieldValues;
	}
}
