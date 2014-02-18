<?php

class EarthIT_Schema_DataType extends EarthIT_Schema_SchemaObject
{
	protected $sqlTypeName;
	protected $phpTypeName;
	protected $jsTypeName;
	protected $regex;
	
	public function getSqlTypeName() { return $this->sqlTypeName; }
	public function getPhpTypeName() { return $this->phpTypeName; }
	public function getJsTypeName() { return $this->jsTypeName; }
	public function getRegex() { return $this->regex; }
}
