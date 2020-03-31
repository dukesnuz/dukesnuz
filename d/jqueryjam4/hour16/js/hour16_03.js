/*********************
 my typing commneted out
 using code from DL
 *********************/ 
 //function addCustomSearchEngine(){
	//var cx ="9788828332937404:62uvc5w171i";
	function addCustomSearchEngine(){
    var cx ="9788828332937404:62uvc5w171i";
	//var src ='http://www.google.com/cse/cse.js?cx='+cx;
	//var search =$("<script></script>");
	var src = 'http://www.google.com/cse/cse.js?cx=' + cx;
    var search = $("<script></script>");
	//search.attr("src". src).attr("async", true);
	//$("head").prepend(search);
	search.attr("src", src).attr("async",true);
    $("head").prepend(search);
}



//$(document).ready(function(){
	//addCustomSearchEngine();
	//$("#content").prepend("<gcse:search></gcse:search>");
//});
$(document).ready(function() {
  addCustomSearchEngine();
  $("#content").prepend("search box should be here<gcse:search></gcse:search>");      
});
