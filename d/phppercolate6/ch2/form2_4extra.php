<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="generator" content="CoffeeCup HTML Editor (www.coffeecup.com)">
    <meta name="dcterms.created" content="Mon, 19 Aug 2013 14:56:48 GMT">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Simple HTML Form || Boston PHP || Percolate Season 6</title>
    <link href="../styles/percolate6.css" rel="stylesheet" type="text/css">
    
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<style>
	label{
	font-weight:bold;
	color: #300ACC;
	}
	.title{
	font-weight:bold;
	color: blue;
	label{
 		 font-weight:300;
		 color:blue;
		 font-size: .9em;
	}
	
	</style>
  </head>
  <body>
<!-- Pursuit 2 extra-->
Pursuit 2
<?php
echo '<p class="title">Fill in the form leaving age blank, then select each age catagory finding an interesting fact in one age bracket.</p>';
?>
<form action="ch2/handle_form2_4extra.php" method="post">

<fieldset><legend>Enter your information in the form below:</legend>
<p><label>Name: <input type="text" name="name" size="20" maxlength="40" /></label></p>
<p><label>Email Address:<input type+"text" name="email" size+"40" maxlength="60" /></label></p>
<p><label for="gender">Gender:</label><input type="radio" name="gender" value="M"/>Male<input type ="radio" name="gender" value="F"/>Female</p>
<p><label>Age:<select name="age">
					  <option value=""></option</option>
					  <option value="29">Under 30 </option>
					  <option value="64">Between 30 and 64 </option>
					  <option value="65">Over 65 </option>
			  </select></label></p>
<p><label>Comments:<textarea name="comments" rows="3" cols="40"></textarea></label></p>
</fieldset>
		   <p align="center"><input type="submit" name="submit" value="Submit my Information"/></p>
</form>

<?php include('../../stats.php');?>
  </body>
</html>