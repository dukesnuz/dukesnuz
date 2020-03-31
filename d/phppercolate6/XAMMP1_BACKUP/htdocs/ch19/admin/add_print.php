<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="generator" content="CoffeeCup HTML Editor (www.coffeecup.com)">
    <meta name="dcterms.created" content="Tue, 22 Oct 2013 14:42:59 GMT">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Add a Print</title>
    
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>
<?php #SCript 19.2 - add_print.php
require('../includes/mysqli_connect.php');
 if($_SERVER['REQUEST_METHOD'] =="POST")
    {
    $errors = array();
   //validate the print's name
    if(!empty($_POST['print_name']))
   //if(4>1)
     {
	 $pn =trim($_POST['print_name']);
	 }else{
	 //see page 622 can ass strip_tags() here for added security 
	 $errors[] = 'Please enter the print\'s name!';
	 }
	     //create temp name for uploaded image
	    if(is_uploaded_file($_FILES['image']['tmp_name']))
	    {
		  //see page 622 can add validate image size and type here as in ch 11
		  $temp= '../uploads/' . md5($_FILES['image']['name']);
		     //move file to more permanent destination
			 if(move_uploaded_file($_FILES['image']['tmp_name'], $temp))
			 {
			 echo '<p>The file has been uploaded!</p>';
			 $i=$_FILES['image']['name'];
			 }else{
			 $errors[] ='The file could not be moved.';
			 $temp = $_FILES['image']['tmp_name'];
			 }
		  }else{
		  //see p 623 can add more details or recommendations as to what type size file should be uploaded
		  $errors[] ='No file was uploaded.';
		  $temp = NULL;
		  }
	//validate size ,price and description 
	$s = (!empty($_POST['size'])) ? trim($_POST['size']) : NULL;
	   if(is_numeric($_POST['price']) && ($_POST['price'] > 0))
	     {
		 $p = (float)$_POST['price'];
		 }else{
		 $errors[] = 'Please enter the print\'s price!';
		 }
		 $d =(!empty($_POST['description'])) ? trim($_POST['description']) : NULL;
		       //validate artist
			if(isset($_POST['artist']) && filter_var($_POST['artist'], FILTER_VALIDATE_INT, array('min_range' =>1)) )
			  //if(4>1)
			   {
			    $a = $_POST['artist'];
			   }else{//no artist selected
			   $errors[] = 'Please select the print\'s artist!';
			   }
			      //insert record into database
				  if(empty($errors))
				     {
					 //below using prepared statement...p 625
					 $q = 'INSERT INTO prints (artist_id, print_name, price, size, description, image_name)
					       VALUES(?,?,?,?,?,?)';
						   $stmt = mysqli_prepare($dbc, $q);
						   mysqli_stmt_bind_param($stmt, 'isdsss', $a, $pn, $p, $s, $d, $i);
						   //confirm results of query
						   mysqli_stmt_execute($stmt);
						   if(mysqli_stmt_affected_rows($stmt) == 1)
						        {
								echo '<p>The print has been added.</p>';
								$id = mysqli_stmt_insert_id($stmt);
								rename($temp, "../uploads/$id");
								$_POST = array();
								}else{
								echo '<p style="font-weight:bold; color:#C00">Your submission could not be
								processed due to a system error.</p>';
								}
								mysqli_stmt_close($stmt);
						}//end if errors
				if(isset($temp) && file_exists($temp) ) 
				   {
				   unlink($temp);
				   }
}// end if submission

//print any errors
if(!empty($errors) && is_array($errors) )
 {
  echo '<h1>Error!</h1><p style="font-weight:bold; color: #C00">The following error(s) occurred:</br />';
         foreach($errors as $msg)
		    {
			echo " -$msg<br />\n";
             }
	echo 'Please reselect the print image and try again.</p>';
	}
	
?>
<h1>Add a Print</h1>

  <form enctype="multipart/form-data" action="add_print.php" method="post">
       <input type="hidden" name="MAX_FILE_SIZE" value="524288" />
	   <fieldset><legend>Fill out the form to add a print to the catalog:</legend>
	   
	   <p><b>Print Name:</b><input type="text" name="print_name" size="30" maxlength="60"
	            value="<?php if(isset($_POST['print_name'])) echo htmlspecialchars($_POST['print_name']); ?>"/> </p>
					   
	  <p><b>Image:</b><input type="file" name="image" /></p>
	  
	  <p><b>Artist:</b>
	  <select name="artist">
	  				   <option>Select One</option>
<?php
//retrieve every artist from artists table
 $q= "SELECT artist_id, CONCAT_WS(' ',first_name, middle_name, last_name)
      FROM artists ORDER BY last_name, first_name ASC";
	  
	  $r= mysqli_query($dbc, $q);
	  if(mysqli_num_rows($r) >0)
	   {
	   while($row = mysqli_fetch_array($r, MYSQLI_NUM))
	     {
		 echo "<option value=\"$row[0]\"";
		 //check for stickyness
		 if(isset($_POST['artist']) && ($_POST['artist'] ==$row[0])) echo 'selected="selected" ';
		 echo ">$row[1]</option>\n";
		 }
	}else{
	  echo '<option>Please add a new artist first.</option>';
	     }
		 mysqli_close($dbc);//close the database conenction
?>
        </select></p>
		
	<p><b>Price:</b><input type="text" name="price" size="10" maxlength="10"
	                value="<?php if (isset($_POST['price'])) echo $_POST['price']; ?>" />
					<small>Do not incluse the dollar sign or commas.</small></p>
					
	<p><b>Size:</b><input type="text" name="size" siza="30" maxlength="60"
	               VALUE="<?php if(isset($_POST['size'])) echo htmlspecialchars($_POST['size']); ?>" />(optional)</p>
				   
				   
	<p><b>Description:</b><textarea name="description" cols="40" rows="5">
	                <?php if(isset($_POST['description'])) echo $_POST['description']; ?>
					     </textarea>(optional)</p>
	</fieldset>    

     <div align="center"><input type="submit" name="submit" value="Submit" /></div>
</form>

				
<?php include('../includes/stats.php');?>			
				
  </body>
</html>