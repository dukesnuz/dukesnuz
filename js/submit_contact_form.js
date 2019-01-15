/*************************************************
 * * author: David Petringa
 * created: February 2017
 * submit_contact_form.js used with portfolio.html, submit_contact_form.js, portfolio_data.js files
 * /

 / *function validates form and sends data to PHP script
 * NOTE************ add reg expression to validate input data
 * function called from eventListener in window on load in filr portfolio.js
 */

function validateForm() {
	"use strict";
	var form = document.forms;
	var fn = form.contact.firstName.value;
	var ln = form.contact.lastName.value;
	var email = form.contact.email.value;
	var message = form.contact.message.value;
	var errors = [];

	if (/^[A-Z \.\-']{1,15}$/i.test(fn)) {
		$('fnError').innerHTML = " ";
		errors.splice(0, 0, false);
	} else {
		$('fnError').innerHTML = "Please enter a valid first name. Only letters, spaces, periods or hyphens.";
		errors.splice(0, 0, true);
	}

	if (/^[A-Z \.\-']{2,20}$/i.test(ln)) {
		$('lnError').innerHTML = " ";
		errors.splice(1, 0, false);
	} else {
		$('lnError').innerHTML = "Please enter a valid last name. Only letters, spaces, periods or hyphens.";
		errors.splice(1, 0, true);
	}

	if (/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/.test(email)) {
		$('eError').innerHTML = " ";
		errors.splice(2, 0, false);
	} else {
		$('eError').innerHTML = "Please enter a valid email in the format email@example.com";
		errors.splice(2, 0, true);
	}

	if (/^[A-Z 0-9 \,\.\-\?']{2,200}$/i.test(message)) {
		$('mError').innerHTML = " ";
		errors.splice(3, 0, false);
	} else {
		$('mError').innerHTML = "Please enter a max 200 character message. Only letters, numbers, spaces, commas, periods, hyphens or question marks.";
		errors.splice(3, 0, true);
	}

	// check if errors in array if all elements = false = no errors
	var checkForErrors = function(element, index, array) {
		return element === false;
	};

	if (errors.every(checkForErrors)) {
		// check for human entering data
		// to bypass checking for human comment it out and uncomment submit form
		checkifHuman(fn, ln, email, message);
		//submitForm(fn, ln, email, message);
	}

}//END Function

/*********************************************************************************************
 * check for human. function asks user for name of cuurent day. if correct call submitForm function
 * function called from validateForm
 * @param fn, ln, email, message
 */
function checkifHuman(fn, ln, email, message) {
	"use strict";
	var dayNames = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
	var dayNumber = new Date().getDay();
	var day = dayNames[dayNumber];
	var count = 0;

	var answer = prompt("What day of the week is today?");

	while (answer.toLowerCase() !== day && count <= 2) {
		//alert('OOppss! Today is not ' + answer + '. If you are a human, you have ' + (3 - count) + ' more times to try again.');
		answer = prompt('OOppss! Today is not ' + answer + '. If you are a human, you have ' + (3 - count) + ' more times to try again.');
		count++;
	}
	//if correct day entered submit form
	if (answer.toLowerCase() == day && count <= 2) {
		submitForm(fn, ln, email, message);

	}
}

/*biuld ajax function here to submit form data
 * @param fn, ln, email, message
 * called from called from checkifHuman
 * ajax call is sending data to a php script
 */
function submitForm(fn, ln, email, message) {
	"use strict";
	//create ajax object from my library
	var ajax = getXmlHttpRequest();

	ajax.addEventListener("readystatechange", function() {

		if (ajax.readyState === 4) {
			if ((this.response !== "error") && (ajax.status >= 200 && ajax.status < 300) || (ajax.status == 304)) {
				// clear error if one was previosuly printed
				errorPrint('formResponse', '<br>Your message was not recieved. Please email me at hello@dukesnuz.com');
				// PHP script will return one of the following
				//echo 'true';
				//echo 'error_1';
				//echo 'error_2';

				var response = this.response;
				// check for errors
				if (this.response == "true") {
					printSuccess(fn);
				} else {
					errorPrint('formResponse', '<br>Your message was not recieved. Please email me at hello@dukesnuz.com');
				}

			} else {
				errorPrint('formResponse', '<br>Your message was not recieved. Please email me at hello@dukesnuz.com');
			} //END if ((this.response !== "error")
		} // END if (ajax.readyState === 4)
	}, false);

	var data = ['first_name=' + fn, 'last_name=' + ln, 'email=' + email, 'message=' + message];
	ajax.open('POST', '../ajax/ajax_contact.php', true);
	ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	ajax.send(data.join('&'));

}// END ajax request

/***********************************
 * upon successful message sent display success message and hide contact form
 * @param firstName
 * function is called form ajax form submission upon successfully sent message
 */
function printSuccess(firstName) {
	"use strict";
	var form = document.forms.contact;
	form.style.display = "none";
	var formResponse = $('formResponse');
	formResponse.innerHTML = "";
	var p = document.createElement('p');
	var text = document.createTextNode('Success ! ' + firstName + ' Thank you for contacting me. I will respond back swiftly.');
	formResponse.appendChild(p);
	p.appendChild(text);
} // END

