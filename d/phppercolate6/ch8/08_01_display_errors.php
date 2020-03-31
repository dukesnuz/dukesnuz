<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="generator" content="CoffeeCup HTML Editor (www.coffeecup.com)">
    <meta name="dcterms.created" content="Sun, 15 Sep 2013 21:34:00 GMT">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Displaying Errors</title>
    
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>
  <body>
<h1>Testing Display Errors</h1>
<?php # Script 8.1 - display_errors.php
//ini_set('display_errors',1);
ini_set('display_errors',0);


foreach ($var as $v){}
$result = 1/0;
?>
<p>display_errors is turned off using the following line:</p>
<p>ini_set('display_errors',0);</p>



<?php include('../../stats.php');?>
  </body>
</html>