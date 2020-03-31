<!DOCTYPE  html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<meta name="description" content="PHP Advanced and Object-Oriented Programming | By: Larry Ullman | Completed exercises By: David Petringa">
		<meta name="author" content="David Petringa">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<title>using pdo</title>
		<link rel="stylesheet" href="../styles/my_styles.css">
		<link rel="stylesheet" href="../styles/style.css">
	</head>
	<body>
			<div class="wrapper">
		<?php 

		echo '<header>';
		echo '<h1>Using PDO-Add Task</h1>';
		echo '<h2>Script 8.6 - add_task_8_6.php</h2>';
		echo '<nav> <a href="../index.php">Home</a></nav>';
		echo '</header>';
		//require_once('../../include_2/mysqli_connect.php');
        echo '<div class="main_ex">';
///////////////***********begin code****************////////////////////////
			try{
				//$pdo = new PDO('mysql:dbname=my_database;host=localhost','xxxx','yyyy');
				$pdo = new PDO('mysql:dbname=dukesnuz;localhost','dukesnuz','Stacy1964!');
				
				//start script 8.6
				echo '<form action="add_task_8_6.php" method="post">
				<fieldset>
					<legend>Add a Task</legend>
					<p>Task:<input name="task" type="text" size="60" maxlength="100" placeholder="Enter Task" ></p>
					<p>Parent Task:<select name="parent_id"><option value="0">None</option>';
					
					//run query
				
					$q = 'SELECT task_id, task FROM tasks WHERE date_completed ="0000-00-00 00:00:00" ORDER BY date_added ASC';
					
					$r = $pdo->query($q);
					//set fetch mode
					$r->setFetchMode(PDO::FETCH_NUM);
					while($row =$r->fetch())
					{
						echo "<option value=\"$row[0]\">$row[1]</option>\n";
					}
					echo '</select></p>
					      <input name="submit" type="submit" value="Add This Task">
					      </fieldset>
					      </form';
				//END script 8.6
				unset($pdo);
			}catch (PDOException $e)
			{
				echo '<p class="error">An error occurred:'.$e->getMessage().'</p>';
			}
			
			
			
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
