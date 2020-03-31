<?php

//  renew.php
require('../includes_2/config.inc.php');
// If the user isn't logged in as an administrator, redirect them:
//comment below out for demo
//redirect_invalid_user('user_admin');

// Require the database connection:
require(MYSQL);

// Include the header file:
$page_title = 'Renew Your Account';
include('includes/header.html');
?>
<h1>Thanks!</h1><p>Thank you for your interest in renewing your account!  To complete the process,
	please now click the button below so that you may pay for your renewal via Paypal.  The cost is
	$10.00 (US) per year. <strong>Note: After renewing your membership at Paypal, you must logout
	and log back in at this site in order to process the renewal.</strong></p>
	
	<?php 
	//I added this to stop throwing errors when only displayin page
	if(!isset($_SESSION['user_id']))
		{
			$user_id = 0;
		}else{
			$user_id = $_SESSION['user_id'];
		}
	//echo 'SESSION'.$user_id; ?>
	
	
 <!--cooment out fro demo-->
 <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="custom" value="<?php echo $user_id; ?>" >
<input type="hidden" name="hosted_button_id" value="656EMFAXVYF2Q">
 <input type="submit" name="submit_button" value="Renew &rarr;" id="submit_button" class="btn btn-default" /> 
</form>

<?php include('includes/footer.html');?>