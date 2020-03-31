<?php # Script 18.5 - index.php

require('includes/config.inc.php');
$page_title ='Welcome to this Site!';
include('includes/header.html');

//welcome message with name if logged in
echo '<h1>Welcome';
  if(isset($_SESSION['first_name']))
     {
	 echo "' {$_SESSION['first_name']}";
	 }
	 echo '!</h1>';
	 ?>
	 
<p>Spam spam...</p>

<?php include ('includes/footer.html');?>
