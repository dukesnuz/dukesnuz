$(document).ready(function(){
   setTimeout(continueNotify, 3000);
   setInterval(displayTime, 1000);
   //setInterval(border, 4000);
   //setInterval(border1, 3000);
});
/*
function border(){
//$("#clock").css('color','red');
$("#clock").css('border-color','#8A2BE2');
}
function border1(){
//$("#clock").css('color','red');
$("#clock").css('border-color','#00FF00');
}

*/
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