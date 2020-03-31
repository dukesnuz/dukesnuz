<?php
require_once('include/dba.inc.php');
$newcomment = $LR->newAddCommand('Commentsphp');
$newcomment->setField('Comments',POST('comment'));
$newcomment->setField('Name',POST('username'));
$newcomment->setField('Ip',POST('ip'));
$comment = $newcomment->execute();

//if(FileMaker::isError($comment)){
	//$_POST[comment]= "d";
	if(!empty($_POST['comment']))
	//if(4>1)
	{
		//if(2>8)			 {
echo 'pass';
}else{
echo 'fail';
}
?>

