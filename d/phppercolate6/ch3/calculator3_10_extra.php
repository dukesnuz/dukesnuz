<?php #Script 3.9- pursuit3.php
//End of Ch 3 Pursue
//This function creates a radio button
//The function takes one argument: the value
//The function also makes the button sticky

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
include('includes/header.html');


if($_SERVER['REQUEST_METHOD'] == 'POST'){
       

		if(isset($_POST['gallon_price'], $_POST['efficiency']) && is_numeric($_POST['gallon_price']) && is_numeric($_POST['efficiency']) ){
		
		//$gallons=$_POST['distance'] / $_POST['efficiency'];
		//$dollars =$gallons * $_POST['gallon_price'];
		$cost = calculate_trip_cost($_POST['distance'], $_POST['efficiency'], $_POST['gallon_price']);
		//$hours = $_POST['distance']/65;
		$hours = $_POST['distance']/$_POST['mph'];
		$days= $hours/24;
		if($days  > 1){
				  $days ='. Which would be a '.round( $days, 0) .' day trip.';
				  }else{
				  $days ='.' . 'Wow this a good day trip.';
				  }
		if($_POST['tolls'] > 0 ){
		//if(4>5){
				$tolls=$_POST['tolls'];
				$triptotal= $tolls + $cost;
				$message= '<p>The trip cost including $'.$tolls.' added in will for tolls will be $ '. $triptotal .'.</p>';
						}else{
				$message= '';
						}
						
		echo '<h1>Total Estimated Cost</h1><p>The total cost of driving ' . $_POST['distance'] . ' miles, averaging ' 
		. $_POST['efficiency']. ' miles per gallon, and paying an average of ' . $_POST['gallon_price'] . ' per gallon, is $ ' 
		. $cost . ' If you drive at an average of '.$_POST['mph'].'  miles per hour, the trip will take approximately ' 
		. number_format($hours, 2) . ' hours '.$days.'</p>';
		
		 echo $message;
		 
		}else{ //Invalid submitted values.
		echo '<h1>Error!</h1> <p class ="error">Please enter a valid distance, price per gallon, and fuel efficieny.</p>';
		}
} //End of main submission if
?>

<h1>Pursuit of Chapter 3</h1>
<form action="calculator3_10_extra.php" method="post">

<p> Distance (in miles):<input type="text" name="distance" 
value="<?php if (isset($_POST['distance'] )){ echo $_POST['distance']; }?> "/></p>


<p>Ave. Price Per Gallon:<span class="input">
<?php
	 create_radio('3.00');
	 create_radio('3.50');
	 create_radio('4.00');
?>
</span></p>

<p>Fuel Efficiency:<select name= "efficiency">
   <option value="10" <?php  if (isset($_POST['efficiency']) && ($_POST['efficiency'] == '10')) echo ' selected="selected"'; ?>>Terrible</option>
   <option value="20"   <?php  if (isset($_POST['efficiency']) && ($_POST['efficiency'] == '20')) echo ' selected="selected"'; ?>>Decent</option>
   <option value="30" <?php if (isset($_POST['efficiency']) && ($_POST['efficiency'] == '30')) echo ' selected="selected"'; ?> >Very Good</option>
   <option value="50"<?php if (isset($_POST['efficiency']) && ($_POST['efficiency'] == '40')) echo ' selected="selected"'; ?>>Outstanding</option>
</select></p>

<p>Ave. Miles per Hour:(choose a trip less than, then more than 24 hrs long)<input type="text" name="mph"
value="<?php if(isset($_POST['mph'])) {echo $_POST['mph'];}?> "/></p>

<p>If you are taking a toll road, enter the toll amount here:
<input type="text" name="tolls" value="<?php if(isset($_POST['tolls'])) {echo $_POST['tolls'];}?>"/></p>


<p><input type="submit" name="submit" value="Calculate" /></p>
</form>


<?php

if(!empty ($_SERVER['HTTP_REFERER'])){
   $previous=$_SERVER['HTTP_REFERER'];
   }else{
   $previous= NULL;
  }
?>
<p><a href="<?php echo $previous; ?>">Back</a></p>

<?php include('includes/footer.html');?>

		  		