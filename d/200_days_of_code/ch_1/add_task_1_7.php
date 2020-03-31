<!DOCTYPE  html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<meta name="description" content="PHP Advanced and Object-Oriented Programming | By: Larry Ullman | Completed exercises By: David Petringa">
		<meta name="author" content="David Petringa">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<title>Add Tasks</title>
		<link rel="stylesheet" href="../styles/my_styles.css">
		<link rel="stylesheet" href="../styles/style.css">
	</head>
	<body>
		  <div class="wrapper">
		<?php 
		echo '<header>';
		echo '<h1>Add Tasks</h1>';
		echo '<h2>Script 1.7 - add_task_1_7.php</h2>';
		echo '<nav> <a href="../index.php">Home</a></nav>';
		echo '</header>';
		require_once('../../include_2/mysqli_connect.php');
  
  	//////////***********begin code****************//////////////
		 echo'<div class="main_ex">';
		
if(($_SERVER['REQUEST_METHOD'] =='POST') && !empty($_POST['task']))
	{
		if(isset($_POST['parent_id']) && filter_var($_POST['parent_id'],
		     FILTER_VALIDATE_INT, array('min_range'=>1)))
			{
				$parent_id =$_POST['parent_id'];
			}else{
				$parent_id=0;
			}
			
		//$task = mysqli_real_escape_string($dbc, strip_tags($_POST['task']));
		
		
		//$q ="INSERT INTO tasks(parent_id, task)
		//VALUES ('$parent_id', '$task')";
		////
		$q = sprintf("INSERT INTO tasks (parent_id, task)
		VALUES(%d,'%s')", $parent_id, mysqli_real_escape_string($dbc, strip_tags($_POST['task'])));
		$r = mysqli_query($dbc, $q);
		if(mysqli_affected_rows($dbc)==1)
		{
			echo '<p>The task has been added!</p>';
		}else{
			echo '<p>The task could not be added!</p>';
				echo $parent_id;
			echo $task;
		}
  }//END IF $_SERVER
		
		
	echo '<form action="add_task_1_7.php" method="post">
	      <fieldset>
	      <legend>Add a task</legend>
	      <p>Task: <input name="task" type="text" size="60" maxlength="100" required></p>
	      <p>Parent Task: <select name="parent_id"><option value="0">None</option>';
		  
		  $q ='SELECT task_id, parent_id, task 
		  FROM tasks 
		  WHERE date_completed ="0000-00-00 00:00:00"
		  ORDER BY date_added ASC';
		  $r = mysqli_query($dbc, $q);
		  
		  $tasks = array();
		  
		while (list($task_id, $parent_id, $task) = mysqli_fetch_array($r, MYSQLI_NUM))
		{
			echo "<option value = \"$task_id\">$task</option>\n";
			$tasks[] = array('task_id' => $task_id, 'parent_id' =>$parent_id, 'task' => $task);
		}
			echo '</select></p>
			
			<input name="submit" type ="submit" value="Add This Task">
		 </fieldset>
		 </form>';
		 
		 function parent_sort($x, $y)
		 {
		 	return ($x['parent_id'] > $y['parent_id']);
		 }

		usort($tasks, 'parent_sort');
		echo '<h2>Current To_do List</h2><ul>';
		foreach ($tasks as $task)
			{
				echo "<li>{$task['task']}</li>\n";
			}
		echo '<ul>';
		
			echo '</div>';

	include('../includes/footer.html');		
/**********************This link to stat counter works*************************/
 include('../../stats.html');
/******************************************************************************/
		?>
 </div>
	</body>
</html>
