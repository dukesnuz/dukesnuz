<?php # Script 18.10 forgot_password.php
require('includes/config.inc.php');
$page_title = 'Forgot your password';
include('includes/header.html');
//check if form has been submitted include database connection and create flag variable
if($_SERVER['REQUEST_METHOD'] =='POST')
   {
   require(MYSQL);
   $uid = FALSE;
   
      //validate submitted email
	  if(!empty($_POST['email']))
	  {
	  $q = 'SELECT user_id FROM users WHERE email= "' . mysqli_real_escape_string($dbc, $_POST['email']) . '"';
	  $r = mysqli_query($dbc, $q) or trigger_error("Query: $q\n<br />MySQL ERROR: " . mysqli_error($dbc) );
	      //retrieve selected id
		  if(mysqli_num_rows($r) ==1)
		     {
			 list($uid) = mysqli_fetch_array($r, MYSQLI_NUM);//see page 596 for list()
			 }else{
			 //No databse match
			 echo '<p class="error">The submiitted email address does not match those on file!</p>';
			 } 
	  }else{//no submitted email
	  echo '<p class="error">You forgot to enter your email address!</p>';
}//end of empty($_POST['emai']) if

//create new random password
if($uid)
   {
   $p = substr(md5(uniqid(rand(), true)), 3,10);
   //update password in databse
   $q = "UPDATE users SET pass=SHA1('$p') WHERE user_id=$uid LIMIT 1";
   $r = mysqli_query($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error:" . mysqli_error($dbc));
      if(mysqli_affected_rows($dbc) == 1)
	     {
		 //echo "start";
		 //include('includes/sendmail.inc.php');
		 $body = "Your password";
		    $body = "Your password to log into my site has been temporarily changed to '$p'.
		     Please log in using this password and this email address.  Then you may
			 change your password to something more familiar.";
			 
		//below line from nook
		//mail ($_POST['email'], 'Your temporary password.', $body, 'From: admin@sitename.com');
		  mail($_POST['email'], 'Your temporary password .', $body, 'From:contactus@dukesnuz.com');
		  //mail('david@9015272529.com' , 'Contact Form Submission' , 'body', 'From: ');
		// echo New Password which would apprea$p;
		 
		

		 echo '<h3>Your password has been changed. You will recieve the new temporary password at
		 the email address with which you registered.  Once you have logged in with this password, 
		 you may change it by clicking on the "Change password" link.</h3>';
		
		echo'<br /><br /><br /><br /><br />'; 
		echo '<p>My server hosting MySql will not allow me to use php to send emails.</p>';
	    echo'<p>The following is the message and new password which would appear in your email inbox:</p>';
		echo '<p>'. $body . '</p>';
		//echo '<br />';
		//echo '<p>'.$p.'</p>';
		//					
		
		mysqli_close($dbc);
		include('includes/footer.html');
		exit();
		
	}else{
	 echo '<p class="error">Your password could not be changed due to a system error. We apologize
	 for any inconvenience.</p>';
	 }
}else{
 echo '<p class="error">Please try again.</p>';
 }
 mysqli_close($dbc);
 }//end main submit
 ?>
 
 
 <h1>Reset Password</h1>
 <p>Enter your email address below and your password will be reset.</p>
 
 <form action+"forgot_password.php" method="post">
    <fieldset>
	   <p><b>Email Address:</b><input type="text" name="email" size="20" maxlength="60"
	                           value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" /></p>
	</fieldset>
	<div align+"center"><input type="submit" name="submit" value="Reset My Password" /></div>
</form>


<?php include('includes/footer.html');?>

		 