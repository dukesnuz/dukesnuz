// JavaScript Document
//load pages excercises in middle window using ajax
$(document).ready(function() {
	$('#chapter a').click(function(){
	var url=$(this).attr('href');
	$('#excercises').load(url);
	$('.e').removeClass();
	$('#excercises').css('border' , '3px solid #FF00FF');
	//added
	    $('#excercises').css('background-color','white');
		$('#excercises').css('font-size','.875em');
		$('#excercises').css('color','#8B0000');
		$('#excercises').css('border' , '0px solid #FFFFF');
	// end added
	return false;								
}); // end click
}); // end ready

//hide on page load
$(document).ready(function(){
$('#excercises').hide();
}); //end ready


//below is tool tip used on sidemenu
$(document).ready(function(e) { 
	$('.tooltip').hide();
	$('.trigger').click(function(){
	//$('.trigger').mouseover(function(){
	var ttLeft,
		//ttRight,
		ttTop,
	ttTop,
		$this=$(this),
		$tip = $($this.attr('data-tooltip')),
		triggerPos = $this.offset(),
		triggerH = $this.outerHeight(),
		triggerW = $this.outerWidth(),
		tipW = $tip.outerWidth(),
		tipH = $tip.outerHeight(),
		screenW = $(window).width(),
		scrollTop = $(document).scrollTop();
	if(triggerPos.top - tipH - scrollTop >0){
		ttTop = triggerPos.top - tipH - 10;
	}else{
		ttTop = triggerPos.top + triggerH +10;
	}
	var overFlowRight = (triggerPos.left + tipW) - screenW;
	if(overFlowRight >0){
		ttLeft = triggerPos.left - overFlowRight -10;
	}else{
		ttLeft= triggerPos.left;
	}
	$tip.css({
			 left : ttLeft,
			 top : ttTop,
			 position: 'absolute'
			 }).fadeIn(200);
}); //end mouseover
$('.trigger').mouseout(function(){
		$('.tooltip').fadeOut(200);				
	}); //end mouseout
}); // end ready