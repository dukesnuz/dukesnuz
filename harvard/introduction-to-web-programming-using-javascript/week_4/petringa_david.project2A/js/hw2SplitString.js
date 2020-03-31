/* CSCI E-3 Introduction to Web Programming Using Javascript
* Spring 2014
*
* Homework Unit #2
*
*
*/

/********************************************************************
 *
 * Third problem: Splitting a String
 *
 ********************************************************************/

var splitName = document.getElementById("splitName");
// wanted to see if using the getElementById method would work to enter my name. Seems to be working fine.
document.getElementById("fullName").value = "C David Petringa";

splitName.onclick = function() {
	'use strict'; //I added use strict
	var fullname = document.getElementById("fullName").value;

	/*
	*  We've gotten the fullname from the HTML form field.
	*  Your job is to use the String.slice(), String.substring() or String.substr() functions
	*  to divide your name into separate first and last name strings and assign
	*  them to the variables provided. You may
	*  need String.indexOf() as well.
	*
	*  You may not hardcode the position of where to split the string. Your code should
	*  work for anyone's first and last name. If the user enters a name without any whitespace
	*  return that as firstname and leave lastname blank.
	*
	*  If a name has more than one whitespace (as in, using one or more middle names),
	*  make the first name 'firstname' and assign the rest to 'lastname'
	*
	**/

	//var firstname = 'Placeholder first name';
	//var lastname = 'Placeholder last name';

	/******************
	 * START my code
	 ********************/
	// Declare variable
	var firstname;
	var lastname;
	var spacePos;
	// Find the position of the first space starting from the left using indexof() method.
	spacePos = fullname.indexOf(' ');
	// Use the slice() method to grab the first name. Start at the begining of the string.
	// For last name I use substr() method. For start postion I used the space  + 1
	// If there is more than 2 spaces ie middle name, then return middle name and kast name as lastname combined
	// if a space is found, use the first condition otherwise - if no spaces set firstname to first name. Set lastname ot empty string.
	if (spacePos != -1) {
		firstname = fullname.slice(0, spacePos);
		lastname = fullname.substr(spacePos + 1);
	} else {
		firstname = fullname;
		lastname = " ";
	}

	/******************
	 * END my code
	 ********************/

	document.getElementById("firstname").innerHTML = firstname;
	document.getElementById("lastname").innerHTML = lastname;

}