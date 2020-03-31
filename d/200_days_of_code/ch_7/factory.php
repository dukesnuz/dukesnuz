<!DOCTYPE  html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<meta name="description" content="PHP Advanced and Object-Oriented Programming | By: Larry Ullman | Completed exercises By: David Petringa">
		<meta name="author" content="David Petringa">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<title>factory pattern</title>
		<link rel="stylesheet" href="../styles/my_styles.css">
		<link rel="stylesheet" href="../styles/style.css">
	</head>
	<body>
			<div class="wrapper">
		<?php 

		echo '<header>';
		echo '<h1>Factory Pattern</h1>';
		echo '<h2>Script 7.3 & 7.4 - factory.php</h2>';
		echo '<nav> <a href="../index.php">Home</a></nav>';
		echo '</header>';
		//require_once('../../include_2/mysqli_connect.php');
        echo '<div class="main_ex">';
  	//////////***********begin code****************//////////////
 //http://localhost/dukesnuz/200_days_of_code/ch_7/factory.php?shape=rectangle&dimensions[]=10&dimensions[]=14
 http://localhost/dukesnuz/200_days_of_code/ch_7/factory.php?shape=triangle&dimensions[]=10&dimensions[]=14&dimensions[]=14
 echo "<a href ='factory.php?shape=rectangle&dimensions[]=10&dimensions[]=14'>Dimensions for a Rectangle</a>";
 echo "<a href='factory.php?shape=triangle&dimensions[]=10&dimensions[]=14&dimensions[]=14'>Dimensions for a Triangle</a>";
 
			require('shapefactory.php');
			require('shape.php');
			require('triangle.php');
			require('tDebug.php');
			require('rectangle.php');
			
			if(isset($_GET['shape'], $_GET['dimensions']))
			{
				$obj = ShapeFactory::Create ($_GET['shape'], $_GET['dimensions']);
				
				echo "<h2>Creating a {$_GET['shape']}...</h2>";
				
				echo '<p>The area is '.$obj->getArea().'</p>';
				
				echo '<p>The perimeter is '.$obj->getPerimeter().'</p>';
				
				}else{
					echo '<p class="error">Please provide a shape type and sizes.</p>';
			}
			unset($obj);
			
			
			
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
