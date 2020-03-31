<?php
 // cancel.php
 
require('../includes_2/config.inc.php');

// Require the database connection:
require(MYSQL);

$page_title = 'Ooopps!';
include('includes/header.html');
?>

<h1>OOppss!</h1>
<p>The payment through PayPal was not completed.  You now have a valis membership at this site, but
	you will not be able to view any content until you complete the PayPal transaction.  You can do so
	by clicking on the Renew link after logging in.</p>
	
<?phpinclude('includes/footer.html');?>