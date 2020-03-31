<?php
//script 6.9 company.php

//declare the namespace
namespace MyNamespace\Company;

//Define dept
class Department
{
	private $_name;
	private$_employees;
	
	function __construct($name)
	{
		$this->_name = $name;
		$this->_employees= array();
	}
	
	function addEmployee(Employee $e)
	{
		$this->_employess[] = $e;
		echo "<p>{$e->getName()} has been added to the {$this->_name} department.</p>";
	}
}//END of department class

//define employee class
class Employee{
	private $_name;
	function __construct($name)
	{
		$this->_name = $name;
	}
	function getName()
	{
		return $this->_name;
	}
}//END of employee class
