<!DOCTYPE  html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<meta name="description" content="PHP Advanced and Object-Oriented Programming | By: Larry Ullman | Completed exercises By: David Petringa">
		<meta name="author" content="David Petringa">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<title>Sorting Multidimensional Arrays</title>
		<link rel="stylesheet" href="../styles/my_styles.css">
		<link rel="stylesheet" href="../styles/style.css">
	</head>
	<body>
	  <div class="wrapper">
		<?php 
		echo '<header>';
		echo '<h1>Sorting Multidimensional Arrays</h1>';
		echo '<h2>Script 1.1 - sort_1_1.php</h2>';
		echo '<nav> <a href="../index.php">Home</a></nav>';
		echo '</header>';
		require_once('../../include_2/mysqli_connect.php');
          
		
		//////////***********begin code****************//////////////
 echo'<div class="main_ex">';
 		
		$students = array(256=>array('name'=>'Jon', 'grade'=>98.5),
		                  2 => array('name' => 'Vance', 'grade' =>85.1),
		                  9 => array('name' =>'Stephen', 'grade' =>94.0),
						  364 => array('name' =>'Steve', 'grade'=> 85.1),
						  68 => array('name'=> 'Rob', 'grade'=> 74.6)
		                  );
						  
		function name_sort($x,$y)
			{
				return strcasecmp($x['name'], $y['name']);

			}
		
		function grade_sort($x,$y)
		{
			return ($x['grade']< $y['grade']);
		}
		
		echo '<h2>Array As Is</h2><pre>'. print_r($students, 1).'</pre>';
		
		uasort($students, 'name_sort');
		
		echo '<h2>Array Sorted by Name</h2><pre>'. print_r($students, 1).' </pre>';
		
		uasort($students, 'grade_sort');
		
		echo '<h2>Array Sorted by Grade</h2><pre>'. print_r($students, 1). '</pre>';
	
	
	echo '</div>';
	
	include('../includes/footer.html');	
		
		/**********************This link to stat counter works*************************/
 include('../../stats.html');
/******************************************************************************/
		?>
		  </div>
	</body>
</html>
