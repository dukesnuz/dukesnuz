<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="generator" content="CoffeeCup HTML Editor (www.coffeecup.com)">
    <meta name="dcterms.created" content="Mon, 19 Aug 2013 14:56:48 GMT">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Boston PHP || Percolate Season 6</title>
    <link href="../styles/percolate6.css" rel="stylesheet" type="text/css">
    
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>
  <h2>Excercise 1.5 </h2>
<?php
# Script 1.5 - predefined.php
# Created August 20, 2013
# Created by David Pertringa


$file=$_SERVER['SCRIPT_FILENAME'];
$user=$_SERVER['HTTP_USER_AGENT'];
$server=$_SERVER['SERVER_SOFTWARE'];

echo "<p>You are running the file:<br /><b>$file</b>.</p>\n";
echo "<p>You are viewing this page using:<br /><b>$user</b></p>\n";
echo "<p>This server is running:<br /><b>$server</b>.</p>\n";



?>


<?php include('../../stats.php');?>
  </body>
</html>