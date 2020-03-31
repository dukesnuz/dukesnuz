<?php # Script 9.4 - view_users.php
$page_title = 'View the current user';
include ('includes/header.html');
ini_set('display_errors',1);
echo '<h1 id="mainhead">Bank Customers</h1>  <h2>Pursuit 09</h2>';

//connect to data and fetch any results
//
//error connecting to databse
require('includes/mysqli_connect_banking.php');
//


$q = "SELECT CONCAT(first_name,' ',last_name) AS name FROM customers"; 

//$q = "SELECT CONCAT(last_name,' , ', first_name) AS name, 
//DATE_FORMAT(registration_date, '%M %D, %Y') AS dr FROM users 
//ORDER BY registration_date ASC";


$r = @mysqli_query ($dbc, $q);

//add mysqli_num_rows()
$num =mysqli_num_rows($r);

//print found results
//if ($r){
if ($num>0){ //records then display
  //display number of records
 echo "<p class='error'> There are currently $num bank customers.</p>\n";
 
  echo '<table align="center" cellspacing="3" cellpadding="3" width="75%">
    <tr><td align="left"><b>Name</b></td></tr>';
	
         while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		  //echo '<tr><td align="left">' . $row['name'] . '</td><td align="left">' . $row['dr'] . '</td></tr>';
		  echo '<tr><td align="left">' . $row['name'] . '</td></tr>';
		  }
		  
echo '</table>';
mysqli_free_result ($r);

//complete main conditional

	}else{
	
	echo '<p class="error". There are currently no bank custoemrs.</p>';
	//below taken out for this script
	/*
	echo '<p class="error">The current bank customers could not be retrieved.
	We apologize for any inconvenience.</p>';
	echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
	*/
	
	} // End of if ($r) IF.
	
	//close database connection
	mysqli_close($dbc);

include('includes/footer.html');
?>