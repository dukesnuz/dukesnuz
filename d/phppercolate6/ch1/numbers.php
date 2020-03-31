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
  <h2>Excercise 1.6 & 1.7 </h2>
<?php
# Script 1.6 1.7 -numbers.php
# Created August 20, 2013
# Created by David Pertringa

$quantity = 30;
$price = 119.95;
$taxrate = .05;

$total = $quantity * $price;
$total = $total +($total * $taxrate);

$total = number_format($total, 2);


echo '<p>You are purchasing <b>' . $quantity . '</b> widgets(s) at a cost of <b>$' . $price . '</b> each.
With tax,  the total comes to <b>$' . $total . '</b>.</p>';

?>

<?php include('../../stats.php');?>
  </body>
</html>