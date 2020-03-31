/******************************************************************************************************
 * ***NOTE****NOTE***STORAGE FILE ONLY FILE NOT BEING USED OR SUBMITTED FOR A GRADE********************
 * *********** ONLY USED TO SAVE CODE I DO NOT WANT TO DELETE ... but probably should********************
 *
 * CSCI E - 3 -Introduction to Web Programming Using JavaScript  - Final Project - 
 * Teaching Fellow = JaZahn Clevenger
 * Student = David Petringa
 *
 * csci_e_3_final_storage.js
 * 
 ******************************************************************************************************/

/***
 *originally I was using an image, changed it to css background image so I could use canvas on it
 */
//var lat = 34.17;
//var lon = -118.83;
//console.log("ZOOM" + zoom);
// url on page
//var mapSpot = $('map');
//mapSpot.innerHTML = "";
//var img = document.createElement('img');
//mapSpot.appendChild(img);
//img.src = "https://www.mapquestapi.com/staticmap/v4/getmap?size=600,500&type=map&pois=orange_1-," + lat + "," + lon + "|&zoom=" + zoom + "&scalebar=true&center=" + lat + "," + lon + "&imagetype=JPEG&key=KpNU0EM6WRrqqxuTdx9B4cdUYYnhtArS";
//  img.setAttribute('alt', "Map of " + returned[value].name + ", "+returned[value].state_abbreviation);

/********************************
 * canvas center
 */

/*
 * center
 ctx.beginPath();
 ctx.moveTo(0, 75);
 ctx.lineTo(300, 75);
 ctx.stroke();

 ctx.beginPath();
 ctx.moveTo(150, 0);
 ctx.lineTo(150, 250);
 ctx.stroke();

 */
/*******for open and closing sextions
 *replaces with swith
 *       /*
		if (e.target.id === "mFavoritePlaces") {
			$('favoritePlaces').style.display = "inherit";
		} s done
		if (e.target.id === "mSignup") {
			$('signupForm').style.display = "inherit";
		} s.done
		if (e.target.id === "mFavoriteColor") {
			$('favoriteColor').style.display = "inherit";
		} s.done
		console.log(e.target.id); //"fPClose";
		///close   favoritePlaces  === "favoritePlaces"
		//getElementsByClassName("close")[0].parentElement = "favoritePlaces")
		if (e.target.id === "fPClose" ) {
			$('favoritePlaces').style.display = "none";
			$('favoritePlaces').getElementsByClassName("close")[0].innerHTML = "DDDDDDDD";
		} s done
		
		if (e.target.id === "suClose" ) {
			$('signupForm').style.display = "none";
		}s done
		
		 if (e.target.id === "suClose" ) {
			$('signupForm').style.display = "none";
		}s done
		
		*/ 
	/*
	background-image:url("https://www.mapquestapi.com/staticmap/v4/getmap?key=KpNU0EM6WRrqqxuTdx9B4cdUYYnhtArS&size=600,600&type=map&imagetype=jpg&zoom=10&scalebar=false&traffic=false&center=34.17,-118.83&xis=https://s.aolcdn.com/os/mapquest/yogi/icons/poi-active.png,1,c,40.015831,-105.27927&ellipse=fill:0x70ff0000|color:0xff0000|width:2|40.00,-105.25,40.04,-105.30");
	*/
	
var createStateSelect = function() {
	"use strict";
	//sort object and create and array
/*
	var array = [];
	if ( typeof states === 'object') {
	for (var key in states) {
		array.push([key, states[key]]);
	}
	var name = [];
	var value = [];
	// sort array & split array into to 2 arrays
	var arraySorted = array.sort();
	for (var i = 0; i < arraySorted.length; i++) {
		name.push(arraySorted[i][1]);
		value.push(arraySorted[i][0]);
	}
} //END if ( typeof returned === 'object') {
	// call the MakeSelectList function passing in the 2 arrays and location
	makeSelectList(name, value, 'selectState');
*/

//turn usState object into an 2 arrays one for abbreviations and one or state name

var array11 = [];
var array22 = [];
for (var key in usStates) {
		array11.push(usStates[key].name);
		array22.push(usStates[key].abbreviation);
	}
	
makeSelectList(array11, array22, 'selectState');


/****************************state
 *
var states = {
  AL : 'Alabama',
  AK : 'Alaska',
  AS : 'America Samoa',
  AZ : 'Arizona',
  AR : 'Arkansas',
  CA : 'California',
  CO : 'Colorado',
  CT : 'Connecticut',
  DE : 'Delaware',
  DC : 'District of Columbia',
  FM : 'Micronesia',
  FL : 'Florida',
  GA : 'Georgia',
  GU : 'Guam',
  HI : 'Hawaii',
  ID : 'Idaho',
  IL : 'Illinois',
  IN : 'Indiana',
  IA : 'Iowa',
  KS : 'Kansas',
  KY : 'Kentucky',
  LA : 'Louisiana',
  ME : 'Maine',
  MH : 'Marshall Islands',
  MD : 'Maryland',
  MA : 'Massachusetts',
  MI : 'Michigan',
  MN : 'Minnesota',
  MS : 'Mississippi',
  MO : 'Missouri',
  MT : 'Montana',
  NE : 'Nebraska',
  NV : 'Nevada',
  NH : 'New Hampshire',
  NJ : 'New Jersey',
  NM : 'New Mexico',
  NY : 'New York',
  NC : 'North Carolina',
  ND : 'North Dakota',
  OH : 'Ohio',
  OK : 'Oklahoma',
  OR : 'Oregon',
  PW : 'Palau',
  PA : 'Pennsylvania',
  PR : 'Puerto Rico',
  RI : 'Rhode Island',
  SC : 'South Carolina',
  SD : 'South Dakota',
  TN : 'Tennessee',
  TX : 'Texas',
  UT : 'Utah',
  VT : 'Vermont',
  VI : 'Virgin Island',
  VA : 'Virginia',
  WA : 'Washington',
  WV : 'West Virginia',
  WI : 'Wisconsin',
  WY : 'Wyoming'
};
 
 */
/****** old function to build states select list********/
var createStateSelect = function() {
	"use strict";
	//turn usState object into 2 arrays one for abbreviations and one for state name
	var arrayName = [];
	var arrayValue = [];
	for (var key in usStates) {
		arrayName.push(usStates[key].name);
		arrayValue.push(usStates[key].abbreviation);
	}

	//makeSelectList(arrayName, arrayValue, 'selectState');

};
};


//**** was in ajax return to build city list
		// create the initial list of cities retrieved for each state call
				//sort object and create and create 2 new arrays for select name &  value
				/*var array = [];
               
				//check for object
				if ( typeof returned === 'object') {
					for (var key in returned) {
						array.push([returned[key].name, key]);
						 //console.log(returned[key]);
					}
				
					var name = [];
					var value = [];
					// sort array & split array into to 2 arrays
					var arraySorted = array.sort();
					for (var i = 0; i < arraySorted.length; i++) {
						name.push(arraySorted[i][0]);
						value.push(arraySorted[i][1]);
					}
					// create 2nd select with new arrays
					// change style to display 2nd select
					$('selectCity').style.display = 'block';*/
					makeCitiesSelect(returned);
        
					// clear error code if one from previous search
					errorPrint('output', 'noError');
					// return the object to be used elsewhere
					return returned;

				//} else {
				//	errorPrint('output', 'Could not get cities 1');
				//} //END check if object
				
/*******************************************************
 * creates select options. takes 3 arguments. to have value = i(position) use undefined as 2nd parameter when
 * calling the function
 * @param {Object} selName = array of select names to populate options
 * @param {Object} valName = array of select names to use as values or undefined will have value be i
 * @param {Object} loc = id for location of select location
 */
function makeSelectList(selName, valName, loc) {
	"use strict";

	if (selName && loc) {
		// call the removeSelect function to clear any previouse options created
		removeSelect($('selectCity'));
		$(loc).innerHTML = "<option value = 0>Make a selection</option>";
		var len = selName.length;
		//var selNameS = selName;

		for (var i = 0; i < len; i++) {
			var optionNew = document.createElement('option');
			var text = document.createTextNode(selName[i]);
			optionNew.value = (valName === undefined) ? i : valName[i];
			optionNew.appendChild(text);
			$(loc).appendChild(optionNew);
			//console.log(selName[i]);
		} //END for llop
	} //END if(selName && loc)
};//END function

/********************************old editCanvas function *************/
function editCanvas(value) {
	"use strict";
    
	var canvas = $('map');
	if (canvas.getContext) {
		var ctx = canvas.getContext('2d');
		if (value) {
			var city = returned[value].name;
			var state = returned[value].state_name;
			var height = ctx.canvas.height;
			var width = ctx.canvas.width;
			var heightHalf = (ctx.canvas.height)/2;
           	var widthHalf = (ctx.canvas.width)/2;
			/*
			ctx.strokeStyle = '#006400';
			ctx.lineWidth = '1';

			ctx.moveTo(width/2, 0);
			ctx.lineTo(width/2, height);
			ctx.stroke();

			ctx.beginPath();
			ctx.moveTo(0, height/2);
			ctx.lineTo(width, height/2);
			ctx.stroke();
			ctx.beginPath();
			//ctx.moveTo(0, (height/2) + spin);
			//ctx.lineTo(width, (height/2) - spin);
			//ctx.stroke();*/
			//spin = spin + 1;

			//console.log("add state");
			var start = height;
			var start2 = width;
			var start3 = height;
			var start4 = height / 2;
			var start5 = 0;
			var start6 = width / 2;
			var start7 = 0;
			var start8 = height / 2;
            
          
			(function rotate() {
                 console.log(width);
                 //console.log(city);
			    //ctx.font = "2em comic sans ms";
				// ctx.fillText(city + ', ' + state, 60, 60);

				//ctx.moveTo(width / 2, height / 2);
				// ctx.clearRect(0, 0, 600, 500);
				if (start === height && start2 > 0) { 

					ctx.beginPath();
					ctx.strokeStyle = "rgba(0, 102, 0, .1)";
					ctx.lineWidth = "1px";
					ctx.font = "2em comic sans ms";
					ctx.fillText(city + ', ' + state, 60, 60);
					ctx.moveTo(widthHalf, heightHalf);
					
					ctx.lineTo(start2, height);
					ctx.stroke();
					start2 = start2 - 1;
                     
					//console.log("corner2" + start2);
				}
                  
				if (start2 === 0 && start3 > 0) {
					ctx.beginPath();
					ctx.strokeStyle = "rgba(0, 102, 0, .1)";
					ctx.lineWidth = "1px";
					ctx.font = "2em comic sans ms";
					ctx.fillText(city + ', ' + state, 60, 60);
					ctx.moveTo(widthHalf, heightHalf);

					ctx.lineTo(0, start3);
					ctx.stroke();
					start3 = start3 - 1;

					//	console.log("corner3" + start3);
				}
                
				if (start3 === 0 && start5 < widthHalf) {
					ctx.beginPath();
					ctx.strokeStyle = "rgba(0, 102, 0, .1)";
					ctx.lineWidth = "1px";
					ctx.font = "2em comic sans ms";
					ctx.fillText(city + ', ' + state, 60, 60);
					ctx.moveTo(widthHalf, heightHalf);

					ctx.lineTo(start5, 0);
					ctx.stroke();
					start5 = start5 + 1;

					console.log("corner5" + start5);
				}
                
				if (start5 === widthHalf && start6 < width) {
					ctx.beginPath();
					ctx.strokeStyle = "rgba(0, 102, 0, .1)";
					ctx.lineWidth = "1px";
					ctx.font = "2em comic sans ms";
					ctx.fillText(city + ', ' + state, 60, 60);
					ctx.moveTo(widthHalf, heightHalf);

					ctx.lineTo(start6, 0);
					ctx.stroke();
					start6 = start6 + 1;
					console.log("corner6" + start6);
				}

				if (start6 === width && start7 < heightHalf) {
					ctx.beginPath();
					ctx.strokeStyle = "rgba(0, 102, 0, .1)";
					ctx.lineWidth = "1px";
					ctx.font = "2em comic sans ms";
					ctx.fillText(city + ', ' + state, 60, 60);
					ctx.moveTo(widthHalf, heightHalf);

					ctx.lineTo(width, start7);
					ctx.stroke();
					start7 = start7 + 1;
					console.log("corner7" + start7);
				}

				if (start7 === heightHalf && start8 < height) {
					ctx.beginPath();
					ctx.strokeStyle = "rgba(0, 102, 0, .1)";
					ctx.lineWidth = "1px";
					ctx.font = "2em comic sans ms";
					ctx.fillText(city + ', ' + state, 60, 60);
					ctx.moveTo(widthHalf, heightHalf);
					//ctx.moveTo(width / 2, height / 2);

					ctx.lineTo(width, start8);
					ctx.stroke();
					start8 = start8 + 1;
					//	console.log("corner8" + start8);

				}

				// clear and start over

				if (start8 === 500) {
					start2 = width;
					start3 = height;
					start4 = height / 2;
					start5 = 0;
					start6 = width / 2;
					start7 = 0;
					start8 = height / 2;
					ctx.clearRect(0, 0, 600, 500);
					console.log("clear variables");
				}//END if (start8 === 500) {
				var run = setTimeout(rotate, 5);
				//clearTimeout(rotate);
				//ctx.clearRect(0, 0, ctx.canvas.height, ctx.canvas.width);
			
			})();
			 
            
     	}
	}
};


 * function mapquest
 * @param {Object} val
 * <img src= "https://www.mapquestapi.com/staticmap/v4/getmap?key=KpNU0EM6WRrqqxuTdx9B4cdUYYnhtArS&size=600,600&type=map&imagetype=jpg&zoom=10&scalebar=false&traffic=false&center=34.17,-118.83&xis=https://s.aolcdn.com/os/mapquest/yogi/icons/poi-active.png,1,c,40.015831,-105.27927&ellipse=fill:0x70ff0000|color:0xff0000|width:2|40.00,-105.25,40.04,-105.30" />
 * key  KpNU0EM6WRrqqxuTdx9B4cdUYYnhtArS
 * //img.src = "https://www.mapquestapi.com/staticmap/v4/getmap?key=KpNU0EM6WRrqqxuTdx9B4cdUYYnhtArS&size=600,600&type=map&imagetype=jpg&zoom=10&scalebar=false&traffic=false&center=" + lat + "," + lon + "&xis=https://s.aolcdn.com/os/mapquest/yogi/icons/poi-active.png,1,c,40.015831,-105.27927&ellipse=fill:0x70ff0000|color:0xff0000|width:2|40.00,-105.25,40.04,-105.30";
 * <img src= "https://www.mapquestapi.com/staticmap/v4/getmap?key=KpNU0EM6WRrqqxuTdx9B4cdUYYnhtArS&size=600,600&type=map&imagetype=jpg&zoom=10&scalebar=false&traffic=false&center=34.17,-118.83&xis=https://s.aolcdn.com/os/mapquest/yogi/icons/poi-active.png,1,c,40.015831,-105.27927&ellipse=fill:0x70ff0000|color:0xff0000|width:2|40.00,-105.25,40.04,-105.30" />
 * */





function traverseHide(element) {
   
	//var h = element.getElementsByClassName('hidden');
	//console.log(h);
	//for (var i = 0; i < h.length; i++) {
		
		//h[i].style.display = "none";
	//}
    if(element.className == "hidden"){
    	//console.log(h);
       element.style.display = "none";
     	console.log("found");
    }
	for (var k = 0; k < element.children.length; k++) {
		traverseHide(element.children[k]);
	}
}//END function traverseHide

/**************************************************************
 * example of traverse function finds all elements with a classname of hidden and displays them
 * @param {Object} element
 */

function traverseShow(element) {

	var h = document.getElementsByClassName('hidden');
	for (var i = 0; i < h.length; i++) {
		h[i].style.display = "block";
	}

	for (var k = 0; k < element.children.length; k++) {
		traverseShow(element.children[k]);
	}
}//END function traverseShow

		//END blobs.forEach
		console.log(blobs.length);
		if (count < blobs.length) {
		var canvasMap = document.getElementById("map");
	    var ctxMap = canvasMap.getContext('2d');
		ctxMap.beginPath();
		ctxMap.strokeStyle = "rgba(0, 102, 0, .1)";
		ctxMap.lineWidth = "1px";
		ctxMap.font = "2em comic sans ms";
		ctxMap.clearRect(425, 31, 45, 30);
		ctxMap.fillText("Score " + count, 360, 60);
		ctxMap.stroke();
		} else {
		ctx.beginPath();
		ctx.strokeStyle = "rgba(0, 102, 0, .1)";
		ctx.lineWidth = "1px";
		ctx.font = "2em comic sans ms";
		ctx.fillText("You Won !", 60, 60);
		//ctx.fillStyle = "#000000";
	   // ctx.fill();
		ctx.stroke();
		clearCanvas();
		count = "";
		}

