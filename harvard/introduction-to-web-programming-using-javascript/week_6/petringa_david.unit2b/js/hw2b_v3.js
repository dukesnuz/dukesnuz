/* hw2b.js */
/******************************************************************************************************
 * Teaching Fellow = Jazahn Clevenger
 * Student = David Petringa
 * Unit Project 2B - CSCI E - 3 -Introduction to Web Programming Using JavaScript
 * I completed my project. Attended a few sessions and realized I did not use a constructor function on
 * the data retreived from local storage. So I went back and reworked this page.
 * Thank you for checking my work.
 * last updated 10/23/16
 ******************************************************************************************************/

// First we do a self-invoking function that contains everything - there will be nothing
//  exposed to the global scope.

/********************************
 * I added this function
 * A function grabbing document.getElementById(id)
 * This has to be the coolest function !
 ********************************/
var $ = function(id) {
	'use strict';
	if ( typeof id != 'undefined') {
		return document.getElementById(id);
	}
};

/*******************************
 * I added this function
 * function prints a message to the page. It takes one parmater
 ******************************/
function writeMessage(message) {
	'use strict';
	$("message").innerHTML = message;
}

/*************************************************
 * A self-invoking function that calls itself when the page laods
 *************************************************/
(function() {
	"use strict";
	//create and empty array to store the data
	var listArray = [];

	// below is so selected parts of script can be turned off and on when developing or live
	// for live live = true;
	// for deve. live = false
	var live = true;

	/***********************
	 * constructor function to create instances of the object  Readinglist
	 * takes 4 parameters title, author, subjust, url. I move this outside the onclick so it can be reused
	 *********************/
	// Step #2 - you will create a new data object
	var Readinglist = function(title, author, subject, url) {
		this.title = title;
		this.author = author;
		this.subject = subject;
		this.url = url;
	};

	// assign the variable button to the id doit button in the HTML
	var button = $("doit");

	// attach the variable button to the onclick event and assign the annonymous function to the onclick event
	button.onclick = function(event) {
		// prevent page from loading
		event.preventDefault();

		/*  This function will run when the user clicks on the
		*  Save button.  We're going to do several things when this function
		*  runs:
		*  1) Get the values from the form. We have done this part for you
		*  2) Create a new data object that contains the information from the form. This could be
		*     a constructor funtion that takes each of the values as its arguments, or a simple
		*     JSON object (an object literal, more or less).
		*  3) Write this data object to the page. You'll do this by calling writeRowToPage() and
		*     passing your data object as a parameter.  We have provided a sample of this
		*     function for you, though you may have to modify/complete it so that it works
		*     with your data structure.
		*  4) Store your data to localStorage.  Remember that localStorage stores only
		*     strings, so you'll need to stringify your object. Remember, too, that when you
		*     write to localStorage, you can't add to or modify what's already there - you can only
		*     replace it completely, so you'll need a strategy to manage your accumulating data. See the
		*     Project 2B document for more information.
		*
		*     */

		//Step #1 - we get values from the form
		// value property gets the value of the input fields
		// I am using variable $ to call the cool function. Yeh!
		var title = $("title").value;
		var author = $("author").value;
		var subject = $("subject").value;
		var url = $("url").value;

		// check if values are entered in input fields
		// I intentionally am not checking for a value entered in the url field
		if (title.length === 0 || author.length === 0 || subject.length === 0) {
			writeMessage("OOOpppsss ! Please fill in all the fields.");
		} else {
			// clear input fields. here is whereif(live) comes in handy for testing.
			if (live) {
				$("title").value = "";
				$("author").value = "";
				$("subject").value = "";
				$("url").value = "";
				// put focus on title field
				$("title").focus();
			}

			// Step #2 - you will create a new data object
			// when I added the call to the constructor function in item 5 I moved the constructor function outside of this function
			// in order for it to be called outside this function
			// call the contrsutor function using new. using "new" is neccessary.
			// this will create a new instance of the object
			// if not used strange things can happen.
			// the this could refer to the window object
			var readinglist = new Readinglist(title, author, subject, url);

			// Step #3 - call on writeRowtoPage() to write your new data object to the page

			writeRowToPage(readinglist, "output");

			// Step#4 - Store your object in localStorage (preserving data
			//          that's already in there from prior submissions!)

			// check if browser supports local storage
			if ( typeof (localStorage) !== "undefined") {

				// get data from local storage and parse it
				var storage = JSON.parse(window.localStorage.getItem("listStored"));
				// I am checking to see if there is data in local storage.
				// I could have also used if(storage != null)

				if (storage && storage.length > 0) {
					// if local storage has values clear listArray and create new array
					listArray = [];
					var len = storage.length;
					// loop through the local storage array
					for (var i = 0; i < len; i++) {
						// use constructor function to create instances of the Readinglist object
						var readinglistnew = new Readinglist(storage[i].title, storage[i].author, storage[i].subject, storage[i].url);
						// push the instance to the array
						listArray.push(readinglistnew);
					}//END for loop

				}// END if (storage && storage.length > 0) {
				// push the new field data to the array
				listArray.push(readinglist);

				// stringify object and store in local storage
				// keyName is listStored , keyValue =JSON.stringify(listArray)
				window.localStorage.setItem("listStored", JSON.stringify(listArray));
				// print message to page
				writeMessage("Storage Success !");
			} else {
				writeMessage("Your browser does not support local storage");
			} //if ( typeof (localStorage) !== "undefined") {
		} //END IF fields empty
	};
	//END function

	/* This function accepts two arguments -
	*    @dataObject: your data object representing a single
	*                 submission of the data form, which corresponds
	*                 to one row in the table
	*    @element:   the element on the page to which to write the output
	*
	*    The function assembles a string of HTML, using the data from
	*    dataObject.  Once the string is complete, it is appended to the
	*    page using innerHTML.
	*
	*    This has been coded to work with a sample data object that contains
	*    properties for name, addr, and email. Your data object may be different,
	*    in which case you will need to change this function accordingly.
	*
	* */
	// function first checks if datObject has defined value, then prints list of dataObject data
	// if not prints message to page
	function writeRowToPage(dataObject, element) {

		if (dataObject.title !== 'undefined' && dataObject.author !== 'undefined' && dataObject.subject !== 'undefined' && dataObject.url !== 'undefined') {
			element = $(element);
			var s;
			s = "<ul><li><span class = 'list_name'>Title: </span><span class = 'list_data'> " + dataObject.title + "</span></li>";
			s += "<li><span class = 'list_name'>Author: </span><span class = 'list_data'>" + dataObject.author + "</span></li>";
			s += "<li><span class = 'list_name'>Subject: </span><span class = 'list_data'>" + dataObject.subject + "</span></li>";
			s += "<li><span class = 'list_name'>Url: </span><span class = 'list_data'>" + dataObject.url + "</span></li>";
			element.innerHTML += s;
		} else {
			writeMessage("OOppss ! System error.");
		} //END if (dataObject.title !== 'unddefined'
	}//END function

	/* Step #5, Finally, write a function or other code that will, upon page load,
	* look in localStorage for any existing data, create data objects from it, and
	* write those data objects to the page using writeRowToPage().  This way
	* any time the user revisits this page, they'll see what was previously entered (provided
	* that they use the same browser on the same computer!)
	* */

	//check if browser supports local storage

	if ( typeof (localStorage) !== "undefined") {
		// get data from local stoage and parse
		var storageList = JSON.parse(window.localStorage.getItem("listStored"));

		// check if items in storage. If not print message
		// I probaBly do not need the storage_list.length >0
		// because i am also checking if storage_list is true. Could have also used if(storageList ! = null)
		// then loop through storage_list array and print each array to the page
		// print a message to page
		// after watching a few sessions, I realized it is good practce to use a constructor function
		// to recreate an array of objects with the data retreived from local storage.

		// I could also have used if(storageList != null), just wanted tor try something different
		if (storageList && storageList.length > 0) {
			var len = storageList.length;
			for (var i = 0; i < len; i++) {
				// call constructor function to create instance of the object
				var readinglist = new Readinglist(storageList[i].title, storageList[i].author, storageList[i].subject, storageList[i].url);

				writeRowToPage(readinglist, "output");

				writeMessage("Your current goodies in local storage.");
			} //END for loop
		} else {
			writeMessage("You do not have any goodies in local storage.");
		} //END if(storage_list && storageList.length > 0){
	} else {
		writeMessage("Your browser does not support local storage");
	}//END if ( typeof (localStorage) !== "undefined") {

	/**************************************************************
	 * this function clears local storage,
	 * prints message to page
	 * puts curser focus on title field
	 * clears list of data from page
	 **************************************************************/

	// assign the variable clear to the id clear button in the HTML
	var clear = $("clear");

	// attach the variable clear to the onclick event and assign the annonymous function to the onclick event
	clear.onclick = function(event) {
		event.preventDefault();
		localStorage.clear();
		$("message").innerHTML = "Storage Cleared";
		$("title").focus();
		$("output").innerHTML = "";
	};
	//END function
})();
// END self-invoking function
