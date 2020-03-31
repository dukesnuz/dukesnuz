<?php 
//echo 'laptop';
# Script 9.2 - mysqli_connect.php

DEFINE('DB_USER','root');
DEFINE('DB_PASSWORD', 'salvatore');
DEFINE('DB_HOST', '192.168.0.122');

DEFINE('DB_NAME', 'sitename1');

$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or 
die('Could not connect to MySQL:' .mysqli_connect_error() );
