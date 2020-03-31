<!DOCTYPE  html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<meta name="description" content="PHP Advanced and Object-Oriented Programming | By: Larry Ullman | Completed exercises By: David Petringa">
		<meta name="author" content="David Petringa">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<title>iterator interface</title>
			<link rel="stylesheet" href="../styles/my_styles.css">
		<link rel="stylesheet" href="../styles/style.css">
	</head>
	<body>
			<div class="wrapper">
		<?php 

		echo '<header>';
		echo '<h1>Iterator Interface</h1>';
		echo '<h2>Script 8.9 - iterator.php</h2>';
		echo '<nav> <a href="../index.php">Home</a></nav>';
		echo '</header>';
		//require_once('../../include_2/mysqli_connect.php');
        echo '<div class="main_ex">';
  	//////////***********begin code****************//////////////
  	class Department implements Iterator {
    private $_name;
    private $_employees;

    // For tracking iterations:
    private $_position = 0;
    
    function __construct($name) {
        $this->_name = $name;
        $this->_employees = array();
        $this->_position = 0;
    }
    function addEmployee(Employee $e) {
        $this->_employees[] = $e;
        echo "<p>{$e->getName()} has been added to the {$this->_name} department.</p>";
    }

    // Required by Iterator; returns the current value:
    function current() {
        return $this->_employees[$this->_position];
    }

    // Required by Iterator; returns the current key:
    function key() {
        return $this->_position;
    }
    
    // Required by Iterator; increments the position:
    function next() {
        $this->_position++;
    }

    // Required by Iterator; returns the position to the first spot:
    function rewind() {
        $this->_position = 0;
    }

    // Required by Iterator; returns a Boolean indiating if a value is indexed at this position:
    function valid() {
        return (isset($this->_employees[$this->_position]));
    }
    
} // End of Department class.

class Employee {
    private $_name;
    function __construct($name) {
        $this->_name = $name;
    }
    function getName() {
        return $this->_name;
    }
} // End of Employee class.

# ***** END OF CLASSES ***** #

// Create a department:
$hr = new Department('Human Resources');

// Create employees:
$e1 = new Employee('Jane Doe');
$e2 = new Employee('John Doe');

// Add the employees to the department:
$hr->addEmployee($e1);
$hr->addEmployee($e2);

// Loop through the department:
echo "<h2>Department Employees</h2>";
foreach ($hr as $e) {
    echo "<p>{$e->getName()}</p>";
}

// Delete the objects:
unset($hr, $e1, $e2);
		//declare dept class
/****************my code below cannot find error*****************
 * 		class Department implements Iterator{
			private $_name;
			private $_employees;
			
			//for tracking iterations
			private $_position =0;
			
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
	  // Required by Iterator; returns the current value:
    function current() {
        return $this->_employees[$this->_position];
    }

    //  returns the current key:
    function key() {
        return $this->_position;
    }
    
    // increments the position:
    function next() {
        $this->_position++;
    }

    //  returns the position to the first spot:
    function rewind() {
        $this->_position = 0;
    }

    // Iterator:
    function valid() {
        return (isset($this->_employees[$this->_position]));
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
		echo "<h2>Department Employees</h2>";
			
			
			foreach($hr as $e)
			{
				echo "<p>{$e->getName()}</p>";
			}	

			echo "END";
		unset($hr,$e1,$e2,$e3);
	*/
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
