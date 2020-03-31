<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Ip Geolocation</title>
		<link rel="stylesheet" href="styles.css">
		<!--<link rel="stylesheet" href="../styles/my_styles.css">-->
	</head>
</html>
<body>
	<?php //Script 10.3 - ip_geo.php
     echo '<h2>script 10.3 - IP Geolocation</h2>';
 	//define function
 	function show_ip_info($ip)
		{
			$url = 'http://freegeoip.net/csv/'.$ip;
			//$url = 'http://freegeoip.net/csv/' . $ip;
			//make request and read results
			$fp = fopen($url, 'r');
			$read = fgetcsv($fp);
			fclose($fp);
			
			//print results
			echo "<p>IP Address: $ip<br>
			Country: $read[2]<br>
			City, State: $read[5]. $read[3]<br>
			Zip Code: $read[6]<br>
			Time Zone: $read[7]<br>
			Latitude: $read[8]<br>
			Longitude: $read[9]</p>";
		}

		
		//grab user ip
		echo '<h2>Our spies tell us the following information about you</h2>';
		
		show_ip_info($_SERVER['REMOTE_ADDR']);
		 
		//idendify a URL to report on and grab its ip
		
		$url = 'www.entropy.ch';
		
		echo "<h2>Our spies tell us the following information about the URL $url</h2>";
		
		show_ip_info(gethostbyname($url));
		 
		
 	
		 
 
 
/**********************This link to stat counter works*************************/
 include('../../stats.html');
/******************************************************************************/
?>
</body>
</html>