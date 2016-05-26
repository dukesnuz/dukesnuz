<!--blog.php also uses blog.inc.html-->

<?php

if(!empty($_GET['catagory'])){
        $title ="Blog Catagory&nbsp". $_GET['catagory'];
        $catagory = $_GET['catagory'];
    }else{
        $title = "Duke's Blog";
    }
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
	

//////////////////////END Grab catagpries
if(!empty($_GET['catagory']))
	{
		//$catagory = $_GET['catagory'];
		
		$q = "SELECT a.img_url, a.alt ,a.gallery_select,b.html_type,b.catagory,b.title,b.say,b.teaser,b.html,b.tags,b.url_cat,b.url_file  
		        FROM blog AS b 
            	LEFT JOIN Artgallery AS a on b.artgallery_id = a.artgallery_id 
				where b.status = 'true'
				AND
				b.url_cat = '$catagory'
				ORDER BY date_created DESC
				LIMIT 100";

	}else{
		$catagory = "";
		
	    $q = "SELECT a.img_url, a.alt ,a.gallery_select,b.html_type,b.catagory,b.title,b.say,b.teaser,b.html,b.tags,b.url_cat,b.url_file
	            FROM blog AS b 
            	LEFT JOIN Artgallery AS a on b.artgallery_id = a.artgallery_id 
				where b.status = 'true'
				ORDER BY date_created DESC
				LIMIT 100";

	}
     $r = mysqli_query($dbc, $q);
     //below used to grab catagory for header
     $c = mysqli_query($dbc, $q);
     
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
				
    