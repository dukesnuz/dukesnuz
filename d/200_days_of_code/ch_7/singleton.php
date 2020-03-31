<!DOCTYPE  html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<meta name="description" content="PHP Advanced and Object-Oriented Programming | By: Larry Ullman | Completed exercises By: David Petringa">
		<meta name="author" content="David Petringa">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<title>singleton pattern</title>
		<link rel="stylesheet" href="../styles/my_styles.css">
		<link rel="stylesheet" href="../styles/style.css">
	</head>
	<body>
			<div class="wrapper">
		<?php 

		echo '<header>';
		echo '<h1>Singleton Pattern</h1>';
		echo '<h2>Script 7.1 & 7.2 - singleton.php</h2>';
		echo '<nav> <a href="../index.php">Home</a></nav>';
		echo '</header>';
		//require_once('../../include_2/mysqli_connect.php');
        echo '<div class="main_ex">';
  	//////////***********begin code****************//////////////
			require('config.php');
			
			$CONFIG = Config::getInstance();
			$CONFIG->set('live','true');
			
			echo '<p>$CONFIG["live"]:'.$CONFIG->get('live').'</p>';
			
			$TEST = Config::getInstance();
			echo '<p>$TEST["live"]:'.$TEST->get('live').'</p>';
			
			unset($CONFIG, $TEST);
			
			
			
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
