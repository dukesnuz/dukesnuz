
 $(document).ready(function(){
	$("#arch").data("image" , "../images/arch.jpg");
    $("#volcano").data("image", "../images/volcano.jpg");
    $("pyramid").data("image", "../pyramid.jpg");


$("#add").click(function(){
	    $("div:data(image)").each(function(){
		$(this).prepend($('<img></img>').attr("src", $(this).data("image")));
		
		  $(this).data("color", "red");
		  $(":data(color)").each(function(){
		  $(this).css({color:$(this).data("color")});
		  });
		  
	 });

$("div:not(:data(image))").each(function(){
	$(this).prepend($('<img></img').attr("src", "../images/insert.png"));
	
	   $(this).data("color", "purple");
	   $(":data(color)").each(function(){
	   $(this).css({color:$(this).data("color")});
	   });
    });
  });
});

