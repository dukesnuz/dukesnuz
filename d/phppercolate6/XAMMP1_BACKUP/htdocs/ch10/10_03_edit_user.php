<?php # Script 10.3 - edit_user.php

//include ('includes/header.html');

//$page_title ='Edit  User==' . $row[0].  '-' . $row[1] ;
$page_title ='Delete a User';
include ('includes/header.html');

ini_set('display_errors',1);
echo '<h1 id="mainhead">Edit A User</h1>  <h2>Script 10_03</h2>';

//check for valid user id value
if((isset($_GET['id'])) && (is_numeric($_GET['id'])) )
		{
		$id = $_GET['id'];
		}elseif 
		((isset($_POST['id'])) && (is_numeric($_POST['id'])) ) 
	    {
		$id = $_POST['id'];
		}else{
		echo '<p class="error">This page has been accessed in error.</p>';
		include('includes/footer.html');
		exit();
		} 

		//connect to database
require_once('includes/mysqli_connect.php');

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
	$errors = array();
	
	//validate first name
	if(empty($_POST['first_name'])) 
	{
	$errors[] = 'You forgot to enter your first name.';
	}else{
	$fn = mysqli_real_escape_string($dbc,trim($_POST['first_name']));
	}
	//validate last name
	if(empty($_POST['last_name']))
	{
	$errors[] = 'You forgot to enter your last name.';
	}else{
	$ln = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
	}
	//validate email
	if(empty($_POST['email']))
	{
	$errors[] ='You forgot to enter your email address.';
	}else{
	$e = mysqli_real_escape_string($dbc, trim($_POST['email']));
	}
	
	//check if email address is not already in use
	if(empty($errors))
	{
	$q = "SELECT user_id FROM users WHERE email='$e' AND user_id != $id";
	$r = @mysqli_query($dbc, $q);
	if(mysqli_num_rows($r)==0)
	{
	$q ="UPDATE users SET first_name='$fn', last_name='$ln', email='$e' WHERE user_id=$id LIMIT 1";
	$r = @mysqli_query($dbc, $q);
	
	//report on results of update
	if(mysqli_affected_rows($dbc) == 1)
	{
	echo '<p>The user has been edited.</p>';
	}else{
	echo '<p class="error">The user could not be edited due to a system error.
	-or- No information has been changed.-
	We apologize for any inconvenience</p>';
	echo '<p>' . mysqli_error($dbc) . '<br />Query: ' . $q . '</p>';
	}
	//complete the email condition
	}else{
	echo '<p class="error">The email address has already been registered.</p>';
	}
	//complete the errors condition
	}else{
	echo '<p class="error">The following error(s) occurred:<br />';
		 foreach ($errors as $msg)
		 {
		 echo "- $msg<br />\n";
		 }
		 echo '</p><p>Please try again.</p>';
		 }
		 //complete submission conditional
		 }
		 
		 //retrieve info for user being edited
		 $q = "SELECT first_name, last_name, email FROM users WHERE user_id=$id";
		 $r = @mysqli_query($dbc,$q);
		 
		 if(mysqli_num_rows($r) ==1)
		 {
		 $row = mysqli_fetch_array($r, MYSQLI_NUM);
	//
	


	//display form
	echo '<form action="10_03_edit_user.php" method="post">
		 <p>First Name:<input type="text" name="first_name" size="15" maxlength="15"
		     value=" ' . $row[0] . ' " /></p>
			
		 <p>Last Name:<input type="text" name="last_name" size="15" maxlength="30"
		     value=" ' . $row[1] . ' " /></p>
			 
		 <p>Email:<input type="text" name="email" size="20" maxlength="60"
		     value=" ' . $row[2] . ' " /></p>
			 
		 <p><input type="submit" name="submit" value="Submit" /></p>
		 <input type="hidden" name="id" value="   ' . $id . '" />
		 </form>';
	
	
	
	//complete mysqli_num_rows()
	}else{
	echo '<p class="error">This page has been accessed in error.</p>';
 }
	//close database connection
	mysqli_close($dbc);
	

include('includes/footer.html');
?>