<?php
/* bookmarks_search.php
 * student: David Petringa
 * This php page uses javascript page
 * http://www.dukesnuz.com/bookmarklets/js/bookmarks_search.js
 * this script gets the keycode from the url from the ajax call and returns the bookmarks from the MySQL table
 * json_encode is used to format the data in a JSON object
 * the echo statements are returned with the AJAX call in the headers as the responseText and used in the javascript
 * I believe I may have hacked the two error responses so they would be in JSON format
 *
 * keyCode in url must match keyCode in table
 *
 * last updated 11/2222223333/2016
 */
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');

include ('../../include_2/mysqli_connect.php');

if (isset($_GET['keycut'])) {

	// $keyCode = "3cc4dee283a41f00326065dd5c3a83f4"; //for debugging un comment
	// this must match keyCode from javascript file
	$keyCode = $_GET['keycut'];

	$q = "SELECT url, title FROM bookmarks
             where key_code ='$keyCode'
             ORDER BY title ASC";
	$r = @mysqli_query($dbc, $q);

	if ($r) {
		$row = array();
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
			$results[] = $row;
		}
		echo json_encode($results);

	} else {
		// I think I may have hacked my way through these error messages, trying to use JSON format so they will not
		echo $error1 = '[{"url":"##","title":"OOpppss 1! Something went haywire. Your book marks could not be retrived."}]';
	}

} else {
	echo $error2 = '[{"url":"##","title":"OOpppss 2! Something went haywire. Your book marks could not be retrived."}]';
}
// close the database
mysqli_close($dbc);

die();
