/******************************************************************************************************
 * CSCI E - 3 -Introduction to Web Programming Using JavaScript  - Final Project - Fall 2016
 * Teaching Fellow
 * Student = David Petringa
 * Thank you for checking my work. I hope you enjoy.
 * csci_e_3_final_project.js
 * last updated 1/44444444444444444444444444444444444444444/17
 ******************************************************************************************************/

/*********************************
 * example of using a data structure
 * example of DOM element create, deletion, modification
 * function biulds state select menu using data from  page csci_3_final_data.js
 * @param usStates object
 * @param loc location to dynamically create the select list
 **********************************/

function makeStatesSelect(usStates, loc) {
	"use strict";
	// call the removeSelect function to clear any previouse options created
	// function is in csci_e_3_final_project_library.js
	removeSelect($('selectCity'));
	// set blank select option
	$(loc).innerHTML = "<option value = 0>Make a selection</option>";

	var len = usStates.length;
	for (var i = 0; i < len; i++) {
		var optionNew = document.createElement('option');
		var text = document.createTextNode(usStates[i].name);
		optionNew.value = usStates[i].abbreviation;
		optionNew.appendChild(text);
		$(loc).appendChild(optionNew);
	} //END for loop
}//END function

/****************
 * example of using a data strucure and ajax
 * this function displays using a data structure
 * function gets cities to populate city select menu and returns an object with data for each city
 * @param state
 * function is called with onchange event which is attached to the select state menu
 * this function uses ajax. the ajax object is defined in the csci_e_3_final_project_library.js
 * when the data is returned it is parsed using JSON.parse
 * the makeCitiesSelect() function is called and the city select menu is dynamically created
 * the data object is returned to be used in other functions
 *  was running into a cors issue so.........
 * I also created a php script as page 468 in our book Modern Javascript.
 * the ajax call is calling the php script on the same domain and the PHP script is using
 * curl to make the call to the outside domain. This is pretty cool.
 ****************/

function getCities(state) {
	"use strict";
	//create ajax object
	var ajax = getXmlHttpRequest();

	ajax.addEventListener("readystatechange", function() {

		if (ajax.readyState === 4) {
			if ((this.response !== "error") && (ajax.status >= 200 && ajax.status < 300) || (ajax.status == 304)) {
				// clear error code if one from previous search
				errorPrint('output', 'noError');

				returned = JSON.parse(this.response);

				// create city select drop
				makeCitiesSelect(returned);

				// return the object to be used elsewhere
				return returned;

			} else {
				errorPrint('output', 'Could not get cities');
			} //END if ((this.response !== "error")
		} // END if (ajax.readyState === 4)

	}, false);
	// tired of commenting out and in when live or developing, so I added and if statement that checks if LIVE or Not
	if (window.location.host === "www.dukesnuz.com") {
		/***LIVE***/
		// the above is causing a cors error. I am adding a php script as used in the book we have for class
		// page 468. the ajax call is calling the php script on the same domain and the PHP script is using
		// curl to make the call to the outside domain. This is pretty cool.
		/*********use the below line when live***********/
		ajax.open('GET', '/games/get_the_blob/php/csci_3_final_project_retrieve_data.php?state=' + state + '', true);
	} else {
		/***LOCAL***/
		/******if using local host use below and this extension*******/
		// https://chrome.google.com/webstore/detail/allow-control-allow-origi/nlfbmbojpeacfghkpbjhddihlkkiljbi?utm_source=chrome-app-launcher-info-dialog
		/*****leaveing below line for developement when using localhost*****/
		ajax.open('GET', 'http://api.sba.gov/geodata/city_data_for_state_of/' + state + '.json', true);
	}
	ajax.send();

}// END function

/**************************************
 *function is triggered when state selection is changed, calls getCities function(makes ajax request)
 removes old city select data and removes map(clears canvas) and table if there is one
 *************************************/
var showCities = function() {
	"use strict";
	// clear canvas if old map
	getMap(undefined);
	clearCanvas('map');
	clearCanvas('game');

	// ajax call to get json data of all cities in selected state
	// passes in value attribute oe selected state
	getCities(this.value);

	// removes old city table if there is one
	var location = $('cityDetails');
	if (location.childNodes[0]) {
		location.removeChild(location.childNodes[0]);
	}

};

/*********************************
 * example of DOM element create, deletion, modification
 * biulds city select list from data returned from ajax call. Data is not coming back in alphabetical order for some states
 * I am sorting the data by city name
 **********************************/
function makeCitiesSelect(returned) {
	"use strict";
	$('selectCity').style.display = 'block';

	// create the initial list of cities retrieved for each state call
	//sort object and create and createan array
	var arrayCities = [];

	for (var key in returned) {
		if (returned.hasOwnProperty(key)) {
			arrayCities.push([returned[key].name, key]);
		}
	}
	//sort array
	var arraySorted = arrayCities.sort();

	// change css style to display city select menu
	$('selectCity').style.display = 'block';
	// call the removeSelect function to clear any previouse options created in city select menu
	removeSelect($('selectCity'));
	$('selectCity').innerHTML = "<option value = 0>Make a selection</option>";

	// biuld the list
	var len = arraySorted.length;
	for (var i = 0; i < len; i++) {
		var optionNew = document.createElement('option');
		var text = document.createTextNode(arraySorted[i][0]);
		optionNew.value = arraySorted[i][1];
		optionNew.appendChild(text);
		$('selectCity').appendChild(optionNew);
	} //END for loop

}//END function

/******************************************
 * example of DOM element create, deletion, modification
 * function shows detailed data for the selected city, triggered when 2nd select(city changed)
 * it gets the value from the selected item in the option list then uses the value in the returned object
 * to get the data for selected city
 ****************************************/
var getCityData = function() {
	"use strict";

	var element = $('selectCity');
	// get value in select option
	var value = element.options[element.selectedIndex].value;
	// get object for seleted city using value retrieved from select option
	var objCity = returned[value];

	// calls the makeTable function passing in the city object and the location id where data will be displayed
	// this function is in csci_e_3_final_project_library.js file
	makeTable(objCity, 'cityDetails');

	// call the addHref function and use city value to create url link in city description displayed in the table
	addHref(value);

	// create map on the canvas element
	getMap(value);
	// create the location and green lines on the canvas using the canvas api
	// this can be commented out and program will still work, less the canvas drawing
	editCanvas(value);
	// start game function blobs start
	game();
};

/**************************************************
 * example of DOM modification
 * @param val
 * function is called from the getCityData function and val is the value from the select city menu
 * href to url in city details
 *
 */
function addHref(val) {
	"use strict";
	var url = returned[val].url;
	var table = document.getElementsByTagName('table');
	var spot = table[0].rows[8].childNodes[1];
	var newA = document.createElement('a');
	var textMessage = 'City Website';
	var text = document.createTextNode(textMessage);
	spot.firstChild.textContent = "";
	spot.appendChild(newA);
	newA.setAttribute('href', url);
	newA.setAttribute('title', textMessage);
	newA.setAttribute('target', 'blank');
	newA.appendChild(text);
}

/**************************************************************************************************
 * example of DOM element create, deletion, modification and data usage
 * function is called from getCityData passing in the value argument and prints the map to the page
 * value is used to get lat and lon from returned data object created in the ajax call
 * @param value returned from ajax request
 * @param zoom optional value for zoom setting
 * <img src= "https://www.mapquestapi.com/staticmap/v4/getmap?key=KpNU0EM6WRrqqxuTdx9B4cdUYYnhtArS&size=600,600&type=map&imagetype=jpg&zoom=10&scalebar=false&traffic=false&center=34.17,-118.83&xis=https://s.aolcdn.com/os/mapquest/yogi/icons/poi-active.png,1,c,40.015831,-105.27927&ellipse=fill:0x70ff0000|color:0xff0000|width:2|40.00,-105.25,40.04,-105.30" />
 * mapquest key  KpNU0EM6WRrqqxuTdx9B4cdUYYnhtArS
 */
function getMap(value, zoom) {
	"use strict";
	//var canvas = document.getElementsByTagName('canvas')[0];
	var canvas = $('map');
	// check if zoom passed in or not
	zoom = (zoom === undefined) ? 10 : zoom;

	if (value) {
		// get lat and lon from retuned data
		var lat = returned[value].primary_latitude;
		var lon = returned[value].primary_longitude;
		canvas.style.backgroundImage = "url('https://www.mapquestapi.com/staticmap/v4/getmap?size=600,500&type=map&pois=orange_1-," + lat + "," + lon + "|&zoom=" + zoom + "&scalebar=true&center=" + lat + "," + lon + "&imagetype=JPEG&key=KpNU0EM6WRrqqxuTdx9B4cdUYYnhtArS')";

	} else {
		canvas.style.backgroundColor = "#FFA07A";

	}
}// END function

/*******************************************
 * example of capturing and handling events
 * self-invoking function zooms map in or out using mouse wheel or shift keys
 * @param e
 */
(function(e) {
	"use strict";
	var zoom;
	var zoomInc = 1;

	/*********************************
	 * function used wheel on mouse to zoom
	 */

	document.addEventListener("wheel", function(e) {
		e.preventDefault();
		// grab the select value for select city in city select
		var element = $('selectCity');
		// check to make sure the element is not undefined and that the value retured is  > 0
		// this will stop map from appearing when wheel is rolled before a city is selected
		if ((element.options[element.selectedIndex] !== 'undefined') && (element.options[element.selectedIndex].value > 0)) {

			// get value from select menu of selected city
			var value = element.options[element.selectedIndex].value;

			// determine direction of mouse wheel movement
			if (e.deltaY > 1 && zoom < 18) {
				// change background color for effect
				$('main').style.backgroundColor = "#FFD5AE";
				zoom = zoom + zoomInc;
				// redraw map passing in city value and zoom setting
				getMap(value, zoom);
			} else if (e.deltaY < 1 && zoom > 1) {
				$('main').style.backgroundColor = "#FFA07A";
				zoom = zoom - zoomInc;
				getMap(value, zoom);
			} else {
				$('main').style.backgroundColor = "#FFD5AE";
				zoom = 10;
				getMap(value, zoom);
			}
		}

	}, false);

	/****************************************************************************************************
	 * example of an event listener. listening for shift keys pressed
	 * @param e
	 * using shift keys to zoom in and out. reason for using shift keys
	 * using arrow or letters will trigger city select menu and when e.preventDefault()
	 * is used then letter keys not accessable and form not able to be filled in.
	 */

	document.addEventListener("keydown", function(e) {

		// grab the select value for select city in city select
		var element = $('selectCity');
		// check to make sure the element is not undefined and that the value retured is  > 0
		// this will stop from appearing when wheel is rolled before a city is selected
		if ((element.options[element.selectedIndex] !== undefined) && (element.options[element.selectedIndex].value > 0)) {

			// get value from select menu of selected city
			var value = element.options[element.selectedIndex].value;

			//determine which shift key is pressed
			if (e.code === "ShiftRight" && zoom < 18) {
				// change background color for effect
				$('main').style.backgroundColor = "#000080";
				zoom = zoom + zoomInc;
				// redraw map passing in value of selected city and new zoom value
				getMap(value, zoom);
			} else if (e.code === "ShiftLeft" && zoom > 1) {
				$('main').style.backgroundColor = "#FFA07A";
				zoom = zoom - zoomInc;
				getMap(value, zoom);
			} else {
				$('main').style.backgroundColor = "#000080";
				zoom = 10;
				getMap(value, zoom);
			}
		}
	}, false);

})();
// END function

/************************************
 * example of DOM modification and objects
 * function edits the canvas element using the canvas api. this draws the green lines and rotates them
 * I seperated the getMap function from this function to make it easier to debugg the getMap is not dependand on the editCanvas function
 * I am using Larry' s example as a guide for this function video 14.4 with modifications
 * */

function editCanvas(value) {
	"use strict";
	//start the blobs
	// set variables for canvas
	var canvas = $('map');
	var ctx = canvas.getContext('2d');
	var city = returned[value].name;
	var state = returned[value].state_name;
	//var city = ".";
	//var state = ".";
	var width = ctx.canvas.width;
	var height = ctx.canvas.height;
	// starting point
	var x = 0;
	var y = 0;
	var intSpeed = ROTATE_SPEED;
	// set speed of rotation
	/******
	 * constructor function to create new line objects
	 */
	function Line(xC, yC) {
		this.xC = xC;
		this.yC = yC;
	}

	// add draw to the Line's prototype to draw the line and draw the city and state name on the canvas
	Line.prototype.draw = function() {
		ctx.beginPath();
		ctx.strokeStyle = "rgba(0, 102, 0, .1)";
		ctx.lineWidth = "1px";
		ctx.font = "2em comic sans ms";
		ctx.fillText(city + ', ' + state, 60, 60);
		ctx.moveTo((width / 2), (height / 2));

		ctx.lineTo(this.xC, this.yC);
		ctx.stroke();
	};
	/*****************************************
	 * function checks location of x and y then call draw() function to draw line and draw city and state
	 * using set interval to call the function to make the rotation movement
	 * after each completion the canvas is cleared by calling the clearCanvas function
	 */

	(function() {
		clearCanvas('map');
		// set rotate on timer
		setInterval(rotate, intSpeed);
	})();

	function rotate() {

		// call constructor function to create new object
		var c = new Line(0, 0);
		// use if conditional to determine where to draw lines
		// the canvas is split into 4 sections
		// my one not sure is, repeatedly using c = new Line();
		// I am thinking I am simply re defining the same object, I believe this is ok
		if (x < width && y === 0) {
			c = new Line(x, 0, city);
			x = x + 1;
			c.draw();
		}

		if (x === width && y < height) {
			c = new Line(width, y);
			y = y + 1;
			c.draw();
		}

		if (x >= 0 && y === height) {
			c = new Line(x, height);
			x = x - 1;
			c.draw();
		}

		if (x === 0 && y <= height) {
			c = new Line(x, y);
			y = y - 1;
			c.draw();
		}

		// when green line position is at begining, display score and clear canvas in displayScore function
		if (x === 0 && y === 0) {
			displayScore(undefined, 'end');
		}
	}//END rotate function

}// END function

/*********
 * function clears canvas and stops all setIntervals
 * called when one complete rotation from rotate function or new states or differnet city is selected
 * called from game
 */
function clearCanvas(id) {
	"use strict";
	var canvas = $(id);
	var ctx = canvas.getContext('2d');
	var width = ctx.canvas.width;
	var height = ctx.canvas.height;
	ctx.clearRect(0, 0, width, height);
	// found below idea of using a loop on stackoverflow
	//http://stackoverflow.com/questions/958433/how-can-i-clearinterval-for-all-setinterval
	for (var i = 0; i < 1000; i++) {
		clearInterval(i);
	}
}//END function

/***********************************************************************************
 * example of form validation
 * this function checks if error elements have a value if no value ok to submit in signup form
 * at this point the form validation function has already checked for proper data
 * entered in the form. form validation function is in file temp_library.js
 * @param e
 */
function submitForm(e) {
	e.preventDefault();
	var name = $('errorName');
	var email = $('errorEmail');
	var zip = $('errorZip');
	var message = "<h4>Thank you for signing up.<h4>";
	// check if error elements have a value
	if ((name.innerHTML.length === 0) && (email.innerHTML.length === 0) && (zip.innerHTML.length === 0)) {
		// send the form data off somewhere
		// hide form
		$('signupForm').style.display = "none";
		// print success message
		$("signupFormMessage").innerHTML = message;
	}
}// END function

/***************************************
 * example of form validation and now a little DOM modification
 * this function checks if error element has a value if no value ok to submit
 * at this point the form validation function has already checked for proper data
 * entered in the form. form validation function is in file temp_library.js
 *
 * This is a last minute change. Originally this was just validating an input field before form submission
 * I changed the input to a select menu and added the style to change the body background color.
 */
function submitForm2(e) {
	e.preventDefault();
	var colorError = $('errorFavoriteColor');

	var colorId = $('color');
	var colorValue = colorId.value;
	var color = colorId.options[colorId.selectedIndex].innerHTML.toUpperCase();
	;

	var message = "<h4>Amazing ! " + color + " is also my favorite color.<h4>";
	// check if error element has a value
	if ((colorError.innerHTML.length === 0)) {
		// send the form data off somewhere

		// this was a last minute idea
		document.body.style.backgroundColor = colorValue;
		// hide form
		$('favoriteColor').style.display = "none";
		// print success message
		$("signupFormMessage").innerHTML = message;
	}
}// END function

/*********************************
 * example of capturing and handing events
 * mouse over menu to hide or show menu
 */

function chooseMenu(e) {
	"use strict";
	var list = document.getElementsByClassName("menu");
	var len = list.length;
	var i = 0;
	if (e.type === "mouseover") {

		for (i; i < len; i++) {
			list[i].style.display = "inherit";
		}
	}
	if (e.type === "mouseout") {
		for (i; i < len; i++) {
			list[i].style.display = "none";
		}
	}

}// END function

/*****************************************
 * example of capturing and handling events function targets the document
 * click selected menu option to display either favorite places, signup form or favorite color form
 * also targets the close button on each of the above to close the selection
 * I am calling it docDoSomething since other code can be added to do other things on the document
 */
function docDoSomething(e) {
	"use strict";
	// because event listener is attached to the document, need to first make sure an element
	// with an id is clicked
	if (e.target.id && e.target.id !== 'undefined') {
		//start switch determine location of pointer
		switch (e.target.id) {

		case "mFavoritePlaces":
			$('favoritePlaces').style.display = "inherit";
			break;

		case "mSignup":
			$('signupForm').style.display = "inherit";
			break;

		case "mFavoriteColor":
			$('favoriteColor').style.display = "inherit";
			break;

		// check if close clicked  to hide div clicked
		case "fpClose":
			$('favoritePlaces').style.display = "none";
			break;

		case "suClose":
			$('signupForm').style.display = "none";
			break;

		case "fcClose":
			$('favoriteColor').style.display = "none";
			break;

		} //END switch
	} //END if(e.target.id){
}// END function


window.onload = function() {

	// attach event handlers to the 2 select menus
	$('selectState').onchange = showCities;
	$('selectCity').onchange = getCityData;

	// biuld first select menu to display states
	makeStatesSelect(usStates, 'selectState');

	//set returned value to null, returned value is object recieved back from ajax call
	returned = null;

	//attach an event listeners to menu and assign chooseMenu function
	$("menu").addEventListener('mouseover', chooseMenu, false);
	$("menu").addEventListener('mouseout', chooseMenu, false);

	// attach event listener to document
	document.addEventListener('click', docDoSomething, false);

	// assign variable to signupForm and attach an event handler
	//submit event used because the listener is listening on a form
	var signupForm = document.forms.signupForm;
	signupForm.addEventListener('submit', submitForm, false);
	// decided not to add focus to first input field because I have 2 forms

	// assign variable to form2 and attach an event handler
	// submit event used because the listener is listening on a form
	var form2 = document.forms.form2;
	form2.addEventListener('submit', submitForm2, false);

	/************************************
	 * example of a closure  using a self invoking function
	 * part of form validation for signupForm
	 * gets the form to validate and form elments length
	 * loops through the input elements in the form and assigns
	 * an indexed value oninnput event to each input element in the form
	 * @param index
	 * @param form
	 * formValidation function in csci_e_3_final_project_library.js
	 * I could have done the form validation different. The reason I am doing the validation this way
	 * is because I also wanted to incorporate closures
	 ************************************/
	(function() {
		var form = document.forms.signupForm;
		var len = form.elements.length;
		for (var i = 0; i < len; i++) {
			form.elements[i].oninput = (function(e) {
				var index = i + 1;
				return function(e) {
					//call the formValidation function and pass in 2 arguments
					formValidation(index, form);
				};
			})();
		}
	})();

	/**********************************************************
	 * example of a closure    using a self invoking function
	 * part of form validation for form2
	 * gets the form to validate and form elments length
	 * loops through the input elements in the form and assigns
	 * an indexed value onchange event to each element in the form
	 * @param index
	 * @param form
	 * formValidation function in csci_e_3_final_project_library.js
	 * I could have done the form validation different. The reason I am doing the validation this way
	 * is because I also wanted to incorporate closures
	 * this is part of my last minute color form change. I chenged the event to onchange so it will
	 * trigger when a select element is changed
	 ********************************************************/
	(function() {
		var form = document.forms.form2;
		var len = form.elements.length;
		for (var i = 0; i < len; i++) {
			form.elements[i].onchange = (function(e) {
				var index = i + 1;
				return function(e) {
					//call the formValidation function and pass in 2 arguments
					formValidation(index, form);
				};
			})();
		}
	})();

	/********************************************************************
	 * call welcome function
	 * turn on or off here. program works even when this function is commented out
	 * this function is in the csci_e_3_final_project_welcome.js file
	 * *************/
	startScreen();
	//for dev can comment out

	/********************************************************************
	 * checking if my makeTable(object, location)  function works with other objects
	 * making a table in right side bar on the home page
	 * this function is in csci_e_3_final_project_library.js file
	 */
	makeTable(directions, 'dirTable');
	// editCanvas(); // for dev uncomment
	// game(); // for dev uncomment
};
