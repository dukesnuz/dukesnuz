<?php # Script 10.4 - pagenate_view_users.php
$page_title = 'View the Current Users';
include ('includes/header.html');
ini_set('display_errors',1);
echo '<h1 id="mainhead">Registered Users</h1>  <h2>Script 10_04</h2>';

require_once('../includes/mysqli_connect.php');


$display = 10;

if(isset($_GET['p']) && is_numeric($_GET['p'])) 
//if(3>1)
{
$pages = $_GET['p'];
}else{
//count number of records in databse
$q = "SELECT COUNT(user_id) FROM users";
$r = @mysqli_query($dbc, $q);
$row = @mysqli_fetch_array($r, MYSQLI_NUM);
$records = $row[0];
         //calculate number of pages needed
		 if($records >$display)
		 {
		 $pages = ceil($records/$display);
		 }else{
		 $pages = 1;
		 }
		 
} //end if p

//determine starting point in database
if(isset($_GET['s']) && is_numeric($_GET['s']))
{
$start = $_GET['s'];
}else{
$start = 0;
}

//select with LIMIT
$q = "SELECT last_name, first_name, DATE_FORMAT(registration_date, '%m,%d,%y') AS dr,
   	 user_id FROM users ORDER BY registration_date ASC LIMIT $start, $display";
	 
$r = @mysqli_query($dbc, $q);

echo '<table align="center" cellspacing="0" cellpadding="5" width="75%">
	 		 <tr>
			 	 <td align="left"><b>Edit</b></td>
				 <td align"left"><b>Delete</b></td>
				 <td align="left"><b>Last Name</b></td>
				 <td align="left"><b>First Name</b></td>
				 <td align="left"><b>Registration Date</b></td>
			</tr>';
			//set back ground row color and alternate color
	$bg = '#eeeeee';
	
	while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
			   {
			   $bg = ($bg == '#eeeeee' ? '#ffffff' : '#eeeeee');
			   
			   //print records in table
	echo '<tr bgcolor="'.$bg.'">
		 	  <td align="left"><a href="10_03_edit_user.php?id=' . $row['user_id'] . '">Edit</a></td>
	   		  <td align="left"><a href="10_02_delete_user.php?id=' . $row['user_id'] . '">Delete</a></td>
	    	  <td align="left">' . $row['last_name'] .'</td>
			  <td align="left">' . $row['first_name'] .'</td>
			  <td align="left">' . $row['dr'] . '</td>
		  </tr>';
		  }//end while loop
echo'</table>';
	
     //free up query result
	   mysqli_free_result($r);
	//close database connection
	   mysqli_close($dbc);

	   
	   // section for displaying links to other pages
	   
	 if($pages >1 )
	 {
	 echo '<br /><p>';
	 	  $current_page =($start/$display) +1;
		  
		  if($current_page !=1)
		  {
		  //go to previous page
		  echo '<a href="10_04_pagenate_view_users.php?s=' . ($start-$display). '&p='. $pages .'">Previous</a>';
		  }
		  
		  for($i = 1; $i <= $pages; $i++)
		  {
		   	 if($i !=$current_page)
				 {
				 //go to page #
				 echo '...';
				  	   echo '<a href="10_04_pagenate_view_users.php?s='.(($display * ($i-1))) . '&p='.$pages .'">'.$i.'</a>';
				  }else{
				  //go to next page numer
				  echo '...';
				  echo $i.' ';
				  }
		          }
				  //go to next page
				  echo '...';
		      if($current_page != $pages)
			  	{
				 echo '<a href="10_04_pagenate_view_users.php?s='.($start+$display) . '&p='.$pages .'">Next</a>';
				 }
	//complete page
	echo '</p>';
	} //end of links section
				
				 
		  
include('includes/footer.html');
?>