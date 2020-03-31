<?php
include("../../includes/config.php");

$update="INSERT into people(people_fname, people_lname, people_email)
		VALUES('".$_POST['fname']."', '".$_POST['lname']."', '".$_POST['email']."')";


	$results = mysql_query($update) or die(mysql_error());
	header("location:index.php");

	
 include('../../stats.html');