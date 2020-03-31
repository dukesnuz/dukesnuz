<?php # Script 16.1 - mysqli_oop_connect.php

DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', 'salvatore');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'sitename1');

//create a mysli object
$mysqli = new MySqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

		//if error show it
		if($mysqli->connect_error)
			{
				echo $mysqli->connect_error;
				unset($mysqli);
				}else{
				//if no error establish connection
				  $mysqli->set_charset('utf8');
				}
				  
      
	  //debug objects ib php
	  
	//  echo print_r($mysqli, 1);
	// may need to add port to MySqli constructor
	//to change database use
	//$mysqli->select_db(dbname);