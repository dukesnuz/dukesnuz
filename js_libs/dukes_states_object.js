/******************************************************************************************************
 * CSCI E - 3 -Introduction to Web Programming Using JavaScript  - Final Project - Fall 2016
 * Teaching Fellow
 * Student = David Petringa
 * Thank you for checking my work. I hope you enjoy.
 * dukes_states_object.js
 * last updated 12/11111111111555555555555/16
 *
 * data from this url.. just seemed easier and it is just a simple object of states and abbreviations
 * http://adamkinney.com/blog/2012/04/25/list-of-us-states-in-javascript-object-notation/
 */

/******************************************************
 * states and abbreviations
 */

var usStates = [{
	name : 'ALABAMA',
	abbreviation : 'AL'
}, {
	name : 'ALASKA',
	abbreviation : 'AK'
}, {
	name : 'AMERICAN SAMOA',
	abbreviation : 'AS'
}, {
	name : 'ARIZONA',
	abbreviation : 'AZ'
}, {
	name : 'ARKANSAS',
	abbreviation : 'AR'
}, {
	name : 'CALIFORNIA',
	abbreviation : 'CA'
}, {
	name : 'COLORADO',
	abbreviation : 'CO'
}, {
	name : 'CONNECTICUT',
	abbreviation : 'CT'
}, {
	name : 'DELAWARE',
	abbreviation : 'DE'
}, {
	name : 'FLORIDA',
	abbreviation : 'FL'
}, {
	name : 'GEORGIA',
	abbreviation : 'GA'
}, {
	name : 'GUAM',
	abbreviation : 'GU'
}, {
	name : 'HAWAII',
	abbreviation : 'HI'
}, {
	name : 'IDAHO',
	abbreviation : 'ID'
}, {
	name : 'ILLINOIS',
	abbreviation : 'IL'
}, {
	name : 'INDIANA',
	abbreviation : 'IN'
}, {
	name : 'IOWA',
	abbreviation : 'IA'
}, {
	name : 'KANSAS',
	abbreviation : 'KS'
}, {
	name : 'KENTUCKY',
	abbreviation : 'KY'
}, {
	name : 'LOUISIANA',
	abbreviation : 'LA'
}, {
	name : 'MAINE',
	abbreviation : 'ME'
}, {
	name : 'MARYLAND',
	abbreviation : 'MD'
}, {
	name : 'MASSACHUSETTS',
	abbreviation : 'MA'
}, {
	name : 'MICHIGAN',
	abbreviation : 'MI'
}, {
	name : 'MINNESOTA',
	abbreviation : 'MN'
}, {
	name : 'MISSISSIPPI',
	abbreviation : 'MS'
}, {
	name : 'MISSOURI',
	abbreviation : 'MO'
}, {
	name : 'MONTANA',
	abbreviation : 'MT'
}, {
	name : 'NEBRASKA',
	abbreviation : 'NE'
}, {
	name : 'NEVADA',
	abbreviation : 'NV'
}, {
	name : 'NEW HAMPSHIRE',
	abbreviation : 'NH'
}, {
	name : 'NEW JERSEY',
	abbreviation : 'NJ'
}, {
	name : 'NEW MEXICO',
	abbreviation : 'NM'
}, {
	name : 'NEW YORK',
	abbreviation : 'NY'
}, {
	name : 'NORTH CAROLINA',
	abbreviation : 'NC'
}, {
	name : 'NORTH DAKOTA',
	abbreviation : 'ND'
}, {
	name : 'OHIO',
	abbreviation : 'OH'
}, {
	name : 'OKLAHOMA',
	abbreviation : 'OK'
}, {
	name : 'OREGON',
	abbreviation : 'OR'
}, {
	name : 'PALAU',
	abbreviation : 'PW'
}, {
	name : 'PENNSYLVANIA',
	abbreviation : 'PA'
}, {
	name : 'PUERTO RICO',
	abbreviation : 'PR'
}, {
	name : 'RHODE ISLAND',
	abbreviation : 'RI'
}, {
	name : 'SOUTH CAROLINA',
	abbreviation : 'SC'
}, {
	name : 'SOUTH DAKOTA',
	abbreviation : 'SD'
}, {
	name : 'TENNESSEE',
	abbreviation : 'TN'
}, {
	name : 'TEXAS',
	abbreviation : 'TX'
}, {
	name : 'UTAH',
	abbreviation : 'UT'
}, {
	name : 'VERMONT',
	abbreviation : 'VT'
}, {
	name : 'VIRGIN ISLANDS',
	abbreviation : 'VI'
}, {
	name : 'VIRGINIA',
	abbreviation : 'VA'
}, {
	name : 'WASHINGTON',
	abbreviation : 'WA'
}, {
	name : 'WASHINGTON DC',
	abbreviation : 'DC'
}, {
	name : 'WEST VIRGINIA',
	abbreviation : 'WV'
}, {
	name : 'WISCONSIN',
	abbreviation : 'WI'
}, {
	name : 'WYOMING',
	abbreviation : 'WY'
}];

/***********************************************************************************
 * checking if makeTable(object, location)  function works with other objects
 * making a table in right side bar
 * function is being called from csci_e_3_final_project.js file
 * function located in csci_e_3_final_project_library.js file
 * just a simple object literal
 */
var directions = {
	Description: "Compass Headings",
	North : "N",
	NorthEast : "NE",
	SouthEast : "SE",
	East : "E",
	South : "S",
	SouthWest : "SW",
	West : "W",
	NorthWest : "NW"
};