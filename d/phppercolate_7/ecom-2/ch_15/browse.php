<?php
  require('includes/config.inc.php');
   
   
   //validate required values
   $type = $sp_cat = $category = false;
   if(isset($_GET['type'], $_GET['category'], $_GET['id']) && 
        filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range' => 1 )))
		{
			$category = $_GET['category'];
			$sp_cat = $_GET['id'];
				//validate product type 
				if($_GET['type'] === 'goodies')
					{
						$type = 'goodies';
					}elseif ($_GET['type'] === 'coffee')
						{
							$type = 'coffee';
						}
		             }
		
		if(!$type || !$sp_cat || !$category)
			{
				$page_title = 'OOppss! Error!';
				include('./includes/header.html');
				include('./views/error.html');
				include('./includes/footer.html');
				exit();
			}
		
		//create a page title and include header
		$page_title = ucfirst($type).' to Buy::' . $category;
		include('./includes/header.html');
		
		require(MYSQL);
		$r = mysqli_query($dbc, "CALL select_products('$type', $sp_cat)");
		
		//if records returned include view file
		if(mysqli_num_rows($r) > 0)
			{
				if($type === 'goodies')
					{
				 
					 include('./views/list_goodies.html');
					 
					}elseif($type === 'coffee')
						{
						 include('./views/list_coffees.html');
						 //added chp 13 for reviews page 440
						 mysqli_next_result($dbc);
						
						    include('./includes/handle_review.php');
						   // echo 'handle_review';
					 $r = mysqli_query($dbc, "CALL select_reviews('$type','$sp_cat')");
					 
					  //if(!$r) echo mysqli_error($dbc);
					 	include('./views/review.html');
						//
						 // echo '<br>review.html';
						 //END added in chp 13
						}
						}else{
						//if no products return no products
						include('./views/noproducts.html');
						}
						
		 include('./includes/footer.html');
		
		 ?>
