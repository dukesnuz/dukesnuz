/* CSCI E-3 Introduction to Web Programming Using Javascript
* Spring 2014
*
* Homework Unit #2
*
*
*/

/********************************************************************
 *
 * First problem: temperature conversion
 *
 * If the values entered by the user aren't numbers (or convertible to numbers),
 * return nothing (or, more specifically, leave the output field blank)
 *
 ********************************************************************/

var convertCtoF = document.getElementById("degC");
convertCtoF.onchange = function() {//onchange means that every time the value in the input box changes, this function will run
	'use strict'; //I added use strict
	var degreesC = document.getElementById("degC").value;
	// this is the value from the form field
	// Declare variables
	var numC;
	var degreesF;

	// your calculations go here. You'll start with the variable degreesC, convert it to Fahrenheit
	// and place the result in the variable 'degreesF'

	/**********************
	 * START my code
	 * Convert Celsius to Fahrenheit
	 **********************/

	// parse the input and return an integer. I am using parsefloat() in case a number with a decimal is input. The decimal
	// will be included in the calculation
	numC = parseFloat(degreesC, 10);
	// Check if input can be converted to a number, using a conditional and if not a number is false
	// if not a number then do nothing
	// If value is a number calculate celsius to fahrenheit. Round to nearest integer
	// If more precison is required I could have used toFixed() method. Convert number to a string and set decimal places
	// I am using Math.round. If result .5 or greater then number rounded up, if less than .5 then number rounded down
	if (!isNaN(degreesC)) {
		degreesF = Math.round((((numC * 9) / 5) + 32));
	} else {
		degreesF = "";
	}

	/**********************
	 * END my code
	 *********************/

	// var degreesF = "you haven't written this code yet";
	// you will set this to the results of your conversion

	// now we write the result to the page
	document.getElementById("degFOut").innerHTML = degreesF;
}
var convertFtoC = document.getElementById("degF");
convertFtoC.onchange = function() {//onchange means that every time the value in the input box changes, this function will run
	'use strict'; //I added use strict
	var degreesF = document.getElementById("degF").value;
	// this is the value from the form field
	// Declare variables
	var numF;
	var degreesC;
	// your calculations go here. You'll start with the variable degreesF, convert it to Celsius

	/**********************
	 * START my code
	 * Convert Fahrenheit to Celsius
	 **********************/

	// parse the input and return an integer. I am using parsefloat() in case a number with a decimal is input. The decimal
	// will be included in the calculation
	numF = parseFloat(degreesF, 10);
	// Check if input can be converted to a number, using a conditional and if not a number is false
	// if not a number then do nothing
	// If value is a number calculate fahrenheit to celsius . Set decimal to 2 places
	// I used toFixed() method. Convert number to a string and set decimal places

	if (!isNaN(degreesF)) {
		// Calculate fahrenheit to celsius.
		// I used toFixed() method to convert number to a string and set to 2 decimal places
		degreesC = ((numF - 32) * 5 / 9).toFixed(2);
	} else {
		degreesC = "";
	}

	/**********************
	 * END my code
	 **********************/

	// and place the result in the variable 'degreesC'
	// var degreesC = "you haven't written this code yet";
	// you will set this to the results of your conversion

	// now we write the result to the page
	document.getElementById("degCOut").innerHTML = degreesC;
}
