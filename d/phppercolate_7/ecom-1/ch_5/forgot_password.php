<?php
//forgot_password.php
//require('includes/config.inc.php');
require('../includes_2/config.inc.php');
require(MYSQL);
$page_title = 'Forgot your password';
include('includes/header.html');

//create aray for storing errors

$pass_errors= array();

//validate email address

if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
    	if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
		  {
		  	///below from book
		  	$q = 'SELECT id FROM users WHERE email = "' . escape_data($_POST['email'], $dbc).'"';
		  	//below from download
		  	//$email = $_POST['email'];
			//$q= 'SELECT id FROM users WHERE email= "'. escape_data($email, $dbc). '"';
			$r = mysqli_query($dbc, $q);
		
			if(mysqli_num_rows($r) ===1)
			    {
			    	list($uid) = mysqli_fetch_array($r, MYSQLI_NUM);
			
			       }else{
			    	//echo 'error1';
			    	$pass_errors['email'] = 'The submitted email address does not match those on file!';
					//echo 'error2';
			        }
			
		  }else{ //complete FILTER_VAR() if  a email not in correct format
		  $pass_errors['email'] = 'Please enter a valid email address!';
		  echo 'error3';
		  } //end of $_POST['email']
		  
		  //generate new password
		  //if(4>6){
		 if(empty($pass_errors)){
		  	$p = substr(md5(uniqid(rand(), true)), 10, 15);
			 
			//update new password in database
			//$uid = 7;
			$q = "UPDATE users SET pass='" . password_hash($p, PASSWORD_BCRYPT). "'WHERE id=$uid LIMIT 1";
			$r = mysqli_query($dbc, $q);  
			if(mysqli_affected_rows($dbc) ===1)
			{
				//send new password to user
				$body = "Your password to log into this site has been temporarily changed to '$p'.
				        Please log in using that password and this email address.  Then you may
				        change your password to something more familiar.";
						mail($_POST['email'], 'Your temporary password.', $body, 'From:admin@example.com');
						
						
						//print a message
						echo "<h1>Your password has been changed.</h1><p>You will receive the new,
						temporary password via email to this address:<h4>$_POST[email]</h4>. Once you have logged in with this new password, you may 
						change ii by clicking on the  'Change Password' link.</p>";
						
						include('includes/footer.html');
						exit();
						
			}else{
				//if databse update has error
				trigger_error('Your password could not be changed due to a system error.
				We apologize for any inconvenience.');
			}
			
	   }//complete processing section of the script
	}//end of main submit conditional
	
	//create the form
	
	require_once('includes/form_functions.inc.php');
	?>
	<h1>Reset Your Password</h1>
	<p>Enter your email address below to reset your password.</p>
	
	<form action="forgot_password.php" method="post" accept-charset="utf-8">
	<?php create_form_input('email', 'email', 'Email Address', $pass_errors);?>
	
	<input type="submit" name="submit_button" value="Reset &rarr;" id="submit_button" class="btn btn-default" />
	</form>	
<?php include('includes/footer.html');