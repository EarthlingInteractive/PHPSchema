<?php

class EarthIT_Schema_SchemaObject
{
	protected $name;
	protected $longName;
	
	/**
	 * Generic array of properties.
	 * array( fully namespaced property name => array( property values... ) )
	 */
	protected $properties = array();
	
	public function getName() { return $this->name; }
	public function getLongName() { return $this->getFirstPropertyValue(EarthIT_Schema_NS::LONG_NAME); }
	
	public static function __set_state($arr) {
		$obj = new static();
		foreach( $arr as $k=>$v ) {
			$obj->$k = $v;
		}
		$obj->__wakeup();
		return $obj;
	}
	
	public function __wakeup() { }
	
	public function getProperties() {
		return $this->properties;
	}
	public function getPropertyValues( $longName ) {
		if( isset($this->properties[$longName]) ) return $this->properties[$longName];
		return array();
	}
	public function getFirstPropertyValue( $longName, $default=null ) {
		if( isset($this->properties[$longName]) ) foreach($this->properties[$longName] as $v) return $v;
		return $default;
	}
}
