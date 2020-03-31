<?php
//require('includes/config.inc.php');
 require('../includes_2/config.inc.php');
 //test to see when user admin logged in
   // $_SESSION['user_id'] =1;
   // $_SESSION['user_admin'] = true;
 //end test see if user  admin logged in
require(MYSQL);

//added in chp 4
//if post use login 
if($_SERVER['REQUEST_METHOD'] === 'POST')
	{
		include('includes/login.inc.php');
	}
	
	
include('includes/header.html');
?>

<h3>Chapter 6_Live</h3>
<h3>Welcome</h3>
<p>For demonstration purposes only</p>
<p>The cost is $1.00.(real $)</p>
<p class="lead">Welcome to no name site, a site dedicated to keeping you up-to-date
	on web technology and programing information you need to know.</p>
	
<?php include('includes/footer.html');
