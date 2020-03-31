<?php # Script 17.5 - read.php

include('includes/17_01_header.html');

$tid = FALSE;
//prove thread id is valid
//$tid = 1;
       if(isset($_GET['tid']) &&   filter_var($_GET['tid'], FILTER_VALIDATE_INT, array('min_range' =>1) ) )
	   //if(4>1)
	        {
	 $tid = $_GET['tid'];
	     //determiine of dates and times should be adjusted
		    if(isset($_SESSION['user_tz']))
			{
		    $posted = "CONVERT_TZ(p.posted_on, 'UTC', '{$_SESSION['user_tz']}')";
		    }else{
		    $posted ='p.posted_on';
		    }
		
		   //run query
		   $q = "SELECT t.subject, p.message, username, DATE_FORMAT($posted,'%e-%b-%y %1:%i %p')
		   AS posted FROM threads AS t LEFT JOIN posts AS p USING(thread_id) INNER JOIN users AS u ON p.user_id = u.user_id
		  WHERE t.thread_id =$tid ORDER BY p.posted_on ASC";
		   
		    $r=mysqli_query($dbc, $q);
		    if(!(mysqli_num_rows($r) > 0))
			//if(4>1)
			 {
			 $tid = FALSE;
			 }
			 //complete get $_GET['tid'] and checak agian for valid thread id
			 }//end of isset$_GET['tid'] if
			   if($tid)
			  // if(4>1)
			   {

			   //print message
			   $printed =FALSE;
			   while($messages = mysqli_fetch_array($r, MYSQLI_ASSOC))
			   { 
			          if(!$printed)
				      {
					  echo"<h2>{$messages['subject']}</h2>\n";
					  $printed = TRUE;
					  }
					  echo "<p>{$messages['username']}({$messages['posted']}) <br />
					            {$messages['message']} </p> <br />\n";
				} //end while loop
								
				}else{
				  //Invalid thread id
				  echo '<p>This page has been accessed in error.</p>';
}
include('includes/post_form.php');
include('includes/17_02_footer.html')
?>
				  
					          