
	var coords =[{top:140, left:470, easing:"easeInBounce", duration:1100},
				 {top:100, left:200, easing:"easeOutElastic", duration:1200},
				 {top:300, left:200, easing:"easeOutCirc", duration:1300},
				 {top:20, left:300, easeing:"easeInBounce", duration:1400},
				 {top:400, left:400, easing:"easeInBounce", duration:3000},
				 {top:10, left:10, easing:"easeOutExpo", duration:1500},
				 {top:0, left:0, easing:"easeOutCirc", duration:1900},
				 {top:200, left:100, easing:"easeInSine", duration: 1600}]
				 
function reposition(){
	if(coords.length){
		coord=coords.pop();
		$(this).animate(coord, 1000, coord.easing, reposition);
	}else{
		$("#ball").effect("explode", {pieces:25}, 2000);
	   }
	}
$(document).ready(function(){
	$("#ball").click(reposition);
});
