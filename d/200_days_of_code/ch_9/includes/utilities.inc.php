<?php # utilities.inc.php - Script 9.3
// This page needs to do the setup and configuration required by every other page.

// Autoload classes from "classes" directory:
//define the function that will autoload the classes
function class_loader($class)
	{
		require('classes/'.$class.'.php');
	}
	
	spl_autoload_register('class_loader');
	
	session_start();
	
	
	//check for auser in the session
	$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : null;
	
	
	//create databse connection
	try{
		$pdo = new PDO('mysql:dbname=dukesnuz;localhost','dukesnuz','Stacy1964!');	
	    }catch (PDOException $e)
	{
		$pageTitle = 'Error!';
		include('includes/header.inc.php');
		include('views/error.html');
		include('includes/footer.inc.php');
		exit();
	}
