// JavaScript Document

<!-- below used for live help--->

$(document).ready(function() {
	$(".popup").fancybox({
		padding: 4,
		width: '65%',
		height: '75%',
		overlayColor:'#60f',
		overlayOpacity: .99,
		transitionIn: 'elastic',
		transitionOut: 'elastic',
		easingIn:   'easeInBounce',
		easingOut: 'easeOutSine'
		
	});
}); // end ready

$(document).ready(function() {
	$(".comment").fancybox({
		padding: 4,
		width: '65%',
		height: '95%',
		overlayColor:'#00FF00',
		overlayOpacity: .5,
		transitionIn: 'elastic',
		transitionOut: 'elastic',
		easingIn:   'easeInBounce',
		easingOut: 'easeOutSine'
		
	});
}); // end ready




<!--below used for menus--->

$(document).ready(function(){
	$('#chapters1').hide();// hide chapters
	$('#chapters2').hide();// hide chapters
	$('#chapters3').hide();// hide chapters
	$('#chapters4').hide();// hide chapters
	$('#chapters5').hide();// hide chapters
	$('#chapters6').hide();// hide chapters
	$('#chapters7').hide();// hide chapters
	$('#chapters8').hide();// hide chapters
	$('#chapters9').hide();// hide chapters
}); //end ready function



$(document).ready(function(){
$('#submenu1').hover(
				 function(){	
			$('#submenu1').css('background-color' ,'blue');
			$('#submenu2').css('background-color' ,'blue');
			$('#submenu3').css('background-color' ,'blue');
			
			$('#submenu1').css('width' ,'300');
			$('#submenu2').css('width' ,'300');
			$('#submenu3').css('width' ,'300');
			
		   // $('#submenu1').css('z-index' ,'2');
			//$('#submenu2').css('z-index' ,'2');
			$('#message1').html("Date Page Created");
			$('#message2').html("");
			$('#message3').html("");
			
			$('#chapters1').show(1500);
				 }, //end mouseover		  
				 function(){
			$('#submenu1').css('background-color' ,'#F60');
			$('#submenu2').css('background-color' ,' #600');
			$('#submenu3').css('background-color' ,'#060');
			
		    $('#submenu1').css('width' ,'300');
			$('#submenu2').css('width' ,'300');
			$('#submenu3').css('width' ,'300');
			
			$('#chapters1').hide(1500);
			//$('#submenu2').css('z-index' ,'1');
		    //$('#submenu1').css('z-index' ,'1');
			//$('#submenu2').css('z-index' ,'1');
			 
			 $('#message1').html("Chapters Date Page Created");
			 $('#message2').html("Chapters 1-3");
			 $('#message3').html("Chapters 4-6");
				 } // end mouseout
			); //end hover
				   }); // end ready




$(document).ready(function(){
$('#submenu2').hover(
				 function(){	
			$('#submenu1').css('background-color' ,'purple');
			$('#submenu2').css('background-color' ,'purple');
			$('#submenu3').css('background-color' ,'purple');
			
			$('#submenu1').css('width' ,'300');
			$('#submenu2').css('width' ,'300');
			$('#submenu3').css('width' ,'300');
			
		   // $('#submenu1').css('z-index' ,'2');
			//$('#submenu2').css('z-index' ,'2');
			$('#message1').html("");
			$('#message2').html("Exercises &nbsp;&nbsp;||&nbsp;&nbsp; Just For Reference");
			$('#message3').html("");
			
			$('#chapters2').show(1500);
				 }, //end mouseover		  
				 function(){
			$('#submenu1').css('background-color' ,'#F60');
			$('#submenu2').css('background-color' ,'#600');
			$('#submenu3').css('background-color' ,'#060');
			
		    $('#submenu1').css('width' ,'300');
			$('#submenu2').css('width' ,'300');
			$('#submenu3').css('width' ,'300');
			
			//$('#submenu2').css('z-index' ,'1');
		    //$('#submenu1').css('z-index' ,'1');
			//$('#submenu2').css('z-index' ,'1');
			 $('#chapters2').hide(1500);
			 
			 $('#message1').html("Date Page Created");
			 $('#message2').html("Chapters 1-3");
			 $('#message3').html("Chapters 4-6");
				 } // end mouseout
			); //end hover
				   }); // end ready

$(document).ready(function(){
$('#submenu3').hover(
				 function(){
			$('#submenu1').css('background-color' ,'red');
			$('#submenu2').css('background-color' ,'red');
			$('#submenu3').css('background-color' ,'red');
			
			$('#submenu1').css('width' ,'300');
			$('#submenu2').css('width' ,'300');
			$('#submenu3').css('width' ,'300');
			
		   // $('#submenu1').css('z-index' ,'2');
			//$('#submenu2').css('z-index' ,'2');
			$('#message2').html("");
			$('#message3').html("Exercises &nbsp;&nbsp;||&nbsp;&nbsp; Just For Reference");
			$('#message1').html("");
			
			$('#chapters3').show(1500);
				 }, //end mouseover		  
				 function(){
			$('#submenu1').css('background-color' ,'#F60');
			$('#submenu2').css('background-color' ,'#600');
			$('#submenu3').css('background-color' ,'#060');
			
		    $('#submenu1').css('width' ,'300');
			$('#submenu2').css('width' ,'300');
			$('#submenu3').css('width' ,'300');
			
			//$('#submenu2').css('z-index' ,'1');
		    //$('#submenu1').css('z-index' ,'1');
			//$('#submenu2').css('z-index' ,'1');
			 $('#chapters3').hide(1500);
			 
			 $('#message1').html("Date Page Created");
			 $('#message2').html("Chapters 1-3");
			 $('#message3').html("Chapters 4-6");
				 } // end mouseout
			); //end hover
				   }); // end ready





<!-- second row---><!-- second row---><!-- second row---><!-- second row---><!-- second row---><!-- second row---><!-- second row--->
$(document).ready(function(){
$('#submenu4').hover(
				 function(){	
			$('#submenu4').css('background-color' ,'blue');
			$('#submenu5').css('background-color' ,'blue');
			$('#submenu6').css('background-color' ,'blue');
			
			$('#submenu4').css('width' ,'300');
			$('#submenu5').css('width' ,'300');
			$('#submenu6').css('width' ,'300');
			
		   // $('#submenu1').css('z-index' ,'2');
			//$('#submenu2').css('z-index' ,'2');
			
			$('#message4').html("Exercises &nbsp;&nbsp;||&nbsp;&nbsp; Just For Reference");
			$('#message5').html("");
			$('#message6').html("");
			
			$('#chapters4').show(1500);
				 }, //end mouseover		  
				 function(){
			$('#submenu4').css('background-color' ,'#FC0');
			$('#submenu5').css('background-color' ,'#0F0');
			$('#submenu6').css('background-color' ,'#F9F');
			
		    $('#submenu4').css('width' ,'300');
			$('#submenu5').css('width' ,'300');
			$('#submenu6').css('width' ,'300');
			
			//$('#submenu2').css('z-index' ,'1');
		    //$('#submenu1').css('z-index' ,'1');
			//$('#submenu2').css('z-index' ,'1');
			 $('#chapters4').hide(1500);
			 
			 $('#message4').html("Chapter 7-8");
			 $('#message5').html("Chapter 9-10");
			 $('#message6').html("Chapter 11-12");
				 } // end mouseout
			); //end hover
				   }); // end ready




$(document).ready(function(){
$('#submenu5').hover(
				 function(){	
			$('#submenu4').css('background-color' ,'purple');
			$('#submenu5').css('background-color' ,'purple');
			$('#submenu6').css('background-color' ,'purple');
			
			$('#submenu4').css('width' ,'300');
			$('#submenu5').css('width' ,'300');
			$('#submenu6').css('width' ,'300');
			
		   // $('#submenu1').css('z-index' ,'2');
			//$('#submenu2').css('z-index' ,'2');
			$('#message4').html("");
			$('#message5').html("Exercises &nbsp;&nbsp;||&nbsp;&nbsp; Just For Reference");
			$('#message6').html("");
			
			$('#chapters5').show(1500);
				 }, //end mouseover		  
				 function(){
			$('#submenu4').css('background-color' ,'#FC0');
			$('#submenu5').css('background-color' ,'#0F0');
			$('#submenu6').css('background-color' ,'#F9F');
			
		    $('#submenu4').css('width' ,'300');
			$('#submenu5').css('width' ,'300');
			$('#submenu6').css('width' ,'300');
			
			//$('#submenu2').css('z-index' ,'1');
		    //$('#submenu1').css('z-index' ,'1');
			//$('#submenu2').css('z-index' ,'1');
			$('#chapters5').hide(1500);
			
			 $('#message4').html("Chapter 7-8");
			 $('#message5').html("Chapter 9-10");
			 $('#message6').html("Chapter 11-12");
				 } // end mouseout
			); //end hover
				   }); // end ready

$(document).ready(function(){
$('#submenu6').hover(
				 function(){
			$('#submenu4').css('background-color' ,'red');
			$('#submenu5').css('background-color' ,'red');
			$('#submenu6').css('background-color' ,'red');
			
			$('#submenu4').css('width' ,'300');
			$('#submenu5').css('width' ,'300');
			$('#submenu6').css('width' ,'300');
			
		   // $('#submenu1').css('z-index' ,'2');
			//$('#submenu2').css('z-index' ,'2');
			$('#message4').html("");
			$('#message5').html("");
			$('#message6').html("Exercises &nbsp;&nbsp;||&nbsp;&nbsp; Just For Reference");
			$('#chapters6').show(1500);
				 }, //end mouseover		  
				 function(){
			$('#submenu4').css('background-color' ,'#FC0');
			$('#submenu5').css('background-color' ,'#0F0');
			$('#submenu6').css('background-color' ,'#F9F');
			
		    $('#submenu4').css('width' ,'300');
			$('#submenu5').css('width' ,'300');
			$('#submenu6').css('width' ,'300');
			
			//$('#submenu2').css('z-index' ,'1');
		    //$('#submenu1').css('z-index' ,'1');
			//$('#submenu2').css('z-index' ,'1');
			$('#chapters6').hide(1500);
			
			$('#message4').html("Chapter 7-8");
			$('#message5').html("Chapter 9-10");
			$('#message6').html("Chapter 11-12");
				 } // end mouseout
			); //end hover
				   }); // end ready





<!-- third row---><!-- third row---><!-- third row---><!-- third row---><!-- third row---><!-- third row---><!-- third row--->
$(document).ready(function(){
$('#submenu7').hover(
				 function(){	
			$('#submenu7').css('background-color' ,'blue');
			$('#submenu8').css('background-color' ,'blue');
			$('#submenu9').css('background-color' ,'blue');
			
			$('#submenu7').css('width' ,'300');
			$('#submenu8').css('width' ,'300');
			$('#submenu9').css('width' ,'300');
			
		   // $('#submenu1').css('z-index' ,'2');
			//$('#submenu2').css('z-index' ,'2');
			
			$('#message7').html("Exercises &nbsp;&nbsp;||&nbsp;&nbsp; Just For Reference");
			$('#message8').html("");
			$('#message9').html("");
			$('#chapters7').show(1500);
				 }, //end mouseover		  
				 function(){
			$('#submenu7').css('background-color' ,'#60F');
			$('#submenu8').css('background-color' ,'#C3F');
			$('#submenu9').css('background-color' ,'#C36');
			
		    $('#submenu7').css('width' ,'300');
			$('#submenu8').css('width' ,'300');
			$('#submenu9').css('width' ,'300');
			
			//$('#submenu2').css('z-index' ,'1');
		    //$('#submenu1').css('z-index' ,'1');
			//$('#submenu2').css('z-index' ,'1');
			 
			 $('#chapters7').hide(1500);
			 
			 $('#message7').html("Chapter 13-14");
			 $('#message8').html("Chapter 15");
			 $('#message9').html("Chapter 99");
				 } // end mouseout
			); //end hover
				   }); // end ready




$(document).ready(function(){
$('#submenu8').hover(
				 function(){	
			$('#submenu7').css('background-color' ,'purple');
			$('#submenu8').css('background-color' ,'purple');
			$('#submenu9').css('background-color' ,'purple');
			
			$('#submenu7').css('width' ,'300');
			$('#submenu8').css('width' ,'300');
			$('#submenu9').css('width' ,'300');
			
		   // $('#submenu1').css('z-index' ,'2');
			//$('#submenu2').css('z-index' ,'2')\
			$('#message7').html("");
			$('#message8').html("Exercises &nbsp;&nbsp;||&nbsp;&nbsp; Just For Reference");
			$('#message8').html("");
			$('#chapters8').show(1500);
				 }, //end mouseover		  
				 function(){
			$('#submenu7').css('background-color' ,'#60F');
			$('#submenu8').css('background-color' ,'#C3F');
			$('#submenu9').css('background-color' ,'#C36');
			
		    $('#submenu7').css('width' ,'300');
			$('#submenu8').css('width' ,'300');
			$('#submenu9').css('width' ,'300');
			
			//$('#submenu2').css('z-index' ,'1');
		    //$('#submenu1').css('z-index' ,'1');
			//$('#submenu2').css('z-index' ,'1');
			$('#chapters8').hide(1500);
			
			 $('#message7').html("Chapter 13-14");
			 $('#message8').html("Chapter 15");
			 $('#message9').html("Chapter 99");
				 } // end mouseout
			); //end hover
				   }); // end ready

$(document).ready(function(){
$('#submenu9').hover(
				 function(){
			$('#submenu7').css('background-color' ,'red');
			$('#submenu8').css('background-color' ,'red');
			$('#submenu9').css('background-color' ,'red');
			
			$('#submenu7').css('width' ,'300');
			$('#submenu8').css('width' ,'300');
			$('#submenu9').css('width' ,'300');
			
		   // $('#submenu1').css('z-index' ,'2');
			//$('#submenu2').css('z-index' ,'2');
			$('#message7').html("");
			$('#message8').html("");
			$('#message9').html("");
			
			$('#chapters9').show(1500);
			
				 }, //end mouseover		  
				 function(){
			$('#submenu7').css('background-color' ,'#60F');
			$('#submenu8').css('background-color' ,'#C3F');
			$('#submenu9').css('background-color' ,'#C36');
			
		    $('#submenu7').css('width' ,'300');
			$('#submenu8').css('width' ,'300');
			$('#submenu9').css('width' ,'300');
			
			//$('#submenu2').css('z-index' ,'1');
		    //$('#submenu1').css('z-index' ,'1');
			//$('#submenu2').css('z-index' ,'1');
			
			$('#chapters9').hide(1500);
			
			 $('#message7').html("Chapter 13-14");
			 $('#message8').html("Chapter 15");
			 $('#message9').html("Chapter 99");
				 } // end mouseout
			); //end hover
				   }); // end ready
