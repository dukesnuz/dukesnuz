
/*
 * get map
 */
/*
function getMap() {
	"use strict";

	//create ajax object
	var ajax = getXmlHttpRequest();
	var loc = $('locInput').value;
	var posFirst = loc.indexOf(",");
	var posLast = loc.lastIndexOf(",");
	var country = loc.slice(posLast + 1).trim();
	var city = loc.slice(0, posFirst);
    
	if (country == 'United States') {
		var state = loc.slice(posLast - 2, posLast);
	} else {
		var state = loc.slice(posLast + 1);
	}
	
	ajax.addEventListener("readystatechange", function() {

		if (ajax.readyState === 4) {
			if ((this.response !== "error") && (ajax.status >= 200 && ajax.status < 300) || (ajax.status == 304)) {
				// clear error code if one from previous search
				errorPrint('output', 'noError');

				returnedMap = this.response; // JSON.parse(this.response);
			

			} else {
				errorPrint('output', 'Could not get location data');
			} //END if ((this.response !== "error")
		} // END if (ajax.readyState === 4)
	}, false);
	// tired of commenting out and in when live or developing, so I added and if statement that checks if LIVE or Not
	//if (window.location.host === "www.dukesnuz.com") {
		/***LIVE***/
		// the above is causing a cors error. I am adding a php script as used in the book we have for class
		// page 468. the ajax call is calling the php script on the same domain and the PHP script is using
		// curl to make the call to the outside domain. This is pretty cool.
		/*********use the below line when live***********/
		//ajax.open('GET', '/weather/php_weather/wunderground.php?state=' + state + '&city=' + city + '', true);
		//ajax.open('GET', 'php_weather/wunderground.php?state=' + state + '&city=' + city + '', true);
	//} else {
		/***LOCAL***/
		/******if using local host use below and this extension*******/
		// https://chrome.google.com/webstore/detail/allow-control-allow-origi/nlfbmbojpeacfghkpbjhddihlkkiljbi?utm_source=chrome-app-launcher-info-dialog
		/*****leaveing below line for developement when using localhost*****/
		//ajax.open('GET', 'http://api.wunderground.com/api/75355b3e4adcf97f/animatedradar/animatedsatellite/q/' + state + '/' + city + '.gif?num=6&delay=50&interval=30',true);
		//ajax.open('GET', 'http://api.wunderground.com/api/75355b3e4adcf97f/animatedradar/q/tn/memphis.gif?maxlat=48.3&maxlon=-68.8&minlat=35.3&minlon=-92.6&width=1085&height=798&rainsnow=1&timelabel=1&timelabel.x=925&timelabel.y=41',true);
                 
	//}
//	ajax.send();

//};