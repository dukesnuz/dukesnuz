<?php
require_once('FileMaker/FileMaker.php');
require_once('commonFunctions.inc.php');

$DB_HOST = 'loadedandrolling.com';
$DB_NAME = 'LoadedandRolling';
$DB_USER = 'test';
$DB_PASS = 'test';

$blogDB = new FileMaker($DB_NAME, $DB_HOST, $DB_USER, $DB_PASS);
?>
?>