<?php //page.php - script 9.9

require('includes/utilities.inc.php');

//validate the page
try{
	if(!isset($_GET['id']) || !filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range'=>1)))
	{
		throw new Exception('An invalid page ID was provided to this page');
	}
	
	$q= 'SELECT id, title, content, DATE_FORMAT(dateAdded, "%e %M %Y") AS dateAdded
		FROM pagesphpadvancedch9
	    WHERE id=:id';
		$stmt = $pdo->prepare($q);
		$r=$stmt->execute(array(':id'=> $_GET['id']));
		
		if($r)
			{
				$stmt->setFetchMode(PDO::FETCH_CLASS, 'page');
				$page = $stmt->fetch();
				
				//if anboject was made create the page
				if($page)
					{
						$pageTitle = $page->getTitle();
						include('includes/header.inc.php');
						include('views/page.html');
					}else{
						throw new Exception('An invalid page ID was provided to this page.');
					}
			}else{
				throw new Exception('An invalid page ID was provided to this page.');
			}
}catch (Exception $e)
	{
		$pageTitle = 'OOPPS Error!';
		include('includes/header.inc.php');
		include('views/error.html');
	}
	include('includes/footer.inc.php');
/**********************This link to stat counter works*************************/
      include('../../stats.html');
/******************************************************************************/
?>