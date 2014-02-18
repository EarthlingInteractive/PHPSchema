<?php

class EarthIT_Schema_SchemaObject
{
	protected $name;
	
	public function getName() { return $this->name; }

	public static function __set_state($arr) {
		$obj = new static();
		foreach( $arr as $k=>$v ) {
			$obj->$k = $v;
		}
		return $obj;
	}
}
