<?php //login.php - script 9.11 
require('includes/utilities.inc.php');

//create new form
//below line needed for Quick form in godaddy
ini_set("include_path", '/home/loadedandrollin1/php:' . ini_get("include_path") );
require('HTML/QuickForm2.php');
$form = new HTML_QuickForm2('login_form');
	//echo 4;	
//add email address
$email = $form->addElement('text', 'email');
$email->setLabel('Email Address');
$email->addFilter('trim');
$email->addRule('required', 'Please enter your email address.');
	//echo 4;	
//add password field
$password = $form->addElement('password', 'pass');
$password->setLabel('Password');
$password->addFilter('trim');
$password->addRule('required', 'Please enter your password.');
//	echo 4;	
//add submit button
$form->addElement('submit', 'submit', array('value'=>'Login'));
	//echo 4;	
//check for form submission
if($_SERVER['REQUEST_METHOD'] =='POST')
	{
		//validate the form
		if($form->validate())
			{
				//check submitted values against database
				$q ='SELECT id, userType, username, email
					FROM usersphpadvancedch9
					WHERE email=:email
					AND
					pass= SHA1(:pass)';
					
				$stmt = $pdo->prepare($q);
				
				$r = $stmt->execute(array(':email'=> $email->getValue(), ':pass'=>$password->getValue()));
			    if($r)
				{
				//	echo 5;
					$stmt->setFetchMode(PDO::FETCH_CLASS, 'user');
					$user = $stmt->fetch();
				//	echo 6;
				}
				//echo 7;
			//if one record store in session and redirect user
			if($user)
				{
					//	echo 8;
					$_SESSION['user'] = $user;
					header('Location:index.php');
					exit();
				}
			
			}//END of form validation
	}//END of form submission IF

	
	//create login page
	$pageTitle = 'Login';
	include('includes/header.inc.php');
	include('views/login.html');
	include('includes/footer.inc.php');

?>
