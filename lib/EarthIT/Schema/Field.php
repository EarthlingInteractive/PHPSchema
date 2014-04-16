<?php

class EarthIT_Schema_Field extends EarthIT_Schema_SchemaObject
{
	protected $type;
	protected $isNullable;
	protected $isHidden;
	protected $columnNameOverride;
	
	public function getType() { return $this->type; }
	public function isNullable() { return $this->isNullable; }
	public function isHidden() { return $this->isHidden; }
	public function getColumnNameOverride() { return $this->columnNameOverride; }
}
