<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="generator" content="CoffeeCup HTML Editor (www.coffeecup.com)">
    <meta name="dcterms.created" content="Thu, 26 Sep 2013 01:35:30 GMT">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Images</title>
    
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<link rel="stylesheet" href="../../styles/reset.css" type="text/css"  />

<style>
body{
background-color:#FEFF9F;
 }
header{
       
	   height:75px;
 }
#maincontent{
      float:left;
	  margin-top: 75px;
	  margin-bottom:50px;
 
  }
footer{
	  
	    }
h1{
  font-size:2.5em;
  color:#801855;
  font-weight:bold; 
  margin-left:10px;
  }
h3{
  text-transform:uppercase;
 font-size:1em;
  color:#801855;
  font-weight:bold;
  margin-left:10px;
  }
p{
  font-size:.875em;
  color:#801855;
  font-weight:bold; 
  margin-left:15px;
  
  text-decoration:none;
  
  }
  a{
  margin-top:10px;
  margin-bottom:10px;
  font-size:1.5em;
  color:#54FF51;
  font-weight:bold; 
  margin-left:10px;
  text-decoration:none;
  display:inline-block;
  border: 1px #000000 solid;
  border-radius:25% 25% 25% 25%;
  text-transform:uppercase;
  padding:5px;
  
 
  
  }
  
#maincontent a{
  margin-top:10px;
  
  font-size:1em;
  color:#FFC97D;
  font-weight:bold; 
  text-decoration:none;
  text-align:center;
  display:inline-block;
  border: 2px #000000 solid;
  border-radius:5% 5% 5% 5%;
  text-transform:uppercase;
  padding:5px 5px 5px 5px;
  background-color:#6C5EFF;
  width:250px;
  height:8px;
  line-height:7px;
  
  }
  
ul{
   background-color:#FFD2CC;
   padding: 15px;
   font-size:.875em;
   color: #2D19FF;
   margin-left:20px;


   border-radius:5%;
   border:5px #1622FF dotted;
   border-right: solid;
   border-left: solid;
   }
.row{
  	 width:350px;
	 background-color: #FFE5CE;
	 margin-left:auto;
	 margin-right:auto;
	  }
</style>

<script type="text/javascript" charset="utf-8" src="function.js"></script>
  </head>
  <body>
  <header>
<h1>Images</h1>
<p><a href="http://dukesnuz.com/d/phppercolate6/home.php">Percolate 6 Home</a></p>
  <p>Go ahead & try it out.<a href="http://dukesnuz.com:81/ch11/11_02_upload_image.php">upload</a> a picture.</p>

</header>

<div id="maincontent">

		 
	<ul>
		<h3>Click on an image to view it in a seperate window</h3>
<?php #Script 11.4 and 11.6 - images.php
      //set default time zone
      date_default_timezone_set('America/New_York');
	  
	  //refer to file with images
	  $dir = 'uploads';
	  //$dir = 'http://dukesnuz.com:81/ch11/uploads';
	  $files = scandir($dir);
	  
	  //loop through files
	  foreach($files as $image)
	  				 {
					 //if(substr($image,0,1) !='.')
					if( ( substr($image,0,1) !='.') && ($image != 'Thumbs.db') )
					//
					  {
					 $image_size = getimagesize("$dir/$image");
					 //calculate the image's size in kilobytes
					 $file_size = round( (filesize ("$dir/$image")) /1024) . "kb";
					 //determine image's upload date and time
					 $image_date = date("F d, Y H:i:s",filemtime("$dir/$image"));
					 
					 
					 $image_name= urlencode($image);
					 
					 //print list item
					 echo "<li class='row'><a href=\"javascript:create_window('$image_name', $image_size[0], $image_size[1])\">
					 $image</a><p>Image Size:($file_size) Date uploaded($image_date)</p></li>\n";
					//echo $image;
					 } //end of the if
					 } //end of foreach loop
					 ?>
			 </ul>
  



</div><!-- end maincontent--->
<footer>
</footer>








  <!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
//<![CDATA[
var sc_project=6080262; 
var sc_invisible=1; 
var sc_security="ed805b7b"; 
//]]>
</script>
<script type="text/javascript"
src="http://www.statcounter.com/counter/counter_xhtml.js"></script>
<noscript><div class="statcounter"><a title="web counter"
href="http://statcounter.com/" class="statcounter"><img
class="statcounter"
src="http://c.statcounter.com/6080262/0/ed805b7b/1/"
alt="web counter" /></a></div></noscript>
<!-- End of StatCounter Code for Default Guide -->

  </body>
</html>