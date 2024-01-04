<?php
use PHPUnit\Framework\TestCase;

class EarthIT_Schema_WordUtilTest extends TestCase
{
	protected function _testTransform( $transform, $cases ) {
		foreach( $cases as $input => $expectedOutput ) {
			$this->assertEquals($expectedOutput, call_user_func($transform, $input));
		}
	}
	
	public function testPrefixWithAnOrA() {
		$this->_testTransform( array('EarthIT_Schema_WordUtil','prefixWithAnOrA'), array(
			"Edward" => "an Edward",
			"oliphaunt" => "an oliphaunt",
			"piece of cheese" => "a piece of cheese",
			"Mister Alvin" => "a Mister Alvin",
			'斑马' => 'a 斑马',
		));
	}
	
	public function testToCamelCase() {
		$this->_testTransform( array('EarthIT_Schema_WordUtil','toCamelCase'), array(
			'e-mail' => 'email',
			'Three times five' => 'threeTimesFive',
			"WHATEVER YOU DON'T EVEN CARE" => 'whateverYouDontEvenCare',
			"I'm leaving, for good!!!! and I'm taking Jerry with me!" => 'imLeavingForGoodAndImTakingJerryWithMe',
			"你好, what's up?" => '你好WhatsUp',
		));
	}

	public function testToPasclCase() {
		$this->_testTransform( array('EarthIT_Schema_WordUtil','toPascalCase'), array(
			'e-mail' => 'Email',
			'Three times five' => 'ThreeTimesFive',
			"WHATEVER YOU DON'T EVEN CARE" => 'WHATEVERYOUDONTEVENCARE',
			"I'm leaving, for good!!!! and I'm taking Jerry with me!" => 'ImLeavingForGoodAndImTakingJerryWithMe',
			"你好, what's up?" => '你好WhatsUp'
		));
	}
	
	public function testToSnakeCase() {
		$this->_testTransform( array('EarthIT_Schema_WordUtil','toSnakeCase'), array(
			'e-mail' => 'email',
			'Three times five' => 'three_times_five',
			"WHATEVER YOU DON'T EVEN CARE" => 'whatever_you_dont_even_care',
			"I'm leaving, for good!!!! and I'm taking Jerry with me!" => 'im_leaving_for_good_and_im_taking_jerry_with_me',
			"你好, what's up?" => '你好_whats_up',
		));
	}
	
	public function testOxFordList() {
		$this->assertEquals('', EarthIT_Schema_WordUtil::oxfordlyFormatList(array()));
		$this->assertEquals('Mr. McFeely', EarthIT_Schema_WordUtil::oxfordlyFormatList(array('Mr. McFeely')));
		$this->assertEquals('Lady Elaine and Daniel Striped Tiger',
			EarthIT_Schema_WordUtil::oxfordlyFormatList(array('Lady Elaine','Daniel Striped Tiger')));
		$this->assertEquals('King Friday, Henrietta Pussycat, and Cornflake S. Pecially',
			EarthIT_Schema_WordUtil::oxfordlyFormatList(array(
				'King Friday','Henrietta Pussycat','Cornflake S. Pecially')));
		$this->assertEquals('Prince Tuesday or Purple Panda',
			EarthIT_Schema_WordUtil::oxfordlyFormatList(array('Prince Tuesday', 'Purple Panda'), 'or'));
	}
}
