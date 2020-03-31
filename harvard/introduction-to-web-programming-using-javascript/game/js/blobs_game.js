/******************************************************************************************************
 * CSCI E - 3 -Introduction to Web Programming Using JavaScript  - Final Project - Fall 2016
 * Teaching Fellow = JaZahn Clevenger
 * Student = David Petringa
 * Thank you for checking my work. I hope you enjoy.
 * blobs_game.js
 * last updated 12/33333333333333333333333000000000000000000000000000/16
 * This page is a recent addition to the final project - not submitted
 ******************************************************************************************************/

//Set speeds and number of blob
// maybe not a good idea to use constants in javascript, wanted to experiment with constants
const BLOB_SPEED = 100;
const ROTATE_SPEED = 15;
const BLOB_COUNT = 10;
/******************************************************************************************************
 * draws the blobs and makes them move. using a second canvas element for the blobs
 */
function game() {
	"use strict";
	
	// clear score
	displayScore(undefined, 'start');

	var canvas = document.getElementById("game");
	var ctx = canvas.getContext('2d');
	var xCenter = ctx.canvas.width / 2;
	var yCenter = ctx.canvas.height / 2;
	//center
	ctx.beginPath();
	ctx.moveTo(xCenter - 10, 250);
	ctx.lineTo(xCenter + 10, 250);
	ctx.stroke();
	ctx.beginPath();
	ctx.moveTo(300, yCenter - 10);
	ctx.lineTo(300, yCenter + 10);
	ctx.stroke();

	function Blob(x, y) {
		this.x = x;
		this.y = y;
	}


	Blob.prototype.draw = function() {
		ctx.beginPath();
		ctx.strokeStyle = "red";
		ctx.lineWidth = "10px";
		ctx.arc(this.x, this.y, 5, 0, Math.PI + (Math.PI * 3) / 2, 0);
		ctx.fillStyle = "red";
		ctx.fill();
		ctx.stroke();
	};

	/*https://www.mathsisfun.com/algebra/trig-finding-side-right-triangle.html
	https://www.mathsisfun.com/algebra/trig-finding-angle-right-triangle.html
	http://www.analyzemath.com/Geometry_calculators/right_triangle_calculator.html
	var radian = (180/ Math.PI) */
	/*******************************************************************************************
	 * function using the hypothesis of a right triangle, each move is decreasing the hypotenuse
	 * and recalculating the opposite and adjacent sides of the right triangle
	 */
	Blob.prototype.move = function() {

		var x = this.x >= 300 ? this.x - 300 : 300 - this.x;
		var y = this.y >= 250 ? this.y - 250 : 250 - this.y;
		//console.log("X" + x + "y" + y);
		// check when one blob hits center and end game
		if ((this.x).toFixed(0) == 300 && (this.y).toFixed(0) == 250) {
			displayScore(undefined, 'end');
		}

		// angle of x and y
		var radian = Math.atan2(y, x);
		var angle = radian * (180 / Math.PI);

		// get hypotenuse
		var s = Math.sin(radian);
		var h = y / s;

		// subtract 1 from h and recalculate x and y
		h = h - 1;

		// get x
		x = Math.cos(radian) * h;
		this.x = this.x >= 300 ? x + 300 : 300 - x;
		// get y
		y = Math.tan(radian) * x;
		this.y = this.y >= 250 ? y + 250 : 250 - y;

	};
	/********************************************************************************
	 * function creates blobs. uses constant to determine number of blobs to create, store blobs in an array
	 */
	var blobs = (function() {
		var blobs = [];
		for (var i = 0; i < BLOB_COUNT; i++) {
			blobs[i] = new Blob(Math.random() * 600, Math.random() * 500);
		}
		return blobs;
	})();

	/**************************************************************************************
	 * function draws and moves each blob in the blob array
	 */
	var animateBlobs = function() {
		blobs.forEach(function(blob) {
			blob.draw();
			blob.move();
		});
	};

	/*******************************************************************************************
	 * set blob speed using constant, calls anumateBlobs function which draws and moves blobs
	 */
	var animate = setInterval(function() {
		ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
		animateBlobs();
	}, BLOB_SPEED);

	/**************************************************************************************************
	 * on click check id cursor hit a blob, if yes set blob to x and y positions off canvas so they appear deleted
	 * if a hit call displayScore to add to score
	 * @param {Object} e
	 */
	var hit = function(e) {
		blobs.forEach(function(blob) {
			if ((e.layerX >= blob.x - 5 && e.layerX <= blob.x + 5) && (e.layerY >= blob.y - 5 && e.layerY <= blob.y + 5)) {
				ctx.clearRect(blob.x - 10, blob.y - 10, 20, 20);
				blob.x = -10000;
				blob.y = -10000;
				displayScore(blobs);
			} //END if
		});
		//END blobs.forEach
	};

	canvas.addEventListener("click", hit, false);

};//END game function

// variable is polluting...outside a function in global context ... not good
// so I figured I would wrap it in an annonymous function
(function() {
	return count = 0;
})();

/***********************************************************************************************
 * called when a click hits a blob, rotatation back to origin and a blob hits center of canvas
 * displays score and rsets count and clears both canvases
 * @param {Object} blobs
 * @param {Object} status
 */
function displayScore(blobs, status) {
	"use strict";
	var score = document.querySelectorAll("#score p");

	if (blobs == undefined && status == "end") {
		score[0].textContent = "You Lost ! Score " + count;
		count = 0;
		clearCanvas('map');
		clearCanvas('game');
	} else if (blobs == undefined && status == "start") {
		score[0].textContent = "Score ";
		count = 0;
	} else {

		count++;
		if (count < blobs.length) {
			score[0].textContent = count;
		} else if (count == blobs.length) {
			score[0].textContent = "You Won ! Score " + count;
			clearCanvas('map');
			clearCanvas('game');
		} else {
			score[0].textContent = "OOppss ! Error";
			clearCanvas('map');
			clearCanvas('game');
		}
	}
};

