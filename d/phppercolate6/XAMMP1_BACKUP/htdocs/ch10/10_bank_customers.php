<?php # Script 10 bank_custoemrs.php
$page_title = 'View the Current Bank Customers';
include ('includes/header.html');
ini_set('display_errors',1);
echo '<h1 id="mainhead">Bank Customers</h1>  <h2>Pursuit</h2>';
echo '<p class="error">Under Construction</p>';
require_once('../includes/mysqli_connect_banking.php');


$display = 10;

if(isset($_GET['p']) && is_numeric($_GET['p'])) 
//if(3>1)
{
$pages = $_GET['p'];
}else{
//count number of records in databse
$q = "SELECT COUNT(customer_id) FROM customers";
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
//determine the sort
$sort =(isset($_GET['sort'])) ? $_GET['sort'] : 'ci';

//determine sorting order
			switch ($sort)
			{
			 	   case 'ln':
				   $order_by = 'last_name ASC';
				   break;
				   
				   case 'fn';
				   $order_by = 'first_name ASC';
				   break;
				   
				   case 'ci':
				   $order_by = 'customer_id ASC';
				   $sort = 'ci';
				   break;
				   }
				   
//Define the query

$q = "SELECT first_name, last_name, customer_id  FROM customers"; 

$r = @mysqli_query($dbc, $q);

echo '<table align="center" cellspacing="0" cellpadding="5" width="75%">
	 		 <tr>
				 <td align="left"><b><a href="10_bank_customers.php?sort=ln">Last Name</a></b></td>
				 <td align="left"><b><a href="10_bank_customers.php?sort=fn">First Name</a></b></td>
				 <td align="left"><b><a href="10_bank_customers.php?sort=ci">Customer Id</a></b></td>
				 
			</tr>';
			//set back ground row color and alternate color
	$bg = '#eeeeee';
	
	while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
			   {
			   $bg = ($bg == '#eeeeee' ? '#ffffff' : '#eeeeee');
			   
			   //print records in table
	echo '<tr bgcolor="'.$bg.'">
		 	  
	    	  <td align="left">' . $row['last_name'] .'</td>
			  <td align="left">' . $row['first_name'] .'</td>
			  <td align="left">' . $row['customer_id'].'</td>
			  
		  </tr>';
		  }//end while loop
echo'</table>';
	
     //free up query result
	   mysqli_free_result($r);
	//close database connection
	   mysqli_close($dbc);

	   
	   // section for displaying links to other pages
	   /*
	 if($pages >1 )
	 {
	 echo '<br /><p>';
	 	  $current_page =($start/$display) +1;
		  
		  if($current_page !=1)
		  {
		  //go to previous page
		 
		   echo '<a href="10_bank_customers.php?s=' .($start-$display).'&p=' .$pages . '&sort=' . $sort . '">Previous</a>';
		     }
		  
		  for($i = 1; $i <= $pages; $i++)
		  {
		   	 if($i !=$current_page)
				 {
				 //go to page #
				 echo '...';
				 echo '<a href="10_bank_customers.php?s='.(($display * ($i-1))) . '&p='.$pages .'&sort=' .$sort.'">'.$i.'</a>';
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
				
				 echo '<a href="10_bank_customers.php?s='.($start+$display) . '&p='.$pages . '&sort=' . $sort.'">Next</a>';
				 }
	//complete page
	echo '</p>';
	} //end of links section
				
			*/	 
		  
include('includes/footer.html');
?>