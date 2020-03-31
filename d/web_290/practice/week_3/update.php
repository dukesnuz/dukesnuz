<?php

	  include("../../includes/config.php");

	   $id = $_POST["id"];
	  //$id= 1;
	  $fname = $_POST["fname"];
	  $lname = $_POST["lname"];
	  $email = $_POST["email"];
	  
	  $sql = "UPDATE people SET 
	  people_fname = '$fname',
	  people_lname = '$lname',
	  people_email = '$email'
	  WHERE people_id= '$id' ";
	  
	  $result = mysql_query($sql);
	  header('refresh:4;url=index.php');
	  echo "Update complete...please wait";
	include('../../stats.html');
?>