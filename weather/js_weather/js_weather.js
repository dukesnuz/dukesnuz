/********************************************************************************************************************
 * javascript file for weather
 * js_weather.js
 * https://www.wunderground.com/weather/api/d/docs?MR=1
 * http://sorgalla.com/jcarousel/
 * city look up function
 * http://gd.geobytes.com/AutoCompleteCity?callback=?&q=memphis
 * http://geobytes.com/
 *
 * I am using my library which has $ = getdocumentById. When using jQuery I am setting $ = jQuery inside the function
 * ajax object is coming from my libray
 * errorPrint('output', 'noError'); also in my library
 * last updated 2/9/16
 */

/**************
 * function gets the city and state entered into the input field. an ajax call is made to an api to retrieve matches
 * I have included a local and live ajax call. if live use the php script
 * this function also calls the displayAuto function
 *
 */
function getLocation() {
	"use strict";

	//create ajax object
	var ajax = getXmlHttpRequest();
	var city = $('locInput').value;

	ajax.addEventListener("readystatechange", function() {

		if (ajax.readyState === 4) {
			if ((this.response !== "error") && (ajax.status >= 200 && ajax.status < 300) || (ajax.status == 304)) {
				// clear error if one was previosuly printed
				errorPrint('output', 'noError');

				returnedLocation = JSON.parse(this.response.slice(2, -2));

				displayAuto(returnedLocation, 'autoOutput');

			} else {
				errorPrint('output', 'Could not get location data');
			} //END if ((this.response !== "error")
		} // END if (ajax.readyState === 4)
	}, false);

	//if (window.location.host === "www.dukesnuz.com") {
	/***LIVE***/
	/*********use the below line when live***********/
	ajax.open('GET', './php_weather/geobytes.php?city=' + city + '');
	//} else {
	/***LOCAL***/
	/******if using local host use below and this extension*******/
	// https://chrome.google.com/webstore/detail/allow-control-allow-origi/nlfbmbojpeacfghkpbjhddihlkkiljbi?utm_source=chrome-app-launcher-info-dialog
	/*****leaveing below line for developement when using localhost*****/
	////throwing error
	//ajax.open('GET', 'http://gd.geobytes.com/AutoCompleteCity?callback=?&q=' + city, true);
	//}
	ajax.send();

}// END function

/******************************************************************************************
 * displays drop down of found locations
 * @param locations returned from getLocation function
 * @param loc location to print output
 * function is called from getLocation function
 */
function displayAuto(locations, loc) {
	"use strict";
	var len = locations.length;
	if (len >= 3) {

		$(loc).innerHTML = "<option value = 0></option>";

		for (var i = 0; i < len; i++) {
			var optionNew = document.createElement('option');
			var text = document.createTextNode(locations[i]);
			optionNew.value = locations[i];
			optionNew.appendChild(text);
			$(loc).appendChild(optionNew);
		} //END for loop
	}
}//END function

/**********************************************************************************************
 * function fills in input field with selected location value from input field
 */
function fillInField(e) {
	$('locInput').value = e.target.textContent;
}

/*********************************************************************************************
 * gets weather for selected location
 * value from input fields is used in the ajax call to the api
 * this function calls the display function
 * function has an if live which uses the php script to make the api call
 */

function getWeather() {
	"use strict";
	//create ajax object
	var ajax = getXmlHttpRequest();
	var loc = $('locInput').value;
	var posFirst = loc.indexOf(",");
	var posLast = loc.lastIndexOf(",");
	var country = loc.slice(posLast + 1).trim();
	var city = loc.slice(0, posFirst);
	var state;

	if (country == 'United States') {
		state = loc.slice(posLast - 2, posLast);
	} else {
		state = loc.slice(posLast + 1);
	}

	ajax.addEventListener("readystatechange", function() {

		if (ajax.readyState === 4) {
			if ((this.response !== "error") && (ajax.status >= 200 && ajax.status < 300) || (ajax.status == 304)) {
				// clear error code if one from previous search
				errorPrint('output', 'noError');

				returned = JSON.parse(this.response);
				display(returned);

			} else {
				errorPrint('output', 'Could not get location data');
			} //END if ((this.response !== "error")
		} // END if (ajax.readyState === 4)
	}, false);
	// tired of commenting out and in when live or developing, so I added and if statement that checks if LIVE or Not
	if (window.location.host === "www.dukesnuz.com") {
		/***LIVE***/
		/*********use the below line when live***********/
		ajax.open('GET', './php_weather/wunderground.php?state=' + state + '&city=' + city + '', true);
	} else {
		/***LOCAL***/
		/******if using local host use below and this extension*******/
		// https://chrome.google.com/webstore/detail/allow-control-allow-origi/nlfbmbojpeacfghkpbjhddihlkkiljbi?utm_source=chrome-app-launcher-info-dialog
		/*****leaveing below line for developement when using localhost*****/
		ajax.open('GET', 'http://api.wunderground.com/api/75355b3e4adcf97f/conditions/q/' + state + '/' + city + '.json', true);
	}
	ajax.send();

}// END function

/*************************************************************************
 * draws map
 * @param state
 * @param city
 * function is called from display function and creates the map
 * I am only displaying maps for US  locatitions
 */

function drawMap(state, city, country) {
	"use strict";
	var imgNew = document.createElement('img');
	$('map').appendChild(imgNew);
	var img = $('map').getElementsByTagName('img');
	if (country == "US") {
		img[0].src = 'http://api.wunderground.com/api/75355b3e4adcf97f/animatedradar/animatedsatellite/q/' + state + '/' + city + '.gif?num=6&delay=50&interval=30';
		img[0].setAttribute('alt', 'weather map of ' + city + ',' + state);
	} else {
		img[0].src = '';
		img[0].setAttribute('alt', 'No Map Data');
	}
}

/*****************************************************************************************
 * constructor function
 * creates new object with returned data from getWeather function
 * this object is used to create a list in the display functon
 * this['Temp'] = temperature_string; I originally had the code in the format to be consistant in the constructor function
 * jshint suggested I should use this.Temp = temperature_string;
 */
function MakeList(temperature_string, feelslike_string, wind_string, relative_humidity) {
	this.Temp = temperature_string;
	this['Feels Like'] = feelslike_string;
	this['Wind Chill'] = wind_string;
	this['Relative Humidity'] = relative_humidity;
}

/***************************************************************************************************
 * displays returend data and is called from getWeather function
 * @param returned is the returned data
 * function calls these functions
 * start();
 * drawMap(state, city)
 * setStyles(icon)
 * getWebcams()
 */
var display = function(returned) {
	"use strict";
	// clear display list, input field, set focus
	$('autoOutput').innerHTML = "";
	$('locInput').value = "";
	$('locInput').focus();

	// check if object returned
	var obj = returned.current_observation;
	if (obj === undefined) {
		errorPrint('output', 'Could not get location data');
	}

	// get terms and conditons link
	var tos = returned.response.termsofService;

	// grab data from current_observation
	var full = obj.display_location.full;
	var city = obj.display_location.city;
	var state = obj.display_location.state;
	var country = obj.display_location.country;
	var time = obj.local_time_rfc822;
	var temperature_string = obj.temperature_string;
	var feelslike_string = obj.feelslike_string;
	var wind_string = obj.windchill_string;
	var relative_humidity = obj.relative_humidity;
	var forecast_url = obj.forecast_url;
	var weather = obj.weather;
	var icon_url = obj.icon_url;
	var icon = obj.icon;

	//create new object for list
	var objList = new MakeList(temperature_string, feelslike_string, wind_string, relative_humidity);

	// print location and time in 1st box
	$('location').childNodes[1].textContent = full + ", " + country;
	// set data attribute. jQuery ajax request is using this to get location
	$('location').setAttribute("city", city);
	$('location').setAttribute("state", state);

	$('local_time').childNodes[1].textContent = time;

	// print current weather and image in 1st column
	$('weather').childNodes[1].textContent = weather;
	var imgNew = document.createElement('img');
	$('weather').appendChild(imgNew);
	var img = $('weather').getElementsByTagName('img');
	img[0].src = icon_url;
	img[0].setAttribute('alt', icon);

	// create list using objList
	$('temp').innerHTML = "";
	var ulNew = document.createElement("ul");
	//check if object

	for (var key in objList ) {
		if (objList.hasOwnProperty(key)) {
			var liNew = document.createElement("li");
			var text = document.createTextNode(key + " : " + objList[key]);
			liNew.appendChild(text);
			ulNew.appendChild(liNew);
		}
	}
	$('temp').appendChild(ulNew);

	// create link to forcast

	var f = $('forcast_url');
	if (f.getElementsByTagName("a").length > 0) {
		var af = f.getElementsByTagName('a');
		f.removeChild(af[0]);
	}
	createLink('forcast_url', forecast_url, "Forcast");

	// set body color depending on weather icon
	setStyles(icon);

	start();
	drawMap(state, city, country);
	getWebcams(country);
};
/***************************************************************************************************************
 * carousel plugin
 * @param webcams
 * I am starting to use jQuery now. When I use jQuery I addding var $ = jQuery inside the function
 * This is because my library has var $ = document.getElementById()
 */

function callCarousel(webcams) {
	"use strict";
	var $ = jQuery;
	$(document).ready(function() {

		$('.jcarousel').jcarousel({
			// Core configuration goes here
		});

		// clear old page list
		$('.jcarousel-pagination').html(" ");
		$("<ul>").appendTo('.jcarousel-pagination');

		$('.jcarousel-pagination ul').jcarouselPagination({
			item : function(page) {
				page = page - 1;
				return '<li><a href="#' + page + '">' + page + '</a></li>';
			}
		});

	});
}
//});
/***********************************************************************************************************
 * function is called from display function. This function grabs the webcam locations for the selected
 * location. I could have passed in the city and state as arguments. I wanted to demonstrate how
 * jQuery could be used to get the city and state. I also wanted to demonstrate the usage of the ajav method
 * to retrieve JSON data.
 * function calls
 * displayWebcams(webcams);
 * displayCamDescription(webcams);
 *
 */

var getWebcams = function(country) {
	"use strict";
	var $ = jQuery;
	if (country == "US") {
		$(document).ready(function() {

			var city = $("#location").attr("city");
			var state = $("#location").attr("state");

			$.ajax({
				dataType : "json",
				url : "http://api.wunderground.com/api/75355b3e4adcf97f/webcams/q/" + state + "/" + city + ".json",
				success : function(result) {

					var webcams = result.webcams;
					displayWebcams(webcams);
					//displayCamDescription(webcams);

				}
			});
			//END ajax
		});
	} else {
		$('.jcarousel-pagination').html('<p>No webcam data for this location.</p>');
		$('#camDescription, #list').text('');
	}
};
/*****
 * biulds ul li list for images for carousel
 * @param webcams
 * using jQuery inside the function
 * function calls
 * displayCamDescription(webcams) and callCarousel(webcams);
 */
function displayWebcams(webcams) {
	"use strict";

	callCarousel(webcams);
	var $ = jQuery;
	$('#list').text('');

	var list = $('#list');
	$("<ul>").appendTo(list);

	$.each(webcams, function(i) {
		var li = $('<li/>').appendTo("#list ul");

		var a = $('<img>').attr('src', webcams[i].CURRENTIMAGEURL).appendTo(li);

	});
	// call function to set webcam description
	displayCamDescription(webcams);
}

/********************
 * function sets webcam description for current cam being viewed
 * @param webcams object
 * @param e from when pagination is clicked
 * this function has 6 function wrapped . maybe I should have split them but wanted the challenge of have
 * 6 function wrapped
 */
function displayCamDescription(webcams) {
	"use strict";

	var $ = jQuery;
	$('#locInput').focus();

	$(document).ready(function() {
		var pageClicked = false;
		$('.jcarousel-pagination li').css('cursor', 'pointer');
		$('.jcarousel-pagination a:link, .jcarousel-pagination a:visited').css({
			'color' : '#121254'
		});
		$('.jcarousel-pagination li').mouseover(function() {

			$(this).css('backgroundColor', '#fff');

		});
		$('.jcarousel-pagination li').mouseout(function() {
			$(this).css('backgroundColor', '#FFF8DC');

		});

		$('.jcarousel-pagination li').click(function(e) {
			pageClicked = true;
			// if pageination clicked, then call setDesrcription function passing in e
			if (pageClicked) {
				var pos = (e.currentTarget.firstChild.hash).slice(1);
				setDescription(pos);
			}
			// set background color of li element clicked
			$('.jcarousel-pagination li').css({
				'border' : 'none',
				'fontSize' : 'inherit',
				'fontWeight' : 'normal',
				'paddingLeft' : '2px'
			});
			$(this).css({
				'border' : '3px solid #000000',
				'fontSize' : '1.5em',
				'fontWeight' : 'bold',
				'paddingLeft' : '55px',
				'padding' : '3px 0 3px 55px',
				'margin' : '2px'
			});

		});
		// function gets data of current displayed webcam image from returned webcam object
		// fills in description of current webcam displayed
		function setDescription(pos) {
			$("#camDescription").html("");

			var camCity = webcams[pos].city;
			var camState = webcams[pos].state;
			var camLink = (webcams[pos].link) ? webcams[pos].link : "";
			var camLinkText = webcams[pos].linktext;
			var camUrl = (webcams[pos].CAMURL) ? webcams[pos].CAMURL : "";
			var camNeighborhood = webcams[pos].neighborhood;

			var descId = document.getElementById("camDescription");
			var a2 = document.createElement('a');
			var p2 = document.createElement('p');
			$(p2).appendTo(descId);
			$(a2).appendTo(p2);
			$(a2).attr('href', camUrl).text(camCity + "," + camState);
			$(a2).attr('target', 'blank');

			var p3 = document.createElement('p');
			$(p3).appendTo("#camDescription").html("Neighborhood:<br />" + camNeighborhood);

			var a4 = document.createElement('a');
			var p4 = document.createElement('p');
			$(p4).appendTo("#camDescription");
			$(a4).appendTo(p4);
			$(a4).attr('href', camLink).text(camLinkText);
			$(a4).attr('target', 'blank');

			//change color of links in second column = current cam description
			$("#camDescription a:link").css('color', '#121254');

		}

		// if not clicked and first time location selected, grab first webcam location
		if (!pageClicked) {
			var pos = 0;
			setDescription(pos);
		}
	});
	// END document ready
}

/**************************
 * function sets styles according to weather. ie sunny, cloudy, raining, snowning
 * icons location https://www.wunderground.com/weather/api/d/docs?d=resources/phrase-glossary&MR=1
 * I am using some jQuery
 * this function is called from display function
 */
function setStyles(icon) {
	"use strict";
	// get sunny
	var $ = jQuery;

	//set default body color
	$('body').css({
		'backgroundColor' : '#FFFFE0'
	});

	var sunny = ["clear", "hazy", "mostlysunny", "partlysunny", "sunny"];

	//get snow
	var snow = ["chanceflurries", "chancesnow", "chancesleet", "flurries", "sleet", "snow"];

	//get rain
	var rain = ["rain", "chancerain", "chancetstorms", "tstorms"];

	//get cloudy
	var cloudy = ["cloudy", "mostlycloudy", "partlycloudy", "fog"];

	// null
	var unknown = ["unknown", " "];

	// check if sunny
	var s = $.inArray(icon, sunny);
	if (s !== -1 || s > -1) {
		$('body').css({
			'backgroundColor' : '#ffff66'
		});
		//return "sunny";
	}

	// check if snow
	var w = $.inArray(icon, snow);
	if (w !== -1 || w > -1) {
		$('body').css({
			'backgroundColor' : '#ffffff'
		});
		//return "snow";
	}

	// check if rain
	var r = $.inArray(icon, rain);
	if (r !== -1 || r > -1) {
		$('body').css({
			'backgroundColor' : '#66ffcc'
		});
		//return "rain";
	}

	// check if cloudy
	var c = $.inArray(icon, cloudy);
	if (c !== -1 || c > -1) {
		$('body').css({
			'backgroundColor' : '#E6E6FA'
		});
		//return "cloudy";
	}

	// check if null
	var u = $.inArray(icon, unknown);
	if (u !== -1 || u > -1) {
		$('body').css({
			'backgroundColor' : '#b3ff66'
		});

		//return "unknown";
	}

	//return null;

}

/***************************
 * function runs on page load
 */

function hide() {
	"use strict";
	var $ = jQuery;
	$('#locInput').focus();
	$(".flex-container").hide();
	$('body').css({
		'backgroundColor' : '#000000'
	});
	$('footer').css({
		'marginTop' : '30%'
	});

	// display wunderground logo
	$('<img>').appendTo('footer .flex-item-2 p');
	$('footer .flex-item-2 img').attr("src", "https://icons.wxug.com/logos/PNG/wundergroundLogo_4c_rev_horz.png");
	$('footer .flex-item-2 img').attr('alt', 'Wunderground Logo');
	$('footer .flex-item-2 img').addClass('logo');

	// display terms of service to footer
	createLink('tos', tos, "Terms of Service");

	// set current year and copyright symbol
	var year = new Date().getFullYear();
	$('#year').html('&copy; &nbsp;' + year);

}

/**********
 * function is triggered from getWebcams
 */
function start() {
	"use strict";
	var $ = jQuery;
	$(".flex-container").fadeIn(2000);
	$('section.search').removeClass('search');
	$('footer').css({
		'marginTop' : 'inherit'
	});

	// display wunderground logo
	$('footer .flex-item-2 img').attr("src", "https://icons.wxug.com/logos/PNG/wundergroundLogo_4c_horz.png");

	$('header, footer').addClass('start');
	$('h1 a').addClass('start');
	$('a:link, a:visited').css({
		'color' : 'inherit'
	});
	$('a:link, a:visited').css({
		'color' : '#121254'
	});
}

/***********************************************************
 * function creates a href link with target = blank
 * @param location = id for location of link
 * @param url = url of link
 * @param text = text for link
 * ok so I also have this code in my library, I am keeping it here so as it it easily visible
 */

function createLink(location, url, text) {
	"use strict";
	var a = document.createElement('a');
	var href = document.createAttribute('href');
	a.setAttributeNode(href);
	href.value = url;
	a.textContent = text;
	a.setAttribute('target', 'blank');
	$(location).append(a);
}

/******************************
 * function dynamically creates links in footer I could have hard coded these, I simply wanted
 * some practice dynamically creating links and also wanted to demonstrate I could do it. Added bonus, I get to use my
 * library function createLink() while also demonstrating the use of objects, way cool
 *
 */

function createFooterLinks() {
	var footerLinks = {
		styles : {
			"location" : "stylesLink",
			"url" : "./css_weather/css_weather.css",
			"text" : "CSS"
		},
		normalize : {
			"location" : "normalizeLink",
			"url" : "http://www.dukesnuz.com/css_libs/dukes_normalize.css",
			"text" : "My CSS Normalize"
		},
		js : {
			"location" : "jsLink",
			"url" : "js_weather/js_weather.js",
			"text" : "JavaScript and jQuery"
		},
		jc : {
			"location" : "jcLink",
			"url" : "http://sorgalla.com/jcarousel/",
			"text" : "jQuery jCarousel"
		},
		jsLibrary : {
			"location" : "jsLibraryLink",
			"url" : "http://www.dukesnuz.com/js_libs/dukes.javascript.js",
			"text" : "My JavaScript Library"
		},
		wundergroundPhp : {
			"location" : "wundergroundPhpLink",
			"url" : "./php_weather/wunderground.php",
			"text" : "Wunderground PHP Script"
		},

		geobytesPhp : {
			"location" : "geobytesPhpLink",
			"url" : "./php_weather/geobytes.php",
			"text" : "Geobytes PHP Script"
		},

		wundergroundApi : {
			"location" : "wundergroundApiLink",
			"url" : "https://www.wunderground.com/weather/api",
			"text" : "Wunderground API"
		},

		geobytesApi : {
			"location" : "geobytesApiLink",
			"url" : "http://geobytes.com",
			"text" : "Geobytes API"
		},

		linkedin : {
			"location" : "linkedinLink",
			"url" : "https://www.linkedin.com/in/davidpetringa/",
			"text" : "Lets Connect on Linkedin"
		},

		twitter : {
			"location" : "twitterLink",
			"url" : "https://twitter.com/Dukesnuz",
			"text" : "Lets Connect on twitter"
		},

		github : {
			"location" : "githubLink",
			"url" : "https://github.com/dukesnuz",
			"text" : "Lets Connect on GitHub"
		},

		websites : {
			"location" : "websitesLink",
			"url" : "http://www.dukesnuz.com/websites/",
			"text" : "View my Other websites"
		}
	};

	for (var keys in footerLinks) {
		if (footerLinks.hasOwnProperty(keys)) {
			createLink(footerLinks[keys].location, footerLinks[keys].url, footerLinks[keys].text);
		}
	}

}//END function


window.onload = function() {
	returned = null;
	returnedLocation = null;

	$('locInput').oninput = getLocation;
	$('autoOutput').onclick = getWeather;
	$('autoOutput').onmouseover = fillInField;

	hide();

	createFooterLinks();
};

