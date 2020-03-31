<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Retro Time Machine-Date Created</title>

<!--
<link href="http://dukesnuz.com/d/styles/stylesheet.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="http://dukesnuz.com/d/images/favicon.ico">
<link href="http://dukesnuz.com/d/jqueryjam3/fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet">
<script type="text/javascript" src="http://dukesnuz.com/d/jqueryjam3/js/jquery.js"></script>
<script src="http://dukesnuz.com/d/jqueryjam3/_js/jquery-1.7.2.min.js"></script>
<script src="http://dukesnuz.com/d/jqueryjam3/_js/jquery.easing.1.3.js"></script>
<script src="http://dukesnuz.com/d/jqueryjam3/fancybox/jquery.fancybox-1.3.4.js"></script>


<script src="http://dukesnuz.com/d/jqueryjam3/xtras/printtime.js">--->
 

</head>

<body>
<!--<class="time" style="color: #606; font-size:12px; font-weight:bold;"> -->
<h55>Retro Time Machine</h55>

<script>
//var int=self.setInterval(function(){ printTime(true)},1000);
// document.write(printTime(true));
</script>
</h55>
<!--</div> -->
<!--start-->

<script>	
$(document).ready(function() {
var int=self.setInterval(function(){ printElapsed()},1000);
function  printElapsed()
	{
	//var start= new Date();
	var start= new Date(2013,6,24,0,0,0,0);
	//              year,month,day,min,sec,milsec
	var startmil=start.getTime();
	var today = new Date();
	var todaymil=today.getTime();
	var elapsedmil= Math.round(todaymil-startmil);
	var elapseddays =Math.round(elapsedmil/86400000);
	var elapsedhours =Math.round(elapsedmil/3600000);
	var elapsedminutes =Math.round(elapsedmil/60000);
	var elapsedseconds =Math.round(elapsedmil/1000);
	
	
	//
	//var timeunix=today.getTime();
	
	//document.write(elapseddays);
	//document.write("<p>This web page created @:&nbsp;" + start+"</p>");
	//document.write("<p>" + startmil+" &nbsp;milliseconds from midnight 1/1/1970.</p>");
	//document.write("<p>" + elapseddays +"&nbsp;days ago.</p>");
	//document.write("<p>" + elapsedhours +"&nbsp;hours ago.</p>");
	//document.write("<p>" + elapsedminutes +"&nbsp;minutes ago.</p>");
	//document.write("<p>" + elapsedseconds +"&nbsp;seconds ago.</p>");
    
	$('.today').text(today);
    $('.created').text("Time since started book & webpage:");
	$('.timedays').text(elapseddays +"...days ago.");
	$('.timehours').text(elapsedhours +"...hours ago.");
	$('.timeminutes').text(elapsedminutes +"...minutes ago.");
    $('.timeseconds').text(elapsedseconds +"...seconds ago.");
	//$('.timemil').text(elapsedtmil +"...milliseconds ago.");
	//$('.timeunix').text(elapsedmil +"...milliseconds from midnight on 1/1/1970.");
	$('.timeunix').text(todaymil +"...milliseconds from midnight on 1/1/1970.");
	}//end function
});//end ready
</script>

<hr />
<div class="today"></div> 

<!--<div class="currenttime"></div>  -->

<div class="timeunix"></div> 
<hr />
<div class="created"></div>
<!--<div class="timecreated"></div> -->
<div class="timedays"> </div>
<div class="timehours"> </div>
<div class="timeminutes"> </div>
<div class="timeseconds"> </div> 
<!--<div class="timemil"></div>  -->
       	
<!--end -->








<?php //include('stats.php');?>


</body>
</html>
