<?php
//echo 'favorite.php';
//page 471

require('../includes/config.inc.php');
 

//connect to database
 
 //echo 22;
//for testing
// $_GET['action']='remove';
 //$_GET['page_id']=18;
// $_SESSION['user_id']= 293;
//echo 'start';
//validate the variables
 
if(isset($_GET['page_id'], $_GET['action'], $_SESSION['user_id']) && 
filter_var($_GET['page_id'], FILTER_VALIDATE_INT, array('min_range' =>1)) &&
filter_var($_SESSION['user_id'], FILTER_VALIDATE_INT, array('min_range' =>1)) )
//if(4>2)
	{
		//define query
		//echo 22;
		if($_GET['action'] === 'add')
		 
			{
			//	echo 33;
				$q = 'REPLACE INTO favorite_pages(user_id, page_id)	
					VALUES(?,?)';
			 			
			}elseif($_GET['action'] === 'remove')
			 
				{
					$q = 'DELETE FROM favorite_pages WHERE user_id=? AND page_id=?';
					 
				}
	//execute the query
	// echo 44;
	 if(isset($q))
	//if(4>2)
		{
			//echo 55;
			require(MYSQL);
			$stmt = mysqli_prepare($dbc, $q);
			mysqli_stmt_bind_param($stmt, 'ii', $_SESSION['user_id'], $_GET['page_id']);
			mysqli_stmt_execute($stmt);
			//echo 555;
			if(mysqli_stmt_affected_rows($stmt)>0)
				{
					echo 'true';
					exit;
				}
		 //echo 444;
	
		}
	} //Invalid values or did nt work!
	echo 'false';

