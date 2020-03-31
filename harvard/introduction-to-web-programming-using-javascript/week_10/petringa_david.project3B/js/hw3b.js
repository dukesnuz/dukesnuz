/* hw3b.js */
/******************************************************************************************************
 * Teaching Fellow = JaZahn Clevenger
 * Student = David Petringa
 * Unit Project 3B - CSCI E - 3 -Introduction to Web Programming Using JavaScript
 * Thank you for checking my work. I hope you enjoy this.page.
 * last updated 11/1111111111111111111111111111111111111111/16
 *
 * NOTE to JaZahn:
 * I completed all six exercices.
 * Since I feel like I hacked my way through exercise 3(select pull downs), I am submitting this as extra credit
 * I guess I need to state my second extra credit. Tough choice. Lets go with exercise 2 as my 2nd extra credit
 ******************************************************************************************************/

window.onload = function() {
	"use strict";
	// grab the form and assign it to form variable
	var form = document.forms[0];

	/**********************exercise 1***********************************************************************
	 * this function will check correct input values and that both passwords match
	 * function checks for 8-10 letters and numbers are entered
	 */
	function checkPswd(e) {
		var p1 = $("pwd1");
		var p2 = $("pwd2");
		// set variable of regular expression to 8-10 numbers or letters
		var regex = /^\w{8,10}$/;
		// check if target field is either pass 1 or pass 2
		if (e.target.id === "pwd1" || e.target.id === "pwd2") {
			// check if password 1 is 8-10 letters or numbers .. is true
			if (regex.test(p1.value)) {
				p1.nextElementSibling.style.display = "none";
				// check if password 1 = password 2, if not display a message, else display
				// message , by changing style property, also make sure field border color removed
				// else change display style to none and add class = inputValid, which adds
				// green border around password input fields
				if ((regex.test(p1.value)) && p1.value !== p2.value) {
					p2.nextElementSibling.style.display = "inline";
					p2.removeAttribute("class", "inputValid");
				} else {
					p2.nextElementSibling.style.display = "none";
					p1.setAttribute("class", "inputValid");
					p2.setAttribute("class", "inputValid");
				}
			} else {
				// if test false-invalid data entered-display message, by changing style property
				p1.nextElementSibling.style.display = "inline";
			} //END if (regex.test(p1.value))
		} //END if(e.target.id === "pwd1" || "pwd2"){

	}//END function

	// add event listener that listens on field input, will be triggered on form
	form.addEventListener("input", checkPswd, false);

	/******end exercise 1 ******/
	/**********************exercise 2***********************************************************************
	 * this function counts the number of values in the brief bio field
	 */

	var bio = $("bio");
	function countText(e) {
		var charsLeft = $("charsLeft");
		//set max number allowed in field, this can be changed on the fly
		var count = 140;
		// get the lrngth of the brief bio text area
		var len = bio.value.length;
		// check if field number of values in field is less than to count value and if backspace key not pressed
		// then add 1 to the length variable and display new number of characters
		if (len < count && e.keyCode !== 8) {
			len++;
			charsLeft.innerHTML = count - len;
		} else {
			// allow backspace key and tab keys else do not allow more charcters to be entered
			if (e.keyCode !== 8 && e.keyCode !== 9) {
				e.preventDefault();
			}
		}
		// subtract one from length of input field
		// display new value when backspace key pressed
		if (e.keyCode == 8 && len > 0) {
			len--;
			charsLeft.innerHTML = count - len;
		}
	}

	// add event listener to listen for keydoen in textarea
	bio.addEventListener("keydown", countText, false);

	/******end exercise 2 ******/
	/**********************exercise 3***********************************************************************
	 * feeling like I hacked this together.
	 * This function creates 2 select menus. the second select is dependant on the first selection.
	 * I used a self invoking function to keep the variables inside the function so they do not have global scope
	 */

	var selectFood = {
		food : [["pizza", ["small", "medium", "large", "gigantic"]], ["soup", ["cup", "bowl", "cauldron"]], ["salad", ["side salad", "dinner salad", "huge salad"]]]
	};

	(function() {
		var opt1 = document.getElementById("firstSelect");
		var opt2 = document.getElementById("secondSelect");
		//get array length
		var selectF = selectFood.food.length;
		//loop through array and grab data for first dropdown
		for (var i = 0; i < selectF; i++) {
			// create option elements
			var opt = document.createElement("option");
			// create text nodes using using first element in each array element
			var text = document.createTextNode(selectFood.food[i][0]);
			// add value to option
			opt.appendChild(text);
			// add the value of each option to = the array index
			opt.setAttribute("value", selectFood.food[i][0]);
			// add new option to current option
			opt1.appendChild(opt);

			// add event listener
			// function loops through array to get the values for the second dropdown
			opt1.addEventListener("change", function() {
				// get the index of the option -1 to start with 0 as array indexes start with 0
				var val = this.selectedIndex - 1;
				// get the value index number of the selected option
				var list = selectFood.food[val][1];
				var listLen = list.length;
				// reset option values
				$("secondSelect").innerHTML = "<option>-----</option>";
				// loop through array and create second drop down
				for (var j = 0; j < listLen; j++) {
					var optNew = document.createElement("option");
					var text2 = document.createTextNode(list[j]);
					optNew.appendChild(text2);
					optNew.setAttribute("value", list[j]);
					opt2.appendChild(optNew);
				}
			}, false);

		}
	})();

	/******end exercise 3 ******/
	/**********************exercise 4***********************************************************************
	 * This function displays subsections depending on which radio button is clicked
	 */
	var drinks = $("drinks");
	// add event listener to listen for a click in the drinks div
	// create the function with one argument, e
	drinks.addEventListener("click", function(e) {
		var waterDisplay = $("waterDisplay");
		var sodaDisplay = $("sodaDisplay");
		// if water is selected display water buttons and hide soda buttons
		if (e.currentTarget.id === "drinks" && e.target.value === "water") {
			waterDisplay.style.display = "block";
			sodaDisplay.style.display = "none";
			// clear buttons if checked
			$("coke").checked = false;
			$("pepsi").checked = false;
		}
		// if soda pop selected display soda options and hide water buttons
		if (e.currentTarget.id === "drinks" && e.target.value === "sodaPop") {
			waterDisplay.style.display = "none";
			sodaDisplay.style.display = "block";
			// clear buttons if checked
			$("tapWater").checked = false;
			$("bottledWater").checked = false;
		}
	}, false);

	/******end exercise  4******/
	/**********************exercise 5***********************************************************************
	 * This function checks and formats a telephone number
	 */
	var phone = $("phone");
	// create an array to store each number
	var arrayNumbers = [];

	phone.addEventListener("keydown", function(e) {
		// get the value of the key pressed
		var entered = e.key;
		// get the length of the array
		var numLen = arrayNumbers.length;
		// check if a number is entered and if the array length is less than 10
		if (/^[0-9]$/.test(entered) && numLen < 10) {
			// add the number to the end of the array
			arrayNumbers.push(entered);
			// create a string with the array elements
			var checkNumbers = arrayNumbers.join("");
			// format the string and add it to the field format as 123-456-7890
			this.value = checkNumbers.replace(/(\d{3})(\d{3})(\d{4})/, '$1-$2-$3');
		} else {
			// if backspace button pressed, remove last element in the array
			if (e.keyCode === 8) {
				arrayNumbers.pop();
			}
		}
		// if 10 numbers entered, allow for tab and backspace buttons to work
		// else do not allow other key values to be entered
		if (e.keyCode !== 8 && e.keyCode !== 9) {
			e.preventDefault();
		}

	}, false);

	/******end exercise  5******/
	/**********************exercise 6***********************************************************************
	 * this function checks that both phone and email address are entered.
	 */

	function processForm(e) {
		// stop page from refreshing
		e.preventDefault();
		// set error to true, if errors value will be set to false
		var validData = true;

		// check if phone number field in correct format and id = phone( I probalby could do without double checking if id = phone)
		if (/(\d{3})-(\d{3})-(\d{4})/.test(form[18].value) && form[18].id == "phone") {
			// if no errors remove any error message
			form[18].nextElementSibling.innerHTML = "";
		} else {
			// if format not correct set error to false and display error message
			validData = false;
			form[18].nextElementSibling.innerHTML = "OOpps! Please enter a Phone number.";
		}

		// check if email field has a value and check if id = email( I probably do not need to check id = email)
		if (form[19].value === "" && form[19].id === "email") {
			// if email field empty set error to false and display error message
			form[19].nextElementSibling.innerHTML = "OOpps! Please enter an email address.";
			validData = false;
		} else {
			// if no errors remove any error message
			form[19].nextElementSibling.innerHTML = "";
		}

		// if no errors submit form and print a message
		if (validData) {
			// Submit the form
			$("aboutMe").innerHTML = "Form submitted!";
			$("aboutMe").classList.add("error");
		}

	}

	// add event listener to listen when form is submitted
	form.addEventListener("submit", processForm, false);

};
//END window onload