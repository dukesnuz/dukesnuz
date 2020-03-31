/**
 * @author David
 */


$(document).ready(function(){
   setTimeout(continueNotify, 3000);
   setInterval(displayTime, 1000);
});

function continueNotify(){
   //var result = confirm("Do you wish to continue\nto receive notifications?");
   var response =window.prompt("Continue? Enter any value..press OK...Enter a 0 stop the pop  prompt.");
 //if(result == true)
   if(response ==0)
   {
   alert("Pop up notification has been stopped");
   }else{
  // setTimeout(continueNotify, 3000);
    setTimeout(continueNotify, response*1000)
    alert("Notification has been reset to:" + response +"seconds");
   }
}
function padNumber(num){
  if (num<10){ return "0"+num; }
  return num;
}
function displayTime(){
  var date = new Date();
  $("#clock").html(padNumber(date.getHours()) +":"+ 
               padNumber(date.getMinutes()) +":"+ 
               padNumber(date.getSeconds()));
}

