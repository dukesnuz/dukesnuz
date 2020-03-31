<?php # script 2.1 -config.inc.php
/*
 * add some comments about file
 * File name: config.inc.php
 * Page 48
 * Created by Larry ullmand and David Petringa
 * Created February 7, 2015
 * Config file does the following:
 * - Has site settings in ine location
 * - Stores URL's and URI's as constants
 * -Sets how errors will be handled
 */
 
 $contact_email = 'david@ajaxtransport.com';
 
 //Determine whether the script is running on a live server or a test
 $host = substr($_SERVER ['HTTP_HOST'],0,5);
 if(in_array($host, array('local', '127.0','192.1')))
 {
 	$local =TRUE;
 }else{
 	$local = FALSE;
 }

 //Set server-specific constants:
 if($local)
 {
 $debug=True;
 define('BASE_URI', '   ');
 define('BASE_URL','http://localhost/dukesnuz/200_days_of_code');
 define('DB', '../../include_2/mysqli_connect.php');
 }else{
 define('BASE_URI', '   ');
 define('BASE_URL','http://localhost/dukesnuz/200_days_of_code');
 define('DB', '../../include_2/mysqli_connect.php');
 }

 //Set debugging level
 if(!isset($debug))
 {
 	$debug = FALSE;
 }
//to debug a live site use below line on live page
///////$debug=$TRUE;

//begin function to handle errors
//to desccribe how to use errors turn to PHP and MYSQL for Dynamic websites
function my_error_handler($e_number,$e_message,$_file,$e_line,$e_vars)
	{
	global $debug,$constant_email;
	//biuld error message
	$message ="An error occurred in script '$e_file' on line $e_line: $e_message";
	$message .= print_r($e_vars,1);
	
	if($debug)
	{
    //show error
    echo '<div class="error">'.$message.'</div>';
	debug_print_backtrace();
	}else{
		error_log($message,1,$contact_email);
		if( ($e_number !=E_NOTICE) && ($e_number <2048) )
		{
			echo '<div class="error">A system error occurred. We apologize for the inconvenience.</div';
		}
		}//END Debugging
	}//END of my_error_handler() definition
	set_error_handler('my_error_handler');




//I added below for modrewrite
 //define url link when using MOD_WRITE
   // define('MODWRITE', '/d/phppercolate_7/ecom-2/ch_7');
      define('modwrite','/d/200_days_of_code/ch_2');
     //http://localhost/dukesnuz/200_days_of_code/ch_2/index.php?p=about



