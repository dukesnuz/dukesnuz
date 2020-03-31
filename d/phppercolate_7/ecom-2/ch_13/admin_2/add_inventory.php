<?php
// add_inventory.php
require('../includes/config.inc.php');

$page_title = 'Add Inventory';
include('./includes/admin_header.html');
require(MYSQL_ADMIN);


//check for form submission
if($_SERVER['REQUEST_METHOD'] ==='POST')
	{
		if(isset($_POST['add']) && is_array($_POST['add']))
			{
				//parse sku 
				require('../includes/product_functions.inc.php');
				//define 2 querys
				$q1 = 'UPDATE specific_coffees SET stock=stock+? WHERE id=?';
				$q2 = 'UPDATE non_coffee_products SET stock=stock+? WHERE id=?';
				$stmt1 = mysqli_prepare($dbc,$q1);
				$stmt2 = mysqli_prepare($dbc, $q2);
				
				//bind variables
				mysqli_stmt_bind_param($stmt1, 'ii', $qty, $id);
				mysqli_stmt_bind_param($stmt2, 'ii', $qty, $id);
				
				//loop through submitted value
				$affected = 0;
				 foreach($_POST['add'] as $sku => $qty)
				 	{
						 if(filter_var($qty, FILTER_VALIDATE_INT, array('min_range' => 1)))
							 
						 	{
								//parse the sku
								 list($type, $id) = parse_sku($sku);
								
								//execute correct prepared statement
								if($type === 'coffee')
									{
									 	mysqli_stmt_execute($stmt1);
									 	$affected += mysqli_stmt_affected_rows($stmt1);
									}elseif($type == 'goodies')
									{
										mysqli_stmt_execute($stmt2);
										$affected +=mysqli_stmt_affected_rows($stmt2);
									}
								}  //END of IF
						 	} //END of FOREACH */
					echo "<h4>$affected Items(s) Were Updated!</h4>";					
					}//END of $_POST['add'] IF
	       }//END of the submission IF
	
//begin the form
?>
<h3>Add Inventory</h3>
<form action="add_inventory.php" method="post" accept-charset="utf-8">
	<fieldset><legend>Indicate how many addistional quantity of each product should be added to the inventory.</legend>
		
		<!--create table-->
		<table border="0" width="100%" cellspacing="4" cellpadding="4">
			<thead>
				<tr>
					<th align="right">Item</th>
					<th align="right">Normal Price</th>
					<th align="center">Quantity in Stock</th>
					<th align="center">Add</th>
				</tr>
			</thead>
			
			<tbody>
				<?php 
				//grab all products
				$q = '(SELECT CONCAT("G", ncp.id) AS sku, ncc.category, ncp.name, FORMAT(ncp.price/100, 2)
				AS price, ncp.stock FROM non_coffee_products AS ncp 
				INNER JOIN non_coffee_categories AS ncc ON ncc.id=ncp.non_coffee_category_id
				ORDER BY category, name)
				UNION(SELECT CONCAT("C", sc.id), gc.category, 
				CONCAT_WS(" - ", s.size, sc.caf_decaf, sc.ground_whole),
				FORMAT(sc.price/100, 2), sc.stock FROM specific_coffees AS sc 
				INNER JOIN sizes AS s ON s.id=sc.size_id
				INNER JOIN general_coffees AS gc ON gc.id=sc.general_coffee_id ORDER By
				sc.general_coffee_id, sc.size, sc.caf_decaf, sc.ground_whole)';
				$r = mysqli_query($dbc, $q);
				
				//create a table row for each product
				while($row=mysqli_fetch_array($r, MYSQLI_ASSOC))
					{
						echo '<tr>
						<td align="right">'. htmlspecialchars($row['category']).'::'.htmlspecialchars($row['name']).'</td>
						<td align="center">'.$row['price'].'</td>
						<td align="center">'.$row['stock'].'</td>
						<td align="center"><input type="text" name="add['.$row['sku'].']" size="5" class="small" /></td>
						</tr>';
					}
?>
			</tbody>
		</table>
		<div class="field"><input type="submit" value="Add The Inventory" class="button" /></div>
	</fieldset>
</form>
								
<?php include('./includes/admin_footer.html'); ?>