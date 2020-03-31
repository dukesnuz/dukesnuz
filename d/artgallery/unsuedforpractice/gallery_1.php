<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

     <!-- made by www.metatags.org -->
<meta name="description" content="The Art Gallery of Duke." />

<meta name="keywords" content="various pictures of outside scenes, jquery anything slider, filemaker" />

<meta name="author" content="metatags generator">
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="3 days">
<!-- made by www.metatags.org -->

<title>Art Gallery || Dukesnuz.com</title>
<style>

 </style>
<link href="http://dukesnuz.com/d/styles/artgallery.css" rel="stylesheet">
<link href="anythingSlider/anythingslider.css" rel="stylesheet">
<link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico">
<link href="http://dukesnuz.com/d/jqueryjam3/fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet">

<script src="http://dukesnuz.com/d/jqueryjam3/_js/jquery-1.6.3.min.js"></script>
<script src="anythingSlider/jquery.anythingslider.min.js"></script>

<script src="http://dukesnuz.com/d/jqueryjam3/_js/jquery.easing.1.3.js"></script>
<script src="http://dukesnuz.com/d/jqueryjam3/fancybox/jquery.fancybox-1.3.4.js"></script>
<script src="jquery.js"></script>

<script>
$(document).ready(function(){
	$('#slider').anythingSlider(
								{
			autoPlay: true,
			vertical:false,
			/*buildArrows: true,	*/			
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
           
		$Find=$LR->newFindCommand('Artgalleryphp');
		$Find->addFindCriterion('Active', "Active");
		//$Find->addSortRule('z_Creation_Date', 1, FILEMAKER_SORT_DESCEND);
		//$Find->addSortRule('z_Creation_Date', 1, FILEMAKER_SORT_ASCEND);
		$result = $Find->execute();
		$postsArray = $result->getRecords();
?>




<div class="wrapper">
 
  <div class="content">
    <div class="main">
	
	
      <h2>The Art Gallery of Duke</h2>
	  			<h3>Gallery One</h3>
	
      
			<div id="slider">
	
	
	
	<?php  foreach($postsArray  as $record) {
	  $record->getField('Imageurl');
	  $picture = '<img src="'.$record->getField('Imageurl').'" width="700" height="390"alt="Various">';	
	  $comment = $record->getField('Comment');	
	  $picturename = $record->getField('Picturename');	
	      
	   ?>
           
			<!--<div id="name">
			 <?php //echo $picturename; ?> |===|<?php echo $comment; ?>
			 	   		</div>--->
			
			
			<div><?php  echo $picture; ?></div>
	   
		<?php    
       			 	   }
	   ?>
		
	   </div><!--end div slider-->
	
    </div>

  </div>
 </div>
  


</body>
</html>
