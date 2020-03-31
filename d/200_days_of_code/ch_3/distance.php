<!DOCTYPE  html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<meta name="description" content="PHP Advanced and Object-Oriented Programming | By: Larry Ullman | Completed exercises By: David Petringa">
		<meta name="author" content="David Petringa">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<title>Distance Calculator</title>
		<link rel="stylesheet" href="../styles/my_styles.css">
		<link rel="stylesheet" href="../styles/style.css">
	</head>
	<body>
		<div class="wrapper">
		<?php 
		echo '<header>';
		echo '<h1>Working With Zip Codes</h1>';
		echo '<h2>Script 3.3 - distance.php</h2>';
		echo '<nav> <a href="../index.php">Home</a></nav>';
		echo '</header>';
		require_once('../../include_2/mysqli_connect.php');
  
  	//////////***********begin code****************//////////////
  	echo '<div class="main_ex">';
  	
		$zip = "38103";
		echo "<h1>Nearest stores to $zip:</h1>";
		
		$q = "SELECT latitude, longitude
		FROM zip_codes
		WHERE zip_code= '$zip'
		AND
		latitude IS NOT NULL";
		$r = mysqli_query($dbc, $q);
		
		if(mysqli_num_rows($r) ==1)
		{
			list($lat, $long) = mysqli_fetch_array($r, MYSQLI_NUM);
			//$lat = "40.83";
			//$long = "-71.07";
			
			//create main query
		$q ="SELECT name, CONCAT_WS('<br>', address1, address2), city, state, 
			stores.zip_code, phone, ROUND(DEGREES(ACOS(SIN(RADIANS($lat)) 
			* SIN(RADIANS(latitude)) 
			+ COS(RADIANS($lat))  
			* COS(RADIANS(latitude))
			* COS(RADIANS($long - longitude)))) * 69.09) AS distance 
			FROM stores LEFT JOIN zip_codes USING (zip_code) 
			ORDER BY distance ASC LIMIT 3";
   
			$r = mysqli_query($dbc, $q);
			
			if(mysqli_num_rows($r) >0)
			{
				while($row = mysqli_fetch_array($r, MYSQLI_NUM))
				{
				  echo "<h2>$row[0]</h2><p>$row[1]<br/>"
				  .ucfirst(strtolower($row[2])).", $row[3] $row[4]<br />
				  $row[5]<br/>
				  (approximatley $row[6] miles)</p>\n";
				}//END WHILE loop
			}else{
				echo '<p class="error">No stores matched the search.</p>';
			}
		}else{
			echo '<p class="error">An invalid zip code was entered.</p>';
		}
		mysqli_close($dbc);

	echo '</div>';
	
	include('../includes/footer.html');		
/**********************This link to stat counter works*************************/
 include('../../stats.html');
/******************************************************************************/
		?>
	</div>
	</body>
</html>
