<?php //add_page.php - script 9.15
require('includes/utilities.inc.php');

//create new form
//below line needed for Quick form in godaddy
ini_set("include_path", '/home/loadedandrollin1/php:' . ini_get("include_path") );
require('HTML/QuickForm2.php');
$form = new HTML_QuickForm2('addPageForm');

//add title field
$title = $form->addElement('text', 'title');
$title->setLabel('Page Title');
$title->addFilter('strip_tags');
$title->addRule('required', 'Please ener a page title');

//add content field
$content=$form->addElement('textarea', 'content');
$content->setLabel('Page Content');
$content->addFilter('trim');
$content->addRule('required', 'Please enter the page content');

$submit = $form->addElement('submit', 'submit', array('value'=>'Add This Page'));

//check for form submission and validate
if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if($form->validate())
			{
				$q = 'INSERT INTO pagesphpadvancedch9 (creatorID, title, content, dateAdded)
							                 	VALUES(:creatorID, :title, :content, NOW())';
				$stmt = $pdo->prepare($q);
				$r = $stmt->execute(array(':creatorID'=>$user->getID(), 
				                           ':title'=>$title->getValue(), 
				                           ':content'=>$content->getValue()
										   ));
								  
			//if insert worked freeze form to show results
			if($r)
				{
					$form->toggleFrozen(true);
					$form->removeChild($submit);
				}
			}//END of form validation IF
	}//END of form submission IF

	//create the page
	$pageTitle = 'Add a Page';
	include('includes/header.inc.php');
	include('views/add_page.html');
	include('includes/footer.inc.php');
?>