<?php 
# Script 9.5 -using mysqli_real_escape_string(); register.php

$page_title= 'Register';
include('includes/header.html');
ini_set('display_errors',0);
if($_SERVER['REQUEST_METHOD'] == 'POST'){

//error connecting to databse
require('includes/mysqli_connect.php');
//



$errors = array();

// check to make sure fields entered and set variable
if(empty($_POST['first_name'])){
   $errors[] = 'You forgot to enter your first name.';
   }else{
   //$fn = trim($_POST['first_name']);
   //add  mysqli_real_escape_string()
   $fn = mysqli_real_escape_string($dbc, trim($_POST['first_name']) );
   } 
if(empty($_POST['last_name'])){
   $errors[] = 'You forgot to enter your last name.';
   }else{
   //$ln = trim($_POST['last_name']);
   //add  mysqli_real_escape_string()
   $ln = mysqli_real_escape_string($dbc, trim($_POST['last_name']) );
   }
if(empty($_POST['email'])){
   $errors[] = 'You forgot to enter your email.';
   }else{
   //add mysqli_real_escape_string()
   //$e = trim($_POST['email']);
   $e= mysqli_real_escape_string($dbc, trim($_POST['email']) );
   }
   
//check if password fields entered and validate passwords match

if(!empty($_POST['pass1'])){
   if($_POST['pass1'] != $_POST['pass2']){
   					  $errors[] = 'Your password did not match the confirmed password.';
					  }else{
					  $p=mysqli_real_escape_string($dbc, trim($_POST['pass1']));
					  }
			}else{
			$errors[] = 'You forgot to enter your password.';
			}
	
//..........
//check if already registered
		      //check results of query
if(empty($errors)){
	$q = "SELECT  user_id FROM users WHERE (email ='$e' AND pass=SHA1('$p') )";
	$r = @mysqli_query($dbc, $q);
	$num = @mysqli_num_rows($r);
	if($num == 0){
	
	      $row = mysqli_fetch_array($r, MYSQLI_NUM);
		  $q= "INSERT INTO users(first_name, last_name, email, pass, registration_date)
	      VALUES('$fn', '$ln', '$e', SHA1('$p'),  NOW() )";
      
          $r= @mysqli_query ($dbc, $q);
          echo '<h1>Very Cool!</h1><p class="error">Thank you for registering.</p>
		  <h2>Try it out.</h2> <a href="http://dukesnuz.com:81/ch12/12_03_login.php">LOG IN</a>';
		  mysqli_close($dbc);
          include('includes/footer.html');
          exit();
            }
        echo '<h1>Hold on!</h1><p class="error">You are already registered.</p>';
	    mysqli_close($dbc);
        include('includes/footer.html');
        exit();
	   
              //end if num==0
		}else{	  
     
	
	echo '<h1>System error</h1><p class="error">Error</p>';
		//close database connection
    mysqli_close($dbc);
    include('includes/footer.html');
    exit();
           }//end if no errors
  mysqli_close($dbc);
  } //End of the main Submit conditional.  
 
  ?>  
<br>
  
  <!-- add HTML -->
  <h1>Register Pursuit 09.04</h1>
  <h2>First check if user already registered. If no then register.</h2>
  <h2>Try it out.</h2> <a href="http://dukesnuz.com:81/ch12/12_03_login.php">LOG IN</a>
  <form action="09_04_pursuit.php" method="post" class="form">
  
  <p>First Name: <input type="text" name="first_name" size="15" maxlength="20" 
  value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" class="field"/></p>
  
  
  <p>Last Name: <input type="text" name="last_name" size="15" maxlength="40" 
  value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>"  class="field"/></p>
  
  <p>Email: <input type="text" name="email" size="20" maxlength="60" 
  value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  class="field"/></p>
  
  
  <p>Password: <input type="text" name="pass1" size="10" maxlength="20" 
  value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>"  class="field"/></p>
  
  <p>Confirm Password: <input type="text" name="pass2" size="10" maxlength="20" 
  value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>"  class="field"/></p>
  
  <p><input type="submit" name="submit" value="Register"  class="button"></p>
  </form>
  
  
<?php include('includes/footer.html');?>