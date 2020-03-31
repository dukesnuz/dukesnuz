<?php # Script 19.8 - show_image.php
require('includes/config.inc.php');
$image= FALSE;
$name=(!empty($_GET['name'])) ? $_GET['name'] :'print image';
//check for image value in url
if(isset($_GET['image']) && filter_var($_GET['image'], FILTER_VALIDATE_INT, array('min_range' =>1)) )

    {
	 $image='uploads/'. $_GET['image'];
	// $image='uploads/3.jpg';
	//check that image exists as file on server
	//for added security can validate image type p 643$image= 'uploads/' . $_GET['image'];
	   if(!file_exists($image) || (!is_file($image)))
	   {
	   $image=FALSE;
	   }
}//end of $_GET'image'] if


if(!$image)
   {
   $image='images/unavailable.png';
   $name-'unavailable.png';
   }
   
   
   //retrieve image info
   $info=getimagesize($image);
   $fs = filesize($image);
 
   //send file
   header("Content-Type: {$info['mime']}\n");
   header("Content-Disposition: inline; filename=\"$name\"\n");
   header("Content-Length: $fs\n");
   readfile($image);