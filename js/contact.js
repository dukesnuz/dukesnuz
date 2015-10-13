
/******************ALso uses pages  contact.php, contact.inc.html, ajax_contact.php contact.js********/
/******Used for Guest Book********/
	$(function(){
	var contact= $('#contact');
	
	contact.submit(function(){
		//alert ('hi');
		
		$.ajax({
			url:'/ajax/ajax_contact.php',
			type:'POST',
			dataType:'text',
			data:{
					first_name 	:$('#first_name').val(),
					last_name  	:$('#last_name').val(),
					email 		:$('#email').val(),
					message	:$('#message').val()
			     },
	
					
			success:function(response){
				
		    	if(response ==='true')
				{
				    $('h1').html('');
				    $('#contact').html('<h2>Thank you for contacting me.</h2><h2>I will respond back shortly.</h2>');
				    $('#contact_error').html('');
			//	}else{
			//		$('#gb_error').html('OOppss System Error!');
				//}//END response
				
				
				}else if(response ==='error_1')
				{
					$('#contact_error').html('OOppss System Error!');
				}else if(response ==='error_2')
				{
					$('#contact_error').html('OOppss Please enter valid information');
				}else{
					$('#contact_error').html('OOppss System Error!');
				}//END IF
			 
			   //alert('hi');
				}//Success function
	
		
	 
				
				
		

		 	});//Ajax
		 	//alert('hi');
			return false;
			
	});//End of submit() function.
}); //Main anonymous function
