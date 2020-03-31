function addCustomSearchEngine(){
  //var cx = "####";
  var cx ="9788828332937404:62uvc5w171i";
  var src = 'http:///www.google.com/cse/cse.js?cx=' + cx;
  var search = $("<script></script");
  search.attr("src", src).attr("async",true);
  $("head").prepend(search);
}
$(document).ready(function() {
  addCustomSearchEngine();
  $("#content").prepend("search box should be here<gcse:search></gcse:search>");      
});