// JavaScript Document

<!-- below used for live help--->

$(document).ready(function() {
	$(".popup").fancybox({
		padding: 4,
		width: '75%',
		height: '85%',
		overlayColor:'#60f',
		overlayOpacity: .75,
		transitionIn: 'elastic',
		transitionOut: 'elastic',
		easingIn:   'easeInBounce',
		easingOut: 'easeOutSine'
		
	});
}); // end ready


$(document).ready(function(){
	$('#slider').anythingSlider(
								{
			autoPlay: true,
			vertical:false,
			/*buildArrows: true,	*/			
			startText :"Start Show",
			stopText: "Stop Show"
					});
}); //end ready 


