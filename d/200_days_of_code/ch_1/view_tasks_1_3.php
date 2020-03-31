<!DOCTYPE  html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<meta name="description" content="PHP Advanced and Object-Oriented Programming | By: Larry Ullman | Completed exercises By: David Petringa">
		<meta name="author" content="David Petringa">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<title>View Tasks</title>
		<link rel="stylesheet" href="../styles/my_styles.css">
		<link rel="stylesheet" href="../styles/style.css">
	</head>
	<body>
		  <div class="wrapper">
		<?php 
		echo '<header>';
		echo '<h1>View Tasks</h1>';
		echo '<h2>Script 1.3 - view_tasks_1_3.php</h2>';
		echo '<nav> <a href="../index.php">Home</a></nav>';
		echo '</header>';
		require_once('../../include_2/mysqli_connect.php');
          
	
		//////////***********begin code****************//////////////
 echo'<div class="main_ex">';

   function make_list($parent){
   	global $tasks;
	echo '<ol>';
	
	foreach ($parent as $task_id => $todo){
		echo "<li>$todo";
		if(isset($tasks[$task_id])){
			make_list($tasks[$task_id]);
		}
		echo '</li>';
	}//END For each loop
	echo '</ol>';
   }//END of make_list() function
   
   $q ='SELECT task_id, parent_id, task 
   FROM tasks
   WHERE 
   date_completed ="0000-00-00 00:00:00"
   ORDER BY parent_id, date_added ASC';
   $r = mysqli_query($dbc,$q);
   
   $tasks = array();
   
   while (list($task_id, $parent_id, $task) = mysqli_fetch_array($r, MYSQLI_NUM)){
   	$tasks[$parent_id][$task_id] = $task;
   }

   echo '<pre>'. print_r($tasks, 1). '</pre>';
   
   make_list($tasks[0]);




echo '</div>';



include('../includes/footer.html');	
/**********************This link to stat counter works*************************/
 include('../../stats.html');
/******************************************************************************/
		?>
  </div>
	</body>
</html>