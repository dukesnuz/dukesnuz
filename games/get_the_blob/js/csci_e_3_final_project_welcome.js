/******************************************************************************************************
 * CSCI E - 3 -Introduction to Web Programming Using JavaScript  - Final Project - Fall 2016
 * Teaching Fellow
 * Student = David Petringa
 * Thank you for checking my work. I hope you enjoy.
 * csci_3_final_project_welcome.js
 * last updated 12/1111111111115555555555555/16
 */

/***********************************
 * example of closure
 * function moves the title across the page. at a certain number of pixels a message appears to move it faster
 * calls the traverseHide to hide all elements with class name of hidden,
 * then calls traverseShow to show elements with class name of hidden
 * speed and start can be regulated by changeing startPos and startSpeed variables
 * this function is called from csci_e_3_final_project.js
 ***********************************/

function startScreen() {
	"use strict";
	traverseHide(document.documentElement);
	// if class hidden added to spin or output id, there is a conflict with welcome function
	// setting to fontSize.1 so invisible andsome other style properties
	$('spin').style.color = "#ffffff";
	$('spin').style.fontSize = ".1px";
	$('main').style.backgroundColor = "#FF7C00";

	var startPos = 850;
	var startSpeed = 22;
	// pixels at point messsage appears
	var messageSpot = 750;
	var inc = 1;
	var title = $('title');
	var titleMessage = $('titleMessage');
	var run = setInterval(function slide() {
		startPos = startPos - inc;
		if (startPos > 0) {
			if (startPos === messageSpot) {
				titleMessage.style.display = "block";
				$('titleMessage').addEventListener("click", function() {
					this.style.color = "#ff0000";
					this.innerHTML = "OUCH ! Not so hard please.";
					inc = 3;
				}, false);
			}//END if (startPos === messageSpot) {
			title.style.paddingLeft = startPos + "px";
		} else {
			// after click to speed up, need to set padding left to 1 since click will not always happen at same
			// spot always leaving a differnet end number of pixels
			titleMessage.style.display = "none";
			// call function to display elements
			traverseShow(document.documentElement);
			$('main').style.backgroundColor = "#FFA07A";

			welcome();
			clearInterval(run);
		}
	}, startSpeed);
}// END function

/*****************
 * sets styles for welcome message
 * this function is called from the startScreen function
 */
function welcome() {
	"use strict";
	$('spin').style.transitionDuration = "10s";
	$('spin').style.transitionTimingFunction = "ease-in-out";
	$('spin').style.fontSize = "25px";
}

/**************************************************************
 * example of traverse function finds all elements with a classname of hidden and hides them
 * if class hidden added to spin or output id, there is a conflict with welcome function
 * @param element
 */

function traverseHide(element) {
	"use strict";
	if (element.className == "hidden") {
		element.style.display = "none";
	}

	for (var i = 0; i < element.children.length; i++) {
		traverseHide(element.children[i]);
	}
}//END function traverseHide

/**************************************************************
 * example of traverse function finds all elements with a classname of hidden and displays them
 * @param  element
 */

function traverseShow(element) {
	"use strict";
	if (element.className == "hidden") {
		element.style.display = "block";
	}

	for (var i = 0; i < element.children.length; i++) {
		traverseShow(element.children[i]);
	}
}//END function traverseShow

