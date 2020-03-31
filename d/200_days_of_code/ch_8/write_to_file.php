<!DOCTYPE  html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<meta name="description" content="PHP Advanced and Object-Oriented Programming | By: Larry Ullman | Completed exercises By: David Petringa">
		<meta name="author" content="David Petringa">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<title>handling exceptions</title>
		<link rel="stylesheet" href="../styles/my_styles.css">
		<link rel="stylesheet" href="../styles/style.css">
	</head>
	<body>
			<div class="wrapper">
		<?php 

		echo '<header>';
		echo '<h1>Handling Exceptions</h1>';
		echo '<h2>Script 8.1 & 8.2 -  write_to_file.php</h2>';
		echo '<nav> <a href="../index.php">Home</a></nav>';
		echo '</header>';
		//require_once('../../include_2/mysqli_connect.php');
        echo '<div class="main_ex">';
///////////////***********begin code****************////////////////////////
			require('writetofile.php');
		
			//begin try block
			try{
				//create object
				$fp = new WriteToFile('error_data.txt');
				//attempt to write
				$fp->write('This is a line of data.');
				$fp->close();
				unset($fp);
				echo '<p>The data has been written.</p>';
			}catch(Exception $e)
			{
				echo '<p>The process could not be completed because:'.$e->getMessage().'</p>';
			}
			echo '<p>This is the end of the script.</p>';
			
			
			
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
