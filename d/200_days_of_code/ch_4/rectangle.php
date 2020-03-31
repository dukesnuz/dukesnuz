<?php
//Use $this Variable
//Script 4.3 - rectangle.php
	
		//define the class
		class Rectangle
		{
			//Declare the attributes
			public $width = 0;
			public $height = 0;
			
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
