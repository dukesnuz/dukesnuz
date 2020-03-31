<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="generator" content="CoffeeCup HTML Editor (www.coffeecup.com)">
    <meta name="dcterms.created" content="Mon, 19 Aug 2013 14:56:48 GMT">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Comments|| Boston PHP || Percolate Season 6</title>
    <link href="../styles/percolate6.css" rel="stylesheet" type="text/css">
    
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>
  <h2>Excercise 1.6 & 1.7 </h2>
<?php
# Script 1.6- strings.php
# Created August 20, 2013
# Created by David Pertringa

$first_name = 'Haruki';
$last_name = 'Murakami';
$book = 'Kafka on the shore';
$author = $first_name . ' ' .$last_name;
echo "<p> Excercise 1.6</p>";
echo "<p> The book <em>$book</em> was written by $first_name $last_name.</p>";

echo "<p> Excercise 1.7</p>";
echo "<p> The book <em>$book</em> was written by $author.</p>";


?>


<?php include('../../stats.php');?>
  </body>
</html>