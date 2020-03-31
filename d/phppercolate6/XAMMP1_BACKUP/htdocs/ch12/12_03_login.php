<?php # Script 12.3 - login.php


//if form submitted include 2 helper files
if($_SERVER['REQUEST_METHOD'] == 'POST')
// if(4>1)
   {
   require('includes/12_02_login_functions.inc.php');
   require('includes/mysqli_connect.php');
   
   list($check, $data) = check_login($dbc, $_POST['email'], $_POST['pass']);
   
   //if user entered correct data log them in
   if($check)
   //if(4>1)
   {
   setcookie ('user_id', $data['user_id'], time()+3600, '/','',0,0);
   setcookie ('first_name', $data['first_name'], time()+3600, '/','',0,0);
   //redirect user to new page
   redirect_user('12_04_loggedin.php');
   //echo "setcookie";
   }else{
     $errors = $data;
	 }
	 mysqli_close($dbc);
	 }
	 include('includes/12_01_login_page.inc.php');
	
	 ?>