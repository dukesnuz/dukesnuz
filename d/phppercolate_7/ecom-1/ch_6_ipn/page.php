<?php
// page.php
require('../includes_2/config.inc.php');

//connect to database
require(MYSQL);

if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range =>1)))')))
	{
		$page_id = $_GET['id'];
	
	 //grab page info
	$q = "SELECT title, description, content
	      FROM pages
	      WHERE id = '$page_id' ";
		  $r = mysqli_query($dbc, $q);
		  
		  //if no rows return an error
		  if(mysqli_num_rows($r) !==1)
		  {
		  	$page_title = 'OOPPS Error!';
			include('includes/header.html');
	        echo '<div class="alert alert-danger">This page has been accessed in error.</div>';
	        include('includes/footer.html');	
	        exit(); 	
		  }
	
	//grab page info
	$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
	$page_title = $row['title'];
	include('includes/header.html');
	echo '<h1>' . htmlspecialchars($page_title) . '</h1>';
	
	//display content if user has an account
	if(isset($_SESSION['user_not_expired']))
	//if(4>2)
	{
		echo "<div>{$row['content']}</div>";
	}elseif(isset($_SESSION['user_id']))
	//}elseif(4>6)
	{
		echo '<div class="alert"><h4>Expired Account</h4>Thank you for your interest in this content,
		but your account is no longer current.  Please <a href="renew.php">renew your account</a> in order
		to view this page in its entirety.</div>';
		echo '<div>' . htmlspecialchars($row['description']). '</div>';
	}else{
		echo '<div class="alert">Thank you for your interest in this content.  You must be logged in as
		a registered user to view this page in its entirety.</div>';
		echo '<div' .htmlspecialchars($row['description']).'</div>';
	}

//complete id conditional
}else{
	$page_title = 'OOPSS! Error';
	include('includes/header.html');
	echo '<div class="alert alert-danger">This page has been accessed in error.</div>';
}//end primary IF
	
include('includes/footer.html');	
?>