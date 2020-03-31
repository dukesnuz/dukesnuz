

function setTrip(data){

   $("#title").html(data.title);

   $("#photo").attr("src", "../images/"+data.image);
 
  $("#date").html(data.date);
  $("label:first").html(data.days);
 
  
 $("label:last").html(data.location);
   
  $(".star:gt("+(parseInt(data.rating)-1)+")").attr("src", "../images/empty.ico");

  $(".star.lt("+(parseInt(data.rating))+")").attr("src", "../images/star.ico");
  }



function getTrip(title){
  var params = [{name:"option", value:"getTrip"}, {name:"title", value:title}]
  $.get("php/tripInfo.php", params, setTrip);
 }


 

function setList(data){
  var items = [];
  $.each(data, function(key, val){
   var item = $("<span></span>").html(val);
   item.click(function(){getTrip($(this).html() )});
   $("#leftNav").append(item);
   });
 }


 function sendRating(){
   var rating = $(".star").index($(this)) +1;
   var params = [{name:"option" , value:"setRating"},
                {name:"title", value:$("#title").html()},
				{name:"rating", value:rating}]
 $.post("php/tripInfo.php", params, setTrip);
 }

 

 $(document).ready(function(){
   $.get("php/tripInfo.php", {option:"getList"}, setList).done(function(){
     $("span:first").click();
	 return false;
	 });
	 
$(".star").click(sendRating);
});



