<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Open Flash</title>



<!--<link href="http://dukesnuz.com/d/styles/stylesheet.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="http://dukesnuz.com/d/images/favicon.ico">
<link href="http://dukesnuz.com/d/jqueryjam3/fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet">
<script type="text/javascript" src="http://dukesnuz.com/d/jqueryjam3/js/jquery.js"></script>
<script src="http://dukesnuz.com/d/jqueryjam3/_js/jquery-1.7.2.min.js"></script>
<script src="http://dukesnuz.com/d/jqueryjam3/_js/jquery.easing.1.3.js"></script>
<script src="http://dukesnuz.com/d/jqueryjam3/fancybox/jquery.fancybox-1.3.4.js"></script>
 -->
 
 
<style type="text/css">
<!--
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
-->
</style></head>

<body>

<!--<div id="container">
  <div id="mainContent">
  -->

<!-- start my sign -->
 <!--<input type="text" id="speed"/>  --> 
<script>
$(document).ready(function() {
var int=self.setInterval(function(){open()},1500);
function open()
{
$('.sign1').text('WE ARE OPEN!');
$('.sign1').css('color', '#F00');
$('.sign1').css('background-color', '#FFF');
$('.sign1').css('border', '4px solid #F00');
$('.sign1').css('height' ,'1.5em');
$('.sign1').css('width', '10em');
$('.sign1').css('font-size', '15px');
}
	 }); //end ready
</script>

<script>
$(document).ready(function() {
var int=self.setInterval(function(){enter()},1700);
function enter()
{
$('.sign1').text('COME ON IN!');
$('.sign1').css('color', '#FFF');
$('.sign1').css('background-color', '#066');
$('.sign1').css('border', '4px solid #00F');
}
	}); //end ready
</script>

<script>
$(document).ready(function() {
var int=self.setInterval(function(){set()},1900);
function set()
{
$('.sign1').text('setInterval() Used');
$('.sign1').css('color', '#006');
$('.sign1').css('background-color', '#CFF');
$('.sign1').css('border', '4px solid #909');
}
						   }); // end ready
</script>


<!--<button
onclick="">change flash speed</button> 
end -->




<!--<div id="signmenu"> 

<a href="#" target="_blank">#</a>
</div> -->


<a href="http://www.w3schools.com/jsref/met_win_setinterval.asp" target="_blank">
<div class="sign1"> </div>
</a>


	<!-- end #mainContent </div>--->
<!-- end #container </div>--->
<?php include('stats.php');?>
</body>
</html>
