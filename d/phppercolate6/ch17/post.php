<?php # Script 17.7 - post.php
include('includes/17_01_header.html');
//check for form submission and validate the thread
if($_SERVER['REQUEST_METHOD'] == 'POST') 
  {
         if(isset($_POST['tid'])  && filter_var($_POST['tid'], FILTER_VALIDATE_INT, array('min_range' =>1) ) )
		  //if(3>1)
		  {
		 $tid = $_POST['tid'];
		// $tid = 1;
		  }else{
		  $tid = FALSE;
		  }
	         //validate message subject
			 if(!$tid && empty($_POST['subject']))
			 {
			 $subject = FALSE;
			 echo '<p>Please enter a subject for this post.</p>';
			 }elseif(!$tid && !empty($_POST['subject']))
			 {
			 $subject = htmlspecialchars(strip_tags($_POST['subject']));
			 }else{ //thread ID no need for subject
			 $subject = TRUE;
			 }
			 //validate body
			 if(!empty($_POST['body']))
			 {
			 $body = htmlentities($_POST['body']);
			 }else{
			 $body = FALSE;
			 echo '<p>Please enter a body for this post.</p>';
			 }
			 //check if form properly filled out
			 if($subject && $body)
			   {
	//create new thread  when appropriate
	if(!$tid)
		{
		 $q = "INSERT INTO threads(lang_id, user_id, subject)
		 VALUES({$_SESSION['lid']}, {$_SESSION['user_id']}, '".mysqli_real_escape_string($dbc, $subject) . "')";
		 $r = mysqli_query($dbc, $q);
			if(mysqli_affected_rows($dbc) ==1)
				{
						 
						$tid = mysqli_insert_id($dbc);
				        //$tid = 1;
						 }else{
						 echo '<p>Your post could not be handled due to a system error.</p>';
						}
			      //No $tid
			 }
				  
				  
   //add record to posts table
   if($tid)
   {
   $q = "INSERT INTO posts (thread_id, user_id, message, posted_on)
        VALUES($tid, {$_SESSION['user_id']}, '" . mysqli_real_escape_string($dbc, $body) . "', UTC_TIMESTAMP())";
		 $r = mysqli_query($dbc, $q);
		       if(mysqli_affected_rows($dbc) == 1)
			   {
			   echo '<p>Your post has been entered</p>';
			 // echo '<p>Session==' .$_SESSION['user_id'];
			   }
			   }else{
			   echo '<p>Your post could not be handled due to a systme error.</p>';
	           }
	//valid($tid)
	}
//
//complete page
  //include form
  }else{
  include('includes/post_form.php');
  }

  include('includes/17_02_footer.html');
?>
	  
			 
		  
	              
	