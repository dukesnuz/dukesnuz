<?php # script 2.5 - main.inc.php
//check that page has not been accessed directly
if(!defined('BASE_URL'))
//if(4>6)
{
	$url = BASE_URL . 'index.php';
	header("Location: $url");
	exit;
}
?>

<!-- add content here-->
<h1>Welcome to the colour_blue templete</h1>
<p>This standards compiant, simple, fixed width website templete...ect.</p>
