<?php
    session_start();
	
	
	
	if(isset($_SESSION['count']))
	{
		$_SESSION['count']= $_SESSION['count'] +1;
	}else{
		$_SESSION['count'] = 1;
	}
	echo 'Count number of times you accessed this page';
	echo "<p>Page visits". $_SESSION['count']."</p>";
	
 include('../../stats.html');
?>