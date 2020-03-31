/**
 * @author David
 */
function setEven(){
	$("li, span").css("font-weight","");
	var $evenItems = $("li:even");
	$evenItems.css("font-weight","bold");
	$("span:contains(Even)").css("font-weight", "bold");
	$(".label").html("Even");
	//i added below
    $(".label").css("color","");
	$(".label").css("border", "");
	$(".label").css("background-color", "");
}

function setOdd(){
	$("li, span").css("font-weight","");
	var $oddItems = $("li:odd");
	$oddItems.css("font-weight","bold");
	$("span:contains(Odd)").css("font-weight", "bold");
	$(".label").html("Odd");
	//i added below
    $(".label").css("color","");
	$(".label").css("border", "");
	$(".label").css("background-color", "");
}


function setFirst4(){
	$("li, span").css("font-weight","");
	var $first4 = $("li:lt(4)");
	$first4.css("font-weight", "bold");
	$("span:contains('First 4')").css("font-weight", "bold");
	$(".label").html("First 4");
	//i added below
    $(".label").css("color","");
	$(".label").css("border", "");
	$(".label").css("background-color", "");
}

function setFirstLast(){
	$("li, span").css("font-weight","");
	var $fl = $("li:first, li:last");
	$fl.css("font-weight", "bold");
	//$fl.css("color", "orange");
	//$("span;contains(First_Last)").css("font-weight", "bold");
	$(".label").html("First Last");
	$(".label").css("color","#FF592A");
	$(".label").css("border", "2px solid");
	$(".label").css("background-color", "blue");
}
