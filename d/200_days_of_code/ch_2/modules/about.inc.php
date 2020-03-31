<?php # script extra - about.inc.php
//check that page has not been accessed directly

//I added this page 
if(!defined('BASE_URL'))
{
	$url = BASE_URL .'indes.php';
	header("Location: $url");
	exit;
}
?>
<h1>About</h1>
<p>This page is an example of an about page.</p>
<p>An example of modularizing a website.</p>
