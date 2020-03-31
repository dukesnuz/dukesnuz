<?php #script 6.2 -Triangle.php
class Triangle extends Shape{
	//declare attributes
	private $_sides = array();
	private $perimeter= NULL;
	
	//define the constructor
	function __construct($s0 = 0, $s1 = 0, $s2 = 0)
	{
		$this->_sides[] = $s0;
		$this->_sides[] = $s1;
		$this->_sides[] = $s2;
		$this->_perimeter = array_sum($this->_sides);
	}
	
	//create the getArea() method
	public function getArea()
	{
		return (SQRT(($this->_perimeter/2)*
				(($this->_perimeter/2)-$this->_sides[0])*
				(($this->_perimeter/2)-$this->_sides[1])*
				(($this->_perimeter/2)-$this->_sides[2]) ));
	}
	
	//create the getPerimeter() method
	public function getPerimeter()
	{
		return $this->_perimeter;
	}//End of getPerimeter() method
	
}//End of triangel class
