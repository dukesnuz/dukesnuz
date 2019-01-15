<?php
/***************************This is the home page for dukesnuz******************************/
/******I have split the site pages up into sections*****************************************/
/*******Header, main section, footer******************************************************
 * site-statistics.php....Page also uses site_statistics.inc.html - I split this page into 2 table 
 * each table is accsessed by the if($view_table) value***********
 * This script grabs the page views for the new section of the site. Then manipulates the data to display in tables*/

$title = "Site Statistics";


/******Set ip address to filter out in page count******/
     // old ip 76.107.223.9
      $my_ip = "73.5.43.112";
	//$my_ip = "0";
/*******filter browsers********/
	$browser_filter = "other";
	//$browser_filter= "Null";
/*******END filter browsers********/	

include('../views/header.inc.html');

require(MYSQL);

          //,COUNT(page_id) AS page_views
          /*
		   * $q = "SELECT catagory from Artgallery
	        Group BY catagory
	        HAVING COUNT(*) > 0
	        ORDER BY catagory ASC";
		   */
	$q = "SELECT max(page_time) AS page_time, page_title, page, url_complete,browser, count(*) AS hits FROM page_history
	        WHERE ip != '$my_ip'
	        AND 
	        browser != '$browser_filter'
	        GROUP by page  ORDER BY hits DESC LIMIT 25
	           ";
					
						$r = mysqli_query($dbc, $q);
						if(mysqli_num_rows($r) >0)
							{
								
								$view_table = "1";
								include('../views/site_statistics.inc.html');
	
							}else{
							     echo "<p>OOOpppss! System error. We apoligize for the issue.</p>";
							}
           
////////////////////////////////////////START table 2///////////////////////////////////
	 //last 25 pages assessed
	
	$q = "SELECT page_time, page_title, page, url_complete, browser FROM page_history
	         WHERE ip != '$my_ip'
	         AND 
	         browser != '$browser_filter'
	         ORDER BY page_time DESC LIMIT 25
	           ";
					
						$r = mysqli_query($dbc, $q);
						if(mysqli_num_rows($r) >0)
							{
								$view_table = "2";
								include('../views/site_statistics.inc.html');
							}else{
								echo "<p>OOOpppss! System error. We apoligize for the issue.</p>";
							}
           

include('../views/footer.inc.html');

     
