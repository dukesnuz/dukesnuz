<?php

// wishlist.php

 require('./includes/config.inc.php');
 
 //check for or create a user identifier
 if(isset($_COOKIE['SESSION']) && (strlen($_COOKIE['SESSION']) ===32))
 //if(4>2)
 	{
 		$uid = $_COOKIE['SESSION'];
 		//$uid= '507c2b7e9a712a95f22ef2e7503e60ee';
 		
 	}else{
 		 $uid = openssl_random_pseudo_bytes(16);
		 $uid = bin2hex($uid);
 	}
	//send the cookie
	setcookie('SESSION', $uid, time()+(60*60*24*30), '/', 'www.dukesnuz.com');
	
	//include header file
	$page_title = 'Coffee - Your Wish List';
	include('includes/header.html');
	require(MYSQL);
	include('./includes/product_functions.inc.php');
	
	//if there is a sku value in the url break it down into parta
	if(isset($_GET['sku']))
		{
		   list($type, $pid) = parse_sku($_GET['sku']);
		}
   
       //check for product to be added to cart
       if(isset($pid, $type, $_GET['action']) && ($_GET['action'] === 'remove'))
		{
			$r = mysqli_query($dbc, "CALL remove_from_wish_list('$uid', '$type',$pid)");
			//if(!$r) echo mysqli_error($dbc);
		//move to wish list
		}elseif(isset($type, $pid, $_GET['action']) && ($_GET['action'] === 'move'))
		{
		$qty = (filter_var($_GET['qty'], FILTER_VALIDATE_INT, array('min_range' => 1)) !== false) ? $_GET['qty'] :1;
		$r = mysqli_query($dbc, "CALL add_to_wish_list('$uid', '$type', $pid, $qty)");
		//if(!$r) echo mysqli_error($dbc);
		$r = mysqli_query($dbc, "CALL remove_from_cart('$uid','$type',$pid)");		
		//	if(!$r) echo mysqli_error($dbc);		
		//$r = mysqli_query($dbc, "CALL remove_from_cart('$uid', '$type', $pid)");
			//check for a product to be moved into cart	
		//}elseif(isset($type, $pid, $_GET['action'], $_GET['qty']) && ($_GET['action'] === 'move'))
		//	{
		
		
		//to check for an error add below after a procedure call
		//  if(!$r) echo mysqli_error($dbc);
		
		//check for form submission
		}elseif (isset($_POST['quantity']))
			{
				foreach ($_POST['quantity'] as $sku => $qty)
					{
						list($type, $pid) = parse_sku($sku);
							if(isset($type, $pid))
								{
									$qty = (filter_var($qty, FILTER_VALIDATE_INT, array('min_range' => 0)) !== false)? $qty :1;
									$r = mysqli_query($dbc, "CALL update_wish_list('$uid', '$type', $pid, $qty)");
                                   // if(!$r) echo mysqli_error($dbc);
								}
                               
                         }//end foreach
                         
	} //End main IF
								//display carts contents
								 $r = mysqli_query($dbc, "CALL get_wish_list_contents('$uid')");
							   
								  if(!$r) echo mysqli_error($dbc);
								  // echo '<br>'.  $uid;
								
								//include appropriate view
								 if(mysqli_num_rows($r) > 0)
								 //if(4>2)
									{
										 include('./views/wishlist.html');
									}else{//cart is empty
									    include('./views/emptylist.html');
									}
include('includes/footer.html');

?>