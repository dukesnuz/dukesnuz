<?php
//mysql,inc.php
DEFINE('DB_USER','ecommerceone');
DEFINE('DB_PASSWORD','Stacy1964!');
DEFINE('DB_HOST','localhost');
DEFINE('DB_NAME','ecommerceone');

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

//establish character set
mysqli_set_charset($dbc,'utf8');

//begin function to make data safe to use in queries
//removes extra slashes when Magic Quotes is enabled
//Trims extra spaces from the data
function escape_data($data, $dbc){
	//Strip the extra slashes if magic quotes is on
	if(get_magic_quotes_gpc()) $data = stripslashes($data);
	//return trimmed secure version of data
	return mysqli_real_escape_string($dbc, trim($data));
} //end of the escape_data() function


//omit closing php to prevent headers already sent message
