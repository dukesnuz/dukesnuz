<?php
//this page displays blog posts with information about the post in the url
//I want tosee if search engines will crawl pages more with a description in the url
//also uses page views/blog.html
$title = "Duke's Blog";
include('../views/header.inc.html');
require(MYSQL);

//set number of records to display
$display_count = "15";


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
        $catagory = $_GET['catagory'];
        
        $q = "SELECT a.img_url, a.alt ,a.gallery_select,b.html_type,b.catagory,b.title,b.say,b.teaser,b.html,b.tags,b.url_cat  FROM blog AS b 
                LEFT JOIN Artgallery AS a on b.artgallery_id = a.artgallery_id 
                where b.status = 'true'
                AND
                b.url_cat = '$catagory'
                ORDER BY date_created DESC
                LIMIT $display_count ";
    }elseif(!empty($_GET['description']))
    {
        $description = $_GET['description'];
        
        $q = "SELECT a.img_url, a.alt ,a.gallery_select,b.html_type,b.catagory,b.title,b.say,b.teaser,b.html,b.tags,b.url_file
                FROM blog AS b 
                LEFT JOIN Artgallery AS a on b.artgallery_id = a.artgallery_id 
                where b.status = 'true'
                AND
                b.url_file = '$description'
                ORDER BY date_created DESC
                LIMIT $display_count ";
                
    }else{
        $catagory = "";
        
        $q = "SELECT a.img_url, a.alt ,a.gallery_select,b.html_type,b.catagory,b.title,b.say,b.teaser,b.html,b.tags,b.url_cat FROM blog AS b 
                LEFT JOIN Artgallery AS a on b.artgallery_id = a.artgallery_id 
                where b.status = 'true'
                ORDER BY date_created DESC
                LIMIT $display_count ";

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
                