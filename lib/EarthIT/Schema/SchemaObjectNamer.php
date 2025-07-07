<?php

/**
 * Naming convention enforcer.
 * @unstable
 */
interface EarthIT_Schema_SchemaObjectNamer
{
	/** Generic 'format this name' method */
	public function formatName( $name, $plural=false, EarthIT_Schema|null $s=null );
	public function formatTypeName( $name, $plural=false, EarthIT_Schema|null $s=null );
	public function formatPropertyName( $name, $plural=false, EarthIT_Schema|null $s=null );
	/** Generic 'come up with a name for this thing' method */
	public function name( EarthIT_Schema_SchemaObject $obj, $plural=false, EarthIT_Schema|null $s=null );
	public function fieldName(
		EarthIT_Schema_Field $field, $plural=false,
		EarthIT_Schema_ResourceClass|null $rc=null, EarthIT_Schema|null $s=null );
	public function referenceName(
		EarthIT_Schema_Reference $ref, $plural=false,
		EarthIT_Schema_ResourceClass|null $originRc=null, EarthIT_Schema|null $s=null );
	public function indexName(
		EarthIT_Schema_Index $index, $plural=false,
		EarthIT_Schema_ResourceClass|null $originRc=null, EarthIT_Schema|null $s=null );
	public function className(
		EarthIT_Schema_ResourceClass|null $rc=null, $plural=false,
		EarthIT_Schema|null $s=null );
	// __invoke( EarthIT_Schema_SchemaObject $obj, $plural=false, EarthIT_Schema $s=null ) should be aliased to 'name'
}
