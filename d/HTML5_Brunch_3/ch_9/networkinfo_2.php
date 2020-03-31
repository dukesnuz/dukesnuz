<!--used below example-->
<!--
	http://html5brunch.mimisconsignment.com/ch9/brad-networkInfo.php
-->
<html>
<head>
	<title>Navigator</title>
	<meta name="viewport" content="width=device-width" />

	
	<style type="text/css">
		img{
			border: 1em solid #006600;
			padding: 1em;
			min-height:100px;
		}
	</style>
</head>
<body>
	<p>Ch_9.1 Testing navigator.connection</p>
	<div id="loadtime"></div>
	<img src="" alt="no name" id="testImg">

	<div id="results">
		
	</div>

 
  <script type="text/javascript">
//var testImg = document.createElement('img');


    //testImg.onload = function(){
	testImg.onload = function(){
		
	endTime = ( new Date() ).getTime();
 
	 var duration = (endTime -startTime) / 1000;
     
	 var loadtime = document.getElementById('loadtime');
	 
	loadtime.innerHTML = "Image loadeed in: " + duration + " seconds.";
	 
	// if duration id over a certain amount, then load small images
	// else load large images
	
	
	
	
	

}
 	
startTime = ( new Date()).getTime();

testImg.src ="check_mark_man.png";

		var connection = navigator.connection || navigator.mozConnection || navaigator.webkitConnection;
		
		var results = document.getElementById('results');
		
		results.innerHTML = "Bandwidth: " + connection.bandwidth + "<br/>";
		
		results.innerHTML+= "Metered: " + connection.metered + "<br/>";
		
		results.innerHTML += "Type: "+ connection.type;

</script>

<p>Credit to: <a href="http://html5brunch.mimisconsignment.com/ch9/brad-networkInfo.php">Brad</a></p>

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
