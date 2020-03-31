<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="generator" content="CoffeeCup HTML Editor (www.coffeecup.com)">
    <meta name="dcterms.created" content="Tue, 22 Oct 2013 11:20:00 GMT">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Add An Artist</title>
    
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>
<?php #Script 19.1- add_artist.php
//check if form submitted
if($_SERVER['REQUEST_METHOD']  == 'POST')
    {
	//validate srtist first and last name
	$fn = (!empty($_POST['first_name'])) ? trim($_POST['first_name']) : NULL;
	$mn = (!empty($_POST['middle_name'])) ? trim($_POST['middle_name']) : NULL;
	       //above code is same as below
	       //if(!empty($_POST['first_name'}))
	       //{
	       //$fn = trim($_POST['first_name']);
	       //}else{
	       //$fn=NULL;
	       //}
	       //end
    if(!empty($_POST['last_name']))
	     {
		 $ln=trim($_POST['last_name']);
		 //for aded security can use strip_tags() function
		   require('includes/mysqli_connect.php');
		 //in live site the databasee connection and uploads should be above the hotdocs so not 
		 //accessable for htpp://
		 
		 //add artist to database
		 $q = 'INSERT INTO artists(first_name, middle_name, last_name)
		       VALUES (?,?,?)';
			   
			 echo $_POST['first_name'];
			 echo $_POST['middle_name'];
			 echo $_POST['last_name'];
			 echo $fn;
			 echo $mn;
			 echo $ln;
			 
			 $stmt = mysqli_prepare($dbc, $q);
			 mysqli_stmt_bind_param($stmt, 'sss', $fn, $mn, $ln);
			 mysqli_stmt_execute($stmt);
			 //report results
			 //
			 if(mysqli_stmt_affected_rows($stmt) ==1 )
			    {
				echo '<p>The artist has been added.</p>';
				$_POST= array();
				}else{
				$error = 'The new artist could not be added to the database!';
				} 
          mysqli_stmt_close($stmt);
		  mysqli_close($dbc);
	 }else{//no last name value
	 $error = "Please enter the artist\'s namw!";
	 }
}//end of if submission

//print error if there is one
if(isset($error))
  {
  echo '<h1>Error!</h1><p style="font-weight:bold ; color : #C00">' . $error .' Please try again.</p>';
  }
 ?>
  
  <h1>Add an Artist</h1>
  <form action="add_artist.php" method="post" >
     <fieldset><legend>Fill out the form to add an artist:</legend>
	 
	 <p><b>First Name:</b><input type="text" name="first_name" size="10" maxlength+"20"
	                  value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name']; ?>" /> 
					  
	 <p><b>Middle Name:</b><input type="text" name="middle_name" size="10" maxlength="20"
	                  value="<?php if(isset($_POST['middle_name'])) echo $_POST['middle_name']; ?>" />
					 
	<p><b>Last Name:</b><input type+"text" name="last_name" size="10" maxlength="40"
	                  value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name']; ?>" />
					  
	</fieldset>
	
	<div align ="center"><input type="submit" name="submit" value="Submit" /></div>
  </form>
  
  </body>
</html>