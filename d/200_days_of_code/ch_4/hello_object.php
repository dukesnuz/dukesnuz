<!DOCTYPE  html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<meta name="description" content="PHP Advanced and Object-Oriented Programming | By: Larry Ullman | Completed exercises By: David Petringa">
		<meta name="author" content="David Petringa">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<title>Hello, world!</title>
		<link rel="stylesheet" href="../styles/my_styles.css">
		<link rel="stylesheet" href="../styles/style.css">
	</head>
	<body>
			<div class="wrapper">
		<?php 

		echo '<header>';
		echo '<h1>Defining a class-Creating an Object</h1>';
		echo '<h2>Script 4.1 & 4.2 - hello_object.php</h2>';
		//crrating an object
		echo '<nav> <a href="../index.php">Home</a></nav>';
		echo '</header>';
		//require_once('../../include_2/mysqli_connect.php');
  
  	//////////***********begin code****************//////////////
			echo '<div class="main_ex">';
//include classs function
require('helloworld.php');

//create object
$obj = new HelloWorld();

//invoke sayHello method
$obj->sayHello();
$obj->sayHello('Italian');
$obj->sayHello('Dutch');
$obj->sayHello('French');

//delete object and complete the page
unset($obj);




			
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
