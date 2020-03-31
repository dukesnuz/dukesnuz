/************************************HED Graduate Credit Assignemnt Two Fall 2016
 * bookmarks_search.js
 *
 * Student: David Petringa
 * This assignment saves bookmarks to a MySQL database
 * This file is the javascript file to search the database for saved  bookmarks
 * This is the javascript file
 * By doing this exercise I learned a tremendous amount about ajax, server responses and debugging
 *
 * You are welcome to try it out
 *
 * This javascript page uses ajax to return the data from the script @
 * http://www.dukesnuz.com/bookmarklets/ajax/bookmarks_search.php
 * The data is coming back in JSON format
 * I am also using the error messages coming back from the server, albeit I may have done some hacking in the php script
 * to format the responses as JSON
 *
 * last updated 11/222228888888/2016
 *****************/
/***************
 * XMLHttpRequest and ActiveXObject are objects used to send and recieve data to and from a server from a client. Thay are built browsers.
 * Ajax makes it possible to update pages without refreshing the page becaue this makes it possible to retrieve the data through a url behind the scenes.
 * Ajax makes a requet request to a server using JavaScript. The request is to a server script such as a PHP script
 * Javascript is used on the front end and a backend language such as PHP is used on the backend
 * ajax stands for Asynchronous JavaScript And Xml
 * The 7 steps involed
 * 1. An event happens on a webpage
 * 2. Using JavaScript the XMLHttpRequest object is created
 * 3. The XMLHttpRequest sends the request to the server
 * 4. The server looks at the request ans starts to process it
 * 5. The server sends its response back to the webpage
 * 6. The response is read using JavaScript
 * 7. The page is updated or other action is done
 *************/
//create ajax object for current and older browsers
var ajax = null;
if (window.XMLHttpRequest) {
	ajax = new XMLHttpRequest();
} else if (window.ActiveXObject) {
	ajax = new ActiveXObject('MSXML2.XMLHTTP.3.0');
	// for internet explorer older browsers
}
/***************************************************************
 *  function retrieves the data and parses it into an object
 *  there is a self-invoking function which builds a list with the data
 **************************************************************/
function getBookmarks() {
	"use strict";
	// use an event listener and assign the the readystatechange property to the ajax object. this function is called
	// during the ajax implementation
	// there are 4 readyState states, state 4 = DONE request finished and response ready.
	// 0 = UNSENT, 1 = OPENED, 2 = HEADERS_RECIEVED, 3 = LOADING
	// the readyState property returns the status of the loading put another way it returns the state of the XMLhttpRequest
	// using  addEventListener to attach the readychange event handler to the ajaxSave object
	ajax.addEventListener("readystatechange", function() {
		//"use strict"; js hint says unnecessary
		var display = document.getElementById("output");
		if (ajax.readyState == 4) {
			// check the status of the object which is the server response. codes 200 is ok less than 300 and 304 are also acceptable
			if (this.status == 200 && this.status < 300 || this.status == 304) {
				// use the response text that comes back from the server as the message, now this is a cool thing to do
				// this can be seen in the developers tools in preview and response section
				// the data is coming back in JSON format and is parsed to an object
				var url = JSON.parse(this.response);
				// a self-invoking function to create and display returned data
				// I could have created the function outside the addEventListener to add to a library and made it a reusable function and
				// simply called the function and passed in arguments
				(function() {
					//"use strict"; js hint says unnecessary
					// clear the output div
					display.innerHTML = "";
					// create an h2 element
					var newH = document.createElement('h2');
					// create a text node for the h2
					var heading = document.createTextNode("Saved Bookmarks");
					// append the h2 element to the output div
					display.appendChild(newH);
					// append the heading test to the h2 element
					newH.appendChild(heading);
					// create a new ul element
					var newUL = document.createElement("ul");
					//append the ul element to the output div
					display.appendChild(newUL);

					var key;
					// loop through the object and create a list with href attributes
					for (key in url) {
						if ( typeof url === 'object') {
							var newLI = document.createElement("li");
							var newA = document.createElement('a');
							// using dot notation to access the object property to create the text node
							var text = document.createTextNode(url[key].title);
							newUL.appendChild(newLI);
							newLI.appendChild(newA);
							// using dot notation to access the object property and create the href attribute
							newA.setAttribute('href', url[key].url);
							// create the target attribute
							newA.setAttribute('target', 'blank');
							newA.appendChild(text);
						}//END check if object
					} //END for loop
				})();

			} else {
				// error message is not to pretty, errors are never pretty
				display.innerHTML = "OOOpppsss ! System error";
			}//END if status
		} else {
			// error message is not to pretty, errors are never pretty
			display.innerHTML = "OOOpppsss ! System error";
		}//END if readystate
	}, false);

	var keyCode = "3cc4dee283a41f00326065dd5c3a83f4";
	// It is better to use GET when retrieving data and POST when sending data, especially if the data is sensitive
	// I also have  aworking php script. the key below must match the key in the php script
	// Call the open method on the ajax object and open the url to retrieve the data from
	ajax.open('GET', 'http://www.dukesnuz.com/bookmarklets/ajax/bookmarks_search.php?keycut=' + keyCode + '', true);
	// becasue I am using GET, send(null) is used. no data is being passed into the send method
	ajax.send(null);
}

/**********************************************************************
 * on window load function set the bookmarks id to the onlick event and assign it to to the getBookmarks function
 * notice I am not using getBookmarks(), which would call the function and execute it on window load
 ***********************************************************************/
window.onload = function() {
	"use strict";
	document.getElementById('bookmarks').onclick = getBookmarks;
};

