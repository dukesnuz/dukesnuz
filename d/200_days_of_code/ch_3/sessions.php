<?php #script 3.2 - sessions.php
require('includes/db_sessions.inc.php');
?>

<!doctype html>
<html lang= "en">
	
	<head>
		<meta charset="utf-8">
		<meta name="description" content="PHP Advanced and Object-Oriented Programming | By: Larry Ullman | Completed exercises By: David Petringa">
		<meta name="author" content="David Petringa">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

			<title>DB Session Test</title>
		<link rel="stylesheet" href="../styles/my_styles.css">
		<link rel="stylesheet" href="../styles/style.css">
	</head>

	<body>
			<?php 
		//echo '<div class="wrapper">';
		
		//echo '<header>';
		echo '<h1>Storing Sessions in A Database</h1>';
		echo '<h2>Script 3.2 - sessions.php</h2>';
		//echo '<nav> <a href="../index.php">Home</a></nav>';
		//echo '</header>';
		require_once('../../include_2/mysqli_connect.php');

	//////////***********begin code****************//////////////
// echo'<div class="main_ex">';
		
		if(empty($_SESSION))
		{
			$_SESSION['blah'] = 'umlaut';
			$_SESSION['this'] = 3615684.45;
			$_SESSION['that'] = 'blue';
			
		echo '<p>Session Data Stored</p>';
		}else{
			//print currently stored session
			echo '<p>Session Data Exists: <pre>' . print_r($_SESSION, 1). '</pre></p>';
		}
		
		//create log out function
		if(isset($_GET['logout']))
		{
			session_destroy();
			echo '<p>Sesssion Destroyed.</p>';
		}else{
			echo '<a href="sessions.php?logout=true">Log Out</a>';
		}
		
		//print data
		echo '<p>Session Data:<pre>'. print_r($_SESSION, 1).'</pre></p>';


session_write_close();
//echo '</div>';

include('../includes/footer.html');	


?>
	<!--</div>-->
	</body>
</html>