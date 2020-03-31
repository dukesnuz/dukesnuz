<!DOCTYPE  html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<meta name="description" content="PHP Advanced and Object-Oriented Programming | By: Larry Ullman | Completed exercises By: David Petringa">
		<meta name="author" content="David Petringa">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<title>strategy pattern</title>
		<link rel="stylesheet" href="../styles/my_styles.css">
		<link rel="stylesheet" href="../styles/style.css">
	</head>
	<body>
			<div class="wrapper">
		<?php 

		echo '<header>';
		echo '<h1>Strategy Pattern</h1>';
		echo '<h2>Script 7.7 & 7.8 - strategy.php</h2>';
		echo '<nav> <a href="../index.php">Home</a></nav>';
		echo '</header>';
		//require_once('../../include_2/mysqli_connect.php');
        echo '<div class="main_ex">';
  	//////////***********begin code****************//////////////
			require('isort.php');
			//students list class
			class StudentsList{
				private $_stuidents = array();
				function __construct($list)
				{
					$this->_students = $list;
				}
				//define sort method
				function sort(isort $type)
				{
					$this->_students = $type->sort($this->_students);
				}
				
				//create a display() method
				
				function display()
				{
					echo '<ol>';
					foreach ($this->_students as $student)
					{
						echo "<li>{$student['name']}{$student['grade']}</li>";
					}
					echo '</ol>';
				}
			}//END of student list
			
			//create amultdimensional array
			$students = array(
			256 => array('name'=>'Jon','grade'=>98.5),
			2   => array('name'=>'Vance','grade'=>85.1),
			9 =>   array('name'=>'Stephen', 'grade'=>94.00),
			364 => array('name'=>'Steve', 'grade'=>85.1),
			68 => array('name'=>'Rob', 'grade'=>74.6),
			);
			
			$list = new StudentsList($students);
			echo '<h2>Original Array</h2>';
			$list->display();
			
			//sort alphabetically
			$list->sort(new MultiAlphaSort('name'));
			echo '<h2>Sorted by Name</h2>';
			$list->display();
			
			
			//sort numerically in descending order
			$list->sort(new MultiNumberSort('grade', 'descending'));
			
			echo '<h2>Sorted by Grade</h2>';
			$list->display();
			
			unset($list);
		
			
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
