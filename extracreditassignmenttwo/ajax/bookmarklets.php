<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');

include ('../../include_2/mysqli_connect.php');

$data = file_get_contents('php://input');//another way to get data, maybe
// I am just commenting the GET adn POST in case I want to change the javscript to GET
//if (isset($_GET['data'])) {
//if (isset($_POST['data'])) {
if(!empty($data)){
	// this must match keyCode from javascript file
    $keyCode = "3cc4dee283a41f00326065dd5c3a83f4";

	//$data = $_GET['data'];
	//$data = $_POST['data'];
	$row = json_decode($data, true);
	if (json_last_error() !== JSON_ERROR_NONE || $row["key"] != $keyCode) {
		// the messages get sent back tthe javascript and are use in the alert(responseText)
		echo "OOOpppsss ! Error 1 Bookmark was not saved.";
		die();
	}
	
	/*
	 $urlClean=mysql_real_escape_string($dbc,trim(filter_var($row["pageUrl"])));
	 $titleClean=mysql_real_escape_string($dbc,trim(filter_var($row["pageTitle"])));
	 $key=mysql_real_escape_string($dbc,trim(filter_var($row["key"])));
	 */
	$urlClean = trim(filter_var($row["pageUrl"]));
	$titleClean = trim(filter_var($row["pageTitle"]));
	$keyClean = trim(filter_var($row["key"]));

	$q = "INSERT INTO bookmarklets(url, title, key_code)
				VALUES('$urlClean', '$titleClean', '$keyClean')";
	$r = @mysqli_query($dbc, $q);

	if ($r) {
		echo "Success ! Bookmark is saved.";
		echo $j;
	} else {
		echo "OOOpppsss ! Error 2 Bookmark was not saved.";
	}

} else {
	echo "OOOpppsss ! Error 3 Bookmark was not saved.";
}

mysqli_close($dbc);

die();
