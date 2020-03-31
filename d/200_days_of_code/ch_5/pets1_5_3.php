<!DOCTYPE  html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<meta name="description" content="PHP Advanced and Object-Oriented Programming | By: Larry Ullman | Completed exercises By: David Petringa">
		<meta name="author" content="David Petringa">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<title>Pets</title>
			<link rel="stylesheet" href="../styles/my_styles.css">
		<link rel="stylesheet" href="../styles/style.css">
	</head>
	<body>
			<div class="wrapper">
		<?php 

		echo '<header>';
		echo '<h1>Overriding Methods</h1>';
		echo '<h2>Script 5.3 - pets1_5_3.php</h2>';
		echo '<nav> <a href="../index.php">Home</a></nav>';
		echo '</header>';
		//require_once('../../include_2/mysqli_connect.php');
  
  	//////////***********begin code****************//////////////
			echo '<div class="main_ex">';
			//declare pets class
			class Pet
			{
				public $name;
				//create constructor
				function __construct($pet_name)
				{
				$this->name = $pet_name;
				}
				
				//define eat() method
				function eat()
				{
					echo "<p>$this->name is eating.</p>";
				}
				//define sleep() method
				function sleep()
				{
					echo "<p>$this->name is sleeping.</p>";
				}
				
				//script 5.3
				function play()
				{
					echo "<p>$this->name is playing.</p>";
				}
			}//END pet class
			
			
			
			
			//declare cat class
			class Cat extends Pet
			{
				function play()
				{
					echo "<p>$this->name is climbing.</p>";
				}
			}//END of cat class
			
			//declare dog class
			class Dog extends Pet
			{
				function play()
				{
					echo "<p>$this->name is fetching.</p>";
				}
			}//END 
			
			//create 2 new pets
			$dog = new Dog('Satchel');
			$cat = new Cat('Bucky');
			$pet = new Pet('Rob');
			
			
			//make pets do the things they do
			$dog->eat();
			$cat->eat();
			$dog->sleep();
			$cat->sleep();
			//$dog->fetch();
			//$cat->climb();
		    
			//script 5.3
			$pet->eat();
			$pet->sleep();
			
			$dog->play();
			$cat->play();
			$pet->play();
			
			unset($dog,$cat,$pet);
			
			
			
			
			
			
			
			
			
			
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
