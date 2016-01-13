<!--blog.php also uses blog.inc.html-->
<!--http://skillcrush.com/blog/-->
<!--http://skillcrush.com/category/blog/social-media-and-marketing/-->
<!--http://skillcrush.com/2014/10/17/ultimate-guide-hashtags/-->

<?php
include('../views/header.inc.html');
require(MYSQL);

//Grab all the catagories 
	$q = "SELECT catagory from blog
	        Group BY catagory
	        HAVING COUNT(*) > 0
	        ORDER BY catagory ASC";
	$r= mysqli_query($dbc, $q);
	
		if(mysqli_num_rows($r) >0 )
	       	 	{
	       	 			echo '<ul>';
	       	 			echo "<li><a href='./blog.php'>All</a></li>";
	     			while($row=mysqli_fetch_array($r, MYSQLI_ASSOC))
		     				{
			  					
			  					echo "<li><a href='./blog.php?catagory=$row[catagory]'>$row[catagory]</a></li>";
								
		     				}
						echo '</ul>';
	       		 }
	
	
	
	
//////////////////////END Grab catagpries	
if(!empty($_GET['catagory']))
	{
		$catagory = $_GET['catagory'];
		$q = "SELECT a.img_url, a.alt ,a.gallery_select,b.html_type, b.title,b.say,b.html,b.tags,b.url_file  FROM blog AS b 
            LEFT JOIN artgallery AS a on b.artgallery_id = a.artgallery_id 
			where b.status = 'true'
			AND
			b.catagory = '$catagory'
			ORDER BY date_created DESC
			LIMIT 50";

	}else{

	
	
$q = "SELECT a.img_url, a.alt ,a.gallery_select,b.html_type, b.title,b.say,b.html,b.tags,b.url_file  FROM blog AS b 
            LEFT JOIN artgallery AS a on b.artgallery_id = a.artgallery_id 
			where b.status = 'true'
			ORDER BY date_created DESC
			LIMIT 10";
			
	}
 $r = mysqli_query($dbc, $q);

   	if(mysqli_num_rows($r) >0)
				{
				   while($row=mysqli_fetch_array($r, MYSQLI_ASSOC))
					 {
					     //types  Plain_text   |    HTML_code | URL_link   | IMG_link  |  
					     if(isset($catagory))
						 	{
						 		echo '<h2>Catagory:::::'.$catagory.'</h2>';
						 	}
						if($row['html_type'] ==="Plain_text")
					    	{
							echo '<ul style="list-style:none">';
							echo '<li><h3>'.$row['title'].'</h3></li>';
							echo '<li>'.$row['say'].'</li>';
							echo '<li>'.$row['html'].'</li>';
							echo '<li> tags:'.$row['tags'].'</li>';
							echo '<li> tags:'.$row['url_file'].'</li>';
							echo '</ul>';
					    	}elseif($row['html_type'] ==="HTML_code")
					    	{
							echo '<ul style="list-style:none">';
							echo '<li><h3>'.$row['title'].'</h3></li>';
							echo '<li>'.$row['say'].'</li>';
							echo '<li>'.$row['html'].'</li>';
							echo '<li> tags:'.$row['tags'].'</li>';
							echo '<li> tags:'.$row['url_file'].'</li>';
							echo '</ul>';
						   }elseif($row['html_type'] === "URL_link")
						   {
					         echo '<ul style="list-style:none">';
							echo '<li><h3>'.$row['title'].'</h3></li>';
							echo '<li>'.$row['say'].'</li>';
							echo '<li><a href="http://'.$row['html'].'" target="blank">url link</a>';
							echo '<li> tags:'.$row['tags'].'</li>';
							echo '<li> tags:'.$row['url_file'].'</li>';
							echo '</ul>';
						    }elseif($row['html_type'] === "IMG_link")
							{
							echo 'img';
					        echo '<ul style="list-style:none">';
							echo '<li><h3>'.$row['title'].'</h3></li>';
							echo '<li>'.$row['say'].'</li>';
						
							   if($row['gallery_select'] ==="GalleryTwo")
							      {
				    		         echo '<td style="text-align:center"><img src="'.$row['img_url'].'" alt="'.$row['alt'].'" style="width:228px;height:300px;"></td>';
							      }else{
							        echo '<td style="text-align:center"><img src="'.$row['img_url'].'" alt="'.$row['alt'].'" style="width:300px;height:228px;"></td>';
							      }
			
							
							echo '<li> tags:'.$row['tags'].'</li>';
							echo '<li> tags:'.$row['url_file'].'</li>';
							echo '</ul>';
							
						   }else{
						
						   }//END IF
						 }//END while
				}else{
					$blog = "No blog posts";
					echo $blog;
				}
				
	
            