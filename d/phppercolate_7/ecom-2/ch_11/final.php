<?php
//final.php
require('./includes/config.inc.php');

session_start();
$uid = session_id();

//validate page being accessed correctly

if(!isset($_SESSION['customer_id']))
	{
		$location = 'https://'.BASE_URL_2.'/'.MODWRITE.'/checkout.php';
		header("Location: $location");
		exit();
	}
	
	
	require(MYSQL);
	
	//clear shopping cart
	
$r = mysqli_query($dbc, "CALL clear_cart('$uid')");
if(!$r) echo mysqli_error($dbc);	

$page_title = 'Coffee - Checkout - Your Order is Complete';
include('./includes/checkout_header.html');
include('./views/final.html');
//clear session
 $_SESSION = array();

include('./includes/footer.html');
?>