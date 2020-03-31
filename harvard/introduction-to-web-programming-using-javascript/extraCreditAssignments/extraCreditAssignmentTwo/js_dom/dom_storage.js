/**************************************************************************************************************************************
 * storage file only ....... Not foe use
 * I figured out how to add the click event to  work with each item on the list.  the below was the not right way
 * 
 */
var createMenu = function() {
	var newUL = document.createElement("ul");
	menu.appendChild(newUL);

	for (key in theDom) {
		var newLI = document.createElement("li");
		newUL.appendChild(newLI);
		var list = document.createTextNode(theDom[key].title.toUpperCase());
		newLI.appendChild(list);
		newLI.setAttribute("id", key);
		newLI.addEventListener("click", function(e) {
			setOutputText(e);
		}, false);
	}
};

/***********************************************************************************
 * sets new text when a button on the menu is clicked. I know there is a more efficient way of attaching click handlers
 * to each menu button. I just could not figure it out. I know we have done simiiar assignments in class.
 * This function takes one parameter the e for the event
 * @param e
 *
 */

 function setOutputText(e) {
 console.log(e);
 if (e.target) {
 if (e.target === domData) {
 theDom.domData.printIt();
 }

 if (e.target === htmlData) {
 theDom.htmlData.printIt();
 }

 if (e.target === headData) {
 theDom.headData.printIt();
 }

 if (e.target === titleData) {
 theDom.titleData.printIt();
 }

 if (e.target === titleTextData) {
 theDom.titleTextData.printIt();
 }

 if (e.target === docElementData) {
 theDom.docElementData.printIt();
 }

 if (e.target === docBodyData) {
 theDom.docBodyData.printIt();
 }

 if (e.target === bodyData) {
 theDom.bodyData.printIt();
 }

 if (e.target === divData) {
 theDom.divData.printIt();
 }

 if (e.target === data) {
 theDom.data.printIt();
 }

 if (e.target === ul) {
 theDom.ul.printIt();
 }
 if (e.target === liWarning) {
 theDom.liWarning.printIt();
 }

 if (e.target === li) {
 theDom.li.printIt();
 }
 if (e.target === divTop) {
 theDom.divTop.printIt();
 }
 if (e.target === warning) {
 theDom.warning.printIt();
 }
 if (e.target === topSecret) {
 theDom.topSecret.printIt();
 }
 }

 };
 