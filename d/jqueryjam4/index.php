<?php # jQuery jAm-04 - index.php
//require('includes/config.inc.php');//moved to header
$page_title= 'jQueryjAM Season 4 || A Boston PHP Self-Study Group';
//select which menu to use
//$menu_type = "menu_jquery";
$menu_type = "menu_css";
include('includes/header.html');
?>

  <script>
function setArticle(){
	 // $("#content").load("data/"+$(this).attr("itinerary")  +"#hour_02");
	    $("#content").load("data/"+$(this).attr("itinerary") );
      // $("#hour_02").css('color','red');
} 	
$(document).ready(function(){
 	//$("#navItem").html('o');
 	//$("#close").html('');
 	$("#navItem").click(setArticle);
 	//$("#navItem").html('i');
 	$("#close").html('Open/Close');
 	//$("#navItem").html('');
 	$("#close").click(function(){
 	$("#content").toggle();
   // $("#navItem").html('');
   // $("#close").html('Open/Close');
 	});
 });
 
 
 
  </script>  
	<h2>I need to work on this more on this page.</h2>
	<h2> Watch the clock in the sidebar. It changes colors. I like colors</h2>
 <div id="navItem"  itinerary="itinerary.html" class="press">Itinerary</div>
 <div id="close" class="press">Close</div>
 
<div id="content"></div>
  

    
<?php
//echo '<h2>Welcome!</h2>';
include ('includes/footer.html');
?>
