<?php
// handle_review.php
//echo 'handle review include <br />';
//check if form submission
//create array for storing errrors
$review_errors = array();
//echo 1;
 if($_SERVER['REQUEST_METHOD'] === 'POST')
	{
		   if(preg_match ('/^[A-Z \'.-]{2,60}$/i', $_POST['name']))
			{
				$name = $_POST['name'];
			}else{
				$review_errors['name'] = 'Please enter your namw!';
			}
			
			if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
				{
					$email = $_POST['email'];
				}else{
					$review_errors['email'] = 'Please enter a valid email address!';
				}
				
				//validate review
				$review = strip_tags($_POST['review']);
				if(empty($review))
					{
						$review_errors['review'] = 'Please enter your review!';
					}
					
		//if no errors , add reviews to database
	if(empty($review_errors))
		{
			//echo 2;
			//$type = 'coffee';
			//$sp_cat = 3;
			//$name= 'name2';
			//$email= 'emai22';
			//$review= 'reviewe33';
			$r = mysqli_query($dbc, "CALL add_review('$type', $sp_cat, '$name', '$email', '$review')");
			
			//echo 3;
			//check for error below line
			//if($r) echo mysqli_error($dbc);
			//confirm procedure worked
			 if(mysqli_affected_rows($dbc)>0)
			//if(4>2)
				{
					//echo 4;
					$message = 'Thank you for your review!';
				}
				//clear post array
				$_POST = array();
				//echo 5;
		}//Errors occurred IF
		
		

    }// END $_SERVER_METHOD IF 