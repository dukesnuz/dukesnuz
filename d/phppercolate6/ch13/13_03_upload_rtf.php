<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="generator" content="CoffeeCup HTML Editor (www.coffeecup.com)">
    <meta name="dcterms.created" content="Thu, 26 Sep 2013 01:35:30 GMT">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Upload a RTF Document</title>
    
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
  color:#1010FF;
  font-weight:bold; 
  margin-left:100px;
  }
  
  form {
	margin: 0 0 0 0;
	padding: 0;
	
}
#form{
	background: #C04A83;
	padding: 20px;
	width: 400px;
	border: solid #FCF9B3 4px;
	-webkit-border-radius: 18px;
	-moz-border-radius:18px;
	border-radius: 18px;
	margin-left:auto;
    margin-right: auto;
	margin-top:10px;
	margin-bottom:10px;
	  }	
#form fieldset{
	margin-bottom:10px;	
}
legend{
	color:#FFFFFF;
	font-size:1em;
	font-weight:bold;
	padding-bottom: 20px;
}
#form label{
	float:left;
	font-size:.75em;
	width:110px;
	margin-right:60px;
	color:#FFFFFF;
	padding-bottom:25px;
	
}
#form .button{
  background-color: #FC726A;
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
	border-radius: 5%;
	border: 10px #1609FF groove;

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
<h1>Upload a RTF File 13.03</h1>
<p><a href="http://dukesnuz.com/d/phppercolate6/home.php">Percolate 6 Home</a></p>
</header>
<div id="maincontent">
<?php #Script 13.3 - upload_rtf.php

//check if form has been submitted
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
// check for an uploaded file
    if(isset($_FILES['upload']) && file_exists($_FILES['upload']['tmp_name']))
	{
	//create Fileinfo resource
	$fileinfo = finfo_open(FILEINFO_MIME_TYPE);
	//check file type
	if(finfo_file($fileinfo,$_FILES['upload']['tmp_name']) == 'text/rtf')
	{
	//delete uploaded file
	unlink($_FILES['upload']['tmp_name']);
	}else{//invalid type
	echo '<p class="error">Please upload an RTF document.</p>';
	}
	//close Fileinfo resource
	finfo_close($fileinfo);
	}//end of isset($_FILES['upload']) If
	}// End of the submitted conditional
	//debugging can als be added see page 417
?>

<div id="formback">

<form id="form" enctype="multipart/form-data" action="13_03_upload_rtf.php" method="post" />
<input type="hidden" name="MAX_FILE_SIZE" value="524288" />
<fieldset><legend>Select an RTF document of 512kb or smaller to be uploaded:</legend>
<label>File:  <input type="file" name="upload" /></label>
</fieldset>
<input class="button" type="submit" name="submit" value="Submit" />
</form>







</div>
</div><!--end maincontent-->
<footer>
        <p><a href="http://dukesnuz.com/d/phppercolate6/ch13/13_04_xss.php">Excercise 13.4</a></p>
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