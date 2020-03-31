<!DOCTYPE  html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<meta name="description" content="PHP Advanced and Object-Oriented Programming | By: Larry Ullman | Completed exercises By: David Petringa">
		<meta name="author" content="David Petringa">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<title>Square</title>
			<link rel="stylesheet" href="../styles/my_styles.css">
		<link rel="stylesheet" href="../styles/style.css">
	</head>
	<body>
			<div class="wrapper">
		<?php 

		echo '<header>';
		echo '<h1>Inheriting Constructors and Destructors</h1>';
		echo '<h2>Script 5.2 - square.php</h2>';
		echo '<nav> <a href="../index.php">Home</a></nav>';
		echo '</header>';
		//require_once('../../include_2/mysqli_connect.php');
  
  	//////////***********begin code****************//////////////
			echo '<div class="main_ex">';
			require('rectangle_4_5.php');
			//declare square class
			class Square extends Rectangle
			{
				function __construct($side= 0)
				{
				$this->width = $side;
				$this->height = $side;
				}
			}//END square class
			
			//create a rectangle and report on it
			$width = 21;
			$height = 98;
			echo "<h2>With a width of $width and a height of $height...</h2>";
			$r = new Rectangle($width, $height);
			echo '<p>This area of the rectangle is '.$r->getArea().'</p>';
			echo '<p>The perimeter of the rectangle is '. $r->getPerimeter().'</p>';
			
			$side = 60;
			echo "<h2>With each side being $side....</p>";
			$s = new Square($side);
			echo '<p>The area of the square is '.$s->getArea(). '</p>';
			echo '<p>The perimter of the square is'.$s->getPerimeter().'</p>';
			unset($r,$s);
			
			
			
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
