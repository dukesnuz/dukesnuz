/* hw3a.js  */
/******************************************************************************************************
 * Teaching Fellow = JaZahn Clevenger
 * Student = David Petringa
 * Unit Project 3A - CSCI E - 3 -Introduction to Web Programming Using JavaScript
 * Thank you for checking my work. I hope you enjoy this.page.
 * last updated 11/04/16
 ******************************************************************************************************/
/*
 *Larry's plan of action
 *step 1 divide text into an array of words
 *step 2 iterate over the array, at each:
 * *1  Build SPAN elements as you go, along with the attributes as shown in the example
 * *2  Add the SPAN elements to the original DIV
 * step 3 Add a handler to the SPAN elements, or to the DIV, which causes the style on the SPAN to change on mouseover.
 */

window.onload = function() {
	"use strict";
	var btn = document.getElementById("divideTranscript");
	btn.addEventListener("click", function(e) {
		transformText(document.documentElement, 'id', 'transcriptText');

	}, false);

	/************************************************************************************
	 *
	 * I used a recurion function because I wanted to become familiar with recursion.
	 * Yikes, I just watched your session and I heard you say you cannot see recursion needed here.
	 * I am going to leave my code as is using recursion. It seems to be working fine. And I need the practice.
	 * Also heard you mention, commenting noi needed for easy to understand code, so in my lazyiness
	 * I will not be commenting a lot. My IDE has a format text option that sets indention and makes my code prettier
	 *
	 * For the event handler, simply change this line transformText(element, 'property', 'property value')
	 * the function will work on any textimmediatly after an element with an id or a class
	 *
	 * it takes 3 parameters
	 * @param el = the element
	 * @param prop = id or class
	 * @param propValue = property value
	 *
	 ***********************************************************************************/

	function transformText(el, prop, propValue) {
		//"use strict"; js hint saying this line is unnecessary 
		// check if element = property and it's first child node has a value'
		if (el.getAttribute(prop) == propValue && el.firstChild.nodeValue !== null) {
			var text = el.firstChild.nodeValue;
			var textArray = [];
			textArray = text.split(' ');
			el.removeChild(el.childNodes[0]);
			for (var i = 0; i < textArray.length; i++) {
				// loop through array and enclose the element in a span. at id and a class
				// change the background color of the output
				var newSpan = document.createElement('span');
				var newContent = document.createTextNode(textArray[i] + ' ');
				newSpan.appendChild(newContent);
				newSpan.setAttribute('id', 'word' + [i]);
				newSpan.setAttribute('class', 'word');
				el.appendChild(newSpan);
				el.style.backgroundColor = '#EFEFEF';

				// on word mouseover change background color
				newSpan.addEventListener('mouseover', function() {

					this.style.backgroundColor = '#FFFF00';

				}, false);
				// on mouseout, change background color back
				newSpan.addEventListener('mouseout', function() {

					this.style.backgroundColor = '#EFEFEF';

				}, false);
			} // END for(var i ... loop)
		}// END if (el.getAttribute(prop) ...
		// loop through the element's children
		for (var j = 0; j < el.children.length; j++) {
			// have the function call itself
			transformText(el.children[j], prop, propValue);
		} // END for(var j ... loop)
	} //END transformText function

};
//END window. onload function
