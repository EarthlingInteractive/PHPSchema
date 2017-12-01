<?php

class EarthIT_Schema_WordUtilTest extends TOGoS_SimplerTest_TestCase
{
	public function testPrefixWithAnOrA() {
		$cases = array(
			"Edward" => "an Edward",
			"oliphaunt" => "an oliphaunt",
			"piece of cheese" => "a piece of cheese",
			"Mister Alvin" => "a Mister Alvin",
		);
		foreach( $cases as $input => $expectedOutput ) {
			$this->assertEquals($expectedOutput, EarthIT_Schema_WordUtil::prefixWithAnOrA($input));
		}
	}
}
