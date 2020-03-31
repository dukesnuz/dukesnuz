
$(document).ready(function(){
  $("#img2").position({my:"left-50 top-50", at:"right bottom", of:"#img1"});
 
  $("#img3").position({my:"left-50 top-50", at:"right bottom", of:"#img2"});
	
	$("div").mouseover(function(e){
		$("#img4").position({my:"left top", at:"center", of:e, collision:"flip", within:"div"});
	});
	

	//$("div").click(function(e){
		//$("#img4").position({my:"left top", at:"center", of:e, collision:"flip", within:"div"});
	//});
});
