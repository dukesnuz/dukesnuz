<?php # Script 16.3 - view_users.php
$page_title = 'View the current users Using OOP';
include ('includes/header.html');
ini_set('display_errors',1);
echo '<h1 id="mainhead">Registered Users</h1>  <h2>Script 16_03</h2>';
echo '<p>Using OOP fetch_object() method</p>';
//connect to data and fetch any results
//
//error connecting to databse
require('includes/mysqli_oop_connect.php');
//

$q = "SELECT CONCAT(last_name,' , ', first_name) AS name, 
DATE_FORMAT(registration_date, '%M %D, %Y') AS dr FROM users 
ORDER BY registration_date ASC";
$r = $mysqli->query($q);

//add mysqli_num_rows()
$num =$r->num_rows;

//print found results
//if ($r){
if ($num>0){ //records then display
  //display number of records
 echo "<p class='error'> There are currently $num registered users.</p>\n";
 
  echo '<table align="center" cellspacing="3" cellpadding="3" width="75%">
    <tr><td align="left"><b>Name</b></td><td align="right"><b>Date Registered</b></td></tr>';
	
         while ($row = $r->fetch_object() ) {
		  echo '<tr><td align="left">' . $row->name . '</td><td align="left">' . $row->dr . '</td></tr>';
		  }
		  
echo '</table>';

$r->free();
unset($r);

//complete main conditional

	}else{
	
	echo '<p class="error". There are currently no registered users.</p>';
	//below taken out for this script
	/*
	echo '<p class="error">The current users could not be retrieved.
	We apologize for any inconvenience.</p>';
	echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
	*/
	
	} // End of if ($r) IF.
	
	//close database connection
	$mysqli->close();
	unset($mysqli);

echo '<p><a href="16_04_post_message.php">Exercise 16.4</a></p>';

include('includes/footer.html');
?>