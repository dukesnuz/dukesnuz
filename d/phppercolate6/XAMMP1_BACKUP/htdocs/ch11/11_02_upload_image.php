<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="generator" content="CoffeeCup HTML Editor (www.coffeecup.com)">
    <meta name="dcterms.created" content="Thu, 26 Sep 2013 01:35:30 GMT">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Upload Image</title>
    
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	
	<link rel="stylesheet" href="../styles/reset.css" type="text/css"  />

	
<style>
body{
background-color:#FEFF9F;
 }
header{
       
	   height:125px;
 }
#maincontent{
    float:left;
	margin-top:125px;
 
  }
footer{
       
	    }
h1{
  font-size:2.5em;
  color:#801855;
  font-weight:bold; 
  margin-left:10px;
  }
p{
  font-size:1.5em;
  color:#801855;
  font-weight:bold; 
  margin-left:100px;
  }
a{
  margin-top:10px;
  margin-bottom:10px;
  font-size:1.5em;
  color:#54FF51;
  font-weight:bold; 
  margin-left:0px;
  text-decoration:none;
  display:inline-block;
  border: 1px #000000 solid;
  border-radius:25%;
  text-transform:uppercase;
  padding:3px;
  }
.thankyou{
  font-size:1.5em;
  color:#1010FF;
  font-weight:bold; 
  margin-left:100px;
  }
.form{
      font-family:sans-serif;
	  font-weight: bold;
	  color: #C00;
	  font-style:italic; 
	  border: 2px #802F56 dotted;
	  margin-left: 50px;
	  font-size: .875em;
	  width:500px;
	  background-color:#FFFAE4
	  }	
.form  .field{
	  margin-left: 25px;
	  background-color:#EDEDD9;
	   }
	   
	 .form  textarea {
	  margin-left:120px;
	  
	  background-color:#EDEDD9;
	  padding:0px;
	  width:200px;
	  height:100px;
	  
	   }
	   .form .comment{
	   
	    padding-top:5px;
		width:50px;
		
	    }
.form p{
   margin-left: 55px;
   font-size: .875em; 
    padding:2px;
	
     }

.form .button{
 
  background-color:#28FF10;
  font-size: 1.5em;
  border:4px solid #7777FF;
  border-style:outset;
  margin-left: 0 auto ;
  margin-right:0 auto ;
   } 
.error{
	   font-weight:bold;
	   color:#FF0912;
	    } 
</style>
  </head>
  <body>
  <header>
  
<h1>Upload Image</h1>
<p><a href="http://dukesnuz.com/d/phppercolate6/home.php">Percolate 6 Home</a></p>
<p><a href="http://dukesnuz.com:81/ch11/11_04_images.php">Excercise 11.04 Images</a></p>
<p>Go ahead & try it out. <em>UPLOAD</em> a picture.</p>

<?php #Script 11.2 - upload_image.php
?>
</header>

<div id="maincontent">
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
    if(isset($_FILES['upload']))
	     {
	  //or can use
	  //$_FILES['size']
	  
	  $allowed = array('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG',
	                   'image/png', 'image/x-png');
					   if(in_array($_FILES['upload'] ['type'], $allowed))
					   {
					   //move file over
					   if(move_uploaded_file($_FILES['upload']['tmp_name'],
					      "uploads/{$_FILES['upload']['name']}"))
						  //"../../listerimages/{$_FILES['upload']['name']}"))
					       {
						     echo '<p><em>The file has been uploaded!</em></p>';
							}//end of move... IF.
							 
						}else{//invalid type
                        echo '<p class"error">Please upload a JPEG or PNG image.</p>';
						}
	      }//End of isset($_FILES['upload'] if.
		  
		  
		  if($_FILES['upload']['error'] >0)
		    {
			echo '<p class="error">The file could not be uploaded because:<strong>';
			   switch($_FILES['upload']['error'])  {
			     case 1:
				    print 'The file exceeds the upload_max_filesize setting in php.ini.';
					break;
				 case 2:
				    print 'The file exceeds the max_FILE_SIZE setting in the HTML form.';
					break;
				 case 3:
				    print 'The file was only partially uploaded.';
					break;
				 case 4:
				    print 'No file was uploaded.';
					break;
				 case 6:
				    print 'No temporary folder was available.';
					break;
				 case 7:
				    print 'Unable to write to the disk.';
					break;
				 case 8:
				    print 'File upload stopped.';
					break;
				  default:
				    print 'A system error occurred.';
					break;
			}// end of switch
			print '</strong></p>';
			} //End of error If.
			
			//delete temp file
	if(file_exists ($_FILES['upload']['tmp_name']) && is_files($_FILES['upload']['tmp_name']) )
	  {
	    unlink($_FILES['upload']['tmp_name'] );
	  }
}// End of submitted conditional  
			   									 
?>
<form enctype="multipart/form-data" action = "11_02_upload_image.php" method="post" class="form">

<input type="hidden" name="MAX_FILE_SIZE" value="524288" />

<fieldset><legend>Select a JPEG or PNG image of 512KB or smaller to be uploaded:</legend>
<p><b>File:</b> <input type="file" name="upload" /></p>
</fieldset>

<div class="button"><input type="submit" name="submit" value="Submit" /></div>
</form>

</div> <!--end main content-->
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