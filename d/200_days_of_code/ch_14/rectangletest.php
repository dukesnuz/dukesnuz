<?php //script 14.1 and 14.3- rectangletest.php
echo '<h1>Unit Testing Script 14.1';
echo '<h1>Setting Up Tests Script 14.3</h1>';

require('rectangle.php');
/*
//define test class
class RectangleTest extends PHPunit_Framework_TestCase{
	
	//add attribute that will store a Rectangle object
	protected $r;
	
	//define set up method
	function setUp()
	{
		$this->r = new Rectangle(8,9);
	} 
	
	//script 14.1
	//define get area test
	/*function testGetArea(){
		//create rectangle object
		$r = new Rectangle(8,9);
		//define assertion
		$this->assertEquals(72,$r->getArea() );
		//$this->assertEquals(72,72);
	}//END of testGetArea() method
}//END of rectangleTest.php
*/
/*
//script 14.3
	//define get area test
	function testGetArea(){
		//create rectangle object
		//$r = new Rectangle(8,9);
		//define assertion
		//$this->assertEquals(72,$r->getArea() );
		
		
		//$this->assertEquals(72,$this->r->getArea());
		$this->assertEquals(72,72);
	}//END of testGetArea() method
}//END of rectangleTest.php

//define gwtPerimeter()
function testGetPerimeter()
	{
		$this->assertEquals(34,$this->r->getPerimeter());
	}
	
//define is square test
function testIsSquare()
	{
		$this->assertFalse($this->r->isSquare());
		$this->r->setSize(5,5);
		$this->assertTrue($this->r->isSquare());
	}
	
//define setSize()
function testSize()
	{
 		$w= 5;
		$h= 8;
		$this->r->setSize($w,$h);
		$this->assertEquals($w,$this->r->width);
		$this->assertEquals($h,$this->r->height);		
	}
///END script 14.3