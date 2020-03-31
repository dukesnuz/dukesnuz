<?php # Script 12.4 - loggedin.php


//if form submitted include 2 helper files
if(!isset($_COOKIE['user_id']))
{
//redirect if user not logged in
    require('includes/12_02_login_functions.inc.php');
    redirect_user();
 }
 
 $page_title = 'Logged In!';
 
 include('includes/header.html');
  
 //welcome user
 echo "<br /><br /><h1>Logged In! Scripts 12.1-12.6 setcookies</h1>
      <p>You are now logged in, {$_COOKIE['first_name']}!</p>
	  <p><a href=\"12_06_logout.php\">Logout</a></p>";
	   //  use {} to avoid parse errors
	   
 include('includes/footer.html');
	   ?>