<?php

/**
 * A namer that names everything using a single function of ($canonicalName, $plural)
 */
class EarthIT_Schema_ConventionalSchemaObjectNamer
extends EarthIT_Schema_SimpleAbstractSchemaObjectNamer
{
	protected $nameFormatter;
	public function __construct( callable $nameFormatter ) {
		$this->nameFormatter = $nameFormatter;
	}
	
	public function formatName( $name, $plural=false, EarthIT_Schema $s=null ) {
		return call_user_func( $this->nameFormatter, $name, $plural, $s );
	}
}
