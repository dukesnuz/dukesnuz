<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="generator" content="CoffeeCup HTML Editor (www.coffeecup.com)">
    <meta name="dcterms.created" content="Thu, 26 Sep 2013 01:35:30 GMT">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>XSS Attacks</title>
    
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
	background: #EFFF38;
	padding: 15px;
	width: 400px;
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
	color: #FF0000;
	font-size:1.5em;
	font-weight:bold;
	padding-bottom: 20px;
}
#form  textarea {
	  margin-left:130px;
	  
	  background-color:#EDEDD9;
	  padding:0px;
	  width:200px;
	  height:100px;
	  
	   }
#form .comment{
	   
	    padding-top:5px;
		width:50px;
		
	    }
#form .button{
  background-color: #FF0916;
  font-size:.875em;
  border:4px solid #7777FF;
  border-style:outset;
  margin-left: 0 auto ;
  margin-right:0 auto ;
  margin-top:10px;
  padding:5px;
   }  
#formback{
    margin-left: 35px;
	width:500px;
    background-color: #00B5FC;
	float: right;
	border-radius: 1%;
	border: 30px  #92FF1D double;
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
<h1>XSS Attacks 13.04</h1>
<p><a href="http://dukesnuz.com/d/phppercolate6/home.php">Percolate 6 Home</a></p>
</header>
<div id="maincontent">
<?php #Script 13.4 - xss.php
//check for form submission
if($_SERVER['REQUEST_METHOD'] =="POST")
{
echo "<h2>Original</h2><p>{$_POST['data']}</p>";

//apply htmlentities and print result
   echo '<h2>After htmlentities()</h2><p>' . htmlentities($_POST['data']) . '</p>';

//apply strip tags print result
  echo '<h2>After strip_tags()</h2><p>' . strip_tags($_POST['data']). '</p>';

}//end if
?>

<div id="formback">

<form id="form" action="13_04_xss.php" method="post" />

<fieldset>
<legend>Do your worst!</legend>
<textarea name="data" /></textarea>

</fieldset>
<input class="button" type="submit" name="submit" value="Submit" />
</form>







</div>
</div><!--end maincontent-->
<footer>
       <p><a href="http://dukesnuz.com/d/phppercolate6/ch13/13_05_calculator.php">Excercise 13.5</a></p>
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