<?php

/**
 * A namer that names everything using a single function of ($canonicalName, $plural)
 */
class EarthIT_Schema_ConventionalSchemaObjectNamer
implements EarthIT_Schema_SchemaObjectNamer
{
	protected $nameFormatter;
	public function __construct( callable $nameFormatter ) {
		$this->nameFormatter = $nameFormatter;
	}
	
	public function __invoke( EarthIT_Schema_SchemaObject $obj, $plural=false, EarthIT_Schema $s=null ) {
		return call_user_func( $this->nameFormatter, $obj->getName(), $plural, $s );
	}
	public function typeName( $name, $plural=false, EarthIT_Schema $s=null ) {
		return call_user_func( $this->nameFormatter, $name, $plural, $s );
	}
	public function propertyName( $name, $plural=false, EarthIT_Schema $s=null ) {
		return call_user_func( $this->nameFormatter, $name, $plural, $s );
	}
	public function fieldName(
		EarthIT_Schema_Field $field, $plural=false, EarthIT_Schema_ResourceClass $rc=null, EarthIT_Schema $s=null
	) {
		return $this->__invoke( $field, $plural, $s );
	}
	public function referenceName(
		EarthIT_Schema_Reference $ref, $plural=false, EarthIT_Schema_ResourceClass $originRc=null, EarthIT_Schema $s=null
	) {
		return $this->__invoke( $ref, $plural, $s );
	}
	public function indexName(
		EarthIT_Schema_Index $index, $plural=false, EarthIT_Schema_ResourceClass $originRc=null, EarthIT_Schema $s=null
	) {
		return $this->__invoke( $index, $plural, $s );
	}
	public function className( EarthIT_Schema_ResourceClass $rc, $plural=false, EarthIT_Schema $s=null ) {
		return $this->__invoke( $rc, $plural, $s );
	}
}
