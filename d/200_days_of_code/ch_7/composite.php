<!DOCTYPE  html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<meta name="description" content="PHP Advanced and Object-Oriented Programming | By: Larry Ullman | Completed exercises By: David Petringa">
		<meta name="author" content="David Petringa">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<title>composite classes</title>
		<link rel="stylesheet" href="../styles/my_styles.css">
		<link rel="stylesheet" href="../styles/style.css">
	</head>
	<body>
			<div class="wrapper">
		<?php 

		echo '<header>';
		echo '<h1>Composite Pattern</h1>';
		echo '<h2>Script 7.5 & 7.6 - composite.php</h2>';
		echo '<nav> <a href="../index.php">Home</a></nav>';
		echo '</header>';
		//require_once('../../include_2/mysqli_connect.php');
        echo '<div class="main_ex">';
  	//////////***********begin code****************//////////////
			require('workunit.php');
			
			//create the objects
			$alpha = new Team('Alpha');
			$john = new Employee('John');
			$cynthia = new Employee('Cynthia');
			
			$rashid = new Employee('Rashid');
			
			//Assign employees to team
			$alpha->add($john);
			$alpha->add($rashid);
			
			//assign tasks
			$alpha->assignTask('Do something great');
			$cynthia->assignTask('Do something grand');
			
			
			//complete task and remove members
			$alpha->completeTask('Do something great');
			$alpha->remove($john);
			
			unset($alpha,$john,$cynthia,$rashid);
			
			
			
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
