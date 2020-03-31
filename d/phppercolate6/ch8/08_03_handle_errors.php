<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="generator" content="CoffeeCup HTML Editor (www.coffeecup.com)">
    <meta name="dcterms.created" content="Sun, 15 Sep 2013 21:34:00 GMT">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Adjust For  Errors</title>
    
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>
  <body>
<h1>Testing Error Handling</h1>
<p>Live is set to TRUE</p>
<p>As a result no errors are displayed.</p>
<?php # Script 8.3 - handle_errors.php


//Flag variables for site status:
define('LIVE' , FALSE);

//Create  error handler
function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars){
//Build error message
$message="An error occurred in script '$e_file' on line $e_line; $e_message\n";

$message .= print_r ($e_vars, 1);

		 if(!LIVE){
		 		   echo '<pre>' . $message . "\n";
				   debug_print_backtrace();
				   echo '</pre><br />';
				   }else{
				   echo '<div class="error"> A system error occurred. We apologize for the inconvenience.</div><br />';
				   }
				   } //end error handler
				   
				   //Use error handler
				   set_error_handler('my_error_handler');	 

foreach ($var as $v){}
$result = 1/0;
?>



<?php include('../../stats.php');?>
  </body>
</html>