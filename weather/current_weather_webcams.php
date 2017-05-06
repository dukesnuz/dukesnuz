<!--weather page using wunderground api-->
<?php
//check if config file exists
if(file_exists("./includes/config.inc.php")) {
require ('./includes/config.inc.php');
$folder_level=FOLDER_LEVEL_1;
} elseif(file_exists("../includes/config.inc.php")) {
require ('../includes/config.inc.php');
$folder_level=FOLDER_LEVEL_2;
} else {
$body="Page:header.inc.html\rline10-config.inc.php file not found\rEND email";
mail("hello@dukesnuz.com","ERROR DukesNuz",$body,"hello@dukesnuz.com");
die("OOppss! System error. We apologize for in inconvenience. Error has been reported to Dukesnez");
}
// add page title for tracking history
$title = "Weather and Webcams | Dukesnuz";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="description" content="Get current weather and webcams. Weather webcam app uses wunderground and Geobytes api. Web page coded using HTML, CSS, javaScript, jQuery, JSON, PHP and api.">
		<meta name="keywords" content="David Petringa, Boston Ma, front-end-backend-web-developer, Dukesnuz, HTML, CSS, JavaScript, jQuery, PHP, JSON, weather, webcams, api">
		<meta name="author" content="David Petringa, Dukesnuz, Boston, Ma, front end, backend, web developer, Coded February 2017">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<title>Weather &amp; Webcams | Dukesnuz</title>
		<link rel = "stylesheet" href = "http://www.dukesnuz.com/css_libs/dukes_normalize.css"/>
		<link rel = "stylesheet" href = "css_weather/css_weather.css"/>

		<link rel = "shortcut icon" type="image/x-icon" href="http://www.dukesnuz.com/d/images/favicon.ico">

		<script
		src="https://code.jquery.com/jquery-3.1.1.min.js"
		integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
		crossorigin="anonymous"></script>

		<script type="text/javascript" src = "http://www.dukesnuz.com/jquery_plugins/jquery.jcarousel-core.js"></script>
		<!--
		<script src ="https://cdn.jsdelivr.net/g/jcarousel@0.3.4(jquery.jcarousel.js+jquery.jcarousel-scrollintoview.js+jquery.jcarousel-pagination.js+jquery.jcarousel-core.js+jquery.jcarousel-control.js+jquery.jcarousel-autoscroll.js+jquery.jcarousel-scrollintoview.min.js+jquery.jcarousel-pagination.min.js+jquery.jcarousel-core.min.js+jquery.jcarousel-control.min.js+jquery.jcarousel-autoscroll.min.js+jquery.jcarousel.min.js)"></script>
		-->
		<script type="text/javascript" src = "http://www.dukesnuz.com/js_libs/dukes.javascript.js"></script>
		<script type = "text/javascript" src = "js_weather/js_weather.js"></script>

	</head>

	<body>

		<header>
			<h1><a href = "http://www.dukesnuz.com">Duke's Weather and Webcam Center</a></h1>
			<h2>Weather Forcast For Tonight: Dark</h2>
			<small><a href = "https://www.brainyquote.com/quotes/keywords/weather.html" target="blank">George Carlin</a></small>
		</header>

		<section class = "search">
			<h2>Enter a city and state</h2>
			<input type = "search" id = "locInput" placeholder="Enter a city and state">
			<div id = "autoOutput" ></div>
		</section>
		<section class = "flex-container">
			<h2>Weather and Webcams Found</h2>
			<div class = "flex-item-1">
				<div id = "output"></div>

				<div id = "location">
					<p></p>
				</div>

				<div id = "local_time">
					<p></p>
				</div>

				<div id = "weather">
					<p></p>
				</div>

				<div id = "temp"></div>

				<div id = "forcast_url"></div>

				<div id = "map"></div>
			</div>

			<div class = "flex-item-2">

				<div class="jcarousel-pagination">
					<!--  Pagination items will be generated in here-->
				</div>

				<div id = "camDescription"></div>

			</div>
			<div  class = "jcarousel" id = "list"></div>

		</section>
		<footer>

			<div class = "flex-item-1">
				<ul class = "pageInfo">
					<li>
						Weather and webcams
					</li>
					<li>
						Coded by: <a href = "http://www.dukesnuz.com">David Petringa</a>
					</li>
					<li>
						Coded February 2017
					</li>
					<li id = "year"></li>
				</ul>

				<ul class = "pageInfo">
					<li>
						Pages Coded and Credits
					</li>
					<li id = "stylesLink"></li>
					<li id = "normalizeLink"></li>
					<li id = "jsLink"></li>
					<li id = "jcLink"></li>
					<li id = "jsLibraryLink"></li>
					<li id = "wundergroundPhpLink"></li>
					<li id = "geobytesPhpLink"></li>
					<li id = "wundergroundApiLink"></li>
					<li id = "geobytesApiLink"></li>
					<li id = "linkedinLink"></li>
					<li id = "twitterLink"></li>
					<li id = "githubLink"></li>
					<li id = "websitesLink"></li>
				</ul>

			</div>

			<div class = "flex-item-2">
				<p></p>

				<div id = "tos"></div>
			</div>

			<div class = "flex-item-3">
				<p>
					Welcome to my weather and webcams web app. From a technology and coding perspective, the main
					objective is to demonstrate my knowledge for using HTML, CSS, PHP, JavaScript, jQuery, jQuery plugin, AJAX and an API. I am using
					the <a href = "http://sorgalla.com/jcarousel/" target="blank">jQuery jCarousel</a> plugin to display the retrieved webcam images.
					The weather conditions and webcams are coming form two seperate api calls to
					<a href = "https://www.wunderground.com/weather/api" target="blank">Wunderground</a>. For the city and state retrieval I am using
					this cool api from <a href = "http://geobytes.com/" target="blank">Geobytes</a>. I used PHP and cURL for 2 api calls.
					This eliminates <a href = "https://developer.mozilla.org/en-US/docs/Web/HTTP/Access_control_CORS" target="blank">CORS</a>" issues.
					I did not make this responsive as my objective was to demonstrate using HTML, CSS, JavaScript and API calls.
				</p>
				<p>
					The JCarousel gets a hickup every once in a while with respect to new images. I am thinking this may be due to
					retrieveing the images from an api and the images are of various sizes, maybe.
				</p>
				<p>
					I have a little more clean up work to do on the code such as adding some comments and going over code that is not needed.
					I wanted to get it life to see how it performs.
				</p>
			</div>

		</footer>

		<!--Start of Tawk.to Script-->
		<script type="text/javascript">
			var Tawk_API = Tawk_API || {},
			    Tawk_LoadStart = new Date();
			(function() {
				var s1 = document.createElement("script"),
				    s0 = document.getElementsByTagName("script")[0];
				s1.async = true;
				s1.src = 'https://embed.tawk.to/561278e100d3af75029e428b/default';
				s1.charset = 'UTF-8';
				s1.setAttribute('crossorigin', '*');
				s0.parentNode.insertBefore(s1, s0);
			})();
		</script>
		<!--End of Tawk.to Script-->

		<!-- Start of StatCounter Code for Default Guide-->
		<script type="text/javascript">
			var sc_project = 6080262;
			var sc_invisible = 1;
			var sc_security = "ed805b7b";
			var scJsHost = (("https:" == document.location.protocol) ? "https://secure." : "http://www.");
			document.write("<sc" + "ript type='text/javascript' src='" + scJsHost + "statcounter.com/counter/counter.js'></" + "script>");
		</script>
		<noscript>
			<div class="statcounter">
				<a title="shopify site
				analytics" href="http://statcounter.com/shopify/"
				target="_blank"><img class="statcounter"
				src="http://c.statcounter.com/6080262/0/ed805b7b/1/"
				alt="shopify site analytics"></a>
			</div>
		</noscript>
		<!--End of StatCounter Code for Default Guide -->
		
		<?php
		if(file_exists('./site_utilities/page_history.inc.php')) {
		include ('./site_utilities/page_history.inc.php');
		} elseif(file_exists('../site_utilities/page_history.inc.php')) {
		include ('../site_utilities/page_history.inc.php');
		} else {
		$body="Page: site_utilities/footer.inc.php\rline 15 history.inc.php could not found\rEND email";
		mail(CONTACT_EMAIL,"ERROR DukesNuz",$body,CONTACT_EMAIL);
		//echo $body;
		exit();
		}
		?>

	</body>

</html>
