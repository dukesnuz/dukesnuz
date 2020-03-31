<!DOCTYPE  html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<meta name="description" content="PHP Advanced and Object-Oriented Programming | By: Larry Ullman | Completed exercises By: David Petringa">
		<meta name="author" content="David Petringa">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">
          
		<title>Display Results Horizontally</title>
		<link rel="stylesheet" href="../styles/my_styles.css">
		<link rel="stylesheet" href="../styles/style.css">
	</head>
	<body>
		<div class="wrapper">
		<?php 
		echo '<header>';
		echo '<h1>Display Results Horizontally</h1>';
		echo '<h2>Script 3.4 - distance.php</h2>';
		echo '<nav> <a href="../index.php">Home</a></nav>';
		echo '</header>';
		require_once('../../include_2/mysqli_connect.php');
  
  echo '<div class="main_ex">';
  	//////////***********begin code****************//////////////
  	$state = 'Tn';
	$items = 5;
	
	echo "<h1>Cities and Zip Codes found in $state</h2>";
	$q ="SELECT city, zip_code 
	     FROM zip_codes
	     WHERE state = '$state'
	   ORDER BY city ";
	$r = mysqli_query($dbc, $q);
  if(mysqli_num_rows($r) > 0)
  {
  		echo '<table border="2" width="90%" cellspacing="3" cellpadding="3" align="center">';
  		$i = 0;
  		while(list($city, $zip_code) = mysqli_fetch_array($r, MYSQLI_NUM))
		{
			if($i==0)
			{
				echo '<tr>';
			}
			echo "<td align=\"center\">$city, $zip_code</td>";
			$i++;
			if($i ==$items)
			{
				echo '</tr>';
				$i= 0;
			}
		}//END while loop
			
			if($i>0)
			{
				for(;$i <$items; $i++)
				{
					echo "<td>&nbsp;</td>\n";
				}
				echo '</tr>';
			}
			echo '</table>';
}else{
		echo '<p class="error">An invalid state abbreviation was used.</p>';
}//END of main IF
		mysqli_close($dbc);
		
  	
	
	//////////***********end code****************//////////////
	echo '</div>';
	
	include('../includes/footer.html');		
/**********************This link to stat counter works*************************/
 include('../../stats.html');
/******************************************************************************/
		?>
	</div>
	</body>
</html>
