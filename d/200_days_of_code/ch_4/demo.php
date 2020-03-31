<!DOCTYPE  html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<meta name="description" content="PHP Advanced and Object-Oriented Programming | By: Larry Ullman | Completed exercises By: David Petringa">
		<meta name="author" content="David Petringa">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<title>Creating Destructors</title>
			<link rel="stylesheet" href="../styles/my_styles.css">
		<link rel="stylesheet" href="../styles/style.css">
	</head>
	<body>
			<div class="wrapper">
		<?php 

		echo '<header>';
		echo '<h1>Creating Destructors</h1>';
		echo '<h2>Script 4.7 - demo.php</h2>';
		echo '<nav> <a href="../index.php">Home</a></nav>';
		echo '</header>';
		//require_once('../../include_2/mysqli_connect.php');
  
  	//////////***********begin code****************//////////////
			echo '<div class="main_ex">';
			
		
		//define class
		class Demo
		{
			function __construct()
			{
				echo '<p>In the constructor.</p>';
			}
		}
			//complete the class
			//define a function that creates an object
			function test()
			{
				echo '<p>In the function. Creating a new object...</p>';
				$f = new Demo();
				echo '<p>About to leave the function.</p>';
			}
			//create an object of class demo
			echo '<p>Creating a new object...</p>';
			$o = new Demo();
			//call test function
			echo '<p>Calling the function...</p>';
			test();
			echo '<p>About to delete the object...</p>';
			unset($o);
			echo '<p>End of the script.</p>';
		
		
		
		
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
