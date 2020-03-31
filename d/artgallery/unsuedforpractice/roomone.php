<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Anything Slider</title>

<link href="http://dukesnuz.com/d/jqueryjam3/_css/site.css" rel="stylesheet">
<link href="http://dukesnuz.com/d/jqueryjam3/anythingSlider/anythingslider.css" rel="stylesheet">
<script src="http://dukesnuz.com/d/jqueryjam3/_js/jquery-1.6.3.min.js"></script>
<script src="http://dukesnuz.com/d/jqueryjam3/anythingSlider/jquery.anythingslider.min.js"></script>
<script>
$(document).ready(function(){
	$('#slider').anythingSlider(
								{
			autoPlay: true,
			vertical: true,
			//	buidArrows: false,				
			startText :"Start Show",
			stopText: "Stop Show"
					});
	   
}); //end ready 
</script>
</head>
<body>

<?php 
require_once('include/dba.inc.php');
ini_set('display_errors','0');

            // grabs picture from dukes nuz
            $request = $LR->newFindAnyCommand('Artgalleryphp');
			$result = $request->execute();
			$record = $result->getFirstRecord();
             $Pictureoftheday = '<img src="'.$record->getField('Imageurl').'"/>';	
	 
?>






<div class="wrapper">
  <div class="header">
    <p class="logo">JavaScript <i>&</i> jQuery <i class="mm">The<br>Missing<br>Manual</i></p>
  </div>
  <div class="content">
    <div class="main">
      <h1>Anything Slider</h1>
     <div id="slider">
     
      		 <div><a href="page1.html"><img src="http://dukesnuz.com/d/jqueryjam3/images/pumpkin.jpg" width="700" height="390" alt="Pumpkin"></a></div>
             
             <div><a href="page2.html"><img src="http://dukesnuz.com/d/jqueryjam3/images/grapes.jpg" width="700" height="390" alt="Grapes"></a></div>
             <div><a href="page3.html.html"><img src="http://dukesnuz.com/d/jqueryjam3/images/various.jpg" width="700" height="390"alt+"Various"></a></div>
               <div> <?php echo $Pictureoftheday;?> </div>
			   <div> <?php echo $Pictureoftheday;?> </div>
			   <div> <?php echo $Pictureoftheday;?> </div>
             
       </div><!--end div slider-->
<br><br>   
    </div>
  </div>
  
</div>


</body>
</html>
