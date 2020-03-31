<?php

require('../includes/config.inc.php');

$page_title = 'View All Orders';
include('./includes/admin_header.html');
require(MYSQL_ADMIN);

// create a table
echo '<h3>View Orders</h3><table border="0" width="100%" cellspacing="4" cellpadding="4" id="orders">
<thead>
	<tr>
		<th align="center">Order ID</th>
		<th align="center">Total</th>
		<th align="right">Customer Name</th>
		<th align="right">City</th>
		<th align="center">State</th>
		<th align="center">Zip</th>
		<th align="center">Left to Ship</th>
	</tr>
</thead>

	<tbody>';
	
	//define and execute query
/*$q =   'SELECT o.id, FORMAT(total/100, 2) AS total, c.id AS cid,
		CONCAT(last_name, ",", first_name) AS name, city, state,zip,
		COUNT(oc.id) AS items FROM orders AS o 
		LEFT OUTER JOIN order_contents AS oc ON 
		(oc.order_id=o.id AND oc.ship_date IS NULL)
		JOIN customers AS c ON (o.customer_id = c.id)
		JOIN transactions AS t ON (t.order_id=o.id AND t.response_code=1)
		GROUP BY o.id DESC';
*/
//use below because in mysqli table customer..created customer_id column
/*$q =   'SELECT o.id, FORMAT(total/100, 2) AS total, c.customer_id AS cid,
		CONCAT(last_name, ",", first_name) AS name, city, state,zip,
		COUNT(oc.id) AS items FROM orders AS o 
		LEFT OUTER JOIN order_contents AS oc ON 
		(oc.order_id=o.id AND oc.ship_date IS NULL)
		JOIN customers AS c ON (o.customer_id = c.customer_id)
		JOIN transactions AS t ON (t.order_id=o.id AND t.response_code=1)
		GROUP BY o.id DESC';	
	*/	
		
		//below used for stripe
		
		
		$q =   'SELECT o.id, FORMAT(total/100, 2) AS total, c.customer_id AS cid,
		CONCAT(last_name, ",", first_name) AS name, city, state,zip,
		COUNT(oc.id) AS items FROM orders AS o 
		LEFT OUTER JOIN order_contents AS oc ON 
		(oc.order_id=o.id AND oc.ship_date IS NULL)
		JOIN customers AS c ON (o.customer_id = c.customer_id)
		JOIN charges AS ch ON ch.order_id=o.id 
		GROUP BY o.id DESC';	
		
	 
			
		$r = mysqli_query($dbc, $q);
		
		//print each record in table
		while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
			{
				echo '<tr>
						<td align="center"><a href="view_order.php?oid='.$row['id'].'">'. $row['id'].'</a></td>
						<td align="center">$'.$row['total'].'</td>
						<td align="right"><a href="view_customer.php?cid='.$row['cid'].'">'.htmlspecialchars($row['name']).'</a></td>
						<td align="right">'. htmlspecialchars($row['city']). '</td>
						<td align="center">'.$row['state'].'</td>
						<td align="center">'.$row['zip'].'</td>
						<td align="center">'. $row['items'].'</td>
						</tr>';
			}
						
	echo'</tbody>
			</table>';
?>
<!-- add pagenation chapter 14 page 467-->
 <!-- DataTables CSS -->
 <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.2/css/jquery.dataTables.css">
 <!-- jQuery -->
 <script type+"text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
 <!-- DataTables -->
 <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.2/js/jquery.dataTables.js"></script>


<script type="text/javascript">
	$(function(){
		$("#orders").dataTable();
	});
</script>
<?php
 // Include the HTML footer:
include('./includes/admin_footer.html');
 
?>
		