<!DOCTYPE  html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<meta name="description" content="PHP Advanced and Object-Oriented Programming | By: Larry Ullman | Completed exercises By: David Petringa">
		<meta name="author" content="David Petringa">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<title>type hinting</title>
			<link rel="stylesheet" href="../styles/my_styles.css">
		<link rel="stylesheet" href="../styles/style.css">
	</head>
	<body>
			<div class="wrapper">
		<?php 

		echo '<header>';
		echo '<h1>type hinting</h1>';
		echo '<h2>Script 6.8 - hinting.php</h2>';
		echo '<nav> <a href="../index.php">Home</a></nav>';
		echo '</header>';
		//require_once('../../include_2/mysqli_connect.php');
        echo '<div class="main_ex">';
  	//////////***********begin code****************//////////////
		//declare dept class
		class Department{
			private $_name;
			private $_employees;
			function __construct($name)
			{
				$this->_name = $name;
				$this->_employees = array();
			}
			//define add employees() method and complete the class
			function addEmployee(Employee $e)
			{
			$this->_employee[] = $e;
			echo "<p>{$e->getName()} has been added to the {$this->_name} department.</p>";
			}
		 }//END of dept class
		
		//define Employee class
		
		class Employee
		{
			private $_name;
			function __construct($name)
			{
				$this->_name = $name;
			}
			
			function getName()
			{
				return $this->_name;
			}
		}//END of Employee class
		
		//create the dept
		$hr = new Department('Human Resources');
		$op = new Department('Operations');
		
		//create 2 employee objects
		$e1 = new Employee('Jane Doe');
		$e2 = new Employee('John Doe');
		$e3 = new Employee('David Petringa');
		
		//add employees to dept.
		$hr ->addEmployee($e1);
		$hr ->addEmployee($e2);
		$op ->addEmployee($e3);
			
		unset($hr,$e1,$e2,$e3);
////////////////************END Coding******************///////////////////
	   echo '</div>';
	   include('../includes/footer.html');		
/**********************This link to stat counter works*************************/
       include('../../stats.html');
/******************************************************************************/
	?>
	</div>
	</body>
</html>
