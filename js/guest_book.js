/****used to submite to guest book aaalso uses ajax_ajax_guestbook.php***/

/******Used for Guest Book********/
	$(function(){
	var guest_book = $('#guest_book');
	
	guest_book.submit(function(){
		
		//alert('hi');
		
		$.ajax({
			url:'/ajax/ajax_guest_book.php',
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
				    $('.left_side h3').html('Success');
				    $('#guest_book').html('Thank you for signing my guest book.');
				    $('#gb_error').html('');
			//	}else{
			//		$('#gb_error').html('OOppss System Error!');
				//}//END response
				
				
				}else if(response ==='error_1')
				{
					$('#gb_error').html('OOppss System Error!');
				}else if(response ==='error_2')
				{
					$('#gb_error').html('OOppss Please enter valid information');
				}else{
					$('#gb_error').html('OOppss System Error!');
				}//END IF
			 
			   //alert('hi');
				}//Success function
	
		
	 
				
				
		

		 	});//Ajax
		 	//alert('hi');
			return false;
			
	});//End of submit() function.
}); //Main anonymous function
