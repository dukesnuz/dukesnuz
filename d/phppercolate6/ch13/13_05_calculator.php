<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="generator" content="CoffeeCup HTML Editor (www.coffeecup.com)">
    <meta name="dcterms.created" content="Thu, 26 Sep 2013 01:35:30 GMT">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Widget Cost Calculator FILTER_SANITIZE_STRING</title>
    
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
	background:#9AB4D7;
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
	color:#384313;
	font-size:1em;
	font-weight:bold;
	padding-bottom: 25px;
}
#form label{
	float:left;
	font-size:.75em;
	width:110px;
	margin-right:60px;
	color:#936;
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
	border: 5px #1609FF dotted;
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
<h1>Widget Cost Calculator  Using FILTER_SANITIZE_STRING 13.05</h1>
<p><a href="http://dukesnuz.com/d/phppercolate6/home.php">Percolate 6 Home</a></p>
</header>
<div id="maincontent">
<?php #Script 13.2 - calculator.php
if($_SERVER['REQUEST_METHOD'] == 'POST')
	 {
	// $quantity = (int) $_POST['quantity'];
	//$quantity = (isset($_POST['quantity'])) ? FILTER_VALIDATE_INT, array('min_range' => 1)) : NULL;
	// above line same as line below
	if(isset($_POST['quantity']))
	{
	$quantity = filter_var($_POST['quantity'], FILTER_VALIDATE_INT, array('min_range' => 1));
	}else{
	$quantity = NULL;
	}
	
	//change price variable
	//$price = (float) $_POST['price'];
	//$price = (isset($_POST['price'])) ? filter_var($_POST['price'],FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION): NULL
	 //above line same as below line
	 if(isset($_POST['price']))
	 {
	 $price = filter_var($_POST['price'] , FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
     }else{
	 $price = NULL;
	 }
	 
	 
     //change tax variable
     //$tax = (float) $_POST['tax'];
	//$tax =(isset($_POST['tax'])) ? filter_var($_POST['tax'],FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION) : NULL
	 //above line same as below line
	 if(isset($_POST['tax']))
	 {
	 $tax = filter_var($_POST['tax'] , FILTER_SANITIZE_NUMBER_FLOAT , FILTER_FLAG_ALLOW_FRACTION);
	 }else{
	 $tax= NULL;
	 }
	    
	 	  if( ($quantity > 0) && ($price > 0)  && ($tax > 0) )
		  {
		  $total = $quantity * $price;
		  $total += $total * ($tax/100);
		  echo '<p>The total cost of purchasing ' . $quantity . ' widget(s) at $'
		  . number_format($price,2) .' each, plus tax, is $' . number_format($total, 2) . '.</p>';
		  }else{
		  	echo '<p><span class="error">Please enter a valid quantity, price, and tax rate.</span></p>';
		    }//end 
			
			
	}//end main isset()if
?>



<div id="formback">

<form id="form" action="13_05_calculator.php" method="post">
<fieldset>
<label for="quantity">
Quantity:<input type="text" name="quantity"
		  value="<?php if(isset($quantity)) echo $quantity; ?>" /></label>

<label for="price">
Price:<input type="text" name="price"
	   value="<?php if(isset($price)) echo $price; ?>"/></label>
	   
<label for="tax">   
Tax:<input type="text" name="tax"
	 value="<?php if(isset($tax)) echo $tax; ?>"/></label>
	 
</fieldset> 
<input type="submit" name="submit" value="Calculate" class="button"/>

</form>
</div>
</div><!--end maincontent-->
<footer>
  <p><a href="http://dukesnuz.com:81/ch13/13_06_post_message.php">Excercise 13.6</a></p>
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