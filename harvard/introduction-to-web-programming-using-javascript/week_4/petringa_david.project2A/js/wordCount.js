/*
* wordCount.js
* count the number of words entered in the text box.
* extra consecutive white spaces are not counted
* NOTE : I am using aptana for my IDE. There is a format = tidy function to tidy up code. Sometimes it splits a line into
* 2 lines or more. ie where I declared my variables.
*
*/
// Get the HTML Element for the onkeyup event
var myTextareaElement = document.getElementById("myWordsToCount");
// Create a function that will count the number of words and extra white spaces that are typed into the input box
// Fire the function using the onkeyup event
myTextareaElement.onkeyup = function() {
	'use strict';

	// Declare variable
	var text,
	    spaces,
	    wordCount,
	    count,
	    i;
	var textArray = [];
	// Use the value property to get the contents of the text box
	text = document.getElementById("myWordsToCount").value;
	// Divide the string at word boundries(white spaces) into and array

	textArray = text.split(" ");

	// Loop through the array to check for extra white spaces and count white spaces
	// extra white spaces will not be included in the wordcount total.
	// once space between words is  not counted. more than one space is counted
	for ( i = 0, count = textArray.length; i < count; i++) {
		spaces = (textArray[i] == " ") ? spaces++ : 0;
	}

	// Subtract white spaces from the length of the array to get the true word count
	wordCount = textArray.length - spaces;
	// Write the wordCount to the page using the innerHTML property
	document.getElementById("wordcount").innerHTML = wordCount;
}
