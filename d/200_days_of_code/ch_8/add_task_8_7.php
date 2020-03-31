<!DOCTYPE  html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<meta name="description" content="PHP Advanced and Object-Oriented Programming | By: Larry Ullman | Completed exercises By: David Petringa">
		<meta name="author" content="David Petringa">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<title>prepared statements</title>
		<link rel="stylesheet" href="../styles/my_styles.css">
		<link rel="stylesheet" href="../styles/style.css">
	</head>
	<body>
			<div class="wrapper">
		<?php 

		echo '<header>';
		echo '<h1>Prepared Statements</h1>';
		echo '<h2>Script 8.7 - add_task_8_7.php</h2>';
		echo '<nav> <a href="../index.php">Home</a></nav>';
		echo '</header>';
		//require_once('../../include_2/mysqli_connect.php');
        echo '<div class="main_ex">';
///////////////***********begin code****************////////////////////////
			try{
				//$pdo = new PDO('mysql:dbname=my_database;host=localhost','xxxx','yyyy');
				$pdo = new PDO('mysql:dbname=dukesnuz;localhost','dukesnuz','Stacy1964!');
				
				//check form submission
				if(($_SERVER['REQUEST_METHOD']=='POST'))
				{
					if(isset($_POST['parent_id']) && filter_var($_POST['parent_id'], FILTER_VALIDATE_INT,array('min_range'=>1)))
					{
						$parent_id = $_POST['parent_id'];
					}else{
						$parent_id=0;
					}
				
				$q = 'INSERT INTO tasks(parent_id, task)VALUES (:parent_id,:task)';
				$stmt = $pdo->prepare($q);
				if($stmt->execute(array(':parent_id'=>$parent_id,':task'=>$_POST['task'])))
				{
					echo '<p>The task has been added!</p>';
				}else{
					echo '<p>The task could not be added!</p>';
				}
				}//END of if
				//start script 8.6
				echo '<form action="add_task_8_7.php" method="post">
				<fieldset>
					<legend>Add a Task</legend>
					<p>Task:<input name="task" type="text" size="60" maxlength="100" placeholder="Grayed out so no junk can be enetered." disabled></p>
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
					      <input name="submit" type="submit" value="Add This Task" disabled>
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
