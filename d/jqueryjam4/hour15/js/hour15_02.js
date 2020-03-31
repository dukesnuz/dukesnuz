function failure(){
  alert("Login Failed");
  }
function success(){
  alert("Login Succeeded");
  //i added
  var name= $("#user").val();
  $("header h1").html(name + " LOGIN is a SUCCESS!");
  $("header h2").html("Welcome to jQuery jAM 4 @ Boston PHP");
  //$("header h1").html(name );
  $("header h1").css('color', '#FFFF11');
  $("header h2").css('color', '#FF09C6');
  }
function always(){
  alert("Login Attempt Completed");
  }
 
 
 function login(){
   $.get("php/login.php",
     $("#loginForm").serialize() ).done(success).fail(failure).always(always);
	 return false;
	}

	$(document).ready(function(){
	 $("#loginButton").click(login);
    });
	 