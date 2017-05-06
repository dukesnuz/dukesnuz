/************************************HED Graduate Credit Assignemnt Two Fall 2016
 * boomarks_save.js
 *
 * Student: David Petringa
 * This assignment saves bookmarks to a MySQL database
 * This file is the javascript file to save bookmarks using bookmarklets
 * This does not work on https sites nor on internet Explorer nor Firefox(unless on the same domain)
 * By doing this exercise I learned a tremendous amount about Ajax, server responses and debugging
 * I found a way to allow CORS to work on opera and chrome. This allows one domain to request data from another domain.
 * Normally AJAX requests are forbidden when a request is made from a differnet domain.
 * You are welcome to try it out and save a bookmark.
 *
 * This javascript page uses Ajax to save the data to the MySQL table using the script @
 * http://www.dukesnuz.com/bookmarklets/ajax/bookmarks_save.php
 *
 * last updated 11/222228888888888/2016
 ******************************************/
// set the variables
var pageUrl = window.location.href;
var pageTitle = document.title;
// grab the last 32 values from the url and assign them to the variable key
// the key is used to veryfy that this request matches the key in the /ajax/bookmarks_save.php script
var key = document.getElementById('bKey').src.slice(-32);
// I am using a constructor function
function makeBookmark() {
	this.pageUrl = pageUrl;
	this.pageTitle = pageTitle;
	this.key = key;
}

// create a new instance of the object using the constructor function and new
var bookmark = new makeBookmark(pageUrl, pageTitle, key);

/*********************
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
 *********************/
//create ajax object for current and older browsers
// I am asignging the XMLHttpRequest object to the variable ajaxSave so there is no conflict with the Ajax used in bookmarks_search.js
var ajaxSave = null;
if (window.XMLHttpRequest) {
	ajaxSave = new XMLHttpRequest();
} else if (window.ActiveXObject) {
	ajaxSave = new ActiveXObject('MSXML2.XMLHTTP.3.0');
	// for internet explorer older browsers
}

// check if after clicking bookmarklet, user still wants to store bookmark
var confirmOperation = confirm("Do you want to save this url to your bookmarks?\n URL: " + pageUrl + "\n TITLE: " + pageTitle);
// if they do, then store it by calling the saveBookmark function
if (confirmOperation === true) {
	saveBookmark();
}
/*******************************************************************************************
 * function makes the Ajax request and sends the data  to the server script
 * the cool part is I am using the response from the php script(the response from the server) in the javascript alert message
 * How cool is that!  I have a working php script.
 *******************************************************************************************/
function saveBookmark() {
	"use strict";
	// verify ajax has a true value befire using it
	if (ajaxSave) {
		// uses stringify to turn the object into a JSON object
		var data = JSON.stringify(bookmark);
		/*call the open method and provide the type of request either GET or POST
		open the connection to the url we are sending the data to.
		using true as the 3rd argument assures the request will be sent asynchronously
		this allows for other javascript code to run while awaiting a server response.
		I was switching between GET and POST requests. leaving get commented out in the event
		I want to switch to using GET requests */
		// ajaxSave.open('GET', 'http://www.dukesnuz.com/bookmarklets/ajax/bookmarks_save.php?data='+data+'', true);
		ajaxSave.open('POST', 'http://www.dukesnuz.com/bookmarklets/ajax/bookmarks_save.php', true);
		// use the setRequestHeaders method to indicate to the server the content type being sent. throws error when not used
		ajaxSave.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		// tell server data is json type
		ajaxSave.setRequestHeader('Content-Type', 'application/json');
		// this method sends the request to the server, for a get request this is used ajax.send(null)
		ajaxSave.send(data);

	}
	// use an event listener and assign the readystatechange property to the ajax object. this function is called
	// during the ajax implementation
	// the readyState property returns the status of the loading put another way it returns the state of the XMLhttpRequest
	// there are 4 readyState states, state 4 = DONE request finished and response ready.
	// 0 = UNSENT, 1 = OPENED, 2 = HEADERS_RECIEVED, 3 = LOADING
	// using  addEventListener to attach the readychange event handler to the ajaxSave object
	ajaxSave.addEventListener("readystatechange", function() {
		//"use strict"; js hint says not needed
		if (ajaxSave.readyState == 4) {
			// check the status of the object which is the server response. codes 200 is ok less than 300 and 304 are also acceptable
			if (this.status == 200 && this.status < 300 || this.status == 304) {
				// use the response text that comes back from the server as the message, now this is a cool thing to do
				// this can be seen in the developers tools in preview and response section
				alert(this.responseText);
			} else {
				alert("OOOpppsss ! System error.");
			}//END if status
		} // no else error message because I can only use pop ups and even if not an error the error pop up still
		// will appear as the readyState changes from 1 to 3
	}, false);

} // END function saveBookmarks

