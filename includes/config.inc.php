<?php

    //echo 'config';
    // are we live
    //use below for devlopement
    //if(!defined('LIVE')) DEFINE('LIVE', false);
	//use below for live
	if(!defined('LIVE')) DEFINE('LIVE', true);

	//errors emailed here
	DEFINE('CONTACT_EMAIL', 'hello@dukesnuz.com');
	DEFINE('CONTACT_EMAIL_2', 'david@ajaxtransport.com');
	DEFINE('CONTACT_EMAIL_ASCII', '&#104;&#101;&#108;&#108;&#111;&#64;&#100;&#117;&#107;&#101;&#115;&#110;&#117;&#122;&#46;&#99;&#111;&#109;');
	DEFINE('SITE_NAME','DukesNuz');

     //define connection to database
   // define('MYSQL', '../include_2/mysqli_connect.php');
   //below uses ModWrite
    define('MYSQL1','./include_2/mysqli_connect.php');
    define('MYSQL','../include_2/mysqli_connect.php');

	  //below used for page_history.inc.php
  	define('MYSQLH1','./include_2/mysqli_connect_history.php');
    define('MYSQLH','../include_2/mysqli_connect_history.php');
    //below for admin folder
    //define('MYSQL_ADMIN', '../../includes_2/mysql.inc.php');

    //define url link when using MOD_WRITE
    define('MODWRITE', '/dukesnuz/david/petringa/');
  	define('MODWRITE2', '/dukesnuz-david-petringa/');
    // ="/dukesnuz/david/petringa/";

	//For LIVE or Dev
	if(LIVE)
	{
	   //if access from level 1 directory = main folder
	   //Live
	   define('FOLDER_LEVEL_1','/');
	   define('FOLDER_LEVEL_2', '/');
	   define('URL', 'http://www.dukesnuz.com');
	}else{
		//if access from level 1 directory = main folder
		//Dev
	   define('FOLDER_LEVEL_1','./');
	   define('FOLDER_LEVEL_2', "../");
	   define('URL', 'localhost');

	}


	function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars)
	{
		//build error message
		$message = "An error occurred in script '$e_file' on line $e_line:\n$e_message\n";
		//add backtrace
		$message .="<pre>".print_r(debug_backtrace(),1). "</pre>\n";

		//or just append $e_vars to the message:
		//$message .="<pre>" .print_r ($e_vars, 1) . "</pre>\n";

		if(!LIVE)
			{
				//show error in browser
				echo '<div class="error">' . nl2br($message) . '</div>';
			}else{
				//developement print error
				//send error in an email
				//error_log ($message, 1, CONTACT_EMAIL, "From:".CONTACT_EMAIL);

				//only print error in browser, if error isnt a notice
				if($e_number != E_NOTICE)
					{
						echo ' <div class="error">A System error occurred.  We apologize for the
						inconvenience.</div>';
					}
			}//End of $live IF_ELSE.
			return true; //So that PHP does nt try to handle the error, too.
	} //End of my_error_handler() definition
//Use my error handler
//turn off email errors if live
if(!LIVE){
    set_error_handler('my_error_handler');
}
