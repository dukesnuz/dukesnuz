<?php
// create_sales.php

require('../includes/config.inc.php');
$page_title = 'Create Sales';
include('./includes/admin_header.html');
require(MYSQL_ADMIN);


//check for form submission
if($_SERVER['REQUEST_METHOD'] === 'POST')
	{
		//echo 66;
	//	echo $_POST['sale_price'];
		if(isset($_POST['sale_price'], $_POST['start_date'], $_POST['end_date']))
			{
				//parse sku
			//echo 77;
			 require('../includes/product_functions.inc.php');
			 $q = 'INSERT INTO sales (product_type, product_id, price, start_date, end_date)
			 		VALUES(?,?,?,?,?)';
			 $stmt = mysqli_prepare($dbc, $q);
			 
			 mysqli_stmt_bind_param($stmt, 'siiss', $type, $id, $price, $start_date, $end_date);
			
			 //Loop through each submitted value
			 $affected = 0;
			 //echo 88;
			 foreach($_POST['sale_price'] as $sku => $price)
			 	{
			 		//validate price and start date
			 		
			 		if(filter_var($price, FILTER_VALIDATE_FLOAT) && ($price > 0)
						&& (!empty($_POST['start_date'][$sku]))
						&& (preg_match('/^(201)[3-9]\-[0-1]\d\-[0-3]\d$/', $_POST['start_date'][$sku])) )
							{
								//parse sku
								//echo 11;
								list($type, $id) = parse_sku($sku);
								
								//associate dates w/variables
								$start_date = $_POST['start_date'][$sku];
								$end_date = (!empty($_POST['end_date'][$sku]) 
								&& preg_match('/^(201)[3-9]\-[0-1]\d\-[0-3]\d$/', $_POST['end_date'][$sku]))
								? $_POST['end_date'][$sku] : NULL;
								//convert price to cents and execute
								$price = $price*100;
								//echo 22;
								mysqli_stmt_execute($stmt);
								
								//echo 99;
								$affected += mysqli_stmt_affected_rows($stmt);
			 	}// END of price/date validation IF
			}// END of FOREACH loop
			//indicate results and complete form submission credentials
			echo "<h4>$affected Sales Were Created.</h4>";
	}//$_POST variables are not set
	}// END of the submission IF
?>

<!--begin form -->
<h3>Create Sales</h3>
<P>To mark an item as being on sale, indicate the sale price, the date the sales starts,
	and the date the sale ends. <strong>All dates must be in the format YYY-MM-DD.</strong>
	You may leave the end date blank, thereby creating an open-ended sale.  Only the
	currently stocked products are listed below!</P>
	 
	 <form action="create_sales.php" method="post" accept-charset="utf-8">
	 	<fieldset>
	 		<table border="0" width="100%" cellspacing="4" cellpadding="6">
	 			<thead>
	 				<tr>
	 					<th align="center">Item</th>
	 					<th align="center">Normal Price</th>
	 					<th align="center">Quantity in Stock</th>
	 					<th align="center">Sale Price</th>
	 					<th align="center">Start Date</th>
	 					<th align="center">End Date</th>
	 				</tr>
	 			</thead>
	 		<tbody>
	 			
<?php
//grab products in stock
$q =   '(SELECT CONCAT("G", ncp.id) AS sku, ncc.category, ncp.name, FORMAT(ncp.price/100, 2) AS price, ncp.stock
		FROM non_coffee_products AS ncp
		INNER JOIN non_coffee_categories AS ncc ON ncc.id=ncp.non_coffee_category_id
		WHERE ncp.stock >0 ORDER BY category, name)
		UNION(SELECT CONCAT("C", sc.id), gc.category, CONCAT_WS(" - ", s.size, sc.caf_decaf, sc.ground_whole),
		FORMAT(sc.price/100,2), sc.stock
		FROM specific_coffees AS sc		
		INNER JOIN sizes AS s ON s.id=sc.size_id
		INNER JOIN general_coffees AS gc ON gc.id=sc.general_coffee_id
		WHERE sc.stock > 0 ORDER BY sc.general_coffee_id, sc.size, sc.caf_decaf, sc.ground_whole)';
		
		$r = mysqli_query($dbc, $q);
		if(!$r) echo mysqli_error($dbc);
		//print items as its own row
		while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
			{
			  echo '<tr>
					<td align="right">'. htmlspecialchars($row['category']). '::' .htmlspecialchars($row['name']).'</td>
					<td align="center">'.$row['price'].'</td>
					<td align="center">'.$row['stock'].'</td>
					<td align="center"><input type="text" name="sale_price['.$row['sku'].'] class="small" /></td>
					<td align="center"><input type="text" name="start_date['.$row['sku'].']" class="calender" /></td>
					<td align="center"><input type="text" name="end_date['.$row['sku'].']" class="calender" /></td>
					</tr>';
			}
	 			
	 ?>			
			
	 		</tbody>
	 		</table>
	 		<div class="field"><input type="submit" value="add These Sales" class="button" /></div>
	 		
	 	</fieldset>
	 </form>
<!--date_picker chp 14 page 464-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1.themes/hotsneaks/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<link rel="stylesheet" href="../css/date_picker/jquery-ui.min.css">
 <script type="text/javascript">
 	$(function(){
 		$(".calender").datepicker({dateFormat: "yy-mm-dd", minDate:0});
 	});
 	
 		
 </script>
	 <?php // Include the HTML footer:
include('./includes/admin_footer.html');
 
?>