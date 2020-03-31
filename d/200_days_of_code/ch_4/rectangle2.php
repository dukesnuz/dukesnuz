<!DOCTYPE  html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<meta name="description" content="PHP Advanced and Object-Oriented Programming | By: Larry Ullman | Completed exercises By: David Petringa">
		<meta name="author" content="David Petringa">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<title>Rectangle</title>
			<link rel="stylesheet" href="../styles/my_styles.css">
		<link rel="stylesheet" href="../styles/style.css">
	</head>
	<body>
			<div class="wrapper">
		<?php 

		echo '<header>';
		echo '<h1>Creating Constructors</h1>';
		echo '<h2>Script 4.5 & 4.6 - rectangle2.php</h2>';
		echo '<nav> <a href="../index.php">Home</a></nav>';
		echo '</header>';
		//require_once('../../include_2/mysqli_connect.php');
    
  	//////////***********begin code****************//////////////
			echo '<div class="main_ex">';
			
			//include class definition
			require('rectangle_4_5.php');
			//define variables and print introduction
			$width = 160;
			$height=75;
			echo "<h2>With a width of $width and a height of $height...</h2>";
			
			//create object and assign tectangle's dimensions
			$r = new Rectangle();
			//$r ->setSize($width,$height);
			//added for script 4.5
			$r = new Rectangle($width, $height);
			
			
			//print rectangle's area
			echo '<p>The area of the rectangle is '. $r->getArea() . '</p>';
			//print rectangle's perimeter
			echo '<p>The perimeter of the rectangle is '.$r->getPerimeter() .'</p>';
			//indicate if is square
			echo '<p>This rectangle is ';
			if($r->isSquare())
			{
				echo 'also';
			}else{
				echo 'not';
			}
			echo ' a square.</p>';
			//delete the object
			unset($r);
			
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
