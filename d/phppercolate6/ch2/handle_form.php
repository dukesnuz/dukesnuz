<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="generator" content="CoffeeCup HTML Editor (www.coffeecup.com)">
    <meta name="dcterms.created" content="Mon, 19 Aug 2013 14:56:48 GMT">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Form Feedback || Boston PHP || Percolate Season 6</title>
    <link href="../styles/percolate6.css" rel="stylesheet" type="text/css">
    
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<style>
	
	</style>
  </head>
  <body>
<?php 
// Script 2.2 & 2.3 - handle_form.php 
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$comments = $_REQUEST['comments'];

echo "Script 2.2 & 2.3";

if(isset($_REQUEST['gender'])){
	$gender = $_REQUEST['gender'];
	}else{
	$gender = NULL;
	}
//print mesage based upon gender value
echo "<p>Thank you, <b>$name</b>, for the following comments:<br /><tt>$comments</tt></p>
<p>We Will reply to you at <i>$email</i>.</p>\n";
	
if ($gender =='M'){
   echo '<p><b>Good day, sir!</b></p>';
}elseif($gender =='F'){
   echo '<p><b>Good day, Madam!</b></p>';
}else{
   echo '<p><b>You forgot to enter your gender!</b></p>';
   }
   



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