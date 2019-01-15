/**
 * @author David
 */


$(document).ready(function(){
   setTimeout(continueNotify, 3000);
   setInterval(displayTime, 1000);
   setInterval(border, 2500);
   setInterval(border1, 5000);
   setInterval(background,2500);
   setInterval(background1,5000);
   setInterval(title,2500);
   setInterval(title1,5000);
   setInterval(click,2500);
   setInterval(click1,5000);
});
function border(){
//$("#clock").css('color','red');
$("#clock").css('border-color','#D3D3D3');
}
function border1(){
//$("#clock").css('color','red');
$("#clock").css('border-color','#00008B');
}
function background(){
	$("body").css('background-image','-moz-linear-gradient(90% 70%, black, white');
	$("body").css('background-image','-0-linear-gradient(90% 70%, black, white');
	$("body").css('background-image','-webkit-linear-gradient(90% 70%, black, white');
	$("body").css('background-image','-ms-linear-gradient(90% 70%, black, white');
	$("body").css('background-image','linear-gradient(90% 70%, black, white');
}
function background1(){
	$("body").css('background-image','-moz-linear-gradient(90% 70%, blue, white');
	$("body").css('background-image','-o-linear-gradient(90% 70%, blue, white');
	$("body").css('background-image','-webkit-linear-gradient(90% 70%, blue, white');
	$("body").css('background-image','-ms-linear-gradient(90% 70%, blue, white');
	$("body").css('background-image','-linear-gradient(90% 70%, blue, white');
//background-image:linear-gradient( 40% 60%, #FFD700,#FF00FF 50%, #191970 50%, #FF00FF,#FFD700);
}
function title(){
	$(".title").html('The Clock');
}
function title1(){
	$(".title").html('At DukesNuz');
}

function click(){
	$(".tweet").html('CLICK HERE').css('color','white');
}

function click1(){
	$(".tweet").html('TO TWEET THIS PAGE').css('color','red');
}


//
function continueNotify(){
   //var result = confirm("Do you wish to continue\nto receive notifications?");
   var result = 'true';
   if(result == true)
   {
   setTimeout(continueNotify, 3000);
   }
}

function padNumber(num){
  if (num<10){ return "0"+num; }
  return num;
}


/*
 function displayTime(){
  var date = new Date();
  $("#clock").html(padNumber(date.getHours()) +":"+ 
               padNumber(date.getMinutes()) +":"+ 
               padNumber(date.getSeconds()));
}
padNumber(date.getHours())
*/

function displayTime(){
  var date = new Date();
  if(date.getHours()>12)
  {
  var hour = date.getHours() -12;
  var ampm = 'PM';
  }else{
   var hour = date.getHours() ;
   var ampm = 'AM';
  }
  $("#clock").html( hour +":"+ 
               padNumber(date.getMinutes()) +":"+ 
               padNumber(date.getSeconds()) +"  "+
               ampm
               );
}