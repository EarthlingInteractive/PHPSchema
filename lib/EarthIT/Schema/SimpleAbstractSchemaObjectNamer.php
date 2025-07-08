<?php

/**
 * A namer that implements all of its
 * *Name functions using an abstract 'formatName'( $name, $plural=false, EarthIT_Schema $s=null ) function
 */
abstract class EarthIT_Schema_SimpleAbstractSchemaObjectNamer
implements EarthIT_Schema_SchemaObjectNamer
{
	public abstract function formatName( $name, $plural=false, EarthIT_Schema|null $s=null );

	public function formatTypeName( $name, $plural=false, EarthIT_Schema|null $s=null ) {
		return $this->formatName( $name, $plural, $s );
	}
	
	public function formatPropertyName( $name, $plural=false, EarthIT_Schema|null $s=null ) {
		return $this->formatName( $name, $plural, $s );
	}

	public function name( EarthIT_Schema_SchemaObject $obj, $plural=false, EarthIT_Schema|null $s=null ) {
		return $this->formatName( $obj->getName(), $plural, $s );
	}
	
	public function __invoke( EarthIT_Schema_SchemaObject $obj, $plural=false, EarthIT_Schema|null $s=null ) {
		return $this->name( $obj, $plural, $s );
	}
	
	public function fieldName(
		EarthIT_Schema_Field $field, $plural=false, EarthIT_Schema_ResourceClass|null $rc=null, EarthIT_Schema|null $s=null
	) {
		return $this->__invoke( $field, $plural, $s );
	}
	
	public function referenceName(
		EarthIT_Schema_Reference $ref, $plural=false, EarthIT_Schema_ResourceClass|null $originRc=null, EarthIT_Schema|null $s=null
	) {
		return $this->__invoke( $ref, $plural, $s );
	}
	
	public function indexName(
		EarthIT_Schema_Index $index, $plural=false, EarthIT_Schema_ResourceClass|null $originRc=null, EarthIT_Schema|null $s=null
	) {
		return $this->__invoke( $index, $plural, $s );
	}
	
	public function className( EarthIT_Schema_ResourceClass|null $rc=null, $plural=false, EarthIT_Schema|null $s=null ) {
		return $this->__invoke( $rc, $plural, $s );
	}
}
