/**
 * @author David
 */
		
function onloadHandler(){
	var employee = document.getElementById("Employee");
	employee.addEventListener('click', simpleClick, false);
	var registered = document.getElementById("Registered");
	registered.addEventListener('click', eventClick, false);
	//var exercise_02 = document.getElementById("Registered");
	//exercise_02.addEventListener('click', simpleclick, false);
	//below ex 02
	var exercise_02 = document.getElementById("Exercise_02");
	exercise_02.addEventListener('click', simpleclick, false);
}

function simpleClick(e){
  var cb = document.getElementById("check"+e.target.id);
  cb.click();
}

function eventClick(e){
	var event = document.createEvent("MouseEvents");
	event.initMouseEvent("click", true, true, window, 0,0,0,0,0, false, false,false,false, 0,null);
	var cb = document.getElementById("check"+e.target.id);
	cb.dispatchEvent(event);
}
//i added below for ex 02
function simpleclick(e){
 
}
//i aded beloe for ex 02
function simpleclick(e){
  var cb = document.getElementById("checkRegistered");
  var cbb = document.getElementById("checkEmployee");
cb.click();
cbb.click();
}
