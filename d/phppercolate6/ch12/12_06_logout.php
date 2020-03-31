<?php # Script 12.6 - logout.php

//check for existance of user id cookie

if(!isset($_COOKIE['user_id']))
     {
	 require('includes/12_02_login_functions.inc.php');
	 redirect_user();
  //delete cookie if exists
     }else{
	 setcookie('user_id', '', time()-3600, '/', '',0,0);
	 setcookie('first_name', '', time()-3600, '/','',0,0);
	 }
    $page_title = 'Logged Out!';
	
	include('includes/header.html');
	echo "<h1>Logged Out!-Using cookies</h1>';
	<p>You are now logged out, {$_COOKIE['first_name']}!</p>";
	include('includes/footer.html');
	?>