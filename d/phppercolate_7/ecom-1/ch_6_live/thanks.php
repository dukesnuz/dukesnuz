<?php
   // thanks.php
   
   //I deleted my page by mistake and copied and pasted
require('../includes_2/config.inc.php');

// If the user isn't logged in as an administrator, redirect them:
//below commented out for chp 6 second part using paypal ipn

redirect_invalid_user('reg_user_id');

// Require the database connection:
require(MYSQL);

$page_title = 'Thanks!';
include('includes/header.html');

//below commented out for chp 6 second part using paypal ipn
/*
if(filter_var($_SESSION['reg_user_id'], FILTER_VALIDATE_INT, array('min_range' => 1)))
	{
		$q = "UPDATE users SET date_expires = ADDDATE(date_expires, INTERVAL 1 YEAR)
		WHERE id = {$_SESSION['reg_user_id']}";
		$r = mysqli_query($dbc, $q);
	}
    
	unset($_SESSION['reg_user_id']);
	*/
	?>
	<h1>Thank you!</h1>
	<p>Thank you for your payment!  You may now access all the site's content for the next year!
		<strong>Note: Your access to the site will automatically be renewed via PayPal each year.
		To disable this feature, or cancel your account, see the "My preapproved purchases" section
		of your PayPal Profile Page.</strong></p>
<?php		
include('includes/footer.html');
?>