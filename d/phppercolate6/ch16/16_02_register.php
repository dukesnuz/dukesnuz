<?php 
# Script 16.2 -using OOP; register.php
//using OOP
$page_title= 'Register_Using_OOP';
include('includes/header.html');
ini_set('display_errors',0);
if($_SERVER['REQUEST_METHOD'] == 'POST'){

//error connecting to databse
require('includes/mysqli_oop_connect.php');
//



$errors = array();

// check to make sure fields entered and set variable
if(empty($_POST['first_name'])){
   $errors[] = 'You forgot to enter your first name.';
   }else{
   //$fn = trim($_POST['first_name']);
   //add  mysqli_real_escape_string()
   $fn = $mysqli->real_escape_string(trim($_POST['first_name']) );
   } 
if(empty($_POST['last_name'])){
   $errors[] = 'You forgot to enter your last name.';
   }else{
   //$ln = trim($_POST['last_name']);
   //add  mysqli_real_escape_string()
    $ln = $mysqli->real_escape_string(trim($_POST['last_name']) );
   }
if(empty($_POST['email'])){
   $errors[] = 'You forgot to enter your email.';
   }else{
   //add mysqli_real_escape_string()
   //$e = trim($_POST['email']);
  $e= $mysqli->real_escape_string(trim($_POST['email']) );
   }
   
//check if password fields entered and validate passwords match

if(!empty($_POST['pass1'])){
   if($_POST['pass1'] != $_POST['pass2']){
   					  $errors[] = 'Your password did not match the confirmed password.';
					  }else{
					  $p=$mysqli->real_escape_string(trim($_POST['pass1']));
					  }
			}else{
			$errors[] = 'You forgot to enter your password.';
			}
			
//check if ok to register user

if(empty($errors)){



//http://dukesnuz.com/d/phppercolate6/ch9/includes/mysqli_connect.php
 
$q= "INSERT INTO users(first_name, last_name, email, pass, registration_date)
	VALUES('$fn', '$ln', '$e', SHA1('$p'),  NOW() )";
//execute query
//$r= @mysqli_query ($dbc, $q);
//above changed for oop
$mysqli->query($q);

//if ($r){
//above changed for oop
//if it ran ok
if($mysqli->affected_rows == 1)
{
   echo '<h1>Thank you!</h1><p>You are now registered. In chapter 16 you will actually be able
   to log in!</p><p><br /></p>';
   //I added the below lines
   $id=$mysqli->insert_id;
   echo '<p class="error">I added $mysqli->insert_id to retrieve the sutomatically generated primary key.<br />
         Which for this record is:' . $id . '</p>';
   }else{
  echo '<h1>System Error</h1><p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
 // echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';

   echo '<p>' . $mysqli->error . '<br /><br />Query: ' . $q . '</p>';
   } //End of if ($r) IF. $mysqli->affected_rows == 1

//mysqli_close($dbc);
$mysqli->close();
unset($mysqli);

include('footer.html');
exit();

}else{ //Report the errors.
  echo '<h1>Error!</h1><p class="error"> The following error(s) occurred:<br />';
  foreach ($errors as $msg){ //Print each error.
  echo" - $msg<br />\n";
  }
  echo '</p><p>Please try again.</p><p><br /></p>';
  
  }//End of if (empty($errors)) IF.
  
  //close close mysqli
  //mysqli_close($dbc);
 $mysqli->close();
 unset($mysqli);
  
  } //End of the main Submit conditional.  
 
  ?>  

  
  <!-- add HTML -->
  <h1>Register Using OOP $mysqli->real_escape_string</h1>
  <h2>Script 16_2</h2>
  <form action="16_02_register.php" method="post" class="form">
  
  <p>First Name: <input type="text" name="first_name" 
  value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" class="field"/></p>
  
  
  <p>Last Name: <input type="text" name="last_name" s
  value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" class="field"/></p>
  
  <p>Email: <input type="text" name="email" 
  value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" class="field"/></p>
  
  
  <p>Password: <input type="text" name="pass1" 
  value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" class="field"/></p>
  
  <p>Confirm Password: <input type="text" name="pass2" 
  value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>" class="field" /></p>
  
  <p><input type="submit" name="submit" value="Register" class="button"></p>
  </form>

<p><a href="16_03_view_users.php">Exercise 16.2</a></p>	
  
<?php include('includes/footer.html');?>