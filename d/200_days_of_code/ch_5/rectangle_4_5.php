<?php
//Use constructors
//Script 4.5- rectangle_4_5.php
	
		//define the class
		class Rectangle
		{
			//Declare the attributes
			public $width = 0;
			public $height = 0;
			
			//added in script 4.5
			function __construct($w = 0, $h = 0)
			{
				$this->width = $w;
				$this->height = $h;
			}
			
			//END added script 4.5
			//create method for setting tectagl's dimensions
			function setSize($w = 0, $h = 0)
			{
				$this->width = $w;
				$this->height = $h;
		   }
		   //create method that calculates and returns rectangle's area
		   function getArea()
		   {
		   	return ($this->width * $this->height);
		   }
		   //create a method that calculates and return rectangle's perimeter
		   function getPerimeter()
		   {
		   	return( ($this->width + $this->height) * 2);
		   }
		   //create method indicating if square
		   function isSquare()
		   {
		   	if($this->width == $this->height)
			{
				return true;
			}else{
				return false;
			}
		   }
		}	//Complete class
