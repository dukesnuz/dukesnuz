<?php # Script 18.6 - register.php

require('includes/config.inc.php');
$page_title = 'Register';
include('includes/header.html');

//check for form submission and include databse connection
if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
	require(MYSQL);
	
	//trim incoming data and establish flag variables
	
	$trimmed = array_map('trim', $_POST);
	$fn = $ln = $e = $p =FALSE;
	//above can also be wroitten as below
	//$fn = FALSE;
	//$ln =FALSE;
	//$e = FALSE;
	//$p =FALSE;
     ////////
//validate first and last names
     if(preg_match('/^[A-Z\'.-]{2,20}$/i',$trimmed['first_name'] ))
     //if(4>1)
	 {
	 $fn = mysqli_real_escape_string($dbc, $trimmed['first_name']);
	 }else{
	 echo '<p class="error">Please enter your first name!</p>';
	 }
	 
	 if(preg_match('/^[A-Z\'.-]{2,40}$/i', $trimmed['last_name']))
	 {
	 $ln = mysqli_real_escape_string($dbc, $trimmed['last_name']);
	 }else{
	 echo '<p class="error">Please enter your last name!</p>';
	 }
	 
//validste email address
if(filter_var($trimmed['email'], FILTER_VALIDATE_EMAIL))
   {
   $e = mysqli_real_escape_string($dbc, $trimmed['email']);
   }else{
   echo '<p class="error">Please enter a valid email address!</p>';
   }
   
//validate password
if(preg_match('/^\w{4,20}$/', $trimmed['password1']))
     {
	    //if both passwords are ==
	    if($trimmed['password1'] == $trimmed['password2'])
		{
	    $p = mysqli_real_escape_string($dbc, $trimmed['password1']);
	    }else{
		echo '<p class="error">Your password did not match the confirmed pasword!</p>';
		}
}else{
   echo '<p class="error">Please enter a valid password!</p>';
   }

 //if above passed check for unique email address
 if($fn && $ln && $e && $p)
    {
	$q= "SELECT user_id FROM users WHERE email='$e'";
	$r=mysqli_query($dbc,$q) or trigger_error("Query:$q\n<br />MySQL Error: " . mysqli_error($dbc));
	
	         //if email address unsued register user
			 if(mysqli_num_rows($r) == 0)
			     {
				 $a =md5(uniqid(rand(), true));
				 $q = "INSERT INTO users (email, pass, first_name, last_name, active, registration_date)
				      VALUES('$e', SHA1('$p'), '$fn', '$ln', '$a', NOW() )";
					  $r = mysqli_query($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error:". mysqli_error($dbc)); 
					 
					  //send email if query worked
					    if(mysqli_affected_rows($dbc) == 1)
					    {
						$body ="Thank you for registering at . To activate your account, please click on this link:\n\n";
						//$body .= BASE_URL . ':81/ch18/activate.php?x='.urlencode($e)."&y=$a";
						//$body .='http://www.dukesnuz.com:81/ch18/activate.php?x='.urlencode($e).'&y='.$a;
						$body .='http://www.eatbeansfreegas.com/activate.php?x='.urlencode($e).'&y='.$a;

						mail($trimmed['email'],'Registration Confirmation',$body, "From:contactus@dukesnuz.com");
						//mail('david@ajaxtransport.com','Registration Confirmation','body', '');
						//works//mail('david@9015272529.com' ,  'Contact Form Submission' ,  '$body',"From:contactus@dukesnuz.com ");
						
						//tell user what to expect and complete the page
						echo '<h3>Thank you for registering! A confirmation email has been sent to your address. 
						      Please click on the link in that email in order to activate your account.</h3>';
							  include('includes/footer.html');
						
						echo'<br /><br /><br /><br /><br />';
						echo '<p>My server hosting MySql will not allow me to use php to send emails.</p>';
		                echo'<p>The following is the link which would appear in your email inbox:</p>';
						echo '<p>'. $body . '</p>';
						echo '<br />';
		                echo '<p><a href="http://www.dukesnuz.com:81/ch18/activate.php?x='.urlencode($e).'&y='.$a.'">Activate</a></p>';
							  exit();
					 		
					  //print errors if query failed if mysqli does not =1
					   }else{
					   echo '<p class="error">You could not be registered due to a system error. We apologize for any 
					   inconvenience.</p>';
					   }
			}else{
			echo '<p class="error">That email address has already been registered. If you you have forgotten your
			      password, use the link at the right to have your password sent to you.</p>';
			}
	  }else{
	   echo'<p class="error">Please ttry again.</p>';
	   }
	   mysqli_close($dbc);
	   }
//echo "hi";
	   ?>
		
<h1>Register</h1>
<form action="register.php" method="post">
    <fieldset>
	  <p><b>First Name:</b><input type="text" name="first_name" size="20" maxlength="20"
	                   value="<?php if(isset($trimmed['first_name'])) echo $trimmed['first_name']; ?>" /></p>
					   
	 <p><b>Last name:</b><input type="text" name="last_name" size="20" maxlength="40"
	                   value="<?php if(isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p>
					   
	<p><b>Email:</b><input type="text" name="email" size="20" maxlength="60"
	                   value="<?php if(isset($trimmed['email'])) echo $trimmed['email']; ?>" /></p>
					   
	<p><b>Password:</b><input type="password" name="password1" size="20" maxlength="20"
	                   value="<?php if(isset($trimmed['password1'])) echo $trimmed['password1']; ?>" />
					
	<small>Use only letters, numbers and the underscore. Must be between 4 and 20 characters long.</small></p>
	
	<p><b>Confirm Password:</b><input type="password" name="password2" size=20" maxlength="20"
	                   value="<?php if(isset($trimmed['password2'])) echo $trimmed['password2']; ?> /></p>
					   
   </fieldset>
   <div align="center'><input type="submit" name="submit" value="Register" /></div>
 </form>
 
 <?php include('includes/footer.html'); ?> 