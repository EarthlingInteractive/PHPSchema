<?php

class EarthIT_Schema_NoSuchResourceClass extends Exception
{
	public $resourceClassName;
	
	public function __construct( $rcName ) {
		parent::__construct("No such resource class as '$rcName'");
		$this->resourceClassName = $rcName;
	}
}
