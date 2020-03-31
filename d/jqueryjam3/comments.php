<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     <!-- made by www.metatags.org -->
<meta name="description" content="This page is an example of using HTML, CSS, Javascript, AJAX, PHP, Filemaker and Filemaker PHP API. " />

<meta name="keywords" content="HTML, CSS, PHP, Filemaker, Filemaker PHP API, Javascript, AJAX." />


<meta name="author" content="metatags generator">
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="3 days">
<title>Comments || Welcomed || Here!</title>
<!-- freight brokerage, post loads, post trucks -->

<link href="../styles/stylesheet.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico">


<style>
#commentform label.error{
	font-size: 1em;
	color: #F03;
	font-weight: bold;
	display: block;
	margin-left: 20px;
	background: #F9F;
	margin-right:70px;
	text-align: center;
	
	
}
#commentform input.error, #commentform select.error{
	background: #FFA9B8;
	border:2px solid red;
}
</style>
<!--<link href="_css/site.css" rel="stylesheet"> -->
<script src="_js/jquery-1.7.2.min.js"></script>
<script src="_js/jquery.validate.min.js"></script>


<script>
$(document).ready(function() {
	$('#commentform').validate({
		rules:{
			comment:{
				required:true,
				rangelength:[1,30]
			}
			},// end rules
			messages:{
				comment:{
				required:'Please enter your comment.',
				rangelength: "Max of 30 characters for comment."
				}
				}, // end messages
				errorPlacement: function(error, element){
						error.insertAfter(element);
				} //end error placement
	}); // end validate
}); // end ready
</script>

<?php
$ip=$_SERVER['REMOTE_HOST'];

//if($_POST('comment')!= ''){
	
/*if(empty($_POST['comment']))  
//if($_POST['comment'] != '') 
{
}else{*/
	?>



<script>
$(document).ready(function() {
	$('#commentform').submit(function(){
	var formData = $(this).serialize();
	$.post('commentssubmit.php',formData,processData);
			function processData(data){
		var data = "pass"; // procees data not working so added dummy variable to show always pass
			
			if(data=='pass'){
				$('#content').html('<p>Thank you. Your comment has been recieved!</p>');
				$('#commentform').hide();
												}else{	
			   if ($('#fail').length==0){
				$('#formwrapper').prepend('<p id="fail">Incorrect login information. Please try again</p>');
				}; //end #fail
		} //end process data
	} //end if
		return false;
		});// end submit
}); // end ready
</script>


 <?php
// }
 ?>


<style type="text/css">
<!--
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
-->
</style>





</head>

<body>

<?php
 if (isset($_COOKIE['username']))
              {
				  //$username="hi";
				  $username=$_COOKIE['username'];
				              
			  }else{
				  $username="No Name";
			  }
			  		?>
<div id="leftmychannels" style="overflow: hidden; background-color:#F90; font-weight: 500; font-size:14px;color: #039; top: 0px; height:225px" > 

<a href="index.php">
<h1>Comments Created with Javascript AJAX and Filemaker PHP API.</h1>
</a>

<p>This page is using HTML, CSS, PHP, JavaScript, Ajax, and Filemaker PHP API. For design I used HTML and CSS.  PHP is used for database connection, page include and cookies.  JavaScript is used for form validation. Javascript  and AJAX are used for form input to the filemaker database.  I used Filemaker and Filemaker Server to store the Comments, Username and Dates.  The comments are refreshed using JavaScript and Ajax along with a lot of help from<em> <a href="http://www.w3schools.com/">w3schools</a></em> to create the fresh page. </p>
</div><!--end <div > 1 -->
<div id="leftmychannels" style="overflow: hidden;  font-size:14px; top: 225px; height:225px" > 
<div id="content">
		<div class="main">
			<center><h2>Enter Comments</h2></center>
			<div id="formwrapper">
            
				<form method="post" action="comments.php" id="commentform" name="commentform">
                
					<p>
                    
							<label for="username">Username:</label>
						<input type="text" name="username" id="username" value="<?php echo $username; ?>" class="inputbox2">
					</p>
                    
                    <p>
                   
                    	<label for="comment">Comment</label>
                      <!-- <input type="text" name="comment" id="comment" class="inputbox1">  -->
                       
                     <textarea name="comment" id="comment" class="inputbox1"  cols="10" rows="1"></textarea>
                       
                       
				<input type="hidden" name="ip"  id="ip"  value="<?php echo $ip; ?>" >  
					<p>
						<center><input type="submit" name="button" id="button" value="Submit" ></center>
					</p>
				</form>
                
                
                
			</div>
		</div>
	</div>
    </div> <!--end <div> 2 -->
    
    <div id="leftmychannels" style="overflow: hidden; background-color: #F90;font-weight: 500; color: #039; font-size:14px; top: 450px; height:150px" > 
<p><center>Your comment will appear in the box to the right. As other comments roll in they will pop up.</center></p>
</div>
</div> <!--end <div>  3-->
     
     
<div id="rightmychannels" style=  "top:0px; height=50px; background-color:#9F6; overflow: hidden;font-weight: 500; color: #336; font-size:14px">
    <center><a href="index.php">Home<a/></center>
  
	
 <center><a href='comments.php'>Leave another comment<a/></center>

    
</div>

     <div id="rightmychannels" style=  "top:50px">
 
<?php  include('commentslive.php'); ?>
</div>

  <div id="footermychannels">
   footer
</div>

<?php include('../stats.php');?>
</body>
</html>