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
	//$('.chapter1').hide();// hide chapters
	$('.chapter2').hide();// hide chapters
	$('.chapter3').hide();// hide chapters
	$('.chapter4').hide();// hide chapters
	$('.chapter5').hide();// hide chapters
	$('.chapter6').hide();// hide chapters
	$('.chapter7').hide();// hide chapters
	$('.chapter8').hide();// hide chapters
	$('.chapter9').hide();// hide chapters
	$('.chapter10').hide();// hide chapters
	$('.chapter11').hide();// hide chapters
	$('.chapter12').hide();// hide chapters
	$('.chapter13').hide();// hide chapters
	$('.chapter14').hide();// hide chapters
	$('.chapter15').hide();// hide chapters
	$('.chapter16').hide();// hide chapters
	$('.chapter17').hide();// hide chapters
	$('.chapter18').hide();// hide chapters
	$('.chapter19').hide();// hide chapters
	$('.chapter20').hide();// hide chapters
	$('.chapter21').hide();// hide chapters
}); //end ready function



$(document).ready(function(){
$('#message1').toggle(
				 function(){	
			$('#submenu1').css('background-color' ,'blue');
			$('#submenu2').css('background-color' ,'blue');
			$('#submenu3').css('background-color' ,'blue');
			
			$('#submenu1').css('width' ,'300');
			$('#submenu2').css('width' ,'300');
			$('#submenu3').css('width' ,'300');
			
			$('#message1').html("Chapter 1");
			$('#message2').html("");
			$('#message3').html("");
			
			$('.chapter1').show(1500);
				 }, //end toggle	  
				 function(){
			$('#submenu1').css('background-color' ,'#F60');
			$('#submenu2').css('background-color' ,'#600');
			$('#submenu3').css('background-color' ,'#060');
			
		    $('#submenu1').css('width' ,'300');
			$('#submenu2').css('width' ,'300');
			$('#submenu3').css('width' ,'300');
			
			$('.chapter1').hide(1500);
			
			 $('#message1').html("Chapter 1");
			 $('#message2').html("Chapter 2");
			 $('#message3').html("Chapter 3");
				 } // end mouseout
			); //end hover
				   }); // end ready




$(document).ready(function(){
$('#message2').toggle(
				 function(){	
			$('#submenu1').css('background-color' ,'purple');
			$('#submenu2').css('background-color' ,'purple');
			$('#submenu3').css('background-color' ,'purple');
			
			$('#submenu1').css('width' ,'300');
			$('#submenu2').css('width' ,'300');
			$('#submenu3').css('width' ,'300');
			$('#message1').html("");
			$('#message2').html("Exercises");
			$('#message3').html("");
			
			$('.chapter2').show(1500);
				 }, //end mouseover		  
				 function(){
			$('#submenu1').css('background-color' ,'#F60');
			$('#submenu2').css('background-color' ,'#600');
			$('#submenu3').css('background-color' ,'#060');
			
		    $('#submenu1').css('width' ,'300');
			$('#submenu2').css('width' ,'300');
			$('#submenu3').css('width' ,'300');
		
			 $('.chapter2').hide(1500);
			 
			 $('#message1').html("Chapter 1");
			 $('#message2').html("Chapter 2");
			 $('#message3').html("Chapter 3");
				 } // end mouseout
			); //end hover
				   }); // end ready

$(document).ready(function(){
$('#message3').toggle(
				 function(){
			$('#submenu1').css('background-color' ,'red');
			$('#submenu2').css('background-color' ,'red');
			$('#submenu3').css('background-color' ,'red');
			
			$('#submenu1').css('width' ,'300');
			$('#submenu2').css('width' ,'300');
			$('#submenu3').css('width' ,'300');
			
			$('#message2').html("");
			$('#message3').html("Exercises");
			$('#message1').html("");
			
			$('.chapter3').show(1500);
				 }, //end mouseover		  
				 function(){
			$('#submenu1').css('background-color' ,'#F60');
			$('#submenu2').css('background-color' ,'#600');
			$('#submenu3').css('background-color' ,'#060');
			
		    $('#submenu1').css('width' ,'300');
			$('#submenu2').css('width' ,'300');
			$('#submenu3').css('width' ,'300');
			
			 $('.chapter3').hide(1500);
			 
			 $('#message1').html("Chapter 1");
			 $('#message2').html("Chapter 2");
			 $('#message3').html("Chapter 3");
				 } // end mouseout
			); //end hover
				   }); // end ready





<!-- second row---><!-- second row---><!-- second row---><!-- second row---><!-- second row---><!-- second row---><!-- second row--->
$(document).ready(function(){
$('#message4').toggle(
				 function(){	
			$('#submenu4').css('background-color' ,'blue');
			$('#submenu5').css('background-color' ,'blue');
			$('#submenu6').css('background-color' ,'blue');
			
			$('#submenu4').css('width' ,'300');
			$('#submenu5').css('width' ,'300');
			$('#submenu6').css('width' ,'300');
			
			$('#message4').html("Exercises");
			$('#message5').html("");
			$('#message6').html("");
			
			$('.chapter4').show(1500);
				 }, //end mouseover		  
				 function(){
			$('#submenu4').css('background-color' ,'#FC0');
			$('#submenu5').css('background-color' ,'#0F0');
			$('#submenu6').css('background-color' ,'#F9F');
			
		    $('#submenu4').css('width' ,'300');
			$('#submenu5').css('width' ,'300');
			$('#submenu6').css('width' ,'300');
			
			 $('.chapter4').hide(1500);
			 
			 $('#message4').html("Chapter 4");
			 $('#message5').html("Chapter 5");
			 $('#message6').html("Chapter 6");
				 } // end mouseout
			); //end hover
				   }); // end ready




$(document).ready(function(){
$('#message5').toggle(
				 function(){	
			$('#submenu4').css('background-color' ,'purple');
			$('#submenu5').css('background-color' ,'purple');
			$('#submenu6').css('background-color' ,'purple');
			
			$('#submenu4').css('width' ,'300');
			$('#submenu5').css('width' ,'300');
			$('#submenu6').css('width' ,'300');
			
		  
			$('#message4').html("");
			$('#message5').html("Exercises");
			$('#message6').html("");
			
			$('.chapter5').show(1500);
				 }, //end mouseover		  
				 function(){
			$('#submenu4').css('background-color' ,'#FC0');
			$('#submenu5').css('background-color' ,'#0F0');
			$('#submenu6').css('background-color' ,'#F9F');
			
		    $('#submenu4').css('width' ,'300');
			$('#submenu5').css('width' ,'300');
			$('#submenu6').css('width' ,'300');
			
			$('.chapter5').hide(1500);
			
			 $('#message4').html("Chapter 4");
			 $('#message5').html("Chapter 5");
			 $('#message6').html("Chapter 6");
				 } // end mouseout
			); //end hover
				   }); // end ready

$(document).ready(function(){
$('#message6').toggle(
				 function(){
			$('#submenu4').css('background-color' ,'red');
			$('#submenu5').css('background-color' ,'red');
			$('#submenu6').css('background-color' ,'red');
			
			$('#submenu4').css('width' ,'300');
			$('#submenu5').css('width' ,'300');
			$('#submenu6').css('width' ,'300');
			
		   
			$('#message4').html("");
			$('#message5').html("");
			$('#message6').html("Exercises");
			$('.chapter6').show(1500);
				 }, //end mouseover		  
				 function(){
			$('#submenu4').css('background-color' ,'#FC0');
			$('#submenu5').css('background-color' ,'#0F0');
			$('#submenu6').css('background-color' ,'#F9F');
			
		    $('#submenu4').css('width' ,'300');
			$('#submenu5').css('width' ,'300');
			$('#submenu6').css('width' ,'300');
			$('.chapter6').hide(1500);
			$('#message4').html("Chapter 4");
			$('#message5').html("Chapter 5");
			$('#message6').html("Chapter 6");
				 } // end mouseout
			); //end hover
				   }); // end ready





<!-- third row---><!-- third row---><!-- third row---><!-- third row---><!-- third row---><!-- third row---><!-- third row--->
$(document).ready(function(){
$('#message7').toggle(
				 function(){
			$('#submenu7').css('background-color' ,'red');
			$('#submenu8').css('background-color' ,'red');
			$('#submenu9').css('background-color' ,'red');
			
			$('#submenu7').css('width' ,'300');
			$('#submenu8').css('width' ,'300');
			$('#submenu9').css('width' ,'300');
			
		   
			$('#message7').html("Exercises");
			$('#message8').html("");
			$('#message9').html("");
			
			$('.chapter7').show(1500);
			
				 }, //end mouseover		  
				 function(){
			$('#submenu7').css('background-color' ,'#FC0');
			$('#submenu8').css('background-color' ,'#0F0');
			$('#submenu9').css('background-color' ,'#F9F');
			
		    $('#submenu7').css('width' ,'300');
			$('#submenu8').css('width' ,'300');
			$('#submenu9').css('width' ,'300');
			
			$('.chapter7').hide(1500);
			
			$('#message7').html("Chapter 7");
			$('#message8').html("Chapter 8");
			$('#message9').html("Chapter 9");
				 } // end mouseout
			); //end hover
				   }); // end ready



$(document).ready(function(){
$('#message8').toggle(
				 function(){	
			$('#submenu7').css('background-color' ,'purple');
			$('#submenu8').css('background-color' ,'purple');
			$('#submenu9').css('background-color' ,'purple');
			
			$('#submenu7').css('width' ,'300');
			$('#submenu8').css('width' ,'300');
			$('#submenu9').css('width' ,'300');
			
			$('#message7').html("");
			$('#message8').html("Exercises");
			$('#message9').html("");
			$('.chapter8').show(1500);
				 }, //end mouseover		  
				 function(){
			$('#submenu7').css('background-color' ,'#60F');
			$('#submenu8').css('background-color' ,'#C3F');
			$('#submenu9').css('background-color' ,'#C36');
			
		    $('#submenu7').css('width' ,'300');
			$('#submenu8').css('width' ,'300');
			$('#submenu9').css('width' ,'300');
			
		
			$('.chapter8').hide(1500);
			
			 $('#message7').html("Chapter 7");
			 $('#message8').html("Chapter 8");
			 $('#message9').html("Chapter 9");
				 } // end mouseout
			); //end hover
				   }); // end ready

$(document).ready(function(){
$('#message9').toggle(
				 function(){
			$('#submenu7').css('background-color' ,'red');
			$('#submenu8').css('background-color' ,'red');
			$('#submenu9').css('background-color' ,'red');
			
			$('#submenu7').css('width' ,'300');
			$('#submenu8').css('width' ,'300');
			$('#submenu9').css('width' ,'300');
			
		
			$('#message7').html("");
			$('#message8').html("");
			$('#message9').html("Exercises");
			
			$('.chapter9').show(1500);
			
				 }, //end mouseover		  
				 function(){
			$('#submenu7').css('background-color' ,'#60F');
			$('#submenu8').css('background-color' ,'#C3F');
			$('#submenu9').css('background-color' ,'#C36');
			
		    $('#submenu7').css('width' ,'300');
			$('#submenu8').css('width' ,'300');
			$('#submenu9').css('width' ,'300');

			
			$('.chapter9').hide(1500);
			
			 $('#message7').html("Chapter 7");
			 $('#message8').html("Chapter 8");
			 $('#message9').html("Chapter 9");
				 } // end mouseout
			); //end hover
				   }); // end ready

				   
	
	<!-- start of 4 th row--><!-- start of 4 th row--><!-- start of 4 th row--><!-- start of 4 th row-->
$(document).ready(function(){
$('#message10').toggle(
				 function(){
			$('#submenu10').css('background-color' ,'#B8860B');
			$('#submenu11').css('background-color' ,'#B8860B');
			$('#submenu12').css('background-color' ,'#B8860B');
			
			$('#submenu10').css('width' ,'300');
			$('#submenu11').css('width' ,'300');
			$('#submenu12').css('width' ,'300');
			
		
			$('#message10').html("Exercises");
			$('#message11').html("");
			$('#message12').html("");
			
			$('.chapter10').show(1500);
			
				 }, //end mouseover		  
				 function(){
			$('#submenu10').css('background-color' ,'#60F');
			$('#submenu11').css('background-color' ,'#C3F');
			$('#submenu12').css('background-color' ,'#C36');
			
		    $('#submenu10').css('width' ,'300');
			$('#submenu11').css('width' ,'300');
			$('#submenu12').css('width' ,'300');

			
			$('.chapter10').hide(1500);
			
			 $('#message10').html("Chapter 10");
			 $('#message11').html("Chapter 11");
			 $('#message12').html("Chapter 12");
				 } // end mouseout
			); //end hover
				   }); // end ready

				   
				   
	
$(document).ready(function(){
$('#message11').toggle(
				 function(){
			$('#submenu10').css('background-color' ,'#B8860B');
			$('#submenu11').css('background-color' ,'#B8860B');
			$('#submenu12').css('background-color' ,'#B8860B');
			
			$('#submenu10').css('width' ,'300');
			$('#submenu11').css('width' ,'300');
			$('#submenu12').css('width' ,'300');
			
		
			$('#message10').html("");
			$('#message11').html("Exercises");
			$('#message12').html("");
			
			$('.chapter11').show(1500);
			
				 }, //end mouseover		  
				 function(){
			$('#submenu10').css('background-color' ,'#60F');
			$('#submenu11').css('background-color' ,'#C3F');
			$('#submenu12').css('background-color' ,'#C36');
			
		    $('#submenu10').css('width' ,'300');
			$('#submenu11').css('width' ,'300');
			$('#submenu12').css('width' ,'300');

			
			$('.chapter11').hide(1500);
			
			 $('#message10').html("Chapter 10");
			 $('#message11').html("Chapter 11");
			 $('#message12').html("Chapter 12");
				 } // end mouseout
			); //end hover
				   }); // end ready


	
$(document).ready(function(){
$('#message12').toggle(
				 function(){
			$('#submenu10').css('background-color' ,'#B8860B');
			$('#submenu11').css('background-color' ,'#B8860B');
			$('#submenu12').css('background-color' ,'#B8860B');
			
			$('#submenu10').css('width' ,'300');
			$('#submenu11').css('width' ,'300');
			$('#submenu12').css('width' ,'300');
			
		
			$('#message10').html("");
			$('#message11').html("");
			$('#message12').html("Exercises");
			
			$('.chapter12').show(1500);
			
				 }, //end mouseover		  
				 function(){
			$('#submenu10').css('background-color' ,'#60F');
			$('#submenu11').css('background-color' ,'#C3F');
			$('#submenu12').css('background-color' ,'#C36');
			
		    $('#submenu10').css('width' ,'300');
			$('#submenu11').css('width' ,'300');
			$('#submenu12').css('width' ,'300');

			
			$('.chapter12').hide(1500);
			
			 $('#message10').html("Chapter 10");
			 $('#message11').html("Chapter 11");
			 $('#message12').html("Chapter 12");
				 } // end mouseout
			); //end hover
				   }); // end ready
				   
				   
				   <!-- start of 5 th row--><!-- start of 5 th row--><!-- start of 4 th row--><!-- start of 5 th row-->
$(document).ready(function(){
$('#message13').toggle(
				 function(){
			$('#submenu13').css('background-color' ,'#B8860B');
			$('#submenu14').css('background-color' ,'#B8860B');
			$('#submenu15').css('background-color' ,'#B8860B');
			
			$('#submenu13').css('width' ,'300');
			$('#submenu14').css('width' ,'300');
			$('#submenu15').css('width' ,'300');
			
		
			$('#message13').html("Exercises");
			$('#message14').html("");
			$('#message15').html("");
			
			$('.chapter13').show(1500);
			
				 }, //end mouseover		  
				 function(){
			$('#submenu13').css('background-color' ,'#60F');
			$('#submenu14').css('background-color' ,'#C3F');
			$('#submenu15').css('background-color' ,'#C36');
			
		    $('#submenu13').css('width' ,'300');
			$('#submenu14').css('width' ,'300');
			$('#submenu15').css('width' ,'300');

			
			$('.chapter13').hide(1500);
			
			 $('#message13').html("Chapter 13");
			 $('#message14').html("Chapter 14");
			 $('#message15').html("Chapter 15");
				 } // end mouseout
			); //end hover
				   }); // end ready
				   
	
$(document).ready(function(){
$('#message14').toggle(
				 function(){
			$('#submenu13').css('background-color' ,'#7FFF00');
			$('#submenu14').css('background-color' ,'#7FFF00');
			$('#submenu15').css('background-color' ,'#7FFF00');
			
			$('#submenu13').css('width' ,'300');
			$('#submenu14').css('width' ,'300');
			$('#submenu15').css('width' ,'300');
			
		
			$('#message13').html("");
			$('#message14').html("Exercises");
			$('#message15').html("");
			
			$('.chapter14').show(1500);
			
				 }, //end mouseover		  
				 function(){
			$('#submenu13').css('background-color' ,'#60F');
			$('#submenu14').css('background-color' ,'#C3F');
			$('#submenu15').css('background-color' ,'#C36');
			
		    $('#submenu13').css('width' ,'300');
			$('#submenu14').css('width' ,'300');
			$('#submenu15').css('width' ,'300');

			
			$('.chapter14').hide(1500);
			
			 $('#message13').html("Chapter 13");
			 $('#message14').html("Chapter 14");
			 $('#message15').html("Chapter 15");
				 } // end mouseout
			); //end hover
				   }); // end ready


	
$(document).ready(function(){
$('#message15').toggle(
				 function(){
			$('#submenu13').css('background-color' ,'#7FFF00');
			$('#submenu14').css('background-color' ,'#7FFF00');
			$('#submenu15').css('background-color' ,'#7FFF00');
			
			$('#submenu13').css('width' ,'300');
			$('#submenu14').css('width' ,'300');
			$('#submenu15').css('width' ,'300');
			
		
			$('#message13').html("");
			$('#message14').html("");
			$('#message15').html("Exercises");
			
			$('.chapter15').show(1500);
			
				 }, //end mouseover		  
				 function(){
			$('#submenu13').css('background-color' ,'#60F');
			$('#submenu14').css('background-color' ,'#C3F');
			$('#submenu15').css('background-color' ,'#C36');
			
		    $('#submenu13').css('width' ,'300');
			$('#submenu14').css('width' ,'300');
			$('#submenu15').css('width' ,'300');

			
			$('.chapter15').hide(1500);
			
			 $('#message13').html("Chapter 13");
			 $('#message14').html("Chapter 14");
			 $('#message15').html("Chapter 15");
				 } // end mouseout
			); //end hover
				   }); // end ready
				   
				   		   
				   <!-- start of 6 th row--><!-- start of 6 th row--><!-- start of 6 th row--><!-- start of 6 th row-->
$(document).ready(function(){
$('#message16').toggle(
				 function(){
			$('#submenu16').css('background-color' ,'#7FFF00');
			$('#submenu17').css('background-color' ,'#7FFF00');
			$('#submenu18').css('background-color' ,'#7FFF00');
			
			$('#submenu16').css('width' ,'300');
			$('#submenu17').css('width' ,'300');
			$('#submenu18').css('width' ,'300');
			
		
			$('#message16').html("Exercises");
			$('#message17').html("");
			$('#message18').html("");
			
			$('.chapter16').show(1500);
			
				 }, //end mouseover		  
				 function(){
			$('#submenu16').css('background-color' ,'#60F');
			$('#submenu17').css('background-color' ,'#C3F');
			$('#submenu18').css('background-color' ,'#C36');
			
		    $('#submenu16').css('width' ,'300');
			$('#submenu17').css('width' ,'300');
			$('#submenu18').css('width' ,'300');

			
			$('.chapter16').hide(1500);
			
			 $('#message16').html("Chapter 16");
			 $('#message17').html("Chapter 17");
			 $('#message18').html("Chapter 18");
				 } // end mouseout
			); //end hover
				   }); // end ready

				   
				   
	
$(document).ready(function(){
$('#message17').toggle(
				 function(){
			$('#submenu16').css('background-color' ,'#7FFF00');
			$('#submenu17').css('background-color' ,'#7FFF00');
			$('#submenu18').css('background-color' ,'#7FFF00');
			
			$('#submenu16').css('width' ,'300');
			$('#submenu17').css('width' ,'300');
			$('#submenu18').css('width' ,'300');
			
		
			$('#message16').html("");
			$('#message17').html("Exercises");
			$('#message18').html("");
			
			$('.chapter17').show(1500);
			
				 }, //end mouseover		  
				 function(){
			$('#submenu16').css('background-color' ,'#60F');
			$('#submenu17').css('background-color' ,'#C3F');
			$('#submenu18').css('background-color' ,'#C36');
			
		    $('#submenu16').css('width' ,'300');
			$('#submenu17').css('width' ,'300');
			$('#submenu18').css('width' ,'300');

			
			$('.chapter17').hide(1500);
			
			 $('#message16').html("Chapter 16");
			 $('#message17').html("Chapter 17");
			 $('#message18').html("Chapter 18");
				 } // end mouseout
			); //end hover
				   }); // end ready


	
$(document).ready(function(){
$('#message18').toggle(
				 function(){
			$('#submenu16').css('background-color' ,'#7FFF00');
			$('#submenu17').css('background-color' ,'#7FFF00');
			$('#submenu18').css('background-color' ,'#7FFF00');
			
			$('#submenu16').css('width' ,'300');
			$('#submenu17').css('width' ,'300');
			$('#submenu18').css('width' ,'300');
			
		
			$('#message16').html("");
			$('#message17').html("");
			$('#message18').html("Exercises");
			
			$('.chapter18').show(1500);
			
				 }, //end mouseover		  
				 function(){
			$('#submenu16').css('background-color' ,'#60F');
			$('#submenu17').css('background-color' ,'#C3F');
			$('#submenu18').css('background-color' ,'#C36');
			
		    $('#submenu16').css('width' ,'300');
			$('#submenu17').css('width' ,'300');
			$('#submenu18').css('width' ,'300');

			
			$('.chapter18').hide(1500);
			
			 $('#message16').html("Chapter 16");
			 $('#message17').html("Chapter 17");
			 $('#message18').html("Chapter 18");
				 } // end mouseout
			); //end hover
				   }); // end ready
				   
				   
				   <!-- start of 7 th row--><!-- start of 7 th row--><!-- start of 7th row--><!-- start of 7th row-->
$(document).ready(function(){
$('#message19').toggle(
				 function(){
			$('#submenu19').css('background-color' ,'#FA8072');
			$('#submenu20').css('background-color' ,'#FA8072');
			$('#submenu21').css('background-color' ,'#FA8072');
			
			$('#submenu19').css('width' ,'300');
			$('#submenu20').css('width' ,'300');
			$('#submenu21').css('width' ,'300');
			
		
			$('#message19').html("Exercises");
			$('#message20').html("");
			$('#message21').html("");
			
			$('.chapter19').show(1500);
			
				 }, //end mouseover		  
				 function(){
			$('#submenu19').css('background-color' ,'#60F');
			$('#submenu20').css('background-color' ,'#C3F');
			$('#submenu21').css('background-color' ,'#C36');
			
		    $('#submenu19').css('width' ,'300');
			$('#submenu20').css('width' ,'300');
			$('#submenu21').css('width' ,'300');

			
			$('.chapter19').hide(1500);
			
			 $('#message19').html("Chapter 19");
			 $('#message20').html("Chapter 20");
			 $('#message21').html("Chapter 21");
				 } // end mouseout
			); //end hover
				   }); // end ready

				   
				   
	
$(document).ready(function(){
$('#message20').toggle(
				 function(){
			$('#submenu19').css('background-color' ,'#FA8072');
			$('#submenu20').css('background-color' ,'#FA8072');
			$('#submenu21').css('background-color' ,'#FA8072');
			
			$('#submenu19').css('width' ,'300');
			$('#submenu20').css('width' ,'300');
			$('#submenu21').css('width' ,'300');
			
		
			$('#message19').html("");
			$('#message20').html("Exercises");
			$('#message21').html("");
			
			$('.chapter20').show(1500);
			
				 }, //end mouseover		  
				 function(){
			$('#submenu19').css('background-color' ,'#60F');
			$('#submenu20').css('background-color' ,'#C3F');
			$('#submenu21').css('background-color' ,'#C36');
			
		    $('#submenu19').css('width' ,'300');
			$('#submenu20').css('width' ,'300');
			$('#submenu21').css('width' ,'300');

			
			$('.chapter20').hide(1500);
			
			 $('#message19').html("Chapter 19");
			 $('#message20').html("Chapter 20");
			 $('#message21').html("Chapter 21");
				 } // end mouseout
			); //end hover
				   }); // end ready


	
$(document).ready(function(){
$('#message21').toggle(
				 function(){
			$('#submenu19').css('background-color' ,'#FA8072');
			$('#submenu20').css('background-color' ,'#FA8072');
			$('#submenu21').css('background-color' ,'#FA8072');
			
			$('#submenu19').css('width' ,'300');
			$('#submenu20').css('width' ,'300');
			$('#submenu21').css('width' ,'300');
			
		
			$('#message19').html("");
			$('#message20').html("");
			$('#message21').html("Exercises");
			
			$('.chapter21').show(1500);
			
				 }, //end mouseover		  
				 function(){
			$('#submenu19').css('background-color' ,'#60F');
			$('#submenu20').css('background-color' ,'#C3F');
			$('#submenu21').css('background-color' ,'#C36');
			
		    $('#submenu19').css('width' ,'300');
			$('#submenu20').css('width' ,'300');
			$('#submenu21').css('width' ,'300');

			
			$('.chapter21').hide(1500);
			
			 $('#message19').html("Chapter 19");
			 $('#message20').html("Chapter 20");
			 $('#message21').html("Chapter 21");
				 } // end mouseout
			); //end hover
				   }); // end ready
				    