<?php #Script  19.9 - add_cart.php
require('includes/config.inc.php');

$page_title ='Add to Cart.';
include('includes/header.html');
//check that a script was passed to this script
if(isset($_GET['pid']) && filter_var($_GET['pid'], FILTER_VALIDATE_INT, array('min_range' => 1)) )
  {
  $pid=$_GET['pid'];
  
  //determine if copy of this print already added to cart
  if(isset($_SESSION['cart'][$pid]))
     {//add one to session
	 $_SESSION['cart'][$pid]['quantity']++;
	 echo '<p>Another copy of the print has been added to your shopping cart.</p>';
	 }else{ //add new product to cart
     require('includes/mysqli_connect.php');
	 $q= "SELECT price FROM prints WHERE print_id=$pid";
	 $r=mysqli_query($dbc,$q);
	 if(mysqli_num_rows($r) ==1)
	   {
	   list($price) = mysqli_fetch_array($r, MYSQLI_NUM);
	   //add new product to cart
	   $_SESSION['cart'][$pid] = array('quantity' => 1, 'price' => $price);
	   echo '<p>The print has been added to your shopping cart.</p>';
	   }else{ //if not a valid print ID
	   echo '<div align="cener">This page has been accessed in error!</div>';
	   }
	  mysqli_close($dbc);
	}//end seesion cart quantity
	
 }else{//no print ID
 echo '<div align="center">This page has been accessed in error!</div>';
 }
 
 include('includes/footer.html');
 
 