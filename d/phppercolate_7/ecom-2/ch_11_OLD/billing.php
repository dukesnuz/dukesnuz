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
				
				//remove spaces dashes from credit card
				$cc_number = str_replace(array(' ', '-'), '', $_POST['cc_number']);
				//validate credit card
			 	if(!preg_match('/^4[0-9]{12}(?:[0-9]{3})?$/' , $cc_number) //visa
			 	  && !preg_match('/^5[1-5][0-9]{14}$/', $cc_number) //mastercard
			 	  && !preg_match('/^3[47][0-9]{13}$/', $cc_number) //american express
			      && !preg_match('/^6(?:011|5[0-9]{2})[0-9]{12}$/', $cc_number)  )//discover
		 
				{
					$billing_errors['cc_number'] = 'Please enter your credit card number!';
				}
				
	//validate expiration date
	if(($_POST['cc_exp_month'] <1 || $_POST['cc_exp_month'] > 12 ))
		{
			$billing_errors['cc_exp_month'] ='Please enter your expiration month!';
		}
	if($_POST['cc_exp_year'] < date('Y'))
		{
			$billing_errors['cc_exp_year'] ='Please enter your expiration year!';
		}
		
  //validate CVV
  if(preg_match('/^[0-9]{3,4}$/', $_POST['cc_cvv']))
  	{
  		$cc_cvv = $_POST['cc_cvv'];
  	}else{
  		$billing_errors['cc_cvv'] = 'Please enter your CVV !';
  	}
		
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
if(empty($billing_errors))
	{
		// echo 'no errors  ';
		$cc_exp = sprintf('%02d%d' , $_POST['cc_exp_month'], $_POST['cc_exp_year']);
		
		//check for existing ID in session
		if(isset($_SESSION['order_id']))
			{
				//echo 'if session order id ';
				//echo 'order id'.$_SESSION['order_id'];
				//echo 'order total'.$_SESSION['order_total'];
				//echo 'customer id'.$_SESSION['customer_id'];
				$order_id = $_SESSION['order_id'];
				$order_total = $_SESSION['order_total'];
			}else{
				$cc_last_four = substr($cc_number, -4);
				//echo 'else last 4';
				//store order
//echo $_SESSION['shipping'];
$shipping = $_SESSION['shipping'] *100;
//$shipping = 122;
//echo 'hi';
$r = mysqli_query($dbc, "CALL add_order(
{$_SESSION['customer_id']}, '$uid' , $shipping, $cc_last_four, @total, @oid)");

//if(!$r) echo mysqli_error($dbc);	
//echo 'hi 2';
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
			//require('includes/vendor/anet_php_sdk/AuthorizeNet.php');
			require('includes/vendor/anet_php_samples-1.1.8/samples/anet_php_sdk/AuthorizeNet.php');
			$aim = new AuthorizeNetAIM(API_LOGIN_ID, TRANSACTION_KEY);
			$aim->amount = $order_total/100;
			$aim->invoice_num =$order_id;
			$aim->cust_id = $_SESSION['customer_id'];
			$aim->card_num = $cc_number;
			$aim->exp_date = $cc_exp;
			$aim->card_code = $cc_cvv;
			$aim->first_name = $cc_first_name;
			$aim->last_name = $cc_last_name;
			$aim->address = $cc_address;
			$aim-> state = $cc_state;
			$aim-> city = $cc_city;
			$aim-> zip = $cc_zip;
			
			//set customers email
			$aim->email = $_SESSION['email'];
			
			//perform request
			$response = $aim->authorizeOnly();
			
			//add slashes
			$reason = addslashes($response->response_reason_text);
			$full_response = addslashes($response->response);
			
			//record transaction in database
			$r = mysqli_query($dbc, "CALL add_transaction
			($order_id, '{$response->transaction_type}', $order_total, {$response->response_code},
			'$reason', {$response->transaction_id}, '$full_response')");
			
			//if success store response code in session
			//if($response->approved)
			//using below line to avert errors from authorize dot net and proceed to next level
			if(4>2)
				{
					$_SESSION['response_code'] = $response->response_code;
					//redirect user
					$location = 'https://'.BASE_URL_2.'/'.MODWRITE.'/final.php';
					header("Location: $location");
					exit();
				}else{
					//if not a success
				switch($response->response_code)
				{
					case '2': //declined
						$message = $response->response_reason_text . '2 Please fix the error or try another card.';
					break;
					case '3': //Error
					$message = $response->response_reason_text . '3 Please fix the error or try another card.';
					break;
					case '4'://Held for review
					$message = " 4 The transaction is being held for review. You will be contacted ASAP about your order.
					We apologize for any inconvenience.";
					break;
				}
			}//End of$response_array[0] IF_ELSE
			
			
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