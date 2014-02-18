<?php

class EarthIT_Schema
{
	protected $resourceClasses;
	
	public function getResourceClasses() {
		return $this->resourceClasses;
	}
	
	public function getResourceClass($name) {
		$min = EarthIT_Schema_WordUtil::minimize($name);
		foreach( $this->getResourceClasses() as $k => $rc ) {
			if( EarthIT_Schema_WordUtil::minimize($k) == $min ) return $rc;
		}
		throw new EarthIT_Schema_NoSuchResourceClass($name);
	}
	
	public static function __set_state($arr) {
		$obj = new static();
		foreach( $arr as $k=>$v ) {
			$obj->$k = $v;
		}
		return $obj;
	}
}
