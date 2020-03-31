<!DOCTYPE  html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<meta name="description" content="PHP Advanced and Object-Oriented Programming | By: Larry Ullman | Completed exercises By: David Petringa">
		<meta name="author" content="David Petringa">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<title>auto load</title>
		<link rel="stylesheet" href="../styles/my_styles.css">
		<link rel="stylesheet" href="../styles/style.css">
	</head>
	<body>
			<div class="wrapper">
		<?php 

		echo '<header>';
		echo '<h1>Factory Pattern</h1>';
		echo '<h2>Script 8.10 - autoload.php</h2>';
		echo '<nav> <a href="../index.php">Home</a></nav>';
		echo '</header>';
		//require_once('../../include_2/mysqli_connect.php');
        echo '<div class="main_ex">';
  	//////////***********begin code****************//////////////
 echo "<a href ='autoload.php?shape=rectangle&dimensions[]=10&dimensions[]=14'>Dimensions for a Rectangle</a>";
 echo "<a href='autoload.php?shape=triangle&dimensions[]=10&dimensions[]=14&dimensions[]=14'>Dimensions for a Triangle</a>";
 
			//require('shapefactory.php');
			//require('shape.php');
			//require('triangle.php');
			//require('tDebug.php');
			//require('rectangle.php');
			//create autoloader
			function class_loader($class)
			{
				require($class . '.php');
			}
			spl_autoload_register('class_loader');
			
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
