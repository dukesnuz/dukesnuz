<?php # Script 19.6 browse_prints.php
require('includes/config.inc.php');
$page_tile= 'Browse the Prints';
include('includes/header.html');
require('includes/mysqli_connect.php');

//Define query selecting the print
$q ="SELECT artists.artist_id, CONCAT_WS(' ', first_name, middle_name, last_name) 
     AS artist, print_name, price, description, print_id 
	 FROM artists, prints 
	 WHERE artists.artist_id = prints.artist_id 
	 ORDER BY artists.last_name ASC, prints.print_name ASC";
	 
//overwrite query if an artist ID was passed in the URL
if(isset($_GET['aid']) && filter_var($_GET['aid'],FILTER_VALIDATE_INT, array('min_range' =>1)) )
   {
$q = "SELECT artists.artist_id, CONCAT_WS(' ', first_name, middle_name, last_name) 
AS artist, print_name, price, description, print_id FROM artists, prints 
WHERE artists.artist_id = prints.artist_id AND prints.artist_id={$_GET['aid']} 
ORDER BY prints.print_name";
  }
   

   //create table head
   echo '<table border="0" width="90%" cellspacing="3" cellpadding="3" align="center">
      <tr>
	     <td align="left" width="20%"><b>Artist</b></td>
		 <td align="left" width="20%"><b>Print Name</b></td>
		 <td align="left" width="40%"><b>Description</b></td>
		 <td align="right" width="40%"><b>Price</b></td>
	  </tr>';
	  
	  //display every returned record
	  $r = mysqli_query($dbc, $q);
	     while($row= mysqli_fetch_array($r, MYSQLI_ASSOC))
		   {
	     echo "\t<tr>
			    <td align=\"left\"><a href=\"browse_prints.php?aid={$row['artist_id']}\">{$row['artist']}</a></td>
			    <td align=\"left\"><a href=\"view_print.php?pid={$row['print_id']}\">{$row['print_name']}</a></td>
				
				<td align=\"left\">{$row['description']}</td>
			    <td align=\"right\">{$row['price']}</td>
		     </tr>\n";
	       } //End while loop see note p 637
	       echo '</table>';
	mysqli_close($dbc);
	include('includes/footer.html');
	  
    