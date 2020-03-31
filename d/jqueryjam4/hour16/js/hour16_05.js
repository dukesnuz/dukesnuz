function updateImages(data){
	$("#images").children("div").remove();
	$("#feedName").html(data.title)
	   for (i=0; i<data.items.length; i++){
	   	  var imageInfo = data.items[i];
	   	  var img = $('<img />').attr("src", (imageInfo.media.m).replace ("_m.jpg", "_s.jpg"));
	   	  var title = $("<p></p>").html(imageInfo.title+"&nbsp;");
	   	  var link = $("<a></a>").attr("href", imageInfo.link).append(img);
	   	  var div = $("<div class=\"item\"></div>").append(link, title);
	   	  $("#images").append(div);
	   	 }
	  }

	function setImages(feedType, id){
	var url = "http://api.flickr.com/services/feeds/" + feedType + ".gne?id=" + id + 
	"&lang=en-us&format=json&jsoncallback=?";
	$.getJSON(url, updateImages);
	
}


$(document).ready(function(){
	$("#leftNav").children("p:first").click();
});

