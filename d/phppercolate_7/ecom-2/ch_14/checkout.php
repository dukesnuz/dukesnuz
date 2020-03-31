<?php
// checkout.php

 require('includes/config.inc.php');
   
  //check for user's Cart Id in cookie
 if($_SERVER['REQUEST_METHOD'] == 'GET')
 
  	{
  if(isset($_COOKIE['SESSION']) && (strlen($_COOKIE['SESSION']) ===32) )
 //if(4>6)
		{
			$uid = $_COOKIE['SESSION'];
			//start the session
			session_id($uid);
			session_start();
		}else{
			///if no session value in cookie redirect
			$location = 'http://'.BASE_URL_2 .''.MODWRITE .'/cart.php';
			header("Location: $location");
			exit();
		}
	}else{//POST
		session_start();
		$uid = session_id();
		}//end if($_SERVER['REQUEST_METHOD'] =='GET")"
	
	require(MYSQL);
	$shipping_errors = array();
	
	//if form submitted  validate first and last name
	if($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			 if(preg_match('/^[A-Z\'.-]{2,20}$/i',$_POST['first_name']))
				{
					$fn = addslashes($_POST['first_name']);
				}else{
					$shipping_errors['first_name'] = 'Please enter your first name!';
				}
		
		     if(preg_match('/^[A-Z\'.-]{2,40}$/i',$_POST['last_name']))
				{
					$ln = addslashes($_POST['last_name']);
				}else{
					$shipping_errors['last_name'] = 'Please enter your last name!';
				}
		   
		       if(preg_match('/^[A-Z0-9 \',.#-]{2,80}$/i', $_POST['address1']))
			  //if(preg_match ('/^[A-Z0-9 \',.#-]{2,80}$/i', $_POST['address1']))
				{
					$a1 = addslashes($_POST['address1']);	
				}else{
					$shipping_errors['address1'] = 'Please enter your street address!';
				}
				
			 if(empty($_POST['address2']))
				{
					$a2 = NULL;
				}elseif (preg_match('/^[A-Z0-9\] \', .#-]{2,80}$/i', $_POST['address2']))
					{
						$a2 = addslashes($_POST['address2']);
					}else{
						$shipping_errors['address2'] = 'Please enter your street address!';
					}
		
		    if(preg_match('/^[A-Z \'.-]{2,60}$/i', $_POST['city']))
				{
					$c = addslashes($_POST['city']);
				}else{
					$shipping_errors['city'] = 'Please enter your city!';
				}
				
			if(preg_match('/^[A-Z]{2}$/', $_POST['state']))
				{
					$s = $_POST['state'];
				}else{
					$shipping_errors['state'] = 'Please enter your state!';
				}
		
				if(preg_match('/^(\d{5}$)|(^\d{5}-\d{4})$/', $_POST['zip']))
					{
						$z = $_POST['zip'];
					}else{
						$shipping_errors['zip'] = 'Please enter your zip code!';
					}
					
					//validate phone number
					$phone = str_replace(array(' ', '-', '(',')'), '',  $_POST['phone']);
					if(preg_match('/^[0-9]{10}$/', $phone))
						{
							$p = $phone;
						}else{
							$shipping_errors['phone'] = 'Please enter your phone number';
						}
					
					//validate email address
					if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
						{
							$e = $_POST['email'];
							$_SESSION['email'] = $_POST['email'];
						}else{
							$shipping_errors['email'] = 'Please enter a valid email address!';
						}
					
					//store data in the seesion if the shipping information matchs the billing
	if (isset($_POST['use']) && ($_POST['use'] === 'Y')) 
	{
		$_SESSION['shipping_for_billing'] = true;
		$_SESSION['cc_first_name']  = $_POST['first_name'];
		$_SESSION['cc_last_name']  = $_POST['last_name'];
		$_SESSION['cc_address']  = $_POST['address1'] . ' ' . $_POST['address2'];
		$_SESSION['cc_city'] = $_POST['city'];
		$_SESSION['cc_state'] = $_POST['state'];
		$_SESSION['cc_zip'] = $_POST['zip'];
	}
					
	//if no errors add user to database
	if(empty($shipping_errors))
		{
		//not working from book
		//$r = mysqli_query($dbc, "CALL add_customer
		//('$e', '$fn', '$ln', '$a1', '$a2', '$c', '$s', $z, $p, @cid)");
		
		//get random number
		$cid = mt_rand(100000,1000000000);
		// iam storing this in a session because sha1 is not working in chp 13 page423
		$_SESSION['y'] = $cid;
		//above used for final.html and receipet.php pages
		
		//$tid = substr(time().mt_rand(1,100000),6, 9);
		//uniqid() 
		$r = mysqli_query($dbc, "CALL add_customer
		('$e', '$fn', '$ln', '$a1', '$a2', '$c', '$s', $z, $p, $cid)");
		
				//if procedure works retrieve customer id
		if ($r) 

			   //Retrieve the customer ID:
			   //below not working
			   //$r = mysqli_query($dbc, 'SELECT @cid');
			 // $r = mysqli_query($dbc, $q);
		    // if(mysqli_affected_rows($r) ==1)
			 // if (mysqli_num_rows($r) == 1) 
			 //not working
			 //$r = mysqli_query($dbc, 'SELECT @cid');
			 //if(mysqli_affected_rows($r) ==1)
			 // if(4>2)
			   {
                 //list not working   using $_SESSION['customer_id']=1;
				// list($_SESSION['customer_id']) = mysqli_fetch_array($r);
			       
				 $_SESSION['customer_id'] = $cid;
			
				// Redirect to the next page:
				//$location = 'https://' . BASE_URL . 'billing.php';
				  $location = 'https://'.BASE_URL_2.''.MODWRITE.'/billing.php';
				  header("Location: $location");
				  exit();

			}//END  if (mysqli_num_rows($r) == 1)

		//} //END if ($r)
	
	trigger_error('OOpps! Your order could not be processed due to a system error.  We apologize for 
	for the inconvenience.');
	 }//eRRROES OCCURRED if
}//End if($_SERVER['REQUEST_METHOD'] == 'POST')
	
	
	
	//include header file
	$page_title = 'Coffee - Checkout - Your Shipping Information';
include('includes/checkout_header.html');

//retrieve shopping cart contents
$r = mysqli_query($dbc, "CALL get_shopping_cart_contents('$uid')");

//complete

if(mysqli_num_rows($r) >0)
	{
		include('./views/checkout.html');
	}else{
		include('./views/emptycart.html');
	}
	
 include('includes/footer.html');
?>
