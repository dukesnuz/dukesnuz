<?php

//  view_order.php

require('../includes/config.inc.php');


$page_title = 'View An Order';
include('./includes/admin_header.html');

$order_id = false;
if(isset($_GET['oid']) && (filter_var($_GET['oid'], FILTER_VALIDATE_INT, array('min_range' => 1))) )
	{
		$order_id = $_GET['oid'];
		$_SESSION['order_id'] = $order_id;
	}elseif (isset($_SESSION['order_id']) && (filter_var($_SESSION['order_id'], FILTER_VALIDATE_INT, array('min_range'=>1))) )
	{
		$order_id =$_SESSION['order_id'];
	}
	
	//stop order if $order_id not valid
	if(!$order_id)
		{
			echo '<h3>OOpps! Error!</h3><p>This page has been accessed in error.</p>';
			include('./includes/admin_footer.html');
			exit();
		}
		
require(MYSQL_ADMIN);

// i chose to use an include file ...page 377
include('./includes/processing_payment.php');

//define and execute query 
$q ='SELECT FORMAT(total/100, 2) AS total, FORMAT(shipping/100,2) AS shipping, credit_card_number, DATE_FORMAT(order_date, "%a %b %e, %Y at %h:%i%p") AS od, email, CONCAT(last_name, ", ", first_name) AS name, CONCAT_WS(" ", address1, address2, city, state, zip) AS address, phone, o.customer_id, CONCAT_WS(" - ", ncc.category, ncp.name) AS item, ncp.stock, quantity, FORMAT(price_per/100,2) AS price_per, DATE_FORMAT(ship_date, "%b %e, %Y") AS sd FROM orders AS o INNER JOIN customers AS c ON (o.customer_id = c.customer_id) INNER JOIN order_contents AS oc ON (oc.order_id = o.id) INNER JOIN non_coffee_products AS ncp ON (oc.product_id = ncp.id AND oc.product_type="goodies") INNER JOIN non_coffee_categories AS ncc ON (ncc.id = ncp.non_coffee_category_id) WHERE o.id=' .$order_id. '
UNION 
SELECT FORMAT(total/100, 2), FORMAT(shipping/100,2), credit_card_number, DATE_FORMAT(order_date, "%a %b %e, %Y at %l:%i%p"), email, CONCAT(last_name, ", ", first_name), CONCAT_WS(" ", address1, address2, city, state, zip), phone, o.customer_id, CONCAT_WS(" - ", gc.category, s.size, sc.caf_decaf, sc.ground_whole) AS item, sc.stock, quantity, FORMAT(price_per/100,2), DATE_FORMAT(ship_date, "%b %e, %Y") FROM orders AS o INNER JOIN customers AS c ON (o.customer_id = c.customer_id) INNER JOIN order_contents AS oc ON (oc.order_id = o.id) INNER JOIN specific_coffees AS sc ON (oc.product_id = sc.id AND oc.product_type="coffee") INNER JOIN sizes AS s ON (s.id=sc.size_id) INNER JOIN general_coffees AS gc ON (gc.id=sc.general_coffee_id) WHERE o.id='.$order_id;  


$r = mysqli_query($dbc, $q);


//if rows returned start  a form
if(mysqli_num_rows($r) > 0 )
	{
		echo '<h3>View a Order</h3>
		
		<form action ="view_order.php" method="post" accept-charset="utf-8">
			<fieldset>';
			
			//grab first returned row and display info
			$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
			echo '<p><strong>Order ID</strong>:'.$order_id.
			'<br /><strong>Total</strong>:$'.$row['total'].
			'<br /><strong>Shipping</strong>:$'.$row['shipping'].
			'<br /><strong>Order Date</strong>:'.$row['od'].
			'<br /><strong>Customer Name</strong>:' .
			htmlspecialchars($row['name']) . 
			'<br /><strong>Customer Address</strong>:'.
			htmlspecialchars($row['address']) .
			'<br /><strong>Customer Email</strong>:'.
			htmlspecialchars($row['email']) .
			'<br /><strong>Customers Phone</strong>:'.
			htmlspecialchars($row['phone']) .
			'<br /><strong>Credit Card Used</strong>:*'.
			$row['credit_card_number']. '</p>';
			
			//create table
			
			echo '<table border="0" width="100%" cellspacing="8" cellpadding="6">
			<thead>
				<tr>
					<th align="center">Item</th>
					<th align="right">Price Paid</th>
					<th align="center">Quantity in Stock</th>
					<th align="center">Quantity Ordered</th>
					<th align="center">Shipped?</th>
				</tr>
			</thead>
			<tbody>';
		//create flag variable to track if the order has already shipped
			$shipped = true;
			
			do{
				echo '<tr>
						<td align="left">' . $row['item']. '</td>
						<td align="right">' . $row['price_per']. '</td>
						<td align="left">' . $row['stock']. '</td>
						<td align="left">' . $row['quantity']. '</td>
					 	<td align="left">' . $row['sd']. '</td>
					 </tr>';
						
	//update shipping status
	if(!$row['sd']) $shipped = false;
	
			}while ($row = mysqli_fetch_array($r));//complete while loop
			echo '</tbody> </table>';
			


			//if order not entirely shipped create submit button
	if(!$shipped)
		{
			echo '<div class="field"><p class="error">Note that actual payments will be collected
			once you click this button!</p>
			<input type="submit" value="Ship This Order" class="button" /></div>';
		}	
			
			
			
//complete form
echo '</fieldset>
		</form>';
		
		//complete the mysqli_num_rows()
		}else{
			echo '<h3>Opps! Error!</h3><p>This page has been accessed in error.</p>';
			
			include('./includes/admin_footer.html');
			exit();
		}
		
		include('./includes/admin_footer.html');
?>

	


















