<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="generator" content="CoffeeCup HTML Editor (www.coffeecup.com)">
    <meta name="dcterms.created" content="Mon, 19 Aug 2013 14:56:48 GMT">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Calender 2.5|| Boston PHP || Percolate Season 6</title>
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
<?php 
// Script 2.6 - calender.php 
echo "Script 2.6 - Calender";
// new code goes here
echo "<br />";
$months= array(1 => 'January', 'February' , 'March' . 'April' , 'May' , 'June' , 'July' ,
		 		 'August' , 'September' , 'October' , 'November' , 'December');

$days = range(1, 31);

$years = range(2011, 2021);

echo '<select name="month">';
	 foreach ($months as $key => $value){
	    echo "<option value=\"$key\"> $value</option>";
		}
echo '</select>';


echo '<select name = "day">';
	 foreach ($days as $value){
	 	echo "<option value=\"$value\"> $value</option>\n";
		}
echo '</select>';

echo '<select name ="year">';
	 foreach($years as $value){
	   echo "<option value=\"$value\"> $value</option>";
	   }
echo '</select>';

//echo "<br />";
//echo "The Date you selected' $key '&nsbp' $days ',&nsbp '$year' &nsbp was agreat day in history.";


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