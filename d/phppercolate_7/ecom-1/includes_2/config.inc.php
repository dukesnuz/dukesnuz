<?php
//config.inc.php
//is site live
//
  // if(!defined('LIVE')) DEFINE('LIVE', false);
     if(!defined('LIVE')) DEFINE('LIVE', true);
//set email for errors to be emailed to
   DEFINE('CONTACT_EMAIL','contactus@dukesnuz.com');
   
   //defince more constants
  //define('BASE_URI' , 'includes/pdfs');
   define('BASE_URI' , 'PDFS_DIR/');
   // page 134
   
   //define('PDF_DIR', BASE_URI . 'pdfs/');
   define('PDFS_DIR', BASE_URI . 'PDF_DIR/');
   //below id live
   //define('BASE_URL', 'www.dukesnuz.com/d/phppercolate_7/index.html');
   //below for developement
   //define('BASE_URL', 'http://localhost:81/dukesnuz/phppercolate_7/');
   define('BASE_URL', 'www.dukesnuz.com/d/phppercolate_7/ecom-1/');
   //define connection to database                   
   //define('MYSQL', BASE_URL. '/includes/mysql.inc.php');
      //include('includes/mysql.inc.php');
    define('MYSQL', '../includes_2/mysql.inc.php');
 
   /*http://localhost:81/dukesnuz/phppercolate_7/includes/mysql.inc.php
   * from download
   * define ('BASE_URI', '/Users/larryullman/Sites/ex1/');
define ('BASE_URL', 'localhost/ex1/html/');
define ('PDFS_DIR', BASE_URI . 'pdfs/'); // Added in Chapter 5.
define ('MYSQL', BASE_URI . 'mysql.inc.php');
   */
   session_start();
   
   //define error handling function
   function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars)
      {
      	//detailed error message
      	$message = "An error occurred in script '$e_file' on line $e_line:\n$e_message\n";
		
		//add backtrace info
		$message .="<pre>" .print_r(debug_backtrace(), 1). "</ore>\n";
		
		
		//if site not live show error in browser
		//  nl2br($message)  turns \n into HTML break tags
		if(!LIVE)
		{
			echo '<div class="alert alert-danger">' . nl2br($message) .'</div>';
		}else{
			error_log($message, 1, CONTACT_EMAIL, 'FROM:admin@example.com');
			if($e_number !=E_NOTICE)
			{
				echo '<div class="alert alert-danger">A system error occurred.
				      we apologize for the inconvenience.</div>';
			}//end if !LIVE
		}//end of my_error_handler() definition
			return true; //so that PHP does'nt try to handle the error , too
}//end error handler definition

//use error handler
set_error_handler('my_error_handler');


//I added this if !headers from page 75
if(!headers_sent())
      {
	//create redirect function 
function redirect_invalid_user($check = 'user_id', $destination = 'index.html', $protocol = 'http://')
    {
    	   if(!isset($_SESSION[$check]))
    	 //if(4>2)
		   {
		   	$url = $protocol.BASE_URL . $destination;
			header("Location: $url");
			exit();
		   }	
    }
	////
	  }else{
	  	include_once('header.html');
		trigger_error('You do not have permission to access this page.
		              Please log in and try again.');
		include_once('footer.html');
	  }
