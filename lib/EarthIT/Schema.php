<?php

class EarthIT_Schema
{
	protected $resourceClasses;
	protected $resourceClassesByMinName;
	protected $resourceClassesByLongName;
	protected $resourceClassesByEntityId;
	
	public function __wakeup() {
		$this->resourceClassesByMinName = array();
		$this->resourceClassesByLongName = array();
		$this->resourceClassesByEntityId = array();
		foreach( $this->resourceClasses as $rc ) {
			$min = EarthIT_Schema_WordUtil::minimize($rc->getName());
			$this->resourceClassesByMinName[$min] = $rc;
			if( ($longName = $rc->getLongName()) !== null ) {
				$this->resourceClassesByLongName[$longName] = $rc;
			}
			foreach( $rc->getPropertyValues("http://ns.nuke24.net/Phrebar/entityId") as $entityId ) {
				$this->resourceClassesByEntityId[$entityId] = $rc;
			}
		}
	}
	
	public function getResourceClasses() {
		return $this->resourceClasses;
	}
	
	public function getResourceClass($name) {
		if( isset($this->resourceClassesByLongName[$name]) ) {
			return $this->resourceClassesByLongName[$name];
		}
		$min = EarthIT_Schema_WordUtil::minimize($name);
		if( isset($this->resourceClassesByMinName[$min]) ) {
			return $this->resourceClassesByMinName[$min];
		}
		if( isset($this->resourceClassesByEntityId[$name]) ) {
			return $this->resourceClassesByEntityId[$name];
		}
		throw new EarthIT_Schema_NoSuchResourceClass($name);
	}
	
	public static function __set_state($arr) {
		$obj = new static();
		foreach( $arr as $k=>$v ) {
			$obj->$k = $v;
		}
		$obj->__wakeup();
		return $obj;
	}
}
