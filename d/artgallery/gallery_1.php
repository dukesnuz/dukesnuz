<?php
require_once('../include_2/mysqli_connect.php');
?>
   
 <!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

     <!-- made by www.metatags.org -->
<meta name="description" content="The Art Gallery One dukesnuz. Created using jQuery anything slider, mySqli and Filemaker." />

<meta name="keywords" content="various pictures of outside scenes, jquery anything slider, filemaker" />

<meta name="author" content="metatags generator">
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="3 days">
<!-- made by www.metatags.org -->

<title>Art Gallery One || Dukesnuz.com</title>

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
</script>
<style>
#footer{
	
	margin-top: 100px;
}
</style>
</head>
<body>

<?php 
//used for FM
//require_once('include/dba.inc.php');
//ini_set('display_errors','0');

        // grabs picture from dukes nuz
 /*          
		$Find=$LR->newFindCommand('Artgalleryphp');
		$Find->addFindCriterion('Active', "Yes");
		$Find->addFindCriterion('GallerySelect', "GalleryOne");
		$Find->addSortRule('z_Creation_Date', 1, FILEMAKER_SORT_DESCEND);
		//$Find->addSortRule('z_Creation_Date', 1, FILEMAKER_SORT_ASCEND);
		$result = $Find->execute();
		$postsArray = $result->getRecords();
	*/
		  //grab data from database using mysqli
$q= "SELECT picture_name, img_url, comment, alt FROM Artgallery  
  where active ='Active'
  AND
  trim(gallery_select) ='GalleryOne'
  order by artgallery_id DESC";

$r = @mysqli_query($dbc, $q);
	
?>




<div class="wrapper">
  <div class="header">

  </div>
  <div class="content">
    <div class="main">
	
	
      <h2>The Art Gallery One of Duke</h2>
	  <h3> 
	  	<a href="http://www.dukesnuz.com"  title="Dukes home page">Home</a>
	  	||
	  	<a href="http://dukesnuz.com/d/artgallery/gallery_2.php"  title="Visit Art Gallery Two">Gallery Two</a>	
				&nbsp&nbsp  You are in Gallery One </h3>
	
     <!-- 
	      <div id="contactus">  
		 	 <a href="http://dukesnuz.com/d/jqueryjam3/comments.php" class="popup iframe" title="Leave an Amazing Comment">Leave an Amazing Comment</a>
			 <br>     
            <a href="http://dukesnuz.com/d/jqueryjam3/contactusform.php" class="popup iframe" title="Contact Us">Contact Us</a>
   			<!--end popupclass --> <!--</div> -->
			 <!--<br>
            <a href="http://ajaxtransport.com/a/chat/chat.php" class="popup iframe" title="Live Help">Live Help</a>
    </div> --> <!--end  contactus-->
	
	              
						
						
			<div id="slider">
	
	<?php  
	/* used for FM
	foreach($postsArray  as $record) {
	  $record->getField('Imageurl');	
	  $comment = $record->getField('Comment');	
	  $picturename = $record->getField('Picturename');	
		   $picture = '<img src="'.$record->getField('Imageurl').'" width="700" height="390"alt="The Art gallery of Duke">';	
	  */
       if(mysqli_num_rows($r)>0)
       {
          while($rows = mysqli_fetch_array($r, MYSQLI_ASSOC))
	       {
	   ?>
       	
			 <div>
			 <div id="box1">
			 <div class="insidebox">
			 <?php 
			 //used for FM
			  echo trim($rows['picture_name']); ?>  &nbsp;&nbsp; <?php echo trim($rows['comment']); 
			 $picture =trim( '<img src="'.$rows['img_url'].'" width="700" height="390"alt="'.$rows['alt'].'">');	
			 ?> 
			 
			 	   		</div>
						</div>
			
			<?php echo $picture;?>
			
						
						</div>
	   
		<?php    
		               }//end while
        }else{
       	   echo "<p>OOpps! Error. We apologize.</p>";
       	}//end if >0
       			 	   
	   ?>
		 
	   </div><!--end div slider-->
	
     </div>

   </div>
 </div>
  
 <div id="footer">
    <p>On this page I experimented using jQuery anything slider while using Filemaker to store each picture's title, comment and link.</p>
    <p>I have since changed to a MySQL database to store each picture's information. I am using Filemaker to insert, edit and delete each pictures information.</p>
    <p>I am using the Execute sql script in Filemaker Pro.</p>
	<p>Created by David Petringa on August 21, 2013  &nbsp; &copy;</p>
	<p>Updated to a mySql database on June 17, 2014  &nbsp; &copy;</p>
	
	<p><a href="http://dukesnuz.com/d/phppercolate6/home.php">PHP Percolate 6</a></p>
	<p><a href="http://dukesnuz.com/d/css3coffeebreak/home.php">CSS3 Coffee Break</a></p>
	<p><a href="http://dukesnuz.com/d/html_5_brunch/home.php">HTML5 brunch</a></p>
	<p><a href="http://dukesnuz.com/d/jqueryjam3/index.php">jQueryJam3</a></p>
	
	<p><a href="http://dukesnuz.com/d/playingaround/colors.html">Just Playing Around</a></p>
    <p><a href="http://dukesnuz.com/d/contactusform.php">Contact Me</a></p>
	<p><a href="http://dukesnuz.com/d/sitemap.html">Site Map</a></p>

	<br />
	
	<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
<a class="addthis_counter addthis_pill_style"></a>
</div>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4eb2c6443c4136a9"></script>
<!-- AddThis Button END -->

<br><br>
</div>
<?php include('../stats.php');?>

</body>
</html>
