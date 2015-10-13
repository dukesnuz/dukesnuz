/**
 * @author admin
 */
	/*	$function(){
			if($.browser.msie && $.browser.version.substr(0,1)<7)
				{
					$('li').has('ul').mouseover(function()
						{
							$(thiis).children('ul').css('visibilty','visible');
						}).mouseout(function(){
							$(this).children('ul').css('visibility','hidden');
						})
				}
		});
		
		*/
		/*Mobile*/
$(document).ready(function(){ 
$('#menu-wrap').prepend('<div id="menu-trigger">Menu</div>');       
$("#menu-trigger").on("click", function(){
    $("#menu").slideToggle();
   // alert('Hi');
});
});
/*
// iPad
var isiPad = navigator.userAgent.match(/iPad/i) != null;
if (isiPad) $('#menu ul').addClass('no-transition');
		//iPad
		var isiPad = navigator.userAgent.match(/iPad/i) != null;
		if(isiPad $('#menu ul').addClass('no-transition');
		*/