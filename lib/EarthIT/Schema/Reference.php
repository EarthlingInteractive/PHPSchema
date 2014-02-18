<?php

class EarthIT_Schema_Reference extends EarthIT_Schema_SchemaObject
{
	protected $targetClassName;
	protected $originFieldNames;
	protected $targetFieldNames;
	
	public function __construct( $fc=null, array $lf=array(), array $ff=array() ) {
		$this->targetClassName = $fc;
		$this->originFieldNames = $lf;
		$this->targetFieldNames = $ff;
	}
	
	public function getTargetClassName() {
		return $this->targetClassName;
	}
	public function getOriginFieldNames() {
		return $this->originFieldNames;
	}
	public function getTargetFieldNames() {
		return $this->targetFieldNames;
	}
}
