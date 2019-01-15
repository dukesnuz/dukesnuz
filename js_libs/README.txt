My Library
List of Library functions and what they do.

ajax calls - function returns ajax object - use ajax
getXmlHttpRequest()
------------------------------------------------------
return document.getElementById(id) - use $
var $ = function(id)
------------------------------------------------------
 * function prints error message
 * @param id id of the element to print the error
 * @param eCode a custom location or information about the error
 * using  "noError" for eCode clears the message on the page
var errorPrint = function(id, eCode) {
------------------------------------------------------
 * function biulds a vertical table table takes 2 arguments
 * @ param  obj data object
 * object looks like below
 * var object = {
 property : "value",
 };
 * @param location the id of the element
 ******************************/
function makeTable(obj, location) {
--------------------------------------------------------
 * function removes options previously created from the select menu
 * @param element
 */
function removeSelect(element) 
-------------------------------------------------------
/********************Form validation*************************************************************
 * function validates name, email and zip values and favorite color
 * @param inputIndex input index number
 * @param formValidated form to be validated
 *
 * checks the value against the input field that has focus
 * this value is coming from  the closure function. I probably do not need this extra check.
 * wanted to use closure. see closure function on csci_e_3 final_project.js
 * I tried to make this function reusable to be used on other forms.
 * I think it will as I have 2 forms on the HTML home page
 */

var formValidation = function(inputIndex, formValidated) 
--------------------------------------------------------

/***************************
 * function createLink(location, url, text)
 * function creates a href link with target = blank 
 */

