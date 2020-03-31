<?php
// sales.php

include('includes/config.inc.php');
$page_title = 'Sales Items';
include('includes/header.html');
require(MYSQL);

$r = mysqli_query($dbc, 'CALL select_sale_items(true)');

if(mysqli_num_rows($r) > 0)
	{
		 include('./views/list_sales.html');
		 
	}else{
		include('./views/noproducts.html');
	}
include('includes/footer.html');