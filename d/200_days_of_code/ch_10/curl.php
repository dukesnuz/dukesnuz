<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Using cURL</title>
		<link rel="stylesheet" href="styles.css">
		<!--<link rel="stylesheet" href="../styles/my_styles.css">-->
	</head>
</html>
<body>
	<h2>cURL Results</h2>
	<?php //Script 10.4 - curl.php
 	 echo '<h2>script 10.4 - Using cURL</h2>';
 	//begin cURL transaction
 	$url = 'http://dukesnuz.com/d/200_days_of_code/ch_10/service.php';
	$curl = curl_init($url);
	
	//cURL to fail if an error occurrs
	curl_setopt($curl, CURLOPT_FAILONERROR,1);
	
	//tell curl to allow for redirects
	curl_setopt($curl,CURLOPT_FOLLOWLOCATION,1);
	
	//Opt to assign the retuened data to a variable
	curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
	
	//set the timeout
	curl_setopt($curl,CURLOPT_TIMEOUT, 5);
	
	
	//tell cURL to use the POST method
	curl_setopt($curl,CURLOPT_POST,1);
	
	
	//set the POST data
	curl_setopt($curl,CURLOPT_POSTFIELDS, 'name=foo&pass=bar&format=csv');
 
	
	//execute the transaction
	$r=curl_exec($curl);
	
	//close connection
	curl_close($curl);
	
	print_r($r);
	
	
	
	
	
	
	
	
	
	
	
/**********************This link to stat counter works*************************/
 include('../../stats.html');
/******************************************************************************/
?>
</body>
</html>