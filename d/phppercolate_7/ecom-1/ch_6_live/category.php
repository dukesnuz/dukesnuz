<?php
// category.php

require('../includes_2/config.inc.php');

//connect to database
require(MYSQL);

//validate category id
if(filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range=>1)))')))
     {
     	$cat_id = $_GET['id'];
     
	 //grab category title
	 $q= "SELECT catagory FROM catagories WHERE id = '$cat_id' ";
	 $r = mysqli_query($dbc,$q);
	 //if 1 row not returnded report a problem
	 if(mysqli_num_rows($r) !==1)
	 {
     $page_title = 'Ooops! Error';
	 include('includes/header.html');
	 echo '<div class="alert alert-danger">This page has been accessed in error.</div>';
	 include('includes/footer.html');	
	 exit(); 	
	 }
	 
	 //grab category titles and use it as the page title
	 list($page_title) = mysqli_fetch_array($r, MYSQLI_NUM);
	 include('includes/header.html');
	 echo '<h1>'  . htmlspecialchars($page_title) . '</h1>';
	 
	 //print message if user does not have an account
	 if(isset($_SESSION['user_id']) && !isset($_SESSION['user_not_expired']))
	    {
	    	echo '<div class="alert"><h4>Expired Account</h4>Thank you for your interest in this content.
	    	Unfortunately your account has expired.  Please <a href="renew.php">renew your account</a>
	    	in order to access site content</div>';
	    }elseif(!isset($_SESSION['user_id'])){
	    	echo '<div class="alert">Thank you for your interest in this content.  You must be logged
	    	in as a registered user to view site content.</div>';
	    }
		
		//grab pages associated with catagory
		$q = "SELECT id, title, description FROM pages 
		      WHERE catagories_id = '$cat_id'
		      ORDER BY date_created DESC ";
		      $r=mysqli_query($dbc,$q);
			  if(mysqli_num_rows($r) >0 )
			  {
			  	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
					{
						echo '<div><h4><a href="page.php?id='. $row['id'].'">'.htmlspecialchars($row['title']).'</a></h4>
						<p>'.htmlspecialchars($row['description']). '</p></div>';
					}//end while loop
			  }else{
			  	//if no pages available
			  	echo '<p>There are currently no pages of content associated with this category. Please check back again!</p>';
			  }
	 
//if no valid id rec by page display error
 }else{
  	$page_title = 'OOPS Error!';
	include('includes/header.html');
	echo '<div class="alert alert-danger">This page has been accessed in error.</div>';
	}

include('includes/footer.html'); 

?>