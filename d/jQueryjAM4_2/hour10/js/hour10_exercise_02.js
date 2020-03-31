/**
 * @author David
 */
 

 var startX = startY = 150;
 var topIndex, maxIndex;
 
 $(document).ready(function(){
    topIndex =$(".photo").length-1;
    maxIndex = topIndex;
	$("#right").click(function(e){move(e,"right");});
	$("#left").click(function(e){move(e,"left");});
	
	$("#up").click(function(e){moveu(e, "up");});
    $("#down").click(function(e){moveu(e, "down");});
    
  
	$("#fadeup").click(fadeup);
	$("#fadedown").click(fadedown);
	$("#fadeclear").click(fadeclear);
	$("#fadezero").click(fadezero);
	
	$("#bigger").click(function(e){resize(e,"bigger");});
	$("#smaller").click(function(e){resize(e, "smaller");});
	$("#stack").click(stack);
	$("#tile").click(tile);
	$("#flip").click(flip);
    stack();
	});
	
function resize(e, direction){
  var img = $("img:eq(" + topIndex + ")");
  if(direction == "bigger")
  {
  img.width(img.width()+20);
  }else{
  img.width(img.width()-20);
  }
}

function move(e, direction){
  var img = $("img:eq(" + topIndex + ")");
  var pos = img.offset();
     if(direction == "right")
     {
     pos.left += 10;
     }else{
     pos.left -=10;
     }
  img.offset(pos);
  startX = pos.left;
  startY = pos.top;
  }
  
function stack(){
  var x = startX, y = startY;
  $(".photo").each(function(indx)
     {
	 $(this).offset({ top:y, left:x
	 })
	 x += 20;
	 y += 20;
 });
}

function tile(){
	var x =startX, y= currTop = startY;
	var maxH = 0;
	$(".photo").each(function(indx)
	{
	maxH = Math.max(maxH, $(this).outerHeight() );
	$(this).offset({ top: y, left:x});
	x += $(this).outerWidth();
	if( x>400)
	{
	y = currTop + maxH;
	x = startX;
	maxH = 0;
     }
   });
 }


  function flip(){
  if (topIndex >= $(".photo").length-1)
  { 
  topIndex=0; 
  } else { 
  topIndex++;
   }
   var lastObj = null;
  $(".photo").each(function(indx)
  {
   if(indx>topIndex)
   {
   z= indx - topIndex;
   }else{
   var z = indx + maxIndex - topIndex;
   }
   $(this).css("z-index", z);
   lastObj = $(this);
   });
   lastObj.css("z-Index", 0);

   }

  /* exercise 02*/
 /* move image up and down*/
function moveu(e, direction){
  var img = $("img:eq(" + topIndex + ")");
  var pos = img.offset();
     if(direction == "down")
     {
     pos.top += 10;
     }else{
     pos.top -=10;
     }
  img.offset(pos);
  startX = pos.left;
  startY = pos.top;
  }
  
  /* change opacity of image*/
 function fadedown(){
   if (topIndex >= $(".photo").length-1)
  { 
  topIndex=0; 
  } else { 
  topIndex++;
   }
 
    var img = $("img:eq(" + topIndex + ")");
    $(img).css("opacity", .1); 
    //$(".photo").css("opacity", .1); 
    // }
}


function fadeup(){
   if (topIndex >= $(".photo").length-1)
  { 
  topIndex=0; 
  } else { 
  topIndex++;
   }
    var img = $("img:eq(" + topIndex + ")");
    $(img).css("opacity", .9); 
}

function fadeclear(){
    if (topIndex >= $(".photo").length-1)
  { 
  topIndex=0; 
  } else { 
  topIndex++;
   }
  var img = $("img:eq(" + topIndex + ")");
  $(img).css("opacity", 0);
  }
  
  function fadezero(){
    if (topIndex >= $(".photo").length-1)
  { 
  topIndex=0; 
  } else { 
  topIndex++;
   }
 var img = $("img:eq(" + topIndex + ")");
  $(img).css("opacity", 1);
  }
