
var rightEdge = window.innerWidth;
var bottomEdge = window.innerHeight;

$(document).ready(function(){
   $("#plane").offset({top:bottomEdge/2, left:rightEdge/2});
   
$("#up").click(function(){
  $("#plane").attr("src" , "../images/planeUp.png");
  $("#plane").stop(true).animate({top:0}, 5000);
});

$("#left").click(function(){
  $("#plane").attr("src" , "../images/planeLeft.png"); 
  $("#plane").stop(true).animate({left:0}, 5000);
  });
  
$("#right").click(function(){
  $("#plane").attr("src", "../images/planeRight.png");
  $("#plane").stop(true).animate({left:rightEdge}, 5000);
  });
 
  $("#down").click(function(){  
  $("#plane").attr("src", "../images/planeLeft.png");
  $("#plane").stop(true).animate({top:bottomEdge}, 5000);
  });
 
 
$("#stop").click(function(){$("#plane").stop(true)});

//
$("#upleft").click(function(){
$("#plane").attr("src", "../images/planeLeft.png");
var position =$("#plane").offset();
$("#plane").animate({left:0, top:0}, 6000);
});

$("#upright").click(function(){
$("#plane").attr("src", "../images/planeRight.png");
var position = $("#plane").offset();
$("#plane").animate({left:rightEdge, top:0},6000);
});

$("#downleft").click(function(){
$("#plane").attr("src", "../images/planeLeft.png");
var position = $("#plane").offset();
$("#plane").animate({left:0, top:bottomEdge },6000);
});

$("#downright").click(function(){
$("#plane").attr("src", "../images/planeRight.png");
var position = $("#plane").offset();
$("#plane").animate({left:rightEdge, top:bottomEdge},6000);
});

$("#stop1").click(function(){$("#plane").stop(true)});

});//end this entire script
