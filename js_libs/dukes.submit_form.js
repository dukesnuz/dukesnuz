/*************************************************
 *function validate form adn send data to PHP script
 */

function validateForm(e) {
	"use strict";
	e.preventDefault();

	var form = document.forms;
	var fn = form.contact['firstName'].value;
	var ln = form.contact['lastName'].value;
	var email = form.contact['email'].value;
	var message = form.contact['message'].value;
	var errors = [];

	if (fn < 1) {
		$('fnError').innerHTML = "Please enter a valid first name.";
		errors.splice(0, 0, true);
	} else {
		$('fnError').innerHTML = " ";
		errors.splice(0, 0, false);
	}

	if (ln < 1) {
		$('lnError').innerHTML = "Please enter a valid last name.";
		errors.splice(1, 0, true);
	} else {
		$('lnError').innerHTML = " ";
		errors.splice(1, 0, false);
	}

	if (email < 1) {
		$('eError').innerHTML = "Please enter a valid email.";
		errors.splice(2, 0, true);
	} else {
		$('eError').innerHTML = " ";
		errors.splice(2, 0, false);
	}

	if (message < 1) {
		$('mError').innerHTML = "Please enter a valid message.";
		errors.splice(3, 0, true);
	} else {
		$('mError').innerHTML = " ";
		errors.splice(3, 0, false);
	}

	// check if errors in array if all elements = false = no errors
	var checkForErrors = function(element, index, array) {
		return element == false;
	};
	if (errors.every(checkForErrors)) {
		console.log('no errors');
		//submit form call ajax function from here
		console.log(fn);
		submitForm(fn, ln, email, message);
	}

};//END Function

// biuld ajax function here to submit form data
function submitForm(fn, ln, email, message) {
	"use strict";

	console.log("submitForm");

	//create ajax object from my library
	var ajax = getXmlHttpRequest();

	ajax.addEventListener("readystatechange", function() {

		if (ajax.readyState === 4) {
			if ((this.response !== "error") && (ajax.status >= 200 && ajax.status < 300) || (ajax.status == 304)) {
				// clear error if one was previosuly printed
				errorPrint('formResponse', '<br>Your message was not recieved. Please email me at hello@dukesnuz.com');
				//echo 'true';
				//echo 'error_1';
				//echo 'error_2';
				//else error
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
	//if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['message']) &&
	//ajax.open('POST', '../ajax/ajax_contact.php?first_name='+ fn +'&last_name='+ ln +'&email='+ email +'&message='+ message +'');

	var data = ['first_name=' + fn, 'last_name=' + ln, 'email=' + email, 'message=' + message];
	console.log(data);
	ajax.open('POST', '../ajax/ajax_contact.php', true);
	ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

	ajax.send(data.join('&'));

};// END ajax request

/***********************************
 * upon successful message sent display success message and hide contact form
 * @param firstName
 * function is called form ajax form submission upon successfully sent message
 */
function printSuccess(firstName) {
	"use strict";
	var form = document.forms['contact'];
	form.style.display = "none";
	var formResponse = $('formResponse');
	formResponse.innerHTML = "";
	var p = document.createElement('p');
	var text = document.createTextNode('Success ! ' + firstName + ' Thank you for contacting me. I will respond back swiftly.');
	formResponse.appendChild(p);
	p.appendChild(text);
};// END

