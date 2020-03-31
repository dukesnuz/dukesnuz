/**
 * @author David
 */
 

$(document).ready(function(){

      $("#set").click(function(e)
	  {setCookie($("#cookieName").val(), $("#cookieValue").val(), 1); });
	  $("#get").click(function(e)
	  {getCookie($("#cookieName").val() );});
	  $("#delete").click(function(e)
	  {setCookie($("#cookieName").val(), "", -1) ;});
	  displayCookies();
});



function setCookie(name, value, days){
		 var date= new Date();
		 date.setTime(date.getTime()+(days*24*60*60*1000));
		 
		 var expires = "; expires ="+date.toGMTString();
		 document.cookie = name + "=" + value + expires + "; path=/";
		 displayCookies;
		 //reload page
	     location.reload();
}




function getCookie(name){
  var cookieStr = $("#cookieName").val() + "=";
  var cArr= document.cookie.split(';');
  for( var i=0; i < cArr.length; i++)
  {
      var cookie = cArr[i];
      while (cookie.charAt(0)==' ')
       {
       cookie = cookie.substring(1, cookie.length);
       }
           if(cookie.indexOf(cookieStr) ==0)
           {
           $("#cookieValue").val(cookie.substring(cookieStr.length, cookie.length))
           break;
		   }
		}
  }
  

  


  
function displayCookies(){
		 $("#cookieList").html("<li>Cookies will display here.</li>");
		 var cArr = document.cookie.split(';');
		    for(var i=0; i< cArr.length; i++)
		    {
		    var cookie = cArr[i];
		        //if no cookie do not display the dot
		         if(cookie.length != 0)
		           {
		           $("#cookieList").append($("<li></li>").html(cookie));
		           } 
		      }
		
		 }


