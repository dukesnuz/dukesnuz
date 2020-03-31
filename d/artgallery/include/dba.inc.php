<?php
//dukesnuz
//check to see if on handheld device


require_once 'FileMaker.php';
ini_set('display_errors','0');
require_once('commonFunctions.inc.php');


$LR_HOST = 'dukesnuz.com';
$LR_NAME = 'Dukesnuz';
$LR_USER = 'webuser';
$LR_PASS = 'webuser';

$LR = new FileMaker($LR_NAME, $LR_HOST,$LR_USER, $LR_PASS);

?>

