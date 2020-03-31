<?php # Script 19.11 - checkout.php
require('includes/config.inc.php');

$page_title = 'Order Confirmation';
include('includes/header.html');

//create 2 temp variables
//see note on p 655 about below variable values used for the script
$cid = 1;
$total = 178.93;

require('includes/mysqli_connect.php');
//disable mysqli_autocommit()
mysqli_autocommit($dbc, FALSE);
//add order to orders
$q ="INSERT INTO orders(customer_id, total)
     VALUES($cid, $total)";
	 
	 $r = mysqli_query($dbc, $q);
	   if(mysqli_affected_rows($dbc) == 1)
	      {
		  //retrieve order id
		  $oid = mysqli_insert_id($dbc);
		  //prepare query that inserts order contents into database
		  $q ="INSERT INTO order_contents (order_id, print_id, quantity, price)
		       VALUES(?,?,?,?)";
		  $stmt= mysqli_prepare($dbc, $q);
		  mysqli_stmt_bind_param($stmt, 'iiid', $oid, $pid, $qty, $price);
		  
		  //run through cart inserting each print into database
		  $affected = 0;
		     foreach($_SESSION['cart'] as $pid => $item)
			    {
				$qty = $item['quantity'];
				$price= $item['price'];
				mysqli_stmt_execute($stmt);
				$affected += mysqli_stmt_affected_rows($stmt);
				}
				mysqli_stmt_close($stmt);
				
				//report on scuccess of transaction
				if($affected == count($_SESSION['cart']))
				   {
				   mysqli_commit($dbc);
				   unset($_SESSION['cart']);
				   echo '<p>Thank you for your order. You will be notified whrn the items ahip.</p>';
				   
				   }else{
				   //handle mysqli issues
				   mysqli_rollback($dbc);
				   echo '<p>Your order could not be processed due to a system error. You will be contacted
				   in order to have the problem fixed. We apologize for the inconvenience.</p>';
				   }
			}else{
			  mysqli_rollback($dbc);
			  echo '<p>Your order could not be processed due to a system error.  You will be contacted in order to
			  have the problem fixed.  We apologize for the inconvenience.</p>';
			  }
			  
			  //complete pageg
			  mysqli_close($dbc);
			  include('includes/footer.html');
			  //see tip page 658 about assigning customer and total variables
			  ?>
			  
				
