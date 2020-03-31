<?php # script 2.4 - index.php
require('includes/config.inc.php');


if(isset($_GET['p']))
	{
		$p = $_GET['p'];
	}elseif(isset($_POST['p']))
	{
		$p = $_POST['p'];
	}else{
		$p = NULL;
	}

	switch ($p)
	{
		case 'about':
			$page = 'about.inc.php';
			$page_title = 'About this site';
			break;
			
		case 'contact':
			$page ='contact.inc.php';
			$page_title = 'Contact Us';
			break;
			
		case 'search':
			$page = 'search.inc.php';
			$page_title = 'Search Results';
			break;
		
		default :
			$page = 'main.inc.php';
			$page_title = 'Site Home Page';
			break;
	  }//END of main switch
	  
	  if(!file_exists('./modules/'.$page))
	  {
	  	$page = 'main.inc.php';
		$page_title = 'Site Home Page';
	  }
	  
	  include('./includes/header.html');
	  include('./modules/'.$page);
	  include('./includes/footer.html');
