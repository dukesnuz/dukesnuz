<!DOCTYPE  html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<meta name="description" content="PHP Advanced and Object-Oriented Programming | By: Larry Ullman | Completed exercises By: David Petringa">
		<meta name="author" content="David Petringa">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<title>namespaces</title>
			<link rel="stylesheet" href="../styles/my_styles.css">
		<link rel="stylesheet" href="../styles/style.css">
	</head>
	<body>
			<div class="wrapper">
		<?php 

		echo '<header>';
		echo '<h1>Namespaces</h1>';
		echo '<h2>Script 6.9 & 6.10 - namespaces.php</h2>';
		echo '<nav> <a href="../index.php">Home</a></nav>';
		echo '</header>';
		//require_once('../../include_2/mysqli_connect.php');
        echo '<div class="main_ex">';
  	//////////***********begin code****************//////////////
			//include namespace file
			require('MyNamespace/company.php');
			
			//create dept object
			$hr = new \MyNamespace\Company\Department('Accounting');
			$hr = new \MyNamespace\Company\Department('Operations');
			
			
			//create 2 employees
			$e1 = new \MyNamespace\Company\Employee('Holden Caulfield');
			$e2 = new \MyNamespace\Company\Employee('Jane Gallagher');
			$e3 = new \MyNamespace\Company\Employee('David Petringa');
			
			//add employess to dept
			$hr->addEmployee($e1);
			$hr->addEmployee($e2);
			$hr->addEmployee($e3);
			
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
