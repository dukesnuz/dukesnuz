<!DOCTYPE  html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<meta name="description" content="PHP Advanced and Object-Oriented Programming | By: Larry Ullman | Completed exercises By: David Petringa">
		<meta name="author" content="David Petringa">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<title>Visibility</title>
			<link rel="stylesheet" href="../styles/my_styles.css">
		<link rel="stylesheet" href="../styles/style.css">
	</head>
	<body>
			<div class="wrapper">
		<?php 

		echo '<header>';
		echo '<h1>Access Control aka Visibility</h1>';
		echo '<h2>Script 5.4 - visibility.php</h2>';
		echo '<nav> <a href="../index.php">Home</a></nav>';
		echo '</header>';
		//require_once('../../include_2/mysqli_connect.php');
  
  	//////////***********begin code****************//////////////
			echo '<div class="main_ex">';
			//declare test class
			class Test
			{
				public $public ='public';
				protected $protected = 'protected';
				private $_private = 'private';
				
				//add a printVar()
				function printVar($var)
				{
					echo "<p>In Test, \"$$var:'{$this->$var}'.</p>";
				}
			}//END ot test class
			
			//create class that extends test
			class LittleTest extends Test
			{
				function printVar($var)
				{
				echo "<p>In LittleTest, $$var:'{$this->$var}'.</p>";
			    }
			}//END of Littletest class
			
			
			//create object of each type
			$parent = new Test();
			$child = new LittleTest();
			
			//print current value of the $public variable by calling the printVar() method
			echo '<h1>Public</h1>';
			echo '<h2>Initially...</h2>';
			$parent->printVar('public');
			$child->printVar('public');
			
			
			//modify Test $public attributes and reprint
		    echo '<h2>Modifying $parent->public...</h2>';
			$parent->public = 'modified';
			$parent->printVar('public');
			$child->printVar('public');
			
			
			//repeat for protected variable
			echo '<hr><h1>Protected</h1>';
			echo '<h2>Initially...</h2>';
			$parent->printVar('protected');
			$child->printVar('protected');
			echo '<h2>Attempting to modify $parent->protected...</h2>';
			//creates error$parent->protected = 'modified';
			$parent->printVar('protected');
			$child->printVar('protected');
			
			unset($parent,$child);
			
			echo '</div>';
////////////////************END Coding******************///////////////////
	include('../includes/footer.html');		
/**********************This link to stat counter works*************************/
 include('../../stats.html');
/******************************************************************************/
	?>
	</div>
	</body>
</html>
