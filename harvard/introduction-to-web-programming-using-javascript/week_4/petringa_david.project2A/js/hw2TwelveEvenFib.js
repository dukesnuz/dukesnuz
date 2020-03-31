/* CSCI E-3 Introduction to Web Programming Using Javascript
* Spring 2014
*
* Homework Unit #2
*
*
*/

/********************************************************************
 *
 * Fourth problem: Sum of first 12 even Fibonacci numbers
 *
 ********************************************************************/
// first we get the HTML for the button
var getFibSum = document.getElementById("sumFib");

//then we set the event handler for when the button is clicked
getFibSum.onclick = function() {
	'use strict';
	document.getElementById("sumFibResult").innerHTML = twelveEvenFibonacciSum();
}
/*
 *  twelveEvenFibonacciSum - calulates the sum of the first 12 even fibonacci numbers, with 0, 1 being the first two numbers of the sequence
 *
 *            @returns {integer} The sum of the first 12 even Fibonacci numbers
 */

function twelveEvenFibonacciSum() {
	/// WRITE YOUR CODE HERE

	/*******************
	 * START my code
	 *******************/

	// Declare variables and use strict
	'use strict';

	var a = 0;
	var b = 1;
	var c = 0;
	var count = 0;
	var i = 0;
	var results = [];
	var even = [0];

	// Create a loop
	// I originally used a for loop. I wanted more esperience with do while loops so I changed to a do while loop
	// A do wile loop iterates at least once
	// I wanted practice using the array.length method and I think it makes the code read cleaner as I use 12 instead of 11.
	// Inside the do while loop first set a value of 0 to the results array and store the fibonacci number created in an array
	// Set c equal to current and new fibanacci numbers.
	// If conditional checks if the fibonacci number is even. If true add the value to the count variable. Add the even number to the even array
	// Set a equal to the current value in the array before the new fibanacci is added
	// set b equal to the new fibonacci created
	// increment the array index by 1. i holds current index postion in results array
	// Stop the loop when the length of the even array is equal to 12.
	// The code block is executed before the while condition is tested... thus even.length < 12
	do {
		results.push(c);
		c = a + b;
		if (c % 2 == 0) {
			count = count + c;
			even.push(c);
		}
		a = results[i];
		b = c;
		i++;
	} while (even.length < 12);

	return count;

	/********************
	 * END my code
	 ********************/

}
