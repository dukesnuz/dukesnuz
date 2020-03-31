
//Script 15.3 or 15.4 page 470= - calculator.js
//this script is included in 15_01_test.html

//do something when document is ready
$(document).ready(function(){
     $('#calculator').submit(function(){
	 	//initialize variable
		var quantity, price, tax, total;
		     //validate the quantity
		     if($('#quantity').val() > 0){
			 quantity = $('#quantity').val();
			 }else{
			  alert('Please enter a valid quantity!');
			  }
			   //validate price
			 if($('#price').val() > 0){
			 price = $('#price').val();
			 }else{
			 alert('Please enter a valid price!');
			 }
			 //validate tax
			 if($('#tax').val() > 0){
			 tax = $('#tax').val();
			 }else{
			 alert('Please enter a valid tax!');
			 }
			 //if all 3 have valud values perform calculation
			 if(quantity && price && tax){
			 total = quantity * price;
			 total += total * (tax/100);
			 //report total
			 alert('The total is $' + total);
			 }
			 return false
			 
	 });//end of form submission
}); //end ready
