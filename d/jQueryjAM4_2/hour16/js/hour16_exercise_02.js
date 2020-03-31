var mapArr =new Array();
 var position;
 var mapProp ={
 	      center: new google.maps.LatLng(35.15, -90.05),
 	      zoom:3,
 	      mapTypeId:google.maps.MapTypeId.HYBRID
 	    };
    	    

    
function pan(){
	var newPosition = this.getCenter();
	if (newPosition !== position){
		$("p").html(newPosition.toString());
		position =newPosition;
		for (var i=0; i<mapArr.length; i++)
		  {
		  	mapArr[i].setCenter(position);
		  }
	    }
	      return false;
	 }


	 
function zoom(value){
   for(var i=0; i<mapArr.length; i++)
      {
      	mapArr[i].setZoom(mapArr[i].getZoom()+ value);
     }
     return false;
   }

   
  
 function placeMarker(){
 	  for(var i=0; i<mapArr.length; i++)
 	     {
 	     	var markerInfo ={
 	     		position: mapArr[i].getCenter(), map: mapArr[i],
 	     		visible:true , title:$("#markText").val()
 	     	};
 	  var marker = new google.maps.Marker(markInfo);
   }
  return false;
 }
 	     			


function addMaps(){
	$(".map").each(function(){
		var map = new google.maps.Map(this,mapProp)
		google.maps.event.addListener(map, 'center_changed', pan);
		mapArr.push(map);
		mapProp.zoom +=3;
	});
}


$(document).ready(function(){
	addMaps();
	$("#zoomin").click(function(){
		zoom(1);
		});
	$("#zoomout").click(function(){
		zoom(-1);
	});
   $("#mark").click(placeMarker);
	});

