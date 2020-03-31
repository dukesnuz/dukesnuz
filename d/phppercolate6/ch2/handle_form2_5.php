<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="generator" content="CoffeeCup HTML Editor (www.coffeecup.com)">
    <meta name="dcterms.created" content="Mon, 19 Aug 2013 14:56:48 GMT">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Form Feedback 2.5|| Boston PHP || Percolate Season 6</title>
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
// Script 2.5 - handle_form2_5.php 
echo "Script 2.5";
// new code goes here

if(!empty($_POST['name'] ) && !empty($_POST['comments']) && !empty($_POST['email']) )
	//if( 5>8)
				  {  
						  echo "<p>Thank you, <b>{$_POST['name']}</b>, for the floowing comments:<br />
						  <tt>{$_POST['comments']}</tt></p><p>We will reply to you ate<i>{$_POST['email']}</i>.</p>\n";
						  }else{
						  echo '<p>Please go back and fill in the form again.</p>';
                          }




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