<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="generator" content="CoffeeCup HTML Editor (www.coffeecup.com)">
    <meta name="dcterms.created" content="Fri, 11 Oct 2013 22:30:47 GMT">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Login</title>
    
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
	
	
	<script type="text/javascript" src="js/jquery-1.10.2.min.jis.js" charset="utf-8"></script>
	
	<script type="text/javascript" src="js/15_10_login.js" charset="utf-8"></script>
    <!--
	<script type="text/javascript" src="js/login.js" charset="utf-8"></script>
	-->
	<!--
	<script type="text/javascript" src="js/15_02_test.js" charset="utf-8"></script>
	-->
<script>
$(document).ready(function(){
//$('.errorMessage').hide(); //hide error messages
});
</script>
  </head>
  <body>
<!-- Script 15.8 - login.php -->
<h1>Login<h1>
<h3>Creating a server side script using ajax.</h3>
<p>This is one of my favorite forms.</p>
<p id="results"></p>

<form action="15_08_login.php" method="post" id="login" />

	  <p id="emailP">Email Address:<input type="text" name="email" id="email" />
	    <span class="errorMessage" id="emailError">Please enter your email address!</span></p>
		
	  <p id="passwordP">Password:<input type="text" name="password" id="password" />
	    <span class="errorMessage" id="passwordError">Please enter your password!</span></p>
		
	  <p><input type="submit" name="submit" id="submit" value="Login!" /></p>
</form>


 <p><a href="http://dukesnuz.com/d/phppercolate6/ch15/15_01_test.html" title="Excercise 15.1 Using jQuery Alert! box" target="blank">Excercise 15.1</a></p>
   
  </body>
</html>