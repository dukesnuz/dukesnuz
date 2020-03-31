<?php

//add_to_favorites.php

require('../includes_2/config.inc.php');
//redirect_invalid_user('user_not_expired');
// Require the database connection:
require(MYSQL);

// Validate the page ID:
 if (filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range' => 1)))
	 	{
		$page_id = $_GET['id'];

	// Get the page info:

	 $q='SELECT title, description, content FROM pages WHERE id ='. $page_id;
	 $r = mysqli_query($dbc, $q);
 
	 if(mysqli_num_rows($r) !=1) //oops error
	 	{
		
		$Page_title = 'OOpps Error!';
	 	include('./includes/header.html');
	  	echo '<p class="error">This page has been accessed in error.</p>';
	 	include('./includes/footer.html');
		exit();
     	}
			
			
// Fetch the page info:
	 
 	$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
	 
	 $page_title = $row['title'];
	include('includes/header.html');
	 
	 echo "<h3>$page_title</h3>";
	
	// Add this favorite to the database:
	
	//from download
	   //$q = 'REPLACE INTO favorite_pages (user_id, page_id) VALUES ('  .$_SESSION['user_id'] . '.'.   $_GET['id'] . ')';
	//from book
	  $user_id = $_SESSION['user_id'];
	   $page_id = $_GET['id'];
	 // $user_id = 33;
	//  $page_id = 44;
	   $q = "INSERT INTO favorite_pages(user_id, page_id)
		 		 VALUES($user_id, $page_id)";

     $r = mysqli_query($dbc, $q);
	  if (mysqli_affected_rows($dbc) == 1) 
	//if(4>2)
	{
	   //echo $_SESSION['user_id'];	
	    //echo '<p><img src="/images/heart_32.png" border="0" width="32" height="32" align="middle" /> This has been added to your favorites! <a href="remove_from_favorites.php?id=' .$_GET['id'] . '"><img src="/images/close_32.png"  border="0" width="32" height="32" align="middle" /></a></p>';
	    //i used below line instead of from book and DL
	    echo '<h3 id="favorite_h3"><img src="images/heart_32.png" width="32" height="32"><span class="label label-info">This has been added to your favorites!</span> <a id="remove_favorite_link" href="remove_from_favorites.php?id='. $_GET['id'] .'"><img src="images/close_32.png"  width="32" height="32"></a></h3>';
	   
	   
	 }else{
	    //echo $_SESSION['user_id'];	
	 	trigger_error('A system error occurred. We apologize for any inconvenience.');
	 }

	// Show the page content:
	 
	 echo "<div>{$row['content']}</div>";
 
      }else{ //no valid id
	 
	//$page_title ='OOpps Error!';
	 include('includes/header.html');
	 
	 echo '<p class="error">This page has been accessed in error.</p>';

 } //END of Prim IF

// Include the HTML footer:
include('./includes/footer.html');
?>