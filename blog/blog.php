<!--blog.php also uses blog.inc.html-->
<<<<<<< HEAD
<!--http://skillcrush.com/blog/-->
<!--http://skillcrush.com/category/blog/social-media-and-marketing/-->
<!--http://skillcrush.com/2014/10/17/ultimate-guide-hashtags/-->
=======
>>>>>>> blog

<?php
$title = "Duke's Blog";
include('../views/header.inc.html');
require(MYSQL);

//Grab all the catagories 
	$qm= "SELECT catagory,url_cat from blog
	        WHERE
	       	status ='true'
	       	Group BY catagory
	       	HAVING COUNT(*) > 0
	       	ORDER BY catagory ASC";
	$rm= mysqli_query($dbc, $qm);
	

<<<<<<< HEAD
//////////////////////END Grab catagpries	
=======
//////////////////////END Grab catagpries
>>>>>>> blog
if(!empty($_GET['catagory']))
	{
		$catagory = $_GET['catagory'];
		
<<<<<<< HEAD
		$q = "SELECT a.img_url, a.alt ,a.gallery_select,b.html_type, b.title,b.say,b.teaser,b.html,b.tags,b.url_cat  FROM blog AS b 
=======
		$q = "SELECT a.img_url, a.alt ,a.gallery_select,b.html_type,b.catagory,b.title,b.say,b.teaser,b.html,b.tags,b.url_cat  FROM blog AS b 
>>>>>>> blog
            	LEFT JOIN Artgallery AS a on b.artgallery_id = a.artgallery_id 
				where b.status = 'true'
				AND
				b.url_cat = '$catagory'
				ORDER BY date_created DESC
				LIMIT 15";

	}else{
<<<<<<< HEAD
		$catagory = "All";
		
	    $q = "SELECT a.img_url, a.alt ,a.gallery_select,b.html_type, b.title,b.say,b.teaser,b.html,b.tags,b.url_cat FROM blog AS b 
=======
		$catagory = "";
		
	    $q = "SELECT a.img_url, a.alt ,a.gallery_select,b.html_type,b.catagory,b.title,b.say,b.teaser,b.html,b.tags,b.url_cat FROM blog AS b 
>>>>>>> blog
            	LEFT JOIN Artgallery AS a on b.artgallery_id = a.artgallery_id 
				where b.status = 'true'
				ORDER BY date_created DESC
				LIMIT 15";

	}
     $r = mysqli_query($dbc, $q);
<<<<<<< HEAD
     
=======
     //below used to grab catagory for header
     $c = mysqli_query($dbc, $q);
>>>>>>> blog
     
     /**************************Grab a random picture*********************************************/
	 $qp = "SELECT picture_name, comment, img_url, gallery_select, alt 
       			FROM Artgallery
       			where 
       			Active = 'Active' 
       			ORDER BY RAND() 
       			Limit 0,1";
       					
	       $rp = mysqli_query($dbc,$qp);
		   
/**************************END grab random picture*******************************************/	

include('../views/blog.html');
 
include('../views/footer.inc.html');
				
    