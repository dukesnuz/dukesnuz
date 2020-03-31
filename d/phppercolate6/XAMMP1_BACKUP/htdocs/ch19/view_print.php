<?php #Script 19.7 - view_print.php
require('includes/config.inc.php');
//establish a flag variable
$row = FALSE;
//validate that printID passed to this page
if(isset($_GET['pid']) && filter_var($_GET['pid'], FILTER_VALIDATE_INT, array('min_range' => 1)) )

   {
   $pid = $_GET['pid'];
   //retrive infor from databse
   
require('includes/mysqli_connect.php');

$q = "SELECT CONCAT_WS(' ', first_name, middle_name, last_name)
      AS artist, print_name, price, description, size, image_name 
	  FROM artists, prints WHERE artists.artist_id=prints.artist_id 
	  AND prints.print_id =$pid";

	 $r = mysqli_query($dbc, $q);
	 
	 //if record returned retrieve info, set title page and include header
	 if(mysqli_num_rows($r) ==1)
	    {
		$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
		$page_title = $row['print_name'];
		include('includes/header.html');
		
		//display print info
		echo "<div align=\"center\"><b>{$row['print_name']}</b>by{$row['artist']}<br />";
		echo (is_null($row['size'])) ? '(No size information available)' :$row['size'];
		echo "<br />\${$row['price']}<a href=\"add_cart.php?pid=$pid\">Add to Cart</a></div><br />";
		
		//dispaly image
		if($image = @getimagesize("uploads/$pid"))
		   {
		   echo "<div align=\"center\"><img src=\"show_image.php?image=$pid&name=" . 
		         urlencode($row['image_name']) . "\" $image[3] alt=\"{$row['print_name']}\" /></div>\n";
		 
		}else{
			echo "<div align=\"center\">Noimage available</div>\n";
			}
			
			//dispaly description
			echo '<p align="center">' . ((is_null($row['description'])) ? '(No description available)': $row['description']) . '</p>';
	 }//end of mysqli_num_rows() if
 }//end of $_GET['pid'] if
 
 //if a problem display error message
 if(!$row)
 {
 $page_title= 'Error';
 include('includes/header.html');
 echo '<div align="center">This page hass been accessed in error!</div>';
 }
 
 include('includes/footer.html');
 ?>
		  
