/*****************
 *    describe this ............ 
 * works on most site, has some quirks
 * does not work on https sites
 * By doing this exercise I learned a tremendous amount about ajax, sever responses and debugging
 *****************/
// set the variables
// the key is used to veryfy that this request matches the key in the ajax script
var pageUrl = window.location.href;
var pageTitle = document.title;
// grab the last 32 values from the url and assign them to the variable key
var key = document.getElementById('bKey').src.slice(-32);
// create object with data
var bookmark = {
	pageUrl : pageUrl,
	pageTitle : pageTitle,
	key : key
};

var confirmOperation = confirm("Do you want to save this url to your bookmarks?\n URL: " + pageUrl + "\n TITLE: " + pageTitle);
if (confirmOperation == true) {

	// create the XMLHttpRequest ajax object for all browser types
	function getXmlHttpRequest() {
		"use strict";
		var ajax = null;
		if (window.XMLHttpRequest) {
			// for non ie browsers and ie since v 7
			ajax = new XMLHttpRequest();
		} else if (window.ActiveXObject) {
			// older versions of ie
			ajax = new ActiveXObject('MSXML2.XMLHTTP.3.0');
		}
		return ajax;
	};
	// create the ajax object
	var ajax = getXmlHttpRequest();
    // verify ajax has a true value befire using it
	if (ajax) {
        // use JSON. stringify to tuen the object into json object
		var data = JSON.stringify(bookmark);
		// call the open method and provide the type of request either GET or POST
		// open the connection to the url we are sending the data to.
		// using true as the 3rd argument assures the request will be sent asynchronously
		// this allows for other javascript code to run while awaiting a server response.
		// I was switching between GET and POST requests. leaving get commented out in the event
		// I want to switch to usignGET requests
		//ajax.open('GET', 'http://www.dukesnuz.com/extracreditassignmenttwo/ajax/bookmarklets.php?data='+data+'', true);
		ajax.open('POST', 'http://www.dukesnuz.com/extracreditassignmenttwo/ajax/bookmarklets.php', true);
		// below
		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		// tell server data is in json type
		ajax.setRequestHeader('Content-Type', 'application/json');
		// this method sends the request to the server, for a get request the this is used ajax.send(null)
		ajax.send(data);

	}
     // use an event listener and assign the the readystatechange property to the ajax object. this function is called 
     // during the ajax implementation
     // there are 5 readyState states, state 4 = request finished and response ready.
	ajax.addEventListener("readystatechange", function() {
		if (ajax.readyState == 4) {
			// check status codes 200 is ok
			if (this.status == 200 && this.status < 300 || this.status == 304) {
				// use the response text that comes back from the server as the message
				alert(this.responseText);
			}
		} 
	}, false);

} // END if confirmOperation

