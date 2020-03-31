<?php # Script 18.3 - config.inc.php

//establish 2 constans for error reporting
//when site live change FALSE to TRUE so errors will not be sent to browser
//changeinsertemailaddress to admin email so that erros will be emailed
define('LIVE', FALSE);
define('EMAIL', 'InsertRealAddressHere');

//Define 2 constants for site-wide settings
// see page 568 middle left coloum about 2 define settings below
define('BASE_URL', 'http://www.dukesnuz.com/');
define('MYSQL', 'includes/mysqli_connect.php');

//set time zonein order to use PHP date and time functions
date_default_timezone_set('US/Eastern');

function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars)
  {
	 $message ="An error occurred in script '$e_file on line $e_line: $e_message]n";
	 $message.= "Date/Time:" . date('n-j-y H:i:s') . "\n";
     //add current date and time
	 $message .= "Date/Time" . date('n-j-y H:i:s') . "\n";
	 //if site not live show error message in detail
	 if(!LIVE)
	   {
	   //n12br converts new line to htmlbreak tags
	   echo '<div class="error">' . nl2br($message);
	   echo '<pre>' . print_r($e_vars, 1) . "\n";
	   //backtrace a history of function calls and such
	   debug_print_backtrace();
	   echo '</pre></div>';
	   }else{
	   //if LIVE do not show error
	   $body = $message . "\n" . print_r($e_vars, 1);
	   mail(EMAIL, 'Site Error!' , $body, 'From:contactus@dukesnuz.com');
	   //if error of type E_NOTCE , do not print see page 570
	      if($e_number != E_NOTICE)
	      {
	      echo '<div class="error">A system error occurred. We apologize for the inconvenience.</div><br />';
	      }
      }//End of !LIVE if
  }//complete function
  // tell PHP to use error handler
  set_error_handler('my_error_handler');

//echo "hi";