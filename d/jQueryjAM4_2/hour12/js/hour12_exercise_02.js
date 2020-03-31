
 $(document).ready(function(){
 
 //

 
 
 //
   $("img").mouseover(function(){
     $(this).animate(
     {
     width:"200px", 
     opacity:1
     }, 1000);


 $("img").click(function(){
    $("img").stop(true);
    $(this).off("mouseover");
    $(this).off("mouseout");
 });
 
 
});
 $("img").mouseout(function(){
   $(this).animate({width:"100px", opacity:.3}, 1000);
   });
 });