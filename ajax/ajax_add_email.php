<?php
//page is also using ajax_add_email.php and add_email_form.inc.html

 if(empty($_POST['address']))
	 {
      	echo 'empty';
		die();
      }
   
//check if field data entered 	 
if(isset($_POST['address']))
{
//get page title
    			
        require('../includes/config.inc.php');
        require (MYSQL);
	
       //check if field data entered
      //add here to check if we have address then echo added die
      //if email address not in database add it else notify person already in
        $e = $_POST['address'];
	    $e= trim($e);
        
	    $q= "SELECT address FROM emails WHERE address = '$e' ";
		$result = mysqli_query($dbc, $q) or trigger_error("Query:$q\n<br />MySQL Error: ". mysql_error($dbc));
		if(mysqli_num_rows($result) > 0)
		{
		echo 'added';
			die();
		}
			

			//check if valid email address
			 if(filter_var($_POST['address'], FILTER_VALIDATE_EMAIL))  
   				{
   					$e=isset($_GET['address']) ? $_GET['address'] : $_POST['address'];
     				$e = mysqli_real_escape_string($dbc, trim($e));
		   		}else{
   					echo 'fail';
					die();
   				} 
          
 				//used subscribe email address to emails table
 				//validste email address
       			//retrive ip 
	     		$ip=$_SERVER['REMOTE_ADDR'];
	     		$ip = mysqli_real_escape_string($dbc,trim($ip));
    			//$e =$_POST['address'];
				//$e = mysqli_real_escape_string($dbc, trim($e));
				$address_id =md5(uniqid(rand(), true));
				$q = "INSERT INTO emails(address,address_id,ip)
			 	                   VALUES('$e','$address_id','$ip')";
			 	               
		        $result = mysqli_query($dbc,$q);
			    if(mysqli_affected_rows($dbc) == 1)
				{
					$error= 'pass';
					
					/**********************SEND emails******************************************/
					
					$body = "Congradulations!\n";
					$body .="Thank you for signing up to DukesNuz.\n";
					$body .="I periodically email information that is of interest to me.\n";
					$body .="I hope you enjoy my emails and also find the information useful.\n";
					$body .="Your email:\n";
					$body .=$e."\n\r";
					$body .="Visit my about page and connect with me on social media.\n";
					$body .="http://www.dukesnuz.com/about/dukesnuz/david/petringa/\n\r";
					$body .="Regards,\nDavid Petringa\n";
					$body .= URL."\n\r";
					$body .="Email End";
					
					mail($_POST['email'],"You are subscribed",$body,'FROM:'.CONTACT_EMAIL);
					
					//Send email to me
					mail(CONTACT_EMAIL,"Subscriber to Duke's Blog",$body,'FROM:'.CONTACT_EMAIL);
					
					/*****************************END send emails*******************************/
				}else{
					$error= 'fail';
				}
				echo $error;
				//echo $e;	
		
}else{

die();

}


				 