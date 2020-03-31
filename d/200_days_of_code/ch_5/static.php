<!DOCTYPE  html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<meta name="description" content="PHP Advanced and Object-Oriented Programming | By: Larry Ullman | Completed exercises By: David Petringa">
		<meta name="author" content="David Petringa">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<title>Static</title>
			<link rel="stylesheet" href="../styles/my_styles.css">
		<link rel="stylesheet" href="../styles/style.css">
	</head>
	<body>
			<div class="wrapper">
		<?php 

		echo '<header>';
		echo '<h1>Creating Static Members</h1>';
		echo '<h2>Script 5.6 - static.php</h2>';
		echo '<nav> <a href="../index.php">Home</a></nav>';
		echo '</header>';
		//require_once('../../include_2/mysqli_connect.php');
  
  	//////////***********begin code****************//////////////
			echo '<div class="main_ex">';
			
			//declare a pet class
			class Pet
			{
				protected $name;
				private static $_count = 0;
				
				//create constructor
				    function __construct($pet_name)
				    {
					$this->name = $pet_name;
					self::$_count++;
					}
				//create destructor
					function __destruct()
					{
						self::$_count--;
					}
				//create static method and complete class
				public static function getCount()
				{
					return self::$_count;
				}
			}//END pet class
				
				//create class cat
				class Cat extends Pet
				{
				}
				class Dog extends Pet
				{
				}
				class Ferret extends Pet
				{
				}
				class PygmyMarmoset extends Pet
				{
				}
				
				//create new object and print number of pets
				$dog = new Dog('Old Yeller');
					echo '<p>After creating a Dog, I now have '.Pet::getCount().' pet(s)</p>';
				
				$cat = new Cat('Bucky');
				echo '<p>After creating a Cat, I now have '.Pet::getCount().' pet(s)</p>';
				
				$ferret = new Ferret('Fungo');
				echo '<p>After creating a Ferret, I now have '.Pet::getCount().' pet(s).</p>';
				
				unset($dog);
				echo '<p>After tradegy strikes I now have '. Pet::getCount() .'pet(s).</p>';
				
				//recover by getting another pet
				$pygmymarmoset = new PygmyMarmoset('Toodles');
				
				echo '<p>After creating a Pygmy Marmoset, I know have '. Pet::getCount() .'pet(s).</p>';
				
				unset($cat, $ferret, $pygmymarmoset);
		
			
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
