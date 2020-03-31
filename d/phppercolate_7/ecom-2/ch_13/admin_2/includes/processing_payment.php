<?php 
// processing_payment.php
//used in view_order.php script
echo 'Process payment';
//check for form submission
if($_SERVER['REQUEST_METHOD']  === 'POST')
	{
		//grab customer _id order total and transaction id
		$q = "SELECT customer_id, total, transaction_id 
		FROM orders AS o JOIN transactions AS t ON (o.id = t.order_id AND t.type = 'auth_only'
		AND t.response_code=1)
		WHERE o.id = $order_id";
		
		$r = mysqli_query($dbc, $q);
		//echo 22;
		//if one row grabbed grab values
		if(mysqli_num_rows($r) === 1)
			{
				//echo 33;
					
				list($customer_id, $order_total, $trans_id)= mysqli_fetch_array($r, MYSQLI_NUM);
				//check for + payment
				if($order_total> 0)
				{
					//echo 44;
					//include Authorize.net and create AuthotiseNetAim
					//require('includes/vendor/anet_php_sdk/AuthorizeNet.php');
			     	require('../includes/vendor/anet_php_samples-1.1.8/samples/anet_php_sdk/AuthorizeNet.php');
				  	//define('API_LOGIN_ID', '3vhaWDX48pCT');
					//define('TRANSACTION_KEY', '473372');
	
	                 $aim = new AuthorizeNetAIM(API_LOGIN_ID, TRANSACTION_KEY);
			
					//capture payment
					$response = $aim->priorAuthCapture($trans_id, $order_total/100);
					//record transaction results
					
					$reason = addslashes($response->response_reason_text);
					$full_response = addslashes($response->response);
					  //echo $full_response;
					$r = mysqli_query($dbc, "CALL add_transaction($order_id, '{$response->transaction_type}',
							$order_total, {$response->response_code}, '$reason',{$response->transaction_id}, '$full_response')");
				
					if(!$r) echo mysqli_error($dbc);
					//echo 55;		
					//if success
					if($response->approved)
						{
							$message = 'The payment has been made. You may now ship the order.';
						//echo 66;	
							
					//update order_contents table
					$q = "UPDATE order_contents SET ship_date=NOW()
							WHERE  order_id = $order_id";
							$r = mysqli_query($dbc, $q);
							
					//update inventory
					$q = 'UPDATE specific_coffees AS sc, order_contents AS oc 
							SET sc.stock=sc.stock-oc.quantity
							WHERE sc.id = oc.product_id AND oc.product_type = "coffee" 
							AND oc.order_id '.$order_id ;
							$r = mysqli_query($dbc, $q);
							
							$q= 'UPDATE non_coffee_products AS ncp, order_contents AS oc
								SET ncp.stock=ncp.stock-oc.quantity 
								WHERE ncp.id = oc.product_id AND oc.product_type="goodies"
								AND oc.order_id = '. $order_id;
								$r = mysqli_query($dbc, $q);
								
				//if payment error
				}else{
					$error = 'The payment could not be processed because:'.$response->response_reason_text;
				//echo 77;	
				} //END of payment response IF_ELSE
		}else{
			//invalid order
			$error = "The order total(\$$order_total) is invalid.";
		} //END of $order_total IF-ELSE
	//if no matching orders founs
	}else{
		$error = 'No matching order could be found.';
		}// END of transaction ID IF-ELSE
		
		//report messages or errors
		echo '<h3>Order Shipping Results</h3>';
		if(isset($message)) echo "<p>$message</p>";
		if(isset($error)) echo "<p class=\"error\">$error</p>";
		
		}// END of submission IF