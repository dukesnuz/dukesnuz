<?php #Script 18.7 - activate.php
require('includes/config.inc.php');
$page_title = "Activate Your Account";
include('includes/header.html');

//validate values that should be recieved by the page
 if(isset($_GET['x'], $_GET['y'])  && filter_var($_GET['x'], FILTER_VALIDATE_EMAIL)  && (strlen($_GET['y']) ==32))
//if(isset($_GET['x'], $_GET['y'])    && (strlen($_GET['y']) ==32))
 // if(4>1)
   {
   //attempt to activate user account
   require(MYSQL);
  $q = "UPDATE users SET active=NULL 
   WHERE(email='".mysqli_real_escape_string($dbc, $_GET['x'])."' 
     AND active ='".mysqli_real_escape_string($dbc, $_GET['y'])."') LIMIT 1";
  //$q = "UPDATE users SET active=NULL 
        //WHERE(email='".mysqli_real_escape_string($dbc, $_GET['x'])." ') LIMIT 1";
   
   $r = mysqli_query($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error:" . mysqli_error($dbc));
   
   //report on succes of query
   if(mysqli_affected_rows($dbc) ==1)
   //if(4>1)
    {
	echo "<h3>Your account is now active.  You may now log in.</h3>";
	}else{
	echo '<p class="error">Your account could not be activated.  Please re-check the link or contact
	the system administrator.</p>';
	//echo  mysqli_real_escape_string($dbc, $_GET['x']);
	//echo '<br />';
	//echo  mysqli_real_escape_string($dbc, $_GET['y']);
	}
	mysqli_close($dbc);
}else{
//redirect
$url = BASE_URL . 'index.php';
//$url ='http://www.eatbeansfreegas.com/index.php';

ob_end_clean();
header("Location: $url");
exit();
}//end of main if else
	
	include('includes/footer.html');
	?>
       