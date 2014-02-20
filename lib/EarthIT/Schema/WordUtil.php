<?php

class EarthIT_Schema_WordUtil
{
	public static function minimize($phrase) {
		return preg_replace('#[^a-z0-9]#', '', strtolower($phrase));
	}
	
	public static function pluralize($phrase) {
		if( preg_match('/^(.*?)y$/', $phrase, $bif) ) return $bif[1].'ies'; // Well usually
		if( preg_match('/^(.*?)s$/', $phrase, $bif) ) return $bif[1].'ses';
		return $phrase.'s';
	}
	
	public static function depluralize($phrase) {
		if( preg_match('/^(.*?)ies$/', $phrase, $bif) ) return $bif[1].'y';
		if( preg_match('/^(.*?)s$/', $phrase, $bif) ) return $bif[1];
		return $phrase;
	}
	
	protected static function normalizeWords( $phrase ) {
		if( is_string($phrase) ) {
			$phrase = explode(' ', $phrase);
		}
		foreach( $phrase as $k=>$word ) {
			if( $word == 'e-mail' ) $word = 'email'; // Special camel case!
			$phrase[$k] = $word;
		}
		return $phrase;
	}
	
	public static function toPascalCase( $phrase ) {
		$words = self::normalizeWords($phrase);
		$pascalWords = array();
		foreach( $words as $word ) {
			$pascalWords[] = ucfirst($word);
		}
		return implode('', $pascalWords);
	}
	
	public static function toCamelCase( $phrase ) {
		$words = self::normalizeWords($phrase);
		$i = 0;
		$camelWords = array();
		foreach( $words as $word ) {
			$word = strtolower($word);
			$camelWords[] = $i == 0 ? $word : ucfirst($word);
			++$i;
		}
		return implode('', $camelWords);
	}
}
