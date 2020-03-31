<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="generator" content="CoffeeCup HTML Editor (www.coffeecup.com)">
    <meta name="dcterms.created" content="Mon, 19 Aug 2013 14:56:48 GMT">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Multdimensional Arrays 2.7|| Boston PHP || Percolate Season 6</title>
    <link href="../styles/percolate6.css" rel="stylesheet" type="text/css">
    
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<style>
	.error{
	font-weight:bold;
	color:#COO;
	 }
	</style>
  </head>
  <body>
Script 2.7 
  <p>Some North American States, Provinces, and Territories:</p>
  
<?php 
// Script 2.6 - multidimensional arrays 
echo "Script 2.6 -  multidimensional arrays ";
// new code goes here
$mexico = array(
'YU' => 'Yucatan',
'BC' => 'Baja California',
'OA' => ' Oaxaca'
);

$us = array(
'MD' => 'Maryland',
'IL' => 'Illinios',
'PA' => 'Pennsylvania',
'IA' => 'Iowa'
);

$canada = array(
'QC' => 'Quebec',
'AB' => 'Alberta',
'NT' => 'Northwest Territories',
'YT' => 'Yukon',
'PE' => 'Prince Edward Island'
);

$n_america = array(
'Mexico' => $mexico,
'United States' => $us,
'Canada' => $canada
);

foreach ($n_america as $country => $list){
		echo "<h2>$country</h2><ul>";
		
			 foreach($list as $k => $v){
			      echo "<li>$k - $v</li>\n";
				  }
	    echo '</ul>';
		} //End of main foreach
		

// end new code


if(!empty ($_SERVER['HTTP_REFERER'])){
   $previous=$_SERVER['HTTP_REFERER'];
   }else{
   $previous= NULL;
  }
?>
<p><a href="<?php echo $previous; ?>">Back</a></p>



<?php include('../../stats.php');?>
  </body>
</html>