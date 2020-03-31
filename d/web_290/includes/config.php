<?php
///////////////////////////////////////////below for live
DEFINE('DB_USER','dukesnuz');
DEFINE('DB_PASSWORD', 'Stacy1964!');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'dukesnuz');


//////////////Below for developement////////////////////
// Connection's Parameters
//$db_host="localhost";
//$db_host="dukesnuz.db.12073206.hostedresource.com";
$db_host="localhost";
//$db_name="web290";
$db_name="dukesnuz";
//$username="root";
$username="dukesnuz";
//$password="salvatore";
$password="Stacy1964!";
//$db_con=mysql_connect($db_host,$username,$password);
$db_com=mysqli_connect($db_host,$username,$password);
//$connection_string=mysql_select_db($db_name);
                 //$connection_string=mysql_select_db($db_name);
// Connection
//mysql_connect($db_host,$username,$password);
mysql_connect($db_host,$username,$password);
//make sure database is the active one
//mysql_select_db($db_name);
mysql_select_db($db_name);
?>