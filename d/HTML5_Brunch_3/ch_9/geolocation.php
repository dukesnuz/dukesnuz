<html>
<head>
	<title>Geolocation</title>
	<meta name="viewport" content="width=device-width" />
	<style type="text/css">
	#arrow{
		display: block;
		font-size: 80px;
		font-weight: bold;
		height: 80px;
		width: 80px;
		color: green;
		}
	</style>
</head>
<body>
	<h1>Testing the geolocation API.</h1>
	<span id="arrow">&#8593;</span>
	<div id="results">
		

	</div>
	<script type="text/javascript">
		//var results = document.getElementById('results');
		var results = document.getElementById('results');
		//lambeau field location
		//var lambeau = {
		var bostonphp ={
			'lat' : 42.36,
			'long' : -71.08
		}

		//creative commons distance function
		function calculateDistance(lat1, lon1, lat2, lon2) {
			var R = 3959; // miles
			var dLat = (lat2 - lat1).toRad();
			var dLon = (lon2 - lon1).toRad(); 
			var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
			      Math.cos(lat1.toRad()) * Math.cos(lat2.toRad()) * 
			      Math.sin(dLon / 2) * Math.sin(dLon / 2); 
			var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a)); 
			var d = R * c;
			return d;
		}
		function calculateBearing(lat1, lon1, lat2, lon2) {
			return Math.atan2(
				Math.sin(lon2 - lon1) * Math.cos(lat2),
				Math.cos(lat1) * Math.sin(lat2) -
				Math.sin(lat1) * Math.cos(lat2) *
				Math.cos(lon2 - lon1)
			) * 180 / Math.PI;
		}
		Number.prototype.toRad = function() {
			return this * Math.PI / 180;
		}
		//check for support
		//if (navigator.geolocation) {
		if (navigator.geolocation){	
			//navigator.geolocation.getCurrentPosition(function(pos) {
			navigator.geolocation.getCurrentPosition(function(pos){
				//results.innerHTML += "<p>Only " + calculateDistance(pos.coords.latitude, pos.coords.longitude, lambeau.lat, lambeau.long) + " miles from hallowed Lambeau Field.</p>";
				results.innerHTML += "<p>You are only" +  calculateDistance(pos.coords.latitude, pos.coords.longitude, bostonphp.lat, bostonphp.long) + " miles from Boston PHP.</p>";
				//var bearing = calculateBearing(pos.coords.latitude, pos.coords.longitude, lambeau.lat, lambeau.long);
				var bearing = calculateBearing(pos.coords.latitude, pos.coords.longitude, bostonphp.lat, bostonphp.long);
				//var arrow = document.getElementById('arrow');
		        var arrow = document.getElementById('arrow');
				//arrow.style.transform = 'rotateZ(' + bearing + 'deg)';
				arrow.style.transform ='rotateZ(' + bearing + 'deg)';
				arrow.style.msTransform = 'rotateZ(' + bearing + 'deg)';
				arrow.style.msTransform = 'rotateZ(' + bearing + 'deg)';
				arrow.style.mozTransform = 'rotateZ(' + bearing + 'deg)';
				arrow.style.oTransform = 'rotateZ(' + bearing + 'deg)';
				arrow.style.webkitTransform = 'rotateZ(' + bearing + 'deg)';
			//}, function(error) {
			}, function(error){
				//ruh roh!
				//alert('Whoops! Error code: ' + error.code);
				alert('Whoops! Error code:' + error.code);
			//});
			});
		}
	</script>
	<script>document.write('<script src="http://10.10.1.155:35729/livereload.js?snipver=1"></' + 'script>')</script>
	
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