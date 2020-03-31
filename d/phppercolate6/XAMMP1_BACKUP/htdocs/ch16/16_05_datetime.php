<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="generator" content="CoffeeCup HTML Editor (www.coffeecup.com)">
    <meta name="dcterms.created" content="Tue, 15 Oct 2013 10:29:53 GMT">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>DateTime Usage</title>
	<link href="includes/reset.css" rel="stylesheet">

<style type="text/css" media-"screen">
body{
		 font-family:Verdana, Arial, Helvetica, sans-serif;
		 font-size: .875em;
		 margin: 10px;
		 background-color:#D4FF82;
		 color:#FFFFFF;
		  }
header{
	   background-color:#314019;
	   border:3px solid #FFFFFF;
	   padding:15px;
	    }
h1{
   color: #F6E0FF;
   font-size:1.75em
    }
sidebar{
     margin-top:5px;
	 padding:10px;
     background-color:#FFFFFF;
     display:block;
	 width:125px;
	 color:#008000;
	 border:none;
	 border-left: 5px solid #138021;
	 text-align:left;
 }
.formbox{

    color:#3D4036;
    background-color:#2A4024;
	width:450px;
    padding:10px;
    margin-top:0px;
    margin-bottom:25px;
    margin-left:auto;
    margin-right:auto;
    border-radius: 15% 15% 0 0;
    border:none;
    border-left: 5px solid #303C80;
    border-right: 10px outset #303C80;
	border-bottom: 10px outset #303C80;
	}
.formbox:hover{

	 }
footer{
       margin-top:35px;
	   background-color: #338070;
	   border:3px solid #FFFFFF;
	   padding:15px;
	   }
.subform{
		/* font-size: 1.2em;*/
		 margin-top:35px;
		 font-family:Tahoma, Geneva, sans-serif;
		  }
.subform label{
	     display:inline-block;
		 width:100px;
		 vertical-align:baseline;
		 margin-right:10px;
		 text-align:right;
		 font-weight:normal;
		 color:#F6E0FF; 
		  }
.subform input[type="text"]{
         border-radius:10%;
		 border:2px dotted #004000;
		 width:100px;
		 padding:5px;
		 font-size:1em;
		 color:#004080;
		 text-align:center;
 }
 .subform input[type="text"]:focus{
 		  color:#FF8000;
		  font-size:1.25em;
		  background-color:#C5FFA3;
		   }
.subform input[type="submit"]{
       border-radius:50%;
	   border:none;
       margin-left:270px;
	   padding: 5px 0px;
	   font-size:1.5em;
	   background-color:rgba(0,0,255);
	   font-weight:bolder;
	   box-shadow: 5px 5px 4px #000000;
	    }
.subform input[type="submit"]:hover{
		 font-size: 1.7em;
		 background-color:#518059;
		 color:#FFFFFF;
		 box-shadow: 0px 0px 0px;
		 border: 4px solid #000000;
		 padding:8px;
		  }
.dateformat{
   border-radius:10%;
   margin-top:5px;
   display:block; 
   background-color:rgb(204,255,49);
   padding:2px;
   width:87px;
   margin-left:119px;
   font-size:.875em;

}
.error {
	   	color: #F00;
	   }
a {
	color: #88FFF8;
	text-decoration:none;
}

.message p{
  display:block;
  width:400px;
  background-color:rgba( 0,152,0, .7);
  margin-left:25px;;
  padding:10px;
  color:#FFFFFF;
  margin-right:auto;
  margin-left:auto;
  
  margin-top:10px;
  font-weight:bolder;
  border-radius: 25% 25% 0 0;
   }
p{
  margin-left:25px;;
  padding:10px;
  margin-bottom:10px;
   }
</style>
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>
<?php # Script 16.5 - datetime.php

//create 2 date time objects
$start = new DateTime();
$end = new DateTime();
$end->modify('+1 day');
$message='<p>Set the Start an End Dates for the Thing.</p>';
    // adding one day as in above line can also be writtenas below 2 lines
	//$day = new DateIntervsl('P1D');
	//$end->add($day);
// establish default for displayin dates
$format = 'm/d/y';

//function
function validate_date($date)
		 {
		 $array = explode('/', $date);
		  //if array does not contain 3 elements return false
		  if(count($array) != 3) return false;
		     //if date is invalid return false
			 if(!checkdate($array[0], $array[1], $array[2]) )return false;
			 return $array;
			 } //End of validate_date() function
			 
			 
 //if form submitted validate user submitted values
if(isset($_POST['start'], $_POST['end']) )
   {
 			if( (list($sm, $sd, $sy) = validate_date($_POST['start']))  
			&& (list($em, $ed, $ey) =  validate_date($_POST['end'])) )
			{
			//reset dates to user submitted dates
			$start->setDate($sy,$sm,$sd);
			$end->setDate($ey,$em,$ed);
			      //if end date comes after start date calculate interval
			       if($start<$end)
				   //if(4>1)
			       {
			       $interval = $start->diff($end);
			       //echo "<p>The event has been planned starting on {$start->format($format)}
			       // and ending on {$end->format($format)}, which is a period of
					//$interval->days days(s).</p>";
					$message = "<p>The event has been planned starting on {$start->format($format)}
			        and ending on {$end->format($format)}, which is a period of
					$interval->days days(s).</p>";
					}else{ //end date must be later!
					//echo '<p class="error">The starting date must precede the ending date.</p>';
					$message = '<p class="error">The starting date must precede the ending date.</p>';
					 }
	           }else{ //An invalid date
			   //echo '<p class="error">One or both of the submitted dates is was invalid.</p>';
			   $message ='<p class="error">One or both of the submitted dates is was invalid.</p>';
			   }
} //End of form submission

?>
<header>
<h1>Calculate the number of days between 2 dates</h1>

</header>
<sidebar>
This is an example of an eco-friendly GREEN form box. 
</sidebar>
<div class="formbox">
<div class="message">
<?php echo $message; ?>
</div>
<form class="subform"  action="16_05_datetime.php" method="post">
 	  <p><label for="start">Start Date:</label><input type="text" name="start"
	  							  value="<?php echo $start->format($format); ?>" />
								  <span class="dateformat"> (MM/DD/YYYY)</span></p>
							
	  <p><label for="end">End Date:</label><input type="text" name="end" 
	  						  	  value="<?php echo $end->format($format); ?>" />
								  <span class="dateformat"> (MM/DD/YYYY)</span></p>
		
	  <p><input type="submit" value="Calculate" /></p>
</form>

</div><!--end maincontent-->
<footer>
<p><a href="16_02_register.php">Exercise 16.2</a></p>	
</footer>
<?php include('includes/stats.php'); ?>		
	</body>
</html>