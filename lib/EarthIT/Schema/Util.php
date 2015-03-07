<?php

class EarthIT_Schema_Util
{
	public static function getFields( EarthIT_Schema_ResourceClass $rc, array $names ) {
		$fields = [];
		$allFields = $rc->getFields();
		foreach( $names as $n ) {
			if( !isset($allFields[$n]) ) {
				throw new Exception("No such field '$n' on '".$rc->getName()."'");
			}
			$fields[] = $allFields[$n];
		}
		return $fields;
	}
	
	public static function getPrimaryKeyFields( EarthIT_Schema_ResourceClass $rc, $default=null ) {
		$pk = $rc->getPrimaryKey();
		$fieldNames = $pk === null ? [] : $pk->getFieldNames();
		if( count($fieldNames) == 0 ) {
			if( $default === null ) throw new Exception("No primary key fields on ".$rc->getName());
			return $default;
		}
		return self::getFields($rc, $fieldNames);
	}
}
