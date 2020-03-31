<?php #Script 11.5 - show_image.php
$name = FALSE; //Flag variable


// Check for an image name in the URL:

if (isset($_GET['image'])) {
	// Make sure it has an image's extension:
	 $ext = strtolower(substr ($_GET['image'], -4));
	
	if (($ext == '.jpg') OR ($ext == 'jpeg') OR ($ext == '.png')) {

		// Full image path:
		$image = "uploads/{$_GET['image']}";

				 
			       if(file_exists($image) && (is_file($image)))
				  {
				  $name = $_GET['image'];
				  } // end of file exits
			   } //end os $ext if
	    } // end of isset($_GET['image']) if
			 
			  //if no value image recieved use default image 
     		 if(!$name)
			 
			  {
			    $image = 'uploads/unavailable.png';
			    $name = 'uploads/unavaialble.png';
				
			 }
			 
			   //retrieve images's information
			 $info = getimagesize($image);
			 $fs = filesize($image);
			 
			 //send file
			header ("Content-Type: {$info['mime']}\n");
            header ("Content-Disposition: inline; filename=\"$name\"\n");
            header ("Content-Length: $fs\n");
            


			 //send the file
			 readfile($image);

	

