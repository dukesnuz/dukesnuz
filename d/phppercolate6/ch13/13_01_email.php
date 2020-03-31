<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="generator" content="CoffeeCup HTML Editor (www.coffeecup.com)">
    <meta name="dcterms.created" content="Thu, 26 Sep 2013 01:35:30 GMT">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Contact Me</title>
    
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
#maincontent{
    float:left;
	margin-top: 75px;
 
  }
footer{
       margin-top:375px;
	    }
h1{
  font-size:2.5em;
  color:#801855;
  font-weight:bold; 
  margin-left:10px;
 
  }
p{
  font-size:1.5em;
  color:#801855;
  font-weight:bold; 
  margin-left:100px;
  text-decoration:none;
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
  
.thankyou{
  font-size:1.5em;
  color:#1010FF;
  font-weight:bold; 
  margin-left:100px;
  }
.form{
      font-family:sans-serif;
	  font-weight: bold;
	  color: #C00;
	  font-style:italic; 
	  border: 3px #802F56 dashed;
	  margin-left: 50px;
	  font-size: .875em;
	  width:500px;
	  background-color:#FFFAE4
	  }	
.form  .field{
	  margin-left: 35px;
	  margin-top:14px;
	  background-color:#EDEDD9;
	  width:200px;
	  height:14px;
	   }
	   
	 .form  textarea {
	  margin-left:130px;
	  
	  background-color:#EDEDD9;
	  padding:0px;
	  width:200px;
	  height:100px;
	  
	   }
	   .form .comment{
	   
	    padding-top:5px;
		width:50px;
		
	    }
.form p{
   margin-left: 55px;
   font-size: .875em; 
    padding:2px;
	
     }

.form .button{
 
  background-color:#28FF10;
  font-size: 1.5em;
  border:4px solid #7777FF;
  border-style:outset;
  margin-left: 0 auto ;
  margin-right:0 auto ;
   }  
</style>
  </head>
  <body>
  <header>
<h1>Contact Me 13.01</h1>
<p><a href="http://dukesnuz.com/d/phppercolate6/home.php">Percolate 6 Home</a></p>
</header>


<div id="maincontent">
<?php #Script 13.1 - email.php

//validate something entered
if($_SERVER['REQUEST_METHOD'] == 'POST'){
//check for bad data entered
     //function will take 1 argument a string and returns a clean version of the string
	 function spam_scrubber($value)
	 {
	 $very_bad = array('to:', 'cc:', 'bcc:', 'content-type:', 'mime-version:',
	                   'multipart-mixed:', 'content-transfer-encoding:');
					   foreach($very_bad as $v)
					   {
					   if(stripos($value, $v) !== false) return '';
					   }
					   $value = str_replace(array( "\r", "\n", "%0a", "%0d"), '' , $value);
					   return trim($value);
	  }// End of spam_scrubber() finction
					   
					   //invoke the spam scrubber() function
					   $scrubbed = array_map('spam_scrubber', $_POST);
					   
     if( !empty($scrubbed['name']) && !empty($scrubbed['email'])  && !empty($scrubbed['comments'])   ) {
	 
	 //email body
	 $body = "Name: {$_POST['name']}\n\nComments: {$_POST['comments']}";
	 $body = wordwrap($body, 70);
	 
	 // send email and print message
	 mail('david@9015272529.com' , 
	       'Contact Form Submission' , 
		   $body,
	       "From: {$scrubbed['email']}");
		   
		  //send copy of message to person filling out form
		     //email body
			 $body ="{$scrubbed['name']}\n
			 Thank you contacting me. Below is your message:\n
			 {$scrubbed['comments']}\n\n
			 I will respond to you shortly.\n
			 Percolate 6\n
			 http://dukesnuz.com/d/phppercolate6\n
			  ";
		     
			 $body = wordwrap($body, 70);
			 mail($scrubbed['email'],
			     'Your Message has been recieved',
				 $body,
				   "From: {$scrubbed['email']}");
		      
		   
		   echo '<p class="thankyou">Thank you for contacting me. I will reply someday.</p>';
		   
		   //clear post array
		   //$_POST = array();
		   //per errata change above to below
		     $scrubbed = array();
		   
		   }else{
		   echo '<p class="form">Please fill out the form.</p>';
		   } // end if
		}// end of main isset() if
?>
<p>Please fill out the form to contact me.</p>
 <form action="13_01_email.php" method="post" class="form">
 
 	   	 <p> Name: <input class="field" type="text" name="name" 
 		  value="<?php if(isset($scrubbed['name']))  echo $scrubbed['name']; ?>"</p>
		  			   
		<p> Email: <input class="field" type="text" name="email" 
		  value="<?php if(isset($scrubbed['email']))  echo $scrubbed['email']; ?>"</p>

		  <p class="comment" >Comments:</p> <textarea name="comments">
		  <?php if(isset($scrubbed['comments'])) echo $scrubbed['comments']; ?></textarea></p>
  
           <p><input type="submit" name="submit" value="Send!" class="button"/></p>
  </form>
</div><!--end maincontent-->
<footer>
      <p><a href="http://dukesnuz.com/d/phppercolate6/ch13/13_02_calculator.php">Excercise 13.2</a></p>
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