<?php

/**
 * Naming convention enforcer.
 * @unstable
 */
interface EarthIT_Schema_SchemaObjectNamer
{
	/** Generic 'come up with a name for this thing' method */
	public function __invoke( EarthIT_Schema_SchemaObject $obj, $plural=false, EarthIT_Schema $s=null );
	public function typeName( $name, $plural=false, EarthIT_Schema $s );
	public function propertyName( $name, $plural=false, EarthIT_Schema $s );
	public function fieldName(
		EarthIT_Schema_Field $field, $plural=false,
		EarthIT_Schema_ResourceClass $rc=null, EarthIT_Schema $s=null );
	public function referenceName(
		EarthIT_Schema_Reference $ref, $plural=false,
		EarthIT_Schema_ResourceClass $originRc=null, EarthIT_Schema $s );
	public function indexName(
		EarthIT_Schema_Index $index, $plural=false,
		EarthIT_Schema_ResourceClass $originRc=null, EarthIT_Schema $s=null );
	public function className(
		EarthIT_Schema_ResourceClass $rc, $plural=false,
		EarthIT_Schema $s=null );
}
