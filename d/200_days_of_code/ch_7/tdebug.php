<?php
//Script 6.5 - tDebug.php

//define the trait

trait tDebug{
	//define dump object
	public function dumpObject(){
		$class = get_class($this);
		
		//get objects attributes and methods
		$attributes = get_object_vars($this);
		$methods = get_class_methods($this);
		
		echo "<h2>Information about the $class object</h2>";
		
		//print attributes
		echo '<h3>Attributes</h3><ul>';
		foreach ($attributes as $k=>$v)
		{
			echo "<li>$k:$v</li>";
		}
		echo '</li></ul>';
		
		//print methods
		echo '<h3>Methods</h3><ul>';
		foreach ($methods as $v)
		{
			echo "<li>$v</li>";
		}
		echo '</li></ul>';
	}//END of dumpObject method
}//END of tDebug trait
