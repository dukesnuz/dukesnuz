/*utilites.js
 * I wanted to create a library page to practice writing code that is reusable
 created by: David Petringa
 last updated 11/000000000000000006666666666666666/16
 */


/********************************
 * A function grabbing document.getElementById(id)
 * This has to be the coolest function !
 */

var $ = function(id) {
	'use strict';
	if ( typeof id != 'undefined') {
		return document.getElementById(id);
	}
};