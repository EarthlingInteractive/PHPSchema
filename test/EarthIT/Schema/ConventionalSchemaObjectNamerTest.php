<?php

class EarthIT_Schema_ConventionalSchemaObjectNamerTest extends TOGoS_SimplerTest_TestCase
{
	protected $namer;
	public function setUp() {
		$this->namer = new EarthIT_Schema_ConventionalSchemaObjectNamer( array($this,'formatName') );
	}
	
	public function formatName( $name, $plural=false ) {
		if( $plural ) $name = EarthIT_Schema_WordUtil::pluralize($name);
		return EarthIT_Schema_WordUtil::toCamelCase($name);
	}
	
	public function testNameStuff() {
		$rc = EarthIT_Schema_ResourceClass::__set_state( array(
			'name' => 'cheese sauce'
		) );
		
		$this->assertEquals( 'cheeseSauce', $this->namer->className($rc, false) );
		$this->assertEquals( 'cheeseSauces', $this->namer->className($rc, true) );
	}
}
