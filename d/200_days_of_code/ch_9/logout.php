<?php //logout.php = script 9.14
require('includes/utilities.inc.php');

//check user logged in
if($user)
	{
		//clear variable
		$user = null;
		
		//clear session
		$_SESSION = array();
		
		//clear cookie
		setcookie(session_name(), false, time()-3600);
		
		//destroy session
		session_destroy();
	}//END if user
	
	//create the page
	$pageTitle = 'Logout';
	include('includes/header.inc.php');
	include('views/logout.html');
	include('includes/footer.inc.php');

?>
