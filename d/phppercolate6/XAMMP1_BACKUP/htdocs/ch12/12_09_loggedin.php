<?php # Script 12.9 - loggedin.php
session_start();

//if form submitted include 2 helper files
if(!isset($_SESSION['user_id']))
{
//redirect if user not logged in
    require('includes/12_02_login_functions.inc.php');
    redirect_user();
 }
 
 $page_title = 'Logged In!';
 
 include('includes/header.html');
  
 //welcome user
 echo "<br /><br /><h1>Logged In!</h1>
      <p>You are now logged in using sessions, {$_SESSION['first_name']}!</p>
	  <p><a href=\"12_10_logout.php\">Logout</a></p>";
	   //  use {} to avoid parse errors
	   
 include('includes/footer.html');
	   ?>