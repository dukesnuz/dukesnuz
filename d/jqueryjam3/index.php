<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
  
             
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!--start meta -->
<meta name="description" content="jQuery jAM 3 a self study group by Boston PHP. Completed exercises by David Petringa from the book: JavaScript & jQuery-the missing manual
by: David Sawyer McFarland  " />

<meta name="keywords" content="David Petringa, jQuery jAM, Boston PHP, JavaScript, jQuery, javscript and jQuery-the missing manual,
by: David Sawyer McFarland, completed exercises, javascript examples, jquery examples, javascript drop down list. " />


<meta name="author" content="metatags generator">
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="3 days">
<title>jQuery JAM||Season 3</title>
<!-- end meta -->


<!--end meta -->
<!---<link href="../styles/stylesheet.css" rel="stylesheet" type="text/css" />-->
<link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico">
<link href="fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.js"></script>
<script src="_js/jquery-1.7.2.min.js"></script>
<script src="_js/jquery.easing.1.3.js"></script>
<script src="fancybox/jquery.fancybox-1.3.4.js"></script>

<script src="http://dukesnuz.com/d/jqueryjam3/xtras/printtime.js"></script>



 
 
 

<!-- below hide instructions and anything else in hide div -->
<script type="text/javascript">
$(document).ready(function(){
	$('#hide').hide();// hide send text
	$('#toggle').hide(); //hide text instructions
	$('#toggle1').hide();
	$('#contactus').show();
	//$('#clear').hide(); // hide box message 3 on page load.. show after sumbit to send text
}); //end ready function
</script>
<!--show hide j query jam--->
<script>
$(document).ready(function(){
	$('#textinstructions').click(function(){
		$('#toggle').slideToggle(400);
	});
}); //end ready
</script>
<!-- show hide xtra stuff --->
<script>
$(document).ready(function(){
	$('#textinstructions1').click(function(){
		$('#toggle1').slideToggle(400);
	});
}); //end ready
</script>


<script>
<!--start pop up -->
$(document).ready(function() {
	$(".popup").fancybox({
		padding: 4,
		width: '65%',
		height: '75%',
		overlayColor:'#60f',
		overlayOpacity: .99,
		transitionIn: 'elastic',
		transitionOut: 'elastic',
		easingIn:   'easeInBounce',
		easingOut: 'easeOutSine'
		
	});
}); // end ready
</script>


<!--show code in side bar1--->
<script>
$(document).ready(function() {
$('.code').hide();
$('.main h2').toggle(
	function(){
		$(this).next('.code').fadeIn(1500);
		$(this).addClass('close');
	},
	function(){
		$(this).next('.code').fadeOut(3000);
		$(this).removeClass('close');
	}
	); //end toggle

}); // end ready
</script>

<!--start drop down -->
<script type="text/javascript">
$(document).ready(function(){
	function showSubmenu(){
		$('#drop').css('width', '220px');
		$('#drop').css('height', '50px');
		$('#drop').css('background-color', '#60C');
		$('#drop').css('color', '#F06');
		$('.subdrop').show(2500).delay(2500);
		
		$('#header').css('background-color', '#F30'  );
		$('#mainContent').css('background-color', '#FF0'  );
		//$('#container').css('background-color', '#963'  );
		
		
        } //end show
    function hideSubmenu(){
    	$('.subdrop').hide(2000);
		$('#drop').css('background-color', '#C03');
		$('#drop').css('width', '190px');
		
		$('#header').css('background-color', '#609'  );
		$('#mainContent').css('background-color',  '#939'  );
		$('#container').css('background-color', '#1CF2E8'  );
		
		
     } //end hide
     $('#drop').hover(showSubmenu,hideSubmenu);  
}); //end ready function
</script>



<!--start cookie -->
<script>
function getCookie(c_name)
{
var c_value = document.cookie;
var c_start = c_value.indexOf(" " + c_name + "=");
if (c_start == -1)
{
c_start = c_value.indexOf(c_name + "=");
}
if (c_start == -1)
{
c_value = null;
}
else
{
c_start = c_value.indexOf("=", c_start) + 1;
var c_end = c_value.indexOf(";", c_start);
if (c_end == -1)
{
c_end = c_value.length;
}
c_value = unescape(c_value.substring(c_start,c_end));
}
return c_value;
}

function setCookie(c_name,value,exdays)
{
var exdate=new Date();
exdate.setDate(exdate.getDate() + exdays);
var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
document.cookie=c_name + "=" + c_value;
}

function checkCookie()
{
var username=getCookie("username");
if (username!=null && username!="")
  {
    //alert("Welcome again " + username);
   
  }
else
  {
  username=prompt("Please enter your name-If you want.:","");
  if (username!=null && username!="")
    {
    setCookie("username",username,365);
    }
  }
}
</script>
     <!--end set cookie -->
    <!--end set cookie -->

    
   
   <!---used for search book--->
<script type="text/javascript">
$(document).ready(function(){
  $('#booklinks').hide();// show excercises
	$('#chapterlinks').hide(); //hide links
}); //end ready function
</script>
<!--used for search book--->
<script>
$(document).ready(function() {
	$('#chapterlinks a').click(function(){
	var url=$(this).attr('href');
	$('#booklinks').load(url); 
	return false;								
}); //emd click
}); // end ready
</script>
<!-- used for search book  --->
<script>
$(document).ready(function(){
	$('#searchbook').click(function(){
		$('#chapterlinks').slideToggle(400);
		$('#booklinks').slideToggle(400); //hides chapter links found
		$('#chapters').fadeToggle(2500);
		$('this').toggleClass('chapters');
		$('#chapterslinks').css('width' ,'100px');
		$('#chapterlinks').css('height', '300px');
		
		$('#container').css('background-color', '#309');

	});
}); //end ready
</script>
<!-- tool tip--->
<script>
$(document).ready(function(e) { 
	$('.tooltip').hide();
	$('.trigger').mouseover(function(){
	var ttLeft,
		//ttRight,
		ttTop,
	ttTop,
		$this=$(this),
		$tip = $($this.attr('data-tooltip')),
		triggerPos = $this.offset(),
		triggerH = $this.outerHeight(),
		triggerW = $this.outerWidth(),
		tipW = $tip.outerWidth(),
		tipH = $tip.outerHeight(),
		screenW = $(window).width(),
		scrollTop = $(document).scrollTop();
	if(triggerPos.top - tipH - scrollTop >0){
		ttTop = triggerPos.top - tipH - 10;
	}else{
		ttTop = triggerPos.top + triggerH +10;
	}
	var overFlowRight = (triggerPos.left + tipW) - screenW;
	if(overFlowRight >0){
		ttLeft = triggerPos.left - overFlowRight -10;
	}else{
		ttLeft= triggerPos.left;
	}
	$tip.css({
			 left : ttLeft,
			 top : ttTop,
			 position: 'absolute'
			 }).fadeIn(200);
}); //end mouseover
$('.trigger').mouseout(function(){
		$('.tooltip').fadeOut(200);				
	}); //end mouseout
}); // end ready
</script> 

<!-- below used for pop out live help  .. live help is now using other fancy box so i commented this one out-->
<script>
$(document).ready(function() {
	$('.iframe').fancybox({
		width: '85%',
		height: '95%',
		titlePosition: 'inside',
		changeSpeed: '750',
		transitionIn : 'elastic',
		transitionOut: 'elastic',
		easingOut: 'easeOutSine',
		overlayOpacity: '.99',
		overlayColor: '#AFCFCF',
	}); //end fancybox
}); // end ready
</script>




<style type="text/css"> 
<!-- 
h1 {
	font-family: Tahoma, Arial,, sans-serif;
	font-size: 16px;
	font-weight: 600;
	color: #009;
	font-style: normal;
	text-align: center;
	background: #CF3;
}
h2 {
	background: url(_images/open.png) no-repeat 0 11px;
	padding: 10px 0 0 25px;
	cursor: pointer;
	font-size:14px;
	color:#09F
}
h2.close {
	background-image: url(_images/close.png);
	
}
.code {
	margin-left: 25px;
	color:#FF0;
	font-size:12px;
	
	
}  

boldred{
	font-family: Tahoma, Arial,, sans-serif;
	color: #F00;
	 }
	 
h5{
	font-family: Tahoma, Arial,, sans-serif;
	font-size: 12px;
	font-weight: 600;
	color: #009;
	font-style: normal;
	text-align: center;
	background: #CF3;	
	 
	 }
	orangetext12{
	font-family: Tahoma, Arial,, sans-serif;
	font-size: 12px;
	font-weight: 300;
	color: #F63;
	font-style: normal;
	background: #309;
	text-align:justify;
 }
	 limetext{
	font-family: Tahoma, Arial,, sans-serif;
	font-size: 12px;
	font-weight: 600;
	color: #6F0;
	font-style: bold;
	text-align: center;
	background: #630;	
	 
	 }
body  {
	font: 100% Verdana, Arial, Helvetica, sans-serif;
	background: #9F3;
	margin: 0; /* it's good practice to zero the margin and padding of the body element to account for differing browser defaults */
	padding: 0;
	text-align: center; /* this centers the container in IE 5* browsers. The text is then set to the left aligned default in the #container selector */
	color: #000000;
}
.thrColLiqHdr #container { 
	width: 80%;  /* this will create a container 80% of the browser width */
	background: #309;
	margin: 0 auto; /* the auto margins (in conjunction with a width) center the page */
	border: 1px solid #000000;
	text-align: left; /* this overrides the text-align: center on the body element. */
} 
.thrColLiqHdr #header { 
	background: #93F; 
	padding: 0 10px;  /* this padding matches the left alignment of the elements in the divs that appear beneath it. If an image is used in the #header instead of text, you may want to remove the padding. */
} 
.thrColLiqHdr #header h1 {
	margin: 0; /* zeroing the margin of the last element in the #header div will avoid margin collapse - an unexplainable space between divs. If the div has a border around it, this is not necessary as that also avoids the margin collapse */
	padding: 10px 0; /* using padding instead of margin will allow you to keep the element away from the edges of the div */
}

/* Tips for sidebars:
1. Since we are working in percentages, it's best not to use side padding on the sidebars. It will be added to the width for standards compliant browsers creating an unknown actual width. 
2. Space between the side of the div and the elements within it can be created by placing a left and right margin on those elements as seen in the ".thrColLiqHdr #sidebar1 p" rule.
3. Since Explorer calculates widths after the parent element is rendered, you may occasionally run into unexplained bugs with percentage-based columns. If you need more predictable results, you may choose to change to pixel sized columns.
*/
.thrColLiqHdr #sidebar1 {
	font:Arial, Helvetica, sans-serif;
	font-size:14px;
	float: left; /* this element must precede in the source order any element you would like it be positioned next to */
	width: 22%; /* since this element is floated, a width must be given */
	background: #C03;/* the background color will be displayed for the length of the content in the column, but no further */
	padding: 15px 0; /* top and bottom padding create visual space within this div  */
	color: #FFF;
	
}
.thrColLiqHdr #sidebar2 {
	float: right; /* this element must precede in the source order any element you would like it be positioned next to */
	width: 23%; /* since this element is floated, a width must be given */
	background: #F60; /* the background color will be displayed for the length of the content in the column, but no further */
	padding: 15px 0; /* top and bottom padding create visual space within this div */
}
.thrColLiqHdr #sidebar1 p, .thrColLiqHdr #sidebar1 h3, .thrColLiqHdr #sidebar2 p, .thrColLiqHdr #sidebar2 h3 {
	margin-left: 10px; /* the left and right margin should be given to every element that will be placed in the side columns */
	margin-right: 10px;
}

/* Tips for mainContent:
1. the space between the mainContent and sidebars is created with the left and right margins on the mainContent div.
2. to avoid float drop at a supported minimum 800 x 600 resolution, elements within the mainContent div should be 300px or smaller (this includes images).
3. in the Internet Explorer Conditional Comment below, the zoom property is used to give the mainContent "hasLayout." This avoids several IE-specific bugs.
*/
.thrColLiqHdr #mainContent { 
	margin: 0 24% 0 23.5%; /* the right and left margins on this div element creates the two outer columns on the sides of the page. No matter how much content the sidebar divs contain, the column space will remain. You can remove this margin if you want the #mainContent div's text to fill the sidebar spaces when the content in each sidebar ends. */
}

.thrColLiqHdr #footer { 
	padding: 0 10px; /* this padding matches the left alignment of the elements in the divs that appear above it. */
	background: #30F;
} 
.thrColLiqHdr #footer p {
	margin: 0; /* zeroing the margins of the first element in the footer will avoid the possibility of margin collapse - a space between divs */
	padding: 10px 0; /* padding on this element will create space, just as the the margin would have, without the margin collapse issue */
}

/* Miscellaneous classes for reuse */
.fltrt { /* this class can be used to float an element right in your page. The floated element must precede the element it should be next to on the page. */
	float: right;
	margin-left: 8px;
}
.fltlft { /* this class can be used to float an element left in your page The floated element must precede the element it should be next to on the page. */
	float: left;
	margin-right: 8px;
}
.clearfloat { /* this class should be placed on a div or break element and should be the final element before the close of a container that should fully contain its child floats */
	clear:both;
    height:0;
    font-size: 1px;
    line-height: 0px;
}
--> 
</style><!--[if IE]>
<style type="text/css"> 
/* place css fixes for all versions of IE in this conditional comment */
.thrColLiqHdr #sidebar2, .thrColLiqHdr #sidebar1 { padding-top: 30px; }
.thrColLiqHdr #mainContent { zoom: 1; padding-top: 15px; }
/* the above proprietary zoom property gives IE the hasLayout it needs to avoid several bugs */
</style>
<![endif]-->

<!-- styles below used for searchbook--->
<style>

#booklinks{
	background-color:#6F0;
	font-size:12px;
	font-weight:700;
	color: #006;
	width:450px;
	

}
#chapters{
	background:#FFF;
	color:#60F;
	font-size:14px;
	font-weight:700;
}
#chapterlinks li {
	display:list-item;
	list-style-position:inside;
	
}
#chapterlinks li a { 
	padding: 2px 5px; 
	background-color:#FFF;
	color: black !important;
	text-decoration: none;
}
#chapterlinks li a:hover {
	background-color: #FF3;
	color: #060 !important;
	font-style:oblique;
	font-size:14px;
	font-weight:bold;	
}
.trigger {
	cursor : help;
	border-bottom: 1px dashed white;	
}
.trigger:hover {
	color: rgb(255,0,0);
}

.tooltip {
	width: 25%;
	padding: 5px;
	background-color: #6F6;
	border: 3px solid rgb(195,151,51);
	border-radius : 5px;
}

.tooltip h2 {
	
}
.tooltip p {
	color: black !important;	
}

</style>


<style type="text/css">
<!--
a:link {
	color: #F30;
}
a:visited {
	color: #F00;
}
a:hover {
	color: #6F9;
}
-->
</style>



</head>

<body onload="checkCookie()" class="thrColLiqHdr">
   <?php 
      if (isset($_COOKIE['username']))
              {
       $welcome=" Welcome back&nbsp;". $_COOKIE['username'];
       }
       else
	   {
      $welcome= " Welcome Back Kotter.";
        }
		?>


        
        
<div id="container">

<?php  include('xtras/pictureofthedayanimate.php'); ?>
 <div id="header">
     <h1> Completed Exercises From the Book: JavaScript & jQuery-the missing manual
    <BR />
    by: David Sawyer McFarland
     <p>Boston PHP,  jQuery jAM, Season 3</p></h1>
    <h5><boldred> Hard Hat Area!</boldred>  &nbsp;This webpage is continuously under construction.</h5>
  <!-- end #header --></div>
  <div id="sidebar1">
 
    
                <div id="textinstructions" style="cursor:pointer">
                                                     <center> <limetext>&nbsp;jQuery jam 3<br>Just Some Links&nbsp;</limetext></center>
                                      		                   <div id="toggle" style="background-color: #003; color:#9F3">
                                                     
        
                     <p><center>Used: slideToggle(400)</center></p>
              
      <ul>
       <li><a href="http://www.meetup.com/bostonphp/messages/boards/thread/33242542/?thread=33242542" target="_blank">jQuery jAM, Season 3-Master Discussion List</a></li> 
       <li><a href="http://jqueryjam.com" target="_blank">jQuery jAM</a></li> 
       <li><a href="http://webskillswork.com" target="_blank">Web Skills Work</a></li> 
    </ul>
     		
														</div>
                                                   </div><!---xtra stuff--->
        
                                                    
        
        
            <div id="drop" style="height:50px">   
        <div class="subdrop">
       <limetext><p>hover() drop down box-in color with some css and fade in added.</p></limetext>
        	</div>
          </div> 
          
          
                                                          
<div class="main" style="cursor:pointer">
        <h2><limetext><p>Fancy Box Pop Out</p></limetext></h2>
			<div class="code">       
  <p><a href="http://dukesnuz.com/d/jqueryjam3/dropdownlist.html" class="popup iframe"><h5>Drop Down onhover()</h5></a></p>
   			<!--end popupclass --> </div>          
    <!--end mainclass --> </div>
    
    <!--add some complete examples here -->
    <!--add some tutorilas examples here-->
    <br /><br /><br /><br />
      <div id="textinstructions1" style="cursor:pointer">
                                                     <center> <limetext>++&nbsp;Xtra Stuff++&nbsp;</limetext></center>
                                      		                   <div id="toggle1" style="background-color: #003; color:#9F3">
       <ul>
       	<li>.....</li>
        </ul>
        blank
                                                      </div>
                                                      		</div>
    
    		  <div id ="searchbook" style="cursor:pointer" style="background-color:#CCC">
    
        <center>  <p> <span class="trigger" data-tooltip="#tip1">Interesting Links found in this book</span></p>
         
          
        <p><img src="../images/openbook.jpg" width="134" height="88" alt="search"></p>
<div id="toggle">
            

			<ul id="chapterlinks">
			<li><a href="http://dukesnuz.com/d/jqueryjam3/searchbook/searchbookfind.php?Chapter=One&button=Submit">Chapter 1</a></li>
            <li><a href="http://dukesnuz.com/d/jqueryjam3/searchbook/searchbookfind.php?Chapter=2&button=Submit">Chapter 2</a></li>
            <li><a href="http://dukesnuz.com/d/jqueryjam3/searchbook/searchbookfind.php?Chapter=3&button=Submit">Chapter 3</a></li>
            <li><a href="http://dukesnuz.com/d/jqueryjam3/searchbook/searchbookfind.php?Chapter=4&button=Submit">Chapter 4</a></li>
            <li><a href="http://dukesnuz.com/d/jqueryjam3/searchbook/searchbookfind.php?Chapter=5&button=Submit">Chapter 5</a></li>
            <li><a href="http://dukesnuz.com/d/jqueryjam3/searchbook/searchbookfind.php?Chapter=6&button=Submit">Chapter 6</a></li>
            <li><a href="http://dukesnuz.com/d/jqueryjam3/searchbook/searchbookfind.php?Chapter=7&button=Submit">Chapter 7</a></li>
            <li><a href="http://dukesnuz.com/d/jqueryjam3/searchbook/searchbookfind.php?Chapter=8&button=Submit">Chapter 8</a></li>
            <li><a href="http://dukesnuz.com/d/jqueryjam3/searchbook/searchbookfind.php?Chapter=9&button=Submit">Chapter 9</a></li>
            <li><a href="http://dukesnuz.com/d/jqueryjam3/searchbook/searchbookfind.php?Chapter=10&button=Submit">Chapter 10</a></li>
            <li><a href="http://dukesnuz.com/d/jqueryjam3/searchbook/searchbookfind.php?Chapter=11&button=Submit">Chapter 11</a></li>
            <li><a href="http://dukesnuz.com/d/jqueryjam3/searchbook/searchbookfind.php?Chapter=12&button=Submit">Chapter 12</a></li>
            <li><a href="http://dukesnuz.com/d/jqueryjam3/searchbook/searchbookfind.php?Chapter=13&button=Submit">Chapter 13</a></li>
            <li><a href="http://dukesnuz.com/d/jqueryjam3/searchbook/searchbookfind.php?Chapter=14&button=Submit">Chapter 14</a></li>
            <li><a href="http://dukesnuz.com/d/jqueryjam3/searchbook/searchbookfind.php?Chapter=15&button=Submit">Chapter 15</a></li>
            <li><a href="http://dukesnuz.com/d/jqueryjam3/searchbook/searchbookfind.php?Chapter=backofthebook&button=Submit">Back of the Book</a></li>
			</ul>
	
                        </div><!--- end chapter links--->
                       
             </div><!--end searchbook--->
              
      </center>
    </div><!--end sidebar1-->
    
    
    
    
  <div id="sidebar2" style="background-color: #F60; border-right-style:outset;border-left-style:outset;border-top-style:outset;border-bottom-style:outset">
    <center>

  	<?php  include('xtras/openflash.php');?> 	
       <br />
  <!--contact us--->
 <!-- <div class="main" style="cursor:pointer"> -->
        <!--<h2><p>Contact Us</p></h2> -->
			<div class="contactus">       
  <p><a href="http://dukesnuz.com/d/jqueryjam3/contactusform.php" class="popup iframe"><h5>Contact Me</h5></a></p>
   			<!--end popupclass --> <!--</div> -->
            
            
           <p><a href="http://ajaxtransport.com/a/chat/chat.php" class="popup iframe"><h5>Live Help</h5></a></p>
            
         
    <!--end mainclass  contactus--> </div>
 
  
  
  
 
           <div id="headersplitleft" style=" width:190px; color:#FF0; font-size:12px; background-color: #609; border-right-style:outset;border-left-style:outset;border-top-style:outset;border-bottom-style:outset">   
           
 <?php  include('xtras/datecreated.php');?>


 </div> <!--end header split left-->
      
   
		
     <p> <a href="comments.php" class="iframe" title="Leave an Amazing Comment&nbsp;!"><h5>Leave an Amazing Comment Here, Designed Using Fancy Box Pop Out</h5></a></p>
        
      
     <?php include('xtras/xtraxtra.php');?>
         
 
 </center>
  
  
  
  <!-- end #sidebar2 --></div>
  <div id="mainContent">
    <h1> <h5><center><?php echo $welcome; ?></h5></center></h1>
  
  
  <center>
  
        <div class="main">
        
        
        
         <div id="booklinks">
         <h1><p>Selecet a chapter</p></h1>
         <p><orangetext12>Links will be sorted by chapter and in alphabetical order by title.</orangetext12></p>
             </div>
          
          
      <div id="chapters" style="background-color: #000">
      
        
        <h1>Completed Exercises</h1>
        
 <ul>  
       
    <h2>Chapter 01: Writing your First javaScript Program</h2>
                 <div class="code">
    <ul>
    	 <li><a href="hello.html" target="_blank">Hello</a></li>
         <li><a href="hello2.html" target="_blank">Hello2</a></li>
         <li><a href="fadein.html" target="_blank">Fade In</a></li>
    </ul>
        		<!-- end #code --></div>
                
                
               
    
        <h2>Chapter 02: The Grammer of JavaScript</h2>
   					 <div class="code">
    <ul>
      	<li><a href="use_variable.html" target="_blank">Using Variable</a></li>
        <li><a href="prompt.html" target="_blank">Prompt</a></li>	
        <li><a href="arrays.html" target="_blank">Arrays</a></li>
    </ul>
    				<!-- end #code -->	</div>
                       
                       
       <h2>Chapter 03: Adding Logic and Control to Your Program</h2>
   						 <div class="code">
    <ul>
    	<li><a href="conditional.html" target="_blank">Conditional</a></li>
        <li><a href="print_date.html" target="_blank">Print Date</a></li>	
        <li><a href="quiz.html" target="_blank">Quiz</a></li>
    </ul>
    				<!-- end #code --></div>
       <h2>Chapter 04: Indroducing jQuery</h2>
   						 <div class="code">
    <ul>
    	<li><a href="pull-quote.html" target="_blank" >Pull Quotes</a></li>
    </ul>
    						<!-- end #code --></div>
           <h2>Chapter 05: Action/Reaction: Making Pages Come Alive with Events</h2>
   							 <div class="code">
    <ul>
    	 <li><a href="events_intro.html" target="_blank" >Events</a></li>
        <li><a href="faq.html" target="_blank">Faq</a></li>
    </ul>
    
  						<!-- end #code --></div>


<h2>Chapter 06: Animations and Effects</h2>
   						 <div class="code">
    <ul>
    	<li><a href="signup.html" target="_blank">Signup</a></li>
    	<li><a href="animate.html" target="_blank">Animate</a></li>	
    </ul>
    							<!-- end #code --></div>
<h2>Chapter 07: Improving Your Images</h2>
					 <div class="code">
	<ul>
		<li><a href="rollover.html" target="_blank">Rollover</a></li>
		<li><a href="gallery.html" target="_blank">Gallery</a></li>
        <li><a href="fancybox.html" target="_blank">FancyBox</a></li>
        <li><a href="youtube.html" target="_blank">Youtube</a></li>
		
 </ul>   
      		<!-- end #code -->	</div>	
            
<h2>Chapter 08: Improving Navigation</h2>
					<div class="code">
	<ul>
    	<li><a href="in-page-links.html" target="_blank">In page Links</a></li>
        <li><a href="menu.html" target="_blank">Menu Navigation bar</a></li>
     </ul>     
        	<!-- end #code -->  </div>     
            
            
<h2>Chapter 09: Enhancing Web Forms</h2>
				<div class="code">
	<ul>
    	<li><a href="form.html" target="_blank">Form Fun</a></li>
        <li><a href="validation.html" target="_blank">Validation</a></li>
    </ul>       
    		<!-- end #code ---> </div>  
            
<h2>Chapter 10: Expanding Your Interface</h2>
				<div class="code">
	<ul>
    	<li><a href="tabs.html" target="_blank">Tabs</a></li>
        <li><a href="slider.html" target="_blank">Slider</a></li>
        <li><a href="tooltip.html" target="_blank">Tool Tip</a></li>
    </ul>
    
    			<!---end #code ---> </div>   
         
 <h2>Chapter 11: Intoducing Ajax</h2>
 				<div class="code">
 	<ul>
    	<li><a href="load.html" target="_blank">Load Function</a></li>
        <li><a href="login.html" target="_blank">Login.html</a></li>
    </ul>
				<!---end #code ---> </div>   
	
    
<h2>Chapter 12: Flickr and Google maps</h2>
				<div class="code">
     <ul>
     	<li><a href="flickr.html" target="_blank">Flickr Images</a></li>
        <li><a href="map.html" target="_blank">Google Map</a></li>
     </ul>
     			<!--end #code---></div>
               

            
<h2>Chapter 13:Getting the Most from jQuery</h2>
		       <div class="code">        
     <ul>
     	<li><h55>No Exercise...Will add something later</h55></li>
     </ul>
     			<!--end #code---></div>
                

<h2>Chapter 14:Going Further with javascript</h2>
					<div class="code">
    <ul>
    	<li><a href="time.php" target="_blank">Time</a></li>
    </ul>
    			<!--- end #code---></div>
                
<h2>Chapter 15:  Troubleshooting and Debugging</h2>
					<div class="code">
     <ul>
     	<li><a href="console.html" target="_blank">Firebug Console</a></li>
        <li><a href="debugger.html" target="_blank">Debugger</a></li>
     </ul>
     			<!---end #code---></div>
                
        
                
                
    <!--end chapters--></div>
    
                      	<!-- end #mainContent --></div>
                       
 
    
        
 
        
	<!-- end #searchresults --></div>
    
    </center>
  
  
  
  
  
  
  
  
  
  
  
  
  

	<!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats --><br class="clearfloat" />
  <div id="footer">
  <center>  <limetext> 
  <p>This page is created using HTML, CSS, Javascript jQuery, PHP, Filemaker,  Filemaker PHP API and  help from the following book:</p>
  
  <p> Javascript & jQuery-the missing manual by David Sawyer McFarland.  Exercises and interesting links are from this book also.</p>
  
    </limetext></center>
    
<p> <orangetext12><sub>Page Started: <?php //echo date("Y"); ?> April 7, 2013 by: David Petringa</sub></orangetext12></p>
  <br />
   
      
<a href="http://dukesnuz.com/d/phppercolate6/home.php"><orangetext12>Boston PHP Percolate 6</orangetext12></a>
	    <br />
<a href="http://dukesnuz.com/d/css3coffeebreak/home.php"><orangetext12>CSS3 Coffee Break</orangetext12></a>
		  <br />
	  
 <a href="http://dukesnuz.com/d/html_5_brunch/home.php"><orangetext12>Boston PHP HTML5 Brunch</orangetext12></a>

  
  <br />      
<orangetext12><a href="http://dukesnuz.com/d/artgallery/gallery_1.php" target="blank"><em>Art Gallery</em></a>
 An experimaent using jQuery anything slider using Filemaker to store data.</orangetext12>
 <br />
 
  <a href=" http://dukesnuz.com/d/playingaround/colors.html"><orangetext12>Just Playing Around</orangetext12></a>
  
  <br>
  <a href="http://dukesnuz.com/d/sitemap.html" target="blank"><orangetext12>Site Map</orangetext12></a>
    <br /><br />  
  <!-- end #footer --></div>
<!-- end #container --></div>



    <!--start tool tip -->
<div class="tooltip" id="tip1">
	<h2>About Interesting Links</h2>
    <p><orangetext12>Link section created with HTML, CSS, Javascript, Ajax, PHP, and Filemaker and FM Api to retrieve and store the data.</orangetext12></p>
    <p><orangetext12>To return to excercie list, click the box below.</orangetext12></p>
</div>


<?php include('../stats.php');?>
</body>
</html>