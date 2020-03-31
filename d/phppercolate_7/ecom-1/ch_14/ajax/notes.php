<?php 
//notes.php

require('../includes/config.inc.php');
 
 //use below to test this page
 //$_POST['page_id'] = 18;
 //$_POST['notes'] = '';
 //$_POST['notes'] = 'notes';
 //$_SESSION['user_id'] =293;
 
//validate required variables
if(isset($_POST['page_id'], $_POST['notes'], $_SESSION['user_id'])  && 
filter_var($_POST['page_id'], FILTER_VALIDATE_INT, array('min_range' =>1)) &&
filter_var($_SESSION['user_id'], FILTER_VALIDATE_INT, array('min_range' =>1)) )
	{
		require(MYSQL);
		
		//if notes were privided create a DELETE query
		if(empty($_POST['notes']))
			{
			$q = 'DELETE FROM notes WHERE user_id = ? and page_id= ?';
			$stmt = mysqli_prepare($dbc, $q);
			mysqli_stmt_bind_param($stmt, 'ii', $_SESSION['user_id'], $_POST['page_id']);	
			}else{
				//if notes were provided update or insert the record
				$q = 'REPLACE INTO notes(user_id, page_id, note)
					VALUES(?,?,?)';
				$stmt = mysqli_prepare($dbc, $q);
				mysqli_stmt_bind_param($stmt, 'iis', $_SESSION['user_id'], $_POST['page_id'], $_POST['notes']);
			}
			//execute query
			mysqli_stmt_execute($stmt);
			//if more than one row affected , print true and end script
			if(mysqli_stmt_affected_rows($stmt) >0)
				{
					echo 'true';
					exit;
				}
	}//INVALID values or did not work
	echo 'false';
