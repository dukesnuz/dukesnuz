<?php

// receipt.php

require('includes/config.inc.php');
//validate below used for sha1(email)...not working
 // if(!isset($_GET['x'], $_GET['y']) || !filter_var($_GET['x'], 
  //     FILTER_VALIDATE_INT, array('min_range' => 1)) || (strlen($_GET['y']) !==40) )
 //I changed this ..Iam using customer id to validate customer not sha1(email) 
 if(!isset($_GET['x'], $_GET['y']) || !filter_var($_GET['x'], 
     FILTER_VALIDATE_INT, array('min_range' => 1)) || (strlen($_GET['y']) >12) )
  
  
// if(4>6) 	
{
	 		$location = 'https://'. BASE_URL.'ch_13/index.php';
			header("Location: $location");
			exit();
	 	}else{
	 		$order_id = $_GET['x'];
			$email_hash = $_GET['y'];
			//sha1 not working in mysqli so I am using customer id which is always random
	 	}

require(MYSQL);
include('./includes/plain_header.html');

//grab order info
 $q = 'SELECT FORMAT(total/100, 2) AS total, FORMAT(shipping/100,2) AS shipping, 
 credit_card_number, DATE_FORMAT(order_date, "%a %b %e, %Y at %h:%i%p") 
 AS od, email, CONCAT(last_name, ", ", first_name) AS name, 
 CONCAT_WS(" ", address1, address2, city, state, zip) AS address, phone, 
 CONCAT_WS(" - ", ncc.category, ncp.name) AS item, quantity, 
 FORMAT(price_per/100,2) AS price_per FROM orders AS o 
 INNER JOIN customers AS c ON (o.customer_id = c.customer_id) 
 INNER JOIN order_contents AS oc ON (oc.order_id = o.id) 
 INNER JOIN non_coffee_products AS ncp ON (oc.product_id = ncp.id AND oc.product_type="goodies") 
 INNER JOIN non_coffee_categories AS ncc ON (ncc.id = ncp.non_coffee_category_id) 
 WHERE o.id=? AND c.customer_id=?
 UNION 
 SELECT FORMAT(total/100, 2), FORMAT(shipping/100,2), credit_card_number, 
 DATE_FORMAT(order_date, "%a %b %e, %Y at %l:%i%p"), email, 
 CONCAT(last_name, ", ", first_name), 
 CONCAT_WS(" ", address1, address2, city, state, zip), phone, 
 CONCAT_WS(" - ", gc.category, s.size, sc.caf_decaf, sc.ground_whole) AS 
 item, quantity, FORMAT(price_per/100,2)  FROM orders AS o 
 INNER JOIN customers AS c ON (o.customer_id = c.customer_id) 
 INNER JOIN order_contents AS oc ON (oc.order_id = o.id) 
 INNER JOIN specific_coffees AS sc ON (oc.product_id = sc.id AND oc.product_type="coffee") 
 INNER JOIN sizes AS s ON (s.id=sc.size_id) 
 INNER JOIN general_coffees AS gc ON (gc.id=sc.general_coffee_id) 
 WHERE o.id=? AND c.customer_id=?';
//$q = 'SELECT FORMAT(total/100, 2) AS total, FORMAT(shipping/100,2) AS shipping, credit_card_number, DATE_FORMAT(order_date, "%a %b %e, %Y at %h:%i%p") AS od, email, CONCAT(last_name, ", ", first_name) AS name, CONCAT_WS(" ", address1, address2, city, state, zip) AS address, phone, CONCAT_WS(" - ", ncc.category, ncp.name) AS item, quantity, FORMAT(price_per/100,2) AS price_per FROM orders AS o INNER JOIN customers AS c ON (o.customer_id = c.customer_id) INNER JOIN order_contents AS oc ON (oc.order_id = o.id) INNER JOIN non_coffee_products AS ncp ON (oc.product_id = ncp.id AND oc.product_type="goodies") INNER JOIN non_coffee_categories AS ncc ON (ncc.id = ncp.non_coffee_category_id) WHERE o.id=? AND email="david@ajaxtransport.com"
//UNION 
//SELECT FORMAT(total/100, 2), FORMAT(shipping/100,2), credit_card_number, DATE_FORMAT(order_date, "%a %b %e, %Y at %l:%i%p"), email, CONCAT(last_name, ", ", first_name), CONCAT_WS(" ", address1, address2, city, state, zip), phone, CONCAT_WS(" - ", gc.category, s.size, sc.caf_decaf, sc.ground_whole) AS item, quantity, FORMAT(price_per/100,2)  FROM orders AS o INNER JOIN customers AS c ON (o.customer_id = c.customer_id) INNER JOIN order_contents AS oc ON (oc.order_id = o.id) INNER JOIN specific_coffees AS sc ON (oc.product_id = sc.id AND oc.product_type="coffee") INNER JOIN sizes AS s ON (s.id=sc.size_id) INNER JOIN general_coffees AS gc ON (gc.id=sc.general_coffee_id) WHERE o.id=? AND email="david@ajaxtransport.com"';
//prepare and execute query
$stmt = mysqli_prepare($dbc, $q);
 
mysqli_stmt_bind_param($stmt, 'isis', $order_id, $email_hash, $order_id, $email_hash);
 //mysqli_stmt_bind_param($stmt, 'ii', $order_id,   $order_id );
 
mysqli_stmt_execute($stmt);
 
//confirm number of results
mysqli_stmt_store_result($stmt);
 
 if (mysqli_stmt_num_rows($stmt) > 0)
 // if(4>2)
{
		echo '<h3>Your Order</h3>';
		//bind results to php variables
		mysqli_stmt_bind_result($stmt, $total, $shipping, $cc_num, $order_date, $email, 
		                          $name, $address, $phone, $item, $quantity, $price);
		mysqli_stmt_fetch($stmt);
		
		//display general oder info
echo '<p><strong>Order ID</strong>:'.$order_id.'</p>
<p><strong>Order Date</strong>:'.$order_date.'</p>
<p><strong>Customer Name</strong>:'.htmlspecialchars($name).'</p>
<p><strong>Shipping Address</strong>:'.htmlspecialchars($address).'</p>
<p><strong>Customer Email</strong>:'.htmlspecialchars($email).'</p>
<p><strong>Customer Phone</strong>:'.htmlspecialchars($phone).'</p>
<p><strong>Credit Card Number</strong>: *'.$cc_num.'</p>';

//create table showing data
echo '<table border="0" cellspacing="3" cellpadding="3">
	<thead>
		<tr>
			<th align="center">Item</th>
			<th align="center">Quantity</th>
			<th align="right">Price</th>
			<th align="right">Subtotal</th>
		</tr>
	</thead>
	<tbody>';
	
	//print each item
do{
	echo '<tr>
			<td align="left">'.$item.'</td>
			<td align="center">'.$quantity.'</td>
			<td align="right">'.$price.'</td>
			<td align="right">$'.number_format($price * $quantity, 2) .' </td>
		 </tr>';
}while (mysqli_stmt_fetch($stmt));

//add shipping and total

echo '<tr>
		<td align="right" colspan="3"><strong>Shipping</strong></td>
		<td align="right">$'.$shipping.'</td>
	 </tr>';
	echo '<tr>
			<td align="right" colspan="3"><strong>Total</strong></td>
			<td align="right">$'.$total.'</td>
		</tr>';
//complete table
echo '</tbody></table>';

//if no rows print error
}else{
	echo '<h3>OOpps! Error!</h3><p>This page has been accessed in error.</p>';
 // echo  $email_hash;
}
		
	//complete the page
	include('./includes/plain_footer.html');
?>