<?php # Script 18.8 - login.php
require('includes/config.inc.php');
$page_title = 'Login';
include('includes/header.html');
//check if form submitted and require database connection
if($_SERVER['REQUEST_METHOD'] == 'POST')
   {
   require(MYSQL);
   //validate data
   if(!empty($_POST['email']))
     {
	 $e = mysqli_real_escape_string($dbc, $_POST['email']);
	 //$e= "buy@ajaxloft.com";
	 }else{
	 $e = FALSE;
	 echo '<p class="error">You forgot to enter your email address</p>';
	 }
	 
	 if(!empty($_POST['pass']))
	  {
	  $p = mysqli_real_escape_string($dbc, $_POST['pass']);
	  //$p= "4444";
	  }else{
	  $p = FALSE;
	  echo '<p class="error">You forgot to enter your password</p>';
	  }
	  
	  //if both above true retrieve user info
if($e && $p)
    {
	$q= "SELECT user_id, first_name, user_level FROM users WHERE (email='$e' AND pass=SHA1('$p')) AND active IS NULL ";
	//$q= "SELECT user_id, first_name, user_level FROM users WHERE (email='$e' AND pass=SHA1('$p'))";
	$r= mysqli_query($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
	
	//if match log in user
	  if(@mysqli_num_rows($r) == 1)
	  //if(4>1)
	  {
	  //user_id, first-name and user_level are loaded into session below
	  $_SESSION = mysqli_fetch_array($r, MYSQLI_ASSOC);
	  mysqli_free_result($r);
	  mysqli_close($dbc);
	  
	  //redirect user
	  //$url = BASE_URL . 'index1.php';
	  $url ='http://www.dukesnuz.com:81/ch18/index1.php';
	  ob_end_clean();
	  header("Location: $url");
	  exit();
	  
	  }else{
	   echo '<p class="error">Either the email address and password entered do not match those
	   on file or you have not yet activated your account.</p>';
	   }
	}else{
	  echo '<p class="error">Please try again.</p>';
	  }
	  mysqli_close($dbc);
	  }//end of submit conditional
	  ?>
	 
	  <h1>Login</h1>
	  <p>Your browser must allow cookies to login</p>
	  
	  <form action="login.php" method="post">
	      <fieldset>
		      <p><b>Email Address:</b><input type="text" name="email" size="20" maxlength="60" 
			                      value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" /></p>
			  
			  <p><b>Password:</b><input type="text" name="pass" size="20" maxlength="20" 
			  					  value="<?php if (isset($_POST['pass'])) echo $_POST['pass'];?>" /></p>
			  
			  <div align="center"><input type="submit" name="submit" value="Login" /></div>
		  </fieldset>
	 </form>
	 
<?php include('includes/footer.html'); ?>
	  