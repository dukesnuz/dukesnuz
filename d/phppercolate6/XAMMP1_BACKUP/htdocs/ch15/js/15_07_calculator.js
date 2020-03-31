
//Script 15.3 or 15.4 page 470= - calculator.js
//this script is included in 15_01_test.html

//do something when document is ready
$(document).ready(function(){
     $('.errorMessage').hide();//hide error message
     $('#calculator').submit(function(){
	   //i added next 2 lines
	   $('#results').html('<p>Clear results from last submission.</p><p>Class added red text.</p>');//clear results from previous submit
	   
	   $('#results').addClass('error'); //add class to cleared results
	    //end i added
		
	 	//initialize variable
		var quantity, price, tax, total;
		     ////validate the quantity
		     if($('#quantity').val() > 0){
			 quantity = $('#quantity').val();
			
			 $('#quantityP').removeClass('error'); //clear an error, if one existed
			 $('#quantityError').hide();//hide an error, if one existed
			 
			 }else{
			 
			  $('#quantityP').addClass('error'); //invalid quantity Add error class
			  $('#quantityError').show(); //show error message
			  
			  }
			   ////validate price
			 if($('#price').val() > 0){
			 price = $('#price').val();
			 
			 $('#priceP').removeClass('error'); //clear an error, if one existed
			 $('#priceError').hide(); //hide an error, if one existed
			 
			 }else{
			 
		     $('#priceP').addClass('error'); //invalid price Add error class
			 $('#priceError').show(); //show error message
			 
			 }

			////validate tax
			 if($('#tax').val() > 0){
			 tax = $('#tax').val();
			 
			 $('#taxP').removeClass('error'); //clear an error, if one existed
			 $('#taxError').hide(); //hide an error
			 
			 }else{
			 
			 $('#taxP').addClass('error'); //invalid price Add error class
			 $('#taxError').show(); //show error message
			 
			 }
			 //if all 3 have valud values perform calculation
			 if(quantity && price && tax){
			 total = quantity * price;
			 total += total * (tax/100);
			 //display results
			 $('#results').html('The total is <b>$' + total + '</b>.,<br />Class removed from previous submit.-red to black text.');
			 
			 //I added next line
			   $('#results').removeClass('error');
			 //end I added line
			 }
			 return false
			 
	 });//end of form submission
}); //end ready
