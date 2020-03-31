// Script 15.10 - login.js
$(document).ready(function(){
//$(function(){

$('.errorMessage').hide(); //hide error messages

$('#login').submit(function(){ //listen for sumbit click
   var email, password; //initialize 2 variables
	   
	 //   //validate email address
	    if($('#email').val().length >=6){
		email = $('#email').val();
		$('#emailP').removeClass('error');
		$('#emailError').hide();
		}else{
		$('#emailP').addClass('error');
		$('#emailError').show();
		}
	//	//validate password
		if($('#password').val().length > 0){ //0 used here as placeholder but can use number for min characters
	    password= $('#password').val();
		$('#passwordP').removeClass('error');
		$('#passwordError').hide();
		}else{
		$('#passwordP').addClass('error');
		$('#passwordError').show();
		}
	//	//if both values recieved , store them in a new object
	if(email && password){
		var data = new Object();
		data.email = email;
		data.password = password;
		
		//create new object for ajax options
		var options = new Object();
		options.data = data;
		options.dataType = 'text';
		options.type = 'get';
		
    	//define what should happen in successful ajax requesrt
		  options.success = function(response){
		     //response ="CORRECT";
		    if(response =='CORRECT'){
	        //if(4>1){
		        $('#login').hide();
		        $('#results').removeClass('error');
		        $('#results').text('You are now logged in!');
		      
			   // if server response = incorrect
		        }else if(response == 'INCORRECT'){
		        $('#results').text('The submitted credentials do not match those on file');
				$('#results').addClass('error');
				 
				 }else if (response == 'INCOMPLETE'){
				//}else if(2>1){
				 $('#results').text('Please provide an email address and password');
				 $('#results').addClass('error');
				 
				 }else if (response == 'INVALID_EMAIL'){
				 //}else if (4>1){
				 $('#results').text('Please provide your email address!');
				 $('#results').addClass('error');
				 }
			}; //end of options success
				// // add the url property and make the request
			       //options.url = '15_09_login_ajax.php';  see notes on this page
				   options.url = 'login_ajax.php';
				 $.ajax(options);
				 
				
  }  //end of email and password if
				 return false; //prevent an actual form submission

  }); // end submit function
   


}); //end ready