<?php
/***************************This is the home page for dukesnuz******************************/
/******I have split the site pages up into sections*****************************************/
/*******Header, main section, footer*******************************************************/

$title = "Home";

include('./views/header.inc.html');
require(MYSQL1);
/***********************Grab most viewd page on this site*********************************/
/******Set ip address to filter out in page count******/
      $my_ip = "76.107.223.9";
	//$my_ip = "0";
/*******filter browsers********/
	$browser_filter = "other";
	//$browser_filter= "Null";
/*******END filter browsers********/
	$q = "SELECT page_time, page_title, page, url_complete,browser, count(*) AS hits FROM page_history
	        WHERE ip != '$my_ip'
	        AND 
	        browser != '$browser_filter'
	        GROUP by page  ORDER BY hits DESC LIMIT 5
	           ";
					$r = mysqli_query($dbc, $q);
/************END grab most query most viewed pages*******************************************/		

/**************************Grab a random picture*********************************************/
	 $qp = "SELECT picture_name, comment, img_url, gallery_select, alt 
       					FROM Artgallery
       					where 
       					Active = 'Active' 
       					ORDER BY RAND() 
       					Limit 0,1";
       					
	       $rp = mysqli_query($dbc,$qp);
		   
/**************************END grab random picture*******************************************/			

/**************************************select most recent blog posts*************************/
 $q = "SELECT title, url_cat FROM blog 
				where status = 'true'
				ORDER BY date_created DESC
				LIMIT 5";

     $b = mysqli_query($dbc, $q);

/*************************************END select recent blog posts***************************/
		   
include('./views/home.inc.html');

include('./views/footer.inc.html');

?>
     

