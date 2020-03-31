<?php

// reset.php    
// page 399
require('../includes_2/config.inc.php');

require(MYSQL);

$page_title = 'Reset Your Password';
include('includes/header.html');

//create 2 variable for storing variables
$reset_error = '';
$pass_errors = array();

//check for token in url
if(isset($_GET['t']) && (strlen($_GET['t']) ===64) )
		{
			$token =$_GET['t'];
			//grab user id
			$q = 'SELECT user_id FROM access_tokens 
				WHERE token=? AND date_expires> NOW()';
			$stmt = mysqli_prepare($dbc, $q);
			mysqli_stmt_bind_param($stmt, 's', $token);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
		if(mysqli_stmt_num_rows($stmt) ===1)
				{
					mysqli_stmt_bind_result($stmt, $user_id);
					mysqli_stmt_fetch($stmt);
					
					//regeneertate session ID and store user id in the session
					session_regenerate_id(true);
					$_SESSION['user_id'] = $user_id;
					
					
					//clear token from databse
					$q = 'DELETE FROM access_tokens WHERE token=?';
					$stmt = mysqli_prepare($dbc, $q);
					mysqli_stmt_bind_param($stmt, 's' , $token);
					mysqli_stmt_execute($stmt);
				}else{//error if query did not retrieve user id
				$reset_error= 'OOppss! Either the provides token does not match that on file or your time has expired.
								Please resubmit the "Forgot Your Password?" form';
				}
				
		}else{ //COMPLETE THE $_get['T']
		  $reset_error ='This page has been accessed in error.';
		}
			
		//check for form submission
		if( ($_SERVER['REQUEST_METHOD'] === "POST") && isset($_SESSION['user_id']) )
			{
				$reset_error = '';
				
				//validate passwords
				if(preg_match('/^(\w*(?=\w*\d)(?=\w*[a-z])(?=\w*[A-Z])\w*){6,}$/', $_POST['pass2']))
				   {
					if($_POST['pass1'] == $_POST['pass2'])
						{
							$p = $_POST['pass1'];
						}else{
							$pass_errors['pass2'] = 'Your password did not match the confirmed password!';
						}
			     }else{
			     	$pass_errors['pass1'] = 'Please enter a valid password!';
			     }
			//if no errors update password in database
				if(empty($pass_errors)) 
					{
						$q = 'UPDATE users SET pass=? WHERE id=? LIMIT 1';
						$stmt = mysqli_prepare($dbc, $q);
						mysqli_stmt_bind_param($stmt, 'si', $pass, $_SESSION['user_id']);
						$pass = password_hash($p, PASSWORD_BCRYPT);
						mysqli_stmt_execute($stmt);
						
						//if query worked complete the page
							if(mysqli_stmt_affected_rows($stmt) ===1)
								{
									echo '<h1>Your password has been changed.</h1>';
									include('./includes/footer.html');
									exit();
									
								}else{
									trigger_error('OOppss! Your password could not be changed due to a system error.
													We apologize for any inconvenience.');
								}
								
					}//END of empty($pass_errors) IF
	
			}elseif($_SERVER['REQUEST_METHOD'] ==='POST')
				{
					 $reset_error = 'This page has been accessed in error.';
				}//END of form submission conditional
			

				// if its safe change the password begin the form
				if(empty($reset_error))
					{
						require_once('./includes/form_functions.inc.php');
						echo '<h1>Change your Password</h1>
						<p>Use the form below to change your password.</p>
						
						<form action="reset.php" method="post" accept-charset="utf-8">';
						
						//complete form
						create_form_input('pass1','password','Password', $pass_errors);
						echo '<span class="help-block">Must be at least 6 characters long.
							with at least one lowercase, one uppercase letter, and one number.</span>';
							
						create_form_input('pass2', 'password', 'Confirm Password', $pass_errors);
						echo '<input type="submit" name="submit_button" value="Change &rarr;" id="submit_button" class="btn btn-default" />
						</form>';
						
			//complete conditional if (empty($reset($rset_errors))
			}else{
				echo '<div class="alert alert-danger">'. $reset_error.'</div';
			}
			
			include('./includes/footer.html');
?>
				
				 