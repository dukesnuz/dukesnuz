<?php

require('../includes/config.inc.php');

$page_title = 'Add a Goodie';
include('./includes/admin_header.html');
require(MYSQL_ADMIN);

$add_product_errors = array();
//check for form submission
if($_SERVER['REQUEST_METHOD'] === 'POST')
	{
		//validate products category
		if(!isset($_POST['category']) || !filter_var($_POST['category'], FILTER_VALIDATE_INT, array('min_range' => 1)))
			{
			$add_product_errors['category'] = 'Please select a category!';
			}
		
		//validate price and quantity in stock
		if(empty($_POST['price']) || !filter_var($_POST['price'], FILTER_VALIDATE_FLOAT) || ($_POST['price'] <= 0))
				{
				$add_product_errors['price'] = 'Please enter a valid price!';	
				}
				
		//validate stock
		if(empty($_POST['stock']) || !filter_var($_POST['stock'], FILTER_VALIDATE_INT, array('min_range' => 1)))
			{
				$add_product_errors['stock'] = 'Please enter the quantity in stock!';
			}
	
	
		//validate name 
		if(empty($_POST['name']))
			{
				$add_product_errors['name'] = 'Please enter the name!';
			}
			
		//validate description
		if(empty($_POST['description']))
			{
				$add_product_errors['description'] = 'Please enter the description';
			}
		//validate images
			if(is_uploaded_file($_FILES['image']['tmp_name']) && ($_FILES['image']['error'] === UPLOAD_ERR_OK))
				{
					$file = $_FILES['image'];
					$size = ROUND($file['size']/1024);
					if($size > 512)
						{
							$add_product_errors['image'] = 'The uploaded file was too large.';
						}
						//validate file type
						$allowed_mime = array('image/gif' , 'image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X_PNG', 'image/PNG',
						'image/png', 'image/x-png');
						$allowed_extensions = array('.jpg', '.gif', '.png', 'jpeg');
						$fileinfo = finfo_open(FILEINFO_MIME_TYPE);
						$file_type = finfo_file($fileinfo, $file['tmp_name']);
						finfo_close($fileinfo);
						 //$file_ext = substr($file['name'], -4);
						 $ext = substr($file['name'], -4);
						//if( !in_array($file_type, $allowed_mime) || !in_array($file_ext, $allowed_extensions) )
						if( !in_array($file_type, $allowed_mime) || !in_array($ext, $allowed_extensions) )
							{
								$add_product_errors['image'] = 'The uploaded file was not of the proper type.'; 
							}
							
						//move file to final destination
						if(!array_key_exists('image', $add_product_errors))
							{
								//echo 33;
								$new_name = sha1($file['name'] . uniqid('',true));
								$new_name .= (( substr($ext, 0, 1) != '.') ? ".{$ext}" : $ext);
							    //$new_name .= ( ( substr('jpg', 0, 1) != '.') ? ".{'jpg'}" : 'jpg');
								$dest = "../products/$new_name";
								//echo 333;
								if(move_uploaded_file($file['tmp_name'], $dest))
									{
										//echo $new_name;
										$_SESSION['image']['new_name'] = $new_name;
										$_SESSION['image']['file_name'] = $file['name'];
										echo '<h4>The file has been uploaded!</h4>';
									}else{
										//echo 33;
										trigger_error('The file could not be moved.');
										unlink($file['tmp_name']);
									}
							 }//END of array_key_exists() IF
							
			//if a file uploaded error happens see what it is
			}elseif(!isset($_SESSION['image']))
				{
					switch ($_FILES['image']['error'])
						{
						case 1:
						case 2:
							$add_product_errors['image'] = 'The uploaded file was too large.';
							break;
						 case 3:
							 $add_product_errors['image'] = 'The file was only partially uploaded.';
							 break;
						  case 6:
						  case 7:
						  case 8:
							  $add_product_errors['image'] = 'No file was uploaded.';
							  break;
						  case 4:
						  default:
							  $add_product_errors['image'] = 'No file was uploaded.';
							  break;
						}//END of switch
				}//END of $_FILES IF-ELSEIF-ELSE
				
				
				//if no errors add to database
			if(empty($add_product_errors))
				//if(4>2)
					{
						 $q = 'INSERT INTO non_coffee_products
							 (non_coffee_category_id, name, description, image, price, stock)
							 VALUES(?,?,?,?,?,?)';
	                
							$stmt = mysqli_prepare($dbc, $q);
							
						 mysqli_stmt_bind_param($stmt, 'isssii', $_POST['category'], $name, $desc,
							  $_SESSION['image']['new_name'], $price, $_POST['stock'] );
						 
								
							 $name = strip_tags($_POST['name']);	
							 $desc = strip_tags($_POST['description']);	
							 $price = $_POST['price']*100;
							 mysqli_stmt_execute($stmt);
							
							
             				// if(!stmt) echo mysqli_stmt_error($stmt);	
						  // echo 99;
						 if(mysqli_stmt_affected_rows($stmt) === 1)
						   	{
						   		echo '<h4>The product has been added!</h4>';
								//echo $_SESSION['image']['new_name'];
								$_POST = array();
								$_FILES = array();
								unset($file, $_SESSION['image']);
							}else{//problem trigger error
							trigger_error('The product could not be added due to a system error. We apologize for any inconvenience.');
							unlink ($dest);
							}
							
							//complete error array 
							}
					//complete request method array
					}else{
						unset($_SESSION['image']);
}//END of the submission IF



				
					//include form functions
					require('../includes/form_functions.inc.php');
					
					//begin form
?>
<h3>Add a Non_Coffee Product (a "Goodie")</h3>
			
<form enctype="multipart/form-data" action="add_other_products.php" method="POST" accept-charset="utf-8">
	<input type="hidden" name="MAX_FILE_SIZE" value="524288" />
	
	<fieldset><legend>Fill out the form to add a non-coffee product to the catalog.
					  All fields are required.</legend>
					  
	<div class="field"><label for="category"><stong>Category</stong></label><br /><select name="category"<?php 
	                       if(array_key_exists('category'. $add_product_errors)) 
	                       echo ' class="error"'; ?>>
	                       <option>Select One</option>
	              <?php
	              $q = 'SELECT id, category FROM non_coffee_categories ORDER BY category ASC';
	              $r = mysqli_query($dbc, $q);
				  while($row = mysqli_fetch_array($r, MYSQLI_NUM))
				  		{
				  			echo "<option value=\"$row[0]\" ";
				  			if(isset($_POST['category']) && ($_POST['category'] == $row[0]) ) 
								echo ' selected="selected" ';
							echo '>' . htmlspecialchars($row[1]) . '</option>';
				  		}
?>
		</select>
<?php 
				if(array_key_exists('category', $add_product_errors))
					echo ' <span class-"error">' . $add_product_errors['category'] . '</span>';
?>
    </div>
	                       
		<!-- create name price and stock elements -->
		<div class="field"><label for="name"><strong>Name</strong></label><br />
			<?php create_form_input('name', 'text', $add_product_errors); ?>
		</div>                      
	   
	   <div class="field"><label for="name"><strong>Price</strong></label><br />
			<?php create_form_input('price', 'text', $add_product_errors); ?>
			<small>Without the $ sign.</small>
		</div>  
		
		<div class="field"><label for="quantity"><strong>Initial Quantity in Stock</strong></label><br />
			<?php create_form_input('stock', 'text', $add_product_errors); ?>
		</div>                    
	                   
	    <!--create description -->
	    <div class="field"><label for="description"><strong>Description</strong></label><br />
	    	<?php create_form_input('description', 'textarea', $add_product_errors); ?>
	    </div>    
	                       
	     <!--begin image file input -->
	     <div class="field"><label for="image"><strong>Image</strong></label><br />
	     	<?php 
	     	if(array_key_exists('image', $add_product_errors))
	     				{
	     					echo '<span class="error">' . $add_product_errors['image']. '</span><br />
	     					<input type="file" name="image" class="error" />';
	     				}else{//no errors
	     				echo '<input type="file" name="image" />';
						if(isset($_SESSION['image']))
							{
								echo "<br />Currently '{$_SESSION['image']['file_name']}'";
						    }
						}//END of errors IF-ELSE
			?>
	     </div>           
	     
	     <!--Complete the form-->
	     <br clear="all"/><div class="field"><input type="submit" value="Add This Product" class="button" /></div>      
	                       </fieldset>
</form>					
								
<?php include('./includes/admin_footer.html'); ?>
