/************************************HED Extra Credit Assignemnt Two Fall 2016**********************************
 *  Teachiing Fellow:  JaZahn Clevenger
 *  Student: David Petringa
 *  Thank you for checking my work.
 *  Last updated 11/2222222222222222444444444444444444444444444444444444/16
 ****************************************************************************************************************/

/***********************
 * creates a dynamic menu using the theDom object titles
 *
 */

var createMenu = function() {
	var menu = document.getElementById("menu");
	// create an ul element and assign it to the variable newUL
	var newUL = document.createElement("ul");
	// append the newUL to the menu div
	menu.appendChild(newUL);
	var key;
	// loop through the objects and build the ul list
	// title characters are concverted to uppercase
	for (key in theDom) {
		if ( typeof theDom === 'object') {
			var newLI = document.createElement("li");
			newUL.appendChild(newLI);
			var list = document.createTextNode(theDom[key].title.toUpperCase());
			newLI.appendChild(list);
			newLI.setAttribute("id", key);
			// I know there is anoter way to attach an event handler to eact list item
			// I simply could not figure it out.
			// this just looks convoluted to me
			newLI.addEventListener("click", function(e) {
				if (theDom[e.target.id].printIt) {
					theDom[e.target.id].printIt();
				}
			}, false);
		} //END if(typeof)
	} //END for(key)
};

/*********************
 *  on page load display dom description
 * create menu 
 **********************/
window.onload = function() {
	if (theDom.domData) {
		// using dot notation to access the function property in the object
		theDom.domData.printIt();
		// call the createMenu function to build the dynamic menu
		createMenu();
	}
}; 

