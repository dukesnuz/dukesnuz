/************************************HED Graduate Credit Assignemnt One Fall 2016
 *
 * This application created, coded and tested by David Petringa
 * I hope you enjoy this app.
 *
 * Thank you for viewing my Graduate assignment one for the class Introduction to Web Programming Using JavaScript at HES.
 * The main objective is to demonstrate my knowledge of functions, arrays and working with numbers all within JavaScript.
 * I tried to explain as much as possible regarding how this works.
 * I also tried to make the code as easily readable as possible. I am using aptana for my IDE.
 * Apatna has a tidy/format feature which re-aligns code for human reading.
 * It tends to wrap my for loops into 2 lines when I have 2 var variables. I think I may change the way I decalre the variables
 * to stop the wrap in for loops
 *
 * This is a  mortage calculator. The Javascript function will verify that numbers greater than zero are enetered in each
 * field. The results will be stored in a multi-dimensonal array. The display button is set to disabled until at least one element
 * is in the results array. The display button will display all the results for the current session. I created  a function to create an HTML
 * table. If more than five calculations are made the visitor is notified by an annoying pop up to insert $.025 to continue.
 * The calculations should be accurate.
 *
 * I ran this page through jshint. jshint was giving me errors because had not added ";" after each function. After adding ";"
 * the errors went away.
 *
 * More HTML and CSS could have been used to pretty up the page.
 * I chose to concentrate on the functionality of the JavaScript.
 * I hope you enjoy this.
 *
 */

/****************************************************************************************
 *
 * Create a function expression for document.getElementById. To save on typing. I am assigning the function to the variable $.
 * This is also the variavle jQuery uses.
 * I believe this function is a good canditate for a seprate functions library
 * This function is reusable
 *
 ****************************************************************************************/
// assign the global variable(not inside a function) $ to an anonymous function expression which is a function assigned to a variable
// Global variabls have global scope. They are avaialble to any function and do not need to be passed as parameters
// Local variables created inside a function with var have local scope and can only be used in the function they are defined in
// Because this is a function expression it must be declared before it can be called
// Why is this? Function expressions are not hoisted. Function declarations are hoisted. Hoisting is when JavaScript looks
// ahead and hoists function declarations and variable declarations to the top.
var $ = function(id) {
	'use strict';
	// use a conditional to check if id has a value. typeof returns the type of the operand
	if ( typeof id != 'undefined') {
		return document.getElementById(id);
	}
};
//END function
/****************************************************************************************
 * this function expression will format numbers. it takes one argument called num
 * this function expression takes one parameter. It then becomes an argument in the function - num
 * a function expression must be in the code sequence before the function can be called.
 * I believe this function is a good canditate for a library function
 * This function is reusable
 ****************************************************************************************/
// create a function expression
// assign the global variable(not inside a function) formatNum to an anonymous function expression which is a function assigned to a variable
var formatNum = function(num) {
	'use strict';
	// turn number into string and use indexOf() method to find the position of the deciaml
	num = num.toString();
	// Declare variables at begining of function. These variable have local scope
	// local scope means they are only available inside the function in which they are decalred
	// using indesOf() method to get the first instance location of the decimal
	var dotSpot = num.indexOf('.');
	// check if a number with decimals are enetered. if not add decimal and 00
	// if indexOf does not find the dot, -1 will be returned
	// if no dot them add .00 to end of num
	if (dotSpot == -1) {
		num = num + ".00";
		dotSpot = num.indexOf('.');
	}
	var decimal = num.slice(dotSpot + 1);
	var hundreds;
	var thousands;
	var millions;
	// using a conditional and the slice method to split the number into hundreds, thousands and millions
	if (dotSpot < 4) {
		// hundreds
		// slice takes two argumants, the start and end positions, the second argument is optional
		// set the value to the hundreds variable
		hundreds = num.slice(0, dotSpot);
		// concat the variables using + operator
		return "$ " + hundreds + "." + decimal;
	} else if (dotSpot > 3 && dotSpot < 7) {
		// thousands
		// using the slice method which returns the selected elements in an array
		// setting values to variable hundreds and thousands
		hundreds = num.slice(dotSpot - 3, dotSpot);
		thousands = num.slice(0, dotSpot - 3);
		// concat the variables using + operator
		return "$ " + thousands + "," + hundreds + "." + decimal;
	} else {
		// millions
		// using the slice method which returns the selected elements in an array
		// setting values to variables millions, thousands and hundreds
		hundreds = num.slice(dotSpot - 3, dotSpot);
		thousands = num.slice(dotSpot - 6, dotSpot - 3);
		millions = num.slice(0, dotSpot - 6);
		// concat the variables using + operator
		return "$ " + millions + "," + thousands + "," + hundreds + "." + decimal;
	}
};
// END format function
/****************************************************************************************
 * This function will create a table. It has one parameter which is an array
 * More than one argument can be passed into the function. Use arguments array to retrieve the other paramters
 * Here are the arguments I am passing in.
 * makeTable(resultsArray, "Data Entered and Results", "Amount", "Years", "Rate", "Payment");
 * I believe this function is a good canditate for a library function
 * This function is reusable
 * This is a function expression which must be decalred before ir can be called
 ****************************************************************************************/
// create a function expression
// assign the global variable(not inside a function) makeTable to an anonymous function expression which is a function assigned to a variable
var makeTable = function(tableArray) {

	// no limit for table columns.
	// use the arguments property of the function to get the arguments passesd to the function
	// the parameters are stored in the arguments array. All functions have an arguments array.
	// to retrieve the parameters use the index number of each argument
	// loop through the arguments array and retrieve all the arguments after the second argument
	// use retrieved arguments concat into a table header
	// create a variable table which has local scope using the var before the variable
	var aLength = arguments.length;
	//get the length of the arguments array
	var table = "<table><caption>" + arguments[1] + "</caption>";
	table += "<tr>";
	for (var i = 2; i < aLength; i++) {

		table += "<th>" + arguments[i] + "</th>";
	}
	table += "</tr>";
	// loop through tableArray and retreive array elements
	// concat values into a table row
	// I am retrieveing data from a multi dimensional array. A multi dimensaional array is an array
	// the stores another array in the array as an element
	var count = tableArray.length;
	// get the length of the tableArray
	for ( i = 0; i < count; i = i + 1) {

		table += "<tr>";
		var c = tableArray[i].length;
		for (var j = 0; j < c; j++) {
			table += "<td>" + tableArray[i][j] + "</td>";
		}
		table += "</tr>";

	}

	table += "</table>";

	return table;

};
//END function
/****************************************************************************************
 *
 * This function performs the calculation. Each result is stored in an array.
 * function first checks for valid data entereed.
 * then computes values
 * then enables display button
 *
 */

// Here I am creating an emmpty array. This is a better way of creating and array than var resultsArray = new Array();
var resultsArray = [];
// The document object is the object used to work with the DOM. It represents the document.
// Below I am using the getElementById to find the HTML element with an id of calculateBtn.
// assign the global variable(not inside a function) calculateBtn to the id calculateBtn button in the HTML
var calculateBtn = $("calculateBtn");

// attach the variable calculateBtn to the onclick event and assign anonymous function to the onclick event
calculateBtn.onclick = function(e) {
	// using strict mode. Used to to minmize errors when creating variables.
	// if a variable is used before it has been declared in a statement using var am error will be thrown.
	// variables decalred inside a function using the word var have local scope which means they are only
	// avaialble inside the function in which they are decalred
	// If they are mispelled an error will be thrown. This works on modern browsers.
	'use strict';
	// Below line will prevent the form from being submitted
	e.preventDefault();
	// I set the errorMessage to error. Only when input data passes the tests will the errorMessage be changed to noError.
	// I suppose I could have used true false instead of error and noError. I wanted to be more explicit.
	// set error to is an error, then prove it false
	var errorMessage = "error";
	// Using the variable created for the document.getElementById, the values from the input fields are retrieved using
	// the value property.
	var amount = $("amount").value;
	var years = $("years").value;
	var percent = $("percent").value;
	// Decalre more variables used. Trying to stay organized variables are being declared at the begining of the funtion.
	// By using var before each varaible, the variable will have local scope. The variable will not be avaialble outside the function
	var rate;
	var n;
	var payment;
	var message;

	// Check valid values are entered
	// first check all values entered for  !!isNan(true) = if value is not a numnber is true OR is value less than 1
	// the calculations inside the inner parenthesis will be evaluated first
	// using a conditionl statement if(a) evaluates to if a is true, if(!a) evalutates to if a is false
	// the || is a logical operator which means or
	if ((!!isNaN(amount) || amount < 1) || (!!isNaN(years) || years < 1) || (!!isNaN(percent) || percent < 1)) {
		message = "<p>Please enter only numbers greater than zero.</p>";
		// add message to message variable
	} else if ((!amount) || (!years) || (!percent)) {// check if all fields are filled in
		message = "<p>OOppss! You forgot to fill in all fields.</p>";
		// add message to meeage variable
	} else {
		// if above conitions are not true then values must be valid input
		// using parseFloat to preserve if a decimal value entered, convert the values to  numbers
		// parseFloat() function returns a number with a decimal . it takes an optional second argument the radix or number's base
		amount = parseFloat(amount, 10);
		years = parseFloat(years, 10);
		percent = parseFloat(percent, 10);
		message = "<p>Input is in correct format.</p>";
		// add message to meeage variable
		errorMessage = "noError";
		//set errorMessage to noError. we proved there are no error in the input
	}
	// END if((!!isNaN))

	//print the message to the page using the innerHTML DOM property
	$('error').innerHTML = message;
	// using the className property add the class property error to the error id
	$("error").className = errorMessage;

	// if no errors start the calculation
	// a conditional using the comparison operator ==
	// == checks if they are equal, it does not check if they are of the same data type ie number, string, boolean
	if (errorMessage == "noError") {
		// rate = percent divided by 12 result divided by 100
		// forward slash is the arithmatic operator divide
		rate = (percent / 12) / 100;
		// n = years multiplied by 12 using the * which is an arithmatic operator
		n = years * 12;

		// the formula computes an accurate result
		// I used the Math.pow(1,2) method to raise 1 + rate to the nth power
		// then used simple multiplication division and subtraction in the formula
		// calculations inside the parenthesis will be evaluated first
		// use toFixed() method to set to 2 decimal places
		payment = (amount * (rate * ( Math.pow(1 + rate, n) )  ) / [Math.pow(1 + rate, n) - 1]).toFixed(2);
		// use a conditional to check that NaN is not returned. checking if returned value is greater than 0
		// will accomplish this
		if (payment > 0) {

			// I call the formatNum() function to add the dollar sign and commas to the output
			// passing in the paramters from the amount and payment variables to the function argument
			amount = formatNum(amount);
			payment = formatNum(payment);
			// concat percent usinf + to add a space and % to the end
			percent = percent + " %";

			// p elements are concated to the formatNum(payment) result using the + operator
			// innerHTML DOM property is used to print the result to the page
			$("output").innerHTML = "<p class='output'>" + payment + "</p>";

			// Add results to beginging of array using unshift() method.
			// this will add an elemnt to the begining of an array
			resultsArray.unshift([amount, years, percent, payment]);

		} else {
			// if conditional is false add a value to the payment so error will not be thrown
			// if calculation returns NaN
			payment = parseFloat(0.00, 10);
			message = "OOppss ! Computation Error !<br>The values you entered are too large for me to compute.";

		}//END if(isNaN)
		// print message to page where id is error.
		$("error").innerHTML = message;

		// if the array has more than one value enable the display button
		// conditional used here witht the > comparison operator
		if (resultsArray.length > 0) {
			// enable display button that is attached to the print id
			$("print").disabled = false;
		}// END if (resultsArray.length > 0)

		// using a conditional check if resultsArray has 5 elements and use window.alert() method to show and annoying popup
		if (resultsArray.length > 4) {
			alert("An annoying popup.\nI am a method of the window object.\nI am technically written as window.alert();.\n I can also be written as alert();\nYou have used up all your tokens.\nPlease insert $0.25 cents to continue.");
		}
	} // END if(errorMessage == "noError")
};
// END function
/*************
 * print function displays the data from the array that is stored for each calculation
 * chain the printTable variable to the onclick event
 * table used to display data
 */
//  assign the global variable(not inside a function) printTable to the id print button in the HTML
var printTable = $("print");
// attach the variable printTable to the onclick event and assign anonymous function to the onclick event
printTable.onclick = function(e) {
	// use strict to minimize variable errors
	'use strict';
	// Below line will prevent the page from reloading
	e.preventDefault();

	// attach the display variable to the display id in the HTML
	// again I am using the $ variable to appeaze my laziness for typing document.getElementById("display");
	var display = $('display');

	// use the innerHTML DOM property to clear previous table content displayed
	// Yes because of my laziness I am using the variable display which os storing the value $('display');
	// the value of $ is storing the value of document.getElementById(id);
	display.innerHTML = "";

	// call the makeTable() function expression and pass the resultsArray to is as an argument
	// pass the the function also take arguments for the caption and table headers
	// print the table to the page that has the id of display
	display.innerHTML = makeTable(resultsArray, "Data Entered and Results", "Amount", "Years", "Rate", "Payment");

};
//END function
/**************************
 * using the window. onload event to execute the anonymous function when page loads
 * window.onload function is called when the windoww's load event fires
 * the window contains the Dom
 **************************/
// assign the anonymous function to the onload event of the window
// this function will be called when the page loads
window.onload = function() {
	// use the document.getElementsByTagName to get the tag name for the first h1 HTML element.
	// values are returned as nodelist. each node can be retrieved using the index numbers starting at 0
	// use the innerHTML DOM property chained to the document.getElementsByTagName property to get the content
	// set the title variable to the content
	var title = document.getElementsByTagName("h1")[0].innerHTML;
	// set the newTitle variable to the first header element (index[0]), using the document.getElementsByTagName method
	// this method gets all the element with the specifies tag name (the first header element)
	var newTitle = document.getElementsByTagName("header")[0];
	// using the innerHTML DOM property set the new content to the header element and add h4 element
	// concat the h4 and text to the title using the +
	newTitle.innerHTML = "<h4>I reprinted the title using javascript's innerHTML property. " + title + "</h4>";
	// using the variable newTitle which value is the first header element, use the style property to change the text color
	// using the chaining approach
	newTitle.style.color = "#0000FF";

	// On window load disable display button until there is at least one element in the array
	// using the disabled property true button is disabled, using disabled false button is enabled
	// this can be used so that buttons, drop downs ect. cannot be clicked, they are usually grayed out
	$("print").disabled = true;
};
// END function
