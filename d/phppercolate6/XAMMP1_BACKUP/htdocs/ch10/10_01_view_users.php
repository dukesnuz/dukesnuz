<?php # Script 10.1 - view_users.php
$page_title = 'Manually Send Values to a PHP Script';
include ('includes/header.html');
ini_set('display_errors',1);
echo '<h1 id="mainhead">Manually Send Values to a PHP Script</h1>  <h2>Script 10_01</h2>';

//connect to data and fetch any results
//
//error connecting to databse
require('includes/mysqli_connect.php');
//

$q = "SELECT last_name,' , ', first_name, 
DATE_FORMAT(registration_date, '%M %D, %Y') AS dr,user_id FROM users 
ORDER BY registration_date ASC";
$r = @mysqli_query ($dbc, $q);

//add mysqli_num_rows()
$num =mysqli_num_rows($r);

//print found results
//if ($r){
if ($num>0){ //records then display
  //display number of records
 echo "<p class='error'> There are currently $num registered users.</p>\n";
 
  echo '<table align="center" cellspacing="3" cellpadding="3" width="75%">
    <tr>
		<td align="left"><b>Edit</b></td>
		<td align="left"><b>Delete</b></td>
		<td align="left"><b>Last Name</b></td>
		<td align="left"><b>First Name</b></td>
		<td align="left"><b>Date Registered</b></td>
	</tr>';
	
         while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		  echo '<tr>
		  	   <td align="left"><a href="10_03_edit_user.php?id=' . $row['user_id'] . '">Edit</a></td>
			   <td align="left"><a href="10_02_delete_user.php?id=' . $row['user_id'] . '">Delete</a></td>
			   <td align="left">' . $row['last_name'] .'</td>
		       <td align="left">' . $row['first_name'] .'</td>
		       <td align="left">' . $row['dr'] . '</td>
			  </tr>';
		  }
		  
echo '</table>';
mysqli_free_result ($r);

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
	mysqli_close($dbc);

include('includes/footer.html');
?>