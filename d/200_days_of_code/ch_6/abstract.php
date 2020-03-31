<!DOCTYPE  html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<meta name="description" content="PHP Advanced and Object-Oriented Programming | By: Larry Ullman | Completed exercises By: David Petringa">
		<meta name="author" content="David Petringa">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<title>Abstract Classes and Methods</title>
		<link rel="stylesheet" href="../styles/my_styles.css">
		<link rel="stylesheet" href="../styles/style.css">
	</head>
	<body>
			<div class="wrapper">
		
<?php 

		echo '<header>';
		echo '<h1>Abstract Classes and Methods</h1>';
		echo '<h2>scripts 6.1,6.2,6.3</h2>';
		echo '<nav> <a href="../index.php">Home</a></nav>';
		echo '</header>';
	//require_once('../../include_2/mysqli_connect.php');
  		echo '<div class="main_ex">';
  	//////////***********begin code****************//////////////		
	
	require('shape.php');
	require('triangle.php');
	
	//set the sides
    $side1 = 5;
	$side2 = 10;
	$side3 = 13;
	
	echo "<h2>With sides of $side1, $side2 & $side3...</h2>";
	$t = new Triangle($side1,$side2, $side3);
	
	echo '<p>The area of the triangle is '.$t->getArea().'</p>';
	echo '<p>The perimeter of the triangle is '.$t->getPerimeter().'</p>';
	
	unset($t);
	
	
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