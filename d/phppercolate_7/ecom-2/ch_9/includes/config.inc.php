<?php
    
    
    // are we live
    if(!defined('LIVE')) DEFINE('LIVE', false);
	
	//errors emailed here
	DEFINE('CONTACT_EMAIL', 'contactus@dukesnuz.com');
	
	
	//determine location of files and the URL of the site:
	define('BASE_URI', 'C:\xampp\htdocs\dukesnuz\phppercolate_7\ecom-2');
	define('BASE_URL', 'localhost/dukesnuz/phppercolate_7/ecom-2/');
	//define('BASE_URL', 'www.//dukesnuz.com/d/phppercolate7/ecom-2/');
     //define connection to database                   
   

   		//determine location of files and the URL of the site:
	define('BASE_URI', 'C:\xampp\htdocs\dukesnuz\phppercolate_7\ecom-2');
	//define('BASE_URL', 'localhost/dukesnuz/phppercolate_7/ecom-2/');
	define('BASE_URL', 'www.dukesnuz.com/d/phppercolate7/ecom-2/');
	//below used in chp 10 for cart.html to checkout.php
    define('BASE_URL_2','www.dukesnuz.com');
     //define connection to database                   
    define('MYSQL', '../includes_2/mysql.inc.php');


    //define url link when using MOD_WRITE
    define('MODWRITE', '/d/phppercolate_7/ecom-2/ch_9');
	
	
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
				error_log ($message, 1, CONTACT_EMAIL, 'From:admin@example.com');
				
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
set_error_handler('my_error_handler');


//chapter 9 below functions
//returns price
function get_just_price($regular, $sales)
	{
		if ((0 < $sales) && ($sales < $regular))
			{
				return number_format($sales/100, 2 );
			}else{
				return number_format($regular/100, 2);
			}
	}

//parse sku

function parse_sku($sku)
	{
		//grab first character
		$type_abbr = substr($sku, 0,1);
		
		//grab remaining character
		$pid = substr($sku, 1);
		
		//validate the type
		if($type_abbr === 'C')
			{
				$type = 'coffee';
			}elseif($type_abbr === 'G')
			{
				$type = 'goodies';
			}else{
				$type = NULL;
			}
			
	   //validate product id
	   $pid = (filter_var($pid, FILTER_VALIDATE_INT, array('min_range' => 1))) ? $pid: NULL;
	   
	   //return the values
	   return array($type, $pid);
	}//end of parse_sku() function


//calculating shipping  page 275
function get_shipping($total = 0)
	{
		//set base handling charge
		$shipping = 3;
		if($total <10){
			$rate = .25;
		}elseif($total <20){
			$rate = .20;
		}elseif($total <50){
			$rate = .18;
		}elseif($total <100){
			$rate = .16;
		}else{
			$rate = .15;
		}
	
//calculate ttl shipping
$shipping =$shipping +($total * $rate);
//return shipping total
return $shipping;
	}//end of get_shipping() function

	


//end cpt 9 functions



//define constants for html page 210

define('BOX_BEGIN', '<!--box begin--><div class="box alt">
		<div class="left-top-corner">
		<div class="right-top-corner">
		<div class="border-top">
		</div></div></div>
		<div class="border-left">
		<div class="border-right">
		<div class="inner">');
define('BOX_END', '</div></div></div>
		<div class="left-bot-corner">
		<div class="right-bot-corner">
		<div class="border-bot">
		</div></div></div></div>
		<!--box end-->');
		
			
		
//omit closing PHP tag to avoid  headers already sent errors