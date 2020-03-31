/**
 * @author David
 */

$(document).ready(function(){
	checkForMobile();
	$('p').on("click", function(){
		$("#number").append($(this).html());
	});
	
	$("span").on("click", function()
	{
		if($(this).html() === "=")
		{
			$("#number").html(eval($("#number").html()));
		}else{
			$("#number").html("");
		};
	});
});
