var sliderMax =sliderWidth =sliderLeft= 0;

var minHorizontalRatio = 400/600;

function addImages(){
 // var images=["boy", "flower", "sunset", "bison", "canyon", "falls", "peak"];
  var images = ["boy", "flower", "sunset", "boy2", "bison", "falls", "peak"];
  for (i in images){
    $("#imageSlide").append('<img src="../images/'+ images[i] + '.jpg" />');
	}
	$("#imageSlide img").each(function(){
	  sliderWidth += $(this).width() + 26;
	  });
	sliderWidth +=40;
	$("#imageSlide").width(sliderWidth);
	sliderMax = $("#selector").width() - sliderWidth;
	}




function slide(value){
  var oldLeft = sliderLeft; 
  sliderLeft = sliderLeft + value;
  if (sliderLeft >= 0) {
   sliderLeft = 0; 
   }
  if (sliderLeft <= sliderMax) {
   sliderLeft = sliderMax;
    }
  if(oldLeft != sliderLeft) { 
    $("#imageSlide").animate({left:sliderLeft}, 300, 'linear', function(){
        slide(value); });
  }
  return false;
}

  
  
  function setPhoto(){
   var newPhoto = $(this).attr("src");
   var horizontal = (minHorizontalRatio > $(this).height()/$(this).width() );
   $("#photo img").stop(true).fadeTo(500, .1, "linear", function(){
   $("#photo img").attr("src", newPhoto);
   });
   
   if(horizontal)
   {
   $("#photo img").css({width:600, height:"auto"})
   }else{
   $("#photo img").css({width:"auto", height:400})
   }
   $("#photo img").fadeTo(500, 1);
   return false;
   } 
   


$(document).ready(function(){
  addImages();
  $("#left").mouseenter(function(){
   slide(50);
    });
  $("#left").mouseleave(function(){
   $("#imageSlide").stop(true); 
   return false;
    });
  $("#right").mouseenter(function(){
   slide(-50); 
   });
  $("#right").mouseleave(function(){
   $("#imageSlide").stop(true); 
   return false; 
   });
  $("#imageSlide img").mouseenter(function(){ 
    $(this).stop(true).animate({height:120, opacity:1},500); 
	return false; 
	});
  $("#imageSlide img").mouseleave(function(){ 
    $(this).stop(true).animate({height:100, opacity:.5},500); return false; });
  $("#imageSlide img").click(setPhoto);
  $("#imageSlide img:first").click();
});