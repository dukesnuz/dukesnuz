<?php 
if (isset($_GET['email'], $_GET['password'])) {

	// Need a valid email address:
	if (filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) {
		
		// Must match specific values:
		if ( ($_GET['email'] == 'email@example.com') && ($_GET['password'] == 'testpass') ) {
	
			// Set a cookie, if you want, or start a session.

			// Indicate success:
			echo 'CORRECT';
			
		} else { // Mismatch!
			echo 'INCORRECT';
		}
		
	} else { // Invalid email address!
		echo 'INVALID_EMAIL';
	}

} else { // Missing one of the two variables!
	echo 'INCOMPLETE';
}


/*cannot figure out why 2 below not working below taken from book 2nd i typed

if(isset($_GET['email'] , $_GET['password']) ){


 		//validate email address is of proper syntex
		if(filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)){
	
		//if(4>1)
		
		   //if valid show success
		         if( ($_GET['email'] == 'email@example.com') && ($_GET['password'] == 'testpass') ){
			 
			     
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
*/
?>


