<?php # Script 9.7 - password.php
$page_title = 'Change your password';
include ('includes/header.html');


if ($_SERVER['REQUEST_METHOD'] == 'POST'){

//connect to database
require('includes/mysqli_connect.php');
$errors = array();

//validate email address and current password fields
if(empty($_POST['email'])){
     $errors[] = 'You forgot to enter your email address.';
	 }else{
	 $e = mysqli_real_escape_string($dbc, trim($_POST['email']) );
	 }
 
if(empty($_POST['pass'])){
	$errors[] = 'You forgot to enter your current password.';
	}else{
	$p = mysqli_real_escape_string($dbc, trim($_POST['pass']) );
	}
	
	//validate new password
if(!empty($_POST['pass1'])){
	if($_POST['pass1'] != $_POST['pass2']){
		$errors[] = 'Your password did not match the confirmed password.';
		}else{
		$np = mysqli_real_escape_string($dbc, trim($_POST['pass1']) );
		}
		
}else{
$errors[] = 'You forgot to enter your new password.';

}
//retrieve user id if all above passed
if(empty($errors)){
	$q = "SELECT  user_id FROM users WHERE (email ='$e' AND pass=SHA1('$p') )";
	$r = @mysqli_query($dbc, $q);
	$num = @mysqli_num_rows($r);
	 if($num == 1){
	 
	    $row = mysqli_fetch_array($r, MYSQLI_NUM);
		 $q = "UPDATE users SET pass=SHA1('$np') WHERE user_id=$row[0]";
		 $r = @mysqli_query($dbc, $q);
		 
		      //check results of query
if(mysqli_affected_rows($dbc) == 1){
    echo '<h1>Thank you!</h1><p>Your password has been updated.  In Chapter 12
	you will actually be able to log in!</p><p><br /></p>';
	}else{
	echo '<h1>System error</h1><p class="error">Your password could not be changed due
	to a system error.  We apologize for any inconvenience.</p>';
	echo '<p>' . mysqli_error($dbc) . '<br /><br /> Query: ' . $q . '<br />';
	}
	
	//close database connection
mysqli_close($dbc);
include('includes/footer.html');
exit();

//complete the if ($num==1)
}else{
echo '<h1>Error!</h1><p class="error">The email address and password do not match those on file.</p>';
}

//print validation message
}else{
echo '<h1>Error!</h1><p class="error">The following error(s) occurred:<br />';
	foreach($errors as $msg)
	{
	echo " - $msg<br />\n";
	}
	echo '<p></p>Please try again.</p><p><br /></p>';
	 }
//close database
mysqli_close($dbc);
}

?>

 <h1 id="mainhead">Change Your password</h1>  
<h2>Script 09_07 Password</h2>


<form action="09_07_password.php" method="post" class="form">
<p>Email address:<input type="text" name="email" 
value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"  class="field"/></p>

<p>Current Password:<input type="password" name="pass"
value="<?php if(isset($_POST['pass'])) echo $_POST['pass'] ;?>" class="field"/></p>

<p>New Password:<input type="password" name="pass1" 
value="<?php if(isset($_POST['pass1'])) echo $_POST['pass1'] ;?>" class="field"/></p>

<p>Confirm New Password:<input type="password" name="pass2" 
value="<?php if(isset($_POST['pass2'])) echo $_POST['pass2'] ;?>" class="field" /></p>

<p><input type="submit" name="submit" value="Change Password"  class="button"/></p>

</form>



<?php include('includes/footer.html'); ?>
	
	 