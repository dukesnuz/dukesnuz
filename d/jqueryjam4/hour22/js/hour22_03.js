/**
 * @author David
 */
/*
$(document).ready(function() {
  checkForMobile();
  $("#random").on("pageshow", function(){
    var images=["lake","peak","sunset2","falls"];
    $("#randomImg").attr("src", "../images/" +
      images[Math.floor(Math.random()*4)] + ".jpg");
    return false;
  });
});
*/

$(Document).ready(function(){
	checkForMobile();
	$("#random").on("pageshow", function(){
		var images=["lake", "peak", "sunset2", "falls"];
		$("#randomImg").attr("src", "../images/"+ images[Math.floor(math.random()*4)]+".jpg");
		return false;
	});
});
