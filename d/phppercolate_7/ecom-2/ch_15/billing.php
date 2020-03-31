<?php
// billing.php

 require('includes/config.inc.php');
 
 //start seesion and get session ID
 session_start();
 $uid = session_id();
 
 //redirect invalis users
 if(!isset($_SESSION['customer_id']))
//if(4>6)
 	{
		$location = 'https://'.BASE_URL_2 .''.MODWRITE .'/checkout.php';
		header("Location:$location");
		exit();
 	}
require(MYSQL);
$billing_errors = array();

//check for form submission
if($_SERVER['REQUEST_METHOD'] ==='POST')
	{
		/*page 318 use if magic quotes enabled..I do not believe they are on my server
		 */
		 /*if(get_magic_quotes_gpc() )
			{
				$_POST['cc_first_name'] = stripslashes($_POST['cc_first_name']);
			}
			*/
			if(preg_match('/^[A-Z \'.-]{2,20}$/i', $_POST['cc_first_name']))
				{
					$cc_first_name = $_POST['cc_first_name'];
				}else{
					$billing_errors['cc_first_name'] ='Please enter your first name!';
				}
				
			if(preg_match('/^[A-Z \'.-]{2,40}$/i', $_POST['cc_last_name']))
				{
					$cc_last_name = $_POST['cc_last_name'];
				}else{
					$billing_errors['cc_last_name'] ='Please enter your last name!';
				}
				
	//Stripe chp 15 page 508
	 
				if(isset($_POST['token']))
					{
						$token = $_POST['token'];
					}else{
						$message= 'OOppss! The order cannot be processed. Please make sure you have JavaScript
						enabled and try again.';
						$billing_errors['token'] = true;
						
					}
				//End stripe
				
 
//validate street address
if(preg_match('/^[A-Z0-9 \',.#-]{2,160}$/i',  $_POST['cc_address']))
	{
		$cc_address = $_POST['cc_address'];
	}else{
		$billing_errors['cc_address'] = 'Please enter your street address !';
	}
	
//validate city, state and zop

if(preg_match ('/^[A-Z \'.-]{2,60}$/i', $_POST['cc_city']))
	{
		$cc_city = $_POST['cc_city'];
	}else{
		$billing_errors['cc_city'] = 'Please enter your city!';
	}
		
//if(preg_match ('/^[A-Z]{2}$/', $_POST['cc_state']))
if(preg_match('/^[A-Z]{2}$/', $_POST['cc_state']))
	{
		$cc_state = $_POST['cc_state'];
	}else{
		$billing_errors['cc_state'] ='Please enter your state!';
	}
	
 if (preg_match ('/^(\d{5}$)|(^\d{5}-\d{4})$/', $_POST['cc_zip']))

	{
	$cc_zip = $_POST['cc_zip'];
	}else{
		$billing_errors['cc_zip']= 'Please enter your zip code !';
	}

//if no errors convert expiration date to the correct format
 //echo $billing_errors;
 //echo 'no errors check start';
               // echo 'order id'.$_SESSION['order_id'];
				//echo 'order total'.$_SESSION['order_total'];
				//echo 'customer id'.$_SESSION['customer_id'];
if(empty($billing_errors))
	{
	 
		//check for existing ID in session
		if( isset($_SESSION['order_id'])  && isset($_SESSION['order_total']) )
			{
				//echo 'if session order id ';
				//echo 'order id'.$_SESSION['order_id'];
				//echo 'order total'.$_SESSION['order_total'];
				//echo 'customer id'.$_SESSION['customer_id'];
				$order_id = $_SESSION['order_id'];
				$order_total = $_SESSION['order_total'];
			}else{
				$cc_last_four = 1234;
				//echo 'else last 4';
				//store order
//echo $_SESSION['shipping'];
$shipping = $_SESSION['shipping'] *100;
$shipping = 122;
//echo 'hi';
$r = mysqli_query($dbc, "CALL add_order(
{$_SESSION['customer_id']}, '$uid' , $shipping, $cc_last_four, @total, @oid)");
if(!$r) echo mysqli_error($dbc);	

		if($r)
		//if(4>2)
			{
				$r = mysqli_query($dbc, 'SELECT @total, @oid');
				
				   if(mysqli_num_rows($r) ==1)
					//if(4>2)
						{
							list($order_total, $order_id) = mysqli_fetch_array($r);
							
							//store order id and totla in session
							$_SESSION['order_total'] = $order_total;
							$_SESSION['order_id'] = $order_id;
						}else{//could not retrieve the order ID and total
						unset($cc_number, $cc_cvv, $_POST['cc_number'], $_POST['cc_cvv']);
						trigger_error('OOppss! Your order could not be processed due to a system error.
						We apologize for the inconvenience.');
						}
									
			}else{
				//the add_order() procedure failed
				unset($cc_number, $cc_cvv, $_POST['cc_number'], $_POST['cc_cvv']);
				trigger_error('Your order could not be processed due to a system error. 
				We apologize for the inconvenience.');			
			}
	}//End of isset($_SESSION['order_id']} IF-ELSE
	
	//check order ID and total are set
	if(isset($order_id, $order_total))
		{
		try{
			require_once('includes/lib/Stripe.php');
			Stripe:: setApiKey(STRIPE_PRIVATE_KEY);
			$charge =Stripe_Charge::create(array(
				'amount' => $order_total,
				'currency' => 'usd',
				'card' => $token,
				'description' => $_SESSION['email'],
				'capture' => false
				     )
			    );
				//test success of the operation
				if($charge->paid ==1)
					{
						$full_response = addslashes(serialize($charge));
						//add transaction to data base
						$r = mysqli_query($dbc, "CALL add_charge('{$charge->id}', $order_id, 'auth_only', $order_total, '$full_response')");
					    // if(!$r) echo mysqli_error($dbc);
						//add transaction info to session
						$_SESSION['response_code']= $charge->paid;
						//redirect customer to next page
						 $location = 'https://'.BASE_URL_2.'/'.MODWRITE.'/final.php';
						 header("Location: $location");
						exit();
					 }else{
						//if no charge was made , alert customer
						$message = $charge->failure_message;
					  }
		}//catch card errors
		catch(Stripe_CardError $e)
			{
				$e_json = $e->getJsonBody();
				$err = $e_json['error'];
				$message = $err['message'];
			}//catch other exceptions
			catch (Exception $e)
				{
					trigger_error(print_r($e,1));
		 }
		 //End of stripe
	
			
		}//END of isset($order_id,$order_total)IF
		
		
  } //Errors occurred IF
} //End of REQUEST_METHOD IF

//include header
$page_title = 'Coffee - Checkout - Your Billing Information';
include('./includes/checkout_header.html');

//grab shopping cart contents
$r = mysqli_query($dbc, "CALL get_shopping_cart_contents('$uid')");
if(!$r) echo mysqli_error($dbc);

//include view files
if(mysqli_num_rows($r) >0)
	{
		if(isset($_SESSION['shipping_for_billing']) && ($_SERVER['REQUEST_METHOD'] !=='POST'))
			{
				$values = 'SESSION';
			}else{
				$values = 'POST';
			}
			 include('./views/billing.html');
			 //echo 'id'.$_SESSION['customer_id'];
			 //echo '<br /> order'.$_SESSION['order_id'];
	 }else{//cart empty
	 include('./views/emptycart.html');
	}
	 
include('./includes/footer.html');
?>