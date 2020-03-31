<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="generator" content="CoffeeCup HTML Editor (www.coffeecup.com)">
    <meta name="dcterms.created" content="Thu, 26 Sep 2013 01:35:30 GMT">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Matching and Replacing Patterns</title>
    
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
       margin-top:600px;
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
	width: 575px;
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
	  margin-left:130px;
	  
	  background-color:#EDEDED;
	  padding:0px;
	  width:200px;
	  height:75px;
	  
	   }
#form p{
	   
	    padding-top:5px;
		
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
   margin-left:15px;
   height:25px;
   width:300px;
   background-color:#EDEDED;
   padding:10px;
   }
label{
	  margin-right:10px;
	  text-align:right;
	   }

	 
#formback{
    margin-left: 35px;
	width:640px;
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
<h1>Matching and Replacing Patterns14.03</h1>
<p><a href="http://dukesnuz.com/d/phppercolate6/home.php">Percolate 6 Home</a></p>
</header>
<div id="maincontent">
<?php #Script 14.03 - 14_03_replace.php
if($_SERVER['REQUEST_METHOD'] == 'POST')
	  {
	 	// treat incoming values
		$pattern = trim($_POST['pattern']);
		$subject = trim($_POST['subject']);
		$replace= trim($_POST['replace']);
		
		//remove any added extra slashes
		$pattern = stripslashes(trim($_POST['pattern']) );
		$subject = stripslashes(trim($_POST['subject']) );
		$replace = stripslashes(trim($_POST['replace']) );
		
		
		echo "<p>The result of replacing ,br /><b>$pattern</b><br /> with<br />$replace<br />in <br />$subject<br / ><br />";
		
		//run regular expression
		if(preg_match($pattern, $subject))
		{
		echo preg_replace($pattern, $replace, $subject) . '</p>';
		}else{
		echo 'The pattern was not found!</p>';
		}
}//end if submission
  
?>

<p>Form style looks sweet wide also!</p>

<section id="formback">


<form id="form" action="14_03_replace.php" method="post">
	<fieldset>
	  			<legend>Regular Expression Pattern</legend>
				
				<p><label>Input Pattern:</label><input  class="field" name="pattern" type="text" 
						    value="<?php if(isset($pattern)) echo htmlentities($pattern); ?>" /></p>
				
				<p><label>Replacement:</label><input class="field" name="replace" type="text" 
				            value="<?php if(isset($replace)) echo htmlentities($replace); ?>" /></p>	
				
				<p><label>Input Subject:</label><input class="field" name="subject" type="text" 
				             value="<?php if(isset($subject)) echo htmlentities($subject); ?>" /></p>	
	</fieldset>
	
	 <input class="button" type="submit" name="submit" value="Test" />
	 
</form>
	   

</div>
</div><!-- end maincontent--->
<footer>
  <p><a href="http://dukesnuz.com/d/phppercolate6/ch14/14_01_pcre.php">Excercise 14.1</a></p>
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