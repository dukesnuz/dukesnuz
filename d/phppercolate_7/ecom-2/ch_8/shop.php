<?php
  require('includes/config.inc.php');
   
   //validate product type
   if(isset($_GET['type']) && ($_GET['type'] === 'goodies'))
   	{
   		$page_title = 'Our goodies, by Category';
		$type= 'goodies';
   	}else{
   		$page_title = 'Our Coffee Products';
		$type= 'coffee';
   	}
	
	
	//include header
	include('./includes/header.html');
	require(MYSQL);
	
	//call stored procedure
	$r = mysqli_query($dbc, "CALL select_categories('$type')");
	
	//for debugging in phpadmin
	//  CALL select_categories('goodies');
	// CALL select_categories('coffee');
	
	//if records returned include view file
	if(mysqli_num_rows($r) >0)
	//if(4>6)
		{
			 include('./views/list_categories.html');
		}else{
			//no records return error view
		 	include('./views/error.html');
		}
		
include('./includes/footer.html');
?>