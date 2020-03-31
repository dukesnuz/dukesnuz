<?php # Script 12.2 - login_functions.inx.php
//this page defines 2 functions used by the login logout process
//this function determines an absolite url and redirects the user there
//the argument defaults to index.php
function redirect_user ($page = 'index.php')
		 {
		 //define the url
		$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
		 //$url = "www.dukesnuz.com";
		 //remove trailing slashes
		 $url = rtrim($url, '/\\');
		 //add the page
		 $url .= '/' . $page;
		 //redirect the user
		 header("Location: $url");
		 exit(); // Quit the script.
		 } //End of redirect_user() function
		 
		 //send location header and terminate script
		 function check_login($dbc, $email = '', $pass = '')
		 		  {
				  //validate email and password
				  $errors = array();
				  		       if(empty($email))
						  		{
								$errors[] = 'You forgot to enter your email address.';
								    }else{
									$e = mysqli_real_escape_string($dbc, trim($email));
									}
								if(empty($pass))
								      {
								 $errors[] ='You forgot to enter your password.';
								    }else{
								    $p= mysqli_real_escape_string($dbc, trim($pass));
								    }
					//if no erors run database query
					if(empty($errors))
						{
						$q = "SELECT user_id, first_name FROM users WHERE email ='$e' AND pass=SHA1('$p')";
						$r = @mysqli_query  ($dbc,$q);
						//check results of query
						if(mysqli_num_rows($r) == 1)
						   {
						   $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
						   return array(true, $row);
						   //if no record selected creater error
						   }else{
						   $errors[] = 'The email address and password entered do not match those on file.';
						   }
					  }// end if errors
					return array(false, $errors);
					} //end check login function
						  