<?php #Script 3.9- pursuit3.php
//End of Ch 3 Pursue
//This function creates a radio button
//The function takes one argument: the value
//The function also makes the button sticky



function create_style($value1, $style='style'){
  echo '<input type="radio" name="'.$style.'" value="'.$value1.'"';
  //ck for stick
         if(isset($_POST[$style]) && ($_POST[$style]== $value1)){
		     echo 'checked="checked"';
			 }
		//complete element
		echo "/> $value1";
		} //end of create style function
   if(isset( $_POST['style'])){
       $value1= $_POST['style'];	
        }else{
       $value1= 1;
     } //end function
	 
//if($_SERVER['REQUEST_METHOD'] == 'GET'){	  
		 //if (4>5){
		 if( $value1 == 1){
$header = 'includes/header1.html';
$footer = 'includes/footer1.html';
          /*  }elseif($value1 = 2){
$header = 'includes/header.html';
$footer = 'includes/footer.html';*/
             }else{
$header = 'includes/header.html';
$footer = 'includes/footer.html';
			 } //end if style

//} //end if server request method



 // end if server request

function create_radio($value, $name= 'gallon_price'){
	echo '<input type="radio" name="'.$name.'" value="' . $value . '"';
	// Ck stickiness
	    if (isset($_POST[$name]) && ($_POST[$name] == $value)) {
		      echo ' checked="checked"';
	       } 
//complete element
echo "/> $value";
}// end of create gallon function

//second function 3.10
function calculate_trip_cost($miles, $mpg, $ppg){
$gallons = $miles/$mpg;
$dollars =$gallons*$ppg;
return number_format($dollars, 2);
}  // End of calculate_trip_cost() function

$page_title ='Pursuit of Chapter 3';
  include($header);


if($_SERVER['REQUEST_METHOD'] == 'POST'){
       

		if(isset($_POST['gallon_price'], $_POST['efficiency']) && is_numeric($_POST['gallon_price']) && is_numeric($_POST['efficiency']) ){
		
		//$gallons=$_POST['distance'] / $_POST['efficiency'];
		//$dollars =$gallons * $_POST['gallon_price'];
		$cost = calculate_trip_cost($_POST['distance'], $_POST['efficiency'], $_POST['gallon_price']);
		//$hours = $_POST['distance']/65;
		$hours = $_POST['distance']/$_POST['mph'];
		
		
		$days= ($hours/24);
		$time= $hours/24;
		  //$time1 = ((substr($time, -2)) *24)*.01;
		   $time1 = round((( substr(round($time,2), -2))* .24),0);
		if($days  > 1){
				  $days ='. Which would take '.round( $days, 0) .' days  and ';
				 
				  }else{
				  $days ='.' . 'Wow this would be a good day trip and take';
				  }
		if($_POST['tolls'] > 0 ){
		//if(4>5){
				$tolls=$_POST['tolls'];
				$triptotal= $tolls + $cost;
				$message= '<p>The trip cost including $'.$tolls.' added in for tolls will be $ '. $triptotal .'.</p>';
						}else{
				$message= '';
						}
						
		echo '<h1>Total Estimated Cost</h1><p>The total cost of driving ' . $_POST['distance'] . ' miles, averaging ' 
		. $_POST['efficiency']. ' miles per gallon, and paying an average of ' . $_POST['gallon_price'] . ' per gallon, is $ ' 
		. $cost . ' If you drive at an average of '.$_POST['mph'].'  miles per hour, the trip will take approximately ' 
		. number_format($hours, 2) . ' hours. '.$days. '  '.$time1.' hours.</p>';
		
		 echo $message;
		 echo '<p>Style->'. $value1 .'<-selected.</p>';
		 
		}else{ //Invalid submitted values.
		echo '<h1>Error!</h1> <p class ="error">Please enter a valid distance, price per gallon, and fuel efficieny.</p>';
		}
} //End of main submission if
?>

<h1>Pursuit of Chapter 3</h1>
<!--<h2>Select a page style</h2>
<form action="pursuit3.php" method="post">-->

<!--
<p><input type="submit" name="submit" value"Style"/></p>
</form>-->

<form action="pursuit3.php" method="post">



<p><label>Select a Page Style(function used to create radio buttons)<span class="input">
  <?php
  	   create_style('1');
	   create_style('2');
  ?>
  </span></label></p>
  
<p> <label>Distance (in miles):<input type="text" name="distance" 
value="<?php if (isset($_POST['distance'] )){ echo $_POST['distance']; }?> "/></label></p>


<p><label>Ave. Price Per Gallon:<span class="input">
<?php
	 create_radio('3.00');
	 create_radio('3.50');
	 create_radio('4.00');
?>
</span></label></p>

<p><label>Fuel Efficiency:<select name= "efficiency">
   <option value="10" <?php  if (isset($_POST['efficiency']) && ($_POST['efficiency'] == '10')) echo ' selected="selected"'; ?>>Terrible</option>
   <option value="20"   <?php  if (isset($_POST['efficiency']) && ($_POST['efficiency'] == '20')) echo ' selected="selected"'; ?>>Decent</option>
   <option value="30" <?php if (isset($_POST['efficiency']) && ($_POST['efficiency'] == '30')) echo ' selected="selected"'; ?> >Very Good</option>
   <option value="50"<?php if (isset($_POST['efficiency']) && ($_POST['efficiency'] == '40')) echo ' selected="selected"'; ?>>Outstanding</option>
</select></label></p>

<p><label>Ave. Miles per Hour:(choose a trip less than, then more than 24 hrs long)<input type="text" name="mph"
value="<?php if(isset($_POST['mph'])) {echo $_POST['mph'];}?> "/></label></p>

<p><label>If you are taking a toll road, enter the toll amount here:
<input type="text" name="tolls" value="<?php if(isset($_POST['tolls'])) {echo $_POST['tolls'];}?>"/></label></p>

<p><input type="submit" name="submit" value="Calculate" /></p>
</form>




	
<?php include( $footer);?>

		  		