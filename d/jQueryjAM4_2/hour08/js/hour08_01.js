/**
 * @author David
 */
 //I added below to change title
$(document).ready(function (){
  $("input:eq(2)").click(function (){
   $("h1,h2").each(function(){
         //var parts = {"12","red"};
        $(this).css("font-size" ,  "2em");
        $(this).css("color","#00008B");
        $(this).html("Its Snowing @ jQuery jAM 4! ");
        $("h2").html("Using jQuery.each() Method");
                      });
                   });
                });

//end I added

$(document).ready(function (){
  $("input:eq(0)").click(function (){
    $("p").each(function(){
         var parts = $(this).html().split(" ");
        $(this).css({"font-size":parts[1]+"px", color:parts[0]});
                           });
                   });
  
  
  $("input:eq(1)").click(function (){
    var items = $("p").map(function(){
          var parts = $(this).html().split(" ");
           return {color:parts[0], size:parts[1]};            
                 }).get();
      
    for (var idx in items){
      var item = items[idx];
       var span = $("<span>" + item.color + "</span>");
       var size = item.size*5;
          span.css({"background-color":item.color,  "font-size": item.size+"px", width:size, height:size});
           $("div").append(span);
                               }
       
                       });
 
 });

