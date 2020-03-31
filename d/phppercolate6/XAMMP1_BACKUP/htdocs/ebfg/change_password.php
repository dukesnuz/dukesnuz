<?php #Script 18.11 - change_password.php
require('includes/config.inc.php');
$page_title='Change Your Password';
include('includes/header.html');

//redirect user if not logged in
if(!isset($_SESSION['user_id']))
//$_SESSION['user_id'] = 18;
   {
   //$url= BASE_URL . 'index.php';
   $url ='http://www.dukesnuz.com:81/ch18/index1.php';
   ob_end_clean();
   header("Location:$url");
   exit();
   }
       //check if form submitted and include mysqli connection
	   if($_SERVER['REQUEST_METHOD'] =='POST')
	   {
	   require(MYSQL);
	   //validate submitted password
	   $p = FALSE;
	   if(preg_match('/^(\w){4,20}$/', $_POST['password1']) )
	     {
		   if($_POST['password1'] == $_POST['password2'])
		     {
			 $p =mysqli_real_escape_string($dbc, $_POST['password1']);
			 }else{
			 echo '<p class="error">Your password did not match the confirmed password!</p>';
			 }
		 }else{
		 echo '<p class="error">Please enter a valid password!</p>';
		 }
		 
		 //update password in database
		 if($p)
		    {
			$q = "UPDATE users SET pass=SHA1('$p') WHERE user_id={$_SESSION['user_id']} LIMIT 1";
			//$q = "UPDATE users SET pass=SHA1('$p') WHERE user_id=18 LIMIT 1";
			$r = mysqli_query($dbc,$q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
			//if query worked complete the page
			if(mysqli_affected_rows($dbc) ==1)
			   {
			   echo '<h3>Your password has been changed.</h3>';
			   mysqli_close($dbc);
			   include('includes/footer.html');
			   exit();
			   }else{
			   echo '<p class="error">Your password was not changed.  Make sure your new password is different
			   than the current password.  Contact the system administrator if you think an error occurred.</p>';
			   }
		 }else{
		   echo '<p class="error">Please try again.</p>';
		   }
		   mysqli_close($dbc);
	}//end of main submit conditinal
?>

<h1>Change Password</1>

<form action="change_password.php" method="post" >
   <fieldset>
     <p><b>New Password:</b><input type="password" name="password1" size="20" maxlength="20"/>
	 <small>Use only letters, numbers, and the underscore.  Must be between 4 and 20 characters long.</small></p>
	 
	 <p><b>Confirm New Password:</b><input type"password" name="password2"size="20" maxlength="20" /></p>
  </fieldset>
 
  <div align="center"><input type="submit" name="submit" value="Change My Password" /></div>
</form>

<?php  include('includes/footer.html'); ?>
