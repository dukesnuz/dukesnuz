<?php
//register.php

//require('includes/config.inc.php');
require('../includes_2/config.inc.php');
require(MYSQL);
//include('includes/mysql.inc.php');
$page_title='Register';
include('includes/header.html');

//create array for errors
$reg_errors= array();

//check for form submission
if($_SERVER['REQUEST_METHOD'] === 'POST')
   {
   	  if(preg_match('/^[A-Z\'.-]{2,45}$/i',$_POST['first_name']))
	  {
	  	$fn= escape_data($_POST['first_name'], $dbc);
	  }else{
	  	$reg_errors['first_name'] = 'Please enter your first name!';
	  }
	  
	  if(preg_match('/^[A-Z \'.-]{2,45}$/i', $_POST['last_name']))
	  {
	  	$ln = escape_data($_POST['last_name'], $dbc);
	  }else{
	  	$reg_errors['last_name'] = 'Please enter your last name!';
	  }
	  
	  if(preg_match('/^[A-Z0-9]{2,45}$/i', $_POST['username']))
	  {
	  	$u = escape_data($_POST['username'], $dbc);
	  }else{
	  	$reg_errors['username'] = 'Please enter a desired name using only letters and numbers';
	  }
	  
	  if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
	  {
	  	$e = escape_data($_POST['email'], $dbc);
	  }else{
	  	$reg_errors['email'] = 'Please enter a valid email address';
	  }
	  
	  //check for a password and match against the conformed password
	  
	  if (preg_match('/^(\w*(?=\w*\d)(?=\w*[a-z])(?=\w*[A-Z])\w*){6,}$/', $_POST['pass1']))
	  {
	  	if($_POST['pass1'] === $_POST['pass2'])
		{
			$p =$_POST['pass1']; 
		}else{
			$reg_errors['pass2'] = 'Your password did not match the confirmed password!';
		}
	  }else{
			$reg_errors['pass1'] = 'Please enter a valid password';
	  }


     //if no errors cheack availability of email address and username
     if(empty($reg_errors))
	 {
	 	$q = "SELECT email, username FROM users 
	 	      WHERE email = '$e' or username = '$u' ";
	 	      $r = mysqli_query($dbc,$q);
			  $rows = mysqli_num_rows($r);
			  if($rows === 0)
			  {
			  	//no records returned
			  	//add user to databse
		//below for ch 5	  	
	 // $q = "INSERT INTO users (username, email, pass, first_name, last_name, date_expires)
	      //  VALUES( '$u', '$e', '".password_hash($p, PASSWORD_BCRYPT)."', '$fn', '$ln',
	           //    ADDDATE(NOW(), INTERVAL 1 MONTH))";
		
		//below for ch 6
		$q = "INSERT INTO users (username, email, pass, first_name, last_name, date_expires)
	         VALUES( '$u', '$e', '".password_hash($p, PASSWORD_BCRYPT)."', '$fn', '$ln',
	                 SUBDATE(NOW(), INTERVAL  1 DAY) )";
		
				  
		$r = mysqli_query($dbc, $q);
		
		//query created one row, thnak new customer and send an email
		if(mysqli_affected_rows($dbc) === 1)
		{
			//below for ch 6
			//store users new ID in a session so that his record may be updated when he returns from paypal
			$uid= mysqli_insert_id($dbc);
			$_SESSION['reg_user_id'] = $uid;
			
			
			
			
			//below for ch 5
			//echo '<div class="alert alert-success"><h3>Thanks!</h3><p>Thank you for registering!
			    // You may now log in and access the site\'s content.</p></div>';
			    //below new in chp 6
			echo '<div class="alert alert-success"><h3>Thanks!</h3><p>Thank you for registering!
			    TO complete the process, please now click the button below so that you may pay for your
			    site access via PayPal.  The cost is $10.00(US) per year. <strong>Note: When you complete
			    your payment at PayPal, please click the button to return to this site.</strong></p></div>';	 
				 
				 //drop in paypal button
				 //live https://www.paypal.com/cgi-bin/webscr
				 //test https://www.sandbox.paypal.com/cgi-bin/webscr
//below for demo
/*
echo '
<form action=" " method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value=" ">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
';
  */   
//below for live
 echo '<p>You can pay with a sandbox account to experience the complete process.</p>
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="P3U69XF4GJAYL">
<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

';	 
 
	   //echo 11;
	   //end new chp 6
		$body = "Thank you for registering at<No Name Site>. ect. ect\n\n";
		mail($e, 'Registration Confirmation', $body, 'From:admin@example.com');
		//echo 22;
		/*
		//below copied from book
		$body = "Thank you for registering at <whatever site>. Blah. Blah. Blah.\n\n";
		mail($_POST['email'], 'Registration Confirmation', $body, 'From: admin@example.com');
		 */
	
	    //I added below line
		echo "<div class='alert alert-success'><h3>Below not in the book.</h3>
		              <p>Welcome Committee sent an email to: $e.</p></div>";
		              
		include('includes/footer.html');
		exit();
		
		//if query did not work create error
		}else{
			trigger_error('You could not be registered due to a system error.
			            We apologize for any inconvience. We will correct the error ASAP.');
		}
		
	}else{	
		//if email address or username is unavailable, create errors
		
		if($rows ===2)
		{
			$reg_errors['email'] = 'This email address has already been registered.  If you have
			forgotten your password, use the link at the left to have your password sent to you';
	     $reg_errors['username'] = 'this username has already been registered. Please try another.';
		}else{
			//confirm which item has been registered
			$row= mysqli_fetch_array($r, MYSQL_NUM);
			  if(($row[0] === $_POST['email']) && ($row[1] === $_POST['username']))
			    {
			    	$reg_errors['email'] = 'This email address has already been registered. If
			    	you have forgotten your password, use the link at the left to have your password
			    	sent to you.';
					
					$reg_errors['username'] = 'This username has already been registered with this
					email address.  If
			    	you have forgotten your password, use the link at the left to have your password
			    	sent to you.';
				}elseif($row[0] === $_POST['email'])
				{
					$reg_errors['email'] = 'This email address has already been registered. If
			    	you have forgotten your password, use the link at the left to have your password
			    	sent to you.';
			    }elseif($row[0] === $_POST['username'])
				{
					$reg_errors['username'] = 'This username has already been registered. Please try another';
				}	
		 }//end of $rows == 2 else
		} //end of $rows ===0 IF
		} //end of empty($reg_errors) IF
   }//end if($_SERVER['REQUEST_METHOD']==="POST")
require_once('includes/form_functions.inc.php');
?>
<h1>Register</h1>
<p>Access to the site's content is available to registered users at a cost of $10.00 (US) per year.
	 Use the form below to begin the registration process. <strong>Note: All fields are required.
	 	</strong> After completing this form, you'll be presented with the opportunity to securely 
	 	pay for your yearly subscription via <a href="http://www.paypal.com">PayPal</a>.</p>
	 	
	 	<p>Experience the complete rigistration process.</p>
	 	<p>Register with your valid email and pay with a sandbox paypal account.</p>
<!--create form-->
<form action="register.php" method="post" accept-charset="utf-8">
<?php
	create_form_input('first_name', 'text', 'First Name', $reg_errors);
	create_form_input('last_name', 'text', 'Last Name', $reg_errors);
	create_form_input('username', 'text', 'Desired Username', $reg_errors);
	echo '<span class="help-block">Only letters and numbers are allowed.</span>';
	create_form_input('email', 'email', 'Email Address', $reg_errors);
	create_form_input('pass1', 'password', 'Password', $reg_errors);
	echo '<span class="help-block">Must be at least 6 characters long with at least one lowercase
	letter, one uppercaseletter, and one number.</span>';
	create_form_input('pass2', 'password', 'Conform Password', $reg_errors);
	?>
	
	<input type="submit" name="submit_button" value="Next &rarr;" id="submit_button" class="btn btn-default"/>
</form>	 	

<?php
include('includes/footer.html');
?>
