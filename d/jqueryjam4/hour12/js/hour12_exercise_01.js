
 $(document).ready(function(){

   $("#handle").click(toggleImage);
   $("#handle1").hide();
   });
   
function toggleImage(){

   if($("#handle").html() == '+')
   {
   $("#photo").show(1000, function() {$("#footer").show();});
   $("#handle").html('-');
   
   $("#handle1").fadeIn(1500);
   }else{
   $("#footer").hide();
   $("#photo").hide(1000);
   $("#handle").html('+');
   
   $("#handle1").hide();
   }
}


