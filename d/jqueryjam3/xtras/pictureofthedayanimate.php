<!DOCTYPE html>
<html>
<head>


<?php 
require_once('../include/dba.inc.php');

ini_set('display_errors','0');


// start add Dukesnuzpage
//Picture of the Day
$record=$LR->getRecordById('Dukesnuzpagephp',"9");
$Pictureoftheday = '<img src="'.$record->getField('Pictureoftheday').'"width="430" height="370" alt="blue">';


?>
<meta charset="UTF-8">


<style>
#dashboard {
	width: 450px;
	height:430px;
	background-color: rgb(0,0,0);
	padding: 60px 60px 0 60px;
	position: absolute;
	left: -491px;
	z-index: 100;
}
#dashboard img {
	margin-bottom: 60px;
	border: 1px solid rgb(0,0,0);
}
</style>
<script src="../_js/jquery-1.7.2.min.js"></script>
<script src="../_js/jquery.easing.1.3.js"></script>
<script src="../_js/jquery.color.js"></script>

<!-- insert picture of day on page load -->
<script type="text/javascript">
$(document).ready(function(){
  $('#picture'). html("<p>Picture</p><p> Of </p><p> The</p><p> Day</p>");
}); //end ready function
</script>



<script>
$(document).ready(function() {
		$('#dashboard').hover(
			function() {
				//alert('mouseOver')
				$('#picture').html("");
				$('#picture').css('background-color' , 'black');
				
				$(this).stop().animate(
					{
						left: '0',
						backgroundColor: 'rgb(0,0,0)'
					},
					1800,
					//'easeInBounce'
					'easeInCubic'
				); //end animate
			},
			function(){
				//alert('mouseOut')	
				$('#picture').html("<p>Ooops</p><p>Color</p><p>Change</p>!<p></p>"); 
				$('#picture').css('background-color' , '#c05');
				$(this).stop().animate(
					{
						left: '-491px',
						backgroundColor: 'rgb(0,0,0)'
					},
					2500,
					'easeOutSine'
				); //end animate
			}
			); //end hover
	}); // end ready
</script>
</head>
<body>



<div id="dashboard" style="top:100px">
<center>
<div id="picture" style="background-color:#F60; left:500px ; width:60px; top:160px; height:130px; position:absolute; font-weight:800; font-size:14px">
<!--<p>Picture</p><p> Of </p><p> The</p><p> Day</p> -->
</div>
</center>

<?php  echo $Pictureoftheday; ?>


</div>

</body>
</html>
