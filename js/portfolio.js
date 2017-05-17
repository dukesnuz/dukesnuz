/*********
 * author: David Petringa
 * created: February 2017
 *
 *portfolio.js used with portfolio.html, submit_contact_form.js, portfolio_data.js files
 *
 */

/**************************************
 * function creates the header- my name
 * @param nameId
 */

var createHeader = function(nameId) {
	"use strict";
	var arrayLetter = "David Petringa".split('');
	var count = 0;

	var speed = setInterval(function() {
		if (count <= arrayLetter.length - 1) {
			var letter = document.createTextNode(arrayLetter[count]);
			nameId.appendChild(letter);
			count++;
		} else {
			clearInterval(speed);
			createSlogan();
		}

	}, 500);
};

/************************************************************************
 * function creates slogan  and adds styles to slogan
 */
function createSlogan() {
	"use strict";
	var arrayLetter = "Front-End Web Developer With PHP Knowledge".slice('');
	var count = 0;
	var sloganId = $('slogan');
	var h = sloganId.getElementsByTagName('h2')[0];

	/*
	 var speed = setInterval(function() {
	 if (count <= arrayLetter.length - 1) {
	 var letter = document.createTextNode(arrayLetter[count]);
	 sloganId.appendChild(letter);
	 count++;
	 sloganId.style.width = (count * 16) + 'px';
	 sloganId.style.backgroundColor = '#0C4EBE';
	 sloganId.style.color = '#ffffff';
	 } else {
	 $('slogan').style.width = "350px";
	 $('slogan').style.padding = "5px 5px 5px 10px";
	 clearInterval(speed);
	 }

	 }, 500);
	 }
	 */
	var speed = setInterval(function() {
		if (count <= arrayLetter.length - 1) {
			var letter = document.createTextNode(arrayLetter[count]);
			h.appendChild(letter);
			count++;
			h.style.width = (count * 16) + 'px';
			h.style.backgroundColor = '#0C4EBE';
			h.style.color = '#ffffff';
		} else {
			h.style.width = "99%";
			h.style.padding = ".5%";
			h.style.margin = "auto";
			h.style.textAlign = "center";
			clearInterval(speed);
		}

	}, 500);
}

/***********************************
 * function displays data for each image.
 * @param  imageDescriptions
 * function is called when an image mouseover event
 */
var showDescription = function(imageDescriptions) {
	"use strict";
	var desc = document.getElementsByClassName('imageDescription');
	var li = desc[0].getElementsByTagName('li');

	if (imageDescriptions) {
		var title = document.createTextNode(imageDescriptions.title);
		li[0].innerHTML = "";
		li[0].appendChild(title);

		var description = document.createTextNode(imageDescriptions.description);
		li[1].innerHTML = "";
		li[1].appendChild(description);

		var comment = document.createTextNode(imageDescriptions.comment);
		li[2].innerHTML = "";
		li[2].appendChild(comment);

		var link = imageDescriptions.link;
		$('descLink').textContent = "";
		createLink("descLink", link, "View");

	} // END if(imageDescriptions){
};

/************************************************************
 * function prints links to files used for this app. links printed in footer
 * uses my library function = function createLink(location, url, text)
 */

var printFilelinks = function() {
	createLink("codedPages1", "../styles/portfolio_mobile.css", "CSS Portfolio Mobile");
	createLink("codedPages1", "../styles/portfolio_desktop.css", "CSS Portfolio Desktop");
	createLink("codedPages2", "../css_libs/dukes_normalize.css", "CSS Normailze");
	createLink("codedPages3", "../js/portfolio.js", "JavaScript Portfolio");
	createLink("codedPages4", "../js/portfolio_data.js", "JavaScript Portfolio Data");
	createLink("codedPages5", "../js/submit_contact_form.js", "JavaScript Portfolio Contact Form");
	createLink("codedPages6", "../js_libs/dukes.javascript.js", "JavaScript Library");
};

window.onload = function() {
	/********************************************************************
	 * attach event listener to contact form
	 * make sure a human is using the contact form. ask what day today is
	 * @param e
	 * call validate form
	 */
	$('contact').addEventListener('submit', function(e) {
		e.preventDefault();
		validateForm();

	}, true);

	// call create header function
	var nameId = $('name');
	createHeader(nameId);

	// attatch event listener to image menu
	// @param e and grab id of image to use to select object
	// call showDescription and pass in id as argument
	var menu = document.getElementsByClassName('imageMenu');
	menu[0].addEventListener('mouseover', function(e) {
		showDescription(imageDescriptions[e.target.id]);
	}, 'false');

	// print links in footer
	printFilelinks();

	/* used to test contact form
	 var form = document.forms;
	 form.contact['firstName'].value = "David";
	 form.contact['lastName'].value = "Petringa";
	 form.contact['email'].value = "david@ajaxtransport.com";
	 form.contact['message'].value = "message here";
	 */
};
