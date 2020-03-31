<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="generator" content="CoffeeCup HTML Editor (www.coffeecup.com)">
    <meta name="dcterms.created" content="Mon, 19 Aug 2013 14:56:48 GMT">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Form Feedback 2.4|| Boston PHP || Percolate Season 6</title>
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
// Script 2.4 - handle_form2_4.php 
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$comments = $_REQUEST['comments'];

echo "Script 2.4";

if(!empty ($_REQUEST['name'])){
	$name = $_REQUEST['name'];
	}else{
	#name = NULL;
	echo '<p class="error">You forgot to enter your name!</p>';
	}
	
if(!empty ($_REQUEST['email'])){
   $email = $_REQUEST['email'];
   }else{
   $email= NULL;
   echo '<p class="error">You forgot to enter your email address!</p>';
   }
   
 if(!empty ($_REQUEST['comments'])){
   $comments = $_REQUEST['comments'];
   }else{
   $comments = NULL;
   echo '<p class="error">You forgot to enter your comments!</p>';
   }
  //
 if(isset($_REQUEST['gender'])){
   $gender = $_REQUEST['gender'];
   if($gender == 'M'){
      $greeting = '<p><b>Good day, Sir!</b></p>';
      }elseif ($gender == 'F'){
      $greeting = '<p><b>Good day Madam!</b></p>';
      }else{
      $gender = NULL;
      echo '<p class="error">Gender should be either "M" or "F"!</p>';
      }
	 
   }else{
   $gender = NULL;
   echo '<p class="error">You forgot to select your gender!</p>';
   }
   //
   
   if($name && $email && $gender && $comments){
   echo "<p>Thank you, <b>$name</b>, for the following comments:<br />
   <tt>$comments</tt></p>
   <p>We will reply to you at<i>$email</i>.</p>\n";
      echo $greeting;
   }else{
    echo '<p class="error">Please go back and fill out the form again.</p>';
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