<?php # Script 18.9 logout.php
require ('includes/config.inc.php');
$page_title= 'Logout';
include('includes/header.html');
//echo "1";
//redirect user if not logged in
if(!isset($_SESSION['first_name']))
   {
   $url = BASE_URL . 'index.php';
   ob_end_clean();
   header("Location : $url");
   exit();
   //echo "2";
   //logout user if logged in
   }else{
   $_SESSION = array();
   session_destroy();
   setcookie(session_name(), '',time()-3600);
   }
  //echo "3"; 
   echo '<h3>You are logged out.</h3>';
   include('includes/footer.html');
   ?>