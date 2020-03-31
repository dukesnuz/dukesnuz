<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="generator" content="CoffeeCup HTML Editor (www.coffeecup.com)">
    <meta name="dcterms.created" content="Mon, 19 Aug 2013 14:56:48 GMT">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Form Feedback 2.4 Extra|| Boston PHP || Percolate Season 6</title>
    <link href="../styles/percolate6.css" rel="stylesheet" type="text/css">
    
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<style>
	.error{
	font-weight:bold;
	color:#COO;
	 }
	 .errorred{
	 font-weight:bold;
	 color: red;
	 font-size:1.25em;
	  }
	  .blue{
	  color: blue;
	  font-size:1.25em;
	   }
	</style>
  </head>
  <body>
<?php 
// Script 2.4 - handle_form2_4.php  -extra
echo "Pursuit 2 - Script 2.4 extra";

$name = $_POST['name'];
$email = $_POST['email'];
$comments = $_POST['comments'];


if(!empty ($_POST['name'])){
	$name = $_POST['name'];
	}else{
	#name = NULL;
	echo '<p class="error">You forgot to enter your name!</p>';
	}
	
if(!empty ($_POST['email'])){
   $email = $_POST['email'];
   }else{
   $email= NULL;
   echo '<p class="error">You forgot to enter your email address!</p>';
   }
   
 if(!empty ($_POST['comments'])){
   $comments = $_POST['comments'];
   }else{
   $comments = NULL;
   echo '<p class="error">You forgot to enter your comments!</p>';
   }
   
    //
 /*
   if(!empty($_POST['age'])){
   		$age = $_POST['age'];
		}else{
		echo'<p class="errorred">Do not be affraid-You forgot to enter your age.</P>';
		}
		*/

		
  //
 if(isset($_POST['gender'])){
   $gender = $_POST['gender'];
   if($gender == 'M' || $gender =='F'){
   
	  $greeting = '<p><b>Good day!</b></p>';
	  }else{
      $gender = NULL;
      echo '<p class="error">Gender should be either "M" or "F"!</p>';
      }
   }else{
   $gender = NULL;
   echo '<p class="error">You forgot to select your gender!</p>';
   }
   
     //
	 
	   if(!empty($_POST['age'])){
   		$age = $_POST['age'];
		
		  // if(isset($_POST['age'])){
		
	      if($age == 29){
		 echo '<p class="blue">Your under 30.</p>';
		  }elseif($age == 64 ){
		 $greeting= '<p class="blue">You are between 31 and 64 years old.</p>';
		  }else{
		  $greeting= "<p class='blue'>Your still young over 65. 
		 <a href='http://en.wikipedia.org/wiki/Colonel_Sanders'>Colonal Sanders</a>
		   was 65 when he started Kentucky Fried Chicken.</p>";
		 }
	 
	 }else{
	    $age= NULL;
		$greeting= '<p class="errorred">Do not be affraid-You forgot to enter your age.</P>';
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