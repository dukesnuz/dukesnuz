<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="generator" content="CoffeeCup HTML Editor (www.coffeecup.com)">
    <meta name="dcterms.created" content="Thu, 26 Sep 2013 01:35:30 GMT">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Post Message</title>
    
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<link rel="stylesheet" href="../../styles/reset.css" type="text/css"  />

<style>
body{
background-color:#FEFF9F;
 }
header{
       
	   height:75px;
 }
   a{
  margin-top:10px;
  margin-bottom:10px;
  font-size:1.5em;
  color:#54FF51;
  font-weight:bold; 
  margin-left:0px;
  text-decoration:none;
  display:inline-block;
  border: 1px #000000 solid;
  border-radius:25%;
  text-transform:uppercase;
  padding:3px;
  }
#maincontent{
    float:left;
	margin-top: 75px;
 
  }
footer{
       margin-top:525px;
	   margin-left:150px;
	    }
h1{
  font-size:2.5em;
  color:#801855;
  font-weight:bold; 
  margin-left:10px;
 
  }
h2{
  font-size:1em;
  color:#801855;
  font-weight:bold; 
  margin-left:10px;
 
 
  }  
p{
  font-size:1em;
  color:#1010FF;
  font-weight:bold; 
  margin-left:100px;
  }
  
  form {
	margin: 0 0 0 0;
	padding: 0;
	
}
#form{
	background:#F7EED8;
	padding: 15px;
	width: 422px;
	border: solid #92FF1D 4px;
	-webkit-border-radius: 1%;
	-moz-border-radius:1%;
	border-radius: 1%;
	margin-left:auto;
    margin-right: auto;
	margin-top:15px;
	margin-bottom:15px;
	
	  }	
#form fieldset{
	margin-bottom:10px;	
}
legend{
	color:#1B4E80;
	font-size:1.5em;
	font-weight:bold;
	padding-bottom: 20px;
}
#form  textarea {
	  margin-left:135px;
	  
	  background-color:#EDEDED;
	  padding:0px;
	  width:200px;
	  height:100px;
	  
	   }
#form p{
	    margin-left:75px;
	    padding-top:10px;
		
	    }
#form .button{
  background-color: #63806D;
  font-size:.875em;
  border:4px solid #FF0916;
  border-style:outset;
  margin-left: 0 auto ;
  margin-right:0 auto ;
  margin-top:10px;
  padding:5px;
  color:#FFFFFF;
   } 
#form .field{
   
   background-color:#EDEDED;
   }
#formback{
    margin-left: 35px;
	width:500px;
    background-color:#3C807E;
	float: right;
	border-radius: 1%;
	border: 30px #800040 groove;
}

.error{
	   font-size:1em;
	   font-weight:bolder; 
	   color:#FF1940;
	   }
</style>
  </head>
  <body>
  <header>
<h1>POST MESSAGE 13.06 Using Prepared Statements</h1>
<p><a href="http://dukesnuz.com/d/phppercolate6/home.php">Percolate 6 Home</a></p>
</header>
<div id="maincontent">
<?php #Script 13.6 - post_message.php
if($_SERVER['REQUEST_METHOD'] =="POST")
{
//connect to database
require('includes/mysqli_connect_banking.php');
//define and prepare the query
$q= 'INSERT INTO messages(forum_id, parent_id, user_id, subject, body, date_entered)
				 VALUES(?,?,?,?,?, NOW())';
				 $stmt = mysqli_prepare($dbc, $q);
//bind variables and create list of values to be entered
mysqli_stmt_bind_param($stmt, 'iiiss', $forum_id, $parent_id, $user_id, $subject, $body);
							 $forum_id = (int) $_POST['forum_id'];
							 $parent_id = (int)$_POST['parent_id'];
							 $user_id = 3;
							 $subject = strip_tags($_POST['subject']);
							 $body = strip_tags($_POST['body']);
							 //execute the query
			  	  	   		 mysqli_stmt_execute($stmt);
							 //
							 if(mysqli_stmt_affected_rows($stmt) == 1)
							 {
							 echo '<p>Your nessage has been posted.</p>';
							 }else{
							 echo '<p class="error">Your message could not be posted.</p>';
							 echo '<p>' . mysqli_stmt_error($stmt) . '</p>';
							 }
							 //close statement and database
							 mysqli_stmt_close($stmt);
							 mysqli_close($dbc);
}// end if submission		 	 
?>


<p>This box came out really cool!</p>
<div id="formback">


<form id="form" action="13_06_post_message.php" method="post">
	<fieldset>
	  			<legend>Post a message:</legend>
				<p>Subject:<input class="field" name="subject" type="text" /></p>
				
				<p>Body:</p><textarea name="body"  type="text" /></textarea>
				
	</fieldset>
	
	 <input class="button" type="submit" name="submit" value="Submit" />
	 <input type="hidden" name="forum_id" value="1" />
	 <input type="hidden" name="parent_id" value="0" />
	 
</form>
	   

</div>
</div><!--end maincontent-->
<footer>
  <p><a href="http://dukesnuz.com/d/phppercolate6/ch13/13_01_email.php">Excercise 13.1</a></p>
</footer>






  <!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
//<![CDATA[
var sc_project=6080262; 
var sc_invisible=1; 
var sc_security="ed805b7b"; 
//]]>
</script>
<script type="text/javascript"
src="http://www.statcounter.com/counter/counter_xhtml.js"></script>
<noscript><div class="statcounter"><a title="web counter"
href="http://statcounter.com/" class="statcounter"><img
class="statcounter"
src="http://c.statcounter.com/6080262/0/ed805b7b/1/"
alt="web counter" /></a></div></noscript>
<!-- End of StatCounter Code for Default Guide -->

  </body>
</html>