<?php # Script 12.10 - logout.php
//start session
session_start();
//check for existance of user id cookie

if(!isset($_SESSION['user_id']))
     {
	 require('includes/12_00_login_functions.inc.php');
	 redirect_user();
  //delete cookie if exists
     }else{
	// setcookie('user_id', '', time()-3600, '/', '',0,0);
	// setcookie('first_name', '', time()-3600, '/','',0,0);
	// get user name
	$name=$_SESSION['first_name'];
	$_SESSION= array();
	session_destroy();
	setcookie('PHPSESSID', '' ,time()-3600, '', '', 0,0);
	
	}
    $page_title = 'Logged Out!';
	
	include('includes/header.html');
	echo "<h1>Logged Out!-Using sessions</h1>';
	<p>You are now logged out, !...{$name}...I added a variable to save username before session_destroy()</p>";
	include('includes/footer.html');
	?>