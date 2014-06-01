<?php

class EarthIT_Schema_SchemaObject
{
	protected $name;
	/**
	 * Generic array of properties.
	 * array( fully namespaced property name => array( property values... ) )
	 */
	protected $properties = array();
	
	public function getName() { return $this->name; }

	public static function __set_state($arr) {
		$obj = new static();
		foreach( $arr as $k=>$v ) {
			$obj->$k = $v;
		}
		return $obj;
	}
	
	public function getProperties() {
		return $this->properties;
	}
	public function getFirstPropertyValue( $longName ) {
		if( isset($this->properties[$longName]) ) foreach($this->properties[$longName] as $v) return $v;
		return null;
	}
}
