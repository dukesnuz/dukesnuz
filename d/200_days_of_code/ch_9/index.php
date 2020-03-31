<?php //index.php - script 9.7

require('includes/utilities.inc.php');
 

$pageTitle = 'Welcome to the site!';
include('includes/header.inc.php');
//echo 2;
//grab the 3 most recent pages
try{
	$q= 'SELECT id, title, content, DATE_FORMAT(dateAdded, "%e %M %Y") AS dateAdded
		FROM pagesphpadvancedch9
		ORDER BY dateAdded DESC
		LIMIT 3';
		 $r = $pdo->query($q);
		 
		//check that some rows returned
		if($r && $r->rowCount()> 0)
		//if(4>2)
		{
			
			//set fetch mode
			$r->setFetchMode(PDO::FETCH_CLASS, 'page');
			//$r->setfetchmode(PDO::fetch_class, 'Page');
		
			include('views/index.html');
		}else{
			
			throw new Exception('No content is available to be viewed at this time.');
		}
		
}catch (Exception $e)
{
	
	include('views/error.html');
 
}
/**********************This link to stat counter works*************************/
      include('../../stats.html');
/******************************************************************************/
include('includes/footer.inc.php');
