<?php #script 15.9 - 15_09_login_ajax.php

//check if email address and passwors submittes
if(isset($_GET['email'] , $_GET['password']) )
//if(4>1)
{
 		//validate email address is of proper syntex
		if(filter_var($_GET['email'], FILTER_VALIDATE_EMAIL))
		//if(4>1)
		{  
		   //if valid show success
		         if( ($_GET['email'] == 'email@example.com') && ($_GET['password'] == 'testpass') )
			//if(4>1)
			      {
			       echo 'CORRECT';
			
			 //complete the 3 if conditions
			        }else{
			        echo 'INCORRECT';
			 }
		            }else{
		           echo 'INVALID_EMAIL';
			       }
	  }else{
	  echo 'INCOMPLETE';
}
?>
 