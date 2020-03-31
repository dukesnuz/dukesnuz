
 $(document).ready(function(){
  $("#formA input:text").keyup(function()
  {
  $("#formB input:text").val($(this).val());
  });
  $("#formA textarea").keyup(function()
  {
  $("#formB textarea").val($(this).val());
  });

//exercise 01
$("#formB input:text").keyup(function()
{
$("#formA input:text").val($(this).val() );
});
$("#formB textarea").keyup(function()
{
$("#formA textarea").val($(this).val() );
});


  
  
  
  
  
  

 $("#formA input:radio").change(function(){
      var radioB = $("#formB input[value=" + $(this).val() + "]");
      radioB.prop("checked", $(this).is(":checked"));
    });



$("#formA select").change(function()
  {
  $("#formB select").val($(this).val() );
  });
 
 $("#formA label").click(function()
 {
   $("#formB label").html(new Date().toUTCString() );
  });


  
 $("#formA input:image").click(function(e)
 {
 $("#formB input:image").attr("src", $(this).attr("src"));
 e.preventDafault();
 });





 $("#resetB").click(function()
 {
    $("#formB").get(0).reset();
	$("#formB input:checked").removeAttr("checked");
	$("#formB input:image").attr("src", "");
  });


  

  
 $("#serializeB").click(function(e)
 {
 $("#serialized").html($("#formA").serialize() );
 $("#serializedA").empty();
 var arr =$("#formA").serializeArray();
 

 
 
 
 jQuery.each(arr, function(i, prop)
 {
 $("#serializedA").append($("<p>" + prop.name + " = " + prop.value + "</p>"));


      });
    });
 });


 
 