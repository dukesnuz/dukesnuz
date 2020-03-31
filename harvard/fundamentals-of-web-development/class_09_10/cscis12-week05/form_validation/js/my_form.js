$(document).ready(function() {
	/*console.log('hi');*/
	$("#my_form").validate({
		rules : {
			fname : {
				required : true,
				minlength : 1
			},
			email : {
				required : true,
				email : true
			},
			comments : {
				required : true
			}
		}, //end rules

		messages : {
			fname : "Please enter your name",
			email : "Please enter your valid email.",
			comments : "Please leave us an amazing comment."
		},
		errorPlacement : function(error, element) {
			/*console.log('error');*/
			error.insertAfter(element);
		},
	});
	//end validate

	/**I was not sure if there is another way to clear form with jQuery form validator.**/
	$('#clear').click(function(e) {
		console.log('clear');
		$('#my_form').trigger('reset');
		/**I think there is a better way to clear all the ids in  a form. to save time researching I listed each one**/
		$('#fname-error, #email-error, #comments-error').remove();
		e.preventDefault();
	});
	//end clear

});
//end document ready