<?php
/* bookmarks_save.php
 * student: David Petringa
 * This php page uses javascript page
 * http://www.dukesnuz.com/bookmarklets/js/bookmarks_save.js
 * this script gets the url and title from the POST and stores it in the MySQL table
 * the data is in JSON format so json_decode is used to format the data in an array that can be used inn PHP
 * the echo statements are returned with the AJAX call in the headers as the responseText and used in the javascript
 * the responses are plain text
 *
 * last updated 11/2222223333/2016
 */
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');

include ('../../include_2/mysqli_connect.php');

$data = file_get_contents('php://input');
// another way to get data, maybe
// I am just commenting the GET adn POST in case I want to change the javscript to GET
// if (isset($_GET['data'])) {
// if (isset($_POST['data'])) {

if (!empty($data)) {
	// this must match keyCode from javascript file
	$keyCode = "3cc4dee283a41f00326065dd5c3a83f4";
	// I am just commenting the GET adn POST in case I want to change the javscript to GET
	// $data = $_GET['data'];
	// $data = $_POST['data'];
	$row = json_decode($data, true);
	if (json_last_error() !== JSON_ERROR_NONE || $row["key"] != $keyCode) {
		// the messages get sent back tthe javascript and are use in the alert(responseText)
		echo "OOpppss 1! Something went haywire. Your book mark was not saved.";
		die();
	}
	// run data through filter to eliminate any bad characters
	/*
	 $urlClean=mysql_real_escape_string($dbc,trim(filter_var($row["pageUrl"])));
	 $titleClean=mysql_real_escape_string($dbc,trim(filter_var($row["pageTitle"])));
	 $key=mysql_real_escape_string($dbc,trim(filter_var($row["key"])));
	 */
	$urlClean = trim(filter_var($row["pageUrl"]));
	$titleClean = trim(filter_var($row["pageTitle"]));
	$keyClean = trim(filter_var($row["key"]));
	// send data to mysql table
	$q = "INSERT INTO bookmarks(url, title, key_code)
				VALUES('$urlClean', '$titleClean', '$keyClean')";
	$r = @mysqli_query($dbc, $q);

	if ($r) {
		echo "Success ! Bookmark is saved.";
	} else {
		echo "OOpppss 2! Something went haywire. Your book mark was not saved.";
	}

} else {
	echo "OOpppss 3! Something went haywire. Your book mark was not saved.";
}
// close the database
mysqli_close($dbc);

die();
