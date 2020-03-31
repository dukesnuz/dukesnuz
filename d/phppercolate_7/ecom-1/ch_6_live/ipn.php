<?php
// ipn.php

require('../includes_2/config.inc.php');

//check that script being accessed properly
//if(($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['txn_id']) && ($_POST['txn_type'] === 'web_accept'))
//if(($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['txn_id']) && ($_POST['txn_type'] === 'subscr_payment'))
//if(($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['txn_id']) && ($_POST['txn_type'] === 'subscr_signup'))
 if(4>2)
{
	//initialize curl request handler
	$ch = curl_init();
	 
	//configure curl request

		curl_setopt_array($ch, array (
	    CURLOPT_URL => 'https//www.sandbox.paypal.com/cgi-bin/webscr',
	    CURLOPT_POST => true,
	    CURLOPT_POSTFIELDS => http_build_query(array('cmd' => '_notify-validate') + $_POST),
	    CURLOPT_RETURNTRANSFER => true,
	    CURLOPT_HEADER => false
	));
	
	
	
	//perform curl request
	$response = curl_exec($ch);
	 
	
	//get status of curl response
	$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	 
	//close curl request
	curl_close($ch);
	//echo 0;
	//check that status code was 200 and the response  = verfied
	//if($status === 200 && $response =='VERIFIED')
	 // if ($status === 200 && $response === 'SUCCESS')
	// if ($status === 200  )
      if(4>2)
		{
	  //if(4>2)
			//echo 1;
			//check right values
		  /*
			if(isset($_POST['payment_status']) 
			&&($_POST['payment_status'] === 'Completed')
			&&($_POST['receiver_email'] === 'buyit@ajaxloft.com')
			&&($_POST['mc_gross'] === 1.00)
			&&($_POST['mc_currency'] == 'USD')
			&&(!empty($_POST['txn_id']))
	         )
			 */
	         if(4>2)
	        {
	        	//check for transaction in database
	        	require(MYSQL);
				//echo 2;
				  $txn_id = escape_data($_POST['txn_id'], $dbc);
				  // $txn_id = 55;
				$q = "SELECT id FROM orders WHERE transaction_id = $txn_id ";
				$r = mysqli_query($dbc, $q);
				//echo 22;
					if(mysqli_num_rows($r) === 0)
						{
							//add transaction to orders
							  //$uid = (isset($_POST['custom'])) ? (int) $_POST['custom'] : 0;
							  $uid=60;
							  //$status = escape_data($_POST['payment_status'],$dbc);
							   $status ='Completd';
							   //$amount =(int)($_POST['mc_gross'] * 100);
							  $amount = 1;
							//echo 11;
							$q = "INSERT INTO orders (user_id, transaction_id, payment_status, payment_amount)
							          VALUES('$uid', '$txn_id', '$status', '$amount')";
									  $r = mysqli_query($dbc, $q);
									  //echo 22;
									  if(mysqli_affected_rows($dbc) ===1)
									  	{
									  		//echo 3;//update user table
									  		if($uid > 0)
											
												{
													//echo 33;
													$q = "UPDATE users SET date_expires = IF(date_expires > NOW(),
													ADDDATE(date_expires, INTERVAL 1 YEAR),
													ADDDATE(NOW(), INTERVAL 1 YEAR)), date_modified=NOW()
													WHERE id=$uid";
													
													$r = mysqli_query($dbc, $q);
													//echo 4;
													if(mysqli_affected_rows($dbc)!==1)
														{
															trigger_error('The user\'s expiration date could not be updated!');
														} 
												}//no user id
									  	}else{
									  	//problem inserting order
									  	trigger_error('The transaction could not be stored in the orders table!');	
									  	}
						}				//the order has already been stored, nothing to do
	        } //the correct values do not exist in the $_POST
				
		}else{//if paypal response isnt valid or status code was not 200 log request
		//log for further investigation
		}
}else{//complete first conditional -that checks for $_POST request and more}
echo 'Nothing to do.';
}
