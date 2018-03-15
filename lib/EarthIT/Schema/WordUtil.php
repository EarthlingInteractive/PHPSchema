<?php

class EarthIT_Schema_WordUtil
{
	public static function minimize($phrase) {
		return preg_replace('#[^a-z0-9]#', '', strtolower($phrase));
	}
	
	public static function pluralize($phrase) {
		if( preg_match('/(^|\W)(staff|data|buffalo|deer|elk|water)$/', $phrase) ) return $phrase;
		//if( preg_match('/^(.*?)y$/', $phrase, $bif) ) return $bif[1].'ies'; // Well usually
		if( preg_match('/^(.*?)s$/', $phrase, $bif) ) return $bif[1].'ses';
		if( preg_match('/^(.*?[sc]h)$/', $phrase, $bif) ) return $bif[1].'es';
		return $phrase.'s';
	}
	
	// It's probably a bad idea to rely on this.
	public static function depluralize($phrase) {
		//if( preg_match('/^(.*?)ies$/', $phrase, $bif) ) return $bif[1].'y';
		if( preg_match('/^(.*?[sc]h)es$/', $phrase, $bif) ) return $bif[1];
		if( preg_match('/^(.*?s)es$/', $phrase, $bif) ) return $bif[1];
		if( preg_match('/^(.*?)s$/', $phrase, $bif) ) return $bif[1];
		return $phrase;
	}
	
	// Not a full list, just good enough for now.
	protected static $splitteyPunctuation = array('-','_',',','.','/',':',';','?','!');
	protected static $otherPunctuation = array("'",'"');
	
	/**
	 * Normalize words for symbol-ifying by removing punctuation-ey
	 * characters and turning 'e-mail' into 'email'.  This is not
	 * public because it's precise meaning isn't that well defined.
	 */
	protected static function normalizeWords( $phrase, $wordTransform=null ) {
		if( is_scalar($phrase) ) {
			$phrase = explode(' ', $phrase);
		}
		$phrase2 = array();
		foreach( $phrase as $k=>$word ) {
			if( $wordTransform != null ) {
				if( is_string($wordTransform) ) {
					// so yeah like the built-in PHP functions expect only 1 argument
					$word = call_user_func($wordTransform, $word);
				} else {
					// but ours take 2.
					$word = call_user_func($wordTransform, $word, $k);
				}
			}
			if( $word == 'e-mail' ) $word = 'email'; // Special case!
			if( $word == 'e-mails' ) $word = 'emails';
			
			// Split on delimit-ey punctuation characters
			$word = str_replace(self::$splitteyPunctuation, ' ', $word);
			foreach( explode(' ',$word) as $subword ) {
				$subword = str_replace(self::$otherPunctuation,'',$subword);
				if( $subword == '' ) continue;
				$phrase2[] = $subword;
			}
		}
		return $phrase2;
	}
	
	protected static function normalizeAndDelimitWords( $phrase, $separator, $wordTransform=null ) {
		$n = implode($separator, self::normalizeWords($phrase, $wordTransform));
		return $n;
	}
	
	/** BoatyMcBoatface */
	public static function toPascalCase( $phrase ) {
		return self::normalizeAndDelimitWords($phrase, '', 'ucfirst');
	}
	
	/** The transformation to be applied to each word in a camelCased phrase */
	public static function camelWord($word, $index) {
		$word = strtolower($word);
		return $index == 0 ? $word : ucfirst($word);
	}
	
	/** boatyMcboatface; everything's forced to lowercase except for first letters of all but the first word */
	public static function toCamelCase( $phrase ) {
		return self::normalizeAndDelimitWords($phrase, '', array('EarthIT_Schema_WordUtil', 'camelWord'));
	}
	
	/** hey_its_boaty_mcboatface; lowercase, underscore-separated */
	public static function toSnakeCase($phrase) {
		return self::normalizeAndDelimitWords($phrase, '_', 'strtolower');
	}
	
	/** hey-its-boaty-mcboatface; lowercase, dash-separated */
	public static function toKebabCase($phrase) {
		return self::normalizeAndDelimitWords($phrase, '-', 'strtolower');
	}
	
	/** hey-its-Boaty-McBoatface; case of words preserved */
	public static function toDashSeparated( $phrase ) {
		return self::normalizeAndDelimitWords($phrase, '-');
	}

	/** Hey-Its-Boaty-McBoatface; every word gets ucfirsted; great for HTTP headers! */
	public static function toTrainCase( $phrase ) {
		return self::normalizeAndDelimitWords($phrase, '-', 'ucfirst');
	}
	
	/** A Boaty McBoatface */
	public static function prefixWithAnOrA( $phrase ) {
		return in_array(strtolower($phrase[0]), array('a','e','i','o','u')) ? "an $phrase" : "a $phrase";
	}
}
