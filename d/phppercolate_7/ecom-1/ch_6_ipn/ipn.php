<?php
// ipn.php

require('../includes_2/config.inc.php');

//mail('david@ajaxtransport.com', 'line1', 'line1', 'From:admin@example.com');
// Check for a POST request, with a provided transaction ID:
//if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['txn_id']) && ($_POST['txn_type'] === 'web_accept') ) {
if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['txn_id']) && ($_POST['txn_type'] === 'subscr_payment') ) {
	// if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['txn_id'])  ) {
 //if(4>2){
	// mail('david@ajaxtransport.com', 'line2', 'line2', 'From:admin@example.com');
	// Create the cURL handler:
	$ch = curl_init();
	
	// Configure the request:
	curl_setopt_array($ch, array (
	    CURLOPT_URL => 'https://www.sandbox.paypal.com/cgi-bin/webscr',
	    CURLOPT_POST => true,
	    CURLOPT_POSTFIELDS => http_build_query(array('cmd' => '_notify-validate') + $_POST),
	    CURLOPT_RETURNTRANSFER => true,
	    CURLOPT_HEADER => false
	));
	//mail('david@ajaxtransport.com', 'line3', 'line3', 'From:admin@example.com');
	// Execute the request:
	$response = curl_exec($ch);
	
	// Get the status code:
	$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	//mail('david@ajaxtransport.com', 'line4', 'line4', 'From:admin@example.com');
	// Close the connection:
	curl_close($ch);
   // mail('david@ajaxtransport.com', 'line44', 'line44', 'From:admin@example.com');
	// Check that it worked:
	//if ($status === 200 && $response === 'SUCCESS') 
	if ($status === 200 && $response === 'VERIFIED') 
	//if ($status === 200)
	{
	//mail('david@ajaxtransport.com', 'line5', 'line5', 'From:admin@example.com');
		// Check for the right values:
		if ( isset($_POST['payment_status'])
	  //if ( isset($_POST['payer_status'])
		&& ($_POST['payment_status'] === 'Completed')
	  //&& ($_POST['payer_status'] === 'verified')
		&& ($_POST['receiver_email'] === 'buynow@example.com')
		&& ($_POST['mc_gross'] === '10.00')
	    && ($_POST['mc_currency']  === 'USD') 
		&& (!empty($_POST['txn_id']))
		 ) {

			// Need the database connection now:
			require(MYSQL);
			
	mail('david@ajaxtransport.com', 'PayPal ipn.php page accessed',
			'response'. $response. 
			'payment_status'.$_POST['payment_status'].
   			'receiver_email'.$_POST['receiver_email'].
  			'currency'.$_POST['mc_currency'].
			'mc_gross'.$_POST['mc_gross'].
			'tx'.$_POST['txn_id']
			
			, 'From:admin@example.com');
			
			// Check for this transaction in the database:
			$txn_id = escape_data($_POST['txn_id'], $dbc);			
			$q = "SELECT id FROM orders WHERE transaction_id='$txn_id'";
			$r = mysqli_query($dbc, $q);
			if (mysqli_num_rows($r) === 0) 
			{ // Add this new transaction:
				
				$uid = (isset($_POST['custom'])) ? (int) $_POST['custom'] : 0;
				 $status = escape_data($_POST['payment_status'], $dbc);
				//$status = escape_data($_POST['payer_status'], $dbc);
				$amount = (int) ($_POST['mc_gross'] * 100);
				
				//mail('david@ajaxtransport.com', 'line6', 'line6', 'From:admin@example.com');
				
				$q = "INSERT INTO orders (user_id, transaction_id, payment_status, payment_amount) VALUES ($uid, '$txn_id', '$status', $amount)";
				$r = mysqli_query($dbc, $q);
				if (mysqli_affected_rows($dbc) === 1) {
			//mail('david@ajaxtransport.com', 'line7', 'line7', 'From:admin@example.com');
					if ($uid > 0) {
	
						// Update the users table:
						$q = "UPDATE users SET date_expires = IF(date_expires > NOW(), ADDDATE(date_expires, INTERVAL 1 YEAR), ADDDATE(NOW(), INTERVAL 1 YEAR)), date_modified=NOW() WHERE id=$uid";
						$r = mysqli_query($dbc, $q);
						if (mysqli_affected_rows($dbc) !== 1) {
							trigger_error('The user\'s expiration date could not be updated!');
						}
	
					} // No user ID.
					
			//mail('david@ajaxtransport.com', 'line7', 'line7', 'From:admin@example.com');
					
				} else { // Problem inserting the order!
					trigger_error('The transaction could not be stored in the orders table!');						
				}
		
			} // The order has already been stored, nothing to do!
		
		} // The right values don't exist in $_POST!
		
	} else { // Bad response!
		// Log for further investigation.		
	}
	
} else { // This page was not requested via POST, no reason to do anything!
	echo 'Nothing to do.';
}
?>